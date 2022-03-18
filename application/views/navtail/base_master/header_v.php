<!DOCTYPE html>
<html lang="en">

<head>
    <style type="text/css">
        .modal {
            overflow-y: auto;
        }

        /*	::-webkit-scrollbar {
	    width: 0.5em;
	    height: 0.5em
	}*/
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="License Itsaraphap Thanatka Only">
    <title data-i18n="app.name">NinjaERP Business Intelligence</title>
    <link rel="icon" href="<?=base_url()?>comp/iconm.png" type="image/gif" sizes="24x24">
    <!-- Global stylesheets -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Itim&subset=thai,latin' rel='stylesheet' type='text/css'> -->
    <link href="https://fonts.googleapis.com/css?family=Prompt:400,700" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/user.css" rel="stylesheet" type="text/css">
    <!-- <link href="<?php echo base_url(); ?>assets/lib/styles/kendo.common.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/lib/styles/kendo.bootstrap.min.css" rel="stylesheet" type="text/css"> -->
    <link href="<?php echo base_url(); ?>assets/css/loading.css" rel="stylesheet" type="text/css">

    <!-- /global stylesheets -->
  <link rel="stylesheet" href="<?php echo base_url();?>kendo/styles/kendo.common.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>kendo/styles/kendo.bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="<?php echo base_url();?>kendo/styles/kendo.bootstrap.mobile.min.css" /> -->


    <!-- Core JS files -->

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.number.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/my_function.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/lib/js/kendo.all.min.js">
    </script>
    <script src="<?php echo base_url();?>kendo/js/kendo.all.min.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/tables/handsontable/handsontable.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/handsontable@7.0.0/dist/handsontable.full.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/handsontable@latest/dist/handsontable.full.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://handsontable.com/static/css/main.css"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/handsontable@latest/dist/handsontable.full.min.js"></script> -->
    <!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/tables/handsontable/languages.js"></script> -->
    <script src="<?php echo base_url();?>dist/languages.min.js"></script>
    <!-- /core JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/internationalization/i18next.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/prism.min.js">
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

    <!--  -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/typeahead/handlebars.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/alpaca/alpaca.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/alpaca/price_format.min.js"></script>
    <!--  -->
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
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/nicescroll.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/layout_fixed_custom.js">
    </script>
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/dashboard.js"></script> -->
    

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
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/legacy.js"></script> -->

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
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/extensions/fixed_columns.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_extension_fixed_columns.js">
    </script>

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
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/prism.min.js">
    </script>
    <link href="<?=base_url()?>assets/css/summernote.css" rel="stylesheet">
    <script src="<?=base_url()?>assets/js/core/summernote.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/editor_summernote.js">
    </script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/extensions/session_timeout.min.js">
    </script>
    <!--  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/extra_idle_timeout.js">
    
    </script> -->
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_checkboxes_radios.js"></script> -->
     <!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/uploaders/fileinput/plugins/purify.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/uploaders/fileinput/fileinput.min.js"></script>

    <!-- <script src="<?php echo base_url();?>global_assets/js/demo_pages/alpaca_basic.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url();?>dist/Utils.js"></script>

    <!-- /theme JS files -->
</head>

<style>
    .modal {
        overflow-y: auto;
    }

    .navbar-top {
        padding-right: 0 !important
    }

    .tablew {
        width: 150%;
        max-width: 500%;
    }

    body {
        font-family: 'Prompt', sans-serif;
    }
</style>

<body class="navbar-top  pace-done sidebar-secondary" data-pinterest-extension-installed="cr1.39.1">