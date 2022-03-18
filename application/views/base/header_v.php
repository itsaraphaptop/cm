<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Itsaraphap Thanatka">
    <title>Master Business Intelligence</title>

    <!-- Global stylesheets -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Itim&subset=thai,latin' rel='stylesheet' type='text/css'> -->
    <link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/user.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js">
    </script>

    <!-- /core JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/internationalization/i18next.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/prism.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/internationalization_switch_direct.js">
    </script>
    <!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/visualization/d3/d3.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/visualization/d3/d3_tooltip.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/switchery.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js">
    </script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery_ui/full.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/moment/moment.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery_ui/core.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/mark.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/dashboard.js">
    </script>


    <!-- /theme JS files -->
    <!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/jgrowl.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/anytime.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/bootstrap_multiselect.js">
    </script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/picker.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/picker.date.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/picker.time.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/legacy.js">
    </script>

    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/picker_date.js"></script> -->

    <!-- /theme JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/validation/validate.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/bootstrap_multiselect.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/touchspin.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/switch.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/switchery.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js">
    </script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_validation.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/pnotify.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/noty.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/jgrowl.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/components_notifications_other.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/prism.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/extension_blockui.js">
    </script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/extensions/buttons.min.js">
    </script>
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_basic.js"></script> -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_extension_buttons_flash.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/fullcalendar/fullcalendar.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/fullcalendar/lang/all.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/bootbox.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/sweet_alert.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/selectboxit.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_selectbox.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/prism.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/switch.min.js">
    </script>

    <!-- Theme JS files -->

    <!-- /theme JS files -->

    <!-- /theme JS files -->
    <style type="text/css">
        .modal {
            overflow-y: auto;
        }
    </style>

</head>

<body class="navbar-top  pace-done sidebar-secondary-hidden" data-pinterest-extension-installed="cr1.39.1">
    <!-- <script>
	$(document).ready(function() {$('#divpic').prop('disabled', true);});
</script> -->