
<div class="table-responsive">
    <table class="table table-bordered table-striped table-xxs">
        <thead>
            <tr>
                <td colspan="12" style="background: #66CCFF;">BILL OF QUALITY
                </td>
            </tr>
            <tr>
                <th class="text-center" style="background: #e5e5e5;">NO.</th>
                <th class="text-center" style="background: #e5e5e5;">Control</th>
                <th class="text-center" style="background: #e5e5e5;">Job</th>
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
                    $this->db->select( 'boq_mcode' );
                    $this->db->where( 'boq_code', $tdn );
                    $this->db->where( 'boq_mcode !=', "" );
                    $this->db->group_by( 'boq_mcode' );
                    $this->db->group_by( 'costcode' );
                    
                    $costmats = $this->db->get( 'boq_cost' )->result_array();
                    foreach ( $costmats as $key => $id ) {
                    $ids[] = $id['boq_mcode'];
                    }
                    error_reporting(0);
                    $this->db->select( '*' );
                    $this->db->from( 'pr_item' );
                    $this->db->join( 'pr', 'pr.pr_prno = pr_item.pri_ref' ,'left');
                    $this->db->where( 'pr_project', $projectid );
                    $this->db->where( 'pri_project', $projectid );
                    $this->db->where_not_in('pri_matcode',$ids );
                    $prnon = $this->db->get()->result();
                    
                    ?>
                <tr>
                    <td colspan="12" style="background: #66CCFF;">NOT IN BILL
                        OF QUALITY (BOQ)</td>
                </tr>
                

                <?php   $this->db->select( '*' );
                        $numsrow = $this->db->get( 'pr' )->num_rows;

                if(empty($prnon)){
                    
                }else{
                $a=1; $pri_priceunit=0; $pri_amount = 0; foreach ($prnon as $cosn){
                                $pri_priceunit = $pri_priceunit + $cosn->pri_priceunit;
                                $pri_amount = $pri_amount + $cosn->pri_amount;
                                    
                        ?>
                <tr>
                    <td class="text-center">
                        <?php echo $a; ?> 
                    </td>
                    <td class="text-center"><input type="checkbox" disabled=""></td>
                    <td style="color: #FFA500;" class="text-center">
                        <?php
                                    $this->db->select('*');
                                    $this->db->from('bdtender_d');
                                    $this->db->where('bdd_tenid',$tdn);
                                    $this->db->where('bdd_jobno',$cosn->pr_system);
                                $tender_d=$this->db->get()->result(); ?>
                        <?php  foreach ($tender_d as $tender_dd) { ?>
                        <?php echo $tender_dd->bdd_jobname; ?>
                        <?php	} ?>
                    </td>
                    <td style="color: #FFA500;">
                        <?php echo $cosn->pri_matcode; ?>
                    </td>
                    <td style="color: #FFA500;">
                        <?php echo $cosn->pri_matname; ?>
                    </td>
                    <td style="color: #FFA500;">
                        <?php echo $cosn->pri_costcode; ?>
                    </td>
                    <td></td>
                    <td style="color: #FFA500;" class="text-right"><a
                            data-toggle="modal" data-target="#prboqnon<?php echo $a; ?>">
                            <?php echo $cosn->pri_qty; ?></a></td>
                    <td></td>
                    <td style="color: #FFA500;">
                        <?php echo $cosn->pri_unit; ?>
                    </td>
                    <td style="color: #FFA500;" class="text-right">
                        <?php echo number_format($cosn->pri_priceunit,2); ?>
                    </td>
                    <td style="color: #FFA500;" class="text-right">
                        <?php echo number_format($cosn->pri_amount,2); ?>
                    </td>
                </tr>
                        <?php  
                $a++;   } }?>
                <?php if(empty($prnon)){?>

                <?php }else{ ?>
                <tr>
                    <td style="background: #e5e5e5;" colspan="10" class="text-center">TOTAL</td>
                    <td style="background: #e5e5e5;" class="text-right">
                        <?php echo number_format($pri_priceunit,2); ?>
                    </td>
                    <td style="background: #e5e5e5;" class="text-right">
                        <?php echo number_format($pri_amount,2); ?>
                    </td>
                </tr>
                <?php } ?>
        </thead>
    </table>
</div>

<?php if(empty($prnon)){ }else{ $a=1; $pri_priceunit=0; $pri_amount = 0; foreach ($prnon as $cosn){  ?>
                    <div id="prboqnon<?php echo $a; ?>" class="modal fade" style="display: none;">
                        <div class="modal-dialog modal-full">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h5 class="modal-title">BOQ</h5>
                                </div>
                                <div class="modal-body">
                                    <div>
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
															$this->db->where('pr_project',$projectid);
															$this->db->where('pri_matcode',$cosn->pri_matcode);
															$boq = $this->db->get()->result();
															$c=1;
															foreach ($boq as $b) { ?>

                                                <tr>
                                                    <td>
                                                        <?php echo $c; ?>
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
                                                    <td class="text-center"><a target="_blank" class="preload" href="<?php echo base_url(); ?>index.php/pr/editpr/<?php echo $b->pri_ref; ?>"
                                                            data-popup="tooltip" title="" data-original-title="Edit"><i
                                                                class="icon-pencil7"></i></a></td>
                                                </tr>

                                                <?php $c++; } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <?php $a++; } }?>