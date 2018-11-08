<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class ParesPreProgramados_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getParesPreProgramados($CEL, $I) {
        try {
            $this->db->select('C.Clave AS CLAVE_CLIENTE, C.RazonS AS  CLIENTE, A.Clave AS CLAVE_AGENTE, A.Nombre AS AGENTE, ES.Descripcion AS ESTADO, 
P.Clave AS PEDIDO, E.Linea AS CLAVE_LINEA, L.Descripcion AS LINEA, PD.Estilo AS CLAVE_ESTILO, CO.Descripcion AS COLOR,
PD.FechaEntrega AS FECHA_ENTREGA, PD.Pares AS PARES, PD.Maquila AS MAQUILA, PD.Semana AS SEMANA, C.Pais AS PAIS', false)
                    ->from('pedidos AS P')
                    ->join('pedidodetalle as PD', 'P.ID = PD.Pedido')
                    ->join('clientes AS C', 'P.Cliente = C.ID')
                    ->join('agentes AS A', 'P.Agente = A.Clave')
                    ->join('estilos AS E', 'PD.Estilo = E.Clave')
                    ->join('colores AS CO', 'E.Clave = CO.Estilo AND PD.Color = CO.Clave')
                    ->join('lineas AS L', 'E.Linea = L.Clave')
                    ->join('estados AS ES', 'C.Estado = ES.Clave');
            switch ($I) {
                case 1:
                    $this->db->where("C.Clave", $CEL);
                    break;
                case 2:
                    $this->db->where("PD.Estilo", $CEL);
                    $this->db->where("E.Clave", $CEL);
                    $this->db->where("CO.Estilo", $CEL);
                    break;
                case 3:
                    $this->db->where("L.Clave", $CEL);
                    $this->db->where("E.Linea", $CEL);
                    break;
            }
            return $this->db->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getClientes() {
        try {
            $this->db->select('C.Clave AS CLAVE_CLIENTE, '
                            . 'C.RazonS AS CLIENTE, '
                            . 'A.Clave AS CLAVE_AGENTE, '
                            . 'A.Nombre AS AGENTE, '
                            . 'ES.Clave AS CLAVE_ESTADO, '
                            . 'ES.Descripcion AS ESTADO', false)
                    ->from('pedidos AS P')->join('pedidodetalle as PD', 'P.ID = PD.Pedido')->join('clientes AS C', 'P.Cliente = C.ID')
                    ->join('agentes AS A', 'C.Agente = A.Clave')
                    ->join('estados AS ES', 'C.Estado = ES.Clave')
                    ->group_by('C.ID');
            return $this->db->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            $this->db->select('PD.Estilo AS CLAVE_ESTILO, PD.ColorT AS COLOR', false)
                    ->from('pedidos AS P')
                    ->join('pedidodetalle as PD', 'P.ID = PD.Pedido')
                    ->join('clientes AS C', 'P.Cliente = C.ID')
                    ->group_by('PD.Estilo');
            return $this->db->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }


    public function getLineas() {
        try {
            $this->db->select('E.Linea AS CLAVE_LINEA, L.Descripcion AS LINEA', false)
                    ->from('pedidos AS P')
                    ->join('pedidodetalle as PD', 'P.ID = PD.Pedido')
                    ->join('estilos AS E', 'PD.Estilo = E.Clave')
                    ->join('colores AS CO', 'E.Clave = CO.Estilo AND PD.Color = CO.Clave')
                    ->join('lineas AS L', 'E.Linea = L.Clave')->group_by('L.Clave');
            return $this->db->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaquilas() {
        try {
            $this->db->select('M.Clave AS CLAVE_MAQUILA, M.Nombre AS MAQUILA, M.CapacidadPares AS CAPACIDAD_PARES', false)
                    ->from('pedidos AS P')
                    ->join('pedidodetalle as PD', 'P.ID = PD.Pedido')
                    ->join('maquilas AS M', 'PD.Maquila = M.Clave')
                    ->group_by(array('M.Nombre'))
                    ->order_by('PD.Maquila','ASC')
                    ->order_by('PD.Semana','ASC');
            return $this->db->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getParesPreProgramadosPorMaquila($M) {
        try {
            $this->db->select('M.Clave AS CLAVE_MAQUILA, M.Nombre AS MAQUILA, '
                    . 'M.CapacidadPares AS CAPACIDAD_PARES, PD.Semana AS SEMANA, '
                    . 'SUM(PD.Pares) AS PARES, '
                    . 'M.CapacidadPares - SUM(PD.Pares) AS DIFERENCIA', false)
                    ->from('pedidos AS P')
                    ->join('pedidodetalle as PD', 'P.ID = PD.Pedido')
                    ->join('maquilas AS M', 'PD.Maquila = M.Clave')
                    ->where('M.Clave',$M)->where('PD.Maquila',$M)
                    ->group_by(array('M.Nombre','PD.Semana'))
                    ->order_by('PD.Maquila','ASC')
                    ->order_by('PD.Semana','ASC');
            return $this->db->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}