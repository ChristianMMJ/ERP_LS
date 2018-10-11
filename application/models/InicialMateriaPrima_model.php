<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class InicialMateriaPrima_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getDatosByMaterial($Mat) {
        try {
            $this->db->select("M.Invini, M.Pinvini, U.Descripcion AS Unidad "
                            . "")
                    ->from("articulos AS M")
                    ->join("unidades AS U", 'ON U.Clave = M.UnidadMedida')
                    ->where("M.Clave", $Mat);
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

    public function onCerrarInv($Mes, $PMes) {
        try {
            $this->db->query("update articulos "
                    . "set $PMes = Pinvini, $Mes = Invini");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onCerrarInv_Fabrica($Mes, $PMes) {
        try {
            $this->db->query("update articulos10 "
                    . "set $PMes = Pinvini, $Mes = Invini");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar($ID, $DATA) {
        try {
            $this->db->where('Clave', $ID)->update("articulos", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarArt_Fabrica($ID, $DATA) {
        try {
            $this->db->where('Clave', $ID)->update("articulos10", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMateriales() {
        try {
            return $this->db->select(" CAST(D.Clave AS SIGNED ) AS ID ,CONCAT(D.Clave,'-',D.Descripcion) AS Material")
                            ->from("articulos AS D")
                            ->order_by('ID', 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
