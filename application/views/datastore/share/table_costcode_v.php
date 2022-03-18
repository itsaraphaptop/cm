<table class="table table-xxs table-hover datatable-basicxcboqcostcode" >
<thead>
<tr>
<th class="text-center">Cost Code</th>
<th class="text-center">Cost Name</th>
<th width="5%" class="text-center">Active</th>
</tr>
</thead>
<tbody>
<?php   $n =1;?>
<?php foreach ($res as $val){ ?>
<tr id="a<?php echo $n; ?>" <?php if($val->boq_costmat==""){ echo 'hidden=""'; }; ?> >
<th class="text-center"><?php echo $val->boq_costmat; ?> </th>
<th class="text-center"><?php echo $val->boq_costmatname; ?></th>
<th class="text-center">
<button 
    id="insertopen<?php echo $n;?>" 
    boq_id="<?=$val->boq_id ?>"  
    tender_id="<?=$val->boq_project ?>" 
    class="btn btn-xs btn-block btn-primary"
    cost_code="<?php echo $val->boq_costmat; ?>"
    total="<?=$val->total?>"
    data-toggle="modal" 
    data-dismiss="modal"
    row="<?=$row?>"
    onclick="set_data_el($(this))"
    >SELECT</button></th>
</tr>

    <?php $n++; } ?>

    <?php $s=$n; foreach ($res as $val){ ?>
<tr <?php  if($val->boq_costsub==""){ echo 'hidden=""'; }; ?>>
<th class="text-center"><?php echo $val->boq_costsub; ?> </th>
<th class="text-center"><?php echo $val->boq_costsubname; ?></th>
<th class="text-center">
<button 
  class="btn btn-xs btn-block btn-info" 
  id="opendeptor<?php echo $s;?>" 
  boq_id="<?=$val->boq_id ?>"  
  tender_id="<?=$val->boq_project ?>"
  cost_code="<?php echo $val->boq_costsub ?>"
  total="<?=$val->total?>"
  data-toggle="modal" 
  data-dismiss="modal"
  row="<?=$row?>"
  onclick="set_data_el($(this))"
  >เลือก</button>
</th>
</tr>


 <?php $s++; } ?>


</tbody>
</table>
<!-- Core JS files -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
  $(".datatable-basicxcboqcostcode").DataTable();
</script>
