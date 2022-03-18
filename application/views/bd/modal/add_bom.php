                    
                    
                    <?php
                    $q = 1+$id;

                    $this->db->select('*');
                    $this->db->where('ref_bom_code',$bom);
                    $this->db->from("bom_detail");
                    $query_detail = $this->db->get()->result();
                    foreach ($query_detail as $key) {
                    ?>
                    <tr>
                    <td class="text-center">
                        <?php echo $q; ?><input type="hidden" readonly="" id="substatus<?php echo $q; ?>" name="substatus[]" class="form-control input-xs text-right" value="I" style="width: 100px;">
                    </td>
                    <td>
                    <div class="namejob"></div>
                    <input type="hidden" readonly="" id="job<?php echo $q; ?>" name="job[]" class="form-control input-xs text-right" value="" style="width: 200px;">   
                    </td>
                    <td><div class="namejobcost"></div><div style="width: 200px;"> 
                    <input type="hidden" readonly="" id="codecostcodee<?php echo $q; ?>" name="subcostcode[]" class="form-control input-xs text-right" value="" style="width: 200px;"><input type="hidden" readonly="" id="codecostnamee<?php echo $q; ?>" name="subcostcodename[]" class="form-control input-xs text-right" style="width: 200px;" value="">
                    </div></td>
                    <td><div class="input-group"><input readonly="true" type="text"  id="newmatnamee<?php echo $q; ?>" name="newmatnamee[]" class="form-control input-xs text-right" style="width: 200px;" value="<?php echo $key->mat_name; ?>"><input readonly="true" id="newmatcode<?php echo $q; ?>" style="width: 200px;" name="newmatcode[]"  type="hidden" class="form-control input-xs text-right" style="width: 150px;" value="<?php echo $key->mat_code; ?>"><!-- <span class="input-group-btn"><a class="openun btn btn-default btn-icon" data-toggle="modal" data-target="#opnewmat"><i class="icon-search4"></i></a><a class="poo btn btn-default btn-icon" data-toggle="modal" data-target="#opnewmattt"><i class="icon-search4"></i></a><a class="clearmat<?php echo $q; ?> btn btn-default btn-icon" ><i class="glyphicon glyphicon-trash"></i></a></span> --></div>
                        
                    </td>

                    <td><input id="boqcode<?php echo $q; ?>" name="boqcode[]" type="text" class="form-control input-xs text-right" value="" style="width: 100px;"></td>
                    <td><input id="matboqq<?php echo $q; ?>" name="matboq[]" type="text"  class="form-control input-xs text-right" value="" style="width: 150px;"></td>
                    <td class="text-right"><div class="input-group"><input  id="unitcode<?php echo $q; ?>" name="unitcode[]" type="hidden" class="form-control input-xs text-right" style="width: 200px;" readonly="" value="<?php echo $key->unit_code; ?>"><input  id="unitname<?php echo $q; ?>" name="unitname[]" type="text" class="form-control input-xs text-right" style="width: 100px;" readonly="" value="<?php echo $key->unit_name; ?>"><!-- <span class="input-group-btn" ><span class="input-group-btn"><a class="unit btn btn-default btn-icon" data-toggle="modal" data-target="#unit<?php echo $q; ?>"><i class="icon-search4"></i></a></span> --></div></td>
                    <td class="text-right"><input id="qty_bg<?php echo $q; ?>" name="qty_bg[]" type="text" value="<?php echo $key->qty; ?>" class="form-control input-xs text-right" style="width: 100px;"  required="">
                    </td>
                    <td class="text-right"><input type="text" id="matpricebg<?php echo $q; ?>" name="matpricebg[]" value="<?php if($key->type=="M"){ echo $key->price; }else{ echo "0"; } ?>" class="form-control input-xs text-right" style="width: 100px;"></td>
                    <td class="text-right"><input type="text" id="matamtbg<?php echo $q; ?>" name="matamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" readonly="" value="<?php if($key->type=="M"){ echo $key->qty*$key->price; }else{ echo "0"; } ?>"></td>
                    <td class="text-right"><input type="text" id="labpricebg<?php echo $q; ?>" name="labpricebg[]" value="<?php if($key->type=="L"){ echo $key->price; }else{ echo "0"; } ?>" class="form-control input-xs text-right" style="width: 100px;"></td>
                    <td class="text-right"><input type="text" id="labamtbg<?php echo $q; ?>" name="labamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php if($key->type=="L"){ echo $key->qty*$key->price; }else{ echo "0"; } ?>"></td>
                    <td class="text-right"><input type="text" id="subpricebg<?php echo $q; ?>" name="subpricebg[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php if($key->type=="S"){ echo $key->price; }else{ echo "0"; } ?>"></td>
                    <td class="text-right"><input type="text" id="subamtbg<?php echo $q; ?>" name="subamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php if($key->type=="S"){ echo $key->qty*$key->price; }else{ echo "0"; } ?>"></td>
                    <td class="text-right"><input type="text"  id="totalamt<?php echo $q; ?>" name="totalamt[]" class="form-control input-xs text-right" style="width: 100px;" value="<?php echo $key->qty*$key->price ?>"></td>
                    <td class="text-right"><input type="hidden"  id="qtyboq<?php echo $q; ?>" name="qtyboq[]" class="form-control input-xs text-right" style="width: 100px;" value="0"></td>
                    <td class="text-right"><input type="hidden" id="matpriceboq<?php echo $q; ?>" name="matpriceboq[]"  class="form-control input-xs text-right" style="width: 100px;" value="0"></td>
                    <td class="text-right"><input type="hidden" id="matamtboq<?php echo $q; ?>" name="matamtboq[]"  class="form-control input-xs text-right" style="width: 100px;" value="0"></td>
                    <td class="text-right"><input type="hidden"  id="labpriceboq<?php echo $q; ?>" name="labpriceboq[]" class="form-control input-xs text-right" style="width: 100px;" value="0"></td>
                    <td class="text-right"><input type="hidden" id="labamtboq<?php echo $q; ?>" name="labamtboq[]"  class="form-control input-xs text-right" style="width: 100px;" value="0"></td>
                    <td class="text-right"><input type="hidden" id="subpriceboq<?php echo $q; ?>" name="subpriceboq[]"  class="form-control input-xs text-right" style="width: 100px;" value="0"></td>
                    <td class="text-right"><input type="hidden" id="subamtboq<?php echo $q; ?>" name="subamtboq[]"  class="form-control input-xs text-right" style="width: 100px;" value="0"></td>
                    <td class="text-right"><input type="hidden"   id="totalamtboq<?php echo $q; ?>" name="totalamtboq[]" class="form-control input-xs text-right" style="width: 100px;" value="0"></td>
                    <td class="text-center"><a id="del_boq" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a></td>
                    <td style="color: #BEBEBE;"><?php echo $q; ?></td>
                    </tr>
                    <script>
                    $('#qty_bg<?php echo $q; ?>').keyup(function() {
                    var labpricebg = $('#labpricebg<?php echo $q; ?>').val().replace(/,/g,"");
                    var qty_bg = $('#qty_bg<?php echo $q; ?>').val().replace(/,/g,"");
                    var matpricebg = $('#matpricebg<?php echo $q; ?>').val().replace(/,/g,"");
                    var total = (qty_bg*1) * (matpricebg*1) ;
                    $('#matamtbg<?php echo $q; ?>').val(numberWithCommas(total));
                    $('#totalamt<?php echo $q; ?>').val(numberWithCommas(total));
                    $('#qtyboq<?php echo $q; ?>').val(numberWithCommas(qty_bg));
                    if($('#matamtbg<?php echo $q; ?>').val()==0){
                    var ttla = (qty_bg*1) * (labpricebg*1);
                    $('#totalamt<?php echo $q; ?>').val(numberWithCommas(ttla));
                    $('#labamtbg<?php echo $q; ?>').val(numberWithCommas(ttla));
                    }
                    });
                    $('#matpricebg<?php echo $q; ?>').keyup(function() {
                    var qty_bg =$('#qty_bg<?php echo $q; ?>').val().replace(/,/g,"");
                    var matpricebg = $('#matpricebg<?php echo $q; ?>').val().replace(/,/g,"");
                    var total = (qty_bg*1) * (matpricebg*1);
                    $('#matamtbg<?php echo $q; ?>').val(numberWithCommas(total));
                    $('#totalamt<?php echo $q; ?>').val(numberWithCommas(total));
                    });
                    $('#labpricebg<?php echo $q; ?>').keyup(function() {
                    $('#totalamt<?php echo $q; ?>').val(0);
                    var labpricebg = $('#labpricebg<?php echo $q; ?>').val().replace(/,/g,"");
                    var qty_bg = $('#qty_bg<?php echo $q; ?>').val().replace(/,/g,"");
                    var total = (qty_bg*1) * (labpricebg*1) ;
                    $('#labamtbg<?php echo $q; ?>').val(numberWithCommas(total));
                    var labamtbg = $('#labamtbg<?php echo $q; ?>').val().replace(/,/g,"");
                    var matamtbg = $('#matamtbg<?php echo $q; ?>').val().replace(/,/g,"");
                    var ans =  (labamtbg*1) + (matamtbg*1) ;
                    $('#labamtbg<?php echo $q; ?>').val(numberWithCommas(total));
                    $('#totalamt<?php echo $q; ?>').val(numberWithCommas(ans));
                    });
                    $('#subpricebg<?php echo $q; ?>').keyup(function() {
                    $('#totalamt<?php echo $q; ?>').val(0);
                    var subpricebg = $('#subpricebg<?php echo $q; ?>').val().replace(/,/g,"");
                    var qty_bg = $('#qty_bg<?php echo $q; ?>').val().replace(/,/g,"");
                    var total = (qty_bg*1) * (subpricebg*1) ;
                    $('#subamtbg<?php echo $q; ?>').val(numberWithCommas(total));
                    var labamtbg = $('#labamtbg<?php echo $q; ?>').val().replace(/,/g,"");
                    var matamtbg = $('#matamtbg<?php echo $q; ?>').val().replace(/,/g,"");
                    var subamtbg = $('#subamtbg<?php echo $q; ?>').val().replace(/,/g,"");
                    var ans =  (labamtbg*1) + (matamtbg*1) + (subamtbg*1) ;
                    $('#subamtbg<?php echo $q; ?>').val(numberWithCommas(total));
                    $('#totalamt<?php echo $q; ?>').val(numberWithCommas(ans));
                    });
                    $('#qtyboq<?php echo $q; ?>').keyup(function() {
                    var qtyboq =$('#qtyboq<?php echo $q; ?>').val().replace(/,/g,"");
                    var matpriceboq = $('#matpriceboq<?php echo $q; ?>').val().replace(/,/g,"");
                    var total = (qtyboq*1) * (matpriceboq*1) ;
                    $('#matamtboq<?php echo $q; ?>').val(numberWithCommas(total));
                    $('#totalamtboq<?php echo $q; ?>').val(numberWithCommas(total));
                    });
                    $('#matpriceboq<?php echo $q; ?>').keyup(function() {
                    var qtyboq =$('#qtyboq<?php echo $q; ?>').val().replace(/,/g,"");
                    var matpriceboq = $('#matpriceboq<?php echo $q; ?>').val().replace(/,/g,"");
                    var total = (qtyboq*1) * (matpriceboq*1) ;
                    $('#matamtboq<?php echo $q; ?>').val(numberWithCommas(total));
                    $('#totalamtboq<?php echo $q; ?>').val(numberWithCommas(total));
                    });
                    $('#labpriceboq<?php echo $q; ?>').keyup(function() {
                    $('#totalamtboq<?php echo $q; ?>').val(0);
                    var labpriceboq = $('#labpriceboq<?php echo $q; ?>').val().replace(/,/g,"");
                    var qtyboq = $('#qtyboq<?php echo $q; ?>').val().replace(/,/g,"");
                    var total = qtyboq * labpriceboq ;
                    $('#labamtboq<?php echo $q; ?>').val(total);
                    var labamtboq = $('#labamtboq<?php echo $q; ?>').val().replace(/,/g,"");
                    var matamtboq = $('#matamtboq<?php echo $q; ?>').val().replace(/,/g,"");
                    var ans =  (labamtboq*1) + (matamtboq*1) ;
                    $('#labamtboq<?php echo $q; ?>').val(numberWithCommas(total));
                    $('#totalamtboq<?php echo $q; ?>').val(numberWithCommas(ans));
                    });
                    $('#subpriceboq<?php echo $q; ?>').keyup(function() {
                    $('#totalamtboq<?php echo $q; ?>').val(0);
                    var subpriceboq = $('#subpriceboq<?php echo $q; ?>').val().replace(/,/g,"");
                    var qtyboq = $('#qtyboq<?php echo $q; ?>').val().replace(/,/g,"");
                    var total = qtyboq * subpriceboq ;
                    $('#subamtboq<?php echo $q; ?>').val(total);
                    var labamtboq = $('#labamtboq<?php echo $q; ?>').val().replace(/,/g,"");
                    var matamtboq = $('#matamtboq<?php echo $q; ?>').val().replace(/,/g,"");
                    var subamtboq = $('#subamtboq<?php echo $q; ?>').val().replace(/,/g,"");
                    var ans =  (labamtboq*1) + (matamtboq*1) + (subamtboq*1);
                    $('#subamtboq<?php echo $q; ?>').val(numberWithCommas(total));
                    $('#totalamtboq<?php echo $q; ?>').val(numberWithCommas(ans));
                    });


                    var num = parseFloat($('#num').val());
                    var numm =  parseFloat(<?php echo $q; ?>);
                    var re = parseFloat(numm);
                    $('#num').val(re);


                    var jobname = $('#jobname').val();
                    var job = $('#systemei').val();
                    $('.namejob').html(jobname);
                    $('#job<?php echo $q; ?>').val(job);

                    var costcodetext = $('#costcodetext').val();
                    var cnamecost = $('#cnamecost').val();
                    $('.namejobcost').html(cnamecost);
                    $('#codecostcodee<?php echo $q; ?>').val(costcodetext);
                    $('#codecostnamee<?php echo $q; ?>').val(cnamecost);
                    </script>



                    <?php $q++;
                        }
                    ?>
                    <script type="text/javascript">
                    $('.cost_code_ls').click(function(event) {
                    $("#cost_code_id").load('<?php echo base_url(); ?>index.php/share/costcode_id_by_bd');
                    });
                    </script>
                    <script type="text/javascript">
                    $('.cost_code').click(function(event) {
                    $("#cost_code_id").load('<?php echo base_url(); ?>index.php/share/costcode_id_ls_bd');
                    });


                    
                    </script>