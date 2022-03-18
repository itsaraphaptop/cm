
<div class="page-container">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Approve PR</h6>
                </div>
                
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h6><i class=" icon-file-empty"></i> Header</h6>
                        </div>
                        <div class="col-md-4 col-xs-offset-4">
                                <div class="text-right"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                PR.:  <?php echo $pr_no;?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                PR Date: <?=date('d/m/Y',strtotime($header[0]['pr_prdate']));?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                Name:  <?php echo $header[0]['pr_reqname'];?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                Project :<?=$header[0]['project_name'];?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                Place:  <?php echo $header[0]['pr_deliplace'];?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                Remark: <?=$header[0]['pr_remark'];?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h6><i class=" icon-file-empty"></i> Detail</h6>
                        </div>
                        <div class="col-md-4 col-xs-offset-4">
                                <div class="text-right"></div>
                        </div>
                    </div>
                    <hr>
                    <table class="table table-bordered table-striped table-xxs">
                          <thead>
                            <tr>
                              <th>No.</th>
                                          <th>รหัสต้นทุน</th>
                                          <th>ชื่อวัสดุ</th>
                                          <th>จำนวน</th>
                                         </tr>
                                      </thead>
                                      <tbody>
                                        <?php   $n =1;?>

                                          <?php
                                          $this->db->select('*');
                                          $this->db->where('pri_ref', $pr_no);
                                          $q =  $this->db->get('pr_item');
                                          $res = $q->result();
                                          foreach ($res as $valj){ ?>
                                        <tr>
                            <td><?php echo $n; ?></td>
                                         <td><?php echo substr($valj->pri_costcode, -5); ?></td>
                                          <td><?php echo $valj->pri_matname; ?></td>
                                           <td><?php echo $valj->pri_qty; ?>&nbsp;<?php echo $valj->pri_unit; ?></td>
                                         </tr>
                                          <?php $n++; } ?>
                                                                         
                                                                                </tbody>
                        </table>
                        <div class="modal-footer">
                        <?php foreach ($qpj as $approve) {?>
                        <?php echo $approve->app_sequence;?>
                            <?php if ($approve->app_midid$approve->app_sequence=="1" && $approve->status =="no") {?>
                                <a type="submit" href="<?php echo base_url(); ?>index.php/office/approve_pj_pr_line/<?php echo $approve->app_id; ?>/<?php echo $approve->app_pr; ?>/<?php echo $approve->app_project; ?>/<?php echo $approve->app_sequence; ?>/<?php echo $approve->app_project; ?>" class="btn bg-success-600">Approve 1</a>
                            <?php }else if($approve->app_midid$approve->app_sequence=="2" && $approve->status =="no"){ ?>
                                <a type="submit" href="<?php echo base_url(); ?>index.php/office/approve_pj_pr_line/<?php echo $approve->app_id; ?>/<?php echo $approve->app_pr; ?>/<?php echo $approve->app_project; ?>/<?php echo $approve->app_sequence; ?>/<?php echo $approve->app_project; ?>" class="btn bg-success-600">Approve 2</a>
                          
                            <?php }else if($approve->app_midid$approve->app_sequence=="3" && $approve->status =="no"){ ?>
                                <a type="submit" href="<?php echo base_url(); ?>index.php/office/approve_pj_pr_line/<?php echo $approve->app_id; ?>/<?php echo $approve->app_pr; ?>/<?php echo $approve->app_project; ?>/<?php echo $approve->app_sequence; ?>/<?php echo $approve->app_project; ?>" class="btn bg-success-600">Approve 3</a>
                            <?php }?>
                        <?php } ?>
                </div>
                </div>
            </div>
</div>