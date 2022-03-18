<div class="form-horizontal">
  <div class="form-group">
    <div id="select_pj">
      <label class="control-label col-lg-offset-2 col-lg-2">Project Store Center</label>
      <div class="col-lg-6">
        <select id="store_center" class="form-control">
          <?php
          foreach ($data_project as $key => $data_store) {
          ?>
          <option value="<?= $data_store->project_id ?>" ><?= $data_store->project_name ?></option>
          <?php
          }
          ?>
        </select><br/>
      </div>
    </div>
    <div class="col-lg-12">
      <div id="store_view"></div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var project_id = $('#store_center').val();
  $('#store_view').load("<?= base_url(); ?>office/modal_store/"+project_id);



  $('#store_center').change(function(event) {
    var data = $(this).val();
    $('#store_view').load("<?= base_url(); ?>office/modal_store/"+data);
   
  });


</script>