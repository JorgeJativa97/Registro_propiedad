<div class="content-wrapper" style="min-height: 1058.31px;">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Registrar Plantilla de Examen</h1>
          

        </div>

        <div class="col-sm-6">
 
          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

            <li class="breadcrumb-item active">Registro de Plantilla de Examen</li>

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

        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearPlantillaExamen">Nuevo Registro</button>   


             

      </div>

      <div class="card-body">

        <table class="table table-bordered table-striped dt-responsive tablaPlantillaExamen" width="100%">
          
          <thead>
            
            <tr>
              
              <th>TIPO</th>
              <th>TITULO</th>
              <th>FORMATO</th>
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
Modal Crear paciente
======================================-->

<div class="modal" id="crearPlantillaExamen">

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

                <select class="form-control" id="nombreExamen" name="nombreExamen" required style="width: 90%" required>

                <option value="">SELECCIONE EXAMEN</option> 

                <?php  

               
                $Examen = ControladorExamen::ctrMostrarExamen(null, null); 

                foreach ($Examen as $key => $value) {
                    
                    echo '<option value="'.$value["texa_codigo"].'">'.$value["nom_texa"].'</option>';

                }


                ?>

                </select>     

                </div> 

    <!-- input nombre -->
          
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="text" class="form-control input-lg" id="titulo" name="titulo" placeholder="Titulo" required>
          </div>  

         <p>Escriba la descripción de la plantilla:</p>

            <textarea id="descripcionPlan" name="descripcionPlan" style="width: 100%"></textarea>
           
        </div>    

          <?php 

          $registroplantilla = new ControladorPlantillaExamen();
          $registroplantilla -> ctrCrearPalntillaExamen();

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

<div class="modal" id="editarPlantillaExamen">

<div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Editar Plantilla Examen</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body"> 
         
        <input type="text" name="editarPlantiExa">
          <!-- input nombre --> 
          <div class="input-group mb-3">

                <div class="input-group-append input-group-text">

                <span class="fas fa-user-tie"></span>

                </div>

                <select class="form-control" id="nombreExamenedit" name="nombreExamenedit" required style="width: 90%" required>

                <option value="">SELECCIONE EXAMEN</option> 

                <?php  


                $Examen = ControladorExamen::ctrMostrarExamen(null, null); 

                foreach ($Examen as $key => $value) {
                    
                    echo '<option value="'.$value["texa_codigo"].'">'.$value["nom_texa"].'</option>';

                }


                ?>

                </select>     

                </div> 

        <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="text" class="form-control input-lg" id="editartitulo" name="editartitulo" value="" required>
          </div> 
          
          <p>Escriba la descripción de la plantilla:</p>

            <textarea id="editardescripcionPlan" name="editardescripcionPlan" value="" style="width: 100%"></textarea>

        </div>    

          <?php 

          $editarplexamen = new ControladorPlantillaExamen();
          $editarplexamen -> ctrEditarPlantillaExamen();

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

<div class="modal" id="formatover">

<div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Plantilla Examen</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body"> 
         
        <input type="hidden" name="editarPlantiExa">
          <!-- input nombre --> 
          
          <p>Plantilla:</p>

                <div id="agregarEditor"></div>

        </div>    


        <div class="modal-footer d-flex justify-content-between">
          
          <div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>

        </div>

        </div> 

      </form>

    </div>

  </div>

</div> 
