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
      <div class="breadcrumb-line">
        <ul class="breadcrumb">
          <li><a href="index.html"><i class="icon-home2 position-left"></i> ระบบบัญชี</a></li>
          <li>Receive Other</li>
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
        <div class="row">
            <div class="panel panel-flat border-top-lg border-top-success">
              <div class="panel-heading ">
                <h5 class="panel-title">Receive Other</h5>

              </div>
              <div class="panel-body">
                <div class="col-md-12">
                  <a class="heading-elements-toggle"><i class="icon-menu"></i></a><a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
                  <div class="panel-body">
                    <div class="table-responsive">
                      <div class="table-responsive" id="invreceipt">
                <table class="table table-hover table-bordered table-striped table-xxs datatable-basicc">
                  <thead>
                    <tr >
                      <th class="text-center">เลขที่รับสินค้า</th>
                      <th class="text-center">วันที่รับของ</th>
                      <th class="text-center">ร้านค้า</th>
                      <th class="text-center">โครงการ</th>
                      <th class="text-center">ระบบ</th>
                      <th class="text-center">Aprove</th>
                      <th class="text-center">Disapprove</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <?php foreach ($res as $key) { ?>
                      <td><?php echo $key->po_reccode; ?></td>
                      <td><?php echo $key->po_recdate; ?></td>
                      <td><?php echo $key->venderid; ?></td>
                      <td><?php echo $key->project_name; ?></td>
                      <td><?php echo $key->systemname; ?></td>
                      <td>
                        <a data-toggle="modal" data-target="#openohter<?php echo $key->po_reccode; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a>
                      </td>
                      <td>
                        <a href="<?php echo base_url(); ?>index.php/inventory_active/dis_receive_other/<?php echo $key->po_reccode; ?>/<?php echo $id; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>

<?php foreach ($res as $val) { ?>
<form name="contactForm1" id="contactForm1" method="post" action="<?php echo base_url(); ?>inventory_active/app_receive_other">
  <div id="openohter<?php echo $val->po_reccode; ?>" class="modal fade">
    <div class="modal-dialog modal-full">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Open Detail PR No.: <?php echo $val->po_reccode; ?></h5>
          <input type="hidden" value="<?php echo $val->po_reccode; ?>" name="po_reccode">
          <input type="hidden" value="<?php echo $id; ?>" name="project">
          <input type="hidden" value="<?php echo $val->taxno; ?>" name="taxno">
          <input type="hidden" value="<?php echo $val->duedate; ?>" name="duedate">
        </div>
        <div class="modal-body">
          <table class="table table-hover table-bordered table-striped table-xxs datatable-basic">
            <thead>
              <tr>
                <th>Material Code</th>
                <th>Material Name</th>
                <th>Cost Code</th>
                <th>Warehouse</th>
                <th>QTY</th>
                <th>Unit</th>
                <th>Price/Unit</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody id="detail">
             <?php
                $this->db->select('*');
                $this->db->from('po_recitem');
                $this->db->join('ic_proj_warehouse', 'ic_proj_warehouse.whcode = po_recitem.ic_warehouse');
                $this->db->where('poi_ref',$val->po_reccode);
                $this->db->where('project_id',$id);
                $qpj=$this->db->get()->result();
                foreach ($qpj as $qq) { ?>
                <tr>
                  <td><?php echo $qq->poi_matcode; ?></td>
                  <td><?php echo $qq->poi_matname; ?></td>
                  <td><?php echo $qq->poi_costcode; ?></td>
                  <td><?php echo $qq->whname; ?></td>
                  <td><?php echo $qq->poi_qty; ?></td>
                  <td><?php echo $qq->poi_unit; ?></td>
                  <td><?php echo $qq->poi_priceunit; ?></td>
                  <td><?php echo number_format($qq->poi_amount,2); ?>

                  </td>
                </tr>
                <?php } ?>
            </tbody>
          </table>

          <table id="hiddens">
             <?php
                $this->db->select('*');
                $this->db->from('po_recitem');
                $this->db->join('ic_proj_warehouse', 'ic_proj_warehouse.whcode = po_recitem.ic_warehouse');
                $this->db->where('poi_ref',$val->po_reccode);
                $this->db->where('project_id',$id);
                $qpj=$this->db->get()->result();
                foreach ($qpj as $qq) { ?>
                <tr>
                  <td><input type="text" value="<?php echo $qq->poi_matcode; ?>" name="matcode[]"></td>
                  <td><input type="text" value="<?php echo $qq->poi_matname; ?>" name="matname[]"></td>
                  <td><input type="text" value="<?php echo $qq->poi_costcode; ?>" name="costcode[]"></td>
                  <td><input type="text" value="<?php echo $qq->ic_warehouse; ?>" name="wh[]"></td>
                  <td><input type="text" value="<?php echo $qq->poi_qty; ?>" name="qty[]"></td>
                  <td><input type="text" value="<?php echo $qq->poi_unit; ?>" name="unit[]"></td>
                  <td><input type="text" value="<?php echo $qq->poi_priceunit; ?>" name="priceunit[]"></td>
                  <td><input type="text" value="<?php echo $qq->poi_amount; ?>" name="amount[]">
                    <input type="text" name="balance[]"  id="balanceinput" value="0">
                    <input type="text" name="costname[]" id="" readonly class="form-control input-sm" value="<?php echo $qq->poi_costname; ?>">
                    <input type="text" name="dis1[]" id="dis1" value="0">
                    <input type="text" name="dis2[]" id="dis2" value="0">
                    <input type="text" name="disamt[]" id="disamt" value="0">
                    <input type="text" name="vat[]" id="vat" value="0">
                    <input type="text" name="disex[]" id="disex" value="0">
                  </td>
                </tr>
                <?php } ?>
          </table>
          <!--  -->
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn bg-success-600">Approve</button>
        </div>
      </div>
    </div>
  </div>
</form>
<?php } ?>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
  $("#hiddens").hide();

$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '150px',
         targets: [0 ]
     }],
     dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
     language: {
         search: '<span>Filter:</span> _INPUT_',
         lengthMenu: '<span>Show:</span> _MENU_',
         paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
     },
     drawCallback: function () {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
     },
     preDrawCallback: function() {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
     }
 });
  $('.datatable-basicc').DataTable();
  $.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '150px',
         targets: [0 ]
     }],
     dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
     language: {
         search: '<span>Filter:</span> _INPUT_',
         lengthMenu: '<span>Show:</span> _MENU_',
         paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
     },
     drawCallback: function () {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
     },
     preDrawCallback: function() {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
     }
 });
  $('.datatable-basic').DataTable();
</script>
