<script type="text/javascript">
  $('body').attr('class', 'navbar-top pace-done');
</script>
<div class="content-wrapper">
  <div class="content">
    <div class="panel panel-flat">
      <div class="panel-heading">
        <h5 class="panel-title">Reduce Report</h5>

        <!-- <a type="button" href="<?php echo base_url(); ?>" class="preload btn btn-info pull-right"><i class="icon-plus-circle2"></i>  New</a> -->
      </div>

      <div class="panel-body">
        <label>Filter Status:</label>
        <button class="all label bg-orange"> Reduce ALL</button>
        <button class="not label label-danger">Reduce not Archive</button>
        <button class="open label bg-green">Reduce Archive</button>
      </div>
      <div class="dataTables_wrapper no-footer"  id="reduce">
        
      </div>
    </div>
  </div>
</div>
<script>
  $('#reduce').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#reduce").load('<?php echo base_url(); ?>index.php/ap/ap_reduce_apvall');
// $(window).load(function(){
//   $('#reduce').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
//   $("#reduce").load('<?php echo base_url(); ?>index.php/ap/ap_reduce_apvnot');
// });

$(".all").click(function(){
  $('#reduce').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#reduce").load('<?php echo base_url(); ?>index.php/ap/ap_reduce_apvall');
});

$(".open").click(function(){
  $('#reduce').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#reduce").load('<?php echo base_url(); ?>index.php/ap/ap_reduce_apvopen');
});

$(".not").click(function(){
  $('#reduce').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#reduce").load('<?php echo base_url(); ?>index.php/ap/ap_reduce_apvnot');
});
</script>
