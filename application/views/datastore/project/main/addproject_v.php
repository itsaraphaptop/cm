<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Add Project</h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                <!--end::Separator-->
                <!--begin::Search Form-->
                <div class="d-flex align-items-center" id="kt_subheader_search">
                    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Enter project details and submit</span>
                </div>
                <!--end::Search Form-->
            </div>
            <!--end::Details-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Button-->
                <a href="#" class="btn btn-default font-weight-bold">Back</a>
                <!--end::Button-->
                <!--begin::Dropdown-->
                <!-- <div class="btn-group ml-2">
                    <button type="button" class="btn btn-primary font-weight-bold">Submit</button>
                </div> -->
                <!--end::Dropdown-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-body p-0">
                    <div class="wizard wizard-1" id="kt_projects_add" data-wizard-state="step-first" data-wizard-clickable="true">
                        <!--begin::Wizard Nav-->
                        <div class="wizard-nav border-bottom">
                            <div class="wizard-steps p-8 p-lg-10">
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                    <div class="wizard-label">
                                        <span class="svg-icon svg-icon-4x wizard-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Chat-check.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <h3 class="wizard-title">Project Details</h3>
                                    </div>
                                    <span class="svg-icon svg-icon-xl wizard-arrow">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-label">
                                        <span class="svg-icon svg-icon-4x wizard-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Display1.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z" fill="#000000" opacity="0.3" />
                                                    <path d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z" fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <h3 class="wizard-title">Job Details</h3>
                                    </div>
                                    <span class="svg-icon svg-icon-xl wizard-arrow">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-label">
                                        <span class="svg-icon svg-icon-4x wizard-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Globe.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z" fill="#000000" fill-rule="nonzero" />
                                                    <circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <h3 class="wizard-title">Project Contact</h3>
                                    </div>
                                    <span class="svg-icon svg-icon-xl wizard-arrow">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-label">
                                        <span class="svg-icon svg-icon-4x wizard-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
                                                    <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <h3 class="wizard-title">Consults Contract</h3>
                                    </div>
                                    <span class="svg-icon svg-icon-xl wizard-arrow last">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Nav-->
                       
                      
                        <!--begin::Wizard Body-->
                        <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                            <div class="col-xl-12 col-xxl-9">
                                <!--begin::Form Wizard-->
                                <form action="<?php echo base_url();?>datastore/addproject" method="post" enctype="multipart/form-data" class="form repeater" id="kt_projects_add_form">
                                    <!--begin::Step 1-->
                                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                        <h3 class="mb-10 font-weight-bold text-dark">Project Details:</h3>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Project Image</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <div class="image-input image-input-outline" id="kt_contact_add_avatar" style="background-image: url(<?php echo base_url();?>boostrap4/dist/assets/media/users/blank.png)">
                                                            <div class="image-input-wrapper" style="background-image: url()"></div>
                                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                                <input type="file" name="userfile" accept=".png, .jpg, .jpeg" />
                                                            </label>
                                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <label class="col-3 col-form-label">Type</label>
                                                    <div class="col-9 col-form-label">
                                                        <div class="radio-inline">
                                                            <label class="radio radio-outline radio-outline-2x radio-primary">
                                                                <input type="radio" name="radioprode" checked="checked" value="1"/>
                                                                <span></span>
                                                                Project
                                                            </label>
                                                            <label class="radio radio-outline radio-outline-2x radio-primary">
                                                                <input type="radio" name="radioprode"  value="2"/>
                                                                <span></span>
                                                                Department
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Project Code</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-lg form-control-solid" name="projno" type="text" value="" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Project Name</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-lg form-control-solid" name="projname" type="text" value="" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Address Line</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-lg form-control-solid" name="address" type="text" value="" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Business Type</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <select name="bustype" class="form-control form-control-lg form-control-solid">
                                                            <?php foreach ($getjobtype as $key => $type) {?>
                                                                <option value="<?php echo $type->type_code; ?>">
                                                                    <?php echo $type->type_name; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Business Unit</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <select name="bucode" class="form-control form-control-lg form-control-solid">
                                                                <?php foreach ($getbusi as $des) { ?>
                                                                    <option value="<?php echo $des->business_code; ?>"><?php echo $des->business_name; ?></option>
                                                                <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Jobs Detail</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <textarea class="form-control form-control-lg form-control-solid" id="exampleTextarea" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Project/Dep Start Date:</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input type="date" class="form-control form-control-lg form-control-solid" name="startprojectdate" placeholder="StartProjectDate" value="<?php echo date("Y-m-d");?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Project/Dep End Date:</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input type="date" class="form-control form-control-lg form-control-solid" name="endprojectdate" placeholder="EndProjectDate" value="<?php echo date("Y-m-d");?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Step 1-->
                                    <!--begin::Step 2-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h3 class="mb-10 font-weight-bold text-dark">Project Settings</h3>
                                                    </div>
                                                </div>
                                                <div class="form-group row align-items-center">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Cost Control</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="checkbox-inline">
                                                            <label class="checkbox">
                                                            <input name="chkgl" type="checkbox" />
                                                            <span></span>GL For IC</label>
                                                            <label class="checkbox">
                                                            <input name="chkconbqq" type="checkbox" />
                                                            <span></span>Control BOQ</label>
                                                            <label class="checkbox">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Control Budget</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <select name="controlbg" class="form-control form-control-lg form-control-solid">
                                                            <option value="1">Not Control</option>
                                                            <option value="2">By Summary Cost Code</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Tender/BOQ Control</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <div class="input-group">
															<input type="text" class="form-control form-control-lg form-control-solid" readonly="readonly" id="bd_tenid" name="bd_tenid" placeholder="">
                                                            <input type="text" class="form-control form-control-lg form-control-solid" readonly="readonly" id="bd_tenname" name="bd_tenname" placeholder="Search for...">
															<div class="input-group-append">
																<button class="tender btn btn-primary" data-toggle="modal" data-target="#tender_modal" type="button">Search</button>
															</div>
														</div>
                                                    </div>
                                                </div>
                                                <div id="kt_repeater_3">
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">System Job:</label>
                                                        <div id="jobrow">
                                                            <div class="job col-lg-9 col-xl-9 job">
                                                                <div class="form-group row">
                                                                    <div class="col-lg-5">
                                                                        <div class="input-group">
                                                                            <select name="job_id[]" id="job_id" class="form-control form-control-solid">
                                                                                <?php foreach ($getsystem as $sys) { ?>
                                                                                <option value="<?php echo $sys->systemcode; ?>"><?php echo $sys->systemname; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-5">
                                                                        <div class="input-group">
                                                                            <input type="text" name="job_amount[]" id="job_amount" class="form-control form-control-solid" onchange="format(this)" onblur='if(this.value.indexOf(".")==-1)this.value=this.value+".00"' value="0.00" placeholder="Amount"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        <a class="btn font-weight-bold btn-danger btn-icon delrow">
                                                                            <i class="la la-remove"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-3"></div>
                                                        <div class="col">
                                                            <div class="btn font-weight-bold btn-primary insrows">
                                                                <i class="la la-plus"></i>
                                                                Add
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Contract Amount</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-lg form-control-solid" name="projectval" id="projectval" type="text" value="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   <script>
                                       $(".insrows").click(function() {
                                            addrow();
                                            projectval_total = 0;
                                            $("[name='job_amount[]']").each(function(index, el) {
                                                var val =  parseFloat($(this).val().replace(/,/g, ""));
                                                projectval_total += (val * 1);

                                            });
                                            $("#projectval").val(numberWithCommas(projectval_total));

                                        });
                                        function addrow() {
                                        var row = ($('#jobrow div').length - 0) + 1;
                                       
                                        var tr =    '<div class="col-lg-9 col-xl-9 job">'+
                                                        '<div class="form-group row">'+
                                                            '<div class="col-lg-5">'+
                                                                '<div class="input-group">'+
                                                                    '<input type="hidden" name="chki[]" value="i">'+
                                                                    '<select name="job_id[]" id="job_id" class="form-control form-control-solid">'+
                                                                    '<?php foreach ($getsystem as $sys) { ?>' +
                                                                        '<option value="<?php echo $sys->systemcode; ?>"><?php echo $sys->systemname; ?></option>'+
                                                                        '<?php } ?>' +
                                                                    '</select>'+
                                                                '</div>'+
                                                            '</div>'+
                                                            '<div class="col-lg-5">'+
                                                                '<div class="input-group">'+
                                                                    '<input type="text" name="job_amount[]" id="job_amount" class="form-control form-control-solid" onchange="format(this)" onblur="if(this.value.indexOf(".")==-1)this.value=this.value+".00" value="0.00" placeholder="Amount">'+
                                                                '</div>'+
                                                            '</div>'+
                                                            '<div class="col-lg-2">'+
                                                                '<a class="btn font-weight-bold btn-danger btn-icon del">'+
                                                                    '<i class="la la-remove"></i>'+
                                                                '</a>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>';
                                        $('#jobrow').append(tr);
                                        $('.del').click(function(event) {
                                            // $(this).remove();
                                            $(this).parents(".job:first")[0].remove();
                                        });
                                        sum = 0;
                                        $("[name='job_amount[]']").on("keydown keyup", function() {
                                            calculateSum();
                                        });
                                        function calculateSum() {
                                            sum = 0;
                                            $("[name='job_amount[]']").each(function() {
                                                if (!isNaN($(this).val().replace(/,/g, "")) && $(this).val().replace(/,/g, "").length != 0) {
                                                    sum += parseFloat($(this).val().replace(/,/g, ""));
                                                    console.log(sum);
                                                    //alert(sum)
                                                }
                                            });
                                            $("#projectval").val(numberWithCommas(sum));
                                        }
                                    }
                                   </script>
                                    <!--end::Step 2-->
                                    <!--begin::Step 3-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                    <h3 class="mb-10 font-weight-bold">Project Admin Contract</h3>
                                        <div class="form-group row">
                                            <div id="adminrow">
                                                <div data-repeater-list="" class="col-lg-12">
                                                    <div data-repeater-item="" class="form-group row align-items-center">
                                                        <div class="col-md-3">
                                                            <label>Name:</label>
                                                            <input type="email" class="form-control" name="adminname[]" placeholder="Enter full name">
                                                            <div class="d-md-none mb-2"></div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Position:</label>
                                                            <input type="text" class="form-control" name="adminposi[]" placeholder="Enter Position">
                                                            <div class="d-md-none mb-2"></div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label>Mobile:</label>
                                                            <input type="number" class="form-control" name="admintel[]" placeholder="Enter Mobile Phone">
                                                            <div class="d-md-none mb-2"></div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Email:</label>
                                                            <input type="email" class="form-control" name="adminemail[]" placeholder="Enter Email">
                                                            <div class="d-md-none mb-2"></div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <br>
                                                            <a class="btn font-weight-bold btn-danger btn-icon deladminrow">
                                                                <i class="la la-remove"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <div class="btn font-weight-bold btn-primary addrowadmin">
                                                            <i class="la la-plus"></i>
                                                            Add
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                       $(".addrowadmin").click(function() {
                                            addrowadmin();
                                        });
                                        function addrowadmin() {
                                        var row = ($('#adminrow div').length - 0) + 1;
                                        var tr = '<div data-repeater-list="" class="col-lg-12 delrowadmin">'+
                                                    '<div data-repeater-item="" class="form-group row align-items-center">'+
                                                        '<div class="col-md-3">'+
                                                            '<label>Name:</label>'+
                                                            '<input type="email" class="form-control" name="adminname[]" placeholder="Enter full name">'+
                                                            '<input type="hidden" name="chkadi[]" value="'+row+'">'+
                                                            '<div class="d-md-none mb-2"></div>'+
                                                        '</div>'+
                                                        '<div class="col-md-3">'+
                                                            '<label>Position:</label>'+
                                                            '<input type="text" class="form-control" name="adminposi[]" placeholder="Enter Position">'+
                                                            '<div class="d-md-none mb-2"></div>'+
                                                        '</div>'+
                                                        '<div class="col-md-2">'+
                                                            '<label>Mobile:</label>'+
                                                            '<input type="number" class="form-control" name="admintel[]" placeholder="Enter Mobile Phone">'+
                                                            '<div class="d-md-none mb-2"></div>'+
                                                        '</div>'+
                                                        '<div class="col-md-3">'+
                                                            '<label>Email:</label>'+
                                                            '<input type="email" class="form-control" name="adminemail[]" placeholder="Enter Email">'+
                                                            '<div class="d-md-none mb-2"></div>'+
                                                        '</div>'+
                                                        '<div class="col-md-1">'+
                                                            '<br>'+
                                                            '<a class="btn font-weight-bold btn-danger btn-icon deladminrow">'+
                                                                '<i class="la la-remove"></i>'+
                                                            '</a>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>';
                                            $('#adminrow').append(tr);
                                            $('.deladminrow').click(function(event) {
                                                // $(this).remove();
                                                $(this).parents(".delrowadmin:first")[0].remove();
                                            });
                                        }
                                    </script>
                                    <!--end::Step 3-->
                                    <!--begin::Step 4-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                    <h3 class="mb-10 font-weight-bold">Project Consult Contract</h3>
                                        <div class="form-group row">
                                            <div id="consultrow">
                                                <div data-repeater-list="" class="col-lg-12">
                                                    <div data-repeater-item="" class="form-group row align-items-center">
                                                        <div class="col-md-3">
                                                            <label>Name:</label>
                                                            <input type="email" class="form-control" name="consultname[]" placeholder="Enter full name">
                                                            <div class="d-md-none mb-2"></div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Position:</label>
                                                            <input type="text" class="form-control" name="consultposi[]" placeholder="Enter Position">
                                                            <div class="d-md-none mb-2"></div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label>Mobile:</label>
                                                            <input type="number" class="form-control" name="consulttel[]" placeholder="Enter Mobile Phone">
                                                            <div class="d-md-none mb-2"></div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Email:</label>
                                                            <input type="email" class="form-control" name="consultemail[]" placeholder="Enter Email">
                                                            <div class="d-md-none mb-2"></div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <br>
                                                            <a class="btn font-weight-bold btn-danger btn-icon delconsult">
                                                                <i class="la la-remove"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <div class="btn font-weight-bold btn-primary addrowconsult">
                                                            <i class="la la-plus"></i>
                                                            Add
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                       $(".addrowconsult").click(function() {
                                            addrowconsult();
                                        });
                                        function addrowconsult() {
                                        var row = ($('#consultrow div').length - 0) + 1;
                                        var tr = '<div data-repeater-list="" class="col-lg-12 delrowadmin">'+
                                                    '<div data-repeater-item="" class="form-group row align-items-center">'+
                                                        '<div class="col-md-3">'+
                                                            '<label>Name:</label>'+
                                                            '<input type="hidden" name="chkconsi[]" value="'+row+'">'+
                                                            '<input type="email" class="form-control" name="consultname[]" placeholder="Enter full name">'+
                                                            '<div class="d-md-none mb-2"></div>'+
                                                        '</div>'+
                                                        '<div class="col-md-3">'+
                                                            '<label>Position:</label>'+
                                                            '<input type="text" class="form-control" name="consultposi[]" placeholder="Enter Position">'+
                                                            '<div class="d-md-none mb-2"></div>'+
                                                        '</div>'+
                                                        '<div class="col-md-2">'+
                                                            '<label>Mobile:</label>'+
                                                            '<input type="number" class="form-control" name="consulttel[]" placeholder="Enter Mobile Phone">'+
                                                            '<div class="d-md-none mb-2"></div>'+
                                                        '</div>'+
                                                        '<div class="col-md-3">'+
                                                            '<label>Email:</label>'+
                                                            '<input type="email" class="form-control" name="consultemail[]" placeholder="Enter Email">'+
                                                            '<div class="d-md-none mb-2"></div>'+
                                                        '</div>'+
                                                        '<div class="col-md-1">'+
                                                            '<br>'+
                                                            '<a class="btn font-weight-bold btn-danger btn-icon delconsult">'+
                                                                '<i class="la la-remove"></i>'+
                                                            '</a>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>';
                                            $('#consultrow').append(tr);
                                            $('.delconsult').click(function(event) {
                                                // $(this).remove();
                                                $(this).parents(".delrowadmin:first")[0].remove();
                                            });
                                        }
                                    </script>
                                    <!--end::Step 4-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        <div class="mr-2">
                                            <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button>
                                            <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Next Step</button>
                                        </div>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form Wizard-->
                            </div>
                        </div>
                        <!--end::Wizard Body-->
                        
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->
<!--begin::Modal-->
<div id="tender_modal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content" style="min-height: 590px;">
            <div class="modal-header py-5">
                <h5 class="modal-title">Select Tender
                <span class="d-block text-muted font-size-sm" id="subproject"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-5" id="tenderr">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query_2" />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_sub"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<script>
    $(".tender").on("click",function(){
        $('#tenderr').html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
        $('#tenderr').load('<?php echo base_url();?>bd/modaltender');
    });
</script>
<script src="<?php echo base_url();?>validation/project.js"></script>