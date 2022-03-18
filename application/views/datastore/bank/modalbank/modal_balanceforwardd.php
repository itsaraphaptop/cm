
<div class="row">
<div class="form-group">
			<label class="col-lg-2 control-labelt">Bank Code:</label>
			<div class="col-lg-2">
			<input type="text" readonly="" class="form-control" id="" name="bank"  value="<?php echo $bankcode; ?>">
			</div>

			<label class="col-lg-2 control-labelt">Branch Code:</label>
			<div class="col-lg-2">
			<input type="text" readonly=""  class="form-control" id="" name="branch"  value="<?php echo $branchcode; ?>">
			</div>
		</div><br>
</div>
<br>
<div class="row">
<div class="form-group">
			<label class="col-lg-2 control-labelt">Account No.:</label>
			<div class="col-lg-4">
			<input type="text" class="form-control" id="" name="accountno"  value="<?php echo $bankacc; ?>">
			</div>
		</div><br>
</div>
<br>

<?php 
      $this->db->select('*');
      $this->db->where('acc_code',$bankacc);
      $backm = $this->db->get('bank_account')->result(); 
      foreach ($backm as $keym) {
        $branch_type = $keym->branch_type;
        $branch_acc = $keym->branch_acc;
        $branch_date = $keym->branch_date;
        $branch_remark = $keym->branch_remark;
      }
?>
<div class="row">
<div class="form-group">
			<label class="col-lg-2 control-labelt">Account Type.:</label>
			<div class="col-lg-1">
			<input type="text" class="form-control" id=""  value="<?php echo $branch_type; ?>" name="accounttype">
			</div>

			<label class="col-lg-2 control-labelt">A/C Code.:</label>
			<div class="col-lg-3">
       <div class="input-group">
			<input type="text" class="form-control" id="account" name="account" value="<?php echo $branch_acc; ?>">
      <span class="input-group-btn"> 
      <button type="button" class="accc btn btn-info btn-sm" data-toggle="modal" data-target="#openunitac"><i class="icon-search4"></i></button>
      </span>
      </div>
			</div>

     <script>
          $(".accc").click(function(){
          $('#ac').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#ac").load('<?php echo base_url(); ?>share/modalac');
        });
        </script>
			<label class="col-lg-1 control-labelt">Date:</label>
			<div class="col-lg-3">
			<input type="date" class="form-control" id="" name="date"  value="<?php echo $branch_date; ?>">
			</div>
		</div><br>
</div>

<br>

<div class="row">
<div class="form-group">
			<label class="col-lg-2 control-labelt">Remark. :</label>
			<div class="col-lg-9">
			<input type="text" class="form-control" id="" name="remark"  value="<?php echo $branch_remark; ?>">
			</div>
		</div><br>

</div>
<br>
<div class="col-md-12">
	<a class="addrow btn bg-info" id="insertpodetail">Insert row</a>
</div>
<div class="col-md-12">
                  <br>
                 
                  <table class="table table-hover table-bordered table-striped table-xxs" id="res">
                    <thead>
                      <tr>
                            
                               <th class="text-center">Project ID</th>
                               <th  style="text-align: center;">Dept ID</th>
                               <th  style="text-align: center;">Project/Dept Name</th>                   
                               <th style="text-align: center;">Amount</th>
                               <th style="text-align: center;">Action</th>
                               
                      </tr>
                    </thead>

       
  
                    <tbody id="body">
                    <?php 
      $this->db->select('*');
      $this->db->where('bank_no',$bankacc);
      $backm_d = $this->db->get('bankforward')->result(); 
      $amt_bank = 0;
      foreach ($backm_d as $keym_d) { 
        $amt_bank = $amt_bank+ $keym_d->amt_bank;
        ?>
                      <tr>
                      <td class="text-right"><input type="hidden" name="chki[]" id="chki" class="form-control input-sm" readonly="true" value="X"><?php echo $keym_d->pj_bk; ?></td>
                      <td class="text-right"><?php echo $keym_d->dm_bk; ?></td>
                      <td class="text-right"><?php echo $keym_d->pjdm_bank; ?></td>
                      <td class="text-right"><input class="txt form-control text-right" type="text" name="" value="<?php echo $keym_d->amt_bank; ?>"></td>
                      <td></td>
                      </tr>

                        <?php  } ?>
                    </tbody>


                      <tr>
                      <td colspan="3" class="text-center">Total</td>
                      <td><input class="form-control input-sm text-right"  type="" id="sumfor" name="" readonly="" value="<?php echo $amt_bank; ?>"></td>
                      <td class="text-center"></td>
                      
                      </tr>
                  </table>

                 
             
                </div>


       
                 <script>
$("#insertpodetail").click(function(){
   addrow();
  });
   function addrow()
            {            
              var row = ($('#body tr').length)-0;
              var tr = '<tr id="'+row+'">'+
                               
           '<td>'+
                  '<div class="input-group">'+
                  '<input type="hidden" name="chki[]" id="chki" class="form-control input-sm" readonly="true" value="Y">'+
                  '<input type="text" name="pj[]"  id="projectidd'+row+'" class="form-control input-xs" readonly>'+
                  '<span class="input-group-btn" >'+
                  '<button type="button" class="pjja'+row+' btn btn-info btn-sm" data-toggle="modal" data-target="#project'+row+'"><i class="icon-search4"></i></button>'+
                  ' </span>'+
                 '</div>'+
                '</td>'+
            '<td>'+
                  '<div class="input-group">'+
                  '<input type="text" name="dp[]"  id="dpt_code'+row+'" class="form-control input-xs" readonly>'+
                  '<span class="input-group-btn" >'+
                  '<button type="button"class="dept'+row+' btn btn-info btn-sm"  data-toggle="modal" data-target="#dpt'+row+'"><i class="icon-search4"></i></button>'+
                  ' </span>'+
                 '</div>'+
                '</td>'+
            '<td><input type="text" name="namedp[]" id="pjdpt_title'+row+'" class="form-control input-sm" ></td>'+
            '<td><input type="text" name="amt[]" id="amt'+row+'" class="txt form-control input-sm text-right" value=".00"></td>'+
             '<td class="text-center">'+   
                '<a id="remove" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>'+
                 
            '</td>'+

                       '</tr>';

        
              $('#body').append(tr);

    calculateSum();
    $(".txt").on("keydown keyup", function() {
        calculateSum();
    });


function calculateSum() {
    var sum = 0;
    //iterate through each textboxes and add the values
    $(".txt").each(function() {
        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
            sum += parseFloat(this.value);
            $(this).css("background-color", "#FEFFB0");
        }
        else if (this.value.length != 0){
            $(this).css("background-color", "red");
        }
    });
  
  $("input#sumfor").val(sum.toFixed(2));
}

          var rowmat = ' <div id="project'+row+'" class="modal fade">'+
            '<div class="modal-dialog modal-lg">'+
              '<div class="modal-content ">'+
                '<div class="modal-header bg-primary">'+
                  '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                  '<h5 class="modal-title">Project</h5>'+
                '</div>'+
                  '<div class="modal-body">'+
                   '<div class="row" id="modal_p'+row+'">'+
                    '</div>'+
                  '</div>'+
              '</div>'+
            '</div>'+
            '</div>';

             $('.pjja'+row).click(function(){
          $('#modal_p'+row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#modal_p"+row).load('<?php echo base_url(); ?>share/project/'+row);
 });
$('.rowmat').append(rowmat);



var rowmat = '<div class="modal fade" id="dpt'+row+'" data-backdrop="false">'+
        '<div class="modal-dialog modal-lg">'+
          '<div class="modal-content">'+
            '<div class="modal-header bg-primary">'+
              '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<h4 class="modal-title" id="myModalLabel">Department</h4>'+
            '</div>'+
              '<div class="modal-body">'+
                  '<div id="modal_d'+row+'"></div>'+
              '</div>'+
          '</div>'+
        '</div>'+
      '</div>';

 $('.rowmat').append(rowmat);

  $(".dept"+row+"").click(function(){
       $('#modal_d'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#modal_d"+row+"").load('<?php echo base_url(); ?>index.php/share/department/'+row+'');
     });
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
    

 
    $('#res').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#res").load('<?php echo base_url(); ?>asset_active/getlesssetup/');
  }






           </script>

 