<?php 
require('../fpdf/fpdf.php');
include("../conexion/con_db.php");
if (isset($_POST['enviar'])) {	
	//scamos los datos que necesitamos
	$idD = $_POST['idD'];
	$consul = "SELECT * FROM diagnostico WHERE iddiagnostico = '$idD'";
	$res = mysqli_query($conex,$consul);
	 if(mysqli_num_rows($res)==1){
	 	$row = mysqli_fetch_array($res);
	 	$idI = $row['idinventario'];
	 	$sis_motor = $row['motor'];
	 	$sis_alimentacion = $row['sis_alimentacion'];
	 	$sis_refrigeracion = $row['sis_refrigeracion'];
	 	$sis_distribucion = $row['sis_distribucion'];
	 	$sis_lubricacion = $row['sis_lubricacion'];
	 	$sis_transmision = $row['sis_transmision'];
	 	$sis_freno = $row['sis_freno'];
	 	$sis_direccion = $row['sis_direccion'];
	 	$sis_suspencion = $row['sis_suspencion'];
	 	$tren_rotura = $row['tren_rotura'];
	 	$encendido = $row['encendido'];
	 	$arranque = $row['arranque'];
	 	$iluminacion = $row['iluminacion'];
	 	$obser = $row['observaciones'];
	 }
	$cons = "SELECT * FROM inventario WHERE idinventario = '$idI'" ;
	$resu = mysqli_query($conex,$cons);
	if(mysqli_num_rows($resu)==1){
	 	$row = mysqli_fetch_array($resu);
	 	$idRegV = $row['idregistro_vehiculo'];
	 	$idPart = $row['idpartes'];
	 	$lugar = $row['lugar'];
		$fecha = $row['fecha'];
	    $hora = $row['hora'];
		$unidad = $row['unidad'];
		$ciudad = $row['ciudad'];
		$motivo = $row['motivo'];
		$funcionario = $row['funcionario'];
	 }
	 $consulta = "SELECT * FROM partes WHERE idpartes = '$idPart'";
	 $prob=mysqli_query($conex,$consulta);
	 if (mysqli_num_rows($prob)==1) {
	 	$row = mysqli_fetch_array($prob);
	 	$vidrios = $row['vidrios'];
	 	$retrovisores = $row['retrovisores'];
	 	$radio = $row['radio'];
	 	$placa_control = $row['placa_control'];
	 	$faroles = $row['faroles'];
	 	$guiñadores = $row['guiñadores'];
	 	$volante = $row['volante'];
	 	$palanca = $row['palanca'];
	 	$llantas = $row['llantas'];
	 	$guar_fangos = $row['guar_fangos'];
	 	$lim_parabrisas = $row['lim_parabrisas'];
	 }

	 $query = "SELECT * FROM registro_vehiculo WHERE idregistro_vehiculo = $idRegV";
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
		    $this->Image('../img/logo.png',10,8,35);
		    // Arial bold 15
		    $this->SetFont('Arial','B',15);
		    // Movernos a la derecha
		    //$this->SetTextColor(255,255,255);
		    $this->SetTextColor(85, 107, 47); 
		    $this->Cell(80);
		    // Título
		    $this->Cell(60,20,'REGISTRO TECNICO DE DIAGNOSTICO DE VEHICULO  ',0,1,'C');
		    $this->Cell(220,5,' DE VEHICULO',0,1,'C');
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
	$pdf->Cell(60,0,"I. DATOS GENERALES DEL INVENTARIO:",0,1);
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
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(60,37,utf8_decode("MOTIVO DEL INVENTARIO:") ,0,1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,-37,utf8_decode("                                                    $motivo      ") ,0,1);
	//-------------2------------------------------
	$pdf->Line(10,78,205,78);
	$pdf->SetFont('Arial','B',12); 
	$pdf->Cell(60,55,"II. DATOS DE IDENTIFICACION DEL VEHICULO:",0,1);
	//fila 1
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(60,-44,utf8_decode("PLACA DE CONTROL:                           TIPO/CLASE:                                  AÑO:  ") ,0,1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,44,utf8_decode("                                             $placa                                      $tipo                                 $año       ") ,0,1);
	//fila 2
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(60,-34,utf8_decode("N° CHASIS:                                              MARCA:                                          INDUSTRIA:    ") ,0,1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,34,utf8_decode("                        $chasis                  
	                         $marca                                                        $industria      ") ,0,1);
	//fila3
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(60,-25,utf8_decode("N° MOTOR:                                              MODELO:                                        COLOR:          ") ,0,1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,25,utf8_decode("                          $motor             
	                            $modelo                                                    $color       ") ,0,1);
	$pdf->Line(10,102,205,102);
	$pdf->SetFont('Arial','B',12); 
	//---------------3--------------------------
	$pdf->Cell(60,-8,"III. CARACTERISTICAS TECNICAS DEL VEHICULO:",0,1);
	//LINEA 1
	$pdf->SetFont('Arial','B',11);  
	$pdf->Cell(60,18,utf8_decode("MOTOR:   CILINDRADA:                           N° CILINDROS:             COMBUSTIBLE:  "),0,1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,-18,utf8_decode("                                               $cilindrada                                                  $n_cilindros                                            $combustible       ") ,0,1);
	//LINEA 2
	$pdf->SetFont('Arial','B',11);  
	$pdf->Cell(60,28,utf8_decode("SISTEMA TRANSMISION:   CAJA:                           TRACCION:                      NEUMATICO:  "),0,1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,-28,utf8_decode("                                                                  $caja                                $traccion                                    $neumatico      ") ,0,1);
	$pdf->Line(10,120,205,120);
	$pdf->SetFont('Arial','B',12); 
	//-----------------------------------4-------------------------------
	$pdf->Cell(60,45,"IV. DIAGNOSTICO TECNICO POR SISTEMAS :",0,1);
	//LINEA 1
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(60,-25,utf8_decode("MOTOR Y SISTEMAS DE MOTOR"),0,1);
	$pdf->Cell(60,48,utf8_decode("MOTOR:                         "),0,1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,-48,utf8_decode("                                                                                       $sis_motor") ,0,1);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(60,60,utf8_decode("SISTEMA DE ALIMENTACION:                                  "),0,1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,-60,utf8_decode("                                                                                       $sis_alimentacion") ,0,1);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(60,72,utf8_decode("SISTEMA DE REFRIGERACION:                                  "),0,1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,-72,utf8_decode("                                                                                       $sis_refrigeracion") ,0,1);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(60,84,utf8_decode("SISTEMA DE DISTRIBUCION:                                  "),0,1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,-84,utf8_decode("                                                                                       $sis_distribucion") ,0,1);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(60,96,utf8_decode("SISTEMA DE LUBRICACION:                                  "),0,1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,-96,utf8_decode("                                                                                       $sis_lubricacion") ,0,1);

	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(60,120,utf8_decode("SISTEMAS MECANICOS"),0,1);
	$pdf->Cell(60,-101,utf8_decode("SISTEMA DE TRANSMISION DE POTENCIA:                                  "),0,1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,101,utf8_decode("                                                                                       $sis_transmision") ,0,1);

	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(60,-88,utf8_decode("SISTEMA DE FRENO:                                  "),0,1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,88,utf8_decode("                                                                                       $sis_freno") ,0,1);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(60,-74,utf8_decode("SISTEMA DE DIRECCION:                                  "),0,1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,74,utf8_decode("                                                                                       $sis_direccion") ,0,1);

	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(60,-60,utf8_decode("SISTEMA DE SUSPENSION:                                  "),0,1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,60,utf8_decode("                                                                                       $sis_suspencion") ,0,1);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(60,-46,utf8_decode("TREN DE ROTADURA:                                  "),0,1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,46,utf8_decode("                                                                                       $tren_rotura") ,0,1);

	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(60,30,utf8_decode("SISTEMAS ELECTRICO"),0,1);
	$pdf->Cell(60,-10,utf8_decode("ENCENDIDO:                                  "),0,1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,10,utf8_decode("                                                                                       $encendido") ,0,1);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(60,4,utf8_decode("ARRANQUE:                                  "),0,1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,-4,utf8_decode("                                                                                       $arranque") ,0,1);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(60,18,utf8_decode("ILUMINACION:                                  "),0,1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,-18,utf8_decode("                                                                                       $iluminacion") ,0,1);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(60,40,utf8_decode("OBSERVACIONES GENERALES:                                  "),0,1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,-30,utf8_decode("$obser") ,0,1);
	//-------------------
	$pdf->SetFont('Arial','B',11); 
	$pdf->Cell(180,117,'FUNCIONARIO DE "CE.MA.POL."',0,1,'C');
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(60,-107,utf8_decode("                                                 $funcionario") ,0,1);
	$pdf->Line(140,150,60,150);

	$pdf->Line(10,50,205,50);
	$pdf->Line(10,48,205,48);
	$pdf->Output();

 ?>