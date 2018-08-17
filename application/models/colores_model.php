<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class colores_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            return $this->db->select("C.ID, C.Clave, C.Descripcion AS Color, C.Estilo")->from("colores AS C")->join('Estilos AS E', 'C.Estilo = E.Clave')->where("C.Estatus", "ACTIVO")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            return $this->db->select("E.Clave AS ID,CONCAT(E.Clave,'-',IFNULL(E.Descripcion,'')) AS Estilo")->from("Estilos AS E")->where("E.Estatus", "ACTIVO")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getColorByID($IDX) {
        try {
            return $this->db->select("E.*")->from("colores AS E")->where("E.Estatus", "ACTIVO")->where("E.ID", $IDX)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getID() {
        try {
            return $this->db->select("E.Clave AS CLAVE")->from("colores AS E")->where("E.Estatus", "Activo")->order_by("E.Clave", "DESC")->limit(1)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("colores", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID()');
            $row = $query->row_array();
            $LastIdInserted = $row['LAST_INSERT_ID()'];
            return $LastIdInserted;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar($ID, $DATA) {
        try {
            $this->db->where('ID', $ID)->update("colores", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO')->where('ID', $ID)->update("colores");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}