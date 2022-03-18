<?php foreach ($res as $val) {
  $prid = $val->pr_prid;
  $getprno = $val->pr_prno;
  $getname = $val->pr_reqname;
  $memid = $val->pr_memid;
  $getprojectname = $val->project_name;
  $getprojectid = $val->project_id;
  $getdepname = $val->department_title;
  $getdepid = $val->department_id;
  $getprdate = $val->pr_prdate;
  $getdelidate = $val->pr_delidate;
  $system = $val->pr_system;
  $getremark  = $val->pr_remark;
  $getplace = $val->pr_deliplace;
  $getcostype = $val->pr_costtype;
  $getvender = $val->pr_vender;
  $purchase_type = $val->purchase_type;

  if ($getvender!="") {
    $ven = $this->db->query("select * from vender where vender_id='$getvender'")->result();
    foreach ($ven as $kven) {
      $vendername = $kven->vender_name;
    }
  }else{
    $vendername = "";
  }

} ?>

<?php 
$this->db->select('*');
$this->db->from('project');
$this->db->where('project_id',$getprojectid);
$boq=$this->db->get()->result();
$bd_tenid = 0;
$chkconbqq = 0;
$controlbg = 0;
?>
<?php foreach ($boq as $eboq) {
  $chkconbqq = $eboq->chkconbqq;
  $controlbg = $eboq->controlbg;
  $bd_tenid = $eboq->bd_tenid;
 
}
?>


<div class="content-wrapper">
    <!-- Content area -->
    <div class="content">

        <div class="row">

            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Purchase Requisition (View)&nbsp;
                        <?php if($chkconbqq=="1"){ echo '<button class="in label label-info"><i class="icon-checkmark4"></i> Control BOQ</button>'; }else{ echo '<button class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control BOQ</button>'; }
                        ?>&nbsp;
                        <?php if($controlbg=="2"){ echo '<button class="apprv label label-success"><i class="icon-checkmark4"></i> Control Budget</button>'; }else{ echo '<button class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control Budget</button>'; }
                        ?>
                    </h5>
                </div>

                <div class="panel-body">
                                    <div class="tabbable">
										<ul class="nav nav-tabs nav-tabs-component">
											<li class="active"><a href="#basic-rounded-tab1" data-toggle="tab">PR</a></li>
											<li><a href="#basic-rounded-tab2" data-toggle="tab">Attachment</a></li>
											
										</ul>

										<div class="tab-content">
											<div class="tab-pane active" id="basic-rounded-tab1">
												<div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                        </div>
                                                        <fieldset>
                                                            <div class="col-md-6">
                                                                <legend class="text-semibold"><i class="icon-reading position-left"></i>
                                                                    แก้ไขใบขอซือ (PR)</legend>

                                                                <div class="form-group">
                                                                    <label>เลขที่ใบขอซื้อ:</label>
                                                                    <input type="text" class="form-control" readonly="readonly" id="prno"
                                                                        placeholder="เลขที่ใบขอซื้อ" value="<?php echo $getprno; ?>">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>ผู้ขอซื้อ:</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-btn">
                                                                            <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                                                                        </span>
                                                                        <input type="text" class="form-control" readonly="readonly" name="memname"
                                                                            id="memname" placeholder="กรอกผู้ขอซื้อ" value="<?php echo $getname; ?>">
                                                                        <input type="hidden" name="memid" id="memid" value="<?php echo $memid; ?>">
                                                                        <div class="input-group-btn">
                                                                            <button type="button" class="btn btn-default btn-icon"><i class="icon-search4"></i></button>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>โครงการ:</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-btn">
                                                                            <button class="btn btn-default btn-icon" type="button"><i class="icon-office"></i></button>
                                                                        </span>
                                                                        <input type="text" class="form-control" readonly="readonly" placeholder="โครงการ"
                                                                            name="projectname" id="projectname" value="<?php echo $getprojectname; ?>">
                                                                        <input type="hidden" readonly="true" class="pproject1 form-control input-sm"
                                                                            name="projectid" id="putprojectid" value="<?php echo $getprojectid; ?>">
                                                                        <div class="input-group-btn">
                                                                            <!-- <button type="button" class="openproj btn btn-default btn-icon" data-toggle="modal" data-target="#openproj"><i class="icon-search4"></i></button> -->
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>แผนก:</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-btn">
                                                                            <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                                                                        </span>
                                                                        <input type="text" class="form-control" readonly="readonly" placeholder="แผนก"
                                                                            value="<?php echo $getdepname; ?>" name="depname" id="depname">
                                                                        <input type="hidden" readonly="true" value="<?php echo $getdepid; ?>" class="form-control input-sm input-sm"
                                                                            name="depid" id="depid">
                                                                        <div class="input-group-btn">
                                                                            <!-- <button type="button"   data-toggle="modal" data-target="#opendpt" class="opendpt btn btn-default btn-icon"><i class="icon-search4"></i></button> -->
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label>ประเภทสั่งซื้อ:</label>
                                                                    <select name="costtype" id="costtype" class="form-control" readonly="">
                                                                        <?php 
                                                                                foreach ($costtype as $key => $v) {
                                                                                    if ($getcostype==$v->costtype_id) {
                                                                                        echo "<option selected='selected' value='".$v->costtype_id."'>".$v->costype_name."</option>";
                                                                                    }
                                                                                }
                                                                                ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label>หมายเหตุ:</label>
                                                                        <textarea rows="5" cols="5" class="form-control" required="required"
                                                                            readonly="" placeholder="หมายเหตุ" name="remark" id="remark"><?php echo $getremark; ?></textarea>
                                                                    </div>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <legend class="text-semibold"><i class="icon-reading position-left"></i> </legend>

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>วันที่ขอซื้อ: </label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                                                <input type="text" class="form-control" readonly="" id="prdate"
                                                                                    name="prdate" value="<?php echo $getprdate; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>วันที่ส่งของ:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                                                <input type="text" readonly="" class="form-control" id="deliverydate"
                                                                                    name="deliverydate" value="<?php echo $getdelidate; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="code">ระบบ</label>
                                                                            <?php $flag = $this->uri->segment(4); ?>
                                                                            <?php  $q = $this->db->query("select * from system where systemcode='$system'")->result(); 
                                                                                foreach ($q as $qqq) {
                                                                                $sy = $qqq->systemname;
                                                                                }
                                                                                ?>
                                                                            <select class="form-control" name="system" id="system"
                                                                                readonly="">
                                                                                <option value="<?php echo $system; ?>">
                                                                                    <?php echo $sy; ?>
                                                                                </option>
                                                                            </select>

                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="purchase_type">เลือกประเภท PR</label>
                                                                            <select class="form-control" name="purchase_type" id="purchase_type"
                                                                                readonly="">
                                                                                <?php if($purchase_type == '1'){ ?>
                                                                                <option value="1" selected>PO/WO</option>
                                                                                <?php } else { ?>
                                                                                <option value="1">PO/WO</option>
                                                                                <?php }?>
                                                                                <?php if($purchase_type == '2'){ ?>
                                                                                <option value="2" selected>PO Only</option>
                                                                                <?php } else { ?>
                                                                                <option value="2">PO Only</option>
                                                                                <?php }?>
                                                                                <?php if($purchase_type == '3'){ ?>
                                                                                <option value="3" selected>WO Only</option>
                                                                                <?php } else { ?>
                                                                                <option value="3">WO Only</option>
                                                                                <?php }?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="display-block text-semibold">Vender:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-btn">
                                                                                    <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                                                                                </span>
                                                                                <input type="text" class="form-control" readonly name="vender" id="vender"
                                                                                    value="<?php echo $vendername; ?>">
                                                                                <input type="hidden" name="venderidd" id="venderidd" value="<?php echo $getvender; ?>">
                                                                                <div class="input-group-btn">
                                                                                    <a class="ven btn btn-default btn-icon" data-toggle="modal" data-target="#openvender"><i
                                                                                            class="icon-search4"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>สถานที่ส่งของ:</label>
                                                                            <textarea rows="5" cols="5" class="form-control" readonly="" placeholder="สถานที่ส่งของ"
                                                                                name="place" id="place"><?php echo $getplace; ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12" id="detail">
                                                                <table class="table table-bordered table-striped table-xxs">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>Material Code</th>
                                                                                <th>Material Name</th>
                                                                                <th>Cost Code</th>
                                                                                <th>Cost Name</th>
                                                                                <th>Qty</th>
                                                                                <th>Unit</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="body">
                                                                            <?php $n=1; foreach ($resii as $vai) {?>

                                                                            <tr>
                                                                                <td>
                                                                                    <?php echo $n; ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $vai->pri_matcode; ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $vai->pri_matname; ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $vai->pri_costcode; ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $vai->pri_costname; ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $vai->pri_qty; ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $vai->pri_unit; ?>
                                                                                </td>
                                                                            </tr>
                                                                            <?php $n++; } ?>
                                                                        </tbody>
                                                                    </table>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                
											</div>

											<div class="tab-pane" id="basic-rounded-tab2">
                                                <?php foreach ($prfile as $key => $value) {
                                                    $filesize = "select_file_pr/" . $value->name_file;
                                                    $kb       = filesize( $filesize ) / 1024;
                                                    $mb       = $kb / 1024;
                                                ?>
                                                  <!-- <p> <?php echo $value->name_file;?> <a href="<?php echo base_url(); ?>select_file_pr/<?php echo $value->name_file;?>">Download</a> </p> -->
                                                
                                                    <ul class="media-list">
                                                        <li class="media">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="media-left media-middle">
                                                                    <?php if ( get_mime_by_extension( $value->name_file ) == "application/pdf" ) {?>
                                                                        <i class="icon-file-pdf icon-2x"></i>
                                                                    <?php } else {?>
                                                                        <i class="icon-file-picture icon-2x"></i>
                                                                    <?php }?>
                                                                </div>

                                                                <div class="media-body">
                                                                    <a class="media-heading text-semibold" href="#"> <?php echo $value->name_file;?> </a>
                                                                    <ul class="list-inline list-inline-separate list-inline-condensed text-size-mini text-muted">
                                                                        <li><?php echo number_format($mb,2);?> MB</li>
                                                                    </ul>
                                                                </div>

                                                                <div class="media-right media-middle">
                                                                    <ul class="icons-list">
                                                                        <li><a href="<?php echo base_url(); ?>select_file_pr/<?php echo $value->name_file; ?>" target="_blank"><i class="icon-download"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </li>
                                                    </ul>
                                               
                                                
                                                <?php } ?>
											</div>

										
                
										</div>

									</div>
                                   <br>
                                    <div class="text-right">
                                                    
                                                        <!-- <a id="fa_close" href="<?php echo base_url(); ?>pr/archive_pr_all" class="btn bg-danger"><i class="icon-close2"></i> Close</a> -->
                                                        <a id="fa_close" href="<?php echo base_url(); ?>pr/archive_pr/<?php echo $getprojectid; ?>/p" class="btn bg-danger"><i
                                                                class="icon-close2"></i> Close</a>
                                                    </div>    
            </div>
        </div>      
    </div>   
</div>