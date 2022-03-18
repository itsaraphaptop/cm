<div class="content-wrapper">
  <div class="content">
    <div class="row">
      <form method="post" action="<?php echo base_url(); ?>ap_petty/add_pettycash">
        <div class="panel panel-flat">
          <div class="panel-heading ">
            <h5 class="panel-title">List Print Witholding</h5>
          </div>
              <div class="dataTables_wrapper no-footer">
                <div class="table-responsive">
                  <table class="table table-hover table-xxs datatable-basic">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Vender Name</th>
                        <th>Vch No.</th>
                        <th>Vch. Date</th>
                        <th>Pay To</th>
                        <th>Amount</th>
                        <th>VAT %</th>
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
                        <td><?php echo $value->ex_ref; ?></td>
                        <td><?php echo $value->ap_date; ?></td>
                        <td><?php echo $value->vender_name; ?></td>
                        <td><?php echo $value->ex_netamt; ?></td>
                        <td><?php echo $value->ex_wt; ?></td>
                        <td><?php echo $value->ex_towt; ?></td>
                        <td><?php echo $value->ap_date; ?></td>
                        <td>
                          <ul class="icons-list">
                            <li><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_tax.mrt&no=<?php echo $value->ex_ref; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="glyphicon glyphicon-print"></i></a></li>           
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
            