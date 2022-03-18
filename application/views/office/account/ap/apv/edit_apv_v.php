
<div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header">
          <div class="page-header-content">
            <div class="page-title">
              <h4><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">Dashboard</span> - ภาพรวมระบบ</h4>
            </div>

           <!--  <div class="heading-elements">
              <div class="heading-btn-group">
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                <a href="<?php echo base_url(); ?>index.php/manag/calenda" class="preload btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
              </div>
            </div> -->
          <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

          <div class="breadcrumb-line">
            <ul class="breadcrumb">
              <li><a href="index.html"><i class="icon-home2 position-left"></i> ระบบจัดการในสำนักงาน</a></li>
              <li>ระบบจัดการบัญชีเจ้าหนี้</li>
            </ul>

            <ul class="breadcrumb-elements">
              <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon-gear position-left"></i>
                  Settings
                  <span class="caret"></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                  <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                  <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                </ul>
              </li>
            </ul>
          <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">



          <div class="row">
<?php foreach ($editapv as $v) {
  $apvcode = $v->apv_code;
  $pono = $v->apv_pono;
  $vender = $v->apv_vender;
  $duedate = $v->apv_duedate;
  $dono = $v->apv_do;
  $term = $v->apv_crterm;
  $apvdate = $v->apv_date;
  $projectname = $v->project_name;
  $project_id = $v->project_id;
  $system = $v->apv_system;
  $invno = $v->apv_inv;
  $depname = $v->department_title;
  $depid = $v->apv_department;
} ?>

<div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">Account Payable Archive</h5>
              <div class="heading-elements">
                <ul class="icons-list">
                          <li><a data-action="collapse"></a></li>
                          <li><a data-action="reload"></a></li>
                          <li><a data-action="close"></a></li>
                        </ul>
                      </div>
            </div>

            <div class="panel-body">

           
<fieldset>
    <div class="col-md-12">
      <!--  -->
      <div class="modal fade" id="openporec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">เลือกรายการรับของ</h4>
            </div>
            <div class="modal-body">
              <div id="modal_recpo">
              </div>
            </div>
          </div>
        </div>
      </div>
<!--  -->
      <div class="col-md-12">
        <legend class="text-semibold"><i class="icon-reading position-left"></i> บันทึกตั้งเจ้าหนี้การค้า</legend>
      </div>
    </div>
<form action="<?php echo base_url(); ?>ap_active/editnewap" method="post">

  <!-- <div class="col-md-12"> -->
    <div class="row">
    	<div class="col-md-4">
    	<label for="">ร้านค้า</label>
              <div class="input-group">               
                      <input type="text" class="form-control" readonly="true" placeholder="ร้านค้า" id="vender" name="vender" value="<?php echo $vender; ?>">
                      
                      <div class="input-group-btn">
                      <a class="ven btn btn-default btn-icon" data-toggle="modal" data-target="#openvender"><i class="icon-search4"></i></a>
                      </div>
                      </div>
   
    	</div>
    	<div class="col-md-4">
    		<div class="form-group">
    			<label for="">เลขที่ใบสั่งซื้อ</label>
    			<input type="text" class="form-control" readonly="true" placeholder="เลขที่ใบสั่งซื้อ" id="pono" name="pono" value="<?php echo $pono; ?>">
          <input type="hidden" id="user" value="<?php echo $name; ?>">
    		</div>
    	</div>
    	<div class="col-md-4">
    		<div class="form-group">
    			<label for="">เลขที่ใบตั้งเจ้าหนี้</label>
    			<input type="text" class="form-control" readonly="true" placeholder="เลขที่ใบตั้งเจ้าหนี้" id="apvno" name="apvno" value="<?php echo $apvcode; ?>">
    		</div>
    	</div>
    </div>
  <!-- </div> -->
  <div class="row">
    	<div class="col-md-4">
    		<div class="form-group">
    			<label for="">เลขทีใบส่งของ</label>
				<input type="text" class="form-control" readonly="true" id="taxno" placeholder="เลขทีใบส่งของ" name="taxno" value="<?php echo $invno; ?>">
    		</div>
    	</div>
    	<div class="col-md-3">
    	<label for="">วันที่ส่งมอบ</label>
      <div class="input-group">
      <span class="input-group-addon"><i class="icon-calendar22"></i></span>
    			<input type="text" class="form-control"  placeholder="วันที่ส่งมอบ" id="duedate" name="duedate" value="<?php echo $duedate; ?>">
    		</div>
    	</div>
      <div class="col-md-2">
      <label for="">เงื่อนไขชำระ</label>
        <div class="input-group">
          <input type="text" class="form-control" readonly="true" id="cterm" placeholder="เงื่อนไขชำระ" name="cterm" value="<?php echo $term; ?>">
          <span class="input-group-addon">วัน</span>
        </div>
      </div>
      <div class="col-md-2">
        <label for="">วันที่ใบสำคัญจ่าย</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
          <input type="text" class="form-control daterange-single" id="apvdate" placeholder="วันที่ใบสำคัญจ่าย" name="apvdate" value="<?php echo $apvdate; ?>">
        </div>
      </div>
    </div>
    <div class="row">
    	<div class="col-md-4">
    	<label for="">โครงการ</label>
        <div class="input-group">               
                      <input type="text" class="form-control" readonly="true" placeholder="โครงการ" id="projectname" name="projectname" value="<?php echo $projectname; ?>">
            <input type="hidden" class="form-control" readonly="true" id="projectid" name="projectid" value="<?php echo $project_id; ?>">
                      <div class="input-group-btn">
                     <button type="button" data-toggle="modal" data-target="#openproj"  class="openpro btn btn-default btn-icon"><i class="icon-search4"></i></button>
                      </div>
                      </div>

    	</div>
    	<div class="col-md-4">
    		<div class="form-group">
						<label for="">ระบบ</label>
						<select class="form-control" name="system" id="system">
							<?php if($system == '1'){ ?><option value="1" selected>OVERHEAD</option><?php } else { ?><option value="1">OVERHEAD</option><?php }?>
              <?php if($system == '2'){ ?><option value="2" selected>AC</option><?php } else { ?><option value="2">AC</option><?php }?>
              <?php if($system == '3'){ ?><option value="3" selected>EE</option><?php } else { ?><option value="3">EE</option><?php }?>
              <?php if($system == '4'){ ?><option value="4" selected>SN</option><?php } else { ?><option value="4">SN</option><?php }?>
              <?php if($system == '5'){ ?><option value="5" selected>CIVIL</option><?php } else { ?><option value="5">CIVIL</option><?php }?>
            </select>
				</div>
    	</div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="">เลขที่ใบรับของ</label>
          <input type="text" class="form-control" readonly="true" placeholder="เลขที่ใบรับของ" id="porecx" name="porecx" value="<?php echo $dono; ?>">
        </div>
      </div>
    </div>
    <div class="row" style="margin-top:10px;">
    	<div class="col-md-4">
    	<label for="">แผนก</label>
      <div class="input-group">               
                      <input type="text" class="form-control" readonly="true" placeholder="แผนก" id="departname" name="departname" value="<?php echo $depname; ?>">
          <input type="hidden" class="form-control" readonly="true" id="departid" name="departid" value="<?php echo $depid; ?>">
                      <div class="input-group-btn">
                     <button type="button" data-toggle="modal" data-target="#opendepart" class="opendepart btn btn-default btn-icon"><i class="icon-search4"></i></button>
                      </div>
                      </div>
    		
    	</div>
    </div>
    <br>
    <!-- <div class="row" style="margin-top:10px;">
    	<div class="col-md-4">
    	<label for="">จำนวนวเงิน</label>
    		<div class="input-group">
    			<input type="text" class="form-control" ng-model="netamt" id="amount" placeholder="จำนวนวเงิน">
          <input type="hidden" class="form-control" ng-model="tax" readonly="true" id="tax" value="7" placeholder="ภาษี(%)">
    			<span class="input-group-addon">บาท</span>
    		</div>
    	</div> -->

    <!-- 	<div class="col-md-2">
    	<label for="">ภาษี</label>
    		<div class="input-group"> -->

    		<!-- 	<span class="input-group-addon">%</span>
    		</div>
    	</div> -->
    	<!-- <div class="col-md-3">
    	<label for="">จำนวนรวมภาษี</label>
    		<div class="input-group">
    			<input type="text" class="form-control"  id="totamount" placeholder="จำนวนวเงิน">
    			<span class="input-group-addon">บาท</span>
    		</div>
    	</div> -->
    	<!--<div class="col-md-2">
    	<label for="">วันที่จ่าย</label>
    		<div class="form-group">
    			<input type="text" class="form-control"  placeholder="วันที่ส่งมอบ" id="apdate">
    		</div>
    	</div>-->
    <!-- </div> -->

  <!--  Panel detail -->

  <!--  -->

<div class="tabbable">
              <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active"><a href="#panel-pill1" data-toggle="tab" aria-expanded="true"><i class=" icon-coins position-left"></i> GL</a></li>
                <li class=""><a href="#panel-pill2" data-toggle="tab" aria-expanded="false"><i class=" icon-wrench position-left"></i> Material</a></li>
                <li class=""><a href="#panel-pill3" data-toggle="tab" aria-expanded="false"><i class="  icon-price-tag position-left"></i> TAX</a></li>
              </ul>
</div>
<div class="tab-content">
            <div class="tab-pane has-padding active" id="panel-pill1">
              <div id="vat" class="table-responsive">
               
              </div>
            </div>

            <div class="tab-pane has-padding" id="panel-pill2">
              <div id="meterial" class="table-responsive">
               
              </div>
            </div>

            <div class="tab-pane has-padding" id="panel-pill3">
              <div id="tax" class="table-responsive">
                
              </div>
            </div>

          </div>



        <div class="modal-footer">
          <div class="form-group">
            <a href="<?php echo base_url(); ?>ap/print_apv/<?php echo $apvcode; ?>" class="btn btn-default btn-xs"><i class="icon-printer2 position-left"></i> Print</a>
            <button type="submit" class="btn btn-default btn-xs"><i class="icon-floppy-disk position-left"></i> Edit</button>
            <a href="#" class="btn btn-default btn-xs"><i class="icon-close2 position-left"></i> Close</a>
          </div>
        </div>
</fieldset>
</div>
 </div>
</form>
</div>
</div>
</div>

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

<div class="modal fade" id="openproj" data-backdrop="false">
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

<div class="modal fade" id="opendepart" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Department</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="modal_department">

            </div>
            </div>
        </div>
    </div>
  </div>
</div>

<script>
  $(".ven").click(function(){
      $("#loadvender").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#loadvender").load('<?php echo base_url(); ?>share/vender_f');
    });
  $(".openpro").click(function(){
      $('#modal_project').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_project").load('<?php echo base_url(); ?>index.php/share/project');
    });
$(".opendepart").click(function(){
      $('#modal_department').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_department").load('<?php echo base_url(); ?>index.php/share/department');
    });


</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/internationalization/i18next.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/prism.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/internationalization_switch_direct.js"></script>


<script>

$(".openporec").click(function(){
  $('#modal_recpo').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $('#modal_recpo').load('<?php echo base_url(); ?>ap/openpo');

})

$('.daterange-single').daterangepicker({
       singleDatePicker: true,
        locale: {
           format: 'YYYY-MM-DD'
       }
   });
</script>
<script>
  jQuery(document).ready(function($) {
     $("#meterial").load('<?php echo base_url(); ?>ap/load_meterial/'+$("#pono").val());
     $("#vat").load('<?php echo base_url(); ?>ap/load_crdr_edit/'+$("#apvno").val()+'/'+$("#venderid").val());
     $("#tax").load('<?php echo base_url(); ?>ap/load_vat/'+$("#pono").val());
  });
</script>
