<?php 

session_start(); 
$ruta = ControladorRuta::ctrRutaMaestria();
if(isset($_SESSION["idSesion"])){

	$admin = ControladorPersona::ctrMostrarPersona0("identificacion", $_SESSION["idSesion"]); 
	// echo '<pre>'; print_r($admin); echo '</pre>';
}

?> 


<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Sistema Salud</title> 

  <!-- Tell the browser to be responsive to screen width -->

  <meta name="viewport" content="width=device-width, initial-scale=1">  

  <!--=====================================
	Vínculos CSS
	======================================--> 

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

 	<!-- Google Font: Source Sans Pro -->
  	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  	<!-- Theme style -->
  	<link rel="stylesheet" href="vistas/css/plugins/adminlte.min.css">

  	<!-- overlayScrollbars -->
  	<link rel="stylesheet" href="vistas/css/plugins/OverlayScrollbars.min.css">

  	<!-- jdSlider -->
	<link rel="stylesheet" href="vistas/css/plugins/jdSlider.css">

	<!-- Select2 -->
	<link rel="stylesheet" href="vistas/css/plugins/select2.min.css">

	<!-- DataTables -->
	<link rel="stylesheet" href="vistas/css/plugins/dataTables.bootstrap4.min.css">	
	<link rel="stylesheet" href="vistas/css/plugins/responsive.bootstrap.min.css">

	<!-- JQVMap -->
	<link rel="stylesheet" href="vistas/css/plugins/jquery-jvectormap-1.2.2.css">

	<!-- jQuery jOrg Chart -->
  	<link rel="stylesheet" href="vistas/css/plugins/jquery.jOrgChart.css">

  	 <!-- Morris chart -->
  	<link rel="stylesheet" href="vistas/css/plugins/morris.min.css">

  	<!-- iCheck -->
  	<link rel="stylesheet" href="vistas/css/plugins/iCheck-flat-blue.css">

  	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="vistas/css/plugins/bootstrap-datepicker.standalone.min.css">

  	<!-- estilo personalizado -->
  	<link rel="stylesheet" href="vistas/css/style.css"> 

  	<!--=====================================
	Vínculos JS
	======================================-->

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

	<!-- AdminLTE App -->
	<script src="vistas/js/plugins/adminlte.min.js"></script>

	<!-- overlayScrollbars -->
	<script src="vistas/js/plugins/jquery.overlayScrollbars.min.js"></script>

	<!-- jdSlider -->
	<!-- https://www.jqueryscript.net/slider/Carousel-Slideshow-jdSlider.html -->
	<script src="vistas/js/plugins/jdSlider.js"></script>

	<!-- Select2 -->	
	<!-- https://github.com/select2/select2 -->
	<script src="vistas/js/plugins/select2.full.min.js"></script>

	<!-- InputMask -->	
	<!-- https://github.com/RobinHerbots/Inputmask -->
	<script src="vistas/js/plugins/jquery.inputmask.js"></script>

	<!-- jSignature -->
	<!-- https://www.jqueryscript.net/other/Signature-Field-Plugin-jQuery-jSignature.html -->
	<script src="vistas/js/plugins/jSignature.js"></script>
	<script src="vistas/js/plugins/jSignature.CompressorSVG.js"></script>

	<!-- SWEET ALERT 2 -->	
	<!-- https://sweetalert2.github.io/ -->
	<script src="vistas/js/plugins/sweetalert2.all.js"></script>
	
	<!-- DataTables 
	https://datatables.net/-->
  	<script src="vistas/js/plugins/jquery.dataTables.min.js"></script>
  	<script src="vistas/js/plugins/dataTables.bootstrap4.min.js"></script> 
	<script src="vistas/js/plugins/dataTables.responsive.min.js"></script>
  	<script src="vistas/js/plugins/responsive.bootstrap.min.js"></script>	

	<!-- HLS -->
	<!-- https://poanchen.github.io/blog/2016/11/17/how-to-play-mp4-video-using-hls -->
	<script src="vistas/js/plugins/hls.min.js"></script>

	<!-- Pinterest Grid -->	
	<!-- https://www.jqueryscript.net/layout/Simple-jQuery-Plugin-To-Create-Pinterest-Style-Grid-Layout-Pinterest-Grid.html -->
	<script src="vistas/js/plugins/pinterest_grid.js"></script>

	<!-- JQVMap -->
	<!-- https://www.10bestdesign.com/jqvmap/ -->
	<script src="vistas/js/plugins/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="vistas/js/plugins/jquery-jvectormap-world-mill-en.js"></script>

	<!-- jQuery Knob Chart -->
	<!-- http://anthonyterrien.com/demo/knob/ -->
	<script src="vistas/js/plugins/jquery.knob.js"></script>

	<!-- jQuery jOrg Chart -->
	<!-- https://github.com/wesnolte/jOrgChart-->	
    <script src="vistas/js/plugins/jquery.jOrgChart.js"></script>	

    <!-- jQuery Number-->
    <!-- https://plugins.jquery.com/df-number-format/ -->
	<script src="vistas/js/plugins/jquerynumber.min.js"></script>

	<!-- Preload-->
	<!-- https://www.jqueryscript.net/loading/Handle-Loading-Progress-jQuery-Nite-Preloader.html -->
	<script src="vistas/js/plugins/jquery.nite.preloader.js"></script>

	<!-- Morris.js charts -->
	<!-- https://morrisjs.github.io/morris.js/ -->
	<script src="vistas/js/plugins/raphael-min.js"></script>
	<script src="vistas/js/plugins/morris.min.js"></script>

	<!-- https://ckeditor.com/ckeditor-5/#classic -->
	<script src="vistas/js/plugins/ckeditor.js"></script>

	<!-- iCheck -->
	<!-- https://github.com/fronteed/iCheck/ -->
	<script src="vistas/js/plugins/icheck.min.js"></script> 

	<!-- bootstrap datepicker -->
	<!-- https://bootstrap-datepicker.readthedocs.io/en/latest/ -->
	<script src="vistas/js/plugins/bootstrap-datepicker.min.js"></script>



 </head> 

 <?php if (!isset($_SESSION["validarSesion"])): 


		include "paginas/login.php";

?>

<?php else: ?>
	

 <body class="hold-transition sidebar-mini sidebar-collapse">

 <div class="wrapper">
 
 <?php 

			include "paginas/header.php";

			include "paginas/menu.php"; 

/*=============================================
Páginas del sitio
=============================================*/ 

			if(isset($_GET["pagina"])){

				if($_GET["pagina"] == "inicio" ||
				   $_GET["pagina"] == "salir" ||
				   $_GET["pagina"] == "paciente" ||
				   $_GET["pagina"] == "examen" ||
				   $_GET["pagina"] == "persona" ||
				   $_GET["pagina"] == "perfil2" ||
				   $_GET["pagina"] == "plantillaExamen" ||
				   $_GET["pagina"] == "resultadoExamen" ||
				   $_GET["pagina"] == "examenElastografia" ||
				   $_GET["pagina"] == "usuarios"){


					include "paginas/".$_GET["pagina"].".php";

				}else{

					include "paginas/error.php";

				}				

			}else{

				include "paginas/inicio.php";


			}	

			include "paginas/footer.php";
?>

 </div> 

 <script src="vistas/js/usuarios.js"></script>
 <script src="vistas/js/paciente.js"></script>
 <script src="vistas/js/examen.js"></script>
 <script src="vistas/js/persona.js"></script>
 <script src="vistas/js/plantillaExamen.js"></script>
 <script src="vistas/js/resultadoExamen.js"></script>
 <script src="vistas/js/examenElastografia.js"></script>
 </body> 

 <?php endif ?>

 </html>

