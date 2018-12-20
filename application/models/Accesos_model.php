<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Accesos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getTiposDeAcceso() {
        try {
            $this->db->select("GROUP_CONCAT(DISTINCT U.TipoAcceso ORDER BY U.TipoAcceso ASC SEPARATOR ',') AS TIPOS_DE_ACCESO", false)
                    ->from('usuarios AS U');
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

    public function getUsuarios() {
        try {
            $this->db->select("U.ID AS ID, U.Usuario AS USUARIO, U.TipoAcceso AS TIPO_ACCESO", false)
                    ->from('usuarios AS U');
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

    public function getModulos() {
        try {
            $this->db->select("M.ID, M.Modulo, M.Fecha, M.Icon, M.Ref, M.Order", false)
                    ->from('modulos AS M');
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

    public function getOpciones($M) {
        try {
            $this->db->select("OXM.ID, OXM.Modulo, OXM.Opcion, OXM.Fecha, OXM.Icon, OXM.Ref, OXM.Order, OXM.Button, OXM.Class", false)
                    ->from('opcionesxmodulo AS OXM')->where('OXM.Modulo', $M);
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

    public function getModulosXUsuario($U) {
        try {
            return $this->db->select("M.ID, M.Modulo", false)
                            ->from('modulosxusuario AS U')
                            ->join('modulos AS M', 'U.Modulo = M.ID')
                            ->where('U.Usuario', $U)
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getOpcionesXModuloxUsuario($U, $M) {
        try {
            return $this->db->select("OXM.ID, OXM.Opcion", false)
                            ->from('opcionesxmoduloxusuario AS OXMU')
                            ->join('opcionesxmodulo AS OXM', 'OXMU.Opcion = OXM.ID')
                            ->where('OXMU.Usuario', $U)
                            ->where('OXMU.Modulo', $M)
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
