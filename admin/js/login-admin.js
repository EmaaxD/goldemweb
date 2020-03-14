$(document).ready(()=>{
	//loggear administrador
	$('#login-admin').on('submit', function (e) {

		e.preventDefault();

		var datos = $(this).serializeArray();

		$.ajax({

			type: $(this).attr('method'),
			data: datos,
			url: $(this).attr('action'),
			dataType: 'json',
			success: function (data) {
				var resultado = data;
				console.log(resultado);
				if (resultado.respuesta == 'exitoso') {
					Swal.fire(
					  'Hola '+resultado.usuario,
					  'Bienvenid@ a nuestro sistema de administracion',
					  'success'
					)

					setTimeout(()=>{
						window.location.href = 'area-admin.php'
					}, 2000);
				}else{
					Swal.fire(
					  'Error',
					   resultado.msj,
					  'error'
					)
				}
			}
		})
	});
});