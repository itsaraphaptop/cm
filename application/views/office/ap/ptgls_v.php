<div class="page-container" style="min-height:314px">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Page header -->
				<div class="page-header">
					<!-- Header content -->
					<div class="page-header-content">
					       <div class="page-title">
						    </div>
					</div>
					<div class="navbar navbar-default navbar-xs">
						<div class="navbar-collapse collapse" id="navbar-filter">
						<h1 class="text-center">	POST TO GL SYSTEM </h1>
						    </div>
					     </div>
					<!-- /toolbar -->
				    </div>
				<!-- /page header -->
				<!-- Content area -->
				<div class="content">
					<!-- User profile -->
					<div class="row">
						<div class="col-lg-12">

								<div class="tab-content">


										<div class="panel panel-flat">
								<div class="panel-heading">
								<div class="panel-body">

                    <fieldset>
                  <div class="row">
                    <div class="col-md-12">
                          <legend><h4><i class=" icon-calendar" aria-hidden="true"></i> POST TO GL SYSTEM </h4></legend>
<div class="container-fluid">
  <form class="" action="ap_active/retrieve_ap" method="post">

  <div class="row">
    <div class="col-xs-3">
      <label for="">Years :</label>
      <input class="form-control" type="text" id="yearsel" name="yearsel" value="">
    </div>
    <div class="col-xs-3">
      <label for="">Datatype :</label>
      <select class="form-control" name="typedata" id="typedata">
        <option value="apv">AP (P/O)</option>
        <option value="aps">AP (Subcontructor)</option>
        <option value="apo">AP (Other)</option>
        <option value="pv">PV/PL</option>
      </select>
    </div>
    <div class="col-xs-3">
      	<span class="checked"><input type="checkbox" class="styled" id="vall" checked="">	Voucher All</span>
        <input type="hidden" id="vatxt" name="vatxt" value="n">
    </div>
    <div class="col-xs-3">
      <button type="button" name="button" id="btnretrieve">Retrieve</button>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-3">
      <label for="">Period :</label>
      <input class="form-control" type="text" name="glperiod" value="" id="glperiod">
    </div>
    <div class="col-xs-3">
      <label for="">#Voucher From</label>
      <input type="text" class="form-control" disabled="true" name="" id="vstart" value="">
    </div>
    <div class="col-xs-3">
      <label for="">To</label>
      <input type="text" class="form-control" disabled="true" name="" id="vend" value="">
    </div>
  </div>
  <div class="row">
    <div class="col-xs-3">
      <label for="">Branch :</label>
      <select disabled="true" class="form-control" name="">
        <option  value="">Branch 1</option>
      </select>
    </div>
    <div class="col-xs-3">
      <label for="dstart">Date :</label>
      <input class="form-control" type="date"  disabled="true" id="dstart" name="dstart" value="">
    </div>
    <div class="col-xs-3">
      <label for="">To</label>
      <input class="form-control" type="date" disabled="true" id="dend" name="" value="">
    </div>
  </div>
</div>

</form>

            </div>
                </fieldset>

								</div>
							</div>
									</div>

							</div>
<!--load and load  -->
<div id="ptglstable"></div>​

<script>
//$("#ptglstable").load('<?php echo base_url(); ?>ap/ptgls_table');


  </script>




			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->



</div></div>

<script>

$('#btnretrieve').click(function() {
  var yearsel = $('#yearsel').val();
  var glperiod = $('#glperiod').val();
  var typedata = $('#typedata').val();
  var vs = $('#vstart').val();
  var ve = $('#vend').val();
  var ds = $('#dstart').val();
  var de = $('#dend').val();


if($('#vatxt').val()=='n'){
    vs = '0' ;
    ve = '0';
    ds = '0';
    de = '0';
  $('#ptglstable').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  // $("#ptglstable").load('<?php echo base_url(); ?>ap/ptgls_table/'+yearsel+'/'+glperiod+'/'+typedata);
  $("#ptglstable").load('<?php echo base_url(); ?>ap/ptgls_table/'+yearsel+'/'+glperiod+'/'+typedata+'/'+vs+'/'+ve+'/'+ds+'/'+de+'/'+$('#vatxt').val());

}else{
  // alert(ve);
  // alert(vs);
  // alert(ds);
  // alert(de);
  $('#ptglstable').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#ptglstable").load('<?php echo base_url(); ?>ap/ptgls_table/'+yearsel+'/'+glperiod+'/'+typedata+'/'+vs+'/'+ve+'/'+ds+'/'+de+'/'+$('#vatxt').val());

}
  });



$("#vall").change(function() {
    if(this.checked) {
      $('#vstart').prop('disabled',true);
      $('#vend').prop('disabled',true);
      $('#dstart').prop('disabled',true);
      $('#dend').prop('disabled',true);

      $('#vatxt').val("y");
    }else{
      $('#vstart').prop('disabled',false);
      $('#vend').prop('disabled',false);
      $('#dstart').prop('disabled',false);
      $('#dend').prop('disabled',false);
      $('#vatxt').val("n");

    }

});
</script>
