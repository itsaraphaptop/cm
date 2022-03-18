<!-- Page container -->

        <!-- Page header -->
       
        <!-- /page header -->
        <!-- Content area -->
         <div class="content">
            <?php foreach ($prof as $key => $value) {?>
          <!-- User profile -->
         
                  
                    <!-- Profile info -->
                <div class="panel panel-flat">
                <div class="panel-heading">
                <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
                <div class="panel-body">
                  
                  
 <legend><h4><i class="fa fa-user-plus" aria-hidden="true"></i> Employee Information </h4></legend>
 <ul class="nav nav-tabs">

    <li class="active"><a data-toggle="tab" href="#home">ข้อมูลส่วนตัว</a></li>
    <li><a data-toggle="tab" href="#menu1">ที่อยู่และบุคคลติดต่อได้</a></li>
    <li><a data-toggle="tab" href="#menu2">ประวัติการศึกษา</a></li>
    <li><a data-toggle="tab" href="#menu3">ทักษะและความสามารถ</a></li>
    <li><a data-toggle="tab" href="#menu4">ภายในองค์กร</a></li>
  </ul>
<form action="<?php echo base_url(); ?>emp_profile/add_profile" method="post">
  <div class="tab-content">
  
      <div id="home" class="tab-pane fade in active">
           <h3>ข้อมูลส่วนตัว</h3><br>
           
           <div class="row">
              <div class="col-xs-4">
              <div class="form-group">
                        <label for="">รหัสพนักงาน</label>
                        <input type="text" class="form-control input-sm" placeholder="กรอกรหัสพนักงาน" id="ccode" name="ccode" value="<?php echo $code; ?>">
                        <input type="hidden" class="form-control input-sm" placeholder="id" id="cid" name="cid" readonly="true" value="<?php echo $value->m_id; ?>">
                        <input type="hidden" class="form-control input-sm" name="flag" id="flag" value="<?php if($udp==""){echo "ins";}else{echo $udp;}?>">
                        <input type="hidden" class="form-control input-sm" name="oldid" id="oldid" value="<?php echo $code;?>">
              </div>
              </div>   
           </div>
           <div class="row">
              <div class="col-xs-2">
                <label>คำนำหน้า</label>
                <select class="form-control input-sm" name="emp_title" id="emp_title">
                <?php if($emp_title == '1'){ ?><option value="1" selected>นาย</option><?php } else { ?><option value="1">นาย</option><?php }?>
                <?php if($emp_title == '2'){ ?><option value="2" selected>นาง</option><?php } else { ?><option value="2">นาง</option><?php }?>
                <?php if($emp_title == '3'){ ?><option value="3" selected>นางสาว</option><?php } else { ?><option value="3">นางสาว</option><?php }?>               
                </select>
              </div>
              <div class="col-xs-3">
             

    
                <label>ชื่อ</label>
                <input type="text" class="form-control input-sm" placeholder="ชื่อภาษาไทย" id="emp_name_t" required="required" name="emp_name_t" value="<?php  ?>">

             </div>
             <div class="col-xs-3">
                <label>นามสกุล</label>
                <input type="text" class="form-control input-sm" placeholder="นามสกุลภาษาไทย" id="emp_lastname_t" required="required" name="emp_lastname_t">
             </div>
             <div class="col-xs-3">
                <label>ชื่อเล่น</label>
                <input type="text" class="form-control input-sm" placeholder="ชื่อเล่น" id="emp_nickname"  name="emp_nickname">
             </div>
           </div>
           <br>
           <div class="row">
              <div class="col-xs-2">
                <label>คำนำหน้า</label>
                <select class="form-control input-sm" name="emp_title_e" id="emp_title_e">
                <?php if($emp_title_e== '1'){ ?><option value="1" selected>Mr.</option><?php } else { ?><option value="1">Mr.</option><?php }?>
                <?php if($emp_title_e== '2'){ ?><option value="2" selected>Ms.</option><?php } else { ?><option value="2">Ms.</option><?php }?>
                <?php if($emp_title_e== '3'){ ?><option value="3" selected>Mrs.</option><?php } else { ?><option value="3">Mrs.</option><?php }?>               
                </select>  
              </div>
              <div class="col-xs-3">
                <label>First Name</label>

              <input tabindex="0" data-trigger="focus" type="text" title="แจ้งเตือน!!" data-content="ภาษาอังกฤษเท่านั้น" class="form-control input-sm" data-toggle="popover" data-placement="top" placeholder="First Name" id="emp_name_e" required="required" name="emp_name_e">
            
             <script> 
            $('#emp_name_e').keypress(function(event){
              
                if ((event.charCode >= 65 && event.charCode <= 90) ||
                (event.charCode >= 97 && event.charCode <= 122))
                    $('#emp_name_e').popover('hide');
                  

                else
                   // $("[data-toggle='popover']").popover('show');
                  
                  $('#emp_name_e').popover('show');
                


                  });
                    
             </script>
             
             </div>
             <div class="col-xs-3">
                <label>Lastname</label>
                <input tabindex="0" type="text" data-trigger="focus" title="แจ้เงตือน" data-content="ภาษาอังกฤษเท่านั้น" class="form-control input-sm" placeholder="Lastname" data-toggle="popover" data-placement="top" id="emp_lastname_e" required="required" name="emp_lastname_e">
               <script> 

                  $('#emp_lastname_e').keypress(function(event){
                if ((event.charCode >= 65 && event.charCode <= 90) ||
                   (event.charCode >= 97 && event.charCode <= 122))
                     $('#emp_lastname_e').popover('hide');
                else
                    $('#emp_lastname_e').popover('show');


                  });
                          
             </script>            
             </div>
           </div>
           <br><hr>
           <div class="row">
              <div class="col-xs-4">
              <label>บัตรประชาชน</label>
                  <input maxlength="17" pattern="\d{1}-?\d{4}-?\d{5}-?\d{2}-?\d{1}" data-toggle="popover" data-placement="top" title="แจ้เงตือน" data-content="กรอกตัวเลขเท่านั้น" type="text" class="form-control input-sm" placeholder="กรอกบัตรประชาชน" id="emp_idcityzen" required="required" name="emp_idcityzen">
                  <script>  
                  $('#emp_idcityzen').length-
                  $('#emp_idcityzen').keypress(function(event){
                if (event.charCode >= 48 && event.charCode <= 57)
                    $('#emp_idcityzen').popover('hide');
                else
                    $('#emp_idcityzen').popover('show');

                  });
                          
             </script>         
              </div>  
              <div class="col-xs-4">
              <label>เบอร์โทรศัพท์</label>
                <input type="text" class="form-control input-sm" placeholder="เบอร์โทรศัพท์" id="emp_tele" name="emp_tele">
              </div>
              
              <div class="col-xs-4">
              <label>E-mail</label>
                <input type="text" class="form-control input-sm" placeholder="xxxxx@example.com" id="emp_email" name="emp_email">
              </div>
          </div>
          <br>
           <div class="row">
              <div class="col-xs-4">
              <label>วัน/เดือน/ปี ที่ เกิด</label>
              <div class="input-group">
              <span class="input-group-addon"><i class="icon-calendar22"></i></span>
              <input type="text" class="form-control pickadate-accessibility" id="emp_birthdate" name="emp_birthdate">
              </div>
              </div>  
              <div class="col-xs-2">
              <label>ส่วนสูง</label>
              <input type="text" class="form-control input-sm" placeholder="ส่วนสูง" id="emp_height"  name="emp_height">
              </div>
              <div class="col-xs-2">
              <label>น้ำหนัก</label>
              <input type="text" class="form-control input-sm" placeholder="น้ำหนัก" id="emp_weight" name="emp_weight">
              </div>
              <div class="col-xs-2">
              <label>สถานะ</label>
              <select class="form-control input-sm" name="emp_status" id="emp_status">
                <?php if($emp_status == '1'){ ?><option value="สมรส" selected>สมรม</option><?php } else { ?><option value="สมรส">สมรส</option><?php }?>
                <?php if($emp_status== '2'){ ?><option value="โสด" selected>โสด</option><?php } else { ?><option value="โสด">โสด</option><?php }?>
                <?php if($emp_status == '3'){ ?><option value="หย่า" selected>หย่า</option><?php } else { ?><option value="หย่า">หย่า</option><?php }?>               
                </select>
              </div> 
                   <div class="col-xs-2">
              <label>จำนวนบุตร</label>
                <input type="text" class="form-control input-sm" placeholder="กรอกจำนวน" id="emp_child" name="emp_child">
              </div> 
              </div>
              <br>
              <div class="row">
                <div class="col-xs-2">
                 <label>เชื้อชาติ</label>
                <input type="text" class="form-control input-sm" placeholder="กรอกเชื้อชาติ" id="emp_race" name="emp_race">
              </div> 
                <div class="col-xs-2">
              <label>สัญชาติ</label>
                <input type="text" class="form-control input-sm" placeholder="กรอกสัญชาติ" id="emp_nation" name="emp_nation">
              </div>
              <div class="col-xs-2">
              <label>ศาสนา</label>
                <input type="text" class="form-control input-sm" placeholder="กรอกศาสนา" id="emp_religion" name="emp_religion">
              </div>
              <div class="col-xs-2">
              <label>จำนวนพี่น้อง</label>
                <input type="text" class="form-control input-sm" placeholder="กรอกจำนวน" id="emp_brosis" name="emp_brosis">
                </div>
                <div class="col-xs-2">
                <label>เป็นบุตรคนที่</label>
                <input type="text" class="form-control input-sm" placeholder="กรอกลำดับ" id="emp_cno" name="emp_cno">
                </div>     

                </div>
                <button type="submit" class="btn btn-primary btn-xs" id="save" data-dismiss="modal"><i class="fa fa-floppy-o" aria-hidden="true"></i> บันทึก</button>
               </div>
      <!--STARTtAB 2-->
      <div id="menu1" class="tab-pane fade">
      <div class="row">
      <div class="col-xs-12">
         <div class="form-group">
           <label for="comment">ที่อยู่ปัจจุบัน</label>
            <textarea class="form-control" rows="3" id="emp_address_now" name="emp_address_now"></textarea>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-xs-12">
         <div class="form-group">
            <label for="comment">ที่อยู่ตามทะเบียนบ้าน</label>
            <textarea class="form-control" rows="3" id="emp_address_book" name="emp_address_book"></textarea>
        </div>
        </div>
        </div>
              <div class="row">
              <h3>บุคคลที่สามารถติดต่อได้(กรณีฉุกเฉิน)</h3>
              <div class="col-xs-4">
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
               <div class="col-xs-4">
                    <label>สถานที่ทำงาน</label>
                    <input type="text" class="form-control input-sm" placeholder="กรอกสถานที่" id="emp_cplace" name="emp_cplace">
              </div>
              </div>
              <div class="row">
              <div class="col-xs-3">
                  <label>เบอร์โทรศัพท์</label>
                  <input type="text" class="form-control input-sm" placeholder="เบอร์โทรศัพท์" id="emp_ctele" name="emp_ctele">
                  
              </div>
              </div>
      </div>
     
            
  <div id="menu2" class="tab-pane fade">
        <h3>ประวัติการศึกษา</h3>
        <div class="row clearfix">
             <div class="col-md-12 column">
                 <table class="table table-bordered table-hover" id="tab_logic">
                  <thead>
                  <tr >
                        <th class="text-center">
                          #
                        </th>
                        <th class="text-center">
                         ระดับการศึกษา
                        </th>
                         <th class="text-center">
                          ชื่อสถาบันการศึกษา
                        </th>
                        <th class="text-center">
                         สาขา
                        </th>
                        <th class="text-center"> 
                         ตั้งแต่ปี
                        </th>
                      </tr>
                   </thead>
                 <tbody id="bodyedu">
            <tr>
              <td>1</td>
              <td><input type="text" name='edu_level[]'  placeholder='ระดับการศึกษา' class="form-control"/></td>
              <td><input type="text" name='edu_name[]' placeholder='ชื่อสถาบันการศึกษา' class="form-control"/></td>
              <td><input type="text" name='edu_major[]' placeholder='สาขา' class="form-control"/></td>
              <td><input type="text" name='edu_yend[]' class="form-control"/></td>
            </tr>
               </tbody>
               </table>
            <a id="add_edu" class="btn btn-default pull-left">เพิ่ม</a><a id='delete_edu' class="pull-right btn btn-default">Delete Row</a>
            <script>
              $("#add_edu").click(function(event) {
               add_edu();
                });
               function add_edu(){
               var row = ($('#bodyedu tr').length-0)+1;
                var tr = '<tr>'+
              '<td>'+row+'</td>'+
              '<td><input type="text" name="edu_level[]"  placeholder="ระดับการศึกษา" class="form-control"/></td>'+
              '<td><input type="text" name="edu_name[]" placeholder="ชื่อสถาบันการศึกษา" class="form-control"/></td>'+
              '<td><input type="text" name="edu_major[]" placeholder="สาขา" class="form-control"/></td>'+
              '<td><input type="text" name="edu_yend[]" class="form-control"/></td>'+
            '</tr>';
            $("#bodyedu").append(tr);
                }         
    </script>

            </div>
    
             <!--$this->load->model('emp_profile.php');v>-->
        </div>
<h3>ประวัติการทำงาน</h3>
       <div class="row clearfix">
             <div class="col-md-12 column">
                 <table class="table table-bordered table-hover" id="tab_logic">
                  <thead>
                  <tr >
                        <th class="text-center">
                          #
                        </th>
                        <th class="text-center">
                         ชื่อบริษัท
                        </th>
                         <th class="text-center">
                          ที่อยู่บริษัท
                        </th>
                        <th class="text-center">
                         ตำแห่นง
                        </th>
                        <th class="text-center"> 
                         ระยะเวลากี่ปี
                        </th>
                      </tr>
                   </thead>
                 <tbody id="bodyjob">
            <tr>
              <td>1</td>
              <td><input type="text" name='job_no[]'  placeholder='ชื่อบริษัท' class="form-control"/></td>
              <td><input type="text" name='job_company[]' placeholder='ที่อยู่' class="form-control"/></td>
              <td><input type="text" name='job_position[]' placeholder='ตำแหน่ง' class="form-control"/></td>
              <td><input type="text" name='job_endy[]' class="form-control"/></td>
            </tr>
               </tbody>
               </table>
            <a id="add_job" class="btn btn-default pull-left">เพิ่ม</a><a id='delete_job' class="pull-right btn btn-default">Delete Row</a>
            </div>
            </div>
      </div>
            <script>

              $("#add_job").click(function(event) {
               add_job();
                });
          function add_job(){
               var row = ($('#bodyjob tr').length-0)+1;
            var tr = '<tr>'+
              '<td>'+row+'</td>'+
              '<td><input type="text" name="job_no[]"  placeholder="ชื่อบริษัท" class="form-control"/></td>'+
              '<td><input type="text" name="job_company[]" placeholder="ที่อยู่" class="form-control"/></td>'+
              '<td><input type="text" name="job_position[]" placeholder="ตำแหน่ง" class="form-control"/></td>'+
              '<td><input type="text" name="job_endy[]" class="form-control"/></td>'+
            '</tr>';
            $("#bodyjob").append(tr);
                }       
    </script>

            
             <!--$this->load->model('emp_profile.php');v>-->
  <div id="menu3" class="tab-pane fade">
        <h3>ทักษะและความสามารถ</h3>
             
        <div class="form-inline">
        <table class ="table">
        <tbody>
        <tr> </tr>
        <td>ความสามารถทางภาษา</td>
        <td> <label class="form-inline" for="e_lang">ภาษา</label>&nbsp;&nbsp; 
       <select  class="form-inline form-control input-sm" id="skill_lang" name="skill_lang" \ onchange="change(this)">
                         <?php $this->db->select('*');
                         $this->db->order_by('emp_id','asc');
                                $q = $this->db->get('emp_dd');
                                $res = $q->result();
                                foreach ($res as  $va) {
                          ?>
                         <option value="<?php echo $va->dd_lang; ?>"><?php echo $va->dd_lang; ?></option><?php } ?>
      </select>
                     
           <script>
// //                     $("$skill_lang")load(this);(function()){
// //                       if($(this).val()=="0"){
// //                       $("#skill_speak").hidden();
// // }
// //                     }
//                     $("#skill_lang").change(function(){
//                     if($(this).val()=="2")
//                         {     
//                         $("#lbe_toeic").show();
//                         $("#txttoeic").show();
//                         }
//                     else
//                         {
//                         $("#txttoeic").hide();
//                         $("#lbe_toeic").hide();
//                         }
// });
//             </script>


                      &nbsp;&nbsp;<label class="form-inline"  for="skill_speak">พูด</label>&nbsp;&nbsp;
                      <select class="form-inline form-control input-sm" id="skill_speak" name="skill_speak">
                         <?php $this->db->select('*');
                         $this->db->order_by('emp_id','asc');
                                $q = $this->db->get('emp_dd');
                                $res = $q->result();
                                foreach ($res as  $va) {
                          ?>
                         <option value="<?php echo $va->dd_grade; ?>"><?php echo $va->dd_grade; ?></option>
                         <?php } ?>
                      </select>

                       &nbsp;&nbsp;<label class="form-inline" for="skill_read">อ่าน</label>&nbsp;&nbsp;
                       <select  class="form-inline form-control input-sm" id="skill_read" name="skill_read">
                         <?php $this->db->select('*');
                         $this->db->order_by('emp_id','asc');
                                $q = $this->db->get('emp_dd');
                                $res = $q->result();
                                foreach ($res as  $va) {
                          ?>
                         <option value="<?php echo $va->dd_grade; ?>"><?php echo $va->dd_grade; ?></option>
                         <?php } ?>
                      </select>
                       &nbsp;&nbsp;<label class="form-inline" for="skill_read">เขียน</label>&nbsp;&nbsp;
                       <select  class="form-inline form-control input-sm" id="skill_write" name="skill_write">
                         <?php $this->db->select('*');
                         $this->db->order_by('emp_id','asc');
                                $q = $this->db->get('emp_dd');
                                $res = $q->result();
                                foreach ($res as  $va) {
                          ?>
                         <option value="<?php echo $va->dd_grade; ?>"><?php echo $va->dd_grade; ?></option>
                         <?php } ?>
                      </select>
               </td>
              <tr></tr>
              <td></td>
            <td>
            <label id="lbe_toeic" class="form-inline" for="e_toeic">TOEIC</label>&nbsp;&nbsp;
             <input class="form-inline form-control" id="e_toeic" name="e_toeic">&nbsp;&nbsp;
            &nbsp;&nbsp;<label id="lbe_toelf" class="form-inline" for="e_toelf">TOEFL</label>&nbsp;&nbsp;
             <input class="form-inline form-control" id="e_toelf" name="e_toelf">&nbsp;&nbsp; 
            </td>


                        <tr></tr>
                        <td>
                        </td>
                        <td>
                        <label id="lbe_elts" class="form-inline" for="e_ielts">IELTS</label>&nbsp;&nbsp;
                        <input class="form-inline form-control" id="e_ielts" name="e_ielts">&nbsp;&nbsp;


                        <label id="lbe_cutep" class="form-inline" for="e_tuget">CU-TEP</label>&nbsp;&nbsp;
                        <input class="form-inline form-control" id="e_tuget" name="e_tuget">&nbsp;&nbsp;
                        </td>
                        

                        <tr></tr>
                        <td>
                        </td>
                        <td>
                        <label id="lbe_tuget" class="form-inline" for="e_cutep">TU-GET</label>&nbsp;&nbsp;
                        <input class="form-inline form-control" id="e_cutep" name="e_cutep"> 
                        </td>
                               
                           </tbody>    
                          </table>
                         </div> 

      
        <table class="table">
        <tr>
        </tr>
        <tbody>
        <tr>
    
        </tr>
        <td>
        <label>ความสามารถในการขับขี่พาหนะ</label>
        </td>
        <td>
         <label class="checkbox-inline"><input name="chkcar" id="chkcar" value="รถยนต์" type="checkbox" >รถยนต์</label>
         <label class="checkbox-inline"><input name="chkmotor" id="chkmotor" value="รถจักยานยนต์" type="checkbox" >รถจักยานยนต์</label>
         <label class="checkbox-inline"><input name="chktruck" id="chktruck" value="รถบรรทุก" type="checkbox">รถบรรทุก</label>
         <label class="checkbox-inline"><input name="chkcab" id="chkcab" value="รถกระบะ" type="checkbox">รถกระบะ</label>
         <label class="checkbox-inline"><input name="chkfolk" id="chkfolk" value="รถฟอร์คลิฟท์" type="checkbox">รถฟอร์คลิฟท์</label>
         <script>
         // $('#chkcar').checked(function(){
         //  ('#chkcar').value = "รถยนต์"
        /* NOT SURE WHAT TO DO HERE */
    
// })

      // $("#chkcar").prop('checked','รถยนต์')
       // $("#chkmotor").prop('checked', 'รถจักยานยนต์')


         </script>
          
        </td>
        <tr></tr><td>มีพาหนะเป็นของตัวเอง</td>
        <td>
        <label class="checkbox-inline"><input id="chkhcar" value="รถยนต์" name="chkhcar" type="checkbox">รถยนต์</label>
        <label class="checkbox-inline"><input id="chkhmotor" value="รถจักยานยนต์" name="chkhmotor" type="checkbox">รถจักยานยนต์</label>
        <label class="checkbox-inline"><input id="chkhtruck" value="รถบรรทุก" name="chkhtruck" type="checkbox">รถบรรทุก</label>
        </td>
        <tr></tr><td>ความสามารถพิเศษอื่นๆ</td>
        <td>
        <input class="form-control" id="skill1" name="skill1">
        <input class="form-control" id="skill2" name="skill2">
        <input class="form-control" id="skill3" name="skill3">
        <input class="form-control" id="skill4" name="skill4">
        <input class="form-control" id="skill5" name="skill5">
        </td>
        <tr></tr><td><label>สามารถปฎิบัติงานต่างจังหวัด</label></td>
                <td>
                <label class="radio-inline"><input type="radio" id="rdbgo" name="rdbgo" value="ไปได้">ไปได้</label>
                <label class="radio-inline"><input type="radio" id="rdbgo" name="rdbgo" value="ไปไม่ได้">ไปไม่ได้</label>
                </td>
        <tr></tr><td><label>สามารถปฎิบัติงานต่างประเทศ</label></td>
                  <td> 
                  <label class="radio-inline"><input type="radio" id="rdbgonation" name="rdbgonation" value="ไปได้">ไปได้</label>
                  <label class="radio-inline"><input type="radio" id="rdbgonation" name="rdbgonation" value="ไปไม่ได้">ไปไม่ได้</label>
                  </td>
        <tr></tr><td><label>ประวัติการถูกดำเนินคดั</label></td>
        <td>
                  <label class="radio-inline"><input type="radio" id="rdblaw" name="rdblaw" value="เคย">เคย</label>
                  <label class="radio-inline"><input type="radio" id="rdblaw" name="rdblaw" value="ไม่เคย">ไม่เคย</label>
        </td>
            <tr></tr><td> <label>ประวัติการดื่มสุรา</label>  </td>
            <td>
            <label class="radio-inline"><input type="radio" id="rdbdrink" name="rdbdrink" value="ดื่ม">ดื่ม</label>
            <label class="radio-inline"><input type="radio" id="rdbdrink" name="rdbdrink" value="ไม่ดื่ม">ไม่ดื่ม</label></td>
          <tr></tr><td><label>ประวัติสูบบุหรี่</label> </td>
          <td>
          <label class="radio-inline"><input type="radio" id="rdbsmoke" name="rdbsmoke" value="สูบ">สูบ</label>
          <label class="radio-inline"><input type="radio" id="rdbsmoke" name="rdbsmoke" value="ไม่สูบ">ไม่สูบ</label></td>

        </tbody>
        </table>    

       <br>
<button onclick="myFunction()">Click me</button>
<script>
// function myFunction('rdbsmoke0').check {
//    if('#rdbsmoke0')
// }
</script>

   <!-- Large modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">ประวัติฝึกอบรม</button>

  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="gridSystemModalLabel">ประวัติการฝึกอบรมและฝึกงาน</h4>
        </div>
        <div class="modal-body">            
         <div class="row clearfix">
           <div class="col-md-12 column">
                 <table class="table table-bordered table-hover" id="tab_logic">
                  <thead>
                  <tr >
                        <th class="text-center">
                          #
                        </th>
                        <th colspan="2" class="text-center">
                        ระยะเวลา
                        </th>
              <th class="text-center">
                สถาบัน/หน่วยงาน/บริษัท
              </th>
               <th class="text-center"> 
                หลักสูตร/ตำแหน่ง
              </th>
            </tr>
          </thead>
          <tbody id="traintb">
            <tr>
              <td>
              1
              </td>
              <td>
              ตั้งแต่  เดือน<input type="text" name='stmonth[]'  placeholder='เดือน' class="form-control"/>
              ปี<input type="text" name='styear[]' placeholder='ปี' class="form-control"/>
              </td>
              <td>
              จนถึง  เดือน<input type="text" name='etmonth[]' placeholder='เดือน' class="form-control"/>
              ปี<input type="text" name='etyear[]' placeholder='ปี' class="form-control"/>
              </td>
              <td>
              <input type="text" name='tname[]' placeholder='สถาบัน/หน่วยงาน/บริษัท' class="form-control"/>
              </td>
              <td>
              <input type="text" name='tpos[]' placeholder='หลักสูตร/ตำแหน่ง' class="form-control"/>
              </td>
            </tr>
                
          </tbody>
        </table>
        <a id="add_train" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
    </div>
    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
          <button type="submit" class="btn btn-primary btn-xs" id="save" data-dismiss="modal"><i class="fa fa-floppy-o" aria-hidden="true"></i> บันทึก</button>
        </div>
       </div>
        </div>
        </div>

</div>
                  <script>
              $("#add_train").click(function(event) {
               add_train();
                });
               function add_train(){
               var row = ($('#traintb tr').length-0)+1;
                var tr = '<tr>'+
              '<td>'+row+'</td>'+
              '<td>ตั้งแต่  เดือน<input type="text" name="stmonth[]"  placeholder="เดือน" class="form-control"/>ปี<input type="text" name="styear[]"" placeholder="ปี" class="form-control"/></td>'+
              '<td>จนถึง  เดือน<input type="text" name="etmonth[]" placeholder="เดือน" class="form-control"/>ปี<input type="text" name="etyear[]" placeholder="ปี" class="form-control"/></td>'+
              '<td><input type="text" name="tname[]" placeholder="สถาบัน/หน่วยงาน/บริษัท" class="form-control"/></td>'+
              '<td><input type="text" name="tpos[]" placeholder="หลักสูตร/ตำแหน่ง" class="form-control"/></td>'+
              '</tr>';
              
            $("#traintb").append(tr);
                }         
            </script>

   <div id="menu4" class="tab-pane fade">
   <div class="form-group">
          <div class="row">
          <div class="col-xs-4">
          <label for="emp_project">โครงการ</label>
                  
                  <select  class="form-inline form-control input-sm" id="emp_project" name="emp_project">
                         <?php $this->db->select('*');
                         $this->db->order_by('emp_id','asc');
                                $q = $this->db->get('emp_dd');
                                $res = $q->result();
                                foreach ($res as  $va) {
                          ?>
                         <option value="<?php echo $va->emp_id; ?>"><?php echo $va->dd_project; ?></option>
                         <?php } ?>
                      </select>
                  
                  </div>
          <div class="col-xs-4">
          <label for="emp_department">แผนก</label>
                  
                  <select  class="form-inline form-control input-sm" id="emp_department" name="emp_department">
                         <?php $this->db->select('*');
                         $this->db->order_by('emp_id','asc');
                                $q = $this->db->get('emp_dd');
                                $res = $q->result();
                                foreach ($res as  $va) {
                          ?>
                         <option value="<?php echo $va->emp_id; ?>"><?php echo $va->dd_department; ?></option>
                         <?php } ?>
                      </select>
              
                  </div>
          <div class="col-xs-4">
          <label for="emp_position">ตำแหน่ง</label>
                  
                  <select  class="form-inline form-control input-sm" id="emp_position" name="emp_position">
                         <?php $this->db->select('*');
                         $this->db->order_by('emp_id','asc');
                                $q = $this->db->get('emp_dd');
                                $res = $q->result();
                                foreach ($res as  $va) {
                          ?>
                         <option value="<?php echo $va->emp_id; ?>"><?php echo $va->dd_position; ?></option>
                         <?php } ?>
                      </select> 
                 </div>
                  </div>
                  <br>
                  <div class="row">
                  <div class="col-xs-4 ">
                  <label for="emp_lead">ผู้บังคับบัญชา</label>&nbsp;&nbsp;
                  <input type="text" class="form-control" id="emp_lead" name="emp_lead">
                  </div>
                  <div class='col-sm-6'>
                        <div class="form-group">
                        <label for="job_datestart">วันที่เริ่มงาน</label>&nbsp;&nbsp;
            <div class="input-group">
              <span class="input-group-addon"><i class="icon-calendar22"></i></span>
              <input type="text" class="form-control daterange-single" id="job_datestart" name="job_datestart">
               </div>
                </div>
        
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
                  </div>
                  </div>
                    <br><br>
        <table class="form-inline table table-striped">
        <tr>บัญชีธนาคาร และ ประกันสังคม</tr><td></td>
        <td><label class="form-inline" for="dd_bank">ธนาคาร</label>&nbsp;&nbsp;  <select class="form-inline form-control input-lg" id="dd_bank" name="dd_bank">
                         <?php $this->db->select('*');
                         $this->db->order_by('emp_id','asc');
                                $q = $this->db->get('emp_dd');
                                $res = $q->result();
                                foreach ($res as $va) {       
                          ?>
                        <option value="<?php echo $va->emp_id; ?>"><?php echo $va->dd_bank; ?></option>
                         <?php } ?>
                      </select> 
                      &nbsp;&nbsp;<label class="form-inline" for="emp_bankmajor">สาขา</label>&nbsp;&nbsp;
                      <input type="text" class="form-inline form-control" id="emp_bankmajor" name="emp_bankmajor">
                      <div class="form-group has-success has-feedback">
                      &nbsp;&nbsp; <label class="form-inline" for="emp_bookbank">เลขที่บัญชี</label>&nbsp;&nbsp; 
                      <input type="text" class="form-inline form-control" id="emp_bookbank" name="emp_bookbank">
                    <!--  <span class="glyph-icon glyphicon-ok form-control-feedback"></span> -->
                      </div>
                      </td>
                      <br>
                      <tr></tr>

                      <td></td>
                     
                      <td>
                      <label for="emp_insuid">เลขที่ประกันสังคม</label>&nbsp;&nbsp;
                      <input type="text" class="form-control input-sm" placeholder="เลขประกันสังคม" id="emp_insuid" name="emp_insuid">&nbsp;&nbsp; 
                      <label for="emp_hos">โรงพยาบาลรับการรักษา</label>&nbsp;&nbsp; 
                      <input type="text" class="form-control input-sm" placeholder="ชื่อโรงพยาบาล" id="emp_hos" name="emp_hos">
                      </td>
                      

        </table>
         </div>
                </div>   
              
          
          </div>
          
                      
                
                
                </form>
  
                 
      

    

                    <!-- /profile info -->

        
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