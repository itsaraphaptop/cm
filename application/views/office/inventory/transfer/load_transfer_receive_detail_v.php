<table class="table table-bordered table-xxs">
    <thead>
        <tr>
            <th>No.</th>
            <th>Matterail Code</th>
            <th>Materail Name</th>
            <th>From Warehouse</th>
            <th>Warehouse</th>
            <th>Price/Unit</th>
            <th>Qty</th>
            <th>Unit</th>
        </tr>
    </thead>
    <tbody>
        <?php $n=1; foreach ($resi as $key => $value) {?>
        <tr>
            <td>
                <?php echo $n; ?>
            </td>
            <td>
                <?php echo $value->mat_code; ?><input type="hidden" name="matcodei[]" value="<?php echo $value->mat_code; ?>"></td>
            <td>
                <?php echo $value->mat_name; ?><input type="hidden" name="matnamei[]" value="<?php echo $value->mat_name; ?>"></td>
            <td>
                <?php echo $value->fromwh; ?>
            </td>

            <input type="hidden" name="total[]" value="<?php echo $value->total; ?>">
            <td>
                <?php 

        if ($approve == "receive") {
            $this->db->select('whname');
            $this->db->where('whcode',$value->fromwh);
            $this->db->where('compcode',$compcode);
            $q = $this->db->get('ic_proj_warehouse');
            $res = $q->result();
            // var_dump($res);
            echo $res[0]->whname;
        ?>

                <?php  
        }else{
           $q = $this->db->query("select * from ic_proj_warehouse where project_id='$proj' and compcode='$compcode' ")->result(); 
        ?>

                <?php foreach ($q as $key => $valuer) {?>
                <?php echo $valuer->whname; ?>
                <?php } ?>
                <?php } ?>


            </td>
            <td>
                <?php echo $value->unitprice; ?><input type="hidden" name="unitprice[]" value="<?php echo $value->unitprice; ?>"></td>
            <td>
                <?php echo $value->qty; ?><input type="hidden" name="qtyi[]" value="<?php echo $value->qty; ?>"></td>
            <td>
                <?php echo $value->unit; ?><input type="hidden" name="uniti[]" value="<?php echo $value->unit; ?>"></td>
            <input type="hidden" name="costcodei[]" value="<?php echo $value->costcode; ?>">
            <input type="hidden" name="costnamei[]" value="<?php echo $value->costname; ?>">
        </tr>
        <?php $n++; } ?>
    </tbody>
</table>
<br>