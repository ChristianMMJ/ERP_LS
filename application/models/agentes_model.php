<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class agentes_model extends CI_Model {

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
            return $this->db->select("A.*", false)->from('Agentes AS A')->order_by('A.ID', 'DESC')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getAgentes() {
        try {
            $this->db->select("U.ID, U.Clave+'-'+U.RazonSocial AS Nombre ", false)->from('Agentes AS U')->where_in('U.Estatus', 'ACTIVO');
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
                            ->from('Agentes AS V')
                            ->where_in('V.Estatus', 'ACTIVO')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMagnusID($ID) {
        try {
            $this->db->select("C.IDMAGNUS AS MAGNUS", false)->from('Agentes AS C')->where_in('C.Estatus', 'ACTIVO')->where('C.ID', $ID);
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
            $this->db->select("C.ListaDePrecios AS Lista", false)->from('Agentes AS C')->where('C.ID', $ID);
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
            $this->db->insert("Agentes", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID() AS IDL');
            $row = $query->row_array();
//            PRINT "\n ID IN MODEL: $LastIdInserted \n";
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("Agentes", $array);
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
            $this->db->where('ID', $ID)->update("Agentes", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarMagnus($ID, $DATA) {
        try {
            $this->db->where('ID', $ID)->update("Agentes", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO')->where('ID', $ID)->update("Agentes");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getAgenteByID($ID) {
        try {
            $this->db->select('U.*', false)->from('Agentes AS U')->where('U.ID', $ID);
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
            $this->db->select("COUNT(C.ID) AS EXISTE", false)->from('Agentes AS C')->where_in('C.RFC', $RFC);
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
            return $this->db->select("A.Clave AS CLAVE")->from("Agentes AS A")->order_by("CLAVE", "DESC")->limit(1)->get()->result();
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
}
