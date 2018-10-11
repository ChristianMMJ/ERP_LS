<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class AsignaPFTSACXC_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getControlesAsignados() {
        try {
            $this->db->select("A.ID, A.Empleado, A.Articulo, A.Descripcion, A.Fecha, A.Cargo, A.Abono, A.Devolucion AS Dev")
                    ->from("asignapftsacxc AS A");
            return $this->db->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPieles($SEMANA, $CONTROL) {
        try {
            $this->db->select("OP.ID, OP.ControlT AS CONTROL, OPD.Articulo AS ARTICULO_CLAVE, "
                            . "OPD.ArticuloT AS ARTICULO_DESCRIPCION, OPD.UnidadMedidaT AS UM, OPD.Pieza AS PIEZA, "
                            . "OPD.PiezaT AS PIEZA_DESCRIPCION, OPD.Grupo AS GRUPO, FORMAT(OPD.Cantidad,3) AS CANTIDAD, "
                            . "OP.ControlT AS CONTROL, OP.Semana AS SEMANA, GROUP_CONCAT(F.Clave ORDER BY F.Clave ASC) AS FRACCION, OP.Pares AS PARES")
                    ->from("ordendeproduccion AS OP")
                    ->join('ordendeproducciond AS OPD', 'OP.ID = OPD.OrdenDeProduccion')
                    ->join('fraccionesxestilo AS FXE', 'OP.Estilo = FXE.Estilo')
                    ->join('fracciones AS F', 'FXE.Fraccion = F.Clave');
            if ($SEMANA !== '' && $CONTROL !== '') {
                $this->db->where('OP.Semana', $SEMANA)->where('OP.ControlT', $CONTROL);
            }
            return $this->db->where('OPD.Grupo', 1)->where('F.Departamento', 10)
                            ->group_by('OPD.OrdenDeProduccion')
                            ->group_by('OP.ControlT')
                            ->group_by('OPD.Pieza')
                            ->group_by('OPD.Articulo')
                            ->group_by('OPD.UnidadMedidaT')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getForros($SEMANA, $CONTROL) {
        try {
            $this->db->select("OP.ID, OP.ControlT AS CONTROL, OPD.Articulo AS ARTICULO_CLAVE, "
                            . "OPD.ArticuloT AS ARTICULO_DESCRIPCION, OPD.UnidadMedidaT AS UM, OPD.Pieza AS PIEZA, "
                            . "OPD.PiezaT AS PIEZA_DESCRIPCION, OPD.Grupo AS GRUPO, FORMAT(OPD.Cantidad,3) AS CANTIDAD, "
                            . "OP.Semana AS SEMANA, GROUP_CONCAT(F.Clave ORDER BY F.Clave ASC) AS FRACCION, OP.Pares AS PARES")
                    ->from("ordendeproduccion AS OP")
                    ->join('ordendeproducciond AS OPD', 'OP.ID = OPD.OrdenDeProduccion')
                    ->join('fraccionesxestilo AS FXE', 'OP.Estilo = FXE.Estilo')
                    ->join('fracciones AS F', 'FXE.Fraccion = F.Clave');
            if ($SEMANA !== '' && $CONTROL !== '') {
                $this->db->where('OP.Semana', $SEMANA)->where('OP.ControlT', $CONTROL);
            }
            return $this->db->where('OPD.Grupo', 2)->where('F.Departamento', 10)
                            ->group_by('OPD.OrdenDeProduccion')
                            ->group_by('OP.ControlT')
                            ->group_by('OPD.Pieza')
                            ->group_by('OPD.Articulo')
                            ->group_by('OPD.UnidadMedidaT')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTextiles($SEMANA, $CONTROL) {
        try {
            $this->db->select("`OP`.`ID`, `OP`.`ControlT` AS `CONTROL`, `OPD`.`Articulo` AS `ARTICULO_CLAVE`, `OPD`.`ArticuloT` AS `ARTICULO_DESCRIPCION`, 
`OPD`.`UnidadMedidaT` AS `UM`, `OPD`.`Pieza` AS `PIEZA`, `OPD`.`PiezaT` AS `PIEZA_DESCRIPCION`, `OPD`.`Grupo` AS `GRUPO`, 
FORMAT(OPD.Cantidad, 3) AS CANTIDAD, `OP`.`Semana` AS `SEMANA`, GROUP_CONCAT(F.Clave ORDER BY F.Clave ASC) AS FRACCION, OP.Pares AS PARES")
                    ->from("ordendeproduccion AS OP")
                    ->join('ordendeproducciond AS OPD', 'OP.ID = OPD.OrdenDeProduccion')
                    ->join('fraccionesxestilo AS FXE', 'OP.Estilo = FXE.Estilo')
                    ->join('fracciones AS F', 'FXE.Fraccion = F.Clave');
            if ($SEMANA !== '' && $CONTROL !== '') {
                $this->db->where('OP.Semana', $SEMANA)->where('OP.ControlT', $CONTROL);
            }
            return $this->db->where('OPD.Grupo', 34)->where('F.Departamento', 10)
                            ->group_by('OPD.OrdenDeProduccion')
                            ->group_by('OP.ControlT')
                            ->group_by('OPD.Pieza')
                            ->group_by('OPD.Articulo')
                            ->group_by('OPD.UnidadMedidaT')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSinteticos($SEMANA, $CONTROL) {
        try {
            $this->db->select("OP.ID, OP.ControlT AS CONTROL, OPD.Articulo AS ARTICULO_CLAVE, "
                            . "OPD.ArticuloT AS ARTICULO_DESCRIPCION, OPD.UnidadMedidaT AS UM, OPD.Pieza AS PIEZA, "
                            . "OPD.PiezaT AS PIEZA_DESCRIPCION, OPD.Grupo AS GRUPO, FORMAT(OPD.Cantidad,3) AS CANTIDAD, "
                            . "OP.Semana AS SEMANA, GROUP_CONCAT(F.Clave ORDER BY F.Clave ASC) AS FRACCION, OP.Pares AS PARES")
                    ->from("ordendeproduccion AS OP")
                    ->join('ordendeproducciond AS OPD', 'OP.ID = OPD.OrdenDeProduccion')
                    ->join('fraccionesxestilo AS FXE', 'OP.Estilo = FXE.Estilo')
                    ->join('fracciones AS F', 'FXE.Fraccion = F.Clave');
            if ($SEMANA !== '' && $CONTROL !== '') {
                $this->db->where('OP.Semana', $SEMANA)->where('OP.ControlT', $CONTROL);
            }
            return $this->db->where('OPD.Grupo', 40)->where('F.Departamento', 10)
                            ->group_by('OPD.OrdenDeProduccion')
                            ->group_by('OP.ControlT')
                            ->group_by('OPD.Pieza')
                            ->group_by('OPD.Articulo')
                            ->group_by('OPD.UnidadMedidaT')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExplosionXSemanaControlFraccionArticulo($SEMANA, $CONTROL, $FRACCION, $ARTICULO, $GRUPO) {
        try {
            $this->db->select("FORMAT(SUM(OPD.Cantidad),3) AS EXPLOSION")
                    ->from("ordendeproduccion AS OP")
                    ->join('ordendeproducciond AS OPD', 'OP.ID = OPD.OrdenDeProduccion')
                    ->join('fraccionesxestilo AS FXE', 'OP.Estilo = FXE.Estilo')
                    ->join('fracciones AS F', 'FXE.Fraccion = F.Clave');
            if ($SEMANA !== '' && $CONTROL !== '') {
                $this->db->where('OP.Semana', $SEMANA)->where('OP.ControlT', $CONTROL);
            }
            if ($FRACCION !== '') {
                $this->db->where('FXE.Fraccion', $FRACCION);
            }
            return $this->db->where('F.Departamento', 10)
                            ->where('OPD.Articulo', $ARTICULO)
                            ->where('OPD.Grupo', $GRUPO)
                            ->group_by('OPD.Articulo')
                            ->group_by('OPD.UnidadMedida')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onChecarSemanaValida($S) {
        try {
            return $this->db->select("COUNT(*) AS Semana")->from("semanasproduccion AS S")->where("S.Sem", $S)->where("S.Estatus", "ACTIVO")->order_by('S.Sem', 'ASC')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarEntrega($SEMANA, $CONTROL, $ARTICULO, $FRACCION) {
        try {
            return $this->db->select("A.*")
                            ->from("asignapftsacxc AS A")
                            ->where('A.Empleado', 0)
                            ->where('A.Articulo LIKE \'' . $ARTICULO . '\' AND A.Semana LIKE  \'' . $SEMANA . '\' AND A.Control LIKE \'' . $CONTROL . '\' AND A.Fraccion LIKE \'' . $FRACCION . '\' ', null, false)
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
