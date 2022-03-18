<div class="content-wrapper">
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title"> BILL OF QUATITY</h5>
                <div class="heading-elements">
                    <!-- <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul> -->
                </div>
            </div>

            <div class="panel-body">
                <div class="form-group">
                    <a href="<?php echo base_url();?>bd/boq_main/<?=$tencode;?>/<?=$projectid;?>/0/20/p" type="button" class="btn btn-default preload">Back</a>
                    <button type="button" data-toggle="modal" data-target="#modal_h1" class="btn btn-info" id="load"> Import</button>
                    <!-- <button type="button" class="btn btn-success preload" id="save"> Save</button> -->
                    <button type="button" class="btn btn-default" id="copyboqq" data-toggle="modal" data-target="#copy">Copy BOQ</button>
                    <button type="button" class="btn btn-default" id="abomq" data-toggle="modal" data-target="#abom">Add BOM</button>
                   <div class="pull-right">

                        <button type="button" class="btn bg-success btn-xs heading-btn" data-toggle="modal" data-target="#modalapprpve" id="xsendapprove">
                            <i class="icon-paperplane position-left"></i> Send Approve
                        </button>
                    </div>
                </div>
                <pre id="example1console" class="console"> Auto"Load" to load data from server</pre>
                <div class="hot-container_custom has-scroll">
                    <div id="example6grid" class="dataTable"></div>
                </div>
            </div>
        </div>

    </div>
</div>
<div id="modal_h1" class="modal fade" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="modal-title">BOQ Import</h1>
            </div>

            <div class="modal-body">
                <?php $this->load->helper('form'); ?>
                <?php echo form_open_multipart('import_boq/do_upload/'.$tencode.'/'.$projectid);?>
                <h6 class="text-semibold">Upload File BOQ</h6>
                    <div class="row">
                        <div class="form-group">
                            <input type="file" class="file-styled" id="file_upload" name="userfile">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <button type="submit" class="uploadfile btn btn-primary btn-sm">Upload</button>
                        </div>
                    </div>
                <?php echo form_close();?>
                <hr>
                <div id="loadwindow"></div>
            </div>
                    
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="modalapprpve" class="modal fade" data-backdrop="false">
    <div class="modal-dialog">
    <form id="headingpost" method="post" action="<?php echo base_url();?>bd_active/save_heading_boq/<?=$tencode;?>">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Send Approve</h3>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control input-sm" name="heading" id="heading">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Remark</label>
                            <textarea class="form-control" name="remark" id="remark" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>
                    
            <div class="modal-footer">
                <button type="button" class="btn btn-success preload" id="sendapprove" data-dismiss="modal">Send</button>
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </form>
    </div>
</div>
<div id="copy" class="modal fade" data-backdrop="false">
    <div class="modal-dialog">
    <form id="headingpost" method="post" action="<?php echo base_url();?>bd_active/save_heading_boq/<?=$tencode;?>">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Copy BOQ Form</h3>
            </div>

            <div class="modal-body">
                <div id="copyboq"></div>
            </div>
                    
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </form>
    </div>
</div>
<div id="abom" class="modal fade" data-backdrop="false">
    <div class="modal-dialog">
    <form id="headingpost" method="post" action="<?php echo base_url();?>>">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Add BOM</h3>
            </div>

            <div class="modal-body">
                <div id="load_bom"></div>
            </div>
                    
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </form>
    </div>
</div>
<script>
    $('#copyboqq').click(function(event) {
        $('#copyboq').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $('#copyboq').load('<?php echo base_url(); ?>bd/load_boq/<?=$tencode;?>/<?=$projectid;?>');
    });
    $("#abomq").click(function(){
        var num = 0;
        $('#load_bom').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#load_bom").load('<?=base_url()?>bd/show_all_bom/<?php echo $tencode; ?>/<?=$projectid;?>' + num);
    });
</script>

<script>
    var first = true;
    function hexRenderer(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.TextCell.renderer.apply(this, arguments);
    }
    $("#example6grid").handsontable({
        data: loaddata(),
        startRows: 8,
        startCols: 11,
        rowHeaders: true,
        colHeaders: true,
        //   fixedColumnsLeft: 5,
        //   minSpareCols: 20,
        formulas: true,
        // minSpareRows: 20,
        colWidths: [200, 300, 300, 300, 300, 150, 100, 100, 200, 200, 200, 200, 200, 200],
        colHeaders: ['Job (A)', 'Cost Code Material (B)','Cost Code Labor (C)', 'Material (D)', 'Material Labor (E)', 'Unit (F)', 'QTY (G)','MAT. Price (H)','MAT. Amount (I)','LAB. Price (J)','LAB. Amount (K)','SUB. Price (L)','SUB. Amount (M)','Total (N)'],
        contextMenu: ['row_above', 'row_below', '---------', 'remove_row', 'remove_col', '---------', 'freeze_column'],
        columns: [
                {
                    data: 'boq_job', // 1nd column is simple text, no special options here
                    type: 'autocomplete',
                    source: function (query, process) {
                    $.ajax({
                    //url: 'php/cars.php', // commented out because our website is hosted as a set of static pages
                    url: '<?php echo base_url();?>datastore/jsonsystem',
                    dataType: 'json',
                    data: {
                        query: query
                    },
                        success: function (response) {
                            console.log("response", response);
                            //process(JSON.parse(response.data)); // JSON.parse takes string as a argument
                            process(response.data);

                        }
                    });
                },
                strict: true
            },
            {
                data: 'subcostcodename',
                type: 'autocomplete',
                source: function (query, process) {
                    $.ajax({
                    //url: 'php/cars.php', // commented out because our website is hosted as a set of static pages
                    url: '<?php echo base_url();?>datastore/jsoncostcode',
                    dataType: 'json',
                    data: {
                        query: query
                    },
                        success: function (response) {
                            console.log("response", response);
                            //process(JSON.parse(response.data)); // JSON.parse takes string as a argument
                            process(response.data);

                        }
                    });
                },
                strict: true
            },
            {
                data: 'subcostnamelabor',
                type: 'autocomplete',
                source: function (query, process) {
                    $.ajax({
                    //url: 'php/cars.php', // commented out because our website is hosted as a set of static pages
                    url: '<?php echo base_url();?>datastore/jsoncostcode',
                    dataType: 'json',
                    data: {
                        query: query
                    },
                        success: function (response) {
                            console.log("response", response);
                            //process(JSON.parse(response.data)); // JSON.parse takes string as a argument
                            process(response.data);

                        }
                    });
                },
                strict: true
            },
            {
                data: 'newmatnamee',
                type: 'autocomplete',
                source: function (query, process) {
                    $.ajax({
                    //url: 'php/cars.php', // commented out because our website is hosted as a set of static pages
                    url: '<?php echo base_url();?>datastore/matjson',
                    dataType: 'json',
                    data: {
                        query: query
                    },
                        success: function (response) {
                            console.log("response", response);
                            //process(JSON.parse(response.data)); // JSON.parse takes string as a argument
                            process(response.data);

                        }
                    });
                },
                strict: true
            },
            {
                data: 'matnamelabor',
                type: 'autocomplete',
                source: function (query, process) {
                    $.ajax({
                    //url: 'php/cars.php', // commented out because our website is hosted as a set of static pages
                    url: '<?php echo base_url();?>datastore/matjson',
                    dataType: 'json',
                    data: {
                        query: query
                    },
                        success: function (response) {
                            console.log("response", response);
                            //process(JSON.parse(response.data)); // JSON.parse takes string as a argument
                            process(response.data);

                        }
                    });
                },
                strict: true
            },
            {
                data: 'unitname',
                type: 'autocomplete',
                source: function (query, process) {
                    $.ajax({
                    //url: 'php/cars.php', // commented out because our website is hosted as a set of static pages
                    url: '<?php echo base_url();?>datastore/unitjson',
                    dataType: 'json',
                    data: {
                        query: query
                    },
                        success: function (response) {
                            console.log("response", response);
                            //process(JSON.parse(response.data)); // JSON.parse takes string as a argument
                            process(response.data);

                        }
                    });
                },
                strict: true
            },
            {
                data: 'qty_bg',
                type: 'numeric',
                numericFormat: {
                    pattern: '0,0.00',
                    culture: 'en-US' // this is the default culture, set up for USD
                },
            },
            {
                data: 'matpricebg',
                type: 'numeric',
                numericFormat: {
                    pattern: '0,0.00',
                    culture: 'en-US' // this is the default culture, set up for USD
                },
            },
            {
                data: 'matamtbg',
                type: 'numeric',
                numericFormat: {
                    pattern: '0,0.00',
                    culture: 'en-US' // this is the default culture, set up for USD
                },
                readOnly: true,
               
            },
            {
                data: 'labpricebg',
                type: 'numeric',
                numericFormat: {
                    pattern: '0,0.00',
                    culture: 'en-US' // this is the default culture, set up for USD
                },
            },
            {
                data: 'labamtbg',
                type: 'numeric',
                numericFormat: {
                    pattern: '0,0.00',
                    culture: 'en-US' // this is the default culture, set up for USD
                },
                readOnly: true,
            },
            {
                data: 'subpricebg',
                type: 'numeric',
                numericFormat: {
                    pattern: '0,0.00',
                    culture: 'en-US' // this is the default culture, set up for USD
                },
            },
            {
                data: 'subamtbg',
                type: 'numeric',
                numericFormat: {
                    pattern: '0,0.00',
                    culture: 'en-US' // this is the default culture, set up for USD
                },
                readOnly: true,
            },
            {
                data: 'totalamt',
                type: 'numeric',
                numericFormat: {
                    pattern: '0,0.00',
                    culture: 'en-US' // this is the default culture, set up for USD
                },
                readOnly: true,
            }
        ]
        
    });
    function loaddata(){

        $.ajax({ //loads data to Handsontable
        url: '<?php echo base_url();?>boq<?php echo $tencode;?>.json',
        // url: '<?php echo base_url();?>bd/getdata/<?php echo $tencode;?>',
        dataType: 'json',
        type: 'GET',
        success: function(res){
            $("#example6grid").handsontable("loadData", res.data);
        }
        });
    }
    var $container = $("#hot_populate");
    var $console = $("#example1console");
    var handsontable = $container.data('handsontable');
    $("#save").click(function () {
        $("#save").prop('disabled',true);
        $.ajax({
            url: "<?php echo base_url();?>bd/savejson/<?php echo $tencode;?>",
            data: {"data": $("#example6grid").handsontable('getData')}, //returns all cells' data
            dataType: 'json',
            type: 'POST',
            success: function (res) {
            if (res.result === 'ok') {
                $console.text('Data saved');
                swal({
                    title: "บันทึกสำเร็จ",
                    text: "Save Completed!!.",
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                });
                $("#save").prop('disabled',false);
            }else{
                $console.text('Save error');
                swal({
                    title: "บันทึกไม่สำเร็จ",
                    text: "Save Error!!.",
                    // confirmButtonColor: "#66BB6A",
                    type: "danger"
                });
            }
            },
            error: function (res) {
                $console.text(res);
                if (res) {
                    swal({
                        title: "บันทึกสำเร็จ",
                        text: "Save Completed!!.",
                        // confirmButtonColor: "#66BB6A",
                        type: "success"
                    });
                    $("#save").prop('disabled',false);
                }
            }
        });
    });
    $("#sendapprove").click(function () {
        $("#save").prop('disabled',true);
        $("#sendapprove").prop('disabled',true);
        var heading = $("#heading").val();
        var remark = $("#remark").val();
        // $("#headingpost").submit();
        $.ajax({
            url: "<?php echo base_url();?>bd/saveapprovejson/<?php echo $tencode;?>",
            data: {"data": $("#example6grid").handsontable('getData'),"title": ""+heading+"","remark":""+remark+""}, //returns all cells' data
            dataType: 'json',
            type: 'POST',
            success: function (res) {
            if (res.result === 'ok') {
                
                $console.text('Data saved');
                swal({
                    title: "บันทึกสำเร็จ",
                    text: "Save Completed!!.",
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                });
                $("#save").prop('disabled',false);
                loaddata();
               
                window.location.href="<?php echo base_url();?>bd/addnewboq/<?php echo $tencode;?>/<?=$projectid;?>/p";
            }else{
                $console.text('Save error');
                swal({
                    title: "บันทึกไม่สำเร็จ",
                    text: "Save Error!!.",
                    // confirmButtonColor: "#66BB6A",
                    type: "danger"
                });
            }
            },
            error: function (res) {
                $console.text(res);
                if (res) {
                    swal({
                        title: "บันทึกสำเร็จ",
                        text: "Save Completed!!.",
                        // confirmButtonColor: "#66BB6A",
                        type: "success"
                    });
                    $("#save").prop('disabled',false);
                    loaddata();
                    window.location.href="<?php echo base_url();?>bd/addnewboq/<?php echo $tencode;?>/<?=$projectid;?>/p";
                }
            }
        });
        loaddata();
    });

    $(".uploadfile").click(function(){
        $("#loadwindow").html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
    });
</script>