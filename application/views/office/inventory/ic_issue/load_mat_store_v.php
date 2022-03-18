<div class="table-responsive">
  <table class="table table-striped table-hover table-xxs datatable-basic">
           <thead>
             <tr>
               <th class="text-center" width="5%">No.</th>
               <th class="text-center" width="20%">Material Code</th>
               <th>วัสดุ</th>
               <th>WH</th>
               <th>คงเหลือ</th>
               <th width="5%">จัดการ</th>
             </tr>
           </thead>
           <tbody>
               <?php   $n =1;?>
               <?php foreach ($mat as $key => $valj){?>
             <tr>
              <td class="text-center"><?php echo $n;?></td>
              <td class="text-center"><?php echo $valj->store_matcode; ?></td>
               <td><?php echo $valj->store_matname; ?></td>
               <td><?php echo $valj->whname; ?></td>
               <td><?php echo $valj->store_total; ?></td>
                 <td><button class="eopenmat btn btn-xs btn-block btn-info" data-dismiss="modal" data-totprice="<?php echo $valj->totalprice; ?>" data-unitprice="<?php echo $valj->unitprice; ?>" data-costcode="<?php echo $valj->store_costcode; ?>" data-costname="<?php echo $valj->store_costname; ?>" data-unit="<?php echo $valj->store_unit; ?>" data-qty="<?php echo $valj->store_total; ?>" data-matcode="<?php echo $valj->store_matcode; ?>" data-matname="<?php echo $valj->store_matname; ?>" data-whname="<?php echo $valj->whname; ?>" data-whcode="<?php echo $valj->wh; ?>">เลือก</button></td>
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
               $("#unitprice").val($(this).data('unitprice'));
               $("#totprice").val($(this).data('totprice'));
               $("#whname").val($(this).data('whname'));
               $("#whcode").val($(this).data('whcode'));
               $()
             });
             </script>
                 <?php $n++; } ?>
           </tbody>
         </table>
  </div>
<!-- </div>
<script src="http://demo.mekabase.com/dist/js/jquery-1.11.1.min.js"></script>
<script src="http://demo.mekabase.com/dist/js//jquery.dataTables.min.js"></script>
  <link  href="http://demo.mekabase.com/dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
  $(document).ready(function() {
    $('#datasource').DataTable();

} );
</script> -->
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

$('.datatable-basic').DataTable();
</script>
