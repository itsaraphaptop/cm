<div class="page-header page-header-transparent">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"></span>Report</h4>
        </div>

        <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
    </div>
    <div class="breadcrumb-line breadcrumb-line-component">
        <ul class="breadcrumb">
            <li><a class="preload" href="<?php echo base_url(); ?>office/openblank"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">GL</li>
        </ul>
        <ul class="breadcrumb-elements">
            <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-gear position-left"></i>
                    Settings
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                    <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                    <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                </ul>
            </li>
        </ul>
        <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
    </div>
</div>


<div class="content">
    <div class="panel panel-flat">
        <div class="modal-header">
            <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Report General Ledger<p></p></h6>
        </div>
        <form action="gl_report_r" method="get">
            <div class="panel-body">
               <div class="row">
                        <div class="form-group">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Year :</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input type="text" name="year" id="year" class="form-control" value="<?php echo date("Y");?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">From Period :</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <select class="form-control " id="start" name="start">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">To Period :</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <select class="form-control " id="end" name="end">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
            <div class="modal-footer">
                <div class="col-sm-2"></div>
                <button type="submit" class="btn btn-success">Search</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </form>
    </div>
</div>



<script type="text/javascript">
    $("#submit").click(function(){
        $("#form_").submit();
    })
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script>
    $('#btntable').click(function() {
        var year = $('#year').val();;
        var stdate = $('#start').val();
        var eddate = $('#end').val();
        var f_acc = $('#f_acc').val();
        var t_acc = $('#t_acc').val();
        var f_pro = $('#f_pro').val();
        var t_pro = $('#t_pro').val();
        var f_code = $('#f_code').val();
        var t_code = $('#t_code').val();
        var typelist = $('input[name=typelist]:checked').val();

        if ($('#f_acc').val()=="" && $('#t_acc').val()=="") {
            var f_acc = "0";
            var t_acc = "0";
            
        }else if($('#t_acc').val()!="" && $('#f_acc').val()!="" ){
            var t_acc = $('#t_acc').val();
            var f_acc = $('#f_acc').val();
            
        }else if($('#t_acc').val()=="" && $('#f_acc').val()!=""){
            var t_acc = "0";
            var f_acc = $('#f_acc').val();
            
        }else{
            var t_acc = $('#t_acc').val();
            var f_acc = "0";
        }
        if (year == "") {
            swal({
              title: "กรุณากรอกปี !!!",
              text: "",
              confirmButtonColor: "#EA1923",
              type: "error"
          });
        }else{

            $('#loadtable').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
            $("#loadtable").load('<?php echo base_url(); ?>gl_report/get_general_ledger/'+year+'/'+stdate+'/'+eddate+'/'+f_acc+'/'+t_acc+'/'+typelist+'/'+f_pro+'/'+t_pro+'/'+f_code+'/'+t_code);
        } 
    });

if (Array.prototype.forEach) {
   var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
   elems.forEach(function(html) {
       var switchery = new Switchery(html);
   });
}
else {
   var elems = document.querySelectorAll('.switchery');
   for (var i = 0; i < elems.length; i++) {
       var switchery = new Switchery(elems[i]);
   }
}
</script>