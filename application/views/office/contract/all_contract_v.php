<?php
    function my_format_date($date){

      return date("d-m-Y",strtotime($date)) ;
    }

 ?>
 <?php $flag = $this->uri->segment(4); ?>
<style type="text/css" media="screen">

.tree,
.tree ul {
  
  padding:0;
  list-style:none;
  color:#369;
  position:relative;
}

.tree ul {margin-right:.100em} /* (indentation/2) */

.tree:before,
.tree ul:before {
  content:"";
  display:block;
  width:0;
  position:absolute;
  top:0;
  bottom:0;
  left:0;
  border-left:1px solid;
}

.tree li {
  margin:0;
  padding:0 1.5em; /* indentation + .5em */
  line-height:2em; /* default list item's `line-height` */
  font-weight:bold;
  position:relative;
}

.tree li:before {
  content:"";
  display:block;
  width:20px; /* same with indentation */
  height:0;
  border-top:1px solid;
  margin-top:-1px; /* border top width */
  position:absolute;
  top:1em; /* (line-height/2) */
  left:0;
}

.tree li:last-child:before {
  background:white; /* same with body background */
  height:auto;  
}
</style>


<div class="content">
          <div class="panel panel-flat border-top-lg border-top-success" >
				<div class="panel-heading">
							<h5 class="panel-title">รายการใบสั่งจ้างทั้งหมด</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                	</ul>
		                	</div>
						</div>
     <div class="panel-body">

     
      <div class="dataTables_wrapper no-footer">
			<table class="table table-hover table-xxs datatable-basicc">
          <thead>
          <tr>
              <th width="15%">เลขที่ใบจ้างซื้อ</th>
              <th width="10%">PR Code</th>
              <th width="25%">โครงการ/แผนก</th>
              <th width="30%">ผู้รับเหมา</th>
              <th width="10%">Approve</th>
              <th width="5%"></th> 
              <!-- <th>รายละเอียดใบสั่งจ้าง</th> -->
              <th width="5%" class="text-center">Actions</th>
          </tr>
          </thead>
          <tbody>

          <?php foreach ($res as $val) { ?>
                  <tr>
                      <td width="15%"><?php echo $val->lo_lono;?></td>
                      <td><?php echo $val->prno;?></td>
                      <td><?php  if($flag=="p"){  echo $val->project_name; } ?><?php if($flag=="d"){ echo $val->department_title; }  ?></td>
                      <td><?php echo $val->vender_name; ?> </td>
                      <?php if ($val->status == "approve") { ?>
                      <td><span class="label label-success"><?php echo $val->status; ?></span></td>
                      <?php }elseif ($val->status == "reject") { ?>
                      <td><span class="label bg-orange" data-toggle="modal" data-target="#modal_reject<?php echo $val->lo_lono; ?>">reject</span></td>
                      <?php }elseif ($val->status == 'disapprove') { ?>
                      <td><span class="label label-danger"><?php if($val->status=="disapprove"){echo "not allowed";} ?></span></td>
                      <?php }elseif($val->status == 'delete'){ ?>
                      <td><span class="label label-danger">Delete By <?=$val->deluser;?></span></td>
                      <?php }else{ ?>
                      <td><span class="label label-info"><?php if ($val->status=="wait") {echo "IN Process";} ?></span></td>
                      <?php } ?>
                      
                      <td><button type="button" class="label label-primary" data-toggle="modal" data-target="#modal_theme_primary<?php echo $val->lo_lono;?>">Tree <i class="icon-play3 position-right"></i></button>
                      </td>
                      <?php if ($val->status == "wait") { ?>
                      <td width="20%" class="text-center">
                        <div style="width: 150px;">
                        <ul class="icons-list">
                          <li><a data-toggle="modal" data-target="#openlo<?php echo $val->lo_id;?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-folder-open"></i></a></li>
                          <li><a class="preload" href="<?php echo base_url(); ?>contract/editnewworkorder/<?php echo $val->lo_lono;?>/<?=$val->projectcode;?>/<?php echo $flag; ?>" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>
                          <li><a id="del<?php echo $val->lo_lono;?>" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-trash"></i></a></li>
                          <li><a href="<?php echo base_url(); ?>report/contract_report/<?php echo $val->lo_lono; ?>/<?php echo $code;?>" data-popup="tooltip" title="" target="_blank" data-original-title="Print"><i class="icon-printer4"></i></a></li>
                        </ul>
                      </div>
                      </td>
                      <?php }else{ ?>
                      <td width="20%" class="text-center">
                        <div style="width: 150px;">
                        <ul class="icons-list">
                          <li><a data-toggle="modal" data-target="#openlo<?php echo $val->lo_id;?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-folder-open"></i></a></li>
                          <!-- <li><a class="preload" href="<?php echo base_url(); ?>contract/editcontract/<?php echo $val->lo_lono;?>/<?php echo $val->projectcode;?>" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li> -->
                          <!-- <li><a href="#" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-trash"></i></a></li> -->
                          <li><a href="<?php echo base_url(); ?>report/contract_report/<?php echo $val->lo_lono; ?>/<?php echo $code;?>" data-popup="tooltip" title="" target="_blank" data-original-title="Print"><i class="icon-printer4"></i></a></li>
                        </ul>
                        </div>
                      </td>

                      


                      <?php } ?>
                  </tr>
                  <div id="modal_theme_primary<?php echo $val->lo_lono;?>" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header bg-primary">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h6 class="modal-title"><?php echo $val->lo_lono; ?></h6>
                            </div>

                            <div class="modal-body">
                                <?php $this->db->select('*');
                                      $this->db->from('approve_wo');
                                      $this->db->where('app_project',$val->project_code);
                                      $this->db->where('app_pr',$val->lo_lono);
                                      $scc=$this->db->get()->result(); ?>
                                      <?php 
                                        $ts1 = "";
                                        $tl1 = "";
                                        $name1 = "";
                                        $date1 = "";
                                        $time1 = "";
                                        $ts2 = "";
                                        $tl2 = "";
                                        $name2 = "";
                                        $date2 = "";
                                        $time2 = "";
                                        $ts3 = "";
                                        $tl3 = "";
                                        $name3 = "";
                                        $date3 = "";
                                        $time3 = "";
                                        $ts4 = "";
                                        $tl4 = "";
                                        $name4 = "";
                                        $date4 = "";
                                        $time4 = "";
                                        $ts5 = "";
                                        $tl5 = "";
                                        $name5 = "";
                                        $date5 = "";
                                        $time5 = "";
                                        $ts6 = "";
                                        $tl6 = "";
                                        $name6 = "";
                                        $date6 = "";
                                        $time6 = "";
                                        $ts7 = "";
                                        $tl7  = "";
                                        $name7 = "";
                                        $date7 = "";
                                        $time7 = "";
                                        $ts8 = "";
                                        $tl8 = "";
                                        $name8 = "";
                                        $date8 = "";
                                        $time8 = "";
                                        $ts9 = "";
                                        $tl9 = "";
                                        $name9 = "";
                                        $date9 = "";
                                        $time9 = "";
                                        $ts10 = "";
                                        $tl10 = "";
                                        $name10 = "";
                                        $date10 = "";
                                        $time10 = "";
                                        foreach ($scc as $t) { 
                                                if($t->app_sequence=="1"){
                                                  $ts1=$t->status;
                                                  $tl1 = $t->lock;
                                                  $name1 = $t->app_midname;
                                                  $date1 = $t->app_date;
                                              $time1 = $t->app_time;
                                                }else if($t->app_sequence=="2"){
                                                  $ts2=$t->status;
                                                  $tl2 = $t->lock;
                                                  $name2 = $t->app_midname;
                                                  $date2 = $t->app_date;
                                              $time2 = $t->app_time;
                                                }else if($t->app_sequence=="3"){
                                                  $ts3=$t->status;
                                                  $tl3 = $t->lock;
                                                  $name3 = $t->app_midname;
                                                  $date3 = $t->app_date;
                                              $time3 = $t->app_time;
                                                }else if($t->app_sequence=="4"){
                                                  $ts4=$t->status;
                                                  $tl4 = $t->lock;
                                                  $name4 = $t->app_midname;
                                                  $date4 = $t->app_date;
                                              $time4 = $t->app_time;
                                                }else if($t->app_sequence=="5"){
                                                  $ts5=$t->status;
                                                  $tl5 = $t->lock;
                                                  $name5 = $t->app_midname;
                                                  $date5 = $t->app_date;
                                              $time5 = $t->app_time;
                                                }else if($t->app_sequence=="6"){
                                                  $ts6=$t->status;
                                                  $tl6 = $t->lock;
                                                  $name6 = $t->app_midname;
                                                  $date6 = $t->app_date;
                                              $time6 = $t->app_time;
                                                }else if($t->app_sequence=="7"){
                                                  $ts7=$t->status;
                                                  $tl7 = $t->lock;
                                                  $name7 = $t->app_midname;
                                                  $date7 = $t->app_date;
                                              $time7 = $t->app_time;
                                                }else if($t->app_sequence=="8"){
                                                  $ts8=$t->status;
                                                  $tl8 = $t->lock;
                                                  $name8 = $t->app_midname;
                                                  $date8 = $t->app_date;
                                              $time8 = $t->app_time;
                                                }else if($t->app_sequence=="9"){
                                                  $ts9=$t->status;
                                                  $tl9 = $t->lock;
                                                  $name9 = $t->app_midname;
                                                  $date9 = $t->app_date;
                                              $time9 = $t->app_time;
                                                }else if($t->app_sequence=="10"){
                                                  $ts10=$t->status;
                                                  $tl10 = $t->lock;
                                                  $name10 = $t->app_midname;
                                                  $date10 = $t->app_date;
                                              $time10 = $t->app_time;
                                                }
                                              } ?>
                                    <div >

                                  <ul class="tree">       
                                    <ul>
                                    <li <?php if($name1==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name1; ?>  <?php if($tl1=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts1!="no"){ echo ' <p style="color: green;"><b>Approved successfully. '.my_format_date($date1).' '.$time1.'</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                                      <ul>
                                        <li <?php if($name2==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name2; ?> <?php if($tl2=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts2!="no"){ echo ' <p style="color: green;"><b>Approved successfully.  '.my_format_date($date2).' '.$time2.'</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                                              <ul>
                                                <li <?php if($name3==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name3; ?> <?php if($tl3=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts3!="no"){ echo ' <p style="color: green;"><b>Approved successfully.  '.my_format_date($date3).' '.$time3.'</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                                              <ul>
                                                <li <?php if($name4==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name4; ?> <?php if($tl4=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts4!="no"){ echo ' <p style="color: green;"><b>Approved successfully.  '.my_format_date($date4).' '.$time4.'</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                                              <ul>
                                                <li <?php if($name5==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name5; ?> <?php if($tl5=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts5!="no"){ echo ' <p style="color: green;"><b>Approved successfully.  '.my_format_date($date5).' '.$time5.'</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                                              <ul>
                                                <li <?php if($name6==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name6; ?> <?php if($tl6=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts6!="no"){ echo ' <p style="color: green;"><b>Approved successfully.  '.my_format_date($date6).' '.$time6.'</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                                              <ul>
                                                <li <?php if($name7==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name7; ?> <?php if($tl7=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts7!="no"){ echo ' <p style="color: green;"><b>Approved successfully.  '.my_format_date($date7).' '.$time7.'</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                                              <ul>
                                                <li <?php if($name8==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name8; ?> <?php if($tl8=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts8!="no"){ echo ' <p style="color: green;"><b>Approved successfully.  '.my_format_date($date8).' '.$time8.'</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                                              <ul>
                                                <li <?php if($name9==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name9; ?> <?php if($tl9=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts9!="no"){ echo ' <p style="color: green;"><b>Approved successfully.  '.my_format_date($date9).' '.$time9.'</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                                              <ul>
                                                <li <?php if($name10==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name10; ?> <?php if($tl10=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts10!="no"){ echo ' <p style="color: green;"><b>Approved successfully.  '.my_format_date($date10).' '.$time10.'</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?></li>
                                
                                  
                                            </li>
                                        </li>
                                        </ul>
                                    </div>
                                    </div>

                                    <div class="modal-footer">
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>
                  <script type="text/javascript">
                            var pono = '<?php echo $val->lo_lono;?>';
                            $('#del'+pono).click(function(event) {

                                 swal({
                                     title: "Are you sure?",
                                     text: "คุณต้องการลบรายการนี้ใช่ไหม!!",
                                     type: "warning",
                                     showCancelButton: true,
                                     confirmButtonColor: "#EF5350",
                                     confirmButtonText: "ยืนยัน",
                                     cancelButtonText: "ยกเลิก",
                                     closeOnConfirm: false,
                                     closeOnCancel: false
                                 },
                                 function(isConfirm){
                                     if (isConfirm) {
                                      var pono = '<?php echo $val->lo_lono;?>';
                                      $.post('<?php echo base_url(); ?>contract_active/wo_del', {pono: pono}, function(data) {
                                      }).done(function(data) {
                                            var pj = '<?php echo $val->projectcode;?>';
                                            var json = $.parseJSON(data);
                                            var status = json.status;
                                            if(status){
                                              window.location.href = "<?php echo base_url(); ?>contract/allcontract/"+pj+"/p";
                                              // redirect('purchase/po_archive_pagination/'.$ins['bd_tenid']);
                                            }
                                      });

                                      
                                     }
                                     else {
                                         swal({
                                             title: "Cancelled",
                                             text: "ยกเลิกการลบรายการนี้ :)",
                                             confirmButtonColor: "#2196F3",
                                             type: "error"
                                         });
                                     }

                                 });





                            });
                          </script>
          <?php } ?>

         </tbody>
      </table>
</div>
</div>
</div>
<!-- Footer -->
			          <div class="footer text-muted">
			            <!-- © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a> -->
			          </div>
			          <!-- /footer -->
</div>
<?php $n=1; foreach($res as $val){?>
    <div id="modal_reject<?php echo $val->lo_lono; ?>" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content ">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h5 class="modal-title">Reject No. <?php echo $val->lo_lono; ?></h5>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="form-group">
        <label>หมายเหตุ</label>
        <input type="text" class="form-control" readonly="true" value="<?php echo $val->reject_remark; ?>">
      </div>
            </div>
        </div>
          <div class="modal-footer">
            <a data-dismiss="modal" class="btn bg-danger"><i class="icon-close2"></i> Close</a>
          </div>
        </div>
      </div>
    </div>

<?php } ?>

<!-- open modal -->
<?php foreach ($res as $val2) {
 $qev = $this->db->query("select * from vender where vender_id='$val2->subcontact'");
            $rven = $qev->result();
  ?>
 <!-- modal show detail po detail -->
  <div class="modal fade" id="openlo<?php echo $val2->lo_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">รายละเอียดใบสั่งจ้าง</h4>
       </div>
         <div class="modal-body">
             <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">เลขที่ใบสั่งจ้าง</label>
                  <p style="color: #337AB7;"><?php echo $val2->lo_lono;?></p>
                </div>
              </div>
              <div class="col-md-4">
                  <label for="">วันที่เอกสาร</label>
                  <p style="color: #337AB7;"><?php echo $val2->lodate;?></p>
              </div>
              <div class="col-md-4">
                  <label for="">อ้างอิง PO</label>
                  <p style="color: #337AB7;"><?php echo $val2->refquono;?></p>
              </div>
             </div>
             <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">โครงการ/แผนก</label>
                 <p style="color: #337AB7;"><?php  echo $val2->project_name; ?></p>
                </div>
              </div>
              <div class="col-md-4">
                  <label for="">ผู้รับจ้าง</label>
                  <?php foreach ($rven as $value) {?>
                  <p style="color: #337AB7;"><?php echo  $value->vender_name;?></p>
                  <?php } ?>
              </div>
             </div>
             <div class="row">
               <div class="col-md-4">
                 <label for="">เป็นสัญญา</label>
                 <p style="color: #337AB7;"><?php echo $val2->contacttype;?></p>
               </div>
               <div class="col-md-4">
                 <label for="">ลักษณะสัญญา</label>
                 <p style="color: #337AB7;"><?php echo $val2->contactdesc;?></p>
               </div>
               <div class="col-md-4">
                 <label for="">มูลค่าสัญญา</label>
                 <p style="color: #337AB7;"><?php echo $val2->contactamount;?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-4">
                 <label for="" >ลดมูลค่า</label>
                 <p style="color: #337AB7;"><?php echo $val2->disamount;?></p>
               </div>
               <div class="col-md-4">
                 <label for="">คงเหลือ</label>
                 <p style="color: #337AB7;"><?php echo $val2->amtbal;?>วัน</p>
               </div>
               <div class="col-md-4">
                 <label for="">ส่วนลดพิเศษคิดแบบ</label>
                 <p style="color: #337AB7;"><?php echo $val2->discount;?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-4">
                 <label for="">จำนวนเงินสุทธิ</label>
                 <p style="color: #337AB7;"><?php echo $val2->netamount;?></p>
               </div>
               <div class="col-md-4">
                 <label for="">คิดภาษี (%)</label>
                 <p style="color: #337AB7;"><?php echo $val2->vatper;?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-4">
                 <label for="">หักภาษี ณ ที่จ่าย</label>
                 <p style="color: #337AB7;"><?php echo $val2->tax;?></p>
               </div>
               <div class="col-md-4">
                 <label for="">เรียกเก็บเงิน</label>
                 <p style="color: #337AB7;"><?php echo $val2->amountre;?></p>
               </div>
             </div>

             <hr>
             <h4>เงื่อนไขการชำระ</h4>

              <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">กำหนดจ่ายเงินเดือนละ(งวด)</label>
                 <p style="color: #337AB7;"><?php echo $val2->paypermonth;?></p>
                </div>
              </div>
              <div class="col-md-4">
                  <label for="">แต่ละงวดชำระ(วัน)</label>
                  <p style="color: #337AB7;"><?php echo $val2->contractperiod;?></p>
              </div>
             </div>
             <div class="row">
               <div class="col-md-4">
                 <label for="">หลังจาก</label>
                 <p style="color: #337AB7;"><?php echo $val2->after;?></p>
               </div>
               <div class="col-md-4">
                 <label for="">Payment Condition</label>
                 <p style="color: #337AB7;"><?php echo $val2->paycon;?></p>
               </div>
               <div class="col-md-4">
                 <label for="">เงินล่วงหน้า(%)</label>
                 <p style="color: #337AB7;"><?php echo $val2->advance;?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-4">
                 <label for="" >เงินงวดสัญญา(%)</label>
                 <p style="color: #337AB7;"><?php echo $val2->contractperiod;?></p>
               </div>
               <div class="col-md-4">
                 <label for="">เงินงวดสัญญา</label>
                 <p style="color: #337AB7;"><?php echo $val2->annuity_contracts;?>วัน</p>
               </div>
               <div class="col-md-4">
                 <label for="">จ่ายตามความก้าวหน้า(%)</label>
                 <p style="color: #337AB7;"><?php echo $val2->pay_progess;?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6">
                 <label for="">จ่ายเมื่อผู้ว่าจ้างส่งงานแก่เจ้าของโครงการแล้ว(วัน)</label>
                 <p style="color: #337AB7;"><?php echo $val2->empsub;?></p>
               </div>
               <div class="col-md-6">
                 <label for="">หักเงินประกันผลงาน (% ทุกงวดการจ่ายเงิน)</label>
                 <p style="color: #337AB7;"><?php echo $val2->less_ret;?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6">
                 <label for="">หักเงินคืนเงินจ่ายล่วงหน้า (% ทุกงวดการจ่ายเงินจนครบ ตามจำนวนเงินล่วงหน้า)</label>
                 <p style="color: #337AB7;"><?php echo $val2->less_adv_pay;?></p>
               </div>
               <div class="col-md-6">
                 <label for="">หักเงินอื่นๆ</label>
                 <p style="color: #337AB7;"><?php echo $val2->less_other;?></p>
               </div>
             </div>

             <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">ระยะสัญญาเริ่มต้นตั้งแต่</label>
                 <p style="color: #337AB7;"><?php echo $val2->start_contact;?></p>
                </div>
              </div>
              <div class="col-md-4">
                  <label for="">ถึง</label>
                  <p style="color: #337AB7;"><?php echo $val2->stop_contact;?></p>
              </div>
             </div>
             <div class="row">
               <div class="col-md-4">
                 <label for="">เลยกำหนดปรับวันละ(%)</label>
                 <p style="color: #337AB7;"><?php echo $val2->per_fines;?></p>
               </div>
               <div class="col-md-4">
                 <label for="">จำนวนเงิน(บาท)</label>
                 <p style="color: #337AB7;"><?php echo $val2->contactamount;?></p>
               </div>
               <div class="col-md-4">
                 <label for="">ประกันผลงาน (เดือน)</label>
                 <p style="color: #337AB7;"><?php echo $val2->retention;?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-4">
                 <label for="" >วันที่ส่งมอบ</label>
                 <p style="color: #337AB7;"><?php echo $val2->deliverydate;?></p>
               </div>
               <div class="col-md-4">
                 <label for="">สถานที่ส่ง</label>
                 <p style="color: #337AB7;"><?php echo $val2->location;?>วัน</p>
               </div>
               <div class="col-md-4">
                 <label for="">โดยใช้ (วางประกัน)</label>
                 <p style="color: #337AB7;"><?php echo $val2->put;?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6">
                 <label for="">อ้างอิงสัญญา</label>
                 <p style="color: #337AB7;"><?php echo $val2->accord_type;?></p>
               </div>
               <div class="col-md-6">
                 <label for="">เงือนไขอื่นๆ</label>
                 <p style="color: #337AB7;"><?php echo $val2->other;?></p>
               </div>
             </div>
          



         </div>
     </div>

     </div>
  </div> <!--end modal -->

  
  <?php } ?>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

    <!-- /core JS files -->
    <script>
    $.extend( $.fn.dataTable.defaults, {
         autoWidth: false,
         columnDefs: [{
             orderable: false,
             width: '150px',
             targets: [ 0 ]
         }],
         dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
         language: {
             search: '<span>Filter:</span> _INPUT_',
             lengthMenu: '<span>Show:</span> _MENU_',
             paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
         },
         drawCallback: function () {
             $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
         },
         preDrawCallback: function() {
             $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
         }
     });

      $('.datatable-basicc').DataTable();
      $('[data-popup="tooltip"]').tooltip();
    </script>
 


<script type="text/javascript">
  $('#wo').attr('class', 'active');
  $('#archive_wo').attr('style', 'background-color:#dedbd8');
</script>