<table  class="table table-xxs table-hover datatable-basic" >
  <thead>
    <tr>
      <th>Project Code</th>
      <th>Project Name</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $n=1; foreach ($getproj as $key => $value) {
    $jj = $this->db->query("SELECT * from project_item where project_code = '$value->project_code' ")->result();
        
      ?>
    <tr>
      <td><?php echo $value->project_code; ?></td>
      <td><?php echo $value->project_name; ?></td>
            <td><button class="openproj<?php echo $n;?> btn btn-xs btn-block btn-primary" data-toggle="modal" data-projcode<?php echo $n;?>="<?php echo $value->project_code;?>" data-projid<?php echo $n;?>="<?php echo $value->project_id;?>" proj_id="<?php echo $value->project_id;?>"  data-projname<?php echo $n;?>="<?php echo $value->project_name;?>" data-dismiss="modal" 
            onclick="get_project_id($(this))"
            >SELECT</button>
      </td>
    </tr>

    <script>
      $(".openproj<?php echo $n;?>").click(function(){
        $("#pre_event").val($(this).data('projid<?php echo $n;?>'));
        $('#pre_eventname').val($(this).data('projname<?php echo $n;?>'));
        $("#projectidd").val($(this).data('projid<?php echo $n;?>'));
        $('#projectnamee').val($(this).data('projname<?php echo $n;?>'));
        $('#pjcode').val($(this).data('projcode<?php echo $n;?>'));
        var url="<?php echo base_url(); ?>ap_active/query_job";
                var dataSet={
                  procode : $(this).data('projcode<?php echo $n;?>')
                  };
              $.post(url,dataSet,function(data){
                     $("#job").html(data);
              });
      } );
    </script>
    <?php } ?>
  </tbody>
</table>
<!-- /core JS files -->
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '100px',
         targets: [ 2 ]
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
  $('.datatable-basic').DataTable();
</script>