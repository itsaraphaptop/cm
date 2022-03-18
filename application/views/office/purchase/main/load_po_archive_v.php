<table class="table table-striped table-bordered table-hover table-xxs">
    <thead>
      <tr>
                <th width="20%" class="text-center">PO No.</th>
                <th class="text-center">PR No.</th>
                <th class="text-center">Name</th>
                <th class="text-center">Project/Department</th>
                <th class="text-center">Vender</th>
                <th class="text-center">Date</th>
                <th class="text-center">Status</th>
                <th class="text-center">Actions</th>
              </tr>
    </thead>
    <tbody>
    <?php foreach ($res as $val) {?>
              <tr>
                <td class="text-center"><?php echo $val->po_pono; ?></td>
                <td class="text-center"><?php echo $val->po_prno; ?></td>
                <td><?php echo $val->po_prname; ?></td>
                <td class="text-center"><?php echo $val->project_name; ?><?php echo $val->department_title; ?></td>
                <!-- <td><?php echo $val->po_remark; ?></td> -->
                                                    <td><?php echo $val->po_vender;?></td>
                <td class="text-center"><?php echo $val->po_podate; ?></td>
                <?php if ($val->po_approve=="approve") {?>
                <td class="text-center"><span class="label label-success"><?php echo $val->po_approve; ?></span></td>
                <?php }else{ ?>
                <td class="text-center"><span class="label label-warning">IN Processing</span></td>
                <?php } ?>
                <td>
                  <ul class="icons-list">
                      <li><a data-toggle="modal" data-target="#open<?php echo $val->po_pono; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-folder-open"></i></a></li>
                    <?php if ($val->po_approve=="approve") {?>
                      <li class="text-slate"><i class="icon-pencil7"></i></li>
                      <li class="text-slate"><i class="icon-trash"></i></li>
                    <?php }else{ ?>
                      <li><a class="preload" href="<?php echo base_url(); ?>index.php/purchase/editpo/<?php echo $val->po_pono; ?>" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>
                      <li><a id="remove<?php echo $val->po_pono; ?>" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-trash"></i></a></li>
                      <?php } ?>
                      <!-- <li><a href="<?php echo base_url(); ?>purchase/report_po/<?php echo $val->po_pono; ?>" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li> -->
                      <li><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=<?php echo $reporttype; ?>&pp=<?php echo $val->po_id; ?>" target="_blank" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li>
                                                                      
                  </ul>
                </td>
              </tr>
              <script>
                $('#remove<?php echo $val->po_pono; ?>').on('click', function() {
                  swal({
                    title: "Are you sure?",
                    text: "Deleted ",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#EF5350",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel pls!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                  function(isConfirm){
                    if (isConfirm) {
                      var url="<?php echo base_url(); ?>purchase_active/deletepo/<?php echo $val->po_pono; ?>/<?php echo $val->po_prno; ?>";
                      var dataSet={
                      };
                      $.post(url,dataSet,function(data){
                        $(this).closest('tr').remove();
                          swal({
                            title: "Deleted!",
                            text: data,
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                      });
                    }
                   else {
                   swal({
                    title: "Cancelled",
                    text: "Your imaginary file is safe :)",
                    confirmButtonColor: "#2196F3",
                    type: "error"
                    });
                    }
                   window.location.href = "<?php echo base_url(); ?>purchase/po_archive";
                  });
                });
              </script>
             <?php  } ?>
    </tbody>
  </table>