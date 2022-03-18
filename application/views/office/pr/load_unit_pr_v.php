<table id="dataunit" class="table table-striped table-xxs datatable-basic" >
    <thead>
        <tr>
            <th>No.</th>
            <th>หน่วย</th>
            <th width="5%">จัดการ</th>
        </tr>
    </thead>
    <tbody>
        <?php $nb = 1;?>
        <?php foreach ($getunit as $valj) { ?>
        <tr>
            <td><?php echo $nb; ?></td>
            <td><?php echo $valj->unit_name; ?></td>
            <td><button class="openunddd<?php echo $nb; ?> btn btn-xs btn-block btn-info" data-toggle="modal" data-vunitcode="<?php echo $valj->unit_code; ?>"  data-vunit="<?php echo $valj->unit_name; ?>" data-dismiss="modal">เลือก</button></td>
        </tr>
        <script>
        $(".openunddd<?php echo $nb; ?>").click(function(event) {
        // $("#unit").val($(this).data('vunit'));
        $("#unitcode<?php echo $pritemid;?>").val($(this).data('vunitcode'));
        $("#unit<?php echo $pritemid;?>").val($(this).data('vunit'));
        });
        </script>
        <?php $nb++;}?>
    </tbody>
</table>

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
</script>