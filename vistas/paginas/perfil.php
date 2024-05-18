<?php

$item="cedula";
$valor=$_SESSION["idSesion"]; 

$respuesta = Controladorpagos::ctrMostrarpagosP($item,$valor);
// echo '<pre>'; print_r($respuesta); echo '</pre>'; 



?>

<div class="content-wrapper" style="min-height: 1058.31px;">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Mi perfil</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Mi perfil</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->

  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">

      <div class="row">
        
      <div class="col-12 col-md-7"> 

<div class="card card-primary card-outline">
		
		<div class="card-header">
			
			<h5 class="m-0 text-uppercase text-secondary">
				
				<strong>Informacion Usuario </strong>

			</h5>

		</div> 

	<div class="card-body"> 

		<div class="form-group"> 

			<form method="post" enctype="multipart/form-data" >

				<label for="inputName" class="control-label">Cedula</label>

				<div>
					
					<input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo $cliente["cedula"] ?>" readonly>

				</div> 

				<label for="inputName" class="control-label">Sector</label>

				<div>
					
					<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $cliente["sector"]  ?>" readonly>

				</div> 

				<label for="inputName" class="control-label">Manzana</label>

				<div>
					
					<input type="text" class="form-control" id="apellidop" name="apellidop" value="<?php echo $cliente["manzana"] ?>"readonly>

				</div> 

				<label for="inputName" class="control-label">Lote</label>

				<div>
					
					<input type="text" class="form-control" id="apellidom" name="apellidom" value="<?php echo $cliente["lote"] ?>"readonly>

				</div> 

				<label for="inputName" class="control-label">Division</label>

				<div>
					
					<input type="text" class="form-control" id="correo" name="correo" value="<?php echo $cliente["division"] ?>"readonly>

				</div> 


				<br> 

				

				<div class="text-left">
                        
                       

                        
                  </div>

                  

			</form> 

			
			<?php if($respuesta == ""): ?> 

				<div class="alert alert-success alert-dismissible" id="myAlert">
    			
				<button type="button" class="close" data-dismiss="alert">×</button>
    			
				<strong>ATENCIÓN</strong> TIENE QUE CANCELAR EL REGISTRO DE PROPIEDA PARA OBTENER SU CERTIFICADO.
  				
			</div>

				<?php else: ?> 
					
					<div style='text-align:left' ><br><h6 > <B>Descargar:</B> <a ><img src='vistas/img/plantilla/documento.png' alt='' <button type='button' class='btnImprimirFactura5' idactividad=<?php echo $respuesta["cedula"] ?> style=' background-color: Transparent;background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden;outline:none;' width='30px'></a></h6></button></div>
	

		    <?php endif ?> 
			
			

		</div> 

	</div>  

</div> 



     </div>

    </div>

  </section>
  <!-- /.content -->

</div> 