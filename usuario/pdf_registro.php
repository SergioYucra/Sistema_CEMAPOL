<?php
require('../fpdf/fpdf.php');
include("../conexion/con_db.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM registro_vehiculo WHERE idregistro_vehiculo = $id";
        $resultado = mysqli_query($conex,$query);
        if(mysqli_num_rows($resultado)==1){
            $row = mysqli_fetch_array($resultado);
            $idcaracteristicas = $row['idcaracteristicas'];
            $placa= $row['placa'];
            $chasis= $row['n_chasis'];
            $motor = $row['n_motor'];
            $tipo = $row['tipo'];
            $marca= $row['marca'];
            $modelo=$row['modelo'];
            $año=$row['año_fab'];
            $industria=$row['industria'];
            $color=$row['color'];
            $observaciones = $row['observaciones'];
        }
        $consul= "SELECT * FROM caracteristicas WHERE idcaracteristicas = $idcaracteristicas";
        $orden=mysqli_query($conex,$consul);
        if(mysqli_num_rows($orden)==1){
            $row = mysqli_fetch_array($orden);
            $cilindrada = $row['cilindrada'];
            $n_cilindros = $row['n_cilindros'];
            $combustible = $row['combustible'];
            $caja = $row['caja'];
            $traccion = $row['traccion'];
            $neumatico = $row['neumatico'];
        }
    }
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../img/logo.png',10,8,30);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(50,20,'REGISTRO TECNICO DE IDENTIFICACION ',0,1,'C');
    $this->Cell(200,5,' DE VEHICULO',0,1,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',10);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ') .$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF('P','mm','letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12); 
$pdf->Line(12,45,200,45);
$pdf->Line(12,46,200,46);
$pdf->Cell(60,10,"I. DATOS DE IDENTIFICACION DEL VEHICULO",0,1);

$pdf->SetFont('Arial','B',11);  
$pdf->Cell(60,10,utf8_decode("PLACA DE CONTROL:                           TIPO/CLASE:                                  AÑO:  ") ,0,1);

$pdf->SetFont('Arial','',10);
$pdf->Cell(60,-10,utf8_decode("                                             $placa                                      $tipo                                 $año       ") ,0,1);

$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,30,utf8_decode("N° CHASIS:                                              MARCA:                                          INDUSTRIA:    ") ,0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,-30,utf8_decode("                        $chasis                  
                         $marca                                                        $industria      ") ,0,1);

$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,50,utf8_decode("N° MOTOR:                                              MODELO:                                        COLOR:          ") ,0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,-50,utf8_decode("                          $motor             
                            $modelo                                                    $color       ") ,0,1);
$pdf->Line(12,100,200,100);
$pdf->SetFont('Arial','B',12); 
//------------------------------------------------------------------------------------------------------------------------------------------
$pdf->Cell(60,90,"II. CARACTERISTICAS TECNICAS DEL VEHICULO",0,1);
$pdf->SetFont('Arial','B',11);  
$pdf->Cell(60,-70,utf8_decode("MOTOR:   CILINDRADA:                           N° CILINDROS:             COMBUSTIBLE:  "),0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,70,utf8_decode("                                               $cilindrada                                                  $n_cilindros                                            $combustible       ") ,0,1);
$pdf->SetFont('Arial','B',11);  
$pdf->Cell(60,-50,utf8_decode("SISTEMA TRANSMISION:   CAJA:                           TRACCION:                      NEUMATICO:  "),0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,50,utf8_decode("                                                                  $caja                                $traccion                                    $neumatico      ") ,0,1);
$pdf->Line(12,140,200,140);

$pdf->SetFont('Arial','B',11);  
$pdf->Cell(60,-10,utf8_decode("OBSERVACIONES: "),0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,30,utf8_decode("$observaciones") ,0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,50,utf8_decode("                                            ......................................................................................."),0,1); 
$pdf->Cell(60,-40,utf8_decode("                                            Sgto. 2do. M.Sc. Dionisio Fernando Aruquipa Nina"),0,1);
$pdf->Cell(60,50,utf8_decode("                                                      Encargado de la Seccion de Control y"),0,1);
$pdf->Cell(60,-40,utf8_decode("                                                         supervisión Técnicas mecánicas"),0,1);


$pdf->Output();
?>