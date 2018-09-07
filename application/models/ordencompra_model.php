<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class ordencompra_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            return $this->db->select("A.ID AS ID, A.Folio AS Folio, "
                                    . "A.FechaOrden AS Fecha "
                                    . "", false)
                            ->from("ordencompra AS A")
                            ->where('A.Estatus', 'ACTIVO')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getOrdenCompraByID($ID) {
        try {
            return $this->db->select("A.*", false)->from("ordencompra AS A")->where('A.ID', $ID)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaquilas($ID) {
        try {
            return $this->db->select("M.Clave AS ID,CONCAT(M.Clave,' - ',IFNULL( M.Nombre,'')) AS Maquila", false)->from("maquilas AS M")
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetalleByID($ID) {
        try {
            $this->db->select("pvm.ID AS ID,"
                            . "CONCAT(M.Clave,' - ', M.Nombre) AS Maquila, "
                            . "pvm.Precio AS Precio, "
                            . "'A' AS Estatus,"
                            . "M.Clave AS ClaveMaquila ", false)->from("preciosmaquilas AS pvm")
                    ->join('maquilas AS M', 'pvm.Maquila = M.Clave')->where('pvm.Articulo', $ID)->like('pvm.Estatus', 'A');
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
//            print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getID() {
        try {
            return $this->db->select("CONVERT(A.Folio, UNSIGNED INTEGER) AS CLAVE")->from("ordencompra AS A")->where("A.Estatus", "ACTIVO")->order_by("CLAVE", "DESC")->limit(1)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getProveedores() {
        try {
            return $this->db->select("P.Clave AS ID, CONCAT(P.Clave,' ',IFNULL(P.NombreF,'')) AS Proveedor", false)
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

    public function onModificar($ID, $DATA) {
        try {
            $this->db->where('ID', $ID)->update("articulos", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO')->where('ID', $ID)->update("articulos");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
