<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class AvanceTejido_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            $this->db->select("ID, Clave, Descripcion, Direccion, Tel, Cel", false)
                    ->from('agentes AS C');
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

    public function getChoferes() {
        try {
            return $this->db->select("E.ID, CONCAT(E.Numero,' ', E.PrimerNombre,' ', E.SegundoNombre,' ', E.Paterno,' ', E.Materno) AS Empleado", false)
                            ->from('empleados AS E')
                            ->where('E.AltaBaja', 1)->where('E.DepartamentoFisico', 170)
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTejedoras() {
        try {
            return $this->db->select("E.ID, CONCAT(E.Numero,' ', E.PrimerNombre,' ', E.SegundoNombre,' ', E.Paterno,' ', E.Materno) AS Empleado", false)
                            ->from('empleados AS E')
                            ->where('E.AltaBaja', 1)->where('E.Puesto', 'TEJEDORA')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getControlesParaTejido() {
        try {
            return $this->db->select("C.ID, C.Control, C.Estilo, C.Color, C.Pares, C. AS Empleado", false)
                            ->from('controles AS C')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getColoresXEstilo($Estilo) {
        try {
            return $this->db->select("CAST(C.Clave AS SIGNED ) AS ID, CONCAT(C.Clave,'-', C.Descripcion) AS Descripcion ", false)
                            ->from('colores AS C')
                            ->where('C.Estilo', $Estilo)
                            ->where('C.Estatus', 'ACTIVO')
                            ->order_by('ID', 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}