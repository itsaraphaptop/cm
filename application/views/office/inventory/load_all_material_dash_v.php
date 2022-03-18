<table class="table table-striped table-hover table-xxs text-size-little datatable" width="100%">
    <thead>
        <tr>
            <th width="25px;">#</th>
            <th width="500px;">Material</th>
            <th width="50px;">Unit</th>
                <?php foreach ($projectdata as $key => $data) { ?>
                    <th class="text-right" width="350px;"><?= $data->project_name ?></th>
                <?php }  ?>
        </tr>
    </thead>
    <tbody>
    <?php $n = 1; foreach ($material as $i => $store_mat) { ?>
        <tr>
            <td><?= $n++ ?></td>
            <td><?= $store_mat->store_matname ?></td>
            <td><?= $store_mat->store_unit ?></td>
            <?php 
                $qty_by_project_arr = array();
                foreach ($projectdata as $index => $project_item) {
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
            $qty_by_project_arr_new = array_map(function($num){return number_format($num,2);}, $qty_by_project_arr);
                echo "<td class='text-right'>".implode("</td><td class='text-right'>", $qty_by_project_arr_new)."</td>";
            ?>
        </tr>
    <?php } ?>
    </tbody>
</table>
<script>
 $.extend( $.fn.dataTable.defaults, {
        columnDefs: [{ 
            orderable: false,
            width: '100px',
            targets: [ 0 ]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        }
    });
    $('.datatable').DataTable({
        columnDefs: [
            { 
                orderable: false,
                targets: [0]
            },
            { 
                width: "50px",
                targets: [0]
            },
            { 
                width: "350px",
                targets: [1]
            },
            { 
                width: "200px",
                targets: [3,4]
            },
            { 
                width: "100px",
                targets: [2]
            }
        ],
        scrollX: true,
        scrollY: '350px',
        scrollCollapse: true,
        fixedColumns: true
    });
</script>