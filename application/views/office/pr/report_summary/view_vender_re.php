<div class="page-header page-header-transparent">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"></span>Report</h4>
        </div>
        <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
    </div>
    <div class="breadcrumb-line breadcrumb-line-component">
        <ul class="breadcrumb">
            <li><a class="preload" href="<?php echo base_url(); ?>office/openblank"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Vender Report</li>
        </ul>
        <ul class="breadcrumb-elements">
            <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-gear position-left"></i>
                    Settings
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                    <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                    <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                </ul>
            </li>
        </ul>
        <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
    </div>
</div>
<div class="content">
    <div class="panel panel-flat">
        <div class="modal-header">
            <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Vender Report<p></p></h6>
        </div>
        <form action="vender_report_pr" method="get">
            <div class="panel-body">
                
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4" style="text-align: right;">Vender :</label>
                        <div class="col-sm-4">
                            <select class="select-border-color border-warning select2-hidden-accessible" name="vender" tabindex="-1" aria-hidden="true">
                                <option value="">--แสดงทั้งหมด--</option>
                                <?php foreach ($search['vender'] as $value) {?>
                                <option value="<?php echo $value->vender_code; ?>"><?php echo $value->vender_name; ?></option>
                                <?php   } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-sm-2"></div>
                <button type="submit" class="btn btn-success">Search</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </form>
    </div>
</div>