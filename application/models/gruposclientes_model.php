<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class gruposclientes_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            return $this->db->select("GP.ID, GP.Clave, GP.Descripcion")->from("GruposClientes AS GP")->where("GP.Estatus", "ACTIVO")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getGruposClientes() {
        try {
            return $this->db->select("CAST(P.Clave AS SIGNED ) AS ID, CONCAT(P.Clave,' - ',IFNULL(P.Descripcion,'')) AS GruposClientes ", false)
                            ->from('GruposClientes AS P')
                            ->where_in('P.Estatus', 'ACTIVO')
                            ->order_by('ID', 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getGrupoclienteByID($IDX) {
        try {
            return $this->db->select("GP.ID, GP.Clave, GP.Descripcion, GP.Estatus")->from("GruposClientes AS GP")->where("GP.Estatus", "ACTIVO")->where("GP.ID", $IDX)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getID() {
        try {
            return $this->db->select("CONVERT(GP.Clave, UNSIGNED INTEGER) AS CLAVE")->from("GruposClientes AS GP")->where("GP.Estatus", "Activo")->order_by("CLAVE", "DESC")->limit(1)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("GruposClientes", $array);
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
            $this->db->where('ID', $ID)->update("GruposClientes", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO')->where('ID', $ID)->update("GruposClientes");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
