<table class="table table-hover table-xs datatable-basicc">
  <thead>
    <tr>
      <th>#</th>
      <th>CNO No.</th>
      <th>CNO Date</th>
      <th>Amount</th>
      <th width="5%">Active</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php $n=1; foreach ($apo as $val) { 
      ?>
      <th scope="row"><?php echo $n; ?></th>
      <td><?php echo $val->cnoi_ref; ?></td>
      <td><?php echo $val->cnoi_taxdate; ?></td>   
      <td><?php echo $val->cnoi_disamt; ?></td>   
      <td><button class="btnre<?php echo $n; ?> btn btn-primary btn-xs btn-block"  
        data-code<?php echo $n; ?>="<?php echo $val->cnoi_ref; ?>"
        data-id<?php echo $n; ?>="<?php echo $val->cnoi_id; ?>"
        

        data-dismiss="modal">SELECT</button>
      </td>

      <script>
        $(".btnre<?php echo $n; ?>").click(function() {  
        //   var url="<?php echo base_url(); ?>ap_active/gl_reccno";
        //   var dataSet={
        //       id : "<?php echo $n; ?>",
        //       code : $(this).data('excode<?php echo $n;?>'),
        //       id : $(this).data('id<?php echo $n;?>'),
        //       };
        //       $.post(url,dataSet,function(data){
        //              $("#ttt").append(data);
        //       });       

        $("#amount").val($(this).data("netamt<?php echo $n; ?>"));
        $("#amountt").val($(this).data("netamt<?php echo $n; ?>"));
        $("#pamount").val($(this).data("vat<?php echo $n; ?>"));
        $("#vatt").val($(this).data("vat<?php echo $n; ?>"));
        $("#excode").val($(this).data("excode<?php echo $n; ?>"));
        $("#amt").val($(this).data("totamt<?php echo $n; ?>"));
        $("#amttotal").val($(this).data("totamt<?php echo $n; ?>"));
        $("#xamt").val($(this).data("totamt<?php echo $n; ?>"));
      
        $("#ttt").load('<?php echo base_url(); ?>ap/rec_cno/<?php echo $val->cnoi_id; ?>');
      
        });

      </script>
  
    </tr>
    <?php   $n++; }  ?>
  </tbody>
</table>

