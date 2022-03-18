<!-- <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script> -->
<style type="text/css">
    .terminal {
        position: relative;


        padding: 4em 1em 1em;
        font-size: 1.25em;
        background: rgba(0, 0, 0, 0.9);
        /* margin: 3em auto;*/
        border-radius: 3px;
        box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.5);
        color: #FFFFFF;
    }

    .terminal .head {
        position: absolute;
        display: block;
        width: calc(100% - 2em);
        color: #333;
        top: 0;
        left: 0;
        padding: 1em;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        background: #fafafa;
    }

    .prompt {
        display: inline;
    }

    .buttons,
    .title {
        width: auto;
        float: left;
    }

    .buttons {
        width: 5em;
    }

    .buttons * {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #35cf76;
    }

    .buttons .close {
        background: #e74c3c;
    }

    .buttons .minimize {
        background: #f1c40f;
    }

    .buttons .maximize {
        background: #35cf76;
    }

    .typed-cursor {
        display: inline;
        opacity: 1;
        -webkit-animation: blink 0.7s infinite;
        animation: blink 0.7s infinite;
    }

    @-webkit-keyframes blink {
        0% {
            opacity: 1;
        }
        50% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    @keyframes blink {
        0% {
            opacity: 1;
        }
        50% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }
</style>

<div class="content">
    <div class="row">
        <?php
            $online = "<span class='label bg-success-400'>online</span>";
            $offline = "<span class='label bg-grey-400'>offline</span>";
        
        ?>
        <!-- <pre>
			<?php //var_dump($data_online)?>
		</pre> -->
        <div class="form-group">
            <!-- <a class="btn btn-primary" href="<?php echo base_url(); ?>test/update_venderid">update_vender_id_to_po_vender_id</a></div>
					<a class="btn btn-primary" href="<?php echo base_url(); ?>test/testmat">update_material_name_for_po_item</a>
					<a class="btn btn-primary" href="<?php echo base_url(); ?>test/updatematstore">update_material_name_for_store</a>
					<a class="btn btn-primary" href="<?php echo base_url(); ?>udp_digitmatcode/updateitem_matcode">Update Didit All Material</a> -->
            <button data-toggle="modal" data-target="#progress" class="btn btn-primary" id="prog">Update Data Structure</button>
            <button data-toggle="modal" class="btn btn-info" id="usrlog">Online Users</button>
            <a href="<?php echo base_url();?>data_structure/userlog" class="btn bg-blue">Users Logs</a>
            <button class="btn btn-info" id="install-report">Install Report Flax</button>
            <!-- <button class="btn btn-info" id="install-reportjs">Install Report JS</button> -->
            <button class="btn btn-danger" id="truncate" data-toggle="modal" data-target="#truncate_table">Truncate Table</button>
        </div>

    </div>
   <div class="setupdefualt"></div>
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="form-group">
                    <form action="<?php echo base_url(); ?>index.php/upload/backgroundupload" method="post" enctype="multipart/form-data">
                        <?php if($background[0]['background_login']==""){?>
                            <img src="<?php echo base_url();?>assets/images/backgrounds/mature.jpg" id="bgimg" class="img-responsive">
                        <?php }else{?>
                            <img src="<?php echo base_url();?>profile/<?php echo $background[0]['background_login'];?>" id="bgimg" class="img-responsive">
                        <?php } ?>
                            <input type="file" class="file-input" name="uploadfile" size="10" OnChange="showPreviewbg(this)">
                            <button type="submit" class="btn btn-primary btn-block">Save Picture</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="modal fade" id="progress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="panel-body">
                    <p>กำลังโหลดข้อมูล</p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--end modal -->

    <div class="modal fade" id="install_report_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="panel-body">
                    <div id="loading" style="display: none;">
                        <p>กำลังโหลดข้อมูล</p>
                        <div class="progress">
                            <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
                        </div>
                    </div>
                    <div id="input-code" class="form-group">
                        <label>ConnectionStringEncrypted</label>
                        <input class="form-control" type="input" id="ConString" placeholder="ConnectionStringEncrypted">
                        <a href="#" class="btn btn-info pull-right" style="margin-top: 5px;" id="install">install</a>
                    </div>
                    <div id="display">

                    </div>
                    <div class="terminal col-md-12" id="cmd" style="margin-top: 40px;padding-right: 0px;padding-bottom: 0px;">
                        <div class="head" style="width: 100%;">

                            <div class="title" id="cmd-title">
                                <!-- {{log name}} -->terminal</div>
                        </div>
                        <p id="cmd-content" style="min-height:60vh;  max-height: 60vh; max-width:100%;  overflow-y: scroll; ;word-wrap: initial">

                            <!-- {{log content}}-->
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--end modal -->
    <div class="modal fade" id="install_report_modaljs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="panel-body">
                    <div id="loadingjs" style="display: none;">
                        <p>กำลังโหลดข้อมูล</p>
                        <div class="progress">
                            <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
                        </div>
                    </div>
                    <div id="input-codejs" class="form-group">
                        <label>ConnectionStringEncrypted</label>
                        <input class="form-control" type="input" id="ConStringjs" placeholder="ConnectionStringEncrypted">
                        <a href="#" class="btn btn-info pull-right" style="margin-top: 5px;" id="installjs">install</a>
                    </div>
                    <div id="display">

                    </div>
                    <div class="terminal col-md-12" id="cmd" style="margin-top: 40px;padding-right: 0px;padding-bottom: 0px;">
                        <div class="head" style="width: 100%;">

                            <div class="title" id="cmd-title">
                                <!-- {{log name}} -->terminal</div>
                        </div>
                        <p id="cmd-contentjs" style="min-height:60vh;  max-height: 60vh; max-width:100%;  overflow-y: scroll; ;word-wrap: initial">

                            <!-- {{log content}}-->
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--end modal -->




    <div class="modal fade" id="mlog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="panel-body" id="panel-content-mlog">
                    <div id="load">
                        <p>กำลังโหลดข้อมูล</p>
                        <div class="progress">
                            <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
                        </div>
                    </div>

                    <table id="table" class="display table table-responsive" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>status</th>
                                <th>รหัสพนักงาน</th>
                                <th>ชื้อ</th>
                                <th>user name</th>
                                <th>ใช้งานครั้งล่าสุด</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php foreach ($data_online as $key => $user) {?>
                            <tr>
                                <td id="<?=$user[" m_code"]?>" ="">
                                    <?=($user["LoginStatus"] == "1") ? $online : $offline?>
                                </td>
                                <td>
                                    <?=$user["m_code"]?>
                                </td>
                                <td>
                                    <?=$user["m_name"]?>
                                </td>
                                <td>
                                    <?=$user["m_user"]?>
                                </td>
                                <td>
                                    <?=$user["LastUpdate"]?>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger check_out <?=($user[" LoginStatus"]=="1" ) ? "" :
                                        "disabled" ?>"
                                        m_code="
                                        <?=$user["m_code"]?>"
                                        m_user="
                                        <?=$user["m_user"]?>"
                                        onclick="check_out($(this));"
                                        >check out</a></td>

                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>



            </div>
        </div>
    </div>
    <!--end modal -->

    <div id="truncate_table" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Truncate Table</h4>
                </div>
                <div class="modal-body">
                    <p>กำลังโหลดข้อมูล</p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


    <script>
        function show_alert(type, title, text, confirmButtonColor) {
            swal({
                title: title,
                text: text,
                confirmButtonColor: confirmButtonColor,
                type: type
            });
        }

        var online = "<span class='label bg-success-400'>online</span>";
        var offline = "<span class='label bg-grey-400'>offline</span>";

        $("#prog").click(function() {
            var url = "<?php echo base_url(); ?>programmer/datastructure";
            var dataSet = {};
            $.post(url, dataSet, function(data) {
                if ($.trim(data) == "true") {
                    show_alert("success", "Completed!!", "Update Data Structure" + data, "#00F000");
                    // swal({
                    // 	title: "Completed!!",
                    // 	text: "Update Data Structure"+data,
                    // 	confirmButtonColor: "#00F000",
                    // 	type: "success"
                    // });
                    $("#progress").modal('hide');
                } else {
                    show_alert("error", "Error!!", "error ", "#00F000");
                    // swal({
                    // 	title: "Error!!",
                    // 	text: "error ",
                    // 	confirmButtonColor: "#EB061C",
                    // 	type: "error"
                    // });
                }

            });
        });
        $('#table').DataTable();

        // show modal
        $("#usrlog").click(function(event) {
            $("#mlog").modal("show");
            $("#load").hide();
        });
        // show modal


        function check_out(el) {
            var btn = el;
            var m_code = el.attr("m_code");
            var m_user = el.attr("m_user");
            $.post('<?=base_url()?>data_structure/check_out_user', {
                m_code: m_code,
                m_user: m_user
            }, function() {
                /*optional stuff to do after success */
            }).done(function(data) {

                var json = jQuery.parseJSON(data);

                if (json.status) {
                    btn.addClass('disabled');
                    show_alert("success", "Completed!!", "check out success", "#00F000");
                    $("#" + m_code).html(offline);
                } else {
                    show_alert("error", "Error!!", "error ", "#00F000");
                }


            });
        }

                $("#setupdefualt").click(function(){
					$(".setupdefualt").html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
					$(".setupdefualt").load('<?php echo base_url(); ?>data_structure/load_sys_defualt');
				});



        $("#install-report").click(function(event) {
            $("#install_report_modal").modal("toggle");
            //$("#loading , #input-code").toggle(500);


        });
        $("#install").click(function(event) {
            //alert(5555);
            var code = $("#ConString").val();
            if (code != "") {
                $("#loading , #input-code").toggle(500);
                $("#cmd-content").html("");
                $.post('<?=base_url()?>install_report/install', {
                    code: code
                }, function() {
                    /*optional stuff to do after success */
                }).done(function(data) {
                    // alert(data)
                    $("#cmd-content").html(data);
                    $("#loading , #input-code").toggle(500);

                    $("#cmd-content").animate({
                        scrollTop: 5000
                    }, 'slow');
                });

            }
            //return false;
        });
        $("#install-reportjs").click(function(event) {
            $("#install_report_modaljs").modal("toggle");
            //$("#loading , #input-code").toggle(500);


        });
        $("#installjs").click(function(event) {
            //alert(5555);
            var code = $("#ConStringjs").val();
            if (code != "") {
                $("#loadingjs , #input-codejs").toggle(500);
                $("#cmd-contentjs").html("");
                $.post('<?=base_url()?>install_report/installjs', {
                    code: code
                }, function() {
                    /*optional stuff to do after success */
                }).done(function(data) {
                    // alert(data)
                    $("#cmd-contentjs").html(data);
                    $("#loadingjs , #input-codejs").toggle(500);

                    $("#cmd-contentjs").animate({
                        scrollTop: 5000
                    }, 'slow');
                });

            }
            //return false;
        });

        $('#truncate').click(function(event) {
            // $('#content_table').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
            // $.get('<?= base_url() ?>data_structure/clear_data', function(data) {}).done(function(data) {
            //     $('#content_table').html(data);
            // });
             var url = "<?php echo base_url(); ?>programmer/truncatedata";
            var dataSet = {};
            $.post(url, dataSet, function(data) {
                if (data == "true") {
                    show_alert("success", "Completed!!", "Update Data Structure" + data, "#00F000");
                    $("#truncate_table").modal('hide');
                } else {
                    show_alert("error", "Error!!", "error ", "#00F000");
                }

            });
        });
function showPreviewbg(ele){
    $('#bgimg').attr('src', ele.value); // for IE
        if (ele.files && ele.files[0]) {

            var reader = new FileReader();

            reader.onload = function (e) {
                $('#bgimg').attr('src', e.target.result);
            }

            reader.readAsDataURL(ele.files[0]);
        }
  }
    </script>