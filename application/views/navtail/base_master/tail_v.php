<style type="text/css" media="screen">

    div.scrollmenu {
        background-color: #FCFCFC;
        overflow: auto;
        color: #000000;
        white-space: nowrap;
        margin-top: 13px;
    }

    div.scrollmenu a {
        display: inline-block;
        color: #000000;
        color: white;
        /*text-align: center;*/
        /*padding: 14px;*/
        text-decoration: none;

    }

    div.scrollmenu a:hover {
        background-color: #FFCC66;
        /*-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);*/
        background-color: #F5F5F5;
    }


    div.scrollmenu_2 {
        background-color: #FCFCFC;
        overflow: auto;
        color: #000000;
        white-space: nowrap;

    }

    div.scrollmenu_2 a {
        display: inline-block;
        color: #000000;
        /*color: white;*/
        /*text-align: center;*/
        padding: 14px;
        text-decoration: none;

    }

    div.scrollmenu_2 a:hover {
        background-color: #FFCC66;
        /*-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);*/
        background-color: #F5F5F5;
    }
    #nav_bar::-webkit-scrollbar-track {
        border-radius: 10px;
        background: rgba(0, 0, 0, 0.1);
        border: 1px solid #ccc;
    }

    #nav_bar::-webkit-scrollbar {
        width: 0.5em;
        height: 0.5em;
        background-color: #F5F5F5;
    }

    #nav_bar::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background: linear-gradient(left, #fff, #e4e4e4);
        border: 1px solid #aaa;
    }

    #project_view::-webkit-scrollbar-track {
        border-radius: 10px;
        background: rgba(0, 0, 0, 0.1);
        border: 1px solid #ccc;
    }

    #project_view::-webkit-scrollbar {
        width: 6px;
        background-color: #F5F5F5;
    }

    #project_view::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background: linear-gradient(left, #fff, #e4e4e4);
        border: 1px solid #aaa;
    }
</style>
<script type="text/javascript">
    function link(link) {
        window.location = link;

    }
</script>
<?php
$session_data = $this->session->userdata('sessed_in');
$id_module = 8;
$username = $session_data["username"];
$this->db->select('*');
$this->db->from('module_detail');
$this->db->join('module_header', 'module_detail.ref_module = module_header.module_id');
$this->db->where("ref_module", $id_module);
$query = $this->db->get();
$comp_img = $session_data['comp_img'];
$res_modules = $query->result_array();
//var_dump($res_modules);

$array_module = array();
$permission = array();

$sub_modules = $res_modules;
foreach ($sub_modules as $key => $sub_module) {

	//get read and write by user name
	$this->db->select(
		["read", "write"]
	);
	$where_array = array(
		"ref_username" => $username,
		"ref_module_id" => $id_module,
		"ref_sub_module" => $sub_module["sub_module_id"],
	);
	$this->db->where($where_array);
	$query = $this->db->get("member_permission");
	$res_data = $query->result_array();
	$read = (isset($res_data[0]["read"]) == true) ? $res_data[0]["read"] : "N/A";
	$write = (isset($res_data[0]["write"]) == true) ? $res_data[0]["write"] : "N/A";

	$permission[$sub_module["module_name"]][$sub_module["sub_module_id"]] = array(
		//"ref_module_id" => $sub_module["ref_module"],
		//"sub_module_id" => $sub_module["sub_module_id"],
		"read" => $read,
		"write" => $write,

	);

} // loop 1.1

?>
<style>
    .scroll {

        height: 250px;
        overflow: scroll;
    }

    li.user-header {
        /*height: 175px;*/
        padding: 10px;
        text-align: center;
        /*background-color: #37474F;*/
        background-color: #ec971f
    }

    #user {
        /*height: 175px;*/
        padding: 10px;
        text-align: center;
    }
</style>
<!-- Main navbar -->
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
$this->db->group_by('app_pr');
$query = $this->db->get('approve_wo');
$reject_wo = $query->result();

$this->db->select('*');
$this->db->where('creatuser', $username);
$this->db->where('status', "reject");
$this->db->group_by('app_pr');
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
<style type="text/css">
    @media (min-width: 320px) {
        #test {
            color: blue;
            font-size: 50px;
        }

        .navbar-nav>li {
            display: block;
        }

        .navbar-nav>li.menu {
            display: none;
        }

        div.navbar-header#logo {
            display: none;
        }
        .foo {
            background-color: #FFFFFF;
            /*width: aaa; */
            height: 65px;
            margin-left: -1px;
            padding: 15px;
            bottom: 10px;
        }


    }

    /* Small devices (tablets, 768px and up) */
    @media (min-width: 768px) {
        #test {
            color: blue;
            font-size: 50px;
        }

        .navbar-nav>li {
            display: block;
        }

        .navbar-nav>li.menu {
            display: none;
        }

        div.navbar-header#logo {
            display: none;
        }
        .foo {
            background-color: #FFFFFF;
            /*width: aaa; */
            height: 65px;
            margin-left: -1px;
            padding: 15px;
            bottom: 10px;
        }


    }

    /* Medium devices (desktops, 992px and up) */
    @media (min-width: 992px) {

        #test {
            color: yellow;
            font-size: 50px;
        }

        .navbar-nav>li {
            display: block;
        }

        .navbar-nav>li.menu {
            display: none;
        }

        div.navbar-header#logo {
            display: none;
        }
        .scroll_fixed {
            position: fixed;
            top: 77vh;
            z-index: 1032;

        }
        .foo {
            background-color: #FFFFFF;
            width: 260px;
            height: 60px;
            margin-left: -1px;
            padding: 15px;
        }

    }

    @media (min-width: 1112px) {

        #test {
            color: yellow;
            font-size: 50px;
        }

        .navbar-nav>li {
            display: block;
        }

        .navbar-nav>li.menu {
            display: none;
        }

        div.navbar-header#logo {
            display: none;
        }
        .scroll_fixed {
            position: fixed;
            top: 82vh;
            z-index: 1032;

        }
        .foo {
            background-color: #FFFFFF;
            width: 260px;
            height: 60px;
            margin-left: -1px;
            padding: 15px;
        }
        /*	ul.minimemu{
		display: block;
	}*/


    }

    /* Large devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) {

        #test {
            color: red;
            font-size: 200px;
        }

        .navbar-nav>li {
            display: block;
        }

        .navbar-nav>li.menu {
            display: block;
        }

        div.navbar-header#logo {
            display: block;
        }
        .mar {
            margin-top: 25px;
        }

        .scroll_fixed {
            position: fixed;
            top: 88vh;
            z-index: 1032;

        }

        .foo {
            background-color: #FFFFFF;
            width: 260px;
            height: 60px;
            margin-left: -1px;
            padding: 15px;
        }
    }
</style>
<div id="show_user"></div>

<div class="navbar navbar-default navbar-fixed-top" style="z-index: 1033;">
    <!-- <div class="navbar navbar-inverse bg-orange-600 navbar-fixed-top"> -->
    <div class="navbar-header">
        <!-- <a class="navbar-brand" href="/"><img src="<?php echo base_url(); ?>comp/
	<?php echo $img; ?>" alt=""></a> -->
        <a class="navbar-brand" href="<?=base_url();?>">
            <strong style="color:#000;"></strong>
        </a>
        <ul class="nav navbar-nav visible-xs-block">
            <!-- <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li> -->
            <!-- <li><a class="class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i class="icon-paragraph-justify3"></i></a></li> -->
            <li>
                <a class="sidebar-mobile-main-toggle">
                    <i class="icon-transmission"></i>
                </a>
            </li>
            <li>
                <a id="layout_xs">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
            <li class="user_online">
                <a>
                    <i class="icon-user-tie"></i>
                </a>
            </li>
            <li id="icon_m">
                <a>
                    <i class="icon-tree5"></i>
                </a>
            </li>
            <!-- <li><a class="sidebar-mobile-secondary-toggle"><i class="icon-more"></i></a></li> -->
        </ul>
    </div>

    <div class="navbar-collapse collapse">

        <ul class="nav navbar-nav visible-sm-block">
            <li>
                <a id="layout_sm">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav visible-md-block">
            <li>
                <a id="layout_md">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">


            <li class="dropdown ">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon icon-bell2"></i>
                    <span class="visible-xs-inline-block position-right">Messages</span>
                    <span class="badge bg-warning-400">
                        <?php echo $numwo_reject + $numpo_reject + $numpr_reject + $numtd + $numpr + $numpo + $numwo + $numpc + $numic + $appnumic + $numfa; ?></span>
                </a>
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
                            <li>
                                <div class="media-body">
                                    <a target="_blank" href="<?php echo base_url(); ?>index.php/pr/pr_approve/<?php echo $kpr->project_code; ?>/<?php echo $kpr->project_id; ?>"
                                        class="media-heading">

                                        <img src="<?php echo base_url(); ?>assets/images/PR.jpg" class="img-circle img-sm"
                                            alt="">
                                        <span class="text-semibold">Purchase Requisition System (PR) Project :
                                            <?php echo $kpr->project_name; ?>
                                            <b style="color: green;">Approve Click !</b>
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
                            <li>
                                <div class="media-body">
                                    <a target="_blank" href="<?php echo base_url(); ?>index.php/purchase/purchase_approve/<?php echo $kpo->project_id; ?>/p/<?php echo $kpo->project_code; ?>"
                                        class="media-heading">
                                        <img src="<?php echo base_url(); ?>assets/images/PO.jpg" class="img-circle img-sm"
                                            alt="">
                                        <span class="text-semibold">Purchase Order System (PO) Project :
                                            <?php echo $kpo->project_name; ?>
                                            <b style="color: green;">Approve Click !</b>
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
                            <li>
                                <div class="media-body">
                                    <a target="_blank" href="<?php echo base_url(); ?>index.php/contract/newapprovecontract_p/<?php echo $kwo->project_id; ?>/p/<?php echo $kwo->project_code; ?>"
                                        class="media-heading">
                                        <img src="<?php echo base_url(); ?>assets/images/WO.jpg" class="img-circle img-sm"
                                            alt="">
                                        <span class="text-semibold">Work Order (WO) Project :
                                            <?php echo $kwo->project_name; ?>
                                            <b style="color: green;">Approve Click !</b>
                                        </span>

                                    </a>

                                    <span class="text-muted">เลขที่ใบ WO :
                                        <a target="_blank" href="<?php echo base_url(); ?>contract/editnewworkorder/<?php echo $kwo->app_pr; ?>/<?php echo $kwo->project_id; ?>/p">
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
                        <?php foreach ($reject_wo as $kwo) {?>
                            <li>
                                <div class="media-body">
                                    <a target="_blank" href="<?php echo base_url(); ?>index.php/contract/newapprovecontract_p/<?php echo $kwo->project_id; ?>/p/<?php echo $kwo->project_code; ?>"
                                        class="media-heading">
                                        <img src="<?php echo base_url(); ?>assets/images/WO.jpg" class="img-circle img-sm"
                                            alt="">
                                        <span class="text-semibold">Work Order (WO) Project :
                                            <?php echo $kwo->project_name; ?>
                                            <b style="color: green;">Reject WO !</b>
                                        </span>

                                    </a>

                                    <span class="text-muted">เลขที่ใบ WO :
                                        <a target="_blank" href="<?php echo base_url(); ?>contract/editnewworkorder/<?php echo $kwo->app_pr; ?>/<?php echo $kwo->project_id; ?>/p">
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
                            <li>
                                <div class="media-body">

                                    <a target="_blank" href="<?php echo base_url(); ?>index.php/petty_cash/approve_pc_v/<?php echo $kpc->project_id; ?>/p/<?php echo $kpc->project_code; ?>"
                                        class="media-heading">
                                        <img src="<?php echo base_url(); ?>assets/images/PC.jpg" class="img-circle img-sm"
                                            alt="">
                                        <span class="text-semibold"> Petty Cash Project :
                                            <?php echo $kpc->project_name; ?>
                                            <b style="color: green;">Approve Click !</b>
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
                            <li>
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
                            <li>
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
                            <li>
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
            </li>


            <li class="dropdown dropdown-user des_show">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo base_url(); ?>profile/<?php echo $imgu; ?>" alt="">
                    <span>
                        <?php echo $name; ?>
                    </span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">

                    <li class="user-header">
                        <img src="<?php echo base_url(); ?>profile/<?php echo $imgu; ?>" class="img-circle" style="max-height:100px;">
                        <p>
                            <?php echo $name; ?>
                            <small></small>
                        </p>
                    </li>

                    <?php if ($username == "admin") {?>
                    <li>
                        <a href="<?php echo base_url(); ?>data_structure/forprogrammer">
                            <i class="icon-database2"></i> Company Permission</a>
                    </li>
                    <?php }?>
                    <li>
                        <a data-toggle="modal" data-target="#changepass">
                            <i class="icon-key"></i> Change Password</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>auth/logout">
                            <i class="icon-switch2"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <div id="navbar" class="collapse navbar-collapse">


        <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	      	</button> -->

        <?php $session = $this->session->userdata('sessed_in'); ?>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <a href="<?=base_url();?>panel/office">
                <!-- <img src="<?php echo base_url();?>comp/comp_2016-01-07_9779.png" class="img-responsive" style="width:200px; height: 50px;margin-left: 5px;" > -->
                <img src="<?php echo base_url();?>comp/<?= $comp_img;?>" align="center" style=" height: 50px;position: absolute;left: 2vh;top: -3.2vh; margin-left: 30px;">
                <!-- style="width:200; height: 50px;margin: auto;" -->
                <!--     position: absolute;
    left: 100px;
    top: 150px; -->
            </a>
        </div>
        <div class="col-lg-10 col-md-10">
            <ul class="nav navbar-nav">
                <!-- <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li> -->
                <li class="side">
                    <a class="sidebar-control sidebar-main-toggle hidden-xs">
                        <i class="icon-menu3"></i>
                    </a>
                </li>

            </ul>
            <?php
		 	$this->db->select('*');
            $this->db->where('ref_username',$username);
            $this->db->group_by('ref_module_id');
            $q = $this->db->get('member_permission')->result();
		 	?>
            <!-- <div class="scrollmenu sidebar-fixed text-center" id="nav_bar">
                <a style="width: 90px; text-align: center;" class="label label-info" id="home" href="<?php echo base_url(); ?>">Home</a>
                <?php foreach ($q as $key => $value) {
					$ref_module = $value->ref_module_id;
     				$read = $value->read;
				?>

                <?php if($ref_module==1){?>
                <?php if($read==1){?>
                <a style="width: 90px; text-align: center;" class="label label-info" id="cc" href="<?php echo base_url(); ?>bd/main_index">CC</a>
                <?php } ?>
                <?php }?>
                <?php if($ref_module==2){?>
                <?php if($read==1){?>
                <a style="width: 90px; text-align: center;" class="label label-info" id="pr" href="<?php echo base_url(); ?>office/main_index">PR</a>
                <?php } ?>
                <?php }?>
                <?php if($ref_module==3){?>
                <?php if($read==1){?>
                <a style="width: 90px; text-align: center;" class="label label-info" id="po" href="<?php echo base_url(); ?>purchase/main_index">PO</a>
                <?php } ?>
                <?php }?>
                <?php if($ref_module==4){?>
                <?php if($read==1){?>
                <a style="width: 90px; text-align: center;" class="label label-info" id="ic" href="<?php echo base_url(); ?>inventory/main_index">IM</a>
                <?php } ?>
                <?php }?>
                <?php if($ref_module==5){?>
                <?php if($read==1){?>
                <a style="width: 90px; text-align: center;" class="label label-info" id="fa" href="<?php echo base_url(); ?>add_asset/main_index">FA</a>
                <?php } ?>
                <?php }?>
                <?php if($ref_module==6){?>
                <?php if($read==1){?>
                <a style="width: 90px; text-align: center;" class="label label-info" id="ap" href="<?php echo base_url(); ?>ap/main_index">AP</a>
                <?php } ?>
                <?php }?>
                <?php if($ref_module==7){?>
                <?php if($read==1){?>
                <a style="width: 90px; text-align: center;" class="label label-info" id="ar" href="<?php echo base_url(); ?>ar/main_index">AR</a>
                <?php } ?>
                <?php }?>
                <?php if($ref_module==8){?>
                <?php if($read==1){?>
                <a style="width: 90px; text-align: center;" class="label label-info" id="gl" href="<?php echo base_url(); ?>gl/main_index">GL</a>
                <?php } ?>
                <?php }?>
                <?php if($ref_module==9){?>
                <?php if($read==1){?>
                <a style="width: 90px; text-align: center;" class="label label-info" id="pm" href="<?php echo base_url(); ?>management/project_status_overview">PM</a>
                <?php } ?>
                <?php }?>
                <?php if($ref_module==10){?>
                <?php if($read==1){?>
                <a style="width: 90px; text-align: center;" class="label label-info" id="pp" href="<?php echo base_url(); ?>management/dash_projprogre">PP</a>
                <?php } ?>
                <?php }?>
                <?php if($ref_module==11){?>
                <?php if($read==1){?>
                <a style="width: 90px; text-align: center;" class="label label-info" id="mc" href="<?php echo base_url(); ?>data_master/main_index">Master</a>
                <?php } ?>
                <?php }?>
                <?php } ?>
            </div> -->

            <!-- <ul class="nav navbar-nav"> -->

            <!-- เมนู -->
            <!-- 		<li class="dropdown menu active_modul" id="cc" url="<?php echo base_url(); ?>bd/main_index">

		<a class="navbar-text">
			<b>CC</b>
			<br>Cost Control
		</a>
		</li>
		<li class="dropdown menu active_modul" id="pr" url="<?php echo base_url(); ?>office/main_index">

			<a class="navbar-text">
				<b class="text-center">PR</b>
				<br>Purchase
			</a>
		</li>
		<li class="dropdown menu active_modul" id="po" url="<?php echo base_url(); ?>purchase/main_index">

			<a class="navbar-text">
				<b>PO</b>
				<br>Purchase
			</a>
		</li>
		<li class="dropdown menu active_modul" id="ic" url="<?php echo base_url(); ?>inventory/main_index">

			<a class="navbar-text">
				<b>IC</b>
				<br>Inventory Control
			</a>
		</li>

		<li class="dropdown menu active_modul" id="fa" url="<?php echo base_url(); ?>add_asset/main_index">

			<a class="navbar-text">
				<b>FA</b>
				<br>Fix Asset
			</a>
		</li>
		<li class="dropdown menu active_modul" id="ap" url="<?php echo base_url(); ?>ap/main_index">

			<a class="navbar-text">
				<b>AP</b>
				<br>Account Payable
			</a>
		</li>
		<li class="dropdown menu active_modul" id="ar" url="<?php echo base_url(); ?>ar/main_index">

			<a class="navbar-text">
				<b>AR</b>
				<br>Account Receivable
			</a>
		</li>
		<li class="dropdown menu active_modul" id="gl" url="<?php echo base_url(); ?>gl/main_index">

			<a class="navbar-text">
				<b>GL</b>
				<br>General Vouncher
			</a>
		</li>
		<li class="dropdown menu active_modul" id="pm" url="<?php echo base_url(); ?>management/main_index">

			<a class="navbar-text">
				<b>PM</b>
				<br>Project Management
			</a>
		</li>
		<li class="dropdown menu active_modul" id="mc" url="<?php echo base_url(); ?>data_master/main_index">

			<a class="navbar-text">
				<b>MC</b>
				<br>Master Configuration
			</a>
		</li> -->
            <!-- <li class="dropdown">
						<a href="http://itsm.cloudmeka.com/" class="navbar-text">
							<b>IT</b> <br>Service Management System
						</a>
					</li> -->
            <!-- เมนู -->

            <!-- </ul> -->

        </div>

    </div>
    <div id="xs_login" class="collapse navbar-collapse">


        <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	      	</button> -->
        <div class="col-lg-2 log_xs" style="display: none;">
            <div class="navbar-header">
                <div style="display: inline-block;padding-top: 5px;">
                    <img src="<?php echo base_url(); ?>profile/<?php echo $imgu; ?>" class="img-responsive img-circle"
                        style="width: 15vh;height: 15vh;" alt="<?php echo $name; ?>">
                </div>
                <div style="text-align:center;"></div>
                <span>
                    <?php echo $name; ?>
                </span>
            </div>
        </div>
        <div class="col-lg-9 log_xs" style="overflow-x: auto;display: none;">

            <ul class="nav navbar-nav">
                <?php 
					if ($master != "true") {

					} else {
					?>
                <li>
                    <a class="preload" href="<?php echo base_url(); ?>data_master">
                        <i class="icon-cog5"></i> Setup Master</a>
                </li>
                <?php } ?>
                <?php if ($username == "admin") {?>
                <li>
                    <a href="<?php echo base_url(); ?>data_structure/forprogrammer">
                        <i class="icon-database2"></i> For Programmer</a>
                </li>
                <?php } ?>
                <li>
                    <a data-toggle="modal" data-target="#leave">
                        <i class="glyphicon glyphicon-send"></i> Request Time Off</a>
                </li>
                <li>
                    <a data-toggle="modal" data-target="#changepass">
                        <i class="icon-key"></i> Change Password</a>
                </li>
                <li>

                    <a href="<?php echo base_url(); ?>auth/logout">
                        <i class="icon-switch2"></i> Logout</a>
                </li>
            </ul>
        </div>

    </div>
</div>
<!-- /main navbar -->
<div class="mar"></div>

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->

        <!-- /main sidebar -->
        <!-- modal  Change password-->
        <div class="modal fade" id="changepass" data-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content bg-slate-800">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
                    </div>
                    <div class="modal-body">
                        <!-- <div class="panel-body"> -->
                        <div class="row">
                            <form id="contact" method="post" action="<?php echo base_url(); ?>index.php/auth/changepass">
                                <div class="modal-body">
                                    <!-- User thumbnail -->
                                    <div class="thumb thumb-rounded thumb-slide">
                                        <img src="<?php echo base_url(); ?>profile/<?php echo $imgu; ?>" alt="">
                                        <div class="caption">
                                            <span>
                                                <a href="<?php echo base_url(); ?>userprofile" class="btn bg-success-400 btn-icon btn-xs"
                                                    data-popup="lightbox">
                                                    <i class="icon-plus2"></i>
                                                </a>
                                                <!-- <a href="user_pages_profile.html" class="btn bg-success-400 btn-icon btn-xs"><i class="icon-link"></i></a> -->
                                            </span>
                                        </div>
                                    </div>

                                    <div class="caption text-center">
                                        <h3 class="text-semibold no-margin">
                                            <?php echo $name; ?>
                                            <small class="display-block">
                                                <?php if ($dep == "") {?>
                                                <?php echo $project; ?>
                                                <?php } else {?>
                                                <?php echo $dep; ?>
                                                <?php }?>
                                            </small>
                                        </h3>
                                        <ul class="icons-list mt-15">
                                            <li>
                                                <a href="#" data-popup="tooltip" title="Google Drive">
                                                    <i class="icon-google-drive"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-popup="tooltip" title="Twitter">
                                                    <i class="icon-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-popup="tooltip" title="Github">
                                                    <i class="icon-github"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /user thumbnail -->

                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control input-sm" name="username"
                                                    value="<?php echo $username; ?>">
                                                <input type="password" class="password form-control input-lg" required=""
                                                    name="password" placeholder="New Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <button class="change btn btn-primary btn-sm btn-block" name="btnchange"
                                                    type="submit">Submit</button>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <button class="btn btn-default btn-sm btn-block" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!--end modal -->


        <script>
            // Accessibility labels
            $('.pickadate-accessibility').pickadate({
                labelMonthNext: 'Go to the next month',
                labelMonthPrev: 'Go to the previous month',
                labelMonthSelect: 'Pick a month from the dropdown',
                labelYearSelect: 'Pick a year from the dropdown',
                selectMonths: true,
                selectYears: true
            });
        </script>
        <script>
            function showPreview(ele) {
                $('#imgAvatar').attr('src', ele.value); // for IE
                if (ele.files && ele.files[0]) {

                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#imgAvatar').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(ele.files[0]);
                }
            }
            var frm = $('#contact');
            frm.submit(function(ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                    success: function(data) {
                        swal({
                            title: "Change Password!",
                            text: "Change Password Completed!!.",
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                        setTimeout(function() {
                            window.location.href = "<?php echo base_url(); ?>auth/logout";
                        }, 2000);
                    }
                });
                ev.preventDefault();

            });

            $('.user_online').click(function(event) {
                $("#show_user").html('<div class="loading">Loading&#8230;</div>');
                $.post('<?php echo base_url(); ?>auth/user_online', function(data) {}).done(
                    function(data) {
                        $('#show_user').html(data);
                        $("#modal_users").modal('show');
                    });
            });
            var st = false;
            $('.side').click(function(event) {
                // alert(5555);
                if (st == false) {
                    $('#footside').css('display', 'none');
                    st = true;
                } else {
                    $('#footside').css('display', 'block');
                    st = false;
                }
            });
            // var active = false;
            // $('.active_modul').click(function(event) {
            // 	var target = $(this);
            // 	var id = $(this).attr('id');
            // 	var _url = $(this).attr('url');
            // 	// alert("red");
            // 	$('.active_modul').css('background-color', '');

            // 	// alert(id);
            // 	$(".page-container").html('<div class="loading">Loading&#8230;</div>');
            // 	setTimeout(function(){

            // 		$.get(_url, function() {

            // 		}).done(function(data){
            // 			// alert(data);
            // 			$('body').html('');
            // 			$('body').html(data);
            // 			// alert(id);
            // 			// $('#'+id).css('background-color', '#ffb84d');
            // 			$('#'+id).css('background-color', '#00aeef');
            // 			$('#'+id).children('.navbar-text').css('color','#FFFFFF');
            // 		});
            // 	}, 500);
            // });
        </script>