
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class fichatecnicafija_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            $this->db->select(""
                    . "FTF.Pieza AS Pieza, "
                    . "FTF.Articulo AS Material,  "
                    . "FTF.Consumo AS Consumo, "
                    . "'--' AS Eliminar ", false);
            $this->db->from('FichaTecnicaFija AS FTF');
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

    public function onAgregar($array) {
        try {
            $this->db->insert("FichaTecnicaFija", $array);
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
            $this->db->where('ID', $ID)->update("FichaTecnicaFija", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->where('Pieza', $ID)->delete("FichaTecnicaFija");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
