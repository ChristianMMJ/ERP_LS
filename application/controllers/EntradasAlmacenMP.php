<?php

/* NO TOCAR */
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class EntradasAlmacenMP extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('EntradasAlmacenMP_model')
                ->helper('ReportesCompras_helper')->helper('file');
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
            $this->load->view('vEntradasAlmacenMP');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->Ordencompra_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getOrdenCompraByID() {
        try {
            print json_encode($this->Ordencompra_model->getOrdenCompraByID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPrecioCompraByArticuloByProveedor() {
        try {
            print json_encode($this->Ordencompra_model->getPrecioCompraByArticuloByProveedor($this->input->get('Articulo'), $this->input->get('Proveedor')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPorcentajesCompraByProveedor() {
        try {
            print json_encode($this->Ordencompra_model->getPorcentajesCompraByProveedor($this->input->get('Proveedor')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getArticuloByDeptoByProveedor() {
        try {
            print json_encode($this->Ordencompra_model->getArticuloByDeptoByProveedor($this->input->get('Departamento'), $this->input->get('Proveedor')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaquilas() {
        try {
            print json_encode($this->Ordencompra_model->getMaquilas($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getProveedores() {
        try {
            print json_encode($this->Ordencompra_model->getProveedores());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarSemanasProduccion() {
        try {
            print json_encode($this->Ordencompra_model->onComprobarSemanasProduccion($this->input->get('Clave'), $this->input->get('Ano')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onVerificarSemanaProdCerrada() {
        try {
            print json_encode($this->Ordencompra_model->onVerificarSemanaProdCerrada(
                                    $this->input->get('Ano'), $this->input->get('Maq'), $this->input->get('Sem')
            ));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onVerificarSemanaProdDepartamentoCerrada() {
        try {
            print json_encode($this->Ordencompra_model->onVerificarSemanaProdDepartamentoCerrada(
                                    $this->input->get('Ano'), $this->input->get('Maq'), $this->input->get('Sem'), $this->input->get('Departamento')
            ));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarMaquilas() {
        try {
            print json_encode($this->Ordencompra_model->onComprobarMaquilas($this->input->get('Clave')));
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
                'Estatus' => 'BORRADOR',
                'Usuario' => $this->session->userdata('ID')
            );
            $ID = $this->Ordencompra_model->onAgregar($datos);
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalleByID() {
        try {
            $this->Ordencompra_model->onEliminarDetalleByID($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
