<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Avance8_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function onComprobarDeptoXEmpleado($EMPLEADO) {
        try {
            return $this->db->select("CONCAT(E.PrimerNombre,' ',"
                                    . "(CASE WHEN E.SegundoNombre <>'0' THEN E.SegundoNombre ELSE '' END),"
                                    . "' ',(CASE WHEN E.Paterno <>'0' THEN E.Paterno ELSE '' END),' ',"
                                    . "(CASE WHEN E.Materno <>'0' THEN E.Materno ELSE '' END)) AS NOMBRE_COMPLETO, "
                                    . "E.DepartamentoCostos AS DEPTOCTO", false)
                            ->from('empleados AS E')
                            ->where('E.Numero', $EMPLEADO)
                            ->where_in('E.AltaBaja', array(1))
                            ->where_in('E.FijoDestajoAmbos', array(2, 3))
                            ->where_in('E.DepartamentoCostos', array(40/* PREL-CORTE */, 80/* RAYADO CONTADO */, 90/* ENTRETELADO */, 140/* ENSUELADO */))
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPagosXEmpleadoXSemana($EMPLEADO, $SEMANA) {
        try {
            $part_one = "IFNULL((SELECT SUM(fpn.subtot) FROM fracpagnomina AS fpn WHERE dayofweek(fpn.fecha)";
            $part_two = "AND fpn.numeroempleado = '$EMPLEADO' AND fpn.Semana = $SEMANA GROUP BY dayofweek(fpn.fecha)),0)";

            return $this->db->select(
                                    "$part_one = 2 $part_two AS LUNES,"
                                    . "$part_one = 3 $part_two AS MARTES,"
                                    . "$part_one = 4 $part_two AS MIERCOLES,"
                                    . "$part_one = 5 $part_two AS JUEVES,"
                                    . "$part_one = 6 $part_two AS VIERNES,"
                                    . "$part_one = 7 $part_two AS SABADO,"
                                    . "$part_one = 1 $part_two AS DOMINGO", false)
                            ->limit(1)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSemanaByFecha($fecha) {
        try {
            $this->db->select("U.Sem, '$fecha' AS Fecha", false)
                    ->from('semanasproduccion AS U')
                    ->where("STR_TO_DATE(\"{$fecha}\", \"%d/%m/%Y\") BETWEEN STR_TO_DATE(FechaIni, \"%d/%m/%Y\") AND STR_TO_DATE(FechaFin, \"%d/%m/%Y\")");
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
//        print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarRetornoDeMaterialXControl($CONTROL, $FR) {
        try {
            $this->db->select("A.Estilo, A.Pares, FXE.CostoMO, (A.Pares * FXE.CostoMO) AS TOTAL, A.Fraccion AS Fraccion", false)
                    ->from('asignapftsacxc AS A')
                    ->join('fraccionesxestilo as FXE', 'A.Estilo = FXE.Estilo')
                    ->where("A.Fraccion", $FR)
                    ->where("FXE.Fraccion", $FR)
                    ->where("A.Control", $CONTROL);
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
//        print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarRetornoDeMaterial($CONTROL, $FRACCION, $EMPLEADO) {
        try {
            return $this->db->select("COUNT(*) AS EXISTE", false)
                            ->from('asignapftsacxc AS A')
                            ->like("A.Control", $CONTROL)
                            ->like("A.Fraccion", $FRACCION)
                            ->like("A.Empleado", $EMPLEADO)
                            ->order_by('A.ID', 'DESC')
                            ->limit(1)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getUltimoAvanceXControl($CONTROL) {
        try {
            $this->db->select("A.ID, A.Control, A.FechaAProduccion, A.Departamento, A.DepartamentoT, A.FechaAvance, A.Estatus, A.Usuario, A.Fecha, A.Hora ", false)
                    ->from('avance AS A')
                    ->where("A.Control", $CONTROL)
                    ->order_by('A.ID', 'DESC')
                    ->limit(1);
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
//        print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFraccionesPagoNomina($E, $F) {
        try {
            $this->db->select("FACN.ID, FACN.numeroempleado, FACN.maquila, "
                            . "FACN.control AS CONTROL, FACN.estilo AS ESTILO, "
                            . "FACN.numfrac AS FRAC, FACN.preciofrac AS PRECIO, "
                            . "FACN.pares AS PARES, FACN.subtot AS SUBTOTAL, "
                            . "FACN.status, DATE_FORMAT(FACN.fecha, \"%d/%m/%Y\") AS FECHA, "
                            . "FACN.semana AS SEMANA, FACN.depto AS DEPARTAMENTO, "
                            . "FACN.registro, FACN.anio, FACN.avance_id", false)
                    ->from('fracpagnomina AS FACN')->where("FACN.numfrac IN($F)", null, false);
            if ($E !== '' && $E !== NULL) {
                $this->db->where('FACN.numeroempleado', $E);
            }
            $dtm = $this->db->get()->result();
            $str = $this->db->last_query();
//            print $str;
            return $dtm;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
