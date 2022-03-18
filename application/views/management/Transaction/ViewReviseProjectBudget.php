<style type="text/css">
    .fixed {
        position: fixed;
        /*background: #fff;*/
        z-index: 10;
        width: 90%;
    }

    .content-wrapper {
        padding-top: 20px;
    }
</style>

<!-- Rounded basic tabs -->
<div class="container-fluid content-wrapper">
    <div class="col-md-12">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <i class="icon-folder4"></i> Revise Project Budget
                    <p></p>
                </h5>
            </div>
            <div class="panel-body">
                <div class="tabbable">
                    <ul class="nav nav-tabs nav-tabs-component">
                        <li class="active">
                            <a href="#basic-rounded-tab1" id="clickproj" data-toggle="tab">Project</a>
                        </li>
                        <li>
                            <a href="#basic-rounded-tab2" id="clickdpt" data-toggle="tab">Department</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="basic-rounded-tab1">
                            <div id="loadprj"></div>
                        </div>
                        <div class="tab-pane" id="basic-rounded-tab2">
                            <div id="loaddpt"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /rounded basic tabs -->

<!-- /main content -->
<script type="text/javascript">
    // $(document).ready(function() {
        $('#loadprj').html(
            "<div class='progress'><div class='progress-bar progress-bar-info progress-bar-striped active' style='width: 100%'><span class='sr-only'>100% Complete (info)</span></div></div>"
        );
        $('#loadprj').load("<?php echo base_url(); ?>bd/select_project_revise");
    // });

    $("#clickproj").click(function() {
        $('#loadprj').html(
            "<div class='progress'><div class='progress-bar progress-bar-info progress-bar-striped active' style='width: 100%'><span class='sr-only'>100% Complete (info)</span></div></div>"
        );
        $('#loadprj').load("<?php echo base_url(); ?>bd/select_project_revise");
    });
    $("#clickdpt").click(function() {
        $('#loaddpt').html(
            "<div class='progress'><div class='progress-bar progress-bar-info progress-bar-striped active' style='width: 100%'><span class='sr-only'>100% Complete (info)</span></div></div>"
        );
        $('#loaddpt').load("<?php echo base_url(); ?>bd/select_department_revise");
    });
    $('#revise').attr('class', 'active');
	$('#revisebudget').attr('style', 'background-color:#dedbd8');
</script>