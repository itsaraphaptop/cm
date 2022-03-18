<style type="text/css">
.fixed {
  position: fixed;
  /*background: #fff;*/
  z-index: 10;
  width: 90%;
}
</style>

<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content">
		<div class="panel panel-flat">
        <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Setup Tax Type<p></p></h6>
            <div class="heading-elements">
            <div style="float:right;display:block;">
                    <button class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="icon-plus-circle2"></i> New</button>
                </div>
            </div>
            </div>
			<div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-xxs" id="tax">
                        <thead>
                            <tr>
                                <th width="20%">No.</th>
                                <th>TAX Type Name</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($taxtype as $key => $val) {
                            ?>
                            <tr>
                                <td><?=$key+1;?></td>
                                <td><?=$val['taxtype_name'];?></td>
                                <td>
                                    <a type="button" class="edit" attr-id="<?=$val['id_taxtype'];?>"><i class="icon-pencil7"></i> </a>
                                    <a type="button" class="del" attr-id="<?=$val['id_taxtype'];?>"><i class="icon-trash"></i> </a>
                                </td>

                            </tr>
                            <?php 
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
		</div>
	</div>
    </div>
    </div>
	</div>
	</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add TAX Type</h4>
      </div>
      <div class="modal-body">
        <form action="#" class="form-horizontal">
            <div class="form-group">
                <label class="col-lg-3 control-label text-right">TAX Type Name :</label>
                <div class="col-lg-7">
                    <input type="text" class="form-control" placeholder="TAX Name" id="taxtype_name">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-12 text-right">
                    <button type="button" class="btn btn-success" id="taxtype_save">
                        <i class="icon-floppy-disk"></i>
                        Save
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="close_modal">
                        <i class="icon-close2"></i>
                        Close
                    </button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="editmodal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit TAX Type</h4>
      </div>
      <div class="modal-body" >
        <div id="modaledit"></div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script>
// $(document).ready(function(){
    // $('#tax').DataTable();

    $('#taxtype_save').click(function() {
        // var code = $('#tax_code').val();
        var name = $('#taxtype_name').val();

        if (name == '') {
            show_nonti("error !!","กรุณากรอกข้อมูล","error");
        }else{
            
            $.post("<?=base_url();?>datastore/add_taxtype",
            { 
                name: name
            },function () {
            }).done(function(data) {
                // console.log(data);
                var json_res = jQuery.parseJSON(data);
                // alert(json_res.status);
                if(json_res.status == true) {
                    show_nonti("success !!",json_res.message,"success");
                    $('input').val("");
                    $('#close_modal').click();
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                } else {
                    show_nonti("error !!",json_res.message,"error");
                // alert('66666');
                }
            });
        }
    })

    $('.edit').click(function() {
        var taxtype_id = $(this).attr('attr-id');
        // alert(id);
        $('#editmodal').modal('show');
        $.post("<?=base_url();?>datastore/content_modal_taxtype", { taxtype_id: taxtype_id }, function () {   
        }).done(function(data) {
            $('#modaledit').html(data);
            // alert(data);
        });
        // $('#modaledit').html('<h1>Loadding...</h1>');
    });

    $('.del').click(function(data) {
        var taxtype_id = $(this).attr('attr-id');
        swal({
            title: "คุณต้องการลบ?",
            text: "รายการนี้ใช่ไหม!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function(){
            del_id = taxtype_id;
            // alert(del_id);
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
            setTimeout(() => {
                $.post("<?=base_url();?>datastore/taxtype_del", { id: del_id }, function () {    

                }).done(function(data) {
                    console.log(data);
                    location.reload();
                });
            }, 1200);
        });
    });
// });
</script>
