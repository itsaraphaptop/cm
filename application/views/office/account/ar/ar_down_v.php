<fieldset>
<div class="col-md-6">
  <legend class="text-semibold"><i class="icon-reading position-left"></i> INVOICE DOWN PAYMENT</legend>

  <div class="form-group">
    <label>Invoice No.:</label>
    <input type="text" class="form-control" readonly="readonly" id="pcno" placeholder="Invoice No.">
  </div>

   <div class="form-group">
    <label>Project:</label>
    <div class="input-group">
    <span class="input-group-btn">
      <button class="btn btn-default btn-icon" type="button"><i class="icon-office"></i></button>
    </span>
    <input type="text" class="form-control" readonly="readonly" placeholder="Project"  name="projectname" id="projectname">
     <input type="hidden" readonly="true"  class="pproject1 form-control input-sm" name="projectid" id="putprojectid">
    <div class="input-group-btn">
      <button type="button" data-toggle="modal" data-target="#openproject" class="btn btn-default btn-icon"><i class="icon-search4"></i></button>
      </ul>
    </div>
  </div>
  </div>


  <div class="form-group">
    <label>Owner/Customer:</label>
    <div class="input-group">
    <span class="input-group-btn">
      <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
    </span>
    <input type="text" class="form-control" readonly="readonly" placeholder="Owner/Customer" name="customer" id="customer">
    <input type="hidden" readonly="true" class="form-control input-sm input-sm" name="customerid" id="customerid">
    <div class="input-group-btn">
      <button type="button" class="btn btn-default btn-icon"><i class="icon-search4"></i></button>
      </ul>
    </div>
  </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <label>VAT:</label>
      <div class="input-group">
        <input type="text" class="form-control" id="vatper" readonly placeholder="7%" value="7">
        <span class="input-group-addon">%</span>
      </div>
    </div>
    <div class="col-md-6">
      <label>Credit Term:</label>
      <div class="input-group">
        <input type="text" class="form-control" id="crterm" placeholder="Credit Term">
        <span class="input-group-addon">Day</span>
      </div>
    </div>
  </div>
</div>
 <div class="col-md-6">
          <legend class="text-semibold"><i class="icon-truck position-left"></i> INVOICE DOWN PAYMENT</legend>

  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label>Invoice Date: </label>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon-calendar22"></i></span>
          <input type="text" class="form-control daterange-single" id="invdate" name="invdate">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Due Date: </label>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon-calendar22"></i></span>
          <input type="text" class="form-control daterange-single" id="duedate" name="duedate">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label>PO/Contract No.:</label>
        <input type="text" class="form-control"  id="po" placeholder="PO/Contract No.">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Contract Amount.:</label>
        <input type="text" class="form-control" id="poamt" placeholder="Contract Amount">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <label>Down:</label>
      <div class="input-group">
        <input type="text" class="form-control" id="down" placeholder="Down">
        <span class="input-group-addon">%</span>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Down Amount.:</label>
        <input type="text" class="form-control" id="downamt" placeholder="Down Amount">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <label>W/T:</label>
      <div class="input-group">
        <input type="text" class="form-control" id="wh" placeholder="W/T">
        <span class="input-group-addon">%</span>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Receipt Amount.:</label>
        <input type="text" class="form-control" id="receiptamt" placeholder="Receipt Amount">
      </div>
    </div>
  </div>
</div>
</fieldset>
<!-- </div> -->



<div class="row">
    <div class="table-responsive">
      <table class="table table-xxs table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>JOB</th>
            <th>Down Amount</th>
            <th>VAT</th>
            <th>Before W/T</th>
            <th>Less W/T</th>
            <th>Net Amount</th>
            <th>Receipt Amount</th>
            <th>Ref. Payment No.</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="body">

        </tbody>
      </table>
    </div>
</div>
<br>
 <div class="text-right">
<a href="<?php echo base_url(); ?>ar/ar_main" class="preload btn btn-default"><i class="icon-plus22"></i> New</a>
 <a data-toggle="modal" id="inst" data-target="#insertrow" class="btn btn-info"><i class="icon-list-numbered"></i> ADD Rows</a>
  <button type="submit" class="preload btn btn-success"><i class="icon-box-add"></i> Save </button>
</div>

<!-- modal เเลือกโครงการ -->
                 <div class="modal fade" id="openproject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                       <div class="panel-heading">
              <h5 class="panel-title">เลือกโครงการ</h5>
                        <div class="modal-body">
                            <div class="row">
                                <table id="openproj" class="table table-hover table-xxs datatable-basic">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>รหัสโครงการ</th>
                          <th>ชื่อโครงการ</th>
                          <th>ที่อยู่โครงการ</th>
                          <th width="5%">จัดการ</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php   $n =1;?>
                          <?php foreach ($getproj as $valj){ ?>
                        <tr>
                         <th scope="row"><?php echo $n;?></th>
                         <td><?php echo $valj->project_code; ?></td>
                          <td><?php echo $valj->project_name; ?></td>
                          <td><?php echo $valj->project_address; ?></td>
                            <td><button class="openproj btn btn-xs btn-block btn-info" data-toggle="modal" data-ownername="<?php echo $valj->project_mnameth; ?>" data-contactor="<?php echo $valj->project_bnameth; ?>" data-mprojid="<?php echo $valj->project_id;?>" data-projname="<?php echo $valj->project_name;?>" data-dismiss="modal">เลือก</button></td>
                        </tr>
                          <?php $n++; } ?>
                      </tbody>
                    </table>
                            </div>
                        </div>
                    </div>
                  </div>
                  </div>
                </div> <!--end modal -->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>
<script>
$('.daterange-single').daterangepicker({
       singleDatePicker: true,
        locale: {
           format: 'YYYY-MM-DD'
       }
   });
</script>

<!--  <script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js//jquery.dataTables.min.js"></script>
<link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
    $(document).ready(function() {
    $('#datasource').DataTable();
    $('#openproj').DataTable();
    $('#opendp').DataTable();
    $('#openvd').DataTable();
    $('#lolono').prop('disabled', true);
} );
</script> -->
