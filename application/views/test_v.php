<script>
// $(document).ready(function(){
    $('.hide').hide();
       $('.myTable').DataTable();
    // });
function deleteDomain(id)
{
    if (confirm("Are you sure!") == true) {
    var id = id;
    $('#hide'+id).show();
    $.ajax({
        url:"<?php echo site_url('testtb/deleteDomain');?>/"+id,
        success:function(data)
        {

        $('#domain'+id).hide();

        }

        });
    }
}
function editDomain(id)
{
    var id = id;
    $('#hide'+id).show();
    $.ajax({
        url:"<?php echo site_url('testtb/editDomain');?>/"+id,
        success:function(data)
        {
        $('#domain'+id).html(data);
        $('.hide').hide();
        }
        });
}
function updateDomain(id)
{
    var id = id;
    alert(id);
     var data = $("#myForm"+id).serialize();
    //alert(data);
    $.ajax({
                type:"POST",
                url:"<?php echo site_url('testtb/updateDomain');?>/"+id,
                data:data,
                success:function(data)
                {
                    console.log(data);
                    if(data == "false"){
                    alert("domain name already in use");
                    }else{
                    //alert(data);
                    $('.updatedData'+id).html(data);
                        }
                }
            });
}
function cancel()
{
    alert("hello");
    Location.reload();
}
</script>
<table border="0" width="100%" cellpadding="0" cellspacing="0"  class="myTable">
        <thead>
            <tr>
                <th >job name  </th>
                <th >job address.</th>
                <th >job position</th>
                <th >job year</th>
                <th >action</th>
            </tr>
</thead>
<tbody>
        <?php
            //echo "<pre>";
            //print_r($result);
        foreach($result as $row)
        {
        ?>
                <tr id="domain<?php echo $row->job_id;?>">
                <td><?php echo $row->job_name;?></td>
                <td><?php echo $row->job_address;?></td>
                <td><?php echo $row->job_position;?></td>
                <td><?php echo $row->job_years;?></td>
                <td class="options-width">

                <a href="javascript:void(0)" title="Edit" onclick="editDomain(<?php echo $row->job_id;?>)" class="icon-1 info-tooltip">Edit</a>
                <a href="javascript:void(0)" onclick="deleteDomain(<?php echo $row->job_id;?>)"  title="Delete" class="icon-2 info-tooltip">Delete</a>
                <a href="javascript:void(0)" class="hide" id="hide<?php echo $row->job_id;?>">Please wait...</a>

                </td>

            </tr>

        <?php
        }
        ?>
    </tbody>
</table>
<!-- จบเทส -->
