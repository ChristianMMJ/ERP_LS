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
    public function getGrupos() {
        try {
            return $this->db->select("G.ID AS ID, G.Clave AS Clave, G.Nombre AS Grupo", false)
                    ->from("grupos AS G")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function getUnidades() {
        try {
            return $this->db->select("U.ID AS ID, U.Clave AS Clave, U.Descripcion AS Unidad", false)
                    ->from("unidades AS U")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getProveedores() {
        try {
            return $this->db->select("P.ID AS ID, CONCAT(P.Clave,' ',P.NombreI) AS Proveedor", false)
                    ->from("proveedores AS P")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function onAgregar($array) {
        try {
            $this->db->insert("articulos", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID()');
            $row = $query->row_array();
            $LastIdInserted = $row['LAST_INSERT_ID()'];
            return $LastIdInserted;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
