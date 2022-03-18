<div class="content">
  <div class="panel panel-white">
    <div class="panel-heading">
      <h2 class="panel-title"><b>Setup Approve Department : <?= $dp_id[0]->department_title ?></b></h2>
      <br>
      <div class="tabbable">
        <ul class="nav nav-tabs nav-tabs-solid nav-tabs-component">
          <li class="active"><a href="#solid-rounded-tab1" data-toggle="tab">PR</a></li>
          <li><a href="#solid-rounded-tab2" data-toggle="tab">PO</a></li>
          <li><a href="#solid-rounded-tab3" data-toggle="tab">WO</a></li>
          <li><a href="#solid-rounded-tab4" data-toggle="tab">PETTY CASH</a></li>
        </ul>
        <div class="tab-content">

          <div class="tab-pane active" id="solid-rounded-tab1">
          <div class="form-group">
            <h1>PR </h1>
            <h3><input type="checkbox" value="1" name="chkpj_prt" id="chkpj_prt">
            <input type="hidden" value="0" name="chkpj_pr" id="chkpj_pr">
            <b>Control</b>  <a class="addrow btn bg-info" id="insertpodetail1">Add Member</a></h3>
            <label class="radio-inline">
              <input type="radio" name="pr1" id="pr1" value="1">
              Approve ตามลำดับ
            </label>
            <label class="radio-inline">
              <input type="radio" name="pr1" id="pr2" value="2">
              Approve ตามวงเงิน
            </label>
            <input type="hidden" value="0" name="pr" id="pr">
          </div>

            <table class="table table-hover table-bordered table-striped table-xxs" id="res">
              <thead>
                <tr>
                  <th width="5%" style="text-align: center;">NO.</th>
                  <th width="5%" style="text-align: center;">Confirmation sequence</th>
                  <th width="5%" class="text-center">Member ID</th>
                  <th width="20%" style="text-align: center;">Member Name</th>
                  <th width="10%" class="text-center">Position</th>
                  <th width="10%" style="text-align: center;">Cost</th>
                  <th width="10%" style="text-align: center;">Lock</th>
                  <th width="10%" style="text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody id="body1">
              </tbody>
            </table>
            <br>
            <a type="button" class="btn bg-info" id="save_prr"><i class="icon-archive"></i> <span>Save</span></a>
          </div>
          
          <div class="tab-pane" id="solid-rounded-tab2">

          <div class="form-group">
            <h1>PO </h1>
            <h3><input type="checkbox" value="1" name="chkpj_prt" id="chkpj_prt">
            <input type="hidden" value="0" name="chkpj_pr" id="chkpj_pr">
            <b>Control</b>  <a class="addrow btn bg-info" id="insertpodetail2">Add Member</a></h3>
            <label class="radio-inline">
              <input type="radio" name="pr1" id="pr1" value="1">
              Approve ตามลำดับ
            </label>
            <label class="radio-inline">
              <input type="radio" name="pr1" id="pr2" value="2">
              Approve ตามวงเงิน
            </label>
            <input type="hidden" value="0" name="pr" id="pr">
          </div>


            <table class="table table-hover table-bordered table-striped table-xxs" id="res">
              <thead>
                <tr>
                  <th width="5%" style="text-align: center;">NO.</th>
                  <th width="5%" style="text-align: center;">Confirmation sequence</th>
                  <th width="5%" class="text-center">Member ID</th>
                  <th width="20%" style="text-align: center;">Member Name</th>
                  <th width="10%" class="text-center">Position</th>
                  <th width="10%" style="text-align: center;">Cost</th>
                  <th width="10%" style="text-align: center;">Lock</th>
                  <th width="10%" style="text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody id="body2">
                
                
              </tbody>
            </table>
            <br><a type="button" class="btn bg-info" id="save_poo"><i class="icon-archive"></i> <span>Save</span></a>
          </div>


          <div class="tab-pane" id="solid-rounded-tab3">

          <div class="form-group">
            <h1>WO </h1>
            <h3><input type="checkbox" value="1" name="chkpj_prt" id="chkpj_prt">
            <input type="hidden" value="0" name="chkpj_pr" id="chkpj_pr">
            <b>Control</b>  
            <a class="addrow btn bg-info" id="insertpodetail3">Add Member</a></h3>
            <label class="radio-inline">
              <input type="radio" name="pr1" id="pr1" value="1">
              Approve ตามลำดับ
            </label>
            <label class="radio-inline">
              <input type="radio" name="pr1" id="pr2" value="2">
              Approve ตามวงเงิน
            </label>
            <input type="hidden" value="0" name="pr" id="pr">
          </div>

            <table class="table table-hover table-bordered table-striped table-xxs" id="res">
              <thead>
                <tr>
                  <th width="5%" style="text-align: center;">NO.</th>
                  <th width="5%" style="text-align: center;">Confirmation sequence</th>
                  <th width="5%" class="text-center">Member ID</th>
                  <th width="20%" style="text-align: center;">Member Name</th>
                  <th width="10%" class="text-center">Position</th>
                  <th width="10%" style="text-align: center;">Cost</th>
                  <th width="10%" style="text-align: center;">Lock</th>
                  <th width="10%" style="text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody id="body2">
                
                
              </tbody>
            </table>
            <br><a type="button" class="btn bg-info" id="save_poo"><i class="icon-archive"></i> <span>Save</span></a>
          </div>
          
           <div class="tab-pane" id="solid-rounded-tab4">

            <div class="form-group">
              <h1>PETTY CASH </h1>
              <h3><input type="checkbox" value="1" name="chkpj_prt" id="chkpj_prt">
              <input type="hidden" value="0" name="chkpj_pr" id="chkpj_pr">
              <b>Control</b>  <a class="addrow btn bg-info" id="insertpodetail4">Add Member</a></h3>
              <label class="radio-inline">
                <input type="radio" name="pr1" id="pr1" value="1">
                Approve ตามลำดับ
              </label>
              <label class="radio-inline">
                <input type="radio" name="pr1" id="pr2" value="2">
                Approve ตามวงเงิน
              </label>
              <input type="hidden" value="0" name="pr" id="pr">
            </div>

            <table class="table table-hover table-bordered table-striped table-xxs" id="res">
              <thead>
                <tr>
                  <th width="5%" style="text-align: center;">NO.</th>
                  <th width="5%" style="text-align: center;">Confirmation sequence</th>
                  <th width="5%" class="text-center">Member ID</th>
                  <th width="20%" style="text-align: center;">Member Name</th>
                  <th width="10%" class="text-center">Position</th>
                  <th width="10%" style="text-align: center;">Cost</th>
                  <th width="10%" style="text-align: center;">Lock</th>
                  <th width="10%" style="text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody id="body2">
                
                
              </tbody>
            </table>
            <br><a type="button" class="btn bg-info" id="save_poo"><i class="icon-archive"></i> <span>Save</span></a>
          </div>
          
          
        </div>
      </div>
    </div>
  </div>
</div>
<div class="rowmat1"></div>
<div class="rowmat2"></div>
<div class="rowmat3"></div>
<div class="rowmat4"></div>
<script>
$("#insertpodetail1").click(function(){
   addrow1();

   

   $('#save_prr').show();
  });
   function addrow1()
            {        
              var row = ($('#body1 tr').length)-0+1;
              var tr = '<tr id="'+row+'">'+
            '<td class="text-center">'+row+'<input type="hidden" name="chkpr[]" value="X"></td>'+                           
             '<td><input type="text" class="form-control input-sm text-center" id="approve_sequence'+row+'" name="approve_sequence[]" value="'+row+'"></td>'+
             '<td><input type="text" class="form-control input-sm " id="approve_mid1'+row+'" name="approve_mid[]" value="" readonly></td>'+
             '<td>'+
             '<div class="input-group">'+
                  '<input type="text" name="approve_mname[]" id="approve_mname1'+row+'"  class="form-control input-xs" readonly>'+
                  '<span class="input-group-btn" >'+
                  '<button type="button" class="accopen btn btn-info btn-sm" id="approvem1'+row+'" data-toggle="modal" data-target="#approvemodal1'+row+'" ><i class="icon-search4"></i></button>'+
                  ' </span>'+
                 '</div>'+
                 '</td>'+
             '<td><input type="text" class="form-control input-sm" id="approve_position'+row+'" name="approve_position[]" value=""></td>'+
             '<td><input type="text" class="form-control input-sm text-right" id="approve_cost'+row+'" name="approve_cost[]" value=".00"></td>'+
             '<td style="text-align: center;"><input type="checkbox" class=" input-sm" id="approve_lock1'+row+'" name="approve_lock[]" value="1"><input type="hidden" name="lock1[]" id="lock1'+row+'" value="N"></td>'+
             // '<td style="text-align: center;"><input type="checkbox" name="sign[]" value="'+row+'"></td>'+
             '<td class="text-center">'+   
                '<a id="remove" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>'+
                 
            '</td>'+

                       '</tr>';


        
              $('#body1').append(tr);


$("#approve_lock1"+row+"").click(function(){
        if ($("#approve_lock1"+row+"").prop("checked")) {
            $("#lock1"+row+"").val("Y");
        }else{
            $("#lock1"+row+"").val("N");
        }

      });

$("#approve_cost"+row+"").keydown(function(){
var approve_costw = $("#approve_cost"+roww+"").val();
var approve_cost = $("#approve_cost"+row+"").val();
if(approve_costw<approve_cost){
$("#approve_cost"+row+"").val("0.00");
}

});
 var one = "1";
 var rowmat1 = ' <div id="approvemodal1'+row+'" class="modal fade">'+
            '<div class="modal-dialog modal-lg">'+
              '<div class="modal-content ">'+
                '<div class="modal-header bg-info">'+
                  '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                  '<h5 class="modal-title">เพิ่มรายการ</h5>'+
                '</div>'+
                  '<div class="modal-body">'+
                   '<div class="row" id="approvems1'+row+'">'+
                    '</div>'+
                  '</div>'+
              '</div>'+
            '</div>'+
            '</div>';

          $('#approvem1'+row).click(function(){
          $('#approvems1'+row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#approvems1"+row).load('<?php echo base_url(); ?>share/member/'+row+'/'+one);
 });
$('.rowmat1').append(rowmat1);


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
                    onClick: function ($save) {
                        $save.close();
                        save({
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

var timeoutID;

function delayedAlert() {
  timeoutID = window.setTimeout(refrshna, 1500);
}
  function refrshna(){
    $('#res').html("<img src='<?php echo base_url(); ?>index.php/assets/images/loading.gif'> Loading...");
    $("#res").load('<?php echo base_url(); ?>index.php/asset_active/getlesssetup/');
  }

 </script>

 <script>
$("#insertpodetail2").click(function(){
   addrow2();

  $("[name='sign[]']").click(function(){
      var val = $(this).val();
      var array = val.split(",");
      
      var status = $(this).prop( "checked");
      
      if(array.length < 4){
          alert("กรุณากดปุ่ม save ก่อน ถึงจะทำการยืนยันได้");
          $(this).prop( "checked" ,false);
      }else{
              send_sign(array , status);
      }
   });

   $('#save_poo').show();
  });
   function addrow2()
            {         
              var row = ($('#body2 tr').length)-0+1;
              var tr = '<tr id="'+row+'">'+
            '<td class="text-center">'+row+'<input type="hidden" name="chkpo[]" value="X"></td>'+                           
             '<td><input type="text" class="form-control input-sm text-center" id="approve_sequence'+row+'" name="approve_sequencepo[]" value="'+row+'"></td>'+
             '<td><input type="text" class="form-control input-sm " id="approve_mid2'+row+'" name="approve_midpo[]" value="" readonly></td>'+
             '<td>'+
             '<div class="input-group">'+
                  '<input type="text" name="approve_mnamepo[]" id="approve_mname2'+row+'"  class="form-control input-xs" readonly>'+
                  '<span class="input-group-btn" >'+
                  '<button type="button" class="accopen btn btn-info btn-sm" id="approvem2'+row+'" data-toggle="modal" data-target="#approvemodal2'+row+'" ><i class="icon-search4"></i></button>'+
                  ' </span>'+
                 '</div>'+
                 '</td>'+
             '<td><input type="text" class="form-control input-sm" id="approve_position'+row+'" name="approve_positionpo[]" value=""></td>'+
             '<td><input type="text" class="form-control input-sm text-right" id="approve_cost'+row+'" name="approve_costpo[]" value=".00"></td>'+
             '<td style="text-align: center;"><input type="checkbox" class=" input-sm" id="approve_lock2'+row+'" name="approve_lockpo[]" value="1"><input type="hidden" name="lock2po[]" id="lock2'+row+'" value="N"></td>'+
             // '<td style="text-align: center;"><input type="checkbox" name="sign[]" value="'+row+'"></td>'+
             '<td class="text-center">'+   
                '<a id="remove" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>'+
                 
            '</td>'+

                       '</tr>';


        
              $('#body2').append(tr);

$("#approve_lock2"+row+"").click(function(){
        if ($("#approve_lock2"+row+"").prop("checked")) {
            $("#lock2"+row+"").val("Y");
        }else{
            $("#lock2"+row+"").val("N");
        }

      });

$("#approve_cost"+row+"").keydown(function(){
var approve_costw = $("#approve_cost"+roww+"").val();
var approve_cost = $("#approve_cost"+row+"").val();
if(approve_costw<approve_cost){
$("#approve_cost"+row+"").val("0.00");
}

});
 var two = "2";
 var rowmat2 = ' <div id="approvemodal2'+row+'" class="modal fade">'+
            '<div class="modal-dialog modal-lg">'+
              '<div class="modal-content ">'+
                '<div class="modal-header bg-info">'+
                  '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                  '<h5 class="modal-title">เพิ่มรายการ</h5>'+
                '</div>'+
                  '<div class="modal-body">'+
                   '<div class="row" id="approvems2'+row+'">'+
                    '</div>'+
                  '</div>'+
              '</div>'+
            '</div>'+
            '</div>';

          $('#approvem2'+row).click(function(){
          $('#approvems2'+row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#approvems2"+row).load('<?php echo base_url(); ?>share/member/'+row+'/'+two);
 });
$('.rowmat2').append(rowmat2);


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
                    onClick: function ($save) {
                        $save.close();
                        save({
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

var timeoutID;

function delayedAlert() {
  timeoutID = window.setTimeout(refrshna, 1500);
}
  function refrshna(){
    $('#res').html("<img src='<?php echo base_url(); ?>index.php/assets/images/loading.gif'> Loading...");
    $("#res").load('<?php echo base_url(); ?>index.php/asset_active/getlesssetup/');
  }

 </script>

 <script>
$("#insertpodetail3").click(function(){
   addrow3();

   $("[name='sign[]']").click(function(){
      var val = $(this).val();
      var array = val.split(",");
      
      var status = $(this).prop( "checked");
      
      if(array.length < 4){
          alert("กรุณากดปุ่ม save ก่อน ถึงจะทำการยืนยันได้");
          $(this).prop( "checked" ,false);
      }else{
              send_sign(array , status);
      }
   });
   $('#save_woo').show();
  });
   function addrow3()
            {           
              var row = ($('#body3 tr').length)-0+1;
              var tr = '<tr id="'+row+'">'+
            '<td class="text-center">'+row+'<input type="hidden" name="chkwo[]" value="X"></td>'+                           
             '<td><input type="text" class="form-control input-sm text-center" id="approve_sequence'+row+'" name="approve_sequencewo[]" value="'+row+'"></td>'+
             '<td><input type="text" class="form-control input-sm " id="approve_mid3'+row+'" name="approve_midwo[]" value="" readonly></td>'+
             '<td>'+
             '<div class="input-group">'+
                  '<input type="text" name="approve_mnamewo[]" id="approve_mname3'+row+'"  class="form-control input-xs" readonly>'+
                  '<span class="input-group-btn" >'+
                  '<button type="button" class="accopen btn btn-info btn-sm" id="approvem3'+row+'" data-toggle="modal" data-target="#approvemodal3'+row+'" ><i class="icon-search4"></i></button>'+
                  ' </span>'+
                 '</div>'+
                 '</td>'+
             '<td><input type="text" class="form-control input-sm" id="approve_position'+row+'" name="approve_positionwo[]" value=""></td>'+
             '<td><input type="text" class="form-control input-sm text-right" id="approve_cost'+row+'" name="approve_costwo[]" value=".00"></td>'+
             '<td style="text-align: center;"><input type="checkbox" class="input-sm" id="approve_lock3'+row+'" name="approve_lockwo[]" value="1"><input type="hidden" name="lock3wo[]" id="lock3'+row+'" value="N"></td>'+
             // '<td style="text-align: center;"><input type="checkbox" name="sign[]" value="'+row+'"></td>'+
             '<td class="text-center">'+   
                '<a id="remove" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>'+
                 
            '</td>'+

                       '</tr>';


        
              $('#body3').append(tr);

$("#approve_lock3"+row+"").click(function(){
        if ($("#approve_lock3"+row+"").prop("checked")) {
            $("#lock3"+row+"").val("Y");
        }else{
            $("#lock3"+row+"").val("N");
        }

      });

$("#approve_cost"+row+"").keydown(function(){
var approve_costw = $("#approve_cost"+roww+"").val();
var approve_cost = $("#approve_cost"+row+"").val();
if(approve_costw<approve_cost){
$("#approve_cost"+row+"").val("0.00");
}

});
 var three = "3";
 var rowmat3 = ' <div id="approvemodal3'+row+'" class="modal fade">'+
            '<div class="modal-dialog modal-lg">'+
              '<div class="modal-content ">'+
                '<div class="modal-header bg-info">'+
                  '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                  '<h5 class="modal-title">เพิ่มรายการ</h5>'+
                '</div>'+
                  '<div class="modal-body">'+
                   '<div class="row" id="approvems3'+row+'">'+
                    '</div>'+
                  '</div>'+
              '</div>'+
            '</div>'+
            '</div>';

          $('#approvem3'+row).click(function(){
          $('#approvems3'+row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#approvems3"+row).load('<?php echo base_url(); ?>share/member/'+row+'/'+three);
 });
$('.rowmat3').append(rowmat3);


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
                    onClick: function ($save) {
                        $save.close();
                        save({
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

var timeoutID;

function delayedAlert() {
  timeoutID = window.setTimeout(refrshna, 1500);
}
  function refrshna(){
    $('#res').html("<img src='<?php echo base_url(); ?>index.php/assets/images/loading.gif'> Loading...");
    $("#res").load('<?php echo base_url(); ?>index.php/asset_active/getlesssetup/');
  }

 </script>



 <script>
$("#insertpodetail4").click(function(){
   addrow4();
   $("[name='sign[]']").click(function(){
      var val = $(this).val();
      var array = val.split(",");
      
      var status = $(this).prop( "checked");
      
      if(array.length < 4){
          alert("กรุณากดปุ่ม save ก่อน ถึงจะทำการยืนยันได้");
          $(this).prop( "checked" ,false);
      }else{
              send_sign(array , status);
      }
   });

   $('#save_pcc').show();
  });
   function addrow4()
            {        
              var row = ($('#body4 tr').length)-0+1;
              var tr = '<tr id="'+row+'">'+
            '<td class="text-center">'+row+'<input type="hidden" name="chkpc[]" value="X"></td>'+                           
             '<td><input type="text" class="form-control input-sm text-center" id="approve_sequence'+row+'" name="approve_sequencepc[]" value="'+row+'"></td>'+
             '<td><input type="text" class="form-control input-sm " id="approve_mid4'+row+'" name="approve_midpc[]" value="" readonly></td>'+
             '<td>'+
             '<div class="input-group">'+
                  '<input type="text" name="approve_mnamepc[]" id="approve_mname4'+row+'"  class="form-control input-xs" readonly>'+
                  '<span class="input-group-btn" >'+
                  '<button type="button" class="accopen btn btn-info btn-sm" id="approvem4'+row+'" data-toggle="modal" data-target="#approvemodal4'+row+'" ><i class="icon-search4"></i></button>'+
                  ' </span>'+
                 '</div>'+
                 '</td>'+
             '<td><input type="text" class="form-control input-sm" id="approve_position'+row+'" name="approve_positionpc[]" value=""></td>'+
             '<td><input type="text" class="form-control input-sm text-right" id="approve_cost'+row+'" name="approve_costpc[]" value=".00"></td>'+
             '<td style="text-align: center;"><input type="checkbox" class="input-sm" id="approve_lock4'+row+'" name="approve_lockpc[]" value="1"><input type="hidden" name="lock4pc[]" id="lock4'+row+'" value="N"></td>'+
             // '<td style="text-align: center;"><input type="checkbox" name="sign[]" value="'+row+'"></td>'+
             '<td class="text-center">'+   
                '<a id="remove" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>'+
                 
            '</td>'+

                       '</tr>';


        
              $('#body4').append(tr);

      $("#approve_lock4"+row+"").click(function(){
        if ($("#approve_lock4"+row+"").prop("checked")) {
            $("#lock4"+row+"").val("Y");
        }else{
            $("#lock4"+row+"").val("N");
        }

      });


$("#approve_cost"+row+"").keydown(function(){
var approve_costw = $("#approve_cost"+roww+"").val();
var approve_cost = $("#approve_cost"+row+"").val();
if(approve_costw<approve_cost){
$("#approve_cost"+row+"").val("0.00");
}

});
 var f = "4";
 var rowmat3 = ' <div id="approvemodal4'+row+'" class="modal fade">'+
            '<div class="modal-dialog modal-lg">'+
              '<div class="modal-content ">'+
                '<div class="modal-header bg-info">'+
                  '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                  '<h5 class="modal-title">เพิ่มรายการ</h5>'+
                '</div>'+
                  '<div class="modal-body">'+
                   '<div class="row" id="approvems4'+row+'">'+
                    '</div>'+
                  '</div>'+
              '</div>'+
            '</div>'+
            '</div>';

          $('#approvem4'+row).click(function(){
          $('#approvems4'+row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#approvems4"+row).load('<?php echo base_url(); ?>share/member/'+row+'/'+f);
 });
$('.rowmat3').append(rowmat3);


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
                    onClick: function ($save) {
                        $save.close();
                        save({
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

var timeoutID;

function delayedAlert() {
  timeoutID = window.setTimeout(refrshna, 1500);
}
  function refrshna(){
    $('#res').html("<img src='<?php echo base_url(); ?>index.php/assets/images/loading.gif'> Loading...");
    $("#res").load('<?php echo base_url(); ?>index.php/asset_active/getlesssetup/');
  }

 </script>


 <script>
   $("#save_prr").click(function(e){

          var frm = $('#save_pr');
            frm.submit(function (ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                            success: function (data) {


                        swal({
                                  title: "PR Setup Aprove"+data,
                                  text: "Save Completed!!.",
                                  // confirmButtonColor: "#66BB6A",
                                  type: "success"
                              });
                         setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>data_master/approve_prpo/"+data;
                        }, 500);
                    }
                });
                ev.preventDefault();

            });
   $("#save_pr").submit(); //Submit  the FORM

});
 </script>

 <script>
   $("#save_poo").click(function(e){

          var frm = $('#save_po');
            frm.submit(function (ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                            success: function (data) {
                        swal({
                                  title: "PO Setup Aprove"+data,
                                  text: "Save Completed!!.",
                                  // confirmButtonColor: "#66BB6A",
                                  type: "success"
                              });
                         setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>data_master/approve_prpo/"+data;
                        }, 500);
                    }
                });
                ev.preventDefault();

            });
   $("#save_po").submit(); //Submit  the FORM

});
 </script>

 <script>
   $("#save_woo").click(function(e){

          var frm = $('#save_wo');
            frm.submit(function (ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                            success: function (data) {
                        swal({
                                  title: "WO Setup Aprove"+data,
                                  text: "Save Completed!!.",
                                  // confirmButtonColor: "#66BB6A",
                                  type: "success"
                              });
                         setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>data_master/approve_prpo/"+data;
                        }, 500);
                    }
                });
                ev.preventDefault();

            });
   $("#save_wo").submit(); //Submit  the FORM

});
 </script>

 <script>
   $("#save_pcc").click(function(e){

          var frm = $('#save_pc');
            frm.submit(function (ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                            success: function (data) {
                        swal({
                                  title: "PETTY CASH Setup Aprove"+data,
                                  text: "Save Completed!!.",
                                  // confirmButtonColor: "#66BB6A",
                                  type: "success"
                              });
                         setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>data_master/approve_prpo/"+data;
                        }, 500);
                    }
                });
                ev.preventDefault();

            });
   $("#save_pc").submit(); //Submit  the FORM

});
 </script>
 <script type="text/javascript">
   $("[name='sign[]']").click(function(){
      var val = $(this).val();
      var array = val.split(",");
      
      var status = $(this).prop( "checked");
      
      if(array.length < 4){
          alert("กรุณากดปุ่ม save ก่อน ถึงจะทำการยืนยันได้");
          $(this).prop( "checked" ,false);
      }else{
              send_sign(array , status);
      }
   });

   function send_sign(array_info , status){
      //alert(5555)
      var url = "<?=base_url()?>datastore_active/update_sign";

      $.post(url, {array: array_info,status:status}, function() {
        
      }).done(function(data){
          alert(data);
          
      });
       
   }
 </script>

