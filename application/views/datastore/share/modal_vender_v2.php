<table class="table table-xxs table-hover datatable-basicxc<?php echo $id; ?>" >
  <thead>
    <tr>
      <th>No.</th>
<th>Vender Name</th>
<th>Address</th>
<th width="5%">Active</th>
    </tr>
  </thead>
  <tbody>
    <?php   $n =1;?>
    <?php foreach ($res as $val){ ?>
    <tr>
      <th scope="row"><?php echo $n;?></th>
      <td><?php echo $val->vender_name; ?></td>
      <td><?php echo $val->vender_address; ?></td>
      <td>
        <button 
          class="openvensmo btn btn-xs btn-block btn-primary"
          row="<?=$id;?>" 
          data-toggle="modal"  
          data-vnameh="<?php echo $val->vender_name;?>" 
          data-addrh="<?php echo $val->vender_address; ?>" 
          data-crteam="<?php echo $val->vender_credit;?>" 
          data-vtel="<?php echo $val->vender_tel; ?>" 
          data-code="<?php echo $val->vender_code; ?>" 
          data-id="<?php echo $val->vender_id; ?>"
          data-tax="<?php echo $val->vender_tax; ?>"
          onclick="set_data($(this))" 
          data-dismiss="modal">SELECT
        </button>
      </td>
    </tr>
    <?php $n++; } ?>
  </tbody>
</table>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<!-- /core JS files -->
<script>
$(".datatable-basicxc<?php echo $id; ?>").DataTable();
</script>
<script type="text/javascript">
  function set_data(el){
      var row = el.attr("row");
      $("#vendercode"+row).val(el.data('code'));
      $("#venname"+row).val(el.data('vnameh'));
      $("#vencr"+row).val(el.data('crteam'));
      $("#ventel"+row).val(el.data('vtel'));
      $("#venfax"+row).val(el.data('tax'));
      $("#check").val("Y");
  }
</script>
