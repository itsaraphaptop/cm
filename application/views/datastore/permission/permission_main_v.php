<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">      
        
        <div class="content">
                <div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title"><i class="icon-cog3 position-left"></i> User Permission</h6>
	               <div style="text-align: right;"><a href="<?php echo base_url(); ?>data_master" type="button" class="btn bg-danger" name="button"><i class="icon-close2"></i> Close</a>
                 </div>
								<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
                </div>

								<div class="panel-body">
                  <!--   <a href="<?php echo base_url(); ?>index.php/data_master/master_permission"  class="btn btn-primary pull-right " \>Setup Master Permission</a> -->
								

                <table class="table table-striped table-xs table-hover datatable-basic">
                  <thead>
                    <tr>
                      <th width="5%">No.</th>
                      <th width="15%">Picture</th>
                      <th width="20%">Employee Name</th>
                      <th width="20%">Username</th>
                      <th>Date Login</th>
                      <th width="20%">Active</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php $i = 1;foreach ($getmember as $val) {
	?>
                  <tr>
                    <th><?php echo $i; ?></th>
                    <td><img style="width: 20%;" src="<?php echo base_url(); ?>profile/<?php echo $val->uimg; ?>" class="thumb thumb-rounded thumb-slide" /></td>
                    <td><?php echo $val->m_name; ?></td>
                    <td><?php echo $val->m_user; ?></td>
                    <td><?php echo date("d/m/Y H:i:s",strtotime($val->m_login)); ?></td>
                    <td>
                      <a title="Site IC" data-toggle="modal" data-target="#mid<?php echo $val->m_id; ?>"><i class="icon-home7"></i> </a>
                      <!-- <a title="Menu" href="<?php echo base_url(); ?>datastore/permission" ><i class="icon-menu2"></i> </a> -->
                      <a title="IC Permission" data-toggle="modal" data-target="#ic_per<?php echo $val->m_id; ?>" id="data<?php echo $val->m_id; ?>"><i class="icon-user-check"></i> </a>
                      <a title="New setup permission" href="<?php echo base_url(); ?>new_permission/edit_permission/<?php echo $val->m_user; ?>" ><i class="icon-menu2"></i>  </a>
                    </td>
                  </tr>


                  <div id="ic_per<?php echo $val->m_id; ?>" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header bg-primary">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h5 class="modal-title">IC Permisstion : <?php echo $val->m_name; ?> - <?php echo $val->m_user; ?></h5>
                        </div>

                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-6">
                            <?php $qq = $this->db->query("select * from menu_right where m_user='$val->m_user'")->result();
                                foreach ($qq as $key => $vq) {
                                  if ($vq->ic_poamt_receipt == "true") {?>
                                 <input type="checkbox" checked id="ic_chk<?php echo $val->m_id; ?>">  PO Recieve Amount
                                 <input type="hidden" id="ic_amount<?php echo $val->m_id; ?>" name="ic_amount" value="true">
                              <?php } else {?>
                                  <input type="checkbox" id="ic_chk<?php echo $val->m_id; ?>">  PO Recieve Amount
                                  <input type="hidden" id="ic_amount<?php echo $val->m_id; ?>" name="ic_amount">
                                <?php }?>
                            <?php }?>

                            </div>
                          </div>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class=" btn bg-danger" data-dismiss="modal"><i class="icon-close2"></i> Close</button>
                        </div>

                      </div>
                    </div>
                </div>
                <script>
                  $("#ic_chk<?php echo $val->m_id; ?>").click(function(){
                      if($('#ic_chk<?php echo $val->m_id; ?>').prop('checked')) {
                         $('#ic_amount<?php echo $val->m_id; ?>').val("true");

                          var url="<?php echo base_url(); ?>permission/po_receive";
                          var dataSet={
                             id: "<?php echo $val->m_user; ?>",
                             chk: $("#ic_amount<?php echo $val->m_id; ?>").val(),
                            };
                          $.post(url,dataSet,function(data){
                            // $("#h").html(data);
                            // alert(data);
                          });
                      } else {
                          $('#ic_amount<?php echo $val->m_id; ?>').val("");

                      }


                  });
                </script>
                <?php $i++;}?>
              </tbody>
            </table>
            </div>
							</div>
            <!-- Footer -->
            <div class="footer text-muted">
             <!--  © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a> -->
            </div>
            <!-- /footer -->
        </div>
        </div>
        </div>
        </div>


<div class="loadmodal">
<?php foreach ($getmember as $value) {
	?>

        <div id="mid<?php echo $value->m_id; ?>" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Site Project : <?php echo $value->m_id; ?></h5>
              </div>

              <div class="modal-body">
                <?php 
                // $this->db->query("select company_id from company where com")
                  $mem = $this->db->query("select comp_status,comp_id from permission_company where m_user='$m_id'")->result_array();
                  if ($mem[0]['comp_status']=="Y") {
                        $comp = $this->db->query("select company_id,compcode,company_name from company")->result();
                        foreach ($comp as $key => $f) {
                      ?>

                      <?php  $mems = $this->db->query("select m_user as m_id, comp_status as pstatus, comp_id as pid from permission_company where m_user='$value->m_id' and comp_id='$f->company_id'")->result(); ?>
                                <?php   $n = 1; foreach ($mems as $key => $vv) {
                      ?>
                            <div>
                              <div class="checkbox checkbox-right checkbox-switchery switchery-xs">
                                <label class="display-block" style="margin-right:20px;">
                              
                                  <?php if ($vv->pstatus == "") {?>
                                      <input type="checkbox" class="switchery parent<?php echo $f->compcode;?>" id="sscomp<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>">
                                  <?php } else {?>
                                      <input type="checkbox" checked class="switchery parent<?php echo $f->compcode;?>" id="sscomp<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>">
                                  <?php }?>
                                  <b><?php echo $f->company_name;?></b>
                                </label>
                                <input type="text" name="name" id="txtvalcomp<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>" value="<?php echo $vv->pstatus; ?>">
                                <script>
                                $('#sscomp<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>').click(function(event) {
                                  if($('#sscomp<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>').prop('checked')) {
                                    $('#txtvalcomp<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>').val("Y");
                                    // $('.child5<?php echo $compcode;?>').val("Y");
                                  } else {
                                    $('#txtvalcomp<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>').val("");
                                  }
                                    $('.child<?php echo $f->compcode;?>').trigger('click');
                                  var url="<?php echo base_url(); ?>permission/update_company_permission";
                                  var dataSet={
                                    id: "<?php echo $value->m_id; ?>",
                                    comp_id: "<?php echo $vv->pid; ?>",
                                    status: $('#txtvalcomp<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>').val()
                                  };
                                  $.post(url,dataSet,function(data){
                                    //  callback
                                  });
                                  var url="<?php echo base_url(); ?>index.php/permission/updata_projecIc_by_company";
                                  var dataSet={
                                    id: "<?php echo $value->m_id; ?>",
                                    compcode: "<?php echo $f->compcode; ?>",
                                    status: $('#txtval<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>').val()
                                  };
                                  $.post(url,dataSet,function(data){
                                    //  callback
                                  });
                                });
                                </script>
                                
                              </div>
                            </div>
                            <?php $n++;} ?>
                      <?php 
                      $comp = $this->db->query("select compcode,company_name from company where compcode= '$f->compcode'")->result();
                      foreach ($comp as $key => $c) {
                        $this->db->select('project_name,project_ic.project_status as pstatus,m_id,project.project_id as pid');
                        $this->db->from('project');
                        $this->db->join('project_ic', 'project_ic.project_id = project.project_id');
                        $this->db->join('member', 'member.m_id = project_ic.proj_user');
                        $this->db->where('project.compcode',$c->compcode);
                        // $this->db->where('member.compcode',$c->compcode);
                        $this->db->where('proj_user', $value->m_id);
                        $qu = $this->db->get();
                        $res = $qu->result();
                      $n = 1;foreach ($res as $vv) {?>
                            <div style="margin-left: 20px;">
                              <div class="checkbox checkbox-right checkbox-switchery switchery-xs">
                                <label class="display-block">
                                sss
                                  <?php if ($vv->pstatus == "") {?>
                                      <input type="checkbox" class="switchery child<?php echo $f->compcode;?>" id="ss<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>">
                                  <?php } else {?>
                                      <input type="checkbox" checked class="switchery child<?php echo $f->compcode;?>" id="ss<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>">
                                  <?php }?>
                                  <?php echo $vv->project_name; ?>
                                </label>
                                <input type="text" name="name" class="child5<?php echo $f->compcode;?>" id="txtval<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>" value="<?php echo $vv->pstatus; ?>">
                                <!--<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>-->
                              </div>
                            </div>
                              <script>

                                  $('#ss<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>').click(function(event) {
                                    console.log("ddd");
                                  if($('#ss<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>').prop('checked')) {
                                    $('#txtval<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>').val("Y");
                                  } else {
                                    $('#txtval<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>').val("");
                                  }
                                  // $('.parent<?php echo $f->compcode;?>').trigger('click');
                                    var url="<?php echo base_url(); ?>index.php/permission/update_siteic_proj";
                                    var dataSet={
                                      id: "<?php echo $value->m_id; ?>",
                                      project_id: "<?php echo $vv->pid; ?>",
                                      status: $('#txtval<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>').val()
                                    };
                                    $.post(url,dataSet,function(data){
                                      //  callback
                                    });
                                  
                                });
                              </script>
                      <?php $n++;}}?>
                      <?php } ?>
                <?php  }else{
                   $comp = $this->db->query("select compcode,company_name from company where compcode = '$compcode'")->result();
                   foreach ($comp as $key => $f) {
                 ?>
                 <b><?php echo $f->company_name;?></b><br/><br>
                 <?php 
                 $comp = $this->db->query("select compcode,company_name from company where compcode= '$f->compcode'")->result();
                 foreach ($comp as $key => $c) {
                   $this->db->select('project_name,project_ic.project_status as pstatus,m_id,project.project_id as pid');
                   $this->db->from('project');
                   $this->db->join('project_ic', 'project_ic.project_id = project.project_id');
                   $this->db->join('member', 'member.m_id = project_ic.proj_user');
                   $this->db->where('project.compcode',$c->compcode);
                   $this->db->where('member.compcode',$c->compcode);
                   $this->db->where('proj_user', $value->m_id);
                   $qu = $this->db->get();
                   $res = $qu->result();
                 $n = 1;foreach ($res as $vv) {?>
                       <div style="margin-left: 20px;">
                         <div class="checkbox checkbox-right checkbox-switchery switchery-xs">
                           <label class="display-block">
                             <?php if ($vv->pstatus == "") {?>
                                 <input type="checkbox" class="switchery" id="ss<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>">
                             <?php } else {?>
                                 <input type="checkbox" checked class="switchery" id="ss<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>">
                             <?php }?>
                             <?php echo $vv->project_name; ?>
                           </label>
                           <input type="hidden" name="name" id="txtval<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>" value="<?php echo $vv->pstatus; ?>">
                           <!--<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>-->
                         </div>
                       </div>
                         <script>

                             $('#ss<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>').click(function(event) {
                             if($('#ss<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>').prop('checked')) {
                               $('#txtval<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>').val("Y");
                             } else {
                               $('#txtval<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>').val("");
                             }
                             var url="<?php echo base_url(); ?>index.php/permission/update_siteic_proj";
                             var dataSet={
                               id: "<?php echo $value->m_id; ?>",
                               project_id: "<?php echo $vv->pid; ?>",
                               status: $('#txtval<?php echo $n; ?><?php echo $value->m_id; ?><?php echo $vv->pid; ?>').val()
                             };
                             $.post(url,dataSet,function(data){
                               //  callback
                             });
                           });
                         </script>
                 <?php $n++;}}?>
                 <?php } ?>

                <?php } ?>
              </div>
              <div class="modal-footer">
                <button type="button" id="save" class=" btn bg-primary-600" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
<!-- <script>
  $("#data<?php echo $value->m_id; ?>").click(function(){
      var url="<?php echo base_url(); ?>index.php/permission/update_siteic";
      var dataSet={
        id: "<?php echo $value->m_id; ?>"
      };
      $.post(url,dataSet,function(data){
        alert(data);
        $(location).attr('href', '<?php echo base_url(); ?>index.php/data_master/setup_permision');
      });

  });
</script> -->



  <?php }?>
    </div>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/pnotify.min.js"></script>
 <script>
   $('#pnotify-dynamic').on('click', function () {
        var percent = 0;
        var notice = new PNotify({
            text: "Please wait",
            addclass: 'bg-primary',
            type: 'info',
            icon: 'icon-spinner4 spinner',
            hide: false,
            buttons: {
                closer: false,
                sticker: false
            },
            opacity: .9,
            width: "170px"
        });

        setTimeout(function() {
        notice.update({
            title: false
        });
        var interval = setInterval(function() {
            percent += 2;
            var options = {
                text: percent + "% complete."
            };
            if (percent == 80) options.title = "Almost There";
            if (percent >= 100) {
                window.clearInterval(interval);
                options.title = "Done!";
                options.addclass = "bg-success";
                options.type = "success";
                options.hide = true;
                options.buttons = {
                    closer: true,
                    sticker: true
                };
                options.icon = 'icon-check';
                options.opacity = 1;
                options.width = PNotify.prototype.options.width;
                 var url="<?php echo base_url(); ?>permission/update_siteic";
        var dataSet={
           num : $("#txtname").val(),
          };
        $.post(url,dataSet,function(data){
          // $("#h").html(data);
          alert("Update Success!!");
        });
            }

            notice.update(options);

            }, 120);
        }, 2000);

    });
  $('#mg').attr('class', 'active');
  $('#mc6').attr('style', 'background-color:#dedbd8');
 </script>
