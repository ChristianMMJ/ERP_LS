<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class AvanceXEmpleadoYPagoDeNomina_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function onComprobarDeptoXEmpleado($EMPLEADO) {
        try {
            $this->db->select("CONCAT(E.PrimerNombre,' ',E.SegundoNombre,' ',E.Paterno,' ',E.Materno) AS NOMBRE_COMPLETO, E.DepartamentoCostos AS DEPTOCTO", false)
                    ->from('empleados AS E')
                    ->where('E.Numero', $EMPLEADO)
                    ->where_in('E.AltaBaja', array(1))
                    ->where_in('E.FijoDestajoAmbos', array(2, 3))
                    ->where_in('E.DepartamentoCostos', array(10, 30, 80, 280));
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
            $data = $query->result();
            return $data;
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
            $this->db->select("A.Estilo, A.Pares, FXE.CostoMO, (A.Pares * FXE.CostoMO) AS TOTAL ", false)
                    ->from('asignapftsacxc AS A')
                    ->join('fraccionesxestilo as FXE', 'A.Estilo = FXE.Estilo') 
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

    public function getUltimoAvanceXControl($CONTROL) {
        try {
            $this->db->select("A.ID, A.Control, A.FechaAProduccion, A.Departamento, A.DepartamentoT, A.FechaAvance, A.Estatus, A.Usuario, A.Fecha, A.Hora ", false)
                    ->from('avance AS A') 
                    ->where("A.Control", $CONTROL)
                    ->order_by('A.ID','DESC')
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

}
