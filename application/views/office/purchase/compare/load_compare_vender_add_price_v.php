<table class="table table-bordered table-striped table-hover table-xxs">
    <thead>
        <tr id="tr1">
            <th width="5%">No.</th>
            <th>Vender Name</th>
            <th width="10%">Disc (%) </th>
            <th width="10%">CR (Day) (%) </th>
            <th width="15%">Date</th>
            <th width="15%">Quataion No.</th>
        </tr>
    </thead>
    <tbody id="body">
    <?php $n=1; foreach ($vender as $key => $value) {?>
        <tr>
            <td><?php echo $n;?></td>
            <td><a href="#" id="load_mate<?php echo $value->cpvenderid;?>"><?php echo $value->vender_name;?></a><input type="hidden" name="vendid[]" value="<?php echo $value->cpvenderid;?>"></td>
            <td><input type="text" id="disc<?php echo $n;?>" name="discvender[]" class="form-control text-right" onchange="format(this)" onblur="if(this.value.indexOf('.')==-1)this.value=this.value+'.00'" value="<?php echo $value->rq_disc;?>"></td>
            <td><input type="text" class="form-control text-right" name="crvender[]" onchange="format(this)" onblur="if(this.value.indexOf('.')==-1)this.value=this.value+'.00'" value="<?php echo $value->cpvenderteam;?>"></td>
            <td><input type="date" id="datevender<?php echo $n;?>" class="form-control date" name="datevender[]" value="<?php echo date("Y-m-d",now());?>"></td>
            <td><input type="text" class="form-control" name="quovender[]" value="<?php echo $value->quovender;?>"></td>
        </tr>
        <script>
            $("#load_mate<?php echo $value->cpvenderid;?>").on('click',function(){
                $("#vender").val('<?php echo $value->cpvenderid;?>');
                $("#invoice").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...<?php echo $value->cpvenderid;?>");
                $("#invoice").load('<?php echo base_url(); ?>purchase/pritem_compare/'+"<?php echo $value->cpcode; ?>"+"/cp/"+"<?php echo $value->cpvenderid;?>");
                $("#saveh").show();
            });
        </script>
    <?php $n++; } ?>
    </tbody>
</table>
