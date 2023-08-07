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
	  	<h2 class="titulo">CONTROL DE ESTADO</h2>  
	 	<table id="datatable" class="table table-hover table-condensed table-bordered">
		  <thead class="thead-dark">
		    <tr>		      
		      <th scope="col">PLACA</th>
		      <th scope="col">VIN/SERIE N° CHASIS</th>
		      <th scope="col">SERIE Y N° MOTOR</th>
		      <th scope="col">TIPO</th>
		      <th scope="col">MARCA</th>
		      <th scope="col">MODELO</th>
		      <th scope="col" align="center">ACCIONES</th>
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
			      <td align="center">			      	
			      	<a href="form_inventario.php?id= <?php echo $row['idregistro_vehiculo'] ?> " class="btn btn-secondary" title="Formularios de Control de Estado">
			      		<i class="fa fa-file-text-o" aria-hidden="true"></i> Registro de Estado
			      	</a>
			      </td>
			    </tr>
		  	<?php } ?>
		    
		  </tbody>
		</table>
	 </div>
<?php  require_once "vistas/parte_inferior.php" //?>