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

    i#icon_footer {
        text-align: center;
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
        <div class="navbar-left col-lg-1 col-md-1">
            <ul class="nav navbar-nav">
                <li>
                    <a onclick="myCalculator()">
                        <img src="<?php echo base_url(); ?>icon_cm/footer.png">
                        <!-- <i class="icon-calculator text-primary"></i> -->
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-lg-offset-5 col-lg-2 col-md-offset-5 col-md-2">
            <a id="show_footer"><i id="icon_footer" class="icon-arrow-up12"></i></a>
        </div>

        <div class="navbar-right">
            <ul class="nav navbar-nav">

                <li class="dropdown language-switch des_show">
                    <a class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>

                    <ul class="dropdown-menu">
                        <!-- <li><a class="lao"><img src="<?php echo base_url(); ?>assets/images/flags/la.png" alt=""> LA -
                                Laos (ລາວ)</a></li> -->
                        <li><a class="thai"><img src="<?php echo base_url(); ?>assets/images/flags/th.png" alt=""> TH -
                                Thai (ไทย)</a></li>
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

                <br /><br /><br />

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
                <a href="#">
                    <div class="col-lg-2 col-md-2">
                        <img src="<?php echo base_url(); ?>icon_cm/customer-service.png" style="width:32x; height: 32px;">
                    </div>
                    <div class="col-lg-10 col-md-10">
                        <b style="color: #FFFFF;">Master Ticket</b><br>แจ้งปัญา/บันทึกปัญหา
                    </div>
                </a>
            </div>
            <div class="col-lg-15 col-sm-15">

            </div>
            <div class="col-lg-15 col-sm-15">

            </div>
            <div class="col-lg-15 col-sm-15">
                <div class="text-left">
                    <div>
                        <label>About Master</label>
                    </div>
                    <div>
                        <label>Master News</label>
                    </div>
                    <div>
                        <label>Master Team</label>
                    </div>

                    <div>
                        <a href="<?php echo base_url(); ?>history_update">History Update Logs</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                <label style="font-size: 10px;">Copyright  NinjaERP Business Intelligence © 2018</label>
            </div>
        </div>
    </section>


</div>

<div class="modal fade" id="MyContact" data-backdrop="false">
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



<div class="modal fade" id="MyChat" data-backdrop="false">
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

<script type="text/javascript">
    var chk = false;
    $('#show_footer').click(function(event) {
        if (chk) {
            // $('#nav_footer').css('z-index', '1030');
            $("#footer").toggle();
            $("#icon_footer").attr('class', 'icon-arrow-up12');
            chk = false;
        } else {
            // $('#nav_footer').css('z-index', '1033');
            $("#footer").toggle();
            $("#icon_footer").attr('class', 'icon-arrow-down12');
            chk = true;
        }

    });
</script>






<script>
    function myCalculator() {
        var myWindow = window.open("<?php echo base_url(); ?>calculator", "", "width=534,height=465.5");
    }


    //shot key command
    $(function() {
        $(window).bind('keydown', function(event) {
            if (event.ctrlKey || event.metaKey) {
                switch (String.fromCharCode(event.which).toLowerCase()) {
                    case 's':
                        // event Ctrl+s
                        if (UID == "" || UID == null) {
                            // alert(UID);
                        } else {
                            event.preventDefault();
                            save_file(UID, document_name);
                            // alert("else");
                        }
                        break;
                    case 'g':
                        event.preventDefault();
                        myCalculator();
                        break;
                }
            }
        });
    });
    //shot key command

   $(function() {
    // Idle timeout
        $.sessionTimeout({
            heading: "h5",
            title: "Session Timeout",
            message: "Your session is about to expire. Do you want to stay connected?",
            warnAfter: 4000000, // (1.40 minutes)
            redirAfter: 6000000, // ((1.40 hours))
            keepAliveUrl: "/",
            redirUrl: "<?php echo base_url(); ?>auth/logout",
            logoutUrl: "<?php echo base_url(); ?>auth/logout"
        });
    });


    /* ------------------------------------------------------------------------------
*
*  # Change language without page reload
*
*  Specific JS code additions for internationalization_switch_direct.html page
*
*  Version: 1.0
*  Latest update: Aug 1, 2015
*
* ---------------------------------------------------------------------------- */

$(function() {
	// Configuration
	// -------------------------

	// Add options
	i18n.init(
		{
            resGetPath: '<?php echo base_url();?>assets/locales/__lng__.json',
			debug: true,
			fallbackLng: false,
			load: 'unspecific'
		},
		function() {
			$('body').i18n(); // Init
		}
	);

	// Change languages in dropdown
	// -------------------------

	// English
	if (i18n.lng() === 'en') {
		// Set active class
		$('.english').parent().addClass('active');

		// Change language in dropdown
		$('.language-switch')
			.children('.dropdown-toggle')
			.html($('.language-switch').find('.english').html() + ' <i class="caret" />')
			.children('img')
			.addClass('position-left');
	}
	
	// thai
	if (i18n.lng() === 'th') {
		// Set active class
		$('.thai').parent().addClass('active');

		// Change language in dropdown
		$('.language-switch')
			.children('.dropdown-toggle')
			.html($('.language-switch').find('.thai').html() + ' <i class="caret" />')
			.children('img')
			.addClass('position-left');
	}
	// lao
	if (i18n.lng() === 'la') {
		// Set active class
		$('.lao').parent().addClass('active');

		// Change language in dropdown
		$('.language-switch')
			.children('.dropdown-toggle')
			.html($('.language-switch').find('.lao').html() + ' <i class="caret" />')
			.children('img')
			.addClass('position-left');
	}

	// Change languages in navbar
	// -------------------------

	// Define switcher container
	var switchContainer = $('.language-switch');

	// English
	$('.english').on('click', function() {
		// Set language
		$.i18n.setLng('en', function() {
			$('body').i18n();
		});

		// Change lang in dropdown
		switchContainer
			.children('.dropdown-toggle')
			.html($('.english').html() + ' <i class="caret" />')
			.children('img')
			.addClass('position-left');

		// Set active class
		switchContainer.find('li').removeClass('active');
		$('.english').parent().addClass('active');
	});

	// thai

	$('.thai').on('click', function() {
		// Set language
		$.i18n.setLng('th', function() {
			$('body').i18n();
		});

		// Change lang in dropdown
		switchContainer
			.children('.dropdown-toggle')
			.html($('.thai').html() + ' <i class="caret" />')
			.children('img')
			.addClass('position-left');

		// Set active class
		switchContainer.find('li').removeClass('active');
		$('.thai').parent().addClass('active');
	});
	// LAO

	$('.lao').on('click', function() {
		// Set language
		$.i18n.setLng('la', function() {
			$('body').i18n();
		});

		// Change lang in dropdown
		switchContainer
			.children('.dropdown-toggle')
			.html($('.lao').html() + ' <i class="caret" />')
			.children('img')
			.addClass('position-left');

		// Set active class
		switchContainer.find('li').removeClass('active');
		$('.lao').parent().addClass('active');
	});
});

</script>

</body>

</html>