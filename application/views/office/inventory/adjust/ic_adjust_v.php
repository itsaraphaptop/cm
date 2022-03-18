<div class="content-wrapper">
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> ระบบเจ้าหนี้ (AP)</span></h4>
      </div>
    </div>
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
        <li>Adjust Cost</li>
        </ul>
    </div>
  </div>
  <div class="content">
    <div class="panel panel-flat">
      <div class="panel-heading">
        <h5 class="panel-title">Adjust Cost</h5>
        <div class="heading-elements">
          <ul class="icons-list">
            <li><a data-action="collapse"></a></li>
            <li><a data-action="reload"></a></li>
            <li><a data-action="close"></a></li>
          </ul>
        </div>
      </div>
      <div class="tabbable">

          <div class="tab-pane has-padding">
            <div id="invoice" class="table-responsive">
              <table class="basic table table-hover table-xxs datatable-basic">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th >IC Receive Code</th>
                        <th>Materail Name</th>
                        <th>Warehouse Name</th>
                        <!-- <th>Now Price Unit</th> -->
                        <th>Price Unit</th>
                        <!-- <th>User Edit</th> -->
                        <th>Active</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $n=1; foreach ($res as $value) {
                          $ee = $this->db->query("SELECT store_total from store where store_matcode='$value->poi_matcode' and store_project='$value->project' and wh='$value->ic_warehouse' ")->result();
                          foreach ($ee as $to) {
                           // if ($to->store_total >= $value->poi_receive) {
                            ?>
                        <tr>
                          <td><?php echo $n; ?></td>
                          <td><?php echo $value->poi_ref; ?></td>
                          <td><?php echo $value->poi_matcode." - ".$value->poi_matname; ?></td>
                          <td><?php echo $value->whname; ?></td>
                          <!-- <td><input type="text" id="newprice<?php echo $value->poi_id; ?>" value="" name="newprice" class="form-control newprice" style="width: 100px"></td> -->
                          <td style="text-align: right;">
                            <?php echo number_format($value->poi_priceunit,2); ?>
                            <!-- <input type="hidden" value="<?php echo $value->poi_matcode; ?>" id="matcode<?php echo $value->poi_id; ?>" name=""> -->
                            <!-- <input type="hidden" value="<?php echo $value->poi_id; ?>" id="id<?php echo $value->poi_id; ?>" name=""> -->
                          </td>
                         <!--  <td><?php echo $value->useredit; ?>
                          </td> -->
                          <td>
                            <!-- <i class=" icon-pencil7" id="edit<?php echo $value->poi_id; ?>"></i> -->
                            <!-- <i class="icon-floppy-disk" id="save<?php echo $value->poi_id; ?>"></i> -->
                                <?php if ($value->poi_status != 'del') {  ?>
                            <a class="po_reccode btn-sm" data-toggle="modal" data-target="#po_reccode<?php echo $value->poi_ref.$value->poi_matcode; ?>"><i class="icon-trash"></i></a>
                              <?php } ?>
                          </td>
                        <?php  
                        // } 
                        ?>
                        </tr>
                        <script>
                        $("#newprice<?php echo $value->poi_id; ?>").hide();
                        $("#save<?php echo $value->poi_id; ?>").hide();
                          $(".newprice").keyup(function(){
                          intOnly($(this));
                        });
                        $("#edit<?php echo $value->poi_id; ?>").click(function(e){
                          $("#save<?php echo $value->poi_id; ?>").show();
                          $("#edit<?php echo $value->poi_id; ?>").hide();
                          $("#newprice<?php echo $value->poi_id; ?>").show();
                        });

                      </script>
                      <script>
                      $("#save<?php echo $value->poi_id; ?>").click(function(e){
                        var url="<?php echo base_url(); ?>inventory_active/ic_receive_edit";  
                        var dataSet={
                        id : $("#id<?php echo $value->poi_id; ?>").val(),
                        newprice : $("#newprice<?php echo $value->poi_id; ?>").val(),
                        matcode : $("#matcode<?php echo $value->poi_id; ?>").val(),
                        };
                        $.post(url,dataSet,function(data){
                           setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>inventory/ic_adjust_v/<?php echo $code; ?>";
                      }, 1000);
                        });
});
                      </script>
                        <?php   $n++; } } ?>
                    </tbody>
              </table>
             <!--  <div class="col-sm-12">
                <div class="pull-right">
                  <button type="button" id="saveh" class="btn bg-success" name="button"><i class="icon-floppy-disk"></i> Save</button>
                </div>
              </div> -->
              
            </div>
          </div>
      </div>

    </div>
  </div>
</div>

<?php foreach($res as $ee){ ?>
<form id="faps" action="<?php echo base_url(); ?>inventory_active/ic_receive_delect" method="post">
<div id="po_reccode<?php echo $ee->poi_ref.$ee->poi_matcode; ?>" class="modal fade" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-body">
                <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h5 class="modal-title">กรุณากรอกรายละเอียดการลบ รหัส IC <?php echo $ee->poi_ref ?></h5>
				</div>
				<div class="modal-body">
					<input type="text" class="form-control"  name="comment" id="comment">
					<input type="hidden" value="<?php echo $ee->poi_ref;?>" class="form-control" name="code" id="code<?php echo $ee->poi_ref.$ee->poi_matcode; ?>">
					<input type="hidden" value="<?php echo $ee->poi_matcode;?>" class="form-control" name="matcode" id="matcode<?php echo $ee->poi_ref.$ee->poi_matcode; ?>">
					<input type="hidden" value="<?php echo $ee->project;?>" class="form-control" name="project" id="project<?php echo $ee->poi_ref.$ee->poi_matcode; ?>">
					<input type="hidden" value="<?php echo $ee->poi_receive;?>" class="form-control" name="qty" id="qty<?php echo $ee->poi_ref.$ee->poi_matcode; ?>">

					<input type="hidden" value="<?php echo $ee->rccode;?>" class="form-control" name="rccode" id="rccode<?php echo $ee->poi_ref.$ee->poi_matcode; ?>">
					<input type="hidden" value="<?php echo $ee->ic_warehouse;?>" class="form-control" name="ic_warehouse" id="ic_warehouse<?php echo $ee->poi_ref.$ee->poi_matcode; ?>">
				</div>
				<div class="modal-footer">
					 <button type="submit" class="btn bg-success" id=""><i class="icon-floppy-disk"></i> Save</button>
					<a id="fa_close" href="<?php echo base_url(); ?>" class="btn bg-danger"><i class="icon-close2"></i> Close</a>
				</div>
            </div>
        </div>
    </div>
</div>
</form>
<script>
$("#savereccode").click(function(e){
 if($("#comment").val()==""){
  swal({
      title: "กรอกรายละเอียดการลบ !!!",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else{
     var frm = $('#faps');
            frm.submit(function (ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                            success: function (data) {
                        swal({
                                  title: "Save Completed!!.",
                                  text: "Save Completed!!.",
                                  // confirmButtonColor: "#66BB6A",
                                  type: "success"
                              });
      
                       
                    }
                });
                ev.preventDefault();

            });
          $("#faps").submit();
      }
});

</script>
<?php } ?>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
  <!-- /core JS files -->
  <script>
  $.extend( $.fn.dataTable.defaults, {
  autoWidth: false,
  columnDefs: [{
  orderable: false,
  width: '30px',
  targets: [ 0 ]
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
  $('.datatable-basic').DataTable();
  </script>