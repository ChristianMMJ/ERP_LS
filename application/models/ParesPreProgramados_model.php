<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class ParesPreProgramados_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getParesPreProgramados($CEL, $I, $CLIENTE, $ESTILO, $LINEA, $MAQUILA, $SEMANA, $FECHA) {
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
            if ($CLIENTE !== '') {
                $this->db->where("C.Clave", $CLIENTE);
            }
            if ($ESTILO !== '') {
                $this->db->where("E.Clave", $ESTILO);
            }
            if ($LINEA !== '') {
                $this->db->where("L.Clave", $LINEA);
            }
            if ($MAQUILA !== '') {
                $this->db->where("PD.Maquila", $MAQUILA);
            }
            if ($SEMANA !== '') {
                $this->db->where("PD.Semana", $SEMANA);
            }
            if ($FECHA !== '') {
                $this->db->where("PD.FechaEntrega", $FECHA);
            }
            return $this->db->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getClientes($CLIENTE, $ESTILO, $LINEA, $MAQUILA, $SEMANA, $FECHA) {
        try {
            $this->db->select('C.Clave AS CLAVE_CLIENTE, '
                            . 'C.RazonS AS CLIENTE, '
                            . 'A.Clave AS CLAVE_AGENTE, '
                            . 'A.Nombre AS AGENTE, '
                            . 'ES.Clave AS CLAVE_ESTADO, '
                            . 'ES.Descripcion AS ESTADO', false)
                    ->from('pedidos AS P')
                    ->join('pedidodetalle as PD', 'P.ID = PD.Pedido')
                    ->join('clientes AS C', 'P.Cliente = C.ID')
                    ->join('agentes AS A', 'C.Agente = A.Clave');
            $this->db->join('estados AS ES', 'C.Estado = ES.Clave')
                    ->join('estilos AS E', 'PD.Estilo = E.Clave')
                    ->join('colores AS CO', 'E.Clave = CO.Estilo AND PD.Color = CO.Clave')
                    ->join('lineas AS L', 'E.Linea = L.Clave');
            if ($CLIENTE !== '') {
                $this->db->where('C.Clave', $CLIENTE);
            }
            if ($MAQUILA !== '') {
                $this->db->where("PD.Maquila", $MAQUILA);
            }
            if ($SEMANA !== '') {
                $this->db->where("PD.Semana", $SEMANA);
            }
            if ($ESTILO !== '') {
                $this->db->where("PD.Estilo", $ESTILO);
            }
            if ($LINEA !== '') {
                $this->db->where("L.Clave", $LINEA);
            }
            if ($FECHA !== '') {
                $this->db->where("PD.FechaEntrega", $FECHA);
            }
            return $this->db->group_by('C.ID')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getClientesX() {
        try {
            $this->db->select('C.Clave AS CLAVE_CLIENTE, '
                            . 'CONCAT(C.Clave," - ",C.RazonS) AS CLIENTE', false)
                    ->from('pedidos AS P')
                    ->join('pedidodetalle as PD', 'P.ID = PD.Pedido')
                    ->join('clientes AS C', 'P.Cliente = C.ID')
                    ->group_by('C.ID');
            return $this->db->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos($E, $C) {
        try {
            $this->db->select('PD.Estilo AS CLAVE_ESTILO, PD.ColorT AS COLOR', false)
                    ->from('pedidos AS P')
                    ->join('pedidodetalle as PD', 'P.ID = PD.Pedido');
            if ($E !== '') {
                $this->db->where('PD.Estilo', $E);
            }
            if ($C !== '') {
                $this->db->where('P.Cliente', $C);
            }
            return $this->db->group_by('PD.Estilo')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilosX() {
        try {
            $this->db->select('E.Clave AS CLAVE_ESTILO, E.Descripcion AS ESTILO', false)
                    ->from('pedidos AS P')
                    ->join('pedidodetalle as PD', 'P.ID = PD.Pedido')
                    ->join('estilos AS E', 'PD.Estilo = E.Clave')
                    ->group_by('PD.Estilo');
            return $this->db->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getLineas($C, $E, $L) {
        try {
            $this->db->select('E.Linea AS CLAVE_LINEA, L.Descripcion AS LINEA', false)
                    ->from('pedidos AS P')
                    ->join('pedidodetalle as PD', 'P.ID = PD.Pedido')
                    ->join('estilos AS E', 'PD.Estilo = E.Clave')
                    ->join('colores AS CO', 'E.Clave = CO.Estilo AND PD.Color = CO.Clave')
                    ->join('lineas AS L', 'E.Linea = L.Clave');
            if ($C !== '') {
                $this->db->where('P.Cliente', $C);
            }
            if ($E !== '') {
                $this->db->where('E.Clave', $E);
            }
            if ($L !== '') {
                $this->db->where('L.Clave', $L);
            }
            $this->db->group_by('L.Clave');
            return $this->db->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getLineasX() {
        try {
            $this->db->select('L.Clave AS CLAVE_LINEA, CONCAT(L.Clave," - ", L.Descripcion) AS LINEA', false)
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
                    ->order_by('PD.Maquila', 'ASC')
                    ->order_by('PD.Semana', 'ASC');
            return $this->db->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaquilasX() {
        try {
            $this->db->select('M.Clave AS CLAVE_MAQUILA, CONCAT(M.Clave," - ", M.Nombre) AS MAQUILA', false)
                    ->from('pedidos AS P')
                    ->join('pedidodetalle as PD', 'P.ID = PD.Pedido')
                    ->join('maquilas AS M', 'PD.Maquila = M.Clave')
                    ->group_by(array('M.Nombre'))
                    ->order_by('PD.Maquila', 'ASC')
                    ->order_by('PD.Semana', 'ASC');
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
                    ->where('M.Clave', $M)->where('PD.Maquila', $M)
                    ->group_by(array('M.Nombre', 'PD.Semana'))
                    ->order_by('PD.Maquila', 'ASC')
                    ->order_by('PD.Semana', 'ASC');
            return $this->db->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
