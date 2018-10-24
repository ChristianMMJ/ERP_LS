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
            return $this->db->select("E.Numero AS CLAVE, CONCAT(E.Numero ,' ',E.PrimerNombre, ' ', E.SegundoNombre,' ', E.Paterno,' ', E.Materno) AS EMPLEADO", false)
                            ->from('empleados AS E')->join('departamentos AS D', 'E.DepartamentoFisico = D.Clave')->join('asignapftsacxc AS ACXC','E.Numero = ACXC.Empleado')
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

    public function onComprobarMaquilas($Clave) {
        try {
            return $this->db->select("COUNT(*) AS EXISTE_MAQUILA", false)->from("maquilas AS G")->where("G.Clave", $Clave)->where("G.Estatus", "ACTIVO")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onChecarSemanaValida($S) {
        try {
            return $this->db->select("COUNT(*) AS SEMANA_NO_CERRADA")->from("semanasproduccion AS S")->where("S.Sem", $S)->where("S.Estatus", "ACTIVO")->order_by('S.Sem', 'ASC')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function getCortadoresXMaquilaSemanaArticulo($ARTICULO, $MAQUILA, $SEMANAINICIAL, $SEMANAFINAL, $ANO, $CORTADOR, $TIPO) {
        try {
            $this->db->select("substr(ASI.Control,3,2) AS SEMANA,substr(ASI.Control,5,2) AS MAQUILA, 
                                    ASI.Control,E.Numero AS NUMERO, CONCAT(E.PrimerNombre, \" \",E.SegundoNombre,\" \", E.Paterno,\" \",E.Materno) AS CORTADOR", false)
                    ->from("asignapftsacxc AS ASI")
                    ->join("Empleados AS E", "ASI.Empleado = E.Numero");
            if ($ARTICULO !== '') {
                $this->db->where("ASI.Articulo LIKE  '$ARTICULO'", null, false);
            }
            if ($CORTADOR !== '') {
                $this->db->where("ASI.Empleado LIKE  '$CORTADOR'", null, false);
                $this->db->where("E.Numero LIKE  '$CORTADOR'", null, false);
            }
            if ($SEMANAINICIAL !== '' && $SEMANAFINAL !== '') {
                $this->db->where("substr(ASI.Control,3,2) BETWEEN '$SEMANAINICIAL' AND '$SEMANAFINAL'", null, false);
            }
            if ($MAQUILA !== '') {
                $this->db->where("substr(ASI.Control,5,2) LIKE '$MAQUILA'", null, false);
            }
            $this->db->where("ASI.TipoMov LIKE '$TIPO'", null, false);
            return $this->db->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function getEstilosPorCortador($ARTICULO, $MAQUILA, $SEMANAINICIAL, $SEMANAFINAL, $ANO, $CORTADOR_CLAVE, $TIPO) {
        try {
            $this->db->select("ASI.Estilo AS Estilo_X_Cortador", false)
                    ->from("asignapftsacxc AS ASI")
                    ->join("Empleados AS E", "ASI.Empleado = E.Numero");
            if ($CORTADOR_CLAVE !== '') {
                $this->db->where("E.Numero LIKE  '$CORTADOR_CLAVE'", null, false);
            }
            if ($ARTICULO !== '') {
                $this->db->where("ASI.Articulo LIKE  '$ARTICULO'", null, false);
            }
            if ($SEMANAINICIAL !== '' && $SEMANAFINAL !== '') {
                $this->db->where("substr(ASI.Control,3,2) BETWEEN '$SEMANAINICIAL' AND '$SEMANAFINAL'", null, false);
            }
            if ($MAQUILA !== '') {
                $this->db->where("substr(ASI.Control,5,2) LIKE '$MAQUILA'", null, false);
            }
            $this->db->where("ASI.TipoMov LIKE '$TIPO'", null, false);
            return $this->db->group_by('ASI.Estilo')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function getConsumosPielForroXMaquilaSemanaAnioCortadorArticuloFechaInicialFechaFinal($MAQUILA, $SEMANAINICIAL, $SEMANAFINAL, $ANO, $CORTADOR, $ARTICULO, $FECHAINICIAL, $FECHAFINAL, $CONEMPLEADO, $EMPLEADO, $ESTILO, $TIPO) {
        try {
            $this->db->select("OP.ControlT AS Control, OP.Estilo, OP.Color, OPD.Articulo, OPD.ArticuloT, "
                            . "ASI.PrecioActual AS Precio, OP.Pares, SUM(OPD.Consumo) AS Consumo, SUM(OPD.Cantidad) AS Cantidad, ASI.Abono, "
                            . "ASI.Devolucion, ASI.Basura, FORMAT((SUM(OPD.Cantidad) - ASI.Abono)+(IFNULL(ASI.Basura,0)),2) AS Diferencia,"
                            . "FORMAT((ASI.PrecioActual * SUM(OPD.Cantidad)),3) AS SistemaPesos,(ASI.PrecioActual * ASI.Abono) AS RealPesos, "
                            . "FORMAT(((ASI.PrecioActual * SUM(OPD.Cantidad)) - (ASI.PrecioActual * ASI.Abono)),3) AS DifPesos,"
                            . "(ASI.Abono/OP.Pares) AS DCM2, SUM(OPD.Consumo)/(ASI.Abono/OP.Pares) AS PORCENTAJE", false)
                    ->from("ordendeproduccion AS OP")
                    ->join("ordendeproducciond AS OPD", "OP.ID = OPD.OrdenDeProduccion")
                    ->join("asignapftsacxc AS ASI", "OP.ID = ASI.OrdenProduccion AND ASI.Articulo = OPD.Articulo");

            if ($FECHAINICIAL !== '' && $FECHAFINAL !== '') {
                $this->db->where("STR_TO_DATE(ASI.Fecha, \"%d/%m/%Y\") BETWEEN STR_TO_DATE('$FECHAFINAL', \"%d/%m/%Y\") AND STR_TO_DATE('$FECHAINICIAL', \"%d/%m/%Y\")");
            }
            if ($ANO !== '') {
                $this->db->where("OP.Ano LIKE '$ANO'", null, false);
            }
            if ($CORTADOR !== '') {
                $this->db->where("ASI.Empleado LIKE '$CORTADOR'", null, false);
            }
            if ($MAQUILA !== '') {
                $this->db->where("OP.Maquila LIKE '$MAQUILA'", null, false);
            }
            if ($ARTICULO !== '') {
                $this->db->where("ASI.Articulo LIKE  '$ARTICULO'", null, false);
            }
            if ($SEMANAINICIAL !== '' && $SEMANAFINAL !== '') {
                $this->db->where("OP.Semana BETWEEN '$SEMANAINICIAL' AND '$SEMANAFINAL'", null, false);
            }
            if ($EMPLEADO !== '') {
                $this->db->where("ASI.Empleado LIKE '$EMPLEADO'", null, false);
            }
            if ($ESTILO !== '') {
                $this->db->where("ASI.Estilo LIKE '$ESTILO'", null, false);
            }
            $this->db->where("ASI.TipoMov LIKE '$TIPO'", null, false);
            $this->db->group_by('OP.ControlT');
            return $this->db->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
