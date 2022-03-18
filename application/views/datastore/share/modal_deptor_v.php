<table class="table table-xxs table-hover" id="modal_cus">
<thead>
<tr>
<th>No.</th>
<th>Owner Name</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php   $n =1;?>
<?php foreach ($res as $val){ ?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><?php echo $val->debtor_name; ?></td>
<td>
    <button class="opendeptor<?php echo $n;?> btn btn-xs btn-block btn-primary" data-toggle="modal" data-dismiss="modal">SELECT</button></td>
</tr>
<script>
  $(".opendeptor<?php echo $n;?>").click(function(event) {
    // $( "#feeds" ).load( "feeds.php", { id: <?php echo $n;?> }, function() {
    //     alert( "The last 25 entries in the feed have been loaded" );
    // });
    $("#bd_cusn").val("<?php echo $val->debtor_name; ?>");
    $("#bd_cus").val("<?php echo $val->debtor_code; ?>");
    $("#crterm").val("<?php echo $val->debtor_credit; ?>");

    $("#ownercode").val("<?php echo $val->debtor_code; ?>");
    $("#ownername_th").val("<?php echo $val->debtor_name; ?>");
    $("#ownername_en").val("<?php echo $val->debtor_name; ?>");
    $("#owner_address").val("<?php echo $val->debtor_address; ?>");
    $("#owner_phonenumber").val("<?php echo $val->debtor_tel; ?>");
    $("#owner_fax").val("<?php echo $val->debtor_tax; ?>");
    $("#owner_email").val("<?php echo $val->debtor_fax; ?>");

    $("#cus_id").val("<?php echo $val->debtor_code; ?>");
    $("#cus_name").val("<?php echo $val->debtor_name; ?>");
    

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
  $("#modal_cus").DataTable();
</script>
