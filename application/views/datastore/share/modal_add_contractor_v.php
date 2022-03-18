
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="">Project Name</label>
        <input type="text" class="form-control input-sm" name="project" value="<?php echo $projectname; ?>">
        <input type="hidden" class="form-control input-sm" id="project" value="<?php echo $id; ?>">
      </div>
    </div>
  </div>
   <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="">Code</label>
        <input type="text" class="form-control input-sm" id="code" value="">
      </div>
    </div>
  </div>
   <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="">Ref. Name</label>
        <input type="text" class="form-control input-sm" id="name" value="">
      </div>
    </div>
  </div>
  <button class="save btn btn-success">Save</button>
  <button class="btn btn-danger" data-dismiss="modal">Close</button>

  <script>
    $(".save").click(function(){
      if ($("#code").val()=="") {
                                              swal({
                                                   title: "Please Check input Code!",
                                                   text: "ddd",
                                                   confirmButtonColor: "#66BB6A",
                                                   // type: "danger"
                                             });
      }else{
        var url="<?php echo base_url(); ?>datastore_active/addocontract";
                                            var dataSet={
                                              projid: $("#project").val(),
                                              code: $("#code").val(),
                                              name: $("#name").val()
                                              };
                                              $.post(url,dataSet,function(data){
                                             swal({
                                                   title: "Save!",
                                                   text: "Complase",
                                                   confirmButtonColor: "#66BB6A",
                                                   type: "success"
                                             });
                                              $('#addcons').modal('toggle');
                                              $('#modal_member').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                                              $("#modal_member").load('<?php echo base_url(); ?>index.php/share/loadcontractor/'+<?php echo $id; ?>);
                                          });
      }
    });
  </script>