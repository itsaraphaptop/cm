<?php $pj = $this->uri->segment(3); ?>
<?php $type = $this->uri->segment(4); ?>

<?php
function DateThai($strDate)
{
$strYear = date("Y",strtotime($strDate))+543;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strHour= date("H",strtotime($strDate));
$strMinute= date("i",strtotime($strDate));
$strSeconds= date("s",strtotime($strDate));
$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$strMonthThai=$strMonthCut[$strMonth];
return "$strDay $strMonthThai $strYear";
}
$strDate = date("Y-m-d");
// echo "ThaiCreate.Com Time now : ".DateThai($strDate);
?>

													<?php
													$session_data = $this->session->userdata('sessed_in');
 													$compcode = $session_data['compcode'];
													$this->db->select('*');
													$this->db->where('project_code',$pj);
													$this->db->where('compcode',$compcode);
													$q = $this->db->get('project');
													$res = $q->result();
													$pjname = "";
													foreach ($res as $r) {
													$c_bk = $r->c_bk;
													$project_name = $r->project_name;
													$project_code = $r->project_code;
													}
													?>
<div class="content">
		<div class="panel panel-white">
				<div class="panel-heading">
					<h2 class="panel-title"><b>Setup Approve Booking Project : <?php echo $project_name; ?></b></h2>
					<br>
					 <form action="<?php echo base_url(); ?>datastore_active/approve_prbooking/<?php echo $project_code; ?>/<?php echo $type; ?>/<?php echo $pj; ?>" method="post" id="book">
                  <div class="tabbable">
                    <ul class="nav nav-tabs nav-tabs-solid nav-tabs-component">
                      <li class="active"><a href="#solid-rounded-tab1" data-toggle="tab">Booking</a></li>
                  </ul>
                    <h3><input type="checkbox" <?php if($c_bk=="1") { echo 'checked'; } ?>  value="1" name="chkpj_prt" id="chkpj_prt"> 

                        <input type="hidden" value="<?php echo $c_bk; ?>" name="chkpj_bk" id="chkpj_bk">

                        <script>
                        	 $("#chkpj_prt").click(function(){
		                    if ($("#chkpj_prt").prop("checked")) {
		                    $("#chkpj_bk").val("1");
		                    }else{
		                    $("#chkpj_bk").val("0");
		                    }
		                    });
                        </script>
                    <b>Control</b>  <a class="btn bg-info" id="insertpodetail1">Add Member</a></h3>
                  <div class="tab-content">
                      <div class="tab-pane active" id="solid-rounded-tab1">                     
                       <div class="form-group">
                   			 <table class="table table-hover table-bordered table-striped table-xxs" id="res">
                    <thead>
                      <tr>
                               <th width="5%" style="text-align: center;">NO.</th>
                               <th width="5%" style="text-align: center;">Confirmation sequence</th>
                               <th width="5%" class="text-center">Member ID</th>
                               <th width="20%" style="text-align: center;">Member Name</th>
                               <th width="10%" class="text-center">Position</th>
                               <!-- <th width="10%" style="text-align: center;">Cost</th> -->
                               <th width="10%" style="text-align: center;">Lock</th>
                               <th width="10%" style="text-align: center;">Sign</th>  
                               <th width="10%" style="text-align: center;">Action</th>
                      </tr>
                    </thead>
                      <tbody id="body1">
                        <?php $n=1; foreach ($bk as $apr) { ?>
                        <tr>
                          <td class="text-center"><?php echo $n; ?><input type="hidden" name="chkpr[]" value="Y"><input type="hidden" name="idpr[]" value="<?php echo $apr->id; ?>"></td>
                          <td><input type="text" class="form-control input-sm text-center" id="approve_sequence<?php echo $n; ?>" name="approve_sequence[]" value="<?php echo $apr->approve_sequence; ?>"></td>
                          <td><input type="text" class="form-control input-sm " id="approve_mid1<?php echo $n; ?>" name="approve_mid[]" value="<?php echo $apr->approve_mid; ?>" readonly></td>
                          <td><div class="input-group">
                            <input type="text" name="approve_mname[]" id="approve_mname1<?php echo $n; ?>"  class="form-control input-xs" value="<?php echo $apr->approve_mname; ?>" readonly>
                            <span class="input-group-btn" >
                              <button type="button" class="accopen11<?php echo $n; ?> btn btn-info btn-sm" id="approvem11<?php echo $n; ?>" data-toggle="modal" data-target="#approvemodal11<?php echo $n; ?>" ><i class="icon-search4"></i></button>
                            </span>
                          </div></td>
                          <td><input type="text" class="form-control input-sm" id="approve_position<?php echo $n; ?>" name="approve_position[]" value="<?php echo $apr->approve_position; ?>"></td>
                         
                          <td style="text-align: center;"><input type="checkbox" class="input-sm" id="approve_lock1<?php echo $n; ?>" name="approve_lock[]" <?php if($apr->approve_lock=="Y"){ echo 'checked'; }; ?>><input type="hidden" name="lock1[]" id="lock1<?php echo $n; ?>" value="<?php echo $apr->approve_lock; ?>"></td>
                          <td style="text-align: center;"><input type="checkbox" name="sign[]" value="<?=$n;?>,<?=$project_code ?>,PR,<?=$apr->approve_mid ?>"></td>
                          <td class="text-center"><a href="<?php echo base_url(); ?>datastore_active/delpr_bk/<?php echo $apr->id; ?>/<?php echo $project_code; ?>/<?php echo $type; ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
                        </tr>
                        <script>
                        $("#approve_lock1<?php echo $n; ?>").click(function(){
                            if ($("#approve_lock1<?php echo $n; ?>").prop("checked")) {
                                  $("#lock1<?php echo $n; ?>").val("Y");
                            }else{
                                  $("#lock1<?php echo $n; ?>").val("N");
                            }
                        });
                        </script>
                        <div id="approvemodal11<?php echo $n; ?>" class="modal fade">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content ">
                              <div class="modal-header bg-info">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">เพิ่มรายการ </h5>
                              </div>
                              <div class="modal-body">
                                <div class="row" id="approvems11<?php echo $n; ?>">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <script>
                        var one = "1";
                        $('.accopen11<?php echo $n; ?>').click(function(){
                            $('#approvems11<?php echo $n; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                            $("#approvems11<?php echo $n; ?>").load('<?php echo base_url(); ?>share/member/<?php echo $n; ?>/'+one);
                        });
                        </script>
                        <?php $n++; }  ?>
                  </table>

			                </div>
			                <br><a type="button" class="btn bg-info" id="save_bk" hidden><i class="glyphicon glyphicon-floppy-disk"></i> <span>Save Booking</span></a>
			            </form>
			        </div>
			    </div>


              </div>
          </div>
      </div>
  </div>



<div class="rowmat1"></div>
<div class="rowmat2"></div>
<div class="rowmat3"></div>
<div class="rowmat4"></div>
<script>
$("#insertpodetail1").click(function(){
   addrow1();
$("[name='sign[]']").click(function(){
      var val = $(this).val();
      var array = val.split(",");
      
      var status = $(this).prop( "checked");
      
      if(array.length < 4){
          alert("กรุณากดปุ่ม save ก่อน ถึงจะทำการยืนยันได้");
          $(this).prop( "checked" ,false);
      }else{
              send_sign(array , status);
      }
});
   

   $('#save_prr').show();
  });
   function addrow1()
            {        
              var row = ($('#body1 tr').length)-0+1;
              var tr = '<tr id="'+row+'">'+
            '<td class="text-center">'+row+'<input type="hidden" name="chkpr[]" value="X"></td>'+                           
             '<td><input type="text" class="form-control input-sm text-center" id="approve_sequence'+row+'" name="approve_sequence[]" value="'+row+'"></td>'+
             '<td><input type="text" class="form-control input-sm " id="approve_mid1'+row+'" name="approve_mid[]" value="" readonly></td>'+
             '<td>'+
             '<div class="input-group">'+
                  '<input type="text" name="approve_mname[]" id="approve_mname1'+row+'"  class="form-control input-xs" readonly>'+
                  '<span class="input-group-btn" >'+
                  '<button type="button" class="accopen btn btn-info btn-sm" id="approvem1'+row+'" data-toggle="modal" data-target="#approvemodal1'+row+'" ><i class="icon-search4"></i></button>'+
                  ' </span>'+
                 '</div>'+
             '</td>'+
             '<td><input type="text" class="form-control input-sm" id="approve_position'+row+'" name="approve_position[]" value=""></td>'+
             '<td style="text-align: center;"><input type="checkbox" class=" input-sm" id="approve_lock1'+row+'" name="approve_lock[]" value="1"><input type="hidden" name="lock1[]" id="lock1'+row+'" value="N"></td>'+
             '<td style="text-align: center;"><input type="checkbox" name="sign[]" value="'+row+' ,PR"></td>'+
             '<td class="text-center">'+   
                '<a id="removebk'+row+'" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>'+
                 
            '</td>'+

                       '</tr>';


        
              $('#body1').append(tr);

  $(document).on('click', 'a#removebk'+row+'', function () { 

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
                    onClick: function ($save) {
                        $save.close();
                        save({
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

$("#approve_lock1"+row+"").click(function(){
        if ($("#approve_lock1"+row+"").prop("checked")) {
            $("#lock1"+row+"").val("Y");
        }else{
            $("#lock1"+row+"").val("N");
        }

      });

$("#approve_cost"+row+"").keydown(function(){
var approve_costw = $("#approve_cost"+roww+"").val();
var approve_cost = $("#approve_cost"+row+"").val();
if(approve_costw<approve_cost){
$("#approve_cost"+row+"").val("0.00");
}

});
 var one = "1";
 var rowmat1 = ' <div id="approvemodal1'+row+'" class="modal fade">'+
            '<div class="modal-dialog modal-lg">'+
              '<div class="modal-content ">'+
                '<div class="modal-header bg-info">'+
                  '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                  '<h5 class="modal-title">เพิ่มรายการ</h5>'+
                '</div>'+
                  '<div class="modal-body">'+
                   '<div class="row" id="approvems1'+row+'">'+
                    '</div>'+
                  '</div>'+
              '</div>'+
            '</div>'+
            '</div>';

          $('#approvem1'+row).click(function(){
          $('#approvems1'+row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#approvems1"+row).load('<?php echo base_url(); ?>share/member/'+row+'/'+one);
 });
$('.rowmat1').append(rowmat1);


            }


       

var timeoutID;

function delayedAlert() {
  timeoutID = window.setTimeout(refrshna, 1500);
}
  function refrshna(){
    $('#res').html("<img src='<?php echo base_url(); ?>index.php/assets/images/loading.gif'> Loading...");
    $("#res").load('<?php echo base_url(); ?>index.php/asset_active/getlesssetup/');
  }

 </script>


  <script>
   $("#save_bk").click(function(e){

          var frm = $('#book');
            frm.submit(function (ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                            success: function (data) {
                        swal({
                                  title: "Booking Setup Approve",
                                  text: "Save Completed!!.",
                                  // confirmButtonColor: "#66BB6A",
                                  type: "success"
                              });
                         setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>data_master/approve_prpo/"+data;
                        }, 500);
                    }
                });
                ev.preventDefault();

            });
   $("#book").submit(); //Submit  the FORM

});
 </script>