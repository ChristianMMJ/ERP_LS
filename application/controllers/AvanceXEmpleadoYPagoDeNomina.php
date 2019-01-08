<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class AvanceXEmpleadoYPagoDeNomina extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('AvanceXEmpleadoYPagoDeNomina_model', 'axepn');
    }

    public function index() {
        
    }

    public function shoes() {
        $url = $this->uri;
        $seg_one = $url->segment(2);
        $seg_two = $url->segment(3);
        echo "Params: $seg_one, $seg_two;";
    }

    public function onComprobarDeptoXEmpleado() {
        try {
            /*
             * COMPROBAR SI EL DEPTO ES 
             * 
             * 10 CORTE
             * 30 REBAJADO Y PERFORADO
             * 80 RAYADO CONTADO
             * 280 CALIDAD
             * 
             * ADEMÁS EL EMPLEADO DEBE DE ESTAR A DESTAJO O AMBOS, NO COMO EMPLEADO FIJO
             * 
             * DE LO CONTRARIO ARROJAR UN MENSAJE
             */
            
            $EMPLEADO_VALIDO = $this->axepn->onComprobarDeptoXEmpleado($this->input->post('EMPLEADO'));
            print json_encode($EMPLEADO_VALIDO);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
