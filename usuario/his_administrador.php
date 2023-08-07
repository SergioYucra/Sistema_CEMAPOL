<?php 
require_once "vistas/parte_superior.php";
include("../conexion/con_db.php");

?>
<h2 class="titulo">HISTORIAL DE REGISTROS MODO ADMINISTRADOR</h2>  
<?php if(isset($_SESSION['message'])){ ?> 
    <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
      <?= $_SESSION['message']?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php session_unset(); }//vaciar datos ?>
<div>  
    <table id="datatable" class="table table-hover table-condensed table-bordered">
      <thead class="thead-dark">
        <tr>          
          <th scope="col">PLACA</th>
          <th scope="col">MARCA</th>
          <th scope="col">MODELO</th>
          <th scope="col">HISTORIAL INVENTARIO</th>  
          <th scope="col">HISTORIAL DIAGNOSTICO</th>
          <th scope="col">HISTORIAL PREVENTIVO</th>
          <th scope="col">HISTORIAL CORRECTIVO</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $query = "SELECT * FROM registro_vehiculo";
        $resultado_reg = mysqli_query($conex,$query);
        while ($row = mysqli_fetch_array($resultado_reg)) { ?>
          <tr>            
            <td scope="row"> <?php echo $row['placa'] ?> </td>
            <td> <?php echo $row['marca'] ?> </td>
            <td> <?php echo $row['modelo'] ?> </td>
            <td align="center"> 
              <a href="inventario.php?id= <?php echo $row['idregistro_vehiculo'] ?> " class="btn btn-secondary" title="Histotial de Inventarios">
                <i class="fa fa-file-text-o" aria-hidden="true"></i> Inventario&nbsp;
              </a>  
            </td>
            <td align="center">
              <a href="diagnostico.php?id= <?php echo $row['idregistro_vehiculo'] ?> " class="btn btn-dark" title="Historial de Diagnosticos">
                <i class="fa fa-bar-chart" aria-hidden="true"></i> Diagnostico&nbsp;
              </a> 
            </td>
            <td align="center"> 
              <a href="preventivo.php?id= <?php echo $row['idregistro_vehiculo'] ?> " class="btn btn-secondary" title="Historial de Mantenimientos Preventivos">
                <i class="fa fa-cog" aria-hidden="true"></i> Preventivo&nbsp;
              </a>
            </td>
            <td align="center">
              <a href="correctivo.php?id= <?php echo $row['idregistro_vehiculo'] ?> " class="btn btn-dark" title="Historial de Mantenimientos Correctivos">
                <i class="fa fa-cogs" aria-hidden="true"></i> Correctivo
              </a>              
            </td>
          </tr>
        <?php } ?>
        
      </tbody>
    </table>
</div>
<?php
require_once "vistas/parte_inferior.php";?>