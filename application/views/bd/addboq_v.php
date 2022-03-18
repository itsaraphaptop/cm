<?php
$this->db->select('*');
$this->db->from('project');
$this->db->where('bd_tenid',$tdn);
$project=$this->db->get()->result();
$type = $this->uri->segment(5);
$project_code = "";
$projectid = 0;
$approve_user = "";
$approve_bg = "false";
$project_sub = "";
$substatus = "";
foreach ($project as $pjjbg) {
$project_code = $pjjbg->project_code;
$projectid = $pjjbg->project_id;
$approve_bg = $pjjbg->approve_bg;
$approve_user = $pjjbg->approve_user;
$project_sub = $pjjbg->project_sub;
$substatus = $pjjbg->project_substatus;
}
?>
<div class="content-wrapper">
    <div class="content">
        <div class="panel panel-body border-top-info">
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-1" id="boq_cost1s"></div>

                    <div class="col-sm-2" id="boq_cost2s"></div>
                    <div class="col-sm-2" id="boq_cost3s"></div>
                    <div class="col-sm-2" id="boq_cost4s"></div>
                    <div class="col-sm-2" id="boq_cost5s"></div>
                    <div class="col-sm-2" id="boq_cost6s"></div>
                    <div class="col-sm-12">
                        <hr>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="tabbable">
                    <ul class="nav nav-tabs nav-tabs-component">
                        <li class="active"><a href="#basic-tab1" data-toggle="tab">Budget // BOQ</a></li>
                        <li><a href="#basic-tab2" data-toggle="tab">List BOQ</a></li>
                        <!-- <li><a href="#basic-tab3" data-toggle="tab">List BOQ</a></li> -->
                        <li><a href="#basic-tab4" data-toggle="tab">Waiting Approve</a></li>
                        <!-- <li><a href="#basic-tab5" data-toggle="tab">Waiting list BOQ</a></li> -->
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane has-padding active" id="basic-tab1">
                            <form action="<?php echo base_url(); ?>bd_active/insert_bd/<?php echo $tdn;  ?>/<?php echo $projectid; ?>/<?php echo $type; ?>"
                                method="post">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <?php if ($approve_bg=="1") { 

									}else{ ?>
                                        <!-- <a  class="btn btn-primary  btn-xs" data-target="#addboq" data-toggle="modal">ADD ROW</a> -->

                                        <a href="<?php echo base_url(); ?>bd/boq_main/<?php echo $tdn;  ?>/<?php echo $projectid; ?>/0/20/<?php echo $typeprojcode;?>"
                                            class="btn btn-default btn-xs">
                                            Back</a>
                                        <a data-target="#import_excel" class="btn btn-info btn-xs" data-toggle="modal">IMPORT
                                            BOQ</a>
                                        <a href="<?php echo base_url();?>test_sheet/import_boq/<?php echo $tdn;  ?>" class="btn btn-info btn-xs" data-toggle="modal">IMPORT
                                            BOQ</a>
                                        <a id="addboq" class="btn btn-primary  btn-xs">ADD ROW</a>
                                        <a id="show_bom" class="btn btn-success btn-xs">ADD BOM</a>
                                        <a data-target="#copy_boq" id="copyboqq" class="btn btn-success btn-xs"
                                            data-toggle="modal">COPY
                                            Budget and Boq</a>
                                        <button type="submit" class="btn btn-success btn-xs"><i class="icon-floppy-disk position-left"></i>
                                            Save </button>
                                        <!-- <a class="btn btn-info btn-xs" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=boq_export.mrt&boq=<?php echo $tdn; ?>"
                                            target="_blank">Export</a> -->



                                        <?php
								}
								?>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <input type="hidden" id="num" value="0">
                                    <table class="table table-hover table-striped table-xxs table-bordered datatable-fixed-left">
                                        <thead>
                                            <tr>

                                                <th rowspan="2">No.</th>
                                                <th rowspan="2" class="text-center">
                                                    <div style="width: 80px;">Job <a><i class="glyphicon glyphicon-barcode"></i></a></div>
                                                </th>
                                                <th rowspan="2">
                                                    <div style="width: 200px;">Cost Code </div>
                                                </th>
                                                <th rowspan="2">
                                                    <div style="width: 200px;">Description</div>
                                                </th>
                                                <th rowspan="2">
                                                    <div style="width: 100px;">Remark CODE</div>
                                                </th>
                                                <th rowspan="2">
                                                    <div style="width: 100px;">Remark NAME</div>
                                                </th>
                                                <th rowspan="2">
                                                    <div style="width: 100px;">UNIT</div>
                                                </th>
                                                <th colspan="8" class="text-center">Budget</th>
                                                <th colspan="8" class="text-center" hidden>BOQ</th>
                                                <th rowspan="2" class="text-center">Action</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">QTY</th>
                                                <th class="text-center">MAT. Price</th>
                                                <th class="text-center">MAT. Amount</th>
                                                <th class="text-center">LAB. Price</th>
                                                <th class="text-center">LAB. Amount</th>
                                                <th class="text-center">SUB. Price</th>
                                                <th class="text-center">SUB. Amount</th>
                                                <th class="text-center">Total</th>
                                                <th class="text-center" hidden>QTY </th>
                                                <th class="text-center" hidden>MAT. Price</th>
                                                <th class="text-center" hidden>MAT. Amount</th>
                                                <th class="text-center" hidden>LAB. Price</th>
                                                <th class="text-center" hidden>LAB. Amount</th>
                                                <th class="text-center" hidden>SUB. Price</th>
                                                <th class="text-center" hidden>SUB. Amount</th>
                                                <th class="text-center" hidden>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="add_body">
                                            <tr id="tableno">
                                                <td colspan="16" id="delse" class="text-center">No Data</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>


                        <script>
                            $('#load_add_body').click(function(event) {
						var costcodetext = $('#costcodetext').val();

					$('#add_body').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
					$('#add_body').load('<?php echo base_url(); ?>bd/load_filterboq/<?php echo $tdn; ?>'+'/'+costcodetext);
					});
				</script>
                        <div class="tab-pane has-padding" id="basic-tab2">
                            <!-- <h2>Sequence Approve </h2>
					<?php foreach ($td as $t) { ?>
					<b style="color: red;"><?php echo $t->approve_mname; ?> >>> </b>
					<?php } ?>	 -->
                            <form id="listboq" action="<?php echo base_url(); ?>bd_active/submit_boq/<?php echo $tdn;  ?>/<?php echo $projectid; ?>"
                                method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <?php
					if ($approve_bg=="1") { ?>
                                        <a href="<?php echo base_url(); ?>bd/boq_main/<?php echo $tdn;  ?>/<?php echo $projectid; ?>"
                                            class="btn btn-default btn-xs"><i class="glyphicon glyphicon-backward"></i>
                                            Back</a>
                                        <?php }else{ ?>
                                        <a href="<?php echo base_url(); ?>bd/boq_main/<?php echo $tdn;  ?>/<?php echo $projectid; ?>"
                                            class="btn btn-default btn-xs"><i class="glyphicon glyphicon-backward"></i>
                                            Back</a>
                                        <input type="checkbox" id="submitboq" name="submitboq"> Send
                                        <input type="hidden" id="boq_status" name="status" value="N">
                                        <button type="submit" class="btn btn-success btn-xs"><i class="icon-floppy-disk position-left"></i>
                                            Save </button>

                                        <script>
                                            $('#submitboq').change(function(){
						    if($(this).is(':checked')){
						        $('#boq_status').val("W");
						    } else {
						       $('#boq_status').val("N");
						    }
						});
					</script>

                                        <?php
					}
					?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h3>BOQ</h3>
                                        <p></p>
                                        <div class="col-xs-3">
                                            <div class="form-group">
                                                <label>Heading :</label>
                                                <input type="text" class="form-control input-xs" name="heading">
                                            </div>

                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-group">
                                                <label>File :</label>
                                                <input type="file" class="form-control input-xs" name="file">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label>Remark :</label>
                                                <textarea name="remark" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered datatable-fixed-left">
                                        <thead>
                                            <tr>

                                                <th rowspan="2">No.</th>
                                                <th rowspan="2">Job</th>
                                                <th rowspan="2">Cost Code</th>
                                                <th rowspan="2">Description</th>
                                                <th rowspan="2">Remark CODE</th>
                                                <th rowspan="2">Remark NAME</th>
                                                <th rowspan="2">UNIT</th>
                                                <th colspan="8" class="text-center">Budget</th>
                                                <!-- <th colspan="8" class="text-center">BOQ</th> -->
                                                <th rowspan="2" class="text-center">Action</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">QTY</th>
                                                <th class="text-center">MAT. Price</th>
                                                <th class="text-center">MAT. Amount</th>
                                                <th class="text-center">LAB. Price</th>
                                                <th class="text-center">LAB. Amount</th>
                                                <th class="text-center">SUB. Price</th>
                                                <th class="text-center">SUB. Amount</th>
                                                <th class="text-center">Total</th>
                                                <!-- <th class="text-center">QTY </th>
										<th class="text-center">MAT. Price</th>
										<th class="text-center">MAT. Amount</th>
										<th class="text-center">LAB. Price</th>
										<th class="text-center">LAB. Amount</th>
										<th class="text-center">SUB. Price</th>
										<th class="text-center">SUB. Amount</th>
										<th class="text-center">Total</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $q=1; 
									  $qty_bg = 0;
									  $qtyboq = 0;
									  $matpricebg = 0;
									  $matamtbg = 0;
									  $labpricebg = 0;
									  $labamtbg = 0;
									  $subpricebg = 0;
									  $subamtbg = 0;
									  $subpriceboq = 0;
									  $subamtboq = 0;
									  $totalamt = 0;
									  $matpriceboq = 0;
									  $matamtboq = 0;
									  $labpriceboq = 0;
									  $labamtboq = 0;
									  $totalamtboq = 0;
								foreach ($td_boq as $t_d) { 
									$qty_bg = $qty_bg+$t_d->qty_bg;
									$matpricebg = $matpricebg+$t_d->matpricebg;
									$matamtbg = $matamtbg+$t_d->matamtbg;
									$labpricebg = $labpricebg+$t_d->labpricebg;
									$labamtbg = $labamtbg+$t_d->labamtbg;
									$subpricebg = $subpricebg+$t_d->subpricebg;
									$subamtbg = $subamtbg+$t_d->subamtbg;
									$totalamt = $totalamt+$t_d->totalamt;
									$qtyboq = $qtyboq+$t_d->qtyboq;
									$matpriceboq = $matpriceboq+$t_d->matpriceboq;
									$matamtboq = $matamtboq+$t_d->matamtboq;
									$labpriceboq = $labpriceboq+$t_d->labpriceboq;
									$labamtboq = $labamtboq+$t_d->labamtboq;
									$subpriceboq = $subpriceboq + $t_d->subpriceboq; 
									$subamtboq = $subamtboq + $t_d->subamtboq;
									$totalamtboq = $totalamtboq+$t_d->totalamtboq;
									?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo $q; ?>
                                                </td>
                                                <td>
                                                    <?php
										$this->db->select('*');
										$this->db->from('bdtender_d');
										$this->db->where('bdd_tenid',$tdn);
										$this->db->where('bdd_jobno',$t_d->boq_job);
										$tender_d=$this->db->get()->result(); ?>
                                                    <?php  foreach ($tender_d as $tender_dd) { ?>
                                                    <?php echo $tender_dd->bdd_jobname; ?>
                                                    <?php } ?>
                                                    <input type="hidden" readonly="" id="job<?php echo $q; ?>" name="job[]"
                                                        class="form-control input-xs text-right" value="<?php echo $t_d->boq_job; ?>"
                                                        style="width: 200px;">

                                                    <input type="text" readonly="" id="boq_id<?php echo $q; ?>" name="boq_id[]"
                                                        class="form-control input-xs text-right" value="<?php echo $t_d->boq_id; ?>"
                                                        style="width: 200px;">
                                                </td>
                                                <td>
                                                    <div style="width: 200px;">
                                                        <?php echo $t_d->subcostcodename; ?>
                                                        <input type="hidden" readonly="" id="codecostcodee<?php echo $q; ?>"
                                                            name="subcostcode[]" class="form-control input-xs text-right"
                                                            value="<?php echo $t_d->subcostcode; ?>" style="width: 200px;"><input
                                                            type="hidden" readonly="" id="codecostnamee<?php echo $q; ?>"
                                                            name="subcostcodename[]" class="form-control input-xs text-right"
                                                            style="width: 200px;" value="<?php echo $t_d->subcostcodename; ?>">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group"><input readonly="true" type="text" id="newmatnamee<?php echo $q; ?>"
                                                            name="newmatnamee[]" class="form-control input-xs"
                                                            style="width: 200px;" value="<?php echo $t_d->newmatnamee; ?>"><input
                                                            readonly="true" id="newmatcode<?php echo $q; ?>" style="width: 200px;"
                                                            name="newmatcode[]" type="hidden" class="form-control input-xs text-right"
                                                            style="width: 150px;" value="<?php echo $t_d->newmatcode; ?>"><span
                                                            class="input-group-btn"><a class="openuns<?php echo $q; ?> btn btn-default btn-icon"
                                                                data-toggle="modal" data-target="#opnewmats<?php echo $q; ?>"><i
                                                                    class="icon-search4"></i></a><a class="poos<?php echo $q; ?> btn btn-default btn-icon"
                                                                data-toggle="modal" data-target="#opnewmattts<?php echo $q; ?>"><i
                                                                    class="icon-search4"></i></a><a class="clearmat<?php echo $q; ?> btn btn-default btn-icon"><i
                                                                    class="glyphicon glyphicon-trash"></i></a></span></div>

                                                </td>

                                                <script>
                                                    $('.clearmat<?php echo $q; ?>').click(function(event) {
			                            $('#newmatnamee<?php echo $q; ?>').val('');
			                            $('#newmatcode<?php echo $q; ?>').val('');
			                        });
			                    </script>

                                                <td><input id="boqcode<?php echo $q; ?>" name="boqcode[]" type="text"
                                                        class="form-control input-xs" value="<?php echo $t_d->boqcode; ?>"
                                                        style="width: 100px;"></td>
                                                <td><input id="matboqq<?php echo $q; ?>" name="matboq[]" type="text"
                                                        class="form-control input-xs" value="<?php echo $t_d->matboq; ?>"
                                                        style="width: 150px;"></td>
                                                <td class="text-right">
                                                    <div class="input-group"><input id="unitcode<?php echo $q; ?>" name="unitcode[]"
                                                            type="hidden" class="form-control input-xs text-right"
                                                            style="width: 200px;" readonly="" value="<?php echo $t_d->unitcode; ?>"><input
                                                            id="unitname<?php echo $q; ?>" name="unitname[]" type="text"
                                                            class="form-control input-xs" style="width: 100px;"
                                                            readonly="" value="<?php echo $t_d->unitname; ?>"><span
                                                            class="input-group-btn"><span class="input-group-btn">
                                                                <a class="units<?php echo $q; ?> btn btn-default btn-icon"
                                                                    data-toggle="modal" data-target="#units<?php echo $q; ?>"><i
                                                                        class="icon-search4"></i></a></span></div>
                                                </td>
                                                <td class="text-right"><input id="qty_bg<?php echo $q; ?>" name="qty_bg[]"
                                                        type="text" value="<?php echo $t_d->qty_bg; ?>" class="form-control input-xs text-right"
                                                        style="width: 100px;" required="">
                                                </td>
                                                <td class="text-right"><input type="text" id="matpricebg<?php echo $q; ?>"
                                                        name="matpricebg[]" value="<?php echo number_format($t_d->matpricebg,2); ?>"
                                                        class="form-control input-xs text-right" style="width: 100px;"></td>
                                                <td class="text-right"><input type="text" id="matamtbg<?php echo $q; ?>"
                                                        name="matamtbg[]" class="form-control input-xs text-right"
                                                        style="width: 100px;" readonly="" value="<?php echo number_format($t_d->matamtbg,2); ?>"></td>
                                                <td class="text-right"><input type="text" id="labpricebg<?php echo $q; ?>"
                                                        name="labpricebg[]" value="<?php echo number_format($t_d->labpricebg,2); ?>"
                                                        class="form-control input-xs text-right" style="width: 100px;"></td>
                                                <td class="text-right"><input type="text" id="labamtbg<?php echo $q; ?>"
                                                        name="labamtbg[]" class="form-control input-xs text-right"
                                                        style="width: 100px;" value="<?php echo number_format($t_d->labamtbg,2); ?>"></td>

                                                <td class="text-right"><input type="text" id="subpricebg<?php echo $q; ?>"
                                                        name="subpricebg[]" class="form-control input-xs text-right"
                                                        style="width: 100px;" value="<?php echo number_format($t_d->subpricebg,2); ?>"></td>
                                                <td class="text-right"><input type="text" id="subamtbg<?php echo $q; ?>"
                                                        name="subamtbg[]" class="form-control input-xs text-right"
                                                        style="width: 100px;" value="<?php echo number_format($t_d->subamtbg,2); ?>"></td>

                                                <td class="text-right"><input type="text" id="totalamt<?php echo $q; ?>"
                                                        name="totalamt[]" class="form-control input-xs text-right"
                                                        style="width: 100px;" value="<?php echo number_format($t_d->totalamt,2); ?>"></td>

                                                <td class="text-center"><a id="del_boq<?php echo $t_d->boq_id;?>" data-popup="tooltip" title=""
                                                        data-original-title="Remove" data-layout="bottomRight"
                                                        data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a></td>
                                                <td style="color: #BEBEBE;">
                                                    <?php echo $q; ?>
                                                </td>
                                            </tr>


                                            <script>
                                                $("#del_boq<?php echo $t_d->boq_id;?>").click(function(){
                                                    swal({
                                                        title: "Are you sure?",
                                                        text: "You will not be able to recover this BOQ DATA!",
                                                        type: "warning",
                                                        showCancelButton: true,
                                                        confirmButtonColor: "#EF5350",
                                                        confirmButtonText: "Yes, delete it!",
                                                        cancelButtonText: "No, cancel pls!",
                                                        closeOnConfirm: false,
                                                        closeOnCancel: false
                                                    },
                                                    function(isConfirm){
                                                        if (isConfirm) {
                                                            var formD = new FormData($('#listboq')[0]);
                                                            $.ajax({
                                                                url: '<?php echo base_url(); ?>bd/dellistboq/<?php echo $t_d->boq_id;?>',
                                                                type: 'POST',
                                                                method: 'POST',
                                                                data: formD,
                                                                async: false,
                                                                cache: false,
                                                                contentType: false,
                                                                enctype: 'multipart/form-data',
                                                                processData: false,
                                                                success: function(response) {
                                                                    swal({
                                                                        title: "Deleted!",
                                                                        text: "Your has been deleted.",
                                                                        confirmButtonColor: "#66BB6A",
                                                                        type: "success"
                                                                    });
                                                                    window.location.href = "<?php echo base_url();?>bd/add_boq/<?php echo $t_d->boq_bd;?>";
                                                                }
                                                            });
                                                        } else {
                                                            swal({
                                                                title: "Cancelled",
                                                                text: "Your is safe :)",
                                                                confirmButtonColor: "#2196F3",
                                                                type: "error"
                                                            });
                                                        }
                                                    });
                                                });
                                                $('#qty_bg<?php echo $q; ?>').keyup(function() {
                                                    var labpricebg = $('#labpricebg<?php echo $q; ?>').val().replace(/,/g,"");
                                                    var qty_bg = $('#qty_bg<?php echo $q; ?>').val().replace(/,/g,"");
                                                    var matpricebg = $('#matpricebg<?php echo $q; ?>').val().replace(/,/g,"");
                                                    var total = (qty_bg*1) * (matpricebg*1) ;
                                                    $('#matamtbg<?php echo $q; ?>').val(numberWithCommas(total));
                                                    $('#totalamt<?php echo $q; ?>').val(numberWithCommas(total));
                                                    $('#qtyboq<?php echo $q; ?>').val(numberWithCommas(qty_bg));
                                                    if($('#matamtbg<?php echo $q; ?>').val()==0){
                                                        var ttla = (qty_bg*1) * (labpricebg*1);
                                                        $('#totalamt<?php echo $q; ?>').val(numberWithCommas(ttla));
                                                        $('#labamtbg<?php echo $q; ?>').val(numberWithCommas(ttla));
                                                    }
                                                });
                                                $('#matpricebg<?php echo $q; ?>').keyup(function() {
                                                    var qty_bg =$('#qty_bg<?php echo $q; ?>').val().replace(/,/g,"");
                                                    var matpricebg = $('#matpricebg<?php echo $q; ?>').val().replace(/,/g,"");
                                                    var total = (qty_bg*1) * (matpricebg*1);
                                                    $('#matamtbg<?php echo $q; ?>').val(numberWithCommas(total));
                                                    $('#totalamt<?php echo $q; ?>').val(numberWithCommas(total));
                                                });
                                                $('#labpricebg<?php echo $q; ?>').keyup(function() {
                                                    $('#totalamt<?php echo $q; ?>').val(0);
                                                    var labpricebg = $('#labpricebg<?php echo $q; ?>').val().replace(/,/g,"");
                                                    var qty_bg = $('#qty_bg<?php echo $q; ?>').val().replace(/,/g,"");
                                                    var total = (qty_bg*1) * (labpricebg*1) ;
                                                    $('#labamtbg<?php echo $q; ?>').val(numberWithCommas(total));
                                                    var labamtbg = $('#labamtbg<?php echo $q; ?>').val().replace(/,/g,"");
                                                    var matamtbg = $('#matamtbg<?php echo $q; ?>').val().replace(/,/g,"");
                                                    var ans =  (labamtbg*1) + (matamtbg*1) ;
                                                    $('#labamtbg<?php echo $q; ?>').val(numberWithCommas(total));
                                                    $('#totalamt<?php echo $q; ?>').val(numberWithCommas(ans));
                                                });
							$('#subpricebg<?php echo $q; ?>').keyup(function() {
							$('#totalamt<?php echo $q; ?>').val(0);
							var subpricebg = $('#subpricebg<?php echo $q; ?>').val().replace(/,/g,"");
							var qty_bg = $('#qty_bg<?php echo $q; ?>').val().replace(/,/g,"");
							var total = (qty_bg*1) * (subpricebg*1) ;
							$('#subamtbg<?php echo $q; ?>').val(numberWithCommas(total));
							var labamtbg = $('#labamtbg<?php echo $q; ?>').val().replace(/,/g,"");
							var matamtbg = $('#matamtbg<?php echo $q; ?>').val().replace(/,/g,"");
							var subamtbg = $('#subamtbg<?php echo $q; ?>').val().replace(/,/g,"");
							var ans =  (labamtbg*1) + (matamtbg*1) + (subamtbg*1) ;
							$('#subamtbg<?php echo $q; ?>').val(numberWithCommas(total));
							$('#totalamt<?php echo $q; ?>').val(numberWithCommas(ans));
							});
							$('#qtyboq<?php echo $q; ?>').keyup(function() {
							var qtyboq =$('#qtyboq<?php echo $q; ?>').val().replace(/,/g,"");
							var matpriceboq = $('#matpriceboq<?php echo $q; ?>').val().replace(/,/g,"");
							var total = (qtyboq*1) * (matpriceboq*1) ;
							$('#matamtboq<?php echo $q; ?>').val(numberWithCommas(total));
							$('#totalamtboq<?php echo $q; ?>').val(numberWithCommas(total));
							});
							$('#matpriceboq<?php echo $q; ?>').keyup(function() {
							var qtyboq =$('#qtyboq<?php echo $q; ?>').val().replace(/,/g,"");
							var matpriceboq = $('#matpriceboq<?php echo $q; ?>').val().replace(/,/g,"");
							var total = (qtyboq*1) * (matpriceboq*1) ;
							$('#matamtboq<?php echo $q; ?>').val(numberWithCommas(total));
							$('#totalamtboq<?php echo $q; ?>').val(numberWithCommas(total));
							});
							$('#labpriceboq<?php echo $q; ?>').keyup(function() {
							$('#totalamtboq<?php echo $q; ?>').val(0);
							var labpriceboq = $('#labpriceboq<?php echo $q; ?>').val().replace(/,/g,"");
							var qtyboq = $('#qtyboq<?php echo $q; ?>').val().replace(/,/g,"");
							var total = qtyboq * labpriceboq ;
							$('#labamtboq<?php echo $q; ?>').val(total);
							var labamtboq = $('#labamtboq<?php echo $q; ?>').val().replace(/,/g,"");
							var matamtboq = $('#matamtboq<?php echo $q; ?>').val().replace(/,/g,"");
							var ans =  (labamtboq*1) + (matamtboq*1) ;
							$('#labamtboq<?php echo $q; ?>').val(numberWithCommas(total));
							$('#totalamtboq<?php echo $q; ?>').val(numberWithCommas(ans));
							});

							$('#subpriceboq<?php echo $q; ?>').keyup(function() {
							$('#totalamtboq<?php echo $q; ?>').val(0);
							var subpriceboq = $('#subpriceboq<?php echo $q; ?>').val().replace(/,/g,"");
							var qtyboq = $('#qtyboq<?php echo $q; ?>').val().replace(/,/g,"");
							var total = qtyboq * subpriceboq ;
							$('#subamtboq<?php echo $q; ?>').val(total);
							var labamtboq = $('#labamtboq<?php echo $q; ?>').val().replace(/,/g,"");
							var matamtboq = $('#matamtboq<?php echo $q; ?>').val().replace(/,/g,"");
							var subamtboq = $('#subamtboq<?php echo $q; ?>').val().replace(/,/g,"");
							var ans =  (labamtboq*1) + (matamtboq*1) + (subamtboq*1);
							$('#subamtboq<?php echo $q; ?>').val(numberWithCommas(total));
							$('#totalamtboq<?php echo $q; ?>').val(numberWithCommas(ans));
							});
							</script>

                                            <div id="opnewmats<?php echo $q; ?>" class="modal fade">
                                                <div class="modal-dialog modal-full">
                                                    <div class="modal-content ">
                                                        <div class="modal-header bg-info">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h5 class="modal-title">เพิ่มรายการ</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row" id="modal_mats<?php echo $q; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>

                                                $(".openuns<?php echo $q; ?>").click(function(){
				$('#modal_mats<?php echo $q; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$("#modal_mats<?php echo $q; ?>").load('<?php echo base_url(); ?>index.php/bd/material_alonee/<?php echo $q; ?>');
				});
				</script>
                                            <div id="opnewmattts<?php echo $q; ?>" class="modal fade">
                                                <div class="modal-dialog modal-full">
                                                    <div class="modal-content ">
                                                        <div class="modal-header bg-info">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h5 class="modal-title">เพิ่มรายการ</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row" id="modal_matts<?php echo $q; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>

                                                $(".poos<?php echo $q; ?>").click(function(){
				$('#modal_matts<?php echo $q; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$("#modal_matts<?php echo $q; ?>").load('<?php echo base_url(); ?>index.php/share/getmatcode/<?php echo $q; ?>');
				});
				</script>
                                            <div id="units<?php echo $q; ?>" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content ">
                                                        <div class="modal-header bg-info">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h5 class="modal-title">หน่วย</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row" id="modal_units<?php echo $q; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>

                                                $('.units<?php echo $q; ?>').click(function(){
				$('#modal_units<?php echo $q; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$("#modal_units<?php echo $q; ?>").load('<?php echo base_url(); ?>share/unit/<?php echo $q; ?>');
				});
				
				</script>
                                            <div id="opnewmats<?php echo $q; ?>" class="modal fade">
                                                <div class="modal-dialog modal-full">
                                                    <div class="modal-content ">
                                                        <div class="modal-header bg-info">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h5 class="modal-title">เพิ่มรายการ</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row" id="modal_mats<?php echo $q; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>

                                                $(".openuns<?php echo $q; ?>").click(function(){
				$('#modal_mats<?php echo $q; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$("#modal_mats<?php echo $q; ?>").load('<?php echo base_url(); ?>index.php/bd/material_alonee/<?php echo $q; ?>');
				});
				</script>
                                            <div id="opnewmattts<?php echo $q; ?>" class="modal fade">
                                                <div class="modal-dialog modal-full">
                                                    <div class="modal-content ">
                                                        <div class="modal-header bg-info">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h5 class="modal-title">เพิ่มรายการ</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row" id="modal_matts<?php echo $q; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>

                                                $(".poos<?php echo $q; ?>").click(function(){
				$('#modal_matts<?php echo $q; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$("#modal_matts<?php echo $q; ?>").load('<?php echo base_url(); ?>index.php/share/getmatcode/<?php echo $q; ?>');
				});
				</script>
                                            <div id="units<?php echo $q; ?>" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content ">
                                                        <div class="modal-header bg-info">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h5 class="modal-title">หน่วย</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row" id="modal_units<?php echo $q; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>

                                                $('.units<?php echo $q; ?>').click(function(){
				$('#modal_units<?php echo $q; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$("#modal_units<?php echo $q; ?>").load('<?php echo base_url(); ?>share/unit/<?php echo $q; ?>');
				});
				
				</script>
                                            <?php $q++; } ?>

                                            <tr>
                                                <td class="text-center" colspan="7"><b>TOTAL</b></td>
                                                <td class="text-right">
                                                    <?php echo number_format($qty_bg,2); ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php echo number_format($matpricebg,2); ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php echo number_format($matamtbg,2); ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php echo number_format($labpricebg,2); ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php echo number_format($labamtbg,2); ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php echo number_format($subpriceboq,2); ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php echo number_format($subamtboq,2); ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php echo number_format($totalamt,2); ?>
                                                </td>

                                                <td class="text-right"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane has-padding" id="basic-tab3">
                        <form action="<?php echo base_url(); ?>bd_active/submit_boq2/<?php echo $tdn;  ?>/<?php echo $projectid; ?>"
                            method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php
					if ($approve_bg=="1") { ?>
                                    <a href="<?php echo base_url(); ?>bd/boq_main/<?php echo $tdn;  ?>/<?php echo $projectid; ?>"
                                        class="btn btn-default btn-xs"><i class="glyphicon glyphicon-backward"></i>
                                        Back</a>
                                    <?php }else{ ?>
                                    <a href="<?php echo base_url(); ?>bd/boq_main/<?php echo $tdn;  ?>/<?php echo $projectid; ?>"
                                        class="btn btn-default btn-xs"><i class="glyphicon glyphicon-backward"></i>
                                        Back</a>
                                  <input type="checkbox" id="submitboq_boq"
                                            name="submitboq"> Send
                                    <input type="hidden" id="boq_status_boq" name="status" value="N">
                                    <button type="submit" class="btn btn-success btn-xs"><i class="icon-floppy-disk position-left"></i>
                                        Save </button>

                                    <script>
                                        $('#submitboq_boq').change(function(){
						    if($(this).is(':checked')){
						        $('#boq_status_boq').val("W");
						    } else {
						       $('#boq_status_boq').val("N");
						    }
						});
					</script>

                                    <?php
					}
					?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <h3>BOQ</h3>
                                    <p></p>
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <label>Heading :</label>
                                            <input type="text" class="form-control input-xs" name="heading">
                                        </div>

                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <label>File :</label>
                                            <input type="file" class="form-control input-xs" name="file">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Remark :</label>
                                            <textarea name="remark" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered datatable-fixed-left">
                                    <thead>
                                        <tr>

                                            <th rowspan="2">No.</th>
                                            <th rowspan="2">Job</th>
                                            <th rowspan="2">Cost Code</th>
                                            <th rowspan="2">Description</th>
                                            <th rowspan="2">Remark CODE</th>
                                            <th rowspan="2">Remark NAME</th>
                                            <th rowspan="2">UNIT</th>
                                            <!-- <th colspan="8" class="text-center">Budget</th> -->
                                            <th colspan="8" class="text-center">BOQ</th>
                                            <th rowspan="2" class="text-center">Action</th>
                                        </tr>
                                        <tr>

                                            <th class="text-center">QTY </th>
                                            <th class="text-center">MAT. Price</th>
                                            <th class="text-center">MAT. Amount</th>
                                            <th class="text-center">LAB. Price</th>
                                            <th class="text-center">LAB. Amount</th>
                                            <th class="text-center">SUB. Price</th>
                                            <th class="text-center">SUB. Amount</th>
                                            <th class="text-center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $q=1; 
									  $qty_bg = 0;
									  $qtyboq = 0;
									  $matpricebg = 0;
									  $matamtbg = 0;
									  $labpricebg = 0;
									  $labamtbg = 0;
									  $subpricebg = 0;
									  $subamtbg = 0;
									  $subpriceboq = 0;
									  $subamtboq = 0;
									  $totalamt = 0;
									  $matpriceboq = 0;
									  $matamtboq = 0;
									  $labpriceboq = 0;
									  $labamtboq = 0;
									  $totalamtboq = 0;
								foreach ($boq_td_boq as $boq_t_d) { 
									$qty_bg = $qty_bg+$boq_t_d->qty_bg;
									$matpricebg = $matpricebg+$boq_t_d->matpricebg;
									$matamtbg = $matamtbg+$boq_t_d->matamtbg;
									$labpricebg = $labpricebg+$boq_t_d->labpricebg;
									$labamtbg = $labamtbg+$boq_t_d->labamtbg;
									$subpricebg = $subpricebg+$boq_t_d->subpricebg;
									$subamtbg = $subamtbg+$boq_t_d->subamtbg;
									$totalamt = $totalamt+$boq_t_d->totalamt;
									$qtyboq = $qtyboq+$boq_t_d->qtyboq;
									$matpriceboq = $matpriceboq+$boq_t_d->matpriceboq;
									$matamtboq = $matamtboq+$boq_t_d->matamtboq;
									$labpriceboq = $labpriceboq+$boq_t_d->labpriceboq;
									$labamtboq = $labamtboq+$boq_t_d->labamtboq;
									$subpriceboq = $subpriceboq + $boq_t_d->subpriceboq; 
									$subamtboq = $subamtboq + $boq_t_d->subamtboq;
									$totalamtboq = $totalamtboq+$boq_t_d->totalamtboq;
									?>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo $q; ?>
                                            </td>
                                            <td>
                                                <?php
										$this->db->select('*');
										$this->db->from('bdtender_d');
										$this->db->where('bdd_tenid',$tdn);
										$this->db->where('bdd_jobno',$boq_t_d->boq_job);
										$tender_d=$this->db->get()->result(); ?>
                                                <?php  foreach ($tender_d as $tender_dd) { ?>
                                                <?php echo $tender_dd->bdd_jobname; ?>
                                                <?php } ?>
                                                <input type="hidden" readonly="" id="job<?php echo $q; ?>" name="job[]"
                                                    class="form-control input-xs text-right" value="<?php echo $boq_t_d->boq_job; ?>"
                                                    style="width: 200px;">

                                                <input type="hidden" readonly="" id="boq_id<?php echo $q; ?>" name="boq_id[]"
                                                    class="form-control input-xs text-right" value="<?php echo $boq_t_d->boq_id; ?>"
                                                    style="width: 200px;">
                                            </td>
                                            <td>
                                                <div style="width: 200px;">
                                                    <?php echo $boq_t_d->subcostcodename; ?>
                                                    <input type="hidden" readonly="" id="codecostcodee<?php echo $q; ?>"
                                                        name="subcostcode[]" class="form-control input-xs text-right"
                                                        value="<?php echo $boq_t_d->subcostcode; ?>" style="width: 200px;"><input
                                                        type="hidden" readonly="" id="codecostnamee<?php echo $q; ?>"
                                                        name="subcostcodename[]" class="form-control input-xs text-right"
                                                        style="width: 200px;" value="<?php echo $boq_t_d->subcostcodename; ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group"><input readonly="true" type="text" id="boq_newmatnamee<?php echo $q; ?>"
                                                        name="newmatnamee[]" class="form-control input-xs"
                                                        style="width: 200px;" value="<?php echo $boq_t_d->newmatnamee; ?>"><input
                                                        readonly="true" id="boq_newmatcode<?php echo $q; ?>" style="width: 200px;"
                                                        name="newmatcode[]" type="hidden" class="form-control input-xs text-right"
                                                        style="width: 150px;" value="<?php echo $boq_t_d->newmatcode; ?>"><span
                                                        class="input-group-btn"><a class="boq_openuns<?php echo $q; ?> btn btn-default btn-icon"
                                                            data-toggle="modal" data-target="#boq_opnewmats<?php echo $q; ?>"><i
                                                                class="icon-search4"></i></a><a class="boq_poos<?php echo $q; ?> btn btn-default btn-icon"
                                                            data-toggle="modal" data-target="#boq_opnewmattts<?php echo $q; ?>"><i
                                                                class="icon-search4"></i></a><a class="clearmat<?php echo $q; ?> btn btn-default btn-icon"><i
                                                                class="glyphicon glyphicon-trash"></i></a></span></div>

                                            </td>

                                            <script>
                                                $('.clearmat<?php echo $q; ?>').click(function(event) {
			                            $('#newmatnamee<?php echo $q; ?>').val('');
			                            $('#newmatcode<?php echo $q; ?>').val('');
			                        });
			                    </script>

                                            <td><input id="boqcode<?php echo $q; ?>" name="boqcode[]" type="text" class="form-control input-xs"
                                                    value="<?php echo $boq_t_d->boqcode; ?>" style="width: 100px;"></td>
                                            <td><input id="matboqq<?php echo $q; ?>" name="matboq[]" type="text" class="form-control input-xs"
                                                    value="<?php echo $boq_t_d->matboq; ?>" style="width: 150px;"></td>
                                            <td class="text-right">
                                                <div class="input-group"><input id="boq_unitcode<?php echo $q; ?>" name="unitcode[]"
                                                        type="hidden" class="form-control input-xs text-right" style="width: 200px;"
                                                        readonly="" value="<?php echo $boq_t_d->unitcode; ?>"><input id="boq_unitname<?php echo $q; ?>"
                                                        name="unitname[]" type="text" class="form-control input-xs"
                                                        style="width: 100px;" readonly="" value="<?php echo $boq_t_d->unitname; ?>"><span
                                                        class="input-group-btn"><span class="input-group-btn">
                                                            <a class="boq_units<?php echo $q; ?> btn btn-default btn-icon"
                                                                data-toggle="modal" data-target="#boq_units<?php echo $q; ?>"><i
                                                                    class="icon-search4"></i></a></span></div>
                                            </td>
                                            <!-- <td class="text-right"><input id="qty_bg<?php echo $q; ?>" name="qty_bg[]" type="text" value="<?php echo $t_d->qty_bg; ?>" class="form-control input-xs text-right" style="width: 100px;"  required="">
								</td>
								<td class="text-right"><input type="text" id="matpricebg<?php echo $q; ?>" name="matpricebg[]" value="<?php echo number_format($t_d->matpricebg,2); ?>" class="form-control input-xs text-right" style="width: 100px;"></td>
								<td class="text-right"><input type="text" id="matamtbg<?php echo $q; ?>" name="matamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" readonly="" value="<?php echo number_format($t_d->matamtbg,2); ?>"></td>
								<td class="text-right"><input type="text" id="labpricebg<?php echo $q; ?>" name="labpricebg[]" value="<?php echo number_format($t_d->labpricebg,2); ?>" class="form-control input-xs text-right" style="width: 100px;"></td>
								<td class="text-right"><input type="text" id="labamtbg<?php echo $q; ?>" name="labamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->labamtbg,2); ?>"></td>

								<td class="text-right"><input type="text" id="subpricebg<?php echo $q; ?>" name="subpricebg[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->subpricebg,2); ?>"></td>
								<td class="text-right"><input type="text" id="subamtbg<?php echo $q; ?>" name="subamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->subamtbg,2); ?>"></td>

								<td class="text-right"><input type="text"  id="totalamt<?php echo $q; ?>" name="totalamt[]" class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->totalamt,2); ?>"></td> -->
                                            <td class="text-right"><input type="text" id="boq_qtyboq<?php echo $q; ?>"
                                                    name="qtyboq[]" class="form-control input-xs text-right" style="width: 100px;"
                                                    value="<?php echo $boq_t_d->qtyboq; ?>"></td>
                                            <td class="text-right"><input type="text" id="boq_matpriceboq<?php echo $q; ?>"
                                                    name="matpriceboq[]" class="form-control input-xs text-right" style="width: 100px;"
                                                    value="<?php echo number_format($boq_t_d->matpriceboq,2); ?>"></td>
                                            <td class="text-right"><input type="text" id="boq_matamtboq<?php echo $q; ?>"
                                                    name="matamtboq[]" class="form-control input-xs text-right" style="width: 100px;"
                                                    value="<?php echo number_format($boq_t_d->matamtboq,2); ?>"></td>
                                            <td class="text-right"><input type="text" id="boq_labpriceboq<?php echo $q; ?>"
                                                    name="labpriceboq[]" class="form-control input-xs text-right" style="width: 100px;"
                                                    value="<?php echo number_format($boq_t_d->labpriceboq,2); ?>"></td>
                                            <td class="text-right"><input type="text" id="boq_labamtboq<?php echo $q; ?>"
                                                    name="labamtboq[]" class="form-control input-xs text-right" style="width: 100px;"
                                                    value="<?php echo number_format($boq_t_d->labamtboq,2); ?>"></td>
                                            <td class="text-right"><input type="text" id="boq_subpriceboq<?php echo $q; ?>"
                                                    name="subpriceboq[]" class="form-control input-xs text-right" style="width: 100px;"
                                                    value="<?php echo number_format($boq_t_d->subpriceboq,2); ?>"></td>
                                            <td class="text-right"><input type="text" id="boq_subamtboq<?php echo $q; ?>"
                                                    name="subamtboq[]" class="form-control input-xs text-right" style="width: 100px;"
                                                    value="<?php echo number_format($boq_t_d->subamtboq,2); ?>"></td>
                                            <td class="text-right"><input type="text" id="boq_totalamtboq<?php echo $q; ?>"
                                                    name="totalamtboq[]" class="form-control input-xs text-right" style="width: 100px;"
                                                    value="<?php echo number_format($boq_t_d->totalamtboq,2); ?>"></td>
                                            <td class="text-center"><a id="del_boq" data-popup="tooltip" title=""
                                                    data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i
                                                        class="glyphicon glyphicon-trash"></i></a></td>
                                            <td style="color: #BEBEBE;">
                                                <?php echo $q; ?>
                                            </td>
                                        </tr>


                                        <script>
                                            $('#boq_qty_bg<?php echo $q; ?>').keyup(function() {
							var boq_labpricebg = $('#boq_labpricebg<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_qty_bg = $('#boq_qty_bg<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_matpricebg = $('#boq_matpricebg<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_total = (boq_qty_bg*1) * (boq_matpricebg*1) ;
							$('#boq_matamtbg<?php echo $q; ?>').val(numberWithCommas(boq_total));
							$('#boq_totalamt<?php echo $q; ?>').val(numberWithCommas(boq_total));
							$('#boq_qtyboq<?php echo $q; ?>').val(numberWithCommas(boq_qty_bg));
							if($('#boq_matamtbg<?php echo $q; ?>').val()==0){
							var boq_ttla = (boq_qty_bg*1) * (boq_labpricebg*1);
							$('#boq_totalamt<?php echo $q; ?>').val(numberWithCommas(boq_ttla));
							$('#boq_labamtbg<?php echo $q; ?>').val(numberWithCommas(boq_ttla));
							}
							});
							$('#boq_matpricebg<?php echo $q; ?>').keyup(function() {
							var boq_qty_bg =$('#boq_qty_bg<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_matpricebg = $('#boq_matpricebg<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_total = (boq_qty_bg*1) * (boq_matpricebg*1);
							$('#boq_matamtbg<?php echo $q; ?>').val(numberWithCommas(boq_total));
							$('#boq_totalamt<?php echo $q; ?>').val(numberWithCommas(boq_total));
							});
							$('#boq_labpricebg<?php echo $q; ?>').keyup(function() {
							$('#boq_totalamt<?php echo $q; ?>').val(0);
							var boq_labpricebg = $('#boq_labpricebg<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_qty_bg = $('#boq_qty_bg<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_total = (boq_qty_bg*1) * (boq_labpricebg*1) ;
							$('#boq_labamtbg<?php echo $q; ?>').val(numberWithCommas(boq_total));
							var boq_labamtbg = $('#boq_labamtbg<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_matamtbg = $('#boq_matamtbg<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_ans =  (boq_labamtbg*1) + (boq_matamtbg*1) ;
							$('#boq_labamtbg<?php echo $q; ?>').val(numberWithCommas(boq_total));
							$('#boq_totalamt<?php echo $q; ?>').val(numberWithCommas(boq_ans));
							});
							$('#boq_subpricebg<?php echo $q; ?>').keyup(function() {
							$('#boq_totalamt<?php echo $q; ?>').val(0);
							var boq_subpricebg = $('#boq_subpricebg<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_qty_bg = $('#boq_qty_bg<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_total = (boq_qty_bg*1) * (boq_subpricebg*1) ;
							$('#boq_subamtbg<?php echo $q; ?>').val(numberWithCommas(boq_total));
							var boq_labamtbg = $('#boq_labamtbg<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_matamtbg = $('#boq_matamtbg<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_subamtbg = $('#boq_subamtbg<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_ans =  (boq_labamtbg*1) + (boq_matamtbg*1) + (boq_subamtbg*1) ;
							$('#boq_subamtbg<?php echo $q; ?>').val(numberWithCommas(boq_total));
							$('#boq_totalamt<?php echo $q; ?>').val(numberWithCommas(boq_ans));
							});
							$('#boq_qtyboq<?php echo $q; ?>').keyup(function() {
							var boq_qtyboq =$('#boq_qtyboq<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_matpriceboq = $('#boq_matpriceboq<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_total = (boq_qtyboq*1) * (boq_matpriceboq*1) ;
							$('#boq_matamtboq<?php echo $q; ?>').val(numberWithCommas(boq_total));
							$('#boq_totalamtboq<?php echo $q; ?>').val(numberWithCommas(boq_total));
							});
							$('#boq_matpriceboq<?php echo $q; ?>').keyup(function() {
							var boq_qtyboq =$('#boq_qtyboq<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_matpriceboq = $('#boq_matpriceboq<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_total = (boq_qtyboq*1) * (boq_matpriceboq*1) ;
							$('#boq_matamtboq<?php echo $q; ?>').val(numberWithCommas(boq_total));
							$('#boq_totalamtboq<?php echo $q; ?>').val(numberWithCommas(boq_total));
							});
							$('#boq_labpriceboq<?php echo $q; ?>').keyup(function() {
							$('#boq_totalamtboq<?php echo $q; ?>').val(0);
							var boq_labpriceboq = $('#boq_labpriceboq<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_qtyboq = $('#boq_qtyboq<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_total = boq_qtyboq * boq_labpriceboq ;
							$('#boq_labamtboq<?php echo $q; ?>').val(total);
							var boq_labamtboq = $('#boq_labamtboq<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_matamtboq = $('#boq_matamtboq<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_ans =  (boq_labamtboq*1) + (boq_matamtboq*1) ;
							$('#boq_labamtboq<?php echo $q; ?>').val(numberWithCommas(boq_total));
							$('#boq_totalamtboq<?php echo $q; ?>').val(numberWithCommas(boq_ans));
							});

							$('#boq_subpriceboq<?php echo $q; ?>').keyup(function() {
							$('#boq_totalamtboq<?php echo $q; ?>').val(0);
							var boq_subpriceboq = $('#boq_subpriceboq<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_qtyboq = $('#boq_qtyboq<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_total = boq_qtyboq * boq_subpriceboq ;
							$('#boq_subamtboq<?php echo $q; ?>').val(boq_total);
							var boq_labamtboq = $('#boq_labamtboq<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_matamtboq = $('#boq_matamtboq<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_subamtboq = $('#boq_subamtboq<?php echo $q; ?>').val().replace(/,/g,"");
							var boq_ans =  (boq_labamtboq*1) + (boq_matamtboq*1) + (boq_subamtboq*1);
							$('#boq_subamtboq<?php echo $q; ?>').val(numberWithCommas(boq_total));
							$('#boq_totalamtboq<?php echo $q; ?>').val(numberWithCommas(boq_ans));
							});
							</script>

                                        <div id="boq_opnewmats<?php echo $q; ?>" class="modal fade">
                                            <div class="modal-dialog modal-full">
                                                <div class="modal-content ">
                                                    <div class="modal-header bg-info">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h5 class="modal-title">เพิ่มรายการ</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" id="boq_modal_mats<?php echo $q; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>

                                            $(".boq_openuns<?php echo $q; ?>").click(function(){
				$('#boq_modal_mats<?php echo $q; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$("#boq_modal_mats<?php echo $q; ?>").load('<?php echo base_url(); ?>index.php/bd/material_alonee/<?php echo $q; ?>');
				});
				</script>
                                        <div id="boq_opnewmattts<?php echo $q; ?>" class="modal fade">
                                            <div class="modal-dialog modal-full">
                                                <div class="modal-content ">
                                                    <div class="modal-header bg-info">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h5 class="modal-title">เพิ่มรายการ</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" id="boq_modal_matts<?php echo $q; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>

                                            $(".boq_poos<?php echo $q; ?>").click(function(){
				$('#boq_modal_matts<?php echo $q; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$("#boq_modal_matts<?php echo $q; ?>").load('<?php echo base_url(); ?>index.php/share/getmatcode/<?php echo $q; ?>');
				});
				</script>
                                        <div id="boq_units<?php echo $q; ?>" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content ">
                                                    <div class="modal-header bg-info">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h5 class="modal-title">หน่วย</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" id="boq_modal_units<?php echo $q; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>

                                            $('.boq_units<?php echo $q; ?>').click(function(){
				$('#boq_modal_units<?php echo $q; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$("#boq_modal_units<?php echo $q; ?>").load('<?php echo base_url(); ?>share/unit/<?php echo $q; ?>');
				});
				
				</script>
                                        <div id="boq_opnewmats<?php echo $q; ?>" class="modal fade">
                                            <div class="modal-dialog modal-full">
                                                <div class="modal-content ">
                                                    <div class="modal-header bg-info">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h5 class="modal-title">เพิ่มรายการ</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" id="boq_modal_mats<?php echo $q; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>

                                            $(".boq_openuns<?php echo $q; ?>").click(function(){
				$('#boq_modal_mats<?php echo $q; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$("#boq_modal_mats<?php echo $q; ?>").load('<?php echo base_url(); ?>index.php/bd/material_alonee/<?php echo $q; ?>');
				});
				</script>
                                        <div id="boq_opnewmattts<?php echo $q; ?>" class="modal fade">
                                            <div class="modal-dialog modal-full">
                                                <div class="modal-content ">
                                                    <div class="modal-header bg-info">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h5 class="modal-title">เพิ่มรายการ</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" id="boq_modal_matts<?php echo $q; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>

                                            $(".boq_poos<?php echo $q; ?>").click(function(){
				$('#boq_modal_matts<?php echo $q; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$("#boq_modal_matts<?php echo $q; ?>").load('<?php echo base_url(); ?>index.php/share/getmatcode/<?php echo $q; ?>');
				});
				</script>
                                        <div id="boq_units<?php echo $q; ?>" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content ">
                                                    <div class="modal-header bg-info">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h5 class="modal-title">หน่วย</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" id="boq_modal_units<?php echo $q; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>

                                            $('.boq_units<?php echo $q; ?>').click(function(){
				$('#boq_modal_units<?php echo $q; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$("#boq_modal_units<?php echo $q; ?>").load('<?php echo base_url(); ?>share/unit/<?php echo $q; ?>');
				});
				
				</script>
                                        <?php $q++; } ?>

                                        <tr>
                                            <td class="text-center" colspan="7"><b>TOTAL</b></td>
                                            <!-- <td class="text-right"><?php echo number_format($qty_bg,2); ?></td>
								<td class="text-right"><?php echo number_format($matpricebg,2); ?></td>
								<td class="text-right"><?php echo number_format($matamtbg,2); ?></td>
								<td class="text-right"><?php echo number_format($labpricebg,2); ?></td>
								<td class="text-right"><?php echo number_format($labamtbg,2); ?></td>
								<td class="text-right"><?php echo number_format($subpriceboq,2); ?></td>
								<td class="text-right"><?php echo number_format($subamtboq,2); ?></td>
								<td class="text-right"><?php echo number_format($totalamt,2); ?></td> -->
                                            <td class="text-right">
                                                <?php echo number_format($qtyboq,2); ?>
                                            </td>
                                            <td class="text-right">
                                                <?php echo number_format($matpriceboq,2); ?>
                                            </td>
                                            <td class="text-right">
                                                <?php echo number_format($matamtboq,2); ?>
                                            </td>
                                            <td class="text-right">
                                                <?php echo number_format($labpriceboq,2); ?>
                                            </td>
                                            <td class="text-right">
                                                <?php echo number_format($labamtboq,2); ?>
                                            </td>
                                            <td class="text-right">
                                                <?php echo number_format($subpriceboq,2); ?>
                                            </td>
                                            <td class="text-right">
                                                <?php echo number_format($subamtboq,2); ?>
                                            </td>
                                            <td class="text-right">
                                                <?php echo number_format($totalamtboq,2); ?>
                                            </td>
                                            <td class="text-right"></td>
                                        </tr>
                                    </tbody>
                                </table>
                        </form>
                    </div>
                </div>
                <div class="tab-pane has-padding" id="basic-tab4">
                    <?php
                          $this->db->select('*');
                          $this->db->from('approve_td');
                          $this->db->where('app_project',$tdn);
                          $this->db->group_by('app_pr'); 
                          $qpj=$this->db->get()->result();
                          foreach ($qpj as $qq) { ?>

                    <?php 
                          $this->db->select('*');
                          $this->db->from('approve_td');
                          $this->db->where('app_project',$tdn);
                          $this->db->where('app_pr',$qq->app_pr);
                          $this->db->where('status =','no'); 
                          $npr=$this->db->get()->num_rows(); 
                          ?>

                    <?php 
                          $this->db->select('*');
                          $this->db->from('heading_bd');
                          $this->db->where('ref_bd',$qq->app_pr);
                          $approve_boq=$this->db->get()->result(); 
                          $heading = "";
                          foreach ($approve_boq as $r) {
                          	$heading = $r->heading;
                          }
                          ?>

                    <?php 
                          $this->db->select('*');
                          $this->db->from('select_file_boq');
                          $this->db->where('pr_ref',$qq->app_pr);
                          $select_file_boq=$this->db->get()->result();
                          $name_file = ""; 
                          foreach ($select_file_boq as $f) {
                          	$name_file = $f->name_file;
                          }
                          ?>

                    <div class="hideapp<?php echo $qq->app_pr; ?> panel panel-white panel-collapsed" <?php if($npr=="0" ){ echo "hidden" ; } ?>>
                        <div class="panel-heading">
                            <h6 class="panel-title">
                                <?php if($heading!="Budget ()"){
                                    echo $heading;  
                                }else{
                                    echo "ขออนุมัติ BOQ No.".$qq->app_pr;
                                }  ?>
                            </h6>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse" class="rotate-180 btn btn-primary active"></a></li>
                                </ul>
                            </div>
                            <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
                        </div>


                        <div class="table-responsive" style="display: none;">
                            <table class="table datatable-basic">
                                <thead>
                                    <tr role="row">
                                        <th width="50%">BOQ No.
                                            <?php echo $qq->app_pr; ?> (<?php echo $qq->app_project; ?>)</th>
                                        <th width="50%">
                                            <div>Status Approve</div>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="hideapp<?php echo $qq->app_pr; ?>" <?php if($npr=="0" ){ echo "hidden" ;
                                        } ?>>
                                        <td>
                                            <?php if($heading!="Budget ()"){
                                                echo $heading;  
                                            }else{
                                                echo "ขออนุมัติ BOQ No.".$qq->app_pr;
                                            }  ?>
                                            
                                            ( File :: <a target="_blank" href="<?php echo base_url() ?>/select_file_pr/<?php echo $name_file; ?>"><i class="glyphicon glyphicon-download-alt"></i></a> ) 
                                            <button class="label label-info" data-toggle="modal" data-target="#viewboq<?php echo $qq->app_pr; ?>">View BOQ</button>
                                        </td>

                                        <?php 
                      	  $this->db->select('*');
                          $this->db->from('approve_td');
                          $this->db->where('app_project',$tdn);
                          $this->db->where('app_pr',$qq->app_pr);
                          $sc=$this->db->get()->result(); 
                          ?>
                                        <td>


                                            <?php $a=1; foreach ($sc as $cc) { 
                        if($cc->app_sequence=="1"){
                          $s1=$cc->status;
                          $l1 = $cc->lock;
                        }else if($cc->app_sequence=="2"){
                          $s2=$cc->status;
                          $l2 = $cc->lock;
                        }else if($cc->app_sequence=="3"){
                          $s3=$cc->status;
                          $l3 = $cc->lock;
                        }else if($cc->app_sequence=="4"){
                          $s4=$cc->status;
                          $l4 = $cc->lock;
                        }else if($cc->app_sequence=="5"){
                          $s5=$cc->status;
                          $l5 = $cc->lock;
                        }else if($cc->app_sequence=="6"){
                          $s6=$cc->status;
                          $l6 = $cc->lock;
                        }else if($cc->app_sequence=="7"){
                          $s7=$cc->status;
                          $l7 = $cc->lock;
                        }else if($cc->app_sequence=="8"){
                          $s8=$cc->status;
                          $l8 = $cc->lock;
                        }else if($cc->app_sequence=="9"){
                          $s9=$cc->status;
                          $l9 = $cc->lock;
                        }else if($cc->app_sequence=="10"){
                          $s10=$cc->status;
                          $l10 = $cc->lock;
                        }

                        ?>

                                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="no" ){ ?>

                                            <p><b>Approve คนที่
                                                    <?php echo $cc->app_sequence; ?>
                                                    <?php echo $cc->app_midname; ?> (
                                                    <?php echo $cc->app_midid; ?>)</b>
                                                <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                <span class="label bg-blue">Wait</span>

                                                <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>
                                                <p><b>Approve คนที่
                                                        <?php echo $cc->app_sequence; ?>
                                                        <?php echo $cc->app_midname; ?> (
                                                        <?php echo $cc->app_midid; ?>)</b>
                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                </p>
                                                <span class="label bg-success-400">Approve</span>
                                                <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="no"){ ?>
                                                <p><b>Approve คนที่
                                                        <?php echo $cc->app_sequence; ?>
                                                        <?php echo $cc->app_midname; ?> (
                                                        <?php echo $cc->app_midid; ?>)</b>
                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                </p>
                                                <p style="color: red;"><b>Not verified yet.</b></p>
                                                <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>

                                                <p><b>Approve คนที่
                                                        <?php echo $cc->app_sequence; ?>
                                                        <?php echo $cc->app_midname; ?> (
                                                        <?php echo $cc->app_midid; ?>)</b>
                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                </p>
                                                <p style="color: green;"><b>Approved successfully.</b></p>

                                                <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="approve"){ ?>

                                                <p><b>Approve คนที่
                                                        <?php echo $cc->app_sequence; ?>
                                                        <?php echo $cc->app_midname; ?> (
                                                        <?php echo $cc->app_midid; ?>)</b>
                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                </p>
                                                <p style="color: green;"><b>Approved successfully.</b></p>

                                                <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="approve"){ ?>
                                                <p><b>Approve คนที่
                                                        <?php echo $cc->app_sequence; ?>
                                                        <?php echo $cc->app_midname; ?> (
                                                        <?php echo $cc->app_midid; ?>)</b>
                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                </p>
                                                <p style="color: green;"><b>Approved successfully.</b></p>
                                                <?php } ?>


                                                <?php if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes" ){ ?>

                                                <p><b>Approve คนที่
                                                        <?php echo $cc->app_sequence; ?>
                                                        <?php echo $cc->app_midname; ?> (
                                                        <?php echo $cc->app_midid; ?>)</b>
                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                    <div id="chka<?php echo $qq->app_midid; ?>">
                                                        <span class="label bg-blue">Wait</span>
                                                        <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="yes"){ ?>
                                                        <p><b>Approve คนที่
                                                                <?php echo $cc->app_sequence; ?>
                                                                <?php echo $cc->app_midname; ?> (
                                                                <?php echo $cc->app_midid; ?>)</b>
                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                        </p>
                                                        <span class="label bg-success-400">Approve</span>
                                                        <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="no"){ ?>
                                                        <p><b>Approve คนที่
                                                                <?php echo $cc->app_sequence; ?>
                                                                <?php echo $cc->app_midname; ?> (
                                                                <?php echo $cc->app_midid; ?>)</b>
                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                        </p>
                                                        <p style="color: red;"><b>Not verified yet.</b></p>
                                                        <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="yes"){ ?>
                                                        <p><b>Approve คนที่
                                                                <?php echo $cc->app_sequence; ?>
                                                                <?php echo $cc->app_midname; ?> (
                                                                <?php echo $cc->app_midid; ?>)</b>
                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                        </p>
                                                        <p style="color: green;"><b>Approved successfully.</b></p>
                                                        <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="no"  && $cc->status!="yes" && $l1!="Y"){ ?>
                                                        <p><b>Approve คนที่
                                                                <?php echo $cc->app_sequence; ?>
                                                                <?php echo $cc->app_midname; ?> (
                                                                <?php echo $cc->app_midid; ?>)</b>
                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                        </p>
                                                        <span class="label bg-blue">Wait</span>
                                                        <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                                                        <p><b>Approve คนที่
                                                                <?php echo $cc->app_sequence; ?>
                                                                <?php echo $cc->app_midname; ?> (
                                                                <?php echo $cc->app_midid; ?>)</b>
                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                        </p>
                                                        <p style="color: green;"><b>Approved successfully.</b></p>
                                                        <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                                                        <p><b>Approve คนที่
                                                                <?php echo $cc->app_sequence; ?>
                                                                <?php echo $cc->app_midname; ?> (
                                                                <?php echo $cc->app_midid; ?>)</b>
                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                        </p>
                                                        <p style="color: green;"><b>Approved successfully.</b></p>

                                                        <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes"){ ?>
                                                        <p><b>Approve คนที่
                                                                <?php echo $cc->app_sequence; ?>
                                                                <?php echo $cc->app_midname; ?> (
                                                                <?php echo $cc->app_midid; ?>)</b>
                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                        </p>
                                                        <p style="color: red;"><b>Not verified yet.</b></p>
                                                        <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="no" ){ ?>

                                                        <p><b>Approve คนที่
                                                                <?php echo $cc->app_sequence; ?>
                                                                <?php echo $cc->app_midname; ?> (
                                                                <?php echo $cc->app_midid; ?>)</b>
                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                            <p style="color: red;"><b>Not verified yet.</b></p>
                                                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes"){ ?>
                                                            <p><b>Approve คนที่
                                                                    <?php echo $cc->app_sequence; ?>
                                                                    <?php echo $cc->app_midname; ?> (
                                                                    <?php echo $cc->app_midid; ?>)</b>
                                                                <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                            </p>
                                                            <p style="color: red;"><b>Not verified yet.</b></p>

                                                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                                                            <p><b>Approve คนที่
                                                                    <?php echo $cc->app_sequence; ?>
                                                                    <?php echo $cc->app_midname; ?> (
                                                                    <?php echo $cc->app_midid; ?>)</b>
                                                                <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                            </p>
                                                            <p style="color: green;"><b>Approved successfully.</b></p>
                                                            <?php } ?>


                                                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes" ){ ?>

                                                            <p><b>Approve คนที่
                                                                    <?php echo $cc->app_sequence; ?>
                                                                    <?php echo $cc->app_midname; ?> (
                                                                    <?php echo $cc->app_midid; ?>)</b>
                                                                <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                <div id="chka<?php echo $qq->app_midid; ?>">
                                                                    <span class="label bg-blue">Wait</span>
                                                                    <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="yes"){ ?>
                                                                    <p><b>Approve คนที่
                                                                            <?php echo $cc->app_sequence; ?>
                                                                            <?php echo $cc->app_midname; ?> (
                                                                            <?php echo $cc->app_midid; ?>)</b>
                                                                        <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                    </p>
                                                                    <span class="label bg-success-400">Approve</span>
                                                                    <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="no"){ ?>
                                                                    <p><b>Approve คนที่
                                                                            <?php echo $cc->app_sequence; ?>
                                                                            <?php echo $cc->app_midname; ?> (
                                                                            <?php echo $cc->app_midid; ?>)</b>
                                                                        <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                    </p>
                                                                    <p style="color: red;"><b>Not verified yet.</b></p>
                                                                    <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="yes"){ ?>
                                                                    <p><b>Approve คนที่
                                                                            <?php echo $cc->app_sequence; ?>
                                                                            <?php echo $cc->app_midname; ?> (
                                                                            <?php echo $cc->app_midid; ?>)</b>
                                                                        <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                    </p>
                                                                    <p style="color: green;"><b>Approved successfully.</b></p>
                                                                    <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="no"  && $cc->status!="yes" && $l2!="Y"){ ?>
                                                                    <p><b>Approve คนที่
                                                                            <?php echo $cc->app_sequence; ?>
                                                                            <?php echo $cc->app_midname; ?> (
                                                                            <?php echo $cc->app_midid; ?>)</b>
                                                                        <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                    </p>
                                                                    <span class="label bg-blue">Wait</span>
                                                                    <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="approve"){ ?>
                                                                    <p><b>Approve คนที่
                                                                            <?php echo $cc->app_sequence; ?>
                                                                            <?php echo $cc->app_midname; ?> (
                                                                            <?php echo $cc->app_midid; ?>)</b>
                                                                        <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                    </p>
                                                                    <p style="color: green;"><b>Approved successfully.</b></p>
                                                                    <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="approve"){ ?>
                                                                    <p><b>Approve คนที่
                                                                            <?php echo $cc->app_sequence; ?>
                                                                            <?php echo $cc->app_midname; ?> (
                                                                            <?php echo $cc->app_midid; ?>)</b>
                                                                        <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                    </p>
                                                                    <p style="color: green;"><b>Approved successfully.</b></p>

                                                                    <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes"){ ?>
                                                                    <p><b>Approve คนที่
                                                                            <?php echo $cc->app_sequence; ?>
                                                                            <?php echo $cc->app_midname; ?> (
                                                                            <?php echo $cc->app_midid; ?>)</b>
                                                                        <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                    </p>
                                                                    <p style="color: red;"><b>Not verified yet.</b></p>
                                                                    <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="no" ){ ?>

                                                                    <p><b>Approve คนที่
                                                                            <?php echo $cc->app_sequence; ?>
                                                                            <?php echo $cc->app_midname; ?> (
                                                                            <?php echo $cc->app_midid; ?>)</b>
                                                                        <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                        <p style="color: red;"><b>Not verified yet.</b></p>
                                                                        <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes"){ ?>
                                                                        <p><b>Approve คนที่
                                                                                <?php echo $cc->app_sequence; ?>
                                                                                <?php echo $cc->app_midname; ?> (
                                                                                <?php echo $cc->app_midid; ?>)</b>
                                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                        </p>
                                                                        <p style="color: red;"><b>Not verified yet.</b></p>

                                                                        <?php } ?>



                                                                        <?php if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes" ){ ?>

                                                                        <p><b>Approve คนที่
                                                                                <?php echo $cc->app_sequence; ?>
                                                                                <?php echo $cc->app_midname; ?> (
                                                                                <?php echo $cc->app_midid; ?>)</b>
                                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                            <div id="chka<?php echo $qq->app_midid; ?>">
                                                                                <span class="label bg-blue">Wait</span>
                                                                                <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="yes"){ ?>
                                                                                <p><b>Approve คนที่
                                                                                        <?php echo $cc->app_sequence; ?>
                                                                                        <?php echo $cc->app_midname; ?>
                                                                                        (
                                                                                        <?php echo $cc->app_midid; ?>)</b>
                                                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                </p>
                                                                                <span class="label bg-success-400">Approve</span>
                                                                                <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="no"){ ?>
                                                                                <p><b>Approve คนที่
                                                                                        <?php echo $cc->app_sequence; ?>
                                                                                        <?php echo $cc->app_midname; ?>
                                                                                        (
                                                                                        <?php echo $cc->app_midid; ?>)</b>
                                                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                </p>
                                                                                <p style="color: red;"><b>Not verified
                                                                                        yet.</b></p>
                                                                                <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="yes"){ ?>
                                                                                <p><b>Approve คนที่
                                                                                        <?php echo $cc->app_sequence; ?>
                                                                                        <?php echo $cc->app_midname; ?>
                                                                                        (
                                                                                        <?php echo $cc->app_midid; ?>)</b>
                                                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                </p>
                                                                                <p style="color: green;"><b>Approved
                                                                                        successfully.</b></p>
                                                                                <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="no"  && $cc->status!="yes" && $l3!="Y"){ ?>
                                                                                <p><b>Approve คนที่
                                                                                        <?php echo $cc->app_sequence; ?>
                                                                                        <?php echo $cc->app_midname; ?>
                                                                                        (
                                                                                        <?php echo $cc->app_midid; ?>)</b>
                                                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                </p>
                                                                                <span class="label bg-blue">Wait</span>
                                                                                <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="approve"){ ?>
                                                                                <p><b>Approve คนที่
                                                                                        <?php echo $cc->app_sequence; ?>
                                                                                        <?php echo $cc->app_midname; ?>
                                                                                        (
                                                                                        <?php echo $cc->app_midid; ?>)</b>
                                                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                </p>
                                                                                <p style="color: green;"><b>Approved
                                                                                        successfully.</b></p>
                                                                                <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="approve"){ ?>
                                                                                <p><b>Approve คนที่
                                                                                        <?php echo $cc->app_sequence; ?>
                                                                                        <?php echo $cc->app_midname; ?>
                                                                                        (
                                                                                        <?php echo $cc->app_midid; ?>)</b>
                                                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                </p>
                                                                                <p style="color: green;"><b>Approved
                                                                                        successfully.</b></p>

                                                                                <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes"){ ?>
                                                                                <p><b>Approve คนที่
                                                                                        <?php echo $cc->app_sequence; ?>
                                                                                        <?php echo $cc->app_midname; ?>
                                                                                        (
                                                                                        <?php echo $cc->app_midid; ?>)</b>
                                                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                </p>
                                                                                <p style="color: red;"><b>Not verified
                                                                                        yet.</b></p>
                                                                                <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="no" ){ ?>

                                                                                <p><b>Approve คนที่
                                                                                        <?php echo $cc->app_sequence; ?>
                                                                                        <?php echo $cc->app_midname; ?>
                                                                                        (
                                                                                        <?php echo $cc->app_midid; ?>)</b>
                                                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                    <p style="color: red;"><b>Not
                                                                                            verified yet.</b></p>
                                                                                    <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes"){ ?>
                                                                                    <p><b>Approve คนที่
                                                                                            <?php echo $cc->app_sequence; ?>
                                                                                            <?php echo $cc->app_midname; ?>
                                                                                            (
                                                                                            <?php echo $cc->app_midid; ?>)</b>
                                                                                        <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                    </p>
                                                                                    <p style="color: red;"><b>Not
                                                                                            verified yet.</b></p>

                                                                                    <?php } ?>



                                                                                    <?php if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes" ){ ?>

                                                                                    <p><b>Approve คนที่
                                                                                            <?php echo $cc->app_sequence; ?>
                                                                                            <?php echo $cc->app_midname; ?>
                                                                                            (
                                                                                            <?php echo $cc->app_midid; ?>)</b>
                                                                                        <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                        <div id="chka<?php echo $qq->app_midid; ?>">
                                                                                            <span class="label bg-blue">Wait</span>
                                                                                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="yes"){ ?>
                                                                                            <p><b>Approve คนที่
                                                                                                    <?php echo $cc->app_sequence; ?>
                                                                                                    <?php echo $cc->app_midname; ?>
                                                                                                    (
                                                                                                    <?php echo $cc->app_midid; ?>)</b>
                                                                                                <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                            </p>
                                                                                            <span class="label bg-success-400">Approve</span>
                                                                                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="no"){ ?>
                                                                                            <p><b>Approve คนที่
                                                                                                    <?php echo $cc->app_sequence; ?>
                                                                                                    <?php echo $cc->app_midname; ?>
                                                                                                    (
                                                                                                    <?php echo $cc->app_midid; ?>)</b>
                                                                                                <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                            </p>
                                                                                            <p style="color: red;"><b>Not
                                                                                                    verified yet.</b></p>
                                                                                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="yes"){ ?>
                                                                                            <p><b>Approve คนที่
                                                                                                    <?php echo $cc->app_sequence; ?>
                                                                                                    <?php echo $cc->app_midname; ?>
                                                                                                    (
                                                                                                    <?php echo $cc->app_midid; ?>)</b>
                                                                                                <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                            </p>
                                                                                            <p style="color: green;"><b>Approved
                                                                                                    successfully.</b></p>
                                                                                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="no"  && $cc->status!="yes" && $l4!="Y"){ ?>
                                                                                            <p><b>Approve คนที่
                                                                                                    <?php echo $cc->app_sequence; ?>
                                                                                                    <?php echo $cc->app_midname; ?>
                                                                                                    (
                                                                                                    <?php echo $cc->app_midid; ?>)</b>
                                                                                                <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                            </p>
                                                                                            <span class="label bg-blue">Wait</span>
                                                                                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="approve"){ ?>
                                                                                            <p><b>Approve คนที่
                                                                                                    <?php echo $cc->app_sequence; ?>
                                                                                                    <?php echo $cc->app_midname; ?>
                                                                                                    (
                                                                                                    <?php echo $cc->app_midid; ?>)</b>
                                                                                                <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                            </p>
                                                                                            <p style="color: green;"><b>Approved
                                                                                                    successfully.</b></p>
                                                                                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="approve"){ ?>
                                                                                            <p><b>Approve คนที่
                                                                                                    <?php echo $cc->app_sequence; ?>
                                                                                                    <?php echo $cc->app_midname; ?>
                                                                                                    (
                                                                                                    <?php echo $cc->app_midid; ?>)</b>
                                                                                                <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                            </p>
                                                                                            <p style="color: green;"><b>Approved
                                                                                                    successfully.</b></p>

                                                                                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes"){ ?>
                                                                                            <p><b>Approve คนที่
                                                                                                    <?php echo $cc->app_sequence; ?>
                                                                                                    <?php echo $cc->app_midname; ?>
                                                                                                    (
                                                                                                    <?php echo $cc->app_midid; ?>)</b>
                                                                                                <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                            </p>
                                                                                            <p style="color: red;"><b>Not
                                                                                                    verified yet.</b></p>
                                                                                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="no" ){ ?>

                                                                                            <p><b>Approve คนที่
                                                                                                    <?php echo $cc->app_sequence; ?>
                                                                                                    <?php echo $cc->app_midname; ?>
                                                                                                    (
                                                                                                    <?php echo $cc->app_midid; ?>)</b>
                                                                                                <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                <p style="color: red;"><b>Not
                                                                                                        verified yet.</b></p>
                                                                                                <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes"){ ?>
                                                                                                <p><b>Approve คนที่
                                                                                                        <?php echo $cc->app_sequence; ?>
                                                                                                        <?php echo $cc->app_midname; ?>
                                                                                                        (
                                                                                                        <?php echo $cc->app_midid; ?>)</b>
                                                                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                </p>
                                                                                                <p style="color: red;"><b>Not
                                                                                                        verified yet.</b></p>

                                                                                                <?php } ?>


                                                                                                <?php if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes" ){ ?>

                                                                                                <p><b>Approve คนที่
                                                                                                        <?php echo $cc->app_sequence; ?>
                                                                                                        <?php echo $cc->app_midname; ?>
                                                                                                        (
                                                                                                        <?php echo $cc->app_midid; ?>)</b>
                                                                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                    <div id="chka<?php echo $qq->app_midid; ?>">
                                                                                                        <span class="label bg-blue">Wait</span>
                                                                                                        <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="yes"){ ?>
                                                                                                        <p><b>Approve
                                                                                                                คนที่
                                                                                                                <?php echo $cc->app_sequence; ?>
                                                                                                                <?php echo $cc->app_midname; ?>
                                                                                                                (
                                                                                                                <?php echo $cc->app_midid; ?>)</b>
                                                                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                        </p>
                                                                                                        <span class="label bg-success-400">Approve</span>
                                                                                                        <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="no"){ ?>
                                                                                                        <p><b>Approve
                                                                                                                คนที่
                                                                                                                <?php echo $cc->app_sequence; ?>
                                                                                                                <?php echo $cc->app_midname; ?>
                                                                                                                (
                                                                                                                <?php echo $cc->app_midid; ?>)</b>
                                                                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                        </p>
                                                                                                        <p style="color: red;"><b>Not
                                                                                                                verified
                                                                                                                yet.</b></p>
                                                                                                        <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="yes"){ ?>
                                                                                                        <p><b>Approve
                                                                                                                คนที่
                                                                                                                <?php echo $cc->app_sequence; ?>
                                                                                                                <?php echo $cc->app_midname; ?>
                                                                                                                (
                                                                                                                <?php echo $cc->app_midid; ?>)</b>
                                                                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                        </p>
                                                                                                        <p style="color: green;"><b>Approved
                                                                                                                successfully.</b></p>
                                                                                                        <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s2=="no"  && $cc->status!="yes" && $l5!="Y"){ ?>
                                                                                                        <p><b>Approve
                                                                                                                คนที่
                                                                                                                <?php echo $cc->app_sequence; ?>
                                                                                                                <?php echo $cc->app_midname; ?>
                                                                                                                (
                                                                                                                <?php echo $cc->app_midid; ?>)</b>
                                                                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                        </p>
                                                                                                        <span class="label bg-blue">Wait</span>
                                                                                                        <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="approve"){ ?>
                                                                                                        <p><b>Approve
                                                                                                                คนที่
                                                                                                                <?php echo $cc->app_sequence; ?>
                                                                                                                <?php echo $cc->app_midname; ?>
                                                                                                                (
                                                                                                                <?php echo $cc->app_midid; ?>)</b>
                                                                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                        </p>
                                                                                                        <p style="color: green;"><b>Approved
                                                                                                                successfully.</b></p>
                                                                                                        <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="approve"){ ?>
                                                                                                        <p><b>Approve
                                                                                                                คนที่
                                                                                                                <?php echo $cc->app_sequence; ?>
                                                                                                                <?php echo $cc->app_midname; ?>
                                                                                                                (
                                                                                                                <?php echo $cc->app_midid; ?>)</b>
                                                                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                        </p>
                                                                                                        <p style="color: green;"><b>Approved
                                                                                                                successfully.</b></p>

                                                                                                        <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes"){ ?>
                                                                                                        <p><b>Approve
                                                                                                                คนที่
                                                                                                                <?php echo $cc->app_sequence; ?>
                                                                                                                <?php echo $cc->app_midname; ?>
                                                                                                                (
                                                                                                                <?php echo $cc->app_midid; ?>)</b>
                                                                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                        </p>
                                                                                                        <p style="color: red;"><b>Not
                                                                                                                verified
                                                                                                                yet.</b></p>
                                                                                                        <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="no" ){ ?>

                                                                                                        <p><b>Approve
                                                                                                                คนที่
                                                                                                                <?php echo $cc->app_sequence; ?>
                                                                                                                <?php echo $cc->app_midname; ?>
                                                                                                                (
                                                                                                                <?php echo $cc->app_midid; ?>)</b>
                                                                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                            <p style="color: red;"><b>Not
                                                                                                                    verified
                                                                                                                    yet.</b></p>
                                                                                                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes"){ ?>
                                                                                                            <p><b>Approve
                                                                                                                    คนที่
                                                                                                                    <?php echo $cc->app_sequence; ?>
                                                                                                                    <?php echo $cc->app_midname; ?>
                                                                                                                    (
                                                                                                                    <?php echo $cc->app_midid; ?>)</b>
                                                                                                                <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                            </p>
                                                                                                            <p style="color: red;"><b>Not
                                                                                                                    verified
                                                                                                                    yet.</b></p>

                                                                                                            <?php } ?>


                                                                                                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes" ){ ?>

                                                                                                            <p><b>Approve
                                                                                                                    คนที่
                                                                                                                    <?php echo $cc->app_sequence; ?>
                                                                                                                    <?php echo $cc->app_midname; ?>
                                                                                                                    (
                                                                                                                    <?php echo $cc->app_midid; ?>)</b>
                                                                                                                <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                <div id="chka<?php echo $qq->app_midid; ?>">
                                                                                                                    <span
                                                                                                                        class="label bg-blue">Wait</span>
                                                                                                                    <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="yes"){ ?>
                                                                                                                    <p><b>Approve
                                                                                                                            คนที่
                                                                                                                            <?php echo $cc->app_sequence; ?>
                                                                                                                            <?php echo $cc->app_midname; ?>
                                                                                                                            (
                                                                                                                            <?php echo $cc->app_midid; ?>)</b>
                                                                                                                        <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                    </p>
                                                                                                                    <span
                                                                                                                        class="label bg-success-400">Approve</span>
                                                                                                                    <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="no"){ ?>
                                                                                                                    <p><b>Approve
                                                                                                                            คนที่
                                                                                                                            <?php echo $cc->app_sequence; ?>
                                                                                                                            <?php echo $cc->app_midname; ?>
                                                                                                                            (
                                                                                                                            <?php echo $cc->app_midid; ?>)</b>
                                                                                                                        <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                    </p>
                                                                                                                    <p
                                                                                                                        style="color: red;"><b>Not
                                                                                                                            verified
                                                                                                                            yet.</b></p>
                                                                                                                    <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="yes"){ ?>
                                                                                                                    <p><b>Approve
                                                                                                                            คนที่
                                                                                                                            <?php echo $cc->app_sequence; ?>
                                                                                                                            <?php echo $cc->app_midname; ?>
                                                                                                                            (
                                                                                                                            <?php echo $cc->app_midid; ?>)</b>
                                                                                                                        <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                    </p>
                                                                                                                    <p
                                                                                                                        style="color: green;"><b>Approved
                                                                                                                            successfully.</b></p>
                                                                                                                    <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="no"  && $cc->status!="yes" && $l6!="Y"){ ?>
                                                                                                                    <p><b>Approve
                                                                                                                            คนที่
                                                                                                                            <?php echo $cc->app_sequence; ?>
                                                                                                                            <?php echo $cc->app_midname; ?>
                                                                                                                            (
                                                                                                                            <?php echo $cc->app_midid; ?>)</b>
                                                                                                                        <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                    </p>
                                                                                                                    <span
                                                                                                                        class="label bg-blue">Wait</span>
                                                                                                                    <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="approve"){ ?>
                                                                                                                    <p><b>Approve
                                                                                                                            คนที่
                                                                                                                            <?php echo $cc->app_sequence; ?>
                                                                                                                            <?php echo $cc->app_midname; ?>
                                                                                                                            (
                                                                                                                            <?php echo $cc->app_midid; ?>)</b>
                                                                                                                        <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                    </p>
                                                                                                                    <p
                                                                                                                        style="color: green;"><b>Approved
                                                                                                                            successfully.</b></p>
                                                                                                                    <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="approve"){ ?>
                                                                                                                    <p><b>Approve
                                                                                                                            คนที่
                                                                                                                            <?php echo $cc->app_sequence; ?>
                                                                                                                            <?php echo $cc->app_midname; ?>
                                                                                                                            (
                                                                                                                            <?php echo $cc->app_midid; ?>)</b>
                                                                                                                        <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                    </p>
                                                                                                                    <p
                                                                                                                        style="color: green;"><b>Approved
                                                                                                                            successfully.</b></p>

                                                                                                                    <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes"){ ?>
                                                                                                                    <p><b>Approve
                                                                                                                            คนที่
                                                                                                                            <?php echo $cc->app_sequence; ?>
                                                                                                                            <?php echo $cc->app_midname; ?>
                                                                                                                            (
                                                                                                                            <?php echo $cc->app_midid; ?>)</b>
                                                                                                                        <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                    </p>
                                                                                                                    <p
                                                                                                                        style="color: red;"><b>Not
                                                                                                                            verified
                                                                                                                            yet.</b></p>
                                                                                                                    <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="no" ){ ?>

                                                                                                                    <p><b>Approve
                                                                                                                            คนที่
                                                                                                                            <?php echo $cc->app_sequence; ?>
                                                                                                                            <?php echo $cc->app_midname; ?>
                                                                                                                            (
                                                                                                                            <?php echo $cc->app_midid; ?>)</b>
                                                                                                                        <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                        <p
                                                                                                                            style="color: red;"><b>Not
                                                                                                                                verified
                                                                                                                                yet.</b></p>
                                                                                                                        <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes"){ ?>
                                                                                                                        <p><b>Approve
                                                                                                                                คนที่
                                                                                                                                <?php echo $cc->app_sequence; ?>
                                                                                                                                <?php echo $cc->app_midname; ?>
                                                                                                                                (
                                                                                                                                <?php echo $cc->app_midid; ?>)</b>
                                                                                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                        </p>
                                                                                                                        <p
                                                                                                                            style="color: red;"><b>Not
                                                                                                                                verified
                                                                                                                                yet.</b></p>

                                                                                                                        <?php } ?>



                                                                                                                        <?php if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes" ){ ?>

                                                                                                                        <p><b>Approve
                                                                                                                                คนที่
                                                                                                                                <?php echo $cc->app_sequence; ?>
                                                                                                                                <?php echo $cc->app_midname; ?>
                                                                                                                                (
                                                                                                                                <?php echo $cc->app_midid; ?>)</b>
                                                                                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                            <div
                                                                                                                                id="chka<?php echo $qq->app_midid; ?>">
                                                                                                                                <span
                                                                                                                                    class="label bg-blue">Wait</span>
                                                                                                                                <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="yes"){ ?>
                                                                                                                                <p><b>Approve
                                                                                                                                        คนที่
                                                                                                                                        <?php echo $cc->app_sequence; ?>
                                                                                                                                        <?php echo $cc->app_midname; ?>
                                                                                                                                        (
                                                                                                                                        <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                </p>
                                                                                                                                <span
                                                                                                                                    class="label bg-success-400">Approve</span>
                                                                                                                                <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="no"){ ?>
                                                                                                                                <p><b>Approve
                                                                                                                                        คนที่
                                                                                                                                        <?php echo $cc->app_sequence; ?>
                                                                                                                                        <?php echo $cc->app_midname; ?>
                                                                                                                                        (
                                                                                                                                        <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                </p>
                                                                                                                                <p
                                                                                                                                    style="color: red;"><b>Not
                                                                                                                                        verified
                                                                                                                                        yet.</b></p>
                                                                                                                                <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="yes"){ ?>
                                                                                                                                <p><b>Approve
                                                                                                                                        คนที่
                                                                                                                                        <?php echo $cc->app_sequence; ?>
                                                                                                                                        <?php echo $cc->app_midname; ?>
                                                                                                                                        (
                                                                                                                                        <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                </p>
                                                                                                                                <p
                                                                                                                                    style="color: green;"><b>Approved
                                                                                                                                        successfully.</b></p>
                                                                                                                                <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="no"  && $cc->status!="yes" && $l7!="Y"){ ?>
                                                                                                                                <p><b>Approve
                                                                                                                                        คนที่
                                                                                                                                        <?php echo $cc->app_sequence; ?>
                                                                                                                                        <?php echo $cc->app_midname; ?>
                                                                                                                                        (
                                                                                                                                        <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                </p>
                                                                                                                                <span
                                                                                                                                    class="label bg-blue">Wait</span>
                                                                                                                                <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="approve"){ ?>
                                                                                                                                <p><b>Approve
                                                                                                                                        คนที่
                                                                                                                                        <?php echo $cc->app_sequence; ?>
                                                                                                                                        <?php echo $cc->app_midname; ?>
                                                                                                                                        (
                                                                                                                                        <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                </p>
                                                                                                                                <p
                                                                                                                                    style="color: green;"><b>Approved
                                                                                                                                        successfully.</b></p>
                                                                                                                                <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="approve"){ ?>
                                                                                                                                <p><b>Approve
                                                                                                                                        คนที่
                                                                                                                                        <?php echo $cc->app_sequence; ?>
                                                                                                                                        <?php echo $cc->app_midname; ?>
                                                                                                                                        (
                                                                                                                                        <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                </p>
                                                                                                                                <p
                                                                                                                                    style="color: green;"><b>Approved
                                                                                                                                        successfully.</b></p>

                                                                                                                                <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes"){ ?>
                                                                                                                                <p><b>Approve
                                                                                                                                        คนที่
                                                                                                                                        <?php echo $cc->app_sequence; ?>
                                                                                                                                        <?php echo $cc->app_midname; ?>
                                                                                                                                        (
                                                                                                                                        <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                </p>
                                                                                                                                <p
                                                                                                                                    style="color: red;"><b>Not
                                                                                                                                        verified
                                                                                                                                        yet.</b></p>
                                                                                                                                <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="no" ){ ?>

                                                                                                                                <p><b>Approve
                                                                                                                                        คนที่
                                                                                                                                        <?php echo $cc->app_sequence; ?>
                                                                                                                                        <?php echo $cc->app_midname; ?>
                                                                                                                                        (
                                                                                                                                        <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                    <p
                                                                                                                                        style="color: red;"><b>Not
                                                                                                                                            verified
                                                                                                                                            yet.</b></p>
                                                                                                                                    <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes"){ ?>
                                                                                                                                    <p><b>Approve
                                                                                                                                            คนที่
                                                                                                                                            <?php echo $cc->app_sequence; ?>
                                                                                                                                            <?php echo $cc->app_midname; ?>
                                                                                                                                            (
                                                                                                                                            <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                        <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                    </p>
                                                                                                                                    <p
                                                                                                                                        style="color: red;"><b>Not
                                                                                                                                            verified
                                                                                                                                            yet.</b></p>

                                                                                                                                    <?php } ?>


                                                                                                                                    <?php if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes" ){ ?>

                                                                                                                                    <p><b>Approve
                                                                                                                                            คนที่
                                                                                                                                            <?php echo $cc->app_sequence; ?>
                                                                                                                                            <?php echo $cc->app_midname; ?>
                                                                                                                                            (
                                                                                                                                            <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                        <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                        <div
                                                                                                                                            id="chka<?php echo $qq->app_midid; ?>">
                                                                                                                                            <span
                                                                                                                                                class="label bg-blue">Wait</span>
                                                                                                                                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="yes"){ ?>
                                                                                                                                            <p><b>Approve
                                                                                                                                                    คนที่
                                                                                                                                                    <?php echo $cc->app_sequence; ?>
                                                                                                                                                    <?php echo $cc->app_midname; ?>
                                                                                                                                                    (
                                                                                                                                                    <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                                <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                            </p>
                                                                                                                                            <span
                                                                                                                                                class="label bg-success-400">Approve</span>
                                                                                                                                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="no"){ ?>
                                                                                                                                            <p><b>Approve
                                                                                                                                                    คนที่
                                                                                                                                                    <?php echo $cc->app_sequence; ?>
                                                                                                                                                    <?php echo $cc->app_midname; ?>
                                                                                                                                                    (
                                                                                                                                                    <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                                <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                            </p>
                                                                                                                                            <p
                                                                                                                                                style="color: red;"><b>Not
                                                                                                                                                    verified
                                                                                                                                                    yet.</b></p>
                                                                                                                                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="yes"){ ?>
                                                                                                                                            <p><b>Approve
                                                                                                                                                    คนที่
                                                                                                                                                    <?php echo $cc->app_sequence; ?>
                                                                                                                                                    <?php echo $cc->app_midname; ?>
                                                                                                                                                    (
                                                                                                                                                    <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                                <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                            </p>
                                                                                                                                            <p
                                                                                                                                                style="color: green;"><b>Approved
                                                                                                                                                    successfully.</b></p>
                                                                                                                                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="no"  && $cc->status!="yes" && $l8!="Y"){ ?>
                                                                                                                                            <p><b>Approve
                                                                                                                                                    คนที่
                                                                                                                                                    <?php echo $cc->app_sequence; ?>
                                                                                                                                                    <?php echo $cc->app_midname; ?>
                                                                                                                                                    (
                                                                                                                                                    <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                                <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                            </p>
                                                                                                                                            <span
                                                                                                                                                class="label bg-blue">Wait</span>
                                                                                                                                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="approve"){ ?>
                                                                                                                                            <p><b>Approve
                                                                                                                                                    คนที่
                                                                                                                                                    <?php echo $cc->app_sequence; ?>
                                                                                                                                                    <?php echo $cc->app_midname; ?>
                                                                                                                                                    (
                                                                                                                                                    <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                                <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                            </p>
                                                                                                                                            <p
                                                                                                                                                style="color: green;"><b>Approved
                                                                                                                                                    successfully.</b></p>
                                                                                                                                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="approve"){ ?>
                                                                                                                                            <p><b>Approve
                                                                                                                                                    คนที่
                                                                                                                                                    <?php echo $cc->app_sequence; ?>
                                                                                                                                                    <?php echo $cc->app_midname; ?>
                                                                                                                                                    (
                                                                                                                                                    <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                                <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                            </p>
                                                                                                                                            <p
                                                                                                                                                style="color: green;"><b>Approved
                                                                                                                                                    successfully.</b></p>

                                                                                                                                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes"){ ?>
                                                                                                                                            <p><b>Approve
                                                                                                                                                    คนที่
                                                                                                                                                    <?php echo $cc->app_sequence; ?>
                                                                                                                                                    <?php echo $cc->app_midname; ?>
                                                                                                                                                    (
                                                                                                                                                    <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                                <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                            </p>
                                                                                                                                            <p
                                                                                                                                                style="color: red;"><b>Not
                                                                                                                                                    verified
                                                                                                                                                    yet.</b></p>
                                                                                                                                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="no" ){ ?>

                                                                                                                                            <p><b>Approve
                                                                                                                                                    คนที่
                                                                                                                                                    <?php echo $cc->app_sequence; ?>
                                                                                                                                                    <?php echo $cc->app_midname; ?>
                                                                                                                                                    (
                                                                                                                                                    <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                                <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                                <p
                                                                                                                                                    style="color: red;"><b>Not
                                                                                                                                                        verified
                                                                                                                                                        yet.</b></p>
                                                                                                                                                <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes"){ ?>
                                                                                                                                                <p><b>Approve
                                                                                                                                                        คนที่
                                                                                                                                                        <?php echo $cc->app_sequence; ?>
                                                                                                                                                        <?php echo $cc->app_midname; ?>
                                                                                                                                                        (
                                                                                                                                                        <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                                </p>
                                                                                                                                                <p
                                                                                                                                                    style="color: red;"><b>Not
                                                                                                                                                        verified
                                                                                                                                                        yet.</b></p>

                                                                                                                                                <?php } ?>



                                                                                                                                                <?php if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes" ){ ?>

                                                                                                                                                <p><b>Approve
                                                                                                                                                        คนที่
                                                                                                                                                        <?php echo $cc->app_sequence; ?>
                                                                                                                                                        <?php echo $cc->app_midname; ?>
                                                                                                                                                        (
                                                                                                                                                        <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                                    <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                                    <div
                                                                                                                                                        id="chka<?php echo $qq->app_midid; ?>">
                                                                                                                                                        <span
                                                                                                                                                            class="label bg-blue">Wait</span>
                                                                                                                                                        <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="yes"){ ?>
                                                                                                                                                        <p><b>Approve
                                                                                                                                                                คนที่
                                                                                                                                                                <?php echo $cc->app_sequence; ?>
                                                                                                                                                                <?php echo $cc->app_midname; ?>
                                                                                                                                                                (
                                                                                                                                                                <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                                        </p>
                                                                                                                                                        <span
                                                                                                                                                            class="label bg-success-400">Approve</span>
                                                                                                                                                        <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="no"){ ?>
                                                                                                                                                        <p><b>Approve
                                                                                                                                                                คนที่
                                                                                                                                                                <?php echo $cc->app_sequence; ?>
                                                                                                                                                                <?php echo $cc->app_midname; ?>
                                                                                                                                                                (
                                                                                                                                                                <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                                        </p>
                                                                                                                                                        <p
                                                                                                                                                            style="color: red;"><b>Not
                                                                                                                                                                verified
                                                                                                                                                                yet.</b></p>
                                                                                                                                                        <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="yes"){ ?>
                                                                                                                                                        <p><b>Approve
                                                                                                                                                                คนที่
                                                                                                                                                                <?php echo $cc->app_sequence; ?>
                                                                                                                                                                <?php echo $cc->app_midname; ?>
                                                                                                                                                                (
                                                                                                                                                                <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                                        </p>
                                                                                                                                                        <p
                                                                                                                                                            style="color: green;"><b>Approved
                                                                                                                                                                successfully.</b></p>
                                                                                                                                                        <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="no"  && $cc->status!="yes" && $l9!="Y"){ ?>
                                                                                                                                                        <p><b>Approve
                                                                                                                                                                คนที่
                                                                                                                                                                <?php echo $cc->app_sequence; ?>
                                                                                                                                                                <?php echo $cc->app_midname; ?>
                                                                                                                                                                (
                                                                                                                                                                <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                                        </p>
                                                                                                                                                        <span
                                                                                                                                                            class="label bg-blue">Wait</span>
                                                                                                                                                        <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="approve"){ ?>
                                                                                                                                                        <p><b>Approve
                                                                                                                                                                คนที่
                                                                                                                                                                <?php echo $cc->app_sequence; ?>
                                                                                                                                                                <?php echo $cc->app_midname; ?>
                                                                                                                                                                (
                                                                                                                                                                <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                                        </p>
                                                                                                                                                        <p
                                                                                                                                                            style="color: green;"><b>Approved
                                                                                                                                                                successfully.</b></p>
                                                                                                                                                        <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="approve"){ ?>
                                                                                                                                                        <p><b>Approve
                                                                                                                                                                คนที่
                                                                                                                                                                <?php echo $cc->app_sequence; ?>
                                                                                                                                                                <?php echo $cc->app_midname; ?>
                                                                                                                                                                (
                                                                                                                                                                <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                                        </p>
                                                                                                                                                        <p
                                                                                                                                                            style="color: green;"><b>Approved
                                                                                                                                                                successfully.</b></p>

                                                                                                                                                        <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes"){ ?>
                                                                                                                                                        <p><b>Approve
                                                                                                                                                                คนที่
                                                                                                                                                                <?php echo $cc->app_sequence; ?>
                                                                                                                                                                <?php echo $cc->app_midname; ?>
                                                                                                                                                                (
                                                                                                                                                                <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                                        </p>
                                                                                                                                                        <p
                                                                                                                                                            style="color: red;"><b>Not
                                                                                                                                                                verified
                                                                                                                                                                yet.</b></p>
                                                                                                                                                        <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="no" ){ ?>

                                                                                                                                                        <p><b>Approve
                                                                                                                                                                คนที่
                                                                                                                                                                <?php echo $cc->app_sequence; ?>
                                                                                                                                                                <?php echo $cc->app_midname; ?>
                                                                                                                                                                (
                                                                                                                                                                <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                                            <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                                            <p
                                                                                                                                                                style="color: red;"><b>Not
                                                                                                                                                                    verified
                                                                                                                                                                    yet.</b></p>
                                                                                                                                                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes"){ ?>
                                                                                                                                                            <p><b>Approve
                                                                                                                                                                    คนที่
                                                                                                                                                                    <?php echo $cc->app_sequence; ?>
                                                                                                                                                                    <?php echo $cc->app_midname; ?>
                                                                                                                                                                    (
                                                                                                                                                                    <?php echo $cc->app_midid; ?>)</b>
                                                                                                                                                                <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                                                                                                                                            </p>
                                                                                                                                                            <p
                                                                                                                                                                style="color: red;"><b>Not
                                                                                                                                                                    verified
                                                                                                                                                                    yet.</b></p>

                                                                                                                                                            <?php } ?>

                                                                                                                                                    </div>


                                                                                                                                                    <br>
                                                                                                                                                </p>
                                                                                                                                                <?php $this->db->select('*');
                          $this->db->from('approve_td');
                          $this->db->where('app_project',$tdn);
                          $this->db->where('app_pr',$qq->app_pr);
                          $this->db->where('app_midname',$username);
                          $numx=$this->db->get()->num_rows(); 
                          ?>

                                                                                                                                                <script>
                                                                                                                                                    if("<?php echo $numx; ?>"=="0"){
                            $('.hideapp<?php echo $qq->app_pr; ?>').hide();
                           }
                        </script>






                                                                                                                                                <?php } ?>
                                        </td>
                                        <td></td>



                                    </tr>




                                </tbody>
                            </table>

                        </div>
                    </div>
<div id="viewboq<?php echo $qq->app_pr; ?>" class="modal fade">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">View BOQ no. <?php echo $qq->app_pr; ?></h5>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered datatable-fixed-left" >
                        <thead>
                            <tr>
                                <th rowspan="2">No.</th>
                                <th rowspan="2">Job</th>
                                <th rowspan="2">Cost Code</th>
                                <th rowspan="2">Description</th>
                                <th rowspan="2">BOQ CODE</th>
                                <th rowspan="2">BOQ NAME</th>
                                <th rowspan="2" >UNIT</th>
                                <th colspan="8" class="text-center">Budget</th>
                                <th rowspan="2" class="text-center"></th>
                            </tr>
                            <tr>
                                <th class="text-center">QTY</th>
                                <th class="text-center">MAT. Price</th>
                                <th class="text-center">MAT. Amount</th>
                                <th class="text-center">LAB. Price</th>
                                <th class="text-center">LAB. Amount</th>
                                <th class="text-center">SAB. Price</th>
                                <th class="text-center">SAB. Amount</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                                <?php 
                                    $this->db->select('*');
                                    $this->db->from('boq_item');
                                    $this->db->where('status',"W");
                                    $this->db->where('heading_ref',$qq->app_pr);
                                    $boq_i=$this->db->get()->result();
                                ?>
                        <tbody >
                            <?php $q=1; 
                                $qty_bg = 0;
                                $matpricebg = 0;
                                $matamtbg = 0;
                                $labpricebg = 0;
                                $labamtbg = 0;
                                $totalamt = 0;
                                $matpriceboq = 0;
                                $matamtboq = 0;
                                $labpriceboq = 0;
                                $labamtboq = 0;
                                $totalamtboq = 0;
                                $subpricebg = 0;
                                $subamtbg = 0;
                                foreach ($boq_i as $t_d) { 
                                $qty_bg = $qty_bg+$t_d->qty_bg;
                                $matpricebg = $matpricebg+$t_d->matpricebg;
                                $matamtbg = $matamtbg+$t_d->matamtbg;
                                $labpricebg = $labpricebg+$t_d->labpricebg;
                                $labamtbg = $labamtbg+$t_d->labamtbg;
                                $subpricebg = $subpricebg+$t_d->subpricebg;
                                $subamtbg = $subamtbg+$t_d->subamtbg;
                                $totalamt = $totalamt+$t_d->totalamt;
                                $matpriceboq = $matpriceboq+$t_d->matpriceboq;
                                $matamtboq = $matamtboq+$t_d->matamtboq;
                                $labpriceboq = $labpriceboq+$t_d->labpriceboq;
                                $labamtboq = $labamtboq+$t_d->labamtboq;
                                $totalamtboq = $totalamtboq+$t_d->totalamtboq;
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $q; ?></td>
                                <td><?php
                                    $this->db->select('*');
                                    $this->db->from('bdtender_d');
                                    $this->db->where('bdd_tenid',$tdn);
                                    $this->db->where('bdd_jobno',$t_d->boq_job);
                                    $tender_d=$this->db->get()->result(); ?>
                                    <?php  foreach ($tender_d as $tender_dd) { ?>
                                    <?php echo $tender_dd->bdd_jobname; ?>
                                    <?php } ?>
                                    <input type="hidden" readonly="" id="job<?php echo $q; ?>" name="job[]" class="form-control input-xs text-right" value="<?php echo $t_d->boq_job; ?>" style="width: 200px;">

                                    <input type="hidden" readonly="" id="boq_id<?php echo $q; ?>" name="boq_id[]" class="form-control input-xs text-right" value="<?php echo $t_d->boq_id; ?>" style="width: 200px;">
                                </td>
                                <td><div style="width: 200px;">
                                    <?php echo $t_d->subcostcodename; ?>
                                    <input type="hidden" readonly="" id="codecostcodee<?php echo $q; ?>" name="subcostcode[]" class="form-control input-xs text-right" value="<?php echo $t_d->subcostcode; ?>" style="width: 200px;"><input type="hidden" readonly="" id="codecostnamee<?php echo $q; ?>" name="subcostcodename[]" class="form-control input-xs text-right" style="width: 200px;" value="<?php echo $t_d->subcostcodename; ?>">
                                </div></td>
                                <td><div class="input-group"><input readonly="true" type="text"  id="newmatnamee<?php echo $q; ?>" name="newmatnamee[]" class="form-control input-xs text-right" style="width: 200px;" value="<?php echo $t_d->newmatnamee; ?>"><input readonly="true" id="newmatcode<?php echo $q; ?>" style="width: 200px;" name="newmatcode[]"  type="hidden" class="form-control input-xs text-right" style="width: 150px;" value="<?php echo $t_d->newmatcode; ?>"><span class="input-group-btn"></span></div>
                                
                                </td>
                                <td><input id="boqcode<?php echo $q; ?>" name="boqcode[]" type="text" class="form-control input-xs text-right" value="<?php echo $t_d->boqcode; ?>" style="width: 100px;"></td>
                                <td><input id="matboqq<?php echo $q; ?>" name="matboq[]" type="text"  class="form-control input-xs text-right" value="<?php echo $t_d->matboq; ?>" style="width: 150px;"></td>
                                <td class="text-right"><div class="input-group"><input  id="unitcode<?php echo $q; ?>" name="unitcode[]" type="hidden" class="form-control input-xs text-right" style="width: 200px;" readonly="" value="<?php echo $t_d->unitcode; ?>"><input  id="unitname<?php echo $q; ?>" name="unitname[]" type="text" class="form-control input-xs text-right" style="width: 100px;" readonly="" value="<?php echo $t_d->unitname; ?>"></div></td>
                                <td class="text-right"><input id="qty_bg<?php echo $q; ?>" name="qty_bg[]" type="text" value="<?php echo $t_d->qty_bg; ?>" class="form-control input-xs text-right" style="width: 100px;"  required=""><input type="hidden"  id="qtyboq<?php echo $q; ?>" name="qtyboq[]" class="form-control input-xs text-right" style="width: 100px;" value="<?php echo $t_d->qtyboq; ?>">
                                </td>
                                <td class="text-right"><input type="text" id="matpricebg<?php echo $q; ?>" name="matpricebg[]" value="<?php echo number_format($t_d->matpricebg,2); ?>" class="form-control input-xs text-right" style="width: 100px;"></td>
                                <td class="text-right"><input type="text" id="matamtbg<?php echo $q; ?>" name="matamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" readonly="" value="<?php echo number_format($t_d->matamtbg,2); ?>"></td>
                                <td class="text-right"><input type="text" id="labpricebg<?php echo $q; ?>" name="labpricebg[]" value="<?php echo number_format($t_d->labpricebg,2); ?>" class="form-control input-xs text-right" style="width: 100px;"></td>
                                <td class="text-right"><input type="text" id="labamtbg<?php echo $q; ?>" name="labamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->labamtbg,2); ?>"></td>
                                <td class="text-right"><input type="text" id="subpricebg<?php echo $q; ?>" name="subpricebg[]" value="<?php echo number_format($t_d->subpricebg,2); ?>" class="form-control input-xs text-right" style="width: 100px;"></td>
                                <td class="text-right"><input type="text" id="subamtbg<?php echo $q; ?>" name="subamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->subamtbg,2); ?>"></td>
                                <td class="text-right"><input type="text"  id="totalamt<?php echo $q; ?>" name="totalamt[]" class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->totalamt,2); ?>"></td>
                            
                                <td style="color: #BEBEBE;"><?php echo $q; ?></td>
                            </tr>
                        <?php $q++; } ?>

                            <tr>
                                <td class="text-center" colspan="7"><b>TOTAL</b></td>
                                <td class="text-right"><?php echo number_format($qty_bg,2); ?></td>
                                <td class="text-right"><?php echo number_format($matpricebg,2); ?></td>
                                <td class="text-right"><?php echo number_format($matamtbg,2); ?></td>
                                <td class="text-right"><?php echo number_format($labpricebg,2); ?></td>
                                <td class="text-right"><?php echo number_format($labamtbg,2); ?></td>
                                <td class="text-right"><?php echo number_format($subpricebg,2); ?></td>
                                <td class="text-right"><?php echo number_format($subamtbg,2); ?></td>
                                <td class="text-right"><?php echo number_format($totalamt,2); ?></td>
                                <td class="text-right"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <a type="button" class="reload btn btn-link" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>
                    <?php }?>

                </div>
                <div class="tab-pane" id="basic-tab5">
                    1
                </div>
            </div>
        </div>

    </div>

</div>
</div>
</div>

<div id="modal_add_bom" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">BOM </h4>
            </div>
            <div class="modal-body" id="content_modal">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#show_bom').click(function(event) {
        if ($("#systemei").val() == "") {
            swal({
                title: "Select Job  !!",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else if ($("#boq_cost1").val() == "") {
            swal({
                title: "Select Cost Level 1   !!",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else if ($("#boq_cost2").val() == "") {
            swal({
                title: "Select Cost Level 2   !!",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else if ($("#boq_cost3").val() == "") {
            swal({
                title: "Select Cost Level 3   !!",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else if ($("#boq_cost4").val() == "") {
            swal({
                title: "Select Cost Level 4   !!",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else if ($("#boq_cost5").val() == "") {
            swal({
                title: "Select Cost Level 5   !!",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else {
            var num = parseFloat($('#num').val());
            $('#modal_add_bom').modal('show');
            $("#content_modal").load('<?=base_url()?>bd/show_all_bom/<?php echo $tdn; ?>/' + num);
        }

    });
</script>
<div id="import_excel" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Import BOQ From Excel <code>(.xls) (<?php echo $projectid; ?>)</code></h5>
            </div>
            <div class="modal-body">
                <?php $this->load->helper('form'); ?>
                <?php echo form_open_multipart('import_boq/do_upload/'.$tdn.'/'.$projectid);?>
                <div class="form-group">
                    <!-- <label class="col-lg-2 control-label text-semibold">Templates modification:</label> -->
                    <div class="col-lg-12">
                        <input type="file" class="file-input-advanced" id="file_upload" name="userfile">
                        <span class="help-block">Support File <code>.xls</code> Only.</span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                <!-- <input type="button" id="upload_boq" class="btn btn-primary btn-sm" value="Upload" /> -->
                <?php echo form_close();?>
            </div>
            <div class="modal-footer">
                <a type="button" class="reload btn btn-link" data-dismiss="modal">Close</a>
                <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
            </div>
        </div>
    </div>


</div>



<div id="copy_boq" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Copy Budget and Boq</h5>
            </div>
            <div class="modal-body">
                <div id="copyboq"></div>
            </div>
            <div class="modal-footer">
                <a type="button" class="reload btn btn-link" data-dismiss="modal">Close</a>
                <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
            </div>
        </div>
    </div>
</div>
<script>
    $('#copyboqq').click(function(event) {
        $('#copyboq').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $('#copyboq').load('<?php echo base_url(); ?>index.php/bd/load_boq');
    });
</script>


<div id="editrow"></div>
<div id="editrow1"></div>
<div id="editrow2"></div>
<div id="editrow3"></div>
<div id="editrow4"></div>
<div id="editrow5"></div>
<div id="editrow6"></div>
<div id="editrow7"></div>
<div id="editrow8"></div>
<div id="editrow9"></div>

<script>
    $("#addboq").click(function() {
        if ($("#systemei").val() == "") {
            swal({
                title: "Select Job  !!",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else if ($("#boq_cost1").val() == "") {
            swal({
                title: "Select Cost Level 1   !!",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else if ($("#boq_cost2").val() == "") {
            swal({
                title: "Select Cost Level 2   !!",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else if ($("#boq_cost3").val() == "") {
            swal({
                title: "Select Cost Level 3   !!",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else if ($("#boq_cost4").val() == "") {
            swal({
                title: "Select Cost Level 4   !!",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else if ($("#boq_cost5").val() == "") {
            swal({
                title: "Select Cost Level 5   !!",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else {
            var num = parseFloat($('#num').val());
            $('#num').val(num + 1);
            insert_row();
        }
    });

    function insert_row() {
          $('#delse').closest('tr').remove();
        var costcodetext = $('#costcodetext').val();
        var cnamecost = $('#cnamecost').val();
        var job = $('#systemei').val();
        var jobname = $('#jobname').val();
        var row = ($('#add_body tr').length) + 1;
        var tr = '<tr id="' + row + '">' +

            '<td class="text-center">' + row + '<input type="hidden" readonly="" id="substatus' + row +
            '" name="substatus[]" class="form-control input-xs text-right" value="I" style="width: 100px;"></td>' +
            '<td class="text-center">' + jobname + '<input type="hidden" readonly="" id="job' + row +
            '" name="job[]" class="form-control input-xs text-right" value="' + job + '" style="width: 100px;"></td>' +
            '<td><div style="width: 200px;">' + cnamecost + '</div><input type="hidden" readonly="" id="codecostcodee' +
            row + '" name="subcostcode[]" class="form-control input-xs text-right" value="' + costcodetext +
            '" style="width: 200px;"><input type="hidden" readonly="" id="codecostnamee' + row +
            '" name="subcostcodename[]" class="form-control input-xs text-right" style="width: 200px;" value="' +
            cnamecost + '"></td>' +
            '<td class="text-left"><div class="input-group"><input readonly="true" type="text"  id="newmatnamee' + row +
            '" name="newmatnamee[]" class="form-control input-xs" style="width: 200px;"><input readonly="true" id="newmatcode' +
            row +
            '" style="width: 200px;" name="newmatcode[]"  type="hidden" class="form-control input-xs text-right" style="width: 150px;"><span class="input-group-btn"><a class="openun' +
            row + ' btn btn-default btn-icon" data-toggle="modal" data-target="#opnewmat' + row +
            '"><i class="icon-search4"></i></a><a class="poo' + row +
            ' btn btn-default btn-icon" data-toggle="modal" data-target="#opnewmattt' + row +
            '"><i class="icon-search4"></i></a><a class="clearmat' + row +
            ' btn btn-default btn-icon" ><i class="glyphicon glyphicon-trash"></i></a></span></div></td>' +
            '<td class="text-left"><input id="boqcode' + row +
            '" name="boqcode[]" type="text" class="form-control input-xs" style="width: 100px;"></td>' +
            '<td class="text-left"><input id="matboqq' + row +
            '" name="matboq[]" type="text"  class="form-control input-xs" style="width: 150px;"></td>' +
            '<td class="text-left"><div class="input-group"><input  id="unitcode' + row +
            '" name="unitcode[]" type="hidden" class="form-control input-xs text-right" style="width: 200px;" readonly=""><input  id="unitname' +
            row +
            '" name="unitname[]" type="text" class="form-control input-xs" style="width: 100px;" readonly=""><span class="input-group-btn" ><span class="input-group-btn"><a class="unit' +
            row + ' btn btn-default btn-icon" data-toggle="modal" data-target="#unit' + row +
            '"><i class="icon-search4"></i></a></span></div></td>' +
            '<td class="text-center" style="background-color: #F0F8FF;"><input id="qty_bg' + row +
            '" name="qty_bg[]" type="text" value="0" class="form-control input-xs text-right" style="width: 100px;"  required=""></td>' +
            '<td class="text-center" style="background-color: #F0F8FF;"><input type="text" id="matpricebg' + row +
            '" name="matpricebg[]" value="0" class="form-control input-xs text-right" style="width: 100px;" value="0"></td>' +
            '<td class="text-center" style="background-color: #F0F8FF;"><input type="text" id="matamtbg' + row +
            '" name="matamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" readonly="" value="0"></td>' +
            '<td class="text-center" style="background-color: #F0F8FF;"><input type="text" id="labpricebg' + row +
            '" name="labpricebg[]" value="0" class="form-control input-xs text-right" style="width: 100px;" value="0"></td>' +
            '<td class="text-center" style="background-color: #F0F8FF;"><input type="text" id="labamtbg' + row +
            '" name="labamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" value="0"></td>' +

            '<td class="text-center" style="background-color: #F0F8FF;"><input type="text" id="subpricebg' + row +
            '" name="subpricebg[]" value="0" class="form-control input-xs text-right" style="width: 100px;" value="0"></td>' +
            '<td class="text-center" style="background-color: #F0F8FF;"><input type="text" id="subamtbg' + row +
            '" name="subamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" value="0"></td>' +

            '<td class="text-center" style="background-color: #F0F8FF;"><input type="text"  id="totalamt' + row +
            '" name="totalamt[]" class="form-control input-xs text-right" style="width: 100px;" value="0"></td>' +
            '<td hidden class="text-center" style="background-color: #F5FFFA;"><input type="hidden"  id="qtyboq' + row +
            '" name="qtyboq[]" class="form-control input-xs text-right" style="width: 100px;" value="0"></td>' +
            '<td hidden class="text-center" style="background-color: #F5FFFA;"><input type="hidden" id="matpriceboq' + row +
            '" name="matpriceboq[]" value="0" class="form-control input-xs text-right" style="width: 100px;"></td>' +
            '<td hidden class="text-center" style="background-color: #F5FFFA;"><input type="hidden" id="matamtboq' + row +
            '" name="matamtboq[]" value="0" class="form-control input-xs text-right" style="width: 100px;"></td>' +
            '<td hidden class="text-center" style="background-color: #F5FFFA;"><input type="hidden" value="0" id="labpriceboq' +
            row + '" name="labpriceboq[]" class="form-control input-xs text-right" style="width: 100px;"></td>' +
            '<td hidden class="text-center" style="background-color: #F5FFFA;"><input type="hidden" id="labamtboq' + row +
            '" name="labamtboq[]" value="0"  class="form-control input-xs text-right" style="width: 100px;"></td>' +

            '<td hidden style="background-color: #F5FFFA;"><input type="hidden" value="0" id="subpriceboq' + row +
            '" name="subpriceboq[]" class="form-control input-xs text-right" style="width: 100px;"></td>' +
            '<td hidden style="background-color: #F5FFFA;"><input type="hidden" id="subamtboq' + row +
            '" name="subamtboq[]" value="0"  class="form-control input-xs text-right" style="width: 100px;"></td>' +
            '<td hidden style="background-color: #F5FFFA;" class="text-center"><input type="hidden"   id="totalamtboq' + row +
            '" name="totalamtboq[]" value="0" class="form-control input-xs text-right" style="width: 100px;"></td>' +
            '<td class="text-center"><a id="remove' + row +
            '" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a></td>' +
            '<td style="color: #BEBEBE;">' + row + '</td>' +

            '</tr>';
        $('#add_body').append(tr);


        $('.clearmat' + row + '').click(function(event) {
            $('#newmatnamee' + row + '').val('');
            $('#newmatcode' + row + '').val('');
        });

        $('#qty_bg' + row + '').keyup(function() {
            var labpricebg = $('#labpricebg' + row + '').val().replace(/,/g, "");
            var qty_bg = $('#qty_bg' + row + '').val().replace(/,/g, "");
            var matpricebg = $('#matpricebg' + row + '').val().replace(/,/g, "");
            var total = (qty_bg * 1) * (matpricebg * 1);
            $('#matamtbg' + row + '').val(numberWithCommas(total));
            $('#totalamt' + row + '').val(numberWithCommas(total));
            $('#qtyboq' + row + '').val(numberWithCommas(qty_bg));
            if ($('#matamtbg' + row + '').val() == 0) {
                var ttla = (qty_bg * 1) * (labpricebg * 1);
                $('#totalamt' + row + '').val(numberWithCommas(ttla));
                $('#labamtbg' + row + '').val(numberWithCommas(ttla));
            }
        });
        $('#matpricebg' + row + '').keyup(function() {
            var qty_bg = $('#qty_bg' + row + '').val().replace(/,/g, "");
            var matpricebg = $('#matpricebg' + row + '').val().replace(/,/g, "");
            var total = (qty_bg * 1) * (matpricebg * 1);
            $('#matamtbg' + row + '').val(numberWithCommas(total));
            $('#totalamt' + row + '').val(numberWithCommas(total));
        });
        $('#labpricebg' + row + '').keyup(function() {
            $('#totalamt' + row + '').val(0);
            var labpricebg = $('#labpricebg' + row + '').val().replace(/,/g, "");
            var qty_bg = $('#qty_bg' + row + '').val().replace(/,/g, "");
            var total = (qty_bg * 1) * (labpricebg * 1);
            $('#labamtbg' + row + '').val(numberWithCommas(total));
            var labamtbg = $('#labamtbg' + row + '').val().replace(/,/g, "");
            var matamtbg = $('#matamtbg' + row + '').val().replace(/,/g, "");
            var ans = (labamtbg * 1) + (matamtbg * 1);
            $('#labamtbg' + row + '').val(numberWithCommas(total));
            $('#totalamt' + row + '').val(numberWithCommas(ans));
        });
        $('#subpricebg' + row + '').keyup(function() {
            $('#totalamt' + row + '').val(0);
            var subpricebg = $('#subpricebg' + row + '').val().replace(/,/g, "");
            var qty_bg = $('#qty_bg' + row + '').val().replace(/,/g, "");
            var total = (qty_bg * 1) * (subpricebg * 1);
            $('#subamtbg' + row + '').val(numberWithCommas(total));
            var labamtbg = $('#labamtbg' + row + '').val().replace(/,/g, "");
            var matamtbg = $('#matamtbg' + row + '').val().replace(/,/g, "");
            var subamtbg = $('#subamtbg' + row + '').val().replace(/,/g, "");
            var ans = (labamtbg * 1) + (matamtbg * 1) + (subamtbg * 1);
            $('#subamtbg' + row + '').val(numberWithCommas(total));
            $('#totalamt' + row + '').val(numberWithCommas(ans));
        });
        $('#qtyboq' + row + '').keyup(function() {
            var qtyboq = $('#qtyboq' + row + '').val().replace(/,/g, "");
            var matpriceboq = $('#matpriceboq' + row + '').val().replace(/,/g, "");
            var total = (qtyboq * 1) * (matpriceboq * 1);
            $('#matamtboq' + row + '').val(numberWithCommas(total));
            $('#totalamtboq' + row + '').val(numberWithCommas(total));
        });
        $('#matpriceboq' + row + '').keyup(function() {
            var qtyboq = $('#qtyboq' + row + '').val().replace(/,/g, "");
            var matpriceboq = $('#matpriceboq' + row + '').val().replace(/,/g, "");
            var total = (qtyboq * 1) * (matpriceboq * 1);
            $('#matamtboq' + row + '').val(numberWithCommas(total));
            $('#totalamtboq' + row + '').val(numberWithCommas(total));
        });
        $('#labpriceboq' + row + '').keyup(function() {
            $('#totalamtboq' + row + '').val(0);
            var labpriceboq = $('#labpriceboq' + row + '').val().replace(/,/g, "");
            var qtyboq = $('#qtyboq' + row + '').val().replace(/,/g, "");
            var total = qtyboq * labpriceboq;
            $('#labamtboq' + row + '').val(total);
            var labamtboq = $('#labamtboq' + row + '').val().replace(/,/g, "");
            var matamtboq = $('#matamtboq' + row + '').val().replace(/,/g, "");
            var ans = (labamtboq * 1) + (matamtboq * 1);
            $('#labamtboq' + row + '').val(numberWithCommas(total));
            $('#totalamtboq' + row + '').val(numberWithCommas(ans));
        });

        $('#subpriceboq' + row + '').keyup(function() {
            $('#totalamtboq' + row + '').val(0);
            var subpriceboq = $('#subpriceboq' + row + '').val().replace(/,/g, "");
            var qtyboq = $('#qtyboq' + row + '').val().replace(/,/g, "");
            var total = qtyboq * subpriceboq;
            $('#subamtboq' + row + '').val(total);
            var labamtboq = $('#labamtboq' + row + '').val().replace(/,/g, "");
            var matamtboq = $('#matamtboq' + row + '').val().replace(/,/g, "");
            var subamtboq = $('#subamtboq' + row + '').val().replace(/,/g, "");
            var ans = (labamtboq * 1) + (matamtboq * 1) + (subamtboq * 1);
            $('#subamtboq' + row + '').val(numberWithCommas(total));
            $('#totalamtboq' + row + '').val(numberWithCommas(ans));
        });



        $(document).on('click', 'a#remove' + row + '', function() { // <-- changes
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
        var boq1 = '<div id="opnewmat' + row + '" class="modal fade">' +
            '<div class="modal-dialog modal-full">' +
            '<div class="modal-content ">' +
            '<div class="modal-header bg-info">' +
            '<button type="button" class="close" data-dismiss="modal">&times;</button>' +
            '<h5 class="modal-title">เพิ่มรายการ</h5>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div class="row" id="modal_mat' + row + '">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        $('#editrow1').append(boq1);
        $(".openun" + row + "").click(function() {
            $('#modal_mat' + row + '').html(
                "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
            $("#modal_mat" + row + "").load('<?php echo base_url(); ?>index.php/bd/material_alonee/' + row + '');
        });
        var boq4 = '<div id="opnewmattt' + row + '" class="modal fade">' +
            '<div class="modal-dialog modal-full">' +
            '<div class="modal-content ">' +
            '<div class="modal-header bg-info">' +
            '<button type="button" class="close" data-dismiss="modal">&times;</button>' +
            '<h5 class="modal-title">เพิ่มรายการ</h5>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div class="row" id="modal_matt' + row + '">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        $('#editrow4').append(boq4);
        $(".poo" + row + "").click(function() {
            $('#modal_matt' + row + '').html(
                "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
            $("#modal_matt" + row + "").load('<?php echo base_url(); ?>index.php/share/getmatcode/' + row);
        });
        var unit = '<div id="unit' + row + '" class="modal fade">' +
            '<div class="modal-dialog">' +
            '<div class="modal-content ">' +
            '<div class="modal-header bg-info">' +
            '<button type="button" class="close" data-dismiss="modal">&times;</button>' +
            '<h5 class="modal-title">หน่วย</h5>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div class="row" id="modal_unit' + row + '">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        $('#editrow8').append(unit);
        $('.unit' + row + '').click(function() {
            $('#modal_unit' + row + '').html(
                "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
            $("#modal_unit" + row + "").load('<?php echo base_url(); ?>share/unit/' + row + '');
        });
    }
</script>
