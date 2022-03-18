<style>
    .tablew {
        width: 150%;
        max-width: 500%;
    }
    .containBody{
        height:300px;
        display:block;
        overflow:auto;  
        border-bottom:1px solid #CCC;
    }
    .tbl_headerFix{
        border-bottom:0px;  
    }
</style>
<?php echo $heading;?>
<br>
<?php echo $ref_bd;?>
<form id="savepost" action="<?php echo base_url();?>bd_active/save_revise_new/<?php echo $tdcode;?>/<?php echo $heading;?>" method="post">
    <div class="table-responsive">
        <table class="tablew table table-bordered table-striped text-size-little table-xs">
            <thead>
                <tr>
                    <th class="bg-slate-300" rowspan="2">No.</th>
                    <th class="bg-slate-300" rowspan="2">Job Code</th>
                    <th class="bg-slate-300" rowspan="2">Job Name</th>
                    <th class="bg-slate-300" rowspan="2">Material Code</th>
                    <th class="bg-slate-300" rowspan="2">Material Name</th>
                    <th class="bg-slate-300" rowspan="2">Cost Code</th>
                    <th class="bg-slate-300" rowspan="2">Cost Name</th>
                    <th class="bg-slate-300" rowspan="2">Qty</th>
                    <th class="bg-slate-300 text-center" colspan="7">Budget</th>
                </tr>
                <tr>
                    <th class="bg-info-300">Material Price</th>
                    <th class="bg-info-300">Material Amt.</th>
                    <th class="bg-orange-300">Labor Price</th>
                    <th class="bg-orange-300">Labor Amt.</th>
                    <th class="bg-indigo-300">Subcontact Price</th>
                    <th class="bg-indigo-300">Subcontact Amt.</th>
                    <th class="bg-primary-300">Total Amt.</th>
                </tr>
            </thead>
            <tbody id="tdrows">
            <?php $n=1; $summatbg=0; $sumlabbg=0; $sumsubbg=0; $sumrowtotol=0; foreach ($res as $key => $v) {
                $boqbd = $v->boq_bd;    
                $boqjob = $v->boq_job;    
                $unitcode = $v->unitcode;    
                $unitname = $v->unitname;    
                $qtyboq = $v->qtyboq;    
                $boqcode = $v->boqcode;    
                $matboq = $v->matboq;
                $matcodelabor = $v->matcodelabor; 
                $matnamelabor = $v->matnamelabor;
                $projectcode = $v->project_code;
            ?>
                <tr id="<?php echo $n;?>">
                    <td><?php echo $n;?></td>
                    <td><?php echo $v->boq_job;?></td>
                    <td><?php echo $v->systemname;?></td>
                    <td><?php echo $v->newmatcode;?></td>
                    <td><?php echo $v->newmatnamee;?></td>
                    <td><?php echo $v->subcostcode;?></td>
                    <td><?php echo $v->subcostcodename;?></td>
                    <td class="bg-slate-300"><input type="text" class="form-control input-xs text-right" name="qty_bg[]" id="qty_bg<?php echo $v->boq_id;?>" value="<?php echo number_format($v->qty_bg,2);?>" onchange="format(this)" onblur="if(this.value.indexOf('.')==-1)this.value=this.value+'.00'"></td>
                    <td class="bg-info-300"><input type="text" class="form-control input-xs text-right" name="matpricebg[]" id="matpricebg<?php echo $v->boq_id;?>" value="<?php echo number_format($v->matpricebg,2);?>" onchange="format(this)" onblur="if(this.value.indexOf('.')==-1)this.value=this.value+'.00'"></td>
                    <td class="bg-info-300"><input type="text" class="form-control input-xs text-right summatbg" readonly="true" name="matamtbg[]" id="matamtbg<?php echo $v->boq_id;?>" value="<?php echo number_format($v->matamtbg,2);?>" onchange="format(this)" onblur="if(this.value.indexOf('.')==-1)this.value=this.value+'.00'"></td>
                    <td class="bg-orange-300"><input type="text" class="form-control input-xs text-right" name="labpricebg[]" id="labpricebg<?php echo $v->boq_id;?>" value="<?php echo number_format($v->labpricebg,2);?>" onchange="format(this)" onblur="if(this.value.indexOf('.')==-1)this.value=this.value+'.00'"></td>
                    <td class="bg-orange-300"><input type="text" class="form-control input-xs text-right sumlabbg" name="labamtbg[]" id="labamtbg<?php echo $v->boq_id;?>" value="<?php echo number_format($v->labamtbg,2);?>" onchange="format(this)" onblur="if(this.value.indexOf('.')==-1)this.value=this.value+'.00'"></td>
                    <td class="bg-indigo-300"><input type="text" class="form-control input-xs text-right" name="subpricebg[]" id="subpricebg<?php echo $v->boq_id;?>" value="<?php echo number_format($v->subpricebg,2);?>" onchange="format(this)" onblur="if(this.value.indexOf('.')==-1)this.value=this.value+'.00'"></td>
                    <td class="bg-indigo-300"><input type="text" class="form-control input-xs text-right sumsubbg" name="subamtbg[]" id="subamtbg<?php echo $v->boq_id;?>" value="<?php echo number_format($v->subamtbg,2);?>" onchange="format(this)" onblur="if(this.value.indexOf('.')==-1)this.value=this.value+'.00'"></td>
                    <td class="bg-primary-300"><input type="text" class="form-control input-xs text-right sumtotalbg" name="totalamt[]" id="totalamt<?php echo $v->boq_id;?>" value="<?php echo number_format($v->totalamt,2);?>" onchange="format(this)" onblur="if(this.value.indexOf('.')==-1)this.value=this.value+'.00'"></td>
                    <input type="hidden" name="boqid[]" value="<?php echo $v->boq_id;?>">
                    <input type="hidden" name="boqbd[]" value="<?php echo $v->boq_bd;?>">
                    <input type="hidden" name="boqjob[]" value="<?php echo $v->boq_job;?>">
                    <input type="hidden" name="costcode[]" value="<?php echo $v->subcostcode;?>">
                    <input type="hidden" name="costname[]" value="<?php echo $v->subcostcodename;?>">
                    <input type="hidden" name="costcodelabor[]" value="<?php echo $v->subcostcodelabor;?>">
                    <input type="hidden" name="costnamelabor[]" value="<?php echo $v->subcostnamelabor;?>">
                    <input type="hidden" name="matcode[]" value="<?php echo $v->newmatcode;?>">
                    <input type="hidden" name="matname[]" value="<?php echo $v->newmatnamee;?>">
                    <input type="hidden" name="boqcode[]" value="<?php echo $v->boqcode;?>">
                    <input type="hidden" name="matboq[]" value="<?php echo $v->matboq;?>">
                    <input type="hidden" name="unitcode[]" value="<?php echo $v->unitcode;?>">
                    <input type="hidden" name="unitname[]" value="<?php echo $v->unitname;?>">
                    <input type="hidden" name="qty_boq[]" value="<?php echo $v->qtyboq;?>">
                    <input type="hidden" name="matlaborcode[]" value="<?php echo $v->matcodelabor;?>">
                    <input type="hidden" name="matlaborname[]" value="<?php echo $v->matnamelabor;?>">
                    <input type="hidden" name="projectcode[]" value="<?php echo $v->project_code;?>">

                </tr>
                <script>
                    $("#qty_bg<?php echo $v->boq_id;?>").on("keyup",function(e){
                        var qty = parseFloat($("#qty_bg<?php echo $v->boq_id;?>").val().replace(/,/g, ""));
                        var matpricebg = parseFloat($("#matpricebg<?php echo $v->boq_id;?>").val().replace(/,/g, ""));
                        var labpricebg = parseFloat($("#labpricebg<?php echo $v->boq_id;?>").val().replace(/,/g, ""));
                        var subpricebg = parseFloat($("#subpricebg<?php echo $v->boq_id;?>").val().replace(/,/g, ""));
                        
                        if (!isNaN(qty)){
                            var sum  = qty*matpricebg;
                            var sumlab = qty*labpricebg;
                            var sumsub = qty*subpricebg;
                            var sumrowtotol = sum+sumlab+sumsub;
                        }else{
                            var sum  = 0;
                            var sumlab  = 0;
                            var sumsub  = 0;
                            var sumrowtotol  = 0;
                        }
                        $("#matamtbg<?php echo $v->boq_id;?>").val(numberWithCommas(sum.toFixed(2)));
                        $("#labamtbg<?php echo $v->boq_id;?>").val(numberWithCommas(sumlab.toFixed(2)));
                        $("#subamtbg<?php echo $v->boq_id;?>").val(numberWithCommas(sumsub.toFixed(2)));
                        $("#totalamt<?php echo $v->boq_id;?>").val(numberWithCommas(sumrowtotol.toFixed(2)));
                        calculatemat();
                        calculatelab();
                        calculatesub();
                        calculatetotal();
                    });
                    $("#matpricebg<?php echo $v->boq_id;?>").on("keyup",function(e){
                        var qty = parseFloat($("#qty_bg<?php echo $v->boq_id;?>").val().replace(/,/g, ""));
                        var matpricebg = parseFloat($("#matpricebg<?php echo $v->boq_id;?>").val().replace(/,/g, ""));
                        var labpricebg = parseFloat($("#labpricebg<?php echo $v->boq_id;?>").val().replace(/,/g, ""));
                        var subpricebg = parseFloat($("#subpricebg<?php echo $v->boq_id;?>").val().replace(/,/g, ""));
                        
                        if (!isNaN(matpricebg)){
                            var sum  = qty*matpricebg;
                            var sumlab = qty*labpricebg;
                            var sumsub = qty*subpricebg;
                            var sumrowtotol = sum+sumlab+sumsub;
                        }else{
                            var sum  = 0;
                            var sumlab = qty*labpricebg;
                            var sumsub = qty*subpricebg;
                            var sumrowtotol = sum+sumlab+sumsub;
                        }
                        $("#matamtbg<?php echo $v->boq_id;?>").val(numberWithCommas(sum.toFixed(2)));
                        $("#totalamt<?php echo $v->boq_id;?>").val(numberWithCommas(sumrowtotol.toFixed(2)));
                        calculatemat();
                        calculatetotal();
                        
                    });
                    $("#labpricebg<?php echo $v->boq_id;?>").on("keyup",function(e){
                        var qty = parseFloat($("#qty_bg<?php echo $v->boq_id;?>").val().replace(/,/g, ""));
                        var matpricebg = parseFloat($("#matpricebg<?php echo $v->boq_id;?>").val().replace(/,/g, ""));
                        var labpricebg = parseFloat($("#labpricebg<?php echo $v->boq_id;?>").val().replace(/,/g, ""));
                        var subpricebg = parseFloat($("#subpricebg<?php echo $v->boq_id;?>").val().replace(/,/g, ""));
                        
                        if (!isNaN(labpricebg)){
                            var sum  = qty*matpricebg;
                            var sumlab = qty*labpricebg;
                            var sumsub = qty*subpricebg;
                            var sumrowtotol = sum+sumlab+sumsub;
                        }else{
                            var sum  =  qty*matpricebg;
                            var sumlab = 0;
                            var sumsub = qty*subpricebg;
                            var sumrowtotol = sum+sumlab+sumsub;
                        }
                        $("#labamtbg<?php echo $v->boq_id;?>").val(numberWithCommas(sumlab.toFixed(2)));
                        $("#totalamt<?php echo $v->boq_id;?>").val(numberWithCommas(sumrowtotol.toFixed(2)));
                    
                        calculatelab();
                        calculatetotal();
                
                    });
                    $("#subpricebg<?php echo $v->boq_id;?>").on("keyup",function(e){
                        var qty = parseFloat($("#qty_bg<?php echo $v->boq_id;?>").val().replace(/,/g, ""));
                        var matpricebg = parseFloat($("#matpricebg<?php echo $v->boq_id;?>").val().replace(/,/g, ""));
                        var labpricebg = parseFloat($("#labpricebg<?php echo $v->boq_id;?>").val().replace(/,/g, ""));
                        var subpricebg = parseFloat($("#subpricebg<?php echo $v->boq_id;?>").val().replace(/,/g, ""));
                        
                        if (!isNaN(subpricebg)){
                            var sum  = qty*matpricebg;
                            var sumlab = qty*labpricebg;
                            var sumsub = qty*subpricebg;
                            var sumrowtotol = sum+sumlab+sumsub;
                        }else{
                            var sum  =  qty*matpricebg;
                            var sumlab = qty*labpricebg;
                            var sumsub = 0;
                            var sumrowtotol = sum+sumlab+sumsub;
                        }
                        $("#subamtbg<?php echo $v->boq_id;?>").val(numberWithCommas(sumsub.toFixed(2)));
                        $("#totalamt<?php echo $v->boq_id;?>").val(numberWithCommas(sumrowtotol.toFixed(2)));
                    
                    
                        calculatesub();
                        calculatetotal();
                    });
                    function calculatemat(){
                        var sum = 0;
                        $(".summatbg").each(function() {
                            //add only if the value is number
                            if (!isNaN($(this).val().replace(/,/g, "")) && $(this).val().replace(/,/g, "").length != 0) {
                                sum += parseFloat($(this).val().replace(/,/g, ""));
                                $(this).css("background-color", "#FEFFB0");
                                console.log(sum);
                            }
                        });
                        $("input#sums").val(numberWithCommas(sum.toFixed(2)));
                        $("input#sums").css("background-color", "#FEFFB0");
                    }
                    function calculatelab(){
                        var sumlab = 0;
                        $(".sumlabbg").each(function() {
                            //add only if the value is number
                            if (!isNaN($(this).val().replace(/,/g, "")) && $(this).val().replace(/,/g, "").length != 0) {
                                sumlab += parseFloat($(this).val().replace(/,/g, ""));
                                $(this).css("background-color", "#FEFFB0");
                                console.log(sumlab);
                            }
                        });
                        $("input#sumlab").val(numberWithCommas(sumlab.toFixed(2)));
                        $("input#sumlab").css("background-color", "#FEFFB0");
                    }
                    function calculatesub(){
                        var sumsub = 0;
                        $(".sumsubbg").each(function() {
                            //add only if the value is number
                            if (!isNaN($(this).val().replace(/,/g, "")) && $(this).val().replace(/,/g, "").length != 0) {
                                sumsub += parseFloat($(this).val().replace(/,/g, ""));
                                $(this).css("background-color", "#FEFFB0");
                                console.log(sumsub);
                            }
                        });
                        $("input#sumsub").val(numberWithCommas(sumsub.toFixed(2)));
                        $("input#sumsub").css("background-color", "#FEFFB0");
                    }
                    function calculatetotal(){
                        var sumrowtotol = 0;
                        $(".sumtotalbg").each(function() {
                            //add only if the value is number
                            if (!isNaN($(this).val().replace(/,/g, "")) && $(this).val().replace(/,/g, "").length != 0) {
                                sumrowtotol += parseFloat($(this).val().replace(/,/g, ""));
                                $(this).css("background-color", "#FEFFB0");
                                console.log(sumrowtotol);
                            }
                        });
                        $("input#sumrowtotol").val(numberWithCommas(sumrowtotol.toFixed(2)));
                        $("input#sumrowtotol").css("background-color", "#FEFFB0");
                    }
                </script>
            <?php $n++; $summatbg = $summatbg+$v->matamtbg; $sumlabbg = $sumlabbg+$v->labamtbg; $sumsubbg = $sumsubbg+$v->subamtbg; $sumrowtotol = $sumrowtotol+$v->totalamt; } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td class="bg-slate-300" colspan="7"></td>
                    <td class="bg-info-300"><input class="form-control input-xs text-right" type="text" readonly="true" id="sums" name="" value="<?php echo  number_format($summatbg,2);?>"></td>
                    <td class="bg-slate-300"></td>
                    <td class="bg-orange-300"><input class="form-control input-xs text-right" type="text" readonly="true" id="sumlab" name="" value="<?php echo  number_format($sumlabbg,2);?>"></td>
                    <td class="bg-slate-300"></td>
                    <td class="bg-indigo-300"><input class="form-control input-xs text-right" type="text" readonly="true" id="sumsub" name="" value="<?php echo  number_format($sumsubbg,2);?>"></td>
                    <td class="bg-primary-300"><input class="form-control input-xs text-right" type="text" readonly="true" id="sumrowtotol" name="" value="<?php echo  number_format($sumrowtotol,2);?>"></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="text-right">
        <!-- <button type="button" data-toggle="modal" data-target="#addrows" class="btn btn-success"> Add Rows </button> -->
        <button type="button" onClick="addrow()" class="btn btn-success"> Add Rows </button>
        <button type="button" data-toggle="modal" data-target="#sendapprovemodal" class="sendapprovemodal btn btn-success"><i class="icon-paperplane position-left"></i> Send Approve </button>
        <button type="button" id="save" class="btn btn-success"><i class="icon-floppy-disk"></i> Save </button>
    </div>
</form>
  <!-- Full width modal -->
<div id="addrows" class="modal fade" data-backdrop="false">
    <div class="modal-dialog modal-lg">
    <form id="headingpost" method="post" action="<?php echo base_url();?>bd_active/save_heading_boq/<?=$tdcode;?>">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Add BOQ</h3>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control input-sm" name="" id="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Remark</label>
                            <textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>
                    
            <div class="modal-footer">
                <button type="button" class="btn btn-success preload" id="" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </form>
    </div>
</div>
  <!-- /full width modal -->
  <!-- Full width modal -->
<div id="sendapprovemodal" class="modal fade" data-backdrop="false">
    <div class="modal-dialog modal-lg">
    <form id="headingpost" method="post" action="<?php echo base_url();?>bd_active/save_heading_boq/<?=$tdcode;?>">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Send Approve</h3>
            </div>

            <div class="modal-body">
            <pre id="example1console" class="console"> Auto"Load" to load data from server</pre>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="hidden" class="form-control input-sm" name="revises" id="revises">
                            <input type="text" class="form-control input-sm" name="heading" id="heading">
                            <input type="hidden" class="form-control input-sm" name="ref_revise" id="ref_revise">
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
                <button type="button" class="btn btn-success preload" id="sendapprove">Send</button>
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </form>
    </div>
</div>
  <!-- /full width modal -->
<div class="cost"></div>
<div class="mat"></div>
<div class="job"></div>
<script>
    $(".sendapprovemodal").hide();
    $.extend( $.fn.dataTable.defaults, {
        columnDefs: [{ 
            orderable: false,
            width: '100px',
            targets: [ 5 ]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        }
    });
  // Initialize
  var table = $('.datatable-fixed-complex').DataTable({
        autoWidth: true,
        // dom:"Bfrtip",
        columnDefs: [
            { 
                orderable: false,
                targets: [5]
            },
            { 
                width: "100px",
                targets: [1,3]
            },
            { 
                width: "300px",
                targets: [2,4]
            },
            { 
                width: "200px",
                targets: [5, 6]
            }
        ],
        scrollY: '350px',
        scrollX: true,
        scrollCollapse: true,
        paging: false,
        // buttons:[ 'colvis' ],
        fixedColumns: {
            leftColumns: 3
        }
    });
</script>
<script>
    $("#save").on('click',function(){
        $("#save").prop('disabled', true);
        var frm = $('#savepost');
        frm.submit(function (ev) {
            $.ajax({
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: frm.serialize(),
                success: function (data) {
                    console.log($.trim(data));
                    $("#revises").val($.trim(data)-1);
                    $("#ref_revise").val('<?php echo $ref_bd;?>');
                    var val  = $.trim(data)-1;
                    swal({
                        title: "Revise "+val,
                        text: "Save Completed!!.",
                        // confirmButtonColor: "#66BB6A",
                        // type: "success"
                    });
            }
        });
            ev.preventDefault();
		});
        $("#save").submit(); //Submit  the FORM
        $(".sendapprovemodal").show();
    });
</script>
<script>
 var $console = $("#example1console");
    $("#sendapprove").click(function () {
        $("#save").prop('disabled',true);
        $("#sendapprove").prop('disabled',true);
        var heading = $("#heading").val();
        var remark = $("#remark").val();
        var revises = $("#revises").val();
        var ref_revise = $("#ref_revise").val();
        $.ajax({
            url: "<?php echo base_url();?>bd_active/saveapprovejson/<?php echo $tdcode;?>/",
            data: {"title": ""+heading+"","remark":""+remark+"","revises":""+revises+"","ref_revise":""+ref_revise+""}, //returns all cells' data
            dataType: 'json',
            type: 'POST',
            success: function (res) {
                $console.text(res);
            if (res.result === 'ok') {
                
                $console.text('Data saved');
                swal({
                    title: "บันทึกสำเร็จ",
                    text: "Save Completed!!.",
                    // confirmButtonColor: "#66BB6A",
                    // type: "success"
                });
                $("#save").prop('disabled',false);
                window.location.href="<?php echo base_url();?>management/revise_boq/<?php echo $tdcode;?>/p";
               
            }else{
                $console.text('Save error');
                swal({
                    title: "บันทึกไม่สำเร็จ",
                    text: "Save Error!!.",
                    // confirmButtonColor: "#66BB6A",
                    // type: "danger"
                });
            }
            },
            error: function (res) {
                $console.text(res);
                // if (res) {
                //     swal({
                //         title: "บันทึกสำเร็จ",
                //         text: "Save Completed!!.",
                //         // confirmButtonColor: "#66BB6A",
                //         type: "success"
                //     });
                //     $("#save").prop('disabled',false);
                   
                // }
            }
        });
    });
</script>
<script>
    // $("#addrows").on('click',function(){
    //     addrow();
    // });

    function addrow(){
        var row = ($('#tdrows tr').length) - 0 + 1;
        var tr = '<tr id="' + row + '">' +
                '<td class="text-center">' + row +'</td>' +

                '<td><div class="input-group"><input type="text" name="boqjob[]" id="jobcodei' + row +
                '" class="form-control input-xs" readonly="true"><span class="input-group-btn"><button type="button" data-toggle="modal" data-target="#jobcode' +
                row + '" class="jobcode' + row +
                ' btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button></span></div></td>' +
                '<td><input type="text" id="jobname'+ row +'" class="form-control input-xs" readonly="true" value="Y"></td>'+

                '<td><div class="input-group"><input type="text" name="matcode[]" id="matcodei' + row +
                '" class="form-control input-xs" readonly="true"><span class="input-group-btn"><button type="button" data-toggle="modal" data-target="#matcode' +
                row + '" class="matcode' + row +
                ' btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button></span></div></td>' +
                '<td><input type="text" name="matname[]" id="matname'+ row +'" class="form-control input-xs" readonly="true" value="Y"></td>'+

                '<td><div class="input-group"><input type="text" name="costcode[]" id="costcodei' + row +
                '" class="form-control input-xs" readonly="true"><span class="input-group-btn"><button type="button" data-toggle="modal" data-target="#costcode' +
                row + '" class="costcode' + row +
                ' btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button></span></div></td>' +

                '<td><input type="text" name="costname[]" id="costname'+ row +'" class="form-control input-xs" readonly="true" value="Y"></td>'+
                
                '<td class="bg-slate-300"><input type="text" name="qty_bg[]" id="qty_bg'+row+'" class="input-xs txt form-control" onchange="format(this)" onblur="if(this.value.indexOf(".")==-1)this.value=this.value+".00" style="text-align:right;" value="0.00"></td>' +
                '<td class="bg-info-300"><input type="text" name="matpricebg[]" id="matpricebg'+row+'" class="input-xs txt form-control" onchange="format(this)" onblur="if(this.value.indexOf(".")==-1)this.value=this.value+".00" style="text-align:right;" value="0.00"></td>' +
                '<td class="bg-info-300"><input type="text" name="matamtbg[]" id="matamtbg'+row+'" class="summatbg input-xs txt form-control" onchange="format(this)" onblur="if(this.value.indexOf(".")==-1)this.value=this.value+".00" style="text-align:right;" value="0.00" readonly="true"></td>' +
                '<td class="bg-orange-300"><input type="text" name="labpricebg[]" id="labpricebg'+row+'" class="input-xs txt form-control" onchange="format(this)" onblur="if(this.value.indexOf(".")==-1)this.value=this.value+".00" style="text-align:right;" value="0.00"></td>' +
                '<td class="bg-orange-300"><input type="text" name="labamtbg[]" id="labamtbg'+row+'" class="sumlabbg input-xs txt form-control" onchange="format(this)" onblur="if(this.value.indexOf(".")==-1)this.value=this.value+".00" style="text-align:right;" value="0.00" readonly="true"></td>' +
                '<td class="bg-indigo-300"><input type="text" name="subpricebg[]" id="subpricebg'+row+'" class="input-xs txt form-control" onchange="format(this)" onblur="if(this.value.indexOf(".")==-1)this.value=this.value+".00" style="text-align:right;" value="0.00"></td>' +
                '<td class="bg-indigo-300"><input type="text" name="subamtbg[]" id="subamtbg'+row+'" class="sumsubbg input-xs txt form-control" onchange="format(this)" onblur="if(this.value.indexOf(".")==-1)this.value=this.value+".00" style="text-align:right;" value="0.00" readonly="true"></td>' +
                '<td class="bg-primary-300"><input type="text" name="totalamt[]" id="totalamt'+row+'" class="sumtotalbg input-xs txt form-control" onchange="format(this)" onblur="if(this.value.indexOf(".")==-1)this.value=this.value+".00" style="text-align:right;" value="0.00" readonly="true"></td>' +
                '<td class="text-center"><a id="remove" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>' +
                '<input type="hidden" name="boqbd[]" value="<?php echo $boqbd;?>">' +
                '<input type="hidden" name="unitcode[]" value="<?php echo $unitcode;?>">' +
                '<input type="hidden" name="unitname[]" value="<?php echo $unitname;?>">' +
                '<input type="hidden" name="qty_boq[]" value="<?php echo $qtyboq;?>">' +
                '<input type="hidden" name="boqid[]" value="'+ row +'"' +
                '<input type="hidden" name="boqcode[]" value="">' +
                '<input type="hidden" name="matboq[]" value="">' +
                '<input type="hidden" name="matlaborcode[]" value="<?php echo $matcodelabor;?>">'+
                '<input type="hidden" name="matlaborname[]" value="<?php echo $matnamelabor;?>">'+
                '<input type="hidden" name="projectcode[]" value="<?php echo $projectcode;?>">'+

                '</td>' +
                '</tr>';
            $('#tdrows').append(tr);
        var cost = '<div class="modal fade" id="costcode' + row + '" data-backdrop="false">' +
                '<div class="modal-dialog modal-lg">' +
                '<div class="modal-content">' +
                '<div class="modal-header bg-info">' +
                '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                '<h4 class="modal-title" id="myModalLabel">Cost Code</h4>' +
                ' </div>' +
                '<div class="modal-body">' +
                '<div id="costload' + row + '">'+row+'</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
            $('.cost').append(cost);
        $('.costcode' + row + '').click(function() {
            $('#costload' + row + '').html(
                "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
            );
            $("#costload" + row + "").load('<?php echo base_url(); ?>share/costcode_id/' + row);
        });
        var mat = '<div class="modal fade" id="matcode' + row + '" data-backdrop="false">' +
                '<div class="modal-dialog modal-lg">' +
                '<div class="modal-content">' +
                '<div class="modal-header bg-info">' +
                '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                '<h4 class="modal-title" id="myModalLabel">Material</h4>' +
                ' </div>' +
                '<div class="modal-body">' +
                '<div id="matload' + row + '">'+row+'</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
            $('.mat').append(mat);
        $('.matcode' + row + '').click(function() {
            $('#matload' + row + '').html(
                "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
            );
            $("#matload" + row + "").load('<?php echo base_url(); ?>share/material_alone/' + row);
        });
        var job = '<div class="modal fade" id="jobcode' + row + '" data-backdrop="false">' +
                '<div class="modal-dialog modal-lg">' +
                '<div class="modal-content">' +
                '<div class="modal-header bg-info">' +
                '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                '<h4 class="modal-title" id="myModalLabel">Job System</h4>' +
                ' </div>' +
                '<div class="modal-body">' +
                '<div id="jobload' + row + '">'+row+'</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
            $('.job').append(job);
        $('.jobcode' + row + '').click(function() {
            $('#jobload' + row + '').html(
                "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
            );
            $("#jobload" + row + "").load('<?php echo base_url(); ?>share/system/' + row);
        });

        $("#qty_bg"+row).on("keyup",function(e){
            var qty = parseFloat($("#qty_bg"+row).val().replace(/,/g, ""));
            var matpricebg = parseFloat($("#matpricebg"+row).val().replace(/,/g, ""));
            var labpricebg = parseFloat($("#labpricebg"+row).val().replace(/,/g, ""));
            var subpricebg = parseFloat($("#subpricebg"+row).val().replace(/,/g, ""));
            
            if (!isNaN(qty)){
                var sum  = qty*matpricebg;
                var sumlab = qty*labpricebg;
                var sumsub = qty*subpricebg;
                var sumrowtotol = sum+sumlab+sumsub;
            }else{
                var sum  = 0;
                var sumlab  = 0;
                var sumsub  = 0;
                var sumrowtotol  = 0;
            }
            $("#matamtbg"+row).val(numberWithCommas(sum.toFixed(2)));
            $("#labamtbg"+row).val(numberWithCommas(sumlab.toFixed(2)));
            $("#subamtbg"+row).val(numberWithCommas(sumsub.toFixed(2)));
            $("#totalamt"+row).val(numberWithCommas(sumrowtotol.toFixed(2)));
            calculatemat();
            calculatelab();
            calculatesub();
            calculatetotal();
        });
        $("#matpricebg"+row).on("keyup",function(e){
            var qty = parseFloat($("#qty_bg"+row).val().replace(/,/g, ""));
            var matpricebg = parseFloat($("#matpricebg"+row).val().replace(/,/g, ""));
            var labpricebg = parseFloat($("#labpricebg"+row).val().replace(/,/g, ""));
            var subpricebg = parseFloat($("#subpricebg"+row).val().replace(/,/g, ""));
            
            if (!isNaN(matpricebg)){
                var sum  = qty*matpricebg;
                var sumlab = qty*labpricebg;
                var sumsub = qty*subpricebg;
                var sumrowtotol = sum+sumlab+sumsub;
            }else{
                var sum  = 0;
                var sumlab = qty*labpricebg;
                var sumsub = qty*subpricebg;
                var sumrowtotol = sum+sumlab+sumsub;
            }
            $("#matamtbg"+row).val(numberWithCommas(sum.toFixed(2)));
            $("#totalamt"+row).val(numberWithCommas(sumrowtotol.toFixed(2)));
            calculatemat();
            calculatetotal();
            
        });
        $("#labpricebg"+row).on("keyup",function(e){
            var qty = parseFloat($("#qty_bg"+row).val().replace(/,/g, ""));
            var matpricebg = parseFloat($("#matpricebg"+row).val().replace(/,/g, ""));
            var labpricebg = parseFloat($("#labpricebg"+row).val().replace(/,/g, ""));
            var subpricebg = parseFloat($("#subpricebg"+row).val().replace(/,/g, ""));
            
            if (!isNaN(labpricebg)){
                var sum  = qty*matpricebg;
                var sumlab = qty*labpricebg;
                var sumsub = qty*subpricebg;
                var sumrowtotol = sum+sumlab+sumsub;
            }else{
                var sum  =  qty*matpricebg;
                var sumlab = 0;
                var sumsub = qty*subpricebg;
                var sumrowtotol = sum+sumlab+sumsub;
            }
            $("#labamtbg"+row).val(numberWithCommas(sumlab.toFixed(2)));
            $("#totalamt"+row).val(numberWithCommas(sumrowtotol.toFixed(2)));
        
            calculatelab();
            calculatetotal();
    
        });
        $("#subpricebg"+row).on("keyup",function(e){
            var qty = parseFloat($("#qty_bg"+row).val().replace(/,/g, ""));
            var matpricebg = parseFloat($("#matpricebg"+row).val().replace(/,/g, ""));
            var labpricebg = parseFloat($("#labpricebg"+row).val().replace(/,/g, ""));
            var subpricebg = parseFloat($("#subpricebg"+row).val().replace(/,/g, ""));
            
            if (!isNaN(subpricebg)){
                var sum  = qty*matpricebg;
                var sumlab = qty*labpricebg;
                var sumsub = qty*subpricebg;
                var sumrowtotol = sum+sumlab+sumsub;
            }else{
                var sum  =  qty*matpricebg;
                var sumlab = qty*labpricebg;
                var sumsub = 0;
                var sumrowtotol = sum+sumlab+sumsub;
            }
            $("#subamtbg"+row).val(numberWithCommas(sumsub.toFixed(2)));
            $("#totalamt"+row).val(numberWithCommas(sumrowtotol.toFixed(2)));
        
        
            calculatesub();
            calculatetotal();
        });
                    
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
    
</script>