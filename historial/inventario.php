<?php 
require_once "vistas/parte_superior.php"; 
include("../conexion/con_db.php"); 
$id = $_GET['id'];
$c=0;
?>
 <div>    	
	  	 <h1 class="titulo">REGISTROS DE INVENTARIO</h1>  
	 	<table id="datatable" class="table table-hover table-condensed table-bordered">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">N°</th>		      
		      <th scope="col">LUGAR</th>
		      <th scope="col">UNIDAD</th>
		      <th scope="col">FECHA</th>
		      <th scope="col">HORA</th>
		      <th scope="col">CIUDAD</th>
		      <th scope="col">MOTIVO</th>
		      <th scope="col">FUNCIONARIO</th>
		      <th scope="col">RESPONSABLE</th>
		      <th scope="col" align="center">ACCIONES</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
		  	$query = "SELECT * FROM inventario WHERE idregistro_vehiculo = $id";
		  	$resultado_reg = mysqli_query($conex,$query);
		  	while ($row = mysqli_fetch_array($resultado_reg)) { ?>
		  		<tr>	
		  		  <td scope="row"> <?php $c= $c +1; echo $c ?> </td>		      
			      <td > <?php echo $row['lugar'] ?> </td>
			      <td> <?php echo $row['unidad'] ?> </td>
			      <td> <?php echo $row['fecha'] ?> </td>
			      <td> <?php echo $row['hora'] ?> </td>
			      <td> <?php echo $row['ciudad'] ?> </td>
			      <td> <?php echo $row['motivo'] ?> </td>
			      <td> <?php echo $row['funcionario'] ?> </td>
			      <td> <?php echo $row['responsable'] ?> </td>
			      <td>			      	
			      	<a href="pdf_inventario.php?idI= <?php echo $row['idinventario'] ?> " class="btn btn-secondary" title="Generar PDF">
				      <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
				    </a>
				    <a href="ver_inventario.php?idI= <?php echo $row['idinventario'] ?> " class="btn btn-info" title="Ver Registro">
			      		<i class="fa fa-eye" aria-hidden="true"></i>
			      	</a>
			      </td>
			    </tr>
		  	<?php } ?>		    
		  </tbody>
		</table>
	 </div>

<?php
require_once "vistas/parte_inferior.php"; ?>
