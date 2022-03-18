
    
    <nav class="main-menu">
            <ul>
                <li>
                    <a href="#">
                        <i class="fa glyphicon glyphicon-home fa-2x"></i>
                        <span class="nav-text">
                        <label for="">Login Video</label>
                       
                           <select class="form-control" name="vdo" id="vdo">
                           <?php foreach ($vdo as $value) {  ?>
                           	<option value="<?php echo $value->id; ?>"><?php echo  $value->vdo_name; ?></option>
                           	<?php } ?>
                           </select>
                        
                        </span>
                    </a>
                    </li>
                    </ul>
        </nav>


        
<script>
	$('#vdo').change(function(){
  var url="<?php echo base_url(); ?>index.php/config/vdo";
  var dataSet={
    vdo: $('#vdo').val()
    };
  $.post(url,dataSet,function(data){
 //////////////////////////////////////////////////////     
 window.location.replace("<?php echo base_url(); ?>index.php/auth/logout");
////////////////////////////////
  });

});
</script>      