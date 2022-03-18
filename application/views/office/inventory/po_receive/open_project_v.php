<div class="content-wrapper">

    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Select Project And Department</h5>
                <div class="heading-elements">

                </div>
            </div>
            <div class="panel-body">
                <div class="tabbable">
                    <ul class="nav nav-tabs nav-tabs-component">
                        <li class="active"><a href="#bottom-tab1" data-toggle="tab">Project</a></li>
                        <li><a href="#bottom-tab2" data-toggle="tab">Department</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="bottom-tab1">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-xs datatable-basicc">
                                    <thead>
                                        <tr>
                                            <th width="15%" class="text-center">Project Code</th>
                                            <th>Project Name</th>
                                            <th>View</th>
                                            <th width="10%" class="text-center">Active</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                    foreach ($getproj as $val) {
                        // $this->db->select('');
                       //  $this->db->where('po_project',$val->project_id);
                       //  $this->db->where('ic_status !=',"full");
                       //  $query = $this->db->get('po');
                       //  $result = $query->num_rows();


                      ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo $val->project_code;?>
                                            </td>
                                            <td>
                                                <?php echo $val->project_name;?>
                                            </td>
                                            <?php if ($open=='n') {
                                    $this->db->select('');
                                    $this->db->where('compcode',$compcode);
                              $this->db->where('project',$val->project_id);
                              $this->db->where('ic_status',"open");
                              $this->db->where('return',null);
                              $query = $this->db->get('receive_po');
                              $result = $query->num_rows();
                                  ?>
                                            <td>
                                                <button data-toggle="modal" data-target="#receive_n<?php echo $val->project_id; ?>"
                                                    class="detail_n<?php echo $val->project_id; ?> label label-info">
                                                    View</button>
                                                <span class="count badge bg-warning-400">
                                                    <?php echo $result; ?></span>
                                            </td>

                                            <td><a href="<?php echo base_url(); ?>inventory/receive_po_header/<?php echo $val->project_code; ?>/<?php echo $val->project_id; ?>"
                                                    class="preload label label-primary label-block" data-popup="tooltip"
                                                    title="" data-original-title="เปิด"><i class="icon-folder-open2"></i>
                                                    OPEN</a></td>

                                            <?php }elseif($open=='a'){ 
                                    $this->db->select('');
                                    $this->db->where('compcode',$compcode);
                              $this->db->where('project',$val->project_id);
                              // $this->db->where('ic_status',"open");
                              $query = $this->db->get('po_receive');
                              $result = $query->num_rows();
                                  ?>
                                            <td>
                                                <button data-toggle="modal" data-target="#receive_a<?php echo $val->project_id; ?>"
                                                    class="detail_a<?php echo $val->project_id; ?> label label-info">
                                                    View</button>
                                                <span class="count badge bg-warning-400">
                                                    <?php echo $result; ?></span>
                                            </td>

                                            <td><a href="<?php echo base_url(); ?>inventory/archive_po_receive_in_ic/<?php echo $val->project_code; ?>/<?php echo $val->project_id; ?>"
                                                    class="preload label label-primary label-block" data-popup="tooltip"
                                                    title="" data-original-title="เปิด"><i class="icon-folder-open2"></i>
                                                    OPEN</a></td>

                                            <?php }elseif($open=='po'){ 
                                  $this->db->select('');
                                  $this->db->where('compcode',$compcode);
                              $this->db->where('po_project',$val->project_id);
                              $this->db->where('ic_status !=',"full");
                              $this->db->where('po_approve',"approve");
                              $query = $this->db->get('po');
                              $result = $query->num_rows(); ?>
                                            <td>
                                                <button data-toggle="modal" data-target="#receive<?php echo $val->project_id; ?>"
                                                    class="detail<?php echo $val->project_id; ?> label label-info">
                                                    View</button>
                                                <span class="count badge bg-warning-400">
                                                    <?php echo $result; ?></span>
                                            </td>

                                            <td><a href="<?php echo base_url(); ?>inventory/receive_po_list/<?php echo $val->project_code; ?>/<?php echo $val->project_id; ?>/p"
                                                    class="preload label label-primary label-block" data-popup="tooltip"
                                                    title="" data-original-title="เปิด"><i class="icon-folder-open2"></i>
                                                    OPEN</a></td>

                                            <?php }elseif($open=='archivepo'){ 
                    $this->db->select('');
                                  $this->db->where('compcode',$compcode);
                            $this->db->where('project',$val->project_id);
                            $this->db->where('return',null);
                            $query = $this->db->get('receive_po');
                            $result = $query->num_rows(); ?>
                                            <td>
                                                <button data-toggle="modal" data-target="#receive_ar<?php echo $val->project_id; ?>"
                                                    class="detail_ar<?php echo $val->project_id; ?> label label-info">
                                                    View</button>
                                                <span class="count badge bg-warning-400">
                                                    <?php echo $result; ?></span>
                                            </td>
                                            <td><a href="<?php echo base_url(); ?>inventory/archive_po_project/<?php echo $val->project_code; ?>/<?php echo $val->project_id; ?>"
                                                    class="preload label label-primary label-block" data-popup="tooltip"
                                                    title="" data-original-title="เปิด"><i class="icon-folder-open2"></i>
                                                    OPEN</a></td>

                                            <?php } ?>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="bottom-tab2">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-xs datatable-basicc">
                                    <thead>
                                        <tr>
                                            <th>Department Code</th>
                                            <th>Department Name</th>
                                            <th>View</th>
                                            <th width="10%" class="text-center">เปิด</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                        foreach ($getdep as $dep_i => $dep_d) {
                           $this->db->where('compcode',$compcode);
                            $this->db->where('project',$dep_d->project_id);
                            $this->db->where('return',null);
                            $query = $this->db->get('receive_po');
                            $result = $query->num_rows(); ?>

                                        <tr>
                                            <td>
                                                <?php echo $dep_d->project_code; ?>
                                            </td>
                                            <td>
                                                <?php echo $dep_d->project_name; ?>
                                            </td>
                                            <td>
                                                <button data-toggle="modal" data-target="#receive_ard<?php echo $val->project_id; ?>"
                                                    class="detail_ar<?php echo $val->project_id; ?> label label-info">
                                                    View</button>
                                                <span class="count badge bg-warning-400">
                                                    <?php echo $result; ?></span>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>inventory/archive_po_receive_in_ic/<?php echo $dep_d->project_code; ?>/<?php echo $dep_d->project_id; ?>"
                                                    class="preload label label-primary label-block" data-popup="tooltip"
                                                    title="" data-original-title="เปิด"><i class="icon-folder-open2"></i>
                                                    OPEN</a>
                                            </td>
                                        </tr>

                                        <?php
                        }
                      ?>
                                    </tbody>
                                </table>
                            </div>

                            <?php
                    // var_dump($getdep);
                  ?>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php 
foreach ($getproj as $value) {
 ?>
<!-- modal  โครงการ-->
<div class="modal fade" id="receive<?php echo $value->project_id; ?>" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Receive Transfer Code #
                    <?php echo $value->project_id; ?>
                </h4>
            </div>
            <div class="modal-body">
                <div id="modal_detail<?php echo $value->project_id; ?>">
                </div>
            </div>
        </div>
    </div>
</div>
<!--end modal -->

<!-- modal  โครงการ-->
<div class="modal fade" id="receive_n<?php echo $value->project_id; ?>" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Receive Transfer Code #
                    <?php echo $value->project_id; ?>
                </h4>
            </div>
            <div class="modal-body">
                <div id="modal_detail_n<?php echo $value->project_id; ?>">
                </div>
            </div>
        </div>
    </div>
</div>
<!--end modal -->

<!-- modal  โครงการ-->
<div class="modal fade" id="receive_a<?php echo $value->project_id; ?>" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Receive Transfer Code #
                    <?php echo $value->project_id; ?>
                </h4>
            </div>
            <div class="modal-body">
                <div id="modal_archive_po<?php echo $value->project_id; ?>">
                </div>
            </div>
        </div>
    </div>
</div>
<!--end modal -->

<!-- modal  โครงการ-->
<div class="modal fade" id="receive_ar<?php echo $value->project_id; ?>" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Receive Transfer Code #
                    <?php echo $value->project_id; ?>
                </h4>
            </div>
            <div class="modal-body">
                <div id="modal_archive_ar<?php echo $value->project_id; ?>">
                </div>
            </div>
        </div>
    </div>
</div>
<!--end modal -->

<script>
    // ของรับของ po
    $(".detail<?php echo $value->project_id; ?>").click(function() {
        $("#modal_detail<?php echo $value->project_id; ?>").html(
            "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#modal_detail<?php echo $value->project_id; ?>").load(
            '<?php echo base_url(); ?>inventory/view_receive_po/<?php echo $value->project_id; ?>');
    });
    // ขอรับของ IC
    $(".detail_n<?php echo $value->project_id; ?>").click(function() {
        $("#modal_detail_n<?php echo $value->project_id; ?>").html(
            "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#modal_detail_n<?php echo $value->project_id; ?>").load(
            '<?php echo base_url(); ?>inventory/view_receive_ic/<?php echo $value->project_id; ?>');
    });
    // รายการขอรับของ modal_archive_po
    $(".detail_a<?php echo $value->project_id; ?>").click(function() {
        $("#modal_archive_po<?php echo $value->project_id; ?>").html(
            "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#modal_archive_po<?php echo $value->project_id; ?>").load(
            '<?php echo base_url(); ?>inventory/modal_archive_po/<?php echo $value->project_id; ?>');
    });
    // รายการขอรับของ modal_archive_po
    $(".detail_ar<?php echo $value->project_id; ?>").click(function() {
        $("#modal_archive_ar<?php echo $value->project_id; ?>").html(
            "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#modal_archive_ar<?php echo $value->project_id; ?>").load(
            '<?php echo base_url(); ?>inventory/modal_archive/<?php echo $value->project_id; ?>');
    });
</script>
<?php  } ?>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js">
</script>

<!-- /core JS files -->
<script>
    var seg = '<?=$this->uri->segment(3);?>';
    $.extend($.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [{
            orderable: false,
            width: '150px',
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
    $('.datatable-basicc').DataTable();
    if (seg == 'po') {
        $('#imp').attr('class', 'active');
        $('#goods_receive').attr('class', 'active');
        $('#imp_sub1').attr('style', 'background-color:#dedbd8');
    } else if (seg == 'archivepo') {
        $('#imp').attr('class', 'active');
        $('#goods_receive').attr('class', 'active');
        $('#imp_sub2').attr('style', 'background-color:#dedbd8');
    } else if (seg == 'n') {
        $('#imp').attr('class', 'active');
        $('#inventory_receive').attr('class', 'active');
        $('#imp_sub3').attr('style', 'background-color:#dedbd8');
    } else if (seg == 'a') {
        $('#imp').attr('class', 'active');
        $('#inventory_receive').attr('class', 'active');
        $('#imp_sub4').attr('style', 'background-color:#dedbd8');
    }
</script>