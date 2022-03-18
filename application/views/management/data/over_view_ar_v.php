<?php 
	$this->db->select("*");
	$this->db->where("project_code",$project_code);
	$this->db->limit(1);
	$res = $this->db->get("project")->result_array();
	//var_dump($res);
?>
<?php
      $this->db->select('*');
      $this->db->where('project_id',$project_id);
      $qqq = $this->db->get('project')->result(); 
      foreach ($qqq as $qq) { 
      	$project_start = $qq->project_start;
      	$project_stop = $qq->project_stop;
      	$bd_tenid = $qq->bd_tenid;
      	$project_id = $qq->project_id;
      	$project_name = $qq->project_name;
        $project_value = $qq->project_value;
      }?>

    <?php
      $this->db->select('*');
      $this->db->where('boq_project',$bd_tenid);
      $bq = $this->db->get('boq_item')->result(); 
      $bqq = 0;
      $fc = 0;
      foreach($bq as $boq){
      	$bqq = $bqq+$boq->boq_budget_amt+$boq->boq_lab_amt;
      	$fc = $fc+$boq->forecastbg;
      }
      ?>	

	<?php
      $this->db->select('*');
      $this->db->where('subproject',$project_id);
      $boqsubl = $this->db->get('boq_item')->result();
      $qty = 0;
      $qtyy = 0;
      foreach ($boqsubl as $keyl ) { 
      	  $qty=$qty+$keyl->boq_lab_amt; 
      } 
  ?>

  <?php 
    $this->db->select("sum(project_value) as bg_vo");
    $this->db->where("project_sub",$project_id);
    $result_vo_bg = $this->db->get("project")->result_array()[0]["bg_vo"];

  ?>
<style type="text/css">
  .row_height{
      height: 700px;
  }
</style>
<div class="content">
	<div class="panel panel-flat">
		<div class="panel-heading" style="font-size: 17px;">
        <h2> Income by Project : <?php echo $project_name; ?></h2><br>

                <b>Date:</b> <?php echo $project_start; ?> - <?php echo $project_stop; ?><br>
                <b>Contract:</b> <a href="#"><?=number_format($project_value)?></a><br>
                <b>BG VO:</b> <a href="#"><?=number_format($result_vo_bg)?></a><br>
                <b>Contract + BG VO:</b> <?php echo number_format($project_value+$result_vo_bg);?>
                <br>
                
                
            
		</div>
	</div>
</div>

<!-- main -->
    <div class="content" style="padding-top: 0px;">
      <!-- col 1.1 -->
      <div class="col-md-5" style="overflow: auto;">
        <div class="panel panel-flat">
          <div class="panel-heading">
            <h3>Progress by Month</h3>
          </div>
          <div class="container-fluid">
            
            <table id="content_chart_table" class="table table-bordered" >
              <tr style="background-image:linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);">
                <td><h4>Date (Y-M)</h4></td>
                <td><h4>Contract</h4></td>
               <!--  <td>BG VO</td>
                <td>Contract + BG VO</td> -->
              </tr>
            </table>
                 
          </div>
        </div>
      </div>
      <!-- col 1.1 -->

      <!-- col 1.2 -->
      <div class="col-md-7">
        <div class="panel panel-flat">
          <div class="panel-heading">
            <!-- <h4 style="display: inline; padding: 0px;margin: 0px;">Type : <span id="type_group"></span></h4> -->
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


	

<script type="text/javascript">
	 var chart_type = [
                    "column",
                    "bar",
                    "line",
                    "area"
                ];
	$.post('<?=base_url()?>management_active/json_chart_detail_ar/<?=$project_id?>/<?=$res[0]["project_start"]?>/<?=$res[0]["project_stop"]?>', function() {
		
	}).done(function(data){
		//alert(data);
		$.each(chart_type, function(index, type) {
			// $("#chart_type_tap1").append('')
			$("#chart_type_tap1").append('<option value="'+type+'">'+type+'</option>');
            $("#chart_type_tap2").append('<option value="'+type+'">'+type+'</option>')
		});
		try{
			var json_chart = jQuery.parseJSON(data);
			
                var sum = 0;
                var contract=0;
                var vo=0;
                var sum_contract = 0;
                var sum_vo = 0;
                var summ = 0;
            $.each(json_chart.categories, function(index, val) {
                 //alert(val);
                 contract = (json_chart.data[0].data[index]);
                 vo = (json_chart.data[1].data[index]);
                 sum = (contract+vo);
                sum_contract+=contract;
                sum_vo+=vo;
                summ+=sum;
                 $("#content_chart_table").append(
                  '<tr>'+
                  '<td>'+val+'</td>'+
                    '<td style="text-align: right;"><a class="show_content" month="'+val+'" project_id="'+<?=$project_id?>+'">'+numberWithCommas(contract)+'</a></td>'+
                    // '<td style="text-align: right;"><a>'+numberWithCommas(vo)+'</a></td>'+
                    // '<td style="text-align: right;">'+numberWithCommas(sum)+'</td>'+
                  '</tr>'
                  );
            });
            $("#content_chart_table").append(
              '<tr style="background-image:linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);">'+
                '<td><h4>summary</h4></td>'+
                '<td style="text-align: right;">'+numberWithCommas(sum_contract)+'</td>'+
                // '<td style="text-align: right;">'+numberWithCommas(sum_vo)+'</td>'+
                // '<td style="text-align: right;">'+numberWithCommas(summ)+'</td>'+
              '</tr>'
            )
			//$("html").append(data);
			//console.log(json_chart);
                $(".show_content").click(function(){
                        
                        var month = $(this).attr("month");
                        var project_id = $(this).attr("project_id");
                        $("#display-mouth").html(month);
                        //alert(project_id);
                          var data ={
                            "month":month,
                            "project_id":project_id
                          }
                        $.post('<?=base_url()?>management_active/get_detail_progress/', data, function() {
                          /*optional stuff to do after success */
                        }).done(function(data){
                              //alert(data);
                              $("#target_table").html(data);
                        });
                });
			
		}catch(e){
			alert("error");
		}


	});

    $.post('<?=base_url()?>management_active/json_chart_detail_ar_vo/<?=$project_id?>/<?=$res[0]["project_start"]?>/<?=$res[0]["project_stop"]?>', function() {
        
    }).done(function(data){
            // alert(data);
            //$("#content_chart2").html(data);

            try{
                    var json_vo = jQuery.parseJSON(data);
                    $("#tab_vo_btn").click(function(event) {
                        //alert(json_vo);

                        setTimeout(function(){ 
                                chart_render("#content_chart2","column",false,json_vo.categories,json_vo.data,"Income");
                        }, 500);

                            $("#chart_type_tap2").change(function(event) {
                                    chart_render("#content_chart2",$(this).val(),false,json_vo.categories,json_vo.data,"Income");
                            });

                    });

                         var num_project = json_vo.data.length;
                         var summ_vo = 0;
                    $.each(json_vo.categories, function(index, val) {
                            var project_td = "";

                            for(var i = 0 ;i<num_project ;i++ ){
                                   project_td+="<tr><td>"+json_vo.data[i].name+"</td><td style='text-align: right;'>"+numberWithCommas(json_vo.data[i].data[index])+" "+"</td></tr>";
                                   summ_vo+=json_vo.data[i].data[index];
                            }
                            project_td_table = "<table class='table table-bordered'>"+project_td+"</table>";

                         $("#content_chart_table_vo")
                         .append("<tr><td style='text-align:center'>"+val+"</td><td>"+project_td_table+"</td></tr>");
                    });
                    $("#content_chart_table_vo")
                         .append("<tr style='background-image:linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);'><td>"+"summary"+"</td><td style='text-align:right'>"+numberWithCommas(summ_vo)+"</td></tr>");


            }catch(e){
                    alert("error");
            }
    });
      $('#overview').attr('class','active');
</script>
<div > </div>

