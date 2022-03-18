<!DOCTYPE html>
<html lang="en">
<head>
 <link href='https://fonts.googleapis.com/css?family=Itim&subset=thai,latin' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
	<link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/pnotify.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
	<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/components_notifications_pnotify.js"></script> -->

	<meta charset="UTF-8">
	<title>test Loop</title>
</head>
<body>
	<div class="container-fluid">
		<div class="col-md-4">
			<div class="row" style="margin-top:20px;">
				<div class="input-group">
					<input type="text" class="form-control input-sm" id="txtname" name="txtname">
					<div class="input-group-btn">
						<button type="button" class="get btn btn-primary btn-sm" id="pnotify-dynamic">Get Loop!!</button>
					</div>
				</div>
			</div>
			<div class="row">
				<h1 id="h"></h1>
			</div>
		</div>
	</div>
	<script>
		// $(".get").click(function(event) {
		 
		// });

		$('#pnotify-dynamic').on('click', function () {
			$("#h").html("");
        var percent = 0;
        var notice = new PNotify({
            text: "Please wait",
            addclass: 'bg-primary',
            type: 'info',
            icon: 'icon-spinner4 spinner',
            hide: false,
            buttons: {
                closer: false,
                sticker: false
            },
            opacity: .9,
            width: "170px"
        });

        setTimeout(function() {
        notice.update({
            title: false
        });
        var interval = setInterval(function() {
            percent += 2;
            var options = {
                text: percent + "% complete."
            };
            if (percent == 80) options.title = "Almost There";
            if (percent >= 100) {
                window.clearInterval(interval);
                options.title = "Done!";
                options.addclass = "bg-success";
                options.type = "success";
                options.hide = true;
                options.buttons = {
                    closer: true,
                    sticker: true
                };
                options.icon = 'icon-check';
                options.opacity = 1;
                options.width = PNotify.prototype.options.width;
                 var url="<?php echo base_url(); ?>test/getmemberloop";
	      var dataSet={
	         num : $("#txtname").val(),
	        };
	      $.post(url,dataSet,function(data){
	        $("#h").html(data);
	      });
            }

            notice.update(options);

            }, 120);
        }, 2000);

    });
	</script>
</body>
</html>