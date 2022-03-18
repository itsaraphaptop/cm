<?php $n=1; $all=0;  foreach ($res as $key){ 
	$all=$all+$key->bdd_amount; ?>
	
		
			<tr>			
			<td class="text-center"><?php echo $n; ?><input type="hidden" name="bdd_no[]" id="bdd_no" class="form-control input-sm" readonly="true" value="<?php echo $key->bdd_no;?>"><input type="hidden" name="chki[]" id="chki" class="form-control input-sm" readonly="true" value="X"></td>                  
            <td width="20%"><input type="text" name="bd_jobno[]" id="bd_jobno<?php echo $n; ?>" class="form-control input-sm" readonly="true" value="<?php echo $key->bdd_jobno; ?>"></td>
            <td><div class="input-group"><input type="text" name="bd_jobname[]" id="bd_jobname<?php echo $n; ?>" class="form-control input-sm" readonly="true" value="<?php echo $key->bdd_jobname; ?>"><span class="input-group-btn">
            <button type="button" data-toggle="modal" data-target="#sycode<?php echo $n; ?>" class="sycode<?php echo $n; ?> btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button>
            </span></div></td>
            <td><input type="text" name="bd_amount[]" id="bd_amount" class="txt form-control input-sm" value="<?php echo $key->bdd_amount; ?>" style="text-align:right;"></td>

            <td><a id="remove" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
			<td><div class="modal fade" id="sycode<?php echo $n; ?>" data-backdrop="false">
  
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Bid Project Tender</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="sy<?php echo $n; ?>">

            </div>
            </div>
        </div>
    </div>
  </div>
</div></td>
            </tr>


<script>
	$("#totalresue").val("<?php echo $all; ?>");
</script>
<script>
	$(".sycode<?php echo $n; ?>").click(function(){
	$('#sy<?php echo $n; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#sy<?php echo $n; ?>").load('<?php echo base_url(); ?>index.php/share/system/<?php echo $n; ?>');
     });
     

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
 	
	$("input#totalresue").val(sum.toFixed(2));
}


</script>
            <?php $n++;} ?>	