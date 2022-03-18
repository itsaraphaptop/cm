 <div class="col-sm-12">
 <div id="table table-responsive">
              <table class="table table-bordered table-striped table-hover table-xxs" id="res">
                           <thead>
                             <tr>
                               <th width="5%" style="text-align: center;">No.</th>
                               <th width="5%" class="text-center">Select</th>
                               <th style="text-align: center;">Material Code</th>
                               <th style="text-align: center;">Material Name</th>                   
                               <th style="text-align: center;">Cost Name</th>
                               <th style="text-align: center;">Cost Code</th>
                               <th style="text-align: center;">QTY</th>
                               <th style="text-align: center;">Unit</th>
                               <th style="text-align: center;">Amount</th>
                               <th style="text-align: center;" width="10%">Action</th>
                             </tr>
                           </thead>
                           <tbody id="body">
                           <?php $n=1;  foreach ($res as $u) {?>
                              <tr id="<?php echo $n; ?>">
          <td><?php echo $n; ?></td>
          <td>
            <div class="checkbox checkbox-switchery switchery-xs" >
             <label>
                <input type="checkbox" checked=""  id="a<?php echo $n; ?>"  class="switchery">
                <input type="hidden" name="chki[]" id="chki<?php echo $n;?>" value="Y">
                  <input type="hidden" name="priidi[]" value="<?php echo $u->pri_id; ?>">
              </label>
            </div>
          </td>
          <td id="smatcode<?php echo $n; ?>" width="10%"  style="width: 200px;"><div class='input-group'><input type="text" class="form-control" name="matidi[]" id="matcodei<?php echo $n;?>" required  value="<?php echo $u->pri_matcode; ?>" readonly/></div></td>

          <td id="smatname<?php echo $n; ?>" style="width: 250px;"><input type="text" class="form-control" name="matnamei[]" id="matnametext<?php echo $n;?>" value="<?php echo $u->pri_matname; ?>" readonly/></td>  
          <td id="scostname<?php echo $n; ?>"  style="width: 200px;"><input class="form-control" type="text" name="costnamei[]" id="costnamei<?php echo $n;?>" value="<?php echo $u->pri_costname; ?>" readonly/></td>
          <td id="scostcode<?php echo $n; ?>"  style="width: 200px;"><input class="form-control" type="text" name="costidi[]" id="costcodei" value="<?php echo $u->pri_costcode; ?>" readonly/></td>
          <td id="sqtyi<?php echo $n; ?>"  style="width: 100px;"><input type="text" class="form-control" name="qtyi[]" value="<?php echo $u->pri_qty; ?>" readonly/></td>
          <td id="sunit<?php echo $n; ?>"  style="width: 100px;"><input type="text" class="form-control" name="uniti[]" value="<?php echo $u->pri_unit; ?>" readonly/><input class="form-control text-center" type="hidden" name="remarki[]" id="sremark<?php echo $n; ?>" value="<?php echo $u->pri_remark; ?>"></td>
         
          <td id="snetamt<?php echo $n; ?>"  style="width: 100px;" class="countable"><?php echo $u->pri_netamt; ?> 

          </td>

          <td>
            
                            <a data-toggle="modal" data-target="#edit<?php echo $n;?>" data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></a>
                            <a id="remove<?php echo $n; ?>" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>
                            <!-- <li><a href="#" data-popup="tooltip" title="Options"><i class="icon-cog7"></i></a></li> -->
                         
          </td>

        </tr>



                              <?php $n++; } ?>
          <?php $n=1;  foreach ($res as $u) {?>               
                  <script >
      $(document).on('click', 'a#remove<?php echo $n;?>', function () { // <-- changes


    // Initialize

        var self = $(this);
        noty({
            width: 200,
            text: "Do you want to Delete?",
            type: self.data('type'),
            dismissQueue: true,
            timeout: 1000,
            layout: self.data('layout'),
            buttons: (self.data('type') != 'confirm') ? false : [
                {
                    addClass: 'btn btn-primary btn-xs',
                    text: 'Ok',
                    onClick: function ($noty) { //this = button element, $noty = $noty element
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
                    onClick: function ($noty) {
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
     <?php $n++; } ?>
   
                   
   </tbody>
      <tr>
                        <th colspan="7" style="text-align: center;" width="10%">Total</th>
                        <th><a id="allprice" class="btn btn-primary btn-block btn-xs">คำนวนราคา</a></th>
                        <th><input type="text" id="totalresue" name="" class="form-control" required="true" style="width: 100px;"></th>
                        
                        <th></th>
                      </tr>
                         </table>
                        </div>
                        </div>
          <script>
   $('#allprice').click(function(){
    var cls = document.getElementById("res").getElementsByTagName("td");
    var sum = 0;
    for (var i = 0; i < cls.length; i++){
        if(cls[i].className == "countable"){
            sum += isNaN(cls[i].innerHTML) ? 0 : parseInt(cls[i].innerHTML);
        }
    }
     $("#totalresue").val(numberWithCommas(sum)); 
     $("#contactamount").val(numberWithCommas(sum));  
     });


</script>            
                      <?php $n=1;  foreach ($res as $u) {?>
                        <script>
      $("#a<?php echo $n; ?>").click(function(){
        if ($("#a<?php echo $n; ?>").prop("checked")) {
            $("#chki<?php echo $n;?>").val("Y");
        }else{
            $("#chki<?php echo $n;?>").val("");
        }

      });
    </script>


            <div id="edit<?php echo $n; ?>" class="modal fade" data-backdrop="false">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Edit <?php echo $u->pri_matname;?></h5>
                  </div>

                  <div class="modal-body">

          <div class="row">
              <div class="col-xs-6">
                <label for="">รายการซื้อ</label>

                              <div class="input-group" id="error<?php echo $n;?>">
                              <span class="input-group-addon">
                                <input type="checkbox" id="chk" aria-label="กำหนดเอง">
                              </span>
                                <input type="text" id="newmatname<?php echo $n; ?>"  placeholder="เลือกรายการซื้อ" class="form-control input-sm" value="<?php echo $u->pri_matname; ?>">
                                <input type="text" id="newmatcode<?php echo $n; ?>"  placeholder="เลือกรายการซื้อ" class="form-control input-sm" value="<?php echo $u->pri_matcode; ?>" disabled>
                                  <span class="input-group-btn" >
                                   
                                    <a href="<?php echo base_url(); ?>data_master/newmatcode" target="_blank" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> เพิ่ม</a>
                                    <a class="openun<?php echo $n;?> btn btn-primary btn-sm" data-toggle="modal" data-target="#opnewmat<?php echo $n;?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                                  </span>
                              </div>
              </div>
              <div class="col-xs-6">
                            <label for="">รายการต้นทุน</label>
                              <div class="input-group">
                                <input type="text" id="costnameint<?php echo $n; ?>" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm" value="<?php echo $u->pri_costname; ?>">
                                <input type="text" id="codecostcodeint<?php echo $n; ?>" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm" value="<?php echo $u->pri_costcode; ?>">
                                  <span class="input-group-btn" >
                                    <a class="costcode<?php echo $n;?> btn btn-primary btn-sm" data-toggle="modal" data-target="#costcode<?php echo $n;?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                                  </span>
                              </div>
                            </div>
          </div>
          <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                          <label for="qty">ปริมาณ</label>
                          <input type="text" id="pqty<?php echo $n; ?>" name="qty"  placeholder="กรอกปริมาณ" class="form-control" value="<?php echo $u->pri_qty; ?>">
                </div>
              </div>
              <div class="col-xs-6">
                                <div class="input-group">
                                  <label for="unit">หน่วย</label>
                                  <input type="text" id="punit<?php echo $n; ?>" name="punit" readonly="true" placeholder="กรอกหน่วย" class="form-control input-sm" value="<?php echo $u->pri_unit; ?>">
                                <span class="input-group-btn" >
                                  <a class="unit<?php echo $n;?> btn btn-primary btn-sm" data-toggle="modal" data-target="#openunit<?php echo $n;?>" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                                </span>
                              </div>
                            </div>
          </div>
          <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                          <label for="qty">แปลงค่า IC</label>
                          <input type="text" id="cpqtyic<?php echo $n; ?>" name="qtyic"  placeholder="กรอกปริมาณ IC" class="form-control" value="1">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                          <label for="qty">ปริมาณ IC</label>
                          <input type="text" id="pqtyic<?php echo $n; ?>" name="qtyic"  placeholder="กรอกปริมาณ IC" class="form-control" value="<?php echo $u->pri_qty; ?>">
                </div>
              </div>
              <div class="col-xs-6">
                                <div class="input-group">
                                  <label for="unit">หน่วย IC</label>
                                  <input type="text" id="punitic<?php echo $n; ?>" name="punitic" readonly="true" placeholder="กรอกหน่วย" class="form-control input-sm" value="<?php echo $u->pri_unit; ?>">
                                <span class="input-group-btn" >
                                  <a class="unitic<?php echo $n;?> btn btn-primary btn-sm" data-toggle="modal" data-target="#openunitic<?php echo $n;?>" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                                </span>
                              </div>
                            </div>
          </div>
           <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                          <label for="price_unit">ราคา/หน่วย</label>
                          <input type="text" id="pprice_unit<?php echo $n; ?>"  name="price_unit" placeholder="กรอกราคา/หน่วย" class="form-control" value="<?php echo $u->pri_priceunit; ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                          <label for="amount">จำนวนเงิน</label>
                          <input type="text" id="pamount<?php echo $n; ?>" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="form-control" value="<?php echo $u->pri_amount; ?>">
                </div>
              </div>
          </div>
           <div class="row">
                <div class="col-md-6">
                  <div class="form-group">

                     <label for="endtproject">ส่วนลด 1 (%)</label>
                     <input type='text' id="pdiscper1<?php echo $n; ?>" name="discountper1" placeholder="กรอกส่วนลด" class="form-control" value="<?php echo $u->pri_discountper1; ?>" />
                  </div>
                </div>
                    <div class="col-md-6">
                      <div class="form-group">
                         <label for="endtproject">ส่วนลด 2 (%)</label>
                         <input type='text' id="pdiscper2<?php echo $n; ?>" name="discountper2" placeholder="กรอกส่วนลด" class="form-control" value="<?php echo $u->pri_discountper2; ?>" />
                      </div>
                    </div>
          </div>
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                   <label for="endtproject">ส่วนลดพิเศษ</label>
                   <input type='text' id="pdiscex<?php echo $n; ?>" name="discountper2" class="form-control" value="<?php echo $u->pri_disamt; ?>"/>
                  </div>
              </div>
              <div class="col-md-4">
                    <div class="form-group">
                     <label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>
                     <input type='text' id="pdisamt<?php echo $n; ?>" name="disamt" class="form-control" value=""/>
                     <input type="hidden" id="pvat<?php echo $n; ?>" value="0">
                    </div>
              </div>
              <div class="col-md-2">
          <div class="form-group">
              <a id="chkprice<?php echo $n; ?>" class="btn btn-primary"style="margin-top:25px;">ดูราคา</a>
          </div>
        </div>
            </div>
            <div class="row">
                 <div class="col-md-4">
                  <div class="form-group">
                     <label for="endtproject">จำนวนเงินสุทธิ</label>

                     <input type='text' id="pnetamt<?php echo $n; ?>" name="pnetamt" class="form-control" value="<?php echo $u->pri_netamt; ?>"/>
                   </div>
                  </div>
          
            <div class="col-md-8">
                  <div class="form-group">
                     <label for="endtproject">หมายเหตุ</label>

                     <input type='text' id="premark<?php echo $n; ?>" name="remark" class="form-control" value="<?php echo $u->pri_remark; ?>"/>
                  </div>
            </div>
          </div>

           <div class="row">
              <div class="col-md-6">
                    <input type="hidden" name="poid" value="">

              </div>
          </div>
                  </div>
                  <div class="modal-footer">
                    <a id="insertpodetail<?php echo $n; ?>" data-dismiss="modal"   class="btn btn-primary">ยืนยันการเพิ่มข้อมูล</a>
                    <a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
                    <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
                  </div>
                </div>
              </div>
            </div>


<script>



 $('#edit<?php echo $n; ?>').click(function(event) {
  
  $('#saved').removeClass('disabled');
  
});



            $("#cpqtyic<?php echo $n; ?>").keyup(function(){
              var qtyx = $("#pqty<?php echo $n; ?>").val()*$("#cpqtyic<?php echo $n; ?>").val();
              $("#pqtyic<?php echo $n; ?>").val(qtyx);

            });
              $('#chkprice<?php echo $n; ?>').click(function(){
                var xqty = parseFloat($('#pqty<?php echo $n; ?>').val());
                var xprice = parseFloat($('#pprice_unit<?php echo $n; ?>').val());
                var xamount = xqty*xprice;
                var xdiscper1 = parseFloat($('#pdiscper1<?php echo $n; ?>').val());
                var xdiscper2 = parseFloat($('#pdiscper2<?php echo $n; ?>').val());
                var xdiscper3 = parseFloat($('#pdiscex<?php echo $n; ?>').val());
                var xpd1 = xamount - (xamount*xdiscper1)/100;
                var xpd2 = xpd1 - (xpd1*xdiscper2)/100;
                var xpd3 = xpd2 - (xpd1*xdiscper3)/100;
                var xvat = parseFloat($('#pvat<?php echo $n; ?>').val());   


                $('#pamount<?php echo $n; ?>').val(xamount);

                if(xdiscper3 != 0){
                  vxpd3 = xpd2-xdiscper3;
                    $('#pdisamt<?php echo $n; ?>').val(vxpd3);

                    $('#pnetamt<?php echo $n; ?>').val(vxpd3);
                  }
                else if(xdiscper2 != 0){

                         $('#pdisamt<?php echo $n; ?>').val(xpd2);
                         vxpd2 = xpd2 - (xpd2*xvat)/100;
                         $('#pnetamt<?php echo $n; ?>').val(vxpd2);
                }
                else
                {
                $('#pdisamt<?php echo $n; ?>').val(xpd1);
                    vxpd1 = xpd1 - (xpd1*xvat)/100;
                    $('#pnetamt<?php echo $n; ?>').val(vxpd1);
                }
              });
                            $("#insertpodetail<?php echo $n; ?>").click(function(){
                if ($("#newmatcode<?php echo $n; ?>").val()!="") {

                  $("#smatcode<?php echo $n; ?>").html("<div class='input-group'><input type='text' class='form-control' name='matidi[]' id='matidi' required  value="+$("#newmatcode<?php echo $n; ?>").val()+" readonly='true'></div>");


                  $("#smatname<?php echo $n; ?>").html("<div class='input-group'><input type='text' class='form-control' name='matnamei[]' value='"+$('#newmatname<?php echo $n; ?>').val()+"' readonly='true'></div>");

                  $("#scostname<?php echo $n; ?>").html("<div class='input-group'><input type='text' class='form-control' name='costidi[]' id='costidi' required  value="+$("#codecostcodeint<?php echo $n; ?>").val()+" readonly='true'></div>");

                  $("#scostcode<?php echo $n; ?>").html("<div class='input-group'><input type='text' class='form-control' name='costnamei[]' id='costnamei' required  value="+$("#costnameint<?php echo $n; ?>").val()+" readonly='true'></div>");

                  $("#sqtyi<?php echo $n; ?>").html("<div class='input-group'><input type='text' class='form-control' name='qtyi[]' id='qtyi' required  value="+$("#pqty<?php echo $n; ?>").val()+" readonly='true'></div>");

                  $("#sunit<?php echo $n; ?>").html("<div class='input-group'><input type='text' class='form-control' name='uniti[]' id='uniti' required  value="+$("#punit<?php echo $n; ?>").val()+" readonly='true'><input type='hidden' class='form-control' name='amounti[]' id='amounti' required  value="+$("#pnetamt<?php echo $n; ?>").val()+" readonly='true'></div>");

                  $("#snetamt<?php echo $n; ?>").html(''+$("#pnetamt<?php echo $n; ?>").val()+'');

                }else{
                  swal({
                      title: "Please Chack!",
                      text: "Material Code Not Found",
                      confirmButtonColor: "#2196F3"
                  });
                   $("#error<?php echo $n;?>").attr("class", "input-group has-error has-feedback");
                  $("#newmatname<?php echo $n;?>").focus();
                }
              });
              $('#chk<?php echo $n; ?>').click(function(event) {
                if($('#chk<?php echo $n; ?>').prop('checked')) {
                 $('#newmatname<?php echo $n; ?>').prop('disabled', false);
              } else {
                  $('#newmatname<?php echo $n; ?>').prop('disabled', true);
              }
              });
            </script>

             <div class="modal fade" id="insertmatnew<?php echo $n;?>" data-backdrop="false">
              <div class="modal-dialog modal-full">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">New Material</h4>
                  </div>
                    <div class="modal-body">
                    <div class="panel-body">
                        <div class="row" id="modal_newmat<?php echo $n;?>">

                        </div>
                        </div>
                    </div>
                </div>
              </div>
            </div> <!--end modal -->
            <script>
          
              $(".insertnewmat<?php echo $n;?>").click(function(){
                // $("#modal_newmat<?php echo $n;?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                // $("#modal_newmat<?php echo $n;?>").load('<?php echo base_url(); ?>share/material/<?php echo $n; ?>');
                $("#modal_newmat<?php echo $n;?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
               $("#modal_newmat<?php echo $n;?>").load('<?php echo base_url(); ?>share/getmatcode_new');
              });
            </script>
            <div id="opnewmat<?php echo $n;?>" class="modal fade">
            <div class="modal-dialog modal-full">
              <div class="modal-content ">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">เพิ่มรายการ</h5>
                </div>
                  <div class="modal-body">
                      <div class="row" id="modal_mat<?php echo $n;?>"></div>

                  </div>
              </div>
            </div>
            </div>
            <script>
            $(".openun<?php echo $n;?>").click(function(){
               $('#modal_mat<?php echo $n;?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
               $("#modal_mat<?php echo $n;?>").load('<?php echo base_url(); ?>index.php/share/getmatcode/<?php echo $n; ?>');
             });
            </script>
            <!-- costcode -->
            <div class="modal fade" id="costcode<?php echo $n;?>" data-backdrop="false">
            <div class="modal-dialog modal-full">
              <div class="modal-content">
                <div class="modal-header bg-info">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
                </div>
                  <div class="modal-body">
                      <div id="modal_cost<?php echo $n;?>"></div>
                  </div>
              </div>
            </div>
          </div><!-- end modal matcode and costcode -->
          <script>
          $(".costcode<?php echo $n;?>").click(function(){
           $('#modal_cost<?php echo $n;?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
           $("#modal_cost<?php echo $n;?>").load('<?php echo base_url(); ?>index.php/share/costcode_id/<?php echo $n; ?>');
         });
          </script>
          <!-- costcode -->
          <div class="modal fade" id="openunit<?php echo $n;?>" data-backdrop="false">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">หน่วย</h4>
              </div>
                <div class="modal-body">
                    <div id="modal_unit<?php echo $n;?>"></div>
                </div>
            </div>
          </div>
        </div><!-- end modal matcode and costcode -->
        <script>
        $(".unit<?php echo $n;?>").click(function(){
         $('#modal_unit<?php echo $n;?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
         $("#modal_unit<?php echo $n;?>").load('<?php echo base_url(); ?>index.php/share/unitid/<?php echo $n; ?>');
       });
        </script>
        <div class="modal fade" id="openunitic<?php echo $n;?>" data-backdrop="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">หน่วย</h4>
            </div>
              <div class="modal-body">
                  <div id="modal_unitic<?php echo $n;?>"></div>
              </div>
          </div>
        </div>
      </div><!-- end modal matcode and costcode -->
      <script>
      $(".unitic<?php echo $n;?>").click(function(){
       $('#modal_unitic<?php echo $n;?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#modal_unitic<?php echo $n;?>").load('<?php echo base_url(); ?>index.php/share/unitid2/<?php echo $n; ?>');
     });
      </script>

             <?php $n++; } ?>

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
