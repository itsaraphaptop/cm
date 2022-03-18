<div class="content-wrapper">
  <div class="content">
    <div class="panel panel-flat">
      <div class="panel-heading">
        <h5 class="panel-title">Account Payable Archive (Petty cash)</h5>
        <!-- <div class="heading-elements">
          <ul class="icons-list">
            <li><a data-action="collapse"></a></li>
            <li><a data-action="reload"></a></li>
            <li><a data-action="close"></a></li>
          </ul>
        </div> -->
        <!-- <a type="button" href="<?php echo base_url(); ?>" class="preload btn btn-info pull-right"><i class="icon-plus-circle2"></i>  New</a> -->
      </div>

      <div class="panel-body">
        <label>Filter Status:</label>
        <button class="all label bg-orange"> Account ALL</button>
        <button class="not label label-danger">Account not Archive</button>
        <button class="open label bg-green">Account Archive</button>
      </div>
      <div class="dataTables_wrapper no-footer" id="account">
        <div class="table-responsive">
          <table class="table table-hover table-xxs datatable-basic">
            <thead>
              <tr>
                <th width="5%">No.</th>
                <th width="15%">APO No.</th>
                <th width="15%">APO Date</th>
                <th width="30%">Vender Name</th>
                <th width="30%">Project/Department Name</th>
                <th width="10%">Action</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
$(window).load(function(){
  $('#account').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#account").load('<?php echo base_url(); ?>index.php/ap/ap_active_aponot');
});

$(".all").click(function(){
  $('#account').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#account").load('<?php echo base_url(); ?>index.php/ap/ap_active_apoall');
});

$(".open").click(function(){
  $('#account').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#account").load('<?php echo base_url(); ?>index.php/ap/ap_active_apoopen');
});

$(".not").click(function(){
  $('#account').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#account").load('<?php echo base_url(); ?>index.php/ap/ap_active_aponot');
});
</script>
