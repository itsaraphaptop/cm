
<option  value=""></option>
<?php 

foreach ($type as $t) { ?>
<option  value="<?php echo $t->systemcode; ?>"><?php echo $t->systemname; ?></option>
<?php } ?>


