$(document).ready(function( ){

	$('#send_us').click(function(){

		if( ($('#cedula_us').val().length > 0) && ($('#opr_area').val( ) == 'us') )
		{
			if($('input#ar13').is(':checked') == true)
			{
				$('input#area_us').val('*');
			}
			else
			{
				var u = [], cad = [];
				for (var x=1; x<13; x++) {
 					if($('input#ar'+x).is(':checked') == true) {
 						if(x < 10)
 							u += 'ar_0'+x+',';
 						else
 							u += 'ar_'+x+',';
 					}
				}

				for(x=0; x<(u.length - 1); x++) cad += u[x];

				$('input#area_us').val(cad);
			}
			$('form').submit( ).reset( );
		}
	});

	$('#canc_us').click(function(){
        $('form').reset();
        $('input[tabindex=1]').focus();
    });
	
	// $( document ).on( "focus", "#cedula_real_busq", function(e) {

	// 	var n = $('<div id="capa_one"><div style="color:#FFF;float:right;margin-right:40px;">* Presione Esc Para Salir</div></div><div id="capa_two"><div id="cont_capa_two" style="display:none;"><table border="1" id="tab_cont_capa_two"><tbody></tbody></table></div></div>');
	
	// 	$(n).appendTo('form');

    //     $('div#capa_one').css({
    //         display: 'block',
    //         position: 'absolute',
    //         top: '0px',
    //         left: '-5px',
    //         height: '500px',
    //         width: '100%',
    //         padding: '5px 5px 5px 5px',
    //         opacity: '0.4',
    //         backgroundColor: '#000',
    //     });
    //     $('div#cont_capa_two').css({
    //         display: 'block',
    //         position: 'absolute',
    //         top: '25%',
    //         left: '25%',
    //         height: '50%',
    //         width: '50%',
    //         padding: '5px 5px 5px 5px',
    //         border: '1px solid #000',
    //         fontFamily: 'arial',
    //         fontSize: '15px',
    //         backgroundColor: '#FFF',
    //         color: '#000',
    //         overflowY: 'scroll'
    //     });
    //     $.post('consulta_interna.php', { area_real:$('#sel_area_busq').val() }, function(data){
    //         var datos = $.parseJSON(data);
    //         $('#tab_cont_capa_two tbody').html(null);
    //         $('<tr><th>ACTIVAR</th><th>CEDULA</th><th>NOMBRE</th></tr>').appendTo('#tab_cont_capa_two tbody');
    //         for(var i=0; i<datos.length; i++) {
    //             $('<tr><td aling="center"><input type="button" class="btn_tab_cont_capa_two" data="'+datos[i][0]+'" style="width:45px;margin-bottom:0px;margin-bottom:0px;margin-left:10px;" value="!" /></td><td>'+datos[i][0]+'</td><td>'+datos[i][1]+'</td></tr>').appendTo('#tab_cont_capa_two tbody');
    //         }
    //     });
    //     $( document ).on( "click", ".btn_tab_cont_capa_two", function(e) {
    //         $('#cedula_real_busq').val($(this).attr('data'));
    //         $('div#capa_one , div#cont_capa_two').remove();
	// 		//$(n).remove();
    //     });
    // });

	$( document ).on( "keyup", "#cedula_us", function(e) {
        $.post('consulta_interna.php', { cedula_us: $(this).val() }, function(data){
            if(data != 'false')
            {
                var datos = $.parseJSON(data);
                $('#nombre_us').val(datos[1]);
                $('#apellido_us').val(datos[2]);
                $('#pass_us').val(datos[3]);
                $('#tipo_us').val(datos[4]);
                
                if(datos[5] == '*')
                {
                	$('input#ar13').prop('checked','checked');
                }
                else
                {
                	for (var x=1; x<14; x++)
                		$('input#ar'+x).removeAttr('checked');
                	var array = datos[5].split(',');
                	for (var x=0; x<array.length; x++)
                	{
 						$('input#ar'+parseInt(array[x].substr(3, 2))).prop('checked','checked');
                	}
                }
            }
        });
    });

});