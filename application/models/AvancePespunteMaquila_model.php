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

    public function getRecords() {
        try {
            return $this->db->select('CP.ID, CP.numcho, CP.nomcho, CP.numtej, '
                                    . 'CP.nomtej, CP.fechapre, CP.control, '
                                    . 'CP.estilo, CP.color, CP.nomcolo, '
                                    . 'CP.docto, CP.pares', false)
                            ->from('controlpes AS CP')
                            ->where('CP.Estatus', 'ACTIVO')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
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

    public function getControlesParaPespunte() {
        try {
            return $this->db->select("C.ID, C.Control AS CONTROL, C.Estilo AS ESTILO, "
                                    . "C.Color AS COLOR, C.Pares AS PARES, "
                                    . "P.FechaEntrega AS ENTREGA, C.Maquila AS MAQUILA", false)
                            ->from('controles AS C')
                            ->join('pedidox AS P', 'C.Control = P.Control')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onVerificarAvance($control) {
        try {
            /* 100 = MAQUILA */
            return $this->db->select("COUNT(A.ID) AS EXISTE", false)
                            ->from('avance AS A')
                            ->where('A.Departamento', 100)
                            ->like('A.Control', $control)
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getInfoControl($CONTROL) {
        try {
            return $this->db->select("C.ID, C.Control, C.FechaProgramacion, C.Estilo, "
                                    . "C.Color, C.Serie, C.Cliente, C.Pares, C.Pedido, "
                                    . "C.PedidoDetalle, C.Estatus, C.Departamento, C.Ano, "
                                    . "C.Maquila, C.Semana, C.Consecutivo, C.Motivo", false)
                            ->from('controles AS C')
                            ->like('C.Control', $CONTROL)
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
