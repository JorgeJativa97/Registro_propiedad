function selectprograma() {

	var id_program = $("#selectasignatura").val();

	$.ajax({
		url: "cronograma.ajax.php",
		method: "POST",
		data: {
			"id":id_program
		},
		success: function(respuesta){
			$("#selectasignatura").attr("disabled", false);
			$("#selectasignatura").html(respuesta);
		}
	})
}