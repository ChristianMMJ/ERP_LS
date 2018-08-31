<?php

class PDF extends FPDF {

    public $Logo;
    public $Empresa;
    public $Estilo;
    public $Clinea;
    public $Dlinea;
    public $Ccolor;
    public $Dcolor;
    public $Maquila;
    public $desperdicio;

    function getDesperdicio() {
        return $this->desperdicio;
    }

    function setDesperdicio($desperdicio) {
        $this->desperdicio = $desperdicio;
    }

    function getMaquila() {
        return $this->Maquila;
    }

    function setMaquila($Maquila) {
        $this->Maquila = $Maquila;
    }

    function getCcolor() {
        return $this->Ccolor;
    }

    function getDcolor() {
        return $this->Dcolor;
    }

    function setCcolor($Ccolor) {
        $this->Ccolor = $Ccolor;
    }

    function setDcolor($Dcolor) {
        $this->Dcolor = $Dcolor;
    }

    function getLogo() {
        return $this->Logo;
    }

    function getEmpresa() {
        return $this->Empresa;
    }

    function setLogo($Logo) {
        $this->Logo = $Logo;
    }

    function setEmpresa($Empresa) {
        $this->Empresa = $Empresa;
    }

    function getEstilo() {
        return $this->Estilo;
    }

    function getClinea() {
        return $this->Clinea;
    }

    function getDlinea() {
        return $this->Dlinea;
    }

    function setEstilo($Estilo) {
        $this->Estilo = $Estilo;
    }

    function setClinea($Clinea) {
        $this->Clinea = $Clinea;
    }

    function setDlinea($Dlinea) {
        $this->Dlinea = $Dlinea;
    }

    function Header() {

        $this->Image($this->getLogo(), /* LEFT */ 5, 5/* TOP */, /* ANCHO */ 30);
        $this->SetFont('Arial', 'B', 9);
        $this->SetY(4);
        $this->SetX(40);
        $this->Cell(110, 4, utf8_decode($this->getEmpresa()), 0/* BORDE */, 1, 'L');
        $this->SetY(8);
        $this->SetX(170);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(100, 3, utf8_decode("Fecha. " . Date('d/m/Y')), 0/* BORDE */, 1, 'L');
        $this->SetY(9);
        $this->SetX(40);
        $this->SetFont('Arial', 'B', 7);
        $this->Cell(12, 3, utf8_decode("Linea: "), 0/* BORDE */, 1, 'L');
        $this->SetY(9);
        $this->SetX(50);
        $this->SetFont('Arial', '', 7);
        $this->Cell(30, 3, utf8_decode($this->getClinea() . ' - ' . $this->getDlinea()), 0/* BORDE */, 1, 'L');
        $this->SetFont('Arial', 'B', 7);
        $this->SetY(12);
        $this->SetX(40);
        $this->Cell(15, 3, utf8_decode("Estilo: "), 0/* BORDE */, 1, 'L');
        $this->SetY(12);
        $this->SetX(50);
        $this->SetFont('Arial', '', 7);
        $this->Cell(15, 3, utf8_decode($this->getEstilo()), 0/* BORDE */, 1, 'L');
        $this->SetFont('Arial', 'B', 7);
        $this->SetY(15);
        $this->SetX(40);
        $this->Cell(15, 3, utf8_decode("Color: "), 0/* BORDE */, 0, 'L');
        $this->SetY(15);
        $this->SetX(50);
        $this->SetFont('Arial', '', 7);
        $this->Cell(15, 3, utf8_decode($this->getCcolor() . ' - ' . $this->getDcolor()), 0/* BORDE */, 0, 'L');
        $this->SetFont('Arial', 'B', 7);
        $this->SetY(18);
        $this->SetX(40);
        $this->Cell(15, 3, utf8_decode("Maq: "), 0/* BORDE */, 0, 'L');
        $this->SetY(18);
        $this->SetX(50);
        $this->SetFont('Arial', '', 7);
        $this->Cell(15, 3, utf8_decode($this->getMaquila()), 0/* BORDE */, 0, 'L');
        $this->SetFont('Arial', 'B', 7);
        $this->SetY(12);
        $this->SetX(123);
        $this->Cell(15, 3, utf8_decode("% Desperdicio: ." . $this->getDesperdicio()), 0/* BORDE */, 0, 'L');

        $this->Rect(39, 8, 110, 14);

        $this->AliasNbPages('{totalPages}');
        // Go to 1.5 cm from bottom
        $this->SetY(3);
        $this->SetX(190);
        // Select Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Print centered page number
        $this->SetTextColor(0, 0, 0);
        $this->Cell(35, 3, utf8_decode('Pag. ' . $this->PageNo() . ' de {totalPages}'), 0, 0, 'R');


        /* ENCABEZADO DETALLE TITULOS */
        $anchos = array(45/* 0 */, 55/* 1 */, 15/* 2 */, 15/* 3 */, 20/* 4 */, 15/* 5 */, 30/* 6 */, 10/* 7 */);
        $aligns = array('L', 'L', 'L', 'L', 'L', 'L', 'L', 'L');

        $this->SetY(25);
        $this->SetX(5);
        $this->SetFont('Arial', 'B', 7.5);
        $this->SetWidths($anchos);
        $this->SetAligns($aligns);
        $this->Row(array(
            'Pieza',
            utf8_decode('Artículo'),
            'U.M',
            'Precio',
            'Consumo',
            'Costo',
            'Consumo y Costo',
            '.' . $this->getDesperdicio()));
    }

    function Footer() {
        $margen_firmas = 10;
        $this->SetFont('Arial', 'B', 8.5);
        $this->SetY(260);
        $this->SetX($margen_firmas);
        $this->Cell(35, 4, utf8_decode('Elaboró'), 'T'/* BORDE */, 0, 'C');

        $this->SetX($margen_firmas += 40);
        $this->Cell(35, 4, utf8_decode('Elaboró'), 'T'/* BORDE */, 0, 'C');

        $this->SetX($margen_firmas += 40);
        $this->Cell(35, 4, utf8_decode('Elaboró'), 'T'/* BORDE */, 0, 'C');

        $this->SetX($margen_firmas += 40);
        $this->Cell(35, 4, utf8_decode('Elaboró'), 'T'/* BORDE */, 0, 'C');

        $this->SetX($margen_firmas += 40);
        $this->Cell(35, 4, utf8_decode('Elaboró'), 'T'/* BORDE */, 0, 'C');


        $this->SetY(272);
        $this->SetX(70);
        $this->Cell(80, 4, utf8_decode('DIRECCIÓN'), 'T'/* BORDE */, 0, 'C');
    }

    var $widths;
    var $aligns;
    var $x;

    function SetWidths($w) {
        //Set the array of column widths
        $this->widths = $w;
    }

    function SetAligns($a) {
        //Set the array of column alignments
        $this->aligns = $a;
    }

    function SetMarginLeft($x) {
        //Set margin left where the row inits
        $this->x = $x;
    }

    function Row($data) {
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++)
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        $h = 4 * $nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);

        //Se pone para que depues de insertar una pagina establezca la posicion en X = 5
        $this->SetX(5);

        //Draw the cells of the row
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border
            //$this->Rect($x, $y, $w, $h);
            //Print the text
            $this->MultiCell($w, 4, $data[$i], 'B', $a);
            //Put the position to the right of the cell
            $this->SetXY($x + $w, $y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function RowX($data) {
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++)
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        $h = 4 * $nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);

        //Se pone para que depues de insertar una pagina establezca la posicion en X = 5
        $this->SetX($this->x);

        //Draw the cells of the row
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border
            //$this->Rect($x, $y, $w, $h);
            //Print the text
            $this->MultiCell($w, 4, $data[$i], 'B', $a);
            //Put the position to the right of the cell
            $this->SetXY($x + $w, $y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function RowNoBorder($data) {
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++)
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        $h = 4 * $nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);

        //Se pone para que depues de insertar una pagina establezca la posicion en X = 5
        $this->SetX($this->x);

        //Draw the cells of the row
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border
            //$this->Rect($x, $y, $w, $h);
            //Print the text
            $this->MultiCell($w, 4, $data[$i], 0, $a);
            //Put the position to the right of the cell
            $this->SetXY($x + $w, $y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h) {
        //If the height h would cause an overflow, add a new page immediately
        if ($this->GetY() + $h > $this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w, $txt) {
        //Computes the number of lines a MultiCell of width w will take
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 and $s[$nb - 1] == "\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ')
                $sep = $i;
            $l += $cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                } else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else
                $i++;
        }
        return $nl;
    }

}
