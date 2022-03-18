<script type="text/javascript" src="<?=base_url();?>assets/js/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/tinymce/js/tinymce/init-tinymce.js"></script>	
<form id="letter1234" method="post">
<textarea class="tinymce" id="text" name="text"><?=$rows->text_message;?></textarea>
<br>
<button class="btn btn-primary" type="button" id="save">save</button>
</form>

<input type="hidden" id="w_id" value="<?=$rows->w_id;?>">
<script type="text/javascript">
	$("#save").click(function() {
		var data = $('#' + 'text').html( tinymce.get('text').getContent() );
		// console.log(data[0].value);
		$.post('<?=base_url();?>project_progress/save_text_wysiwyg', 
		{
			data: data[0].value,
			id: $('#w_id').val()
		}, function() {
		}).done(function(data) {
			// console.log(data);
			try{
				var json_res = jQuery.parseJSON(data);
				if (json_res.status === true) {
					show_nonti("",json_res.message,"success");
				}else{
					show_nonti("",json_res.message,"danger");
				}
			}catch(e){
				show_nonti("",e,"danger");
			}
		});

	});
</script>
