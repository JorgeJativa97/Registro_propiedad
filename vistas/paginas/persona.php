
<div class="content-wrapper" style="min-height: 1058.31px;">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
    <div class="container-fluid"> 
      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Registrar Persona</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

            <li class="breadcrumb-item active">Registro de Persona</li>

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

        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearPersona">Nuevo Registro</button>   

             

      </div>

      <div class="card-body">

        <table class="table table-bordered table-striped dt-responsive tablapersona" width="100%">
          
          <thead>
               
            <tr>
              <th>#</th>              
              <th>Estado</th>
              <th>Cédula</th>
              <th>Nombres</th>
              <th>Correo</th>
              <th>Rol</th>
              <th>Teléfono</th>
              <th>Acciones</th>              

            </tr>
             

          </thead> 

          <tbody>
                    <!--<tr>
              <td>1</td>
              <td>Activo</td>
              <td>1314019504</td>
              <td>Douglas Macias</td>
              <td>dmacias9504@utm.edu.ec</td>
              <td>Administrador</td>
              <td>0980518916</td>                          
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
Modal Crear persona
======================================-->

<div class="modal" id="crearPersona">

<div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Registrar Persona</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body"> 
         
          <!-- input cedula-->
          
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-address-card"></span>
            </div>
                <input type="text" class="form-control input-lg" id="regcedula" name="regcedula" placeholder="cedula" required>
          </div>

          
           <!--input nombres  -->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="text" class="form-control input-lg" id="regnombre" name="regnombre" placeholder="Nombres " required>
              
            
          </div>
           <!-- input apellidos -->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="text" class="form-control input-lg" id="regapellidop" name="regapellidop" placeholder="Apellidos" required>
              
            
          </div>

          <!-- input telefono -->
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-phone-square"></span>
            </div>
                <input type="number" class="form-control input-lg"  id="regtelefono" name="regtelefono" placeholder="Teléfono" required>

        
          </div>
            
          <!--input correos  -->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-envelope"></span>
            </div>
                <input type="email" class="form-control input-lg" id="regcorreo" name="regcorreo" placeholder="Correo Electronico" required>
            
          </div>
           <!--  input contraseña-->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-lock"></span>
            </div>
                <input type="password" class="form-control input-lg" id="regpassword" name="regpassword" placeholder="Contraseña" required>
              
            
          </div> 

                    
            <!-- input rol -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              
              <span class="fas fa-user-tie"></span>
            
            </div>
 
            <select class="form-control seleccionarRol" id="regEstado"  name="regEstado" required style="width: 90%">

              <option value="">Seleccione el Rol</option> 

              <?php  

              $item = null;
              $valor = null;

              $Rol = ControladorPersona::ctrMostrarRol($item, $valor); 

              foreach ($Rol as $key => $value) {
                
                echo '<option value="'.$value["idrol"].'">'.$value["nombrerol"].'</option>';

              }


              ?>

            </select>     

          </div> 




         
        </div>      
          

       <?php 

          $registropersona = new ControladorPersona();
          $registropersona -> ctrRegistroUsuario();
         
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
Modal editar persona
======================================-->

<div class="modal" id="editarpersona">

  <div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Editar Persona</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>
 
        </div>

        <div class="modal-body"> 

        <!-- input cedula -->
          
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-address-card"></span>
            </div>
                <input type="text" class="form-control input-lg" id="editarcedula" name="editarcedula" value  required>
          </div>
        
        <!-- input nombre -->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="text" class="form-control input-lg" id="editarnombre" name="editarnombre" value required>
              
            
          </div>
          
        <!-- input apellidos-->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="text" class="form-control input-lg" id="editarapellidos" name="editarapellidos" value required>
              
            
          </div>
           

        <!-- input telefono-->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-phone-square"></span>
            </div>
                <input type="number" class="form-control input-lg" id="editartelefono" name="editartelefono" value required>             
       
          </div>



         <!-- input correo-->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-envelope"></span>
            </div>
                <input type="email" class="form-control input-lg" id="editarcorreo" name="editarcorreo" value >
            
          </div>

          <!-- seleccionar la Universidad -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              
              <span class="fas fa-user-tie"></span>
             
            </div>

            <select class="js-example-basic-single editarRolid" name="editarRolid" id="editarRolid" required style="width: 90%"> 

             <option class="editarUOption"></option>
              
              <?php  

              $item = null;
              $valor = null;

              $Rol = ControladorPersona::ctrMostrarRol($item, $valor); 

              foreach ($Rol as $key => $value) {
                
                echo '<option value="'.$value["idrol"].'">'.$value["nombrerol"].'</option>';

              }


              ?>

            </select>     

          </div> 
          <?php 

          $editarpersona = new ControladorPersona();
          $editarpersona -> ctreditarPersona();

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
