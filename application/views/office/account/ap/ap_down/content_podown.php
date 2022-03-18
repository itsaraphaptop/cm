<table class="table table-hover table-xs" id="table_podown" >
    <thead>
        <tr>
            <th>เลขที่ PO</th>
            <th>ชื่อโครงการ</th>
            <th>ลูกค้า</th>
            <th>ยอดทั้งหมด</th>
            <th>ยอดที่ใช้ไป</th>
            <th>ยอดคงเหลือ</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
    <?php  
        foreach ($rows as $key => $podown) {
    ?>
        <tr>
            <td><?=$podown->po_pono;?></td>
            <td><?=$podown->po_place;?></td>
            <td><?=$podown->po_vender;?></td>
            <td><?=$podown->down;?></td>
            <td><?=$podown->sumdown;?></td>
            <td><?=$podown->down - $podown->sumdown;?></td>
            <td>
                <button 
                type="button" 
                attr-vat="<?=$podown->po_vatper;?>"
                vender-id="<?=$podown->vender_code;?>" 
                vender-name="<?=$podown->po_vender;?>"
                pro-name="<?=$podown->po_place;?>"
                pro-id="<?=$podown->po_project;?>"
                amount="<?=$podown->down - $podown->sumdown;?>"
                vat="<?=$podown->po_vatper;?>"
                tax-id="<?=$podown->vender_tax;?>"
                credit="<?=$podown->vender_credit;?>"
                po-id="<?=$podown->po_id;?>"
                po-code="<?=$podown->po_pono;?>"
                po-sysid="<?=$podown->po_system;?>"
                onclick="podown($(this))"
                data-dismiss="modal"
                class="btn btn-default btn-success" >เลือก
                </button>
            </td>
        </tr>
    <?php
        }
    ?>
    </tbody>
</table>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script>
$('#table_podown').DataTable();
function pad(n, width, z) {
  z = z || '0';
  n = n + '';
  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}
    function podown(el){
        var vat = el.attr('attr-vat');
        var vender_id = el.attr('vender-id');
        var vender_name = el.attr('vender-name');
        var pro_name = el.attr('pro-name');
        var pro_id = el.attr('pro-id');
        var amount = el.attr('amount');
        var tax_id = el.attr('tax-id');
        var credit = el.attr('credit');
        var po_id = el.attr('po-id');
        var po_code = el.attr('po-code');
        var po_sysid = el.attr('po-sysid');
        $('#po_id').val(po_id);
        $('#po_code').val(po_code);
        
        var vatamt = amount*vat/100;// Vat Amount
        var net_amt = vatamt+amount*1;//Net Amount

        $.post("<?=base_url()?>ap/date/"+credit, function () {     
        }).done(function(data){
            $('#duedate').val(data);
        });

        if(vat =='' || vat == undefined || vat ==0){
            // rowshowhide(false);
            $("#rowvat").hide();
           
        }else{
            // rowshowhide(true);
            $("#rowvat").show();
        }
            $('#sysid').val(po_sysid);
            $('#pprice_unit').val(vat);
            $('#amount').val(amount);
            $('#principle').val(amount);
            $('#pre_event').val(pro_id);
            $('#pre_eventname').val(pro_name);
            $('#pamount').val(vatamt);
            $('#vendor_id').val(vender_id);
            $('#namevendor').val(vender_name);
            $('#amt').val(net_amt);
            $('#nameve').val(vender_name);
            $('#tax_de').val(tax_id);
            $('#cterm').val(credit);
            
            $('#dr1').val(amount);
            $('#dr2').val(vatamt);
            $('#cr3').val(net_amt);
            $('#amtax1').val(amount);
            $('#vattax1').val(vat);
            $('#amttax1').val(vatamt);

        $('#vendername').val(vender_name); //temp add row tax
        $('#tax_id').val(tax_id); //temp add row tax

        sum_table_col('amount_row','sum_amount');// sum in table tab TAX
        sum_table_col('vat_row','sum_vat');// sum in table tab TAX
        sum_table_col('vat_amount_row','sum_vat_amount');// sum in table tab TAX
    }
</script>
