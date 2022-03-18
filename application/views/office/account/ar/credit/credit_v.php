<style>
    .no_border {
        width: 85px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;
    }
</style>
<?php 
$datestring = "Y";
             $mm = "m";
             $dd = "d";

             $this->db->select('*');
             $qu = $this->db->get('ar_credit_header');
             $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

             if ($res==0) {
                $jvcode = "CNR".date($datestring).date($mm)."000"."1";
                $acc_id ="1";
             }else{
               $this->db->select('*');
               $this->db->order_by('inv_id','desc');
               $this->db->limit('1');
               $q = $this->db->get('ar_credit_header');
               $run = $q->result();
               foreach ($run as $valx)
               {
                 $x1 = $valx->inv_id+1;
               }

               if ($x1<=9) {
                  $jvcode = "CNR".date($datestring).date($mm)."000".$x1;
                  $acc_id = $x1;
               }
               elseif ($x1<=99) {
                 $jvcode = "CNR".date($datestring).date($mm)."00".$x1;
                 $acc_id = $x1;
               }
               elseif ($x1<=999) {
                 $jvcode = "CNR".date($datestring).date($mm)."0".$x1;
                 $acc_id = $x1;
               }
             }
 ?>

<div class="content-wrapper">
    <div class="page-header">
        <div class="content">
            <div class="row">
                 <form method="post" action="<?php echo base_url();?>ar_active/insert_credit">
                    <div class="panel panel-flat">
                        <div class="panel-heading ">
                            <h5 class="panel-title">CN Invoice</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a style="color: #fff;" class="openinv btn btn-info btn-sm" data-toggle="modal" data-target="#openinv"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Select</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <!-- contant -->

                            <fieldset>
                                <div id="cccc"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Invoice No:</label>
                                        <input type="text" class="form-control" id="cn_code"  name="cn_code" readonly="" placeholder="Invoice No." value="<?php echo $jvcode; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Credit Note No:</label>
                                        <input type="text" class="form-control" id="" name="" readonly="" placeholder="Credit Note No." value="">
                                    </div>


                                    <div class="form-group">
                                        <label>Ref ferrent:</label>
                                        <input type="text" class="form-control" id="" name="" readonly="" placeholder="Refferrent" value="">

                                    </div>

                                    <div class="form-group">

                                        <label>Project Name:</label>
                                        <input type="text" class="form-control" id="project_name" name="project_name" readonly="" placeholder="Project" value="">
                                        <input type="hidden" class="form-control" id="project_id" name="project_id" readonly="" placeholder="Project" value="">
                                    </div>

                                    <div class="form-group">
                                        <label>Project Amount:</label>
                                        <input type="text" class="form-control" id="" name="" readonly="" placeholder="Project Amount" value="">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Period: </label>
                                                <input type="text" class="form-control" id="acc_period" name="acc_period" readonly="" placeholder="Period   " value="">

                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Year: </label>
                                                <input type="text" class="form-control" id="acc_year" name="acc_year" readonly="" placeholder="Year" value="">

                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Invoice No:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="invno" id="invno" readonly="" placeholder="Progress Payment">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Voucher No: </label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"  id="acc_no" name="acc_no" readonly="" placeholder="Voucher No" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Ref Tax No.:</label>
                                                <input type="text" class="form-control"  id="" name="" readonly="" placeholder="Ref Tax No" value="">
                                            </div>
                                        </div> -->
                                    </div>

                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Credit Note Date: </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                    <input type="text" class="form-control daterange-single" id="" name="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label>TAX: </label>
                                            <select class="form-control" name="" id="">
                                                <option value="1">Yes</option>
                                                <option value="2" selected="">No</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tax No:</label>
                                                <input type="text" class="form-control text-center" id="debtor_tax" name="debtor_tax" placeholder="Tax No" >
                                                </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>referrent Date: </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                    <input type="text" class="form-control daterange-single" id="ardate" name="ardate">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Tax Date: </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                    <input type="text" class="form-control daterange-single" id="ardate" name="ardate">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Less Advance:</label>
                                                <input type="text" class="form-control text-center" id="exchange" name="exchange" placeholder="%" value="0" readonly="" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Less Retention:</label>
                                                <input type="text" class="form-control text-center" id="project_lessretention" name="project_lessretention" placeholder="%" readonly="" >
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Owner/Customer:</label>
                                                <input type="text" class="form-control text-center" id="debtor_name" name="debtor_name" placeholder="Owner" readonly=""   >
                                                <input type="hidden" class="form-control" id="debtor_code" name="debtor_code" readonly="" placeholder="Project" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>W/T %:</label>
                                                <input type="text" class="form-control text-center" id="project_wt" name="project_wt" placeholder="%" readonly="" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Vat %:</label>
                                                <input type="text" class="form-control text-center" id="project_vat" name="project_vat" placeholder="%" readonly="" >
                                            </div>

                                    </div>


                                </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Type:</label>
                                                <input type="text" class="form-control text-center" id="acc_type" name="acc_type" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Remark:</label>
                                                <input type="text" class="form-control text-center" id="exchange" name="exchange"  readonly="" placeholder="Remark">
                                            </div>
                                        </div>

                                    </div>

                            </fieldset>
                            <br>
                            <input type="hidden" name="" id="to" ><input type="hidden" name="" id="de" >
                            <input type="hidden" name="" id="tov" ><input type="hidden" name="" id="ton">
                            <input type="hidden" name="" id="toa"><input type="hidden" name="" id="tow"><input type="hidden" name="" id="tor">


                            <div class="">
                                <div class="table-responsive" id="">
                                    <table class="table table-hover table-bordered table-striped table-xxs">
                                        <thead>
                                        <tr >
                                            <th>No.</th>
                                            <th class="text-center">System Type</th>
                                            <th class="text-center">Progress Amount</th>
                                            <th class="text-center">Less Advance</th>
                                            <th class="text-center">Vat</th>
                                            <th class="text-center">Less Retention</th>
                                            <th class="text-center">Less W/T</th>
                                            <th class="text-center">Net Amount</th>
                                            <th class="text-center">Receipt Net Amount</th>
                                            <th class="text-center">Cer DAte</th>
                                        </tr>
                                        </thead>
                                        <tbody id="iii">
                                        </tbody>
                                    </table>
                                </div>
                                <div id="gl"></div>
                            </div>
                            <br>
                            <div class="text-right">
                                <button type="submit" class="btn btn-success" id=""><i class="icon-box-add"></i>  Save</button>
                                <a href="#" class="btn btn-danger"><i class="icon-close2 position-left"></i> Close</a>
                            </div>

                        </div>
                </form>

            </div>
            <div id="openinv" class="modal fade" data-backdrop="false">
                <div class="modal-full modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h5 class="modal-title">Select Invoice</h5>
                        </div>

                        <div class="modal-body">
                            <div class="loadinv">

                            </div>
                        </div>
                        <br>
                        <!-- <div class="modal-footer">
                            <a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
                             <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> 
                        </div> -->
                    </div>
                </div>
            </div>

            <script>
                $("#gl").hide();

                $(".openinv").click(function(){
                    $(".loadinv").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                    $(".loadinv").load('<?php echo base_url(); ?>ar/load_modal_credit');
                });
            </script>
