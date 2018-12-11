<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Avance_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            $this->db->select("*", false);
            $query = $this->db->get();

            $str = $this->db->last_query();
//        print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDepartamentos() {
        try {
            return $this->db->select("CAST(D.Clave AS SIGNED ) AS Clave, CONCAT(D.Clave,' - ',D.Descripcion) AS Departamento")
                            ->from("departamentos AS D")
                            ->where("D.Estatus", "ACTIVO")
                            ->where("D.Tipo", 1)
                            ->where("D.Avance", 1)
                            ->order_by('Clave', 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
