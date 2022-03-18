<?php 
            $datestring = "Y";
             $mm = "m";
             $dd = "d";

             $this->db->select('*');
             $qu = $this->db->get('gl_batch_header');
             $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

             if ($res==0) {
                $jvcode = "AP".date($datestring).date($mm)."000"."1";
                $id_vocher ="1";
             }else{
               $this->db->select('*');
               $this->db->order_by('id_vocher','desc');
               $this->db->limit('1');
               $q = $this->db->get('gl_batch_header');
               $run = $q->result();
               foreach ($run as $valx)
               {
                 $x1 = $valx->id_vocher+1;
               }

               if ($x1<=9) {
                  $jvcode = "AP".date($datestring).date($mm)."000".$x1;
                  $id_vocher = $x1;
               }
               elseif ($x1<=99) {
                 $jvcode = "AP".date($datestring).date($mm)."00".$x1;
                 $id_vocher = $x1;
               }
               elseif ($x1<=999) {
                 $jvcode = "AP".date($datestring).date($mm)."0".$x1;
                 $id_vocher = $x1;
               }
             }
?>

<?php 
$bookcode = "";
$booknamz = "";
foreach ($gl_book as $kgl) {
	$bookcode = $kgl->bookcode;
	$booknamz = $kgl->booknamz;
} ?>		
		<div class="page-header">
		  <div class="panel-body">
		  	<form method="post" action="<?php echo base_url(); ?>gl_active/ap_post_gl" id="chk_gl">
		  	<div class="row">
		  		<div class="col-sm-12">
		  		<h4>POST AP TO GL</h4>
		  		<div class="row">
		  			<div class="col-md-2">
		                <label for="">Vchno</label>             
		                <input type="text" class="form-control input-xs text-center" id="vchno" name="vchno" value="<?php echo $jvcode; ?>" readonly>
		                <input type="hidden" class="form-control input-xs text-center" id="id_vocher" name="id_vocher" value="<?php echo $id_vocher; ?>" readonly>
              		</div>
		  			<div class="col-md-2">
		                <label for="">Start</label>             
		                <input type="date" class="form-control input-xs text-center" id="start" name="start">
              		</div>

              		<div class="col-md-2">
		                <label for="">Stop</label>             
		                <input type="date" class="form-control input-xs text-center" id="stop" name="stop">
              		</div>

              		<div class="col-md-3">
		                <label for="">Data Type</label>
		                	<select name="datatype" id="datatype" class="form-control input-xs">
		                		<option value=""></option>
		                		<option value="all">ALL</option>
		                		<option value="apv">AP (P/O)</option>
		                		<option value="aps">AP (Subcontractor)</option>
		                		<option value="apo">AP (Other)</option>
		                		<option value="pvpl">PV / PL</option>
		                	</select>
		                        
              		</div>
              	</div>

                <script>
                  $('#datatype').change(function(event) {
                    $('#load_apgl').empty();
                    $('#transfer').hide();
                  });
                </script>
              	<div class="row">
              		<div class="col-md-2">
		                <label for="">Book Account :</label>             
		                <input type="text" class="form-control input-xs" id="bookcode" name="bookcode" value="<?php echo $bookcode; ?>" readonly>
              		</div>
              		<div class="col-md-3">
		                <label for="">&nbsp;</label>             
		                <input type="text" class="form-control input-xs" id="bookname" name="bookname" value="<?php echo $booknamz; ?>" readonly>
              		</div>
              	
              		<div class="col-md-2">
		                <label for="">Date :</label>             
		                <input type="date" class="form-control input-xs text-center" id="gldate" name="gldate"  value="">
              		</div>
              		<div class="col-md-1">
		                <label for="">GL Year :</label>             
		                <input type="number" class="form-control input-xs text-center" id="glyear" name="glyear" value=""  readonly>
              		</div>
              		<div class="col-md-1">
		                <label for="">GL Period :</label>             
		                <input type="number" class="form-control input-xs text-center" id="glperiod" name="glperiod" value=""  readonly>
              		</div>
              	</div>

              	<script>
              $("#stop").change(function(event) {
                var stop = $("#stop").val();
                var y = stop.slice(0,4); 
                var m = stop.slice(5,7);

                $('#gldate').val(stop);
                $("#glperiod").val(m);
                $("#glyear").val(y);         

              });  

              $("#gldate").change(function(event) {
                var de_date = $("#gldate").val();
                var y = de_date.slice(0,4); 
                var m = de_date.slice(5,7);

                $("#glperiod").val(m);
                $("#glyear").val(y);         

              });  

              	</script>
              	<div class="row text-right">
              		<br>
              		<div class="col-sm-12">
              			<a type="button" href="<?php echo base_url(); ?>ap/post_ap_to_gl" class="btn btn-default">New</a>
              			<button type="button" id="load_ap" class="btn btn-primary">Retrive</button>
              			<button id="transfer" type="button"  class="btn btn-success">Transfer</button>
              			
              		</div>
              	</div>
              	</form>
              	<div class="row">
              		<br>
              		<div class="col-sm-12">
              		 <table class="table table-xxs table-bordered ">
		              <thead>
		                <tr>
		                  <th width="15%">A/C</th>
		                  <th class="text-center">Project / Department</th>
		                  <th class="text-center">System</th>
		                  <th class="text-center">CostCode</th>
		                  <th class="text-center">Dr</th>
		                  <th class="text-center">Cr</th>
		                </tr>
		              </thead>
		              <thead>
		              	<tbody id="load_apgl">
		              	</tbody>
		              </thead>
		          </table>
              	</div>
              </div>

		  		</div>
		  	</div>
		  </div>
		</div>

		<script>
			$('#load_ap').click(function(event) {

				var start = $('#start').val();
				var stop = $('#stop').val();
				var datatype = $('#datatype').val();

				if ($("#start").val()=="") {
			        swal({
			            title: "กรุณากรอกข้อมูลให้ครบถ้วน.",
			            text: "",
			            confirmButtonColor: "#EA1923",
			            type: "error"
			        });
			      }else if($("#stop").val()==""){
			         swal({
			            title: "กรุณากรอกข้อมูลให้ครบถ้วน.",
			            text: "",
			            confirmButtonColor: "#EA1923",
			            type: "error"
			        });
			      }else if($("#datatype").val()==""){
			        swal({
			            title: "กรุณากรอกข้อมูลให้ครบถ้วน.",
			            text: "",
			            confirmButtonColor: "#EA1923",
			            type: "error"
			        });
			      }else{
              $('#transfer').show();
			      	$('#load_apgl').load('<?php echo base_url(); ?>ap/load_ap_forgl/'+start+'/'+stop+'/'+datatype);
			      }
				
			});


   $('#transfer').hide();
   $("#transfer").click(function(e){
   	var samtdr = $('#samtdr').val();
   	var samtcr = $('#samtcr').val();
   	if(samtdr==samtcr){
   		var frm = $('#chk_gl');
            frm.submit(function (ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                            success: function (data) {


                        swal({
                                  title: "Data Transfer from AP System",
                                  text: "Save Completed!!.",
                                  // confirmButtonColor: "#66BB6A",
                                  type: "success"
                              });
                         setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>ap/post_ap_to_gl";
                        }, 500);
                    }
                });
                ev.preventDefault();

            });
             $("#transfer").submit(); //Submit  the FORM
             	}else{
                 swal({
          			            title: "Credit and Debit Not Balance!.",
          			            text: "",
          			            confirmButtonColor: "#EA1923",
          			            type: "error"
          			        });
          	}
          });
 
		</script>