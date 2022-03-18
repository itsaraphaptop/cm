<style>
    form i {
    cursor: pointer;
}
</style>
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <form id="form" method="post" enctype="multipart/form-data">
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Edit Employee</h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                <!--end::Separator-->
                <!--begin::Search Form-->
                <div class="d-flex align-items-center" id="kt_subheader_search">
                    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Setup Employee</span>
                </div>
                <!--end::Search Form-->
            </div>
            <!--end::Details-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Button-->
                <div class="btn-group ml-2">
                    <a href="<?php echo base_url();?>datastore/addemployee" class="btn btn-success font-weight-bold">New</a>
                </div>
                <div class="btn-group ml-2">
                <a href="<?php echo base_url();?>datastore/setupemployee" class="btn btn-default font-weight-bold">Back</a>
                </div>
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
                                    <span class="nav-text font-weight-bold">Profile</span>
                                </a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" data-toggle="tab" href="#kt_apps_projects_view_tab_3">
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
                                    <span class="nav-text font-weight-bold">Account</span>
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
                                    <h3 class="font-size-h6 mb-5">Employee Detail:</h3>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 text-right col-form-label">Image</label>
                                <div class="col-lg-9 col-xl-9">
                                    <div class="image-input image-input-outline" id="kt_contacts_edit_avatar" style="background-image: url(<?php echo base_url();?>boostrap4/dist/assets/media/users/blank.png)">
                                        <div class="image-input-wrapper" style="background-image: url(<?php echo base_url();?>profile/<?=$getmemb[0]['uimg'];?>)"></div>
                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" name="userfile" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="profile_avatar_remove" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Employee Code</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control form-control-lg form-control-solid" name="ccode" readonly type="text" value="<?=$getmemb[0]['m_code'];?>" />
                                    <input type="hidden" name="cid" id="cid" class="form-control" value="<?=$getmemb[0]['m_id'];?>">
                                    <input type="hidden" name="flag" id="flag" class="form-control" value="udp">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Employee Name</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control form-control-lg" type="text" name="cname" value="<?=$getmemb[0]['m_name'];?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Email Address</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control form-control-lg" type="text" name="cmail" value="<?=$getmemb[0]['m_email'];?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Contact Phone</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="kt_inputmask_3" class="form-control form-control-lg" type="text" name="ctel" value="<?=$getmemb[0]['m_tel'];?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Project</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg  form-control-solid" readonly="readonly" id="projid" name="project1" placeholder="" value="<?=$getmemb[0]['m_project'];?>">
                                        <input type="text" class="form-control form-control-lg  form-control-solid" readonly="readonly" id="projname" name="projname" value="<?=$getmemb[0]['project_name'];?>">
                                        <div class="input-group-append">
                                            <button class="acsecondary btn btn-primary" data-toggle="modal" data-target="#acsecondary" type="button">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Position</label>
                                <div class="col-lg-9 col-xl-6">
                                    <select class="form-control form-control-lg" name="ctype" id="ctype">
                                    <?php foreach ($getposition as $val) { ?>
                                        <option value="<?php echo $val->id; ?>"<?php if($getmemb[0]['m_position']==$val->id){echo "selected='selected'";} ?> ><?php echo $val->p_name; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Type</label>
                                <div class="col-lg-9 col-xl-6">
                                    <select class="form-control form-control-lg" name="mtype" id="mtype">
                                        <?php if($getmemb[0]['m_type'] == 'employee'){ ?><option value="employee" selected>Employee</option><?php } else { ?><option value="employee">Employee</option><?php }?>
                                        <?php if($getmemb[0]['m_type'] == 'external'){ ?><option value="external" selected>External</option><?php } else { ?><option value="external">External</option><?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Dashboard</label>
                                <div class="col-lg-9 col-xl-6">
                                    <select class="form-control form-control-lg" name="mdash" id="mdash">
                                        <?php if($getmemb[0]['dashboard'] == '1'){ ?><option value="1" selected>PM</option><?php } else { ?><option value="1">PM</option><?php }?>
                                        <?php if($getmemb[0]['dashboard'] == '2'){ ?><option value="2" selected>GM</option><?php } else { ?><option value="2">GM</option><?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--end::Tab Content-->
                        <!--begin::Tab Content-->
                        <div class="tab-pane" id="kt_apps_projects_view_tab_3" role="tabpanel">
                            <!--begin::Heading-->
                            <div class="row">
                                <div class="col-lg-9 col-xl-6 offset-xl-3">
                                    <h3 class="font-size-h6 mb-5">Change Or Recover Your Password:</h3>
                                </div>
                            </div>
                            <!--end::Heading-->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Username</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control form-control-lg form-control-solid" name="cuser" readonly type="text" value="<?=$getmemb[0]['m_user'];?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Password</label>
                                <div class="col-lg-9 col-xl-6 ">
                                    <div class="input-icon input-icon-right">
                                        <input class="form-control form-control-lg" name="cpass" id="password" type="password" value="<?=$getmemb[0]['pass'];?>" />
                                        <span>
                                            <i class="ki ki-hide icon-md" id="togglePassword"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Line ID</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control form-control-lg" name="lineid" type="text" value="<?=$getmemb[0]['lineid'];?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Signature</label>
                                <div class="col-9">
                                    <button type="button" data-toggle="modal" data-target="#signfile" class="btn btn-light-primary font-weight-bold btn-sm signfile">Upload file Signature</button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Status</label>
                                <div class="col-lg-9 col-xl-6">
                                    <select class="form-control form-control-lg" name="m_status" id="m_status">
                                        <?php if($getmemb[0]['status'] == 'o'){ ?><option value="o" selected>Active</option><?php } else { ?><option value="o">Active</option><?php }?>
                                        <?php if($getmemb[0]['status'] == 'i'){ ?><option value="i" selected>Inactive</option><?php } else { ?><option value="i">Inactive</option><?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--end::Tab Content-->
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
<div id="signfile" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content" style="min-height: 590px;">
            <div class="modal-header py-5">
                <h5 class="modal-title">Select File Signature
                <span class="d-block text-muted font-size-sm" id="subproject"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-5" id="signaturefile">
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
    // $(".tender").on("click",function(){
    //     $('#tenderr').html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
    //     $('#tenderr').load('<?php echo base_url();?>bd/modaltender');
    // });
    $(".signfile").on("click",function(){
        $('#signaturefile').html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
        $('#signaturefile').load('<?php echo base_url();?>share/load_modal_uploadfile/<?=$getmemb[0]['m_id'];?>');
    });
    $(".acsecondary").on("click",function(){
        $('#acsecondaryload').html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
        $('#acsecondaryload').load('<?php echo base_url();?>share/load_modal_project');
    });
    $('.save-change').click(function(event) {
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
                        url: '<?php echo base_url(); ?>datastore_active/udp_employee',
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
                                data,
                                "Your file has been Completed.",
                                "success"
                            )
                        }
                    });
            } else if (result.dismiss === 'cancel') {
                Swal.fire(
                    'Cancelled',
                    'Your Save Change is safe :)',
                    'error'
                )
            }
        });
        
    });
    const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye / eye slash icon
        this.classList.toggle('flaticon-eye');
    });
</script>
<!--end::Modal-->
<!-- <script src="<?php echo base_url();?>validation/project.js"></script> -->
