<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class metodosdepago_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            $this->db->select("ID, Clave, Descripcion", false)
                    ->from('metodos_de_pago AS C');
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
            return $this->db->select("A.*", false)->from('metodos_de_pago AS A')->order_by('A.ID', 'DESC')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMetodosDePago() {
        try {
            $this->db->select("U.ID, U.Clave+'-'+U.RazonSocial AS Nombre ", false)->from('metodos_de_pago AS U')->where_in('U.Estatus', 'ACTIVO');
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
                            ->from('metodos_de_pago AS V')
                            ->where_in('V.Estatus', 'ACTIVO')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMagnusID($ID) {
        try {
            $this->db->select("C.IDMAGNUS AS MAGNUS", false)->from('metodos_de_pago AS C')->where_in('C.Estatus', 'ACTIVO')->where('C.ID', $ID);
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
            $this->db->select("C.ListaDePrecios AS Lista", false)->from('metodos_de_pago AS C')->where('C.ID', $ID);
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

    public function getRegimenesFiscales() {
        try {
            $this->db->select('U.ID, CONVERT(varchar(10), U.IValue)+\'-\'+U.SValue+\'-\'+U.Valor_Text AS SValue', false)
                    ->from('sz_Catalogos AS U')->where('U.FieldId', 'REGIMENES FISCALES')->where_in('U.Estatus', 'ACTIVO')->order_by("U.IValue", "ASC");
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

    public function getListasDePrecios() {
        try {
            $this->db->select("LDP.ID, LDP.Descripcion AS Descripcion ", false)->from('sz_ListaDePrecios AS LDP')->where_in('LDP.Estatus', 'ACTIVO');
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

    public function onAgregarMagnus($array) {
        try {
            $this->db->insert("metodos_de_pago", $array);
            $query = $this->db->query('SELECT SCOPE_IDENTITY() AS IDL');
            $row = $query->row_array();
//            PRINT "\n ID IN MODEL: $LastIdInserted \n";
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("metodos_de_pago", $array);
            $query = $this->db->query('SELECT SCOPE_IDENTITY() AS IDL');
            $row = $query->row_array();
//            PRINT "\n ID IN MODEL: $LastIdInserted \n";
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar($ID, $DATA) {
        try {
            $this->db->where('ID', $ID)->update("metodos_de_pago", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarMagnus($ID, $DATA) {
        try {
            $this->db->where('ID', $ID)->update("metodos_de_pago", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO')->where('ID', $ID)->update("metodos_de_pago");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getClienteByID($ID) {
        try {
            $this->db->select('U.*', false)->from('metodos_de_pago AS U')->where('U.ID', $ID)->where_in('U.Estatus', 'ACTIVO');
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
            $this->db->select("COUNT(C.ID) AS EXISTE", false)->from('metodos_de_pago AS C')->where_in('C.RFC', $RFC);
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
            return $this->db->select("A.Clave AS CLAVE")->from("metodos_de_pago AS A")->order_by("CLAVE", "DESC")->limit(1)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
