<div class="content-wrapper">
  <div class="content">
    <div class="panel panel-flat">
      <div class="panel-heading">
      <h2>Project Inventory</h2>
      <hr/>
        <div class="form-horizontal">
        <div class="table-responsive" style="overflow-x:auto;">
          <table class="table table-bordered table-striped" id="data_master">
            <thead>
              <tr class="bg-info">
                <th rowspan="2"><div style="width: 25px;">No.</div></th>
                <th rowspan="2"><div style="width: 200px;">Material Code</div></th>
                <th rowspan="2"><div style="width: 200px;">Material Name</div></th>
                <th rowspan="2" class="text-center"><div style="width: 50px;">Unit</div></th>
                <th rowspan="2" class="text-center"><div style="width: 100px;">Total QTY</div></th>
                <?php
                  foreach ($project as $key => $data) {
                ?>
                  <th class="bg-info"><div style="width: 250px;"><?= $data->project_code ?></div></th>
                <?php
                  }
                ?>
              </tr>
              <tr class="bg-info">
                <?php
                  foreach ($project as $key => $data) {
                ?>
                  <th><div style="width: 250px;"><?= $data->project_name ?></div></th>
                <?php
                  }
                ?>
              </tr>
            </thead>
            <tbody>
              <?php
                $this->db->select('*');
                $this->db->select('SUM(store_qty) as store_sum');
                $this->db->from('store');
                $this->db->group_by('store_matcode');
                $data_store = $this->db->get()->result();
                $n = 1;
                foreach ($data_store as $i => $store_mat) {

              ?>
                <tr>
                  <td class="text-center"><?= $n++ ?></td>
                  <td><?= $store_mat->store_matcode ?></td>
                  <td><?= $store_mat->store_matname ?></td>
                  <td class="text-center"><?= $store_mat->store_unit ?></td>
                  <td class="text-center"><?= number_format($store_mat->store_sum) ?></td>
                  
                  <?php 
                    $qty_by_project_arr = array();
                    foreach ($project as $index => $project_item) {
                        $this->db->select("store_qty");
                        $this->db->from("store");
                        $data = [
                            "store_matcode"=>$store_mat->store_matcode,
                            "store_project"=>$project_item->project_id
                        ];
                        $this->db->where($data);
                        $this->db->limit(1);
                        $query = $this->db->get();
                        $res = $query->result_array();
                        $qty = 0 ;
                        
                        if(isset($res[0]["store_qty"])){
                            $qty  = $res[0]["store_qty"];
                        }
                       $qty_by_project_arr[] = $qty;
    

                    }
                    //var_dump( $qty_by_project_arr);

                    $qty_by_project_arr_new = array_map("number_format", $qty_by_project_arr);
                    echo "<td class='text-right'>".implode("</td><td class='text-right'>", $qty_by_project_arr_new)."</td>";
                  ?>
                </tr>  
              <?php
                }
              ?>
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$.extend($.fn.dataTable.defaults, {
		autoWidth: false,
		columnDefs: [{
			orderable: false,
			width: '100px',
			targets: [0]
		}],
		dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
		language: {
			search: '<span>Filter:</span> _INPUT_',
			lengthMenu: '<span>Show:</span> _MENU_',
			paginate: {
				'first': 'First',
				'last': 'Last',
				'next': '&rarr;',
				'previous': '&larr;'
			}
		},
		drawCallback: function() {
			$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
		},
		preDrawCallback: function() {
			$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
		}
	});
  $('#data_master').DataTable();
  $('#inventory').attr('class','active');
</script>