
<!-- Main content  trans-->
			<div class="content-wrapper">
        <div class="content">
        <!-- <div class="panel panel-flat">
          <div class="panel-heading"> -->
            <!-- <div class="col-xs-3"> -->
              <!-- <label class="display-block text-semibold"><h1>กรุณาเลือก</h1></label>
              <div class="checkbox checkbox-switch">
                <label hidden>
                  <input type="checkbox" data-on-color="primary" data-off-color="danger" data-on-text="Project" data-off-text="Department" id="switch" class="switch" checked="checked">
                </label>
              </div> -->
              <script type="text/javascript">
                  $('#switch').on('switchChange.bootstrapSwitch', function (event, state) {
                    // alert(5555);
                      var _project = $(this).attr('data-on-text');
                      // alert(_project);
                      var _department = $(this).attr('data-off-text');
                      // alert(_project+" "+_department);
                      // alert($("#switch").is(':checked'));
                      if($("#switch").is(':checked')) {
                        //Page Project
                        // alert("Get Page Project");
                        $.get('<?php echo base_url(); ?>bd/get_page_project', function(data) {
                          /*optional stuff to do after success */
                        }).done(function(data) {
                          // console.log(data);
                          $("#tender_content").html(data);
                        });
                      } else {
                        //Page Department
                        // alert("Get Page Department");
                        $.get('<?php echo base_url(); ?>bd/get_page_department', function(data) {
                          /*optional stuff to do after success */
                        }).done(function(data) {
                          // console.log(data);
                          $("#tender_content").html(data);
                        });
                      }
                  });
              </script>
            <!-- </div> -->
          <!-- </div> -->
        <!-- </div> -->
        <!-- <div class="content"> -->
        <div id="tender_content">
          
        </div>
        <script type="text/javascript">
          $.get('<?php echo base_url(); ?>bd/get_page_project', function() {
          }).done(function(data) {
            $("#tender_content").html(data);
          });
        </script>
        <!-- </div> -->
        <!-- <div class="content"> -->
        <script type="text/javascript">
          
        </script>

<script type="text/javascript">
  $('#boq').attr('class', 'active');
  $('#setup_bill').attr('style', 'background-color:#dedbd8');
</script>