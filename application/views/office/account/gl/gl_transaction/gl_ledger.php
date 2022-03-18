<div class="page-header">
  <div class="panel-body">
    <div class="row">
      <div class="col-sm-12">
        <h2>General Ledger Posting <button class="label bg-blue" id="click_select">Click</button></h2>
        <div id="glpost"></div>
        </div>
      </div>
    </div>
  </div>


  

  <div id="modal_form_vertical" class="modal fade" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <h5 class="modal-title">Criteria</h5>
      </div>
      <form action="#">
        <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label>GL Year</label>
                <input type="number" id="glyear"  class="form-control input-xs text-center" value="<?php echo date('Y'); ?>">
              </div>
              <div class="col-sm-6">
                <label>GL Period</label>
                <input type="number" id="glperiod"  class="form-control input-xs text-center" value="<?php echo date('m'); ?>">
              </div>
            
          
             
              </div>
            </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-link btn-xs" data-dismiss="modal">Close</button>
            <button type="button" id="glaa"  class="btn btn-primary btn-xs">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    $('#modal_form_vertical').modal('show');


    $('#click_select').click(function(event) {
      $('#modal_form_vertical').modal('show');
    });


    $('#glaa').click(function(event) {
      $('#glpost').load('<?php echo base_url('gl_tran/load_post_v/');?>'+'/'+$("#glyear").val()+'/'+$("#glperiod").val());
    });
  </script>
