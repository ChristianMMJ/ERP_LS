
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class fraccionesXEstilo_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
    }

    public function getRecords() {
        try {
            $this->db->select("FXE.Estilo AS EstiloId,E.Descripcion   "
                            . " ", false)
                    ->from('fraccionesxestilo AS FXE')
                    ->join('estilos AS E', 'ON E.Clave = FXE.Estilo')
                    ->where('FXE.Estatus', 'ACTIVO')
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

    public function getEncabezadoFXE($Estilo) {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select("FXE.Estilo AS ESTILO,L.CLAVE AS CLINEA, L.DESCRIPCION AS DLINEA   "
                            . " ", false)
                    ->from('fraccionesxestilo AS FXE')
                    ->join('estilos AS E', 'ON E.Clave = FXE.Estilo')
                    ->join('lineas AS L', 'ON L.Clave = E.Linea')
                    ->where('FXE.Estilo', $Estilo)
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

    public function getDeptosFXE($Estilo) {
        try {
            $this->db->query("set sql_mode=''");
            $this->db->select("D.Clave AS CDEPTO, D.Descripcion AS DDEPTO  "
                            . " ", false)
                    ->from('fraccionesxestilo AS FXE')
                    ->join('Fracciones AS F', 'ON FXE.Fraccion = F.Clave')
                    ->join('Departamentos AS D', 'ON D.Clave = F.Departamento')
                    ->where('FXE.Estilo', $Estilo)
                    ->group_by(array('D.Clave', 'D.Descripcion'))
                    ->order_by('D.Clave', 'ASC');


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

    public function getFraccionesFXE($Estilo) {
        try {
            $this->db->select("D.Clave AS CDEPTO, F.Clave AS CFRACCION,F.Descripcion AS DFRACCION, "
                            . "CostoMO AS COSTOMO, CostoVTA  AS COSTOVTA "
                            . " ", false)
                    ->from('fraccionesxestilo AS FXE')
                    ->join('Fracciones AS F', 'ON FXE.Fraccion = F.Clave')
                    ->join('Departamentos AS D', 'ON D.Clave = F.Departamento')
                    ->where('FXE.Estilo', $Estilo)
                    ->where('FXE.AfectaCostoVTA', '1')
                    ->order_by('D.Clave', 'ASC')
                    ->order_by('F.Clave', 'ASC');


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

    public function getFraccionesXEstiloDetalleByID($Estilo) {
        try {
            $this->db->select('
            FE.ID AS ID,
            CONCAT(F.Clave, \'-\', F.Descripcion) AS Fraccion,
            FE.CostoMO  AS CostoMO,
            FE.CostoVTA  AS CostoVTA,

            CASE WHEN  FE.AfectaCostoVTA  = 1
            THEN CONCAT(\'<span class="text-success text-strong">SI</span>\')
            ELSE CONCAT(\'<span class="text-danger text-strong">NO</span>\')
            END AS ACV,
            CONCAT(\'<span class="fa fa-trash fa-lg " onclick="onEliminarFraccion(\', FE.ID, \')">\', \'</span>\') AS Eliminar,
            CONCAT(D.Clave, \' - \', D.Descripcion) AS DeptoCat,
            FE.Fraccion AS Fraccion_ID,
            ', false)
                    ->from('fraccionesxestilo AS FE')
                    ->join('`Fracciones` AS `F`', '`FE`.`Fraccion` = `F`.`Clave`')
                    ->join('Departamentos AS D', '`F`.`Departamento` = `D`.`Clave`')
                    ->where('FE.Estilo', $Estilo)
                    ->where('FE.Estatus', 'ACTIVO');
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

    public function onComprobarExisteEstilo($Estilo) {
        try {
            return $this->db->select('COUNT(*) AS EXISTE', false)->from('fraccionesxestilo AS FE ')
                            ->where('FT.Estilo', $Estilo)
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("fraccionesxestilo", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID() AS IDL');
            $row = $query->row_array();
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar($ID, $DATA) {
        try {
            $this->db->where('ID', $ID)->update("fraccionesxestilo", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarFraccion($ID) {
        try {
            $this->db->where('ID', $ID)->delete("fraccionesxestilo");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFraccionXEstiloByEstilo($Estilo) {
        try {
            return $this->db->select('U.*', false)->from('fraccionesxestilo AS U')
                            ->where('U.Estilo', $Estilo)
                            ->where_in('U.Estatus', 'ACTIVO')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDepartamentos() {
        try {
            return $this->db->select("CAST(D.Clave AS SIGNED ) AS Clave,CONCAT(D.Clave,'-',D.Descripcion) AS Departamento")
                            ->from("Departamentos AS D")
                            ->where("D.Estatus", "ACTIVO")
                            ->order_by('Clave', 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFraccionesXDepartamento($Depto) {
        try {
            return $this->db->select("CAST(D.Clave AS SIGNED ) AS ID,CONCAT(D.Clave,'-',D.Descripcion) AS Fraccion")
                            ->from("Fracciones AS D")
                            ->where("D.Estatus", "ACTIVO")
                            ->where("D.Departamento", $Depto)
                            ->order_by('ID', 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            return $this->db->select("E.Clave AS Clave, CONCAT(E.Clave,' - ',IFNULL(E.Descripcion,'')) AS Estilo")
                            ->from("Estilos AS E")
                            ->where("E.Estatus", "ACTIVO")
                            ->order_by('Clave', 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstiloByID($ID) {
        try {
            return $this->db->select('E.*', false)
                            ->from('Estilos AS E')
                            ->where('E.Clave', $ID)
                            ->where_in('E.Estatus', 'ACTIVO')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
