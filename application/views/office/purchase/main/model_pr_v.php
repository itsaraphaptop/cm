<div id="v_pr" class="modal fade" role="dialog">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ใบขอซื้อ</h4>
            </div>
            <div class="modal-body">
            <div class="text-left">
                <label>Filter Status:</label>
                <button class="alls label bg-purple"> ทั้งหมด</button>
                <button class="no label bg-primary"> ยังไม่ได้เปิดดู</button>
                <button class="compare label bg-info"> กำลังขอราคา</button>
                <button class="resolve label bg-danger"> ระงับการซื้อ</button>
            </div>
                <table class="table table-striped table-hover table-xxs datatable-basic">
                    <thead>
                        <tr>
                            <th width="10%">No.PR</th>
                            <th width="10%">Pr Date</th>
                            <th width="30%">Name Requsition</th>
                            <th width="10%">Attach</th>
                            <th width="20%">Actions</th>
                            <th width="20%">Status Compare</th>
                            <!-- <th width="30%">Date Check</th> -->
                        </tr>
                    </thead>
                    <tbody id="pr_vv">
                        <?php
					foreach ($data as $key => $value) {		
                        $projectid = $value->pr_project;				
                    ?>
                        <tr>
                            <td><?= $value->pr_prno; ?></td>
                            <td class="text-left"><?= $value->pr_prdate; ?></td>
                            <td class="text-left"><?= $value->pr_reqname; ?></td>
                            <td>
                                <?php 	$this->db->select( '*' );
								$this->db->where( 'pr_ref', $value->pr_prno );
								$this->db->where( 'user', $value->compcode );
								$q = $this->db->get( 'select_file_pr' )->num_rows(); 
						?>
                                <?php if($q==0){ ?>
                                <i></i>
                                <?php }else{ ?>

                                <a href="#" id="popover-show<?= $value->pr_prno; ?>" data-placement="bottom"
                                    data-html="true"><i class="icon-attachment"></i></a>
                                <script>
                                var id_pr = "<?= $value->pr_prno; ?>"
                                $.post('<?php echo base_url(); ?>purchase/loadfile', {
                                    id_pr: id_pr
                                }, function() {}).done(function(data) {
                                    // $('#view_pr').html(data);
                                    $('#popover-show<?= $value->pr_prno; ?>').popover({
                                        title: 'Attach File',
                                        content: data,
                                        trigger: 'click'
                                    }).on('shown.bs.popover', function() {
                                        // alert('Shown event fired.')
                                    });
                                });
                                </script>


                                <?php } ?>
                            </td>
                            <td><a href="<?php echo base_url(); ?>pr/openpr/<?= $value->pr_prno; ?>" target="_blank"><i
                                        class="icon-folder-open"></i></a></td>

                            <td>
                                <select class="form-control" name="status_po" id="status_po<?php echo $value->pr_prno;?>">

                                    <?php if($value->pr_postatus == '1'){ ?>
                                    <option selected value="1">ยังไม่ได้เปิดดู</option>
                                    <?php }else{ ?>
                                    <option value="1">ยังไม่ได้เปิดดู</option>
                                    <?php } ?>
                                    <?php if($value->pr_postatus == '2'){ ?>
                                    <option selected value="2">กำลังขอราคา</option>
                                    <?php }else{ ?>
                                    <option value="2">กำลังขอราคา</option>
                                    <?php } ?>
                                    <?php if($value->pr_postatus == '3'){ ?>
                                    <option selected value="3">ระงับการซื้อ</option>
                                    <?php }else{ ?>
                                    <option value="3">ระงับการซื้อ</option>
                                    <?php } ?>

                                </select>
                            </td>
                            <!-- <td>วันนี้</td> -->
                        </tr>
                        <script>
                            $("#status_po<?php echo $value->pr_prno;?>").change(function(){
                                var url = "<?php echo base_url(); ?>purchase/changeprstatus";
                                var dataSet = {
                                    prcode: '<?php echo $value->pr_prno;?>',
                                    pr_status: $("#status_po<?php echo $value->pr_prno;?>").val(),
                                };
                                $.post(url, dataSet, function(data) {
                                    console.log(data);
                                    $(this).text('color', 'red');
                                });
                            });
                        </script>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
$.extend($.fn.dataTable.defaults, {
    autoWidth: false,
    columnDefs: [{
        orderable: true,
        width: '10px',
        targets: [0]
    }],
    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
    language: {
        search: '<span>Filter:</span> _INPUT_',
        lengthMenu: '<span>Show:</span> _MENU_',
        paginate: {
            'first': 'First',
            'last': 'Last',
            'next': '&rarr;',
            'previous': '&larr;'
        }
    },
    drawCallback: function() {
        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
    },
    preDrawCallback: function() {
        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
    }
});
$('.datatable-basic').DataTable();
</script>
<script>
$('.editpo').click(function() {
    var url = "<?php echo base_url(); ?>index.php/office/edit_prmaster";
    var dataSet = {
        prcode: $("#prno").val(),
        pridate: $('#prdate').val(),
        memname: $("#memname").val(),
        memid: $("#memid").val(),
        putproject: $("#putprojectid").val(),
        depart: $("#depid").val(),
        place: $("#place").val(),
        deliverydate: $("#deliverydate").val(),
        remarkedit: $("#remark").val(),
        costtype: $("#costtype").val(),
        vender: $("#venderidd").val(),
        system: $("#system").val(),
        purchase_type: $("#purchase_type").val(),
        express: $("#express").val(),
        subname: $('#subname').val(),
        subid: $('#subid').val(),
        wo: $('#wo').val(),
    };
    $.post(url, dataSet, function(data) {
        new PNotify({
            title: 'Success notice',
            text: data,
            icon: 'icon-checkmark3',
            type: 'success'
        });
    });
});
$(".no").click(function(){
    $("#pr_vv").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#pr_vv").load('<?php echo base_url(); ?>purchase/count_pr_no/<?= $projectid; ?>/1');
});
$(".compare").click(function(){
    $("#pr_vv").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#pr_vv").load('<?php echo base_url(); ?>purchase/count_pr_compare/<?= $projectid; ?>/2');
});
$(".resolve").click(function(){
    $("#pr_vv").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#pr_vv").load('<?php echo base_url(); ?>purchase/count_pr_resolve/<?= $projectid; ?>/3');
});
$(".alls").click(function(){
    $("#pr_vv").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#pr_vv").load('<?php echo base_url(); ?>purchase/count_pr_all/<?= $projectid; ?>/3');
});
</script>