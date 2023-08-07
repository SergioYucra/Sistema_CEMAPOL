 
      </div>
		</div>
    
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/alertify.js"></script>
    <script type="text/javascript">
      function borrar(id){
          alertify.confirm("¿Seguro que quiere eliminar el registro?",
          function(){
            //alertify.success('Ok'); 
            window.location.href="eliminar_reg.php?del="+id;        
          },
          function(){
            //alertify.error('Cancel');
          });
      }
    </script>    
    <script type="text/javascript">
      function borrarCorectivo(id){
          alertify.confirm("¿Seguro que quiere eliminar el registro de Mantenimiento Correctivo?",
          function(){
            //alertify.success('Ok'); 
            window.location.href="eliminar_correctivo.php?del="+id;        
          },
          function(){
            //alertify.error('Cancel');
          });
      }
    </script> 
    <script type="text/javascript">
      function borrarPreventivo(id){
          alertify.confirm("¿Seguro que quiere eliminar el registro de Mantenimiento Preventivo?",
          function(){
            //alertify.success('Ok'); 
            window.location.href="eliminar_preventivo.php?del="+id;        
          },
          function(){
            //alertify.error('Cancel');
          });
      }
    </script> 
    <script type="text/javascript">
      function borrarInventario(id){
          alertify.confirm("¿Seguro que quiere eliminar el registro de Inventario?",
          function(){
            //alertify.success('Ok'); 
            window.location.href="eliminar_inventario.php?del="+id;        
          },
          function(){
            //alertify.error('Cancel');
          });
      }
    </script> 
    <script type="text/javascript">
      function borrarDiagnostico(id){
          alertify.confirm("¿Seguro que quiere eliminar el registro de Diagnostico?",
          function(){
            //alertify.success('Ok'); 
            window.location.href="eliminar_diagnostico.php?del="+id;        
          },
          function(){
            //alertify.error('Cancel');
          });
      }
    </script> 
    <script src="../js/main.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>    
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