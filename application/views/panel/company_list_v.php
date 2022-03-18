<!-- 
<div class="container text-center">
    <?php foreach ($company as $key => $value) {?>
    <a href="<?php echo base_url();?>auth/login/<?php echo $username;?>/<?= $value->compcode;?>">
        <img src="<?php echo base_url();?>comp/<?= $value->comp_img;?>" class="img-rounded img-xl" alt="">
    </a>
    <?php } ?>
</div> -->
<style>
.font-size-xs {
    font-size: .9875rem;
}
</style>
 <?php foreach ($company as $key => $value) {?>
 <div class="col-md-3">
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-10">
                <div class="thumbnail no-padding">
                    <div class="thumb">
                        <?php if($value->comp_img==""){ ?>
                            <a href="<?php echo base_url();?>auth/login/<?php echo $username;?>/<?= $value->compcode;?>"> <img src="<?php echo base_url();?>comp/company.jpg" alt=""></a>
                        <?php }else{ ?>
                            <a href="<?php echo base_url();?>auth/login/<?php echo $username;?>/<?= $value->compcode;?>"><img src="<?php echo base_url();?>comp/<?= $value->comp_img;?>" alt=""></a>

                        <?php } ?>
                        
                       
                    </div>
                
                    <div class="caption text-center">
                        <span class="font-size-xs"><?= $value->company_name;?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php } ?>