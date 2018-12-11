<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class MaterialControlFecha_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getPedidoByControl($Control) {
        try {
            $this->db->select("PD.* ,"
                            . ""
                            . "")
                    ->from("pedidox AS PD")
                    ->where("PD.Control", $Control);
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
            //print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getOrdenProduccionByControl($Control) {
        try {
            $this->db->select("OP.ControlT ,"
                            . ""
                            . "")
                    ->from("ordendeproduccion AS OP")
                    ->where("OP.ControlT", $Control);
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
            //print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
