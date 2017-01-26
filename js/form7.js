$(document).ready(function( ){

	$('#send').click(function(){

		if( ($('#nombres_atn').val().length > 0) && ($('#opr_area').val( ) == 'ar_07') )
		{
			$('form').submit( ).reset( );
		}

	});

});