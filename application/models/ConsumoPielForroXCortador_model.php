<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class ConsumoPielForroXCortador_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getCortadores() {
        try {
            return $this->db->select("E.Numero AS CLAVE, CONCAT(E.PrimerNombre, ' ', E.SegundoNombre,' ', E.Paterno,' ', E.Materno) AS EMPLEADO", false)
                            ->from('empleados AS E')->join('departamentos AS D', 'E.DepartamentoFisico = D.Clave')
                            ->where('D.Descripcion LIKE \'CORTE\'', null, false)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getArticulos() {
        try {
            return $this->db->select("A.Clave AS CLAVE, A.Descripcion AS Articulo, CONCAT(A.Clave, ' ',A.Descripcion) AS CLAVE_ARTICULO", false)
                            ->from('articulos AS A')->join('asignapftsacxc AS ACXC', 'A.Clave = ACXC.Articulo')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
