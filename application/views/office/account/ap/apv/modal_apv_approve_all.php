<table class="table table-hover table-xxs basic">
  <thead>
    <tr>
      <th>#</th>
      <th width="10%">AP No.</th>
      <th>Due date</th>
      <th>Amount Paid</th>
      <th>Project</th>

      <th>Type</th>
      <th width="10%" class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="tbody_apv">
    <?php $i = 1; foreach ($apv as $value) { 
    ?>
    <tr bank-code="<?=$value->bank_code;?>" branch-code="<?=$value->branch_code;?>">
      <td><?=$i; ?></td>
      <td><?=$value->apv_code;?></td>
      <td><?=$value->apv_duedate;?></td>
      <td align="right"><?=$value->apv_totamt;?></td>
      <td><?=$value->project_name;?></td>
      <td><?=$value->apv_type;?></td>
      <td><button class="vapv<?=$i;?> label label-xs label-primary" data-toggle="modal" data-dismiss="modal" bank-code="<?=$value->bank_code;?>" branch-code="<?=$value->branch_code;?>"  data-code<?=$i;?>="<?=$value->apv_code;?>" data-type<?=$i;?>="<?=$value->apv_type;?>" data-projcode<?=$i;?>="<?=$value->apv_project;?>" data-system<?=$i;?>="<?=$value->apv_system;?>" >Select</button></td>
     <script>
      $(".vapv<?=$i; ?>").click(function() {
        $(this).parent().parent().remove();
        $("#detail").load('<?=base_url(); ?>ap_cheque/ap_ch_detail/<?=$value->apv_code; ?>/<?=$value->apv_type; ?>');
        $("#chkk").val('Y');
        var url="<?=base_url(); ?>ap_active/query_apapprove";
        var dataSet={
              code : $(this).data('code<?=$i;?>'),
              type : $(this).data('type<?=$i;?>')
            };

            $.post(url,dataSet,function(data){
              $("#all").append(data);
            }); 

        var url="<?=base_url(); ?>ap_active/gl_apapprove";
        var dataSet={
              code : $(this).data('code<?=$i;?>'),
              type : $(this).data('type<?=$i;?>')
            };
            $.post(url,dataSet,function(data){
              $("#tablegl").append(data);
            });        
      });


    </script>
    </tr>
    <?php $i++ ; } ?>

    <?php $dd=$i; foreach ($apd as $vd) { 
    ?>
    <tr>
      <td><?=$dd;  ?></td>
      <td><?=$vd->apd_code;  ?></td>
      <td><?=$vd->apd_duedate;  ?></td>
      <td align="right"><?=$vd->apd_net_amt;  ?></td>
      <td><?=$vd->project_name;  ?></td>
      <td><?=$vd->apd_type;  ?></td>
      <td><button class="daps<?=$dd; ?> label label-xs label-primary" data-toggle="modal"   data-dismiss="modal" data-code<?=$dd;?>="<?=$vd->apd_code;?>" data-type<?=$dd;?>="<?=$vd->apd_type;?>" >Select</button></td>
     <script>
      $(".daps<?=$dd; ?>").click(function() { 
        $(this).parent().parent().remove();
        $("#detail").load('<?=base_url(); ?>ap_cheque/ap_ch_detail/<?=$vd->apd_code; ?>/<?=$vd->apd_type; ?>');  

        $("#chkk").val('Y');

            var url="<?=base_url(); ?>ap_active/query_apapprove";
            var dataSet={
              code : $(this).data('code<?=$dd;?>'),
              type : $(this).data('type<?=$dd;?>')
              };
              $.post(url,dataSet,function(data){
                     $("#all").append(data);
              }); 
            var url="<?=base_url(); ?>ap_active/gl_apapprove";
            var dataSet={
              code : $(this).data('code<?=$dd;?>'),
              type : $(this).data('type<?=$dd;?>')
              };
              $.post(url,dataSet,function(data){
                     $("#tablegl").append(data);
              });         

       });
    </script>
    </tr>
    <?php $dd++ ; } ?>

     <?php $ss=$dd; foreach ($aps as $vs) { 
    ?>
    <tr>
      <td><?=$ss;  ?></td>
      <td><?=$vs->aps_code;  ?></td>
      <td><?=$vs->aps_duedate;  ?></td>
      <td align="right"><?=$vs->aps_netamt;  ?></td>
      <td><?=$vs->project_name;  ?></td>
      <td><?=$vs->aps_type;  ?></td>
      <td>
        <button 
          class="vaps<?=$ss; ?> label label-xs label-primary" 
          data-toggle="modal" 
          data-projcode<?=$ss;?>="<?=$vs->aps_project;?>" 
          data-system<?=$ss;?>="<?=$vs->aps_system;?>"
          data-code<?=$ss;?>="<?=$vs->aps_code;?>" 
          data-type<?=$ss;?>="<?=$vs->aps_type;?>" 
          data-dismiss="modal" 
          >
        Select
        </button>
      </td>
     <script>
      $(".vaps<?=$ss; ?>").click(function() { 
        $(this).parent().parent().remove();
        $("#detail").load('<?=base_url(); ?>ap_cheque/ap_ch_detail/<?=$vs->aps_code; ?>/<?=$vs->aps_type; ?>');   

        $("#chkk").val('Y');
            function aps_all() {
              var url="<?=base_url(); ?>ap_active/query_apapprove";
              var dataSet={
                code : "<?=$vs->aps_code; ?>",
                type : "<?=$vs->aps_type; ?>",
                };
                $.post(url,dataSet,function(data){
                      $("#all").append(data);
                });  
            }
            
            function aps_gl() {
              var url="<?=base_url(); ?>ap_active/gl_apapprove";
              var dataSet={
                code : "<?=$vs->aps_code; ?>",
                type : "<?=$vs->aps_type; ?>",
                };
                $.post(url,dataSet,function(data){
                      $("#tablegl").append(data);
                aps_all();       
                }); 
            }
            aps_gl();

       });
    </script>
    </tr>
    <?php $ss++ ; } ?>

    <?php $rr=$ss; foreach ($apr as $vr) { ?>
    <tr>
      <td><?=$rr;  ?></td>
      <td><?=$vr->apr_code;  ?></td>
      <td><?=$vr->apr_duedate;  ?></td>
      <td align="right"><?=$vr->apr_net_amt;  ?></td>
      <td><?=$vr->project_name;  ?></td>
      <td>retention</td>
      <td><button class="vapr<?=$rr; ?> label label-xs label-primary" data-toggle="modal" data-projcode<?=$rr;?>="<?=$vr->apr_project;?>" data-system<?=$rr;?>="<?=$vr->apr_system;?>" data-code<?=$rr;?>="<?=$vr->apr_code;?>" data-type<?=$rr;?>="<?=$vr->apr_type;?>" data-dismiss="modal" >Select</button></td>
     <script>
      $(".vapr<?=$rr; ?>").click(function() { 
        $(this).parent().parent().remove();
        $("#detail").load('<?=base_url(); ?>ap_cheque/ap_ch_detail/<?=$vr->apr_code; ?>/<?=$vr->apr_type; ?>');   

        $("#chkk").val('Y');
          var url="<?=base_url(); ?>ap_active/query_apapprove";
            var dataSet={
              code : $(this).data('code<?=$rr;?>'),
              type : $(this).data('type<?=$rr;?>')
              };
              $.post(url,dataSet,function(data){
                     $("#all").append(data);
              });
          var url="<?=base_url(); ?>ap_active/gl_apapprove";
          var dataSet={
              code : $(this).data('code<?=$rr;?>'),
              type : $(this).data('type<?=$rr;?>')
              };
              $.post(url,dataSet,function(data){
                     $("#tablegl").append(data);
              });          

       });
    </script>
    </tr>
    <?php $rr++ ; } ?>

    <?php $pp=$rr; foreach ($apo as $vp) { 
    ?>
    <tr>
      <td><?=$pp;  ?></td>
      <td><?=$vp->ap_no;  ?></td>
      <td><?=$vp->doc_date;  ?></td>
      <td align="right"><?=$vp->ap_todr;  ?></td>
      <td><?=$vp->project_name;   ?></td>
      <td>petty cash</td>
      <td><button class="vapp<?=$pp; ?> label label-xs label-primary" data-toggle="modal" data-projcode<?=$pp;?>="<?=$vp->ap_project;?>" data-system<?=$pp;?>="<?=$vp->ap_system;?>" data-code<?=$pp;?>="<?=$vp->ap_no;?>" data-type<?=$pp;?>="<?=$vp->ap_type;?>" data-dismiss="modal" >Select</button></td>
     <script>
      $(".vapp<?=$pp; ?>").click(function() {  
        // $("#detail").load('<?=base_url(); ?>ap_cheque/ap_ch_detail/<?=$vp->ap_no; ?>/<?=$vp->ap_type; ?>');   
        $(this).parent().parent().remove();
        $("#chkk").val('Y');
          var url="<?=base_url(); ?>ap_active/query_apapprove";
          // var url="<?=base_url(); ?>ap_active/query_apapprove_coppy";
            var dataSet={
              code : $(this).data('code<?=$pp;?>'),
              type : $(this).data('type<?=$pp;?>')
              };
              $.post(url,dataSet,function(data){
                     $("#all").append(data);
              }); 
            var url="<?=base_url(); ?>ap_active/gl_apapprove";
            var dataSet={
              code : $(this).data('code<?=$pp;?>'),
              type : $(this).data('type<?=$pp;?>')
              };
              $.post(url,dataSet,function(data){
                     $("#tablegl").append(data);
              });       

       });
    </script>
    </tr>
    <?php $pp++ ; } ?>


    <?php $cc=$pp; foreach ($cnv as $cs) { 
    ?>
    <tr>
      <td><?=$cc;  ?></td>
      <td><?=$cs->cnv_code;  ?></td>
      <td><?=$cs->cnv_gldate;  ?></td>
      <td align="right"><?=$cs->cnv_totamt;  ?></td>
      <td><?=$cs->project_name;  ?></td>
      <td>cnv</td>
      <td><button class="cnnv<?=$cc; ?> label label-xs label-primary" data-toggle="modal" data-projcode<?=$cc;?>="<?=$cs->cnv_project;?>" data-code<?=$cc;?>="<?=$cs->cnv_code;?>" data-type<?=$cc;?>="<?="cnv";?>" data-dismiss="modal" >Select</button></td>
     <script>
      $(".cnnv<?=$cc; ?>").click(function() {  
        $(this).parent().parent().remove();
        $("#chkk").val('Y');
            // var url="<?=base_url(); ?>ap_active/update_approve";  
            // var dataSet={
            //   code : $(this).data('code<?=$cc;?>'),
            //   type : $(this).data('type<?=$cc;?>')
            //   };
            //   $.post(url,dataSet,function(data){
            //   });
          var url="<?=base_url(); ?>ap_active/query_apapprove";
            var dataSet={
              code : $(this).data('code<?=$cc;?>'),
              type : $(this).data('type<?=$cc;?>')
              };
              $.post(url,dataSet,function(data){
                     $("#all").append(data);
              }); 
              var url="<?=base_url(); ?>ap_active/gl_apapprove";
            var dataSet={
              code : $(this).data('code<?=$cc;?>'),
              type : $(this).data('type<?=$cc;?>')
              };
              $.post(url,dataSet,function(data){
                $("#tablegl").append(data);
                var bnkid = $("#acc_code").val();
                $(".acid").val(bnkid);
              });         

       });
    </script>
    </tr>
    <?php $cc++ ; } ?>
    <?php $nns=$cc; foreach ($cns as $ns) { 
    ?>
    <tr>
      <td><?=$nns;  ?></td>
      <td><?=$ns->cns_code;  ?></td>
      <td><?=$ns->cns_gldate;  ?></td>
      <td align="right"><?=$ns->cns_amount;  ?></td>
      <td><?=$ns->project_name;  ?></td>
      <td>cns</td>
      <td><button class="cnnv<?=$nns; ?> label label-xs label-primary" data-toggle="modal" data-dismiss="modal" data-projcode<?=$nns;?>="<?=$ns->cns_project;?>" data-code<?=$nns;?>="<?=$ns->cns_code;?>" data-type<?=$nns;?>="<?="cns";?>">Select</button></td>
     <script>
      $(".cnnv<?=$nns; ?>").click(function() {
        $(this).parent().parent().remove();
        $("#chkk").val('Y');
            // var url="<?=base_url(); ?>ap_active/update_approve";  
            // var dataSet={
            //   code : $(this).data('code<?=$nns;?>'),
            //   type : $(this).data('type<?=$nns;?>')
            //   };
            //   $.post(url,dataSet,function(data){
            //   });
          var url="<?=base_url(); ?>ap_active/query_apapprove";
            var dataSet={
              code : $(this).data('code<?=$nns;?>'),
              type : $(this).data('type<?=$nns;?>')
              };
              $.post(url,dataSet,function(data){
                $("#all").append(data);
              });

            
              var url="<?=base_url(); ?>ap_active/gl_apapprove";
            var dataSet={
              code : $(this).data('code<?=$nns;?>'),
              type : $(this).data('type<?=$nns;?>')
              };
              $.post(url,dataSet,function(data){
                $("#tablegl").append(data);
                var bnkid = $("#acc_code").val();
                $(".acid").val(bnkid);
              });

                // alert(bnkid);         

       });
    </script>
    </tr>
    <?php $nns++ ; } ?>

    <?php $nno=$nns; foreach ($cno as $no) { 
    ?>
    <tr>
      <td><?=$nno;  ?></td>
      <td><?=$no->cnoi_ref;  ?></td>
      <td><?=$no->cno_date;  ?></td>
      <td align="right"><?=$no->sum_dis;  ?></td>
      <td></td>
      <td>cno</td>
      <td><button class="cnnv<?=$nno; ?> label label-xs label-primary" data-toggle="modal" data-code<?=$nno;?>="<?=$no->cnoi_ref;?>" data-type<?=$nno;?>="<?="cno";?>" data-dismiss="modal" >Select</button></td>
     <script>
      $(".cnnv<?=$nno; ?>").click(function() {
        $(this).parent().parent().remove();
        $("#chkk").val('Y');
          // var url="<?=base_url(); ?>ap_active/update_approve";  
          // var dataSet={
          //   code : $(this).data('code<?=$nno;?>'),
          //   type : $(this).data('type<?=$nno;?>')
          //   };
          //   $.post(url,dataSet,function(data){
          //   });
          var url="<?=base_url(); ?>ap_active/query_apapprove";
            var dataSet={
              code : $(this).data('code<?=$nno;?>'),
              type : $(this).data('type<?=$nno;?>')
              };
              $.post(url,dataSet,function(data){
                     $("#all").append(data);
              }); 
              var url="<?=base_url(); ?>ap_active/gl_apapprove";
            var dataSet={
              code : $(this).data('code<?=$nno;?>'),
              type : $(this).data('type<?=$nno;?>')
              };
              $.post(url,dataSet,function(data){
                     $("#tablegl").append(data);
                var bnkid = $("#acc_code").val();
                $(".acid").val(bnkid);
              });
       });
    </script>
    </tr>
    <?php $nno++ ; } ?>
  </tbody>
</table>
   <script type="text/javascript" src="<?=base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>

<script type="text/javascript" src="<?=base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '100px',
         targets: [ 2 ]
     }],
     dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
     language: {
         search: '<span>Filter:</span> _INPUT_',
         lengthMenu: '<span>Show:</span> _MENU_',
         paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
     },
     drawCallback: function () {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
     },
     preDrawCallback: function() {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
     }
 });
  $('.basic').DataTable();
</script>
