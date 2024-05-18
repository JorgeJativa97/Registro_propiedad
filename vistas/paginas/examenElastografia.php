<div class="content-wrapper" style="min-height: 1058.31px;">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Registrar Examen Elastografia</h1>
          

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

        <button class="btn btn-primary btn-sm" data-toggle="modal"  data-target=".bd-example-modal-lg">Nuevo Registro</button>   


             

      </div>

      <div class="card-body">

        <table class="table table-bordered table-striped dt-responsive tablaElastografia" width="100%">
          
          <thead>
            
            <tr>
              
              <th>CEDULA</th>
              <th>NOMBRE</th>
              <th>APELLIDO</th>
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
<!--=====================================
Modal Crear paciente
======================================-->

<div class="modal fade bd-example-modal-lg" id="crearElastografia">

<div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Registrar Paciente</h4>

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
                
                echo '<option value="'.$value["pac_codigo"].'">'.$value["pac_identificacion"].'</option>';

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

        <!--  -->
        <label>Numero de muestra</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control input-lg" id="nmuestra" name="nmuestra" required>     
          </div>        
           <!--  -->
           <label>Distancia de la piel cm</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control input-lg" id="dpiel" name="dpiel" required>     
          </div>  

          <label style>Resultados</label>
          <br>
          <!--  -->
          <label>1.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra1" name="muestra1" required>     
          </div>  
          
          <label>2.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra5" name="muestra2" required>     
          </div> 

          <label>3.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra3" name="muestra3" required>     
          </div> 

          <label>4.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra4" name="muestra4" required>     
          </div> 

          <label>5.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra5" name="muestra5" required>     
          </div>

          <label>6.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra6" name="muestra6" required>     
          </div> 

          <label>7.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra7" name="muestra7" required>     
          </div> 

          <label>8.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra8" name="muestra8" required>     
          </div>

          <label>9.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra9" name="muestra9" required>     
          </div>

          <label>10.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra10" name="muestra10" required>     
          </div> 

          <label>11.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra11" name="muestra11" required>     
          </div>

          <label>12.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra12" name="muestra12" required>     
          </div> 

          <label>13.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra13" name="muestra13" required>     
          </div> 

          <label>14.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra14" name="muestra14" required>     
          </div> 

          <label>15.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra15" name="muestra15" required>     
          </div> 

          <label>16.- KPA</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra16" name="muestra16" required>     
          </div> 

          <label>Rigidez este de.......</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="rigidezS" name="rigidezS" required>     
          </div> 

          <label>Rigidez media de.......</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="rigidezM" name="rigidezM" required>     
          </div> 

          <label>Rigidez promedia de.......</label>
        <div class="input-group mb-3">
                <input type="text" class="form-control" id="rigidezP" name="rigidezP" required>     
          </div> 

          <label>Diagnostigo</label>
        <div class="input-group mb-3">
                <textarea type="text" class="form-control" id="diagnostico" name="diagnostico" required></textarea>     
          </div>


        </div> 

          <?php 

          $registroExamenElastografia = new ControladorExamenElastografia();
          $registroExamenElastografia -> ctrCrearExamenElastografia();

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

<div class="modal" id="editarElasto">

<div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Editar Paciente</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body"> 
         
        <!-- seleccionar la asignatura prueba --> 

        <input type="text" class="form-control input-lg" name="ela" required readonly>

        <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

            <span class="fas fa-user-tie"></span>

            </div>

            <select class="form-control" id="ecodPaciente" name="ecodPaciente" required style="width: 90%" required>

            <option value="">SELECCIONE EL PACIENTE</option> 

            <?php  

            $Paciente = ControladorPaciente::ctrMostrarPaciente(null, null); 

            foreach ($Paciente as $key => $value) {
                
                echo '<option value="'.$value["pac_codigo"].'">'.$value["pac_identificacion"].'</option>';

            }


            ?>

            </select>     

            </div>  

            <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="date" class="form-control input-lg" id="fecha" name="efecha" required>     
          </div> 

            <!--  -->
            <label>Numero de muestra</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control input-lg" id="nmuestra" name="enmuestra" required>     
            </div>        
            <!--  -->
            <label>Distancia de la piel cm</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control input-lg" id="dpiel" name="edpiel" required>     
            </div>  

            <label style>Resultados</label>
            <br>
            <!--  -->
            <label>1.- KPA</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra1" name="emuestra1" required>     
            </div>  

            <label>2.- KPA</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra5" name="emuestra2" required>     
            </div> 

            <label>3.- KPA</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra3" name="emuestra3" required>     
            </div> 

            <label>4.- KPA</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra4" name="emuestra4" required>     
            </div> 

            <label>5.- KPA</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra5" name="emuestra5" required>     
            </div>

            <label>6.- KPA</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra6" name="emuestra6" required>     
            </div> 

            <label>7.- KPA</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra7" name="emuestra7" required>     
            </div> 

            <label>8.- KPA</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra8" name="emuestra8" required>     
            </div>

            <label>9.- KPA</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra9" name="emuestra9" required>     
            </div>

            <label>10.- KPA</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra10" name="emuestra10" required>     
            </div> 

            <label>11.- KPA</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra11" name="emuestra11" required>     
            </div>

            <label>12.- KPA</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra12" name="emuestra12" required>     
            </div> 

            <label>13.- KPA</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra13" name="emuestra13" required>     
            </div> 

            <label>14.- KPA</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra14" name="emuestra14" required>     
            </div> 

            <label>15.- KPA</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra15" name="emuestra15" required>     
            </div> 

            <label>16.- KPA</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="muestra16" name="emuestra16" required>     
            </div> 

            <label>Rigidez este de.......</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="rigidezS" name="erigidezS" required>     
            </div> 

            <label>Rigidez media de.......</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="rigidezM" name="erigidezM" required>     
            </div> 

            <label>Rigidez promedia de.......</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="rigidezP" name="erigidezP" required>     
            </div> 

            <label>Diagnostigo</label>
            <div class="input-group mb-3">
                <textarea type="text" class="form-control" id="diagnostico" name="ediagnostico" required></textarea>     
            </div>

        </div>    

          <?php 

          $editarExamenElastografia = new ControladorExamenElastografia();
          $editarExamenElastografia -> ctrEditarExamenElastografia();

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
