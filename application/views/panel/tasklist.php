<?php
$session_data = $this->session->userdata('sessed_in');
$username = $session_data['username'];

?>



<div class="content-wrapper">
    <div class="content">
        <div class="col-md-3">
            <div class="panel panel-body border-top-primary">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?= base_url() ?>data_master/new_project" class="btn border-warning text-warning-600 btn-flat btn-icon btn-xs pull-right">
                        <i class="fa fa-plus"></i>
                        </a>
                    </div>
                    <?php
                        $i=1;
                        foreach ($project as $key => $value) {
                    ?>
                    <div class="col-md-12">
                        <label><?=$i++?>. <?= $value->project_name ?></label>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-body">
                <span class="label label-info" onclick="addRoot()" style="cursor:pointer"><i class="fa fa-plus"></i> Add</span>
                <div id="input"></div>
                <ul class="fa-ul" id="root">
                    <?php
                        foreach ($map as $key => $data_1) {
                            if (is_array($data_1)) {
                                echo '<li id="'.$key.'"><i class="fa fa-folder-open fa-lg"></i> '.$key.'  <span class="label label-success" onclick="addChild($(this))" path_file="'.$key.'"><i class="fa fa-plus"></i> Add</span></li>';
                               foreach ($data_1 as $key_2 => $data_2) {

                                    if (is_array($data_2)) {
                                        echo '<ul class="fa-ul"><li id="file_'.$key_2.'"><i class="fa fa-folder-open fa-lg"></i> '.$key_2.' <span class="label label-danger" name_append="'.$key_2.'" onclick="addChild_last($(this))" path_file="'.$key.'/'.$key_2.'"><i class="fa fa-plus"></i> Add</span></li>';

                                        foreach ($data_2 as $key_3 => $data_3) {
                    ?>
                                        <form method="post" action="<?php echo base_url(); ?>tasklist/download_file">
                                            <input type="hidden" name="name" value="<?= $data_3 ?>">
                                            <input type="hidden" name="path" value="<?= $key.'/'.$key_2.'/'.$data_3 ?>">
                                              <ul class="fa-ul">
                                                <button type="submit" class="label label-flat text-primary-600" >
                                                    <li><i class="fa fa-file-text"></i> <?= $data_3 ?></li>
                                                </button>
                                            </ul>
                                        </form>
                    <?php                  

                                        }
                                    echo "</ul>";
                                    }else{
                    ?>  
                                        <form method="post" action="<?php echo base_url(); ?>tasklist/download_file">
                                            <input type="hidden" name="name" value="<?= $data_2 ?>">
                                            <input type="hidden" name="path" value="<?= $key.'/'.$data_2 ?>">
                                            <ul class="fa-ul">
                                                <button type="submit" class="label label-flat text-primary-600" >
                                                    <li><i class="fa fa-file-text"></i> <?= $data_2 ?></li>
                                                </button>
                                            </ul>
                                        </form>
                    <?php
                                    }
                               }
                            }else{

                    ?>
                        <form method="post" action="<?php echo base_url(); ?>tasklist/download_file_tmp">
                            <input type="hidden" name="name" value="<?= $data_1 ?>">
                            <button type="submit" class="label label-flat text-primary-600" >
                            <li><i class="fa fa-file-text"></i> <?= $data_1 ?></li>
                            </button>
                        </form>
                    <?php
                            }
                        }
                    ?>

                </ul>


            </div>
        </div>
    </div>
</div>


<script>
        function addChild_last(el) {
            var path =  el.attr('path_file');
            var name_append =  el.attr('name_append');
            var input = '<div class="form_file form-group">'+
                        '<div class="col-md-10">'+
                        '<div class="input-group">'+
                        '<form id="file_addChild_last" method="post" enctype="multipart/form-data">'+
                        '<input type="file" name="file_up" class="file_child form-control" type_file="1">'+
                        '<input type="hidden" name="path" value="'+path+'">'+
                        '</form>'+
                        '<span class="input-group-btn">'+
                        '<button class="btn bg-info add" path_file="'+path+'" name_append="'+name_append+'" onclick="confile($(this))">Add</button>'+
                        '</span>'+
                        '</div>'+
                        '</div>'+
                        '<div class="col-md-2">'+
                        '<button class="btn btn-danger btn-icon"><i class="fa fa-close"></i></button>'+
                        '</div>'+
                        '</div>';
            el.parent().append(input);

            $('.btn-icon').click(function(event) {
               $('.form_file').remove();
            });
        }

        function confile(el) {
            var val = $('.file_child').val();
            var path =  el.attr('path_file');
            var name_append =  el.attr('name_append');
            if (val != "") {
                // alert(name_append);
                console.log(name_append);
                var formData = new FormData($("#file_addChild_last")[0]);
                    $.ajax({
                        url: '<?=base_url()?>tasklist/createFile',
                        type: 'POST',
                        data: formData,
                        contentType: 'multipart/form-data',
                        async: false,
                        success: function (data) {
                            console.log(data);
                          try{
                             var json = jQuery.parseJSON(data);
                             console.log(json);
                             if(json.status == true){
                            var list =  '<form method="post" action="<?php echo base_url(); ?>tasklist/download_file">'+
                                            '<input type="hidden" name="name" value="'+json.name+'">'+
                                            '<input type="hidden" name="path" value="'+json.path+json.name+'">'+
                                            '<ul class="fa-ul">'+
                                            '<button type="submit" class="label label-flat text-primary-600" >'+
                                            '<li><i class="fa fa-file-text"></i>'+json.name+'</li>'+
                                            '</button>'+
                                            '</ul>'+
                                            '</form>';
                                $('#file_'+name_append).append(list);
                                $('.form_file').remove();
                                swal('สำเร็จ',json.message,'success');
                                
                             }else{
                              
                                alert(json.message);
                             }
                          }catch(e){
                                 alert(e);
                          }
                      },
                      cache: false,
                      contentType: false,
                      processData: false
                });    
     
            }else{
               swal(
                'ผิดพลาด!',
                'กรุณา กรอกชื่อ หรือ ใส่ไฟล์',
                'error'
                );
            }
        }

        function addChild(el){
            var path_child =  el.attr('path_file');
            // alert(path_child);
            var input = '<input type="text"/> <button onclick="confrime($(this))">+</button>';
            var input = '<div class="forrm_child form-group">'+
                        '<label class="radio-inline">'+
                        '<input type="radio" name="child" class="child styled" checked="checked" value="1">Folder'+
                        '</label>'+
                        '<label class="radio-inline">'+
                        '<input type="radio" name="child" class="child styled" value="2">File'+
                        '</label>'+
                        '<div class="col-md-10">'+
                        '<div class="input-group">'+
                        '<form id="file_addChild" method="post" enctype="multipart/form-data">'+
                        '<input type="text" name="file_up" class="type_file_child form-control" type_file="1">'+
                        '<input type="hidden" name="path" value="'+path_child+'">'+
                        '</form>'+
                        '<span class="input-group-btn">'+
                        '<button class="btn bg-info add" path_file="'+path_child+'" onclick="confrime($(this))">Add</button>'+
                        '</span>'+
                        '</div>'+
                        '</div>'+
                        '<div class="col-md-2">'+
                        '<button class="btn btn-danger btn-icon"><i class="fa fa-close"></i></button>'+
                        '</div>'+
                        '</div>';
            el.parent().append(input);

            $('.child').change(function(event) {
                var type = $(this).val();
                if (type == 1) {
                    $('.type_file_child').attr('type', 'text');  
                    $('.type_file_child').attr('type_file', '1');  
                }else{
                    $('.type_file_child').attr('type', 'file'); 
                    $('.type_file_child').attr('type_file', '2');  
                }
            });

            $('.btn-icon').click(function(event) {
               $('.forrm_child').remove();
            });   

        }

        function confrime(el){
            var path_child =  el.attr('path_file');
            var val = $('.type_file_child').val();
            if (val != "") {
                var chk = $('.type_file_child').attr('type_file');
                if (chk == 1) {


                    $.post("<?= base_url(); ?>tasklist/createFolder", { name: val, path: path_child},
                        function () {
                            
                    }).done(function(data){
                    try{
                        var json_res = jQuery.parseJSON(data);
                        // console.log(json_res);
                        if(json_res.status === true){
                           
                              var list = '<ul class="fa-ul"><li id="file_'+val+'"><i class="fa fa-folder-open fa-lg"></i> '+val+' <span class="label label-danger" name_append="'+val+'" onclick="addChild_last($(this))" path_file="'+json_res.path+'"><i class="fa fa-plus"></i> Add</span></li></ul>';
                                $('#'+path_child).append(list);
                                swal('สำเร็จ',json_res.message,'success');
                        }else{
                            alert(json_res.message);
                        }
                    }catch(e){
                        alert(e);
                    };

                    });
                   
                }else{
                    var formData = new FormData($("#file_addChild")[0]);
                        $.ajax({
                            url: '<?=base_url()?>tasklist/createFile',
                            type: 'POST',
                            data: formData,
                            contentType: 'multipart/form-data',
                            async: false,
                            success: function (data) {
                                console.log(data);
                              try{
                                 var json = jQuery.parseJSON(data);
                                 console.log(json);
                                 if(json.status == true){
                                var list =  '<form method="post" action="<?php echo base_url(); ?>tasklist/download_file">'+
                                            '<input type="hidden" name="name" value="'+json.name+'">'+
                                            '<input type="hidden" name="path" value="'+json.path+json.name+'">'+
                                            '<ul class="fa-ul">'+
                                            '<button type="submit" class="label label-flat text-primary-600" >'+
                                            '<li><i class="fa fa-file-text"></i>'+json.name+'</li>'+
                                            '</button>'+
                                            '</ul>'+
                                            '</form>';
                                    $('#'+path_child).append(list);
                                    swal('สำเร็จ',json.message,'success');
                                    
                                 }else{
                                  
                                    alert(json.message);
                                 }
                              }catch(e){
                                     alert(e);
                              }
                          },
                          cache: false,
                          contentType: false,
                          processData: false
                      });
                    
                }
                $('.forrm_child').remove();
            }else{
               swal(
                'ผิดพลาด!',
                'กรุณา กรอกชื่อ หรือ ใส่ไฟล์',
                'error'
                );
            }
        }

        function addRoot(){
            $('#input').html('');
            var inputRoot = '<div class="forrm_input form-group">'+
                            '<label class="radio-inline">'+
                            '<input type="radio" name="type" class="styled" checked="checked" value="1">Folder'+
                            '</label>'+
                            '<label class="radio-inline">'+
                            '<input type="radio" name="type" class="styled" value="2">File'+
                            '</label>'+
                            '<div class="col-md-10">'+
                            '<div class="input-group">'+
                            '<form id="file_tmp" method="post" enctype="multipart/form-data">'+
                            '<input type="text" name="file_up" class="type_file form-control" type_file="1">'+
                            '</form>'+
                            '<span class="input-group-btn">'+
                            '<button class="btn bg-info add" onclick="confrimeRoot($(this))">Add</button>'+
                            '</span>'+
                            '</div>'+
                            '</div>'+
                            '<div class="col-md-2">'+
                            '<button class="btn btn-danger btn-icon"><i class="fa fa-close"></i></button>'+
                            '</div>'+
                            '</div>';
            $('#input').html(inputRoot);
            $('.styled').change(function(event) {
                var type = $(this).val();
                if (type == 1) {
                    $('.type_file').attr('type', 'text');  
                    $('.type_file').attr('type_file', '1');  
                }else{
                    $('.type_file').attr('type', 'file'); 
                     $('.type_file').attr('type_file', '2');  
                }
            });

            $('.btn-icon').click(function(event) {
               $('.forrm_input').remove();
            });   
            
        }

        function confrimeRoot(el){

            var val = $('.type_file').val();
            if (val != "") {

                var chk = $('.type_file').attr('type_file');
                if (chk == 1) {

                    $.post("<?= base_url(); ?>tasklist/createFolder_1", { name: val},
                        function () {
                            
                    }).done(function(data){
                    try{
                        var json_res = jQuery.parseJSON(data);
                        if(json_res.status === true){
                            var root = '<li id="'+val+'"><i class="fa fa-folder-open fa-lg"></i> '+val+'  <span class="label label-success" onclick="addChild($(this))" path_file="'+val+'"><i class="fa fa-plus"></i> Add</span></li>';
                            $('#root').append(root)
                             swal('สำเร็จ',json_res.message,'success');
                        }else{
                            alert(json_res.message);
                        }
                    }catch(e){
                        alert(e);
                    };
                });


                    
                }else{

                        var formData = new FormData($("#file_tmp")[0]);
                        $.ajax({
                            url: '<?=base_url()?>tasklist/createFile_1',
                            type: 'POST',
                            data: formData,
                            contentType: 'multipart/form-data',
                            async: false,
                            success: function (data) {
                                // console.log(data);
                              try{
                                 var json = jQuery.parseJSON(data);
                                 console.log(json);
                                 if(json.status == true){

                                    

                var root_name = '<form method="post" action="<?php echo base_url(); ?>tasklist/download_file_tmp">'+
                                '<input type="hidden" name="name" value="'+json.name+'">'+
                                '<button type="submit" class="label label-flat text-primary-600" >'+
                                '<li><i class="fa fa-file-text"></i> '+json.name+'</li>'+
                                '</button>'+
                                '</form>';

                                    $('#root').append(root_name);

                                     swal('สำเร็จ',json.message,'success');
                                                            
                                 }else{
                                  
                                    alert(json.message);
                                 }
                              }catch(e){
                                    alert(e);
                              }
                          },
                          cache: false,
                          contentType: false,
                          processData: false
                      });
                    
                }
                $('.forrm_input').remove();
            }else{
                swal(
                'ผิดพลาด!',
                'กรุณา กรอกชื่อ หรือ ใส่ไฟล์',
                'error'
                );
            }
            
            
        }
</script>