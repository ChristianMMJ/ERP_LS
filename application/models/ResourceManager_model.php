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
                return $this->db->select("OXM.Opcion, OXM.Icon, OXM.Ref, OXM.Button, OXM.Class, "
                                        . "IXO.Item, IXO.Icon AS IconItem, IXO.Ref AS RefItem, IXO.Modal AS ItemModal, IXO.Backdrop AS ItemBackdrop, IXO.Dropdown AS ItemDropdown,"
                                        . "SIXO.SubItem AS SubItem, SIXO.Icon AS IconSubItem, SIXO.Ref AS RefSubItem, SIXO.Modal AS SubItemModal, SIXO.Backdrop AS SubItemBackdrop, SIXO.Dropdown AS SubItemDropdown,"
                                        . "SSIXSI.SubSubItem AS SubSubItem, SSIXSI.Icon AS IconSubSubItem, SSIXSI.Ref AS RefSubSubItem, SSIXSI.Modal AS SubSubItemModal, SSIXSI.Backdrop AS SubSubItemBackdrop")
                                ->from("itemsxopcionxmoduloxusuario AS IXOMU")
                                ->join('opcionesxmoduloxusuario AS OXMU', 'IXOMU.Modulo = OXMU.Modulo AND IXOMU.Opcion = OXMU.Opcion')                        
                                ->join('modulosxusuario AS MXU', 'MXU.Modulo = OXMU.Modulo')
                                ->join('opcionesxmodulo AS OXM', 'OXM.Modulo = MXU.Modulo AND OXM.ID = OXMU.Opcion')
                                ->join('itemsxopcion AS IXO', 'OXM.ID = IXO.Opcion AND IXOMU.Item = IXO.ID', 'left')
                                ->join('subitemsxitem AS SIXO', 'IXO.ID = SIXO.Item', 'left')
                                ->join('subsubitemxsubitem AS SSIXSI', 'SIXO.ID = SSIXSI.SubItem', 'left')
                                ->where('OXM.Modulo', $M)
                                ->where('MXU.Usuario', $_SESSION["ID"])
                                ->where('OXMU.Usuario', $_SESSION["ID"])
                                ->where('IXOMU.Usuario', $_SESSION["ID"])
                                ->order_by('OXM.Order', 'ASC')
                                ->order_by('IXO.Order', 'ASC')
                                ->order_by('SIXO.Order', 'ASC')
                                ->order_by('SSIXSI.Order', 'ASC')
                                ->get()->result();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
