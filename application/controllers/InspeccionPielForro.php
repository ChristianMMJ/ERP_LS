<?php

/* NO TOCAR */
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class InspeccionPielForro extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('InspeccionPielForro_model')
                ->helper('Entregamaterialcontrol_helper')->helper('file');
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
            $this->load->view('vInspeccionPielForro');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function onCerrarCaptura() {
        try {
            $this->InspeccionPielForro_model->onCerrarCaptura($this->input->post('Tp'), $this->input->post('Factura'), $this->input->post('Proveedor'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalleByID() {
        try {
            $this->InspeccionPielForro_model->onEliminarDetalleByID($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {

            $x = $this->input;
            $data = array(
                'Tp' => $x->post('Tp'),
                'OrdenCompra' => $x->post('OrdenCompra'),
                'Proveedor' => $x->post('Proveedor'),
                'Factura' => $x->post('Factura'),
                'FechaFactura' => $x->post('FechaFactura'),
                'Articulo' => $x->post('Articulo'),
                'Precio' => $x->post('Precio'),
                'Cantidad' => $x->post('Cantidad'),
                'CantidadDevuelta' => $x->post('CantidadDevuelta'),
                'Observaciones' => $x->post('Observaciones'),
                'Defecto' => $x->post('Defecto'),
                'DetalleDefecto' => $x->post('DetalleDefecto'),
                'PartidaIni' => $x->post('PartidaIni'),
                'PartidaFin' => $x->post('PartidaFin'),
                'Aprovechamiento' => $x->post('Aprovechamiento'),
                'NumHojas' => $x->post('NumHojas'),
                'HojasRevisadas' => $x->post('HojasRevisadas'),
                'Primera' => $x->post('Primera'),
                'Segunda' => $x->post('Segunda'),
                'Tercera' => $x->post('Tercera'),
                'Cuarta' => $x->post('Cuarta'),
                'FechaMov' => Date('d/m/Y H:i:s'),
                'Estatus' => 'BORRADOR'
            );
            //AGREGA EN NOTAS DE CREDITO
            $this->InspeccionPielForro_model->onAgregar($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->InspeccionPielForro_model->getRecords($this->input->get('Tp'), $this->input->get('Fac'), $this->input->get('Proveedor')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetalleOrdenCompra() {
        try {
            print json_encode($this->InspeccionPielForro_model->getDetalleOrdenCompra($this->input->get('Tp'), $this->input->get('Doc')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onVerificarExisteOrdenCompra() {
        try {
            print json_encode($this->InspeccionPielForro_model->onVerificarExisteOrdenCompra($this->input->get('Tp'), $this->input->get('Doc')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onVerificarExisteFactura() {
        try {
            print json_encode($this->InspeccionPielForro_model->onVerificarExisteFactura($this->input->get('Tp'), $this->input->get('Doc')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDefectos() {
        try {
            print json_encode($this->InspeccionPielForro_model->getDefectos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetallesDefectos() {
        try {
            print json_encode($this->InspeccionPielForro_model->getDetallesDefectos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
