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
                    . "OCD.Subtotal,"
                    . "OC.Maq, "
                    . "OC.Sem, "
                    . "OC.Tipo, "
                    . "OCD.Articulo AS ClaveArticulo "
                    . "", false);
            $this->db->from("ordencompradetalle OCD");
            $this->db->join("ordencompra OC", "OC.ID = OCD.OrdenCompra ");
            $this->db->join("articulos A", "A.Clave = OCD.Articulo ");
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
            $this->db->select("G.FechaOrden, G.Proveedor, "
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

    public function getArticuloByTpByOC($Articulo, $Tp, $Oc) {
        try {
            $this->db->select("A.Clave, A.Descripcion, OCD.Precio, OCD.Subtotal, OC.Maq, OC.Sem, OC.Tipo, OC.Tp  "
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

    public function getSumatoriasCantidadesParaEstatus($Tp, $Oc) {
        try {
            $this->db->select("sum(OCD.Cantidad) AS Cantidad, sum(OCD.CantidadRecibida) AS Cantidad_Rec "
                            . "")
                    ->from("ordencompradetalle OCD")
                    ->join("ordencompra OC", 'ON OC.ID =  OCD.OrdenCompra')
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

    public function onModificarEstatusOrdenCompra($Tp, $Folio, $DATA) {
        try {
            $this->db->where('Tp', $Tp)
                    ->where('Folio', $Folio)
                    ->update("ordencompra", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("compras", $array);
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

            $can_rec = $DATA{'CantidadRecibida'};
            $Fac = $DATA{'Factura'};
            $FechaFac = $DATA{'FechaFactura'};
            $sql = "UPDATE ordencompradetalle OCD "
                    . "SET OCD.CantidadRecibida = $can_rec + ifnull(OCD.CantidadRecibida,0), OCD.Factura = '$Fac', OCD.FechaFactura = '$FechaFac' "
                    . "WHERE OCD.ID = '$ID'";
            $this->db->query($sql);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarCantidadRecibidaByArtByOCByTp($Art, $OC, $Tp, $DATA) {
        try {
            $can_rec = $DATA{'CantidadRecibida'};
            $Fac = $DATA{'Factura'};
            $FechaFac = $DATA{'FechaFactura'};
            $sql = "UPDATE ordencompradetalle OCD "
                    . "JOIN ordencompra OC ON OC.ID =  OCD.OrdenCompra "
                    . "SET OCD.CantidadRecibida = $can_rec + ifnull(OCD.CantidadRecibida,0), OCD.Factura = '$Fac', OCD.FechaFactura = '$FechaFac' "
                    . "WHERE OC.Tp = '$Tp'"
                    . "AND OC.Folio = '$OC' "
                    . "AND OCD.Articulo = '$Art'";
            $this->db->query($sql);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
