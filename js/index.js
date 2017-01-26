
jQuery.fn.reset = function () {
  $(this).each (function() { this.reset(); });
}

$(document).ready(function( ){

    var timer;

    $('input[type="text"]').attr('autocomplete','off');

    $('.btn_ini_1').click(function(e){
        $('form').submit( ).reset( );
    });

    $(document).on("keyup", 'input#clave_ini', function(e) {
      var EventNum = window.event ? window.event.keyCode : e.which;
      if(EventNum == 13 && $('input[name=\"cedula_ini\"]').val().length > 0) {
        $('form').submit();
      }
    });

    /** selector de sexo con flechas del teclado **/
    $(document).on("keyup", '*', function(e) {
      var EventNum = window.event ? window.event.keyCode : e.which;
      if(!$('input#sex_mas').is(':checked') && EventNum == 37) {
        $('input#sex_mas').attr('checked','checked');
        $('input#sex_fen').removeAttr('checked');
        $('input#sex_mas').click();
      } else if(!$('input#sex_fen').is(':checked') && EventNum == 39) {
          $('input#sex_fen').attr('checked','checked');
          $('input#sex_mas').removeAttr('checked');
          $('input#sex_fen').click();
      }
    });

    function refresh()
    {
        var sel = $('#sel_area').val();
        var u = sel[3] + sel[4];
        $.post('consulta_interna.php', { refresh: u }, function(data){
            if(data == '') data = 0;
            $('#n_'+u).val(parseInt(data) + 1);
        });
        setTimeout(refresh, 300);
    }

    $('#sel_area').change(function(e){
        $('#opr_area').val($(this).val());
        $('#sub_form').load('SubForm/'+$(this).val()+'.php');
        setTimeout(refresh, 300);
    });

    // $('#sel_area_busq').change(function(e){
    //     switch ($(this).val()) {
    //         case 'ar_02':
    //             $('#acti_busq option').remove();
    //             $('#acti_busq').html('<option value="cap_02_01">Nociones Basicas de Costura</option><option value="cap_02_02">Lenceria de Baño</option>'+
    //                                   '<option value="cap_01_03">Lenceria de Cocina</option><option value="cap_02_04">Basico de Cortinas</option><option value="cap_02_05">Ganchos Decorativos</option>'+
    //                                   '<option value="cap_02_06">Peluqueria</option><option value="cap_02_07">Decoracion de Fiestas Infantiles</option><option value="cap_02_08">Tecnicas de Dibujo</option>'+
    //                                   '<option value="cap_02_09">Tallado en Anime</option><option value="cap_02_10">Piñateria Avanzada</option><option value="cap_02_11">Elaboracion de Cintillos</option>'+
    //                                   '<option value="cap_02_12">Manualidades con Materiales Alternativos</option><option value="cap_02_13">Teatro</option>'
    //                                  );
    //         break;
    //         case 'ar_12':
    //             $('#acti_busq option').remove();
    //             $('#acti_busq').html('<option value="tal_12_01">L.O.M</option><option value="tal_12_02">Valores</option><option value="tal_12_03">Violencia Intrafam.</option>'+
    //                                   '<option value="tal_12_04">Edu. Sexual</option><option value="tal_12_05">Acoso Esco.</option><option value="tal_12_06">Com. Afect. Y Asert</option>'+
    //                                   '<option value="tal_12_07">Maltra. Infantil</option><option value="tal_12_08">Auto Estima</option><option value="tal_12_09">Violencia Esco.</option>'+
    //                                   '<option value="tal_12_10">Violencia de Genero</option><option value="tal_12_11">Otros</option>'
    //                                  );
    //         break;
    //         default:
    //             $('#acti_busq option').remove();
    //             $('#acti_busq').html('<option value="01">Violencia Psicologica</option><option value="04">Violencia Fisica</option><option value="02">Acoso u Hostigamiento</option><option value="03">Amenaza</option><option value="05">Violencia Domestica</option>'+
    //                                   '<option value="06">Violencia Sexual</option><option value="07">Acceso Carnal Violento</option><option value="08">Prostitucion Forzada</option><option value="09">Esclavitud Sexual</option>'+
    //                                   '<option value="10">Acoso Sexual</option><option value="11">Violencia Laboral</option><option value="12">Violencia Patrimonial</option><option value="13">Violencia Obstetrica</option>'+
    //                                   '<option value="14">Esterilizacion Forzada</option><option value="15">Violencia Mediatica</option><option value="16">Violencia Institucional</option><option value="17">Violencia Simbolica</option>'+
    //                                   '<option value="18">Trafico de Mujeres, Niñas y Adolecentes</option><option value="19">Trata de Mujeres y Adolecentes</option>'
    //                                  );
    //         break;
    //     }
    // });

    // $('#sel_area_busq').change(function(e){
    //     TConsulta($(this).val(),0,0,0,0,true);
    // });
    // /*
    // $('input#nom_ped_atn_busq').keyup(function(){
    //     if($('#sel_area_busq').val() == 'ar_07') TConsulta($('#sel_area_busq').val(),'param','param',5,$(this).val());
    // });
    // */
    // $('input#btn_busq').click(function(e){
    //     if($('input[name=opc_busq]:checked').val() == 1)
    //         TConsulta($('#sel_area_busq').val(),$('#desd_busq').val(),$('#hast_busq').val(),$('input[name=opc_busq]:checked').val(),'param');
    //     else
    //         if($('input[name=opc_busq]:checked').val() == 2)
    //             TConsulta($('#sel_area_busq').val(),$('#desd_busq').val(),$('#hast_busq').val(),$('input[name=opc_busq]:checked').val(),$('#cedula_atn_busq').val());
    //         else
    //             if($('input[name=opc_busq]:checked').val() == 3)
    //                 TConsulta($('#sel_area_busq').val(),$('#desd_busq').val(),$('#hast_busq').val(),$('input[name=opc_busq]:checked').val(),$('#municipio_atn_busq').val());
    //             else
    //                 if($('input[name=opc_busq]:checked').val() == 4)
    //                     TConsulta($('#sel_area_busq').val(),$('#desd_busq').val(),$('#hast_busq').val(),$('input[name=opc_busq]:checked').val(),$('#parroquia_atn_busq').val());
    //                 else
    //                     if($('input[name=opc_busq]:checked').val() == 5)
    //                         TConsulta($('#sel_area_busq').val(),$('#desd_busq').val(),$('#hast_busq').val(),$('input[name=opc_busq]:checked').val(),$('#cedula_real_busq').val());
    //                     else
    //                         if($('input[name=opc_busq]:checked').val() == 6)
    //                             TConsulta($('#sel_area_busq').val(),$('#desd_busq').val(),$('#hast_busq').val(),$('input[name=opc_busq]:checked').val(),$('#acti_busq').val());
    //                         else
    //                             TConsulta($('#sel_area_busq').val(),$('#desd_busq').val(),$('#hast_busq').val(),$('input[name=opc_busq]:checked').val(),$('#edad_busq').val());
    // });

    $('#sel_area_busq').change(function(e){
        $('div.bloque_busq_1,div.bloque_busq_2,div.bloque_busq_3,div.bloque_busq_4,div.bloque_busq_5,div.bloque_busq_6,div.bloque_busq_7,div.bloque_busq_8').css({ display: 'none' });
        $.post('consulta_interna.php', { area_real: e.target.value }, function(data){
            $('#cedula_real_busq').html(null);
            var datos = $.parseJSON(data);
            for(var i=0; i<datos.length; i++) {
                $('<option value="'+datos[i][0]+'">'+datos[i][1]+'</option>').appendTo('#cedula_real_busq');
            }
            $('#cedula_real_busq').change();
        });
        switch (e.target.value) {
            case 'ar_01': {
                $('div.bloque_busq_4,div.bloque_busq_6,div.bloque_busq_7,div.bloque_busq_8').css({ display: 'block' });
                break;
            }
            case 'ar_02': {
                $('div.bloque_busq_3,div.bloque_busq_5,div.bloque_busq_6').css({ display: 'block' });
                break;
            }
            case 'ar_03': {
                $('div.bloque_busq_4,div.bloque_busq_6').css({ display: 'block' });
                break;
            }
            case 'ar_04': {
                $('div.bloque_busq_4,div.bloque_busq_6,div.bloque_busq_7,div.bloque_busq_8').css({ display: 'block' });
                break;
            }
            case 'ar_05': {
                $('div.bloque_busq_7,div.bloque_busq_8').css({ display: 'block' });
                break;
            }
            case 'ar_06': {
                $('div.bloque_busq_1,div.bloque_busq_4,div.bloque_busq_5,div.bloque_busq_6,div.bloque_busq_7,div.bloque_busq_8').css({ display: 'block' });
                break;
            }
            case 'ar_07': {
                $('div.bloque_busq_6,div.bloque_busq_7,div.bloque_busq_8').css({ display: 'block' });
                break;
            }
            case 'ar_08': {
                $('div.bloque_busq_4,div.bloque_busq_6,div.bloque_busq_7,div.bloque_busq_8').css({ display: 'block' });
                break;
            }
            case 'ar_09': {
                $('div.bloque_busq_1,div.bloque_busq_4,div.bloque_busq_5,div.bloque_busq_6,div.bloque_busq_7,div.bloque_busq_8').css({ display: 'block' });
                break;
            }
            case 'ar_13': {
                $('div.bloque_busq_1,div.bloque_busq_4,div.bloque_busq_6,div.bloque_busq_7,div.bloque_busq_8').css({ display: 'block' });
                break;
            }
            case 'ar_10': {
                $('div.bloque_busq_4,div.bloque_busq_6,div.bloque_busq_7,div.bloque_busq_8').css({ display: 'block' });
                break;
            }
            case 'ar_11': {
                $('div.bloque_busq_4,div.bloque_busq_5,div.bloque_busq_6,div.bloque_busq_7,div.bloque_busq_8').css({ display: 'block' });
                break;
            }
            case 'ar_12': {
                $('div.bloque_busq_2,div.bloque_busq_5,div.bloque_busq_6,div.bloque_busq_7,div.bloque_busq_8').css({ display: 'block' });
                break;
            }
        }
    });

    $('input#btn_busq').click(function(e){
        var ser = $('form#princ').serialize();
        // $('div#show_table iframe').attr('src','busqueda/todos.php?'+ser);
        $('div#show_table iframe').attr('src','busqueda/ar_01.php?'+ser);
        $('div#show_table').css({ display: 'block'});
    });

    $(document).on('keyup',function(e){
      var E = window.event ? window.event.keyCode : e.which;
      if (E == 27)
        $('div#show_table').css({ display: 'none'});
    });





    // var TConsulta = function (_area_busq,_desde_busq,_hasta_busq,_tipo_busq,_param_busq,_param_){
    //   var n = $('<div id="capa_one"><div style="color:#FFF;float:right;margin-right:40px;">* Presione Esc Para Salir</div></div><div id="resultados" style="position:absolute;top:50px;left:15px;width:1200px;height:500px;"></div>');

    //   if (!_param_)
    //     $(n).appendTo('form');

    //   $('div#capa_one').css({
    //       display: 'block',
    //       position: 'absolute',
    //       top: '0px',
    //       left: '0px',
    //       height: '528px',
    //       width: '100%',
    //       padding: '5px 5px 5px 5px',
    //       opacity: '0.4',
    //       backgroundColor: '#000',
    //   });
    //   $('div#resultados , #resultados_hidden').load('./grid/index.php', {
    //     area_busq:_area_busq,
    //     desde_busq:_desde_busq,
    //     hasta_busq:_hasta_busq,
    //     tipo_busq:_tipo_busq,
    //     param_busq:_param_busq
    //   });
    // };
    // $('input#imp_busq').click(function(e){
    //   var n = $('#resultados_hidden > div > div.datagrid-wrap.panel-body > div > div.datagrid-view2 > div.datagrid-header > div > table > tbody > tr > td').length;
    //   var i = 0;
    //   var vector = [];
    //   $('input#json').val($('input#json1').val());
    //   for(i=0;i<n;i++) {
    //     vector[i] = $('#resultados_hidden > div > div.datagrid-wrap.panel-body > div > div.datagrid-view2 > div.datagrid-header > div > table > tbody > tr > td:nth-child('+parseInt(i + 1)+') > div > span:nth-child(1)').html()
    //   }
    //   $('input#vector').val(vector);
    //   $('form#form2').submit();
    // });


    $('input#cedula_atn_arch').keyup(function(e){
        $('#resultados_arch').load('./grid/index_arch.php', {
          cedula:$(this).val()
        });
    });
    $(document).on('click','#btn_save', function(e){ $('form#princ').submit(); });
	$(document).on('click','.btn_dow_arch', function(e){
        $('#opr').val('d');
        var nombre = $(this).parent().parent().parent().find(' > td:eq(0)').text();
        $('<input type="hidden" name="name_atn_arch" value="'+nombre+'">').appendTo('form#princ');
        $('form#princ').submit();
        //return false;
    });
	$(document).on('click','.btn_del_arch', function(e){
	  $('#opr').val('e');
      $('#arch_del').val($(this).attr('data'));
	  $('form#princ').submit();
	});


    $('#municipio_atn_busq').change(function(e){
        llena_parroquias($(this).val(),'#parroquia_atn_busq');
    });
    $('#municipio_atn').change(function(e){
        llena_parroquias($(this).val(),'#parroquia_atn');
    });
    $( document ).on( "change", "#municipio_12", function(e) {
        llena_parroquias($(this).val(),'#parroquia_12');
    });
    $( document ).on( "change", "#municipio_02", function(e) {
        llena_parroquias($(this).val(),'#parroquia_02');
    });
    $( document ).on( "change", "#municipio_05", function(e) {
        llena_parroquias($(this).val(),'#parroquia_05');
    });

    $( document ).on( "keypress", ".int", function(e) {
        var $EventNum = window.event ? window.event.keyCode : e.which;
        if(($EventNum < 48 || $EventNum > 57) && ($EventNum != 0) && ($EventNum != 8))
            return false;
        else
            return true;
    });

    var cedu;
    $( document ).on( "keyup", "#cedula_atn", function(e) {
        var EventNum = window.event ? window.event.keyCode : e.which;
        cedu = $(this).val();
        $.post('consulta_interna.php', { cedula_atn: $(this).val() }, function(data){
            if(data != 'false')
            {
                var datos = $.parseJSON(data);
                $('#nombres_atn').val(datos[1]);
                $('#f_nac_atn').val(datos[2]);
                if(datos[3] == 'm')
                    $('#sex_mas').prop('checked','checked');
                else
                {
                    $('#sex_mas').removeAttr('checked');
                    $('#sex_fen').prop('checked','checked');
                }
                $('#procedencia_atn option[value="0"]').attr('selected','selected');
                $('#procedencia_atn option[value="'+ datos[4] +'"]').attr('selected','selected').change();
                $('#telefono_atn').val(datos[5]);
            } else if(EventNum == 13) {
                var cont = $('div#cne');
                $.post('consulta_interna.php', { cedula_atn_cne: cedu }, function(data){
                    if (data != 'false') {
                        cont.html(data);
                        var t = $('div#cne > table > tbody > tr > td > table > tbody > tr:nth-child(5) > td > table > tbody > tr:nth-child(2) > td > table > tbody > tr:nth-child(2) > td:nth-child(2) > b');
                        if(t.html() != undefined) {
                            $('#nombres_atn').val(t.html().toLowerCase());
                        }
                        var p = $('div#cne > table > tbody > tr > td > table > tbody > tr:nth-child(5) > td > table > tbody > tr:nth-child(2) > td > table > tbody > tr:nth-child(5) > td:nth-child(2)');
                        if(p.html() != undefined) {
                            var pa = p.html().toLowerCase();
                            pa = pa.substring(4, pa.length);
                            var pro = document.getElementById('procedencia_atn');
                            for(i=0; i<pro.options.length; i++) {
                                if (limpiar(pa) == limpiar(pro.options[i].text)) {
                                    pro.options[i].selected = true;
                                    $('#procedencia_atn').change();
                                    break;
                                }
                            }
                        }
                    }
                });
            }
        });
    });

    function limpiar(text){
      var text = text.toLowerCase(); // a minusculas
      text = text.replace(/[áàäâå]/, 'a');
      text = text.replace(/[éèëê]/, 'e');
      text = text.replace(/[íìïî]/, 'i');
      text = text.replace(/[óòöô]/, 'o');
      text = text.replace(/[úùüû]/, 'u');
      text = text.replace(/[ýÿ]/, 'y');
      text = text.replace(/[ñ]/, 'n');
      text = text.replace(/[ç]/, 'c');
      /*
      text = text.replace(/['"]/, '');
      text = text.replace(/[^a-zA-Z0-9-]/, '');
      text = text.replace(/\s+/, '-');
      text = text.replace(/' '/, '-');
      text = text.replace(/(_)$/, '');
      text = text.replace(/^(_)/, '');
      */
      return text;
   }

    $( document ).on( "click", "#edit", function(e) {
        $.ajax({
           type: "POST",
           url: 'edicion.php',
           data: $("form").serialize(),
           success: function(data)
           {
               if(data == '1') {
                  msj('Edicion correcta.','m_ok.png');
               }
           }
        });
    });

    var time = null;
    function msj(text,logo) {
        $('label.msj_opr').html('<img src=\"img/'+logo+'\">&nbsp;'+text).fadeIn( );
        time = setInterval(msj_off, 5000);
    }
    function msj_off( ){ $('label.msj_opr').fadeOut( ); clearInterval(time); };

    $( document ).on( "keypress", ".float", function(e) {

        var $EventNum = window.event ? window.event.keyCode : e.which;
        if(($EventNum < 48 || $EventNum > 57) && ($EventNum != 0) && ($EventNum != 8) && ($EventNum != 46) && ($EventNum != 13))
            return false;
        else
        {
            var $txt = $(this).val( );
            var $flag = true;

            if($EventNum == 46)
            {
                for(var $i=0; $i<$txt.length; $i++)
                {
                    if($txt[$i] == '.')
                    $flag = false;
                }

                if(!$flag || ($EventNum == 46 && $txt.length == 0))
                    return false;
            }
            else
                if($EventNum == 13)
                {
                    for(var $i=0; $i<$txt.length; $i++)
                    {
                        if($txt[$i] == '.')
                            $flag = false;
                    }

                    if($txt[$txt.length - 1] == '.')
                        $(this).val($txt + "00");

                    if($flag && $txt.length > 0)
                        $(this).val($txt + ".00");
                }
        }
        return true;
    });

    $('#canc').click(function(){
        $('form').reset();
        $('div#sub_form').html(null);
        $('input[tabindex=1]').focus();
    });

    $('input#cedula_atn').focusout(function(){
        if($(this).val().length == 0)
        {
            $('input#cedula_atn').val('s/c');
        }
    });
    /*
    $('input, textarea').keypress(function(e){
        var $EventNum = window.event ? window.event.keyCode : e.which;
        if($EventNum == 13 && $('input#clave_ini').length == 0)
        {
            var $tab = parseInt($(this).attr('tabindex')) + 1;
            if($('input[tabindex="'+ $tab +'"], select[tabindex="'+ $tab +'"], textarea[tabindex="'+ $tab +'"]').length)
                $('input[tabindex="'+ $tab +'"], select[tabindex="'+ $tab +'"], textarea[tabindex="'+ $tab +'"]').focus( );
            else
                $('input[tabindex="1"], select[tabindex="1"]').focus( );
        }
    });
    */

    /*

    $('input[type="text"]').attr('autocomplete','off');

	$('nav a button').click(function(e){
        switch($(this).attr('id'))
        {
            alert("hola");
            case 'nav_btn_1': $('nav a').attr('href', '?f=1'); break;
            case 'nav_btn_2': $('nav a').attr('href', '?f=2'); break;
            case 'nav_btn_3': $('nav a').attr('href', '?f=3'); break;
            case 'nav_btn_4': $('nav a').attr('href', '?f=4'); break;
            case 'nav_btn_5': $('nav a').attr('href', '?f=5'); break;
            case 'nav_btn_6': $('nav a').attr('href', '?f=6'); break;
            case 'nav_btn_7': $('nav a').attr('href', '?f=7'); break;
            case 'nav_btn_8': $('nav a').attr('href', '?f=8'); break;
            //case 'nav_btn_9': $('nav a').attr('href', '?f=9'); break;
            case 'nav_btn_10': $('nav a').attr('href', '?f=10'); break;
        }
    });

	$('input, textarea').keypress(function(e){
        var $EventNum = window.event ? window.event.keyCode : e.which;
        if($EventNum == 13)
        {
            var $tab = parseInt($(this).attr('tabindex')) + 1;
            if($('input[tabindex="'+ $tab +'"], select[tabindex="'+ $tab +'"], textarea[tabindex="'+ $tab +'"]').length)
                $('input[tabindex="'+ $tab +'"], select[tabindex="'+ $tab +'"], textarea[tabindex="'+ $tab +'"]').focus( );
            else
                $('input[tabindex="1"], select[tabindex="1"]').focus( );

            //$('form').submit(false);
        }
    });

    $(document).bind('keydown',function(e){
        if (e.which == 27)
        {
            $('#nav_btn_1').focus( );
        }
    });

    $('.btn_cancelar').click(function(e){
        $('form').reset( );
        $('input[tabindex="1"]').focus( );
        try{
            //form1
            $('.user_reguistrado').css('display','none');
            $(obj).html('<option value="0">Parroquias</option>');
            //form3
            $('.l_q_multi_bn').css('display','none');
            $('.btn_2').attr('disabled','disabled');
            $('.btn_3').attr('disabled','disabled');
            $('.btn_4').attr('disabled','disabled');

            $('.btn_8').attr('disabled','disabled');
            $('.btn_9').attr('disabled','disabled');

            $('.btn_5').attr('disabled','disabled');
            $('.btn_6').attr('disabled','disabled');
            $('.btn_7').attr('disabled','disabled');
            $('.codigo_reguistrado').html(null);

            $('.btn_10').attr('disabled','disabled');

            $('#codigo_mr, .municipio_mr, .parroquia_mr, #ano_mr').attr('disabled','disabled');
            $('#codigo_mr').removeAttr('disabled');

            $('input.btn_12').css('display','none');

            $('.btn_18').attr('disabled','disabled');
            $('.btn_19').attr('disabled','disabled');
            $('.btn_20').attr('disabled','disabled');
        }catch(e){
            // *** //
        }
    });
alert('hola')
    $('#cedula_bn, #cedula_cr, #cedula_dp, #cedula_bn_fi').keyup(function(e){

        $.post('consulta_interna2.php', {cedula: $(this).val( ) }, function(data){
            alert(data)
            if(data.length > 0)
                $('label.user_reguistrado').css('display','block').html(data);
            else
                $('label.user_reguistrado').css('display','none').html(null);
        });
    });

    $('section fieldset img#msj_monto').mouseover(function( ){ $('div.nota_imp').css('visibility','visible'); });
    $('section fieldset img#msj_monto').mouseout(function( ){ $('div.nota_imp').css('visibility','hidden'); });

    $('.int').keypress(function(e){
        var $EventNum = window.event ? window.event.keyCode : e.which;
        if(($EventNum < 48 || $EventNum > 57) && ($EventNum != 0) && ($EventNum != 8))
            return false;
        else
            return true;
    });

    $('.float').keypress(function(e){
        var $EventNum = window.event ? window.event.keyCode : e.which;
        if(($EventNum < 48 || $EventNum > 57) && ($EventNum != 0) && ($EventNum != 8) && ($EventNum != 46) && ($EventNum != 13))
            return false;
        else
        {
            var $txt = $(this).val( );
            var $flag = true;

            if($EventNum == 46)
            {
                for(var $i=0; $i<$txt.length; $i++)
                {
                    if($txt[$i] == '.')
                    $flag = false;
                }

                if(!$flag || ($EventNum == 46 && $txt.length == 0))
                    return false;
            }
            else
                if($EventNum == 13)
                {
                    for(var $i=0; $i<$txt.length; $i++)
                    {
                        if($txt[$i] == '.')
                            $flag = false;
                    }

                    if($txt[$txt.length - 1] == '.')
                        $(this).val($txt + "00");

                    if($flag && $txt.length > 0)
                        $(this).val($txt + ".00");
                }
        }
        return true;
    });

    $('.municipio_mr').change(function(e){
        llena_parroquias( );
    });


    */
});

    var parroquias = [ ];
    parroquias[0] = '<option value="m1_p1">Araguaney</option><option value="m2_p2">El Jaguito</option><option value="m3_p3">La Esperanza</option><option value="m4_p4">Santa Isabel</option>';
    parroquias[1] = '<option value="m2_p1">Boconó</option><option value="m2_p2">El Carmen</option><option value="m2_p3">Mosquey</option><option value="m2_p4">Ayacucho</option><option value="m2_p5">Burbusay</option><option value="m2_p6">General Ribas</option><option value="m2_p7">Guaramacal</option><option value="m2_p8">Vega de Guaramacal</option><option value="m2_p9">Monseñor Jáuregui</option><option value="m2_p10">Rafael Rangel</option><option value="m2_p11">San Miguel</option><option value="m2_p12">San José</option>';
    parroquias[2] = '<option value="m3_p1">Sabana Grande</option><option value="m3_p2">Cheregüé</option><option value="m3_p3">Granados</option>';
    parroquias[3] = '<option value="m4_p1">Arnoldo Gabaldón</option><option value="m4_p2">Bolivia</option><option value="m4_p3">Carrillo</option><option value="m4_p4">Cegarra</option><option value="m4_p5">Chejendé</option><option value="m4_p6">Manuel Salvador Ulloa</option><option value="m4_p7">San José</option>';
    parroquias[4] = '<option value="m5_p1">Carache</option><option value="m5_p2">La Concepción</option><option value="m5_p3">Cuicas</option><option value="m5_p4">Panamericana</option><option value="m5_p5">Santa Cruz</option>';
    parroquias[5] = '<option value="m6_p1">Escuque</option><option value="m6_p2">La Unión (El Alto Escuque)</option><option value="m6_p3">Santa Rita</option><option value="m6_p4">Sabana Libre</option>';
    parroquias[6] = '<option value="m7_p1">El Socorro</option><option value="m7_p2">Los Caprichos</option><option value="m7_p3">Antonio José de Sucre</option>';
    parroquias[7] = '<option value="m8_p1">Campo Elías</option><option value="m8_p2">Arnoldo Gabaldón</option>';
    parroquias[8] = '<option value="m9_p1">Santa Apolonia</option><option value="m9_p2">El Progreso</option><option value="m9_p3">La Ceiba</option><option value="m9_p4">Tres de Febrero</option>';
    parroquias[9] = '<option value="m10_p1">El Dividive</option><option value="m10_p2">Agua Santa</option><option value="m10_p3">Agua Caliente</option><option value="m10_p4">El Cenizo</option><option value="m10_p5">Valerita</option>';
    parroquias[10] = '<option value="m11_p1">Monte Carmelo</option><option value="m11_p2">Buena Vista</option><option value="m11_p3">Santa María del Horcón</option>';
    parroquias[11] = '<option value="m12_p1">Motatán</option><option value="m12_p2">El Baño</option><option value="m12_p3">Jalisco</option>';
    parroquias[12] = '<option value="m13_p1">Pampán</option><option value="m13_p2">Flor de Patria</option><option value="m13_p3">La Paz</option><option value="m13_p4">Santa Ana</option>';
    parroquias[13] = '<option value="m14_p1">Pampanito</option><option value="m14_p2">La Concepción</option><option value="m14_p3">Pampanito II</option>';
    parroquias[14] = '<option value="m15_p1">Betijoque</option><option value="m15_p2">José Gregorio Hernández</option><option value="m15_p3">La Pueblita</option><option value="m15_p4">Los Cedros</option>';
    parroquias[15] = '<option value="m16_p1">Carvajal</option><option value="m16_p2">Campo Alegre</option><option value="m16_p3">Antonio Nicolás Briceño</option><option value="m16_p4">José Leonardo Suárez</option>';
    parroquias[16] = '<option value="m17_p1">Sabana de Mendoza</option><option value="m17_p2">Junín</option><option value="m17_p3">Valmore Rodríguez</option><option value="m17_p4">El Paraíso</option>';
    parroquias[17] = '<option value="m18_p1">Andrés Linares</option><option value="m18_p2">Chiquinquirá</option><option value="m18_p3">Cristóbal Mendoza</option><option value="m18_p4">Cruz Carrillo</option><option value="m18_p5">Matriz</option><option value="m18_p6">Monseñor Carrillo</option><option value="m18_p7">Tres Esquinas</option>';
    parroquias[18] = '<option value="m19_p1">Cabimbú</option><option value="m19_p2">Jajó</option><option value="m19_p3">La Mesa de Esnujaque</option><option value="m19_p4">Santiago</option><option value="m19_p5">Tuñame</option><option value="m19_p6">La Quebrada</option>';
    parroquias[19] = '<option value="m20_p1">Juan Ignacio Montilla</option><option value="m20_p2">La Beatriz</option><option value="m20_p3">La Puerta</option><option value="m20_p4">Mendoza del Valle de Momboy</option><option value="m20_p5">Mercedes Díaz</option><option value="m20_p6">San Luis</option>';

    function llena_parroquias(n,obj)
    {
        switch(n)
        {
            case 'm1': $(obj).html(parroquias[0]); break;
            case 'm2': $(obj).html(parroquias[1]); break;
            case 'm3': $(obj).html(parroquias[2]); break;
            case 'm4': $(obj).html(parroquias[3]); break;
            case 'm5': $(obj).html(parroquias[4]); break;
            case 'm6': $(obj).html(parroquias[5]); break;
            case 'm7': $(obj).html(parroquias[6]); break;
            case 'm8': $(obj).html(parroquias[7]); break;
            case 'm9': $(obj).html(parroquias[8]); break;
            case 'm10': $(obj).html(parroquias[9]); break;
            case 'm11': $(obj).html(parroquias[10]); break;
            case 'm12': $(obj).html(parroquias[11]); break;
            case 'm13': $(obj).html(parroquias[12]); break;
            case 'm14': $(obj).html(parroquias[13]); break;
            case 'm15': $(obj).html(parroquias[14]); break;
            case 'm16': $(obj).html(parroquias[15]); break;
            case 'm17': $(obj).html(parroquias[16]); break;
            case 'm18': $(obj).html(parroquias[17]); break;
            case 'm19': $(obj).html(parroquias[18]); break;
            case 'm20': $(obj).html(parroquias[19]); break;
        }
    }
