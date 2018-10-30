<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class ParesAsignados_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getParesAsignados($MI, $MF, $SI, $SF, $A, $T) {
        try {
            $this->db->select('C.Clave AS CLAVE_CLIENTE, C.RazonS AS CLIENTE, '
                            . 'P.Clave AS CLAVE_PEDIDO, PD.Estilo AS ESTILO, '
                            . 'PD.Color AS CLAVE_COLOR, PD.FechaEntrega AS FECHA_ENTREGA, '
                            . 'PD.Maquila AS MAQUILA,'
                            . 'PD.Semana AS SEMANA, '
                            . 'PD.Pares AS PARES,'
                            . 'CO.Descripcion AS COLOR, '
                            . 'PD.Observacion AS OBSERVACION_UNO, '
                            . 'PD.ObservacionDetalle AS OBSERVACION_DOS,'
                            . 'C.Observaciones AS OBSERVACIONES_CLIENTE', false)
                    ->from('pedidos AS P')->join('pedidodetalle as PD', 'P.ID = PD.Pedido')->join('clientes AS C', 'P.Cliente = C.ID')
                    ->join('colores AS CO', 'PD.Color = CO.Clave AND CO.Estilo = PD.Estilo');
            if ($MI !== '' && $MF !== '') {
                $this->db->where("PD.Maquila BETWEEN '$MI' AND '$MF'", null, false);
            }
            if ($SI !== '' && $SF !== '') {
                $this->db->where("PD.Semana BETWEEN '$SI' AND '$SF'", null, false);
            }
            if ($A !== '') {
                $this->db->where("PD.Ano LIKE '$A'", null, false);
            }
            switch ($T) {
                case 1:
                    /* CLIENTE ASC- FECHA DE ENTREGA ASC */
                    $this->db->order_by('C.RazonS', 'ASC')->order_by('PD.FechaEntrega', 'ASC');
                    break;
                case 2:
                    /* ESTILO ASC - COLOR ASC */
                    $this->db->order_by('PD.Estilo', 'ASC')->order_by('CO.Descripcion', 'ASC');
                    break;
                case 3:
                    /* PEDIDO ASC */
                    $this->db->order_by('P.Clave', 'ASC');
                    break;
                case 4:
                    /* FECHA DE ENTREGA ASC - CLIENTE ASC */
                    $this->db->order_by('PD.FechaEntrega', 'ASC')->order_by('C.RazonS', 'ASC');
                    break;
            }
            return $this->db->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
