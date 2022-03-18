<div class="container">

        <div class="panel panel-default">
		        <div class="panel-heading"><h3><span class="glyphicon glyphicon-send"></span> แจ้งปัญหาการใช้งาน</h3></div>
		        <div class="panel-body">
		        <form method="post" action="<?php echo base_url(); ?>index.php/fixbug/add">
          <div class="row">
            <div class="col-xs-12">
            <!-- <form id="form1" action="<?php echo base_url(); ?>index.php/fixbug/add_bug" method="post" enctype="multipart/form-data"> -->
              <div class="form-group">
                <label for="">เรื่อง</label>
                <input type="text" class="form-control input-sm" placeholder="ชื่อเรื่อง" id="subj" name="subj">
              </div>
               <label for="">รายละเอียด</label>
              <div class="form-group">
                <textarea class="form-control input-sm" id="editor1"  name="deti" cols="30" rows="20" placeholder="รายละเอียด"></textarea>
              </div>

            </div>

          </div>
          <button type="subnit" class="fix btn btn-primary">แจ้งปัญหา</button>

        <a href="/" class="btn btn-default">กลับหน้าหลัก</a>
          </form>
</div>
</div>
	    	</div>
<script>
$(document).ready(function() {$('.fix').prop('disabled', true);});
    CKEDITOR.replace( 'editor1',{
    	filebrowserBrowseUrl: '<?php echo base_url(); ?>dist/ckfinder/ckfinder.html',
	    filebrowserImageBrowseUrl: '<?php echo base_url(); ?>dist/ckfinder/ckfinder.html?Type=Images',
	    filebrowserFlashBrowseUrl: '<?php echo base_url(); ?>dist/ckfinder/ckfinder.html?Type=Flash',
	    filebrowserUploadUrl: '<?php echo base_url(); ?>dist/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	    filebrowserImageUploadUrl: '<?php echo base_url(); ?>dist/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	    filebrowserFlashUploadUrl: '<?php echo base_url(); ?>dist/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    } );
$("#subj").change(function(event) {if ($("#subj").val()!="") {$('.fix').prop('disabled', false);}else{$('.fix').prop('disabled', true);}});
</script>




     
