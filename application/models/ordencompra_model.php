<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class ordencompra_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            return $this->db->select("OC.ID AS ID, "
                                    . "OC.Tp AS Tp, "
                                    . "CASE WHEN OC.Tipo = '10' THEN '10 PIEL Y FORRO' "
                                    . "ELSE '90 PELETERIA' END AS Tipo,"
                                    . "OC.Folio AS Folio, "
                                    . "OC.Ano AS Ano, "
                                    . "OC.Sem AS Sem, "
                                    . "OC.Maq AS Maq, "
                                    . "CASE WHEN OC.Tp ='1' THEN  CONCAT(P.Clave,'-',P.NombreF) ELSE "
                                    . "CONCAT(P.Clave,'-',P.NombreI) END AS Proveedor, "
                                    . "OC.FechaOrden AS Fecha, "
                                    . "CASE WHEN OC.Estatus = 'ACTIVO' THEN "
                                    . "CONCAT('<span class=''badge badge-info''>','ACTIVA','</span>') "
                                    . "ELSE "
                                    . "CONCAT('<span class=''badge badge-success''>','CERRADA','</span>') "
                                    . "END AS Estatus "
                                    . "", false)
                            ->from("ordencompra AS OC")
                            ->join("proveedores AS P", 'P.Clave =  OC.Proveedor')
                            ->where_in('OC.Estatus', array('ACTIVO', 'CERRADA'))
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getOrdenCompraByID($ID) {
        try {
            return $this->db->select("OC.*", false)->from("ordencompra AS OC")->where('OC.ID', $ID)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFolio($tp) {
        try {
            return $this->db->select("CONVERT(A.Folio, UNSIGNED INTEGER) AS Folio")->from("ordencompra AS A")
//                            ->where_in("A.Estatus", array("ACTIVO", "CERRADA"))
                            ->where("A.Tp", $tp)
                            ->order_by("Folio", "DESC")
                            ->limit(1)
                            ->get()
                            ->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPrecioCompraByArticuloByProveedor($Articulo, $Proveedor) {
        try {
            $this->db->select(" "
                            . "CASE WHEN  A.ProveedorUno = '" . $Proveedor . "' THEN A.PrecioUno "
                            . "WHEN  A.ProveedorDos = '" . $Proveedor . "' THEN A.PrecioDos "
                            . "WHEN  A.ProveedorTres = '" . $Proveedor . "' THEN A.PrecioTres "
                            . "END AS Precio "
                            . " ", false)
                    ->from("articulos AS A")
                    ->where('A.Clave', $Articulo);
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

    public function getPorcentajesCompraByProveedor($Proveedor) {
        try {
            $this->db->select("P.PorcentajeComprasPorPedidoF PorFactura , "
                            . "PorcentajeComprasPorPedidoR PorRemision "
                            . " ", false)
                    ->from("proveedores AS P")
                    ->where('P.Clave', $Proveedor);
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

    public function getArticuloByDeptoByProveedor($Depto, $Proveedor) {
        try {
            $this->db->select(" CONVERT(A.Clave, UNSIGNED INTEGER) AS CLAVE , CONCAT(A.Clave,'-',A.Descripcion) AS Articulo"
                            . " ", false)
                    ->from("articulos AS A")
                    ->where('A.Departamento', $Depto)
                    ->where('A.ProveedorUno', $Proveedor)
                    ->or_where('A.ProveedorDos', $Proveedor)
                    ->or_where('A.ProveedorTres', $Proveedor)
                    ->where('A.Estatus', 'ACTIVO')
                    ->order_by('CLAVE', 'ASC');
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

    public function onComprobarMaquilas($Clave) {
        try {
            return $this->db->select("G.Clave, G.Direccion")->from("Maquilas AS G")->where("G.Clave", $Clave)->where("G.Estatus", "ACTIVO")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarSemanasProduccion($Clave, $Ano) {
        try {
            return $this->db->select("G.Sem")->from("SemanasProduccion AS G")->where("G.Sem", $Clave)->where("G.Ano", $Ano)->where("G.Estatus", "ACTIVO")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getProveedores() {
        try {
            return $this->db->select("P.Clave AS ID, "
                                    . "CONCAT(P.Clave,' ',IFNULL(P.NombreI,'')) AS ProveedorI, "
                                    . "CONCAT(P.Clave,' ',IFNULL(P.NombreF,'')) AS ProveedorF ", false)
                            ->from("proveedores AS P")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("ordencompra", $array);
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
            $this->db->where('ID', $ID)->update("ordencompra", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'CANCELADA')->where('ID', $ID)->update("ordencompra");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /* DETALLE */

    public function getDetalleParaSepararByID($ID) {
        try {
            $this->db->select('OCD.ID, OCD.Articulo, OCD.Cantidad, OCD.Precio, OCD.Subtotal '
                    . '', false);
            $this->db->from('ordencompradetalle AS OCD')
                    ->where('OCD.OrdenCompra', $ID);
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

    public function getDetalleByID($ID) {
        try {
            $this->db->select('OCD.ID,'
                    . 'OCD.Articulo AS ClaveArticulo,'
                    . "CONCAT(A.Clave,'-',A.Descripcion) AS Articulo,"
                    . 'OCD.Cantidad,'
                    . 'UM.Descripcion AS Unidad,'
                    . "OCD.Precio AS Precio,"
                    . "OCD.Subtotal AS Subtotal,"
                    . 'CONCAT(\'<span class="fa fa-trash fa-lg" onclick="onEliminarDetalleByID(\',OCD.ID,\')">\',\'</span>\') AS Eliminar'
                    . '', false);
            $this->db->from('ordencompradetalle AS OCD')
                    ->join('ordencompra AS OC', 'OC.ID= OCD.OrdenCompra', 'left')
                    ->join('articulos AS A', 'A.Clave = OCD.Articulo', 'left')
                    ->join('Unidades AS UM', 'A.UnidadMedida = UM.Clave', 'left')
                    ->where('OC.ID', $ID);
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

    public function onEliminarDetalleByID($ID) {
        try {
            $this->db->where('ID', $ID);
            $this->db->delete("ordencompradetalle");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDetalle($ID, $DATA) {
        try {
            $this->db->where('ID', $ID)->update("ordencompradetalle", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /* REPORTES */

    public function getDatosEmpresa() {
        try {
            $this->db->select("E.RazonSocial as Empresa, E.Foto as Logo,"
                            . "CONCAT(E.Direccion,' ',E.NoExt,' Col. ',E.Colonia) AS Direccion, "
                            . "CONCAT(E.Ciudad,', ',EDOS.Descripcion,'  Tel. 1464646 AL 49   E-mail: compras@lobosolo.com.mx') AS Direccion2 "
                            . " ", false)
                    ->from('empresas AS E')
                    ->join('estados AS EDOS', 'EDOS.Clave = E.Estado');

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

    public function getReporteOrdenCompra($ID) {
        try {
            $this->db->select(''
                    . 'OC.Tp,'
                    . 'OC.Folio,'
                    . 'OC.FechaOrden,'
                    . 'OC.FechaCaptura,'
                    . 'OC.Estatus,'
                    . "OC.Proveedor,"
                    . "CASE WHEN OC.Tp = '1' THEN "
                    . "P.NombreF "
                    . "ELSE P.NombreI "
                    . "END AS NombreProveedor,"
                    . "OC.ConsignarA,"
                    . "OC.Observaciones,"
                    . "OCD.Cantidad,"
                    . "U.Descripcion AS Unidad,"
                    . "OCD.Articulo,"
                    . "A.Descripcion AS NombreArticulo,"
                    . "OCD.Precio,"
                    . "OCD.SubTotal,"
                    . "OC.Sem,"
                    . "OC.Maq,"
                    . "OC.FechaEntrega"
                    . '', false);
            $this->db->from('ordencompra AS OC')
                    ->join('ordencompradetalle AS OCD', 'OCD.OrdenCompra = OC.ID')
                    ->join('proveedores AS P', 'OC.Proveedor = P.Clave')
                    ->join('articulos AS A', ' A.Clave = OCD.Articulo')
                    ->join('Unidades AS U', 'U.Clave = A.UnidadMedida')
                    ->where('OC.ID', $ID);
//                    ->where('OC.Tp', $TP);
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
