<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class report extends CI_Controller {

        function __construct() {

            parent::__construct();
            $this->load->model('office_m');
            $this->load->model('report_m');
            $this->load->model('datastore_m');
        }

        public function viewerload($type=null,$typ=null,$var1=null,$var2=null){
            $module = $_GET["type"];
            $typ = $_GET["typ"];
            $data['var1'] = $_GET["var1"];
            $data['var2'] = $_GET["var2"];
            $data['var3'] = $_GET["var3"];
            $data['var4'] = $_GET["var4"];
            $data['var5'] = $_GET["var5"];
            // $data['report'] = $this->report_m->query($module,$typ);
            $print_defualt[0]['print_defualt'] = $this->report_m->getprintdefualt();
            if($_GET["type"]=="po"){
              if($print_defualt[0]['print_defualt'] == "Y"){
                $data['report'] = $this->report_m->query_comp($module,$typ,$data['var3']);
                echo "Y";
              }else{
                $data['report'] = $this->report_m->query($module,$typ);
                echo "N";
              }
            }else{
              $data['report'] = $this->report_m->query($module,$typ);
              echo "Defualt";
            }
           
            // die();
            $this->load->view('report/viewer',$data);
        }
        public function viewerloadpr($type=null,$typ=null,$var1=null,$var2=null){
          $module = $_GET["module"];
          $typ = $_GET["typ"];
          $reportname = $_GET['reportname'];
          $data['var1'] = $_GET["start"];
          $data['var2'] = $_GET["end"];
          $data['var3'] = $_GET["proid"];
          $data['var4'] = $_GET["buyn"];
          $data['var5'] = $_GET["type"];
          $data['var6'] = $_GET["session"];
          $data['var7'] = $_GET["wherepr"];
          $data['var8'] = $_GET["wherepc"];
          $data['var9'] = $_GET["date1"];
          $data['var10'] = $_GET["date2"];
          $data['var11'] = $_GET["compcode"];
          $data['var12'] = $_GET['st'];
          $data['get_doc'] = $_GET['get_doc'];
          $data['get_date'] = $_GET['get_date'];
          $data['st'] = $_GET['st'];
          $data['status'] = $_GET['status'];
          $data['query'] = $_GET['query'];
          $data['where'] = $_GET['where'];
          $data['docs'] = $_GET['docs'];
          $data['doce'] = $_GET['doce'];
          $data['get_date2'] = $_GET['get_date2'];
          $data['session_neme'] = $_GET['session_neme'];
          $data['date_pc'] = $_GET['date_pc'];
          $data['where_name'] = $_GET['where_name'];
          $data['limit_where'] = $_GET['limit_where'];
          $data['date_po'] = $_GET['date_po'];
          $data['date_wo'] = $_GET['date_wo'];
          $data['select'] = $_GET['select'];
          $data['date'] = $_GET['date'];
          $data['project'] = $_GET['project'];
          $data['pono'] = $_GET['pono'];
          $data['balance'] = $_GET['balance'];
          $data['get_dateend'] = $_GET['get_dateend'];
          $data['date1'] = $_GET['date1'];
          $data['date2'] = $_GET['date2'];
          $data['session'] = $_GET['session'];
         
          $data['report'] = $this->report_m->open_report($module,$typ,$reportname);
          $this->load->view('report/viewer_repotr',$data);
        }
        public function viewerloadpo($type=null,$typ=null,$var1=null,$var2=null){
          $module = $_GET["module"];
          $typ = $_GET["typ"];
          $reportname = $_GET['reportname'];
          $data['start'] = $_GET["start"];
          $data['end'] = $_GET["end"];
          $data['proid'] = $_GET["proid"];
          $data['buyn'] = $_GET["buyn"];
          $data['type'] = $_GET["type"];
          $data['session'] = $_GET["session"];
          $data['get_session'] = $_GET["get_session"];
          $data['wherepr'] = $_GET["wherepr"];
          $data['wherepc'] = $_GET["wherepc"];
          $data['date1'] = $_GET["date1"];
          $data['date2'] = $_GET["date2"];
          $data['compcode'] = $_GET["compcode"];
          $data['get_doc'] = $_GET['get_doc'];
          $data['get_date'] = $_GET['get_date'];
          $data['st'] = $_GET['st'];
          $data['query'] = $_GET['query'];
          $data['where'] = $_GET['where'];
          $data['docs'] = $_GET['docs'];
          $data['doce'] = $_GET['doce'];
          $data['get_date2'] = $_GET['get_date2'];
          $data['session_neme'] = $_GET['session_neme'];
          $data['date_pc'] = $_GET['date_pc'];
          $data['where_name'] = $_GET['where_name'];
          $data['limit_where'] = $_GET['limit_where'];
          $data['date_po'] = $_GET['date_po'];
          $data['date_wo'] = $_GET['date_wo'];
          $data['select'] = $_GET['select'];
          $data['date'] = $_GET['date'];
          $data['project'] = $_GET['project'];
          $data['pono'] = $_GET['pono'];
          $data['balance'] = $_GET['balance'];
          $data['get_dateend'] = $_GET['get_dateend'];
          $data['report'] = $this->report_m->open_report($module,$typ,$reportname);
          $this->load->view('report/viewer_repotpo_v',$data);
        }
        public function viewerloadgl($type=null,$typ=null,$var1=null,$var2=null){
          $module = $_GET["module"];
          $typ = $_GET["typ"];
          $reportname = $_GET['reportname'];
          $data['glyear'] = $_GET["glyear"];
          $data['glperiodstart'] = $_GET["glperiodstart"];
          $data['glperiodstop'] = $_GET["glperiodstop"];
          $data['gl_type'] = $_GET["gl_type"];
          $data['ac_codestart'] = $_GET["ac_codestart"];
          $data['ac_codestop'] = $_GET["ac_codestop"];
          $data['projectstart'] = $_GET["projectstart"];
          $data['projectstop'] = $_GET["projectstop"];
          $data['companycode'] = $_GET["companycode"];
          $data['compcode'] = $_GET['compcode'];
          $data['no'] = $_GET['no'];
          $data['report'] = $this->report_m->open_report($module,$typ,$reportname);
          $this->load->view('report/viewer_repotgl_v',$data);
        }
        public function viewerloadreport($type=null,$typ=null,$var1=null,$var2=null){
          $module = $_GET["module"];
          $typ = $_GET["typ"];
          $reportname = $_GET['reportname'];
          $data['var1'] = $_GET["var1"];
          $data['var2'] = $_GET["var2"];
          $data['var3'] = $_GET["var3"];
          $data['var4'] = $_GET["var4"];
          $data['var5'] = $_GET["var5"];
          $data['var6'] = $_GET["var6"];
          $data['var7'] = $_GET["var7"];
          $data['var8'] = $_GET["var8"];
          $data['var9'] = $_GET["var9"];
          $data['var10'] = $_GET["var10"];
          $data['report'] = $this->report_m->open_report($module,$typ,$reportname);
          $this->load->view('report/viewer_report_v',$data);
        }
        public function designerload($type=null,$typ=null){
            // $module = $_GET["type"];
            $report = $_GET['typ'];
            // $data['report'] = $this->report_m->query($module,$type);
            $data['report'] = $this->report_m->load_report($report);
            $this->load->view('report/designer',$data);
        }





         function report_pr()
        {
            $id = $this->uri->segment(3);
           $data['res'] = $this->office_m->pr_report($id);
           $dat = $this->office_m->pr_report_item($id);

           $v = array_chunk($dat,10);

			$countnum = count($v);

			foreach($v as $key => $val)
			{
        $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $data['name'] = $session_data['m_name'];
            $data['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
            $data['project'] = $session_data['m_project'];
            $data['imgu'] = $session_data['img'];
				if($key == 0)
				{
					$data['resi'] = $val;
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_print_v');
					$this->load->view('office/officeservice/report/pr_header_v',$data);
				}

				else
				{
					$data['resi'] = $val;
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_print_v');
					$this->load->view('office/officeservice/report/pr_footer_v',$data);
				}
			}
        }
        function report_po()
        {
          $session_data = $this->session->userdata('logged_in');
         $data['username'] = $session_data['username'];
           $id = $this->uri->segment(3);
        	$res =  $this->report_m->report_po($id);
        	$data['res'] = $this->office_m->po_report($id);
            $dat = $this->office_m->po_report_item($id);


            $total = 0;
            $dsum = 0;
            $exdisamt = 0;
            	foreach($dat as $bv){
            				  $sum = $bv->poi_priceunit*$bv->poi_qty;
            				  $total = $total+$bv->poi_netamt;
                      $data['exdisamt'] = $exdisamt+$bv->po_disex;
                              $dsum = $dsum+$bv->poi_disamt;
                              $s1 =($bv->poi_priceunit  - (($bv->poi_discountper1 * $bv->poi_priceunit )/ 100))*$bv->poi_qty;
							  $s = $s1- (($bv->poi_discountper2 * $s1 )/ 100);

                              $data['discount2'] = $sum - $s;
                              $data['total2'] = $total;
							  $data['xdsum'] = $dsum;
                              }


        	foreach ($res as  $value) {
        		$tot = $value->total;
        	}
        	if ($tot<=8) {
        		$data['resi'] = $this->office_m->po_report_item($id);
        		$this->load->view('office/po/report/po_master_v',$data);
        	}
        	else
        	{

	            $v = array_chunk($dat,8);

				      $countnum = count($v);

    				foreach($v as $key => $val)
    				{
    					if($key == 0)
    					{
    						$data['resi'] = $val;
    						$this->load->view('office/po/report/po_header_v',$data);
    					}
    					// else if($key == $countnum-1){
         //        $data['key']= 2;
         //        $data['dd'] = $key;
    					// 	$data['resi'] = $val;
    					// 	$this->load->view('office/po/report/po_footer_v',$data);
    					// }
    					else
    					{
                $data['key']= 1;
                $data['dd'] = $key;
    						$data['resi'] = $val;
    						$this->load->view('office/po/report/po_footer_v',$data);
    					}

    				}
        	}



        }
        function pettycash()
        {
          $session_data = $this->session->userdata('logged_in');
        $data['user'] = $session_data['username'];
            $id = $this->uri->segment(3);
            $data['res'] = $this->office_m->pc_report($id);
            $dat = $this->office_m->pc_report_item($id);


           $v = array_chunk($dat,10);

			$countnum = count($v);

			foreach($v as $key => $val)
			{
				if($key == 0)
				{
					$data['resi'] = $val;

					 $this->load->view('office/officeservice/report/petty_cash_v',$data);
				}

				else if($key == $countnum-1){
					$data['resi'] = $val;
					$this->load->view('office/officeservice/report/petty_footer_v',$data);				}
				else
				{
					$data['resi'] = $val;
					$this->load->view('office/officeservice/report/petty_page_v',$data);
				}
			}
        }


        ///////////////////////////// Report AP

        public function apv()
        {
        	$session_data = $this->session->userdata('logged_in');
            $data['name'] = $session_data['m_name'];
        	$id = $this->uri->segment(3);
        	$po = $this->uri->segment(4);
        	$data['res'] = $this->report_m->apv_report($id);
        	$data['resi'] = $this->report_m->getporec_detail($po);
        	$res = $this->report_m->countporec_detail($po);

        						$total = 0;
        	  				  $this->db->select('*');
                              $this->db->where('poi_ref',$po);
                              $query = $this->db->get('po_recitem');
                              $re = $query->result();
                              foreach ($re as $a) {
                              	 $total = ($total+$a->poi_netamt)+($a->poi_amount*7/100);
                              	 $data['total'] = $total;
                              }

        	if ($res<=6) {
        		$this->load->view('office/ap/report/report_apv_v',$data);
        	}
        	else{
        		$chk = $this->report_m->getporec_detail($po);
        		 $v = array_chunk($chk,6);

				$countnum = count($v);

      			foreach($v as $key => $val)
      			{
      				if($key == 0)
      				{
      					$data['resitem'] = $val;

      					$this->load->view('office/ap/report/report_apv_header_v',$data);
      				}else if($key == 6){
                echo $key;
      					$data['resitem'] = $val;
      					$this->load->view('office/ap/report/report_apv_footer_v',$data);

      				}else if($key == 5){
                echo $key;
      					$data['resitem'] = $val;
      					$this->load->view('office/ap/report/report_apv_center_v',$data);
      				}else if($key == 4){
                 echo $key;
      					$data['resitem'] = $val;
      					$this->load->view('office/ap/report/report_apv_center2_v',$data);
      				}else if($key == 3){
                 echo $key;
      					$data['resitem'] = $val;
      					$this->load->view('office/ap/report/report_apv_center3_v',$data);
      				}else if($key == 2){
                 echo $key;
      					$data['resitem'] = $val;
      					$this->load->view('office/ap/report/report_apv_center4_v',$data);
      				}else if($key == 1){
      					$data['resitem'] = $val;
      					$this->load->view('office/ap/report/report_apv_center5_v',$data);
      				}
      			}

        	}

        }

        ////////////// apo
        ////////////////////////////////////////////////////////////
        public function apo()
        {
          $session_data = $this->session->userdata('logged_in');
            $data['name'] = $session_data['m_name'];
          $id = $this->uri->segment(3);
          $pc = $this->uri->segment(4);
          $data['res'] = $this->report_m->apo_report($id);
          $data['resi'] = $this->report_m->getpettycash_detail($pc);
          $res = $this->report_m->countpettycast_detail($pc);

          if ($res<=6) {
            $this->load->view('office/ap/apo/report/report_apo_v',$data);
          }
          else{
            echo "เกินนะจ๊ะ";
          }
        }

        //////////////////////////////////////////////////////////////////////////////////////////////////////

         public function report_stock()
        {
        	$id = $this->uri->segment(3);
          $data['res'] = $this->report_m->getdocissue_print($id);
              $data['resi'] = $this->report_m->getdocissue_d($id);
              //$res = $this->report_m->countdocissue_d($id);
               $this->db->select('*');
              $this->db->where('isi_doccode',$id);
              $query = $this->db->get('ic_issue_d');
              $res = $query->num_rows();
              if ($res<=5) {
              $this->load->view('office/stock/report/report_docissue_v',$data);
          }
          else{
            $chk = $this->report_m->getdocissue_d($id);
             $v = array_chunk($chk,20);

              $countnum = count($v);
            foreach($v as $key => $val)
            {

              if($key == 0)
              {
                $data['resitem'] = $val;

                $this->load->view('office/stock/report/re_docissue_header_v',$data);
              }
              else
              {
                $data['resitem'] = $val;
                $this->load->view('office/stock/report/re_docissue_center_v',$data);
              }
            }

          }

        }
        public function report_stocklist()
        {
          $id = $this->uri->segment(3);
          $data['res'] = $this->report_m->getdocissue_print($id);
              $data['resi'] = $this->report_m->getdocissue_d($id);
          $this->load->view('office/stock/report/report_stocklist_v',$data);
        }

        public function newapv_report()
        {
          $session_data = $this->session->userdata('logged_in');
            $data['name'] = $session_data['m_name'];
          $id = $this->uri->segment(3);
          $po = $this->uri->segment(4);
          $data['res'] = $this->report_m->apv_report($id);
          $this->db->select('*');
          $this->db->where('apvi_ref',$id);
          $qqqq = $this->db->get('apv_detail');
          $data['resi'] = $qqqq->result();
          // $data['resi'] = $this->report_m->getporec_detail($po);
          // $res = $this->report_m->countporec_detail($po);

                    $total = 0;
                      $this->db->select('*');
                              $this->db->where('apvi_ref',$po);
                              $query = $this->db->get('apv_detail');
                              $re = $query->result();
                              foreach ($re as $a) {
                                 $total = ($total+$a->apvi_netamt)+($a->apvi_amount*7/100);
                                 $data['total'] = $total;
                              }

          // if ($res<=6) {
            $this->load->view('office/ap/apo/newapo/report_v',$data);
        //   }
        //   else{
        //     echo "gggg";
        // }
      }
      public function contract_report()
        {
          $session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
          $id=$this->uri->segment(3);
          $projectid=$this->uri->segment(4);
          $this->db->select('*');
      $this->db->from('lo');
      $this->db->join('project', 'project.project_id = lo.projectcode','left outer');
      $this->db->join('department','department.department_id = lo.department','left outer');
      $this->db->join('vender','vender.vender_id = lo.contact','left outer');
      $this->db->where('lo_lono',$id);
      $query = $this->db->get();
      $data = $query->result();
          // $data['res']= $this->report_m->report_loi($id);
        //  $this->load->view('office/contract/contract_report_v',$data);
         $base_url = $this->config->item("url_report");
        //  redirect($base_url.'stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=wo_new.mrt&lono='.$data[0]->lo_lono.'&system_id='.$data[0]->system.'&subcontact='.$data[0]->subcontact.'&compcode='.$compcode.'');
         redirect('report/viewerload?type=wo&typ=form&var1='.$data[0]->lo_lono.'&var2='.$compcode.'&var3='.$projectid);
        }

        public function contract_report_aps()
        {
          $data['id'] =$this->uri->segment(3);
          $data['type'] =$this->uri->segment(4);
          $data['period'] =$this->uri->segment(5);
          $this->load->view('office/account/ap/aps/report_aps',$data);
        }

        public function contract_down_aps()
        {
          $data['id'] =$this->uri->segment(3);
          $data['type'] =$this->uri->segment(4);
          $data['period'] =$this->uri->segment(5);
          $this->load->view('office/account/ap/aps/report_down',$data);
        }
        public function contract_retention_aps()
        {
          $data['id'] =$this->uri->segment(3);
          $data['type'] =$this->uri->segment(4);
          $data['period'] =$this->uri->segment(5);
          $this->load->view('office/account/ap/aps/report_retention',$data);
        }
        public function most_amount(){
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
            //input
            $date_start =  $this->input->get('date_start');
            $date_stop =  $this->input->get('date_stop');
            $name =  $this->input->get('name');
            $limit =  $this->input->get('limit');
            $type =  $this->input->get('type');

            //gen url
            $urls = "report/viewerloadpo?module=po&typ=report&reportname=";

            //gen query
            $where_name = "and vender_name = ".$name;
            $where_date_po = "and po_podate BETWEEN ".$date_start." and ".$date_stop;
            $where_date_pc = "and docdate BETWEEN ".$date_start." and ".$date_stop;
            $where_date_wo = "and quodate BETWEEN ".$date_start." and ".$date_stop;
            $limit_where = "LIMIT ".$limit;

            //session name
            $data = $this->session->userdata('sessed_in');
            $sess_name = $data['m_name'];
            if($type == '0'){

                if($name==""){
                    $where_name="";
                }
                if($date_start==""||$date_stop==""){
                    $where_date_po="";
                    $where_date_pc="";
                    $where_date_wo="";
                }
                if($limit==""){
                    $limit_where="LIMIT 5";
                }
                $send= $urls."moust_amount.mrt&date_po={$where_date_po}&date_pc={$where_date_pc}&date_wo={$where_date_wo}&limit_where={$limit_where}&where_name={$where_name}&session_neme={$sess_name}&date1={$date_start}&date2={$date_stop}&compcode={$compcode}";
                $base_url = $this->config->item("url_report");
                redirect($base_url.$send);
            }
           else if ($type == 'PO'){
               if($name==""){
                   $where_name="";
               }
               if($date_start==""||$date_stop==""){
                   $where_date_po="";
                   $where_date_pc="";
                   $where_date_wo="";
               }
               if($limit==""){
                   $limit_where="LIMIT 5";
               }
               $send= $urls."moust_amount_po.mrt&session={$sess_name}&date1={$date_start}&date2={$date_stop}&compcode={$compcode}&buyn={$name}";
               $base_url = $this->config->item("url_report");
               redirect($base_url.$send);
           }
           else if ($type == 'PC'){
               if($name==""){
                   $where_name="";
               }
               if($date_start==""||$date_stop==""){
                   $where_date_po="";
                   $where_date_pc="";
                   $where_date_wo="";
               }
               if($limit==""){
                   $limit_where="LIMIT 5";
               }
               $send= $urls."moust_amount_pc.mrt&date_pc={$where_date_po}&date_pc={$where_date_pc}&date_wo={$where_date_wo}&limit_where={$limit_where}&where_name={$where_name}&session_neme={$sess_name}&date1={$date_start}&date2={$date_stop}&compcode={$compcode}";
               $base_url = $this->config->item("url_report");
               redirect($base_url.$send);
           }
           else if ($type == 'WO'){
               if($name==""){
                   $where_name="";
               }
               if($date_start==""||$date_stop==""){
                   $where_date_po="";
                   $where_date_pc="";
                   $where_date_wo="";
               }
               if($limit==""){
                   $limit_where="LIMIT 5";
               }
              //  $send= $urls."moust_amount_wo.mrt&date_wo={$where_date_po}&date_pc={$where_date_pc}&date_wo={$where_date_wo}&limit_where={$limit_where}&where_name={$where_name}&session_neme={$sess_name}&date1={$date_start}&date2={$date_stop}&compcode={$compcode}";
              $send= $urls."moust_amount_wo.mrt&session={$sess_name}&date1={$date_start}&date2={$date_stop}&compcode={$compcode}&buyn={$name}";
               $base_url = $this->config->item("url_report");
               redirect($base_url.$send);
           }

        }


}
