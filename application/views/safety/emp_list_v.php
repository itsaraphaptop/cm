<style>
.top1 img {
    width:304px;
    height:236px;
}
</style>
  
 
    <!-- /core JS files -->
    <!-- Theme JS files -->
 
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script> -->

    
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/picker_date.js"></script> -->
<!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
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
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Traffic sources -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title">รายชื่อพนักงานทั้งหมด</h6>
                            <div class="heading-elements">
                                
                            </div>
                        </div>

                        <div class="container-fluid">

                            <div class="row">
                            <!-- user profile -->
                            <?php foreach ($res as $empall){ ?>


    
 
                             <div class="col-lg-3 col-md-6">
                            <div class="thumbnail no-padding">
                                <div class="thumb">
                                    <img src="<?php echo base_url(); ?>profile/<?php echo $empall->user_img; ?>" alt="" class="top1" style="
    height: 200px;
    width: 400px;">
                                    <div class="caption-overflow">
                                        <span>
                                            <a href="<?php echo base_url(); ?>profile/thumb_2016-10-25_7775.jpg" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-plus2"></i></a>
                                            <a href="user_pages_profile.html" class="btn bg-success-400 btn-icon btn-xs"><i class="icon-link"></i></a>
                                        </span>
                                    </div>
                                </div>
                            
                                <div class="caption text-center">
                                    <h6 class="text-semibold no-margin">
                                    <?php 
                                    if($empall->sex_st=='0'){ echo "นาย"; }
                                    elseif ($empall->sex_st=='1') { echo "นาง/นางสาว"; } 
                                    ?> 

                                        <?php echo $empall->firstname; ?>
                                        <?php echo $empall->lastname; ?><small class="display-block">พนักงาน</small></h6>
                                    <ul class="icons-list mt-15">
                                        <li><a title="แก้ไขข้อมูลส่วนตัว" data-popup="tooltip" data-toggle="modal" data-target="#profiledata<?php echo $empall->id_st ?>"><i class="icon-vcard"></i></a></li>
                                        <li><a href="#" data-popup="tooltip" title="แก้ไขที่ทำงาน" data-container="body" data-original-title="แก้ไขที่ทำงาน"><i class="icon-user-tie"></i></a></li>
                                        <li><a href="#" data-popup="tooltip" title="แก้ไขประวัติกระทำผิด" data-container="body" data-original-title="แก้ไขประวัติกระทำผิด"><i class="icon-clipboard4"></i></a></li>
                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end user profile -->
               


<div id="profiledata<?php echo $empall->id_st ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">แก้ไขข้อมูลส่วนตัว</h4>
      </div>
       <form method="post" id="" class="stepy-clickable" action="<?php echo base_url(); ?>safety_archive/EditEmp/<?php echo $empall->id_st; ?>">
      <div class="modal-body">
        <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                        <label for="fname">ชื่อ:</label>
                        <input name="fname<?php echo $empall->id_st ?>" placeholder="ชื่อภาษาไทย" class="form-control input-sm" type="text" value="<?php echo $empall->firstname; ?>">
                         <input name="idemp<?php echo $empall->id_st; ?>" type="hidden" value="<?php echo $empall->id_st; ?>">
                               </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                        <label for="lname<?php echo $empall->id_st ?>">นามสกุล:</label>
                                        <input name="lname<?php echo $empall->id_st ?>" value="<?php echo $empall->lastname; ?>" placeholder="นามสกุลภาษาไทย" class="form-control input-sm" type="text">
                    </div>
                            </div>
                             <div class="col-md-3">
                              <div class="form-group">
                        <label for="nname<?php echo $empall->id_st ?>">ชื่อเล่น :</label>
                                        <input name="nname<?php echo $empall->id_st ?>" value="<?php echo $empall->nickname; ?>" placeholder="ชื่อเล่น" class="form-control input-sm"  type="text">
                    </div>
                            </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="ddsex<?php echo $empall->id_st ?>">เพศ :</label>
                          <select class="form-control input-sm" name="ddsex<?php echo $empall->id_st ?>" ">
                            <option value="<?php echo $empall->sex_st ?>"><?php if($empall->sex_st=='0'){echo "ชาย";}else { echo "หญิง";} ?></option>
                            <option value="0">ชาย</option>
                            <option value="1">หญิง</option>

                        </select>
                            </div>
                            </div>

                   
             </div>
            <div class="row">
                 <div class="col-md-3">
                    <div class="form-group">
                        <label for="cardid<?php echo $empall->id_st ?>">เลขที่บัตรประชาชน :</label>
                        <input name="cardid<?php echo $empall->id_st ?>" placeholder="เลขที่บัตรประชาชน" class="form-control input-sm" type="text" value="<?php echo $empall->cityzen_st; ?>">
                    </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form-group">
                        <label for="typeblood<?php echo $empall->id_st ?>">กรุ๊ปเลือด :</label>
                        <input name="typeblood<?php echo $empall->id_st ?>" placeholder="กรุ๊ปเลือด" class="form-control input-sm" type="text" value="<?php echo $empall->typeblood; ?>">
                    </div>
                 </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="huhight<?php echo $empall->id_st ?>">ส่วนสูง :</label>
                        <input name="huhight<?php echo $empall->id_st ?>" placeholder="ส่วนสูง" class="form-control input-sm" type="text" value="<?php echo $empall->hm_h; ?>">
                    </div>
                    </div>
                       <div class="col-md-3">
                    <div class="form-group">
                        <label for="huweight<?php echo $empall->id_st ?>">น้ำหนัก :</label>
                        <input name="huweight<?php echo $empall->id_st ?>" placeholder="น้ำหนัก" class="form-control input-sm" type="text" value="<?php echo $empall->hm_w; ?>">
                    </div>
                 </div>
            </div>
            <div class="row">
             <div class="form-group">
                                <label>วันเกิด</label>
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                  <input type="text" class="form-control daterange-single" id="bd<?php echo $empall->id_st ?>" name="bd<?php echo $empall->id_st ?>" value="<?php echo $empall->bd_st; ?>">
                                </div>
                              </div>
             
                        <div class="col-md-3">
                    <div class="form-group">
                        <label for="nttype<?php echo $empall->id_st ?>">เชื้อชาติ :</label>
                        <input name="nttype<?php echo $empall->id_st ?>" placeholder="เชื้อชาติ" class="form-control input-sm" type="text" value="<?php echo $empall->nation; ?>">
                    </div>
                 </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="religion<?php echo $empall->id_st ?>">สัญชาติ :</label>
                        <input name="religion<?php echo $empall->id_st ?>" placeholder="สัญชาติ" class="form-control input-sm" type="text" value="<?php echo $empall->religion; ?>">
                    </div>
                    </div>
                          <div class="col-md-3">
                      <div class="form-group">
                        <label for="ddsingle<?php echo $empall->id_st ?>">สถานภาพ :</label>
                          <select class="form-control input-sm" name="ddsingle<?php echo $empall->id_st ?>" value="">
                            <option value="<?php echo $empall->status_st ?>"><?php if($empall->status_st=='0'){echo "โสด";}else { echo "สมรส";} ?></option>
                            <option value="0">โสด</option>
                            <option value="1">สมรส</option>

                        </select>
                            </div>
                            </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="humail<?php echo $empall->id_st ?>">Email : </label>
                        <input name="humail<?php echo $empall->id_st ?>" placeholder="อีเมลส์" class="form-control input-sm" type="text" value="<?php echo $empall->email; ?>">
                    </div>
                 </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone<?php echo $empall->id_st ?>">เบอร์โทรศัพท์ : </label>
                        <input name="phone<?php echo $empall->id_st ?>" placeholder="เบอร์โทรศัพท์" class="form-control input-sm" type="text" value="<?php echo $empall->phonenum; ?>">
                    </div>
                 </div>
            </div>
       <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
     <label for="addressst<?php echo $empall->id_st ?>">ที่อยู่ปัจจุบัน :</label>
       <textarea name="addressst<?php echo $empall->id_st ?>" rows="4" class="form-control input-sm" cols="40" placeholder="ที่อยู่ปัจจุบัน" value=""><?php echo $empall->add_st; ?></textarea>
   </div>
                   </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" id="edits<?php echo $empall->id_st ?>" >บันทึก</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
</form>
  </div>
</div>                
<?php } ?>
                 

            

<!-- Modal -->

                            </div>
                        </div>

                 
                    </div>
                    <!-- /traffic sources -->


                    <!-- Quick stats boxes -->
                

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->
        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->