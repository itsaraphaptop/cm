<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <form id="form" method="post" enctype="multipart/form-data">
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Edit Project</h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                <!--end::Separator-->
                <!--begin::Search Form-->
                <div class="d-flex align-items-center" id="kt_subheader_search">
                    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Setup Project</span>
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
                <div class="btn-group ml-2">
                    <button type="button" class="btn btn-primary font-weight-bold save-change">Submit</button>
                </div>
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
                                    <span class="nav-text font-weight-bold">Project Details</span>
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
                                    <span class="nav-text font-weight-bold">Job Detail</span>
                                </a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" data-toggle="tab" href="#kt_apps_projects_view_tab_4">
                                    <span class="nav-icon mr-2">
                                        <span class="svg-icon mr-3">
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
                                    </span>
                                    <span class="nav-text font-weight-bold">Project Contract</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_apps_projects_view_tab_1">
                                    <span class="nav-icon mr-2">
                                        <span class="svg-icon mr-3">
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
                                    </span>
                                    <span class="nav-text font-weight-bold">Consult Contract</span>
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
                            <div class="row">
                                <div class="col-lg-9 col-xl-6 offset-xl-3">
                                    <h3 class="font-size-h6 mb-5">Project Detail:</h3>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 text-right col-form-label">Project Image</label>
                                <div class="col-lg-9 col-xl-9">
                                    <div class="image-input image-input-outline" id="kt_contacts_edit_avatar" style="background-image: url(<?php echo base_url();?>boostrap4/dist/assets/media/users/blank.png)">
                                        <div class="image-input-wrapper" style="background-image: url(<?php echo base_url();?>project/<?=$proj[0]['project_img'];?>)"></div>
                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" name="userfile" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="profile_avatar_remove" />
                                        </label>
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Type</label>
                                <div class="col-lg-9 col-form-label">
                                    <div class="radio-inline">
                                        <label class="radio radio-outline radio-outline-2x radio-primary">
                                            <input type="radio" name="radioprode" <?php if($proj[0]['project_department']==1){echo 'checked="checked"';}
                                            ?> value="1"/>
                                            <span></span>
                                            Project
                                        </label>
                                        <label class="radio radio-outline radio-outline-2x radio-primary">
                                            <input type="radio" name="radioprode"  <?php if($proj[0]['project_department']==2){echo
                                            'checked="checked"';} ?> value="2"/>
                                            <span></span>
                                            Department
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Project Code</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control form-control-lg form-control-solid" name="projno" readonly type="text" value="<?=$proj[0]['project_code']?>" />
                                    <input type="hidden" name="projid" id="proid" class="form-control" value="<?=$proj[0]['project_id']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Project Name</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control form-control-lg form-control-solid" type="text" name="projname" value="<?=$proj[0]['project_name']?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Address</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control form-control-lg form-control-solid" type="text" name="address" value="<?=$proj[0]['project_address']?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Business Type</label>
                                <div class="col-lg-9 col-xl-6">
                                    <select class="form-control form-control-lg form-control-solid" name="custype" id="custype">
                                        <?php foreach ($getjobtype as $type) {  ?>
                                            <option value="<?php echo $type->type_code; ?>" <?php if($proj[0]['project_biztype']==$type->type_code){echo "selected='selected'";} ?>>	<?php echo $type->type_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Business Type</label>
                                <div class="col-lg-9 col-xl-6">
                                    <select class="form-control form-control-lg form-control-solid" name="butype" id="butype">
                                    <?php foreach ($getbusi as $des) { ?>
                                        <option value="<?php echo $des->business_code; ?>"<?php if($proj[0]['bussiness_code']==$des->business_code){echo "selected='selected'";} ?> ><?php echo $des->business_name; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Jobs Detail</label>
                                <div class="col-lg-9 col-xl-6">
                                    <textarea class="form-control form-control-lg form-control-solid" name="projectdetail" rows="3"><?=$proj[0]['project_detail']?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Project/Dep Start Date:</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control form-control-lg form-control-solid" name="startproject" type="date" value="<?=$proj[0]['project_start']?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Project/Dep End Date:</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control form-control-lg form-control-solid" type="date" name="endtproject" value="<?=$proj[0]['project_stop']?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">A/C I/C Primary</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg form-control-solid" readonly="readonly" id="accno" name="accno" placeholder="" value="<?=$proj[0]['acc_primary']?>">
                                        <input type="text" class="form-control form-control-lg form-control-solid" readonly="readonly" id="accountname" name="accountname" value="<?= (isset($acprimary[0]['act_name']) != "") ? $acprimary[0]['act_name'] : "";?>">
                                        <div class="input-group-append">
                                            <button class="acprimary btn btn-primary" data-toggle="modal" data-target="#acprimary" type="button">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">A/C I/C Secondary</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg form-control-solid" readonly="readonly" id="acc_no" name="acc_no" placeholder="" value="<?=$proj[0]['acc_secondary']?>">
                                        <input type="text" class="form-control form-control-lg form-control-solid" readonly="readonly" id="acc_name" name="acc_name" value="<?= (isset($acsecondary[0]['act_name']) != "") ? $acsecondary[0]['act_name'] : "";?>">
                                        <div class="input-group-append">
                                            <button class="acsecondary btn btn-primary" data-toggle="modal" data-target="#acsecondary" type="button">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Tab Content-->
                        <!--begin::Tab Content-->
                        <div class="tab-pane" id="kt_apps_projects_view_tab_3" role="tabpanel">
                            <!--begin::Heading-->
                            <div class="row">
                                <div class="col-lg-9 col-xl-6 offset-xl-3">
                                    <h3 class="font-size-h6 mb-5">Project Settings:</h3>
                                </div>
                            </div>
                            <!--end::Heading-->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">BOQ Control</label>
                                <div class="col-lg-9 col-form-label">
                                    <div class="checkbox-inline">
                                        <label class="checkbox">
                                        <input name="chkgl" type="checkbox" <?php if($proj[0]['gl_for_ic']==1){ echo "checked";}else{ echo ""; }?> value="1"/>
                                        <span></span>GL For IC</label>
                                        <label class="checkbox">
                                        <input name="chkconbqq" type="checkbox" <?php if($proj[0]['chkconbqq']==1){ echo "checked";}else{ echo ""; }?> value="1"/>
                                        <span></span>Control BOQ</label>
                                        <label class="checkbox">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Control Budget</label>
                                <div class="col-lg-9 col-xl-6">
                                    <select name="controlbg" class="form-control form-control-lg form-control-solid">
                                        <option value="1" <?= ($proj[0]['controlbg'] == 1) ? "selected='sleected'" : "";?> >Not Control</option>
                                        <option value="2" <?= ($proj[0]['controlbg'] == 2) ? "selected='selected'" : "";?> >By Summary Cost Code</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Tender/BOQ Control</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg form-control-solid" readonly="readonly" id="bd_tenid" name="bd_tenid" placeholder="" value="<?=$proj[0]['bd_tenid']?>">
                                        <input type="text" class="form-control form-control-lg form-control-solid" readonly="readonly" id="bd_tenname" name="bd_tenname" value="<?=$proj[0]['bd_tenname']?>">
                                        <div class="input-group-append">
                                            <button class="tender btn btn-primary" data-toggle="modal" data-target="#tender_modal" type="button">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">System Job</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div id="jobrow">
                                        <?php $i=1; foreach ($getsystem as $sys) { ?>
                                        <div class="job col-lg-9 col-xl-9 job">
                                            <div class="form-group row">
                                                <div class="col-lg-5">
                                                    <input type="hidden" name="chki[]" value="get">
                                                    <input type="hidden" name="idi[]" value="<?php echo $sys->id; ?>">
                                                    <div class="input-group">
                                                        <select name="job_id[]" id="job_id<?=$i;?>" class="form-control form-control-solid">
                                                            
                                                                <option value="<?php echo $sys->projectd_job; ?>"><?php echo $sys->systemname; ?></option>
                                                            <?php  foreach ($getsystem2 as $job2) { ?>
                                                                <option value="<?php echo $job2->systemcode; ?>"><?php echo $job2->systemname; ?></option>
                                                            <?php } ?>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="input-group">
                                                        <input type="text" name="job_amount[]" id="job_amount<?=$i;?>" class="form-control form-control-solid text-right" onchange="format(this)" onblur='if(this.value.indexOf(".")==-1)this.value=this.value+".00"' value="<?php echo $sys->job_amount; ?>" placeholder="Amount"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <a class="btn font-weight-bold btn-danger btn-icon delrow">
                                                        <i class="la la-remove"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $i++; } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="btn font-weight-bold btn-primary insrows">
                                        <i class="la la-plus"></i>
                                        Add
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Contract Amount</label>
                                <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" readonly name="projectval" id="projectval" type="text" value="<?php echo $sys->job_amount;?>" />
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
                                function addrow() {
                                    var row = ($('#jobrow div').length - 0) + 1;
                                    
                                    var tr =    '<div class="col-lg-9 col-xl-9 job">'+
                                                    '<div class="form-group row">'+
                                                        '<div class="col-lg-5">'+
                                                            '<div class="input-group">'+
                                                                '<input type="hidden" name="chki[]" value="i">'+
                                                                '<select name="job_id[]" id="job_id'+row+'" class="form-control form-control-solid">'+
                                                                '<?php foreach ($getsystem2 as $sys) { ?>' +
                                                                    '<option value="<?php echo $sys->systemcode; ?>"><?php echo $sys->systemname; ?></option>'+
                                                                    '<?php } ?>' +
                                                                '</select>'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="col-lg-5">'+
                                                            '<div class="input-group">'+
                                                                '<input type="text" name="job_amount[]" id="job_amount'+row+'" class="form-control form-control-solid text-right" onchange="format(this)" onblur="if(this.value.indexOf(".")==-1)this.value=this.value+".00" value="0.00" placeholder="Amount">'+
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
                                }
                                $('.del').click(function(event) {
                                    // $(this).remove();
                                    $(this).parents(".job:first")[0].remove();
                                    calculateSum();
                                });
                                // sum = 0;
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
                            });
                        </script>
                        <!--end::Tab Content-->
                        <!--begin::Tab Content-->
                        <div class="tab-pane" id="kt_apps_projects_view_tab_4" role="tabpanel">
                            <!--begin::Heading-->
                            <div class="row">
                                <div class="col-lg-9">
                                    <h3 class="font-size-h6 mb-5">Project Admin Contract:</h3>
                                </div>
                            </div>
                            <!--end::Heading-->
                            <div class="form-group row">
                                <div id="adminrow">
                                    <?php $i=0; foreach ($getadmin as $key => $value) { ?>
                                    <div data-repeater-list="" class="col-lg-12 delrowadmin<?php echo $value->mpro_adid; ?>">
                                        <div data-repeater-item="" class="form-group row align-items-center">
                                            <div class="col-md-3">
                                                <label>Name:</label>
                                                <input type="hidden" name="chkadi[]" value="get">
                                                <input type="hidden" name="addi[]" value="<?php echo $value->mpro_adid; ?>">
                                                <input type="text" class="form-control" name="adminname[]" value="<?php echo $value->mpro_adname;?>">
                                                <div class="d-md-none mb-2"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Position:</label>
                                                <input type="text" class="form-control" name="adminposi[]" value="<?php echo $value->mpro_adposition;?>">
                                                <div class="d-md-none mb-2"></div>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Mobile:</label>
                                                <input type="number" class="form-control" name="admintel[]" value="<?php echo $value->mpro_adtel;?>">
                                                <div class="d-md-none mb-2"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Email:</label>
                                                <input type="email" class="form-control" name="adminemail[]" value="<?php echo $value->mpro_ademail;?>">
                                                <div class="d-md-none mb-2"></div>
                                            </div>
                                            <div class="col-md-1">
                                                <br>
                                                <a class="btn font-weight-bold btn-danger btn-icon deladminrow delete-admin" tagetdel="admin" iddel="<?php echo $value->mpro_adid; ?>">
                                                    <i class="la la-remove"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++; } ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <div class="btn font-weight-bold btn-primary addrowadmin">
                                        <i class="la la-plus"></i>
                                        Add
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
                                // del row admin
                            }
                            $('.delete-admin').click(function(event) {
                                var proid = '<?php echo $projectid;?>';
                                var iddel = $(this).attr('iddel');
                                var tagetdel = $(this).attr('tagetdel');
                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: "You won't be able to revert this!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'Yes, delete it!',
                                    cancelButtonText: 'No, cancel!',
                                    reverseButtons: true
                                }).then(function (result) {
                                    if (result.value) {
                                        $.post("<?php echo base_url();?>datastore/delete_row", {
                                            proid: proid,
                                            iddel: iddel,
                                            tagetdel: tagetdel
                                        }, function() {}).done(function(data) {
                                            var json = jQuery.parseJSON(data);
                                            if (json.status === true) {
                                                Swal.fire(
                                                    'Deleted!',
                                                    'Your file has been deleted.',
                                                    'success'
                                                );
                                                $(".delrowadmin"+ iddel).remove();
                                            }
                                        });
                                        // result.dismiss can be 'cancel', 'overlay',
                                        // 'close', and 'timer'
                                    } else if (result.dismiss === 'cancel') {
                                        Swal.fire(
                                            'Cancelled',
                                            'Your imaginary file is safe :)',
                                            'error'
                                        )
                                    }
                                });
                            });
                        </script>
                        <!--end::Tab Content-->
                        <!--begin::Tab Content-->
                        <div class="tab-pane" id="kt_apps_projects_view_tab_1" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-9">
                                    <h3 class="font-size-h6 mb-5">Project Consult Contract:</h3>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div id="consultrow">
                                <?php $i=0; foreach ($getconsult as $key => $value) { ?>
                                    <div data-repeater-list="" class="col-lg-12 delrowconsult<?php echo $value->mpro_consultid; ?>">
                                        <div data-repeater-item="" class="form-group row align-items-center">
                                            <div class="col-md-3">
                                                <label>Name:</label>
                                                <input type="hidden" name="chkconsi[]" value="get">
                                                <input type="hidden" name="consi[]" value="<?php echo $value->mpro_consultid; ?>">
                                                <input type="email" class="form-control" name="consultname[]" value="<?php echo $value->mpro_consultname; ?>">
                                                <div class="d-md-none mb-2"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Position:</label>
                                                <input type="text" class="form-control" name="consultposi[]"  value="<?php echo $value->mpro_consultposition; ?>">
                                                <div class="d-md-none mb-2"></div>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Mobile:</label>
                                                <input type="number" class="form-control" name="consulttel[]"  value="<?php echo $value->mpro_consulttel; ?>">
                                                <div class="d-md-none mb-2"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Email:</label>
                                                <input type="email" class="form-control" name="consultemail[]"  value="<?php echo $value->mpro_consultemail; ?>">
                                                <div class="d-md-none mb-2"></div>
                                            </div>
                                            <div class="col-md-1">
                                                <br>
                                                <a class="btn font-weight-bold btn-danger btn-icon delconsult del-consult" tagetdel="consult" iddel="<?php echo $value->mpro_consultid; ?>">
                                                    <i class="la la-remove"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php $i++; } ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <div class="btn font-weight-bold btn-primary addrowconsult">
                                        <i class="la la-plus"></i>
                                        Add
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Tab Content-->
                        <script>
                            $(".addrowconsult").click(function() {
                                addrowconsult();
                            });
                            function addrowconsult() {
                                var row = ($('#consultrow div').length - 0) + 1;
                                var tr = '<div data-repeater-list="" class="col-lg-12 delrowconsult">'+
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
                                        $(this).parents(".delrowconsult:first")[0].remove();
                                    });
                            }
                            $('.del-consult').click(function(event) {
                                var proid = '<?php echo $projectid;?>';
                                var iddel = $(this).attr('iddel');
                                var tagetdel = $(this).attr('tagetdel');
                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: "You won't be able to revert this!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'Yes, delete it!',
                                    cancelButtonText: 'No, cancel!',
                                    reverseButtons: true
                                }).then(function (result) {
                                    if (result.value) {
                                        $.post("<?php echo base_url();?>datastore/delete_row", {
                                            proid: proid,
                                            iddel: iddel,
                                            tagetdel: tagetdel
                                        }, function() {}).done(function(data) {
                                            var json = jQuery.parseJSON(data);
                                            if (json.status === true) {
                                                Swal.fire(
                                                    'Deleted!',
                                                    'Your file has been deleted.',
                                                    'success'
                                                );
                                                $(".delrowconsult"+ iddel).remove();
                                            }
                                        });
                                        // result.dismiss can be 'cancel', 'overlay',
                                        // 'close', and 'timer'
                                    } else if (result.dismiss === 'cancel') {
                                        Swal.fire(
                                            'Cancelled',
                                            'Your imaginary file is safe :)',
                                            'error'
                                        )
                                    }
                                });
                            });
                        </script>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
    </form>
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
<div id="acprimary" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content" style="min-height: 590px;">
            <div class="modal-header py-5">
                <h5 class="modal-title">Select Account Chart
                <span class="d-block text-muted font-size-sm" id="subproject"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-5" id="acprimaryload">
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
<div id="acsecondary" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content" style="min-height: 590px;">
            <div class="modal-header py-5">
                <h5 class="modal-title">Select Account Chart
                <span class="d-block text-muted font-size-sm" id="subproject"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-5" id="acsecondaryload">
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
<script>
    $(".tender").on("click",function(){
        $('#tenderr').html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
        $('#tenderr').load('<?php echo base_url();?>bd/modaltender');
    });
    $(".acprimary").on("click",function(){
        $('#acprimaryload').html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
        $('#acprimaryload').load('<?php echo base_url();?>share/load_modal_account');
    });
    $(".acsecondary").on("click",function(){
        $('#acsecondaryload').html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
        $('#acsecondaryload').load('<?php echo base_url();?>share/load_modal_account2');
    });
    $('.save-change').click(function(event) {
        // var proid = '<?php echo $projectid;?>';
        // var iddel = $(this).attr('iddel');
        // var tagetdel = $(this).attr('tagetdel');
        Swal.fire({
            title: "Are you sure?",
            text: "You clicked the button!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, Change it!"
        }).then(function (result) {
            if (result.value) {
                var formData = new FormData($('#form')[0]);
                var file = $('#file').val();
                // frm.submit(function(ev) {
                    $.ajax({
                        url: '<?php echo base_url(); ?>datastore/updateproject',
                        type: 'POST',
                        data: formData,
                        async: false,
                        cache: false,
                        contentType: false,
                        enctype: 'multipart/form-data',
                        processData: false,
                        success: function(data) {
                            console.log(data);
                            Swal.fire(
                                "Completed!",
                                "Your file has been Completed.",
                                "success"
                            )
                        }
                    });
                    // ev.preventDefault();

                // });

                // $("#formdata").submit(); //Submit  the FORM
                // result.dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
            } else if (result.dismiss === 'cancel') {
                Swal.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        });
        
    });
</script>
<!--end::Modal-->
<script src="<?php echo base_url();?>validation/project.js"></script>
