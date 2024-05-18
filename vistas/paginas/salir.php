<?php

session_destroy();

echo '<script>
	
	localStorage.removeItem("usuario");
	localStorage.clear();
	window.location = "inicio";

</script>';