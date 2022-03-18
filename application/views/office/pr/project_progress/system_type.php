<form method="post" id="formData">
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>No.</th>
			<th>Type Code</th>
			<th>Type Name</th>
			<th>Amount</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody id="add_tr">
		<?php
      $i = 1;
      foreach ($system as $key => $value) {
    ?>
    <tr>
      <td class="text-center"><?= $i ?></td>
      <td><?= $value->projectd_job ?></td>
      <td><?= $value->systemname ?></td>
      <td><?= $value->job_amount ?></td>
      <td></td>
    </tr>
    
    <?php
      $i++;
      }
    ?>

    <?php
			foreach ($system_ref as $key_ref => $value_ref) {
		?>
		<tr>
			<td class="text-center"><?= $i ?></td>
			<td><?= $value_ref->system_code ?></td>
			<td><?= $value_ref->system_name ?></td>
			<td><?= $value_ref->system_amount ?></td>
			<td></td>
		</tr>
		
		<?php
			$i++;
			}
		?>
	</tbody>
</table>
<br/>
<div class="col-lg-4">
  <a class="btn btn-primary btn-xs" id="add_row"><i class="fa fa-plus"></i> Add Row</a>
  <a class="btn btn-success btn-xs" id="save"><i class="fa fa-save"></i> บันทึก</a>
</div>
<input type="text" name="project_code" hidden="true" value="<?= $project_code ?>">
</form>

<div class="cost"></div>
<script type="text/javascript">
	$('#add_row').click(function(event) {
		var row = $("#add_tr tr").length+1;
		var tr = '<tr id="'+row+'">'+
    '<td class="text-center">'+row+'<input type="hidden" name="chki[]" id="chki" class="form-control input-xs" readonly="true" value="Y"></td>'+
    '<td width="20%"><input type="text" name="bd_jobno[]" id="bd_jobno'+row+'" class="input-xs form-control" readonly="true"></td>'+
    '<td><div class="input-group"><input type="text" name="bd_jobname[]" id="bd_jobname'+row+'" class="form-control input-xs" readonly="true"><span class="input-group-btn"><button type="button" data-toggle="modal" data-target="#sycode'+row+'" class="sycode'+row+' btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button></span></div></td>'+
    '<td><input type="text" name="bd_amount[]" id="bd_amount" class="input-xs txt form-control" value=".00" style="text-align:right;"></td>'+
    '<td>'+
      '<a id="remove" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>'+
    '</td>'+
  '</tr>';
  $('#add_tr').append(tr);
  var cost =  '<div class="modal fade" id="sycode'+row+'" data-backdrop="false">'+
    '<div class="modal-dialog modal-lg">'+
      '<div class="modal-content">'+
        '<div class="modal-header bg-info">'+
          '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
          '<h4 class="modal-title" id="myModalLabel">Ref. Asset Code</h4>'+
        ' </div>'+
        '<div class="modal-body">'+
          '<div id="sy'+row+'"></div>'+
        '</div>'+
      '</div>'+
    '</div>'+
  '</div>';
  $('.cost').append(cost);
  $('.sycode'+row+'').click(function(){
  $('#sy'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#sy"+row+"").load('<?php echo base_url(); ?>share/system/'+row);
  });
	});


$(document).on('click', 'a#remove', function () {
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
      onClick: function ($noty) {
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
    onClick: function ($noty) {
      $noty.close();
        noty({
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
  });

$(function(){
  $("#save").click(function(){
       var formData = new FormData($("#formData")[0]); 

       // console.log(formData);
       $.ajax({
                  url: '<?=base_url()?>Project_progress/add_system',
                  type: 'POST',
                  data: formData,
                  async: false,
                  success: function (data) {

                    try{
                       console.log(data);

                       var json = jQuery.parseJSON(data);
                       if(json.status == true){

                          window.location = '<?=base_url()?>Project_progress';
                          
                       }else{
                        
                          $.simplyToast(json.message, 'danger');
                       }
                    }catch(e){
                          $.simplyToast(e, 'danger');
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
  });
});



</script>