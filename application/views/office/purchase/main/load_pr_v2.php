<table class="table table-hover table-xxs basic">
  <thead>
    <tr>
      <th>PR No. </th>
      <th>PR Req.</th>
      <th>Jobs</th>
      <th>Purchase Type</th>
      <th>Status</th>
      <th class="text-center">Express</th>
      <th>File Dowload</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $n = 1;foreach ($loadpr as $e) {?>
    <tr>
      <td><?php echo $e->pr_prno; ?> </td>
      <td><?php echo $e->pr_reqname; ?></td>
      <td width="30%"><?php $resaa = $this->db->query("select systemname from system where systemcode='$e->pr_system' AND compcode='$compcode'")->result_array(); echo $resaa[0]['systemname']; ;?></td>
      <td><?php if ($e->purchase_type=="1") {?>
        <span class='label label-warning'>PO/WO</span>
     <?php }else if($e->purchase_type=="2"){?>
          <span class='label label-info'>PO Only</span>
      <?php }else{?> 
        <span class='label bg-purple'>WO Only</span>
     <?php }?>
     </td>
      <td><span class="label label-success"><?php echo $e->pr_approve; ?></span></td>
      <td class="text-center"><?php if($e->express==1){ echo "<b style='color:red';>ด่วน !</b>"; }; ?></td>
      <td><?php $this->db->select('*');
        $this->db->from('select_file_pr');
        $this->db->where('pr_ref',$e->pr_prno);
        $file=$this->db->get()->result();
        foreach ($file as $f) { ?>
        <b >เอกสารแนบ : <a href="<?php echo base_url(); ?>select_file_pr/<?php echo $f->name_file ?>" style="color: red;" target="_blank">Download !!</a></b>
      <?php } ?></td>
      <td><a type="button" id="se<?php echo $n; ?>" class="se<?php echo $e->pr_prno; ?> label bg-teal" data-toggle="modal" data-target="#loadprv">Select by Item</a></td>
    </tr>

    <?php 
      $this->db->select('*');
      $this->db->where('vender_id',$e->pr_vender);
      $vender = $this->db->get('vender')->result();
      $vname = "";
      foreach ($vender as $v ) {
      $vname = $v->vender_name;
      }
    ?>
    <script>
    $("#se<?php echo $n; ?>").click(function(){
    $("#load_detailpr_v").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
    $("#load_detailpr_v").load('<?php echo base_url(); ?>share/loadprdetail/<?php echo $e->pr_prno; ?>/<?php echo $e->pr_project; ?>');
    $("#prno").val("<?php echo $e->pr_prno; ?>");
    $("#wono").val("<?php echo $e->wo; ?>");
    $("#deliverydate").val("<?php echo $e->pr_delidate; ?>");
    $("#memname").val("<?php echo $e->pr_reqname; ?>");
    $("#memid").val("<?php echo $e->pr_memid; ?>");
    $("#system").val("<?php echo $e->pr_system; ?>");
    $("#tem").val("<?php echo $e->pr_system; ?>");
    $("#system").prop("disabled", true);
    $("#venderid").val("<?php echo $e->pr_vender; ?>");
    $("#vender").val("<?php echo $vname; ?>");
    $("#remark").val("<?php echo $e->pr_remark;?>");

    });
    </script>
    <?php $n++;}?>
  </tbody>
</table>
<!-- Core JS files -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<!-- /core JS files -->
<script>
$.extend( $.fn.dataTable.defaults, {
autoWidth: false,
columnDefs: [{
orderable: false,
width: '100px',
targets: [ 2 ]
}],
dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
language: {
search: '<span>Filter:</span> _INPUT_',
lengthMenu: '<span>Show:</span> _MENU_',
paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
},
drawCallback: function () {
$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
},
preDrawCallback: function() {
$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
}
});
$('.basic').DataTable();
</script>