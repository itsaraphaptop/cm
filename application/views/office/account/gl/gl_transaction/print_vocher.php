<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">      Dashboard - Journal_vocher</span></h4>
    </div>
  </div>
</div>

 <form name="formglpost"  id="formglpost" method="post" action="<?php echo base_url(); ?>gl_active/addjournal" > 
    <div class="content">
      <!-- Input group addons -->
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h3 class="panel-title">Print_Vocher</h3>
          
        </div>
      </div>
      <div class="panel panel-flat">
        <div class="panel-body">
          <div class="row" id="table">
            <div class="table-responsive">
              <table class="table datatable-basic table-xsm table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Data Type</th>
                    <th class="text-center">#Voucher</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Book</th>
                    <th class="text-center">Type</th>
                    <th class="text-center">Remark</th>
                    <th class="text-center">Debit.</th>
                    <th class="text-center">Credit</th>
                    <th class="text-center">Module</th>
                    <th class="text-center">#Deprectation</th>
                    <th class="text-center"></th>
                  </tr>
                </thead>
                <tbody id="body">
                <?php $n=1; foreach ($getjour as $key) { ?>
                  <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php echo $key->datatype; ?></td>
                    <td><?php echo $key->vchno; ?></td>
                    <td><?php echo $key->vchdate; ?></td>
                    <td><?php echo $key->bookcode; ?></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $key->sffumdr; ?></td>
                    <td><?php echo $key->sffumcr; ?></td>
                    <td></td>
                    <td></td>
                      
                   
                    <td>
                    <a id="print" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=p_journal.mrt&no=<?php echo $key->vchno; ?>" class="btn btn-default"><i class="glyphicon glyphicon-print"></i></a>
                    <?php 
                    if ($key->tax == "wt") {
                    ?>
                    <a id="print" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=report_tax.mrt&no=<?php echo $key->vchno; ?>" class="btn btn-default"><i class="icon-printer"></i></a>
                    <?php
                    }else{
                    ?>
                    <i class="icon-printer"></i>
                    <?php
                     
                    }
                    ?>
                    </td>
                    

                    <td><a id="" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_payvoucher.mrt&no=<?php echo $key->vchno; ?>" class="btn btn-default"><i class="glyphicon glyphicon-print"></i></a></td>



                  </tr>
                  <?php $n++; } ?>
                </tbody>
              </table>
            </div>
          </div>
          <br>
           
          <div class="text-right">
              <a type="button" class="openpr btn btn-default btn-sm" data-toggle="modal" data-target="#archive"><i class="icon-list-numbered"></i>Retrieve</a>
              
          </div>
      </div>
  </div>
<!-- <div class="panel panel-flat"> -->
<!-- content -->
</form>
