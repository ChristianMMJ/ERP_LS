<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class MaterialNoRecibido_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            return $this->db->select("OC.Tp, OC.Folio, OC.Proveedor, "
                                    . "CASE WHEN OC.Tp ='1' THEN  CONCAT(P.Clave,'-',P.NombreF) "
                                    . "ELSE CONCAT(P.Clave,'-',P.NombreI) END AS NombreProveedor, "
                                    . "OC.FechaOrden, A.Clave AS ClaveArt, A.Descripcion AS Articulo, "
                                    . "OCD.Cantidad, OCD.Precio, OCD.SubTotal, OC.Sem, OC.Maq, "
                                    . "CONCAT(G.Clave,'-',G.Nombre) AS Grupo "
                                    . "", false)
                            ->from("ordencompra AS OC")
                            ->join("ordencompradetalle OCD", 'ON OCD.OrdenCompra = OC.ID')
                            ->join("proveedores P", 'ON P.Clave = OC.Proveedor')
                            ->join("articulos A", 'ON A.Clave = OCD.Articulo')
                            ->join("grupos G", 'P.Clave =  OC.Proveedor')
                            ->join("unidades U", 'ON G.Clave =  A.Grupo')
                            ->where_in('OC.Estatus', array('ACTIVO', 'CERRADA'))
                            ->where_in('OC.Tipo', array('90', '10'))
                            ->get()->result();
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

    public function getReporteConfirmacionOrdenCompra($Año, $Sem, $Maq, $Tipo) {
        try {
            $this->db->select(''
                    . 'OC.Folio,'
                    . 'OC.FechaOrden,'
                    . 'OC.FechaEntrega,'
                    . "IFNULL(OC.FechaConf,'') AS FechaConf,"
                    . "OC.Proveedor,"
                    . "CASE WHEN OC.Tp ='1' THEN  P.NombreF ELSE "
                    . "P.NombreI END AS NombreProveedor, "
                    . "IFNULL(OC.ObservacionesConf,'') AS ObservacionesConf,"
                    . 'IFNULL(DATEDIFF(STR_TO_DATE( OC.FechaConf , "%d/%m/%Y" ), STR_TO_DATE( OC.FechaOrden , "%d/%m/%Y" )),\'\') AS Dias,'
                    . 'IFNULL(DATEDIFF(STR_TO_DATE( OC.FechaConf , "%d/%m/%Y" ), STR_TO_DATE( OC.FechaEntrega , "%d/%m/%Y" )),\'\') AS Dias2,'
                    . '', false);
            $this->db->from('ordencompra AS OC')
                    ->join('proveedores AS P', 'OC.Proveedor = P.Clave')
                    ->where('OC.Ano', $Año)
                    ->where('OC.Sem', $Sem)
                    ->where('OC.Maq', $Maq)
                    ->where('OC.Tipo', $Tipo)
                    ->where_in('OC.Estatus', array('ACTIVO'))
                    ->order_by('OC.Folio', 'ASC');
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
