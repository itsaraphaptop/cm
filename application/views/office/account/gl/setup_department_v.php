
<!-- /theme JS files -->

<div class="panel panel-flat">
  <div class="panel-heading">

    <h5 class="panel-title">Pagination types <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary">Insert <i class="icon-play3 position-right"></i></button></h5>
    <div class="heading-elements">
      <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
              </ul>
            </div>
  </div>

  <div class="panel-body">

  </div>

  <table class="table datatable-basic">
    <thead>

      <tr>
        <th>#</th>
        <th>CODE</th>
        <th>DEPARTMENT</th>
        <th>Type</th>
        <th>Appv. PR By</th>
        <th>A/C IC Control</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($getdep as $dep): ?>


      <tr>
        <td><?php echo $dep->id_dep; ?></td>
        <td><?php echo $dep->dep_code; ?></td>
        <td><?php echo $dep->dep_name; ?></td>
        <td><?php echo $dep->dep_type; ?></td>
        <td><?php echo $dep->appby ;?></td>
        <td><?php echo $dep->ac_ic_control; ?></td>
        <td class="text-center">
          <button type="button" id="edit<?php echo $dep->id_dep; ?>" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $dep->id_dep; ?>">Edit </button>
          <a type="button" id="delete<?php echo $dep->id_dep; ?>" 
          href="<?php echo base_url(); ?>gl_dep/delete/<?php echo $dep->id_dep ?>""  class="btn btn-danger btn-sm" >Delete </a></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>


<!-- /pagination types -->
<!-- Primary modal -->

<div id="modal_theme_primary" class="modal fade">
  <form  action="<?php echo base_url();?>gl_dep/InsertDep" method="post">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header bg-primary">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h6 class="modal-title">Primary header</h6>
</div>

<div class="modal-body">
  <label for="">CODE</label>
  <input class="form-control" type="text" name="dep_code" value="">
  <label for="">DEPARTMENT NAME</label>
  <input class="form-control" type="text" name="dep_name" value="">
  <label for="">TYPE</label>
  <select class="form-control"  name="dep_type">
    <option value="Operation">Operation</option>
  </select>
  <!-- <input class="form-control" type="text" name="dep_type" value=""> -->
</div>

<div class="modal-footer">
  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary">Save</button>
  </form>
</div>
</div>
</div>
</div>
<!-- /primary modal -->
<!-- Danger modal -->
<?php foreach ($getdep as $editdep): ?>
<form action="<?php echo base_url();?>gl_dep/updet/<?php echo $editdep->id_dep ?>" method="post">
<div id="modal_edit<?php echo $editdep->id_dep ?>" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header bg-danger">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h6 class="modal-title">Edit</h6>
</div>

<div class="modal-body">
 <label for="">CODE</label>
<input class="form-control" type="text" name="e_code" value="<?php echo $editdep->dep_code ?>">
<label for="">DEPARTMENT NAME</label>
<input class="form-control" type="text" name="e_name" value="<?php echo $editdep->dep_name ?>">
 <label for="">TYPE</label>
<select class="form-control" name="e_type">
  <option value="<?php echo $editdep->dep_type ?>"><?php echo $editdep->dep_type ?></option>
  <option value="Operation">Operation</option>
</select>
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
<!-- /default modal -->
