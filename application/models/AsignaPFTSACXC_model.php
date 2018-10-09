<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class AsignaPFTSACXC_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            $this->db->select("ID, Clave, Descripcion, Direccion, Tel, Cel", false)
                    ->from('agentes AS C');
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

    public function getUID() {
        try {
            return $this->db->select("A.*", false)->from('agentes AS A')->order_by('A.ID', 'DESC')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getAgentes() {
        try {
            $this->db->select("U.ID, U.Clave+'-'+U.RazonSocial AS Nombre ", false)->from('agentes AS U')->where_in('U.Estatus', 'ACTIVO');
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

    public function getVendedores() {
        try {
            return $this->db->select("V.ID, V.Clave+'-'+VRazonSocial AS Nombre ", false)
                            ->from('agentes AS V')
                            ->where_in('V.Estatus', 'ACTIVO')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMagnusID($ID) {
        try {
            $this->db->select("C.IDMAGNUS AS MAGNUS", false)->from('agentes AS C')->where_in('C.Estatus', 'ACTIVO')->where('C.ID', $ID);
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

    public function getListaPrecioByCliente($ID) {
        try {
            $this->db->select("C.ListaDePrecios AS Lista", false)->from('agentes AS C')->where('C.ID', $ID);
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

    public function onAgregar($array) {
        try {
            $this->db->insert("agentes", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID() AS IDL');
            $row = $query->row_array();
//            PRINT "\n ID IN MODEL: $LastIdInserted \n";
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar($ID, $DATA) {
        try {
            $this->db->where('ID', $ID)->update("agentes", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarMagnus($ID, $DATA) {
        try {
            $this->db->where('ID', $ID)->update("agentes", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO')->where('ID', $ID)->update("agentes");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getAgenteByID($ID) {
        try {
            $this->db->select('U.*', false)->from('agentes AS U')->where('U.ID', $ID);
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
//        print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarClienteXRFC($ID, $RFC) {
        try {
            $this->db->select("COUNT(C.ID) AS EXISTE", false)->from('agentes AS C')->where_in('C.RFC', $RFC);
            if ($ID > 0) {
                $this->db->where('C.ID <> ' . $ID, null, false);
            }
            $this->db->where_in('C.Estatus', 'ACTIVO');
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

    public function getID() {
        try {
            return $this->db->select("A.Clave AS CLAVE")->from("agentes AS A")->order_by("CLAVE", "DESC")->limit(1)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetalleByID($ID) {
        try {
            $this->db->select("ap.ID, ap.Agente, ap.Dias, ap.A, ap.Porcentaje", false)->from("agentesporcentajes AS ap")
                    ->join('agentes AS a', 'ap.Agente = a.Clave')->where('a.Clave', $ID);
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

    public function getPieles($SEMANA, $CONTROL) {
        try {
            $this->db->select("OP.ID, OP.ControlT AS CONTROL, OPD.Articulo AS ARTICULO_CLAVE, "
                            . "OPD.ArticuloT AS ARTICULO_DESCRIPCION, OPD.UnidadMedidaT AS UM, OPD.Pieza AS PIEZA, "
                            . "OPD.PiezaT AS PIEZA_DESCRIPCION, OPD.Grupo AS GRUPO, FORMAT(OPD.Cantidad,2) AS CANTIDAD, "
                            . "OP.ControlT AS CONTROL, OP.Semana AS SEMANA, FXE.Fraccion AS FRACCION")
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
                            . "OPD.PiezaT AS PIEZA_DESCRIPCION, OPD.Grupo AS GRUPO, FORMAT(OPD.Cantidad,2) AS CANTIDAD, "
                            . "OP.ControlT AS CONTROL, OP.Semana AS SEMANA, FXE.Fraccion AS FRACCION")
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
FORMAT(OPD.Cantidad, 2) AS CANTIDAD, `OP`.`Semana` AS `SEMANA`,  FXE.Fraccion AS FRACCION")
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
                            . "OPD.PiezaT AS PIEZA_DESCRIPCION, OPD.Grupo AS GRUPO, FORMAT(OPD.Cantidad,2) AS CANTIDAD, "
                            . "OP.Semana AS SEMANA, FXE.Fraccion AS FRACCION")
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
            $this->db->select("SUM(OPD.Cantidad) AS EXPLOSION")
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

}
