<?php ini_set('memory_limit', '-1'); ?>
<table class="table table-xxs table-hover datatable-basicball" >
<thead>
<tr>
<th>Document No.</th>
<th>Type</th>
<th>Date</th>
<th>Project Name</th>
<th>To Project</th>
<th>Ref. By</th>
<th>Remark</th>
<th>Entry By</th>
<th>Entry Date</th>
<th class="text-center" width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php  $n =1; foreach ($res as $val){ ?>
<tr >
<td><?php echo $val->transfer_code; ?></td>
<td>T</td>
<td><?php echo $val->date_transfer; ?></td>
<?php 
$this->db->select('*');
$this->db->where("project_id",$val->from_project);
$this->db->from("project");
$pj1 = $this->db->get()->result();
foreach ($pj1 as $key1) {
  $projectname1 = $key1->project_name;
}
?>
<td><?php echo $projectname1; ?></td>
<?php 
$this->db->select('*');
$this->db->where("project_id",$val->to_project);
$this->db->from("project");
$pj2 = $this->db->get()->result();
foreach ($pj2 as $key2) {
  $projectname2 = $key2->project_name;
}
?>
<td><?php echo $projectname2; ?></td>
<td><?php echo $val->name_transfer; ?></td>
<td><?php echo $val->remark; ?></td>
<td><?php echo $val->username; ?></td>
<td><?php echo $val->action_date; ?></td>
<?php 
$this->db->select('*');
$this->db->where("ref_codetransfer",$val->transfer_code);
$this->db->from("ic_transferitem");
$this->db->group_by('costcode'); 
$si = $this->db->get()->result();
$totalsum = 0;
foreach ($si as $ts) {
  $totalsum = $totalsum+$ts->total;
}
?>
<td class="text-center"><input class="opendeptor<?php echo $n;?>" type="checkbox" ></td>
</tr>

<script>
     $(".opendeptor<?php echo $n;?>").click(function(event) {
     	$('#typei').val("IC");

      var ac_cr_code = "<?php echo $val->ac_cr_code; ?>";   
     	var ac_cr_name = "<?php echo $val->ac_cr_name; ?>"; 
      var ac_dr_code = "<?php echo $val->ac_dr_code; ?>"; 
      var ac_dr_name = "<?php echo $val->ac_dr_name; ?>";
      var from_project = "<?php echo $val->from_project; ?>";
      var projectname1 = "<?php echo $projectname1; ?>";
      var to_project = "<?php echo $val->to_project; ?>";
      var projectname2 = "<?php echo $projectname2; ?>"; 
      var totalsum = "<?php echo $totalsum; ?>";
      var transfer_code = "<?php echo $val->transfer_code; ?>";
        if ($(".opendeptor<?php echo $n; ?>").prop("checked")) {
            
            <?php foreach ($si as $ts) { ?>
            var total = "<?php echo $ts->total; ?>";
            var costcode = "<?php echo $ts->costcode; ?>";
            var costname = "<?php echo $ts->costname; ?>";
            var jobcode = "<?php echo $ts->jobcode; ?>";
            var jobname = "<?php echo $ts->jobname; ?>";
            addrow2(ac_cr_code,ac_cr_name,totalsum,from_project,projectname1,total,costcode,costname,jobcode,jobname);
            <?php } ?>
            addrow(ac_dr_code,ac_dr_name,totalsum,to_project,projectname2,transfer_code,jobcode,jobname);
            function addrow(ac_dr_code,ac_dr_name,totalsum,to_project,projectname2,transfer_code){
        var row = ($('#bodygl tr').length-1)+1;

        var tr = '<tr class="removetf<?php echo $n;?>">'+
            '<td>'+row+'<input type="hidden" value="'+row+'" id="chki'+row+'" name="chki[]"><input type="hidden" value="T" id="chkitype'+row+'" name="chkitype[]"><input type="hidden" value="'+transfer_code+'" id="ref'+row+'" name="ref[]"></td>'+
            '<td>'+
              '<div class="input-group">'+
              	'<input _ice_ type="text" readonly="true" class="form-control input-sm" name="acc_code[]" id="acc_code'+row+'" value="'+ac_dr_code+'">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Account Name" value="'+ac_dr_name+'" name="acc_name[]" id="act_name'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#openacc'+row+'" row="'+row+'" onclick="openacc($(this))"  class="openacc btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //account code
            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Project Name " value="'+projectname2+'" name="pro_name[]" id="pro_name'+row+'">'+
                '<input type="hidden" _ice_ readonly="true" value="'+to_project+'" class="form-control input-sm" name="pro_code[]" id="pro_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#openpro'+row+'"  class="openpro btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //project
            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 150px;"  class="form-control" readonly="readonly" placeholder="System Name " value="'+jobname+'" name="sys_name[]" id="sys_name'+row+'">'+
                '<input type="hidden" _ice_ readonly="true" value="'+jobcode+'" class="form-control input-sm" name="sys_code[]" id="sys_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#opensys'+row+'"  class="opensys btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //system
            '<td >'+
              '<div class="input-group" id="origin'+row+'">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Costcode" value="" name="costcode[]" id="costcodetext'+row+'">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Cost Name" name="costname[]" id="costnamei'+row+'">'+
                  '<span class="input-group-btn" >'+
                   '<a class="costmat'+row+' btn btn-info btn-sm " onclick="costmat($(this))" id="btncost'+row+'" attr-id='+row+' data-toggle="modal" data-target="#costcode'+row+'"><span class="glyphicon glyphicon-search"></span></a>'+
                    // '<a class="btn btn-info btn-sm  " id="boqitem'+row+'" data-toggle="modal" data-target="#boq'+row+'"><span class="glyphicon glyphicon-search"></span></a>'+
                '</span>'+
              '<div id="Costcode'+row+'"></div>'+

            '</td>'+
            //costcode

            // //Budget Control
            '<td  class="text-center">'+
            '<div id="Budget'+row+'" >-</div>'+

            '<input value="" type="hidden" id="total_bal'+row+'" name=total_bal[] type="text" />'+
            '<input value="" type="hidden" id="boq_id'+row+'" name=boq_id[] type="text" />'+
            '<input value="" type="hidden" id="bd_tender'+row+'"  name=bd_tenid[] type="text" />'+
           
            '</td>'+
            // //Budget Control
            '<td>'+
              '<input type="text" style="width: 100px;" value="'+totalsum+'"  class="dr form-control text-right" value="" name="dr[]" id="dr'+row+'" ac="#cr'+row+'">'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 100px;" value="0" class="cr form-control text-right" value="" name="cr[]" id="cr'+row+'" ac="#dr'+row+'">'+
            '</td>'+

            '<td>'+
              '<select class="form-control" name="paid[]" id="paid'+row+'" style="width: 100px;">'+
              '<option class="1">Bank(Chq.)</option>'+
              '<option class="2">Cash</option>'+
              '</select>'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 250px;"  class="form-control" value="" name="description[]" id="description'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="refno[]" id="refno'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="date" style="width: 150px;"  class="form-control" value="" name="refdates[]" id="refdate'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="amt[]" id="amt'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 50px;"  class="form-control" value="" name="vat[]" id="vat'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="taxamt[]" id="taxamt'+row+'">'+
            '</td>'+

            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Department Name " value="" name="ven_name[]" id="ven_name'+row+'">'+
                '<input type="hidden" readonly="true" class="form-control input-sm" name="ven_code[]" id="ven_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#openven'+row+'"  class="openven btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //vender
            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Vender Name " value="" name="cus_name[]" id="cus_name'+row+'">'+
                '<input type="hidden" readonly="true" value="" class="form-control input-sm" name="cus_code[]" id="cus_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#opencus'+row+'"  class="opencus btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //customer
            '<td>'+
              '<select class="form-control"  id="tax'+row+'" attr-id="'+row+'" style="width: 100px;">'+
              '<option class=""></option>'+
              <?php foreach ($setup_tax as $st1) { ?>
              '<option value="<?php echo $st1->id_tax; ?>"><?php echo $st1->tax_name; ?></option>'+
              <?php } ?>
              
              
              '</select>'+
              '<input type="hidden" style="width: 100px;" readonly="true" class="form-control input-sm" value="" name="tax[]" id="taxs'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control input-sm" value="" name="taxnos[]" id="taxno'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="date" style="width: 140px;" class="form-control input-sm" value="" name="taxdates[]" id="taxdate'+row+'">'+
            '</td>'+

            '<td>'+
              '<select class="form-control input-sm" name="taxdesc[]"  id="taxdes'+row+'" style="width: 120px;">'+
              '<option class=""></option>'+
              <?php foreach ($setup_taxdes as $st2) { ?>      
              '<option value="<?php echo $st2->id_taxdes; ?>"><?php echo $st2->tax_desname; ?></option>'+
               <?php } ?>
              '</select>'+
            '</td>'+
            '<td>'+
              '<select class="form-control input-sm" name="taxtype[]"  id="taxtype'+row+'" style="width: 100px;">'+
              '<option value=""></option>'+
              <?php foreach ($taxtype as $s3) { ?>
            '<option value="<?php echo $s3->id_taxtype; ?>"><?php echo $s3->taxtype_name; ?></option>'+
              <?php } ?>
              
              '</select>'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 100px;" readonly="true" class="form-control" value="" name="taxid[]" id="taxid'+row+'">'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 250px;" readonly="true" class="form-control" value="" name="address[]" id="address'+row+'">'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="wt[]" id="wt'+row+'">'+
            '</td>'+

            '</tr>';
            $('#bodygl').append(tr);
                    
            var modalbank = '<div class="modal fade" id="opencost'+row+'" data-backdrop="false">'+
              '<div class="modal-dialog modal-lg">'+
                  '<div class="modal-content">'+
                '<div class="row">'+
                    '<div id="tabbank" class="col-md-6">'+
                        '<h4 id="hbank">xxx</h4>'+
                        '<select multiple class="form-control" id="cost1'+row+'" style="height:200px;">'+
                        '</select>'+
                    '</div>'+
                    '<div id="tabcost2" class="col-md-6">'+
                    '<h4>Branch</h4>'+
                        '<select multiple class="form-control" id="cost2'+row+'" style="height:200px;"></select>'+
                    '</div>'+
                    '<div id="tabcost3" class="col-md-12">'+
                        '<h4>Bank Account</h4>'+
                        '<select multiple class="form-control" id="cost3'+row+'" style="height:200px;">'+
                          '</select>'+
                    '</div>'+
                    '<div id="tabcost4" class="col-md-12">'+
                        '<input type="text" class="form-control input-sm" readonly name="costcodetext" id="costcodetext'+row+'">'+
                    '</div>'+
                '</div>'+
                '<br>'+
                '<div class="modal-footer">'+
                  '<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>'+
                  '<button type="button" id="select'+row+'" class="btn btn-primary" data-dismiss="modal">SELECT</button>'+
                '</div>'+
                  '</div>'+
                '</div>'+
              '</div>';
            $("#modalbank").append(modalbank);

            var modalaccount = '<div class="modal fade" id="openacc'+row+'" data-backdrop="false">'+
              " <div class='modal-dialog modal-lg'>"+
                "<div class='modal-content'>"+
                "<div class='modal-header'>"+
                "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
                "<h5 class='modal-title'>Book Account</h5>"+
                "</div>"+
                "<div class='modal-body'>"+
                '<div id="acc'+row+'">'+

                "</div>"+
              '</div>';
            $("#modalaccountcode").append(modalaccount);

            var modalpro = '<div id="openpro'+row+'" class="modal fade" data-backdrop="false">'+
              " <div class='modal-dialog modal-lg'>"+
              "<div class='modal-content'>"+
              "<div class='modal-header'>"+
              "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
              "<h5 class='modal-title'>Project </h5>"+
              "</div>"+
              "<div class='modal-body'>"+
              "<div>"+
              "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
              "<thead>"+
              "<tr>"+
              "<th>รหัสโครงการ</th>"+
              "<th>ชื่อโครงการ</th>"+
              "<th>เลือก</th>"+
              "</tr>"+
              "</thead>"+
              "<tbody>"+
              "<?php foreach ($proj as $pro){ ?>"+
              "<tr>"+
              "<td><?php echo $pro->project_code; ?></td>"+
              "<td><?php echo $pro->project_name; ?></td>"+
              '<td><button class="proj'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-control="<?=$pro->controlbg?>" data-procode="<?php echo $pro->project_id; ?>" data-proname="<?php echo $pro->project_name; ?>" data-tender="<?=$pro->bd_tenid;?>" data-dismiss="modal">เลือก</button></td>'+
              "</tr>"+
              "<?php } ?>"+
              "</tbody>"+
              "</table>"+
              "</div>"+
              "</div>";
          $("#modalproj").append(modalpro);

          var modaljob = '<div id="opensys'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>System</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>รหัสระบบ</th>"+
            "<th>ชื่อระบบ</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($system as $sys){ ?>"+
            "<tr>"+
            "<td><?php echo $sys->systemcode; ?></td>"+
            "<td><?php echo $sys->systemname; ?></td>"+
            '<td><button class="sys'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-syscode="<?php echo $sys->systemcode; ?>" data-sysname="<?php echo $sys->systemname; ?>" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modalj").append(modaljob);

          var modaldep = '<div id="opendep'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>Department</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>รหัสแผนก</th>"+
            "<th>ชื่อแผนก</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($depart as $dep){ ?>"+
            "<tr>"+
            "<td><?php echo $dep->department_code; ?></td>"+
            "<td><?php echo $dep->department_title; ?></td>"+
            '<td><button class="dep'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-depcode="<?php echo $dep->department_code; ?>" data-depname="<?php echo $dep->department_title; ?>" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modaldepart").append(modaldep);

          var modalven = '<div id="openven'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>Department</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>รหัสอร้านค้า</th>"+
            "<th>ชื่อร้านค้า</th>"+
            "<th>ที่อยู่ร้านค้า</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($vender as $ven){ ?>"+
            "<tr>"+
            "<td><?php echo $ven->vender_code; ?></td>"+

            "<td><?php echo $ven->vender_name; ?></td>"+
            "<td><?php echo $ven->vender_address; ?></td>"+
            '<td><button type="button" data-vencode="<?=$ven->vender_code;?>" data-venname="<?=$ven->vender_name;?>" data-venaddress="<?=$ven->vender_address;?>" class="ven'+row+' btn btn-xs btn-block btn-info" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modalvender").append(modalven);
          
          var modalcus = '<div id="opencus'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>Department</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>ชื่อลูกค้า</th>"+
            "<th>แผนก/โครงการ</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($customer as $cus){ ?>"+
            "<tr>"+
            "<td><?php echo $cus->m_code; ?></td>"+
            "<td><?php echo $cus->m_name; ?></td>"+
            '<td><button class="cus'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-cuscode="<?php echo $cus->m_code; ?>" data-cusaddress="<?php echo $cus->emp_address_now; ?>" data-cusname="<?php echo $cus->m_name; ?>" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modalcustomer").append(modalcus);
          // event click dr id#

          var damt = 0;
          var camt = 0;



          $("input[id^='dr'] , input[id^='cr']").keyup(function(event) {
              
             
            var el_ac = $(this).attr('ac');
              $(el_ac).val(0);
            
              damt = 0;

              $("input[id^='dr']").each(function(index, el) {


                
                 damt = damt + $(el).val().replace(/,/g,"")*1; 
              });
              $("#damt").val(numberWithCommas(damt));

              camt = 0;

              $("input[id^='cr']").each(function(index, el) {
                
                 camt = camt + $(el).val().replace(/,/g,"")*1; 
              });
            $("#camt").val(numberWithCommas(camt));
          });


$("#tax"+row).change(function(event) {
      var tax = $("#tax"+row);
      if (tax != '1' ) {
         $("#taxno"+row).prop('readonly', false);
         $("#taxdate"+row).prop('readonly', false);
         $("#taxdes"+row).prop('readonly', false);
         $("#taxtype"+row).prop('readonly', false);
         $("#taxid"+row).prop('readonly', false);
         $("#address"+row).prop('readonly', false);
      }else{
        $("#taxno"+row).prop('readonly', true);
         $("#taxdate"+row).prop('readonly', true);
         $("#taxdes"+row).prop('readonly', true);
         $("#taxtype"+row).prop('readonly', true);
         $("#taxid"+row).prop('readonly', true);
         $("#address"+row).prop('readonly', true);
         $("#taxs"+row).val(tax);
      }
});
$("#tax"+row).change(function(event) {

    $("#tax"+row).prop('readonly', true);

});  

$(".sys"+row).click(function(event) {


    if($("#pro_code"+row).val() == ""){
        swal({
            title: "กรุณาเลือก Project !!.",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
    }else{
      $("#sys_code"+row).val($(this).data('syscode'));        
      $("#sys_name"+row).val($(this).data('sysname'));
      $("#btncost"+row).attr('sys', $(this).data('syscode'));

      get_Budget_by_project( $("#pro_code"+row).val() , $("#sys_code"+row).val() , row);
    }
    //get_Budget_by_project()
});

        $(".books"+row).click(function(event) {
          $("#acc_code"+row).val($(this).data('bookcode'));
          $("#acc_name"+row).val($(this).data('bookname'));
          });

        $(".proj"+row).click(function(event) {
            $("#pro_code"+row).val($(this).data('procode'));
            $("#pro_name"+row).val($(this).data('proname'));
            $("#btncost"+row).attr('control', $(this).data('control'));
            $("#btncost"+row).attr('tender', $(this).data('tender'));
            get_Budget_by_project( $("#pro_code"+row).val() , $("#sys_code"+row).val() , row);

            $("#dep_code"+row).val('');
            $("#dep_name"+row).val('');
          });

        $(".dep"+row).click(function(event) {
          $("#dep_code"+row).val($(this).data('depcode'));
          $("#dep_name"+row).val($(this).data('depname'));
          $("#pro_code"+row).val('');
          $("#pro_name"+row).val('');
          $("#sys_code"+row).val('');
          $("#sys_name"+row).val('');
          });

        $(".ven"+row).click(function(event) {
          $("#ven_code"+row).val($(this).data('vencode'));
          $("#ven_name"+row).val($(this).data('venname'));
          $("#taxid"+row).val($(this).data('ventax'));
          $("#address"+row).val($(this).data('venaddress'));
          $("#taxtype"+row).val($(this).data('ventaxtype'));
          $("#vat"+row).val($(this).data('vat'));
          });

        $(".cus"+row).click(function(event) {
          $("#cus_code"+row).val($(this).data('cuscode'));
          $("#cus_name"+row).val($(this).data('cusname'));
          $("#address"+row).val($(this).data('cusaddress'));
          });
        $(".opencost").click(function(event) {

          // alert("fff");
          $('#cost1'+row).load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
          $( "#cost1"+row ).change(function() {

            var c1 = $('#cost1'+row).val();
            $('#cost2'+row).load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
            $("#tabcost2"+row).show();
            $("#costcodetext"+row).val(c1);
            $('#cost3'+row).html('');
          });
        
          $( "#cost2"+row ).change(function() {
          var c1 = $('#cost1'+row).val();
           var c2 = $('#cost2'+row).val();
          var c3 = $('#cost3'+row).load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c1+'/'+c2);
            $("#costcodetext"+row).val(c1+c2);
          });

          $( "#cost3"+row).change(function() {
          var c1 = $('#cost1'+row).val();
          var c2 = $('#cost2'+row).val();
          var c3 = $('#cost3'+row).val();
           $("#costcodetext"+row).val(c1+c2+c3);
           $("#cost-control"+row).show();
          });
        });

          // load
              va = 0;
              $("input[id^='dr']").each(function(index, el) {
                //$(el).val();
                
                 va = va + $(el).val()*1;
                
              });
            $("#damt").val(va);
        }

            function addrow2(ac_cr_code,ac_cr_name,totalsum,from_project,projectname1,total,costcode,costname,jobcode,jobname){
        var row = ($('#bodygl tr').length-1)+1;

        var tr = '<tr class="removetf<?php echo $n;?>">'+
            '<td>'+row+'<input type="hidden" value="'+row+'" id="chki'+row+'" name="chki[]"><input type="hidden" value="T" id="chkitype'+row+'" name="chkitype[]"><input type="hidden" value="" id="ref'+row+'" name="ref[]"></td>'+
            '<td>'+
              '<div class="input-group">'+
              '<input _ice_ type="text" readonly="true" value="'+ac_cr_code+'" class="form-control input-sm" name="acc_code[]" id="acc_code'+row+'">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Account Name" value="'+ac_cr_name+'" name="acc_name[]" id="act_name'+row+'">'+
                
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#openacc'+row+'" row="'+row+'" onclick="openacc($(this))"  class="openacc btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //account code
            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Project Name " value="'+projectname1+'" name="pro_name[]" id="pro_name'+row+'">'+
                '<input type="hidden" _ice_ readonly="true" value="'+from_project+'" class="form-control input-sm" name="pro_code[]" id="pro_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#openpro'+row+'"  class="openpro btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //project
            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 150px;"  class="form-control" readonly="readonly" placeholder="System Name " value="'+jobname+'" name="sys_name[]" id="sys_name'+row+'">'+
                '<input type="hidden" _ice_ readonly="true"  class="form-control input-sm" name="sys_code[]" id="sys_code'+row+'" value="'+jobcode+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#opensys'+row+'"  class="opensys btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //system
            '<td >'+
              '<div class="input-group" id="origin'+row+'">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Costcode" value="'+costcode+'" name="costcode[]" id="costcodetext'+row+'">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Cost Name" name="costname[]" id="costnamei'+row+'" value="'+costname+'">'+
                  '<span class="input-group-btn" >'+
                   '<a class="costmat btn btn-info btn-sm " onclick="costmat($(this))" id="btncost'+row+'" attr-id='+row+' data-toggle="modal" data-target="#costcode'+row+'"><span class="glyphicon glyphicon-search"></span></a>'+
                    // '<a class="btn btn-info btn-sm  " id="boqitem'+row+'" data-toggle="modal" data-target="#boq'+row+'"><span class="glyphicon glyphicon-search"></span></a>'+
                '</span>'+
              '<div id="Costcode'+row+'"></div>'+

            '</td>'+
            //costcode

            // //Budget Control
            '<td  class="text-center">'+
            '<div id="Budget'+row+'" >-</div>'+

            '<input value="" type="hidden" id="total_bal'+row+'" name=total_bal[] type="text" />'+
            '<input value="" type="hidden" id="boq_id'+row+'" name=boq_id[] type="text" />'+
            '<input value="" type="hidden" id="bd_tender'+row+'"  name=bd_tenid[] type="text" />'+
           
            '</td>'+
            // //Budget Control
            '<td>'+
              '<input type="text" style="width: 100px;" value="0"  class="dr form-control text-right" value="" name="dr[]" id="dr'+row+'" ac="#cr'+row+'">'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 100px;" value="'+total+'" class="cr form-control text-right" value="" name="cr[]" id="cr'+row+'" ac="#dr'+row+'">'+
            '</td>'+

            '<td>'+
              '<select class="form-control" name="paid[]" id="paid'+row+'" style="width: 100px;">'+
              '<option class="1">Bank(Chq.)</option>'+
              '<option class="2">Cash</option>'+
              '</select>'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 250px;"  class="form-control" value="" name="description[]" id="description'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="refno[]" id="refno'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="date" style="width: 150px;"  class="form-control" value="" name="refdates[]" id="refdate'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="amt[]" id="amt'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 50px;"  class="form-control" value="" name="vat[]" id="vat'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="taxamt[]" id="taxamt'+row+'">'+
            '</td>'+

            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Department Name " value="" name="ven_name[]" id="ven_name'+row+'">'+
                '<input type="hidden" readonly="true" class="form-control input-sm" name="ven_code[]" id="ven_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#openven'+row+'"  class="openven btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //vender
            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Vender Name " value="" name="cus_name[]" id="cus_name'+row+'">'+
                '<input type="hidden" readonly="true" value="" class="form-control input-sm" name="cus_code[]" id="cus_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#opencus'+row+'"  class="opencus btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //customer
            '<td>'+
              '<select class="form-control"  id="tax'+row+'" attr-id="'+row+'" style="width: 100px;">'+
              '<option class=""></option>'+
              <?php foreach ($setup_tax as $st1) { ?>
              '<option value="<?php echo $st1->id_tax; ?>"><?php echo $st1->tax_name; ?></option>'+
              <?php } ?>
              
              
              '</select>'+
              '<input type="hidden" style="width: 100px;" readonly="true" class="form-control input-sm" value="" name="tax[]" id="taxs'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control input-sm" value="" name="taxnos[]" id="taxno'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="date" style="width: 140px;" class="form-control input-sm" value="" name="taxdates[]" id="taxdate'+row+'">'+
            '</td>'+

            '<td>'+
              '<select class="form-control input-sm" name="taxdesc[]"  id="taxdes'+row+'" style="width: 120px;">'+
              '<option class=""></option>'+
              <?php foreach ($setup_taxdes as $st2) { ?>      
              '<option value="<?php echo $st2->id_taxdes; ?>"><?php echo $st2->tax_desname; ?></option>'+
               <?php } ?>
              '</select>'+
            '</td>'+
            '<td>'+
              '<select class="form-control input-sm" name="taxtype[]"  id="taxtype'+row+'" style="width: 100px;">'+
              '<option value=""></option>'+
              <?php foreach ($taxtype as $s3) { ?>
            '<option value="<?php echo $s3->id_taxtype; ?>"><?php echo $s3->taxtype_name; ?></option>'+
              <?php } ?>
              
              '</select>'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 100px;" readonly="true" class="form-control" value="" name="taxid[]" id="taxid'+row+'">'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 250px;" readonly="true" class="form-control" value="" name="address[]" id="address'+row+'">'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="wt[]" id="wt'+row+'">'+
            '</td>'+

            '</tr>';
            $('#bodygl').append(tr);
                    
            var modalbank = '<div class="modal fade" id="opencost'+row+'" data-backdrop="false">'+
              '<div class="modal-dialog modal-lg">'+
                  '<div class="modal-content">'+
                '<div class="row">'+
                    '<div id="tabbank" class="col-md-6">'+
                        '<h4 id="hbank">xxx</h4>'+
                        '<select multiple class="form-control" id="cost1'+row+'" style="height:200px;">'+
                        '</select>'+
                    '</div>'+
                    '<div id="tabcost2" class="col-md-6">'+
                    '<h4>Branch</h4>'+
                        '<select multiple class="form-control" id="cost2'+row+'" style="height:200px;"></select>'+
                    '</div>'+
                    '<div id="tabcost3" class="col-md-12">'+
                        '<h4>Bank Account</h4>'+
                        '<select multiple class="form-control" id="cost3'+row+'" style="height:200px;">'+
                          '</select>'+
                    '</div>'+
                    '<div id="tabcost4" class="col-md-12">'+
                        '<input type="text" class="form-control input-sm" readonly name="costcodetext" id="costcodetext'+row+'">'+
                    '</div>'+
                '</div>'+
                '<br>'+
                '<div class="modal-footer">'+
                  '<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>'+
                  '<button type="button" id="select'+row+'" class="btn btn-primary" data-dismiss="modal">SELECT</button>'+
                '</div>'+
                  '</div>'+
                '</div>'+
              '</div>';
            $("#modalbank").append(modalbank);

            var modalaccount = '<div class="modal fade" id="openacc'+row+'" data-backdrop="false">'+
              " <div class='modal-dialog modal-lg'>"+
                "<div class='modal-content'>"+
                "<div class='modal-header'>"+
                "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
                "<h5 class='modal-title'>Book Account</h5>"+
                "</div>"+
                "<div class='modal-body'>"+
                '<div id="acc'+row+'">'+

                "</div>"+
              '</div>';
            $("#modalaccountcode").append(modalaccount);

            var modalpro = '<div id="openpro'+row+'" class="modal fade" data-backdrop="false">'+
              " <div class='modal-dialog modal-lg'>"+
              "<div class='modal-content'>"+
              "<div class='modal-header'>"+
              "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
              "<h5 class='modal-title'>Project </h5>"+
              "</div>"+
              "<div class='modal-body'>"+
              "<div>"+
              "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
              "<thead>"+
              "<tr>"+
              "<th>รหัสโครงการ</th>"+
              "<th>ชื่อโครงการ</th>"+
              "<th>เลือก</th>"+
              "</tr>"+
              "</thead>"+
              "<tbody>"+
              "<?php foreach ($proj as $pro){ ?>"+
              "<tr>"+
              "<td><?php echo $pro->project_code; ?></td>"+
              "<td><?php echo $pro->project_name; ?></td>"+
              '<td><button class="proj'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-control="<?=$pro->controlbg?>" data-procode="<?php echo $pro->project_id; ?>" data-proname="<?php echo $pro->project_name; ?>" data-tender="<?=$pro->bd_tenid;?>" data-dismiss="modal">เลือก</button></td>'+
              "</tr>"+
              "<?php } ?>"+
              "</tbody>"+
              "</table>"+
              "</div>"+
              "</div>";
          $("#modalproj").append(modalpro);

          var modaljob = '<div id="opensys'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>System</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>รหัสระบบ</th>"+
            "<th>ชื่อระบบ</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($system as $sys){ ?>"+
            "<tr>"+
            "<td><?php echo $sys->systemcode; ?></td>"+
            "<td><?php echo $sys->systemname; ?></td>"+
            '<td><button class="sys'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-syscode="<?php echo $sys->systemcode; ?>" data-sysname="<?php echo $sys->systemname; ?>" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modalj").append(modaljob);

          var modaldep = '<div id="opendep'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>Department</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>รหัสแผนก</th>"+
            "<th>ชื่อแผนก</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($depart as $dep){ ?>"+
            "<tr>"+
            "<td><?php echo $dep->department_code; ?></td>"+
            "<td><?php echo $dep->department_title; ?></td>"+
            '<td><button class="dep'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-depcode="<?php echo $dep->department_code; ?>" data-depname="<?php echo $dep->department_title; ?>" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modaldepart").append(modaldep);

          var modalven = '<div id="openven'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>Department</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>รหัสอร้านค้า</th>"+
            "<th>ชื่อร้านค้า</th>"+
            "<th>ที่อยู่ร้านค้า</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($vender as $ven){ ?>"+
            "<tr>"+
            "<td><?php echo $ven->vender_code; ?></td>"+

            "<td><?php echo $ven->vender_name; ?></td>"+
            "<td><?php echo $ven->vender_address; ?></td>"+
            '<td><button type="button" data-vencode="<?=$ven->vender_code;?>" data-venname="<?=$ven->vender_name;?>" data-venaddress="<?=$ven->vender_address;?>" class="ven'+row+' btn btn-xs btn-block btn-info" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modalvender").append(modalven);
          
          var modalcus = '<div id="opencus'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>Department</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>ชื่อลูกค้า</th>"+
            "<th>แผนก/โครงการ</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($customer as $cus){ ?>"+
            "<tr>"+
            "<td><?php echo $cus->m_code; ?></td>"+
            "<td><?php echo $cus->m_name; ?></td>"+
            '<td><button class="cus'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-cuscode="<?php echo $cus->m_code; ?>" data-cusaddress="<?php echo $cus->emp_address_now; ?>" data-cusname="<?php echo $cus->m_name; ?>" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modalcustomer").append(modalcus);
          // event click dr id#

          var damt = 0;
          var camt = 0;



          $("input[id^='dr'] , input[id^='cr']").keyup(function(event) {
              
             
            var el_ac = $(this).attr('ac');
              $(el_ac).val(0);
            
              damt = 0;

              $("input[id^='dr']").each(function(index, el) {


                
                 damt = damt + $(el).val().replace(/,/g,"")*1; 
              });
              $("#damt").val(numberWithCommas(damt));

              camt = 0;

              $("input[id^='cr']").each(function(index, el) {
                
                 camt = camt + $(el).val().replace(/,/g,"")*1; 
              });
            $("#camt").val(numberWithCommas(camt));
          });


$("#tax"+row).change(function(event) {
      var tax = $("#tax"+row);
      if (tax != '1' ) {
         $("#taxno"+row).prop('readonly', false);
         $("#taxdate"+row).prop('readonly', false);
         $("#taxdes"+row).prop('readonly', false);
         $("#taxtype"+row).prop('readonly', false);
         $("#taxid"+row).prop('readonly', false);
         $("#address"+row).prop('readonly', false);
      }else{
        $("#taxno"+row).prop('readonly', true);
         $("#taxdate"+row).prop('readonly', true);
         $("#taxdes"+row).prop('readonly', true);
         $("#taxtype"+row).prop('readonly', true);
         $("#taxid"+row).prop('readonly', true);
         $("#address"+row).prop('readonly', true);
         $("#taxs"+row).val(tax);
      }
});
$("#tax"+row).change(function(event) {

    $("#tax"+row).prop('readonly', true);

});  

$(".sys"+row).click(function(event) {


    if($("#pro_code"+row).val() == ""){
        swal({
            title: "กรุณาเลือก Project !!.",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
    }else{
      $("#sys_code"+row).val($(this).data('syscode'));        
      $("#sys_name"+row).val($(this).data('sysname'));
      $("#btncost"+row).attr('sys', $(this).data('syscode'));

      get_Budget_by_project( $("#pro_code"+row).val() , $("#sys_code"+row).val() , row);
    }
    //get_Budget_by_project()
});

        $(".books"+row).click(function(event) {
          $("#acc_code"+row).val($(this).data('bookcode'));
          $("#acc_name"+row).val($(this).data('bookname'));
          });

        $(".proj"+row).click(function(event) {
            $("#pro_code"+row).val($(this).data('procode'));
            $("#pro_name"+row).val($(this).data('proname'));
            $("#btncost"+row).attr('control', $(this).data('control'));
            $("#btncost"+row).attr('tender', $(this).data('tender'));
            get_Budget_by_project( $("#pro_code"+row).val() , $("#sys_code"+row).val() , row);

            $("#dep_code"+row).val('');
            $("#dep_name"+row).val('');
          });

        $(".dep"+row).click(function(event) {
          $("#dep_code"+row).val($(this).data('depcode'));
          $("#dep_name"+row).val($(this).data('depname'));
          $("#pro_code"+row).val('');
          $("#pro_name"+row).val('');
          $("#sys_code"+row).val('');
          $("#sys_name"+row).val('');
          });

        $(".ven"+row).click(function(event) {
          $("#ven_code"+row).val($(this).data('vencode'));
          $("#ven_name"+row).val($(this).data('venname'));
          $("#taxid"+row).val($(this).data('ventax'));
          $("#address"+row).val($(this).data('venaddress'));
          $("#taxtype"+row).val($(this).data('ventaxtype'));
          $("#vat"+row).val($(this).data('vat'));
          });

        $(".cus"+row).click(function(event) {
          $("#cus_code"+row).val($(this).data('cuscode'));
          $("#cus_name"+row).val($(this).data('cusname'));
          $("#address"+row).val($(this).data('cusaddress'));
          });
        $(".opencost").click(function(event) {

          // alert("fff");
          $('#cost1'+row).load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
          $( "#cost1"+row ).change(function() {

            var c1 = $('#cost1'+row).val();
            $('#cost2'+row).load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
            $("#tabcost2"+row).show();
            $("#costcodetext"+row).val(c1);
            $('#cost3'+row).html('');
          });
        
          $( "#cost2"+row ).change(function() {
          var c1 = $('#cost1'+row).val();
           var c2 = $('#cost2'+row).val();
          var c3 = $('#cost3'+row).load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c1+'/'+c2);
            $("#costcodetext"+row).val(c1+c2);
          });

          $( "#cost3"+row).change(function() {
          var c1 = $('#cost1'+row).val();
          var c2 = $('#cost2'+row).val();
          var c3 = $('#cost3'+row).val();
           $("#costcodetext"+row).val(c1+c2+c3);
           $("#cost-control"+row).show();
          });
        });

          // load
              va = 0;
              $("input[id^='dr']").each(function(index, el) {
                //$(el).val();
                
                 va = va + $(el).val()*1;
                
              });
            $("#damt").val(va);
        }
        }else{
           $('.removetf<?php echo $n;?>').remove();
        }

 calculateSum();
  $(".dr").on("keydown keyup", function() {
  
  calculateSum();
  });
  function calculateSum() {
  var sum = 0;
  //iterate through each textboxes and add the values
  $(".dr").each(function() {
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
  
  $("input#damt").val(numberWithCommas(sum));
  }


  calculateSum1();
  $(".cr").on("keydown keyup", function() {
  
  calculateSum1();
  });
  function calculateSum1() {
  var sum1 = 0;
  //iterate through each textboxes and add the values
  $(".cr").each(function() {
  //add only if the value is number
  if (!isNaN($(this).val().replace(/,/g,"")) && $(this).val().replace(/,/g,"").length != 0) {
  sum1 += parseFloat($(this).val().replace(/,/g,""));
  $(this).css("background-color", "#FEFFB0");
  console.log(sum1);
  //alert(sum)
  }
  // else if (this.value.length != 0){
  //     $(this).css("background-color", "red");
  // }
  });
  
  $("input#camt").val(numberWithCommas(sum1));
  }
      });
  
</script>
<?php $n++; } ?>

<?php  $a =1; foreach ($ic as $valic){ ?>
<tr>
<td><?php echo $valic->is_doccode; ?></td>
<td>I</td>
<td><?php echo $valic->is_docdate; ?></td>
<td><?php echo $valic->project_name; ?></td>
<td></td>
<td></td>
<td><?php echo $valic->is_remark; ?></td>
<td><?php echo $valic->is_user; ?></td>
<td><?php echo $valic->is_credate; ?></td>
<td class="text-center"><input class="opendeptori<?php echo $a;?>" type="checkbox" ></td>
</tr>

<script>
  $(".opendeptori<?php echo $a;?>").click(function(event) {
	$('#typei').val("IC");
  if ($(".opendeptori<?php echo $a; ?>").prop("checked")) {

    var acc_primary = "<?php echo $valic->acc_primary; ?>";
    var acc_secondary = "<?php echo $valic->acc_secondary; ?>";
    var is_project = "<?php echo $valic->is_project; ?>";
    var project_name = "<?php echo $valic->project_name; ?>";

    var is_system = "<?php echo $valic->is_system; ?>";
    var systemname = "<?php echo $valic->systemname; ?>";

    <?php 
    $this->db->select('*');
    $this->db->where("act_code",$valic->acc_primary);
    $this->db->from("account_total");
    $act1 = $this->db->get()->result();
    $act_name = "";
    foreach ($act1 as $a1) {
      $act_name = $a1->act_name;
    }
    ?>

    <?php 
    $this->db->select('*');
    $this->db->where("act_code",$valic->acc_secondary);
    $this->db->from("account_total");
    $act_name2 = "";
    $act2 = $this->db->get()->result();
    foreach ($act2 as $a2) {
      $act_name2 = $a2->act_name;
    }
    ?>

    var act_name = "<?php echo $act_name; ?>";
    var act_name2 = "<?php echo $act_name2; ?>";


    <?php 
    $this->db->select('*');
    $this->db->where("isi_doccode",$valic->is_doccode);
    $this->db->from("ic_issue_d");
    $issue_d = $this->db->get()->result();
    $allissue = 0;
    foreach ($issue_d as $d) {
      $allissue = $allissue+($d->isi_xqty*$d->isi_priceunit);
    }
    ?>

    var allissue = "<?php echo $allissue; ?>";
    var is_doccode = "<?php echo $valic->is_doccode; ?>"; 
           
            <?php foreach ($issue_d as $d) { ?>
            var allprice = "<?php echo $d->isi_xqty*$d->isi_priceunit; ?>";
            var isi_costcode = "<?php echo $d->isi_costcode; ?>";
            var isi_costname = "<?php echo $d->isi_costname; ?>";
            addrow2(acc_secondary,act_name2,is_project,project_name,allprice,isi_costcode,isi_costname,is_system,systemname);
            <?php } ?>
          addrow(acc_primary,act_name,is_project,project_name,allissue,is_doccode,is_system,systemname);
          function addrow(acc_primary,act_name,is_project,project_name,allissue,is_doccode,is_system,systemname){

        var row = ($('#bodygl tr').length-1)+1;
        var tr = '<tr class="removetf<?php echo $n;?>">'+
            '<td>'+row+'<input type="hidden" value="'+row+'" id="chki'+row+'" name="chki[]"><input type="hidden" value="I" id="chkitype'+row+'" name="chkitype[]"><input type="hidden" value="'+is_doccode+'" id="ref'+row+'" name="ref[]"></td>'+
            '<td>'+
              '<div class="input-group">'+
                '<input _ice_ type="text" readonly="true" value="'+acc_primary+'" class="form-control input-sm" name="acc_code[]" id="acc_code'+row+'">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Account Name" value="'+act_name+'" name="acc_name[]" id="act_name'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#openacc'+row+'" row="'+row+'" onclick="openacc($(this))"  class="openacc btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //account code
            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Project Name " value="'+project_name+'" name="pro_name[]" id="pro_name'+row+'">'+
                '<input type="hidden" _ice_ readonly="true" value="'+is_project+'" class="form-control input-sm" name="pro_code[]" id="pro_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#openpro'+row+'"  class="openpro btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //project
            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 150px;"  class="form-control" readonly="readonly" placeholder="System Name " value="'+systemname+'" name="sys_name[]" id="sys_name'+row+'">'+
                '<input type="hidden" _ice_ readonly="true" value="'+is_system+'" class="form-control input-sm" name="sys_code[]" id="sys_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#opensys'+row+'"  class="opensys btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //system
            '<td >'+
              '<div class="input-group" id="origin'+row+'">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Costcode" value="" name="costcode[]" id="costcodetext'+row+'">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Cost Name" name="costname[]" id="costnamei'+row+'">'+
                  '<span class="input-group-btn" >'+
                   '<a class="costmat btn btn-info btn-sm " onclick="costmat($(this))" id="btncost'+row+'" attr-id='+row+' data-toggle="modal" data-target="#costcode'+row+'"><span class="glyphicon glyphicon-search"></span></a>'+
                    // '<a class="btn btn-info btn-sm  " id="boqitem'+row+'" data-toggle="modal" data-target="#boq'+row+'"><span class="glyphicon glyphicon-search"></span></a>'+
                '</span>'+
              '<div id="Costcode'+row+'"></div>'+

            '</td>'+
            //costcode

            // //Budget Control
            '<td  class="text-center">'+
            '<div id="Budget'+row+'" >-</div>'+

            '<input value="" type="hidden" id="total_bal'+row+'" name=total_bal[] type="text" />'+
            '<input value="" type="hidden" id="boq_id'+row+'" name=boq_id[] type="text" />'+
            '<input value="" type="hidden" id="bd_tender'+row+'"  name=bd_tenid[] type="text" />'+
           
            '</td>'+
            // //Budget Control
            '<td>'+
              '<input type="text" style="width: 100px;" value="'+allissue+'"  class="dr form-control text-right" value="" name="dr[]" id="dr'+row+'" ac="#cr'+row+'">'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 100px;" value="0" class="cr form-control text-right" value="" name="cr[]" id="cr'+row+'" ac="#dr'+row+'">'+
            '</td>'+

            '<td>'+
              '<select class="form-control" name="paid[]" id="paid'+row+'" style="width: 100px;">'+
              '<option class="1">Bank(Chq.)</option>'+
              '<option class="2">Cash</option>'+
              '</select>'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 250px;"  class="form-control" value="" name="description[]" id="description'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="refno[]" id="refno'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="date" style="width: 150px;"  class="form-control" value="" name="refdates[]" id="refdate'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="amt[]" id="amt'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 50px;"  class="form-control" value="" name="vat[]" id="vat'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="taxamt[]" id="taxamt'+row+'">'+
            '</td>'+

            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Department Name " value="" name="ven_name[]" id="ven_name'+row+'">'+
                '<input type="hidden" readonly="true" class="form-control input-sm" name="ven_code[]" id="ven_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#openven'+row+'"  class="openven btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //vender
            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Vender Name " value="" name="cus_name[]" id="cus_name'+row+'">'+
                '<input type="hidden" readonly="true" value="" class="form-control input-sm" name="cus_code[]" id="cus_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#opencus'+row+'"  class="opencus btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //customer
            '<td>'+
              '<select class="form-control"  id="tax'+row+'" attr-id="'+row+'" style="width: 100px;">'+
              '<option class=""></option>'+
              <?php foreach ($setup_tax as $st1) { ?>
              '<option value="<?php echo $st1->id_tax; ?>"><?php echo $st1->tax_name; ?></option>'+
              <?php } ?>
              
              
              '</select>'+
              '<input type="hidden" style="width: 100px;" readonly="true" class="form-control input-sm" value="" name="tax[]" id="taxs'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control input-sm" value="" name="taxnos[]" id="taxno'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="date" style="width: 140px;" class="form-control input-sm" value="" name="taxdates[]" id="taxdate'+row+'">'+
            '</td>'+

            '<td>'+
              '<select class="form-control input-sm" name="taxdesc[]"  id="taxdes'+row+'" style="width: 120px;">'+
              '<option class=""></option>'+
              <?php foreach ($setup_taxdes as $st2) { ?>      
              '<option value="<?php echo $st2->id_taxdes; ?>"><?php echo $st2->tax_desname; ?></option>'+
               <?php } ?>
              '</select>'+
            '</td>'+
            '<td>'+
              '<select class="form-control input-sm" name="taxtype[]"  id="taxtype'+row+'" style="width: 100px;">'+
              '<option value=""></option>'+
              <?php foreach ($taxtype as $s3) { ?>
            '<option value="<?php echo $s3->id_taxtype; ?>"><?php echo $s3->taxtype_name; ?></option>'+
              <?php } ?>
              
              '</select>'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 100px;" readonly="true" class="form-control" value="" name="taxid[]" id="taxid'+row+'">'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 250px;" readonly="true" class="form-control" value="" name="address[]" id="address'+row+'">'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="wt[]" id="wt'+row+'">'+
            '</td>'+

            '</tr>';
            $('#bodygl').append(tr);
                    
            var modalbank = '<div class="modal fade" id="opencost'+row+'" data-backdrop="false">'+
              '<div class="modal-dialog modal-lg">'+
                  '<div class="modal-content">'+
                '<div class="row">'+
                    '<div id="tabbank" class="col-md-6">'+
                        '<h4 id="hbank">xxx</h4>'+
                        '<select multiple class="form-control" id="cost1'+row+'" style="height:200px;">'+
                        '</select>'+
                    '</div>'+
                    '<div id="tabcost2" class="col-md-6">'+
                    '<h4>Branch</h4>'+
                        '<select multiple class="form-control" id="cost2'+row+'" style="height:200px;"></select>'+
                    '</div>'+
                    '<div id="tabcost3" class="col-md-12">'+
                        '<h4>Bank Account</h4>'+
                        '<select multiple class="form-control" id="cost3'+row+'" style="height:200px;">'+
                          '</select>'+
                    '</div>'+
                    '<div id="tabcost4" class="col-md-12">'+
                        '<input type="text" class="form-control input-sm" readonly name="costcodetext" id="costcodetext'+row+'">'+
                    '</div>'+
                '</div>'+
                '<br>'+
                '<div class="modal-footer">'+
                  '<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>'+
                  '<button type="button" id="select'+row+'" class="btn btn-primary" data-dismiss="modal">SELECT</button>'+
                '</div>'+
                  '</div>'+
                '</div>'+
              '</div>';
            $("#modalbank").append(modalbank);

            var modalaccount = '<div class="modal fade" id="openacc'+row+'" data-backdrop="false">'+
              " <div class='modal-dialog modal-lg'>"+
                "<div class='modal-content'>"+
                "<div class='modal-header'>"+
                "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
                "<h5 class='modal-title'>Book Account</h5>"+
                "</div>"+
                "<div class='modal-body'>"+
                '<div id="acc'+row+'">'+

                "</div>"+
              '</div>';
            $("#modalaccountcode").append(modalaccount);

            var modalpro = '<div id="openpro'+row+'" class="modal fade" data-backdrop="false">'+
              " <div class='modal-dialog modal-lg'>"+
              "<div class='modal-content'>"+
              "<div class='modal-header'>"+
              "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
              "<h5 class='modal-title'>Project </h5>"+
              "</div>"+
              "<div class='modal-body'>"+
              "<div>"+
              "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
              "<thead>"+
              "<tr>"+
              "<th>รหัสโครงการ</th>"+
              "<th>ชื่อโครงการ</th>"+
              "<th>เลือก</th>"+
              "</tr>"+
              "</thead>"+
              "<tbody>"+
              "<?php foreach ($proj as $pro){ ?>"+
              "<tr>"+
              "<td><?php echo $pro->project_code; ?></td>"+
              "<td><?php echo $pro->project_name; ?></td>"+
              '<td><button class="proj'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-control="<?=$pro->controlbg?>" data-procode="<?php echo $pro->project_id; ?>" data-proname="<?php echo $pro->project_name; ?>" data-tender="<?=$pro->bd_tenid;?>" data-dismiss="modal">เลือก</button></td>'+
              "</tr>"+
              "<?php } ?>"+
              "</tbody>"+
              "</table>"+
              "</div>"+
              "</div>";
          $("#modalproj").append(modalpro);

          var modaljob = '<div id="opensys'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>System</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>รหัสระบบ</th>"+
            "<th>ชื่อระบบ</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($system as $sys){ ?>"+
            "<tr>"+
            "<td><?php echo $sys->systemcode; ?></td>"+
            "<td><?php echo $sys->systemname; ?></td>"+
            '<td><button class="sys'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-syscode="<?php echo $sys->systemcode; ?>" data-sysname="<?php echo $sys->systemname; ?>" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modalj").append(modaljob);

          var modaldep = '<div id="opendep'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>Department</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>รหัสแผนก</th>"+
            "<th>ชื่อแผนก</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($depart as $dep){ ?>"+
            "<tr>"+
            "<td><?php echo $dep->department_code; ?></td>"+
            "<td><?php echo $dep->department_title; ?></td>"+
            '<td><button class="dep'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-depcode="<?php echo $dep->department_code; ?>" data-depname="<?php echo $dep->department_title; ?>" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modaldepart").append(modaldep);

          var modalven = '<div id="openven'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>Department</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>รหัสอร้านค้า</th>"+
            "<th>ชื่อร้านค้า</th>"+
            "<th>ที่อยู่ร้านค้า</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($vender as $ven){ ?>"+
            "<tr>"+
            "<td><?php echo $ven->vender_code; ?></td>"+

            "<td><?php echo $ven->vender_name; ?></td>"+
            "<td><?php echo $ven->vender_address; ?></td>"+
            '<td><button type="button" data-vencode="<?=$ven->vender_code;?>" data-venname="<?=$ven->vender_name;?>" data-venaddress="<?=$ven->vender_address;?>" class="ven'+row+' btn btn-xs btn-block btn-info" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modalvender").append(modalven);
          
          var modalcus = '<div id="opencus'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>Department</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>ชื่อลูกค้า</th>"+
            "<th>แผนก/โครงการ</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($customer as $cus){ ?>"+
            "<tr>"+
            "<td><?php echo $cus->m_code; ?></td>"+
            "<td><?php echo $cus->m_name; ?></td>"+
            '<td><button class="cus'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-cuscode="<?php echo $cus->m_code; ?>" data-cusaddress="<?php echo $cus->emp_address_now; ?>" data-cusname="<?php echo $cus->m_name; ?>" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modalcustomer").append(modalcus);
          // event click dr id#

          var damt = 0;
          var camt = 0;



          $("input[id^='dr'] , input[id^='cr']").keyup(function(event) {
              
             
            var el_ac = $(this).attr('ac');
              $(el_ac).val(0);
            
              damt = 0;

              $("input[id^='dr']").each(function(index, el) {


                
                 damt = damt + $(el).val().replace(/,/g,"")*1; 
              });
              $("#damt").val(numberWithCommas(damt));

              camt = 0;

              $("input[id^='cr']").each(function(index, el) {
                
                 camt = camt + $(el).val().replace(/,/g,"")*1; 
              });
            $("#camt").val(numberWithCommas(camt));
          });


$("#tax"+row).change(function(event) {
      var tax = $("#tax"+row);
      if (tax != '1' ) {
         $("#taxno"+row).prop('readonly', false);
         $("#taxdate"+row).prop('readonly', false);
         $("#taxdes"+row).prop('readonly', false);
         $("#taxtype"+row).prop('readonly', false);
         $("#taxid"+row).prop('readonly', false);
         $("#address"+row).prop('readonly', false);
      }else{
        $("#taxno"+row).prop('readonly', true);
         $("#taxdate"+row).prop('readonly', true);
         $("#taxdes"+row).prop('readonly', true);
         $("#taxtype"+row).prop('readonly', true);
         $("#taxid"+row).prop('readonly', true);
         $("#address"+row).prop('readonly', true);
         $("#taxs"+row).val(tax);
      }
});
$("#tax"+row).change(function(event) {

    $("#tax"+row).prop('readonly', true);

});  

$(".sys"+row).click(function(event) {


    if($("#pro_code"+row).val() == ""){
        swal({
            title: "กรุณาเลือก Project !!.",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
    }else{
      $("#sys_code"+row).val($(this).data('syscode'));        
      $("#sys_name"+row).val($(this).data('sysname'));
      $("#btncost"+row).attr('sys', $(this).data('syscode'));

      get_Budget_by_project( $("#pro_code"+row).val() , $("#sys_code"+row).val() , row);
    }
    //get_Budget_by_project()
});

        $(".books"+row).click(function(event) {
          $("#acc_code"+row).val($(this).data('bookcode'));
          $("#acc_name"+row).val($(this).data('bookname'));
          });

        $(".proj"+row).click(function(event) {
            $("#pro_code"+row).val($(this).data('procode'));
            $("#pro_name"+row).val($(this).data('proname'));
            $("#btncost"+row).attr('control', $(this).data('control'));
            $("#btncost"+row).attr('tender', $(this).data('tender'));
            get_Budget_by_project( $("#pro_code"+row).val() , $("#sys_code"+row).val() , row);

            $("#dep_code"+row).val('');
            $("#dep_name"+row).val('');
          });

        $(".dep"+row).click(function(event) {
          $("#dep_code"+row).val($(this).data('depcode'));
          $("#dep_name"+row).val($(this).data('depname'));
          $("#pro_code"+row).val('');
          $("#pro_name"+row).val('');
          $("#sys_code"+row).val('');
          $("#sys_name"+row).val('');
          });

        $(".ven"+row).click(function(event) {
          $("#ven_code"+row).val($(this).data('vencode'));
          $("#ven_name"+row).val($(this).data('venname'));
          $("#taxid"+row).val($(this).data('ventax'));
          $("#address"+row).val($(this).data('venaddress'));
          $("#taxtype"+row).val($(this).data('ventaxtype'));
          $("#vat"+row).val($(this).data('vat'));
          });

        $(".cus"+row).click(function(event) {
          $("#cus_code"+row).val($(this).data('cuscode'));
          $("#cus_name"+row).val($(this).data('cusname'));
          $("#address"+row).val($(this).data('cusaddress'));
          });
        $(".opencost").click(function(event) {

          // alert("fff");
          $('#cost1'+row).load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
          $( "#cost1"+row ).change(function() {

            var c1 = $('#cost1'+row).val();
            $('#cost2'+row).load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
            $("#tabcost2"+row).show();
            $("#costcodetext"+row).val(c1);
            $('#cost3'+row).html('');
          });
        
          $( "#cost2"+row ).change(function() {
          var c1 = $('#cost1'+row).val();
           var c2 = $('#cost2'+row).val();
          var c3 = $('#cost3'+row).load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c1+'/'+c2);
            $("#costcodetext"+row).val(c1+c2);
          });

          $( "#cost3"+row).change(function() {
          var c1 = $('#cost1'+row).val();
          var c2 = $('#cost2'+row).val();
          var c3 = $('#cost3'+row).val();
           $("#costcodetext"+row).val(c1+c2+c3);
           $("#cost-control"+row).show();
          });
        });

          // load
              va = 0;
              $("input[id^='dr']").each(function(index, el) {
                //$(el).val();
                
                 va = va + $(el).val()*1;
                
              });
            $("#damt").val(va);
        }

            function addrow2(acc_secondary,act_name2,is_project,project_name,allprice,isi_costcode,isi_costname){
        var row = ($('#bodygl tr').length-1)+1;

        var tr = '<tr class="removetf<?php echo $n;?>">'+
            '<td>'+row+'<input type="hidden" value="'+row+'" id="chki'+row+'" name="chki[]"><input type="hidden" value="I" id="chkitype'+row+'" name="chkitype[]"><input type="hidden" value="" id="ref'+row+'" name="ref[]"></td>'+
            '<td>'+
              '<div class="input-group">'+
              '<input _ice_ type="text" readonly="true" value="'+acc_secondary+'" class="form-control input-sm" name="acc_code[]" id="acc_code'+row+'">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Account Name" value="'+act_name2+'" name="acc_name[]" id="act_name'+row+'">'+
                
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#openacc'+row+'" row="'+row+'" onclick="openacc($(this))"  class="openacc btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //account code
            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Project Name " value="'+project_name+'" name="pro_name[]" id="pro_name'+row+'">'+
                '<input type="hidden" _ice_ readonly="true" value="'+is_project+'" class="form-control input-sm" name="pro_code[]" id="pro_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#openpro'+row+'"  class="openpro btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //project
            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 150px;"  class="form-control" readonly="readonly" placeholder="System Name " value="'+systemname+'" name="sys_name[]" id="sys_name'+row+'">'+
                '<input type="hidden" _ice_ readonly="true" value="'+is_system+'" class="form-control input-sm" name="sys_code[]" id="sys_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#opensys'+row+'"  class="opensys btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //system



            '<td >'+
              '<div class="input-group" id="origin'+row+'">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Costcode" value="'+isi_costcode+'" name="costcode[]" id="costcodetext'+row+'">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Cost Name" name="costname[]" id="costnamei'+row+'" value="'+isi_costname+'">'+
                  '<span class="input-group-btn" >'+
                   '<a class="costmat btn btn-info btn-sm " onclick="costmat($(this))" id="btncost'+row+'" attr-id='+row+' data-toggle="modal" data-target="#costcode'+row+'"><span class="glyphicon glyphicon-search"></span></a>'+
                    // '<a class="btn btn-info btn-sm  " id="boqitem'+row+'" data-toggle="modal" data-target="#boq'+row+'"><span class="glyphicon glyphicon-search"></span></a>'+
                '</span>'+
              '<div id="Costcode'+row+'"></div>'+

            '</td>'+
            //costcode

            // //Budget Control
            '<td  class="text-center">'+
            '<div id="Budget'+row+'" >-</div>'+

            '<input value="" type="hidden" id="total_bal'+row+'" name=total_bal[] type="text" />'+
            '<input value="" type="hidden" id="boq_id'+row+'" name=boq_id[] type="text" />'+
            '<input value="" type="hidden" id="bd_tender'+row+'"  name=bd_tenid[] type="text" />'+
           
            '</td>'+
            // //Budget Control
            '<td>'+
              '<input type="text" style="width: 100px;" value="0"  class="dr form-control text-right" value="" name="dr[]" id="dr'+row+'" ac="#cr'+row+'">'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 100px;" value="'+allprice+'" class="cr form-control text-right" value="" name="cr[]" id="cr'+row+'" ac="#dr'+row+'">'+
            '</td>'+

            '<td>'+
              '<select class="form-control" name="paid[]" id="paid'+row+'" style="width: 100px;">'+
              '<option class="1">Bank(Chq.)</option>'+
              '<option class="2">Cash</option>'+
              '</select>'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 250px;"  class="form-control" value="" name="description[]" id="description'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="refno[]" id="refno'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="date" style="width: 150px;"  class="form-control" value="" name="refdates[]" id="refdate'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="amt[]" id="amt'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 50px;"  class="form-control" value="" name="vat[]" id="vat'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="taxamt[]" id="taxamt'+row+'">'+
            '</td>'+

            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Department Name " value="" name="ven_name[]" id="ven_name'+row+'">'+
                '<input type="hidden" readonly="true" class="form-control input-sm" name="ven_code[]" id="ven_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#openven'+row+'"  class="openven btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //vender
            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Vender Name " value="" name="cus_name[]" id="cus_name'+row+'">'+
                '<input type="hidden" readonly="true" value="" class="form-control input-sm" name="cus_code[]" id="cus_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#opencus'+row+'"  class="opencus btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //customer
            '<td>'+
              '<select class="form-control"  id="tax'+row+'" attr-id="'+row+'" style="width: 100px;">'+
              '<option class=""></option>'+
              <?php foreach ($setup_tax as $st1) { ?>
              '<option value="<?php echo $st1->id_tax; ?>"><?php echo $st1->tax_name; ?></option>'+
              <?php } ?>
              
              
              '</select>'+
              '<input type="hidden" style="width: 100px;" readonly="true" class="form-control input-sm" value="" name="tax[]" id="taxs'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control input-sm" value="" name="taxnos[]" id="taxno'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="date" style="width: 140px;" class="form-control input-sm" value="" name="taxdates[]" id="taxdate'+row+'">'+
            '</td>'+

            '<td>'+
              '<select class="form-control input-sm" name="taxdesc[]"  id="taxdes'+row+'" style="width: 120px;">'+
              '<option class=""></option>'+
              <?php foreach ($setup_taxdes as $st2) { ?>      
              '<option value="<?php echo $st2->id_taxdes; ?>"><?php echo $st2->tax_desname; ?></option>'+
               <?php } ?>
              '</select>'+
            '</td>'+
            '<td>'+
              '<select class="form-control input-sm" name="taxtype[]"  id="taxtype'+row+'" style="width: 100px;">'+
              '<option value=""></option>'+
              <?php foreach ($taxtype as $s3) { ?>
            '<option value="<?php echo $s3->id_taxtype; ?>"><?php echo $s3->taxtype_name; ?></option>'+
              <?php } ?>
              
              '</select>'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 100px;" readonly="true" class="form-control" value="" name="taxid[]" id="taxid'+row+'">'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 250px;" readonly="true" class="form-control" value="" name="address[]" id="address'+row+'">'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="wt[]" id="wt'+row+'">'+
            '</td>'+

            '</tr>';
            $('#bodygl').append(tr);
                    
            var modalbank = '<div class="modal fade" id="opencost'+row+'" data-backdrop="false">'+
              '<div class="modal-dialog modal-lg">'+
                  '<div class="modal-content">'+
                '<div class="row">'+
                    '<div id="tabbank" class="col-md-6">'+
                        '<h4 id="hbank">xxx</h4>'+
                        '<select multiple class="form-control" id="cost1'+row+'" style="height:200px;">'+
                        '</select>'+
                    '</div>'+
                    '<div id="tabcost2" class="col-md-6">'+
                    '<h4>Branch</h4>'+
                        '<select multiple class="form-control" id="cost2'+row+'" style="height:200px;"></select>'+
                    '</div>'+
                    '<div id="tabcost3" class="col-md-12">'+
                        '<h4>Bank Account</h4>'+
                        '<select multiple class="form-control" id="cost3'+row+'" style="height:200px;">'+
                          '</select>'+
                    '</div>'+
                    '<div id="tabcost4" class="col-md-12">'+
                        '<input type="text" class="form-control input-sm" readonly name="costcodetext" id="costcodetext'+row+'">'+
                    '</div>'+
                '</div>'+
                '<br>'+
                '<div class="modal-footer">'+
                  '<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>'+
                  '<button type="button" id="select'+row+'" class="btn btn-primary" data-dismiss="modal">SELECT</button>'+
                '</div>'+
                  '</div>'+
                '</div>'+
              '</div>';
            $("#modalbank").append(modalbank);

            var modalaccount = '<div class="modal fade" id="openacc'+row+'" data-backdrop="false">'+
              " <div class='modal-dialog modal-lg'>"+
                "<div class='modal-content'>"+
                "<div class='modal-header'>"+
                "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
                "<h5 class='modal-title'>Book Account</h5>"+
                "</div>"+
                "<div class='modal-body'>"+
                '<div id="acc'+row+'">'+

                "</div>"+
              '</div>';
            $("#modalaccountcode").append(modalaccount);

            var modalpro = '<div id="openpro'+row+'" class="modal fade" data-backdrop="false">'+
              " <div class='modal-dialog modal-lg'>"+
              "<div class='modal-content'>"+
              "<div class='modal-header'>"+
              "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
              "<h5 class='modal-title'>Project </h5>"+
              "</div>"+
              "<div class='modal-body'>"+
              "<div>"+
              "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
              "<thead>"+
              "<tr>"+
              "<th>รหัสโครงการ</th>"+
              "<th>ชื่อโครงการ</th>"+
              "<th>เลือก</th>"+
              "</tr>"+
              "</thead>"+
              "<tbody>"+
              "<?php foreach ($proj as $pro){ ?>"+
              "<tr>"+
              "<td><?php echo $pro->project_code; ?></td>"+
              "<td><?php echo $pro->project_name; ?></td>"+
              '<td><button class="proj'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-control="<?=$pro->controlbg?>" data-procode="<?php echo $pro->project_id; ?>" data-proname="<?php echo $pro->project_name; ?>" data-tender="<?=$pro->bd_tenid;?>" data-dismiss="modal">เลือก</button></td>'+
              "</tr>"+
              "<?php } ?>"+
              "</tbody>"+
              "</table>"+
              "</div>"+
              "</div>";
          $("#modalproj").append(modalpro);

          var modaljob = '<div id="opensys'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>System</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>รหัสระบบ</th>"+
            "<th>ชื่อระบบ</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($system as $sys){ ?>"+
            "<tr>"+
            "<td><?php echo $sys->systemcode; ?></td>"+
            "<td><?php echo $sys->systemname; ?></td>"+
            '<td><button class="sys'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-syscode="<?php echo $sys->systemcode; ?>" data-sysname="<?php echo $sys->systemname; ?>" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modalj").append(modaljob);

          var modaldep = '<div id="opendep'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>Department</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>รหัสแผนก</th>"+
            "<th>ชื่อแผนก</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($depart as $dep){ ?>"+
            "<tr>"+
            "<td><?php echo $dep->department_code; ?></td>"+
            "<td><?php echo $dep->department_title; ?></td>"+
            '<td><button class="dep'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-depcode="<?php echo $dep->department_code; ?>" data-depname="<?php echo $dep->department_title; ?>" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modaldepart").append(modaldep);

          var modalven = '<div id="openven'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>Department</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>รหัสอร้านค้า</th>"+
            "<th>ชื่อร้านค้า</th>"+
            "<th>ที่อยู่ร้านค้า</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($vender as $ven){ ?>"+
            "<tr>"+
            "<td><?php echo $ven->vender_code; ?></td>"+

            "<td><?php echo $ven->vender_name; ?></td>"+
            "<td><?php echo $ven->vender_address; ?></td>"+
            '<td><button type="button" data-vencode="<?=$ven->vender_code;?>" data-venname="<?=$ven->vender_name;?>" data-venaddress="<?=$ven->vender_address;?>" class="ven'+row+' btn btn-xs btn-block btn-info" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modalvender").append(modalven);
          
          var modalcus = '<div id="opencus'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>Department</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>ชื่อลูกค้า</th>"+
            "<th>แผนก/โครงการ</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($customer as $cus){ ?>"+
            "<tr>"+
            "<td><?php echo $cus->m_code; ?></td>"+
            "<td><?php echo $cus->m_name; ?></td>"+
            '<td><button class="cus'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-cuscode="<?php echo $cus->m_code; ?>" data-cusaddress="<?php echo $cus->emp_address_now; ?>" data-cusname="<?php echo $cus->m_name; ?>" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modalcustomer").append(modalcus);
          // event click dr id#

          var damt = 0;
          var camt = 0;



          $("input[id^='dr'] , input[id^='cr']").keyup(function(event) {
              
             
            var el_ac = $(this).attr('ac');
              $(el_ac).val(0);
            
              damt = 0;

              $("input[id^='dr']").each(function(index, el) {


                
                 damt = damt + $(el).val().replace(/,/g,"")*1; 
              });
              $("#damt").val(numberWithCommas(damt));

              camt = 0;

              $("input[id^='cr']").each(function(index, el) {
                
                 camt = camt + $(el).val().replace(/,/g,"")*1; 
              });
            $("#camt").val(numberWithCommas(camt));
          });


$("#tax"+row).change(function(event) {
      var tax = $("#tax"+row);
      if (tax != '1' ) {
         $("#taxno"+row).prop('readonly', false);
         $("#taxdate"+row).prop('readonly', false);
         $("#taxdes"+row).prop('readonly', false);
         $("#taxtype"+row).prop('readonly', false);
         $("#taxid"+row).prop('readonly', false);
         $("#address"+row).prop('readonly', false);
      }else{
        $("#taxno"+row).prop('readonly', true);
         $("#taxdate"+row).prop('readonly', true);
         $("#taxdes"+row).prop('readonly', true);
         $("#taxtype"+row).prop('readonly', true);
         $("#taxid"+row).prop('readonly', true);
         $("#address"+row).prop('readonly', true);
         $("#taxs"+row).val(tax);
      }
});
$("#tax"+row).change(function(event) {

    $("#tax"+row).prop('readonly', true);

});  

$(".sys"+row).click(function(event) {


    if($("#pro_code"+row).val() == ""){
        swal({
            title: "กรุณาเลือก Project !!.",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
    }else{
      $("#sys_code"+row).val($(this).data('syscode'));        
      $("#sys_name"+row).val($(this).data('sysname'));
      $("#btncost"+row).attr('sys', $(this).data('syscode'));

      get_Budget_by_project( $("#pro_code"+row).val() , $("#sys_code"+row).val() , row);
    }
    //get_Budget_by_project()
});

        $(".books"+row).click(function(event) {
          $("#acc_code"+row).val($(this).data('bookcode'));
          $("#acc_name"+row).val($(this).data('bookname'));
          });

        $(".proj"+row).click(function(event) {
            $("#pro_code"+row).val($(this).data('procode'));
            $("#pro_name"+row).val($(this).data('proname'));
            $("#btncost"+row).attr('control', $(this).data('control'));
            $("#btncost"+row).attr('tender', $(this).data('tender'));
            get_Budget_by_project( $("#pro_code"+row).val() , $("#sys_code"+row).val() , row);

            $("#dep_code"+row).val('');
            $("#dep_name"+row).val('');
          });

        $(".dep"+row).click(function(event) {
          $("#dep_code"+row).val($(this).data('depcode'));
          $("#dep_name"+row).val($(this).data('depname'));
          $("#pro_code"+row).val('');
          $("#pro_name"+row).val('');
          $("#sys_code"+row).val('');
          $("#sys_name"+row).val('');
          });

        $(".ven"+row).click(function(event) {
          $("#ven_code"+row).val($(this).data('vencode'));
          $("#ven_name"+row).val($(this).data('venname'));
          $("#taxid"+row).val($(this).data('ventax'));
          $("#address"+row).val($(this).data('venaddress'));
          $("#taxtype"+row).val($(this).data('ventaxtype'));
          $("#vat"+row).val($(this).data('vat'));
          });

        $(".cus"+row).click(function(event) {
          $("#cus_code"+row).val($(this).data('cuscode'));
          $("#cus_name"+row).val($(this).data('cusname'));
          $("#address"+row).val($(this).data('cusaddress'));
          });
        $(".opencost").click(function(event) {

          // alert("fff");
          $('#cost1'+row).load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
          $( "#cost1"+row ).change(function() {

            var c1 = $('#cost1'+row).val();
            $('#cost2'+row).load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
            $("#tabcost2"+row).show();
            $("#costcodetext"+row).val(c1);
            $('#cost3'+row).html('');
          });
        
          $( "#cost2"+row ).change(function() {
          var c1 = $('#cost1'+row).val();
           var c2 = $('#cost2'+row).val();
          var c3 = $('#cost3'+row).load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c1+'/'+c2);
            $("#costcodetext"+row).val(c1+c2);
          });

          $( "#cost3"+row).change(function() {
          var c1 = $('#cost1'+row).val();
          var c2 = $('#cost2'+row).val();
          var c3 = $('#cost3'+row).val();
           $("#costcodetext"+row).val(c1+c2+c3);
           $("#cost-control"+row).show();
          });
        });

          // load
              va = 0;
              $("input[id^='dr']").each(function(index, el) {
                //$(el).val();
                
                 va = va + $(el).val()*1;
                
              });
            $("#damt").val(va);
        }      
        }else{
           $('.removetf<?php echo $n;?>').remove();
        }

         calculateSum();
  $(".dr").on("keydown keyup", function() {
  
  calculateSum();
  });
  function calculateSum() {
  var sum = 0;
  //iterate through each textboxes and add the values
  $(".dr").each(function() {
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
  
  $("input#damt").val(numberWithCommas(sum));
  }


  calculateSum1();
  $(".cr").on("keydown keyup", function() {
  
  calculateSum1();
  });
  function calculateSum1() {
  var sum1 = 0;
  //iterate through each textboxes and add the values
  $(".cr").each(function() {
  //add only if the value is number
  if (!isNaN($(this).val().replace(/,/g,"")) && $(this).val().replace(/,/g,"").length != 0) {
  sum1 += parseFloat($(this).val().replace(/,/g,""));
  $(this).css("background-color", "#FEFFB0");
  console.log(sum1);
  //alert(sum)
  }
  // else if (this.value.length != 0){
  //     $(this).css("background-color", "red");
  // }
  });
  
  $("input#camt").val(numberWithCommas(sum1));
  }
      });
</script>
<?php $a++; } ?>



<?php  $b =1; foreach ($po as $valpo){ ?>
<tr>
<td><?php echo $valpo->po_reccode; ?></td>
<td>O</td>
<td><?php echo $valpo->po_recdate; ?></td>
<td><?php echo $valpo->project_name; ?></td>
<td></td>
<td></td>
<td></td>
<td><?php echo $valpo->createuser; ?></td>
<td><?php echo $valpo->time; ?></td>
<td class="text-center"><input class="opendeptoro<?php echo $b;?>" type="checkbox" ></td>
</tr>

<script>
  $(".opendeptoro<?php echo $b;?>").click(function(event) {
	$('#typei').val("IC");
  if ($(".opendeptoro<?php echo $b; ?>").prop("checked")) {

    <?php 
    $this->db->select('*');
    $this->db->where("act_code",$valpo->acc_primary);
    $this->db->from("account_total");
    $act3 = $this->db->get()->result();
    $act_name3 = "";
    foreach ($act3 as $a3) {
      $act_name3 = $a3->act_name;
    }
    ?>

    <?php 
    $this->db->select('*');
    $this->db->where("act_code",$valpo->acc_secondary);
    $this->db->from("account_total");
    $act4 = $this->db->get()->result();
    $act_name4 = "";
    foreach ($act4 as $a4) {
      $act_name4 = $a4->act_name;
    }
    ?>
    
    <?php 
    $this->db->select('*');
    $this->db->where("poi_ref",$valpo->po_reccode);
    $this->db->from("receive_poitem");
    $pore = $this->db->get()->result();
    $allpo = 0;
    foreach ($pore as $p) {
      $allpo = $allpo+$p->poi_netamt;
    }
    ?>

    var system = "<?php echo $valpo->system; ?>";
    var systemname = "<?php echo $valpo->systemname; ?>";
    var acc_primaryy = "<?php echo $valpo->acc_primary; ?>";
    var act_name3 = "<?php echo $act_name3; ?>";
    var acc_secondaryy = "<?php echo $valpo->acc_secondary; ?>";
    var act_name4 = "<?php echo $act_name4; ?>";

    var projectid = "<?php echo $valpo->project; ?>";
    var project_name = "<?php echo $valpo->project_name; ?>";

    var allpo = "<?php echo $allpo; ?>";
    var po_reccode = "<?php echo $valpo->po_reccode; ?>";
            addrow(acc_primaryy,act_name3,projectid,project_name,allpo,system,systemname,po_reccode);
            <?php foreach ($pore as $p) { ?>
            var poi_netamt = "<?php echo $p->poi_netamt; ?>";
            var poi_costcode = "<?php echo $p->poi_costcode; ?>";
            var poi_costname = "<?php echo $p->poi_costname; ?>";
            addrow2(acc_secondaryy,act_name4,projectid,project_name,system,systemname,poi_netamt,poi_costcode,poi_costname);
            <?php } ?>

      function addrow(acc_primaryy,act_name3,projectid,project_name,allpo,system,systemname,po_reccode){
        var row = ($('#bodygl tr').length-1)+1;

        var tr = '<tr class="removetf<?php echo $n;?>">'+
            '<td>'+row+'<input type="hidden" value="'+row+'" id="chki'+row+'" name="chki[]"><input type="hidden" value="O" id="chkitype'+row+'" name="chkitype[]"><input type="hidden" value="'+po_reccode+'" id="ref'+row+'" name="ref[]"></td>'+
            '<td>'+
              '<div class="input-group">'+
                '<input _ice_ type="text" readonly="true" value="'+acc_primaryy+'" class="form-control input-sm" name="acc_code[]" id="acc_code'+row+'">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Account Name" value="'+act_name3+'" name="acc_name[]" id="act_name'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#openacc'+row+'" row="'+row+'" onclick="openacc($(this))"  class="openacc btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //account code
            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Project Name " value="'+project_name+'" name="pro_name[]" id="pro_name'+row+'">'+
                '<input type="hidden" _ice_ readonly="true" value="'+projectid+'" class="form-control input-sm" name="pro_code[]" id="pro_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#openpro'+row+'"  class="openpro btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //project
            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 150px;"  class="form-control" readonly="readonly" placeholder="System Name " value="'+systemname+'" name="sys_name[]" id="sys_name'+row+'">'+
                '<input type="hidden" _ice_ readonly="true" value="'+system+'" class="form-control input-sm" name="sys_code[]" id="sys_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#opensys'+row+'"  class="opensys btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //system
            '<td >'+
              '<div class="input-group" id="origin'+row+'">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Costcode" value="" name="costcode[]" id="costcodetext'+row+'">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Cost Name" name="costname[]" id="costnamei'+row+'">'+
                  '<span class="input-group-btn" >'+
                   '<a class="costmat btn btn-info btn-sm " onclick="costmat($(this))" id="btncost'+row+'" attr-id='+row+' data-toggle="modal" data-target="#costcode'+row+'"><span class="glyphicon glyphicon-search"></span></a>'+
                    // '<a class="btn btn-info btn-sm  " id="boqitem'+row+'" data-toggle="modal" data-target="#boq'+row+'"><span class="glyphicon glyphicon-search"></span></a>'+
                '</span>'+
              '<div id="Costcode'+row+'"></div>'+

            '</td>'+
            //costcode

            // //Budget Control
            '<td  class="text-center">'+
            '<div id="Budget'+row+'" >-</div>'+

            '<input value="" type="hidden" id="total_bal'+row+'" name=total_bal[] type="text" />'+
            '<input value="" type="hidden" id="boq_id'+row+'" name=boq_id[] type="text" />'+
            '<input value="" type="hidden" id="bd_tender'+row+'"  name=bd_tenid[] type="text" />'+
           
            '</td>'+
            // //Budget Control
            '<td>'+
              '<input type="text" style="width: 100px;" value="'+allpo+'"  class="dr form-control text-right" value="" name="dr[]" id="dr'+row+'" ac="#cr'+row+'">'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 100px;" value="0" class="cr form-control text-right" value="" name="cr[]" id="cr'+row+'" ac="#dr'+row+'">'+
            '</td>'+

            '<td>'+
              '<select class="form-control" name="paid[]" id="paid'+row+'" style="width: 100px;">'+
              '<option class="1">Bank(Chq.)</option>'+
              '<option class="2">Cash</option>'+
              '</select>'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 250px;"  class="form-control" value="" name="description[]" id="description'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="refno[]" id="refno'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="date" style="width: 150px;"  class="form-control" value="" name="refdates[]" id="refdate'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="amt[]" id="amt'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 50px;"  class="form-control" value="" name="vat[]" id="vat'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="taxamt[]" id="taxamt'+row+'">'+
            '</td>'+

            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Department Name " value="" name="ven_name[]" id="ven_name'+row+'">'+
                '<input type="hidden" readonly="true" class="form-control input-sm" name="ven_code[]" id="ven_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#openven'+row+'"  class="openven btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //vender
            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Vender Name " value="" name="cus_name[]" id="cus_name'+row+'">'+
                '<input type="hidden" readonly="true" value="" class="form-control input-sm" name="cus_code[]" id="cus_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#opencus'+row+'"  class="opencus btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //customer
            '<td>'+
              '<select class="form-control"  id="tax'+row+'" attr-id="'+row+'" style="width: 100px;">'+
              '<option class=""></option>'+
              <?php foreach ($setup_tax as $st1) { ?>
              '<option value="<?php echo $st1->id_tax; ?>"><?php echo $st1->tax_name; ?></option>'+
              <?php } ?>
              
              
              '</select>'+
              '<input type="hidden" style="width: 100px;" readonly="true" class="form-control input-sm" value="" name="tax[]" id="taxs'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control input-sm" value="" name="taxnos[]" id="taxno'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="date" style="width: 140px;" class="form-control input-sm" value="" name="taxdates[]" id="taxdate'+row+'">'+
            '</td>'+

            '<td>'+
              '<select class="form-control input-sm" name="taxdesc[]"  id="taxdes'+row+'" style="width: 120px;">'+
              '<option class=""></option>'+
              <?php foreach ($setup_taxdes as $st2) { ?>      
              '<option value="<?php echo $st2->id_taxdes; ?>"><?php echo $st2->tax_desname; ?></option>'+
               <?php } ?>
              '</select>'+
            '</td>'+
            '<td>'+
              '<select class="form-control input-sm" name="taxtype[]"  id="taxtype'+row+'" style="width: 100px;">'+
              '<option value=""></option>'+
              <?php foreach ($taxtype as $s3) { ?>
            '<option value="<?php echo $s3->id_taxtype; ?>"><?php echo $s3->taxtype_name; ?></option>'+
              <?php } ?>
              
              '</select>'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 100px;" readonly="true" class="form-control" value="" name="taxid[]" id="taxid'+row+'">'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 250px;" readonly="true" class="form-control" value="" name="address[]" id="address'+row+'">'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="wt[]" id="wt'+row+'">'+
            '</td>'+

            '</tr>';
            $('#bodygl').append(tr);
                    
            var modalbank = '<div class="modal fade" id="opencost'+row+'" data-backdrop="false">'+
              '<div class="modal-dialog modal-lg">'+
                  '<div class="modal-content">'+
                '<div class="row">'+
                    '<div id="tabbank" class="col-md-6">'+
                        '<h4 id="hbank">xxx</h4>'+
                        '<select multiple class="form-control" id="cost1'+row+'" style="height:200px;">'+
                        '</select>'+
                    '</div>'+
                    '<div id="tabcost2" class="col-md-6">'+
                    '<h4>Branch</h4>'+
                        '<select multiple class="form-control" id="cost2'+row+'" style="height:200px;"></select>'+
                    '</div>'+
                    '<div id="tabcost3" class="col-md-12">'+
                        '<h4>Bank Account</h4>'+
                        '<select multiple class="form-control" id="cost3'+row+'" style="height:200px;">'+
                          '</select>'+
                    '</div>'+
                    '<div id="tabcost4" class="col-md-12">'+
                        '<input type="text" class="form-control input-sm" readonly name="costcodetext" id="costcodetext'+row+'">'+
                    '</div>'+
                '</div>'+
                '<br>'+
                '<div class="modal-footer">'+
                  '<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>'+
                  '<button type="button" id="select'+row+'" class="btn btn-primary" data-dismiss="modal">SELECT</button>'+
                '</div>'+
                  '</div>'+
                '</div>'+
              '</div>';
            $("#modalbank").append(modalbank);

          var modalaccount = '<div class="modal fade" id="openacc'+row+'" data-backdrop="false">'+
              " <div class='modal-dialog modal-lg'>"+
                "<div class='modal-content'>"+
                "<div class='modal-header'>"+
                "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
                "<h5 class='modal-title'>Book Account</h5>"+
                "</div>"+
                "<div class='modal-body'>"+
                '<div id="acc'+row+'">'+

                "</div>"+
              '</div>';
            $("#modalaccountcode").append(modalaccount);

            var modalpro = '<div id="openpro'+row+'" class="modal fade" data-backdrop="false">'+
              " <div class='modal-dialog modal-lg'>"+
              "<div class='modal-content'>"+
              "<div class='modal-header'>"+
              "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
              "<h5 class='modal-title'>Project </h5>"+
              "</div>"+
              "<div class='modal-body'>"+
              "<div>"+
              "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
              "<thead>"+
              "<tr>"+
              "<th>รหัสโครงการ</th>"+
              "<th>ชื่อโครงการ</th>"+
              "<th>เลือก</th>"+
              "</tr>"+
              "</thead>"+
              "<tbody>"+
              "<?php foreach ($proj as $pro){ ?>"+
              "<tr>"+
              "<td><?php echo $pro->project_code; ?></td>"+
              "<td><?php echo $pro->project_name; ?></td>"+
              '<td><button class="proj'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-control="<?=$pro->controlbg?>" data-procode="<?php echo $pro->project_id; ?>" data-proname="<?php echo $pro->project_name; ?>" data-tender="<?=$pro->bd_tenid;?>" data-dismiss="modal">เลือก</button></td>'+
              "</tr>"+
              "<?php } ?>"+
              "</tbody>"+
              "</table>"+
              "</div>"+
              "</div>";
          $("#modalproj").append(modalpro);

          var modaljob = '<div id="opensys'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>System</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>รหัสระบบ</th>"+
            "<th>ชื่อระบบ</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($system as $sys){ ?>"+
            "<tr>"+
            "<td><?php echo $sys->systemcode; ?></td>"+
            "<td><?php echo $sys->systemname; ?></td>"+
            '<td><button class="sys'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-syscode="<?php echo $sys->systemcode; ?>" data-sysname="<?php echo $sys->systemname; ?>" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modalj").append(modaljob);

          var modaldep = '<div id="opendep'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>Department</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>รหัสแผนก</th>"+
            "<th>ชื่อแผนก</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($depart as $dep){ ?>"+
            "<tr>"+
            "<td><?php echo $dep->department_code; ?></td>"+
            "<td><?php echo $dep->department_title; ?></td>"+
            '<td><button class="dep'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-depcode="<?php echo $dep->department_code; ?>" data-depname="<?php echo $dep->department_title; ?>" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modaldepart").append(modaldep);

          var modalven = '<div id="openven'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>Department</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>รหัสอร้านค้า</th>"+
            "<th>ชื่อร้านค้า</th>"+
            "<th>ที่อยู่ร้านค้า</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($vender as $ven){ ?>"+
            "<tr>"+
            "<td><?php echo $ven->vender_code; ?></td>"+

            "<td><?php echo $ven->vender_name; ?></td>"+
            "<td><?php echo $ven->vender_address; ?></td>"+
            '<td><button type="button" data-vencode="<?=$ven->vender_code;?>" data-venname="<?=$ven->vender_name;?>" data-venaddress="<?=$ven->vender_address;?>" class="ven'+row+' btn btn-xs btn-block btn-info" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modalvender").append(modalven);
          
          var modalcus = '<div id="opencus'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>Department</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>ชื่อลูกค้า</th>"+
            "<th>แผนก/โครงการ</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($customer as $cus){ ?>"+
            "<tr>"+
            "<td><?php echo $cus->m_code; ?></td>"+
            "<td><?php echo $cus->m_name; ?></td>"+
            '<td><button class="cus'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-cuscode="<?php echo $cus->m_code; ?>" data-cusaddress="<?php echo $cus->emp_address_now; ?>" data-cusname="<?php echo $cus->m_name; ?>" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modalcustomer").append(modalcus);
          // event click dr id#

          var damt = 0;
          var camt = 0;



          $("input[id^='dr'] , input[id^='cr']").keyup(function(event) {
              
             
            var el_ac = $(this).attr('ac');
              $(el_ac).val(0);
            
              damt = 0;

              $("input[id^='dr']").each(function(index, el) {


                
                 damt = damt + $(el).val().replace(/,/g,"")*1; 
              });
              $("#damt").val(numberWithCommas(damt));

              camt = 0;

              $("input[id^='cr']").each(function(index, el) {
                
                 camt = camt + $(el).val().replace(/,/g,"")*1; 
              });
            $("#camt").val(numberWithCommas(camt));
          });


          $("#tax"+row).change(function(event) {
                var tax = $("#tax"+row);
                if (tax != '1' ) {
                   $("#taxno"+row).prop('readonly', false);
                   $("#taxdate"+row).prop('readonly', false);
                   $("#taxdes"+row).prop('readonly', false);
                   $("#taxtype"+row).prop('readonly', false);
                   $("#taxid"+row).prop('readonly', false);
                   $("#address"+row).prop('readonly', false);
                }else{
                  $("#taxno"+row).prop('readonly', true);
                   $("#taxdate"+row).prop('readonly', true);
                   $("#taxdes"+row).prop('readonly', true);
                   $("#taxtype"+row).prop('readonly', true);
                   $("#taxid"+row).prop('readonly', true);
                   $("#address"+row).prop('readonly', true);
                   $("#taxs"+row).val(tax);
                }
          });
          $("#tax"+row).change(function(event) {

              $("#tax"+row).prop('readonly', true);

          });  

        $(".sys"+row).click(function(event) {


            if($("#pro_code"+row).val() == ""){
                swal({
                    title: "กรุณาเลือก Project !!.",
                    text: "",
                    confirmButtonColor: "#EA1923",
                    type: "error"
                });
            }else{
              $("#sys_code"+row).val($(this).data('syscode'));        
              $("#sys_name"+row).val($(this).data('sysname'));
              $("#btncost"+row).attr('sys', $(this).data('syscode'));

              get_Budget_by_project( $("#pro_code"+row).val() , $("#sys_code"+row).val() , row);
            }
            //get_Budget_by_project()
        });

        $(".books"+row).click(function(event) {
          $("#acc_code"+row).val($(this).data('bookcode'));
          $("#acc_name"+row).val($(this).data('bookname'));
          });

        $(".proj"+row).click(function(event) {
            $("#pro_code"+row).val($(this).data('procode'));
            $("#pro_name"+row).val($(this).data('proname'));
            $("#btncost"+row).attr('control', $(this).data('control'));
            $("#btncost"+row).attr('tender', $(this).data('tender'));
            get_Budget_by_project( $("#pro_code"+row).val() , $("#sys_code"+row).val() , row);

            $("#dep_code"+row).val('');
            $("#dep_name"+row).val('');
          });

        $(".dep"+row).click(function(event) {
          $("#dep_code"+row).val($(this).data('depcode'));
          $("#dep_name"+row).val($(this).data('depname'));
          $("#pro_code"+row).val('');
          $("#pro_name"+row).val('');
          $("#sys_code"+row).val('');
          $("#sys_name"+row).val('');
          });

        $(".ven"+row).click(function(event) {
          $("#ven_code"+row).val($(this).data('vencode'));
          $("#ven_name"+row).val($(this).data('venname'));
          $("#taxid"+row).val($(this).data('ventax'));
          $("#address"+row).val($(this).data('venaddress'));
          $("#taxtype"+row).val($(this).data('ventaxtype'));
          $("#vat"+row).val($(this).data('vat'));
          });

        $(".cus"+row).click(function(event) {
          $("#cus_code"+row).val($(this).data('cuscode'));
          $("#cus_name"+row).val($(this).data('cusname'));
          $("#address"+row).val($(this).data('cusaddress'));
          });
        $(".opencost").click(function(event) {

          // alert("fff");
          $('#cost1'+row).load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
          $( "#cost1"+row ).change(function() {

            var c1 = $('#cost1'+row).val();
            $('#cost2'+row).load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
            $("#tabcost2"+row).show();
            $("#costcodetext"+row).val(c1);
            $('#cost3'+row).html('');
          });
        
          $( "#cost2"+row ).change(function() {
          var c1 = $('#cost1'+row).val();
           var c2 = $('#cost2'+row).val();
          var c3 = $('#cost3'+row).load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c1+'/'+c2);
            $("#costcodetext"+row).val(c1+c2);
          });

          $( "#cost3"+row).change(function() {
          var c1 = $('#cost1'+row).val();
          var c2 = $('#cost2'+row).val();
          var c3 = $('#cost3'+row).val();
           $("#costcodetext"+row).val(c1+c2+c3);
           $("#cost-control"+row).show();
          });
        });

          // load
              va = 0;
              $("input[id^='dr']").each(function(index, el) {
                //$(el).val();
                
                 va = va + $(el).val()*1;
                
              });
            $("#damt").val(va);
        }

      function addrow2(acc_secondaryy,act_name4,projectid,project_name,system,systemname,poi_netamt,poi_costcode,poi_costname){
        var row = ($('#bodygl tr').length-1)+1;
        var tr = '<tr class="removetf<?php echo $n;?>">'+
            '<td>'+row+'<input type="hidden" value="'+row+'" id="chki'+row+'" name="chki[]"><input type="hidden" value="O" id="chkitype'+row+'" name="chkitype[]"><input type="hidden" value="" id="ref'+row+'" name="ref[]"></td>'+
            '<td>'+
              '<div class="input-group">'+
              '<input _ice_ type="text" readonly="true" value="'+acc_secondaryy+'" class="form-control input-sm" name="acc_code[]" id="acc_code'+row+'">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Account Name" value="'+act_name4+'" name="acc_name[]" id="act_name'+row+'">'+
                
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#openacc'+row+'" row="'+row+'" onclick="openacc($(this))"  class="openacc btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //account code
            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Project Name " value="'+project_name+'" name="pro_name[]" id="pro_name'+row+'">'+
                '<input type="hidden" _ice_ readonly="true" value="'+projectid+'" class="form-control input-sm" name="pro_code[]" id="pro_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#openpro'+row+'"  class="openpro btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //project
            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 150px;"  class="form-control" readonly="readonly" placeholder="System Name " value="'+systemname+'" name="sys_name[]" id="sys_name'+row+'">'+
                '<input type="hidden" _ice_ readonly="true" value="'+system+'" class="form-control input-sm" name="sys_code[]" id="sys_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#opensys'+row+'"  class="opensys btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //system
            '<td >'+
              '<div class="input-group" id="origin'+row+'">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Costcode" value="'+poi_costcode+'" name="costcode[]" id="costcodetext'+row+'">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Cost Name" name="costname[]" id="costnamei'+row+'" value="'+poi_costname+'">'+
                  '<span class="input-group-btn" >'+
                   '<a class="costmat btn btn-info btn-sm " onclick="costmat($(this))" id="btncost'+row+'" attr-id='+row+' data-toggle="modal" data-target="#costcode'+row+'"><span class="glyphicon glyphicon-search"></span></a>'+
                    // '<a class="btn btn-info btn-sm  " id="boqitem'+row+'" data-toggle="modal" data-target="#boq'+row+'"><span class="glyphicon glyphicon-search"></span></a>'+
                '</span>'+
              '<div id="Costcode'+row+'"></div>'+

            '</td>'+
            //costcode

            // //Budget Control
            '<td  class="text-center">'+
            '<div id="Budget'+row+'" >-</div>'+

            '<input value="" type="hidden" id="total_bal'+row+'" name=total_bal[] type="text" />'+
            '<input value="" type="hidden" id="boq_id'+row+'" name=boq_id[] type="text" />'+
            '<input value="" type="hidden" id="bd_tender'+row+'"  name=bd_tenid[] type="text" />'+
           
            '</td>'+
            // //Budget Control
            '<td>'+
              '<input type="text" style="width: 100px;" value="0"  class="dr form-control text-right" value="" name="dr[]" id="dr'+row+'" ac="#cr'+row+'">'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 100px;" value="'+poi_netamt+'" class="cr form-control text-right" value="" name="cr[]" id="cr'+row+'" ac="#dr'+row+'">'+
            '</td>'+

            '<td>'+
              '<select class="form-control" name="paid[]" id="paid'+row+'" style="width: 100px;">'+
              '<option class="1">Bank(Chq.)</option>'+
              '<option class="2">Cash</option>'+
              '</select>'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 250px;"  class="form-control" value="" name="description[]" id="description'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="refno[]" id="refno'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="date" style="width: 150px;"  class="form-control" value="" name="refdates[]" id="refdate'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="amt[]" id="amt'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 50px;"  class="form-control" value="" name="vat[]" id="vat'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="taxamt[]" id="taxamt'+row+'">'+
            '</td>'+

            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Department Name " value="" name="ven_name[]" id="ven_name'+row+'">'+
                '<input type="hidden" readonly="true" class="form-control input-sm" name="ven_code[]" id="ven_code'+row+'">'+
                '<div class="input-group-btn">'+
                '<button type="button" data-toggle="modal" data-target="#openven'+row+'"  class="openven btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //vender
            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Vender Name " value="" name="cus_name[]" id="cus_name'+row+'">'+
                '<input type="hidden" readonly="true" value="" class="form-control input-sm" name="cus_code[]" id="cus_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#opencus'+row+'"  class="opencus btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //customer
            '<td>'+
              '<select class="form-control"  id="tax'+row+'" attr-id="'+row+'" style="width: 100px;">'+
              '<option class=""></option>'+
              <?php foreach ($setup_tax as $st1) { ?>
              '<option value="<?php echo $st1->id_tax; ?>"><?php echo $st1->tax_name; ?></option>'+
              <?php } ?>
              
              
              '</select>'+
              '<input type="hidden" style="width: 100px;" readonly="true" class="form-control input-sm" value="" name="tax[]" id="taxs'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control input-sm" value="" name="taxnos[]" id="taxno'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="date" style="width: 140px;" class="form-control input-sm" value="" name="taxdates[]" id="taxdate'+row+'">'+
            '</td>'+

            '<td>'+
              '<select class="form-control input-sm" name="taxdesc[]"  id="taxdes'+row+'" style="width: 120px;">'+
              '<option class=""></option>'+
              <?php foreach ($setup_taxdes as $st2) { ?>      
              '<option value="<?php echo $st2->id_taxdes; ?>"><?php echo $st2->tax_desname; ?></option>'+
               <?php } ?>
              '</select>'+
            '</td>'+
            '<td>'+
              '<select class="form-control input-sm" name="taxtype[]"  id="taxtype'+row+'" style="width: 100px;">'+
              '<option value=""></option>'+
              <?php foreach ($taxtype as $s3) { ?>
            '<option value="<?php echo $s3->id_taxtype; ?>"><?php echo $s3->taxtype_name; ?></option>'+
              <?php } ?>
              
              '</select>'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 100px;" readonly="true" class="form-control" value="" name="taxid[]" id="taxid'+row+'">'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 250px;" readonly="true" class="form-control" value="" name="address[]" id="address'+row+'">'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control" value="" name="wt[]" id="wt'+row+'">'+
            '</td>'+

            '</tr>';
            $('#bodygl').append(tr);
                    
            var modalbank = '<div class="modal fade" id="opencost'+row+'" data-backdrop="false">'+
              '<div class="modal-dialog modal-lg">'+
                  '<div class="modal-content">'+
                '<div class="row">'+
                    '<div id="tabbank" class="col-md-6">'+
                        '<h4 id="hbank">xxx</h4>'+
                        '<select multiple class="form-control" id="cost1'+row+'" style="height:200px;">'+
                        '</select>'+
                    '</div>'+
                    '<div id="tabcost2" class="col-md-6">'+
                    '<h4>Branch</h4>'+
                        '<select multiple class="form-control" id="cost2'+row+'" style="height:200px;"></select>'+
                    '</div>'+
                    '<div id="tabcost3" class="col-md-12">'+
                        '<h4>Bank Account</h4>'+
                        '<select multiple class="form-control" id="cost3'+row+'" style="height:200px;">'+
                          '</select>'+
                    '</div>'+
                    '<div id="tabcost4" class="col-md-12">'+
                        '<input type="text" class="form-control input-sm" readonly name="costcodetext" id="costcodetext'+row+'">'+
                    '</div>'+
                '</div>'+
                '<br>'+
                '<div class="modal-footer">'+
                  '<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>'+
                  '<button type="button" id="select'+row+'" class="btn btn-primary" data-dismiss="modal">SELECT</button>'+
                '</div>'+
                  '</div>'+
                '</div>'+
              '</div>';
            $("#modalbank").append(modalbank);

            var modalaccount = '<div class="modal fade" id="openacc'+row+'" data-backdrop="false">'+
              " <div class='modal-dialog modal-lg'>"+
                "<div class='modal-content'>"+
                "<div class='modal-header'>"+
                "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
                "<h5 class='modal-title'>Book Account</h5>"+
                "</div>"+
                "<div class='modal-body'>"+
                '<div id="acc'+row+'">'+

                "</div>"+
              '</div>';
            $("#modalaccountcode").append(modalaccount);

            var modalpro = '<div id="openpro'+row+'" class="modal fade" data-backdrop="false">'+
              " <div class='modal-dialog modal-lg'>"+
              "<div class='modal-content'>"+
              "<div class='modal-header'>"+
              "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
              "<h5 class='modal-title'>Project </h5>"+
              "</div>"+
              "<div class='modal-body'>"+
              "<div>"+
              "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
              "<thead>"+
              "<tr>"+
              "<th>รหัสโครงการ</th>"+
              "<th>ชื่อโครงการ</th>"+
              "<th>เลือก</th>"+
              "</tr>"+
              "</thead>"+
              "<tbody>"+
              "<?php foreach ($proj as $pro){ ?>"+
              "<tr>"+
              "<td><?php echo $pro->project_code; ?></td>"+
              "<td><?php echo $pro->project_name; ?></td>"+
              '<td><button class="proj'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-control="<?=$pro->controlbg?>" data-procode="<?php echo $pro->project_id; ?>" data-proname="<?php echo $pro->project_name; ?>" data-tender="<?=$pro->bd_tenid;?>" data-dismiss="modal">เลือก</button></td>'+
              "</tr>"+
              "<?php } ?>"+
              "</tbody>"+
              "</table>"+
              "</div>"+
              "</div>";
          $("#modalproj").append(modalpro);

          var modaljob = '<div id="opensys'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>System</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>รหัสระบบ</th>"+
            "<th>ชื่อระบบ</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($system as $sys){ ?>"+
            "<tr>"+
            "<td><?php echo $sys->systemcode; ?></td>"+
            "<td><?php echo $sys->systemname; ?></td>"+
            '<td><button class="sys'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-syscode="<?php echo $sys->systemcode; ?>" data-sysname="<?php echo $sys->systemname; ?>" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modalj").append(modaljob);

          var modaldep = '<div id="opendep'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>Department</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>รหัสแผนก</th>"+
            "<th>ชื่อแผนก</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($depart as $dep){ ?>"+
            "<tr>"+
            "<td><?php echo $dep->department_code; ?></td>"+
            "<td><?php echo $dep->department_title; ?></td>"+
            '<td><button class="dep'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-depcode="<?php echo $dep->department_code; ?>" data-depname="<?php echo $dep->department_title; ?>" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modaldepart").append(modaldep);

          var modalven = '<div id="openven'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>Department</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>รหัสอร้านค้า</th>"+
            "<th>ชื่อร้านค้า</th>"+
            "<th>ที่อยู่ร้านค้า</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($vender as $ven){ ?>"+
            "<tr>"+
            "<td><?php echo $ven->vender_code; ?></td>"+

            "<td><?php echo $ven->vender_name; ?></td>"+
            "<td><?php echo $ven->vender_address; ?></td>"+
            '<td><button type="button" data-vencode="<?=$ven->vender_code;?>" data-venname="<?=$ven->vender_name;?>" data-venaddress="<?=$ven->vender_address;?>" class="ven'+row+' btn btn-xs btn-block btn-info" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modalvender").append(modalven);
          
          var modalcus = '<div id="opencus'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>Department</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>ชื่อลูกค้า</th>"+
            "<th>แผนก/โครงการ</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($customer as $cus){ ?>"+
            "<tr>"+
            "<td><?php echo $cus->m_code; ?></td>"+
            "<td><?php echo $cus->m_name; ?></td>"+
            '<td><button class="cus'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-cuscode="<?php echo $cus->m_code; ?>" data-cusaddress="<?php echo $cus->emp_address_now; ?>" data-cusname="<?php echo $cus->m_name; ?>" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modalcustomer").append(modalcus);
          // event click dr id#

          var damt = 0;
          var camt = 0;



          $("input[id^='dr'] , input[id^='cr']").keyup(function(event) {
              
             
            var el_ac = $(this).attr('ac');
              $(el_ac).val(0);
            
              damt = 0;

              $("input[id^='dr']").each(function(index, el) {


                
                 damt = damt + $(el).val().replace(/,/g,"")*1; 
              });
              $("#damt").val(numberWithCommas(damt));

              camt = 0;

              $("input[id^='cr']").each(function(index, el) {
                
                 camt = camt + $(el).val().replace(/,/g,"")*1; 
              });
            $("#camt").val(numberWithCommas(camt));
          });


$("#tax"+row).change(function(event) {
      var tax = $("#tax"+row);
      if (tax != '1' ) {
         $("#taxno"+row).prop('readonly', false);
         $("#taxdate"+row).prop('readonly', false);
         $("#taxdes"+row).prop('readonly', false);
         $("#taxtype"+row).prop('readonly', false);
         $("#taxid"+row).prop('readonly', false);
         $("#address"+row).prop('readonly', false);
      }else{
        $("#taxno"+row).prop('readonly', true);
         $("#taxdate"+row).prop('readonly', true);
         $("#taxdes"+row).prop('readonly', true);
         $("#taxtype"+row).prop('readonly', true);
         $("#taxid"+row).prop('readonly', true);
         $("#address"+row).prop('readonly', true);
         $("#taxs"+row).val(tax);
      }
});
$("#tax"+row).change(function(event) {

    $("#tax"+row).prop('readonly', true);

});  

$(".sys"+row).click(function(event) {


    if($("#pro_code"+row).val() == ""){
        swal({
            title: "กรุณาเลือก Project !!.",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
    }else{
      $("#sys_code"+row).val($(this).data('syscode'));        
      $("#sys_name"+row).val($(this).data('sysname'));
      $("#btncost"+row).attr('sys', $(this).data('syscode'));

      get_Budget_by_project( $("#pro_code"+row).val() , $("#sys_code"+row).val() , row);
    }
    //get_Budget_by_project()
});

        $(".books"+row).click(function(event) {
          $("#acc_code"+row).val($(this).data('bookcode'));
          $("#acc_name"+row).val($(this).data('bookname'));
          });

        $(".proj"+row).click(function(event) {
            $("#pro_code"+row).val($(this).data('procode'));
            $("#pro_name"+row).val($(this).data('proname'));
            $("#btncost"+row).attr('control', $(this).data('control'));
            $("#btncost"+row).attr('tender', $(this).data('tender'));
            get_Budget_by_project( $("#pro_code"+row).val() , $("#sys_code"+row).val() , row);

            $("#dep_code"+row).val('');
            $("#dep_name"+row).val('');
          });

        $(".dep"+row).click(function(event) {
          $("#dep_code"+row).val($(this).data('depcode'));
          $("#dep_name"+row).val($(this).data('depname'));
          $("#pro_code"+row).val('');
          $("#pro_name"+row).val('');
          $("#sys_code"+row).val('');
          $("#sys_name"+row).val('');
          });

        $(".ven"+row).click(function(event) {
          $("#ven_code"+row).val($(this).data('vencode'));
          $("#ven_name"+row).val($(this).data('venname'));
          $("#taxid"+row).val($(this).data('ventax'));
          $("#address"+row).val($(this).data('venaddress'));
          $("#taxtype"+row).val($(this).data('ventaxtype'));
          $("#vat"+row).val($(this).data('vat'));
          });

        $(".cus"+row).click(function(event) {
          $("#cus_code"+row).val($(this).data('cuscode'));
          $("#cus_name"+row).val($(this).data('cusname'));
          $("#address"+row).val($(this).data('cusaddress'));
          });
        $(".opencost").click(function(event) {

          // alert("fff");
          $('#cost1'+row).load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
          $( "#cost1"+row ).change(function() {

            var c1 = $('#cost1'+row).val();
            $('#cost2'+row).load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
            $("#tabcost2"+row).show();
            $("#costcodetext"+row).val(c1);
            $('#cost3'+row).html('');
          });
        
          $( "#cost2"+row ).change(function() {
          var c1 = $('#cost1'+row).val();
           var c2 = $('#cost2'+row).val();
          var c3 = $('#cost3'+row).load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c1+'/'+c2);
            $("#costcodetext"+row).val(c1+c2);
          });

          $( "#cost3"+row).change(function() {
          var c1 = $('#cost1'+row).val();
          var c2 = $('#cost2'+row).val();
          var c3 = $('#cost3'+row).val();
           $("#costcodetext"+row).val(c1+c2+c3);
           $("#cost-control"+row).show();
          });
        });

          // load
              va = 0;
              $("input[id^='dr']").each(function(index, el) {
                //$(el).val();
                
                 va = va + $(el).val()*1;
                
              });
            $("#damt").val(va);
        }     
        }else{
           $('.removetf<?php echo $n;?>').remove();
        }

                 calculateSum();
  $(".dr").on("keydown keyup", function() {
  
  calculateSum();
  });
  function calculateSum() {
  var sum = 0;
  //iterate through each textboxes and add the values
  $(".dr").each(function() {
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
  
  $("input#damt").val(numberWithCommas(sum));
  }


  calculateSum1();
  $(".cr").on("keydown keyup", function() {
  
  calculateSum1();
  });
  function calculateSum1() {
  var sum1 = 0;
  //iterate through each textboxes and add the values
  $(".cr").each(function() {
  //add only if the value is number
  if (!isNaN($(this).val().replace(/,/g,"")) && $(this).val().replace(/,/g,"").length != 0) {
  sum1 += parseFloat($(this).val().replace(/,/g,""));
  $(this).css("background-color", "#FEFFB0");
  console.log(sum1);
  //alert(sum)
  }
  // else if (this.value.length != 0){
  //     $(this).css("background-color", "red");
  // }
  });
  
  $("input#camt").val(numberWithCommas(sum1));
  }

      });
</script>
<?php $b++; } ?>

</tbody>
</table>

<script>
  $('.datatable-basicball').DataTable();
</script>
