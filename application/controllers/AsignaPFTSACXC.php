<?php

/* NO TOCAR */
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class AsignaPFTSACXC extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('AsignaPFTSACXC_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');

            switch ($this->session->userdata["TipoAcceso"]) {
                case 'SUPER ADMINISTRADOR':
                    $this->load->view('vNavGeneral')->view('vMenuProduccion');
                    break;
                case 'DISEÑO Y DESARROLLO':
                    $this->load->view('vMenuFichasTecnicas');
                    break;
                case 'ALMACEN':
                    $this->load->view('vMenuMateriales');
                    break;
            }
            $this->load->view('vAsignaPFTSACXC')->view('vFooter');
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function onChecarSemanaValida() {
        try {
            print json_encode($this->AsignaPFTSACXC_model->onChecarSemanaValida($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getControlesAsignados() {
        try {
            print json_encode($this->AsignaPFTSACXC_model->getControlesAsignados());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRegresos() {
        try {
            print json_encode($this->AsignaPFTSACXC_model->getRegresos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEmpleados() {
        try {
            print json_encode($this->AsignaPFTSACXC_model->getEmpleados());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getParesXControl() {
        try {
            print json_encode($this->AsignaPFTSACXC_model->getParesXControl($this->input->get('CONTROL')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPieles() {
        try {
            print json_encode($this->AsignaPFTSACXC_model->getPieles($this->input->get('SEMANA'), $this->input->get('CONTROL')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getForros() {
        try {
            print json_encode($this->AsignaPFTSACXC_model->getForros($this->input->get('SEMANA'), $this->input->get('CONTROL')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTextiles() {
        try {
            print json_encode($this->AsignaPFTSACXC_model->getTextiles($this->input->get('SEMANA'), $this->input->get('CONTROL')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSinteticos() {
        try {
            print json_encode($this->AsignaPFTSACXC_model->getSinteticos($this->input->get('SEMANA'), $this->input->get('CONTROL')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExplosionXSemanaControlFraccionArticulo() {
        try {
            print json_encode($this->AsignaPFTSACXC_model->getExplosionXSemanaControlFraccionArticulo($this->input->get('SEMANA'), $this->input->get('CONTROL'), $this->input->get('FRACCION'), $this->input->get('ARTICULO'), $this->input->get('GRUPO')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEntregarPielForroTextilSintetico() {
        try {
            $x = $this->input;
            /* COMPROBAR SI YA EXISTE EL REGISTRO POR EMPLEADO,SEMANA, CONTROL, FRACCION, ARTICULO */
            $DT = $this->AsignaPFTSACXC_model->onComprobarEntrega($x->post('SEMANA'), $x->post('CONTROL'), $x->post('ARTICULO'), $x->post('FRACCION'));
            /* EXISTE LA POSIBILIDAD DE QUE LA FRACCION SEA DIFERENTE Y QUE HAGA UN NUEVO REGISTRO */
            if (count($DT) > 0) {
                $this->db->set('Cargo', ( $DT[0]->Cargo + $x->post('ENTREGA')))->where('ID', $DT[0]->ID)->update('asignapftsacxc');
            } else {
                $PRECIO = $this->AsignaPFTSACXC_model->onObtenerPrecioMaquila($x->post('ARTICULO'));
                $data = array(
                    'PrecioProgramado' => $PRECIO[0]->PRECIO_MAQUILA_UNO,
                    'PrecioActual' => $PRECIO[0]->PRECIO_MAQUILA_UNO,
                    'OrdenProduccion' => $x->post('ORDENDEPRODUCCION'),
                    'Pares' => $x->post('PARES'),
                    'Semana' => $x->post('SEMANA'),
                    'Control' => $x->post('CONTROL'),
                    'Fraccion' => $x->post('FRACCION'),
                    'Empleado' => 0,
                    'Articulo' => $x->post('ARTICULO'),
                    'Descripcion' => $x->post('ARTICULOT'),
                    'Fecha' => Date('d/m/Y h:i:s a'),
                    'Explosion' => $x->post('EXPLOSION'),
                    'Cargo' => $x->post('EXPLOSION'),
                    'Abono' => $x->post('ENTREGA'),
                    'Devolucion' => 0,
                    'Estatus' => 'A',
                    'TipoMov' => $x->post('TIPO')/* 1 = PIEL, 2 = FORRO, 34 = TEXTIL , 40 = SINTETICO */,
                    'Extra' => $x->post('MATERIAL_EXTRA'),
                    'ExtraT' => ($x->post('MATERIAL_EXTRA') > 0 && $x->post('EXPLOSION') < $x->post('ENTREGA')) ? $x->post('ENTREGA') - $x->post('EXPLOSION') : 0
                );
                $this->db->insert('asignapftsacxc', $data);
                $this->db->query("UPDATE asignapftsacxc AS A INNER JOIN ordendeproduccion AS O ON A.OrdenProduccion = O.ID 
                    SET A.Estilo = O.Estilo, A.Color = O.Color 
                    WHERE A.Control LIKE '" . $x->post('CONTROL') . "' 
                    AND A.OrdenProduccion = " . $x->post('ORDENDEPRODUCCION')
                        . " AND A.Articulo = " . $x->post('ARTICULO')
                        . " AND A.Pares = " . $x->post('PARES')
                        . " AND A.Semana = " . $x->post('SEMANA')
                        . " AND A.Fraccion = " . $x->post('FRACCION'));
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                } else {
                    $this->db->trans_commit();
                }
                /* AGREGAR MOVIMIENTO DE ARTICULO */
                $datos = array(
                    'Articulo' => $x->post('ARTICULO'),
                    'PrecioMov' => 0,
                    'CantidadMov' => $x->post('EXPLOSION'),
                    'FechaMov' => Date('d/m/Y'),
                    'EntradaSalida' => '2'/* 1= ENTRADA, 2 = SALIDA */,
                    'TipoMov' => 'SXP', /* SXP = SALIDA A PRODUCCION */
                    'DocMov' => $x->post('ORDENDEPRODUCCION'),
                    'Tp' => 1,
                    'Maq' => substr($x->post('CONTROL'), 4, 2),
                    'Sem' => $x->post('SEMANA'),
                    'OrdenCompra' => NULL,
                    'Subtotal' => 0
                );
                $this->AsignaPFTSACXC_model->onAgregarMovArt($datos);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onDevolverPielForro() {
        try {
            /* AGREGAR MOVIMIENTO DE ARTICULO */
            $x = $this->input;
            if ($x->post('REGRESO') >= 0 && $x->post("MATERIALMALO") <= 0) {
                $datos = array(
                    'Articulo' => $x->post('ARTICULO'),
                    'PrecioMov' => 0,
                    'CantidadMov' => $x->post('REGRESO'),
                    'FechaMov' => Date('d/m/Y'),
                    'EntradaSalida' => '1'/* 1= ENTRADA, 2 = SALIDA */,
                    'TipoMov' => 'EXP', /* EXP = ENTRADA POR PRODUCCION */
                    'DocMov' => $x->post('ID'),
                    'Tp' => 3,
                    'Maq' => 10,
                    'Sem' => substr($x->post('CONTROL'), 2, 2),
                    'OrdenCompra' => NULL,
                    'Subtotal' => 0
                );
                $this->AsignaPFTSACXC_model->onAgregarMovArt($datos);

                /* OBTENER ULTIMO REGRESO */
                $REGRESO = $this->AsignaPFTSACXC_model->onObtenerUltimoRegreso($x->post('ID'));
                if (isset($REGRESO[0]->REGRESO)) {
                    $this->db->set('Empleado', $x->post('EMPLEADO'))
                            ->set('Devolucion', $x->post('REGRESO') + $REGRESO[0]->REGRESO)
                            ->where('ID', $x->post('ID'))->update('asignapftsacxc');
                } else {
                    $this->db->set('Empleado', $x->post('EMPLEADO'))
                            ->set('Devolucion', $x->post('REGRESO'))
                            ->where('ID', $x->post('ID'))->update('asignapftsacxc');
                }
            } else {
                if ($x->post("MATERIALMALO") > 0) {
                    $datos = array(
                        'Articulo' => $x->post('ARTICULO'),
                        'PrecioMov' => 0,
                        'CantidadMov' => $x->post('REGRESO'),
                        'FechaMov' => Date('d/m/Y'),
                        'EntradaSalida' => '2'/* 1= ENTRADA, 2 = SALIDA */,
                        'TipoMov' => 'EXP', /* EXP = ENTRADA POR PRODUCCION */
                        'DocMov' => $x->post('ID'),
                        'Tp' => 3,
                        'Maq' => 10,
                        'Sem' => substr($x->post('CONTROL'), 2, 2),
                        'OrdenCompra' => NULL,
                        'Subtotal' => 0
                    );
                    $this->AsignaPFTSACXC_model->onAgregarMovArt($datos);
                } else {
                    print "LA CANTIDAD DEVUELTA O DEFECTUOSA HA SIDO ZERO 0";
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
