<?php foreach ($project as $val) {
?>
    <tr>
        <th scope="row"><?php echo $val->project_code;?></th>
        <td><?php echo $val->project_name;?></td>
        <td><?php echo $val->project_type;?></td>
        <td><button class="btn btn-primary btn-block btn-xs"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> เปิด</button> </td>
        <td><button class="btn btn-warning btn-block btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไข</button> </td>
        <td><button class="btn btn-danger btn-block btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> ลบ</button> </td>
    </tr>
<?php
}
?>