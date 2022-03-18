
<table class="table table-hover table-bordered table-striped table-xxs">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th width="5%" class="text-center">Select</th>
                        <th>Material Codexxx</th>
                        <th>Material</th>
                        <th>Cost Code</th>
                        <th>Cost Name</th>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>Price/Unit</th>
                        <th>Amount</th>
                        <th>Disc.1(%)</th>
                        <th>Disc.2(%)</th>
                        <th>Disc.Amt</th>
                        <th>Total</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="body">
<?php $n=1; foreach ($res as $u) {?>
        <tr id="<?php echo $n; ?>">
          <td><?php echo $n; ?></td>
          <td>
            <div class="checkbox checkbox-switchery switchery-xs">
             <label>
                <input type="checkbox"  id="a<?php echo $n; ?>"  class="switchery">
                <input type="hidden" name="chki[]" id="chki<?php echo $n;?>">
                  <input type="hidden" name="priidi[]" value="<?php echo $u->pri_id; ?>">
              </label>
            </div>
          </td>
          <td id="smatcode<?php echo $n; ?>" width="10%"><div class='input-group'><input type="text" class="form-control" name="matcodei[]" id="matcodei" required  value="<?php echo $u->pri_matcode; ?>"></div></td>
          <td id="smatname<?php echo $n; ?>"><?php if ($u->pri_matcode=="") { echo "<a class='editable editable-click editable-unsaved editable-empty'>$u->pri_matname</a>"; }else{echo "<small class='text-success'>$u->pri_matname</small>";}?><input type="hidden" name="matnamei[]" id="matnametext<?php echo $n;?>" value="<?php echo $u->pri_matname; ?>"></td>
          <td id="scostcode<?php echo $n; ?>"><?php echo $u->pri_costcode; ?><input type="hidden" name="costcodei[]" value="<?php echo $u->pri_costcode; ?>"></td>
          <td id="scostname<?php echo $n; ?>"><?php echo $u->pri_costname; ?><input type="hidden" name="costnamei[]" value="<?php echo $u->pri_costname; ?>"></td>
          <td id="sqtyi<?php echo $n; ?>"><?php echo number_format($u->pri_qty,2); ?><input type="hidden" name="qtyi[]" value="<?php echo $u->pri_qty; ?>"></td>
          <td id="sunit<?php echo $n; ?>"><?php echo $u->pri_unit; ?><input type="hidden" name="uniti[]" value="<?php echo $u->pri_unit; ?>"></td>
          <td id="spriceunit<?php echo $n; ?>"><?php echo number_format($u->pri_priceunit,2); ?><input type="hidden" name="priceuniti[]" value="<?php echo $u->pri_priceunit; ?>"></td>
          <td id="samount<?php echo $n; ?>"><?php echo number_format($u->pri_amount,2); ?><input type="hidden" name="amounti[]" value="<?php echo $u->pri_amount; ?>"></td>
          <td id="sdisone<?php echo $n; ?>"><?php echo number_format($u->pri_discountper1,2); ?><input type="hidden" name="disci1[]" value="<?php echo $u->pri_discountper1; ?>"></td>
          <td id="sdistwo<?php echo $n; ?>"><?php echo number_format($u->pri_discountper2,2); ?><input type="hidden" name="disci2[]" value="<?php echo $u->pri_discountper2; ?>"></td>
          <td id="sdisamt<?php echo $n; ?>"><?php echo number_format($u->pri_disamt,2); ?><input type="hidden" name="disamti[]" value="<?php echo $u->pri_disamt; ?>"></td>
          <td id="snetamt<?php echo $n; ?>"><?php echo number_format($u->pri_netamt,2); ?><input type="hidden" name="netamti[]" value="<?php echo $u->pri_netamt; ?>">
              <input type="hidden" name="remarki[]" id="sremark<?php echo $n; ?>" value="<?php echo $u->pri_remark; ?>">
          </td>

          <td>
            <ul class="icons-list">
    												<li><a data-toggle="modal" data-target="#edit<?php echo $n;?>" data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></a></li>
    												<li><a data-popup="tooltip" id="remove<?php echo $n ?>" title="Remove"><i class="icon-trash"></i></a></li>
    												<!-- <li><a href="#" data-popup="tooltip" title="Options"><i class="icon-cog7"></i></a></li> -->
    											</ul>
          </td>

        </tr>
        <script>
        $('#remove<?php echo $n ?>').on('click', function(){
          var row = ($('#body tr').length-0)-1;
        	$(this).closest('tr').remove();

          if (row==0) {
            rowadd();
          }

        });

        function rowadd()
        {
          var tr = '<tr>'+
          '<td colspan="13" class="text-center">No Data</td>'
          '</tr>';
          $('#body').append(tr);
        }

        </script>
    <script>
      $("#a<?php echo $n; ?>").click(function(){
        if ($("#a<?php echo $n; ?>").prop("checked")) {
            $("#chki<?php echo $n;?>").val("Y");
        }else{
            $("#chki<?php echo $n;?>").val("");
        }

      });
    </script>

 <!-- Full width modal -->
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
                                    <!-- <a class="insertnewmat<?php echo $n;?> btn btn-primary btn-sm" data-toggle="modal" data-target="#insertmatnew<?php echo $n;?>"><span class="glyphicon glyphicon-plus"></span> เพิ่ม</a> -->
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

                     <input type='text' id="pnetamt<?php echo $n; ?>" name="netamt" class="form-control" value="<?php echo $u->pri_netamt; ?>"/>
                   </div>
                  </div>
            </div>
          <div class="row">
            <div class="col-md-12">
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
            <!-- /full width modal -->
            <script>
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
                  // $("#edit<?php echo $n; ?>").modal('toggle');
                  $("#smatcode<?php echo $n; ?>").html("<div class='input-group'><input type='text' class='form-control' name='matcodei[]' id='matcodei' required  value="+$("#newmatcode<?php echo $n; ?>").val()+"><span class='input-group-btn'><a data-toggle='modal' data-target='#edit<?php echo $n;?>' class='btn btn-default btn-icon'><i class='icon-search4'></i></a></span></div>");
                  // $("#smatname<?php echo $n; ?>").html('<input type="text" name="matnamei[]" value='+$('#newmatname<?php echo $n; ?>').val()+'>');
                  $("#matnametext<?php echo $n;?>").val($('#newmatname<?php echo $n; ?>').val());
                  $("#scostcode<?php echo $n; ?>").html('<a class="editable editable-clicks">'+$("#codecostcodeint<?php echo $n; ?>").val()+'</a>');
                  $("#scostname<?php echo $n; ?>").html('<a class="editable editable-clicks">'+$("#costnameint<?php echo $n; ?>").val()+'</a><input type="hidden" name="costcodei[]" value='+$("#codecostcodeint<?php echo $n; ?>").val()+'><input type="hidden" name="costnamei[]" value='+$("#costnameint<?php echo $n; ?>").val()+'>');
                  $("#sqtyi<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#pqty<?php echo $n; ?>").val()+"</a><input type='hidden' name='qtyi[]' value="+$("#pqty<?php echo $n; ?>").val()+">");
                  $("#spriceunit<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#pprice_unit<?php echo $n; ?>").val()+"</a><input type='hidden' name='priceuniti[]' value="+$("#pprice_unit<?php echo $n; ?>").val()+">");
                  $("#sunit<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#punit<?php echo $n; ?>").val()+"</a><input type='hidden' name='uniti[]' value="+$("#punit<?php echo $n; ?>").val()+">");
                  $("#samount<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#pamount<?php echo $n; ?>").val()+"</a><input type='hidden' name='amounti[]' value="+$("#pamount<?php echo $n; ?>").val()+">");
                  $("#sdisone<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#pdiscper1<?php echo $n; ?>").val()+"</a><input type='hidden' name='disci1[]' value="+$("#pdiscper1<?php echo $n; ?>").val()+">");
                  $("#sdistwo<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#pdiscper2<?php echo $n; ?>").val()+"</a><input type='hidden' name='disci2[]' value="+$("#pdiscper2<?php echo $n; ?>").val()+">");
                  $("#sdisamt<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#pdiscex<?php echo $n; ?>").val()+"</a><input type='hidden' name='disamti[]' value="+$("#pdiscex<?php echo $n; ?>").val()+">");
                  $("#snetamt<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#pnetamt<?php echo $n; ?>").val()+"</a><input type='hidden' name='netamti[]' value="+$("#pnetamt<?php echo $n; ?>").val()+"><input type='hidden' name='reamrki[]' value="+$("#premark<?php echo $n; ?>").val()+">");
                  	// $("#edit<?php echo $n; ?> .close").click()
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

            <!-- modal  แผนก-->
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
