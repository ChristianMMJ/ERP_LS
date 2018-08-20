<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class estilos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            return $this->db->select("E.ID, E.Clave, E.Descripcion, "
                                    . "CASE "
                                    . "WHEN E.Linea IS NULL "
                                    . "THEN '<span class=\"badge badge-danger\">SIN LINEA</span>' "
                                    . "ELSE CONCAT(L.CLAVE,'-',L.Descripcion) END AS Linea ")
                            ->from("Estilos AS E")
                            ->join('Lineas AS L', 'E.Linea = L.Clave', 'left')
                            ->where("E.Estatus", "ACTIVO")
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            return $this->db->select("E.Clave,CONCAT(E.Clave,'-',E.Descripcion) AS Estilo")->from("Estilos AS E")->where("E.Estatus", "ACTIVO")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarClave($C) {
        try {
            return $this->db->select("E.Clave")->from("Estilos AS E")->where("E.Clave", $C)->where("E.Estatus", "ACTIVO")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstiloByID($IDX) {
        try {
            return $this->db->select("E.*")->from("Estilos AS E")->where("E.Estatus", "ACTIVO")->where("E.ID", $IDX)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getID() {
        try {
            return $this->db->select("E.Clave AS CLAVE")->from("Estilos AS E")->where("E.Estatus", "Activo")->order_by("E.Clave", "DESC")->limit(1)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("Estilos", $array);
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
            $this->db->where('ID', $ID)->update("Estilos", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO')->where('ID', $ID)->update("Estilos");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
