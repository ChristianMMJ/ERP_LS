<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CerrarProg extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('cerrarprog_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado')->view('vMenuProduccion')->view('vCerrarProg')->view('vFooter');
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->cerrarprog_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getHistorialDeControles() {
        try {
            print json_encode($this->cerrarprog_model->getHistorialDeControles());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onGenerarControles() {
        try {
            $controles = json_decode($this->input->post('SubControles'));
            switch ($this->input->post('Marca')) {
                case 1:
                    foreach ($controles as $k => $v) {
                        if ($v->Control == "") {
                            $Y = substr(Date('Y'), 2);
                            $M = str_pad($v->Maquila, 2, '0', STR_PAD_LEFT);
                            $S = str_pad($v->Semana, 2, '0', STR_PAD_LEFT);
                            $C = str_pad($this->cerrarprog_model->getMaximoConsecutivo($v->Maquila, $v->Semana, 0)[0]->MAX, 3, '0', STR_PAD_LEFT);
                            $this->cerrarprog_model->onAgregarControl(array(
                                'Control' => $Y . $S . $M . $C,
                                'FechaProgramacion' => Date('d/m/Y h:i:s a'),
                                'Estilo' => $v->Estilo, 'Color' => $v->Color,
                                'Serie' => $v->Serie, 'Cliente' => $v->Cliente,
                                'Pares' => $v->Pares, 'Pedido' => $v->Pedido,
                                'PedidoDetalle' => $v->PedidoDetalle,
                                'Estatus' => 'A', 'Departamento' => 1,
                                'Ano' => $Y, 'Maquila' => $M, 'Semana' => $S, 'Consecutivo' => $C
                            ));
                        }
                    }
                    break;
                case 2:
                    foreach ($controles as $k => $v) {
                        print "\n";
                        print_r($v);
                        print "\n";
                        $this->cerrarprog_model->onAgregarHistorialControl(array(
                            'Control' => $v->Control,
                            'Estilo' => $v->Estilo,
                            'EstiloDescripcion' => $v->DescripcionEstilo,
                            'Color' => $v->Color,
                            'ColorDescripcion' => $v->ColorDescripcion,
                            'Pedido' => $v->PedidoID,
                            'FechaPedido' => $v->FechaPedido,
                            'FechaEntregaRecepcion' => $v->FechaEntregaRecepcion,
                            'FechaCaptura' => $v->FechaCaptura,
                            'Semana' => $v->Semana,
                            'Maquila' => $v->Maquila,
                            'ClaveCliente' => $v->ClaveCliente,
                            'ClienteRazon' => $v->ClienteRazon,
                            'Pares' => $v->Pares,
                            'Precio' => $v->Precio,
                            'Importe' => $v->Importe,
                            'Descuento' => 0,
                            'FechaEntrega' => $v->FechaEntrega,
                            'Serie' => $v->SerieT,
                            'Ano' => $v->Ano,
                            'Marca' => $v->Marca,
                            'FechaEliminacion' => Date('d/m/Y h:i:s a'),
                            'Usuario' => $_SESSION["USERNAME"]
                        ));
                        $this->db->where('Pedido', $v->Pedido)->where('PedidoDetalle', $v->PedidoDetalle)->delete('Controles');
                    }
                    break;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}