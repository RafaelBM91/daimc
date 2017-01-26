$(document).ready(function( ){

    $('div.panel').css({
        position: 'absolute',
        top: '190px',
        left: '16px',
        width: '1202px',
        height: '280px'
    });
    $('div.panel-header div.panel-title').html('DAIMC');

    var u = $('<table class="easyui-datagrid" title="Basic DataGrid" style="width:1202px;height:280px"><thead><tr><th data-options="field:\'item1\',width:60">CODIGO</th><th data-options="field:\'item2\',width:80">CEDULA</th><th data-options="field:\'item3\',width:150">NOMBRE Y APELLIDO</th><th data-options="field:\'item4\',width:50">EDAD</th><th data-options="field:\'item5\',width:50">SEXO</th><th data-options="field:\'item6\',width:110">MUNICIPIO</th><th data-options="field:\'item7\',width:110">PARROQUIA</th><th data-options="field:\'item8\',width:80">TELEFONO</th><th data-options="field:\'item9\',width:150">DIAGNOSTICO</th><th data-options="field:\'item10\',width:100">OBSERVACION</th><th data-options="field:\'item11\',width:100">FECHA</th><th data-options="field:\'item12\',width:100">REFERIDO</th></tr></thead></table>');

    u.appendTo('form');

    $('input#btn_busq').click(function(e){
        if($('input[name=opc_busq]:checked').val() == 1)
            Tconculta($('#sel_area_busq').val(),$('#desd_busq').val(),$('#hast_busq').val(),$('input[name=opc_busq]:checked').val(),'null');
        else
            if($('input[name=opc_busq]:checked').val() == 2)
                Tconculta($('#sel_area_busq').val(),$('#desd_busq').val(),$('#hast_busq').val(),$('input[name=opc_busq]:checked').val(),$('#cedula_atn_busq').val());
            else
                if($('input[name=opc_busq]:checked').val() == 3)
                    Tconculta($('#sel_area_busq').val(),$('#desd_busq').val(),$('#hast_busq').val(),$('input[name=opc_busq]:checked').val(),$('#municipio_atn_busq').val());
                else
                    if($('input[name=opc_busq]:checked').val() == 4)
                        Tconculta($('#sel_area_busq').val(),$('#desd_busq').val(),$('#hast_busq').val(),$('input[name=opc_busq]:checked').val(),$('#parroquia_atn_busq').val());
                    else
                        Tconculta($('#sel_area_busq').val(),$('#desd_busq').val(),$('#hast_busq').val(),$('input[name=opc_busq]:checked').val(),$('#cedula_real_busq').val());
    });

    $('input#nom_ped_atn_busq').keyup(function(){
        if($('#sel_area_busq').val() == 'ar_07')
            Tconculta($('#sel_area_busq').val(),'null','null',5,$(this).val());
    });

    function Tconculta(area,desde,hasta,tipo,param)
    {
        var fen = 0, mas = 0;
        var cols = $('table.easyui-datagrid thead tr ').children().length;
        $('div.datagrid div.datagrid-wrap div.datagrid-view2 table.datagrid-btable tbody').html(null);
        alert(0)
        $.post('consulta_interna.php', { area_busq:area, desde_busq:desde, hasta_busq:hasta, tipo_busq:tipo, param_busq:param }, function(data){
            var datos = $.parseJSON(data);
            for(var i=0; i<datos.length; i++) {
                var tr = $('<tr id="datagrid-row-r1-2-'+i+'" class="" style="height:auto;"></tr>');
                for(var j=0; j<cols; j++) {
                    if(j == 4)
                    {
                        if(datos[i][j] == 'f'){ fen++; $('<td field="item'+ (j + 1) +'" style="height:auto;background-color:#FF008B;"><div style="height: auto;" class="datagrid-cell datagrid-cell-c1-item'+ (j + 1) +'">'+ datos[i][j] +'</div></td>').appendTo(tr); }
                        else{ mas++; $('<td field="item'+ (j + 1) +'" style="height:auto;background-color:#009CFF;"><div style="height:auto;" class="datagrid-cell datagrid-cell-c1-item'+ (j + 1) +'">'+ datos[i][j] +'</div></td>').appendTo(tr); }
                    }
                    else $('<td field="item'+ (j + 1) +'" style="height: auto;"><div style="height: auto;" class="datagrid-cell datagrid-cell-c1-item'+ (j + 1) +'">'+ datos[i][j] +'</div></td>').appendTo(tr);
                };
                tr.appendTo('div.datagrid div.datagrid-wrap div.datagrid-view2 table.datagrid-btable tbody');
            };
        });
    };

    $('#cedula_bn, #cedula_cr, #cedula_dp, #cedula_bn_fi, #cedula_fi').keyup(function(e){
        Tconculta($(this).val());
    });

});

function Tconculta_hide(){ flag = false; }