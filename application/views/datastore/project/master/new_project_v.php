<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/wizards/stepy.min.js">
</script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/wizard_stepy.js">
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/uploader_bootstrap.js">
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/picker_date.js">
</script>


<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="content">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            <i class="icon-cog3 position-left"></i> Setup New Project
                            <p></p>
                        </h5>

                    </div>

                    <form class="stepy-clickable form-horizontal" id="formdata" method="post" enctype="multipart/form-data"
                        action="<?php echo base_url(); ?>datastore/addproject">
                         <div class="panel-body">
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <img src="<?php echo base_url();?>assets/images/module/icon_project.png"
                                        id="imgcomp" class="img-responsive">
                                    <input class="form-control" type="file" name="userfilepro"
                                        size="10" OnChange="showPreviewcomp(this)">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                           
                                <div class="tabbable">
                                    <ul class="nav nav-tabs nav-tabs-component">
                                        <li class="active">
                                            <a href="#bottom-tab2" data-toggle="tab">Job Detail</a>
                                        </li>
                                        <li>
                                            <a href="#bottom-tab1" data-toggle="tab">Project Detail</a>
                                        </li>
                                        <li>
                                            <a href="#bottom-tab3" data-toggle="tab">Admin</a>
                                        </li>
                                        <!-- <li>
                                            <a href="#bottom-tab4" data-toggle="tab">Owner Detail</a>
                                        </li> -->
                                        <li>
                                            <a href="#bottom-tab5" data-toggle="tab">Consultants</a>
                                        </li>
                                        <!-- <li>
                                            <a href="#bottom-tab6" data-toggle="tab">Subcontactor Detail</a>
                                        </li> -->
                                    </ul>


                                    <div class="tab-content">
                                        <div class="tab-pane " id="bottom-tab1">
                                            <!-- Start tab 1 -->
                                            <div class="panel-body">
                                                <div class="row">
                                                    
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Type :</label>
                                                            <div class="col-sm-8">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="radioprode" class="styled"
                                                                        checked="checked" value="1"> Project
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="radioprode" class="styled"
                                                                        value="2"> Department
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Project/Dep. Code :</label>
                                                            <div class="col-sm-8">
                                                                <input name="projno" id="projno" placeholder="Project Code"
                                                                    class="form-control input-sm" type="text" value="<?=$runproject_id;?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Project/Dep. Name :</label>
                                                            <div class="col-sm-8">
                                                                <input name="projname" id="projname" placeholder="Project / Department Name"
                                                                    class="form-control input-sm" required="" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-10">
                                                                <label class="checkbox-inline checkbox-right">
                                                                    <div id="check_store">
                                                                        <span class="checked">
                                                                            <input id="store_center" name="store_center"
                                                                                type="checkbox" class="styled" value="0">
                                                                        </span>
                                                                    </div>
                                                                    เลือกเป็น Store Center :
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Proj./Dep. Address
                                                                <!-- <a>
                                                        <span class="label label-primary" data-toggle="modal" data-target="#eart">
                                                            <i class="icon-sphere"></i>
                                                        </span>
                                                    </a> -->
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input name="projaddress" id="projaddress" placeholder="Project / Department Address"
                                                                    class="form-control input-sm" required="" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label" for="custype">Project Type</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control input-sm" name="custype" id="custype">
                                                                    <option value="">----- Pleace Select -----</option>
                                                                    <?php
                                                                    foreach ($getjobtype as $type) { ?>
                                                                    <option value="<?php echo $type->type_code; ?>">
                                                                        <?php echo $type->type_name; ?>
                                                                    </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label" for="custype">Business Unit</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control input-sm" name="bucode" id="bucode">
                                                                    <?php
                                                                    foreach ($getbusi as $type) { ?>
                                                                    <option value="<?php echo $type->business_code; ?>">
                                                                        <?php echo $type->business_name; ?>
                                                                    </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">W/T(%) :</label>
                                                            <div class="col-sm-8">
                                                                <input name="project_wt" id="wt" placeholder="W/T(%)" value="3" class="form-control input-sm"
                                                                    type="text">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Vat(%) :</label>
                                                            <div class="col-sm-8">
                                                                <input name="project_vat" id="vat" placeholder="Vat(%)" value="7"
                                                                    class="form-control input-sm" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Jobs Detail :</label>
                                                            <div class="col-sm-8">
                                                                <textarea class="form-control input-sm" name="projectdetail"
                                                                    rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-5 col-sm-offset-1">
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Insurance Contract/Year :</label>
                                                            <div class="col-sm-6">
                                                                <input name="insurcontract" placeholder="กรอกระยะเวลาสัญญา"
                                                                    class="form-control input-sm" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Start Project/Dep :</label>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            <i class="icon-calendar22"></i>
                                                                        </span>
                                                                        <input type="date" class="form-control input-sm" id="startproject"
                                                                            name="startproject">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Close Project/Dep :</label>
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="icon-calendar22"></i>
                                                                    </span>
                                                                    <input type="date" class="form-control input-sm" id="endtproject"
                                                                        name="endtproject">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">A/C I/C Primary :</label>
                                                            <div class="col-sm-2">
                                                                <input type="text" id="accno" class="form-control input-sm"
                                                                    readonly="" name="accno">
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="input-group">
                                                                    <input name="accountname" id="accountname" required
                                                                        class="form-control input-sm" type="text" readonly="">
                                                                    <div class="input-group-btn">
                                                                        <a class="primary btn btn-info btn-icon input-sm"
                                                                            data-toggle="modal" data-target="#primary">
                                                                            <i class="icon-search4"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">A/C I/C Secondary :</label>
                                                            <div class="col-md-2">
                                                                <input type="text" id="acc_no" class="form-control input-sm"
                                                                    readonly="" name="acc_no">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <input name="acc_name" id="acc_name" required class="form-control input-sm"
                                                                        type="text" readonly="">
                                                                    <div class="input-group-btn">
                                                                        <a class="secondary btn btn-info btn-icon input-sm"
                                                                            data-toggle="modal" data-target="#secondary">
                                                                            <i class="icon-search4"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Advance :</label>
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <input name="projectadvance_1" placeholder="" class="form-control input-sm"
                                                                        type="text" value="0.00" style="text-align: right;">
                                                                    <span class="input-group-addon bg-primary">%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Less Retention :</label>
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <input name="projectlessretention" class="form-control input-sm"
                                                                        type="text" value="0.00" style="text-align: right;">
                                                                    <span class="input-group-addon bg-primary "> % </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Less Advance :</label>
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <input name="projectlessadvance" placeholder="" class="form-control input-sm"
                                                                        type="text" value="0.00" style="text-align: right;">
                                                                    <span class="input-group-addon bg-primary"> % </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Less Retention Method :</label>
                                                            <div class="col-sm-6">
                                                                <select class="form-control input-sm " name="retentionmethod ">
                                                                    <option value="1 ">Progress</option>
                                                                    <option value="2 ">Progress + Vat</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-md-10 "></div>
                                                <div class="col-md-1 " style="text-align: right; ">
                                                    <a href="<?php echo base_url(); ?>data_master/setup_project_main" type="button"
                                                        class="btn btn-default"> Close </a>
                                                </div>
                                                <div class="col-md-1">
                                                    <a type="button" class="btn btn-primary btnNext"> Next </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Tab 1 -->


                                        <!-- start Tab 2 -->
                                        <div class="tab-pane active" id="bottom-tab2">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="col-sm-3">
                                                                <a class="btn btn-default btn-icon btn-xs">
                                                                    GL for IC &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <input type="checkbox" class="styled" id="" name="chkgl"
                                                                        value="1">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-3">
                                                                <a class="btn btn-default btn-icon btn-xs">
                                                                    Control BOQ &nbsp;
                                                                    <input type="checkbox" class="styled" id="chkconbqq"
                                                                        name="chkconbqq" value="1">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Control Budget :</label>
                                                            <div class="col-sm-6">
                                                                <select type="text" class="form-control input-sm" id="controlbg"
                                                                    name="controlbg">
                                                                    <option value="1">Not Control</option>
                                                                    <option value="2">By Summary Cost Code</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Tender No/BOQ Control :</label>
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control input-sm" id="bd_tenid"
                                                                        name="bd_tenid" readonly="true">
                                                                    <input type="text" class="form-control input-sm" id="bd_tenname"
                                                                        name="bd_tenname" readonly="true">
                                                                    <span class="input-group-btn">
                                                                        <button type="button" data-toggle="modal" data-target="#tender" class="tender btn btn-info btn-icon btn-xs">
                                                                            <i class="icon-search4"></i>
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Contract Amount :</label>
                                                            <div class="col-sm-6">
                                                                <input name="projectval" id="projectval" placeholder="กรอกมูลค่าโครงการ"
                                                                    class="form-control input-sm" type="text">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="col-sm-2">
                                                                <a class="insrows btn bg-info">
                                                                    <i class="icon-plus2"></i> เพิ่มระบบงาน</a>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-12" id="tdetailx">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-xxs table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <td width="5px;">No.</td>
                                                                                <td>Job Name</td>
                                                                                <td>Job Amount</td>
                                                                                <td>active</td>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="body"></tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-10"></div>
                                                    <div class="col-md-1" style="text-align: right;">
                                                        <a type="button" class="btn btn-default btnPrevious"> Previous </a>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a type="button" class="btn btn-primary btnNext"> Next </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Tab 2 -->

                                        <!-- Start Tab 3 -->
                                        <div class="tab-pane" id="bottom-tab3">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="col-sm-3">
                                                                <a class="badmin btn bg-info">
                                                                    <i class="icon-plus2"></i> เพิ่มผู้ดูแล</a>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-12" id="tdetail">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-xxs table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <td width="5px;">No.</td>
                                                                                <td>Name</td>
                                                                                <td>Position</td>
                                                                                <td>Telephone</td>
                                                                                <td>Email</td>
                                                                                <td>Active</td>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="bodyadmin">
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-10"></div>
                                                    <div class="col-md-1" style="text-align: right;">
                                                        <a type="button" class="btn btn-default btnPrevious"> Previous </a>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a type="button" class="btn btn-primary btnNext"> Next </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- End Tab 3 -->

                                        <!-- Start Tab 4 -->
                                        <div class="tab-pane" id="bottom-tab4">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Owner Code :</label>
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <input name="ownercode" id="ownercode" readonly=""
                                                                        placeholder="กรอกรหัสเจ้าของโครงการ" required class="form-control input-sm"
                                                                        type="text">
                                                                    <div class="input-group-btn">
                                                                        <a class="debtor btn btn-info btn-icon input-sm"
                                                                            data-toggle="modal" data-target="#debtorshow">
                                                                            <i class="icon-search4"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Owner Name (TH) :</label>
                                                            <div class="col-sm-6">
                                                                <input name="ownername_th" id="ownername_th" placeholder="กรอกชื่อภาษาไทย"
                                                                    class="form-control input-sm" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Owner Name (EN) :</label>
                                                            <div class="col-sm-6">
                                                                <input name="ownername_en" id="ownername_en" placeholder="กรอกชื่อภาษาอังกฤษ"
                                                                    class="form-control input-sm" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Address :</label>
                                                            <div class="col-sm-6">
                                                                <textarea class="form-control input-sm" name="owner_address"
                                                                    id="owner_address" rows="4" cols="40" placeholder="กรอกชื่อที่อยู่"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Telephone :</label>
                                                            <div class="col-sm-6">
                                                                <input name="owner_phonenumber" id="owner_phonenumber"
                                                                    placeholder="เบอร์โทร" class="form-control input-sm"
                                                                    type="tel">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">FAX :</label>
                                                            <div class="col-sm-6">
                                                                <input name="owner_fax" id="owner_fax" placeholder="แฟกซ์"
                                                                    class="form-control input-sm" type="tel">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">E-Mail :</label>
                                                            <div class="col-sm-6">
                                                                <input name="owner_email" id="owner_email" placeholder="อีเมล"
                                                                    class="form-control input-sm" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="col-sm-3">
                                                                <a class="bcontact btn bg-info">
                                                                    <i class="icon-plus2"></i> เพิ่มผู้ติดต่อโครงการ</a>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-xxs table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <td width="5px;">No.</td>
                                                                                <td>Name</td>
                                                                                <td>Position</td>
                                                                                <td>Telephone</td>
                                                                                <td>Email</td>
                                                                                <td>Active</td>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="bodycontact">
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-10"></div>
                                                    <div class="col-md-1" style="text-align: right;">
                                                        <a type="button" class="btn btn-default btnPrevious"> Previous </a>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a type="button" class="btn btn-primary btnNext"> Next </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Tab 4 -->

                                        <!-- Start Tab 5 -->
                                        <div class="tab-pane" id="bottom-tab5">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="col-sm-3">
                                                                <a class="bconsult btn bg-info">
                                                                    <i class="icon-plus2"></i> เพิ่มที่ปรึกษาโครงการ</a>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-12" id="tdetail">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-xxs table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <td width="5px;">No.</td>
                                                                                <td>Name</td>
                                                                                <td>Position</td>
                                                                                <td>Telephone</td>
                                                                                <td>Email</td>
                                                                                <td>Active</td>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="bodyconsult">
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-10"></div>
                                                    <div class="col-md-1" style="text-align: right;">
                                                        <a type="button" class="btn btn-default btnPrevious"> Previous </a>
                                                    </div>
                                                    <!-- <div class="col-md-1">
                                                        <a type="button" class="btn btn-primary btnNext"> Next </a>
                                                    </div> -->
                                                    <div class="col-md-1">
                                                        <button type="button" id="save" class="save btn btn-success">
                                                            <i class="icon-floppy-disk"></i> Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Tab 5 -->


                                        <!-- Start Tab 6 -->
                                        <div class="tab-pane" id="bottom-tab6">
                                            <div class="panel-body">
                                                <?php foreach ($sub_add as $key_add => $add_data) {
                                // var_dump($add_data);
                            ?>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">SubContactor Name (TH) :</label>
                                                            <div class="col-sm-6">
                                                                <input name="contractor_name_th" placeholder="กรอกชื่อภาษาไทย"
                                                                    class="form-control input-sm" type="text" value="<?= $add_data->company_name ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">SubContactor Name (EN) :</label>
                                                            <div class="col-sm-6">
                                                                <input name="contractor_name_en" placeholder="กรอกชื่อภาษาอังกฤษ"
                                                                    class="form-control input-sm" type="text" value="<?= $add_data->company_name ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Address :</label>
                                                            <div class="col-sm-6">
                                                                <textarea class="form-control input-sm" name="contractor_address"
                                                                    rows="4" cols="40" placeholder="กรอกชื่อที่อยู่"><?= $add_data->company_add_en ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Telephone :</label>
                                                            <div class="col-sm-6">
                                                                <input name="contractor_phonenumber" placeholder="เบอร์โทร"
                                                                    class="form-control input-sm" type="tel" value="<?= $add_data->company_tel ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">FAX :</label>
                                                            <div class="col-sm-6">
                                                                <input name="contractor_fax" placeholder="แฟกซ์" class="form-control input-sm"
                                                                    type="tel" value="<?= $add_data->company_fax ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">E-Mail :</label>
                                                            <div class="col-sm-6">
                                                                <input name="contractor_email" placeholder="อีเมล" class="form-control input-sm"
                                                                    type="text" value="<?= $add_data->company_email ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="col-sm-3">
                                                                <a class="bsubpro btn bg-info">
                                                                    <i class="icon-plus2"></i> เพิ่มผู้ติดต่อผู้รับเหมา</a>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-xxs table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <td width="5px;">No.</td>
                                                                                <td>Name</td>
                                                                                <td>Position</td>
                                                                                <td>Telephone</td>
                                                                                <td>Email</td>
                                                                                <td>Active</td>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="bodysubpro">
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                            }
                            ?>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-10"></div>
                                                    <div class="col-md-1" style="text-align: right;">
                                                        <a type="button" class="btn btn-default btnPrevious"> Previous </a>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Tab 6 -->

                                    </div>
                                </div>
                            </div>
                        
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
    $('.btnNext').click(function() {
		$('.nav-tabs > .active').next('li').find('a').trigger('click');
	});
	$(".btnPrevious").click(function() {
		$('.nav-tabs > .active').prev('li').find('a').trigger('click');
	});

/*
	$('#subvali').click(function(event) {
		var ownername_th = $('#ownername_th').val();
		var ownercode = $('#ownercode').val();
		var owner_address = $('#owner_address').val();
		if (ownername_th == '')
			alert('กรุณากรอก ชื่อเจ้าของ');
		else if (ownercode == '')
			alert('กรุณากรอก รหัสเจ้าของ');
		else if (owner_address == '')
			alert('กรุณากรอก ที่อยู่เจ้าของ')
	});
*/
</script>

<!-- /clickable title -->
<div id="debtorshow" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Select Owner</h6>
            </div>
            <div class="modal-body">
                <div id="loaddebtor"></div>
            </div>
        </div>
    </div>
</div>
<div id="primary" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">เลือก Account Code</h6>
            </div>
            <div class="modal-body">
                <div id="loadprimary"></div>
            </div>
        </div>
    </div>
</div>
<div id="secondary" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">เลือกเจ้าของโครงการ</h6>
            </div>
            <div class="modal-body">
                <div id="loadsecondary"></div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.debtor').click(function() {
		$('#loaddebtor').html(
			"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
		);
		$('#loaddebtor').load('<?php echo base_url(); ?>index.php/share/debtor');
	});
	$('.primary').click(function() {
		$('#loadprimary').html(
			"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
		);
		$('#loadprimary').load(
			'<?php echo base_url(); ?>index.php/share/accchart1');
	});
	$('.secondary').click(function() {
		$('#loadsecondary').html(
			"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
		);
		$('#loadsecondary').load(
			'<?php echo base_url(); ?>index.php/share/accchart2');
	});
</script>

<div id="eart" class="modal fade" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h6 class="modal-title">Map</h6>
            </div>

            <div class="modal-body">
                <style>
                    html,
					body {
						height: 100%;
						margin: 0;
						padding: 0;
					}

					#map {
						width: 100%;
						height: 400px;
					}

					.controls {
						margin-top: 10px;
						border: 1px solid transparent;
						border-radius: 2px 0 0 2px;
						box-sizing: border-box;
						-moz-box-sizing: border-box;
						height: 32px;
						outline: none;
						box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
					}

					#searchInput {
						background-color: #fff;
						font-family: Roboto;
						font-size: 15px;
						font-weight: 300;
						margin-left: 12px;
						padding: 0 11px 0 13px;
						text-overflow: ellipsis;
						width: 50%;
					}

					#searchInput:focus {
						border-color: #4d90fe;
					}
				</style>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRbMoDPc_mTv3D3QPqe0Ar84nSvRhA8nk&libraries=places&callback=initMap"
                    async defer></script>
                <script>
                    /***** function ในการประกาศค่าเริ่มต้นให้กับแผนที่*****/
					function initMap() {

						/***** กำหนดรายละเอียดคุณสมบัติของแผนที่*****/
						var map = new google.maps.Map(document.getElementById('map'), {
							center: {
								lat: -33.8688,
								lng: 151.2195
							},
							zoom: 13
						});

						/***** กำหนดตำแหน่งที่ตั้งของ control ที่จะวางในแผนที่*****/
						var input = document.getElementById('searchInput');
						map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

						/***** เพิ่ม Feature ให้กับ textbox ให้สามารถพิมพ์ค้นหาสถานที่ได้*****/
						var autocomplete = new google.maps.places.Autocomplete(input);
						autocomplete.bindTo('bounds', map);

						var infowindow = new google.maps.InfoWindow();

						/***** กำหนดคุณสมบัติให้กับตัวพิกัดจุดหรือ marker *****/
						var marker = new google.maps.Marker({
							map: map,
							anchorPoint: new google.maps.Point(0, -29)
						});

						/***** ทำงานกับ event place_changed หรือเมื่อมีการเปลี่ยนแปลงค่าสถานที่ที่ค้นหา*****/
						autocomplete.addListener('place_changed', function() {
							infowindow.close();
							marker.setVisible(false);
							var place = autocomplete.getPlace();
							if (!place.geometry) {
								window.alert("ไม่ค้นพบพิกัดจากสถานที่ดังกล่าว");
								return;
							}

							/***** แสดงผลบนแผนที่เมื่อพบข้อมูลที่ต้องการค้นหา *****/
							if (place.geometry.viewport) {
								map.fitBounds(place.geometry.viewport);
							} else {
								map.setCenter(place.geometry.location);
								map.setZoom(17);
							}
							marker.setIcon(({
								url: place.icon,
								size: new google.maps.Size(71, 71),
								origin: new google.maps.Point(0, 0),
								anchor: new google.maps.Point(17, 34),
								scaledSize: new google.maps.Size(35, 35)
							}));
							marker.setPosition(place.geometry.location);
							marker.setVisible(true);

							/***** แสดงรายละเอียดผลลัพธ์การค้นหา *****/
							var address = '';
							if (place.address_components) {
								address = [
									(place.address_components[0] && place.address_components[0].short_name || ''),
									(place.address_components[1] && place.address_components[1].short_name || ''),
									(place.address_components[2] && place.address_components[2].short_name || '')
								].join(' ');
							}
							/***** แสดงรายละเอียดผลลัพธ์การค้นหาเป็น popup โดยมีชื่อและสถานที่ดังกล่าว *****/
							infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
							infowindow.open(map, marker);

							/***** แสดงรายละเอียดผลลัพธ์การค้นหา ซึ่งประกอบด้วย ที่อยู่ รหัสไปรษณีย์ ประเทศ ละติจูดและลองจิจูด *****/
							for (var i = 0; i < place.address_components.length; i++) {
								if (place.address_components[i].types[0] == 'postal_code') {
									document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
								}
								if (place.address_components[i].types[0] == 'country') {
									document.getElementById('country').innerHTML = place.address_components[i].long_name;
								}
							}
							document.getElementById('location').innerHTML = place.formatted_address;
							document.getElementById('lat').innerHTML = place.geometry.location.lat();
							document.getElementById('lon').innerHTML = place.geometry.location.lng();
						});
					}
				</script>

                <input id="searchInput" class="controls" type="text" placeholder="Enter a location">
                <div id="map"></div>
                <!--ส่วนของการแสดงรายละเอียดผลลัพธ์ที่ได้-->
                <ul id="geoData">
                    <li>ที่อยู่:
                        <span id="location"></span>
                    </li>
                    <li>รหัสไปรษณีย์:
                        <span id="postal_code"></span>
                    </li>
                    <li>ประเทศ:
                        <span id="country"></span>
                    </li>
                    <li>ละติจูด:
                        <span id="lat"></span>
                    </li>
                    <li>ลองจิจูด:
                        <span id="lon"></span>
                    </li>
                </ul>
            </div>

            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
</div>

<script>
    function showPreviewcomp(ele) {
		$('#imgcomp').attr('src', ele.value); // for IE
		if (ele.files && ele.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#imgcomp').attr('src', e.target.result);
			}
			reader.readAsDataURL(ele.files[0]);
		}
	}
	var projectval_total = 0;
	// add row job
	$(".insrows").click(function() {
		addrow();
		$("[name='job_amount[]']").each(function(index, el) {
			var val = $(el).val();
			projectval_total += (val * 1);

		});
		$("#projectval").val(projectval_total);

	});
	// add row admin

	function addrow() {
		var row = ($('#body tr').length - 0) + 1;
		var tr = '<tr>' +
			'<td>' + row + '<input type="hidden" name="chki[]" value="i"></td>' +
			'<td>' +
			'<select class="form-control input-sm" name="job_id[]">' +
			'<?php foreach ($getsystem as $sys) { ?>' +
			'<option value="<?php echo $sys->systemcode; ?>"><?php echo $sys->systemname; ?></option>' +
			'<?php } ?>' +
			'</select>' +
			'<td>' +
			'<input type="text" name="job_amount[]" class="form-control input-xs" value="0.00"/>' +
			'</td>' +
			'<td>' +
			'<a class="delete label label-danger del">Delete</a></td>' +
			'</td>' +
			'</tr>';
		$('#body').append(tr);
		$('.del').click(function(event) {
			// $(this).remove();
			$(this).parents("tr:first")[0].remove();
		});
		$("[name='job_amount[]']").keyup(function(event) {
			projectval_total = 0;
			$("[name='job_amount[]']").each(function(index, el) {
				var val = $(el).val();
				projectval_total += (val * 1);

			});
			$("#projectval").val(projectval_total);
		});
	}
	// adrows admin
	$(".badmin").click(function() {
		rowadmin();
	});

	function rowadmin() {
		// alert("5555");
		var row = ($('#bodyadmin tr').length - 0) + 1;
		var tr =
			`<tr>
                        <td>${row}<input type="hidden" name="chkadi[]" value="${row}"></td>
                        <td><input type="text" class="form-control input-sm" name="adminname[]"></td>
                        <td><input type="text" class="form-control input-sm" name="adminposi[]"></td>
                        <td><input type="text" class="form-control input-sm" name="admintel[]"></td>
                        <td><input type="text" class="form-control input-sm" name="adminemail[]"></td>
                        <td><a class="delete label label-danger del">Delete</a></td>
                      </tr>`;
		// alert(tr);
		$('#bodyadmin').append(tr);
		$('.del').click(function(event) {
			// $(this).remove();
			$(this).parents("tr:first")[0].remove();
		});
	}
	// close adrow admin
	// adrows contact
	$(".bcontact").click(function() {
		rowcontact();
	});

	function rowcontact() {
		// alert("5555");
		var row = ($('#bodycontact tr').length - 0) + 1;
		var tr =
			`<tr>
                        <td>${row}<input type="hidden" name="chkconi[]" value="${row}"></td>
                        <td><input type="text" class="form-control input-sm" name="contactname[]"></td>
                        <td><input type="text" class="form-control input-sm" name="contactposi[]"></td>
                        <td><input type="text" class="form-control input-sm" name="contacttel[]"></td>
                        <td><input type="text" class="form-control input-sm" name="contactemail[]"></td>
                        <td><a class="delete label label-danger del">Delete</a></td>
                      </tr>`;
		// alert(tr);
		$('#bodycontact').append(tr);
		$('.del').click(function(event) {
			// $(this).remove();
			$(this).parents("tr:first")[0].remove();
		});
	}
	// close adrow contact
	// adrows consult
	$(".bconsult").click(function() {
		rowconsult();
	});

	function rowconsult() {
		// alert("5555");
		var row = ($('#bodyconsult tr').length - 0) + 1;
		var tr =
			`<tr>
                          <td>${row}<input type="hidden" name="chkconsi[]" value="${row}"></td>
                          <td><input type="text" class="form-control input-sm" name="consultname[]"></td>
                          <td><input type="text" class="form-control input-sm" name="consultposi[]"></td>
                          <td><input type="text" class="form-control input-sm" name="consulttel[]"></td>
                          <td><input type="text" class="form-control input-sm" name="consultemail[]"></td>
                          <td><a class="delete label label-danger del">Delete</a></td>
                        </tr>`;
		// alert(tr);
		$('#bodyconsult').append(tr);
		$('.del').click(function(event) {
			// $(this).remove();
			$(this).parents("tr:first")[0].remove();
		});
	}
	// close adrow consult
	// adrows subpro
	$(".bsubpro").click(function() {
		rowsubpro();
	});

	function rowsubpro() {
		// alert("5555");
		var row = ($('#bodysubpro tr').length - 0) + 1;
		var tr =
			`<tr>
                          <td>${row}<input type="hidden" name="chksubsi[]" value="${row}"></td>
                          <td><input type="text" class="form-control input-sm" name="subproname[]"></td>
                          <td><input type="text" class="form-control input-sm" name="subproposi[]"></td>
                          <td><input type="text" class="form-control input-sm" name="subprotel[]"></td>
                          <td><input type="text" class="form-control input-sm" name="subproemail[]"></td>
                          <td><a class="delete label label-danger del">Delete</a></td>
                        </tr>`;
		// alert(tr);
		$('#bodysubpro').append(tr);
		$('.del').click(function(event) {
			// $(this).remove();
			$(this).parents("tr:first")[0].remove();
		});
	}
	// close adrow consult
</script>

<div class="modal fade" id="tender" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">BOQ</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    <div class="row" id="tenderr">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(".tender").click(function() {
        $('#tenderr').html(
            "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
        );
        $("#tenderr").load('<?php echo base_url(); ?>index.php/bd/modalbdtender');
    });
    $("#save").click(function() {

        if ($("#projno").val() == "") {
            swal({
                title: "กรุณากรอก Project Code!!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else if ($("#projname").val() == "") {
            swal({
                title: "กรุณากรอก Project Name !!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
            // }else if ($("#worktype").val()=="") {
            // swal({
            // title: "กรุณาเลือก ระบบงาน !!.",
            // text: "",
            // confirmButtonColor: "#EA1923",
            // type: "error"
            // });
        } else if ($("#typejob").val() == "") {
            swal({
                title: "กรุณาเลือก ลักษณะงาน !!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else if ($("#custype").val() == "") {
            swal({
                title: "กรุณาเลือก ประเภทงาน !!.",
                text: "Pleace Select Project Type",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else if ($("#wt").val() == "") {
            swal({
                title: "กรุณากรอก W/T(%) !!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else if ($("#vat").val() == "") {
            swal({
                title: "กรุณากรอก Vat(%)!!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } 
/*
        else if ($("#ownercode").val() == "") {
            swal({
                title: "กรุณาเลือกรหัสเจ้าของโครงการ!!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else if ($("#ownername_th").val() == "") {
            swal({
                title: "กรุณากรอกชื่อเจ้าของงาน(TH)!!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        }
*/
         else if ($("#projectval").val() == "") {
            swal({
                title: "กรุณากรอกมูลค่าโครงการ!!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else if ($("#startproject").val() == "") {
            swal({
                title: "กรุณากรอกเริ่มต้นโครงการ!!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else {
            //    swal({
            //     title: "ok !!.",
            //     text: "",
            //     confirmButtonColor: "#EA1923",
            //     type: "error"
            // });
            var project_codesend = $('#projno').val();
            var tdb = $("#bd_tenid").val();
            var frm = $('#formdata');
            frm.submit(function(ev) {
                $(".page-container").html('<div class="loading">Loading&#8230;</div>');
                var data = new FormData(frm[0]);
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    // data: frm.serialize(),
                    data: data,
                    async: false,
                    success: function(data) {

                        alert(data);
                        // return false;
                        // console.log(data);
                        swal({
                            title: "Save Completed!!",
                            text: "Save Completed!!.",
                            // confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                        setTimeout(function() {

                            window.location.href =
                                "<?php echo base_url(); ?>data_master/approve_prpo/" + project_codesend+ "/" + tdb;

                        }, 500);
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
                ev.preventDefault();
            });

            $("#formdata").submit(); //Submit  the FORM
        }
    });



    $('#check_store').click(function(event) {
        var data = $('#store_center').val();
        if (data == 0) {
            $('#store_center').val("1");
            // alert(data)
        } else if (data == 1) {
            $('#store_center').val("0");
            // alert(data)
        }
    });
</script>