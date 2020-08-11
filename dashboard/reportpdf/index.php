<?php
require('fpdf.php');
$db = new PDO('mysql:host=localhost;dbname=codou_all_db', 'root', '');


class myPDF extends FPDF {
     function header () {
         $this->Image('logo.png', 10, 6);
         $this->setFont('Arial', 'B',14);
         $this->Cell(276,5,'RAPPORT NUTRITIONEL CLIENT', 0,0,'C');
         $this->Ln();
         $this->setFont('Times','',12);
         $this->Cell(276,10,'Recevez vos besoins nutritionels avec la paleforme Codou K',0,0,'C');
         $this->Ln(20);
     }
  function footer (){
      $this->setY(-15);
      $this->setFont('Arial','',8);
      $this->Cell(0,10,'Num. Page'.$this->PageNo().'/{nb}',0,0,'C');
  }
  function headerTable() {
    $this->setFont('Times','B',12);
    $this->Cell(20,10,'ID_Client',1,0,'C');
    $this->Cell(40,10,'Nom complet',1,0,'C');
    $this->Cell(40,10,'Calorie',1,0,'B');
    $this->Cell(60,10,'Plats diet',1,0,'C');
    $this->Cell(36,10,'Fruits & Legumes',1,0,'L');
    $this->Cell(30,10,'Ex. Physique',1,0,'L');
    $this->Cell(50,10,'Quant. Eau',1,0,'L');
    $this->Ln();
  }
  function viewTable($db){
     $this->SetFont('Times','',12);
     $stmt = $db->query('SELECT * FROM tablepaginate');
     while($data = $stmt->fetch(PDO::FETCH_OBJ)){
        $this->Cell(20,10,$data->ID_Client,1,0,'C');
        $this->Cell(40,10,$data->name,1,0,'L');
        $this->Cell(40,10,$data->calorie,1,0,'L');
        $this->Cell(60,10,$data->plat,1,0,'L');
        $this->Cell(36,10,$data->flegume,1,0,'L');
        $this->Cell(30,10,$data->exp,1,0,'L');
        $this->Cell(50,10,$data->conseau,1,0,'L');
        $this->Ln();
     }
  }
}

$pdf = new myPDF();
$pdf-> AliasNbPages();
$pdf->AddPage('L', 'A4' ,0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();

