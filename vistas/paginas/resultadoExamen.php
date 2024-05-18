<div class="content-wrapper" style="min-height: 1058.31px;">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Registrar Resultados Examen Ecografia</h1>
          
        </div>

        <div class="col-sm-6">
 
          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

            <li class="breadcrumb-item active">Registro Resultado de Examen</li>

          </ol>

        </div>

      </div>

    </div><!-- /.container-fluid -->

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      
      <div class="card-header"> 

        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearExamen">Nuevo Registro</button>   


             

      </div>

      <div class="card-body">

        <table class="table table-bordered table-striped dt-responsive tablaResultadoExamen" width="100%">
          
          <thead>
            
            <tr>
              
              <th>CEDULA</th>
              <th>NOMBRE</th>
              <th>APELLIDO</th>
              <th>TITULO</th>
              <th>FECHA</th>
              <th>ACCIONES</th>

            </tr>


          </thead> 

          <tbody>
            
          <!--  <tr>
              
              <td>1312213711</td>
              <td>Jorge Andres</td>
              <td>Meza Jativa</td>
              <td>la fuente</td>
              <td>0969951849</td>
              <td>Tiempo completo</td>
              <td>6</td>
              <td></td>
              <td>Utm</td>
              <td>Magister</td>
              <td>
                
                <div class='btn-group'>

                <button class="btn btn-warning btn-sm">
                  <i class="fas fa-pencil-alt text-white"></i>
                </button> 

                 <button class="btn btn-danger btn-sm">
                  <i class="fas fa-trash-alt"></i>
                </button> 

                </div>

              </td>


            </tr> -->


          </tbody>


        </table>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">

      </div>
        <!-- /.card-footer-->

    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->

</div> 
<!-- =====================================
======================================-->

<div class="modal" id="crearExamen">

<div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Registrar Examen</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body"> 
            <!-- seleccionar la asignatura prueba -->

            <div class="input-group mb-3">

                <div class="input-group-append input-group-text">
                
                <span class="fas fa-user-tie"></span>

                </div>

                <select class="form-control" id="codPaciente" name="codPaciente" required style="width: 90%" required>

                <option value="">SELECCIONE EL PACIENTE</option> 

                <?php  
               
                $Paciente = ControladorPaciente::ctrMostrarPaciente(null, null); 

                foreach ($Paciente as $key => $value) {
                    
                    echo '<option value="'.$value["pac_codigo"].'">'.$value["pac_codigo"].'</option>';

                }


                ?>

                </select>     

                </div> 

                <!-- input nombre -->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="text" class="form-control input-lg nombre" id="nombre" name="nombre" readonly>
              
            
          </div>
          
        <!-- input apellidos-->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="text" class="form-control input-lg apellidos" id="apellidos" name="apellidos" readonly>
              
            
          </div> 

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

            <span class="fas fa-user-tie"></span>

            </div>

            <select class="form-control" id="codExamen" name="codExamen" required style="width: 90%" required>

            <option value="">SELECCIONE EL EXAMEN</option> 

            <?php  

            $Examen = ControladorPlantillaExamen::ctrMostrarPlantillaExamen(null, null); 

            foreach ($Examen as $key => $value) {
                
                echo '<option value="'.$value["tec_codigo"].'">'.$value["tec_titulo"].'</option>';

            }


            ?>

            </select>     

            </div>  

             <!-- input apellidos-->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
              <input type="text" class="form-control input-lg" id="tituloExamen" name="tituloExamen" placeholder="Ingrese el Titulo del examen">            
          </div> 
                   
            <p>FORMATO:</p>

                <div id="verFormato"></div>

        </div>    

          <?php 

          $registroRexamen = new ControladorResultadoExamen();
          $registroRexamen -> ctrCrearResultadoExamen();

        ?>

        <div class="modal-footer d-flex justify-content-between">
          
          <div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>

          <div>
             <button type="submit" class="btn btn-primary">Guardar</button>
          </div> 

        </div>

        </div> 

      </form>

    </div>

  </div>

</div> 
<!--=====================================
Modal Editar paciente
======================================-->

<div class="modal" id="editarResultadoExamen">

<div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Editar Resultado Examen</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body"> 
         
        <input type="text" name="editarReExa">
        <div class="input-group mb-3">

      <div class="input-group-append input-group-text">

      <span class="fas fa-user-tie"></span>

      </div>

      <select class="form-control" id="EditarcodExamen" name="EditarcodExamen" required style="width: 90%" required>

      <option value="">SELECCIONE EL EXAMEN</option> 

      <?php  

      $Examen = ControladorPlantillaExamen::ctrMostrarPlantillaExamen(null, null); 

      foreach ($Examen as $key => $value) {
          
          echo '<option value="'.$value["tec_codigo"].'">'.$value["tec_titulo"].'</option>';

      }


      ?>

      </select>     

      </div> 

      <!-- input apellidos-->
      <div class="input-group mb-3">
      <div class="input-group-append input-group-text">
      <span class="fas fa-user"></span>
      </div>
        <input type="text" class="form-control input-lg" id="editartituloExamen" name="editartituloExamen" value="">            
      </div> 
            
      <p>FORMATO:</p>

          <div id="verFormato"></div>
          
        </div>    

          <?php 

          // $editarexamen = new ControladorExamen();
          // $editarexamen -> ctrEditarExamen();

        ?>

        <div class="modal-footer d-flex justify-content-between">
          
          <div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>

          <div>
             <button type="submit" class="btn btn-primary">Guardar</button>
          </div> 

        </div>

        </div> 

      </form>

    </div>

  </div>

</div> 
