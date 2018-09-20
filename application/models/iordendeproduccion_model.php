<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class iordendeproduccion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getOrdenDeProduccionEntreControles($CONTROL_INICIAL, $CONTROL_FINAL, $SEMANA, $ANO) {
        try {
            return $this->db->select("PD.ID AS ID, OP.Clave, OP.Cliente, OP.FechaEntrega, "
                                    . "OP.FechaPedido, OP.Control, OP.ControlT, OP.Pedido, OP.Linea, "
                                    . "OP.LineaT, OP.Recio, OP.Estilo, OP.EstiloT, OP.Color, "
                                    . "OP.ColorT, OP.Agente, OP.Transporte, OP.Piel1, OP.CantidadPiel1, "
                                    . "OP.Piel2, OP.CantidadPiel2, OP.Piel3, OP.CantidadPiel3, OP.Piel4, "
                                    . "OP.CantidadPiel4, OP.Piel5, OP.CantidadPiel5, OP.Piel6, OP.CantidadPiel6, "
                                    . "OP.TotalPiel, OP.Forro1, OP.CantidadForro1, OP.Forro2, OP.CantidadForro2, "
                                    . "OP.Forro3, OP.CantidadForro3, OP.TotalForro, OP.Sintetico1, OP.CantidadSintetico1, "
                                    . "OP.Sintetico2, OP.CantidadSintetico2, OP.Sintetico3, OP.CantidadSintetico3, OP.TotalSintetico, "
                                    . "OP.Suela, OP.SuelaT, OP.Suaje, OP.SerieCorrida, "
                                    . "OP.S1, OP.S2, OP.S3, OP.S4, OP.S5, OP.S6, OP.S7, OP.S8, OP.S9, OP.S10, "
                                    . "OP.S11, OP.S12, OP.S13, OP.S14, OP.S15, OP.S16, OP.S17, OP.S18, OP.S19, OP.S20, "
                                    . "OP.S21, OP.S22, "
                                    . "OP.Horma, OP.Pares, "
                                    . "OP.C1, OP.C2, OP.C3, OP.C4, OP.C5, OP.C6, OP.C7, OP.C8, OP.C9, OP.C10, "
                                    . "OP.C11, OP.C12, OP.C13, OP.C14, OP.C15, OP.C16, OP.C17, OP.C18, OP.C19, OP.C20, "
                                    . "OP.C21, OP.C22,"
                                    . "OP.Observaciones,"
                                    . "OP.EstatusProduccion", false)->from('ordendeproduccion AS OP')
                            ->join('ordendeproducciond AS OPD', 'OP.ID = OPD.OrdenDeProduccion')
                            ->join('pedidodetalle AS PD', 'OP.ID = OPD.OrdenDeProduccion')
                            ->where("OP.ControlT BETWEEN $CONTROL_INICIAL AND $CONTROL_FINAL", null, false)
                            ->get()->result();
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

}
