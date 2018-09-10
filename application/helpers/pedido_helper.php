<?php

require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class PDF extends FPDF {

    public $Pedido = '';
    public $Proveedor = '';
    public $ConsignarA = '';
    public $Observaciones = '';
    public $Fecha = '';
    public $Borders = 0;
    public $Filled = 0;
    public $Cliente = '';
    public $Ciudad = '';
    public $Estado = '';
    public $RFC = '';
    public $Tel = '';
    public $Obs = '';
    public $Direccion = '';
    public $Agente = '';
    public $CP = '';
    public $Colonia = '';
    public $Trasp = '';
    public $Registro = '';

    function getRegistro() {
        return $this->Registro;
    }

    function setRegistro($Registro) {
        $this->Registro = $Registro;
    }

    function getCiudad() {
        return $this->Ciudad;
    }

    function getEstado() {
        return $this->Estado;
    }

    function getRFC() {
        return $this->RFC;
    }

    function getTel() {
        return $this->Tel;
    }

    function getObs() {
        return $this->Obs;
    }

    function getDireccion() {
        return $this->Direccion;
    }

    function getCP() {
        return $this->CP;
    }

    function getColonia() {
        return $this->Colonia;
    }

    function getTrasp() {
        return $this->Trasp;
    }

    function setCiudad($Ciudad) {
        $this->Ciudad = $Ciudad;
    }

    function setEstado($Estado) {
        $this->Estado = $Estado;
    }

    function setRFC($RFC) {
        $this->RFC = $RFC;
    }

    function setTel($Tel) {
        $this->Tel = $Tel;
    }

    function setObs($Obs) {
        $this->Obs = $Obs;
    }

    function setDireccion($Direccion) {
        $this->Direccion = $Direccion;
    }

    function setCP($CP) {
        $this->CP = $CP;
    }

    function setColonia($Colonia) {
        $this->Colonia = $Colonia;
    }

    function setTrasp($Trasp) {
        $this->Trasp = $Trasp;
    }

    function getAgente() {
        return $this->Agente;
    }

    function setAgente($Agente) {
        $this->Agente = $Agente;
    }

    function getCliente() {
        return $this->Cliente;
    }

    function setCliente($Cliente) {
        $this->Cliente = $Cliente;
    }

    function getFilled() {
        return $this->Filled;
    }

    function setFilled($Filled) {
        $this->Filled = $Filled;
    }

    function getBorders() {
        return $this->Borders;
    }

    function setBorders($Borders) {
        $this->Borders = $Borders;
    }

    function getPedido() {
        return $this->Pedido;
    }

    function setPedido($Pedido) {
        $this->Pedido = $Pedido;
    }

    function getFecha() {
        return $this->Fecha;
    }

    function setFecha($Fecha) {
        $this->Fecha = $Fecha;
    }

    function getProveedor() {
        return $this->Proveedor;
    }

    function setProveedor($Proveedor) {
        $this->Proveedor = $Proveedor;
    }

    function getConsignarA() {
        return $this->ConsignarA;
    }

    function getObservaciones() {
        return $this->Observaciones;
    }

    function setConsignarA($ConsignarA) {
        $this->ConsignarA = $ConsignarA;
    }

    function setObservaciones($Observaciones) {
        $this->Observaciones = $Observaciones;
    }

    function Header() {
        $this->Image('img/lsbck.png', /* LEFT */ 5, 5/* TOP */, /* ANCHO */ 30);
        $this->SetFont('Arial', 'B', 8.25);

        $pos = array(65/* 0 */, 80/* 1 */, 145/* 2 */, 160/* 3 */, 40/* 4 */, 200/* 5 */, 215/* 6 */);
        $anc = array(15/* 0 */, 65/* 1 */, 40/* 2 */, 120/* 3 */, 55/* 4 */);

        $base = 6;
        $alto_celda = 4;
        $this->SetY($base);
        $this->SetX(40);
        $this->Cell(110, $alto_celda, utf8_decode("CALZADO LOBO, S.A. DE C.V."), 0/* BORDE */, 0, 'L');
        $this->SetX(85);
        $this->Cell(110, $alto_celda, utf8_decode("Rio Santiago No. 245 Col. San Miguel"), 0/* BORDE */, 1, 'L');

        $base = $base + 4;
        $this->SetY($base);
        $this->SetX($pos[4]);
        $this->SetFillColor(225, 225, 234);
        $this->Cell(25, $alto_celda, utf8_decode("Pedido"), 1/* BORDE */, 1, 'C', 1);
        $this->SetFillColor(250, 250, 250);
        $this->SetX($pos[4]);
        $this->Cell(25, $alto_celda, utf8_decode($this->getPedido()), 1/* BORDE */, 1, 'C');

        $Y = $this->GetY();

        $this->SetX($pos[4] - 30);
        $this->SetFillColor(225, 225, 234);
        $this->Cell(30, $alto_celda, utf8_decode("Fe Cap. "), 1/* BORDE */, 1, 'C', 1);
        $this->SetFillColor(250, 250, 250);
        $this->SetX($pos[4] - 30);
        $this->Cell(30, $alto_celda, utf8_decode($this->getRegistro()), 1/* BORDE */, 1, 'C');

        $this->SetY($Y);
        $this->SetX($pos[4]);
        $this->SetFillColor(225, 225, 234);
        $this->Cell(25, $alto_celda, utf8_decode("Fe Ped. "), 1/* BORDE */, 1, 'C', 1);
        $this->SetFillColor(250, 250, 250);
        $this->SetX($pos[4]);
        $this->Cell(25, $alto_celda, utf8_decode($this->getFecha()), 1/* BORDE */, 0, 'C');

        $this->SetFont('Arial', 'B', 7);
        $this->SetFillColor(225, 225, 234);
        $this->SetY($base);
        $this->SetX($pos[0]);
        $this->Cell($anc[0], $alto_celda, utf8_decode("Cliente"), 1/* BORDE */, 0, 'L', 1);
        $this->SetFillColor(250, 250, 250);
        $this->SetY($base);
        $this->SetX($pos[1]);
        $this->Cell($anc[3], $alto_celda, utf8_decode($this->getCliente()), 1/* BORDE */, 1, 'L', 1);

        $this->SetFillColor(225, 225, 234);
        $this->SetX($pos[0]);
        $this->Cell($anc[0], $alto_celda, utf8_decode("Ciudad"), 1/* BORDE */, 0, 'L', 1);
        $this->SetFillColor(250, 250, 250);
        $this->SetX($pos[1]);
        $this->Cell($anc[1], $alto_celda, utf8_decode($this->getCiudad()), 1/* BORDE */, 0, 'L');

        $this->SetFillColor(225, 225, 234);
        $this->SetX($pos[2]);
        $this->Cell($anc[0], $alto_celda, utf8_decode("Estado"), 1/* BORDE */, 0, 'L', 1);
        $this->SetFillColor(250, 250, 250);
        $this->SetX($pos[3]);
        $this->Cell($anc[2], $alto_celda, utf8_decode($this->getEstado()), 1/* BORDE */, 1, 'L');

        $this->SetFillColor(225, 225, 234);
        $this->SetX($pos[0]);
        $this->Cell($anc[0], $alto_celda, utf8_decode("R.F.C"), 1/* BORDE */, 0, 'L', 1);
        $this->SetFillColor(250, 250, 250);
        $this->SetX($pos[1]);
        $this->Cell($anc[1], $alto_celda, utf8_decode($this->getRFC()), 1/* BORDE */, 0, 'L');

        $this->SetFillColor(225, 225, 234);
        $this->SetX($pos[2]);
        $this->Cell($anc[0], $alto_celda, utf8_decode("Tel."), 1/* BORDE */, 0, 'L', 1);
        $this->SetFillColor(250, 250, 250);
        $this->SetX($pos[3]);
        $this->Cell($anc[2], $alto_celda, utf8_decode($this->getTel()), 1/* BORDE */, 1, 'L');

        $this->SetFont('Arial', 'B', 7);
        $this->SetFillColor(225, 225, 234);
        $this->SetX($pos[0]);
        $this->Cell($anc[0], $alto_celda, utf8_decode("Obs."), 1/* BORDE */, 0, 'L', 1);
        $this->SetFont('Arial', 'B', 6.5);
        $this->SetFillColor(250, 250, 250);
        $this->SetX($pos[1]);
        $this->Cell($anc[3], $alto_celda, utf8_decode($this->getObs()), 1/* BORDE */, 0, 'L');

        $this->SetFillColor(225, 225, 234);
        $this->SetX($pos[5]);
        $this->Cell($anc[0], $alto_celda, utf8_decode("Trans."), 1/* BORDE */, 0, 'L', 1);
        $this->SetFillColor(250, 250, 250);
        $this->SetX($pos[6]);
        $this->Cell($anc[4], $alto_celda, utf8_decode($this->getTrasp()), 1/* BORDE */, 1, 'L');

        $this->SetY($base);
        $this->SetFont('Arial', 'B', 7);
        $this->SetFillColor(225, 225, 234);
        $this->SetX($pos[5]);
        $this->Cell($anc[0], $alto_celda, utf8_decode("Dirección"), 1/* BORDE */, 0, 'L', 1);
        $this->SetY($base);
        $this->SetFillColor(250, 250, 250);
        $this->SetX($pos[6]);
        $this->Cell($anc[4], $alto_celda, utf8_decode($this->getDireccion()), 1/* BORDE */, 1, 'L', 1);

        $this->SetFillColor(225, 225, 234);
        $this->SetX($pos[5]);
        $this->Cell($anc[0], $alto_celda, utf8_decode("Agente"), 1/* BORDE */, 0, 'L', 1);
        $this->SetFillColor(250, 250, 250);
        $this->SetX($pos[6]);
        $this->Cell($anc[4], $alto_celda, utf8_decode($this->getAgente()), 1/* BORDE */, 1, 'L');

        $this->SetFillColor(225, 225, 234);
        $this->SetX($pos[5]);
        $this->Cell($anc[0], $alto_celda, utf8_decode("C.P"), 1/* BORDE */, 0, 'L', 1);
        $this->SetFillColor(250, 250, 250);
        $this->SetX($pos[6]);
        $this->Cell($anc[4], $alto_celda, utf8_decode($this->getCP()), 1/* BORDE */, 1, 'L');

        $this->AliasNbPages('{totalPages}');
        // Go to 1.5 cm from bottom
        $this->SetY(3);
        $this->SetX(250);
        // Select Arial italic 8
        $this->SetFont('Arial', 'I', 7);
        // Print centered page number
        $this->SetTextColor(0, 0, 0);
        $this->Cell(35, 3, utf8_decode('Pag. ' . $this->PageNo() . ' de {totalPages}'), 0, 0, 'R');
    }

    function Footer() {
//        $ac = 3;
//        // Go to 1.5 cm from bottom
//        $this->SetY(-32.5);
//        $this->SetX(5);
//        // Select Arial italic 8
//        $this->SetFont('Arial', 'B', 6.5);
//        // Print centered page number
//        $this->Cell(130, 3.5, 'IMPORTANTE', 1, 1, 'C');
//        $this->SetX(5);
//        $this->Cell(130, $ac, utf8_decode('1.- No se recibira ningún documento sin una copia de la orden de compra.'), 0, 1, 'L');
//        $this->SetX(5);
//        $this->Cell(130, $ac, utf8_decode('2.- Las cantidades en el documento deben de coincidir con la orden de compra.'), 0, 1, 'L');
//        $this->SetX(5);
//        $this->Cell(130, $ac, utf8_decode('3.- Solo se recibirán las parcialidades en la fecha descrita en  esta orden de compra.'), 0, 1, 'L');
//        $this->SetX(5);
//        $this->MultiCell(130, $ac, utf8_decode('4.- Solo en el caso de pieles y forros la cantidad a entregar podra variar más menos 500 DM2 teniendo en cuenta que el total de la misma no deberá exceder mas de los 500 DM2 mencionados.'), 0, 'L');
//
//        $this->SetY(-26);
//        $this->SetX(135);
//        $this->Cell(60, $ac, utf8_decode('Recibe mercancia'), 0, 1, 'L');
//        $this->SetX(135);
//        $this->Cell(60, $ac, utf8_decode('Nombre, firma y fecha de confirmación pedido'), 0, 1, 'L');
//
//
//        $this->SetY(-32.5);
//        $this->SetX(200);
//        $this->Rect(200/* X */, $this->GetY()/* Y */, 75, 17.5);
//        $this->Cell(75, $ac, utf8_decode('Favor de entregar mercancia y orden de compra en almacen'), 0, 1, 'C');
//        $this->SetY(-18);
//        $this->SetX(200);
//        $this->Cell(75, $ac, utf8_decode('Atentamente COMPRAS'), 1, 1, 'C');
    }

    var $widths;
    var $aligns;
    var $alto = 5;

    function getAlto() {
        return $this->alto;
    }

    function setAlto($alto) {
        $this->alto = $alto;
    }

    function SetWidths($w) {
        //Set the array of column widths
        $this->widths = $w;
    }

    function SetAligns($a) {
        //Set the array of column alignments
        $this->aligns = $a;
    }

    function Row($data) {
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++)
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        $h = $this->getAlto() * $nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border
            $this->Rect($x, $y, $w, $h);
            //Print the text 
            $this->SetFillColor(225, 225, 234);
            $this->MultiCell($w, $this->getAlto(), $data[$i], $this->getBorders(), $a, $this->getFilled());
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
            $this->SetFillColor(225, 225, 234);
            $this->MultiCell($w, 4, $data[$i], 0, $a, $this->getFilled());
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
