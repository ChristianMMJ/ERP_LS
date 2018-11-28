<?php

class PDFAntiguedadProv extends FPDF {

    public $Proveedor;
    public $Aproveedor;
    public $fecha;
    public $Afecha;

    function getFecha() {
        return $this->fecha;
    }

    function getAfecha() {
        return $this->Afecha;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setAfecha($Afecha) {
        $this->Afecha = $Afecha;
    }

    function getProveedor() {
        return $this->Proveedor;
    }

    function getAproveedor() {
        return $this->Aproveedor;
    }

    function setProveedor($Proveedor) {
        $this->Proveedor = $Proveedor;
    }

    function setAproveedor($Aproveedor) {
        $this->Aproveedor = $Aproveedor;
    }

    function Header() {

        $this->AddFont('Calibri', '');
        $this->AddFont('Calibri', 'I');
        $this->AddFont('Calibri', 'B');
        $this->AddFont('Calibri', 'BI');
        $this->Image($_SESSION["LOGO"], /* LEFT */ 5, 5/* TOP */, /* ANCHO */ 30);
        $this->SetFont('Calibri', 'B', 11);
        $this->SetY(5);
        $this->SetX(36);
        $this->Cell(60, 4, utf8_decode($_SESSION["EMPRESA_RAZON"]), 0/* BORDE */, 1, 'L');
        $this->SetFont('Calibri', 'B', 10);
        $this->SetX(36);
        $this->Cell(50, 4, utf8_decode("Antigüedad de Saldos del Proveedor: "), 0/* BORDE */, 0, 'L');



        $this->SetX(90);
        $this->SetFont('Calibri', '', 10);
        $this->Cell(10, 4, utf8_decode($this->getProveedor()), 0/* BORDE */, 0, 'C');

        $this->SetX(100);
        $this->SetFont('Calibri', 'B', 10);
        $this->Cell(10, 4, 'Al: ', 0/* BORDE */, 0, 'C');
        $this->SetX(110);
        $this->SetFont('Calibri', '', 10);
        $this->Cell(10, 4, utf8_decode($this->getAproveedor()), 0/* BORDE */, 1, 'C');

        $this->SetX(36);
        $this->SetFont('Calibri', 'B', 10);
        $this->Cell(10, 4, utf8_decode("Del: "), 0/* BORDE */, 0, 'L');
        $this->SetX(46);
        $this->SetFont('Calibri', '', 10);
        $this->Cell(25, 4, utf8_decode($this->getFecha()), 0/* BORDE */, 0, 'C');


        $this->SetX(71);
        $this->SetFont('Calibri', 'B', 10);
        $this->Cell(10, 4, 'Al: ', 0/* BORDE */, 0, 'C');
        $this->SetX(81);
        $this->SetFont('Calibri', '', 10);
        $this->Cell(25, 4, utf8_decode($this->getAfecha()), 0/* BORDE */, 1, 'C');


        //Paginador
        $this->SetY(3);
        $this->SetX(265);
        // Select Calibri italic 8
        $this->SetFont('Calibri', 'I', 8);
        // Print centered page number
        $this->Cell(20, 4, utf8_decode('Pag. ' . $this->PageNo() . ' de {totalPages}'), 0/* BORDE */, 1, 'C');

        $this->SetY(7);
        $this->SetX(245);
        $this->SetFont('Calibri', 'B', 10);
        $this->Cell(30, 4, utf8_decode("Fecha: " . date("d-m-Y     h:i:s a")), 0/* BORDE */, 1, 'R');
        $this->AliasNbPages(' {totalPages}');



        $this->SetFont('Calibri', 'B', 9);
        $this->SetY(22);
        $this->SetX(5);

        $this->Cell(45, 4, utf8_decode('Proveedor'), 'B'/* BORDE */, 0, 'L');
        $this->SetX(50);
        $this->Cell(10, 4, utf8_decode('Plazo'), 'B'/* BORDE */, 1, 'R');

        $this->SetY(22);
        $this->SetX(60);

        /* ENCABEZADO DETALLE TITULOS */
        $anchos = array(6/* 1 */, 14/* 2 */, 16/* 3 */, 19/* 4 */, 18/* 5 */, 19/* 6 */, 10/* 7 */, 19/* 8 */, 19/* 9 */, 19/* 10 */, 19/* 11 */, 19/* 12 */, 18/* 13 */);
        $aligns = array('C', 'C', 'C', 'R', 'R', 'R', 'C', 'R', 'R', 'R', 'R', 'R', 'R');
        $this->SetWidths($anchos);
        $this->SetAligns($aligns);

        $this->SetFont('Calibri', 'B', 8.5);
        $this->Row(array('Tp', 'Doc', 'Fecha', 'Importe', 'Pagos', 'Saldo', 'Dias', 'de 0 a 7', 'de 8 a 15', 'de 16 a 30', 'de 31 a 45', 'de 46 a 60', 'Mas de 60'));


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
        $this->SetX(60);

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
        $this->SetX(60);

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

class PDFEdoCtaProv extends FPDF {

    public $Proveedor;
    public $Aproveedor;

    function getProveedor() {
        return $this->Proveedor;
    }

    function getAproveedor() {
        return $this->Aproveedor;
    }

    function setProveedor($Proveedor) {
        $this->Proveedor = $Proveedor;
    }

    function setAproveedor($Aproveedor) {
        $this->Aproveedor = $Aproveedor;
    }

    function Header() {

        $this->AddFont('Calibri', '');
        $this->AddFont('Calibri', 'I');
        $this->AddFont('Calibri', 'B');
        $this->AddFont('Calibri', 'BI');
        $this->Image($_SESSION["LOGO"], /* LEFT */ 5, 5/* TOP */, /* ANCHO */ 30);
        $this->SetFont('Calibri', 'B', 11);
        $this->SetY(5);
        $this->SetX(36);
        $this->Cell(60, 4, utf8_decode($_SESSION["EMPRESA_RAZON"]), 0/* BORDE */, 1, 'L');
        $this->SetFont('Calibri', 'B', 10);
        $this->SetX(36);
        $this->Cell(50, 4, utf8_decode("Estado de Cuenta del Proveedor: "), 0/* BORDE */, 0, 'L');


        $this->SetX(86);
        $this->SetFont('Calibri', '', 10);
        $this->Cell(10, 4, utf8_decode($this->getProveedor()), 0/* BORDE */, 0, 'C');

        $this->SetX(96);
        $this->SetFont('Calibri', 'B', 10);
        $this->Cell(10, 4, 'Al: ', 0/* BORDE */, 0, 'C');
        $this->SetX(106);
        $this->SetFont('Calibri', '', 10);
        $this->Cell(10, 4, utf8_decode($this->getAproveedor()), 0/* BORDE */, 1, 'C');


        //Paginador
        $this->SetY(3);
        $this->SetX(200);
        // Select Calibri italic 8
        $this->SetFont('Calibri', 'I', 8);
        // Print centered page number
        $this->Cell(20, 4, utf8_decode('Pag. ' . $this->PageNo() . ' de {totalPages}'), 0/* BORDE */, 1, 'C');

        $this->SetY(7);
        $this->SetX(180);
        $this->SetFont('Calibri', 'B', 10);
        $this->Cell(30, 4, utf8_decode("Fecha: " . date("d-m-Y     h:i:s a")), 0/* BORDE */, 1, 'R');
        $this->AliasNbPages(' {totalPages}');


        $this->SetY(22);
        $this->SetX(5);

        $this->Cell(70, 4, utf8_decode('Proveedor'), 'B'/* BORDE */, 0, 'L');
        $this->SetX(75);
        $this->Cell(15, 4, utf8_decode('Plazo'), 'B'/* BORDE */, 1, 'L');

        $this->SetY(22);
        $this->SetX(90);

        /* ENCABEZADO DETALLE TITULOS */
        $anchos = array(10/* 1 */, 18/* 2 */, 17/* 3 */, 19/* 4 */, 20/* 5 */, 20/* 6 */, 15/* 7 */);
        $aligns = array('L', 'L', 'L', 'R', 'R', 'R', 'R');
        $this->SetWidths($anchos);
        $this->SetAligns($aligns);


        $this->Row(array('Tp', 'Docto', 'Fecha', 'Importe', 'Pagos', 'Saldo', 'Dias'));
        $aligns = array('L', 'L', 'L', 'R', 'R', 'R', 'R');
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
        $this->SetX(90);

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
        $this->SetX(90);

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

class PDFEdoCtaProvSinDesgloce extends FPDF {

    public $Proveedor;
    public $Aproveedor;

    function getProveedor() {
        return $this->Proveedor;
    }

    function getAproveedor() {
        return $this->Aproveedor;
    }

    function setProveedor($Proveedor) {
        $this->Proveedor = $Proveedor;
    }

    function setAproveedor($Aproveedor) {
        $this->Aproveedor = $Aproveedor;
    }

    function Header() {

        $this->AddFont('Calibri', '');
        $this->AddFont('Calibri', 'I');
        $this->AddFont('Calibri', 'B');
        $this->AddFont('Calibri', 'BI');
        $this->Image($_SESSION["LOGO"], /* LEFT */ 5, 5/* TOP */, /* ANCHO */ 30);
        $this->SetFont('Calibri', 'B', 11);
        $this->SetY(5);
        $this->SetX(36);
        $this->Cell(60, 4, utf8_decode($_SESSION["EMPRESA_RAZON"]), 0/* BORDE */, 1, 'L');
        $this->SetFont('Calibri', 'B', 10);
        $this->SetX(36);
        $this->Cell(50, 4, utf8_decode("Estado de Cuenta del Proveedor: "), 0/* BORDE */, 0, 'L');


        $this->SetX(86);
        $this->SetFont('Calibri', '', 10);
        $this->Cell(10, 4, utf8_decode($this->getProveedor()), 0/* BORDE */, 0, 'C');

        $this->SetX(96);
        $this->SetFont('Calibri', 'B', 10);
        $this->Cell(10, 4, 'Al: ', 0/* BORDE */, 0, 'C');
        $this->SetX(106);
        $this->SetFont('Calibri', '', 10);
        $this->Cell(10, 4, utf8_decode($this->getAproveedor()), 0/* BORDE */, 1, 'C');


        //Paginador
        $this->SetY(3);
        $this->SetX(200);
        // Select Calibri italic 8
        $this->SetFont('Calibri', 'I', 8);
        // Print centered page number
        $this->Cell(20, 4, utf8_decode('Pag. ' . $this->PageNo() . ' de {totalPages}'), 0/* BORDE */, 1, 'C');

        $this->SetY(7);
        $this->SetX(180);
        $this->SetFont('Calibri', 'B', 10);
        $this->Cell(30, 4, utf8_decode("Fecha: " . date("d-m-Y     h:i:s a")), 0/* BORDE */, 1, 'R');
        $this->AliasNbPages(' {totalPages}');


        $this->SetY(22);
        $this->SetX(5);

        $this->Cell(70, 4, utf8_decode('Proveedor'), 'B'/* BORDE */, 0, 'L');
        $this->SetX(75);
        $this->Cell(15, 4, utf8_decode('Plazo'), 'B'/* BORDE */, 1, 'L');

        $this->SetY(22);
        $this->SetX(90);

        /* ENCABEZADO DETALLE TITULOS */
        $anchos = array(10/* 1 */, 18/* 2 */, 17/* 3 */, 19/* 4 */, 20/* 5 */, 20/* 6 */, 15/* 7 */);
        $aligns = array('L', 'L', 'L', 'R', 'R', 'R', 'R');
        $this->SetWidths($anchos);
        $this->SetAligns($aligns);


        $this->Row(array('', '', '', 'Importe', 'Pagos', 'Saldo', ''));
        $aligns = array('L', 'L', 'L', 'R', 'R', 'R', 'R');
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
        $this->SetX(90);

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
        $this->SetX(90);

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
