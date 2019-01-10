<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class ReporteCapturaFisica_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getInfoArticulo($Articulo, $Maq, $Mes) {
        try {
            return $this->db->select("U.Descripcion AS Unidad, A.$Mes AS ExistenciaCapturada, PM.Precio "
                                    . " "
                                    . " ", false)
                            ->from("articulos AS A")
                            ->join("unidades AS U", "ON A.UnidadMedida = U.Clave")
                            ->join("preciosmaquilas AS PM", "ON PM.Articulo = A.Clave")
                            ->where("A.Clave", $Articulo)
                            ->where("PM.Maquila", '1') /* Se toma el precio de la maquila 1 ya que somos los unicos que hacemos inventario */
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getArticulosParaConteoFisico() {
        try {
            return $this->db->select("CONVERT(A.Clave, UNSIGNED INTEGER) AS Clave , "
                                    . "CONCAT(A.Clave,' ',A.Descripcion) AS Articulo "
                                    . " ", false)
                            ->from("articulos AS A")
                            ->order_by("Clave", "ASC")
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
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
