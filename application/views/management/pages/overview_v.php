<div class="content d-flex flex-column flex-row-fluid" id="kt_wrapper">
    <!--begin::Content-->
    <div class="d-flex flex-column flex-column-fluid" id="kt_content">
       
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Column-->
                                <?php $n = 1; foreach ($pj as $key => $value) {?>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <!--begin::Card-->
                                    <div class="card card-custom gutter-b card-stretch">
                                        <!--begin::Body-->
                                        <div class="card-body text-center pt-4">
                                            <!--begin::User-->
                                            <div class="mt-7">
                                                <div class="symbol symbol-circle symbol-lg-90">
                                                    <?php if ($value->project_img){?>
                                                        <img src="<?php echo base_url(); ?>project/<?php echo $value->project_img;?>" alt="image" />
                                                    <?php }else{ ?>
                                                        <img src="<?php echo base_url(); ?>assets/images/construction2.png" alt="image" />
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Name-->
                                            <div class="my-4">
                                                <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4"><?php echo $value->project_name; ?></a>
                                            </div>
                                            <!--end::Name-->
                                            <!--begin::Label-->
                                            <span class="btn btn-text btn-light-warning btn-sm font-weight-bold">Active</span>
                                            <!--end::Label-->
                                            <!--begin::Buttons-->
                                            <div class="mt-9">
                                                <a href="#" class="btn btn-light-primary font-weight-bolder btn-sm py-3 px-6 text-uppercase">view project</a>
                                            </div>
                                            <!--end::Buttons-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                                <?php } ?>
                                <!--end::Column-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Container-->
                    </div>
                <!--end::Entry-->
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
</div>