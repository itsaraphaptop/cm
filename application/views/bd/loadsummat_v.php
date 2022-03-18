

<div class="table-responsive">
    <table class="table table-bordered table-striped table-xxs">
        <thead>
            <tr>
                <td colspan="13" style="background: #66CCFF;">BILL OF QUALITY
                </td>
            </tr>
            <tr>
                <th class="text-center" style="background: #e5e5e5;">NO.</th>
                <th class="text-center" style="background: #e5e5e5;">Control</th>
                <th class="text-center" style="background: #e5e5e5;">Job</th>
                <th class="text-center" style="background: #e5e5e5;">Type</th>
                <th class="text-center" style="background: #e5e5e5;">Material
                    Code</th>
                <th class="text-center" style="background: #e5e5e5;">Material
                    Name</th>
                <th class="text-center" style="background: #e5e5e5;">Cost Code</th>
                <th class="text-center" style="background: #e5e5e5;">Budget(QTY)</th>
                <th class="text-center" style="background: #e5e5e5;">PR/MR QTY</th>
                <th class="text-center" style="background: #e5e5e5;">Budget
                    Bal.</th>
                <th class="text-center" style="background: #e5e5e5;">Unit</th>
                <th class="text-center" style="background: #e5e5e5;">Price/Unit</th>
                <th class="text-center" style="background: #e5e5e5;">Amount</th>

            </tr>
            <tbody>
                <?php
                        // $this->db->select('control_qty,boq_mcode,boq_mname,costcode,price_qty,qty,unitname,cost,system,SUM(qty) as totalqty');
                        $this->db->select('control_qty,boq_mcode,boq_mname,costcode,price_qty,qty,unitname,cost,system,type');
                        $this->db->where('boq_code',$tdn);
                        $this->db->where('cost !=',0);
                        $this->db->where('heading_ref',$heading);
                        $this->db->where('ref_revise',$ref_bd);
                        // $this->db->group_by('boq_mcode');
                        // $this->db->group_by('costcode');
                        $this->db->where('compcode',$compcode);
                        $this->db->where('type !=',3);
                        
                        $costmat = $this->db->get('boq_cost')->result();
                        $price_qtysum = 0;
                        $costsum = 0;
                        $mat = 0;
                        $num = 0;
                        // echo $num;
                        ?>
                <?php $n=1; foreach ($costmat as $cos){
                        $price_qtysum = $price_qtysum + $cos->price_qty;
                        $costsum = $costsum + $cos->cost;
                        $mat = $cos->boq_mcode;
                        $num = count($costmat);

                        ?>
                <tr>
                    <td class="text-center">
                        <?php echo $n; ?>
                    </td>
                    <td class="text-center"><input type="checkbox" name="boq_controlclick[]"
                            id="boq_controlclick<?php echo $n;?>" <?php
                            if($cos->control_qty=="1"){ echo "checked"; }?>></td>
                    <script>
                        $('#boq_controlclick<?php echo $n;?>').click(function(event) {
                                    
                                    
                                    if ($("#boq_controlclick<?php echo $n;?>").prop("checked")){
                                        $.post('<?php echo base_url(); ?>bd_active/control_qty/<?php echo $tdn;  ?>/<?php echo $cos->boq_mcode; ?>/1');
                                        }else{
                                        $.post('<?php echo base_url(); ?>bd_active/control_qty/<?php echo $tdn;  ?>/<?php echo $cos->boq_mcode; ?>/0');
                                        }
                                });





                            </script>
                    <td class="text-center">
                        <?php
                                $this->db->select('*');
                                $this->db->from('bdtender_d');
                                $this->db->where('bdd_tenid',$tdn);
                                $this->db->where('bdd_jobno',$cos->system);
                                $tender_d=$this->db->get()->result(); ?>
                        <?php  foreach ($tender_d as $tender_dd) { ?>
                        <?php echo $tender_dd->bdd_jobname; ?>
                        <?php	} ?>
                    </td>
                    <td><?php if($cos->type==1){ echo "<label class='label label-info'>Material</label>\n";}elseif($cos->type==2){echo "<label class='label label-warning'>Labor</label>\n";}else{echo "<label class='label bg-green'>Subcontractor</label>\n";}?></td>
                    <td>
                        <?php echo $cos->boq_mcode; ?>
                    </td>
                    <td>
                        <?php echo $cos->boq_mname; ?>
                    </td>
                    <td>
                        <?php echo $cos->costcode; ?>
                    </td>
                    <td class="text-center">
                        <?php echo number_format($cos->qty,2); ?>
                    </td>
                    <td class="text-center" style="background: #ddddff;">
                        <a data-toggle="modal" data-target="#prboq<?php echo $n; ?>">
                            <?php
                                        $this->db->select('sum(pri_qty) as cqty');
                                        $this->db->from('pr_item');
                                        $this->db->join('pr','pr.pr_prno = pr_item.pri_ref');
                                        $this->db->where('pri_status !=','delete');
                                        $this->db->where('pr_project',$projectid);
                                        $this->db->where('pri_matcode',$cos->boq_mcode);
                                        $this->db->where('boq_type',$cos->type);
                                        $pr = $this->db->get()->result();
                                        $qty = 0;
                                        foreach ($pr as $key) {
                                            $qty = $key->cqty*1;
                                        }
                                        echo number_format($qty,2);
                                    ?>
                        </a>
                    </td>
                    <td class="text-center" style="background: #ddddff;">
                        <?php echo number_format($cos->qty-$qty,2); ?>
                    </td>
                    <td>
                        <?php echo $cos->unitname; ?>
                    </td>
                    <td class="text-right" style="background: #F5F5F5;">
                        <?php echo number_format($cos->price_qty,2); ?>
                    </td>
                    <td class="text-right" style="background: #F5F5F5;">
                        <?php echo number_format($cos->cost,2); ?>
                    </td>
                </tr>

                   

                <?php $n++; } ?>
                <tr>
                    <td style="background: #e5e5e5;" colspan="11" class="text-center">TOTAL</td>
                    <td style="background: #e5e5e5;" class="text-right">
                        <!-- <?php echo number_format($price_qtysum,2); ?> -->
                    </td>
                    <td style="background: #e5e5e5;" class="text-right">
                        <?php echo number_format($costsum,2); ?>
                    </td>
                </tr>
        </thead>
    </table>
</div>

   <?php $n=1; foreach ($costmat as $cos){  ?>
                    <div id="prboq<?php echo $n; ?>" class="modal fade" style="display: none;">
                        <div class="modal-dialog modal-full">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h5 class="modal-title">BOQ</h5>
                                </div>
                                <div class="modal-body">

                                    <table class="table table-bordered table-striped table-xxs">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>PR No.</th>
                                                <th>Material Code</th>
                                                <th>Material Name</th>
                                                <th>Cost Code</th>
                                                <th>Cost Name</th>
                                                <th>Qty</th>
                                                <th>Unit</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
														$this->db->select('*');
														$this->db->from('pr_item');
                                                        $this->db->join('pr','pr.pr_prno = pr_item.pri_ref');
                                                        $this->db->where('pri_status !=','delete');
														$this->db->where('pr_project',$projectid);
                                                        $this->db->where('pri_matcode',$cos->boq_mcode);
                                                        $this->db->where('boq_type',$cos->type);
                                                        $this->db->where('pr.compcode',$compcode);
														$boq = $this->db->get()->result();
														$a=1;
														foreach ($boq as $b) { ?>

                                            <tr>
                                                <td>
                                                    <?php echo $a; ?>
                                                </td>
                                                <td>
                                                    <?php echo $b->pri_ref; ?>
                                                </td>
                                                <td>
                                                    <?php echo $b->pri_matcode; ?>
                                                </td>
                                                <td>
                                                    <?php echo $b->pri_matname; ?>
                                                </td>
                                                <td>
                                                    <?php echo $b->pri_costcode; ?>
                                                </td>
                                                <td>
                                                    <?php echo $b->pri_costname; ?>
                                                </td>
                                                <td>
                                                    <?php echo $b->pri_qty; ?>
                                                </td>
                                                <td>
                                                    <?php echo $b->pri_unit; ?>
                                                </td>
                                                <td>
                                                    <?php echo $b->datesend; ?>
                                                </td>
                                                <td class="text-center"><a target="_blank" class="preload" href="<?php echo base_url(); ?>index.php/pr/editpr/<?php echo $b->pri_ref; ?>/p/<?=$projectid;?>"
                                                        data-popup="tooltip" title="" data-original-title="Edit"><i
                                                            class="icon-pencil7"></i></a></td>
                                            </tr>

                                            <?php $a++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $n++; } ?>