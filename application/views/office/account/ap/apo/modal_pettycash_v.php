<table class="table table-xxs">
  <thead>
    <tr>
      <th>#</th>
      <th>เลขที่</th>
      <th>ชื่อ</th>
      <th>เลือก</th>
    </tr>
  </thead>
  <tbody>
      <?php $n=1; foreach ($pettycash as $val) {?>
    <tr>
            <th scope="row"><?php echo $n; ?></th>
            <td><?php echo $val->docno; ?></td>
            <td><?php echo $val->vender; ?><?php echo $val->member; ?></td>
            <td><?php echo $val->remark; ?></td>
            <td><button class="btnre1 btn btn-info btn-xs btn-block" data-mremark="<?php echo $val->remark; ?>" data-member="<?php echo $val->member; ?>" data-projectid="<?php echo $val->project; ?>" data-mdoc="<?php echo $val->docno; ?>" data-mdesc="<?php echo $val->remark; ?>" data-msystem="<?php echo $val->system; ?>" data-ventype="<?php echo $val->vender_type; ?>"
            data-depid="<?php echo $val->department; ?>"  data-depname="<?php echo $val->department_title; ?>" data-mproject="<?php echo $val->project_name; ?>" data-mvender="<?php echo $val->vender; ?>" data-toggle="modal" data-dismiss="modal">เลือก</button></td>
    </tr>
    <?php $n++; } ?>
  </tbody>
</table>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>


<script>
  $(".btnre1").click(function(){
    if ($(this).data("mvender")!="") {
      $("#payto").val($(this).data("mvender"));
    }else{
      $("#payto").val($(this).data("member"));
    }
    $("#apotype").val($(this).data("ventype"));
    $("#apoprojectname").val($(this).data("mproject"));
    $("#apoprojectid").val($(this).data("projectid"));
    $("#aposystem").val($(this).data("msystem"));
    $("#apodepartmenttname").val($(this).data("depname"));
    $("#apodepartmenttid").val($(this).data("depid"));
    $("#pettycashno").val($(this).data('mdoc'));
    $("#remarkapo").val($(this).data('mremark'));
    $("#table").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    var docno = $(this).data('mdoc');
    $("#table").load("<?php echo base_url(); ?>ap/load_pettycash_detail/"+docno);
  });
</script>
