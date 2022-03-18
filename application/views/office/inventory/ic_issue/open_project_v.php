<!-- Main content  trans-->
<div class="content-wrapper">
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Inventory Issue</h5>
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
                                        <th>View</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ( $getproj as $key => $value ) {
 $this->db->select( '*' );
 $this->db->where( 'from_project', $value->project_id );
 $this->db->where( 'approve', "approve" );
 $this->db->where( 'status', "wait" );
 $this->db->where( 'type_ic', "issue" );
 $q      = $this->db->get( 'ic_booking' );
 $result = $q->num_rows();
 if ( $value->project_department == 1 ) {
  ?>
                                    <tr>
                                        <td>
                                            <?php echo $value->project_code; ?>
                                        </td>
                                        <td>
                                            <?php echo $value->project_name; ?>
                                        </td>
                                        <td>
                                            <button data-toggle="modal" data-target="#booking<?php echo $value->project_id; ?>"
                                                class="booking<?php echo $value->project_id; ?> label label-info"> View</button>
                                            <span class="count badge bg-warning-400">
                                                <?php echo $result; ?></span>
                                        </td>
                                        <td><a href="<?php echo base_url(); ?>inventory/new_doc_issue/<?php echo $value->project_id; ?>"
                                                class="preload label label-primary" data-popup="tooltip" title=""
                                                data-original-title="">Select</a></td>
                                    </tr>
                                    <?php }}?>
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
                                    <?php foreach ( $getproj as $key => $value ) {
 $this->db->select( '*' );
 $this->db->where( 'from_project', $value->project_id );
 $this->db->where( 'approve', "approve" );
 $this->db->where( 'status', "wait" );
 $q      = $this->db->get( 'ic_booking' );
 $result = $q->num_rows();
 if ( $value->project_department == 2 ) {
  ?>
                                    <tr>
                                        <td>
                                            <?php echo $value->project_code; ?>
                                        </td>
                                        <td>
                                            <?php echo $value->project_name; ?>
                                        </td>
                                        <td>
                                            <button data-toggle="modal" data-target="#booking<?php echo $value->project_id; ?>"
                                                class="booking<?php echo $value->project_id; ?> label label-info"> View</button>
                                            <span class="count badge bg-warning-400">
                                                <?php echo $result; ?></span>
                                        </td>
                                        <td><a href="<?php echo base_url(); ?>inventory/new_doc_issue/<?php echo $value->project_id; ?>"
                                                class="preload label label-primary" data-popup="tooltip" title=""
                                                data-original-title="">Select</a></td>
                                    </tr>
                                    <?php }}?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>























<!-- Content area -->



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

    $('#imp').attr('class', 'active');
    $('#issue').attr('class', 'active');
    $('#imp_sub7').attr('style', 'background-color:#dedbd8');
</script>