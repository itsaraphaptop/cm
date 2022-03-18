<!-- <div class="content-wrapper">
 -->
<!-- Highlighting rows and columns -->
<div class="col-xs-12">
    <table class="table basic table-hover table-striped no-footer table-xxs">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Tender No :</th>
                <th class="text-center">Project Name</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
									$i= 1;
									foreach ($project_bd as $key => $value) {
								?>

            <tr>
                <td class="text-center">
                    <?=$i;?>
                </td>
                <td>
                    <?=$value['bd_tenid'];?>
                </td>
                <td>
                    <?=$value['bd_pname'];?>
                </td>
                <td class="text-center">
                    <?php
											if($value['bd_bdstats']==1){
										echo "In Process";
										}else if($value['bd_bdstats']==2){
										echo "Wait";
										}else if($value['bd_bdstats']==3){
										echo "Reject Join Bid";
										} ?>
                </td>
                <?php
										$this->db->select('project_id');
										$this->db->from('project');
										$this->db->where('bd_tenid', $value['bd_tenid']);
										$queryk = $this->db->get()->result();
										$project_id=0;
										foreach ($queryk as $pjj ) {
											$project_id = $pjj->project_id;
										}
									?>
                <td class="text-center">
                    <!-- <a href="<?php echo base_url(); ?>management/vrpb/<?=$value['bd_tenid'];?>/p" class="label label-primary label-xxs"> -->
                    <a href="<?php echo base_url(); ?>management/revise_boq/<?=$value['bd_tenid'];?>/p" class="label label-primary label-xxs">
                        <i class="icon-folder-open"></i> Select</a>
                </td>
            </tr>
            <?php
								$i++; ?>

            <?php } ?>

        </tbody>
    </table>
</div>
<!-- </div>
 -->


<!-- /core JS files -->
<script>
    $.extend($.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [{
            orderable: false,
            width: '100px',
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
    $('.basic').DataTable();
    $('#mg').attr('class', 'active');
    $('#mc4').attr('style', 'background-color:#dedbd8');
</script>