<div class="content-wrapper">
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Cheque Preparing</span> - Pay Cheque</h4>
			</div>

		</div>

		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="index.html"><i class="icon-home2 position-left"></i> Cheque Preparing</a></li>
				<li class="active">Pay Cheque</li>
			</ul>

		</div>
	</div>
	<div class="content">
<form action="<?php echo base_url();?>index.php/ap_active/insertoption" method="post">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">Pay Cheque</h5>
				</div>

				<div class="container-fluid">
					<div class="row">
						<div class="form-group col-lg-12">
	                    	<div class="col-lg-1">
								<label class="control-label">Paid Type :</label>
							</div>	
	                    	<div class="col-lg-4">

	                    	<input type="hidden" id="optt" name="optt" value="" class="form-control" readonly="true" >

	                            <select name="option_code" id="option_code" class="form-control">
	                                <?php $this->db->select('*');
		                       			// $this->db->order_by('id','asc');
		                              $q = $this->db->get('ap_pay_option');
		                              $res = $q->result();
		                              foreach ($res as  $va) {
	                				?>
	               					<option value="<?php echo $va->option_id; ?>"><?php echo $va->option_name; ?></option>
	               					<?php } ?>
	                            </select>
	                            
	                        </div>


	                        <div class="col-lg-1">
	                        	<label class="control-label">No. :</label>
	                        </div>
	                        <div class="col-lg-2">
	                        	<input type="text" name="runno" class="form-control" readonly="true" >
	                        </div>


	                        <div class="col-lg-1">
	                        	<label class="control-label">REf.Runno :</label>
	                        </div>
	                        <div class="col-lg-2">
	                        	<input type="text" name="" class="form-control"  readonly="true" >
	                        </div>

	                    </div>

	                    <div class="form-group col-lg-12">
	                    	<div class="col-lg-1">
	                        	<label class="control-label">Ref.Doc :</label>
	                        </div>
	                        <div class="col-lg-1">
	                        	<input type="text" name="refno" id="refno" class="form-control">
	                        </div>


	                        <div class="col-lg-1">
	                        	<label class="control-label">Ref.Date :</label>
	                        </div>
	                        <div class="col-md-2">
	                            <div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar22"></i></span>
	          							<input type="text" class="form-control daterange-single" id="rdfdate" name="rdfdate">
	    						</div>
								</div>


	                        <div class="col-lg-1">
	                        	<label class="control-label">PL/PV :</label>
	                        </div>
	                        <div class="col-lg-2">
	                        	<input type="text" name="apo_code" id="apo_code" class="form-control"  readonly="true" >
	                        </div>


	                        <div class="col-lg-2">
	                        	<label>
									<input type="checkbox" checked="checked">Chq.To Vender
								</label>
	                        &nbsp;&nbsp;
	                        	<label class="control-label">Chq.Status :</label>
	                        </div>
	                        <div class="col-lg-2">
	                        	<input type="text" name="" class="form-control">
	                        </div>     
	                    </div>


	                    <div class="form-group col-lg-12">
	                    	<div class="col-lg-1">
	                        	<label class="control-label">Vendor :</label>
	                        </div>
	                        <div class="col-lg-1">
	                        	<input type="hidden" name="acct_no" id="acct_no">
	                        	<input type="text" name="vender" id="vender" class="form-control"  readonly="true" >
	                        </div>
	                        <div class="col-lg-4">
	                        	<input type="text" name="vender_name" id="vender_name" class="form-control"  readonly="true" >
	                        </div>

	                        <div class="col-lg-1">
	                        	<label class="control-label">Currency :</label>
	                        </div>
	                        <div class="col-lg-2">
	                        	<select name="current_c" id="current_c" class="form-control">
	               					<option value="baht">BAHT</option>
	                            </select>
	                        </div>

	                        <div class="col-lg-1">
	                        	<label class="control-label">Exchange :</label>
	                        </div>
	                        <div class="col-lg-2">
	                        	<input type="text" name="exchange" id="exchange" class="form-control">
	                        </div>
	                    </div>


	                    <div class="form-group col-lg-12">
	                    	<div class="col-lg-1">
	                        	<label class="control-label">Remark :</label>
	                        </div>
	                        <div class="col-lg-5">
	                        	<input type="text" name="apo_remark" id="apo_remark" class="form-control">
	                        </div>

	                        <div class="col-lg-1">
	                        	<label class="control-label">Net Amount :</label>
	                        </div>
	                        <div class="col-lg-2">
	                        	<input type="text" name="totpaynet" id="totpaynet" class="form-control" readonly="true" >
	                        </div>

	                        <div class="col-lg-1">
	                        	<label class="control-label">AP Due date :</label>
	                        </div>
	                        <div class="col-md-2">
	                            <div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar22"></i></span>
	          							<input type="text" class="form-control daterange-single" id="" name="" readonly="true" >
	    						</div>
								</div>
	                    </div>


	                    <div class="form-group col-lg-12">
	                    	<div class="col-lg-1">
	                        	<label class="control-label">Bank :</label>
	                        </div>
	                        <div class="col-lg-2">
	                        	<input type="hidden" name="bank_id" id="bank_id">
	                        	<input type="text" name="apo_bankcode" id="apo_bankcode" class="form-control" readonly="true">
	                        </div>

	                        <div class="col-lg-1">
	                        	<label class="control-label">Branch :</label>
	                        </div>
	                        <div class="col-lg-2">
	                        	<input type="hidden" name="branch_id" id="branch_id">
	                        	<input type="text" name="apo_branchcode" id="apo_branchcode" class="form-control" readonly="true">
	                        </div>

	                        <div class="col-lg-1">
	                        	<label class="control-label"># :</label>
	                        </div>
	                        <div class="col-lg-2">
	                        	<input type="text" name="apo_bankaccount"  id="apo_bankaccount" class="form-control" readonly="true" >
	                        </div>

	                        <div class="col-lg-1">
	                        	<label class="control-label">A/C :</label>
	                        </div>
	                        <div class="col-lg-2">
	                        	<input type="text" name="" id="" class="form-control" readonly="true" >
	                        </div>
	                    </div>


	                    <div class="form-group col-lg-12">
	                    	<div class="col-lg-1">
	                        	<label class="control-label">By :</label>
	                        </div>
	                        <div class="col-lg-5 radio">
								<label>
									<input type="radio" name="paytype" value="c" checked="checked">
									Cheque
								</label>
	                        </div>
	                    </div>


	                    <div class="form-group col-lg-12">
	                    	<div class="col-lg-1">
	                        	<label class="control-label">Cheque No :</label>
	                        </div>
	                        <div class="col-lg-2">
	                        	<input type="text" name="chqno" id="chqno" class="form-control">
	                        </div>
	                        <div class="col-lg-1">
	                        	<input type="text" name="" class="form-control" readonly="true" >
	                        </div>

	                        <div class="col-lg-1">
	                        	<label class="control-label">Chq.Date :</label>
	                        </div>
	                        <div class="col-md-2">
	                            <div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar22"></i></span>
	          							<input type="text" class="form-control daterange-single" id="chqdate" name="chqdate" >
	    						</div>
								</div>
	                        <div class="col-lg-2">
	                        	<label>
									<input type="checkbox" name="payactive" id="payactive">Account Payee only
								</label>
								<input type="hidden" id="payactives" name="payactives" value="N">

							</div>
							<div class="col-lg-2">
								<label>
									<input type="checkbox" name="chqpay" id="chqpay">Post Dated Cheque
								</label>
								<input type="hidden" id="chqpays" name="chqpays" value="N">
							</div>
							<div class="col-lg-1">
								<label>
									<input type="checkbox" name="chq_cross" id="chq_cross">Cross
								</label>
								<input type="hidden" id="chq_crosss" name="chq_crosss" value="N">
							</div>
	                    </div>


	                    <div class="form-group col-lg-12">
	                    	<div class="col-lg-1">
	                        	<label class="control-label">Pay to :</label>
	                        </div>
	                        <div class="col-lg-4">
	                        	<input type="text" name="namechq" id="namechq" class="form-control">
	                        </div>

	                        <div class="col-lg-1">
	                        	<label class="control-label">Voucher No :</label>
	                        </div>
	                        <div class="col-lg-2">
	                        	<input type="text" name="vchno" id="vchno" class="form-control" readonly="true" >
	                        </div>

	                        <div class="col-lg-1">
	                        	<label class="control-label">GL Date :</label>
	                        </div>
	                        <div class="col-lg-2">
	                        	<div class="input-group">
	                        		<span class="input-group-addon"><i class="icon-calendar22"></i></span>
	          						<input type="text" class="form-control daterange-single" id="vchdate" name="vchdate" readonly="true" >
	          					</div>
	                        </div>
	                        
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="panel panel-flat">
	    <div class="panel-heading">
	    <h5 class="panel-title">Cheque Preparing - Pay Cheque</h5>

	    <div class="heading-elements">
	        <ul class="icons-list">
	            <li><a type="button" class="openpr btn btn-default btn-sm" data-toggle="modal" data-target="#payment"><i class="icon-list-numbered"></i>Ref. Payment No.</a></li>
	        </ul>
	    </div>
	</div>

	<div class="panel-body">
	    <div class="row" id="table">
	        <div class="table-responsive">
				<table class="table datatable-basic table-xxs table-bordered">
	                <thead>
	                    <tr>
		                    <th class="text-center">#</th>
		                    <th class="text-center">Pre Payment No.</th>
		                    <th class="text-center">Due Date</th>
		                    <th class="text-center">PO/WO No.</th>
		                    <th class="text-center">Tax/Inv. No.</th>
		                    <th class="text-center">Paid Net Amount</th>
		                    <th class="text-center">Amount</th>
		                    <th class="text-center">VAT</th>
		                    <th class="text-center">W/T Amount</th>
		                    <th class="text-center">W/T FR.</th>
		                </tr>
	            	</thead>
	    			<tbody id="body">
	                  	<tr>             
	              			<td colspan="14" id="nodata" class="text-center">NO DATA</td>
	                  	</tr>
					</tbody>
	                    <tr>
			                <td colspan="4"  class="text-center">Total</td>
			                <td colspan="1"  class="text-center"></td>
			                <td colspan="1"  class="text-center"></td>
			                <td colspan="4"  class="text-center"></td>
	                	</tr>
				</table>
			</div>
		</div>
		<div>
			<br>
		</div>
		<div class="text-right">
			<a type="button" class="arch btn btn-default btn-sm" data-toggle="modal" data-target="#archive"><i class="icon-list-numbered"></i>Archive</a>
	    	<button type="submit" class="save preload btn btn-info btn-xs"><i class="icon-floppy-disk position-left" id=""></i> Save </button>
	    	<a href="#" class="btn btn-default btn-xs"><i class="icon-close2 position-left"></i> Close</a>
		</div>
	</div>

						


 	<div id="payment" class="modal fade" data-backdrop="false">
       	<div class="modal-dialog modal-lg">
         	<div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h5 class="modal-title">Ref. Payment No.</h5>
               </div>

               <div class="modal-body">
                 <div id="loadarchive">

                 </div>
               </div>
               <br>
               <div class="modal-footer">
                 <a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
                 <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
               </div>
         	</div>
       	</div>
    </div>


 	<div id="archive" class="modal fade" data-backdrop="false">
       	<div class="modal-dialog modal-lg">
         	<div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h5 class="modal-title">Ref. Payment No.</h5>
               </div>

               <div class="modal-body">
                 <div id="archive_apv">

                 </div>
               </div>
               <br>
               <div class="modal-footer">
                 <a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
                 <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
               </div>
         	</div>
       	</div>
    </div>
    
</form>
 <script >
         $("#payactive").click(function(){ 
                $("#payactives").val("Y");
              }
            ); 

        $("#chqpay").click(function(){ 
                $("#chqpays").val("Y");
              }
            );  
         
        $("#chq_cross").click(function(){ 
                $("#chq_crosss").val("Y");
              }
            );  
          
         
</script>

<script>
	$(".openpr").click(function(){
          $('#loadarchive').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#loadarchive").load('<?php echo base_url(); ?>ap_active/load_option');
            })

$(".arch").click(function(){
          $('#archive_apv').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#archive_apv").load('<?php echo base_url(); ?>ap_active/load_archive');
            })


	$('.daterange-single').daterangepicker({
       singleDatePicker: true,
        locale: {
           format: 'YYYY-MM-DD'
       }
   });

	
</script>