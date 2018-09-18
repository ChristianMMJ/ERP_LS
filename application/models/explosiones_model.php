<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class explosiones_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
    }

    public function getDatosEmpresa() {
        try {
            $this->db->select("E.RazonSocial as Empresa, E.Foto as Logo "
                            . " ", false)
                    ->from('empresas AS E')
                    ->where('Estatus', 'ACTIVO');

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

    public function getGrupos($Ano, $Semana, $aSemana, $Maquila, $aMaquila, $TipoE) {
        try {
            $this->db->select("CAST(G.Clave AS SIGNED ) AS Clave ,G.Nombre "
                    . " ", false);
            $this->db->from('pedidodetalle PE');
            $this->db->join('fichatecnica FT', 'ON FT.Estilo =  PE.Estilo AND FT.Color = PE.Color');
            $this->db->join('articulos A', 'ON A.Clave =  FT.Articulo');
            $this->db->join('grupos G', 'ON G.Clave = A.Grupo');
            switch ($TipoE) {
                case '10':
                    $this->db->where_in('G.Clave', array('1', '2'));
                    break;
                case '80':
                    $this->db->where_in('G.Clave', array('3', '50', '52'));
                    break;
                case '90':
                    $this->db->where_not_in('G.Clave', array('1', '2', '3', '50', '52'));
                    break;
            }
            $this->db->where("PE.Maquila BETWEEN $Maquila AND $aMaquila");
            $this->db->where("PE.Semana BETWEEN $Semana AND $aSemana");
            $this->db->where('PE.Ano', $Ano);
            $this->db->where('PE.Estatus', 'A');
            $this->db->group_by('Clave');
            $this->db->order_by('Clave', 'ASC');
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

    public function getPares($Ano, $Semana, $aSemana, $Maquila, $aMaquila) {
        try {
            $this->db->select("SUM(PE.Pares) AS Pares "
                            . " ", false)
                    ->from('pedidodetalle PE')
                    ->where('PE.Estatus', 'A')
                    ->where("PE.Maquila BETWEEN $Maquila AND $aMaquila")
                    ->where("PE.Semana BETWEEN $Semana AND $aSemana")
                    ->where('PE.Ano', $Ano)
                    ->where('PE.Control <>  ', false)
                    ->where('PE.Control IS NOT NULL ', NULL, false);


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

    public function getMateriales($Ano, $Semana, $aSemana, $Maquila, $aMaquila, $TipoE) {
        try {
            $this->db->select("A.Grupo, "
                            . "FT.Articulo "
                            . " ", false)
                    ->from('pedidodetalle PE')
                    ->join('fichatecnica FT', 'ON FT.Estilo =  PE.Estilo AND FT.Color = PE.Color')
                    ->join('articulos A', 'ON A.Clave =  FT.Articulo')
                    ->where("PE.Maquila BETWEEN $Maquila AND $aMaquila")
                    ->where("PE.Semana BETWEEN $Semana AND $aSemana")
                    ->where('PE.Ano', $Ano)
                    ->where('PE.Estatus', 'A')
                    ->where('PE.Control <>  ', false)
                    ->where('PE.Control IS NOT NULL ', NULL, false);

            switch ($TipoE) {
                case '10':
                    $this->db->where_in('A.Grupo', array('1', '2'));
                    break;
                case '80':
                    $this->db->where_in('A.Grupo', array('3', '50', '52'));
                    break;
                case '90':
                    $this->db->where_not_in('A.Grupo', array('1', '2', '3', '50', '52'));
                    break;
            }
            $this->db->group_by('A.Clave')
                    ->order_by('A.Grupo', 'ASC')
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

    public function getExplosionMateriales($Ano, $Semana, $aSemana, $Maquila, $aMaquila, $TipoE, $SinClasif) {
        try {
            $this->db->select("A.Grupo, "
                            . "FT.Articulo, "
                            . "A.Descripcion, "
                            . "U.Descripcion AS Unidad,"
                            . "CASE WHEN PZA.Clasificacion = '1' THEN
                                '1ra'
                                WHEN PZA.Clasificacion = '2' THEN
                                '2da'
                                WHEN PZA.Clasificacion = '3' THEN
                                '3ra'
                                ELSE '-'
                                END AS Clasificacion, "
                            . "CASE WHEN E.PiezasCorte <= 10 THEN
                                MA.PorExtra3a10
                                WHEN E.PiezasCorte > 10 AND E.PiezasCorte <= 14 THEN
                                MA.PorExtra11a14
                                WHEN E.PiezasCorte > 14 AND E.PiezasCorte <= 18 THEN
                                MA.PorExtra15a18
                                WHEN E.PiezasCorte > 18  THEN
                                MA.PorExtra19a
                                END AS Desperdicio , "
                            . "PE.Pares,"
                            . "SUM(FT.Consumo) AS Consumo,"
                            . "PM.Precio "
                            . " ", false)
                    ->from('pedidodetalle PE')
                    ->join('fichatecnica FT', 'ON FT.Estilo =  PE.Estilo AND FT.Color = PE.Color')
                    ->join('preciosmaquilas PM', "ON PM.Articulo = FT.Articulo AND PM.Maquila ='$Maquila' ")
                    ->join('articulos A', 'ON A.Clave =  FT.Articulo')
                    ->join('piezas PZA', 'ON PZA.Clave =  FT.Pieza')
                    ->join('grupos G', 'ON G.Clave = A.Grupo')
                    ->join('Unidades U', 'ON U.Clave = A.UnidadMedida')
                    ->join('maquilas MA', "MA.Clave = '$Maquila'")
                    ->join('estilos E', 'ON E.Clave = PE.Estilo')
                    ->where("PE.Maquila BETWEEN $Maquila AND $aMaquila")
                    ->where("PE.Semana BETWEEN $Semana AND $aSemana")
                    ->where('PE.Ano', $Ano)
                    ->where('PE.Estatus', 'A')
                    ->where('PE.Control <>  ', false)
                    ->where('PE.Control IS NOT NULL ', NULL, false);
            switch ($TipoE) {
                case '10':
                    $this->db->where_in('G.Clave', array('1', '2'));
                    break;
                case '80':
                    $this->db->where_in('G.Clave', array('3', '50', '52'));
                    break;
                case '90':
                    $this->db->where_not_in('G.Clave', array('1', '2', '3', '50', '52'));
                    break;
            }

            //Agrupacion
            $this->db->group_by('A.Clave');
            //Agrupacion validando si se agrupa por tipo de piel
            if ($SinClasif === '0') {
                $this->db->group_by('PZA.Clasificacion');
            }

            $this->db->order_by('A.Grupo', 'ASC');
            $this->db->order_by('A.Descripcion', 'ASC');
            if ($SinClasif === '0') {
                $this->db->order_by('PZA.Clasificacion', 'ASC');
            }

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
