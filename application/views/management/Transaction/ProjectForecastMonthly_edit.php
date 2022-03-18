<div class="content-wrapper"> 
  <!-- Page header --> 
 
  <div class="content"> 
    <div class="panel panel-flat"> 
      <div class="panel-heading"> 
      <h2>Project Forecast Monthly</h2> 
      <hr/> 
         <?php
            function get_month($date){

            $array_start = explode("-", $date);
            $array_month = array();
            $months = array(  "01"  => 'JAN', 
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
            $month = $array_start[0];
            $year = $array_start[1];
            $m = array_search($month,$months);
            $data = $m."-".$year;
            return $data;

            }

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
          <form method="post" action="<?php echo base_url(); ?>management_active/edit_forecastmonthly">    
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

       <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-top top-divided">
                  <li  class="active"><a href="#top-divided-tab" data-toggle="tab">Project Forecast Monthly</a></li>
                  <li id="tab_Graph"><a href="#top-divided-tab1" data-toggle="tab">Graph</a></li>
                </ul>
        <div class="tab-content">
        <!-- start tab -->
          <div class="tab-pane active" id="top-divided-tab">
          <div class="form-horizontal"> 
            <div>
              <a class="btn btn-success" id="payment_tr">
                <i class="icon-cash3 position-left"></i> Payment
              </a>
              <a class="btn btn-primary" id="forecast">
                <i class="icon-file-text2 position-left"></i> Forecast Monthly
              </a>
              <a class="btn btn-info" id="purchase">
                <i class="icon-clipboard3 position-left"></i> Purchase Cost
              </a>
              <a class="btn btn-warning" id="booking">
                <i class="icon-stack-text position-left"></i> Booking
              </a>
              <a class="btn btn-danger" id="achase">
                <i class="icon-coins position-left"></i> Achase Cost
              </a>
            </div><br/>
           <div class="table-responsive" style="overflow-x:auto;">
            <table class="table table-bordered"> 
              <thead> 
                <tr> 
                  <th><div style="width: 25px;">Code</div></th> 
                  <th><div style="width: 150px;">Description</div></th> 
                  <th><div style="width: 10px;">BG</div></th> 
                  <th><div style="width: 100px;">Amount</div></th> 
                  <th><div style="width: 100px;">Start</div></th> 
                  <th><div style="width: 100px;">End</div></th> 
                  <th><div style="width: 100px;">Days</div></th>
                  <th><div style="width: 100px;">Total</div></th> 
                  <th><div style="width: 150px;">Percent %</div></th> 
              <?php
              foreach ($monthly_array as $mon_i => $monthly) { 
             ?>
                <th class="text-center" ><div style="width: 150px;"><b><?=  $monthly ?></b></div></th>
             <?php
              }
              ?>  
              </tr> 
              </thead> 
              <tbody> 
                <!-- payment -->
        
                <tr id="payment" style="display: none;" >
                  <td colspan="4" class="text-right"><b>Payment</b></td>

                  <td class="text-right">
                    <input type="date" id="start_payment" name="start_payment" class="form-control" value="<?= $pj_start ?>" style="border: 2px solid green; border-radius: 4px;">
                  </td>

                  <td class="text-right">
                    <input type="date" id="stop_payment" name="stop_payment" class="form-control" value="<?= $pj_stop ?>" style="border: 2px solid green; border-radius: 4px;">
                  </td>
                  <td>
                    <input type="text" class="day_payment form-control text-right" readonly="true" value="">
                  </td>
                  <td>
                      <input type="text" class="total_payment form-control text-right" readonly="true" value="0">
                  </td>
                  <td colspan="1"></td>

                <?php
                    $all_price = 0;
                    foreach ($monthly_array as $mon_i => $monthly) {

                      $this->db->select('price');
                      $this->db->from('forecast_payment'); 
                      $this->db->where('project_id', $pj_id); 
                      $this->db->where('month_year', $monthly); 
                      $query_pay = $this->db->get()->result(); 

                    if (!empty($query_pay)) {
                      foreach ($query_pay as $payi => $pay_price) {
                        $all_price += $pay_price->price;
                ?>
                  <td>
                     <input type="text" class="form-control text-right" name="payment_price[]" value="<?= $pay_price->price ?>" id="<?= "payment".$monthly?>"  month_pay="<?= $monthly ?>">
                     <input type="hidden"  value="<?=$monthly?>" id="<?=$monthly?>"  name="paymonth[]">
                  </td>
                 
                <?php
                      }
                    }else{
                ?>
                  <td>
                     <input type="text" class="form-control text-right" name="payment_price[]" value="0" id="<?= "payment".$monthly?>"  month_pay="<?= $monthly ?>">
                     <input type="hidden"  value="<?=$monthly?>" id="<?=$monthly?>"  name="paymonth[]">
                  </td>
                <?php
                    }
                ?>
               
                  
                  <script type="text/javascript">
                    var all_price = '<?= $all_price ?>';
                    $('.total_payment').val(all_price);

                    var pay_m = '<?= $monthly ?>';
                    $('#payment'+pay_m).keyup(function(event) {

                      var sum = 0;

                        $("[id^='payment']").each(function(index, el) {
                          var amt = $(el).val().replace(/,/g,"");
                          sum+= (amt*1);
                        });

                        $('.total_payment').val(sum);
                    });
                  </script>
                <?php
                    }
                ?>
                </tr>
              
                <!-- payment -->

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

                  <?php
                      $this->db->select('start,end,month_year,costcode,price');
                      $this->db->select('SUM(price) as all_price');
                      $this->db->from('forecast_month');
                      $this->db->where('costcode',$bg_d->boq_costmat);
                      $this->db->where('project_id',$pj_id);
                      $this->db->group_by("costcode");
                      $start_end = $this->db->get()->result(); 
                      foreach ($start_end as $rowi => $datadate) {

                      $end_mat = strtotime($datadate->end);
                      $start_mat = strtotime($datadate->start);
                      $day_mat_all = ($end_mat-$start_mat)/86400;
                      $day_mat = floor($day_mat_all);

                      $total_mat = round($datadate->all_price);
                      $percent_mat = ($total_mat/$bg_d->boq_budget_amt)*100;
                      
                  ?>
                  <td class="text-right">
                    <input type="date" id="start<?=$bg_d->boq_costmat?>" name="start[]" class="form-control" value="<?= $datadate->start ?>" style="border: 2px solid green; border-radius: 4px;">
                  </td>

                  <td class="text-right">
                    <input type="date" id="stop<?=$bg_d->boq_costmat?>" name="end[]" class="form-control" value="<?= $datadate->end ?>" style="border: 2px solid green; border-radius: 4px;">
                  </td>

                  <td class="text-right">
                    <input type="text" class="day<?=$bg_d->boq_costmat?> form-control text-right" readonly="true" value="<?= $day_mat ?>">
                    <input type="hidden" class="month<?=$bg_d->boq_costmat?> form-control text-right">
                  </td>

                  <td class="text-right">
                    <input type="text"  id="total<?=$bg_d->boq_costmat?>" class="form-control text-right" readonly="true" value="<?= number_format($total_mat) ?>">
                    <input type="hidden" id="input<?= $bg_d->boq_costmat ?>" >
                    <input type="hidden" id="count_m<?= $bg_d->boq_costmat ?>" value="0">
                  </td>


                  <td class="text-right">
                    <div class="input-group">
                        <input type="number" class="form-control text-right" id="percent<?=$bg_d->boq_costmat?>" value="<?= $percent_mat ?>" >
                        <span class="input-group-addon">%</span>
                    </div>
                  </td>
                  <?php
                    }
                  ?>

                  <?php
                  
                   foreach ($monthly_array as $mon_i => $monthly) {
                    $this->db->select('price,month_year,costcode');
                    $this->db->from('forecast_month');
                    $this->db->where('costcode',$bg_d->boq_costmat);
                    $this->db->where('project_id',$pj_id);
                    $this->db->where('month_year',$monthly);
                    $price_m = $this->db->get()->result();
                    foreach ($price_m as $key_ii => $data_mat) {

                  ?>
                    <td class="text-right">
                  <?php
                        if ($data_mat->price != 0) {
                  ?>
                        <input type="text" name="price<?=$bg_d->boq_costmat?>[]" id="monthly_mat<?= $monthly ?><?=$bg_d->boq_costmat?>" monthly="<?= $monthly ?><?=$bg_d->boq_costmat?>" class="monthly_mat<?=$bg_d->boq_costmat?> form-control text-right" value="<?= $data_mat->price ?>" >
                  <?php
                        }else{
                  ?>
                      <input type="text" name="price<?=$bg_d->boq_costmat?>[]" id="monthly_mat<?= $monthly ?><?=$bg_d->boq_costmat?>" monthly="<?= $monthly ?><?=$bg_d->boq_costmat?>" class="monthly_mat<?=$bg_d->boq_costmat?> form-control text-right" value="<?= $data_mat->price ?>" style="border: 2px solid red; border-radius: 4px;" readonly="true" >
                  <?php        
                        }
                  ?>
                      
                      <input type="hidden" readonly="true" name="month<?=$bg_d->boq_costmat?>[]" value="<?= $monthly ?>">
                    </td>

                  <?php
                  }
                  ?>
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
                        var price_all  = ($('#budget<?=$bg_d->boq_costmat?>').val()*1);
                        var percent = (total/price_all)*100;
                        if (percent <= 100) {
                          $('#percent<?=$bg_d->boq_costmat?>').val(percent.toFixed(2));
                        }else{
                          swal("Error!", "กรุณากรอกใหม่!", "error");
                          $('#monthly_mat<?= $monthly ?><?=$bg_d->boq_costmat?>').val(0)
                        }


                      }else{
                        var get_m = jQuery.parseJSON('<?= json_encode($monthly_array) ?>');
                        var total = 0;
                           $.each(get_m, function(index, val) {
                              var mat_code = '<?=$bg_d->boq_costmat?>';
                              var price =  ($('#monthly_mat'+val+mat_code).val()*1);
                              total += price;
                           });
                        var price_all  = ($('#budget<?=$bg_d->boq_costmat?>').val()*1);
                        var percent = (total/price_all)*100;
                        if (percent <= 100) {
                          $('#percent<?=$bg_d->boq_costmat?>').val(percent.toFixed(2));
                        }else{
                          swal("Error!", "กรุณากรอกใหม่!", "error");
                          $('#monthly_mat<?= $monthly ?><?=$bg_d->boq_costmat?>').val(0)
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
                              var sub_amt = Math.ceil((sub/monthly_amt)*1);
                          }else{
                              
                              var monthly_amt = "<?= $num_months ?>";
                              var sub_amt = Math.ceil((sub/monthly_amt)*1);
                          }

                          var data_m = $('#input<?= $bg_d->boq_costmat ?>').val();
                          monthArray = data_m.split(",");
                          $.each(monthArray, function(index, val) {
                            var met = '<?=$bg_d->boq_costmat?>';
                              $('#monthly_mat'+val).val(sub_amt);
                          });
                      }else{
                        var monthly_amt = "<?= $num_months ?>";
                        var sub_amt = Math.ceil((sub/monthly_amt)*1);
                        $('.monthly_mat<?=$bg_d->boq_costmat?>').val(sub_amt);
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

                      function get_month_pay(start_edit,stop_edit){

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
                            

                            all_month.push(months[month_num]+'-'+year);
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

                    function toTimestamp(strDate){
                      var datum = Date.parse(strDate);
                      return datum/1000;
                    }

                      var start_edit = $('#start_payment').val();
                      var stop_edit = $('#stop_payment').val();
                      var start_time_edit = toTimestamp(start_edit);
                      var stop_time_edit = toTimestamp(stop_edit);
                      var res_edit = ((stop_time_edit*1)-(start_time_edit*1))/86400;
                      $(".day_payment").val(res_edit);

                    $('#start_payment , #stop_payment').bind('click, keyup, change', function(event) {

                          var start_edit = $('#start_payment').val();
                          var stop_edit = $('#stop_payment').val();
                          var start_time_edit = toTimestamp(start_edit);
                          var stop_time_edit = toTimestamp(stop_edit);
                          var res_edit = ((stop_time_edit*1)-(start_time_edit*1))/86400;
                          $(".day_payment").val(res_edit);


                          var chk_m = get_month_pay(start_edit,stop_edit);
                          var month_get = jQuery.parseJSON('<?= json_encode($monthly_array) ?>');
                          $.each(month_get, function(index, val) {
                          var chk_month =  $('#payment'+val).attr('month_pay');



                          var chk =  $.inArray(chk_month,chk_m);

                         
                          if(chk == -1){
                            $('#payment'+val).attr('readonly', 'true');
                            $('#payment'+val).attr('style', 'border: 2px solid red; border-radius: 4px;');
                            $('#percent').val(0);
                            $('#payment'+val).val(0);
                          }else{
                            $('#payment'+val).val(0);
                            $('#percent').val(0);
                            $('#payment'+val).removeAttr('readonly');
                            $('#payment'+val).removeAttr('style');
                          }
                      

                         });
                          


                    });




                    $('#start<?= $bg_d->boq_costmat ?>, #stop<?= $bg_d->boq_costmat ?>').bind("click, keyup, change", function(event) {


                      var start_edit = $('#start<?= $bg_d->boq_costmat ?>').val();
                      var stop_edit = $('#stop<?= $bg_d->boq_costmat ?>').val();
                      var start_time_edit = toTimestamp(start_edit);
                      var stop_time_edit = toTimestamp(stop_edit);
                      var res_edit = ((stop_time_edit*1)-(start_time_edit*1))/86400;
                      $(".day<?=$bg_d->boq_costmat?>").val(res_edit);

                      

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
                <tr id="purchase<?= $bg_d->boq_costmat ?>" style="display: none;" >
                  <td colspan="9" class="text-right"><b>Purchase</b></td>
                <?php
                    foreach ($monthly_array as $mon_i => $monthly) {
                      $month = get_month($monthly);
                ?>
                  <td>
                     <input type="text" class="form-control text-right" readonly="true" value="0" id="<?= "purchase".$month.$bg_d->boq_costmat ?>" style="background-color:#99FFFF;"> 
                  </td>
                <?php
                    }
                ?>
                </tr>
                <tr id="booking<?= $bg_d->boq_costmat ?>" style="display: none;">
                  <td colspan="9" class="text-right"><b>Booking</b></td>
                 <?php
                    foreach ($monthly_array as $mon_i => $monthly) {
                      $month = get_month($monthly);
                ?>
                  <td>
                     <input type="text" class="form-control text-right" value="0" readonly="true" id="<?= "booking".$month.$bg_d->boq_costmat ?>" style="background-color:#FFCC99;"> 
                  </td>
                <?php
                    }
                ?>
                </tr>
                <tr id="achase<?= $bg_d->boq_costmat ?>" style="display: none;" >
                  <td colspan="9" class="text-right"><b>Achase</b></td>
                <?php
                    foreach ($monthly_array as $mon_i => $monthly) {
                      $month = get_month($monthly);
                ?>
                  <td>
                     <input type="text" class="form-control text-right" value="0" readonly="true" id="<?= "achase".$month.$bg_d->boq_costmat ?>" style="background-color:#FFCC66;"> 
                  </td>
                <?php
                    }
                ?>
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
                  </td>

                  <td class="text-right">
                    <?= number_format($bg_d->boq_lab_amt,2);  ?>
                    <input type="hidden" id="lab<?=$bg_d->boq_costsub?>" class="form-control" value="<?= $bg_d->boq_lab_amt ?>">
                  </td>

                    <?php
                     
                    }
                    

                    $this->db->select('start,end');
                    $this->db->select('SUM(price) as all_price_sub');
                    $this->db->from('forecast_month');
                    $this->db->where('costcode',$bg_d->boq_costsub);
                    $this->db->where('project_id',$pj_id);
                    $this->db->group_by("costcode");
                    $start_end_sub = $this->db->get()->result(); 
                     foreach ($start_end_sub as $rowii => $data_sub) {

                      $end_sub = strtotime($data_sub->end);
                      $start_sub = strtotime($data_sub->start);
                      $day_sub_all = ($end_sub-$start_sub)/86400;
                      $day_sub = floor($day_sub_all);

                      $total_sub = round($data_sub->all_price_sub);
                      $percent_sub = ($total_sub/$bg_d->boq_lab_amt)*100;



                    ?>

                  <td class="text-right">
                    <input type="date" id="start_sub<?=$bg_d->boq_costsub?>" name="start[]" class="form-control" value="<?= $data_sub->start ?>" style="border: 2px solid green; border-radius: 4px;">
                  </td>

                  <td class="text-right">
                    <input type="date" id="stop_sub<?=$bg_d->boq_costsub?>" name="end[]" class="form-control" value="<?= $data_sub->end ?>" style="border: 2px solid green; border-radius: 4px;">
                  </td>

                  <td class="text-right">
                    <input type="text" name=""  class="day<?=$bg_d->boq_costsub?> form-control text-right" readonly="true" value="<?= $day_sub ?>" >
                    <input type="hidden" name="" class="month<?=$bg_d->boq_costsub?> form-control text-right">
                  </td>
                  
                   <td class="text-right">
                    <input type="text"  id="total<?=$bg_d->boq_costmat?>" class="form-control text-right" readonly="true" value="<?= number_format($total_sub) ?>">
                    <input type="hidden" id="input_sub<?= $bg_d->boq_costsub ?>" >
                    <input type="hidden" id="count_m_sub<?= $bg_d->boq_costsub ?>" value="0">
                  </td>

                  <td class="text-right">
                    <div class="input-group">
                        <input type="number" class="form-control text-right" id="percent_i<?=$bg_d->boq_costsub?>" value="<?= $percent_sub ?>">
                        <span class="input-group-addon">%</span>
                    </div>
                  </td>

                  <?php
                  }
                   foreach ($monthly_array as $mon_i => $monthly) {

                    $this->db->select('price');
                    $this->db->from('forecast_month');
                    $this->db->where('costcode',$bg_d->boq_costsub);
                    $this->db->where('project_id',$pj_id);
                    $this->db->where('month_year',$monthly);
                    $price_month = $this->db->get()->result();
                    foreach ($price_month as $i_key => $data) {
                  ?>
                    <td class="text-right">
                  <?php
                    if ($data->price != 0) {
                  ?>
                     <input type="text" name="price<?=$bg_d->boq_costsub?>[]" id="monthly_sub<?= $monthly ?><?=$bg_d->boq_costsub?>" monthly="<?= $monthly ?><?=$bg_d->boq_costsub?>" class="monthly_sub<?=$bg_d->boq_costsub?> form-control text-right" value="<?= $data->price ?>">
                  <?php
                    }else{
                  ?>
                    <input type="text" name="price<?=$bg_d->boq_costsub?>[]" id="monthly_sub<?= $monthly ?><?=$bg_d->boq_costsub?>" monthly="<?= $monthly ?><?=$bg_d->boq_costsub?>" class="monthly_sub<?=$bg_d->boq_costsub?> form-control text-right" value="<?= $data->price ?>" style="border: 2px solid red; border-radius: 4px;" readonly="true">
                  <?php    
                    }
                  ?> 
                      <input type="hidden" readonly="true" name="month<?=$bg_d->boq_costsub?>[]" value="<?= $monthly ?>">

                    </td>
                  <?php
                }
                  ?>
                   
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
                        var price_all  = ($('#lab<?=$bg_d->boq_costsub?>').val()*1);
                        var percent = (total/price_all)*100;
                        if (percent <= 100) {
                          $('#percent_i<?=$bg_d->boq_costsub?>').val(percent.toFixed(2));
                        }else{
                          swal("Error!", "กรุณากรอกใหม่!", "error");
                          $('#monthly_sub<?= $monthly ?><?=$bg_d->boq_costsub?>').val(0)
                        }


                      }else{
                       
                        var get_m = jQuery.parseJSON('<?= json_encode($monthly_array) ?>');
                        var total = 0;
                           $.each(get_m, function(index, val) {
                              var mat_code = '<?=$bg_d->boq_costsub?>';
                              var price =  ($('#monthly_sub'+val+mat_code).val()*1);
                              total += price;
                           });
                        var price_all  = ($('#lab<?=$bg_d->boq_costsub?>').val()*1);
                        var percent = (total/price_all)*100;
                        if (percent <= 100) {
                          $('#percent_i<?=$bg_d->boq_costsub?>').val(percent.toFixed(2));
                        }else{
                          swal("Error!", "กรุณากรอกใหม่!", "error");
                          $('#monthly_sub<?= $monthly ?><?=$bg_d->boq_costsub?>').val(0)
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
                              var lab_sub_amt = Math.ceil((lab/monthly_sub)*1);
                          }else{
                              
                              var monthly_sub = "<?= $num_months ?>";
                              var lab_sub_amt = Math.ceil((lab/monthly_sub)*1);
                          }

                          var data_m = $('#input_sub<?= $bg_d->boq_costsub ?>').val();
                          monthArray = data_m.split(",");
                          $.each(monthArray, function(index, val) {

                              $('#monthly_sub'+val).val(lab_sub_amt);

                          });

                      }else{
                        
                        var monthly_sub = "<?= $num_months ?>";
                        var lab_sub_amt = Math.ceil((lab/monthly_sub)*1);
                        $('.monthly_sub<?=$bg_d->boq_costsub?>').val(lab_sub_amt);
                      }
                     

                  });
                  </script>
                                
                  <?php
                    }
                  ?>

                     <script type="text/javascript">

                    $('#start_sub<?= $bg_d->boq_costsub ?>, #stop_sub<?= $bg_d->boq_costsub ?>').bind("click, keyup, change", function(event) {

                      function toTimestamp(strDate){
                        var datum = Date.parse(strDate);
                        return datum/1000;
                      }
               

                      var start_edit = $('#start_sub<?= $bg_d->boq_costsub ?>').val();
                      var stop_edit = $('#stop_sub<?= $bg_d->boq_costsub ?>').val();
                      var start_time_edit = toTimestamp(start_edit);
                      var stop_time_edit = toTimestamp(stop_edit);
                      var res_edit = ((stop_time_edit*1)-(start_time_edit*1))/86400;
                      $(".day<?=$bg_d->boq_costsub?>").val(res_edit);

   

                      var start_edit = $('#start_sub<?= $bg_d->boq_costsub ?>').val();
                      var stop_edit = $('#stop_sub<?= $bg_d->boq_costsub ?>').val();
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
                  </td>
                </tr>
                <tr id="purchase<?= $bg_d->boq_costsub ?>" style="display: none;">
                  <td colspan="9" class="text-right"><b>Purchase</b></td>
                <?php
                    foreach ($monthly_array as $mon_i => $monthly) {
                      $month = get_month($monthly);
                ?>
                  <td>
                     <input type="text" class="form-control text-right" value="0" readonly="true" id="<?= "purchase".$month.$bg_d->boq_costsub ?>" style="background-color:#99FFFF;"> 
                  </td>
                <?php
                    }
                ?>  
                </tr>
                <tr id="booking<?= $bg_d->boq_costsub ?>" style="display: none;">
                  <td colspan="9" class="text-right"><b>Booking</b></td>
                 <?php
                    foreach ($monthly_array as $mon_i => $monthly) {
                      $month = get_month($monthly);
                ?>
                  <td>
                     <input type="text" class="form-control text-right" value="0" readonly="true" id="<?= "booking".$month.$bg_d->boq_costsub ?>" style="background-color:#FFCC99;"> 
                  </td>
                <?php
                    }
                ?>  
                </tr>
                <tr id="achase<?= $bg_d->boq_costsub ?>" style="display: none;">
                  <td colspan="9" class="text-right"><b>Achase</b></td>
                <?php
                    foreach ($monthly_array as $mon_i => $monthly) {
                      $month = get_month($monthly);
                ?>
                  <td>
                     <input type="text" class="form-control text-right" value="0" readonly="true" id="<?= "achase".$month.$bg_d->boq_costsub ?>" style="background-color:#FFCC66;"> 
                  </td>
                <?php
                    }
                ?>   
                </tr> 
               
                <?php 
                      }
            
                  } 
                ?> 

                <tr>
                  <td colspan="9" class="text-right"><h4><b>Total ForecastMonthly</b></h4></td>
                  <?php
                      foreach ($monthly_array as $mon_i => $monthly) {
                        $this->db->select('SUM(price) as price');
                        $this->db->from('forecast_month');
                        $this->db->where('month_year',$monthly);
                        $this->db->where('project_id',$pj_id);
                        $this->db->group_by('month_year');
                        $query = $this->db->get()->result();
                        foreach ($query as $price => $data) { 

                          // $month = get_month($monthly);
                  ?>
                    <td>
                       <input type="text" class="form-control text-right" value="<?= $data->price ?>" readonly="true" id="forcash<?=$monthly?>"> 
                    </td>
                  <?php
                        }
                      }
                  ?>   
                </tr>

                <tr>
                  <td colspan="9" class="text-right"><h4><b>Total Purchase</b></h4></td>
                  <?php
                      foreach ($monthly_array as $mon_i => $monthly) {
                         $month = get_month($monthly);

                  ?>
                    <td>
                       <input type="text" class="form-control text-right" value="0" readonly="true" id="purchase<?=$month?>"> 
                    </td>
                  <?php
                        
                      }
                  ?>   
                </tr>

                <tr>
                  <td colspan="9" class="text-right"><h4><b>Total Booking</b></h4></td>
                  <?php
                      foreach ($monthly_array as $mon_i => $monthly) {
                        $month = get_month($monthly);
                  ?>
                    <td>
                       <input type="text" class="form-control text-right" value="0" readonly="true" id="booking<?=$month?>"> 
                    </td>
                  <?php
                      }
                  ?>   
                </tr>

                <tr>
                  <td colspan="9" class="text-right"><h4><b>Total Achase</b></h4></td>
                  <?php
                      foreach ($monthly_array as $mon_i => $monthly) {
                        $month = get_month($monthly);
                  ?>
                    <td>
                       <input type="text" class="form-control text-right" value="0" readonly="true" id="achase<?=$month?>"> 
                    </td>


                  <?php
                      }
                  ?>   
                </tr>


              </tbody> 
            </table>
          </div> 
           <div><br/>
            <button type="submit" class="btn btn-success">
              <i class="icon-floppy-disk position-left"></i> Save
            </button>

          </div>
          </form>
        </div>
        </div>
        <!-- end tab -->
        <!-- js tab1 -->
        <script type="text/javascript">
          $('#payment_tr').click(function(event) {
            $("#payment").removeAttr('style');
          });

          var pj_id = "<?= $pj_id ?>";
          var costcode = jQuery.parseJSON('<?= json_encode($costcode) ?>');
          var month = jQuery.parseJSON('<?= json_encode($monthly_array) ?>');
          var purchaseG = true;
          var bookingG = "";
          var achaseG = "";
          $('#purchase').click(function(event) {
            
            $("[id^='purchase']").each(function(index, el) {
              $(el).val(0);
            });

            $.post('<?php echo base_url(); ?>management_forecast/get_purchase_mat', {id_project: pj_id, code:costcode, month:month}, function(data) {
            }).done(function(data){

              var json_res = $.parseJSON(data);
              var po = json_res.po;
              var gl = json_res.gl;
              var petty = json_res.petty;
              var wo = json_res.wo;
              var month = json_res.all_month;
              var code = json_res.code;
              purchaseG = json_res;


              
              $.each(po, function(poi, data_po) {
                 var date = data_po[0].date;
                 var cost = data_po[0].costcode;
                 var price_po = data_po[0].value;
                 var price = $("#purchase"+date+cost).val();
                 var total_price = (price*1)+(price_po*1);
                 $("#purchase"+date+cost).val(total_price);
                 $("#purchase"+cost).removeAttr('style');
              }); 

              $.each(wo, function(poi, data_po) {
                 var date = data_po[0].date;
                 var cost = data_po[0].costcode;
                 var price_po = data_po[0].value;
                 var price = $("#purchase"+date+cost).val();
                 var total_price = (price*1)+(price_po*1);
                 $("#purchase"+date+cost).val(total_price);
                 $("#purchase"+cost).removeAttr('style');
              });

              $.each(gl, function(poi, data_po) {
                 var date = data_po[0].date;
                 var cost = data_po[0].costcode;
                 var price_po = data_po[0].value;
                 var price = $("#purchase"+date+cost).val();
                 var total_price = (price*1)+(price_po*1);
                 $("#purchase"+date+cost).val(total_price);
                 $("#purchase"+cost).removeAttr('style');
                
              });

              $.each(petty, function(poi, data_po) {
                 var date = data_po[0].date;
                 var cost = data_po[0].costcode;
                 var price_po = data_po[0].value;
                 var price = $("#purchase"+date+cost).val();
                 var total_price = (price*1)+(price_po*1);
                 $("#purchase"+date+cost).val(total_price);
                 $("#purchase"+cost).removeAttr('style');
              });


              $.each(code, function(code_i, data_code) {
                $.each(month, function(month, data_month) {
                  var code_mat = data_code.boq_costmat;
                  var code_sub = data_code.boq_costsub;
                  var price_mat = $('#purchase'+data_month+code_mat).val();
                  var price_sub = $('#purchase'+data_month+code_sub).val();
                  var sum_total = $('#purchase'+data_month).val();
                  var total = (sum_total*1)+(price_mat*1)+(price_sub*1);
                  $('#purchase'+data_month).val(total);

                });
              });


            });
            
          });

          $("#booking").click(function(event) {
            $("[id^='booking']").each(function(index, el) {
              $(el).val(0);
            });
            $.post('<?php echo base_url(); ?>management_forecast/get_booking_mat', {id_project: pj_id, code:costcode, month:month}, function(data) {
            }).done(function(data) {
                var booking = $.parseJSON(data);
                var apv = booking.apv;
                var aps = booking.aps;
                var apo = booking.apo;
                var month = booking.all_month;
                var code = booking.code;

                $.each(apv, function(apvi, data_apv) {
                   var date = data_apv[0].date;
                   var cost = data_apv[0].costcode;
                   var price_apv = data_apv[0].value;
                   var price = $("#booking"+date+cost).val();
                   var total_price = (price*1)+(price_apv*1);
                   $("#booking"+date+cost).val(total_price);
                   $("#booking"+cost).removeAttr('style');
                });

                $.each(aps, function(apvi, data_aps) {
                   var date = data_aps[0].date;
                   var cost = data_aps[0].costcode;
                   var price_apv = data_aps[0].value;
                   var price = $("#booking"+date+cost).val();
                   var total_price = (price*1)+(price_apv*1);
                   $("#booking"+date+cost).val(total_price);
                   $("#booking"+cost).removeAttr('style');
                });

                $.each(apo, function(apvi, data_aps) {
                   var date = data_aps[0].date;
                   var cost = data_aps[0].costcode;
                   var price_apv = data_aps[0].value;
                   var price = $("#booking"+date+cost).val();
                   var total_price = (price*1)+(price_apv*1);
                   $("#booking"+date+cost).val(total_price);
                   $("#booking"+cost).removeAttr('style');
                });

                $.each(code, function(code_i, data_code) {
                  $.each(month, function(month, data_month) {
                    var code_mat = data_code.boq_costmat;
                    var code_sub = data_code.boq_costsub;
                    var price_mat = $('#booking'+data_month+code_mat).val();
                    var price_sub = $('#booking'+data_month+code_sub).val();
                    var sum_total = $('#booking'+data_month).val();
                    var total = (sum_total*1)+(price_mat*1)+(price_sub*1);
                    $('#booking'+data_month).val(total);

                  });
                });
                
            });
          });

          $('#achase').click(function(event) {
            $("[id^='achase']").each(function(index, el) {
              $(el).val(0);
            });
            $.post('<?php echo base_url(); ?>management_forecast/get_achase_mat', {id_project: pj_id, code:costcode, month:month}, function(data) {
            }).done(function(data) {
                var achase = $.parseJSON(data);
                var ap = achase.ap;
                var month = achase.all_month;
                var code = achase.code;
            

                $.each(ap, function(ap, data_ap) {
                  var date = data_ap[0].date;
                  var cost = data_ap[0].costcode;
                  var price_apv = data_ap[0].value;;
                  var price = $("#achase"+date+cost).val();
                  var total_price = (price*1)+(price_apv*1);
                  $("#achase"+date+cost).val(total_price);
                  $("#achase"+cost).removeAttr('style');
                });

                $.each(code, function(code_i, data_code) {
                  $.each(month, function(month, data_month) {
                    var code_mat = data_code.boq_costmat;
                    var code_sub = data_code.boq_costsub;
                    var price_mat = $('#achase'+data_month+code_mat).val();
                    var price_sub = $('#achase'+data_month+code_sub).val();
                    var sum_total = $('#achase'+data_month).val();
                    var total = (sum_total*1)+(price_mat*1)+(price_sub*1);
                    $('#achase'+data_month).val(total);

                  });
                });
            });

          });

          $('#forecast').click(function(event) {
            $("[id^='forcash']").each(function(index, el) {
              $(el).val(0);
            });
              function month_num(date) {
                dateArray = date.split("-");
                var months = [ 'JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC']; 
                var date_m = dateArray[0];
                var date_y = dateArray[1];

                var m = months.indexOf(date_m);
                var month = (m*1)+1;
                if(month < 10){
                  var _m = "0"+month;
                }else{
                  var _m = month;
                }

                var res = _m+"-"+date_y;

                return res;
              }

            var month_f = month;
            var code_f = costcode;

            $.each(code_f, function(code_f, data_code) {
              $.each(month_f, function(month_f, data_month) {
                var code_mat = data_code.boq_costmat;
                var code_sub = data_code.boq_costsub;
                var price_mat = $('#monthly_mat'+data_month+code_mat).val();
                var price_sub = $('#monthly_sub'+data_month+code_sub).val();
                var date = month_num(data_month);
                var sum_total = $('#forcash'+date).val();
                var total = (sum_total*1)+(price_mat*1)+(price_sub*1);
                $('#forcash'+date).val(total);
              });
            });


          });

       var chart_type = [
                "column",
                "bar",
                "line",
                "area"
                ];
        </script>
        <!-- js tab1 -->


        
        <div class="tab-pane" id="top-divided-tab1">
            <h5 style="display: inline;"> Chart Type : </h5><select id="chart_type_Accumulate"></select>
            <div id="exampleG"></div>
            

        </div>

        </div>


      </div> 
    </div> 
  </div> 
</div>


<?php
  foreach ($decsc as $cost_i => $data_cost) {
    
      $this->db->select('price,month_year,costcode');
      $this->db->from('forecast_month');
      $this->db->where('costcode',$data_cost->boq_costmat);
      $this->db->where('project_id',$pj_id);;
      $month_all = $this->db->get()->result();

      $data_monthy = NULL;
      $count_mat_month = 0;
      foreach ($month_all as $key_iii => $value_m) {
        $price = $value_m->price;

        if ($price != "0.00") {

          if ($data_monthy == NULL) {
              $count_mat_month++;
              $data_monthy .= $value_m->month_year.$value_m->costcode;
           
          }else{
              $count_mat_month++;
              $data_monthy .= ",".$value_m->month_year.$value_m->costcode;
          }

        }

      }
?>
    <input type="hidden" id="count_by_mat<?=$data_cost->boq_costmat?>" value="<?=$count_mat_month?>" >
    <input type="hidden" id="mat<?=$data_cost->boq_costmat?>" value="<?=$data_monthy?>" >
<?php

  }

?>
<?php
  foreach ($decsc as $cost_i => $data_cost) {
    
      $this->db->select('price,month_year,costcode');
      $this->db->from('forecast_month');
      $this->db->where('costcode',$data_cost->boq_costsub);
      $this->db->where('project_id',$pj_id);;
      $month_all = $this->db->get()->result();

      $data_monthy = NULL;
      $count_sub_month = 0;
      foreach ($month_all as $key_iii => $value_m) {
        $price = $value_m->price;

        if ($price != "0.00") {

          if ($data_monthy == NULL) {
              $count_sub_month++;
              $data_monthy .= $value_m->month_year.$value_m->costcode;
           
          }else{
              $count_sub_month++;
              $data_monthy .= ",".$value_m->month_year.$value_m->costcode;
          }

        }

      }
?>
    <input type="hidden" id="sub<?=$data_cost->boq_costmat?>" value="<?=$data_monthy?>" >
    <input type="hidden" id="count_by_sub<?=$data_cost->boq_costmat?>" value="<?=$count_sub_month?>" >
<?php

  }

?>


<?php
  foreach ($decsc as $cost_i => $data_cost) {
?>
    <script type="text/javascript">
      var mat = "<?=$data_cost->boq_costmat?>";
      var monthly = $("#mat"+mat).val();
      var count_m_mat = $("#count_by_mat"+mat).val();
      
      $("#input"+mat).val(monthly);
      $("#count_m"+mat).val(count_m_mat);

      var sub = "<?=$data_cost->boq_costsub?>";
      var monthly_sub = $("#sub"+mat).val();
      var count_m_sub = $("#count_by_sub"+mat).val();
      
      $("#input_sub"+sub).val(monthly_sub);
      $("#count_m_sub"+sub).val(count_m_sub);





    </script>
<?php
  }
?>

<script type="text/javascript">
$.each(chart_type, function(index, val) {
  $("#chart_type_Accumulate").append(`<option value="${val}">${val}</option>`);    
});

function chart_render(target,type_chart,stack_option,categories,data,title) {
            $(target).kendoChart({
               title: {
                    text: title,
                    font: "bold 20px Arial,Helvetica,Sans-Serif",
                    color:"#000000"
                },
                legend: {
                    position: "top"
                },
                seriesDefaults: {
                    type: type_chart,
                    stack: stack_option,
                    dynamicHeight: false,
                    labels: {
                        template: "#= value #",
                        //visible: true,
                        font: "18px sans-serif",
                        align: "center",
                        position: "top",
                        background: "transparent",
                        color: "#FFFFFF",
                        padding: 5,
                        border: {
                            width: 1,
                            dashType: "dot",
                            color: "#000"
                        },
                        format: "N0"
                    }
                },
                series: data,
                seriesClick: function(e) {
                   //alert(555);
                   
                },valueAxis: {
                    line: {
                        visible: false
                    },
                    minorGridLines: {
                        visible: true
                    }
                },
                 pannable: {
                    lock: "y"
                },
                zoomable: {
                    mousewheel: {
                        lock: "y"
                    },
                    selection: {
                        lock: "y"
                    }
                },
                categoryAxis: {
                    categories: categories,
                    majorGridLines: {
                        visible: false
                    },
                    labels: {
                      rotation: "auto",
                      font: "20px sans-serif"
                    }
                },
                tooltip: {
                    visible: true,
                     template: "#= series.name #: #= kendo.format('{0:n}',value) #",
                    font: "22px sans-serif",

                },
                minorGridLines: {
                    visible: true
                }

            });
} 



$("#tab_Graph").click(function(event) {
var month_for = jQuery.parseJSON('<?= json_encode($monthly_array) ?>');
var monthG = purchaseG.all_month;

if (typeof monthG !== 'undefined') {

      var box = [];

        // pay
        var price_pay = new Array();
        var data_pay = new Array();
          $.each(month_for, function(monthGi, data_monthG) {
              var price = $('#payment'+data_monthG).val();
              price_pay.push(price);
          });
          data_pay = {name:"Payment",data:price_pay};
        //pay

        // forcash
        var price_f = new Array();
        var data_F = new Array();
          $.each(month_for, function(monthGi, data_monthG) {
              var price = $('#forcash'+data_monthG).val();
              price_f.push(price);
          });
          data_F = {name:"Forcash Monthly",data:price_f};
        //forcash 

       // purchase
      var price_p = new Array();
      var data_P = new Array();
        $.each(monthG, function(monthGi, data_monthG) {
            var price = $('#purchase'+data_monthG).val();
            price_p.push(price);
        });
        data_P = {name:"Purchase",data:price_p};
      // purchase

      // booking
      var price_b = new Array();
      var data_B = new Array();
        $.each(monthG, function(monthGi, data_monthG) {
            var price = $('#booking'+data_monthG).val();
            price_b.push(price);
        });
        data_B = {name:"Booking",data:price_b};
      // booking

      // achase
      var price_a = new Array();
      var data_A = new Array();
        $.each(monthG, function(monthGi, data_monthG) {
            var price = $('#achase'+data_monthG).val();
            price_a.push(price);
        });
        data_A = {name:"Achase",data:price_a} ;
      // achase
      box.push(data_pay);
      box.push(data_F);
      box.push(data_P);
      box.push(data_B);
      box.push(data_A);
}else{
  var box = [];

  // pay
  var price_pay = new Array();
  var data_pay = new Array();
    $.each(month_for, function(monthGi, data_monthG) {
        var price = $('#payment'+data_monthG).val();
        price_pay.push(price);
    });
    data_pay = {name:"Payment",data:price_pay};
    box.push(data_pay);
  //pay


  // forcash
  var price_f = new Array();
  var data_F = new Array();
    $.each(month_for, function(monthGi, data_monthG) {
        var price = $('#forcash'+data_monthG).val();
        price_f.push(price);
    });
    data_F = {name:"Forcash Monthly",data:price_f};
    box.push(data_F);
  //forcash 

}


    $("#exampleG").html('<div class="loading">Loading&#8230;</div>');
     setTimeout(function(){ 
      var month_get = jQuery.parseJSON('<?= json_encode($monthly_array) ?>');
     

      var dataee =  box;
     // init chart chartAccumulate_AC_B
           chart_render("#exampleG",chart_type[2],0,month_get,dataee,"Forecast Monthly"); 
           $("#chart_type_Accumulate").change(function() {
                 chart_render("#exampleG",$(this).val(),0,month_get,dataee,"Forecast Monthly");
            });
    }, 500);
});

  $('#data_master').DataTable(); 
  $('#tra').attr('class', 'active');
  $('#tra_sub7').attr('style', 'background-color:#dedbd8');
 
</script>