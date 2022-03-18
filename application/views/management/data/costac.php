<?php
  function DateThai($strDate)
  {
    $strYear = date("Y",strtotime($strDate));
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay / $strMonth / $strYear";
  }

?>

<?php $pj = $this->uri->segment(3);?>
<?php $pjid = $this->uri->segment(4);
$session_data = $this->session->userdata('sessed_in');
$compcode = $session_data['compcode'];
?>

                 <?php
                  $session_data = $this->session->userdata('sessed_in');
                  $compcode = $session_data['compcode'];
                  $this->db->select('*');
                  $this->db->from('company');
                  $this->db->where('compcode',$compcode);
                  $compa = $this->db->get()->result();
                  $start_accost = 0;
                  $end_accost = 0;
                  $startrev = 0;
                  $endrev= 0;
                  $array_income = array();
                  $array_bg_vo = array();
                  foreach ($compa as $c) {
                    $start_accost = $c->start_accost;
                    $end_accost = $c->end_accost;
                    $startrev = $c->startrev;
                    $endrev = $c->endrev;
                  }
                 ?>
<div class="loading">Loading&#8230;</div>
<style type="text/css">
      .mychart{
            height: 50vh;
      }

      .text_r{
        text-align: right;
      }
      .text_l{
        text-align: left;
      }
      .my_btn{
        margin-top: -25%;
        border-radius: 25px;
        box-shadow: 5px 5px 5px #888888;
      }
      .chart_style{
        height: 80%;

      }

      text{
        text-shadow: 2px 2px 2px rgba(150, 150, 150, 1);
      }
      g{
        text-shadow: 4px 4px 2px rgba(100, 100, 100, 1);
      }
      .b{
        font-weight: bold;
        font-size: 14px;
      }
      .head_table{
        background-image:linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
      }
      .cricle{
        height: 100px;
        width: 100px;
      }
      .noti{
        font-size: 22px;
        display: block;
        /*margin-top: 20%;*/
      }
      .borderless td, .borderless th {
          border: none;
      }

      .box_content{
        margin-top: 5%;
      }





      .process-step .btn:focus{outline:none}
      .process{display:table;width:100%;position:relative}
      .process-row{display:table-row}
      .process-step button[disabled]{opacity:1 !important;filter: alpha(opacity=100) !important}
      .process-row:before{top:40px;bottom:0;position:absolute;content:" ";width:100%;height:1px;background-color:#ccc;z-order:0}
      .process-step{display:table-cell;text-align:center;position:relative}
      .process-step p{margin-top:4px}
      .btn-circle{width:80px;height:80px;text-align:center;font-size:12px;border-radius:50%}


</style>
<div class="content-wrapper">

<!-- <script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script> -->


	<?php
$this->db->select('*');
$this->db->where('project_code', $pj);
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
$this->db->where('boq_bd', $bd_tenid);
$bq = $this->db->get('boq_item')->result();
$bqq = 0;
$fc = 0;
foreach ($bq as $boq) {
	$bqq = $bqq + $boq->boq_budget_amt + $boq->boq_lab_amt;
	$fc = $fc + $boq->forecastbg;
}
?>



  <?php
$this->db->select("sum(project_value) as bg_vo");
$this->db->where("project_sub", $project_id);
$result_vo_bg = $this->db->get("project")->result_array()[0]["bg_vo"];

?>

  <?php
// project sub project
$this->db->select("project_id,project_code,project_name,project_value");
$this->db->where("project_sub", $project_id);
$res_sub_project = $this->db->get("project")->result_array();

$array_sub_name = array();
$array_sub_value = array();

foreach ($res_sub_project as $key => $sub_project) {
	$array_sub_name[] = $sub_project["project_name"];
	$array_sub_value[] = $sub_project["project_value"];
}

?>
      <div class="content">

        <div class="panel panel-flat">
            <div class="panel-heading">

            <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-bottom">
                  <li class="active"><a href="#bottom-tab" data-toggle="tab">Over View</a></li>
                  <li ><a href="#bottom-tab1" data-toggle="tab">Cost/Revenue (A/C)</a></li>
                  <li id="Graph_ac"><a href="#bottom-tab2" data-toggle="tab">Graph A/C Basis</a></li>
                  <li id="Graph_fn"><a href="#bottom-tab3" data-toggle="tab">Graph F/N Basis</a></li>
                  <li><a href="#bottom-tab4" data-toggle="tab">Progress Payment</a></li>
                  <li><a href="#bottom-tab5" data-toggle="tab">Actual Cost</a></li>
                  <li><a href="#bottom-tab6" data-toggle="tab">Purchase Cost</a></li>
                  <li><a href="#bottom-tab7" data-toggle="tab">Sammary Cost</a></li>
                  <li><a href="#bottom-tab8" data-toggle="tab">Material</a></li>
                  <li><a href="#bottom-tab9" data-toggle="tab">NACC</a></li>

                </ul>

                    <div class="tab-content">
                      <div class="tab-pane active" id="bottom-tab">
                        <div class="panel-body" style="font-size: 17px;">




                          <!-- row -->
                          <div class="row" style="margin-bottom: 15px;height: 20%;">
                            <div class="col-md-4" style="height: inherit;">
                              <h2> Sumary Revenue and Cost Project :<span id="project_name"> <?php echo $project_name; ?></span></h2><br>
                              <strong>Date:</strong>  <?php echo $project_start; ?> - <?php echo $project_stop; ?><br>
                              <strong>Contract:</strong>  <a href="#"><?=number_format($project_value)?></a><br>
                              <strong>BG VO:</strong>  <a href="#"><?=number_format($result_vo_bg)?></a><br>
                              <strong>Contract + BG VO:</strong>  <?php echo number_format($project_value + $result_vo_bg); ?>
                              <div class="form-inline">
                                <label><strong>Sub Project :</strong></label>
                                <select class="form-control" id="sub_project">
                                <option project_id="<?=$project_id?>" value="<?=$pj?>"><?=$project_name?></option>
                                <?php
                                  foreach ($res_sub_project as $key => $sub_project) {
                                  	?>
                                    <option project_id="<?=$sub_project["project_id"]?>"  value="<?=$sub_project["project_code"]?>"><?=$sub_project["project_name"]?></option>
                                <?php
                                }
                                ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-8 table-responsive" style="height: 100%;">
                                <style type="text/css">
                                   .height_td{
                                      /*height: 80%;*/
                                      text-align: center;
                                      z-index: 99;
                                      /*font-size: 30px;*/

                                   }
                                   .my_badge{
                                    font-size: 20px;
                                   }
                                </style>
                                <hr style="" style="float: right;margin-top: 300px;">
                                <table class="table borderless ">

                                    <tr style="border-top-style: hidden;">
                                      <td class="height_td">
                                          <!--  href="<?=base_url()?>pr/pr_approve/<?=$pj?>/<?=$project_id?>"  -->
                                        <a target="_blank" type_get="pr" project_id="<?=$project_id?>" project_code="<?=$pj?>"
                                           class="btn bg-teal-400 btn-rounded btn-icon btn-lg" style="height: 85px;width: 85px;z-index: 99;">
                                          <center>
                                            <span class="letter-icon" style="margin-top: 30%;margin-left: -20%;">
                                              <b class="my_badge">
                                                PR
                                              </b>
                                              <span class="badge bg-danger-400 media-badge pull-right" style="float: right;margin-top: -250%;">
                                                <?=$status_pending["pr"]?>
                                              </span>
                                            </span>
                                          </center>
                                        </a>
                                         <p>Wait for Approve</p>
                                      </td>
                                      <td class="height_td">
                                           <!-- href="<?=base_url()?>purchase/opencreatepo"   -->
                                        <a target="_blank" type_get="pr_approve" project_id="<?=$project_id?>" project_code="<?=$pj?>"
                                           class="btn bg-teal-400 btn-rounded btn-icon btn-lg" style="height: 85px;width: 85px;z-index: 99;">
                                          <center>
                                            <span class="letter-icon" style="margin-top: 30%;margin-left: -20%;">
                                                <b class="my_badge">PR</b>
                                                <span class="badge bg-danger-400 media-badge pull-right" style="float: right;margin-top: -250%;">
                                                <?=$status_pending["pr_approve"]?>
                                                </span>
                                            </span>
                                          </center>
                                        </a>
                                         <p>PR Approve</p>
                                      </td>
                                       <td class="height_td">
                                           <!-- href="<?=base_url()?>purchase/purchase_approve/<?=$project_id?>/p/<?=$pj?>"  -->
                                        <a target="_blank" type_get="po" project_id="<?=$project_id?>" project_code="<?=$pj?>"
                                           class="btn bg-teal-400 btn-rounded btn-icon btn-lg" style="height: 85px;width: 85px;z-index: 99;">
                                          <center>
                                            <span class="letter-icon" style="margin-top: 30%;margin-left: -20%;">
                                                <b class="my_badge">PO</b>
                                                <span class="badge bg-danger-400 media-badge pull-right" style="float: right;margin-top: -250%;">
                                                <?=$status_pending["po"]?>
                                                </span>
                                            </span>
                                          </center>
                                        </a>
                                         <p>Wait for Approve</p>
                                      </td>

                                      <td class="height_td">
                                           <!-- href="<?=base_url()?>inventory/receive_po_list/<?=$pj?>/<?=$project_id?>"  -->
                                        <a target="_blank" type_get="po_approve" project_id="<?=$project_id?>" project_code="<?=$pj?>"
                                           class="btn bg-teal-400 btn-rounded btn-icon btn-lg" style="height: 85px;width: 85px;z-index: 99;">
                                          <center>
                                            <span class="letter-icon" style="margin-top: 30%;margin-left: -20%;">
                                                <b class="my_badge">PO</b>
                                                <span class="badge bg-danger-400 media-badge pull-right" style="float: right;margin-top: -250%;">
                                                <?=$status_pending["po_approve"]?>
                                                </span>
                                            </span>
                                          </center>
                                        </a>
                                         <p>PO Approve</p>
                                      </td>

                                      <td class="height_td">
                                          <!-- href="<?=base_url()?>inventory/receive_po_header/<?=$pj?>/<?=$project_id?>"  -->
                                        <a target="_blank" type_get="ic" project_id="<?=$project_id?>" project_code="<?=$pj?>"

                                          class="btn bg-teal-400 btn-rounded btn-icon btn-lg" style="height: 85px;width: 85px;z-index: 99;">
                                          <center>
                                            <span class="letter-icon" style="margin-top: 30%;margin-left: -20%;">
                                                <b class="my_badge">IC</b>
                                                <span class="badge bg-danger-400 media-badge pull-right" style="float: right;margin-top: -250%;">
                                                <?=$status_pending["ic"]?>
                                                </span>
                                            </span>
                                          </center>
                                        </a>
                                         <p>Wait for IC Receive</p>
                                      </td>


                                    </tr>
                                </table>
                                <hr style="" style="float: right;margin-top: 300px;">
                            </div>
                          </div>
                          <!-- row -->



                            <!-- new layout -->
                                <style type="text/css">
                                      .col_height{
                                        height: 60vh;

                                      }
                                </style>
                                <div class="row">
                                    <!-- column 1.1 -->
                                    <div class="col-lg-3 box_content" style="">
                                        <div class="col_height">
                                            <!-- table header -->
                                            <div class="col-md-12 table-responsive" >
                                              <table class="table b table-fixed" style="font-size: 12px;">
                                                <thead>
                                                  <tr class="head_table b">
                                                    <th class="b col-xs-4">Month</th>
                                                    <th class="b col-xs-4">Progress</th>
                                                    <th class="b col-xs-4">% Progress</th>
                                                  </tr>
                                                </thead>
                                              </table>
                                            </div>
                                            <!-- table header -->
                                            <!-- table body -->
                                            <div class="col-md-12" style="max-height: 50vh;overflow-y: auto;">
                                              <table class="table table-bordered b table-responsive" style="font-size: 12px;">
                                                <tbody id="months_content_chart1_1">
                                                </tbody>
                                              </table>
                                            </div>
                                            <!-- table body -->
                                            <!-- table footer -->
                                            <div class="col-md-12 table-responsive">
                                              <table class="table b" style="font-size: 12px;">
                                                <tbody id="months_content_chart1_1_foot">
                                                </tbody>
                                              </table>
                                            </div>
                                            <!-- table footer -->
                                        </div>
                                    </div>
                                    <!-- column 1.1 -->

                                    <!-- column 1.2 -->
                                    <div class="col-lg-3 box_content" style="">
                                        <div class="col_height">
                                          <div id="chart_1_1" class="chart_style"></div>
                                          <a  target_page="<?=base_url()?>management/show_detail_over_view/" class="btn btn-sm btn-primary pull-right my_btn">More Detail Click</a>
                                        </div>
                                    </div>
                                    <!-- column 1.2 -->

                                    <!-- column 1.3 -->
                                    <div class="col-lg-3 box_content" style="">
                                          <div class="col_height">
                                              <!-- table header -->
                                              <div class="col-md-12 table-responsive">
                                                <table class="table header-fixed " style="font-size: 12px;">
                                                  <thead>
                                                    <tr class="head_table b">
                                                      <th class="b col-xs-4">Month</th>
                                                      <th class="b col-xs-4">Booking Cost</th>
                                                      <th class="b col-xs-4">% Progress</th>
                                                    </tr>
                                                  </thead>
                                                </table>
                                              </div>
                                              <!-- table header -->
                                              <!-- table body -->
                                              <div class="col-md-12" style="max-height: 50vh;overflow-y: auto;">
                                                <table class="table table-bordered header-fixed " style="font-size: 12px;">
                                                  <tbody id="months_content_chart1_2">
                                                  </tbody>
                                                </table>
                                              </div>
                                              <!-- table body -->
                                              <!-- table footer -->
                                              <div class="col-md-12 table-responsive">
                                                <table class="table b" style="font-size: 12px;">
                                                  <tbody id="months_content_chart1_2_foot">
                                                  </tbody>
                                                </table>
                                              </div>
                                              <!-- table footer -->
                                          </div>

                                    </div>
                                    <!-- column 1.3 -->

                                    <!-- column 1.4 -->
                                    <div class="col-lg-3 box_content" style="">
                                        <div class="col_height">
                                          <div id="chart_1_2" class="chart_style"></div>
                                          <a target_page="<?=base_url()?>management/show_detail_over_view_booking/" class="btn btn-sm btn-primary pull-right my_btn">More Detail Click</a>
                                        </div>
                                    </div>

                                    <!-- column 1.4 -->
                                </div>
                                <div class="row">
                                    <!-- column 2.1  -->
                                    <div class="col-lg-3 box_content" style="">
                                        <div class="col_height">
                                              <!-- table header -->
                                              <div class="col-md-12 table-responsive">
                                                <table class="table table-bordered header-fixed" style="font-size: 12px;">
                                                  <thead>
                                                    <tr class="head_table b">
                                                      <th class="b">Month</th>
                                                      <th class="b">Amount</th>
                                                      <th class="b">% Progress</th>
                                                    </tr>
                                                  </thead>
                                                </table>
                                              </div>
                                              <!-- table header -->
                                              <!-- table body -->
                                              <div class="col-md-12" style="max-height: 50vh;overflow-y: auto;">
                                                <table class="table table-bordered header-fixed" style="font-size: 12px;">
                                                  <tbody id="months_content_chart2_1">
                                                  </tbody>
                                                </table>
                                              </div>
                                              <!-- table body -->
                                              <!-- table footer -->
                                              <div class="col-md-12 table-responsive">
                                                <table class="table b" style="font-size: 12px;">
                                                  <tbody id="months_content_chart2_1_foot">
                                                  </tbody>
                                                </table>
                                              </div>
                                              <!-- table footer -->
                                        </div>
                                    </div>
                                    <!-- column 2.1  -->

                                    <!-- column 2.2  -->
                                    <div class="col-lg-3 box_content" style="">
                                        <div class="col_height">
                                            <div id="chart_2_1" class="chart_style"></div>
                                            <a target_page="<?=base_url()?>management/show_detail_over_view_actual_cost/" class="btn btn-sm btn-primary pull-right my_btn">More Detail Click</a>
                                        </div>
                                    </div>
                                    <!-- column 2.2  -->

                                    <!-- column 2.3  -->
                                    <div class="col-lg-6 box_content" style="">
                                        <div class="col_height">
                                          <div id="chart_2_2" class="col-md-12 chart_style" ></div>
                                        </div>
                                    </div>
                                    <!-- column 2.3  -->
                                </div>

                            <!-- new layout -->


                        </div>


                      </div>

											<div class="tab-pane" id="bottom-tab1">
                        <?php
                        $this->db->select('*');
                        $this->db->where('project_code', $pj);
                        $this->db->where('compcode', $compcode);
                        $qqqi = $this->db->get('project_item')->result();
                        $total_job_amount = 0;
                        foreach ($qqqi as $qqi) {
                          $num = count($qqqi);
                          $total_job_amount = $total_job_amount+$qqi->job_amount;
                        }?>
                      <div class="table-responsive" >
                        <h2>Cost Project :<span id="project_name"> <?php echo $project_name; ?></span></h2><br>
                              <strong>Date:</strong>  <?php echo $project_start; ?> - <?php echo $project_stop; ?><br>
                             
              <table class="table table-bordered  datatable-fixed-left" width="100%">
                <thead>
                  <tr style="background: #F0F8FF;">
                    <th class="text-center" rowspan="2"><b>Particular</b></th>
                    <th class="text-center" colspan="<?php echo $num+1; ?>"><b>Account Basis(Exc. VAT)</b></th>
                    <th class="text-center" colspan="<?php echo $num+1; ?>"><b>Finance Basis(Inc. VAT)</b></th>
                    <th class="text-right"><b>P/O <br>
                      Petty Cash<br>
                      Subcontractor</b>
                    </th>
                    <th class="text-right"><b>Revenue/Cost<br>
                      not Record</b>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td ></td>
                   <?php foreach ($qqqi as $qqi) { ?>
                   <?php
                    $this->db->select('*');
                    $this->db->from('system');
                    $this->db->where('compcode', $compcode);
                    $this->db->where('systemcode',$qqi->projectd_job);
                    $tender_d=$this->db->get()->result(); ?>
                    <?php  foreach ($tender_d as $tender_dd) { ?>
                    <td class="text-right"><b><?php echo $tender_dd->systemname; ?></b></td>
                    <?php } ?>
                   <?php } ?>
                   <td class="text-right"><b>Total</b></td>

                   <?php foreach ($qqqi as $qqi) { ?>
                   <?php
                    $this->db->select('*');
                    $this->db->from('system');
                    $this->db->where('compcode', $compcode);
                    $this->db->where('systemcode',$qqi->projectd_job);
                    $tender_d=$this->db->get()->result(); ?>
                    <?php  foreach ($tender_d as $tender_dd) { ?>
                    <td class="text-right"><b><?php echo $tender_dd->systemname; ?></b></td>
                    <?php } ?>
                   <?php } ?>
                   <td class="text-right"><b>Total</b></td>

                   <td></td>
                   <td></td>
                  </tr>

                  <tr>
                    <td>Contract</td>
                   <?php foreach ($qqqi as $qqi) { ?>
                    <td class="text-right"><?php echo number_format($qqi->job_amount,2); ?></td>

                   <?php } ?>
                   <td class="text-right"><?php echo number_format($total_job_amount,2); ?></td>

                   <?php foreach ($qqqi as $qqi) { ?>
                  <td class="text-right"><?php echo number_format($qqi->job_amount,2); ?></td>
                   <?php } ?>
                   <td class="text-right"><?php echo number_format($total_job_amount,2); ?></td>

                   <td class="text-right"></td>
                   <td class="text-right"></td>
                  </tr>

                   <tr>
                    <td >Variations Order (VO)</td>
                     
                   <?php foreach ($qqqi as $qqi) { ?>
                   <?php
                        $this->db->select('*,SUM(job_amount) as job_amounti');
                        $this->db->where('project_sub',$pjid);
                        $this->db->where('project.compcode', $compcode);
                        $this->db->where('project_item.projectd_job',$qqi->projectd_job);
                        $this->db->join('project_item','project.project_code = project_item.project_code');
                        $sub = $this->db->get('project')->result();
                        $job_amounti = 0;
                        foreach ($sub as $subi) {   
                        $job_amounti = $job_amounti+$subi->job_amounti;
                        ?>
                       <td class="text-right"><?php echo number_format($subi->job_amounti,2); ?></td>
                        <?php } ?>
                        <?php } ?>
                        
                  <?php
                        $this->db->select('*,SUM(job_amount) as job_amounti');
                        $this->db->where('project_sub',$pjid);
                        $this->db->where('project.compcode', $compcode);
                        $this->db->join('project_item','project.project_code = project_item.project_code');
                        $sub = $this->db->get('project')->result();
          
                        foreach ($sub as $subi) {   ?>
                   <td class="text-right"><?php echo number_format($subi->job_amounti,2); ?></td>
                   <?php } ?>

                                      <?php foreach ($qqqi as $qqi) { ?>
                   <?php
                        $this->db->select('*,SUM(job_amount) as job_amounti');
                        $this->db->where('project_sub',$pjid);
                         $this->db->where('project.compcode', $compcode);
                        $this->db->where('project_item.projectd_job',$qqi->projectd_job);
                        $this->db->join('project_item','project.project_code = project_item.project_code');
                        $sub = $this->db->get('project')->result();
                        $job_amounti = 0;
                        foreach ($sub as $subi) {   
                        $job_amounti = $job_amounti+$subi->job_amounti;
                        ?>
                       <td class="text-right"><?php echo number_format($subi->job_amounti,2); ?></td>
                        <?php } ?>
                        <?php } ?>
                        
                  <?php
                        $this->db->select('*,SUM(job_amount) as job_amounti');
                        $this->db->where('project_sub',$pjid);
                        $this->db->where('project.compcode', $compcode);
                        $this->db->join('project_item','project.project_code = project_item.project_code');
                        $sub = $this->db->get('project')->result();
          
                        foreach ($sub as $subi) {   ?>
                   <td class="text-right"><?php echo number_format($subi->job_amounti,2); ?></td>
                   <?php } ?>


                   <td class="text-right"></td>
                   <td class="text-right"></td>
                  </tr>


                   <tr style="background: #F5F5F5; border-style: dotted;" >
                    <td ><b>Total Contract Amount</b></td>
                     
                   <?php foreach ($qqqi as $qqi) { ?>
                   <?php
                        $this->db->select('*,SUM(job_amount) as job_amounti');
                        $this->db->where('project_sub',$pjid);
                        $this->db->where('project.compcode', $compcode);
                        $this->db->where('project_item.projectd_job',$qqi->projectd_job);
                        $this->db->join('project_item','project.project_code = project_item.project_code');
                        $sub = $this->db->get('project')->result();
                        $job_amounti = 0;
                        foreach ($sub as $subi) {   
                        $job_amounti = $job_amounti+$subi->job_amounti;
                        ?>
                       <td class="text-right"><?php echo number_format($qqi->job_amount+$subi->job_amounti,2); ?></td>
                        <?php } ?>
                        <?php } ?>
                        
                  <?php
                        $this->db->select('*,SUM(job_amount) as job_amounti');
                        $this->db->where('project_sub',$pjid);
                        $this->db->where('project.compcode', $compcode);
                        $this->db->join('project_item','project.project_code = project_item.project_code');
                        $sub = $this->db->get('project')->result();
          
                        foreach ($sub as $subi) {   ?>
                   <td class="text-right"><?php echo number_format($total_job_amount+$subi->job_amounti,2); ?></td>
                   <?php } ?>

                   <?php foreach ($qqqi as $qqi) { ?>
                   <?php
                        $this->db->select('*,SUM(job_amount) as job_amounti');
                        $this->db->where('project_sub',$pjid);
                        $this->db->where('project.compcode', $compcode);
                        $this->db->where('project_item.projectd_job',$qqi->projectd_job);
                        $this->db->join('project_item','project.project_code = project_item.project_code');
                        $sub = $this->db->get('project')->result();
                        $job_amounti = 0;
                        foreach ($sub as $subi) {   
                        $job_amounti = $job_amounti+$subi->job_amounti;
                        ?>
                       <td class="text-right"><?php echo number_format($qqi->job_amount+$subi->job_amounti,2); ?></td>
                        <?php } ?>
                        <?php } ?>
                        
                  <?php
                        $this->db->select('*,SUM(job_amount) as job_amounti');
                        $this->db->where('project_sub',$pjid);
                        $this->db->where('project.compcode', $compcode);
                        $this->db->join('project_item','project.project_code = project_item.project_code');
                        $sub = $this->db->get('project')->result();
          
                        foreach ($sub as $subi) {   ?>
                   <td class="text-right"><?php echo number_format($total_job_amount+$subi->job_amounti,2); ?></td>
                   <?php } ?>


                   <td class="text-right"></td>
                   <td class="text-right"></td>
                  </tr>


                  <tr style="background: #F0F8FF;">
                    <td><b>Revenue</b></td>
                   
                  </tr>

                   <tr>
                    <td>Progress / Trading</td>
                   <?php foreach ($qqqi as $qqi) { ?>
                     <?php
                        $this->db->select('*,SUM(inv_progressamt) as inv_progressamti');
                        $this->db->where('ar_invprogress_header.inv_type',"progress");
                        $this->db->where('ar_invprogress_header.inv_project',$pjid);
                        $this->db->where('ar_invprogress_detail.inv_system',$qqi->projectd_job);
                        $this->db->where('ar_invprogress_header.compcode', $compcode);
                        $this->db->where('ar_invprogress_header.inv_type',"progress");
                        $this->db->join('ar_invprogress_detail','ar_invprogress_header.inv_no = ar_invprogress_detail.inv_ref');
                        $arpj = $this->db->get('ar_invprogress_header')->result();
                        $inv_progressamti = 0;
                        foreach ($arpj as $ar) { 
                        $inv_progressamti = $ar->inv_progressamti;
                         } ?>
                       

                        <?php 
                        $this->db->select('*,SUM(inv_progressamt) as inv_progressamts');
                        $this->db->join('ar_invprogress_header','ar_invprogress_header.inv_project=project.project_id');
                        $this->db->join('ar_invprogress_detail','ar_invprogress_detail.inv_ref=ar_invprogress_header.inv_no');
                        $this->db->where('ar_invprogress_detail.inv_system',$qqi->projectd_job);
                        $this->db->where('ar_invprogress_header.inv_type',"progress");
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_invprogress_header.compcode', $compcode);
                        $arpjs = $this->db->get('project')->result();
                        $inv_progressamts = 0;
                        foreach ($arpjs as $ars) { 
                          $inv_progressamts = $ars->inv_progressamts;
                        }
                        ?>
                       
                       
                        
                       <td class="text-right"><a type="button"  data-toggle="modal" data-target="#arinvprogress<?php echo $qqi->projectd_job; ?>"><?php echo number_format(($inv_progressamti+$inv_progressamts),2); ?></a></td>

                   <?php } ?>

                    <?php
                        $this->db->select('*,SUM(inv_progressamt) as inv_progressamtisum');
                        $this->db->where('ar_invprogress_header.inv_type',"progress");
                        $this->db->where('ar_invprogress_header.inv_project',$pjid);
                        $this->db->where('ar_invprogress_header.compcode', $compcode);
                        $this->db->join('ar_invprogress_detail','ar_invprogress_header.inv_no = ar_invprogress_detail.inv_ref');
                        $arpj = $this->db->get('ar_invprogress_header')->result();
                        $inv_progressamtisum = 0;
                        foreach ($arpj as $ar) { 
                        $inv_progressamtisum = $ar->inv_progressamtisum;
                         } ?>
                       

                        <?php 
                        $this->db->select('*,SUM(inv_progressamt) as inv_progressamtssum');
                        $this->db->join('ar_invprogress_header','ar_invprogress_header.inv_project=project.project_id');
                        $this->db->join('ar_invprogress_detail','ar_invprogress_detail.inv_ref=ar_invprogress_header.inv_no');
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_invprogress_header.compcode', $compcode);
                        $this->db->where('ar_invprogress_header.inv_type',"progress");
                        $arpjs = $this->db->get('project')->result();
                        $inv_progressamtssum = 0;
                        foreach ($arpjs as $ars) { 
                          $inv_progressamtssum = $ars->inv_progressamtssum;
                        }
                        ?>
                   <td class="text-right"><a type="button"  data-toggle="modal" data-target="#arinvprogress"><?php echo number_format($inv_progressamtisum+$inv_progressamtssum,2); ?></a></td>

                  
                   
                   <?php foreach ($qqqi as $qqi) { ?>

                   <?php
                      $this->db->select('*,SUM(vou_downamt) as vou_downamt');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->where('ar_receiving_header.vou_type',"progress");
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $receiving = $this->db->get('ar_receiving_header')->result();
                      $vou_downamt = 0;
                      foreach ($receiving as $re) { 
                      $vou_downamt = $re->vou_downamt;
                         } 

                        $this->db->select('*,SUM(vou_downamt) as vou_downamts');
                        $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
                        $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');
                        $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_receiving_header.compcode', $compcode);
                        $this->db->where('ar_receiving_header.vou_type',"progress");
                        $receivings = $this->db->get('project')->result();
                        $vou_downamts = 0;
                        foreach ($receivings as $res) { 
                          $vou_downamts = $res->vou_downamts;
                        }
                    ?>

                        
                   <td class="text-right"><a type="button"  data-toggle="modal" data-target="#receivingprogress<?php echo $qqi->projectd_job; ?>"><?php echo number_format($vou_downamt+$vou_downamts,2); ?></a></td>
                   <?php } ?>
                    
                   <?php
                      $this->db->select('*,SUM(vou_downamt) as sum_vou_downamt');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->where('ar_receiving_header.vou_type',"progress");
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $sum_receiving = $this->db->get('ar_receiving_header')->result();
                      $sum_vou_downamt = 0;
                      foreach ($sum_receiving as $resum) { 
                      $sum_vou_downamt = $resum->sum_vou_downamt;
                         } 

                        $this->db->select('*,SUM(vou_downamt) as sum_vou_downamts');
                        $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
                        $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');
                        $this->db->where('ar_receiving_header.vou_type',"progress");
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_receiving_header.compcode', $compcode);
                        $sum_receiving_s = $this->db->get('project')->result();
                        $sum_vou_downamts = 0;
                        foreach ($sum_receiving_s as $resum_s) { 
                          $sum_vou_downamts = $resum_s->sum_vou_downamts;
                        }
                    ?>
                   <td class="text-right"><?php echo number_format($sum_vou_downamt+$sum_vou_downamts,2); ?></td>

                   <td class="text-right"></td>
                  
                   <td class="text-right"><?php echo number_format(($total_job_amount+$subi->job_amounti)-($inv_progressamtisum+$inv_progressamtssum),2); ?></td>
                  </tr>

                   <tr>
                    <td>Add Vat</td>
                   <?php foreach ($qqqi as $qqi) { ?>
                  
                    <td class="text-right"></td>
                   <?php } ?>
                   <td class="text-right"></td>

                   <?php foreach ($qqqi as $qqi) { ?>
                    <?php
                      $this->db->select('*,SUM(vou_vatamt) as vou_vatper_sum');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->where('ar_receiving_header.vou_type',"progress");
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $receiving = $this->db->get('ar_receiving_header')->result();
                      $vou_vatper = 0;
                      foreach ($receiving as $re) { 
                      $vou_vatper_sum = $re->vou_vatper_sum;
                         }

                      $this->db->select('*,SUM(vou_vatamt) as vou_vatper_sums');
                        $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
                        $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');
                        $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_receiving_header.compcode', $compcode);
                        $this->db->where('ar_receiving_header.vou_type',"progress");
                        $receivings = $this->db->get('project')->result();
                        $vou_vatper_sums = 0;
                        foreach ($receivings as $res) { 
                          $vou_vatper_sums = $res->vou_vatper_sums;
                        } 
                         ?>
                  <td class="text-right"><?php echo number_format($vou_vatper_sum+$vou_vatper_sums,2); ?></td>
                   <?php } ?>

                   <?php
                      $this->db->select('*,SUM(vou_vatamt) as total_vou_vatper_sum');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $sum_receiving = $this->db->get('ar_receiving_header')->result();
                      $total_vou_vatper_sum = 0;
                      foreach ($sum_receiving as $resum) { 
                      $total_vou_vatper_sum = $resum->total_vou_vatper_sum;
                         } 

                        $this->db->select('*,SUM(vou_vatamt) as total_vou_vatper_sums');
                        $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
                        $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_receiving_header.compcode', $compcode);
                        $sum_receiving_s = $this->db->get('project')->result();
                        $total_vou_vatper_sums = 0;
                        foreach ($sum_receiving_s as $resum_s) { 
                          $total_vou_vatper_sums = $resum_s->total_vou_vatper_sums;
                        }
                    ?>
                   <td class="text-right"><?php echo number_format($total_vou_vatper_sum+$total_vou_vatper_sums,2); ?></td>

                   <td class="text-right"></td>
                   <td class="text-right"></td>
                  </tr>

                  <tr>
                    <td>Add Advance</td>
                   <?php foreach ($qqqi as $qqi) { ?>
                  
                    <td class="text-right"></td>
                   <?php } ?>
                   <td class="text-right"></td>
                    <?php foreach ($qqqi as $qqi) { ?>
                     <?php
                      $this->db->select('*,SUM(vou_downamt) as sum_vou_down');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->where('ar_receiving_header.vou_type',"down");
                      $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $sum_receiving = $this->db->get('ar_receiving_header')->result();
                      $sum_vou_down = 0;
                      foreach ($sum_receiving as $resum) { 
                      $sum_vou_down = $resum->sum_vou_down;
                         } 

                        $this->db->select('*,SUM(vou_downamt) as sum_vou_downs');
                        $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
                        $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');
                        $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                        $this->db->where('ar_receiving_header.vou_type',"down");
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_receiving_header.compcode', $compcode);
                        $sum_receiving_s = $this->db->get('project')->result();
                        $sum_vou_downs = 0;
                        foreach ($sum_receiving_s as $resum_s) { 
                          $sum_vou_downs = $resum_s->sum_vou_downs;
                        }
                    ?>
                    <td class="text-right"><a type="button"  data-toggle="modal" data-target="#receivingdown<?php echo $qqi->projectd_job; ?>"><?php echo number_format($sum_vou_down+$sum_vou_downs,2); ?></a></td>
                   <?php } ?>

                   <?php
                      $this->db->select('*,SUM(vou_downamt) as total_sum_vou_down');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->where('ar_receiving_header.vou_type',"down");
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $sum_receiving = $this->db->get('ar_receiving_header')->result();
                      $total_sum_vou_down = 0;
                      foreach ($sum_receiving as $resum) { 
                      $total_sum_vou_down = $resum->total_sum_vou_down;
                         } 

                        $this->db->select('*,SUM(vou_downamt) as total_sum_vou_downs');
                        $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
                        $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');
                        $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_receiving_header.vou_type',"down");
                        $this->db->where('ar_receiving_header.compcode', $compcode);
                        $sum_receiving_s = $this->db->get('project')->result();
                        $total_sum_vou_downs = 0;
                        foreach ($sum_receiving_s as $resum_s) { 
                          $total_sum_vou_downs = $resum_s->total_sum_vou_downs;
                        }
                    ?>
                   <td class="text-right"><?php echo number_format($total_sum_vou_down+$total_sum_vou_downs,2); ?></td>
                  

                   <td class="text-right"></td>
                   <td class="text-right"></td>
                  </tr>

                  <tr>
                    <td>Add Retention</td>
                   <?php foreach ($qqqi as $qqi) { ?>
                    <td class="text-right"></td>
                   <?php } ?>
                   
                   <td class="text-right"></td>

                    <?php foreach ($qqqi as $qqi) { ?>
                                       <?php
                      $this->db->select('*,SUM(vou_downamt) as sum_vou_retention');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->where('ar_receiving_header.vou_type',"retention");
                       $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $sum_receiving = $this->db->get('ar_receiving_header')->result();
                      $sum_vou_retention = 0;
                      foreach ($sum_receiving as $resum) { 
                      $sum_vou_retention = $resum->sum_vou_retention;
                         } 

                        $this->db->select('*,SUM(vou_downamt) as sum_vou_retention_s');
                        $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
                        $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');
                         $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                        $this->db->where('ar_receiving_header.vou_type',"retention");
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_receiving_header.compcode', $compcode);
                        $sum_receiving_s = $this->db->get('project')->result();
                        $sum_vou_retention_s = 0;
                        foreach ($sum_receiving_s as $resum_s) { 
                          $sum_vou_retention_s = $resum_s->sum_vou_retention_s;
                        }
                    ?>
                    <td class="text-right"><a type="button"  data-toggle="modal" data-target="#receivingretention<?php echo $qqi->projectd_job; ?>"><?php echo number_format($sum_vou_retention+$sum_vou_retention_s,2); ?></a></td>
                   <?php } ?>


                   <?php
                      $this->db->select('*,SUM(vou_downamt) as total_sum_vou_retention');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->where('ar_receiving_header.vou_type',"retention");
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $sum_receiving = $this->db->get('ar_receiving_header')->result();
                      $total_sum_vou_retention = 0;
                      foreach ($sum_receiving as $resum) { 
                      $total_sum_vou_retention = $resum->total_sum_vou_retention;
                         } 

                        $this->db->select('*,SUM(vou_downamt) as total_sum_vou_retention_s');
                        $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
                        $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');
                        $this->db->where('ar_receiving_header.vou_type',"retention");
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_receiving_header.compcode', $compcode);
                        $sum_receiving_s = $this->db->get('project')->result();
                        $total_sum_vou_retention_s = 0;
                        foreach ($sum_receiving_s as $resum_s) { 
                          $total_sum_vou_retention_s = $resum_s->total_sum_vou_retention_s;
                        }
                    ?>
                    <td class="text-right"><?php echo number_format($total_sum_vou_retention+$total_sum_vou_retention_s,2); ?></td>

                   <td class="text-right"></td>
                   <td class="text-right"></td>
                  </tr>

                  <tr>
                    <td>Less Advance</td>
                   <?php foreach ($qqqi as $qqi) { ?>
                    <td class="text-right"></td>
                   <?php } ?>
                   <td class="text-right"></td>

                   <?php foreach ($qqqi as $qqi) { ?>
                   <?php
                      $this->db->select('*,SUM(vou_advamt) as vou_advamt_sum');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $receiving = $this->db->get('ar_receiving_header')->result();
                      $vou_advamt = 0;
                      foreach ($receiving as $re) { 
                      $vou_advamt_sum = $re->vou_advamt_sum;
                         }

                      $this->db->select('*,SUM(vou_advamt) as vou_advamt_sums');
                        $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
                        $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');
                        $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_receiving_header.compcode', $compcode);
                        $this->db->where('ar_receiving_header.vou_type',"progress");
                        $receivings = $this->db->get('project')->result();
                        $vou_advamt_sums = 0;
                        foreach ($receivings as $res) { 
                          $vou_advamt_sums = $res->vou_advamt_sums;
                        } 
                         ?>
                  <td class="text-right"><?php echo number_format($vou_advamt_sum+$vou_advamt_sums,2); ?></td>
                   <?php } ?>

                    <?php
                      $this->db->select('*,SUM(vou_advamt) as total_vou_advamt_sum');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $sum_receiving = $this->db->get('ar_receiving_header')->result();
                      $total_vou_advamt_sum = 0;
                      foreach ($sum_receiving as $resum) { 
                      $total_vou_advamt_sum = $resum->total_vou_advamt_sum;
                         } 

                        $this->db->select('*,SUM(vou_advamt) as total_vou_advamt_sums');
                        $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
                        $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');

                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_receiving_header.compcode', $compcode);
                        $sum_receiving_s = $this->db->get('project')->result();
                        $total_vou_advamt_sums = 0;
                        foreach ($sum_receiving_s as $resum_s) { 
                          $total_vou_advamt_sums = $resum_s->total_vou_advamt_sums;
                        }
                    ?>
                   <td class="text-right"><?php echo number_format($total_vou_advamt_sum+$total_vou_advamt_sums,2); ?></td>

                   <td class="text-right"></td>
                   <td class="text-right"></td>
                  </tr>

                  <tr>
                    <td>Less Tax</td>
                   <?php foreach ($qqqi as $qqi) { ?>
                    <td class="text-right"></td>
                   <?php } ?>
                   <td class="text-right"></td>

                   <?php foreach ($qqqi as $qqi) { ?>
                   <?php
                      $this->db->select('*,SUM(vou_lesswt) as vou_lesswt_sum');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $receiving = $this->db->get('ar_receiving_header')->result();
                      $vou_lesswt = 0;
                      foreach ($receiving as $re) { 
                      $vou_lesswt_sum = $re->vou_lesswt_sum;
                         }

                      $this->db->select('*,SUM(vou_lesswt) as vou_lesswt_sums');
                        $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
                        $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');
                        $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_receiving_header.compcode', $compcode);
                        $receivings = $this->db->get('project')->result();
                        $vou_lesswt_sums = 0;
                        foreach ($receivings as $res) { 
                          $vou_lesswt_sums = $res->vou_lesswt_sums;
                        } 
                         ?>
                  <td class="text-right"><?php echo number_format($vou_lesswt_sum+$vou_lesswt_sums,2); ?></td>
                   <?php } ?>
                   <?php
                      $this->db->select('*,SUM(vou_lesswt) as total_vou_lesswt_sum');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $sum_receiving = $this->db->get('ar_receiving_header')->result();
                      $total_vou_lesswt_sum = 0;
                      foreach ($sum_receiving as $resum) { 
                      $total_vou_lesswt_sum = $resum->total_vou_lesswt_sum;
                         } 

                        $this->db->select('*,SUM(vou_lesswt) as total_vou_lesswt_sums');
                        $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
                        $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');

                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_receiving_header.compcode', $compcode);
                        $sum_receiving_s = $this->db->get('project')->result();
                        $total_vou_lesswt_sums = 0;
                        foreach ($sum_receiving_s as $resum_s) { 
                          $total_vou_lesswt_sums = $resum_s->total_vou_lesswt_sums;
                        }
                    ?>
                   <td class="text-right"><?php echo number_format($total_vou_lesswt_sum+$total_vou_lesswt_sums,2); ?></td>

                   <td class="text-right"></td>
                   <td class="text-right"></td>
                  </tr>

                  <tr>
                    <td>Less RET.</td>
                   <?php foreach ($qqqi as $qqi) { ?>
                    <td class="text-right"></td>
                   <?php } ?>
                   <td class="text-right"></td>

                   <?php foreach ($qqqi as $qqi) { ?>
                   <?php
                      $this->db->select('*,SUM(vou_retamt) as vou_retamt_sum');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $receiving = $this->db->get('ar_receiving_header')->result();
                      $vou_retamt = 0;
                      foreach ($receiving as $re) { 
                      $vou_retamt_sum = $re->vou_retamt_sum;
                         }

                      $this->db->select('*,SUM(vou_retamt) as vou_retamt_sums');
                        $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
                        $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');
                        $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_receiving_header.compcode', $compcode);
                        $receivings = $this->db->get('project')->result();
                        $vou_retamt_sums = 0;
                        foreach ($receivings as $res) { 
                          $vou_retamt_sums = $res->vou_retamt_sums;
                        } 
                         ?>
                  <td class="text-right"><?php echo number_format($vou_retamt_sum+$vou_retamt_sums,2); ?></td>
                   <?php } ?>
                   <?php
                      $this->db->select('*,SUM(vou_retamt) as total_vou_retamt_sum');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $sum_receiving = $this->db->get('ar_receiving_header')->result();
                      $total_vou_retamt_sum = 0;
                      foreach ($sum_receiving as $resum) { 
                      $total_vou_retamt_sum = $resum->total_vou_retamt_sum;
                         } 

                        $this->db->select('*,SUM(vou_retamt) as total_vou_retamt_sums');
                        $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
                        $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');

                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_receiving_header.compcode', $compcode);
                        $sum_receiving_s = $this->db->get('project')->result();
                        $total_vou_retamt_sums = 0;
                        foreach ($sum_receiving_s as $resum_s) { 
                          $total_vou_retamt_sums = $resum_s->total_vou_retamt_sums;
                        }
                    ?>
                   <td class="text-right"><?php echo number_format($total_vou_retamt_sum+$total_vou_retamt_sums,2); ?></td>

                   <td class="text-right"></td>
                   <td class="text-right"></td>
                  </tr>

                  <tr style="background: #F5F5F5; border-style: dotted;">
                    <td>Total Revenue Amount</td>
                     <?php foreach ($qqqi as $qqi) { ?>
                     <?php
                        $this->db->select('*,SUM(inv_progressamt) as inv_progressamti');
                        $this->db->where('ar_invprogress_header.inv_type',"progress");
                        $this->db->where('ar_invprogress_header.inv_project',$pjid);
                        $this->db->where('ar_invprogress_detail.inv_system',$qqi->projectd_job);
                        $this->db->where('ar_invprogress_header.compcode', $compcode);
                        $this->db->where('ar_invprogress_header.inv_type',"progress");
                        $this->db->join('ar_invprogress_detail','ar_invprogress_header.inv_no = ar_invprogress_detail.inv_ref');
                        $arpj = $this->db->get('ar_invprogress_header')->result();
                        $inv_progressamti = 0;
                        foreach ($arpj as $ar) { 
                        $inv_progressamti = $ar->inv_progressamti;
                         } ?>
                       

                        <?php 
                        $this->db->select('*,SUM(inv_progressamt) as inv_progressamts');
                        $this->db->join('ar_invprogress_header','ar_invprogress_header.inv_project=project.project_id');
                        $this->db->join('ar_invprogress_detail','ar_invprogress_detail.inv_ref=ar_invprogress_header.inv_no');
                        $this->db->where('ar_invprogress_detail.inv_system',$qqi->projectd_job);
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_invprogress_header.compcode', $compcode);
                        $this->db->where('ar_invprogress_header.inv_type',"progress");
                        $arpjs = $this->db->get('project')->result();
                        $inv_progressamts = 0;
                        foreach ($arpjs as $ars) { 
                          $inv_progressamts = $ars->inv_progressamts;
                        }
                        ?>
                       
                       
                        
                       <td class="text-right"><a type="button"  data-toggle="modal" data-target="#arinvprogress<?php echo $qqi->projectd_job; ?>"><?php echo number_format(($inv_progressamti+$inv_progressamts),2); ?></a></td>

                   <?php } ?>

                    <?php
                        $this->db->select('*,SUM(inv_progressamt) as inv_progressamtisum');
                        $this->db->where('ar_invprogress_header.inv_type',"progress");
                        $this->db->where('ar_invprogress_header.inv_project',$pjid);
                        $this->db->where('ar_invprogress_header.compcode', $compcode);
                        $this->db->where('ar_invprogress_header.inv_type',"progress");
                        $this->db->join('ar_invprogress_detail','ar_invprogress_header.inv_no = ar_invprogress_detail.inv_ref');
                        $arpj = $this->db->get('ar_invprogress_header')->result();
                        $inv_progressamtisum = 0;
                        foreach ($arpj as $ar) { 
                        $inv_progressamtisum = $ar->inv_progressamtisum;
                         } ?>
                       

                        <?php 
                        $this->db->select('*,SUM(inv_progressamt) as inv_progressamtssum');
                        $this->db->join('ar_invprogress_header','ar_invprogress_header.inv_project=project.project_id');
                        $this->db->join('ar_invprogress_detail','ar_invprogress_detail.inv_ref=ar_invprogress_header.inv_no');
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_invprogress_header.compcode', $compcode);
                        $this->db->where('ar_invprogress_header.inv_type',"progress");
                        $arpjs = $this->db->get('project')->result();
                        $inv_progressamtssum = 0;
                        foreach ($arpjs as $ars) { 
                          $inv_progressamtssum = $ars->inv_progressamtssum;
                        }
                        ?>
                   <td class="text-right"><?php echo number_format($inv_progressamtisum+$inv_progressamtssum,2); ?></td>

                  
                   
                   <?php foreach ($qqqi as $qqi) { ?>
                    <?php
                      $this->db->select('*,SUM(vou_downamt) as vou_downamt');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->where('ar_receiving_header.vou_type',"progress");
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $receiving = $this->db->get('ar_receiving_header')->result();
                      $vou_downamt = 0;
                      foreach ($receiving as $re) { 
                      $vou_downamt = $re->vou_downamt;
                         } 

                        $this->db->select('*,SUM(vou_downamt) as vou_downamts');
                        $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
                        $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');
                        $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_receiving_header.compcode', $compcode);
                        $this->db->where('ar_receiving_header.vou_type',"progress");
                        $receivings = $this->db->get('project')->result();
                        $vou_downamts = 0;
                        foreach ($receivings as $res) { 
                          $vou_downamts = $res->vou_downamts;
                        }
                    ?>
                        <?php
                      $this->db->select('*,SUM(vou_vatamt) as vou_vatper_sum');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->where('ar_receiving_header.vou_type',"progress");
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $receiving = $this->db->get('ar_receiving_header')->result();
                      $vou_vatper = 0;
                      foreach ($receiving as $re) { 
                      $vou_vatper_sum = $re->vou_vatper_sum;
                         }

                      $this->db->select('*,SUM(vou_vatamt) as vou_vatper_sums');
                        $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
                        $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');
                        $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_receiving_header.compcode', $compcode);
                        $this->db->where('ar_receiving_header.vou_type',"progress");
                        $receivings = $this->db->get('project')->result();
                        $vou_vatper_sums = 0;
                        foreach ($receivings as $res) { 
                          $vou_vatper_sums = $res->vou_vatper_sums;
                        } 
                         ?>
                    <?php
                      $this->db->select('*,SUM(vou_downamt) as sum_vou_down');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->where('ar_receiving_header.vou_type',"down");
                      $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $sum_receiving = $this->db->get('ar_receiving_header')->result();
                      $sum_vou_down = 0;
                      foreach ($sum_receiving as $resum) { 
                      $sum_vou_down = $resum->sum_vou_down;
                         } 

                        $this->db->select('*,SUM(vou_downamt) as sum_vou_downs');
                        $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
                        $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');
                        $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                        $this->db->where('ar_receiving_header.vou_type',"down");
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_receiving_header.compcode', $compcode);
                        $sum_receiving_s = $this->db->get('project')->result();
                        $sum_vou_downs = 0;
                        foreach ($sum_receiving_s as $resum_s) { 
                          $sum_vou_downs = $resum_s->sum_vou_downs;
                        }
                    ?>
                    
                                       <?php
                      $this->db->select('*,SUM(vou_downamt) as sum_vou_retention');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->where('ar_receiving_header.vou_type',"retention");
                       $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $sum_receiving = $this->db->get('ar_receiving_header')->result();
                      $sum_vou_retention = 0;
                      foreach ($sum_receiving as $resum) { 
                      $sum_vou_retention = $resum->sum_vou_retention;
                         } 

                        $this->db->select('*,SUM(vou_downamt) as sum_vou_retention_s');
                        $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
                        $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');
                         $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                        $this->db->where('ar_receiving_header.vou_type',"retention");
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_receiving_header.compcode', $compcode);
                        $sum_receiving_s = $this->db->get('project')->result();
                        $sum_vou_retention_s = 0;
                        foreach ($sum_receiving_s as $resum_s) { 
                          $sum_vou_retention_s = $resum_s->sum_vou_retention_s;
                        }
                    ?>
                    <?php
                      $this->db->select('*,SUM(vou_advamt) as vou_advamt_sum');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $receiving = $this->db->get('ar_receiving_header')->result();
                      $vou_advamt = 0;
                      foreach ($receiving as $re) { 
                      $vou_advamt_sum = $re->vou_advamt_sum;
                         }

                      $this->db->select('*,SUM(vou_advamt) as vou_advamt_sums');
                        $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
                        $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');
                        $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_receiving_header.compcode', $compcode);
                        $this->db->where('ar_receiving_header.vou_type',"progress");
                        $receivings = $this->db->get('project')->result();
                        $vou_advamt_sums = 0;
                        foreach ($receivings as $res) { 
                          $vou_advamt_sums = $res->vou_advamt_sums;
                        } 
                         ?>
                        <?php
                      $this->db->select('*,SUM(vou_lesswt) as vou_lesswt_sum');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $receiving = $this->db->get('ar_receiving_header')->result();
                      $vou_lesswt = 0;
                      foreach ($receiving as $re) { 
                      $vou_lesswt_sum = $re->vou_lesswt_sum;
                         }

                      $this->db->select('*,SUM(vou_lesswt) as vou_lesswt_sums');
                        $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
                        $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');
                        $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_receiving_header.compcode', $compcode);
                        $receivings = $this->db->get('project')->result();
                        $vou_lesswt_sums = 0;
                        foreach ($receivings as $res) { 
                          $vou_lesswt_sums = $res->vou_lesswt_sums;
                        } 
                         ?>
                        <?php
                      $this->db->select('*,SUM(vou_retamt) as vou_retamt_sum');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $receiving = $this->db->get('ar_receiving_header')->result();
                      $vou_retamt = 0;
                      foreach ($receiving as $re) { 
                      $vou_retamt_sum = $re->vou_retamt_sum;
                         }

                        $this->db->select('*,SUM(vou_retamt) as vou_retamt_sums');
                        $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
                        $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');
                        $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_receiving_header.compcode', $compcode);
                        $receivings = $this->db->get('project')->result();
                        $vou_retamt_sums = 0;
                        foreach ($receivings as $res) { 
                          $vou_retamt_sums = $res->vou_retamt_sums;
                        } 
                         ?>
                   <td class="text-right"><?php echo  number_format($vou_downamt+$vou_downamts+$vou_vatper_sum+$vou_vatper_sums+$sum_vou_down+$sum_vou_downs+$sum_vou_retention+$sum_vou_retention_s+$vou_advamt_sum+$vou_advamt_sums+$vou_lesswt_sum+$vou_lesswt_sums+$vou_retamt_sum+$vou_retamt_sums,2); ?></td>
                   <?php } ?>

                   <td class="text-right"><?php echo number_format($sum_vou_downamt+$sum_vou_downamts+$total_vou_vatper_sum+$total_vou_vatper_sums+$total_sum_vou_down+$total_sum_vou_downs+$total_sum_vou_retention+$total_sum_vou_retention_s+$total_vou_advamt_sum+$total_vou_advamt_sums+$total_vou_lesswt_sum+$total_vou_lesswt_sums+$total_vou_retamt_sum+$total_vou_retamt_sums,2); ?></td>

                   <td class="text-right"></td>
                  
                   <td class="text-right"><?php echo number_format(($total_job_amount+$subi->job_amounti)-($inv_progressamtisum+$inv_progressamtssum),2); ?></td>
                  

                   
                  </tr>

                  <tr style="background: #F0F8FF;">
                    <td><b>Cost</b></td>
                  </tr>

                  <tr>
                    <td>Meterial by P/O</td>
                    <?php foreach ($qqqi as $qqi) { ?>
                    <?php
                      $this->db->select('*,SUM(amtdr) as apvi_amounti');
                      $this->db->where('apv_header.apv_project',$pjid);
                      $this->db->where('apv_header.compcode', $compcode);
                      $this->db->where('ap_gl.systemcode',$qqi->projectd_job);
                      $this->db->where('ap_gl.doctype','apv');
                      $this->db->where('ap_gl.acct_no >=',$start_accost);
                      $this->db->where('ap_gl.acct_no <=',$end_accost);
                      $this->db->join('ap_gl','apv_header.apv_code = ap_gl.vchno');
                      $apv = $this->db->get('apv_header')->result();
                      $apvi_amounti = 0;
                      foreach ($apv as $apvi) {
                       $apvi_amounti = $apvi->apvi_amounti;
                      }

                    $this->db->select('*,SUM(amtdr) as apvi_amountisub');
                    $this->db->join('apv_header','apv_header.apv_project=project.project_id');
                    $this->db->join('ap_gl','apv_header.apv_code = ap_gl.vchno');
                    $this->db->where('ap_gl.systemcode',$qqi->projectd_job);
                    $this->db->where('project.project_sub',$pjid);
                    $this->db->where('apv_header.compcode', $compcode);
                    $this->db->where('ap_gl.doctype','apv');
                    $this->db->where('ap_gl.acct_no >=',$start_accost);
                    $this->db->where('ap_gl.acct_no <=',$end_accost);
                    $apvsub = $this->db->get('project')->result();
                    foreach ($apvsub as $apvis) {
                       $apvi_amountisub = $apvis->apvi_amountisub;
                      }
                      ?>
                    <td class="text-right"><?php echo number_format($apvi_amounti+$apvi_amountisub,2); ?></td>
                    <?php } ?>

                    <?php
                      $this->db->select('*,SUM(amtdr) as apvi_amountisum');
                      $this->db->where('apv_header.apv_project',$pjid);
                      $this->db->where('apv_header.compcode', $compcode);
                      $this->db->where('ap_gl.doctype','apv');
                      $this->db->where('ap_gl.acct_no >=',$start_accost);
                      $this->db->where('ap_gl.acct_no <=',$end_accost);
                      $this->db->join('ap_gl','apv_header.apv_code = ap_gl.vchno');
                      $apvs = $this->db->get('apv_header')->result();
                      $apvi_amountisum = 0;
                      foreach ($apvs as $apviss) {
                       $apvi_amountisum = $apviss->apvi_amountisum;
                      }

                    $this->db->select('*,SUM(amtdr) as apvi_amountisubsum');
                    $this->db->join('apv_header','apv_header.apv_project=project.project_id');
                    $this->db->join('ap_gl','apv_header.apv_code = ap_gl.vchno');
                    $this->db->where('project.project_sub',$pjid);
                    $this->db->where('apv_header.compcode', $compcode);
                    $this->db->where('ap_gl.doctype','apv');
                    $this->db->where('ap_gl.acct_no >=',$start_accost);
                    $this->db->where('ap_gl.acct_no <=',$end_accost);
                    $apvsubi = $this->db->get('project')->result();
                    foreach ($apvsubi as $apvisub) {
                       $apvi_amountisubsum = $apvisub->apvi_amountisubsum;
                      }

                      ?>
                    <td class="text-right"><?php echo number_format($apvi_amountisum+$apvi_amountisubsum,2); ?></td>

                    <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>
                    <?php
                     $this->db->select('*,SUM(poi_disamt) as poi_disamt');
                     $this->db->join('po_item','po_item.poi_ref=po.po_pono'); 
                     $this->db->where('po.po_project',$pjid);
                     $this->db->where('po.compcode', $compcode);
                     $po_project = $this->db->get('po')->result();
                     foreach ($po_project as $poe) {
                       $poi_disamt = $poe->poi_disamt;
                     }

                     $this->db->select('*,SUM(poi_disamt) as poi_disamt_sub');
                     $this->db->join('po','po.po_project=project.project_id');
                     $this->db->join('po_item','po_item.poi_ref=po.po_pono'); 
                     $this->db->where('project.project_sub',$pjid);
                     $this->db->where('po.compcode', $compcode);
                     $po_project_sub = $this->db->get('project')->result();
                      foreach ($po_project_sub as $poesub) {
                       $poi_disamt_sub = $poesub->poi_disamt_sub;
                     }
                    ?>


                    <td class="text-right"><?php echo number_format($poi_disamt+$poi_disamt_sub,2); ?></td>
                    <td></td>
                  </tr>
                  <?php
                        $this->db->select('*');
                        $expense = $this->db->get('m_expense')->result();
                        foreach ($expense as $ex) { ?>

                    <tr style="background: #F0F8FF;">
                    <td><?php echo $ex->expense_name; ?></td>
                     <?php foreach ($qqqi as $qqi) { ?>
                      <?php
                      $this->db->select('*,SUM(amtdr) as apoi_amounti');
                      $this->db->where('ap_gl.projectid',$pjid);
                      $this->db->where('ap_gl.compcode', $compcode);
                      $this->db->where('ap_gl.systemcode',$qqi->projectd_job);
                      $this->db->where('ap_gl.doctype','apo');
                      $this->db->where('ap_gl.acct_no >=',$start_accost);
                      $this->db->where('ap_gl.acct_no <=',$end_accost);
                      $this->db->join('ap_pettycash_expense','ap_pettycash_expense.ex_ref = ap_gl.vchno');
                      $this->db->join('ap_expensother','ap_expensother.expens_code = ap_pettycash_expense.ex_expenscode');
                      $this->db->where('ap_expensother.type',$ex->expense_code);
                      $apo= $this->db->get('ap_gl')->result();
                      $apoi_amounti = 0;
                      foreach ($apo as $apvo) {
                       $apoi_amounti = $apvo->apoi_amounti;
                      }

                      ?>


                      <?php
                      $this->db->select('*,SUM(amtdr) as apoi_amountis');
                      $this->db->where('project.project_sub',$pjid);
                      $this->db->where('ap_gl.compcode', $compcode);
                      $this->db->where('ap_gl.systemcode',$qqi->projectd_job);
                      $this->db->where('ap_gl.doctype','apo');
                      $this->db->where('ap_gl.acct_no >=',$start_accost);
                      $this->db->where('ap_gl.acct_no <=',$end_accost);
                      $this->db->join('ap_gl','ap_gl.projectid=project.project_id');
                      $this->db->join('ap_pettycash_expense','ap_pettycash_expense.ex_ref = ap_gl.vchno');
                      $this->db->join('ap_expensother','ap_expensother.expens_code = ap_pettycash_expense.ex_expenscode');
                      $this->db->where('ap_expensother.type',$ex->expense_code);
                      $apo= $this->db->get('project')->result();
                      $apoi_amountis = 0;
                      foreach ($apo as $apvo) {
                       $apoi_amountis = $apvo->apoi_amountis;
                      }

                      ?>
                    <td class="text-right"><?php echo number_format($apoi_amounti+$apoi_amountis,2); ?></td>
                    <?php } ?>

                                          <?php
                      $this->db->select('*,SUM(amtdr) as sapoi_amounti');
                      $this->db->where('ap_gl.projectid',$pjid);
                      $this->db->where('ap_gl.compcode', $compcode);
                      $this->db->where('ap_gl.doctype','apo');
                      $this->db->where('ap_gl.acct_no >=',$start_accost);
                      $this->db->where('ap_gl.acct_no <=',$end_accost);
                      $this->db->join('ap_pettycash_expense','ap_pettycash_expense.ex_ref = ap_gl.vchno');
                      $this->db->join('ap_expensother','ap_expensother.expens_code = ap_pettycash_expense.ex_expenscode');
                      $this->db->where('ap_expensother.type',$ex->expense_code);
                      $apo= $this->db->get('ap_gl')->result();
                      $sapoi_amounti = 0;
                      foreach ($apo as $apvo) {
                       $sapoi_amounti = $apvo->sapoi_amounti;
                      }

                      ?>


                      <?php
                      $this->db->select('*,SUM(amtdr) as sapoi_amountis');
                      $this->db->where('project.project_sub',$pjid);
                      $this->db->where('ap_gl.compcode', $compcode);
                      $this->db->where('ap_gl.doctype','apo');
                      $this->db->where('ap_gl.acct_no >=',$start_accost);
                      $this->db->where('ap_gl.acct_no <=',$end_accost);
                      $this->db->join('ap_gl','ap_gl.projectid=project.project_id');
                      $this->db->join('ap_pettycash_expense','ap_pettycash_expense.ex_ref = ap_gl.vchno');
                      $this->db->join('ap_expensother','ap_expensother.expens_code = ap_pettycash_expense.ex_expenscode');
                      $this->db->where('ap_expensother.type',$ex->expense_code);
                      $apo= $this->db->get('project')->result();
                      $sapoi_amountis = 0;
                      foreach ($apo as $apvo) {
                       $sapoi_amountis = $apvo->sapoi_amountis;
                      }

                      ?>
                    <td class="text-right"><?php echo number_format($sapoi_amounti+$sapoi_amountis,2); ?></td>
                    <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>
                     <?php
                     $this->db->select('*,SUM(pettycashi_amounttot) as pettycashi_amounttot');
                     $this->db->join('pettycash_item','pettycash_item.pettycashi_ref=pettycash.docno'); 
                     $this->db->where('pettycash.project',$pjid);
                     $this->db->where('pettycash.compcode', $compcode);
                     $pc_project = $this->db->get('pettycash')->result();
                     foreach ($pc_project as $pce) {
                       $pettycashi_amounttot = $pce->pettycashi_amounttot;
                     }

                     $this->db->select('*,SUM(pettycashi_amounttot) as pettycashi_amounttot_sub');
                     $this->db->join('pettycash','pettycash.project=project.project_id');
                     $this->db->join('pettycash_item','pettycash_item.pettycashi_ref=pettycash.docno'); 
                     $this->db->where('project.project_sub',$pjid);
                     $this->db->where('pettycash.compcode', $compcode);
                     $pc_project_sub = $this->db->get('project')->result();
                      foreach ($pc_project_sub as $pcesub) {
                       $pettycashi_amounttot_sub = $pcesub->pettycashi_amounttot_sub;
                     }
                    ?>
                    <td class="text-right"><?php if($ex->expense_name=="Bank Free"){  echo number_format($pettycashi_amounttot+$pettycashi_amounttot_sub,2); } ?></td>
                    <td></td>
                    </tr>
                    <?php } ?>


                    <tr>
                    <td>Subcontractor</td>
                     <?php foreach ($qqqi as $qqi) { ?>
                      <?php
                      $this->db->select('*,SUM(amtdr) as apsi_amounti');
                      $this->db->where('aps_header.aps_project',$pjid);
                      $this->db->where('aps_header.compcode', $compcode);
                      $this->db->where('ap_gl.systemcode',$qqi->projectd_job);
                      $this->db->where('ap_gl.doctype','aps');
                      $this->db->where('ap_gl.acct_no >=',$start_accost);
                      $this->db->where('ap_gl.acct_no <=',$end_accost);
                      $this->db->join('ap_gl','aps_header.aps_code = ap_gl.vchno');
                      $aps = $this->db->get('aps_header')->result();
                      $apsi_amounti = 0;
                      foreach ($aps as $apsi) {
                       $apsi_amounti = $apsi->apsi_amounti;
                      }

                    $this->db->select('*,SUM(amtdr) as apsi_amountisub');
                    $this->db->join('aps_header','aps_header.aps_project=project.project_id');
                    $this->db->join('ap_gl','aps_header.aps_code = ap_gl.vchno');
                    $this->db->where('ap_gl.systemcode',$qqi->projectd_job);
                    $this->db->where('project.project_sub',$pjid);
                    $this->db->where('aps_header.compcode', $compcode);
                    $this->db->where('ap_gl.doctype','aps');
                    $this->db->where('ap_gl.acct_no >=',$start_accost);
                    $this->db->where('ap_gl.acct_no <=',$end_accost);
                    $apssub = $this->db->get('project')->result();
                    $apsi_amountisub = 0;
                    foreach ($apssub as $apsis) {
                       $apsi_amountisub = $apsis->apsi_amountisub;
                      }
                      ?>
                    <td class="text-right"><?php echo number_format($apsi_amounti+$apsi_amountisub,2); ?></td>
                    <?php } ?>

                    <?php
                      $this->db->select('*,SUM(amtdr) as apsi_amountit');
                      $this->db->where('aps_header.aps_project',$pjid);
                      $this->db->where('aps_header.compcode', $compcode);
                      $this->db->where('ap_gl.doctype','aps');
                      $this->db->where('ap_gl.acct_no >=',$start_accost);
                      $this->db->where('ap_gl.acct_no <=',$end_accost);
                      $this->db->join('ap_gl','aps_header.aps_code = ap_gl.vchno');
                      $aps = $this->db->get('aps_header')->result();
                      $apsi_amountit = 0;
                      foreach ($aps as $apsi) {
                       $apsi_amountit = $apsi->apsi_amountit;
                      }

                    $this->db->select('*,SUM(amtdr) as apsi_amountisubt');
                    $this->db->join('aps_header','aps_header.aps_project=project.project_id');
                    $this->db->join('ap_gl','aps_header.aps_code = ap_gl.vchno');
                    $this->db->where('project.project_sub',$pjid);
                    $this->db->where('aps_header.compcode', $compcode);
                    $this->db->where('ap_gl.doctype','aps');
                    $this->db->where('ap_gl.acct_no >=',$start_accost);
                    $this->db->where('ap_gl.acct_no <=',$end_accost);
                    $apssub = $this->db->get('project')->result();
                    $apsi_amountisubt = 0;
                    foreach ($apssub as $apsis) {
                       $apsi_amountisubt = $apsis->apsi_amountisubt;
                      }
                      ?>
                    <td class="text-right"><?php echo number_format($apsi_amountit+$apsi_amountisubt,2); ?></td>
                    <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>
                    <?php
                     $this->db->select('*,SUM(total_disc) as total_disc');
                     $this->db->join('lo_detail','lo_detail.lo_ref=lo.lo_lono'); 
                     $this->db->where('lo.projectcode',$pjid);
                     $this->db->where('lo.compcode', $compcode);
                     $lo_project = $this->db->get('lo')->result();
                     foreach ($lo_project as $loe) {
                       $total_disc = $loe->total_disc;
                     }

                     $this->db->select('*,SUM(total_disc) as total_disc_sub');
                     $this->db->join('lo','lo.projectcode=project.project_id');
                     $this->db->join('lo_detail','lo_detail.lo_ref=lo.lo_lono'); 
                     $this->db->where('project.project_sub',$pjid);
                     $this->db->where('lo.compcode', $compcode);
                     $lo_project_sub = $this->db->get('project')->result();
                      foreach ($lo_project_sub as $loesub) {
                       $total_disc_sub = $loesub->total_disc_sub;
                     }
                    ?>
                    <td class="text-right"><?php echo number_format($total_disc+$total_disc_sub,2); ?></td>
                    <td></td>
                    </tr>

                    <tr>
                    <td>Salary and Other Expense</td>
                     <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>
                    <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>

                    <td></td>
                    <td></td>
                    </tr>

                    <tr>
                    <td>RV</td>
                     <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>
                    <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>

                    <td></td>
                    <td></td>
                    </tr>

                    <tr>
                    <td>Interests</td>
                     <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>
                    <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>

                    <td></td>
                    <td></td>
                    </tr>

                    <tr>
                    <td>Advance</td>
                     <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>
                    <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>

                    <td></td>
                    <td></td>
                    </tr>


                    <tr style="background: #F5F5F5;">
                    <td><b>Total Cost Amount</b></td>
                     <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>
                    <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>

                    <td></td>
                    <td></td>
                    </tr>



                    <tr style="background: #F5F5F5; border-style: groove;">
                    <td><b>Profit and Loss</b></td>
                     <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>
                    <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>

                    <td></td>
                    <td></td>
                    </tr>



                    <tr>
                    <td>Asset</td>
                     <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>
                    <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>

                    <td></td>
                    <td></td>
                    </tr>



                    <tr>
                    <td>Vendor Balance (Inc. VAT)</td>
                     <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>
                    <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>

                    <td></td>
                    <td></td>
                    </tr>

                    <tr>
                    <td><b>Retention Remain</b></td>
                     <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>
                    <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>

                    <td></td>
                    <td></td>
                    </tr>

                    <tr>
                    <td>P/N Receipt</td>
                     <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>
                    <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>

                    <td></td>
                    <td></td>
                    </tr>

                    <tr>
                    <td>P/N Payable</td>
                     <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>
                    <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>

                    <td></td>
                    <td></td>
                    </tr>

                    <tr>
                    <td>Loan Remain</td>
                     <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>
                    <?php foreach ($qqqi as $qqi) { ?>
                    <td></td>
                    <?php } ?>
                    <td></td>

                    <td></td>
                    <td></td>
                    </tr>
                

                 
                </tbody>
              </table>
                <div id="arinvprogress" class="modal fade" style="display: none;">
            <div class="modal-dialog modal-full">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h6 class="modal-title">ใบแจ้งหนี้ค่างวดงาน  (Invoice Progress) </h6>
                </div>

                <div class="modal-body">
                  <h2><?php echo $project_name; ?> (Contract)</h2>
                  <div class="table-responsive" >
                    <table class="table table-bordered datatable-basic">
                      <thead>
                       <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Type</th>
                          <th class="text-center" style="width: 150px;">Invoice Date</th>
                          <th class="text-center">Invoice No</th>
                          <th class="text-center">AR No.</th>
                          <th class="text-center">System Type</th>
                          <th class="text-center">Progress Amount</th>
                          <th class="text-center">Less Advance</th>
                          <th class="text-center">VAT</th>
                          <th class="text-center">Less Retention</th>
                          <th class="text-center">Less W/T</th>
                          <th class="text-center">Net Amount</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <?php 
                        $this->db->select('*');
                        $this->db->where('ar_invprogress_header.inv_type',"progress");
                        $this->db->where('ar_invprogress_header.inv_project',$pjid);
                        $this->db->where('ar_invprogress_header.compcode', $compcode);
                        $this->db->where('ar_invprogress_header.inv_type',"progress");
                        $this->db->join('ar_invprogress_detail','ar_invprogress_header.inv_no = ar_invprogress_detail.inv_ref');
                        $modalar = $this->db->get('ar_invprogress_header')->result();
                        $inv_progressamt = 0;
                        $inv_lessadvance = 0;
                        $inv_vatamt = 0;
                        $inv_lessretention = 0;
                        $inv_lesswt = 0;
                        $inv_netamt = 0;
                        $job = "";
                      ?>
                      <?php $n=1; foreach ($modalar as $mar) { 
                        $inv_progressamt = $inv_progressamt+$mar->inv_progressamt;
                        $inv_lessadvance = $inv_lessadvance+$mar->inv_lessadvance;
                        $inv_vatamt = $inv_vatamt+$mar->inv_vatamt;
                        $inv_lessretention = $inv_lessretention+$mar->inv_lessretention;
                        $inv_lesswt = $inv_lesswt+$mar->inv_lesswt;
                        $inv_netamt = $inv_netamt+$mar->inv_netamt;
                        $job = $qqi->projectd_job;
                      ?>
                      <tr style="background: #F5F5F5;">
                        <td class="text-center"><?php echo $n; ?></td>

                        <td class="text-center"><?php echo $mar->inv_type; ?></td>
                        <td class="text-center"><?php echo DateThai($mar->inv_date); ?></td>
                        <td><?php echo $mar->inv_ref; ?> <a style="color:red;">(Contract : <?php 
                        $this->db->select('*');
                        $this->db->where('project_id',$mar->inv_project);
                        $pji = $this->db->get('project')->result();
                        foreach ($pji as $kp) {
                         echo $kp->project_name;
                        }
                        ?>)</a></td>
                        <td><?php echo $mar->inv_receipt; ?></td>
                        <td class="text-center"><?php
                        $this->db->select('*');
                        $this->db->from('system');
                        $this->db->where('compcode', $compcode);
                        $this->db->where('systemcode',$mar->inv_system);
                        $tender_d=$this->db->get()->result(); ?>
                        <?php  foreach ($tender_d as $tender_dd) { ?>
                        <?php echo $tender_dd->systemname; ?>
                        <?php } ?></td>
                        <td class="text-right"><?php echo number_format($mar->inv_progressamt,2); ?></td>
                        <td class="text-right"><?php echo number_format($mar->inv_lessadvance,2); ?></td>
                        <td class="text-right"><?php echo number_format($mar->inv_vatamt,2); ?></td>
                        <td class="text-right"><?php echo number_format($mar->inv_lessretention,2); ?></td>
                        <td class="text-right"><?php echo number_format($mar->inv_lesswt,2); ?></td>
                        <td class="text-right"><?php echo number_format($mar->inv_netamt,2); ?></td>
                        <td class="text-center"><a class="preload" target="_blank" href="<?php echo base_url(); ?>ar/ar_edit_invprogress/<?php echo $mar->inv_ref; ?>/<?php echo $mar->inv_period; ?>" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></td>
                        
                      </tr>
                      <?php $n++; } ?>

                        <?php 
                        $this->db->select('*');
                        $this->db->join('ar_invprogress_header','ar_invprogress_header.inv_project=project.project_id');
                        $this->db->join('ar_invprogress_detail','ar_invprogress_detail.inv_ref=ar_invprogress_header.inv_no');
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_invprogress_header.compcode', $compcode);
                        $this->db->where('ar_invprogress_header.inv_type',"progress");
                        $arpjs = $this->db->get('project')->result();
                        $inv_progressamts = 0;
                        $inv_lessadvances = 0;
                        $inv_vatamts = 0;
                        $inv_lessretentions = 0;
                        $inv_lesswts = 0;
                        $inv_netamts = 0;
                        foreach ($arpjs as $ars) {  
                        $inv_progressamts = $inv_progressamts+$ars->inv_progressamt;
                        $inv_lessadvances = $inv_lessadvances+$ars->inv_lessadvance;
                        $inv_vatamts = $inv_vatamts+$ars->inv_vatamt;
                        $inv_lessretentions = $inv_lessretentions+$ars->inv_lessretention;
                        $inv_lesswts = $inv_lesswts+$ars->inv_lesswt;
                        $inv_netamts = $inv_netamts+$ars->inv_netamt;
                          ?>
                          <tr style="background: #F5F5F5;">
                        <td class="text-center"><?php echo $n; ?></td>
                        <td class="text-center"><?php echo $ars->inv_type; ?></td>
                        <td class="text-center"><?php echo DateThai($ars->inv_date); ?></td>
                        <td><?php echo $ars->inv_ref; ?> <a style="color:red;">(Variations Order (VO) : <?php 
                        $this->db->select('*');
                        $this->db->where('project_id',$ars->inv_project);
                        $pji = $this->db->get('project')->result();
                        foreach ($pji as $kp) {
                         echo $kp->project_name;
                        }
                        ?>)</a></td>
                        <td><?php echo $ars->inv_receipt; ?></td>
                        <td class="text-center"><?php
                        $this->db->select('*');
                        $this->db->from('system');
                        $this->db->where('compcode', $compcode);
                        $this->db->where('systemcode',$ars->inv_system);
                        $tender_d=$this->db->get()->result(); ?>
                        <?php  foreach ($tender_d as $tender_dd) { ?>
                        <?php echo $tender_dd->systemname; ?>
                        <?php } ?></td>
                        <td class="text-right"><?php echo number_format($ars->inv_progressamt,2); ?></td>
                        <td class="text-right"><?php echo number_format($ars->inv_lessadvance,2); ?></td>
                        <td class="text-right"><?php echo number_format($ars->inv_vatamt,2); ?></td>
                        <td class="text-right"><?php echo number_format($ars->inv_lessretention,2); ?></td>
                        <td class="text-right"><?php echo number_format($ars->inv_lesswt,2); ?></td>
                        <td class="text-right"><?php echo number_format($ars->inv_netamt,2); ?></td>
                        <td class="text-center"><a class="preload" target="_blank" href="<?php echo base_url(); ?>ar/ar_edit_invprogress/<?php echo $ars->inv_ref; ?>/<?php echo $ars->inv_period; ?>" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></td>
                        
                      </tr>
                        <?php  $n++; } ?>
                       
                      <tr>
                        <td colspan="6" class="text-center">Grand Total</td>
                        <td class="text-right"><?php echo number_format($inv_progressamt+$inv_progressamts,2); ?></td>
                        <td class="text-right"><?php echo number_format($inv_lessadvance+$inv_lessadvances,2); ?></td>
                        <td class="text-right"><?php echo number_format($inv_vatamt+$inv_vatamts,2); ?></td>
                        <td class="text-right"><?php echo number_format($inv_lessretention+$inv_lessretentions,2); ?></td>
                        <td class="text-right"><?php echo number_format($inv_lesswt+$inv_lesswts,2); ?></td>
                        <td class="text-right"><?php echo number_format($inv_netamt+$inv_netamts,2); ?></td>
                        <td></td>

                      </tr>

                      <tr>
                        <td colspan="6" class="text-center">Total (Progress)</td>
                      </tr>

                      <tr>
                        <td colspan="6" class="text-center">Total (Trading)</td>
                      </tr>

                      <tr>
                        <td colspan="6" class="text-center">Total (Other)</td>
                      </tr>

                       
                    </table>
                  </div>
                </div>

                <div class="modal-footer">
                  
                </div>
              </div>
            </div>
          </div>      
                                 <?php foreach ($qqqi as $qqi) { ?>
        <div id="arinvprogress<?php echo $qqi->projectd_job; ?>" class="modal fade" style="display: none;">
            <div class="modal-dialog modal-full">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h6 class="modal-title">ใบแจ้งหนี้ค่างวดงาน  (Invoice Progress) ระบบ <?php
                    $this->db->select('*');
                    $this->db->from('system');
                    $this->db->where('compcode', $compcode);
                    $this->db->where('systemcode',$qqi->projectd_job);
                    $tender_d=$this->db->get()->result(); ?>
                    <?php  foreach ($tender_d as $tender_dd) { ?>
                    <?php echo $tender_dd->systemname; ?>
                    <?php } ?></h6>
                </div>

                <div class="modal-body">
                  <h2><?php echo $project_name; ?> (Contract)</h2>
                  <div class="table-responsive" >
                    <table class="table table-bordered datatable-basic">
                      <thead>
                       <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Type</th>
                          <th class="text-center" style="width: 150px;">Invoice Date</th>
                          <th class="text-center">Invoice No</th>
                          <th class="text-center">AR No.</th>
                          <th class="text-center">System Type</th>
                          <th class="text-center">Progress Amount</th>
                          <th class="text-center">Less Advance</th>
                          <th class="text-center">VAT</th>
                          <th class="text-center">Less Retention</th>
                          <th class="text-center">Less W/T</th>
                          <th class="text-center">Net Amount</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <?php 
                        $this->db->select('*');
                        $this->db->where('ar_invprogress_header.inv_type',"progress");
                        $this->db->where('ar_invprogress_header.inv_project',$pjid);
                        $this->db->where('ar_invprogress_detail.inv_system',$qqi->projectd_job);
                        $this->db->where('ar_invprogress_header.compcode', $compcode);
                        $this->db->where('ar_invprogress_header.inv_type',"progress");
                        $this->db->join('ar_invprogress_detail','ar_invprogress_header.inv_no = ar_invprogress_detail.inv_ref');
                        $modalar = $this->db->get('ar_invprogress_header')->result();
                        $inv_progressamt = 0;
                        $inv_lessadvance = 0;
                        $inv_vatamt = 0;
                        $inv_lessretention = 0;
                        $inv_lesswt = 0;
                        $inv_netamt = 0;
                        $job = "";
                      ?>
                      <?php $n=1; foreach ($modalar as $mar) { 
                        $inv_progressamt = $inv_progressamt+$mar->inv_progressamt;
                        $inv_lessadvance = $inv_lessadvance+$mar->inv_lessadvance;
                        $inv_vatamt = $inv_vatamt+$mar->inv_vatamt;
                        $inv_lessretention = $inv_lessretention+$mar->inv_lessretention;
                        $inv_lesswt = $inv_lesswt+$mar->inv_lesswt;
                        $inv_netamt = $inv_netamt+$mar->inv_netamt;
                        $job = $qqi->projectd_job;
                      ?>
                      <tr style="background: #F5F5F5;">
                        <td class="text-center"><?php echo $n; ?></td>

                        <td class="text-center"><?php echo $mar->inv_type; ?></td>
                        <td class="text-center"><?php echo DateThai($mar->inv_date); ?></td>
                        <td><?php echo $mar->inv_ref; ?> <a style="color:red;">(Contract : <?php 
                        $this->db->select('*');
                        $this->db->where('project_id',$mar->inv_project);
                        $pji = $this->db->get('project')->result();
                        foreach ($pji as $kp) {
                         echo $kp->project_name;
                        }
                        ?>)</a></td>
                        <td><?php echo $mar->inv_receipt; ?></td>
                        <td class="text-center"><?php
                        $this->db->select('*');
                        $this->db->from('system');
                        $this->db->where('compcode', $compcode);
                        $this->db->where('systemcode',$mar->inv_system);
                        $tender_d=$this->db->get()->result(); ?>
                        <?php  foreach ($tender_d as $tender_dd) { ?>
                        <?php echo $tender_dd->systemname; ?>
                        <?php } ?></td>
                        <td class="text-right"><?php echo number_format($mar->inv_progressamt,2); ?></td>
                        <td class="text-right"><?php echo number_format($mar->inv_lessadvance,2); ?></td>
                        <td class="text-right"><?php echo number_format($mar->inv_vatamt,2); ?></td>
                        <td class="text-right"><?php echo number_format($mar->inv_lessretention,2); ?></td>
                        <td class="text-right"><?php echo number_format($mar->inv_lesswt,2); ?></td>
                        <td class="text-right"><?php echo number_format($mar->inv_netamt,2); ?></td>
                        <td class="text-center"><a class="preload" target="_blank" href="<?php echo base_url(); ?>ar/ar_edit_invprogress/<?php echo $mar->inv_ref; ?>/<?php echo $mar->inv_period; ?>" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></td>
                        
                      </tr>
                      <?php $n++; } ?>

                        <?php 
                        $this->db->select('*');
                        $this->db->join('ar_invprogress_header','ar_invprogress_header.inv_project=project.project_id');
                        $this->db->join('ar_invprogress_detail','ar_invprogress_detail.inv_ref=ar_invprogress_header.inv_no');
                        $this->db->where('ar_invprogress_detail.inv_system',$job);
                        $this->db->where('project.project_sub',$pjid);
                        $this->db->where('ar_invprogress_header.compcode', $compcode);
                        $this->db->where('ar_invprogress_header.inv_type',"progress");
                        $arpjs = $this->db->get('project')->result();
                        $inv_progressamts = 0;
                        $inv_lessadvances = 0;
                        $inv_vatamts = 0;
                        $inv_lessretentions = 0;
                        $inv_lesswts = 0;
                        $inv_netamts = 0;
                        foreach ($arpjs as $ars) {  
                        $inv_progressamts = $inv_progressamts+$ars->inv_progressamt;
                        $inv_lessadvances = $inv_lessadvances+$ars->inv_lessadvance;
                        $inv_vatamts = $inv_vatamts+$ars->inv_vatamt;
                        $inv_lessretentions = $inv_lessretentions+$ars->inv_lessretention;
                        $inv_lesswts = $inv_lesswts+$ars->inv_lesswt;
                        $inv_netamts = $inv_netamts+$ars->inv_netamt;
                          ?>
                          <tr style="background: #F5F5F5;">
                        <td class="text-center"><?php echo $n; ?></td>
                        <td class="text-center"><?php echo $ars->inv_type; ?></td>
                        <td class="text-center"><?php echo DateThai($ars->inv_date); ?></td>
                        <td><?php echo $ars->inv_ref; ?> <a style="color:red;">(Variations Order (VO) : <?php 
                        $this->db->select('*');
                        $this->db->where('project_id',$ars->inv_project);
                        $pji = $this->db->get('project')->result();
                        foreach ($pji as $kp) {
                         echo $kp->project_name;
                        }
                        ?>)</a></td>
                        <td><?php echo $ars->inv_receipt; ?></td>
                        <td class="text-center"><?php
                        $this->db->select('*');
                        $this->db->from('system');
                        $this->db->where('compcode', $compcode);
                        $this->db->where('systemcode',$ars->inv_system);
                        $tender_d=$this->db->get()->result(); ?>
                        <?php  foreach ($tender_d as $tender_dd) { ?>
                        <?php echo $tender_dd->systemname; ?>
                        <?php } ?></td>
                        <td class="text-right"><?php echo number_format($ars->inv_progressamt,2); ?></td>
                        <td class="text-right"><?php echo number_format($ars->inv_lessadvance,2); ?></td>
                        <td class="text-right"><?php echo number_format($ars->inv_vatamt,2); ?></td>
                        <td class="text-right"><?php echo number_format($ars->inv_lessretention,2); ?></td>
                        <td class="text-right"><?php echo number_format($ars->inv_lesswt,2); ?></td>
                        <td class="text-right"><?php echo number_format($ars->inv_netamt,2); ?></td>
                        <td class="text-center"><a class="preload" target="_blank" href="<?php echo base_url(); ?>ar/ar_edit_invprogress/<?php echo $ars->inv_ref; ?>/<?php echo $ars->inv_period; ?>" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></td>
                        
                      </tr>
                        <?php  $n++; } ?>
                       
                      <tr>
                        <td colspan="6" class="text-center">Grand Total</td>
                        <td class="text-right"><?php echo number_format($inv_progressamt+$inv_progressamts,2); ?></td>
                        <td class="text-right"><?php echo number_format($inv_lessadvance+$inv_lessadvances,2); ?></td>
                        <td class="text-right"><?php echo number_format($inv_vatamt+$inv_vatamts,2); ?></td>
                        <td class="text-right"><?php echo number_format($inv_lessretention+$inv_lessretentions,2); ?></td>
                        <td class="text-right"><?php echo number_format($inv_lesswt+$inv_lesswts,2); ?></td>
                        <td class="text-right"><?php echo number_format($inv_netamt+$inv_netamts,2); ?></td>
                        <td></td>

                      </tr>

                      <tr>
                        <td colspan="6" class="text-center">Total (Progress)</td>
                      </tr>

                      <tr>
                        <td colspan="6" class="text-center">Total (Trading)</td>
                      </tr>

                      <tr>
                        <td colspan="6" class="text-center">Total (Other)</td>
                      </tr>

                       
                    </table>
                  </div>
                </div>

                <div class="modal-footer">
                  
                </div>
              </div>
            </div>
          </div>

          

          <div id="receivingprogress<?php echo $qqi->projectd_job; ?>" class="modal fade" style="display: none;">
            <div class="modal-dialog modal-full">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h5 class="modal-title">บันทึกรับเงินตามใบเสร็จ (AR Receiving) ระบบ <?php
                    $this->db->select('*');
                    $this->db->from('system');
                    $this->db->where('compcode', $compcode);
                    $this->db->where('systemcode',$qqi->projectd_job);
                    $tender_d=$this->db->get()->result(); ?>
                    <?php  foreach ($tender_d as $tender_dd) { ?>
                    <?php echo $tender_dd->systemname; ?>
                    <?php } ?></h5>
                </div>

                <div class="modal-body">
                 

                  <table class="table table-hover table-bordered table-striped table-xxs">
      <thead>
        <tr>
          <th class="text-center">#</th>
          <th class="text-center">invoice No</th>
          <th class="text-center">invoice Type</th>
          <th class="text-center">Period</th>
          <th class="text-center">System Type</th>
          <th class="text-center">Amount</th>
          <th class="text-center">Advance %</th>
          <th class="text-center">Advance</th>
          <th class="text-center">W/T %</th>
          <th class="text-center">W/T</th>
          <th class="text-center">Retention %</th>
          <th class="text-center">Retention</th>
          <th class="text-center">Vat  %</th>
          <th class="text-center">Vat</th>
          <th class="text-center">Net Amount</th>
        </tr>
      </thead>
        <tbody>

              <?php 
                      $this->db->select('*');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->where('ar_receiving_header.vou_type',"progress");
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $receiving = $this->db->get('ar_receiving_header')->result();
                  ?>
          <?php $a=1; 
                $vou_downamt = 0;
                $vou_vatper = 0;
                $vou_vatamt = 0;
                $vou_adv = 0;
                $vou_advamt = 0;
                $vou_ret = 0;
                $vou_retamt = 0;
                $vou_wtper = 0;
                $vou_lesswt = 0;
                $vou_netamt = 0;
          foreach ($receiving as $re) {  
                $vou_downamt = $vou_downamt + $re->vou_downamt;
                $vou_vatper = $vou_vatper + $re->vou_vatper;
                $vou_vatamt = $vou_vatamt + $re->vou_vatamt;
                $vou_adv = $vou_adv + $re->vou_adv;
                $vou_advamt = $vou_advamt + $re->vou_advamt;
                $vou_ret = $vou_ret + $re->vou_ret;
                $vou_retamt = $vou_retamt + $re->vou_retamt;
                $vou_wtper = $vou_wtper + $re->vou_wtper;
                $vou_lesswt = $vou_lesswt + $re->vou_lesswt;
                $vou_netamt = $vou_netamt + $re->vou_netamt;
                $jobb = $re->vou_system;
            ?>
        <tr>
          <td class="text-center"><?php echo $a; ?></td>
          <td class="text-center"><?php echo $re->vou_ref; ?>  
            <a style="color:red;"> (Contract : <?php 
                        $this->db->select('*');
                        $this->db->where('project_id',$re->vou_project);
                        $pji = $this->db->get('project')->result();
                        foreach ($pji as $kp) {
                         echo $kp->project_name;
                        }
                        ?>)</a></td>
          <td class="text-center"><?php echo $re->vou_type; ?></td>
          <td class="text-center"><?php echo $re->vou_period; ?></td>
          <td class="text-center"><?php
                        $this->db->select('*');
                        $this->db->from('system');
                        $this->db->where('compcode', $compcode);
                        $this->db->where('systemcode',$re->vou_system);
                        $tender_d=$this->db->get()->result(); ?>
                        <?php  foreach ($tender_d as $tender_dd) { ?>
                        <?php echo $tender_dd->systemname; ?>
                        <?php } ?></td>

          <td class="text-right"><?php echo $re->vou_downamt; ?></td>
          <td class="text-right"><?php echo $re->vou_vatper; ?></td>
          <td class="text-right"><?php echo $re->vou_vatamt; ?></td>
          <td class="text-right"><?php echo $re->vou_adv; ?></td>
          <td class="text-right"><?php echo $re->vou_advamt; ?></td>
          <td class="text-right"><?php echo $re->vou_ret; ?></td>
          <td class="text-right"><?php echo $re->vou_retamt; ?></td>
          <td class="text-right"><?php echo $re->vou_wtper; ?></td>
          <td class="text-right"><?php echo $re->vou_lesswt; ?></td>
          <td class="text-right"><?php echo $re->vou_netamt; ?></td>
        </tr>
          <?php $a++; } ?>

         <?php  

              $this->db->select('*');
              $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
              $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');
              $this->db->where('ar_receiving_detail.vou_system', $jobb);
              $this->db->where('project.project_sub',$pjid);
              $this->db->where('ar_receiving_header.compcode', $compcode);
              $this->db->where('ar_receiving_header.vou_type',"progress");
              $receivings = $this->db->get('project')->result();

                $vou_downamts = 0;
                $vou_vatpers = 0;
                $vou_vatamts = 0;
                $vou_advs = 0;
                $vou_advamts = 0;
                $vou_rets = 0;
                $vou_retamts = 0;
                $vou_wtpers = 0;
                $vou_lesswts = 0;
                $vou_netamts = 0;
               
         foreach ($receivings as $res) { 

                $vou_downamts = $vou_downamts + $res->vou_downamt;
                $vou_vatpers = $vou_vatpers + $res->vou_vatper;
                $vou_vatamts = $vou_vatamts + $res->vou_vatamt;
                $vou_advs = $vou_advs + $res->vou_adv;
                $vou_advamts = $vou_advamts + $res->vou_advamt;
                $vou_rets = $vou_rets + $res->vou_ret;
                $vou_retamts = $vou_retamts + $res->vou_retamt;
                $vou_wtpers = $vou_wtpers + $res->vou_wtper;
                $vou_lesswts = $vou_lesswts + $res->vou_lesswt;
                $vou_netamts = $vou_netamts + $res->vou_netamt;
                

          ?>
        <tr>
                    <td class="text-center"><?php echo $a; ?></td>
          <td class="text-center"><?php echo $res->vou_ref; ?>  
            <a style="color:red;"> (Contract : <?php 
                        $this->db->select('*');
                        $this->db->where('project_id',$res->vou_project);
                        $pji = $this->db->get('project')->result();
                        foreach ($pji as $kp) {
                         echo $kp->project_name;
                        }
                        ?>)</a></td>
          <td class="text-center"><?php echo $res->vou_type; ?></td>
          <td class="text-center"><?php echo $res->vou_period; ?></td>
          <td class="text-center"><?php
                        $this->db->select('*');
                        $this->db->from('system');
                        $this->db->where('compcode', $compcode);
                        $this->db->where('systemcode',$re->vou_system);
                        $tender_d=$this->db->get()->result(); ?>
                        <?php  foreach ($tender_d as $tender_dd) { ?>
                        <?php echo $tender_dd->systemname; ?>
                        <?php } ?></td>
          <td class="text-right"><?php echo $res->vou_downamt; ?></td>
          <td class="text-right"><?php echo $res->vou_vatper; ?></td>
          <td class="text-right"><?php echo $res->vou_vatamt; ?></td>
          <td class="text-right"><?php echo $res->vou_adv; ?></td>
          <td class="text-right"><?php echo $res->vou_advamt; ?></td>
          <td class="text-right"><?php echo $res->vou_ret; ?></td>
          <td class="text-right"><?php echo $res->vou_retamt; ?></td>
          <td class="text-right"><?php echo $res->vou_wtper; ?></td>
          <td class="text-right"><?php echo $res->vou_lesswt; ?></td>
          <td class="text-right"><?php echo $res->vou_netamt; ?></td>
        </tr>
          <?php $a++; } ?>
        <tr>
          <td class="text-center" colspan="5">Summary</td>
          <td class="text-right"><?php echo number_format($vou_downamt+$vou_downamts,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_vatper+$vou_vatpers,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_vatamt+$vou_vatamts,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_adv+$vou_advs,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_advamt+$vou_advamts,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_ret+$vou_rets,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_retamt+$vou_retamts,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_wtper+$vou_wtpers,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_lesswt+$vou_lesswts,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_netamt+$vou_netamts,2); ?></td>
        </tr> 
        </tbody>
    </table>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

          <div id="receivingdown<?php echo $qqi->projectd_job; ?>" class="modal fade" style="display: none;">
            <div class="modal-dialog modal-full">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h5 class="modal-title">บันทึกรับเงินตามใบเสร็จ (AR Receiving) ระบบ <?php
                    $this->db->select('*');
                    $this->db->from('system');
                    $this->db->where('compcode', $compcode);
                    $this->db->where('systemcode',$qqi->projectd_job);
                    $tender_d=$this->db->get()->result(); ?>
                    <?php  foreach ($tender_d as $tender_dd) { ?>
                    <?php echo $tender_dd->systemname; ?>
                    <?php } ?></h5>
                </div>

                <div class="modal-body">
                                 <?php 
                      $this->db->select('*');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->where('ar_receiving_header.vou_type',"down");
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $receiving = $this->db->get('ar_receiving_header')->result();
                      
                     

                  ?>

                  <table class="table table-hover table-bordered table-striped table-xxs">
      <thead>
        <tr>
          <th class="text-center">#</th>
          <th class="text-center">invoice No</th>
          <th class="text-center">invoice Type</th>
          <th class="text-center">Period</th>
          <th class="text-center">System Type</th>
          <th class="text-center">Amount</th>
          <th class="text-center">Advance %</th>
          <th class="text-center">Advance</th>
          <th class="text-center">W/T %</th>
          <th class="text-center">W/T</th>
          <th class="text-center">Retention %</th>
          <th class="text-center">Retention</th>
          <th class="text-center">Vat  %</th>
          <th class="text-center">Vat</th>
          <th class="text-center">Net Amount</th>
        </tr>
      </thead>
        <tbody>
          <?php $a=1; 
                $vou_downamt = 0;
                $vou_vatper = 0;
                $vou_vatamt = 0;
                $vou_adv = 0;
                $vou_advamt = 0;
                $vou_ret = 0;
                $vou_retamt = 0;
                $vou_wtper = 0;
                $vou_lesswt = 0;
                $vou_netamt = 0;
          foreach ($receiving as $re) {  
                $vou_downamt = $vou_downamt + $re->vou_downamt;
                $vou_vatper = $vou_vatper + $re->vou_vatper;
                $vou_vatamt = $vou_vatamt + $re->vou_vatamt;
                $vou_adv = $vou_adv + $re->vou_adv;
                $vou_advamt = $vou_advamt + $re->vou_advamt;
                $vou_ret = $vou_ret + $re->vou_ret;
                $vou_retamt = $vou_retamt + $re->vou_retamt;
                $vou_wtper = $vou_wtper + $re->vou_wtper;
                $vou_lesswt = $vou_lesswt + $re->vou_lesswt;
                $vou_netamt = $vou_netamt + $re->vou_netamt;
                $jobb = $re->vou_system;
            ?>
        <tr>
          <td class="text-center"><?php echo $a; ?></td>
          <td class="text-center"><?php echo $re->vou_ref; ?>  
            <a style="color:red;"> (Contract : <?php 
                        $this->db->select('*');
                        $this->db->where('project_id',$re->vou_project);
                        $pji = $this->db->get('project')->result();
                        foreach ($pji as $kp) {
                         echo $kp->project_name;
                        }
                        ?>)</a></td>
          <td class="text-center"><?php echo $re->vou_type; ?></td>
          <td class="text-center"><?php echo $re->vou_period; ?></td>
          <td class="text-center"><?php
                        $this->db->select('*');
                        $this->db->from('system');
                        $this->db->where('compcode', $compcode);
                        $this->db->where('systemcode',$re->vou_system);
                        $tender_d=$this->db->get()->result(); ?>
                        <?php  foreach ($tender_d as $tender_dd) { ?>
                        <?php echo $tender_dd->systemname; ?>
                        <?php } ?></td>

          <td class="text-right"><?php echo $re->vou_downamt; ?></td>
          <td class="text-right"><?php echo $re->vou_vatper; ?></td>
          <td class="text-right"><?php echo $re->vou_vatamt; ?></td>
          <td class="text-right"><?php echo $re->vou_adv; ?></td>
          <td class="text-right"><?php echo $re->vou_advamt; ?></td>
          <td class="text-right"><?php echo $re->vou_ret; ?></td>
          <td class="text-right"><?php echo $re->vou_retamt; ?></td>
          <td class="text-right"><?php echo $re->vou_wtper; ?></td>
          <td class="text-right"><?php echo $re->vou_lesswt; ?></td>
          <td class="text-right"><?php echo $re->vou_netamt; ?></td>
        </tr>
          <?php $a++; } ?>

         <?php  

              $this->db->select('*');
              $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
              $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');
              $this->db->where('ar_receiving_detail.vou_system', $jobb);
              $this->db->where('project.project_sub',$pjid);
              $this->db->where('ar_receiving_header.compcode', $compcode);
              $this->db->where('ar_receiving_header.vou_type',"down");
              $receivings = $this->db->get('project')->result();

                $vou_downamts = 0;
                $vou_vatpers = 0;
                $vou_vatamts = 0;
                $vou_advs = 0;
                $vou_advamts = 0;
                $vou_rets = 0;
                $vou_retamts = 0;
                $vou_wtpers = 0;
                $vou_lesswts = 0;
                $vou_netamts = 0;
               
         foreach ($receivings as $res) { 

                $vou_downamts = $vou_downamts + $res->vou_downamt;
                $vou_vatpers = $vou_vatpers + $res->vou_vatper;
                $vou_vatamts = $vou_vatamts + $res->vou_vatamt;
                $vou_advs = $vou_advs + $res->vou_adv;
                $vou_advamts = $vou_advamts + $res->vou_advamt;
                $vou_rets = $vou_rets + $res->vou_ret;
                $vou_retamts = $vou_retamts + $res->vou_retamt;
                $vou_wtpers = $vou_wtpers + $res->vou_wtper;
                $vou_lesswts = $vou_lesswts + $res->vou_lesswt;
                $vou_netamts = $vou_netamts + $res->vou_netamt;
                

          ?>
        <tr>
                    <td class="text-center"><?php echo $a; ?></td>
          <td class="text-center"><?php echo $res->vou_ref; ?>  
            <a style="color:red;"> (Contract : <?php 
                        $this->db->select('*');
                        $this->db->where('project_id',$res->vou_project);
                        $pji = $this->db->get('project')->result();
                        foreach ($pji as $kp) {
                         echo $kp->project_name;
                        }
                        ?>)</a></td>
          <td class="text-center"><?php echo $res->vou_type; ?></td>
          <td class="text-center"><?php echo $res->vou_period; ?></td>
          <td class="text-center"><?php
                        $this->db->select('*');
                        $this->db->from('system');
                        $this->db->where('compcode', $compcode);
                        $this->db->where('systemcode',$re->vou_system);
                        $tender_d=$this->db->get()->result(); ?>
                        <?php  foreach ($tender_d as $tender_dd) { ?>
                        <?php echo $tender_dd->systemname; ?>
                        <?php } ?></td>
          <td class="text-right"><?php echo $res->vou_downamt; ?></td>
          <td class="text-right"><?php echo $res->vou_vatper; ?></td>
          <td class="text-right"><?php echo $res->vou_vatamt; ?></td>
          <td class="text-right"><?php echo $res->vou_adv; ?></td>
          <td class="text-right"><?php echo $res->vou_advamt; ?></td>
          <td class="text-right"><?php echo $res->vou_ret; ?></td>
          <td class="text-right"><?php echo $res->vou_retamt; ?></td>
          <td class="text-right"><?php echo $res->vou_wtper; ?></td>
          <td class="text-right"><?php echo $res->vou_lesswt; ?></td>
          <td class="text-right"><?php echo $res->vou_netamt; ?></td>
        </tr>
          <?php $a++; } ?>
        <tr>
          <td class="text-center" colspan="5">Summary</td>
          <td class="text-right"><?php echo number_format($vou_downamt+$vou_downamts,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_vatper+$vou_vatpers,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_vatamt+$vou_vatamts,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_adv+$vou_advs,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_advamt+$vou_advamts,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_ret+$vou_rets,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_retamt+$vou_retamts,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_wtper+$vou_wtpers,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_lesswt+$vou_lesswts,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_netamt+$vou_netamts,2); ?></td>
        </tr> 
        </tbody>
    </table>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

          <div id="receivingretention<?php echo $qqi->projectd_job; ?>" class="modal fade" style="display: none;">
            <div class="modal-dialog modal-full">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h5 class="modal-title">บันทึกรับเงินตามใบเสร็จ (AR Receiving) ระบบ <?php
                    $this->db->select('*');
                    $this->db->from('system');
                    $this->db->where('compcode', $compcode);
                    $this->db->where('systemcode',$qqi->projectd_job);
                    $tender_d=$this->db->get()->result(); ?>
                    <?php  foreach ($tender_d as $tender_dd) { ?>
                    <?php echo $tender_dd->systemname; ?>
                    <?php } ?></h5>
                </div>

                <div class="modal-body">
                                 <?php 
                      $this->db->select('*');
                      $this->db->where('ar_receiving_header.vou_project',$pjid);
                      $this->db->where('ar_receiving_detail.vou_system',$qqi->projectd_job);
                      $this->db->where('ar_receiving_header.compcode', $compcode);
                      $this->db->where('ar_receiving_header.vou_type',"retention");
                      $this->db->join('ar_receiving_detail','ar_receiving_header.vou_no = ar_receiving_detail.vou_ref');
                      $receiving = $this->db->get('ar_receiving_header')->result();
                      
                     

                  ?>

  <table class="table table-hover table-bordered table-striped table-xxs">
      <thead>
        <tr>
          <th class="text-center">#</th>
          <th class="text-center">invoice No</th>
          <th class="text-center">invoice Type</th>
          <th class="text-center">Period</th>
          <th class="text-center">System Type</th>
          <th class="text-center">Amount</th>
          <th class="text-center">Advance %</th>
          <th class="text-center">Advance</th>
          <th class="text-center">W/T %</th>
          <th class="text-center">W/T</th>
          <th class="text-center">Retention %</th>
          <th class="text-center">Retention</th>
          <th class="text-center">Vat  %</th>
          <th class="text-center">Vat</th>
          <th class="text-center">Net Amount</th>
        </tr>
      </thead>
        <tbody>
          <?php $a=1; 
                $vou_downamt = 0;
                $vou_vatper = 0;
                $vou_vatamt = 0;
                $vou_adv = 0;
                $vou_advamt = 0;
                $vou_ret = 0;
                $vou_retamt = 0;
                $vou_wtper = 0;
                $vou_lesswt = 0;
                $vou_netamt = 0;
          foreach ($receiving as $re) {  
                $vou_downamt = $vou_downamt + $re->vou_downamt;
                $vou_vatper = $vou_vatper + $re->vou_vatper;
                $vou_vatamt = $vou_vatamt + $re->vou_vatamt;
                $vou_adv = $vou_adv + $re->vou_adv;
                $vou_advamt = $vou_advamt + $re->vou_advamt;
                $vou_ret = $vou_ret + $re->vou_ret;
                $vou_retamt = $vou_retamt + $re->vou_retamt;
                $vou_wtper = $vou_wtper + $re->vou_wtper;
                $vou_lesswt = $vou_lesswt + $re->vou_lesswt;
                $vou_netamt = $vou_netamt + $re->vou_netamt;
                $jobb = $re->vou_system;
            ?>
        <tr>
          <td class="text-center"><?php echo $a; ?></td>
          <td class="text-center"><?php echo $re->vou_ref; ?>  
            <a style="color:red;"> (Contract : <?php 
                        $this->db->select('*');
                        $this->db->where('project_id',$re->vou_project);
                        $pji = $this->db->get('project')->result();
                        foreach ($pji as $kp) {
                         echo $kp->project_name;
                        }
                        ?>)</a></td>
          <td class="text-center"><?php echo $re->vou_type; ?></td>
          <td class="text-center"><?php echo $re->vou_period; ?></td>
          <td class="text-center"><?php
                        $this->db->select('*');
                        $this->db->from('system');
                        $this->db->where('compcode', $compcode);
                        $this->db->where('systemcode',$re->vou_system);
                        $tender_d=$this->db->get()->result(); ?>
                        <?php  foreach ($tender_d as $tender_dd) { ?>
                        <?php echo $tender_dd->systemname; ?>
                        <?php } ?></td>

          <td class="text-right"><?php echo $re->vou_downamt; ?></td>
          <td class="text-right"><?php echo $re->vou_vatper; ?></td>
          <td class="text-right"><?php echo $re->vou_vatamt; ?></td>
          <td class="text-right"><?php echo $re->vou_adv; ?></td>
          <td class="text-right"><?php echo $re->vou_advamt; ?></td>
          <td class="text-right"><?php echo $re->vou_ret; ?></td>
          <td class="text-right"><?php echo $re->vou_retamt; ?></td>
          <td class="text-right"><?php echo $re->vou_wtper; ?></td>
          <td class="text-right"><?php echo $re->vou_lesswt; ?></td>
          <td class="text-right"><?php echo $re->vou_netamt; ?></td>
        </tr>
          <?php $a++; } ?>

         <?php  

              $this->db->select('*');
              $this->db->join('ar_receiving_header','ar_receiving_header.vou_project=project.project_id');
              $this->db->join('ar_receiving_detail','ar_receiving_detail.vou_ref=ar_receiving_header.vou_no');
              $this->db->where('ar_receiving_detail.vou_system', $jobb);
              $this->db->where('project.project_sub',$pjid);
              $this->db->where('ar_receiving_header.compcode', $compcode);
              $this->db->where('ar_receiving_header.vou_type',"retention");
              $receivings = $this->db->get('project')->result();

                $vou_downamts = 0;
                $vou_vatpers = 0;
                $vou_vatamts = 0;
                $vou_advs = 0;
                $vou_advamts = 0;
                $vou_rets = 0;
                $vou_retamts = 0;
                $vou_wtpers = 0;
                $vou_lesswts = 0;
                $vou_netamts = 0;
               
         foreach ($receivings as $res) { 

                $vou_downamts = $vou_downamts + $res->vou_downamt;
                $vou_vatpers = $vou_vatpers + $res->vou_vatper;
                $vou_vatamts = $vou_vatamts + $res->vou_vatamt;
                $vou_advs = $vou_advs + $res->vou_adv;
                $vou_advamts = $vou_advamts + $res->vou_advamt;
                $vou_rets = $vou_rets + $res->vou_ret;
                $vou_retamts = $vou_retamts + $res->vou_retamt;
                $vou_wtpers = $vou_wtpers + $res->vou_wtper;
                $vou_lesswts = $vou_lesswts + $res->vou_lesswt;
                $vou_netamts = $vou_netamts + $res->vou_netamt;
                

          ?>
        <tr>
                    <td class="text-center"><?php echo $a; ?></td>
          <td class="text-center"><?php echo $res->vou_ref; ?>  
            <a style="color:red;"> (Contract : <?php 
                        $this->db->select('*');
                        $this->db->where('project_id',$res->vou_project);
                        $pji = $this->db->get('project')->result();
                        foreach ($pji as $kp) {
                         echo $kp->project_name;
                        }
                        ?>)</a></td>
          <td class="text-center"><?php echo $res->vou_type; ?></td>
          <td class="text-center"><?php echo $res->vou_period; ?></td>
          <td class="text-center"><?php
                        $this->db->select('*');
                        $this->db->from('system');
                        $this->db->where('compcode', $compcode);
                        $this->db->where('systemcode',$re->vou_system);
                        $tender_d=$this->db->get()->result(); ?>
                        <?php  foreach ($tender_d as $tender_dd) { ?>
                        <?php echo $tender_dd->systemname; ?>
                        <?php } ?></td>
          <td class="text-right"><?php echo $res->vou_downamt; ?></td>
          <td class="text-right"><?php echo $res->vou_vatper; ?></td>
          <td class="text-right"><?php echo $res->vou_vatamt; ?></td>
          <td class="text-right"><?php echo $res->vou_adv; ?></td>
          <td class="text-right"><?php echo $res->vou_advamt; ?></td>
          <td class="text-right"><?php echo $res->vou_ret; ?></td>
          <td class="text-right"><?php echo $res->vou_retamt; ?></td>
          <td class="text-right"><?php echo $res->vou_wtper; ?></td>
          <td class="text-right"><?php echo $res->vou_lesswt; ?></td>
          <td class="text-right"><?php echo $res->vou_netamt; ?></td>
        </tr>
          <?php $a++; } ?>
        <tr>
          <td class="text-center" colspan="5">Summary</td>
          <td class="text-right"><?php echo number_format($vou_downamt+$vou_downamts,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_vatper+$vou_vatpers,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_vatamt+$vou_vatamts,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_adv+$vou_advs,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_advamt+$vou_advamts,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_ret+$vou_rets,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_retamt+$vou_retamts,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_wtper+$vou_wtpers,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_lesswt+$vou_lesswts,2); ?></td>
          <td class="text-right"><?php echo number_format($vou_netamt+$vou_netamts,2); ?></td>
        </tr> 
        </tbody>
    </table>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
                   <?php } ?>
            </div>
											</div>


<!-- กูเอง -->
<div class="tab-pane" id="bottom-tab2">
      <div class="panel-body">
            <div class="tabbable">
                  <ul class="nav nav-tabs nav-tabs-top">
                        <li class="active" id="tab_ac_Accumulate"><a href="#ac" data-toggle="tab">Accumulate</a></li>
                        <li id="tab_mo_Monthly"><a href="#mo" data-toggle="tab">Monthly</a></li>

                  </ul>
                  <div class="tab-content">
                        <div class="tab-pane active" id="ac">
                              <!-- row btn export -->
                              <div class="row">
                                    <div class="col-lg-12">
                                          <div class="col-xs-6">
                                                <a  class="btn btn-info btn_export input-sm" report_content="#report_AC_B_Accumulate">Export</a>
                                          </div>

                                    </div>
                              </div>
                              <br>
                              <!-- row btn export -->
                              <div class="row" id="report_AC_B_Accumulate">
                                    <div class="table-responsive">
                                          <div class="col-lg-4">
                                                <div class="table-responsive">
                                                      <table class="table table-bordered table-striped text-center">
                                                            <thead>
                                                                  <tr>
                                                                        <td colspan="5" class="text-right">Amount (1:1,000)</td>
                                                                  </tr>
                                                                  <tr>
                                                                        <th class="text-right">Year/Month</th>
                                                                        <th class="text-right">Cost</th>
                                                                        <th class="text-right">Billing</th>
                                                                        <th class="text-right">Submit</th>
                                                                        <th class="text-right">Forecast Inc</th>
                                                                  </tr>
                                                            </thead>
                                                            <tbody id="gacc_Accumulate">

                                                            </tbody>
                                                      </table>
                                                </div><br><br>
                                          </div>
                                          <div class="col-lg-8">
                                                <h5 style="display: inline;"> Chart Type : </h5><select id="chart_type_Accumulate"></select>
                                                <center> <div id="chartAccumulate_AC_B" class="mychart" ></div></center>
                                                <!-- ice chart 2 -->
                                           </div>
                                    </div>
                              </div>
                        <br>

                  </div>
                  <div class="tab-pane" id="mo" tab2ice>
                        <!-- row btn export -->
                              <div class="row">
                                    <div class="col-lg-12">
                                          <div class="col-xs-6">
                                                <a  class="btn btn-info btn_export input-sm" report_content="#report_AC_B_Monthly">Export</a>
                                          </div>

                                    </div>
                              </div>
                              <br>
                        <!-- row btn export -->
                        <div class="row" id="report_AC_B_Monthly">
                              <div class="col-lg-3">
                                    <div class="table-responsive">
                                          <table class="table table-bordered table-striped text-center">
                                                <thead>
                                                      <tr>
                                                            <td colspan="5" class="text-right">Amount (1:1,000)</td>
                                                      </tr>
                                                      <tr>
                                                            <th class="text-right">Year/Month</th>
                                                            <th class="text-right">Cost</th>
                                                            <th class="text-right">Billing</th>
                                                            <th class="text-right">Submit</th>
                                                            <th class="text-right">Forecast Inc</th>
                                                      </tr>
                                                </thead>
                                                <tbody id="gacc_Monthly">

                                                </tbody>
                                          </table>
                                    </div><br><br>
                              </div>
                              <div class="col-lg-9">
                              <h5 style="display: inline;"> Chart Type : </h5><select id="chart_type_Monthly"></select>
                              <center> <div id="chartMonthly" class="mychart" ice="" ></div></center>
                              <!-- ice chart 2 -->
                        </div>
                  </div>
            </div>
      </div>
</div>
</div>

</div>
<div class="tab-pane" id="bottom-tab3">


      <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-top">
                  <li id="tab_ac1_graph_fn" class="active"><a href="#ac1" data-toggle="tab">Accumulate</a></li>
                  <li id="tab_mo_graph_fn"><a href="#mo1" data-toggle="tab">Monthly</a></li>

            </ul>
            <div class="tab-content">
                  <div class="tab-pane active" id="ac1">
                        <!-- row btn export -->
                              <div class="row">
                                    <div class="col-lg-12">
                                          <div class="col-xs-6">
                                                <a  class="btn btn-info btn_export input-sm" report_content="#report_fn_Accumulate">Export</a>

                                          </div>

                                    </div>
                              </div>
                              <br>
                        <!-- row btn export -->

                        <div class="row" id="report_fn_Accumulate">
                              <div class="col-lg-3">
                                    <div class="table-responsive">
                                          <table class="table table-bordered table-striped text-center">
                                                <thead>
                                                      <tr>
                                                            <td colspan="4" class="text-right">Amount (1:1,000)</td>
                                                      </tr>
                                                      <tr>
                                                            <th class="text-right">Year/Month</th>
                                                            <th class="text-right">Cost</th>
                                                            <th class="text-right">Billing</th>
                                                            <th class="text-right">Forecast Inc</th>
                                                      </tr>
                                                </thead>
                                                <tbody id="gfn_Accumulate">


                                                </tbody>
                                          </table>
                                    </div><br><br>
                              </div>

                              <div class="col-lg-9">
                              <h5 style="display: inline;"> Chart Type : </h5><select id="chart_fn_type_Accumulate"></select>
                              <center> <div id="chartFN_Accumulate" class="mychart"></div></center>
                              <!-- ice chart 2 -->
                        </div>
                  </div>
            </div>
            <div class="tab-pane" id="mo1" tab2ice>
                  <!-- row btn export -->
                        <div class="row">
                              <div class="col-lg-12">
                                    <div class="col-xs-6">
                                          <a  class="btn btn-info btn_export input-sm" report_content="#report_fn_Monthly">Export</a>

                                    </div>

                              </div>
                        </div>
                        <br>
                  <!-- row btn export -->
                  <div class="row" id="report_fn_Monthly">
                        <div class="col-lg-3">
                              <div class="table-responsive">
                                    <table class="table table-bordered table-striped text-center">
                                          <thead>
                                                <tr>
                                                      <td colspan="4" class="text-right">Amount (1:1,000)</td>
                                                </tr>
                                                <tr>
                                                      <th class="text-right">Year/Month</th>
                                                      <th class="text-right">Cost</th>
                                                      <th class="text-right">Billing</th>
                                                      <th class="text-right">Forecast Inc</th>
                                                </tr>
                                          </thead>
                                          <tbody id="gfn_Monthly">



                                          </tbody>
                                    </table>
                              </div><br><br>
                        </div>
                        <div class="col-lg-9">
                        <h5 style="display: inline;"> Chart Type : </h5><select id="chart_fn_type_Monthly"></select>
                        <center> <div id="chartFN__Monthly" class="mychart" ></div></center>
                        <!-- ice chart 2 -->
                  </div>
            </div>
            </div>
            </div>
      </div><!-- class="tabbable" -->
</div><!-- bottom-tab3 -->

<div class="tab-pane" id="bottom-tab4">
</div>
<div class="tab-pane" id="bottom-tab5">
5
</div>
<div class="tab-pane" id="bottom-tab6">
6
</div>
<div class="tab-pane" id="bottom-tab7">
7.
</div>
<div class="tab-pane" id="bottom-tab8">
8
</div>
<div class="tab-pane" id="bottom-tab9">
9
</div>
</div>
</div>
</div>
<!-- กูเอง -->




            </div>
            </div>
            </div>



       <!-- Basic modal -->
            <div id="modal_detail" class="modal fade">
                  <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                              <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Basic modal</h5>
                              </div>

                              <div class="modal-body">
                                   <div id="detail_content">

                                   </div>
                              </div>

                              <div class="modal-footer">
                                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                        </div>
                  </div>
            </div>
      <!-- /basic modal -->


      <!-- Basic modal -->
            <div id="modal_detail_status" class="modal fade">
                  <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                              <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Detail</h5>
                              </div>

                              <div class="modal-body">
                                   <div id="detail_content_status">

                                   </div>
                              </div>

                              <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button> -->
                              </div>
                        </div>
                  </div>
            </div>
      <!-- /basic modal -->

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

          function chart_all_cost(target,title,val1,val2,val3){


                  $(target).kendoChart({
                                title: {
                                    text: title,
                                    font: "bold 20px Arial,Helvetica,Sans-Serif",
                                    color:"#000000"
                                },
                                legend: {
                                   position: "top",
                                   labels: {
                                      font: "20px Arial,Helvetica,sans-serif"
                                   }
                                },
                                seriesDefaults: {
                                    type: "column",
                                    labels: {
                                      visible: true,
                                      template: "#= series.name # : #= kendo.format('{0:n}',value) #",
                                      font: "bold 16px Arial,Helvetica,sans-serif"
                                    },
                                    overlay: {
                                        gradient: "none"
                                    }
                                },
                                series: [{
                                    name:  val1.name,
                                    data: [val1.value],
                                    color: val1.color
                                }, {
                                    name:  val2.name,
                                    data: [val2.value],
                                    color: val2.color
                                }, {
                                    name:  val3.name,
                                    data: [val3.value],
                                    color: val3.color

                                }],tooltip: {
                                    visible: true,
                                    template: "(#= kendo.format('{0:n}',value) #)"
                                }
                            });
                   $(".loading").remove();


          }


             function createChart_donut(target,data,title) {
                $(target).kendoChart({
                    title: {
                        text: title,
                        font: "bold 20px Arial,Helvetica,Sans-Serif",
                        color:"#000000"
                    },
                    legend: {
                        position:"top",
                        labels: {
                            font: "20px Arial,Helvetica,sans-serif"
                        }

                    },
                    seriesDefaults: {
                        labels: {
                            // template: "#= category # : #= kendo.format('{0:P}', percentage)#",
                            template: "#= kendo.format('{0:P}',percentage)#",
                            position: "center",
                            font: "bold 25px Arial,Helvetica,Sans-Serif",
                            color:"#e5f3f9",
                            visible: true,
                            background: "transparent"
                        }
                    },
                    series: [{
                        // type: "donut",
                        type: "pie",
                        overlay: {
                            gradient: "none"
                        },
                        data: data
                    }],
                    tooltip: {
                        visible: true,
                        template: "#= category # (#= kendo.format('{0:n}',value) #)  #= kendo.format('{0:P}', percentage) #"
                    }
                });
            }





            function export_pdf(target_content , filename){
                  kendo.drawing.drawDOM($(target_content))
                    .then(function(group) {
                        // Render the result as a PDF file
                        return kendo.drawing.exportPDF(group, {
                            paperSize: "auto",
                            margin: { left: "1cm", top: "1cm", right: "1cm", bottom: "1cm" }
                        });
                    })
                    .done(function(data) {
                        // Save the PDF file
                        kendo.saveAs({
                            dataURI: data,
                            fileName: filename,
                            proxyURL: "https://demos.telerik.com/kendo-ui/service/export"
                        });
                    });
            }


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
      </script>
      <script type="text/javascript">
            var array_all_chart = [];

            var project_id = '<?=$this->uri->segment(3)?>' ;
            var url_dateproject = '<?=base_url() . "jsonr/dateproject/"?>';
            var url_show_json_finance = '<?=base_url() . "jsonr/show_json_finance/"?>';
            var url_json_ac = url_dateproject+""+project_id;
            var url_json_fn = url_show_json_finance+""+project_id;


            var chart_type = [
                    "column",
                    "bar",
                    "line",
                    "area"
            ];

            // init chart A/C start
            $("html").append('<div class="loading">Loading&#8230;</div>');

            $.get(url_json_ac , function() {
                  /*optional stuff to do after success */
            }).done(function(data){
                  try {

                        var obj_res = jQuery.parseJSON(data);
                        $(".loading").remove();
                        //console.log(obj_res);

                        // Accumulate Graph A/C Basis
                        $.each(obj_res.Accumulate[0].data, function(index, val) {

                              if(index != 0){
                                    $("#gacc_Accumulate").append(
                                          `<tr>
                                          <td>${obj_res.categories[index]}</td>
                                          <td class="show_modal_ac" controller='content_cost_ac_accumulate' Mydate = ${obj_res.categories[index]}>${obj_res.Accumulate[0].data[index]}</td>
                                          <td class="show_modal_ac"  controller='content_billing_ac_accumulate' Mydate = ${obj_res.categories[index]}>${obj_res.Accumulate[1].data[index]}</td>
                                          <td class="show_modal_ac"  controller='content_submit_ac_accumulate' Mydate = ${obj_res.categories[index]}>${obj_res.Accumulate[2].data[index]}</td>
                                          <td class="show_modal_ac"  controller='content_forecast_ac_accumulate' Mydate = ${obj_res.categories[index]}>${obj_res.Accumulate[3].data[index]}</td>
                                          </tr>`
                                    );

                                    $("#gacc_Monthly").append(
                                          `<tr>
                                          <td>${obj_res.categories[index]}</td>
                                          <td class="show_modal_ac" controller="content_cost_ac_monthly" Mydate = ${obj_res.categories[index]}>${obj_res.Monthly[0].data[index]}</td>
                                          <td class="show_modal_ac" controller="content_billing_ac_monthly" Mydate = ${obj_res.categories[index]}>${obj_res.Monthly[1].data[index]}</td>
                                          <td class="show_modal_ac" controller="content_submit_ac_monthly" Mydate = ${obj_res.categories[index]}>${obj_res.Monthly[2].data[index]}</td>
                                          <td class="show_modal_ac" controller="content_forecast_ac_monthly" Mydate = ${obj_res.categories[index]}>${obj_res.Monthly[3].data[index]}</td>
                                          </tr>`
                                    );


                              }
                        });

                        //event click table content
                        $(".show_modal_ac").css("cursor","pointer");
                        $(".show_modal_ac").click(function(event) {
                              var project_id = obj_res.project_id;
                              var data =  $(this).attr('Mydate');
                              $("#detail_content").append('<?=base_url()?>')
                             var myController = $(this).attr('controller');

                             var url_load_content = '<?=base_url()?>management/'+myController+'/'+project_id+"/"+data;
                             $("#detail_content").html(url_load_content);
                             $("#modal_detail").modal("toggle");

                             //$("#detail_content").load(<?=base_url()?>);


                        });
                         //event click table content

                          // loop create option menu chart type
                         $.each(chart_type, function(index, val) {
                           $("#chart_type_Accumulate , #chart_type_Monthly").append(`<option value="${val}">${val}</option>`);
                         });


                         var title_chart = "Account Basis Exclude VAT / Less Advanced / Less Retention / Less Witholding Tex";

                         // is
                         $("#Graph_ac").click(function(event) {
                              $("#chartAccumulate_AC_B").html('<div class="loading">Loading&#8230;</div>');
                               setTimeout(function(){
                               // init chart chartAccumulate_AC_B
                                     chart_render("#chartAccumulate_AC_B",chart_type[0],0,obj_res.categories,obj_res.Accumulate,title_chart+" "+"(Accumulate)");
                              }, 500);
                         });

                         // Accumulate chart on click tab page Graph A/C Basis
                         $("#tab_ac_Accumulate").click(function(event) {
                              $("#chartAccumulate_AC_B").html('<div class="loading">Loading&#8230;</div>');
                               setTimeout(function(){ // init chart chartAccumulate_AC_B
                                     chart_render("#chartAccumulate_AC_B",chart_type[0],0,obj_res.categories,obj_res.Accumulate,title_chart+" "+"(Accumulate)");
                              }, 500);
                         });

                        $("#tab_mo_Monthly").click(function(event) {
                              $("#chartMonthly").html('<div class="loading">Loading&#8230;</div>');
                              setTimeout(function(){ // init chart chartAccumulate_AC_B
                                   //init chart Monthly
                                    chart_render("#chartMonthly",chart_type[0],0,obj_res.categories,obj_res.Monthly,title_chart+" "+"(Monthly)");
                              }, 500);
                        });






                         // event chart type chartAccumulate_AC_B
                        $("#chart_type_Accumulate").change(function() {
                              chart_render("#chartAccumulate_AC_B",$(this).val(),0,obj_res.categories,obj_res.Accumulate,title_chart+" "+"(Accumulate)");
                        });

                        // event chart type Monthly
                        $("#chart_type_Monthly").change(function() {
                              chart_render("#chartMonthly",$(this).val(),0,obj_res.categories,obj_res.Monthly,title_chart+" "+"(Monthly)");
                        });

                          //


                       $(".btn_export").click(function(event) {
                            var content = $(this).attr('report_content');
                            export_pdf(content,"test.pdf");
                            //alert(content);
                       });

                       //event zoom in
                       $(".zoom_in").click(function(event) {

                              var target_chart = $(this).attr('target_chart');
                              //alert(target_chart);
                               $('#'+target_chart).css("zoom",'30%');

                            //zoom(target_chart , 10);
                       });

                       //event zoom out
                  }catch(err) {
                      alert("error"+" "+err);
                      console.log(data)
                  }
            });
             // init chart A/C start

             // init chart F/N


             $.get(url_json_fn, function(data) {
                   /*optional stuff to do after success */
             }).done(function(data_json_str_fn){
                  try{
                        var json_fn_obj = jQuery.parseJSON(data_json_str_fn);


                        // alert(json_fn_obj);
                         console.log(json_fn_obj);
                         $.each(json_fn_obj.Accumulate[0].data, function(index, val) {
                              if(index!=0){


                                    $("#gfn_Accumulate").append(
                                          `<tr>
                                          <td >${json_fn_obj.categories[index]}</td>
                                          <td class="show_modal" controller="content_cost_fn_accumulate" Mydate = ${json_fn_obj.categories[index]} >${json_fn_obj.Accumulate[0].data[index]}</td>
                                          <td class="show_modal" controller="content_billing_fn_accumulate" Mydate = ${json_fn_obj.categories[index]} >${json_fn_obj.Accumulate[1].data[index]}</td>
                                          <td class="show_modal" controller="content_forecast_fn_accumulate" Mydate = ${json_fn_obj.categories[index]} >${json_fn_obj.Accumulate[2].data[index]}</td>
                                          </tr>`
                                    );

                                    $("#gfn_Monthly").append(
                                          `<tr>
                                          <td >${json_fn_obj.categories[index]}</td>
                                          <td class="show_modal" controller="content_cost_fn_monthly" Mydate = ${json_fn_obj.categories[index]} >${json_fn_obj.Monthly[0].data[index]}</td>
                                          <td class="show_modal" controller="content_billing_fn_monthly" Mydate = ${json_fn_obj.categories[index]} >${json_fn_obj.Monthly[1].data[index]}</td>
                                          <td class="show_modal" controller="content_forecast_fn_monthly" Mydate = ${json_fn_obj.categories[index]} >${json_fn_obj.Monthly[2].data[index]}</td>
                                          </tr>`
                                    );
                               }
                         });

                           //event click table content
                        $(".show_modal").css("cursor","pointer");
                        $(".show_modal").click(function(event) {
                              var project_id = json_fn_obj.project_id;
                              var data =  $(this).attr('Mydate');
                              $("#detail_content").append('<?=base_url()?>')
                             var myController = $(this).attr('controller');

                             var url_load_content = '<?=base_url()?>management/'+myController+'/'+project_id+"/"+data;
                             //$("#detail_content").load(<?=base_url()?>);
                             $("#detail_content").html(url_load_content);
                             $("#modal_detail").modal("toggle");
                             //alert(url_load_content);

                        });

                         //event click table content
                         $.each(chart_type, function(index, val) {
                              // event change type chart
                              $("#chart_fn_type_Accumulate , #chart_fn_type_Monthly").append(`<option value="${val}">${val}</option>`);
                         });


                         var fn_title = "Finance Basis Income VAT / Less Advanced / Less Retention / Less Witholding Tex";

                           $("#Graph_fn").click(function(event) {
                              $("#chartFN_Accumulate").html('<div class="loading">Loading&#8230;</div>');
                              setTimeout(function(){
                                    // init chart FN_Accumulate
                                    chart_render("#chartFN_Accumulate","column",0,json_fn_obj.categories,json_fn_obj.Accumulate,fn_title);
                              }, 500);

                          });

                         $("#tab_ac1_graph_fn").click(function(event) {
                               $("#chartFN_Accumulate").html('<div class="loading">Loading&#8230;</div>');
                                setTimeout(function(){
                                    // init chart FN_Accumulate
                                    chart_render("#chartFN_Accumulate","column",0,json_fn_obj.categories,json_fn_obj.Accumulate,fn_title);
                              }, 500);
                         });

                         $("#chart_fn_type_Accumulate").change(function() {
                                // event change type chart
                                chart_render("#chartFN_Accumulate",$(this).val(),0,json_fn_obj.categories,json_fn_obj.Accumulate,fn_title);
                         });

                         $("#tab_mo_graph_fn").click(function(event) {
                               $("#chartFN__Monthly").html('<div class="loading">Loading&#8230;</div>');
                                setTimeout(function(){
                                     // init chart FN_Monthly
                                    chart_render("#chartFN__Monthly","column",0,json_fn_obj.categories,json_fn_obj.Monthly,fn_title);
                                }, 500);
                         });

                         $("#chart_fn_type_Monthly").change(function() {
                                // event change type chart
                                chart_render("#chartFN__Monthly",$(this).val(),0,json_fn_obj.categories,json_fn_obj.Monthly,fn_title);
                         });



                  }catch(e){


                  }

             });





            function get_over_view_project(pj) {


              $.post('<?=base_url()?>management_active/over_view_project/'+pj,function() {
                /*optional stuff to do after success */
              }).done(function(data){
                //alert(data);

                try{

                  var json_render_chart = jQuery.parseJSON(data);
                  // alert(json_render_chart);

                     // alert(json_render_chart.master_contract);class="head_table"
                      $("#months_content_chart1_1").html(
                          '<tr class="b">'+
                            '<td class="text_l col-xs-4">Contract</td>'+
                            '<td class="text_r col-xs-4">'+numberWithCommas(json_render_chart.master_contract)+'</td>'+
                            '<td class="text_r col-xs-4">100 %</td>'+
                          '</tr>'
                      );
                      var sum_progress = 0 ;
                      // Start Loop
                     $.each(json_render_chart[0].content_table, function(index, val) {
                       //console.log(val);
                       $("#months_content_chart1_1").append(
                          '<tr>'+
                            '<td class="text_r b col-xs-4">'+display_mouth(val.month)+'</td>'+
                            '<td class="text_r col-xs-4"><a href="#" project_id="'+json_render_chart.project_id+'" project_code="'+json_render_chart.project_code+'" date="'+val.month+'" >'+numberWithCommas(val.amount)+'</a></td>'+
                            '<td class="text_r col-xs-4">'+get_Percent(val.amount,json_render_chart.master_contract).toFixed(2)+' %</td>'+
                          '</tr>'
                        );

                       sum_progress+=val.amount;
                    });
                     //End Loop
                     $("#months_content_chart1_1_foot").empty();
                     $("#months_content_chart1_1_foot").append(
                          '<tr class="b head_table">'+
                            '<td class="text_l col-xs-4">'+"Summary"+'</td>'+
                            '<td class="text_r col-xs-4">'+numberWithCommas(sum_progress)+'</td>'+
                            '<td class="text_r col-xs-4">'+get_Percent(sum_progress,json_render_chart.master_contract).toFixed(2)+' %</td>'+
                          '</tr>'+
                          '<tr class="b head_table">'+
                            '<td class="text_l col-xs-4">'+"Remaining"+'</td>'+
                            '<td class="text_r col-xs-4">'+numberWithCommas(json_render_chart[0].chart1_1[0].value)+'</td>'+
                            '<td class="text_r col-xs-4">'+get_Percent(json_render_chart[0].chart1_1[0].value,json_render_chart.master_contract).toFixed(2)+' %</td>'+
                          '</tr>'
                        );

                  createChart_donut("#chart_1_1",json_render_chart[0].chart1_1,"Income");

                  var obj = {name:"Income",value:json_render_chart[0].chart1_1[1].value,color:"#acf98b"};
                   array_all_chart[0]=(obj);





                }catch(e){
                    alert(data);
                }
              });


            }





            function get_booking_cost(pj) {
              $.post('<?=base_url()?>management_active/booking_cost/'+pj, function() {
                /*optional stuff to do after success */
              }).done(function(data){

                //alert(data);

                try{
                    var json_booking_cost = $.parseJSON(data);
                    var sum_amount =0;
                    var sum_apv = 0;
                    var sum_apo = 0;
                    var sum_aps = 0;
                    var sum_gl = 0;
                    //alert(json_booking_cost.master_bg);
                    createChart_donut("#chart_1_2",json_booking_cost.chart_donut,"Booking");
                    //alert(json_booking_cost.chart_donut[1].value);
                    var obj = {name:"Booking",value:json_booking_cost.chart_donut[1].value,color:"#ff9999"}
                    array_all_chart[1]=(obj);

                    //alert(array_all_chart);
                    var content_table_td = '<tr class="b">'+
                        '<td class="text_l">Budget</td>'+
                        // '<td>'+numberWithCommas(val.apv)+'</td>'+
                        // '<td>'+numberWithCommas(val.apo)+'</td>'+
                        // '<td>'+numberWithCommas(val.aps)+'</td>'+
                        // '<td>'+numberWithCommas(val.gl)+'</td>'+
                        '<td class="text_r">'+numberWithCommas(json_booking_cost.master_bg)+'</td>'+
                        '<td class="text_r">100 %</td>'
                        '</tr>';

                         $("#months_content_chart1_2").html(content_table_td);
                         // Start Loop
                      $.each(json_booking_cost.content_table, function(index, val) {

                        var content_table_td = '<tr>'+
                        '<td class="text_r b">'+display_mouth(val.mount)+'</td>'+
                        // '<td>'+numberWithCommas(val.apv)+'</td>'+
                        // '<td>'+numberWithCommas(val.apo)+'</td>'+
                        // '<td>'+numberWithCommas(val.aps)+'</td>'+
                        // '<td>'+numberWithCommas(val.gl)+'</td>'+
                        '<td class="text_r">'+numberWithCommas(val.sum)+'</td>'+
                        '<td class="text_r">'+get_Percent(val.sum,json_booking_cost.master_bg).toFixed(2)+' %</td>'+
                        '</tr>';
                        sum_amount+=val.sum;
                        sum_apv+=val.apv;
                        sum_apo+=val.apo;
                        sum_aps+=val.aps;
                        sum_gl+=val.gl;

                        $("#months_content_chart1_2").append(content_table_td);
                     });
                      // End Loop
                      $("#months_content_chart1_2_foot").empty();
                      $("#months_content_chart1_2_foot").append(
                          '<tr class="b head_table">'+
                            '<td class="text_l">Summary</td>'+
                            // '<td>'+numberWithCommas(sum_apv)+'</td>'+
                            // '<td>'+numberWithCommas(sum_apo)+'</td>'+
                            // '<td>'+numberWithCommas(sum_aps)+'</td>'+
                            // '<td>'+numberWithCommas(sum_gl)+'</td>'+
                            '<td class="text_r">'+numberWithCommas(sum_amount)+'</td>'+
                            '<td class="text_r">'+get_Percent(sum_amount,json_booking_cost.master_bg).toFixed(2)+' %</td>'+
                          '</tr>'+
                          '<tr class="b head_table">'+
                            '<td class="text_l">'+"Remaining"+'</td>'+
                            '<td class="text_r">'+numberWithCommas(json_booking_cost.chart_donut[0].value)+'</td>'+
                            '<td class="text_r">'+get_Percent(json_booking_cost.chart_donut[0].value,json_booking_cost.master_bg).toFixed(2)+' %</td>'+
                          '</tr>'
                          );



                        //alert(json_booking_cost.master_bg);
                }catch(e){

                }
              });

            }




            function get_actual_cost_chart(pj) {
              $.post('<?=base_url()?>management_active/actual_cost_chart/'+pj, function() {
                /*optional stuff to do after success */
              }).done(function(data){

                // alert(data);

                try{
                    var json_actual_cost = $.parseJSON(data);

                    createChart_donut("#chart_2_1",json_actual_cost.chart,"Actual cost");

                    var obj = {name:"Actual cost",value:json_actual_cost.chart[1].value,color:"#f49842"}
                    array_all_chart[2]=(obj);


                    var sum_amount =0;
                    var sum_apv = 0;
                    var sum_apo = 0;
                    var sum_aps = 0;
                    var sum_gl = 0;

                    var content_table_td = '<tr class="b">'+
                        '<td class="text_l">Budget</td>'+
                        // '<td>'+numberWithCommas(val.apv)+'</td>'+
                        // '<td>'+numberWithCommas(val.apo)+'</td>'+
                        // '<td>'+numberWithCommas(val.aps)+'</td>'+
                        // '<td>'+numberWithCommas(val.gl)+'</td>'+
                        '<td class="text_r">'+numberWithCommas(json_actual_cost.master_bg)+'</td>'+
                        '<td class="text_r">100 %</td>'
                        '</tr>';

                        $("#months_content_chart2_1").html(content_table_td);
                        // Start Loop
                    $.each(json_actual_cost.content_table, function(index, val) {
                          var content_table_td = '<tr>'+
                          '<td class="text_r b">'+display_mouth(val.mount)+'</td>'+
                          // '<td>'+numberWithCommas(val.apv)+'</td>'+
                          // '<td>'+numberWithCommas(val.apo)+'</td>'+
                          // '<td>'+numberWithCommas(val.aps)+'</td>'+
                          // '<td>'+numberWithCommas(val.gl)+'</td>'+
                          '<td class="text_r">'+numberWithCommas(val.sum)+'</td>'+
                          '<td class="text_r">'+get_Percent(val.sum,json_actual_cost.master_bg).toFixed(2)+' %</td>'+
                          '</tr>';
                          sum_amount+=val.sum;
                          sum_apv+=val.apv;
                          sum_apo+=val.apo;
                          sum_aps+=val.aps;
                          sum_gl+=val.gl;
                           $("#months_content_chart2_1").append(content_table_td);
                    });
                      // End Loop
                      $("#months_content_chart2_1_foot").empty();
                     $("#months_content_chart2_1_foot").append(
                          '<tr class="head_table b">'+
                            '<td class="text_l">Summary</td>'+
                            // '<td>'+numberWithCommas(sum_apv)+'</td>'+
                            // '<td>'+numberWithCommas(sum_apo)+'</td>'+
                            // '<td>'+numberWithCommas(sum_aps)+'</td>'+
                            // '<td>'+numberWithCommas(sum_gl)+'</td>'+
                            '<td class="text_r">'+numberWithCommas(sum_amount)+'</td>'+
                            '<td class="text_r">'+get_Percent(sum_amount,json_actual_cost.master_bg).toFixed(2)+' %</td>'+
                          '</tr>'+
                          '<tr class="b head_table">'+
                            '<td class="text_l">'+"Remaining"+'</td>'+
                            '<td class="text_r">'+numberWithCommas(json_actual_cost.chart[0].value)+'</td>'+
                            '<td class="text_r">'+get_Percent(json_actual_cost.chart[0].value,json_actual_cost.master_bg).toFixed(2)+' %</td>'+
                          '</tr>'
                          );


                  // $("#chart_2_2").html('<div class="loading">Loading&#8230;</div>');
                  //   setTimeout(function(){


                  //   }, 1000);

                }catch(e){

                }
              });

            }



    function controller_chart(project_code){

          // chart col 1.1
        get_over_view_project(project_code);

          // chart col 1.1

        get_booking_cost(project_code);
          // chart col 1.2
        get_actual_cost_chart(project_code);
          // chart col 1.2
         //$("html").html(array_all_chart);
          // chart col 1.3

          // chart col 1.3
          // console.log()
          // array_all_chart[0] = {name:5555};
          // console.log(array_all_chart[0].name);

          //console.log(array_all_chart["0"].color);
           // chart_all_cost("#chart_2_2","All Over View",5555);
          // alert(array_all_chart);


    }

  controller_chart("<?=$pj?>");
  $("#chart_2_2").html('<div class="loading">Loading&#8230;</div>');
  setTimeout(function(){
        chart_all_cost("#chart_2_2","All Over View",array_all_chart[0],array_all_chart[1],array_all_chart[2]);

  }, 1000);

  $("#sub_project").change(function(event) {
        // var array_all_chart = [];
        array_all_chart = [];
        var project_code = $(this).val();
        var project_name = $(this).find('option:selected').text();
        $("#project_name").html(project_name);
        // alert(project_name);
            controller_chart(project_code);
        // function(){
        // }
        $("#chart_2_2").append('<div class="loading">Loading&#8230;</div>');
        setTimeout(function(){
              chart_all_cost("#chart_2_2","All Over View",array_all_chart[0],array_all_chart[1],array_all_chart[2]);

        }, 1000);


         // alert(array_all_chart);



  });

  $("[target_page]").click(function(event) {
    var project_code = $("#sub_project").val();
    var project_id = $("#sub_project").find('option:selected').attr("project_id");
    // alert($(this).attr("target_page")+project_code);
    var url = $(this).attr("target_page")+project_code+"/"+project_id;
    // alert(url);

    window.location = url;
  });


  $("[type_get]").click(function(){

      var type = $(this).attr("type_get");

      var project_id = $(this).attr("project_id");

      var project_code = $(this).attr("project_code");
      $.post('<?=base_url()?>management_active/get_detail_pading', {type: type,project_id:project_id,project_code:project_code}, function() {

      }).done(function(data){
        // alert(data);
        $("#detail_content_status").html(data);
        $("#modal_detail_status").modal("toggle");
      })
  });





$(function(){

});

  // $(function(){

  //    setTimeout(function(){
  //       $(window).resize(function() {
  //         // window.location.reload();
  //       });
  //   },100);
  // });
//   window.onorientationchange = function(){

//     var orientation = window.orientation;

//     // Look at the value of window.orientation:

//     if (orientation === 0){

//         // iPad is in Portrait mode.
//         window.location.reload();

//     }

//     else if (orientation === 90){

//         // iPad is in Landscape mode. The screen is turned to the left.
//         window.location.reload();

//     }


//     else if (orientation === -90){

//         // iPad is in Landscape mode. The screen is turned to the right.
//         window.location.reload();
//     }else if(orientation === 180){
//         window.location.reload();

//     }

// }

//   window.onorientationchange = function(){

//     var orientation = window.orientation;

//     // Look at the value of window.orientation:

//     if (orientation === 0){

//         // iPad is in Portrait mode.
//         window.location.reload();

//     }

//     else if (orientation === 90){

//         // iPad is in Landscape mode. The screen is turned to the left.
//         window.location.reload();

//     }


//     else if (orientation === -90){

//         // iPad is in Landscape mode. The screen is turned to the right.
//         window.location.reload();
//     }else if(orientation === 180){
//         window.location.reload();

//     }

// }
// Listen for orientation changes
window.addEventListener("orientationchange", function() {
    // Announce the new orientation number
    $("html").append('<div class="loading">Loading&#8230;</div>');
    window.location.reload();
}, false);


$('#overview').attr('class','active');
      </script>

