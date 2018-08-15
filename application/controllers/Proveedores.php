<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('proveedores_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["TipoAcceso"], array("SUPER ADMINISTRADOR"))) {
                $this->load->view('vEncabezado')->view('vNavegacion')->view('vProveedores')->view('vFooter');
            } else {
                $this->load->view('vEncabezado');
                $this->load->view('vNavegacion');
                $this->load->view('vFooter');
            }
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getUltimoRegistro() {
        try {
            print json_encode($this->proveedores_model->getUltimoRegistro());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->proveedores_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getProveedorByID() {
        try {
            print json_encode($this->proveedores_model->getProveedorByID($this->input->post('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {

            extract($this->input->post());
            $DATA = array(
                'Clave' => ($Clave !== NULL) ? $Clave : NULL,
                'NombreI' => ($NombreI !== NULL) ? $NombreI : NULL,
                'NombreF' => ($NombreF !== NULL) ? $NombreF : NULL,
                'Direccion' => ($Direccion !== NULL) ? $Direccion : NULL,
                'NoExt' => ($NoExt !== NULL) ? $NoExt : NULL,
                'NoInt' => ($NoInt !== NULL) ? $NoInt : NULL,
                'Colonia' => ($Colonia !== NULL) ? $Colonia : NULL,
                'Ciudad' => ($Ciudad !== NULL) ? $Ciudad : NULL,
                'Estado' => ($Estado !== NULL) ? $Estado : NULL,
                'Telefono' => ($Telefono !== NULL) ? $Telefono : NULL,
                'CP' => ($CP !== NULL) ? $CP : NULL,
                'RFC' => ($RFC !== NULL) ? $RFC : NULL,
                'Plazo' => ($Plazo !== NULL) ? $Plazo : NULL,
                'CtaCheques' => ($CtaCheques !== NULL) ? $CtaCheques : NULL,
                'Banco' => ($Banco !== NULL) ? $Banco : NULL,
                'DctoProntoPago' => ($DctoProntoPago !== NULL) ? $DctoProntoPago : NULL,
                'DiasProntoPago' => ($DiasProntoPago !== NULL) ? $DiasProntoPago : NULL,
                'Correo' => ($Correo !== NULL) ? $Correo : NULL,
                'PorcentajeComprasPorPedidoF' => ($PorcentajeComprasPorPedidoF !== NULL) ? $PorcentajeComprasPorPedidoF : NULL,
                'PorcentajeComprasPorPedidoR' => ($PorcentajeComprasPorPedidoR !== NULL) ? $PorcentajeComprasPorPedidoR : NULL,
                'Estatus' => 'ACTIVO'
            );
            $this->proveedores_model->onAgregar($DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            extract($this->input->post());
            $DATA = array(
                'NombreI' => ($NombreI !== NULL) ? $NombreI : NULL,
                'NombreF' => ($NombreF !== NULL) ? $NombreF : NULL,
                'Direccion' => ($Direccion !== NULL) ? $Direccion : NULL,
                'NoExt' => ($NoExt !== NULL) ? $NoExt : NULL,
                'NoInt' => ($NoInt !== NULL) ? $NoInt : NULL,
                'Colonia' => ($Colonia !== NULL) ? $Colonia : NULL,
                'Ciudad' => ($Ciudad !== NULL) ? $Ciudad : NULL,
                'Estado' => ($Estado !== NULL) ? $Estado : NULL,
                'Telefono' => ($Telefono !== NULL) ? $Telefono : NULL,
                'CP' => ($CP !== NULL) ? $CP : NULL,
                'RFC' => ($RFC !== NULL) ? $RFC : NULL,
                'Plazo' => ($Plazo !== NULL) ? $Plazo : NULL,
                'CtaCheques' => ($CtaCheques !== NULL) ? $CtaCheques : NULL,
                'Banco' => ($Banco !== NULL) ? $Banco : NULL,
                'DctoProntoPago' => ($DctoProntoPago !== NULL) ? $DctoProntoPago : NULL,
                'DiasProntoPago' => ($DiasProntoPago !== NULL) ? $DiasProntoPago : NULL,
                'Correo' => ($Correo !== NULL) ? $Correo : NULL,
                'PorcentajeComprasPorPedidoF' => ($PorcentajeComprasPorPedidoF !== NULL) ? $PorcentajeComprasPorPedidoF : NULL,
                'PorcentajeComprasPorPedidoR' => ($PorcentajeComprasPorPedidoR !== NULL) ? $PorcentajeComprasPorPedidoR : NULL,
            );
            $this->proveedores_model->onModificar($ID, $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->proveedores_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
