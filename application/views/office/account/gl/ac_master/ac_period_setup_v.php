
<div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header">
          <div class="page-header-content">
            <div class="page-title">
              <h4><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">Home</span> - Account Period Setup</h4>
              <div class="heading-elements">
              <div class="heading-btn-group">
               
              </div>
            </div>
            </div>
          </div>

          <div class="breadcrumb-line">
            <ul class="breadcrumb">
              <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ul>
                
          </div>
        </div>


<div class="content">

          <!-- Form horizontal -->
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">Account Period</h5>
              <div class="heading-elements">
                <ul class="icons-list">
                          <li><a data-action="collapse"></a></li>
                          <li><a data-action="reload"></a></li>
                          <li><a data-action="close"></a></li>
                        </ul>
                      </div>
            </div>

            <div class="panel-body">

            <div class="table-responsive">
              <table class="table datatable-basic table-xxs table-bordered">
                <thead>
                  <tr>
     
                    <th class="text-center col-lg-1">#</th>
                    <th class="text-center col-lg-2">Year</th>
                    <th class="text-center col-lg-2">Period</th>
                    <th class="text-center col-lg-2">Start Date</th>
                    <th class="text-center col-lg-2">End Date</th>
                    <th class="text-center col-lg-1">Status</th>
                    <th class="text-center col-lg-1">Action</th>
                  </tr>
                </thead>
<tbody id="body">
   <?php $i=1; foreach ( $output as $key ){  ?>
                  <tr>             
                    <td class="text-center"><?php echo $i; ?></td>
                    <td class="text-center"><input type="text" class="form-control input-sm" name="[]" value="<?php echo $key->glyear;?>"></td>
                    <td class="text-center"><input type="text" class="form-control input-sm" name="[]" value="<?php echo $key->glperiod;?>"></td>
                    <td class="text-center"> <input type="text" class="form-control daterange-single" name="[]" value="<?php echo $key->begdate;?>"></td>
                    <td class="text-center"><input type="text" class="form-control daterange-single" name="[]" value="<?php echo $key->enddate;?>"></td>
                    <td class="text-center">
                      <select name="select" class="form-control">
                                          <option value="opt1">

<?php
$favcolor = "$key->active";
switch ($favcolor) {
    case "Y":
        echo "OPEN";
        break;
    case "N":
        echo "CLOSE";
        break;
}
?>
                                          </option>
                                          <option value="Y">OPEN</option>
                                          <option value="N">CLOSE</option>
                                      </select>
                    <td class="text-center">
                                      <ul class="icons-list">
                                        <li><a id="remove" data-popup="tooltip" title="Remove"><i class="icon-trash"></i></a></li>
                                      </ul>
                  </tr>
                                 
                                  <?php $i++; } ?>
                                </tbody>
                              </table>
                            </div>
                            <br>
                              <div class="text-right">
                        <a href="" class="preload btn btn-default"><i class="icon-plus22"></i> New</a>
                        <a  class="btn btn-danger daterange-ranges" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_theme_danger">Automatic Value</a>
                         <a id="inst" class="btn btn-default"><i class="icon-list-numbered"></i> ADD Rows</a>
                          <button type="submit" class="preload btn btn-success" id="sweet_success"><i class="icon-box-add"></i> Save </button>
                          <a href="" class="btn btn-default"><i class="icon-close2 position-left"></i> Close</a>
                        </div>
                        </div>
        
                       

                      </div>
                    </div>
                  </form>
          </div>
<div id="modal_theme_danger" class="modal fade">
            <div class="modal-dialog modal-xs">
              <div class="modal-content">
                <div class="modal-header bg-danger">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h6 class="modal-title">Automatic Value</h6>
                </div>

                <div class="modal-body">
                  <h6 class="text-semibold">
                  <div class="form-group">
                  <label>Year :</label>
                    <input type="text" class="form-control input-sm" name="[]" >
                  </div>
              
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-danger">Insert</button>
                </div>
              </div>
            </div>
          </div>
          <script>
            $("#inst").click(function(){
              addrow();
            });
            function addrow()
            {
              var row = ($('#body tr').length-0)+1;
                var tr = '<tr>'+
                  '<td  class="text-center">'+row+'</td>'+
                '<td><input type="text" class="form-control input-sm" name="[]" id="'+row+'"></td>'+
                  '<td><input type="text" class="form-control input-sm" name="[]" id="'+row+'"></td>'+
                  '<td><input type="date" class="form-control input-sm" name="[]" id="'+row+'"></td>'+
                  '<td><input type="date" class="form-control input-sm" name="[]" id="'+row+'"></td>'+
                  '<td><select name="select" class="form-control"><option value="Y">OPEN</option><option value="N">CLOSE</option></select></td>'+
                  '<td class="text-center">'+
                    '<ul class="icons-list">'+
                      '<li><a id="remove'+row+'" data-popup="tooltip" title="Remove"><i class="icon-trash"></i></a></li>'+
                    '</ul>'+
                  '</td>'+
                '</tr>';
                $('#body').append(tr);
            }

            </script>