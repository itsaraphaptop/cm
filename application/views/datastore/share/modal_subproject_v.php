<table class="table table-xxs table-hover" id="tbpro">
      <thead>
        <tr>
          <th>No.</th>
          <th>Project Code</th>
          <th>Project Name</th>
          <th width="5%">Active</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php foreach ($getproj as $valj){ ?>
        <tr>
         <th scope="row"><?php echo $n;?></th>
         <td><?php echo $valj->project_code; ?></td>
          <td><?php echo $valj->project_name; ?></td>
            <td><button class="openproj<?php echo $n;?> btn btn-xs btn-block btn-primary" 
            data-toggle="modal" 
            data-projectcode<?php echo $n;?>="<?php echo $valj->project_code ?>"  
            data-projid<?php echo $n;?>="<?php echo $valj->project_id;?>" 
            data-projname<?php echo $n;?>="<?php echo $valj->project_name;?>" 
            data-bnameth<?php echo $n;?>="<?php echo $valj->project_bnameth;?>" 
            data-vat<?php echo $n;?>="<?php echo $valj->project_vat;?>" 
            data-wt<?php echo $n;?>="<?php echo $valj->project_wt;?>"
            data-cname<?php echo $n;?>="<?php echo $valj->project_cname;?>" 
            data-vat<?=$n;?>="<?php echo $valj->project_vat;?>" 
            data-avance<?php echo $n;?>="<?php echo $valj->project_advance_1;?>" 
            data-retention<?php echo $n;?>="<?php echo $valj->project_lessretention;?>" 
            data-projectwt<?php echo $n;?>="<?php echo $valj->project_wt;?>"
            data-dismiss="modal">SELECT</button></td>
        </tr>

        <script>
            
          $(".openproj<?php echo $n;?>").click(function(){
            $("#sub_id").val($(this).data('projid<?php echo $n;?>'));
            $('#sub_name').val($(this).data('projname<?php echo $n;?>'));
            $("#sub_code").val($(this).data('projectcode<?php echo $n;?>'));
          });
        </script>

          <?php $n++; } ?>
      </tbody>
    </table>
    <script>
    $.extend( $.fn.dataTable.defaults, {
         autoWidth: false,
         columnDefs: [{
             orderable: false,
             width: '100px',
             targets: [ 3 ]
         }],
         dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
         language: {
             search: '<span>Filter:</span> _INPUT_',
             lengthMenu: '<span>Show:</span> _MENU_',
             paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
         },
         drawCallback: function () {
             $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
         },
         preDrawCallback: function() {
             $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
         }
     });
      $('#tbpro').DataTable();
    </script>
