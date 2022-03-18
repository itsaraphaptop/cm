
<table class="table table-xxs table-hover" id="docstart">

    <thead>
    <tr>
        <th>No.</th>
        <th>เอกที่เอกสาร</th>
        
        <th width="5%">จัดการ</th>
    </tr>
    </thead>
    <tbody>
    <?php   $n =1;  ?>
    <?php foreach ($getproj['pr'] as $valj){ ?>
        <tr>
            <td><?=$n ?></td>
            <td><?=$valj->pr_prno ?></td>
            
            <td><button class="btn_report btn btn-xs btn-block btn-primary" pr_no="<?=$valj->pr_prno ?>">เลือก</button></td>
        </tr>
        <?php $n++;} ?>
    <?php foreach ($getproj['pc'] as $valj){ ?>
        <tr>
            <td><?=$n ?></td>
            <td><?=$valj->docno ?></td>
            <td><button class="btn_report btn btn-xs btn-block btn-info" pr_no="<?=$valj->docno ?>">เลือก</button></td>
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
         dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',

     });
      $('#docstart').DataTable();
    </script>
    <script>
            var target = '<?=$_POST['target'] ?>';
            $(".btn_report").click(function(){
                var pr_no = $(this).attr('pr_no');

                $(target).val(pr_no);
                //alert(terget)
                $("#opendocs").modal('toggle');
            })
    </script>