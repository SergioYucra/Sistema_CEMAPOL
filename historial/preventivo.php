<?php 
require_once "vistas/parte_superior.php"; 
include("../conexion/con_db.php"); 
$id = $_GET['id'];
$c=0;
?>
 <div>    	
	  	<h1 class="titulo">REGISTROS MANTENIMIENTO PREVENTIVO</h1>  
	 	<table id="datatable" class="table table-hover table-condensed table-bordered">
		  <thead class="thead-dark">
		    <tr>	
		      <th scope="col">Nº</th>	      
		      <th scope="col">LUGAR</th>	      
		      <th scope="col">FECHA</th>
		      <th scope="col">HORA</th>
		      <th scope="col">UNIDAD</th>
		      <th scope="col">CIUDAD</th>
		      <th scope="col">FUNCIONARIO</th>
		      <th scope="col">RESPONSABLE</th>
		      <th scope="col" align="center">ACCIONES</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
		  	$query = "SELECT * FROM mant_preventivo WHERE idregistro_vehiculo = $id";
		  	$resultado_reg = mysqli_query($conex,$query);
		  	while ($row = mysqli_fetch_array($resultado_reg)) { 
		  		$idDA=$row['iddatos_generales'];
				$consul = "SELECT * FROM datos_generales WHERE iddatos_generales = '$idDA'";
				$res = mysqli_query($conex,$consul);
				$ruw = mysqli_fetch_array($res);
				$lugar = $ruw['lugar'];
				$fecha = $ruw['fecha'];
				$hora = $ruw['hora'];
				$unidad = $ruw['unidad'];
				$ciudad = $ruw['ciudad'];
		  		?>
		  		<tr>			      
			      <td scope="row"> <?php $c= $c +1; echo $c ?> </td>
			      <td> <?php echo $lugar; ?> </td>
			      <td scope="row"> <?php echo $fecha; ?> </td>
			      <td> <?php echo $hora; ?> </td>
			      <td> <?php echo $unidad; ?> </td>
			      <td> <?php echo $ciudad ?> </td>
			      <td> <?php echo $row['funcionario'] ?> </td>
			      <td > <?php echo $row['responsable'] ?> </td>
			      <td>			      	
			      	<a href="pdf_preventivo.php?idM= <?php echo $row['idmant_preventivo'] ?> " class="btn btn-secondary" title="Generar PDF">
				      <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
				    </a>
				    <a href="ver_preventivo.php?mant= <?php echo $row['idmant_preventivo'] ?> " class="btn btn-info" title="Ver Registro">
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