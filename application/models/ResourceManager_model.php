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
            return $this->db->select("ID, Modulo, Fecha, Icon, Ref")->from("modulos AS M")->order_by('M.Order', 'ASC')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getOpcionesXModulo($M) {
        try {
            return $this->db->select("OXM.Opcion, OXM.Icon, OXM.Ref, "
                                    . "IXO.Item, IXO.Icon AS IconItem, IXO.Ref AS RefItem, IXO.Modal AS ItemModal, IXO.Backdrop AS ItemBackdrop, IXO.Dropdown AS ItemDropdown,"
                                    . "SIXO.SubItem AS SubItem, SIXO.Icon AS IconSubItem, SIXO.Ref AS RefSubItem, SIXO.Modal AS SubItemModal, SIXO.Backdrop AS SubItemBackdrop, SIXO.Dropdown AS SubItemDropdown,"
                                    . "SSIXSI.SubSubItem AS SubSubItem, SSIXSI.Icon AS IconSubSubItem, SSIXSI.Ref AS RefSubSubItem, SSIXSI.Modal AS SubSubItemModal, SSIXSI.Backdrop AS SubSubItemBackdrop")
                            ->from("opcionesxmodulo AS OXM")
                            ->join('itemsxopcion AS IXO', 'OXM.ID = IXO.Opcion', 'left')
                            ->join('subitemsxitem AS SIXO', 'IXO.ID = SIXO.Item', 'left')
                            ->join('subsubitemxsubitem AS SSIXSI', 'SIXO.ID = SSIXSI. SubItem', 'left')
                            ->where('OXM.Modulo', $M)
                            ->order_by('OXM.Order', 'ASC')
                            ->order_by('IXO.Order', 'ASC')
                            ->order_by('SIXO.Order', 'ASC')
                            ->order_by('SSIXSI.Order', 'ASC')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
