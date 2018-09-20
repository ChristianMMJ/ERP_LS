<?php

header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class ImprimeOrdenDeProduccion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->helper('ordendeproduccion_helper');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            switch ($this->session->userdata["TipoAcceso"]) {
                case 'SUPER ADMINISTRADOR':
                    $this->load->view('vNavGeneral')->view('vMenuProduccion');
                    break;
                case 'VENTAS':
                    $this->load->view('vMenuClientes');
                    break;
                case 'PRODUCCION':
                    $this->load->view('vMenuProduccion');
                    break;
                case 'RECURSOS HUMANOS':
                    $this->load->view('vMenuProduccion');
                    break;
                case 'FACTURACION':
                    $this->load->view('vMenuFacturacion');
                    break;
                case 'PRODUCCION':
                    $this->load->view('vMenuProduccion');
                    break;
            }

            $this->load->view('vFondo')->view('vImprimeOrdenDeProduccion')->view('vFooter');
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->hormas_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /* REPORTE DE ORDENDEPRODUCCION */

    public function getOrdenDeProduccion() {
        try {
            $pdf = new PDF('L', 'mm', array(215.9, 279.4)); 
            $INICIO = $this->input->post('INICIO');
            $FIN = $this->input->post('FIN');
            $SEMANA = $this->input->post('SEMANA');
            $ANO = $this->input->post('ANIO');
            
            $OP = $this->pedidos_model->getOrdenDeProduccionEntreControles($INICIO,$FIN, $SEMANA, $ANO);

            $pdf->SetFont('Arial', '', 7.5);
            $E = $OP[0];
            $pdf->setPedido($E->Clave);
            $pdf->setCliente($E->ClienteT);
            $pdf->setFecha($E->FechaPedido);
            $pdf->setCiudad($E->Ciudad);
            $pdf->setEstado($E->Estado);
            $pdf->setRFC($E->RFC);
            $pdf->setTel($E->Tel);
            $pdf->setObs($E->OBSCLIENTE);
            $pdf->setDireccion($E->Dir);
            $pdf->setCP($E->CP);
            $pdf->setAgente($E->AgenteT);
            $pdf->setTrasp($E->Transporte);
            $pdf->setRegistro($E->Registro);

            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 10);

            $anchos = array(10/* 0 */, 80/* 0 */, 30/* 1 */, 15/* 2 */);
            $aligns = array('L', 'L', 'L', 'L');
            $pdf->SetAligns($aligns);
            $pdf->SetWidths($anchos);
            $pdf->SetTextColor(0, 0, 0);
            $posi = array(5, 60, 68, 75, 85, 95);
            /* ENCABEZADO DETALLE */

            $pdf->setY(15);
            /* FIN ENCABEZADO DETALLE */

            $pares_totales = 0;
            $total_final = 0;

            /* RESUMEN */
            $pdf->SetFont('Arial', 'B', 7);
            $anchos = array(55/* 0 */, 7/* 1 */, 7/* 2 */, 9/* 3 */, 10/* 4 */, 6.5/* 5 */);
            for ($index = 1; $index < 22; $index++) {
                array_push($anchos, 6.5);
            }
            array_push($anchos, 10); //PRECIO
            array_push($anchos, 15); //TOTAL
            array_push($anchos, 15); //ENTREGA

            $aligns = array('C'/* 0 */, 'C', 'C', 'C', 'C');
            for ($index = 1; $index <= 22; $index++) {
                array_push($aligns, 'C');
            }
            array_push($aligns, 'C'); //PRECIO
            array_push($aligns, 'C'); //TOTAL
            array_push($aligns, 'C'); //ENTREGA

            $pdf->setY(35); //DISTANCIA ENTRE EL ENCABEZADO Y EL DETALLE
            
            /* FOREACH PIEZAS | ARTICULOS | PZXPAR | UNIDAD | CANTIDAD */
            
            /* END FOREACH PIEZAS */

            /* TOTALES */
            $Y = $pdf->GetY();
            $pdf->SetX(46);
            $pdf->SetFont('Arial', 'BI', 7);
            $aligns = array('C', 'C');
            $pdf->SetAligns($aligns);
            $pdf->SetWidths(array(15, 32));
            $pdf->setFilled(true);
            $pdf->setBorders(1);
            $pdf->Row(array("PARES", $pares_totales));
            $pdf->SetY($Y);
            $pdf->SetX(231);
            $pdf->SetAligns($aligns);
            $pdf->SetWidths(array(15, 30));
            $pdf->Row(array("TOTAL", "" . number_format($total_final, 3, ".", ",")));

            /* FIN RESUMEN */
            $path = 'uploads/Reportes/OrdenesDeProduccion';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            if (delete_files('uploads/Reportes/OrdenesDeProduccion/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $file_name = "OrdenesDeProduccion_" . date("d_m_Y_his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */

            $pdf->Output($url);
            $this->onLog("GENERO UN REPORTE DE ORDEN DE PRODUCCIÓN $IDX");
            print base_url() . $url;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onLog($Accion) {
        try {
            /* LOG TO ACCIONS */
            $xlog = array();
            $xlog["Empresa"] = $this->session->Empresa;
            $xlog["Tipo"] = $this->session->TipoAcceso;
            $xlog["IdUsuario"] = $this->session->ID;
            $xlog["Usuario"] = $this->session->Nombre . " " . $this->session->Apellidos;
            $xlog["Modulo"] = "IMPRIME ORDEN DE PRODUCCION";
            $xlog["Accion"] = $this->session->Nombre . " " . $this->session->Apellidos . ":" . $Accion;
            $xlog["Fecha"] = Date('d/m/Y');
            $xlog["Hora"] = Date('h:i:s a');
            $xlog["Dia"] = Date('d');
            $xlog["Mes"] = Date('m');
            $xlog["Anio"] = Date('Y');
            $xlog["Registro"] = Date('d/m/Y h:i:s a');
            $xlog["Padre"] = $this->getPadre();
            $xlog["Hijo"] = $this->getHijo();
            $xlog["Estatus"] = 'ACTIVO';
            $this->db->insert('logs', $xlog);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
