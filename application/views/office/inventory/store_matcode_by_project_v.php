<div class="table-responsive">
  <table id="datasource" class="table table-bordered table-striped table-xs datatable-basicunit">
           <thead>
             <tr>
               <th class="text-center" width="5%">No.</th>
               <th>Materail Code</th>
               <th>Materail Name</th>
               <th>WH</th>
               <th>WareHouse</th>
               <th width="5%">Active</th>
             </tr>
           </thead>
           <tbody>
               <?php   $n =1;?>
               <?php foreach ($mat as $valj){ ?>
             <tr>
              <td class="text-center"><?php echo $n;?></td>
              <td><?php echo $valj->store_matcode; ?> </td>
               <td><?php echo $valj->store_matname; ?></td>
               <td><?php echo $valj->whname; ?></td>
               <td><?php echo $valj->store_total; ?></td>
                 <td><button class="eopenmat btn btn-xs btn-block btn-info" data-dismiss="modal" data-costcode="<?php echo $valj->store_costcode; ?>" data-costname="<?php echo $valj->store_costname; ?>" data-unit="<?php echo $valj->store_unit; ?>" data-qty="<?php echo $valj->store_total; ?>" data-matcode="<?php echo $valj->store_matcode; ?>" data-matname="<?php echo $valj->store_matname; ?>" data-store_id="<?php echo $valj->store_id; ?>"
                  data-jobcode="<?php echo $valj->jobcode; ?>" data-jobname="<?php echo $valj->jobname; ?>"
                  >SELECT</button></td>
                 

             </tr>
             <script>
             $(".eopenmat").click(function(){
               $("#newmatname").val($(this).data('matname'));
               $("#newmatcode").val($(this).data('matcode'));
               $("#costname").val($(this).data('costname'));
               $("#codecostcode").val($(this).data('costcode'));
               $("#storetotol").val($(this).data('qty'));
               $("#textstore").text($(this).data('qty'));
               $('#unit').val($(this).data('unit'));
               $('#unitprince').val('<?php echo $valj->unitprice; ?>');
               $('#discprince').val('<?php echo $valj->discountprice; ?>');
               $('#totprice').val('<?php echo $valj->totalprice; ?>');
               $('#store_id').val($(this).data('store_id'));

               $('#jobcode').val($(this).data('jobcode'));
               $('#jobname').val($(this).data('jobname'));
             });
             </script>
               <?php $n++; } ?>
           </tbody>
         </table>
</div>
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
  $('.datatable-basicunit').DataTable();
</script>
