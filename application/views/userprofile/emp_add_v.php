<style type="text/css">
#insForm .has-error .control-label,
#insForm .has-error .help-block,
#insForm .has-error .form-control-feedback {
    color: #f39c12;
}

#insForm .has-success .control-label,
#insForm .has-success .help-block,
#insForm .has-success .form-control-feedback {
    color: #18bc9c;
}
.borderless td, .borderless th {
    border: none;
}
</style>
<div class="content">
  <?php
$mem  = $this->db->query("select * from  member where m_position !='3' and m_position !='4'")->result();
   foreach ($prof as $key => $value) {?>
    <div class="panel panel-flat">
    <div class="panel-heading">
    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
    <div class="panel-body">
      <legend><h4><i class="fa fa-user-plus" aria-hidden="true"></i> Employee Information </h4></legend>
        <ul class="nav nav-tabs nav-tabs-highlight">
 
    <li id="lihome" class="active"><a data-toggle="tab" href="#home" class="glyphicon glyphicon-user">  ข้อมูลส่วนตัว</a></li>
    <li id="limenu1"><a data-toggle="tab" href="#menu1" class="fa fa-flag-o">  ที่อยู่และบุคคลติดต่อได้</a></li>
    <li><a data-toggle="tab" href="#menu2" class="fa fa-graduation-cap">ประวัติ</a></li>
    <li><a data-toggle="tab" href="#menu3" class="glyphicon glyphicon-list-alt">  ทักษะและความสามารถ</a></li>
    <li><a data-toggle="tab" href="#menu4" class="fa fa-group">  ภายในองค์กร</a></li>
  </ul>
<form id="insForm" action="<?php echo base_url(); ?>emp_profile/add_profile" method="post">
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <div class="row">
          <div class="col-xs-3">
            <label>คำนำหน้า</label>
            <select class="form-control input-sm" name="emp_title" id="emp_title" onchange="runsex()">
            <option value="0">--ระบุ--</option>
            <option value="1">นาย</option>
            <option value="2">นาง</option>
            <option value="3">นางสาว</option>
            </select>
           </div>
          <div class="col-xs-3">
            <div id="rmsc" class="form-group has-feedback">
              <label>ชื่อ</label>
              <input type="text" class="form-control" placeholder="ชื่อภาษาไทย" id="emp_name_t" required="required" name="emp_name_t" >
              <!-- <span id="sp1" class="glyphicon glyphicon-remove form-control-feedback"></span> -->
            </div>
          </div>
          <div class="col-xs-3">
            <div id="rmsc2" class="has-feedback">
              <label>นามสกุล</label>
              <input type="text" class="form-control" placeholder="นามสกุลภาษาไทย" id="emp_lastname_t" required="required" name="emp_lastname_t">
              <span id="sp2" class="form-control-feedback"></span>
            </div>
          </div>
          <div class="col-xs-1">
             <label>ชื่อเล่น</label>
             <input type="text" class="form-control input-sm" placeholder="ชื่อเล่น" id="emp_nickname"  name="emp_nickname">
          </div>
          <div class="col-xs-2">
            <label>เพศ</label><br>
            <label class="radio-inline">
            <input type="radio" id="sex" name="sex" value="1">ชาย</label>
            <label class="radio-inline">
            <input type="radio" id="sex" name="sex" value="2">หญิง</label>

          </div>
        </div>
            <br>
        <div class="row">
          <div class="col-xs-3">
             <label>คำนำหน้า</label>
             <select class="form-control input-sm" name="emp_title_e" id="emp_title_e">
               <option value="0">---Choose---</option>
               <option value="1">Mr.</option>
               <option value="2">Mrs.</option>
               <option value="3">Ms.</option>
             </select>
          </div>
           <div class="col-xs-3">
             <div id="fn" class="has-feedback">
               <label>First Name</label>&nbsp;&nbsp;&nbsp;<label id="war1" class="hidden"><font color="red">**ภาษาอังกฤษเท่านั้น </font></label>
               <input type="text" class="form-control"  placeholder="First Name" id="emp_name_e" required="required" name="emp_name_e">
               <span id="sp3" class=" form-control-feedback"></span>
             </div>
           </div>
           <div class="col-xs-3">
             <div id="fn2" class="has-feedback">
              <label>Lastname</label>&nbsp;&nbsp;&nbsp;<label id="war2" class="hidden"><font color="red">**ภาษาอังกฤษเท่านั้น </font></label>
              <input type="text" class="form-control" placeholder="Enter Employee Lastname" id="emp_lastname_e" required="required" name="emp_lastname_e">
              <span id="sp4" class=" form-control-feedback"></span>
            </div>
          </div>
          <div class="col-xs-3">
          <div id="idcity" class="has-feedback">
            <label>บัตรประชาชน</label><label id="wartext" class="hidden"><font color="red">**ตัวเลข 13 หลักเท่านั้น**</font></label>
            <input maxlength="13" type="text" onkeypress="checkkey(event)" class="form-control input-sm" placeholder="กรอกบัตรประชาชน" id="emp_idcityzen" required="required" name="emp_idcityzen">
              <div class="form-control-feedback">
                <i id="chspin" class="hidden icon-spinner2 spinner"></i>
                <span id="sp5" class=" form-control-feedback"></span>
              </div>
          </div>
        </div>
        </div>
<br>

      <div class="row">
        
        <div class="col-xs-3">
          <label>เบอร์โทรศัพท์</label>
          <input type="text" maxlength="10" class="form-control input-sm" placeholder="เบอร์โทรศัพท์" id="emp_tele" name="emp_tele">
        </div>
        <div class="col-xs-3">
          <label>E-mail</label>
          <input type="text" class="form-control input-sm" placeholder="xxxxx@example.com" id="emp_email" name="emp_email">
        </div>

        <div class="col-xs-3">
        <label>วันเกิด</label>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='date' class="form-control"  id="emp_birthdate" name="emp_birthdate"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-xs-3">
          <label>สถานะ</label>
          <select class="form-control input-sm" name="emp_status" id="emp_status">
          <option>---ระบุ---</option>
            <?php if($emp_status == '1'){ ?><option value="สมรส" selected>สมรม</option><?php } else { ?><option value="สมรส">สมรส</option><?php }?>
            <?php if($emp_status== '2'){ ?><option value="โสด" selected>โสด</option><?php } else { ?><option value="โสด">โสด</option><?php }?>
            <?php if($emp_status == '3'){ ?><option value="หย่า" selected>หย่า</option><?php } else { ?><option value="หย่า">หย่า</option><?php }?>
          </select>
        </div>
      </div>
      <div class="row">    
        <div class="col-xs-3">
          <label>ส่วนสูง</label>
          <input type="text" class="form-control input-sm" placeholder="ส่วนสูง" id="emp_height"  name="emp_height">
        </div>

        <div class="col-xs-3">
          <label>น้ำหนัก</label>
          <input type="text" class="form-control input-sm" placeholder="น้ำหนัก" id="emp_weight" name="emp_weight">
        </div>

        <div class="col-xs-3">
          <label>เชื้อชาติ</label>
          <input type="text" class="form-control input-sm" placeholder="กรอกเชื้อชาติ" id="emp_race" name="emp_race">
        </div>

        <div class="col-xs-3">
          <label>สัญชาติ</label>
          <input type="text" class="form-control input-sm" placeholder="กรอกสัญชาติ" id="emp_nation" name="emp_nation">
        </div>
      </div> 
      <br>
      <div class="row">      
        <div class="col-xs-3">
          <label>ศาสนา</label>
          <input type="text" class="form-control input-sm" placeholder="กรอกศาสนา" id="emp_religion" name="emp_religion">
        </div>
        <div class="col-xs-3">
          <label>จำนวนบุตร</label>
          <input type="text" class="form-control input-sm" placeholder="กรอกจำนวน" id="emp_child" name="emp_child">
        </div>
        
        <div class="col-xs-3">
          <label>จำนวนพี่น้อง</label>
          <input type="text" class="form-control input-sm" placeholder="กรอกจำนวน" id="emp_brosis" name="emp_brosis">
        </div>
        <div class="col-xs-3">
          <label>เป็นบุตรคนที่</label>
          <input type="text" class="form-control input-sm" placeholder="กรอกลำดับ" id="emp_cno" name="emp_cno">
        </div>
      </div>
    </div>


<script>
var rabu;
$('#ccode').keypress(function(event) {

if ((event.charCode >= 48 && event.charCode <= 57) ) {
var a = $('#ccode').val();
rabu = "1" ;
if($('#chid').hasClass('has-error')) {
$('#chid').removeClass('has-error');
}
}
else{
rabu="2"
if($('#chid').hasClass('has-success')) {
$('#chid').removeClass('has-success');
}
}
switch (rabu) {
case "1":
$('#chid').addClass('has-success');
$('#spid').removeClass('glyphicon glyphicon-remove').addClass('glyphicon glyphicon-ok');
break;
case "2":
$('#chid').addClass('has-error');
$('#spid').removeClass('glyphicon glyphicon-ok').addClass('glyphicon glyphicon-remove');
break;
default:
alert('3');
break;
}
});
</script>
<script>
  var rabu2;
$('#emp_name_t').keypress(function(event) {
        if (event.charCode >= 32  && event.charCode <= 160)  {
              rabu2 = "2" ;
      }else{
          rabu2 ="1" ;
        }
                switch (rabu2) {
                  case "1":
                   // alert('head 1');
                   $('#rmsc').addClass('has-success');
                   $('#sp1').removeClass('glyphicon glyphicon-remove').addClass('glyphicon glyphicon-ok');
                   if($('#rmsc').hasClass('has-error')) {
                            $('#rmsc').removeClass('has-error');
              }
                    break;

                    case "2":
                    $('#rmsc').addClass('has-error');
                    $('#sp1').removeClass('glyphicon glyphicon-ok').addClass('glyphicon glyphicon-remove');
                    if($('#rmsc').hasClass('has-success')) {
                $('#rmsc').removeClass('has-success');

              }
                    break;

                  default:
                    alert('3');
                    break;
                 }
              });
</script>
             <script>

  var rabu2;
$('#emp_lastname_t').keypress(function(event) {
        if (event.charCode >= 32  && event.charCode <= 160)  {
              rabu2 = "2" ;

      }else{
          rabu2 ="1" ;
        }
                switch (rabu2) {
                  case "1":
                   // alert('head 1');
                   $('#rmsc2').addClass('has-success');
                   $('#sp2').removeClass('glyphicon glyphicon-remove').addClass('glyphicon glyphicon-ok');
                   if($('#rmsc2').hasClass('has-error')) {
                            $('#rmsc2').removeClass('has-error');

              }
                    break;

                    case "2":
                    $('#rmsc2').addClass('has-error');
                    $('#sp2').removeClass('glyphicon glyphicon-ok').addClass('glyphicon glyphicon-remove');
                    if($('#rmsc2').hasClass('has-success')) {
                $('#rmsc2').removeClass('has-success');

              }
                    break;

                  default:
                    alert('3');
                    break;
                 }
              });
</script>

             <script>


  var rabu3;
$('#emp_name_e').keypress(function(event) {
        if ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))  {
              rabu3 = "1" ;


      }

      else{
          rabu3 ="2" ;

        }
                switch (rabu3) {
                  case "1":

                   $('#fn').addClass('has-success');
                   $('#sp3').removeClass('glyphicon glyphicon-remove').addClass('glyphicon glyphicon-ok');
                      if($('#fn').hasClass('has-error')||$('#war1').hasClass('hidden') ) {
                            $('#fn').removeClass('has-error');
                            $('#war1').addClass('hidden') ;


              }
                    break;

                    case "2":
                    $('#fn').addClass('has-error');
                    $('#sp3').removeClass('glyphicon glyphicon-ok').addClass('glyphicon glyphicon-remove');
                    if($('#fn').hasClass('has-success')) {
                $('#fn').removeClass('has-success');
                $('#war1').removeClass('hidden') ;

              }
                    break;

                  default:
                    alert('3');
                    break;
                 }
              });
</script>




<script>
function runsex() {


var aa = $("#emp_title").val();

 if(aa=="1"){

   $("#lsex").text("เพศ : ชาย")
 }else if(aa=="2" || aa=="3"){

$("#lsex").text("เพศ : หญิง ")

 }
 }

</script>

             <script>


  var rabu3;
$('#emp_lastname_e').keypress(function(event) {

        if ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))  {

              rabu3 = "1" ;
      }
      else{
          rabu3 ="2" ;
        }
                switch (rabu3) {
                  case "1":
                   $('#fn2').addClass('has-success');
                   $('#sp4').removeClass('glyphicon glyphicon-remove').addClass('glyphicon glyphicon-ok');
                      if($('#fn2').hasClass('has-error')||$('#war1').hasClass('hidden') ) {
                            $('#fn2').removeClass('has-error');
                            $('#war2').addClass('hidden') ;
              }
                    break;
                    case "2":
                    $('#fn2').addClass('has-error');
                    $('#sp4').removeClass('glyphicon glyphicon-ok').addClass('glyphicon glyphicon-remove');
                    if($('#fn2').hasClass('has-success')) {
                $('#fn2').removeClass('has-success');
                $('#war2').removeClass('hidden') ;
              }
                    break;
                  default:
                    alert('3');
                    break;
                 }
              });
</script>

                  <script>
                  function checkkey(event){
                    var x = event.charCode;
                    var input = $('#emp_idcityzen');
                       var a = (input.val().length);
                       var b;
                    if(x >=48 && x <=57 && a==12){
                      b='1';
                    }
                   else if (a<12) {
                    b='2';
                   }
                   switch (b) {
                     case '1':
                       $('#chspin').addClass('hidden');
                       $('#idcity').removeClass('has-error').addClass('has-success');
                       $('#sp5').addClass('glyphicon glyphicon-ok');
                       $('#wartext').addClass('hidden');
                       break;
                       case '2':
                       if ($('#sp5').hasClass('glyphicon glyphicon-ok')) {
                         $('#sp5').removeClass('glyphicon glyphicon-ok');
                          $('#idcity').removeClass('has-success');
                          $('#wartext').removeClass('hidden');
                       }else{
                        $('#chspin').removeClass('hidden');
                       $('#idcity').addClass('has-error');
                       }
                       break;
                     default:
                       break;
                   }
                 }
           </script>
      <div id="menu1" class="tab-pane fade">
        <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label for="comment">ที่อยู่ปัจจุบัน</label>
                <textarea class="form-control" rows="3" id="emp_address_now" name="emp_address_now"></textarea>
              </div>
            </div>

          <div class="col-xs-6">
            <div class="form-group">
              <label for="comment">ที่อยู่ตามทะเบียนบ้าน</label>
              <textarea class="form-control" rows="3" id="emp_address_book" name="emp_address_book"></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <h3>บุคคลที่สามารถติดต่อได้(กรณีฉุกเฉิน)</h3>
            <div class="col-xs-3">
              <label>ชื่อ  -  สกุล</label>
              <input type="text" class="form-control input-sm" placeholder="กรอกชื่อและสกุล" id="emp_cflname" name="emp_cflname">
            </div>
            <div class="col-xs-2">
              <label>อาชีพ</label>
              <input type="text" class="form-control input-sm" placeholder="กรอกอาชีพ" id="emp_cjob" name="emp_cjob">
            </div>
            <div class="col-xs-2">
              <label>เกี่ยวของเป็น</label>
              <input type="text" class="form-control input-sm" placeholder="ระบุความสัมพันธ์" id="emp_crela" name="emp_crela">
            </div>
            <div class="col-xs-3">
              <label>สถานที่ทำงาน</label>
              <input type="text" class="form-control input-sm" placeholder="กรอกสถานที่" id="emp_cplace" name="emp_cplace">
            </div>
            <div class="col-xs-2">
              <label>เบอร์โทรศัพท์</label>
              <input type="text" class="form-control input-sm" placeholder="เบอร์โทรศัพท์" id="emp_ctele" name="emp_ctele">
            </div>
          </div>
      </div>


<div id="menu2" class="tab-pane fade">
  <div class="col-md-12">
    <h3>ประวัติการศึกษา</h3>
      <table class="table table-bordered table-xxs table-hover">
        <thead>
          <tr>
            <td>#</td>
            <td>ระดับการศึกษา</td>
            <td>ชื่อสถานศึกษา</td>
            <td>สาขาวิชา</td>
            <td>ตั้งแต่ปี</td>
          </tr>
        </thead>
        <tbody id="body">
        
        </tbody>
      </table>
        <br>
        <a class="insrows pull-right btn btn-success"><i class="icon-plus2"></i>เพิ่ม</a>
  </div>
    <div id="modaledu">
    </div>   
    <div id="modaledu_ins">
    </div>                  
    <script>
      $(".insrows").click(function(){
        addrow();
      });
        function addrow(){
          var row = ($('#body tr').length-0)+1;
          var tr = '<tr>'+
          '<td>'+row+'<input type="hidden" name="chki[]" value="i"></td>'+
          '<td>'+
          '<div class="input-group">'+
          '<input type="text" class="form-control" readonly   name="groedu_name" id="groedu_name'+row+'">'+
          '<input type="hidden" name="groedu_code" id="groedu_code'+row+'">'+
          "<div class='input-group-btn'>"+
          '<a class="btn btn-default btn-icon" data-toggle="modal" data-target="#open_groedu'+row+'"><i class="icon-search4"></i></a>'+
          '</div>'+
          '</div>'+
          '</td>'+
          '<td>'+
          '<div class="input-group">'+
          '<input type="text" class="form-control" readonly   name="edu_name" id="edu_name'+row+'">'+
          '<input type="hidden" name="edu_code" id="edu_code'+row+'">'+
          "<div class='input-group-btn'>"+
          '<a class="btn btn-default btn-icon" data-toggle="modal" data-target="#open_edu'+row+'"><i class="icon-search4"></i></a>'+
          '</div>'+
          '</div>'+
          '</td>'+
          '<td>'+
          '<input type="text" name="edu_major" id="edu_major'+row+'" class="form-control">'+
          '</td>'+
          '<td>'+
          '<input type="text" name="edu_year" id="edu_year'+row+'" class="form-control">'+
          '</td>'+
          '</tr>';
          $('#body').append(tr);

      var modaleduu = '<div id="open_groedu'+row+'" class="modal fade" data-backdrop="false">'+
      " <div class='modal-dialog modal-lg'>"+
      "<div class='modal-content'>"+
      "<div class='modal-header'>"+
      "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
      "<h5 class='modal-title'>เลือกระดับการศึกษา</h5>"+
      "</div>"+
      "<div class='modal-body'>"+
      "<div>"+
      "<table class='table table-xxs table-hover datatable-basicxc' >"+
      "<thead>"+
      "<tr>"+
      "<th>รหัสระดับการศึกษา</th>"+
      "<th>ระดับการศึกษา</th>"+
      "<th>จัดการ</th>"+
      "</tr>"+
      "</thead>"+
      "<tbody>"+
      "<?php foreach ($edu as $val){ ?>"+
      "<tr>"+
      "<td><?php echo $val->groedu_code; ?></td>"+
      "<td><?php echo $val->groedu_name; ?></td>"+
      '<td><button class="openeducational'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-code="<?php echo $val->groedu_code; ?>" data-name="<?php echo $val->groedu_name; ?>" data-dismiss="modal">เลือก</button></td>'+
      "</tr>"+
      "<?php } ?>"+
      "</tbody>"+
      "</table>"+
      "</div>"+
      "</div>";
      $("#modaledu").append(modaleduu);

      var madaleduca = '<div id="open_edu'+row+'" class="modal fade" data-backdrop="false">'+
      " <div class='modal-dialog modal-lg'>"+
      "<div class='modal-content'>"+
      "<div class='modal-header'>"+
      "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
      "<h5 class='modal-title'>เลือกระดับการศึกษา</h5>"+
      "</div>"+
      "<div class='modal-body'>"+
      "<div>"+
      "<table class='table table-xxs table-hover datatable-basicxc' >"+
      "<thead>"+
      "<tr>"+
      "<th>รหัสสถานศึกษา</th>"+
      "<th>ชื่อสถานศึกษา</th>"+
      "<th>สาขาวิชา</th>"+
      "<th></th>"+
      "</tr>"+
      "</thead>"+
      "<tbody>"+
      "<?php foreach ($eduu as $val){ ?>"+
      "<tr>"+
      "<td><?php echo $val->edu_code; ?></td>"+
      "<td><?php echo $val->edu_name; ?></td>"+
      "<td><?php echo $val->edu_major; ?></td>"+
      '<td><button class="openeducationall'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-code="<?php echo $val->edu_code; ?>" data-name="<?php echo $val->edu_name; ?>" data-major="<?php echo $val->edu_major; ?>" data-dismiss="modal">เลือก</button></td>'+
      "</tr>"+
      "<?php } ?>"+
      "</tbody>"+
      "</table>"+
      "</div>"+
      "</div>";
      $("#modaledu_ins").append(madaleduca);

      $(".openeducational"+row).click(function(event) {
      $("#groedu_code"+row).val($(this).data('code'));
      $("#groedu_name"+row).val($(this).data('name'));
      });

      $(".openeducationall"+row).click(function(event) {
      $("#edu_code"+row).val($(this).data('code'));
      $("#edu_name"+row).val($(this).data('name'));
      $("#edu_major"+row).val($(this).data('major'));
      });
      }
    </script>

    <div class="col-md-12">
    <h3>ประวัติการทำงาน</h3>
      <table class="table table-bordered table-xxs table-hover">
        <thead>
          <tr>
            <td>#</td>
            <td>ชื่อบริษัท</td>
            <td>ที่อยู่บริษัท</td>
            <td>ตำแห่นง </td>
            <td>ระยะเวลากี่ปี</td>
          </tr>
        </thead>
        <tbody id="body2">
        
        </tbody>
      </table>
        <br>
        <a class="ins_work pull-right btn btn-success"><i class="icon-plus2"></i>เพิ่ม</a>
  </div>
                  
    <script>
      $(".ins_work").click(function(){
        addroww();
      });
        function addroww(){
          var row = ($('#body2 tr').length-0)+1;
          var tr = '<tr>'+
          '<td>'+row+'<input type="hidden" name="chki[]" value="i" class="form-control"></td>'+
          '<td>'+
          '<input type="text" name="job_name" id="job_name'+row+'" class="form-control">'+
          '</td>'+
          '<td>'+
          '<input type="text" name="job_address" id="job_address'+row+'" class="form-control">'+
          '</td>'+
          '<td>'+
          '<input type="text" name="job_position" id="job_position'+row+'" class="form-control">'+
          '</td>'+
          '<td>'+
          'ตั้งแต่ ปี <input type="text" name="job_start" id="job_start'+row+'" class="form-control"> ถึง <input type="text" name="job_end" id="job_end'+row+'" class="form-control">'+
          '</td>'+
          '</tr>';
          $('#body2').append(tr);
      }
    </script>

  <div class="col-md-12">
    <h3>ประวัติฝึกอบรม</h3>
      <table class="table table-bordered table-xxs table-hover">
        <thead>
          <tr>
            <td colspan="2">ระยะเวลา</td>
            <td>สถาบัน/หน่วยงาน/บริษัท</td>
            <td>หลักสูตร/ตำแหน่ง</td>
          </tr>
        </thead>
        <tbody id="body3">
        
        </tbody>
      </table>
        <br>
        <a class="ins_train pull-right btn btn-success"><i class="icon-plus2"></i>เพิ่ม</a>
  </div> 
    <div id="modaltrainn">
    </div>                  
    <script>
      $(".ins_train").click(function(){
        addrow_train();
      });
        function addrow_train(){
          var row = ($('#body3 tr').length-0)+1;
          var tr = '<tr>'+
          '<td>'+
          'ตั้งแต่ เดือน <select class="form-inline form-control input-sm" id="skill_start_month" name="skill_start_month[]">'+
          '<option value="มกราคม">มกราคม</option>'+
          '<option value="กุมภาพันธ์">กุมภาพันธ์</option>'+
          '<option value="มีนาคม">มีนาคม</option>'+
          '<option value="เมษายน">เมษายน</option>'+
          '<option value="พฤษภาคม">พฤษภาคม</option>'+
          '<option value="มิถุนายน">มิถุนายน</option>'+
          '<option value="กรกฎาคม">กรกฎาคม</option>'+
          '<option value="สิงหาคม">สิงหาคม</option>'+
          '<option value="กันยายน">กันยายน</option>'+
          '<option value="ตุลาคม">ตุลาคม</option>'+
          '<option value="พฤศจิกายน">พฤศจิกายน</option>'+
          '<option value="ธันวาคม">ธันวาคม</option>'+
          '</select> ปี <input type="text" class="form-control" id="skill_start_years" name="skill_start_years[]">'+
          '</td>'+
          '<td>'+
          'จนถึง เดือน <select class="form-inline form-control input-sm" id="skill_end_month" name="skill_end_month[]">'+
          '<option value="มกราคม">มกราคม</option>'+
          '<option value="กุมภาพันธ์">กุมภาพันธ์</option>'+
          '<option value="มีนาคม">มีนาคม</option>'+
          '<option value="เมษายน">เมษายน</option>'+
          '<option value="พฤษภาคม">พฤษภาคม</option>'+
          '<option value="มิถุนายน">มิถุนายน</option>'+
          '<option value="กรกฎาคม">กรกฎาคม</option>'+
          '<option value="สิงหาคม">สิงหาคม</option>'+
          '<option value="กันยายน">กันยายน</option>'+
          '<option value="ตุลาคม">ตุลาคม</option>'+
          '<option value="พฤศจิกายน">พฤศจิกายน</option>'+
          '<option value="ธันวาคม">ธันวาคม</option>'+
          '</select> ปี <input type="text" class="form-control" id="skill_end_years" name="skill_end_years[]">'+
          '</td>'+
          '<td>'+
          '<div class="input-group">'+
          '<input type="text" class="form-control" readonly   name="train_name[]" id="train_name'+row+'">'+
          '<input type="hidden" name="train_code[]" id="train_code'+row+'">'+
          "<div class='input-group-btn'>"+
          '<a class="btn btn-default btn-icon" data-toggle="modal" data-target="#open_train'+row+'"><i class="icon-search4"></i></a>'+
          '</div>'+
          '</div>'+
          '</td>'+
          '<td>'+
          '<input type="text" name="skill_tpos[]" id="skill_tpos'+row+'" class="form-control">'+
          '</td>'+
          '</tr>';
          $('#body3').append(tr);

      var madaltraining = '<div id="open_train'+row+'" class="modal fade" data-backdrop="false">'+
      " <div class='modal-dialog modal-lg'>"+
      "<div class='modal-content'>"+
      "<div class='modal-header'>"+
      "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
      "<h5 class='modal-title'>เลือกระดับการศึกษา</h5>"+
      "</div>"+
      "<div class='modal-body'>"+
      "<div>"+
      "<table class='table table-xxs table-hover datatable-basicxc' >"+
      "<thead>"+
      "<tr>"+
      "<th>รหัสวิทยากร</th>"+
      "<th>ชื่อวิทยากร</th>"+
      "<th>หลักสูตร/ตำแหน่ง</th>"+
      "<th></th>"+
      "</tr>"+
      "</thead>"+
      "<tbody>"+
      "<?php foreach ($tra as $val){ ?>"+
      "<tr>"+
      "<td><?php echo $val->train_code; ?></td>"+
      "<td><?php echo $val->train_name; ?></td>"+
      "<td><?php echo $val->train_detail; ?></td>"+
      '<td><button class="opentrain'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-code="<?php echo $val->train_code; ?>" data-name="<?php echo $val->train_name; ?>" data-dismiss="modal">เลือก</button></td>'+
      "</tr>"+
      "<?php } ?>"+
      "</tbody>"+
      "</table>"+
      "</div>"+
      "</div>";
      $("#modaltrainn").append(madaltraining);


      $(".opentrain"+row).click(function(event) {
      $("#train_code"+row).val($(this).data('code'));
      $("#train_name"+row).val($(this).data('name'));
      });
      }
    </script>
</div>
             <div id="menu3" class="tab-pane fade ">
               <h3>ทักษะและความสามารถ</h3>
                <div class="form-inline">
                  <table class ="table">
                    <tbody>
                      <tr> </tr>
                        <td>ความสามารถทางภาษา</td>
                        <td> <label class="form-inline" for="e_lang">ภาษา</label>&nbsp;&nbsp;
                             <select  class="form-inline form-control input-sm" id="skill_lang" name="skill_lang"  onchange="change()">
                               <option>ไม่มี</option>
                               <option>จีน</option>
                               <option>เยอรมัน</option>
                               <option>ญีปุ่น</option>
                               <option value="english">อังกฤษ</option>
                               <option>สเปน</option>
                            </select>
                            &nbsp;&nbsp;<label class="form-inline"  for="skill_speak">พูด</label>&nbsp;&nbsp;
                            <select class="form-inline form-control input-sm" id="skill_speak" name="skill_speak">
                              <option value="0">ดีมาก</option>
                              <option value="1">ดี</option>
                              <option value="2">ปานกลาง</option>
                              <option value="3">แย่</option>
                              <option value="4">แย่มาก</option>
                            </select>
                            &nbsp;&nbsp;<label class="form-inline" for="skill_read">อ่าน</label>&nbsp;&nbsp;
                            <select  class="form-inline form-control input-sm" id="skill_read" name="skill_read">
                              <option value="0">ดีมาก</option>
                              <option value="1">ดี</option>
                              <option value="2">ปานกลาง</option>
                              <option value="3">แย่</option>
                              <option value="4">แย่มาก</option>
                            </select>
                            &nbsp;&nbsp;<label class="form-inline" for="skill_read">เขียน</label>&nbsp;&nbsp;
                            <select  class="form-inline form-control input-sm" id="skill_write" name="skill_write">
                              <option value="0">ดีมาก</option>
                              <option value="1">ดี</option>
                              <option value="2">ปานกลาง</option>
                              <option value="3">แย่</option>
                              <option value="4">แย่มาก</option>
                            </select>
                          </td>
                        <tr hidden></tr>
                          <td id="td1" class="hidden" ></td>
                          <td id="to1" class="hidden">
                              <label  id="lbe_toeic" class="form-inline" for="e_toeic">TOEIC</label>&nbsp;&nbsp;
                              <input class="form-inline form-control" id="e_toeic" name="e_toeic">&nbsp;&nbsp;
                              &nbsp;&nbsp;<label id="lbe_toelf" class="form-inline" for="e_toelf">TOEFL</label>&nbsp;&nbsp;
                              <input class="form-inline form-control" id="e_toelf" name="e_toelf">&nbsp;&nbsp;
                         </td>
                        <tr hidden></tr>
                          <td id="td2" class="hidden"></td>
                          <td id="to2" class="hidden">
                            <label id="lbe_elts" class="form-inline" for="e_ielts">IELTS</label>&nbsp;&nbsp;
                            <input class="form-inline form-control" id="e_ielts" name="e_ielts">&nbsp;&nbsp;
                            <label id="lbe_cutep" class="form-inline" for="e_tuget">CU-TEP</label>&nbsp;&nbsp;
                            <input class="form-inline form-control" id="e_tuget" name="e_tuget">&nbsp;&nbsp;
                          </td>
                        <tr></tr>
                          <td id="td3" class="hidden"></td>
                          <td class="hidden" id="to3">
                            <label id="lbe_tuget" class="form-inline" for="e_cutep">TU-GET</label>&nbsp;&nbsp;
                            <input class="form-inline form-control" id="e_cutep" name="e_cutep">
                          </td>
                       </tbody>
                      </table>
                   </div>
<script>
function change() {
var i = $('#skill_lang');
if(i.val()=="english"){
$('#to1').removeClass('hidden');
$('#td1').removeClass('hidden');
$('#to2').removeClass('hidden');
$('#td2').removeClass('hidden');
$('#to3').removeClass('hidden');
$('#td3').removeClass('hidden');
}else{
$('#to1').addClass('hidden');
$('#to2').addClass('hidden');
$('#to3').addClass('hidden');
$('#td1').addClass('hidden');
$('#td2').addClass('hidden');
$('#td3').addClass('hidden');
}
};
</script>
                            <table class="table">
                              <tr></tr>
                                <tbody>
                                  <tr></tr>
                                    <td><label>ความสามารถในการขับขี่พาหนะ</label></td>
                                    <td>
                                      <label class="checkbox-inline"><input name="chkcar" id="chkcar"  type="checkbox" >รถยนต์</label>
                                      <label class="checkbox-inline"><input name="chkmotor" id="chkmotor"  type="checkbox" >รถจักยานยนต์</label>
                                      <label class="checkbox-inline"><input name="chktruck" id="chktruck"  type="checkbox">รถบรรทุก</label>
                                      <label class="checkbox-inline"><input name="chkcab" id="chkcab"  type="checkbox">รถกระบะ</label>
                                      <label class="checkbox-inline"><input name="chkfolk" id="chkfolk"  type="checkbox">รถฟอร์คลิฟท์</label>
                                    </td>
                                  <tr></tr>
                                    <td>มีพาหนะเป็นของตัวเอง</td>
                                    <td>
                                      <label class="checkbox-inline"><input id="chkhcar"  name="chkhcar" type="checkbox">รถยนต์</label>
                                      <label class="checkbox-inline"><input id="chkhmotor" name="chkhmotor" type="checkbox">รถจักยานยนต์</label>
                                      <label class="checkbox-inline"><input id="chkhtruck" name="chkhtruck" type="checkbox">รถบรรทุก</label>
                                    </td>
                                    <tr></tr>
                                      <td>มีใบขับขี่ชนิด</td>
                                      <td>
                                        <label class="checkbox-inline"><input id="lccar"  name="lccar" type="checkbox">รถยนต์</label>
                                        <label class="checkbox-inline"><input id="lcmotor" name="lcmotor" type="checkbox">รถจักยานยนต์</label>
                                        <label class="checkbox-inline"><input id="lctruck" name="lctruck" type="checkbox">รถบรรทุก</label>
                                      </td>
                                  <tr></tr>
                                    <td>ความสามารถพิเศษอื่นๆ</td>
                                    <td>
                                      1) <input class="form-control" id="skill1" name="skill1" style="margin: 10px;">
                                      2) <input class="form-control" id="skill2" name="skill2" style="margin: 10px;">
                                      3) <input class="form-control" id="skill3" name="skill3" style="margin: 10px;">
                                      4) <input class="form-control" id="skill4" name="skill4" style="margin: 10px;">
                                      5) <input class="form-control" id="skill5" name="skill5" style="margin: 10px;">
                                    </td>
                                  <tr></tr>
                                    <td><label>สามารถปฎิบัติงานต่างจังหวัด</label></td>
                                    <td>
                                      <label class="radio-inline"><input type="radio" id="rdbgo" name="rdbgo" value="1">ไปได้</label>
                                      <label class="radio-inline"><input type="radio" id="rdbgo" name="rdbgo" value="0">ไปไม่ได้</label>
                                    </td>
                                    <tr></tr>
                                      <td><label>สามารถปฎิบัติงานต่างประเทศ</label></td>
                                      <td>
                                        <label class="radio-inline"><input type="radio" id="rdbgonation" name="rdbgonation" value="1">ไปได้</label>
                                        <label class="radio-inline"><input type="radio" id="rdbgonation" name="rdbgonation" value="0">ไปไม่ได้</label>
                                      </td>
                                    <tr></tr>
                                        <td><label>ประวัติการถูกดำเนินคดั</label></td>
                                        <td>
                                          <label class="radio-inline"><input type="radio" id="rdblaw" name="rdblaw" value="1">เคย</label>
                                          <label class="radio-inline"><input type="radio" id="rdblaw" name="rdblaw" value="0">ไม่เคย</label>
                                        </td>
                                      <tr></tr>
                                        <td><label>ประวัติการดื่มสุรา</label></td>
                                        <td>
                                          <label class="radio-inline"><input type="radio" id="rdbdrink" name="rdbdrink" value="1">ดื่ม</label>
                                          <label class="radio-inline"><input type="radio" id="rdbdrink" name="rdbdrink" value="0">ไม่ดื่ม</label></td>
                                        <tr></tr>
                                          <td><label>ประวัติสูบบุหรี่</label> </td>
                                          <td>
                                            <label class="radio-inline"><input type="radio" id="rdbsmoke" name="rdbsmoke" value="1">สูบ</label>
                                            <label class="radio-inline"><input type="radio" id="rdbsmoke" name="rdbsmoke" value="0">ไม่สูบ</label></td>
                                    </tbody>
                                </table>
</div>
       <br>


   <!-- Large modal -->
                    
          <div id="menu4" class="tab-pane fade">
              <div class="form-group">
                  <div class="row">
                      <div class="col-xs-3">
                      <div id="chid" class="form-group has-feedback">
                      <label>รหัสพนักงาน</label>
                        <input type="text" name="ccode" id="ccode" class="form-control input-sm">
                                    <!-- <span id="spid" class="glyphicon glyphicon-remove form-control-feedback"></span>
 -->
                      </div>
                      </div>
                      <div class="col-xs-3">
                    <label for="emp_lead">วันที่เริ่มงาน</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                        <input type="date" class="form-control" id="job_datestart" name="job_datestart">
                      </div>
                  </div>
                      <div class="col-xs-3">
                        <label for="emp_project">โครงการ</label>
                          <script>
                          function comchange($i){
                          switch ($i) {
                          case '1' :
                          $('#emp_department').removeClass('hidden');
                          $('#lbled').removeClass('hidden');
                          break;
                          }
                          }
                          </script>
                            <select  class="form-inline form-control input-sm" id="emp_project" name="emp_project">
                            <option value="">เลือกโครงการ</option>
                            <?php foreach ($pro as $key) { ?>  
                              <option value="<?php echo $key->project_name; ?>"><?php echo $key->project_name; ?></option> 
                          <?php } ?>
                            </select>
                        </div>
                      <div class="col-xs-3">
      <label for="emp_department" >แผนก</label>
      <select class="form-inline form-control input-sm" id="emp_department"  name="emp_department">
      <?php foreach ($de as $keyy) { ?>  
        <option value="<?php echo $keyy->department_title; ?>"><?php echo $keyy->department_title; ?></option>
        <?php } ?>
      </select>
    </div>
                        
<script>
//  var Office = [{
// display: "Marketing",value: "MK"},
// {display: "Financial-and-Accounting", value: "FA"},
// {display: "Safety",value: "ST"},
// {display: "Service",value: "SV"},
// {display: "Human-Resource",value: "HR"},
// {display: "IT",value: "IT"},
// {display: "Admin and Store",value: "AMS"}];


// var sitepo = [{
// display: "Project Engineer",value: "Project Engineer"},
// {display: "Foreman(EE)",value: "Foreman(EE)"},
// {display: "Site Admin",value: "Site Admin"},
// {display: "Draftman(ME)",value: "Draftman (ME)"},
// {display: "Sr. Foreman (ME)",value: "Sr. Foreman (ME)"},
// {display: "Project Engineer(ME)",value: "Project Engineer(ME)"},
// {display: "Draftman(EE)",value: "Draftman(EE)"},
// {display: "Safety Officer",value: "Safety Officer"},
// {display: "Draftman(ME&EE)",value: "Draftman(ME&EE)"},
// {display: "นศ.ฝึกงาน",value: "Trainee"}];





//select position
// var IT = [{
// display: "Programer",value: "programer"},
// {display: "It Support",value: "It Support"}];

// var FA = [{
// display: "Asst.Financial & Account.",value: "AssFA"},
// {display: "Financial & Acct.Staff",value: "FAS"},
// {display: "Chief Financial Officer",value: "CFO"},
// {display: "Messenger",value: "Messenger"}];

// var HR = [{
// display: "HR-Manager",value: "HRM"},
// {display: "HR-Officer",value: "HRo"}];

// var PR = [{
// display: "PR-Manager",value: "PRM"},
// {display: "PR-Officer",value: "PRO"}];

// var ST = [{
// display: "Safety",value: "Safety"}];

// var SV = [{
// display: "Service",value: "SV"}];

// var MK = [{
// display: "Marketing Officer",value: "MKO"}];

// var AM = [{
// display: "Admin-Manager",value: "AMM"},
// {display: "Admin-Officer",value: "AMO"},
// {display: "Store",value: "Store"},
// {display: "คนขับรถ",value: "driver"}];

// // Function executes on change of first select option field.
// $("#emp_project").change(function() {

// var select = $("#emp_project option:selected").val();

// if (select=="Office"){

//   $('#pohd').removeClass('hidden');
//   $('#dphd').removeClass('hidden');
// }
// if (select!="Office"){


// $('#pohd').addClass('hidden');
//   $('#dphd').addClass('hidden');
// }
// switch (select) {
// case "Office":
// dp(Office);
// break;
// case "JSM":
// position(sitepo);

// break;
// case "Aim-House":
// position(sitepo);

// break;
// case "Synnex":
// position(sitepo);

// break;
// case "Ramkhamhaeng":
// position(sitepo);

// break;
// case "GS-Batterry":
// position(sitepo);

// break;
// case "rongmheesuea":
// position(sitepo);

// break;
// case "weapon":
// position(sitepo);

// break;
// case "Osot":
// position(sitepo);

// break;
// case "thumasart":
// position(sitepo);

// break;
// case "Crazy":
// position(sitepo);

// break;
// default:
// $("#emp_department").empty();
// $("#emp_department").append("<option>--Select--</option>");
// break;
// }

// });

// // Function To List  Second Select tags
// function dp(arr) {
//   if($('#dphd').hasClass('hidden') && $('#pohd').hasClass('hidden')){
//   }

// $("#emp_department").empty(); //To reset cities
// $("#emp_department").append("<option>--Select--</option>");

// $(arr).each(function(i) { //to list cities
// $("#emp_department").append("<option value=\"" + arr[i].value + "\">" + arr[i].display + "</option>")
// });
// }

// // selected 3
// //
// $("#emp_department").change(function() {
// var tt = $("#emp_department option:selected").val();

// switch (tt) {
// case "IT":
// position(IT);
// break;
// case "FA":
// position(FA);
// break;
// case "HR":
// position(HR);
// break;
// case "PR":
// position(PR);
// break;
// case "MK":
// position(MK);
// break;
// case "ST":
// position(ST);
// break;
// case "SV":
// position(SV);
// break;
// case "AMS":
// position(AM);
// break;
// case "IT":
// position(IT);
// break;
// default:
// $("#emp_department").empty();
// $("#emp_department").append("<option>--Select--</option>");
// break;
// }
// });

// // Function To List third Select tags
// function position(x) {
//   if($('#pohd').hasClass('hidden')){
//     $('#pohd').removeClass('hidden');
//   }


// $("#emp_position").empty(); //To reset cities
// $("#emp_position").append("<option>--Select--</option>");
// $(x).each(function(i) { //to list cities
// $("#emp_position").append("<option value=\"" + x[i].value + "\">" + x[i].display + "</option>")
// });
// }
  </script>
</div>
</div>
  <div class="row">
    <div class="col-xs-4">
      <label for="emp_position" >ตำแหน่ง</label>
      <select  class="form-inline form-control input-sm" id="emp_position" name="emp_position">
      <option>Project Engineer</option>
      <option>Foreman(EE)</option>
      <option>Site Admin</option>
      <option>Draftman(ME)</option>
      <option>Sr. Foreman (ME)</option>
      <option>Project Engineer(ME)</option>
      <option>Draftman(EE)</option>
      <option>Safety Officer</option>
      <option>Draftman(ME&EE)</option>
      <option>นศ.ฝึกงาน</option> 
      </select>
    </div>
    <div class="col-xs-4">
      <label for="emp_lead">ผู้บังคับบัญชาขั้นสูงสุด</label>
      <!-- <input type="text" class="form-control" id="emp_lead" name="emp_lead"> -->
      <select class="form-control" name="emp_lead">
        <?php foreach ($mem as $memm) { ?>  
        <option value="<?php echo $memm->m_code; ?>"><?php echo $memm->m_name; ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="col-xs-4">
      <label for="emp_lead2">ผู้บังคับบัญชาขั้นต้น</label>
      <!-- <input type="text" class="form-control" id="emp_lead" name="emp_lead"> -->
      <select class="form-control" name="emp_lead2">
        <?php foreach ($mem as $memm) { ?>  
        <option value="<?php echo $memm->m_code; ?>"><?php echo $memm->m_name; ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xs-4">
      <label> บัญชีธนาคาร </label>
        <select class="form-inline form-control input-lg" id="emp_bank" name="emp_bank">
          <option selected="กสิกร">กสิกร</option>
      </select>
    </div>
    
    <div class="col-xs-4">
      <label class="form-inline" for="emp_bankmajor">สาขา</label>
      <input type="text" class="form-inline form-control" id="emp_backmajor" name="emp_backmajor">
    </div>
    
    <div class="col-xs-4 form-group has-feedback">
      <label class="form-inline" for="emp_bookbank">เลขที่บัญชี</label>&nbsp;&nbsp;
       <input type="text" class="form-inline form-control" id="emp_bookbank" name="emp_bookbank">
    </div>
</div>

<div class="row">
  <div class="col-xs-4">
    <label for="emp_insuid">เลขที่ประกันสังคม</label>&nbsp;&nbsp;
    <input type="text" class="form-control" placeholder="เลขประกันสังคม" id="emp_insuid" name="emp_insuid">
  </div>
  
  <div class="col-xs-4">
    <label for="emp_hos">โรงพยาบาลรับการรักษา</label>&nbsp;&nbsp;
    <input type="text" class="form-control input-sm" placeholder="ชื่อโรงพยาบาล" id="emp_hos" name="emp_hos">
    <input type="text" class="hidden" name="emp_stat" id="emp_stat" value="1">
    </div>
  </div>
  <br><br>
<button type="submit" class="btn btn-primary btn-xs" id="save" data-toggle="modal" data-target="#mdsave"><i class="fa fa-floppy-o" aria-hidden="true"></i> บันทึก</button>
      </div>
    </div>

                  
<!-- Modal -->
<div id="mdsave" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">การบันทึก</h4>
      </div>
      <div class="modal-body">
        <p>SAVE SUCCESS</p>
      </div>
      <div class="modal-footer">

      </div>
    </div>

  </div>
</div>
         </div>
                </div>
          </div>

      </form>
  <?php } ?>
  <script>
      // Accessibility labels
    $('.pickadate-accessibility').pickadate({
        labelMonthNext: 'Go to the next month',
        labelMonthPrev: 'Go to the previous month',
        labelMonthSelect: 'Pick a month from the dropdown',
        labelYearSelect: 'Pick a year from the dropdown',
        selectMonths: true,
        selectYears: true
    });
</script>