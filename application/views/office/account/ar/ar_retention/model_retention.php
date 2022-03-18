<table class="table table-bordered">
  <thead>
    <tr>
      <th>INVOICE No.</th>
      <th>ACCOUNT RECEIVBLE No.</th>
      <th>PROJECT</th>
      <th>SYSTEM</th>
      <th>RETENTION</th>
    </tr>
  </thead>
  <tbody>
<?php
  foreach ($list as $key => $value) {
?>
  <tr>
    <td><?= $value->inv_no ?></td>
    <td><?= $value->ar_no ?></td>
    <td><?= $value->project_name ?></td>
    <td><?= $value->systemname ?></td>
    <td><?= $value->amt_retention ?></td>
  </tr>
<?php
  }
?>  
  </tbody>
</table>