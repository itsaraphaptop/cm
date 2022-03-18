<script type="text/javascript">
  $('body').attr('class', 'navbar-top pace-done');
</script>
<div class="content-wrapper">
  <div class="content">
    <div class="panel panel-flat">
      <div class="panel-heading">
        <h5 class="panel-title">CN Invoice</h5>
        <!-- <a type="button" href="<?php echo base_url(); ?>" class="preload btn btn-info pull-right"><i class="icon-plus-circle2"></i>  New</a> -->
      </div>

      <div class="panel-body">
        <label>Filter Status:</label>
        <button class="all label bg-orange"> CN ALL</button>
        <button class="not label label-danger">CN not Archive</button>
        <button class="open label bg-green">CN Archive</button>
      </div>
      <div class="dataTables_wrapper no-footer"  id="account">

      </div>
    </div>
  </div>
</div>
<script>
$(window).load(function(){
  $('#account').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#account").load('<?php echo base_url(); ?>index.php/ar/ar_active_cnnot');
});

$(".all").click(function(){
  $('#account').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#account").load('<?php echo base_url(); ?>index.php/ar/ar_active_cnall');
});

$(".open").click(function(){
  $('#account').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
 $("#account").load('<?php echo base_url(); ?>index.php/ar/ar_active_cnopen');
});

$(".not").click(function(){
  $('#account').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
 $("#account").load('<?php echo base_url(); ?>index.php/ar/ar_active_cnnot');
});
</script>