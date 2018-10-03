<?php

/* NO TOCAR */
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->helper('Pedido_helper')->model('Pedidos_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            switch ($this->session->userdata["TipoAcceso"]) {
                case 'SUPER ADMINISTRADOR':
                    $this->load->view('vNavGeneral');
                    //Validamos que no venga vacia y asignamos un valor por defecto
                    $Origen = isset($_GET['origen']) ? $_GET['origen'] : "";
                    if ($Origen === 'PRODUCCION') {
                        $this->load->view('vMenuProduccion');
                    } else if ($Origen === 'CLIENTES') {
                        $this->load->view('vMenuClientes');
                    } else {
                        $this->load->view('vMenuPrincipal');
                    }
                    break;
                case 'CLIENTES':
                    $this->load->view('vMenuAdministracion');
                    break;
                case 'CONTABILIDAD':
                    $this->load->view('vMenuContabilidad');
                    break;
                case 'RECURSOS HUMANOS':
                    $this->load->view('vMenuRecursosHumanos');
                    break;
                case 'INGENIERIA':
                    $this->load->view('vMenuIngenieria');
                    break;
                case 'PRODUCCION':
                    $this->load->view('vMenuProduccion');
                    break;
            }

            $this->load->view('vFondo')->view('vPedidos')->view('vFooter');
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->Pedidos_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPedidosByID() {
        try {
            print json_encode($this->Pedidos_model->getPedidosByID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarSemanaMaquila() {
        try {
            print json_encode($this->Pedidos_model->onComprobarSemanaMaquila($this->input->get('MAQUILA'), $this->input->get('SEMANA')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onChecarSemanaValida() {
        try {
            print json_encode($this->Pedidos_model->onChecarSemanaValida($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCapacidadMaquila() {
        try {
            print json_encode($this->Pedidos_model->getCapacidadMaquila($this->input->get('CLAVE'), $this->input->get('SEMANA')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getID() {
        try {
            print json_encode($this->Pedidos_model->getID());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarClave() {
        try {
            print json_encode($this->Pedidos_model->onComprobarClave($this->input->get('Clave')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onVerificarByID() {
        try {
            print json_encode($this->Pedidos_model->onVerificarByID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getClientes() {
        try {
            print json_encode($this->Pedidos_model->getClientes());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getAgentes() {
        try {
            print json_encode($this->Pedidos_model->getAgentes());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            print json_encode($this->Pedidos_model->getEstilos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getColoresXEstilo() {
        try {
            print json_encode($this->Pedidos_model->getColoresXEstilo($this->input->get('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaquilas() {
        try {
            print json_encode($this->Pedidos_model->getMaquilas());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getAnosValidos() {
        try {
            print json_encode($this->Pedidos_model->getAnosValidos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaquilaSerieXEstilo() {
        try {
            print json_encode($this->Pedidos_model->getMaquilaSerieXEstilo($this->input->get('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getProduccionMaquilaSemana() {
        try {
            print json_encode($this->Pedidos_model->getProduccionMaquilaSemana($this->input->get('Maquila'), $this->input->get('Semana')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getAgenteXCliente() {
        try {
            print json_encode($this->Pedidos_model->getAgenteXCliente($this->input->get('Cliente')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSemanaXFechaDeEntrega() {
        try {
            print json_encode($this->Pedidos_model->getSemanaXFechaDeEntrega($this->input->get('Fecha')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarClavePedido() {
        try {
            print json_encode($this->Pedidos_model->onComprobarClavePedido($this->input->get('CLAVE')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $x = $this->input;
            $data = array();
            foreach ($x->post() as $key => $v) {
                if ($v !== '') {
                    $data[$key] = ($v !== '') ? strtoupper($v) : NULL;
                }
            }
            unset($data["Observacion"]);
            $data["Observaciones"] = $x->post('Observacion');
            $data["Usuario"] = $_SESSION["USERNAME"];
            $data["Estatus"] = 'A';
            $data["Registro"] = Date('d/m/Y h:i:s');
            unset($data["Detalle"]);
            $ID = $this->Pedidos_model->onAgregar($data);
            $Detalle = json_decode($this->input->post("Detalle"));
            foreach ($Detalle as $key => $v) {
                $dt = date_parse($v->FechaEntrega);
                $data = array(
                    "Pedido" => $data["Clave"],
                    "Estilo" => ($v->Estilo !== '') ? $v->Estilo : NULL,
                    "EstiloT" => ($v->EstiloT !== '') ? $v->EstiloT : NULL,
                    "Color" => ($v->Color !== '') ? $v->Color : NULL,
                    "ColorT" => ($v->ColorT !== '') ? $v->ColorT : NULL,
                    "FechaEntrega" => ($v->FechaEntrega !== '') ? $v->FechaEntrega : NULL,
                    "Maquila" => ($v->Maquila !== '') ? $v->Maquila : NULL,
                    "Semana" => ($v->Semana !== '') ? $v->Semana : NULL,
                    "Ano" => $dt["year"],
                    "Recio" => ($v->Recio !== '') ? $v->Recio : NULL,
                    "Precio" => ($v->Precio !== '') ? $v->Precio : NULL,
                    "Observacion" => ($v->Observacion !== '') ? $v->Observacion : NULL,
                    "ObservacionDetalle" => ($v->ObservacionDetalle !== '') ? $v->ObservacionDetalle : NULL,
                    "Serie" => ($v->Serie !== '') ? $v->Serie : NULL,
                    "Control" => 0,
                    "Pares" => ($v->Pares !== '') ? $v->Pares : NULL,
                    "C1" => ($v->C1 !== '') ? $v->C1 : NULL, "C2" => ($v->C2 !== '') ? $v->C2 : NULL,
                    "C3" => ($v->C3 !== '') ? $v->C3 : NULL, "C4" => ($v->C4 !== '') ? $v->C4 : NULL,
                    "C5" => ($v->C5 !== '') ? $v->C5 : NULL, "C6" => ($v->C6 !== '') ? $v->C6 : NULL,
                    "C7" => ($v->C7 !== '') ? $v->C7 : NULL, "C8" => ($v->C8 !== '') ? $v->C8 : NULL,
                    "C9" => ($v->C9 !== '') ? $v->C9 : NULL, "C10" => ($v->C10 !== '') ? $v->C10 : NULL,
                    "C11" => ($v->C11 !== '') ? $v->C11 : NULL, "C12" => ($v->C12 !== '') ? $v->C12 : NULL,
                    "C13" => ($v->C13 !== '') ? $v->C13 : NULL, "C14" => ($v->C14 !== '') ? $v->C14 : NULL,
                    "C15" => ($v->C15 !== '') ? $v->C15 : NULL, "C16" => ($v->C16 !== '') ? $v->C16 : NULL,
                    "C17" => ($v->C17 !== '') ? $v->C17 : NULL, "C18" => ($v->C18 !== '') ? $v->C18 : NULL,
                    "C19" => ($v->C19 !== '') ? $v->C19 : NULL, "C20" => ($v->C20 !== '') ? $v->C20 : NULL,
                    "C21" => ($v->C21 !== '') ? $v->C21 : NULL, "C22" => ($v->C22 !== '') ? $v->C22 : NULL,
                    "Recibido" => ($v->Recibido !== '') ? $v->Recibido : NULL
                );
                $data["Estatus"] = 'A';
                $data["Registro"] = Date('d/m/Y h:i:s a');
                $this->db->insert("pedidodetalle", $data);
                $this->onLog("AGREGO " . $v->Pares . " PARES AL PEDIDO $ID DEL ESTILO: " . $v->EstiloT . ", COLOR: " . $v->ColorT);
            }
            //RETURN ID
            print '{ "ID":' . $ID . ',"EVT":"Agregar"}';
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            $x = $this->input;
            $Detalle = json_decode($this->input->post("Detalle"));
            foreach ($Detalle as $key => $v) {
                $dt = date_parse($v->FechaEntrega);
                $data = array(
                    "Pedido" => $x->post('Clave'),
                    "Estilo" => ($v->Estilo !== '') ? $v->Estilo : NULL,
                    "EstiloT" => ($v->EstiloT !== '') ? $v->EstiloT : NULL,
                    "Color" => ($v->Color !== '') ? $v->Color : NULL,
                    "ColorT" => ($v->ColorT !== '') ? $v->ColorT : NULL,
                    "FechaEntrega" => ($v->FechaEntrega !== '') ? $v->FechaEntrega : NULL,
                    "Maquila" => ($v->Maquila !== '') ? $v->Maquila : NULL,
                    "Semana" => ($v->Semana !== '') ? $v->Semana : NULL,
                    "Ano" => $dt["year"],
                    "Recio" => ($v->Recio !== '') ? $v->Recio : NULL,
                    "Precio" => ($v->Precio !== '') ? $v->Precio : NULL,
                    "Observacion" => ($v->Observacion !== '') ? $v->Observacion : NULL,
                    "ObservacionDetalle" => ($v->ObservacionDetalle !== '') ? $v->ObservacionDetalle : NULL,
                    "Serie" => ($v->Serie !== '') ? $v->Serie : NULL,
                    "Control" => ($v->Control !== '') ? $v->Control : NULL,
                    "Pares" => ($v->Pares !== '') ? $v->Pares : NULL,
                    "Control" => 0,
                    "C1" => ($v->C1 !== '') ? $v->C1 : NULL, "C2" => ($v->C2 !== '') ? $v->C2 : NULL,
                    "C3" => ($v->C3 !== '') ? $v->C3 : NULL, "C4" => ($v->C4 !== '') ? $v->C4 : NULL,
                    "C5" => ($v->C5 !== '') ? $v->C5 : NULL, "C6" => ($v->C6 !== '') ? $v->C6 : NULL,
                    "C7" => ($v->C7 !== '') ? $v->C7 : NULL, "C8" => ($v->C8 !== '') ? $v->C8 : NULL,
                    "C9" => ($v->C9 !== '') ? $v->C9 : NULL, "C10" => ($v->C10 !== '') ? $v->C10 : NULL,
                    "C11" => ($v->C11 !== '') ? $v->C11 : NULL, "C12" => ($v->C12 !== '') ? $v->C12 : NULL,
                    "C13" => ($v->C13 !== '') ? $v->C13 : NULL, "C14" => ($v->C14 !== '') ? $v->C14 : NULL,
                    "C15" => ($v->C15 !== '') ? $v->C15 : NULL, "C16" => ($v->C16 !== '') ? $v->C16 : NULL,
                    "C17" => ($v->C17 !== '') ? $v->C17 : NULL, "C18" => ($v->C18 !== '') ? $v->C18 : NULL,
                    "C19" => ($v->C19 !== '') ? $v->C19 : NULL, "C20" => ($v->C20 !== '') ? $v->C20 : NULL,
                    "C21" => ($v->C21 !== '') ? $v->C21 : NULL, "C22" => ($v->C22 !== '') ? $v->C22 : NULL,
                    "Recibido" => ($v->Recibido !== '') ? $v->Recibido : NULL
                );
                $data["Estatus"] = 'A';
                $data["Registro"] = Date('d/m/Y h:i:s a');
                $this->db->insert("pedidodetalle", $data);
            }
            //RETURN ID
            print '{ "ID":' . $ID . ',"EVT":"Agregar"}';
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->db->where('ID', $this->input->post('ID'))->delete('pedidodetalle');
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function onImprimirPedidoReducido() {
        try {
            $pdf = new PDF('L', 'mm', array(215.9, 279.4));
            $pdf->AddFont('Calibri', '');
            $pdf->AddFont('Calibri', 'I');
            $pdf->AddFont('Calibri', 'B');
            $pdf->AddFont('Calibri', 'BI');

            $IDX = $this->input->post('ID');
            $Pedido = $this->Pedidos_model->getPedidoByID($IDX);
            $Series = $this->Pedidos_model->getSerieXPedido($IDX);

            $pdf->SetFont('Calibri', '', 7.5);
            $E = $Pedido[0];
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
            $pdf->SetFont('Calibri', 'B', 8);
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
            foreach ($Series as $sk => $sv) {
                /* TALLAS */
                $aligns[0] = 'C';
                $pdf->SetFont('Calibri', 'B', 7);
                $pdf->SetX($posi[0]);
                $pdf->SetAligns($aligns);
                $pdf->SetWidths(array(55, 7, 7, 9, 10, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 10, 15, 15));
                $rs = array();
                array_push($rs, 'Estilo/Color');
                array_push($rs, 'Maq');
                array_push($rs, 'Sem');
                array_push($rs, 'Recio');
                array_push($rs, 'Pares');
                for ($index = 1; $index <= 22; $index++) {
                    array_push($rs, ($sv->{"T$index"} !== '0') ? $sv->{"T$index"} : '');
                }
                array_push($rs, 'Precio');
                array_push($rs, 'Total');
                array_push($rs, 'Entrega');
                $pdf->setFilled(true);
                $pdf->setBorders(1);
                $pdf->setAlto(3);
                $pdf->Row($rs);
                $pdf->setFilled(false);
                $pdf->setBorders(0);
                /* FIN TALLAS */
                foreach ($Pedido as $k => $v) {
                    /* PRIMER DETALLE */
                    if ($sv->Serie === $v->Serie) {
                        $aligns[0] = 'L';
                        $pdf->SetAligns($aligns);
                        $pdf->SetWidths($anchos);
                        $pdf->SetX($posi[0]);
                        $pdf->SetFont('Calibri', '', 7.5);
                        $row = array();
                        $estilo_color = $v->EstiloT . "/" . $v->ColorT;
                        array_push($row, $estilo_color, $v->Maquila, $v->Semana, $v->Recio, $v->Pares); //4 
                        for ($index = 1; $index <= 22; $index++) {
                            array_push($row, ( $v->{"C$index"} !== '0') ? $v->{"C$index"} : '-'); //5
                        }
                        array_push($row, number_format($v->Precio, 2, ".", ",")); //PRECIO 6
                        $precio = ($v->Pares * $v->Precio);
                        if (strlen($precio) >= 12) {
                            $pdf->SetFont('Calibri', '', 7);
                        } else {
                            $pdf->SetFont('Calibri', '', 8);
                        }
                        array_push($row, number_format($precio, 2, ".", ",")); //TOTAL 7
                        array_push($row, $v->FechaEntrega); //ENTREGA 8
                        if (strlen($estilo_color) >= 40) {
                            $pdf->setAlto(3.5);
                        } else {
                            $pdf->setAlto(4.5);
                        }
                        $pdf->SetFont('Calibri', '', 7.5);
                        $pdf->Row($row);
                        $pares_totales += $v->Pares;
                        $total_final += ($v->Pares * $v->Precio);
                        /* FIN PRIMER DETALLE */

                        /* SEGUNDO DETALLE (SUELA) */
                        $suela = array();
                        $suelin = $this->Pedidos_model->getSuelaByArticulo($v->Estilo);
                        $pdf->SetAligns(array('L', 'L', 'L', 'L'));
                        $pdf->SetWidths(array(198.5, 72.5));
                        $pdf->SetX($posi[0]);
                        $pdf->SetFont('Calibri', '', 8);
                        if (count($suelin) > 0) {
                            array_push($suela, 'OBS. ' . $v->OBSTITULO . " | " . $v->OBSCONTENIDO, 'SUELA: ' . $suelin[0]->Suela); //3
                        } else {
                            array_push($suela, 'OBS. ' . $v->OBSTITULO . " | " . $v->OBSCONTENIDO, 'SUELA NO DISPONIBLE'); //3
                        }
                        $pdf->SetFont('Calibri', 'BI', 8);
                        $pdf->Row($suela);
                        /* SEGUNDO DETALLE (SUELA) */
                    }
                }
            }
            /* TOTALES */
            $Y = $pdf->GetY();
            $pdf->SetX(47);
            $pdf->SetFont('Calibri', 'BI', 8);
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
            $path = 'uploads/Reportes/Pedidos';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            if (delete_files('uploads/Reportes/Pedidos/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $file_name = "Pedido $IDX " . date("d_m_Y_his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */

            $pdf->Output($url);
            $this->onLog("GENERO UN REPORTE DEL PEDIDO $IDX");
            print base_url() . $url;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public $Padre = '';
    public $Hijo = '';

    function getPadre() {
        return $this->Padre;
    }

    function getHijo() {
        return $this->Hijo;
    }

    function setPadre($Padre) {
        $this->Padre = $Padre;
    }

    function setHijo($Hijo) {
        $this->Hijo = $Hijo;
    }

    public function onLog($Accion) {
        try {
            /* LOG TO ACCIONS */
            $xlog = array();
            $xlog["Empresa"] = $this->session->Empresa;
            $xlog["Tipo"] = $this->session->TipoAcceso;
            $xlog["IdUsuario"] = $this->session->ID;
            $xlog["Usuario"] = $this->session->Nombre . " " . $this->session->Apellidos;
            $xlog["Modulo"] = "PEDIDOS";
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
