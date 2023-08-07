<?php include("../conexion/con_db.php"); 
require_once "vistas/parte_superior.php" ?>
	<?php if(isset($_SESSION['message'])){ ?> 
		<div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
			<?= $_SESSION['message']?>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	<?php session_unset(); }//vaciar datos ?>
	
    <div>    	
	  	<h2 class="titulo">MANTENIMIENTO</h2>
	 	<table id="datatable" class="table table-hover table-condensed table-bordered">
		  <thead class="thead-dark">
		    <tr>		      
		      <th scope="col">PLACA</th>
		      <th scope="col">VIN/SERIE N° CHASIS</th>
		      <th scope="col">SERIE Y N° MOTOR</th>
		      <th scope="col">TIPO</th>
		      <th scope="col">MARCA</th>
		      <th scope="col">MODELO</th>
		      <th scope="col">AÑO</th>
		      <th scope="col">INDUSTRIA</th>
		      <th scope="col">MANTENIMIENTO PREVENTIVO</th>
		      <th scope="col" align="center">MANTENIMIENTO CORRECTIVO</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
		  	$query = "SELECT * FROM registro_vehiculo";
		  	$resultado_reg = mysqli_query($conex,$query);
		  	while ($row = mysqli_fetch_array($resultado_reg)) { ?>
		  		<tr>			      
			      <td scope="row"> <?php echo $row['placa'] ?> </td>
			      <td> <?php echo $row['n_chasis'] ?> </td>
			      <td> <?php echo $row['n_motor'] ?> </td>
			      <td> <?php echo $row['tipo'] ?> </td>
			      <td> <?php echo $row['marca'] ?> </td>
			      <td> <?php echo $row['modelo'] ?> </td>
			      <td> <?php echo $row['año_fab'] ?> </td>
			      <td> <?php echo $row['industria'] ?> </td>
			      <td align="center">
			      	<a href="mant_preventivo.php?id= <?php echo $row['idregistro_vehiculo'] ?> " class="btn btn-secondary" title="Formulario de Manteniento Preventivo">
			      		<i class="fa fa-cog" aria-hidden="true"></i> Preventivo&nbsp;
			      	</a>
			      </td>
			      <td align="center">			      				      	
			      	<a href="mant_correctivo.php?id= <?php echo $row['idregistro_vehiculo'] ?> " class="btn btn-dark" title="Formulario de Manteniento Correctivo">
			      		<i class="fa fa-cogs" aria-hidden="true"></i> Correctivo
			      	</a>
			      </td>
			    </tr>
		  	<?php } ?>
		    
		  </tbody>
		</table>
	 </div>
<?php  require_once "vistas/parte_inferior.php" //?>