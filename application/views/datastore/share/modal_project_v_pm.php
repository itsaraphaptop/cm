
<table class="table table-xxs table-hover" id="tbpro<?= $id ?>">
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
          <td><button class="openproj<?php echo $n;?> btn btn-xs btn-block btn-primary pro" 
           pr_code="<?php echo $valj->project_code; ?>" id_pj="<?= $id ?>" pr_name="<?php echo $valj->project_name; ?>" 
            data-dismiss="modal">SELECT</button></td>
        </tr>

        <script>
            
          $(".openproj<?php echo $n;?>").click(function(){
            var code = $(this).attr('pr_code');
            var name = $(this).attr('pr_name');
            var id = $(this).attr('id_pj');
            $('#pj_code'+id).val(code);
            $('#pj_name'+id).val(name);
          });
        </script>

          <?php $n++; } ?>
      </tbody>
    </table>
    <!-- Core JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

    <!-- /core JS files -->
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
      $('#tbpro<?= $id ?>').DataTable();
    </script>
