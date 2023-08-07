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
	//meter datos
	if(isset($_POST['actualizacion'])){
		$id = $_GET['id'];
	    $placa= trim($_POST['placa']);
	    $chasis= trim($_POST['chasis']);
		$motor = trim($_POST['motor']);
		$tipo = trim($_POST['tipo']);
		$marca=trim($_POST['marca']);
		$modelo=trim($_POST['modelo']);
		$año=trim($_POST['año']);
		$industria=trim($_POST['industria']);
		$color=trim($_POST['color']);

	    $cilindrada = trim($_POST['cilindrada']);
	    $n_cilindros = trim($_POST['n_cilindros']);
	    $combustible = trim($_POST['combustible']);
	    $caja = trim($_POST['caja']);
	    $traccion = trim($_POST['traccion']);
	    $neumatico = trim($_POST['neumatico']);
	    $observaciones = trim($_POST['observaciones']);
	    
	    //registro de vehiculo
	    $c_registro=mysqli_query($conex,"SELECT * FROM registro_vehiculo WHERE placa = '$placa' AND  idregistro_vehiculo <> $id");
	    if (mysqli_num_rows($c_registro)==1) {
			//si existe mandar un mensaje
			$_SESSION['message']='Error PLACA ya esta registrada !!';
		    $_SESSION['message_type']='danger';
		    header("Location: admi_registros.php");
		}//si no existe actualizar
		else{
			$query = "UPDATE registro_vehiculo set placa='$placa',n_chasis='$chasis',n_motor='$motor',tipo='$tipo',marca='$marca', modelo='$modelo', año_fab='$año', industria='$industria', color='$color', observaciones ='$observaciones' WHERE idregistro_vehiculo = $id ";
		    mysqli_query($conex,$query);

		    $_SESSION['message']='Registro Editado Satisfactoriamente';
		    $_SESSION['message_type']='success';
		    header("Location: admi_registros.php");
		}
		//las caracteristicas del registro buscar si hay las mismas 
		$reg=mysqli_query($conex,"SELECT * FROM caracteristicas WHERE cilindrada = '$cilindrada' AND n_cilindros = '$n_cilindros' AND combustible = '$combustible' AND caja = '$caja' AND traccion = '$traccion' AND neumatico = '$neumatico'");
		//si existen las mismas sacr el id y ponerlo en el registro
		if (mysqli_num_rows($reg)==1) {
			$row = mysqli_fetch_array($reg);
			$idcart = $row['idcaracteristicas'];

			$ord="UPDATE registro_vehiculo set idcaracteristicas='$idcart' WHERE idregistro_vehiculo = $id ";
			mysqli_query($conex,$ord);
		}//si no existe crear el reg de caracteristicas y sacar el ide y reemplazar
		else{
			//ingresando
			$caracteristica = "INSERT INTO caracteristicas(cilindrada, n_cilindros, combustible, caja, traccion, neumatico) VALUES ('$cilindrada','$n_cilindros','$combustible','$caja','$traccion','$neumatico')";	
			$resultado = @mysqli_query($conex,$caracteristica);
			if (!$resultado) {
				die("Fallo al ingresar");
			} 
			//sacando id
			$consult=mysqli_query($conex,"SELECT * FROM caracteristicas WHERE cilindrada = '$cilindrada' AND n_cilindros = '$n_cilindros' AND combustible = '$combustible' AND caja = '$caja' AND traccion = '$traccion' AND neumatico = '$neumatico'");
			$row = mysqli_fetch_array($consult);
			$idcart = $row['idcaracteristicas'];
			$ord="UPDATE registro_vehiculo set idcaracteristicas='$idcart' WHERE idregistro_vehiculo = $id ";
			mysqli_query($conex,$ord);

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
	<button class="btn btn-danger pull-right" onclick="location.href='admi_registros.php'">x</button>
	<br>
	<!-- Formulario -->
	<form  action="editar_reg.php?id=<?php echo $_GET['id']; ?>" method="POST">
	  
		  <!-- Iniciando DATOS DE IDENTIFICACION-->
		  <h4 class="subtitulo">I. Datos de identificacion del vehiculo:</h4>
		  <!-- Fila 1-->
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="inputPlaca">Placa de control</label>
		      <input type="text"  class="form-control" id="inputPlaca" name="placa" value="<?php echo $placa; ?>" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" minlength="7" maxlength="8" pattern="[0-9]{3,4}[-.]{1}[A-Z]{3}" title="Error! Ejemplo: 1111-ABC" required>
		    </div>
		    <div class="form-group col-md-3">
		      <label for="inputTipo">Tipo/Clase</label>
		      <input type="text" class="form-control" id="inputTipo" name="tipo" value="<?php echo $tipo; ?>" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="[A-Z]+"  title="Error! Ejemplo: VAGONETA"  required>
		    </div>
		    <div class="form-group col-md-3">
		      <label for="inputAño">Año</label>
		      <input type="text" class="form-control" id="inputAño" name="año" value="<?php echo $año; ?>" pattern="^[0-9]{4}" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" minlength="4" maxlength="4"  title="Error! Ejemplo: 2000" required>
		    </div>
		   </div>
		    <!-- Fila 2-->
		    <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputChasis">VIN/Serie N° Chasis</label>
			      <input type="text" class="form-control" id="inputChasis" name="chasis" value="<?php echo $chasis; ?>" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="[A-Z0-9]{5}[-.]{1}[A-Z0-9]{6}" title="Error! Ejemplo: A1B2C-D3E4F6" required>
			    </div>
			    <div class="form-group col-md-3">
			      <label for="inputMarca">Marca</label>
			      <input type="text" class="form-control" id="inputMarca" name="marca" value="<?php echo $marca; ?>" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="[A-Z]+"  title="Error! Ejemplo: TOYOTA" required>
			    </div>
			    <div class="form-group col-md-3">
			      <label for="inputIndustria">Industria</label>
			      <input type="text" class="form-control" id="inputIndustria" name="industria" value="<?php echo $industria; ?>" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="[A-Z]+"  title="Error! Ejemplo: JAPONESA" required>
			    </div>
	   	    </div>
	   	    <!-- Fila 3-->
	   	    <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputSerieMotor">Serie y N° Motor</label>
			      <input type="text" class="form-control" id="inputSerieMotor" name="motor" value="<?php echo $motor; ?>" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="[A-Z0-9]{5}[-.]{1}[A-Z0-9]{6}" title="Error! Ejemplo: A1B2C-D3E4F6" required>
			    </div>
			    <div class="form-group col-md-3">
			      <label for="inputModelo">Modelo</label>
			      <input type="text" class="form-control" id="inputModelo" name="modelo" value="<?php echo $modelo; ?>" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="[A-Z]+"  title="Error! Ejemplo: HILUX" required>
			    </div>
			    <div class="form-group col-md-3">
			      <label for="inputColor">Color</label>
			      <input type="text" class="form-control" id="inputColor" name="color" value="<?php echo $color; ?>" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="[A-Z]+"  title="Error! Ejemplo: BLANCO" required>
			    </div>
	   	    </div>
	   	    <!-- Caracteristicas del vehiculo -->
	   	    <h4 class="subtitulo">II. Cracterisicas del Vehiculo:</h4>
	   	    <!-- Fila 1-->
	   	    <h4 class="subtitulo">Motor </h4>
	   	    <div class="form-row">
			    <div class="form-group col-md-4">
			      <label for="inputCilindrada">Cilindrada</label>
			      <input type="text" class="form-control" id="inputCilindrada" name="cilindrada" value="<?php echo $cilindrada; ?>" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="[0-9]{3,7}" title="Nesesario entre 4 a 6 digitos" required>
			    </div>
			    <div class="form-group col-md-4" >
			      <label for="inputCilindros">N° de Cilindros</label>
			      <select class="form-control " id="inputCilindros" name="n_cilindros" required>
			      	<?php if ($n_cilindros =="4") {
			      		?>
			      			<option value="4">4</option>
					        <option value="5">5</option>
					        <option value="6">6</option>
						<?php
			      	} else{
			      		if ($n_cilindros == "5") {
			      			?>
			      			<option value="4">4</option>
					        <option selected value="5">5</option>
					        <option value="6">6</option>
			      			<?php
			      		} else{
			      			?>
			      				<option value="4">4</option>
						        <option value="5">5</option>
						        <option selected value="6">6</option>
							<?php
			      		}
			      	}

			      	 ?>
			      </select>			     		      
			    </div>
			    <div class="form-group col-md-4">
			    	<label for="inputCombustible">Combustible</label>
	 				<select class="form-control " id="inputCombustible" name="combustible" required>
	 				   <?php if ($combustible == "GASOLINA") {
	 				   		?>
	 				   		<option selected value="GASOLINA" >GASOLINA</option>
	 				   		<option value="GAS NATURAL" >GAS NATURAL</option>
	 				   		<?php
	 				   }else{?>
							<option value="GASOLINA" >GASOLINA</option>
	 				   		<option selected value="GAS NATURAL" >GAS NATURAL</option>
	 				   	<?php
	 				   } ?>					   
					   
					</select>
 				</div>
	   	    </div>
	   	    <!-- Fila 2-->
	   	    <h4 class="subtitulo">Sistema de Transmisión</h4>
	   	    <div class="form-row">
			    <div class="form-group col-md-4">
			    	<label for="inputCaja">Caja</label>
	 				<select class="form-control " id="inputCaja" name="caja" required>	
	 					<?php if ($caja == "MECANICA") {
							?>
								<option selected value="MECANICA" >MECANICA</option>
					   			<option value="AUTOMATICA" >AUTOMATICA</option>
							<?php
						}else{
							?>
								<option value="MECANICA" >MECANICA</option>
						   		<option selected value="AUTOMATICA" >AUTOMATICA</option>
							<?php
						}?>       
					   
					</select>
 				</div>	

			    <div class="form-group col-md-4">
			    	<label for="inputTraccion">Tracción</label>
	 				<select class="form-control " id="inputTraccion" name="traccion" required>
	 					<?php if ($traccion == "SIMPLE") {
							?>
								<option selected value="SIMPLE" >SIMPLE</option>
					   			<option value="DOBLE" >DOBLE</option>
							<?php
						}else{
							?>
								<option value="SIMPLE" >SIMPLE</option>
					   			<option selected value="DOBLE" >DOBLE</option>
							<?php
						}?>				   
					</select>
 				</div>
			    <div class="form-group col-md-4">
			      <label for="inputNeumatico">Neumatico</label>
			      <input type="text" class="form-control" id="inputNeumatico" name="neumatico" value="<?php echo $neumatico; ?> " onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"  required>
			    </div>  
			    <div class="form-group col-md-12">
				    <label for="Observaciones">Observaciones</label>
				    <textarea type="text" class="form-control" id="Observaciones" rows="3" name="observaciones" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" ><?php echo $observaciones; ?> </textarea>
				</div> 
	   	    </div>
		  <button class="btn btn-success" name="actualizacion">Actualizar</button> 
	</form>
</div>
</body>
 </html>
