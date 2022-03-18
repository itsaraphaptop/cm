<div class="content">
  <div class="col-sm-6">
  <div class="panel panel-white">
  <div class="panel-heading">
<h2 class="panel-title"><b>Setup Approve : Repair</b> <a class="addrow btn bg-info" id="insertpodetail1">Add Member</a></h2>

<br>
<div>
 <form action="<?php echo base_url(); ?>datastore_active/approve_fa" method="post" id="save_fa">
    <table class="table table-hover table-bordered table-striped table-xxs" id="res">
      <thead>
        <tr>
          <th width="5%" style="text-align: center;">NO.</th>
          <th width="5%" style="text-align: center;">Confirmation sequence</th>
          <th width="5%" class="text-center">Member ID</th>
          <th width="20%" style="text-align: center;">Member Name</th>
          <th width="10%" style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody id="body1">
        <?php $n=1; foreach ($f as $fa) { ?>
        <tr>
          <td class="text-center"><?php echo $n; ?><input type="hidden" name="chkfa[]" value="Y"><input type="hidden" name="idpr[]" value="<?php echo $fa->id; ?>"></td>
          <td><input type="text" class="form-control input-sm text-center" id="approve_sequence<?php echo $n; ?>" name="approve_sequence[]" value="<?php echo $fa->approve_sequence; ?>"></td>
          <td><input type="text" class="form-control input-sm " id="approve_mid1<?php echo $n; ?>" name="approve_mid[]" value="<?php echo $fa->approve_mid; ?>" readonly></td>
          <td><div class="input-group">
            <input type="text" name="approve_mname[]" id="approve_mname1<?php echo $n; ?>"  class="form-control input-xs" value="<?php echo $fa->approve_mname; ?>" readonly>
            <span class="input-group-btn" >
              <button type="button" class="accopen11<?php echo $n; ?> btn btn-info btn-sm" id="approvem11<?php echo $n; ?>" data-toggle="modal" data-target="#approvemodal1<?php echo $n; ?>" ><i class="icon-search4"></i></button>
            </span>
          </div></td>
         
          <td class="text-center"><a href="<?php echo base_url(); ?>datastore_active/delfa/<?php echo $fa->id; ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
        </tr>
        <script>
        $("#approve_lock1<?php echo $n; ?>").click(function(){
        if ($("#approve_lock1<?php echo $n; ?>").prop("checked")) {
        $("#lock1<?php echo $n; ?>").val("Y");
        }else{
        $("#lock1<?php echo $n; ?>").val("N");
        }
        });
        </script>
        <div id="approvemodal1<?php echo $n; ?>" class="modal fade">
          <div class="modal-dialog modal-lg">
            <div class="modal-content ">
              <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">เพิ่มรายการ</h5>
              </div>
              <div class="modal-body">
                <div class="row" id="approvems1<?php echo $n; ?>">
                </div>
              </div>
            </div>
          </div>
        </div>
        <script>
        var one = "1";
        $('.accopen11<?php echo $n; ?>').click(function(){
        $('#approvems1<?php echo $n; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#approvems1<?php echo $n; ?>").load('<?php echo base_url(); ?>share/member/<?php echo $n; ?>/'+one);
        });
        </script>
        <?php $n++; }  ?>
      </tbody>
    </table>
    

  </div>

</div>


</div>
 <a type="button" class="btn bg-success " id="save_faa"><i class="glyphicon glyphicon-floppy-disk"></i> <span>Save</span></a>
</form>
</div>

<div class="rowmat1"></div>
<script>
$("#insertpodetail1").click(function(){
   addrow1();
$("[name='sign[]']").click(function(){
      var val = $(this).val();
      var array = val.split(",");
      
      var status = $(this).prop( "checked");
      
      if(array.length < 4){
          alert("กรุณากดปุ่ม save ก่อน ถึงจะทำการยืนยันได้");
          $(this).prop( "checked" ,false);
      }else{
              send_sign(array , status);
      }
});
   

   $('#save_faa').show();
  });
   function addrow1()
            {        
              var row = ($('#body1 tr').length)-0+1;
              var tr = '<tr id="'+row+'">'+
            '<td class="text-center">'+row+'<input type="hidden" name="chkfa[]" value="X"></td>'+                           
             '<td><input type="text" class="form-control input-sm text-center" id="approve_sequence'+row+'" name="approve_sequence[]" value="'+row+'"></td>'+
             '<td><input type="text" class="form-control input-sm text-right" id="approve_mid1'+row+'" name="approve_mid[]" value="" readonly></td>'+
             '<td>'+
             '<div class="input-group">'+
                  '<input type="text" name="approve_mname[]" id="approve_mname1'+row+'"  class="form-control input-xs" readonly>'+
                  '<span class="input-group-btn" >'+
                  '<button type="button" class="accopen btn btn-info btn-sm" id="approvem1'+row+'" data-toggle="modal" data-target="#approvemodal1'+row+'" ><i class="icon-search4"></i></button>'+
                  ' </span>'+
                 '</div>'+
                 '</td>'+
           
             '<td class="text-center">'+   
                '<a id="remove" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>'+
                 
            '</td>'+

                       '</tr>';


        
              $('#body1').append(tr);


$("#approve_lock1"+row+"").click(function(){
        if ($("#approve_lock1"+row+"").prop("checked")) {
            $("#lock1"+row+"").val("Y");
        }else{
            $("#lock1"+row+"").val("N");
        }

      });

$("#approve_cost"+row+"").keydown(function(){
var approve_costw = $("#approve_cost"+roww+"").val();
var approve_cost = $("#approve_cost"+row+"").val();
if(approve_costw<approve_cost){
$("#approve_cost"+row+"").val("0.00");
}

});
 var one = "1";
 var rowmat1 = ' <div id="approvemodal1'+row+'" class="modal fade">'+
            '<div class="modal-dialog modal-lg">'+
              '<div class="modal-content ">'+
                '<div class="modal-header bg-info">'+
                  '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                  '<h5 class="modal-title">เพิ่มรายการ</h5>'+
                '</div>'+
                  '<div class="modal-body">'+
                   '<div class="row" id="approvems1'+row+'">'+
                    '</div>'+
                  '</div>'+
              '</div>'+
            '</div>'+
            '</div>';

          $('#approvem1'+row).click(function(){
          $('#approvems1'+row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#approvems1"+row).load('<?php echo base_url(); ?>share/member/'+row+'/'+one);
 });
$('.rowmat1').append(rowmat1);


            }


            $(document).on('click', 'a#remove', function () { // <-- changes

        var self = $(this);
        noty({
            width: 200,
            text: "Do you want to Delete?",
            type: self.data('type'),
            dismissQueue: true,
            timeout: 1000,
            layout: self.data('layout'),
            buttons: (self.data('type') != 'confirm') ? false : [
                {
                    addClass: 'btn btn-primary btn-xs',
                    text: 'Ok',
                    onClick: function ($noty) { //this = button element, $noty = $noty element
                        $noty.close();
                        self.closest('tr').remove();
                        noty({
                            force: true,
                            text: 'Deleteted',
                            type: 'success',
                            layout: self.data('layout'),
                            timeout: 1000,
                        });

                    }
                },
                {
                    addClass: 'btn btn-danger btn-xs',
                    text: 'Cancel',
                    onClick: function ($save) {
                        $save.close();
                        save({
                            force: true,
                            text: 'You clicked "Cancel" button',
                            type: 'error',
                            layout: self.data('layout'),
                            timeout: 1000,
                        });
                    }
                }
            ]
        });

        return false;


  });

var timeoutID;

function delayedAlert() {
  timeoutID = window.setTimeout(refrshna, 1500);
}
  function refrshna(){
    $('#res').html("<img src='<?php echo base_url(); ?>index.php/assets/images/loading.gif'> Loading...");
    $("#res").load('<?php echo base_url(); ?>index.php/asset_active/getlesssetup/');
  }

 </script>

  <script>
   $("#save_faa").click(function(e){

          var frm = $('#save_fa');
            frm.submit(function (ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                            success: function (data) {


                        swal({
                                  title: "FA Setup Aprove"+data,
                                  text: "Save Completed!!.",
                                  // confirmButtonColor: "#66BB6A",
                                  type: "success"
                              });
                         setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>add_asset/repair_asset";
                        }, 500);
                    }
                });
                ev.preventDefault();

            });
   $("#save_fa").submit(); //Submit  the FORM

});
 </script>