<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Invoice No.</th>
                    <th>AR No.</th>
                    <th>System</th>
                    <th>Descriptiom</th>
                    <th>Amount</th>
                    <th>Net Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="list_ar">
                <tr>
                    <td colspan="7" class="text-center">กรุณาเลือกระบบ</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $('#system').change(function(event) {
        var system_id = $(this).val();
        $("#list_ar").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#list_ar").load('<?php echo base_url(); ?>ar/ar_system/'+system_id);  
    });
</script>