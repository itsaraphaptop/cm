<?php foreach ($res as $key){
$accode = $key->de_code;	
	} ?>
	

<a type="submit" href="<?php echo base_url(); ?>index.php/asset_active/delindexaccode/<?php echo $accode; ?>" class="btn bg-danger">Delete</a>

