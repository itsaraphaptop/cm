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
            <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Setup TAX Description<p></p></h6>
            <div class="heading-elements">
                <div style="float:right;display:block;">
                    <button class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="icon-plus-circle2"></i> New</button>
                </div>
            </div>
            </div>
			<div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-xxs datatable-basic" id="tax">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>TAX Description Name</th>
                                <th>TAX Description Name(EN)</th>
                                <th>Percent</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($taxdes as $key => $val) {
                            ?>
                            <tr>
                                <td><?=$key+1;?></td>
                                <td><?=$val['tax_desname'];?></td>
                                <td><?=$val['tax_desname_en'];?></td>
                                <td><?=$val['percent'];?></td>
                                <td>
                                    <a type="button" class="edit" attr-id="<?=$val['id_taxdes'];?>"><i class="icon-pencil7"></i> </a>
                                    <a type="button" class="del" attr-id="<?=$val['id_taxdes'];?>"><i class="icon-trash"></i> </a>
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
        <h4 class="modal-title">Add TAX Description</h4>
      </div>
      <div class="modal-body">
        <form action="#" class="form-horizontal">
            <div class="form-group">
                <label class="col-lg-3 control-label text-right">TAX Description Name :</label>
                <div class="col-lg-7">
                    <input type="text" class="form-control" placeholder="TAX Name" id="taxdes_name">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label text-right">TAX Description Name (EN):</label>
                <div class="col-lg-7">
                    <input type="text" class="form-control" placeholder="TAX Name(EN)" id="taxdes_name_en">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label text-right">Percent (%) :</label> 
                <div class="col-lg-3">
                    <input type="number" class="form-control" placeholder="Percent number" id="percent">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-12 text-right">
                    <button type="button" class="btn btn-success" id="taxdes_save">
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
        <h4 class="modal-title">Edit TAX Description</h4>
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

    $('#taxdes_save').click(function() {
        // var code = $('#tax_code').val();
        var name = $('#taxdes_name').val();
        var nameen = $('#taxdes_name_en').val();
        var per = $('#percent').val();

        if (name == '') {
            show_nonti("error !!","กรุณากรอกชื่อ","error");
        }else if(per <= -1){
            show_nonti("error !!","กรุณากรอกเปอร์เซ็นเป็นจำนวนเต็มบวก","error");
        }else{
            
            $.post("<?=base_url();?>datastore/add_taxdes",
            { 
                name: name,
                nameen: nameen,
                per: per
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
        var taxdes_id = $(this).attr('attr-id');
        // alert(id);
        $('#editmodal').modal('show');
        $.post("<?=base_url();?>datastore/content_modal_taxdes", { taxdes_id: taxdes_id }, function () {   
        }).done(function(data) {
            $('#modaledit').html(data);
            // alert(data);
        });
        // $('#modaledit').html('<h1>Loadding...</h1>');
    });

    $('.del').click(function(data) {
        var taxdes_id = $(this).attr('attr-id');
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
            del_id = taxdes_id;
            // alert(del_id);
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
            setTimeout(() => {
                $.post("<?=base_url();?>datastore/taxdes_del", { id: del_id }, function () {    

                }).done(function(data) {
                    console.log(data);
                    location.reload();
                });
            }, 1200);
        });
    });
// });
</script>
