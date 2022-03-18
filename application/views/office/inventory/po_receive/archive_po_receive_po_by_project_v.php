<!-- Main content -->
<div class="content-wrapper">

    <div class="content">
        <!-- Highlighting rows and columns -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Archive IC Reiceive</h5>
                <h5 class="panel-title">Project (
                    <?php echo $projectsegment; ?>)
                    <?php echo $projname; ?>
                </h5>
            </div>
            <div class="panel-body">

            </div>
            <div class="dataTables_wrapper no-footer">
                <div class="table-responsive">
                    <table class="table table-striped table-xxs table-hover datatable-basics">
                        <thead>
                            <tr>
                                <th class="text-center">Receive No.</th>
                                <th class="text-center">Receive Date</th>
                                <th class="text-center">Invoice No.</th>
                                <th class="text-center">Invoice Date:</th>
                                <th class="text-center">Delivery No.</th>
                                <th class="text-center">Seller / Vender</th>
                                <th class="text-center">Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $n=1; foreach ($res as $v) {?>
                            <tr class="text-center">
                                <td>
                                    <?php echo $v->po_reccode; ?>
                                </td>
                                <td>
                                    <?php echo $v->po_recdate; ?>
                                </td>
                                <td>
                                    <?php echo $v->taxno; ?>
                                </td>
                                <td>
                                    <?php echo $v->taxdate; ?>
                                </td>
                                <td>
                                    <?php echo $v->docode ?>
                                </td>
                                <td>
                                    <?php echo $v->vendername; ?>
                                </td>
                                <td>
                                    <a data-toggle="modal" data-target="#open<?php echo $v->po_reccode;?>" name="button"><i
                                            class="icon-folder-open"></i></a>
                                    <!-- <a href="<?php echo base_url(); ?>inventory/edit_receive_po_header/<?php echo $v->po_reccode;  ?>/<?php echo $v->po_pono; ?>/e"  class="label label-warning label-xs" name="button">แก้ไข</a> -->
                                    <!-- <a href="<?php echo base_url(); ?>inventory/print_inventory/<?php echo $v->po_reccode; ?>/<?php echo $v->po_pono;  ?>"  class="label label-info label-xs" name="button">พิมพ์</a> -->
                                    <!-- <a href="<?php echo base_url(); ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=receipt.mrt&doccode=<?php echo $v->po_reccode; ?>&compcode=<?php echo $compcode;?>"
                                        target="_blank" name="button"><i class=" icon-printer4"></i> </a> -->
                                    <a href="<?php echo base_url(); ?>report/viewerload?type=ic&typ=receipt&var1=<?php echo $v->po_reccode; ?>&var2=<?php echo $compcode;?>"
                                        target="_blank" name="button"><i class=" icon-printer4"></i> </a>

                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /highlighting rows and columns -->


    </div>
    <!-- /content area -->
    <!-- Footer -->

    <!-- /footer -->
</div>
<!-- /Main content -->
<?php $n=1; foreach ($res as $v) {?>
<div id="open<?php echo $v->po_reccode;?>" class="modal fade" data-backdrop="false">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Receive No.
                    <?php echo $v->po_reccode; ?>
                </h5>
            </div>

            <div class="modal-body">
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Receive No.:
                                <?php echo $v->po_reccode; ?></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Receive Date :
                                <?php echo $v->po_recdate; ?></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Invoice No.:
                                <?php echo $v->taxno; ?></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Invoice Date :
                                <?php echo $v->taxdate; ?></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Delivery No. :
                                <?php echo $v->docode; ?></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Seller / Vender:
                                <?php echo $v->vendername; ?></label>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-xxs table-hover">
                <thead>
                    <tr>
                        <th width="10%">No.</th>
                        <th width="20%">Material Code</th>
                        <th>Material Name</th>
                        <th> Cost Code</th>
                        <th>Cost Name</th>
                        <th width="10%">QTY</th>
                        <th width="10%">Unit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $q = $this->db->query("select * from receive_poitem where poi_ref='$v->po_reccode'");
								$resi = $q->result(); $o=1;
								 foreach ($resi as $key => $value) {?>
                    <tr>
                        <td>
                            <?php echo $o; ?>
                        </td>
                        <td>
                            <?php echo $value->poi_matcode; ?>
                        </td>
                        <td>
                            <?php echo $value->poi_matname; ?>
                        </td>
                        <td>
                            <?php echo $value->poi_costcode; ?>
                        </td>
                        <td>
                            <?php echo $value->poi_costname; ?>
                        </td>
                        <td>
                            <?php echo $value->poi_qty; ?>
                        </td>
                        <td>
                            <?php echo $value->poi_unit; ?>
                        </td>
                    </tr>
                    <?php $o++; } ?>
                </tbody>
            </table>
            <div class="modal-footer">
                <br>
                <a type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2"></i> Close</a>
                <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
            </div>
        </div>
    </div>
</div>

<?php $n++; } ?>
<script>
    $('[data-popup="tooltip"]').tooltip();

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

    $('.datatable-basics').DataTable();
</script>