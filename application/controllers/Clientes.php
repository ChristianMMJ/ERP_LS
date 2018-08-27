<?php

/* NO TOCAR */
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('clientes_model');
    }

    public function index() {
        
    }

    public function getRecords() {
        try {
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}