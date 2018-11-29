<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class Sesion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session');
        $this->load->model('Usuario_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado')->view('vFondo');
            switch ($this->session->TipoAcceso) {
                case 'SUPER ADMINISTRADOR':
                    $this->load->view('vNavGeneral');
                    $this->load->view('vMenuPrincipal')->view('vNavGeneral')->view('vQuickMenu');
                    break;
                case 'VENTAS':
                    $this->load->view('vMenuClientes');
                    break;
                case 'DISEÑO Y DESARROLLO':
                    $this->load->view('vMenuFichasTecnicas');
                    break;
                case 'RECURSOS HUMANOS':
                    $this->load->view('vMenuNominas');
                    break;
                case 'FACTURACION':
                    $this->load->view('vMenuFacturacion');
                    break;
                case 'ALMACEN':
                    $this->load->view('vMenuMateriales');
                    break;
                case 'PRODUCCION':
                    $this->load->view('vMenuProduccion');
                    break;
                case 'PROVEEDORES':
                    $this->load->view('vMenuProveedores');
                    break;
                case 'CONTABILIDAD':
                    $this->load->view('vMenuContabilidad');
                    break;
            }
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getLogoByID() {
        try {
            $data = $this->Usuario_model->getLogoByID();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onIngreso() {
        try {
            $data = $this->Usuario_model->getAcceso($this->input->post('USUARIO'), $this->input->post('CONTRASENA'));
            if (count($data) > 0) {
                $newdata = array(
                    'USERNAME' => $data[0]->Usuario,
                    'PASSWORD' => $data[0]->AES,
                    'Nombre' => $data[0]->Nombre,
                    'Apellidos' => $data[0]->Apellidos,
                    'ID' => $data[0]->ID,
                    'LOGGED' => TRUE,
                    'TipoAcceso' => $data[0]->TipoAcceso,
                    'Empresa' => $data[0]->Empresa,
                    'EMPRESA_RAZON' => $data[0]->EMPRESA_RAZON,
                    'EMPRESA_DIRECCION' => $data[0]->EMPRESA_DIRECCION,
                    'EMPRESA_REPRESENTANTE' => $data[0]->EMPRESA_REPRESENTANTE,
                    'LOGO' => $data[0]->LOGO,
                    'SEG' => $data[0]->Seguridad
                );
                $this->session->mark_as_temp('LOGGED', 28800);
                $this->session->set_userdata($newdata);
                $this->Usuario_model->onModificarUltimoAcceso($data[0]->ID, date("d-m-Y H:i:s"));

                print 1;
            } else {
                print 'ACCESO DENEGADO, VERIFIQUE SU USUARIO Y/O CONTRASEÑA';
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onCambiarContrasena() {
        try {
            extract($this->input->post());
            $DATA = array(
                'Contrasena' => ($Contrasena !== NULL) ? $Contrasena : NULL
            );
            $this->Usuario_model->onModificar($ID, $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onSalir() {
        try {
            $array_items = array('USERNAME', 'PASSWORD', 'LOGGED');
            $this->session->unset_userdata($array_items);
            header('Location: ' . base_url());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onSendMail() {
        extract($this->input->post());
        $data = $this->Usuario_model->getContrasena($USUARIO);
        //var_dump($data);
        if (!empty($data[0])) {
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://mut.hosting-mexico.net',
                'smtp_port' => 465,
                'smtp_user' => 'no-reply@ayr.mx',
                'smtp_pass' => 'CDw9#,y^I(_N',
                'mailtype' => 'html',
                'charset' => 'ISO_8859-1',
                'wordwrap' => TRUE
            );
            $this->load->library('email', $config);
            $this->email->from('no-reply@ayr.mx', 'app.ayr.mx');
            $this->email->to($USUARIO);
            $this->email->subject(utf8_decode('Envío de contraseña app.ayr.mx'));
            $this->email->message(utf8_decode('<p>Se ha enviado su contraseña para el usuario: ' . $USUARIO . '</p><br>'
                            . '<p>Su contraseña es: </p>' . '<h3>' . $data[0]->Contrasena . '</h3><hr>'
                            . ''));
            if ($this->email->send()) {
                print 1;
            } else {
                print 0;
            }
        } else {
            print 2;
        }
    }

}
