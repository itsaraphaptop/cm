<div class="content-wrapper">
    <div class="content">
        <div class="panel panel-flat">
            <?php 

            if ($chk_type == "p") {
                ?>
            <div class="panel-body">
                <div class="container-fluid">
                    <label>Filter: </label>
                    <button class="label label-info" id="all"> ALL</button>
                    <!-- <button class="label label-warning" id="wait">Waiting</button> -->
                    <button class="label label-warning" id="some"> Get Some</button>
                    <button class="label label-success" id="reall">Full</button>
                </div>

                <script>
                    $("#all").click(function() {
                        $(".loadtable").html(
                            "<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
                        $(".loadtable").load(
                            '<?php echo base_url(); ?>inventory/receive_load/<?php echo $iid; ?>/all');
                    });
                    $("#wait").click(function() {
                        $(".loadtable").html(
                            "<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
                        $(".loadtable").load(
                            '<?php echo base_url(); ?>inventory/receive_load/<?php echo $iid; ?>/wait');
                    });
                    $("#some").click(function() {
                        $(".loadtable").html(
                            "<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
                        $(".loadtable").load(
                            '<?php echo base_url(); ?>inventory/receive_load/<?php echo $iid; ?>/some');
                    });
                    $("#reall").click(function() {
                        $(".loadtable").html(
                            "<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
                        $(".loadtable").load(
                            '<?php echo base_url(); ?>inventory/receive_load/<?php echo $iid; ?>/reall');
                    });
                </script>

            </div>

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
                                <!-- <?php echo $key->po_project; ?> -->
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
                                <?php if ($key->po_project == "") { ?>
                                <?php 
                                if ($key->ic_status == "full") { ?>
                                <td><span class="label label-success">Full</span></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>inventory/archive_receive_po/<?php echo $key->po_pono; ?>/<?php echo $key->po_department; ?>/d"
                                        class="label label-info label-xs" disabled="true"><span class="glyphicon glyphicon-eye-open"
                                            aria-hidden="true"></span> OPEN</a>
                                    <a href="<?php echo base_url(); ?>inventory/archive_receive_po/<?php echo $key->po_pono; ?>/<?php echo $key->po_department; ?>/d"
                                        class="label label-warning label-xs" disabled="true"><span class="glyphicon glyphicon-open"
                                            aria-hidden="true"></span> RETURN</a>
                                </td>
                                <?php

                            } else { ?>
                                <td><span class="label label-warning">Get some</span></td>
                                <td><a href="<?php echo base_url(); ?>inventory/receive_header/<?php echo $key->po_pono; ?>/<?php echo $key->po_department; ?>/d"
                                        class="preload label label-primary label-xs"><span class="glyphicon glyphicon-save"
                                            aria-hidden="true"></span> Receive</a>
                                    <a href="<?php echo base_url(); ?>inventory/archive_receive_po/<?php echo $key->po_pono; ?>/<?php echo $key->po_department; ?>/d"
                                        class="label label-warning label-xs" disabled="true"><span class="glyphicon glyphicon-open"
                                            aria-hidden="true"></span> RETURN</a> </td>
                                <?php 
                            } ?>
                                <?php 
                            } else { ?>
                                <?php 
                                if ($key->ic_status == "full") { ?>
                                <td><span class="label label-success">Full</span></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>inventory/archive_receive_po/<?php echo $key->po_pono; ?>/<?php echo $key->po_project; ?>/p"
                                        class="label label-info label-xs" disabled="true"><span class="glyphicon glyphicon-eye-open"
                                            aria-hidden="true"></span> OPEN</a>
                                    <a href="<?php echo base_url(); ?>inventory/archive_receive_po/<?php echo $key->po_pono; ?>/<?php echo $key->po_project; ?>/p"
                                        class="label label-warning label-xs" disabled="true"><span class="glyphicon glyphicon-open"
                                            aria-hidden="true"></span> RETURN</a>
                                </td>
                                <?php

                            } else { ?>
                                <td><span class="label label-warning">Get some</span></td>
                                <td><a href="<?php echo base_url(); ?>inventory/receive_header/<?php echo $key->po_pono; ?>/<?php echo $key->po_project; ?>/p"
                                        class="preload label label-primary label-xs"><span class="glyphicon glyphicon-save"
                                            aria-hidden="true"></span> Receive</a>
                                    <a href="<?php echo base_url(); ?>inventory/archive_receive_po/<?php echo $key->po_pono; ?>/<?php echo $key->po_project; ?>/p"
                                        class="label label-warning label-xs" disabled="true"><span class="glyphicon glyphicon-open"
                                            aria-hidden="true"></span> RETURN</a> </td>
                                <?php 
                            } ?>
                                <?php 
                            } ?>
                            </tr>
                            <?php	
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php

        } else {
            ?>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-xs datatable-basics">
                        <thead>
                            <tr>
                                <th class="text-center" width="13%">Receive No</th>
                                <th class="text-center" width="13%">Requestor</th>
                                <th class="text-left" width="20%">Department Name</th>
                                <th class="text-left" width="20%">Seller / Vender</th>
                                <th class="text-center" width="10%">Status</th>
                                <th class="text-center" width="17%">Avtive</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($open as $dep_i => $dep_d) {
                                ?>
                            <tr>
                                <td>
                                    <?= $dep_d->po_pono ?>
                                </td>
                                <td>
                                    <?= $dep_d->po_prname ?>
                                </td>
                                <td>
                                    <?= $dep_d->department_title ?>
                                </td>
                                <td>
                                    <?= $dep_d->po_vender ?>
                                </td>
                                <td>
                                    <?php
                                    if ($dep_d->ic_status == "wait") {
                                        ?>
                                    <button class="label label-warning" id="wait"> Waiting</button>
                                    <?php

                                } elseif ($dep_d->ic_status == "open") {
                                    ?>
                                    <button class="label label-info" id="some"> Get some</button>
                                    <?php

                                } else {
                                    ?>
                                    <button class="label label-success" id="reall">Full</button>
                                    <?php

                                }
                                ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>inventory/receive_header/<?php echo $dep_d->po_pono; ?>/<?php echo $dep_d->department_id; ?>/d"
                                        class="preload label label-primary label-xs">
                                        <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Receive
                                    </a>
                                    <a href="" class="label label-warning label-xs" disabled="true">
                                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span> RETURN
                                    </a>
                                </td>
                            </tr>

                            <?php

                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php

        }

        ?>


        </div>
    </div>


    <div class="footer text-muted">
        © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
    </div>
    <!-- /footer -->
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js">
</script>
<script>
    $('#imp').attr('class', 'active');
    $('#imp_sub1').attr('style', 'background-color:#dedbd8');
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


    $('#imp').attr('class', 'active');
    $('#goods_receive').attr('class', 'active');
    $('#imp_sub1').attr('style', 'background-color:#dedbd8');
</script>