<?php

/* NO TOCAR */
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class RecibeOrdenCompra extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')
                ->model('Recibeordencompra_model')
                ->helper('Reportesrecepcionmat_helper')->helper('file');
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
            $this->load->view('vRecibeOrdenCompra');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->Recibeordencompra_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getOrdenCompra() {
        try {
            print json_encode($this->Recibeordencompra_model->getOrdenCompra($this->input->get('Folio'), $this->input->get('Tp')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onVerificarExisteCompra() {
        try {
            print json_encode($this->Recibeordencompra_model->onVerificarExisteCompra($this->input->get('Doc'), $this->input->get('TpDoc'), $this->input->get('Proveedor')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getArticuloByTpByOC() {
        try {
            print json_encode($this->Recibeordencompra_model->getArticuloByTpByOC($this->input->get('Articulo'), $this->input->get('Tp'), $this->input->get('Oc')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onCerrarCompra() {
        try {
            $Ordenes_Capturadas = json_decode($this->input->post('OCS'));
            $oc_s = array(); //Convertir el array de objetos en array asociativo
            foreach ($Ordenes_Capturadas as $k => $v) {
                array_push($oc_s, array(
                    'Tp' => $v->Tp,
                    'OC' => $v->OC,
                ));
            }
            //Quitar repetivos
            $resultado = array_unique($oc_s, SORT_REGULAR);
            //Cambiar estatus a las ordenes de compra en base a sus Tp y Folio OC
            foreach ($resultado as $k => $v) {
                //Actualiza estatus orden de compra dependiendo de lo que se recibe
                $Cantidades = $this->Recibeordencompra_model->getSumatoriasCantidadesParaEstatus($v['Tp'], $v['OC']);
                $can = $Cantidades[0]->Cantidad;
                $Can_rec = $Cantidades[0]->Cantidad_Rec;
                if ($can > $Can_rec) {
                    $datos = array(
                        'Estatus' => 'PENDIENTE'
                    );
                    $this->Recibeordencompra_model->onModificarEstatusOrdenCompra($v['Tp'], $v['OC'], $datos);
                } else {
                    $datos = array(
                        'Estatus' => 'RECIBIDA'
                    );
                    $this->Recibeordencompra_model->onModificarEstatusOrdenCompra($v['Tp'], $v['OC'], $datos);
                }
            }

            //Actualiza estatus compra a CONCLUIDA
            $this->Recibeordencompra_model->onModificarEstatusCompra($this->input->post('Factura'), $this->input->post('TpDoc'), $this->input->post('Proveedor'));
            //Inserta en mov articulos
            $Compra = $this->Recibeordencompra_model->getCompraParaMovArt($this->input->post('Factura'), $this->input->post('TpDoc'), $this->input->post('Proveedor'));
            foreach ($Compra as $key => $v) {
                $datos = array(
                    'Articulo' => $v->Articulo,
                    'PrecioMov' => $v->Precio,
                    'CantidadMov' => $v->Cantidad,
                    'FechaMov' => $v->FechaDoc,
                    'EntradaSalida' => '1',
                    'TipoMov' => 'EXC',
                    'DocMov' => $v->Doc,
                    'Tp' => $v->Tp,
                    'Maq' => $v->Maq,
                    'OrdenCompra' => $v->OrdenCompra,
                    'Subtotal' => $v->Subtotal
                );
                $this->Recibeordencompra_model->onAgregarMovArt($datos);
                //Graba en movarticulos_fabrica
                if ($v->Maq === '98' || $v->Maq === '97') {
                    $this->Recibeordencompra_model->onAgregarMovArtFabrica($datos);
                }
            }
            //Inserta doc en cartera de proveedores
            $CompraCarProv = $this->Recibeordencompra_model->getCompraParaCartProv($this->input->post('Factura'), $this->input->post('TpDoc'), $this->input->post('Proveedor'));
            $c_cart_p = $CompraCarProv[0];
            $datosCartProv = array(
                'Proveedor' => $c_cart_p->Proveedor,
                'Doc' => $c_cart_p->Doc,
                'FechaDoc' => $c_cart_p->FechaDoc,
                'ImporteDoc' => $c_cart_p->Importe,
                'Pagos_Doc' => 0,
                'Saldo_Doc' => $c_cart_p->Importe,
                'Estatus' => 'SIN PAGAR',
                'Tp' => $c_cart_p->Tp,
                'Moneda' => 'MXN',
                'TipoCambio' => 1,
                'Departamento' => $c_cart_p->Departamento,
                'DocDirecto' => '',
                'Flete' => '',
                'TipoContable' => '',
                'Estatus_Contable' => ''
            );
            $this->Recibeordencompra_model->onAgregarCartProv($datosCartProv);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarCantidadRecibidaByID() {
        try {
            $x = $this->input;
            $datos = array(
                'CantidadRecibida' => $x->post('CantidadRecibida'),
                'Factura' => $x->post('Factura'),
                'FechaFactura' => $x->post('FechaFactura')
            );
            $this->Recibeordencompra_model->onModificar($x->post('ID'), $datos);
            $datosCompra = array(
                'Doc' => $x->post('Factura'),
                'FechaDoc' => $x->post('FechaFactura'),
                'Articulo' => $x->post('Articulo'),
                'Proveedor' => $x->post('Proveedor'),
                'OrdenCompra' => $x->post('OC'),
                'TpOrdenCompra' => $x->post('TpOrdenCompra'),
                'Tp' => $x->post('Tp'),
                'Cantidad' => $x->post('CantidadRecibida'),
                'Precio' => $x->post('Precio'),
                'Subtotal' => $x->post('Subtotal'),
                'Maq' => $x->post('Maq'),
                'Sem' => $x->post('Sem'),
                'Departamento' => $x->post('Departamento'),
                'Estatus' => 'BORRADOR',
                'Registro' => date("d/m/Y")
            );
            $this->Recibeordencompra_model->onAgregar($datosCompra);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarCantidadRecibidaByArtByOCByTp() {
        try {
            $x = $this->input;
            $datos = array(
                'CantidadRecibida' => $x->post('CantidadRecibida'),
                'Factura' => $x->post('Factura'),
                'FechaFactura' => $x->post('FechaFactura')
            );
            $this->Recibeordencompra_model->onModificarCantidadRecibidaByArtByOCByTp($x->post('Articulo'), $x->post('OC'), $x->post('TpOrdenCompra'), $datos);

            $datosCompra = array(
                'Doc' => $x->post('Factura'),
                'FechaDoc' => $x->post('FechaFactura'),
                'Articulo' => $x->post('Articulo'),
                'Proveedor' => $x->post('Proveedor'),
                'OrdenCompra' => $x->post('OC'),
                'TpOrdenCompra' => $x->post('TpOrdenCompra'),
                'Tp' => $x->post('Tp'),
                'Cantidad' => $x->post('CantidadRecibida'),
                'Precio' => $x->post('Precio'),
                'Subtotal' => $x->post('Subtotal'),
                'Maq' => $x->post('Maq'),
                'Sem' => $x->post('Sem'),
                'Departamento' => $x->post('Departamento'),
                'Estatus' => 'BORRADOR',
                'Registro' => date("d/m/Y")
            );
            $this->Recibeordencompra_model->onAgregar($datosCompra);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onImprimirValeEntrada() {
        $Compra = $this->Recibeordencompra_model->getCompraParaMovArt($this->input->post('Doc'), $this->input->post('TpDoc'), $this->input->post('Proveedor'));
        if (!empty($Compra)) {
            $pdf = new PDF('P', 'mm', array(215.9, 279.4));

            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 26.9);

            $pdf->SetFont('Calibri', 'BI', 10);
            $pdf->SetX(10);
            $pdf->Cell(10, 6, utf8_decode("Doc. "), 0/* BORDE */, 0, 'L');
            $pdf->SetX(20);
            $pdf->SetFont('Calibri', 'I', 10);
            $pdf->Cell(15, 6, utf8_decode($Compra[0]->Doc . '     ' . $Compra[0]->Tp), 0/* BORDE */, 0, 'L');

            $pdf->SetFont('Calibri', 'BI', 10);
            $pdf->SetX(40);
            $pdf->Cell(10, 6, utf8_decode("Prov. "), 0/* BORDE */, 0, 'L');
            $pdf->SetX(50);
            $pdf->SetFont('Calibri', 'I', 10);
            $pdf->Cell(80, 6, utf8_decode($Compra[0]->Proveedor), 0/* BORDE */, 1, 'L');



            $Subtotal = 0;
            foreach ($Compra as $keyFT => $F) {
                $pdf->SetLineWidth(0.25);

                $pdf->SetX(5);
                $pdf->SetFont('Calibri', '', 8);


                $pdf->Row(array(
                    utf8_decode($F->Articulo),
                    mb_strimwidth(utf8_decode($F->DescArticulo), 0, 70, "..."),
                    number_format($F->Cantidad, 2, ".", ","),
                    utf8_decode($F->Unidad),
                    '$' . number_format($F->Precio, 2, ".", ","),
                    '$' . number_format($F->Subtotal, 2, ".", ","),
                    utf8_decode($F->FechaDoc),
                    utf8_decode($F->OrdenCompra)
                ));
                $Subtotal += $F->Subtotal;
            }
            $pdf->SetY($pdf->GetY() + 5);
            $pdf->SetFont('Calibri', 'B', 9);
            $pdf->SetX(125);
            $pdf->Cell(15, 4, utf8_decode("Subtotal"), 0/* BORDE */, 0, 'L');
            $pdf->SetX(140);
            $pdf->SetFont('Calibri', '', 9);
            $pdf->Cell(20, 4, '$' . number_format($Subtotal, 2, ".", ","), 0/* BORDE */, 1, 'L');



            if ($Compra[0]->Tp === '1') {
                $pdf->SetFont('Calibri', 'B', 9);
                $pdf->SetX(125);
                $pdf->Cell(15, 4, utf8_decode("I.V.A. "), 0/* BORDE */, 0, 'L');
                $pdf->SetX(140);
                $pdf->SetFont('Calibri', '', 9);
                $pdf->Cell(20, 4, '$' . number_format($Subtotal * 0.16, 2, ".", ","), 0/* BORDE */, 1, 'L');

                $pdf->SetFont('Calibri', 'B', 9);
                $pdf->SetX(125);
                $pdf->Cell(15, 4, utf8_decode("Total"), 0/* BORDE */, 0, 'L');
                $pdf->SetX(140);
                $pdf->SetFont('Calibri', '', 9);
                $pdf->Cell(20, 4, '$' . number_format($Subtotal + ($Subtotal * 0.16), 2, ".", ","), 0/* BORDE */, 1, 'L');
            }
            /* FIN RESUMEN */
            $path = 'uploads/Reportes/EntradasAlmacen';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "ENTRADA AL ALMACEN COMPRA " . date("d-m-Y his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/EntradasAlmacen/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

}
