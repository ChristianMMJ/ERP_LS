<?php

/* NO TOCAR */
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class OrdenCompra extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('ordencompra_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');

            switch ($this->session->userdata["TipoAcceso"]) {
                case 'SUPER ADMINISTRADOR':
                    $this->load->view('vNavGeneral');
                    $this->load->view('vMenuMateriales');
                    break;
                case 'DISEÑO Y DESARROLLO':
                    $this->load->view('vMenuFichasTecnicas');
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

    public function getDetalleByID() {
        try {
            print json_encode($this->ordencompra_model->getDetalleByID($this->input->get('ID')));
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

    public function getID() {
        try {
            print json_encode($this->ordencompra_model->getID());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $x = $this->input;
            $datos = array(
                'Clave' => $x->post('Clave'),
                'Departamento' => $x->post('Departamento'),
                'Descripcion' => $x->post('Descripcion'),
                'Grupo' => $x->post('Grupo'),
                'UnidadMedida' => $x->post('UnidadMedida'),
                'Tmnda' => $x->post('Tmnda'),
                'Min' => $x->post('Min'),
                'Max' => $x->post('Max'),
                'ProveedorUno' => $x->post('ProveedorUno'),
                'ProveedorDos' => $x->post('ProveedorDos'),
                'ProveedorTres' => $x->post('ProveedorTres'),
                'Observaciones' => $x->post('Observaciones'),
                'UbicacionUno' => $x->post('UbicacionUno'),
                'UbicacionDos' => $x->post('UbicacionDos'),
                'UbicacionTres' => $x->post('UbicacionTres'),
                'UbicacionCuatro' => $x->post('UbicacionCuatro'),
                'TipoArticulo' => $x->post('TipoArticulo'),
                'Estatus' => 'ACTIVO',
                'PrecioUno' => $x->post('PrecioUno'),
                'PrecioDos' => $x->post('PrecioDos'),
                'PrecioTres' => $x->post('PrecioTres')
            );
            $ID = $this->ordencompra_model->onAgregar($datos);

            $precios = json_decode($this->input->post('Precios'));
            foreach ($precios as $k => $v) {
                $precio = array('Articulo' => $ID, 'Maquila' => $v->Maquila, 'Precio' => $v->Precio, 'Estatus' => 'ACTIVO');
                $this->db->insert('preciosmaquilas', $precio);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            $x = $this->input;
            $datos = array(
                'Departamento' => $x->post('Departamento'),
                'Descripcion' => $x->post('Descripcion'), /* REQUIERE PERMISO */
                'Grupo' => $x->post('Grupo'),
                'Tmnda' => $x->post('Tmnda'),
                'Min' => $x->post('Min'),
                'Max' => $x->post('Max'),
                'ProveedorUno' => $x->post('ProveedorUno'),
                'ProveedorDos' => $x->post('ProveedorDos'),
                'ProveedorTres' => $x->post('ProveedorTres'),
                'Observaciones' => $x->post('Observaciones'),
                'UbicacionUno' => $x->post('UbicacionUno'),
                'UbicacionDos' => $x->post('UbicacionDos'),
                'UbicacionTres' => $x->post('UbicacionTres'),
                'UbicacionCuatro' => $x->post('UbicacionCuatro'),
                'TipoArticulo' => $x->post('TipoArticulo')
            );
            $this->ordencompra_model->onModificar($x->post('ID'), $datos);

            $precios = json_decode($this->input->post('Precios'));
            foreach ($precios as $k => $v) {
                $precio = array(
                    'Articulo' => $x->post('Clave'),
                    'Maquila' => $v->Maquila,
                    'Precio' => $v->Precio, 'Estatus' => 'A');
                $this->db->insert('preciosmaquilas', $precio);
            }
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

}
