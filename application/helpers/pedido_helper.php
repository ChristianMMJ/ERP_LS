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
        $base = 6;
        $alto_celda = 4;
        $this->SetY($base);
        $this->SetX(35);
        $this->Cell(110, $alto_celda, utf8_decode("CALZADO LOBO, S.A. DE C.V."), 0/* BORDE */, 1, 'L');
        $this->SetY(9);
        $this->SetX(35);
        $this->Cell(110, $alto_celda, utf8_decode("Rio Santiago No. 245 Col. San Miguel"), 0/* BORDE */, 1, 'L');

        $this->SetY($base);
        $this->SetX(90);
        $this->SetFillColor(225, 225, 234);
        $this->Cell(30, $alto_celda, utf8_decode("Pedido"), 1/* BORDE */, 1, 'C', 1);
        $this->SetFillColor(250, 250, 250);
        $this->SetX(90);
        $this->Cell(30, $alto_celda, utf8_decode($this->getPedido()), 1/* BORDE */, 1, 'C');
         
        $this->SetX(90);
        $this->SetFillColor(225, 225, 234);
        $this->Cell(30, $alto_celda, utf8_decode("Fe Ped. "), 1/* BORDE */, 1, 'C', 1);
        $this->SetFillColor(250, 250, 250);
        $this->SetX(90);
        $this->Cell(30, $alto_celda, utf8_decode($this->getFecha()), 1/* BORDE */, 1, 'C');

        $this->SetFont('Arial', 'B', 7.5);
        $this->SetFillColor(225, 225, 234);
        $this->SetY($base);
        $this->SetX(120);
        $this->Cell(15, $alto_celda, utf8_decode("Cliente"), 1/* BORDE */, 0, 'L', 1);
        $this->SetFillColor(250, 250, 250);
        $this->SetY($base);
        $this->SetX(135);
        $this->Cell(139.5, $alto_celda, utf8_decode($this->getCliente()), 1/* BORDE */, 1, 'L', 1);

        $this->SetFillColor(225, 225, 234);
        $this->SetX(120);
        $this->Cell(15, $alto_celda, utf8_decode("Ciudad"), 1/* BORDE */, 0, 'L', 1);
        $this->SetFillColor(250, 250, 250);
        $this->SetX(135);
        $this->Cell(65, $alto_celda, utf8_decode($this->getCiudad()), 1/* BORDE */, 0, 'L');

        $this->SetFillColor(225, 225, 234);
        $this->SetX(200);
        $this->Cell(15, $alto_celda, utf8_decode("Estado"), 1/* BORDE */, 0, 'L', 1);
        $this->SetFillColor(250, 250, 250);
        $this->SetX(215);
        $this->Cell(59.5, $alto_celda, utf8_decode($this->getEstado()), 1/* BORDE */, 1, 'L');
 
        $this->SetFillColor(225, 225, 234);
        $this->SetX(120);
        $this->Cell(15, $alto_celda, utf8_decode("R.F.C"), 1/* BORDE */, 0, 'L', 1);
        $this->SetFillColor(250, 250, 250);
        $this->SetX(135);
        $this->Cell(92, $alto_celda, utf8_decode($this->getRFC()), 1/* BORDE */, 0, 'L');
 
        $this->SetFillColor(225, 225, 234);
        $this->SetX(200);
        $this->Cell(15, $alto_celda, utf8_decode("Tel."), 1/* BORDE */, 0, 'L', 1);
        $this->SetFillColor(250, 250, 250);
        $this->SetX(215);
        $this->Cell(59.5, $alto_celda, utf8_decode($this->getTel()), 1/* BORDE */, 1, 'L');
        
        
        
        
 
        $this->SetFillColor(225, 225, 234);
        $this->SetX(120);
        $this->Cell(15, $alto_celda, utf8_decode("Agente"), 1/* BORDE */, 0, 'L', 1);
        $this->SetFillColor(250, 250, 250);
        $this->SetX(135);
        $this->Cell(92, $alto_celda, utf8_decode($this->getAgente()), 1/* BORDE */, 1, 'L');

        $this->AliasNbPages('{totalPages}');
        // Go to 1.5 cm from bottom
        $this->SetY(3);
        $this->SetX(250);
        // Select Arial italic 8
        $this->SetFont('Arial', 'I', 7);
        // Print centered page number
        $this->SetTextColor(0, 0, 0);
        $this->Cell(35, 3, utf8_decode('Pag. ' . $this->PageNo() . ' de {totalPages}'), 0, 0, 'R');

        /* ENCABEZADO DETALLE TITULOS */
        $anchos = array(15/* 0 */, 12/* 1 */, 103/* 2 */, 15/* 3 */, 20/* 4 */, 13/* 5 */, 19/* 6 */, 10/* 7 */, 17/* 8 */, 17/* 9 */, 29/* 10 */);
        $aligns = array('L', 'L', 'L', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C');

        $this->SetY(20);
        $this->SetX(5);
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
            $this->MultiCell($w, 4, $data[$i], $this->getBorders(), $a, $this->getFilled());
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
