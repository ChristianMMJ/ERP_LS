<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class reasignarcontroles_model extends CI_Model {

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
                                    . "PE.ID AS ID_PEDIDO", false)->from('PedidoDetalle AS PD')
                            ->join('Pedidos AS PE', 'PD.Pedido = PE.Clave')
                            ->join('Clientes AS CL', 'CL.Clave = PE.Cliente')
                            ->join('Estilos AS E', 'PD.Estilo = E.Clave')
                            ->join('colores AS C', 'PD.color = C.Clave AND C.Estilo = E.Clave')
                            ->join('series AS S', 'E.Serie = S.Clave')
                            ->join('Controles AS CT', 'CT.PedidoDetalle = PD.ID')
                            ->where('PD.Control != 0', null, false)
                            ->where('CT.Estatus', 'A')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getHistorialDeControles() {
        try {
            return $this->db->select('HC.ID AS ID, '
                                    . 'HC.Estilo AS IdEstilo,'
                                    . 'HC.Color AS IdColor,'
                                    . 'HC.Pedido AS Pedido,'
                                    . 'CONCAT(\'<b>\',HC.ClaveCliente,\'</b> - \',HC.ClienteRazon) AS Cliente,'
                                    . 'CONCAT(\'<b>\',HC.Estilo,\'</b> - \',HC.EstiloDescripcion) AS Estilo,'
                                    . 'CONCAT(\'<b>\',HC.Color,\'</b> - \',HC.ColorDescripcion) AS Color, '
                                    . 'HC.Serie AS Serie, '
                                    . 'HC.FechaCaptura AS "Fecha Captura",'
                                    . 'HC.FechaPedido AS "Fecha Pedido", '
                                    . 'HC.FechaEntrega AS "Fecha Entrega",'
                                    . 'HC.Pares AS Pares, '
                                    . 'HC.Maquila AS Maquila, '
                                    . 'HC.Semana AS Semana,'
                                    . 'HC.Ano AS Anio, '
                                    . 'HC.Control AS Control', false)
                            ->from('HistorialControles AS HC')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaximoConsecutivo($M, $S) {
        try {
            $this->db->select("CASE WHEN (Consecutivo + 1)  IS NULL THEN 1 WHEN (Consecutivo + 1)  = ''  THEN  1 ELSE (Consecutivo + 1)  END AS MAXIMO", false)->from('controles AS C')
                    ->where('C.Maquila', $M)->where('C.Semana', $S);
            return $this->db->order_by('C.Consecutivo', 'DESC')->limit(1)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarControl($x) {
        try {
            $this->db->insert("Controles", $x);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarHistorialControl($x) {
        try {
            $this->db->insert("HistorialControles", $x);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaquilas() {
        try {
            return $this->db->select("CONVERT(M.Clave, UNSIGNED INTEGER) AS Clave, CONCAT(M.Clave,' - ',M.Nombre) AS Maquila")->from("Maquilas AS M")->where("M.Estatus", "ACTIVO")->order_by('Clave', 'ASC')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onChecarMaquilaValida($ID) {
        try {
            return $this->db->select(" COUNT(*) AS Maquila")->from("Maquilas AS M")->where("M.Clave", $ID)->where("M.Estatus", "ACTIVO")->order_by('Clave', 'ASC')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onChecarSemanaValida($S) {
        try {
            return $this->db->select(" COUNT(*) AS Semana")->from("semanasproduccion AS S")->where("S.Sem", $S)->where("S.Estatus", "ACTIVO")->order_by('S.Sem', 'ASC')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaximoConsecutivoZero($M, $S, $ID) {
        try {
            $this->db->select('CASE WHEN CT.Consecutivo IS NULL THEN 1 ELSE CT.Consecutivo+1 END AS MAX', false)->from('PedidoDetalle AS PD')
                    ->join('Pedidos AS PE', 'PD.Pedido = PE.Clave')
                    ->join('Clientes AS CL', 'CL.Clave = PE.Cliente')
                    ->join('Estilos AS E', 'PD.Estilo = E.Clave')
                    ->join('colores AS C', 'PD.color = C.Clave AND C.Estilo = E.Clave')
                    ->join('series AS S', 'E.Serie = S.Clave')
                    ->join('Controles AS CT', 'CT.PedidoDetalle = PD.ID', 'left')
                    ->where('CT.Estatus', 'A')
                    ->where('PD.Control', 0)->where('PD.Maquila', $M)->where('PD.Semana', $S);
            if ($ID > 0) {
                $this->db->where_not_in('PD.ID', array($ID));
            }
            return $this->db->order_by('CT.Consecutivo', 'DESC')
                            ->limit(1)
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarControlZero($x) {
        try {
            $this->db->insert("Controles", $x);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
