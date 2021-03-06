<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class ExplosionesPorCliente extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('ExplosionesPorCliente_model')
                ->helper('Explosiones_helper')->helper('file');
    }

    public function onReporteExplosionSemanaSuelaDesglose() {
        $Tipo = $this->input->post('Tipo');
        $Maq = $this->input->post('Maq');
        $aMaq = $this->input->post('aMaq');
        $Sem = $this->input->post('Sem');
        $aSem = $this->input->post('aSem');
        $Ano = $this->input->post('Ano');
        $Cliente = $this->input->post('ClienteExplosion');

        $cm = $this->ExplosionesPorCliente_model;
        $DatosEmpresa = $cm->getDatosEmpresa();
        $Grupos = $cm->getGruposTallas(
                $Ano, $Sem, $aSem, $Maq, $aMaq, $Cliente
        );
        $Pares = $cm->getPares(
                $Ano, $Sem, $aSem, $Maq, $aMaq, $Cliente
        );
        $Materiales = $cm->getMaterialesTallas(
                $Ano, $Sem, $aSem, $Maq, $aMaq, $Cliente
        );
        $Explosion = $cm->getExplosionMaterialesTallas(
                $Ano, $Sem, $aSem, $Maq, $aMaq, $Cliente
        );


        if (!empty($Explosion)) {

            $pdf = new PDFExpTallas('P', 'mm', array(215.9, 279.4));
            $pdf->Logo = $DatosEmpresa[0]->Logo;
            $pdf->Empresa = $DatosEmpresa[0]->Empresa;



            $pdf->Sem = $Sem;
            $pdf->aSem = $aSem;
            $pdf->Maq = $Maq;
            $pdf->aMaq = $aMaq;
            $pdf->Pares = $Pares[0]->Pares;
            $pdf->Tipo = '******* SUELA *******';
            $pdf->TipoE = $Tipo;

            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 10);

            $TOTAL_EXP = 0;
            $TOTAL_SUBT = 0;
            foreach ($Grupos as $key => $G) {

                $TOTAL_EXP_GRUPO = 0;
                $TOTAL_SUBT_GRUPO = 0;

                $pdf->SetFont('Calibri', 'B', 8);
                $pdf->SetX(5);
                $pdf->Cell(20, 5, 'Grupo: ', 0/* BORDE */, 0, 'L');
                $pdf->SetX(25);
                $pdf->SetFont('Calibri', '', 9);
                $pdf->Cell(50, 5, utf8_decode($G->Clave . '     ' . $G->Nombre), 0/* BORDE */, 1, 'L');


                foreach ($Materiales as $key => $M) {
                    $TOTAL_EXP_ART = 0;
                    $TOTAL_SUBT_ART = 0;

                    if ($G->Clave === $M->Grupo) {

                        foreach ($Explosion as $key => $D) {


                            if ($G->Clave === $M->Grupo && $D->Articulo === $M->Articulo) {

                                $pdf->SetLineWidth(0.25);
                                $pdf->SetX(5);
                                $pdf->SetFont('Calibri', '', 8);



                                $ExplosionCant = ($D->Consumo * $D->Pares);
                                $Subtotal = $ExplosionCant * $M->Precio;

                                $Exp_Acum = $D->C1;
                                $Talla = $D->T1;


                                for ($i = 1; $i < 22; $i++) {
                                    $sig = $i + 1;
                                    if ($D->{"A$i"} === $D->{"A$sig"}) {
                                        $Exp_Acum += $D->{"C$sig"};
                                    } else if ($D->{"A$sig"} === '0') {
                                        $Exp_Acum += $D->{"C$sig"};
                                        if ($Exp_Acum > 0) {
                                            $pdf->Row(array(
                                                utf8_decode($D->Articulo),
                                                mb_strimwidth(utf8_decode($D->Descripcion), 0, 35, ""),
                                                utf8_decode($D->Unidad),
                                                $Talla,
                                                number_format($Exp_Acum, 2, ".", ","),
                                                '$' . number_format($M->Precio, 2, ".", ","),
                                                '$' . number_format($Exp_Acum * $M->Precio, 2, ".", ","),
                                                '',
                                                '',
                                                ''
                                            ));
                                        }
                                    } else {
                                        if ($Exp_Acum > 0) {
                                            $pdf->Row(array(
                                                utf8_decode($D->Articulo),
                                                mb_strimwidth(utf8_decode($D->Descripcion), 0, 35, ""),
                                                utf8_decode($D->Unidad),
                                                $Talla,
                                                number_format($Exp_Acum, 2, ".", ","),
                                                '$' . number_format($M->Precio, 2, ".", ","),
                                                '$' . number_format($Exp_Acum * $M->Precio, 2, ".", ","),
                                                '',
                                                '',
                                                ''
                                            ));
                                        }
                                        $Talla = $D->{"T$sig"};
                                        $Exp_Acum = $D->{"C$sig"};
                                    }
                                }

                                $TOTAL_EXP_ART += $ExplosionCant;
                                $TOTAL_SUBT_ART += $Subtotal;
                                $TOTAL_EXP_GRUPO += $ExplosionCant;
                                $TOTAL_SUBT_GRUPO += $Subtotal;
                                $TOTAL_EXP += $ExplosionCant;
                                $TOTAL_SUBT += $Subtotal;
                            }
                        }
                        if ($TOTAL_EXP_ART > 0 && $TOTAL_SUBT_ART > 0) {
                            $pdf->SetFont('Calibri', 'B', 8);
                            $pdf->SetX(58);
                            $pdf->Cell(40, 4, 'Total por Articulo: ', 'B'/* BORDE */, 0, 'L');
                            $pdf->SetFont('Calibri', '', 8);
                            $pdf->SetX(98);
                            $pdf->Cell(14, 4, number_format($TOTAL_EXP_ART, 2, ".", ","), 'B'/* BORDE */, 0, 'R');
                            $pdf->SetX(112);
                            $pdf->Cell(15, 4, '', 'B'/* BORDE */, 0, 'R');
                            $pdf->SetX(127);
                            $pdf->Cell(15, 4, '$' . number_format($TOTAL_SUBT_ART, 2, ".", ","), 'B'/* BORDE */, 1, 'R');
                            $pdf->SetX(150);
                        }
                    }
                }

                $pdf->SetFont('Calibri', 'B', 8);
                $y = $pdf->GetY();
                $pdf->SetY($y);
                $pdf->SetX(58);
                $pdf->Cell(40, 4, 'Totales por Grupo: ', 'B'/* BORDE */, 0, 'L');
                $pdf->SetFont('Calibri', '', 8);
                $pdf->SetX(98);
                $pdf->Cell(14, 4, number_format($TOTAL_EXP_GRUPO, 2, ".", ","), 'B'/* BORDE */, 0, 'R');
                $pdf->SetX(112);
                $pdf->Cell(15, 4, '', 'B'/* BORDE */, 0, 'R');
                $pdf->SetX(127);
                $pdf->Cell(15, 4, '$' . number_format($TOTAL_SUBT_GRUPO, 2, ".", ","), 'B'/* BORDE */, 1, 'R');
            }

            $pdf->SetFont('Calibri', 'B', 8);
            $pdf->SetX(58);
            $pdf->Cell(40, 4, 'Total por Semana Maquila: ', 'B'/* BORDE */, 0, 'L');
            $pdf->SetFont('Calibri', '', 8);
            $pdf->SetX(98);
            $pdf->Cell(14, 4, number_format($TOTAL_EXP, 2, ".", ","), 'B'/* BORDE */, 0, 'R');
            $pdf->SetX(112);
            $pdf->Cell(15, 4, '', 'B'/* BORDE */, 0, 'R');
            $pdf->SetX(127);
            $pdf->Cell(15, 4, '$' . number_format($TOTAL_SUBT, 2, ".", ","), 'B'/* BORDE */, 0, 'R');


            /* FIN RESUMEN */
            $path = 'uploads/Reportes/Explosion';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "EXPLOSION MATERIALES POR CLIENTE DESGLOSE TALLAS" . ' ' . date("d-m-Y his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/Explosion/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

    public function onReporteExplosionSemanaPorCliente() {
        $Tipo = $this->input->post('Tipo');
        $Maq = $this->input->post('Maq');
        $aMaq = $this->input->post('aMaq');
        $Sem = $this->input->post('Sem');
        $aSem = $this->input->post('aSem');
        $Ano = $this->input->post('Ano');
        $SinClasif = $this->input->post('SinClasifPorCliente');

        $Cliente = $this->input->post('ClienteExplosion');




        $cm = $this->ExplosionesPorCliente_model;
        $DatosEmpresa = $cm->getDatosEmpresa();
        $Grupos = $cm->getGrupos(
                $Ano, $Sem, $aSem, $Maq, $aMaq, $Tipo, $Cliente
        );
        $Pares = $cm->getPares(
                $Ano, $Sem, $aSem, $Maq, $aMaq, $Cliente
        );
        $Materiales = $cm->getMateriales(
                $Ano, $Sem, $aSem, $Maq, $aMaq, $Tipo, $Cliente
        );
        $Explosion = $cm->getExplosionMateriales(
                $Ano, $Sem, $aSem, $Maq, $aMaq, $Tipo, $SinClasif, $Cliente
        );


        if (!empty($Explosion)) {



            $pdf = new PDF('P', 'mm', array(215.9, 279.4));
            $pdf->Logo = $DatosEmpresa[0]->Logo;
            $pdf->Empresa = $DatosEmpresa[0]->Empresa;


            switch ($Tipo) {
                case '10':
                    $TipoE = '******* PIEL Y FORRO *******';
                    break;
                case '80':
                    $TipoE = '******* SUELA *******';
                    break;
                case '90':
                    $TipoE = '******* INDIRECTOS *******';
                    break;
            }

            $pdf->Sem = $Sem;
            $pdf->aSem = $aSem;
            $pdf->Maq = $Maq;
            $pdf->aMaq = $aMaq;
            $pdf->Pares = $Pares[0]->Pares;
            $pdf->Tipo = $TipoE;
            $pdf->TipoE = $Tipo;

            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 10);

            $TOTAL_EXP = 0;
            $TOTAL_SUBT = 0;
            foreach ($Grupos as $key => $G) {

                $TOTAL_EXP_GRUPO = 0;
                $TOTAL_SUBT_GRUPO = 0;

                $pdf->SetFont('Calibri', 'B', 8);
                $pdf->SetX(5);
                $pdf->Cell(20, 5, 'Grupo: ', 0/* BORDE */, 0, 'L');
                $pdf->SetX(25);
                $pdf->SetFont('Calibri', '', 8);
                $pdf->Cell(50, 5, utf8_decode($G->Clave . '     ' . $G->Nombre), 0/* BORDE */, 1, 'L');


                foreach ($Materiales as $key => $M) {
                    $TOTAL_EXP_ART = 0;
                    $TOTAL_SUBT_ART = 0;

                    if ($G->Clave === $M->Grupo) {

                        foreach ($Explosion as $key => $D) {

                            if ($G->Clave === $M->Grupo && $D->Articulo === $M->Articulo) {

                                $pdf->SetLineWidth(0.25);
                                $pdf->SetX(5);
                                $pdf->SetFont('Calibri', '', 8);



                                switch ($Tipo) {
                                    case '10':
                                        $ExplosionCant = ($D->Consumo * $D->Pares) * ($D->Desperdicio + 1);
                                        break;
                                    case '80':
                                        $ExplosionCant = ($D->Consumo * $D->Pares);
                                        break;
                                    case '90':
                                        $ExplosionCant = ($D->Consumo * $D->Pares);
                                        break;
                                }


                                $Subtotal = $ExplosionCant * $D->Precio;
                                $Porcentaje = $D->Pares * 100 / $Pares[0]->Pares;
                                $PorcentajeSuelas = ($Tipo === '80') ? number_format($Porcentaje, 2, ".", ",") . '%' : '';
                                $pdf->Row(array(
                                    utf8_decode($D->Articulo),
                                    mb_strimwidth(utf8_decode($D->Descripcion), 0, 40, ""),
                                    utf8_decode($D->Clasificacion),
                                    utf8_decode($D->Unidad),
                                    number_format($ExplosionCant, 2, ".", ","),
                                    '$' . number_format($D->Precio, 2, ".", ","),
                                    '$' . number_format($Subtotal, 2, ".", ","),
                                    $PorcentajeSuelas,
                                    '',
                                    '',
                                ));

                                $TOTAL_EXP_ART += $ExplosionCant;
                                $TOTAL_SUBT_ART += $Subtotal;
                                $TOTAL_EXP_GRUPO += $ExplosionCant;
                                $TOTAL_SUBT_GRUPO += $Subtotal;
                                $TOTAL_EXP += $ExplosionCant;
                                $TOTAL_SUBT += $Subtotal;
                            }
                        }

                        switch ($Tipo) {
                            case '10':
                                if ($SinClasif === '0') {
                                    $pdf->SetFont('Calibri', 'B', 8);
                                    $pdf->SetX(59);
                                    $pdf->Cell(40, 4, 'Total por Articulo: ', 'B'/* BORDE */, 0, 'L');
                                    $pdf->SetFont('Calibri', '', 8);
                                    $pdf->SetX(99);
                                    $pdf->Cell(14, 4, number_format($TOTAL_EXP_ART, 2, ".", ","), 'B'/* BORDE */, 0, 'R');
                                    $pdf->SetX(113);
                                    $pdf->Cell(17, 4, '', 'B'/* BORDE */, 0, 'R');
                                    $pdf->SetX(130);
                                    $pdf->Cell(15, 4, '$' . number_format($TOTAL_SUBT_ART, 2, ".", ","), 'B'/* BORDE */, 1, 'R');
                                    $pdf->SetX(150);
                                }
                                break;
                            case '80':
                                break;
                            case '90':
                                break;
                        }
                    }
                }
                $COSTO = $TOTAL_EXP_GRUPO / $Pares[0]->Pares;

                $pdf->SetFont('Calibri', 'B', 8);
                $y = $pdf->GetY();
                $pdf->SetY($y);
                $pdf->SetX(59);
                $pdf->Cell(40, 4, 'Totales por Grupo: ', 'B'/* BORDE */, 0, 'L');
                $pdf->SetFont('Calibri', '', 8);
                $pdf->SetX(99);
                $pdf->Cell(14, 4, number_format($TOTAL_EXP_GRUPO, 2, ".", ","), 'B'/* BORDE */, 0, 'R');
                $pdf->SetX(113);
                $pdf->Cell(17, 4, '', 'B'/* BORDE */, 0, 'R');
                $pdf->SetX(130);
                $pdf->Cell(15, 4, '$' . number_format($TOTAL_SUBT_GRUPO, 2, ".", ","), 'B'/* BORDE */, 0, 'R');
                if ($Tipo !== '80') {
                    $pdf->SetX(150);
                    $pdf->SetFont('Calibri', 'B', 8);
                    $pdf->Cell(15, 4, 'Costo:', 'B'/* BORDE */, 0, 'L');
                    $pdf->SetX(165);
                    $pdf->SetFont('Calibri', '', 8);
                    $pdf->Cell(15, 4, number_format($COSTO, 2, ".", ","), 'B'/* BORDE */, 1, 'L');
                } else {
                    $pdf->Cell(15, 4, '', 0/* BORDE */, 1, 'L');
                }
            }

            $pdf->SetFont('Calibri', 'B', 8);
            $pdf->SetX(59);
            $pdf->Cell(40, 4, 'Total por Semana Maquila: ', 'B'/* BORDE */, 0, 'L');
            $pdf->SetFont('Calibri', '', 8);
            $pdf->SetX(99);
            $pdf->Cell(14, 4, number_format($TOTAL_EXP, 2, ".", ","), 'B'/* BORDE */, 0, 'R');
            $pdf->SetX(113);
            $pdf->Cell(17, 4, '', 'B'/* BORDE */, 0, 'R');
            $pdf->SetX(130);
            $pdf->Cell(15, 4, '$' . number_format($TOTAL_SUBT, 2, ".", ","), 'B'/* BORDE */, 0, 'R');


            /* FIN RESUMEN */
            $path = 'uploads/Reportes/Explosion';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "EXPLOSION MATERIALES POR CLIENTE " . ' ' . date("d-m-Y his");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/Explosion/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

}
