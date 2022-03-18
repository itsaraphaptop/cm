<!-- Basic datatable -->

<form  action="<?php echo base_url(); ?>setup_wh/InsertDataWareHouse" method="post">
        <div class="panel panel-flat">
          <div class="panel-heading">
            <h5 class="panel-title">SETUP WAREHOUSE <?php echo $pj ?></h5>
            <h5 class="panel-title"> <br>
              <input type="text" class="hidden"  name="dtnow" id="dtnow" value="<?php echo date("Y-m-d H:i:s")?>">
              <input type="text" class="hidden"  name="pjii" id="pjii" value="<?php echo $pj ?>">
            </h5>
          </div>
          <div class="panel-body">
          </div>
          <div class="row">
            <div class="col-xs-12">
          <table class="table datatable-basic" name="wh_tb" id="wh_tb">
            <thead>
              <tr>
                <th class="text-center">No.</th>
                <th class="text-center">CODE</th>
                <th class="text-center">WAREHOUSE NAME</th>
                <th class="text-center">JOB</th>
                <th class="text-center">ACTION</th>
              </tr>
            </thead>
            <tbody id="body">
              <?php foreach ($getwhdata as $wh){ ?>
              <tr id ="domain<?php echo $wh->id; ?>">
                <td class="text-center"><?php echo $wh->itemno; ?></td>
                <td class="text-center"><?php echo $wh->whcode; ?></td>
                <td class="text-center"><?php echo $wh->whname; ?></td>
                <td class="text-center">
                  <?php if($wh->jobcode=='1') echo "OVERHEAD" ?>
                  <?php if($wh->jobcode=='2') echo "AC" ?>
                  <?php if($wh->jobcode=='3') echo "EE" ?>
                  <?php if($wh->jobcode=='4') echo "SN" ?>
                  <?php if($wh->jobcode=='5') echo "CIVIL" ?>
                </td>
                <td class="text-center">
                  <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_theme_success<?php echo $wh->id; ?>">EDIT</button>
                  <a type="button" href="<?php echo base_url(); ?>setup_wh/DeleteDataWh/<?php echo $wh->id; ?>/<?php echo $pj?>">Delete</a>
                </td>
              </tr>
                <?php } ?>

                    <?php for ($i=1; $i <= 5; $i++) {  ?>
                  <tr>
                    <td class="text-center"><?php echo $i; ?><input type="hidden" name='idi[]'  class="form-control" value="<?php echo $i; ?>" ></td>
                    <td class="text-center"><input type="text" name='codewhi[]'  class="form-control" ></td>
                    <td class="text-center"><input type="text" name='whnamei[]'  class="form-control"></td>
                    <td class="text-center">
                      <select class="form-control " name='systemcodei[]'>
                        <option select="selected" >Please Select</option>
                        <option value="1" >OVERHEAD</option>
                        <option value="2" >AC</option>
                        <option value="3" >EE</option>
                        <option value="4" >SN</option>
                        <option value="5" >CIVIL</option>
                      </select>
                    </td>
                    <td>
                    <ul class="icons-list">
                      <li><a id="remove<?php echo $i;?>" data-popup="tooltip" title="Remove"><i class="icon-trash"></i></a></li>
                    </ul>
                    </td>
                  </tr>
                  <script>  $('#remove<?php echo $i;?>').on('click', function() {$(this).closest('tr').remove();});</script>
                  <?php } ?>
            </tbody>
          </table>
            </div>
            </div>
        </div>
        <!-- /basic datatable -->
        <button type="submit" id="Insertdata" class="btn btn-default pull-center">ส่ง</button>
        <a id="add_td" class="btn btn-default pull-left">เพิ่ม</a>
        <a id='delete_td' class="pull-right btn btn-default">ลบแถว</a>
        <!-- <input type="hidden" name="iddatawh" value="<?php echo $wh->id?>"> -->
        </form>
        <?php foreach ($getwhdata as $wh){ ?>
        <form action="<?php echo base_url(); ?>setup_wh/EditDataWH/<?php echo $wh->id?>/<?php echo $pj?>" method="post">
        <div id="modal_theme_success<?php echo $wh->id; ?>" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-success">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">EDIT DATA</h6>
                  </div>
                  <div class="modal-body">
                    <label for="codewh">Code.</label>
                    <input name="codewh" type="text"  class="form-control" value="<?php echo $wh->whcode; ?>">
                    <label for="whname">WH NAME</label>
                    <input type="text" name="whname"  class="form-control" value="<?php echo $wh->whname; ?>">
                    <label for="systemcode">JOB</label>
                    <select class="form-control " name='systemcode'>
                        <?php if ($wh->jobcode=='1') { ?>
                           <option value="1">OVERHEAD</option>
                           <?php }elseif ($wh->jobcode=='2') { ?>
                           <option value="2">AC</option>
                           <?php }elseif ($wh->jobcode=='3') { ?>
                           <option value="3">EE</option>
                           <?php }elseif ($wh->jobcode=='4') { ?>
                           <option value="4">SN</option>
                           <?php }elseif ($wh->jobcode=='5') { ?>
                           <option value="5">CIVIL</option>
                       <?php } ?>
                      <option value="1" >OVERHEAD</option>
                      <option value="2" >AC</option>
                      <option value="3" >EE</option>
                      <option value="4" >SN</option>
                      <option value="5" >CIVIL</option>
                    </select>
                    <input type="text" class="hidden"  name="eddtnow" id="eddtnow" value="<?php echo date("Y-m-d H:i:s")?>">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="submit" id="btnedit<?php echo $wh->id; ?>" class="btn btn-success">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
                 <?php } ?>
            <!-- /success modal -->
        <script>
        var i=1;
        $("#delete_td").click(function(){
        if(i>1){
        $("#addtr"+(i-1)).html('');
        i--;
         }
         });
         $("#add_td").click(function(){
           addrow();
         });
function addrow(){
  var row = ($('#body tr').length-0)+1;
  var tr = '<tr id="'+row+'">'+
  '<td class="text-center">'+ row +'<input type="hidden" name="idi[]"  class="form-control" value="'+row+'" ></td>'+
  '<td class="text-center" ><input name="codewhi[]" type="text"  class="form-control"> </td>'+
  '<td class="text-center" ><input type="text" name="whnamei[]"  class="form-control"></td>'+
  '<td class="text-center"><select class="form-control" name="systemcode[]">'+
  '<option select="selected" >please select</option>'+
    '<option value="1" >OVERHEAD</option>'+
    '<option value="2" >AC</option>'+
    '<option value="3" >EE</option>'+
    '<option value="4" >SN</option'+
    '<option value="5" >CIVIL</option>'+
  '</select></td>'+
  '<td>'+
    '<ul class="icons-list">'+
      '<li><a id="remove'+row+'" data-popup="tooltip" title="Remove"><i class="icon-trash"></i></a></li>'+
    '</ul>'+
  '</td>'+
  '</tr>';
  $('#body').append(tr);
    $('#remove'+row).on('click', function() {$(this).closest('tr').remove();});
}
        </script>
