		<div class="row">
              <div class="col-sm-12">
                <div class="loadtable dataTables_wrapper no-footer">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped table-xs datatable-basic" style="width: 1200px">
                      <thead>
                      	<th style="width: 10px;"><input type="checkbox" id="checkAll"></th>
                        <th style="width: 10px;">NO.</th>
                        <th style="width: 100px;">Mat. Code</th>
                        <th style="width: 100px;">Description</th>
                        <th style="width: 10px;">QTY</th>
                        <th style="width: 100px;">Unit</th>
                        <th style="width: 100px;">Price/Unit</th>
                        <th style="width: 100px;">Ref. IC NO.</th>
                      </thead>
                      <tbody id="table_detail">
                      	<?php
                          $amountsum = 0;
                         foreach ($rows as $key => $value) {
                          $amount = $value['trading_xqty']*$value['trading_priceunit'];
                          $amountsum = $amountsum+$value['trading_xqty']*$value['trading_priceunit'];
                         ?>
                        <tr id="<?=$value['trading_id'];?>">
                        	<td>
                        		<input type="checkbox" class="check" issue="<?=$value['trading_id'];?>" name="id_issue" >
                        		<input type="hidden" class="issue" value="<?=$value['trading_id'];?>">
                            <input type="hidden" class="ttamount" value="<?=$amount;?>">
                        	</td>
  							<td>
  								<?=$key+1;?>
  							</td>
  							<td>
  								<input class="form-control input-xs mat_code" type="text" name="" value="<?=$value['trading_matcode'];?>" readonly="ture">
  							</td>
  							<td>
  								<input class="form-control input-xs description" type="text" name="" value="<?=$value['trading_matname'];?>" readonly="ture">
  							</td>
  							<td>
  								<input class="form-control input-xs xqty" type="text" name="" value="<?=$value['trading_xqty'];?>" readonly="ture">
  							</td>
  							<td>
  								<input class="form-control input-xs typeunit" type="text" name="" value="<?=$value['trading_unit'];?>" readonly="ture">
  							</td>
  							<td>
  								<input class="txt form-control input-xs priceunit" type="text" name="" value="<?=$value['trading_priceunit'];?>" readonly="ture">
  							</td>
  							<td>
  								<input class="form-control input-xs doccode" type="text" name="" value="<?=$value['trading_doccode'];?>" readonly="ture">
  								<input class="form-control input-xs system" type="hidden" name="" value="<?=$value['trading_system'];?>" readonly="ture">
  							</td>
 						</tr>
						<?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <script type="text/javascript">
            	 $("#checkAll").click(function () {
         				$('input:checkbox.check').not(this).prop('checked', this.checked);

         			 });
               
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


