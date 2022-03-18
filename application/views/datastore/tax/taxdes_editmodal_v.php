        <form action="#" class="form-horizontal">
            <div class="form-group">
                <label class="col-lg-3 control-label text-right">TAX Name :</label>
                <div class="col-lg-7">
                    <input type="hidden" name="taxdes_id_edit" id="taxdes_id_edit" value="<?=$tax[0]['id_taxdes'];?>">
                    <input type="text" class="form-control" id="taxdes_name_edit" placeholder="TAX Name" name="taxdes_name_edit" value="<?=$tax[0]['tax_desname'];?>">
                </div>
                <br>
                <div class="form-group">
                    <label class="col-lg-3 control-label text-right">TAX Description Name (EN):</label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" placeholder="TAX Name(EN)" value="<?=$tax[0]['tax_desname_en'];?>" id="taxdes_name_en_edit">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label text-right">Percent (%) :</label> 
                    <div class="col-lg-3">
                        <input type="number" class="form-control" placeholder="Percent number" value="<?=$tax[0]['percent'];?>" id="percent_edit">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-12 text-right">
                    <button type="button" class="btn btn-success" id="tax_save_edit">
                        <i class="icon-floppy-disk"></i>
                        Save
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="close_modal_edit">
                        <i class="icon-close2"></i>
                        Close
                    </button>
                </div>
            </div>
        </form>
        <script type="text/javascript">
            $('#tax_save_edit').click(function() {
                var id = $('#taxdes_id_edit').val();
                var name = $('#taxdes_name_edit').val();
                var nameen = $('#taxdes_name_en_edit').val();
                var per = $('#percent_edit').val();
                $.post('<?=base_url();?>datastore/edit_taxdes', {id: id ,name: name,nameen: nameen,per: per }, function() {
                    /*optional stuff to do after success */
                }).done(function(data){
                    // alert(data);
                    var json_res = jQuery.parseJSON(data);
                    // alert(json_res.status);
                    if(json_res.status == true) {
                        show_nonti("success !!",json_res.message,"success");
                        $('input').val("");
                        $('#close_modal').click();
                        setTimeout(() => {
                            $('#editmodal').modal('hide');
                            location.reload();
                        }, 1500);

                    } else {
                        show_nonti("error !!",json_res.message,"error");
                    // alert('66666');
                    }
                });
            });
        </script>