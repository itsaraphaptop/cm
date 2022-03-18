<!-- Main content  trans-->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Home - Open Bill of
                        Material</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>bd/main_index"><i class="icon-home2 position-left"></i> Cost
                        Control</a></li>
                <li><a href="<?php echo base_url(); ?>bd/master_bom">BOM</a></li>
            </ul>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <form method="post" action="<?php echo base_url(); ?>bd/update_bom/<?= $bom['header'][0]['bom_code'] ?>">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-offset-1 col-sm-1">Code : </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="bom_code" value="<?= $bom['header'][0]['bom_code'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-offset-1 col-sm-1">BOM Description : </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="bom_descrip" value="<?= $bom['header'][0]['bom_descrip'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-horizontal">
                        <div class="form-group">
                            <button class="btn btn-success" type="submit"><i class=" icon-floppy-disk"></i> บันทึก</button>
                            <a href="#" id="addboq" class="btn btn-warning"><i class="icon-plus-circle2"></i> Insert
                                row</a>
                        </div>
                    </div>
                    <div class="form-horizontal">
                        <div class="table-responsive" style="overflow-x:auto;">
                            <table class="table table-hover table-striped table-xxs" style="width: 150%">
                                <thead>
                                    <tr>
                                        <th>
                                            <div style="width: 10px;">No.</div>
                                        </th>
                                        <th>
                                            <div style="width: 10px;"></div>
                                        </th>
                                        <th>
                                            <div style="width: 200px;">Material Code</div>
                                        </th>
                                        <th>
                                            <div style="width: 200px;">Material Name</div>
                                        </th>
                                        <th>
                                            <div style="width: 20px;"></div>
                                        </th>
                                        <th>
                                            <div style="width: 150px;">Type</div>
                                        </th>
                                        <th>
                                            <div style="width: 150px;">Description</div>
                                        </th>
                                        <th>
                                            <div style="width: 150px;">QTY</div>
                                        </th>
                                        <th>
                                            <div style="width: 150px;">Unit Code</div>
                                        </th>
                                        <th>
                                            <div style="width: 150px;">Unit Name</div>
                                        </th>
                                        <th>
                                            <div style="width: 150px;">Price/Unit</div>
                                        </th>
                                        <th>
                                            <div style="width: 150px;">Amount</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="matbaran">


                                    <?php
										$i = 0;
										foreach ($bom['detail'] as $key => $value) {
										$i++ ;
									?>
                                    <tr>
                                        <td>
                                            <?= $i ?> <input type="hidden" name="chk[]" value="u"> <input type="hidden"
                                                name="id[]" value="<?= $value['id'] ?>">
                                        </td>
                                        <td><a class="delete" bom_id="<?= $value['id'] ?>"><i class="icon-trash"></i></a></td>
                                        <td>
                                            <input type="text" id="newmatcode<?= $value['id'] ?>" name="mat_code[]"
                                                value="<?= $value['mat_code'] ?>" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="mat_name[]" id="matnamei<?= $value['id'] ?>" class="form-control"
                                                value="<?= $value['mat_name'] ?>">
                                        </td>
                                        <td>
                                            <button type="button" attr-id="<?= $value['id'] ?>" class="getcc btn btn-primary"><i
                                                    class="glyphicon glyphicon-search"></i></button>
                                        </td>
                                        <td>
                                            <select class="form-control" name="type[]" required="true">
                                                <?php 
														if ($value['type'] == 'M') {
															$msel ='selected="selected"';
															$lsel ='';
															$ssel ='';
														}else if ($value['type'] == 'L') {
															$msel ='';
															$lsel ='selected';
															$ssel ='';
														}else if ($value['type'] == 'S') {
															$msel ='';
															$lsel ='';
															$ssel ='selected';
														}
														// $value['type']; 
													?>
                                                <option value="M" <?=$msel;?> >Material</option>
                                                <option value="L" <?=$lsel;?> >Labor</option>
                                                <option value="S" <?=$ssel;?> >Subc</option>
                                            </select>
                                        </td>
                                        <td>

                                            <input type="text" class="form-control input-xs" num="<?= $value['id'] ?>"
                                                name="desc[]" value="<?= $value['desc'] ?>">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control input-xs qty_row" id="qty<?= $value['id'] ?>"
                                                num="<?= $value['id'] ?>" name="qty[]" value="<?= number_format($value['qty']) ?>">
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" num="3" name="unit_code[]" id="uc<?= $value['id'] ?>"
                                                    class="form-control input-xs unit_code" value="<?= $value['unit_code'] ?>">
                                                <span class="input-group-btn find-unit" num="3">
                                                    <span class="input-group-btn">
                                                        <a class="btn btn-default btn-icon unit_row" attr-id="<?= $value['id'] ?>"><i
                                                                class="icon-search4"></i>
                                                        </a>
                                                    </span>
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control input-xs" num="<?= $value['id'] ?>"
                                                id="un<?= $value['id'] ?>" name="unit_name[]" value="<?= $value['unit_name'] ?>">

                                        </td>
                                        <td>
                                            <input type="text" class="form-control input-xs price_row text-right" id="price<?= $value['id'] ?>"
                                                num="<?= $value['id'] ?>" name="price[]" value="<?= number_format($value['price']) ?>">
                                        </td>
                                        <td>
                                            <?php 

												?>
                                            <input type="text" class="form-control input-xs amount text-right" num="<?= $value['id'] ?>"
                                                id="amount<?= $value['id'] ?>" name="amount[]" value="<?= number_format(($value['qty']*$value['price'])) ?>">
                                        </td>
                                    </tr>
                                    <?php
											// var_dump($value['mat_code']);
									}
									?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /content area -->

</div>
<!-- /main content -->

<script type="text/javascript">
    $('.unit_row').click(function() {
        var id = $(this).attr('attr-id');
        // alert(id);
        $('#unit').modal('show');
        $('#row_tr').val(id);
        $('#type_click').val('update');
    })
    $('.qty_row , .price_row').keyup(function() {
        var num = $(this).attr('num');
        var qty = $('#qty' + num).val();
        var price = $('#price' + num).val();
        var amount = (qty * 1) * (price * 1);
        $("#amount" + num).val(amount);
    });

    $('.delete').click(function(event) {
        var btn = $(this);

        var bom_id = btn.attr('bom_id');
        $.post('<?php echo base_url(); ?>bd/del_bom', {
            id: bom_id
        }, function() {}).done(function(data) {
            var res = jQuery.parseJSON(data);
            if (res.status) {
                btn.parent().parent().remove();

            } else {
                console.log(res.status);
            }

        });
    });
</script>

<!-- Modal -->

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">


        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">เพิ่มรายการ</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontalr">
                    <div class="form-group">
                        <label class="radio-inline">
                            <input type="radio" name="radio-inline-left" id="matrd1" class="styled">
                            Material Group
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="radio-inline-left" id="matrd2" class="styled" checked="">
                            Material Name
                        </label>
                    </div>

                    <div class="form-group">
                        <div class="has-feedback has-feedback-left">
                            <input type="text" class="form-control input-xlg" id="textnn" placeholder="Filter By Material Name">
                            <div class="form-control-feedback">
                                <i class="icon-search4 text-muted text-size-base"></i>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $('body').attr('class', 'navbar-top pace-done');

                        $("#textnn").keyup(function() {
                            if ($("#matrd1").is(":checked")) {
                                var url = "<?php echo base_url() ?>share/material_id_alone_group";

                                var dataSet = {
                                    name: $("#textnn").val(),
                                };
                                alert(url);
                                $.post(url, dataSet, function(data) {
                                    $("#matbaran").html(data);
                                    // console.log(data);
                                    // alert(data);
                                });
                            } else if ($("#matrd2").is(":checked")) {
                                var url = "<?php echo base_url() ?>share/material_id_alone";

                                var dataSet = {
                                    name: $("#textnn").val(),
                                };
                                $.post(url, dataSet, function(data) {
                                    // console.log(data);
                                    $("#matbaran").html(data);
                                    // alert(data);
                                });
                            } else {
                                alert("7777");
                            }

                        });
                    </script>

                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>รหัสวัสดุ</th>
                            <th></th>
                            <th>ชื่อวัสดุ</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody id="matbaran">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div id="mat"></div>
<div id="mat1"></div>

<script type="text/javascript">
    $("#addboq").click(function() {
        addrow();
    });

    function addrow() {
        var num = ($('#matbaran tr').length) + 1;
        var tr = '<tr >' +
            '<td>' + num + '<input type="hidden" name="chk[]" value="i"></td>' +
            '<td>' +
            // '<a><i class="icon-pencil7"></i></a>'+
            '<a class="delete"><i class="icon-trash"></i></a>' +
            '</td>' +
            '<td><input type="text" id="newmatcode' + num + '" class="form-control" num="' + num +
            '" name="mat_code[]" required="true"></td>' +
            '<td><input type="text" id="newmatname' + num + '" class="form-control" num="' + num +
            '" name="mat_name[]"></td>' +
            '<td>' +
            '<a class="openunn' + num + ' btn btn-primary" data-toggle="modal" data-target="#opnewmat' + num +
            '"><i class="glyphicon glyphicon-search"></i></a>' +
            // '<a class="openunnn'+num+' btn btn-primary" data-toggle="modal" data-target="#opnewmat2'+num+'"><i class="glyphicon glyphicon-search"></i> ค้นหา</a>'+
            '</td>' +
            '<td>' +
            '<select class="form-control" name="type[]" required="true">' +
            '<option value="M">Material</option>' +
            '<option value="L">Labor.</option>' +
            '<option value="S">Subc.</option>' +
            '</select>' +
            '</td>' +
            '<td><input type="text" class="form-control" num="' + num + '" name="desc[]"></td>' +
            '<td><input type="number" class="form-control qty" num="' + num + '" id="qty' + num +
            '" name="qty[]" required="true"></td>' +
            '<td><div class="input-group"><input  type="text" num="' + num +
            '" name="unit_code[]" class="form-control unit_code" id="unit_code_' + num + '" required="true">' +
            '<span class="input-group-btn find-unit" num="' + num + '" >' +
            '<span class="input-group-btn">' +
            '<a class="btn btn-default btn-icon unit_num" num="' + num + '" data-toggle="modal" data-target="#">' +
            '<i class="icon-search4"></i>' +
            '</a>' +
            '</span>' +
            '</span>' +
            '</div>' +
            '</td>' +
            '<td><input type="text" class="form-control unit_name" id="unit_name_' + num + '" num="' + num +
            '" name="unit_name[]" required="true"></td>' +
            '<td><input type="number" class="form-control price" num="' + num + '"  id="price' + num +
            '" name="price[]" required="true"></td>' +
            '<td><input type="text" class="form-control" name="amount[]" num="' + num + '" id="amount' + num +
            '" required="true"></td>' +
            '</tr>';

        $('#matbaran').append(tr);
        $('.unit_num').click(function() {
            $('#type_click').val('insert');
        })
        $('.qty , .price').keyup(function() {
            var num = $(this).attr('num');
            var qty = $('#qty' + num).val();
            var price = $('#price' + num).val();
            var amount = (qty * 1) * (price * 1);
            $("#amount" + num).val(amount);


        });


        $(".find-unit").click(function(event) {
            var num_unit_temp = $(this).attr('num');

            $("#temp_num_id").val(num_unit_temp);
            $("#unit").modal('show');
        });
        var mat = '<div id="opnewmat' + num + '" class="modal fade" data-backdrop="false">' +
            '<div class="modal-dialog modal-full">' +
            '<div class="modal-content ">' +
            '<div class="modal-header">' +
            '<button type="button" class="close" data-dismiss="modal">&times;</button>' +
            '<h5 class="modal-title">เพิ่มรายการ</h5>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div class="row" id="modal_matdd' + num + '"></div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        $('#mat').append(mat);

        $(".openunn" + num + "").click(function() {
            $("#modal_matdd" + num + "").html(
                "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
            $("#modal_matdd" + num + "").load('<?php echo base_url(); ?>share/getmatcode/' + num);
        });
    }
</script>


<div id="costcode" class="modal fade" data-backdrop="false">
    <div class="modal-dialog modal-full">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">เพิ่มรายการ</h5>
            </div>
            <div class="modal-body">
                <div class="row" id="modal_matddedit"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.getcc').click(function() {
        var id = $(this).attr('attr-id');
        // alert(id);
        $('#costcode').modal('show');
        $("#modal_matddedit").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#modal_matddedit").load('<?php echo base_url(); ?>share/getmatcode/' + id);
        // alert('getcc')
    });
</script>

<div id="unit" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">เลือกหน่วย</h4>
            </div>
            <div class="modal-body">
                <table class="table table-hover" id="tbTender" align="center">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>หน่วย</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
        			$i = 1;
        			foreach ($unit as $key => $data) {
        		?>
                        <tr>
                            <td>
                                <?= $i ?>
                            </td>
                            <td>
                                <?= $data['unit_name']?>
                            </td>
                            <td>
                                <button class="unit_p btn btn-info btn-xs" data-dismiss="modal" unit_name="<?= $data['unit_name']?>"
                                    unit_code="<?= $data['unit_code']?>">เลือก</button>
                            </td>
                        </tr>

                        <?php
        		$i++;
        		}
        		?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <input type="hidden" name="" id="temp_num_id" value="0">
        <input type="hidden" name="" id="type_click" value="0">
        <input type="hidden" name="" id="row_tr" value="0">

    </div>
</div>
<script type="text/javascript">
    $('.unit_p').click(function() {

        var name = $(this).attr('unit_name');
        var code = $(this).attr('unit_code');
        var num_row = $("#temp_num_id").val();
        var type = $("#type_click").val();
        var row_tr = $("#row_tr").val();
        //atiwat
        if (type == 'insert') {
            $("#unit_code_" + num_row).val(code);
            $("#unit_name_" + num_row).val(name);
        } else if (type == 'update') {
            $("#uc" + row_tr).val(code);
            $("#un" + row_tr).val(name);
        }


    });
    $('#tbTender').DataTable();

    $('#bom').attr('class', 'active');
    $('#archive-bom').attr('style', 'background-color:#dedbd8');
</script>