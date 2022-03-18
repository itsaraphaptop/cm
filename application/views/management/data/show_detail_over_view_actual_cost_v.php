<style type="text/css">
	.head_table{
        background-image:linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
      }
	  .text_r{
	    text-align: right;
	  }
	  .text_l{
	    text-align: left;
	  }
	  .b{
        font-weight: bold;
        font-size: 14px;
      }
      
</style>
<?php 
		// get content project
		$this->db->select("*");
		$this->db->where("project_id",$project_id);
		$content_project =  $this->db->get("project")->result_array();
			// chect found project 
			if(count($content_project)>0){
				$project_name = $content_project[0]["project_name"];
				$project_start = $content_project[0]["project_start"];
				$project_stop = $content_project[0]["project_stop"];

			}else{
				die("ไม่พบโปรเจค");
			}


?>
<!-- content-wrapper -->
<div class="content-wrapper">
	
	
		<div class="content" style="padding-bottom: 0px;">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-4">
							<h3 style="display: inline;"> Project Name : <?=$project_name?></h3>
							<h4>Date: <?=$project_start?> - <?=$project_stop?></h4>  
						</div>
						<div class="col-md-8">
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Page header -->

		<!-- main -->
		<div class="content" style="padding-top: 0px;">
			<!-- col 1.1 -->
			<div class="col-sm-6 col-md-6 col-lg-6">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h3>Actual Cost Detail</h3>
					</div>
					<div class="container-fluid ">
						<table class="table table-bordered table-sm">
							<thead>
								<tr class="head_table">
									<th class="b"><h4>Month</h4></th>
									<th class="b"><h4>apv</h4></th>
									<th class="b"><h4>apo</h4></th>
									<th class="b"><h4>aps</h4></th>
									<th class="b"><h4>gl</h4></th>
									<th class="b"><h4>Amouth</h4></th>
								</tr>
							</thead>
							<tbody id="content_table_Actual_Cost">
								
							</tbody>
						</table>
						
					</div>
			
				</div>
			</div>
			<!-- col 1.1 -->

			<!-- col 1.2 -->
			<div class="col-md-6 col-md-6 col-lg-6">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 style="display: inline; padding: 0px;margin: 0px;">Type : <span id="type_group"></span></h4>
						<h4 style=" padding: 0px;margin: 0px;">Month : <span id="display-mouth"></span></h4>     
					</div>
					<div class="container-fluid">
						<div id="target_table">
							
						</div>
					</div>
				</div>
			</div>
			<!-- col 1.2 -->

		</div>
		<!-- main -->
</div>
<!-- content-wrapper -->
<script type="text/javascript">
        function display_mouth(str_date){
            var array_mouth = str_date.split("-");
            var months = {  
                  1  : 'JAN',  
                  2  : 'FEB',  
                  3  : 'MAR',  
                  4  : 'APR',  
                  5  : 'MAY',  
                  6  : 'JUN',  
                  7  : 'JUL',  
                  8  : 'AUG',  
                  9  : 'SEP',  
                  10  : 'OCT',  
                  11  : 'NOV',  
                  12  : 'DEC' 
            };

            //alert(array_mouth);
            return months[array_mouth[1]*1]+"/"+array_mouth[0];
        } 

        function get_Percent(num1,num2){
              var res = num1/num2*100;

                if(isNaN(res) || !isFinite(res)){
                    return 0;
                }else{
                    return res;
                }
            
        }
        

</script>
<script type="text/javascript">
	$(function(){
		$.get('<?=base_url()?>management_active/actual_cost_chart/<?=$project_code?>', function() {
			
		}).done(function(data){
			///$("html").append('<div class="loading">Loading&#8230;</div>');
			
				
				try{
					const json = jQuery.parseJSON(data);
					//alert(json.content_table);

						var sum_amount =0;
	                    var sum_apv = 0;
	                    var sum_apo = 0;
	                    var sum_aps = 0;
	                    var sum_gl = 0;
						$.each(json.content_table, function(index, val) {
							
							 $("#content_table_Actual_Cost").append(
							 	'<tr>'+
								 	// '<td class="b">'+display_mouth(val.mount)+'</td>'+
								 	'<td class="b">'+display_mouth(val.mount)+'</td>'+
								 	'<td class="text_r">'+
								 		'<a  class="show_detail"  month="'+val.mount+'" type_group="apv">'+numberWithCommas(val.apv)+'</a>'+
								 	'</td>'+
								 	'<td class="text_r">'+
								 		'<a  class="show_detail" month="'+val.mount+'" type_group="apo">'+numberWithCommas(val.apo)+'</a>'+
								 	'</td>'+
								 	'<td class="text_r">'+
								 		'<a  class="show_detail" month="'+val.mount+'" type_group="aps">'+numberWithCommas(val.aps)+'</a>'+
								 	'</td>'+
								 	'<td class="text_r">'+
								 		'<a  class="show_detail" month="'+val.mount+'" type_group="gl">'+numberWithCommas(val.gl)+'</a>'+
								 	'</td>'+
								 	'<td class="text_r">'+
								 		numberWithCommas(val.sum)+
								 	'</td>'+
							 	'</tr>'
							 	);
							  sum_amount+=val.sum;
	                          sum_apv+=val.apv;
	                          sum_apo+=val.apo;
	                          sum_aps+=val.aps;
	                          sum_gl+=val.gl;

						});
						$("#content_table_Actual_Cost").append(
							'<tr class="head_table">'+
								 	// '<td class="b">'+display_mouth(val.mount)+'</td>'+
								 	'<td class="b"><h4>'+"Summary"+'</h4></td>'+
								 	'<td class="text_r">'+
								 		'<a  class="" >'+numberWithCommas(sum_apv)+'</a>'+
								 	'</td>'+
								 	'<td class="text_r">'+
								 		'<a  class="">'+numberWithCommas(sum_apo)+'</a>'+
								 	'</td>'+
								 	'<td class="text_r">'+
								 		'<a  class="">'+numberWithCommas(sum_aps)+'</a>'+
								 	'</td>'+
								 	'<td class="text_r">'+
								 		'<a  class="">'+numberWithCommas(sum_gl)+'</a>'+
								 	'</td>'+
								 	'<td class="text_r">'+
								 		numberWithCommas(sum_amount)+
								 	'</td>'+
							 	'</tr>'
						)


						$(".loading").fadeOut();

						
						$(".show_detail").click(function(event) {
							var el = $(this);
							var mouth = el.attr("month");
							var type_group = el.attr("type_group");
							//$(".loading").fadeIn();

							$("#type_group").html(type_group);
							$("#display-mouth").html(display_mouth(mouth));



							$.post('<?=base_url()?>management_active/get_detail_actual_cost', {"mouth":mouth,"type_group":type_group,"project_id":<?=$project_id?> }, function() {
								
							}).done(function(data){
								
								$("#target_table").html(data);
								//$(".loading").hide();
							});
							
						});
				}catch(e){					
					console.log(e +"\n"+data);
				}
		});

		
		
	});
	$('#overview').attr('class','active');
</script>