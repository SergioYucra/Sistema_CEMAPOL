<?php  require_once "vistas/parte_superior.php" ?>


<!-- formulario -->
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
	<?php 
		if (isset($_GET['id'])) {
				$idNro = $_GET['id'];				
			}
	 ?>
	<h1 class="titulo">MANTENIMIENTO PREVENTIVO</h1>
	<br>
	<!-- Formulario -->
	<form method="POST" action="guardar_preventivo.php" >
				  <!-- Iniciando DATOS DE IDENTIFICACION-->
		  <h4 class="subtitulo">I. Datos Generales :</h4>
		  <!-- Fila 1-->
		  <input type="hidden" id="inputNro" name="idNro" value="<?php echo $idNro; ?>">
		  <div class="form-row">
		    <div class="form-group col-md-4">
		      <label for="inputLugar">Lugar</label>
		      <input type="text"  class="form-control" id="inputLugar" name="lugar" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="[A-Z]*" title="Error! Ejemplo: CEMAPOL" required >
		    </div>
		    <div class="form-group col-md-5">
		      <label for="inputUnidad">Unidad</label>
		      <input type="text" class="form-control" id="inputUnidad" name="unidad" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="^[A-Z\s]+$" title="Error! Ejemplo: EPI SUR" required>
		    </div>
		    <div class="form-group col-md-3">
		      <label for="inputCiudad">Ciudad</label>
			      <select class="form-control " id="inputCiudad" name="ciudad" required>
			        <option value="LA PAZ">LA PAZ</option>
			        <option value="ORURO">ORURO</option>
			        <option value="COCHABAMBA">COCHABAMBA</option>
			        <option value="SANTA CRUZ">SANTA CRUZ</option>
			        <option value="CHUQUISACA">CHUQUISACA</option>
			        <option value="BENI">BENI</option>
			        <option value="PANDO">PANDO</option>
			        <option value="TARIJA">TARIJA</option>
			        <option value="POTOSI">POTOSI</option>
			      </select>
		    </div>
		  </div>
		    <!-- Fila 2-->
		    <h4 class="subtitulo">II. Datos participantes:</h4>
		    <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="inputFuncionario">Funcionario CEMAPOL</label>
		      <input type="text"  class="form-control" id="inputFuncionario" name="funcionario" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="^[A-Z\s]+$" title="Error! Ejemplo: JUAN CALDERON" required >
		    </div>
		    <div class="form-group col-md-6">
		      <label for="inputResponsable">Responsable del vehiculo</label>
		      <input type="text" class="form-control" id="inputResponsable" name="responsable" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="^[A-Z\s]+$" title="Error! Ejemplo: JUAN CALDERON" required>
		    </div>
		  </div>
	   	    <!-- Caracteristicas del vehiculo -->
	   	    <h4 class="subtitulo">III. Mantenimiento realizado:</h4>
	   	    <!-- Fila 1-->	  
	   	    <h6 class="subtitulo"> Cambio de Aceite de Motor</h6> 	 
	   	    <br>   
	   	    <div class="form-row">	   	    	
	   	    	<div class="form-group col-md-3">
					<div class="form-check form-check-inline">
				      <label>&nbsp;&nbsp;&nbsp;&nbsp;</label>
				      <input class="form-check-input" type="radio" name="a_motor" id="inputCam1" value="10W40" required>
					  <label class="form-check-label" for="inputCam1">10W40</label>
					</div>
				</div>
			    <div class="form-group col-md-3">
			    	<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="a_motor" id="inputCam2" value="15W40" >
					  <label class="form-check-label" for="inputCam2">15W40</label>
					</div>
				</div>
				<div class="form-group col-md-3">
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="a_motor" id="inputCam3" value="20W50">
					  <label class="form-check-label" for="inputCam3">20W50</label>
					</div>
				</div>
				<div class="form-group col-md-3">					
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="a_motor" id="inputCam4" value="SAE 40">
					  <label class="form-check-label" for="inputCam4">SAE 40</label>
					</div>
				</div>				
	   	    </div>
	   	    <br>
	   	    <h6 class="subtitulo"> Cambio de Aceite de Caja</h6> 
	   	    <br>	    
	   	    <div class="form-row">	   	    	
	   	    	<div class="form-group col-md-3">
					<div class="form-check form-check-inline">
				      <label>&nbsp;&nbsp;&nbsp;&nbsp;</label>
				      <input class="form-check-input" type="radio" name="a_caja" id="inputCac1" value="80W90 " required>
					  <label class="form-check-label" for="inputCac1">80W90</label>
					</div>
				</div>
			    <div class="form-group col-md-3">
			    	<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="a_caja" id="inputCac2" value="85W140">
					  <label class="form-check-label" for="inputCac2">85W140</label>
					</div>
				</div>
				<div class="form-group col-md-3">
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="a_caja" id="inputCac3" value="250">
					  <label class="form-check-label" for="inputCac3">250</label>
					</div>
				</div>			
	   	    </div>
	   	    <br>
	   	    <h6 class="subtitulo"> Cambio de Aceite de Transmision</h6> 
	   	    <br>	    
	   	    <div class="form-row">	   	    	
	   	    	<div class="form-group col-md-3">
					<div class="form-check form-check-inline">
				      <label>&nbsp;&nbsp;&nbsp;&nbsp;</label>
				      <input class="form-check-input" type="radio" name="a_trasmision" id="inputCat1" value="80W90" required>
					  <label class="form-check-label" for="inputCat1">80W90</label>
					</div>
				</div>
			    <div class="form-group col-md-3">
			    	<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="a_trasmision" id="inputCat2" value="85W140">
					  <label class="form-check-label" for="inputCat2">85W140</label>
					</div>
				</div>
				<div class="form-group col-md-3">
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="a_trasmision" id="inputCat3" value="250">
					  <label class="form-check-label" for="inputCat3">250</label>
					</div>
				</div>			
	   	    </div>
	   	    <br>
	   	    <h6 class="subtitulo">Engrase </h6> 
	   	    <br>
	   	    <div class="form-row">
	   	    	<div class="form-group col-md-3">
	   	    		<div class="form-check form-check-inline">
	   	    		  <label>&nbsp;&nbsp;&nbsp;&nbsp;</label>
					  <input class="form-check-input" type="checkbox" id="inputOp1" value="JUNTAS" name="op1">
					  <label class="form-check-label" for="inputOp1">JUNTAS</label>
					</div>
				</div>	
	   	    	<div class="form-group col-md-3">
	   	    		<div class="form-check form-check-inline">
					  <input class="form-check-input" type="checkbox" id="inputOp2" value="PUNTA EJE" name="op2">
					  <label class="form-check-label" for="inputOp2">PUNTA EJE</label>
					</div>
				</div>
				<div class="form-group col-md-3">
	   	    		<div class="form-check form-check-inline">
					  <input class="form-check-input" type="checkbox" id="inputOp3" value="MUÑON" name="op3">
					  <label class="form-check-label" for="inputOp3">MUÑON</label>
					</div>
				</div>
				<div class="form-group col-md-3">
	   	    		<div class="form-check form-check-inline">
					  <input class="form-check-input" type="checkbox" id="inputOp4" value="BUJES" name="op4">
					  <label class="form-check-label" for="inputOp4">BUJES</label>
					</div>
				</div>
			</div>
	   	    <br>
	   	    <h6 class="subtitulo">Limpieza </h6> 
	   	    <br>
	   	    <div class="form-row">
	   	    	<div class="form-group col-md-3">
	   	    		<div class="form-check form-check-inline">
	   	    		  <label>&nbsp;&nbsp;&nbsp;&nbsp;</label>
					  <input class="form-check-input" type="checkbox" id="inputOpc1" value="LAVADO" name="opc1">
					  <label class="form-check-label" for="inputOpc1">LAVADO</label>
					</div>
				</div>	
	   	    	<div class="form-group col-md-3">
	   	    		<div class="form-check form-check-inline">
					  <input class="form-check-input" type="checkbox" id="inputOpc2" value="ASPIRADO" name="opc2">
					  <label class="form-check-label" for="inputOpc2">ASPIRADO</label>
					</div>
				</div>
				<div class="form-group col-md-3">
	   	    		<div class="form-check form-check-inline">
					  <input class="form-check-input" type="checkbox" id="inputOpc3" value="FUMIGADO" name="opc3">
					  <label class="form-check-label" for="inputOpc3">FUMIGADO</label>
					</div>
				</div>
			</div>

		  <input type="submit" class="btn btn-success" name="entrale" value="Registrar"> 
		  
		  <button type="button" class="btn btn-danger" onclick="location.href='lista.php'">Cancelar</button>
	</form>
</div>

<?php  require_once "vistas/parte_inferior.php" ?>