
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class InspeccionPielForro_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function onCerrarCaptura($Tp, $Fact, $Proveedor) {
        try {


            $this->db->where('Tp', $Tp)
                    ->where('Factura', $Fact)
                    ->where('Proveedor', $Proveedor)
                    ->update("recepcionmat_inspeccion", array('Estatus' => 'ACTIVO'));
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalleByID($ID) {
        try {
            $this->db->where('ID', $ID);
            $this->db->delete("recepcionmat_inspeccion");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("recepcionmat_inspeccion", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID()');
            $row = $query->row_array();
            $LastIdInserted = $row['LAST_INSERT_ID()'];
            return $LastIdInserted;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRecords($Tp, $Fac, $Prov) {
        try {
            $this->db->select("RMI.ID, "
                            . "RMI.Articulo AS ClaveArt, "
                            . "A.Descripcion AS Articulo,"
                            . "RMI.Cantidad,"
                            . "RMI.CantidadDevuelta,"
                            . "D.Descripcion AS Defecto, "
                            . "DD.Descripcion AS DetalleDefecto,"
                            . 'CONCAT(\'<span class="fa fa-trash fa-lg" onclick="onEliminarDetalleByID(\',RMI.ID,\')">\',\'</span>\') AS Eliminar'
                            . "")
                    ->from("recepcionmat_inspeccion AS RMI")
                    ->join("articulos AS A", 'ON A.Clave = RMI.Articulo')
                    ->join("defectos AS D", 'ON D.Clave = RMI.Defecto')
                    ->join("defectosdetalle AS DD", 'ON DD.Clave = RMI.DetalleDefecto')
                    ->where("RMI.Tp", $Tp)
                    ->where("RMI.Factura", $Fac)
                    ->where("RMI.Proveedor", $Prov)
                    ->where("RMI.Estatus", 'BORRADOR');
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

    public function getDetalleOrdenCompra($Tp, $Doc) {
        try {
            $this->db->select("OC.ID, "
                            . "OC.Articulo AS ClaveArt, "
                            . "A.Descripcion AS Articulo,"
                            . "OC.CantidadRecibida AS Recibida,"
                            . "OC.Factura,"
                            . "OC.Cantidad,"
                            . "OC.Precio, "
                            . "OC.SubTotal,"
                            . "OC.Sem "
                            . "")
                    ->from("ordencompra AS OC")
                    ->join("articulos AS A", 'ON A.Clave = OC.Articulo')
                    ->where("OC.Folio", $Doc)
                    ->where("OC.Tp", $Tp)
                    ->where("OC.Tipo", '10');
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

    public function onVerificarExisteFactura($Tp, $Doc) {
        try {
            $this->db->select("RM.* "
                            . "")
                    ->from("recepcionmat_inspeccion AS RM")
                    ->where("RM.Factura", $Doc)
                    ->where("RM.Tp", $Tp);
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

    public function onVerificarExisteOrdenCompra($Tp, $Doc) {
        try {
            $this->db->select("OC.* , P.NombreI, P.NombreF "
                            . "")
                    ->from("ordencompra AS OC")
                    ->join("proveedores AS P", 'ON P.Clave = OC.Proveedor')
                    ->where("OC.Folio", $Doc)
                    ->where("OC.Tp", $Tp)
                    ->where("OC.Tipo", '10');
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

    public function getDefectos() {
        try {
            return $this->db->select("T.Clave,CONCAT(T.Clave,'-',T.Descripcion) AS Defecto")->from("defectos AS T")->where("T.Estatus", "ACTIVO")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetallesDefectos() {
        try {
            return $this->db->select("T.Clave,CONCAT(T.Clave,'-',T.Descripcion) AS DetalleDefecto")->from("defectosdetalle AS T")->where("T.Estatus", "ACTIVO")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
