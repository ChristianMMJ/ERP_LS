<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class ResourceManager_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getModulos() {
        try {
            return $this->db->select("M.ID, M.Modulo, M.Fecha, M.Icon, M.Ref")->from("modulos AS M")
                            ->join('modulosxusuario AS MXU', 'MXU.Modulo = M.ID', 'left')
                            ->where('MXU.Usuario', $_SESSION["ID"])
                            ->order_by('M.Order', 'ASC')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getOpcionesXModulo($M) {
        try {
            if (isset($_SESSION["ID"])) {
//                return $this->db->select("OXM.Opcion, OXM.Icon, OXM.Ref, OXM.Button, OXM.Class, "
//                                . "IXO.Item, IXO.Icon AS IconItem, IXO.Ref AS RefItem, IXO.Modal AS ItemModal, IXO.Backdrop AS ItemBackdrop, IXO.Dropdown AS ItemDropdown,(CASE WHEN IXO.Function IS NULL THEN 0 ELSE IXO.Function END) AS Function, IXO.Trigger,"
//                                . "SIXO.SubItem AS SubItem, SIXO.Icon AS IconSubItem, SIXO.Ref AS RefSubItem, SIXO.Modal AS SubItemModal, SIXO.Backdrop AS SubItemBackdrop, SIXO.Dropdown AS SubItemDropdown,(CASE WHEN SIXO.Function IS NULL THEN 0 ELSE SIXO.Function END) AS FunctionSubItem, SIXO.Trigger AS TriggerSubItem,"
//                                . "SSIXSI.SubSubItem AS SubSubItem, SSIXSI.Icon AS IconSubSubItem, SSIXSI.Ref AS RefSubSubItem, SSIXSI.Modal AS SubSubItemModal, SSIXSI.Backdrop AS SubSubItemBackdrop")
//                        ->from("itemsxopcionxmoduloxusuario AS IXOMU")
//                        ->join('opcionesxmoduloxusuario AS OXMU', 'OXMU.Usuario = IXOMU.Usuario AND OXMU.Modulo = IXOMU.Modulo AND OXMU.Opcion = IXOMU.Opcion', 'right')
//                        ->join('modulosxusuario AS MXU', 'MXU.Modulo = OXMU.Modulo')
//                        ->join('opcionesxmodulo AS OXM', 'OXM.Modulo = MXU.Modulo AND OXM.ID = OXMU.Opcion')
//                        ->join('itemsxopcion AS IXO', 'OXM.ID = IXO.Opcion AND IXOMU.Item = IXO.ID', 'left')
//                        ->join('subitemsxitem AS SIXO', 'IXO.ID = SIXO.Item', 'left')
//                        ->join('subsubitemxsubitem AS SSIXSI', 'SIXO.ID = SSIXSI.SubItem', 'left')
//                        ->where('OXM.Modulo', $M)
//                        ->where('MXU.Usuario', $_SESSION["ID"])
//                        ->where('OXMU.Usuario', $_SESSION["ID"])
//                                ->order_by('OXM.Order', 'ASC')
//                                ->order_by('IXO.Order', 'ASC')
//                                ->order_by('SIXO.Order', 'ASC')
//                                ->order_by('SSIXSI.Order', 'ASC')
//                                ->get()->result();
                        $this->db->select("J.ID AS is_subsubitem, I.ID AS is_subitem, B.Opcion, B.Icon, B.Ref, B.Button, B.Class, "
                        . "C.Item, C.Icon AS IconItem, C.Ref AS RefItem, C.Modal AS ItemModal, C.Backdrop AS ItemBackdrop, C.Dropdown AS ItemDropdown,(CASE WHEN C.Function IS NULL THEN 0 ELSE C.Function END) AS Function, C.Trigger,"
                        . "D.SubItem AS SubItem, D.Icon AS IconSubItem, D.Ref AS RefSubItem, D.Modal AS SubItemModal, D.Backdrop AS SubItemBackdrop, D.Dropdown AS SubItemDropdown,(CASE WHEN D.Function IS NULL THEN 0 ELSE D.Function END) AS FunctionSubItem, D.Trigger AS TriggerSubItem,"
                        . "E.SubSubItem AS SubSubItem, E.Icon AS IconSubSubItem, E.Ref AS RefSubSubItem, E.Modal AS SubSubItemModal, E.Backdrop AS SubSubItemBackdrop")
                        ->from("modulos AS A")
                        ->join('opcionesxmodulo AS B', 'A.ID = B.Modulo', 'left')
                        ->join('itemsxopcion AS C', 'B.ID = C.Opcion', 'left')
                        ->join('subitemsxitem AS D', 'C.ID = D.Item', 'left')
                        ->join('subsubitemxsubitem AS E', 'D.ID = E.SubItem', 'left')
                        
                        ->join('modulosxusuario AS F', 'A.ID = F.Modulo', 'left')
                        ->join('opcionesxmoduloxusuario AS G', 'A.ID = G.Modulo AND B.ID = G.Opcion', 'left')
                        ->join('itemsxopcionxmoduloxusuario AS H', 'A.ID = H.Modulo AND B.ID = H.Opcion AND C.ID = H.Item', 'left')
                        ->join('subitemsxitemxopcionxmoduloxusuario AS I', 'A.ID = I.Modulo AND B.ID = I.Opcion AND C.ID = I.Item AND I.SubItem  = D.ID', 'left')
                        ->join('subsubitemsxitemxopcionxmoduloxusuario AS J', 'A.ID = J.Modulo AND B.ID = J.Opcion AND C.ID = J.Item AND J.SubItem = D.ID AND J.SubSubItem = E.ID', 'left')
                        
                        ->where('B.Modulo', $M) 
                        ->where('F.Usuario', $_SESSION["ID"])
                        ->where('G.Usuario', $_SESSION["ID"])
                        ->where('H.Usuario', $_SESSION["ID"])
                        ->order_by('B.Order', 'ASC')->order_by('C.Order', 'ASC')
                        ->order_by('D.Order', 'ASC')->order_by('E.Order', 'ASC');
                return $this->db->get()->result();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
