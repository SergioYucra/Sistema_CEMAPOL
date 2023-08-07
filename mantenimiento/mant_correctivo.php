<?php  require_once "vistas/parte_superior.php" ?>
<?php 
	if (isset($_GET['id'])) {
		$idV = $_GET['id'];	
	}	
?>
<div class=" container" id='form'>
	<h1 class="titulo">MANTENIMIENTO CORRECTIVO</h1>
	<br>
	<!-- Formulario -->
	<form method="POST" action="guardar_correctivo.php" >
		 <!-- Iniciando DATOS DE IDENTIFICACION-->
		  <h4 class="subtitulo">I. Datos Generales:</h4>
		  <!-- Fila 1-->
		  <input type="hidden" id="inputNro" name="idV" value="<?php echo $idV; ?>">
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
	   	    <h4 class="subtitulo">III. Trabajos realizado de Mantenimiento Correctivo:</h4>
	   	    <!-- Fila 1-->	   	    
	   	    <div class="form-row">
	   	    	<div class="form-group col-md-6">
	   	    		<h6 class="subtitulo">Motor y Sistemas del Motor</h6> 
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="MOTOR" id="inputOp1" name="op[]">
					  <label class="form-check-label" for="inputOp1">
					    MOTOR
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="SISTEMA DE ALIMENTACION" id="inputOp2" name="op[]">
					  <label class="form-check-label" for="inputOp2">
					    SISTEMA DE ALIMENTACION
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="SISTEMA DE REFRIGERACION" id="inputOp3" name="op[]"> 
					  <label class="form-check-label" for="inputOp3">
					    SISTEMA DE REFRIGERACION
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="SISTEMA DE LUBRICACION" id="inputOp4" name="op[]"> 
					  <label class="form-check-label" for="inputOp4">
					    SISTEMA DE LUBRICACION
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="SISTEMA DE DISTRIBUCION" id="inputOp5" name="op[]"> 
					  <label class="form-check-label" for="inputOp5">
					    SISTEMA DE DISTRIBUCION
					  </label>
					</div>
				</div>
				<div class="form-group col-md-6">
					<h6 class="subtitulo">Sistemas Mecanicos</h6> 
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="TRANSMISION DE POTENCIA" id="inputOpc1" name="opc[]">
					  <label class="form-check-label" for="inputOpc1">
					    TRANSMISION DE POTENCIA
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="SISTEMA DE FRENO" id="inputOpc2" name="opc[]">
					  <label class="form-check-label" for="inputOpc2">
					    SISTEMA DE FRENO
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="SISTEMA DE DIRECCION" id="inputOpc3" name="opc[]"> 
					  <label class="form-check-label" for="inputOpc3">
					    SISTEMA DE DIRECCION
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="SISTEMA DE SUSPRECION" id="inputOpc4" name="opc[]"> 
					  <label class="form-check-label" for="inputOpc4">
					    SISTEMA DE SUSPRECION
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="TREN DE ROTADURA" id="inputOpc5" name="opc[]"> 
					  <label class="form-check-label" for="inputOpc5">
					    TREN DE ROTADURA
					  </label>
					</div>
				</div>
			</div>
	   	    <!-- Fila 2-->	
	   	    <div class="form-row">
	   	    	<div class="form-group col-md-6">
	   	    		<h6 class="subtitulo">Sistema Electrico</h6> 
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="ENCENDIDO" id="inputOpci1" name="opci[]">
					  <label class="form-check-label" for="inputOpci1">
					    ENCENDIDO
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="ARRANQUE" id="inputOpci2" name="opci[]">
					  <label class="form-check-label" for="inputOpci2">
					    ARRANQUE
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="CARGA" id="inputOpci3" name="opci[]"> 
					  <label class="form-check-label" for="inputOpci3">
					    CARGA
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="ILUMINACION" id="inputOpci4" name="opci[]"> 
					  <label class="form-check-label" for="inputOpci4">
					    ILUMINACION
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="TABLERO MULTIFUNCIONAL DE CONTROL" id="inputOpci5" name="opci[]"> 
					  <label class="form-check-label" for="inputOpci5">
					    TABLERO MULTIFUNCIONAL DE CONTROL
					  </label>
					</div>
				</div>
				<div class="form-group col-md-6">
					<h6 class="subtitulo">Estructura de la Carroceria y Chasis(Bastidor)</h6> 
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="CHAPA Y PINTURA EN GENERAL" id="inputOpco1" name="opco[]">
					  <label class="form-check-label" for="inputOpco1">
					    CHAPA Y PINTURA EN GENERAL
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="CHAPA Y PINTURA PARCIAL" id="inputOpco2" name="opco[]">
					  <label class="form-check-label" for="inputOpco2">
					    CHAPA Y PINTURA PARCIAL
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="ARCO" id="inputOpco3" name="opco[]"> 
					  <label class="form-check-label" for="inputOpco3">
					    ARCO
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="PUERTAS" id="inputOpco4" name="opco[]"> 
					  <label class="form-check-label" for="inputOpco4">
					    PUERTAS
					  </label>
					</div>					
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="SOLDADURA: AUTOGENO" id="inputOpco5" name="opco[]"> 
					  <label class="form-check-label" for="inputOpco5">
					    SOLDADURA: AUTOGENO
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="MECANISMO: LEVENTA VIDRIOS" id="inputOpco6" name="opco[]"> 
					  <label class="form-check-label" for="inputOpco6">
					    MECANISMO: LEVENTA VIDRIOS
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="SELLADO DE PARABRISAS" id="inputOpco7" name="opco[]"> 
					  <label class="form-check-label" for="inputOpco7">
					    SELLADO DE PARABRISAS
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="OTROS" id="inputOpco8" name="opco[]"> 
					  <label class="form-check-label" for="inputOpco8">
					    OTROS
					  </label>
					</div>
				</div>
				<div class="form-group col-md-12">
				    <label for="Detalle">Detalle del trabajo</label>
				    <textarea type="text" class="form-control" id="Detalle" rows="3" name="detalle" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="^[A-Z0-9 -?]+$"  title="Resumen del trabajo "></textarea>
				</div>
			</div>

		  <input type="submit" class="btn btn-success" name="entrale" value="Registrar"> 
		  
		  <button type="button" class="btn btn-danger" onclick="location.href='lista.php'">Cancelar</button>
	</form>
</div>





<?php  require_once "vistas/parte_inferior.php" ?>