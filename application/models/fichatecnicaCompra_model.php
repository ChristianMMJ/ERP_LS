<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class fichatecnicaCompra_model extends CI_Model {

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

    public function getEncabezadoFT($Estilo, $Color) {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select("FXE.Estilo AS ESTILO,"
                            . "L.CLAVE AS CLINEA, L.DESCRIPCION AS DLINEA, "
                            . "C.CLAVE AS CCOLOR, C.DESCRIPCION AS DCOLOR   "
                            . " ", false)
                    ->from('fichatecnica AS FXE')
                    ->join('estilos AS E', 'ON E.Clave = FXE.Estilo')
                    ->join('lineas AS L', 'ON L.Clave = E.Linea')
                    ->join('colores AS C', 'ON C.Clave = FXE.Color AND C.Estilo = FXE.Estilo')
                    ->where('FXE.Estilo', $Estilo)
                    ->where('FXE.Color', $Color)
                    ->group_by(array('FXE.Estilo', 'E.Descripcion'));

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

    public function getFichaTecnicaDetalleByID($Estilo, $Color) {
        try {
            $this->db->select('
            P.Clave AS Pieza_ID,
            CONCAT(P.Clave, \'-\', P.Descripcion) AS Pieza,
            FT.Articulo Articulo_ID,
            CONCAT(M.Clave, \'-\', M.Descripcion) AS Articulo,
            C.Descripcion AS Unidad,
            CONCAT(\'\', FT.Consumo, \'\') AS Consumo,
            IFNULL(FT.PzXPar, 1) AS PzXPar,
            FT.ID AS ID,
            CONCAT(\'<span class="fa fa-trash fa-lg " onclick="onEliminarArticuloID(\', FT.ID, \')">\', \'</span>\') AS Eliminar,
            CONCAT(D.Clave, \' - \', D.Descripcion) AS DeptoCat,
            D.Clave AS DEPTO', false)
                    ->from('FichaTecnica AS FT')
                    ->join('`Articulos` AS `M`', '`FT`.`Articulo` = `M`.`Clave`')
                    ->join('`Piezas` AS `P`', '`FT`.`Pieza` = `P`.`Clave`')
                    ->join('Unidades AS C', '`M`.`UnidadMedida` = `C`.`Clave`')
                    ->join('Departamentos AS D', '`P`.`Departamento` = `D`.`Clave`')
                    ->where('FT.Estilo', $Estilo)->where('FT.Color', $Color)
                    ->where('FT.Estatus', 'ACTIVO');
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
//            print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
