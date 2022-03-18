<?php foreach ($res as $key => $val2) {
	$pr_prno  			= $val2->pr_prno;
	$pr_prdate  		= $val2->pr_prdate;
	$pr_reqname  		= $val2->pr_reqname;
	$project_name  		= $val2->project_name;
	$department_title  	= $val2->department_title;
	$pr_deliplace  		= $val2->pr_deliplace;
	$pr_delidate  		= $val2->pr_delidate;
	$pr_remark  		= $val2->pr_remark;
} ?>
<div class="panel panel-primary">
  <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> รายารใบขอซื้อทั้งหมด</span></div>
				<div class="row">
		      		<div class="col-md-6">
		          		<label for="">เลขที่ใบขอซื้อ</label>
		          		<p><?php echo $pr_prno;?></p>
		      		 </div>
		      		<div class="col-md-6">
		      			<label for="">วันที่ขอซื้อ</label>
		                 <p><?php echo $pr_prdate; ?></p>
		      		</div>
		        </div>
             <div class="row">
               <div class="col-md-6">
                    <label for="">ผู้ขอซื้อ</label>
                    <p><?php echo $pr_reqname;?></p>
               </div>
               <div class="col-md-6">
                 <label for="">โครงการ/แผนก</label>
                 <p><?php echo $project_name;?><?php echo $department_title; ?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6">
                 <label for="">สถานที่ส่งของ</label>
                  <p><?php echo $pr_deliplace;?></p>
               </div>
               <div class="col-md-6">
                    <label for="">วันที่ส่งของ</label>
                    <p><?php echo $pr_delidate; ?></p>
               </div>
             </div>
              <div class="row">
               <div class="col-md-12">
                 <label for="">รายละเอียด</label>
                  <p><?php echo $pr_remark;?></p>
               </div>
             </div>

</div>