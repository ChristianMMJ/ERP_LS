<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Actualizaprecioordencompra_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords($Folio, $Tp) {
        try {
            $this->db->select(""
                    . "OC.Tp, OC.Folio, OC.Proveedor, "
                    . "CONCAT(OCD.Articulo,' ',A.Descripcion) AS Articulo, "
                    . "OCD.Cantidad, OCD.Precio, OCD.Subtotal"
                    . "", false);
            $this->db->from("ordencompradetalle OCD");
            $this->db->join("ordencompra OC", "OC.ID = OCD.OrdenCompra ");
            $this->db->join("articulos A", "A.Clave = OCD.Articulo ");
            $this->db->where("OC.Folio", $Folio);
            $this->db->where("OC.Tp", $Tp);
            $this->db->where_in('OC.Estatus', array('PENDIENTE', 'ACTIVA'));
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
            $this->db->select("G.FechaOrden, G.Proveedor, G.Estatus, "
                            . "CONCAT(P.Clave,' ',IFNULL(P.NombreI,'')) AS ProveedorI, "
                            . "CONCAT(P.Clave,' ',IFNULL(P.NombreF,'')) AS ProveedorF "
                            . "")
                    ->from("ordencompra AS G")
                    ->join("proveedores AS P", 'ON P.Clave = G.Proveedor')
                    ->where("G.Folio", $Folio)
                    ->where("G.Tp", $Tp)
                    ->where_in("G.Estatus", array("PENDIENTE", "ACTIVA"));
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

    public function onModificarPreciosOrdenCompraByOrdenCompra($OC, $Tp, $Prov) {
        try {
            try {
                $sql = "update ordencompradetalle ocd  "
                        . "inner join ordencompra oc  "
                        . "on oc.ID = ocd.OrdenCompra  "
                        . "and oc.Tp = '$Tp' "
                        . "and oc.Folio = '$OC' "
                        . "and oc.Estatus IN('ACTIVA') "
                        . "join articulos A on ocd.Articulo = A.Clave "
                        . "set ocd.Precio = CASE  "
                        . "WHEN A.ProveedorUno = '$Prov' THEN A.PrecioUno "
                        . "WHEN A.ProveedorDos = '$Prov' THEN A.PrecioDos "
                        . "WHEN A.ProveedorTres = '$Prov' THEN A.PrecioTres END, "
                        . "ocd.SubTotal = CASE  "
                        . "WHEN A.ProveedorUno = '$Prov' THEN A.PrecioUno "
                        . "WHEN A.ProveedorDos = '$Prov' THEN A.PrecioDos "
                        . "WHEN A.ProveedorTres = '$Prov' THEN A.PrecioTres END * ocd.Cantidad "
                        . "";
                //print ($sql);
                $this->db->query($sql);
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
