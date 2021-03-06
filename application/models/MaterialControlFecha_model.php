<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class MaterialControlFecha_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getPedidoByControl($Control) {
        try {
            $this->db->select("PD.* ,"
                            . ""
                            . "")
                    ->from("pedidox AS PD")
                    ->where("PD.Control", $Control);
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

    public function getOrdenProduccionByControl($Control) {
        try {
            $this->db->select("OP.ControlT ,"
                            . ""
                            . "")
                    ->from("ordendeproduccion AS OP")
                    ->where("OP.ControlT", $Control);
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

    // ********************** REPORTE *************** //
    public function getDeptosArticulos($Control) {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select("OPD.DepartamentoArt "
                            . "")
                    ->from("ordendeproduccion AS OP")
                    ->join("ordendeproducciond AS OPD", "ON OP.ID = OPD.OrdenDeProduccion")
                    ->where_in("OP.ControlT", $Control)
                    ->group_by("OPD.DepartamentoArt")
                    ->order_by("OPD.DepartamentoArt", 'ASC');
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

    public function getGruposArticulos($Control) {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select("OPD.DepartamentoArt, CAST(G.Clave AS SIGNED ) AS ClaveGrupo, G.Nombre "
                            . "")
                    ->from("ordendeproduccion AS OP")
                    ->join("ordendeproducciond AS OPD", "ON OP.ID = OPD.OrdenDeProduccion")
                    ->join("grupos AS G", "ON G.Clave = OPD.Grupo")
                    ->where_in("OP.ControlT", $Control)
                    ->group_by("OPD.DepartamentoArt")
                    ->group_by("OPD.Grupo")
                    ->order_by("OPD.DepartamentoArt", 'ASC')
                    ->order_by("ClaveGrupo", 'ASC');
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

    public function getArticulosEnc($Control) {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select("OPD.DepartamentoArt, CAST(G.Clave AS SIGNED ) AS ClaveGrupo, OP.ControlT, OPD.Articulo "
                            . "")
                    ->from("ordendeproduccion AS OP")
                    ->join("ordendeproducciond AS OPD", "ON OP.ID = OPD.OrdenDeProduccion")
                    ->join("grupos AS G", "ON G.Clave = OPD.Grupo")
                    ->where_in("OP.ControlT", $Control)
                    ->group_by("OPD.Articulo")
                    ->order_by("OPD.DepartamentoArt", 'ASC')
                    ->order_by("ClaveGrupo", 'ASC')
                    ->order_by("OPD.ArticuloT", 'ASC')
                    ->order_by("OP.ControlT", 'ASC');
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

    public function getArticulos($Control) {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select("OPD.DepartamentoArt, CAST(G.Clave AS SIGNED ) AS ClaveGrupo, G.Nombre,"
                            . "OP.ControlT, OPD.Articulo, OPD.ArticuloT, OPD.UnidadMedidaT,sum(OPD.Cantidad) AS Cantidad"
                            . "")
                    ->from("ordendeproduccion AS OP")
                    ->join("ordendeproducciond AS OPD", "ON OP.ID = OPD.OrdenDeProduccion")
                    ->join("grupos AS G", "ON G.Clave = OPD.Grupo")
                    ->where_in("OP.ControlT", $Control)
                    ->group_by("OP.ControlT")
                    ->group_by("OPD.Articulo")
                    ->order_by("OPD.DepartamentoArt", 'ASC')
                    ->order_by("ClaveGrupo", 'ASC')
                    ->order_by("OPD.ArticuloT", 'ASC')
                    ->order_by("OP.ControlT", 'ASC');
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

    /*     * *********REPORTE 2 ************* */

    public function getDeptosArticulosByAnoMaqSem($Ano, $Sem, $Maq) {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select("OPD.DepartamentoArt "
                            . "")
                    ->from("ordendeproduccion AS OP")
                    ->join("ordendeproducciond AS OPD", "ON OP.ID = OPD.OrdenDeProduccion")
                    ->where_in("OP.ano", $Ano)
                    ->where_in("OP.semana", $Sem)
                    ->where_in("OP.maquila", $Maq)
                    ->group_by("OPD.DepartamentoArt")
                    ->order_by("OPD.DepartamentoArt", 'ASC');
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

    public function getGruposArticulosByAnoMaqSem($Ano, $Sem, $Maq) {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select("OPD.DepartamentoArt, CAST(G.Clave AS SIGNED ) AS ClaveGrupo, G.Nombre "
                            . "")
                    ->from("ordendeproduccion AS OP")
                    ->join("ordendeproducciond AS OPD", "ON OP.ID = OPD.OrdenDeProduccion")
                    ->join("grupos AS G", "ON G.Clave = OPD.Grupo")
                    ->where_in("OP.ano", $Ano)
                    ->where_in("OP.semana", $Sem)
                    ->where_in("OP.maquila", $Maq)
                    ->group_by("OPD.DepartamentoArt")
                    ->group_by("OPD.Grupo")
                    ->order_by("OPD.DepartamentoArt", 'ASC')
                    ->order_by("ClaveGrupo", 'ASC');
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

    public function getArticulosEncByAnoMaqSem($Ano, $Sem, $Maq) {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select("OPD.DepartamentoArt, CAST(G.Clave AS SIGNED ) AS ClaveGrupo, OP.ControlT, OPD.Articulo "
                            . "")
                    ->from("ordendeproduccion AS OP")
                    ->join("ordendeproducciond AS OPD", "ON OP.ID = OPD.OrdenDeProduccion")
                    ->join("grupos AS G", "ON G.Clave = OPD.Grupo")
                    ->where_in("OP.ano", $Ano)
                    ->where_in("OP.semana", $Sem)
                    ->where_in("OP.maquila", $Maq)
                    ->group_by("OPD.Articulo")
                    ->order_by("OPD.DepartamentoArt", 'ASC')
                    ->order_by("ClaveGrupo", 'ASC')
                    ->order_by("OPD.ArticuloT", 'ASC')
                    ->order_by("OP.ControlT", 'ASC');
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

    public function getArticulosByAnoMaqSem($Ano, $Sem, $Maq) {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select("OPD.DepartamentoArt, CAST(G.Clave AS SIGNED ) AS ClaveGrupo, G.Nombre,"
                            . "OP.ControlT, OPD.Articulo, OPD.ArticuloT, OPD.UnidadMedidaT,sum(OPD.Cantidad) AS Cantidad"
                            . "")
                    ->from("ordendeproduccion AS OP")
                    ->join("ordendeproducciond AS OPD", "ON OP.ID = OPD.OrdenDeProduccion")
                    ->join("grupos AS G", "ON G.Clave = OPD.Grupo")
                    ->where_in("OP.ano", $Ano)
                    ->where_in("OP.semana", $Sem)
                    ->where_in("OP.maquila", $Maq)
                    ->group_by("OP.ControlT")
                    ->group_by("OPD.Articulo")
                    ->order_by("OPD.DepartamentoArt", 'ASC')
                    ->order_by("ClaveGrupo", 'ASC')
                    ->order_by("OPD.ArticuloT", 'ASC')
                    ->order_by("OP.ControlT", 'ASC');
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

    /*     * *********REPORTE 3 POR DEPARTAMENTO ************* */

    public function getGruposArticulosByAnoMaqSemByDepto($Ano, $Sem, $Maq, $Tipo) {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select("OPD.DepartamentoArt, CAST(G.Clave AS SIGNED ) AS ClaveGrupo, G.Nombre "
                            . "")
                    ->from("ordendeproduccion AS OP")
                    ->join("ordendeproducciond AS OPD", "ON OP.ID = OPD.OrdenDeProduccion")
                    ->join("grupos AS G", "ON G.Clave = OPD.Grupo")
                    ->where_in("OP.ano", $Ano)
                    ->where_in("OP.semana", $Sem)
                    ->where_in("OP.maquila", $Maq)
                    ->where_in("OPD.DepartamentoArt", $Tipo)
                    ->group_by("OPD.DepartamentoArt")
                    ->group_by("OPD.Grupo")
                    ->order_by("OPD.DepartamentoArt", 'ASC')
                    ->order_by("ClaveGrupo", 'ASC');
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

    public function getArticulosEncByAnoMaqSemByDepto($Ano, $Sem, $Maq, $Tipo) {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select("CAST(G.Clave AS SIGNED ) AS ClaveGrupo, OP.ControlT, OPD.Articulo "
                            . "")
                    ->from("ordendeproduccion AS OP")
                    ->join("ordendeproducciond AS OPD", "ON OP.ID = OPD.OrdenDeProduccion")
                    ->join("grupos AS G", "ON G.Clave = OPD.Grupo")
                    ->where_in("OP.ano", $Ano)
                    ->where_in("OP.semana", $Sem)
                    ->where_in("OP.maquila", $Maq)
                    ->where_in("OPD.DepartamentoArt", $Tipo)
                    ->group_by("OPD.Articulo")
                    ->order_by("ClaveGrupo", 'ASC')
                    ->order_by("OPD.ArticuloT", 'ASC')
                    ->order_by("OP.ControlT", 'ASC');
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

    public function getArticulosByAnoMaqSemByDepto($Ano, $Sem, $Maq, $Tipo) {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select("OPD.DepartamentoArt, CAST(G.Clave AS SIGNED ) AS ClaveGrupo, G.Nombre,"
                            . "OP.ControlT, OPD.Articulo, OPD.ArticuloT, OPD.UnidadMedidaT,sum(OPD.Cantidad) AS Cantidad"
                            . "")
                    ->from("ordendeproduccion AS OP")
                    ->join("ordendeproducciond AS OPD", "ON OP.ID = OPD.OrdenDeProduccion")
                    ->join("grupos AS G", "ON G.Clave = OPD.Grupo")
                    ->where_in("OP.ano", $Ano)
                    ->where_in("OP.semana", $Sem)
                    ->where_in("OP.maquila", $Maq)
                    ->where_in("OPD.DepartamentoArt", $Tipo)
                    ->group_by("OP.ControlT")
                    ->group_by("OPD.Articulo")
                    ->order_by("OPD.DepartamentoArt", 'ASC')
                    ->order_by("ClaveGrupo", 'ASC')
                    ->order_by("OPD.ArticuloT", 'ASC')
                    ->order_by("OP.ControlT", 'ASC');
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
