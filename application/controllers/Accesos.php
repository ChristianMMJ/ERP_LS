<?php

/* NO TOCAR */
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class Accesos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('Accesos_model', 'acm');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            switch ($this->session->userdata["TipoAcceso"]) {
                case 'SUPER ADMINISTRADOR':
                    $this->load->view('vNavGeneral');
                    $this->load->view('vMenuParametros');
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

            $this->load->view('vFondo')->view('vAccesos')->view('vFooter');
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getTiposDeAcceso() {
        try {
            print json_encode($this->acm->getTiposDeAcceso());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getUsuarios() {
        try {
            print json_encode($this->acm->getUsuarios());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getModulos() {
        try {
            print json_encode($this->acm->getModulos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getOpciones() {
        try {
            print json_encode($this->acm->getOpciones($this->input->get('M')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getOpcionesXModuloxUsuario() {
        try {
            print json_encode($this->acm->getOpcionesXModuloxUsuario($this->input->get('U'), $this->input->get('M')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getModulosXUsuario() {
        try {
            print json_encode($this->acm->getModulosXUsuario($this->input->get('U')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarModulosXUsuario() {
        try {
            $x = $this->input;
            $options = json_decode($this->input->post('OPTIONS'));
            $modulos = array();
            foreach ($options as $k => $v) {
                /* COMPROBAR SI YA SE TIENE ESE MODULO */
                $tiene_el_modulo = $this->db->select('MXU.ID')
                                ->from('modulosxusuario AS MXU')
                                ->where('MXU.Usuario', $x->post('USR'))
                                ->where('MXU.Modulo', $v->MODULO)
                                ->get()->result();

                if (count($tiene_el_modulo) <= 0) {
                    $this->db->insert('modulosxusuario', array(
                        'Modulo' => $v->MODULO,
                        'Usuario' => $x->post('USR'),
                        'UsuarioAsigna' => $_SESSION["ID"],
                        'Fecha' => Date('d/m/Y h:i:s a')
                    ));
                }
                array_push($modulos, $v->MODULO);
            }
            /* ELIMINAR LOS NO SELECCIONADOS */
            $modulos_no_seleccionados = $this->db->select('MXU.ID, MXU.Modulo AS MODULO')
                            ->from('modulosxusuario AS MXU')
                            ->where('MXU.Usuario', $x->post('USR'))
                            ->get()->result();

            foreach ($modulos_no_seleccionados as $k => $v) {
                if (!in_array($v->MODULO, $modulos)) {
                    $this->db->where('ID', $v->ID)->where('MODULO', $v->MODULO)->where('Usuario', $x->post('USR'))->delete('modulosxusuario');
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarOpcionesXModuloXUsuario() {
        try {
            $x = $this->input;
            $USR = $x->post('USR');
            $MDL = $x->post('MDL');
            $options = json_decode($this->input->post('OPTIONS'));
            $opciones = array();
            foreach ($options as $k => $v) {
                /* COMPROBAR SI YA SE TIENE ESE MODULO */
                $tiene_la_opcion = $this->db->select('MXU.ID')
                                ->from('opcionesxmoduloxusuario AS MXU')
                                ->where('MXU.Usuario', $USR)
                                ->where('MXU.Modulo', $MDL)
                                ->where('MXU.Opcion', $v->OPCION)
                                ->get()->result();

                if (count($tiene_la_opcion) <= 0) {
                    $this->db->insert('opcionesxmoduloxusuario', array(
                        'Opcion' => $v->OPCION,
                        'Modulo' => $MDL,
                        'Usuario' => $USR,
                        'UsuarioAsigna' => $_SESSION["ID"],
                        'Fecha' => Date('d/m/Y h:i:s a')
                    ));
                }
                array_push($opciones, $v->OPCION);
            }
            /* ELIMINAR LOS NO SELECCIONADOS */
            $opciones_no_seleccionadas = $this->db->select('MXU.ID, MXU.Opcion AS OPCION')
                            ->from('opcionesxmoduloxusuario AS MXU')
                            ->where('MXU.Usuario', $x->post('USR'))
                            ->get()->result();

            foreach ($opciones_no_seleccionadas as $k => $v) {
                if (!in_array($v->OPCION, $opciones)) {
                    $this->db->where('ID', $v->ID)->where('Modulo', $MDL)->where('Opcion', $v->OPCION)->where('Usuario', $USR)->delete('opcionesxmoduloxusuario');
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
