<?php

require('../pedidos/pdf/fpdf.php');

class PDF extends FPDF{
    //CABECERA DE PAGINA

    function Header()
    {
        //logo
        $this->Cell(-200);
       
       //letra
        $this->Ln(10);
        $this->SetFont('Arial','B',10);

        $this->Cell(-200);
    }

    function Footer()
    {
        $this->SetFillColor(20.05,19);
        $this->Rect(0,270,220,30,'F');
        $this->SetY(-20); //SUBE LAS LETRAS
        $this->SetFont('Arial','',10);
        $this->SetTextColor(255,255,255);

        $this->SetX(90);
        $this->Write(5,'Ingenieria de sistemas');
        $this->Ln();
       
    }
}

  $pdf=new PDF();
  $pdf->AliasnbPages();
  $pdf->AddPage();
  $pdf->SetFont('Arial','',10);

  $pdf->SetY(70);
  $pdf->SetX(45);
  $pdf->SetTextColor(255,255,255);
  $pdf->SetFillColor(79,59,120);
  $pdf->Cell(59,9,'Cantidad',0,0,'C',1);
  $pdf->Cell(59,9,'Producto',0,0,'C',1);
  $pdf->Cell(59,9,'Precio de extra',0,0,'C',1);
  $pdf->Cell(59,9,'Total',0,0,'C',1);
  
  include('./base_de_datos.php');
  require('./base_de_datos.php');

  $conexion=mysqli_connect("localhost","root","","qr_art");
$nro_pedido= $_GET['id'];

$query="SELECT * FROM pedidos";
$result=mysqli_query($conexion, $sql);

$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(240,245,255);


  while($row=$result->fetch_assoc()) {
    $pdf->Setx(45);
    $pdf->Cell(59,9,'Cantidad',0,0,'C',1);
    $pdf->Cell(17,9,'Producto',0,0,'C',1);
    $pdf->Cell(50,9,'Precio de extra',0,0,'C',1);
    $pdf->Cell(50,9,'Total',0,0,'C',1);

  }
$pdf->Output();




?>