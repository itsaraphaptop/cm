<div class="content-wrapper">
  <!-- Page header --> 
  
  <div class="content">
    <div class="panel panel-flat">
      <div class="panel-heading">
      <div class="tabbable">
        <ul class="nav nav-tabs nav-tabs-top top-divided">
          <li class="active"><a href="#top-divided-tab" data-toggle="tab">Project</a></li>
          <li id="Calendar_li"><a href="#top-divided-tab1" data-toggle="tab">Forecast Monthly</a></li>
        </ul>
         <div class="tab-content">
          <div class="tab-pane active" id="top-divided-tab">
              <h2>Project</h2>
              <hr/>
                <table class="table table-hover table-bordered table-xxs" id="data_master">
                  <thead>
                    <tr class="bg-warning" style="height: 50px">
                      <th class="text-center">Project Code</th>
                      <th width="30%" class="text-center">Project Name</th>
                      <th class="text-center">Control BOQ</th>
                      <th class="text-center">Control Budget</th>
                      <th class="text-center">Project Sub</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody id="loadproject">
                    <?php foreach ($getproj as $key => $value) {?>
                    <tr>
                      <td class="text-center"><?php echo $value->project_code; ?></td>
                      <td ><?php echo $value->project_name; ?></td>
                      <td class="text-center"><?php  if($value->controlbg=='2'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?></td>
                      <td class="text-center"><?php  if($value->chkconbqq=='1'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?></td>
                      <td class="text-center"><a class="label label-warning" data-toggle="modal" data-target="#sub<?php echo $value->project_code;?>">Sub Project</a></th>
                      <td class="text-center">
                        <?php
                            $pj = $value->project_id;
                            $this->db->select('project_id'); 
                            $this->db->from('forecast_month'); 
                            $this->db->where('project_id', $pj); 
                            $this->db->group_by('project_id');
                            $res = $this->db->get()->result();
                            $project_id=0; 
                            foreach ($res as $pj_i => $pj_no) {    
                              $project_id = $pj_no->project_id;
                            }  

                            if ($project_id == 0) {
                        ?>
                          <a href="<?php echo base_url(); ?>management/ProjectForecastMonthly_data/<?php echo $value->project_id; ?>" class="label label-primary"><i class="icon-folder-open"></i> Select</a>
                        <?php
                            }else{
                        ?>
                            <a href="#" class="label label-primary"><i class="icon-folder-open"></i> Select</a>
                        <?php
                            }                   
                        ?>
                       
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
          </div>
          <div class="tab-pane" id="top-divided-tab1">
            <h2>Project Forecast Monthly</h2>
            <hr/>
              <table class="table table-hover table-bordered table-xxs" id="data_master2">
                <thead>
                  <tr class="bg-info" style="height: 50px">
                    <th class="text-center">Project Code</th>
                    <th class="text-center">Project Name</th>
                    <th class="text-center">Control BOQ</th>
                    <th class="text-center">Control Budget</th>
                    <th class="text-center">Project Sub</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody id="loadproject">
                  <?php foreach ($getproj as $key => $value) {?>
                  <tr>
                    <td class="text-center"><?php echo $value->project_code; ?></td>
                    <td ><?php echo $value->project_name; ?></td>
                    <td class="text-center"><?php  if($value->controlbg=='2'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?></td>
                    <td class="text-center"><?php  if($value->chkconbqq=='1'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?></td>
                    <td class="text-center"><a class="label label-warning" data-toggle="modal" data-target="#sub<?php echo $value->project_code;?>">Sub Project</a></th>
                    <td class="text-center"><a href="<?php echo base_url(); ?>management/ProjectForecastMonthly_edit/<?php echo $value->project_id; ?>" class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
          </div>
        </div>
      
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript">
  $('#data_master').DataTable();
  $('#data_master2').DataTable();
  $('#tra').attr('class', 'active');
  $('#tra_sub7').attr('style', 'background-color:#dedbd8');
</script>