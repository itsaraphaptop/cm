<table class="table table-bordered table-striped table-hover table-xxs">
    <thead>
        <tr id="tr1">
            <th>No.</th>
            <th>Vender Code</th>
            <th>Vender Name</th>
            <th>Cr Team</th>
            <th>Tel </th>
            <th>Fax </th>
        </tr>
    </thead>
    <tbody id="body">
    <?php $n=1; foreach ($vender as $key => $value) {?>
        <tr>
            <td><?php echo $n;?></td>
            <td><?php echo $value->cpvenderid;?></td>
            <td><?php echo $value->vender_name;?></td>
            <td><?php echo $value->cpvenderteam;?></td>
            <td><?php echo $value->cpvendertel;?></td>
            <td><?php echo $value->cpvenderfax;?></td>
        </tr>
    <?php $n++; } ?>
    </tbody>
</table>