<?php $pj = $this->uri->segment(3); ?>
 
             <?php
      $this->db->select('*');
      $this->db->where('project_code',$pj);
      $forin = $this->db->get('project')->result(); 
      ?>
<?php foreach ($forin as $kforin){
$project_start = $kforin->project_start;
$project_stop = $kforin->project_stop;
$project_name = $kforin->project_name;
$project_idd = $kforin->project_id;
$project_wt = $kforin->project_wt;
$project_vat = $kforin->project_vat;
$project_lessretention = $kforin->project_lessretention;
$project_advance_1 = $kforin->project_advance_1;


 $y = substr($project_start, 0,4);
 $m = substr($project_start, 5,2);
 $d = substr($project_start,8,2);
	} ?>
	             <?php
      $this->db->select('*');
      $this->db->where('project_code',$pj);
      $forinitem = $this->db->get('project_item')->result(); 
      ?>
      <?php $job_amount=0; foreach ($forinitem as $i){
      	$job_amount = $job_amount+$i->job_amount;
      	} ?>
         <form method="post" action="<?php echo base_url(); ?>index.php/management_active/income/<?php echo $pj; ?>">
<div class="content-wrapper">



        <div class="content">

        <div class="panel panel-flat">
            <div class="panel-heading">

            	<div class="row">
			<div class="col-xs-2">
			<div class="input-group">
			<span class="input-group-addon">Site No :</span>
			<input class="form-control input-sm text-right" name="" value="<?php echo $project_idd; ?>">
			</div>
			</div>
			<div class="col-xs-2">
			<div class="input-group">
			<span class="input-group-addon">Ref. Code :</span>
			<input class="form-control input-sm text-right" name="" value="<?php echo $pj; ?>" >
			</div>
			</div>
			<div class="col-xs-2">
			<div class="input-group">
			<span class="input-group-addon">Start :</span>
			<input class="form-control input-sm  text-right" name="" value="<?php echo $project_start; ?>">
			</div>
			</div>

			<div class="col-xs-2">
			<div class="input-group">
			<span class="input-group-addon">End :</span>
			<input class="form-control input-sm text-right" name="" value="<?php echo $project_stop; ?>">
			</div>
			</div>
			
		</div>
<br>
		<div class="row">
			<div class="col-xs-6">
			<div class="input-group">
			<span class="input-group-addon">Project  Name :</span>
			<input class="form-control input-sm" name="" value="<?php echo $project_name; ?>">
			</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-3">
			<div class="input-group">
			<span class="input-group-addon">Amount (Exclude VAT):</span>
			<input class="form-control input-sm text-right" name="" value="<?php echo number_format($job_amount,2); ?>">
			</div>
			</div>

			<div class="col-xs-2">
			<div class="input-group">
			<span class="input-group-addon">% Adv :</span>
			<input class="form-control input-sm text-right" name="" id="adv" value="<?php echo $project_advance_1; ?>">
			</div>
			</div>

			<div class="col-xs-2">
			<div class="input-group">
			<span class="input-group-addon">% Ret :</span>
			<input class="form-control input-sm text-right" name="" id="ret" value="<?php echo number_format($project_lessretention,2); ?>">
			</div>
			</div>

			<div class="col-xs-2">
			<div class="input-group">
			<span class="input-group-addon">% Vat :</span>
			<input class="form-control input-sm text-right" name="" id="vat" value="<?php echo number_format($project_vat,2); ?>">
			</div>
			</div>

			<div class="col-xs-2">
			<div class="input-group">
			<span class="input-group-addon">% WT :</span>
			<input class="form-control input-sm text-right" name="" id="wt" value="<?php echo number_format($project_wt,2); ?>" >
			</div>
			</div>
				

				

		</div>
		<br>
		  
		<div class="row">
		<div class="col-xs-2">
		<button class="btn bg-danger" type="submit">Submit</button> 
				<a class="addrow btn bg-info " id="insertpodetail">Insert row</a>
				
		</div>
				</div>

				<div class="row" id="table">
                  <div class="col-md-12">
                  <br>
                 
                  <table class="table table-hover table-bordered table-striped table-xxs" id="res">
                    <thead>
                      <tr>
                          	   <th width="10%" class="text-center">No.</th>
                               <th class="text-center">Year</th>
                               <th class="text-center">Month</th>
                               <th width="10%"  class="text-center">Payment Type</th>
                               <th width="10%"  class="text-center">Amount</th>                   
                               <th class="text-center">Advanced</th>
                               <th class="text-center">Vat</th>
                               <th class="text-center">Retention</th>
                               <th class="text-center">WT</th>
                               <th class="text-center">Net (Exclude VAT)</th>
                               <th class="text-center">Net (Include VAT)</th>
                               <th class="text-center" width="10%">Action</th>
                      </tr>
                    </thead>
                 
                    <tbody id="body">
                    <?php
      $this->db->select('*');
      $this->db->where('pj',$pj);
      $lessotherec = $this->db->get('lessother')->result(); 
      ?>
      <?php $n=1; $am=0; $adv=0; $vat=0; $rat=0; $wt=0; $netex=0; $netin=0; foreach ($lessotherec as $ec){ 
         $am = $am + $ec->amount;
         $adv = $adv + $ec->advanced;
         $vat = $vat + $ec->vat;
         $rat = $rat + $ec->retention;
         $wt = $wt + $ec->wt;
         $netex = $netex + $ec->netex;
         $netin = $netin + $ec->netin;
        ?>
      	

                      <tr>
                      <td class="text-center"><?php echo $n; ?><input type="hidden" name="chki[]" id="chki" class="form-control input-sm" readonly="true" value="X"><input type="hidden" name="idwhere[]" id="idwhere" class="form-control input-sm" readonly="true" value="<?php echo $ec->id; ?>"></td>
                      <td class="text-right"><input  style="text-align:right;" type="text" name="year[]"  class="form-control input-sm"  value="<?php echo $ec->year; ?>"></td>
                      <td class="text-right"><input  style="text-align:right;" type="text" name="month[]"  class="form-control input-sm" value="<?php echo $ec->month; ?>"></td>
                      <td class="text-center"><select class="form-control"  name="payment[]"><option value="<?php echo $ec->payment; ?>"><?php if($ec->payment=="1"){
echo "Progress";
                        }else if($ec->payment=="2"){
echo "Advance";
                          }else if($ec->payment=="3"){
                            echo "Retention";
                            } ; ?></option><option value="1">Progress</option><option value="2">Advance</option><option value="3">Retention</option></select></td>
                      <td class="text-right"><input type="text" id="amount<?php echo $n; ?>" name="amount[]"  class="txt1 form-control input-sm"  style="text-align:right;" value="<?php echo $ec->amount; ?>"></td>
                      <td class="text-right"><input type="text" id="advanced<?php echo $n; ?>" name="advanced[]" style="text-align:right;"  class="txt2 form-control input-sm" value="<?php echo $ec->advanced; ?>"></td>
                      <td class="text-right"><input type="text" id="vat<?php echo $n; ?>" name="vat[]" style="text-align:right;"  class="txt3 form-control input-sm" value="<?php echo $ec->vat; ?>"></td>
                      <td class="text-right"><input type="text" id="retention<?php echo $n; ?>" name="retention[]" style="text-align:right;"  class="txt4 form-control input-sm" value="<?php echo $ec->retention; ?>"></td>
                      <td class="text-right"><input type="text" id="wt<?php echo $n; ?>" name="wt[]" style="text-align:right;"  class="txt5 form-control input-sm" value="<?php echo $ec->wt; ?>"></td>
                      <td class="text-right"><input type="text" id="netex<?php echo $n; ?>" name="netex[]" style="text-align:right;"  class="txt6 form-control input-sm" value="<?php echo $ec->netex; ?>"></td>
                      <td class="text-right"><input type="text" id="netin<?php echo $n; ?>" name="netin[]" style="text-align:right;"  class="txt7 form-control input-sm" value="<?php echo $ec->netin; ?>"></td>
                      <td class="text-center"><a id="remove<?php echo $ec->id; ?>" href="<?php echo base_url(); ?>index.php/management_active/delless/<?php echo $ec->id; ?>/<?php echo $pj; ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
                      </tr>                    

<script>
  
  $('#amount<?php echo $n; ?>').keyup(function() {
  var adv = $("#adv").val();
  var ret = $("#ret").val();
  var vat = $("#vat").val();
  var wt = $("#wt").val();
  var amt = $('#amount<?php echo $n; ?>').val();

  var  amtadv =  (amt*adv)/100;
  var  amtret = (amt*ret)/100;
  var  amtvat = (amt*vat)/100;
  var  amtwt = (amt*wt)/100;
  var netex = (((amt-amtadv)-amtret)-amtwt);
  var netin = (((amt-amtadv)-amtret)-amtwt)+amtvat;

  $('#advanced<?php echo $n; ?>').val(amtadv);
  $('#vat<?php echo $n; ?>').val(amtvat);
  $('#retention<?php echo $n; ?>').val(amtret);
  $('#wt<?php echo $n; ?>').val(amtwt);

  $('#netex<?php echo $n; ?>').val(netex);
  $('#netin<?php echo $n; ?>').val(netin);

calculateSum();

function calculateSum() {
    var sum1 = 0;
    //iterate through each textboxes and add the values
    $(".txt1").each(function() {
        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
            sum1 += parseFloat(this.value);
            $(this).css("background-color", "#FEFFB0");
        }
        else if (this.value.length != 0){
            $(this).css("background-color", "red");
        }
    });
  
  $("input#ttxt1").val(sum1.toFixed(2));

  var sum2 = 0;
    //iterate through each textboxes and add the values
    $(".txt2").each(function() {
        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
            sum2 += parseFloat(this.value);
            $(this).css("background-color", "#FEFFB0");
        }
        else if (this.value.length != 0){
            $(this).css("background-color", "red");
        }
    });
  
  $("input#ttxt2").val(sum2.toFixed(2));


var sum3 = 0;
    //iterate through each textboxes and add the values
    $(".txt3").each(function() {
        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
            sum3 += parseFloat(this.value);
            $(this).css("background-color", "#FEFFB0");
        }
        else if (this.value.length != 0){
            $(this).css("background-color", "red");
        }
    });
  
  $("input#ttxt3").val(sum3.toFixed(2));


var sum4 = 0;
    //iterate through each textboxes and add the values
    $(".txt4").each(function() {
        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
            sum4 += parseFloat(this.value);
            $(this).css("background-color", "#FEFFB0");
        }
        else if (this.value.length != 0){
            $(this).css("background-color", "red");
        }
    });
  
  $("input#ttxt4").val(sum4.toFixed(2));


var sum5 = 0;
    //iterate through each textboxes and add the values
    $(".txt5").each(function() {
        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
            sum5 += parseFloat(this.value);
            $(this).css("background-color", "#FEFFB0");
        }
        else if (this.value.length != 0){
            $(this).css("background-color", "red");
        }
    });
  
  $("input#ttxt5").val(sum5.toFixed(2));


var sum6 = 0;
    //iterate through each textboxes and add the values
    $(".txt6").each(function() {
        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
            sum6 += parseFloat(this.value);
            $(this).css("background-color", "#FEFFB0");
        }
        else if (this.value.length != 0){
            $(this).css("background-color", "red");
        }
    });
  
  $("input#ttxt6").val(sum6.toFixed(2));


var sum7 = 0;
    //iterate through each textboxes and add the values
    $(".txt7").each(function() {
        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
            sum7 += parseFloat(this.value);
            $(this).css("background-color", "#FEFFB0");
        }
        else if (this.value.length != 0){
            $(this).css("background-color", "red");
        }
    });
  
  $("input#ttxt7").val(sum7.toFixed(2));
}
});
</script>
                       <?php $n++; } ?>

                       
                    </tbody>
                    <tr>
          <td colspan="4" class="text-center">Total</td>
          <td class="text-right"><input type="text" id="ttxt1" style="text-align:right;" class="form-control input-sm" value="<?php echo number_format($am,2); ?>" readonly></td>
          <td class="text-right"><input type="text" id="ttxt2" style="text-align:right;" class="form-control input-sm" value="<?php echo number_format($adv,2); ?>" readonly></td>
          <td class="text-right"><input type="text" id="ttxt3" style="text-align:right;" class="form-control input-sm" value="<?php echo number_format($vat,2); ?>" readonly></td>
          <td class="text-right"><input type="text" id="ttxt4" style="text-align:right;" class="form-control input-sm" value="<?php echo number_format($rat,2); ?>" readonly></td>
          <td class="text-right"><input type="text" id="ttxt5" style="text-align:right;" class="form-control input-sm" value="<?php echo number_format($wt,2); ?>" readonly></td>
          <td class="text-right"><input type="text" id="ttxt6" style="text-align:right;" class="form-control input-sm" value="<?php echo number_format($netex,2); ?>" readonly></td>
          <td class="text-right"><input type="text" id="ttxt7" style="text-align:right;" class="form-control input-sm" value="<?php echo number_format($netin,2); ?>" readonly></td>
          <td class="text-right"></td>
        </tr>
					
                  </table>
					<br>
									
</form>
                </div>
			</div>
			</div>
			</div>
</form>
<script>
var temp_y = <?php echo $y; ?>;
var temp_m =<?php echo $m; ?>-1;
$("#insertpodetail").click(function(){
   addrow();
  });
   function addrow()
            {            
              var row = ($('#body tr').length)-0+1;     
               
              // var temp_y = 1;
              
              // var count_m = 1;
              if(temp_m>=12){
                temp_y++;
                 temp_m= 1;     
              

              }else{
                temp_m++;
              }
              // month++;
              var tr = '<tr id="'+row+'">'+
            '<td class="text-center">'+row+'<input type="hidden" name="chki[]"  class="form-control input-sm" readonly="true" value="Y"></td>'+                           
            '<td><input  style="text-align:right;" type="text" name="year[]"  class="form-control input-sm" value='+temp_y+'  required=""></td>'+
             '<td><input  style="text-align:right;" type="text" name="month[]"  class="form-control input-sm" value='+temp_m+' required=""></td>'+
              '<td><select class="form-control"  name="payment[]"><option value="0"></option><option value="1">Progress</option><option value="2">Advance</option><option value="3">Retention</option></select></td>'+
            '<td><input type="text" name="amount[]" id="amount'+row+'"  class="txt1 form-control input-sm"  style="text-align:right;" value=".00" ></td>'+ 

            '<td><input type="text" name="advanced[]" id="advanced'+row+'" style="text-align:right;"  class="txt2 form-control input-sm" value=".00" ></td>'+
              '<td><input type="text" name="vat[]" id="vat'+row+'" style="text-align:right;"  class="txt3 form-control input-sm" value=".00" ></td>'+
            
            
              '<td><input type="text" name="retention[]" id="retention'+row+'" style="text-align:right;"  class="txt4 form-control input-sm" value=".00" ></td>'+
              '<td><input type="text" name="wt[]" id="wt'+row+'" style="text-align:right;"  class="txt5 form-control input-sm" value=".00" ></td>'+
              '<td><input type="text" name="netex[]" id="netex'+row+'" style="text-align:right;"  class="txt6 form-control input-sm" value=".00" ></td>'+
              '<td><input type="text" name="netin[]" id="netin'+row+'" style="text-align:right;"  class="txt7 form-control input-sm" value=".00" ></td>'+


              '<td class="text-center">'+
                              '<a id="remove" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>'+

                               
                          

                          


                       '</td>'+

                       '</tr>';

              $('#body').append(tr);


$('#amount'+row+'').keyup(function() {
  var adv = $("#adv").val();
  var ret = $("#ret").val();
  var vat = $("#vat").val();
  var wt = $("#wt").val();
  var amt = $('#amount'+row+'').val();

  var  amtadv =  (amt*adv)/100;
  var  amtret = (amt*ret)/100;
  var  amtvat = (amt*vat)/100;
  var  amtwt = (amt*wt)/100;
  var netex = (((amt-amtadv)-amtret)-amtwt);
  var netin = (((amt-amtadv)-amtret)-amtwt)+amtvat;

  $('#advanced'+row+'').val(amtadv);
  $('#vat'+row+'').val(amtvat);
  $('#retention'+row+'').val(amtret);
  $('#wt'+row+'').val(amtwt);

  $('#netex'+row+'').val(netex);
  $('#netin'+row+'').val(netin);

calculateSum();

function calculateSum() {
    var sum1 = 0;
    //iterate through each textboxes and add the values
    $(".txt1").each(function() {
        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
            sum1 += parseFloat(this.value);
            $(this).css("background-color", "#FEFFB0");
        }
        else if (this.value.length != 0){
            $(this).css("background-color", "red");
        }
    });
  
  $("input#ttxt1").val(sum1.toFixed(2));

  var sum2 = 0;
    //iterate through each textboxes and add the values
    $(".txt2").each(function() {
        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
            sum2 += parseFloat(this.value);
            $(this).css("background-color", "#FEFFB0");
        }
        else if (this.value.length != 0){
            $(this).css("background-color", "red");
        }
    });
  
  $("input#ttxt2").val(sum2.toFixed(2));


var sum3 = 0;
    //iterate through each textboxes and add the values
    $(".txt3").each(function() {
        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
            sum3 += parseFloat(this.value);
            $(this).css("background-color", "#FEFFB0");
        }
        else if (this.value.length != 0){
            $(this).css("background-color", "red");
        }
    });
  
  $("input#ttxt3").val(sum3.toFixed(2));


var sum4 = 0;
    //iterate through each textboxes and add the values
    $(".txt4").each(function() {
        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
            sum4 += parseFloat(this.value);
            $(this).css("background-color", "#FEFFB0");
        }
        else if (this.value.length != 0){
            $(this).css("background-color", "red");
        }
    });
  
  $("input#ttxt4").val(sum4.toFixed(2));


var sum5 = 0;
    //iterate through each textboxes and add the values
    $(".txt5").each(function() {
        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
            sum5 += parseFloat(this.value);
            $(this).css("background-color", "#FEFFB0");
        }
        else if (this.value.length != 0){
            $(this).css("background-color", "red");
        }
    });
  
  $("input#ttxt5").val(sum5.toFixed(2));


var sum6 = 0;
    //iterate through each textboxes and add the values
    $(".txt6").each(function() {
        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
            sum6 += parseFloat(this.value);
            $(this).css("background-color", "#FEFFB0");
        }
        else if (this.value.length != 0){
            $(this).css("background-color", "red");
        }
    });
  
  $("input#ttxt6").val(sum6.toFixed(2));


var sum7 = 0;
    //iterate through each textboxes and add the values
    $(".txt7").each(function() {
        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
            sum7 += parseFloat(this.value);
            $(this).css("background-color", "#FEFFB0");
        }
        else if (this.value.length != 0){
            $(this).css("background-color", "red");
        }
    });
  
  $("input#ttxt7").val(sum7.toFixed(2));
}
});



            }


            $(document).on('click', 'a#remove', function () { // <-- changes

        var self = $(this);
        noty({
            width: 200,
            text: "Do you want to Delete?",
            type: self.data('type'),
            dismissQueue: true,
            timeout: 1000,
            layout: self.data('layout'),
            buttons: (self.data('type') != 'confirm') ? false : [
                {
                    addClass: 'btn btn-primary btn-xs',
                    text: 'Ok',
                    onClick: function ($noty) { //this = button element, $noty = $noty element
                        $noty.close();
                        self.closest('tr').remove();
                        noty({
                            force: true,
                            text: 'Deleteted',
                            type: 'success',
                            layout: self.data('layout'),
                            timeout: 1000,
                        });

                    }
                },
                {
                    addClass: 'btn btn-danger btn-xs',
                    text: 'Cancel',
                    onClick: function ($noty) {
                        $noty.close();
                        noty({
                            force: true,
                            text: 'You clicked "Cancel" button',
                            type: 'error',
                            layout: self.data('layout'),
                            timeout: 1000,
                        });
                    }
                }
            ]
        });

        return false;


  });



$('#tra').attr('class', 'active');
$('#tra_sub1').attr('style', 'background-color:#dedbd8');
           </script>

