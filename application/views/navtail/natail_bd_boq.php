<?php
  $tdn = 0;
  $tdn=$this->uri->segment(3);
?>
<style type="text/css" media="screen">
.sidebar-category{
padding-top: 50px;
}
</style>
<div class="sidebar  sidebar-default sidebar-fixed">
  <div class="sidebar-content">
    <!-- Main navigation -->
    <div class="sidebar-category sidebar-category-visible">
      <div class="category-content no-padding">
        <div class="category-title">
          <span><h5><b>Add Detail Bill of Quatity(BOQ)</b></h5></span>
          <ul class="icons-list">
            <li><a href="#" data-action="collapse"></a></li>
          </ul>
        </div>
        <div class="col-xs-12">
          <div class="row">
            <div class="form-group">
              <div class="col-sm-12">
                <label><b>Job</b></label>
                <select name="systeme" id="systemei" class="form-control input-xs text-right" <?php echo ($approve_bg == "1" ) ? 'disabled="disabled"' : ''; ?> >
                  <?php
                  $this->db->select('*');
                  $this->db->from('bdtender_d');
                  $this->db->where('bdd_tenid',$tdn);
                  $tender_d=$this->db->get()->result(); ?>
                  <option ></option>
                  <?php  foreach ($tender_d as $tender_dd) { ?>
                  <?php echo '<option  value="'.$tender_dd->bdd_jobno.'">'.$tender_dd->bdd_jobname.'</option>'; ?>
                  <?php } ?>
                </select>
              </div>
              <?php if ($flagcostcode[0]['costlevel']=="1") {?>
              <div class="col-sm-12">
                <p></p>
                <label><b>Cost Level 1</b> <span class="text-danger">*</span></label>
                <select name="cost1" id="boq_cost1"  class="form-control  input-xs">
                  <option></option>
                </select>
              </div>
              <?php }elseif($flagcostcode[0]['costlevel']=="2") {?>
              <div class="col-sm-12">
                <p></p>
                <label><b>Cost Level 1</b> <span class="text-danger">*</span></label>
                <select name="cost1" id="boq_cost1"  class="form-control  input-xs">
                  <option></option>
                </select>
              </div>
              <div class="col-sm-12">
                <p></p>
                <label><b>Cost Level 2</b> <span class="text-danger">*</span></label>
                <select name="cost2" id="boq_cost2"  class="form-control  input-xs">
                  <option></option>
                </select>
              </div>
              <?php }elseif($flagcostcode[0]['costlevel']=="3") {?>
              <div class="col-sm-12">
                <p></p>
                <label><b>Cost Level 1</b> <span class="text-danger">*</span></label>
                <select name="cost1" id="boq_cost1"  class="form-control  input-xs">
                  <option></option>
                </select>
              </div>
              <div class="col-sm-12">
                <p></p>
                <label><b>Cost Level 2</b> <span class="text-danger">*</span></label>
                <select name="cost2" id="boq_cost2"  class="form-control  input-xs">
                  <option></option>
                </select>
              </div>
              <div class="col-sm-12">
                <p></p>
                <label><b>Cost Level 3</b> <span class="text-danger">*</span></label>
                <select name="cost3" id="boq_cost3"  class="form-control  input-xs">
                  <option></option>
                </select>
              </div>
              <?php }elseif($flagcostcode[0]['costlevel']=="4") {?>
              <div class="col-sm-12">
                <p></p>
                <label><b>Cost Level 1</b> <span class="text-danger">*</span></label>
                <select name="cost1" id="boq_cost1"  class="form-control  input-xs">
                  <option></option>
                </select>
              </div>
              <div class="col-sm-12">
                <p></p>
                <label><b>Cost Level 2</b> <span class="text-danger">*</span></label>
                <select name="cost2" id="boq_cost2"  class="form-control  input-xs">
                  <option></option>
                </select>
              </div>
              <div class="col-sm-12">
                <p></p>
                <label><b>Cost Level 3</b> <span class="text-danger">*</span></label>
                <select name="cost3" id="boq_cost3"  class="form-control  input-xs">
                  <option></option>
                </select>
              </div>
              <div class="col-sm-12">
                <p></p>
                <label><b>Cost Level 4</b> <span class="text-danger">*</span></label>
                <select name="cost4" id="boq_cost4"  class="form-control  input-xs">
                  <option></option>
                </select>
              </div>
              <?php }elseif($flagcostcode[0]['costlevel']=="5") {?>
              <div class="col-sm-12">
                <p></p>
                <label><b>Cost Level 1</b> <span class="text-danger">*</span></label>
                <select name="cost1" id="boq_cost1"  class="form-control  input-xs">
                  <option></option>
                </select>
              </div>
              <div class="col-sm-12">
                <p></p>
                <label><b>Cost Level 2</b> <span class="text-danger">*</span></label>
                <select name="cost2" id="boq_cost2"  class="form-control  input-xs">
                  <option></option>
                </select>
              </div>
              <div class="col-sm-12">
                <p></p>
                <label><b>Cost Level 3</b> <span class="text-danger">*</span></label>
                <select name="cost3" id="boq_cost3"  class="form-control  input-xs">
                  <option></option>
                </select>
              </div>
              <div class="col-sm-12">
                <p></p>
                <label><b>Cost Level 4</b> <span class="text-danger">*</span></label>
                <select name="cost4" id="boq_cost4"  class="form-control  input-xs">
                  <option></option>
                </select>
              </div>
              <div class="col-sm-12">
                <p></p>
                <label><b>Cost Level 5</b> <span class="text-danger">*</span></label>
                <select name="cost5" id="boq_cost5"  class="form-control  input-xs">
                  <option></option>
                </select>
              </div>
              <?php } ?>
              <div class="col-sm-12">
                <p></p>
                <label><b>Cost Code</b></label>
                <input type="text" class="form-control input-sm" readonly="" name="costcodetext" id="costcodetext">
              </div>
              <div class="col-sm-12" id="">
                <p></p>
                <label><b>Cost Name</b></label>
                <div id="costcodename"></div>
              </div>
              <div class="col-sm-12 text-right">
                <p></p>
                <a id="reset_add_body" class="btn btn-default btn-xs">Reset</a>
                <a id="load_add_body"   class="btn btn-primary  btn-xs">Filter</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /main navigation -->
  </div>
</div>
<script type="text/javascript">
$('#cc').css('background-color', '#00aeef');
$('#cc').css('color','#FFFFFF');
$('#reset_add_body').click(function(event) {
$('#add_body').empty();
$('#num').val('0');
$('#systemei').val("");
$('.em').empty();
$('#costcodetext').val("");
$('#cnamecost').val("");
$('#boq_cost1s').html('');
$('#boq_cost2s').html('');
$('#boq_cost3s').html('');
$('#boq_cost4s').html('');
$('#boq_cost5s').html('');
$('#boq_cost6s').html('');

});
</script>
<script type="text/javascript">
$('#systemei').change(function(event) {
var systemei = $('#systemei').val();
$("#boq_cost1").load('<?php echo base_url('index.php/materialcode/get_cost_type_boq');?>');
$("#boq_cost1s").load('<?php echo base_url('index.php/materialcode/get_cost_system_boq');?>'+'/'+systemei);
$('#boq_cost1').html('');
$('#boq_cost2').html('');
$('#boq_cost3').html('');
$('#boq_cost4').html('');
$('#boq_cost5').html('');
$('#boq_cost1s').html('');
$('#boq_cost2s').html('');
$('#boq_cost3s').html('');
$('#boq_cost4s').html('');
$('#boq_cost5s').html('');
$('#boq_cost6s').html('');
});


$('#boq_cost1').change(function(event) {
var boq_cost1 = $('#boq_cost1').val();
$("#boq_cost2").load('<?php echo base_url('index.php/materialcode/get_cost_group_boq');?>'+'/'+boq_cost1);
$("#costcodename").load('<?php echo base_url('index.php/materialcode/get_cost_subgroup_cost6_boq_input');?>'+'/'+boq_cost1);
$("#boq_cost2s").load('<?php echo base_url('index.php/materialcode/get_cost_group_boq_show');?>'+'/'+boq_cost1);
$("#costcodetext").val(boq_cost1);
$('#boq_cost2').html('');
$('#boq_cost3').html('');
$('#boq_cost4').html('');
$('#boq_cost5').html('');
$('#boq_cost2s').html('');
$('#boq_cost3s').html('');
$('#boq_cost4s').html('');
$('#boq_cost5s').html('');
$('#boq_cost6s').html('');
});
$('#boq_cost2').change(function(event) {
var boq_cost1 = $('#boq_cost1').val();
var boq_cost2 = $('#boq_cost2').val();
$("#boq_cost3").load('<?php echo base_url('index.php/materialcode/get_cost_subgroup_boq');?>'+'/'+boq_cost1+'/'+boq_cost2);
$("#costcodename").load('<?php echo base_url('index.php/materialcode/get_cost_subgroup_cost6_boq_input');?>'+'/'+boq_cost1+'/'+boq_cost2);
$("#boq_cost3s").load('<?php echo base_url('index.php/materialcode/get_cost_subgroup_boq_show');?>'+'/'+boq_cost1+'/'+boq_cost2);
$("#costcodetext").val(boq_cost1+boq_cost2);
$('#boq_cost3').html('');
$('#boq_cost4').html('');
$('#boq_cost5').html('');
$('#boq_cost3s').html('');
$('#boq_cost4s').html('');
$('#boq_cost5s').html('');
$('#boq_cost6s').html('');
});
$('#boq_cost3').change(function(event) {
var boq_cost1 = $('#boq_cost1').val();
var boq_cost2 = $('#boq_cost2').val();
var boq_cost3 = $('#boq_cost3').val();
$("#boq_cost4").load('<?php echo base_url('index.php/materialcode/get_cost_subgroup_cost4_boq');?>'+'/'+boq_cost1+'/'+boq_cost2+'/'+boq_cost3);
$("#costcodename").load('<?php echo base_url('index.php/materialcode/get_cost_subgroup_cost6_boq_input');?>'+'/'+boq_cost1+'/'+boq_cost2+'/'+boq_cost3);
$("#boq_cost4s").load('<?php echo base_url('index.php/materialcode/get_cost_subgroup_cost4_boq_show');?>'+'/'+boq_cost1+'/'+boq_cost2+'/'+boq_cost3);
$("#costcodetext").val(boq_cost1+boq_cost2+boq_cost3);
$('#boq_cost4').html('');
$('#boq_cost5').html('');
$('#boq_cost4s').html('');
$('#boq_cost5s').html('');
$('#boq_cost6s').html('');
});
$('#boq_cost4').change(function(event) {
var boq_cost1 = $('#boq_cost1').val();
var boq_cost2 = $('#boq_cost2').val();
var boq_cost3 = $('#boq_cost3').val();
var boq_cost4 = $('#boq_cost4').val();
$("#boq_cost5").load('<?php echo base_url('index.php/materialcode/get_cost_subgroup_cost5_boq');?>'+'/'+boq_cost1+'/'+boq_cost2+'/'+boq_cost3+'/'+boq_cost4);
$("#costcodename").load('<?php echo base_url('index.php/materialcode/get_cost_subgroup_cost6_boq_input');?>'+'/'+boq_cost1+'/'+boq_cost2+'/'+boq_cost3+'/'+boq_cost4);
$("#boq_cost5s").load('<?php echo base_url('index.php/materialcode/get_cost_subgroup_cost5_boq_show');?>'+'/'+boq_cost1+'/'+boq_cost2+'/'+boq_cost3+'/'+boq_cost4);
$("#costcodetext").val(boq_cost1+boq_cost2+boq_cost3+boq_cost4);
$('#boq_cost5').html('');
$('#boq_cost5s').html('');
$('#boq_cost6s').html('');
});
$('#boq_cost5').change(function(event) {
var boq_cost1 = $('#boq_cost1').val();
var boq_cost2 = $('#boq_cost2').val();
var boq_cost3 = $('#boq_cost3').val();
var boq_cost4 = $('#boq_cost4').val();
var boq_cost5 = $('#boq_cost5').val();
$("#costcodetext").val(boq_cost1+boq_cost2+boq_cost3+boq_cost4+boq_cost5);
$("#costcodename").load('<?php echo base_url('index.php/materialcode/get_cost_subgroup_cost6_boq_input');?>'+'/'+boq_cost1+'/'+boq_cost2+'/'+boq_cost3+'/'+boq_cost4+'/'+boq_cost5);
$("#boq_cost6s").load('<?php echo base_url('index.php/materialcode/get_cost_subgroup_cost6_boq_show');?>'+'/'+boq_cost1+'/'+boq_cost2+'/'+boq_cost3+'/'+boq_cost4+'/'+boq_cost5);
});

</script>