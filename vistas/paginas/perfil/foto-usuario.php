 <div class="col-12 col-md-4">

                  <div class="card card-info card-outline">

                    <div class="card-body box-profile">


                      <h3 class="profile-username text-center">
                        
                        <?php echo $admin["nombres"] ?>

                      </h3>
 
                      <p class="text-muted text-center">

                        <?php echo $admin["email_user"] ?>

                      </p>

                      <div class="text-center">
                      <?php      
                        if($admin["status"] == 1 ){

                          $estado ="<button class='btn btn-primary ' status=".$admin["status"].">Activado</button>";

                          echo $estado;
                      }else if($admin["status"] == 0){

                          $estado ="<button class='btn btn-warning '  status=".$admin["status"].">Desactivado</button>";
                          echo $estado;
                      }?>


                       



                        <button class="btn btn-secondary" data-toggle="modal" data-target="#cambiarPassword">Cambiar contraseña</button>

                      </div>

                    </div>

                    <div class="card-footer"> </div>

                  </div>  
                  
       </div> 

<!--=====================================
Cambiar de contraseña perfil
======================================-->

<!-- The Modal -->
<div class="modal" id="cambiarPassword">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Cambiar Contraseña</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

        <input type="hidden" name="idUsuarioPassword" value="<?php echo $admin["identificacion"] ?>">
          
      <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-append input-group-text"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div>


        </div>

        <!-- Modal footer -->
        <div class="modal-footer d-flex justify-content-between">

          <div>
            
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

          </div>

          <div>
            
            <button type="submit" class="btn btn-primary">Enviar</button>

          </div>

        </div>

    <?php

      $CambiarPassword = new ControladorPersona();
      $CambiarPassword -> ctrCambiarPassword();

    ?>

      </form>

    </div>
  </div>
</div>

