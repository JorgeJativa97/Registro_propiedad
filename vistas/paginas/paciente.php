<div class="content-wrapper" style="min-height: 1058.31px;">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Registrar Paciente</h1>
          

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

        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearPaciente">Nuevo Registro</button>   


             

      </div>

      <div class="card-body">

        <table class="table table-bordered table-striped dt-responsive tablaPaciente" width="100%">
          
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
Modal Crear paciente
======================================-->

<div class="modal" id="crearPaciente">

<div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Registrar Paciente</h4>

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
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="text" class="form-control input-lg" id="regapellidos" name="regapellidos" placeholder="Apellidos" required>     
          </div> 
           <!--  -->
           <div class="input-group mb-3">
           <!-- <label>Fecha de Nacimiento</label> -->
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="date" class="form-control input-lg" id="fechanacimiento" name="fechanacimiento" required>     
          </div> 
        <!--  -->   
        <!--  -->
        <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="text" class="form-control input-lg" id="direccion" name="direccion" placeholder="Dirección" required>     
          </div>        
           <!--  -->
        <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="number" class="form-control input-lg" id="edad" name="edad" placeholder="Edad" required>     
          </div>  
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="number" class="form-control input-lg" id="telefono" name="telefono" placeholder="Telefono" required>     
          </div>  
        </div>    

          <?php 

          $registropaciente = new ControladorPaciente();
          $registropaciente -> ctrCrearPaciente();

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

<div class="modal" id="editarPaciente">

<div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post">
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Editar Paciente</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body"> 
         
        <input type="hidden" name="editarPac">
          <!-- input nombre -->
          
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="text" class="form-control input-lg" id="editarcedula" name="editarcedula" value="" >
          </div>
           <!--  -->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="text" class="form-control input-lg" id="editarnombre" name="editarnombre" value="" >     
          </div>
           <!--  -->
           <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="text" class="form-control input-lg" id="editarapellidos" name="editarapellidos" value="" >     
          </div> 
           <!--  -->
           <div class="input-group mb-3">
           <!-- <label>Fecha de Nacimiento</label> -->
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="date" class="form-control input-lg" id="editarfechanacimiento" name="editarfechanacimiento" value="">     
          </div> 
        <!--  -->   
        <!--  -->
        <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="text" class="form-control input-lg" id="editardireccion" name="editardireccion" value="">     
          </div>        
           <!--  -->
        <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="number" class="form-control input-lg" id="editaredad" name="editaredad" value="">     
          </div>  
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
            <span class="fas fa-user"></span>
            </div>
                <input type="number" class="form-control input-lg" id="editartelefono" name="editartelefono" value="">     
          </div>  
        </div>    

          <?php 

          $registropaciente = new ControladorPaciente();
          $registropaciente -> ctrEditarPaciente();

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
