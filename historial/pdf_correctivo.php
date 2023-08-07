<?php
require('../fpdf/fpdf.php');
include("../conexion/con_db.php");
if (isset($_GET['idM'])) {
	$idM = $_GET['idM'];
	//scamos los datos que necesitamos
	$query = "SELECT * FROM mant_correctivo WHERE idmant_correctivo = $idM";
	$resultado = mysqli_query($conex,$query);
		if(mysqli_num_rows($resultado)==1){
		$row = mysqli_fetch_array($resultado);
		$idV = $row['idregistro_vehiculo'];
		$idDatG = $row['iddatos_generales'];
		$sis_motor = $row['sis_motor'];
		$sis_mecanico = $row['sis_mecanico'];
		$sis_electrico = $row['sis_electrico'];
		$estructura = $row['estructura'];
		$funcionario = $row['funcionario'];
		$responsable = $row['responsable'];
		$detalle = $row['detalle'];
		$consul= "SELECT * FROM datos_generales WHERE iddatos_generales = $idDatG";
		$orden=mysqli_query($conex,$consul);
		if(mysqli_num_rows($orden)==1){
		$row = mysqli_fetch_array($orden);
		$lugar = $row['lugar'];
		   $fecha = $row['fecha'];
		   $hora = $row['hora'];
		   $unidad = $row['unidad'];
		   $ciudad = $row['ciudad'];
		}
	}
}
$query = "SELECT * FROM registro_vehiculo WHERE idregistro_vehiculo = $idV";
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

//iniciamos con el pdf
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
   // Logo
   $this->Image('../img/logo.png',10,8,35);
   // Arial bold 15
   $this->SetFont('Arial','B',15);
   // Movernos a la derecha
   //$this->SetTextColor(255,255,255);
   $this->SetTextColor(85, 107, 47);
   $this->Cell(80);
   // Título
   $this->Cell(60,20,'REGISTRO TECNICO DE ORDEN DE TRABAJO ',0,1,'C');
   $this->Cell(220,5,'DE MANTENIMIENTO  CORRECTIVO DE VEHICULO',0,1,'C');
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
   //$this->SetFont('Arial','B',11);
   //$this->Cell(-270,-40,'FUNCIONARIO DE CEMAPOL',0,1,'C');
   //$this->Line(40,240,100,240);    
}
}
$pdf = new PDF('P','mm','letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Line(10,45,205,45);
$pdf->Line(10,46,205,46);
$pdf->Cell(60,0,"I. DATOS GENERALES:",0,1);
//Fila 1
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,14,utf8_decode("LUGAR:                                                            FECHA:                                  HORA:  ") ,0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,-14,utf8_decode("                     $lugar                                                           $fecha                                     $hora      ") ,0,1);
//Fila 2
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,25,utf8_decode("UNIDAD:                                                           CIUDAD:                                          ") ,0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,-25,utf8_decode("                        $unidad                                        
                $ciudad                                                        ") ,0,1);
//-------------2------------------------------
$pdf->Line(10,72,205,72);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60,44,"II. DATOS DE IDENTIFICACION DEL VEHICULO:",0,1);
//fila 1
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,-30,utf8_decode("PLACA DE CONTROL:                           TIPO/CLASE:                                  AÑO:  ") ,0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,30,utf8_decode("                                             $placa                                      $tipo                                 $año       ") ,0,1);
//fila 2
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,-19,utf8_decode("N° CHASIS:                                              MARCA:                                          INDUSTRIA:    ") ,0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,19,utf8_decode("                        $chasis                  
                        $marca                                                        $industria      ") ,0,1);
//fila3
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,-8,utf8_decode("N° MOTOR:                                              MODELO:                                        COLOR:          ") ,0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,8,utf8_decode("                          $motor            
                           $modelo                                                    $color       ") ,0,1);
$pdf->Line(10,99,205,99);
$pdf->SetFont('Arial','B',12);
//---------------3--------------------------
$pdf->Cell(60,10,"III. CARACTERISTICAS TECNICAS DEL VEHICULO:",0,1);
//LINEA 1
$pdf->SetFont('Arial','B',11);  
$pdf->Cell(60,4,utf8_decode("MOTOR:   CILINDRADA:                           N° CILINDROS:             COMBUSTIBLE:  "),0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,-4,utf8_decode("                                               $cilindrada                                                  $n_cilindros                                            $combustible       ") ,0,1);
//LINEA 2
$pdf->SetFont('Arial','B',11);  
$pdf->Cell(60,14,utf8_decode("SISTEMA TRANSMISION:   CAJA:                           TRACCION:                      NEUMATICO:  "),0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,-14,utf8_decode("                                                                  $caja                                $traccion                                    $neumatico      ") ,0,1);
$pdf->Line(10,120,205,120);
$pdf->SetFont('Arial','B',12);
//-----------------------------------4-------------------------------
$pdf->Cell(60,32,"IV. TRABAJOS REALIZADOS DE MANTENIMIENTO CORRECTIVO:",0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,-18,utf8_decode("MOTOR Y SISTEMAS DEL MOTOR:"),0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,29,utf8_decode("$sis_motor "),0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,-18,utf8_decode("SISTEMA MECANICO:"),0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,29,utf8_decode("$sis_mecanico"),0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,-18,utf8_decode("SISTEMA ELECTRICO:"),0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,29,utf8_decode("$sis_electrico"),0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,-18,utf8_decode("ESTRUCTURA DE LA CARROCERIA Y CHASIS(BASTIDOR):"),0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,29,utf8_decode("$estructura"),0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,-18,utf8_decode("DETALLE DEL TRABAJO:"),0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,29,utf8_decode("$detalle"),0,1);


$pdf->SetFont('Arial','B',11);
$pdf->Cell(100,50,'FUNCIONARIO DE "CE.MA.POL."',0,1,'C');
$pdf->SetFont('Arial','',11);
$pdf->Cell(60,-40,utf8_decode("            $funcionario") ,0,1);
$pdf->Line(23,215,100,215);
//FILA 5 RESPONSABLE
$pdf->SetFont('Arial','B',11);
$pdf->Cell(280,30,'RESPONSABLE DEL VEHICULO',0,1,'C');
$pdf->SetFont('Arial','',11);
$pdf->Cell(60,-20,utf8_decode("                                                                                                     $responsable") ,0,1);
$pdf->Line(181,215,120,215);
    $pdf->Output();
$pdf->Output();
 ?>
<?php
require('../fpdf/fpdf.php');
include("../conexion/con_db.php");
if (isset($_GET['idM'])) {
$idM = $_GET['idM'];
//scamos los datos que necesitamos
$query = "SELECT * FROM mant_correctivo WHERE idmant_correctivo = $idM";
$resultado = mysqli_query($conex,$query);
if(mysqli_num_rows($resultado)==1){
$row = mysqli_fetch_array($resultado);
$idV = $row['idregistro_vehiculo'];
$idDatG = $row['iddatos_generales'];
$sis_motor = $row['sis_motor'];
$sis_mecanico = $row['sis_mecanico'];
$sis_electrico = $row['sis_electrico'];
$estructura = $row['estructura'];
$funcionario = $row['funcionario'];
$responsable = $row['responsable'];
$detalle = $row['detalle'];
$consul= "SELECT * FROM datos_generales WHERE iddatos_generales = $idDatG";
$orden=mysqli_query($conex,$consul);
if(mysqli_num_rows($orden)==1){
$row = mysqli_fetch_array($orden);
$lugar = $row['lugar'];
   $fecha = $row['fecha'];
   $hora = $row['hora'];
   $unidad = $row['unidad'];
   $ciudad = $row['ciudad'];
}
}
}
$query = "SELECT * FROM registro_vehiculo WHERE idregistro_vehiculo = $idV";
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

//iniciamos con el pdf
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
   // Logo
   $this->Image('../img/logo.png',10,8,35);
   // Arial bold 15
   $this->SetFont('Arial','B',15);
   // Movernos a la derecha
   //$this->SetTextColor(255,255,255);
   $this->SetTextColor(85, 107, 47);
   $this->Cell(80);
   // Título
   $this->Cell(60,20,'REGISTRO TECNICO DE ORDEN DE TRABAJO ',0,1,'C');
   $this->Cell(220,5,'DE MANTENIMIENTO  CORRECTIVO DE VEHICULO',0,1,'C');
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
   //$this->SetFont('Arial','B',11);
   //$this->Cell(-270,-40,'FUNCIONARIO DE CEMAPOL',0,1,'C');
   //$this->Line(40,240,100,240);    
}
}
$pdf = new PDF('P','mm','letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Line(10,45,205,45);
$pdf->Line(10,46,205,46);
$pdf->Cell(60,0,"I. DATOS GENERALES:",0,1);
//Fila 1
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,14,utf8_decode("LUGAR:                                                            FECHA:                                  HORA:  ") ,0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,-14,utf8_decode("                     $lugar                                                           $fecha                                     $hora      ") ,0,1);
//Fila 2
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,25,utf8_decode("UNIDAD:                                                           CIUDAD:                                          ") ,0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,-25,utf8_decode("                        $unidad                                        
                $ciudad                                                        ") ,0,1);
//-------------2------------------------------
$pdf->Line(10,72,205,72);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60,44,"II. DATOS DE IDENTIFICACION DEL VEHICULO:",0,1);
//fila 1
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,-30,utf8_decode("PLACA DE CONTROL:                           TIPO/CLASE:                                  AÑO:  ") ,0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,30,utf8_decode("                                             $placa                                      $tipo                                 $año       ") ,0,1);
//fila 2
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,-19,utf8_decode("N° CHASIS:                                              MARCA:                                          INDUSTRIA:    ") ,0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,19,utf8_decode("                        $chasis                  
                        $marca                                                        $industria      ") ,0,1);
//fila3
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,-8,utf8_decode("N° MOTOR:                                              MODELO:                                        COLOR:          ") ,0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,8,utf8_decode("                          $motor            
                           $modelo                                                    $color       ") ,0,1);
$pdf->Line(10,99,205,99);
$pdf->SetFont('Arial','B',12);
//---------------3--------------------------
$pdf->Cell(60,10,"III. CARACTERISTICAS TECNICAS DEL VEHICULO:",0,1);
//LINEA 1
$pdf->SetFont('Arial','B',11);  
$pdf->Cell(60,4,utf8_decode("MOTOR:   CILINDRADA:                           N° CILINDROS:             COMBUSTIBLE:  "),0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,-4,utf8_decode("                                               $cilindrada                                                  $n_cilindros                                            $combustible       ") ,0,1);
//LINEA 2
$pdf->SetFont('Arial','B',11);  
$pdf->Cell(60,14,utf8_decode("SISTEMA TRANSMISION:   CAJA:                           TRACCION:                      NEUMATICO:  "),0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,-14,utf8_decode("                                                                  $caja                                $traccion                                    $neumatico      ") ,0,1);
$pdf->Line(10,120,205,120);
$pdf->SetFont('Arial','B',12);
//-----------------------------------4-------------------------------
$pdf->Cell(60,32,"IV. TRABAJOS REALIZADOS DE MANTENIMIENTO CORRECTIVO:",0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,-18,utf8_decode("MOTOR Y SISTEMAS DEL MOTOR:"),0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,29,utf8_decode("$sis_motor "),0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,-18,utf8_decode("SISTEMA MECANICO:"),0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,29,utf8_decode("$sis_mecanico"),0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,-18,utf8_decode("SISTEMA ELECTRICO:"),0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,29,utf8_decode("$sis_electrico"),0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,-18,utf8_decode("ESTRUCTURA DE LA CARROCERIA Y CHASIS(BASTIDOR):"),0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,29,utf8_decode("$estructura"),0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,-18,utf8_decode("DETALLE DEL TRABAJO:"),0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,29,utf8_decode("$detalle"),0,1);


$pdf->SetFont('Arial','B',11);
$pdf->Cell(100,50,'FUNCIONARIO DE "CE.MA.POL."',0,1,'C');
$pdf->SetFont('Arial','',11);
$pdf->Cell(60,-40,utf8_decode("            $funcionario") ,0,1);
$pdf->Line(23,215,100,215);
//FILA 5 RESPONSABLE
$pdf->SetFont('Arial','B',11);
$pdf->Cell(280,30,'RESPONSABLE DEL VEHICULO',0,1,'C');
$pdf->SetFont('Arial','',11);
$pdf->Cell(60,-20,utf8_decode("                                                                                                     $responsable") ,0,1);
$pdf->Line(181,215,120,215);
    $pdf->Output();
$pdf->Output();
 ?>
