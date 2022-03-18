<div class="table-responsive">
                              <table class="table table-xxs">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Matterail Code</th>
                                    <th>Materail Name</th>
                                    <th>Qty</th>
                                    <th>Unit</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>

                                <tbody id="body">
                                  <?php $n=1; foreach ($resi as $vai) {?>
                                    <tr>
                                       <td><?php echo $n; ?></td>
                                       <td><?php echo $vai->pri_matcode; ?><input type="hidden" name="matcodei[]" value="<?php echo $vai->pri_matcode; ?>" /></td>
                                       <td><?php echo $vai->pri_matname; ?><input type="hidden" name="matnamei[]" value="<?php echo $vai->pri_matname; ?>" /></td>
                                       <td><?php echo $vai->pri_qty; ?><input type="hidden" name="qtyi[]" value="<?php echo $vai->pri_qty; ?>" /></td>
                                       <td><?php echo $vai->pri_unit; ?><input type="hidden" name="uniti[]" value="<?php echo $vai->pri_unit; ?>" /></td>
                                       <td class="hidden-center">
                                          <ul class="icons-list">
                                           <li><a data-popup="tooltip" data-toggle="modal" data-target="#edit_modal<?php echo $vai->pri_id;?>" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>
                                          <li><a id="delete<?php echo $vai->pri_id;?>" class="preload" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-trash"></i></a></li>
                                        </ul>
                                        <input type="hidden" name="costcodei[]" value="<?php echo $vai->pri_costcode; ?>" />
                                        <input type="hidden" name="costnamei[]" value="<?php echo $vai->pri_costname; ?>" />
                                      </td>
                                    </tr>

                                    <div id="edit_modal<?php echo $vai->pri_id;?>" class="modal fade">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content ">
                                        <div class="modal-header bg-info">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h5 class="modal-title">Edit Item: <?php echo $vai->pri_id;?> - <?php echo $vai->pri_matname; ?></h5>
                                        </div>

                                        <div class="modal-body">
                                                <div class="row">
                                                  <div class="col-xs-6">
                                                  <label for="">รายการซื้อ</label>
                                                    <div class="input-group">
                                                    <span class="input-group-addon">
                                                      <input type="checkbox" id="chk" aria-label="กำหนดเอง">
                                                    </span>
                                                      <input type="text" id="newmatname<?php echo $vai->pri_id;?>" disabled="true" placeholder="เลือกรายการซื้อ" class="form-control input-sm" value="<?php echo $vai->pri_matname; ?>">
                                                      <input type="hidden" id="newmatcode<?php echo $vai->pri_id;?>"  placeholder="เลือกรายการซื้อ" class="form-control input-sm" value="<?php echo $vai->pri_matcode; ?>">
                                                        <span class="input-group-btn" >
                                                          <button class="openun btn btn-info btn-sm" data-toggle="modal" data-target="#opnewmat<?php echo $vai->pri_id;?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                                    </div>
                                                  </div>
                                                  <div class="col-xs-6">
                                                    <label for="">รายการต้นทุน</label>
                                                      <div class="input-group">
                                                        <input type="text" id="costname<?php echo $vai->pri_id;?>" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm" value="<?php echo $vai->pri_costname; ?>">
                                                        <input type="hidden" id="codecostcode<?php echo $vai->pri_id;?>" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm" value="<?php echo $vai->pri_costcode; ?>">
                                                          <span class="input-group-btn" >
                                                            <button class="btn btn-info btn-sm" id="selectcostcode<?php echo $vai->pri_id;?>" data-toggle="modal" data-target="#costcode<?php echo $vai->pri_id;?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                                          </span>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-xs-6">
                                                      <div class="form-group">
                                                                <label for="qty">ปริมาณ</label>
                                                                <input type="text" id="qtyf<?php echo $vai->pri_id;?>" placeholder="กรอกปริมาณ" class="form-control"  value="<?php echo $vai->pri_qty; ?>">
                                                      </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="input-group">
                                                          <label for="unit">หน่วย</label>
                                                          <input type="text" id="unit<?php echo $vai->pri_id;?>" readonly="true" placeholder="กรอกหน่วย" class="form-control input-sm" value="<?php echo $vai->pri_unit; ?>">
                                                        <span class="input-group-btn" >
                                                          <button class="openun btn btn-info btn-sm" data-toggle="modal" data-target="#openunit<?php echo $vai->pri_id;?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                                        </span>
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                 <div class="col-xs-12">
                                                      <div class="form-group">
                                                         <label for="endtproject">หมายเหตุ</label>

                                                             <textarea rows="4" cols="50" type="text" id="remarkite<?php echo $vai->pri_id;?>" class="form-control" ><?php echo $vai->pri_remark; ?></textarea>

                                                    </div>
                                                      </div>
                                                 </div>
                                        </div>

                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                          <button type="button"  id="edittorow<?php echo $vai->pri_id;?>" class="boxmessage btn btn-info">Edit Row</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>


                                    <script>
                                    $(document).on('click', '#delete<?php echo $vai->pri_id;?>', function () { // <-- changes
                                          var url="<?php echo base_url(); ?>index.php/office/delprdetail/<?php echo $vai->pri_ref;?>";
                                            var dataSet={
                                              id: <?php echo $vai->pri_id;?>
                                              };
                                              $.post(url,dataSet,function(data){

                                               setTimeout(function() {
                                                 window.location.href = "<?php echo base_url(); ?>index.php/pr/editpr/"+data;
                                                }, 1000);

                                              });
                                        });

                                    </script>
                                    <script>

                                               $('#edittorow<?php echo $vai->pri_id;?>').click(function(event) {
                                                var url="<?php echo base_url(); ?>index.php/pr_active/edt_prdetail/<?php echo $vai->pri_id;?>";
                                                var dataSet={
                                                  id: <?php echo $vai->pri_id;?>,
                                                  ref: "<?php echo $vai->pri_ref; ?>",
                                                  matcode: $("#newmatcode<?php echo $vai->pri_id;?>").val(),
                                                  matname: $('#newmatname<?php echo $vai->pri_id;?>').val(),
                                                  qty: $("#qtyf<?php echo $vai->pri_id;?>").val(),
                                                  unit: $("#unit<?php echo $vai->pri_id;?>").val(),
                                                  remark: $("#remarkite<?php echo $vai->pri_id;?>").val()
                                                };
                                                $.post(url,dataSet,function(data){
                                                   setTimeout(function() {
                                                   window.location.href = "<?php echo base_url(); ?>index.php/pr/editpr/"+data;
                                                  }, 1000);
                                                });
                                              });
                                    </script>
                                  <?php $n++; } ?>
                                </tbody>
                              </table>
                            </div>



                            