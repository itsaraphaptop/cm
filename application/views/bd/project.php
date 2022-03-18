<!-- Main content  trans-->
<div class="loading" style="display: none;"></div>
<form class="form-horizontal" action="<?php echo base_url(); ?>bd_active/bd_pjtender" method="post">
    <div class="panel panel-flat">
        <div class="panel-body">
            <div class="row">
                <div class="panel-body">
                    <div class="col-md-5">
                        <h4 class="panal-title">Tender Project <p></p>
                        </h4>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tender No :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="bd_tenid" name="bd_tenid" readonly="">
                                <input type="hidden" class="form-control" id="bd_chk" name="bd_chk" value="I">
                            </div>
                        </div>

                        <script type="text/javascript">
                            $("#bd_type1").click(function() {
                                var ch = $(this).prop('checked');
                                if (ch == true) {
                                    $(this).val(1);
                                } else if (ch == false) {
                                    $(this).val(0);
                                }
                            });
                        </script>

                        <!-- <div class="form-group">
                            <label class="col-sm-3 control-label">Project No :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="bd_pno" name="bd_pno" readonly="">
                            </div>
                        </div> -->

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tender Name :</label>
                            <div class="col-md-8">
                                <!-- <input type="text" class="form-control" id="bd_pname" maxlength="100" name="bd_pname"> -->
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
                            data: ""
                        });
                        </script>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Date :</label>
                            <div class="col-md-8">
                                <input type="date" class="form-control" id="bd_date" name="bd_date">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Year :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="bd_year" name="bd_year" readonly="">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Month :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="bd_month" name="bd_month" readonly="">
                                <input type="hidden" name="type_in" value="project">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="bd_bdstatus" value="Wait" readonly="true">
                                <input type="hidden" name="bd_bdstats" value="2">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label">Customer/Owner :</label>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="text" class="form-control input-xs" name="bd_cus" id="bd_cus" readonly="true">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="input-group">
                                    <input type="text" class="form-control input-xs" name="bd_cusn" id="bd_cusn"
                                        readonly="true">
                                    <span class="input-group-btn">
                                        <button type="button" data-toggle="modal" data-target="#cowner" id="search_cus"
                                            class="btn btn-default btn-icon btn-xs">
                                            <i class="icon-search4"></i>
                                        </button>
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
                                <input type="text" class="form-control" id="bidbond" name="bidbond">
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Bid Bond Amount:</label>
                            <div class="col-sm-8">
                                <input type="text" id="alpaca-currency" class="text-right" style="width:100%" name="bondprice">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Bid Bond Date:</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="bidbonddate" name="bidbonddate">
                            </div>
                        </div>
                    </div>
                    <script>
                    // $(document).ready(function(){
                    $("#alpaca-currency").kendoNumericTextBox({
                                round: false
                                });
                    // });
                    </script>
                    <!-- <div class="col-sm-7">
                        <div class="col-xs-12">

                            <h4>Setup Appove</h4>

                            <p>
                                <a id="bd_member" class="retrieve btn bg-info btn-xs">
                                    <i class="icon-plus2"></i> Add Approve</a>
                            </p>

                            <br>
                            <table class="table table-hover table-striped table-xxs" id="res">
                                <thead>
                                    <tr>
                                        <th width="5%" style="text-align: center;">NO.</th>
                                        <th width="5%" style="text-align: center;">sequence</th>
                                        <th width="5%" class="text-center">Member ID</th>
                                        <th width="20%" style="text-align: center;">Member Name</th>
                                        <th width="10%" class="text-center">Position</th>
                                        <th width="10%" class="text-center">Lock</th>
                                        <th width="10%" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="body1">
                                </tbody>
                            </table>
                        </div>
                    </div> -->
                    <div class="col-xs-12">
                        <div class="form-group">
                            <a id="bd_inserttender" class="retrieve btn bg-info btn-xs">
                                <i class="icon-plus2"></i> Add JOB</a>
                            <p></p>

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

                                </tbody>
                                <tbody>
                                    <tr id="summation">
                                        <th colspan="2" style="text-align: center;">Total</th>
                                        <th width="20%">
                                            <input type="text" id="totalresue" name="" class="form-control" style="text-align:right;">
                                        </th>
                                        <th></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="form-group">
                            <a type="button" onclick="history.go(0)" class="btn bg-teal-400 btn-xs">New</a>
                            <button type="submit" class="btn bg-success btn-xs" id="submit" disabled="disabled"> <i class="icon-floppy-disk"></i> Save</button>
                            <a id="fa_delect" class="btn bg-danger btn-xs">Delete</a>
                            <a id="fa_close" href="<?php echo base_url(); ?>bd/boq_openProject" class="btn bg-danger btn-xs">
                                <i class="icon-close2"></i> Close</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cowner" data-backdrop="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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

    <div class="rowmat1"></div>
    <div class="cost"></div>
    <script>
        $("#fa_delect").click(function() {
			var bd_tenid = $("#bd_tenid").val();
			window.location = '<?php echo base_url(); ?>bd_active/del_bd/' +
				bd_tenid;
		});
	</script>
    <script>
        $("#fa_delect").hide();
	</script>
</form>
<div class="modal fade" id="retrieve" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Bid Project Tender</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    <div class="row" id="tender">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(".retrieve").click(function() {
            $('#tender').html(
                "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
            );
            $("#tender").load('<?php echo base_url(); ?>bd/bdtender');
        });
    </script>

    <script>
        $('body').attr('class', 'navbar-top pace-done sidebar-secondary');
        $("#search_cus").click(function() {
            $('#owner').html(
                "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
            );
            $("#owner").load('<?php echo base_url(); ?>share/debtor');
             var check_dis = $('#submit').attr('disabled');
            if (check_dis == 'disabled') {
                $('#submit').removeAttr('disabled');
            }
        });
        $("#search_pro").click(function() {
            $('#project_content').html(
                "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
            );
            $("#project_content").load(
                '<?php echo base_url(); ?>share/project');
        });
        $("#search_unit").click(function() {
            $('#unit_content').html(
                "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
            );
            $("#unit_content").load('<?php echo base_url(); ?>share/unit');
        });
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
                '<td class="text-center">' + row +
                '<input type="hidden" name="chki[]" id="chki" class="form-control input-xs" readonly="true" value="Y"></td>' +
                '<td width="20%" hidden><input type="text" name="bd_jobno[]" id="bd_jobno' + row +
                '" class="input-xs form-control" readonly="true"></td>' +
                '<td><div class="input-group"><input type="text" name="bd_jobname[]" id="bd_jobname' + row +
                '" class="form-control input-xs" readonly="true"><span class="input-group-btn"><button type="button" data-toggle="modal" data-target="#sycode' +
                row + '" class="sycode' + row +
                ' btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button></span></div></td>' +
                '<td><input type="text" name="bd_amount[]" id="bd_amount'+row+'" class="input-xs txt form-control" onchange="format(this)" onblur="if(this.value.indexOf(".")==-1)this.value=this.value+".00" style="text-align:right;"></td>' +
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
                '<h4 class="modal-title" id="myModalLabel">Jop Type</h4>' +
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
                    "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
                );
                $("#sy" + row + "").load('<?php echo base_url(); ?>share/system/' + row);
            });
            calculateSum();
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
            //  $('#bd_amount'+row+'').each(function(index){
            //      $(this).priceFormat({prefix: '', thousandsSeparator: ','});
            // });
        }
        $(document).on('click', 'a#remove', function() { // <-- changes
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
        $('input').addClass('input-xs');
    </script>
    <script type="text/javascript">
        $("form").submit(function(event) {
            $(".loading").show();
        });
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
                '" data-toggle="modal" data-target="#approvemodal1' + row + '" ><i class="icon-search4"></i></button>' +
                '</span>' +
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
                    "<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading..."
                );
                $("#approvems1" + row).load('<?php echo base_url(); ?>share/member/' +
                    row + '/' + one);
            });
            $('.rowmat1').append(rowmat1);


        }




        var timeoutID;

        function delayedAlert() {
            timeoutID = window.setTimeout(refrshna, 1500);
        }

        function refrshna() {
            $('#res').html(
                "<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading..."
            );
            $("#res").load(
                '<?php echo base_url(); ?>asset_active/getlesssetup/');
        }
    </script>
    <script>
        $("#bd_date").change(function(event) {
            var de_date = $("#bd_date").val();
            var y = de_date.slice(0, 4);
            var d = de_date.slice(8, 11);
            var m = de_date.slice(5, 7);
            $("#bd_year").val(y);
            $("#bd_month").val(m);

        });
        
    </script>