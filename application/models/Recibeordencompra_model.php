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
            $this->db->select("G.FechaOrden, G.Proveedor, G.Maq, "
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
            $this->db->select("A.Clave, A.Descripcion, OCD.Precio, "
                            . "OCD.Subtotal, "
                            . "OC.Maq, "
                            . "OC.Sem,"
                            . "OC.Tipo, "
                            . "OC.Tp  "
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

    public function getCompraParaMovArt($Factura, $Tp, $Proveedor) {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select("C.Articulo, "
                            . "A.Descripcion AS DescArticulo,"
                            . "U.Descripcion AS Unidad,"
                            . "C.Precio, "
                            . "sum(C.Cantidad) AS Cantidad,"
                            . "C.Proveedor AS ClaveProv,"
                            . "C.FechaDoc,"
                            . "C.Doc,"
                            . "C.Tp,"
                            . "C.Maq,"
                            . "C.Sem,"
                            . "C.OrdenCompra,"
                            . "CASE WHEN C.Tp ='1' THEN  CONCAT(P.Clave,' ',P.NombreF) ELSE "
                            . "CONCAT(P.Clave,' ',P.NombreI) END AS Proveedor, "
                            . "sum(C.Cantidad) * Precio AS Subtotal "
                            . "")
                    ->from("compras C")
                    ->join("proveedores P", 'ON P.Clave = C.Proveedor')
                    ->join("articulos A", 'ON A.Clave = C.Articulo')
                    ->join("unidades U", 'ON U.Clave = A.UnidadMedida')
                    ->where("C.Tp", $Tp)
                    ->where("C.Doc", $Factura)
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

    public function getMovArtSalida($Doc_Salida, $Tp) {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select("C.Articulo, "
                            . "A.Descripcion AS DescArticulo,"
                            . "U.Descripcion AS Unidad,"
                            . "C.PrecioMov AS Precio, "
                            . "CantidadMov AS Cantidad,"
                            . "C.FechaMov AS FechaDoc,"
                            . "C.DocMov AS Doc,"
                            . "C.OrdenCompra AS DocCompra,"
                            . "C.Tp,"
                            . "C.Maq,"
                            . "C.Sem,"
                            . "C.Subtotal AS Subtotal "
                            . "")
                    ->from("movarticulos C")
                    ->join("articulos A", 'ON A.Clave = C.Articulo')
                    ->join("unidades U", 'ON U.Clave = A.UnidadMedida')
                    ->where("C.Tp", $Tp)
                    ->where("C.DocMov", $Doc_Salida)
                    ->where("C.EntradaSalida", '2');
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

    public function getCompraParaCartProv($Factura, $Tp, $Proveedor) {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select("C.Proveedor, "
                            . "C.Doc,"
                            . "C.FechaDoc, "
                            . "SUM(C.Subtotal) AS Importe, "
                            . "C.Tp, "
                            . "C.Departamento "
                            . "")
                    ->from("compras C")
                    ->where("C.Tp", $Tp)
                    ->where("C.Doc", $Factura)
                    ->where("C.Proveedor", $Proveedor)
                    ->group_by("C.Doc");
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

    public function onModificarEstatusCompra($Doc, $Tp, $Proveedor) {
        try {
            $this->db->set('Estatus', 'CONCLUIDA')
                    ->where('Tp', $Tp)
                    ->where('Doc', $Doc)
                    ->where("Proveedor", $Proveedor)
                    ->update("compras");
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

    public function onAgregarMovArt($array) {
        try {
            $this->db->insert("movarticulos", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID()');
            $row = $query->row_array();
            $LastIdInserted = $row['LAST_INSERT_ID()'];
            return $LastIdInserted;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarMovArtFabrica($array) {
        try {
            $this->db->insert("movarticulos_fabrica", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID()');
            $row = $query->row_array();
            $LastIdInserted = $row['LAST_INSERT_ID()'];
            return $LastIdInserted;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarCartProv($array) {
        try {
            $this->db->insert("cartera_proveedores", $array);
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
                    . "SET OCD.CantidadRecibida = $can_rec + ifnull(OCD.CantidadRecibida,0), "
                    . "OCD.Factura = '$Fac', "
                    . "OCD.FechaFactura = '$FechaFac' "
                    . "WHERE OC.Tp = '$Tp' "
                    . "AND OC.Folio = '$OC' "
                    . "AND OCD.Articulo = '$Art'";
            //print ($sql);
            $this->db->query($sql);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onVerificarExisteCompra($Doc, $Tp, $Proveedor) {
        try {
            $this->db->select("C.Doc, C.FechaDoc, C.Estatus "
                            . "")
                    ->from("compras AS C")
                    ->where("C.Doc", $Doc)
                    ->where("C.Tp", $Tp)
                    ->where("C.Proveedor", $Proveedor)
                    ->where_in("C.Estatus", array("BORRADOR", "CONCLUIDA"))
                    ->group_by("C.Doc");
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

}
