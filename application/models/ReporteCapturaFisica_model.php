<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class ReporteCapturaFisica_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getInfoArticulo($Articulo, $Maq, $Mes) {
        try {
            return $this->db->select("U.Descripcion AS Unidad, A.$Mes AS ExistenciaCapturada, PM.Precio "
                                    . " "
                                    . " ", false)
                            ->from("articulos AS A")
                            ->join("unidades AS U", "ON A.UnidadMedida = U.Clave")
                            ->join("preciosmaquilas AS PM", "ON PM.Articulo = A.Clave")
                            ->where("A.Clave", $Articulo)
                            ->where("PM.Maquila", '1') /* Se toma el precio de la maquila 1 ya que somos los unicos que hacemos inventario */
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getArticulosParaConteoFisico() {
        try {
            return $this->db->select("CONVERT(A.Clave, UNSIGNED INTEGER) AS Clave , "
                                    . "CONCAT(A.Clave,' ',A.Descripcion) AS Articulo "
                                    . " ", false)
                            ->from("articulos AS A")
                            ->order_by("Clave", "ASC")
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getGrupos() {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select("CAST(G.Clave AS SIGNED ) AS Clave, G.Nombre "
                            . "")
                    ->from("articulos A")
                    ->join("grupos G", 'ON A.Grupo = G.Clave')
//                    ->where("ifnull(A.Pinvini,0) > 0 and ifnull(A.Invini,0) > 0 ", null, false)
                    ->group_by("G.Clave")
                    ->group_by("G.Nombre")
                    ->order_by('Clave', 'ASC');
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

    public function getArticulos() {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select(""
                            . "CAST(A.Grupo AS SIGNED ) AS Grupo,"
                            . "A.Clave, "
                            . "A.Descripcion, "
                            . "U.Descripcion AS Unidad "
                            . "")
                    ->from("articulos A")
                    ->join("unidades U", 'ON U.Clave = A.UnidadMedida')
//                    ->where("ifnull(A.Pinvini,0) > 0 and ifnull(A.Invini,0) > 0 ", null, false)
                    ->order_by('Grupo', 'ASC')
                    ->order_by('A.Descripcion', 'ASC');

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

    /* Comparativo inv fisico VS inv sis */

    public function getDetalleReporteComparativo($Tipo, $Mes, $Maq, $Ano, $Texto_Mes, $Mes_Anterior) {
        try {

            if ($Tipo === '0') {
                $Tipo = '';
            }

            $tabla_movs = 'movarticulos';

            if ($Maq === 'articulos10') {
                $tabla_movs = 'movarticulos_fabrica';
            }

            $this->db->query("set sql_mode=''");
            $this->db->select("CAST(A.Grupo AS SIGNED ) AS ClaveGrupo, "
                            . "A.Clave AS Codigo, "
                            . "A.Descripcion AS Articulo, "
                            . "U.Descripcion AS Unidad, "
                            . "A.$Mes_Anterior AS MesAnterior,  "
                            . "(SELECT SUM(CantidadMov) FROM $tabla_movs WHERE EntradaSalida = 1 "
                            . "AND MONTH(STR_TO_DATE(FechaMov, \"%d/%m/%Y\")) = $Mes "
                            . "AND YEAR(STR_TO_DATE(FechaMov, \"%d/%m/%Y\")) = $Ano "
                            . "AND Articulo = A.Clave) AS Entradas, "
                            . "(SELECT SUM(CantidadMov) FROM $tabla_movs WHERE EntradaSalida = 2 "
                            . "AND MONTH(STR_TO_DATE(FechaMov, \"%d/%m/%Y\")) = $Mes "
                            . "AND YEAR(STR_TO_DATE(FechaMov, \"%d/%m/%Y\")) = $Ano "
                            . "AND Articulo = A.Clave) AS Salidas, "
                            . "A.$Texto_Mes AS MesActual,"
                            . "ifnull(PM.Precio,0) AS Precio,"
                            . "A.Departamento "
                            . "")
                    ->from("$Maq A")
                    ->join("unidades U", 'ON U.Clave = A.UnidadMedida', "left")
                    ->join("preciosmaquilas PM", "ON PM.Articulo = A.Clave AND PM.Maquila = '1' ", "left")
                    ->where("A.$Texto_Mes > 0 ", null, false)
                    ->or_where("IFNULL((SELECT SUM(CantidadMov) FROM $tabla_movs "
                            . "WHERE EntradaSalida = 1 "
                            . "AND Articulo = A.Clave "
                            . "AND MONTH(STR_TO_DATE(FechaMov, \"%d/%m/%Y\")) = $Mes "
                            . "AND YEAR(STR_TO_DATE(FechaMov, \"%d/%m/%Y\")) = $Ano),0) > 0 ", null, false)
                    ->or_where("IFNULL((SELECT SUM(CantidadMov) FROM $tabla_movs "
                            . "WHERE EntradaSalida = 2 "
                            . "AND Articulo = A.Clave "
                            . "AND MONTH(STR_TO_DATE(FechaMov, \"%d/%m/%Y\")) = $Mes "
                            . "AND YEAR(STR_TO_DATE(FechaMov, \"%d/%m/%Y\")) = $Ano),0) > 0 ", null, false)
                    //->like("A.Departamento", $Tipo)
                    ->order_by('ClaveGrupo', 'ASC')
                    ->order_by('A.Descripcion', 'ASC');
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

    public function getGruposReporteComparativo($Tipo, $Mes, $Maq, $Ano, $Texto_Mes) {
        try {
            if ($Tipo === '0') {
                $Tipo = '';
            }
            $tabla_movs = 'movarticulos';

            if ($Maq === 'articulos10') {
                $tabla_movs = 'movarticulos_fabrica';
            }

            $this->db->query("set sql_mode=''");
            $this->db->select("CAST(A.Grupo AS SIGNED ) AS Clave, G.Nombre, A.Departamento "
                            . "")
                    ->from("$Maq A")
                    ->join("grupos G", 'ON A.Grupo = G.Clave')
                    ->where("A.$Texto_Mes > 0 ", null, false)
                    ->or_where("IFNULL((SELECT SUM(CantidadMov) FROM $tabla_movs "
                            . "WHERE EntradaSalida = 1 "
                            . "AND Articulo = A.Clave "
                            . "AND MONTH(STR_TO_DATE(FechaMov, \"%d/%m/%Y\")) = $Mes "
                            . "AND YEAR(STR_TO_DATE(FechaMov, \"%d/%m/%Y\")) = $Ano),0) > 0 ", null, false)
                    ->or_where("IFNULL((SELECT SUM(CantidadMov) FROM $tabla_movs "
                            . "WHERE EntradaSalida = 2 "
                            . "AND Articulo = A.Clave "
                            . "AND MONTH(STR_TO_DATE(FechaMov, \"%d/%m/%Y\")) = $Mes "
                            . "AND YEAR(STR_TO_DATE(FechaMov, \"%d/%m/%Y\")) = $Ano),0) > 0 ", null, false)
                    //->like("A.Departamento", $Tipo)
                    ->group_by("G.Clave")
                    ->group_by("G.Nombre")
                    ->order_by('Clave', 'ASC');
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

    /* Reporte de movimientos de ajuste */

    public function getGruposMovimientosAjuste($Maq, $Mes, $Año) {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select("CAST(G.Clave AS SIGNED ) AS Clave, G.Nombre "
                            . "")
                    ->from("$Maq MA")
                    ->join("articulos A", 'ON A.Clave = MA.Articulo')
                    ->join("grupos G", 'ON A.Grupo = G.Clave')
                    ->where_in("MA.TipoMov", array('EAJ', 'ETR', 'SAJ', 'STR'))
                    ->where("MONTH(STR_TO_DATE(MA.FechaMov, \"%d/%m/%Y\")) = $Mes  ", null, false)
                    ->where("YEAR(STR_TO_DATE(MA.FechaMov, \"%d/%m/%Y\")) = $Año  ", null, false)
                    ->group_by("G.Clave")
                    ->group_by("G.Nombre")
                    ->order_by('Clave', 'ASC');
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

    public function getDetalleMovimientosAjuste($Maq, $Mes, $Año) {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select("CAST(A.Grupo AS SIGNED ) AS ClaveGrupo,  "
                            . "A.Clave AS ClaveArt, "
                            . "A.Descripcion AS Articulo, "
                            . "U.Descripcion AS Unidad, "
                            . "MA.FechaMov,"
                            . "CASE WHEN MA.EntradaSalida = '1' THEN MA.CantidadMov ELSE 0 END AS Entradas, "
                            . "CASE WHEN MA.EntradaSalida = '2' THEN MA.CantidadMov ELSE 0 END AS Salidas,"
                            . "MA.PrecioMov, "
                            . "MA.Subtotal, "
                            . "MA.Sem,"
                            . "MA.Maq,"
                            . "MA.EntradaSalida,"
                            . "MA.TipoMov"
                            . "")
                    ->from("$Maq MA")
                    ->join("articulos A", 'ON A.Clave = MA.Articulo')
                    ->join("unidades U", 'ON U.Clave = A.UnidadMedida')
                    ->where_in("MA.TipoMov", array('EAJ', 'ETR', 'SAJ', 'STR'))
                    ->where("MONTH(STR_TO_DATE(MA.FechaMov, \"%d/%m/%Y\")) = $Mes  ", null, false)
                    ->where("YEAR(STR_TO_DATE(MA.FechaMov, \"%d/%m/%Y\")) = $Año  ", null, false)
                    ->order_by('ClaveGrupo', 'ASC')
                    ->order_by('A.Descripcion', 'ASC')
                    ->order_by('MA.EntradaSalida', 'ASC')
                    ->order_by('MA.TipoMov', 'ASC');
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

    public function getGruposReporteCosto($Maq) {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select("CAST(G.Clave AS SIGNED ) AS Clave, G.Nombre "
                            . "")
                    ->from("$Maq A")
                    ->join("grupos G", 'ON A.Grupo = G.Clave')
                    ->where("ifnull(A.Existencia,0) > 0  ", null, false)
                    ->group_by("G.Clave")
                    ->group_by("G.Nombre")
                    ->order_by('Clave', 'ASC');
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

    public function getDetalleReporteCosto($Maq, $Mes) {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select("CAST(A.Grupo AS SIGNED ) AS ClaveGrupo,  "
                            . "A.Clave AS ClaveArt, "
                            . "A.Descripcion AS Articulo, "
                            . "U.Descripcion AS Unidad, "
                            . "A.P$Mes AS Costo, "
                            . "A.Existencia "
                            . ""
                            . "")
                    ->from("$Maq A")
                    ->join("unidades U", 'ON U.Clave = A.UnidadMedida')
                    ->where("ifnull(A.Existencia,0) > 0 ", null, false)
                    ->order_by('ClaveGrupo', 'ASC')
                    ->order_by('A.Descripcion', 'ASC');
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
