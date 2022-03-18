<div class="loadtable dataTables_wrapper no-footer">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-xs datatable-basics">
            <thead>
                <tr>
                    <th class="text-center" width="13%">Receive No.</th>
                    <th class="text-center" width="13%">Requestor</th>
                    <th class="text-left" width="20%">Project Name</th>
                    <th class="text-left" width="20%">Seller / Vender</th>
                    <th class="text-center" width="10%">Status</th>
                    <th class="text-center" width="17%">Active</th>
                </tr>
            </thead>
            <tbody id="fbody">
                <tr>
                    <?php 
		          			foreach ($open as $key) { ?>
                    <td>
                        <?php echo $key->po_pono; ?>
                    </td>
                    <td>
                        <?php echo $key->po_prname; ?>
                    </td>
                    <td>
                        <?php echo $key->project_name; ?>
                        <?php echo $key->department_title; ?>
                    </td>
                    <td>
                        <?php echo $key->po_vender; ?>
                    </td>
                    <?php 
		          				if ($key->ic_status == "full") {
		          				?>
                    <td><span class="label label-success">Full</span></td>
                    <td>
                        <a href="<?php echo base_url(); ?>inventory/archive_receive_po/<?php echo $key->po_pono;?>/<?php echo $key->po_department; ?>/p"
                            class="label label-info label-xs" disabled="true"><span class="glyphicon glyphicon-eye-open"
                                aria-hidden="true"></span> OPEN</a>
                        <a href="<?php echo base_url(); ?>inventory/archive_receive_po/<?php echo $key->po_pono;?>/<?php echo $key->po_department; ?>/p"
                            class="label label-warning label-xs" disabled="true"><span class="glyphicon glyphicon-open"
                                aria-hidden="true"></span> RETURN</a>
                    </td>
                    <?php
		          				}else{ ?>
                    <td><span class="label label-warning">Get Some</span></td>
                    <td><a href="<?php echo base_url(); ?>index.php/inventory/receive_header/<?php echo $key->po_pono; ?>/<?php echo $key->po_project; ?>/p"
                            class="preload label label-primary label-xs"><span class="glyphicon glyphicon-save"
                                aria-hidden="true"></span> Receive</a>
                        <a href="<?php echo base_url(); ?>inventory/archive_receive_po/<?php echo $key->po_pono;?>/<?php echo $key->po_project; ?>/p"
                            class="label label-warning label-xs" disabled="true"><span class="glyphicon glyphicon-open"
                                aria-hidden="true"></span> RETURN</a> </td>
                    <?php } ?>
                </tr>
                <?php	}
		          		 ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js">
</script>
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