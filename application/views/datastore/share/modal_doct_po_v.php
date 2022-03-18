
<table class="table table-xxs table-hover" id="docstart">

    <thead>
    <tr>
        <th>No.</th>
        <th>Project Code</th>

        <th width="5%">Active</th>
    </tr>
    </thead>
    <tbody>

    <?php   $n =1;?>
    <?php foreach ($getproj as $valj){ ?>
        <tr>
            <td><?=$n ?></td>
            <td><?=$valj->po_pono ?></td>

            <td><button class="btn_report btn btn-xs btn-block btn-primary" po_no="<?=$valj->po_pono ?>">SELECT</button></td>
        </tr>

        <?php $n++; } ?>
    </tbody>
    </table>
    <script>
    $.extend( $.fn.dataTable.defaults, {
         autoWidth: false,
         columnDefs: [{
             orderable: false,
             width: '100px',
             targets: [ 2 ]
         }],
         dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>'

     });
      $('#docstart').DataTable();
    </script>
    <script>
            var target = '<?=$_POST['target'] ?>';
            $(".btn_report").click(function(){
                var po_no = $(this).attr('po_no');

                $(target).val(po_no);
                //alert(terget)
                $("#opendocs").modal('toggle');
            })
    </script>