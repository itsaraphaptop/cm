<?php foreach ($res as $val) {
  $id = $val->project_id;
  $project_code = $val->project_code;
  $project_name = $val->project_name;
  $address = $val->project_address;
  $contact =$val->project_cname;
  $tel = $val->project_tel;
  $fax = $val->project_fax;
  $email = $val->project_email;
  $project_mcode = $val->project_mcode;
$project_mnameth = $val->project_mnameth;
$project_mnameen = $val->project_mnameen;
$project_maddress = $val->project_maddress;
$project_maddress = $val->project_maddress;
$project_mtel = $val->project_onertel;
$project_mfax = $val->project_mfax;
$project_bnameth = $val->project_bnameth;
$project_bnameen = $val->project_bnameen;
$project_baddress = $val->project_baddress;
$project_btel = $val->project_btel;
$project_bfax = $val->project_bfax;
$project_detail = $val->project_detail;
$project_value = $val->project_value;
$project_contract = $val->project_contract;
$project_start = $val->project_start;
$project_stop = $val->project_stop;
$project_engineer = $val->project_engineer;
} ?>
<div class="panel-body">
<div class="row">
    <div class="col-xs-12">

<form  method="post" action="<?php echo base_url();?>index.php/datastore/updateproject">
						<h4 class="text-info">ข้อมูลโครงการ</h4>
						<hr>
                        <div class="row">
                            <div class="col-xs-3">
                              <div class="form-group">
				    	<label for="projno">รหัสโครงการ</label>
				    	<input type="text" name="projno" placeholder="กรอกรหัสโครงการ" value="<?php echo $project_code; ?>" class="form-control input-sm"class="form-control input-sm">
              <input type="hidden" value="<?php echo $id; ?>" name="projid">
                               </div>
                            </div>
                            <div class="col-xs-9">
                              <div class="form-group">
				    	<label for="projname">ชื่อโครงการ</label>
                                        <input type="text" name="projname" value="<?php echo $project_name; ?>" placeholder="กรอกชื่อโครงการ" class="form-control input-sm"class="form-control input-sm" required>
			    	</div>
                            </div>
			 </div> <!-- end row -->

                         <div class="row">
                            <div class="col-xs-12">
                              <div class="form-group">
				    	<label for="address">ที่อยู่</label>
				    	<input type="text" name="address" placeholder="กรอกชื่อที่อยู่" value="<?php echo $address; ?>" class="form-control input-sm"class="form-control input-sm">
			    	</div>
                            </div>
			 </div> <!-- end row -->

                         <div class="row">
                         <div class="col-xs-3">
                              <div class="form-group">
                                        <label for="worktype">ระบบงาน</label>
				    	<select class="form-control input-sm" name="worktype" >
                                            <option value="Construction">Construction</option>
                                            <option value="real Estate">Real Estate</option>
                                            <option value="Software Development">Software Development</option>
                                            <option value="CSR">CSR</option>
                                        </select>
                              </div>
                            </div>
                             <div class="col-xs-3">
                              <div class="form-group">
                                        <label for="typejob">ลักษณะงาน</label>
				    	<select class="form-control input-sm" name="typejob">
                                            <option value="M/E">M/E</option>
                                            <option value="Civil">Civil</option>
                                            <option value="M/E and Civil">M/E and Civil</option>
                                        </select>
                              </div>
                            </div>

                             <div class="col-xs-3">
                              <div class="form-group">
                                        <label for="contact">ชื่อผู้ติดต่อ</label>
                                        <input type="text" name="contact" value="<?php echo $contact; ?>" placeholder="กรอกชื่อผู้ติดต่อ" class="form-control input-sm">
                              </div>
                            </div>
                            <div class="col-xs-3">
                              <div class="form-group">
                                        <label for="custype">ประเภทงาน</label>
				    	<select class="form-control input-sm" name="custype" >
                                            <option value="1">เอกชน</option>
                                            <option value="2">ราชการ / รัฐวิสาหกิจ</option>
                                            <option value="3">ต่างประเทศ</option>
                                        </select>
                              </div>
                            </div>
                        </div><!-- end row -->

						<hr>


						<h4 class="text-info">รายละเอียดเจ้าของงาน</h4>
						<hr>
                         <div class="row">
                            <div class="col-xs-3">
                              <div class="form-group">
                                        <label for="phonenumber">เบอร์โทร</label>
                                        <input type="text" name="phonenumber" value="<?php echo $tel; ?>" placeholder="เบอร์โทร" class="form-control input-sm">
                              </div>
                            </div>

                            <div class="col-xs-3">
                              <div class="form-group">
                                        <label for="fax">Fax</label>
                                        <input type="text" name="fax" value="<?php echo $fax; ?>" placeholder="แฟกซ์" class="form-control input-sm">
                              </div>
                            </div>
                             <div class="col-xs-6">
                              <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" value="<?php echo $email; ?>" placeholder="อีเมล" class="form-control input-sm">
                              </div>
                            </div>
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-xs-12">
                              <div class="form-group">
				    	<label for="ownercode">รหัสเจ้าของโครงการ</label>
				    	<input type="text" name="ownercode" value="<?php echo $project_mcode; ?>" placeholder="กรอกรหัสเจ้าของโครงการ" class="form-control input-sm">
			    	</div>
                            </div>
			 </div>  <!--end row-->

                         <div class="row">
                            <div class="col-xs-12">
                              <div class="form-group">
				    	<label for="ownername_th">ชื่อเจ้าของงาน(TH)</label>
				    	<input type="text" name="ownername_th" value="<?php echo $project_mnameth; ?>" placeholder="กรอกชื่อภาษาไทย" class="form-control input-sm">
			    	</div>
                            </div>
			 </div> <!-- end row -->

                         <div class="row">
                            <div class="col-xs-12">
                              <div class="form-group">
				    	<label for="ownername_en">ชื่อเจ้าของงาน(EN)</label>
				    	<input type="text" name="ownername_en" value="<?php echo $project_mnameen; ?>" placeholder="กรอกชื่อภาษาอังกฤษ" class="form-control input-sm">
			    	</div>
                            </div>
			 </div> <!-- end row -->

                         <div class="row">
                            <div class="col-xs-12">
                              <div class="form-group">
				    	<label for="owner_address">ที่อยู่</label>
				    	<input type="text" name="owner_address" value="<?php echo $project_maddress; ?>" placeholder="กรอกชื่อที่อยู่" class="form-control input-sm">
			    	</div>
                            </div>
			 </div> <!-- end row -->

                         <div class="row">
                            <div class="col-xs-6">
                              <div class="form-group">
                                        <label for="owner_phonenumber">เบอร์โทร</label>
                                        <input type="text" name="project_onertel" value="<?php echo $project_mtel; ?>" placeholder="เบอร์โทร" class="form-control input-sm">
                              </div>
                            </div>

                            <div class="col-xs-6">
                              <div class="form-group">
                                        <label for="owner_fax">Fax</label>
                                        <input type="text" name="owner_fax" value="<?php echo $project_mfax; ?>" placeholder="แฟกซ์" class="form-control input-sm">
                              </div>
                            </div>
                        </div> <!--end row-->


						<hr>


						<h4 class="text-info">รายละเอียดผู้รับเหมา</h4>
						<hr>
                        <div class="row">
                            <div class="col-xs-12">
                              <div class="form-group">
				    	<label for="contractor_name_th">ชื่อผู้รับเหมา(ไทย)</label>
				    	<input type="text" value="<?php echo $project_bnameth; ?>" name="contractor_name_th" placeholder="กรอกชื่อภาษาไทย" class="form-control input-sm">
			    	</div>
                            </div>
			 </div>  <!--end row-->

                         <div class="row">
                            <div class="col-xs-12">
                              <div class="form-group">
				    	<label for="contractor_name_en">ชื่อผู้รับเหมา(EN)</label>
				    	<input type="text" value="<?php echo $project_bnameen; ?>" name="contractor_name_en" placeholder="กรอกชื่อภาษาอังกฤษ" class="form-control input-sm">
			    	</div>
                            </div>
			 </div> <!-- end row -->

                         <div class="row">
                            <div class="col-xs-12">
                              <div class="form-group">
				    	<label for="contractor_address">ที่อยู่</label>
				    	<input type="text" value="<?php echo $project_baddress; ?>" name="contractor_address" placeholder="กรอกชื่อที่อยู่" class="form-control input-sm">
			    	</div>
                            </div>
			 </div> <!-- end row -->

                         <div class="row">
                            <div class="col-xs-6">
                              <div class="form-group">
                                        <label for="contractor_phonenumber">เบอร์โทร</label>
                                        <input type="tel" value="<?php echo $project_btel; ?>" name="contractor_phonenumber" placeholder="เบอร์โทร" class="form-control input-sm">
                              </div>
                            </div>

                            <div class="col-xs-6">
                              <div class="form-group">
                                        <label for="fax">Fax</label>
                                        <input type="tel" value="<?php echo $project_bfax; ?>" name="contractor_fax" placeholder="แฟกซ์" class="form-control input-sm">
                              </div>
                            </div>
                        </div> <!-- end row -->


						<hr>


						<h4 class="text-info">ลักษณะงาน</h4>
						<hr>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                <label for="projectdetail" >รายละเอียดโครงการ</label>
                                <textarea class="form-control input-sm" name="projectdetail" rows="3"><?php echo $project_detail; ?></textarea>
                              </div>
                            </div>
                          </div>  <!--end row-->

                         <div class="row">
                            <div class="col-xs-6">
                              <div class="form-group">
                                  <label for="projectval" >มูลค่าโครงการ</label>
				    	<input type="text" value="<?php echo $project_value; ?>"  name="projectval" placeholder="กรอกมูลค่าโครงการ" class="form-control input-sm">
			    </div>
                            </div>
                            <div class="col-xs-6">
                              <div class="form-group">
                                        <label for="insurcontract">สัญญาประกัน / ปี</label>
                                        <input type="text" value="<?php echo $project_contract; ?>"  name="insurcontract" placeholder="กรอกระยะเวลาสัญญา" class="form-control input-sm">
                              </div>
                            </div>
                        </div><!-- end row -->


                        <div class="row">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="startproject">เริ่มต้นโครงการ</label>
                                <div class='input-group  date' id='iddate'>
                                    <input type='date' value="<?php echo $project_start; ?>"  name="startproject" class="form-control input-sm date" id="datepicker" />
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-3">
                            <div class="form-group">
                                 <label for="endtproject">ปิดโครงการ</label>
                                 <div class='input-group date' id='iddate'>
                                     <input type='date' value="<?php echo $project_stop;?>"  name="endtproject"class="form-control input-sm date" id="datepicker2" />
                                </div>
                            </div>
                        </div>
                        </div>


                        <div class="row">
                            <div class="col-xs-12">
                              <div class="form-group">
                                  <label for="projectmanager" >วิศวะกรโครงการ</label>
				    	<input type="text" value="<?php echo $project_engineer; ?>" name="projectmanager" placeholder="ชื่อวิศวะผู้ดูแลโครงการ" class="form-control input-sm">

                              </div>
                            </div>
                        </div><!--end row-->

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">บันทึก</button>
                                    <!-- <button class="btn btn-danger" type="reset">ล้างข้อมูล</button> -->
                                </div>
                            </div>
                    </div><!-- end row -->
</form>
		</div>
    </div>
</div>

<script>
            // $(document).ready(function() {
                // create DatePicker from input HTML element
                $("#datepicker").kendoDatePicker({
                    format : "yyyy-MM-dd"
                });
                $("#datepicker2").kendoDatePicker({
                    format : "yyyy-MM-dd"
                });
                $("#invdate").kendoDatePicker({
                    format : "yyyy-MM-dd"
                });
                $("#taxdate").kendoDatePicker({
                    format : "yyyy-MM-dd"
                });
                $("#monthpicker").kendoDatePicker({
                    // defines the start view
                    start: "year",

                    // defines when the calendar should return date
                    depth: "year",

                    // display month and year in the input
                    format: "MMMM yyyy"
                });
            // });
            </script>
