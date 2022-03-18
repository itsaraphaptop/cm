
<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="../../">
		<meta charset="utf-8" />
		<title>All Module | Keen</title>
		<meta name="description" content="Nav panels examples" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keen.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Theme Styles(used by all pages)-->
        <link href="<?php echo base_url();?>boostrap4/dist/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>boostrap4/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>boostrap4/dist/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>boostrap4/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="<?php echo base_url();?>boostrap4/dist/assets/css/themes/layout/header/base/dark.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>boostrap4/dist/assets/css/themes/layout/header/menu/dark.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>boostrap4/dist/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>boostrap4/dist/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
        <!--begin::Global Theme Bundle(used by all pages)-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="<?php echo base_url();?>boostrap4/dist/assets/css/pages/wizard/wizard-1.css" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<script src="<?php echo base_url();?>boostrap4/dist/assets/plugins/global/plugins.bundle.js"></script>
		<script src="<?php echo base_url();?>boostrap4/dist/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="<?php echo base_url();?>boostrap4/dist/assets/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		
		
		<script src="<?php echo base_url();?>boostrap4/dist/assets/js/pages/features/miscellaneous/sweetalert2.js"></script>
		<script src="<?php echo base_url();?>boostrap4/dist/assets/js/pages/custom/contacts/edit-contact.js"></script>
		<script src="<?php echo base_url();?>assets/js/core/my_function.js"></script>
		<script src="<?php echo base_url();?>dist/Utils.js"></script>
		<script src="<?php echo base_url();?>boostrap4/dist/assets/js/pages/crud/forms/widgets/input-mask.js"></script>
	</head>
	<!--end::Head-->
<?php
	$session_data = $this->session->userdata('sessed_in');
	$username = $session_data['username'];
	$compcode = $session_data['compcode'];
	$this->db->select('comp_img');
	$this->db->where('compcode', $compcode);
	$query = $this->db->get('company');
	$res = $query->result();
	foreach ($res as $value) {
		$img = $value->comp_img;

	}
	$m_id = $session_data['m_id'];
	$this->db->select("*");
	$this->db->where('m_user', $username);

	$query = $this->db->get('menu_right');
	$res = $query->result();
	foreach ($res as $e) {
		$master = $e->m_master;
		$mpm = $e->m_pm;
		$map = $e->m_ap;
		$mic = $e->m_ic;
		$mpo = $e->m_po;
		$mhr = $e->m_hr;
		$mleave = $e->m_leave;
		$mapprove = $e->pettycash_approve;
		$mpr = $e->pr_approve;
	}
	?>

	<?php
	$this->db->select('*');
	$this->db->where('app_midid', $m_id);
	$this->db->where('status', "no");
	$queryfa = $this->db->get('approve_fa');
	$numfa = $queryfa->num_rows();

	$this->db->select('*');
	$this->db->where('app_midid', $m_id);
	$this->db->where('status', "no");
	$query = $this->db->get('approve_fa');
	$faa = $query->result();
	?>


	<?php
	$this->db->select('*');
	$this->db->join('project', 'project.project_id = approve_pr.app_project');
	$this->db->where('app_midid', $m_id);
	$this->db->where('status', "no");
	$query = $this->db->get('approve_pr');
	$pr = $query->result();

	$this->db->select('*');
	$this->db->where('app_midid', $m_id);
	$this->db->where('status', "no");
	$query = $this->db->get('approve_pr');
	$numpr = $query->num_rows();

	$this->db->select('*');
	$this->db->join('project', 'project.project_id = approve_pr.app_project');
	$this->db->where('creatuser', $username);
	$this->db->where('status', "reject");
	$this->db->group_by('app_pr');
	$query = $this->db->get('approve_pr');
	$pr_reject = $query->result();

	$this->db->select('*');
	$this->db->where('creatuser', $username);
	$this->db->where('status', "reject");
	$this->db->group_by('app_pr');
	$query = $this->db->get('approve_pr');
	$numpr_reject = $query->num_rows();
	?>

	<?php
	$this->db->select('*');
	$this->db->join('project', 'project.bd_tenid = approve_td.app_project');
	$this->db->where('app_midid', $m_id);
	$this->db->where('status', "no");
	$query = $this->db->get('approve_td');
	$td = $query->result();

	$this->db->select('*');
	$this->db->where('app_midid', $m_id);
	$this->db->where('status', "no");
	$query = $this->db->get('approve_td');
	$numtd = $query->num_rows();
	?>

	<?php
	$this->db->select('*');
	$this->db->join('project', 'project.project_code = approve_po.app_project');
	$this->db->where('app_midid', $m_id);
	$this->db->where('status', "no");
	$query = $this->db->get('approve_po');
	$po = $query->result();

	$this->db->select('*');
	$this->db->where('app_midid', $m_id);
	$this->db->where('status', "no");
	$query = $this->db->get('approve_po');
	$numpo = $query->num_rows();

	$this->db->select('*');
	$this->db->join('project', 'project.project_code = approve_po.app_project');
	$this->db->where('creatuser', $username);
	$this->db->where('status', "reject");
	$this->db->group_by('app_pr');
	$query = $this->db->get('approve_po');
	$po_reject = $query->result();

	$this->db->select('*');
	$this->db->where('creatuser', $username);
	$this->db->where('status', "reject");
	$this->db->group_by('app_pr');
	$query = $this->db->get('approve_po');
	$numpo_reject = $query->num_rows();
	?>
	<?php
	$this->db->select('*');
	$this->db->join('project', 'project.project_code = approve_wo.app_project');
	$this->db->where('app_midid', $m_id);
	$this->db->where('status', "no");
	$query = $this->db->get('approve_wo');
	$wo = $query->result();

	$this->db->select('*');
	$this->db->where('app_midid', $m_id);
	$this->db->where('status', "no");
	$query = $this->db->get('approve_wo');
	$numwo = $query->num_rows();

	$this->db->select('*');
	$this->db->join('project', 'project.project_code = approve_wo.app_project');
	$this->db->where('creatuser', $username);
	$this->db->where('status', "reject");
	$query = $this->db->get('approve_wo');
	$reject_wo = $query->result();

	$this->db->select('*');
	$this->db->where('creatuser', $username);
	$this->db->where('status', "reject");
	$query = $this->db->get('approve_wo');
	$numwo_reject = $query->num_rows();
	?>
	<?php
	$this->db->select('*');
	$this->db->join('project', 'project.project_code = approve_pc.app_project');
	$this->db->where('app_midid', $m_id);
	$this->db->where('status', "no");
	$query = $this->db->get('approve_pc');
	$pc = $query->result();

	$this->db->select('*');
	$this->db->where('app_midid', $m_id);
	$this->db->where('status', "no");
	$query = $this->db->get('approve_pc');
	$numpc = $query->num_rows();

	$this->db->select('*');
	$this->db->join('project', 'project.project_code = po_receive.project');
	$this->db->where('createuser', $username);
	$this->db->where('ic_read', "no");
	$this->db->where('approve', "approve");
	$query = $this->db->get('po_receive');
	$ic = $query->result();

	$this->db->select('*');
	$this->db->where('createuser', $username);
	$this->db->where('ic_read', "no");
	$this->db->where('approve', "approve");
	$query = $this->db->get('po_receive');
	$numic = $query->num_rows();

	$this->db->select('*');
	$this->db->join('project', 'project.project_id = po_receive.project');
	$this->db->where('createuser', 'thanyaporn');
	$this->db->where('approve', "wait");
	$query = $this->db->get('po_receive');
	$appic = $query->result();

	$this->db->select('*');
	$this->db->where('createuser', 'thanyaporn');
	$this->db->where('approve', "wait");
	$query = $this->db->get('po_receive');
	$appnumic = $query->num_rows();
?>
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed page-loading">
		<!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
			<!--begin::Logo-->
			<a href="<?=base_url();?>panel/office">
				<?php if ($comp_img=="none") { ?>

				<?php }else{?>
					<img src="<?php echo base_url();?>comp/<?= $comp_img;?>" align="middle" style=" height: 30px;position: absolute;left: 5vh;top: 2vh;">
				<?php }?>
			</a>
			<!--end::Logo-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<!--begin::Header Menu Mobile Toggle-->
				<button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
					<span></span>
				</button>
				<!--end::Header Menu Mobile Toggle-->
				<!--begin::Topbar Mobile Toggle-->
				<button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span>
				</button>
				<!--end::Topbar Mobile Toggle-->
			</div>
			<!--end::Toolbar-->
		</div>
		<!--end::Header Mobile-->