<script type="text/javascript">
  $('body').attr('class', 'navbar-top pace-done');
</script>
<div class="content-wrapper">
  <div class="content">
    <div class="panel panel-flat">
      <div class="panel-heading">
        <h5 class="panel-title">(All AC)</h5>
        <div class="heading-elements">
          <ul class="icons-list">
            <li><a data-action="collapse"></a></li>
            <li><a data-action="reload"></a></li>
            <li><a data-action="close"></a></li>
          </ul>
        </div>
      </div>

      <div class="panel-body">
        <label>Filter Status:</label>
        <button class="all label bg-orange"> AC ALL</button>
        <button class="not label label-danger">AC not Archive</button>
        <button class="open label bg-green">AC Archive</button>
      </div>
      <div class="dataTables_wrapper no-footer"  id="account">

      </div>
    </div>
  </div>
</div>
<script>
$(window).load(function(){
  $('#account').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#account").load('<?php echo base_url(); ?>index.php/ap/ap_active_chqnot');
});

$(".all").click(function(){
  $('#account').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#account").load('<?php echo base_url(); ?>index.php/ap/ap_active_chqall');
});

$(".open").click(function(){
  $('#account').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#account").load('<?php echo base_url(); ?>index.php/ap/ap_active_chqopen');
});

$(".not").click(function(){
  $('#account').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#account").load('<?php echo base_url(); ?>index.php/ap/ap_active_chqnot');
});
</script>