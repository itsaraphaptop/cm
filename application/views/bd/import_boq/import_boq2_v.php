<div class="content-wrapper">
    <div class="content">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"><?=$project;?><a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                    <legend class="text-bold">BOQ Import</legend>
                </div>
                <div class="panel-body">
                    <form action="<?php echo base_url();?>import_boq2/do_upload" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    File Upload
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input class="form-control" type="file" name="userfile" id="file_upload">
                                </div>
                            </div>
                            <div class="col-md-2"> 
                                <div class="form-group">
                                    <!-- <button type="button" data-toggle="modal" data-target="#imp_modal" class="btn btn-sm btn-primary">Import</button> -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"> 
                                <div class="form-group">
                                    <!-- <button type="button" data-toggle="modal" data-target="#imp_modal" class="btn btn-sm btn-primary">Import</button> -->
                                </div>
                            </div>
                            <div class="col-md-2"> 
                                <div class="form-group text-center">
                                    <label for="">Job code</label>
                                    <input type="text" class="form-control input-sm text-uppercase text-center"  maxlength="1" name="jobcode" placeholder="Column" value="">
                                </div>
                            </div>
                            <div class="col-md-2"> 
                                <div class="form-group text-center">
                                <label for="">Description</label>
                                    <input type="text" class="form-control input-sm text-uppercase text-center" maxlength="1" name="desc" placeholder="Column" value="">
                                </div>
                            </div>
                            <div class="col-md-2"> 
                                <div class="form-group text-center">
                                <label for="">Material Code</label>
                                    <input type="text" class="form-control input-sm text-uppercase text-center" maxlength="1" name="matcode" placeholder="Column" value="">
                                </div>
                            </div>
                            <div class="col-md-2"> 
                                <div class="form-group text-center">
                                <label for="">Unit Code</label>
                                    <input type="text" class="form-control input-sm text-uppercase text-center" maxlength="1" placeholder="Column" value="">
                                </div>
                            </div>
                            <div class="col-md-2"> 
                                <div class="form-group text-center">
                                <label for="">Cost Code (Material)</label>
                                    <input type="text" class="form-control input-sm text-uppercase text-center" maxlength="1" placeholder="Column" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"> 
                                <div class="form-group">
                                
                                </div>
                            </div>
                            <div class="col-md-2"> 
                                <div class="form-group">
                                
                                </div>
                            </div>
                            <div class="col-md-2"> 
                                <div class="form-group text-center">
                                <label for="">Ref. BOQ</label>
                                    <input type="text" class="form-control input-sm text-uppercase text-center" maxlength="1" placeholder="Column" value="">
                                </div>
                            </div>
                            <div class="col-md-2"> 
                                <div class="form-group text-center">
                                <label for="">Material Name</label>
                                    <input type="text" class="form-control input-sm text-uppercase text-center" maxlength="1" placeholder="Column" value="">
                                </div>
                            </div>
                            <div class="col-md-2"> 
                                <div class="form-group text-center">
                                <label for="">Unit Name</label>
                                    <input type="text" class="form-control input-sm text-uppercase text-center" maxlength="1" placeholder="Column" value="">
                                </div>
                            </div>
                            <div class="col-md-2"> 
                                <div class="form-group text-center">
                                <label for="">Cost Code (Laber/Sub)</label>
                                    <input type="text" class="form-control input-sm text-uppercase text-center" maxlength="1" placeholder="Column" value="">
                                </div>
                            </div>
                        </div>
                        <legend class="text-semibold"></i> BOQ</legend>
                        <div class="row">
                            <div class="col-md-2"> 
                                <div class="form-group">
                                
                                </div>
                            </div>
                            <div class="col-md-2"> 
                                <div class="form-group text-center">
                                <label for="">QTY</label>
                                    <input type="text" class="form-control input-sm text-uppercase text-center" maxlength="1" placeholder="Column" value="">
                                </div>
                            </div>
                            <div class="col-md-2"> 
                                <div class="form-group text-center">
                                <label for="">Material Price</label>
                                    <input type="text" class="form-control input-sm text-uppercase text-center" maxlength="1" placeholder="Column" value="">
                                </div>
                            </div>
                            <div class="col-md-2"> 
                                <div class="form-group text-center">
                                <label for="">Material Amount</label>
                                    <input type="text" class="form-control input-sm text-uppercase text-center" maxlength="1" placeholder="Column" value="">
                                </div>
                            </div>
                            <div class="col-md-2"> 
                                <div class="form-group text-center">
                                <label for="">Labor Price</label>
                                    <input type="text" class="form-control input-sm text-uppercase text-center" maxlength="1" placeholder="Column" value="">
                                </div>
                            </div>
                            <div class="col-md-2"> 
                                <div class="form-group text-center">
                                <label for="">Labor Amount</label>
                                    <input type="text" class="form-control input-sm text-uppercase text-center" maxlength="1" placeholder="Column" value="">
                                </div>
                            </div>
                        </div>
                        <legend class="text-semibold"></i> Budget</legend>
                        <div class="row">
                            <div class="col-md-2"> 
                                <div class="form-group">
                            
                                </div>
                            </div>
                            <div class="col-md-2"> 
                                <div class="form-group text-center">
                                <label for="">QTY</label>
                                    <input type="text" class="form-control input-sm text-uppercase text-center" maxlength="1" placeholder="Column" value="">
                                </div>
                            </div>
                            <div class="col-md-2"> 
                                <div class="form-group text-center">
                                <label for="">Material Price</label>
                                    <input type="text" class="form-control input-sm text-uppercase text-center" maxlength="1" placeholder="Column" value="">
                                </div>
                            </div>
                            <div class="col-md-2"> 
                                <div class="form-group text-center">
                                <label for="">Material Amount</label>
                                    <input type="text" class="form-control input-sm text-uppercase text-center" maxlength="1" placeholder="Column" value="">
                                </div>
                            </div>
                            <div class="col-md-2"> 
                                <div class="form-group text-center">
                                <label for="">Labor Price</label>
                                    <input type="text" class="form-control input-sm text-uppercase text-center" maxlength="1" placeholder="Column" value="">
                                </div>
                            </div>
                            <div class="col-md-2"> 
                                <div class="form-group text-center">
                                <label for="">Labor Amount</label>
                                    <input type="text" class="form-control input-sm text-uppercase text-center" maxlength="1" placeholder="Column" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"> 
                                <div class="form-group">
                                    <button type="submit" id="process" class="btn btn-sm btn-primary">Process</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    <div class="process">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Job code</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Material Code</th>
                                        <th class="text-center">Material Name</th>
                                        <th class="text-center">Material Code</th>
                                        <th class="text-center">Unit Code</th>
                                        <th class="text-center">Unit Name</th>
                                        <th class="text-center">Cost Code(Material)</th>
                                        <th class="text-center">Cost Code(Labor/Sub)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="10" class="text-center">No Data</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="imp_modal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h5 class="modal-title">Import BOQ</h5>
        </div>
        <div class="modal-body">
        <form action="<?php echo base_url();?>excel_import/process_temp" method="post" enctype="multipart/form-data">
            <div id="importbqq">
                <div class="form-group">
                    <input class="form-control" type="file" name="userfile" id="file_upload">
                </div>
            </div>
        </form>
        </div>
        <br>
        <div class="modal-footer">
          <hr>
          <a type="button" class=" btn btn-primary" data-dismiss="modal">Import</a>
          <a type="button" class="btn btn-link bg-info" data-dismiss="modal">Close</a>
        </div>
      </div>
    </div>
  </div>
<script>
    $("#processs").on('click',function(){
        $(".processs").html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
        $(".processs").load('<?php echo base_url();?>excel_import/process_temp');
    });
    
</script>