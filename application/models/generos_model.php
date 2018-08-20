<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class generos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            return $this->db->select("G.ID, G.Clave, G.Nombre")->from("Generos AS G")->where("G.Estatus", "ACTIVO")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getGeneros() {
        try {
            return $this->db->select("G.Clave,CONCAT(G.Clave,'-',G.Nombre) AS Genero")->from("Generos AS G")->where("G.Estatus", "ACTIVO")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarClave($C) {
        try {
            return $this->db->select("G.Clave")->from("Generos AS G")->where("G.Clave", $C)->where("G.Estatus", "ACTIVO")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getGeneroByID($IDX) {
        try {
            return $this->db->select("G.*")->from("Generos AS G")->where("G.Estatus", "ACTIVO")->where("G.ID", $IDX)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getID() {
        try {
            return $this->db->select("CONVERT(G.Clave, UNSIGNED INTEGER) AS CLAVE")->from("Generos AS G")->where("G.Estatus", "ACTIVO")->order_by("CLAVE", "DESC")->limit(1)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("Generos", $array);
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
            $this->db->where('ID', $ID)->update("Generos", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO')->where('ID', $ID)->update("Generos");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
