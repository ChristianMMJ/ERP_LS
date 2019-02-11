<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class ReportesCompras_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getTotalGrupoReporte($FechaIni, $FechaFin, $Tp, $Grupo) {
        try {
            $this->db->query("SET sql_mode = '';");
            return $this->db->select("CAST(A.Grupo AS SIGNED) AS ClaveGrupo, sum(C.Cantidad) AS TotalGrupo   ", false)
                            ->from("compras C")
                            ->join("articulos A", 'ON A.Clave =  C.Articulo')
                            ->where("C.Estatus", 'CONCLUIDA')
                            ->like("C.Tp ", $Tp)
                            ->where("A.Grupo ", $Grupo)
                            ->where("STR_TO_DATE(C.FechaDoc, \"%d/%m/%Y\") BETWEEN STR_TO_DATE('$FechaIni', \"%d/%m/%Y\") AND STR_TO_DATE('$FechaFin', \"%d/%m/%Y\") ", null, false)
                            ->group_by("A.Grupo")
                            ->order_by("ClaveGrupo", 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getGruposReporte($FechaIni, $FechaFin, $Tp) {
        try {
            $this->db->query("SET sql_mode = '';");
            return $this->db->select("CAST(G.Clave AS SIGNED) AS ClaveGrupo, G.Nombre AS NombreGrupo  ", false)
                            ->from("compras C")
                            ->join("articulos A", 'ON A.Clave =  C.Articulo')
                            ->join("grupos G", "ON G.Clave = A.Grupo ")
                            ->where("C.Estatus", 'CONCLUIDA')
                            ->like("C.Tp ", $Tp)
                            ->where("STR_TO_DATE(C.FechaDoc, \"%d/%m/%Y\") BETWEEN STR_TO_DATE('$FechaIni', \"%d/%m/%Y\") AND STR_TO_DATE('$FechaFin', \"%d/%m/%Y\") ", null, false)
                            ->group_by("G.Clave")
                            ->group_by("G.Nombre")
                            ->order_by("ClaveGrupo", 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getArticulosReporte($FechaIni, $FechaFin, $Tp) {
        try {
            $this->db->query("SET sql_mode = '';");
            return $this->db->select("CAST(A.Grupo AS SIGNED) AS ClaveGrupo, A.Clave, A.Descripcion,U.Descripcion AS Unidad, sum(C.Cantidad) AS Cantidad  ", false)
                            ->from("compras C")
                            ->join("articulos A", 'ON A.Clave =  C.Articulo')
                            ->join("unidades U", "ON U.Clave = A.UnidadMedida ")
                            ->where("C.Estatus", 'CONCLUIDA')
                            ->like("C.Tp ", $Tp)
                            ->where("STR_TO_DATE(C.FechaDoc, \"%d/%m/%Y\") BETWEEN STR_TO_DATE('$FechaIni', \"%d/%m/%Y\") AND STR_TO_DATE('$FechaFin', \"%d/%m/%Y\") ", null, false)
                            ->group_by("A.Clave")
                            ->order_by("ClaveGrupo", 'ASC')
                            ->order_by("A.Descripcion", 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /* Compras Generales */

    public function getProveedoresReporte($FechaIni, $FechaFin, $Tp, $Tipo) {
        try {
            $this->db->query("SET sql_mode = '';");
            $this->db->select("CAST(P.Clave AS SIGNED) AS ClaveProveedor,"
                            . "CASE WHEN CP.Tp = '1' THEN P.NombreF  "
                            . "ELSE P.NombreI "
                            . "END AS NombreProveedor"
                            . "  ", false)
                    ->from("cartera_proveedores CP")
                    ->join("proveedores P", 'ON P.Clave =  CP.Proveedor')
                    ->like("CP.Tp ", $Tp)
                    ->where_in("CP.Estatus ", array('SIN PAGAR', 'PAGADO', 'PENDIENTE'))
                    ->where("STR_TO_DATE(CP.FechaDoc, \"%d/%m/%Y\") BETWEEN STR_TO_DATE('$FechaIni', \"%d/%m/%Y\") AND STR_TO_DATE('$FechaFin', \"%d/%m/%Y\") ", null, false);

            if ($Tipo === '0') {
                $this->db->where("DocDirecto", '1');
            }
            if ($Tipo === '') {

            }
            if ($Tipo !== '' && $Tipo !== '0') {
                $this->db->like("CP.Departamento", $Tipo);
            }

            return $this->db->group_by("P.Clave")
                            ->order_by("ClaveProveedor", 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDocumentosReporte($FechaIni, $FechaFin, $Tp, $Tipo) {
        try {
            $this->db->query("SET sql_mode = '';");
            $this->db->select("CAST(P.Clave AS SIGNED) AS ClaveProveedor,"
                            . "CASE WHEN CP.Tp = '1' THEN P.NombreF  "
                            . "ELSE P.NombreI "
                            . "END AS NombreProveedor,"
                            . "CP.FechaDoc,"
                            . "CP.Doc,"
                            . "CP.ImporteDoc,"
                            . "CP.Pagos_Doc,"
                            . "CP.Saldo_Doc"
                            . "  ", false)
                    ->from("cartera_proveedores CP")
                    ->join("proveedores P", 'ON P.Clave =  CP.Proveedor')
                    ->like("CP.Tp ", $Tp)
                    ->where_in("CP.Estatus ", array('SIN PAGAR', 'PAGADO', 'PENDIENTE'))
                    ->where("STR_TO_DATE(CP.FechaDoc, \"%d/%m/%Y\") BETWEEN STR_TO_DATE('$FechaIni', \"%d/%m/%Y\") AND STR_TO_DATE('$FechaFin', \"%d/%m/%Y\") ", null, false);
            if ($Tipo === '0') {
                $this->db->where("DocDirecto", '1');
            }
            if ($Tipo === '') {

            }
            if ($Tipo !== '' && $Tipo !== '0') {
                $this->db->like("CP.Departamento", $Tipo);
            }
            return $this->db->order_by("ClaveProveedor", 'ASC')
                            ->order_by("CP.Doc", 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /* Desglose */

    public function getArticulosReporteGeneralDesgloce($Doc, $Proveedor, $Tp) {
        try {
            $this->db->query("SET sql_mode = '';");
            return $this->db->select(" A.Clave, A.Descripcion AS Articulo, U.Descripcion AS Unidad, C.Cantidad, C.Precio, C.Subtotal, "
                                    . "CASE WHEN C.Tp = '1' THEN C.Subtotal * 0.16 ELSE 0 END AS Iva, "
                                    . "CASE WHEN C.Tp = '1' THEN C.Subtotal * 1.16 ELSE C.Subtotal END AS Total "
                                    . "  ", false)
                            ->from("compras C")
                            ->join("articulos A", 'ON A.Clave =  C.Articulo')
                            ->join("unidades U", 'ON U.Clave =  A.UnidadMedida')
                            ->where("C.Doc ", $Doc)
                            ->where("C.Proveedor ", $Proveedor)
                            ->where("C.Tp ", $Tp)
                            ->order_by("A.Descripcion", 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /* Devoluciones */

    public function getProveedoresReporteDevoluciones($FechaIni, $FechaFin, $Tp) {
        try {
            $this->db->query("SET sql_mode = '';");
            $this->db->select("CAST(P.Clave AS SIGNED) AS ClaveProveedor,"
                            . "CASE WHEN NC.Tp = '1' THEN P.NombreF  "
                            . "ELSE P.NombreI "
                            . "END AS NombreProveedor"
                            . "  ", false)
                    ->from("notascreditoprov NC")
                    ->join("proveedores P", 'ON P.Clave =  NC.Proveedor')
                    ->like("NC.Tp ", $Tp)
                    ->where("NC.Estatus ", 2)
                    ->where("STR_TO_DATE(NC.Fecha, \"%d/%m/%Y\") BETWEEN STR_TO_DATE('$FechaIni', \"%d/%m/%Y\") AND STR_TO_DATE('$FechaFin', \"%d/%m/%Y\") ", null, false);
            return $this->db->group_by("P.Clave")
                            ->order_by("ClaveProveedor", 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDocsProveedoresReporteDevoluciones($FechaIni, $FechaFin, $Tp) {
        try {
            $this->db->query("SET sql_mode = '';");
            $this->db->select("CAST(NC.Proveedor AS SIGNED) AS ClaveProveedor, CAST(NC.DocCartProv AS SIGNED) AS DocCartProv  "
                            . "  ", false)
                    ->from("notascreditoprov NC")
                    ->like("NC.Tp ", $Tp)
                    ->where("NC.Estatus ", 2)
                    ->where("STR_TO_DATE(NC.Fecha, \"%d/%m/%Y\") BETWEEN STR_TO_DATE('$FechaIni', \"%d/%m/%Y\") AND STR_TO_DATE('$FechaFin', \"%d/%m/%Y\") ", null, false);
            return $this->db->group_by("NC.Proveedor")
                            ->group_by("NC.DocCartProv")
                            ->order_by("ClaveProveedor", 'ASC')
                            ->order_by("DocCartProv", 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetalleDocsProveedoresReporteDevoluciones($FechaIni, $FechaFin, $Tp) {
        try {
            $this->db->query("SET sql_mode = '';");
            $this->db->select("CAST(NC.Proveedor AS SIGNED) AS ClaveProveedor, CAST(NC.DocCartProv AS SIGNED) AS DocCartProv,"
                            . "NC.Folio, "
                            . "NC.Fecha, "
                            . "NC.DocCartProv, "
                            . "NC.Cantidad, "
                            . "A.Descripcion AS Articulo, "
                            . "NC.Concepto, "
                            . "NC.Precio, "
                            . "NC.Subtotal "
                            . "  ", false)
                    ->from("notascreditoprov NC")
                    ->join("articulos A", 'ON A.Clave =  NC.Articulo')
                    ->like("NC.Tp ", $Tp)
                    ->where("NC.Estatus ", 2)
                    ->where("STR_TO_DATE(NC.Fecha, \"%d/%m/%Y\") BETWEEN STR_TO_DATE('$FechaIni', \"%d/%m/%Y\") AND STR_TO_DATE('$FechaFin', \"%d/%m/%Y\") ", null, false);
            return $this->db->order_by("ClaveProveedor", 'ASC')
                            ->order_by("DocCartProv", 'ASC')
                            ->order_by("A.Descripcion", 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
