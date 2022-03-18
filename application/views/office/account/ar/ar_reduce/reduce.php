<div class="page-header">
    <div class="panel-body">
        <div class="row">
            <a id="select_inv" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
            Select
            </a>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h3>บันทึกลดหนี้จากใบแจ้งหนี้จากการจำหน่าย (Reduce Debt Trading)</h3>
            </div>
        </div>
        <form id="form_data">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Invoice No :</label>
                    <input type="text" class="form-control" name="inv_no" id="inv_no">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Invoice Date :</label>
                    <input type="date" class="form-control" name="inv_date" id="inv_date">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Project Code :</label>
                    <input type="text" class="form-control" name="project_code" id="project_code">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Project Name :</label>
                    <input type="text" class="form-control" name="project_name" id="project_name">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Customer Code :</label>
                    <input type="text" class="form-control" name="cus_code" id="cus_code">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Customer Name :</label>
                    <input type="text" class="form-control" name="cus_name" id="cus_name">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">% Vat :</label>
                    <input type="text" class="form-control" name="vat" id="vat">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Currency :</label>
                    <input type="text" class="form-control" name="curency" id="curency">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Exchange :</label>
                    <input type="text" class="form-control" name="exchange" id="exchange">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Cr. term :</label>
                    <input type="text" class="form-control" name="cr_term" id="cr_term">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Due Date :</label>
                    <input type="date" class="form-control" name="due_date" id="due_date">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                    <label class="display-block">Remark :</label>
                    <textarea class="form-control" name="remark" rows="4"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-xs" width="200%" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-center"><div style="width:150px;"></div>Mat. Code</th>
                            <th class="text-center"><div style="width:150px;"></div>Mat. Name</th>
                            <th class="text-center"><div style="width:100px;"></div>QTY</th>
                            <th class="text-center"><div style="width:150px;"></div>Price/Unit</th>
                            <th class="text-center"><div style="width:150px;"></div>Amount</th>
                            <th class="text-center"><div style="width:150px;"></div>Discount</th>
                            <th class="text-center"><div style="width:150px;"></div>Net Amount</th>
                            <th class="text-center"><div style="width:150px;"></div>Ref. IC NO.</th>
                        </tr>
                    </thead>
                    <tbody id="list">
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-top:20px;">
               <a class="btn btn-success btn-xs pull-right" id="save_data">Save</a>
            </div>
        </div>
        </form>
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select Invoice</h4>
      </div>
      <div class="modal-body" id="content_detail">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
    $('#select_inv').click(function(event) {
        $('#content_detail').load('<?= base_url() ?>ar/get_inv');
        $('#myModal').model('show');
    });

    $(function(){
      $("#save_data").click(function(){

           var formData = new FormData($("#form_data")[0]); 
           

          $.ajax({
                url: '<?= base_url() ?>acc_active/add_ar_reduce',
                type: 'POST',
                data: formData,
                async: false,
                success: function (data) {

                  try{
                     console.log(data);
                     var json = jQuery.parseJSON(data);
                     if(json.status == true){

                        swal({ 
                            title: json.ar_rd,
                            text: json.message,
                            type: "success" 
                        },
                        function(){
                            window.location.href = '<?= base_url() ?>ar/ar_reduce_edit/'+json.ar_rd;
                        });
                        
                     }else{
                      
                        $.simplyToast(json.message, 'danger');
                     }
                  }catch(e){
                        $.simplyToast(e, 'danger');
                  }
              },
              cache: false,
              contentType: false,
              processData: false
          });
      });
    });
    
</script>