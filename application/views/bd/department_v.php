<?php $tdn=$this->uri->segment(3); ?>
<?php 
$this->db->select('*');
$this->db->from('bdtender_h');
$this->db->where('bd_tenid',$tdn);
$tender_h=$this->db->get()->result();
foreach ($tender_h as $key) {
$bd_type = $key->bd_type;
$bd_status = $key->bd_status;
$bd_pno = $key->bd_pno;
$bd_pname = $key->bd_pname;
$bd_date = $key->bd_date;
$bd_year = $key->bd_year;
$bd_month = $key->bd_month;
$bd_cus = $key->bd_cus;
$bd_cusn = $key->bd_cusn;
}
?>

<?php 
$this->db->select('*');
$this->db->from('project');
$this->db->where('bd_tenid',$tdn);
$project=$this->db->get()->result();
$project_code = "";
$projectid = "";
$approve_user = "";
$approve_bg = "";
$project_sub = "";
$substatus = "";
foreach ($project as $pjjbg) {
$project_code = $pjjbg->project_code;
$projectid = $pjjbg->project_id;
$approve_bg = $pjjbg->approve_bg;
$approve_user = $pjjbg->approve_user;
$project_sub = $pjjbg->project_sub;
$substatus = $pjjbg->project_substatus;
}
?>
<!-- Main content  trans-->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Project Biding and Bill of Quality System</span></h4>
						</div>
					</div>
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li>
							<a href="<?php echo base_url(); ?>panel/office"><i class="icon-home2 position-left"></i> Dashboard </a>/Project Biding and Bill of Quality System
							</li>
						</ul>	
					</div>
				
				</div>
 
    <div class="panel panel-info">
      <div class="panel-heading">BILL OF QUALITY (BOQ)</div>
      <div class="panel-body">

	

<div class="row">
	<div class="col-xs-6">
		<div class="row">
			<div class="col-xs-3">
			<div class="input-group">
			<span class="input-group-addon">Tender No:</span>
			<input class="form-control input-xs" name="tcalcoorb" id="tcalcoorb" value="<?php echo $tdn; ?>">
			</div>
			</div>
			<div class="col-xs-3">
			<div class="input-group">
			<span class="input-group-addon">Status :</span>
			<input class="form-control input-xs" name="tcalcoorb" value="<?php echo $bd_status; ?>" readonly="">
			</div>
			</div>
			<div class="col-xs-3">
			<div class="input-group">
			<span class="input-group-addon">Department No :</span>
			<input class="form-control input-xs" name="tcalcoorb" value="<?php echo $project_code; ?>" readonly="">
			</div>
			</div>
		</div>

	</div>
</div>
<br><br>
<div class="row">
	<div class="col-xs-6">
		
			<div class="input-group">
			<span class="input-group-addon">Department Name :</span>
			<input class="form-control input-xs" name="tcalcoorb" value="<?php echo $bd_pname; ?>" readonly="">
			


			</div>
		
	</div>
	<div class="col-xs-2">
		
			<div class="input-group">
			<input class="input-group" type="checkbox" id="" name="" disabled="disabled"  <?php if($approve_bg=="1"){
				echo 'checked=""';
				} ?> >
			<span class="input-group"><b style="color: red;">Approve Budget </b>
			<p style="color: #778899;">(Edit by:  <?php echo $approve_user ; ?>)</p>
			</span>

			</div>
	</div>
</div>
<br><br>
<div class="row">
<div class="col-xs-8">
	<div class="row">
		
		<div class="col-xs-3">
			
			<div class="input-group">
				<span class="input-group-addon">Date :</span>
				<input class="form-control input-xs" type="date" name="tcalcoorb" id="tcalcoorb" value="<?php echo $key->bd_date; ?>" readonly="">
			</div>
			
		</div>
		<div class="col-xs-3">
			
			<div class="input-group">
				<span class="input-group-addon">Year :</span>
				<input class="form-control input-xs" name="tcalcoorb" id="tcalcoorb" readonly="" value="<?php echo $key->bd_year; ?>">
			</div>
			
		</div>
		<div class="col-xs-3">
			
			<div class="input-group">
				<span class="input-group-addon">Month :</span>
				<input class="form-control input-xs" name="tcalcoorb" id="tcalcoorb" readonly="" value="<?php echo $key->bd_month; ?>">
			</div>
			
		</div>
		<div class="col-xs-3">
			<div class="input-group">
				<span class="input-group"><input class="input-group" type="checkbox" id="" name="" disabled="disabled">Row Calculate</span>
				
			</div>
		</div>
	</div>
</div>
	
</div>
<br><br>

		

<br><br>
<div class="row">
	<div class="col-xs-6">
		<?php
			if ($approve_bg=="1") {
				}else{
			?>
			<a  class="btn btn-primary  btn-lg" id="addboq">#ADDROW</a>
			<button type="button" class="preload btn btn-danger btn-lg" data-toggle="modal" data-target="#import_excel">#IMPORT</button>
			<a href="https://drive.google.com/file/d/0BzmMj2L4rgDWbXJoSFVqbTdhSWM/view?usp=sharing" target="_blank" class="btn btn-primary  btn-lg" id="addboq">#FORM BOQ Exel</a>
			<a id="add_bom" class="btn btn-success  btn-lg" id="addboq">#ADDBOM</a>			<?php	
				}
			?>
		
	</div>
	
</div>  

<!-- Trigger the modal with a button -->

<!-- modal BOM -->
<div id="modal_add_bom" class="modal fade" role="dialog">
  <div class="modal-dialog modal-full">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" >BOM</h4>
      </div>
      <div class="modal-body" id="content_modal">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<script type="text/javascript">
	$('#add_bom').click(function() {
		$.get('<?php echo base_url(); ?>bd/show_all_bom', function(data) {
		}).done(function(data){
			var boq_idd = $('#boq_idd').val();
			$('#content_modal').html(data);
			$('#modal_add_bom').modal('show');
		},function(){
			$('.add_bom').click(function(event) {
		  		var code = $(this).attr('mat_code');
		  		var tcalcoorb = $('#tcalcoorb').val();
				var num_row = $('#body tr').length;

		  		$.post('<?php echo base_url(); ?>bd/show_bom_detail', {bom_code: code, tcalcoorb:tcalcoorb , num_row:num_row}, function(data) {
		  		}).done(function(data){
		  			$('#body').append(data);
		  		},function(){
					$('.cost_code').click(function() {
						var code = $(this).attr("code");
						$.post('<?php echo base_url(); ?>share/costcode_id_by_bd', {code: code}, function(data) {
						}).done(function(data){
							$('#costcode').html(data);
							$('#modal_cost_code').modal('show');
						});
					});

					$('.cost_code_ls').click(function() {
						var code = $(this).attr("code");
						$.post('<?php echo base_url(); ?>share/costcode_id_ls_bd', {code: code}, function(data) {
						}).done(function(data){
							$('#costcode').html(data);
							$('#modal_cost_code').modal('show');
						});
					});

					$('.qty , .mat_price , .mat_amt').keyup(function() {
						
					

						var num = $(this).attr('num');
						var qty_bd = $('#qty_bd'+num).val().replace(/,/g,"");
						var mat_price = $('#mat_price'+num).val().replace(/,/g,"");
						var mat_amt = (qty_bd*1)*(mat_price*1);
						$("#mat_amt"+num).val(numberWithCommas(mat_amt));


						// alert(mat_price);
					});

					$('.lab_price').keyup(function() {

						

						var num = $(this).attr('num');
						var qty_bd = $('#qty_bd'+num).val().replace(/,/g,"");
						var lab_price = $('#lab_price'+num).val().replace(/,/g,"");
						var lab_amt = (qty_bd*1)*(lab_price*1);
						var mat_amt= $("#mat_amt"+num).val().replace(/,/g,"");
						var amt = (lab_amt*1)+(mat_amt*1);
						$("#amount"+num).val(numberWithCommas(amt));
						$("#lab_amt"+num).val(numberWithCommas(lab_amt));
					});
					$('.mat_price_boq').keyup(function() {
						

						var num = $(this).attr('num');
						var qty_boq = $('#qty_boq'+num).val().replace(/,/g,"");
						var mat_price_boq = $('#mat_price_boq'+num).val().replace(/,/g,"");
						var mat_amt_boq = (qty_boq*1)*(mat_price_boq*1);
						$('#mat_amt_boq'+num).val(numberWithCommas(mat_amt_boq));

					});

					$('.lab_price_boq').keyup(function() {
						

						var num = $(this).attr('num');
						var qty_boq = $('#qty_boq'+num).val().replace(/,/g,"");
						var lab_price_boq = $('#lab_price_boq'+num).val().replace(/,/g,"");
						var lab_amt_boq = (qty_boq*1)*(lab_price_boq*1);
						$('#lab_amt_boq'+num).val(numberWithCommas(lab_amt_boq));
						var mat_amt_boq = $('#mat_amt_boq'+num).val().replace(/,/g,"");
						var amt_boq = (mat_amt_boq*1)+(lab_amt_boq*1);
						$('#amt_boq'+num).val(numberWithCommas(amt_boq));

					});

					$('.remove').click(function() {
						var num = $(this).attr('num');
						$('#remove'+num).parent().parent().remove();
					});
		  		});
			});

		});
	});
</script>

<div id="modal_cost_code" class="modal fade" role="dialog">
  <div class="modal-dialog modal-full">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">เพิ่มรายการ</h4>
      </div>
      <div class="modal-body">
	      <div id="costcode">	
	      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- modal BOM -->

 <div id="import_excel" class="modal fade">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-primary">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h5 class="modal-title">Import Employee By Excel <code>(.xls)</code></h5>
               </div>

               <div class="modal-body">

				<?php $this->load->helper('form'); ?>
				<?php echo form_open_multipart('import_boq/do_upload/'.$tdn);?>

				<div class="form-group">
					<!-- <label class="col-lg-2 control-label text-semibold">Templates modification:</label> -->
					<div class="col-lg-12">
						<input type="file" class="file-input-advanced"  id="file_upload" name="userfile">
						<span class="help-block">Support File <code>.xls</code> Only.</span>

					</div>
				</div>
                <input type="submit" class="btn btn-primary btn-sm" value="Upload" />
				<?php echo form_close();?>
				</div>
               <div class="modal-footer">
                 <a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
                 <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
               </div>
             </div>
           </div>
         </div>

<br>
<form action="<?php echo base_url(); ?>bd/boq_insert_bd_de" method="post">
<div class="panel panel-flat">
	<input type="hidden" class="form-control input-xs" name="subcost" value="<?php echo $project_sub; ?>" readonly="">
	<input type="hidden" class="form-control input-xs" name="substatus" value="<?php echo $substatus; ?>" readonly="">
	<div class="panel-body">
		<div class="tabbable">
			<ul class="nav nav-tabs nav-tabs-top">
				<li class="active"><a href="#top-tab1" data-toggle="tab">BOQ</a></li>
				<li><a href="#top-tab2" data-toggle="tab">Summary Budget Cost</a></li>
				<li><a href="#top-tab3" data-toggle="tab">Summary Material</a></li>
				
			</ul>
			<div class="tab-content">
			
				<div class="tab-pane active" id="top-tab1">
<div class="table-responsive">
<table class="table table-bordered table-striped table-xxs">
     <thead>
      <tr>
        <th >No.</th>
        <th >JOB</th>
        <th >MAT. CODE (MATERIAL)</th>
        <th >MAT. NAME (MATERIAL)</th>
        <th >MAT. CODE (LABOR/SUB CON.)</th>
        <th >MAT. NAME (LABOR/SUB CON.)</th>
        <th >COST C. (MATERIAL)</th>
        <th >COST C. (LABOR.SUB CON.)</th>
        <th >BOQ CODE</th>
        <th >MAT. BOQ</th>
        <th >BOM</th>
        <th >UNIT CODE</th>
        <th >UNIT NAME</th>
        <th >QTY (BUDGET)</th>
        <th style="background: #00BFFF;">MAT. PRICE (BUDGET)</th>
        <th style="background: #00BFFF;">MAT. AMT (BUDGET)</th>
        <th style="background: #20B2AA;">LAB. PRICE (BUDGET)</th>
        <th style="background: #20B2AA;">LAB. AMOUNT (BUDGET)</th>
        <th>TOTAL AMOUNT (BUDGET)</th>
        <th>QTY (BOQ)</th>
        <th>MAT. PRICE (BOQ)</th>
        <th>MAT. AMOUNT (BOQ)</th>
        <th>LAB PRICE (BOQ)</th>
        <th>LAB AMOUNT (BOQ)</th>
        <th>TOTAL AMOUNT (BOQ)</th>
     	<th>ACTION</th>
      </tr>
    </thead>

   <input type="hidden" name="projectid" id="projectid" value="<?php echo $projectid; ?>">
    <tbody id="body">
<!--     <?php 
$matamt=0;
$mamtboq=0;
$totalamtbg=0;
$labamtboq=0;
$totalamtboq=0;
 $n=1; 
$i=0;
 foreach ($ress as $boq){ 
 $matamt = $matamt+$boq->boq_budget_amt;
      $mamtboq= $mamtboq+$boq->boq_budget_total; 
      $totalamtbg = $totalamtbg+$boq->boq_amt;
      $labamtboq= $labamtboq+$boq->boq_lab_boqamt;
      $totalamtboq= $totalamtboq+$boq->boq_total_amt;
 	?>
     <tr>
        <td class="text-center">
        
        <?php echo $n; ?>
        <input type="hidden" name="boq_project[]" value="<?php echo $tdn; ?>">
        	<input type="hidden" name="chk[]" value="u">
        	<input type="hidden" name="date[]" value="<?php echo date("Y/m/d");?>">
        	<!-- <input type="hidden" name="boq_rev" value=""> -->
        	<!-- <input type="hidden" name="status[]" value="0"> -->
        	<!-- <input type="hidden" id="boq_idd" name="boq_idd[]" value="<?php //echo $boq->boq_id; ?>"> -->
        </td>
        <td class="text-center">
		<select name="systeme[]" id="systeme" style="width: 150px;" class="form-control input-xs" <?php echo ($approve_bg == "1" ) ? 'disabled="disabled"' : ''; ?> >
        <?php if($boq->boq_job==1){ ?><?php echo "<option value='1'>OVERHEAD</option>" ; ?> <?php } ?>
		<?php if($boq->boq_job==2){ ?><?php echo "<option value='2'>AC</option>" ; ?> <?php } ?>
		<?php if($boq->boq_job==3){ ?><?php echo "<option value='3'>EE</option>" ; ?> <?php } ?>
       	<?php if($boq->boq_job==4){ ?><?php echo "<option value='4'>SN</option>" ; ?> <?php } ?>
		<?php if($boq->boq_job==5){ ?><?php echo "<option value='5'>CIVIL</option>" ; ?> <?php } ?>
	 <?php 
$this->db->select('*');
$this->db->from('bdtender_d');
$this->db->where('bdd_tenid',$tdn);

$tender_d=$this->db->get()->result(); ?>
<?php  foreach ($tender_d as $tender_dd) {  
	
?>
<?php echo '<option value="'.$tender_dd->bdd_jobno.'">'.$tender_dd->bdd_jobname.'</option>'; ?>
<?php	} 
		$i++;
?>

        </select>
        <input type="hidden" name="idd" value="<?php echo $boq->boq_id; ?>">
        </td>
        <td class="text-center">

        <div class="input-group">
	        <input readonly="true" id="newmatcode<?= $i ?>" name="newmatcode[]"  type="text" value="<?php echo $boq->boq_mcode; ?>" class="form-control input-xs" style="width: 150px;">
	        <span class="input-group-btn">
		        <a class="openun<?= $i ?> btn btn-default btn-icon" data-toggle="modal"  data-target="#opnewmat<?= $i ?>"><i class="icon-search4"></i></a>
		        <a class="poo<?= $i ?> btn btn-default btn-icon" data-toggle="modal" data-target="#opnewmattt<?= $i ?>"><i class="icon-search4"></i></a>
		        <a class="clearmat<?= $i ?> btn btn-default btn-icon" ><i class="glyphicon glyphicon-trash"></i></a>
	        </span>
        </div>

        <script type="text/javascript">
		$(".openun<?= $i ?>").click(function(){
			$('#modal_mat<?= $i ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
	      	$("#modal_mat<?= $i ?>").load('<?php echo base_url(); ?>index.php/bd/material_alonee/<?= $i ?>');
			$('opnewmat<?= $i ?>').modal.show();
		});

		$(".poo<?= $i ?>").click(function(){
			$('#modal_matt<?= $i ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
			$('#modal_matt<?= $i ?>').load('<?php echo base_url(); ?>index.php/share/getmatcode/<?= $i ?>');
			$('opnewmat<?= $i ?>').modal.show();
		});
        </script>

		<div id="opnewmat<?= $i ?>" class="modal fade">
			<div class="modal-dialog modal-full">
				<div class="modal-content ">
					<div class="modal-header bg-info">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title">เพิ่มรายการ</h5>
					</div>
					<div class="modal-body">
						<div class="row" id="modal_mat<?= $i ?>">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="opnewmattt<?= $i ?>" class="modal fade">
			<div class="modal-dialog modal-full">
				<div class="modal-content ">
					<div class="modal-header bg-info">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title">เพิ่มรายการ</h5>
					</div>
					<div class="modal-body">
						<div class="row" id="modal_matt<?= $i ?>">
						</div>
					</div>
				</div>
			</div>
		</div>
   

    </td>
    <td class="text-center">
		<input value="<?php echo $boq->boq_mname; ?>"  readonly="true" id="newmatnamee<?php echo $i; ?>" name="newmatnamee[]"  type="text" class="form-control input-xs" style="width: 150px;">
     </td>
     <td class="text-center">
     <div class="input-group">
	     <input type="text" id="laborcode<?= $i ?>" value="<?php echo $boq->boq_subcode; ?>" readonly="true" name="laborcode[]" class="form-control input-xs" style=" width: 150px;">
	     <span class="input-group-btn">
		     <a class="openunnn<?= $i ?> btn btn-default btn-icon" data-toggle="modal" data-target="#opnewmatt_v2<?= $i ?>"><i class="icon-search4"></i></a>
		     <a class="mat_sub<?= $i ?> btn btn-default btn-icon" data-toggle="modal" data-target="#opnewmatt_sub<?= $i ?>"><i class="icon-search4"></i></a>
		     <a class="clearla<?= $i ?> btn btn-default btn-icon" ><i class="glyphicon glyphicon-trash"></i></a>
	     </span>
     </div>

     <script type="text/javascript">
		$(".openunnn<?= $i ?>").click(function(){
			$('#modal_mat_v2<?= $i ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
			$('#modal_mat_v2<?= $i ?>').load('<?php echo base_url(); ?>index.php/bd/material_alone/<?= $i ?>');
			$('#opnewmatt_v2<?= $i ?>').modal.show();
		});
     </script>

		<div id="opnewmatt_v2<?= $i ?>" class="modal fade" data-backdrop="false">
			<div class="modal-dialog modal-full">
				<div class="modal-content ">
					<div class="modal-header  bg-info">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title">เพิ่มรายการ</h5>
					</div>
					<div class="modal-body">
						<div class="row" id="modal_mat_v2<?= $i ?>"></div>
					</div>
				</div>
			</div>
		</div>
       <!--  <input value="<?php echo $boq->boq_subcode; ?>"  readonly="true" id="laborcode<?php echo $boq->boq_id; ?>" name="laborcode[]"  type="text" class="form-control input-xs" style="width: 200px;"> -->
    </td>
        <td class="text-center">
      
        <input value="<?php echo $boq->boq_subname; ?>" readonly="true" id="laborname<?php echo $boq->boq_id; ?>" name="laborname[]"  type="text" class="form-control input-xs" style="width: 200px;">
    </td>
        <td class="text-center">
        <div class="input-group">
			<input value="<?php echo $boq->boq_costmat; ?>" readonly="true" id="codecostcode<?php echo $n; ?>" name="codecostcode[]"  type="text" class="form-control input-xs" style="width: 200px;">
			<input value="<?php echo $boq->boq_costmatname; ?>" readonly="true" id="costname<?php echo $n; ?>" name="codecostname[]"  type="text" class="form-control input-xs" style=" width: 200px;">

			<span class="input-group-btn">
				<a class="btn btn-info btn-sm cost_code" code="<?php echo $boq->boq_id; ?>">
					<span class="glyphicon glyphicon-search"></span> ค้นหา
				</a>
			</span>
			<script type="text/javascript">
			$('.cost_code').click(function() {
				$.get('<?php echo base_url(); ?>share/costcode_id/<?php echo $n; ?>', function(data) {
				}).done(function(data){
					$('#costcode').html(data);
					$('#modal_cost_code').modal('show');
				});
			});
			</script>
        </div>
   
    </td>
        <td class="text-center">
		<div class="input-group">
			<input value="<?php echo $boq->boq_costsub; ?>" readonly="true" id="codecostcode<?php echo $boq->boq_id; ?>"  name="subcostcode[]"  type="text" class="form-control input-xs" style="
			width: 200px;">
			<input value="<?php echo $boq->boq_costsubname; ?>" readonly="true" id="costname<?php echo $boq->boq_id; ?>"  name="subcostname[]"  type="text" class="form-control input-xs" style="
			width: 200px;">
			<span class="input-group-btn">
				<a class="btn btn-info btn-sm cost_code_sub" code="<?php echo $boq->boq_id; ?>">
					<span class="glyphicon glyphicon-search"></span> ค้นหา
				</a>
			</span>
 	<script type="text/javascript">
			$('.cost_code_sub').click(function() {
				$.get('<?php echo base_url(); ?>share/costcode_id/<?php echo $boq->boq_id; ?>', function(data) {
				}).done(function(data){
					$('#costcode').html(data);
					$('#modal_cost_code').modal('show');
				});
			});
	</script>
 	
	</div>
    </td>
    <td class="text-center">

        <input value="<?php echo $boq->boq_boqcode; ?>"  id="boqcode<?php echo $boq->boq_id; ?>" name="boqcode[]"  type="text" class="form-control input-xs" style="width: 200px;" <?php echo ($approve_bg == "1" ) ? 'readonly="true"' : ''; ?> >
    </td>
        <td class="text-center">
        
        <input value="<?php echo $boq->boq_boqmat; ?>"  id="matboq<?php echo $boq->boq_id; ?>" name="matboq[]"  type="text" class="form-control input-xs" style="width: 200px;" <?php echo ($approve_bg == "1" ) ? 'readonly="true"' : ''; ?> >
    </td>
        <td class="text-center">
        
        <input value="<?php echo $boq->boq_bom; ?>"  id="bom<?php echo $boq->boq_id; ?>" name="bom[]"  type="text" class="form-control input-xs" style="width: 200px;" <?php echo ($approve_bg == "1" ) ? 'readonly="true"' : ''; ?> >
    </td>
        <td class="text-center">
        
        <input value="<?php echo $boq->boq_ucode; ?>" readonly="true" id="unitcode<?php echo $boq->boq_id; ?>" name="unitcode[]"  type="text" class="form-control input-xs" style="
    width: 200px;">
    </td>
        <td class="text-center">
        
        <input value="<?php echo $boq->boq_uname; ?>" readonly="true" id="unitname<?php echo $boq->boq_id; ?>" name="unitname[]"  type="text" class="form-control input-xs" style="
    width: 200px;">
    </td>
        <td class="text-center">
        
        <input value="<?php echo number_format($boq->boq_budget_qty); ?>"  id="qty_bg<?php echo $boq->boq_id; ?>" name="qty_bg[]"  type="text" class="form-control input-xs" style="width: 200px;" <?php echo ($approve_bg == "1" ) ? 'readonly="true"' : ''; ?>>
    </td>
        <td class="text-center">
       <input value="<?php echo number_format($boq->boq_budget_price); ?>"  id="matpricebg<?php echo $boq->boq_id; ?>" name="matpricebg[]"  type="text" class="form-control input-xs" style="width: 200px;" <?php echo ($approve_bg == "1" ) ? 'readonly="true"' : ''; ?>>
    </td>
        <td class="text-center">
        
        <input value="<?php echo number_format($boq->boq_budget_amt); ?>"  id="matamtbg<?php echo $boq->boq_id; ?>" name="matamtbg[]"  type="text" class="form-control input-xs" style="width: 200px;" <?php echo ($approve_bg == "1" ) ? 'readonly="true"' : ''; ?>>
    </td>
        <td class="text-center">
        
        <input value="<?php echo number_format($boq->boq_lab_price); ?>"  id="labpricebg<?php echo $boq->boq_id; ?>" name="labpricebg[]"  type="text" class="form-control input-xs" style="width: 200px;" <?php echo ($approve_bg == "1" ) ? 'readonly="true"' : ''; ?>>
    </td>
        <td class="text-center">
        
        <input value="<?php echo number_format($boq->boq_lab_amt); ?>"  id="labamtbg<?php echo $boq->boq_id; ?>" name="labamtbg[]"  type="text" class="form-control input-xs" style="width: 200px;" <?php echo ($approve_bg == "1" ) ? 'readonly="true"' : ''; ?>>
    </td>
        <td class="text-center">
        
        <input value="<?php echo number_format($boq->boq_budget_total); ?>"  id="totalamt<?php echo $boq->boq_id; ?>" name="totalamt[]"  type="text" class="form-control input-xs" style="width: 200px;" <?php echo ($approve_bg == "1" ) ? 'readonly="true"' : ''; ?>>
    </td>
        <td class="text-center">
       
        <input value="<?php echo number_format($boq->boq_qty); ?>"  id="qtyboq<?php echo $boq->boq_id; ?>" name="qtyboq[]"  type="text" class="form-control input-xs" style="width: 200px;" <?php echo ($approve_bg == "1" ) ? 'readonly="true"' : ''; ?>>
    </td>
        <td class="text-center">
        
        <input value="<?php echo number_format($boq->boq_price); ?>"  id="matpriceboq<?php echo $boq->boq_id; ?>" name="matpriceboq[]"  type="text" class="form-control input-xs" style="width: 200px;" <?php echo ($approve_bg == "1" ) ? 'readonly="true"' : ''; ?>>
    </td>
        <td class="text-center">
        
        <input value="<?php echo number_format($boq->boq_amt); ?>"  id="matamtboq<?php echo $boq->boq_id; ?>" name="matamtboq[]"  type="text" class="form-control input-xs" style="width: 200px;" <?php echo ($approve_bg == "1" ) ? 'readonly="true"' : ''; ?>>
    </td>
        <td class="text-center">
       
        <input value="<?php echo number_format($boq->boq_lab_boqprice); ?>"  id="labpriceboq<?php echo $boq->boq_id; ?>" name="labpriceboq[]"  type="text" class="form-control input-xs" style="width: 200px;" <?php echo ($approve_bg == "1" ) ? 'readonly="true"' : ''; ?>>
    </td>
        <td class="text-center">
        
        <input value="<?php echo number_format($boq->boq_lab_boqamt); ?>"  id="labamtboq<?php echo $boq->boq_id; ?>" name="labamtboq[]"  type="text" class="form-control input-xs" style="width: 200px;" <?php echo ($approve_bg == "1" ) ? 'readonly="true"' : ''; ?>>
    </td>
        <td class="text-center">
        
        <input value="<?php echo number_format($boq->boq_total_amt); ?>"  id="totalamtboq<?php echo $boq->boq_id; ?>" name="totalamtboq[]"  type="text" class="form-control input-xs" style="width: 200px;" <?php echo ($approve_bg == "1" ) ? 'readonly="true"' : ''; ?>>
    </td>
     	<td class="text-center">

     	<a id="remove<?php echo $boq->boq_id; ?>" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>  
     	
     	</td>
      </tr>

      <script>

      	$(document).on('click', 'a#remove<?php echo $boq->boq_id; ?>', function () { // <-- changes

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
                        	window.location.href = '<?php echo base_url(); ?>index.php/bd_active/bd_delboqcost/<?php echo $boq->boq_id; ?>/<?php echo $tdn; ?>';
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
      </script>
<script>
 $('#qty_bg<?php echo $boq->boq_id; ?>').keyup(function() {
  


var labpricebg = $('#labpricebg<?php echo $boq->boq_id; ?>').val().replace(/,/g,"");
var qty_bg = $('#qty_bg<?php echo $boq->boq_id; ?>').val().replace(/,/g,"");
var matpricebg = $('#matpricebg<?php echo $boq->boq_id; ?>').val().replace(/,/g,"");
var total = (qty_bg*1) * (matpricebg*1) ;  
$('#matamtbg<?php echo $boq->boq_id; ?>').val(numberWithCommas(total));
$('#totalamt<?php echo $boq->boq_id; ?>').val(numberWithCommas(total));
$('#qtyboq<?php echo $boq->boq_id; ?>').val(numberWithCommas(qty_bg));

if($('#matamtbg<?php echo $boq->boq_id; ?>').val()==0){

var ttla = (qty_bg*1) * (labpricebg*1);
$('#totalamt<?php echo $boq->boq_id; ?>').val(numberWithCommas(ttla));
$('#labamtbg<?php echo $boq->boq_id; ?>').val(numberWithCommas(ttla));

}
});
$('#matpricebg<?php echo $boq->boq_id; ?>').keyup(function() {
	

var qty_bg =$('#qty_bg<?php echo $boq->boq_id; ?>').val().replace(/,/g,"");
var matpricebg = $('#matpricebg<?php echo $boq->boq_id; ?>').val().replace(/,/g,"");
var total = (qty_bg*1) * (matpricebg*1) ;  
$('#matamtbg<?php echo $boq->boq_id; ?>').val(numberWithCommas(total));
$('#totalamt<?php echo $boq->boq_id; ?>').val(numberWithCommas(total));
});


$('#labpricebg<?php echo $boq->boq_id; ?>').keyup(function() {




var qty_bg = $('#qty_bg<?php echo $boq->boq_id; ?>').val().replace(/,/g,"");
var labpricebg = $('#labpricebg<?php echo $boq->boq_id; ?>').val().replace(/,/g,"");
var labamtbg = (qty_bg*1) * (labpricebg*1);
$('#labamtbg<?php echo $boq->boq_id; ?>').val(numberWithCommas(labamtbg));
var matamtbg = $('#matamtbg<?php echo $boq->boq_id; ?>').val().replace(/,/g,"");

var total =  (labamtbg*1) + (matamtbg*1) ;
$('#totalamt<?php echo $boq->boq_id; ?>').val(numberWithCommas(total));
// // $('#totalamt<?php echo $boq->boq_id; ?>').val(0);
// var labpricebg = $('#labpricebg<?php echo $boq->boq_id; ?>').val().replace(/,/g,"");
//  var labamtbg = parseFloat($('#labamtbg<?php echo $boq->boq_id; ?>').val().replace(/,/g,""));
// $('#totalamt<?php echo $boq->boq_id; ?>').val(numberWithCommasI(ans));
});



$('#qtyboq<?php echo $boq->boq_id; ?>').keyup(function() {



var qtyboq = $('#qtyboq<?php echo $boq->boq_id; ?>').val().replace(/,/g,"");
var matpriceboq = $('#matpriceboq<?php echo $boq->boq_id; ?>').val().replace(/,/g,"");
var total = (qtyboq*1) * (matpriceboq*1) ;  
$('#matamtboq<?php echo $boq->boq_id; ?>').val(numberWithCommas(total));
$('#totalamtboq<?php echo $boq->boq_id; ?>').val(numberWithCommas(total));
});



$('#matpriceboq<?php echo $boq->boq_id; ?>').keyup(function() {



var qtyboq = $('#qtyboq<?php echo $boq->boq_id; ?>').val().replace(/,/g,"");
var matpriceboq = $('#matpriceboq<?php echo $boq->boq_id; ?>').val().replace(/,/g,"");
var total = (qtyboq*1) * (matpriceboq*1) ;  
$('#matamtboq<?php echo $boq->boq_id; ?>').val(numberWithCommas(total));
$('#totalamtboq<?php echo $boq->boq_id; ?>').val(numberWithCommas(total));
});


$('#labpriceboq<?php echo $boq->boq_id; ?>').keyup(function() {



$('#totalamtboq<?php echo $boq->boq_id; ?>').val(0);
var labpriceboq = $('#labpriceboq<?php echo $boq->boq_id; ?>').val().replace(/,/g,"");
var qtyboq = $('#qtyboq<?php echo $boq->boq_id; ?>').val().replace(/,/g,"");
var total = (qtyboq*1) * (labpriceboq*1) ;
$('#labamtboq<?php echo $boq->boq_id; ?>').val(total);
 var labamtboq = $('#labamtboq<?php echo $boq->boq_id; ?>').val().replace(/,/g,"");
 var matamtboq = $('#matamtboq<?php echo $boq->boq_id; ?>').val().replace(/,/g,"");
 var ans =  (labamtboq*1) + (matamtboq*1) ;
$('#labamtboq<?php echo $boq->boq_id; ?>').val(numberWithCommas(total));
$('#totalamtboq<?php echo $boq->boq_id; ?>').val(numberWithCommas(ans));
});


      </script>

    
      <?php $n++ ; } ?> -->

    <div id="editrow"></div>
     <div id="editrow2"></div>
      <div id="editrow3"></div>
       <div id="editrow4"></div> 
       <div id="editrow5"></div>
  						<script>
$("#addboq").click(function(){
	 addrow();
	});
	 function addrow()
            {            
              var row = ($('#body tr').length)+1;
              var tr = '<tr id="'+row+'">'+
			' <td class="text-center">'+row+'<input type="hidden" name="boq_project[]" value="<?php echo $tdn; ?>"><input type="hidden" name="chk[]" value="i"><input type="hidden" name="date[]" value="<?php echo date("Y/m/d");?>"></td>'+                           
            '<td class="text-center"><select class="form-control input-xs" id="systeme"  name="systeme[]" style="width: 150px;"  required=""><option value=""></option><?php 
$this->db->select('*');
$this->db->from('bdtender_d');
$this->db->where('bdd_tenid',$tdn);
$tender_d=$this->db->get()->result(); ?><?php  foreach ($tender_d as $tender_dd) { ?><?php echo '<option value="'.$tender_dd->bdd_jobno.'">'.$tender_dd->bdd_jobname.'</option>'; ?><?php	} ?></select></td>'+
            '<td class="text-center"><div class="input-group"><input readonly="true" id="newmatcode'+row+'" name="newmatcode[]"  type="text" class="form-control input-xs" style="width: 150px;"><span class="input-group-btn"><a class="openun'+row+' btn btn-default btn-icon" data-toggle="modal" data-target="#opnewmat'+row+'"><i class="icon-search4"></i></a><a class="poo'+row+' btn btn-default btn-icon" data-toggle="modal" data-target="#opnewmattt'+row+'"><i class="icon-search4"></i></a><a class="clearmat'+row+' btn btn-default btn-icon" ><i class="glyphicon glyphicon-trash"></i></a></span></div></td>'+
            '<td class="text-center"><input readonly="true" type="text"  id="newmatnamee'+row+'" name="newmatnamee[]" class="form-control input-xs" style="width: 200px;"></td>'+ 
            '<td class="text-center"><div class="input-group"><input type="text" id="laborcode'+row+'" readonly="true" name="laborcode[]" class="form-control input-xs" style=" width: 150px;"><span class="input-group-btn"><a class="openunnn'+row+' btn btn-default btn-icon" data-toggle="modal" data-target="#opnewmatt_v2'+row+'"><i class="icon-search4"></i></a><a class="mat_sub'+row+' btn btn-default btn-icon" data-toggle="modal" data-target="#opnewmatt_sub'+row+'"><i class="icon-search4"></i></a><a class="clearla'+row+' btn btn-default btn-icon" ><i class="glyphicon glyphicon-trash"></i></a></span></div></td>'+
            '<td class="text-center"><input type="text" id="laborname'+row+'" readonly="true" name="laborname[]" class="form-control input-xs" style="width: 200px;" ></td>'+
            '<td class="text-center"><div class="input-group"><input type="text" readonly="true" id="codecostcode'+row+'" name="codecostcode[]" class="form-control input-xs" style="width: 200px;"><input type="text" readonly="true" id="codecostname'+row+'" name="codecostname[]" class="form-control input-xs" style="width: 200px;"><span class="input-group-btn" ><a class="btn btn-info btn-sm" id="selectcostcodee'+row+'" data-toggle="modal" data-target="#costcode'+row+'"><span class="glyphicon glyphicon-search"></span> ค้นหา</a></span></div></td>'+
            '</td>'+
            '<td class="text-center"><div class="input-group"><input type="text" readonly="" id="codecostcodee'+row+'" name="subcostcode[]" class="form-control input-xs" style="width: 200px;"><input type="text" readonly="" id="codecostnamee'+row+'" name="subcostname[]" class="form-control input-xs" style="width: 200px;"><span class="input-group-btn" ><a class="btn btn-info btn-sm" id="selectcostcode'+row+'" data-toggle="modal" data-target="#costcodee'+row+'"><span class="glyphicon glyphicon-search"></span> ค้นหา</a></span></div></td>'+
            '<td class="text-center"><input id="boqcode'+row+'" name="boqcode[]" type="text" class="form-control input-xs" style="width: 200px;"></td>'+
            '<td class="text-center"><input id="matboqq'+row+'" name="matboq[]" type="text"  class="form-control input-xs" style="width: 200px;"></td>'+
      		'<td class="text-center"><input id="bom'+row+'" name="bom[]" type="text" class="form-control input-xs" style="width: 200px;"></td>'+

	      '<td class="text-center"><div class="input-group"><input  id="unitcode'+row+'" name="unitcode[]" type="text" class="form-control input-xs" style="width: 200px;"><span class="input-group-btn" ><span class="input-group-btn"><a class="unit'+row+' btn btn-default btn-icon" data-toggle="modal" data-target="#unit'+row+'"><i class="icon-search4"></i></a></span></div></td>'+

	      '<td class="text-center"><input  id="unitname'+row+'" name="unitname[]" type="text" class="form-control input-xs" style="width: 200px;"></td>'+
	      '<td class="text-center"><input id="qty_bg'+row+'" name="qty_bg[]" type="text" value="0" class="form-control input-xs" style="width: 200px;"  required=""></td>'+
	      '<td class="text-center"><input type="text" id="matpricebg'+row+'" name="matpricebg[]" value="0" class="form-control input-xs" style="width: 200px;"></td>'+
	      '<td class="text-center"><input type="text" id="matamtbg'+row+'" name="matamtbg[]"  class="form-control input-xs" style="width: 200px;"></td>'+
	      '<td class="text-center"><input type="text" id="labpricebg'+row+'" name="labpricebg[]" value="0" class="form-control input-xs" style="width: 200px;"></td>'+
	      '<td class="text-center"><input type="text" id="labamtbg'+row+'" name="labamtbg[]"  class="form-control input-xs" style="width: 200px;"></td>'+
	      '<td class="text-center"><input type="text"  id="totalamt'+row+'" name="totalamt[]" class="form-control input-xs" style="width: 200px;"></td>'+
	      '<td class="text-center"><input type="text"  id="qtyboq'+row+'" name="qtyboq[]" class="form-control input-xs" style="width: 200px;"></td>'+
	      '<td class="text-center"><input type="text" id="matpriceboq'+row+'" name="matpriceboq[]" value="0" class="form-control input-xs" style="width: 200px;"></td>'+
	      '<td class="text-center"><input type="text" id="matamtboq'+row+'" name="matamtboq[]" value="0" class="form-control input-xs" style="width: 200px;"></td>'+ 
	      '<td class="text-center"><input type="text" value="0" id="labpriceboq'+row+'" name="labpriceboq[]" class="form-control input-xs" style="width: 200px;"></td>'+
	      '<td class="text-center"><input type="text" id="labamtboq'+row+'" name="labamtboq[]"  class="form-control input-xs" style="width: 200px;"></td>'+
	      '<td class="text-center"><input type="text"   id="totalamtboq'+row+'" name="totalamtboq[]" class="form-control input-xs" style="width: 200px;"></td>'+
	      '<td class="text-center"><a id="remove'+row+'" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a></td>'+
                                        
                          '<div class="modal fade" id="sycode'+row+'" data-backdrop="false"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header bg-primary"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="myModalLabel">รายการบันทึกทรัพย์สิน</h4></div><div class="modal-body"><div class="panel-body"><div class="row" id="sy'+row+'"></div></div></div></div></div></div>'+

                          


                       '</td>'+

                       '</tr>';

              $('#body').append(tr);

	
         var boq = '<div id="opnewmat'+row+'" class="modal fade">'+
            '<div class="modal-dialog modal-full">'+
              '<div class="modal-content ">'+
                '<div class="modal-header bg-info">'+
                  '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                  '<h5 class="modal-title">เพิ่มรายการ</h5>'+
                '</div>'+
                  '<div class="modal-body">'+
                   '<div class="row" id="modal_mat'+row+'">'+
                    '</div>'+
                  '</div>'+
              '</div>'+
            '</div>'+
            '</div>';
	$('#editrow').append(boq);
     $(".openun"+row+"").click(function(){
      $('#modal_mat'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_mat"+row+"").load('<?php echo base_url(); ?>index.php/bd/material_alonee/'+row+'');
    });

     var boq = '<div id="opnewmatt_v2'+row+'" class="modal fade">'+
            '<div class="modal-dialog modal-full">'+
              '<div class="modal-content ">'+
                '<div class="modal-header bg-info">'+
                  '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                  '<h5 class="modal-title">เพิ่มรายการ</h5>'+
                '</div>'+
                  '<div class="modal-body">'+
                   '<div class="row" id="modal_mat_v2'+row+'">'+
                    '</div>'+
                  '</div>'+
              '</div>'+
            '</div>'+
            '</div>';
	$('#editrow').append(boq);
     $(".openunnn"+row+"").click(function(){
      $('#modal_mat_v2'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_mat_v2"+row+"").load('<?php echo base_url(); ?>index.php/bd/material_alone/'+row+'');
    });

     var boq = '<div id="opnewmatt_sub'+row+'" class="modal fade">'+
            '<div class="modal-dialog modal-full">'+
              '<div class="modal-content ">'+
                '<div class="modal-header bg-info">'+
                  '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                  '<h5 class="modal-title">เพิ่มรายการ</h5>'+
                '</div>'+
                  '<div class="modal-body">'+
                   '<div class="row" id="modal_mat_code'+row+'">'+
                    '</div>'+
                  '</div>'+
              '</div>'+
            '</div>'+
            '</div>';
	$('#editrow').append(boq);
     $(".mat_sub"+row+"").click(function(){
      $('#modal_mat_code'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_mat_code"+row+"").load('<?php echo base_url(); ?>index.php/share/getmatcode_mat/'+row);
    });

         var boq = '<div id="opnewmattt'+row+'" class="modal fade">'+
            '<div class="modal-dialog modal-full">'+
              '<div class="modal-content ">'+
                '<div class="modal-header bg-info">'+
                  '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                  '<h5 class="modal-title">เพิ่มรายการ</h5>'+
                '</div>'+
                  '<div class="modal-body">'+
                   '<div class="row" id="modal_matt'+row+'">'+
                    '</div>'+
                  '</div>'+
              '</div>'+
            '</div>'+
            '</div>';
	$('#editrow').append(boq);
     $(".poo"+row+"").click(function(){
      $('#modal_matt'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_matt"+row+"").load('<?php echo base_url(); ?>index.php/share/getmatcode/'+row);
    }); 


     var boq = '<div id="opnewmatt'+row+'" class="modal fade">'+
            '<div class="modal-dialog modal-full">'+
              '<div class="modal-content ">'+
                '<div class="modal-header bg-info">'+
                  '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                  '<h5 class="modal-title">เพิ่มรายการ</h5>'+
                '</div>'+
                  '<div class="modal-body">'+
                   '<div class="row" id="modal_matt'+row+'">'+
                    '</div>'+
                  '</div>'+
              '</div>'+
            '</div>'+
            '</div>';
	$('#editrow2').append(boq);
     $(".openunn"+row+"").click(function(){
      $('#modal_matt'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_matt"+row+"").load('<?php echo base_url(); ?>index.php/bd/material_alone/'+row+'');
    });

var boq = '<div id="costcode'+row+'" class="modal fade">'+
            '<div class="modal-dialog modal-full">'+
              '<div class="modal-content ">'+
                '<div class="modal-header bg-info">'+
                  '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                  '<h5 class="modal-title">เพิ่มรายการ</h5>'+
                '</div>'+
                  '<div class="modal-body">'+
                   '<div class="row" id="modal_cost'+row+'">'+
                    '</div>'+
                  '</div>'+
              '</div>'+
            '</div>'+
            '</div>';
	$('#editrow3').append(boq);
$('#selectcostcodee'+row+'').click(function(){
   $('#modal_cost'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#modal_cost"+row+"").load('<?php echo base_url(); ?>bd/costcode_id/'+row+'');
 });


var boq = '<div id="costcodee'+row+'" class="modal fade">'+
            '<div class="modal-dialog modal-full">'+
              '<div class="modal-content ">'+
                '<div class="modal-header bg-info">'+
                  '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                  '<h5 class="modal-title">เพิ่มรายการ</h5>'+
                '</div>'+
                  '<div class="modal-body">'+
                   '<div class="row" id="modal_costt'+row+'">'+
                    '</div>'+
                  '</div>'+
              '</div>'+
            '</div>'+
            '</div>';
	$('#editrow4').append(boq);
$('#selectcostcode'+row+'').click(function(){
  $('#modal_costt'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#modal_costt"+row+"").load('<?php echo base_url(); ?>bd/costcode_idd/'+row+'');

 });


var unit = '<div id="unit'+row+'" class="modal fade">'+
            '<div class="modal-dialog">'+
              '<div class="modal-content ">'+
                '<div class="modal-header bg-info">'+
                  '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                  '<h5 class="modal-title">หน่วย</h5>'+
                '</div>'+
                  '<div class="modal-body">'+
                   '<div class="row" id="modal_unit'+row+'">'+
                    '</div>'+
                  '</div>'+
              '</div>'+
            '</div>'+
            '</div>';
	$('#editrow5').append(unit);
$('.unit'+row+'').click(function(){
   $('#modal_unit'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#modal_unit"+row+"").load('<?php echo base_url(); ?>share/unit/'+row+'');
 });

$('#qty_bg'+row+'').keyup(function() {


var labpricebg = $('#labpricebg'+row+'').val().replace(/,/g,"");
var qty_bg = $('#qty_bg'+row+'').val().replace(/,/g,"");
var matpricebg = $('#matpricebg'+row+'').val().replace(/,/g,"");
var total = (qty_bg*1) * (matpricebg*1) ;  
$('#matamtbg'+row+'').val(numberWithCommas(total));
$('#totalamt'+row+'').val(numberWithCommas(total));
$('#qtyboq'+row+'').val(numberWithCommas(qty_bg));

if($('#matamtbg'+row+'').val()==0){

var ttla = (qty_bg*1) * (labpricebg*1);
$('#totalamt'+row+'').val(numberWithCommas(ttla));
$('#labamtbg'+row+'').val(numberWithCommas(ttla));

}
});
$('#matpricebg'+row+'').keyup(function() {



var qty_bg =$('#qty_bg'+row+'').val().replace(/,/g,"");
var matpricebg = $('#matpricebg'+row+'').val().replace(/,/g,"");
var total = (qty_bg*1) * (matpricebg*1);  
$('#matamtbg'+row+'').val(numberWithCommas(total));
$('#totalamt'+row+'').val(numberWithCommas(total));
});


$('#labpricebg'+row+'').keyup(function() {




$('#totalamt'+row+'').val(0);
var labpricebg = $('#labpricebg'+row+'').val().replace(/,/g,"");
var qty_bg = $('#qty_bg'+row+'').val().replace(/,/g,"");
var total = (qty_bg*1) * (labpricebg*1) ;
$('#labamtbg'+row+'').val(numberWithCommas(total));
 var labamtbg = $('#labamtbg'+row+'').val().replace(/,/g,"");
 var matamtbg = $('#matamtbg'+row+'').val().replace(/,/g,"");
 var ans =  (labamtbg*1) + (matamtbg*1) ;
$('#labamtbg'+row+'').val(numberWithCommas(total));
$('#totalamt'+row+'').val(numberWithCommas(ans));
});



$('#qtyboq'+row+'').keyup(function() {



var qtyboq =$('#qtyboq'+row+'').val().replace(/,/g,"");
var matpriceboq = $('#matpriceboq'+row+'').val().replace(/,/g,"");
var total = (qtyboq*1) * (matpriceboq*1) ;  
$('#matamtboq'+row+'').val(numberWithCommas(total));
$('#totalamtboq'+row+'').val(numberWithCommas(total));
});


$('#matpriceboq'+row+'').keyup(function() {



var qtyboq =$('#qtyboq'+row+'').val().replace(/,/g,"");
var matpriceboq = $('#matpriceboq'+row+'').val().replace(/,/g,"");
var total = (qtyboq*1) * (matpriceboq*1) ;  
$('#matamtboq'+row+'').val(numberWithCommas(total));
$('#totalamtboq'+row+'').val(numberWithCommas(total));
});


$('#labpriceboq'+row+'').keyup(function() {



$('#totalamtboq'+row+'').val(0);
var labpriceboq = $('#labpriceboq'+row+'').val().replace(/,/g,"");
var qtyboq = $('#qtyboq'+row+'').val().replace(/,/g,"");
var total = qtyboq * labpriceboq ;
$('#labamtboq'+row+'').val(total);
 var labamtboq = $('#labamtboq'+row+'').val().replace(/,/g,"");
 var matamtboq = $('#matamtboq'+row+'').val().replace(/,/g,"");
 var ans =  (labamtboq*1) + (matamtboq*1) ;
$('#labamtboq'+row+'').val(numberWithCommas(total));
$('#totalamtboq'+row+'').val(numberWithCommas(ans));
});


$(document).on('click', 'a#remove'+row+'', function () { // <-- changes

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



$(".clearmat"+row+"").click(function(){
      var aa="";
	$("#newmatcode"+row+"").val(aa);
	$("#newmatname"+row+"").val(aa);
	$("#matboq"+row+"").val(aa);
	$("#unitcode"+row+"").val(aa);
	$("#unitname"+row+"").val(aa);
    });

$(".clearla"+row+"").click(function(){
      var aa="";
	$("#laborcode"+row+"").val(aa);
	$("#laborname"+row+"").val(aa);
	$("#matboq"+row+"").val(aa);
	$("#unitcode"+row+"").val(aa);
	$("#unitname"+row+"").val(aa);
    });

            }


           </script>
	

    </tbody>
    	<tr>
		<td colspan="15" class="text-center"><b>Total</b></td>
		<td class="text-center"><b><?php echo number_format($matamt,2); ?></b></td>
		<td colspan="2" class="text-center"></td>
		<td class="text-center"><b><?php echo number_format($mamtboq,2); ?></b></td>
		<td colspan="2" class="text-center"></td>
		<td class="text-center"><b><?php echo number_format($totalamtbg,2); ?></b></td>
		<td colspan="1" class="text-center"></td>
		<td class="text-center"><b><?php echo number_format($labamtboq,2); ?></b></td>
		<td class="text-center"><b><?php echo number_format($totalamtboq,2); ?></b></td>
	</tr>
   </table>
	</div>
		</div>
		<div class="tab-pane" id="top-tab2">
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-xxs">
		<thead>
		<tr>

		<td class="text-center">Cost Code</td>
		<td class="text-center">Cost Name</td>
		<td class="text-center">Budget Amount</td>
		<td class="text-center">BOQ Amount</td>
		</tr>
        			<?php $n=1;  foreach ($gb as $gbb){   ?>
					<?php
	  $this->db->select('*');       
	  $this->db->where('boq_costmat',$gbb->boq_costmat);
	  $this->db->where('status',0);
      $costmat = $this->db->get('boq_item')->result();
      $costs=0;
      $amt=0;
      $boq_amt = 0;
      ?>
      <?php foreach ($costmat as $cos){  
      	$costs = $costs+$cos->boq_budget_amt;
      	$amt = $amt + $cos->boq_total_amt;
      	$boq_amt = $boq_amt + $cos->boq_amt;
      	}?> 
		<tr <?php if($gbb->boq_costmat==""){ echo 'hidden=""'; } ?>>
			
			<td  class="text-center"><?php echo $gbb->boq_costmat; ?></td>
			<td class="text-center"><?php echo $gbb->boq_costmatname; ?></td>
			<td class="text-center"><?php echo number_format($costs,2); ?></td>
			<td class="text-center"><?php echo number_format($boq_amt,2); ?></td>
		   
		</tr>
		<?php $n++; } ?>
			<?php
	  $this->db->select('*');       
	  $this->db->where('boq_project',$pjid);
      $this->db->group_by('boq_costsub');
      $this->db->where('status',0);
      $query = $this->db->get('boq_item')->result();

 
      ?>

      <?php foreach ($query as $gbbb){  ?>

      					<?php
	  $this->db->select('*');       
	  $this->db->where('boq_costsub',$gbbb->boq_costsub);
	  $this->db->where('status',0);
      $costmatt = $this->db->get('boq_item')->result();
      $costss=0;
      $amtt=0;
      $boq_lab_boqamt = 0;
      ?>
      <?php foreach ($costmatt as $coss){  
      	$costss = $costss+$coss->boq_lab_amt;
      	$amtt = $amtt + $coss->boq_total_amt;
      	$boq_lab_boqamt = $boq_lab_boqamt+$coss->boq_lab_boqamt;

      	}?> 
 					<tr <?php if($gbbb->boq_costsub==""){ echo 'hidden=""'; } ?>>
						
						<td class="text-center"><?php echo $gbbb->boq_costsub; ?></td>
						<td class="text-center"><?php echo $gbbb->boq_costsubname; ?></td>
						<td class="text-center"><?php echo number_format($costss,2); ?></td>
						<td class="text-center"><?php echo number_format($boq_lab_boqamt,2); ?></td>
					</tr>
				<?php  } ?>

	  

			<?php
	  $this->db->select('*');       
	  $this->db->where('boq_project',$pjid);
	  $this->db->where('status',0);
      $allll = $this->db->get('boq_item')->result();
      $boq_budget_amt = 0;
      $boq_lab_amt = 0;
      $boq_amt11 = 0;
      $boq_lab_boqamt11 = 0;
      ?>
      <?php  foreach ($allll as $allamt){  
      	$boq_budget_amt = $boq_budget_amt+$allamt->boq_budget_amt;
      	$boq_lab_amt = $boq_lab_amt+$allamt->boq_lab_amt;
      	$boq_amt11 = $boq_amt11 + $allamt->boq_amt;
      	$boq_lab_boqamt11 = $boq_lab_boqamt11 + $allamt->boq_lab_boqamt;
      	}
      	?> 
					<tr>
						<td colspan="2" class="text-center"><b>Total</b></td>
						<td class="text-center"><b><?php echo number_format($boq_budget_amt+$boq_lab_amt,2); ?></b></td>
						<td class="text-center"><b><?php echo number_format($boq_amt11+$boq_lab_boqamt11,2); ?></b></td>
					</tr>
        		</thead>
        	</table>
</div>

											</div>

											<div class="tab-pane" id="top-tab3">
<div class="table-responsive">
 <table class="table table-bordered table-striped table-xxs">
        		<thead>
        			<tr>
        				<th class="text-center" style="background: #e5e5e5;">Control</th>
        				<th class="text-center" style="background: #e5e5e5;">Job</th>
        				<th class="text-center" style="background: #e5e5e5;">Material Code</th>
        				<th class="text-center" style="background: #e5e5e5;">Material Name</th>
        				<th class="text-center" style="background: #e5e5e5;">Description</th>
						<th class="text-center" style="background: #e5e5e5;">Cost Code</th>
						<th class="text-center" style="background: #e5e5e5;">BOQ(QTY)</th>
						<th class="text-center" style="background: #e5e5e5;">PR/MR QTY</th>
						<th class="text-center" style="background: #e5e5e5;">BOQ Bal.</th>
						<th class="text-center" style="background: #e5e5e5;">Unit</th>
						<th class="text-center" style="background: #e5e5e5;">Mat. Price/Unit</th>
						<th class="text-center" style="background: #e5e5e5;">Mat Amount</th>
						<th class="text-center" style="background: #e5e5e5;">Labour Price</th>
						<th class="text-center" style="background: #e5e5e5;">Labour Amount</th>
						
        			</tr>
        			 <tbody>
        			 		<?php $n=1;
        			 foreach ($ressg as $scc){ ?>
 							<tr <?php if($scc->boq_mcode==""){ echo 'hidden=""'; } ?>>




<td class="text-center"><input type="checkbox" name="boq_controlclick[]" id="boq_controlclick<?php echo $n;?>" <?php if($scc->boq_control=="1"){ echo "checked"; }?>>
<input type="hidden" name="boq_control" id="boq_control<?php echo $n;?>">
<input type="hidden" name="boq_id" id="boq_id<?php echo $n;?>" value="<?php echo $scc->boq_id; ?>"></td>

<script>
	$('#boq_controlclick<?php echo $n;?>').click(function () {
    if ($(this).prop('checked')) {
        $("#boq_control<?php echo $n;?>").val("1");
    } else {
         $("#boq_control<?php echo $n;?>").val("0");
    }
    var boq_control = $('#boq_control<?php echo $n;?>').val();
    var boq_id = $('#boq_id<?php echo $n;?>').val();
    $.post('<?php echo base_url(); ?>index.php/bd_active/bd_controlBOQ/'+boq_control+'/'+boq_id);
})
</script>
<td class="text-center"><?php if($scc->boq_job==1){
	echo "OVERHEAD";
	}else if($scc->boq_job==2){
	echo "AC";
	}else if($scc->boq_job==3){
	echo "EE";
	}else if($scc->boq_job==4){
	echo "SN";
	}else if($scc->boq_job==5){
	echo "CIVIL";
	} ?></td>
<td class="text-center"><?php echo $scc->boq_mcode; ?></td>
<td class="text-center"><?php echo $scc->boq_mname; ?></td>
<td class="text-center"><?php echo $scc->boq_boqmat; ?></td>
<td class="text-center"><?php echo $scc->boq_costmat; ?></td>
<td class="text-center"><?php echo number_format($scc->boq_budget_qty); ?></td>
<td class="text-center" style="background: #ddddff;"><a data-toggle="modal" data-target="#prboq<?php echo $scc->boq_id; ?>"><?php echo number_format($scc->boq_prbudget_qty); ?></a></td>
<td class="text-center" style="background: #ddddff;"><?php echo number_format($scc->boq_budget_qty-$scc->boq_prbudget_qty); ?></td>
<td class="text-center"><?php echo $scc->boq_uname; ?></td>
<td class="text-center" style="background: #F5F5F5;"><?php echo number_format($scc->boq_budget_price); ?></td>
<td class="text-center" style="background: #F5F5F5;"><?php echo number_format($scc->boq_budget_amt); ?></td>
<td class="text-center"><?php echo number_format($scc->boq_lab_boqprice,2); ?></td>
<td class="text-center"><?php echo number_format($scc->boq_lab_boqamt,2); ?></td>
 							</tr>
 							<tr <?php if($scc->boq_subcode==""){ echo 'hidden=""'; } ?>>
<td class="text-center"><input type="checkbox" name="boq_controlclick" id="boq_controlclickk<?php echo $n;?>" <?php if($scc->boq_controll=="1"){ echo "checked"; }?>> 
<input type="hidden" name="boq_control" id="boq_controll<?php echo $n;?>">
<input type="hidden" name="boq_id" id="boq_idd<?php echo $n;?>" value="<?php echo $scc->boq_id; ?>"></td>

<script>
	$('#boq_controlclickk<?php echo $n;?>').click(function () {
    if ($(this).prop('checked')) {
        $("#boq_controll<?php echo $n;?>").val("1");
    } else {
         $("#boq_controll<?php echo $n;?>").val("0");
    }

    var boq_controll = $('#boq_controll<?php echo $n;?>').val();
    var boq_idd = $('#boq_idd<?php echo $n;?>').val();
    $.post('<?php echo base_url(); ?>index.php/bd_active/bd_controlBOQQ/'+boq_controll+'/'+boq_idd);
})
</script>
</td>

<td class="text-center"><?php if($scc->boq_job==1){
	echo "OVERHEAD";
	}else if($scc->boq_job==2){
	echo "AC";
	}else if($scc->boq_job==3){
	echo "EE";
	}else if($scc->boq_job==4){
	echo "SN";
	}else if($scc->boq_job==5){
	echo "CIVIL";
	} ?></td>
<td class="text-center"><?php echo $scc->boq_subcode; ?></td>
<td class="text-center"><?php echo $scc->boq_subname; ?></td>
<td class="text-center"><?php echo $scc->boq_boqmat; ?></td>
<td class="text-center"><?php echo $scc->boq_costsub; ?></td>
<td class="text-center"><?php echo number_format($scc->boq_qty); ?></td>
<td class="text-center" style="background: #ddddff;"><a data-toggle="modal" data-target="#prboqq<?php echo $scc->boq_id; ?>"><?php echo number_format($scc->boq_prqty); ?></a></td>
<td class="text-center" style="background: #ddddff;"><?php echo number_format($scc->boq_qty-$scc->boq_prqty); ?></td>
<td class="text-center"><?php echo $scc->boq_uname; ?></td>
<td class="text-center" style="background: #F5F5F5;"><?php echo number_format($scc->boq_lab_price); ?></td>
<td class="text-center" style="background: #F5F5F5;"><?php echo number_format($scc->boq_lab_amt); ?></td>
<td class="text-center"><?php echo number_format($scc->boq_lab_boqprice,2); ?></td>
<td class="text-center"><?php echo number_format($scc->boq_lab_boqamt,2); ?></td>
 							</tr>



 							<?php $n++; } ?>



        <?php foreach ($proo as $aproo) { ?>
     

				<tr>

				<td class="text-center"><input type="checkbox" disabled></td>
				<td style="color: #FF9900;"><?php if($aproo->pr_system==1){
	echo "OVERHEAD";
	}else if($aproo->pr_system==2){
	echo "AC";
	}else if($aproo->pr_system==3){
	echo "EE";
	}else if($aproo->pr_system==4){
	echo "SN";
	}else if($aproo->pr_system==5){
	echo "CIVIL";
	} ?></td>
				<td class="text-center" style="color: #FF9900;"><?php echo $aproo->pri_matcode; ?></td>
				<td class="text-center" style="color: #FF9900;" ><?php echo $aproo->pri_matname; ?></td>
				<td class="text-center" style="color: #FF9900;" ><?php echo $aproo->pri_remark; ?></td>
				<td class="text-center" style="color: #FF9900;" ><?php echo $aproo->pri_costcode; ?></td>
				<td class="text-right"></td>
				<td class="text-right" style="background: #ddddff;"><?php echo number_format($aproo->pri_qty,2); ?></td>
				<td class="text-right" style="color: red; background: #ddddff;"><?php echo number_format(0-$aproo->pri_qty,2); ?></td>
				<td class="text-center" style="color: #FF9900;"><?php echo $aproo->pri_unit; ?></td>
				<td class="text-center" style="color: #FF9900; background: #F5F5F5;">0.00</td>
				<td class="text-center" style="color: #FF9900; background: #F5F5F5;">0.00</td>
				<td class="text-center" style="color: #FF9900;">0.00</td>
				<td class="text-center" style="color: #FF9900;">0.00</td>


   
 				

 							<?php  } ?> 
 							</tr>
        			</thead>
        			</table>

									</div>		</div>

											
										</div>
									</div>
								</div>
						
<!-- Modal -->



      </div>
		<div class="text-right">
			<!-- <button type="submit" class="preload btn btn-info"><i class="icon-floppy-disk position-left"></i> Save </button> -->
			<?php
				if ($approve_bg=="1") {
			
				}else{
			?>
				<button type="submit" class="btn btn-success"><i class="icon-floppy-disk position-left"></i> Save </button>
			<?php	
				}
			?>
			
			<a href="<?php echo base_url(); ?>index.php/bd/boq_openProject" class=" btn btn-default"><i class="icon-plus22"></i> New</a>
			<!-- <a  id="addtorow"  class="btn btn-default"><i class="icon-stackoverflow"></i> ADD Rows</a> -->
			<a href="<?php echo base_url(); ?>index.php/bd/boq_openProject" class="btn btn-default"><i class="icon-close2 position-left"></i> Close</a>
		</div>
	</div>

</form>
<script>
	if(<?php echo $approve_bg; ?> == "1"){
		$('.preload').hide();
	}
</script>
 <!--end modal -->
<!-- Small modal -->

   
<!-- Main content  trans-->
          </div>


		






<?php foreach ($ressg as $scc){ ?>
 							

				<div id="prboq<?php echo $scc->boq_id; ?>" class="modal fade" style="display: none;">
						<div class="modal-dialog modal-full">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">×</button>
									<h5 class="modal-title">BOQ</h5>
								</div>

								<div class="modal-body">
									
                              <table class="table table-bordered table-striped table-xxs">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>PR No.</th>
                                    <th>Material Code</th>
                                    <th>Material Name</th>
                                    <th>Cost Code</th>
                                    <th>Cost Name</th>
                                    <th>Qty</th>
                                    <th>Unit</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>

                                <?php 
                                $this->db->select('*');
								$this->db->from('pr_item');
								$this->db->where('pri_boqid',$scc->boq_id);
								$boq = $this->db->get()->result();
								$a=1;
								foreach ($boq as $b) { ?>
								<?php if($b->pri_boqrow==1){ ?>
                                  <tr>
                                   <td><?php echo $a; ?></td>
                                   <td><?php echo $b->pri_ref; ?></td>
                                   <td><?php echo $b->pri_matcode; ?></td>
                                   <td><?php echo $b->pri_matname; ?></td>
                                   <td><?php echo $b->pri_costcode; ?></td>
                                   <td><?php echo $b->pri_costname; ?></td>
                                   <td><?php echo $b->pri_qty; ?></td>
                                   <td><?php echo $b->pri_unit; ?></td>
                                   <td><?php echo $b->datesend; ?></td>
                                   <td class="text-center"><a target="_blank" class="preload" href="<?php echo base_url(); ?>index.php/pr/editpr/<?php echo $b->pri_ref; ?>" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></td>
                                  </tr>
                                  <?php } ?>
                                  <?php $a++; } ?>
                                </tbody>
                                </table>
								</div>

								<div class="modal-footer">
									
								</div>
							</div>
						</div>
					</div>


<div id="prboqq<?php echo $scc->boq_id; ?>" class="modal fade" style="display: none;">
						<div class="modal-dialog modal-full">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">×</button>
									<h5 class="modal-title">BOQ</h5>
								</div>

								<div class="modal-body">
									
                              <table class="table table-bordered table-striped table-xxs">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>PR No.</th>
                                    <th>Material Code</th>
                                    <th>Material Name</th>
                                    <th>Cost Code</th>
                                    <th>Cost Name</th>
                                    <th>Qty</th>
                                    <th>Unit</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $this->db->select('*');
								$this->db->from('pr_item');
								$this->db->where('pri_boqid',$scc->boq_id);
								$boq = $this->db->get()->result();
								$a=1;
								foreach ($boq as $b) { ?>
								<?php if($b->pri_boqrow==0){ ?>
                                  <tr>
                                   <td><?php echo $a; ?></td>
                                   <td><?php echo $b->pri_ref; ?></td>
                                   <td><?php echo $b->pri_matcode; ?></td>
                                   <td><?php echo $b->pri_matname; ?></td>
                                   <td><?php echo $b->pri_costcode; ?></td>
                                   <td><?php echo $b->pri_costname; ?></td>
                                   <td><?php echo $b->pri_qty; ?></td>
                                   <td><?php echo $b->pri_unit; ?></td>
                                   <td><?php echo $b->datesend; ?></td>
                                   <td class="text-center"><a target="_blank" class="preload" href="<?php echo base_url(); ?>index.php/pr/editpr/<?php echo $b->pri_ref; ?>" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></td>
                                  </tr>
                                   <?php } ?>
                                  <?php $a++; } ?>
                                </tbody>
                                </table>
								</div>

								<div class="modal-footer">
									
								</div>
							</div>
						</div>
					</div>
							<?php  } ?>