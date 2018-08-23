<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class fichatecnica_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
    }

    public function getRecords() {
        try {
            return $this->db->select("FT.Estilo AS EstiloId, "
                                    . "C.Clave ClaveColor,"
                                    . "FT.Color AS ColorId, "
                                    . "CONCAT(IFNULL(E.Clave,''),'-',IFNULL(E.Descripcion,'')) AS Estilo,"
                                    . "CONCAT(IFNULL(C.Clave,''),'-',IFNULL(C.Descripcion,'')) AS Color  ", false)
                            ->from('FichaTecnica AS FT ')
                            ->join('Estilos AS E', 'FT.Estilo = E.Clave', 'left')
                            ->join('Colores AS C', 'FT.Color = C.Clave', 'left')
                            ->where('E.Clave = C.Estilo', null, false)
                            ->where_in('FT.Estatus', array('ACTIVO'))->group_by(array('FT.Estilo', 'FT.Color'))->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFichaTecnicaDetalleByIDx($Estilo, $Color) {
        try {
            return $this->db->select('P.Clave AS Pieza_ID,                P.Clave+\'-\'+ P.Descripcion AS Pieza,
                FT.Articulo Articulo_ID,                 M.Articulo+\'-\'+M.Descripcion AS Articulo,
                CONCAT(\'<span class="text-warning">\',C.SValue,\'</span>\') AS "Unidad",
                CONCAT(\'$\',FORMAT(FT.Precio,2)) AS Precio,
                CONCAT(\'\',FT.Consumo,\'\') AS Consumo,
                FT.TipoPiel As TipoPiel,
                ISNULL(FT.PzXPar,1) AS PzXPar, 
                CONCAT(\'$\',FORMAT((FT.Precio * FT.Consumo), 2)) AS Importe, FT.Clave AS ID, 
                CONCAT(\'<span class="fa fa-trash fa-lg" onclick="onEliminarArticuloID(\',FT.Clave,\')">\',\'</span>\') AS Eliminar,
                CONCAT(D.Clave,\' - \',D.Descripcion) AS DeptoCat, D.Clave AS DEPTO', false)
                            ->from('FichaTecnica AS FT ')
                            ->join('Articulos AS M', 'FT.Articulo = M.Clave')
                            ->join('Piezas AS P', 'FT.Pieza = P.Clave')
                            ->join('Catalogos AS C', 'M.UnidadConsumo = C.Clave')
                            ->join('Departamentos AS D', 'P.DepartamentoCat = D.Clave')
                            ->where('FT.Estilo', $Estilo)->where('FT.Color', $Color)
                            ->where('FT.Estatus', 'ACTIVO')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFichaTecnicaDetalleByID($Estilo, $Color) {
        try {
            $this->db->select('P.Clave AS Pieza_ID, CONCAT(P.Clave, \'-\', P.Descripcion) AS Pieza, 
            FT.Articulo Articulo_ID, CONCAT(M.Descripcion, \'-\', M.Descripcion) AS Articulo, 
            CONCAT(\'<span class="text-warning">\', C.Descripcion, \'</span>\') AS Unidad, 
            CONCAT(\'$\', FORMAT(FT.Precio, 2)) AS Precio, 
            CONCAT(\'\', FT.Consumo, \'\') AS Consumo, IFNULL(FT.PzXPar, 1) AS PzXPar, 
            CONCAT(\'$\', FORMAT((FT.Precio * FT.Consumo), 2)) AS Importe, FT.ID AS ID, 
            CASE WHEN P.Clasificacion = 1 THEN \'1ra\' WHEN P.Clasificacion = 2 THEN \'2da\' WHEN P.Clasificacion = 1 THEN \'1ra\'  END AS TipoPiel,
            CONCAT(\'<span class="fa fa-trash fa-lg" onclick="onEliminarArticuloID(\', FT.ID, \')">\', \'</span>\') AS Eliminar, 
            CONCAT(D.Clave, \' - \', D.Descripcion) AS DeptoCat, D.Clave AS DEPTO', false)
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

    public function onComprobarExisteEstiloColor($Estilo, $Color) {
        try {
            return $this->db->select('COUNT(*) AS EXISTE', false)->from('FichaTecnica AS FT ')
                            ->where('FT.Estilo', $Estilo)->where('FT.Color', $Color)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("FichaTecnica", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID() AS IDL');
            $row = $query->row_array();
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar($ID, $DATA) {
        try {
            $this->db->where('ID', $ID)->update("FichaTecnica", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO')->where('Estilo', $ID)->update("FichaTecnica");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarRenglonDetalle($ID) {
        try {
            $this->db->where('ID', $ID)->delete("FichaTecnica");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFichaTecnicaByEstiloByColor($Estilo, $Color) {
        try {
            return $this->db->select('U.*', false)->from('FichaTecnica AS U')
                            ->where('U.Estilo', $Estilo)->where('U.Color', $Color)
                            ->where_in('U.Estatus', 'ACTIVO')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getArticulosRequeridos($Familia) {
        try {
            return $this->db->select("M.Clave AS ID, CONCAT(M.Clave,' - ', IFNULL(M.Descripcion,'')) AS Articulo", false)
                            ->from('Articulos AS M')->where_in('M.Estatus', array('ACTIVO'))->where_in('M.Grupo', $Familia)
                            ->order_by("M.Clave", "ASC")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPiezas() {
        try {
            return $this->db->select("P.Clave AS ID, CONCAT(P.Clave,' - ',IFNULL(P.Descripcion,'')) AS Descripcion ", false)->from('Piezas AS P')->where_in('P.Estatus', 'ACTIVO')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            return $this->db->select("E.Clave, CONCAT(E.Clave,' - ',IFNULL(E.Descripcion,'')) AS Estilo")->from("Estilos AS E")->where("E.Estatus", "ACTIVO")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getGrupos() {
        try {
            return $this->db->select("G.Clave AS ID, G.Nombre AS Grupo")->from("grupos AS G")->where("G.Estatus", "ACTIVO")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstiloByID($ID) {
        try {
            return $this->db->select('E.*', false)->from('Estilos AS E')->where('E.Clave', $ID)->where_in('E.Estatus', 'ACTIVO')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPrecioPorArticuloByID($ID) {
        try {
            $this->db->select('PM.Precio AS PRECIO', false)->from('Articulos AS E')
                    ->join('preciosmaquilas AS PM','E.Clave = PM.Articulo')
                    ->where('E.Clave', $ID)->where_in('E.Estatus', 'ACTIVO');
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

    public function getColoresXEstilo($Estilo) {
        try {
            return $this->db->select("C.Clave AS ID, CONCAT(C.Clave,'-', C.Descripcion) AS Descripcion ", false)
                            ->from('Colores AS C')->where('C.Estilo', $Estilo)->where('C.Estatus', 'ACTIVO')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarExisteEstiloCombinacion($Estilo, $Combinacion) {
        try {
            return $this->db->select('COUNT(*) AS EXISTE', false)->from('sz_FichaTecnica AS FT ')->where('FT.Estilo', $Estilo)->where('FT.Combinacion', $Combinacion)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
