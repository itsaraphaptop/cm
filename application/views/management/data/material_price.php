<div class="content-wrapper">


  <div class="content">
    <div class="panel panel-flat">
      <div class="panel-heading">
      <h2>Material Price</h2>
      <hr/>
      <div class="form-horizontal">
        <div class="form-group">
          <button type="button" class="cost_code_sub btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Meterial</button>
        </div>
        <div class="form-group">
          <label class="control-label col-lg-1 text-right">Meterial Code</label>
          <div class="col-lg-2">
             <input type="text" id="newmatcode" class="form-control" readonly="true">
          </div>
          <label class="control-label col-lg-1 text-right">Limid List</label>
          <div class="col-lg-1">
            <input type="text" id="limid" class="form-control">
          </div>
          <div class="col-lg-1">
            <a class="btn btn-primary" id="filter"><i class="icon-search4"></i> ค้นหา</a>
          </div>
        </div>
      </div>

      <div id="data"></div>



      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Meterial Price from P/O</h4>
            </div>
            <div class="modal-body" id="content_modal">
             
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

    <script type="text/javascript">
    $('.cost_code_sub').click(function() {
      $.get('<?php echo base_url(); ?>index.php/bd/material_alonee_management', function(data) {
       }).done(function(data){;
        $('#content_modal').html(data);
      });
    });
    </script>

    <script type="text/javascript">
    $('#filter').click(function(event) {

      var limid = $('#limid').val();
      if(limid != ""){
        var mat = $('#newmatcode').val();
        var limid = $('#limid').val();
        $.post('<?php echo base_url(); ?>management/list_data_price', {mat: mat , limid: limid}, function(data) {
          }).done(function(data){
            $('#data').html(data);
            console.log(data);
        });
      }else{
        swal("กรุณากรอก Limid.", " ", "warning");
        $('#limid').focus();
      }

      // 
    });

    $('#material_price').attr('class','active');
    </script>


   
      </div>
    </div>
  </div>
</div>