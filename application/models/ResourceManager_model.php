<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class ResourceManager_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getModulos() {
        try {
            return $this->db->select("ID, Modulo, Fecha, Icon, Ref")->from("modulos AS M")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getOpcionesXModulo() {
        try {
            return $this->db->select("ID, Modulo, Fecha, Icon, Ref")->from("opcionesxmodulo AS OXM")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
