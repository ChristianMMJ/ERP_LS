<?php

header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class IOrdenDeProduccion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('Iordendeproduccion_model')->helper('ordendeproduccion_helper');
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

            $this->load->view('vFondo')->view('vIOrdenDeProduccion')->view('vFooter');
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->Hormas_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /* REPORTE DE ORDENDEPRODUCCION */

    public function getOrdenDeProduccion() {
        try {
            $pdf = new PDF('P', 'mm', array(215.9, 279.4));
            $INICIO = $this->input->post('INICIO');
            $FIN = $this->input->post('FIN');
            $SEMANA = $this->input->post('SEMANA');
            $ANO = $this->input->post('ANIO');

            $CONTROLES = $this->Iordendeproduccion_model->getControlesXOrdenDeProduccionEntreControles($INICIO, $FIN, $SEMANA, $ANO);
            foreach ($CONTROLES as $kc => $vc) {
                $OP = $this->Iordendeproduccion_model->getOrdenDeProduccionEntreControles($vc->ControlT, $vc->ControlT, $SEMANA, $ANO);
                $DEPARTAMENTOS = $this->Iordendeproduccion_model->getDepartamentosXOrdenDeProduccionEntreControles($vc->ControlT, $vc->ControlT, $SEMANA, $ANO);
                $pdf->SetFont('Arial', '', 7);
                $P = $OP[0];
                $pdf->setCliente($P->Clave . " " . $P->Cliente);
                $pdf->setFechaEntrega($P->FechaEntrega);
                $pdf->setControl($P->ControlT);
                $pdf->setFechaPedido($P->FechaPedido);
                $pdf->setPedido($P->Pedido);
                $pdf->setEstilo($P->Estilo . "       " . $P->Color . "  " . $P->ColorT);
                $pdf->setAgente($P->Agente);
                $pdf->setTrasp($P->Transporte);
                /* PIELES */
                $pdf->setPiel1($P->Piel1);
                $pdf->setPiel2($P->Piel2);
                $pdf->setPiel3($P->Piel3);
                $pdf->setPiel4($P->Piel4);
                $pdf->setPiel5($P->Piel5);
                $pdf->setPiel6($P->Piel6);

                $pdf->setCantidadPiel1($P->CantidadPiel1);
                $pdf->setCantidadPiel2($P->CantidadPiel2);
                $pdf->setCantidadPiel3($P->CantidadPiel3);
                $pdf->setCantidadPiel4($P->CantidadPiel4);
                $pdf->setCantidadPiel5($P->CantidadPiel5);
                $pdf->setCantidadPiel6($P->CantidadPiel6);
                $pdf->setTotalPiel($P->TotalPiel);

                /* FORRO */
                $pdf->setForro1($P->Forro1);
                $pdf->setForro2($P->Forro2);
                $pdf->setForro3($P->Forro3);

                $pdf->setCantidadForro1($P->CantidadForro1);
                $pdf->setCantidadForro2($P->CantidadForro2);
                $pdf->setCantidadForro3($P->CantidadForro3);
                $pdf->setTotalForro($P->TotalForro);

                /* SINTETICO */
                $pdf->setSintetico1($P->Sintetico1);
                $pdf->setSintetico2($P->Sintetico2);
                $pdf->setSintetico3($P->Sintetico3);

                $pdf->setCantidadSintetico1($P->CantidadSintetico1);
                $pdf->setCantidadSintetico2($P->CantidadSintetico2);
                $pdf->setCantidadSintetico3($P->CantidadSintetico3);
                $pdf->setTotalSintetico($P->TotalSintetico);

                $pdf->setSerie($P->SerieCorrida);
                $pdf->setT1($P->S1);
                $pdf->setT2($P->S2);
                $pdf->setT3($P->S3);
                $pdf->setT4($P->S4);
                $pdf->setT5($P->S5);
                $pdf->setT6($P->S6);
                $pdf->setT7($P->S7);
                $pdf->setT8($P->S8);
                $pdf->setT9($P->S9);
                $pdf->setT10($P->S10);
                $pdf->setT11($P->S11);
                $pdf->setT12($P->S12);
                $pdf->setT13($P->S13);
                $pdf->setT14($P->S14);
                $pdf->setT15($P->S15);
                $pdf->setT16($P->S16);
                $pdf->setT17($P->S17);
                $pdf->setT18($P->S18);
                $pdf->setT19($P->S19);
                $pdf->setT20($P->S20);
                $pdf->setT21($P->S21);
                $pdf->setT22($P->S22);
                $pdf->setEstatusProduccion($P->EstatusProduccion);
                $pdf->setLinea($P->Linea);
                $pdf->setLineaT($P->LineaT);
                $pdf->setPares($P->Pares);
                $pdf->setC1($P->C1);
                $pdf->setC2($P->C2);
                $pdf->setC3($P->C3);
                $pdf->setC4($P->C4);
                $pdf->setC5($P->C5);
                $pdf->setC6($P->C6);
                $pdf->setC7($P->C7);
                $pdf->setC8($P->C8);
                $pdf->setC9($P->C9);
                $pdf->setC10($P->C10);
                $pdf->setC11($P->C11);
                $pdf->setC12($P->C12);
                $pdf->setC13($P->C13);
                $pdf->setC14($P->C14);
                $pdf->setC15($P->C15);
                $pdf->setC16($P->C16);
                $pdf->setC17($P->C17);
                $pdf->setC18($P->C18);
                $pdf->setC19($P->C19);
                $pdf->setC20($P->C20);
                $pdf->setC21($P->C21);
                $pdf->setC22($P->C22);

                $pdf->AddPage();
                $pdf->SetAutoPageBreak(true, 10);

                $anchos = array(35, 40, 8, 10, 10, 35, 40, 8, 10, 10);
                $aligns = array('L', 'L', 'L', 'L', 'L');
                $pdf->SetTextColor(0, 0, 0);
                /* RESUMEN */
                $pdf->SetFont('Arial', 'B', 7);
                $pdf->setY(52); //DISTANCIA ENTRE EL ENCABEZADO Y EL DETALLE

                /* FOREACH PIEZAS | ARTICULOS | PZXPAR | UNIDAD | CANTIDAD */
                $PUNTO_INICIAL = $pdf->GetY();
                $COLUMN = 1;
                $X = 108;
                $Y = $pdf->GetY();

                foreach ($DEPARTAMENTOS as $dk => $dv) {
                    if ($COLUMN === 2) {
                        $pdf->Cell(200, 3.5, "", 0/* BORDE */, 1/* SALTO NO */, 'C', 0);
                    }
                    $pdf->setFilled(false);
                    $pdf->setBorders(0);
                    $pdf->SetFont('Arial', 'B', 7);

                    $pdf->SetX(5);
                    $pdf->Cell(25, 3.5, $dv->DEPARTAMENTOT, 1/* BORDE */, 1, 'C', 0);
                    /* FIN TALLAS */
                    $pdf->setAlto(3.5);
                    $col = array(5/* 0 */, 30/* 1 */, 80/* 2 */, 88/* 3 */, 98/* 4 */, 108/* 5 */, 133/* 6 */, 183/* 7 */, 191/* 8 */, 201/* 9 */);
                    $anc = array(25, 50, 8, 10, 10);
                    $alto_celda = 3.5;
                    $COLUMN = 1;
                    foreach ($OP as $k => $v) {
                        /* PRIMER DETALLE */
                        if ($vc->ControlT === $v->ControlT && $v->DEPARTAMENTO === $dv->DEPARTAMENTO) {
                            $pdf->SetFont('Arial', '', 5);
                            switch ($COLUMN) {
                                case 1:
                                    $COLUMN += 1;
                                    $pdf->SetX($col[0]);
                                    $pdf->Cell($anc[0], $alto_celda, utf8_decode($v->PIEZA), 0/* BORDE */, 0, 'L', 0);

                                    $pdf->SetX($col[1]);
                                    $pdf->Cell($anc[1], $alto_celda, utf8_decode($v->ARTICULOT) . " " . $v->CLASIFICACION, 0/* BORDE */, 0, 'L', 0);

                                    $pdf->SetX($col[2]);
                                    $pdf->Cell($anc[2], $alto_celda, $v->PZXPAR, 0/* BORDE */, 0, 'C', 0);

                                    $pdf->SetX($col[3]);
                                    $pdf->Cell($anc[3], $alto_celda, $v->UNIDAD, 0/* BORDE */, 0, 'C', 0);

                                    $pdf->SetX($col[4]);
                                    $pdf->Cell($anc[4], $alto_celda, $v->CANTIDAD, 0/* BORDE */, 0/* SALTO NO */, 'R', 0);
                                    $pdf->Line(5, $pdf->GetY() + $alto_celda, 108, $pdf->GetY() + $alto_celda);
                                    break;
                                case 2:
                                    $COLUMN = 1;
                                    $pdf->SetX($col[5]);
                                    $pdf->Cell($anc[0], $alto_celda, utf8_decode($v->PIEZA), 0/* BORDE */, 0, 'L', 0);

                                    $pdf->SetX($col[6]);
                                    $pdf->Cell($anc[1], $alto_celda, utf8_decode($v->ARTICULOT) . " " . $v->CLASIFICACION, 0/* BORDE */, 0, 'L', 0);

                                    $pdf->SetX($col[7]);
                                    $pdf->Cell($anc[2], $alto_celda, $v->PZXPAR, 0/* BORDE */, 0, 'C', 0);

                                    $pdf->SetX($col[8]);
                                    $pdf->Cell($anc[3], $alto_celda, $v->UNIDAD, 0/* BORDE */, 0, 'C', 0);

                                    $pdf->SetX($col[9]);
                                    $pdf->Cell($anc[4], $alto_celda, $v->CANTIDAD, 0/* BORDE */, 1/* SALTO SI */, 'R', 0);
                                    $pdf->Line(108, $pdf->GetY(), 210, $pdf->GetY());
                                    break;
                            }
                            /* FIN PRIMER DETALLE */
                        }
                    }
//                    $pdf->Rect(5, $PUNTO_INICIAL, 104/* DER-X */, $pdf->GetY()/* DER-Y */);
                }
                $pdf->Line(5, $Y, 5, $pdf->GetY());
                $pdf->Line(108, $Y, 108, $pdf->GetY());
                $pdf->Line(210, $Y, 210, $pdf->GetY());
                $pdf->SetFont('Arial', 'B', 14);
                $pdf->SetX(5);
                $pdf->Cell(53, 10, "", 0/* BORDE */, 0/* SALTO SI */, 'C', 0);
                                
                $pdf->Code128(5/* X */, $pdf->GetY()/* Y */, $vc->ControlT/* TEXT */, 53/* ANCHO */, 6/* ALTURA */);
                $pdf->SetFont('Arial', 'B', 8);
                $pdf->SetX(58);
                $pdf->Cell(152, 6, utf8_decode("* LEA CUIDADOSAMENTE LAS INSTRUCCIONES, CUALQUIER ERROR LE SERÁ CARGADO *"), 0/* BORDE */, 1/* SALTO SI */, 'C', 0);
                /* END FOREACH PIEZAS */

                /* TOTALES */
                $Y = $pdf->GetY();
                $pdf->SetX(46);
                $pdf->SetFont('Arial', 'BI', 7);
                $aligns = array('C', 'C');
                $pdf->SetAligns($aligns);
                $pdf->SetWidths(array(15, 32));
                $pdf->setFilled(FALSE);
                $pdf->setBorders(0);
//            $pdf->Row(array("PARES", $pares_totales));
                $pdf->SetY($Y);
                $pdf->SetX(231);
                $pdf->SetAligns($aligns);
                $pdf->SetWidths(array(15, 30));
                $pdf->Row(array("TOTAL", "" . number_format(0, 3, ".", ",")));
            }

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
            $this->onLog("GENERO UN REPORTE DE ORDEN DE PRODUCCIÓN");
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
