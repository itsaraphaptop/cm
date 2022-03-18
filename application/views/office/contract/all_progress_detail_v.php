
<div class="content">
  <div class="panel panel-flat border-top-lg border-top-success" >
      <div class="panel-heading">
        <h5 class="panel-title">รายการใบสั่งจ้าง</h5>
        <h6 class="panel-title">โครงการ : <?=$resproject[0]['project_name'];?></h6>
        <div class="heading-elements">
          <ul class="icons-list">
            <li><a data-action="collapse"></a></li>
          </ul>
        </div>
      </div>
      <div class="panel-body">
        <div id="progresshistoryssss"></div>
      </div>
    </div>
    <!-- Footer -->
    <div class="footer text-muted">
    
    </div>
    <!-- /footer -->
</div>
<!-- </div> -->
    <!-- /core JS files -->
    <script>
   
      // $(document).ready(function(){
        // $("#progresshistoryssss").html("dddd");
        $('#progresshistoryssss').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
        // $("#progresshistoryssss").load('<?php echo base_url(); ?>aps_active/progress_history/<?=$lono;?>');
        $("#progresshistoryssss").load('<?php echo base_url(); ?>management/load_history_progress/<?=$lono;?>');
      // });
    </script>
 


<script type="text/javascript">
  $('#account_i').attr('class', 'active');
  $('#project_arr').attr('style', 'background-color:#dedbd8');
</script>