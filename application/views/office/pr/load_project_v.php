
  <tr>
    <td>
      <img class="img-thumbnail" src="<?php echo base_url(); ?>profile_project/work.jpg" style="width: 150px;">
    </td>
    <td>
      <?php foreach ($det as $key => $kk) { ?>
      <p>
        <b>PR Wait</b> 
        <span class="badge badge-warning pull-right"><?php 
          if ($kk->wait =="") { echo "0";
            }else{
          echo $kk->wait; } ?>
        </span>
      </p>

      <p>
        <b>PR Approve</b> 
        <span class="badge badge-success pull-right"><?php 
          if ($kk->approve =="") { echo "0";
            }else{
          echo $kk->approve; } ?>
        </span>
      </p>

      <p>
        <b>PR Open</b> 
        <span class="badge badge-danger pull-right"><?php 
          if ($kk->open =="") { echo "0";
            }else{
          echo $kk->open; } ?>
        </span>
      </p>
<?php }
foreach ($detpc as $key => $pc) {
 ?>
      <p>
        <b>PC Wait</b> 
        <span class="badge badge-danger pull-right"><?php 
          if ($pc->wait =="") { echo "0";
            }else{
          echo $pc->wait; } ?>
        </span>
      </p>

      <p>
        <b>PC Approve</b> 
        <span class="badge badge-success pull-right"><?php 
          if ($pc->approve =="") { echo "0";
            }else{
          echo $pc->approve; } ?>
        </span>
      </p>

      <p>
        <b>PC Open</b> 
        <span class="badge badge-warning pull-right"><?php 
          if ($pc->open =="") { echo "0";
            }else{
          echo $pc->open; } ?>
        </span>
      </p>
      <?php } ?>
    </td>
  </tr>
