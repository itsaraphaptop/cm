<div class="content-wrapper">
    <div class="content">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Setup Running<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                    <div class="heading-elements">
                        <!-- <button type="button" class="btn btn-default btn-sm"><i class="icon-plus3"></i> Add Rows</button> -->
                        <button type="button" id="save" class="btn btn-default btn-sm"><i class="icon-floppy-disk"></i> Save</button>
                        <a href="<?php echo base_url();?>data_master/main_index" class="btn btn-default btn-sm preload"><i class="icon-arrow-left52"></i> Close</a>
                    </div>	
                </div>

                <div class="panel-body">
					<div class="tabbable tab-content-bordered">
						<ul class="nav nav-tabs nav-tabs-component">
							<li class="active"><a href="#tab-runding" data-toggle="tab"><i class="icon-folder6 position-left"></i>Running</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab-runding">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                        <form id="sendpost" action="<?php echo base_url();?>data_master/number_active" method="post" enctype="multipart/form-data">
                                            <table class="table table-striped table-xxs table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" width="5%">No.</th>
                                                        <th class="text-center" width="5%">Module</th>
                                                        <th class="text-center" width="10%">Prefix</th>
                                                        <th class="text-center" width="20%">Type</th>
                                                        <th class="text-center" width="40%">Running</th>
                                                        <th class="text-center" width="10%">Satus</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">1.</td>
                                                        <td class="text-center">Tender<input type="hidden" class="form-control input-sm" name="id[]" value="<?php if(isset($res[0]['id'])){echo $res[0]['id'];}else{echo "";}?>"></td>
                                                        <td><input type="text" class="form-control input-sm" name="prefix[]" value="<?php if(isset($res[0]['prefix'])){echo $res[0]['prefix'];}else{echo "";}?>"></td>
                                                        <td>
                                                            <select class="form-control  input-sm" name="type[]">
                                                                <?php if($res[0]['type'] == '1'){ ?><option value="1" selected>YYMM</option><?php } else { ?><option value="1">YYMM</option><?php }?>
                                                                <?php if($res[0]['type'] == '2'){ ?><option value="2" selected>MMYY</option><?php } else { ?><option value="2">MMYY</option><?php }?>
                                                                <?php if($res[0]['type'] == '3'){ ?><option value="3" selected>YYYYMM</option><?php } else { ?><option value="3">YYYYMM</option><?php }?>
                                                                <?php if($res[0]['type'] == '4'){ ?><option value="4" selected>MMYYYY</option><?php } else { ?><option value="4">MMYYYY</option><?php }?>
                                                                <?php if($res[0]['type'] == '5'){ ?><option value="5" selected>YYYYMMDD</option><?php } else { ?><option value="5">YYYYMMDD</option><?php }?>
                                                                <?php if($res[0]['type'] == '6'){ ?><option value="6" selected>DDMMYYYY</option><?php } else { ?><option value="6">DDMMYYYY</option><?php }?>
                                                                <!-- <?php if($res[0]['type'] == '7'){ ?><option value="7" selected>PJCODE-YYMM</option><?php } else { ?><option value="7">PJCODE-YYMM</option><?php }?>
                                                                <?php if($res[0]['type'] == '8'){ ?><option value="8" selected>PJCODE-MMYY</option><?php } else { ?><option value="8">PJCODE-MMYY</option><?php }?>
                                                                <?php if($res[0]['type'] == '9'){ ?><option value="9" selected>PJCODE-YYYYMM</option><?php } else { ?><option value="9">PJCODE-YYYYMM</option><?php }?>
                                                                <?php if($res[0]['type'] == '10'){ ?><option value="10" selected>PJCODE-MMYYYY</option><?php } else { ?><option value="10">PJCODE-MMYYYY</option><?php }?>
                                                                <?php if($res[0]['type'] == '11'){ ?><option value="11" selected>PJCODE-YYYYMMDD</option><?php } else { ?><option value="11">PJCODE-YYYYMMDD</option><?php }?>
                                                                <?php if($res[0]['type'] == '12'){ ?><option value="12" selected>PJCODE-DDMMYYYY</option><?php } else { ?><option value="12">PJCODE-DDMMYYYY</option><?php }?> -->
                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="form-control input-sm" placeholder="0000" maxlength="4" name="running[]" value="<?=$res[0]['running']?>"></td>
                                                        <td>
                                                            <select class="form-control input-sm" name="status[]" id="">
                                                                <?php if($res[0]['status'] == '1'){ ?><option value="1" selected>active</option><?php } else { ?><option value="1">active</option><?php }?>
                                                                <?php if($res[0]['status'] == '2'){ ?><option value="1" selected>Inactive</option><?php } else { ?><option value="2">Inactive</option><?php }?>
                                                                <!-- <option value="1">active</option>
                                                                <option value="2">Inactive</option> -->
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">2.</td>
                                                        <td class="text-center">PR<input type="hidden" class="form-control input-sm" name="id[]" value="<?php if(isset($res[1]['id'])){echo $res[1]['id'];}else{echo "";}?>"></td>
                                                        <td><input type="text" class="form-control input-sm" name="prefix[]" value="<?php if(isset($res[1]['prefix'])){echo $res[1]['prefix'];}else{echo "";}?>"></td>
                                                        <td>
                                                            <select class="form-control  input-sm" name="type[]">
                                                                <?php if($res[1]['type'] == '1'){ ?><option value="1" selected>YYMM</option><?php } else { ?><option value="1">YYMM</option><?php }?>
                                                                <?php if($res[1]['type'] == '2'){ ?><option value="2" selected>MMYY</option><?php } else { ?><option value="2">MMYY</option><?php }?>
                                                                <?php if($res[1]['type'] == '3'){ ?><option value="3" selected>YYYYMM</option><?php } else { ?><option value="3">YYYYMM</option><?php }?>
                                                                <?php if($res[1]['type'] == '4'){ ?><option value="4" selected>MMYYYY</option><?php } else { ?><option value="4">MMYYYY</option><?php }?>
                                                                <?php if($res[1]['type'] == '5'){ ?><option value="5" selected>YYYYMMDD</option><?php } else { ?><option value="5">YYYYMMDD</option><?php }?>
                                                                <?php if($res[1]['type'] == '6'){ ?><option value="6" selected>DDMMYYYY</option><?php } else { ?><option value="6">DDMMYYYY</option><?php }?>
                                                                <?php if($res[1]['type'] == '7'){ ?><option value="7" selected>PJCODE-YYMM</option><?php } else { ?><option value="7">PJCODE-YYMM</option><?php }?>
                                                                <?php if($res[1]['type'] == '8'){ ?><option value="8" selected>PJCODE-MMYY</option><?php } else { ?><option value="8">PJCODE-MMYY</option><?php }?>
                                                                <?php if($res[1]['type'] == '9'){ ?><option value="9" selected>PJCODE-YYYYMM</option><?php } else { ?><option value="9">PJCODE-YYYYMM</option><?php }?>
                                                                <?php if($res[1]['type'] == '10'){ ?><option value="10" selected>PJCODE-MMYYYY</option><?php } else { ?><option value="10">PJCODE-MMYYYY</option><?php }?>
                                                                <?php if($res[1]['type'] == '11'){ ?><option value="11" selected>PJCODE-YYYYMMDD</option><?php } else { ?><option value="11">PJCODE-YYYYMMDD</option><?php }?>
                                                                <?php if($res[1]['type'] == '12'){ ?><option value="12" selected>PJCODE-DDMMYYYY</option><?php } else { ?><option value="12">PJCODE-DDMMYYYY</option><?php }?>
                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="form-control input-sm" placeholder="0000" maxlength="4" name="running[]" value="<?=$res[1]['running']?>"></td>
                                                        <td>
                                                            <select class="form-control input-sm" name="status[]" id="">
                                                                <?php if($res[1]['status'] == '1'){ ?><option value="1" selected>active</option><?php } else { ?><option value="1">active</option><?php }?>
                                                                <?php if($res[1]['status'] == '2'){ ?><option value="1" selected>Inactive</option><?php } else { ?><option value="2">Inactive</option><?php }?>
                                                                <!-- <option value="1">active</option>
                                                                <option value="2">Inactive</option> -->
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">3.</td>
                                                        <td class="text-center">PO<input type="hidden" class="form-control input-sm" name="id[]" value="<?php if(isset($res[2]['id'])){echo $res[2]['id'];}else{echo "";}?>"></td>
                                                        <td><input type="text" class="form-control input-sm" name="prefix[]" value="<?php if(isset($res[2]['prefix'])){echo $res[2]['prefix'];}else{echo "";}?>"></td>
                                                        <td>
                                                            <select class="form-control  input-sm" name="type[]">
                                                                <?php if($res[2]['type'] == '1'){ ?><option value="1" selected>YYMM</option><?php } else { ?><option value="1">YYMM</option><?php }?>
                                                                <?php if($res[2]['type'] == '2'){ ?><option value="2" selected>MMYY</option><?php } else { ?><option value="2">MMYY</option><?php }?>
                                                                <?php if($res[2]['type'] == '3'){ ?><option value="3" selected>YYYYMM</option><?php } else { ?><option value="3">YYYYMM</option><?php }?>
                                                                <?php if($res[2]['type'] == '4'){ ?><option value="4" selected>MMYYYY</option><?php } else { ?><option value="4">MMYYYY</option><?php }?>
                                                                <?php if($res[2]['type'] == '5'){ ?><option value="5" selected>YYYYMMDD</option><?php } else { ?><option value="5">YYYYMMDD</option><?php }?>
                                                                <?php if($res[2]['type'] == '6'){ ?><option value="6" selected>DDMMYYYY</option><?php } else { ?><option value="6">DDMMYYYY</option><?php }?>
                                                                <?php if($res[2]['type'] == '7'){ ?><option value="7" selected>PJCODE-YYMM</option><?php } else { ?><option value="7">PJCODE-YYMM</option><?php }?>
                                                                <?php if($res[2]['type'] == '8'){ ?><option value="8" selected>PJCODE-MMYY</option><?php } else { ?><option value="8">PJCODE-MMYY</option><?php }?>
                                                                <?php if($res[2]['type'] == '9'){ ?><option value="9" selected>PJCODE-YYYYMM</option><?php } else { ?><option value="9">PJCODE-YYYYMM</option><?php }?>
                                                                <?php if($res[2]['type'] == '10'){ ?><option value="10" selected>PJCODE-MMYYYY</option><?php } else { ?><option value="10">PJCODE-MMYYYY</option><?php }?>
                                                                <?php if($res[2]['type'] == '11'){ ?><option value="11" selected>PJCODE-YYYYMMDD</option><?php } else { ?><option value="11">PJCODE-YYYYMMDD</option><?php }?>
                                                                <?php if($res[2]['type'] == '12'){ ?><option value="12" selected>PJCODE-DDMMYYYY</option><?php } else { ?><option value="12">PJCODE-DDMMYYYY</option><?php }?>
                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="form-control input-sm" placeholder="0000" maxlength="4" name="running[]" value="<?=$res[2]['running']?>"></td>
                                                        <td>
                                                            <select class="form-control input-sm" name="status[]" id="">
                                                                <?php if($res[2]['status'] == '1'){ ?><option value="1" selected>active</option><?php } else { ?><option value="1">active</option><?php }?>
                                                                <?php if($res[2]['status'] == '2'){ ?><option value="1" selected>Inactive</option><?php } else { ?><option value="2">Inactive</option><?php }?>
                                                                <!-- <option value="1">active</option>
                                                                <option value="2">Inactive</option> -->
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">4.</td>
                                                        <td class="text-center">WO<input type="hidden" class="form-control input-sm" name="id[]" value="<?php if(isset($res[3]['id'])){echo $res[3]['id'];}else{echo "";}?>"></td>
                                                        <td><input type="text" class="form-control input-sm" name="prefix[]" value="<?php if(isset($res[3]['prefix'])){echo $res[3]['prefix'];}else{echo "";}?>"></td>
                                                        <td>
                                                            <select class="form-control  input-sm" name="type[]">
                                                                <?php if($res[3]['type'] == '1'){ ?><option value="1" selected>YYMM</option><?php } else { ?><option value="1">YYMM</option><?php }?>
                                                                <?php if($res[3]['type'] == '2'){ ?><option value="2" selected>MMYY</option><?php } else { ?><option value="2">MMYY</option><?php }?>
                                                                <?php if($res[3]['type'] == '3'){ ?><option value="3" selected>YYYYMM</option><?php } else { ?><option value="3">YYYYMM</option><?php }?>
                                                                <?php if($res[3]['type'] == '4'){ ?><option value="4" selected>MMYYYY</option><?php } else { ?><option value="4">MMYYYY</option><?php }?>
                                                                <?php if($res[3]['type'] == '5'){ ?><option value="5" selected>YYYYMMDD</option><?php } else { ?><option value="5">YYYYMMDD</option><?php }?>
                                                                <?php if($res[3]['type'] == '6'){ ?><option value="6" selected>DDMMYYYY</option><?php } else { ?><option value="6">DDMMYYYY</option><?php }?>
                                                                <?php if($res[3]['type'] == '7'){ ?><option value="7" selected>PJCODE-YYMM</option><?php } else { ?><option value="7">PJCODE-YYMM</option><?php }?>
                                                                <?php if($res[3]['type'] == '8'){ ?><option value="8" selected>PJCODE-MMYY</option><?php } else { ?><option value="8">PJCODE-MMYY</option><?php }?>
                                                                <?php if($res[3]['type'] == '9'){ ?><option value="9" selected>PJCODE-YYYYMM</option><?php } else { ?><option value="9">PJCODE-YYYYMM</option><?php }?>
                                                                <?php if($res[3]['type'] == '10'){ ?><option value="10" selected>PJCODE-MMYYYY</option><?php } else { ?><option value="10">PJCODE-MMYYYY</option><?php }?>
                                                                <?php if($res[3]['type'] == '11'){ ?><option value="11" selected>PJCODE-YYYYMMDD</option><?php } else { ?><option value="11">PJCODE-YYYYMMDD</option><?php }?>
                                                                <?php if($res[3]['type'] == '12'){ ?><option value="12" selected>PJCODE-DDMMYYYY</option><?php } else { ?><option value="12">PJCODE-DDMMYYYY</option><?php }?>
                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="form-control input-sm" placeholder="0000" maxlength="4" name="running[]" value="<?=$res[3]['running']?>"></td>
                                                        <td>
                                                            <select class="form-control input-sm" name="status[]" id="">
                                                                <?php if($res[3]['status'] == '1'){ ?><option value="1" selected>active</option><?php } else { ?><option value="1">active</option><?php }?>
                                                                <?php if($res[3]['status'] == '2'){ ?><option value="1" selected>Inactive</option><?php } else { ?><option value="2">Inactive</option><?php }?>
                                                                <!-- <option value="1">active</option>
                                                                <option value="2">Inactive</option> -->
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">5.</td>
                                                        <td class="text-center">Pettycash<input type="hidden" class="form-control input-sm" name="id[]" value="<?php if(isset($res[4]['id'])){echo $res[4]['id'];}else{echo "";}?>"></td>
                                                        <td><input type="text" class="form-control input-sm" name="prefix[]" value="<?php if(isset($res[4]['prefix'])){echo $res[4]['prefix'];}else{echo "";}?>"></td>
                                                        <td>
                                                            <select class="form-control  input-sm" name="type[]">
                                                                <?php if($res[4]['type'] == '1'){ ?><option value="1" selected>YYMM</option><?php } else { ?><option value="1">YYMM</option><?php }?>
                                                                <?php if($res[4]['type'] == '2'){ ?><option value="2" selected>MMYY</option><?php } else { ?><option value="2">MMYY</option><?php }?>
                                                                <?php if($res[4]['type'] == '3'){ ?><option value="3" selected>YYYYMM</option><?php } else { ?><option value="3">YYYYMM</option><?php }?>
                                                                <?php if($res[4]['type'] == '4'){ ?><option value="4" selected>MMYYYY</option><?php } else { ?><option value="4">MMYYYY</option><?php }?>
                                                                <?php if($res[4]['type'] == '5'){ ?><option value="5" selected>YYYYMMDD</option><?php } else { ?><option value="5">YYYYMMDD</option><?php }?>
                                                                <?php if($res[4]['type'] == '6'){ ?><option value="6" selected>DDMMYYYY</option><?php } else { ?><option value="6">DDMMYYYY</option><?php }?>
                                                                <?php if($res[4]['type'] == '7'){ ?><option value="7" selected>PJCODE-YYMM</option><?php } else { ?><option value="7">PJCODE-YYMM</option><?php }?>
                                                                <?php if($res[4]['type'] == '8'){ ?><option value="8" selected>PJCODE-MMYY</option><?php } else { ?><option value="8">PJCODE-MMYY</option><?php }?>
                                                                <?php if($res[4]['type'] == '9'){ ?><option value="9" selected>PJCODE-YYYYMM</option><?php } else { ?><option value="9">PJCODE-YYYYMM</option><?php }?>
                                                                <?php if($res[4]['type'] == '10'){ ?><option value="10" selected>PJCODE-MMYYYY</option><?php } else { ?><option value="10">PJCODE-MMYYYY</option><?php }?>
                                                                <?php if($res[4]['type'] == '11'){ ?><option value="11" selected>PJCODE-YYYYMMDD</option><?php } else { ?><option value="11">PJCODE-YYYYMMDD</option><?php }?>
                                                                <?php if($res[4]['type'] == '12'){ ?><option value="12" selected>PJCODE-DDMMYYYY</option><?php } else { ?><option value="12">PJCODE-DDMMYYYY</option><?php }?>
                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="form-control input-sm" placeholder="0000" maxlength="4" name="running[]" value="<?=$res[4]['running']?>"></td>
                                                        <td>
                                                            <select class="form-control input-sm" name="status[]" id="">
                                                                <?php if($res[4]['status'] == '1'){ ?><option value="1" selected>active</option><?php } else { ?><option value="1">active</option><?php }?>
                                                                <?php if($res[4]['status'] == '2'){ ?><option value="1" selected>Inactive</option><?php } else { ?><option value="2">Inactive</option><?php }?>
                                                                <!-- <option value="1">active</option>
                                                                <option value="2">Inactive</option> -->
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                        </div>
                                    </div>
                                </div>
							</div>
						</div>
					</div> <!-- end tab -->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#save").on('click',function(){
         var frm = $('#sendpost');
            frm.submit(function (ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                    success: function (data) {
                    swal({
                            title: "บันทึกสำเร็จ",
                            text: "Save Completed!!.",
                            // confirmButtonColor: "#66BB6A",
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            type: "success"
                        });
                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    }
                });
                ev.preventDefault();
            });
        $("#sendpost").submit();
    });

    $('#mg').attr('class', 'active');
	$('#mc12').attr('style', 'background-color:#dedbd8');
</script>