<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class ordendeproduccion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            $this->db->select("ID, Clave, Descripcion, Direccion, Tel, Cel", false)
                    ->from('agentes AS C');
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

    public function getPedidosByMaquilaSemana($MAQUILA, $SEMANA, $ANO) {
        try {
            $this->db->select("P.Clave AS CLAVE_PEDIDO, C.Clave CLAVE_CLIENTE, "
                            . "C.RazonS AS CLIENTE, P.FechaPedido AS FECHA_PEDIDO, "
                            . "T.Descripcion AS TRANSPORTE, A.Nombre AGENTE, S.Clave AS SERIE,"
                            . "S.T1, S.T2, S.T3, S.T4, S.T5,"
                            . "S.T6, S.T7, S.T8, S.T9, S.T10,"
                            . "S.T11, S.T12, S.T13, S.T14, S.T15,"
                            . "S.T16, S.T17, S.T18, S.T19, S.T20,"
                            . "S.T21,S.T22,L.Clave AS CLAVE_LINEA, L.Descripcion AS LINEA,"
                            . "E.Horma AS HORMA,"
                            . "PD.*", false)
                    ->from('pedidos AS P')
                    ->join('pedidodetalle AS PD', 'P.ID = PD.Pedido')
                    ->join('Clientes AS C', 'P.Cliente = C.Clave')
                    ->join('Estilos AS E', 'PD.Estilo = E.Clave')
                    ->join('Colores AS CO', 'PD.Color = CO.Clave')
                    ->join('agentes AS A', 'P.Agente = A.Clave')
                    ->join('Transportes AS T', 'C.Transporte = T.Clave')
                    ->join('Series AS S', 'PD.Serie = S.Clave')
                    ->join('Lineas AS L', 'E.Linea = L.Clave')
                    ->where('PD.Maquila', $MAQUILA)
                    ->where('PD.Semana', $SEMANA)
                    ->where('PD.Ano', $ANO)
                    ->where('E.Clave = CO.Estilo', null, false);
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
//            PRINT $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPIEL_FORRO_SINTETICO_SUELA($ESTILO, $COLOR, $PARES) {
        try {
            $this->db->select("G.Clave, G.Nombre AS Grupo, A.Descripcion AS PIEL_FORRO_SINTETICO_SUELA , 
  (sum(FT.Consumo) * (
  (CASE 
  WHEN  E.PiezasCorte BETWEEN 0 AND 10 AND A.Grupo IN(1,2) THEN M.PorExtra3a10
  WHEN  E.PiezasCorte BETWEEN 11 AND 14  AND A.Grupo IN(1,2) THEN M.PorExtra11a14
  WHEN  E.PiezasCorte BETWEEN 15 AND 18 AND A.Grupo IN(1,2) THEN M.PorExtra15a18
  WHEN  E.PiezasCorte >=19  AND A.Grupo IN(1,2) THEN M.PorExtra19a
  ELSE 0
  END) +1)) * $PARES as CONSUMOTOTAL", false)
                    ->from('fichatecnica AS FT')
                    ->join('Articulos AS A', 'FT.Articulo = A.Clave')
                    ->join('Estilos AS E', 'FT.Estilo = E.Clave')
                    ->join('Maquilas AS M', 'E.Maquila = M.Clave')
                    ->join('Grupos AS G ', 'A.Grupo = G.Clave')
                    ->where('FT.Estilo',$ESTILO)
                    ->where('FT.Color',$COLOR) 
                    ->where_in('A.Grupo',array(1,2,40,3)) 
                    ->group_by('A.Descripcion')
                    ->order_by('ABS(G.Clave)','ASC')
                    ->order_by('A.Descripcion','ASC')
                    ;
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

    public function getUID() {
        try {
            return $this->db->select("A.*", false)->from('Agentes AS A')->order_by('A.ID', 'DESC')->get()->result();
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
