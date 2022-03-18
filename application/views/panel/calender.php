
<style>
.onoffswitch {
position: relative; width: 90px;
-webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}
.onoffswitch-checkbox {
display: none;
}
.onoffswitch-label {
display: block; overflow: hidden; cursor: pointer;
border: 2px solid #999999; border-radius: 20px;
}
.onoffswitch-inner {
display: block; width: 200%; margin-left: -100%;
transition: margin 0.3s ease-in 0s;
}
.onoffswitch-inner:before, .onoffswitch-inner:after {
display: block; float: left; width: 50%; height: 30px; padding: 0; line-height: 30px;
font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
box-sizing: border-box;
}
.onoffswitch-inner:before {
content: "Public";
padding-left: 10px;
background-color: #34A7C1; color: #FFFFFF;
}
.onoffswitch-inner:after {
content: "Private";
padding-right: 10px;
background-color: #EEEEEE; color: #999999;
text-align: right;
}
.onoffswitch-switch {
display: block; width: 18px; margin: 6px;
background: #FFFFFF;
position: absolute; top: 0; bottom: 0;
right: 56px;
border: 2px solid #999999; border-radius: 20px;
transition: all 0.3s ease-in 0s;
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
margin-left: 0;
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
right: 0px;
	}
</style>
<div class="content-wrapper">
	<div class="content">	
		<div class="panel panel-flat">	
			<div class="panel-body">
				<div class="row">
					<div class="col-md-3">
						<div class="panel-body">
						</div>
						<div class="content-group" id="external-events">
							
							<div class="fc-events-container content-group">
								<?php
								
								$this->db->select('*');
								$this->db->where('rights',$m_id);
								$su = $this->db->get('schedule')->result();
								foreach ($su as $suu) {
								
								
								?>
								<a data-toggle="modal" data-target="#theme_primary<?php echo $suu->id; ?>">
									<div class="fc-event" data-color="<?php echo $suu->color; ?>">
										
										<?php echo $suu->heading; ?> (<?php if($suu->status=="0"){ echo "Public"; }else{ echo "Private"; } ?>) 
										
										<i class="icon-bell3 "></i>
										
									</div></a>
								<?php } ?>
							</div>
							<div class="checkbox checkbox-right checkbox-switchery switchery-xs text-center hidden" >
								<label>
									<input type="checkbox" class="switch" checked="checked" id="drop-remove">
									Remove after drop
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="onoffswitch">
								<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
								<label class="onoffswitch-label" for="myonoffswitch">
									<span class="onoffswitch-inner"></span>
									<span class="onoffswitch-switch"></span>
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary">Add a schedule</button>
						</div>
						
					</div>
					<div class="col-md-9 text-center">
						<div class="fullcalendar-external" id="fullcalendar-external"></div>
						<div class="fullcalendar-externall" id="fullcalendar-externall"></div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
<div id="modal_theme_primary" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h6 class="modal-title">Schedule</h6>
			</div>
			<div class="modal-body">
				<form  action="<?php echo base_url(); ?>index.php/office/office_schedule"  method="post" enctype="multipart/form-data">
					
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label>แถบสี</label>
								<input class="form-control" type="color" name="color">
							</div>
						</div>
						<div class="col-xs-3">
							<div class="form-group">
								<label>ระบุวันที่</label>
								<input type="date" class="form-control"  id="datestart" name="datestart" required="" >
							</div>
						</div>
						<div class="col-xs-3">
							<div class="form-group">
								<label>ถึงวันที่</label>
								<input type="date" class="form-control"  id="datestop" name="datestop" >
							</div>
						</div>
						<div class="col-xs-3">
							<div class="form-group">
								<label>เวลา</label>
								<input class="form-control" type="time" name="time">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-3">
							<div class="form-group">
								<label>หัวเรื่อง:</label>
								<input type="text" class="form-control"  id="heading" name="heading" required="">
							</div>
						</div>

						

						<div class="col-xs-3">
							<div class="form-group">
										<label class="display-block text-semibold">&nbsp;</label>
										<label class="radio-inline radio-right">
											<input type="radio" name="status" checked="checked" value="0">
											Public
										</label>

										<label class="radio-inline radio-right">
											<input type="radio" name="status" value="1">
											Private
										</label>
									</div>
						</div>
						<!-- <div class="col-xs-4">
							<div class="form-group">
								<label>เอกสารแนบ :</label>
								<input type="file" class="form-control">
							</div>
						</div> -->
					</div>
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label>รายละเอียด:</label>
								<textarea name="remarktime" class="form-control"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-3">
							<div class="form-group">
								<label>แจ้งเตือนล่วงน้า : <input type="checkbox" id="chk" name="chk" value="1"></label>
								<input type="date" class="form-control"  id="notice" name="notice">
								<input type="hidden" class="form-control"  id="chkk" name="chkk" value="0">
							</div>
						</div>

						<div class="col-xs-3">
							<div class="form-group">
								<label>&nbsp;</label>
								<input type="time" class="form-control"  id="timenotice" name="timenotice" required="" value="<?php echo date("H:i:s"); ?>">
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-info">Submit</button>
			</div>
			</form>
		</div>
	</div>
</div>

					<script>
						$('#notice').hide();
						$('#timenotice').hide();
						$('#chk').click(function(){
						if ($("#chk").prop("checked")) {
						$('#notice').show();
						$('#timenotice').show();
						$('#chkk').val("1");
					    }else{
					   	$('#notice').hide();
						$('#timenotice').hide();
						$('#chkk').val("0");
					    }
						});
					</script>

<?php								
$this->db->select('*');
$this->db->where('rights',$m_id);
$su = $this->db->get('schedule')->result();
foreach ($su as $suu) {							
?>
<div id="theme_primary<?php echo $suu->id; ?>" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h6 class="modal-title"><?php echo $suu->heading; ?></h6>
			</div>
			<div class="modal-body">
				<form method="post" action="<?php echo base_url(); ?>index.php/office/editoffice_schedule">
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label>แถบสี</label>
								<input class="form-control" type="color" name="color" value="<?php echo $suu->color; ?>">
								<input class="form-control" type="hidden" name="id" value="<?php echo $suu->id; ?>">
							</div>
						</div>
						<div class="col-xs-3">
							<div class="form-group">
								<label>ระบุวันที่</label>
								<input type="date" class="form-control"  id="datestart" name="datestart" required="" value="<?php echo $suu->datestart; ?>">
							</div>
						</div>
						<div class="col-xs-3">
							<div class="form-group">
								<label>ถึงวันที่</label>
								<input type="date" class="form-control"  id="datestop" name="datestop" value="<?php echo $suu->datestop; ?>">
							</div>
						</div>
						<div class="col-xs-3">
							<div class="form-group">
								<label>เวลา</label>
								<input class="form-control" type="time" name="time" value="<?php echo $suu->time; ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-3">
							<div class="form-group">
								<label>หัวเรื่อง:</label>
								<input type="text" class="form-control"  id="heading" name="heading" required="" value="<?php echo $suu->heading; ?>">
							</div>
						</div>
						<div class="col-xs-3">
							<div class="form-group">
										<label class="display-block text-semibold">&nbsp;</label>
										<label class="radio-inline radio-right">
											<input type="radio" name="status" value="0" <?php if($suu->status=="0"){ echo 'checked="checked"'; } ?>>
											Public
										</label>

										<label class="radio-inline radio-right">
											<input type="radio" name="status" value="1" <?php if($suu->status=="1"){ echo 'checked="checked"'; } ?>>
											Private
										</label>
									</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label>รายละเอียด:</label>
								<textarea name="remarktime" class="form-control"><?php echo $suu->remarktime; ?></textarea>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-3">
							<div class="form-group">
								<label>แจ้งเตือนล่วงน้า : <input type="checkbox" id="chk<?php echo $suu->id; ?>" name="chk" <?php if($suu->chk=="1"){ echo 'checked="checked"'; } ?>  value="1"></label>
								<input type="date" class="form-control"  id="notice<?php echo $suu->id; ?>" name="notice" value="<?php echo $suu->notice; ?>">
								<input type="hidden" class="form-control"  id="chkk<?php echo $suu->id; ?>" name="chkk" value="<?php echo $suu->chk; ?>" >
							</div>
						</div>

						<div class="col-xs-3">
							<div class="form-group">
								<label>&nbsp;</label>
								<input type="time" class="form-control"  id="timenotice<?php echo $suu->id; ?>" name="timenotice" required="" value="<?php echo date("H:i:s"); ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 text-right">
							<button type="submit" class="btn btn-info">Edit</button>
							<a href="<?php echo base_url(); ?>index.php/office/schedule_del/<?php echo $suu->id; ?>" class="btn btn-danger">Delete</a>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				
			</div>
		</div>
	</div>
</div>

<script>
						if(<?php echo $suu->chk; ?>=="0"){
						$('#notice<?php echo $suu->id; ?>').hide();
						$('#timenotice<?php echo $suu->id; ?>').hide();
						}
						

						$('#chk<?php echo $suu->id; ?>').click(function(){
						if ($("#chk<?php echo $suu->id; ?>").prop("checked")) {
						$('#notice<?php echo $suu->id; ?>').show();
						$('#timenotice<?php echo $suu->id; ?>').show();
						$('#chkk<?php echo $suu->id; ?>').val("1");
					    }else{
					   	$('#notice<?php echo $suu->id; ?>').hide();
						$('#timenotice<?php echo $suu->id; ?>').hide();
						$('#chkk<?php echo $suu->id; ?>').val("0");
					    }
						});

						
					</script>
<?php } ?>

<script>
$(function() {
	get_fullcalendar_external();
	$("#myonoffswitch").change(function(event) {

		if(!$(this).prop('checked')){
			$('#fullcalendar-external').hide();
			$('#fullcalendar-externall').show();
				get_fullcalendar_externall();
		}else{
			$('#fullcalendar-externall').hide();
			$('#fullcalendar-external').show();
				get_fullcalendar_external();
		}
		
	});

});

function get_fullcalendar_external(){
	
			$.get('<?=base_url()?>jsonr/show_calender', function() {
			/*optional stuff to do after success */
			}).done(function(data){
				var eventColors =  jQuery.parseJSON(data);
				var remove = document.querySelector('.switch');
				var removeInit = new Switchery(remove);
				// Initialize the calendar
				$('#fullcalendar-external').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
					},
					editable: true,
					defaultDate: '<?php echo date("Y-m-d"); ?>',
					events: eventColors,
					lang: 'en',
					droppable: true, // this allows things to be dropped onto the calendar
					drop: function() {
						if ($('#drop-remove').is(':checked')) { // is the "remove after drop" checkbox checked?
						$(this).remove(); // if so, remove the element from the "Draggable Events" list
					}
					},
					eventClick: function(calEvent) {

						$("#show"+calEvent.id).modal("show");
				
					}
				});

				$('#external-events .fc-event').each(function() {
					// Different colors for events
					$(this).css({'backgroundColor': $(this).data('color'), 'borderColor': $(this).data('color')});
					// Store data so the calendar knows to render an event upon drop
					$(this).data('event', {
						title: $.trim($(this).html()), // use the element's text as the event title
						color: $(this).data('color'),
						stick: true // maintain when user navigates (see docs on the renderEvent method)
					});
				// Make the event draggable using jQuery UI
					$(this).draggable({
						zIndex: 999,
						revert: true, // will cause the event to go back to its
						revertDuration: 0 // original position after the drag
					});
				});
			});
	

}

function get_fullcalendar_externall(){
		$.get('<?=base_url()?>jsonr/show_calender_where', function() {
		/*optional stuff to do after success */
		}).done(function(data){
			var eventColors =  jQuery.parseJSON(data);
			var remove = document.querySelector('.switch');
			var removeInit = new Switchery(remove);
			// Initialize the calendar
			$('#fullcalendar-externall').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				editable: true,
				defaultDate: '<?php echo date("Y-m-d"); ?>',
				events: eventColors,
				lang: 'en',
				droppable: true, // this allows things to be dropped onto the calendar
				drop: function() {
					if ($('#drop-remove').is(':checked')) { // is the "remove after drop" checkbox checked?
					$(this).remove(); // if so, remove the element from the "Draggable Events" list
				}
				},
				eventClick: function(calEvent) {

					$("#show"+calEvent.id).modal("show");
			
				}
			});
			$('#external-events .fc-event').each(function() {
				// Different colors for events
				$(this).css({'backgroundColor': $(this).data('color'), 'borderColor': $(this).data('color')});
				// Store data so the calendar knows to render an event upon drop
				$(this).data('event', {
					title: $.trim($(this).html()), // use the element's text as the event title
					color: $(this).data('color'),
					stick: true // maintain when user navigates (see docs on the renderEvent method)
				});
				// Make the event draggable using jQuery UI
				$(this).draggable({
					zIndex: 999,
					revert: true, // will cause the event to go back to its
					revertDuration: 0 // original position after the drag
				});
			});
		});
	
}

</script>

<?php
								
$this->db->select('*');
$this->db->where('rights',$m_id);
$su = $this->db->get('schedule')->result();
foreach ($su as $suu) {							
?>
<div id="show<?php echo $suu->id; ?>" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h6 class="modal-title"><?php echo $suu->heading; ?></h6>
			</div>
			<div class="modal-body">
			<!-- 	<form method="post" action="<?php echo base_url(); ?>index.php/office/editoffice_schedule"> -->
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label>แถบสี</label>
								<input class="form-control" type="color" name="color" value="<?php echo $suu->color; ?>" readonly>
								<input class="form-control" type="hidden" name="id" value="<?php echo $suu->id; ?>" readonly>
							</div>
						</div>
						<div class="col-xs-3">
							<div class="form-group">
								<label>ระบุวันที่</label>
								<input type="date" class="form-control"  id="datestart" name="datestart" required="" value="<?php echo $suu->datestart; ?>" readonly>
							</div>
						</div>
						<div class="col-xs-3">
							<div class="form-group">
								<label>ถึงวันที่</label>
								<input type="date" class="form-control"  id="datestop" name="datestop" value="<?php echo $suu->datestop; ?>" readonly>
							</div>
						</div>
						<div class="col-xs-3">
							<div class="form-group">
								<label>เวลา</label>
								<input class="form-control" type="time" name="time" value="<?php echo $suu->time; ?>" readonly>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-8">
							<div class="form-group">
								<label>หัวเรื่อง:</label>
								<input type="text" class="form-control"  id="heading" name="heading" required="" value="<?php echo $suu->heading; ?>" readonly>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label>รายละเอียด:</label>
								<textarea name="remarktime" class="form-control" readonly><?php echo $suu->remarktime; ?></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 text-right">
							<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
						</div>
					</div>
				<!-- </form> -->
			</div>
			<div class="modal-footer">
				
			</div>
		</div>
	</div>
</div>
<?php } ?>


