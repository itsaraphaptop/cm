<table class="table table-xxs table-hover" id="tbpro">
      <thead>
        <tr>
          <th>No.</th>
          <th>Project Code</th>
          <th>Project Name</th>
          <th width="5%">Active</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php foreach ($getproj as $valj){ ?>
        <tr>
         <th scope="row"><?php echo $n;?></th>
         <td><?php echo $valj->project_code; ?></td>
          <td><?php echo $valj->project_name; ?></td>
            <td><button class="openproj<?php echo $n;?> btn btn-xs btn-block btn-primary" 
            data-toggle="modal" 
            data-projectcode<?php echo $n;?>="<?php echo $valj->project_code ?>"  
            data-projid<?php echo $n;?>="<?php echo $valj->project_id;?>" 
            data-projname<?php echo $n;?>="<?php echo $valj->project_name;?>" 
            data-bnameth<?php echo $n;?>="<?php echo $valj->project_bnameth;?>" 
            data-vat<?php echo $n;?>="<?php echo $valj->project_vat;?>" 
            data-wt<?php echo $n;?>="<?php echo $valj->project_wt;?>"
            data-cname<?php echo $n;?>="<?php echo $valj->project_cname;?>" 
            data-vat<?=$n;?>="<?php echo $valj->project_vat;?>" 
            data-avance<?php echo $n;?>="<?php echo $valj->project_advance_1;?>" 
            data-retention<?php echo $n;?>="<?php echo $valj->project_lessretention;?>" 
            data-projectwt<?php echo $n;?>="<?php echo $valj->project_wt;?>"
            data-projectstatus<?php echo $n;?>="<?php echo $valj->project_department;?>"
            data-dismiss="modal">SELECT</button></td>
        </tr>

        <script>
            
          $(".openproj<?php echo $n;?>").click(function(){
            $('#status_pd').val($(this).data('projectstatus<?php echo $n;?>'));

            $('#pjn<?php echo $id; ?>').val($(this).data('projectcode<?php echo $n;?>'));
            $('#avance').val($(this).attr('data-avance<?=$n;?>'));
            $('#retention').val($(this).attr('data-retention<?=$n;?>'));
            $('#vat').val($(this).attr('data-vat<?=$n;?>'));
            $('#wt').val($(this).attr('data-projectwt<?=$n;?>'));
            $("#putprojectid").val($(this).data('projid<?php echo $n;?>'));
            $('#projectname').val($(this).data('projname<?php echo $n;?>'));
            $("#project_code").val($(this).data('projid<?php echo $n;?>'));
            // $("#projectid").val($(this).data('projid<?php echo $n;?>'));

            $('#projectname').val($(this).data('projname<?php echo $n;?>'));
            $('#pre_event').val($(this).data('projid<?php echo $n;?>'));
            $('#pre_eventname').val($(this).data('projname<?php echo $n;?>'));
            $('#vatper').val($(this).data('vat<?php echo $n;?>'));
            $('#wh').val($(this).data('wt<?php echo $n;?>'));
            
            $("#projectcode").val($(this).data('project_code<?php echo $n;?>'));
            $("#projectname").val($(this).data('project_name<?php echo $n;?>'));

            $('#projectname').val($(this).data('projname<?php echo $n;?>'));
            $('#ownername').val($(this).data('cname<?php echo $n;?>'));
            $('#contactor').val($(this).data('bnameth<?php echo $n;?>'));
     
              
            $("#namedp<?php echo $id; ?>").val($(this).data('projname<?php echo $n;?>'));
            $("#pj<?php echo $id; ?>").val($(this).data('projid<?php echo $n;?>'));



            $("#projname").val($(this).data('projname<?php echo $n;?>'));
            $("#projid").val($(this).data('projid<?php echo $n;?>'));
            $("#owner").val("<?php echo $valj->project_mnameth; ?>");
            $("#venderid").val("<?php echo $valj->project_mcode; ?>");
            $("#poamt").val("<?php echo $valj->project_value; ?>");

            $("#projectname").val($(this).data('projname<?php echo $n;?>'));
            $("#projectid").val($(this).data('projid<?php echo $n;?>'));
            $("#projectcode").val($(this).data('projectcode<?php echo $n;?>'));
            $('#pre_event<?php echo $id;?>').val($(this).data('projid<?php echo $n;?>'));
            $('#pre_eventname<?php echo $id;?>').val($(this).data('projname<?php echo $n;?>'));

            $("#depid").val("");
            $('#depname').val("");
            $("#departmenttname").val("");
            $("#departmenttid").val("");
            $("#dpname").val("");
            $("#dpid").val("");
            $("#departname").val("");
            $("#departid").val("");

            $("#project_id").val($(this).data('project_id'));
            $("#nameproject").val($(this).data('project_name'));

            $("#jobsystem").load('<?php echo base_url(); ?>share/insert_system/'+"<?php echo $valj->project_code;?>");


            $("#projectidd").val($(this).data('projid<?php echo $n;?>'));
            $('#projectnamee').val($(this).data('projname<?php echo $n;?>'));
            $("#fa_location").val("1");

             $("#bd_conno").val($(this).data('projid<?php echo $n;?>'));
            $('#bd_conname').val($(this).data('projname<?php echo $n;?>'));

            $("#site_no").val($(this).data('projectcode<?php echo $n;?>'));
            $('#pjname').val($(this).data('projname<?php echo $n;?>'));

            $("#content_tbjob").load('<?php echo base_url(); ?>management_active/content_tbjob/'+"<?php echo $valj->project_code;?>");
            $("#content_tbboq").load('<?php echo base_url(); ?>management_active/content_tbboq/'+"<?php echo $valj->project_code;?>");
            $('#projectidd<?php echo $id;?>').val($(this).data('projid<?php echo $n;?>'));
            $('#pjdpt_title<?php echo $id;?>').val($(this).data('projname<?php echo $n;?>'));
            $('#dpt_code<?php echo $id;?>').val($(this).data(''));

            $('#name_pj').val($(this).data('projname<?php echo $n;?>'));
            project_id = $(this).data('projectcode<?php echo $n;?>');
              
            var url="<?php echo base_url(); ?>pr_active/query_job";
                var dataSet={
                  procode : $(this).data('projectcode<?php echo $n;?>')
                  };
              $.post(url,dataSet,function(data){
                
                 $("#system").html(data);
              });
              
              $("#cus_id").val("<?php echo $valj->project_mcode; ?>");
              $("#cus_name").val("<?php echo $valj->project_mnameth; ?>");
            
          });
        </script>

          <?php $n++; } ?>
      </tbody>
    </table>
    <!-- Core JS files -->
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script> -->
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script> -->

    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script> -->

    <!-- /core JS files -->
    <script>
    $.extend( $.fn.dataTable.defaults, {
         autoWidth: false,
         columnDefs: [{
             orderable: false,
             width: '100px',
             targets: [ 3 ]
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
      $('#tbpro').DataTable();
    </script>
