<?php $flag = $this->uri->segment(4);?>
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
$express = $val->express;
$subname = $val->subname;
$subid = $val->subid;
$wo = $val->wo;
$q = $val->pr_project;
if ($getvender!="") {
$ven = $this->db->query("select * from vender where vender_id='$getvender'")->result();
foreach ($ven as $kven) {
$vendername = $kven->vender_name;
}
}else{
$vendername = "";
}
} 
$this->db->select('*');
$this->db->from('project');
$this->db->where('project_id',$q);
$boq=$this->db->get()->result();
$bd_tenid = 0;
$chkconbqq = 0;
$controlbg = 0;
?>
<?php foreach ($boq as $eboq) {
$chkconbqq = $eboq->chkconbqq;
$controlbg = $eboq->controlbg;
$bd_tenid = $eboq->bd_tenid;
$pn = $eboq->project_name;
$pi = $eboq->project_id;
}
?>
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Purchase Requisition (Edit)&nbsp;
                        <?php if($chkconbqq=="1"){ echo '<button class="in label label-info"><i class="icon-checkmark4"></i> Control BOQ</button>'; }else{ echo '<button class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control BOQ</button>'; }
              ?>&nbsp;
                        <?php if($controlbg=="2"){ echo '<button class="apprv label label-success"><i class="icon-checkmark4"></i> Control Budget</button>'; }else{ echo '<button class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control Budget</button>'; }
              ?>
                    </h5>
                    <div class="heading-elements">
                       
                </div>
                <div class="panel-body">
                                    <div class="tabbable">
										<ul class="nav nav-tabs nav-tabs-component">
											<li class="active"><a href="#basic-rounded-tab1" data-toggle="tab"><i class="glyphicon glyphicon-list-alt"></i> Purchase Requisition</a></li>
											<li><a href="#basic-rounded-tab2" data-toggle="tab"><i class="icon-attachment"></i>Attachment File</a></li>
											
										</ul>
                                    <div class="tab-content">
											<div class="tab-pane active" id="basic-rounded-tab1">
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <div class="col-md-6">
                                    <legend class="text-semibold"><i class="icon-reading position-left"></i>
                                        แก้ไขใบขอซือ (PR)</legend>
                                    <div class="form-group">
                                        <label>เลขที่ใบขอซื้อ: &nbsp;&nbsp;<label class="checkbox-inline">
                                                <div><span><input type="checkbox" name="express" id="a" class="styled"
                                                            value="1" <?php if($express=="1" ){ echo 'checked' ; } ?>></span>
                                                    <input type="hidden" id="express" value="<?php echo $express; ?>">
                                                    <script>

                                                        $("#a").click(function(){
                                                            if ($("#a").prop("checked")) {
                                                            $("#express").val("1");
                                                            }else{
                                                            $("#express").val("0");
                                                            }
                                                            });
                                                    </script>
                                                </div>
                                                <b style="color: red;">สั่งด่วน !</b>
                                            </label></label>
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
                                            <?php if($flag!="d"){ ?>
                                            <input type="text" class="form-control" readonly="readonly" placeholder="โครงการ"
                                                name="projectname" id="projectname" value="<?php echo $pn; ?>">
                                            <input type="hidden" readonly="true" class="pproject1 form-control input-sm"
                                                name="projectid" id="putprojectid" value="<?php echo $pi; ?>">
                                            <?php } ?>
                                            <?php if($flag=="d"){ ?>
                                            <input type="text" class="form-control" readonly="readonly" placeholder="โครงการ"
                                                name="projectname" id="projectname" value="">
                                            <input type="hidden" readonly="true" class="pproject1 form-control input-sm"
                                                name="projectid" id="putprojectid" value="">
                                            <?php } ?>
                                            <div class="input-group-btn">



                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>ประเภทสั่งซื้อ:</label>
                                                <select name="costtype" id="costtype" class="form-control">
                                                    <?php 
                                                    foreach ($costtype as $key => $v) {
                                                        if ($getcostype==$v->costtype_id) {
                                                            echo "<option selected='selected' value='".$v->costtype_id."'>".$v->costype_name."</option>";
                                                        }else{
                                                        echo "<option value='".$v->costtype_id."'>".$v->costype_name."</option>";
                                                        }
                                                     }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="display-block text-semibold">Vender:</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                                                    </span>
                                                    <input type="text" class="form-control" readonly name="vender" id="vender"
                                                        value="<?php echo $vendername; ?>"/>
                                                    <input type="hidden" name="venderidd" id="venderidd" value="<?php echo $getvender; ?>">
                                                    <div class="input-group-btn">
                                                        <a class="ven btn btn-default btn-icon" data-toggle="modal"
                                                            data-target="#openvender"><i class="icon-search4"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Subcontractor : </label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                                                    </span>
                                                    <input type="text" class="form-control" readonly="readonly" name="subname"
                                                        id="subname" placeholder="กรอกผู้ขอซื้อ" value="<?php echo $subname; ?>">
                                                    <input type="hidden" name="subid" id="subid" value="<?php echo $subid; ?>">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="subconmodal btn btn-info btn-icon"
                                                            data-toggle="modal" data-target="#subconmodal"><i class="icon-search4"></i></button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Work Order : </label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                                                    </span>
                                                    <input type="text" class="form-control" readonly="readonly" name="wo"
                                                        id="wo" value="<?php echo $wo; ?>">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="womodal btn btn-info btn-icon"
                                                            data-toggle="modal" data-target="#womodal"><i class="icon-search4"></i></button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <legend class="text-semibold"><i class="icon-truck position-left"></i> </legend>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>วันที่ขอซื้อ: </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                    <input type="date" class="form-control" id="prdate" name="prdate"
                                                        value="<?php echo $getprdate; ?>">
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
                                                    <input type="date" class="form-control" id="deliverydate" name="deliverydate"
                                                        value="<?php echo $getdelidate; ?>">
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
                                                <select class="form-control " name="system" id="system">
                                                    <option value="<?php echo $system; ?>">
                                                        <?php echo $sy; ?>
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="purchase_type">เลือกประเภท PR</label>
                                                <select class="form-control " name="purchase_type" id="purchase_type">
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
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>หมายเหตุ:</label>
                                                    <input class="form-control" required="required"
                                                        placeholder="หมายเหตุ" name="remark" id="remark" value="<?php echo $getremark; ?>"/>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>สถานที่ส่งของ: <b style="color: red">*
                                                            กรุณากรอกสถานที่ส่งของ</b></label>
                                                    <input class="form-control" required="required"
                                                        placeholder="สถานที่ส่งของ" name="place" id="place" value="<?php echo $getplace; ?>"/>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>


                                </div>
                            </fieldset>


                        </div>
                        <div class="col-md-12">
                            <div class="row" id="detail">
                                <div class="table-responsive">
                                </div>
                            </div>
                        </div>
                        <script>
                            $("#detail").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                            $("#detail").load('<?php echo base_url()?>pr/load_editpr_detail/<?php echo $getprno; ?>/<?php echo $flag; ?>/<?php echo $bd_tenid; ?>/<?php echo $pi; ?>');
                        </script>
                    </div>
											</div>
											<div class="tab-pane" id="basic-rounded-tab2">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <form id="form" method="post" enctype="multipart/form-data">
                                                            <label class="control-label input-xs col-lg-3">Attachment File <span class="text-danger">*</span></label>
                                                            <div class="col-lg-3">
                                                                <input type="file" name="styled_file" class="file-styled" accept=".jpg,.jpeg,.png,.pdf" required="required" id="file">
                                                                
                                                            </div>
                                                           
                                                            <input type="hidden" name="pr_ref" value="<?=$getprno; ?>">
                                                        </form>
                                                       
                                                    </div>
                                                </div>
                                            <script>
                                                $('#file').change(function(event) {
                                                    // alert("change");
                                                    // var file = $(this).val();
                                                    var formData = new FormData($('#form')[0]);
                                                    var file = $('#file').val();
                                                    // alert(file);
                                                    if (file != '') {
                                                        $.ajax({
                                                            url: '<?php echo base_url(); ?>pr_active/ajax_upload',
                                                            type: 'POST',
                                                            data: formData,
                                                            async: false,
                                                            cache: false,
                                                            contentType: false,
                                                            enctype: 'multipart/form-data',
                                                            processData: false,
                                                            success: function(response) {
                                                                show_nonti('Success!!!', 'Upload File Successful',
                                                                    'success');
                                                                setTimeout(function() {
                                                                    location.reload();
                                                                }, 500);
                                                            }
                                                        });
                                                        return false;
                                                    } else {
                                                        swal("Fail!", "กรุณาเลือกไฟล์", "error");
                                                    }

                                                });
                                            </script>
                  
                                           <!-- //file attach -->
                                           
                                            </div>
                                            <legend class="text-size-mini text-muted no-border no-padding">File</legend>
                                            
                                           <!-- file attach -->
                                            <?php
                $this->db->select('*');
                $this->db->from('select_file_pr');
                $this->db->where('pr_ref',$getprno);
                $file=$this->db->get()->result();
                
                foreach ($file as $f) { 
                    $filesize = "select_file_pr/" . $f->name_file;
                    $kb       = filesize( $filesize ) / 1024;
                    $mb       = $kb / 1024;

                ?>
                      <p>
                        <!-- <b>เอกสารแนบ : <?php echo $f->name_file;?> <a href="<?php echo base_url(); ?>select_file_pr/<?php echo $f->name_file ?>" style="color: red;"> Download !!</a></b> -->
                            <!-- attachment file -->
                                <ul class="media-list">
                                    <li class="media">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="media-left media-middle">
                                                <?php if ( get_mime_by_extension( $f->name_file ) == "application/pdf" ) {?>
                                                    <i class="icon-file-pdf icon-2x"></i>
                                                <?php } else {?>
                                                    <i class="icon-file-picture icon-2x"></i>
                                                <?php }?>
                                            </div>

                                            <div class="media-body">
                                                <a class="media-heading text-semibold" href="<?php echo base_url(); ?>select_file_pr/<?php echo $f->name_file; ?>" target="_blank"> <?php echo $f->name_file;?> </a>
                                                <ul class="list-inline list-inline-separate list-inline-condensed text-size-mini text-muted">
                                                    <li><?php echo number_format($mb,2);?> MB</li>
                                                </ul>
                                            </div>

                                            <div class="media-right">
                                                <ul class="icons-list icons-list-extended text-nowrap">
                                                    <li><a href="<?php echo base_url(); ?>select_file_pr/<?php echo $f->name_file; ?>" target="_blank"><i class="icon-download"></i></a></li>
                                                    <li><a id="delfile<?=$f->id_sl;?>" del_id="<?=$f->id_sl;?>"><i class="icon-trash"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    </li>
                                </ul>
                            <!-- // attachmant file -->
                          <script>
                        
                        $('#delfile<?=$f->id_sl;?>').click(function() {
                            var id = $(this).attr('del_id');
                            swal({
                                    title: "คุณแน่ใจใช่ไหม ?",
                                    text: "ต้องการลบไฟล์!",
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "Yes, delete it!",
                                    cancelButtonText: "No, cancel plx!",
                                    closeOnConfirm: false,
                                    closeOnCancel: false
                                },
                                function(isConfirm) {
                                    if (isConfirm) {
                                        $.post('<?php echo base_url(); ?>pr/del_file_by_id/' + id, function() {})
                                            .done(function(data) {
                                                console.log(data);
                                                var json_res = jQuery.parseJSON(data);
                                                if (json_res.status === true) {

                                                    swal("Deleted!", json_res.message, "success");

                                                } else {

                                                    swal("Deleted!", json_res.message, "success");

                                                }
                                                $('.confirm').click(function() {
                                                    location.reload();
                                                });

                                            });
                                    } else {
                                        swal("Cancelled", "ยกเลิอกการลบไฟล์เรียร้อยแล้ว", "error");
                                    }
                                });
                        });
                    </script>
                        <?php } ?>
                      </p> 
                        <?php
                $this->db->select('*');
                $this->db->from('select_file_pr');
                $this->db->where('pr_ref',$getprno);
               
                $a=$this->db->get()->num_rows();
                ?>
                        <?php if($a==0){ ?>
                         <?php } ?>
                     
											</div>
                                    


</div>

                </div>
            </div>
            <div class="text-right">

                <?php if ($prappr=="approve") {?>
                <a data-toggle="modal" data-target="#insertrow" class="btn btn-default disabled"><i class="icon-plus22"></i>
                    ADD Rows</a>
                <a class="editpo btn btn-default disabled"><i class="icon-box-add"></i> Save </a>
                <?php  }else{ ?>
                <?php if($chkconbqq==1){
    echo '<a data-toggle="modal" data-target="#boqreteive" class="boqreteive btn bg-warning-400 "><i class="icon-plus22"></i> Ref. BOQ</a>';
    
    } ?>
                <a data-toggle="modal" data-target="#insertrow" class="btn btn-info"><i class="icon-plus22"></i> ADD
                    Rows</a>
                <button class="editpo btn btn-success"><i class="icon-box-add"></i> Save </button>
                <?php } ?>
                <!-- <a href="<?php echo base_url(); ?>pr_rpt/pr_report_h/<?php echo $getprno; ?>" class="btn btn-default"><i class="icon-printer4"></i> Print</a> -->
                <a class="btn btn-default" href="<?php echo base_url(); ?>report/viewerload?type=pr&typ=form&var1=<?php echo $prid;?>&var2=<?php echo $getprno;?>&var3=<?php echo $compcode;?>&var4=<?php echo $pi; ?>" target="_blank" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i> Print</a>
                <!-- <a href="<?php echo base_url(); ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pr_form.mrt&pr=<?php echo $prid; ?>&pri=<?php echo $getprno; ?>" target="_blank" class="btn btn-default"><i class="icon-printer4"></i> Print</a> -->
            </div>
            <p></p>
        </div>
        <div id="boqreteive" class="modal fade" data-backdrop="false">
            <div class="modal-dialog modal-full" style="height: 100%;">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Ref. BOQ
                            <?php echo $bd_tenid; ?>
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div id="refbqq">
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <hr>
                        <a type="button" class="btn btn-link bg-info" data-dismiss="modal">Close</a>
                        <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
                    </div>
                </div>
            </div>
        </div>
        <script>

            var system = $('#system').val();
$("#refbqq").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
$("#refbqq").load('<?php echo base_url(); ?>pr/model_editboq/<?php echo $bd_tenid; ?>/'+system+'/<?php echo $pi; ?>');


</script>
        <div class="modal fade" id="openproj" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Select Project</h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            <div class="row" id="modal_project">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end modal -->
        <script>
            $(".openproj").click(function(){
  $('#modal_project').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#modal_project").load('<?php echo base_url(); ?>index.php/share/project');
  });
  </script>
        <!-- modal  โครงการ-->
        <div class="modal fade" id="opendpt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Select Department</h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            <div class="row" id="modal_dpt">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end modal -->
        <script>
            $(".opendpt").click(function(){
    $('#modal_dpt').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#modal_dpt").load('<?php echo base_url(); ?>index.php/share/department');
    });
    </script>
        <!-- Full width modal -->
        <div id="openvender" class="modal fade" data-backdrop="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Select Vender</h5>
                    </div>
                    <div class="modal-body">
                        <div id="loadvender">
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
        <!-- /full width modal -->
        <script>
            $(".ven").click(function(){
    $("#loadvender").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#loadvender").load('<?php echo base_url(); ?>share/vender_f');
    });
    </script>


        <div id="subconmodal" class="modal fade" data-backdrop="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Select Vender</h5>
                    </div>
                    <div class="modal-body">
                        <div id="submodals">
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
        <!-- /full width modal -->
        <script>
            $(".subconmodal").click(function(){
  $("#submodals").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
  $("#submodals").load('<?php echo base_url(); ?>share/vender_pt/');
  });
  </script>
        <!-- editrow -->
        <div id="womodal" class="modal fade" data-backdrop="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Work Order </h5>
                    </div>
                    <div class="modal-body">
                        <div id="womodals">
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

        <script>
            $(".womodal ").click(function(){
  $("#womodals").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
  $("#womodals").load('<?php echo base_url(); ?>share/wo_modal/<?php echo $getprojectid; ?>');
  });
  </script>
        <!-- Basic modal -->
        <div id="insertrow" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header bg-info">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">เพิ่มรายการ</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="">รายการซื้อ</label>
                                <div class="input-group">
                                    <?php $q = $this->db->query("select valuess from master_checking where keyss='pr_material_check'")->result();
                  foreach ($q as $k) {
                  $cck = $k->valuess;
                  }
                  if ($cck=="Y") {
                  ?>
                                    <span class="input-group-addon">
                                        <input type="checkbox" id="chk" aria-label="กำหนดเอง">
                                    </span>
                                    <?php } ?>
                                    <input type="text" id="newmatname" disabled="true" placeholder="Material Name"
                                        class="newmatname form-control">
                                    <input type="text" id="newmatcode" disabled="true" placeholder="Material Code"
                                        class="newmatcode form-control">
                                    <span class="input-group-btn">
                                        <button type="button" class="openun btn btn-info btn-block" data-toggle="modal"
                                            data-target="#opnewmat"><span class="glyphicon glyphicon-search"></span>
                                            ค้นหา</button>
                                        <button type="button" class="openunsws btn btn-primary" data-toggle="modal"
                                            data-target="#ppoenffff"><span class="glyphicon glyphicon-search"></span>
                                            ค้นหา</button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <label for="">รายการต้นทุน</label>
                                <div class="input-group">
                                    <input type="text" id="costname" readonly="true" placeholder="Cost Name" class="costname form-control input-sm">
                                    <input type="text" id="codecostcode" readonly="true" placeholder="cost Code" class="codecostcode form-control input-sm">
                                    <span class="input-group-btn">
                                        <?php if($chkconbqq=="1"){
                    // echo '<button class="btn btn-info btn-sm" id="selectcostcodeboq" data-toggle="modal" data-target="#boq"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>';
                    }else{
                    // echo '<button class="modalcost btn btn-info btn-sm" id="selectcostcode" data-toggle="modal" data-target="#costcode"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>';
                    }
                    ?>
                    <button class="modalcost btn btn-info btn-sm" id="selectcostcode" data-toggle="modal" data-target="#costcode"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                        <input type="hidden" id="hiddencost" placeholder="Cost Code" class="form-control">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="qty">Remark mat</label>
                                    <input type="text" id="remark_mat" placeholder="กรอกปริมาณ" class="form-control">
                                </div>
                            </div>


                        </div>
                        <div class="row">

                            <hr>

                        </div>
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label for="qty">ปริมาณ</label>
                                    <input type="text" id="qty" placeholder="กรอกปริมาณ" class="form-control" value="1">
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="input-group">
                                    <label for="unit">หน่วย</label>
                                    <input type="text" id="unit" readonly="true" placeholder="กรอกหน่วย" class="form-control">
                                    <span class="input-group-btn">
                                        <button class="openuit btn btn-info btn-sm" data-toggle="modal" data-target="#openunit"
                                            style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span>
                                            ค้นหา</button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="qty">แปลงค่า IC</label>
                                    <input type="text" id="cpqtyic" name="cqtyic" placeholder="กรอกปริมาณ IC" class="form-control"
                                        value="1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="qty">ปริมาณ IC</label>
                                    <input type="text" id="pqtyic" name="pqtyic" placeholder="กรอกปริมาณ IC" class="form-control"
                                        value="1">
                                </div>
                            </div>
                            <script>
                                $("#qty , #cpqtyic").keyup(function() {
              var xqty = ($("#qty").val().replace(/,/g,"")*1);
              var cpqtyic = ($("#cpqtyic").val().replace(/,/g,"")*1);
              var xpq = xqty*cpqtyic;
              $("#pqtyic").val(numberWithCommas(xpq));
              
              });
              </script>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="unit">หน่วย IC</label>
                                    <input type="text" id="punitic" name="punitic" readonly="true" placeholder="กรอกหน่วย"
                                        class="form-control input-sm" value="">
                                    <!--  <span class="input-group-btn" >
                    <a class="unitic btn btn-primary btn-sm" data-toggle="modal" data-target="#openunitic" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                  </span> -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price_unit">ราคา/หน่วย</label>
                                    <input type="text" id="pprice_unit" name="price_unit" placeholder="กรอกราคา/หน่วย"
                                        class="form-control border-danger border-lg" value="0">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">จำนวนเงิน</label>
                                    <input type="text" id="pamount" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน"
                                        class="form-control" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="endtproject">ส่วนลด 1 (%)</label>
                                    <input type="text" id="pdiscper1" name="discountper1" placeholder="กรอกส่วนลด"
                                        class="form-control" value="0" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="endtproject">ส่วนลด 2 (%)</label>
                                    <input type="text" id="pdiscper2" name="discountper2" placeholder="กรอกส่วนลด"
                                        class="form-control" value="0" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="endtproject">ส่วนลด 3 (%)</label>
                                    <input type="text" id="pdiscper3" name="discountper3" placeholder="กรอกส่วนลด"
                                        class="form-control" value="0" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="endtproject">ส่วนลด 4 (%)</label>
                                    <input type="text" id="pdiscper4" name="discountper4" placeholder="กรอกส่วนลด"
                                        class="form-control" value="0" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="endtproject">ส่วนลดพิเศษ</label>
                                    <input type="text" id="pdiscex" name="discountper2" class="form-control" value="0" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>
                                    <input type="text" id="pdisamt" name="disamt" class="form-control" value="0" />
                                    <input type="hidden" id="pvat" value="0">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <!-- <a id="chkprice" class="btn btn-primary" style="margin-top:25px;">ดูราคา</a> -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label>VAT:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control text-center" id="vatper" name="vatper"
                                        placeholder="7%" value="7">
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="endtproject">vat</label>
                                    <input type="text" id="to_vat" name="to_vat" class="form-control" value="0" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="endtproject">จำนวนเงินสุทธิ</label>
                                    <input type="text" id="pnetamt" name="netamt" class="form-control" value="0" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="input-group">
                                        <label for="datesend ">วันที่ส่งของ</label>
                                        <!-- <span class="input-group-addon"><i class="icon-calendar22"></i></span> -->
                                        <input type="date" class="form-control" id="datesend" name="datesend">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="">Ref. Asset Code</label>
                                    <div class="input-group">
                                        <input type="text" id="accode" name="accode" readonly="true" class="form-control input-sm">
                                        <input type="text" id="acname" name="acname" readonly="true" class="form-control input-sm">
                                        <input type="hidden" id="statusass" name="statusass" readonly="true" class="form-control input-sm">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info btn-sm" id="refasset" data-toggle="modal"
                                                data-target="#refass"><span class="glyphicon glyphicon-search"></span>
                                                ค้นหา</button>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="endtproject">หมายเหตุ</label>
                                        <input type='text' id="remarkitem" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                            <button type="button" id="addtorowwww" class="btn btn-info">Insert</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /basic modal -->
        </div>
        <!-- /content area -->
    </div>
    <div id="ppoenffff" class="modal fade">
        <div class="modal-dialog modal-full">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">เพิ่มรายการ</h5>
                </div>
                <div class="modal-body">
                    <div class="row" id="modal_matsss"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(".openunsws").click(function(){
  var row = ($('#body tr').length-0)+1;
  $("#modal_matsss").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#modal_matsss").load('<?php echo base_url(); ?>share/getmatcode/'+row);
  });
  </script>
    <div class="modal fade" id="boq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
                </div>
                <div class="modal-body">
                    <div class="row" id="modal_boq">
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end modal matcode and costcode -->
    <script>
        $('#selectcostcodeboq').click(function(){
    var system = $('#system').val();
    $('#modal_boq').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#modal_boq").load('<?php echo base_url(); ?>pr/model_costcodeboq/<?php echo $bd_tenid; ?>/'+system);
    });
    </script>
    <div class="modal fade" id="refass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ref. Asset Code</h4>
                </div>
                <div class="modal-body">
                    <div class="row" id="refasscode">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#refasset').click(function(){
    $('#refasscode').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#refasscode").load('<?php echo base_url(); ?>share/modalshare_asset');
    });
    </script>
    <!--  -->
    <div id="opnewmat" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">เพิ่มรายการ</h5>
                </div>
                <div class="modal-body">
                    <div class="row" id="modal_newmat">
                    </div>
                    <script>
                        $(".openun").click(function(){
            var row = ($('#body tr').length-0)+1;
            $("#modal_newmat").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
            // $("#modal_newmat").load('<?php echo base_url(); ?>share/getmatcode/'+row);
            $("#modal_newmat").load('<?php echo base_url(); ?>index.php/share/material_alone');
            });
            </script>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal"> Close</button>
                </div>
            </div>
        </div> <!-- matcode-->
    </div>
    <div class="modal fade" id="costcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
                </div>
                <div class="modal-body">
                    <div id="modal_cost"></div>
                </div>
            </div>
        </div>
    </div><!-- end modal matcode and costcode -->
    <script>
        $(".modalcost").click(function(){
        $('#modal_cost').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#modal_cost").load('<?php echo base_url(); ?>index.php/share/costcode');
        });
        </script>
    <!-- modal เลือกหน่วย -->
    <div class="modal fade" id="openunit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">เลือกหน่วย</h4>
                </div>
                <div class="panel-body">
                    <div class="loadunit">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end modal -->
    <!--  -->
    <script>
        $(".openuit").click(function(){
          $(".loadunit").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $(".loadunit").load('<?php echo base_url(); ?>share/unit');
          });
          </script>
    <div class="modal fade" id="openunitic" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">หน่วย</h4>
                </div>
                <div class="modal-body">
                    <div id="modal_unitic"></div>
                </div>
            </div>
        </div>
    </div><!-- end modal matcode and costcode -->
    <script>
        $(".unitic").click(function() {
            $('#modal_unitic').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
            $("#modal_unitic").load('<?php echo base_url(); ?>index.php/share/unitid2');
        });
    </script>
    <script>
        $('.datatable-basic').DataTable();
        $("#myform").validate();
    </script>
    <script>
        $('#chkadd').click(function(event) {
            if ($('#chkadd').prop('checked')) {
                $('#newmatname').prop('disabled', false);
            } else {
                $('#newmatname').prop('disabled', true);
            }
        });
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/pnotify.min.js">
    </script>
    <script>
        $("#qty , #cpqtyic , #pprice_unit ,#pdiscper1 ,#pdiscper2 ,#pdiscper3 ,#pdiscper4 ,#pdiscex").keyup(function() {
            var xqty = ($("#qty").val().replace(/,/g, "") * 1);
            var xprice = ($("#pprice_unit").val().replace(/,/g, "") * 1);
            var xamount = xqty * xprice;
            var xdiscper1 = parseFloat($("#pdiscper1").val().replace(/,/g, "") * 1);
            var xdiscper2 = parseFloat($("#pdiscper2").val().replace(/,/g, "") * 1);
            var xdiscper3 = parseFloat($("#pdiscper3").val().replace(/,/g, "") * 1);
            var xdiscper4 = parseFloat($("#pdiscper4").val().replace(/,/g, "") * 1);
            var xdiscper5 = parseFloat($("#pdiscex").val().replace(/,/g, "") * 1);
            var xvatt = parseFloat($("#vatper").val().replace(/,/g, "") * 1);
            var xpd1 = xamount - (xamount * xdiscper1) / 100;
            var xpd2 = xpd1 - (xpd1 * xdiscper2) / 100;
            var xpd3 = xpd2 - (xpd2 * xdiscper3) / 100;
            var xpd4 = xpd3 - (xpd3 * xdiscper4) / 100;
            var xpd8 = ((xpd4 - xdiscper5) * xvatt) / 100;
            var total_di = xamount - xpd4;
            var xvat = parseFloat($("#vatper").val().replace(/,/g, "") * 1);
            $("#pamount").val(numberWithCommas(xamount));
            $("#too_di").val(total_di);
            $("#to_vat").val(numberWithCommas(xpd8));
            $("#tot_vat").val(numberWithCommas(xpd8));
            if (xdiscper5 != 0) {
                vxpd4 = xpd4 - xdiscper5;
                $("#pdisamt").val(numberWithCommas(vxpd4));
                $("#too_di").val(vxpd4);
                vxpd5 = (xpd4 - xdiscper5) + xpd8;
                $("#pnetamt").val(numberWithCommas(vxpd5));
            } else if (xdiscper2 != 0) {
                $("#pdisamt").val(numberWithCommas(xpd4));
                $("#too_di").val(xpd4);
                vxpd2 = xpd4 + xpd8;
                $("#pnetamt").val(numberWithCommas(vxpd2));
            } else if (xdiscper3 != 0) {
                $("#pdisamt").val(numberWithCommas(xpd4));
                $("#too_di").val(xpd4);
                vxpd3 = xpd4 + xpd8;
                $("#pnetamt").val(numberWithCommas(vxpd3));
            } else if (xdiscper4 != 0) {
                $("#pdisamt").val(numberWithCommas(xpd4));
                $("#too_di").val(xpd4);
                vxpd5 = xpd4 + xpd8;
                $("#pnetamt").val(numberWithCommas(vxpd5));
            } else {
                $("#pdisamt").val(numberWithCommas(xpd1));
                $("#too_di").val(xpd1);
                vxpd1 = xpd4 + xpd8;
                $("#pnetamt").val(numberWithCommas(vxpd1));
            }
        });
        // set number format
        // $("#qty,#pqtyic,#cpqtyic").number(true);
        // $("#pprice_unit,#pdisamt").number(true,2);
    </script>
    <script>
        $('.editpo').click(function() {
            var url = "<?php echo base_url(); ?>index.php/office/edit_prmaster";
            var dataSet = {
                prcode: $("#prno").val(),
                pridate: $('#prdate').val(),
                memname: $("#memname").val(),
                memid: $("#memid").val(),
                putproject: $("#putprojectid").val(),
                depart: $("#depid").val(),
                place: $("#place").val(),
                deliverydate: $("#deliverydate").val(),
                remarkedit: $("#remark").val(),
                costtype: $("#costtype").val(),
                vender: $("#venderidd").val(),
                system: $("#system").val(),
                purchase_type: $("#purchase_type").val(),
                express: $("#express").val(),
                subname: $('#subname').val(),
                subid: $('#subid').val(),
                wo: $('#wo').val(),
            };
            $.post(url, dataSet, function(data) {
                new PNotify({
                    title: 'Success notice',
                    text: data,
                    icon: 'icon-checkmark3',
                    type: 'success'
                });
            });
        });
    </script>
    <?php
            $datestring = "Y";
            $m = "m";
            $d = "d";
            $this->db->select('*');
            $qu = $this->db->get('pr_item');
            $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
            if ($res==0) {
            $BOQQ = "BOQ".date($datestring).date($m).date($d)."1";
            }else{
            $this->db->select('*');
            $this->db->order_by('pri_id','desc');
            $this->db->limit('1');
            $q = $this->db->get('pr_item');
            $run = $q->result();
            foreach ($run as $valx)
            {
            $x11 = $valx->pri_id+1;
            }
            $BOQQ = "BOQ".date($datestring).date($m).date($d).$x11;
            }?>
    <script>
        $('#addtorowwww').click(function() {
            var pjid = $("#putprojectid").val();
            var prprcode = $('#prno').val();
            var url = "<?php echo base_url(); ?>index.php/office/add_prdetail2";
            var dataSet = {
                prcode: prprcode,
                matcode: $("#newmatcode").val(),
                matname: $('#newmatname').val(),
                codecostcode: $('#codecostcode').val(),
                costname: $('#costname').val(),
                qty: $("#qty").val(),
                unit: $("#unit").val(),
                datesend: $("#datesend").val(),
                remark: $("#remarkitem").val(),
                accode: $("#accode").val(),
                acname: $("#acname").val(),
                statusass: $("#statusass").val(),
                system: $("#system").val(),
                cpqtyic: $("#cpqtyic").val(),
                pqtyic: $('#pqtyic').val(),
                punitic: $('#punitic').val(),
                pprice_unit: $('#pprice_unit').val(),
                pamount: $("#pamount").val(),
                pdiscper1: $("#pdiscper1").val(),
                pdiscper2: $("#pdiscper2").val(),
                pdiscper3: $("#pdiscper3").val(),
                pdiscper4: $("#pdiscper4").val(),
                pdiscex: $("#pdiscex").val(),
                pdisamt: $("#pdisamt").val(),
                vatper: $("#vatper").val(),
                to_vat: $("#to_vat").val(),
                pnetamt: $("#pnetamt").val(),
                hiddencost: $("#hiddencost").val(),
                remark_mat: $("#remark_mat").val(),
                projecid: pjid,
            };
            $.post(url, dataSet, function(data) {
                console.log($.trim(data));
                setTimeout(function() {
                    window.location.href = "<?php echo base_url(); ?>pr/editpr/"+$.trim(data)+"/<?php echo $flag; ?>/<?php echo $getprojectid;?>";
                }, 1000);
            });

        });
    </script>

    <script type="text/javascript">
        $('#purchase').attr('class', 'active');
        $('#pr_archive').attr('style', 'background-color:#dedbd8');
    </script>