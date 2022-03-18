<div class="page-header">
          <div class="page-header-content">
            <div class="page-title">
              <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
            </div>

            <!-- <div class="heading-elements">
              <div class="heading-btn-group">
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-isimary"></i><span>Statistics</span></a>
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-isimary"></i> <span>Invoices</span></a>
                <a href="http://demo2.cloudmeka.com/index.php/manag/calenda" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-isimary"></i> <span>Schedule</span></a>
              </div>
            </div> -->
          </div>

          <div class="breadcrumb-line">
            <ul class="breadcrumb">
              <li><a href="http://demo2.cloudmeka.com/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
              <li><a href="http://demo2.cloudmeka.com/inventory/receive_transfer_store">Receive Transfer Material</a></li>
          </ul></div>
        </div>
<!-- /theme JS files -->
<div class="container-fluid">
<div class="panel panel-flat">
  <div class="panel-heading">

      
    <div class="heading-elements">
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary">Insert <i class="icon-play3 position-right"></i></button>
            </div>
  </div>

  <div class="panel-body">

  </div>

  <table class="table table-bordered table-hover table-xxs">
    <thead>

      <tr>
        <!-- <th>#</th> -->
        <th>CODE</th>
        <th>BOOK ACCOUNT</th>
        <th>Type</th>
        <th>Active</th>
        <th class="text-center"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($getbook as $newbook): ?>
      <tr>
        <td><?php echo $newbook->bookcode; ?></td>
        <td><?php echo $newbook->booknamz; ?></td>
        <td><?php echo $newbook->gl_type; ?></td>
        <td><?php echo $newbook->active; ?></td>

        <td class="text-center"><button type="button" id="edit<?php echo $newbook->bookcode; ?>" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $newbook->bookcode; ?>">Edit </button></td>


      </tr>
<?php endforeach; ?>
    </tbody>
  </table>
</div>
</div>


<!-- /pagination types -->
<!-- Primary modal -->

<div id="modal_theme_primary" class="modal fade">
  <form  action="<?php echo base_url();?>gl_dep/InsertBookACC" method="post">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header bg-primary">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h6 class="modal-title">NEW BOOK ACCOUNT</h6>
</div>

<div class="modal-body">
  <label for="">Code</label>
  <input class="form-control" type="text" name="e_code" value="">
  <label for="">BOOK ACCOUNT</label>
  <input class="form-control" type="text" name="e_name" value="">
  <label for="">TYPE</label>
  <input type="text" class="form-control" name="e_type">
<input type="hidden" name="addby" value="<?php echo $name; ?>">
<input type="hidden" name="adddate" value="<?php echo date("Y/m/d") ?>">
<input type="hidden" name="addtime" value="<?php echo date("h:i:s") ?>">
</div>

<div class="modal-footer">
  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary">Save</button>
  </form>
</div>
</div>
</div>
</div>
<?php foreach ($getbook as $editbook): ?>


<form  action="<?php echo base_url();?>gl_dep/EditBookACC/<?php echo $editbook->bookcode; ?>" method="post">
<div id="modal_edit<?php echo $editbook->bookcode; ?>" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header bg-danger">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h6 class="modal-title">Edit</h6>
</div>

<div class="modal-body">
 <label for="">CODE</label>
<input class="form-control" type="text" name="e_code" value="<?php echo $editbook->bookcode; ?>">
<label for="">BOOK ACCOUNT</label>
<input class="form-control" type="text" name="e_name" value="<?php echo $editbook->booknamz; ?>">
 <label for="">TYPE</label>
<input type="text" class="form-control" name="e_type" value="<?php echo $editbook->gl_type; ?>">
<input type="hidden" name="e_editby" value="<?php echo $name ?>">
<input type="hidden" name="editdate" value="<?php echo date("Y/m/d") ?>">
<input type="hidden" name="edittime" value="<?php echo date("h:i:s") ?>">
<input type="hidden" name="id_book" value="<?php echo $editbook->bookcode; ?>">
</div>

<div class="modal-footer">
  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-danger">Save</button>

</div>
</div>
</div>
</div>
</form>
<?php endforeach; ?>
