<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">


            <div class="content">
                <!-- /info alert -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h6 class="panel-title">
                            <i class="icon-cog3 position-left"></i> Setup Account Chart
                            <p></p>
                        </h6>
                        <div class="heading-elements">
                            <a href="#" class="btn btn-default" data-toggle="modal" data-target="#import"><i class="icon-file-upload2"></i> Import</a>
                            <a href="<?php echo base_url(); ?>data_master" class="btn bg-slate">
                                <i class="icon-arrow-left13"></i> Back</a>
                            <a type="button"
                                href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=account_total.mrt"
                                class="preload btn btn-info">
                                <i class="icon-printer4"></i> Print </a>
                            <a type="button" href="<?php echo base_url(); ?>data_master/new_accchart"
                                class="preload btn btn-info">
                                <i class="icon-plus-circle2"></i> New</a>

                            <a type="button" href="<?php echo base_url(); ?>account/account_chart." download
                                class="preload btn btn-success">
                                <i class="icon-download"></i> Export Templete</a>
                            <!-- <a href="/" class="btn border-info text-info-600 btn-flat btn-icon btn-xs heading-btn"><i class="icon-close2"></i> Close</a> -->
                        </div>
                        <a class="heading-elements-toggle">
                            <i class="icon-menu"></i>
                        </a>
                    </div>
                    <div class="panel-body">
                        <div class="dataTables_wrapper no-footer">
                            <div class="table-responsive">
                                <table class="table table-xxs table-striped datatable-basic" id=table_server_id>
                                    <thead>
                                        <tr>
                                            <th>Account Code</th>
                                            <th>Account Name</th>
                                            <th>Type</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($res as $v) {?>
                                        <?php if ($v->act_header=="H"): ?>
                                        <tr class="info">
                                            <td width="10%">
                                                <?php echo $v->act_code; ?>
                                            </td>
                                            <td>
                                                <?php echo $v->act_name; ?>
                                            </td>
                                            <td width="20%">
                                                <?php echo $v->act_header; ?>
                                            </td>
                                            <td width="10%">
                                                <ul class="icons-list">
                                                    <li>
                                                        <a data-toggle="modal"
                                                            data-target="#open<?php echo $v->act_code; ?>"
                                                            data-popup="tooltip" title="" data-original-title="Open">
                                                            <i class="icon-folder-open"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="preload"
                                                            href="<?php echo base_url(); ?>data_master/edit_accchart/<?php echo $v->act_id; ?>"
                                                            data-popup="tooltip" title="" data-original-title="Edit">
                                                            <i class="icon-pencil7"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url(); ?>datastore_active/del_accchart/<?php echo $v->act_id; ?>"
                                                            data-popup="tooltip" title="" data-original-title="Remove">
                                                            <i class="icon-trash"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <?php else: ?>
                                        <tr>
                                            <td width="10%">
                                                <?php echo $v->act_code; ?>
                                            </td>
                                            <td>
                                                <?php echo $v->act_name; ?>
                                            </td>
                                            <td width="20%">
                                                <?php echo $v->act_header; ?>
                                            </td>
                                            <td width="10%">
                                                <ul class="icons-list">
                                                    <li>
                                                        <a data-toggle="modal"
                                                            data-target="#open<?php echo $v->act_code; ?>"
                                                            data-popup="tooltip" title="" data-original-title="Open">
                                                            <i class="icon-folder-open"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="preload"
                                                            href="<?php echo base_url(); ?>data_master/edit_accchart/<?php echo $v->act_id; ?>"
                                                            data-popup="tooltip" title="" data-original-title="Edit">
                                                            <i class="icon-pencil7"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url(); ?>datastore_active/del_accchart/<?php echo $v->act_id; ?>"
                                                            data-popup="tooltip" title="" data-original-title="Remove">
                                                            <i class="icon-trash"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <?php endif ?>

                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Basic modal -->
                <?php foreach ($res as $val2) {?>
                <div id="open<?php echo $val2->act_code; ?>" class="modal fade">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content ">
                            <div class="modal-header btn-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Account Name.:
                                    <?php echo $val2->act_name; ?>
                                </h5>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="display-block text-semibold">Account Code</label>
                                        <label class="display-block text-semibold">
                                            <?php echo $val2->act_code; ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="display-block text-semibold">Debit :</label>
                                        <label class="display-block text-semibold">
                                            <?php echo $val2->act_debit; ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="display-block text-semibold">Account Name</label>
                                        <label class="display-block text-semibold">
                                            <?php echo $val2->act_name; ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="display-block text-semibold">Credit:</label>
                                        <label class="display-block text-semibold">
                                            <?php echo $val2->act_credit; ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a type="button" id="close" class="btn btn-danger" data-dismiss="modal">
                                    <i class="icon-close2"></i> Close</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- /basic modal -->
                <!-- Footer -->
                <div class="footer text-muted">
                    <!-- © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a> -->
                </div>
                <!-- /footer -->
            </div>
        </div>
    </div>
</div>

<script>
$.extend($.fn.dataTable.defaults, {
    autoWidth: false,
    columnDefs: [{
        orderable: false,
        width: '100px',
        targets: [3]
    }],
    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
    language: {
        search: '<span>Filter:</span> _INPUT_',
        // pageLength: 100,
        // lengthMenu: '<span>Show:</span> _MENU_',
        paginate: {
            'first': 'First',
            'last': 'Last',
            'next': '&rarr;',
            'previous': '&larr;'
        }
    },
    drawCallback: function() {
        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
    },
    preDrawCallback: function() {
        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
    }
});
$('.datatable-basic').DataTable();
$('[data-popup="tooltip"]').tooltip();
$('#ma').attr('class', 'active');
$('#ma2').attr('style', 'background-color:#dedbd8');
</script>

<div id="import" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
    <?php $this->load->helper('form'); ?>
    <?php echo form_open_multipart('import_company/do_upload_acchart');?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Import Account Chart</h5>
      </div>

      <div class="modal-body">
        <p>To see the required Excel format for importing Account Chart and view some examples, choose a sample to download: </p>
        <div class="form-group">
          <a href="<?php echo base_url();?>sample/account_chart.xls" class="btn btn-default"><i class="icon-download7"></i> Download Sample</a>
        </div>
        <p>To import Account Chart, upload an Excel (.xls) file:</p>
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