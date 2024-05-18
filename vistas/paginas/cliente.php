<div class="content-wrapper" style="min-height: 1058.31px;">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Registrar Cliente</h1>
          

        </div>

        <div class="col-sm-6">
 
          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

            <li class="breadcrumb-item active">Registro de Cliente</li>

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

        <table class="table table-bordered table-striped dt-responsive tablaCliente" width="100%">
          
          <thead>
            
            <tr>
              
              <th>Cedula</th>
              <th>Usuario</th>
              <th>Correo</th>
              <th>Telefono</th>
              <th>Sector</th> 
              <th>Dimensiones</th>        
              <th>Acciones</th>

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
          
          <h4 class="modal-title">Registrar Cliente</h4>

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
           <!--  -->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-lock"></span>
            </div>
                <input type="text" class="form-control input-lg" id="telefono" name="telefono" placeholder="Ingresar Telefono" required>
               
          </div> 
          

          <!-- ENTRADA SECTOR -->

          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <i class="fas fa-pencil-alt"></i>
            </div>
                <input type="text" class="form-control input-lg" id="sector" name="sector" placeholder="ingrese el sector" required>
               
          </div> 

          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <i class="fas fa-pencil-alt"></i>
            </div>
                <input type="text" class="form-control input-lg" id="manzana" name="manzana" placeholder="ingrese el manzana" required>
               
          </div> 

          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <i class="fas fa-pencil-alt"></i>
            </div>
                <input type="text" class="form-control input-lg" id="lote" name="lote" placeholder="ingrese el lote" required>
               
          </div> 

          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <i class="fas fa-pencil-alt"></i>
            </div>
                <input type="text" class="form-control input-lg" id="division" name="division" placeholder="ingrese el division" required>
               
          </div>

          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <i class="fas fa-pencil-alt"></i>
            </div>
                <input type="text" class="form-control input-lg" id="phv" name="phv" placeholder="ingrese el phv" required>
               
          </div> 

          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <i class="fas fa-pencil-alt"></i>
            </div>
                <input type="text" class="form-control input-lg" id="phh" name="phh" placeholder="ingrese el phh" required>
               
          </div>
         
        </div>    

          <?php 

          $registrocliente = new ControladorCliente();
          $registrocliente -> ctrCrearCliente();

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

<div class="modal" id="editarcliente">

  <div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">editar Persona</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body"> 

        <input type="hidden" name="editarcliente">
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

          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-lock"></span>
            </div>
                <input type="text" class="form-control input-lg" id="telefono" name="telefono" value required>
               
          </div> 
          

          <!-- ENTRADA SECTOR -->

          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <i class="fas fa-pencil-alt"></i>
            </div>
                <input type="text" class="form-control input-lg" id="sector" name="sector" value required>
               
          </div> 

          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <i class="fas fa-pencil-alt"></i>
            </div>
                <input type="text" class="form-control input-lg" id="manzana" name="manzana" value required>
               
          </div> 

          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <i class="fas fa-pencil-alt"></i>
            </div>
                <input type="text" class="form-control input-lg" id="lote" name="lote" value required>
               
          </div> 

          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <i class="fas fa-pencil-alt"></i>
            </div>
                <input type="text" class="form-control input-lg" id="division" name="division" value required>
               
          </div>

          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <i class="fas fa-pencil-alt"></i>
            </div>
                <input type="text" class="form-control input-lg" id="phv" name="phv" value required>
               
          </div> 

          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <i class="fas fa-pencil-alt"></i>
            </div>
                <input type="text" class="form-control input-lg" id="phh" name="phh" value required>
               
          </div>
               

          </div>
          
          <?php 

          $editarcliente = new ControladorCliente();
          $editarcliente -> ctreditarCliente();

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