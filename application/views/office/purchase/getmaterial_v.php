<?php $i=1; ?>
 <table id="tamat" class="table table-hover" >
               <thead>
                 <tr>
                   <th>รหัสวัสดุ</th>
                   <th>ชื่อวัสดุ</th>
                   <th>ขนาด</th>
                   <th>หน่วย</th>
                   <th width="5%">จัดการ</th>
                 </tr>
               </thead>
               <tbody>

                    <?php foreach ($allmaterial as $vali){?>
                 <tr>
                  <td><?php echo $vali->mattype_code;?><?php echo $vali->matgroup_code;?><?php echo $vali->matsubgroup_code;?></td>
                   <td><?php echo $vali->matgroup_name;?></td>
                   <td><?php echo $vali->matsubgroup_name;?></td>
                   <td><?php echo $vali->matname;?></td>
                     <td><button class="opennmat btn btn-xs btn-block btn-info" data-toggle="modal" data-mmatcode="<?php echo $vali->mattype_code;?><?php echo $vali->matgroup_code;?><?php echo $vali->matsubgroup_code;?>"  data-nmatgroupname="<?php echo $vali->matgroup_name;?><?php echo $vali->matsubgroup_name;?>" data-munit="<?php echo $vali->matname;?>" data-dismiss="modal">เลือก</button></td>
                 </tr> 
                 <?php } ?>
               </tbody>
             </table>

<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js//jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
// $(document).ready(function() {

    $('#tamat').DataTable();
   
     
// } );
 
</script>

<?php $i++; ?>