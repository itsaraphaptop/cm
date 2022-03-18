<div class="content-wrapper">
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title">Transfer Archive</h6>
                <div class="heading-elements">
                </div>

                <div class="panel-body">
                    <div class="tabbable">
                        <ul class="nav nav-tabs nav-tabs-component">
                            <li class="active"><a href="#highlighted-tab1" data-toggle="tab">Project</a></li>
                            <li><a href="#highlighted-tab2" data-toggle="tab">Department</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="highlighted-tab1">
                                <table class="table table-hover table-striped  table-xxs datatable-basic">
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

                                            <td><a href="<?php echo base_url(); ?>inventory/receive_transfer_store/<?php echo $value->project_id; ?>/archive"
                                                    class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>
                                            <!-- <td><a href="<?php echo base_url(); ?>inventory/retrive_transfer_store/<?php echo $value->project_id; ?>"
                                                    class="label label-primary"><i class="icon-folder-open"></i> Select</a></td> -->

                                        </tr>
                                        <?php } } ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane" id="highlighted-tab2">
                                <table class="table table-hover table-striped  table-xxs datatable-basic">
                                    <thead>
                                        <tr>
                                            <th width="20%" class="text-center">Project Code</th>
                                            <th width="60%" class="text-center">Project Name</th>
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

                                            <td><a href="<?php echo base_url(); ?>inventory/receive_transfer_store/<?php echo $value->project_id; ?>/archive"
                                                    class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>
                                            <!-- <td><a href="<?php echo base_url(); ?>inventory/retrive_transfer_store/<?php echo $value->project_id; ?>"
                                                    class="label label-primary"><i class="icon-folder-open"></i> Select</a></td> -->

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
</div>

<?php foreach ($codeic as $key => $value) {?>
<!-- modal  โครงการ-->
<div class="modal fade" id="receive<?php echo $value->transfer_code; ?>" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Receive Transfer Code #
                    <?php echo $value->transfer_code; ?>
                </h4>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    <form action="<?php echo base_url(); ?>inventory_active/receive_transfer" method="post">
                        <div class="row">
                            <!--  -->
                            <div class="panel-body no-padding-bottom">
                                <div class="row">
                                    <div class="col-md-6 content-group">
                                    </div>

                                    <div class="col-md-6 content-group">
                                        <div class="invoice-details">
                                            <h5 class="text-uppercase text-semibold">Transfer No. #
                                                <?php echo $value->transfer_code; ?><input type="hidden" name="code"
                                                    value="<?php echo $value->transfer_code; ?>"></h5>
                                            <ul class="list-condensed list-unstyled">
                                                <li>Transfer Date: <span class="text-semibold">
                                                        <?php echo $value->date_transfer; ?></span></li>
                                                <li>
                                                    <h5>Name :
                                                        <?php echo $value->name_transfer; ?>
                                                    </h5>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-lg-9 content-group">
                                        <span class="text-muted">From Project:</span>
                                        <ul class="list-condensed list-unstyled">
                                            <?php $ffproject = $this->db->query("select project_name from project where project_id='$value->from_project'")->result(); 
                      foreach ($ffproject as $key => $ffname) { 
                          $getproj = $ffname->project_name;
                        } ?>
                                            <li>
                                                <h5>
                                                    <?php echo $getproj; ?><input type="hidden" name="fromproject"
                                                        value="<?php echo $value->from_project; ?>"> </h5>
                                            </li>
                                            <li>Remark:
                                                <?php echo $value->remark; ?>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-md-6 col-lg-3 content-group">
                                        <span class="text-muted">To Project:</span>
                                        <ul class="list-condensed list-unstyled invoice-payment-details">
                                            <?php $ttproject = $this->db->query("select project_name from project where project_id='$value->to_project'")->result(); 
                      foreach ($ttproject as $key => $ttname) { 
                        $getprojto =  $ttname->project_name;
                        }?>
                                            <li>
                                                <h5>
                                                    <?php echo $getprojto; ?><input type="hidden" name="toproject"
                                                        value="<?php echo $value->to_project; ?>"></h5>
                                            </li>
                                            <li>Address: <span class="text-semibold">
                                                    <?php echo $value->address_transfer; ?></span></li>
                                            <li>Additional message:: <span>
                                                    <?php echo $value->message; ?></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div id="modal_detail<?php echo $value->transfer_code; ?>">

                            </div>
                            <div class="row">
                                <div class="modal-footer">
                                    <?php if ($value->approve=="wait") {?>
                                    <!-- <a  href="<?php echo base_url(); ?>inventory/edit_transfer_store/<?php echo $value->transfer_code; ?>" class="btn btn-primary"> Edit</a> -->
                                    <?php }else{?>

                                    <?php } ?>
                                    <a data-dismiss="modal" class="btn btn-primary"> Close</a>
                                </div>
                            </div>
                            <!--  -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end modal -->
<script>
    $(".detail<?php echo $value->transfer_code; ?>").click(function() {
        $("#modal_detail<?php echo $value->transfer_code; ?>").html(
            "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#modal_detail<?php echo $value->transfer_code; ?>").load(
            '<?php echo base_url(); ?>inventory/load_transfer_detail/<?php echo $value->transfer_code; ?>/<?php echo $value->to_project; ?>'
        );

    });
</script>
<?php } ?>



<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js">
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js">
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js">
</script>

<!-- /core JS files -->
<script>
    $.extend($.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [{
            orderable: false,
            width: '50px',
            targets: [0]
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
    $('#materials').attr('class', 'active');
    $('#imp_sub10').attr('style', 'background-color:#dedbd8');
    $('#testq').attr('disabled', 'disabled');
</script>