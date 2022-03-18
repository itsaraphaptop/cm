<?php $pj = $this->uri->segment(3); ?>
<?php $drev = $this->uri->segment(4); ?>
<!-- Bordered pills -->
					<div class="row">				
						<div class="col-md-12">
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">BOQ</h6>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								</div>

								<div class="panel-body">
									<div class="tabbable">
										<ul class="nav nav-pills nav-pills-bordered nav-justified">
											<li ><a href="#bordered-justified-pill1" data-toggle="tab">1 BUDGET COST</a></li>
											<li class="active"><a href="#bordered-justified-pill2" aria-expanded="true" data-toggle="tab">2 COST CODE(SUMMARY)</a></li>
											
										</ul>

										<div class="tab-content">
											<div class="tab-pane" id="bordered-justified-pill1">
												

							
						
						


						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
									
										<th>G-CODE</th>
										<th>Sub-Code</th>
										<th>Description</th>
										<th>General</th>
										<th>Material(M)</th>
										<th>LABOUR(L)</th>
										<th>SUBcontractor(S)</th>
										<th>Total(1)</th>
										<th>BOQ(2)</th>
										<th>COST-SAVING</th>
									</tr>
								</thead>
								<tbody>



	
															<?php		$totgeneral=0;
$total=0;

$totlalboq=0;
$matamt=0;
$lamt=0;
$scamt=0;
$totamt=0;
$totboqamt=0;
$totcs=0;
 $n=1; 

 foreach ($boqsubg as $boqs){ ?>
 <?php $wh=$this->db->query("select * from cost_subgroup where costcode_d='$boqs->boq_costmat'")->result(); ?>


<?php 
$bcs=$this->db->query("
SELECT * ,SUM(boq_lab_amt) as bla,sum(boq_lab_boqamt) as blb
FROM boq_item 
where boq_project='$boqs->boq_project' 
and boq_rev='$boqs->boq_rev' 
and boq_costsub='$boqs->boq_costsub'")->result(); ?>


 <?php foreach ($wh as $whh){ ?>
 	<?php
$mat=$this->db->query("SELECT *,SUM(boq_budget_amt) as bba,sum(boq_amt) as ba
from boq_item
where boq_project='$boqs->boq_project' 
and boq_costmat='$boqs->boq_costmat'
and boq_rev='$boqs->boq_rev'
GROUP BY boq_costmat")->result(); ?>



									<tr>
										<td><b></b></td>
										<td></td>
										<td class="text-left"><b><?php echo $whh->csubgroup_name; ?>[<?php echo $whh->ctype_code; ?>]</b></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									
									<tr>
										<td></td>
										<td></td>
										
										<td class="text-center"><?php echo $boqs->boq_mname; ?></td>
										<td></td>
									<?php foreach ($mat as $matt){ ?>
<td><?php echo $matt->bba; ?></td>	
<?php } ?>
										<td>.00</td>
										<?php foreach ($bcs as $bcss){ ?>
											<td><?php echo $bcss->bla; ?></td>
										<?php } ?>
										
										<td><?php $total=$matt->bba+$bcss->bla; ?><?php echo $total; ?></td>
										<td><?php $totalboq=$matt->ba+$bcss->blb; ?><?php echo $totalboq; ?></td>
										<td><?php $cs=$totalboq-$total ?><?php echo $cs ?></td>
									</tr>
									<?php $matamt = $matamt+$matt->bba;
									$scamt=$scamt+$bcss->bla;
									$totamt=$totamt+$total; 
									$totboqamt=$totboqamt+$totalboq; 
									$totcs=$totcs+$cs ;?>	
									<?php } ?>
									<?php } ?>
	
<tr>
	<td colspan="4" class="text-center"><b>Total</b></td>
	<td><?php echo $matamt; ?></td>
	<td></td>
	<td><?php echo $scamt; ?></td>
	<td><?php echo $totamt; ?></td>
	<td><?php echo $totboqamt; ?></td>
	<td><?php echo $totcs ?></td>
</tr>
<!-- 															<?php		$totgeneral=0;
$totmat=0;
$totlb=0;
$totsubcno=0;
$tottot=0;
$totboq=0;
$totcossv=0;
 $n=1; 

 foreach ($boqg as $boq){ ?>
									<tr>
										<td><?php echo $boq->boq_costmat ; ?></td>
										<td><?php echo $boq->boq_costsub ; ?></td>
										<td><?php echo $boq->csubgroup_name ; ?></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td><?php echo $boq->cosrcode_h ; ?></td>
									</tr>
									<?php
    // 
    //   $mamtboq= $mamtboq+$boq->boq_budget_total; 
    //   $totalamtbg = $totalamtbg+$boq->boq_amt;
    //   $labamtboq= $labamtboq+$boq->boq_lab_boqamt;
    //   $totalamtboq= $totalamtboq+$boq->boq_total_amt;
      $n++ ;
     } ?>
			 -->					</tbody>
							</table>
					
										</div>
											</div>

											<div class="tab-pane active" id="bordered-justified-pill2">
												<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No.</th>
										<th>Control</th>
										<th>% Control</th>
										<th>Cost Code</th>
										<th>Cost Name</th>
										<th>Material</th>
										<th>Labour</th>
										<th>Subcontractor</th>
										<th>Overhead</th>
										<th><b>Total-Budget-Cost</b></th>
										<th><b>This-Budget-Control</b></th>
										<th><b>ContracCost</b></th>
										<th><b>Total PU Cost(Use)</b></th>
										<th>action</th>
									</tr>
								</thead>
								<tbody>
<?php		
$tbc=0;
$totmat=0;
$totlb=0;
$totsubcno=0;
$tottot=0;
$totboq=0;
$totcossv=0;
 $n=1; 

 foreach ($boqg as $boq){ ?>
 									<form method="post" action="<?php echo base_url(); ?>bd_active/insert_boqapp/<?php echo $pj ; ?>/<?php echo $drev; ?>/<?php echo $boq->boq_id; ?>">
									<tr>
										<td><?php echo $n ?></td>
										<td><input type="checkbox" class="styled form-control" id="control<?php echo $boq->boq_id; ?>" name="ct<?php echo $boq->boq_id; ?>"></td>
										<td class="text-left"><input type="text" class="form-control" id="percent<?php echo $boq->boq_id; ?>" name="percent<?php echo $boq->boq_id; ?>" ></td>
										<td><?php echo $boq->boq_costmat; ?><input type="hidden" name="costmat<?php echo $boq->boq_id; ?>" value="<?php echo $boq->boq_costmat; ?>"></td>
										<td><?php echo $boq->boq_boqmat; ?></td>
										<td><?php echo $boq->boqbgamt; ?></td>
										<td>0</td>
										<td><?php echo $boq->boq_lab_amt; ?></td>
										<td>0.0</td>
										<td><?php $tbc=$boq->boqbgamt+$boq->boq_lab_amt ;?><?php echo $tbc; ?><input type="text" id="tbc<?php echo $boq->boq_id; ?>" value="<?php echo $tbc; ?>"></td>
										<td><input type="text" id="ans<?php echo $boq->boq_id; ?>" readonly="true" class="form-control"></td>
										<td><?php $cct=$boq->boqamt+$boq->boq_lab_boqamt;?><input type="text" id="cct<?php echo $boq->boq_id; ?>" s class="form-control" value="<?php echo $cct ?>"></td>
										<td>00.00</td>
										<td><button type="submit">test</button></td>
									</tr>
									</form>
									<script>
$('#control<?php echo $boq->boq_id; ?>').change(function() {
if($('#control<?php echo $boq->boq_id; ?>').is(':checked')){

	var tbc = $('#tbc<?php echo $boq->boq_id; ?>').val();
	
	var percent= $('#percent<?php echo $boq->boq_id; ?>').val();

	var ans = (tbc / 100)*percent ;
$('#control<?php echo $boq->boq_id; ?>').val(1);	
$('#ans<?php echo $boq->boq_id; ?>').val(ans);
}

});
										
									</script>				
				<?php } ?>	
									


					</tbody>
							</table>
					
										</div>
											</div>

											

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /bordered pills -->






				<!-- <table>
                <thead>
                  <tr>
      		  <th class="text-left" >No.</th>
        <th class="text-left">JOB</th>
        <th class="text-left">MAT. CODE (MATERIAL)</th>
        <th class="text-left">MAT. NAME (MATERIAL)</th>
        <th class="text-left">MAT. CODE (LABOR/SUB CON.)</th>
        <th class="text-left">MAT. NAME (LABOR/SUB CON.)</th>
        <th class="text-left">COST C. (MATERIAL)</th>
        <th class="text-left">COST C. (LABOR.SUB CON.)</th>
        <th class="text-left">BOQ CODE</th>
        <th class="text-left">MAT. BOQ</th>
        <th class="text-left">BOM</th>
        <th class="text-left">UNIT CODE</th>
        <th class="text-left">UNIT NAME</th>
        <th class="text-left">QTY (BUDGET)</th>
        <th class="text-left">MAT. PRICE (BUDGET)</th>
        <th class="text-left">MAT. AMT (BUDGET)</th>
        <th class="text-left">LAB. PRICE (BUDGET)</th>
        <th class="text-left">LAB. AMOUNT (BUDGET)</th>
        <th class="text-left">TOTAL AMOUNT (BUDGET)</th>
        <th class="text-left">QTY (BOQ)</th>
        <th class="text-left">MAT. PRICE (BOQ)</th>
        <th class="text-left">MAT. AMOUNT (BOQ)</th>
        <th class="text-left">LAB PRICE (BOQ)</th>
        <th class="text-left">LAB AMOUNT (BOQ)</th>
        <th class="text-left"> TOTAL AMOUNT (BOQ)</th>
     	
      </tr>
                </thead>
                <tbody>
          <?php 
$matamt=0;
$mamtboq=0;
$totalamtbg=0;
$labamtboq=0;
$totalamtboq=0;
 $n=1; 

 foreach ($ress as $boq){ ?>
         <tr>
      	<td style="width: 50px;" class="text-left"><?php echo $n ?></td>
        <td style="width: 100px;" class="text-left"> <?php if($boq->boq_job==1){ ?><?php echo "OVERHEAD" ; ?> <?php } ?>
		<?php if($boq->boq_job==2){ ?><?php echo "AC" ; ?> <?php } ?>
		<?php if($boq->boq_job==3){ ?><?php echo "EE" ; ?> <?php } ?>
       	<?php if($boq->boq_job==4){ ?><?php echo "SN" ; ?> <?php } ?>
		<?php if($boq->boq_job==5){ ?><?php echo "CIVIL" ; ?> 
		<?php } ?>
			
		</td>
        <td style="width: 200px;" class="text-left"><?php echo $boq->boq_mcode; ?></td>
        <td style="width: 200px;" class="text-left"><?php echo $boq->boq_mname; ?></td>
        <td style="width: 200px;" class="text-left"><?php echo $boq->boq_subcode; ?></td>
        <td style="width: 400px;" class="text-left"><?php echo $boq->boq_subname; ?></td>
        <td style="width: 200px;" class="text-left"><?php echo $boq->boq_costmat; ?></td>
        <td style="width: 200px;" class="text-left"><?php echo $boq->boq_costsub; ?></td>
        <td style="width: 100px;" class="text-left"><?php echo $boq->boq_boqcode; ?></td>
        <td style="width: 300px;" class="text-left"><?php echo $boq->boq_boqmat; ?></td>
        <td style="width: 100px;" class="text-left"><?php echo $boq->boq_bom; ?></td>
        <td class="text-left" style="width: 100px;"><?php echo $boq->boq_ucode; ?></td>
        <td class="text-left" style="width: 100px;"><?php echo $boq->boq_uname; ?></td>
        <td class="text-left" style="width: 100px;"><?php echo $boq->boq_budget_qty; ?></td>
        <td class="text-left" style="width: 100px;"><?php echo $boq->boq_budget_price; ?></td>
        <td class="text-left" style="width: 100px;"><?php echo $boq->boq_budget_amt; ?></td>
        <td class="text-left" style="width: 100px;"><?php echo $boq->boq_lab_price; ?></td>
        <td class="text-left" style="width: 100px;"><?php echo $boq->boq_lab_amt; ?></td>
        <td class="text-left" style="width: 100px;"><?php echo $boq->boq_budget_total; ?></td>
        <td class="text-left" style="width: 100px;"><?php echo $boq->boq_qty; ?></td>
        <td class="text-left" style="width: 100px;"><?php echo $boq->boq_price; ?>"</td>
        <td class="text-left" style="width: 100px;"><?php echo $boq->boq_amt; ?></td>
        <td class="text-left" style="width: 100px;"><?php echo $boq->boq_lab_boqprice; ?></td>
        <td class="text-left" style="width: 100px;"><?php echo $boq->boq_lab_boqamt; ?></td>
        <td class="text-left" style="width: 100px;"><?php echo $boq->boq_total_amt; ?></td>
     	
      </tr>
    <?php
    $matamt = $matamt+$boq->boq_budget_amt;
      $mamtboq= $mamtboq+$boq->boq_budget_total; 
      $totalamtbg = $totalamtbg+$boq->boq_amt;
      $labamtboq= $labamtboq+$boq->boq_lab_boqamt;
      $totalamtboq= $totalamtboq+$boq->boq_total_amt;
      $n++ ;
     } ?>
     <tr>
		<td colspan="15" class="text-center"><b>Total</b></td>
		<td class="text-left"><b><?php echo number_format($matamt,2); ?></b></td>
		<td colspan="2" class="text-left"></td>
		<td class="text-left"><b><?php echo number_format($mamtboq,2); ?></b></td>
		<td colspan="2" class="text-left"></td>
		<td class="text-left"><b><?php echo number_format($totalamtbg,2); ?></b></td>
		<td colspan="1" class="text-left"></td>
		<td class="text-left"><b><?php echo number_format($labamtboq,2); ?></b></td>
		<td class="text-left"><b><?php echo number_format($totalamtboq,2); ?></b></td>
	</tr>     
                </tbody>
              </table> -->
<br><br><br><br><br><br><br><br>
              
	
			<!-- /main content -->
