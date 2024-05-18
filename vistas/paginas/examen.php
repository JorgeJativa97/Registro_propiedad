<div class="content-wrapper" style="min-height: 1058.31px;">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Registrar Examen</h1>
          

        </div>

        <div class="col-sm-6">
 
          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

            <li class="breadcrumb-item active">Registro de Examen</li>

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

        <table class="table table-bordered table-striped dt-responsive tablaExamen" width="100%">
          
          <thead>
            
            <tr>
              
              <th>EXAMEN</th>
              <th>PERSONA</th>
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

<div class="modal" id="crearExamen">

<div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Registrar Examen</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body"> 
         
          <!-- input nombre -->
          
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="text" class="form-control input-lg" id="regexamen" name="regexamen" placeholder="Examen" required>
          </div> 

            <!-- seleccionar la asignatura prueba -->

            <div class="input-group mb-3">

                <div class="input-group-append input-group-text">
                
                <span class="fas fa-user-tie"></span>

                </div>

                <select class="form-control" id="nombrePersonal" name="nombrePersonal" required style="width: 90%" required>

                <option value="">SELECCIONE EL PERSONAL</option> 

                <?php  

               
                $Personal = ControladorExamen::ctrMostrarPersonal(null, null); 

                foreach ($Personal as $key => $value) {
                    
                    echo '<option value="'.$value["per_codigo"].'">'.$value["per_nombres"].'  '.$value["per_apellidos"].'</option>';

                }


                ?>

                </select>     

                </div> 

           
        </div>    

          <?php 

          $registropexamen = new ControladorExamen();
          $registropexamen -> ctrCrearExamen();

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

<div class="modal" id="editarExamen">

<div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Editar Paciente</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body"> 
         
        <input type="text" name="editarExa">
          <!-- input nombre -->
          
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="text" class="form-control input-lg" id="editaegexamen" name="editaegexamen" value="">
          </div> 
           <!--  -->
           <div class="input-group mb-3">

                <div class="input-group-append input-group-text">
                
                <span class="fas fa-user-tie"></span>

                </div>

                <select class="form-control seleccionarPersonal" id="nombrePersonaledit" name="nombrePersonaledit" required style="width: 90%">

                <option class="EditarExam">SELECCIONE EL PERSONAL</option> 

                <?php  

               
                $Personal = ControladorExamen::ctrMostrarPersonal(null, null); 

                foreach ($Personal as $key => $value) {
                    
                    echo '<option value="'.$value["per_codigo"].'">'.$value["per_nombres"].'  '.$value["per_apellidos"].'</option>';

                }


                ?>

                </select>     

                </div> 
          
        </div>    

          <?php 

          $editarexamen = new ControladorExamen();
          $editarexamen -> ctrEditarExamen();

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
