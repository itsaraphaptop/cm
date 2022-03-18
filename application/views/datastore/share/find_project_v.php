 <?php foreach ($getproj as $key => $value) {?>
                  <tr>
                    <td><?php echo $value->project_code; ?></td>
                    <td><?php echo $value->project_name; ?></td>
					<td class="text-center"><?php  if($value->controlbg=='2'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?></td>
	                    <td class="text-center"><?php  if($value->chkconbqq=='1'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?></td>
									
                    <td><a href="<?php echo base_url(); ?>index.php/office/newpr/<?php echo $value->project_id; ?>/p" class="label label-primary"><i class="icon-folder-open"></i> SELECT</a></td>
                  </tr>
                  <?php } ?>