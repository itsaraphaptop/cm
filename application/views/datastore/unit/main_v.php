<style>
.fieldset-info {
border: 1px solid #00bfff;
padding: 10px;
}
</style>

<div class="page-container">
		<div class="content-wrapper">
    <div class="content">
    <div class="row">
      <div class="col-md-4">
        <div class="panel panel-flat">
          <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Setup Unit</h6>
            <div class="heading-elements">
              <!-- <a  type="button" href="<?php echo base_url(); ?>data_master/new_vender"  class="preload btn border-info text-info-600 btn-flat btn-icon btn-xs heading-btn"><i class="icon-plus-circle2"></i> New Unit</a> -->
              <!-- <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
              </ul> -->
            </div>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
            <div class="panel-body">
              <div class="row">
                <form name="formdata" action="<?php echo base_url(); ?>datastore_active/newunit" method="post">
                  <div class="box box-primary">
                    <div class="box-header with-border">
                    </div>
                    <div class="box-body">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="name">Unit Code</label>
                          <input type="text" class="form-control input-sm" name="id" id="id">
                         
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group">
                          <label for="name">Unit Name</label>
                          
                          <input type="text" class="form-control input-sm" id="name" name="name" required/>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                          
                          <button type="submit" class="btn btn-success"><i class="icon-floppy-disk"></i> Save</button>
                          <a href="<?php echo base_url(); ?>data_master" type="button" class="btn btn-danger" data-dismiss="modal" id="closeacc"><i class="icon-close2"></i> Close</a>
                        </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  -->
        <div class="col-md-8">
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Show Unit</h6>
              <div class="heading-elements">
              <div class="modal-footer">
                <a href="#" class="btn btn-default" data-toggle="modal" data-target="#import"><i class="icon-file-upload2"></i> Import</a>
                <a type="button" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=unit.mrt" class="preload btn btn-info pull-right"><i class="icon-printer4"></i> Print </a>
              </div>
                <!-- <a  type="button" href="<?php echo base_url(); ?>data_master/new_vender"  class="preload btn border-info text-info-600 btn-flat btn-icon btn-xs heading-btn"><i class="icon-plus-circle2"></i> New Unit</a> -->
                <!-- <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
                  <li><a data-action="reload"></a></li>
                  <li><a data-action="close"></a></li>
                </ul> -->
              </div>
              <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="basic table table-hover table-striped table-xxs datatable-basic">
                    <thead>
                      <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Unit Code</th>
                        <th class="text-center">Uint Name</th>
                        <th class="text-center">Active</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $n=1; foreach ($res as $key => $value) { ?>
                      <tr>
                        <td><?php echo $n; ?></td>
                        <td><?php echo $value->unit_code; ?></td>
                        <td ><?php echo $value->unit_name ?></td>
                        <td>
                          <ul class="icons-list">
                            <li>
                              <!-- <a id="edit<?php echo $value->unit_id;?>"><i class="icon-pencil7"></i></a> -->
                              <a  data-toggle="modal" data-target="#editproj<?php echo $n; ?>" id="#edit<?php echo $n; ?>"><i class="icon-pencil7"></i> </a>
                            </li>
                              <li><a href="<?php echo base_url(); ?>datastore_active/delunit/<?php echo $value->unit_id; ?>"><i class="icon-trash"></i></a></li>
                            </ul>
                          </td>
                        </tr>
                        <div class="modal fade" id="editproj<?php echo $n; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <form action="<?php echo base_url(); ?>datastore_active/editunit/<?php echo $value->unit_id; ?>" method="post">
                      <div class="modal-content">
                        <div class="modal-header bg-primary">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Edit UNIT</h4>
                        </div>
                        <div class="modal-body">
                          <div class="col-xs-12">
                            <div class="form-group">
                              <label for="type">Unit Code</label>
                              <input type="text" readonly="" class="form-control input-sm" id="code" name="code" value="<?php echo $value->unit_code; ?>" >                              
                            </div>
                          </div>
                          <div class="col-xs-12">
                            <div class="form-group">
                              <label for="type">Unit Name</label>
                              <input type="text" value="<?php echo $value->unit_name; ?>" class="form-control input-sm" id="name" name="name" required/>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          
                          <button type="submit" class="btn btn-success"><i class="icon-floppy-disk"></i> Save</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal" id="closeacc"><i class="icon-close2"></i> Close</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                        <?php $n++; } ?>
                        <script>
                        // $("#edit<?php echo $value->unit_id;?>").click(function(){
                        //   $("#id").val(<?php echo $value->unit_id; ?>);
                        //   $("#name").val("<?php echo $value->unit_name; ?>");
                        //   $('#flag').val("udp");
                        //   $("#name").focus();
                        // });
                        </script>
                        
                      </div>
                      
                    </tbody></table>
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
            </div>
<div id="import" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
    <?php $this->load->helper('form'); ?>
    <?php echo form_open_multipart('import_material/do_upload_unit');?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Import Unit</h5>
      </div>

      <div class="modal-body">
        <p>To see the required Excel format for importing Unit and view some examples, choose a sample to download: </p>
        <div class="form-group">
          <a href="<?php echo base_url();?>sample/unit.xls" class="btn btn-default"><i class="icon-download7"></i> Download Sample</a>
        </div>
        <p>To import Unit, upload an Excel (.xls) file:</p>
        <div class="form-group">
          <input type="file" class="file-styled" id="file_upload" name="userfile">
        </div>
      </div>
      
      
      <div class="modal-footer">
        <button type="submit" class="uploadfile btn btn-success">Import File</button>
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
      </div>
    <?php echo form_close();?>
    <div id="load"></div>
    </div>
  </div>
</div>
<script>
$(".uploadfile").click(function(){
    $("#load").html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
});
</script>

          <script>
          $("#addnew").click(function(){
          $('input[class="form-control input-sm"]').val('');
          $("#name").focus();
          });
          </script>
          <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
          <!-- /core JS files -->
          <script>
          $.extend( $.fn.dataTable.defaults, {
          autoWidth: false,
          columnDefs: [{
          orderable: false,
          width: '100px',
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
          $('.basic').DataTable();
          $('#mpo').attr('class', 'active');
          $('#mpo2').attr('style', 'background-color:#dedbd8');
          </script>