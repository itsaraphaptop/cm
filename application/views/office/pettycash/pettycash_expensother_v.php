<?php if ($id == "p") {
?>
    <table class="table table-xxs table-hover datatable-basicxc" >
        <thead>
            <tr>
                <th>No.<?php echo $id; ?></th>
                <th>ค่าใช้จ่ายในการเบิก</th>
                <th>AC Exp</th>
                <th>AC Cost</th>
                <th>Cost Code</th>
                <th width="5%">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php   $n =1;?>
            <?php foreach ($exp as $val){ 
                ?>
            <tr>
                <th scope="row"><?php echo $n;?></th>
                <td><?php echo $val->expens_name; ?></td>
                <td><?php echo $val->ac_code; ?></td>
                <td><?php echo $val->ac_code2; ?></td>
                <td><?php echo $val->costcode; ?></td>
                <td><button class="opendeptor<?php echo $n;?> btn btn-xs btn-block btn-info" data-toggle="modal" data-dismiss="modal">เลือก</button></td>
            </tr>

        <script>
          $(".opendeptor<?php echo $n;?>").click(function(event) {
            $("#newmatname").val("<?php echo $val->expens_name; ?>");
            $("#newmatcode").val("<?php echo $val->expens_code; ?>");
            // $("#list").val("<?php echo $val->csubgroup_name; ?>");
            $("#list").val("<?php echo $val->costcode; ?>");
            $("#vcostcode").val("<?php echo $val->costcode; ?>");
            $("#newmatname<?php echo $id; ?>").val("<?php echo $val->expens_name; ?>");
            $("#newmatcode<?php echo $id; ?>").val("<?php echo $val->expens_code; ?>");  
            $("#ac_code").val("<?php echo $val->ac_code2; ?>");   
            $("#aaccode<?php echo $id; ?>").val("<?php echo $val->ac_code2; ?>"); 
            $('#insertrow').modal('show'); 
            $('#refass').modal('hide');

            $("#exac_accost").val("<?php echo $val->expens_code; ?>");
            $("#exac_acname").val("<?php echo $val->expens_name; ?>");  


          });


        </script>
        <?php $n++; } ?>
        </tbody>
    </table>

<?php }elseif ($id == "d") {
?>  
    <table class="table table-xxs table-hover datatable-basicxc" >
        <thead>
            <tr>
                <th>No.<?php echo $id; ?></th>
                <th>ค่าใช้จ่ายในการเบิก</th>
                <th>AC Exp</th>
                <th>AC Cost</th>
                <th>Cost Cost</th>
                <th width="5%">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php   $n =1;?>
            <?php foreach ($emp as $val){ 
                ?>
            <tr>
                <th scope="row"><?php echo $n;?></th>
                <td><?php echo $val->expens_name; ?></td>
                <td><?php echo $val->ac_code; ?></td>
                <td><?php echo $val->ac_code2; ?></td>
                <td><?php echo $val->costcode; ?></td>
                <td><button class="opendeptor<?php echo $n;?> btn btn-xs btn-block btn-info" data-toggle="modal" data-dismiss="modal">เลือก</button></td>
            </tr>

        <script>
          $(".opendeptor<?php echo $n;?>").click(function(event) {
            $("#newmatname").val("<?php echo $val->expens_name; ?>");
            $("#newmatcode").val("<?php echo $val->expens_code; ?>");
            // $("#list").val("<?php echo $val->csubgroup_name; ?>");
            $("#list").val("<?php echo $val->costcode; ?>");
            $("#vcostcode").val("<?php echo $val->costcode; ?>");
            $("#newmatname<?php echo $id; ?>").val("<?php echo $val->expens_name; ?>");
            $("#newmatcode<?php echo $id; ?>").val("<?php echo $val->expens_code; ?>");  
            $("#ac_code").val("<?php echo $val->ac_code; ?>");   
            $("#aaccode<?php echo $id; ?>").val("<?php echo $val->ac_code; ?>");  

            $("#exac_accodeex").val("<?php echo $val->expens_code; ?>");
            $("#exac_acnameex").val("<?php echo $val->expens_name; ?>");  

          });


        </script>
        <?php $n++; } ?>
        </tbody>
    </table>
<?php } ?>
    
    <!-- Core JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

    <!-- /core JS files -->
    <script>
      $(".datatable-basicxc").DataTable();
    </script>
