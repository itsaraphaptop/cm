<form action="#" class="form-horizontal">
    <div class="form-group">
        <label class="col-lg-3 control-label text-right">Currency Code :</label>
        <div class="col-lg-7">
            <input type="hidden" name="currency_id" id="cur_idup"  value="<?=$row[0]->currency_id;?>">
            <input type="text" class="form-control" placeholder="Currency Code" id="curcode_up" value="<?=$row[0]->currency_code;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label text-right">Currency Name(EN) :</label>
        <div class="col-lg-7">
            <input type="text" class="form-control" placeholder="Currency Name" id="curname_enup" value="<?=$row[0]->currency_name_en;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label text-right">Currency Name(TH) :</label>
        <div class="col-lg-7">
            <input type="text" class="form-control" placeholder="Currency Name" id="curname_thup" value="<?=$row[0]->currency_name_th;?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-12 text-right">
            <button type="button" class="btn btn-success" id="currency_edit">
                <i class="icon-floppy-disk"></i>
                save
            </button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="close_modal">
                <i class="icon-close2"></i>
                Close
            </button>
        </div>
    </div>
</form>

<script>
    $('#currency_edit').click(function() {
        var eid = $('#cur_idup').val(); // id
        var eco = $('#curcode_up').val(); //code
        var enup = $('#curname_enup').val(); //name en
        var thup = $('#curname_thup').val(); // name th
        // alert(eid+eid+enup+thup)
        $.post("<?=base_url();?>data_master/currency_edit", { id:eid, code: eco, en: enup, th: thup },function () {
        }).done(function(data) {
            // console.log(data);
            var json_res = jQuery.parseJSON(data);
            if(json_res.status == true) {
                show_nonti("success !!",json_res.message,"success");
                $('input').val("");
                $('#close_modal').click();
                setTimeout(() => {
                    location.reload();
                }, 1200);
            } else {
                show_nonti("error !!",json_res.message,"error");
            // alert('66666');
            }
        });
        // close_modal id close
    })
</script>