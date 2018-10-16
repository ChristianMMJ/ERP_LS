<?php

/* NO TOCAR */
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsumoPielForroXCortador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('ConsumoPielForroXCortador_model','cpfxc');
    }

    public function getCortadores() {
        try {
            print json_encode($this->cpfxc->getCortadores());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function getArticulos() {
        try {
            print json_encode($this->cpfxc->getArticulos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}