<div class="page-header page-header-transparent">
	<div class="page-header-content">
		<div class="page-title">
			<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"></span>Report</h4>
		</div>
		
		<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
	</div>
	<div class="breadcrumb-line breadcrumb-line-component">
		<ul class="breadcrumb">
			<li><a class="preload" href="<?php echo base_url(); ?>office/openblank"><i class="icon-home2 position-left"></i> Home</a></li>
			<li class="active">Company-Material List</li>
		</ul>
		<ul class="breadcrumb-elements">
			<li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-gear position-left"></i>
					Settings
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu dropdown-menu-right">
					<li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
					<li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
					<li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
					<li class="divider"></li>
					<li><a href="#"><i class="icon-gear"></i> All settings</a></li>
				</ul>
			</li>
		</ul>
		<a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
	</div>
</div>
<div class="content">
<div class="panel panel-flat">
	<div class="modal-header">
		<h6 class="panel-title"><i class="icon-cog3 position-left"></i> Company-Material List<p></p></h6>
	</div>
	<form action="po_matcom_r" method="get">
	<div class="panel-body">
            <div class="row">
                <div class="col-sm-12">  
                    <label class="control-label col-sm-5" style="text-align: right;">Type Material:</label>
                    <div class="form-group col-sm-2">
                    <select name="typematcom" class="form-control input-sm">
                    <?php foreach ($selecttype as $com): ?>
                    	<option value="<?= $com->mattype_code; ?>"><?= $com->mattype_code." "."(".$com->mattype_name.")";  ?></option>
                    	<?php endforeach ?>
                    </select>
                    </div>
                </div> 

            </div>
	</div>
	<div class="modal-footer" style="text-align: right;">
		<div class="col-sm-7"></div>
		<button type="submit" class="btn btn-success">Search</button>
		<button type="reset" class="btn btn-danger">Reset</button>
	</div>
	</form>
</div>
</div>
<div class="modal fade" id="openproj" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Project</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="xxxx">

            </div>
            </div>
        </div>
    </div>
  </div>
</div>
<script>
    $(".openproj").click(function(){
    $('#xxxx').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#xxxx").load('<?php echo base_url(); ?>index.php/share/project');
    });

   
    </script>