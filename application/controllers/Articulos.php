<?php

/* NO TOCAR */
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('articulos_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["TipoAcceso"], array("SUPER ADMINISTRADOR"))) {
                $this->load->view('vEncabezado')->view('vNavegacion')->view('vArticulos')->view('vFooter');
            } else {
                $this->load->view('vEncabezado')->view('vNavegacion')->view('vFooter');
            }
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->articulos_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getArticuloByID() {
        try {
            print json_encode($this->articulos_model->getArticuloByID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function getDetalleByID() {
        try {
            print json_encode($this->articulos_model->getDetalleByID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getProveedores() {
        try {
            print json_encode($this->articulos_model->getProveedores());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getGrupos() {
        try {
            print json_encode($this->articulos_model->getGrupos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getUnidades() {
        try {
            print json_encode($this->articulos_model->getUnidades());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getID() {
        try {
            print json_encode($this->articulos_model->getID());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getUnidadByID() {
        try {
            print json_encode($this->articulos_model->getUnidadByID($this->input->get('ID')));
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
                'Registro' => $x->post('Registro'),
                'PrecioUno' => $x->post('PrecioUno'),
                'PrecioDos' => $x->post('PrecioDos'),
                'PrecioTres' => $x->post('PrecioTres'),
                'PrecioCuatro' => $x->post('PrecioCuatro')
            );
            $ID = $this->articulos_model->onAgregar($datos);

            $precios = json_decode($this->input->post('Precios'));
            foreach ($precios as $k => $v) {
                $precio = array('Articulo' => $ID, 'Maquila' => $v->Maquila, 'Precio' => $v->Precio, 'Estatus' => 'ACTIVO');
                $this->db->insert('preciosmaquilas',$precio);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarDetalle() {
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
                'Registro' => $x->post('Registro'),
                'PrecioUno' => $x->post('PrecioUno'),
                'PrecioDos' => $x->post('PrecioDos'),
                'PrecioTres' => $x->post('PrecioTres'),
                'PrecioCuatro' => $x->post('PrecioCuatro')
            );
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            $x = $this->input;
            $datos = array(
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
                'Registro' => $x->post('Registro'),
                'PrecioUno' => $x->post('PrecioUno'),
                'PrecioDos' => $x->post('PrecioDos'),
                'PrecioTres' => $x->post('PrecioTres'),
                'PrecioCuatro' => $x->post('PrecioCuatro')
            );
            $this->articulos_model->onModificar($x->post('ID'), $datos);
            
            $precios = json_decode($this->input->post('Precios'));
            foreach ($precios as $k => $v) {
                $precio = array('Articulo' => $x->post('ID'), 'Maquila' => $v->Maquila, 'Precio' => $v->Precio, 'Estatus' => 'ACTIVO');
                $this->db->insert('preciosmaquilas',$precio);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->articulos_model->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalle() {
        try {
            $this->db->set('Estatus', 'INACTIVO')->where('ID', $this->input->post('ID'))->update("preciosmaquilas");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
