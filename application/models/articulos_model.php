<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class articulos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            return $this->db->select("A.ID AS ID, A.Clave AS Clave, "
                                    . "A.Departamento AS Departamento, A.Descripcion AS Descripcion, "
                                    . "U.Descripcion AS UM, A.Estatus AS Estatus", false)
                            ->from("Articulos AS A")->join('Unidades AS U', 'A.UnidadMedida = U.ID')->where('A.Estatus', 'ACTIVO')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getArticuloByID($ID) {
        try {
            return $this->db->select("A.*", false)->from("Articulos AS A")->where('A.ID', $ID)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPrimerMaquilaPrecio($ID) {
        try {
            return $this->db->select("PM.Precio AS PRECIO", false)->from('preciosmaquilas AS PM')
                            ->where('PM.Articulo', $ID)->order_by('PM.ID', 'DESC')->limit(1)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaquilas($ID) {
        try {
            return $this->db->select("M.ID AS ID, M.Nombre AS Maquila", false)->from("maquilas AS M")
                            ->where("M.ID NOT IN(SELECT PM.Maquila FROM preciosmaquilas AS PM WHERE PM.Articulo = $ID)", null, false)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetalleByID($ID) {
        try {
            return $this->db->select("pvm.ID AS ID, M.Nombre AS Maquila, pvm.Precio AS Precio, 'ACTIVO' AS Estatus ", false)
                            ->from("preciosmaquilas AS pvm")->join('maquilas AS M', 'pvm.Maquila = M.ID')->where('pvm.Articulo', $ID)
                            ->where('pvm.Estatus', 'ACTIVO')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getID() {
        try {
            return $this->db->select("A.Clave AS CLAVE")->from("Articulos AS A")->where("A.Estatus", "Activo")->order_by("A.Clave", "DESC")->limit(1)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getGrupos() {
        try {
            return $this->db->select("G.ID AS ID, G.Clave AS Clave, G.Nombre AS Grupo", false)
                            ->from("grupos AS G")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getUnidades() {
        try {
            return $this->db->select("U.ID AS ID, U.Clave AS Clave, U.Descripcion AS Unidad", false)
                            ->from("unidades AS U")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getProveedores() {
        try {
            return $this->db->select("P.ID AS ID, CONCAT(P.Clave,' ',P.NombreI) AS Proveedor", false)
                            ->from("proveedores AS P")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("articulos", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID()');
            $row = $query->row_array();
            $LastIdInserted = $row['LAST_INSERT_ID()'];
            return $LastIdInserted;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar($ID, $DATA) {
        try {
            $this->db->where('ID', $ID)->update("articulos", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO')->where('ID', $ID)->update("articulos");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
