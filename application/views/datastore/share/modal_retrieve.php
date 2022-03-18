<table class="table table-xxs table-hover" id="tbcus">
	<thead>
		<tr>
			<th>No.</th>
			<th>Project Code</th>
			<th>Project Name</th>
			<th>Owner Name</th>
            <th>Type</th>
            <th class="text-center">Status</th>
            <th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php $i=1; foreach ($rows as $key => $value) { ?>
		<tr  <?php if($value['status']=="W"){ echo 'style="color: #6699FF";'; }else if($value['status']=="Y"){
            echo 'style="color: #FF3300";';
        } ?>>
			<td><?php echo $i; ?></td>
			<td><?php echo $value['site_no']; ?></td>
			<td><?php echo $value['after_site_no']; ?></td>
            <td><?php echo $value['after_customer']; ?></td>
            <td><?php echo $value['payment_type']; ?></td>
            <td class="text-center"><?php echo $value['status']; ?></td>
			<td><button attr-id="<?php echo $value['submit_no']; ?>" data-dismiss="modal" class="btn btn-primary btn_in_retrieve">SELECT</button></td>
		</tr>
	<?php $i++;} ?>
	</tbody>
</table>


<!-- /core JS files -->
<script type="text/javascript">
// $.extend( $.fn.dataTable.defaults, {
//          autoWidth: false,
//          columnDefs: [{
//              orderable: false,
//              width: '100px',
//          }],
//          dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
//          language: {
//              search: '<span>Filter:</span> _INPUT_',
//              lengthMenu: '<span>Show:</span> _MENU_',
//              paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
//          },
//          drawCallback: function () {
//              $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
//          },
//          preDrawCallback: function() {
//              $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
//          }
//      });

// $('#tbcus').DataTable();
    //Script load Content in tab job

    $('.btn_in_retrieve').click(function(event) {
        if('<?php echo $value['status']; ?>'=="Y"){
        $('.diehidden').hide();
        }

        var submit_no = $(this).attr('attr-id');
        $('#event_type').val("edit");
        // alert($('#event_type').val());
        $('.ccdate').show();
        $.get('<?php echo base_url(); ?>share_ball/get_data_header/'+submit_no, function() {
            
        }).done(function(data){
            try{

                var json_res = jQuery.parseJSON(data);
                // console.log(json_res[0]);
                //$('#event_type').val("edit");
                $('#submit_no').val(json_res[0].submit_no);
                $('#refdoc').val(json_res[0].refferent);
                $('#date').val(json_res[0].date);
                $('#year').val(json_res[0].year);
                $('#month').val(json_res[0].month);
                $('#payment_type').val(json_res[0].payment_type);
                $('#site_no').val(json_res[0].site_no);
                $('#pjname').val(json_res[0].after_site_no);
                $('#cus_id').val(json_res[0].customer);
                $('#cus_name').val(json_res[0].after_customer);
                $('#subject').val(json_res[0].subject_remark);
                $('#period').val(json_res[0].period);
                $('#avance').val(json_res[0].avance);
                $('#after_avance').val(numberWithCommas(json_res[0].after_avance));
                $('#vat').val(json_res[0].vat);
                $('#after_vat').val(numberWithCommas(json_res[0].after_vat));
                $('#currency').val(json_res[0].currency);
                $('#exchang').val(json_res[0].exchang);
                $('#retention').val(json_res[0].retention);
                $('#after_retention').val(numberWithCommas(json_res[0].after_retention));
                $('#wt').val(json_res[0].wt);
                $('#after_wt').val(numberWithCommas(json_res[0].after_wt));
                $('#net_amount').val(numberWithCommas(json_res[0].net_amount));
                $('#cdate').val(json_res[0].date_certificate);
                $('#cstatus').val(json_res[0].status);
                $('#chkdel').val(json_res[0].status);
                $("#sumjob_amount").val(json_res[0].amount_submit);
                if (json_res[0].printletter ==1) {
                    $('#pr').attr('checked', 'checked');
                    $('#printletter').val(json_res[0].printletter);
                }else{
                    //$('#pr').attr('checked', '');
                    $('#printletter').val(json_res[0].printletter);
                }   
            }catch(e){
                console.log(data);
                console.log(e);
            }
        });
        $('#content_tbjob').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        // alert(submit_no);
        $("#content_tbjob").load('<?php echo base_url(); ?>share_ball/content_tojob/'+submit_no);
    });
    //Script load Content in tab job
</script>
