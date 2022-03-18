<form action="<?php echo base_url(); ?>index.php/asset_active/insertdepreciation" method="post">
<div class="page-header">

        </div>
 <div class="col-md-12">
      <div class="panel panel-flat">
           <div class="panel-heading">
       <div class="row">

                  <div class="form-group">
                    <div class="col-sm-3">
                    <label class="control-label">No :</label>
                      <input type="text" class="form-control input-xs" name="de_code" id="de_code" style="width: 200px;" readonly="true">
                       
                    </div>

                    <div class="col-sm-2">
                    <label class="control-label">Date :</label>
                      <input type="date" class="form-control input-sm" name="de_date" id="de_date" value="<?php echo date("Y-m-d");?>">
                    </div>
            

                       <div class="col-sm-1">
                    <label class="control-label">GL NO :</label>
                      <input type="text" class="form-control input-xs" name="de_glno" id="de_glno" readonly="true">
                    </div>

                     <div class="col-sm-1">
                    <label class="control-label">GL Date :</label>
                      <input type="text" class="form-control input-xs" name="de_gldate" id="de_gldate" readonly="true">
                    </div>


                     <div class="col-sm-1">
                    <label class="control-label">GL Year :</label>
                      <input type="text" class="form-control input-xs" name="de_glyear" id="de_glyear" readonly="true" value="0">
                    </div>
                  </div>

                  </div> 
<br>
                  <div class="row">
                     <div class="col-sm-3">
                    <label class="control-label">Year :</label>
                      <input type="text" class="form-control input-xs" name="de_yearr" id="de_yearr" value="<?php echo date("Y"); ?>" style="width: 100px;"> 
                    </div>
                     <div class="col-sm-4">
                    <label class="control-label">Month :</label>
                      <input type="text" class="form-control input-xs" name="de_month" id="de_month" value="<?php echo date("m"); ?>" style="width: 100px;"> 
                    </div>
                    <div class="col-sm-1">
                    <label class="control-label">GL Period :</label>
                      <input type="text" class="form-control input-xs" name="de_period" id="de_period" value="0" readonly="true"> 
                    </div>
                  </div>
<br>
                      <div class="row">
                     <div class="col-sm-3">
                    <label class="control-label">Date from :</label>
                      <input type="text" class="form-control input-xs" name="de_datefrom" id="de_datefrom" value="<?php echo date("1/m/Y"); ?>" style="width: 150px;" readonly=""> 
                    </div>
<?php

$months = array(1=>'มกราคม','กุมภาพันธ์','มีนาคม',
'เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม',
'กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');

$day = array(31, 30, 29, 28);
$month = date("m");
$year = date("Y");
for($i=0; $i < count($day); $i++)
{
  $day_check = $day[$i];
  if(checkdate($month, $day_check, $year))
  {
    $last_date = "$day_check/$month/$year";
    break;  
  }
}
?>
                     <div class="col-sm-2">
                    <label class="control-label">Date to :</label>
                      <input type="text" class="form-control input-xs" name="de_dateto" id="de_dateto" value="<?php echo $last_date;?>" style="width: 150px;" readonly="" > 
                    </div>
                    <div class="col-sm-3">
                    <label class="control-label">Total :</label>
                    <div class="input-group">
                      <input type="text" class="form-control input-xs" name="de_total" id="de_total" value="<?php echo $day_check; ?>" style="width: 100px;" readonly=""> 
                      <label class="control-label">&nbsp;&nbsp;&nbsp; <b> : Day</b></label>
                      </div>
                    </div>
                  </div><br>

                   <div class="row">
          <div class="col-sm-6">
                    <label class="control-label">Remark :</label>
                      <input type="text" class="form-control input-xs" name="de_remark" id="de_remark" value="" > 

                    </div>
                   </div>

                   <div class="row">
                   <div class="col-md-12 text-right" >
                <a type="button" id="zz" class="retrieve btn bg-teal-400" style="width: 150px;">Asset</a>
                <a id="delperiod"></a>
                  </div>
             </div>

</div>
</div>
</div>



   <div class="col-md-12">
      <div class="panel panel-flat">
           <div class="panel-heading">

			             <div class="row">
             <div class="col-sm-12">
             <div class="table-responsive">
               
                    
                      
                    <div id="body"></div>

                  <div id="gl"></div>
                  </div>
             </div>
             </div>
			</div>
	  </div>
</div>

<div class="col-md-12 text-right">
      <div class="panel panel-flat">
           <div class="panel-heading">
  
        <a type="button" data-toggle="modal" data-target="#retrieveasset" class="retrieveasset btn bg-teal-400">Retrieve</a>
        <a type="button" onclick="history.go(0)" class="btn bg-teal-400">New</a>
        <button type="submit" class="btn bg-danger" id="saveade">Save</button>
      
        <!-- <a type="submit" href="" class="btn bg-danger">Save to Excel</a> -->

           </div>
      </div>
</div>
</form>

 <div class="modal fade" id="retrieveasset" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">รายการคำนวณค่าเสื่อมราคา</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="asset">

            </div>
            </div>
        </div>
    </div>
  </div>
</div>

            <script>
$("#gl").hide();
            $("#de_date").change(function(event) {
            var de_date = $("#de_date").val();
            var y = de_date.slice(0,4); 
            var d = de_date.slice(8,11);
            var m = de_date.slice(5,7);


var date = new Date();
var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
var lastDay = new Date(y, m, 0);

var lastDayWithSlashes = (lastDay.getDate()) + '/' + (lastDay.getMonth() + 1) + '/' + lastDay.getFullYear();

            $("#de_datefrom").val("1" + "/" + m + "/" + y);
            $("#de_dateto").val(d + "/" + m + "/" + y);
            $("#de_total").val(lastDay.getDate());
            $("#de_month").val(m);
            $("#de_yearr").val(y);         

            }); 
            </script>
<script>
  $(".retrieveasset").click(function(event) {
  $("#asset").html("<img src='<?php echo base_url();?>assets/images/loading.gif'>Loading...");
  $("#asset").load('<?php echo base_url(); ?>index.php/add_asset/retrivedepreciation');
    });
</script> 
<script>
  $(".retrieve").click(function(event) {
    var de_date = $("#de_date").val();
  $("#body").html("<img src='<?php echo base_url();?>assets/images/loading.gif'>Loading...");
  $("#body").load('<?php echo base_url(); ?>index.php/add_asset/depreciation/'+de_date);

  $("#gl").html("<img src='<?php echo base_url();?>assets/images/loading.gif'>Loading...");
  $("#gl").load('<?php echo base_url(); ?>index.php/add_asset/depreciation_gl/'+de_date);
    });


  $('#depreciation').attr('class', 'active');
</script>

