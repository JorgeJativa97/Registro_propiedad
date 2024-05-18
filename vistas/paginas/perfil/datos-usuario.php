<div class="col-12 col-md-7"> 

<div class="card card-primary card-outline">
		
		<div class="card-header">
			
			<h5 class="m-0 text-uppercase text-secondary">
				
				<strong>Información Usuario </strong>

			</h5>

		</div> 

	<div class="card-body"> 

		<div class="form-group"> 

			<form method="post" enctype="multipart/form-data" >

				<label for="inputName" class="control-label">Cedula</label>

				<div>
					
					<input type="text" class="form-control" id="identificacion" name="identificacion" value="<?php echo $admin["identificacion"] ?>" readonly>

				</div> 
<br>
				<label for="inputName" class="control-label">Nombres</label>

				<div>
					
					<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $admin["nombres"] ?>">

				</div> 
<br>
				<label for="inputName" class="control-label">Apellidos</label>

				<div>
					
					<input type="text" class="form-control" id="apellidop" name="apellidop" value="<?php echo $admin["apellidos"] ?>">

				</div> 
<br>
				<label for="inputName" class="control-label">Teléfono</label>

				<div>
					
					<input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $admin["telefono"] ?>">

				</div> 
<br>
				<label for="inputName" class="control-label">Correo</label>

				<div>
					
					<input type="text" class="form-control" id="correo" name="correo" value="<?php echo $admin["email_user"] ?>">

				</div> 

			

				<br> 

		
				<div class="text-left">
                        
                        <button type="submit" class="btn btn-primary pull-left">Guardar informacion</button> 

                        
                  </div>

               <?php   

						$registropersonaPerfil = new ControladorPersona();
    					$registropersonaPerfil -> ctreditarPersonaPerfil();


				?> 

			</form>

		</div> 

	</div> 

</div>