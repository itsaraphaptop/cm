<table class="table table-striped table-hover table-xxs datatable-basic">
           <thead>
             <tr>
               <th class="text-center" width="5%">No. </th>
               <th class="text-center" width="10%">Material Code</th>
               <th>Material name</th>
               <th>WareHose</th>
               <th>QTY Balance</th>
               <th width="5%">Active</th>
             </tr>
           </thead>
           <tbody>
               <?php   $n =1; 
               foreach ($res as $key => $valj){?>
             <tr>
              <td class="text-center"><?php echo $n;?></td>
              <td class="text-center"><?php echo $valj->store_matcode; ?></td>
               <td><?php echo $valj->store_matname; ?></td>
               <td><?php echo $valj->whname; ?></td>
               <td><?php echo $valj->store_total; ?></td>
                 <td><button class="eopenmat btn btn-xs btn-block btn-primary" data-dismiss="modal" data-totprice="<?php echo $valj->totalprice; ?>" data-unitprice="<?php echo $valj->unitprice; ?>" data-costcode="<?php echo $valj->store_costcode; ?>" data-costname="<?php echo $valj->store_costname; ?>" data-unit="<?php echo $valj->store_unit; ?>" data-qty="<?php echo $valj->store_total; ?>" data-matcode="<?php echo $valj->store_matcode; ?>" data-matname="<?php echo $valj->store_matname; ?>" data-whname="<?php echo $valj->whname; ?>" data-matid="<?php echo $valj->store_id; ?>" data-whcode="<?php echo $valj->wh; ?>">SELECT</button></td>
             </tr>

     
             <script>
             $(".eopenmat").click(function(){
               $("#newmatname<?php echo $rows;?>").val($(this).data('matname'));
               $("#newmatcode<?php echo $rows;?>").val($(this).data('matcode'));
               $("#costname").val($(this).data('costname'));
               $("#codecostcode").val($(this).data('costcode'));
               $("#costname<?php echo $rows;?>").val($(this).data('costname'));
               $("#codecostcode<?php echo $rows;?>").val($(this).data('costcode'));
               $("#storetotol<?php echo $rows;?>").val($(this).data('qty'));
               $("#priceunit<?php echo $rows;?>").val($(this).data('unitprice'));
               $("#whcode<?php echo $rows;?>").val($(this).data('whcode'));
               $("#textstore").text($(this).data('qty'));
               $('#unit<?php echo $rows;?>').val($(this).data('unit'));
               $("#unitprice").val($(this).data('unitprice'));
               $("#totprice").val($(this).data('totprice'));
               $("#whname<?php echo $rows;?>").val($(this).data('whname'));
               $("#whcode<?php echo $rows;?>").val($(this).data('whcode'));
               $("#matid<?php echo $rows;?>").val($(this).data('matid'));
               var url="<?php echo base_url(); ?>inventory_active/update_store";  
              var dataSet={
              code : $(this).data('matcode'),
              pro : <?php echo $pro;?>
              };
              $.post(url,dataSet,function(data){
              });
              $(this).closest('tr').remove();

               $("#metcode<?php echo $rows;?>").modal('hide');

               
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
         width: '30%',
         targets: [ 1 ]
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