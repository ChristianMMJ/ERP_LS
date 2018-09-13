<?php

/* NO TOCAR */
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class OrdenCompra extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('ordencompra_model')->helper('reportesCompras_helper')->helper('file');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');

            switch ($this->session->userdata["TipoAcceso"]) {
                case 'SUPER ADMINISTRADOR':
                    $this->load->view('vNavGeneral');
                    $this->load->view('vMenuMateriales');
                    break;
                case 'ALMACEN':
                    $this->load->view('vMenuMateriales');
                    break;
            }

            $this->load->view('vFondo');
            $this->load->view('vOrdenCompra');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->ordencompra_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getOrdenCompraByID() {
        try {
            print json_encode($this->ordencompra_model->getOrdenCompraByID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPrecioCompraByArticuloByProveedor() {
        try {
            print json_encode($this->ordencompra_model->getPrecioCompraByArticuloByProveedor($this->input->get('Articulo'), $this->input->get('Proveedor')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPorcentajesCompraByProveedor() {
        try {
            print json_encode($this->ordencompra_model->getPorcentajesCompraByProveedor($this->input->get('Proveedor')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getArticuloByDeptoByProveedor() {
        try {
            print json_encode($this->ordencompra_model->getArticuloByDeptoByProveedor($this->input->get('Departamento'), $this->input->get('Proveedor')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaquilas() {
        try {
            print json_encode($this->ordencompra_model->getMaquilas($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getProveedores() {
        try {
            print json_encode($this->ordencompra_model->getProveedores());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarSemanasProduccion() {
        try {
            print json_encode($this->ordencompra_model->onComprobarSemanasProduccion($this->input->get('Clave'), $this->input->get('Ano')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarMaquilas() {
        try {
            print json_encode($this->ordencompra_model->onComprobarMaquilas($this->input->get('Clave')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFolio() {
        try {
            print json_encode($this->ordencompra_model->getFolio($this->input->get('tp')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $x = $this->input;
            $datos = array(
                'Tp' => $x->post('Tp'),
                'Proveedor' => $x->post('Proveedor'),
                'Tipo' => $x->post('Tipo'),
                'Folio' => $x->post('Folio'),
                'FechaOrden' => $x->post('FechaOrden'),
                'FechaCaptura' => Date('d/m/Y'),
                'FechaEntrega' => $x->post('FechaEntrega'),
                'ConsignarA' => $x->post('ConsignarA'),
                'Sem' => $x->post('Sem'),
                'Maq' => $x->post('Maq'),
                'Ano' => $x->post('Ano'),
                'Observaciones' => $x->post('Observaciones'),
                'Estatus' => 'ACTIVO',
                'Usuario' => $this->session->userdata('ID')
            );
            $ID = $this->ordencompra_model->onAgregar($datos);
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarCompraPartida() {
        try {
            $x = $this->input;
            $datos = array(
                'Tp' => $x->post('Tp'),
                'Proveedor' => $x->post('Proveedor'),
                'Tipo' => $x->post('Tipo'),
                'Folio' => $x->post('Folio'),
                'FechaOrden' => $x->post('FechaOrden'),
                'FechaCaptura' => Date('d/m/Y'),
                'FechaEntrega' => $x->post('FechaEntrega'),
                'ConsignarA' => $x->post('ConsignarA'),
                'Sem' => $x->post('Sem'),
                'Maq' => $x->post('Maq'),
                'Ano' => $x->post('Ano'),
                'Observaciones' => $x->post('Observaciones'),
                'Estatus' => $x->post('Estatus'),
                'Usuario' => $this->session->userdata('ID')
            );
            $ID = $this->ordencompra_model->onAgregar($datos);
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onCerrarOrden() {
        try {
            $x = $this->input;
            $datos = array(
                'Estatus' => 'CERRADA',
            );
            $this->ordencompra_model->onModificar($x->post('ID'), $datos);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onCerrarOrdenAnterior() {
        try {
            $x = $this->input;
            $datos = array(
                'Tp' => '1',
                'Estatus' => 'CERRADA',
            );
            $this->ordencompra_model->onModificar($x->post('ID'), $datos);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->ordencompra_model->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /* DETALLE */

    public function getDetalleParaSepararByID() {
        try {
            print json_encode($this->ordencompra_model->getDetalleParaSepararByID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetalleByID() {
        try {
            print json_encode($this->ordencompra_model->getDetalleByID($this->input->post('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarDetalle() {
        try {
            $e = $this->input;
            $this->db->insert("ordencompradetalle", array(
                'OrdenCompra' => $e->post('OrdenCompra'),
                'Articulo' => $e->post('Articulo'),
                'Cantidad' => $e->post('Cantidad'),
                'Precio' => $e->post('Precio'),
                'Subtotal' => $e->post('SubTotal')
            ));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalleByID() {
        try {
            $this->ordencompra_model->onEliminarDetalleByID($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDetalle() {
        try {
            $e = $this->input;

            $datos = array(
                'Cantidad' => $e->post('Cantidad'),
                'Subtotal' => $e->post('SubTotal')
            );
            $this->ordencompra_model->onModificarDetalle($e->post('ID'), $datos);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /* REPORTES */

    public function onImprimirOrdenCompra() {
        $Movs = json_decode($this->input->post('movs'));
        $cm = $this->ordencompra_model;
        if (!empty($Movs)) {
            $pdf = new PDF('L', 'mm', array(215.9, 279.4));
            foreach ($Movs as $k => $v) {

                $ID_MOV = $v->ID;
                if ($ID_MOV > 0) {
                    //$ID_MOV_N = $v->ID2;
                    $DatosEmpresa = $cm->getDatosEmpresa();
                    $OrdenCompra = $cm->getReporteOrdenCompra($ID_MOV);

                    $pdf->Logo = $DatosEmpresa[0]->Logo;
                    $pdf->Empresa = $DatosEmpresa[0]->Empresa;
                    $pdf->Direccion = $DatosEmpresa[0]->Direccion;
                    $pdf->Direccion2 = $DatosEmpresa[0]->Direccion2;
                    $pdf->FechaOrden = $OrdenCompra[0]->FechaOrden;
                    $pdf->FechaCaptura = $OrdenCompra[0]->FechaCaptura;
                    $pdf->ClaveProveedor = $OrdenCompra[0]->Proveedor;
                    $pdf->Proveedor = $OrdenCompra[0]->NombreProveedor;
                    $pdf->Observaciones = $OrdenCompra[0]->Observaciones;
                    $pdf->ConsignarA = $OrdenCompra[0]->ConsignarA;
                    $pdf->Folio = $OrdenCompra[0]->Folio;
                    $pdf->Estatus = $OrdenCompra[0]->Estatus;

                    $pdf->AddPage();
                    $pdf->SetAutoPageBreak(true, 26.9);

                    $SubTotal = 0;
                    $TotalCantidad = 0;
                    foreach ($OrdenCompra as $keyFT => $F) {
                        $pdf->SetLineWidth(0.25);
                        $pdf->SetX(5);
                        $pdf->SetFont('Arial', '', 8);
                        $anchos = array(10/* 0 */, 65/* 1 */, 20/* 2 */, 20/* 3 */, 20/* 4 */, 20/* 5 */, 15/* 6 */, 15/* 7 */, 27/* 8 */, 27/* 9 */, 30/* 10 */);
                        $aligns = array('L', 'L', 'L', 'L', 'L', 'L', 'L', 'L', 'L', 'L', 'L');
                        $pdf->SetAligns($aligns);
                        $pdf->SetWidths($anchos);

                        $pdf->Row(array(
                            utf8_decode($F->Articulo),
                            mb_strimwidth(utf8_decode($F->NombreArticulo), 0, 60, "..."),
                            number_format($F->Cantidad, 2, ".", ","),
                            utf8_decode($F->Unidad),
                            '$' . number_format($F->Precio, 2, ".", ","),
                            '$' . number_format($F->SubTotal, 2, ".", ","),
                            $F->Sem,
                            $F->Maq,
                            '',
                            '',
                            utf8_decode($F->FechaEntrega)
                        ));
                        //TOTALES GRUPOS
                        $SubTotal += $F->SubTotal;
                        $TotalCantidad += $F->Cantidad;
                    }
                    $pdf->SetFont('Arial', 'B', 9);
                    $pdf->RowNoBorder(array('', '', number_format($TotalCantidad, 2, ".", ","), '',
                        'Subtotal:', '$' . number_format($SubTotal, 2, ".", ","), '', '', '', '', ''
                    ));

                    //Pintamos el IVA si es TP 1
                    if ($OrdenCompra[0]->Tp === '1') {
                        $IVA = $SubTotal * 0.16;
                        $Total = $SubTotal + $IVA;
                        $pdf->RowNoBorder(array('', '', '', '', 'IVA:', '$' . number_format($IVA, 2, ".", ","), '', '', '', '', ''));
                        $pdf->RowNoBorder(array('', '', '', '', 'Total:', '$' . number_format($Total, 2, ".", ","), '', '', '', '', ''));
                    }
                }
            }

            /* FIN RESUMEN */
            $path = 'uploads/Reportes/OrdenesCompra';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "ORDEN DE COMPRA " . date("d-m-Y his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/OrdenesCompra/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

}
