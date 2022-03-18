<style type="text/css">
  .Budget{
    /*display:none;*/
  }
</style>

<?php foreach ($proo as $key) {
  $proname = $key->project_name;
  $procode = $key->project_code;
  $proid = $key->project_id;
} ?>
<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">      Dashboard - Journal_vocher</span></h4>
    </div>
  </div>
</div>

 <form name="formglpost"  id="formglpost" method="post" action="<?php echo base_url(); ?>ar_active/addjournal" > 
    <div class="content">
      <!-- Input group addons -->
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h3 class="panel-title">Journal_vocher</h3>
          <div class="heading-elements">

          </div>
        
        <div class="panel-body">
          <div class="row">
            <div class="form-group col-sm-3">
              <label for="">ประเภทการรับ :</label>
              <select class="form-control" id="type_gl" name="">
                <option value="cash">cash</option>
                <option value="cheque">Cheque</option>
                <option value="transfer">Transfer</option>
                <option value="ohter">Ohter</option>
              </select>
              <input type="hidden" id="type_gls" value="cash" name="type_gl">
            </div>

            <div class="form-group col-sm-3">
              <label for="">งวด :</label>
              <select class="form-control" id="typepriod" name="typepriod">
                <option value="progress">รับล่วงหน้า</option>
                <option value="tran">โอน</option>
                <option value="down">ดาวน์</option>
                <option value=""></option>
              </select>
              <input type="hidden" id="type_gls" value="cash" name="type_gl">
            </div>

            <div class="form-group col-sm-2">
              <label for="">Doc Date :</label>
              <input type="date" id="vchdate" name="vchdate" class="form-control daterange-single">
            </div>
            <div class="form-group col-sm-2">
              <label for="">GL Year :</label>
              <input type="text" id="glyear" name="glyear" value="" class="form-control" readonly="true" >
            </div>

            <div class="form-group col-sm-2">
              <label for="">GL Period :</label>
              <input type="text" id="glperiod" name="glperiod" value="" class="form-control" readonly="true" >
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-2">
              <label for="">Prject :</label>
              <input type="text" id="projectcode" name="projectcode" class="form-control" readonly="true" value="<?php echo $procode; ?>">
              <input type="hidden" id="proid" name="proid" class="form-control" readonly="true" value="<?php echo $proid; ?>">
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="">&nbsp;&nbsp;&nbsp;</label>
                <div class="input-form" id="errorcost">
                    <input type="text" id="projectname" name="projectname" value="<?php echo $proname; ?>" readonly="true" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group col-sm-2">
              <label for="">Sub Project :</label>
              <input type="text" id="sub_code" name="sub_code" class="form-control" readonly="true">
              <input type="hidden" id="sub_id" name="sub_id" class="form-control" readonly="true">
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="">&nbsp;&nbsp;&nbsp;</label>
                <div class="input-group" id="errorcost">
                    <input type="text" id="sub_name" name="sub_name" readonly="true" class="form-control">
                    <span class="input-group-btn">
                       <a class="book btn bg-info btn-sm" data-toggle="modal" data-target="#bookn"><span class="glyphicon glyphicon-search"></span></a>
                    </span>
                </div>
              </div>
            </div>
          </div>
          <div class="row bank">
            <div class="col-sm-6">
              <div class="form-group" >
                      <label>Bank:</label>
                      <div class="input-group">
                        <span class="input-group-btn">
                          <button class="btn btn-default btn-icon" type="button"><i class="icon-office"></i></button>
                        </span>
                        <input type="text" class="form-control" readonly="readonly" placeholder="Bank" value="" name="bankname" id="bankname" required="true">

                        <input type="hidden" readonly="true" value="" class=" form-control input-sm" name="bankid" id="bankid">

                        <input type="text" class="form-control" readonly="readonly" placeholder="branch" value="" name="branch" id="branch">

                        <input type="hidden" readonly="true" value="" class=" form-control input-sm" name="branchd" id="branchid">

                        <div class="input-group-btn">
                          <button type="button" data-toggle="modal" data-target="#openbank"  class="openbank btn btn-default btn-icon"><i class="icon-search4"></i></button>
                        </div>
                      </div>
                    </div>
            </div>
            <div id="chqq">
              <div class="form-group col-sm-3">
              <label for="">Cheque No :</label>
              <input type="text" id="chqno" name="chqno" class="form-control">
            </div>
            <div class="form-group col-sm-2">
              <label for="">Cheque Date :</label>
              <input type="date" id="chqdate" name="chqdate" class="form-control daterange-single">
            </div>
            </div>
            
          </div>
          
        </div>
        <div class="panel panel-flat">
          <div class="panel-body">
            <div class="row">
              <a class="insrows pull-right  btn bg-info"><i class="icon-plus2"></i> Add items</a>
            </div>
            <br>

            <div class="row" id="table">
            <div class="table-responsive">
              <table class="table datatable-basic table-xsm table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center" >A/C</th>
                    <th class="text-center">Cost code</th>
                    <th class="text-center">Dr</th>
                    <th class="text-center">Cr.</th>
                    <th class="text-center">Active</th>
                  </tr>
                </thead>
                <tbody id="body">
                  <tr>
                  </tr>
                </tbody>
                    <td colspan="3">Total</td>
                    <td><input type="text" id="damt" style="text-align: right;" readonly="" name="sffumdr" class="form-control" style="width: 150px;" value="0"></td>
                    <td><input type="text" id="camt" style="text-align: right;" readonly="" name="sffumcr" class="form-control" style="width: 150px;" value="0"></td>
                    <td></td>
                  </tr>
              </table>
            </div>
          </div>
          <br>
           
          <div class="text-right">
              <!-- <a type="button" class="openpr btn btn-default btn-sm" data-toggle="modal" data-target="#archive"><i class="icon-list-numbered"></i>Archive</a> -->
              <a onclick="javascript:location.reload();" class="preload btn btn-info"><i class="icon-plus22"></i>New</a>
              <button type="button"  id="savevocher" class="save btn bg-success"><i class="icon-floppy-disk position-left"></i> Save </button>
              <a id="" href="<?php echo base_url(); ?>" class="btn bg-danger"><i class="icon-close2"></i> Close</a>
              <!-- <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-download"></i> Import</a> -->
          </div>
      </div>
  </div>
<!-- <div class="panel panel-flat"> -->
<!-- content -->
</form>

<script type="text/javascript">
$(".bank").hide();
$("#chqq").hide();
$("#type_gl").change(function(e){
  var type = $("#type_gl").val();
  if (type == "cheque") {
$(".bank").show();
$("#chqq").show();
  }else if(type == "transfer"){
    $(".bank").show();
  }
  $("#type_gls").val(type);
$('#type_gl').attr("disabled", true);
});
  $("#savevocher").click(function(e){
    var smcr = parseFloat($("#camt").val());
    var smdr = parseFloat($("#damt").val());
     var url="<?php echo base_url(); ?>gl_active/selectdate";
        var dataSet={
        d: $("#vchdate").val(),
        y: $("#glyear").val(),
        m: $("#glperiod").val()
        };
      $.post(url,dataSet,function(data){
      if (data!="Y") {
        swal({
          title: "งวดบัญชีผิด กรุณาเลือกวันที่ใหม่ !!.",
          text: "",
          confirmButtonColor: "#EA1923",
          type: "error"
        });
      }else if(smdr != smcr){
        swal({
          title: "Credit and Debit Not Balance!",
          confirmButtonColor: "#FF0000",
        });
      }else if(smdr ==0){
        swal({
          title: "Credit and Debit Not Balance!",
          confirmButtonColor: "#FF0000",
        });
      }else if($("#vchdate").val()==""){
        swal({
            title: "กรุณาเลือกวันที่!!.",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
      }else{
             var frm = $('#formglpost');
            frm.submit(function (ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                            success: function (data) {

                              console.log(data);
                        swal({
                                  title: data,
                                  text: "Save Completed!!.",
                                  // confirmButtonColor: "#66BB6A",
                                  type: "success"
                              });
      
                        setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>ar/edit_journalvocher/"+data;
                        }, 100);
                       
                    }
                });
                ev.preventDefault();

            });
          $("#formglpost").submit(); //Submit  the FORM
      }
  });

    
        
      });
</script>

<!-- ikool009 -->
<div class="modal fade" id="costcode_controll" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="">เพิ่มรายการต้นทุน</h4>
      </div>
      <div class="modal-body">
        <div id="costcode_controll_content"></div>
      </div>
    </div>
  </div>
</div>
<!-- ikool009 -->

<div class="modal fade" id="bookn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sub Project</h4>
      </div>
      <div class="modal-body">
        <div id="modal_sub"></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="costcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>GL</h4>
      </div>
      <div class="modal-body">
        <div id="modal_costcode"></div>
      </div>
    </div>
  </div>
</div>

<div id="archive" class="modal fade" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Archive</h5>
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

<div class="modal fade" id="project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"GL</h4>
      </div>
      <div class="modal-body">
        <div id="projectmeka"></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="vendor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">GL</h4>
      </div>
      <div class="modal-body">
        <div id="vendormodel"></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="namecustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">GL</h4>
      </div>
      <div class="modal-body">
        <div id="namecusmodel"></div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="accnc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">GL</h4>
      </div>
      <div class="modal-body">
        <div id="acccode"></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="system" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">GL</h4>
      </div>
      <div class="modal-body">
        <div id="systemcn"></div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="openbank" data-backdrop="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Select Bank</h4>
                </div>
                  <div class="modal-body">
                  <div class="panel-body">
                      <div class="row" id="modal_bank">

                      </div>
                      </div>
                  </div>
              </div>
            </div>
          </div> 
<div class="modal fade" id="dpt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">GL</h4>
      </div>
      <div class="modal-body">
        <div id="departmentid"></div>
      </div>
    </div>
  </div>
</div>
<div id="modalbank"></div>
        <div id="modalaccountcode"></div>
        <div id="modalproj"></div>
        <div id="modalj"></div>
        <div id="modaldepart"></div>
        <div id="modalvender"></div>
        <div id="modalcustomer"></div>
<script type="text/javascript">
  //cut bg
  function cut_bg(el){
    alert("กด");
      // alert(el);
  }
  //cut bg
</script>
<script>
  $("#amount").keyup(function(event) {
    var am = parseFloat($("#amount").val());
    var per = parseFloat($("#percent").val());
    var sumper = (am*per)/100;
    $("#taxamount").val(sumper);
  });
</script>

<script>   
    $("#taxx").change(function(event) {
      if ($("#taxx").val()=='wt') {
        $("#hites").val('wt');
      }
    });
</script>
<script type="text/javascript">
  $(".openacc").click(function(){
      //alert(555)
        // var row = $(this).attr("row");
        //alert(555)
        // $('#acc'+row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        // $("#acc"+row).load('<?php echo base_url(); ?>index.php/share/accchart/'+row);
      });
</script>

<!-- ikool009 -->

<script type="text/javascript">
    function set_data_el(el){
       var cost_code = el.attr("cost_code");
       var row = el.attr("row");
       var boq_id = el.attr("boq_id");
       var tender_id = el.attr("tender_id");
       var total_bg = el.attr("total"); 
       //alert(row);
       $(".costcodetext"+row).val(cost_code);
       $("#boq_id"+row).val(boq_id);
       $("#bd_tender"+row).val(tender_id);
       $("#Budget"+row).html('<input type="text" boq_id="'+boq_id+'" style="width: 100px;" readonly class="form-control boq_id'+boq_id+'" id="bg_controll'+row+'"/>');
       $("#dr"+row).attr("boq_id",boq_id);
       $("#dr"+row).attr("onkeyup","cut_bg($(this))");
       $("#bg_controll"+row).val(total_bg);
        //alert(cost_code);

    }
</script>
<!-- ikool009 -->

<!-- ikool009 -->
<script type="text/javascript">
    function get_modal_costcode(bd_tenid,system_code,content_modal,row){

      //alert(content_modal);
      var url_get_modal = "<?=base_url()?>gl/get_modal_costcode";
         $.post(url_get_modal, {bd_tenid: bd_tenid ,system_code:system_code,row:row}, function() {
           
         }).done(function(data){

            content_modal.html(data);

         });
    }
</script>
<!-- ikool009 -->

<!-- ikool009 -->
<script type="text/javascript">
    function click_show_modal(el){
      //alert(555)

          var bd_tenid = el.attr("bd_tenid");
          var system = el.attr("system");
          var row = el.attr("row");
         
          get_modal_costcode(bd_tenid,system,$("#costcode_controll_content"),row);
    }
</script>
<!-- ikool009 -->

<!-- ikool009 -->
<script type="text/javascript">
    var hide_Budget = 0;
    // $(".Budget").hide();

    // function_ice ikoool009
    function get_Budget_by_project(proj_id = null,system_code = null , row){

        


       var my_costcode_not_controll =  ''+
              '<div class="input-group">'+
                '<input type="text" style="width: 100px;"  class="form-control" readonly="readonly" placeholder="Costcode" value="" name="costcode[]" id="costcodetext'+row+'">'+

                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#opencost'+row+'"  class="opencost btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '';

      
        if(proj_id != null && system_code != null && system_code != ""){
          var url_ajax = "<?=base_url()?>gl/get_tenid_by_project";

          $.post(url_ajax, {project_id: proj_id , system_code:system_code }, function() {
            
          }).done(function(data){
            var json = jQuery.parseJSON(data);

              try{
               
                  if(json[0].controlbg == 2){
                      
                                          
                       var my_modal_costcode = ''+
                        '<div class="input-group" id="control_cost"'+row+'">'+
                          '<input type="text" style="width: 100px;"  class="form-control costcodetext'+row+'" readonly="readonly" placeholder="Costcode controll" value="" name="costcode[]" id="costcodetext'+row+'">'+

                          '<div class="input-group-btn">'+
                            '<button type="button" bd_tenid="'+json[0].bd_tenid+'"  system="'+system_code+'" data-toggle="modal" data-target="#costcode_controll" onclick="click_show_modal($(this))" row="'+row+'"  class="opencost btn btn-default btn-icon" ><i class="icon-search4"></i></button>'+
                          '</div>'+
                        '</div>'+
                      '';


                      
                      $("#origin"+row).remove();
                      $("#Costcode"+row).html(my_modal_costcode);
                      $("#Costcode"+row).show();

                    

                  }else{
                    $("#Costcode"+row).remove();
                    $("#origin"+row).show();
                 
                  }
              }catch(e){

              }              
          
          });
          
        }
       
        


       
    }

</script>
<!-- ikool009 -->




<script>   
    $("#taxdes").change(function(event) {
      if ($("#taxdes").val()==0) {
        $("#percent").val(0);
      }else if($("#taxdes").val()==1){
         $("#percent").val(3);
      }else if($("#taxdes").val()==2){
         $("#percent").val(1);
      }else if($("#taxdes").val()==3){
         $("#percent").val(5);
         $("#taxtype").val(3);
      }else if($("#taxdes").val()==4){
         $("#percent").val(2);
      }

    var vat = $("#percent").val();
    var amount = $("#amount").val();
    var vvvv = vat*amount/100;
    var xxxx = vvvv.toFixed(2);
     $("#taxamount").val(xxxx);  
    });
</script>
<script type="text/javascript">
  //ikool009
  function openacc(el){
      
          var row = el.attr("row");
          //alert(555)
          $('#acc'+row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#acc"+row).load('<?php echo base_url(); ?>index.php/share/accchart/'+row);
  }
  //ikool009
</script>


<script>
    $("#vchdate").change(function(event) {
    var de_date = $("#vchdate").val();
    var y = de_date.slice(0,4); 
    var m = de_date.slice(5,7);

    $("#glperiod").val(m);
    $("#glyear").val(y);         

    }); 
            
  $(".insrows").click(function(){
    if ($("#bookcode").val()==0) {
        swal({
            title: "กรุณาเลือก Book Account !!.",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
      }else{
        addrow();


      }


         $(".openacc").click(function(){
        
        });
    
    
  });



   function addrow(){
            var row = ($('#body tr').length-1)+1;
        var tr = '<tr>'+
            '<td>'+row+'<input type="hidden" value="'+row+'" id="chki'+row+'" name="chki[]"></td>'+
            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 150px;"  class="form-control" readonly="readonly" placeholder="Account Name" value="" name="acc_name[]" id="act_name'+row+'">'+
                '<input _ice_ type="hidden" readonly="true" value="" class="form-control input-sm" name="acc_code[]" id="acc_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#openacc'+row+'" row="'+row+'" onclick="openacc($(this))"  class="openacc btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //account code
            '<td >'+
              '<div class="input-group" id="origin'+row+'">'+
                '<input type="text" style="width: 100px;"  class="form-control" readonly="readonly" placeholder="Costcode" value="" name="costcode[]" id="costcodetext'+row+'">'+

                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#opencost'+row+'"  class="opencost btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
              '<div id="Costcode'+row+'"></div>'+

            '</td>'+
            //costcode

            '<td>'+
              '<input type="text" style="width: 100px;" value="0"  class="form-control" value="" name="dr[]" id="dr'+row+'" ac="#cr'+row+'">'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 100px;" value="0" class="form-control" value="" name="cr[]" id="cr'+row+'" ac="#dr'+row+'">'+
            '</td>'+
            '<td>'+
            '<a id="delete'+row+'" onclick="delete_row('+row+',$(this),'+row+')" class="noty-runner" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a>'+
            '</td>'+
            '</tr>';
            $('#body').append(tr);
                    

            var modalaccount = '<div class="modal fade" id="openacc'+row+'" data-backdrop="false">'+
              " <div class='modal-dialog modal-lg'>"+
                "<div class='modal-content'>"+
                "<div class='modal-header'>"+
                "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
                "<h5 class='modal-title'>Book Account</h5>"+
                "</div>"+
                "<div class='modal-body'>"+
                '<div id="acc'+row+'">'+

                "</div>"+
              '</div>';
            $("#modalaccountcode").append(modalaccount);

            var modalbank = '<div class="modal fade" id="opencost'+row+'" data-backdrop="false">'+
              '<div class="modal-dialog modal-lg">'+
                  '<div class="modal-content">'+
                '<div class="row">'+
                    '<div id="tabbank" class="col-md-6">'+
                        '<h4 id="hbank">รายการประเภทต้นทุน 1</h4>'+
                        '<select multiple class="form-control" id="cost1'+row+'" style="height:200px;">'+
                        '</select>'+
                    '</div>'+
                    '<div id="tabcost2" class="col-md-6">'+
                    '<h4>รายการประเภทต้นทุน 2</h4>'+
                        '<select multiple class="form-control" id="cost2'+row+'" style="height:200px;"></select>'+
                    '</div>'+
                    '<div id="tabcost3" class="col-md-12">'+
                        '<h4>รายการประเภทต้นทุน 3</h4>'+
                        '<select multiple class="form-control" id="cost3'+row+'" style="height:200px;">'+
                          '</select>'+
                    '</div>'+
                    '<div id="tabcost4" class="col-md-12">'+
                        '<input type="text" class="form-control input-sm" readonly name="costcodetext" id="costcodetext'+row+'">'+
                    '</div>'+
                '</div>'+
                '<br>'+
                '<div class="modal-footer">'+
                  '<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>'+
                  '<button type="button" id="select'+row+'" class="btn btn-primary" data-dismiss="modal">SELECT</button>'+
                '</div>'+
                  '</div>'+
                '</div>'+
              '</div>';
            $("#modalbank").append(modalbank);

          var damt = 0;
          var camt = 0;



          $("input[id^='dr'] , input[id^='cr']").keyup(function(event) {
              
             
            var el_ac = $(this).attr('ac');
              $(el_ac).val(0);
            
              damt = 0;

              $("input[id^='dr']").each(function(index, el) {


                
                 damt = damt + $(el).val().replace(/,/g,"")*1; 
              });
              $("#damt").val(numberWithCommas(damt));

              camt = 0;

              $("input[id^='cr']").each(function(index, el) {
                
                 camt = camt + $(el).val().replace(/,/g,"")*1; 
              });
            $("#camt").val(numberWithCommas(camt));
          });

          $(".opencost").click(function(event) {

          // alert("fff");
          $('#cost1'+row).load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
          $( "#cost1"+row ).change(function() {

            var c1 = $('#cost1'+row).val();
            $('#cost2'+row).load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
            $("#tabcost2"+row).show();
            $("#costcodetext"+row).val(c1);
            $('#cost3'+row).html('');
          });
        
          $( "#cost2"+row ).change(function() {
          var c1 = $('#cost1'+row).val();
           var c2 = $('#cost2'+row).val();
          var c3 = $('#cost3'+row).load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c1+'/'+c2);
            $("#costcodetext"+row).val(c1+c2);
          });

          $( "#cost3"+row).change(function() {
          var c1 = $('#cost1'+row).val();
          var c2 = $('#cost2'+row).val();
          var c3 = $('#cost3'+row).val();
           $("#costcodetext"+row).val(c1+c2+c3);
           $("#cost-control"+row).show();
          });
        });




        $(".books"+row).click(function(event) {
          $("#acc_code"+row).val($(this).data('bookcode'));
          $("#acc_name"+row).val($(this).data('bookname'));
          });

              va = 0;
              $("input[id^='dr']").each(function(index, el) {
                //$(el).val();
                
                 va = va + $(el).val()*1;
                
              });
            $("#damt").val(va);
            // load



  }// end function add row
  
      


       $(".book").click(function(){
         $('#modal_sub').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
         $("#modal_sub").load('<?php echo base_url(); ?>index.php/share/sub_project/'+<?php echo $pro; ?>);
      });

       $(".openbank").click(function(){
              $('#modal_bank').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
              $("#modal_bank").load('<?php echo base_url(); ?>index.php/share/bank');
            });
        </script>
