<?php foreach ($getdep as $key => $value) {?>
										<tr>
											<td><?php echo $value->department_code; ?></td>
											<td><?php echo $value->department_title; ?></td>

											<td><a href="<?php echo base_url(); ?>index.php/office/newpr/<?php echo $value->department_id; ?>/d" class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>
										</tr>
										<?php } ?>