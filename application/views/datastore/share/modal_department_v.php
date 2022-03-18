<table  class="table table-xxs table-hover datatable-basicxceve" >
      <thead>
        <tr>
          <th>Department Code</th>
          <th>Department Name</th>
          <th width="5%">Active</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php foreach ($getdep as $valj){ ?>
        <tr>
         <td><?php echo $valj->department_code; ?></td>
          <td><?php echo $valj->department_title; ?></td>
            <td><button class="opendp btn btn-xs btn-block btn-primary" data-toggle="modal"  data-depid="<?php echo $valj->department_id;?>" data-depname="<?php echo $valj->department_title;?>" data-dismiss="modal">SELECT </button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>

<script>
  $(".opendp").click(function(){
    $("#departid").val($(this).data('depid'));
    $('#departname').val($(this).data('depname'));
    
    $("#depid").val($(this).data('depid'));
    $('#depname').val($(this).data('depname'));
    $("#departmenttid").val($(this).data('depid'));
    $('#departmenttname').val($(this).data('depname'));
    $("#dpname").val($(this).data('depname'));
    $("#dpid").val($(this).data('depid'));
    $("#putprojectid").val("");
    $('#projectname').val("");
    $("#projname").val("");
    $("#projid").val("");
    $("#projectid").val("");
    
    $("#depart_id").val($(this).data('depid'));

    $("#dpt_code").val($(this).data('depid'));
    $("#dpt_title").val($(this).data('depname'));

    $("#dpt_code<?php echo $id; ?>").val($(this).data('depid'));
    $("#dpt_title<?php echo $id; ?>").val($(this).data('depname'));
    $("#pjdpt_title<?php echo $id; ?>").val($(this).data('depname'));

    
    $("#fa_location").val("2");
    $("#projectnamee").val("");
    $("#projectidd").val("");

    $("#projectidd<?php echo $id; ?>").val("");

    


  });
</script>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
  $(".datatable-basicxceve").DataTable();
</script>
