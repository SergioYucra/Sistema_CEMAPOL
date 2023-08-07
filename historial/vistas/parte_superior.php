<!doctype html>
<html lang="en">
  <head>
  	<title>CEMAPOL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Boostrap -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">		
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="https:////cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../css/alertify.css">
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
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
			<h1>
				<a href="../principal.php" class="logo" >
					<img src="../img/logo.png" height="70px" width="70px" align="center"> 
				</a>
			</h1>
			<!--
			<div class="footer" align="center" >
			    <p>Centro de Mantenimiento Policial</p>
			</div> 
		-->
        <ul class="list-unstyled components mb-5">

          <li class="active">
            <a href="../principal.php"><span class="fa fa-home"></span>Inicio</a>
          </li>
          <li>
            <a href="../usuario/login.php"><span class="fa fa-user-circle-o"></span>Administrador</a>
          </li>
		  <li>
            <a href="../registro/reg_vehiculos.php"><span class="fa fa-car"></span> Registros</a>
          </li>
          <li>
            <li>
            <a href="../estado/lista_estado.php"><span class="fa fa-search"></span>Control de Estado</a>
          </li>
          <li>
            <a href="../mantenimiento/lista.php"><span class="fa fa-wrench"></span>Mantenimiento</a>
          </li>
           <li>
            <a href="historial.php"><span class="fa fa-database"></span>Historial</a>
          </li>
        </ul>

        <div class="footer" align="center">
        	<p>
					  Copyright © 2020 <br>Centro de Mantenimiento Policial
					</p>
        </div>
    	</nav>
    	<!-- Contenido de pagina  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php"><i class="fa fa-power-off"></i> Cerrar Seccion</a>
                </li><!--
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>-->
              </ul>
            </div>
          </div>
        </nav>