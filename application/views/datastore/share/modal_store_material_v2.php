<script type="text/javascript">
  function update_mat(el){
      var row = el.data('row');
            $("#newmatname"+row).val(el.data('matname'));
            $("#newmatcode"+row).val(el.data('matcode'));
            $("#costname").val(el.data('costname'));
            $("#codecostcode").val(el.data('costcode'));
            $("#storetotol"+row).val(el.data('qty'));
            $("#priceunit"+row).val(el.data('unitprice'));
            $("#whcode"+row).val(el.data('whcode'));
            $("#textstore").text(el.data('qty'));
            $('#unit'+row).val(el.data('unit'));
            $("#unitprice").val(el.data('unitprice'));
            $("#totprice").val(el.data('totprice'));
            $("#whname"+row).val(el.data('whname'));
            $("#whcode"+row).val(el.data('whcode'));
            $("#matid"+row).val(el.data('matid'));

            // $("#booking").load("<?php echo base_url(); ?>inventory/bookdetail/"+el.data('matcode')"/"+el.data('matid');

          var url="<?php echo base_url(); ?>inventory_active/update_store";  
              var dataSet={
              code : el.data('matcode'),
              wh : el.data('whcode'),
              pro : <?php echo $pro;?>
              };


              $.post(url,dataSet,function(data){
              });
            
//       alert(row);
  }
</script>

<table class="table table-striped table-hover table-xxs datatable-basic">
           <thead>
             <tr>
               <th class="text-center" width="5%">No. </th>
               <th class="text-center" width="10%">Material Code</th>
               <th>Material Name</th>
               <th>Warehouse</th>
               <th>QTY Balance</th>
               <th width="5%">Active</th>
             </tr>
           </thead>
           <tbody>
               <?php   $n =1; 
               foreach ($res as $key => $valj){
                 ?>
             <tr>
              <td class="text-center"><?php echo $n;?></td>
              <td class="text-center"><?php echo $valj->store_matcode; ?></td>
               <td><?php echo $valj->store_matname; ?></td>
               <td><?php
                    echo $valj->whname;
                 ?></td>
               <td><?php echo $valj->store_total; ?></td>
                 <td>
                 <button 
                 class="eopenmat<?php echo $n;?> btn btn-xs btn-block btn-primary" 
                 data-dismiss="modal" 
                 data-totprice="<?php echo $valj->totalprice; ?>" 
                 data-unitprice="<?php echo $valj->unitprice; ?>" 
                 data-costcode="<?php echo $valj->store_costcode; ?>" 
                 data-costname="<?php echo $valj->store_costname; ?>" 
                 data-unit="<?php echo $valj->store_unit; ?>" 
                 data-qty="<?php echo $valj->store_total; ?>" 
                 data-matcode="<?php echo $valj->store_matcode; ?>" 
                 data-matname="<?php echo $valj->store_matname; ?>" 
                 data-whname="<?php echo $valj->wh; ?>" 
                 data-matid="<?php echo $valj->store_id; ?>" 
                 data-whcode="<?php echo $valj->wh; ?>"
                 data-row= "<?php echo $rows;?>"
                 onclick="update_mat($(this))"
                 >SELECT</button></td>
             </tr>

     
             <script>
              $('.eopenmat<?php echo $n;?>').click(function(event) {
               $("#codecostcode<?php echo $rows; ?>").val("<?php echo $valj->store_costcode; ?>");
               $("#costname<?php echo $rows; ?>").val("<?php echo $valj->store_costname; ?>");
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
         width: '5%',
         targets: [ 0 ]
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