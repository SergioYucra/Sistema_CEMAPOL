<?php  require_once "vistas/parte_superior.php" ?>
<?php include("../conexion/con_db.php") ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
<style type="text/css">
	#font-variant-numeric: {
		padding: 5em;
		width: 60em;
	}
	.subtitulo{
		color: #556B2F;
		font-weight: bold;
	}
	label{
		color: #556B2F;
	}
</style>
</head>
<body>
	
<div class=" container" id='form'>
	<?php if(isset($_SESSION['message'])){ ?> 
		<div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
			<strong></strong>  <?= $_SESSION['message']?>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	<?php session_unset(); } ?>
	<!-- Boton para volver -->
	<button class="btn btn-danger pull-right" onclick="location.href='admi_registros.php'">x</button>
	
	<br>
	<!-- Formulario -->
	<form method="POST" action="guardar_registro.php">
				  <!-- Iniciando DATOS DE IDENTIFICACION-->
		  <h4 class="subtitulo">I. Datos de identificacion del vehiculo:</h4>
		  <!-- Fila 1-->
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="inputPlaca">Placa de control</label>
		      <input type="text"  class="form-control" id="inputPlaca" name="placa" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" minlength="7" maxlength="8" pattern="[0-9]{3,4}[-.]{1}[A-Z]{3}" title="Error! Ejemplo: 1111-ABC" required >
		    </div>
		    <div class="form-group col-md-3">
		      <label for="inputTipo">Tipo/Clase</label>
		      <input type="text" class="form-control" id="inputTipo" name="tipo" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="[A-Z]+"  title="Error! Ejemplo: VAGONETA" required>
		    </div>
		    <div class="form-group col-md-3">
		      <label for="inputAño">Año</label>
		      <input type="text" class="form-control" id="inputAño" name="año" pattern="^[0-9]{4}" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" minlength="4" maxlength="4"  title="Error! Ejemplo: 2000"  required>
		    </div>
		   </div>
		    <!-- Fila 2-->
		    <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputChasis">VIN/Serie N° Chasis</label>
			      <input type="text" class="form-control" id="inputChasis" name="chasis" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="[A-Z0-9]{5}[-.]{1}[A-Z0-9]{6}" title="Error! Ejemplo: A1B2C-D3E4F6"  required>
			    </div>
			    <div class="form-group col-md-3">
			      <label for="inputMarca">Marca</label>
			      <input type="text" class="form-control" id="inputMarca" name="marca" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="[A-Z]+"  title="Error! Ejemplo: TOYOTA" required>
			    </div>
			    <div class="form-group col-md-3">
			      <label for="inputIndustria">Industria</label>
			      <input type="text" class="form-control" id="inputIndustria" name="industria" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="[A-Z]+"  title="Error! Ejemplo: JAPONESA" required>
			    </div>
	   	    </div>
	   	    <!-- Fila 3-->
	   	    <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputSerieMotor">Serie y N° Motor</label>
			      <input type="text" class="form-control" id="inputSerieMotor" name="motor" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="[A-Z0-9]{5}[-.]{1}[A-Z0-9]{6}" title="Error! Ejemplo: A1B2C-D3E4F6"   required>
			    </div>
			    <div class="form-group col-md-3">
			      <label for="inputModelo">Modelo</label>
			      <input type="text" class="form-control" id="inputModelo" name="modelo" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="[A-Z]+"  title="Error! Ejemplo: HILUX" required>
			    </div>
			    <div class="form-group col-md-3">
			      <label for="inputColor">Color</label>
			      <input type="text" class="form-control" id="inputColor" name="color" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="[A-Z]+"  title="Error! Ejemplo: BLANCO"  required>
			    </div>
	   	    </div>
	   	    <!-- Caracteristicas del vehiculo -->
	   	    <h4 class="subtitulo">II. Caracteristicas del Vehiculo:</h4>
	   	    <!-- Fila 1-->
	   	    <h4 class="subtitulo">Motor </h4>
	   	    <div class="form-row">
			    <div class="form-group col-md-4">
			      <label for="inputCilindrada">Cilindrada</label>
			      <input type="text" class="form-control" id="inputCilindrada" name="cilindrada" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="[0-9]{3,7}" title="Nesesario entre 4 a 6 digitos" required>
			    </div>
			    <div class="form-group col-md-4">
			      <label for="inputCilindros">N° de Cilindros</label>
			      <select class="form-control " id="inputCilindros" name="n_cilindros" required>
			        <option value="4">4</option>
			        <option value="5">5</option>
			        <option value="6">6</option>
			      </select>			     		      
			    </div>
			    <div class="form-group col-md-4">
			    	<label for="inputCombustible">Combustible</label>
	 				<select class="form-control " id="inputCombustible" name="combustible" required>				       
					   <option type="text" value="GASOLINA" >GASOLINA</option>
					   <option type="text" value="GAS NATURAL" >GAS NATURAL</option>
					</select>
 				</div>	
	   	    </div>
	   	    <!-- Fila 2-->
	   	    <h4 class="subtitulo">Sistema de Transmisión</h4>
	   	    <div class="form-row">
	   	    	<div class="form-group col-md-4">
			    	<label for="inputCaja">Caja</label>
	 				<select class="form-control " id="inputCaja" name="caja" required>				       
					   <option type="text" value="MECANICA" >MECANICA</option>
					   <option type="text" value="AUTOMATICA" >AUTOMATICA</option>
					</select>
 				</div>	
 				<div class="form-group col-md-4">
			    	<label for="inputTraccion">Tracción</label>
	 				<select class="form-control " id="inputTraccion" name="traccion" required>				       
					   <option type="text" value="SIMPLE" >SIMPLE</option>
					   <option type="text" value="DOBLE" >DOBLE</option>
					</select>
 				</div>	
			    <div class="form-group col-md-4">
			      <label for="inputNeumatico">Neumatico</label>
			      <input type="text" class="form-control" id="inputNeumatico" name="neumatico" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="^[A-Z0-9 -?]+$" required>
			    </div>
			   <div class="form-group col-md-12">
				    <label for="Observaciones">Observaciones</label>
				    <textarea type="text" class="form-control" id="Observaciones" rows="3" name="observaciones" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="^[A-Z0-9 -?]+$"  title="Ingrese algun tipo de observacion"></textarea>
				</div>
			    
	   	    </div>
		  <input type="submit" class="btn btn-success" name="entrale" > 
		  <button type="button" class="btn btn-danger" onclick="location.href='admi_registros.php'">Cancelar</button>
	</form>
</div>
</body>
</html>


<?php  require_once "vistas/parte_inferior.php" ?>