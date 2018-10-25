<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Cerrarprog_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            return $this->db->select('PD.ID AS ID, '
                                    . 'PD.Estilo AS IdEstilo, '
                                    . 'PD.Color AS IdColor, '
                                    . "E.Clave AS Estilo, "
                                    . "E.Descripcion AS \"Descripcion Estilo\", "
                                    . "C.Clave AS Color, "
                                    . "C.Descripcion AS \"Descripcion Color\", "
                                    . "PE.Clave AS Pedido,"
                                    . "PE.FechaPedido AS \"Fecha Pedido\","
                                    . "PE.FechaRecepcion AS \"Fecha Entrega\","
                                    . "PE.Registro AS \"Fecha Captura\","
                                    . "PD.Semana AS Semana,"
                                    . "PD.Maquila AS Maq,"
                                    . "CL.Clave AS Cliente,"
                                    . "CL.RazonS AS \"Cliente Razon\","
                                    . "PD.Pares AS Pares,"
                                    . "CONCAT('$',PD.Precio) AS Precio , "
                                    . "CONCAT('$',(PD.Precio * PD.Pares)) AS Importe, "
                                    . "CONCAT('$',(PD.Precio * PD.Pares)) AS Descuento,"
                                    . "PD.FechaEntrega AS Entrega,"
                                    . "CONCAT(S.PuntoInicial ,'/',S.PuntoFinal) AS Serie, "
                                    . "PD.Ano AS Anio,"
                                    . " CASE "
                                    . "WHEN PD.Control IS NULL THEN '' "
                                    . "ELSE PD.Control END AS Marca, "
                                    . "CONCAT(CT.Ano, CT.Semana, CT.Maquila, CT.Consecutivo) AS Control,"
                                    . "S.ID AS SerieID,"
                                    . "PE.ID AS ID_PEDIDO", false)->from('pedidodetalle AS PD')
                            ->join('pedidos AS PE', 'PD.Pedido = PE.Clave')
                            ->join('clientes AS CL', 'CL.Clave = PE.Cliente')
                            ->join('estilos AS E', 'PD.Estilo = E.Clave')
                            ->join('colores AS C', 'PD.color = C.Clave AND C.Estilo = E.Clave')
                            ->join('series AS S', 'E.Serie = S.Clave')
                            ->join('controles AS CT', 'CT.pedidodetalle = PD.ID', 'left')
                            ->where('PD.Control', 0)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getHistorialDeControles() {
        try {
            return $this->db->select('PD.ID AS ID, '
                                    . 'PD.Estilo AS IdEstilo, '
                                    . 'PD.Color AS IdColor, '
                                    . "E.Clave AS Estilo, "
                                    . "E.Descripcion AS \"Descripcion Estilo\", "
                                    . "C.Clave AS Color, "
                                    . "C.Descripcion AS \"Descripcion Color\", "
                                    . "PE.Clave AS Pedido,"
                                    . "PE.FechaPedido AS \"Fecha Pedido\","
                                    . "PE.FechaRecepcion AS \"Fecha Entrega\","
                                    . "PE.Registro AS \"Fecha Captura\","
                                    . "PD.Semana AS Semana,"
                                    . "PD.Maquila AS Maq,"
                                    . "CL.Clave AS Cliente,"
                                    . "CL.RazonS AS \"Cliente Razon\","
                                    . "PD.Pares AS Pares,"
                                    . "CONCAT('$',PD.Precio) AS Precio , "
                                    . "CONCAT('$',(PD.Precio * PD.Pares)) AS Importe, "
                                    . "CONCAT('$',(PD.Precio * PD.Pares)) AS Descuento,"
                                    . "PD.FechaEntrega AS Entrega,"
                                    . "CONCAT(S.PuntoInicial ,'/',S.PuntoFinal) AS Serie, "
                                    . "PD.Ano AS Anio,"
                                    . " CASE "
                                    . "WHEN PD.Control IS NULL THEN '' "
                                    . "ELSE PD.Control END AS Marca, "
                                    . "CONCAT(CT.Ano, CT.Semana, CT.Maquila, CT.Consecutivo) AS Control,"
                                    . "S.ID AS SerieID,"
                                    . "PE.ID AS ID_PEDIDO", false)->from('pedidodetalle AS PD')
                            ->join('pedidos AS PE', 'PD.Pedido = PE.Clave')
                            ->join('clientes AS CL', 'CL.Clave = PE.Cliente')
                            ->join('estilos AS E', 'PD.Estilo = E.Clave')
                            ->join('colores AS C', 'PD.color = C.Clave AND C.Estilo = E.Clave')
                            ->join('series AS S', 'E.Serie = S.Clave')
                            ->join('controles AS CT', 'CT.pedidodetalle = PD.ID', 'left')
                            ->where('PD.Control <>0', null, false)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaximoConsecutivo($M, $S, $ID) {
        try {
            $this->db->select('CASE WHEN CT.Consecutivo IS NULL THEN 1 ELSE CT.Consecutivo+1 END AS MAX', false)
                    ->from('pedidodetalle AS PD')
                    ->join('pedidos AS PE', 'PD.Pedido = PE.Clave')
                    ->join('clientes AS CL', 'CL.Clave = PE.Cliente')
                    ->join('estilos AS E', 'PD.Estilo = E.Clave')
                    ->join('colores AS C', 'PD.color = C.Clave AND C.Estilo = E.Clave')
                    ->join('series AS S', 'E.Serie = S.Clave')
                    ->join('controles AS CT', 'CT.pedidodetalle = PD.ID', 'left')
                    ->where_not_in('PD.Control', array(0))->where('PD.Maquila', $M)->where('PD.Semana', $S);
            return $this->db->order_by('CT.Consecutivo', 'DESC')->limit(1)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarControl($x) {
        try {
            $this->db->insert("controles", $x);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarHistorialControl($x) {
        try {
            $this->db->insert("historialcontroles", $x);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
