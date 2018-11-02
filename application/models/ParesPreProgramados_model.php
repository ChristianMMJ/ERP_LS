<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class ParesPreProgramados_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getParesPreProgramados($C) {
        try {
            return $this->db->select('C.Clave AS CLAVE_CLIENTE, C.RazonS AS  CLIENTE, A.Nombre AS AGENTE, ES.Descripcion AS ESTADO, 
P.Clave AS PEDIDO, E.Linea AS CLAVE_LINEA, L.Descripcion AS LINEA, PD.Estilo AS CLAVE_ESTILO, CO.Descripcion AS COLOR,
PD.FechaEntrega AS FECHA_ENTREGA, PD.Pares AS PARES, PD.Maquila AS MAQUILA, PD.Semana AS SEMANA', false)
                            ->from('pedidos AS P')
                            ->join('pedidodetalle as PD', 'P.ID = PD.Pedido')
                            ->join('clientes AS C', 'P.Cliente = C.ID')
                            ->join('agentes AS A', 'P.Agente = A.Clave')
                            ->join('estilos AS E', 'PD.Estilo = E.Clave')
                            ->join('colores AS CO', 'E.Clave = CO.Estilo AND PD.Color = CO.Clave')
                            ->join('lineas AS L', 'E.Linea = L.Clave')
                            ->join('estados AS ES', 'C.Estado = ES.Clave')
                            ->where("C.Clave", $C)->get()->result();
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

}
