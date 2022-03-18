<table class="table table-striped table-bordered table-hover table-xxs">
    <thead>
        <tr>
            <th class="text-center">Pettycash No.</th>
            <th class="text-center">Document Date.</th>
            <th class="text-center">Account Code.</th>
            <th class="text-center">Expense Code</th>
            <th class="text-center">Expense</th>
            <th class="text-center">Name</th>
            <th class="text-center">Amount</th>
            <th class="text-center" width="5%">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php $n=0; $total=0; foreach ($res as $key => $value) {?>
        <tr>
            <td class="text-center" width="10%"><?php echo $value->docno;?></td>
            <td class="text-center" width="10%"><?php echo $value->docdate;?></td>
            <td class="text-center" width="10%"><?php echo $value->accode;?></td>
            <td class="text-center" width="10%"><?php echo $value->expenscode;?></td>
            <td><?php echo $value->act_name;?></td>
            <td><?php echo $value->advname;?></td>
            <td class="text-right" width="10%"><?php echo number_format($value->pettycashi_unitprice,2);?></td>
            <td class="text-right" width="5%">
                <a href="<?php echo base_url(); ?>report/viewerload?type=pc&typ=form&var1=<?php echo $value->docno; ?>&var2=<?php echo $value->doc_id; ?>&var3=<?php echo $compcode;?>" target="_blank" data-popup="tooltip" title="" data-original-title="Print" class="label label-primary"><i class="icon-printer4"></i> Print</a>
            </td>
        </tr>
    <?php $n++; $total=$total+$value->pettycashi_unitprice; } ?>
        <tr>
            <td class="text-right" colspan="5">Total</td>
            <td class="text-right"><?php echo number_format($total,2);?></td>
            <td width="5%"></td>
        </tr>
    </tbody>
</table>