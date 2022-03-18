<form action="<?php echo base_url(); ?>index.php/asset_active/insert_writeoff" method="post">
<div class="page-header">

        </div>

      <div class="col-md-12">
      <div class="panel panel-flat">
      <div class="panel-heading">
      <div class="row">
        <div class="col-sm-2">
         <div class="form-group">
                    <label class="control-label">Fix Asset Code :</label>
                      <input type="text" class="form-control input-xs" name="off_asscode" id="off_asscode" readonly="true">             
                    </div>
          </div>
  <div class="col-sm-4">
  <label class="control-label">&nbsp;</label>
         <div class="input-group">                  
                      <input type="text" class="form-control input-xs" name="off_assname" id="off_assname" readonly="true">
                       <span class="input-group-btn">
                    <button type="button" data-toggle="modal" data-target="#retrieve"  class="retrieve btn btn-default"><i class="icon-search4"></i></button></span>             
                    </div>
          </div>

<div class="col-sm-2">
<br><br>
  <label class="control-label">&nbsp;</label>
  <label><input type="checkbox" name="off_chkmodule" id="off_chkmodule" value="1">Module</label>
</div>
      </div>

   <div class="row">
<!--         <div class="col-sm-2">
         <div class="form-group">
                    <label class="control-label">Dept. Code :</label>
                      <input type="text" class="form-control input-xs" name="off_depid" id="depid" readonly="true">             

                    </div>
          </div>
  <div class="col-sm-4">
   <label class="control-label">&nbsp;</label>
         <div class="input-group">                
                      <input type="text" class="form-control input-xs" name="off_depname" id="depname" readonly="true"> 
                      <span class="input-group-btn">
                    <button type="button" data-toggle="modal" data-target="#opendepart" class="opendepart btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button></span>            
                    </div>
          </div> -->
          <div class="col-sm-2">
            <div class="form-group">
            <label class="control-label">Vch. No:</label>
            <input type="text" class="form-control input-xs" name="off_vch" id="off_vch" readonly="true">
          </div>
          </div>
      </div>

   <div class="row">
        <div class="col-sm-2">
         <div class="form-group">
                    <label class="control-label">Project / Department. :</label>
                      <input type="text" class="form-control input-xs" name="off_pjno" id="projectidd" readonly="true">             
                    </div>
          </div>
  <div class="col-sm-4">
  <label class="control-label">&nbsp;</label>
         <div class="input-group">
                    
                      <input type="text" class="form-control input-xs" name="off_pjname" id="projectnamee" readonly="true">     <span class="input-group-btn">
                    <button type="button" data-toggle="modal" data-target="#openproj"  class="openproj btn btn-default btn-icon"><i class="icon-search4"></i></button></span>         
                    </div>
          </div>
<div class="col-sm-2">
<br><br>
  <label class="control-label">&nbsp;</label>
  <label><input type="checkbox" name="off_chkdepra" id="off_chkdepra" value="1">Depreciation</label>
</div>
      </div>

       <div class="row">
        <div class="col-sm-2">
         <div class="form-group">
                    <label class="control-label">Buy Amount :</label>
                      <input type="text" class="form-control input-xs" name="off_buyam" id="off_buyam" readonly="true" >             
                    </div>
          </div>
  <div class="col-sm-2">
         <div class="form-group">
                    <label class="control-label">Depreciation :</label>
                      <input type="text" class="form-control input-xs" name="off_depre" id="off_depre" readonly="true">             
                    </div>
          </div>
  <div class="col-sm-1">
         <div class="form-group">
                    <label class="control-label">Dep. As Date</label>
                      <input type="text" class="form-control input-xs" name="off_depas" id="off_depas" readonly="true">             
                    </div>

          </div>

    <div class="col-sm-1">
         <div class="form-group">
                    <label class="control-label">Buy Date</label>
                      <input type="text" class="form-control input-xs" name="off_buyd" id="off_buyd" readonly="true">             
                    </div>
          </div>

        <div class="col-sm-1">
         <div class="form-group">
                    <label class="control-label">Dep. Code</label>
                      <input type="text" class="form-control input-xs" name="off_buycode" id="off_buycode" readonly="true">             
                    </div>
          </div>
      </div>

         <div class="row">
        <div class="col-sm-2">
         <div class="form-group">
                    <label class="control-label">Date :</label>
                      <input type="date" class="form-control input-xs" name="off_date" id="off_date" style="width: 200px;">             
                    </div>
          </div>
  <div class="col-sm-1">
         <div class="form-group">
                    <label class="control-label">Dep Day :</label>
                      <input type="text" class="form-control input-xs" name="off_depday" id="off_depday" readonly="true">             
                    </div>
          </div>
  <div class="col-sm-1">
   <label class="control-label">&nbsp;</label>
         <div class="input-group">
                   
                      <input type="text" class="form-control input-xs" name="off_depdayper" id="off_depdayper" readonly="true">  
                      <span class="input-group-btn">
                    <a class="openproj btn btn-default btn-icon btn-xs">%</a></span>           
                    </div>
          </div>

    <div class="col-sm-2">
         <div class="form-group">
                    <label class="control-label">This Dep Amount :</label>
                      <input type="text" class="form-control input-xs" name="off_thiam" id="off_thiam" value="0">             
                    </div>
          </div>

        <div class="col-sm-3">

         <div class="form-group">
                    <label class="control-label">Type : </label><br>
                    <label class="control-label">
                      <input type="radio" name="off_type" id="off_type1" value="1" checked="">
                      Sale &nbsp;&nbsp;&nbsp;
                      <input type="radio" name="off_type" id="off_type2" value="2">
                      Expired &nbsp;&nbsp;&nbsp;
                      <input type="radio" name="off_type" id="off_type3" value="3">
                      Loss
                    </label>
                    <input type="hidden" name="textradio" id="textradio" value="1">
                    </div>
          </div>
      </div>
<script>
  $("#off_type1").click(function(){
    $("#textradio").val(1);
  });
  $("#off_type2").click(function(){
    $("#textradio").val(2);
  });
    $("#off_type3").click(function(){
    $("#textradio").val(3);
  });
</script>
             <div class="row">
        <div class="col-sm-2">
         <div class="form-group">
                    <label class="control-label">Amount :</label>
                      <input type="text" class="form-control input-xs" name="off_amt" id="off_amt" value="0">             
                    </div>
          </div>
  <div class="col-sm-1">
   <label class="control-label">Vat :</label>
         <div class="input-group">           
                      <input type="text" class="form-control input-xs" name="off_vatper" id="off_vatper" value="0" readonly="">    
                      <span class="input-group-btn">
                    <a class="openproj btn btn-default btn-icon btn-xs">%</a></span>         
                    </div>
          </div>
  <div class="col-sm-2">
         <div class="form-group">
                    <label class="control-label">&nbsp;</label>
                      <input type="text" class="form-control input-xs" name="off_vat" id="off_vat" value="0" readonly="true">             
                    </div>
          </div>

    <div class="col-sm-1">
         <div class="form-group">
                    <label class="control-label">Net Amount :</label>
                      <input type="text" class="form-control input-xs" name="off_netam" id="off_netam" readonly="true" value="0">             
                    </div>
          </div>

        <div class="col-sm-1">
         <div class="form-group">
                    <label class="control-label">Profit/Loss</label>
                      <input type="text" class="form-control input-xs" name="off_loss" id="off_loss" readonly="true" value=".00" style="text-align: right;">              
                    </div>
          </div>
      </div>

      <div class="row">
         <div class="col-sm-8">
         <div class="form-group">
                    <label class="control-label">Remark :</label>
                      <input type="text" class="form-control input-xs" name="off_remark" id="off_remark">             
                    </div>
          </div>
      </div>

      <div class="row">
      <div class="col-md-4">

        <a class="btn bg-teal-400"  data-toggle="modal" id="insertrow" data-target="#insertpodetail">Insert row</a>
                  </div>
      <div class="col-md-1">
        <a type="button" class="btn bg-teal-400"  id="glload">Initial GL</a>
      </div>

      </div>

      <script>
$("#glload").click(function(){
  var off_asscode = $("#off_asscode").val();
  
  if(off_asscode==""){
  alert('กรุณาทำการเลือก Fix Asset Code');  
  location.reload(); 
  }else{
  $('#res').html("<img src='<?php echo base_url(); ?>/assets/images/loading.gif'> Loading...");
  $("#res").load('<?php echo base_url(); ?>index.php/add_asset/loadwgl/'+off_asscode);
  }
});
</script>
           </div>
           </div>
           </div>

<div class="row">
                 <div class="col-md-12">
      <div class="panel panel-flat">
      <div class="panel-heading">
      <div class="row">

      <div class="col-md-12">
                  <br>
                  <table class="table table-hover table-bordered table-striped table-xxs" id="res">
                    <thead>
                      <tr>

                               <th style="text-align: center;">No.</th>
                               <th style="text-align: center;">Ac Code</th>   
                               <th style="text-align: center;">Account Name</th>
                               <th style="text-align: center;">Cost Code</th>
                               <th style="text-align: center;">Cost Name</th>
                               <th style="text-align: center;">Debit (Dr)</th>
                               <th style="text-align: center;">Credit (Cr)</th>
                               <th style="text-align: center;">Action</th>
                               
                      </tr>
                    </thead>
                    <tbody id="bodygl">
                      <tr>
                      </tr>
                    </tbody>

                   </table>
                  
                   
                </div></div>
<br>


                 <div class="row">
                     <div class="col-md-12 text-right">

        <a type="button" data-toggle="modal" data-target="#retrievegl" class="gl btn bg-teal-400">Retrieve</a>
        <a type="button" onclick="history.go(0)" class="btn bg-teal-400">New</a>
        <button type="submit" class="savee btn bg-danger">Save</button>
     <!--    <a href="#" class="btn bg-teal-400" id="fa_delect">Delect</a> -->
        

                  </div>
                  <br><br><br>
                   </div>

      </div>
      </div>
      </div>
      </div>
      </form>

<script>


  $("#off_date").change(function(event) {
            var de_date = $("#off_date").val();
            var off_depas = $("#off_depas").val();
            var y = de_date.slice(0,4); 
            var d = de_date.slice(8,11);
            var m = de_date.slice(5,7);

            var de_datee = $("#off_buyd").val();          
            var dd = de_datee.slice(8,11);

var start = new Date(off_depas);
var startt = new Date(de_datee);
var end   = new Date(de_date);       
var diff  = new Date(end - start);
var difff = new Date(end - startt);
var days  = diff/1000/60/60/24;
var dayss = difff/1000/60/60/24;


if(off_depas==""){
  var off_buyamm = $("#off_buyam").val();
  var off_vatperr = $("#off_vatper").val();
  var off_depdayperr = $("#off_depdayper").val();
  var alldayy = ((((off_buyamm-1)/365)*off_depdayperr)/100)*dayss;
  var buydayy = alldayy.toFixed(4);
  var amoutt = (off_buyamm-alldayy).toFixed(4);
  var vatamoutt = (((off_buyamm-alldayy)*off_vatperr)/100).toFixed(4);
  var totall = ((off_buyamm-alldayy)+(((off_buyamm-alldayy)*off_vatperr)/100)).toFixed(4);
   $("#off_depday").val(dayss);
   $("#off_thiam").val(buydayy);
   $("#off_amt").val(amoutt);
   $("#off_vat").val(vatamoutt);
   $("#off_netam").val(totall);
 }else{
   var off_buyam = $("#off_buyam").val();
   var off_vatper = $("#off_vatper").val();
   var off_depdayper = $("#off_depdayper").val();
   var allday = ((((off_buyam-1)/365)*off_depdayper)/100)*days;
   var buyday = allday.toFixed(4);
   var amout = (off_buyam-allday).toFixed(4);
   var vatamout = (((off_buyam-allday)*off_vatper)/100).toFixed(4);
   var total = ((off_buyam-allday)+(((off_buyam-allday)*off_vatper)/100)).toFixed(4);
   $("#off_depday").val(days);
   $("#off_thiam").val(buyday);
   $("#off_amt").val(amout);
   $("#off_vat").val(vatamout);
   $("#off_netam").val(total);
   
 }

var off_buyam =  parseFloat($("#off_buyam").val());
var off_amt =  parseFloat($("#off_amt").val());
var off_thiam =  parseFloat($("#off_thiam").val());
var allbyuam = parseFloat(off_buyam-off_thiam).toFixed(4);
  if(off_amt>allbyuam){
var amtbyam =  parseFloat((off_amt-allbyuam)+off_thiam).toFixed(4);
  $("#off_loss").val(amtbyam);
}else if(off_amt<allbyuam){
  var amtbyamm =  parseFloat(off_thiam-(off_buyam-off_amt)).toFixed(4);
  $("#off_loss").val(amtbyamm);
}else if(off_amt==allbyuam){
 $("#off_loss").val(0);
}
   }); 


$("#off_amt").keyup(function() {
  var off_amt = parseFloat($("#off_amt").val());
  var off_vatper = parseFloat($("#off_vatper").val());
  var amyper = parseFloat((off_amt*off_vatper)/100);
  var off_buyam =  parseFloat($("#off_buyam").val());
var off_amt =  parseFloat($("#off_amt").val());
var off_thiam =  parseFloat($("#off_thiam").val());
  $("#off_vat").val(amyper);
  $("#off_netam").val(amyper+off_amt);
  
var allbyuam = parseFloat(off_buyam-off_thiam).toFixed(4);
  if(off_amt>allbyuam){
var amtbyam =  parseFloat((off_amt-allbyuam)+off_thiam).toFixed(4);
  $("#off_loss").val(amtbyam);
}else if(off_amt<allbyuam){
  var amtbyamm =  parseFloat(off_thiam-(off_buyam-off_amt)).toFixed(4);
  $("#off_loss").val(amtbyamm);
}else if(off_amt==allbyuam){
 $("#off_loss").val(0);
}
});

$("#off_vatper").keyup(function() {
  var off_amt = parseFloat($("#off_amt").val());
  var off_vatper = parseFloat($("#off_vatper").val());
  var amyper = parseFloat((off_amt*off_vatper)/100);
  var off_buyam =  parseFloat($("#off_buyam").val());
  var off_amt =  parseFloat($("#off_amt").val());
  var off_thiam =  parseFloat($("#off_thiam").val());
  $("#off_vat").val(amyper);
  $("#off_netam").val(amyper+off_amt);
  
var allbyuam = parseFloat(off_buyam-off_thiam).toFixed(4);
  if(off_amt>allbyuam){
var amtbyam =  parseFloat((off_amt-allbyuam)+off_thiam).toFixed(4);
  $("#off_loss").val(amtbyam);
}else if(off_amt<allbyuam){
  var amtbyamm =  parseFloat(off_thiam-(off_buyam-off_amt)).toFixed(4);
  $("#off_loss").val(amtbyamm);
}else if(off_amt==allbyuam){
 $("#off_loss").val(0);
}
});
</script>
<div class="modal fade" id="retrieve" data-backdrop="false">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">รายการบันทึกทรัพย์สิน</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="retrievee">

            </div>
            </div>
        </div>
    </div>
  </div>
</div> 
<script>
  $(".retrieve").click(function(){
       $('#retrievee').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#retrievee").load('<?php echo base_url(); ?>index.php/add_asset/model_fixasset');
     });
</script> 

<div class="modal fade" id="retrievegl" data-backdrop="false">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">รายการบันทึกทรัพย์สิน</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="glre">

            </div>
            </div>
        </div>
    </div>
  </div>
</div> 
<script>
  $(".gl").click(function(){
       $('#glre').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#glre").load('<?php echo base_url(); ?>index.php/add_asset/retrive_gl');
     });
</script> 
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
  $(".opendepart").click(function(){
      $('#modal_department').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_department").load('<?php echo base_url(); ?>index.php/share/department');
    });
</script>   

<div class="modal fade" id="openproj" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
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
<script>
    $(".openproj").click(function(){
    $('#xxxx').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#xxxx").load('<?php echo base_url(); ?>index.php/share/project');
    });
</script>
<div id="insertpodetail" class="modal fade in" data-backdrop="false">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h6 class="modal-title">เพิ่มรายการ</h6>
                </div>

                <div class="modal-body">
                  <div class="col-md-12">
                  <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                  <label>AC Code :</label>
                    <div class="input-group"><input type="text" name="off_apcode[]" id="off_apcode" class="form-control input-sm" readonly="true"><input type="text" name="off_apname[]" id="off_apname" class="form-control input-sm" readonly="true"><span class="input-group-btn"><button type="button" class="acccode btn btn-default btn-xs" data-toggle="modal" data-target="#accode"><i class="icon-search4"></i></button></span></div>
                  </div>
                 </div>
                   
                </div>
                
                <div class="row">
                   <div class="col-sm-12">
                    <div class="form-group">
                    <label>Cost Code :</label>
                    <div class="input-group"><input type="text" name="off_costcode[]" id="codecostcodeint" class="form-control input-sm" readonly="true"><input type="text" name="off_costname[]" id="costnameint" class="form-control input-sm" readonly="true"><span class="input-group-btn"><button type="button" class="modalcost btn btn-default btn-xs" data-toggle="modal" data-target="#costcode"><i class="icon-search4"></i></button></span></div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Dr :</label>
                  <input type="text" name="off_dr[]" id="off_dr" class="form-control input-sm text-right" value=".00">
                  </div>
                  </div>

                   <div class="col-sm-6">
                  <div class="form-group">
                    <label>Cr :</label>
                  <input type="text" name="off_cr[]" id="off_cr" class="form-control input-sm text-right" value=".00">
                  </div>
                  </div>

                </div>
                </div>
</div>
                <div class="modal-footer">

                  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="insert">เพิ่มรายการ</button>
                </div>
              </div>
            </div>
          </div>







 <div class="modal fade" id="costcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-full">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
               </div>
                 <div class="modal-body">
                     <div id="modal_cost"></div>
                 </div>
             </div>
           </div>
         </div>
<script>
  $(".modalcost").click(function(){
             $('#modal_cost').html("<img src='<?php echo base_url(); ?>/assets/images/loading.gif'> Loading...");
             $("#modal_cost").load('<?php echo base_url(); ?>/index.php/share/costcode');
           });
</script>

<div class="modal fade" id="accode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">Account Code</h4>
               </div>
                 <div class="modal-body">
                     <div id="accodee"></div>
                 </div>
             </div>
           </div>
         </div>
         <script>
  $(".acccode").click(function(){
             $('#accodee').html("<img src='<?php echo base_url(); ?>/assets/images/loading.gif'> Loading...");
             $("#accodee").load('<?php echo base_url(); ?>/index.php/share/accchart1');
           });
</script>
     <script>
     $("#insertrow").click(function(){
      var depid = $("#depid").val();
      var projectidd = $("#projectidd").val();
      if(depid=="" && projectidd==""){
        $('#insertpodetail').modal('toggle');
        alert('กรุณาทำการเลือก Department หรือ Project ก่อนทำการกด Insert Row');      
         location.reload();    
      }
       });

$("#insert").click(function(){

   addrow();
  });
   function addrow()
            {

           
              var row = ($('#bodygl tr').length+0);
              var tr = '<tr id="'+row+'">'+
            '<td><input class="form-control input-sm" type="text" name="off_apcode[]" value="'+$("#off_apcode").val()+'"><input type="hidden" name="chki[]" id="chki" value="Y"></td>'+
            '<td><input class="form-control input-sm" type="text" name="off_apname[]" value="'+$("#off_apname").val()+'"></td>'+
            '<td><input class="form-control input-sm" type="text" name="off_costcode[]" value="'+$("#codecostcodeint").val()+'"></td>'+
            '<td><input class="form-control input-sm" type="text" name="off_costname[]" value="'+$("#costnameint").val()+'"></td>'+
            '<td><input class="drsum form-control input-sm text-right" type="text" name="off_dr[]" value="'+$("#off_dr").val()+'"></td>'+
            '<td><input class="crsum form-control input-sm text-right" type="text" name="off_cr[]" value="'+$("#off_cr").val()+'"></td>'+                        
            '<td>'+
                  '<a id="remove" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>'+
                          
            '</td>'+
                       '</tr>';
             $('#bodygl').append(tr);


             $("#off_apcode").val("");
             $("#off_apname").val("");
             $("#codecostcodeint").val("");
             $("#costnameint").val("");
             $("#off_dr").val(".00");
             $("#off_cr").val(".00");

                   calculateSum1();
      $(".drsum").on("keydown keyup", function() {
  
      calculateSum1();
      });
      function calculateSum1() {
      var sum = 0;
      //iterate through each textboxes and add the values
      $(".drsum").each(function() {
      //add only if the value is number
      if (!isNaN($(this).val().replace(/,/g,"")) && $(this).val().replace(/,/g,"").length != 0) {
      sum += parseFloat($(this).val().replace(/,/g,""));
      $(this).css("background-color", "#FEFFB0");
      console.log(sum);
      //alert(sum)
      }
      // else if (this.value.length != 0){
      //     $(this).css("background-color", "red");
      // }
      });
      
      $("input#sumdr").val(numberWithCommas(sum));
      }

      calculateSum();
      $(".crsum").on("keydown keyup", function() {
  
      calculateSum();
      });
      function calculateSum() {
      var sum = 0;
      //iterate through each textboxes and add the values
      $(".crsum").each(function() {
      //add only if the value is number
      if (!isNaN($(this).val().replace(/,/g,"")) && $(this).val().replace(/,/g,"").length != 0) {
      sum += parseFloat($(this).val().replace(/,/g,""));
      $(this).css("background-color", "#FEFFB0");
      console.log(sum);
      //alert(sum)
      }
      // else if (this.value.length != 0){
      //     $(this).css("background-color", "red");
      // }
      });
      
      $("input#sumcr").val(numberWithCommas(sum));
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



            $('#write').attr('class', 'active');
           </script>


