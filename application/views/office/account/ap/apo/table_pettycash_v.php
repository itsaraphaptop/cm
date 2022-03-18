
<table class="table table-bordered table-striped table-hover table-xxs ">
  <thead>
    <tr>
      <th width="5%" class="text-center">No.</th>
      <th width="5%" class="text-center">Action</th>
      <th width="15%" class="text-center">Pettycash No.</th>
      <th class="text-center">Advance To.</th>
      <th>Remark</th>
      <th width="15%" class="text-center">Amount</th>
      <th width="10%" class="text-center">Open</th>
    </tr>
  </thead>
    <tbody id="tbody">
<!-- </div> -->
<?php $n=1;   $total=0; foreach ($pettycash as $k) {

  $query = $this->db->query("SELECT  Sum(pettycashi_amount) AS amount,Sum(pattycashi_totvat) AS vattot,Sum(pettycashi_netamt) AS netmat FROM pettycash_item where pettycashi_ref='$k->docno'");
  $resi = $query->result();
  ?>
    <tr>
      <td class="text-center"><?php echo $n; ?></td>
      <td>
        <div class="checkbox checkbox-switchery switchery-xs">
         <label>
            <input type="checkbox"  id="a<?php echo $n; ?>"  class="switchery">
            <input type="hidden" name="chki[]" id="chki<?php echo $n;?>">
          </label>
        </div>
      </td>
      <td class="text-center"><a data-toggle="modal" data-target="#open<?php echo $k->docno;?>" class="editable editable-click"><?php echo $k->docno; ?></a><input type="hidden" name="docnoi[]" value="<?php echo $k->docno; ?>"></td>
      <td><?php echo $k->advname; ?><input type="hidden" name="memberi[]" value="<?php echo $k->advname; ?>"></td>
      <td><?php echo $k->remark; ?><input type="hidden" name="remarki[]" value="<?php echo $k->remark; ?>"></td>
      <?php foreach ($resi as $v) { ?>
      <td class="text-right">
        <?php echo number_format($v->netmat,2); ?>
        <input type="hidden" name="docnetamti[]" value="<?php echo $v->netmat; ?>">
      </td>
      <?php   } ?>
      <td class="text-center">
        <ul class="icons-list">
            <li><a data-toggle="modal" data-target="#open<?php echo $k->docno;?>"><i class="icon-folder-open"></i></a></li>
        </ul>
      </td>
    </tr>
    <script>
      $("#a<?php echo $n; ?>").click(function(){
        if ($("#a<?php echo $n; ?>").prop("checked")) {
            $("#chki<?php echo $n;?>").val("Y");
        }else{
            $("#chki<?php echo $n;?>").val("");
        }

      });
    </script>

    <!-- modal -->

    <!-- /จบ modal -->
<!-- จบ table -->
    <?php $n++; $total=$total+$v->netmat; } ?>
    <tr>
      <th colspan="5" class="text-center">Sumary</th>
      <th class="text-right"><?php echo number_format($total,2); ?></th>
      <td></td>
    </tr>
  </tbody>
</table>
    <script>

    // Initialize multiple switches
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
    <?php foreach ($pettycash as $k){?>
    <!-- Info modal -->
    <div id="open<?php echo $k->docno; ?>" class="modal fade">
<div class="modal-dialog modal-lg">
<div class="modal-content ">
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h5 class="modal-title">Petty Cash No.: <?php echo $k->docno; ?></h5>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-md-6 content-group">
      <img src="<?php echo base_url(); ?>comp/<?php echo $compimg; ?>" class="content-group mt-10" alt="" style="width: 120px;" data-pin-nopin="true">
      <!-- <ul class="list-condensed list-unstyled">
        <li>2269 Elba Lane</li>
        <li>Paris, France</li>
        <li>888-555-2311</li>
      </ul> -->
    </div>

    <div class="col-md-6 content-group">
      <div class="invoice-details">
        <h5 class="text-uppercase text-semibold">Petty Cash #<?php echo $k->docno; ?></h5>
        <ul class="list-condensed list-unstyled">
          <li>Date: <span class="text-semibold"><?php echo $k->docdate; ?></span></li>
          <!-- <li>Due date: <span class="text-semibold">May 12, 2015</span></li> -->
        </ul>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
        <span class="text-muted">Pay To:</span>
        <ul class="list-condensed list-unstyled">
          <li><h5><?php echo $k->member; ?><?php echo $k->vender; ?></h5></li>

        </ul>
    </div>

    <div class="col-md-4">
      <span class="text-muted">Project:</span>
      <ul class="list-condensed list-unstyled">
        <li><h5><?php echo $k->project_name; ?><?php echo $k->department_title; ?></h5></li>

      </ul>
    </div>
    <div class="col-md-4">
      <span class="text-muted">Date:</span>
      <ul class="list-condensed list-unstyled">
        <li><h5><?php echo $k->docdate; ?></h5></li>

      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <span class="text-muted">Remark:</span>
      <ul class="list-condensed list-unstyled">
        <li><h5><?php echo $k->remark; ?></h5></li>

      </ul>
    </div>
    <div class="col-md-4">
      <span class="text-muted">System:</span>
      <ul class="list-condensed list-unstyled">
        <?php if($k->system == '1'){ ?><li><h5>OVERHEAD</h5></li>
        <?php }else if($k->system == '2'){ ?><li><h5>AC</h5></li>
        <?php }else if($k->system == '3'){ ?><li><h5>EE</h5></li>
        <?php }else if($k->system == '4'){ ?><li><h5>SN</h5></li>
        <?php }else if($k->system == '5'){ ?><li><h5>CIVIL</h5></li>
          <?php } ?>
      </ul>
    </div>
  </div>
  <legend class="text-muted"> Detail</legend>
  <div class="row">
      <div class="table-responsive">
        <table class="table table-xxs table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Matterial Code</th>
              <th>Materail Name</th>
              <th>Qty</th>
              <th>Unit</th>
              <th>Unit Price</th>
              <th>Amount</th>
              <th>Vat</th>
              <th>Tax</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php $n=1; $qty=0; $unitprice=0; $amouttot=0; $vattot=0; $whtot=0; $netamt=0;
            $session_data = $this->session->userdata('sessed_in');
              $compcode = $session_data['compcode'];
            $this->db->select('*');
            $this->db->where('pettycashi_ref',$k->docno);
            $this->db->where('compcode',$compcode);
            $query = $this->db->get('pettycash_item');
            $resi = $query->result();
             $n=1; foreach ($resi as $va) {?>
               <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $va->pettycashi_expenscode; ?></td>
                <td><?php echo $va->pettycashi_expens; ?></td>
                <td><?php echo number_format($va->pettycashi_amount,2); ?></td>
                <td><?php echo $va->pettycashi_unit; ?></td>
                <td><?php echo number_format($va->pettycashi_unitprice,2); ?></td>
                <td><?php echo number_format($va->pettycashi_amounttot,2); ?></td>
                <td><?php echo number_format($va->pattycashi_totvat,2); ?></td>
                <td><?php echo number_format($va->pettycashi_totwh,2); ?></td>
                <td><?php echo number_format($va->pettycashi_netamt,2); ?></td>
              </tr>
            <?php $n++; $qty = $qty+$va->pettycashi_amount;
            $unitprice = $unitprice+$va->pettycashi_unitprice;
            $amouttot = $amouttot+$va->pettycashi_amounttot;
            $vattot = $vattot+$va->pattycashi_totvat;
            $whtot = $whtot+$va->pettycashi_totwh;
            $netamt = $netamt+$va->pettycashi_netamt; } ?>

          </tbody>
          <tfooter>

            <th colspan="3" class="text-center">Total</th>
            <th><?php echo number_format($qty,2); ?></th>
            <td></td>
            <th><?php echo number_format($unitprice,2); ?></th>
            <th><?php echo number_format($amouttot,2); ?></th>
            <th><?php echo number_format($vattot,2); ?></th>
            <th><?php echo number_format($whtot,2); ?></th>
            <th><?php echo number_format($netamt,2); ?></th>

          </tfooter>
        </table>
      </div>
  </div>
</div>
<div class="modal-footer">
  <!-- <a href="<?php echo base_url(); ?>petty_cash/print_pettycash/<?php echo $va->pettycashi_ref; ?>" class="btn btn-info" >Print</a> -->
  <button type="submit" class="btn btn-primary" data-dismiss="modal">Close</button>

</div>


</div>
</div>
</div>
        <!-- /info modal -->
        <?php } ?>
