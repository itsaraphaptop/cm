<div class="content-wrapper">
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">Dashboard</span> - ภาพรวมระบบ</h4>
      </div>

      <div class="heading-elements">
        <div class="heading-btn-group">
          <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
          <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
          <a href="<?php echo base_url(); ?>index.php/manag/calenda" class="preload btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
        </div>
      </div>
      <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
    </div>

    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i>ระบบจัดการบัญชีเจ้าหนี้</a></li>
        <li>พิมพ์หนังสือรับรองหักภาษี ณ ที่จ่าย</li>
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
      <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
    </div>
  </div>

  <div class="content">
    <div class="row">
      <form method="post" action="<?php echo base_url(); ?>ap_petty/add_pettycash">
        <div class="panel panel-flat border-top-lg border-top-success">
          <div class="panel-heading ">
            <h5 class="panel-title">พิมพ์หนังสือรับรองหักภาษี ณ ที่จ่าย</h5>
          </div>
              <div class="dataTables_wrapper no-footer">
                <div class="table-responsive">
                  <table class="table table-hover table-xxs datatable-basic">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Vender</th>
                        <th>Vch No.</th>
                        <th>Vch. Date</th>
                        <th>Pay To</th>
                        <th>Amount</th>
                        <th>%</th>
                        <th>W/H Tax</th>
                        <th>W/H Date</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $n=1; foreach ($rep as $value) {?>
                      <tr>
                        <td><?php echo $n; ?></td>
                        <td><?php echo $value->vender_name; ?></td>
                        <td><?php echo $value->aps_code; ?></td>
                        <td><?php echo $value->ap_date; ?></td>
                        <td><?php echo $value->vender_name; ?></td>
                        <td><?php echo $value->aps_netamt; ?></td>
                        <td><?php echo $value->aps_wtper; ?></td>
                        <td><?php echo $value->aps_wttot; ?></td>
                        <td><?php echo $value->ap_date; ?></td>
                        <td>
                          <ul class="icons-list">
                            <li><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=aps_tax.mrt&no=<?php echo $value->aps_code; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="glyphicon glyphicon-print"></i></a></li>           
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
 
      </form>
    </div>               
  </div>
</div>
            