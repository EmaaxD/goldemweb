$(function () {

	//letterin
	$('.nombre-sitio').lettering();

	//agregar clase al menu
	$('body.conferencias .navegacion-principal a:contains("Conferencia")').addClass('activo');

	$('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');

	$('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');


	//menu fijo
	var windowHeight = $(window).height();
	var barraAltura = $('.barra').innerHeight();

	$(window).scroll(function () {
		var scroll = $(window).scrollTop();

		if (scroll>windowHeight) {

			$('.barra').addClass('fixed');
			$('body').css({'margin-top': barraAltura+'px'});
		
		}else{

			$('.barra').removeClass('fixed');
			$('body').css({'margin-top': '0px'});
		}

	});

	//menu responsive
	$('.menu-movil').on('click',function () {
		$('.navegacion-principal').slideToggle();
	})


	//programa de conferencias

	$('div.ocultar').hide();
	$('.programa-evento .info-curso:first').show();
	$('.menu-programa a:first').addClass('activo');

	$('.menu-programa a').on('click', function () {

		$('.menu-programa a').removeClass('activo');
		$(this).addClass('activo');
		$('.ocultar').hide();
		var enlace = $(this).attr('href');
		$(enlace).fadeIn(1000);

		return false;
	});

	//animaciones para los numeros

	var resumenLista = jQuery('.resumen-evento');

	if (resumenLista.length > 0) {
		$('.resumen-evento').waypoint(function () {
			$('.resumen-evento li:nth-child(1) p').animateNumber({
				number: 6
			},1200);

			$('.resumen-evento li:nth-child(2) p').animateNumber({
				number: 15
			},1200);

			$('.resumen-evento li:nth-child(3) p').animateNumber({
				number: 3
			},600);

			$('.resumen-evento li:nth-child(4) p').animateNumber({
				number: 9
			},1500);
		},{
			offset:"70%"
		});
	}
	


	//cuenta regresiva
	$('.cuenta-regresiva').countdown('2019/02/16 09:00:00',function (event) {
		$('#dias').html(event.strftime('%D'));
		$('#horas').html(event.strftime('%H'));
		$('#minutos').html(event.strftime('%M'));
		$('#segundos').html(event.strftime('%S'));
	});

	//venta modal con colorbox
	$('.invitado-info').colorbox({inline:true, width:"50%", fadeOut:300});
	$('.boton_newsletter').colorbox({inline:true, width:"50%", fadeOut:300});
})