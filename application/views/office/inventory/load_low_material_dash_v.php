<table class="table table-striped table-hover table-xxs text-size-little basic">
    <thead>
        <tr>
            <th width="25px;">#</th>
            <th>Project</th>
            <th width="500px;">Material</th>
            <th width="50px;">Unit</th>
            <th>QTY</th>
             <th>BOQ</th>
        </tr>
    </thead>
    <tbody>
        <?php $n=1; foreach ($material as $key => $store_mat) {
            // check จาก BOQ
        $this->db->select('SUM(qty) as totalqty');
		$this->db->where('boq_code', $store_mat->bd_tenid);
		$this->db->where('boq_mcode',$store_mat->store_matcode);
		$this->db->group_by('boq_mcode');
		$this->db->group_by('costcode');
		$query = $this->db->get('boq_cost');
        $res = $query->result();
        foreach ($res as $key => $value) {
            $totalqty = $value->totalqty;
            $sum = $totalqty*$minper['min_per']/100;
       
        if ( $store_mat->store_sum<=$sum) { ?>
            <tr>
                <td><?= $n++ ?> </td>
                <td><?= $store_mat->project_name ?></td>
                <td><?= $store_mat->store_matname ?></td>
                <td><?= $store_mat->store_unit ?></td>
                <td class="text-danger"><?= $store_mat->store_sum ?></td>
                <td><?= $totalqty ?></td>
            </tr>
        <?php }else{ ?>
           
        <?php } ?>

        <?php } } ?>
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
    $('.basic').DataTable();
</script>