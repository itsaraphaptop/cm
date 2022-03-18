<?php $flag = $this->uri->segment(4);?>
<?php $dname = $this->uri->segment(3);?>
<?php if ($flag == 'd') {
  $this->db->select('department_title');
  $this->db->where('department_id', $dname);
  $q = $this->db->get('department');
$res = $q->result();?>
<?php foreach ($res as $key => $value) {
    $dpname = $value->department_title;
    $pjname = 0;
    $projectida = 0;
}?>
<?php }else if ($flag == 'p') {
  $this->db->select('project_id,project_name');
  $this->db->where('project_id', $dname);
  $q = $this->db->get('project');
$res = $q->result();?>
<?php foreach ($res as $key => $value) {
    $dpname = "";
    $pjname = $value->project_name;
    $projectida = $value->project_id;
}?>
<?php }?>
<?php
$this->db->select('*');
$this->db->from('project');
$this->db->where('project_id', $projectida);
$boq = $this->db->get()->result();
$bd_tenid = 0;
$chkconbqq = 0;
$controlbg = 0;
$chkconbqq = 0;
?>
<?php foreach ($boq as $eboq) {
  $chkconbqq = $eboq->chkconbqq;
  $controlbg = $eboq->controlbg;
  $bd_tenid = $eboq->bd_tenid;
  $chkconbqq = $eboq->chkconbqq;
  $pjcode = $eboq->project_code;
  $c_pr = $eboq->c_pr;
  $a_pr = $eboq->a_pr;
}
?>
<?php
 //var_dump($array_system);
?>
<div class="content-wrapper">

      <div class="content">
        <div class="row">
          <form  id="fpr" action="<?php echo base_url(); ?>pr_active/newpr/<?php echo $flag; ?>/<?php echo $bd_tenid; ?>" method="post" enctype="multipart/form-data">
            <div class="panel panel-flat">
              <div class="panel-heading">
                <h5 class="panel-title">Purchase Requisition &nbsp;
                <?php if ($chkconbqq == "1") {echo '<button class="in label label-info"><i class="icon-checkmark4"></i> Control BOQ</button>';} else {echo '<button class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control BOQ</button>';}
                ?>&nbsp; <?php if ($controlbg == "2") {echo '<button class="apprv label label-success"><i class="icon-checkmark4"></i> Control Budget</button>';} else {echo '<button class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control Budget</button>';}
                ?>
                <?php if ($flag != "d") {?>
                <input type="hidden" name="pjcode" value="<?php echo $dname; ?>">
                <?php } else {?>
                <input type="hidden" name="pjcode" value="<?php echo isset($depid); ?>">
                <?php }?>
                </h5>
                <div class="heading-elements">
                 
                </div>
              </div>
              <div class="panel-body">
                <div class="tabbable">
										<ul class="nav nav-tabs nav-tabs-component">
											<li class="active"><a href="#basic-rounded-tab1" data-toggle="tab">PR</a></li>
											<!-- <li><a href="#basic-rounded-tab2" data-toggle="tab">Attachment File</a></!--> -->
											<!-- <li><a href="#basic-rounded-tab3" data-toggle="tab">Booking</a></li> -->
										</ul>
                  <div class="tab-content">
										<div class="tab-pane active" id="basic-rounded-tab1">
                    <!-- tab1 -->
                     <div class="row">
                  <div class="col-md-12">
                    <fieldset>
                      <div class="col-md-6">
                        <legend class="text-semibold"><i class="icon-reading position-left"></i>Create New Purchase Requisition  &nbsp;&nbsp;<label class="checkbox-inline">
                          <div><span><input type="checkbox" name="express" class="styled" value="1"></span></div>
                          <b style="color: red;">Express Delivery!</b>
                        </label></legend>
                        <div class="form-group">
                          <label>PR Document No. :</label>
                          <input type="text" class="form-control" readonly="readonly" id="prno" placeholder="เลขที่ใบขอซื้อ">
                        </div>
                        <div class="form-group">
                          <label>Requestor:</label>
                          <div class="input-group">
                            <span class="input-group-btn">
                              <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                            </span>
                            <input type="text" class="form-control" readonly="readonly" name="memname" id="memname" placeholder="กรอกผู้ขอซื้อ" value="<?php echo $name; ?>">
                            <input type="hidden" name="memid" id="memid" value="<?php echo $mid; ?>">
                            <div class="input-group-btn">
                              <button type="button" class="openmember btn btn-info btn-icon" data-toggle="modal" data-target="#openmember"><i class="icon-search4"></i></button>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Project :</label>
                        <div class="input-group">
                          <span class="input-group-btn">
                            <button class="btn btn-default btn-icon" type="button"><i class="icon-office"></i></button>
                          </span>
                          <input type="text" class="form-control" readonly="readonly" placeholder="โครงการ" value="<?php echo $pjname; ?>" name="projectname" id="projectnam">
                          <?php if ($flag != 'd') { ?>
                          <input type="hidden" readonly="true" value="<?php echo $projectida; ?>" class="pproject1 form-control" name="projectid" id="putprojectid">
                          <input type="hidden" class="form-control" name="c_pr" id="c_pr" value="<?php if ($c_pr == 0) {echo "approve";} else {echo "wait";}?>">
                          <input type="hidden" class="form-control" name="a_pr" id="a_pr" value="<?php echo $a_pr; ?>">
                          <input type="hidden" readonly="true" value="<?php echo $projectida; ?>" class="form-control" name="projectcode" id="projectcode">
                          <input type="hidden" readonly="true" value="<?php echo $pjcode; ?>" class="form-control" name="projcode" id="projcode">
                          <?php }?>
                          <?php if ($flag == 'd') { ?>
                          <input type="hidden" readonly="true" value="" class="pproject1 form-control" name="projectid" id="putprojectid">
                          <input type="hidden" class="form-control" name="c_pr" id="c_pr" value="wait">
                          <input type="hidden" class="form-control" name="a_pr" id="a_pr" value="">
                          <?php }?>
                          <div class="input-group-btn">
                          </ul>
                        </div>
                      </div>
                    </div>
              
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Type Of Cost:</label>
                          <select name="costtype" id="costtype" class="form-control">
                            <?php foreach ($costtype as $v) {?>
                            <option value="<?php echo $v->costtype_id; ?>"><?php echo $v->costype_name; ?></option>
                            <?php }?>
                          </select>
                        </div>
                      </div>
                    </div>

                     <div class="row">
                   <div class="col-md-12">
                  <div class="form-group">
                    <label class="display-block text-semibold">Vender:</label>
                    <div class="input-group">
                      <span class="input-group-btn">
                        <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                      </span>
                      <input type="text" class="form-control" readonly   name="vender" id="vender" >
                      <input type="hidden" name="venderidd" id="venderidd">
                      <div class="input-group-btn">
                        <a class="ven btn btn-info btn-icon" data-toggle="modal" data-target="#openvender"><i class="icon-search4"></i></a>
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
                            <input type="text" class="form-control" readonly="readonly" name="subname" id="subname" placeholder="กรอกผู้ขอซื้อ" value="">
                            <input type="hidden" name="subid" id="subid" value="">
                            <div class="input-group-btn">
                              <button type="button" class="subconmodal btn btn-info btn-icon" data-toggle="modal" data-target="#subconmodal"><i class="icon-search4"></i></button>
                          
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
                            <input type="text" class="form-control" readonly="readonly" name="wo" id="wo"  value="">
                            <div class="input-group-btn">
                              <button type="button" class="womodal btn btn-info btn-icon" data-toggle="modal" data-target="#womodal"><i class="icon-search4"></i></button>
                          
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
                        <label>Request Date: </label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                          <input type="date" class="form-control" id="prdate" name="prdate" value="<?php echo date("Y-m-d");?>">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Delivery Date:</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                          <input type="date" class="form-control" id="deliverydate" name="deliverydate" value="<?php echo date("Y-m-d");?>">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="code">System </label> <b style="color: red">* </b>
                        <select class="form-control" name="system" id="system" required="">
                          <option value=""></option>
                          <?php foreach ($array_system as $key => $system) { ?>
                          <option value="<?=$system["value"]?>"><?=$system["name"]?></option>
                          <?php }?>
                          <?php if ($flag == 'd') {?>
                          <?php echo "<option value='1'>Overhead</option>" ?>
                          <?php }?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="pr_type">Type Of PR</label>
                      <select class="form-control" name="pr_type">
                        <option value="1">PO/WO</option>
                        <option value="2">PO Only</option>
                        <option value="3">WO Only</option>
                      </select>
                    </div>
                  </div>
                 <br>
                 <div class="row">
                <div class="col-md-6">
                  <fieldset>
                    <div class="form-group">
                      <label>Remark :</label>
                      <input id="c" class="form-control" required="required" placeholder="หมายเหตุ" name="remark"/>
                    </div>
                  </fieldset>
                </div>
                <div class="col-md-6">
                  <fieldset>
                    <div class="form-group">
                      <label>Place/Address :  <b style="color: red">* Please Fill Place/Address</b></label>
                      <input class="form-control" required="required" placeholder="สถานที่ส่งของ" name="place" id="place" value="<?php echo $pjname; ?>"/>
                    </div>
                  </fieldset>
                </div>
              </div>
                </div>


              </fieldset>

            </div>

            <!-- <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-component">
              <li class="active"><a href="#panel-pill1" data-toggle="tab" aria-expanded="false"> Purchase request</a></li>
              <li ><a href="#panel-pill2" data-toggle="tab" aria-expanded="false"> Booking</a></li>
            </ul>
          </div> -->
          <!-- <div class="tab-content">            
            <div class="tab-pane has-padding active" id="panel-pill1">
              <div id="pr" class="table-responsive"> -->
                <div class="col-md-12">
                  <div class="row">
                     <input type="hidden" name="chkprdetail" id="chkprdetail" value="0"> 
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped table-xxs">
                        <thead>
                          <tr>
                            <th>Action</th>
                            <th>#</th>
                            <th>Control</th>
                            <th>Type</th>
                            <th>Material Code</th>
                            <th>Material Name</th>
                            <th>Cost Code</th>
                            <th>Cost Name</th>
                            <th>Qty</th>
                            <th>Unit</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody id="body">
                          <tr>
                            <td colspan="11" class="text-center" id="delse">NO DATA</td>
                          </tr>
                        </tbody>
                        <tr hidden="">
                          <td><input type="number" name="sumpr" id="sumpr" value="0"></td>
                        </tr>
                        <?php if ($flag != 'd') { ?>
                        <?php
                          $this->db->select('*');
                          $this->db->from('approve');
                          $this->db->where('approve_project', $pjcode);
                          $this->db->where('type', "PR");
                          $this->db->order_by("approve_sequence", "asc");
                          $app_pj = $this->db->get()->result();
                        foreach ($app_pj as $app) { ?>
                        <tr hidden>
                          <td><input type="text" name="approve_sequence[]" value="<?php echo $app->approve_sequence; ?>"></td>
                          <td><input type="text" name="approve_mid[]" value="<?php echo $app->approve_mid; ?>"></td>
                          <td><input type="text" name="approve_mname[]" value="<?php echo $app->approve_mname; ?>"></td>
                          <td><input type="text" name="approve_lock[]" value="<?php echo $app->approve_lock; ?>"></td>
                          <td><input type="text" name="approve_cost[]" value="<?php echo $app->approve_cost; ?>"></td>
                        </tr>
                        <?php }?>
                        <?php }?>
                      </table>
                    </div>
                  </div>
                <!-- </div> 
              </div>
            </div>
            <div id="panel-pill2" class="tab-pane has-padding ">     
              <div id="bk" class="table-responsive"> 
                <div class="col-md-12">
                  <div class="row">
                    <input type="hidden" name="chkbooking" id="chkbooking" value="0"> 
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped table-xxs" style="overflow-x:100%">
                        <thead>
                          <tr>
                            <th><div style="width: 50px;">Action</div></th>
                            <th><div style="width: 20px;">#</div></th>
                            <th><div style="width: 250px;">Material Code</div></th>
                            <th><div style="width: 250px;">Material Name</div></th>
                            <th><div style="width: 250px;">Cost Code</div></th>
                            <th><div style="width: 250px;">Cost Name</div></th>
                            <th><div style="width: 100px;">Qty</div></th>
                            <th><div style="width: 100px;">Unit</div></th>
                            <th><div style="width: 150px;">Stock Center</div></th>
                            <th><div style="width: 150px;">Ware House</div></th>
                          </tr>
                        </thead>
                        <tbody id="booking">                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div> 
              </div> -->
               <div class="col-md-12">
              <br>
              <div class="text-right">
                <?php if ($chkconbqq == 1) {
                  echo '<a data-toggle="modal" data-target="#boqreteive" class="boqreteive btn bg-warning-400 "><i class="icon-plus22"></i> Ref. BOQ</a>';
                }?>
                <a id="sss" class="btn btn-info"><i class="icon-plus22"></i> ADD Rows</a>
                <button type="button" id="spr" class="btn btn-success"><i class="icon-box-add"></i> Save </button>
                <!-- <button type="button" id="save_booking" class="btn btn-danger"><i class="icon-file-check"></i> Save Booking </button> -->
              </div>
            </div>
           </div>
          </div>
                    <!-- tab1 -->
                    </div>
										<div class="tab-pane" id="basic-rounded-tab2">
                      <div class="form-group">
                        <label class="control-label input-xs" style="text-align: right;">Attachment File  <span class="text-danger">*</span></label>
                        <div class="col-lg-3">
                          <input type="file" name="styled_file" class="file-styled" accept=".jpg,.jpeg,.png,.pdf,.xlsx,.xls" required="required">
                          <span class="text-danger">Only file .jpg , .jpeg , .png , .pdf <p>Maximum 2MB</p></span>
                        </div>
                      </div>
                    </div>





                    
                    <div class="tab-pane" id="basic-rounded-tab3">
                      <div id="bk" class="table-responsive"> 
                        <div class="col-md-12">
                          <div class="row">
                            <input type="hidden" name="chkbooking" id="chkbooking" value="0"> 
                            <div class="table-responsive">
                              <table class="table table-bordered table-striped table-xxs" style="overflow-x:100%">
                                <thead>
                                  <tr>
                                    <th><div style="width: 50px;">Action</div></th>
                                    <th><div style="width: 20px;">#</div></th>
                                    <th><div style="width: 250px;">Material Code</div></th>
                                    <th><div style="width: 250px;">Material Name</div></th>
                                    <th><div style="width: 250px;">Cost Code</div></th>
                                    <th><div style="width: 250px;">Cost Name</div></th>
                                    <th><div style="width: 100px;">Qty</div></th>
                                    <th><div style="width: 100px;">Unit</div></th>
                                    <th><div style="width: 150px;">Stock Center</div></th>
                                    <th><div style="width: 150px;">Ware House</div></th>
                                  </tr>
                                </thead>
                                <tbody id="booking">                         
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div> 
                      </div>
                    </div>

                  </div>
                </div>








               
           
          </div>
        </div>
      </div>
    </form>
    
  </div>
 
  <div id="boqreteive" class="modal fade" data-backdrop="false">
    <div class="modal-dialog modal-full">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h5 class="modal-title">Ref. BOQ<?php echo $bd_tenid; ?></h5>
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
  $("#system").change(function(){
  var system = $('#system').val();
  $("#refbqq").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
  $("#refbqq").load('<?php echo base_url(); ?>pr/model_boq/<?php echo $bd_tenid; ?>/'+system+'/<?php echo $dname; ?>');
  });
  </script>
  <!-- Full width modal -->
  <div id="openvender" class="modal fade" data-backdrop="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
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
  var fg ='<?php echo $this->uri->segment(4); ?>'
  if(fg=='d'){
  $('#pj').hide();
  }else{
  $('#dp').hide();
  }
  $(".ven").click(function(){
  $("#loadvender").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
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
  if(fg=='d'){
  $('#pj').hide();
  }else{
  $('#dp').hide();
  }

  $(".subconmodal").click(function(){
    var sub = "subcontractor";
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
          <h5 class="modal-title">Work Order (<?php echo isset($pjcode); ?>)</h5>
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
  $("#womodals").load('<?php echo base_url(); ?>share/wo_modal/<?php echo $projectida; ?>');
  });
  </script>

  <div id="editrow"></div>
  <!-- /editrow -->
  <!-- Basic modal -->
  <script>
  $("#sss").click(function(){
  
  if($("#system").val()=="") {
  swal({
  title: "Please Choose Your System !!.",
  text: "",
  confirmButtonColor: "#EA1923",
  type: "error"
  });
  }else{
  $("#insertroww").modal('show');
  }
  });
  </script>


  <div id="insertroww" class="modal fade"  data-backdrop="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content ">
        <div class="modal-header bg-info">
         
          <h5 class="modal-title">Insert PR</h5>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-xs-6">
              <label for="">Materail Name</label>
              <div class="input-group">
                <?php $q = $this->db->query("select valuess from master_checking where keyss='pr_material_check'")->result();
                $cck="";
                foreach ($q as $k) {
                  $cck = $k->valuess;
                }
                if ($cck == "Y") {
                ?>
                <span class="input-group-addon">
                  <input type="checkbox" id="chk" aria-label="กำหนดเอง">
                </span>
                <?php }?>
                <input type="text" id="newmatname" disabled="true" placeholder="Materail Name" class="form-control">
                <input type="text" id="newmatcode" disabled="true" placeholder="Materail Code" class="form-control">
                <span class="input-group-btn" >
                  <button class="openun btn btn-info btn-block" data-toggle="modal" data-target="#opnewmat"><span class="glyphicon glyphicon-search"></span>  </button>
                  <button class="openund btn btn-info" data-toggle="modal" data-target="#opnewmattt"><span class="glyphicon glyphicon-search"></span>  </button>
                </span>
              </div>
            </div>
            <div class="col-xs-6">
              <label for="">Cost Name</label>
              <div class="input-group">
                <input type="text" id="costname" readonly="true" placeholder="Cost Name" class="form-control">
                <input type="text" id="codecostcode" readonly="true" placeholder="Cost Code" class="form-control">
                <input type="hidden" id="type" readonly="true" placeholder="Cost Code" class="form-control">
                <span class="input-group-btn" >
                  <?php if ($controlbg == "2") {
                    // echo '<button class="btn btn-info" id="selectcostcodeboq" data-toggle="modal" data-target="#boq"><span class="glyphicon glyphicon-search"></span>  </button>';
                  } else {
                    // echo '<button class="btn btn-info" id="selectcostcode" data-toggle="modal" data-target="#costcode"><span class="glyphicon glyphicon-search"></span>  </button>';
                  }
                  ?>
                  <button class="btn btn-info" id="selectcostcode" data-toggle="modal" data-target="#costcode"><span class="glyphicon glyphicon-search"></span>  </button>
                  <input type="hidden" id="hiddencost"  name="chkbowhere" placeholder="Cost Code" class="form-control">
                </span>
              </div>
            </div>
          </div><br>
          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label for="qty">Detail Of Materail</label>
                <input type="text" id="remark_mat"  class="form-control" value="">
              </div>
            </div>       
            
          </div>

          <div class="row">
            <div id="mat_code_base"></div>
           <!--  <div class="form-inline col-sm-2"><br>
              <div class="checkbox checkbox-switchery switchery-xs">
                <label class="display-block">
                   Reserve This Materail
                </label>
                  <input type="hidden" class="switchery1" id="" name=""/><br>
                  <input type="checkbox" class="styled checkbox-inline" id="book" name="book" value="book"/> 
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="qty">Stock Center</label>
                <input type="text" id="st_center" readonly="true" name="st_center" class="form-control" value="">
              </div>
            </div>   
            <div class="col-sm-2">
              <div class="form-group">
                <label for="qty">Reserve QTY</label>
                <input type="text" id="st_qty" name="st_qty" class="form-control" value="">
              </div>
            </div> -->    
            
          </div>
          <div class="row">
            <hr>
            
          </div>
          <div class="row">
            <div class="col-xs-3">
              <div class="input-group">
                <label for="qty">QTY</label>
                <input type="text" id="qty" placeholder="กรอกปริมาณ" class="form-control" pattern="[0-9]+([\.,][0-9]+)*" value="0">
              </div>
            </div>
            <div class="col-xs-3">
              <div class="input-group">
                <label for="unit">Unit</label>
                <input type="text" id="unit" readonly="true" placeholder="กรอกหน่วย" class="form-control">
                <span class="input-group-btn" >
                  <span class="input-group-btn" >
                    <button class="openuit btn btn-info btn-sm" data-toggle="modal" data-target="#openunit" 
                    style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span>  </button>
                  </span>
                </span>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="qty">Convert IC</label>
                <input type="text" id="cpqtyic" name="cqtyic"  placeholder="กรอกปริมาณ IC" class="form-control" value="1">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="qty">QTY IC</label>
                <input type="text" id="pqtyic" name="pqtyic"  placeholder="กรอกปริมาณ IC" class="form-control" value="1">
              </div>
            </div>
            <div class="col-md-2">
              <div class="input-group">
                <label for="unit">Unit IC</label>
                <input type="text" id="punitic" name="punitic" readonly="true" placeholder="กรอกหน่วย" class="form-control" value="">
                <span class="input-group-btn" >
                  <a class="unitic btn btn-primary btn-sm" data-toggle="modal" data-target="#openunitic" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span>  </a>
                </span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="price_unit">Price/Unit</label>
                <input type="text" id="pprice_unit"  name="price_unit" placeholder="กรอกราคา/หน่วย" class="form-control border-danger border-lg" value="0">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" id="pamount"  readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="form-control number" value="0">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="endtproject">Discount 1 (%)</label>
                <input type="text" id="pdiscper1" name="discountper1" class="form-control" value="0"/>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="endtproject">Discount 2 (%)</label>
                <input type="text" id="pdiscper2" name="discountper2" class="form-control" value="0" />
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="endtproject">Discount 3 (%)</label>
                <input type="text" id="pdiscper3" name="discountper3" class="form-control" value="0"/>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="endtproject">Discount 4 (%)</label>
                <input type="text" id="pdiscper4" name="discountper4" class="form-control" value="0" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="endtproject">Special Discount</label>
                <input type="text" id="pdiscex" name="discountper2" class="form-control" value="0"/>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="endtproject">Amount After Discount</label>
                <input type="text" id="pdisamt" name="disamt" class="form-control" value="0" readonly="" />
                <input type="hidden" id="pvat" value="0">
              </div>
            </div>       
              
          </div>
          <div class="row">
            <div class="col-md-2">
              <label>VAT:</label>
              <div class="input-group">
                <input type="text" class="form-control text-center" id="vatper" name="vatper[]" placeholder="7%" value="7" >
                <span class="input-group-addon">%</span>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="endtproject">VAT</label>
                <input type="text" id="to_vat" name="to_vat" class="form-control" readonly=""  value="0" />
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="endtproject">Net Amount</label>
                <input type="text" id="pnetamt" name="netamt" class="form-control" value="0" readonly=""/>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="datesend ">Delivery Date</label>
                  <input type="date" class="form-control" id="datesend" name="datesend"
                  style="width: 200px">
                </div>
              </div>
              <div class="col-xs-6">
                <label for="">Ref. Asset Code</label>
                <div class="input-group">
                  <input type="text" id="accode" name="accode"  readonly="true"  class="form-control">
                  <input type="text" id="acname" name="acname" readonly="true"  class="form-control">
                  <input type="hidden" id="statusass" name="statusass" readonly="true"  class="form-control">
                  <span class="input-group-btn" >
                    <button class="btn btn-info btn-sm" id="refasset" data-toggle="modal" data-target="#refass"><span class="glyphicon glyphicon-search"></span> </button>
                  </span>
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="endtproject">Remarks</label>
                  <input type="text" id="remarkitem" class="form-control" />
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" id="closeaddrow" class="btn btn-link" data-dismiss="modal">Close</button>
            <button type="button" id="addtorow"  class="btn btn-info">Insert</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /basic modal -->
  </div>
  <!-- /content area -->
  <div id="opnewmattt" class="modal fade" data-backdrop="false">
    <div class="modal-dialog modal-full">
      <div class="modal-content ">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">เพิ่มรายการ</h5>
        </div>
        <div class="modal-body">
          <div class="row" id="modal_matdd"></div>
        </div>
      </div>
    </div>
  </div>
  <script>
  $(".openund").click(function(){
  var row = ($('#body tr').length-0)+1;
  $("#modal_matdd").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
  $("#modal_matdd").load('<?php echo base_url(); ?>share/getmatcode/'+row);
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
    $(".unitic").click(function(){
    $('#modal_unitic').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
    $("#modal_unitic").load('<?php echo base_url(); ?>index.php/share/unitid2');
    });
    </script>
  </div>
  <!-- modal  โครงการ-->
  <div class="modal fade" id="openproj"  data-backdrop="false">
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
    </div> <!--end modal -->
    <script>
    $(".openproj").click(function(){
    $('#modal_project').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
    $("#modal_project").load('<?php echo base_url(); ?>index.php/share/project');
    });
    </script>
    <!-- modal  โครงการ-->
    <!-- modal  พนักงาน-->
    <div class="modal fade" id="openmember"  data-backdrop="false">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Select Employee</h4>
          </div>
          <div class="modal-body">
            <div class="panel-body">
              <div class="row" id="modal_member">
              </div>
            </div>
          </div>
        </div>
      </div>
      </div> <!--end modal -->
      <script>
      $(".openmember").click(function(){
      $('#modal_member').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
      $("#modal_member").load('<?php echo base_url(); ?>index.php/share/member');
      });
      </script>
      <!-- modal  พนักงาน-->
      <div class="modal fade" id="opendpt"  data-backdrop="false">
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
        </div> <!--end modal -->
        <script>
        $(".opendpt").click(function(){
        $('#modal_dpt').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
        $("#modal_dpt").load('<?php echo base_url(); ?>index.php/share/department');
        });
        </script>
        <!--  -->
        <div id="opnewmat" class="modal fade"  data-backdrop="false">
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
                $("#modal_newmat").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
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
          <div class="modal fade" id="costcode"  data-backdrop="false">
            <div class="modal-dialog modal-full">
              <div class="modal-content">
                <div class="modal-header bg-info">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
                </div>
                <div class="modal-body">
                  <div class="row" id="modal_cost">
                  </div>
                </div>
              </div>
            </div>
            </div><!-- end modal matcode and costcode -->
            <script>
            $('#selectcostcode').click(function(){
            $('#modal_cost').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
            $("#modal_cost").load('<?php echo base_url(); ?>share/costcode_id');
            });
            </script>
            <div class="modal fade" id="boq"  data-backdrop="false">
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
              $('#modal_boq').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
              $("#modal_boq").load('<?php echo base_url(); ?>pr/model_costcodeboq/<?php echo $bd_tenid; ?>/'+system);
              });
              </script>
              <div class="rowmat">
              <div class="cost">
              </div>
              <div class="modal fade" id="refass"  data-backdrop="false">
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
              $('#refasscode').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
              $("#refasscode").load('<?php echo base_url(); ?>share/modalshare_asset');
              });
              </script>
              <!-- modal เลือกหน่วย -->
              <div class="modal fade" id="openunit"  data-backdrop="false">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">เลือกหน่วย1</h4>
                    </div>
                    <div class="panel-body">
                      <div class="row">
                        <table id="dataunit" class="table table-striped table-xxs datatable-basicunit" >
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>หน่วย</th>
                              <th width="5%">จัดการ</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $n = 1;?>
                            <?php foreach ($getunit as $valj) { ?>
                            <tr>
                              <td><?php echo $n; ?></td>
                              <td><?php echo $valj->unit_name; ?></td>
                              <td><button class="openunddd<?php echo $n; ?> btn btn-xs btn-block btn-info" data-toggle="modal"  data-vunit="<?php echo $valj->unit_name; ?>" data-dismiss="modal">เลือก</button></td>
                            </tr>
                            <script>
                            $(".openunddd<?php echo $n; ?>").click(function(event) {
                              $("#unit").val($(this).data('vunit'));
                              // $("#unit<?php echo $n; ?>").val($(this).data('vunit'));
                            });
                            </script>
                            <?php $n++;}?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                </div> <!--end modal -->
                <!--  -->
                <!-- Core JS files -->
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
                <script>
                //event add row new reload
                $("#qty,#cpqtyic").keyup(function() {
                  intOnly($(this));
                // var xqty = parseFloat($("#qty").val());
                var xqty = ($("#qty").val().replace(/,/g,"")*1);
                // var cpqtyic = parseFloat($("#cpqtyic").val());
                var cpqtyic = $("#cpqtyic").val().replace(/,/g,"")*1;
                var xpq = xqty*cpqtyic;
                $("#pqtyic").val(numberWithCommas(xpq));
                });

                </script>
                <!-- /core JS files -->
                <script>
                $('.datatable-basicunit').DataTable();
                // function number()
                
                </script>
                <?php
                $datestring = "Y";
                $m = "m";
                $d = "d";
                $this->db->select('*');
                $qu = $this->db->get('pr_item');
                $res = $qu->num_rows(); //เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
                if ($res == 0) {
                  $BOQQ = "BOQ" . date($datestring) . date($m) . date($d) . "1";
                } else {
                  $this->db->select('*');
                  $this->db->order_by('pri_id', 'desc');
                  $this->db->limit('1');
                  $q = $this->db->get('pr_item');
                  $run = $q->result();
                  foreach ($run as $valx) {
                    $x11 = $valx->pri_id + 1;
                  }
                  $BOQQ = "BOQ" . date($datestring) . date($m) . date($d) . $x11;
                }?>
                <script>
                $("#myform").validate();
                </script>
                <script>
                $('#chk').click(function(event) {
                if($('#chk').prop('checked')) {
                $('#newmatname').prop('disabled', false);
                } else {
                $('#newmatname').prop('disabled', true);
                }
                });

                $('#closeaddrow').click(function(event) {
                        $("#newmatname").val('');
                        $("#newmatcode").val('');
                        $("#costname").val('');
                        $("#codecostcode").val('');
                        $("#qty").val('');
                        $("#unit").val('');
                        $("#datesend").val('');
                        $("#remarkitem").val('');
                        $("#accode").val('');
                        $("#acname").val('');
                       
                });

                $("#addtorow").click(function(event) {                
                  var st_center = parseFloat($('#st_center').val());
                  var st_qty = parseFloat($('#st_qty').val());
                  
                  if (st_qty > st_center ) {
                    swal({
                        title: "Over QTY !!!",
                        text: "",
                        confirmButtonColor: "#EA1923",
                        type: "error"
                    });
                  }              

                  if ($("#qty").val()!="") {
                    if ($("#newmatname").val()=="") {
                      swal({
                      title: "Please Select Materail !!.",
                      text: "",
                      confirmButtonColor: "#EA1923",
                      type: "error"
                      });
                      // }else if ($("#qty").val()=="") {
                      // swal({
                      // title: "กรุณาใส่จำนวน!!.",
                      // text: "",
                      // confirmButtonColor: "#EA1923",
                      // type: "error"
                      // });
                      // }else if ($("#cpqtyic").val()=="") {
                      // swal({
                      // title: "กรุณากรอกแปลงค่า IC!!.",
                      // text: "",
                      // confirmButtonColor: "#EA1923",
                      // type: "error"
                      // });
                    }else if ($("#costname").val()=="") {
                      if ($("#depname").val()=="") {
                        $("#insertrow").modal('toggle');
                        // $("#pprice_unit").val(0);
                         addrow();
                        $("#newmatname").val('');
                        $("#newmatcode").val('');
                        $("#costname").val('');
                        $("#codecostcode").val('');
                        $("#qty").val('');
                        $("#unit").val('');
                        $("#datesend").val('');
                        $("#remarkitem").val('');
                        $("#accode").val('');
                        $("#acname").val('');
                        $('#st_qty').val('');
                        $('#st_center').val();
                        $('#book').val();
                        $('#pdiscex').val();
                       
                        
                      }else{
                        swal({
                        title: "Please Select Costcode !!.",
                        text: "",
                        confirmButtonColor: "#EA1923",
                        type: "error"
                        });
                      }
                    }else{
                      addrow();                    
                      $("#insertrow").modal('toggle');
                      $("#pprice_unit").val(0);
                      $("#pamount").val(0);
                      $("#pdisamt").val('');
                      $("#to_vat").val('');
                      $("#pnetamt").val('');
                      $("#pdisamt").val('');
                      $("#newmatname").val('');
                      $("#newmatcode").val('');
                      $("#costname").val('');
                      $("#codecostcode").val('');
                      $("#qty").val('');
                      $("#unit").val('');
                      $("#datesend").val('');
                      $("#remarkitem").val('');
                      $("#accode").val('');
                      $("#acname").val('');
                      $("#cpqtyic").val('1');
                      $("#pqtyic").val('');
                      $("#punitic").val('');
                      $("#pdiscper1").val('0');
                      $("#pdiscper2").val('0');
                      $("#pdiscper3").val('0');
                      $("#pdiscper4").val('0');
                    }
                $(document).on({
                'show.bs.modal': function () {
                var zIndex = 1040 + (10 * $('.modal:visible').length);
                $(this).css('z-index', zIndex);
                setTimeout(function() {
                $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
                }, 0);
                },
                'hidden.bs.modal': function() {
                if ($('.modal:visible').length > 0) {
                // restore the modal-open class to the body element, so that scrolling works
                // properly after de-stacking a modal.
                setTimeout(function() {
                $(document.body).addClass('modal-open');
                }, 0);
                }
                }
                }, '.modal');
                // editrow();
                  }else{
                    if( $('#st_qty').val() != ""){ 
                        addrow2();

                    }else{
                      swal({
                        title: "Fill Reserve QTY !!!",
                        text: "",
                        confirmButtonColor: "#EA1923",
                        type: "error"
                    });
                    }
                  }                 

                });
                $("#qty ,#pprice_unit , #pdiscper1 , #pdiscper2 , #pdiscper3 , #pdiscper4 ,#pdiscex ,#vatper").keyup(function(){
                var qty = $('#qty').val();
                if(qty == "") {
                swal({
                title: "Please Fill QTY !!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
                });
                $('#pprice_unit').val(0);
                }else{
                var xqty = parseFloat($("#qty").val().replace(/,/g,"")*1);
                var xprice = parseFloat($("#pprice_unit").val().replace(/,/g,"")*1);
                var xamount = xqty*xprice;
                var xdiscper1 = parseFloat($("#pdiscper1").val().replace(/,/g,"")*1);
                var xdiscper2 = parseFloat($("#pdiscper2").val().replace(/,/g,"")*1);
                var xdiscper3 = parseFloat($("#pdiscper3").val().replace(/,/g,"")*1);
                var xdiscper4 = parseFloat($("#pdiscper4").val().replace(/,/g,"")*1);
                var xdiscper5 = parseFloat($("#pdiscex").val().replace(/,/g,"")*1);
                var xvatt = parseFloat($("#vatper").val().replace(/,/g,"")*1);
                var xpd1 = xamount - (xamount*xdiscper1)/100;
                var xpd2 = xpd1 - (xpd1*xdiscper2)/100;
                var xpd3 = xpd2 - (xpd2*xdiscper3)/100;
                var xpd4 = xpd3 - (xpd3*xdiscper4)/100;
                var xpd8 = ((xpd4 - xdiscper5) *xvatt)/100;
                var total_di = xamount-xpd4;
                var xvat = parseFloat($("#vatper").val().replace(/,/g,"")*1);
                $("#pamount").val(numberWithCommas(xamount));
                $("#too_di").val(total_di);
                $("#to_vat").val(numberWithCommas(xpd8));
                $("#tot_vat").val(xpd8);
                if(xdiscper5 != 0){
                vxpd4 = xpd4-xdiscper5;
                $("#pdisamt").val(numberWithCommas (vxpd4));
                $("#too_di").val(vxpd4);
                vxpd5 = (xpd4-xdiscper5) + xpd8;
                $("#pnetamt").val(numberWithCommas(vxpd5));
                }
                else if(xdiscper2 != 0){
                $("#pdisamt").val(numberWithCommas (xpd4));
                $("#too_di").val(xpd4);
                vxpd2 = xpd4 + xpd8;
                $("#pnetamt").val(numberWithCommas(vxpd2));
                }
                else if(xdiscper3 != 0){
                $("#pdisamt").val(numberWithCommas (xpd4));
                $("#too_di").val(xpd4);
                vxpd3 = xpd4 + xpd8;
                $("#pnetamt").val(numberWithCommas(vxpd3));
                }
                else if(xdiscper4 != 0){
                $("#pdisamt").val(numberWithCommas (xpd4));
                $("#too_di").val(xpd4);
                vxpd5 = xpd4 + xpd8;
                $("#pnetamt").val(numberWithCommas(vxpd5));
                }
                else
                {
                $("#pdisamt").val(numberWithCommas (xpd1));
                $("#too_di").val(xpd1);
                vxpd1 = xpd4 + xpd8;
                $("#pnetamt").val(numberWithCommas(vxpd1));
                }
                }
                });

                function addrow() {
                  if(<?php echo $chkconbqq; ?>==1){
                    swal({
                    title: "This Materail is not from BOQ",
                    text: "",
                    confirmButtonColor: "#EA1923",
                    type: "success"
                    });
                  }

                  var chkprdetail = parseFloat($('#chkprdetail').val());
                  $('#chkprdetail').val(chkprdetail+1);

                  $('#delse').closest('tr').remove();
                  // $("#book").remove();
                  var row = ($('#body tr').length-0)+1;
                  var qty = $('#qty').val();                  
                  var matname = $("#newmatname").val();
                  var matcode = $("#newmatcode").val();
                  var unit = $("#unit").val();
                  var datesend = $("#datesend").val();
                  var remark = $("#remarkitem").val();
                  var costcode = $("#codecostcode").val();
                  var costname = $("#costname").val();
                  var hiddencost = $("#hiddencost").val();
                  var accode = $("#accode").val();
                  var acname = $("#acname").val();
                  var statusass = $("#statusass").val();
                  var cpqtyic = $('#cpqtyic').val();      
                  var pqtyic = $("#pqtyic").val();
                  var punitic = $("#punitic").val();
                  var pprice_unit = $("#pprice_unit").val();
                  var pamount = $("#pamount").val();
                  var pdiscper1 = $("#pdiscper1").val();
                  var pdiscper2 = $("#pdiscper2").val();
                  var pdiscper3 = $("#pdiscper3").val();
                  var pdiscper4 = $("#pdiscper4").val();
                  var pdiscex = $("#pdiscex").val();
                  var pdisamt = $("#pdisamt").val();
                  var vatper = $("#vatper").val();
                  var to_vat = $("#to_vat").val();
                  var pnetamt = $("#pnetamt").val();
                  var type = $("#type").val();
                  var sumpr = parseFloat($("#sumpr").val().replace(/,/g,"")*1);
                  var pamountt = parseFloat($("#pamount").val().replace(/,/g,"")*1);
                  var remat  = $("#remark_mat").val();
                  $('#sumpr').val(sumpr+pamountt);
                  var ckkcontrolbg = '<?php echo $controlbg; ?>';
                    if(ckkcontrolbg=="2"){
                    var chk = 'hidden';
                    var chk1 = '';
                    }else{
                    var chk = '';
                    var chk1 = 'hidden';
                    }
                    var tr = 
                    '<tr id="'+row+'">'+
                    '<td class="hidden-center">'+
                        '<ul class="icons-list">'+
                          '<li><a href="#" data-popup="tooltip" data-toggle="modal" data-target="#edit_modal'+row+'" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>'+
                          '<li><a id="delete'+row+'" class="noty-runner" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></li>'+
                        '</ul>'+
                      '</td>'+
                      '<td id="trq'+row+'">'+row+'<input type="hidden" id="chkbo'+row+'" name="chkbo[]" value="PR" /><input type="hidden" id="chkbowhere'+row+'" name="chkbowhere[]" value="" /><input type="hidden" id="pri_boqrow" name="pri_boqrow[]" value="0" /></td>'+
                      '<td id="control'+row+'" class="text-center"><input type="checkbox" disabled /></td>'+
                      '<td id="boq_type'+row+'" class="text-center"><label class="label label-warning">Not Select BOQ</label><input type="hidden" id="boq_type" name="boq_type[]" value="0" /></td>'+
                      '<td id="trmatcode'+row+'">'+matcode+'<input type="hidden" id="trmatcode'+row+'" name="matcodei[]" value="'+matcode+'" /></td>'+
                      '<td id="trmatname'+row+'">'+matname+'<input type="hidden" id="trmatname'+row+'" name="matnamei[]" value="'+matname+'" /></td>'+
                      '<td id="tdcostcode'+row+'">'+costcode+'<input type="hidden" name="costcodei[]" value="'+costcode+'" /></td>'+
                      '<td id="tdcostname'+row+'">'+costname+'<input type="hidden" name="costnamei[]" value="'+costname+'" /></td>'+
                      '<td id="trqty'+row+'">'+qty+'<input type="hidden" name="qtyi[]" value="'+qty+'" /></td>'+
                      '<td id="trunit'+row+'">'+unit+'<input type="hidden" name="uniti[]" value="'+unit+'" /></td>'+
                      '<td id="datesends'+row+'">'+datesend+'<input type="hidden" name="datesend[]" value="'+datesend+'" /><input type="hidden" name="accode[]" value="'+accode+'" /><input type="hidden" name="acname[]" value="'+acname+'" /><input type="hidden" name="statusass[]" value="'+statusass+'" /><input type="hidden" name="cpqtyic[]" value="'+cpqtyic+'" /><input type="hidden" name="pqtyic[]" value="'+pqtyic+'" /><input type="hidden" name="punitic[]" value="'+punitic+'" /><input type="hidden" name="pprice_unit[]" value="'+pprice_unit+'" /><input type="hidden" name="pamount[]" value="'+pamount+'" /><input type="hidden" name="pdiscper1[]" value="'+pdiscper1+'" /><input type="hidden" name="pdiscper2[]" value="'+pdiscper2+'" /><input type="hidden" name="pdiscper3[]" value="'+pdiscper3+'" /><input type="hidden" name="pdiscper4[]" value="'+pdiscper4+'" /><input type="hidden" name="pdiscex[]" value="'+pdiscex+'" /><input type="hidden" name="pdisamt[]" value="'+pdisamt+'" /><input type="hidden" name="vatper[]" value="'+vatper+'" /><input type="hidden" name="to_vat[]" value="'+to_vat+'" /><input type="hidden" name="pnetamt[]" value="'+pnetamt+'" /><input type="hidden" id="trremark'+row+'" name="remarki[]" value="'+remark+'" /><input type="hidden" name="type[]" value="'+type+'" /><input type="hidden" name="remark_mat[]" value="'+remat+'" /></td>'+
                      
                    '</tr>';
                   
                  $('#body').append(tr);
                  var modal = '<div id="edit_modal'+row+'" class="modal fade">'+
                    '<div class="modal-dialog modal-lg">'+
                      '<div class="modal-content ">'+
                        '<div class="modal-header bg-info">'+
                          '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                          '<h5 class="modal-title">เพิ่มรายการd'+row+''+matname+'</h5>'+
                        '</div>'+
                        '<div class="modal-body">'+
                          '<div class="row">'+
                            '<div class="col-xs-6">'+
                              '<label for="">รายการซื้อ</label>'+
                              '<div class="input-group">'+
                                <?php $q = $this->db->query("select valuess from master_checking where keyss='pr_material_check'")->result();
                                foreach ($q as $k) {
                                  $cck = $k->valuess;
                                }
                                if ($cck == "Y") {
                                ?>
                                '<span class="input-group-addon">'+
                                  '<input type="checkbox" id="chke'+row+'" aria-label="กำหนดเอง">'+
                                '</span>'+
                                <?php }?>
                                '<input type="text" id="newmatname'+row+'" disabled="true" placeholder="เลือกรายการซื้อ" class="form-control" value="'+matname+'">'+
                                '<input type="text" id="newmatcode'+row+'" readonly="true" placeholder="เลือกรายการซื้อ" class="form-control" value="'+matcode+'">'+
                                '<span class="input-group-btn">'+
                                '<a class="loadmat'+row+' btn btn-info btn-block" data-toggle="modal"  data-target="#mat'+row+'"><i class="icon-search4"></i></a>'+
                                '<a class="pooi'+row+' btn btn-info" data-toggle="modal" data-target="#opnewmattti'+row+'"><i class="icon-search4"></i></a>'+
                                
                              '</span>'+
                                '</div>'+
                              '</div>'+
                              '<div class="col-xs-6">'+
                                '<label for="">รายการต้นทุน</label>'+
                                '<div class="input-group">'+
                                  '<input type="text" id="costname'+row+'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control" value="'+costname+'">'+
                                  '<input type="text" id="codecostcode'+row+'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control" value="'+costcode+'">'+
                                  '<input type="hidden" id="type'+row+'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control " value="'+type+'">'+
                                  '<span class="input-group-btn" >'+
                                    '<button class="costmat'+row+' btn btn-info btn-sm '+chk+'" data-toggle="modal" data-target="#costcode'+row+'"><span class="glyphicon glyphicon-search"></span></button>'+
                                    '<a class="btn btn-info btn-sm '+chk1+' " id="boqitem'+row+'" data-toggle="modal" data-target="#boq'+row+'"><span class="glyphicon glyphicon-search"></span></a>'+
                                  '</span>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                            '<div class="row">'+
                              '<div class="col-xs-6">'+
                                '<div class="form-group">'+
                                  '<label for="qty">รายละเอียดเพิ่มเติม</label>'+
                                  '<input type="text" id="remark_mat'+row+'" placeholder="กรอกปริมาณ" class="form-control"  value="'+remat+'">'+
                                '</div>'+
                              '</div>'+
                              '<div class="row">'+
                              '<div class="col-xs-12">'+
                                '<div class="form-group">'+
                                  '<hr>'+
                                '</div>'+
                              '</div>'+
                              '<div class="col-xs-3">'+
                                '<div class="form-group">'+
                                  '<label for="qty">ปริมาณ</label>'+
                                  '<input type="number" id="qtyf'+row+'" placeholder="กรอกปริมาณ" class="form-control"  value="'+qty+'">'+
                                '</div>'+
                              '</div>'+
                              '<div class="col-xs-3">'+
                                '<div class="input-group">'+
                                  '<label for="unit">หน่วย</label>'+
                                  '<input type="text" id="unit'+row+'" readonly="true" placeholder="กรอกหน่วย" class="form-control" value="'+unit+'">'+
                                  '<span class="input-group-btn" >'+
                                    '<button class="modalunit'+row+' btn btn-info btn-sm" data-toggle="modal" data-target="#openunit'+row+'" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span>  </button>'+
                                  '</span>'+
                                '</div>'+
                              '</div>'+
                            
                              '<div class="col-md-2">'+
                                '<div class="form-group">'+
                                  '<label for="qty">แปลงค่า IC</label>'+
                                  '<input type="text" id="cpqtyic'+row+'" name="cqtyic"  placeholder="กรอกปริมาณ IC" class="form-control" value="'+cpqtyic+'">'+
                                '</div>'+
                              '</div>'+
                              '<div class="col-md-2">'+
                                '<div class="form-group">'+
                                  '<label for="qty">ปริมาณ IC</label>'+
                                  '<input type="text" id="pqtyic'+row+'" name="pqtyic"  placeholder="กรอกปริมาณ IC" class="form-control" value="'+pqtyic+'">'+
                                '</div>'+
                              '</div>'+
                              '<div class="col-xs-2">'+
                                '<div class="input-group">'+
                                  '<label for="unit">หน่วย IC</label>'+
                                  '<input type="text" id="punitic'+row+'" name="punitic" readonly="true"  class="form-control" value="'+punitic+'">'+
                                  '<span class="input-group-btn" >'+
                                    ' <a class="unitic'+row+' btn btn-primary btn-sm" data-toggle="modal" data-target="#openunitic'+row+'" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span>  </a>'+
                                  '</span>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                            '<div class="row">'+
                              '<div class="col-md-6">'+
                                '<div class="form-group">'+
                                  ' <label for="price_unit">ราคา/หน่วย</label>'+
                                  '<input type="text" id="pprice_unit'+row+'"  name="price_unit" placeholder="กรอกราคา/หน่วย" class="form-control border-danger border-lg" value="'+pprice_unit+'">'+
                                '</div>'+
                              '</div>'+
                              ' <div class="col-md-6">'+
                                '<div class="form-group">'+
                                  '<label for="amount">จำนวนเงิน</label>'+
                                  '<input type="text" id="pamount'+row+'" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="form-control number" value="'+pamount+'">'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                            '<div class="row">'+
                              '<div class="col-md-3">'+
                                '<div class="form-group">'+
                                  '<label for="endtproject">ส่วนลด 1 (%)</label>'+
                                  '<input type="text" id="pdiscper1'+row+'" name="discountper1" placeholder="กรอกส่วนลด" class="form-control" value="'+pdiscper1+'"/>'+
                                '</div>'+
                              '</div>'+
                              '<div class="col-md-3">'+
                                '<div class="form-group">'+
                                  ' <label for="endtproject">ส่วนลด 2 (%)</label>'+
                                  ' <input type="text "id="pdiscper2'+row+'" name="discountper2" placeholder="กรอกส่วนลด" class="form-control" value="'+pdiscper2+'" />'+
                                '</div>'+
                              '</div>'+
                              '<div class="col-md-3">'+
                                '<div class="form-group">'+
                                  '<label for="endtproject">ส่วนลด 3 (%)</label>'+
                                  ' <input type="text" id="pdiscper3'+row+'" name="discountper3" placeholder="กรอกส่วนลด" class="form-control" value="'+pdiscper3+'"/>'+
                                '</div>'+
                              ' </div>'+
                              '<div class="col-md-3">'+
                                '<div class="form-group">'+
                                  '<label for="endtproject">ส่วนลด 4 (%)</label>'+
                                  ' <input type="text" id="pdiscper4'+row+'" name="discountper4" placeholder="กรอกส่วนลด" class="form-control" value="'+pdiscper4+'" />'+
                                ' </div>'+
                              '</div>'+
                            '</div>'+
                            ' <div class="row">'+
                              ' <div class="col-md-6">'+
                                ' <div class="form-group">'+
                                  '<label for="endtproject">ส่วนลดพิเศษ</label>'+
                                  '<input type="text" id="pdiscex'+row+'" name="discountper2" class="form-control" value="'+pdiscex+'"/>'+
                                '</div>'+
                              '</div>'+
                              ' <div class="col-md-4">'+
                                '<div class="form-group">'+
                                  '<label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>'+
                                  '<input type="text" id="pdisamt'+row+'" name="disamt" class="form-control" value="'+pdisamt+'" readonly="0" />'+
                                  '<input type="hidden" id="pvat'+row+'" value="0">'+
                                '</div>'+
                              ' </div>'+
                              '<div class="col-md-2">'+
                                '<div class="form-group">'+
                                  
                                '</div>'+
                              '</div>'+
                            '</div>'+
                            '<div class="row">'+
                              '<div class="col-md-2">'+
                                '<label>VAT:</label>'+
                                '<div class="input-group">'+
                                  '<input type="text" class="form-control text-center" id="vatper'+row+'" name="vatper[]" placeholder="7%" value="'+vatper+'" readonly="">'+
                                  '<span class="input-group-addon">%</span>'+
                                ' </div>'+
                              ' </div>'+
                              '<div class="col-md-2">'+
                                '<div class="form-group">'+
                                  ' <label for="endtproject">vat</label>'+
                                  '<input type="text" id="to_vat'+row+'" name="to_vat" class="form-control" value="'+to_vat+'"/>'+
                                '</div>'+
                              '</div>'+
                              ' <div class="col-md-2">'+
                                '<div class="form-group">'+
                                  '<label for="endtproject">จำนวนเงินสุทธิ</label>'+
                                  '<input type="text" id="pnetamt'+row+'" name="netamt" class="form-control" value="'+pnetamt+'" readonly=""/>'+
                                '</div>'+
                              '</div>'+
                              '<div class="row">'+
                                '<div class="col-xs-6">'+
                                  '<div class="input-group">'+
                                    '<label for="datesend ">วันที่ส่งของ</label>'+
                                    '<input type="date" id="datesend'+row+'" class="form-control daterange-single" id="datesend" name="datesend" value="'+datesend+'">'+
                                  '</div>'+
                                '</div>'+
                              '</div>'+
                              '<div class="row">'+
                                '<div class="col-xs-6">'+
                                  '<label for="">Ref. Asset Code</label>'+
                                  '<div class="input-group">'+
                                    '<input type="text" id="accode'+row+'" name="accode"  readonly="true"  class="form-control">'+
                                    '<input type="text" id="acname'+row+'" name="acname" readonly="true"  class="form-control">'+
                                    '<input type="hidden" id="statusass'+row+'" name="statusass" readonly="true"  class="form-control">'+
                                    '<span class="input-group-btn" >'+
                                      '<button class="btn btn-info btn-sm" id="refasset" data-toggle="modal" data-target="#refass'+row+'"><span class="glyphicon glyphicon-search"></span>  </button>'+
                                    '</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-xs-6">'+
                                  '<div class="form-group">'+
                                    '<label for="endtproject">หมายเหตุ</label>'+
                                    '<input type="text" id="remarkitem'+row+'" class="form-control" value="'+remark+'" />'+
                                  '</div>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                            '<div class="modal-footer">'+
                              '<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>'+
                              '<button type="button" id="edittorow'+row+'" data-dismiss="modal" class="btn btn-info">Edit Row</button>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>';
                      $('#editrow').append(modal);


                   var rowmat = '<div id="mat'+row+'" class="modal fade">'+
                    '<div class="modal-dialog modal-full">'+
                      '<div class="modal-content ">'+
                        '<div class="modal-header bg-info">'+
                          '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                            '<h5 class="modal-title">เพิ่มรายการ</h5>'+
                        '</div>'+
                        '<div class="modal-body">'+
                            '<div class="row" id="mat_chart'+row+'">'+
                            '</div>'+
                        '</div>'+
                        '</div>'+
                      '</div>'+
                    '</div>';
                    $('.rowmat').append(rowmat);
                    $(".loadmat"+row+"").click(function(){
                    $('#mat_chart'+row+'').load("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                    $("#mat_chart"+row+"").load('<?php echo base_url(); ?>index.php/bd/material_alonee/'+row);
                    });
                     

                   var rowmat = '<div id="opnewmattti'+row+'" class="modal fade">'+
                    '<div class="modal-dialog modal-full">'+
                      '<div class="modal-content ">'+
                        '<div class="modal-header bg-info">'+
                          '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                          '<h5 class="modal-title">เพิ่มรายการ</h5>'+
                        '</div>'+
                      '<div class="modal-body">'+
                        '<div class="row" id="modal_matti'+row+'">'+
                        '</div>'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                  '</div>';
                  $('.rowmat').append(rowmat);

                  $(".pooi"+row+"").click(function(){
                    $('#modal_matti'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                    $('#modal_matti'+row+'').load('<?php echo base_url(); ?>index.php/share/getmatcode/'+row);
                    });
                   


                      var rowmat =   '<div class="modal fade" id="openunit'+row+'" data-backdrop="false">'+
                                '<div class="modal-dialog">'+
                                  '<div class="modal-content">'+
                                    '<div class="modal-header bg-info">'+
                                      '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                      '<h4 class="modal-title" id="myModalLabel">หน่วย</h4>'+
                                    '</div>'+
                                    '<div class="modal-body">'+
                                      '<div id="modal_unit'+row+'"></div>'+
                                   ' </div>'+
                                  '</div>'+
                                '</div>'+
                                '</div>';
                              $(".modalunit"+row+"").click(function(){
                              $('#modal_unit'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                              $("#modal_unit"+row+"").load('<?php echo base_url(); ?>index.php/share/unit/'+row);
                              });
                              $('.rowmat').append(rowmat);

                      var rowmat = ' <div id="opnewmat'+row+'" class="modal fade">'+
                        '<div class="modal-dialog modal-full">'+
                          '<div class="modal-content ">'+
                            '<div class="modal-header bg-info">'+
                              '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                              '<h5 class="modal-title">เพิ่มรายการ</h5>'+
                            '</div>'+
                            '<div class="modal-body">'+
                              '<div class="row" id="modal_newmat'+row+'">'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>';
                      $('.rowmat').append(rowmat);
                      var rowmat = ' <div id="costcode'+row+'" class="modal fade">'+
                        '<div class="modal-dialog modal-full">'+
                          '<div class="modal-content ">'+
                            '<div class="modal-header bg-info">'+
                              '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                              '<h5 class="modal-title">เพิ่มรายการ</h5>'+
                            '</div>'+
                            '<div class="modal-body">'+
                              '<div class="row" id="modal_cost'+row+'">'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>';
                      $('.rowmat').append(rowmat);
                      var rowmat = '<div class="modal fade" id="refass'+row+'"  data-backdrop="false">'+
                        '<div class="modal-dialog modal-lg">'+
                          '<div class="modal-content">'+
                            '<div class="modal-header bg-info">'+
                              ' <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                              '<h4 class="modal-title" id="myModalLabel">Ref. Asset Code</h4>'+
                            ' </div>'+
                            '<div class="modal-body">'+
                              '<div class="row" id="refasscode'+row+'">'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>';
                      $('.rowmat').append(rowmat);
                      var rowmat = '<div class="modal fade" id="openunitic'+row+'" data-backdrop="false">'+
                        '<div class="modal-dialog">'+
                          '<div class="modal-content">'+
                            '<div class="modal-header bg-info">'+
                              '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                              '<h4 class="modal-title" id="myModalLabel">หน่วย</h4>'+
                            '</div>'+
                            '<div class="modal-body">'+
                              '<div id="modal_unitic'+row+'"></div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                      $(".unitic"+row+"").click(function(){
                      $('#modal_unitic'+row+'').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
                      $("#modal_unitic"+row+"").load('<?php echo base_url(); ?>index.php/share/unitid2/'+row+'');
                      });
                  var cost =  
                    '<div class="modal fade" id="boq'+row+'" data-backdrop="false">'+
                      '<div class="modal-dialog modal-lg">'+
                        '<div class="modal-content">'+
                          '<div class="modal-header bg-info">'+
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                            '<h4 class="modal-title" id="myModalLabel">Cost Code</h4>'+
                          ' </div>'+
                          '<div class="modal-body">'+
                            '<div id="modal_boq'+row+'"></div>'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                    '</div>';
                  $('.cost').append(cost);
                  $('#boqitem'+row+'').click(function(){
                    var system = $('#system').val();
                    $('#modal_boq'+row+'').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
                    $("#modal_boq"+row+"").load('<?php echo base_url(); ?>pr/model_costcodeboq_row/<?php echo $bd_tenid; ?>/'+system+'/'+row);
                  });
                  $('#qtyf'+row+',#pprice_unit'+row).keyup(function(){
                    var xqty = ($('#qtyf'+row+'').val().replace(/,/g,"")*1);
                    var xprice = ($('#pprice_unit'+row+'').val().replace(/,/g,"")*1);
                    var xamount = xqty*xprice;
                    var xdiscper1 = ($('#pdiscper1'+row+'').val().replace(/,/g,"")*1);
                    var xdiscper2 = ($('#pdiscper2'+row+'').val().replace(/,/g,"")*1);
                    var xdiscper3 = ($('#pdiscex'+row+'').val().replace(/,/g,"")*1);
                    var xvatt = ($('#vatper'+row+'').val().replace(/,/g,"")*1);
                    var xpd1 = xamount - (xamount*xdiscper1)/100;
                    var xpd2 = xpd1 - (xpd1*xdiscper2)/100;
                    var xpd3 = xpd2 - (xpd1*xdiscper3)/100;
                    var xpd4 = (xamount *xvatt)/100;
                    var xvat = ($('#pvat'+row+'').val().replace(/,/g,"")*1);
                    $('#pamount'+row+'').val(numberWithCommas(xamount));
                    $('#to_vat'+row+'').val(numberWithCommas(xpd4));
                    $('#po_vat'+row+'').val(numberWithCommas(xpd4));
                    if(xdiscper3 != 0){
                    vxpd3 = xpd2-xdiscper3;
                    $('#pdisamt'+row+'').val(numberWithCommas(vxpd3));
                    $('#pnetamt'+row+'').val(numberWithCommas(vxpd3));
                    }
                    else if(xdiscper2 != 0){
                    $('#pdisamt'+row+'').val(numberWithCommas(xpd2));
                    vxpd2 = xpd2 - (xpd2*xvat)/100;
                    $('#pnetamt').val(numberWithCommas(vxpd2));
                    }
                    else
                    {
                    $('#pdisamt'+row+'').val(numberWithCommas(xpd1));
                    vxpd1 = xpd1 - (xpd1*xvat)/100;
                    $('#pnetamt'+row+'').val(numberWithCommas(vxpd1));
                    }
                  });
                    // $("#qtyf"+row+"").keyup(function() {
                    //   var xqty = parseFloat($("#qtyf"+row+"").val());
                    //   var cpqtyic = parseFloat($("#cpqtyic"+row+"").val());
                    //   var xpq = xqty*cpqtyic;
                    //   alert("#qtyf");
                    //   $("#pqtyic"+row+"").val(xpq);
                    //   });
                    // $("#cpqtyic"+row+"").keyup(function() {
                    //   var xqty = parseFloat($("#qtyf"+row+"").val());
                    //   var cpqtyic = parseFloat($("#cpqtyic"+row+"").val());
                    //   var xpq = xqty*cpqtyic;
                    //   alert("#cpqtyic");
                    //   $("#pqtyic"+row+"").val(xpq);
                    //   });
                    $('.rowmat').append(rowmat);
                    $('#refasset').click(function(){
                    $('#refasscode'+row).html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
                    $("#refasscode"+row).load('<?php echo base_url(); ?>share/modalshare_asset/'+row);
                    });
                    $('.openun'+row).click(function(){
                    $('#modal_newmat'+row).html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
                    $("#modal_newmat"+row).load('<?php echo base_url(); ?>share/material_id/'+row);
                    });
                    $('.costmat'+row).click(function(){
                    $('#modal_cost'+row).html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
                    $("#modal_cost"+row).load('<?php echo base_url(); ?>share/costcode_id/'+row);
                    });
                    $('#chke'+row).click(function(event) {
                    if($('#chke'+row).prop('checked')) {
                    $('#newmatname'+row).prop('disabled', false);
                    } else {
                    $('#newmatname'+row).prop('disabled', true);
                    }
                    });
                    $("#edittorow"+row).click(function(event) {
                      $("#trmatcode"+row).html('<td id="trmatcode'+row+'">'+$("#newmatcode"+row).val()+'<input type="hidden" id="trmatcode'+row+'" name="matcodei[]" value="'+$("#newmatcode"+row).val()+'" /></td>');
                      $("#trmatname"+row).html('<td id="trmatname'+row+'">'+$("#newmatname"+row).val()+'<input type="hidden" id="trmatname'+row+'" name="matnamei[]" value="'+$("#newmatname"+row).val()+'" /></td>');
                      $("#trqty"+row).html('<td id="trqty'+row+'">'+$("#qtyf"+row).val()+'<input type="hidden" id="id="trqty'+row+'"" name="qtyi[]" value="'+$("#qtyf"+row).val()+'" /></td>');

                      $("#trunit"+row).html('<td id="trunit'+row+'">'+$("#unit"+row).val()+'<input type="hidden" name="uniti[]" value="'+$("#unit"+row).val()+'" /></td>');

                      $("#tdcostcode"+row).html('<td id="tdcostcode'+row+'">'+$("#codecostcode"+row).val()+'<input type="hidden" id="trcostcode'+row+'" name="costcodei[]" value="'+$("#codecostcode"+row).val()+'" /></td>');
                      $("#tdcostname"+row).html('<td id="tdcostname'+row+'">'+$("#costname"+row).val()+'<input type="hidden" id="trcostname'+row+'" name="costnamei[]" value="'+$("#costname"+row).val()+'" /></td>');
                      $("#datesends"+row).html('<td id="datesends'+row+'">'+$("#datesend"+row).val()+'<input type="hidden" id="datesend'+row+'" name="datesend[]" value="'+$("#datesend"+row).val()+'" /><input type="hidden" name="accode[]" value="'+$("#accode"+row).val()+'" /><input type="hidden" name="acname[]" value="'+$("#acname"+row).val()+'" /><input type="hidden" name="statusass[]" value="'+$("#statusass"+row).val()+'" /><input type="hidden" name="cpqtyic[]" value="'+$("#cpqtyic"+row).val()+'" /><input type="hidden" name="pqtyic[]" value="'+$("#pqtyic"+row).val()+'" /><input type="hidden" name="punitic[]" value="'+$("#punitic"+row).val()+'" /><input type="hidden" name="pprice_unit[]" value="'+$("#pprice_unit"+row).val()+'" /><input type="hidden" name="pamount[]" value="'+$("#pamount"+row).val()+'" /><input type="hidden" name="pdiscper1[]" value="'+$("#pdiscper1"+row).val()+'" /><input type="hidden" name="pdiscper2[]" value="'+$("#pdiscper2"+row).val()+'" /><input type="hidden" name="pdiscper3[]" value="'+$("#pdiscper3"+row).val()+'" /><input type="hidden" name="pdiscper4[]" value="'+$("#pdiscper4"+row).val()+'" /><input type="hidden" name="pdiscex[]" value="'+$("#pdiscex"+row).val()+'" /><input type="hidden" name="pdisamt[]" value="'+$("#pdisamt"+row).val()+'" /><input type="hidden" name="vatper[]" value="'+$("#vatper"+row).val()+'" /><input type="hidden" name="to_vat[]" value="'+$("#to_vat"+row).val()+'" /><input type="hidden" name="pnetamt[]" value="'+$("#pnetamt"+row).val()+'" /><input type="hidden" name="remarki[]" value="'+$("#remarkitem"+row).val()+'" /><input type="hidden" name="type[]" value="'+$("#type"+row).val()+'" /><input type="hidden" name="remark_mat[]" value="'+$("#remark_mat"+row).val()+'" /></td>');
                      $("#trremark"+row).val($("#remarkitem"+row).val());
                      if ($("#newmatname"+row).val()=="") {
                      $("#trmatcode"+row).text("");
                      $("#newmatcode"+row).val("");
                      }
                    });
                    
                   $(document).on('click', 'a#delete'+row+'', function () { // <-- changes
                     // Initialize
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
                                  var row = ($('#body tr').length-0);
                                  var rows = ($('#body tr').length-0)+1;
                                  $('#trq'+row).text(rows);
                                    noty({
                                      force: true,
                                      text: 'Deleteted',
                                      type: 'success',
                                      layout: self.data('layout'),
                                      timeout: 1000
                                    });
                                  }
                              },
                              {
                                addClass: 'btn btn-danger btn-xs',
                                text: 'Cancel',
                                onClick: function ($noty) {
                                $noty.close();
                                noty({
                                  force: true,
                                  text: 'You clicked "Cancel" button',
                                  type: 'error',
                                  layout: self.data('layout'),
                                  timeout: 1000
                                });
                                }
                              }
                          ] 
                      });
                      return false;
                    });
                    }
                    </script>
                    <script>
                    $("#selectcostcode").click(function(event) {
                      $("#codeup").click(function(){});
                      $("#gencodebtn").hide();
                      $("#type2").hide();
                      $("#type3").hide();
                      $("#type4").hide();
                      $("#type5").hide();
                      $('#cost-control').hide();
                      $("#tabcost4").hide();
                      $("#cost4").hide();
                      $("#box6").hide();
                      $('#gencode').on('hidden.bs.modal', function () {
                      $("#type1").show();
                      $("#type2").hide();
                      $("#type3").hide();
                      $("#type4").hide();
                      $("#type5").hide();
                      $("#gencodebtn").hide();
                      });
                      $('#cost1').load('<?php echo base_url('index.php/materialcode/get_cost_type'); ?>');
                      $( "#cost1" ).change(function() {
                      var c1 = $('#cost1').val();
                      $('#cost2').load('<?php echo base_url('index.php/materialcode/get_cost_group/'); ?>'+'/'+c1);
                      $("#tabcost2").show();
                      $("#tabcost4").hide();
                      });
                      $( "#cost2" ).change(function() {
                      var c2 = $('#cost2').val();
                      $('#cost3').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/'); ?>'+'/'+c2);
                      $('#cost4').load('<?php echo base_url('index.php/materialcode/get_cost_subgroupname/'); ?>'+'/'+c2);
                      });
                      $( "#cost3").change(function() {
                      $("#tabcost2").hide();
                      $("#tabcost4").show();
                      $("#cost4").show();
                      });
                      $( "#cost4" ).change(function() {
                      $("#cost-control").show();
                      });
                      $("#btncostup").click(function(){
                      var c1 = $('#cost1').val();
                      var c2 = $('#cost2').val();
                      var c3 = $('#cost3').val();
                      var c4 = $('#cost4').val();
                      var gcostcode = c4 ;
                      var codecostcode = c1+''+c2+''+c3;
                      $('#codecostcode').val(codecostcode);
                      $('#costname').val(gcostcode);
                      $('#gcostcode').html(gcostcode);
                      $('#costcode').modal('hide');
                      $("#tabcost4").hide();
                      });
                    });
                    $("#spr").click(function(e){
                  
                      swal({
                        title: "Saving..",
                        text: "Please Wait..",
                        // confirmButtonColor: "#EA1923",
                        // type: "error"
                        showConfirmButton: false,
                        allowOutsideClick: false,
                      });
                      
                      $("#fpr").submit();
                  
                    });

                    $('#purchase').attr('class', 'active'); 
                    $('#new_pr').attr('style', 'background-color:#dedbd8');
                   </script>

                  <script>
                  function addrow2() {
                  if(<?php echo $chkconbqq; ?>==1){
                    swal({
                    title: "This Materail is not from BOQ",
                    text: "",
                    confirmButtonColor: "#EA1923",
                    type: "success"
                    });
                  }

                  var chkbooking = parseFloat($('#chkbooking').val());
                  $('#chkbooking').val(chkbooking+1);

                  $('#delse').closest('tr').remove();
                  $("#book").remove();
                  var row = ($('#booking tr').length-0)+1;
                  var qty = $('#qty').val();

                  var matname = $("#newmatname").val();
                  var matcode = $("#newmatcode").val();
                  var unit = $("#unit").val();
                  var datesend = $("#datesend").val();
                  var remark = $("#remarkitem").val();
                  var costcode = $("#codecostcode").val();
                  var costname = $("#costname").val();
                  var hiddencost = $("#hiddencost").val();
                  var accode = $("#accode").val();
                  var acname = $("#acname").val();
                  var statusass = $("#statusass").val();
                  var cpqtyic = $('#cpqtyic').val();      
                  var pqtyic = $("#pqtyic").val();
                  var punitic = $("#punitic").val();
                  var pprice_unit = $("#pprice_unit").val();
                  var pamount = $("#pamount").val();
                  var pdiscper1 = $("#pdiscper1").val();
                  var pdiscper2 = $("#pdiscper2").val();
                  var pdiscper3 = $("#pdiscper3").val();
                  var pdiscper4 = $("#pdiscper4").val();
                  var pdiscex = $("#pdiscex").val();
                  var pdisamt = $("#pdisamt").val();
                  var vatper = $("#vatper").val();
                  var to_vat = $("#to_vat").val();
                  var pnetamt = $("#pnetamt").val();
                  var type = $("#type").val();
                  var st_center = $("#st_center").val();
                  var st_qty = $("#st_qty").val();
                  var book = $("#book").val();

                  var sumpr = parseFloat($("#sumpr").val().replace(/,/g,"")*1);
                  var pamountt = parseFloat($("#pamount").val().replace(/,/g,"")*1);
                  var remat  = $("#remark_mat").val();
                  $('#sumpr').val(sumpr+pamountt);
                  var ckkcontrolbg = '<?php echo $controlbg; ?>';
                    if(ckkcontrolbg=="2"){
                    var chk = 'hidden';
                    var chk1 = '';
                    }else{
                    var chk = '';
                    var chk1 = 'hidden';
                    }
                  var tr = 
                    '<tr id="'+row+'">'+
                     '<td class="hidden-center">'+
                        '<ul class="icons-list">'+
                          '<li><a href="#" data-popup="tooltip" data-toggle="modal" data-target="#edit_modal'+row+'" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>'+
                          '<li><a id="delete" class="noty-runner" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></li>'+
                        '</ul>'+
                      '</td>'+
                      '<td id="trq'+row+'">'+row+'<input type="hidden" id="chkbo'+row+'" name="chkbo[]" value="BK" /><input type="hidden"  name="bookpr[]" value="'+book+'" /><input type="hidden" id="chkbowhere" name="chkbowhere[]" value="'+hiddencost+'" /><input type="hidden" id="pri_boqrow" name="pri_boqrow[]" value="0" /></td>'+
                      '<td id="control'+row+'" class="text-center"><input type="checkbox" disabled="disabled"></td>'+
                      '<td id="trmatcode'+row+'">'+matcode+'<input type="hidden" id="trmatcode'+row+'" name="matcodeii[]" value="'+matcode+'" /></td>'+
                      '<td id="trmatname'+row+'">'+matname+'<input type="hidden" id="trmatname'+row+'" name="matnameii[]" value="'+matname+'" /></td>'+
                      '<td id="tdcostcode'+row+'">'+costcode+'<input type="hidden" id="trcostcode'+row+'" name="costcodeii[]" value="'+costcode+'" /></td>'+
                      '<td id="tdcostname'+row+'">'+costname+'<input type="hidden" id="trcostname'+row+'" name="costnameii[]" value="'+costname+'" /></td>'+
                      '<td id="trqty'+row+'">'+st_qty+'<input type="hidden" name="qtyii[]" value="'+st_qty+'" /></td>'+
                      '<td id="trunit'+row+'">'+unit+'<input type="hidden" name="unitii[]" value="'+unit+'" /></td>'+
                      '<td id="stock'+row+'">'+st_center+'<input type="hidden" name="stocki[]" value="'+st_center+'" /><input type="hidden" name="accode[]" value="'+accode+'" /><input type="hidden" name="acname[]" value="'+acname+'" /><input type="hidden" name="statusass[]" value="'+statusass+'" /><input type="hidden" name="cpqtyic[]" value="'+cpqtyic+'" /><input type="hidden" name="pqtyic[]" value="'+pqtyic+'" /><input type="hidden" name="punitic[]" value="'+punitic+'" /><input type="hidden" name="pprice_unit[]" value="'+pprice_unit+'" /><input type="hidden" name="pamount[]" value="'+pamount+'" /><input type="hidden" name="pdiscper1[]" value="'+pdiscper1+'" /><input type="hidden" name="pdiscper2[]" value="'+pdiscper2+'" /><input type="hidden" name="pdiscper3[]" value="'+pdiscper3+'" /><input type="hidden" name="pdiscper4[]" value="'+pdiscper4+'" /><input type="hidden" name="pdiscex[]" value="'+pdiscex+'" /><input type="hidden" name="pdisamt[]" value="'+pdisamt+'" /><input type="hidden" name="vatper[]" value="'+vatper+'" /><input type="hidden" name="to_vat[]" value="'+to_vat+'" /><input type="hidden" name="pnetamt[]" value="'+pnetamt+'" /><input type="hidden" id="trremark'+row+'" name="remarki[]" value="'+remark+'" /><input type="hidden" name="type[]" value="'+type+'" /><input type="hidden" name="remark_mat[]" value="'+remat+'" /></td>'+
                    '</tr>';
                  $('#booking').append(tr);
                  var modal = '<div id="edit_modal'+row+'" class="modal fade">'+
                    '<div class="modal-dialog modal-lg">'+
                      '<div class="modal-content ">'+
                        '<div class="modal-header bg-info">'+
                          '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                          '<h5 class="modal-title">เพิ่มรายการ'+row+''+matname+'</h5>'+
                        '</div>'+
                        '<div class="modal-body">'+
                          '<div class="row">'+
                            '<div class="col-xs-6">'+
                              '<label for="">รายการซื้อ</label>'+
                              '<div class="input-group">'+
                                <?php $q = $this->db->query("select valuess from master_checking where keyss='pr_material_check'")->result();
                                foreach ($q as $k) {
                                  $cck = $k->valuess;
                                }
                                if ($cck == "Y") {
                                ?>
                                '<span class="input-group-addon">'+
                                  '<input type="checkbox" id="chke'+row+'" aria-label="กำหนดเอง">'+
                                '</span>'+
                                <?php }?>
                                '<input type="text" id="newmatname'+row+'" disabled="true" placeholder="เลือกรายการซื้อ" class="form-control" value="'+matname+'">'+
                                '<input type="text" id="newmatcode'+row+'" readonly="true" placeholder="เลือกรายการซื้อ" class="form-control" value="'+matcode+'">'+
                                '<span class="input-group-btn">'+
                                '<a class="loadmat'+row+' btn btn-info btn-block" data-toggle="modal"  data-target="#mat'+row+'"><i class="icon-search4"></i></a>'+
                                '<a class="pooi'+row+' btn btn-info" data-toggle="modal" data-target="#opnewmattti'+row+'"><i class="icon-search4"></i></a>'+
                                
                              '</span>'+
                                '</div>'+
                              '</div>'+
                              '<div class="col-xs-6">'+
                                '<label for="">รายการต้นทุน</label>'+
                                '<div class="input-group">'+
                                  '<input type="text" id="costname'+row+'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control" value="'+costname+'">'+
                                  '<input type="text" id="codecostcode'+row+'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control" value="'+costcode+'">'+
                                  '<input type="hidden" id="type'+row+'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control " value="'+type+'">'+
                                  '<span class="input-group-btn" >'+
                                     '<button class="costmat'+row+' btn btn-info btn-sm '+chk+'" data-toggle="modal" data-target="#costcode'+row+'"><span class="glyphicon glyphicon-search"></span></button>'+
                                    '<a class="btn btn-info btn-sm '+chk1+' " id="boqitem'+row+'" data-toggle="modal" data-target="#boq'+row+'"><span class="glyphicon glyphicon-search"></span></a>'+
                                  '</span>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                            '<div class="row">'+
                              '<div class="col-xs-6">'+
                                '<div class="form-group">'+
                                  '<label for="qty">รายละเอียดเพิ่มเติม</label>'+
                                  '<input type="text" id="remark_mat'+row+'" placeholder="กรอกปริมาณ" class="form-control"  value="'+remat+'">'+
                                '</div>'+
                              '</div>'+
                              '<div class="row">'+
                              '<div class="col-xs-12">'+
                                '<div class="form-group">'+
                                  '<hr>'+
                                '</div>'+
                              '</div>'+
                              '<div class="col-xs-3">'+
                                '<div class="form-group">'+
                                  '<label for="qty">ปริมาณ</label>'+
                                  '<input type="number" id="qtyf'+row+'" placeholder="กรอกปริมาณ" class="form-control"  value="'+qty+'">'+
                                '</div>'+
                              '</div>'+
                              '<div class="col-xs-3">'+
                                '<div class="input-group">'+
                                  '<label for="unit">หน่วย</label>'+
                                  '<input type="text" id="unit'+row+'" readonly="true" placeholder="กรอกหน่วย" class="form-control" value="'+unit+'">'+
                                  '<span class="input-group-btn" >'+
                                    '<button class="openunmo btn btn-info btn-sm" data-toggle="modal" data-target="#openunit'+row+'" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span>  </button>'+
                                  '</span>'+
                                '</div>'+
                              '</div>'+
                            
                              '<div class="col-md-2">'+
                                '<div class="form-group">'+
                                  '<label for="qty">แปลงค่า IC</label>'+
                                  '<input type="text" id="cpqtyic'+row+'" name="cqtyic"  placeholder="กรอกปริมาณ IC" class="form-control" value="'+cpqtyic+'">'+
                                '</div>'+
                              '</div>'+
                              '<div class="col-md-2">'+
                                '<div class="form-group">'+
                                  '<label for="qty">ปริมาณ IC</label>'+
                                  '<input type="text" id="pqtyic'+row+'" name="pqtyic"  placeholder="กรอกปริมาณ IC" class="form-control" value="'+pqtyic+'">'+
                                '</div>'+
                              '</div>'+
                              '<div class="col-xs-2">'+
                                '<div class="input-group">'+
                                  '<label for="unit">หน่วย IC</label>'+
                                  '<input type="text" id="punitic'+row+'" name="punitic" readonly="true" placeholder="กรอกหน่วย" class="form-control" value="'+punitic+'">'+
                                  '<span class="input-group-btn" >'+
                                    ' <a class="unitic'+row+' btn btn-primary btn-sm" data-toggle="modal" data-target="#openunitic'+row+'" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span>  </a>'+
                                  '</span>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                            '<div class="row">'+
                              '<div class="col-md-6">'+
                                '<div class="form-group">'+
                                  ' <label for="price_unit">ราคา/หน่วย</label>'+
                                  '<input type="text" id="pprice_unit'+row+'"  name="price_unit" placeholder="กรอกราคา/หน่วย" class="form-control border-danger border-lg" value="'+pprice_unit+'">'+
                                '</div>'+
                              '</div>'+
                              ' <div class="col-md-6">'+
                                '<div class="form-group">'+
                                  '<label for="amount">จำนวนเงิน</label>'+
                                  '<input type="text" id="pamount'+row+'" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="form-control number" value="'+pamount+'">'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                            '<div class="row">'+
                              '<div class="col-md-3">'+
                                '<div class="form-group">'+
                                  '<label for="endtproject">ส่วนลด 1 (%)</label>'+
                                  '<input type="text" id="pdiscper1'+row+'" name="discountper1" placeholder="กรอกส่วนลด" class="form-control" value="'+pdiscper1+'"/>'+
                                '</div>'+
                              '</div>'+
                              '<div class="col-md-3">'+
                                '<div class="form-group">'+
                                  ' <label for="endtproject">ส่วนลด 2 (%)</label>'+
                                  ' <input type="text "id="pdiscper2'+row+'" name="discountper2" placeholder="กรอกส่วนลด" class="form-control" value="'+pdiscper2+'" />'+
                                '</div>'+
                              '</div>'+
                              '<div class="col-md-3">'+
                                '<div class="form-group">'+
                                  '<label for="endtproject">ส่วนลด 3 (%)</label>'+
                                  ' <input type="text" id="pdiscper3'+row+'" name="discountper3" placeholder="กรอกส่วนลด" class="form-control" value="'+pdiscper3+'"/>'+
                                '</div>'+
                              ' </div>'+
                              '<div class="col-md-3">'+
                                '<div class="form-group">'+
                                  '<label for="endtproject">ส่วนลด 4 (%)</label>'+
                                  ' <input type="text" id="pdiscper4'+row+'" name="discountper4" placeholder="กรอกส่วนลด" class="form-control" value="'+pdiscper4+'" />'+
                                ' </div>'+
                              '</div>'+
                            '</div>'+
                            ' <div class="row">'+
                              ' <div class="col-md-6">'+
                                ' <div class="form-group">'+
                                  '<label for="endtproject">ส่วนลดพิเศษ</label>'+
                                  '<input type="text" id="pdiscex'+row+'" name="discountper2" class="form-control" value="'+pdiscex+'"/>'+
                                '</div>'+
                              '</div>'+
                              ' <div class="col-md-4">'+
                                '<div class="form-group">'+
                                  '<label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>'+
                                  '<input type="text" id="pdisamt'+row+'" name="disamt" class="form-control" value="'+pdisamt+'" readonly="0" />'+
                                  '<input type="hidden" id="pvat'+row+'" value="0">'+
                                '</div>'+
                              ' </div>'+
                              '<div class="col-md-2">'+
                                '<div class="form-group">'+
                                  
                                '</div>'+
                              '</div>'+
                            '</div>'+
                            '<div class="row">'+
                              '<div class="col-md-2">'+
                                '<label>VAT:</label>'+
                                '<div class="input-group">'+
                                  '<input type="text" class="form-control text-center" id="vatper'+row+'" name="vatper[]" placeholder="7%" value="'+vatper+'" readonly="">'+
                                  '<span class="input-group-addon">%</span>'+
                                ' </div>'+
                              ' </div>'+
                              '<div class="col-md-2">'+
                                '<div class="form-group">'+
                                  ' <label for="endtproject">vat</label>'+
                                  '<input type="text" id="to_vat'+row+'" name="to_vat" class="form-control" value="'+to_vat+'"/>'+
                                '</div>'+
                              '</div>'+
                              ' <div class="col-md-2">'+
                                '<div class="form-group">'+
                                  '<label for="endtproject">จำนวนเงินสุทธิ</label>'+
                                  '<input type="text" id="pnetamt'+row+'" name="netamt" class="form-control" value="'+pnetamt+'" readonly=""/>'+
                                '</div>'+
                              '</div>'+
                              '<div class="row">'+
                                '<div class="col-xs-6">'+
                                  '<div class="input-group">'+
                                    '<label for="datesend ">วันที่ส่งของ</label>'+
                                    '<input type="date" id="datesend'+row+'" class="form-control daterange-single" id="datesend" name="datesend" value="'+datesend+'">'+
                                  '</div>'+
                                '</div>'+
                              '</div>'+
                              '<div class="row">'+
                                '<div class="col-xs-6">'+
                                  '<label for="">Ref. Asset Code</label>'+
                                  '<div class="input-group">'+
                                    '<input type="text" id="accode'+row+'" name="accode"  readonly="true"  class="form-control">'+
                                    '<input type="text" id="acname'+row+'" name="acname" readonly="true"  class="form-control">'+
                                    '<input type="hidden" id="statusass'+row+'" name="statusass" readonly="true"  class="form-control">'+
                                    '<span class="input-group-btn" >'+
                                      '<button class="btn btn-info btn-sm" id="refasset" data-toggle="modal" data-target="#refass'+row+'"><span class="glyphicon glyphicon-search"></span>  </button>'+
                                    '</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-xs-6">'+
                                  '<div class="form-group">'+
                                    '<label for="endtproject">หมายเหตุ</label>'+
                                    '<input type="text" id="remarkitem'+row+'" class="form-control" value="'+remark+'"/>'+
                                  '</div>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                            '<div class="modal-footer">'+
                              '<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>'+
                              '<button type="button" id="edittorow'+row+'" data-dismiss="modal" class="btn btn-info">Edit Row</button>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>';
                      $('#editrow').append(modal);

                  var rowmat = '<div id="mat'+row+'" class="modal fade">'+
                    '<div class="modal-dialog modal-full">'+
                      '<div class="modal-content ">'+
                        '<div class="modal-header bg-info">'+
                          '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                            '<h5 class="modal-title">เพิ่มรายการ</h5>'+
                        '</div>'+
                        '<div class="modal-body">'+
                            '<div class="row" id="mat_chart'+row+'">'+
                            '</div>'+
                        '</div>'+
                        '</div>'+
                      '</div>'+
                    '</div>';
                     $('.rowmat').append(rowmat);
                    $(".loadmat"+row+"").click(function(){
                    $('#mat_chart'+row+'').load("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                    $("#mat_chart"+row+"").load('<?php echo base_url(); ?>index.php/bd/material_alonee/'+row);
                    });
                    

                   var rowmat = '<div id="opnewmattti'+row+'" class="modal fade">'+
                    '<div class="modal-dialog modal-full">'+
                      '<div class="modal-content ">'+
                        '<div class="modal-header bg-info">'+
                          '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                          '<h5 class="modal-title">เพิ่มรายการ</h5>'+
                        '</div>'+
                      '<div class="modal-body">'+
                        '<div class="row" id="modal_matti'+row+'">'+
                        '</div>'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                  '</div>';
                    $('.rowmat').append(rowmat);
                  $(".pooi"+row+"").click(function(){
                    $('#modal_matti'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                    $('#modal_matti'+row+'').load('<?php echo base_url(); ?>index.php/share/getmatcode/'+row);
                    });



                      var rowmat = ' <div id="opnewmat'+row+'" class="modal fade">'+
                        '<div class="modal-dialog modal-full">'+
                          '<div class="modal-content ">'+
                            '<div class="modal-header bg-info">'+
                              '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                              '<h5 class="modal-title">เพิ่มรายการ</h5>'+
                            '</div>'+
                            '<div class="modal-body">'+
                              '<div class="row" id="modal_newmat'+row+'">'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>';
                      $('.rowmat').append(rowmat);
                      var rowmat = ' <div id="costcode'+row+'" class="modal fade">'+
                        '<div class="modal-dialog modal-full">'+
                          '<div class="modal-content ">'+
                            '<div class="modal-header bg-info">'+
                              '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                              '<h5 class="modal-title">เพิ่มรายการ</h5>'+
                            '</div>'+
                            '<div class="modal-body">'+
                              '<div class="row" id="modal_cost'+row+'">'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>';
                      $('.rowmat').append(rowmat);
                      var rowmat = '<div class="modal fade" id="refass'+row+'"  data-backdrop="false">'+
                        '<div class="modal-dialog modal-lg">'+
                          '<div class="modal-content">'+
                            '<div class="modal-header bg-info">'+
                              ' <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                              '<h4 class="modal-title" id="myModalLabel">Ref. Asset Code</h4>'+
                            ' </div>'+
                            '<div class="modal-body">'+
                              '<div class="row" id="refasscode'+row+'">'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>';
                      $('.rowmat').append(rowmat);
                      var rowmat = '<div class="modal fade" id="openunitic'+row+'" data-backdrop="false">'+
                        '<div class="modal-dialog">'+
                          '<div class="modal-content">'+
                            '<div class="modal-header bg-info">'+
                              '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                              '<h4 class="modal-title" id="myModalLabel">หน่วย</h4>'+
                            '</div>'+
                            '<div class="modal-body">'+
                              '<div id="modal_unitic'+row+'"></div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                      $(".unitic"+row+"").click(function(){
                      $('#modal_unitic'+row+'').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
                      $("#modal_unitic"+row+"").load('<?php echo base_url(); ?>index.php/share/unitid2/'+row+'');
                      });
                  var cost =  
                    '<div class="modal fade" id="boq'+row+'" data-backdrop="false">'+
                      '<div class="modal-dialog modal-lg">'+
                        '<div class="modal-content">'+
                          '<div class="modal-header bg-info">'+
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                            '<h4 class="modal-title" id="myModalLabel">Cost Code</h4>'+
                          ' </div>'+
                          '<div class="modal-body">'+
                            '<div id="modal_boq'+row+'"></div>'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                    '</div>';
                  $('.cost').append(cost);
                  $('#boqitem'+row+'').click(function(){
                    var system = $('#system').val();
                    $('#modal_boq'+row+'').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
                    $("#modal_boq"+row+"").load('<?php echo base_url(); ?>pr/model_costcodeboq_row/<?php echo $bd_tenid; ?>/'+system+'/'+row);
                  });
                  $('#qtyf'+row+',#pprice_unit'+row).keyup(function(){
                    var xqty = ($('#qtyf'+row+'').val().replace(/,/g,"")*1);
                    var xprice = ($('#pprice_unit'+row+'').val().replace(/,/g,"")*1);
                    var xamount = xqty*xprice;
                    var xdiscper1 = ($('#pdiscper1'+row+'').val().replace(/,/g,"")*1);
                    var xdiscper2 = ($('#pdiscper2'+row+'').val().replace(/,/g,"")*1);
                    var xdiscper3 = ($('#pdiscex'+row+'').val().replace(/,/g,"")*1);
                    var xvatt = ($('#vatper'+row+'').val().replace(/,/g,"")*1);
                    var xpd1 = xamount - (xamount*xdiscper1)/100;
                    var xpd2 = xpd1 - (xpd1*xdiscper2)/100;
                    var xpd3 = xpd2 - (xpd1*xdiscper3)/100;
                    var xpd4 = (xamount *xvatt)/100;
                    var xvat = ($('#pvat'+row+'').val().replace(/,/g,"")*1);
                    $('#pamount'+row+'').val(numberWithCommas(xamount));
                    $('#to_vat'+row+'').val(numberWithCommas(xpd4));
                    $('#po_vat'+row+'').val(numberWithCommas(xpd4));
                    if(xdiscper3 != 0){
                    vxpd3 = xpd2-xdiscper3;
                    $('#pdisamt'+row+'').val(numberWithCommas(vxpd3));
                    $('#pnetamt'+row+'').val(numberWithCommas(vxpd3));
                    }
                    else if(xdiscper2 != 0){
                    $('#pdisamt'+row+'').val(numberWithCommas(xpd2));
                    vxpd2 = xpd2 - (xpd2*xvat)/100;
                    $('#pnetamt').val(numberWithCommas(vxpd2));
                    }
                    else
                    {
                    $('#pdisamt'+row+'').val(numberWithCommas(xpd1));
                    vxpd1 = xpd1 - (xpd1*xvat)/100;
                    $('#pnetamt'+row+'').val(numberWithCommas(vxpd1));
                    }
                  });
                    // $("#qtyf"+row+"").keyup(function() {
                    //   var xqty = parseFloat($("#qtyf"+row+"").val());
                    //   var cpqtyic = parseFloat($("#cpqtyic"+row+"").val());
                    //   var xpq = xqty*cpqtyic;
                    //   alert("#qtyf");
                    //   $("#pqtyic"+row+"").val(xpq);
                    //   });
                    // $("#cpqtyic"+row+"").keyup(function() {
                    //   var xqty = parseFloat($("#qtyf"+row+"").val());
                    //   var cpqtyic = parseFloat($("#cpqtyic"+row+"").val());
                    //   var xpq = xqty*cpqtyic;
                    //   alert("#cpqtyic");
                    //   $("#pqtyic"+row+"").val(xpq);
                    //   });
                    $('.rowmat').append(rowmat);
                    $('#refasset').click(function(){
                    $('#refasscode'+row).html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
                    $("#refasscode"+row).load('<?php echo base_url(); ?>share/modalshare_asset/'+row);
                    });
                    $('.openun'+row).click(function(){
                    $('#modal_newmat'+row).html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
                    $("#modal_newmat"+row).load('<?php echo base_url(); ?>share/material_id/'+row);
                    });
                    $('.costmat'+row).click(function(){
                    $('#modal_cost'+row).html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
                    $("#modal_cost"+row).load('<?php echo base_url(); ?>share/costcode_id/'+row);
                    });
                    $('#chke'+row).click(function(event) {
                    if($('#chke'+row).prop('checked')) {
                    $('#newmatname'+row).prop('disabled', false);
                    } else {
                    $('#newmatname'+row).prop('disabled', true);
                    }
                    });
                    $("#edittorow"+row).click(function(event) {
                      $("#trmatcode"+row).html('<td id="trmatcode'+row+'">'+$("#newmatcode"+row).val()+'<input type="hidden" id="trmatcode'+row+'" name="matcodei[]" value="'+$("#newmatcode"+row).val()+'" /></td>');
                      $("#trmatname"+row).html('<td id="trmatname'+row+'">'+$("#newmatname"+row).val()+'<input type="hidden" id="trmatname'+row+'" name="matnamei[]" value="'+$("#newmatname"+row).val()+'" /></td>');
                      $("#trqty"+row).html('<td id="trqty'+row+'">'+$("#qtyf"+row).val()+'<input type="hidden" id="id="trqty'+row+'"" name="qtyi[]" value="'+$("#qtyf"+row).val()+'" /></td>');
                       $("#trunit"+row).html('<td id="trunit'+row+'">'+$("#unit"+row).val()+'<input type="hidden" name="uniti[]" value="'+$("#unit"+row).val()+'" /></td>');

                      $("#tdcostcode"+row).html('<td id="tdcostcode'+row+'">'+$("#codecostcode"+row).val()+'<input type="hidden" id="trcostcode'+row+'" name="costcodei[]" value="'+$("#codecostcode"+row).val()+'" /></td>');
                      $("#tdcostname"+row).html('<td id="tdcostname'+row+'">'+$("#costname"+row).val()+'<input type="hidden" id="trcostname'+row+'" name="costnamei[]" value="'+$("#costname"+row).val()+'" /></td>');
                      $("#datesends"+row).html('<td id="datesends'+row+'">'+$("#datesend"+row).val()+'<input type="hidden" id="datesend'+row+'" name="datesend[]" value="'+$("#datesend"+row).val()+'" /><input type="hidden" name="accode[]" value="'+$("#accode"+row).val()+'" /><input type="hidden" name="acname[]" value="'+$("#acname"+row).val()+'" /><input type="hidden" name="statusass[]" value="'+$("#statusass"+row).val()+'" /><input type="hidden" name="cpqtyic[]" value="'+$("#cpqtyic"+row).val()+'" /><input type="hidden" name="pqtyic[]" value="'+$("#pqtyic"+row).val()+'" /><input type="hidden" name="punitic[]" value="'+$("#punitic"+row).val()+'" /><input type="hidden" name="pprice_unit[]" value="'+$("#pprice_unit"+row).val()+'" /><input type="hidden" name="pamount[]" value="'+$("#pamount"+row).val()+'" /><input type="hidden" name="pdiscper1[]" value="'+$("#pdiscper1"+row).val()+'" /><input type="hidden" name="pdiscper2[]" value="'+$("#pdiscper2"+row).val()+'" /><input type="hidden" name="pdiscper3[]" value="'+$("#pdiscper3"+row).val()+'" /><input type="hidden" name="pdiscper4[]" value="'+$("#pdiscper4"+row).val()+'" /><input type="hidden" name="pdiscex[]" value="'+$("#pdiscex"+row).val()+'" /><input type="hidden" name="pdisamt[]" value="'+$("#pdisamt"+row).val()+'" /><input type="hidden" name="vatper[]" value="'+$("#vatper"+row).val()+'" /><input type="hidden" name="to_vat[]" value="'+$("#to_vat"+row).val()+'" /><input type="hidden" name="pnetamt[]" value="'+$("#pnetamt"+row).val()+'" /><input type="hidden" name="remarki[]" value="'+$("#remarkitem"+row).val()+'" /><input type="hidden" name="type[]" value="'+$("#type"+row).val()+'" /><input type="hidden" name="remark_mat[]" value="'+$("#remark_mat"+row).val()+'" /></td>');
                      $("#trremark"+row).val($("#remarkitem"+row).val());
                      if ($("#newmatname"+row).val()=="") {
                      $("#trmatcode"+row).text("");
                      $("#newmatcode"+row).val("");
                      }
                    });
                    
                   $(document).on('click', 'a#delete', function () { // <-- changes
                     // Initialize
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
                                  var row = ($('#body tr').length-0);
                                  var rows = ($('#body tr').length-0)+1;
                                  $('#trq'+row).text(rows);
                                    noty({
                                      force: true,
                                      text: 'Deleteted',
                                      type: 'success',
                                      layout: self.data('layout'),
                                      timeout: 1000
                                    });
                                  }
                              },
                              {
                                addClass: 'btn btn-danger btn-xs',
                                text: 'Cancel',
                                onClick: function ($noty) {
                                $noty.close();
                                noty({
                                  force: true,
                                  text: 'You clicked "Cancel" button',
                                  type: 'error',
                                  layout: self.data('layout'),
                                  timeout: 1000
                                });
                                }
                              }
                          ] 
                      });
                      return false;
                    });
                    }
                    </script>
                    <script>
                    // $('#mat_code_base').attr('attribute', 'value');
                    $("#selectcostcode").click(function(event) {
                      $("#codeup").click(function(){});
                      $("#gencodebtn").hide();
                      $("#type2").hide();
                      $("#type3").hide();
                      $("#type4").hide();
                      $("#type5").hide();
                      $('#cost-control').hide();
                      $("#tabcost4").hide();
                      $("#cost4").hide();
                      $("#box6").hide();
                      $('#gencode').on('hidden.bs.modal', function () {
                      $("#type1").show();
                      $("#type2").hide();
                      $("#type3").hide();
                      $("#type4").hide();
                      $("#type5").hide();
                      $("#gencodebtn").hide();
                      });
                      $('#cost1').load('<?php echo base_url('index.php/materialcode/get_cost_type'); ?>');
                      $( "#cost1" ).change(function() {
                      var c1 = $('#cost1').val();
                      $('#cost2').load('<?php echo base_url('index.php/materialcode/get_cost_group/'); ?>'+'/'+c1);
                      $("#tabcost2").show();
                      $("#tabcost4").hide();
                      });
                      $( "#cost2" ).change(function() {
                      var c2 = $('#cost2').val();
                      $('#cost3').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/'); ?>'+'/'+c2);
                      $('#cost4').load('<?php echo base_url('index.php/materialcode/get_cost_subgroupname/'); ?>'+'/'+c2);
                      });
                      $( "#cost3").change(function() {
                      $("#tabcost2").hide();
                      $("#tabcost4").show();
                      $("#cost4").show();
                      });
                      $( "#cost4" ).change(function() {
                      $("#cost-control").show();
                      });
                      $("#btncostup").click(function(){
                      var c1 = $('#cost1').val();
                      var c2 = $('#cost2').val();
                      var c3 = $('#cost3').val();
                      var c4 = $('#cost4').val();
                      var gcostcode = c4 ;
                      var codecostcode = c1+''+c2+''+c3;
                      $('#codecostcode').val(codecostcode);
                      $('#costname').val(gcostcode);
                      $('#gcostcode').html(gcostcode);
                      $('#costcode').modal('hide');
                      $("#tabcost4").hide();
                      });
                    });
                    // $("#spr").click(function(e){
                    // // if ($("#c").val()=="") {
                    // //   swal({
                    // //       title: "Please Fill Remark!!.",
                    // //       text: "",
                    // //       confirmButtonColor: "#EA1923",
                    // //       type: "error"
                    // //   });
                    // // }else if ($("#place").val()=="") {
                    // //   swal({
                    // //     title: "Please Fill Place/Address !!.",
                    // //     text: "",
                    // //     confirmButtonColor: "#EA1923",
                    // //     type: "error"
                    // //   });
                    // // }else{
                    //   swal({
                    //     title: "Connecting Line API",
                    //     text: "Please Wait..",
                    //     // confirmButtonColor: "#EA1923",
                    //     // type: "error"
                    //     showConfirmButton: false,
                    //     allowOutsideClick: false,
                    //   });
                    //   $("#fpr").submit();
                    //   // $("#loading").html('<div class="col-sm-12"><div class="loader" class="text-center"></div> <span>Connecting Line API...</span></div>');
                    // // }
                  
                    // });

                    $('#purchase').attr('class', 'active'); 
                    $('#new_pr').attr('style', 'background-color:#dedbd8');


                  


                    


                   </script>



