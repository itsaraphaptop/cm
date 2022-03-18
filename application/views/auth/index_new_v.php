<style>

    video#bgvid { 
    position: fixed;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -100;
    -webkit-transform: translateX(-50%) translateY(-50%);
    transform: translateX(-50%) translateY(-50%);
    background: url(<?php echo base_url();?>comp/logo1.png) no-repeat;
    background-size: cover; 
}
video#bgvid {
    transition: 1s opacity;
}
.stopfade { opacity: .5; }
#{
    padding-top: 20px;
}
@media screen and (max-device-width: 800px) {
    html {
         background: url(<?php echo base_url();?>comp/logo1.png) #000 no-repeat center center fixed;
    }
    #bgvid {
        display: none;
    }
}


#sidebar-wrapper {
    z-index: 1000;
    position: absolute;
    /*left: 250px;*/

    height: 100%;
    margin-right: 1000px;
    overflow-y: auto;
    background: #fff;
 
}    

.footer-bottom {
 background:#d8d8d8;
 padding:15px 0;
 border-top:1px solid #d9d9d9;
 font-size:11px;
 color:#777;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<div id="show_user"></div>
<div class="navbar navbar navbar-default navbar-fixed-top" >
    <div class="navbar-header">
        
    </div>
    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="user_online">
                        <i class="icon-user-tie"></i>
                        
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li></li>
                        <li></li>
                        
                    </ul>
                </li>
            
        </ul>
    </div>
</div>
<div class="sidebar sidebar-main" id="sidebar-wrapper">
    <div class="sidebar-content">
        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div style="margin:20px auto;">
                    <div style="margin-left:20px; padding-top: 20px;">
                        <img src="<?php echo base_url();?>comp/comp_2017-03-07_4184.png" class="logo img-responsive">
                    </div>
                    
                    <div style="margin-top:20px; margin-left:10px; margin-right:10px;">
                        <hr>
                        <form class="form" action="<?php echo base_url() ?>index.php/auth/login" method="POST">
                            <h3 class="form-signin-heading" style="color: black;">SourceWork ERP</h3>
                            <br>
                            <div class="form-group">
                                <select class="form-control" name="compcode" data-style="bg-slate" onchange="logoComp($(this))">
                                    <?php foreach ($company as $value) {?>
                                    <option value="<?php echo $value->compcode; ?>" logo_comp="<?=$value->comp_img;?>" data-iconurl="<?php echo base_url(); ?>comp/<?php echo $value->comp_img; ?>">
                                        <?php echo $value->company_name; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <label for="inputEmail" class="sr-only">Username</label>
                            <input type="text" id="inputEmail" class="form-control text-center" placeholder="Username" name="username" required autofocus>
                            <br>
                            
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" id="inputPassword" class="form-control  text-center" placeholder="Password" name="password" required>
                            <div class="checkbox ">
                                <label>
                                    <input type="checkbox" value="remember-me"> <b style="color: black;">Remember me</b>
                                </label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                        </form>
                        <br>
                        <a href="<?php echo base_url() ?>forget_password" style="color: black;">Forget Password ?</a>
                        
                        
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







<video autoplay loop controls muted poster="<?php echo base_url();?>dist/img/logo.jpg" id="bgvid">
   
    <source src="<?php echo base_url();?>dist/img/mm.mp4" type="video/mp4">
</video>

<script type="text/javascript">
    
    function logoComp(el) {
        // console.log($('option:selected', this).attr('logo_comp'););
        var logo = $('option:selected').attr('logo_comp');
        $('.logo').attr('src', '<?php echo base_url();?>comp/'+logo);
        // console.log(el.val());
    }
    var w = $('html').width();
    // alert(w);
    if (w <= 768 ) {
        window.location = "<?=base_url(); ?>auth/login_m";
    }
    $('.user_online').click(function(event) {
        $("#show_user").html('<div class="loading">Loading&#8230;</div>');
        $.post('<?php echo base_url(); ?>auth/user_online_index', function(data) {
        }).done(function(data){
            $('#show_user').html(data);
            $("#modal_users").modal('show');
        });
    });
</script>
