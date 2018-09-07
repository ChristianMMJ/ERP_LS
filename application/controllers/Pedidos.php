<?php

/* NO TOCAR */
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->helper('pedido_helper')->model('pedidos_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            switch ($this->session->userdata["TipoAcceso"]) {
                case 'SUPER ADMINISTRADOR':
                    $this->load->view('vNavGeneral')->view('vMenuClientes');
                    break;
                case 'ADMINISTRACION':
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
                case 'DISEÑO Y DESARROLLO':
                    $this->load->view('vMenuDisDes');
                    break;
                case 'ALMACEN':
                    $this->load->view('vMenuAlmacen');
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
            print json_encode($this->pedidos_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPedidosByID() {
        try {
            print json_encode($this->pedidos_model->getPedidosByID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getID() {
        try {
            print json_encode($this->pedidos_model->getID());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarClave() {
        try {
            print json_encode($this->pedidos_model->onComprobarClave($this->input->get('Clave')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getClientes() {
        try {
            print json_encode($this->pedidos_model->getClientes());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getAgentes() {
        try {
            print json_encode($this->pedidos_model->getAgentes());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            print json_encode($this->pedidos_model->getEstilos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getColoresXEstilo() {
        try {
            print json_encode($this->pedidos_model->getColoresXEstilo($this->input->get('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaquilas() {
        try {
            print json_encode($this->pedidos_model->getMaquilas());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getAnosValidos() {
        try {
            print json_encode($this->pedidos_model->getAnosValidos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaquilaSerieXEstilo() {
        try {
            print json_encode($this->pedidos_model->getMaquilaSerieXEstilo($this->input->get('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getProduccionMaquilaSemana() {
        try {
            print json_encode($this->pedidos_model->getProduccionMaquilaSemana($this->input->get('Maquila'), $this->input->get('Semana')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getAgenteXCliente() {
        try {
            print json_encode($this->pedidos_model->getAgenteXCliente($this->input->get('Cliente')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSemanaXFechaDeEntrega() {
        try {
            print json_encode($this->pedidos_model->getSemanaXFechaDeEntrega($this->input->get('Fecha')));
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
            $ID = $this->pedidos_model->onAgregar($data);
            $Detalle = json_decode($this->input->post("Detalle"));
            foreach ($Detalle as $key => $v) {
                $dt = date_parse($v->FechaEntrega);
                $data = array(
                    "Pedido" => $ID,
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
                $data["Registro"] = Date('d/m/Y h:i:s');
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
                $data["Registro"] = Date('d/m/Y h:i:s');
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

    function onImprimirPedido() {
        try {
            $pdf = new PDF('L', 'mm', array(215.9, 279.4));
            $Pedido = $this->pedidos_model->getPedidoByID($this->input->post('ID'));
            $Series = $this->pedidos_model->getSerieXPedido($this->input->post('ID'));

            $pdf->SetFont('Arial', '', 7.5);
            $Encabezado = $Pedido[0];
            $pdf->setPedido($Encabezado->Clave);
            $pdf->setCliente($Encabezado->ClienteT);
            $pdf->setFecha($Encabezado->FechaPedido);
            $pdf->setCiudad($Encabezado->Ciudad);
            $pdf->setEstado($Encabezado->Estado);
            $pdf->setRFC($Encabezado->RFC);
            $pdf->setTel($Encabezado->Tel);
            $pdf->setObs($Encabezado->Obs);
            $pdf->setDireccion($Encabezado->Dir);
            $pdf->setCP($Encabezado->CP);
            $pdf->setAgente($Encabezado->AgenteT);
            $pdf->setTrasp($Encabezado->Transporte);

            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 10);

            $anchos = array(10/* 0 */, 80/* 0 */, 30/* 1 */, 15/* 2 */);
            $aligns = array('L', 'L', 'L', 'L');
            $pdf->SetAligns($aligns);
            $pdf->SetWidths($anchos);
            $pdf->SetTextColor(0, 0, 0);
            $posi = array(5, 60, 68, 75, 85, 95);
            /* ENCABEZADO DETALLE */
            $pdf->SetFont('Arial', 'B', 6.5);

            $pdf->SetFillColor(225, 225, 234);
            $pdf->SetY(27.5);
            $pdf->SetX($posi[0]);
            $pdf->Cell(55, 3, "Estilo - Color", 1/* BORDE */, 0, 'L', 1);
            $pdf->SetX($posi[1]);
            $pdf->Cell(7, 3, "Maq", 1/* BORDE */, 0, 'L', 1);
            $pdf->SetX(67);
            $pdf->Cell(7, 3, "Sem", 1/* BORDE */, 0, 'L', 1);
            $pdf->SetX(74);
            $pdf->Cell(9, 3, "Recio", 1/* BORDE */, 0, 'C', 1);
            $pdf->SetX(83);
            $pdf->Cell(10, 3, "Pares", 1/* BORDE */, 0, 'C', 1);
            $base_x = 93;
            $pdf->SetFont('Arial', 'B', 5.5);
            for ($index = 1; $index <= 22; $index++) {
                $pdf->SetX($base_x);
                $pdf->Cell(6.5, 3, "CA$index", 1/* BORDE */, 0, 'C', 1);
                $base_x += 6.5;
            }
            $pdf->SetX($base_x);
            $pdf->Cell(10, 3, "Precio", 1/* BORDE */, 0, 'C', 1);
            $base_x += 10;
            $pdf->SetX($base_x);
            $pdf->Cell(15, 3, "Total", 1/* BORDE */, 0, 'C', 1);
            $base_x += 15;
            $pdf->SetX($base_x);
            $pdf->Cell(15, 3, "Entrega", 1/* BORDE */, 1, 'C', 1);
            /* FIN ENCABEZADO DETALLE */

            $pares_totales = 0;
            $total_final = 0;

//            foreach ($Series as $sk => $sv) {
//                print "\n * * * Serie" . $sv->Serie . " * * * \n";
//                foreach ($Pedido as $k => $v) {
//                    if ($sv->Serie === $v->Serie) {
//                        print $v->EstiloT . "/" . $v->ColorT . "/Pares: " . $v->Pares . "\n";
//                    }
//                }
//            }
//            print "\n";
            /* RESUMEN */

            $pdf->SetFont('Arial', 'B', 7);
            $anchos = array(55/* 0 */, 7/* 1 */, 7/* 2 */, 9/* 3 */, 10/* 4 */, 6.5/* 5 */);
            for ($index = 1; $index < 22; $index++) {
                array_push($anchos, 6.5);
            }
            array_push($anchos, 10); //PRECIO
            array_push($anchos, 15); //TOTAL
            array_push($anchos, 15); //ENTREGA

            $aligns = array('L'/* 0 */, 'C', 'C', 'C', 'C');
            for ($index = 1; $index <= 22; $index++) {
                array_push($aligns, 'C');
            }
            array_push($aligns, 'C'); //PRECIO
            array_push($aligns, 'L'); //TOTAL
            array_push($aligns, 'C'); //ENTREGA

            foreach ($Series as $sk => $sv) {
                /* TALLAS */
                $pdf->SetFont('Arial', 'B', 6);
                $pdf->SetX($posi[0]);
                $pdf->SetAligns($aligns);
                $pdf->SetWidths(array(88, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 6.5, 40));
                $row_serie = array();
                array_push($row_serie, '');
                for ($index = 1; $index <= 22; $index++) {
                    array_push($row_serie, $sv->{"T$index"});
                }
                array_push($row_serie, ''); 
                $pdf->setFilled(true);
                $pdf->setBorders(1);
                $pdf->Row($row_serie);
                $pdf->setFilled(false);
                $pdf->setBorders(0);
                /* FIN TALLAS */
                foreach ($Pedido as $k => $v) {
                    /* PRIMER DETALLE */
                    if ($sv->Serie === $v->Serie) {
                        $pdf->SetAligns($aligns);
                        $pdf->SetWidths($anchos);
                        $pdf->SetX($posi[0]);
                        $pdf->SetFont('Arial', '', 6);
                        $row = array();
                        array_push($row, $v->EstiloT . "/" . $v->ColorT);
                        array_push($row, $v->Maquila);
                        array_push($row, $v->Semana);
                        array_push($row, $v->Recio);
                        array_push($row, $v->Pares);
                        for ($index = 1; $index <= 22; $index++) {
                            array_push($row, $v->{"C$index"});
                        }
                        array_push($row, number_format($v->Precio, 3, ".", ",")); //PRECIO
                        array_push($row, number_format(($v->Pares * $v->Precio), 3, ".", ",")); //TOTAL
                        array_push($row, $v->FechaEntrega); //ENTREGA
                        $pdf->Row($row);
                        $pares_totales += $v->Pares;
                        $total_final += ($v->Pares * $v->Precio);
                        /* FIN PRIMER DETALLE */

                        /* SEGUNDO DETALLE */

                        /* SEGUNDO DETALLE */
                    }
                }
            }
            /* TOTALES */
            $pdf->SetX(5);
            $pdf->SetFont('Arial', 'BI', 7);
            $anchos = array(55/* 0 */, 23/* 0 */, 10/* 0 */, 143/* 1 */, 10/* 2 */, 30/* 3 */, 10/* 3 */);
            $aligns = array('R', 'C', 'C', 'R', 'L', 'L');
            $pdf->SetAligns($aligns);
            $pdf->SetWidths($anchos);
            $pdf->Row(array("", "Pares x pedido", $pares_totales, "", "Total", "$" . number_format($total_final, 3, ".", ",")));

            /* FIN RESUMEN */
            $path = 'uploads/Reportes/Pedidos';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "Pedido " . date("d-m-Y_his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */

            $pdf->Output($url);
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
