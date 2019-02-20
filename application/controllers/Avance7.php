<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/JasperPHP/src/JasperPHP/JasperPHP.php";
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class Avance7 extends CI_Controller {

    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('Avance7_model', 'avm')->helper('jaspercommand_helper');
    }

    public function getXLS() {
        $jc = new JasperCommand();
        $jc->setFolder('rpt/' . $this->session->USERNAME);
        $parametros = array();
        $parametros["urlimagen"] = base_url() . $this->session->LOGO;
        $parametros["nombredelreporte"] = "hola";
        $parametros["controlid"] = $this->input->post('CONTROL');
        $jc->setParametros($parametros);
        $jc->setJasperurl('jrxml\report2.jasper');
       $jc->setFilename('ReporteDelSistema' . Date('h_i_s')."_".$this->input->post('CONTROL'));
         $jc->setDocumentformat('xls');
        PRINT $jc->getReport();
    }

    public function getPDF() { 
        $jc = new JasperCommand();
        $jc->setFolder('rpt/' . $this->session->USERNAME);
        $parametros = array();
        $parametros["urlimagen"] = base_url() . $this->session->LOGO;
        $parametros["nombredelreporte"] = "hola";
        $parametros["controlid"] = $this->input->post('CONTROL');
        $jc->setParametros($parametros);
        $jc->setJasperurl('jrxml\report2.jasper');
        $jc->setFilename('ReporteDelSistema' . Date('h_i_s')."_".$this->input->post('CONTROL'));
        $jc->setDocumentformat('pdf');
        PRINT $jc->getReport();
    } 

    public function onComprobarDeptoXEmpleado() {
        try {
            print json_encode($this->avm->onComprobarDeptoXEmpleado($this->input->get('EMPLEADO')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSemanaByFecha() {
        try {
            print json_encode($this->avm->getSemanaByFecha(Date('d/m/Y')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFraccionesPagoNomina() {
        try {
            header('Content-type: application/json');
            $x = $this->input;
            print json_encode($this->avm->getFraccionesPagoNomina($x->post('EMPLEADO'), "60,70,71,72,75,204,337"));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAvanzar() {
        try {
            $x = $this->input;
            $fecha = $x->post('FECHA');
            $dia = substr($fecha, 0, 2);
            $mes = substr($fecha, 3, 2);
            $anio = substr($fecha, 6, 4);

            $nueva_fecha = new DateTime();
            $nueva_fecha->setDate($anio, $mes, $dia);
//            $data = array(
//                "numeroempleado" => $x->post('NUMERO_EMPLEADO'),
//                "maquila" => intval(substr($x->post('CONTROL'), 4, 2)),
//                "control" => $x->post('CONTROL'),
//                "estilo" => $x->post('ESTILO'),
//                "numfrac" => $x->post('NUMERO_FRACCION'),
//                "preciofrac" => $x->post('PRECIO_FRACCION'),
//                "pares" => $x->post('PARES'),
//                "subtot" => (floatval($x->post('PARES')) * floatval($x->post('PRECIO_FRACCION'))),
//                "fecha" => $nueva_fecha->format('Y-m-d h:i:s'),
//                "semana" => $x->post('SEMANA'),
//                "depto" => $x->post('DEPARTAMENTO'),
//                "anio" => $x->post('ANIO'));
            $fracciones = json_decode($x->post('FRACCIONES'), false)/* FALSE = STDCLASS, TRUE = ASSOCIATIVE_ARRAY */;
            foreach ($fracciones as $k => $v) {
                print "$v->NUMERO_FRACCION \n";
                $data = array(
                    "numeroempleado" => $x->post('NUMERO_EMPLEADO'),
                    "maquila" => intval(substr($x->post('CONTROL'), 4, 2)),
                    "control" => $x->post('CONTROL'),
                    "estilo" => $x->post('ESTILO'),
                    "numfrac" => $v->NUMERO_FRACCION,
                    "preciofrac" => $x->post('PRECIO_FRACCION'),
                    "pares" => $x->post('PARES'),
                    "subtot" => (floatval($x->post('PARES')) * floatval($x->post('PRECIO_FRACCION'))),
                    "fecha" => $nueva_fecha->format('Y-m-d h:i:s'),
                    "semana" => $x->post('SEMANA'),
                    "depto" => $x->post('DEPARTAMENTO'),
                    "anio" => $x->post('ANIO'));
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /* JASPER */
}
