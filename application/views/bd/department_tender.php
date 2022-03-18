	<!-- //form -->


<div class="content-wrapper" >
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Home - Setup Bid Department Tender</span></h4>
			</div>
		</div>
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>panel/office"><i class="icon-home2 position-left"></i> Home</a></li>
				<li><a href="<?php echo base_url(); ?>bd/department_post">Setup Bid Department Tender</a></li>
			</ul>
		</div>
	</div>
	<div class="content">
	<form action="<?php echo base_url(); ?>index.php/bd_active/bd_pjtender/<?=$res[0]->bd_tenid; ?>" method="post" style="width: 100%">
		<div class="panel panel-flat">
			<div class="panel-body">
					<h1>Department</h1>
					<div class="row">
						<div class="col-xs-2">
							<div class="form-group">
								<label>Tender No :</label>
								<input type="text" class="form-control input-xs" id="bd_tenid" name="bd_tenid" value="<?=$res[0]->bd_tenid; ?>" readonly="true">
								<input type="hidden" class="form-control" id="bd_chk" name="bd_chk" value="E">
							</div>
						</div>
						<div class="col-xs-3">
							<!-- <div class="form-group">
								<label class="display-block">Type :</label>
								<label class="radio-inline">
								<?php 
								$checked1 ="";
								$checked2 ="";
								if ($res[0]->bd_type == '1') {
									$checked1 = "checked";
								}else if($res[0]->bd_type == '2') {
									$checked2 = "checked";
								}else {
									$checked1 ="";
									$checked2 ="";
								}
								?>
									<input type="checkbox" name="bd_type" id="bd_type1" value="1" <?=$checked1; ?>>
									ConStruction
								</label>
								
							</div> -->
						</div>
						
						<div class="col-xs-2">
							<!-- <div class="form-group">
								<label>Department No :</label>
								<input type="text" class="form-control input-xs" id="bd_pno" name="bd_pno" value="<?=$res[0]->bd_pno;?>" readonly="tue">
							</div> -->
						</div>
					</div>
					<div class="row">
						<div class="col-xs-4">
							<div class="form-group">
								<label>Department Name :</label>
								<input type="text" class="form-control input-xs" id="bd_pname" name="bd_pname" value="<?=$res[0]->bd_pname;?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-2">
							<div class="form-group">
								<label class="control-label">Date :</label>
								<input type="date" class="form-control input-xs" id="bd_date" name="bd_date" value="<?=$res[0]->bd_date;?>">
								
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">
								<label class="control-label">Year :</label>
								<input type="text" class="form-control input-xs" id="bd_year" name="bd_year" value="<?=$res[0]->bd_year;?>" readonly="true">
								
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">
								<label class="control-label">Month :</label>
								<input type="text" class="form-control input-xs" id="bd_month" name="bd_month" value="<?=$res[0]->bd_month;?>" readonly="true">
								
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								<label class="control-label">Status :</label>
								<select class="form-control" id="bd_bdstats" name="bd_bdstats">
								<?php 
								$sel1 ="";
								$sel2 ="";
								$sel3 ="";
									if ($res[0]->bd_bdstats == '1') {
										$sel1 ="selected";
									}else if($res[0]->bd_bdstats == '2'){
										$sel2 ="selected";
									}else if($res[0]->bd_bdstats == '3'){
										$sel3 ="selected";
									}
								?>
									<option value=""></option>
									<option value="1" <?=$sel1;?> >In Process</option>
									<option value="2" <?=$sel2;?> >Wait</option>
									<option value="3" <?=$sel3;?> >Reject Join Bid</option>
								</select>
							</div>
						</div>
					</div>


					<div class="row">
	 <div class="form-group col-xs-3">
     <a  id="bd_inserttender"  class="retrieve btn bg-info"><i class="icon-plus2"></i> Add items</a>

                  </div>
                  </div>
		</div>
		<div class="panel panel-flat">
			<div class="panel-heading">
				<div class="row">

					<table class="table table-hover table-bordered table-striped table-xxs" id="res">
						<thead>
							<tr>
								
								<th style="text-align: center;">No.</th>
								<th style="text-align: center;">Job</th>
								<th style="text-align: center;">Job Name</th>
								<th style="text-align: center;">Amount</th>
								<th style="text-align: center;">Action</th>
							</tr>
						</thead>
						<tbody id="tenderboday">
							<?php 
							$i=1;
								foreach ($res1 as $key => $value) { ?>
								<tr>
									<td class="text-center"><?=$i;?><input type="hidden" name="chki[]" value="X"><input type="hidden" name="bdd_no[]" value="<?=$value['bdd_no'];?>"></td>
									<td><input type="text" name="bd_jobno[]" class="form-control input-xs" id="bd_jobno<?=$i;?>" value="<?=$value['bdd_jobno'];?>" readonly="true"></td>
									<td>
										<div class="input-group">
											<input type="text" name="bd_jobname[]" class="form-control input-xs" id="bd_jobname<?=$i;?>" value="<?=$value['bdd_jobname'];?>" readonly="true">
											<span class="input-group-btn">
												<button type="button" data-toggle="modal" data-target="#search_detail<?=$i;?>" attr="bd_jobname<?=$i;?>" class="sy<?=$i;?> btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button>
											</span>
										</div>
									</td>
									<td ><input type="text" name="bd_amount[]" class="txt form-control input-xs text-right total" value="<?=$value['bdd_amount'];?>"></td>
									<td class="text-center"><a id="remove" data-popup="tooltip" title="" delid2="<?=$value['bdd_tenid'];?>" delid1="<?=$value['bdd_jobno'];?>" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a></td>
								</tr>



								<div class="modal fade" id="search_detail<?=$i;?>" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">รายการบันทึกทรัพย์สิน</h4>
			</div>
			<div class="modal-body">
				<div class="panel-body">
					<div class="row" id="detail_content<?=$i;?>">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	
	$(".sy<?=$i;?>").click(function(){
	var id = $(this).attr('attr');
	// alert(id);
    $("#detail_content<?=$i;?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#detail_content<?=$i;?>").load('<?php echo base_url(); ?>index.php/share/system/<?=$i;?>');
});
</script>
							<?php	
							$i++;	
								}

							 ?>
						</tbody>
						<tbody>
							<tr id="summation">
								<th colspan="3" style="text-align: center;">Total</th>
								<th width="20%"><input type="text" id="totalresue" value="0.00" name="" class="form-control input-xs" style="text-align:right;"></th>
								<th></th>
							</tr>
						</tbody>
					</table>
					

				</div>
				<br>
				<div class="row">
					<div class="form-group col-lg-3">
								
								
								<button type="submit" class="btn bg-success" id="submit"><i class="icon-floppy-disk"></i> Save</button>
						
								<a id="fa_delect" class="btn bg-danger" style="display: none;">Delete</a>
								<a id="fa_close" href="<?php echo base_url(); ?>index.php/bd/boq_openProject" class="btn bg-danger"><i class="icon-close2"></i> Close</a>
			
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="cost"></div>
<div class="modal fade" id="cowner" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">รายการลูกหนี้</h4>
			</div>
			<div class="modal-body">
				<div class="panel-body">
					<div class="row" id="owner">

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="project" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Project</h4>
			</div>
			<div class="modal-body">
				<div class="panel-body">
					<div class="row" id="project_content">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="unit" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Unit</h4>
			</div>
			<div class="modal-body">
				<div class="panel-body">
					<div class="row" id="unit_content">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
				


<script type="text/javascript">
$('body').attr('class', 'navbar-top pace-done');
//Script sum Total Amount in tabjob
	var to = 0;
	    $('.total').each(function() {
	        to += parseFloat($(this).val());
	    });
	    // alert(to);
    $('#totalresue').val(to);
//Script sum Total Amount in tabjob

$(".sy").click(function(){
	var id = $(this).attr('attr');
	// alert(id);
    $("#detail_content").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#detail_content").load('<?php echo base_url(); ?>index.php/share/system');
});
$("#search_cus").click(function(){
	$('#owner').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
	$("#owner").load('<?php echo base_url(); ?>index.php/share/debtor');
});
$("#search_pro").click(function(){
    $('#project_content').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#project_content").load('<?php echo base_url(); ?>index.php/share/project');
});
$("#search_unit").click(function(){
    
    $('#unit_content').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#unit_content").load('<?php echo base_url(); ?>index.php/share/unit');

});
	$("#bd_date").change(function(event) {
		// alert($("#bd_date").val());
		var de_date = $("#bd_date").val();
		var y = de_date.slice(0,4);
		var d = de_date.slice(8,11);
		var m = de_date.slice(5,7);
		$("#bd_year").val(y);
		$("#bd_month").val(m);
	});

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
// $(document).on('click', 'a#remove', function () { // <-- changes
//     var self = $(this);
//     var id = $(this).attr('delid1');
//     var bdd_tenid = $(this).attr('delid2');
//  	// console.log(id);
//     noty({
//         width: 200,
//         text: "Do you want to Delete?",
//         type: self.data('type'),
//         dismissQueue: true,
//         timeout: 1000,
//         layout: self.data('layout'),
//         buttons: (self.data('type') != 'confirm') ? false : [
//             {
//                 addClass: 'btn btn-primary btn-xs',
//                 text: 'Ok',
//                 onClick: function ($noty) { //this = button element, $noty = $noty element
//                     	$.post('<?php echo base_url(); ?>bd/del_db_tenid/'+bdd_tenid+'/'+id, function() {
//                     		/*optional stuff to do after success */
//                     	}).done(function(data){
//                     		// console.log(data);
//                     		var json_res = jQuery.parseJSON(data);
//                     		if (json_res.status == "true") {
// 			                    $noty.close();
// 			                    self.closest('tr').remove();
// 			                    noty({
// 			                        force: true,
// 			                        text: 'Deleteted',
// 			                        type: 'success',
// 			                        layout: self.data('layout'),
// 			                        timeout: 1000
// 			                    });
//                     		} else {
//                     			alert("ไม่สามารถลบได้");
//                     		}
//                     	});

//                 }
//             },
//             {
//                 addClass: 'btn btn-danger btn-xs',
//                 text: 'Cancel',
//                 onClick: function ($noty) {
//                     $noty.close();
//                     noty({
//                         force: true,
//                         text: 'You clicked "Cancel" button',
//                         type: 'error',
//                         layout: self.data('layout'),
//                         timeout: 1000,
//                     });
//                 }
//             }
//         ]
//     });

//     return false;


//  });
</script>


<script>
$("#bd_inserttender").click(function(){
	 addrow();
   var check_dis = $('#submit').attr('disabled');
   if (check_dis == 'disabled') {
    $('#submit').removeAttr('disabled');
   }

	});
	 function addrow()
            {            
              var row = ($('#tenderboday tr').length)-0+1;
              var tr = '<tr id="'+row+'">'+
			'<td class="text-center">'+row+'<input type="hidden" name="chki[]"  value="Z"></td>'+                           
            '<td width="20%"><input type="text" name="bd_jobno[]" id="bd_jobno'+row+'" class="input-xs form-control" readonly="true"></td>'+
            '<td><div class="input-group"><input type="text" name="bd_jobname[]" id="bd_jobname'+row+'" class="form-control input-xs" readonly="true"><span class="input-group-btn"><button type="button" data-toggle="modal" data-target="#sycode'+row+'" class="sycode'+row+' btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button></span></div></td>'+
            '<td><input type="text" name="bd_amount[]" id="bd_amount" class="input-xs txt form-control" value=".00" style="text-align:right;"></td>'+ 

            '<td class="text-center">'+
             '<a id="remove" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>'+

                       '</td>'+

                       '</tr>';

              $('#tenderboday').append(tr);



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

        return false;


  });



            $('input').addClass('input-xs');
           </script>
