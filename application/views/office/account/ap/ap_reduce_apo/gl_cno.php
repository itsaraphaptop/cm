<?php 
foreach ($apo as $p) {    
            echo '<tr >'.                  
                          
              
              '<td>'.
              '<input type="text" style="width: 120px;text-align: right;border: 1px solid #c7c6c6; height: 30px;padding: 7px 12px;" value="'.$p->cnoi_disamt.'" id="ap_amto'.$p->cnoi_id.'" name="ap_amto">'.
              '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" value="" id="ap_total'.$p->cnoi_id.'" name="ap_total">'.
              '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="'.$p->cnoi_disamt.'" id="ap_amtt'.$p->cnoi_id.'" name="cn_amtt[]">'.
              '</td>'.
              '<td>'.
              '<input type="text" style="width: 80px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;"  value="" id="ap_vat2'.$p->cnoi_id.'" name="ap_vat2">'.
              '<input type="text" style="width: 80px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->cnoi_vatper.'" id="ap_vatt'.$p->cnoi_id.'" name="cn_vatper[]">'.
              '<input type="text" style="width: 80px;text-align: right;border: 1px solid #c7c6c6; height: 30px;padding: 7px 12px;"  value="'.$p->cnoi_vatper.'" id="ap_vat'.$p->cnoi_id.'" name="ap_vat">'.
              '</td>'.
             
              '<td>'.
              '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->cnoi_vat.'" id="ap_vatamt'.$p->cnoi_id.'" name="ap_vatamt[]">'.
              '<input type="text" style="width: 120px;text-align: right;border: 1px solid #c7c6c6; height: 30px;padding: 7px 12px;" value="'.$p->cnoi_vat.'" id="cn_vat'.$p->cnoi_id.'" name="cn_vat[]">'.
              '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="" id="cn_vat2'.$p->cnoi_id.'" name="cn_vat2">'.
              '</td>'.
              '<td>'.
              '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->cnoi_netamt.'" id="ap_netamt'.$p->cnoi_id.'" name="ap_netamt">'.
              '<input type="text" style="width: 160px;text-align: right;border: 1px solid #c7c6c6; height: 30px;padding: 7px 12px;" value="'.$p->cnoi_netamt.'" id="cn_total'.$p->cnoi_id.'" name="cn_total">'.
              '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" id="ap_netamt2'.$p->cnoi_id.'" name="ap_netamt2">'.              
              '</td>'.             
              '<td>'.
              '<i class="icon-box-add" id="ok'.$p->cnoi_id.'"></i>'.
              '<i class="icon-pencil" id="sum'.$p->cnoi_id.'"></i>'.
              '<i class="glyphicon glyphicon-ok" id="save'.$p->cnoi_id.'"></i>'.
              '</td>';
            echo  '</tr>';
            echo  '<script>'.

                '$(".daterange-single").daterangepicker({'.
                  'singleDatePicker: true,'.
                  'locale: {'.
                    'format: "YYYY-MM-DD"'.
                  '}'.
                '});'.

                '$("#ap_amto'.$p->cnoi_id.'").hide();'.
                '$("#ap_vat'.$p->cnoi_id.'").hide();'.
                '$("#cn_vat'.$p->cnoi_id.'").hide();'.
                '$("#cn_total'.$p->cnoi_id.'").hide();'.
                '$("#ap_total'.$p->cnoi_id.'").hide();'.
                '$("#cn_vat2'.$p->cnoi_id.'").hide();'.
                '$("#ap_vat2'.$p->cnoi_id.'").hide();'.
                '$("#ap_netamt2'.$p->cnoi_id.'").hide();'.
                '$("#tax'.$p->cnoi_id.'").hide();'.
                '$("#tax2'.$p->cnoi_id.'").hide();'.                
                '$("#tax_date2'.$p->cnoi_id.'").hide();'.
                '$("#tax_date1'.$p->cnoi_id.'").hide();'.
                '$("#save'.$p->cnoi_id.'").hide();'.
                '$("#ok'.$p->cnoi_id.'").hide();'.

                '$("#sum'.$p->cnoi_id.'").click(function(){'.                    
                  '$("#ok'.$p->cnoi_id.'").show();'.
                  '$("#sum'.$p->cnoi_id.'").hide();'.
                  '$("#scnv").hide();'.
                  '$("#ap_amtt'.$p->cnoi_id.'").hide();'.
                  '$("#ap_vatamt'.$p->cnoi_id.'").hide();'.
                  '$("#ap_netamt'.$p->cnoi_id.'").hide();'.
                  '$("#ap_vatt'.$p->cnoi_id.'").hide();'.
                  '$("#ap_amto'.$p->cnoi_id.'").show();'.
                  '$("#ap_vat'.$p->cnoi_id.'").show();'.
                  '$("#cn_vat'.$p->cnoi_id.'").show();'.
                  '$("#cn_total'.$p->cnoi_id.'").show();'.
                  '$("#ap_total'.$p->cnoi_id.'").hide();'.
                  '$("#cn_vat2'.$p->cnoi_id.'").hide();'.
                  '$("#ap_vat'.$p->cnoi_id.'").show();'.
                  '$("#ap_netamt2'.$p->cnoi_id.'").hide();'.
                  '$("#tax_no").hide();'.
                  '$("#tax1'.$p->cnoi_id.'").hide();'.
                  '$("#tax'.$p->cnoi_id.'").show();'.
                  '$("#tax2'.$p->cnoi_id.'").hide();'.
                  '$("#tax_date'.$p->cnoi_id.'").hide();'.
                  '$("#tax_date1'.$p->cnoi_id.'").show();'.
                  '$("#tax_date2'.$p->cnoi_id.'").hide();'.
                    'var amt'.$p->cnoi_id.' = parseFloat($("#ap_amto'.$p->cnoi_id.'").val());'.
                    'var vat'.$p->cnoi_id.' = parseFloat($("#ap_vat'.$p->cnoi_id.'").val());'.
                    'var net'.$p->cnoi_id.' = parseFloat($("#cn_total'.$p->cnoi_id.'").val());'.
                    'var taxno'.$p->cnoi_id.' = $("#tax'.$p->cnoi_id.'").val();'.

                    'var date'.$p->cnoi_id.' = $("#tax_date1'.$p->cnoi_id.'").val();'.
                    '$("#to").val(amt'.$p->cnoi_id.');'.
                    '$("#tov").val(vat'.$p->cnoi_id.');'.
                    '$("#toa").val(net'.$p->cnoi_id.');'.
                    '$("#tax2'.$p->cnoi_id.'").val(taxno'.$p->cnoi_id.');'.
                    '$("#tax_date2'.$p->cnoi_id.'").val(date'.$p->cnoi_id.');'.
                '});'.

                '$("#ap_amto'.$p->cnoi_id.'").keyup(function(){'.
                  'var amt'.$p->cnoi_id.' = parseFloat($("#ap_amto'.$p->cnoi_id.'").val());'.
                  'var cnvatt'.$p->cnoi_id.' = parseFloat($("#ap_vat'.$p->cnoi_id.'").val());'.
                  'var amtt'.$p->cnoi_id.' = parseFloat($("#ap_amtt'.$p->cnoi_id.'").val());'.
                  'var vatamt'.$p->cnoi_id.' = parseFloat($("#ap_vatamt'.$p->cnoi_id.'").val());'. 
                  'var wt'.$p->cnoi_id.' = parseFloat($("#ap_wt'.$p->cnoi_id.'").val());'.
                  'var netamt'.$p->cnoi_id.' = parseFloat($("#ap_netamt'.$p->cnoi_id.'").val());'.
                  'var toa = parseFloat($("#toa").val());'.
                  'var to = parseFloat($("#to").val());'.
                  'var tov = parseFloat($("#tov").val());'.
                  'var cntovat'.$p->cnoi_id.' = (amt'.$p->cnoi_id.'*cnvatt'.$p->cnoi_id.')/100;'.
                  'var totalamt'.$p->cnoi_id.' = (amt'.$p->cnoi_id.'+cntovat'.$p->cnoi_id.');'.
                  'var apwt'.$p->cnoi_id.' = (to - amt'.$p->cnoi_id.');'.
                  'var amtto'.$p->cnoi_id.' = (toa - totalamt'.$p->cnoi_id.');'.
                  'var vv = (to*tov)/100;'.
                  'var cn_apvat'.$p->cnoi_id.' = (vv-cntovat'.$p->cnoi_id.');'.
                  '$("#cntovat").val(cntovat'.$p->cnoi_id.');'.
                  '$("#cnvat").val(cnvatt'.$p->cnoi_id.');'.
                  '$("#cn_vat'.$p->cnoi_id.'").val(cntovat'.$p->cnoi_id.');'.
                  '$("#cnamt").val(amt'.$p->cnoi_id.');'.       
                  '$("#de1'.$p->cnoi_id.'").val(amt'.$p->cnoi_id.');'.  
                  '$("#de2'.$p->cnoi_id.'").val(cntovat'.$p->cnoi_id.');'.
                  '$("#de4'.$p->cnoi_id.'").val(amt'.$p->cnoi_id.');'.  
                  '$("#de3'.$p->cnoi_id.'").val(cntovat'.$p->cnoi_id.');'.                      
                  '$("#cn_total'.$p->cnoi_id.'").val(totalamt'.$p->cnoi_id.');'.
                  '$("#totalamt").val(totalamt'.$p->cnoi_id.');'.
                  '$("#cn_apvat").val(cn_apvat'.$p->cnoi_id.');'.
                  '$("#ap_amt").val(apwt'.$p->cnoi_id.');'.  
                  '$("#ap_amttotal").val(amtto'.$p->cnoi_id.');'.  
                '});'.

                '$("#ap_vat'.$p->cnoi_id.'").keyup(function(){'.
                  'var cnamt'.$p->cnoi_id.' = parseFloat($("#ap_amto'.$p->cnoi_id.'").val());'.
                  'var cntotal'.$p->cnoi_id.' = parseFloat($("#cn_total'.$p->cnoi_id.'").val());'.
                  'var cnvat'.$p->cnoi_id.' = parseFloat($("#ap_vat'.$p->cnoi_id.'").val());'. 
                  'var amt'.$p->cnoi_id.' = parseFloat($("#ap_amtt'.$p->cnoi_id.'").val());'.
                  'var netamt'.$p->cnoi_id.' = parseFloat($("#ap_netamt'.$p->cnoi_id.'").val());'.
                  'var vat'.$p->cnoi_id.' = parseFloat($("#ap_vatt'.$p->cnoi_id.'").val());'. 
                  'var vatamt'.$p->cnoi_id.' = parseFloat($("#ap_vatamt'.$p->cnoi_id.'").val());'.
                  'var toa = parseFloat($("#toa").val());'.
                  'var to = parseFloat($("#to").val());'.
                  'var tov = parseFloat($("#tov").val());'.

                  'var cntovat'.$p->cnoi_id.' = (cnamt'.$p->cnoi_id.'*cnvat'.$p->cnoi_id.')/100;'.
                  'var totalamt'.$p->cnoi_id.' = (cnamt'.$p->cnoi_id.'+cntovat'.$p->cnoi_id.');'.
                  'var apwt'.$p->cnoi_id.' = (to - cnamt'.$p->cnoi_id.');'.
                  'var amtto'.$p->cnoi_id.' = (toa - totalamt'.$p->cnoi_id.');'.
                  'var vv = (to*tov)/100;'.
                  'var cn_apvat'.$p->cnoi_id.' = (vv-cntovat'.$p->cnoi_id.');'.

                  '$("#cntovat").val(cntovat'.$p->cnoi_id.');'.
                  '$("#cn_vat'.$p->cnoi_id.'").val(cntovat'.$p->cnoi_id.');'.
                  '$("#totalamt").val(totalamt'.$p->cnoi_id.');'.
                  '$("#cn_total'.$p->cnoi_id.'").val(totalamt'.$p->cnoi_id.');'.
                  '$("#cnvat").val(cnvat'.$p->cnoi_id.');'.
                  '$("#cn_apvat").val(cn_apvat'.$p->cnoi_id.');'.
                  '$("#ap_amt").val(apwt'.$p->cnoi_id.');'.  
                  '$("#ap_amttotal").val(amtto'.$p->cnoi_id.');'.                                
                '});'.

              '$("#ok'.$p->cnoi_id.'").click(function(){'.
              '$("#ok'.$p->cnoi_id.'").hide();'.
              '$("#save'.$p->cnoi_id.'").show();'.
              '$("#scnv").show();'.

              'var amtcn = parseFloat($("#amt_cn").val());'.
              'var cnamt'.$p->cnoi_id.' = parseFloat($("#ap_amto'.$p->cnoi_id.'").val());'.
              'var cnvat'.$p->cnoi_id.' = parseFloat($("#ap_vat'.$p->cnoi_id.'").val());'.

              'var tax'.$p->cnoi_id.' = $("#tax'.$p->cnoi_id.'").val();'. 
              'var taxdate'.$p->cnoi_id.' = $("#tax_date1'.$p->cnoi_id.'").val();'. 
              'var cntovat = parseFloat($("#cntovat").val());'. 
              'var totalamt2 = parseFloat($("#totalamt").val());'.
              'var tovatt'.$p->cnoi_id.' = (cnamt'.$p->cnoi_id.'*cnvat'.$p->cnoi_id.')/100;'.
              'var totamt'.$p->cnoi_id.' = (cnamt'.$p->cnoi_id.'+tovatt'.$p->cnoi_id.');'.

              '$("#ap_total'.$p->cnoi_id.'").val(cnamt'.$p->cnoi_id.');'.
              '$("#cn_vat2'.$p->cnoi_id.'").val(cntovat);'.
              '$("#ap_vat2'.$p->cnoi_id.'").val(cnvat'.$p->cnoi_id.');'.
              '$("#ap_netamt2'.$p->cnoi_id.'").val(totalamt2);'.
              '$("#tax2'.$p->cnoi_id.'").val(tax'.$p->cnoi_id.');'.
              '$("#tax_date2'.$p->cnoi_id.'").val(taxdate'.$p->cnoi_id.');'.
              '$("#cn_vat2'.$p->cnoi_id.'").val(tovatt'.$p->cnoi_id.');'.
              '$("#ap_netamt2'.$p->cnoi_id.'").val(totamt'.$p->cnoi_id.');'.
                  
                'if ($("#ap_netamt'.$p->cnoi_id.'") >= $("#cn_total'.$p->cnoi_id.'")) {'.
                  '$("#sum'.$p->cnoi_id.'").hide();'.
                  '$("#ap_amtt'.$p->cnoi_id.'").hide();'.
                  '$("#ap_vatt'.$p->cnoi_id.'").hide();'.
                  '$("#ap_vayamt'.$p->cnoi_id.'").hide();'.
                  '$("#ap_netamt'.$p->cnoi_id.'").hide();'.
                  '$("#ap_amto'.$p->cnoi_id.'").hide();'.
                  '$("#ap_vat'.$p->cnoi_id.'").hide();'.
                  '$("#cn_vat'.$p->cnoi_id.'").hide();'.
                  '$("#cn_total'.$p->cnoi_id.'").hide();'.
                  '$("#ap_total'.$p->cnoi_id.'").show();'.
                  '$("#cn_vat2'.$p->cnoi_id.'").show();'.
                  '$("#ap_vat2'.$p->cnoi_id.'").show();'.
                  '$("#ap_netamt2'.$p->cnoi_id.'").show();'.
                  '$("#tax2'.$p->cnoi_id.'").show();'.
                  '$("#tax_date2'.$p->cnoi_id.'").show();'.
                  '$("#tax'.$p->cnoi_id.'").hide();'.
                  '$("#tax1'.$p->cnoi_id.'").hide();'.
                  '$("#tax_date'.$p->cnoi_id.'").hide();'.
                  '$("#tax_date1'.$p->cnoi_id.'").hide();'.
                '}else{'.
                   'swal({'.
                    'title: "Net Amount Not Balance !!.",'.
                    'text: "",'.
                    'confirmButtonColor: "#EA1923",'.
                    'type: "error"'.
                    '});'.
                  '$("#ok'.$p->cnoi_id.'").hide();'.
                  '$("#ap_amto'.$p->cnoi_id.'").hide();'.
                  '$("#ap_vat'.$p->cnoi_id.'").hide();'.
                  '$("#cn_vat'.$p->cnoi_id.'").hide();'.
                  '$("#cn_total'.$p->cnoi_id.'").hide();'.
                  '$("#ap_total'.$p->cnoi_id.'").hide();'.
                  '$("#cn_vat2'.$p->cnoi_id.'").hide();'.
                  '$("#ap_vat2'.$p->cnoi_id.'").hide();'.
                  '$("#ap_netamt2'.$p->cnoi_id.'").hide();'.
                  '$("#sum'.$p->cnoi_id.'").show();'.
                  '$("#ap_amtt'.$p->cnoi_id.'").show();'.
                  '$("#ap_vatt'.$p->cnoi_id.'").show();'.
                  '$("#ap_vayamt'.$p->cnoi_id.'").show();'.
                  '$("#ap_netamt'.$p->cnoi_id.'").show();'.
                '}'.

                'if ($("#ap_vatt'.$p->cnoi_id.'") == 0 ) {'.
                'var toamtcn = amtcn + cnamt'.$p->cnoi_id.';'.
                '$("#amt_cn").val(toamtcn);'.
                '}'.
              '});'.
              '</script>'; 
          }
?>