<div class="content-wrapper">
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title"></h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
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
                                        <th>Project Code</th>
                                        <th>Project Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($getproj as $key => $value) {
                                      if($value->project_department==1){
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $value->project_code; ?>
                                        </td>
                                        <td>
                                            <?php echo $value->project_name; ?>
                                        </td>
                                        <?php if ($type=="b") { ?>
                                        <td><a href="<?php echo base_url(); ?>inventory/document_issue_list/<?php echo $value->project_id; ?>"
                                                class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>
                                        <?php }elseif($type=="t"){?>
                                         <td><a href="<?php echo base_url(); ?>inventory/archive_trading/<?php echo $value->project_id; ?>"
                                                class="label label-primary"><i class="icon-folder-open"></i> Select Trading</a></td>
                                        <?php }else { ?>
                                        <td><a href="<?php echo base_url(); ?>inventory/document_bookinng_list/<?php echo $value->project_id; ?>"
                                                class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>
                                        <?php } ?>
                                    </tr>
                                    <?php } }?>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane" id="highlighted-tab2">
                            <table class="table table-hover table-striped table-xxs datatable-basic">
                                <thead>
                                    <tr>
                                        <th>Departmet Code</th>
                                        <th>Departmet Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($getproj as $key => $value) {
                                      if($value->project_department==2){
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $value->project_code; ?>
                                        </td>
                                        <td>
                                            <?php echo $value->project_name; ?>
                                        </td>
                                        <?php if ($type== 'b') { ?>
                                        <td><a href="<?php echo base_url(); ?>inventory/document_issue_list/<?php echo $value->project_id; ?>"
                                                class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>
                                        <?php }elseif($type=="t"){?>
                                         <td><a href="<?php echo base_url(); ?>inventory/archive_trading/<?php echo $value->project_id; ?>"
                                                class="label label-primary"><i class="icon-folder-open"></i> Select Trading</a></td>
                                        <?php }else { ?>
                                        <td><a href="<?php echo base_url(); ?>inventory/document_bookinng_list/<?php echo $value->project_id; ?>"
                                                class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>
                                        <?php } ?>
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

    var seg = '<?=$this->uri->segment(3);?>';


    if (seg == 'a') {
        $(".panel-title").html("Archive IC Receive");
        $('#imp').attr('class', 'active');
        $('#inventory_receive').attr('class', 'active');
        $('#imp_sub4').attr('style', 'background-color:#dedbd8');
    } else if (seg == 'u') {
        $(".panel-title").html("Archive Reservation");
        $('#imp').attr('class', 'active');
        $('#reservation').attr('class', 'active');
        $('#imp_sub6').attr('style', 'background-color:#dedbd8');
    } else if (seg == 'b') {
        $(".panel-title").html("Archive Issue");
        $('#imp').attr('class', 'active');
        $('#issue').attr('class', 'active');
        $('#imp_sub8').attr('style', 'background-color:#dedbd8');
    } else if (seg == 't') {
        $(".panel-title").html("Archive Trading");
        $('#imp').attr('class', 'active');
        $('#trading').attr('class', 'active');
        $('#imp_trading_8').attr('style', 'background-color:#dedbd8');
    }
</script>