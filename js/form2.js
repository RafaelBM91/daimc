$(document).ready(function( ){

	$('#send').click(function(){

		if( ($('#cedula_atn').val().length > 0) && ($('#opr_area').val( ) == 'ar_02') )
		{
			$('form').submit( ).reset( );
		}

	});

    $( document ).on( "focus", "#real_02", function(e) {
        $('div#capa_one').css({
            display: 'block',
            position: 'absolute',
            top: '0px',
            left: '-5px',
            height: '500px',
            width: '100%',
            padding: '5px 5px 5px 5px',
            opacity: '0.4',
            backgroundColor: '#000',
        });
        $('div#cont_capa_two').css({
            display: 'block',
            position: 'absolute',
            top: '25%',
            left: '25%',
            height: '50%',
            width: '50%',
            padding: '5px 5px 5px 5px',
            border: '1px solid #000',
            fontFamily: 'arial',
            fontSize: '15px',
            backgroundColor: '#FFF',
            color: '#000',
            overflowY: 'scroll'
        });
        $.post('consulta_interna.php', { area_real:'ar_02' }, function(data){
            var datos = $.parseJSON(data);
            $('#tab_cont_capa_two tbody').html(null);
            $('<tr><th>ACTIVAR</th><th>CEDULA</th><th>NOMBRE</th></tr>').appendTo('#tab_cont_capa_two tbody');
            for(var i=0; i<datos.length; i++) {
                $('<tr><td aling="center"><input type="button" class="btn_tab_cont_capa_two" data="'+datos[i][0]+'" style="width:45px;margin-bottom:0px;margin-bottom:0px;margin-left:10px;" value="!" /></td><td>'+datos[i][0]+'</td><td>'+datos[i][1]+'</td></tr>').appendTo('#tab_cont_capa_two tbody');
            }
        });
        $( document ).on( "click", ".btn_tab_cont_capa_two", function(e) {
            $('#real_02').val($(this).attr('data'));
            $('div#capa_one').css('display','none');
            $('div#cont_capa_two').css('display','none');
        });
    });

});