<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class MaterialRecibido_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            return $this->db->select("OC.ID,"
                                    . "OC.Tp, "
                                    . "OC.Folio, "
                                    . "OC.Proveedor, "
                                    . "CASE WHEN OC.Tp ='1' THEN  CONCAT(P.Clave,' ',P.NombreF) "
                                    . "ELSE CONCAT(P.Clave,' ',P.NombreI) END AS NombreProveedor, "
                                    . "CASE WHEN OC.Tp ='1' THEN  "
                                    . "CONCAT('[Ord_Compra: ',OC.Folio,']----->    Prov. ',OC.Proveedor,' ',P.NombreF) "
                                    . "ELSE "
                                    . "CONCAT('[Ord_Compra: ',OC.Folio,']----->    Prov. ',OC.Proveedor,' ',P.NombreI) "
                                    . "END AS GruposT, "
                                    . "OC.FechaOrden, "
                                    . "CONCAT(A.Clave,' ',A.Descripcion) AS Articulo, "
                                    . "OCD.CantidadRecibida AS Cantidad, "
                                    . "OCD.Precio, "
                                    . "OCD.CantidadRecibida*OCD.Precio AS SubTotal, OC.Sem, OC.Maq, "
                                    . "CONCAT(G.Clave,'-',G.Nombre) AS Grupo,"
                                    . "OC.Ano,"
                                    . "OC.Tipo  "
                                    . "", false)
                            ->from("ordencompra AS OC")
                            ->join("ordencompradetalle OCD", 'ON OCD.OrdenCompra = OC.ID')
                            ->join("proveedores P", 'ON P.Clave = OC.Proveedor')
                            ->join("articulos A", 'ON A.Clave = OCD.Articulo')
                            ->join("grupos G", 'ON G.Clave =  A.Grupo')
                            ->join("unidades U", 'ON U.Clave =  A.UnidadMedida')
                            ->where_in('OC.Estatus', array('PENDIENTE', 'RECIBIDA'))
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

}
