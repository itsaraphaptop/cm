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
            <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Setup Currency<p></p></h6>
            <div class="heading-elements">
                <div style="float:right;display:block;">
                    <button class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="icon-plus-circle2"></i> New</button>
                </div>
            </div>
            </div>
			<div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-xxs datatable-basic" id="currency">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Currency Code</th>
                                <th>Currency Name(EN)</th>
                                <th>Currency Name(th)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($rows as $key => $curr) {
                            ?>  
                            <tr>
                                <td><?=$key+1;?></td>
                                <td><?=$curr->currency_code;?></td>
                                <td><?=$curr->currency_name_en;?></td>
                                <td><?=$curr->currency_name_th;?></td>
                                <td>
                                    <a type="button" class="edit" attr-id="<?=$curr->currency_id;?>"><i class="icon-pencil7"></i> </a>
                                    <a type="button" class="del" attr-id="<?=$curr->currency_id;?>"><i class="icon-trash"></i> </a>
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
        <h4 class="modal-title">Add Currency</h4>
      </div>
      <div class="modal-body">
        <form action="#" class="form-horizontal">
            <div class="form-group">
                <label class="col-lg-3 control-label text-right">Currency Code :</label>
                <div class="col-lg-7">
                    <input type="text" class="form-control" placeholder="Currency Code" id="currency_code">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label text-right">Currency Name(EN) :</label>
                <div class="col-lg-7">
                    <input type="text" class="form-control" placeholder="Currency Name" id="currency_name_en">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label text-right">Currency Name(TH) :</label>
                <div class="col-lg-7">
                    <input type="text" class="form-control" placeholder="Currency Name" id="currency_name_th">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-12 text-right">
                    <button type="button" class="btn btn-success" id="currency_save">
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
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="Edit" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Currency</h4>
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
    $('#currency').DataTable();

    $('#currency_save').click(function() {
        var code = $('#currency_code').val();
        var en = $('#currency_name_en').val();
        var th = $('#currency_name_th').val();

        if (en == '' || th == '' && code) {
            show_nonti("error !!","กรุณากรอกข้อมูล","error");
        }else{
            
            $.post("<?=base_url();?>data_master/save_currency",
            { 
                code: code, 
                en: en,
                th: th
            },function () {
            }).done(function(data) {
                // console.log(data);
                var json_res = jQuery.parseJSON(data);
                // // alert(json_res.status);
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

    // $('#currency_edit').click(function() {
    //     alert('edit');
    // })
    $('.edit').click(function() {
        var curr_id = $(this).attr('attr-id');
        // alert(id);
        $('#Edit').modal('show');
        $.post("<?=base_url();?>data_master/content_modal_curr", { curr_id: curr_id }, function () {   
        }).done(function(data) {
            $('#modaledit').html(data);
        });
        // $('#modaledit').html('<h1>Loadding...</h1>');
    });

    $('.del').click(function(data) {
        var curr_id = $(this).attr('attr-id');
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
            del_id = curr_id;
            // alert(del_id);
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
            setTimeout(() => {
                $.post("<?=base_url();?>data_master/currency_del", { id: del_id }, function () {    

                }).done(function(data) {
                    console.log(data);
                    location.reload();
                });
            }, 1200);
        });
    });
// });
</script>
