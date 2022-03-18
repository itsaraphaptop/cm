<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="author" content="Itsaraphap Thanatka">
    <title>Reset Password</title>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
     <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
</head>
<style>

</style>
<body>
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
                        <form id="postemail" class="form" action="<?php echo base_url() ?>index.php/auth/sendemail" method="POST">
                            <h1 class="form-signin-heading text-center" style="color: black;">Recover Password</h1>
                            <br>
                            <label for="inputEmail" class="sr-only">Username</label>
                            <input type="email" id="inputEmail" class="form-control" placeholder="Your Email" name="forgetemail" required autofocus>
                            <br>
                            <button class="btn btn-lg btn-success btn-block" id="sendmail" type="button">Recover Password</button>
                        </form>
                        <br>
                        <div class="text-size-mini text-primary text-center"><a href="<?php echo base_url(); ?>" >Return to Login</a></div>
                </div>
            </div>
        </div>


    </div>
</div>
<script>
$("#sendmail").on('click',function(){
    var frm = $('#postemail');
    frm.submit(function(ev) {
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function(data) {
                alert(data);
                // console.log(data);
            }
        });
        ev.preventDefault();

    });
    $("#postemail").submit();
});
</script>
</body>
</html>