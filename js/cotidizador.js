(function() {
	
	"use strict";

	var regalo = document.getElementById('regalo');

	document.addEventListener('DOMContentLoaded', function() {

		// campos datos de usuarios

			var nombre = document.getElementById('nombre');
			var apellido = document.getElementById('apellido');
			var email = document.getElementById('email');
			

		 // Campos pases

		 	var pase_dia = document.getElementById('pase_dia');
		 	var pase_dosdias = document.getElementById('pase_dosdias');
		 	var pase_completo = document.getElementById('pase_completo');


		// botones y divs

			var calcular = document.getElementById('calcular');
			var errorDiv = document.getElementById('error');
			var botonRegistro = document.getElementById('btnRegistrar');
			var lista_productos = document.getElementById('lista-productos');
			var suma = document.getElementById('suma-total');


			// Extras
			
			var camisas = document.getElementById('camisa_eventos');
			var etiquetas = document.getElementById('etiquetas');	

			botonRegistro.disabled = true;


			if (document.getElementById('calcular')) {
				//calcular montos a pagar
				calcular.addEventListener('click', calcularMontos);

				//mostrar los pases correspodiente con el click
				pase_dia.addEventListener('blur', mostrarDias);
				pase_dosdias.addEventListener('blur', mostrarDias);
				pase_completo.addEventListener('blur', mostrarDias);

				//validad datos de usuarios
				nombre.addEventListener('blur',validarCampos);
				apellido.addEventListener('blur',validarCampos);
				email.addEventListener('blur',validarCampos);
				//validamos que el email sea correcto
				email.addEventListener('blur', validarMail);


				function validarMail() {
					
					if (this.value.indexOf("@") > -1) {

						errorDiv.style.display = 'none';
						this.style.border = '1px solid #cccccc';
						
					}else{

						errorDiv.style.display = 'block';
						errorDiv.innerHTML = "debe tener por lo menos un @";
						this.style.border = '1px solid red';
						
					}
				}

				function validarCampos() {
					
					if (this.value == '') {

						errorDiv.style.display = 'block';
						errorDiv.innerHTML = "esta campo es obligatorio";
						this.style.border = '1px solid red';
						errorDiv.style.border = '2px solid red';

					}else{

						errorDiv.style.display = 'none';
						this.style.border = '1px solid #cccccc';
					}

				}

				function calcularMontos(event) {
					
					event.preventDefault();

					if (regalo.value === '') {

						alert("Debes elegir un regalo");
						regalo.focus();

					}else{

						var boletosDia = parseInt(pase_dia.value, 10) || 0,
							boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
							boletoCompleto = parseInt(pase_completo.value, 10) || 0,
							cantCamisas = parseInt(camisas.value, 10) || 0,
							cantEtiquetas = parseInt(etiquetas.value, 10) || 0;

						var totalPagar = (boletosDia * 30) + (boletos2Dias * 45) + (boletoCompleto * 50) + ((cantCamisas * 10) * .93) + (cantEtiquetas * 2);

						var listadoProductos = [];

						if (boletosDia >= 1) {

							listadoProductos.push(boletosDia+ ' Pase por dia');
						}

						if (boletos2Dias >=1) {

							listadoProductos.push(boletos2Dias+ ' Pase por 2 dia');
						}
						
						if (boletoCompleto >=1) {

							listadoProductos.push(boletoCompleto+ ' Pase completo');
						}

						if (cantCamisas >=1) {

							listadoProductos.push(cantCamisas+ ' Camisas');
						}

						if (cantEtiquetas >=1) {

							listadoProductos.push(cantEtiquetas+ ' Etiquetas');
						}

						lista_productos.style.display = "block";
						
						lista_productos.innerHTML = '';

						for (var i = 0; i < listadoProductos.length; i++) {
							
							lista_productos.innerHTML += listadoProductos[i] + '<br>';
						}

						suma.innerHTML = "$ "+ totalPagar.toFixed(2);

						botonRegistro.disabled = false;

						document.getElementById('total_pedido').value = totalPagar;

						// console.log(listadoProductos);


					}
				}

				function mostrarDias() {
					
					var boletosDia = parseInt(pase_dia.value, 10) || 0,
						boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
						boletoCompleto = parseInt(pase_completo.value, 10) || 0;

					var diasElegidos = [];
					
					if (boletosDia > 0) {

						diasElegidos.push('viernes');
					}

					if (boletos2Dias > 0) {

						diasElegidos.push('viernes','sabado');
					}

					if (boletoCompleto > 0) {

						diasElegidos.push('viernes','sabado','domingo');
					}

					for (var i =0; i < diasElegidos.length; i++) {
						
						document.getElementById(diasElegidos[i]).style.display = 'block';
					}	
				}
			}
			

	});// DOM CONTENT LOADED
})();