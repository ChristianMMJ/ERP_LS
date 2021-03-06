<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Empleados_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            $this->db->select("E.ID, E.Numero AS No, E.NumFis, E.Egresos, E.Activos, "
                            . "CONCAT(E.PrimerNombre,' ', E.SegundoNombre,' ',E.Paterno,' ', E.Materno) AS Nombre, "
                            . "E.Busqueda, E.Direccion AS Dire, E.Colonia AS Col, E.Ciudad AS Ciu, E.Estado, E.CP, "
                            . "E.RFC, E.CURP, E.NoIMSS AS Seg, E.FechaIngreso, E.Nacimiento, E.FechaIMSS, "
                            . "E.Sexo, E.EstadoCivil, E.Tel, E.Cel, E.DepartamentoFisico, E.DepartamentoCostos, "
                            . "E.AltaBaja, E.Puesto, E.Tarjeta, E.Egreso, E.Comedor, E.TBanamex, E.TBanbajio, "
                            . "E.FijoDestajoAmbos, E.CuentaBB, E.Beneficiario, E.Parentesco, E.Porcentaje, "
                            . "E.Sueldo, E.IMSS, E.Fierabono, E.Infonavit, E.Ahorro, E.PressAcum, E.AbonoPres, "
                            . "E.SaldoPres, E.Comida, E.Celula, E.CelulaPorcentaje, E.Funeral, E.SueldoFijo, "
                            . "E.SalarioDiarioIMSS, E.ZapatosTDA, E.AbonoZap, E.Fonacot, E.EntregaDeMaterialYPrecio, "
                            . "E.Foto, E.Registro, E.Estatus", false)
                    ->from('empleados AS E');
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

    public function getEmpleadoByID($ID) {
        try {
            $this->db->select("E.ID, E.Numero, E.NumFis, E.Egresos, E.Activos, "
                            . "E.PrimerNombre, E.SegundoNombre,E.Paterno, E.Materno, "
                            . "E.Busqueda, E.Direccion, E.Colonia, E.Ciudad, E.Estado, E.CP, "
                            . "E.RFC, E.CURP, E.NoIMSS, E.FechaIngreso, E.Nacimiento, E.FechaIMSS, "
                            . "E.Sexo, E.EstadoCivil, E.Tel, E.Cel, E.DepartamentoFisico, E.DepartamentoCostos, "
                            . "E.AltaBaja, E.Puesto, E.Tarjeta, E.Egreso, E.Comedor, E.TBanamex, E.TBanbajio, "
                            . "E.FijoDestajoAmbos, E.CuentaBB, E.Beneficiario, E.Parentesco, E.Porcentaje, "
                            . "E.Sueldo, E.IMSS, E.Fierabono, E.Infonavit, E.Ahorro, E.PressAcum, E.AbonoPres, "
                            . "E.SaldoPres, E.Comida, E.Celula, E.CelulaPorcentaje, E.Funeral, E.SueldoFijo, "
                            . "E.SalarioDiarioIMSS, E.ZapatosTDA, E.AbonoZap, E.Fonacot, E.EntregaDeMaterialYPrecio, "
                            . "E.Foto AS FOTOEMPLEADO, E.Registro, E.Estatus, E.Incapacitado", false)
                    ->from('empleados AS E')->where('E.ID', $ID);
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

    public function getEmpleadoByNumero($ID) {
        try {
            $this->db->select("E.ID, E.Numero, "
                            . "CONCAT(E.PrimerNombre,' ',E.SegundoNombre,' ',E.Paterno,' ', E.Materno) AS NOMBRE_COMPLETO, "
                            . "D.Descripcion AS DEPARTAMENTO", false)
                    ->from('empleados AS E')->join('departamentos AS D', 'D.Clave = E.DepartamentoFisico', 'left')->where('E.Numero', $ID);
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
            $this->db->insert("empleados", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID() AS IDL');
            $row = $query->row_array();
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstados() {
        try {
            return $this->db->select("CAST(P.Clave AS SIGNED ) AS ID, CONCAT(P.Clave,' - ',IFNULL(P.Descripcion,'')) AS Estado ", false)
                            ->from('estados AS P')->where_in('P.Estatus', 'ACTIVO')->order_by('ID', 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDepartamentos() {
        try {
            return $this->db->select("CAST(D.Clave AS SIGNED ) AS Clave, CONCAT(D.Clave,' - ',D.Descripcion) AS Departamento")
                            ->from("departamentos AS D")->where("D.Estatus", "ACTIVO")->order_by('Clave', 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
