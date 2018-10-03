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
                ->model('Recibeordencompra_model');
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

    public function getArticuloByTpByOC() {
        try {
            print json_encode($this->Recibeordencompra_model->getArticuloByTpByOC($this->input->get('Articulo'), $this->input->get('Tp'), $this->input->get('Oc')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onCerrarCompra() {
        try {
            $Cantidades = $this->Recibeordencompra_model->getSumatoriasCantidadesParaEstatus($this->input->post('Tp'), $this->input->post('Folio'));
            $can = $Cantidades[0]->Cantidad;
            $Can_rec = $Cantidades[0]->Cantidad_Rec;
            if ($can > $Can_rec) {
                $datos = array(
                    'Estatus' => 'PENDIENTE'
                );
                $this->Recibeordencompra_model->onModificarEstatusOrdenCompra($this->input->post('Tp'), $this->input->post('Folio'), $datos);
            } else {
                $datos = array(
                    'Estatus' => 'RECIBIDA'
                );
                $this->Recibeordencompra_model->onModificarEstatusOrdenCompra($this->input->post('Tp'), $this->input->post('Folio'), $datos);
            }
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
            $this->Recibeordencompra_model->onModificarCantidadRecibidaByArtByOCByTp($x->post('Articulo'), $x->post('OC'), $x->post('Tp'), $datos);

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

}
