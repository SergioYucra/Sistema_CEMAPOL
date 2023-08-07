<?php  require_once "vistas/parte_superior.php" ?>

<style type="text/css">
.rotador{
  width: 220px;
  height: 220px; 
  border: 3px solid #556B2F;
  border-radius: 20px;
  transition: width 1s, height 1s, transform 0s;
  text-align: center;
}
.rotador:hover{
  width: 220px;
  height: 220px;
  transform: rotate(2deg);
}
#img{
display:block;
margin:auto;
}
</style>
<!-- carrusel imagenes -->
      <footer class="container">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/img1.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/img2.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/img3.jpeg" class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
      </footer>
<!-- fin del carusel  -->
<article class="container">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <br><br>
  </div>
</article>
<br>
<!-- Contenedor de Descripcion-->
      <footer>
        <div class="container">
            <section class="main row" >
              <article class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div id="img" class="rotador"> 
                  <img src="img/img4.png" width="170px">
                  <br><br>
                  <h2>Inventario</h2>
                </div>
                <br><br><br>
              </article>

              <aside class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div id="img" class="rotador" > 
                  <img src="img/img5.png" width="180px" align="center">
                  <br><br><br>
                  <h2>Diagnostico</h2>
                </div>
                <br><br><br>
              </aside>
              <aside class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div id="img" class="rotador"> 
                  <img src="img/img6.png" width="180px" align="center">
                  <br><br><br>
                  <h2>Mantenimiento</h2>
                </div>
                <br><br><br>
              </aside>
            </section>
        </div>
      </footer>
<!--  fin del contenedor --->
<?php  require_once "vistas/parte_inferior.php" ?>
       