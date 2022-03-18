<table class="table table-hover table-xs" id="table_poretention" >
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
        foreach ($rows as $key => $poretention) {
    ?>
        <tr>
            <td><?=$poretention->po_pono;?></td>
            <td><?=$poretention->po_place;?></td>
            <td><?=$poretention->po_vender;?></td>
            <td><?=$poretention->retention;?></td>
            <td><?=$poretention->sumretention;?></td>
            <td><?=$poretention->retention - $poretention->sumretention;?></td>
            <td>
                <button 
                type="button" 
                attr-vat="<?=$poretention->po_vatper;?>"
                vender-id="<?=$poretention->vender_code;?>" 
                vender-name="<?=$poretention->po_vender;?>"
                pro-name="<?=$poretention->po_place;?>"
                pro-id="<?=$poretention->po_project;?>"
                amount="<?=$poretention->retention - $poretention->sumretention;?>"
                vat="<?=$poretention->po_vatper;?>"
                tax-id="<?=$poretention->vender_tax;?>"
                credit="<?=$poretention->vender_credit;?>"
                po-id="<?=$poretention->po_id;?>"
                po-code="<?=$poretention->po_pono;?>"
                po-sys="<?=$poretention->po_system;?>"
                onclick="poretention($(this))"
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
$('#table_poretention').DataTable();
    function poretention(el){
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
        var po_sys = el.attr('po-sys');
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
            $('#sysid').val(po_sys);
            $('#pprice_unit').val(vat);
            $('#amount').val(amount);
            $('#principle').val(amount);
            $('#pre_event').val(pro_id);
            $('#pre_eventname').val(pro_name);
            $('#pamount').val(vatamt);
            $('#vendor_id').val(vender_id);
            $('#namevendor').val(vender_name);
            $('#amt').val(net_amt);
            $('#nameve1').val(vender_name);
            $('#tax_de').val(tax_id);
            $('#cterm').val(credit);
            $('#duedate').val(duedate);
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
