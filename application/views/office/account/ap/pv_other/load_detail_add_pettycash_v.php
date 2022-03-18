
<table class="table table-bordered table-striped table-hover table-xxs">
  <thead>
    <tr>
      <th width="5%" class="text-center">No.</th>
      <!-- <th width="5%" class="text-center">Action</th> -->
      <th width="15%" class="text-center">Pettycash No.</th>
      <th class="text-center">Name</th>
      <th>Advance To.</th>
      <th>Remark</th>
      <th width="15%" class="text-center">Amount</th>
      <th class="text-center">Action</th>
    </tr>
  </thead>
    <tbody id="tbody">
<!-- </div> -->
<?php $n=1; foreach ($pettycash as $k) {

  $query = $this->db->query("SELECT  Sum(pettycashi_amount) AS amount,Sum(pattycashi_totvat) AS vattot,Sum(pettycashi_netamt) AS netmat FROM pettycash_item where pettycashi_ref='$k->docno'");
  $resi = $query->result();
  ?>
    <tr>
      <td class="text-center"><?php echo $n; ?></td>
      <!-- <td>
        <div class="checkbox checkbox-switchery switchery-xs">
         <label>
            <input type="checkbox"  id="a<?php echo $n; ?>"  class="switchery">
            <input type="text" name="chki[]" id="chkid<?php echo $n;?>">
          </label>
        </div>
      </td> -->
      <td class="text-center"><a data-toggle="modal" data-target="#open<?php echo $k->docno;?>" class="editable editable-click"><?php echo $k->docno; ?></a><input type="hidden" id="doci<?php echo $k->docno;?>" name="docnoi[]" value="<?php echo $k->docno; ?>"></td>
      <td><?php echo $k->member; ?><input type="hidden" id="memberi<?php echo $k->docno?>" name="memberi[]" value="<?php echo $k->memid; ?>"></td>
      <td><?php echo $k->advname; ?><input type="hidden" id="advnamei<?php echo $k->docno?>" name="advnamei[]" value="<?php echo $k->advname; ?>"></td>
      <td><?php echo $k->remark; ?><input type="hidden" id="remarki<?php echo $k->docno?>" name="remarki[]" value="<?php echo $k->remark; ?>"></td>
      <?php foreach ($resi as $v) { ?>
      <td class="text-right">
        <?php echo number_format($v->netmat,2); ?>
        <input type="hidden" id="netamt<?php echo $k->docno;?>" name="docnetamti[]" value="<?php echo $v->netmat; ?>">
      </td>
      <td class="text-center">
        <ul class="icons-list">
          <a class="sel<?php echo $k->docno;?> label label-info"> Select</a>
        </ul>
      </td>
      <?php   } ?>
    </tr>
    <script>
      $("#a<?php echo $n; ?>").click(function(){
        if ($("#a<?php echo $n; ?>").prop("checked")) {
            $("#chkid<?php echo $n;?>").val("Y");
        }else{
            $("#chkid<?php echo $n;?>").val("");
            var row = ($('#body tr').length-0)+1;
            row.closest('tr').remove();
        }

      });
      $(".sel<?php echo $k->docno;?>").click(function(){
        var row = ($('#body tr').length-0)+1;
        var docno = $("#doci<?php echo $k->docno;?>").val();
        var memid= $("#memberi<?php echo $k->docno?>").val();
        var remark = $("#remarki<?php echo $k->docno;?>").val();
        var netamt = $("#netamt<?php echo $k->docno;?>").val();
        var pvdate = $("#apodate").val();
        var pvno = $("#apono").val();
        var advname = $("#advnamei<?php echo $k->docno;?>").val();
        if (netamt=="") {
            var tnetamt = 0;
        }else{
        var tnetamt = netamt;
        }
          var tr = '<tr id="'+row+'">'+
                   '<td class="text-center">'+row+'</td>'+
                   '<td>'+docno+'</td>'+
                   '<td>'+advname+'</td>'+
                   '<td>'+remark+'</td>'+
                   '<td class="text-right">'+tnetamt+'</td>'+
                   '<td class="text-center"><ul class="icons-list">'+
                   '<li><a id="delete" class="noty-runner" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></li>'+
                   '</ul></td>'+
                   '</tr>';
            $("#body").append(tr);
              var self = $(this);
              self.closest('tr').remove();
              var tot = parseFloat( $("#totaltxt").val());
              var tt = tot+parseFloat(tnetamt);
              $("#total").html(tt);
              $("#totaltxt").val(tt);

              var url="<?php echo base_url(); ?>index.php/ap_active/editpvodetail";
              var dataSet={
                ref: pvno,
                pcno: docno,
                mid: memid,
                rem: remark,
                netamt: netamt,
                date: pvdate,
                };
              $.post(url,dataSet,function(data){
                alert(data);
              });

      });
    </script>

    <!-- modal -->

    <!-- /จบ modal -->
<!-- จบ table -->
    <?php $n++; } ?>

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
