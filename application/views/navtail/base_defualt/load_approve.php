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
<div class="dropdown-menu dropdown-content width-350">
    <ul class="media-list dropdown-content-body">
        <?php foreach ($td as $ktd) {?>
            <li>
                <div class="media-body">
                    <a target="_blank" href="<?php echo base_url(); ?>bd/approve_billof/TD-2009001/2<?php echo $ktd->bd_tenid; ?>/<?php echo $ktd->project_id; ?>"
                        class="media-heading">

                        <img src="<?php echo base_url(); ?>assets/images/BOQ.jpg" class="img-circle img-sm"
                            alt="">
                        <span class="text-semibold">BOQ Approve :
                            <?php echo $ktd->project_name; ?>
                            <b style="color: green;">Approve Click !</b>
                        </span>

                    </a>

                    <span class="text-muted">เลขที่ใบ PR :
                        <a target="_blank" href="<?php echo base_url(); ?>index.php/pr/editpr/<?php echo $ktd->app_pr; ?>">
                            <?php echo $ktd->app_pr; ?>
                        </a>
                    </span>
                    <span class="media-annotation pull-right">
                        <?php echo date("d/m/Y",strtotime($ktd->creatudate)); ?>
                    </span>
                    <hr>
                </div>
            </li>
        <?php }?>
        <?php foreach ($pr as $kpr) {?>
            <li class="media">
                <div class="media-body">
                    <a target="_blank" href="<?php echo base_url(); ?>index.php/pr/pr_approve/<?php echo $kpr->project_code; ?>/<?php echo $kpr->project_id; ?>"
                        class="media-heading">

                        <img src="<?php echo base_url(); ?>assets/images/PR.jpg" class="img-circle img-sm"
                            alt="">
                        <span class="text-semibold">Purchase Requisition System (PR) Project :
                            <?php echo $kpr->project_name; ?>
                            <b style="color: red;">Approve Click !</b>
                        </span>

                    </a>

                    <span class="text-muted">เลขที่ใบ PR :
                        <a target="_blank" href="<?php echo base_url(); ?>index.php/pr/editpr/<?php echo $kpr->app_pr; ?>">
                            <?php echo $kpr->app_pr; ?>
                        </a>
                    </span>
                    <span class="media-annotation pull-right">
                        <?php echo date("d/m/Y",strtotime($kpr->creatudate)); ?>
                    </span>
                    <hr>
                </div>
            </li>
        <?php }?>
        <?php foreach ($pr_reject as $kpr) {?>
            <li>
                <div class="media-body">
                    <a target="_blank" href="<?php echo base_url(); ?>pr/editpr/<?php echo $kpr->app_pr; ?>"
                        class="media-heading">

                        <img src="<?php echo base_url(); ?>assets/images/PR.jpg" class="img-circle img-sm"
                            alt="">
                        <span class="text-semibold">Purchase Requisition System (PR) Project :
                            <?php echo $kpr->project_name; ?>
                            <b class="text-warning">Reject Click !</b>
                        </span>

                    </a>

                    <span class="text-muted">เลขที่ใบ PR :
                        <a target="_blank" href="<?php echo base_url(); ?>pr/editpr/<?php echo $kpr->app_pr; ?>">
                            <?php echo $kpr->app_pr; ?>
                        </a>
                    </span>
                    <span class="media-annotation pull-right">
                        <?php echo date("d/m/Y",strtotime($kpr->creatudate)); ?>
                    </span>
                    <hr>
                </div>
            </li>
        <?php }?>
        <?php foreach ($po as $kpo) {?>
            <li class="media">
                <div class="media-body">
                    <a target="_blank" href="<?php echo base_url(); ?>index.php/purchase/purchase_approve/<?php echo $kpo->project_id; ?>/p/<?php echo $kpo->project_code; ?>"
                        class="media-heading">
                        <img src="<?php echo base_url(); ?>assets/images/PO.jpg" class="img-circle img-sm"
                            alt="">
                        <span class="text-semibold">Purchase Order System (PO) Project :
                            <?php echo $kpo->project_name; ?>
                            <b style="color: red;">Approve Click !</b>
                        </span>

                    </a>

                    <span class="text-muted">เลขที่ใบ PO :
                        <a target="_blank" href="<?php echo base_url(); ?>index.php/purchase/editpo/<?php echo $kpo->app_pr; ?>">
                            <?php echo $kpo->app_pr; ?>
                        </a>
                    </span>
                    <span class="media-annotation pull-right">
                        <?php echo date("d/m/Y",strtotime($kpo->creatudate)); ?>
                    </span>
                    <hr>
                </div>
            </li>
        <?php }?>
        <?php foreach ($po_reject as $kpo) {?>
            <li>
                <div class="media-body">
                    <a target="_blank" href="<?php echo base_url(); ?>index.php/purchase/editpo/<?php echo $kpo->app_pr; ?>"
                        class="media-heading">
                        <img src="<?php echo base_url(); ?>assets/images/PO.jpg" class="img-circle img-sm"
                            alt="">
                        <span class="text-semibold">Purchase Order System (PO) Project :
                            <?php echo $kpo->project_name; ?>
                            <b class="text-warning">Reject PO !</b>
                        </span>

                    </a>

                    <span class="text-muted">เลขที่ใบ PO :
                        <a target="_blank" href="<?php echo base_url(); ?>index.php/purchase/editpo/<?php echo $kpo->app_pr; ?>">
                            <?php echo $kpo->app_pr; ?>
                        </a>
                    </span>
                    <span class="media-annotation pull-right">
                        <?php echo date("d/m/Y",strtotime($kpo->creatudate)); ?>
                    </span>
                    <hr>
                </div>
            </li>
        <?php }?>
        <?php foreach ($wo as $kwo) {?>
            <li class="media">
                <div class="media-body">
                    <a target="_blank" href="<?php echo base_url(); ?>index.php/contract/newapprovecontract_p/<?php echo $kwo->project_id; ?>/p/<?php echo $kwo->project_code; ?>"
                        class="media-heading">
                        <img src="<?php echo base_url(); ?>assets/images/WO.jpg" class="img-circle img-sm"
                            alt="">
                        <span class="text-semibold">Work Order (WO) Project :
                            <?php echo $kwo->project_name; ?>
                            <b style="color: red;">Approve Click !</b>
                        </span>

                    </a>

                    <span class="text-muted">เลขที่ใบ WO :
                        <a target="_blank" href="<?php echo base_url(); ?>index.php/contract/editnewworkorder/<?php echo $kwo->app_pr; ?>/<?php echo $kwo->project_id; ?>/p">
                            <?php echo $kwo->app_pr; ?>
                        </a>
                    </span>
                    <span class="media-annotation pull-right">
                        <?php echo date("d/m/Y",strtotime($kwo->creatudate)); ?>
                    </span>
                    <hr>
                </div>
            </li>
        <?php }?>
        <?php foreach ($pc as $kpc) {?>
            <li class="media">
                <div class="media-body">

                    <a target="_blank" href="<?php echo base_url(); ?>index.php/petty_cash/approve_pc_v/<?php echo $kpc->project_id; ?>/p/<?php echo $kpc->project_code; ?>"
                        class="media-heading">
                        <img src="<?php echo base_url(); ?>assets/images/PC.jpg" class="img-circle img-sm"
                            alt="">
                        <span class="text-semibold"> Petty Cash Project :
                            <?php echo $kpc->project_name; ?>
                            <b style="color: red;">Approve Click !</b>
                        </span>

                    </a>

                    <span class="text-muted">เลขที่ใบ PC :
                        <a target="_blank" href="<?php echo base_url(); ?>index.php/petty_cash/editpettycash/<?php echo $kpc->app_pr; ?>">
                            <?php echo $kpc->app_pr; ?>
                        </a>
                    </span>
                    <span class="media-annotation pull-right">
                        <?php echo date("d/m/Y",strtotime($kpc->creatudate)); ?>
                    </span>
                    <hr>
                </div>
            </li>
        <?php }?>
        <?php foreach ($ic as $icc) {?>
            <li class="media">
                <div class="media-body">

                    <a target="_blank" href="<?php echo base_url(); ?>index.php/inventory_active/approve_ic_v/<?php echo $icc->project_id; ?>/<?php echo $icc->po_reccode; ?>"
                        class="media-heading">
                        <img src="<?php echo base_url(); ?>assets/images/IC.png" class="img-circle img-sm"
                            alt="">
                        <span class="text-semibold"> IC Project :
                            <?php echo $icc->project_name; ?>
                            <b style="color: red; ">
                                <br>Approve Click !</b>
                        </span>

                    </a>

                    <span class="text-muted">เลขที่ใบ IC :
                        <?php echo $icc->po_reccode; ?>
                    </span>
                    <span class="media-annotation pull-right">
                        <?php echo $icc->time; ?>
                    </span>
                    <hr>
                </div>
            </li>
        <?php }?>
        <?php foreach ($appic as $app) {?>
            <li class="media">
                <div class="media-body">

                    <a target="_blank" href="<?php echo base_url(); ?>index.php/inventory/archive_receive_ohter/<?php echo $app->project_id; ?>"
                        class="media-heading">
                        <img src="<?php echo base_url(); ?>assets/images/IC.png" class="img-circle img-sm"
                            alt="">
                        <span class="text-semibold"> IC Project :
                            <?php echo $app->project_name; ?>
                            <b style="color: red; ">
                                <br>Approve Click !</b>
                        </span>

                    </a>

                    <span class="text-muted">เลขที่ใบ KeyIn IC :
                        <?php echo $app->po_reccode; ?>
                    </span>
                    <span class="media-annotation pull-right">
                        <?php echo $app->time; ?>
                    </span>
                    <hr>
                </div>
            </li>
        <?php }?>
        <?php foreach ($faa as $fa) {?>
            <li class="media">
                <div class="media-body">

                    <a target="_blank" href="<?php echo base_url(); ?>index.php/add_asset/approve_fa" class="media-heading">
                        <img src="<?php echo base_url(); ?>assets/images/fa.jpg" class="img-circle img-sm"
                            alt="">
                        <span class="text-semibold"> FA Repair:
                            <?php echo $fa->app_pr; ?>
                            <b style="color: red; ">
                                <br>Approve Click !</b>
                        </span>

                    </a>



                    <hr>
                </div>
            </li>
        <?php }?>
    </ul>
</div>