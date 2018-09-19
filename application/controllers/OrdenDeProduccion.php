<?php

/* NO TOCAR */
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class OrdenDeProduccion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('ordendeproduccion_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            switch ($this->session->userdata["TipoAcceso"]) {
                case 'SUPER ADMINISTRADOR':
                    $this->load->view('vNavGeneral')->view('vMenuProduccion');
                    break;
                case 'VENTAS':
                    $this->load->view('vMenuClientes');
                    break;
                case 'PRODUCCION':
                    $this->load->view('vMenuProduccion');
                    break;
                case 'RECURSOS HUMANOS':
                    $this->load->view('vMenuProduccion');
                    break;
                case 'FACTURACION':
                    $this->load->view('vMenuFacturacion');
                    break;
                case 'PRODUCCION':
                    $this->load->view('vMenuProduccion');
                    break;
            }

            $this->load->view('vFondo')->view('vOrdenDeProduccion')->view('vFooter');
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function onChecarMaquilaValida() {
        try {
            print json_encode($this->ordendeproduccion_model->onChecarMaquilaValida($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onChecarSemanaValida() {
        try {
            print json_encode($this->ordendeproduccion_model->onChecarSemanaValida($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /* OBTENER Y AGREGAR A ORDEN DE PRODUCCION LOS PEDIDOS */

    public function onAgregarAOrdenDeProduccion() {
        try {
            $x = $this->input;
            $PEDIDO_DETALLE = $this->ordendeproduccion_model->getPedidosByMaquilaSemana($x->post('MAQUILA'), $x->post('SEMANA'), $x->post('ANO'));
            foreach ($PEDIDO_DETALLE as $key => $v) {
                $data = array();
                $data["Clave"] = $v->CLAVE_CLIENTE;
                $data["Cliente"] = $v->CLIENTE;
                $data["FechaEntrega"] = $v->FechaEntrega;
                $data["FechaPedido"] = $v->FECHA_PEDIDO;
                $data["Control"] = $v->Control;
                $data["Pedido"] = $v->Pedido;
                $data["Linea"] = $v->CLAVE_LINEA;
                $data["LineaT"] = $v->LINEA;
                $data["Recio"] = $v->Recio;
                $data["Estilo"] = $v->Estilo;
                $data["EstiloT"] = $v->EstiloT;
                $data["Color"] = $v->Color;
                $data["ColorT"] = $v->ColorT;

                $data["Agente"] = $v->AGENTE;
                $data["Transporte"] = $v->TRANSPORTE;
                
                $data["Piel1ra"] = '';
                $data["CantidadPiel1ra"] = '';
                $data["Piel2da"] = '';
                $data["CantidadPiel2da"] = '';
                $data["Piel3ra"] = '';
                $data["CantidadPiel3ra"] = '';
                $data["TotalPiel"] = '';
                $data["Forro1ra"] = '';
                $data["CantidadForro1ra"] = '';
                $data["Forro2da"] = '';
                $data["CantidadForro2da"] = '';
                $data["Forro3ra"] = '';
                $data["CantidadForro3ra"] = '';
                $data["TotalForro"] = '';
                $data["Sintetico1ra"] = '';
                $data["CantidadSintetico1ra"] = '';
                $data["Sintetico2da"] = '';
                $data["CantidadSintetico2da"] = '';
                $data["Sintetico3ra"] = '';
                $data["CantidadSintetico3ra"] = '';
                $data["TotalSintetico"] = '';
                
                $data["Suela"] = '';
                $data["SuelaT"] = '';
                $data["Suaje"] = '';
                
                $data["SerieCorrida"] = $v->SERIE;
                $data["EstatusProduccion"] = 'PROGRAMADO';

                for ($index = 1; $index <= 22; $index++) {
                    $data["S$index"] = $v->{"T$index"};
                }

                $data["Horma"] = $v->HORMA;
                $data["Pares"] = $v->Pares;

                for ($index = 1; $index <= 22; $index++) {
                    $data["C$index"] = $v->{"C$index"};
                }
                $data["Registro"] = Date('d/m/Y h:i:s a');
                $this->db->insert('ordendeproduccion', $data);
                //  Observaciones, Nombre, Registro, Eliminacion
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
