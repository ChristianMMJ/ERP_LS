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
            return $this->db->select("OC.ID AS ID, OC.Tipo AS Tipo, OC.Folio AS Folio, CONCAT(P.Clave,'-',P.NombreI) AS Proveedor, "
                                    . "OC.FechaOrden AS Fecha "
                                    . "", false)
                            ->from("ordencompra AS OC")
                            ->join("proveedores AS P", 'P.Clave =  OC.Proveedor')
                            ->where('OC.Estatus', 'ACTIVO')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getOrdenCompraByID($ID) {
        try {
            return $this->db->select("OC.*", false)->from("ordencompra AS OC")->where('OC.ID', $ID)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFolio($tp) {
        try {
            return $this->db->select("CONVERT(A.Folio, UNSIGNED INTEGER) AS Folio")->from("ordencompra AS A")
                            ->where("A.Estatus", "ACTIVO")
                            ->where("A.Tp", $tp)
                            ->order_by("Folio", "DESC")
                            ->limit(1)
                            ->get()
                            ->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPrecioCompraByArticuloByProveedor($Articulo, $Proveedor) {
        try {
            $this->db->select(" "
                            . "CASE WHEN  A.ProveedorUno = '" . $Proveedor . "' THEN A.PrecioUno "
                            . "WHEN  A.ProveedorDos = '" . $Proveedor . "' THEN A.PrecioDos "
                            . "WHEN  A.ProveedorTres = '" . $Proveedor . "' THEN A.PrecioTres "
                            . "END AS Precio "
                            . " ", false)
                    ->from("articulos AS A")
                    ->where('A.Clave', $Articulo);
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

    public function getArticuloByDeptoByProveedor($Depto, $Proveedor) {
        try {
            $this->db->select(" CONVERT(A.Clave, UNSIGNED INTEGER) AS CLAVE , CONCAT(A.Clave,'-',A.Descripcion) AS Articulo"
                            . " ", false)
                    ->from("articulos AS A")
                    ->where('A.Departamento', $Depto)
                    ->where('A.ProveedorUno', $Proveedor)
                    ->or_where('A.ProveedorDos', $Proveedor)
                    ->or_where('A.ProveedorTres', $Proveedor)
                    ->where('A.Estatus', 'ACTIVO')
                    ->order_by('CLAVE', 'ASC');
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

    public function onComprobarMaquilas($Clave) {
        try {
            return $this->db->select("G.Clave, G.Direccion")->from("Maquilas AS G")->where("G.Clave", $Clave)->where("G.Estatus", "ACTIVO")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarSemanasProduccion($Clave, $Ano) {
        try {
            return $this->db->select("G.Sem")->from("SemanasProduccion AS G")->where("G.Sem", $Clave)->where("G.Ano", $Ano)->where("G.Estatus", "ACTIVO")->get()->result();
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

    /* DETALLE */

    public function getDetalleByID($ID) {
        try {
            $this->db->select('OCD.ID,'
                    . 'OCD.Articulo AS ClaveArticulo,'
                    . "CONCAT(A.Clave,'-',A.Descripcion) AS Articulo,"
                    . 'OCD.Cantidad,'
                    . 'UM.Descripcion AS Unidad,'
                    . "OCD.Precio AS Precio,"
                    . "OCD.Subtotal AS Subtotal,"
                    . 'CONCAT(\'<span class="fa fa-trash fa-lg" onclick="onEliminarCompraDetalleByID(\',OCD.ID,\')">\',\'</span>\') AS Eliminar'
                    . '', false);
            $this->db->from('ordencompradetalle AS OCD')
                    ->join('ordencompra AS OC', 'OC.ID= OCD.OrdenCompra', 'left')
                    ->join('articulos AS A', 'A.Clave = OCD.Articulo', 'left')
                    ->join('Unidades AS UM', 'A.UnidadMedida = UM.Clave', 'left')
                    ->where('OC.ID', $ID);
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
