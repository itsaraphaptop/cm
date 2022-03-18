<style type="text/css" media="screen">
    .sidebar-category {
        padding-top: 50px;
    }

    #footer {
        padding-bottom: 6vh;
    }
</style>
<?php 
$session_data = $this->session->userdata('sessed_in');
$id_module = 12;
$username = $session_data["username"];
$this->db->select('*');
$this->db->from('module_detail');
$this->db->join('module_header', 'module_detail.ref_module = module_header.module_id');
$this->db->where("ref_module",$id_module);
$query = $this->db->get();

$res_modules = $query->result_array();
//var_dump($res_modules);

        $array_module = array();
        $permission = array();
        
          $sub_modules =  $res_modules;
          foreach ($sub_modules as $key => $sub_module) {

                      //get read and write by user name
                      $this->db->select(
                        ["read","write"]
                      );
                      $where_array = array(
                        "ref_username" => $username,
                        "ref_module_id" => $id_module,
                         "ref_sub_module" => $sub_module["sub_module_id"]
                      );
                      $this->db->where($where_array);
                      $query = $this->db->get("member_permission");
                      $res_data = $query->result_array();
                      $read = (isset($res_data[0]["read"]) == true) ? $res_data[0]["read"] : "N/A";
                      $write = (isset($res_data[0]["write"]) == true) ? $res_data[0]["write"] : "N/A";
                      
                      $permission[$sub_module["module_name"]][$sub_module["sub_module_id"]] =  array(
                        //"ref_module_id" => $sub_module["ref_module"],
                  //"sub_module_id" => $sub_module["sub_module_id"],
                  "read" => $read ,
                  "write" =>$write

                      );

              }// loop 1.1  

?>

<!-- Main sidebar -->
<div class="sidebar sidebar-main sidebar-default sidebar-fixed">
    <div class="sidebar-content">
        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <div class="category-title">
                    <span>
                        <h5>
                            <b>ACCOUNT RECEIVABLE</b>
                        </h5>
                    </span>
                    <ul class="icons-list">
                        <li>
                            <a href="#" data-action="collapse"></a>
                        </li>
                    </ul>
                </div>
                <ul class="navigation navigation-main navigation-accordion sidebar-default">
                    <?php if($permission["Account Receivable"][136]["read"] == 1){?>
                    <!-- ใบแจ้งหนี้ (INVOICE) -->
                    <li>
                        <a href="#" class="has-ul">
                            <i class="icon-radio-unchecked"></i>
                            <span>ใบแจ้งหนี้ (INVOICE)</span>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo base_url(); ?>ar/open_invoice_down">บันทึกใบแจ้งหนี้เงินดาวน์
                                    (Invoice Down)</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ar/open_invdown_all">รายการใบแจ้งหนี้เงินดาวน์ทั้งหมด
                                    (Invoice Down)</a>
                            </li>
                            <hr />
                            <li>
                                <a href="<?php echo base_url(); ?>ar/open_invoice_progress">บันทึกใบแจ้งหนี้ค่างวดงาน
                                    (Invoice Progress)</a>
                            </li>
                            <!-- <li>
                                <a href="<?php echo base_url(); ?>ar/sales">บันทึกใบแจ้งหนี้จากการจำหน่าย (Invoice
                                    Tradding)</a>
                            </li> -->
                            <li>
                                <a href="<?php echo base_url(); ?>ar/other">บันทึกใบแจ้งหนี้ อื่นๆ (Invoice Other)</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ar/open_invprogress_all">รายการใบแจ้งหนี้ค่างวดงานทั้งหมด
                                    (Invoice Progress)</a>
                            </li>
                            <hr />
                            <li>
                                <a href="<?php echo base_url(); ?>ar/open_invoice_retention">บันทึกใบแจ้งหนี้ประกันผลงาน
                                    (Invoice Rentention)</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ar/open_retention_all">บันทึกใบแจ้งหนี้ประกันผลงานทั้งหมด
                                    (Invoice Rentention)</a>
                            </li>
                            <hr />
                        </ul>
                    </li>
                    <!-- <li>
                        <a href="#" class="has-ul">
                            <i class="icon-radio-unchecked"></i>
                            <span>บันทึกใบลดหนี้ (Credit note)</span>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo base_url(); ?>ar/open_credit">บันทึกใบลดหนี้จากใบแจ้งหนี้ตามสัญญา
                                    (Credit note)</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ar/ar_reduce_list">บันทึกใบลดหนี้จากใบแจ้งหนี้จากการจำหน่าย
                                    (Create Note Tradding)</a>
                            </li>
                            <li>
                                <a href="#">บันทึกใบลดหนี้จากใบแจ้งหนี้อื่นๆ (Create Note Invoice Other)</a>
                            </li>
                            <hr />
                            <li>
                                <a href="<?php echo base_url(); ?>ar/open_credit_all">รายการใบลดหนี้ทั้งหมด (Credit
                                    note All)</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- ใบแจ้งหนี้ (INVOICE) -->
                    <?php } ?>
                    <?php if($permission["Account Receivable"][138]["read"] == 1){?>
                    <!-- บันทึกตั้งบัญชีลูกหนี้ (Account Receivable) -->
                    <li>
                        <a href="#" class="has-ul">
                            <i class="icon-radio-unchecked"></i>
                            <span>บันทึกตั้งบัญชีลูกหนี้ (Account Receivable)</span>
                        </a>
                        <ul class="hidden-ul">
                            <li>
                                <a href="<?php echo base_url(); ?>ar/ar_pro_acc">บันทึกตั้งบัญชีลูกหนี้จากใบแจ้งหนี้ตามสัญญา
                                    (Account Receivable)</a>
                            </li>
                            <!-- <li>
                                <a href="<?php echo base_url(); ?>ar/ar_trading_list">บันทึกตั้งบัญชีลูกหนี้จากใบแจ้งหนี้จากการจำหน่าย
                                    (Trading)</a>
                            </li> -->
                            <li>
                                <a href="<?php echo base_url(); ?>ar/other_list">บันทึกตั้งบัญชีลูกหนี้จากใบแจ้งหนี้
                                    อื่นๆ (Receipt Other)</a>
                            </li>
                            <hr />
                            <li>
                                <a href="<?php echo base_url(); ?>ar/ar_accountall">รายการตั้งบัญชีลูกหนี้ทั้งหมด
                                    (Account Receivable)</a>
                            </li>
                        </ul>
                    </li>
                    <!-- บันทึกตั้งบัญชีลูกหนี้ (Account Receivable) -->
                    <?php } ?>

                    <?php if($permission["Account Receivable"][139]["read"] == 1){?>
                    <!-- บันทึกใบเสร็จรับเงิน/ใบกำกับภาษี -->
                    <li>
                        <a href="#" class="has-ul">
                            <i class="icon-radio-unchecked"></i>
                            <span>บันทึกใบเสร็จรับเงิน/ใบกำกับภาษี</span>
                        </a>
                        <ul class="hidden-ul">
                            <li>
                                <a href="<?php echo base_url(); ?>ar/open_proreceipt">บันทึกใบเสร็จรับเงิน/ใบกำกับภาษี
                                    จากใบแจ้งหนี้ตามสัญญา (Tax Invoice/ Receipt)</a>
                            </li>
                            <!-- <li><a href="<?php echo base_url(); ?>ar/open_prorject_trading">บันทึกใบเสร็จรับเงิน/ใบกำกับภาษี จากใบแจ้งหนี้จากการจำหน่าย (Trading)</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>ar/open_proreceipt_other">บันทึกใบเสร็จรับเงิน/ใบกำกับภาษี จากใบแจ้งหนี้อื่นๆ (Receipt Other)</a>
					</li> -->
                            <hr />
                            <li>
                                <a href="<?php echo base_url(); ?>ar/ar_receiptall">รายการบันทึกใบเสร็จรับเงิน/ใบกำกับภาษีทั้งหมด
                                    (Tax Invoice/ Receipt)</a>
                            </li>
                        </ul>
                    </li>
                    <!-- บันทึกใบเสร็จรับเงิน/ใบกำกับภาษี -->
                    <?php } ?>

                    <?php if($permission["Account Receivable"][140]["read"] == 1){?>
                    <!-- บันทึกรับเงินตามใบเสร็จ -->
                    <li>
                        <a href="#" class="has-ul">
                            <i class="icon-radio-unchecked"></i>
                            <span>บันทึกรับเงินตามใบเสร็จ</span>
                        </a>
                        <ul class="hidden-ul">
                            <li>
                                <a href="<?php echo base_url(); ?>ar/ar_receiving">บันทึกรับเงินตามใบเสร็จ (AR
                                    Receiving)</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ar/ar_receivingall">รายการบันทึกรับเงินตามใบเสร็จทั้งหมด
                                    (AR Receiving)</a>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>

                    <?php if($permission["Account Receivable"][141]["read"] == 1){?>
                    <!-- บันทึกตัดลูกหนี้ -->
                    <li>
                        <a href="#" class="has-ul">
                            <i class="icon-radio-unchecked"></i>
                            <span>บันทึกตัดลูกหนี้</span>
                        </a>
                        <ul class="hidden-ul">
                            <li>
                                <a href="<?php echo base_url(); ?>ar/ar_clear">บันทึกตัดลูกหนี้ (Clear A/R)</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ar/ar_clearall">รายการบันทึกตัดลูกหนี้ทั้งหมด (Clear
                                    A/R)</a>
                            </li>
                            <!--  <li><a href="<?php echo base_url(); ?>ar/ar_other_clear">บันทึกตัดลูกหนี้อื่นๆ (Clear A/R Other)</a>
				</li> -->
                        </ul>
                    </li>
                    <!-- บันทึกตัดลูกหนี้ -->


                    <?php } ?>
                    <?php if($permission["Account Receivable"][137]["read"] == 1){?>
                    <!-- รายงานลูกหนี้ -->
                    <li>
                        <a href="<?php echo base_url(); ?>management/reportar">
                            <i class="icon-radio-unchecked"></i>
                            <span>รายงานลูกหนี้</span>
                        </a>
                    </li>
                    <!-- รายงานลูกหนี้ -->
                    <?php } ?>
                    <li>
                        <a href="<?php echo base_url(); ?>ar_report/ar_vender_carry">
                            <i class="icon-radio-unchecked"></i>
                            <span>รายงานเจ้าหนี้คงเหลือยกมา</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="has-ul">
                            <i class="icon-radio-unchecked"></i>
                            <span>รายงานทั้งหมด</span>
                        </a>
                        <ul class="hidden-ul">
                            <li>
                                <a href="<?php echo base_url(); ?>ar_report/view_sale_tax_val">รายงานภาษีขาย</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>ar/ar_post_gl">
                            <i class="icon-radio-unchecked"></i>
                            <span>POST TO GL SYSTEM</span>
                        </a>
                    </li>
                </ul>
                <div id="footer"></div>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>

<script type="text/javascript">
    $('#ar').css('background-color', '#00aeef');
    $('#ar').css('color', '#FFFFFF');
</script>