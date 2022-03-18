<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ap_active extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->helper('date');
        }
        public function get_procode($id)
        {
          $this->db->select('project_code');
          $this->db->from('project');
          $this->db->where('project_id', $id);
          $query = $this->db->get();

          if ($query) {
            $res = $query->result_array()[0]['project_code'];
          }else {
            $res = '';
          }
          
          return $res;
        }

        public function addnewap()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();
          // echo '<pre>';
          // print_r($add);die();
          try {

             $data = array(
               'apv_code'       => $add['apvcode'],
               'apv_item'       => $add['apv_id'],
               'apv_pono'       => $add['pono'],               
               'apv_duedate'    => $add['duedate'],
               'apv_inv'        => $add['taxno'],
               'apv_crterm'     => $add['crterm'],
               'apv_project'    => $add['projectid'],
               'apv_netamt'     => $add['qty'],
               'apv_vat'        => parse_num($add['pamount']),
               'apv_vatper'     => $add['price_unit'],
               'apv_totamt'     => parse_num($add['amt']),
               'cn'             => 'no',
               'apv_date'         => $add['vchdate'],
               'apv_do'         => $add['porecx'],
               'apv_vender'     => $add['venderid'],
               'apv_system'     => $add['systemid'],
               'apv_gldate'     => $add['vchdate'],
               'apv_glyear'     => $add['glyear'],
               'apv_glperiod'   => $add['glperiod'],
               'apv_dascr'   => $add['dascr'],
               'gl_status'      => 'N',
               'apv_useradd'    => $username,
               'compcode'       => $compcode,
               'apv_type'       => 'apv',
              //  'apv_icdate'     =>$add['icdate'],
               'apv_icdate'     =>$add['duedate'],
               'status'         => "wait",
               'downper'           => $add['downper'],
               'downper_value'     => $add['downper_value'],
               'retentionper'      => $add['retentionper'],
               'retention_value'   => $add['retention_value'],
              );

              $insecc = $this->db->insert('apv_header',$data);
              $id  = $this->db->insert_id();
              $prevamt_v = 0;
              if ($insecc) {
                if(isset($add['amount_ch_less'])) {
                  foreach ($add['amount_ch_less'] as $key => $value) {
                    $prevamt_v += $add['amount_ch_less'][$key];  
                  }
                  $pervamt = array(
                    'prevamt' => $prevamt_v
                  );
                  $this->db->where('apv_id', $id);
                  $this->db->update('apv_header', $pervamt);

                  foreach ($add['amount_ch_less'] as $key => $value) {
                    $data_down = array(
                      'down_pay' => $add['amount_ch_less'][$key]
                    );
                    $this->db->set('down_pay', 'down_pay+1', FALSE); 
                    $this->db->where('id', $add['less_id'][$key]);
                    $this->db->update('ap_down_header', $data_down);  
                  }
                }
              }
            
              foreach ($add['qtyi'] as $key => $value) {
                $data_d = array(
                    'apvi_ref'        => $add['apvcode'],
                    'apvi_qty'        => $add['qtyi'][$key],
                    'apvi_unit'       => $add['uniti'][$key],
                    'apvi_priceunit'  => $add['priceuniti'][$key],
                    'apvi_amount'     => $add['dr'][$key],
                    'apvi_vatper'     => $add['tovat'][$key],
                    'apvi_vat'        => $add['vatamti'][$key],
                    'apvi_netamt'     => $add['amounti'][$key],
                    'apvi_taxno'      => $add['taxiv'][$key],
                    'apvi_taxid'      => $add['apvtaxno'][$key],
                    'apvi_taxdate'    => $add['taxdate'][$key],
                    'apvi_system'     => $add['systemid'],
                    'apvi_costcode'   => $add['costcodei'][$key],
                    'apvi_costname'   => $add['costnamei'][$key],
                    'apvi_matcode'    => $add['matcodei'][$key],
                    'apvi_matname'    => $add['matnamei'][$key],
                    'status_de'       => "A",
                    'poi_id'          => $add['poi_id'][$key],
                    'sub_costcode'    => $add['subcost'][$key]
                  );
                  $this->db->insert('apv_detail',$data_d);
                }

          //จำนวนแถวตาม mat
          foreach ($add['cr'] as $key => $value) {
            $data_gl = array(
              'vchno'         => $add['apvcode'],
              'vchdate'       => $add['vchdate'],
              'doctype'       => 'apv',
              'acct_no'       => $add['aps_paccost'][$key],
              'projectid'     => $add['projectid'],
              'datatype'      => 'datatype',
              'vendor_id'     => $add['venderid'],
              'duedate'       => $add['duedate'],
              'systemcode'     => $add['systemid'],
              'amtdr'         => parse_num($add['dr'][$key]),
              'amtcr'         => parse_num($add['cr'][$key]),
              'costcode'      => $add['costcode'][$key],
              'matcode'       => $add['matcodei'][$key],
              'matname'       => $add['matnamei'][$key],
              'gltype'        => $add['type'][$key],
              'glyear'        => $add['glyear'],
              'glperiod'      => $add['glperiod'],
              'completegl'    => "N",
              'adduser'       => $username,
              'createdate'    => date('Y-m-d H:i:s',now()),
              'compcode'      => $compcode,
            );
            $this->db->insert('ap_gl', $data_gl);
          }
          //จำนวนแถวตาม mat
            
            foreach ($add['aps_paccost_bu'] as $key => $mat) {
              $data_gl_bu = array(
                'vchno'         => $add['apvcode'],
                'vchdate'       => $add['vchdate'],
                'doctype'       => 'apv',
                'acct_no'       => $add['aps_paccost_bu'][$key],
                'projectid'     => $add['projectid'],
                'datatype'      => 'datatype',
                'vendor_id'     => $add['venderid'],
                'duedate'       => $add['duedate'],
                'systemcode'     => $add['systemid'],
                'amtdr'         => parse_num($add['dr_bu'][$key]),
                'amtcr'         => parse_num($add['cr_bu'][$key]),
                'gltype'        => $add['type_bu'][$key],
                'glyear'        => $add['glyear'],
                'glperiod'      => $add['glperiod'],
                'completegl'    => "N",
                'adduser'       => $username,
                'createdate'    => date('Y-m-d H:i:s',now()),
                'compcode'      => $compcode,
              );
              $this->db->insert('ap_gl', $data_gl_bu);
            }

            if (isset($add['taxiv'])) {
              foreach ($add['venid_tax'] as $key => $tax) {
                  $data_tax = array(
                    'ap_code'    => $add['apvcode'],
                    'ap_taxno'   => $add['taxiv'][$key],
                    'ap_taxdate' => $add['taxdate'][$key],
                    'project_id' => $add['projectid'],
                    'vender_id'  => $add['venderid'],
                    'ap_period'  => $add['glperiod'],
                    'ap_year'    => $add['glyear'],
                    'ap_type'    => 'apv',
                    'ap_amount'  => $add['qty'],
                    'ap_vatper'  => $add['price_unit'],
                    'ap_amtvat'  => $add['tax_amt'][$key],
                    'ap_netamt'  => $add['vat_tax'][$key],
                    'ap_taxid'   => $add['apvtaxno'][$key],
                  );
                  $this->db->insert('ap_tax',$data_tax);   
                }
              }

              $data_po = array(
              'apv_status' => "yes"
              );
              $array_porecx = explode(",", $add['porecx']);
              
              $this->db->where_in('po_reccode',$array_porecx);
              $this->db->update('receive_po',$data_po);

              $data_pos = array(
              'apv_open' => "open"
              );
              $this->db->where('po_pono', $add['pono']);
              $this->db->update('po',$data_pos);

             
              
          } catch (Exception $e) {
            echo $e;
          }
        }


        public function addnewcnv()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();
          
          // echo '<pre>';
          // print_r($add);
          // die();

          try {
            $datestring = "Y";
             $mm = "m";
             $dd = "d";

             $this->db->select('*');
             $qu = $this->db->get('cnv_header');
             $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

             if ($res==0) {
               $cnvcode = "CNV".date($datestring).date($mm)."000"."1";
                $cnv_item ="1";
             }else{
               $this->db->select('*');
               $this->db->order_by('cnv_item','desc');
               $this->db->limit('1');
               $q = $this->db->get('cnv_header');
               $run = $q->result();
               foreach ($run as $valx)
               {
                 $x1 = $valx->cnv_item+1;
               }

               if ($x1<=9) {
                  $cnvcode = "CNV".date($datestring).date($mm)."000".$x1;
                  $cnv_item = $x1;
               }
               elseif ($x1<=99) {
                 $cnvcode = "CNV".date($datestring).date($mm)."00".$x1;
                 $cnv_item = $x1;
               }
               elseif ($x1<=999) {
                 $cnvcode = "CNV".date($datestring).date($mm)."0".$x1;
                 $cnv_item = $x1;
               }
             }

             $data = array(
               'cnv_code'       => $cnvcode,
               'cnv_item'       => $cnv_item,
               'cnv_pono'       => $add['pono'],
               'cnv_type'       => $add['ttype'],
               'ap_code'        => $add['cnap_no'],
               'cnv_duedate'    => $add['duedate'],
              //  'cnv_inv'        => $add['taxiv'],
               'cnv_project'    => $add['projectid'],
               'cnv_netamt'     => $add['qty'],
               'cnv_vat'        => $add['pamount'],
               'cnv_totamt'     => $add['amt'],
               'cnv_useradd'    => $session_data['username'],
              //  'cnv_do'         => $add['porecx'],
               'cnv_vender'     => $add['venderid'],
               'cnv_system'     => $add['system'],
               'cnv_gldate'     => $add['vchdate'],
               'cnv_glyear'     => $add['glyear'],
               'cnv_glperiod'   => $add['glperiod'], 
               'cnv_vatper'     => $add['price_unit'],    
               'type'           => "apv",          
               'cnv_useradd'    => $username,
               'compcode'       => $compcode,
               'cnv_date' => date('Y-m-d'),
             );
              $this->db->insert('cnv_header', $data);

              if(is_array($add['vender_id_in'])) {
                foreach ($add['vender_id_in'] as $key => $tax_n) {
                  $data_tax_in = array(
                    'ap_code' =>  $add['cnap_no'],
                    'ref_cnv_code' => $cnvcode,
                    'ap_taxno' => $add['taxno_in'][$key],
                    'ap_taxdate' => $add['tax_date_in'][$key],
                    'project_id' => $add['projectid'],
                    'vender_id' => $add['venderid'],
                    'ap_period' => $add['glperiod'],
                    'ap_year' => $add['glyear'],
                    'ap_type' => $add['type_ap'],
                    'ap_amtvat' => $add['amtvat_in'][$key],
                    'ap_netamt' => $add['netamt_in'][$key],
                    'ap_vatper' => $add['price_unit'],
                    'ap_taxid' => $add['taxno_in'][$key],
                    'user_create' => $session_data['m_user'],
                    'date_create' => date("Y-m-d H:i:s"),
                  );
                  
                  $this->db->insert('ap_cnv_tax', $data_tax_in);
                }
              }


            for ($gl=0; $gl < count($add['ac_no']); $gl++) {
              $datag = array(
                'vchno' => $cnvcode,
                'acct_no' => $add['ac_no'][$gl],
                'amtdr' => parse_num($add['dr'][$gl]),
                'amtcr' => parse_num($add['cr'][$gl]),
                'adduser' => $username,
                'createdate' => date('Y-m-d H:i:s'),
                'vchdate' => date('Y-m-d'),
                'glyear' => $add['glyear'],
                'glperiod' => $add['glperiod'],
                'compcode' => $compcode,
                'datatype' => $add['system'],
                'projectid'    => $add['projectid'],
                'datatype' => $add['system'],
                'vendor_id' => $add['venderid'],
                'gltype' => $add['cntype'][$gl],
                'doctype' => "apv",
                'completegl' => "N"
              );
              $this->db->insert('ap_gl',$datag);
            }
                       
              if($add['ttype'] == "apv"){
                $cnvdatav = array(

                  'cnv_amt'       => $add['qty'],
                  'cnv_tovat'     => $add['pamount'],
                  'cnv_namt'      => $add['amt'],
                  'cnv_vat'       => $add['price_unit'],
                  'cn'            => 'cn',
                  'status' => "wait",
                );

                $this->db->where('apv_code',$add['cnap_no']);
                $this->db->update('apv_header',$cnvdatav);

              }elseif ($add['ttype'] == "apd") {
                $cnvdatad = array(
                  'cnv_amt'       => $add['qty'],
                  'cnv_tovat'     => $add['pamount'],
                  'cnv_namt'      => $add['amt'],
                  'cnv_vat'       => $add['price_unit'],
                  'cn'            => 'cn',
                  'status' => "wait",
                );

                $this->db->where('apd_code',$add['cnap_no']);
                $this->db->update('ap_down_header',$cnvdatad);

              }elseif ($add['ttype'] == "apr") {
                $cnvdatar = array(
                  'cnv_amt'       => $add['qty'],
                  'cnv_tovat'     => $add['pamount'],
                  'cnv_namt'      => $add['amt'],
                  'cnv_vat'       => $add['price_unit'],
                  'cn'            => 'cn',
                  'status'        => "wait",
             
                );

                $this->db->where('apr_code',$add['cnap_no']);
                $this->db->update('ap_ret_header',$cnvdatar);
              }
              
              // $base_url = $this->config->item("url_report");
              // redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_payvoucher.mrt&no=".$apvcode);
          } catch (Exception $e) {
            echo $e;
          }
        }


        public function addnewap_down()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();
          $project_code = $add['pjcode'];
          // echo '<pre>';
          // print_r($add);die();
          try {
              $amount = parse_num($add['qty']);
              $this->db->select('sumdown');
              $this->db->from('po');
              $this->db->where('po_id', $add['po_id']);
              $this->db->limit(1);
              $query = $this->db->get();
              $sumdown = $query->result()[0]->sumdown;
              $newVal = $sumdown+$amount;
              $update_po = array(
                'sumdown' => $newVal
              );

              $this->db->where('po_id', $add['po_id']);
              $this->db->update('po', $update_po);

             $data = array(
               'apd_code'       => $add['apdcode'],
               'apd_vender'     => $add['vendor_id'],
               'apd_tax_no'     => $add['tax_no'],
               'apd_term'       => $add['cterm'],
               'apd_duedate'    => $add['duedate'],
               'apd_descrip'    => $add['descri'],
               'apd_job'        => $add['jobcode'],
               'apd_dep'        => $add['depart_id'],
               'apd_project'    => $add['pre_event'],
               'apd_amount'     => parse_num($add['qty']),
               'apd_vat'        => parse_num($add['price_unit']),
               'apd_lessadv'    => parse_num($add['lessadv']),
               'apd_lessret'    => parse_num($add['lessret']),
               'apd_totalvat'   => parse_num($add['pamount']),
               'apd_wt'         => 0,
               'apd_net_amt'    => parse_num($add['amt']),
               'apd_date'       => $add['vchdate'],
               'apd_period'     => $add['glperiod'], 
               'apd_year'       => $add['glyear'],
               'apd_datatype'   => $add['datatype'],
               'apd_system'     => $add['sysid'],
               'createdate'     => date('Y-m-d H:i:s'),
               'apd_status'       => 'wait',
               'apd_type'       => 'apd',
               'cn'             => 'no',
               'gl_status'      => 'N',
               'compcode'      => $compcode,
               'status' => 'wait',
               'ref_po_id' => $add['po_id'],
               'ref_po_code' => $add['po_code'],
             );
             $this->db->insert('ap_down_header',$data);
             $id  = $this->db->insert_id();

                foreach ($add['nameve'] as $key => $value) {
                  $data_d = array(
                      'apdi_ref'      => $add['apdcode'],
                      'apdi_vendor'   => $add['nameve'][$key],
                      'apdi_amtax'    => $add['tax_de'][$key],
                      'apdi_tax'      => $add['taxiv'][$key],
                      'apdi_tiv'      => $add['branch_de'][$key],
                      'apdi_taxid'      => $add['tax_de'][$key],
                      'apdi_amount'   => $add['amtax'][$key],
                      'apdi_vat'      => $add['vattax'][$key],
                      'apdi_vatt'     => $add['amttax'][$key],
                      'apdi_cn'       => $add['cn_de'][$key],
                      'apdi_taxdate'  => $add['tdate'][$key],
                      'apdi_costcode'  => $add['costcode'][$key],
                    );

                   $this->db->insert('ap_down_detail',$data_d);
                }

              for ($gl=0; $gl < count($add['dr']); $gl++) {
                if ($add['dr'][$gl]!="") {
                $data_gl = array(
                    'vchno'         => $add['apdcode'],
                    'vchdate'       => $add['vchdate'],
                    'doctype'       => 'apd',
                    'vendor_id'     => $add['vendor_id'],
                    'duedate'       => $add['duedate'],
                    'datatype'      => $add['datatype'],
                    'acct_no'       => $add['ac_no'][$gl],
                    'projectid'     => $add['pre_event'],
                    'amtdr'         => parse_num($add['dr'][$gl]),
                    'amtcr'         => parse_num($add['cr'][$gl]),
                    'glyear'        =>  $add['glyear'],
                    'glperiod'      => $add['glperiod'],
                    'gltype'        => $add['gltype'][$gl],
                    'completegl'    => "N",
                    'adduser'       => $username,
                    'createdate'    => date('Y-m-d H:i:s'),
                    'compcode'      => $compcode,
                    'systemcode'    => $add['sysid'],
                  );
                $this->db->insert('ap_gl',$data_gl);
              }
            }
              if ($add['tax_no'] != "") {
                $datatax = array(
                'ap_code'    => $add['apdcode'],
                'ap_taxno'   => $add['tax_no'],
                // 'ap_taxdate' => $add['tdate'],
                'project_id' => $add['pre_event'],
                'vender_id'  => $add['vendor_id'],
                'ap_period'  => $add['glperiod'],
                'ap_year'    => $add['glyear'],
                'ap_type'    => 'apd',
                'ap_amount'  => $add['qty'],
                'ap_vatper'     => $add['price_unit'],
                'ap_amtvat'     => $add['pamount'],
                'ap_netamt'  => $add['amt'],
                // 'ap_taxid'   => $add['branch_de'],
                );
                $this->db->insert('ap_tax',$datatax);
              }



          } catch (Exception $e) {
            echo $e;
          }
          
          $base_url = $this->config->item("url_report");
          // redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=apd_payvoucher.mrt&no=".$add['apdcode']);
        }

        public function addnewap_reten()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();
          $project_code = $add['pjcode'];

          // echo '<pre>';
          // print_r($add);die();
          try {
             $data = array(
               'apr_code'       => $add['aprcode'],
               'apr_vender'     => $add['vendor_id'],
               'apr_tax_no'     => $add['tax_no'],
               'apr_term'       => $add['cterm'],
               'apr_duedate'    => $add['duedate'],
              //  'apr_descrip'    => $add['descri'],
              //  'apr_job'        => $add['job'],
               'apr_dep'        => $add['depart_id'],
               'apr_project'    => $add['pre_event'],
               'apr_amount'     => $add['qty'],
               'apr_vat'        => $add['price_unit'],
               'apr_lessret'    => $add['lessret'],
               'apr_lessadv'    => $add['lessadv'],
               'apr_totalvat'   => $add['pamount'],
               'apr_net_amt'    => $add['amt'],
               'apr_date'       => $add['vchdate'],
               'apr_period'     => $add['glperiod'], 
               'apr_year'       => $add['glyear'],
               'apr_system'     => $add['sysid'],
               'apr_datatype'   => $add['datatype'],
               'apr_status'     => 'wait',
               'createdate'     => date('Y-m-d H:i:s'),
               'apr_type'       => 'apr',
               'cn'             => 'no',
               'gl_status'      => 'N',
               'compcode'       => $compcode,
               'status'         => 'wait',
               'po_id'         => $add['po_id'],
               'po_code'         => $add['po_code'],
             );
             $this->db->insert('ap_ret_header',$data);
             $id  = $this->db->insert_id();

             //update po
             $update_po = array(
               'sumretention' => $add['qty']
             );
             $this->db->where('po_id', $add['po_id']);
             $this->db->update('po', $update_po);
             //update po

             foreach ($add['nameve'] as $key => $value) {
              $data_d = array(
                  'apri_ref'      => $add['aprcode'],
                  'apri_vendor'   => $add['nameve'][$key],
                  // 'apri_amtax'    => $add['tax_de'][$key],
                  'apri_tax'      => $add['branch_de'][$key],
                  'apri_tiv'      => $add['taxiv'][$key],
                  'apri_amount'   => $add['amtax'][$key],
                  'apri_vat'      => $add['vattax'][$key],
                  'apri_vatt'     => $add['amttax'][$key],
                  // 'apri_cn'       => $add['cn_de'][$key],
                  'apri_taxdate'  => $add['tdate'][$key],
                );
              $this->db->insert('ap_ret_detail',$data_d);

             }

             foreach ($add['dr'] as $key => $value) {
               $data_gl = array(
                   'vchno'       => $add['aprcode'],
                   'gltype'      => $add['gltype'][$key],
                   'vchdate'     => $add['vchdate'],
                   'doctype'     => 'apr',
                   'vendor_id'   => $add['vendor_id'],
                   'duedate'     => $add['duedate'],
                   'datatype'    => $add['datatype'],
                   'acct_no'     => $add['ac_no'][$key],
                   'projectid'   => $add['pre_event'],
                   'amtdr'       => $add['dr'][$key],
                   'amtcr'       => $add['cr'][$key],
                   'glyear'      => $add['glyear'],
                   'glperiod'    => $add['glperiod'],
                   'completegl'  => "N",
                   'adduser'     => $username,
                   'createdate'  => date('Y-m-d H:i:s',now()),
                   'compcode'    => $compcode,
                 );
               $this->db->insert('ap_gl',$data_gl);
             }

              // foreach ($add['taxiv'] as $key => $value) {
              //   $datatax = array(
              //     'ap_code'    => $add['aprcode'],
              //     'ap_taxno'   => $add['taxiv'][$key],
              //     'ap_taxdate' => $add['tdate'][$key],
              //     'project_id' => $add['pre_event'],
              //     'vender_id'  => $add['vendor_id'],
              //     'ap_period'  => $add['glperiod'],
              //     'ap_year'    => $add['glyear'],
              //     'ap_type'    => 'apr',
              //     'ap_amount'  => $add['amtax'][$key],
              //     'ap_vatper'  => $add['vattax'][$key],
              //     'ap_amtvat'  => $add['amttax'][$key],
              //     'ap_netamt'  => $add['amt'],
              //     'ap_taxid'   => $add['apvtaxno'],
              //   );
              //   $this->db->insert('ap_tax',$datatax);
              // }
          
          } catch (Exception $e) {
            echo $e;
          }
          // $base_url = $this->config->item("url_report");
          // redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=apr_payvoucher.mrt&no=".$aprcode);
        }


       public function editnewap()
        {
        }

        public function approve_paid_apv()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();

          try {
            $datestring = "Y";
             $mm = "m";
             $dd = "d";

             $this->db->select('*');
             $qu = $this->db->get('pv_apo_header');
             $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

             if ($res==0) {
               $doccode = "PV".date($datestring).date($mm)."000"."1";
               $apono ="1";
             }else{
               $this->db->select('*');
               $this->db->order_by('apo_no','desc');
               $this->db->limit('1');
               $q = $this->db->get('pv_apo_header');
               $run = $q->result();
               foreach ($run as $valx)
               {
                 $x1 = $valx->apo_id+1;
               }
              //  $apocode = "PV".date($datestring).date($mm).date($dd).$x1;
              //  $apono=$x1;
               if ($x1<=9) {
                  $doccode = "PV".date($datestring).date($mm)."000".$x1;
                  $apono=$x1;
               }
               elseif ($x1<=99) {
                 $doccode = "PV".date($datestring).date($mm)."00".$x1;
                 $apono=$x1;
               }
               elseif ($x1<=999) {
                 $doccode = "PV".date($datestring).date($mm)."0".$x1;
                 $apono=$x1;
               }
             }

             $data = array(
               'apo_code' => $doccode,
               'apo_no' => $apono,
               'apo_vender' => $add['vcode'],
               'apo_project'=> $add['projectid'],
               'apo_system' => $add['aposystem'],
               'apo_department' => $add['departmenttid'],
               'apo_date' => $add['apodate'],
               'apo_doctype' => 'apv',
               'apo_bankcode' => $add['bankid'],
               'apo_branchcode' => $add['branchid'],
               'apo_bankaccount' => $add['acid'],
               'apo_remark' => $add['remark'],
               'apo_useradd' => $username,
               'apo_createdate' => date('Y-m-d H:i:s',now()),
               'compcode' => $compcode,
             );
             $this->db->insert('pv_apo_header',$data);

             for ($i=0; $i < count($add['chki']); $i++) {
               if ($add['chki'][$i]!="") {
                 $data_d = array(
                   'doci_ref' => $doccode,
                   'doci_apcvcode' => $add['apvcodei'][$i],
                   'doci_pono' => $add['ponoi'][$i],
                   'doci_date' => $add['datei'][$i],
                   'doci_netamt' => $add['netamti'][$i],
                   'doci_chk' => "Y",
                   'compcode' => $compcode,
                   'useradd' => $username,
                   'createdate'=> date('Y-m-d H:i:s',now()),
                 );
                 $this->db->insert('pv_apo_detail',$data_d);
                 $up_d = array(
                   'apv_status' => "approve"
                 );
                 $this->db->where('apv_code',$add['apvcodei'][$i]);
                 $this->db->update('apv_header',$up_d);
               }
               else{

               }
             }
             redirect('ap/edit_approvr_apv/'.$add['vcode'].'/'.$doccode);
          } catch (Exception $e) {

          }
        }

        // apo
        public function new_apo()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();
          try {
            $datestring = "Y";
             $mm = "m";
             $dd = "d";

             $this->db->select('*');
             $qu = $this->db->get('pv_apo_header');
             $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

             if ($res==0) {
               $apocode = "PV".date($datestring).date($mm)."000"."1";
               $apono ="1";
             }else{
               $this->db->select('*');
               $this->db->order_by('apo_no','desc');
               $this->db->limit('1');
               $q = $this->db->get('pv_apo_header');
               $run = $q->result();
               foreach ($run as $valx)
               {
                 $x1 = $valx->apo_id+1;
               }
              //  $apocode = "PV".date($datestring).date($mm).date($dd).$x1;
              //  $apono=$x1;
               if ($x1<=9) {
                  $apocode = "PV".date($datestring).date($mm)."000".$x1;
                  $apono=$x1;
               }
               elseif ($x1<=99) {
                 $apocode = "PV".date($datestring).date($mm)."00".$x1;
                 $apono=$x1;
               }
               elseif ($x1<=999) {
                 $apocode = "PV".date($datestring).date($mm)."0".$x1;
                 $apono=$x1;
               }

             }

            $data = array(
              'apo_code' => $apocode,
              'apo_no' => $apono,
              'apo_member' => $add['memid'],
              'apo_type' => $add['apotype'],
              'apo_project' => $add['projectid'],
              'apo_system' => $add['aposystem'],
              'apo_date' => $add['apodate'],
              'apo_department' => $add['departmenttid'],
              'apo_doctype' => "pc",
              'apo_remark' => $add['remarkapo'],
              'apo_useradd' => $username,
              'apo_createdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode,
            );
            $this->db->insert('pv_apo_header',$data);
            $id  = $this->db->insert_id();

            for ($i=0; $i < count($add['chki']); $i++) {
              if ($add['chki'][$i]!="") {
                $data_d = array(
                  'doci_ref' => $apocode,
                  'doci_pcno' => $add['docnoi'][$i],
                  'doci_date' => $add['apodate'],
                  'doci_member' => $add['memberi'][$i],
                  'doci_remark' => $add['remarki'][$i],
                  'doci_netamt' => $add['docnetamti'][$i],
                  'doci_chk' => $add['chki'][$i],
                  'compcode' => $compcode,
                  'useradd' => $username,
                  'createdate' => date('Y-m-d H:i:s',now()),
                );
                $this->db->insert('pv_apo_detail',$data_d);
                $data_upd = array(
                  'status' => "paid",
                );
                $this->db->where('docno',$add['docnoi'][$i]);
                $this->db->update('pettycash',$data_upd);
              }
              else{

              }
            }
             redirect('ap/edit_pv_other/'.$apocode);
          } catch (Exception $e) {
            echo $e;
          }
        }

        public function edit_pvpc_h()
        {
          try {
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $pvcode = $this->input->post('apono');
            $data = array(
              'apo_date' => $this->input->post('apodate'),
              'apo_type' => $this->input->post('apotype'),
              'apo_system' => $this->input->post('aposystem'),
              'apo_date' => $this->input->post('apodate'),
              'apo_remark' => $this->input->post('remarkapo'),
              'apo_useredit' => $username,
              'apo_editdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode,
            );
            $this->db->where('apo_code',$pvcode);
            if($this->db->update('pv_apo_header',$data))
            {
              redirect('ap/edit_pv_other/'.$pvcode);
            }else{
              echo "error";
            }

          } catch (Exception $e) {
            echo $e;
          }
        }
        public function editpvodetail()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $ref = $this->input->post('ref');
          $pcno = $this->input->post('pcno');
          $mid = $this->input->post('mid');
          $rem = $this->input->post('rem');
          $netamt  = $this->input->post('netamt');
          $date = $this->input->post('date');
          $data = array(
            'doci_ref' => $ref,
            'doci_pcno' => $pcno,
            'doci_member' => $mid,
            'doci_remark' => $rem,
            'doci_netamt' => $netamt,
            'doci_date' => $date,
            'doci_chk' => "Y",
            'compcode' => $compcode,
            'useredit' => $username,
            'editdate' => date('Y-m-d H:i:s',now()),
          );
          $this->db->insert('pv_apo_detail',$data);
          $data_upd = array(
            'status' => "paid",
          );
          $this->db->where('docno',$pcno);
          $this->db->update('pettycash',$data_upd);
          echo $ref;
          return true;
        }
        public function editpvvdetail()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $ref = $this->input->post('ref');
          $apvcode = $this->input->post('apvcode');
          $pono = $this->input->post('pono');
          $netamt  = $this->input->post('netamt');
          $date = $this->input->post('date');
          $data = array(
            'doci_ref' => $ref,
            'doci_apcvcode' => $apvcode,
            'doci_pono' => $pono,
            'doci_netamt' => $netamt,
            'doci_date' => $date,
            'doci_chk' => "Y",
            'compcode' => $compcode,
            'useredit' => $username,
            'editdate' => date('Y-m-d H:i:s',now()),
          );
          $this->db->insert('pv_apo_detail',$data);
          $data_upd = array(
            'apv_status' => "approve",
          );
          $this->db->where('apv_code',$apvcode);
          $this->db->update('apv_header',$data_upd);
          echo $ref;
          return true;
        }
        public function delpvodetail()
        {
          $pcno = $this->input->post('ref');
          $this->db->delete('pv_apo_detail', array('doci_pcno' => $pcno));

          $data = array(
            'status' => null,
          );
          $this->db->where('docno',$pcno);
          $this->db->update('pettycash',$data);
          echo $pcno;
          return true;
        }
        public function delpvvdetail()
        {
          $apvcode = $this->input->post('ref');
          $this->db->delete('pv_apo_detail', array('doci_apcvcode' => $apvcode));

          $data = array(
            'apv_status' => "wait",
          );
          $this->db->where('apv_code',$apvcode);
          $this->db->update('apv_header',$data);
          echo $apvcode;
          return true;
        }
        public function approve_paid_apo()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();

          try {
            $datestring = "Y";
             $mm = "m";
             $dd = "d";

             $this->db->select('*');
             $qu = $this->db->get('approve_apo_header');
             $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

             if ($res==0) {
               $doccode = date($datestring).date($mm).date($dd)."1";
             }else{
               $this->db->select('*');
               $this->db->order_by('doc_id','desc');
               $this->db->limit('1');
               $q = $this->db->get('approve_apo_header');
               $run = $q->result();
               foreach ($run as $valx)
               {
                 $x1 = $valx->doc_id+1;
               }
               $doccode = date($datestring).date($mm).date($dd).$x1;
             }

             $data = array(
               'doc_code' => $doccode,
               'doc_vendercode' => $add['vcode'],
               'doc_bankcode' => $add['bankid'],
               'doc_branchcode' => $add['branchid'],
               'doc_bankaccount' => $add['acid'],
               'doc_remark' => $add['remark'],
               'doc_useradd' => $username,
               'doc_createdate' => date('Y-m-d H:i:s',now()),
               'compcode' => $compcode,
             );
             $this->db->insert('approve_apo_header',$data);

             for ($i=0; $i < count($add['chki']); $i++) {
               if ($add['chki'][$i]!="") {
                 $data_d = array(
                   'doci_ref' => $doccode,
                   'doci_apvcode' => $add['apocodei'][$i],
                   'doci_pono' => $add['prrefi'][$i],
                 );
                 $this->db->insert('approve_apo_detail',$data_d);
                 $up_d = array(
                   'apo_status' => "approve"
                 );
                 $this->db->where('apo_code',$add['apocodei'][$i]);
                 $this->db->update('apo_header',$up_d);
               }
               else{

               }

             }
             redirect('ap/apo_approve');
          } catch (Exception $e) {

          }
        }
        // /apo


        public function load_option()
        {
            $this->load->model('cheque_m');
            $data['loadoption'] = $this->cheque_m->option();
            $this->load->view('office/account/ap/cheque/load_option_v',$data);
        }

        public function load_optiontable()
        {
            $ref = $this->uri->segment(3);
            $this->load->model('cheque_m');
            $data['loadtable'] = $this->cheque_m->table_option($ref);
            $this->load->view('office/account/ap/cheque/load_option_table_v',$data);
        }

        public function insertoption()
        {
          $ref = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();

            $datestring = "Y";
             $mm = "m";
             $dd = "d";

             $this->db->select('*');
             $qu = $this->db->get('ap_pay_header');
             $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

             if ($res==0) {
                $jvcode = "PV".date($datestring).date($mm)."000"."1";
                $payno ="1";
             }else{
               $this->db->select('*');
               $this->db->order_by('payno','desc');
               $this->db->limit('1');
               $q = $this->db->get('ap_pay_header');
               $run = $q->result();
               foreach ($run as $valx)
               {
                 $x1 = $valx->payno+1;
               }

               if ($x1<=9) {
                  $jvcode = "PV".date($datestring).date($mm)."000".$x1;
                  $payno = $x1;
               }
               elseif ($x1<=99) {
                 $jvcode = "PV".date($datestring).date($mm)."00".$x1;
                 $payno = $x1;
               }
               elseif ($x1<=999) {
                 $jvcode = "PV".date($datestring).date($mm)."0".$x1;
                 $payno = $x1;
               }
             }
          $add = $this->input->post();
            for ($i=0; $i < count($add['optt']); $i++) {
                if($add['optt']=="Y"){
                 $data = array(
                   'runno' => $jvcode,
                   'payno' => $payno,
                   'option_code' => $add['option_code'],
                   'refno' => $add['refno'],
                   'rdfdate' => $add['rdfdate'],
                   'plno' => $add['apo_code'],
                   'acct_no' => $add['acct_no'],
                   'current_c' => $add['current_c'],
                   'exchange' => $add['exchange'],
                   'remark' => $add['apo_remark'],
                   'totpaynet' => $add['totpaynet'],
                   'bank_id' => $add['bank_id'],
                   'branch_id' => $add['branch_id'],
                   'account_code' => $add['apo_bankaccount'],
                   'paytype' => $add['paytype'],
                   'chqno' => $add['chqno'],
                   'chqdate' => $add['chqdate'],
                   'payactive' => $add['payactives'],
                   'chqpay' => $add['chqpays'],
                   'chq_cross' => $add['chq_crosss'],
                   'namechq' => $add['namechq'],
                   'vchno' => $add['vchno'],
                   'vchdate' => $add['vchdate'],
                   'maincode' => $compcode,
                 );

                 $this->db->insert('ap_pay_header',$data);
              }

              else{
                  $data2 = array(
                   'option_code' => $add['option_code'],
                   'refno' => $add['refno'],
                   'rdfdate' => $add['rdfdate'],
                   'current_c' => $add['current_c'],
                   'exchange' => $add['exchange'],
                   'remark' => $add['apo_remark'],
                   'paytype' => $add['paytype'],
                   'chqno' => $add['chqno'],
                   'chqdate' => $add['chqdate'],
                   'payactive' => $add['payactives'],
                   'chqpay' => $add['chqpays'],
                   'chq_cross' => $add['chq_crosss'],
                   'namechq' => $add['namechq'],
                   'vchno' => $add['vchno'],
                   'chqdate' => $add['chqdate'],
                 );
                $this->db->where('runno',$add['irunno']);
                $this->db->update('ap_pay_header',$data2);
              }
            }

            for ($i=0; $i < count($add['opt']); $i++) {
                    if($add['opt'][$i]=="Y"){
                      if($add['opt']=="Y"){
                        $optinsert = $pvcode;
                      }else{
                        $optinsert = $add['runno'];
                      }

                     $data_d = array(
                       'runno' => $jvcode,
                       'apvno' => $add['doci_refi'][$i],
                       'payamt' => $add['doci_netamt'][$i],
                       'paynet' => $add['paynet'],
                       'maincode' => $compcode,
                     );
                  $this->db->insert('ap_pay_detail',$data_d);

                  $up_pv = array(
                     'chq_status' => "Y"
                   );
                   $this->db->where('apo_vender',$add['ivender']);
                   $this->db->update('pv_apo_header',$up_pv);

                  }
                  else{
                    $data_3 = array(
                       'payamt' => $add['payamt1'][$i],
                       'payvat' => $add['payamt2'][$i],
                       'paynet' => $add['paynet'],
                     );

                    $this->db->where('runno',$add['irunno']);
                $this->db->update('ap_pay_detail',$data_3);
                  }

            }
            redirect('ap_cheque/printcheque/'.$add['irunno']);
        }

        public function load_archive()
        {
            $this->load->model('cheque_m');
            $data['archive'] = $this->cheque_m->archive_m();
            $this->load->view('office/account/ap/cheque/load_archive_v',$data);
        }
        public function load_archivetable()
        {
            $ref = $this->uri->segment(3);
            $this->load->model('cheque_m');
            $data['arctable'] = $this->cheque_m->table_arvhive($ref);
            $this->load->view('office/account/ap/cheque/load_arc_table_v',$data);
        }

        public function load_printcheque()
        {
            $ref = $this->uri->segment(3);
            $this->load->model('cheque_m');
            $data['cheque'] = $this->cheque_m->printcheque($ref);
            $this->load->view('office/account/ap/cheque/print_cheque',$data);
        }


      public function addnewap_bill()
      {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();
          // echo '<pre>';
          // print_r($add);
          // die();


            $datestring = "Y";
            $mm = "m";
            $dd = "d";

            $this->db->select('*');
            $qu = $this->db->get('aps_header');
            $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
            $code_aps_run = 'APS'.date('Ym').sprintf('%03d', $res+1);

          try {
              $data = array(
                'aps_code'        => $code_aps_run,
                // 'aps_lono'        => $add['loino'],
                'aps_period'      => $add['glperiod'],
                'aps_year'        => $add['glyear'],
                // 'aps_contact'     => $add['subcon'],
                'aps_invno'       => $add['taxno'],
                'aps_project'     => $add['projid'],
                'aps_billno'      => $add['billno'],
                'aps_vender'      => $add['vendercode'],
                'aps_datatype'    => $add['datatype'],
                'aps_deduct'      => $add['ladv'],
                'aps_invdate'     => $add['taxdate'],
                'aps_amount'      => $add['amt'],
                'aps_duedate'     => $add['duedate'],
                'aps_vatper'      => $add['vat'],
                'aps_vattot'      => $add['invamt'],
                'aps_wt'          => $add['ap_wt'],
                'aps_wttot'       => $add['wtamt'],
                'aps_wtper'       => $add['ap_wtper'],
                'aps_retention'   => $add['reten'],
                'aps_netamt'      => $add['netamt'],
                'aps_totnetamt'      => $add['netamt'],
                // 'aps_totnetamt'   => $add['netamteh'],
                'aps_remark'      => $add['remark'],
                'aps_system'      => $add['system'],
                'aps_crterm'      => $add['crterm'],
                'ap_date'         => $add['vchdate'],
                // 'aps_wtcode'      => $add['apswt'],
                // 'aps_billtype'    => $add['type'],
                // 'aps_billperiod'  => $add['period'],
                'aps_lessother'   => $add['lessother'],
                'adduser'         => $username,
                'aps_type'        => 'aps',
                'gl_status'       => 'N',
                'cn' => 'no',
                'createdate'      => date('Y-m-d H:i:s',now()),
                'compcode'        => $compcode,
                'status'          => "wait",
                );
              $this->db->insert('aps_header', $data);
          // print_r($data);
          // add detail
          foreach ($add['aps_qty'] as $key => $value) {
            $data_detail = array(
              'apsi_ref'      => $code_aps_run,
              'apsi_matcode'  => $add['aps_mc'][$key],
              'apsi_costcode' => $add['aps_cc'][$key],
              'apsi_qty'      => $add['aps_qty'][$key],
              'apsi_taxno'    => $add['taxiv'][$key],
              'apsi_amount'   => $add['aps_amount'][$key],
              'sub_costcode'  => $add['sub_cost'][$key],
              'adduser'       => $username,
              'status_de'     => "A",
              'createdate'    => date('Y-m-d H:i:s',now()),
              'compcode'      => $compcode
            );
          $this->db->insert('aps_detail', $data_detail);  
          }

          // print_r($data_detail);
          // print_r($add['aps_mc']);
          // echo 'ap_gl';
          foreach ($add['dr'] as $key => $value) {
            $data_c = array(
              'vchno'=> $code_aps_run,
              'doctype' => 'aps',
              'systemcode'=> $add['system'],
              'vchdate' => $add['vchdate'],
              'duedate' => $add['duedate'],
              'acct_no' => $add['aps_paccost'][$key],
              'projectid' => $add['projid'],
              'vendor_id' => $add['vendercode'],
              'amtdr' => $add['dr'][$key],
              'amtcr' => $add['cr'][$key],
              'glyear' => date('Y'),
              'glperiod' => date('m'),
              'completegl' => 'N',
              'gltype' => $add['gltype'][$key],
              'costcode' => $add['aps_cc'][$key],
              // 'matcode' => $add['aps_mc'][$key],       
              'adduser' => $username,
              'createdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode
            );
            $this->db->insert('ap_gl', $data_c);
          }
          // print_r($data_c);
          // echo 'ap_gl';
          
          $project_code = $this->get_procode($add['projid']);
          
          // print_r($data_ar);
          
          $data_b = array(
            'ap_status' =>'open'
          );
          $this->db->where('ap_bill_id', $add['bill_id']);
          $this->db->update('ap_billsuc_header',$data_b);
          
          // if ($add['taxiv'] != "") {
            foreach ($add['taxiv'] as $key => $value) {
              $datatax = array(
                'ap_code'    => $code_aps_run,
                'ap_taxno'   => $add['taxiv'][$key],
                'ap_taxdate' => $add['taxdate_tax'][$key],
                'project_id' => $add['projid'],
                'vender_id'  => $add['vendercode'],
                'ap_period'  => $add['glperiod'],
                'ap_year'    => $add['glyear'],
                'ap_type'    => 'aps',
                'ap_amount'  => $add['amt'],
                'ap_vatper'  => $add['vat'],
                'ap_amtvat'  => $add['amt_tax'][$key],
                'ap_netamt'  => $add['vatamt_tax'][$key],
                'ap_taxid'   => $add['taxid'][$key],
              );
              $this->db->insert('ap_tax',$datatax);
            }
          // }
          
          // print_r($datatax);
          // die();
          

            // $base_url = $this->config->item("url_report");
            // redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=aps_payvoucher.mrt&no=".$code_aps_run);
              
             // /test
        } catch (Exception $e) {
            echo $e;
        }
      }
      public function editaps()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $apscode = $this->input->post('apsno');
          $add = $this->input->post();
          try {
           
             // add headeer
              $data = array(
                'aps_date' => $add['apsdate'],
                // 'aps_project' => $add['projid'],
                // 'aps_department' => $add['depid'],
                'aps_system' => $add['apssystem'],
                'aps_invno' => $add['taxno'],
                'aps_invdate' => $add['taxdate'],
                'aps_amount' => $add['amth'],
                'aps_vatper' => $add['vat'],
                'aps_vattot' => $add['invamth'],
                'aps_wt' => $add['wt'],
                'aps_wttot' => $add['wtamt'],
                'aps_retention' => $add['retenrion'],
                'aps_netamt' => $add['netamth'],
                'aps_totnetamt' => $add['netamteh'],
                'aps_remark' => $add['remark'],
                'adduser' => $username,
                'createdate' => date('Y-m-d H:i:s',now()),
                'compcode' => $compcode
                );
              $this->db->where('aps_code',$apscode);
              $this->db->update('aps_header',$data);
              $apsiid = $this->input->post('apsiid');

              for ($i=0; $i < count($add['qtyi']); $i++) {
                if($add['chki'][$i]=="I"){
                $data_d = array(
                  'apsi_matcode' => $add['matidi'][$i],
                  'apsi_matname' => $add['matnamei'][$i],
                  'apsi_costcode' => $add['costidi'][$i],
                  'apsi_costname' => $add['costnamei'][$i],
                  'apsi_qty' => $add['qtyi'][$i],
                  'apsi_unit' => $add['uniti'][$i],
                  'apsi_amount' => $add['amounti'][$i],
                  'adduser' => $username,
                  'createdate' => date('Y-m-d H:i:s',now()),
                  );
                $this->db->where('apsi_id',$apsiid[$i]);
                $this->db->update('aps_detail',$data_d);
              }            

              for ($i=0; $i < count($add['accno_gl']); $i++) {
                $data_c = array(
                  'vchno'=> $apscode,
                  'vchdate' => $add['apsdate'],
                  'doctype' => $aps,
                  'acct_no' => $add['accno_gl'][$i],
                  'projectid' => $add['projid'],
                  'systemcode' => $add['apssystem'],
                  'amtdr' => $add['dr_gl'][$i],
                  'amtcr' => $add['cr_gl'][$i],
                  'vatper' => $add['vat'],
                  'vatamt' => $add['invamt'],
                  'glyear' => date('Y'),
                  'glperiod' => date('m'),
                  'completegl' => 'N',
                  'costcode' => $add['costidi_gl'][$i],
                  'matcode' => $add['matidi_gl'][$i],
                  'matname' => $add['matnamei_gl'][$i],         
                  'adduser' => $username,
                  'createdate' => date('Y-m-d H:i:s',now()),
                  'compcode' => $compcode
                  );
                $this->db->where('id_apgl',$add['id_apgl'][$i]);
                $this->db->update('ap_gl',$data_c);
              }
            }
          
              redirect('ap/edit_aps/'.$apscode."/".$add['loino']."/".$add['period']);
              
             // /test
        } catch (Exception $e) {
             echo $e;
        }
      }
      
      public function upapv(){
        $apv_due = $this->input->post('apv_due');
        $apv_in = $this->input->post('apv_in');
        $apv_cr = $this->input->post('apv_cr');
        $apv_code = $this->input->post('apv_code');
        $datt = array(
            'apv_duedate' => $apv_due,
            'apv_inv' => $apv_in,
            'apv_crterm' => $apv_cr
            );
           $this->db->where('apv_code',$apv_code);
           $this->db->update('apv_header',$datt);
           echo $apv_code;
        return true;
       }

       public function upaps(){
        $aps_due = $this->input->post('aps_due');
        $aps_in = $this->input->post('aps_in');
        $aps_code = $this->input->post('aps_code');
        $date = array(
            'aps_duedate' => $aps_due,
            'aps_invno' => $aps_in,
            );
           $this->db->where('aps_code',$aps_code);
           $this->db->update('aps_header',$date);
           echo $aps_code;
        return true;
       }

      public function upapo(){
        $apo_docdate = $this->input->post('apo_docdate');
        $apo_tax = $this->input->post('apo_tax');
        $ap_no = $this->input->post('ap_no');
        $data = array(
            'ex_taxno' => $apo_tax,
            );
           $this->db->where('ex_ref',$ap_no);
           $this->db->update('ap_pettycash_expense',$data);

        $dat = array(
            'doc_date' => $apo_docdate,
            );
           $this->db->where('ap_no',$ap_no);
           $this->db->update('ap_pettycash_header',$dat);
           echo $ap_no;
        return true;
       }

       public function upapd(){
        $apd_in = $this->input->post('apd_in');
        $apd_due = $this->input->post('apd_due');
        $apd_cr = $this->input->post('apd_cr');
        $apd_code = $this->input->post('apd_code');
        $data = array(
            'apd_tax_no' => $apd_in,
            'apd_duedate' => $apd_due,
            'apd_term' => $apd_cr,
            );
           $this->db->where('apd_code',$apd_code);
           $this->db->update('ap_down_header',$data);
           echo $apd_code;
        return true;
       }

       public function upapr(){
        $apr_in = $this->input->post('apr_in');
        $apr_due = $this->input->post('apr_due');
        $apr_cr = $this->input->post('apr_cr');
        $apr_code = $this->input->post('apr_code');
        $data = array(
            'apr_tax_no' => $apr_in,
            'apr_duedate' => $apr_due,
            'apr_term' => $apr_cr,
            );
           $this->db->where('apr_code',$apr_code);
           $this->db->update('ap_ret_header',$data);
           echo $apr_code;
        return true;
       }

    public function ap_clear()
    {
      $vender = $this->uri->segment(3);
        $datav = array(
          'apv_status' => "wait"
          );
        $this->db->where('apv_status',"waitt");
        $this->db->update('apv_header',$datav);

        $datas = array(
          'aps_status' => "wait"
          );
        $this->db->where('aps_status',"waitt");
        $this->db->update('aps_header',$datas);

        $datad = array(
          'apd_status' => "wait"
          );
        $this->db->where('apd_status',"waitt");
        $this->db->update('ap_down_header',$datad);

        $datar = array(
          'apr_status' => "wait"
          );
        $this->db->where('apr_status',"waitt");
        $this->db->update('ap_ret_header',$datar);

        $datap = array(
          'ap_status' => "wait"
          );
        $this->db->where('ap_status',"waitt");
        $this->db->update('ap_pettycash_header',$datap);

        $datanv = array(
          'cnv_status' => "wait"
          );
        $this->db->where('cnv_status',"waitt");
        $this->db->update('cnv_header',$datanv);

        $datacns = array(
          'cns_status' => "wait"
          );
        $this->db->where('cns_status',"waitt");
        $this->db->update('cns_header',$datacns);

        $datacno = array(
          'cno_status' => "wait"
          );
        $this->db->where('cno_status',"waitt");
        $this->db->update('cno_header',$datacno);

        // $apo_de = array(
        //   'status_de' => "A"
        //   );
        // $this->db->where('status_de',"N");
        // $this->db->update('ap_pettycash_expense',$apo_de);

      return true;
    }

     public function query_apv()
    {      
        $datav = array(
          'ap_status' => "n"
          );
        $this->db->where('ap_status',"y");
        $this->db->update('receive_po',$datav); 
      return true;
    }

    public function update_approve()
    {
    $code = $this->input->post('code');
    $type = $this->input->post('type');

      if ($type == "apv") {
          $dataapv = array(
          'apv_status' => "waitt"
          );
         $this->db->where('apv_code',$code);
         $this->db->update('apv_header',$dataapv);

      }elseif ($type == "aps") {
        $dataaps = array(
          'aps_status' => "waitt"
          );
         $this->db->where('aps_code',$code);
         $this->db->update('aps_header',$dataaps);

      }elseif ($type == "apd") {
        $dataapd = array(
          'apd_status' => "waitt"
          );
         $this->db->where('apd_code',$code);
         $this->db->update('ap_down_header',$dataapd);

      }elseif ($type == "apr") {
        $dataapr = array(
          'apr_status' => "waitt"
          );
         $this->db->where('apr_code',$code);
         $this->db->update('ap_ret_header',$dataapr);

      }elseif ($type == "apo") {
        $dataapp = array(
          'ap_status' => "waitt"
          );
         $this->db->where('ap_no',$code);
         $this->db->update('ap_pettycash_header',$dataapp);

      }elseif ($type == "cnv") {
        $datacnv = array(
          'cnv_status' => "waitt"
          );
         $this->db->where('cnv_code',$code);
         $this->db->update('cnv_header',$datacnv);

      }elseif ($type == "cns") {
        $datacns = array(
          'cns_status' => "waitt"
          );
         $this->db->where('cns_code',$code);
         $this->db->update('cns_header',$datacns);
      }elseif ($type == "cno") {
        $datacno = array(
          'cno_status' => "waitt"
          );
         $this->db->where('cno_code',$code);
         $this->db->update('cno_header',$datacno);
      }

         return true;
    }

    public function apv_po()
    {
      $code = $this->input->post('code');
      $status = $this->input->post('status');

      $dataapv = array(          
        'ap_status' => $status
        );

       $this->db->where('po_pono',$code); 
       if($this->db->update('receive_po',$dataapv)){
          echo "true";
       }else{
          echo "false";
       }
       ;  
      
    }

    public function query_apapprove()
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
        $code = $this->input->post('code');
        $type = $this->input->post('type');
        if ($code) {
          if ($type == "apv") {
            $toamt = 0 ; $apv = $this->db->query("SELECT apv_header.*, bank.bank_name, bank_branch.branch_name from apv_header INNER JOIN bank on bank.bank_code = apv_header.bank_code INNER JOIN bank_branch ON bank_branch.branch_code = apv_header.branch_code where apv_header.apv_code = '$code' and apv_header.compcode='$compcode' group by apv_header.apv_code ")->result();
            foreach ($apv as $v) {               
              echo '<tr >'.
                  '<td>'.
                  '<input type="hidden" name="id_update[]" value="'.$v->apv_id.'" >'.
                  '<input type="hidden" value="I" name="qtyi[]" ><input type="hidden" value="'.$type.'" name="ap_type[]" ><input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$v->apv_code.'" id="ap_code'.$v->apv_code.'" name="ap_code[]">'.
                  '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$v->apv_vat.'" id="ap_vatt'.$v->apv_code.'" name="ap_vat[]">'.
                  '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="" id="ap_wtt'.$v->apv_code.'" name="ap_wt[]">'.
                  '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$v->apv_project.'" id="ap_project'.$v->apv_code.'" name="ap_project[]">'.
                  '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$v->apv_system.'" id="ap_system'.$v->apv_code.'" name="ap_system[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$v->apv_duedate.'" id="ap_duedate'.$v->apv_code.'" name="ap_duedate[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$v->apv_pono.'" id="ap_pono'.$v->apv_code.'" name="ap_pono[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$v->apv_inv.'" id="ap_inv'.$v->apv_code.'" name="ap_inv[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$v->apv_totamt.'" id="ap_amt1'.$v->apv_code.'" name="ap_amt1[]">'.                  
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_less'.$v->apv_code.'" name="ap_less[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$v->apv_netamt.'" id="ap_netamt1'.$v->apv_code.'" name="ap_netamt1[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_adv'.$v->apv_code.'" name="ap_adv[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$v->apv_vat.'" id="ap_vat1'.$v->apv_code.'" name="ap_vatamt1[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_wt1'.$v->apv_code.'" name="ap_wt1[]">'.
                  '</td>';
                  $toamt = $toamt+$v->apv_netamt;  
           }
            echo '</tr>';
            echo  '<script>'.
            'var tot = parseFloat($("#tot").val());'.
            'var tov = parseFloat($("#tov").val());'.
            'var toa = parseFloat($("#toa").val());'.
            'var toadv = parseFloat($("#toadv").val());'.
            'var tow = parseFloat($("#tow").val());'.
            'var total = parseFloat($("#ap_netamt1'.$v->apv_code.'").val());'.
            'var tovat = parseFloat($("#ap_vat1'.$v->apv_code.'").val());'.
            'var toamt = parseFloat($("#ap_amt1'.$v->apv_code.'").val());'.
            'var toadvv = parseFloat($("#ap_adv'.$v->apv_code.'").val());'.
            'var towt = parseFloat($("#ap_wt1'.$v->apv_code.'").val());'.
            'var tt = total+tot;'.
            'var ta = toamt+toa;'.
            'var tv = tovat+tov;'.
            'var tw = towt+tow;'.
            'var tadv = toadvv+toadv;'.
            '$("#toa").val(tt);'.
            '$("#tov").val(tv);'.
            '$("#tot").val(ta);'.
            '$("#toadv").val(tadv);'.
            '$("#tow").val(tow);'.
            '$("#tow").val(tow);'.

            '$("#bankname").val("'.$v->bank_name.'");'.
            '$("#bankid").val("'.$v->bank_code.'");'.
            '$("#branchid").val("'.$v->bank_name.'");'.
            '$("#branch").val("'.$v->branch_name.'");'.
            '$("#acc_code").val("'.$v->acc_code.'");'.
            '$(".acid").val("'.$v->acc_code.'");'.
            '</script>';         

          }elseif($type == "aps"){
            $toamt = 0; $aps = $this->db->query("SELECT aps_header.*, bank.bank_name, bank_branch.branch_name from aps_header INNER JOIN bank on bank.bank_code = aps_header.bank_code INNER JOIN bank_branch ON bank_branch.branch_code = aps_header.branch_code where aps_code = '$code' and aps_header.compcode='$compcode' group by aps_code  ")->result();
            foreach ($aps as $s) {
              echo '<tr >'.
                  '<td>'.
                  '<input type="hidden" name="id_update[]" value="'.$s->aps_id.'" >'.
                  '<input type="hidden" value="I" name="qtyi[]" ><input type="hidden" value="'.$type.'" name="ap_type[]" ><input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_code.'" id="ap_code'.$s->aps_code.'" name="ap_code[]">'.
                  '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_vatper.'" id="ap_vatt'.$s->aps_code.'" name="ap_vat[]">'.
                  '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_wt.'" id="ap_wtt'.$s->aps_code.'" name="ap_wt[]">'.
                  '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_project.'" id="ap_project'.$s->aps_code.'" name="ap_project[]">'.
                  '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_system.'" id="ap_system'.$s->aps_code.'" name="ap_system[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_duedate.'" id="ap_duedate'.$s->aps_code.'" name="ap_duedate[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_lono.'" id="ap_pono'.$s->aps_code.'" name="ap_pono[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_invno.'" id="ap_inv'.$s->aps_code.'" name="ap_inv[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_netamt.'" id="ap_netamt1'.$s->aps_code.'" name="ap_netamt1[]">'.
                  '<input type="hidden" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_retention.'" id="ap_reten'.$s->aps_code.'" name="ap_reten[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_lessother.'" id="ap_less'.$s->aps_code.'" name="ap_less[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_amount.'" id="ap_amt1'.$s->aps_code.'" name="ap_amt1[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_adv'.$s->aps_code.'" name="ap_adv[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_vattot.'" id="ap_vat1'.$s->aps_code.'" name="ap_vatamt1[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_wttot.'" id="ap_wt1'.$s->aps_code.'" name="ap_wtamt1[]">'.
                  '</td>';
            }
            echo '</tr>';
            echo  '<script>'.
              'var toa = parseFloat($("#toa").val());'.
              'var tot = parseFloat($("#tot").val());'.
              'var tov = parseFloat($("#tov").val());'.
              'var toadv = parseFloat($("#toadv").val());'.
              'var less = parseFloat($("#less").val());'.
              'var tow = parseFloat($("#tow").val());'.
              'var tovat = parseFloat($("#ap_vat1'.$s->aps_code.'").val());'.
              'var towt = parseFloat($("#ap_wt1'.$s->aps_code.'").val());'.
              'var tadv = parseFloat($("#ap_adv'.$s->aps_code.'").val());'.
              'var total = parseFloat($("#ap_netamt1'.$s->aps_code.'").val());'.
              'var toamt = parseFloat($("#ap_amt1'.$s->aps_code.'").val());'.
              'var lessot = parseFloat($("#ap_less'.$s->aps_code.'").val());'.
              'var tt = tot+total;'.
              'var ta = toa+toamt;'.
              'var tv = tov+tovat;'.
              'var tw = tow+towt;'.
              'var ls = less+lessot;'.
              'var tadv = tadv+tadv;'.
              '$("#tot").val(tt);'.
              '$("#toa").val(ta);'.
              '$("#tov").val(tv);'.
              '$("#tow").val(tw);'.
              '$("#toadv").val(tadv);'.
              '$("#less").val(ls);'.
              '$("#bankname").val("'.$s->bank_name.'");'.
              '$("#bankid").val("'.$s->bank_code.'");'.
              '$("#branchid").val("'.$s->bank_name.'");'.
              '$("#branch").val("'.$s->branch_name.'");'.
              '$("#acc_code").val("'.$s->acc_code.'");'.
              '$(".acid").val("'.$s->acc_code.'");'.
              '</script>'; 
          }elseif($type == "apd"){
              $toamt =0; $apd = $this->db->query("SELECT ap_down_header.*, bank.bank_name, bank_branch.branch_name from ap_down_header INNER JOIN bank on bank.bank_code = ap_down_header.bank_code INNER JOIN bank_branch ON bank_branch.branch_code = ap_down_header.branch_code where ap_down_header.apd_code = '$code' and ap_down_header.compcode='$compcode' group by apd_code ")->result();
              foreach ($apd as $d) {
                echo '<tr >'.
                  '<td>'.
                  '<input type="hidden" name="id_update[]" value="'.$d->id.'" >'.
                  '<input type="hidden" value="I" name="qtyi[]" ><input type="hidden" value="'.$type.'" name="ap_type[]" ><input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$d->apd_code.'" id="ap_code'.$d->apd_code.'" name="ap_code[]">'.
                  '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$d->apd_project.'" id="ap_project'.$d->apd_code.'" name="ap_project[]">'.
                  '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$d->apd_system.'" id="ap_system'.$d->apd_code.'" name="ap_system[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$d->apd_duedate.'" id="ap_duedate'.$d->apd_code.'" name="ap_duedate[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="" id="ap_pono'.$d->apd_code.'" name="ap_pono[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$d->apd_tax_no.'" id="ap_inv'.$d->apd_code.'" name="ap_inv[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$d->apd_net_amt.'" id="ap_netamt1'.$d->apd_code.'" name="ap_netamt1[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_less'.$d->apd_code.'" name="ap_less[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$d->apd_amount.'" id="ap_amt1'.$d->apd_code.'" name="ap_amt1[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_adv'.$d->apd_code.'" name="ap_adv[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$d->apd_totalvat.'" id="ap_vat1'.$d->apd_code.'" name="ap_vatamt1[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_wt1'.$d->apd_code.'" name="ap_wtamt1[]">'.
                  '</td>';
              }
            echo '</tr>';
              echo  '<script>'.
            'var toa = parseFloat($("#toa").val());'.
            'var tot = parseFloat($("#tot").val());'.
            'var tov = parseFloat($("#tov").val());'.
            'var toadv = parseFloat($("#toadv").val());'.
            'var tow = parseFloat($("#tow").val());'.
            'var tovat = parseFloat($("#ap_vat1'.$d->apd_code.'").val());'.
            'var towt = parseFloat($("#ap_wt1'.$d->apd_code.'").val());'.
            'var tadv = parseFloat($("#ap_adv'.$d->apd_code.'").val());'.
            'var total = parseFloat($("#ap_netamt1'.$d->apd_code.'").val());'.
            'var toamt = parseFloat($("#ap_amt1'.$d->apd_code.'").val());'.
            'var tt = tot+total;'.
            'var ta = toa+toamt;'.
            'var tv = tov+tovat;'.
            'var tw = tow+towt;'.
            'var tadv = tadv+tadv;'.
            '$("#tot").val(tt);'.
            '$("#toa").val(ta);'.
            '$("#tov").val(tv);'.
            '$("#tow").val(tw);'.
            '$("#toadv").val(tadv);'.
            '$("#bankname").val("'.$d->bank_name.'");'.
            '$("#bankid").val("'.$d->bank_code.'");'.
            '$("#branchid").val("'.$d->bank_name.'");'.
            '$("#branch").val("'.$d->branch_name.'");'.
            '$("#acc_code").val("'.$d->acc_code.'");'.
            '$(".acid").val("'.$d->acc_code.'");'.
            '</script>'; 
          }elseif($type == "apr"){
            $toamt = 0; $apr = $this->db->query("select ap_ret_header.*, bank.bank_name, bank_branch.branch_name from ap_ret_header INNER JOIN bank on bank.bank_code = ap_ret_header.bank_code INNER JOIN bank_branch ON bank_branch.branch_code = ap_ret_header.branch_code where ap_ret_header.apr_code = '$code' ")->result();
            foreach ($apr as $r) {
              echo '<tr >'.
                  '<td>'.
                  '<input type="hidden" name="id_update[]" value="'.$r->id.'" >'.
                  '<input type="hidden" value="I" name="qtyi[]" ><input type="hidden" value="'.$type.'" name="ap_type[]" ><input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$r->apr_code.'" id="ap_code'.$r->apr_code.'" name="ap_code[]">'.
                  '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$r->apr_project.'" id="ap_project'.$r->apr_code.'" name="ap_project[]">'.
                  '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$r->apr_system.'" id="ap_system'.$r->apr_code.'" name="ap_system[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$r->apr_duedate.'" id="ap_duedate'.$r->apr_code.'" name="ap_duedate[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="" id="ap_pono'.$r->apr_code.'" name="ap_pono[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$r->apr_tax_no.'" id="ap_inv'.$r->apr_code.'" name="ap_inv[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$r->apr_net_amt.'" id="ap_netamt1'.$r->apr_code.'" name="ap_netamt1[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_less'.$r->apr_code.'" name="ap_less[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$r->apr_amount.'" id="ap_amt1'.$r->apr_code.'" name="ap_amt1[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_adv'.$r->apr_code.'" name="ap_adv[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$r->apr_totalvat.'" id="ap_vat1'.$r->apr_code.'" name="ap_vatamt1[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_wt1'.$r->apr_code.'" name="ap_wtamt1[]">'.
                  '</td>';
                  $toamt = $toamt+$r->apr_net_amt;
            }
            echo '</tr>';
              echo  '<script>'.
            'var toa = parseFloat($("#toa").val());'.
            'var tot = parseFloat($("#tot").val());'.
            'var tov = parseFloat($("#tov").val());'.
            'var toadv = parseFloat($("#toadv").val());'.
            'var tow = parseFloat($("#tow").val());'.
            'var tovat = parseFloat($("#ap_vat1'.$r->apr_code.'").val());'.
            'var towt = parseFloat($("#ap_wt1'.$r->apr_code.'").val());'.
            'var tadv = parseFloat($("#ap_adv'.$r->apr_code.'").val());'.
            'var total = parseFloat($("#ap_netamt1'.$r->apr_code.'").val());'.
            'var toamt = parseFloat($("#ap_amt1'.$r->apr_code.'").val());'.
            'var tt = tot+total;'.
            'var ta = toa+toamt;'.
            'var tv = tov+tovat;'.
            'var tw = tow+towt;'.
            'var tadv = tadv+tadv;'.
            '$("#tot").val(tt);'.
            '$("#toa").val(ta);'.
            '$("#tov").val(tv);'.
            '$("#tow").val(tw);'.
            '$("#bankname").val("'.$r->bank_name.'");'.
            '$("#bankid").val("'.$r->bank_code.'");'.
            '$("#branchid").val("'.$r->bank_name.'");'.
            '$("#branch").val("'.$r->branch_name.'");'.
            '$("#acc_code").val("'.$r->acc_code.'");'.
            '$(".acid").val("'.$r->acc_code.'");'.
            '$("#toadv").val(tadv);'.
            '</script>'; 
          }elseif($type == "apo"){
            $amtp = 0; $apo = $this->db->query("select *, bank.bank_name, bank_branch.branch_name ,ex_amt as sum_amt,ex_tovat as sum_vat,ex_netamt as sum_netamt,ex_towt as sum_wt  from ap_pettycash_header join ap_pettycash_expense on ap_pettycash_expense.ex_ref = ap_pettycash_header.ap_no INNER JOIN bank on bank.bank_code = ap_pettycash_header.bank_code INNER JOIN bank_branch ON bank_branch.branch_code = ap_pettycash_header.branch_code where ex_ref = '$code' group by ap_no ")->result();            
            // $amtp = 0; $apo = $this->db->query("SELECT *, bank.bank_name, bank_branch.branch_name ,SUM(ex_amt) as sum_amt,SUM(ex_tovat) as sum_vat,SUM(ex_netamt) as sum_netamt,SUM(ex_towt) as sum_wt  from ap_pettycash_header join ap_pettycash_expense on ap_pettycash_expense.ex_ref = ap_pettycash_header.ap_no INNER JOIN bank on bank.bank_code = ap_pettycash_header.bank_code INNER JOIN bank_branch ON bank_branch.branch_code = ap_pettycash_header.branch_code where ex_ref = '$code' ")->result();            
            foreach ($apo as $p) {              
              echo '<tr >'.
                  '<td>'.
                  '<input type="hidden" name="id_update[]" value="'.$p->ap_id.'" >'.
                  '<input type="hidden" value="I" name="qtyi[]" ><input type="hidden" value="'.$type.'" name="ap_type[]" ><input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->ap_no.'" id="ap_code'.$p->ap_no.'" name="ap_code[]">'.
                  '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->ap_project.'" id="ap_project'.$p->ap_no.'" name="ap_project[]">'.
                  '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->ap_system.'" id="ap_system'.$p->ap_no.'" name="ap_system[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->doc_date.'" id="ap_duedate'.$p->ap_no.'" name="ap_duedate[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->doc_no.'" id="ap_pono'.$p->ap_no.'" name="ap_pono[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->ex_taxno.'" id="ap_inv'.$p->ap_no.'" name="ap_inv[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="hidden"  style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->sum_netamt.'" id="ap_netamt1'.$p->ap_no.'" name="ap_netamt1[]">'.
                  '<input type="text" class="ap_netamt" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->sum_netamt.'" id="ap_netamt'.$p->ap_no.'" name="ap_netamt[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_less'.$p->ap_no.'" name="ap_less[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="hidden" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->sum_amt.'" id="ap_amt1'.$p->ap_no.'" name="ap_amt1[]">'.
                  '<input type="text" class="form-control text-right" value="'.$p->sum_amt.'" id="ap_amt'.$p->ap_no.'" name="ap_amt[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" class="form-control text-right" value="0" id="ap_adv'.$p->ap_no.'" name="ap_adv[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="hidden" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->sum_vat.'" id="ap_vat1'.$p->ap_no.'" name="ap_vatamt1[]">'.
                  '<input type="text" class="form-control text-right" value="'.$p->sum_vat.'" id="ap_vat'.$p->ap_no.'" name="ap_vatamt[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" class="form-control text-right" value="'.$p->sum_wt.'" id="ap_wt1'.$p->ap_no.'" name="ap_wtamt1[]">'.
                   '<input type="hidden" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->ex_towt.'" id="ap_wt'.$p->ap_no.'" name="ap_wtamt[]">'.
                  '</td>';
                 
            }
            echo '</tr>';
            echo  '<script>'.
              'var toa = parseFloat($("#toa").val());'.
              'var tot = parseFloat($("#tot").val());'.
              'var tov = parseFloat($("#tov").val());'.
              'var toadv = parseFloat($("#toadv").val());'.
              'var tow = parseFloat($("#tow").val());'.
              'var tovat = parseFloat($("#ap_vat'.$p->ap_no.'").val());'.
              'var towt = parseFloat($("#ap_wt1'.$p->ap_no.'").val());'.
              'var tadv = parseFloat($("#ap_adv'.$p->ap_no.'").val());'.
              'var total = parseFloat($("#ap_netamt'.$p->ap_no.'").val());'.
              'var toamt = parseFloat($("#ap_amt'.$p->ap_no.'").val());'.
              'var tt = tot+total;'.
              'var ta = toa+toamt;'.
              'var tv = tov+tovat;'.
              'var tw = tow+towt;'.
              'var tadv = tadv+tadv;'.
              '$("#tot").val(tt);'.
              '$("#toa").val(ta);'.
              '$("#tov").val(tv);'.
              '$("#tow").val(tw);'.
              '$("#toadv").val(tadv);'.
              '$("#bankname").val("'.$p->bank_name.'");'.
              '$("#bankid").val("'.$p->bank_code.'");'.
              '$("#branchid").val("'.$p->bank_name.'");'.
              '$("#branch").val("'.$p->branch_name.'");'.
              '$("#acc_code").val("'.$p->acc_code.'");'.
              '$(".acid").val("'.$p->acc_code.'");'.
              '</script>'; 
          }elseif($type == "cnv"){
            $cnv = $this->db->query("SELECT * from cnv_header  where cnv_code = '$code'  ")->result();
            foreach ($cnv as $cv) {
              echo '<tr >'.
                  '<td>'.
                  '<input type="hidden" name="id_update[]" value="'.$cv->cnv_id.'" >'.
                  '<input type="hidden" value="I" name="qtyi[]" ><input type="hidden" value="'.$type.'" name="ap_type[]" ><input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cv->cnv_code.'" id="ap_code'.$cv->cnv_code.'" name="ap_code[]">'.
                  '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cv->cnv_project.'" id="ap_project'.$cv->cnv_code.'" name="ap_project[]">'.
                  '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cv->cnv_system.'" id="ap_system'.$cv->cnv_code.'" name="ap_system[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cv->cnv_gldate.'" id="ap_duedate'.$cv->cnv_code.'" name="ap_duedate[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cv->ap_code.'" id="ap_pono'.$cv->cnv_code.'" name="ap_pono[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cv->cnv_tax.'" id="ap_inv'.$cv->cnv_code.'" name="ap_inv[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cv->cnv_totamt.'" id="ap_netamt1'.$cv->cnv_code.'" name="ap_netamt1[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_less'.$cv->cnv_code.'" name="ap_less[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cv->cnv_netamt.'" id="ap_amt1'.$cv->cnv_code.'" name="ap_amt1[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_adv'.$cv->cnv_code.'" name="ap_adv[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cv->cnv_vat.'" id="ap_vat1'.$cv->cnv_code.'" name="ap_vatamt1[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_wt1'.$cv->cnv_code.'" name="ap_wtamt1[]">'.
                  '</td>';
            }
            echo '</tr>';
            echo  '<script>'.
              'var toa = parseFloat($("#toa").val());'.
              'var tot = parseFloat($("#tot").val());'.
              'var tov = parseFloat($("#tov").val());'.
              'var toadv = parseFloat($("#toadv").val());'.
              'var tow = parseFloat($("#tow").val());'.
              'var tovat = parseFloat($("#ap_vat1'.$cv->cnv_code.'").val());'.
              'var towt = parseFloat($("#ap_wt1'.$cv->cnv_code.'").val());'.
              'var tadv = parseFloat($("#ap_adv'.$cv->cnv_code.'").val());'.
              'var total = parseFloat($("#ap_netamt1'.$cv->cnv_code.'").val());'.
              'var toamt = parseFloat($("#ap_amt1'.$cv->cnv_code.'").val());'.
              'var tt = tot-total;'.
              'var ta = toa-toamt;'.
              'var tv = tov-tovat;'.
              'var tw = tow-towt;'.
              'var tadv = tadv-tadv;'.
              '$("#tot").val(tt);'.
              '$("#toa").val(ta);'.
              '$("#tov").val(tv);'.
              '$("#tow").val(tw);'.
              '$("#toadv").val(tadv);'.
              '</script>'; 
          }elseif ($type== "cns") {
            $cns = $this->db->query("SELECT * from cns_header  where cns_code = '$code'  ")->result();
            // var_dump($cns);die();
            foreach ($cns as $cs) {
              echo '<tr >'.
                  '<td>'.
                  '<input type="hidden" name="id_update[]" value="'.$cs->cns_id.'" >'.
                  '<input type="hidden" value="I" name="qtyi[]" ><input type="hidden" value="'.$type.'" name="ap_type[]" ><input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cs->cns_code.'" id="ap_code'.$cs->cns_code.'" name="ap_code[]">'.
                  '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cs->cns_project.'" id="ap_project'.$cs->cns_code.'" name="ap_project[]">'.
                  '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cs->cns_system.'" id="ap_system'.$cs->cns_code.'" name="ap_system[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cs->cns_duedate.'" id="ap_duedate'.$cs->cns_code.'" name="ap_duedate[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cs->ap_code.'" id="ap_pono'.$cs->cns_code.'" name="ap_pono[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cs->cns_invno.'" id="ap_inv'.$cs->cns_code.'" name="ap_inv[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cs->cns_namt.'" id="ap_netamt1'.$cs->cns_code.'" name="ap_netamt1[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cs->cns_lessre.'" id="ap_less'.$cs->cns_code.'" name="ap_less[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cs->cns_amount.'" id="ap_amt1'.$cs->cns_code.'" name="ap_amt1[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_adv'.$cs->cns_code.'" name="ap_adv[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cs->cns_vattot.'" id="ap_vat1'.$cs->cns_code.'" name="ap_vatamt1[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_wt1'.$cs->cns_code.'" name="ap_wtamt1[]">'.
                  '</td>';
            }
            echo '</tr>';
              echo  '<script>'.
                'var toa = parseFloat($("#toa").val());'.
                'var tot = parseFloat($("#tot").val());'.
                'var tov = parseFloat($("#tov").val());'.
                'var toadv = parseFloat($("#toadv").val());'.
                'var tow = parseFloat($("#tow").val());'.
                'var tovat = parseFloat($("#ap_vat1'.$cs->cns_code.'").val());'.
                'var towt = parseFloat($("#ap_wt1'.$cs->cns_code.'").val());'.
                'var tadv = parseFloat($("#ap_adv'.$cs->cns_code.'").val());'.
                'var total = parseFloat($("#ap_netamt1'.$cs->cns_code.'").val());'.
                'var toamt = parseFloat($("#ap_amt1'.$cs->cns_code.'").val());'.
                'var tt = tot-total;'.
                'var ta = toa-toamt;'.
                'var tv = tov-tovat;'.
                'var tw = tow-towt;'.
                'var tadv = tadv+tadv;'.
                '$("#tot").val(tt);'.
                '$("#toa").val(ta);'.
                '$("#tov").val(tv);'.
                '$("#tow").val(tw);'.
                '$("#toadv").val(tadv);'.
                '</script>'; 

          }elseif ($type== "cno") {
            $cno = $this->db->query("SELECT *, sum(cno_detail.cnoi_netamt) sum_dis, sum(cno_detail.cnoi_disamt*cno_detail.cnoi_wt/100) as wt, sum(cno_detail.cnoi_disamt) as sum_net, sum(cno_detail.cnoi_vat) as vatt from cno_header join cno_detail on cno_header.cno_code = cno_detail.cnoi_ref where cnoi_ref = '$code'  ")->result();      
            foreach ($cno as $co) {
              echo '<tr >'.
                  '<td>'.
                  '<input type="hidden" name="id_update[]" value="'.$co->cnoi_id.'" >'.
                  '<input type="hidden" value="I" name="qtyi[]" ><input type="hidden" value="'.$type.'" name="ap_type[]" ><input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$co->cnoi_ref.'" id="ap_code'.$co->cnoi_ref.'" name="ap_code[]">'.
                  '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$co->cno_project.'" id="ap_project'.$co->cnoi_ref.'" name="ap_project[]">'.
                  '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$co->cno_system.'" id="ap_system'.$co->cnoi_ref.'" name="ap_system[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$co->cno_date.'" id="ap_duedate'.$co->cnoi_ref.'" name="ap_duedate[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$co->ap_code.'" id="ap_pono'.$co->cnoi_ref.'" name="ap_pono[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$co->cno_inv.'" id="ap_inv'.$co->cnoi_ref.'" name="ap_inv[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.($co->sum_dis - $co->wt).'" id="ap_netamt1'.$co->cnoi_ref.'" name="ap_netamt1[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_less'.$co->cnoi_ref.'" name="ap_less[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$co->sum_net.'" id="ap_amt1'.$co->cnoi_ref.'" name="ap_amt1[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_adv'.$co->cnoi_ref.'" name="ap_adv[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$co->vatt.'" id="ap_vat1'.$co->cnoi_ref.'" name="ap_vatamt1[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$co->wt.'" id="ap_wt1'.$co->cnoi_ref.'" name="ap_wtamt1[]">'.
                  '</td>';
            }
            echo '</tr>';
              echo  '<script>'.
              'var toa = parseFloat($("#toa").val());'.
              'var tot = parseFloat($("#tot").val());'.
              'var tov = parseFloat($("#tov").val());'.
              'var toadv = parseFloat($("#toadv").val());'.
              'var tow = parseFloat($("#tow").val());'.
              'var tovat = parseFloat($("#ap_vat1'.$co->cnoi_ref.'").val());'.
              'var towt = parseFloat($("#ap_wt1'.$co->cnoi_ref.'").val());'.
              'var tadv = parseFloat($("#ap_adv'.$co->cnoi_ref.'").val());'.
              'var total = parseFloat($("#ap_netamt1'.$co->cnoi_ref.'").val());'.
              'var toamt = parseFloat($("#ap_amt1'.$co->cnoi_ref.'").val());'.
              'var tt = tot-total;'.
              'var ta = toa-toamt;'.
              'var tv = tov-tovat;'.
              'var tw = tow-towt;'.
              'var tadv = tadv+tadv;'.
              '$("#tot").val(tt);'.
              '$("#toa").val(ta);'.
              '$("#tov").val(tv);'.
              '$("#tow").val(tw);'.
              '$("#toadv").val(tadv);'.
              '</script>'; 
            }
          
        return true;
        }
        else
        {
          return false;
        }
          return true;

    }

    public function query_apapprove_coppy()
    {
      $code = $this->input->post('code');
      $type = $this->input->post('type');
      echo '<pre>';
      if($type == 'apv') {
        $this->db->select('*');
        $this->db->from('apv_header');
        $this->db->where('apv_code', $code);
        $query = $this->db->get();
        $data_new = array();
        if ($query->num_rows() > 0) {
          // foreach ($query->result() as $key => $value) {
          //   $data_new[$key] = array(
          //     ''
          //   );
          // }
        }else{

        }
// SELECT * from apv_header where apv_code = '$code'
}else if ($type == 'aps') {
  // SELECT * from aps_header where aps_code = '$code'
}else if ($type == 'apd') {
  // SELECT * from ap_down_header where apd_code = '$code'
}else if ($type == 'apr') {
// SELECT * from ap_ret_header where apr_code = '$code'
}else if ($type == 'apo') {
  $this->db->select('* ,SUM(ex_amt) as sum_amt,SUM(ex_tovat) as sum_vat,SUM(ex_netamt) as sum_netamt,SUM(ex_towt) as sum_wt');
  $this->db->from('ap_pettycash_header');
  $this->db->join('ap_pettycash_expense','ap_pettycash_expense.ex_ref = ap_pettycash_header.ap_no');
  $this->db->where('ap_pettycash_expense.ex_ref', $code);
  $query = $this->db->get();
  $data_new = array();
  if ($query->num_rows() > 0) {
    // foreach ($query->result() as $key => $value) {
    //   $data_new[$key] = array(
    //     ''
    //   );
    // }

    // print_r($data['rows']);
    print_r($query->result());
  }else{

  }
// SELECT * ,SUM(ex_amt) as sum_amt,SUM(ex_tovat) as sum_vat,SUM(ex_netamt) as sum_netamt,SUM(ex_towt) as sum_wt  from ap_pettycash_header join ap_pettycash_expense on ap_pettycash_expense.ex_ref = ap_pettycash_header.ap_no where ex_ref = '$code'
}else if ($type == 'cnv') {
// SELECT * from cnv_header  where cnv_code = '$code'
}else if ($type == 'cns') {
// SELECT * from cns_header  where cns_code = '$code'
}else if ($type == 'cno') {
// SELECT *, sum(cno_detail.cnoi_disamt) sum_dis, sum(cno_detail.cnoi_netamt) as sum_net from cno_detail   join cno_header on cno_header.cno_code = cno_detail.cnoi_ref where cnoi_ref = '$code'
}
die();
      // $data[''] = 
      $this->load->view('office/account/ap/pv/query_apapprove', $data);
    }

    public function gl_apapprove()
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
        $code = $this->input->post('code');
        $type = $this->input->post('type');
        if ($code) {
          $this->db->select('*');
          $this->db->from('syscode');
          $this->db->where('sys_code',$compcode);
          $rest=$this->db->get()->result();
            foreach ($rest as $pacrest ) { 
            $ap_due = $pacrest->pac_taxvat_due;//ภาษีซื้อ
            $ap_nodue = $pacrest->pac_taxvat_nodue;//ภาษีซื้อไม่
            $ap_inv = $pacrest->pac_vender_incont;//A/C เจ้าหนี้การค้า-ในประเทศ ผู้รับเหมาช่วง
            $ap_wt3 = $pacrest->pac_whtax_3;//A/C ภาษีเงินได้ หัก รืที่จ่ายค้างจ่าย-บุคคล (ภงด.3)
            $ap_mat = $pacrest->pac_vender_inmat; //A/C เจ้าหนี้การค้า ค่าวัสดุ
            $pac = $pacrest->pac_expens;
            $down = $pacrest->pac_down_apv;//เงินจ่ายล่วงหน้าให้แก่เจ้าหนี้
            $aps_ret =$pacrest->pac_vender_retcont;//หักประกันผลงาน-รับเหมาช่วง
            $apv_ret =$pacrest->pac_ret_apv;//หักประกันผลงาน-ค่าวัสดุ
            }           

          if ($type == "aps"){
            $this->db->select('*');
            $this->db->from('company');
            $this->db->where('compcode',$compcode);
            $com=$this->db->get()->result();
            foreach ($com as $company ) { 
              $company = $company->glrap;
            }
            if ($company == "ap") { 
              $aps = $this->db->query("SELECT * from aps_header where aps_code = '$code' and compcode='$compcode'")->result();
              foreach ($aps as $s) {
              $samt = $s->aps_netamt-$s->aps_wttot;     
                if ($s->aps_invno == "") {                
                  echo '<tr >'.
                    '<td><input type="text" value="'.$s->aps_code.'" name="ac_code[]" ></td>'.
                    '<td><input type="text" value="'.$ap_inv.'" name="syscode[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_netamt.'" name="ap_dr[]" ></td>'.
                    '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_project.'" name="project[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_system.'" name="system[]" ></td>'.
                    '<td><input type="text" value="cr" name="actype[]" ></td>'.
                    '</tr>';
                  if ($s->aps_wttot != 0) {
                  echo
                    '<tr >'.
                    '<td><input type="text" value="'.$s->aps_code.'" name="ac_code[]" ></td>'.
                    '<td><input type="text" value="'.$ap_wt3.'" name="syscode[]" ></td>'.
                    '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_wttot.'" name="ap_cr[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_project.'" name="project[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_system.'" name="system[]" ></td>'.
                    '<td><input type="text" value="dr" name="actype[]" ></td>'.
                    '</tr>';
                  }
                  if ($s->aps_vatper != 0) {
                  echo
                    '<tr >'.
                    '<td><input type="text" value="'.$s->aps_code.'" name="ac_code[]" ></td>'.
                    '<td><input type="text" value="'.$ap_due.'" name="syscode[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_vattot.'" name="ap_dr[]" ></td>'.
                    '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_project.'" name="project[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_system.'" name="system[]" ></td>'.
                    '<td><input type="text" value="cr" name="actype[]" ></td>'.
                    '</tr>'.
                    '<tr >'.
                    '<td><input type="text" value="'.$s->aps_code.'" name="ac_code[]" ></td>'.
                    '<td><input type="text" value="'.$ap_nodue.'" name="syscode[]" ></td>'.
                    '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_vattot.'" name="ap_cr[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_project.'" name="project[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_system.'" name="system[]" ></td>'.
                    '<td><input type="text" value="dr" name="actype[]" ></td>'.
                    '</tr>';
                  }                   
                  echo   
                    '<tr >'.
                    '<td><input type="text" value="'.$s->aps_code.'" name="ac_code[]" ></td>'.
                    '<td><input type="text" name="syscode[]" class="acid" ></td>'.
                    '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                    '<td><input type="text" value="'.$samt.'" name="ap_cr[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_project.'" name="project[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_system.'" name="system[]" ></td>'.
                    '<td><input type="text" value="dr" name="actype[]" ></td>'.
                    '</tr>';
                }else{
                echo 
                  '<tr >'.
                  '<td><input type="text" value="'.$s->aps_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_inv.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="'.$s->aps_netamt.'" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$s->aps_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$s->aps_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="cr" name="actype[]" ></td>'.
                  '</tr>';
                  
                  if ($s->aps_wttot != 0) {
                  echo '<tr >'.
                  '<td><input type="text" value="'.$s->aps_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_wt3.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$s->aps_wttot.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$s->aps_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$s->aps_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>';
                  }
                  echo '<tr >'.
                  '<td><input type="text" value="'.$s->aps_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" name="syscode[]" class="acid" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$s->samt.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$s->aps_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$s->aps_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>';
                }  
              }
            }else{
              $aps = $this->db->query("SELECT * from aps_header where aps_code = '$code'  and compcode='$compcode' ")->result();
              foreach ($aps as $s) {
              $samt = $s->aps_netamt-$s->aps_wttot-$s->aps_retention;     
                if ($s->aps_invno == "") {                
                  echo '<tr >'.
                    '<td><input type="text" value="'.$s->aps_code.'" name="ac_code[]" ></td>'.
                    '<td><input type="text" value="'.$ap_inv.'" name="syscode[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_netamt.'" name="ap_dr[]" ></td>'.
                    '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_project.'" name="project[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_system.'" name="system[]" ></td>'.
                    '<td><input type="text" value="cr" name="actype[]" ></td>'.
                    '</tr>';
                    
                  if ($s->aps_wttot != 0) {
                  echo
                    '<tr >'.
                    '<td><input type="text" value="'.$s->aps_code.'" name="ac_code[]" ></td>'.
                    '<td><input type="text" value="'.$ap_wt3.'" name="syscode[]" ></td>'.
                    '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_wttot.'" name="ap_cr[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_project.'" name="project[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_system.'" name="system[]" ></td>'.
                    '<td><input type="text" value="dr" name="actype[]" ></td>'.
                    '</tr>';
                  }
                  if ($s->aps_vatper != 0) {
                  echo
                    '<tr >'.
                    '<td><input type="text" value="'.$s->aps_code.'" name="ac_code[]" ></td>'.
                    '<td><input type="text" value="'.$ap_due.'" name="syscode[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_vattot.'" name="ap_dr[]" ></td>'.
                    '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_project.'" name="project[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_system.'" name="system[]" ></td>'.
                    '<td><input type="text" value="cr" name="actype[]" ></td>'.
                    '</tr>'.
                    '<tr >'.
                    '<td><input type="text" value="'.$s->aps_code.'" name="ac_code[]" ></td>'.
                    '<td><input type="text" value="'.$ap_nodue.'" name="syscode[]" ></td>'.
                    '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_vattot.'" name="ap_cr[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_project.'" name="project[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_system.'" name="system[]" ></td>'.
                    '<td><input type="text" value="dr" name="actype[]" ></td>'.
                    '</tr>';
                  }                   
                  echo   
                    '<tr >'.
                    '<td><input type="text" value="'.$s->aps_code.'" name="ac_code[]" ></td>'.
                    '<td><input type="text" value="'.$aps_ret.'" name="syscode[]"  ></td>'.
                    '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_retention.'" name="ap_cr[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_project.'" name="project[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_system.'" name="system[]" ></td>'.
                    '<td><input type="text" value="dr" name="actype[]" ></td>'.
                    '</tr>'.
                    '<tr >'.
                    '<td><input type="text" value="'.$s->aps_code.'" name="ac_code[]" ></td>'.
                    '<td><input type="text" name="syscode[]" class="acid" ></td>'.
                    '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                    '<td><input type="text" value="'.$samt.'" name="ap_cr[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_project.'" name="project[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_system.'" name="system[]" ></td>'.
                    '<td><input type="text" value="dr" name="actype[]" ></td>'.
                    '</tr>';
                    
                }else{
                echo 
                  '<tr >'.
                  '<td><input type="text" value="'.$s->aps_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_inv.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="'.$s->aps_netamt.'" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$s->aps_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$s->aps_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="cr" name="actype[]" ></td>'.
                  '</tr>';
                 
                  if ($s->aps_wttot != 0) {
                  echo '<tr >'.
                  '<td><input type="text" value="'.$s->aps_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_wt3.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$s->aps_wttot.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$s->aps_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$s->aps_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>';
                  }
                  echo 
                  '<tr >'.
                    '<td><input type="text" value="'.$s->aps_code.'" name="ac_code[]" ></td>'.
                    '<td><input type="text" value="'.$aps_ret.'" name="syscode[]" class="acid" ></td>'.
                    '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_retention.'" name="ap_cr[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_project.'" name="project[]" ></td>'.
                    '<td><input type="text" value="'.$s->aps_system.'" name="system[]" ></td>'.
                    '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>'.
                  '<tr >'.
                  '<td><input type="text" value="'.$s->aps_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" name="syscode[]" class="acid" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$samt.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$s->aps_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$s->aps_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>';
                  
                }  
              }
            }
          }elseif ($type == "apv") {

            $apv = $this->db->query("SELECT * from apv_header where apv_code = '$code'  and compcode='$compcode' ")->result();
            foreach  ($apv as $v) {
              $vamt = $v->apv_totamt;

              if ($v->apv_inv == "") {
                
                echo 
                  '<tr >'.
                  '<td><input type="text" value="'.$v->apv_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_mat.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="'.$v->apv_netamt.'" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$v->apv_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$v->apv_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="cr" name="actype[]" ></td>'.
                  '</tr>';
                if ($v->apv_vatper != 0) {
                echo
                  '<tr >'.
                  '<td><input type="text" value="'.$v->apv_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_due.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="'.$v->apv_vat.'" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$v->apv_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$v->apv_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="cr" name="actype[]" ></td>'.
                  '</tr>'.
                  
                  '<tr >'.
                  '<td><input type="text" value="'.$v->apv_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_nodue.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$v->apv_vat.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$v->apv_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$v->apv_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>';
                }

                echo
                  '<tr >'.
                  '<td><input type="text" value="'.$v->apv_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" name="syscode[]" class="acid" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$v->apv_netamt.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$v->apv_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$v->apv_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>';
              }else{
                echo 
                  '<tr >'.
                  '<td><input type="text" value="'.$v->apv_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_mat.'" name="syscode[]"></td>'.
                  '<td><input type="text" value="'.$vamt.'" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$v->apv_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$v->apv_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="cr" name="actype[]" ></td>'.
                  '</tr>'.
                  '<tr >'.
                  '<td><input type="text" value="'.$v->apv_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" name="syscode[]" class="acid" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$vamt.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$v->apv_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$v->apv_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>';
              }
              
            }
          }elseif ($type == "apd") {
           $apd = $this->db->query("SELECT * from ap_down_header where apd_code = '$code'  and compcode='$compcode' ")->result();
            foreach ($apd as $d) {
              $damt = $d->apd_net_amt;
              if ($d->apd_tax_no == "") {
                
                echo '<tr >'.
                  '<td><input type="text" value="'.$d->apd_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_due.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="'.$d->apd_totalvat.'" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$d->apd_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$d->apd_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="cr" name="actype[]" ></td>'.
                  '</tr>';
                if ($d->apd_vat != "") {
                echo
                  '<tr >'.
                  '<td><input type="text" value="'.$d->apd_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_mat.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="'.$d->apd_amount.'" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$d->apd_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$d->apd_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="cr" name="actype[]" ></td>'.
                  '</tr>'.
                  '<tr >'.
                  '<td><input type="text" value="'.$d->apd_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_nodue.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$d->apd_totalvat.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$d->apd_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$d->apd_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>';
                }
                echo
                  '<tr >'.
                  '<td><input type="text" value="'.$d->apd_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" name="syscode[]" class="acid" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$d->apd_amount.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$d->apd_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$d->apd_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>';
                
                
              }else{
                echo 
                  '<tr >'.
                  '<td><input type="text" value="'.$d->apd_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_mat.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="'.$d->apd_amount.'" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$d->apd_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$d->apd_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="cr" name="actype[]" ></td>'.
                  '</tr>'.
                  '<tr >'.
                  '<td><input type="text" value="'.$d->apd_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="" name="syscode[]" class="acid" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$d->apd_amount.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$d->apd_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$d->apd_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>';
              }          
            }
          }elseif ($type == "apr") {
           $apr = $this->db->query("SELECT * from ap_ret_header where apr_code = '$code'  and compcode='$compcode' ")->result();
            foreach ($apr as $r) {
              $ramt = $r->apr_net_amt;
              if ($r->apr_tax_no == "") {                
                  echo 
                  '<tr >'.
                  '<td><input type="text" value="'.$r->apr_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_mat.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="'.$r->apr_amount.'" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$r->apr_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$r->apr_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="cr" name="actype[]" ></td>'.
                  '</tr>';
                if ($r->apr_vat != "") { 
                echo 
                  '<tr >'.
                  '<td><input type="text" value="'.$r->apr_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_due.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="'.$r->apr_totalvat.'" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$r->apr_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$r->apr_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="cr" name="actype[]" ></td>'.
                  '</tr>'.
                  '<tr >'.
                  '<td><input type="text" value="'.$r->apr_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_nodue.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$r->apr_totalvat.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$r->apr_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$r->apr_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>';
                }
                echo
                  '<tr >'.
                  '<td><input type="text" value="'.$r->apr_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" name="syscode[]" class="acid" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$r->apr_amount.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$r->apr_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$r->apr_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>';             
                
              }else{
                echo 
                  '<tr >'.
                  '<td><input type="text" value="'.$r->apr_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_mat.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="'.$r->apr_amount.'" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$r->apr_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$r->apr_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="cr" name="actype[]" ></td>'.
                  '</tr>'.
                  '<tr >'.
                  '<td><input type="text" value="'.$r->apr_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="" name="syscode[]" class="acid" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$r->apr_amount.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$r->apr_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$r->apr_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>';
              }          
            }
          }elseif ($type == "apo") {
            $apo = $this->db->query("SELECT * from ap_pettycash_header join ap_pettycash_expense on ap_pettycash_expense.ex_ref = ap_pettycash_header.ap_no where ap_no = '$code'  ")->result();
            foreach ($apo as $p) {
              $pamt = ($p->ex_amt-$p->ex_towt);
              if ($p->ex_taxno == "") {                
                 echo 
                  '<tr >'.
                  '<td><input type="text" value="'.$p->ap_no.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$pac.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="'.$p->ex_amt.'" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$p->ap_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$p->ap_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="cr" name="actype[]" ></td>'.
                  '</tr>';
                if ($p->ex_vat != 0) {
                echo
                 '<tr >'.
                  '<td><input type="text" value="'.$p->ap_no.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_due.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="'.$p->ex_tovat.'" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$p->ap_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$p->ap_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="cr" name="actype[]" ></td>'.
                  '</tr>'.
                  
                  '<tr >'.
                  '<td><input type="text" value="'.$p->ap_no.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_nodue.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$p->ex_tovat.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$p->ap_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$p->ap_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>';
                }
                if ($p->ex_towt > 0) {
                echo
                  '<tr >'.
                  '<td><input type="text" value="'.$p->ap_no.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_wt3.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$p->ex_towt.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$p->ap_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$p->ap_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>';               

                }
                echo
                  '<tr >'.
                  '<td><input type="text" value="'.$p->ap_no.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" name="syscode[]" class="acid" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$pamt.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$p->ap_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$p->ap_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>'; 
                
              }else{
                echo 
                  '<tr >'.
                  '<td><input type="text" value="'.$p->ap_no.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$pac.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="'.$p->ex_amt.'" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$p->ap_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$p->ap_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="cr" name="actype[]" ></td>'.
                  '</tr>';
                if ($p->ex_towt > 0) {
                echo
                  '<tr >'.
                  '<td><input type="text" value="'.$p->ap_no.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_wt3.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$p->ex_towt.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$p->ap_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$p->ap_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>';
                }
                echo
                  '<tr >'.
                  '<td><input type="text" value="'.$p->ap_no.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" name="syscode[]" class="acid" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$pamt.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$p->ap_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$p->ap_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>';
              }          
            }
           }
          elseif ($type == "cnv") {
            $cnv = $this->db->query("SELECT * from cnv_header  where cnv_code = '$code'  ")->result();
            foreach ($cnv as $nv) {
              $cnamt = $nv->cnv_vat+$nv->cnv_totamt;
              if ($nv->cnv_tax == "") {
                echo   '<tr >'.
                  '<td><input type="text" value="'.$nv->cnv_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" name="syscode[]" class="acid" ></td>'.
                  '<td><input type="text" value="'.$nv->cnv_totamt.'" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$nv->cnv_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$nv->cnv_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="cr" name="actype[]" ></td>'.
                  '</tr>'; 
                if ($nv->cnv_vatper != 0) {
                 echo '<tr >'.
                  '<td><input type="text" value="'.$nv->cnv_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_nodue.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="'.$nv->cnv_vat.'" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$nv->cnv_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$nv->cnv_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="cr" name="actype[]" ></td>'.
                  '</tr>'.
                  '<tr >'.
                  '<td><input type="text" value="'.$nv->cnv_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_due.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$nv->cnv_vat.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$nv->cnv_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$nv->cnv_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>';
                }
                echo '<tr >'.
                  '<td><input type="text" value="'.$nv->cnv_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_mat.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$cnamt.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$nv->cnv_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$nv->cnv_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>';
              }else{
                echo 
                  '<tr >'.
                  '<td><input type="text" value="'.$nv->ap_no.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="" name="syscode[]" $nv ></td>'.
                  '<td><input type="text" value="'.$nv->ex_netamt.'" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$nv->ap_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$nv->ap_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="cr" name="actype[]" ></td>'.
                  '</tr>'.
                  '<tr >'.
                  '<td><input type="text" value="'.$nv->ap_no.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_mat.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$cnamt.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$nv->ap_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$nv->ap_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>';
              } 
            }
          }elseif ($type == "cns") {
            $cns = $this->db->query("SELECT * from cns_header  where cns_code = '$code'  ")->result();
            foreach ($cns as $ns) {
              $cnamt = $ns->cns_vattot+$ns->cns_amount;
              if ($ns->cns_invno == "") {
                echo   '<tr >'.
                  '<td><input type="text" value="'.$ns->cns_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" name="syscode[]" class="acid" ></td>'.
                  '<td><input type="text" value="'.$ns->cns_namt.'" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$ns->cns_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$ns->cns_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="cr" name="actype[]" ></td>'.
                  '</tr>';
                if ($ns->cns_vat != 0) {
                 echo '<tr >'.
                  '<td><input type="text" value="'.$ns->cns_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_nodue.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="'.$ns->cns_vattot.'" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$ns->cns_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$ns->cns_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="cr" name="actype[]" ></td>'.
                  '</tr>'.
                  '<tr >'.
                  '<td><input type="text" value="'.$ns->cns_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_due.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$ns->cns_vattot.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$ns->cns_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$ns->cns_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>';
                }
                echo '<tr >'.
                  '<td><input type="text" value="'.$ns->cns_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_mat.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$cnamt.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$ns->cns_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$ns->cns_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>';
                                
              }else{
                echo 
                  '<td><input type="text" value="'.$ns->cns_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="" name="syscode[]" $ns ></td>'.
                  '<td><input type="text" value="'.$ns->cns_namt.'" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$ns->cns_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$ns->cns_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="cr" name="actype[]" ></td>'.
                  '</tr>'.
                  '<tr >'.
                  '<td><input type="text" value="'.$ns->cns_code.'" name="ac_code[]" ></td>'.
                  '<td><input type="text" value="'.$ap_mat.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$cnamt.'" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$ns->cns_project.'" name="project[]" ></td>'.
                  '<td><input type="text" value="'.$ns->cns_system.'" name="system[]" ></td>'.
                  '<td><input type="text" value="dr" name="actype[]" ></td>'.
                  '</tr>'.
                  '<tr >';
              } 
            }
          }
          return true;
        }
        else
        {
          return false;
        }
          return true;
    }

    public function detail_cno($code, $expens, $vender)
    {
      $this->db->select('ap_pettycash_expense.*, ap_expensother.expens_name, vender_name');
      $this->db->from('ap_pettycash_expense');
      $this->db->join('ap_expensother', 'ap_pettycash_expense.ex_expenscode = ap_expensother.expens_code');
      $this->db->join('vender', 'ap_pettycash_expense.ex_vender = vender.vender_code');
      $this->db->where('ap_pettycash_expense.ex_id', $code);
      $this->db->where('ap_expensother.expens_code', $expens);
      $this->db->where('vender.vender_code', $vender);

      $query = $this->db->get();

      if ($query->num_rows() > 0) {
        $data['rows'] = $query->result();
      }else{
        $data['rows'] = [];
      }

      $this->load->view('office/account/ap/ap_reduce_apo/detail_cno', $data);
    }

    public function gl_recapo()
    {
      $code = $this->input->post('code');
      $expens = $this->input->post('expens');
      $vender = $this->input->post('vender');
      if ($code) 
      {
          $apo = $this->db->query("SELECT * from ap_pettycash_expense  where ex_id = '$code'  ")->result();
       
            $exp = $this->db->query("SELECT * from ap_expensother  where expens_code = '$expens' ")->result();
           
            $ven = $this->db->query("SELECT * from vender  where vender_code = '$vender' ")->result();

            foreach ($exp as $xx) {  
              $expensname =  $xx->expens_name;
            }

            foreach ($ven as $vv) {  
            $venname =  $vv->vender_name;
            }

          foreach ($apo as $p) {    
            echo '<tr >'.                  
              '<td>'.
              '<input type="hidden" value="I" name="" ><input type="text" style="width: 250px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$expensname.'" id="exp'.$p->ex_id.'" name="ap_code[]">'.
              '</td>'.
              '<td>'.
              '<input type="hidden" value="I" name="qtyi[]" ><input type="text" style="width: 250px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$venname.'" id="ap_vender'.$p->ex_id.'" name="ap_vender[]">'.
              '</td>'.
              
              '<td>'.
              '<input type="text" style="width: 70px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->ex_costcode.'" id="ap_cost'.$p->ex_id.'" name="ap_cost[]">'.
              '</td>'.
              '<td>'.
              '<input type="text" style="width: 120px;text-align: right;border: 1px solid #c7c6c6; height: 30px;padding: 7px 12px;" value="'.$p->ex_amt.'" id="ap_amto'.$p->ex_id.'" name="ap_amto[]">'.
              '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" value="" id="ap_total'.$p->ex_id.'" name="ap_total[]">'.
              '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="'.$p->ex_amt.'" id="ap_amtt'.$p->ex_id.'" name="cn_amtt[]">'.
              '</td>'.
              '<td>'.
              '<input type="text" style="width: 40px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;"  value="" id="ap_vat2'.$p->ex_id.'" name="ap_vat2[]">'.
              '<input type="text" style="width: 40px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->ex_vat.'" id="ap_vatt'.$p->ex_id.'" name="cn_vatper[]">'.
              '<input type="text" style="width: 40px;text-align: right;border: 1px solid #c7c6c6; height: 30px;padding: 7px 12px;"  value="'.$p->ex_vat.'" id="ap_vat'.$p->ex_id.'" name="ap_vat[]">'.
              '</td>'.
             
              '<td>'.
              '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->ex_tovat.'" id="ap_vatamt'.$p->ex_id.'" name="ap_vatamt[]">'.
              '<input type="text" style="width: 120px;text-align: right;border: 1px solid #c7c6c6; height: 30px;padding: 7px 12px;" value="'.$p->ex_tovat.'" id="cn_vat'.$p->ex_id.'" readonly name="cn_vat[]">'.
              '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="" id="cn_vat2'.$p->ex_id.'" name="cn_vat2[]">'.
              '</td>'.
              '<td>'.
              '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->ex_netamt.'" id="ap_netamt'.$p->ex_id.'" name="ap_netamt[]">'.
              '<input type="text" style="width: 160px;text-align: right;border: 1px solid #c7c6c6; height: 30px;padding: 7px 12px;" value="'.$p->ex_netamt.'" id="cn_total'.$p->ex_id.'" readonly name="cn_total[]">'.
              '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="" id="ap_netamt2'.$p->ex_id.'" name="ap_netamt2[]">'.
              '<input type="hidden" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->ex_towt.'" id="ap_wt'.$p->ex_id.'" name="ap_wt[]">'.
              '</td>'.

              '<td>'.
              '<input type="text" style="width: 120px;text-align: right;border: 1px solid #c7c6c6; height: 30px;padding: 7px 12px;" value="" id="tax'.$p->ex_id.'" name="taxno[]">'.
              '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="" id="tax1'.$p->ex_id.'" name="taxno2[]">'.
              '<input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" value="" id="tax2'.$p->ex_id.'" name="taxno3[]">'.
              '</td>'.

              '<td>'.
              '<input type="text" class="form-control daterange-single" style="width: 100px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" id="tax_date'.$p->ex_id.'"  value="">'.
              '<input type="text" class="form-control daterange-single" style="width: 100px;text-align: right;border: 1px solid #c7c6c6; height: 30px;padding: 7px 12px;" id="tax_date1'.$p->ex_id.'" value="">'.
              '<input type="text" class="form-control daterange-single" style="width: 100px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" id="tax_date2'.$p->ex_id.'" name="tax_date[]"  value="">'.
              '</td>'.
              '<td>'.
              '<i class="icon-box-add" id="ok'.$p->ex_id.'"></i>'.
              '<i class="icon-pencil" id="sum'.$p->ex_id.'"></i>'.
              '<i class="glyphicon glyphicon-ok" id="save'.$p->ex_id.'"></i>'.
              '</td>';
            echo  '</tr>';
            echo  '<script>'.

                '$(".daterange-single").daterangepicker({'.
                  'singleDatePicker: true,'.
                  'locale: {'.
                    'format: "YYYY-MM-DD"'.
                  '}'.
                '});'.

                '$("#ap_amto'.$p->ex_id.'").hide();'.
                '$("#ap_vat'.$p->ex_id.'").hide();'.
                '$("#cn_vat'.$p->ex_id.'").hide();'.
                '$("#cn_total'.$p->ex_id.'").hide();'.
                '$("#ap_total'.$p->ex_id.'").hide();'.
                '$("#cn_vat2'.$p->ex_id.'").hide();'.
                '$("#ap_vat2'.$p->ex_id.'").hide();'.
                '$("#ap_netamt2'.$p->ex_id.'").hide();'.
                '$("#tax'.$p->ex_id.'").hide();'.
                '$("#tax2'.$p->ex_id.'").hide();'.                
                '$("#tax_date2'.$p->ex_id.'").hide();'.
                '$("#tax_date1'.$p->ex_id.'").hide();'.
                '$("#save'.$p->ex_id.'").hide();'.
                '$("#ok'.$p->ex_id.'").hide();'.

                '$("#sum'.$p->ex_id.'").click(function(){'.                    
                  '$("#ok'.$p->ex_id.'").show();'.
                  '$("#sum'.$p->ex_id.'").hide();'.
                  '$("#scnv").hide();'.
                  '$("#ap_amtt'.$p->ex_id.'").hide();'.
                  '$("#ap_vatamt'.$p->ex_id.'").hide();'.
                  '$("#ap_netamt'.$p->ex_id.'").hide();'.
                  '$("#ap_vatt'.$p->ex_id.'").hide();'.
                  '$("#ap_amto'.$p->ex_id.'").show();'.
                  '$("#ap_vat'.$p->ex_id.'").show();'.
                  '$("#cn_vat'.$p->ex_id.'").show();'.
                  '$("#cn_total'.$p->ex_id.'").show();'.
                  '$("#ap_total'.$p->ex_id.'").hide();'.
                  '$("#cn_vat2'.$p->ex_id.'").hide();'.
                  '$("#ap_vat'.$p->ex_id.'").show();'.
                  '$("#ap_netamt2'.$p->ex_id.'").hide();'.
                  '$("#tax_no").hide();'.
                  '$("#tax1'.$p->ex_id.'").hide();'.
                  '$("#tax'.$p->ex_id.'").show();'.
                  '$("#tax2'.$p->ex_id.'").hide();'.
                  '$("#tax_date'.$p->ex_id.'").hide();'.
                  '$("#tax_date1'.$p->ex_id.'").show();'.
                  '$("#tax_date2'.$p->ex_id.'").hide();'.
                    'var amt'.$p->ex_id.' = parseFloat($("#ap_amto'.$p->ex_id.'").val());'.
                    'var vat'.$p->ex_id.' = parseFloat($("#ap_vat'.$p->ex_id.'").val());'.
                    'var net'.$p->ex_id.' = parseFloat($("#cn_total'.$p->ex_id.'").val());'.
                    'var taxno'.$p->ex_id.' = $("#tax'.$p->ex_id.'").val();'.

                    'var date'.$p->ex_id.' = $("#tax_date1'.$p->ex_id.'").val();'.
                    '$("#to").val(amt'.$p->ex_id.');'.
                    '$("#tov").val(vat'.$p->ex_id.');'.
                    '$("#toa").val(net'.$p->ex_id.');'.
                    '$("#tax2'.$p->ex_id.'").val(taxno'.$p->ex_id.');'.
                    '$("#tax_date2'.$p->ex_id.'").val(date'.$p->ex_id.');'.
                '});'.

                '$("#ap_amto'.$p->ex_id.'").keyup(function(){'.
                  'var amt'.$p->ex_id.' = parseFloat($("#ap_amto'.$p->ex_id.'").val());'.
                  'var cnvatt'.$p->ex_id.' = parseFloat($("#ap_vat'.$p->ex_id.'").val());'.
                  'var amtt'.$p->ex_id.' = parseFloat($("#ap_amtt'.$p->ex_id.'").val());'.
                  'var vatamt'.$p->ex_id.' = parseFloat($("#ap_vatamt'.$p->ex_id.'").val());'. 
                  'var wt'.$p->ex_id.' = parseFloat($("#ap_wt'.$p->ex_id.'").val());'.
                  'var netamt'.$p->ex_id.' = parseFloat($("#ap_netamt'.$p->ex_id.'").val());'.
                  'var toa = parseFloat($("#toa").val());'.
                  'var to = parseFloat($("#to").val());'.
                  'var tov = parseFloat($("#tov").val());'.
                  'var cntovat'.$p->ex_id.' = (amt'.$p->ex_id.'*cnvatt'.$p->ex_id.')/100;'.
                  'var totalamt'.$p->ex_id.' = (amt'.$p->ex_id.'+cntovat'.$p->ex_id.');'.
                  'var apwt'.$p->ex_id.' = (to - amt'.$p->ex_id.');'.
                  'var amtto'.$p->ex_id.' = (toa - totalamt'.$p->ex_id.');'.
                  'var vv = (to*tov)/100;'.
                  'var cn_apvat'.$p->ex_id.' = (vv-cntovat'.$p->ex_id.');'.
                  '$("#cntovat").val(cntovat'.$p->ex_id.');'.
                  '$("#cnvat").val(cnvatt'.$p->ex_id.');'.
                  '$("#cn_vat'.$p->ex_id.'").val(cntovat'.$p->ex_id.');'.
                  '$("#cnamt").val(amt'.$p->ex_id.');'.       
                  '$("#de1'.$p->ex_id.'").val(amt'.$p->ex_id.');'.  
                  '$("#de2'.$p->ex_id.'").val(cntovat'.$p->ex_id.');'.
                  '$("#de4'.$p->ex_id.'").val(amt'.$p->ex_id.');'.  
                  '$("#de3'.$p->ex_id.'").val(cntovat'.$p->ex_id.');'.                      
                  '$("#cn_total'.$p->ex_id.'").val(totalamt'.$p->ex_id.');'.
                  '$("#totalamt").val(totalamt'.$p->ex_id.');'.
                  '$("#cn_apvat").val(cn_apvat'.$p->ex_id.');'.
                  '$("#ap_amt").val(apwt'.$p->ex_id.');'.  
                  '$("#ap_amttotal").val(amtto'.$p->ex_id.');'.  
                '});'.

                '$("#ap_vat'.$p->ex_id.'").keyup(function(){'.
                  'var cnamt'.$p->ex_id.' = parseFloat($("#ap_amto'.$p->ex_id.'").val());'.
                  'var cntotal'.$p->ex_id.' = parseFloat($("#cn_total'.$p->ex_id.'").val());'.
                  'var cnvat'.$p->ex_id.' = parseFloat($("#ap_vat'.$p->ex_id.'").val());'. 
                  'var amt'.$p->ex_id.' = parseFloat($("#ap_amtt'.$p->ex_id.'").val());'.
                  'var netamt'.$p->ex_id.' = parseFloat($("#ap_netamt'.$p->ex_id.'").val());'.
                  'var vat'.$p->ex_id.' = parseFloat($("#ap_vatt'.$p->ex_id.'").val());'. 
                  'var vatamt'.$p->ex_id.' = parseFloat($("#ap_vatamt'.$p->ex_id.'").val());'.
                  'var toa = parseFloat($("#toa").val());'.
                  'var to = parseFloat($("#to").val());'.
                  'var tov = parseFloat($("#tov").val());'.

                  'var cntovat'.$p->ex_id.' = (cnamt'.$p->ex_id.'*cnvat'.$p->ex_id.')/100;'.
                  'var totalamt'.$p->ex_id.' = (cnamt'.$p->ex_id.'+cntovat'.$p->ex_id.');'.
                  'var apwt'.$p->ex_id.' = (to - cnamt'.$p->ex_id.');'.
                  'var amtto'.$p->ex_id.' = (toa - totalamt'.$p->ex_id.');'.
                  'var vv = (to*tov)/100;'.
                  'var cn_apvat'.$p->ex_id.' = (vv-cntovat'.$p->ex_id.');'.

                  '$("#cntovat").val(cntovat'.$p->ex_id.');'.
                  '$("#cn_vat'.$p->ex_id.'").val(cntovat'.$p->ex_id.');'.
                  '$("#totalamt").val(totalamt'.$p->ex_id.');'.
                  '$("#cn_total'.$p->ex_id.'").val(totalamt'.$p->ex_id.');'.
                  '$("#cnvat").val(cnvat'.$p->ex_id.');'.
                  '$("#cn_apvat").val(cn_apvat'.$p->ex_id.');'.
                  '$("#ap_amt").val(apwt'.$p->ex_id.');'.  
                  '$("#ap_amttotal").val(amtto'.$p->ex_id.');'.                                
                '});'.

              '$("#ok'.$p->ex_id.'").click(function(){'.
              '$("#ok'.$p->ex_id.'").hide();'.
              '$("#save'.$p->ex_id.'").show();'.
              '$("#scnv").show();'.

              'var amtcn = parseFloat($("#amt_cn").val());'.
              'var cnamt'.$p->ex_id.' = parseFloat($("#ap_amto'.$p->ex_id.'").val());'.
              'var cnvat'.$p->ex_id.' = parseFloat($("#ap_vat'.$p->ex_id.'").val());'.

              'var tax'.$p->ex_id.' = $("#tax'.$p->ex_id.'").val();'. 
              'var taxdate'.$p->ex_id.' = $("#tax_date1'.$p->ex_id.'").val();'. 
              'var cntovat = parseFloat($("#cntovat").val());'. 
              'var totalamt2 = parseFloat($("#totalamt").val());'.
              'var tovatt'.$p->ex_id.' = (cnamt'.$p->ex_id.'*cnvat'.$p->ex_id.')/100;'.
              'var totamt'.$p->ex_id.' = (cnamt'.$p->ex_id.'+tovatt'.$p->ex_id.');'.

              '$("#ap_total'.$p->ex_id.'").val(cnamt'.$p->ex_id.');'.
              '$("#cn_vat2'.$p->ex_id.'").val(cntovat);'.
              '$("#ap_vat2'.$p->ex_id.'").val(cnvat'.$p->ex_id.');'.
              '$("#ap_netamt2'.$p->ex_id.'").val(totalamt2);'.
              '$("#tax2'.$p->ex_id.'").val(tax'.$p->ex_id.');'.
              '$("#tax_date2'.$p->ex_id.'").val(taxdate'.$p->ex_id.');'.
              '$("#cn_vat2'.$p->ex_id.'").val(tovatt'.$p->ex_id.');'.
              '$("#ap_netamt2'.$p->ex_id.'").val(totamt'.$p->ex_id.');'.
                  
                'if ($("#ap_netamt'.$p->ex_id.'") >= $("#cn_total'.$p->ex_id.'")) {'.
                  '$("#sum'.$p->ex_id.'").hide();'.
                  '$("#ap_amtt'.$p->ex_id.'").hide();'.
                  '$("#ap_vatt'.$p->ex_id.'").hide();'.
                  '$("#ap_vayamt'.$p->ex_id.'").hide();'.
                  '$("#ap_netamt'.$p->ex_id.'").hide();'.
                  '$("#ap_amto'.$p->ex_id.'").hide();'.
                  '$("#ap_vat'.$p->ex_id.'").hide();'.
                  '$("#cn_vat'.$p->ex_id.'").hide();'.
                  '$("#cn_total'.$p->ex_id.'").hide();'.
                  '$("#ap_total'.$p->ex_id.'").show();'.
                  '$("#cn_vat2'.$p->ex_id.'").show();'.
                  '$("#ap_vat2'.$p->ex_id.'").show();'.
                  '$("#ap_netamt2'.$p->ex_id.'").show();'.
                  '$("#tax2'.$p->ex_id.'").show();'.
                  '$("#tax_date2'.$p->ex_id.'").show();'.
                  '$("#tax'.$p->ex_id.'").hide();'.
                  '$("#tax1'.$p->ex_id.'").hide();'.
                  '$("#tax_date'.$p->ex_id.'").hide();'.
                  '$("#tax_date1'.$p->ex_id.'").hide();'.
                '}else{'.
                   'swal({'.
                    'title: "Net Amount Not Balance !!.",'.
                    'text: "",'.
                    'confirmButtonColor: "#EA1923",'.
                    'type: "error"'.
                    '});'.
                  '$("#ok'.$p->ex_id.'").hide();'.
                  '$("#ap_amto'.$p->ex_id.'").hide();'.
                  '$("#ap_vat'.$p->ex_id.'").hide();'.
                  '$("#cn_vat'.$p->ex_id.'").hide();'.
                  '$("#cn_total'.$p->ex_id.'").hide();'.
                  '$("#ap_total'.$p->ex_id.'").hide();'.
                  '$("#cn_vat2'.$p->ex_id.'").hide();'.
                  '$("#ap_vat2'.$p->ex_id.'").hide();'.
                  '$("#ap_netamt2'.$p->ex_id.'").hide();'.
                  '$("#sum'.$p->ex_id.'").show();'.
                  '$("#ap_amtt'.$p->ex_id.'").show();'.
                  '$("#ap_vatt'.$p->ex_id.'").show();'.
                  '$("#ap_vayamt'.$p->ex_id.'").show();'.
                  '$("#ap_netamt'.$p->ex_id.'").show();'.
                '}'.
                'if ($("#ap_vatt'.$p->ex_id.'") == 0 ) {'.
                'var toamtcn = amtcn + cnamt'.$p->ex_id.';'.
                '$("#amt_cn").val(toamtcn);'.
                '}'.
              '});'.
              '</script>'; 
          }        
          return true;
        }
        else
        {
          return false;
        }
          return true;
    }

    public function gl_recapo2()
    {
      $code = $this->input->post('code');
      
            $apo = $this->db->query("SELECT * from ap_pettycash_header join ap_pettycash_expense on ap_pettycash_expense.ex_ref = ap_pettycash_header.ap_no where ex_id = '$code'  ")->result();
            foreach ($apo as $p) {
             
              if ($p->ex_taxno == "") {
                
                 echo 
                  '<tr >'.
                  '<td><input type="text" value="'.$p->ex_ref.'" name="ac_code[]" id="iu" ></td>'.
                  // '<td><input type="text" value="'.$pac.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="'.$p->ex_amt.'" name="ap_dr[]" id="de1'.$p->ex_id.'" ></td>'.
                  '<td><input type="text" value="0" name="ap_cr[]" id="iu" ></td>'.
                  '<td><input type="text" value="'.$p->ap_project.'" name="project"></td>'.
                  '<td><input type="text" value="'.$p->ap_system.'" name="system" ></td>'.
                  '</tr>';
                if ($p->ex_vat != 0) {
                echo
                 '<tr >'.
                  '<td><input type="text" value="'.$p->ex_ref.'" name="ac_code[]" id=""></td>'.
                  // '<td><input type="text" value="'.$ap_due.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="'.$p->ex_tovat.'" name="ap_dr[]" id="de2'.$p->ex_id.'" ></td>'.
                  '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$p->ap_project.'" name="project"></td>'.
                  '<td><input type="text" value="'.$p->ap_system.'" name="system"></td>'.
                  '</tr>'.
                  
                  '<tr >'.
                  '<td><input type="text" value="'.$p->ex_ref.'" name="ac_code[]" ></td>'.
                  // '<td><input type="text" value="'.$ap_nodue.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$p->ex_tovat.'" name="ap_cr[]" id="de3'.$p->ex_id.'" ></td>'.
                  '<td><input type="text" value="'.$p->ap_project.'" name="project" ></td>'.
                  '<td><input type="text" value="'.$p->ap_system.'" name="system" ></td>'.
                  '</tr>';
                }
                echo
                  '<tr >'.
                  '<td><input type="text" value="'.$p->ex_ref.'" name="ac_code[]" ></td>'.
                  // '<td><input type="text" value="" name="syscode[]" class="acid" ></td>'.
                  '<td><input type="text" value="0" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="'.$p->ex_amt.'" name="ap_cr[]" id="de4'.$p->ex_id.'"  ></td>'.
                  '<td><input type="text" value="'.$p->ap_project.'" name="project" ></td>'.
                  '<td><input type="text" value="'.$p->ap_system.'" name="system" ></td>'.
                  '</tr>'; 
                
              }else{
                echo 
                  '<tr >'.
                  '<td><input type="text" value="'.$p->ex_ref.'" name="ac_code[]" ></td>'.
                  // '<td><input type="text" value="'.$pac.'" name="syscode[]" ></td>'.
                  '<td><input type="text" value="'.$p->ex_amt.'" name="ap_dr[]" ></td>'.
                  '<td><input type="text" value="0" name="ap_cr[]" ></td>'.
                  '<td><input type="text" value="'.$p->ap_project.'" name="project" ></td>'.
                  '<td><input type="text" value="'.$p->ap_system.'" name="system" ></td>'.
                  '</tr>';                                      
            }
          }     
    }


    public function ap_approve_cheque()
    {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $apscode = $this->input->post('apsno');
        $add = $this->input->post();
        
        // echo '<pre>';
        // print_r($add);
        // die();
        try {

          foreach ($add['id_update'] as $key => $value) {

            if ($add['ap_type'][$key] == 'apv') {

              $update_st_apv = array(
                'apv_status' => 'paid',
                'apv_checkno' => $add['app_code']
              );
              // echo '//(apv)';
              // print_r($update_st_apv);
              // echo '//(apv)';
              $this->db->where('apv_id', $add['id_update'][$key]);
              $this->db->update('apv_header', $update_st_apv);

            }else if($add['ap_type'][$key] == 'cnv'){

              $update_st_cnv = array(
                'cnv_status' => 'paid',
                'cnv_chqueno' => $add['app_code']
              );
              // echo '//(cnv)';
              // print_r($update_st_cnv);
              // echo '//(cnv)';
              $this->db->where('cnv_id', $add['id_update'][$key]);
              $this->db->update('cnv_header', $update_st_cnv);

            }else if($add['ap_type'][$key] == 'apo'){
              $update_st_apo = array(
                'ap_status' => 'paid',
                'ap_checkno' => $add['app_code']
              );
              // echo '//(apo)';
              // print_r($update_st_apo);
              // echo '//(apo)';
              $this->db->where('ap_id', $add['id_update'][$key]);
              $this->db->update('ap_pettycash_header', $update_st_apo);
            }else if($add['ap_type'][$key] == 'cno'){
              $update_st_cno = array(
                'cno_status' => 'paid',
                'cno_checkno' => $add['app_code']
              );
              // echo '//(cno)';
              // print_r($update_st_cno);
              // echo '//(cno)';
              $this->db->where('cno_item', $add['id_update'][$key]);
              $this->db->update('cno_header', $update_st_cno);
            }else if($add['ap_type'][$key] == 'aps'){
              if($add['ap_wtamt'] != 0) {
                $update_st_aps = array(
                  'aps_status' => 'paid',
                  'aps_checkno' => $add['app_code'],
                  'aps_wtcode' => $add['wtcode']
                );
              }else{
                $update_st_aps = array(
                  'aps_status' => 'paid',
                  'aps_checkno' => $add['app_code']
                );
              }
              // echo '//(aps)';
              // print_r($update_st_aps);
              // echo '//(aps)';
              $this->db->where('aps_id', $add['id_update'][$key]);
              $this->db->update('aps_header', $update_st_aps);
            }else if($add['ap_type'][$key] == 'cns'){
              $update_st_cns = array(
                'cns_status' => 'paid',
                'cns_checkno' => $add['app_code']
              );
              // echo '//(cns)';
              // print_r($update_st_cns);
              // echo '//(cns)';
              $this->db->where('cns_id', $add['id_update'][$key]);
              $this->db->update('cns_header', $update_st_cns);
            }else if($add['ap_type'][$key] == 'apd'){
              $update_st_apd = array(
                'apd_status' => 'paid',
                'apd_checkno' => $add['app_code']
              );
              // echo '//(apd)';
              // print_r($update_st_apd);
              // echo '//(apd)';
              $this->db->where('id', $add['id_update'][$key]);
              $this->db->update('ap_down_header', $update_st_apd);
            }else if($add['ap_type'][$key] == 'apr'){
              $update_st_apr = array(
                'apr_status' => 'paid',
                'apr_checkno' => $add['app_code']
              );
              // echo '//(apr)';
              // print_r($update_st_apr);
              // echo '//(apr)';
            $this->db->where('id', $add['id_update'][$key]);
            $this->db->update('ap_ret_header',$update_st_apr);
            }
          }

            $option = array(
              'status_open' => "open",
            );
            $this->db->where('op_id', $add['paidtype']);
            $this->db->update('option_type', $option);

            if($add['ap_wtamt'] > 0){
              $data = array(
                'ap_code'       => $add['app_code'],
                'ap_vender'     => $add['vendor_id'],
                'ap_refno'      => $add['refno'],
                'ap_refdate'    => $add['refdate'],
                'ap_bank_id'    => $add['bankid'],
                'ap_typecheq'   => $add['cheq'],
                'ap_trac'       => $add['trac'],
                'ap_chno'       => $add['chno'],
                'ap_chnodate'   => $add['chnodate'],
                'ap_remark'     => $add['remark'],
                'acc_code'      => $add['acc_code'],
                'adduser'       => $username,
                'paidtype'      => $add['paidtype'],
                'ap_paidto'     => $add['paidto'],
                'createdate'    => date('Y-m-d H:i:s',now()),
                'compcode'      => $compcode,
                'ap_wtcode'     => $add['wtcode'],
                'ap_lessother'  => $add['less'],
                'wt_ch'         => $add['tow'],
                'amt_ch'        => $add['toa'],
                'vat_ch'        => $add['tov'],
                'netamt_ch'     => $add['tot'],
                'ap_status'     => "wait",
                'gl_status'     => "N"
              );
              $this->db->insert('ap_cheque_header', $data);
            }else{
                $data = array(
                'ap_code'       => $add['app_code'],
                'ap_vender'     => $add['vendor_id'],
                'ap_refno'      => $add['refno'],
                'ap_refdate'    => $add['refdate'],
                'ap_bank_id'    => $add['bankid'],
                'ap_typecheq'   => $add['cheq'],
                'ap_trac'       => $add['trac'],
                'ap_chno'       => $add['chno'],
                'ap_chnodate'   => $add['chnodate'],
                'ap_remark'     => $add['remark'],
                'acc_code'      => $add['acc_code'],
                'adduser'       => $username,
                'paidtype'      => $add['paidtype'],
                'ap_paidto'     => $add['paidto'],
                'ap_lessother'  => $add['less'],
                'wt_ch'         => $add['tow'],
                'amt_ch'        => $add['toa'],
                'vat_ch'        => $add['tov'],
                'netamt_ch'     => $add['tot'],
                'createdate'    => date('Y-m-d H:i:s',now()),
                'compcode'      => $compcode,
                'ap_status'     => "wait",
                'gl_status'     => "N"
              );
              $this->db->insert('ap_cheque_header', $data);
            }
            // echo ' if $add[ap_wtamt] > 0 header';
            // print_r($data);
            // echo ' if $add[ap_wtamt] > 0 header';

            if($add['ap_wtamt'] > 0){
              for ($i=0; $i < count($add['ap_code']); $i++) {
                $data_d = array(
                  'api_code'      => $add['app_code'],
                  'api_no'        => $add['ap_code'][$i],
                  'api_duedate'   => $add['ap_duedate'][$i],
                  'api_type'      => $add['ap_type'][$i],
                  'api_pono'      => $add['ap_pono'][$i],
                  'api_inv'       => $add['ap_inv'][$i],
                  'api_netamt'    => $add['ap_netamt1'][$i],
                  'api_less'      => $add['ap_less'][$i],
                  'api_amt'       => $add['ap_amt1'][$i],
                  'api_adv'       => $add['ap_adv'][$i],
                  'api_vatamt'    => $add['ap_vatamt1'][$i],
                  'api_wtamt'     => $add['ap_wtamt1'][$i],
                  'api_ret'       => $add['ap_reten'][$i],
                  'api_status'    => "wait",
                  'ap_wtcode'     => $add['wtcode'],
                  'api_project'   => $add['ap_project'][$i],
                  'api_system'    => $add['ap_system'][$i],
                  'adduser'       => $username,
                  'createdate'    => date('Y-m-d H:i:s',now()),
                  'compcode'      => $compcode
                );
                $this->db->insert('ap_cheque_detail', $data_d);    
              }
            }else{
              for ($i=0; $i < count($add['ap_code']); $i++) {
              $data_d = array(
                'api_code'      => $add['app_code'],
                'api_no'        => $add['ap_code'][$i],
                'api_duedate'   => $add['ap_duedate'][$i],
                'api_type'      => $add['ap_type'][$i],
                'api_pono'      => $add['ap_pono'][$i],
                'api_inv'       => $add['ap_inv'][$i],
                'api_netamt'    => $add['ap_netamt1'][$i],
                'api_less'      => $add['ap_less'][$i],
                'api_amt'       => $add['ap_amt1'][$i],
                'api_adv'       => $add['ap_adv'][$i],
                'api_ret'       => $add['ap_reten'][$i],
                'api_vatamt'    => $add['ap_vatamt1'][$i],
                'api_wtamt'     => $add['ap_wtamt1'][$i],
                'api_status'    => "wait",
                'api_project'   => $add['ap_project'][$i],
                'api_system'    => $add['ap_system'][$i],
                'adduser'       => $username,
                'createdate'    => date('Y-m-d H:i:s',now()),
                'compcode'      => $compcode
              );
              $this->db->insert('ap_cheque_detail', $data_d);    
              }
            }  

            for ($i=0; $i < count($add['ac_code']); $i++) {
              $data_g = array(
                'ac_apcode'     => $add['app_code'],
                'ac_code'       => $add['ac_code'][$i],
                'ac_syscode'    => $add['syscode'][$i],
                'ac_dr'         => $add['ap_dr'][$i],
                'ac_cr'         => $add['ap_cr'][$i],
                'ac_project'    => $add['project'][$i],
                'ac_system'     => $add['system'][$i],
                'actype'        => $add['actype'][$i],
              );
              $this->db->insert('ap_cheque_gl', $data_g);      
          }

            // echo ' if $add[ap_wtamt] > 0 detail ';
            // print_r($data_d);
            // print_r($data_g);
            // echo ' if $add[ap_wtamt] > 0 detail ';
            // die();
        redirect('ap/apv_approve');
        
        // redirect('ap/showap_approve/'.$add['app_code']);
      } catch (Exception $e) {
           echo $e;
      }
    }

      public function addnewcns()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();
          // echo '<pre>';
          // print_r($add);die();
          try {
            
              $this->db->select('*');
              $qu = $this->db->get('cns_header');
              $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

              $cnscode = 'CNS'.date('Ym').sprintf('%03d', $res+1);

             $data = array(
               'cns_code'       => $cnscode,
              //  'cns_item'       => $cns_item,
              //  'cns_billno'     => $add['pono'],
               'ap_code'        => $add['cnap_no'],
               'cns_duedate'    => $add['duedate'],
              //  'cns_invno'      => $add['taxno'],
               'cns_project'    => $add['projectid'],
               'cns_amount'     => $add['qty'],
               'cns_namt'       => $add['amt'],
               'cns_vat'        => $add['price_unit'],
               'cns_vattot'     => $add['pamount'],
              //  'cns_department' => $add['departid'],
               'cns_payto'      => $add['venderid'],
               'cns_system'     => $add['sysid'],
               'cns_gldate'     => $add['vchdate'],
               'cns_glyear'     => $add['glyear'],
               'cns_glperiod'   => $add['glperiod'],
               'adduser'        => $username,
               'type'           => "aps",
               'compcode'       => $compcode,
             );
             $this->db->insert('cns_header',$data);

             // $id  = $this->db->insert_id();
             //  for ($i=0; $i < count($add['qtyi']); $i++) {
             //    $data_d = array(
             //        'cnvi_ref'        => $apvcode,
             //        'cnvi_qty'        => $add['qtyi'][$i],
             //        'cnvi_unit'       => $add['uniti'][$i],
             //        'cnvi_priceunit'  => $add['priceuniti'][$i],
             //        'cnvi_amount'     => $add['amounti'][$i],
             //        'cnvi_vatper'     => $add['tovat'][$i],
             //        'cnvi_vat'        => $add['vatamti'][$i],
             //        'cnvi_netamt'     => $add['dr'][$i],
             //        'cnvi_system'     => $add['systemm'],
             //        'cnvi_costcode'   => $add['costcodei'][$i],
             //        'cnvi_costname'   => $add['costnamei'][$i],
             //        'cnvi_matcode'    => $add['matcodei'][$i],
             //        'cnvi_matname'    => $add['matnamei'][$i]
             //      );
             //     $this->db->insert('cns_detail',$data_d);
             //  }

              // cns_tax
              
              $data_aps = array(
                  'cns_amt'       => $add['qty'],
                  'cns_tovat'     => $add['pamount'],
                  'cns_namt'      => $add['amt'],
                  'cns_vat'       => $add['price_unit'],
                  'cn'            => 'cn'
              );
              $this->db->where('aps_code',$add['cnap_no']);
              $this->db->update('aps_header',$data_aps);

              for ($gl=0; $gl < count($add['ac_no']); $gl++) {
              $datag = array(
                'vchno' => $cnscode,
                'acct_no' => $add['ac_no'][$gl],
                'amtdr' => parse_num($add['dr'][$gl]),
                'amtcr' => parse_num($add['cr'][$gl]),
                'adduser' => $username,
                'createdate' => date('Y-m-d H:i:s'),
                'vchdate' => date('Y-m-d'),
                'glyear' => $add['glyear'],
                'glperiod' => $add['glperiod'],
                'compcode' => $compcode,
                'datatype' => $add['system'],
                'projectid'    => $add['projectid'],                
                'vendor_id' => $add['venderid'],
                'gltype' => $add['cntype'][$gl],
                'doctype' => "aps",
                'completegl' => "N"
              );
              $this->db->insert('ap_gl',$datag);
            }

            $base_url = $this->config->item("url_report");
            echo $base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_payvoucher.mrt&no=".$add['cnap_no'];
            // redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_payvoucher.mrt&no=".$add['cnap_no']);
          } catch (Exception $e) {
            echo $e;
          }
        }


         public function addnewcno()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();

          try {
            
             $data = array(
               'cno_code'       => $add['cncode'],
               'ap_code'        => $add['cnap_no'],
               'cno_item'       => $add['itemcode'],
               'cno_pono'       => $add['pono'],
               'createdate'     => date('Y-m-d'),               
               'cno_duedate'    => $add['duedate'],
               'cno_project'    => $add['projectid'],
               'cno_vender'     => $add['venderid'],
               'cno_system'     => $add['system'],
               'cno_gldate'     => $add['vchdate'],
               'cno_glyear'     => $add['glyear'],
               'cno_glperiod'   => $add['glperiod'],
               'adduser'        => $username,
               'type'           => "apo",
               'compcode'       => $compcode,
             );
             $this->db->insert('cno_header',$data);

             for ($i=0; $i < count($add['ap_total']); $i++) {
              $data_d = array(
                  'cnoi_ref'        => $add['cncode'],
                  'cnoi_disamt'     => $add['ap_total'][$i],
                  'cnoi_vatper'     => $add['ap_vat'][$i],
                  'cnoi_vat'        => $add['cn_vat'][$i],
                  'cnoi_wt'         => $add['cn_wt'][$i],
                  'cnoi_matname'    => $add['ap_code'][$i],
                  'cnoi_netamt'     => $add['ap_netamt'][$i],
                  'cnoi_taxno'      => $add['taxno'][$i],
                  'cnoi_costcode'   => $add['ap_cost'][$i],
                  'cnoi_taxdate'    => $add['tax_date'][$i],
                  'ap_code'         => $add['cnap_no'],
                  'cnoi_status'     => 'wait',
                );
               $this->db->insert('cno_detail',$data_d);
              }

              for ($gl=0; $gl < count($add['ac_no']); $gl++) {
              $datag = array(
                'vchno'               => $add['cncode'],
                'acct_no'             => $add['ac_no'][$gl],
                'gltype'              => $add['gltype'][$gl],
                'amtdr'               => parse_num($add['ap_dr'][$gl]),
                'amtcr'               => parse_num($add['ap_cr'][$gl]),
                'adduser'             => $username,
                'createdate'          => date('Y-m-d H:i:s'),
                'vchdate'             => date('Y-m-d'),
                'glyear'              => $add['glyear'],
                'glperiod'            => $add['glperiod'],
                'compcode'            => $compcode,
                'datatype'            => $add['system'],
                'projectid'           => $add['projectid'],                
                'vendor_id'           => $add['venderid'],
                'doctype'             => "apo",
                'completegl'          => "N",
                'ref_pettycashi_id'   => $add['ref_pyid'][$i],
                'costcode'            => $add['costcode'][$i]
              );
              $this->db->insert('ap_gl', $datag);
            }
             
             $data_apo = array(
                  'cno_amt'       => $add['ap_total'][$i],
                  'cno_tovat'     => $add['cn_vat'][$i],
                  'cno_namt'      => $add['ap_netamt'][$i],
                  'cno_vat'       => $add['ap_vat'][$i],                  
                  'cn'            => 'cn'
              );
              $this->db->where('ex_ref',$add['cnap_no']);
              $this->db->update('ap_pettycash_expense',$data_apo);
               

              redirect('ap/ap_reduce_apo');

          } catch (Exception $e) {
            echo $e;
          }
        }


      public function query_job()
      {
        $decode = $this->input->post('decode');
        $procode = $this->input->post('procode');
        $jj = $this->db->query("SELECT * from project_item join system on system.systemcode = project_item.projectd_job where project_code = '$procode'")->result();

        if ($decode == "") {
            if ($procode) {
            // echo $procode;
            echo '<select class="form-control" id="jobcode" name="jobcode">';

            foreach ($jj as $job) {
            echo '<option value="'.$job->projectd_job.'">'.$job->systemname.'</option>';
            }
            echo '</select>';
            return true;
           }else{
            echo '<select class="form-control" id="jobcode" name="jobcode">'.
                '<option value="1">Overhead</option>'.
          '</select>';
           }       
          return true;
        }       
        else
        {
          return false;
        }
          return true;
      }

    public function setup_expensother()
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $add = $this->input->post();
        try {
          if ($add['flag'] == "new") {
            $data = array(
            'expens_code' => $add['id'],
            'expens_name' =>$add['epxname'],
            'ac_code' => $add['accno1'],
            'ac_name' => $add['act_name1'],
            'ac_code2' => $add['accno2'],
            'ac_name2' => $add['act_name2'],
            'costcode' => $add['vcostcode'],
            'costname' => $add['list'],
            'adduser' => $username,
            'active'=> $add['status'],
            'type' => $add['exac_type'],
            'adddate' => date('Y-m-d H:i:s',now()),
          );
          $this->db->insert('ap_expensother',$data);
          }else{
            $dataa = array(
            'expens_name' =>$add['epxname'],
            'ac_code' => $add['accno1'],
            'ac_name' => $add['act_name1'],
            'ac_code2' => $add['accno2'],
            'ac_name2' => $add['act_name2'],
            'costcode' => $add['vcostcode'],
            'costname' => $add['list'],
            'active'=> $add['status'],
            'type' => $add['exac_type'],
            'edituser' => $username,
            'editdate' => date('Y-m-d H:i:s',now()),
          );
          $this->db->where("expens_code",$add['id']);
          $this->db->update('ap_expensother',$dataa);
          }
          
        } catch (Exception $e) {
          echo $e;
        }

        redirect('data_master/expensother');
      }

      public function delexp()
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $code = $this->uri->segment(3);
          $data = array(
            'deluser' => $username,
            'deldate' => date('Y-m-d H:i:s',now()),
            'active' => "N"
          );
          $this->db->where("expens_code",$code);
          $this->db->update('ap_expensother',$data);
        redirect('data_master/expensother');
      }

       public function ap_getpost_gl()
    {

      $year = $this->input->post('year');
      $period = $this->input->post('period');
      $type = $this->input->post('type');
      if($type){
          if ($type == "apv") {
          $sumar = $this->db->query("SELECT SUM(tocr) as tocr,SUM(todr) as todr FROM (
          SELECT apv_code,SUM(amtcr) as tocr,SUM(amtdr) as todr FROM apv_header JOIN ap_gl on ap_gl.vchno=apv_code and ap_gl.doctype=apv_type  WHERE apv_status  != 'delete' and apv_glyear = $year and apv_glperiod = $period and gl_status  = 'N' 
          UNION ALL
          SELECT apd_code,SUM(amtcr) as tocr,SUM(amtdr) as todr FROM ap_down_header JOIN ap_gl on ap_gl.vchno=apd_code and ap_gl.doctype=apd_type  WHERE apd_status  != 'delete' and apd_year = $year and apd_period = $period and gl_status  = 'N' 
          UNION ALL
          SELECT apr_code,SUM(amtcr) as tocr,SUM(amtdr) as todr FROM ap_ret_header JOIN ap_gl on ap_gl.vchno=apr_code and ap_gl.doctype=apr_type  WHERE apr_status  != 'delete' and apr_year = $year and apr_period = $period and gl_status  = 'N' ) t
             ")->result();

          foreach ($sumar as $sum) {
          $todr = $sum->todr;
          $tocr = $sum->tocr;
          }
        }elseif ($type == "aps") {
          $sumaps = $this->db->query("SELECT 'aps' as type,aps_code,SUM(amtcr) as tocr,SUM(amtdr) as todr FROM aps_header JOIN ap_gl on ap_gl.vchno=aps_code and ap_gl.doctype=aps_type  WHERE aps_status  != 'delete' and aps_year = $year and aps_period = $period and gl_status  = 'N' and aps_type = '$type' ")->result();

          foreach ($sumaps as $aps) {
          $todr = $aps->todr;
          $tocr = $aps->tocr;
          }
        }elseif ($type == "apo") {
          $snumapp = $this->db->query("SELECT 'apo' as type,ap_no,SUM(amtcr) as tocr,SUM(amtdr) as todr FROM ap_pettycash_header JOIN ap_gl on ap_gl.vchno=ap_pettycash_header.ap_no WHERE ap_status  != 'delete' and ap_year = $year and ap_period = $period and gl_status = 'N' and ap_type = '$type' ")->result();

          foreach ($snumapp as $apo) {
          $todr = $apo->todr;
          $tocr = $apo->tocr;
          }
        }elseif ($type == "pl") {
          $snumpl = $this->db->query("SELECT 'pl' as type,ac_apcode,SUM(ac_dr) as tocr,SUM(ac_cr) as todr FROM ap_cheque_header JOIN ap_cheque_gl on ap_cheque_gl.ac_apcode=ap_cheque_header.ap_code WHERE ap_status = 'complete' and ded_yearvender = $year and ded_periodvender = $period and gl_status = 'N' ")->result();

          foreach ($snumpl as $pl) {
          $todr = $pl->todr;
          $tocr = $pl->tocr;
          }
        }
        else{
          $sumar = $this->db->query("SELECT SUM(tocr) as tocr,SUM(todr) as todr FROM (
          SELECT 'apv' as type,apv_code,SUM(amtcr) as tocr,SUM(amtdr) as todr FROM apv_header JOIN ap_gl on ap_gl.vchno=apv_code and ap_gl.doctype=apv_type  WHERE apv_status  != 'delete' and apv_glyear = $year and apv_glperiod = $period and gl_status  = 'N' 
          UNION ALL
          SELECT 'apd' as type,apd_code,SUM(amtcr) as tocr,SUM(amtdr) as todr FROM ap_down_header JOIN ap_gl on ap_gl.vchno=apd_code and ap_gl.doctype=apd_type  WHERE apd_status  != 'delete' and apd_year = $year and apd_period = $period and gl_status  = 'N' 
          UNION ALL
          SELECT 'apr_code' as type,apr_code,SUM(amtcr) as tocr,SUM(amtdr) as todr FROM ap_ret_header JOIN ap_gl on ap_gl.vchno=apr_code and ap_gl.doctype=apr_type  WHERE apr_status  != 'delete' and apr_year = $year and apr_period = $period and gl_status  = 'N' 
          UNION ALL        
          SELECT 'aps' as type,aps_code,SUM(amtcr) as tocr,SUM(amtdr) as todr FROM aps_header JOIN ap_gl on ap_gl.vchno=aps_code and ap_gl.doctype=aps_type  WHERE aps_status  != 'delete' and aps_year = $year and aps_period = $period and gl_status  = 'N' and aps_type = '$type'
          UNION ALL
          SELECT 'apo' as type,ap_no,SUM(amtcr) as tocr,SUM(amtdr) as todr FROM ap_pettycash_header JOIN ap_gl on ap_gl.vchno=ap_pettycash_header.ap_no WHERE ap_status  != 'delete' and ap_year = $year and ap_period = $period and gl_status = 'N' and ap_type = '$type'
          UNION ALL
          SELECT 'pl' as type,ac_apcode,SUM(ac_dr) as tocr,SUM(ac_cr) as todr FROM ap_cheque_header JOIN ap_cheque_gl on ap_cheque_gl.ac_apcode=ap_cheque_header.ap_code WHERE ap_status = 'complete' and ded_yearvender = $year and ded_periodvender = $period and gl_status = 'N') t
             ")->result();

          foreach ($sumar as $sum) {
          $todr = $sum->todr;
          $tocr = $sum->tocr;
          }
        }
        if ($type=="all") {
        $get = $this->db->query("SELECT type,apd_code,apd_project,apd_system,acct_no,amtcr,amtdr,compcode,apd_year,apd_period,project_name,systemname,act_name,apd_vender
        FROM
        (SELECT id_apgl,'apd' as type,apd_code,apd_project,apd_system,acct_no,amtcr,amtdr,ap_down_header.compcode,apd_year,apd_period,project_name,systemname,act_name,apd_vender FROM ap_down_header JOIN ap_gl ON ap_gl.vchno=ap_down_header.apd_code LEFT JOIN project ON project.project_id = ap_down_header.apd_project LEFT JOIN system ON system.systemcode=ap_down_header.apd_system LEFT JOIN account_total on account_total.act_code=ap_gl.acct_no WHERE apd_status  != 'delete' and apd_year = $year and apd_period = $period and gl_status  = 'N' 
        UNION ALL
        SELECT id_apgl,'apr' as type,apr_code,apr_project,apr_system,acct_no,amtcr,amtdr,ap_ret_header.compcode,apr_year,apr_period,project_name,systemname,act_name,apr_vender FROM ap_ret_header JOIN ap_gl ON ap_gl.vchno=ap_ret_header.apr_code LEFT JOIN project ON project.project_id = ap_ret_header.apr_project LEFT JOIN system ON system.systemcode=ap_ret_header.apr_system LEFT JOIN account_total on account_total.act_code=ap_gl.acct_no WHERE apr_status  != 'delete' and apr_year = $year and apr_period = $period and gl_status  = 'N'
        UNION ALL
        SELECT id_apgl,'apv' as type,apv_code,apv_project,apv_system,acct_no,amtcr,amtdr,apv_header.compcode,apv_glyear,apv_glperiod,project_name,systemname,act_name,apv_vender FROM apv_header JOIN ap_gl ON ap_gl.vchno=apv_header.apv_code LEFT JOIN project ON project.project_id = apv_header.apv_project LEFT JOIN system ON system.systemcode=apv_header.apv_system LEFT JOIN account_total on account_total.act_code=ap_gl.acct_no WHERE apv_status  != 'delete' and apv_glyear = $year and apv_glperiod = $period and gl_status  = 'N'
        UNION ALL
        SELECT id_apgl,'aps' as type,aps_code,aps_project,aps_system,acct_no,amtcr,amtdr,aps_header.compcode,aps_year,aps_period,project_name,systemname,act_name,aps_vender FROM aps_header JOIN ap_gl ON ap_gl.vchno=aps_header.aps_code LEFT JOIN project ON project.project_id = aps_header.aps_project LEFT JOIN system ON system.systemcode=aps_header.aps_system LEFT JOIN account_total on account_total.act_code=ap_gl.acct_no WHERE aps_status  != 'delete' and aps_year = $year and aps_period = $period and gl_status  = 'N'
        UNION ALL
        SELECT id_apgl,'apo' as type,ap_no,ap_project,ap_system,acct_no,amtcr,amtdr,ap_pettycash_header.compcode,ap_year,ap_period,project_name,systemname,act_name,ap_vendor FROM ap_pettycash_header JOIN ap_gl ON ap_gl.vchno=ap_pettycash_header.ap_no LEFT JOIN project ON project.project_id = ap_pettycash_header.ap_project LEFT JOIN system ON system.systemcode=ap_pettycash_header.ap_system LEFT JOIN account_total on account_total.act_code=ap_gl.acct_no WHERE ap_status  != 'delete' and ap_year = $year and ap_period =$period and gl_status  = 'N'
        UNION ALL
        SELECT ac_id,'pl' as type,ap_code,ac_project,ac_system,ac_syscode,ac_dr,ac_cr,ap_cheque_header.compcode,ded_yearvender,ded_periodvender,project_name,systemname,act_name,ap_vender FROM ap_cheque_header JOIN ap_cheque_gl ON ap_cheque_gl.ac_apcode=ap_cheque_header.ap_code LEFT JOIN project ON project.project_id = ap_cheque_gl.ac_project LEFT JOIN system ON system.systemcode=ap_cheque_gl.ac_system LEFT JOIN account_total on account_total.act_code=ap_cheque_gl.ac_syscode WHERE ap_status = 'complete' and ded_yearvender = $year and ded_periodvender =$period  and gl_status  = 'N'
        ) t
        GROUP BY id_apgl
              
          ")->result();
        }else{
          $get = $this->db->query("SELECT type,apd_code,apd_project,apd_system,acct_no,amtcr,amtdr,compcode,apd_year,apd_period,project_name,systemname,act_name,apd_vender
        FROM
        (SELECT id_apgl,'apd' as type,apd_code,apd_project,apd_system,acct_no,amtcr,amtdr,ap_down_header.compcode,apd_year,apd_period,project_name,systemname,act_name,apd_vender FROM ap_down_header JOIN ap_gl ON ap_gl.vchno=ap_down_header.apd_code LEFT JOIN project ON project.project_id = ap_down_header.apd_project LEFT JOIN system ON system.systemcode=ap_down_header.apd_system LEFT JOIN account_total on account_total.act_code=ap_gl.acct_no WHERE apd_status  != 'delete' and apd_year = $year and apd_period = $period and 'apv' = '$type' and gl_status  = 'N' 
        UNION ALL
        SELECT id_apgl,'apr' as type,apr_code,apr_project,apr_system,acct_no,amtcr,amtdr,ap_ret_header.compcode,apr_year,apr_period,project_name,systemname,act_name,apr_vender FROM ap_ret_header JOIN ap_gl ON ap_gl.vchno=ap_ret_header.apr_code LEFT JOIN project ON project.project_id = ap_ret_header.apr_project LEFT JOIN system ON system.systemcode=ap_ret_header.apr_system LEFT JOIN account_total on account_total.act_code=ap_gl.acct_no WHERE apr_status  != 'delete' and apr_year = $year and apr_period = $period and 'apv' = '$type' and gl_status  = 'N'
        UNION ALL
        SELECT id_apgl,'apv' as type,apv_code,apv_project,apv_system,acct_no,amtcr,amtdr,apv_header.compcode,apv_glyear,apv_glperiod,project_name,systemname,act_name,apv_vender FROM apv_header JOIN ap_gl ON ap_gl.vchno=apv_header.apv_code LEFT JOIN project ON project.project_id = apv_header.apv_project LEFT JOIN system ON system.systemcode=apv_header.apv_system LEFT JOIN account_total on account_total.act_code=ap_gl.acct_no WHERE apv_status  != 'delete' and apv_glyear = $year and apv_glperiod = $period and 'apv' = '$type' and gl_status  = 'N'
        UNION ALL
        SELECT id_apgl,'aps' as type,aps_code,aps_project,aps_system,acct_no,amtcr,amtdr,aps_header.compcode,aps_year,aps_period,project_name,systemname,act_name,aps_vender FROM aps_header JOIN ap_gl ON ap_gl.vchno=aps_header.aps_code LEFT JOIN project ON project.project_id = aps_header.aps_project LEFT JOIN system ON system.systemcode=aps_header.aps_system LEFT JOIN account_total on account_total.act_code=ap_gl.acct_no WHERE aps_status  != 'delete' and aps_year = $year and aps_period = $period and 'aps' = '$type' and gl_status  = 'N'
        UNION ALL
        SELECT id_apgl,'apo' as type,ap_no,ap_project,ap_system,acct_no,amtcr,amtdr,ap_pettycash_header.compcode,ap_year,ap_period,project_name,systemname,act_name,ap_vendor FROM ap_pettycash_header JOIN ap_gl ON ap_gl.vchno=ap_pettycash_header.ap_no LEFT JOIN project ON project.project_id = ap_pettycash_header.ap_project LEFT JOIN system ON system.systemcode=ap_pettycash_header.ap_system LEFT JOIN account_total on account_total.act_code=ap_gl.acct_no WHERE ap_status  != 'delete' and ap_year = $year and ap_period =$period and 'apo' = '$type' and gl_status  = 'N'
        UNION ALL
        SELECT ac_id,'pl' as type,ap_code,ac_project,ac_system,ac_syscode,ac_dr,ac_cr,ap_cheque_header.compcode,ded_yearvender,ded_periodvender,project_name,systemname,act_name,ap_vender FROM ap_cheque_header JOIN ap_cheque_gl ON ap_cheque_gl.ac_apcode=ap_cheque_header.ap_code LEFT JOIN project ON project.project_id = ap_cheque_gl.ac_project LEFT JOIN system ON system.systemcode=ap_cheque_gl.ac_system LEFT JOIN account_total on account_total.act_code=ap_cheque_gl.ac_syscode WHERE ap_status = 'complete' and ded_yearvender = $year and ded_periodvender =$period and 'pl' = '$type' and gl_status  = 'N'
        ) t
        GROUP BY id_apgl
              
          ")->result();
        }
        
        if ($get) {
            foreach ($get as $ar) {
          echo 
            '<tr >'.
            '<td>'.
            '<input type="hidden" value="'.$ar->type.'" id="ap_type" name="ap_type[]"><input type="hidden" value="'.$ar->apd_code.'" id="ap_code" name="ap_code[]">'.$ar->apd_code.
            '</td>'.
            '<td>'.
            '<input type="hidden" value="'.$ar->acct_no.'" id="ap_actcode" name="ap_actcode[]">'.$ar->act_name.
            '</td>'.
            '<td>'.
            '<input type="hidden" value="'.$ar->apd_project.'" id="ap_project" name="ap_project[]">'.$ar->project_name.
            '</td>'.
            '<td>'.
            '<input type="hidden" value="'.$ar->apd_system.'" id="ap_job" name="ap_job[]">'.$ar->systemname.
            '<input type="hidden" value="'.$ar->apd_vender.'" id="acc_owner" name="acc_owner[]">'.
            '</td>'.
            '<td align="right">'.
            '<input type="hidden" value="'.$ar->amtdr.'" id="ap_dr" name="ap_dr[]">'.number_format($ar->amtdr,2).
            '</td>'.
            '<td align="right">'.
            '<input type="hidden" value="'.$ar->amtcr.'" id="ap_cr" name="ap_cr[]">'.number_format($ar->amtcr,2).
            '</td>';
          echo '</tr>';
        }
        
          echo  '<script>'.
                  'var todr = "'.$todr.'";'.
                  'var tocr = "'.$tocr.'";'.
                    '$("#ar_dramt").val(todr);'.
                    '$("#ar_cramt").val(tocr);'.
                '</script>';
        }else{
          return true;
        }
      }else{
        return false;
      }
      return true;
    }

    public function ap_addpost_gl()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $datestring = "Y";
             $mm = "m";
             $dd = "d";

             $this->db->select('*');
             $qu = $this->db->get('gl_post_ap');
             $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

             if ($res==0) {
               $doccode = "GR".date($datestring).date($mm)."000"."1";
               $apono ="1";
             }else{
               $this->db->select('*');
               $this->db->order_by('gl_id','desc');
               $this->db->limit('1');
               $q = $this->db->get('gl_post_ap');
               $run = $q->result();
               foreach ($run as $valx)
               {
                 $x1 = $valx->gl_id+1;
               }
              //  $apocode = "PV".date($datestring).date($mm).date($dd).$x1;
              //  $apono=$x1;
               if ($x1<=9) {
                  $doccode = "GP".date($datestring).date($mm)."000".$x1;
                  $apono=$x1;
               }
               elseif ($x1<=99) {
                 $doccode = "GP".date($datestring).date($mm)."00".$x1;
                 $apono=$x1;
               }
               elseif ($x1<=999) {
                 $doccode = "GP".date($datestring).date($mm)."0".$x1;
                 $apono=$x1;
               }
             }

      for ($i=0; $i < count($add['ap_dr']); $i++) {
        $data = array(
          'gl_type' => $add['ap_type'][$i],
          'gl_refcode' => $add['ap_code'][$i],
          'gl_actcode' => $add['ap_actcode'][$i],
          'gl_project' => $add['ap_project'][$i],
          'gl_job' => $add['ap_job'][$i],
          'gl_dr' => $add['ap_dr'][$i],
          'gl_cr' => $add['ap_cr'][$i],
          'gl_year' => $add['yearsel'],
          'gl_period' => $add['glperiod'],
          'useradd' => $username,
          'compcode' => $compcode,
          'gl_debtor' => $add['acc_owner'][$i],
          'adddate' => date('Y-m-d H:i:s',now()),
          'gl_code' => $doccode,
          'status' => "wait"
        );  
      $this->db->insert('gl_post_ap',$data);
      
      if ($add['ap_type'][$i] == "apv") {
        $apd = array(
          'gl_status' => "Y"
        );
        $this->db->where('apd_year',$add['yearsel']);
        $this->db->where('apd_period',$add['glperiod']);
        $this->db->where('apd_status !=',"delete");
        $this->db->update('ap_down_header',$apd);

        $apvv = array(
          'gl_status' => "Y"
        );
        $this->db->where('apv_glyear',$add['yearsel']);
        $this->db->where('apv_glperiod',$add['glperiod']);
        $this->db->where('apv_status !=',"delete");
        $this->db->update('apv_header',$apvv);

        $apr = array(
          'gl_status' => "Y"
        );
        $this->db->where('apr_year',$add['yearsel']);
        $this->db->where('apr_period',$add['glperiod']);
        $this->db->where('apr_status !=',"delete");
        $this->db->update('ap_ret_header',$apr);


      }elseif ($add['ap_type'][$i] == "aps") {
        $aps = array(
          'gl_status' => "Y"
        );
        $this->db->where('aps_glyear',$add['yearsel']);
        $this->db->where('aps_period',$add['glperiod']);
        $this->db->where('aps_status !=',"delete");
        $this->db->update('aps_header',$aps);
      
      }elseif ($add['ap_type'][$i] == "apo") {
        $app = array(
          'gl_status' => "Y"
        );
        $this->db->where('ap_year',$add['yearsel']);
        $this->db->where('ap_period',$add['glperiod']);
        $this->db->where('ap_status !=',"delete");
        $this->db->update('ap_pettycash_header',$app);
      }

      elseif ($add['ap_type'][$i] == "pl") {
        $app = array(
          'gl_status' => "Y"
        );
        $this->db->where('ap_status',"complete");
        $this->db->where('ded_yearvender',$add['yearsel']);
        $this->db->where('ded_periodvender',$add['glperiod']);
        $this->db->update('ap_cheque_header',$app);
      }
      }

      redirect('ap/post_to_gl_system');
    }

    public function ap_apvremore()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $period =$this->input->post('period');
      $code =$this->input->post('code');
      $reccode =$this->input->post('reccode');
      $datapo = array(
          'apv_status' => "no"
      );
      $this->db->where("apv_status","yes");
      $this->db->where("po_reccode",$reccode);
      $this->db->update('receive_po',$datapo);

      $data = array(
          'apv_comment' => $this->input->post('comment'),
          'apv_userdel' => $username,
          'deldate' => date('Y-m-d H:i:s',now()),
          'apv_status' => "delete"
      );
      $this->db->where("apv_glperiod",$period);
      $this->db->where("apv_code",$code);
       if($this->db->update('apv_header',$data))
      {
        echo $code;
      }else{
        echo "error";
        return false;
      }
    }

    public function ap_apdremore()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $period =$this->input->post('period');
      $code =$this->input->post('code');
      $data = array(
          'apd_comment' => $this->input->post('comment'),
          'apd_userdel' => $username,
          'deldate' => date('Y-m-d H:i:s',now()),
          'apd_status' => "delete"
      );
      $this->db->where("apd_period",$period);
      $this->db->where("apd_code",$code);
       if($this->db->update('ap_down_header',$data))
      {
        echo $code;
      }else{
        echo "error";
        return false;
      }
    }

    public function ap_aprremore()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $period =$this->input->post('period');
      $code =$this->input->post('code');
      $data = array(
          'apr_comment' => $this->input->post('comment'),
          'apr_userdel' => $username,
          'deldate' => date('Y-m-d H:i:s',now()),
          'apr_status' => "delete"
      );
      $this->db->where("apr_period",$period);
      $this->db->where("apr_code",$code);
       if($this->db->update('ap_ret_header',$data))
      {
        echo $code;
      }else{
        echo "error";
        return false;
      }
    }

        public function ap_apsremore()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $period =$this->input->post('period');
      $billcode =$this->input->post('billcode');
      $code =$this->input->post('code');
      $type =$this->input->post('type');
      $databill = array(
          'ap_status' => "N"
      );
      $this->db->where("ap_status","wait");
      $this->db->where("ap_period",$period);
      $this->db->where("ap_bill_type",$type);
      $this->db->where("ap_bill_contractno",$billcode);
      $this->db->update('ap_billsuc_header',$databill);

      $data = array(
        'aps_comment' => $this->input->post('comment'),
        'deluser' => $username,
        'deldate' => date('Y-m-d H:i:s',now()),
        'aps_status' => "delete"
      );
      $this->db->where("aps_code",$code);
       if($this->db->update('aps_header',$data))
      {
        echo $code;
      }else{
        echo "error";
        return false;
      }
    }

    public function ap_aporemore()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $pcode =$this->input->post('pcode');
      $code =$this->input->post('code');
      $datap = array(
          'status' => "wait"
      );
      $this->db->where("status","paid");
      $this->db->where("docno",$pcode);
      $this->db->update('pettycash',$datap);

      $data = array(
        'ap_comment' => $this->input->post('comment'),
        'userdel' => $username,
        'deldate' => date('Y-m-d H:i:s',now()),
        'ap_status' => "delete"
      );
      $this->db->where("ap_no",$code);
      $this->db->where("doc_no",$pcode);
      if($this->db->update('ap_pettycash_header',$data))
      {
        echo $code;
      }else{
        echo "error";
        return false;
      }
    }

    public function ap_chqueremore()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $code =$this->input->post('code');
      $datap = array(
          'ap_status' => "wait"
      );
      $this->db->where("ap_status","paid");
      $this->db->where("ap_checkno",$code);
      $this->db->update('ap_pettycash_header',$datap);

      $datad = array(
          'apd_status' => "wait"
      );
      $this->db->where("apd_status","paid");
      $this->db->where("apd_checkno",$code);
      $this->db->update('ap_down_header',$datad);

      $datar = array(
          'apr_status' => "wait"
      );
      $this->db->where("apr_status","paid");
      $this->db->where("apr_checkno",$code);
      $this->db->update('ap_ret_header',$datar);

      $datav = array(
          'apv_status' => "wait"
      );
      $this->db->where("apv_status","paid");
      $this->db->where("apv_checkno",$code);
      $this->db->update('apv_header',$datav);

      $datas = array(
          'aps_status' => "wait"
      );
      $this->db->where("aps_status","paid");
      $this->db->where("aps_checkno",$code);
      $this->db->update('aps_header',$datas);

      $data = array(
        'ap_comment' => $this->input->post('comment'),
        'userdel' => $username,
        'deldate' => date('Y-m-d H:i:s',now()),
        'ap_status' => "delete",
        'ap_deletetype' => "ac"
      );
      // $this->db->where("ap_status","wait");
      $this->db->where("ap_code",$code);
      if($this->db->update('ap_cheque_header',$data))
      {
        echo $code;
      }else{
        echo "error";
        return false;
      }
    }

    public function ap_pvremore()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $code =$this->input->post('code');

      $data = array(
        'ap_comment' => $this->input->post('comment'),
        'userdel' => $username,
        'deldate' => date('Y-m-d H:i:s',now()),
        'ap_status' => "wait",
        'ap_deletetype' => "pv"
        
      );
      $this->db->where("ap_pl",$code);
      if($this->db->update('ap_cheque_header',$data))
      {
        echo $code;
      }else{
        echo "error";
        return false;
      }
    }

    public function add_chq_canc()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $code =$this->input->post('code');

      $data = array(
        'ap_comment' => $this->input->post('comment'),
        'userdel' => $username,
        'deldate' => date('Y-m-d H:i:s',now()),
        'ap_status' => "wait",
        'ap_deletetype' => "pv"
      );
      $this->db->where("ap_pl",$code);
      if($this->db->update('ap_cheque_header',$data))
      {
        echo $code;
      }else{
        echo "error";
        return false;
      }
    }
     public function add_chk_active()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      // $code =$this->input->post('chk');
      $epc = $this->uri->segment(3);
      $val = $this->uri->segment(4);
      $data = array(
      'active' => $val,
          );
      $this->db->where("expens_code",$epc);
      $this->db->update('ap_expensother',$data);
    }

      public function selectdate()
    {

      $y = $this->input->post('y');
      $m = $this->input->post('m');
      $d = $this->input->post('d');
      $sql = "select count(gl_id) as countact from gl_period where active='Y' and glperiod='$m' and glyear='$y' ";
      $ps=$this->db->query($sql)->result();
      foreach ($ps as $key => $value) {
        if ($value->countact==0) {
         echo "N";
        }else{
          echo "Y";
        }
        
      }
     
      return true;
    }

    public function addedit_apd()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      // echo '<pre>';
      // print_r($add);
      // die();
      //update header
      $header = array(
        'apd_tax_no'    => $add['tax_no'],
        'apd_term'      => $add['crterm'],
        'apd_duedate'   => $add['duedate'],
        'apd_amount'    => $add['qty'],
        'apd_vat'       => $add['price_unit'],
        'apd_totalvat'  => $add['pamount'],
        'apd_net_amt'   => $add['amt'],
        'apd_date'      => $add['vchdate'],
        'apd_period'    => $add['glperiod'],
        'apd_year'      => $add['glyear'],
        'apd_datatype'  => $add['datatype'],
      );
      $this->db->where('id', $add['header_id']);
      $this->db->update('ap_down_header', $header);
      //update header

      //update PO
      $up_po = array(
        'sumdown' => $add['qty']
      );
      $this->db->where('po_id', $add['po_id']);
      $this->db->update('po', $up_po);
      //update PO

      // update gl
      foreach ($add['id_gl'] as $key => $gl) {
        $data_gl = array(
          'acct_no' => $add['acct_code'][$key],
          'amtdr' => $add['dr'][$key],
          'amtcr' => $add['cr'][$key],
        );

        $this->db->where('id_apgl', $add['id_gl'][$key]);
        $this->db->update('ap_gl', $data_gl);
      }
      
      // update tax
      foreach ($add['id_tax'] as $key => $gl) {
        $data_tax = array(
          'apdi_amtax'    => $add['tax_de'][$key],
          'apdi_tiv'      => $add['branch_de'][$key],
          'apdi_tax'      => $add['taxiv'][$key],
          'apdi_taxdate'  => $add['tdate'][$key],
          'apdi_amount'   => $add['amtax'][$key],
          'apdi_vat'      => $add['vattax'][$key],
          'apdi_vatt'     => $add['amttax'][$key],
        );

        $this->db->where('id', $add['id_tax'][$key]);
        $this->db->update('ap_down_detail', $data_tax);
      }
      // update tax

      // new insert Tax
      foreach ($add['nameve_in'] as $key => $gl) {
        $data_tax_in = array(
          'apdi_ref'      => $add['apd_code'],
          'apdi_amtax'    => $add['tax_de_in'][$key],
          'apdi_vendor'    => $add['nameve_in'][$key],
          'apdi_tiv'      => $add['branch_de_in'][$key],
          'apdi_tax'      => $add['taxiv_in'][$key],
          'apdi_taxdate'  => $add['tdate_in'][$key],
          'apdi_amount'   => $add['amtax_in'][$key],
          'apdi_vat'      => $add['vattax_in'][$key],
          'apdi_vatt'     => $add['amttax_in'][$key],
        );
        $this->db->insert('ap_down_detail', $data_tax_in);
      }
      // new insert Tax


      redirect('ap/all_apv_down');
    }




    public function addedit_apr()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $code = $this->uri->segment(3);

       //update header
      $header = array(
        'apr_tax_no'    => $add['tax_no'],
        'apr_term'      => $add['crterm'],
        'apr_duedate'   => $add['duedate'],
        'apr_amount'    => $add['qty'],
        'apr_vat'       => $add['price_unit'],
        'apr_totalvat'  => $add['pamount'],
        'apr_net_amt'   => $add['amt'],
        'apr_date'      => $add['vchdate'],
        'apr_period'    => $add['glperiod'],
        'apr_year'      => $add['glyear'],
        'apr_datatype'  => $add['datatype'],
      );
      $this->db->where('id', $add['header_id']);
      $this->db->update('ap_ret_header', $header);
      //update header

      //update PO
      $up_po = array(
        'sumretention' => $add['qty']
      );
      $this->db->where('po_id', $add['po_id']);
      $this->db->update('po', $up_po);
      //update PO

      // update gl
      foreach ($add['id_gl'] as $key => $gl) {
        $data_gl = array(
          'acct_no' => $add['acct_code'][$key],
          'amtdr' => $add['dr'][$key],
          'amtcr' => $add['cr'][$key],
        );

        $this->db->where('id_apgl', $add['id_gl'][$key]);
        $this->db->update('ap_gl', $data_gl);
      }
      
      // update tax
      foreach ($add['id_tax'] as $key => $gl) {
        $data_tax = array(
          'apri_amtax' => $add['tax_de'][$key],
          'apri_tiv' => $add['taxiv'][$key],
          'apri_tax' => $add['branch_de'][$key],
          'apri_taxdate'  => $add['tdate'][$key],
          'apri_amount'   => $add['amtax'][$key],
          'apri_vat'      => $add['vattax'][$key],
          'apri_vatt'     => $add['amttax'][$key],
        );

        $this->db->where('id', $add['id_tax'][$key]);
        $this->db->update('ap_ret_detail', $data_tax);
      }
      // update tax
      redirect('ap/all_apv_reten');
    }

    public function addedit_cnv()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $res = array();

      $this->db->trans_begin();

      $cnv_head = array(
        'cnv_netamt'  => $add['qty'],
        'cnv_vat'     => $add['pamount'],
        'cnv_totamt'  => $add['amt'],
        'cnv_vatper'  => $add['price_unit'],
        'cnv_gldate'  => $add['vchdate'],
        'cnv_glyear'  => $add['glyear'],
        'cnv_glperiod'  => $add['glperiod']
      );

      $this->db->where('cnv_code', $add['cnap_no']);
      $this->db->update('cnv_header', $cnv_head); 

      if( is_array($add['id_type']) ) {
        $this->db->trans_begin();
        foreach ($add['id_type'] as $key => $value) {
          $gl = array(
            'gltype' => $add['type'][$key],
            'acct_no' => $add['acc_code'][$key],
            'costcode' => $add['costcode'][$key],
            'amtdr' => $add['dr'][$key],
            'amtcr' => $add['cr'][$key],
            'edituser' => $session_data['username'],
            'editdate' => date('Y-m-d H:i:s')
          );
  
          $this->db->where('id_apgl', $add['id_type'][$key]);
          $this->db->update('ap_gl', $gl);
  
        }

        if ($this->db->trans_status() === FALSE)
        {
          $this->db->trans_rollback();
          $res['status'] = false;
          $res['message'] = "ไม่สามารถแก้ไข ap_gl ได้";
          $step3 = false;
        }else{
          $this->db->trans_commit();
          $step3 = true;
        }
      }
      
      foreach ($add['tax_id'] as $key => $value) {
        $tax = array(
          'ap_taxdate' => $add['tax_date'][$key],
          'ap_taxno' => $add['taxno'][$key],
          'ap_amtvat' => $add['amtvat'][$key],
          'ap_netamt' => $add['netamt'][$key],
          'user_update' => $session_data['username'],
          'date_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $add['tax_id'][$key]);
        $this->db->update('ap_cnv_tax', $tax);

      }

      if (isset($add['vender_code_in'])) {
        foreach ($add['vender_code_in'] as $key => $value) {
          $tax_new = array(
            'ap_code' => $add['ap_code'],
            'ref_cnv_code' => $add['cnap_no'],
            'ap_taxno' => $add['taxno_in'][$key],
            'ap_taxdate' => $add['tax_date_in'][$key],
            'project_id' => $add['projectid'],
            'vender_id' => $add['vender_code_in'][$key],
            'ap_year' => $add['glyear'],
            'ap_period' => $add['glperiod'],
            'ap_type' => $add['type_ap'],
            'ap_amtvat' => $add['amtvat_in'][$key],
            'ap_netamt' => $add['netamt_in'][$key],
            'user_create' => $session_data['username'],
            'date_create' => date('Y-m-d H:i:s'),
          );

          $this->db->insert('ap_cnv_tax', $tax_new);

        }
      }

      if ($this->db->trans_status() === FALSE)
      {
        $this->db->trans_rollback();
        $res['status'] = false;
        $res['message'] = "เกิดข้อผิดพลาด";
      }else{
        $this->db->trans_commit();
        $res['status'] = true;
        $res['message'] = "แก้ไขข้อมูลเรียบร้อยแล้ว";
      }

      echo json_encode($res);
    }

    public function addedit_cns()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      // echo '<pre>';
      // print_r($add);die();
      $data = array(
      'cns_amount' => $add['qty'],
      'cns_vattot' => $add['pamount'],
      'cns_namt' => $add['amt'],
      );

      $this->db->where("cns_code", $add['cns_code']);
      $this->db->update('cns_header',$data);

      foreach ($add['acc_code'] as $key => $value) {
        $data_c = array(          
          'acct_no' => $add['acc_code'][$key],
          'amtdr'   => parse_num($add['dr'][$key]),
          'amtcr'   => parse_num($add['cr'][$key]),          
          );
       
        $this->db->where('id_apgl', $add['id_type'][$key]);
        $this->db->update('ap_gl', $data_c);
      }
      
      foreach ($add['tax_id'] as $key => $value) {
        $data_tax = array(
          'ap_taxdate'  => $add['tax_date'][$key],
          'ap_taxno'    => $add['taxno'][$key],
          'ap_amtvat'   => $add['amtvat'][$key]
        );

        $this->db->where('id', $add['tax_id'][$key]);
        $this->db->update('cns_tax', $data_tax);
      }

      if ($code) {
        redirect('ap/reduce_aps_report');
      }
      return true;
    }


    public function editcno()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();    

      $code = $this->uri->segment(3);
      foreach ($add['ap_total'] as $key => $tab_gl) {
        $data_cno_de = array(
          'cnoi_disamt'   => $add['ap_total'][$key],
          'cnoi_vatper'   => $add['ap_vat'][$key],
          'cnoi_vat'      => $add['cn_vat'][$key],
          'cnoi_netamt'   => $add['ap_netamt'][$key],
          'cnoi_taxno'    => $add['taxno'][$key],
          'cnoi_taxdate'  => $add['tax_date'][$key]
        );
        $this->db->where('cnoi_id', $add['cnoi_id'][$key]);
        $this->db->update('cno_detail', $data_cno_de);
      }

      foreach ($add['ac_no'] as $key => $ap_gl) {
        $data_apgl = array(
          'acct_no' => $add['ac_no'][$key],
          'amtdr'   => $add['ap_dr'][$key],
          'amtcr'   => $add['ap_cr'][$key],
          'id_apgl'   => $add['id_apgl'][$key]
        );
        $this->db->where('id_apgl', $add['id_apgl'][$key]);
        $this->db->update('ap_gl', $data_apgl);
      }

      redirect('ap/reduce_apo_report');
    }



    // public function query_detail()
    // {
    //     $code = $this->input->post('code');
    //     $type = $this->input->post('type');
    //     if ($code) {
    //       if ($type == "apv") {
    //         $toamt = 0 ; $apv = $this->db->query("SELECT * from apv_header where apv_code = '$code' ")->result();
    //         foreach ($apv as $v) {
              
    //           echo '<tr >'.
    //               '<td>'.
    //               '<input type="hidden" value="I" name="qtyi[]" ><input type="hidden" value="'.$type.'" name="ap_type[]" ><input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$v->apv_code.'" id="ap_code'.$v->apv_code.'" name="ap_code[]">'.
    //               '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$v->apv_vat.'" id="ap_vatt'.$v->apv_code.'" name="ap_vat[]">'.
    //               '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="" id="ap_wtt'.$v->apv_code.'" name="ap_wt[]">'.
    //               '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$v->apv_project.'" id="ap_project'.$v->apv_code.'" name="ap_project[]">'.
    //               '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$v->apv_system.'" id="ap_system'.$v->apv_code.'" name="ap_system[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$v->apv_duedate.'" id="ap_duedate'.$v->apv_code.'" name="ap_duedate[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$v->apv_pono.'" id="ap_pono'.$v->apv_code.'" name="ap_pono[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$v->apv_inv.'" id="ap_inv'.$v->apv_code.'" name="ap_inv[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$v->apv_totamt.'" id="ap_amt1'.$v->apv_code.'" name="ap_amt1[]">'.                  
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_less'.$v->apv_code.'" name="ap_less[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$v->apv_netamt.'" id="ap_netamt1'.$v->apv_code.'" name="ap_netamt1[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_adv'.$v->apv_code.'" name="ap_adv[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$v->apv_vat.'" id="ap_vat1'.$v->apv_code.'" name="ap_vatamt1[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_wt1'.$v->apv_code.'" name="ap_wt1[]">'.
    //               '</td>';
    //               $toamt = $toamt+$v->apv_netamt;  
    //        }
    //         echo '</tr>';
    //         echo  '<script>'.
    //         'var tot = parseFloat($("#tot").val());'.
    //         'var tov = parseFloat($("#tov").val());'.
    //         'var toa = parseFloat($("#toa").val());'.
    //         'var toadv = parseFloat($("#toadv").val());'.
    //         'var tow = parseFloat($("#tow").val());'.
    //         'var total = parseFloat($("#ap_netamt1'.$v->apv_code.'").val());'.
    //         'var tovat = parseFloat($("#ap_vat1'.$v->apv_code.'").val());'.
    //         'var toamt = parseFloat($("#ap_amt1'.$v->apv_code.'").val());'.
    //         'var toadvv = parseFloat($("#ap_adv'.$v->apv_code.'").val());'.
    //         'var towt = parseFloat($("#ap_wt1'.$v->apv_code.'").val());'.
    //         'var tt = total+tot;'.
    //         'var ta = toamt+toa;'.
    //         'var tv = tovat+tov;'.
    //         'var tw = towt+tow;'.
    //         'var tadv = toadvv+toadv;'.
    //         '$("#toa").val(tt);'.
    //         '$("#tov").val(tv);'.
    //         '$("#tot").val(ta);'.
    //         '$("#toadv").val(tadv);'.
    //         '$("#tow").val(tow);'.
    //         '</script>';         

    //       }elseif($type == "aps"){
    //         $toamt = 0; $aps = $this->db->query("SELECT * from aps_header where aps_code = '$code' ")->result();
    //         foreach ($aps as $s) {
    //           echo '<tr >'.
    //               '<td>'.
    //               '<input type="hidden" value="I" name="qtyi[]" ><input type="hidden" value="'.$type.'" name="ap_type[]" ><input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_code.'" id="ap_code'.$s->aps_code.'" name="ap_code[]">'.
    //               '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_vatper.'" id="ap_vatt'.$s->aps_code.'" name="ap_vat[]">'.
    //               '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_wt.'" id="ap_wtt'.$s->aps_code.'" name="ap_wt[]">'.
    //               '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_project.'" id="ap_project'.$s->aps_code.'" name="ap_project[]">'.
    //               '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_system.'" id="ap_system'.$s->aps_code.'" name="ap_system[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_duedate.'" id="ap_duedate'.$s->aps_code.'" name="ap_duedate[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_lono.'" id="ap_pono'.$s->aps_code.'" name="ap_pono[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_invno.'" id="ap_inv'.$s->aps_code.'" name="ap_inv[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_netamt.'" id="ap_netamt1'.$s->aps_code.'" name="ap_netamt1[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_lessother.'" id="ap_less'.$s->aps_code.'" name="ap_less[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_amount.'" id="ap_amt1'.$s->aps_code.'" name="ap_amt1[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_adv'.$s->aps_code.'" name="ap_adv[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_vattot.'" id="ap_vat1'.$s->aps_code.'" name="ap_vatamt1[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$s->aps_wttot.'" id="ap_wt1'.$s->aps_code.'" name="ap_wtamt1[]">'.
    //               '</td>';
    //         }
    //         echo '</tr>';
    //         echo  '<script>'.
    //           'var toa = parseFloat($("#toa").val());'.
    //           'var tot = parseFloat($("#tot").val());'.
    //           'var tov = parseFloat($("#tov").val());'.
    //           'var toadv = parseFloat($("#toadv").val());'.
    //           'var less = parseFloat($("#less").val());'.
    //           'var tow = parseFloat($("#tow").val());'.
    //           'var tovat = parseFloat($("#ap_vat1'.$s->aps_code.'").val());'.
    //           'var towt = parseFloat($("#ap_wt1'.$s->aps_code.'").val());'.
    //           'var tadv = parseFloat($("#ap_adv'.$s->aps_code.'").val());'.
    //           'var total = parseFloat($("#ap_netamt1'.$s->aps_code.'").val());'.
    //           'var toamt = parseFloat($("#ap_amt1'.$s->aps_code.'").val());'.
    //           'var lessot = parseFloat($("#ap_less'.$s->aps_code.'").val());'.
    //           'var tt = tot+total;'.
    //           'var ta = toa+toamt;'.
    //           'var tv = tov+tovat;'.
    //           'var tw = tow+towt;'.
    //           'var ls = less+lessot;'.
    //           'var tadv = tadv+tadv;'.
    //           '$("#tot").val(tt);'.
    //           '$("#toa").val(ta);'.
    //           '$("#tov").val(tv);'.
    //           '$("#tow").val(tw);'.
    //           '$("#toadv").val(tadv);'.
    //           '$("#less").val(ls);'.
    //           '</script>'; 
    //       }elseif($type == "apd"){
    //           $toamt =0; $apd = $this->db->query("SELECT * from ap_down_header where apd_code = '$code' ")->result();
    //           foreach ($apd as $d) {
    //             echo '<tr >'.
    //               '<td>'.
    //               '<input type="hidden" value="I" name="qtyi[]" ><input type="hidden" value="'.$type.'" name="ap_type[]" ><input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$d->apd_code.'" id="ap_code'.$d->apd_code.'" name="ap_code[]">'.
    //               '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$d->apd_project.'" id="ap_project'.$d->apd_code.'" name="ap_project[]">'.
    //               '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$d->apd_system.'" id="ap_system'.$d->apd_code.'" name="ap_system[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$d->apd_duedate.'" id="ap_duedate'.$d->apd_code.'" name="ap_duedate[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="" id="ap_pono'.$d->apd_code.'" name="ap_pono[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$d->apd_tax_no.'" id="ap_inv'.$d->apd_code.'" name="ap_inv[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$d->apd_net_amt.'" id="ap_netamt1'.$d->apd_code.'" name="ap_netamt1[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_less'.$d->apd_code.'" name="ap_less[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$d->apd_amount.'" id="ap_amt1'.$d->apd_code.'" name="ap_amt1[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_adv'.$d->apd_code.'" name="ap_adv[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$d->apd_totalvat.'" id="ap_vat1'.$d->apd_code.'" name="ap_vatamt1[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_wt1'.$d->apd_code.'" name="ap_wtamt1[]">'.
    //               '</td>';
    //           }
    //         echo '</tr>';
    //           echo  '<script>'.
    //         'var toa = parseFloat($("#toa").val());'.
    //         'var tot = parseFloat($("#tot").val());'.
    //         'var tov = parseFloat($("#tov").val());'.
    //         'var toadv = parseFloat($("#toadv").val());'.
    //         'var tow = parseFloat($("#tow").val());'.
    //         'var tovat = parseFloat($("#ap_vat1'.$d->apd_code.'").val());'.
    //         'var towt = parseFloat($("#ap_wt1'.$d->apd_code.'").val());'.
    //         'var tadv = parseFloat($("#ap_adv'.$d->apd_code.'").val());'.
    //         'var total = parseFloat($("#ap_netamt1'.$d->apd_code.'").val());'.
    //         'var toamt = parseFloat($("#ap_amt1'.$d->apd_code.'").val());'.
    //         'var tt = tot+total;'.
    //         'var ta = toa+toamt;'.
    //         'var tv = tov+tovat;'.
    //         'var tw = tow+towt;'.
    //         'var tadv = tadv+tadv;'.
    //         '$("#tot").val(tt);'.
    //         '$("#toa").val(ta);'.
    //         '$("#tov").val(tv);'.
    //         '$("#tow").val(tw);'.
    //         '$("#toadv").val(tadv);'.
    //         '</script>'; 
    //       }elseif($type == "apr"){
    //         $toamt = 0; $apr = $this->db->query("SELECT * from ap_ret_header where apr_code = '$code' ")->result();
    //         foreach ($apr as $r) {
    //           echo '<tr >'.
    //               '<td>'.
    //               '<input type="hidden" value="I" name="qtyi[]" ><input type="hidden" value="'.$type.'" name="ap_type[]" ><input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$r->apr_code.'" id="ap_code'.$r->apr_code.'" name="ap_code[]">'.
    //               '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$r->apr_project.'" id="ap_project'.$r->apr_code.'" name="ap_project[]">'.
    //               '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$r->apr_system.'" id="ap_system'.$r->apr_code.'" name="ap_system[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$r->apr_duedate.'" id="ap_duedate'.$r->apr_code.'" name="ap_duedate[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="" id="ap_pono'.$r->apr_code.'" name="ap_pono[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$r->apr_tax_no.'" id="ap_inv'.$r->apr_code.'" name="ap_inv[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$r->apr_net_amt.'" id="ap_netamt1'.$r->apr_code.'" name="ap_netamt1[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_less'.$r->apr_code.'" name="ap_less[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$r->apr_amount.'" id="ap_amt1'.$r->apr_code.'" name="ap_amt1[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_adv'.$r->apr_code.'" name="ap_adv[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$r->apr_totalvat.'" id="ap_vat1'.$r->apr_code.'" name="ap_vatamt1[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="" id="ap_wt1'.$r->apr_code.'" name="ap_wtamt1[]">'.
    //               '</td>';
    //               $toamt = $toamt+$r->apr_net_amt;
    //         }
    //         echo '</tr>';
    //           echo  '<script>'.
    //         'var toa = parseFloat($("#toa").val());'.
    //         'var tot = parseFloat($("#tot").val());'.
    //         'var tov = parseFloat($("#tov").val());'.
    //         'var toadv = parseFloat($("#toadv").val());'.
    //         'var tow = parseFloat($("#tow").val());'.
    //         'var tovat = parseFloat($("#ap_vat1'.$r->apr_code.'").val());'.
    //         'var towt = parseFloat($("#ap_wt1'.$r->apr_code.'").val());'.
    //         'var tadv = parseFloat($("#ap_adv'.$r->apr_code.'").val());'.
    //         'var total = parseFloat($("#ap_netamt1'.$r->apr_code.'").val());'.
    //         'var toamt = parseFloat($("#ap_amt1'.$r->apr_code.'").val());'.
    //         'var tt = tot+total;'.
    //         'var ta = toa+toamt;'.
    //         'var tv = tov+tovat;'.
    //         'var tw = tow+towt;'.
    //         'var tadv = tadv+tadv;'.
    //         '$("#tot").val(tt);'.
    //         '$("#toa").val(ta);'.
    //         '$("#tov").val(tv);'.
    //         '$("#tow").val(tw);'.
    //         '$("#toadv").val(tadv);'.
    //         '</script>'; 
    //       }elseif($type == "apo"){
    //         $amtp = 0; $apo = $this->db->query("SELECT * from ap_pettycash_expense  where ex_ref = '$code' and status_de = 'A' ")->result();            
    //         foreach ($apo as $p) {
    //           echo '<tr id="apode" >'.
    //               '<td>'.
    //               '<input type="hidden" value="I" name="qtyi[]" ><input type="hidden" value="'.$type.'" name="ap_type[]" ><input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->ex_ref.'" id="ap_code'.$p->ex_ref.'" name="ap_code[]">'.
    //              '</td>'.                         
                                 
    //               '<td>'.
                  
    //               '</td>'.
    //               '<td>'.
    //               '</td>'.
    //               '<td>'.
    //              '<input type="hidden"  style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->ex_costcode.'" id="ap_netamt1'.$p->ex_ref.'" name="ap_netamt1[]">'.
    //               '<input type="text" class="ap_netamt" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->ex_costcode.'" id="ap_netamt'.$p->ex_ref.'" name="ap_netamt[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '</td>'.
    //               '<td>'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->ex_amt.'" id="ap_wt1'.$p->ex_ref.'" name="ap_wtamt1[]">'.
    //                '<input type="hidden" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$p->ex_amt.'" id="ap_wt'.$p->ex_ref.'" name="ap_wtamt[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<a id="delete'.$p->ex_ref.'" class="noty-runner" type="button" ><i class="icon-trash"></i></a>'.
    //               '</td>';
               
    //         }
    //         echo '</tr>';
    //         echo  '<script>'.
    //           'var toa = parseFloat($("#toa").val());'.
    //           'var tot = parseFloat($("#tot").val());'.
    //           'var tov = parseFloat($("#tov").val());'.
    //           'var toadv = parseFloat($("#toadv").val());'.
    //           'var tow = parseFloat($("#tow").val());'.
    //           'var tovat = parseFloat($("#ap_vat'.$p->ex_ref.'").val());'.
    //           'var towt = parseFloat($("#ap_wt'.$p->ex_ref.'").val());'.
    //           'var tadv = parseFloat($("#ap_adv'.$p->ex_ref.'").val());'.
    //           'var total = parseFloat($("#ap_netamt'.$p->ex_ref.'").val());'.
    //           'var toamt = parseFloat($("#ap_amt'.$p->ex_ref.'").val());'.
    //           // 'var tt = tot+total;'.
    //           // 'var ta = toa+toamt;'.
    //           // 'var tv = tov+tovat;'.
    //           // 'var tw = tow+towt;'.
    //           // 'var tadv = tadv+tadv;'.
    //           // '$("#tot").val(tt);'.
    //           // '$("#toa").val(ta);'.
    //           // '$("#tov").val(tv);'.
    //           // '$("#tow").val(tw);'.
    //           // '$("#toadv").val(tadv);'.

    //            '$("#delete'.$p->ex_ref.'").click(function(){'.                    
                  
    //               '$("#apode'.$p->ex_ref.'").hide();'.
                  
             


    //           '</script>'; 
    //       }elseif($type == "cnv"){
    //         $cnv = $this->db->query("SELECT * from cnv_header  where cnv_code = '$code'  ")->result();
    //         foreach ($cnv as $cv) {
    //           echo '<tr >'.
    //               '<td>'.
    //               '<input type="hidden" value="I" name="qtyi[]" ><input type="hidden" value="'.$type.'" name="ap_type[]" ><input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cv->cnv_code.'" id="ap_code'.$cv->cnv_code.'" name="ap_code[]">'.
    //               '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cv->cnv_project.'" id="ap_project'.$cv->cnv_code.'" name="ap_project[]">'.
    //               '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cv->cnv_system.'" id="ap_system'.$cv->cnv_code.'" name="ap_system[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cv->cnv_gldate.'" id="ap_duedate'.$cv->cnv_code.'" name="ap_duedate[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cv->ap_code.'" id="ap_pono'.$cv->cnv_code.'" name="ap_pono[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cv->cnv_tax.'" id="ap_inv'.$cv->cnv_code.'" name="ap_inv[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cv->cnv_totamt.'" id="ap_netamt1'.$cv->cnv_code.'" name="ap_netamt1[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_less'.$cv->cnv_code.'" name="ap_less[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cv->cnv_netamt.'" id="ap_amt1'.$cv->cnv_code.'" name="ap_amt1[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_adv'.$cv->cnv_code.'" name="ap_adv[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cv->cnv_vat.'" id="ap_vat1'.$cv->cnv_code.'" name="ap_vatamt1[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_wt1'.$cv->cnv_code.'" name="ap_wtamt1[]">'.
    //               '</td>';
    //         }
    //         echo '</tr>';
    //         echo  '<script>'.
    //           'var toa = parseFloat($("#toa").val());'.
    //           'var tot = parseFloat($("#tot").val());'.
    //           'var tov = parseFloat($("#tov").val());'.
    //           'var toadv = parseFloat($("#toadv").val());'.
    //           'var tow = parseFloat($("#tow").val());'.
    //           'var tovat = parseFloat($("#ap_vat1'.$cv->cnv_code.'").val());'.
    //           'var towt = parseFloat($("#ap_wt1'.$cv->cnv_code.'").val());'.
    //           'var tadv = parseFloat($("#ap_adv'.$cv->cnv_code.'").val());'.
    //           'var total = parseFloat($("#ap_netamt1'.$cv->cnv_code.'").val());'.
    //           'var toamt = parseFloat($("#ap_amt1'.$cv->cnv_code.'").val());'.
    //           'var tt = tot-total;'.
    //           'var ta = toa-toamt;'.
    //           'var tv = tov-tovat;'.
    //           'var tw = tow-towt;'.
    //           'var tadv = tadv-tadv;'.
    //           '$("#tot").val(tt);'.
    //           '$("#toa").val(ta);'.
    //           '$("#tov").val(tv);'.
    //           '$("#tow").val(tw);'.
    //           '$("#toadv").val(tadv);'.
    //           '</script>'; 
    //       }elseif ($type== "cns") {
    //         $cns = $this->db->query("SELECT * from cns_header  where cns_code = '$code'  ")->result();
    //         foreach ($cns as $cs) {
    //           echo '<tr >'.
    //               '<td>'.
    //               '<input type="hidden" value="I" name="qtyi[]" ><input type="hidden" value="'.$type.'" name="ap_type[]" ><input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cs->cns_code.'" id="ap_code'.$cs->cns_code.'" name="ap_code[]">'.
    //               '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cs->cns_project.'" id="ap_project'.$cs->cns_code.'" name="ap_project[]">'.
    //               '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cs->cns_system.'" id="ap_system'.$cs->cns_code.'" name="ap_system[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cs->cns_duedate.'" id="ap_duedate'.$cs->cns_code.'" name="ap_duedate[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cs->ap_code.'" id="ap_pono'.$cs->cns_code.'" name="ap_pono[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cs->cns_invno.'" id="ap_inv'.$cs->cns_code.'" name="ap_inv[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cs->cns_namt.'" id="ap_netamt1'.$cs->cns_code.'" name="ap_netamt1[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cs->cns_lessre.'" id="ap_less'.$cs->cns_code.'" name="ap_less[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cs->cns_namt.'" id="ap_amt1'.$cs->cns_code.'" name="ap_amt1[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_adv'.$cs->cns_code.'" name="ap_adv[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$cs->cns_vattot.'" id="ap_vat1'.$cs->cns_code.'" name="ap_vatamt1[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_wt1'.$cs->cns_code.'" name="ap_wtamt1[]">'.
    //               '</td>';
    //         }
    //         echo '</tr>';
    //           echo  '<script>'.
    //             'var toa = parseFloat($("#toa").val());'.
    //             'var tot = parseFloat($("#tot").val());'.
    //             'var tov = parseFloat($("#tov").val());'.
    //             'var toadv = parseFloat($("#toadv").val());'.
    //             'var tow = parseFloat($("#tow").val());'.
    //             'var tovat = parseFloat($("#ap_vat1'.$cs->cns_code.'").val());'.
    //             'var towt = parseFloat($("#ap_wt1'.$cs->cns_code.'").val());'.
    //             'var tadv = parseFloat($("#ap_adv'.$cs->cns_code.'").val());'.
    //             'var total = parseFloat($("#ap_netamt1'.$cs->cns_code.'").val());'.
    //             'var toamt = parseFloat($("#ap_amt1'.$cs->cns_code.'").val());'.
    //             'var tt = tot-total;'.
    //             'var ta = toa-toamt;'.
    //             'var tv = tov-tovat;'.
    //             'var tw = tow-towt;'.
    //             'var tadv = tadv+tadv;'.
    //             '$("#tot").val(tt);'.
    //             '$("#toa").val(ta);'.
    //             '$("#tov").val(tv);'.
    //             '$("#tow").val(tw);'.
    //             '$("#toadv").val(tadv);'.
    //             '</script>'; 

    //       }elseif ($type== "cno") {
    //         $cno = $this->db->query("SELECT * from cno_detail   join cno_header on cno_header.cno_code = cno_detail.cnoi_ref where cnoi_ref = '$code'  ")->result();      
    //         foreach ($cno as $co) {
    //           echo '<tr >'.
    //               '<td>'.
    //               '<input type="hidden" value="I" name="qtyi[]" ><input type="hidden" value="'.$type.'" name="ap_type[]" ><input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$co->cnoi_ref.'" id="ap_code'.$co->cnoi_ref.'" name="ap_code[]">'.
    //               '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$co->cno_project.'" id="ap_project'.$co->cnoi_ref.'" name="ap_project[]">'.
    //               '<input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$co->cno_system.'" id="ap_system'.$co->cnoi_ref.'" name="ap_system[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$co->cno_date.'" id="ap_duedate'.$co->cnoi_ref.'" name="ap_duedate[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$co->ap_code.'" id="ap_pono'.$co->cnoi_ref.'" name="ap_pono[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$co->cno_inv.'" id="ap_inv'.$co->cnoi_ref.'" name="ap_inv[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$co->cnoi_disamt.'" id="ap_netamt1'.$co->cnoi_ref.'" name="ap_netamt1[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_less'.$co->cnoi_ref.'" name="ap_less[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$co->cnoi_netamt.'" id="ap_amt1'.$co->cnoi_ref.'" name="ap_amt1[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_adv'.$co->cnoi_ref.'" name="ap_adv[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="'.$co->cnoi_vat.'" id="ap_vat1'.$co->cnoi_ref.'" name="ap_vatamt1[]">'.
    //               '</td>'.
    //               '<td>'.
    //               '<input type="text" style="text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_wt1'.$co->cnoi_ref.'" name="ap_wtamt1[]">'.
    //               '</td>';
    //         }
    //         echo '</tr>';
    //           echo  '<script>'.
    //           'var toa = parseFloat($("#toa").val());'.
    //           'var tot = parseFloat($("#tot").val());'.
    //           'var tov = parseFloat($("#tov").val());'.
    //           'var toadv = parseFloat($("#toadv").val());'.
    //           'var tow = parseFloat($("#tow").val());'.
    //           'var tovat = parseFloat($("#ap_vat1'.$co->cnoi_ref.'").val());'.
    //           'var towt = parseFloat($("#ap_wt1'.$co->cnoi_ref.'").val());'.
    //           'var tadv = parseFloat($("#ap_adv'.$co->cnoi_ref.'").val());'.
    //           'var total = parseFloat($("#ap_netamt1'.$co->cnoi_ref.'").val());'.
    //           'var toamt = parseFloat($("#ap_amt1'.$co->cnoi_ref.'").val());'.
    //           'var tt = tot-total;'.
    //           'var ta = toa-toamt;'.
    //           'var tv = tov-tovat;'.
    //           'var tw = tow-towt;'.
    //           'var tadv = tadv+tadv;'.
    //           '$("#tot").val(tt);'.
    //           '$("#toa").val(ta);'.
    //           '$("#tov").val(tv);'.
    //           '$("#tow").val(tw);'.
    //           '$("#toadv").val(tadv);'.
    //           '</script>'; 
    //         }
          
    //     return true;
    //     }
    //     else
    //     {
    //       return false;
    //     }
    //       return true;

    // }



    public function editapv()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $code = $this->uri->segment(3);
          $add = $this->input->post();         
          try {
           
             $data = array(
               'apv_duedate'    => $add['duedate'],
               'apv_inv'        => $add['tax_no'],
               'apv_crterm'     => $add['crterm'],
               'apv_project'    => $add['projectid'],
               'apv_netamt'     => $add['qty'],
               'apv_vat'        => parse_num($add['pamount']),
               'apv_vatper'     => $add['price_unit'],
               'apv_wt'         => 0,
               'apv_lessret'    => 0,
               'apv_lessadv'    => 0,
               'apv_totamt'     => parse_num($add['amt']),
               'apv_date'         => $add['vchdate'],
               'apv_gldate'     => $add['vchdate'],
               'apv_glyear'     => $add['glyear'],
               'apv_glperiod'   => $add['glperiod'],
             );
            $this->db->where("apv_code",$code);
            $this->db->update('apv_header',$data);

             $id  = $this->db->insert_id();
              for ($i=0; $i < count($add['qtyi']); $i++) {
                $data_d = array(
                    'apvi_qty'        => $add['qtyi'][$i],
                    'apvi_unit'       => $add['uniti'][$i],
                    'apvi_priceunit'  => $add['priceuniti'][$i],
                    'apvi_amount'     => $add['dr'][$i],
                    'apvi_vatper'     => $add['tovat'][$i],
                    'apvi_vat'        => $add['vatamti'][$i],
                    'apvi_netamt'     => $add['amounti'][$i],
                    // 'apvi_costcode'   => $add['costcodei'][$i],
                    // 'apvi_costname'   => $add['costnamei'][$i],
                    'apvi_matcode'    => $add['matcodei'][$i],
                    'apvi_matname'    => $add['matnamei'][$i],
                    'apvi_taxno'         => $add['tax_no'],
                    // 'poi_id'    => $add['poi_id'][$i],
                    // 'sub_costcode'    => $add['subcost'][$i]
                  );
                 $this->db->where("apvi_ref",$code);
                  $this->db->update('apv_detail',$data_d);
              }
              // add gl_post_system
              // for ($i=0; $i < count($add['cr']); $i++) {
              //   $datag = array(
              //     // 'gl_actcode' => $add['aps_paccost'][$i],
              //     'gl_dr' => $add['dr'][$i],
              //     'gl_cr' => $add['cr'][$i],
              //     'useradd' => $username,
              //     'adddate' => date('Y-m-d H:i:s',now()),
              //     'gl_date' => date('Y-m-d',now()),
              //     'gl_year' => $add['glyear'],
              //     'gl_period' => $add['glperiod']
              //   );
              //   $this->db->where("gl_refcode",$code);
              //   $this->db->update('gl_post_system',$datag);
              // }
               // add gl_post_system
              for ($gl=0; $gl < count($add['ac_no']); $gl++) {
                $data_gl = array(

                    'acct_no'       => $add['ac_no'][$gl],
                    'amtdr'         => parse_num($add['dr'][$gl]),
                    'amtcr'         => parse_num($add['cr'][$gl]),
                    'costcode'      => $add['costcode'][$gl],
                    'matcode'       => $add['matcodei'][$gl],
                    'matname'       => $add['matnamei'][$gl],
                    // 'gltype'        => $add['type'][$gl],
                    'glyear'        => $add['glyear'],
                    'glperiod'      => $add['glperiod'],
                    'adduser'       => $username,
                    'createdate'    => date('Y-m-d H:i:s',now()),
                    'compcode'      => $compcode,
                  );
                  $this->db->where("gltype",$add['gltype'][$gl]);
                  $this->db->where("vchno",$code);
                  $this->db->update('ap_gl',$data_gl);
              }
              // if ($add['taxno'] != "") {
              //   $datatax = array(
              //   'ap_taxno'   => $add['taxno'],
              //   'ap_taxdate' => $add['taxdate'],
              //   'project_id' => $add['projectid'],
              //   'vender_id'  => $add['venderid'],
              //   'ap_period'  => $add['glperiod'],
              //   'ap_year'    => $add['glyear'],
              //   'ap_type'    => 'apv',
              //   'ap_amount'  => $add['qty'],
              //   'ap_vatper'     => $add['price_unit'],
              //   'ap_amtvat'     => $add['pamount'],
              //   'ap_netamt'  => $add['amt'],
              //   'ap_taxid'   => $add['apvtaxno'],
              //   );
              //   $this->db->where("ap_code",$code);
              //   $this->db->update('ap_tax',$datatax);
              // }
              

              // $data_po = array(
              // 'apv_status' => "yes"
              // );
              // $array_porecx = explode(",", $add['porecx']);
              
              // $this->db->where_in('po_reccode',$array_porecx);
              // $this->db->update('receive_po',$data_po);

              // $data_pos = array(
              // 'apv_open' => "open"
              // );
              // $this->db->where('po_pono',$add['pono']);
              // $this->db->update('po',$data_pos);

             
              
          } catch (Exception $e) {
            echo $e;
          }
        }


        public function edit_aps_bill() 
        {
          $input = $this->input->post();

          $data = array(
            'aps_invno'       => $input['taxno'],
            'aps_invdate'     => $input['taxdate'],
            'aps_duedate'     => $input['duedate'],
            'ap_date'         => $input['vchdate'],
            'aps_year'        => $input['glyear'],
            'aps_period'      => $input['glperiod'],
          );
          $this->db->where('aps_code', $input['apsno']);
          $this->db->update('aps_header', $data);

          foreach ($input['id_apgl'] as $key => $value) {
            $ap_gl = array(
              'acct_no' => $input['acc_no'][$key],
            );
            $this->db->where('id_apgl', $input['id_apgl'][$key]);
            $this->db->update('ap_gl', $ap_gl);
          }

          foreach ($input['ap_id'] as $key => $tax) {
            $update_tax = array(
              'ap_taxno' => $input['tax_no'][$key],
              'ap_taxdate' => $input['tax_date'][$key]
            );
            $this->db->where('ap_id', $input['ap_id'][$key]);
            $this->db->update('ap_tax', $update_tax);
          }

          // redirect('ap/ap_edit_aps/'.$input['apsno'].'/aps');

        }
   
}
