 
<!-- Main content  trans-->
			<div class="content-wrapper">

		

				<!-- Content area -->
				<div class="content">
          <!-- Highlighting rows and columns -->


					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Select Project Budget</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
              <table class="table table-hover table-bordered table-xxs">
                <thead>
                  <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Tender No :</th>
                    <th class="text-center">Project Name</th>
            

                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
         
<?php $getproj = $this->db->query("select * from project")->result(); ?>

                  <?php $n=1; foreach ($getproj as $key => $value) {?>
                
                  
                  <tr>
                  	<td class="text-center"><?php echo $n; ?></td>
                    <td><?php echo $value->project_code; ?></td>
                    <td><?php echo $value->project_name; ?></td>
                    
                    <td class="text-center">


                    <a href="<?php echo base_url(); ?>management/approve_pbg/<?php echo $value->project_code; ?>/<?=$value->project_id?>" class="label label-primary"><i class="icon-folder-open"></i> Select</a>
                    </td>
                  </tr>
                 
                  <?php $n++; } ?>
                </tbody>
              </table>
            </div>
          </div>
					<!-- Highlighting rows and columns -->
					<!-- /highlighting rows and columns -->
				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->
<script type="text/javascript">
$('#tra').attr('class', 'active');
$('#tra_sub4').attr('style', 'background-color:#dedbd8');
</script>