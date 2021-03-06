<?php

/* NO TOCAR */
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class MaterialControlFecha extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('MaterialControlFecha_model')
                ->helper('Entregamaterialcontrol_helper')->helper('file');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');

            switch ($this->session->userdata["TipoAcceso"]) {
                case 'SUPER ADMINISTRADOR':
                    $this->load->view('vNavGeneral');
                    $this->load->view('vMenuMateriales');
                    break;
                case 'ALMACEN':
                    $this->load->view('vMenuMateriales');
                    break;
            }

            $this->load->view('vFondo');
            $this->load->view('vMaterialControlFecha');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getPedidoByControl() {
        try {
            print json_encode($this->MaterialControlFecha_model->getPedidoByControl($this->input->get('Control')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getOrdenProduccionByControl() {
        try {
            print json_encode($this->MaterialControlFecha_model->getOrdenProduccionByControl($this->input->get('Control')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onImprimirReportePorControlDepartamento() {
        $Controles = json_decode($this->input->post('Controles'));
        $controles_arr = array();
        foreach ($Controles as $k => $v) {
            array_push($controles_arr, $v->Control);
        }
        $Deptos = $this->MaterialControlFecha_model->getDeptosArticulos($controles_arr);
        $Grupos = $this->MaterialControlFecha_model->getGruposArticulos($controles_arr);
        $ArticulosE = $this->MaterialControlFecha_model->getArticulosEnc($controles_arr);
        $Articulos = $this->MaterialControlFecha_model->getArticulos($controles_arr);
        if (!empty($Deptos)) {

            $pdf = new PDF('P', 'mm', array(215.9, 279.4));
            $pdf->SetAutoPageBreak(true, 10);

            //Agregamos una hoja por cada departamento del articulo 10, 80, 90
            $Tipo = '';
            foreach ($Deptos as $key => $T) {
                switch ($T->DepartamentoArt) {
                    case '10':
                        $Tipo = '******* PIEL Y FORRO *******';
                        break;
                    case '80':
                        $Tipo = '******* SUELA *******';
                        break;
                    case '90':
                        $Tipo = '******* INDIRECTOS *******';
                        break;
                }
                $pdf->setTipo($Tipo);
                $pdf->AddPage();


                //Agregamos los Grupos
                foreach ($Grupos as $key => $G) {

                    if ($T->DepartamentoArt === $G->DepartamentoArt) {
                        $pdf->SetLineWidth(0.5);
                        $pdf->SetFont('Calibri', 'B', 9);
                        $pdf->SetX(5);
                        $pdf->Cell(15, 5, 'Grupo: ', 'B'/* BORDE */, 0, 'L');
                        $pdf->SetX(20);
                        $pdf->SetFont('Calibri', '', 9);
                        $pdf->Cell(50, 5, utf8_decode($G->ClaveGrupo . '     ' . $G->Nombre), 'B'/* BORDE */, 1, 'L');
                        $pdf->SetLineWidth(0.2);
                        $TOTAL_GPO = 0;
                        //Agregamos los articulos
                        foreach ($ArticulosE as $key => $AE) {

                            if ($T->DepartamentoArt === $AE->DepartamentoArt && $G->ClaveGrupo === $AE->ClaveGrupo) {
                                $TOTAL_ART = 0;
                                foreach ($Articulos as $key => $A) {
                                    if ($AE->Articulo === $A->Articulo) {
                                        $pdf->SetFont('Calibri', '', 9);
                                        $pdf->Row(array(
                                            $A->ControlT,
                                            $A->Articulo,
                                            utf8_decode(mb_strimwidth($A->ArticuloT, 0, 45, "")),
                                            $A->UnidadMedidaT,
                                            number_format($A->Cantidad, 2, ".", ","),
                                            ''
                                                ), 0);
                                        $TOTAL_GPO += $A->Cantidad;
                                        $TOTAL_ART += $A->Cantidad;
                                    }
                                }
                                $pdf->SetFont('Calibri', 'B', 9);
                                $pdf->Row(array(
                                    '',
                                    '',
                                    utf8_decode('Total por Artículo: '),
                                    '',
                                    number_format($TOTAL_ART, 2, ".", ","),
                                    ''
                                        ), 'T');
                            }
                        }
                        $pdf->SetFont('Calibri', 'B', 9);
                        $pdf->Row(array(
                            '',
                            '',
                            'Total por Grupo: ',
                            '',
                            number_format($TOTAL_GPO, 2, ".", ","),
                            ''
                                ), 'T');
                    }
                }
            }


            /* FIN RESUMEN */
            $path = 'uploads/Reportes/EntregaMateriales';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "ENTREGA MATERIALES POR CONTROL " . ' ' . date("d-m-Y his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/EntregaMateriales/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

    public function onImprimirReportePorAnoSemMaq() {
        $Ano = $this->input->post('Ano');
        $Sem = $this->input->post('Sem');
        $Maq = $this->input->post('Maq');

        $Deptos = $this->MaterialControlFecha_model->getDeptosArticulosByAnoMaqSem($Ano, $Sem, $Maq);
        $Grupos = $this->MaterialControlFecha_model->getGruposArticulosByAnoMaqSem($Ano, $Sem, $Maq);
        $ArticulosE = $this->MaterialControlFecha_model->getArticulosEncByAnoMaqSem($Ano, $Sem, $Maq);
        $Articulos = $this->MaterialControlFecha_model->getArticulosByAnoMaqSem($Ano, $Sem, $Maq);
        if (!empty($Deptos)) {

            $pdf = new PDF('P', 'mm', array(215.9, 279.4));
            $pdf->SetAutoPageBreak(true, 10);

            //Agregamos una hoja por cada departamento del articulo 10, 80, 90
            $Tipo = '';
            foreach ($Deptos as $key => $T) {
                switch ($T->DepartamentoArt) {
                    case '10':
                        $Tipo = '******* PIEL Y FORRO *******';
                        break;
                    case '80':
                        $Tipo = '******* SUELA *******';
                        break;
                    case '90':
                        $Tipo = '******* INDIRECTOS *******';
                        break;
                }
                $pdf->setTipo($Tipo);
                $pdf->AddPage();


                //Agregamos los Grupos
                foreach ($Grupos as $key => $G) {

                    if ($T->DepartamentoArt === $G->DepartamentoArt) {
                        $pdf->SetLineWidth(0.5);
                        $pdf->SetFont('Calibri', 'B', 9);
                        $pdf->SetX(5);
                        $pdf->Cell(15, 5, 'Grupo: ', 'B'/* BORDE */, 0, 'L');
                        $pdf->SetX(20);
                        $pdf->SetFont('Calibri', '', 9);
                        $pdf->Cell(50, 5, utf8_decode($G->ClaveGrupo . '     ' . $G->Nombre), 'B'/* BORDE */, 1, 'L');
                        $pdf->SetLineWidth(0.2);
                        $TOTAL_GPO = 0;
                        //Agregamos los articulos
                        foreach ($ArticulosE as $key => $AE) {

                            if ($T->DepartamentoArt === $AE->DepartamentoArt && $G->ClaveGrupo === $AE->ClaveGrupo) {
                                $TOTAL_ART = 0;
                                foreach ($Articulos as $key => $A) {
                                    if ($AE->Articulo === $A->Articulo && $A->ClaveGrupo === $AE->ClaveGrupo) {
                                        $pdf->SetFont('Calibri', '', 9);
                                        $pdf->Row(array(
                                            $A->ControlT,
                                            $A->Articulo,
                                            utf8_decode(mb_strimwidth($A->ArticuloT, 0, 45, "")),
                                            $A->UnidadMedidaT,
                                            number_format($A->Cantidad, 2, ".", ","),
                                            ''
                                                ), 0);
                                        $TOTAL_GPO += $A->Cantidad;
                                        $TOTAL_ART += $A->Cantidad;
                                    }
                                }
                                $pdf->SetFont('Calibri', 'B', 9);
                                $pdf->Row(array(
                                    '',
                                    '',
                                    utf8_decode('Total por Artículo: '),
                                    '',
                                    number_format($TOTAL_ART, 2, ".", ","),
                                    ''
                                        ), 'T');
                            }
                        }
                        $pdf->SetFont('Calibri', 'B', 9);
                        $pdf->Row(array(
                            '',
                            '',
                            'Total por Grupo: ',
                            '',
                            number_format($TOTAL_GPO, 2, ".", ","),
                            ''
                                ), 'T');
                    }
                }
            }


            /* FIN RESUMEN */
            $path = 'uploads/Reportes/EntregaMateriales';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "ENTREGA MATERIALES POR A-MAQ-SEM " . ' ' . date("d-m-Y his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/EntregaMateriales/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

    public function onImprimirReportePorAnoSemMaqPorDepartamento() {
        $Ano = $this->input->post('Ano');
        $Sem = $this->input->post('Sem');
        $Maq = $this->input->post('Maq');
        $Tipo = $this->input->post('Tipo');

        $Grupos = $this->MaterialControlFecha_model->getGruposArticulosByAnoMaqSemByDepto($Ano, $Sem, $Maq, $Tipo);
        $ArticulosE = $this->MaterialControlFecha_model->getArticulosEncByAnoMaqSemByDepto($Ano, $Sem, $Maq, $Tipo);
        $Articulos = $this->MaterialControlFecha_model->getArticulosByAnoMaqSemByDepto($Ano, $Sem, $Maq, $Tipo);
        if (!empty($Grupos)) {

            $pdf = new PDF('P', 'mm', array(215.9, 279.4));
            $pdf->SetAutoPageBreak(true, 10);

            //Agregamos una hoja por cada departamento del articulo 10, 80, 90

            switch ($Tipo) {
                case '10':
                    $Tipo = '******* PIEL Y FORRO *******';
                    break;
                case '80':
                    $Tipo = '******* SUELA *******';
                    break;
                case '90':
                    $Tipo = '******* INDIRECTOS *******';
                    break;
            }
            $pdf->setTipo($Tipo);
            $pdf->AddPage();


            //Agregamos los Grupos
            foreach ($Grupos as $key => $G) {

                $pdf->SetLineWidth(0.5);
                $pdf->SetFont('Calibri', 'B', 9);
                $pdf->SetX(5);
                $pdf->Cell(15, 5, 'Grupo: ', 'B'/* BORDE */, 0, 'L');
                $pdf->SetX(20);
                $pdf->SetFont('Calibri', '', 9);
                $pdf->Cell(50, 5, utf8_decode($G->ClaveGrupo . '     ' . $G->Nombre), 'B'/* BORDE */, 1, 'L');
                $pdf->SetLineWidth(0.2);
                $TOTAL_GPO = 0;
                //Agregamos los articulos
                foreach ($ArticulosE as $key => $AE) {

                    if ($G->ClaveGrupo === $AE->ClaveGrupo) {
                        $TOTAL_ART = 0;
                        foreach ($Articulos as $key => $A) {

                            if ($AE->Articulo === $A->Articulo && $A->ClaveGrupo === $AE->ClaveGrupo) {
                                $pdf->SetFont('Calibri', '', 9);
                                $pdf->Row(array(
                                    $A->ControlT,
                                    $A->Articulo,
                                    utf8_decode(mb_strimwidth($A->ArticuloT, 0, 45, "")),
                                    $A->UnidadMedidaT,
                                    number_format($A->Cantidad, 2, ".", ","),
                                    ''
                                        ), 0);
                                $TOTAL_GPO += $A->Cantidad;
                                $TOTAL_ART += $A->Cantidad;
                            }
                        }
                        $pdf->SetFont('Calibri', 'B', 9);
                        $pdf->Row(array(
                            '',
                            '',
                            utf8_decode('Total por Artículo: '),
                            '',
                            number_format($TOTAL_ART, 2, ".", ","),
                            ''
                                ), 'T');
                    }
                }
                $pdf->SetFont('Calibri', 'B', 9);
                $pdf->Row(array(
                    '',
                    '',
                    'Total por Grupo: ',
                    '',
                    number_format($TOTAL_GPO, 2, ".", ","),
                    ''
                        ), 'T');
            }

            /* FIN RESUMEN */
            $path = 'uploads/Reportes/EntregaMateriales';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "ENTREGA MATERIALES POR A-MAQ-SEM " . ' ' . date("d-m-Y his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/EntregaMateriales/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

}
