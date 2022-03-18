<!-- Main content  trans-->
<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <div class="form-horizontal">
                    <table class="table table-hover table-striped table-xxs basic" id="tbTender">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Code</th>
                                <th>BOM Description</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$i = 0;
foreach ( $bom_header as $key => $data ) {
 $i++
 ?>
                            <tr code="<?=$data['bom_code']?>">
                                <td>
                                    <?=$i?>
                                </td>
                                <td>
                                    <?=$data['bom_code']?>
                                </td>
                                <td>
                                    <?=$data['bom_descrip']?>
                                </td>
                                <td class="text-center">
                                    <a class="view"><i class="icon-folder-open"></i></a>
                                    <a href="<?php echo base_url(); ?>bd/edit_bom/<?=$data['bom_code']?>"><i class="icon-pencil7"></i></a>
                                </td>
                            </tr>
                            <?php
}
?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- /content area -->
</div>
<!-- /main content -->

<div id="Modal_bom" class="modal fade" role="dialog">
    <div class="modal-dialog modal-full">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">BOM</h4>
            </div>
            <div class="modal-body" id="content_modal">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>



<script type="text/javascript">
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
    $('.view').click(function(event) {
        var bom_code = $(this).parent().parent().attr('code');
        $.post('<?php echo base_url(); ?>bd/show_conten_bom', {
            code: bom_code
        }, function() {}).done(function(data) {
            $('#content_modal').html(data);
            $('#Modal_bom').modal('show');
        });
    });

    $('body').attr('class', 'navbar-top pace-done');


    $('#bom').attr('class', 'active');
    $('#archive-bom').attr('style', 'background-color:#dedbd8');
</script>