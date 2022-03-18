<!-- Main content  trans-->
<div class="loading" style="display: none;"></div>
    <form action="<?php echo base_url(); ?>bd_active/department_post" method="post">
        <div class="panel panel-flat">
            <div class="panel-heading">
            <h1>Department</h1>
            <div class="row">
                    <div class="col-md-2">
                    <div class="form-group">
                    <label class="control-label">Tender No :</label>
                    <input type="text" class="form-control" id="bd_tenid" name="bd_tenid" readonly="true">
                    <input type="hidden" class="form-control" id="bd_chk" name="bd_chk" value="I">
                    
                  </div>
                  </div>          

                   <div class="col-md-2">
                    <div class="form-group">
                    <label class="control-label">Department No :</label>
                    <input type="text" class="form-control" id="bd_pno" name="bd_pno" readonly="">
                    
                  </div>
                  </div>
 
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
                    <label class="control-label">Department Name :</label>
                    <input type="text" class="form-control" id="bd_pname" name="bd_pname">
                    
                  </div>
                  </div>
                  </div>

                  <div class="row">
                    <div class="col-md-2">
                    <div class="form-group">
                    <label class="control-label">Date :</label>
                    <input type="date" class="form-control" id="bd_date" name="bd_date">
                    
                  </div>
                  </div>

                  <div class="col-md-1">
                    <div class="form-group">
                    <label class="control-label">Year :</label>
                    <input type="text" class="form-control" id="bd_year" name="bd_year" readonly="">
                    
                  </div>
                  </div>

                  <div class="col-md-1">
                    <div class="form-group">
                    <label class="control-label">Month :</label>
                    <input type="text" class="form-control" id="bd_month" name="bd_month" readonly="">
                    <input type="hidden" name="type_in" value="department">
                  </div>
                  </div>
<script>
  
   $("#bd_date").change(function(event) {
            var de_date = $("#bd_date").val();
            var y = de_date.slice(0,4); 
            var d = de_date.slice(8,11);
            var m = de_date.slice(5,7);
            $("#bd_year").val(y);
            $("#bd_month").val(m);
            
    }); 

</script>
                  <div class="col-md-2">
                    <div class="form-group">
                    <label class="control-label">Status :</label>
                    <select class="form-control" id="bd_bdstats" name="bd_bdstats">
                    <option value=""></option>
            <option value="1">In Process</option>
            <option value="2">Wait</option>
            <option value="3">Reject Join Bid</option>
          </select>
                  </div>
                  </div>
                  </div>
      <div class="row">
   <div class="form-group col-xs-3">
     <a  id="bd_inserttender"  class="retrieve btn bg-info"><i class="icon-plus2"></i> Add items</a>

                  </div>
                  </div>

            </div>
            </div>

         <div class="panel panel-flat">
            <div class="panel-heading">

            <div class="row">
              <table class="table table-hover table-bordered table-striped table-xxs" id="res">
                    <thead>
                      <tr>
                      
                               <th style="text-align: center;">No.</th>
                               <th style="text-align: center;">Job</th>   
                               <th style="text-align: center;">Job Name</th>
                               <th style="text-align: center;">Amount</th>
                               <th style="text-align: center;">Action</th>
                      </tr>
                    </thead>
                    <tbody id="tenderboday">
                      
                    </tbody>

                     <tbody><tr  id="summation">
                        <th colspan="3" style="text-align: center;">Total</th>
                        <th width="20%" ><input type="text" id="totalresue" name="" class="form-control" style="text-align:right;"></th>
                        <th></th>
                      </tr>
                    </tbody></table>
            </div>


<br>
   <div class="row">
   <div class="form-group col-xs-3">
     <!-- <a type="button" data-toggle="modal" data-target="#retrieve" class="retrieve btn bg-teal-400">Retrieve</a> -->
     <a type="button" onclick="history.go(0)" class="btn bg-teal-400">New</a>
     <button type="submit" class="btn bg-success" id="submit" disabled="disabled"><i class="icon-floppy-disk"></i> Save</button>
     <a id="fa_delect" class="btn bg-danger">Delect</a>
     <a id="fa_close" href="<?php echo base_url(); ?>index.php/bd/boq_openProject" class="btn bg-danger"><i class="icon-close2"></i> Close</a>

                  </div>
                  </div>

            </div>
            </div>

            <div class="cost"></div>
 <script>
           $("#fa_delect").click(function(){
          var bd_tenid = $("#bd_tenid").val();
          window.location='<?php echo base_url(); ?>index.php/bd_active/del_bd/'+bd_tenid;
          });
                  </script>

<script>
  $("#fa_delect").hide();
</script>
        </form>
<div class="modal fade" id="retrieve" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Bid Project Tender</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="tender">

            </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(".retrieve").click(function(){
       $('#tender').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#tender").load('<?php echo base_url(); ?>index.php/bd/bdtender');
     });
</script>     
      
<script>
$('body').attr('class', 'navbar-top pace-done sidebar-secondary');
  $("#search_cus").click(function(){
     $('#owner').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
     $("#owner").load('<?php echo base_url(); ?>index.php/share/debtor');
   });
 $("#search_pro").click(function(){
       $('#project_content').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#project_content").load('<?php echo base_url(); ?>index.php/share/project');
 });
 $("#search_unit").click(function(){
       $('#unit_content').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#unit_content").load('<?php echo base_url(); ?>index.php/share/unit');

 });


$("#bd_inserttender").click(function(){
   addrow();
   var check_dis = $('#submit').attr('disabled');
   if (check_dis == 'disabled') {
    $('#submit').removeAttr('disabled');
   }

});
   function addrow()
            {            
              var row = ($('#tenderboday tr').length)-0+1;
              var tr = '<tr id="'+row+'">'+
      '<td class="text-center">'+row+'<input type="hidden" name="chki[]" id="chki" class="form-control input-xs" readonly="true" value="Y"></td>'+                           
            '<td width="20%"><input type="text" name="bd_jobno[]" id="bd_jobno'+row+'" class="input-xs form-control" readonly="true"></td>'+
            '<td><div class="input-group"><input type="text" name="bd_jobname[]" id="bd_jobname'+row+'" class="form-control input-xs" readonly="true"><span class="input-group-btn"><button type="button" data-toggle="modal" data-target="#sycode'+row+'" class="sycode'+row+' btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button></span></div></td>'+
            '<td><input type="text" name="bd_amount[]" id="bd_amount" class="input-xs txt form-control" value=".00" style="text-align:right;"></td>'+ 

            '<td>'+
                              '<a id="remove" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>'+

                               
                         

                          


                       '</td>'+

                       '</tr>';

              $('#tenderboday').append(tr);



var cost =  '<div class="modal fade" id="sycode'+row+'" data-backdrop="false">'+
  '<div class="modal-dialog modal-lg">'+
    '<div class="modal-content">'+
      '<div class="modal-header bg-info">'+
        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
        '<h4 class="modal-title" id="myModalLabel">Ref. Asset Code</h4>'+
     ' </div>'+
        '<div class="modal-body">'+
            '<div id="sy'+row+'"></div>'+

        '</div>'+
    '</div>'+
  '</div>'+
'</div>';
$('.cost').append(cost);

$('.sycode'+row+'').click(function(){
   $('#sy'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#sy"+row+"").load('<?php echo base_url(); ?>share/system/'+row);
 });



    calculateSum();
    $(".txt").on("keydown keyup", function() {
       

        calculateSum();
    });


function calculateSum() {
    var sum = 0;
    //iterate through each textboxes and add the values
    $(".txt").each(function() {
        //add only if the value is number

        if (!isNaN($(this).val().replace(/,/g,"")) && $(this).val().replace(/,/g,"").length != 0) {
            sum += parseFloat($(this).val().replace(/,/g,""));
            $(this).css("background-color", "#FEFFB0");
            console.log(sum);
            //alert(sum)
        }
        // else if (this.value.length != 0){
        //     $(this).css("background-color", "red");
        // }
    });
  
  $("input#totalresue").val(numberWithCommas(sum));
}


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



            $('input').addClass('input-xs');
           </script>
           <script type="text/javascript">
             $("form").submit(function(event) {
              $(".loading").show();
            });
           </script>