<table class="table table-xxs table-hover datatable-basicxc" >
<thead>
<tr>
<th>No.</th>
<th>Date</th>
<th>Project / Department</th>
<th>Asset Code</th>
<th>Asset Name</th>
<th>Amount</th>
<th>Status</th>
<th width="5%">จัดการ</th>
</tr>
</thead>
<tbody>
<?php $n=1;?>
<?php foreach ($res as $val){ ?>
<tr id="chk<?php echo $n;?>">
<th scope="row"><?php echo $n;?></th>
<td><div style="width: 150px;"><?php echo $val->fa_assdate; ?></div></td>
<td><?php echo $val->fa_projectname; ?><?php echo $val->fa_departmentname; ?></td>
<td><?php echo $val->fa_assetcode; ?></td>
<td><?php echo $val->fa_asset; ?></td>
<td><?php echo $val->fa_amount; ?></td>
<td><?php if($val->fa_status==1){
    echo '<span class="label label-info">Normal</span>';
  }else if($val->fa_status==2){
     echo '<span class="label bg-teal help-inline">Repair</span>';
    }else if($val->fa_status==3){
     echo '<span class="label label-danger">Write Off</span>';
    } ?></td>
<td><a id="insertpodetail<?php echo $n; ?>" class="btn btn-primary">เลือก</a></td>
</tr>

<script>

  $("#insertpodetail<?php echo $n; ?>").click(function(){  
    var assetcode = '<?php echo $val->fa_assetcode; ?>';
    var assetname = '<?php echo $val->fa_asset; ?>';
    var fa_sr = '<?php echo $val->fa_sr; ?>';
    var fa_projectid = '<?php echo $val->fa_projectid; ?>'; 
    var fa_projectname = '<?php echo $val->fa_projectname; ?>';
    var fa_job = '<?php echo $val->fa_job; ?>';
    var fa_departmentname = '<?php echo $val->fa_departmentname; ?>';
    var fa_departmentid = '<?php echo $val->fa_departmentid; ?>';
    var fa_lisename = '<?php echo $val->fa_lisename; ?>';
    var fa_liseid = '<?php echo $val->fa_liseid; ?>';
    

    

     addrow(assetcode,assetname,fa_sr,fa_projectid,fa_projectname,fa_job,fa_departmentname,fa_departmentid,fa_liseid,fa_lisename);

      $("#chk<?php echo $n;?>").hide();   

 });

 function addrow(assetcode,assetname,fa_sr,fa_projectid,fa_projectname,fa_job,fa_departmentname,fa_departmentid,fa_liseid,fa_lisename)
            {
              $('td[class="text-center"]').closest('tr').remove();
              var row = ($('#body tr').length-0);
              
              var tr = '<tr id="'+row+'">'+
                      '<td>'+row+'</td>'+
                        '<td>'+assetcode+'<input type="hidden" name="transfer_assetcode[]" value="'+assetcode+'"><input type="hidden" name="chki[]" value="Y"></td>'+
                        '<td><div style="width:200px;">'+assetname+'</div><input type="hidden" name="transfer_assetname[]" value="'+assetname+'" ></td>'+
                        '<td><div  style="width:150px;">'+fa_sr+'</div><input type="hidden" name="transfer_sr[]" value="'+fa_sr+'"></td>'+ 
                        '<td><div style="width:200px;">'+fa_projectname+'</div><input type="hidden" name="transfer_projectname[]" value="'+fa_projectname+'"><input type="hidden" name="transfer_projectid[]" value="'+fa_projectid+'"></td>'+
                        '<td>'+fa_job+'<input type="hidden" name="transfer_job[]" value="'+fa_job+'"></td>'+
                        '<td>'+fa_departmentname+'<input type="hidden" name="transfer_departmentid[]" value="'+fa_departmentid+'"><input type="hidden" name="transfer_departmentname[]" value="'+fa_departmentname+'"></td>'+
                        '<td>'+fa_liseid+'<input type="hidden" name="transfer_liseid[]" value="'+fa_liseid+'"></td>'+
                        '<td><div  style="width:100px;">'+fa_lisename+'</div><input type="hidden" name="transfer_lisename[]" value="'+fa_lisename+'"></td>'+
                        '<td><input type="text" class="form-control btn-xs" name="transfer_availablity[]" required="true" value="100"></td>'+
                         '<td><input type="text" class="form-control btn-xs" name="transfer_id[]" id="transfer_id'+row+'" style="width:100px;" readonly="true" required="true"></td>'+
                         '<td><div class="input-group"><input type="text" style="width:150px;" class="form-control btn-xs" name="transfer_name[]" id="transfer_name'+row+'" readonly="true"><span class="input-group-btn"><button type="button" data-toggle="modal" data-target="#member'+row+'" class="member'+row+' btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button></span></div></td>'+

                         '<td><input type="text" class="form-control btn-xs" name="transfer_locode[]" id="transfer_locode'+row+'" style="width:100px;" readonly="true" required="true"></td>'+
                         '<td><div class="input-group"><input type="text" style="width:150px;" class="form-control btn-xs" name="transfer_loname[]" id="transfer_loname'+row+'" readonly="true"><span class="input-group-btn">   <button type="button" data-toggle="modal" data-target="#location'+row+'" class="location'+row+' btn btn-default btn-icon btn-xs" id="jobhide'+row+'"><i class="icon-search4"></i></button>     <button type="button" data-toggle="modal" data-target="#job1'+row+'" id="jobhide2'+row+'"  class="job1'+row+' btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button></span></div></td>'+
                         '<td><input type="text" style="width:200px;" class="form-control btn-xs" name="transfer_remark[]"></td>'+
                       
                       '<td><div class="modal fade" id="location'+row+'" data-backdrop="false"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header bg-primary"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="myModalLabel">Select Location Project</h4></div><div class="modal-body"><div class="panel-body"><div id="locationn'+row+'"></div></div></div></div></div></div><div class="modal fade" id="member'+row+'" data-backdrop="false"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header bg-primary"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="myModalLabel">Select Member</h4></div><div class="modal-body"><div class="panel-body"><div id="memberr'+row+'"></div></div></div></div></div></div></td>'+

                       '<td><a id="remove'+row+'" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a><div class="modal fade" id="job1'+row+'" data-backdrop="false"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header bg-primary"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="myModalLabel">Location Department</h4></div><div class="modal-body"><div class="panel-body"><div class="row" id="jobb1'+row+'"></div></div></div></div></div></div></td>'+
'</tr>';

 $(document).on('click', 'a#remove'+row+'', function () { // <-- changes
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
 
      $('#body').append(tr);
      $(".member"+row+"").click(function(){
      $('#memberr'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#memberr"+row+"").load('<?php echo base_url(); ?>index.php/share/member/'+row+'');
      });
      $(".location"+row+"").click(function(){
      $('#locationn'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#locationn"+row+"").load('<?php echo base_url(); ?>index.php/share/asslocation/'+row+'');  
      });

      
      $(".job1"+row+"").click(function(){
       $('#jobb1'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#jobb1"+row+"").load('<?php echo base_url(); ?>index.php/share/asslocation2/'+row+'');
     });

      var depid = $("#depid").val();
      if(depid==""){
        $("#jobhide2"+row+"").hide();   
        $("#jobhide"+row+"").show();
      }else{
        $("#jobhide"+row+"").hide();
        $("#jobhide2"+row+"").show();   
      }

            }

     
</script>
  
<?php $n++; } ?>
</tbody>
</table>

<!-- Core JS files -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
  $(".datatable-basicxc").DataTable();
</script>





