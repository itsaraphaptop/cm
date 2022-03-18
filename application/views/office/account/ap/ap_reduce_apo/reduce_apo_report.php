<script type="text/javascript">
  $('body').attr('class', 'navbar-top pace-done');
</script>
<div class="content-wrapper">
  <div class="content">
    <div class="panel panel-flat">
      <div class="panel-heading">
        <h5 class="panel-title">Reduce Report (APO)</h5>
         <!-- <a type="button" href="<?php echo base_url(); ?>" class="preload btn btn-info pull-right"><i class="icon-plus-circle2"></i>  New</a> -->
      </div>

      <div class="panel-body">
        <label>Fill Status:</label>
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
$(window).load(function(){
  $('#reduce').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#reduce").load('<?php echo base_url(); ?>index.php/ap/ap_reduce_aponot');
});

$(".all").click(function(){
  $('#reduce').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#reduce").load('<?php echo base_url(); ?>index.php/ap/ap_reduce_apoall');
});

$(".open").click(function(){
  $('#reduce').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#reduce").load('<?php echo base_url(); ?>index.php/ap/ap_reduce_apoopen');
});

$(".not").click(function(){
  $('#reduce').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#reduce").load('<?php echo base_url(); ?>index.php/ap/ap_reduce_aponot');
});
</script>
