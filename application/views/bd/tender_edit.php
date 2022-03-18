<div class="content-wrapper">
    <div class="content">
        <form class="form-horizontal" action="<?php echo base_url(); ?>bd_active/bd_pjtender/<?=$res[0]->bd_tenid; ?>"
            method="post" style="width: 100%">
            <div class="panel panel-flat">
                <div class="panel-body">
                    <div class="row">
                        <div class="panel-body">
                            <div class="col-sm-5">
                                <h4 class="panel-title">
                                    Tender Project
                                    <p></p>
                                </h4>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tender No :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control input-xs" id="bd_tenid" name="bd_tenid"
                                            value="<?=$res[0]->bd_tenid; ?>" readonly="true">
                                        <input type="hidden" class="form-control" id="bd_chk" name="bd_chk" value="E">
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="col-sm-3 control-label">Project No :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control input-xs" id="bd_pno" name="bd_pno"
                                            value="<?=$res[0]->bd_pno;?>" readonly="tue">
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tender Name :</label>
                                    <div class="col-sm-8">
                                        <!-- <input type="text" class="form-control input-xs" id="bd_pname" name="bd_pname"
                                            value="<?=$res[0]->bd_pname;?>"> -->
                                            <div id="alpaca-maxlength"></div>
                                    </div>
                                </div>
                                <script>
                                    $("#alpaca-maxlength").alpaca({
                                        schema: {
                                            type: "string",
                                            minLength: 3,
                                            maxLength: 100
                                        },
                                        options: {
                                            type: "text",
                                            name: "bd_pname",
                                            // label: "What is your name?",
                                            constrainMaxLength: true,
                                            constrainMinLength: true,
                                            showMaxLengthIndicator: true,
                                            focus: false
                                        },
                                        data: "<?=$res[0]->bd_pname;?>"
                                    });
                                </script>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Date :</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control input-xs" id="bd_date" name="bd_date"
                                            value="<?=$res[0]->bd_date;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Month :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control input-xs" id="bd_month" name="bd_month"
                                            value="<?=$res[0]->bd_month;?>" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Year :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control input-xs" id="bd_year" name="bd_year"
                                            value="<?=$res[0]->bd_year;?>" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Status :</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="bd_bdstats" name="bd_bdstats">
                                            <?php 
								$sel1 ="";
								$sel2 ="";
								$sel3 ="";
								$sel4 ="";
									if ($res[0]->bd_bdstats == '1') {
										$sel1 ="selected";
									}else if($res[0]->bd_bdstats == '2'){
										$sel2 ="selected";
									}else if($res[0]->bd_bdstats == '3'){
										$sel3 ="selected";
									}else if($res[0]->bd_bdstats == '0'){
										$sel4 ="selected";
									}
								?>
                                            <option value=""></option>
                                            <option value="0" <?=$sel4;?> >Win</option>
                                            <option value="1" <?=$sel1;?> >In Process</option>
                                            <option value="2" <?=$sel2;?> >Wait</option>
                                            <option value="3" <?=$sel3;?> >Reject Join Bid</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Customer/Owner :</label>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control input-xs" name="bd_cus" id="bd_cus"
                                                readonly="true" value="<?=$res[0]->bd_cus;?>">
                                        </div>

                                    </div>
                                    <div class="col-sm-5">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-xs" name="bd_cusn" id="bd_cusn"
                                                readonly="true" value="<?=$res[0]->bd_cusn;?>">
                                            <span class="input-group-btn">
                                                <button type="button" data-toggle="modal" data-target="#cowner" id="search_cus"
                                                    class="btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                            <h4 class="panal-title">Bid Bond <p></p>
                                </h4>

                                <!-- <div class="form-group">
                                    <label class="col-sm-3 control-label">Bid Bond :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="bidbond" name="bidbond" value="<?=$res[0]->bidbond;?>">
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Bid Bond Amount:</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="alpaca-currency" style="text-align: right; width:100%;" id="bondprice" name="bondprice" value="<?=$res[0]->bondamount;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Bid Bond Date:</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" id="bidbonddate" name="bidbonddate" value="<?=$res[0]->bonddate;?>">
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-sm-7">
                                <h4 class="panel-title">
                                    Setup Appove
                                    <p></p>
                                </h4>
                                <h1> <a id="bd_member" class="retrieve btn bg-info btn-xs"><i class="icon-plus2"></i>
                                        Add Member</a></h1>
                                <p></p>
                                <br>
                                <table class="table table-hover table-striped table-xxs" id="res">
                                    <thead>
                                        <tr>
                                            <th width="5%" style="text-align: center;">NO.</th>
                                            <th width="5%" style="text-align: center;">Sequence</th>
                                            <th width="5%" class="text-center">Member ID</th>
                                            <th width="20%" style="text-align: center;">Member Name</th>
                                            <th width="10%" class="text-center">Position</th>
                                            <th width="10%" class="text-center">lock</th>
                                            <th width="10%" style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="body1">
                                        <?php $d=1; foreach ($td as $t) { ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo $d; ?><input type="hidden" name="chkpr[]" value="Y"><input
                                                    type="hidden" name="idpr[]" value="<?php echo $t->id; ?>"></td>
                                            <td><input type="text" class="form-control input-sm text-center" id="approve_sequence1"
                                                    name="approve_sequence[]" value="<?php echo $t->approve_sequence; ?>"></td>
                                            <td><input type="text" class="form-control input-sm " id="approve_mid1<?php echo $d; ?>"
                                                    name="approve_mid[]" value="<?php echo $t->approve_mid; ?>"
                                                    readonly=""></td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="approve_mname[]" id="approve_mname1<?php echo $d; ?>"
                                                        class="form-control input-xs" value="<?php echo $t->approve_mname; ?>"
                                                        readonly="">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="accopen111<?php echo $d; ?> btn btn-info btn-sm"
                                                            id="approvem111<?php echo $d; ?>" data-toggle="modal"
                                                            data-target="#approvemodal111<?php echo $d; ?>"><i class="icon-search4"></i></button>
                                                    </span>
                                                </div>
                                            </td>
                                            <td><input type="text" class="form-control input-sm" id="approve_position1"
                                                    name="approve_position[]" value="<?php echo $t->approve_position; ?>"></td>
                                            <td class="text-center"><input type="checkbox" class="input-sm" id="approve_lock1<?php echo $d; ?>"
                                                    name="approve_lock[]" <?php if($t->approve_lock=="Y"){ echo
                                                'checked';
                                                }; ?>>
                                                <input type="hidden" name="lock1[]" id="lock1<?php echo $d; ?>" value="<?php echo $t->approve_lock; ?>">
                                            </td>
                                            <td class="text-center"><a id="remove" delid1="<?php echo $t->approve_sequence; ?>" delid2="<?=$res[0]->bd_tenid; ?>" data-popup="tooltip" title=""
                                                    data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i
                                                        class="glyphicon glyphicon-trash"></i></a></td>

                                        </tr>

                                        <script>
                                            $("#approve_lock1<?php echo $d; ?>").click(function() {
                                                if ($("#approve_lock1<?php echo $d; ?>").prop("checked")) {
                                                    $("#lock1<?php echo $d; ?>").val("Y");
                                                } else {
                                                    $("#lock1<?php echo $d; ?>").val("N");
                                                }
                                            });
                                        </script>
                                        <?php $d++; } ?>
                                    </tbody>
                                </table>

                                <?php $d=1; foreach ($td as $t) { ?>
                                <div id="approvemodal111<?php echo $d; ?>" class="modal fade">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content ">
                                            <div class="modal-header bg-info">
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                                <h5 class="modal-title">เพิ่มรายการ </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row" id="approvems111<?php echo $d; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    var one = "1";
                                    $('.accopen111<?php echo $d; ?>').click(function() {
                                        $('#approvems111<?php echo $d; ?>').html(
                                            "<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading..."
                                        );
                                        $("#approvems111<?php echo $d; ?>").load(
                                            '<?php echo base_url(); ?>share/member/<?php echo $d; ?>/' +
                                            one);
                                    });
                                </script>
                                <?php $d++; } ?>
                            </div> -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-xs-3">
                                    <a id="bd_inserttender" class="retrieve btn bg-info btn-xs"><i class="icon-plus2"></i>
                                        Add items
                                    </a>

                                </div>
                            </div>

                            <div class="row">

                                <table class="table table-hover table-striped table-xxs" id="res">
                                    <thead>
                                        <tr>

                                            <th style="text-align: center;">No.</th>
                                            <th style="text-align: center;" hidden>Job</th>
                                            <th style="text-align: center;">Job Name</th>
                                            <th style="text-align: center;">Amount</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tenderboday">
                                        <?php 
							$i=1; $n=0;
								foreach ($res1 as $key => $value) { ?>
                                        <tr>
                                            <td class="text-center">
                                                <?=$i;?><input type="hidden" name="chki[]" value="X"><input type="hidden"
                                                    name="bdd_no[]" value="<?=$value['bdd_no'];?>">
                                            </td>
                                            <td hidden><input type="text" name="bd_jobno[]" class="form-control input-xs" id="bd_jobno<?=$i;?>"
                                                    value="<?=$value['bdd_jobno'];?>" readonly="true" required=""></td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="bd_jobname[]" class="form-control input-xs"
                                                        id="bd_jobname<?=$i;?>" value="<?=$value['bdd_jobname'];?>"
                                                        readonly="true" required="">
                                                    <span class="input-group-btn">
                                                        <button type="button" data-toggle="modal" data-target="#search_detail<?=$i;?>"
                                                            attr="bd_jobname<?=$i;?>" class="sy<?=$i;?> btn btn-default btn-icon btn-xs"><i
                                                                class="icon-search4"></i></button>
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="text" name="bd_amount[]" class="txt form-control input-xs text-right " onchange="format(this)" onblur="if(this.value.indexOf('.')==-1)this.value=this.value+'.00'" value="<?php echo number_format($value['bdd_amount'],2);?>">
                                            </td>
                                            <td class="text-center"><a id="remove" data-popup="tooltip" title="" delid2="<?=$value['bdd_tenid'];?>"
                                                    delid1="<?=$value['bdd_jobno'];?>" data-original-title="Remove"
                                                    data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a></td>
                                        </tr>


                                        <div class="rowmat1"></div>
                                        <div class="modal fade" id="search_detail<?=$i;?>" data-backdrop="false">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Jop Type</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="panel-body">
                                                            <div class="row" id="detail_content<?=$i;?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <script>
                                            $(".sy<?=$i;?>").click(function() {
                                                var id = $(this).attr('attr');
                                                // alert(id);
                                                $("#detail_content<?=$i;?>").html(
                                                    "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
                                                );
                                                $("#detail_content<?=$i;?>").load(
                                                    '<?php echo base_url(); ?>share/system/<?=$i;?>'
                                                );
                                            });
                                        </script>
                                        <?php	
							$i++;	$n = $value['bdd_amount']+$n;
								}

							 ?>
                                    </tbody>
                                    <tbody>
                                        <tr id="summation">
                                            <th colspan="2" style="text-align: center;">Total</th>
                                            <th width="20%"><input type="text" id="totalresue" value="<?php echo number_format($n,2);?>" name=""
                                                    class="form-control input-xs" style="text-align:right;"></th>
                                            <th></th>
                                        </tr>
                                    </tbody>
                                </table>


                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-lg-3">


                                    <button type="submit" class="btn bg-success btn-xs" id="submit"><i class="icon-floppy-disk"></i>
                                        Save</button>

                                    <a id="fa_delect" class="btn bg-danger btn-xs" style="display: none;">Delect</a>
                                    <a id="fa_close" href="<?php echo base_url(); ?>bd/boq_openProject" class="btn bg-danger btn-xs"><i
                                            class="icon-close2"></i> Close</a>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="cost"></div>
                    <div class="modal fade" id="cowner" data-backdrop="false">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">รายการลูกหนี้</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="panel-body">
                                        <div class="row" id="owner">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="project" data-backdrop="false">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Project</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="panel-body">
                                        <div class="row" id="project_content">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="unit" data-backdrop="false">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Unit</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="panel-body">
                                        <div class="row" id="unit_content">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </form>



        <script type="text/javascript">
            $('body').attr('class', 'navbar-top pace-done');
            //Script sum Total Amount in tabjob


            $(".sy").click(function() {
                var id = $(this).attr('attr');
                // alert(id);
                $("#detail_content").html(
                    "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                $("#detail_content").load('<?php echo base_url(); ?>share/system');
            });
            $("#search_cus").click(function() {
                $('#owner').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                $("#owner").load('<?php echo base_url(); ?>share/debtor');
            });
            $("#search_pro").click(function() {
                $('#project_content').html(
                    "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                $("#project_content").load('<?php echo base_url(); ?>share/project');
            });
            $("#search_unit").click(function() {

                $('#unit_content').html(
                    "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                $("#unit_content").load('<?php echo base_url(); ?>share/unit');

            });
            $("#bd_date").change(function(event) {
                // alert($("#bd_date").val());
                var de_date = $("#bd_date").val();
                var y = de_date.slice(0, 4);
                var d = de_date.slice(8, 11);
                var m = de_date.slice(5, 7);
                $("#bd_year").val(y);
                $("#bd_month").val(m);
            });

            $(".txt").on("keydown keyup", function() {
                // if (event.which >= 37 && event.which <= 40) {
			    //     event.preventDefault();
                // }

                // var currentVal = $(this).val();
                // var testDecimal = testDecimals(currentVal);
                // if (testDecimal.length > 1) {
                //     console.log("You cannot enter more than one decimal point");
                //     currentVal = currentVal.slice(0, -1);
                // }
			    // $(this).val(replaceCommas(currentVal));
                calculateSum();
                
            });

          
            $(document).on('click', 'a#remove', function() { // <-- changes
                var self = $(this);
                var id = $(this).attr('delid1');
                var bdd_tenid = $(this).attr('delid2');
                // console.log(id);
                noty({
                    width: 200,
                    text: "Do you want to Delete "+id+" "+bdd_tenid+" ?",
                    type: self.data('type'),
                    dismissQueue: true,
                    timeout: 1000,
                    layout: self.data('layout'),
                    buttons: (self.data('type') != 'confirm') ? false : [{
                            addClass: 'btn btn-primary btn-xs',
                            text: 'Ok',
                            onClick: function($noty) { //this = button element, $noty = $noty element
                                $.post('<?php echo base_url(); ?>bd/del_approve_tender/' + bdd_tenid +
                                    '/' + id,
                                    function() {
                                        /*optional stuff to do after success */
                                    }).done(function(data) {
                                    // console.log(data);
                                    var json_res = jQuery.parseJSON(data);
                                    if (json_res.status == "true") {
                                        $noty.close();
                                        self.closest('tr').remove();
                                        noty({
                                            force: true,
                                            text: 'Deleteted',
                                            type: 'success',
                                            layout: self.data('layout'),
                                            timeout: 1000
                                        });
                                    } else {
                                        alert("ไม่สามารถลบได้");
                                    }
                                });

                            }
                        },
                        {
                            addClass: 'btn btn-danger btn-xs',
                            text: 'Cancel',
                            onClick: function($noty) {
                                $noty.close();
                                noty({
                                    force: true,
                                    text: 'You clicked "Cancel" button',
                                    type: 'error',
                                    layout: self.data('layout'),
                                    timeout: 1000,
                                });
                            }
                        }
                    ]
                });

                return false;


            });
        </script>



        <script>
            $("#bd_inserttender").click(function() {
                addrow();
                var check_dis = $('#submit').attr('disabled');
                if (check_dis == 'disabled') {
                    $('#submit').removeAttr('disabled');
                }

            });

            function addrow() {
                var row = ($('#tenderboday tr').length) - 0 + 1;
                var tr = '<tr id="' + row + '">' +
                    '<td class="text-center">' + row + '<input type="hidden" name="chki[]"  value="Z"></td>' +
                    '<td width="20%" hidden><input type="text" name="bd_jobno[]" id="bd_jobno' + row +
                    '" class="input-xs form-control" readonly="true"></td>' +
                    '<td><div class="input-group"><input type="text" name="bd_jobname[]" id="bd_jobname' + row +
                    '" class="form-control input-xs" readonly="true"><span class="input-group-btn"><button type="button" data-toggle="modal" data-target="#sycode' +
                    row + '" class="sycode' + row +
                    ' btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button></span></div></td>' +
                    '<td><input type="text" name="bd_amount[]" id="bd_amount" class="txt input-xs  form-control" value="" onchange="format(this)" onblur="if(this.value.indexOf(".")==-1)this.value=this.value+".00" style="text-align:right;"></td>' +

                    '<td class="text-center">' +
                    '<a id="remove" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>' +

                    '</td>' +

                    '</tr>';

                $('#tenderboday').append(tr);




                var cost = '<div class="modal fade" id="sycode' + row + '" data-backdrop="false">' +
                    '<div class="modal-dialog modal-lg">' +
                    '<div class="modal-content">' +
                    '<div class="modal-header bg-info">' +
                    '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                    '<h4 class="modal-title" id="myModalLabel">Ref. Asset Code</h4>' +
                    ' </div>' +
                    '<div class="modal-body">' +
                    '<div id="sy' + row + '"></div>' +

                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                $('.cost').append(cost);

                $('.sycode' + row + '').click(function() {
                    $('#sy' + row + '').html(
                        "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                    $("#sy" + row + "").load('<?php echo base_url(); ?>share/system/' + row);
                });


                $(".txt").on("keydown keyup", function() {
                    // 	if (event.which >= 37 && event.which <= 40) {
                    //         event.preventDefault();
                    //     }
                    //     var currentVal = $(this).val();
                    // var testDecimal = testDecimals(currentVal);
                    // if (testDecimal.length > 1) {
                    //     console.log("You cannot enter more than one decimal point");
                    //     currentVal = currentVal.slice(0, -1);
                    // }
                    // $(this).val(replaceCommas(currentVal));
                    calculateSum();
                });

            }

            // calculateSum();

             function calculateSum() {
                var sum = 0;
                //iterate through each textboxes and add the values
                $(".txt").each(function() {
                    //add only if the value is number
                    if (!isNaN($(this).val().replace(/,/g, "")) && $(this).val().replace(/,/g, "").length != 0) {
                        sum += parseFloat($(this).val().replace(/,/g, ""));
                        $(this).css("background-color", "#FEFFB0");
                        console.log(sum);
                        //alert(sum)
                    }
                    // else if (this.value.length != 0){
                    //     $(this).css("background-color", "red");
                    // }
                });

                $("input#totalresue").val(numberWithCommas(sum));
            }
        </script>
        <script type="text/javascript">
            $("form").submit(function(event) {
                $(".loading").show();
            });


            $('#boq').attr('class', 'active');
            $('#archive_boq').attr('style', 'background-color:#dedbd8');
        </script>


        <script>
            $("#bd_member").click(function() {
                addrow1();

            });

            function addrow1() {
                var row = ($('#body1 tr').length) - 0 + 1;
                var tr = '<tr id="' + row + '">' +
                    '<td class="text-center">' + row + '<input type="hidden" name="chkpr[]" value="X"></td>' +
                    '<td><input type="text" class="form-control input-sm text-center" id="approve_sequence' + row +
                    '" name="approve_sequence[]" value="' + row + '"></td>' +
                    '<td><input type="text" class="form-control input-sm " id="approve_mid1' + row +
                    '" name="approve_mid[]" value="" readonly></td>' +
                    '<td>' +
                    '<div class="input-group">' +
                    '<input type="text" name="approve_mname[]" id="approve_mname1' + row +
                    '"  class="form-control input-xs" readonly>' +
                    '<span class="input-group-btn" >' +
                    '<button type="button" class="accopen btn btn-info btn-sm" id="approvem1' + row +
                    '" data-toggle="modal" data-target="#approvemodal1' + row +
                    '" ><i class="icon-search4"></i></button>' +
                    ' </span>' +
                    '</div>' +
                    '</td>' +
                    '<td><input type="text" class="form-control input-sm" id="approve_position' + row +
                    '" name="approve_position[]" value=""></td>' +
                    '<td style="text-align: center;"><input type="checkbox" class="input-sm" id="approve_lock1' + row +
                    '" name="approve_lock[]"><input type="hidden" name="lock1[]" id="lock11" value="N"></td>' +
                    '<td class="text-center">' +
                    '<a id="removepr' + row +
                    '" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>' +

                    '</td>' +

                    '</tr>';



                $('#body1').append(tr);

                $(document).on('click', 'a#removepr' + row + '', function() { // <-- changes

                    var self = $(this);
                    noty({
                        width: 200,
                        text: "Do you want to Delete?",
                        type: self.data('type'),
                        dismissQueue: true,
                        timeout: 1000,
                        layout: self.data('layout'),
                        buttons: (self.data('type') != 'confirm') ? false : [{
                                addClass: 'btn btn-primary btn-xs',
                                text: 'Ok',
                                onClick: function($noty) { //this = button element, $noty = $noty element
                                    $noty.close();
                                    self.closest('tr').remove();
                                    noty({
                                        force: true,
                                        text: 'Deleteted',
                                        type: 'success',
                                        layout: self.data('layout'),
                                        timeout: 1000,
                                    });

                                }
                            },
                            {
                                addClass: 'btn btn-danger btn-xs',
                                text: 'Cancel',
                                onClick: function($save) {
                                    $save.close();
                                    save({
                                        force: true,
                                        text: 'You clicked "Cancel" button',
                                        type: 'error',
                                        layout: self.data('layout'),
                                        timeout: 1000,
                                    });
                                }
                            }
                        ]
                    });

                    return false;


                });

                $("#approve_lock1" + row + "").click(function() {
                    if ($("#approve_lock1" + row + "").prop("checked")) {
                        $("#lock1" + row + "").val("Y");
                    } else {
                        $("#lock1" + row + "").val("N");
                    }

                });

                $("#approve_cost" + row + "").keydown(function() {
                    var approve_costw = $("#approve_cost" + roww + "").val();
                    var approve_cost = $("#approve_cost" + row + "").val();
                    if (approve_costw < approve_cost) {
                        $("#approve_cost" + row + "").val("0.00");
                    }

                });
                var one = "1";
                var rowmat1 = ' <div id="approvemodal1' + row + '" class="modal fade">' +
                    '<div class="modal-dialog modal-lg">' +
                    '<div class="modal-content ">' +
                    '<div class="modal-header bg-info">' +
                    '<button type="button" class="close" data-dismiss="modal">&times;</button>' +
                    '<h5 class="modal-title">เพิ่มรายการ</h5>' +
                    '</div>' +
                    '<div class="modal-body">' +
                    '<div class="row" id="approvems1' + row + '">' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';

                $('#approvem1' + row).click(function() {
                    $('#approvems1' + row).html(
                        "<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
                    $("#approvems1" + row).load('<?php echo base_url(); ?>share/member/' + row + '/' + one);
                });
                $('.rowmat1').append(rowmat1);


            }




            var timeoutID;

            function delayedAlert() {
                timeoutID = window.setTimeout(refrshna, 1500);
            }

            function refrshna() {
                $('#res').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
                $("#res").load('<?php echo base_url(); ?>asset_active/getlesssetup/');
            }
             $(".alpaca-currency").kendoNumericTextBox({
              round: false
            });
        </script>