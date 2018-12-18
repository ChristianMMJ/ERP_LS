<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Avance_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            $this->db->select("*", false);
            $query = $this->db->get();

            $str = $this->db->last_query();
//        print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDepartamentos() {
        try {
            return $this->db->select("CAST(D.Clave AS SIGNED ) AS Clave, CONCAT(D.Clave,' - ',D.Descripcion) AS Departamento")
                            ->from("departamentos AS D")
                            ->where("D.Estatus", "ACTIVO")
                            ->where("D.Tipo", 1)
                            ->where("D.Avance", 1)
                            ->where_not_in("D.Clave", array(10, 20))/* 10 CORTE <-*-> 20 RAYADO */
                            ->order_by('Clave', 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSemanaByFecha($fecha) {
        try {
            $this->db->select("U.Sem, '$fecha' AS Fecha", false);
            $this->db->from('semanasproduccion AS U');
            $this->db->where("STR_TO_DATE(\"{$fecha}\", \"%d/%m/%Y\") BETWEEN STR_TO_DATE(FechaIni, \"%d/%m/%Y\") AND STR_TO_DATE(FechaFin, \"%d/%m/%Y\")");
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

    public function getMaquilasPlantillas() {
        try {
            return $this->db->select("CAST(MP.Clave AS SIGNED ) AS Clave, MP.Descripcion AS MaquilasPlantillas")
                            ->from("maquilasplantillas AS MP")
                            ->order_by('MP.Clave', 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEmpleados() {
        try {
            return $this->db->select("E.Numero AS CLAVE, CONCAT(E.Numero,' ', E.PrimerNombre,' ',E.SegundoNombre,' ',E.Paterno,' ', E.Materno) AS EMPLEADO")
                            ->from("empleados AS E")->where_in('E.FijoDestajoAmbos', array(2, 3))->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFracciones() {
        try {
            return $this->db->select("F.Clave AS CLAVE, CONCAT(F.Clave,' ',F.Descripcion) AS FRACCION", false)
                            ->from('fracciones AS F')
                            ->where_not_in('F.Departamento', array(10,20))
                            ->order_by('ABS(F.Clave)', 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
