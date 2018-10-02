<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Recibeordencompra_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            $this->db->select(""
                    . "OCD.ID,"
                    . "OC.Tp,"
                    . "OC.Folio, "
                    . "CONCAT(OCD.Articulo,' ',A.Descripcion) AS Articulo, "
                    . "OCD.Cantidad, "
                    . "ifnull(OCD.CantidadRecibida,'') AS Recibida, "
                    . "OCD.Precio, "
                    . "OCD.SubTotal"
                    . "", false);
            $this->db->from("ordencompradetalle OCD");
            $this->db->join("ordencompra OC", "OC.ID = OCD.OrdenCompra ");
            $this->db->join("articulos A", "A.Clave = OCD.Articulo ");
            $this->db->where_in('OC.Estatus', array('PENDIENTE', 'CERRADA'));
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

    public function getOrdenCompra($Folio, $Tp) {
        try {
            $this->db->select("G.FechaOrden, G.Proveedor, "
                            . "CONCAT(P.Clave,' ',IFNULL(P.NombreI,'')) AS ProveedorI, "
                            . "CONCAT(P.Clave,' ',IFNULL(P.NombreF,'')) AS ProveedorF "
                            . "")
                    ->from("ordencompra AS G")
                    ->join("proveedores AS P", 'ON P.Clave = G.Proveedor')
                    ->where("G.Folio", $Folio)
                    ->where("G.Tp", $Tp)
                    ->where_in("G.Estatus", array("PENDIENTE", "CERRADA"));
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

    public function getArticuloByTpByOC($Articulo, $Tp, $Oc) {
        try {
            $this->db->select("A.Clave, A.Descripcion  "
                            . "")
                    ->from("ordencompradetalle OCD")
                    ->join("ordencompra OC", 'ON OC.ID =  OCD.OrdenCompra')
                    ->join("articulos A", 'ON A.Clave =  OCD.Articulo')
                    ->where("OCD.Articulo", $Articulo)
                    ->where("OC.Tp", $Tp)
                    ->where("OC.Folio", $Oc);
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

    public function getProveedores() {
        try {
            return $this->db->select("P.Clave AS ID, "
                                    . "CONCAT(P.Clave,' ',IFNULL(P.NombreI,'')) AS ProveedorI, "
                                    . "CONCAT(P.Clave,' ',IFNULL(P.NombreF,'')) AS ProveedorF "
                                    . "", false)
                            ->from("proveedores AS P")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
