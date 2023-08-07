<?php require_once "vistas/parte_superior.php" ?>
<?php 
	include("../conexion/con_db.php");
	//sacar datos
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
	
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
<div class=" container" id='form'>
	<!-- Boton para volver -->
	<button class="btn btn-danger pull-right" onclick="location.href='reg_vehiculos.php'">x</button>
	<br>
	<!-- Formulario -->
	<form  action="reg_vehiculos.php" method="POST">
		  <!-- Iniciando DATOS DE IDENTIFICACION-->
		  <h4 class="subtitulo">I. Datos de identificacion del vehiculo:</h4>
		  <fieldset disabled>
			    		  <!-- Fila 1-->
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputPlaca">Placa de control</label>
			      <input type="text" class="form-control" id="inputPlaca" name="placa" value="<?php echo $placa; ?> " pattern="^[A-Z0-9 -?]+$"  title="Ingrese datos Mayúscula" required>
			    </div>
			    <div class="form-group col-md-3">
			      <label for="inputTipo">Tipo/Clase</label>
			      <input type="text" class="form-control" id="inputTipo" name="tipo" value="<?php echo $tipo; ?>" pattern="^[A-Z\s]+$"  title="Ingrese datos Mayúscula" required>
			    </div>
			    <div class="form-group col-md-3">
			      <label for="inputAño">Año</label>
			      <input type="text" class="form-control" id="inputAño" name="año" value="<?php echo $año; ?>" pattern="^[0-9]{4}"  title="ejemplo : 2015"  required>
			    </div>
			   </div>
			    <!-- Fila 2-->
			    <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="inputChasis">VIN/Serie N° Chasis</label>
				      <input type="text" class="form-control" id="inputChasis" name="chasis" value="<?php echo $chasis; ?>" pattern="^[A-Z0-9 -?]+$"  title="Ingrese datos Mayúscula" required>
				    </div>
				    <div class="form-group col-md-3">
				      <label for="inputMarca">Marca</label>
				      <input type="text" class="form-control" id="inputMarca" name="marca" value="<?php echo $marca; ?>" pattern="^[A-Z\s]+$"  title="Ingrese datos Mayúscula" required>
				    </div>
				    <div class="form-group col-md-3">
				      <label for="inputIndustria">Industria</label>
				      <input type="text" class="form-control" id="inputIndustria" name="industria" value="<?php echo $industria; ?>" pattern="^[A-Z\s]+$"  title="Ingrese datos Mayúscula" required>
				    </div>
		   	    </div>
		   	    <!-- Fila 3-->
		   	    <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="inputSerieMotor">Serie y N° Motor</label>
				      <input type="text" class="form-control" id="inputSerieMotor" name="motor" value="<?php echo $motor; ?>" pattern="^[A-Z0-9 -?]+$"  title="Ingrese datos Mayúscula" required>
				    </div>
				    <div class="form-group col-md-3">
				      <label for="inputModelo">Modelo</label>
				      <input type="text" class="form-control" id="inputModelo" name="modelo" value="<?php echo $modelo; ?>" pattern="^[A-Z\s]+$"  title="Ingrese datos Mayúscula" required>
				    </div>
				    <div class="form-group col-md-3">
				      <label for="inputColor">Color</label>
				      <input type="text" class="form-control" id="inputColor" name="color" value="<?php echo $color; ?>" pattern="^[A-Z\s]+$"  title="Ingrese datos Mayúscula" required>
				    </div>
		   	    </div>
		   	    <!-- Caracteristicas del vehiculo -->
		   	    <h4 class="subtitulo">II. Cracterisicas del Vehiculo:</h4>
		   	    <!-- Fila 1-->
		   	    <h4 class="subtitulo">Motor </h4>
		   	    <div class="form-row">
				    <div class="form-group col-md-4">
				      <label for="inputCilindrada">Cilindrada</label>
				      <input type="text" class="form-control" id="inputCilindrada" name="cilindrada" value="<?php echo $cilindrada; ?>" pattern="^[0-9].{3,7}" title="Nesesario entre 4 a 6 digitos" required>
				    </div>
				    <div class="form-group col-md-4">
				      <label for="inputCilindros">N° de Cilindros</label>
				      <input type="text" class="form-control" id="inputCilindros" name="n_cilindros" value="<?php echo $n_cilindros; ?>" pattern="^[0-9]" title="Solo es necesario un digito ejemplo : 4" required>
				    </div>
				    <div class="form-group col-md-4">
				      <label for="inputCombustible">Combustible</label>
				      <input type="text" class="form-control" id="inputCombustible" name="combustible" value="<?php echo $combustible; ?>" pattern="^[A-Z\s]+$"  title="Ingrese datos Mayúscula" required>
				    </div>
		   	    </div>
		   	    <!-- Fila 2-->
		   	    <h4 class="subtitulo">Sistema de Transmisión</h4>
		   	    <div class="form-row">
				    <div class="form-group col-md-4">
				      <label for="inputCaja">Caja</label>
				      <input type="text" class="form-control" id="inputCaja" pattern="^[A-Z\s]+$" name="caja" value="<?php echo $caja; ?>" title="Ingrese datos Mayúscula" required>
				    </div>
				    <div class="form-group col-md-4">
				      <label for="inputTraccion">Tracción</label>
				      <input type="text" class="form-control" id="inputTraccion" pattern="^[A-Z\s]+$" name="traccion" value="<?php echo $traccion; ?>" title="Ingrese datos Mayúscula" required>
				    </div>
				    <div class="form-group col-md-4">
				      <label for="inputNeumatico">Neumatico</label>
				      <input type="text" class="form-control" id="inputNeumatico" name="neumatico" value="<?php echo $neumatico; ?>" required>
				    </div>
				   <div class="form-group col-md-12">
					    <label for="Observaciones">Observaciones</label>
					    <textarea type="text" class="form-control" id="Observaciones" rows="3" name="observaciones" pattern="^[A-Z0-9 -?]+$"  title="Ingrese datos Mayúscula"><?php echo $observaciones; ?> </textarea>
					</div>				    
		   	    </div>
		  </fieldset>

		  <button type="submit" class="btn btn-success" >Cerrar</button> 
	</form>
</div>
</body>
 </html>