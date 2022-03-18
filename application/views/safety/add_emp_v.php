      <div class="page-header">
                    <div class="page-header-content">
                        <div class="page-title">
                            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Safety</span></h4>
                        </div>

                        <div class="heading-elements">
                            <form class="heading-form" action="#">
                                <div class="form-group">
                                    <div class="daterange-custom" id="reportrange">
                                        <div class="daterange-custom-display"></div>
                                        <span class="badge bg-danger-400">24</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>panel/office"><i class="icon-home2 position-left"></i>NinjaERP</a></li>
                            
                            <li><a href="<?php echo base_url(); ?>safety/st_dashboard">Safety 's Dashboard</a></li>
                            <li class="active">รายชื่อพนักงาน</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-user position-left"></i>
                                    พนักงาน
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="<?php echo base_url(); ?>safety/employee_list"><i class="icon-user-lock"></i>รายชื่อพนังงาน</a></li>
                                    <li><a href="<?php echo base_url(); ?>safety/New_Employee"><i class="icon-user-plus"></i>เพิ่มพนักงาน</a></li>
                                    <li><a href="#"><i class="icon-vcard"></i>ตั้งค่าพนักงาน</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

    <!-- Core JS files -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->
    <!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/wizards/stepy.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/jasny_bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/validation/validate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/uploaders/fileinput.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/wizard_stepy.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/uploader_bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/picker_date.js"></script>
    <!-- /theme JS files -->

<div class="content">

    <!-- Clickable title -->
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h6 class="panel-title">สร้างพนักงานใหม่</h6>
                            <div class="heading-elements">
                              
                            </div>
                        </div>
                        <form method="post" id="" class="stepy-clickable" action="<?php echo base_url(); ?>safety_archive/addEmp">
                        <!-- <form class="stepy-clickable" method="post" action="<?php echo base_url(); ?>datastore/addproject"> -->
                        <fieldset title="1">
                        <legend class="text-semibold">ข้อมูลทั่วไป</legend>
                        <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                        <label for="fname">ชื่อ:</label>
                        <input name="fname" placeholder="ชื่อภาษาไทย" class="form-control input-sm" type="text">
                               </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                        <label for="lname">นามสกุล:</label>
                                        <input name="lname" placeholder="นามสกุลภาษาไทย" class="form-control input-sm" type="text">
                    </div>
                            </div>
                             <div class="col-md-3">
                              <div class="form-group">
                        <label for="nname">ชื่อเล่น :</label>
                                        <input name="nname" placeholder="ชื่อเล่น" class="form-control input-sm"  type="text">
                    </div>
                            </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="ddsex">เพศ :</label>
                          <select class="form-control input-sm" name="ddsex">
                            <option value="0">ชาย</option>
                            <option value="1">หญิง</option>

                        </select>
                            </div>
                            </div>

                   
             </div>
            <div class="row">
                 <div class="col-md-3">
                    <div class="form-group">
                        <label for="cardid">เลขที่บัตรประชาชน :</label>
                        <input name="cardid" placeholder="เลขที่บัตรประชาชน" class="form-control input-sm" type="text">
                    </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form-group">
                        <label for="typeblood">กรุ๊ปเลือด :</label>
                        <input name="typeblood" placeholder="กรุ๊ปเลือด" class="form-control input-sm" type="text">
                    </div>
                 </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="huhight">ส่วนสูง :</label>
                        <input name="huhight" placeholder="ส่วนสูง" class="form-control input-sm" type="text">
                    </div>
                    </div>
                       <div class="col-md-3">
                    <div class="form-group">
                        <label for="huweight">น้ำหนัก :</label>
                        <input name="huweight" placeholder="น้ำหนัก" class="form-control input-sm" type="text">
                    </div>
                 </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                          <div class="form-group">
                            <label>วันเกิด : </label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                              <input type="text" class="form-control daterange-single" id="bdate" name="bdate">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                    <div class="form-group">
                        <label for="nttype">เชื้อชาติ :</label>
                        <input name="nttype" placeholder="เชื้อชาติ" class="form-control input-sm" type="text">
                    </div>
                 </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="religion">สัญชาติ :</label>
                        <input name="religion" placeholder="สัญชาติ" class="form-control input-sm" type="text">
                    </div>
                    </div>
                          <div class="col-md-3">
                      <div class="form-group">
                        <label for="ddsingle">สถานภาพ :</label>
                          <select class="form-control input-sm" name="ddsingle">
                            <option value="0">โสด</option>
                            <option value="1">สมรส</option>

                        </select>
                            </div>
                            </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="humail">Email : </label>
                        <input name="humail" placeholder="Email" class="form-control input-sm" type="text">
                    </div>
                 </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="phone">เบอร์โทรศัพท์ : </label>
                        <input name="phone" placeholder="phone" class="form-control input-sm" type="text">
                    </div>
                 </div>
            </div>
       <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
     <label for="addressst">ที่อยู่ปัจจุบัน :</label>
       <textarea name="addressst" rows="4" class="form-control input-sm" cols="40" placeholder="ที่อยู่ปัจจุบัน"></textarea>
   </div>
                   </div>
</div>

</fieldset>

<button type="submit" class="btn btn-primary stepy-finish">Submit <i class="icon-check position-right"></i></button>
            
                        </form>
                    </div>
                    <!-- /clickable title -->

    </div>