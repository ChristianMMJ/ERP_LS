<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class EliminaEntradaCompra_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getProveedores() {
        try {
            return $this->db->select("P.Clave AS ID, "
                                    . "CONCAT(P.Clave,' ',IFNULL(P.NombreI,'')) AS ProveedorI, "
                                    . "CONCAT(P.Clave,' ',IFNULL(P.NombreF,'')) AS ProveedorF ", false)
                            ->from("proveedores AS P")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onRevisarDoctoCartProv($Doc, $Tp, $Proveedor) {
        try {
            $this->db->select("CP.Pagos_Doc, CP.Estatus_Contable "
                            . "")
                    ->from("cartera_proveedores AS CP")
                    ->where("CP.Doc", $Doc)
                    ->where("CP.Tp", $Tp)
                    ->where("CP.Proveedor", $Proveedor);
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

    public function onRevisarDoctoCompra($Doc, $Tp, $Proveedor) {
        try {
            $this->db->select("CP.* "
                            . "")
                    ->from("compras AS CP")
                    ->where("CP.Doc", $Doc)
                    ->where("CP.Tp", $Tp)
                    ->where("CP.Proveedor", $Proveedor);
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

    public function onEliminarCartProv($Doc, $Tp, $Prov) {
        try {
            $this->db->where('Doc', $Doc)
                    ->where('Tp', $Tp)
                    ->where('Proveedor', $Prov)
                    ->delete("cartera_proveedores");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarCompra($Doc, $Tp, $Prov) {
        try {
            $this->db->where('Doc', $Doc)
                    ->where('Tp', $Tp)
                    ->where('Proveedor', $Prov)
                    ->delete("compras");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarMovArt($Doc, $Tp, $Prov) {
        try {
            $this->db->where('DocMov', $Doc)
                    ->where('Tp', $Tp)
                    ->where('Proveedor', $Prov)
                    ->delete("movarticulos");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onActualizarCantidadesOrdenCompra($Doc, $Tp, $Prov, $Art, $cant_restada) {
        try {

            $sql = "UPDATE ordencompradetalle OCD "
                    . "JOIN ordencompra OC ON OC.ID =  OCD.OrdenCompra AND OC.Proveedor = '$Prov' "
                    . "SET OCD.CantidadRecibida =  ifnull(OCD.CantidadRecibida,0) - $cant_restada , "
                    . "OCD.Factura = '' , "
                    . "OCD.FechaFactura = '' "
                    . "WHERE OC.Tp = '$Tp' "
                    . "AND OCD.Factura = '$Doc' "
                    . "AND OCD.Articulo = '$Art'";
            //print ($sql);
            $this->db->query($sql);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCompra($Doc, $Tp, $Proveedor) {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select("C.Articulo, "
                            . "sum(C.Cantidad) AS Cantidad,"
                            . "C.OrdenCompra,"
                            . "C.TpOrdenCompra,"
                            . "sum(C.Cantidad) * Precio AS Subtotal "
                            . "")
                    ->from("compras C")
                    ->join("articulos A", 'ON A.Clave = C.Articulo')
                    ->where("C.Tp", $Tp)
                    ->where("C.Doc", $Doc)
                    ->where("C.Proveedor", $Proveedor)
                    ->group_by("C.Articulo");
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

}
