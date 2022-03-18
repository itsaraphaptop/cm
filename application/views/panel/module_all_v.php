
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-xl-12">
                <!--begin::Nav Panel Widget 1-->
                <div class="card card-custom gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                        <ul class="dashboard-tabs text-hover-primary nav nav-pills nav-danger row row-paddingless m-0 p-0 flex-column flex-sm-row" role="tablist">
                            <?php foreach ($permission as $num => $key ) {
                                if($key->module_id < 5){
                                if ($key->read == "1") {             
                                ?>
                                <li class="nav-item d-flex col-sm text-hover-primary flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                    <a class="nav-link text-hover-primary border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" href="<?php echo base_url();?><?php echo $key->href_control; ?>\<?php echo $key->module_id; ?>">
                                        <span class="nav-icon py-2 w-auto">
                                            <div class="symbol symbol-lg-90">
                                                <img src="<?php echo base_url();?><?php echo $key->img; ?>" class="h-90 align-self-end" alt=""> 
                                            </div>
                                        </span>
                                        <span class="nav-text text-hover-primary font-size-lg py-2 font-weight-bold text-center"><?php echo $key->module_name; ?></span>
                                    </a>
                                </li>
                            <?php  } } }?>
                        </ul>
                        <br/>
                        <ul class="dashboard-tabs text-hover-primary nav nav-pills nav-danger row row-paddingless m-0 p-0 flex-column flex-sm-row" role="tablist">
                            <?php foreach ($permission as $num => $key ) {
                                if($key->module_id > 5 && $key->module_id < 10){
                                if ($key->read == "1") {             
                                ?>
                                <li class="nav-item d-flex col-sm text-hover-primary flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                    <a class="nav-link text-hover-primary border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" href="<?php echo base_url();?><?php echo $key->href_control; ?>\<?php echo $key->module_id; ?>">
                                        <span class="nav-icon py-2 w-auto">
                                            <div class="symbol symbol-lg-90">
                                                <img src="<?php echo base_url();?><?php echo $key->img; ?>" class="h-90 align-self-end" alt=""> 
                                            </div>
                                        </span>
                                        <span class="nav-text text-hover-primary font-size-lg py-2 font-weight-bold text-center"><?php echo $key->module_name; ?></span>
                                    </a>
                                </li>
                            <?php } }  }?>
                        </ul>
                        <br/>
                        <ul class="dashboard-tabs text-hover-primary nav nav-pills nav-danger row row-paddingless m-0 p-0 flex-column flex-sm-row" role="tablist">
                            <?php foreach ($permission as $num => $key ) {
                                if($key->module_id >= 10 && $key->module_id < 15){
                                if ($key->read == "1") {             
                                ?>
                                <li class="nav-item d-flex col-sm text-hover-primary flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                    <a class="nav-link text-hover-primary border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" href="<?php echo base_url();?><?php echo $key->href_control; ?>\<?php echo $key->module_id; ?>">
                                        <span class="nav-icon py-2 w-auto">
                                            <div class="symbol symbol-lg-90">
                                                <img src="<?php echo base_url();?><?php echo $key->img; ?>" class="h-90 align-self-end" alt=""> 
                                            </div>
                                        </span>
                                        <span class="nav-text text-hover-primary font-size-lg py-2 font-weight-bold text-center"><?php echo $key->module_name; ?></span>
                                    </a>
                                </li>
                            <?php } }  }?>
                        </ul>
                        <br/>
                        <ul class="dashboard-tabs text-hover-primary nav nav-pills nav-danger row row-paddingless m-0 p-0 flex-column flex-sm-row" role="tablist">
                            <?php foreach ($permission as $num => $key ) {
                                if($key->module_id >= 15){
                                if ($key->read == "1") {             
                                ?>
                                <li class="nav-item d-flex col-sm text-hover-primary flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                    <a class="nav-link text-hover-primary border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" href="<?php echo base_url();?><?php echo $key->href_control; ?>\<?php echo $key->module_id; ?>">
                                        <span class="nav-icon py-2 w-auto">
                                            <div class="symbol symbol-lg-90">
                                                <img src="<?php echo base_url();?><?php echo $key->img; ?>" class="h-90 align-self-end" alt=""> 
                                            </div>
                                        </span>
                                        <span class="nav-text text-hover-primary font-size-lg py-2 font-weight-bold text-center"><?php echo $key->module_name; ?></span>
                                    </a>
                                </li>
                            <?php } }  }?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-xl-4">
                <div class="card card-custom card-stretch gutter-b">
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-column pt-4 h-100">
                            <div class="pb-5">
                                <div class="d-flex flex-column flex-center">
                                    <div class="symbol symbol-120 symbol-circle symbol-success overflow-hidden">
                                        <span class="symbol-label">
                                            <img src="<?php echo base_url(); ?>profile/<?php echo $imgu; ?>" width="110%" alt="" />
                                        </span>
                                    </div>
                                    <a href="#" class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1"><?php echo $name;?></a>
                                    <div class="font-weight-bold text-dark-50 font-size-sm pb-6"><?php echo $position_name;?></div>
                                </div>
                            </div>
                            <div class="d-flex flex-center" id="kt_sticky_toolbar_chat_toggler_1" data-toggle="tooltip" title="" data-placement="right" data-original-title="View Profile">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>
    <!--end::Section-->
