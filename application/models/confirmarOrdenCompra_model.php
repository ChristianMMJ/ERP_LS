<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class confirmarOrdenCompra_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            return $this->db->select("OC.ID AS ID, "
                                    . "OC.Tp AS Tp, "
                                    . "CASE WHEN OC.Tipo = '10' THEN '10 PIEL Y FORRO' "
                                    . "WHEN OC.Tipo = '80' THEN '80 SUELAS' "
                                    . "ELSE '90 PELETERIA' END AS Tipo,"
                                    . "OC.Folio AS Folio, "
                                    . "CASE WHEN OC.Tp ='1' THEN  CONCAT(P.Clave,'-',P.NombreF) ELSE "
                                    . "CONCAT(P.Clave,'-',P.NombreI) END AS Proveedor, "
                                    . "OC.FechaOrden AS FechaOrden, "
                                    . "OC.FechaEntrega AS FechaEnt, "
                                    . "OC.FechaConf AS FechaConf, "
                                    . "OC.ObservacionesConf AS ObsConf "
                                    . "", false)
                            ->from("ordencompra AS OC")
                            ->join("proveedores AS P", 'P.Clave =  OC.Proveedor')
                            ->where_in('OC.Estatus', array('ACTIVO', 'CERRADA'))
                            ->get()->result();
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

    public function onModificar($ID, $DATA) {
        try {
            $this->db->where('ID', $ID)->update("ordencompra", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /* REPORTES */

    public function getDatosEmpresa() {
        try {
            $this->db->select("E.RazonSocial as Empresa, E.Foto as Logo,"
                            . "CONCAT(E.Direccion,' ',E.NoExt,' Col. ',E.Colonia) AS Direccion, "
                            . "CONCAT(E.Ciudad,', ',EDOS.Descripcion,'  Tel. 1464646 AL 49   E-mail: compras@lobosolo.com.mx') AS Direccion2 "
                            . " ", false)
                    ->from('empresas AS E')
                    ->join('estados AS EDOS', 'EDOS.Clave = E.Estado');

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

    public function getReporteOrdenCompra($ID) {
        try {
            $this->db->select(''
                    . 'OC.Tp,'
                    . 'OC.Folio,'
                    . 'OC.FechaOrden,'
                    . 'OC.FechaCaptura,'
                    . 'OC.Estatus,'
                    . "OC.Proveedor,"
                    . "CASE WHEN OC.Tp = '1' THEN "
                    . "P.NombreF "
                    . "ELSE P.NombreI "
                    . "END AS NombreProveedor,"
                    . "OC.ConsignarA,"
                    . "OC.Observaciones,"
                    . "OCD.Cantidad,"
                    . "U.Descripcion AS Unidad,"
                    . "OCD.Articulo,"
                    . "A.Descripcion AS NombreArticulo,"
                    . "OCD.Precio,"
                    . "OCD.SubTotal,"
                    . "OC.Sem,"
                    . "OC.Maq,"
                    . "OC.FechaEntrega"
                    . '', false);
            $this->db->from('ordencompra AS OC')
                    ->join('ordencompradetalle AS OCD', 'OCD.OrdenCompra = OC.ID')
                    ->join('proveedores AS P', 'OC.Proveedor = P.Clave')
                    ->join('articulos AS A', ' A.Clave = OCD.Articulo')
                    ->join('Unidades AS U', 'U.Clave = A.UnidadMedida')
                    ->where('OC.ID', $ID)
                    ->order_by('OCD.Articulo', 'ASC');
//                    ->where('OC.Tp', $TP);
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
