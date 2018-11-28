<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class ReportesProveedores_model extends CI_Model {

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

    public function getProveedoresReporteAntiguedad($prov, $aprov, $tp, $fecha, $aFecha) {
        try {
            return $this->db->select("CAST(P.Clave AS SIGNED ) AS ClaveNum, P.Plazo, "
                                    . "CONCAT(P.Clave,' ',IFNULL(P.NombreI,'')) AS ProveedorI, "
                                    . "CONCAT(P.Clave,' ',IFNULL(P.NombreF,'')) AS ProveedorF ", false)
                            ->from("cartera_proveedores AS CP")
                            ->join("proveedores AS P", 'ON P.Clave =  CP.Proveedor')
                            ->like("CP.Tp", $tp)
                            ->where("CP.Estatus", 'SIN PAGAR', 'PENDIENTE')
                            ->where("CP.Proveedor BETWEEN $prov AND $aprov  ", null, false)
                            ->where("STR_TO_DATE(CP.FechaDoc, \"%d/%m/%Y\") BETWEEN STR_TO_DATE('$fecha', \"%d/%m/%Y\") AND STR_TO_DATE('$aFecha', \"%d/%m/%Y\")")
                            ->group_by("CP.Proveedor")
                            ->order_by("ClaveNum", 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDoctosByProveedorTpAntiguedad($prov, $aprov, $tp, $fecha, $aFecha) {
        try {
            return $this->db->select("CAST(CP.Proveedor AS SIGNED ) AS ClaveNum, "
                                    . "CP.Tp,"
                                    . "CP.Doc, "
                                    . "CP.FechaDoc, "
                                    . "CP.ImporteDoc, "
                                    . "CP.Pagos_Doc,"
                                    . "CP.Saldo_Doc,"
                                    . 'IFNULL(DATEDIFF(CURDATE(), STR_TO_DATE(CP.FechaDoc , "%d/%m/%Y" )),\'\') AS Dias,'
                                    . "
CASE WHEN DATEDIFF(CURRENT_DATE(), date_format(str_to_date(CP.FechaDoc, '%d/%m/%Y'), '%Y-%m-%d')) > 0
			AND  DATEDIFF(CURRENT_DATE(), date_format(str_to_date(CP.FechaDoc, '%d/%m/%Y'), '%Y-%m-%d')) < 8
	THEN CP.Saldo_Doc END AS 'UNO',

CASE WHEN DATEDIFF(CURRENT_DATE(), date_format(str_to_date(CP.FechaDoc, '%d/%m/%Y'), '%Y-%m-%d')) > 7
			AND  DATEDIFF(CURRENT_DATE(), date_format(str_to_date(CP.FechaDoc, '%d/%m/%Y'), '%Y-%m-%d')) < 16
	THEN CP.Saldo_Doc END AS 'DOS',

CASE WHEN DATEDIFF(CURRENT_DATE(), date_format(str_to_date(CP.FechaDoc, '%d/%m/%Y'), '%Y-%m-%d')) > 15
			AND  DATEDIFF(CURRENT_DATE(), date_format(str_to_date(CP.FechaDoc, '%d/%m/%Y'), '%Y-%m-%d')) < 31
	THEN CP.Saldo_Doc END AS 'TRES',

CASE WHEN DATEDIFF(CURRENT_DATE(), date_format(str_to_date(CP.FechaDoc, '%d/%m/%Y'), '%Y-%m-%d')) > 30
			AND  DATEDIFF(CURRENT_DATE(), date_format(str_to_date(CP.FechaDoc, '%d/%m/%Y'), '%Y-%m-%d')) < 46
	THEN CP.Saldo_Doc END AS 'CUATRO',

CASE WHEN DATEDIFF(CURRENT_DATE(), date_format(str_to_date(CP.FechaDoc, '%d/%m/%Y'), '%Y-%m-%d')) > 45
			AND  DATEDIFF(CURRENT_DATE(), date_format(str_to_date(CP.FechaDoc, '%d/%m/%Y'), '%Y-%m-%d')) < 61
	THEN CP.Saldo_Doc END AS 'CINCO',


CASE WHEN DATEDIFF(CURRENT_DATE(), date_format(str_to_date(CP.FechaDoc, '%d/%m/%Y'), '%Y-%m-%d')) > 60
	THEN CP.Saldo_Doc END AS 'SEIS' "
                                    . ' '
                                    . " "
                                    . "", false)
                            ->from("cartera_proveedores AS CP")
                            ->like("CP.Tp", $tp)
                            ->where("CP.Estatus", 'SIN PAGAR', 'PENDIENTE')
                            ->where("CP.Proveedor BETWEEN $prov AND $aprov  ", null, false)
                            ->where("STR_TO_DATE(CP.FechaDoc, \"%d/%m/%Y\") BETWEEN STR_TO_DATE('$fecha', \"%d/%m/%Y\") AND STR_TO_DATE('$aFecha', \"%d/%m/%Y\")")
                            ->order_by("ClaveNum", 'ASC')
                            ->order_by("Dias", 'DESC')
                            ->order_by("CP.Doc", 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getProveedoresReporte($prov, $aprov, $tp) {
        try {
            return $this->db->select("CAST(P.Clave AS SIGNED ) AS ClaveNum, P.Plazo, "
                                    . "CONCAT(P.Clave,' ',IFNULL(P.NombreI,'')) AS ProveedorI, "
                                    . "CONCAT(P.Clave,' ',IFNULL(P.NombreF,'')) AS ProveedorF ", false)
                            ->from("cartera_proveedores AS CP")
                            ->join("proveedores AS P", 'ON P.Clave =  CP.Proveedor')
                            ->like("CP.Tp", $tp)
                            ->where("CP.Estatus", 'SIN PAGAR', 'PENDIENTE')
                            ->where("CP.Proveedor BETWEEN $prov AND $aprov  ", null, false)
                            ->group_by("CP.Proveedor")
                            ->order_by("ClaveNum", 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDoctosByProveedorTp($prov, $aprov, $tp) {
        try {
            return $this->db->select("CAST(CP.Proveedor AS SIGNED ) AS ClaveNum, CP.Tp,"
                                    . "CP.Doc, CP.FechaDoc, CP.ImporteDoc, CP.Pagos_Doc,"
                                    . "CP.Saldo_Doc,"
                                    . 'IFNULL(DATEDIFF(CURDATE(), STR_TO_DATE(CP.FechaDoc , "%d/%m/%Y" )),\'\') AS Dias '
                                    . " "
                                    . "", false)
                            ->from("cartera_proveedores AS CP")
                            ->like("CP.Tp", $tp)
                            ->where("CP.Estatus", 'SIN PAGAR', 'PENDIENTE')
                            ->where("CP.Proveedor BETWEEN $prov AND $aprov  ", null, false)
                            ->order_by("ClaveNum", 'ASC')
                            ->order_by("Dias", 'DESC')
                            ->order_by("CP.Doc", 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
