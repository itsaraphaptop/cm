<style type="text/css">
.col-xs-15,
.col-sm-15,
.col-md-15,
.col-lg-15 {
    position: relative;
    min-height: 1px;
    padding-right: 10px;
    padding-left: 10px;
    font-size: 11px;
}
/*.col-xs-15 {
    width: 20%;
    float: left;
}*/
@media (min-width: 768px) {
.col-sm-15 {
        width: 20%;
        float: left;
    }
}
@media (min-width: 992px) {
    .col-md-15 {
        width: 20%;
        float: left;
    }
}
@media (min-width: 1200px) {
    .col-lg-15 {
        width: 20%;
        float: left;
    }
}

i#icon_footer{
    text-align:center;
}

.navbar-left {
    text-align: center;
}
.navbar-left a {
    line-height: 1.5;
    display: inline-block;
    vertical-align: middle;
}
</style>
<div class="navbar navbar-default navbar-sm navbar-fixed-bottom" id="nav_footer" style="z-index: 1033;">
	<ul class="nav navbar-nav no-border visible-xs-block">
		<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second"><i class="icon-circle-up2"></i></a></li>
	</ul>

	<div class="navbar-collapse collapse" id="navbar-second">
		<div class="navbar-left col-lg-offset-5 col-lg-2 col-md-offset-5 col-md-2">
			<a id="show_footer"><i id="icon_footer" class="icon-arrow-up12"></i></a>
		</div>
		
		<div class="navbar-right">
			<ul class="nav navbar-nav">
				
				<li class="dropdown language-switch des_show">
					<a class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>

					<ul class="dropdown-menu">
						<li><a class="thai"><img src="<?php echo base_url(); ?>assets/images/flags/th.png" alt=""> TH - Thai (ไทย)</a></li>
						<li><a class="english"><img src="<?php echo base_url(); ?>assets/images/flags/gb.png" alt=""> ENG - English (อังกฤษ)</a></li>
						
						
					</ul>
				</li>
				
				
			</ul>
		</div>
	</div>


<section id="footer" style="display: none;">
	<div class="row">
		<div class="col-lg-15 col-sm-15">
				<a data-toggle="modal" data-target="#MyChat">
				<div class="col-lg-2 col-md-2">
					<img src="<?php echo base_url(); ?>icon_cm/chat.png" style="width:32x; height: 32px;">
				</div>
				<div class="col-lg-10 col-md-10">
				<b>Chat Support Online</b><br>ติดต่อสอบถามโดยการพิมพ์
				</div>
				</a>

				<br/><br/><br/>

				<a data-toggle="modal" data-target="#MyContact">
				<div class="col-lg-2 col-md-2">
					<img src="<?php echo base_url(); ?>icon_cm/mobile-phone.png" style="width:32x; height: 32px;">
				</div>
				<div class="col-lg-10 col-md-10">
				<b>Contact Phone No.</b><br>เบอร์โทรศัพท์ Call Center
				</div>
				</a>
			
			
		</div>
		<div class="col-lg-15 col-sm-15">
				<a href="http://itsm.cloudmeka.com/">
					<div class="col-lg-2 col-md-2">
							<img src="<?php echo base_url(); ?>icon_cm/customer-service.png" style="width:32x; height: 32px;">
					</div>
					<div class="col-lg-10 col-md-10">
						<b style="color: #FFFFF;" >IT Support</b><br>แจ้งปัญา/บันทึกปัญหา
					</div>
				</a>
		</div>
		<div class="col-lg-15 col-sm-15">
			<div class="text-center">
				<a href="#"><img src="<?php echo base_url(); ?>comp/comp_2017-03-07_4184.png" class="logo" style="width:80x; height: 30px;" ></a>
				<div>
					<label><b>SourceWork</b></label>
				</div>
				<div>
					<label>66/141 Chaloemprakiet Ratchakanti 9,</label>
				</div>
				<div>
					<label>Prawat, Bangkok ,Thailand 10270</label>
				</div>
				<div>
					<label>Tel: </label>xx-xxx-xxx ,
					<label>Fax: </label>xx-xxx-xxx
				</div>
			</div>
		</div>
		<div class="col-lg-15 col-sm-15">
			
		</div>
		<div class="col-lg-15 col-sm-15">
			<div class="text-left">
				<div>
					<label>About SourceWork</label>
				</div>
				<div>
					<label>SourceWork News</label>
				</div>
				<div>
					<label>SourceWork Team</label>
				</div>

				<div>
					<a href="<?php echo base_url(); ?>history_update"><label>History Update Logs</label></a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 text-center">
			<label style="font-size: 10px;">Copyright © 2017</label>
		</div>
	</div>
</section>


</div>



<script type="text/javascript">
	var chk = false;
	$('#show_footer').click(function(event) {
		if (chk) {
			// $('#nav_footer').css('z-index', '1030');
			$("#footer").toggle();
			$("#icon_footer").attr('class', 'icon-arrow-up12');
			chk = false;
		}else{
			// $('#nav_footer').css('z-index', '1033');
			$("#footer").toggle();
			$("#icon_footer").attr('class', 'icon-arrow-down12');
			chk = true;
		}
		
	});
</script>

<div class="modal fade" id="MyContact" role="dialog">
	<div class="modal-dialog modal-md">
		
		<div class="modal-content">
			<div class="modal-header bg-warning">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Call Center No.</h4>
			</div>
			<div class="modal-body">
				<table class="table table-sm table-striped text-center">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th class="text-center">Telephone</th>
						</tr>
					</thead>
					<tbody>

						<tr>
							<td>1</td>
							<td>08x-xxx-xxx</td>
						</tr>
						<tr>
							<td>2</td>
							<td>08x-xxx-xxx</td>
						</tr>
						<tr>
							<td>3</td>
							<td>08x-xxx-xxx</td>
						</tr>
						<tr>
							<td>4</td>
							<td>08x-xxx-xxx</td>
						</tr>
						<tr>
							<td>5</td>
							<td>08x-xxx-xxx</td>
						</tr>

					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		
	</div>
</div>



<div class="modal fade" id="MyChat" role="dialog">
	<div class="modal-dialog modal-md">
		
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<h1>COMING SOON!!</h1>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		
	</div>
</div>
