<table class="table table-striped table-bordered table-hover text-size-little table-xxs datatable" width="100%">
    <thead>
        <tr>
            <th>No.</th>
            <th>Costcode</th>
            <th>newmatnamee</th>
            <?php foreach ($count_revise as $key => $value) {?>
                <th>Revise <?php echo $key;?></th>
            <?php } ?>
            <th class="text-center">dif. <br><?php if($key >=1){echo "(Revise ",$key." - Revise ".parse_num($key-1).")";}?></th>
        </tr>
    </thead>
    <tbody>
    <?php $total = 0; $n=1; foreach ($res as $key => $value) { ?>
        <tr>
            <td class="text-center"><?php echo $n; ?></td>
            <td><?php echo $value->subcostcode;?></td>
            <td><?php echo $value->newmatnamee;?></td>
            <?php 
                $revise_arr = array();
                foreach ($count_revise as $key => $va) {
                    $res = $this->db->query("select totalamt from boq_item where revise_boq ='".$va->revise_boq."' and boq_bd = '".$tender."' and newmatcode = '".$value->newmatcode."' order by boq_id asc")->result_array();
                  
                   
                    $amtrevise = 0;
                    if(isset($res[0]["totalamt"])){
                        $qty  = $res[0]["totalamt"];
                    }else{
                        $qty = 0;
                    }
                    $revise_arr[] = $qty;
                }
                $revise_arr_new = array_map(function($num){
                    return number_format($num,2);
                }, $revise_arr);
                echo "<td class='text-right'>".implode("</td><td class='text-right'>", $revise_arr_new)."</td>";
                $aa = array_reverse($revise_arr_new);
                if (isset($aa[1])) {
                    $sum = (parse_num($aa[0])*1)-(parse_num($aa[1])*1);
                }else{
                    $sum = 0;
                }
                // echo "<td class='text-right'>".implode("</td><td class='text-right'>", $revise_arr_news)."</td>";
                echo "<td class='text-right text-primary'>".number_format($sum,2)."</td>";
                
             ?>
        </tr>
    <?php $n++; } ?>
    </tbody>
</table>
<!-- <script>
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
                orderable: true,
                targets: [0]
            },
            { 
                width: "100px",
                targets: [0,1]
            },
            { 
                width: "350px",
                targets: [2]
            }
        ],
        scrollX: true,
        scrollY: '350px',
        scrollCollapse: true,
        fixedColumns: false
    });
</script> -->