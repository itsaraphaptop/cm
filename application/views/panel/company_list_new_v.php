<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
        <?php foreach ($company as $key => $value) { ?>
            <!--begin::Column-->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                <!--begin::Card-->
                <div class="card card-custom gutter-b card-stretch">
                    <!--begin::Body-->
                    <div class="card-body text-center pt-4">
                        <!--begin::User-->
                        <div class="mt-7 pb-2">
                            <?php if($value->comp_img != "") {?>
                                <div class="symbol symbol-circle symbol-lg-90">
                                    <img src="<?php echo base_url(); ?>comp/<?= $value->comp_img; ?>" alt="image" />
                                </div>
                            <?php }else{?>
                                <div class="symbol symbol-lg-90 symbol-circle symbol-primary">
                                    <span class="font-size-h3 symbol-label font-weight-boldest"><?= iconv_substr($value->company_name,0, 1)?></span>
                                </div>
                            <?php } ?>
                        </div>
                        <!--end::User-->
                        <!--begin::Name-->
                        <div class="my-4">
                            <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4"><?= $value->company_name; ?></a>
                        </div>
                        <!--end::Name-->
                        <!--begin::Label-->
                        <span class="btn btn-text btn-light-warning btn-sm font-weight-bold">Active</span>
                        <!--end::Label-->
                        <!--begin::Buttons-->
                        <div class="mt-9">
                            <a href="<?php echo base_url(); ?>auth/login/<?php echo $username; ?>/<?= $value->compcode; ?>/<?= $lati; ?>/<?= $long; ?>" class="btn btn-light-primary font-weight-bolder btn-sm py-3 px-6 text-uppercase">Open Company</a>
                        </div>
                        <!--end::Buttons-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Column-->
        <?php } ?>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
