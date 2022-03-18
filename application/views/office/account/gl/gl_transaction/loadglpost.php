<?php $n=1; foreach ($vc as $key) { ?>
<tr>
	<td><a type="button" class="label bg-blue" id="glload<?php echo $n; ?>">Detail</a>

	<button class="label bg-danger" id="unpost<?php echo $n; ?>">Unpost</button>

	</td>
	<td><?php echo $n; ?></td>
	<td><?php echo $key->vchno; ?></td>
	<td><div style="width: 100px;"><?php echo $key->vchdate; ?></div></td>
	<td><?php echo $key->gl_type; ?></td>
	<td><?php if($key->post==NULL){ ?>
	<span class="label bg-success-400">NO</span>
	<?php }else{ ?>
	<span class="label bg-blue">POST</span>
	<?php } ?>
	</td>
	
</tr>

<script>
	$('#glload<?php echo $n; ?>').click(function(event) {
		
		$('#detail_gl').load('<?php echo base_url(); ?>gl/detail_loadglpost/<?php echo $key->vchno; ?>/<?php echo $key->gl_type; ?>');
	});



$("#unpost<?php echo $n; ?>").click(function(event) {
  // alert("ลบ");
  var vchno = "<?php echo $key->vchno; ?>";
  var type = "<?php echo $key->gl_type; ?>";
  // swal(pro_code);
  swal({
    title: "คุณแน่ใจว่าต้องการ Un Post",
    text: "ระบบจะทำการ Un Post",
    type: "error",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Yes, Un Post!",
    closeOnConfirm: false
  },
  function(){
    $.post('<?php echo base_url(); ?>gl_active/unpost_ap/'+vchno+'/'+type, function() {
    }).done(function(data){
      console.log(data);
      var json_res = jQuery.parseJSON(data);
      // alert(json_res.status);
      if (json_res.status === true) {
        swal("Deleted!", "Your imaginary file has been deleted.", "success");
        $("#tender").modal('show');
         location.reload();
      }else{
        swal("Deleted Error", "Your imaginary file has been deleted.", "error");
      }
    });
    
  });
 });

</script>
<?php $n++; } ?>
