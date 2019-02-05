<?php

/**
 * Description of AvancePespunteMaquila_model
 *
 * @author Y700
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class AvancePespunteMaquila_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getMaquilas() {
        try {
            return $this->db->select("M.Clave AS CLAVE, CONCAT(M.Clave,' ',M.Nombre) AS MAQUILA", false)
                            ->from('maquilas AS M')
                            ->where('M.Estatus', 'ACTIVO')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEmpleados() {
        try {
            return $this->db->select("E.Numero AS CLAVE, "
                                    . "CONCAT(E.Numero,' ',E.PrimerNombre,' ',E.SegundoNombre,' ',E.Paterno,' ',E.Materno) AS EMPLEADO", false)
                            ->from('empleados AS E')
                            ->where_in('E.Puesto', array('PESPUNTE', 'PESPUNTADOR', 'PRELIMINAR'))
                            ->where('E.AltaBaja', 1)
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getColoresXEstilo($Estilo) {
        try {
            return $this->db->select("CAST(C.Clave AS SIGNED ) AS CLAVE, CONCAT(C.Clave,'-', C.Descripcion) AS COLOR ", false)
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
