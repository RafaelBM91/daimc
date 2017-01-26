$(document).ready(function( ){

	$('#send').click(function(){

		if( ($('#cedula_atn').val().length > 0) && ($('#opr_area').val( ) == 'ar_10') )
		{
			$('form').submit( ).reset( );
		}

	});

});