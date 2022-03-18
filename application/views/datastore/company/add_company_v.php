<div class="content d-flex flex-column flex-row-fluid" id="kt_wrapper">
    <form class="form" action="<?php echo base_url(); ?>upload/addnewcompany"  method="post" enctype="multipart/form-data" id="kt_form_1">
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Setup Company</h5>
                        <!--end::Page Title-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <!--begin::Button-->
                    <a href="<?php echo base_url();?>datastore/setcompany" class="btn btn-default font-weight-bold">Back</a>
                    <!--end::Button-->
                    <!--begin::Dropdown-->
                    <div class="btn-group ml-2">
                        <button type="submit" onClick="save();" class="btn btn-light-primary font-weight-bold" name="submitButton">Save Changes</button>
                    </div>
                    <!--end::Dropdown-->
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--begin::Content-->
        <div class="d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Card-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container">
                            <!--begin::Row-->
                            <div class="row">
                                <div class="col-xl-12">
                                    <!--begin::Nav Panel Widget 1-->
                                    <div class="card card-custom gutter-b">
                                        <div class="card-body">
                                            <!--begin: Datatable-->
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 text-right col-form-label">Picture</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="image-input image-input-outline" id="kt_contacts_edit_avatar" style="background-image: url(<?php echo base_url();?>boostrap4/dist/assets/media/users/blank.png)">
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
                                            <!--end: Datatable-->
                                        </div>
                                    </div>
                                    <!--begin::Card-->
                                    <div class="card card-custom">
                                        <!--begin::Header-->
                                        <div class="card-header card-header-tabs-line">
                                            <div class="card-toolbar">
                                                <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x" role="tablist">
                                                    <li class="nav-item mr-3">
                                                        <a class="nav-link active" data-toggle="tab" href="#kt_apps_projects_view_tab_2">
                                                            <span class="nav-icon mr-2">
                                                                <span class="svg-icon mr-3">
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
                                                            </span>
                                                            <span class="nav-text font-weight-bold">Company Details(THAI)</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item mr-3">
                                                        <a class="nav-link" data-toggle="tab" href="#kt_apps_projects_view_tab_3">
                                                            <span class="nav-icon mr-2">
                                                                <span class="svg-icon mr-3">
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
                                                            </span>
                                                            <span class="nav-text font-weight-bold">Company Details(En)</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <div class="tab-content pt-5">
                                                <!--begin::Tab Content-->
                                                <div class="tab-pane active" id="kt_apps_projects_view_tab_2" role="tabpanel">
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Company Code (TH)</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input type="text" name="maincode" value="" class="form-control input-sm">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Company Name (TH)</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input class="form-control input-sm" type="text" id="name" name="name" value="">
                                                            <span class="form-text text-muted">If you want your invoices addressed to a company. Leave blank to use your full name.</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">TAX No.</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input type="text" name="taxno" value="" class="form-control input-sm">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Address 1 (TH)</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <textarea class="form-control input-sm" name="address" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Address 2 (TH)</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <textarea class="form-control input-sm" name="address2" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">W/T(%)</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input name="wttax" value="" class="form-control input-sm" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Telephone</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input type="text" name="tel" value="" class="form-control input-sm">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">FAX</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input type="text" name="fax" value="" class="form-control input-sm">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">E-Mail</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input type="text" name="email" value="" class="form-control input-sm">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Contacts</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input type="text" name="contact" value="" class="form-control input-sm">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Tab Content-->
                                                <!--begin::Tab Content-->
                                                <div class="tab-pane" id="kt_apps_projects_view_tab_3" role="tabpanel">
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Company Name (EN)</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input type="text" id="name" name="company_nameEN" value="" class="form-control input-sm">
                                                            <span class="form-text text-muted">If you want your invoices addressed to a company. Leave blank to use your full name.</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">TAX No.</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input type="text" name="taxnoen" value="" class="form-control input-sm">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Address 1 (EN)</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <textarea class="form-control input-sm" name="address_en" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Address 2 (EN)</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <textarea class="form-control input-sm" name="address_en2" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">W/T(%)</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input name="wttaxen" value="" class="form-control input-sm" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Telephone</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input type="text" name="telen" value="" class="form-control input-sm">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">FAX</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input type="text" name="faxen" value="" class="form-control input-sm">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">E-Mail</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input type="text" name="emailen" value="" class="form-control input-sm">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Contacts</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input type="text" name="contacten" value="" class="form-control input-sm">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Tab Content-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Card-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Content-->
                    <!--end::Card-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Entry-->
        </div>
        <!--end::Content-->
    </form>
</div>

<script src="<?php echo base_url();?>validation/company.js"></script>