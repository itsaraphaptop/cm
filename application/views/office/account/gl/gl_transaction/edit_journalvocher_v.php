<?php foreach ($header as $key) {
  
?>

<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">EditDashboard - Journal_vocher</span></h4>
    </div>
  </div>
</div>

 <form action="<?=base_url(); ?>gl_active/edit_jounal" method="post"> 
    <div class="content">
      <!-- Input group addons -->
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h3 class="panel-title">Journal_vocher</h3>
          <!-- <div class="heading-elements">
            <ul class="icons-list">
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i> <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                          <li><a href="#" data-toggle="modal" data-target="">FA Depreciation</a></li>
                          <li><a data-toggle="modal" data-target="">FA Write off</a></li>
                          <li><a data-toggle="modal" data-target="">IC</a></li>
                          <li><a data-toggle="modal" data-target="">Copy Voucher</a></li>
                          <li><a data-toggle="modal" data-target="">Reverse Voucher</a></li>
                          <li><a data-toggle="modal" data-target="">Rental</a></li>
                          <li><a data-toggle="modal" data-target="">Real Estate</a></li>
                          <li><a data-toggle="modal" data-target="">RE Cheque</a></li>
                          <li><a data-toggle="modal" data-target="">MA to GL</a></li>
                        </ul>
          </div> -->
        </div>
        <div class="panel-body">

          <div class="row">
            <div class="form-group col-sm-3">
              <label for="">Voucher No :</label>
              <input type="text" id="vchno" name="vchno" class="form-control" readonly="true" value="<?=$key->vchno; ?>"    >
              <input type="hidden" id="chkii" name="chkii" value="" class="form-control" readonly="true" >
            </div>

            <div class="form-group col-sm-2">
              <label for="">Date :</label>
              <input type="date" id="vchdate" value="<?=$key->vchdate;?>" name="vchdate" class="form-control daterange-single">
            </div>

            <div class="form-group col-sm-2">
              <label for="">GL Year :</label>
              <input type="text" id="glyear" name="glyear" value="<?=$key->glyear;?>" class="form-control" readonly="true" >
            </div>

            <div class="form-group col-sm-2">
              <label for="">GL Period :</label>
              <input type="text" id="glperiod" name="glperiod" value="<?=$key->glperiod;?>" class="form-control" readonly="true" >
            </div>
            <div class="form-group col-sm-3">
              <label for="">Data Type :</label>
              <select name="datatype" class="form-control">
                  <option value="headoffice">Head Office</option>
              </select>
            </div>
          </div>
          <?php $book = $this->db->query("select * from gl_book where bookcode = $key->bookcode")->result(); 
            foreach ($book as $books) {
              $bookname = $books->booknamz;
            }
          ?>
          <div class="row">
            <div class="form-group col-sm-2">
              <label for="">Book Account :</label>
              <input type="text" id="bookcode" name="bookcode" class="form-control" readonly="true"
              value="<?=$key->bookcode; ?>" >
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="">&nbsp;&nbsp;&nbsp;</label>
                <div class="input-group" id="errorcost">
                    <input type="text" id="bookname" name="bookname" readonly="true" class="form-control" value="<?=$bookname; ?>">
                    <span class="input-group-btn">
                       <a class="book btn btn-primary btn-sm" data-toggle="modal" data-target="#bookn" ><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                    </span>
                </div>
              </div>
            </div>
            <div class="form-group col-sm-3">
                <label for="">Referent No. :</label>
                <input type="text" name="refno" id="refno" class="form-control" value="<?=$key->refno; ?>">
            </div>
            <div class="form-group col-sm-3">
                <label for="">Ref Date :</label>
                <input type="date" id="refdate" name="refdate" class="form-control" value="<?=$key->refdate; ?>">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-3">
                <label for="">HR No. </label>
                <input type="text" name="hrno" id="hrno" class="form-control" readonly>
            </div>
            <div class="form-group col-sm-3">
                <label for="">#Deprectation</label>
                <input type="text" name="deprec" id="deprec" class="form-control" readonly>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-6">
              <label for="">Remark :</label>
              <textarea class="form-control" id="remark" name="remark" ></textarea>
            </div>
            <div class="form-group col-sm-6">
              <div class="checkbox" >
                <label>
                  <input type="checkbox" id="pucostch" <?=($key->pucost == 'true') ? 'checked="checked"' : '';?> >
                    PU Cost
                    <input type="hidden" id="pucost" name="pucost" value="<?=$key->pucost;?>">
              </div>     
              <script>
                $('#pucostch').change(function() {
                  var val = $(this).prop('checked');
                  // alert(val)
                  if (val === true) {
                    $('#pucost').val(val);
                  }else{
                    $('#pucost').val(val);
                  }
                })
              </script>           
              <!-- <div class="checkbox">
                <label>
                  <input type="checkbox" name="printform" value="printform" >
                  Print Form
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="auto" value="autodept">
                  Auto Dept,credit
                </label>
              </div> -->
            </div>
          </div>
      </div>
      <?php  
} ?>
      <div class="panel panel-flat">
        <div class="panel-body">
          <div class="row">
            <!-- <button type="button" class="btn btn-info" btn-sm data-toggle="modal" data-target="#Account" id="addrows"><i class="icon-list-numbered"></i>  ADD Rows </button> -->
            <!-- <button type="button" class="btn btn-dafault btn-sm" data-toggle="modal" data-target="#Ins" id="addrows">  Insert Row </button> -->
          </div>
          <br>
          <div class="row" id="table">
            <div class="table-responsive">
              <table class="table table-xsm table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center"><div style="width:230px;"></div>A/C</th>
                    <th class="text-center"><div style="width:200px;"></div>Project</th>
                    <th class="text-center"><div style="width:200px;"></div>System</th>
                    <th class="text-center"><div style="width:200px;"></div>Dept</th>
                    <th class="text-center"><div style="width:100px;"></div>Cost code</th>
                    <th class="text-center"><div style="width:100px;"></div>Dr</th>
                    <th class="text-center"><div style="width:100px;"></div>Cr.</th>
                    <th class="text-center"><div style="width:100px;"></div>Receive type</th>
                    <th class="text-center"><div style="width:200px;"></div>Decription</th>
                    <th class="text-center"><div style="width:200px;"></div>Ref No.</th>
                    <th class="text-center"><div style="width:100px;"></div>Ref.Date</th>
                    <th class="text-center"><div style="width:100px;"></div>Amount</th>
                    <th class="text-center"><div style="width:100px;"></div>%</th>
                    <th class="text-center"><div style="width:100px;"></div>Tax Amount</th>
                    <th class="text-center"><div style="width:200px;"></div>Vendor</th>
                    <th class="text-center"><div style="width:200px;"></div>Customer</th>
                    
                    <th class="text-center"><div style="width:100px;"></div>TAX</th>
                    <th class="text-center"><div style="width:100px;"></div>Tax No.</th>
                    <th class="text-center"><div style="width:100px;"></div>Tax/WT Date</th>
                    <th class="text-center"><div style="width:100px;"></div>Tax Description</th>
                    <th class="text-center"><div style="width:100px;"></div>Tax Type</th>
                    <th class="text-center"><div style="width:100px;"></div>Tax/Personal ID</th>
                    <th class="text-center"><div style="width:100px;"></div>Address</th>
                    <th class="text-center"><div style="width:100px;"></div>W/T No.</th>
                  </tr>
                </thead>
                <tbody id="body">
                <?php foreach ($detail as $value) {
                ?>
                <tr>
                <td>
                  <?=$value->vchid; ?>
                  <input type="text" value="<?=$value->vchid; ?>">
                </td>
                <td>
                  <div class="input-group">
                    <input type="text" class="form-control" readonly="readonly" placeholder="Account Name" value="<?=$value->ac_name; ?>" name="">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default btn-icon">
                        <i class="icon-search4"></i></button>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="input-group">
                    <input type="text" class="form-control" readonly="readonly" placeholder="Project Name" value="<?=$value->project_name; ?>" name="">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default btn-icon">
                        <i class="icon-search4"></i></button>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="input-group">
                    <input type="text" class="form-control" readonly="readonly" placeholder="System Name" value="<?=$value->systemname; ?>" name="">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default btn-icon">
                        <i class="icon-search4"></i></button>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="input-group">
                    <input type="text" class="form-control" readonly="readonly" placeholder="Department Name" value="<?=$value->dpt_title; ?>" name="">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default btn-icon">
                        <i class="icon-search4"></i></button>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="input-group">
                    <input type="text" class="form-control" readonly="readonly" placeholder="Department Name" value="<?=$value->costcode; ?>" name="">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default btn-icon">
                        <i class="icon-search4"></i></button>
                    </div>
                  </div>
                </td>
                <td>
                  <input type="text" class="form-control" value="<?=$value->amtdr; ?>">
                </td>
                <td>
                 <input type="text" class="form-control" value="<?=$value->amtcr; ?>">
                </td>
                <td>
                  <select name="" id="" class="form-control">
                    <option value="Bank(Chq.)" <?= ($value->paid == 'Bank(Chq.)') ? 'selected="selected"' : '' ;?>>Bank(Chq.)</option>
                    <option value="Cash" <?= ($value->paid == 'Cash') ? 'selected="selected"' : '' ;?>>Cash</option>
                  </select>
                </td>
                <td>
                  <input type="text" class="form-control" value="<?=$value->gldesc; ?>">
                </td>
                <td>
                  <input type="text" class="form-control" value="<?=$value->refno; ?>">
                </td>
                <td>
                  <input type="date" class="form-control" value="<?=$value->refdocdate; ?>">
                </td>
                <td>
                  <input type="text" class="form-control" value="<?=$value->amount; ?>">
                </td>
                <td>
                  <input type="text" class="form-control" value="<?=$value->taxper; ?>">
                </td>
                <td>5555
                  <input type="text" class="form-control" value="<?=$value->namevendor; ?>">
                </td>
                <td>
                  <div class="input-group">
                    <input type="text" class="form-control" readonly="readonly" placeholder="Vender Name" value="<?=$value->namecus; ?>" name="">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default btn-icon">
                        <i class="icon-search4"></i></button>
                    </div>
                  </div>
                </td>
                <td>
                  <input type="text" class="form-control" value="<?=$value->gldesc; ?>">
                </td>
                <td>
                  <input type="text" class="form-control" value="<?=$value->tax; ?>">
                </td>
                <td>
                  <input type="text" class="form-control" value="<?=$value->taxno; ?>">
                </td>
                <td>
                  <input type="date" class="form-control" value="<?=$value->taxdate; ?>">
                </td>
                <td>
                  <input type="text" class="form-control" value="<?=$value->taxdes; ?>">
                </td>                
                <td>
                  <input type="text" class="form-control" value="<?=$value->taxtype; ?>">
                </td>
                <td>
                  <input type="text" class="form-control" value="<?=$value->taxper; ?>">
                </td>              
                <td>
                  <input type="text" class="form-control" value="<?=$value->address; ?>">
                </td>
                <td>
                  <input type="text" class="form-control" value="<?=$value->wtno; ?>">
                </td>
                <td></td>

               <?php } ?>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
          <br>
           
          <div class="text-right">
            <?php if($read_only_status){ ?>
              <button type="submit" class="save preload btn btn-info btn-sm"><i class="icon-floppy-disk position-left"></i> Save </button>
            <?php }?>  
              <a id="print" href="<?=base_url(); ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=journal.mrt&no=<?=$value->vchno; ?>" class="btn btn-default"><i class="glyphicon glyphicon-print"></i>Print</a>
              
          </div>
      </div>
  </div>
<!-- <div class="panel panel-flat"> -->
<!-- content -->
</form>