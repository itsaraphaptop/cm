<div class="content-wrapper">


  <div class="content">
    <div class="panel panel-flat">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-2">
            <label for="">Year :</label>
            <input type="number" class="form-control input-xs has-error has-feedback" id="year" placeholder="Enter Year A.D.">
          </div>
          <div class="col-xs-1">
          <label for="">&nbsp;</label><br>
            <button class="btn btn-default" id="rearch"><i class="icon-search4"></i> ค้นหา</button>
          </div>
        </div>
        <br>
        <div id="content">
          
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // $(document).ready(function () {
    var base_url = "<?php echo base_url(); ?>project_billing/showreport";
    
    $("#rearch").click(function(){
      var year = $("#year").val();
      var patt = /^([0-9]{4})/gi;
      // alert(year);
      // if(!patt.test(year)){
      //   $("#year").val('');
      //   swal("Error!", "You clicked the button!", "danger");
      // }else{
      //   alert("match");
      // }

      $.post(base_url, { year: year }, function () {
      }).done(function(data){
          $('#content').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."); 
          $("#content").html(data);
      });
    });
  // });

    $('#billing').attr('class','active');
</script>