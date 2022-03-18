<div class="content-wrapper">
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title">Inventory Booking</h6>
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
                                        <th>Project Code</th>
                                        <th>Project Name</th>
                                        <th>View</th>
                                        <th>Action</th>
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

                                        <?php if ($flag=="open") {
                                          $this->db->select('*');
                                          $this->db->from('store');
                                          $this->db->where('store_project', $value->project_id);
                                          $this->db->where('store_total !=', '0');
                                          // $this->db->where('status', null);
                                          $this->db->where('store.compcode', $compcode);
                                          $this->db->group_by("store_matcode");
                                          $query = $this->db->get();
                                          $result1 = $query->num_rows();
                                        ?>
                                        <td>
                                            <button data-toggle="modal" data-target="#booking<?php echo $value->project_id; ?>" class="booking<?php echo $value->project_id; ?> label label-info"> View</button>
                                            <span class="count badge bg-warning-400"><?php echo $result1; ?></span>
                                        </td>
                                        <td><a href="<?php echo base_url(); ?>inventory/booking/<?php echo $value->project_id; ?>" class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>
                                        <?php }else if ($flag=="list") {
                                          $this->db->select('');
                                          $this->db->from('ic_booking');
                                          $this->db->where('from_project', $value->project_id);
                                          $this->db->where('status', 'wait');
                                          $this->db->where('compcode', $compcode);
                                          $query = $this->db->get();
                                          $result = $query->num_rows();
                                        ?>
                                        <td>
                                            <button data-toggle="modal" data-target="#booking_all<?php echo $value->project_id; ?>" class="booking_all<?php echo $value->project_id; ?> label label-info"> View</button>
                                            <span class="count badge bg-warning-400"> <?php echo $result; ?></span>
                                        </td>
                                        <td><a href="<?php echo base_url(); ?>inventory/archive_booking_list/<?php echo $value->project_id; ?>" class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>
                                        <?php }else if ($flag=="app") { 
                                          $this->db->select('');
                                          $this->db->from('ic_booking');
                                          $this->db->where('from_project', $value->project_id);
                                          $this->db->where('approve', 'wait');
                                          $this->db->where('compcode', $compcode);
                                          $query = $this->db->get();
                                          $result = $query->num_rows();
                                        ?>
                                        <td>
                                            <button data-toggle="modal" data-target="#booking_app<?php echo $value->project_id; ?>" class="booking_app<?php echo $value->project_id; ?> label label-info">  View</button>
                                            <span class="count badge bg-warning-400"> <?php echo $result; ?></span>
                                        </td>
                                        <td>
                                        <a href="<?php echo base_url(); ?>inventory/booking_approve/<?php echo $value->project_code;?>/<?php echo $value->project_id; ?>" class="label label-primary"><i class="icon-folder-open"></i> Select</a>
                                        <!-- <a href="<?php echo base_url(); ?>inventory/approve_booking_v/<?php echo $value->project_id; ?>" class="label label-primary"><i class="icon-folder-open"></i> Select</a> -->
                                        </td>
                                    </tr>
                                    <?php } } }?>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane" id="highlighted-tab2">
                            <table class="table table-hover table-striped  table-xxs datatable-basic">
                                <thead>
                                    <tr>
                                        <th>Department Code</th>
                                        <th>Department Name</th>
                                        <th>View</th>
                                        <th>Action</th>
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

                                        <?php if ($flag=="open") {
                                          $this->db->select('*');
                                          $this->db->from('store');
                                          $this->db->where('store_project', $value->project_id);
                                          $this->db->where('store_total !=', '0');
                                          // $this->db->where('status', null);
                                          $this->db->where('store.compcode', $compcode);
                                          $this->db->group_by("store_matcode");
                                          $query = $this->db->get();
                                          $result1 = $query->num_rows();
                                        ?>
                                        <td>
                                            <button data-toggle="modal" data-target="#booking<?php echo $value->project_id; ?>"
                                                class="booking<?php echo $value->project_id; ?> label label-info">
                                                View</button>
                                            <span class="count badge bg-warning-400">
                                                <?php echo $result1; ?></span>
                                        </td>
                                        <td><a href="<?php echo base_url(); ?>inventory/booking/<?php echo $value->project_id; ?>"
                                                class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>
                                        <?php }else if ($flag=="list") {
                                          $this->db->select('');
                                          $this->db->from('ic_booking');
                                          $this->db->where('from_project', $value->project_id);
                                          $this->db->where('status', 'wait');
                                          $this->db->where('compcode', $compcode);
                                          $query = $this->db->get();
                                          $result = $query->num_rows();
                                        ?>
                                        <td>
                                            <button data-toggle="modal" data-target="#booking_all<?php echo $value->project_id; ?>"
                                                class="booking_all<?php echo $value->project_id; ?> label label-info">
                                                View</button>
                                            <span class="count badge bg-warning-400">
                                                <?php echo $result; ?></span>
                                        </td>
                                        <td><a href="<?php echo base_url(); ?>inventory/archive_booking_list/<?php echo $value->project_id; ?>"
                                                class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>
                                        <?php }else if ($flag=="app") { 
                                          $this->db->select('');
                                          $this->db->from('ic_booking');
                                          $this->db->where('from_project', $value->project_id);
                                          $this->db->where('approve', 'wait');
                                          $this->db->where('compcode', $compcode);
                                          $query = $this->db->get();
                                          $result = $query->num_rows();
                                        ?>
                                        <td>
                                            <button data-toggle="modal" data-target="#booking_app<?php echo $value->project_id; ?>"
                                                class="booking_app<?php echo $value->project_id; ?> label label-info">
                                                View</button>
                                            <span class="count badge bg-warning-400">
                                                <?php echo $result; ?></span>
                                        </td>
                                        <td>
                                        <a href="<?php echo base_url(); ?>inventory/booking_approve/<?php echo $value->project_code;?>/<?php echo $value->project_id; ?>" class="label label-primary"><i class="icon-folder-open"></i> Select</a>
                                        <!-- <a href="<?php echo base_url(); ?>inventory/approve_booking_v/<?php echo $value->project_id; ?>" class="label label-primary"><i class="icon-folder-open"></i> Select</a> -->
                                        </td>
                                    </tr>
                                    <?php } } }?>
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
<?php 
foreach ($getproj as $value) {
 ?>
<!-- modal  เนเธเธฃเธเธเธฒเธฃ-->
<div class="modal fade" id="booking<?php echo $value->project_id; ?>" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">View Stock
                    <?php echo $value->project_name; ?>
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

<!-- modal  เนเธเธฃเธเธเธฒเธฃ-->
<div class="modal fade" id="booking_all<?php echo $value->project_id; ?>" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">View Booking
                    <?php echo $value->project_id; ?>
                </h4>
            </div>
            <div class="modal-body">
                <div id="modal_detail_all<?php echo $value->project_id; ?>">
                </div>
            </div>
        </div>
    </div>
</div>
<!--end modal -->
<script>
    $(".booking<?php echo $value->project_id; ?>").click(function() {
        $("#modal_detail<?php echo $value->project_id; ?>").html(
            "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#modal_detail<?php echo $value->project_id; ?>").load(
            '<?php echo base_url(); ?>inventory/view_unbooking/<?php echo $value->project_id; ?>');
    });

    $(".booking_all<?php echo $value->project_id; ?>").click(function() {
        $("#modal_detail_all<?php echo $value->project_id; ?>").html(
            "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#modal_detail_all<?php echo $value->project_id; ?>").load(
            '<?php echo base_url(); ?>inventory/view_unbooking_all/<?php echo $value->project_id; ?>');
    });
</script>
<?php } ?>


<!-- /core JS files -->
<script>
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
    $('.datatable-basic').DataTable();


    var seg = '<?=$this->uri->segment(3);?>';


    if (seg == 'open') {
        $('#imp').attr('class', 'active');
        $('#reservation').attr('class', 'active');
        $('#imp_sub5').attr('style', 'background-color:#dedbd8');
    } else if (seg == 'app') {
        $('#imp').attr('class', 'active');
        $('#reservation').attr('class', 'active');
        $('#imp_sub13').attr('style', 'background-color:#dedbd8');
    }
</script>