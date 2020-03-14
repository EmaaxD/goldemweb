$(document).ready(function () {

    //configuramos el dataTable
    $('#registros').DataTable({
      "paging": true,
      "pageLength": 10,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "language": {
      	paginate: {
      		next: 'siguiente',
      		previous: 'anterior',
      		last: 'ultimo',
      		first: 'primero'
      	},
      	info: "Mostrando _START_ a _END_ de _TOTAL_ resultados",
      	emptyTable: 'No hay registros',
      	infoEmpty: '0 Registro',
      	search: 'Buscar'
      }
    });

    //desabilitamos el btn enviar 
    $('#crear_registro_admin').attr('disabled',true);
    //script para la password
    $('#repetir_passUser').on('input',function(){
          var password_nuevo = $('#passUser').val();

          if ($(this).val() == password_nuevo) {
              $('#resultado_password').text('correcto');
              //agregamos estilos a los inputs
              $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
              $('input#passUser').parents('.form-group').addClass('has-success').removeClass('has-error');

              //habilitamos el btn si esta todo correcto
              $('#crear_registro_admin').attr('disabled',false);
          }else{
              $('#resultado_password').text('Los Password no coinciden');
              //agregamos estilos a los inputs
              $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
              $('input#passUser').parents('.form-group').addClass('has-error').removeClass('has-success');

              $('#crear_registro_admin').attr('disabled',true);
          }
    });

    //deshabilitamos el btn
    $('#crear-evento').attr('disabled',true)
    //script para validar campos
    $('#titulo_event').on('input',function (event) {
      
      event.preventDefault();

      var tituloEvento = $(this).val();

      //pregunta si no esta vacio 
      if (tituloEvento != "") {
        //habilitamos el btn
        $('#crear-evento').attr('disabled',false)
      }else{
        //deshabilitamos el btn
        $('#crear-evento').attr('disabled',true)
      }

    });

    //activamos el select con un input de busqueda
    $(".seleccionarCatego").select2();

    //definimos el idioma que vamos usar en el calendario
    $.fn.datepicker.dates['es'] = {
      days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
      daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom"],
      daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
      months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
      monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
      today: "Hoy"
    };

    //activamos el datePicker
    $('#fechaEvento').datepicker({
      autoclose: true,
      language: 'es'
    });

    //activamos el timePicker
    $(".horaEvento").timepicker({
      showInputs: false
    });

    //activamos la libreria de seleccion de iconos
    $('#icono').iconpicker();

    //activamos WYSIHTML5 - text editor
    $(".biografia").wysihtml5();

    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    // LINE CHART
    $.getJSON('servicio-registrados.php', function (data) {
       var line = new Morris.Line({
        element: 'graficas-registro',
        resize: true,
        data: data,
        xkey: 'fecha',
        ykeys: ['cantidad'],
        labels: ['Item 1'],
        lineColors: ['#3c8dbc'],
        hideHover: 'auto'
      });
    })
   
});