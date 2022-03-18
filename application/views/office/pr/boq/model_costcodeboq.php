<table class="table table-xxs table-hover datatable-basicxcboqcostcode" id="myTable">
<thead>
<tr>
<th  class="text-center">No. <?php echo $id; ?></th>
<th class="text-center">Cost Code</th>
<th class="text-left">Cost Name</th>
<th width="5%" class="text-center">จัดการ</th>
</tr>
</thead>
<tbody>

<?php $n=1; foreach ($res as $val){ ?>
<tr id="a<?php echo $n; ?>"  >
<th class="text-center"><?php echo $n; ?></th>
<th class="text-center"><?php echo $val->costcode; ?> </th>
<th class="text-left"><?php echo $val->costname; ?></th>
<th class="text-center"><button id="insertopen<?php echo $n;?>" class="btn btn-xs btn-block btn-info" data-toggle="modal" data-dismiss="modal">เลือก</button></th>
</tr>
<script>
  $("#insertopen<?php echo $n; ?>").click(function(){
        $('#codecostcode').val('<?php echo $val->costcode; ?>');  
        $('#costname').val('<?php echo $val->costname; ?>');
        
        $('#codecostcodeint').val('<?php echo $val->costcode; ?>');
        $('#costnameint').val('<?php echo $val->costname; ?>');
        $('#type_costhide').show();
      
        $('#codecostcodeint<?php echo $id; ?>').val('<?php echo $val->costcode; ?>');
        $('#costnameint<?php echo $id; ?>').val('<?php echo $val->costname; ?>');
        $('#costcodetext<?=$id;?>').val('<?php echo $val->costcode; ?>');
        $('#codecostcode<?php echo $id; ?>').val('<?php echo $val->costcode; ?>');
        $('#costname<?php echo $id; ?>').val('<?php echo $val->costname; ?>');
        $('#type_costhide<?php echo $id; ?>').show();
        $('#list').val('<?php echo $val->costcode; ?>');
        $('#vcostcode').val('<?php echo $val->costname; ?>');

        $('#list<?php echo $id; ?>').val('<?php echo $val->costname; ?>');
        $('#vcostcode<?php echo $id; ?>').val('<?php echo $val->costcode; ?>');
     });
    </script>
    <?php $n++; } ?>

    


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
