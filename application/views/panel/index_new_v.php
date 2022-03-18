<style>
    .cont {
        padding: 00px 0px 100px 0px;
    }

    .heading-thumbnails>li {
        position: relative;
        display: inline-block;
        font-size: 13px;
    }

    .heading-thumbnails>li img {
        height: auto;
        max-height: 36px;
        max-width: 100%;
        border-radius: 100px;
    }

    .heading-thumbnails>li .status-mark {
        position: absolute;
        top: 0;
        right: 0;
        box-shadow: 0 0 0 2px #fcfcfc;
    }

    .panel-footer-transparent {
        background-color: transparent;
        border-top: 0;
        padding-top: 0;
        padding-bottom: 50px;
    }

    .cc {
        background: url('<?php echo base_url(); ?>dist/module/CC.svg') no-repeat right;
    }

    .pr {
        background: url('<?php echo base_url(); ?>dist/module/pr.svg') no-repeat right;
    }

    .po {
        background: url('<?php echo base_url(); ?>dist/module/po.svg') no-repeat right;
    }

    .wo {
        background: url('<?php echo base_url(); ?>dist/module/wo.svg') no-repeat right;
    }
    .ic {
        background: url('<?php echo base_url(); ?>dist/module/ic.svg') no-repeat right;
    }

    .fah {
        background: url('<?php echo base_url(); ?>dist/module/fa.svg') no-repeat right;
    }

    .ap {
        background: url('<?php echo base_url(); ?>dist/module/ap.svg') no-repeat right;
    }

    .ar {
        background: url('<?php echo base_url(); ?>dist/module/ar.svg') no-repeat right;
    }

    .gl {
        background: url('<?php echo base_url(); ?>dist/module/gl.svg') no-repeat right;
    }

    .pm {
        background: url('<?php echo base_url(); ?>dist/module/pm.svg') no-repeat right;
    }
    .pg {
        background: url('<?php echo base_url(); ?>dist/module/pg.svg') no-repeat right;
    }
</style>
<div class="container cont">
        <h6><?php echo $companyname;?></h6>
    <?php foreach ($permission as $key => $value) {
     $ref_module = $value->ref_module_id;
     $read = $value->read;
    ?>
    <?php if($ref_module==2){?>
    <?php if($read==1){?>
    <div class="col-md-4">
        <a href="<?php echo base_url();?>bd/main_index">
            <div class="panel panel-flat border-blue-300 cc">
                <div class="panel-heading">
                    <h6 class="panel-title" data-i18n="nav.dash.ccmenu">Cost Control</h6>
                </div>
                <div class="panel-body">
                </div>
            </div>
        </a>
    </div>
    <?php } ?>
    <?php } ?>
    <?php if($ref_module==3){?>
    <?php if($read==1){?>
    <div class="col-md-4">
        <a href="<?php echo base_url(); ?>office/main_index">
            <div class="panel panel-flat border-green-300 pr">
                <div class="panel-heading">
                    <h6 class="panel-title" data-i18n="nav.dash.ofmenu">Purchase Requisition</h6>
                </div>

                <div class="panel-body">
                    <!-- Transparent panel footer -->
                </div>

                <!-- <div class="panel-footer panel-footer-transparent"><a class="heading-elements-toggle"><i class="icon-more"></i></a>
			<div class="heading-elements">
				<span class="heading-text text-semibold">Users online:</span>
				<ul class="heading-thumbnails pull-right">
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-blue"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-grey-300"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-warning"></span>
					</li>
				</ul>
			</div>
		</div> -->
            </div>
        </a>
    </div>
    <?php } ?>
    <?php } ?>
    <?php if($ref_module==4){?>
    <?php if($read==1){?>
    <div class="col-md-4">
        <a href="<?php echo base_url();?>purchase/main_index">
            <div class="panel panel-flat border-violet-300 po">
                <div class="panel-heading">
                    <h6 class="panel-title" data-i18n="nav.dash.pomenu">Purchase Order</h6>
                </div>

                <div class="panel-body">
                    <!-- Transparent panel footer -->
                </div>

                <!-- <div class="panel-footer panel-footer-transparent"><a class="heading-elements-toggle"><i class="icon-more"></i></a>
			<div class="heading-elements">
				<span class="heading-text text-semibold">Users online:</span>
				<ul class="heading-thumbnails pull-right">
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-blue"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-grey-300"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-warning"></span>
					</li>
				</ul>
			</div>
		</div> -->
            </div>
        </a>
    </div>
    <?php } ?>
    <?php } ?>
    
    <?php if($ref_module==9){?>
    <?php if($read==1){?>
    <div class="col-md-4">
        <a href="<?php echo base_url();?>inventory/main_index">
            <div class="panel panel-flat border-pink-300 ic">
                <div class="panel-heading">
                    <h6 class="panel-title" data-i18n="nav.dash.icmenu">Inventory Management</h6>
                </div>

                <div class="panel-body">
                    <!-- Transparent panel footer -->
                </div>

                <!-- <div class="panel-footer panel-footer-transparent"><a class="heading-elements-toggle"><i class="icon-more"></i></a>
			<div class="heading-elements">
				<span class="heading-text text-semibold">Users online:</span>
				<ul class="heading-thumbnails pull-right">
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-blue"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-grey-300"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-warning"></span>
					</li>
				</ul>
			</div>
		</div> -->
            </div>
        </a>
    </div>
    <?php } ?>
    <?php } ?>
    <?php if($ref_module==10){?>
    <?php if($read==1){?>
    <div class="col-md-4">
        <a href="<?php echo base_url();?>add_asset/main_index">
            <div class="panel panel-flat border-purple-300 fah">
                <div class="panel-heading">
                    <h6 class="panel-title" data-i18n="nav.dash.famenu">Asset Registration</h6>
                </div>

                <div class="panel-body">
                    <!-- Transparent panel footer -->
                </div>

                <!-- <div class="panel-footer panel-footer-transparent"><a class="heading-elements-toggle"><i class="icon-more"></i></a>
			<div class="heading-elements">
				<span class="heading-text text-semibold">Users online:</span>
				<ul class="heading-thumbnails pull-right">
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-blue"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-grey-300"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-warning"></span>
					</li>
				</ul>
			</div>
		</div> -->
            </div>
        </a>
    </div>
    <?php } ?>
    <?php } ?>
    <?php if($ref_module==11){?>
    <?php if($read==1){?>
    <div class="col-md-4">
        <a href="<?php echo base_url();?>ap/main_index">
            <div class="panel panel-flat border-indigo-300 ap">
                <div class="panel-heading">
                    <h6 class="panel-title" data-i18n="nav.dash.apmenu">Account Payable</h6>
                </div>

                <div class="panel-body">
                    <!-- Transparent panel footer -->
                </div>

                <!-- <div class="panel-footer panel-footer-transparent"><a class="heading-elements-toggle"><i class="icon-more"></i></a>
			<div class="heading-elements">
				<span class="heading-text text-semibold">Users online:</span>
				<ul class="heading-thumbnails pull-right">
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-blue"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-grey-300"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-warning"></span>
					</li>
				</ul>
			</div>
		</div> -->
            </div>
        </a>
    </div>
    <?php } ?>
    <?php } ?>
    <?php if($ref_module==12){?>
    <?php if($read==1){?>
    <div class="col-md-4">
        <a href="<?php echo base_url();?>ar/main_index">
            <div class="panel panel-flat border-teal-300 ar">
                <div class="panel-heading">
                    <h6 class="panel-title" data-i18n="nav.dash.armenu">Account Receivable</h6>
                </div>

                <div class="panel-body">
                    <!-- Transparent panel footer -->
                </div>

                <!-- <div class="panel-footer panel-footer-transparent"><a class="heading-elements-toggle"><i class="icon-more"></i></a>
			<div class="heading-elements">
				<span class="heading-text text-semibold">Users online:</span>
				<ul class="heading-thumbnails pull-right">
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-blue"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-grey-300"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-warning"></span>
					</li>
				</ul>
			</div>
		</div> -->
            </div>
        </a>
    </div>
    <?php } ?>
    <?php } ?>
    <?php if($ref_module==14){?>
    <?php if($read==1){?>
    <div class="col-md-4">
        <a href="<?php echo base_url();?>gl/main_index">
            <div class="panel panel-flat border-orange-300 gl">
                <div class="panel-heading">
                    <h6 class="panel-title" data-i18n="nav.dash.glmenu">General Vouncher</h6>
                </div>

                <div class="panel-body">
                    <!-- Transparent panel footer -->
                </div>

                <!-- <div class="panel-footer panel-footer-transparent"><a class="heading-elements-toggle"><i class="icon-more"></i></a>
			<div class="heading-elements">
				<span class="heading-text text-semibold">Users online:</span>
				<ul class="heading-thumbnails pull-right">
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-blue"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-grey-300"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-warning"></span>
					</li>
				</ul>
			</div>
		</div> -->
            </div>
        </a>
    </div>
    <?php } ?>
    <?php } ?>
    <?php if($ref_module==15){?>
    <?php if($read==1){?>
    <div class="col-md-4">
        <a href="<?php echo base_url();?>management/project_status_overview">
            <div class="panel panel-flat border-slate-300 cc">
                <div class="panel-heading">
                    <h6 class="panel-title" data-i18n="nav.dash.pmmenu">Construction Management</h6>
                </div>

                <div class="panel-body">
                    <!-- Transparent panel footer -->
                </div>

                <!-- <div class="panel-footer panel-footer-transparent"><a class="heading-elements-toggle"><i class="icon-more"></i></a>
			<div class="heading-elements">
				<span class="heading-text text-semibold">Users online:</span>
				<ul class="heading-thumbnails pull-right">
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-blue"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-grey-300"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-warning"></span>
					</li>
				</ul>
			</div>
		</div> -->
            </div>
        </a>
    </div>
    <?php } ?>
    <?php } ?>
    <?php if($ref_module==8){?>
    <?php if($read==1){?>
    <div class="col-md-4">
        <a href="<?php echo base_url();?>management/dash_projprogre">
            <div class="panel panel-flat border-grey-800 pr">
                <div class="panel-heading">
                    <h6 class="panel-title" data-i18n="nav.dash.pprogress">Project Progress </h6>
                </div>

                <div class="panel-body">
                    <!-- Transparent panel footer -->
                </div>

                <!-- <div class="panel-footer panel-footer-transparent"><a class="heading-elements-toggle"><i class="icon-more"></i></a>
			<div class="heading-elements">
				<span class="heading-text text-semibold">Users online:</span>
				<ul class="heading-thumbnails pull-right">
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-blue"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-grey-300"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-warning"></span>
					</li>
				</ul>
			</div>
		</div> -->
            </div>
        </a>
    </div>
    <?php } ?>
    <?php } ?>
    <?php if($ref_module==1){?>
    <?php if($read==1){?>
    <div class="col-md-4">
        <a href="<?php echo base_url();?>data_master/main_index">
            <div class="panel panel-flat border-warning-300 fah">
                <div class="panel-heading">
                    <h6 class="panel-title" data-i18n="nav.dash.msmenu">Master Configuration </h6>
                </div>

                <div class="panel-body">
                    <!-- Transparent panel footer -->
                </div>

                <!-- <div class="panel-footer panel-footer-transparent"><a class="heading-elements-toggle"><i class="icon-more"></i></a>
			<div class="heading-elements">
				<span class="heading-text text-semibold">Users online:</span>
				<ul class="heading-thumbnails pull-right">
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-blue"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-grey-300"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-warning"></span>
					</li>
				</ul>
			</div>
		</div> -->
            </div>
        </a>
    </div>
    <?php } ?>
    <?php } ?>
    <?php if($ref_module==6){?>
    <?php if($read==1){?>
    <div class="col-md-4">
        <a href="<?php echo base_url();?>management/dash_projprogre/subproject">
            <div class="panel panel-flat border-warning-300 fah">
                <div class="panel-heading">
                    <h6 class="panel-title" data-i18n="nav.dash.scmenu">Subcontractor Management </h6>
                </div>

                <div class="panel-body">
                    <!-- Transparent panel footer -->
                </div>

                <!-- <div class="panel-footer panel-footer-transparent"><a class="heading-elements-toggle"><i class="icon-more"></i></a>
			<div class="heading-elements">
				<span class="heading-text text-semibold">Users online:</span>
				<ul class="heading-thumbnails pull-right">
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-blue"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-grey-300"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-warning"></span>
					</li>
				</ul>
			</div>
		</div> -->
            </div>
        </a>
    </div>
    <?php } ?>
    <?php } ?>
    <?php if($ref_module==7){?>
    <?php if($read==1){?>
    <div class="col-md-4">
        <a href="<?php echo base_url();?>office/main_index_pc">
            <div class="panel panel-flat border-warning-300 po">
                <div class="panel-heading">
                    <h6 class="panel-title" data-i18n="nav.dash.pcmenu">PettyCash Management </h6>
                </div>

                <div class="panel-body">
                    <!-- Transparent panel footer -->
                </div>

                <!-- <div class="panel-footer panel-footer-transparent"><a class="heading-elements-toggle"><i class="icon-more"></i></a>
			<div class="heading-elements">
				<span class="heading-text text-semibold">Users online:</span>
				<ul class="heading-thumbnails pull-right">
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-blue"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-grey-300"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-warning"></span>
					</li>
				</ul>
			</div>
		</div> -->
            </div>
        </a>
    </div>
    <?php } ?>
    <?php } ?>
    <?php if($ref_module==13){?>
    <?php if($read==1){?>
    <div class="col-md-4">
        <a href="<?php echo base_url();?>finance/main_index">
            <div class="panel panel-flat border-warning-300 pr">
                <div class="panel-heading">
                    <h6 class="panel-title" data-i18n="nav.dash.fnmenu">Financial Management </h6>
                </div>

                <div class="panel-body">
                    <!-- Transparent panel footer -->
                </div>

                <!-- <div class="panel-footer panel-footer-transparent"><a class="heading-elements-toggle"><i class="icon-more"></i></a>
			<div class="heading-elements">
				<span class="heading-text text-semibold">Users online:</span>
				<ul class="heading-thumbnails pull-right">
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-blue"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-grey-300"></span>
					</li>
					<li>
						<img src="../assets/images/placeholder.jpg" alt="">
						<span class="status-mark border-warning"></span>
					</li>
				</ul>
			</div>
		</div> -->
            </div>
        </a>
    </div>
    <?php } ?>
    <?php } ?>
    <?php } ?>
</div>