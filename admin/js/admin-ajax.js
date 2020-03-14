$(document).ready(function () {
	
	//crear o editar datos que viene del formulario
	$('#guardar-registro').on('submit', function (e) {
		//evita que se abra el archivo que van a ir a parar 
		//los datos
		e.preventDefault();

		//los datos que nos llegan por el formulario
		//los tranforma en objeto con su indice y valor
		var datos = $(this).serializeArray();

		$.ajax({

			//el tipo de metodo por el cual mandamos
			//los datos del formulario al archivo que
			//recive los datos
			type: $(this).attr('method'),
			//los datos que recivimos del formulario
			data: datos,
			//a donde vamos a mandarlo
			url: $(this).attr('action'),
			//el tipo de formato que es nuestro dato
			dataType: 'json',
			//y si todoe sta bien
			success: function (data) {
				var resultado = data;
				console.log(resultado);

				if (resultado.respuesta == 'exito') {
					Swal.fire(
					  'Correcto!',
					  resultado.msj,
					  'success'
					)
				}else{
					Swal.fire(
					  'Error!',
					  resultado.msj,
					  'error'
					)
				}
			}
		})
	});

	//crear o editar datos que viene con archivos del formulario
	//crear o editar usuario para admin
	$('#guardar-registro-archivo').on('submit', function (e) {
		//evita que se abra el archivo que van a ir a parar 
		//los datos
		e.preventDefault();

		//obtenemos el nombre de la lista que vamos a ridereccionar
		var nombre = $(this).attr('data-lista');

		//crea un objeto, almacena todo los campos del formulario
		var datos = new FormData(this);

		$.ajax({

			//el tipo de metodo por el cual mandamos
			//los datos del formulario al archivo que
			//recive los datos
			type: $(this).attr('method'),
			//los datos que recivimos del formulario
			data: datos,
			//a donde vamos a mandarlo
			url: $(this).attr('action'),
			//el tipo de formato que es nuestro dato
			dataType: 'json',
			
			/*AGUSTES PARA ENVIAR IMG POR AJAX*/
			contentType: false,
			//para enviar img debe estar en false
			processData: false,
			async: true,
			cache: false,
			//y si todoe sta bien
			success: function (data) {
				var resultado = data;
				console.log(resultado);

				if (resultado.respuesta == 'exito') {
					Swal.fire(
					  'Correcto!',
					  resultado.msj,
					  'success'
					)

				setTimeout(()=>{
					//redireccionamos con una id
					// window.location.href = 'lista-'+nombre+'.php?id='+resultado.id_insertado
					
					//redireccionamos sin una id
					// window.location.href = 'lista-'+nombre+'.php'
				},1000);	

				}else{
					Swal.fire(
					  'Error!',
					  resultado.msj,
					  'error'
					)
				}
			}
		})
	});

	//eliminar un registro (admin)
	$('.borrar_registro').on('click',function (e) {
		e.preventDefault();

		var id = $(this).attr('data-id');
		var tipo = $(this).attr('data-tipo');

		Swal.fire({
		  title: 'Estas seguro?',
		  text: "Al eliminarlo, no lo puedes recuperar!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Si, Eliminar!',
		  cancelButtonText: 'Cencelar',
		}).then((result) => {

			if (result.value) {
				$.ajax({
					type:'post',
					data: {
						'id': id,
						'registro': 'eliminar'
					},
					url: 'modelo/modelo-'+tipo+'.php',
					success: function (data) {
						// console.log(data);
						 var resultado = JSON.parse(data);
						 if (resultado.respuesta == 'exito') {
						    Swal.fire(
						      'Eliminado!',
						      'Se a eliminado correctamente',
						      'success'
						    )
						 	jQuery('[data-id="'+resultado.id_eliminar+'"]').parents('tr').remove();
						 }else{
						 	Swal.fire(
						      'Error!',
						      resultado.msj,
						      'error'
						    )
						 }
					}
				});
			}
		});
	});
});