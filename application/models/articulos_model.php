<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class articulos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            return $this->db->select("A.ID AS ID, A.Clave AS Clave, "
                    . "A.Departamento AS Departamento, A.Descripcion AS Descripcion, "
                    . "A.UnidadMedida AS UM, A.Estatus AS Estatus", false)
                    ->from("Articulos AS A")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
