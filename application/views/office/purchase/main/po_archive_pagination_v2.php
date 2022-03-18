<?php
    function my_format_date($date){

      return date("d-m-Y",strtotime($date)) ;
    }

 ?>
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
</style>
<div class="content-wrapper">
  <!-- Page header -->
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard -     ภาพรวมระบบ</span></h4>
      </div>
      <div class="heading-elements">
        <div class="heading-btn-group">
          <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
          <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
          <a href="<?php echo base_url(); ?>index.php/manag/calenda" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
        </div>
      </div>
    </div>
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url(); ?>index.php/pr/archive_pr">Purchase Archive</a></li>
      </ul>
    </div>
  </div>

  <div class="content">
    <div class="panel panel-flat">
      <div class="panel-heading">
        <h5 class="panel-title">Purchase Archive</h5>
        <div class="heading-elements">
        </div>
      </div>
      <div class="panel-body">
      <div class="col-md-2">
        <div class="input-group content-group" style="margin-top: 10px;">
          <div class="form-group">
              <label class="radio-inline">
                <input type="radio" name="radio-inline-left" id="matrd1" class="styled" checked>
                PO No.
              </label>

              <label class="radio-inline">
                <input type="radio" name="radio-inline-left" id="matrd2" class="styled" >
                Project Name
              </label>
            </div>
          </div>
      </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" id="textnn" placeholder="">
                  <div class="input-group-btn">
                    <button type="button" class="find btn btn-default"><i class="icon-search4 text-muted text-size-base"></i></button>
                  </div>
                </div>
              </div>
            </div>
        <div class="text-right">
            <a href="<?php echo base_url(); ?>purchase/opencreatepo" class="preload btn btn-default"><i class="icon-plus22"></i> New</a>
            <a href="/" class="btn btn-default"><i class="icon-close2 position-left"></i> Close</a>
        </div>
      </div>
      <script>
        $(".find").click(function(){
          if ($("#matrd1").prop("checked")) {
            $("#loadtable").html('<div class="container"><p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div></div><br/>');
            $("#loadtable").load("<?php echo base_url();?>purchase/load_po_archive/po/"+$("#textnn").val());
          }else{
            $("#loadtable").html('<div class="container"><p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div></div><br/>');
            $("#loadtable").load("<?php echo base_url();?>purchase/load_po_archive/proj/"+$("#textnn").val());
          }
          
        });
      </script>
      <div >
        <div class="table-responsive" id="loadtable">
  <table class="table table-striped table-bordered table-hover table-xxs">
    <thead>
      <tr>
                <th width="20%" class="text-center">PO No.</th>
                <th class="text-center">PR No.</th>
                <th class="text-center">Name</th>
                <th class="text-center">Project/Department</th>
                <th class="text-center">Vender</th>
                <th class="text-center">Date</th>
                <th class="text-center">Approve</th>
                <th class="text-center">Status</th>
                <th class="text-center">Actions</th>
              </tr>
    </thead>
    <tbody>
    <?php foreach ($results as $val) {?>
              <tr>
                <td class="text-center"><?php echo $val->po_pono; ?></td>

                <td class="text-center"><?php 
$this->db->select('*');
$this->db->from('po_item');
$this->db->where('poi_ref',$val->po_pono);
$this->db->group_by('pr_no');
$po=$this->db->get()->result();
$pr_no = "";
foreach ($po as $dpo) {
  echo $pr_no = $dpo->pr_no;
  echo ","; 
}
?></td>
                <td><?php echo $val->po_prname; ?></td>
                <?php 
                    $this->db->select('*');
                    $this->db->where('project_id',$val->po_project);
                    $q = $this->db->get('project');
                    $res = $q->result();
                    $pjname = "";
                    foreach ($res as $r) {
                      $pjname = $r->project_name;
                    }
                    ?>
                  
                <td class="text-center"><?php echo $pjname; ?><?php echo $val->department_title; ?></td>
                <!-- <td><?php echo $val->po_remark; ?></td> -->
                                                    <td><?php echo $val->po_vender;?></td>
                <td class="text-center"><?php echo $val->po_podate; ?></td>
                <td class="text-center"><button type="button" class="label label-primary" data-toggle="modal" data-target="#modal_theme_primary<?php echo $val->po_pono; ?>">Tree <i class="icon-play3 position-right"></i></button></td>
                <?php if ($val->po_approve=="approve") {?>
                <td class="text-center"><span class="label label-success"><?php echo $val->po_approve; ?></span></td>
                <?php }else{ ?>
                <td class="text-center"><span class="label label-warning">IN Processing</span></td>
                <?php } ?>
                <td>
                  <ul class="icons-list">
                      <li><a data-toggle="modal" data-target="#open<?php echo $val->po_pono; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-folder-open"></i></a></li>
                    <?php if ($val->po_approve=="approve") {?>
                      <li class="text-slate"><i class="icon-pencil7"></i></li>
                      <li class="text-slate"><i class="icon-trash"></i></li>
                    <?php }else{ ?>
                      <li><a class="preload" href="<?php echo base_url(); ?>index.php/purchase/editpo/<?php echo $val->po_pono; ?>" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>
                      <li><a id="remove<?php echo $val->po_pono; ?>" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-trash"></i></a></li>
                      <?php } ?>
                      <!-- <li><a href="<?php echo base_url(); ?>purchase/report_po/<?php echo $val->po_pono; ?>" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li> -->
                      <li><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=<?php echo $reporttype; ?>&pp=<?php echo $val->po_id; ?>&pri=<?php echo $val->po_pono; ?>" target="_blank" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li>
                                                                      
                  </ul>
                </td>
              </tr>
              <script>
                $('#remove<?php echo $val->po_pono; ?>').on('click', function() {
                  swal({
                    title: "Are you sure?",
                    text: "Deleted ",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#EF5350",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel pls!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                  function(isConfirm){
                    if (isConfirm) {
                      var url="<?php echo base_url(); ?>purchase_active/deletepo/<?php echo $val->po_pono; ?>/<?php echo $val->po_prno; ?>";
                      var dataSet={
                      };
                      $.post(url,dataSet,function(data){
                        $(this).closest('tr').remove();
                          swal({
                            title: "Deleted!",
                            text: data,
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                      });
                    }
                   else {
                   swal({
                    title: "Cancelled",
                    text: "Your imaginary file is safe :)",
                    confirmButtonColor: "#2196F3",
                    type: "error"
                    });
                    }
                   window.location.href = "<?php echo base_url(); ?>purchase/po_archive";
                  });
                });
              </script>

              <div id="modal_theme_primary<?php echo $val->po_pono; ?>" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h6 class="modal-title"><?php echo $val->po_pono; ?></h6>
                </div>

                <div class="modal-body">
                    <?php $this->db->select('*');
                          $this->db->from('approve_po');
                          $this->db->where('app_project',$val->project_code);
                          $this->db->where('app_pr',$val->po_pono);
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
    
</div>
                </div>

                <div class="modal-footer">
                  
                </div>
              </div>
            </div>
          </div>
             <?php  } ?>
    </tbody>
  </table>
  <div class="text-center">
    <p><?php echo $links; ?></p>
  </div>
  

</div>

</div>
</div>
</div>

<?php foreach ($results as $val2) {?>
    <div id="open<?php echo $val2->po_pono; ?>" class="modal fade">
      <div class="modal-dialog modal-full">
        <div class="modal-content ">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h5 class="modal-title"> #<?php echo $val2->po_pono; ?></h5>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6 content-group">
                <img src="<?php echo base_url(); ?>comp/<?php echo $compimg; ?>" class="content-group mt-10" alt="" style="width: 120px;" data-pin-nopin="true">
                <!-- <ul class="list-condensed list-unstyled">
                  <li>2269 Elba Lane</li>
                  <li>Paris, France</li>
                  <li>888-555-2311</li>
                </ul> -->
              </div>

              <div class="col-md-6 content-group">
                <div class="invoice-details">
                  <h5 class="text-uppercase text-semibold"> #<?php echo $val2->po_pono; ?></h5>
                  <ul class="list-condensed list-unstyled">
                    <li>Date: <span class="text-semibold"><?php echo $val2->po_podate; ?></span></li>
                    <!-- <li>Due date: <span class="text-semibold">May 12, 2015</span></li> -->
                  </ul>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                  <span class="text-muted">PO No:</span>
                  <ul class="list-condensed list-unstyled">
                    <li><h5><?php echo $val->po_pono; ?></h5></li>
                  </ul>
              </div>

              <div class="col-md-4">
                <span class="text-muted">PR Requsition:</span>
                <ul class="list-condensed list-unstyled">
                  <li><h5><?php echo $val2->po_prname; ?></h5></li>
                </ul>
              </div>
              <div class="col-md-4">
                <span class="text-muted">PR No.:</span>
                <ul class="list-condensed list-unstyled">
                  <li><h5><?php echo $val2->po_prno; ?></h5></li>
                </ul>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <span class="text-muted">Project/Department:</span>
                <ul class="list-condensed list-unstyled">
                  <li><h5><?php echo $val2->project_name; ?><?php echo $val2->department_title; ?></h5></li>
                </ul>
              </div>
              <div class="col-md-4">
                <span class="text-muted">System:</span>
                <ul class="list-condensed list-unstyled">
                  <?php if($val2->po_system == '1'){ ?><li><h5>OVERHEAD</h5></li>
                  <?php }else if($val2->po_system == '2'){ ?><li><h5>AC</h5></li>
                  <?php }else if($val2->po_system == '3'){ ?><li><h5>EE</h5></li>
                  <?php }else if($val2->po_system == '4'){ ?><li><h5>SN</h5></li>
                  <?php }else if($val2->po_system == '5'){ ?><li><h5>CIVIL</h5></li>
                    <?php } ?>
                </ul>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <span class="text-muted">Vender:</span>
                <ul class="list-condensed list-unstyled">
                  <li><h5><?php echo $val2->po_vender; ?></h5></li>
                </ul>
              </div>
              <div class="col-md-4">
                <span class="text-muted">Credit term:</span>
                <ul class="list-condensed list-unstyled">
                  <li><h5><?php echo $val2->po_trem; ?></h5></li>
                </ul>
              </div>
              <div class="col-md-4">
                <span class="text-muted">Vender Tel:</span>
                <ul class="list-condensed list-unstyled">
                  <li><h5><?php echo $val2->po_contact; ?></h5></li>
                </ul>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <span class="text-muted">Contact No:</span>
                <ul class="list-condensed list-unstyled">
                  <li><h5><?php echo $val2->po_contactno; ?></h5></li>
                </ul>
              </div>
              <div class="col-md-4">
                <span class="text-muted">Quotation:</span>
                <ul class="list-condensed list-unstyled">
                  <li><h5><?php echo $val2->po_quono; ?></h5></li>
                </ul>
              </div>
              <div class="col-md-4">
                <span class="text-muted">Delivery Day:</span>
                <ul class="list-condensed list-unstyled">
                  <li><h5><?php echo $val2->po_deliverydate; ?></h5></li>
                </ul>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <span class="text-muted">Delivery Place:</span>
                <ul class="list-condensed list-unstyled">
                  <li><h5><?php echo $val2->po_place; ?></h5></li>
                </ul>
              </div>
              <div class="col-md-4">
                <span class="text-muted">Remark:</span>
                <ul class="list-condensed list-unstyled">
                  <li><h5><?php echo $val2->po_remark; ?></h5></li>
                </ul>
              </div>
            </div>
            <legend class="text-muted"> Detail</legend>
          </div>
          <div class="container-fluid table-responsive">
            <table class="table table-xxs table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Cost Code</th>
                  <th>Cost name</th>
                  <th>Material Name</th>
                  <th>Qty</th>
                  <th>Unit</th>
                  <th>Unit Price</th>
                  <th>Amount</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <?php $n=1; $qty=0; $unitprice=0; $amouttot=0; $vattot=0; $whtot=0; $netamt=0;
                $this->db->select('*');
                $this->db->where('poi_ref',$val2->po_pono);
                // $this->db->where('compcode',$val2->compcode);
                $query = $this->db->get('po_item');
                $resi = $query->result();
                 $n=1; foreach ($resi as $va) {?>
                   <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php echo $va->poi_costcode; ?></td>
                    <td><?php echo $va->poi_costname; ?></td>
                    <td><?php echo $va->poi_matname; ?></td>
                    <td><?php echo number_format($va->poi_qty,2); ?></td>
                    <td><?php echo $va->poi_unit; ?></td>
                    <td><?php echo number_format($va->poi_priceunit,2); ?></td>
                    <td><?php echo number_format($va->poi_amount,2); ?></td>
                    <td><?php echo number_format($va->poi_netamt,2); ?></td>
                  </tr>
                <?php $n++; $qty = $qty+$va->poi_qty;
                $unitprice = $unitprice+$va->poi_priceunit;
                $amouttot = $amouttot+$va->poi_amount;
                $netamt = $netamt+$va->poi_netamt; } ?>

              </tbody>
              <tfooter>

                <th colspan="4" class="text-center">Total</th>
                <th><?php echo number_format($qty,2); ?></th>
                <td></td>
                <th><?php echo number_format($unitprice,2); ?></th>
                <th><?php echo number_format($amouttot,2); ?></th>
                <th><?php echo number_format($netamt,2); ?></th>

              </tfooter>
            </table>
            <br>
          </div>
          <div class="modal-footer">
            <?php if ($val2->po_approve=="approve") {?>
              <a class="btn btn-default disabled" href="#" ><i class="icon-pencil7"></i> Edit</a>
            <?php }else{?>
              <a class="btn btn-default" href="<?php echo base_url(); ?>index.php/purchase/editpo/<?php echo $val->po_pono; ?>" ><i class="icon-pencil7"></i> Edit</a>
            <?php } ?>
            <a class="btn btn-default" target="_blank" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=<?php echo $reporttype; ?>&pp=<?php echo $val2->po_id; ?>" ><i class="icon-printer4"></i> Print</a>
            <button type="submit" class="btn btn-default" data-dismiss="modal"><i class="icon-close2 position-left"></i> Close</button>
          </div>
        </div>
      </div>
    </div>



    <?php } ?>
