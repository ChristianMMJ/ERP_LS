<?php

class PDFExpTallas extends FPDF {

    public $Sem;
    public $aSem;
    public $Maq;
    public $aMaq;
    public $Tipo;
    public $Pares;
    public $TipoE;

    function getTipoE() {
        return $this->TipoE;
    }

    function setTipoE($TipoE) {
        $this->TipoE = $TipoE;
    }

    function getSem() {
        return $this->Sem;
    }

    function getASem() {
        return $this->aSem;
    }

    function getMaq() {
        return $this->Maq;
    }

    function getAMaq() {
        return $this->aMaq;
    }

    function getTipo() {
        return $this->Tipo;
    }

    function getPares() {
        return $this->Pares;
    }

    function setSem($Sem) {
        $this->Sem = $Sem;
    }

    function setASem($aSem) {
        $this->aSem = $aSem;
    }

    function setMaq($Maq) {
        $this->Maq = $Maq;
    }

    function setAMaq($aMaq) {
        $this->aMaq = $aMaq;
    }

    function setTipo($Tipo) {
        $this->Tipo = $Tipo;
    }

    function setPares($Pares) {
        $this->Pares = $Pares;
    }

    function Header() {
        $this->AddFont('Calibri', '');
        $this->AddFont('Calibri', 'I');
        $this->AddFont('Calibri', 'B');
        $this->AddFont('Calibri', 'BI');
        $this->Image($_SESSION["LOGO"], /* LEFT */ 5, 5/* TOP */, /* ANCHO */ 30);
        $this->SetFont('Calibri', 'B', 10);
        $this->SetY(5);
        $this->SetX(36);
        $this->Cell(60, 4, utf8_decode($_SESSION["EMPRESA_RAZON"]), 0/* BORDE */, 1, 'L');
        $this->SetFont('Calibri', 'B', 9);
        $this->SetX(36);
        $this->Cell(60, 4, utf8_decode("Explosion de materiales de la semana: "), 0/* BORDE */, 1, 'L');
        $this->SetX(64.5);
        $this->Cell(25, 4, utf8_decode("De la maquila:"), 0/* BORDE */, 1, 'R');
        $this->SetX(64.5);
        $this->Cell(25, 4, utf8_decode("Tipo Explosión:"), 0/* BORDE */, 1, 'R');

        $this->SetY(9);
        $this->SetX(95);
        $this->Cell(25, 4, utf8_decode("a la semana:"), 0/* BORDE */, 1, 'R');
        $this->SetY(13);
        $this->SetX(95);
        $this->Cell(25, 4, utf8_decode("a la maquila:"), 0/* BORDE */, 1, 'R');

        $this->SetY(11);
        $this->SetX(175);
        $this->Cell(20, 4, utf8_decode("Pares: "), 0/* BORDE */, 0, 'R');
        $this->SetX(195);
        $this->SetFont('Calibri', '', 9);
        $this->Cell(20, 4, $this->getPares(), 0/* BORDE */, 1, 'L');


        $this->SetY(9);
        $this->SetX(90);
        $this->Cell(11, 4, $this->getSem(), 0/* BORDE */, 1, 'C');
        $this->SetY(13);
        $this->SetX(90);
        $this->Cell(11, 4, $this->getMaq(), 0/* BORDE */, 1, 'C');

        $this->SetY(9);
        $this->SetX(120);
        $this->Cell(11, 4, $this->getASem(), 0/* BORDE */, 1, 'C');
        $this->SetY(13);
        $this->SetX(120);
        $this->Cell(11, 4, $this->getAMaq(), 0/* BORDE */, 1, 'C');

        $this->SetFont('Calibri', 'B', 9);
        $this->SetY(17);
        $this->SetX(90);
        $this->Cell(40, 4, $this->getTipo(), 0/* BORDE */, 1, 'C');



        //Paginador
        $this->SetY(3);
        $this->SetX(200);
        // Select Calibri italic 8
        $this->SetFont('Calibri', 'I', 8);
        // Print centered page number
        $this->Cell(20, 4, utf8_decode('Pag. ' . $this->PageNo() . ' de {totalPages}'), 0/* BORDE */, 1, 'C');

        $this->SetY(7);
        $this->SetX(180);
        $this->SetFont('Calibri', 'B', 9);
        $this->Cell(30, 4, utf8_decode("Fecha: " . Date("d-m-Y     h:i:s a")), 0/* BORDE */, 1, 'R');
        $this->AliasNbPages('{totalPages}');



        /* ENCABEZADO DETALLE TITULOS */
        $anchos = array(
            0/* ClaveArt */,
            75/* Articulo */,
            10/* UM */,
            10/* Tallas */,
            15/* Explosion */,
            15/* Precio */,
            15/* Subtotal */,
            20/* Requerido */,
            25/* 1raEnt */,
            20/* 2daEnt */);
        $aligns = array('L', 'L', 'L', 'L', 'L', 'C', 'L', 'C', 'C', 'R');

        $this->SetY(25);
        $this->SetX(5);
        $this->SetFont('Calibri', 'B', 8.5);
        $this->SetWidths($anchos);
        $this->SetAligns($aligns);
        $this->Row(array('',
            utf8_decode('Artículo'),
            'U.M.',
            'Tallas',
            utf8_decode('Explosión'),
            'Precio', 'Subtotal', 'Requerido',
            '1ra Entrega', '2da Entrega'));

        $anchos = array(10/* ClaveArt */, 65/* Articulo */, 7/* UM */, 13/* Tallas */, 12/* Explosion */,
            15/* Precio */, 15/* Subtotal */, 22/* Requerido */, 23/* 1raEnt */, 23/* 2daEnt */);
        $aligns = array('R', 'L', 'L', 'C', 'R', 'R', 'R', 'C', 'L', 'L');
        $this->SetAligns($aligns);
        $this->SetWidths($anchos);
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

class PDF extends FPDF {

    public $Sem;
    public $aSem;
    public $Maq;
    public $aMaq;
    public $Tipo;
    public $Pares;
    public $TipoE;

    function getTipoE() {
        return $this->TipoE;
    }

    function setTipoE($TipoE) {
        $this->TipoE = $TipoE;
    }

    function getSem() {
        return $this->Sem;
    }

    function getASem() {
        return $this->aSem;
    }

    function getMaq() {
        return $this->Maq;
    }

    function getAMaq() {
        return $this->aMaq;
    }

    function getTipo() {
        return $this->Tipo;
    }

    function getPares() {
        return $this->Pares;
    }

    function setSem($Sem) {
        $this->Sem = $Sem;
    }

    function setASem($aSem) {
        $this->aSem = $aSem;
    }

    function setMaq($Maq) {
        $this->Maq = $Maq;
    }

    function setAMaq($aMaq) {
        $this->aMaq = $aMaq;
    }

    function setTipo($Tipo) {
        $this->Tipo = $Tipo;
    }

    function setPares($Pares) {
        $this->Pares = $Pares;
    }

    function Header() {
        $this->AddFont('Calibri', '');
        $this->AddFont('Calibri', 'I');
        $this->AddFont('Calibri', 'B');
        $this->AddFont('Calibri', 'BI');
        $this->Image($_SESSION["LOGO"], /* LEFT */ 5, 5/* TOP */, /* ANCHO */ 30);
        $this->SetFont('Calibri', 'B', 10);
        $this->SetY(5);
        $this->SetX(36);
        $this->Cell(60, 4, utf8_decode($_SESSION["EMPRESA_RAZON"]), 0/* BORDE */, 1, 'L');
        $this->SetFont('Calibri', 'B', 9);
        $this->SetX(36);
        $this->Cell(60, 4, utf8_decode("Explosion de materiales de la semana: "), 0/* BORDE */, 1, 'L');
        $this->SetX(64.5);
        $this->Cell(25, 4, utf8_decode("De la maquila:"), 0/* BORDE */, 1, 'R');
        $this->SetX(64.5);
        $this->Cell(25, 4, utf8_decode("Tipo Explosión:"), 0/* BORDE */, 1, 'R');

        $this->SetY(9);
        $this->SetX(95);
        $this->Cell(25, 4, utf8_decode("a la semana:"), 0/* BORDE */, 1, 'R');
        $this->SetY(13);
        $this->SetX(95);
        $this->Cell(25, 4, utf8_decode("a la maquila:"), 0/* BORDE */, 1, 'R');

        $this->SetY(11);
        $this->SetX(175);
        $this->Cell(20, 4, utf8_decode("Pares: "), 0/* BORDE */, 0, 'R');
        $this->SetX(195);
        $this->SetFont('Calibri', '', 9);
        $this->Cell(20, 4, $this->getPares(), 0/* BORDE */, 1, 'L');


        $this->SetY(9);
        $this->SetX(90);
        $this->Cell(11, 4, $this->getSem(), 0/* BORDE */, 1, 'C');
        $this->SetY(13);
        $this->SetX(90);
        $this->Cell(11, 4, $this->getMaq(), 0/* BORDE */, 1, 'C');

        $this->SetY(9);
        $this->SetX(120);
        $this->Cell(11, 4, $this->getASem(), 0/* BORDE */, 1, 'C');
        $this->SetY(13);
        $this->SetX(120);
        $this->Cell(11, 4, $this->getAMaq(), 0/* BORDE */, 1, 'C');

        $this->SetFont('Calibri', 'B', 9);
        $this->SetY(17);
        $this->SetX(90);
        $this->Cell(40, 4, $this->getTipo(), 0/* BORDE */, 1, 'C');



        //Paginador
        $this->SetY(3);
        $this->SetX(200);
        // Select Calibri italic 8
        $this->SetFont('Calibri', 'I', 8);
        // Print centered page number
        $this->Cell(20, 4, utf8_decode('Pag. ' . $this->PageNo() . ' de {totalPages}'), 0/* BORDE */, 1, 'C');

        $this->SetY(7);
        $this->SetX(180);
        $this->SetFont('Calibri', 'B', 9);
        $this->Cell(30, 4, utf8_decode("Fecha: " . date("d-m-Y     h:i:s a")), 0/* BORDE */, 1, 'R');
        $this->AliasNbPages('{totalPages}');



        /* ENCABEZADO DETALLE TITULOS */
        $anchos = array(
            0/* ClaveArt */,
            80/* Articulo */,
            0/* Clasif */,
            15/* UM */,
            15/* Explosion */,
            15/* Precio */,
            15/* Subtotal */,
            20/* Requerido */,
            25/* 1raEnt */,
            20/* 2daEnt */);
        $aligns = array('L', 'L', 'L', 'L', 'L', 'C', 'L', 'C', 'C', 'R');

        $this->SetY(25);
        $this->SetX(5);
        $this->SetFont('Calibri', 'B', 8.5);
        $this->SetWidths($anchos);
        $this->SetAligns($aligns);
        if ($this->getTipoE() === '80') {
            $this->Row(array('',
                utf8_decode('Artículo'),
                '',
                'U.M.',
                utf8_decode('Explosión'),
                'Precio', 'Subtotal', '%',
                '', ''));
        } else {
            $this->Row(array('',
                utf8_decode('Artículo'),
                '',
                'U.M.',
                utf8_decode('Explosión'),
                'Precio', 'Subtotal', 'Requerido',
                '1ra Entrega', '2da Entrega'));
        }
        $anchos = array(
            10/* ClaveArt */,
            63/* Articulo */,
            7/* Clasif */,
            15/* UM */,
            12/* Explosion */,
            15/* Precio */,
            15/* Subtotal */,
            22/* Requerido */,
            23/* 1raEnt */,
            23/* 2daEnt */);
        $aligns = array('R', 'L', 'L', 'L', 'R', 'R', 'R', 'C', 'L', 'L');
        $this->SetAligns($aligns);
        $this->SetWidths($anchos);
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
