        <form action="#" class="form-horizontal">
            <div class="form-group">
                <label class="col-lg-3 control-label text-right">TAX Name :</label>
                <div class="col-lg-7">
                    <input type="hidden" name="tax_id_edit" id="tax_id_edit" value="<?=$tax[0]['id_tax'];?>">
                    <input type="text" class="form-control" id="tax_name_edit" placeholder="TAX Name" name="tax_name_edit" value="<?=$tax[0]['tax_name'];?>">
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
                var id = $('#tax_id_edit').val();
                var name = $('#tax_name_edit').val();
                $.post('<?=base_url();?>datastore/edit_tax', {id: id ,name: name }, function() {
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