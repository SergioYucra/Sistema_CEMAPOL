<?php 
	$alert= '';
	if (!empty($_POST)) {
		if (empty($_POST['password'])) 
		{//Pregunta si se lleno los campos
			?>
			  <div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Error!</strong> Llene todos los datos.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
			  </div>
			
			<?php
		}else{
			$pass = $_POST['password'];
			$cont= "cemapol";
				if($pass == $cont){
				    echo "<script>location.href='principal.php'</script>";
				}
				
				//echo "<script>location.href='admi_registros.php'</script>";
					else{//Si no existen esos datos en la base de datos
				?>
				<script type="text/javascript">
          
        </script>
				<?php
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CEMAPOL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Boostrap -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">		
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https:////cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="css/alertify.css">
    <style type="text/css">
    #font-variant-numeric: {
      padding: 5em;
      width: 60em;
    }
    .subtitulo{
      color: #556B2F;
      font-weight: bold;
    }
    .titulo{
      color: #556B2F;
      font-weight: bold;
      text-align: center;
    }
    label{
      color: #556B2F;
    }
  </style>
   <style type="text/css">
		#secion{
			
			width: 30em;
		}
	</style>
</head>
<body>
	<br><br><br><br><br>
	<!--Formulario de logeo -->
<div class=" container" id='secion'>
	<div class="card card-login mx-auto text-center bg-dark">
		<div class="card-header mx-auto bg-dark">
			<span> 
				<img src="img/logo.png"  width="100" height="100" alt="Logo"> 
			</span><br/>
            <span class="logo_title mt-5"> Sistema de Registro y Control Mecanico </span>
        </div>
        <div class="card-body">
			<form method="post">
				        <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" name="password" placeholder="password">
                </div>
                <div class="form-group">
                   	<button type="submit" value="Ingresar" class="btn btn-success" name="reg">Ingresar al Sistema</button>
                </div>
			</form>
		</div>		
	</div>
</div>
 	<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/alertify.js"></script>
    <script src="js/main.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>    
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
      $(document).ready( function () {
          $('#datatable').DataTable({
                "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
           },
           "sProcessing":"Procesando...",
            }
          });
      } );
    </script>
</body>
</html>