<div class="page-header page-header-transparent">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"></span> Petty Cash Report By CostCode</h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>
					<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

					<div class="breadcrumb-line breadcrumb-line-component">
						<ul class="breadcrumb">
							<li><a class="preload" href="/"><i class="icon-home2 position-left"></i> Home</a></li>
              <li class="active">Petty Cash Report</li>
						</ul>

						<ul class="breadcrumb-elements">
							<li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear position-left"></i>
									Settings
									<span class="caret"></span>
								</a>

								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
									<li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
									<li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="icon-gear"></i> All settings</a></li>
								</ul>
							</li>
						</ul>
					<a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
				</div>

        <div class="content">
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Report Petty Cash Summary	<p></p></h6>
              <div class="heading-elements">
              <button type="button" class="btn btn-default heading-btn" name="button" data-toggle="modal" data-target="#cri"><i class="fa fa-search"></i> เลือกเงื่อนไข</button>
              <a href="/" class="btn btn-default heading-btn"><i class="fa fa-close"></i> Close</a>
            </div>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

            <div class="panel-body">
              <table style="width:100%">
                            <thead>
                              <tr>
                                <th colspan="3" valign="bottom"><img src="<?php echo base_url(); ?>comp/<?php echo $compimg; ?>" class="img img-responsive" style="max-height: 50px;"></th>
                                <th colspan="10" valign="bottom" style="text-align:center;" class="ng-binding">
                                    บริษัท : <?php echo $companyname; ?><br>
                                    รายงานค้าใช้จ่ายใบเบิกเงินสด ประจำวัน/เดือน/ปี <br>

                                    ประจำวันที่ <label id="dathone"></label> ถึงวันที่
                                </th>
                                <th colspan="4" valign="bottom" style="text-align:right;" class="ng-binding">วันที่ <?php echo DateThai( date('Y-m-d')) ?></th>
                            </tr>
                          </thead>
                </table>
                <br>
                <div id="loadtable">

                </div>

            </div>

          </div>
        </div>


        <?php
          function DateThai($strDate)
          {
            $strYear = date("Y",strtotime($strDate))+543;
            $strMonth= date("n",strtotime($strDate));
            $strDay= date("j",strtotime($strDate));
            $strHour= date("H",strtotime($strDate));
            $strMinute= date("i",strtotime($strDate));
            $strSeconds= date("s",strtotime($strDate));
            $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
            $strMonthThai=$strMonthCut[$strMonth];
            return "$strDay $strMonthThai $strYear";
          }

        ?>
