<div class="content-wrapper">
    <div class="content">
        <!-- Highlighting rows and columns -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Receive Transfer Archive</h5>
                <h3>
                    <?php echo @$getprojto;?>
                </h3>

            </div>

            <div class="panel-body">
                <table class="table table-hover table-bordered table-xxs">
                    <thead>
                        <tr>
                            <th>Transfer Code</th>
                            <th>Document Date</th>
                            <th>Name</th>
                            <th>Receive</th>
                            <th>Transfer</th>
                            <th>Remark</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>Action Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($res as $key => $value) {?>
                        <tr>
                            <td>
                                <?php echo $value->transfer_code; ?>
                            </td>
                            <td>
                                <?php echo $value->date_transfer; ?>
                            </td>
                            <td>
                                <?php echo $value->name_transfer; ?>
                            </td>
                            <?php $ffproject = $this->db->query("select project_name from project where project_id='$value->to_project'")->result(); 
                      foreach ($ffproject as $key => $ffname) { ?>
                            <td>
                                <?php echo $ffname->project_name; ?>
                            </td>
                            <?php } ?>
                            <?php $ttproject = $this->db->query("select project_name from project where project_id='$value->from_project'")->result(); 
                      foreach ($ttproject as $key => $ttname) { ?>
                            <td>
                                <?php echo $ttname->project_name; ?>
                            </td>
                            <?php } ?>
                            <td>
                                <?php echo $value->remark; ?>
                            </td>
                            <?php if ($value->approve=="approve") {?>
                            <td><span class="label label-warning">Waiting</span></td>
                            <td>
                                <ul class="icons-list">
                                    <li> <button data-toggle="modal" data-target="#receive<?php echo $value->transfer_code; ?>"
                                            class="detail<?php echo $value->transfer_code; ?> label label-success">
                                            Receive</button></li>
                                    <li> <button data-toggle="modal" data-target="#receive<?php echo $value->transfer_code; ?>"
                                            class="detail<?php echo $value->transfer_code; ?> label label-danger">
                                            Cancel</button></li>
                                </ul>
                            </td>
                            <?php }elseif ($value->approve=="return"){?>
                            <td><span class="label label-warning">Return</span></td>
                            <td>
                                <ul class="icons-list">
                                    <li> <button data-toggle="modal" data-target="#receive<?php echo $value->transfer_code; ?>"
                                            class="detail<?php echo $value->transfer_code; ?> label label-default ">
                                            Receive</button></li>
                                    <li> <button class="label label-default disabled"> Cancel</button></li>
                                </ul>
                            </td>
                            <?php }else{?>
                            <td><span class="label label-success">Transfer</span></td>
                            <td>
                                <ul class="icons-list">
                                    <li> <button data-toggle="modal" data-target="#receive<?php echo $value->transfer_code; ?>"
                                            class="detail<?php echo $value->transfer_code; ?> label label-default ">
                                            Receive</button></li>
                                    <li> <button class="label label-default disabled"> Cancel</button></li>
                                </ul>
                            </td>
                            <?php } ?>
                            <td>
                                <?php echo $value->action_date; ?>
                            </td>
                        </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php foreach ($res as $key => $value) {?>
        <!-- modal  โครงการ-->
        <div class="modal fade" id="receive<?php echo $value->transfer_code; ?>" data-backdrop="false">
            <div class="modal-dialog modal-full">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Receive Transfer Code #
                            <?php echo $value->transfer_code; ?>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            <form class="postreceive" action="<?php echo base_url(); ?>inventory_active/receive_transfer"
                                method="post">
                                <div class="row">
                                    <!--  -->
                                    <div class="panel-body no-padding-bottom">
                                        <div class="row">
                                            <div class="col-md-6 content-group">
                                            </div>

                                            <div class="col-md-6 content-group">
                                                <div class="invoice-details">
                                                    <h5 class="text-uppercase text-semibold">Transfer No. #
                                                        <?php echo $value->transfer_code; ?><input type="hidden" name="code"
                                                            value="<?php echo $value->transfer_code; ?>"></h5>
                                                    <ul class="list-condensed list-unstyled">
                                                        <li>Transfer Date: <span class="text-semibold">
                                                                <?php echo $value->date_transfer; ?></span></li>
                                                        <li>
                                                            <h5>Name :
                                                                <?php echo $value->name_transfer; ?>
                                                            </h5>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <input type="hidden" name="toproject" value="<?php echo $value->to_project; ?>">
                                            <input type="hidden" name="fromproject" value="<?php echo $value->from_project; ?>">
                                            <input type="hidden" name="date_transfer" value="<?php echo $value->date_transfer; ?>">

                                            <div class="col-md-6 col-lg-9 content-group">
                                                <span class="text-muted">From Project:</span>
                                                <ul class="list-condensed list-unstyled">
                                                    <li>
                                                        <h5>
                                                            <?php echo $getproj; ?><input type="hidden" name="fromproject"
                                                                value="<?php echo $value->from_project; ?>"> </h5>
                                                    </li>
                                                    <li>Remark:
                                                        <?php echo $value->remark; ?>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col-md-6 col-lg-3 content-group">
                                                <span class="text-muted">To Project:</span>
                                                <ul class="list-condensed list-unstyled invoice-payment-details">
                                                    <li>
                                                        <h5>
                                                            <?php echo $getprojto; ?>
                                                        </h5><input type="hidden" name="to_project" value="<?php echo $value->to_project; ?>">
                                                    </li>
                                                    <li>Address: <span class="text-semibold">
                                                            <?php echo $value->address_transfer; ?></span></li>
                                                    <li>Additional message:: <span>
                                                            <?php echo $value->message; ?></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="modal_detail<?php echo $value->transfer_code; ?>">

                                    </div>
                                    <div class="row">
                                        <div class="modal-footer">
                                            <?php if ($value->approve=="approve") {?>
                                            <button type="button" class="savee btn btn-success"> Receive</button>
                                            <a href="<?php echo base_url(); ?>inventory_active/revese_transfer/<?php echo $value->transfer_code;?>"
                                                class="btn btn-danger"> Cancel</a>
                                            <?php }else{?>

                                            <?php } ?>
                                            <a data-dismiss="modal" class="btn btn-default"> Close</a>
                                        </div>
                                    </div>
                                    <!--  -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end modal -->


        <script type="text/javascript">
            $(".savee").click(function(e) {
                if ($("#whi").val() == "") {
                    // alert('asd');
                    swal({
                        title: "กรุณาเลือก Warehouse!",
                        // type: "Waiting",
                        confirmButtonColor: "#FF0000",
                        // type: "success"
                    });
                } else {
                    var frm = $('#postreceive');
                    frm.submit(function(ev) {
                        $.ajax({
                            type: frm.attr('method'),
                            url: frm.attr('action'),
                            data: frm.serialize(),
                            success: function(data) {
                                swal({
                                    title: "Transfer Completed!!",
                                    text: "Save Completed!!.",
                                    // confirmButtonColor: "#66BB6A",
                                    type: "success"
                                });
                                setTimeout(function() {
                                    window.location.href =
                                        "<?php echo base_url(); ?>inventory/receive_transfer_store/" +
                                        data;
                                }, 500);
                            }
                        });
                        ev.preventDefault();

                    });




                    $(".postreceive").submit(); //Submit  the FORM
                }
            });
            //
            //
        </script>
        <script>
            $(".detail<?php echo $value->transfer_code; ?>").click(function() {
                $("#modal_detail<?php echo $value->transfer_code; ?>").html(
                    "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                $("#modal_detail<?php echo $value->transfer_code; ?>").load(
                    '<?php echo base_url(); ?>inventory/load_transfer_receive_detail/<?php echo $value->transfer_code; ?>/<?php echo $value->to_project; ?>'
                );

            });
            $('#imp').attr('class', 'active');
            $('#receive').attr('class', 'active');
            $('#imp_sub12').attr('style', 'background-color:#dedbd8');
        </script>
        <?php } ?>

        <!-- Highlighting rows and columns -->

        <!-- /highlighting rows and columns -->




    </div>
    <!-- /content area -->

</div>
<!-- /main content -->