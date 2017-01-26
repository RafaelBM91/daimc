<legend>Archivo Digital</legend>
<div class="form-group has-success">
    <div class="col-sm-3">
        <input id="cedula_atn_arch" name="cedula_atn_arch" type="text"  class="int form-control" title="Cedula" maxlength="10" tabindex="1" placeholder="Cedula" autofocus disabled/>
        <label style="margin-top:5px;" for="menor">Sin Cedula:&nbsp;&nbsp;&nbsp;<input type="checkbox" id="menor" name="menor"></label>
        <script>
            $(document).ready(function(e){
                $('input#menor').change(function(e){
                    if($(this).is(':checked')) {
                        $('input#cedula_atn_arch').removeClass('int');
                        $('input#cedula_atn_arch').attr('placeholder','Nombre');
                        $('input#cedula_atn_arch').attr('maxlength','100');
                    } else {
                        $('input#cedula_atn_arch').addClass('int');
                        $('input#cedula_atn_arch').attr('placeholder','Cedula');
                        $('input#cedula_atn_arch').attr('maxlength','10');
                    }
                });
                $('input#cedula_atn_arch').keyup(function(e){
                    if(e.which == 32) {
                        $(this).val( $(this).val().replace(' ', '_') );
                    }
                });
            });
        </script>
    </div>
    <div class="col-sm-5">
        <input id="archivo" name="archivo" type="file"  class="form-control" title="" tabindex="2" placeholder=""/>
    </div>
</div>
<div class="form-group has-success">
    <div class="col-sm-3">
        <input id="btn_save" type="button" class="btn btn-success btn-sm" title="Guardar" tabindex="3" value="Guardar" tabindex="3" style="width:100px;" />
    </div>
        <input name="opr_area" id="opr_area" type="hidden" value="archivo">
        <input name="opr" id="opr" type="hidden" value="i">
        <input name="arch_del" id="arch_del" type="hidden" value="">
</div>
        <div id="resultados_arch" style="position:absolute;top:180px;left:9px;width:1200px;height:330px;"></div>
