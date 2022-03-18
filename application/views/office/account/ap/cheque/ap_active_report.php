<script type="text/javascript">
  $('body').attr('class', 'navbar-top pace-done');
</script>
<div class="content-wrapper">
  <div class="content">
    <div class="panel panel-flat">
      <div class="panel-heading">
        <h5 class="panel-title">Confirm Payment Cheque</h5>
        <div class="heading-elements">
          <ul class="icons-list">
            <li><a data-action="collapse"></a></li>
            <li><a data-action="reload"></a></li>
            <li><a data-action="close"></a></li>
          </ul>
        </div>
        <!-- <a type="button" href="<?php echo base_url(); ?>" class="preload btn btn-info pull-right"><i class="icon-plus-circle2"></i>  New</a> -->
      </div>

      <div class="panel-body">
        <label>Filter Status:</label>
        <button class="all label bg-orange"> PV ALL</button>
        <button class="not label label-danger">PV not Archive</button>
        <button class="open label bg-green">PV Archive</button>
      </div>
      <div class="dataTables_wrapper no-footer"  id="account">

      </div>
    </div>
  </div>
</div>
<script>
$(window).load(function(){
  $('#account').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#account").load('<?php echo base_url(); ?>index.php/ap/ap_active_pvnot');
});

$(".all").click(function(){
  $('#account').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#account").load('<?php echo base_url(); ?>index.php/ap/ap_active_pvall');
});

$(".open").click(function(){
  $('#account').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#account").load('<?php echo base_url(); ?>index.php/ap/ap_active_pvopen');
});

$(".not").click(function(){
  $('#account').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#account").load('<?php echo base_url(); ?>index.php/ap/ap_active_pvnot');
});
</script>