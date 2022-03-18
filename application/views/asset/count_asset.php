<div class="page-header">

        </div>
<form method="post" action="<?php echo base_url(); ?>index.php/asset_active/countassetsave">
        <div class="content">
        <div class="col-md-12">
            <div class="panel panel-flat">
             <div class="panel-heading">
              <div class="row">

                  <div class="form-group">
                    <div class="col-sm-2">
                    <label class="control-label">Document No :</label>
                      <input type="text" class="form-control input-xs" name="co_accode" id="co_accode" readonly="true">
                    </div>
                	</div>

			</div>
<!-- <br>
			 <div class="row">
                     <div class="form-group col-lg-1">
                    <label class="control-label">Department</label>
                    <input type="text" class="form-control input-sm" name="co_departmentid" id="depid" readonly="">
                    </div>
                    <div class=" col-lg-4">
                    <label class="control-label">&nbsp;</label>
                    <div class="input-group">
                    <input type="text" class="form-control input-sm" name="co_departmentname" id="depname" readonly="">
                     <span class="input-group-btn">
                      <button type="button" data-toggle="modal" data-target="#opendepart" id="opendepartx" class="opendepart btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button>
                    </span>
                    </div>
                    </div>

                  </div>  -->

                   <div class="row">
                   <div class="form-group col-lg-1">
                    <label class="control-label">Project :</label>
                    <input type="text" class="form-control input-sm" name="co_projectid" id="projectidd" readonly="">
                    </div>
                    <div class="col-md-4">
                    <label class="control-label">&nbsp;</label>
                    <div class="input-group">
                    

                    <input type="text" class="form-control input-sm" name="co_projectname" id="projectnamee" readonly="">
                    <span class="input-group-btn">
                       <button type="button" data-toggle="modal" data-target="#openproj" id="openprojx"  class="openproj btn btn-default btn-icon btn-sm"><i class="icon-search4"></i></button>
                    </span>
                    </div>
                    </div>
                    
                  </div> 



<div class="row">
                    <div class="form-group col-lg-5">
                    <label class="control-label">Remark :</label>
                  <input type="text" class="form-control input-sm" name="co_all1" id="co_all1" required="">
                  <input type="text" class="form-control input-sm" name="co_all2" id="co_all2">
                  <input type="text" class="form-control input-sm" name="co_all3" id="co_all3">
                 
                    </div>
      
                    <div class="form-group col-lg-5">
                    <label class="control-label">Checker By :</label>
                  <input type="text" class="form-control input-sm" name="co_chk1" id="co_chk1" required="">
                  <input type="text" class="form-control input-sm" name="co_chk2" id="co_chk2">
                  <input type="text" class="form-control input-sm" name="co_chk3" id="co_chk3">
                  <input type="hidden" class="form-control input-sm" name="chkstatus" id="chkstatus" value="Y">
                    </div>
        <div class="col-md-4">
      <a  data-toggle="modal" data-target="#insertrow"  class="insertrow btn bg-teal-400">Insert Row</a>
                  </div>
                  </div>


             </div>
             </div>
             </div>

               <div class="col-md-12">
            <div class="panel panel-flat">
             <div class="panel-heading">
                          <div class="table-responsive">
               <table class="table table-bordered table-striped table-xxs" id="res">
                    <thead>
                      <tr>
                      
                               <th style="text-align: center;">No</th>
                               <th style="text-align: center;">Asset Code</th>   
                               <th style="text-align: center;">Asset Name</th>
                               <th style="text-align: center;">Serial No.</th>
                               <th style="text-align: center;">Quantity</th>
                               <th style="text-align: center;">User Name</th>
                               <th style="text-align: center;">Employee</th>
                               <th style="text-align: center;">Residual</th>
                               <th style="text-align: center;">Check</th>
                               <th style="text-align: center;">Remark</th>
                              
                               <th style="text-align: center;">Action</th>
                               
                      </tr>
                    </thead>
                    <tbody id="body">
                      <tr>

                      </tr>
                    </tbody>

                  </table>
                  </div>
             </div>
             </div>
             </div>

            <div class="col-md-12">
            <div class="panel panel-flat">
             <div class="panel-heading">

                      <div class="row">

                  <hr>
                  <div class="col-md-12 text-right">
		<a id="delate" class="btn bg-danger">Delate</a>
        <a type="button" data-toggle="modal" data-target="#retrievecount" class="count btn bg-teal-400">Retrieve</a>
        <a type="button" onclick="history.go(0)" class="btn bg-teal-400">New</a>
        <button type="submit" class="btn bg-danger">Save</button>
        

                  </div>

                  <script>
           $("#delate").click(function(){
					var co_accode = $("#co_accode").val();
					window.location='<?php echo base_url(); ?>index.php/asset_active/delcount/'+co_accode;
					});
                  </script>
                  
            <script>
            	$("#delate").hide();

            </script>
<br><br>
                  </div>
             </div>
             </div>
             </div>


        </div></form>

<div class="modal fade" id="retrievecount" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">รายการ ตรวจนับทรัพย์สิน</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
        <div id="retrievecountt"></div>
        </div>
        </div>
        </div>
    </div>
  </div>
<script> 
$(".count").click(function(){
    $('#retrievecountt').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#retrievecountt").load('<?php echo base_url(); ?>index.php/add_asset/count_re');
    });
    </script>
        <div class="modal fade" id="openproj" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header  bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Project</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="xxxx">

            </div>
            </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="opendepart" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Department</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="modal_department">
              
            </div>
            </div>
        </div>
    </div>
  </div>
</div> 
<script>
  
  $(".openproj").click(function(){
    $('#xxxx').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#xxxx").load('<?php echo base_url(); ?>index.php/share/project');
    });

   $(".opendepart").click(function(){
      $('#modal_department').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_department").load('<?php echo base_url(); ?>index.php/share/department');
    });
</script>


<div class="modal fade" id="insertrow" data-backdrop="false">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Asset</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            
            <div id="addretrive"></div>

            <div class="col-md-12 text-right"><a id="allasset" class="btn btn-danger">เลือกทั้งหมด</a><button class="btn btn-default" data-dismiss="modal">ยกเลิก</button></div>
            </div>
            </div>
        </div>
    </div>
  </div>
</div>

<script>

   $(".insertrow").click(function(){

    var depid = $("#depid").val();
    var projectidd = $("#projectidd").val();
      if(depid=="" && projectidd==""){
        $('#insertrow').modal('toggle');
        alert('กรุณาทำการเลือก Department หรือ Project ก่อนทำการกด Insert Row');  
        location.reload(); 
      }else{

      	if(depid==""){
      	$('#addretrive').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#addretrive").load('<?php echo base_url(); ?>index.php/add_asset/count_asset/'+projectidd);

      	}else{
      	$('#addretrive').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#addretrive").load('<?php echo base_url(); ?>index.php/add_asset/count_assetde/'+depid);
      	}
      
      }
     });

</script> 

<script>
 
  $("#allasset").click(function(){

    var depid = $("#depid").val();
    var projectidd = $("#projectidd").val();
    if(depid==""){
       $('#body').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#body").load('<?php echo base_url(); ?>index.php/add_asset/count_assetall/'+projectidd);
       
        }else{
        $('#body').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#body").load('<?php echo base_url(); ?>index.php/add_asset/count_assetdeall/'+depid);
  
        }
     });

 $('#count').attr('class', 'active');
  
</script>