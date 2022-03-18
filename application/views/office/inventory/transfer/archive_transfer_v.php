<div class="content-wrapper">
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title">Highlighted tabs</h6>
            </div>

            <div class="panel-body">
                <div class="tabbable">
                    <ul class="nav nav-tabs nav-tabs-component">
                        <li class="active"><a href="#highlighted-tab1" data-toggle="tab">Project</a></li>
                        <li><a href="#highlighted-tab2" data-toggle="tab">Department</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="highlighted-tab1">
                            <table class="table table-hover table-striped table-xxs datatable-basic">
                                <thead>
                                    <tr>
                                        <th width="20%" class="text-center">Project Code</th>
                                        <th width="60%" class="text-center">Project Name</th>
                                        <th width="20%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($getproj as $key => $value) {
										if ($value->project_department==1) {
									?>
                                    <tr>
                                        <td>
                                            <?php echo $value->project_code; ?>
                                        </td>
                                        <td>
                                            <?php echo $value->project_name; ?>
                                        </td>

                                        <td><a href="<?php echo base_url(); ?>inventory/receive_transfer_store/<?php echo $value->project_id; ?>"
                                                class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>

                                    </tr>
                                    <?php } }?>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane" id="highlighted-tab2">
                            <table class="table table-hover table-striped table-xxs datatable-basic">
                                <thead>
                                    <tr>
                                        <th width="20%" class="text-center">Department Code</th>
                                        <th width="60%" class="text-center">Department Name</th>
                                        <th width="20%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($getproj as $key => $value) {
										if ($value->project_department==2) {
									?>
                                    <tr>
                                        <td>
                                            <?php echo $value->project_code; ?>
                                        </td>
                                        <td>
                                            <?php echo $value->project_name; ?>
                                        </td>

                                        <td><a href="<?php echo base_url(); ?>inventory/receive_transfer_store/<?php echo $value->project_id; ?>"
                                                class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>

                                    </tr>
                                    <?php } }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /main content -->



<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js">
</script>

<!-- /core JS files -->
<script>
    $.extend($.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [{
            orderable: false,
            width: '100px',
            targets: [2]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
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

    $('#imp').attr('class', 'active');
    $('#receive').attr('class', 'active');
    $('#imp_sub11').attr('style', 'background-color:#dedbd8');
</script>