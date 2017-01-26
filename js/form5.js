$(document).ready(function( ){

	$('#send').click(function(){
		if( ($('#cedula_atn').val().length > 0) && ($('#opr_area').val( ) == 'ar_05') )
		{
			$('form').submit( ).reset( );
		}

	});

	$( document ).on( "click", "#prev_05", function(e) {
		var n = $('#n_05').val();
		if( (n - 1) > 0 )
		{
			$.post('consulta_interna.php', { area_form:'ar_05', param:(n - 1) }, function(data){
            	var datos = $.parseJSON(data);
            	$('#n_05').val(datos[0]);
            	$('#tipo_05 option[value="0"]').attr('selected','selected');
                $('#tipo_05 option[value="'+ datos[1] +'"]').attr('selected','selected');
                $('#aten_05 option[value="0"]').attr('selected','selected');
            	$('#fecha_05').val(datos[2]);
            });
		}
	});

	$( document ).on( "click", "#post_05", function(e) {
		var n = $('#n_05').val();
		if( (parseInt(n) + 1) <  $('#n_ini_05').val() )
		{
			$.post('consulta_interna.php', { area_form:'ar_05', param:(parseInt(n) + 1) }, function(data){
            	var datos = $.parseJSON(data);
            	$('#n_05').val(datos[0]);
            	$('#tipo_05 option[value="0"]').attr('selected','selected');
                $('#tipo_05 option[value="'+ datos[1] +'"]').attr('selected','selected');
                $('#aten_05 option[value="0"]').attr('selected','selected');
            	$('#fecha_05').val(datos[2]);
            });
		}
	});

	$( document ).on( "click", "#new_05", function(e) {
		$('#n_05').val($('#n_ini_05').val());
        $('#tipo_05 option[value="0"]').attr('selected','selected');
        $('#aten_05 option[value="0"]').attr('selected','selected');
        $('#obse_05').val(null);
        $('#fecha_05').val(null);
	});

});