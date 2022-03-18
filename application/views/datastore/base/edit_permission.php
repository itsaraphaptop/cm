<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">

	</style>
</head>
<body>


<span id="notification" style="display:none;"></span>
<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper"> 
<div class="content">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
						<div class="panel-body">
							<!-- content  -->
							<div class="col-md-12">
								<!-- <div class="container"> -->
								<div style="margin-bottom: 20px;">
									<h4>
								<b><?=$user_info["m_name"]?></b>
									</h4>
								</div>

								<div class="col-md-12">
									<table  class="table table-bordered table-hover table-xxs table-responsive">
										<thead>
											<tr style="height: 50px;background-color: #d7e2d3">
												<th>Module</th>
												<th>Read</th>
												<!-- <th>write</th> -->

											</tr>
										</thead>
										<?php foreach ($array_module as $index => $module) {
	?>
										<tr
											style="background-color: #9FC5E8; color: #000000 ;height: 50px"

										>
										<?php
$count_sub_modlue = count($permission[$module['module_name']]);
	$count_sub_modlue;
	$array_read = array();
	$array_write = array();
	?>
											<td >
												<span
													style="cursor: pointer;"
													class="glyphicon glyphicon-triangle-right"
													aria-hidden="true"
													status = "close"
													module_id = <?=$module['module_id']?>
													>

												</span>

												<b><?=$module['module_name']?></b>
											</td>
											<td >
												<!-- read -->
												<input type="checkbox"
												module_id_domain ="<?=$module['module_id']?>"
												event_type="read"
												class = "main_module"
												value="0"
												/>
												check all
											</td>
											<!-- <td> -->
												<!-- write -->
												<!-- <input type="checkbox"
												module_id_domain ="<?=$module['module_id']?>"
												event_type="write"
												class = "main_module"
												value="0"

												/> -->
												<!-- check all -->
											<!-- </td> -->

										</tr>
												<?php foreach ($permission[$module['module_name']] as $sub_module_name => $sub_module) {
		?>
												<?php
$checked_read = "";
		if ($sub_module["read"] == 1) {
			$array_read[] = 1;
			$checked_read = "checked";
		} elseif ($sub_module["read"] == 0) {
			$checked_read = "";
		} else {
			die("Invalid data");
		}
		$checked_write = "";
		if ($sub_module["write"] == 1) {
			$array_write[] = 1;
			$checked_write = "checked";
		} elseif ($sub_module["write"] == 0) {
			$checked_write = "";
		} else {
			die("Invalid data");
		}
		//echo "<pre>";

		?>
												<tr style="display: none;">
													<td style="text-indent: 35px;"><?=$sub_module_name?></td>
													<!-- read -->
													<td>
														<input
														type="checkbox"
														event_type="read"
														<?=$checked_read?>
														module_id="<?=$sub_module["ref_module_id"]?>"
														sub_module_id ="<?=$sub_module["sub_module_id"]?>"
														class="sub_module  "
														value="<?=$sub_module["read"]?>"/>
													</td>
													<!-- write -->
													<!-- <td>
														<input
														type="checkbox"
														event_type="write"
														<?=$checked_write?>
														module_id="<?=$sub_module["ref_module_id"]?>"
														class="sub_module  "
														sub_module_id ="<?=$sub_module["sub_module_id"]?>"
														value="<?=$sub_module["write"]?>"/>
													</td> -->


												</tr>
												<?php
}
	if ($count_sub_modlue == count($array_read)) {

		//echo "check  all  read";
		echo '<script type="text/javascript">';
		echo "$(\"input[module_id_domain='{$module['module_id']}'][event_type='read']\").attr('checked','');";
		echo "$(\"input[module_id_domain='{$module['module_id']}'][event_type='read']\").val('1');";
		echo '</script>';

	}

	if ($count_sub_modlue == count($array_write)) {
		//echo "check  all  read";
		echo '<script type="text/javascript">';
		echo "$(\"input[module_id_domain='{$module['module_id']}'][event_type='write']\").attr('checked','');";
		echo "$(\"input[module_id_domain='{$module['module_id']}'][event_type='write']\").val('1');";
		echo '</script>';
	}

	?>
										<?php }?>
									</table>
								</div>
								<!-- </div> -->
								<!-- container -->
							</div>
							<!-- content -->
						</div>

		</div>
	</div>
	</div>
	</div>
	</div>

<!-- <pre>
	<?php //var_dump($modules)?>
</pre> -->
</body>
</html>
<script type="text/javascript">

</script>
<script type="text/javascript">
	$(function(){
		//hide row table
		$("span[module_id]").click(function(event) {
			var module_id = $(this).attr('module_id');
			var status = $(this).attr('status');

			if(status == "open"){
				 $(this).attr('status','close')
				 $(this).attr('class', 'glyphicon glyphicon-triangle-right');
			}else if(status == "close"){
				$(this).attr('status','open')
				 $(this).attr('class', 'glyphicon glyphicon-triangle-bottom');
			}
			//alert(module_id);
			$("input[module_id="+module_id+"][event_type='read']").each(function(index, val) {
				$(val).parent().parent().toggle('fast');
				 /* iterate through array or object */
			});
		});



		//hide row table

		// click by item
		$(".sub_module").click(function() {
			var value = $(this).val();
			if(value == "1"){
				$(this).val("0");
			}else{
				$(this).val("1");
			}

					var new_vaule = $(this).val();
					var module_id = $(this).attr("module_id");
					var sub_module_id = $(this).attr("sub_module_id");
					var type = $(this).attr('event_type');
					var data = {
						ref_module_id:module_id,
						ref_sub_module:sub_module_id,
						value:new_vaule
					};

				//console.log(data);

			//alert(new_vaule);
			$.post('<?=base_url()?>new_permission/update_permission_by_item/<?=$this->uri->segment(3);?>',
				{
					data: data,
					type: type
				}
				, function() {

			}).done(function(res){
					console.log(res);
					try{
						var json_res = jQuery.parseJSON(res);

						if(json_res.status){
								show_nonti("success !!",json_res.message,"success");
						}else{
								show_nonti("error !!",json_res.message,"error");
						}
					}catch(e){
							show_nonti("error !!","update error","error");
							console.log(e);
							console.log(res);
					}
			});
		});

		// click all module
		$(".main_module").change(function(event) {
			var main_module = $(this);
			var type = $(this).attr('event_type');
			var module_id = $(this).attr("module_id_domain");
			var value = $(this).val();

			if(value == "1"){
				$(this).val("0");
			}else{
				$(this).val("1");
			}
			var new_value = $(this).val();

			$("[event_type="+type+"][module_id="+module_id+"]").prop("checked",$(this).prop("checked"));
			$("[event_type="+type+"][module_id="+module_id+"]").prop("value",$(this).prop("value"));
			var data = [];
			$("[event_type="+type+"][module_id="+module_id+"]").each( function(index, val) {
				$(val).val(new_value);
				//console.log($(val).val());
				//console.log($(val).attr("module_id"));
				data.push({
					"ref_module_id":$(val).attr("module_id"),
					"ref_sub_module":$(val).attr("sub_module_id"),
					"value" :new_value
				});

			});
			//console.log(data);
			$("html").append('<div class="loading">Loading&#8230;</div>');
			// console.log(data);
			$.post('<?=base_url()?>new_permission/update_permission_all_module/<?=$this->uri->segment(3);?>',
				{
					data_array: data,
					type:type
				}, function() {
				/*optional stuff to do after success */
			}).done(function(data){
				//console.log(data)

				try{
						var json_res = jQuery.parseJSON(data);
						$(".loading").remove();
						if(json_res.status == true){
								show_nonti("success !!",json_res.message,"success");
						}else{
								show_nonti("error !!",json_res.message,"error");
						}

				}catch(e){
					$(".loading").remove();
					show_nonti("error !!","update error","error");
					console.log(e);
					console.log(data);

				}




			});

		});
	});


</script>
