<?php

class PDF extends FPDF {

    public $Logo;
    public $Empresa;
    public $Direccion;
    public $Direccion2;
    public $FechaOrden;
    public $FechaCaptura;
    public $ClaveProveedor;
    public $Proveedor;
    public $Observaciones;
    public $ConsignarA;
    public $Folio;
    public $Estatus;

    function getEstatus() {
        return $this->Estatus;
    }

    function setEstatus($Estatus) {
        $this->Estatus = $Estatus;
    }

    function getConsignarA() {
        return $this->ConsignarA;
    }

    function getFolio() {
        return $this->Folio;
    }

    function setConsignarA($ConsignarA) {
        $this->ConsignarA = $ConsignarA;
    }

    function setFolio($Folio) {
        $this->Folio = $Folio;
    }

    function getFechaOrden() {
        return $this->FechaOrden;
    }

    function getFechaCaptura() {
        return $this->FechaCaptura;
    }

    function getClaveProveedor() {
        return $this->ClaveProveedor;
    }

    function getProveedor() {
        return $this->Proveedor;
    }

    function getObservaciones() {
        return $this->Observaciones;
    }

    function setFechaOrden($FechaOrden) {
        $this->FechaOrden = $FechaOrden;
    }

    function setFechaCaptura($FechaCaptura) {
        $this->FechaCaptura = $FechaCaptura;
    }

    function setClaveProveedor($ClaveProveedor) {
        $this->ClaveProveedor = $ClaveProveedor;
    }

    function setProveedor($Proveedor) {
        $this->Proveedor = $Proveedor;
    }

    function setObservaciones($Observaciones) {
        $this->Observaciones = $Observaciones;
    }

    function getDireccion2() {
        return $this->Direccion2;
    }

    function setDireccion2($Direccion2) {
        $this->Direccion2 = $Direccion2;
    }

    function getDireccion() {
        return $this->Direccion;
    }

    function setDireccion($Direccion) {
        $this->Direccion = $Direccion;
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

    function Header() {

        $this->Image($this->getLogo(), /* LEFT */ 5, 5/* TOP */, /* ANCHO */ 30);
        $this->SetFont('Arial', 'B', 10);
        $this->SetY(5);
        $this->SetX(40);
        $this->Cell(110, 4, utf8_decode($this->getEmpresa()), 0/* BORDE */, 1, 'L');
        $this->SetY(9);
        $this->SetX(40);
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(110, 4, utf8_decode($this->getDireccion()), 0/* BORDE */, 1, 'L');
        $this->SetY(13);
        $this->SetX(40);
        $this->Cell(110, 4, utf8_decode($this->getDireccion2()), 0/* BORDE */, 1, 'L');

        $this->SetY(5);
        $this->SetX(210);
        $this->Cell(25, 5, utf8_decode($this->getEstatus()), 1/* BORDE */, 1, 'C');
        $this->SetY(5);
        $this->SetX(240);
        $this->Cell(35, 5, utf8_decode('Orden de Compra'), 1/* BORDE */, 1, 'C');
        $this->SetY(10);
        $this->SetX(240);
        $this->Cell(35, 5, utf8_decode($this->getFolio()), 1/* BORDE */, 1, 'C');

        $this->SetY(17);
        $this->SetX(190);
        $this->Cell(30, 4, utf8_decode("Ord. " . $this->getFechaOrden()), 0/* BORDE */, 1, 'L');

        $this->SetY(17);
        $this->SetX(220);
        $this->Cell(30, 4, utf8_decode("Cap. " . $this->getFechaCaptura()), 0/* BORDE */, 1, 'L');

        $this->SetY(17);
        $this->SetX(250);
        $this->Cell(30, 4, utf8_decode("Imp. " . Date('d/m/Y')), 0/* BORDE */, 1, 'L');

        $this->SetY(24);
        $this->SetX(5);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(30, 4, utf8_decode("PROVEEDOR:"), 'B'/* BORDE */, 0, 'L');
        $this->SetX(35);
        $this->SetFont('Arial', '', 8);
        $this->Cell(85, 4, utf8_decode($this->getClaveProveedor() . '       ' . $this->getProveedor()), 'B'/* BORDE */, 1, 'L');

        $this->SetY(24);
        $this->SetX(170);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(30, 4, utf8_decode("CONSIGNAR A: "), 'B'/* BORDE */, 0, 'L');
        $this->SetX(200);
        $this->SetFont('Arial', '', 8);
        $this->Cell(75, 4, utf8_decode($this->getConsignarA()), 'B'/* BORDE */, 1, 'L');

        $this->SetY(28);
        $this->SetX(5);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(30, 4, utf8_decode("OBSERVACIONES:"), 'B'/* BORDE */, 0, 'L');
        $this->SetX(35);
        $this->SetFont('Arial', '', 8);
        $this->Cell(240, 4, utf8_decode($this->getObservaciones()), 'B'/* BORDE */, 1, 'L');


        $this->AliasNbPages('{totalPages}');
        // Go to 1.5 cm from bottom
        $this->SetY(-5);
        $this->SetX(250);
        // Select Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Print centered page number
        $this->SetTextColor(0, 0, 0);
        $this->Cell(35, 3, utf8_decode('Pag. ' . $this->PageNo() . ' de {totalPages}'), 0, 0, 'R');


        $this->SetY(38);
        $this->SetX(213);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(15, 4, 'Mercancia Recibida', 0/* BORDE */, 1, 'C');
        $this->Rect(195, 37, 53, 9);

        /* ENCABEZADO DETALLE TITULOS */
        $anchos = array(0/* 0 */, 100/* 1 */, 15/* 2 */, 10/* 3 */, 20/* 4 */, 20/* 5 */, 10/* 6 */, 20/* 7 */, 30/* 8 */, 25/* 9 */, 20/* 10 */);
        $aligns = array('L', 'L', 'L', 'L', 'L', 'L', 'L', 'L', 'L', 'L', 'L');

        $this->SetY(42);
        $this->SetX(5);

        $this->SetWidths($anchos);
        $this->SetAligns($aligns);
        $this->Row(array('', utf8_decode('Artículo'), 'Cant.', 'U.M.', 'Precio', 'Subtotal', 'Sem', 'Maq', 'Recibido', 'Docto.', 'Fecha Ent.'));
    }

    function Footer() {
        $this->SetFont('Arial', 'B', 7);
        /* Primer bloque */
        $this->SetY(189);
        $this->SetX(5);
        $this->Cell(110, 4, 'IMPORTANTE', 0/* BORDE */, 1, 'C');
        $this->SetX(5);
        $this->SetFont('Times', '', 9);
        $this->Cell(110, 3, utf8_decode('1.- No se recibira ningun documento sin una copia de la orden de compra'), 0/* BORDE */, 1, 'L');
        $this->SetX(5);
        $this->Cell(110, 3, utf8_decode('2.- Las cantidades en el documento deben coincidir con la orden de compra'), 0/* BORDE */, 1, 'L');
        $this->SetX(5);
        $this->Cell(110, 3, utf8_decode('3.- Solo se recibiran las parcialidades en la fecha descrita en esta orden de compra'), 0/* BORDE */, 1, 'L');
        $this->SetX(5);
        $this->MultiCell(110, 3, utf8_decode('4.- Solo en el caso de pieles y forros la cantidad a entregar podra variar mas menos 500 DM2 teniendo en cuenta que el total de la misma no debera exceder mas de los 500 DM2 mencionados.'), 0/* BORDE */, 'J');
        /* Segundo bloque */
        $this->SetFont('Times', '', 9);
        $this->SetY(202);
        $this->SetX(125);
        $this->Cell(60, 4, 'Recibe marcancia', 0/* BORDE */, 1, 'L');
        $this->SetX(125);
        $this->Cell(60, 4, 'Nombre, firma y fecha de confirmacion pedido', 0/* BORDE */, 1, 'L');
        /* tercer bloque */
        $this->SetY(189);
        $this->SetX(195);
        $this->Cell(80, 17, 'Favor de entregar mercancia y orden de compra en almacen', 1/* BORDE */, 1, 'C');
        $this->SetX(195);
        $this->Cell(80, 4, 'Atentamente COMPRAS', 1/* BORDE */, 1, 'C');
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

    function RowNoBorder($data) {
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
