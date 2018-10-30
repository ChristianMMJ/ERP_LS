<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class MarcaCompraInservible_model extends CI_Model {

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
                                    . "OCD.Cantidad, "
                                    . "OCD.CantidadRecibida, "
                                    . "OCD.Precio, "
                                    . "OCD.SubTotal, "
                                    . "OC.Sem, "
                                    . "OC.Maq, "
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
                            ->where_in('OC.Estatus', array('ACTIVA', 'PENDIENTE', 'RECIBIDA'))
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar($ID) {
        try {
            $this->db->set('Estatus', 'CANCELADA')->where('ID', $ID)->update("ordencompra");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
