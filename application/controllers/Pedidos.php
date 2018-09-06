<?php

/* NO TOCAR */
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->helper('pedido_helper')->model('pedidos_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            switch ($this->session->userdata["TipoAcceso"]) {
                case 'SUPER ADMINISTRADOR':
                    $this->load->view('vNavGeneral')->view('vMenuClientes');
                    break;
                case 'ADMINISTRACION':
                    $this->load->view('vMenuAdministracion');
                    break;
                case 'CONTABILIDAD':
                    $this->load->view('vMenuContabilidad');
                    break;
                case 'RECURSOS HUMANOS':
                    $this->load->view('vMenuRecursosHumanos');
                    break;
                case 'INGENIERIA':
                    $this->load->view('vMenuIngenieria');
                    break;
                case 'DISEÑO Y DESARROLLO':
                    $this->load->view('vMenuDisDes');
                    break;
                case 'ALMACEN':
                    $this->load->view('vMenuAlmacen');
                    break;
                case 'PRODUCCION':
                    $this->load->view('vMenuProduccion');
                    break;
            }

            $this->load->view('vFondo')->view('vPedidos')->view('vFooter');
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->pedidos_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPedidosByID() {
        try {
            print json_encode($this->pedidos_model->getPedidosByID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getID() {
        try {
            print json_encode($this->pedidos_model->getID());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarClave() {
        try {
            print json_encode($this->pedidos_model->onComprobarClave($this->input->get('Clave')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getClientes() {
        try {
            print json_encode($this->pedidos_model->getClientes());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getAgentes() {
        try {
            print json_encode($this->pedidos_model->getAgentes());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            print json_encode($this->pedidos_model->getEstilos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getColoresXEstilo() {
        try {
            print json_encode($this->pedidos_model->getColoresXEstilo($this->input->get('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaquilas() {
        try {
            print json_encode($this->pedidos_model->getMaquilas());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getAnosValidos() {
        try {
            print json_encode($this->pedidos_model->getAnosValidos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaquilaSerieXEstilo() {
        try {
            print json_encode($this->pedidos_model->getMaquilaSerieXEstilo($this->input->get('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getProduccionMaquilaSemana() {
        try {
            print json_encode($this->pedidos_model->getProduccionMaquilaSemana($this->input->get('Maquila'), $this->input->get('Semana')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getAgenteXCliente() {
        try {
            print json_encode($this->pedidos_model->getAgenteXCliente($this->input->get('Cliente')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSemanaXFechaDeEntrega() {
        try {
            print json_encode($this->pedidos_model->getSemanaXFechaDeEntrega($this->input->get('Fecha')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $x = $this->input;
            $data = array();
            foreach ($x->post() as $key => $v) {
                if ($v !== '') {
                    $data[$key] = ($v !== '') ? strtoupper($v) : NULL;
                }
            }
            $data["Usuario"] = $_SESSION["USERNAME"];
            $data["Estatus"] = 'A';
            $data["Registro"] = Date('d/m/Y h:i:s');
            unset($data["Detalle"]);
            $ID = $this->pedidos_model->onAgregar($data);
            $Detalle = json_decode($this->input->post("Detalle"));
            foreach ($Detalle as $key => $v) {
                $dt = date_parse($v->FechaEntrega);
                $data = array(
                    "Pedido" => $ID,
                    "Estilo" => ($v->Estilo !== '') ? $v->Estilo : NULL,
                    "EstiloT" => ($v->EstiloT !== '') ? $v->EstiloT : NULL,
                    "Color" => ($v->Color !== '') ? $v->Color : NULL,
                    "ColorT" => ($v->ColorT !== '') ? $v->ColorT : NULL,
                    "FechaEntrega" => ($v->FechaEntrega !== '') ? $v->FechaEntrega : NULL,
                    "Maquila" => ($v->Maquila !== '') ? $v->Maquila : NULL,
                    "Semana" => ($v->Semana !== '') ? $v->Semana : NULL,
                    "Ano" => $dt["year"],
                    "Recio" => ($v->Recio !== '') ? $v->Recio : NULL,
                    "Precio" => ($v->Precio !== '') ? $v->Precio : NULL,
                    "Observacion" => ($v->Observacion !== '') ? $v->Observacion : NULL,
                    "ObservacionDetalle" => ($v->ObservacionDetalle !== '') ? $v->ObservacionDetalle : NULL,
                    "Serie" => ($v->Serie !== '') ? $v->Serie : NULL,
                    "Control" => ($v->Control !== '') ? $v->Control : NULL,
                    "Pares" => ($v->Pares !== '') ? $v->Pares : NULL,
                    "C1" => ($v->C1 !== '') ? $v->C1 : NULL, "C2" => ($v->C2 !== '') ? $v->C2 : NULL,
                    "C3" => ($v->C3 !== '') ? $v->C3 : NULL, "C4" => ($v->C4 !== '') ? $v->C4 : NULL,
                    "C5" => ($v->C5 !== '') ? $v->C5 : NULL, "C6" => ($v->C6 !== '') ? $v->C6 : NULL,
                    "C7" => ($v->C7 !== '') ? $v->C7 : NULL, "C8" => ($v->C8 !== '') ? $v->C8 : NULL,
                    "C9" => ($v->C9 !== '') ? $v->C9 : NULL, "C10" => ($v->C10 !== '') ? $v->C10 : NULL,
                    "C11" => ($v->C11 !== '') ? $v->C11 : NULL, "C12" => ($v->C12 !== '') ? $v->C12 : NULL,
                    "C13" => ($v->C13 !== '') ? $v->C13 : NULL, "C14" => ($v->C14 !== '') ? $v->C14 : NULL,
                    "C15" => ($v->C15 !== '') ? $v->C15 : NULL, "C16" => ($v->C16 !== '') ? $v->C16 : NULL,
                    "C17" => ($v->C17 !== '') ? $v->C17 : NULL, "C18" => ($v->C18 !== '') ? $v->C18 : NULL,
                    "C19" => ($v->C19 !== '') ? $v->C19 : NULL, "C20" => ($v->C20 !== '') ? $v->C20 : NULL,
                    "C21" => ($v->C21 !== '') ? $v->C21 : NULL, "C22" => ($v->C22 !== '') ? $v->C22 : NULL,
                    "Recibido" => ($v->Recibido !== '') ? $v->Recibido : NULL
                );
                $data["Estatus"] = 'A';
                $data["Registro"] = Date('d/m/Y h:i:s');
                $this->db->insert("pedidodetalle", $data);
                $this->onLog("AGREGO " . $v->Pares . " PARES AL PEDIDO $ID DEL ESTILO: " . $v->EstiloT . ", COLOR: " . $v->ColorT);
            }
            //RETURN ID
            print '{ "ID":' . $ID . ',"EVT":"Agregar"}';
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            $x = $this->input;
            $Detalle = json_decode($this->input->post("Detalle"));
            foreach ($Detalle as $key => $v) {
                $dt = date_parse($v->FechaEntrega);
                $data = array(
                    "Pedido" => $x->post('Clave'),
                    "Estilo" => ($v->Estilo !== '') ? $v->Estilo : NULL,
                    "EstiloT" => ($v->EstiloT !== '') ? $v->EstiloT : NULL,
                    "Color" => ($v->Color !== '') ? $v->Color : NULL,
                    "ColorT" => ($v->ColorT !== '') ? $v->ColorT : NULL,
                    "FechaEntrega" => ($v->FechaEntrega !== '') ? $v->FechaEntrega : NULL,
                    "Maquila" => ($v->Maquila !== '') ? $v->Maquila : NULL,
                    "Semana" => ($v->Semana !== '') ? $v->Semana : NULL,
                    "Ano" => $dt["year"],
                    "Recio" => ($v->Recio !== '') ? $v->Recio : NULL,
                    "Precio" => ($v->Precio !== '') ? $v->Precio : NULL,
                    "Observacion" => ($v->Observacion !== '') ? $v->Observacion : NULL,
                    "ObservacionDetalle" => ($v->ObservacionDetalle !== '') ? $v->ObservacionDetalle : NULL,
                    "Serie" => ($v->Serie !== '') ? $v->Serie : NULL,
                    "Control" => ($v->Control !== '') ? $v->Control : NULL,
                    "Pares" => ($v->Pares !== '') ? $v->Pares : NULL,
                    "C1" => ($v->C1 !== '') ? $v->C1 : NULL, "C2" => ($v->C2 !== '') ? $v->C2 : NULL,
                    "C3" => ($v->C3 !== '') ? $v->C3 : NULL, "C4" => ($v->C4 !== '') ? $v->C4 : NULL,
                    "C5" => ($v->C5 !== '') ? $v->C5 : NULL, "C6" => ($v->C6 !== '') ? $v->C6 : NULL,
                    "C7" => ($v->C7 !== '') ? $v->C7 : NULL, "C8" => ($v->C8 !== '') ? $v->C8 : NULL,
                    "C9" => ($v->C9 !== '') ? $v->C9 : NULL, "C10" => ($v->C10 !== '') ? $v->C10 : NULL,
                    "C11" => ($v->C11 !== '') ? $v->C11 : NULL, "C12" => ($v->C12 !== '') ? $v->C12 : NULL,
                    "C13" => ($v->C13 !== '') ? $v->C13 : NULL, "C14" => ($v->C14 !== '') ? $v->C14 : NULL,
                    "C15" => ($v->C15 !== '') ? $v->C15 : NULL, "C16" => ($v->C16 !== '') ? $v->C16 : NULL,
                    "C17" => ($v->C17 !== '') ? $v->C17 : NULL, "C18" => ($v->C18 !== '') ? $v->C18 : NULL,
                    "C19" => ($v->C19 !== '') ? $v->C19 : NULL, "C20" => ($v->C20 !== '') ? $v->C20 : NULL,
                    "C21" => ($v->C21 !== '') ? $v->C21 : NULL, "C22" => ($v->C22 !== '') ? $v->C22 : NULL,
                    "Recibido" => ($v->Recibido !== '') ? $v->Recibido : NULL
                );
                $data["Estatus"] = 'A';
                $data["Registro"] = Date('d/m/Y h:i:s');
                $this->db->insert("pedidodetalle", $data);
            }
            //RETURN ID
            print '{ "ID":' . $ID . ',"EVT":"Agregar"}';
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->db->where('ID', $this->input->post('ID'))->delete('pedidodetalle');
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function onImprimirPedido() {
        try {
            $pdf = new PDF('L', 'mm', array(215.9, 279.4));
            $Pedido = $this->pedidos_model->getPedidosByID($this->input->post('ID'));
                
            $Encabezado = $Pedido[0];
            $pdf->setPedido($Encabezado->Clave);
            /* FIN RESUMEN */
            $path = 'uploads/Reportes/Pedidos';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "Pedido " . date("d-m-Y_his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */

            $pdf->Output($url);
            print base_url() . $url;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public $Padre = '';
    public $Hijo = '';

    function getPadre() {
        return $this->Padre;
    }

    function getHijo() {
        return $this->Hijo;
    }

    function setPadre($Padre) {
        $this->Padre = $Padre;
    }

    function setHijo($Hijo) {
        $this->Hijo = $Hijo;
    }

    public function onLog($Accion) {
        try {
            /* LOG TO ACCIONS */
            $xlog = array();
            $xlog["Empresa"] = $this->session->Empresa;
            $xlog["Tipo"] = $this->session->TipoAcceso;
            $xlog["IdUsuario"] = $this->session->ID;
            $xlog["Usuario"] = $this->session->Nombre . " " . $this->session->Apellidos;
            $xlog["Modulo"] = "PEDIDOS";
            $xlog["Accion"] = $this->session->Nombre . " " . $this->session->Apellidos . ":" . $Accion;
            $xlog["Fecha"] = Date('d/m/Y');
            $xlog["Hora"] = Date('h:i:s a');
            $xlog["Dia"] = Date('d');
            $xlog["Mes"] = Date('m');
            $xlog["Anio"] = Date('Y');
            $xlog["Registro"] = Date('d/m/Y h:i:s a');
            $xlog["Padre"] = $this->getPadre();
            $xlog["Hijo"] = $this->getHijo();
            $xlog["Estatus"] = 'ACTIVO';
            $this->db->insert('logs', $xlog);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
