<!-- PB020300500000034 -->
<!--  -->
<h2>Purchase Order System</h2>
<div class="table-responsive" style="overflow-x:auto;">
<table class="table table-hover table-bordered table-striped table-xxs">
  <thead class="bg-success">
    <tr style="height: 50px;">
      <th><div style="width: 150px;" >Material Code </div></th>
      <th><div style="width: 300px;">Material Name</div></th>
      <th><div style="width: 50px;">Unit</div></th>
      <th><div style="width: 150px;">Price</div></th>
      <th><div style="width: 100px;">% Disc. 1</div></th>
      <th><div style="width: 100px;">% Disc. 2</div></th>
      <th><div style="width: 100px;">% Disc. 3</div></th>
      <th><div style="width: 100px;">% Disc. 4</div></th>
      <th><div style="width: 130px;">P/O Date</div></th>
      <th><div style="width: 200px;">P/O No.</div></th>
      <th><div style="width: 300px;">Supplier</div></th>
      <th><div style="width: 200px;">Project</div></th>
      <th><div style="width: 200px;" >Project No.</div></th>
      <th><div style="width: 200px;">Dept. Co.</div></th>
      <th><div style="width: 50;">Job</div></th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($po as $key => $value) {
        $this->db->select('*');
        $this->db->from('po');
        $this->db->join('project','po.po_project = project.project_id');
        $this->db->where('po.po_pono',$value->poi_ref);
        $po_h = $this->db->get()->result();
         foreach ($po_h as $index => $po_data) {    
    ?>
      <tr style="height: 50px;">
        <td><?= $value->poi_matcode ?></td>
        <td><?= $value->poi_matname ?></td>
        <td><?= $value->poi_unit ?></td>
        <td class="text-right">
           <?php
            if ($value->poi_priceunit != 0) {
              echo number_format($value->poi_priceunit);
            }else{
              echo $value->poi_priceunit;
            }
          ?>
        </td>
        <td class="text-right"><?= number_format($value->poi_discountper1,2) ?></td>
        <td class="text-right"><?= number_format($value->poi_discountper2,2) ?></td>
        <td class="text-right"><?= number_format($value->poi_discountper3,2) ?></td>
        <td class="text-right"><?= number_format($value->poi_discountper4,2) ?></td>
        <td><?= $po_data->po_podate ?></td>
        <td><?= $value->poi_ref ?></td>
        <td><?= $po_data->po_vender ?></td>
        <td><?= $po_data->project_name ?></td>
        <td><?= $po_data->project_code ?></td>
        <td>
          <?php 
              $this->db->select('department_title');
              $this->db->from('department');
              $this->db->where('department_id', $po_data->po_department);
              $dc = $this->db->get()->result();
              foreach ($dc as $dc_i => $dc_d) { 
                  echo $dc_d->department_title;
              }
          ?>  
        </td>
        <td>
          <?php 
              $this->db->select('systemname');
              $this->db->from('system');
              $this->db->where('systemid', $po_data->po_system);
              $system = $this->db->get()->result();
              foreach ($system as $system_i => $system_d) { 
                 echo $system_d->systemname;
              }
          ?>  
        </td>
      </tr>
    <?php
         }
      }
    ?>
  </tbody>
</table>
</div>

<div class="table-responsive" style="overflow-x:auto;">
<h2>New Work Order</h2>
<table class="table table-hover table-bordered table-striped table-xxs">
  <thead class="bg-info" style=>
    <tr style="height: 50px;">
      <th><div style="width: 150px;" >Material Code </div></th>
      <th><div style="width: 300px;">Material Name</div></th>
      <th><div style="width: 50px;">Unit</div></th>
      <th><div style="width: 150px;">Price</div></th>
      <th><div style="width: 100px;">% Disc. 1</div></th>
      <th><div style="width: 100px;">% Disc. 2</div></th>
      <th><div style="width: 100px;">% Disc. 3</div></th>
      <th><div style="width: 100px;">% Disc. 4</div></th>
      <th><div style="width: 130px;">W/O Date</div></th>
      <th><div style="width: 200px;">W/O No.</div></th>
      <th><div style="width: 300px;">Supplier</div></th>
      <th><div style="width: 200px;">Project</div></th>
      <th><div style="width: 200px;" >Project No.</div></th>
      <th><div style="width: 200px;">Dept. Co.</div></th>
      <th><div style="width: 50;">Job</div></th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($wo as $key => $lo_value) {
        $this->db->select('*');
        $this->db->from('lo');
        $this->db->join('project','lo.projectcode = project.project_id');
        $this->db->where('lo.lo_lono',$lo_value->lo_ref);
        $lo_h = $this->db->get()->result();
         foreach ($lo_h as $index => $lo_data) {    
    ?>
      <tr style="height: 50px;">
        <td><?= $lo_value->lo_matcode ?></td>
        <td><?= $lo_value->lo_matname ?></td>
        <td><?= $lo_value->lo_unit ?></td>
        <td class="text-right">
          <?php
            if ($lo_value->lo_price != 0) {
              echo number_format($lo_value->lo_price);
            }else{
              echo $lo_value->lo_price;
            }
          ?>
        </td>
        <td class="text-right"><?= number_format($lo_value->lo_disper,2) ?></td>
        <td class="text-right"><?= number_format($lo_value->lo_disper2,2) ?></td>
        <td class="text-right"><?= number_format($lo_value->lo_disper3,2) ?></td>
        <td class="text-right"><?= number_format($lo_value->lo_disper4,2) ?></td>
        <td><?= $lo_data->lodate ?></td>
        <td><?= $lo_value->lo_ref ?></td>
        <td><?= $lo_data->contactor ?></td>
        <td><?= $lo_data->projownername ?></td>
        <td><?= $lo_data->project_code ?></td>
        <td>
          <?php 
              $this->db->select('department_title');
              $this->db->from('department');
              $this->db->where('department_id', $lo_data->department);
              $lo_d = $this->db->get()->result();
              foreach ($lo_d as $lo_d_i => $lo_d_d) { 
                  echo $lo_d_d->department_title;
              }
          ?>  
        </td>
        <td>
          <?php 
              $this->db->select('systemname');
              $this->db->from('system');
              $this->db->where('systemid', $lo_data->system);
              $lo_system = $this->db->get()->result();
              foreach ($lo_system as $lo_system_i => $lo_system_d) { 
                 echo $lo_system_d->systemname;
              }
          ?>  
        </td>
      </tr>
    <?php
         }
      }
    ?>
  </tbody>
</table>
</div>