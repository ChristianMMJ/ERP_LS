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
            $this->db->select("CONCAT(E.PrimerNombre,' ',E.SegundoNombre,' ',E.Paterno,' ',E.Materno) AS NOMBRE_COMPLETO", false)
                    ->from('empleados AS E')
                    ->where('E.Numero', $EMPLEADO)
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

}
