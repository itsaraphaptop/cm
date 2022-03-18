<style type="text/css" media="screen">

</style>
<div class="content-wrapper"> 
  <div class="content"> 
    <div class="panel panel-flat"> 
      <div class="panel-heading"> 
      <h2>Project Forecast Monthly</h2> 
      <hr/> 
         <?php
            function count_m($pj_start,$pj_stop){

              $array_start = explode("-", $pj_start);
              $array_end = explode("-", $pj_stop);
              $count_month = 0;
              $months = array("01"  => 'JAN', 
                              "02"  => 'FEB', 
                              "03"  => 'MAR', 
                              "04"  => 'APR', 
                              "05"  => 'MAY', 
                              "06"  => 'JUN', 
                              "07"  => 'JUL', 
                              "08"  => 'AUG', 
                              "09"  => 'SEP', 
                              "10"  => 'OCT', 
                              "11"  => 'NOV', 
                              "12"  => 'DEC'
                              ); 
            $start_m = $array_start[1];
            $end_m = $array_end[1]*1;
            $array_all = array();

            for ($year = $array_start[0]; $year <= $array_end[0]; $year++) { 

              for ($count_month = $start_m*1 ; $count_month <= 12; $count_month++) { 

                  if($count_month <= 9){
                    $month_num = "0".$count_month;
                  }else{
                    $month_num = $count_month;
                  }

                  $array_all[] = $months[$month_num]."-".$year;
                  if ($year == $array_end[0] && $count_month==$end_m) {
                      break;
                  }

              }
              if ($count_month >= 12) {
                $start_m = 1;
              }
                  
            }

           return $array_all;

          }

          foreach ($project as $i => $data_pj) {
            $pj_name = $data_pj->project_name;
            $pj_name = $data_pj->project_name;
            $pj_code = $data_pj->project_code;
            $pj_start = $data_pj->project_start;
            $pj_stop = $data_pj->project_stop;;

            $monthly_array = count_m($pj_start,$pj_stop);
            $num_months = count($monthly_array);
            
        }
          
         ?>

        <div class="form-horizontal">
          <form method="post" action="<?php echo base_url(); ?>management_active/add_forecastmonthly">    
          <div class="form-group">

            <label class="col-lg-1 text-right">Project No.</label>
            <div class="col-lg-2">
              <input type="text" class="form-control input-sm" readonly="true" value="<?= $pj_code ?>">
              <input type="hidden" readonly="true" name="pj_id" value="<?= $pj_id ?>">
            </div>
     
            <label class="col-lg-1 text-right">Project Name</label>
            <div class="col-lg-2">
              <input type="text" class="form-control input-sm" readonly="true" value="<?= $pj_name ?>">
            </div>

            <label class="col-lg-1 text-right">Start</label>
            <div class="col-lg-2">
              <input type="date" class="form-control input-sm" readonly="true" value="<?= $pj_start ?>">
            </div>

            <label class="col-lg-1 text-right">Stop</label>
            <div class="col-lg-2">
              <input type="date" class="form-control input-sm" readonly="true" value="<?= $pj_stop ?>">
            </div>
            </div>
            <div class="form-horizontal"> 
            <?php 
                foreach ($budget as $i => $bg) { 
            ?> 

          <div class="form-group"> 
            <label class="col-lg-1 text-right">Total Budget</label> 
            <div class="col-lg-2"> 
              <input type="text" class="form-control input-sm text-right" readonly="true" value="<?= number_format($bg->budget,2) ?>"> 
            </div> 
          
            <label class="col-lg-1 text-right">Total Budget</label> 
            <div class="col-lg-2"> 
              <input type="text" class="form-control input-sm text-right" readonly="true" value="<?= number_format($bg->boq_amt,2) ?>"> 
            </div> 
 
            <label class="col-lg-1 text-right">Cost Saving</label> 
            <div class="col-lg-2"> 
              <input type="text"  class="form-control input-sm text-right" readonly="true" value="<?= number_format($bg->budget-$bg->boq_amt,2) ?>"> 
            </div> 
 
          </div> 
          <?php 
              } 
          ?> 

          </div>
          <div class="form-horizontal"> 
           <div class="table-responsive" style="overflow-x:auto;">
            <table class="table table-bordered table-fixed thead"> 
              <thead> 
                <tr> 
                  <th><div style="width: 25px;">Code</div></th> 
                  <th><div style="width: 150px;">Description</div></th> 
                  <th><div style="width: 10px;">BG</div></th> 
                  <th><div style="width: 100px;">Amount</div></th> 
                  <th><div style="width: 80px;">Start</div></th> 
                  <th><div style="width: 80;">End</div></th> 
                  <th><div style="width: 100px;">Days</div></th>
                  <th><div style="width: 100px;">Total</div></th> 
                  <th><div style="width: 120px;">Percent %</div></th> 
              <?php
              foreach ($monthly_array as $mon_i => $monthly) { 
             ?>
                <th class="text-center" ><div style="width: 130px;"><b><?=  $monthly ?></b></div></th>
             <?php
              }
              ?>  

              </tr> 
              </thead> 
              <tbody> 
                <?php  
                  foreach ($decsc as $i_desc => $bg_d) {
                ?>  
 
                  <?php 
 
                      $this->db->select('*'); 
                      $this->db->from('cost_group'); 
                      $this->db->where('cgroup_code', $bg_d->code_group1); 
                      $this->db->where('ctype_code', $bg_d->code_type1); 
                      $desc = $this->db->get()->result(); 
                      foreach ($desc as $index => $data_desc) { 
                ?> 
                <tr> 
                  <td></td> 
                  <td colspan="<?= $num_months ?>" ><?= $bg_d->code_group1 ?> <?= $data_desc->cgroup_name ?></td> 
                  </td> 
                </tr> 
                <tr> 
 
                  <td>
                    <?= $bg_d->boq_costmat ?>
                    <input type="hidden" readonly="true" name="cost_code[]" value="<?= $bg_d->boq_costmat ?>">
                  </td> 
                <?php 
 
                      $this->db->select('csubgroup_name'); 
                      $this->db->from('cost_subgroup'); 
                      $this->db->where('csubgroup_code', $bg_d->code_subgroup1); 
                      $this->db->where('cgroup_code', $bg_d->code_group1); 
                      $this->db->where('ctype_code', $bg_d->code_type1); 
                      $sub_desc = $this->db->get()->result(); 
                      foreach ($sub_desc as $i_sub => $data_sub) { 
                ?>
                  <td> 
                    <?= $data_sub->csubgroup_name;  ?>
                  </td>

                <?php 
                      } 

                ?>

                  <td> 
                    <?php 
                    if ($bg_d->chkcontroll === NULL ) {
                    ?>
                      <input type="checkbox" disabled="true" checked>
                    <?php
                    }else{
                    ?>
                      <input type="checkbox" disabled="true">
                  </td>
                    <?php
                     
                    }
                    
                    ?>
              
                  <td class="text-right">
                    <?= number_format($bg_d->boq_budget_amt,2);  ?>
                    <input type="hidden" id="budget<?=$bg_d->boq_costmat?>" class="form-control" value="<?= $bg_d->boq_budget_amt ?>">
                  </td>

                  <td class="text-right">
                    <input type="date" id="start<?=$bg_d->boq_costmat?>" name="start[]" class="form-control" value="<?= $pj_start ?>" style="border: 2px solid green; border-radius: 4px;">
                  </td>

                  <td class="text-right">
                    <input type="date" id="stop<?=$bg_d->boq_costmat?>" name="end[]" class="form-control" value="<?= $pj_stop ?>" style="border: 2px solid green; border-radius: 4px;">
                  </td>

                  <td class="text-right">
                    <input type="text" name="" class="day<?=$bg_d->boq_costmat?> form-control text-right" readonly="true">
                    <input type="hidden" name="" class="month<?=$bg_d->boq_costmat?> form-control text-right">
                  </td>

                  <td class="text-right">
                    <input type="text"  id="total_mat<?=$bg_d->boq_costmat?>" class="form-control text-right" readonly="true">
                    <input type="hidden" id="input<?= $bg_d->boq_costmat ?>" >
                    <input type="hidden" id="count_m<?= $bg_d->boq_costmat ?>" value="0">
                  </td>

                  <td class="text-right">
                    <div class="input-group">
                        <input type="number" class="form-control text-right" id="percent<?=$bg_d->boq_costmat?>" value="0" >
                        <span class="input-group-addon">%</span>
                    </div>
                  </td>

                  <?php
                   foreach ($monthly_array as $mon_i => $monthly) {
                  ?>
                    <td class="text-right">
                      <input type="text" name="price<?= $bg_d->boq_costmat ?>[]" id="monthly_mat<?= $monthly ?><?=$bg_d->boq_costmat?>" monthly="<?= $monthly ?><?=$bg_d->boq_costmat?>" class="monthly_mat<?=$bg_d->boq_costmat?> form-control text-right" value="0" >
                      <input type="hidden" readonly="true" name="month<?= $bg_d->boq_costmat ?>[]" value="<?= $monthly ?>">
                    </td>
                    <script type="text/javascript">

                    $('#monthly_mat<?= $monthly ?><?=$bg_d->boq_costmat?>').keyup(function(event) {

                      var sum = $('#input<?= $bg_d->boq_costmat ?>').val();

                      if (sum != "") {
                        
                        var total = 0;
                        monthArray = sum.split(",");
                        $.each(monthArray, function(index, val) {
                              var price =  ($('#monthly_mat'+val).val()*1);
                              total += price;
                        });
                        $('#total_mat<?=$bg_d->boq_costmat?>').val(total);
                        var price_all  = ($('#budget<?=$bg_d->boq_costmat?>').val()*1);
                        var percent = (total/price_all)*100;
                        if (percent <= 100) {
                          $('#percent<?=$bg_d->boq_costmat?>').val(percent.toFixed(2));
                        }else{
                          swal("Error!", "กรุณากรอกใหม่!", "error");
                          $('#monthly_mat<?= $monthly ?><?=$bg_d->boq_costmat?>').val(0);
                          $('#total_mat<?=$bg_d->boq_costmat?>').val(0);
                        }


                      }else{
                        
                        var get_m = jQuery.parseJSON('<?= json_encode($monthly_array) ?>');
                        var total = 0;
                           $.each(get_m, function(index, val) {
                              var mat_code = '<?=$bg_d->boq_costmat?>';
                              var price =  ($('#monthly_mat'+val+mat_code).val()*1);
                              total += price;
                           });
                        $('#total_mat<?=$bg_d->boq_costmat?>').val(total);
                        var price_all  = ($('#budget<?=$bg_d->boq_costmat?>').val()*1);
                        var percent = (total/price_all)*100;
                        if (percent <= 100) {
                          $('#percent<?=$bg_d->boq_costmat?>').val(percent.toFixed(2));
                        }else{
                          swal("Error!", "กรุณากรอกใหม่!", "error");
                          $('#monthly_mat<?= $monthly ?><?=$bg_d->boq_costmat?>').val(0);
                          $('#total_mat<?=$bg_d->boq_costmat?>').val(0);
                        }
                        
                      }


                        
                    });

                                      
                    $('#percent<?=$bg_d->boq_costmat?>').keyup(function(event) {
                      var percent_mat =  $('#percent<?=$bg_d->boq_costmat?>').val();
                      var num_mat = 100;

                      
                      var count_m = $('#count_m<?= $bg_d->boq_costmat ?>').val();

                      if (percent_mat > num_mat) {
                        swal("Error", "กรอกได้มากสุด 100% เท่านั้น!", "error");
                        $('#percent<?=$bg_d->boq_costmat?>').val(0);
                      }

                      var bd_amt = $('#budget<?=$bg_d->boq_costmat?>').val();
                      var sub = (percent_mat*bd_amt)/100;

                      var all_m = "<?= $num_months ?>";

                    
                      
                      if(count_m != 0){

                          if (count_m <= all_m) {
                              
                              var monthly_amt = count_m;
                              var sub_amt =(sub/monthly_amt)*1;
                          }else{
                              
                              var monthly_amt = "<?= $num_months ?>";
                              var sub_amt = (sub/monthly_amt)*1;
                          }
                          var amt = sub_amt.toFixed(2);
                          var data_m = $('#input<?= $bg_d->boq_costmat ?>').val();
                          monthArray = data_m.split(",");
                          $.each(monthArray, function(index, val) {
                            var met = '<?=$bg_d->boq_costmat?>';
                              $('#monthly_mat'+val).val(amt);
                              $('#total_mat<?=$bg_d->boq_costmat?>').val(sub);
                          });
                      }else{
                        var monthly_amt = "<?= $num_months ?>";
                        var sub_amt = (sub/monthly_amt)*1;
                        var amt = sub_amt.toFixed(2);
                        $('.monthly_mat<?=$bg_d->boq_costmat?>').val(amt);
                        $('#total_mat<?=$bg_d->boq_costmat?>').val(sub);
                      }


                    });


                    </script>
                  <?php
                    }
                  ?>

                  <script type="text/javascript">

                     function get_month(start_edit,stop_edit,mat){

                        var mat_code = mat;
                        var start = start_edit;
                        var end = stop_edit;
                        var count_month = 0;
                        var month_num = 0;
                        var months = {  1  : 'JAN', 
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


                        startArray = start.split("-");
                        endArray = end.split("-");
                        var start_m = (startArray[1]*1);
                        var end_m = endArray[1];
                        var all_month = new Array();

                        for (var year = startArray[0]; year <= endArray[0]; year++) {
                          
                          for (count_month = start_m; count_month <= 12; count_month++) {

                          
                                 month_num  = count_month;
                            

                            all_month.push(months[month_num]+'-'+year+mat_code);
                            if (year == endArray[0] && count_month == end_m) {
                              break;
                            }

                          }

                          if (count_month >= 12) {
                              start_m = 1;
                          }


                        }
                          return all_month;


                      }

                    $('#start<?= $bg_d->boq_costmat ?>, #stop<?= $bg_d->boq_costmat ?>').bind("click, keyup, change", function(event) {
                      var start_edit = $('#start<?= $bg_d->boq_costmat ?>').val();
                      var stop_edit = $('#stop<?= $bg_d->boq_costmat ?>').val();
                      var start_time_edit = toTimestamp(start_edit);
                      var stop_time_edit = toTimestamp(stop_edit);
                      var res_edit = ((stop_time_edit*1)-(start_time_edit*1))/86400;
                      $(".day<?=$bg_d->boq_costmat?>").val(res_edit);

                      

                      var start_edit = $('#start<?= $bg_d->boq_costmat ?>').val();
                      var stop_edit = $('#stop<?= $bg_d->boq_costmat ?>').val();
                      var mat = "<?= $bg_d->boq_costmat ?>";

                      var chk_m = get_month(start_edit,stop_edit,mat);
                      var c_m = chk_m.length;

                      var month_get = jQuery.parseJSON('<?= json_encode($monthly_array) ?>');

                     $.each(month_get, function(index, val) {
                      var chk_month =  $('#monthly_mat'+val+mat).attr('monthly');


                      var chk =  $.inArray(chk_month,chk_m);
                      if(chk == -1){
                        $('#monthly_mat'+val+mat).attr('readonly', 'true');
                        $('#monthly_mat'+val+mat).attr('style', 'border: 2px solid red; border-radius: 4px;');
                        $('#percent'+mat).val(0);
                        $('#monthly_mat'+val+mat).val(0);
                      }else{
                        $('#monthly_mat'+val+mat).val(0);
                        $('#percent'+mat).val(0);
                        $('#monthly_mat'+val+mat).removeAttr('readonly');
                        $('#monthly_mat'+val+mat).removeAttr('style');
                      }
                  

                     });

                     $('#input'+mat).val(chk_m);
                     $('#count_m'+mat).val(c_m);
                    
                       


                     
                    });
                  </script>

                </tr> 

                <tr> 
                <td>
                  <?= $bg_d->boq_costsub ?>
                  <input type="hidden" readonly="true" name="cost_code[]" value="<?= $bg_d->boq_costsub ?>">
                </td> 
                <td> 
                <?php 

                      $this->db->select('csubgroup_name'); 
                      $this->db->from('cost_subgroup'); 
                      $this->db->where('csubgroup_code', $bg_d->code_subgroup2); 
                      $this->db->where('cgroup_code', $bg_d->code_group2); 
                      $this->db->where('ctype_code', $bg_d->code_type2); 
                      $sub_desc = $this->db->get()->result(); 
                      foreach ($sub_desc as $i_sub => $data_sub) { 
                        echo $data_sub->csubgroup_name; 
                         
                      } 
                ?>

                  <td> 
                    <?php 
                    if ($bg_d->chkcontroll === NULL ) {
                    ?>
                      <input type="checkbox" disabled="true" checked>
                    <?php
                    }else{
                    ?>
                      <input type="checkbox" disabled="true">
                    <?php
                     
                    }
                    
                    ?>
                  </td>

                  <td class="text-right">
                    <?= number_format($bg_d->boq_lab_amt,2);  ?>
                    <input type="hidden" id="lab<?=$bg_d->boq_costsub?>" class="form-control" value="<?= $bg_d->boq_lab_amt ?>">
                  </td>

                  <td class="text-right">
                    <input type="date" id="start_sub<?=$bg_d->boq_costsub?>" name="start[]" class="form-control" value="<?= $pj_start ?>" style="border: 2px solid green; border-radius: 4px;">
                  </td>

                  <td class="text-right">
                    <input type="date" id="stop_sub<?=$bg_d->boq_costsub?>" name="end[]" class="form-control" value="<?= $pj_stop ?>" style="border: 2px solid green; border-radius: 4px;">
                  </td>

                  <td class="text-right">
                    <input type="text" name=""  class="day<?=$bg_d->boq_costsub?> form-control text-right" readonly="true" >
                    <input type="hidden" name="" class="month<?=$bg_d->boq_costsub?> form-control text-right">
                  </td>
                  
                   <td class="text-right">
                    <input type="text"  id="total_sub<?=$bg_d->boq_costsub?>" class="form-control text-right" readonly="true">
                    <input type="hidden" id="input_sub<?= $bg_d->boq_costsub ?>" >
                    <input type="hidden" id="count_m_sub<?= $bg_d->boq_costsub ?>" value="0">
                  </td>

                  <td class="text-right">
                    <div class="input-group">
                        <input type="number" class="form-control text-right" id="percent_i<?=$bg_d->boq_costsub?>" value="0">
                        <span class="input-group-addon">%</span>
                    </div>
                  </td>

                  <?php
                   foreach ($monthly_array as $mon_i => $monthly) {
                  ?>
                    <td class="text-right">
                      <input type="text" name="price<?=$bg_d->boq_costsub?>[]" id="monthly_sub<?= $monthly ?><?=$bg_d->boq_costsub?>" monthly="<?= $monthly ?><?=$bg_d->boq_costsub?>" class="monthly_sub<?=$bg_d->boq_costsub?> form-control text-right" value="0">
                      <input type="hidden" readonly="true" name="month<?=$bg_d->boq_costsub?>[]" value="<?= $monthly ?>">

                    </td>

                    <script type="text/javascript">

                     $('#monthly_sub<?= $monthly ?><?=$bg_d->boq_costsub?>').keyup(function(event) {

                      var sum = $('#input_sub<?= $bg_d->boq_costsub ?>').val();

                      if (sum != "") {
                       
                        var total = 0;
                        monthArray = sum.split(",");
                        $.each(monthArray, function(index, val) {
                              var price =  ($('#monthly_sub'+val).val()*1);
                              total += price;
                        });
                        $('#total_sub<?=$bg_d->boq_costsub?>').val(total);
                        var price_all  = ($('#lab<?=$bg_d->boq_costsub?>').val()*1);
                        var percent = (total/price_all)*100;
                        if (percent <= 100) {
                          $('#percent_i<?=$bg_d->boq_costsub?>').val(percent.toFixed(2));
                        }else{
                          swal("Error!", "กรุณากรอกใหม่!", "error");
                          $('#monthly_sub<?= $monthly ?><?=$bg_d->boq_costsub?>').val(0);
                          $('#total_sub<?=$bg_d->boq_costsub?>').val(0);
                        }


                      }else{
                        
                        var get_m = jQuery.parseJSON('<?= json_encode($monthly_array) ?>');
                        var total = 0;
                           $.each(get_m, function(index, val) {
                              var mat_code = '<?=$bg_d->boq_costsub?>';
                              var price =  ($('#monthly_sub'+val+mat_code).val()*1);
                              total += price;
                           });
                        $('#total_sub<?=$bg_d->boq_costsub?>').val(total);
                        var price_all  = ($('#lab<?=$bg_d->boq_costsub?>').val()*1);
                        var percent = (total/price_all)*100;
                        if (percent <= 100) {
                        $('#percent_i<?=$bg_d->boq_costsub?>').val(percent.toFixed(2));
                        }else{
                          swal("Error!", "กรุณากรอกใหม่!", "error");
                          $('#monthly_sub<?= $monthly ?><?=$bg_d->boq_costsub?>').val(0);
                          $('#total_sub<?=$bg_d->boq_costsub?>').val(0);
                        }
                        
                      }


                        
                    });


                    $('#percent_i<?=$bg_d->boq_costsub?>').keyup(function(event) {
                    var percent =  $('#percent_i<?=$bg_d->boq_costsub?>').val();
                    var num = 100;
                    if (percent > num) {
                      swal("Error", "กรอกได้มากสุด 100% เท่านั้น!", "error");
                      $('#percent_i<?=$bg_d->boq_costsub?>').val(0);
                    }

                      var count_m = $('#count_m_sub<?= $bg_d->boq_costsub ?>').val();
                      var lab_amt = $('#lab<?=$bg_d->boq_costsub?>').val();
                      var lab = (percent*lab_amt)/100;
   
                      
                      var all_m = "<?= $num_months ?>";

                      
                      if(count_m != 0){

                          if (count_m <= all_m) {
                            
                              var monthly_sub = count_m;
                              var lab_sub_amt =(lab/monthly_sub)*1;
                          }else{
                             
                              var monthly_sub = "<?= $num_months ?>";
                              var lab_sub_amt = (lab/monthly_sub)*1;
                          }

                          var data_m = $('#input_sub<?= $bg_d->boq_costsub ?>').val();
                          var lab_amt = lab_sub_amt.toFixed(2);
                          monthArray = data_m.split(",");
                          $.each(monthArray, function(index, val) {
                              $('#monthly_sub'+val).val(lab_amt);
                          });
                          $('#total_sub<?=$bg_d->boq_costsub?>').val(lab);

                      }else{
                        
                        var monthly_sub = "<?= $num_months ?>";
                        var lab_sub_amt = (lab/monthly_sub)*1;
                        var lab_amt = lab_sub_amt.toFixed(2);
                        $('.monthly_sub<?=$bg_d->boq_costsub?>').val(lab_amt);
                        $('#total_sub<?=$bg_d->boq_costsub?>').val(lab);
                      }
                     

                  });
                  </script>
                                
                  <?php
                    }
                  ?>

                     <script type="text/javascript">

                    $('#start_sub<?= $bg_d->boq_costsub ?>, #stop_sub<?= $bg_d->boq_costsub ?>').bind("click, keyup, change", function(event) {

               

                      var start_edit = $('#start_sub<?= $bg_d->boq_costsub ?>').val();
                      var stop_edit = $('#stop_sub<?= $bg_d->boq_costsub ?>').val();
                      var start_time_edit = toTimestamp(start_edit);
                      var stop_time_edit = toTimestamp(stop_edit);
                      var res_edit = ((stop_time_edit*1)-(start_time_edit*1))/86400;
                      $(".day<?=$bg_d->boq_costsub?>").val(res_edit);


                      var mat = "<?= $bg_d->boq_costsub ?>";

                      var chk_m = get_month(start_edit,stop_edit,mat);
                      var c_m = chk_m.length;

                      var month_get = jQuery.parseJSON('<?= json_encode($monthly_array) ?>');

                     $.each(month_get, function(index, val) {
                      var chk_month =  $('#monthly_sub'+val+mat).attr('monthly');


                      var chk =  $.inArray(chk_month,chk_m);
                      if(chk == -1){
                        $('#monthly_sub'+val+mat).attr('readonly', 'true');
                        $('#monthly_sub'+val+mat).attr('style', 'border: 2px solid red; border-radius: 4px;');
                        $('#percent_i'+mat).val(0);
                        $('#monthly_sub'+val+mat).val(0);
                      }else{
                        $('#monthly_sub'+val+mat).val(0);
                        $('#monthly_sub'+val+mat).removeAttr('readonly');
                        $('#monthly_sub'+val+mat).removeAttr('style');
                      }
                  

                     });

                     $('#input_sub'+mat).val(chk_m);
                     $('#count_m_sub'+mat).val(c_m);

                     
                    });
                  </script>

                </tr> 
               
                <?php 
                      }
                ?>
                <script type="text/javascript">
                  function toTimestamp(strDate){
                    var datum = Date.parse(strDate);
                    return datum/1000;
                  }
                  var start = $('#start<?=$bg_d->boq_costmat?>').val();
                  var stop = $('#stop<?=$bg_d->boq_costmat?>').val();
                  var start_time = toTimestamp(start);
                  var stop_time = toTimestamp(stop);
                  var res = ((stop_time*1)-(start_time*1))/86400;
                  var monthly = Math.floor(res/30);
                  $(".day<?=$bg_d->boq_costmat?>").val(res);
                  $(".day<?=$bg_d->boq_costsub?>").val(res);
                  $(".month<?=$bg_d->boq_costmat?>").val(monthly);
                  // alert(monthly);


                </script>
                <?php 
                  } 
                ?> 

              </tbody> 
            </table>
            </td> 
          </div> 
          <div><br/>
            <button type="submit" class="btn btn-success">
              <i class="icon-floppy-disk position-left"></i> Save
            </button>
          </div>
          </form>
        </div>
        </div>
      </div> 
    </div> 
  </div> 
</div>
 
<script type="text/javascript"> 
  $('#data_master').DataTable(); 
  $('#tra').attr('class', 'active');
  $('#tra_sub7').attr('style', 'background-color:#dedbd8');
</script>