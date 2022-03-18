

            <div class="panel panel-flat">
            <div class="panel-heading">
            <div class="panel-body">
              <form class="" action="ap_active/retrieve_apy" method="post">


                <button type="button" name="button" id="ret">Retrieve</button>
              <table class="table table-bordered">
  							<thead>
  								<tr>
  									<th class="text-center"><b>Condition</b></th>
  									<th class="text-center"><b>Operation</b></th>
  									<th class="text-center"><b>Value</b></th>
  								</tr>
  							</thead>
  							<tbody>
  								<tr>
  									<td class="text-center">GL Year</td>
  									<td class="text-center">=</td>
  									<td class="text-center"><input type="text" class="form-control" name="yeargl" id="ye" value=""></td>
  								</tr>
                  <tr>
                    <td class="text-center">GL Period</td>
                    <td class="text-center">=</td>
                    <td class="text-center"><input type="text" class="form-control" name="periodgl" id="pe" value=""></td>
                  </tr>
                  <tr>
                    <td class="text-center">Data type</td>
                    <td class="text-center">=</td>
                    <td class="text-center"><input type="text" class="form-control" name="" value=""></td>
                  </tr>
              </tbody>
            </table>


            </div>
            </div>

            </div>

            </form>

            <div id="glspost_v">
            </div>​
            <script>
            $('#ret').click(function() {

              var ye = $('#ye').val();
              var pe = $('#pe').val();
              //  alert(ye);
              // alert(pe);
            $('#glspost_v').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
            $("#glspost_v").load('<?php echo base_url(); ?>ap/gl_trantb/'+ye+'/'+pe);
            // $("#glspost_v").load('<?php echo base_url(); ?>ap/gl_trantb');
            // $('#glspost_v').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
            // $("#glspost_v").load('<?php echo base_url(); ?>ap/ptgls_table/'+yearsel+'/'+glperiod);
                })
            </script>
