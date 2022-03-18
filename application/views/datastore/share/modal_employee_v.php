<table class="table table-xxs table-hover datatable-basirc">
  <thead>
    <tr>
      <th>No.</th>
      <th>Pay To</th>
      <th>Project/Department</th>
      <th width="5%">Active</th>
    </tr>
    </thead>
    <tbody>
    <?php   $n =1;?>
    <?php $is =  $idd; ?>
    <?php foreach ($res as $val){ ?>
    <tr>
      <th scope="row"><?php echo $n;?> </th>
      <td><?php echo $val->m_name; ?></td>
      <td><?php echo $val->department_title; ?><?php echo $val->project_name; ?></td>
      <td><button class="openr<?php echo $n;?> btn btn-xs btn-block btn-primary" data-toggle="modal" data-projectid<?php echo $n;?>="<?php echo $val->m_project; ?>" data-projectname<?php echo $n;?>="<?php echo $val->project_name; ?>" data-depid<?php echo $n;?>="<?php echo $val->m_department; ?>" data-depname<?php echo $n;?>="<?php echo $val->department_title; ?>" data-mname<?php echo $n;?>="<?php echo $val->m_name;?>" data-mid<?php echo $n;?>="<?php echo $val->m_id;?>" data-user<?php echo $n;?>="<?php echo $val->m_user;?>" data-mcode<?php echo $n;?>="<?php echo $val->m_code;?>" data-dismiss="modal">SELECT</button></td>
    </tr>

    <script>
    $('.openr<?php echo $n;?>').click(function(){
      $('#memid').val($(this).data('mid<?php echo $n;?>'));
      $('#memname').val($(this).data('mname<?php echo $n;?>'));
       $("#venname").val('');
       $("#projectname").val($(this).data('projectname<?php echo $n;?>'));
       $("#projectid").val($(this).data('projectid<?php echo $n;?>'));
       $("#departmenttname").val($(this).data('depname<?php echo $n;?>'));
       $("#departmenttid").val($(this).data('depid<?php echo $n;?>'));

       
       $('#fa_liseid').val($(this).data('mcode<?php echo $n;?>'));
       $('#fa_lisename').val($(this).data('mname<?php echo $n;?>'));

        $('#transfer_id<?php echo $id; ?>').val($(this).data('mid<?php echo $n;?>'));
       $('#transfer_name<?php echo $id; ?>').val($(this).data('mname<?php echo $n;?>'));

        $('#approve_mid<?php echo $id; ?>').val($(this).data('mid<?php echo $n;?>'));
       $('#approve_mname<?php echo $id; ?>').val($(this).data('mname<?php echo $n;?>'));


       if('<?php echo $idd; ?>'=="1"){
       $('#approve_mid1<?php echo $id; ?>').val($(this).data('mid<?php echo $n;?>'));
       $('#approve_mname1<?php echo $id; ?>').val($(this).data('user<?php echo $n;?>'));
       }else if('<?php echo $idd; ?>'=="2"){
       $('#approve_mid2<?php echo $id; ?>').val($(this).data('mid<?php echo $n;?>'));
       $('#approve_mname2<?php echo $id; ?>').val($(this).data('user<?php echo $n;?>'));
       }else if('<?php echo $idd; ?>'=="3"){
       $('#approve_mid3<?php echo $id; ?>').val($(this).data('mid<?php echo $n;?>'));
       $('#approve_mname3<?php echo $id; ?>').val($(this).data('user<?php echo $n;?>'));
       }else if('<?php echo $idd; ?>'=="4"){
       $('#approve_mid4<?php echo $id; ?>').val($(this).data('mid<?php echo $n;?>'));
       $('#approve_mname4<?php echo $id; ?>').val($(this).data('user<?php echo $n;?>'));
       }else if('<?php echo $idd; ?>'=="5"){
       $('#approve_mid5<?php echo $id; ?>').val($(this).data('mid<?php echo $n;?>'));
       $('#approve_mname5<?php echo $id; ?>').val($(this).data('user<?php echo $n;?>'));
       }else if('<?php echo $idd; ?>'=="6"){
       $('#approve_mid6<?php echo $id; ?>').val($(this).data('mid<?php echo $n;?>'));
       $('#approve_mname6<?php echo $id; ?>').val($(this).data('user<?php echo $n;?>'));
       }else if('<?php echo $idd; ?>'=="7"){
       $('#approve_mid7<?php echo $id; ?>').val($(this).data('mid<?php echo $n;?>'));
       $('#approve_mname7<?php echo $id; ?>').val($(this).data('user<?php echo $n;?>'));
       }else if('<?php echo $idd; ?>'=="8"){
       $('#approve_mid8<?php echo $id; ?>').val($(this).data('mid<?php echo $n;?>'));
       $('#approve_mname8<?php echo $id; ?>').val($(this).data('user<?php echo $n;?>'));
       }else if('<?php echo $idd; ?>'=="121"){
       $('#approve_mid121<?php echo $id; ?>').val($(this).data('mid<?php echo $n;?>'));
       $('#approve_mname1<?php echo $id; ?>').val($(this).data('user<?php echo $n;?>'));
       }

       
    });
    </script>

    <?php $n++; } ?>
  </tbody>
</table>

