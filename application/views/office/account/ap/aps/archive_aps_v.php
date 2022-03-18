<!-- Main content -->
      <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header">
          <div class="page-header-content">
            <div class="page-title">
              <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
            </div>


          </div>

          <div class="breadcrumb-line">
            <ul class="breadcrumb">
              <li><a href=""><i class="icon-home2 position-left"></i> Dashboard</a></li>
              <li>รายการตั้งเจ้าหนี้ทั้งหมด (Sub Contractor)</li>
              </ul>
          </div>
        </div>
        <!-- /page header -->
        <!-- Content area -->
        <div class="content">
        <!-- Highlighting rows and columns -->
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">บันทึกตั้งเจ้าหนี้ (Sub Contractor)</h5>
              <div class="heading-elements">
                <ul class="icons-list">
                          <li><a data-action="collapse"></a></li>
                          <li><a data-action="reload"></a></li>
                          <li><a data-action="close"></a></li>
                        </ul>
                      </div>
            </div>

            <div class="panel-body">
							<div class="text-right">
	                          <a href="" class="preload btn btn-default"><i class="icon-plus22"></i> New</a>
	                          <a href="" class="btn btn-default"><i class="icon-close2 position-left"></i> Close</a>
	                         </div>
						</div>
              <div class="dataTables_wrapper no-footer">
                <div class="table-responsive">
                  <table class="table table-hover table-xxs datatable-basic">
                    <thead>
                      <tr>
                        <th width="5%">#</th>
                        <th width="15%">APS No.</th>
                        <th width="15%">APS Date</th>
                        <th width="30%">Vender</th>
                        <th width="20%">Lo Number</th>
                        <th width="10%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
         <?php $n=1; foreach ($aps as $value) {?>
                      <tr>
                        <td><?php echo $n; ?></td>
                        <td><?php echo $value->aps_code; ?></td>
                        <td><?php echo DateThai($value->aps_date); ?></td>
                        <td><?php echo $value->vender_name; ?></td>
                        <td><?php echo $value->aps_lono; ?></td>          
                        <td>
                          <ul class="icons-list">
                            <li class="text-default"><a href="<?php echo base_url(); ?>ap/edit_aps/<?php echo $value->aps_code; ?>/<?php echo $value->aps_lono; ?>/<?php echo $value->aps_period; ?>"><i class="icon-pencil7"></i></a></li>
                            <li class="text-default"><a href="" title=""><i class="icon-trash"></i></a></li>
                            <li><a href="<?php echo base_url(); ?>ap/report_aps/<?php echo $value->aps_code; ?>/<?php echo $value->aps_lono; ?>/<?php echo $value->aps_period; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="glyphicon glyphicon-print"></i></a></li>
                          </ul>
                        </td>
                      </tr>
              <?php $n++; } ?>
                    </tbody>
                  </table>
                </div>
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

       $strDate = date("Y-m-d");
       // echo "Time now : ".DateThai($strDate);
     ?>
