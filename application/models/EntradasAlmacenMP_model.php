<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class EntradasAlmacenMP_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            return $this->db->select("OC.ID AS ID, "
                                    . "OC.Tp AS Tp, "
                                    . "CASE WHEN OC.Tipo = '10' THEN '10 PIEL Y FORRO' "
                                    . "ELSE '90 PELETERIA' END AS Tipo,"
                                    . "OC.Folio AS Folio, "
                                    . "OC.Ano AS Ano, "
                                    . "OC.Sem AS Sem, "
                                    . "OC.Maq AS Maq, "
                                    . "CASE WHEN OC.Tp ='1' THEN  CONCAT(P.Clave,'-',P.NombreF) ELSE "
                                    . "CONCAT(P.Clave,'-',P.NombreI) END AS Proveedor, "
                                    . "OC.FechaOrden AS Fecha, "
                                    . "CASE WHEN OC.Estatus = 'BORRADOR' THEN "
                                    . "CONCAT('<span class=''badge badge-info''>','EN CAPTURA','</span>') "
                                    . "ELSE "
                                    . "CONCAT('<span class=''badge badge-success''>','ACTIVA','</span>') "
                                    . "END AS Estatus "
                                    . "", false)
                            ->from("ordencompra AS OC")
                            ->join("proveedores AS P", 'P.Clave =  OC.Proveedor')
                            ->where_in('OC.Estatus', array('ACTIVA', 'BORRADOR'))
                            ->where_in('OC.Tipo', array('90', '10'))
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFolio($tp) {
        try {
            return $this->db->select("CONVERT(A.Folio, UNSIGNED INTEGER) AS Folio")->from("ordencompra AS A")
//                            ->where_in("A.Estatus", array("ACTIVO", "CERRADA"))
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
            return $this->db->select("G.Clave, G.Direccion")->from("maquilas AS G")->where("G.Clave", $Clave)->where("G.Estatus", "ACTIVO")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarSemanasProduccion($Clave, $Ano) {
        try {
            return $this->db->select("G.Sem")->from("semanasproduccion AS G")->where("G.Sem", $Clave)->where("G.Ano", $Ano)->where("G.Estatus", "ACTIVO")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onVerificarSemanaProdCerrada($Ano, $Maq, $Sem) {
        try {
            $this->db->select("G.Estatus")->from("semanasproduccioncerradas AS G")
                    ->where("G.Ano", $Ano)
                    ->where("G.Maq", $Maq)
                    ->where("G.Sem", $Sem);
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

    public function onVerificarSemanaProdDepartamentoCerrada($Ano, $Maq, $Sem, $Depto) {
        try {
            $this->db->select("G.Estatus")->from("semanasproduccioncerradasdepartamento AS G")
                    ->where("G.Departamento", $Depto)
                    ->where("G.Ano", $Ano)
                    ->where("G.Maq", $Maq)
                    ->where("G.Sem", $Sem);
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

    public function onAgregar($array) {
        try {
            $this->db->insert("ordencompra", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID()');
            $row = $query->row_array();
            $LastIdInserted = $row['LAST_INSERT_ID()'];
            return $LastIdInserted;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'CANCELADA')->where('ID', $ID)->update("ordencompra");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
