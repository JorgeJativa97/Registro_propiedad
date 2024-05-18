<div class="content-wrapper" style="min-height: 1058.31px;">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Registrar Usuario</h1>
          

        </div>

        <div class="col-sm-6">
 
          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

            <li class="breadcrumb-item active">Registro de Usuario</li>

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

        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearUser">Nuevo Registro</button>   


             

      </div>

      <div class="card-body">

        <table class="table table-bordered table-striped dt-responsive tablaUsuario" width="100%">
          
          <thead>
            
            <tr>
              
              <th>NOMBREE</th>
              <th>APELLIDOS</th>
              <th>CEDULA</th>
              <th>FECHA NACIMIENTO</th>
              <th>DIRECCIÓN</th>          
              <th>EDAD</th>
              <th>TELEFONO</th>
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
Modal Crear persona
======================================-->

<div class="modal" id="crearUser">

<div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Registrar Usuario</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body"> 
         
          <!-- input nombre -->
          
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="text" class="form-control input-lg" id="regcedula" name="regcedula" placeholder="cedula" required>
          </div>
           <!--  -->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="text" class="form-control input-lg" id="regnombre" name="regnombre" placeholder="Nombres" required>     
          </div>
           <!--  -->
        
           <!--  -->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-envelope"></span>
            </div>
                <input type="email" class="form-control input-lg" id="regcorreo" name="regcorreo" placeholder="Correo Electronico" required>
          </div>
          <!--  -->  
           <!--  -->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-lock"></span>
            </div>
                <input type="password" class="form-control input-lg" id="regpassword" name="regpassword" placeholder="Contraseña" required>
               
          </div> 
          

          <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-append input-group-text"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoPerfil">
                  
                  <option value="">Selecionar perfil</option>

                  <option value="Cajer@">Cajer@</option> 

                  <option value="Administrador">Administrador</option>

                </select>

              </div>

            </div>
         
        </div>    

          <?php 

          $registropersona = new ControladorUsuarios();
          $registropersona -> ctrCrearUser();

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
          
          <h4 class="modal-title">editar Persona</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body"> 

        <input type="hidden" name="editarPaciente">
          <!-- input nombre -->
          
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="text" class="form-control input-lg" id="editarcedula" name="editarcedula" value readonly required>
          </div>
           <!--  -->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="text" class="form-control input-lg" id="editarnombre" name="editarnombre" value>
              
            
          </div>
           <!--  -->
          
           <!--  -->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-envelope"></span>
            </div>
                <input type="email" class="form-control input-lg" id="editarcorreo" name="editarcorreo" value>
            
          </div>
         
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-key"></span>
            </div>
                <input type="password" class="form-control input-lg" id="pass" name="pass" placeholder="Nueva Contraseña" value>
                <input type="hidden" name="passwordActual"> 
            
          </div> 

          <!-- seleccionar el perfil -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              
              <span class="fas fa-user"></span>
            
            </div>

            <select class="form-control" name="editarPerfil" required>

              <option class="editarPerfilOption"></option>

              <option value="">Seleccione perfil</option>

              <option value="Administrador">Administrador</option>

              <option value="Cajer@">Cajer@</option>

            </select>     

          </div>
          
          <?php 

          $editarpersona = new ControladorUsuarios();
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