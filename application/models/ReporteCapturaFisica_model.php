<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class ReporteCapturaFisica_model extends CI_Model {

    public function __construct() {
        parent::__construct();
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

}
