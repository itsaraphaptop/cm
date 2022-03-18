<style>
  .noborder {
    border: aliceblue;
    background: rgba(255, 255, 255, 0);
  }
</style>
<script type="text/javascript">
  $('body').attr('class', 'navbar-top pace-done');
</script>
<div class="content-wrapper">
  <div class="page-header">
    <div class="page-header-content">
      <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
    </div>
  </div>
<div class="content">
<div class="panel panel-flat">
  <div class="panel-heading">
  <h6 class="panel-title"> Edit Account Payable</h6>
  <div class="panel-body">
  
  <form action="<?php echo base_url(); ?>ap_active/addnewap_reten" method="post">
  <br>

<div class="col-md-12">
  <div class="tabbable">
    <ul class="nav nav-tabs nav-tabs-highlight">
    <li class="active"><a href="#pa-pill1" data-toggle="tab" aria-expanded="false"><i class=" icon-coins position-left"></i> APV</a></li>
    <li class=""><a href="#pa-pill2" data-toggle="tab" aria-expanded="false"><i class="  icon-price-tag position-left"></i> APS</a></li>
    <li class=""><a href="#pa-pill3" data-toggle="tab" aria-expanded="false"><i class="  icon-price-tag position-left"></i> APO</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane has-padding active" id="pa-pill1">
        <div id="apv" class="table-responsive">
          <table class="basic table table-hover table-xxs datatable-basic">
            <thead>
              <tr>
                <th>Type</th>
                <th>Voucher No.</th>
                <th>Voucher Date.</th>
                <th>Ref.Doc</th>
                <th>Vender Name</th>
                <th>DueDate</th>
                <th>Net Amount</th>
                <th>Tax No</th>
                <th>Credit Term</th>
                <th>Project/Department Name</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody id="apvv">
              <?php $i=1; foreach ($eapv as $vapv) {
                $qev = $this->db->query("select * from vender where vender_code='$vapv->apv_vender'");
                $rven = $qev->result();
                foreach ($rven as $dd) {
                
              ?>
              <tr>
              <td><?php echo "Normal"; ?></td>
                <td><input type="text" class="form-control input-sm noborder "  name="" readonly="true" value="<?php echo $vapv->apv_code; ?>" id="apv_code<?php echo $i;?>"></td>
                <td><?php echo $vapv->apv_gldate ?></td>
                <td><?php echo $vapv->apv_do ?></td>
                <td><?php echo $dd->vender_name ?></td>

                <td><p id="apvshow<?php echo $i;?>"><?php echo $vapv->apv_duedate ?></p>
                <input class="form-control input-sm" id="apv_due<?php echo $i;?>" name="tota" type="date" value="<?php echo $vapv->apv_duedate ?>"></td>
                <td class="text-right"><?php echo $vapv->apv_totamt ?></td>

                <td><p id="apvshowinv<?php echo $i;?>"><?php echo $vapv->apv_inv?></p>
                <input class="form-control input-sm" id="apv_in<?php echo $i;?>" name="inv" type="text" value="<?php echo $vapv->apv_inv?>"></td>

                <td><p id="apvshowterm<?php echo $i;?>"><?php echo $vapv->apv_crterm ?></p>
                <input class="form-control input-sm" id="apv_cr<?php echo $i;?>" name="apv_term" type="text" value="<?php echo $vapv->apv_crterm ?>"></td>

                <td><?php echo $vapv->project_name ?></td>
                <td>
                  <ul class="icons-list">
                    <li class="text-default"><a href="#"><i class="icon-pencil7" id="editapv<?php echo $i; ?>"></i></a></li>
                    <li class="text-default"><a href="#"><i class="icon-box-add" id="upapv<?php echo $i; ?>"></i></a></li>
                  </ul>
                </td>
                <script>
                  
                  $("#upapv<?php echo $i; ?>").hide();
                  $("#apv_due<?php echo $i; ?>").hide();
                  $("#apv_in<?php echo $i; ?>").hide();
                  $("#apv_cr<?php echo $i; ?>").hide();
                  $("#editapv<?php echo $i; ?>").click(function(){
                    $("#apv_due<?php echo $i; ?>").show();
                    $("#apv_in<?php echo $i; ?>").show();
                    $("#apv_cr<?php echo $i; ?>").show();
                    $("#upapv<?php echo $i; ?>").show();
                    $("#apvshow<?php echo $i; ?>").hide();
                    $("#apvshowinv<?php echo $i; ?>").hide();
                    $("#apvshowterm<?php echo $i; ?>").hide();
                    $("#editapv<?php echo $i; ?>").hide();
                  } );


                  $("#upapv<?php echo $i; ?>").click(function(){

                    var url="<?php echo base_url(); ?>index.php/ap_active/upapv";
                    var dataSet={
                      apv_in: $('#apv_in<?php echo $i; ?>').val(),
                      apv_due: $('#apv_due<?php echo $i; ?>').val(),
                      apv_cr: $('#apv_cr<?php echo $i; ?>').val(),
                      apv_code: $("#apv_code<?php echo $i; ?>").val(),
                    }
                    $.post(url,dataSet,function(data){
                      setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>index.php/ap/ap_main_editbill";
                      }, 1000);

                    });
              });
                </script>
              <?php } $i++; } ?> 
              </tr>  

              <?php $i=1; foreach ($dapd as $vapd) {
              ?>
              <tr>
                <td><?php echo "Down"; ?></td>
                <td><input type="text" class="form-control input-sm noborder"  name="" readonly="true" value="<?php echo $vapd->apd_code; ?>" id="apd_code<?php echo $i;?>"></td>
                <td><?php echo $vapd->apd_date ?></td>
                <td></td>
                <td><?php echo $vapd->vender_name ?></td>

                <td><p id="apdshow<?php echo $i;?>"><?php echo $vapd->apd_duedate ?></p>
                <input class="form-control input-sm" id="apd_due<?php echo $i;?>" name="tota" type="date" value="<?php echo $vapd->apd_duedate ?>"></td>
                <td class="text-right"><?php echo $vapd->apd_amount ?></td>

                <td><p id="apdshowinv<?php echo $i;?>"><?php echo $vapd->apd_tax_no?></p>
                <input class="form-control input-sm" id="apd_in<?php echo $i;?>" name="inv" type="text" value="<?php echo $vapd->apd_tax_no?>"></td>

                <td><p id="apdshowterm<?php echo $i;?>"><?php echo $vapd->apd_term ?></p>
                <input class="form-control input-sm" id="apd_cr<?php echo $i;?>" name="apd_term" type="text" value="<?php echo $vapd->apd_term ?>"></td>

                <td><?php echo $vapd->project_name ?></td>
                <td>
                  <ul class="icons-list">
                    <li class="text-default"><a href="#"><i class="icon-pencil7" id="editapd<?php echo $i; ?>"></i></a></li>
                    <li class="text-default"><a href="#"><i class="icon-box-add" id="upapd<?php echo $i; ?>"></i></a></li>
                  </ul>
                </td>
                <script>
                  
                  $("#upapd<?php echo $i; ?>").hide();
                  $("#apd_due<?php echo $i; ?>").hide();
                  $("#apd_in<?php echo $i; ?>").hide();
                  $("#apd_cr<?php echo $i; ?>").hide();
                  $("#editapd<?php echo $i; ?>").click(function(){
                    $("#apd_due<?php echo $i; ?>").show();
                    $("#apd_in<?php echo $i; ?>").show();
                    $("#apd_cr<?php echo $i; ?>").show();
                    $("#upapd<?php echo $i; ?>").show();
                    $("#apdshow<?php echo $i; ?>").hide();
                    $("#apdshowinv<?php echo $i; ?>").hide();
                    $("#apdshowterm<?php echo $i; ?>").hide();
                    $("#editapd<?php echo $i; ?>").hide();
                  } );

                  $("#upapd<?php echo $i; ?>").click(function(){
                    var url="<?php echo base_url(); ?>index.php/ap_active/upapd";
                    var dataSet={
                      apd_in: $('#apd_in<?php echo $i; ?>').val(),
                      apd_due: $('#apd_due<?php echo $i; ?>').val(),
                      apd_cr: $('#apd_cr<?php echo $i; ?>').val(),
                      apd_code: $("#apd_code<?php echo $i; ?>").val(),
                    }
                    $.post(url,dataSet,function(data){
                      setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>index.php/ap/ap_main_editbill";
                      }, 1000);

                    });
              });
                </script>
              <?php $i++; } ?> 
              </tr> 


              <?php $i=1; foreach ($rapr as $vapr) {
              ?>
              <tr>
                <td><?php echo "Retention"; ?></td>
                <td><input type="text" class="form-control input-sm noborder"  name="" readonly="true" value="<?php echo $vapr->apr_code; ?>" id="apr_code<?php echo $i;?>"></td>
                <td><?php echo $vapr->apr_date ?></td>
                <td></td>
                <td><?php echo $vapr->vender_name ?></td>

                <td><p id="aprshow<?php echo $i;?>"><?php echo $vapr->apr_duedate ?></p>
                <input class="form-control input-sm" id="apr_due<?php echo $i;?>" name="tota" type="date" value="<?php echo $vapr->apr_duedate ?>"></td>
                <td class="text-right"><?php echo $vapr->apr_amount ?></td>

                <td><p id="aprshowinv<?php echo $i;?>"><?php echo $vapr->apr_tax_no?></p>
                <input class="form-control input-sm" id="apr_in<?php echo $i;?>" name="inv" type="text" value="<?php echo $vapr->apr_tax_no?>"></td>

                <td><p id="aprshowterm<?php echo $i;?>"><?php echo $vapr->apr_term ?></p>
                <input class="form-control input-sm" id="apr_cr<?php echo $i;?>" name="apr_term" type="text" value="<?php echo $vapr->apr_term ?>"></td>

                <td><?php echo $vapr->project_name ?></td>
                <td>
                  <ul class="icons-list">
                    <li class="text-default"><a href="#"><i class="icon-pencil7" id="editapr<?php echo $i; ?>"></i></a></li>
                    <li class="text-default"><a href="#"><i class="icon-box-add" id="upapr<?php echo $i; ?>"></i></a></li>
                  </ul>
                </td>
                <script>
                  
                  $("#upapr<?php echo $i; ?>").hide();
                  $("#apr_due<?php echo $i; ?>").hide();
                  $("#apr_in<?php echo $i; ?>").hide();
                  $("#apr_cr<?php echo $i; ?>").hide();
                  $("#editapr<?php echo $i; ?>").click(function(){
                    $("#apr_due<?php echo $i; ?>").show();
                    $("#apr_in<?php echo $i; ?>").show();
                    $("#apr_cr<?php echo $i; ?>").show();
                    $("#upapr<?php echo $i; ?>").show();
                    $("#aprshow<?php echo $i; ?>").hide();
                    $("#aprshowinv<?php echo $i; ?>").hide();
                    $("#aprshowterm<?php echo $i; ?>").hide();
                    $("#editapr<?php echo $i; ?>").hide();
                  } );

                  $("#upapr<?php echo $i; ?>").click(function(){
                    var url="<?php echo base_url(); ?>index.php/ap_active/upapr";
                    var dataSet={
                      apr_in: $('#apr_in<?php echo $i; ?>').val(),
                      apr_due: $('#apr_due<?php echo $i; ?>').val(),
                      apr_cr: $('#apr_cr<?php echo $i; ?>').val(),
                      apr_code: $("#apr_code<?php echo $i; ?>").val(),
                    }
                    $.post(url,dataSet,function(data){
                      setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>index.php/ap/ap_main_editbill";
                      }, 1000);

                    });
              });
                </script>
              <?php $i++; } ?> 
              </tr> 
            </tbody>
          </table>
        </div>
      </div>

      <div class="tab-pane has-padding" id="pa-pill2">
        <div id="aps" class="table-responsive">
          <table class="basic table table-hover table-xxs datatable-basics">
           <thead>
             <tr>
              <th>No.</th>
              <th>Voucher No.</th>
              <th>Voucher Date.</th>
              <th>Ref.Doc</th>
              <th>Vender</th>
              <th>DueDate</th>
              <th>Net Amount</th>
              <th>Tax</th>
              <th>Project/Department</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody id="apss">
              <?php $i=1; foreach ($eaps as $vaps) {
                $qev = $this->db->query("select * from vender where vender_code='$vaps->aps_vender'");
                $rven = $qev->result();
                foreach ($rven as $dd) {
                
              ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><input type="text" class="form-control input-sm noborder"  name="" readonly="true" value="<?php echo $vaps->aps_code; ?>" id="aps_code<?php echo $i;?>"></td>
                <td><?php echo $vaps->createdate ?></td>
                <td><?php echo $vaps->aps_lono ?></td>
                <td><?php echo $dd->vender_name ?></td>

                <td><p id="apsshow<?php echo $i;?>"><?php echo $vaps->aps_duedate ?></p>
                <input class="form-control input-sm" id="aps_due<?php echo $i;?>" name="aps_due" type="date" value="<?php echo $vaps->aps_duedate ?>"></td>
                <td class="text-right"><?php echo $vaps->aps_amount ?></td>

                <td><p id="apsshowinv<?php echo $i;?>"><?php echo $vaps->aps_invno ?></p>
                <input class="form-control input-sm" name="aps_inv" id="aps_in<?php echo $i;?>" type="type" value="<?php echo $vaps->aps_invno ?>"></td>

                <td><?php echo $vaps->project_name ?></td>
                <td>
                  <ul class="icons-list">
                    <li class="text-default"><a href="#"><i class="icon-pencil7" id="editaps<?php echo $i; ?>"></i></a></li>
                    <li class="text-default"><a href="#"><i class="icon-box-add" id="upaps<?php echo $i; ?>"></i></a></li>
                  </ul>
                </td>
                <script>
                  
                  $("#upaps<?php echo $i; ?>").hide();
                  $("#aps_due<?php echo $i; ?>").hide();
                  $("#aps_in<?php echo $i; ?>").hide();
                  $("#editaps<?php echo $i; ?>").click(function(){
                    $("#aps_due<?php echo $i; ?>").show();
                    $("#aps_in<?php echo $i; ?>").show();
                    $("#upaps<?php echo $i; ?>").show();
                    $("#apsshow<?php echo $i; ?>").hide();
                    $("#apsshowinv<?php echo $i; ?>").hide();
                    $("#editaps<?php echo $i; ?>").hide();
                  } );


                  $("#upaps<?php echo $i; ?>").click(function(){

                    var url="<?php echo base_url(); ?>index.php/ap_active/upaps";
                    var dataSet={
                      aps_due: $('#aps_due<?php echo $i; ?>').val(),
                      aps_in: $('#aps_in<?php echo $i; ?>').val(),
                      aps_code: $("#aps_code<?php echo $i; ?>").val(),
                    }
                    $.post(url,dataSet,function(data){
                      setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>index.php/ap/ap_main_editbill";
                      }, 1000);

                    });
              });
                </script>
              
               <?php } $i++; } ?>   
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="tab-pane has-padding" id="pa-pill3">
        <div id="apo" class="table-responsive">
        <table class="basic table table-hover table-xxs datatable-basico">
           <thead>
             <tr>
              <th>No.</th>
              <th>Voucher No.</th>
              <th>Voucher Date.</th>
              <th>Ref.Doc</th>
              <th>Vender</th>
              <th>DueDate</th>
              <th>Net Amount</th>
              <th>Tax</th>
              <th>Project/Department</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody id="apoo">
              <?php $i=1; foreach ($eapo as $vapo) {
               $eee = $this->db->query("select * from project where project_id='$vapo->ap_project'");
                $fff = $eee->result();
                foreach ($fff as $ggg) {
                    $pro = $ggg->project_name;
                 }
            ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><input type="text" class="form-control input-sm noborder"  name="" readonly="true" value="<?php echo $vapo->ap_no; ?>" id="ap_no<?php echo $i;?>"></td>
              <td><?php echo $vapo->ap_date ?></td>
              <td><?php echo $vapo->doc_no ?></td>
              <td><?php echo $vapo->vender_name ?></td>

              <td><p id="aposhow<?php echo $i;?>"><?php echo $vapo->doc_date ?></p>
              <input class="form-control input-sm" id="apo_docdate<?php echo $i;?>" name="apo_docda" type="date" value="<?php echo $vapo->doc_date ?>"></td>
              <td class="text-right"><?php echo $vapo->ex_amt ?></td>

              <td><p id="aposhowtax<?php echo $i;?>"><?php echo $vapo->ex_taxno ?></p>
              <input class="form-control input-sm" id="apo_tax<?php echo $i;?>" name="apo_ta" type="type" value="<?php echo $vapo->ex_taxno ?>"></td>
              <td><?php echo $pro; ?></td>
              <td>
                  <ul class="icons-list">
                    <li class="text-default"><a href="#"><i class="icon-pencil7" id="editapo<?php echo $i; ?>"></i></a></li>
                    <li class="text-default"><a href="#"><i class="icon-box-add" id="upapo<?php echo $i; ?>"></i></a></li>
                  </ul>
                </td>
                
              
            </tr> 
                 <script>
                  
                  $("#upapo<?php echo $i; ?>").hide();
                  $("#apo_docdate<?php echo $i; ?>").hide();
                  $("#apo_tax<?php echo $i; ?>").hide();
                  $("#editapo<?php echo $i; ?>").click(function(){
                    $("#apo_docdate<?php echo $i; ?>").show();
                    $("#apo_tax<?php echo $i; ?>").show();
                    $("#upapo<?php echo $i; ?>").show();
                    $("#aposhow<?php echo $i; ?>").hide();
                    $("#aposhowtax<?php echo $i; ?>").hide();
                    $("#editapo<?php echo $i; ?>").hide();
                  } );


                  $("#upapo<?php echo $i; ?>").click(function(){

                    var url="<?php echo base_url(); ?>index.php/ap_active/upapo";
                    var dataSet={
                      apo_tax: $('#apo_tax<?php echo $i; ?>').val(),
                      apo_docdate: $('#apo_docdate<?php echo $i; ?>').val(),
                      ap_no: $("#ap_no<?php echo $i; ?>").val(),
                    }
                    $.post(url,dataSet,function(data){
                      setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>index.php/ap/ap_main_editbill";
                      }, 1000);

                    });
              });
                </script>

               <?php  $i++; } ?>   
           </tbody>
        </table>
        </div>
      </div>

      </div>
    </div>
  </div>
  </form>
  </div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '100px',
         targets: [ 0 ]
     }],
     dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
     language: {
         search: '<span>Filter:</span> _INPUT_',
         lengthMenu: '<span>Show:</span> _MENU_',
         paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
     },
     drawCallback: function () {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
     },
     preDrawCallback: function() {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
     }
 });
  $('.basic').DataTable();
</script>
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '50px',
         targets: [ 0 ]
     }],
     dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
     language: {
         search: '<span>Filter:</span> _INPUT_',
         lengthMenu: '<span>Show:</span> _MENU_',
         paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
     },
     drawCallback: function () {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
     },
     preDrawCallback: function() {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
     }
 });
  $('.basics').DataTable();
</script>
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '50px',
         targets: [ 0 ]
     }],
     dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
     language: {
         search: '<span>Filter:</span> _INPUT_',
         lengthMenu: '<span>Show:</span> _MENU_',
         paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
     },
     drawCallback: function () {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
     },
     preDrawCallback: function() {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
     }
 });
  $('.basico').DataTable();
</script>