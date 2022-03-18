<div id="ll">

<table class="table table-xxs table-hover datatable-basicxc2" >
<thead>
<tr>
<th>No.</th>
<th>Tender Code</th>
<th>Tender Name</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php  $n =1; foreach ($copyboq as $val){ ?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><?php echo $val->bd_tenid; ?></td>
<td><?php echo $val->bd_pname; ?></td>
<td><button class="opendeptor<?php echo $n;?> btn btn-xs btn-block btn-primary">SELECT</button>
</td>
</tr>

<script>
  $(".opendeptor<?php echo $n;?>").click(function(event) {
    var project = "<?= $val->bd_pname;?>";
  	$('#ll').html('<p>กำลังโหลดข้อมูล จาก '+project+'</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
   
      swal({
          title: "Are you sure?",
          text: "You will not be able to recover Data BOQ!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#66BB6A",
          confirmButtonText: "Yes, Copy it!",
          cancelButtonText: "No, cancel pls!",
          closeOnConfirm: false,
          closeOnCancel: false
      },
      function(isConfirm){
          if (isConfirm) {
            var tdcode = "<?php echo $val->bd_tenid; ?>";
            var bdcodeto = "<?=$bdcodeto;?>";
            var pcode = "<?=$projectcode?>";
            var url = "<?php echo base_url(); ?>bd/copyboq/"+tdcode+"/"+bdcodeto+"/"+pcode;
            var dataSet = {
            };
            $.post(url, dataSet, function(data) {
                if (data == "true") {
                    swal({
                        title: "Completed!",
                        text: "Copy Data BOQ.",
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                    });
                    window.location.href="<?php echo base_url();?>bd/addnewboq/<?php echo $bdcodeto;?>/<?=$projectcode;?>/p";
                } else {
                    swal({
                        title: "error",
                        text: "Error Copy Data BOQ :)",
                        confirmButtonColor: "#2196F3",
                        type: "error"
                    });
                }
            });
          }
          else {
              swal({
                  title: "Cancelled",
                  text: "Copy Data BOQ is safe :)",
                  confirmButtonColor: "#2196F3",
                  type: "error"
              });
          }
      });














    
    // $('#add_body').load('<?php echo base_url();?>bd/load_filterboq_all/<?php echo $val->bd_tenid; ?>');
  });
</script>
<?php $n++; } ?>
</tbody>
</table>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
  $(".datatable-basicxc2").DataTable();
</script>
