
<!-- Main content  trans-->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> BID PROJECT TENDER </span></h4>
						</div>
					</div>
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li>
							<a href="<?php echo base_url(); ?>panel/office"><i class="icon-home2 position-left"></i> Dashboard</a>/Bid Project Tender
							</li>
						</ul>	
					</div>
				
				</div>

				<div class="content">
         
					<div class="panel panel-flat">
						<div class="panel-heading">
							
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
 <form method="post" action="<?php echo base_url(); ?>index.php/pettycash_active/newpettycash">		
<div class="row">
				<div class="col-xs-12">
					<div class="panel-body">
					<div class="panel panel-success"> <div class="panel-heading">
   					<h3 class="panel-title">Bid Project Tender</h3> 
   				</div>
   					<div class="panel-body">
   					<div class="row">
   						<div class="col-xs-3">
   						<label>Tender No.</label>
   						<input type="text" name="tdno" class="form-control">
   						</div>
   						<div class="col-xs-3">
   						<label for="chtype">Type</label><br>
   						 <label><input type="radio" name="chtype">Constructor</label><br>
   						 <label><input type="radio" name="chtype">Real Estate</label>
   						</div>
   						<div class="col-xs-3">
   						<label>Status</label>
   						<input type="text" name="tstatus" class="form-control">
   						</div>
   						<div class="col-xs-3">
   						<label>Project No.</label>
   						<input type="text" name="tprojectno" class="form-control">
   						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							
   						<label>Project Name</label>
   						<input type="text" name="pjname" class="form-control">
   						
						</div>
					</div>
					<div class="row">
   						<div class="col-xs-3">
   						<label>Date</label>
   						<input type="date" name="stdate" class="form-control">
   						</div>
   						<div class="col-xs-3">
   						<label for="chtype">Year</label><br>
   						 <input type="text" name="tyear" class="form-control">
   						</div>
   						<div class="col-xs-3">
   						<label>Month</label>
   						<input type="text" name="tmonth" class="form-control">
   						</div>
   						<div class="col-xs-3">
   						<label>Status</label>
   						<select name="sstatus" class="form-control" >
   							<option>1</option>
   						</select>
   						</div>
					</div>

					<div class="row">

						<div class="col-xs-3" >

							<label for="">Customer/Owner F2</label>
							
							

								<div class="form-group">
            
                    <div class="input-group">
                      <span class="input-group-btn">
                        <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                      </span>
                      <input type="text" class="form-control" placeholder="Owner/Customer" readonly   name="owner" id="owner" >
        	
                      <div class="input-group-btn">
                        <a class="ven btn btn-default btn-icon" data-toggle="modal" data-target="#openvender"><i class="icon-search4"></i></a>
                      </div>
                    </div>
                </div>
                              </div>
                        

     <div id="openvender" class="modal fade" data-backdrop="false">
 				 					 <div class="modal-dialog modal-lg">
 				 						 <div class="modal-content">
 				 							 <div class="modal-header">
 				 								 <button type="button" class="close" data-dismiss="modal">&times;</button>
 				 								 <h5 class="modal-title">Select Debtor</h5>
 				 							 </div>

 				 							 <div class="modal-body">
 				 								 <div id="loaddebtor">

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
<script>

	$(".ven").click(function(){
        			$("#loaddebtor").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        			$("#loaddebtor").load('<?php echo base_url(); ?>share/debtor');
        		});
    </script>


						<div class="col-xs-9" >
							<label for="">.</label>
							
							<input type="text" name="tcwb" class="form-control">
						</div>
						
					</div>
					<div class="row">
						<div class="col-xs-3" >
							<label for="">Project Contract No.</label>
							<input type="text" name="pjcona" class="form-control">							
						</div>
						<div class="col-xs-9" >
							<label for="">.</label>							
							<input type="text" name="pjconb" class="form-control">
						</div>
						
					</div>
					<div class="row">
						<div class="col-xs-4" >
							<label for="">Unit Type</label>
							<input type="text" name="uta" class="form-control">							
						</div>
						<div class="col-xs-4" >
							<label for="">.</label>							
							<input type="text" name="utb" class="form-control">
						</div>
						<div class="col-xs-4" >
							<label for="">Unit No.</label>							
							<input type="text" name="unitnoa" class="form-control">
						</div>
						
						
					</div>
					<div class="row">
						<div class="col-xs-4" >
							<label for="">Deed No.</label>
							<input type="text" name="deedno" class="form-control">							
						</div>
						<div class="col-xs-4" >
							<label for="">Area QTY.</label>
							<input type="text" name="areaqty" class="form-control">							
						</div>
						<div class="col-xs-2" >
							<label for="">Unit F2</label>							
							<input type="text" name="unitf2" class="form-control">	
						</div>
						<div class="col-xs-2" >
							<label for="">.</label>							
							<label for="" class="form-control">ตร.ม.</label>	
						</div>
					
					</div>
					</div>
			
					





   					</div>
     				</div>
					</div>
					</div>
		    <div class="row">
			<div class="col-xs-6">
			<div class="panel panel-info">
  			<div class="panel-heading">Owner</div>
 			<div class="panel-body">
			<label for="">Responsble</label>
			<input type="text" class="form-control" name="tres">
			<label for="">Coordinate</label>
			<input type="text" class="form-control" name="tcoor">



 			</div>
			</div>
			</div>	
			<div class="col-xs-6">
				 <div class="table-responsive">
                              <table class="table table-bordered table-striped table-xxs">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>JOB</th>
                                    <th>JOB NAME</th>
                                    <th>AMOUNT</th>
                                    <th>ACTION</th>
                                    
                                  </tr>
                                </thead>
                                <tbody id="body">
                                  <tr>
                                    <td colspan="17" class="text-center">NO DATA</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
		  				 <div class="text-right">
                        
                          <a data-toggle="modal" id="inst" data-target="#insertrow" class="btn btn-default"><i class="icon-stackoverflow"></i> ADD Rows</a>
                          <button type="submit" class="preload btn btn-info"><i class="icon-floppy-disk position-left"></i> Save </button>
                        
                        </div>




			</div>




			</div>

		<div id="insertrow" class="modal fade">
            <div class="modal-dialog modal-lg">
              <div class="modal-content ">
                <div class="modal-header bg-info">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">เลือกระบบงาน</h5>
                </div>
                <div class="modal-body">
                  <div class="row">
                  <div id="whtaxchk">
                   <div class="row">
                    <div class="col-xs-12"> 
           <table class="table datatable-basici" >
          <thead>
          <tr>
          <th>No.</th>
          <th>JOB ID</th>
          <th>JOB NAME</th>
          <th width="5%">ACTION</th>
          </tr>
          </thead>
          <tbody>
			<?php   $n =1;?>
			<?php foreach ($getsystem as $key => $val){ ?>
		<tr>
          <th scope="row"><?php echo $n;?></th>
          <td><?php echo $val->systemcode; ?><input type="hidden" id="systemcode<?php echo $n;?>" value="<?php echo $val->systemcode; ?>"></td>
          <td><?php echo $val->systemname; ?><input type="hidden" id="systemname<?php echo $n;?>" value="<?php echo $val->systemname; ?>"></td>
          <td><button class="btn btn-xs btn-block btn-info" data-toggle="modal" data-dismiss="modal" id="addtorow<?php echo $n;?>">เลือก</button></td>
         </tr>
<script>
$("#addtorow<?php echo $n;?>").click(function(event) {
  addrow<?php echo $n;?>();

});
function addrow<?php echo $n;?>()
  {

    $('td[class="text-center"]').closest('tr').remove();
    var row = ($('#body tr').length-0)+1;
    var systemcode = $("#systemcode<?php echo $n;?>").val();
    var systemname = $("#systemname<?php echo $n;?>").val();
  
   

    var tr = '<tr id="'+row+'">'+
               '<td>'+row+'</td>'+
               '<td>'+systemcode+'<input type="hidden" name="systemcodei[]" value="'+systemcode+'" /></td>'+
               '<td>'+systemname+'<input type="hidden" name="systemnamei[]" value="'+systemname+'" /></td>'+           
               '<td><input type="text" name="amounti[]" value="" class="form-control" /></td>'+
     		   '<td>'+
			 '<ul class="icons-list">'+
               
                  '<li><a id="delete" class="noty-runner" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></li>'+
                '</ul>'+

     		   '</td>';
      $('#body').append(tr);
 
  }
</script>


			<?php $n++; } ?>

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

<script>








</script>



  
  <div class="panel-group" id="accordion">
   
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Detail Of Project</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">







			  <div class="row">
			<div class="col-xs-6">
			<div class="panel panel-info">
  			<div class="panel-heading">Detail Of Project</div>
 			<div class="panel-body">
			<label for="">Location</label>
			<input type="text" class="form-control" name="tloca">
			<label for="">Project Type</label>
			<input type="text" class="form-control" name="tpjtype">
 			<label for="">Budget</label>
			<input type="text" class="form-control" name="tbg">
			<label for="">Bid by</label>
			<div class ="row">
				<div class="col-xs-6">
				<div class="input-group"> <span class="input-group-addon">1.</span>
				<input type="text" class="form-control" name="namea">
				</div>
				<div class="input-group"> <span class="input-group-addon">2.</span>
				<input type="text" class="form-control" name="nameb">
				</div>
				<div class="input-group"> <span class="input-group-addon">3.</span>
				<input type="text" class="form-control" name="namec">
				</div>
				<div class="input-group"> <span class="input-group-addon">4.</span>
				<input type="text" class="form-control" name="named">
				</div>
				
				
				</div>
				<div class="col-xs-6">
					<div class="input-group"> <span class="input-group-addon">5.</span>
				<input type="text" class="form-control" name="namee">
				</div>
				<div class="input-group"> <span class="input-group-addon">6.</span>
				<input type="text" class="form-control" name="namef">
				</div>
				<div class="input-group"> <span class="input-group-addon">7.</span>
				<input type="text" class="form-control" name="nameg">
				</div>
				<div class="input-group"> <span class="input-group-addon">8.</span>
				<input type="text" class="form-control" name="nameh">
				</div>
				</div>
			</div>
			<br>
			<div class="row">
			<div class="col-xs-8">
			<div class="input-group">
			<span class="input-group-addon">Penalty</span>
			<input class="form-control" name="tpen" aria-describedby="basic-addon2">
			<span class="input-group-addon">% /Days + Job Control</span>
			</div>
			</div>
			<div class="col-xs-4">
			<div class="input-group">
			
			<input class="form-control" name="tdays" aria-describedby="basic-addon2">
			<span class="input-group-addon">/Days,</span>
			</div>
			</div>
			</div>
 			</div>
			</div>
			</div>	
			<div class="col-xs-6">
			<div class="panel panel-info">
  			<div class="panel-heading">Adviser MC</div>
 			<div class="panel-body">
 			<div class="input-group">
			<span class="input-group-addon">Company</span>
			<input class="form-control" name="tcom">
			</div>
			<br>
			<div class="row">
				<div class="col-xs-6">
					<div class="input-group">
			<span class="input-group-addon">Tel.</span>
			<input class="form-control" name="ttel">
			</div>
				</div>
				<div class="col-xs-6">
					<div class="input-group">
			<span class="input-group-addon">Fax.</span>
			<input class="form-control" name="tfax">
			</div>
				</div>
			</div>
			<br>
			<label for="">Coordinator</label>
			<div class="row">
			<div class="col-xs-6">
			<div class="input-group">
			<span class="input-group-addon">1.</span>
			<input class="form-control" name="tnamecoora">
			</div>
			<div class="input-group">
			<span class="input-group-addon">2.</span>
			<input class="form-control" name="tnamecoorb">
			</div>
			</div>
			<div class="col-xs-6">
			<div class="input-group">
			<span class="input-group-addon">Tel.</span>
			<input class="form-control" name="tcalcoora">
			</div>
			<div class="input-group">
			<span class="input-group-addon">Tel.</span>
			<input class="form-control" name="tcalcoorb">
			</div>
			</div>
			</div>
 			



 			</div>
			</div>
			</div>	
			</div>
			<div class="row">
			<div class="col-xs-6">
			<div class="panel panel-info">
  			<div class="panel-heading">Structural Designers</div>
 			<div class="panel-body">
			<div class="input-group">
			<span class="input-group-addon">Company</span>
			<input class="form-control" name="tscom">
			</div>
			<br>
			<div class="row">
				<div class="col-xs-6">
					<div class="input-group">
			<span class="input-group-addon">Tel.</span>
			<input class="form-control" name="tstel">
			</div>
				</div>
				<div class="col-xs-6">
					<div class="input-group">
			<span class="input-group-addon">Fax.</span>
			<input class="form-control" name="tsfax">
			</div>
				</div>
			</div>
 			



 			</div>
			</div>
			</div>	
			<div class="col-xs-6">
			<div class="panel panel-info">
  			<div class="panel-heading">System Designers</div>
 			<div class="panel-body">
			<div class="input-group">
			<span class="input-group-addon">Company</span>
			<input class="form-control" name="tsdcom">
			</div>
			<br>
			<div class="row">
				<div class="col-xs-6">
					<div class="input-group">
			<span class="input-group-addon">Tel.</span>
			<input class="form-control" name="tsdtel">
			</div>
				</div>
				<div class="col-xs-6">
					<div class="input-group">
			<span class="input-group-addon">Fax.</span>
			<input class="form-control" name="tsdfax">
			</div>
				</div>
			</div>

 			



 			</div>
			</div>
			</div>	
			</div>
			<div class="row">
			<div class="col-xs-6">
			<div class="panel panel-info">
  			<div class="panel-heading">Architecture Designers</div>
 			<div class="panel-body">
			<div class="input-group">
			<span class="input-group-addon">Company</span>
			<input class="form-control" name="tsacom">
			</div>
			<br>
			<div class="row">
				<div class="col-xs-6">
					<div class="input-group">
			<span class="input-group-addon">Tel.</span>
			<input class="form-control" name="tsatel">
			</div>
				</div>
				<div class="col-xs-6">
					<div class="input-group">
			<span class="input-group-addon">Fax.</span>
			<input class="form-control" name="tsafax">
			</div>
				</div>
			</div>

 			



 			</div>
			</div>
			</div>	
			<div class="col-xs-6">
			<div class="panel panel-info">
  			<div class="panel-heading">Interior Designers</div>
 			<div class="panel-body">
			<div class="input-group">
			<span class="input-group-addon">Company</span>
			<input class="form-control" name="tidcom">
			</div>
			<br>
			<div class="row">
				<div class="col-xs-6">
					<div class="input-group">
			<span class="input-group-addon">Tel.</span>
			<input class="form-control" name="tidtel">
			</div>
				</div>
				<div class="col-xs-6">
					<div class="input-group">
			<span class="input-group-addon">Fax.</span>
			<input class="form-control" name="tidfax">
			</div>
				</div>
			</div>

 			



 			</div>
			</div>
			</div>	
			</div>
			<div class="row">
			<div class="col-xs-6">
			<div class="panel panel-info">
  			<div class="panel-heading">Tender Schedule</div>
 			<div class="panel-body">
			<div class="row">
				<div class="col-xs-6">
					<div class="input-group">
						<span class="input-group-addon">BID Date</span>
						<input type="date" name="biddate" class="form-control">
					</div>
				</div>
				<div class="col-xs-6">
					<div class="input-group">
						<span class="input-group-addon">Time</span>
						<input type="time" name="bidtime" class="form-control">
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-xs-6">
					<div class="input-group">
						<span class="input-group-addon">Salee Order Date :</span>
						<input type="date" name="soddate" class="form-control">
					</div>
				</div>
 			</div>
 			<br>
			<div class="row">
				<div class="col-xs-6">
					<div class="input-group">
						<span class="input-group-addon">Meeting Date :</span>
						<input type="date" name="meetdate" class="form-control">
					</div>
				</div>
				<div class="col-xs-6">
					<div class="input-group">
						<span class="input-group-addon">Time :</span>
						<input type="time" name="meettime" class="form-control">
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-xs-6">
					<div class="input-group">
						<span class="input-group-addon">Meeting location :</span>
						<input type="text" name="meetloc" class="form-control">
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-xs-6">
					<div class="input-group">
						<span class="input-group-addon">Bid Band :</span>
						<input type="text" name="bband" class="form-control">
					</div>
				</div>
				<div class="col-xs-6">
					<div class="input-group">
						<span class="input-group-addon">Period :</span>
						<input type="text" name="bdate" class="form-control">
						<span class="input-group-addon">Days</span>
					</div>
				</div>
			</div>
			<br>
				<div class="row">
				<div class="col-xs-6">
					<div class="input-group">
						<span class="input-group-addon">Bid Bond Exp :</span>
						<input type="date" name="bbedate" class="form-control">
					</div>
				</div>
 			</div>
			<br>
			<div class="row">
				<div class="col-xs-12">
					<div class="input-group">
						<span class="input-group-addon">Check Point :</span>
						<input type="text" name="cpoint" class="form-control">
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-xs-6">
					<div class="input-group">
						<span class="input-group-addon">Constuction Period :</span>
						<input type="text" name="cpdate" class="form-control">
						<span class="input-group-addon">Days</span>
					</div>
				</div>
			</div>

 			</div>
			</div>
			</div>	
				
			</div>

				<div class="row">
			<div class="col-xs-12">
			<div class="panel panel-info">
  			<div class="panel-heading">Tender Schedule</div>
 			<div class="panel-body">
			<div class="row">
				<div class="col-xs-6">
					<div class="input-group">
						<span class="input-group-addon">Advance Band :</span>
						<input type="text" name="adband" class="form-control">
						<span class="input-group-addon">%</span>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="input-group">
						<span class="input-group-addon">Performance Band :</span>
						<input type="text" name="perband" class="form-control">
						<span class="input-group-addon">%</span>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-xs-6">
					<div class="input-group">
						<span class="input-group-addon">Retention :</span>
						<input type="text" name="treten" class="form-control">
						<span class="input-group-addon">%</span>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="input-group">
						<span class="input-group-addon">Warantee :</span>
						<input type="text" name="twaran" class="form-control">
						<span class="input-group-addon">year</span>
					</div>
				</div>
			</div>

 			



 			</div>
			</div>
			</div>	
				
			</div>
			<div class="row">
			<div class="col-xs-12">
			<div class="panel panel-info">
  			<div class="panel-heading">Remark</div>
 			<div class="panel-body">
			<div class="input-group">
						<span class="input-group-addon">Remark :</span>
						<input type="text" name="remark" class="form-control">		
			</div>
 			



 			</div>
			</div>
			</div>	
				
			</div>
		


  
      </div>
    </div>
</form>

  </div> 
</div>
    



          </div>


				</div>
			</div>
		






