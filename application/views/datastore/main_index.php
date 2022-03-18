<div class="content-wrapper" id="sub_main">
    <div class="content">

        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-flat">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="active">
                            <a href="#bottom-tab1" data-toggle="tab">MASTER SETUP OVERVIEW </a>
                        </li>
                    </ul>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="panel">
                                    <div class="panel-body text-center">
                                        <div class="icon-object border-blue text-blue">
                                            <a href="#"></a>
                                            <i class="icon-office"></i>
                                        </div>
                                        <h5 class="text-semibold">SETUP GENERAL</h5>

                                        <a href="#" class="btn bg-blue-400" onclick="active_side($(this))" id="btn_mg"
                                            attr_id="mg" status="true">OPEN</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="panel">
                                    <div class="panel-body text-center">
                                        <div class="icon-object border-blue text-blue">
                                            <i class="icon-file-spreadsheet"></i>
                                        </div>
                                        <h5 class="text-semibold">SETUP COST CONTROL</h5>

                                        <a href="#" class="btn bg-blue-400" onclick="active_side($(this))" id="btn_mcc"
                                            attr_id="mcc" status="true">OPEN</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="panel">
                                    <div class="panel-body text-center">
                                        <div class="icon-object border-blue text-blue">
                                            <i class="icon-files-empty"></i>
                                        </div>
                                        <h5 class="text-semibold">SETUP PR</h5>

                                        <a href="#" class="btn bg-blue" onclick="active_side($(this))" id="btn_mpr"
                                            attr_id="mpr" status="true">OPEN</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="panel">
                                    <div class="panel-body text-center">
                                        <div class="icon-object border-blue text-blue">
                                            <i class="icon-files-empty2"></i>
                                        </div>
                                        <h5 class="text-semibold">SETUP PO</h5>

                                        <a href="#" class="btn bg-blue" onclick="active_side($(this))" id="btn_mpo"
                                            attr_id="mpo" status="true">OPEN</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="panel">
                                    <div class="panel-body text-center">
                                        <div class="icon-object border-blue text-blue">
                                            <i class="icon-store"></i>
                                        </div>
                                        <h5 class="text-semibold">SETUP INVENTORY</h5>

                                        <a href="#" class="btn bg-blue-400" onclick="active_side($(this))" id="btn_mic"
                                            attr_id="mic" status="true">OPEN</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="panel">
                                    <div class="panel-body text-center">
                                        <div class="icon-object border-blue text-blue">
                                            <i class="icon-box"></i>
                                        </div>
                                        <h5 class="text-semibold">SETUP FIX ASSET</h5>

                                        <a href="#" class="btn bg-blue-400" onclick="active_side($(this))" id="btn_mfa"
                                            attr_id="mfa" status="true">OPEN</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="panel">
                                    <div class="panel-body text-center">
                                        <div class="icon-object border-blue text-blue">
                                            <i class="icon-coins"></i>
                                        </div>
                                        <h5 class="text-semibold">SETUP ACCOUNT</h5>

                                        <a href="#" class="btn bg-blue" onclick="active_side($(this))" id="btn_ma"
                                            attr_id="ma" status="true">OPEN</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="panel">
                                    <div class="panel-body text-center">
                                        <div class="icon-object border-blue text-blue">
                                            <i class="icon-download"></i>
                                        </div>
                                        <h5 class="text-semibold">Download Template</h5>

                                        <a href="<?php echo base_url();?>data_master/downloadsample"
                                            class="btn bg-blue">OPEN</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
function active_side(el) {
    var id = el.attr('attr_id');
    var btn_id = el.attr('id');
    var status = el.attr('status');
    console.log(status);
    if (status == 'true') {
        $(".nav_ms[id!=" + id + "]").removeClass('active');
        $(".nav_ms[id!=" + id + "]").children().next().css('display', 'none');
        $(".btn_ms[id!=" + id + "]").attr('status', 'true');
        $('#' + id).addClass('active');
        el.attr('status', 'false');
        $('#' + id).children().next().css('display', 'block');
    } else {
        $('#' + id).removeClass('active');
        el.attr('status', 'true');
        $('#' + id).children().next().css('display', 'none');
    }
}
</script>