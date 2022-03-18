<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="author" content="Itsaraphap Thanatka">
    <title>
        NinjaERP Business Intelligence || ERP
    </title>
    <link rel="icon" href="<?= base_url() ?>comp/iconm.png" type="image/gif" sizes="24x24">
    <link href="https://fonts.googleapis.com/css?family=Prompt:400,700" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js">
    </script>
</head>
<style>
    body {
		font-family: 'Prompt', sans-serif;
    }
    .bgcus{
        <?php if ($bgimg[0]['background_login']=="") {?>
           
        background: #f1f1f1 url(<?php echo base_url();?>assets/images/backgrounds/mature.jpg) repeat 90%;
        <?php }else{ ?>

        background-image: url('<?php echo base_url();?>profile/<?=$bgimg[0]['background_login'];?>');
        <?php } ?>
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
        -o-background-size: 100% 100%, auto;
        -moz-background-size: 100% 100%, auto;
        -webkit-background-size: 100% 100%, auto;
        background-size: 100% 100%, auto;
        height: 100%;
    }
</style>

<body class="bgcus">

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                    aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">ERP
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">User Online</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="sidebar sidebar-main shadow" id="sidebar-wrapper-right">
        <div class="sidebar-content">
            <!-- User menu -->
            <div class="sidebar-user">
                <div class="category-content">
                    <div>
                        <!-- <div>
                        <img src="<?php echo base_url();?>comp/comp_2017-03-07_4184.png" class="logo img-responsive">
					</div> -->

                        <!-- <hr> -->
                        <form class="form" action="<?php echo base_url() ?>auth/companylist" method="POST">
                            <h1 class="form-signin-heading" style="color: black;">Login</h1>
                            <br>
                            <div class="form-group">
                                <!-- <select class="form-control" name="compcode" data-style="bg-slate" onchange="logoComp($(this))">
                                    <?php foreach ($company as $value) {?>
                                    <option value="<?php echo $value->compcode; ?>" logo_comp="<?=$value->comp_img;?>"
                                        data-iconurl="<?php echo base_url(); ?>comp/<?php echo $value->comp_img; ?>">
                                        <?php echo $value->company_name; ?>
                                    </option>
                                    <?php } ?>
                                </select> -->
                            </div>
                            <label for="inputEmail" class="sr-only">Username</label>
                            <input type="text" id="inputEmail" class="form-control" placeholder="Username" name="username"
                                required autofocus>
                            <br>
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password"
                                required>
                            <br>
                            <input type="hidden" name="lati" id="lati">
                            <input type="hidden" name="long" id="long">
                            <div class="checkbox ">
                                <!--  <label>
                                    <input type="checkbox" value="remember-me"> <b style="color: black;">Remember me</b>
                                </label> -->
                            </div>
                            <button class="btn btn-lg btn-success btn-block" type="submit">Login</button>

                        </form>
                        <br>
                        <div class="text-size-mini text-primary text-center">
                            <a href="<?php echo base_url() ?>forget_password">Forget Password ?</a>
                            <!-- <button onclick="getLocation()">try it</button>
                            <p id="demo"></p> -->
                        </div>
                    </div>
                </div>
            </div>


            <!-- /user menu -->
            <!-- Main navigation -->
            <div class="sidebar-category sidebar-category-visible">
                <div class="category-content no-padding">
                </div>
            </div>

            <!-- /main navigation -->
        </div>
    </div>

    <script type="text/javascript">
        function logoComp(el) {
            // console.log($('option:selected', this).attr('logo_comp'););
            var logo = $('option:selected').attr('logo_comp');
            $('.logo').attr('src', '<?php echo base_url();?>comp/' + logo);
            // console.log(el.val());
        }
        var w = $('html').width();
        // alert(w);
       
        $('.user_online').click(function(event) {
            $("#show_user").html('<div class="loading">Loading&#8230;</div>');
            $.post('<?php echo base_url(); ?>auth/user_online_index', function(data) {})
                .done(function(data) {
                    $('#show_user').html(data);
                    $("#modal_users").modal('show');
                });
        });
        // $(document).ready(function() {
            getLocation();
            // console.log(getLocation());
        // });

        var x = document.getElementById("demo");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not Supported By this Browser";
            }
        }

        function showPosition(position) {
            // x.innerHTML = "Latitude:" + position.coords.latitude + "<bt/>Longitude:" + position.coords.longitude;
            $("#lati").val(position.coords.latitude);
            $("#long").val(position.coords.longitude);
        }
    </script>
</body>

</html>