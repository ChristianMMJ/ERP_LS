<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class listadeprecios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() { 
        try {
            return $this->db->select("LP.ID, LP.Lista AS Clave, CONCAT(LP.Lista,'-',LP.Descripcion) AS ListaPrecios", false)
                            ->from('listadeprecios AS LP')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarClave($C) {
        try {
            return $this->db->select("G.Clave")->from("listadeprecios AS G")->where("G.Clave", $C)->where("G.Estatus", "ACTIVO")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getID() {
        try {
            return $this->db->select("A.Clave AS CLAVE")->from("listadeprecios AS A")->order_by("Clave", "DESC")->limit(1)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("listadeprecios", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID() AS IDL');
            $row = $query->row_array();
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar($ID, $DATA) {
        try {
            $this->db->where('ID', $ID)->update("listadeprecios", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO')->where('ID', $ID)->update("listadeprecios");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getListaDePreciosByID($ID) {
        try {
            return $this->db->select('U.*', false)->from('listadeprecios AS U')->where('U.ID', $ID)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}