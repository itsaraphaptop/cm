<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class inventory_report extends CI_Controller {
	  public function __construct() {
            parent::__construct();
            $this->load->Model('datastore_m');
            $this->load->Model('office_m');
            $this->load->Model('inventory_m');
			$this->load->model('stock_m');
        }

        public function select_transfer()
		{
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			if ($username=="") {
				redirect('/');
			}
			$userid = $session_data['m_id'];
			$da['username'] = $session_data['username'];
			$da['name'] = $session_data['m_name'];
			$data['getproj'] = $this->datastore_m->getproject();
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$res['getproj'] = $this->datastore_m->getproject_user($userid,$projectid);
			$this->load->view('navtail/base_master/header_v',$da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('office/inventory/stockcard/transfer_select_v',$res);
			$this->load->view('base/footer_v');
		}

		public function select_transferto()
		{
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			if ($username=="") {
				redirect('/');
			}
			$userid = $session_data['m_id'];
			$da['username'] = $session_data['username'];
			$da['name'] = $session_data['m_name'];
			$data['getproj'] = $this->datastore_m->getproject();
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$res['getproj'] = $this->datastore_m->getproject_user($userid,$projectid);
			$this->load->view('navtail/base_master/header_v',$da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('office/inventory/stockcard/transfer_selectto_v',$res);
			$this->load->view('base/footer_v');
		}

		public function ci_transfer()
        {
        	$pro = $this->uri->segment(3);
        	$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			if ($username=="") {
				redirect('/');
			}
			$userid = $session_data['m_id'];
			$da['username'] = $session_data['username'];
			$da['name'] = $session_data['m_name'];
			$data['getproj'] = $this->datastore_m->getproject();
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$res['getproj'] = $this->datastore_m->getproject_user($userid,$projectid);
			$res['pro'] = $this->uri->segment(3);
			$this->load->view('navtail/base_master/header_v',$da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('office/inventory/stockcard/transfer_report_v',$res);
			$this->load->view('base/footer_v');
        }

        public function ci_transferto()
        {
        	$pro = $this->uri->segment(3);
        	$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			if ($username=="") {
				redirect('/');
			}
			$userid = $session_data['m_id'];
			$da['username'] = $session_data['username'];
			$da['name'] = $session_data['m_name'];
			$data['getproj'] = $this->datastore_m->getproject();
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$res['getproj'] = $this->datastore_m->getproject_user($userid,$projectid);
			$res['pro'] = $this->uri->segment(3);
			$this->load->view('navtail/base_master/header_v',$da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('office/inventory/stockcard/transfer_reportto_v',$res);
			$this->load->view('base/footer_v');
        }

        public function ci_transfer_report()
        {
        	$pro = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
               
            
          if ($username=="") {
            redirect('/');
          }
          try {
                $this->load->view('navtail/base_master/header_v');
                $add = $this->input->post();
                $proid =  $add['pro'];
                $memid = $add['mm'];
                $chk = $add['eq'];
                $and = $add['and'];
                $where = $add['chk'];
                $empty = $add['empty'];
                $t1 = $add['daton'];
                $t2 = $add['dattwo'];
                $an = $add['da'];
                		$pro_form = $this->db->query("select * from project where project_id = $pro")->result();
                		foreach ($pro_form as $key => $formm) {
                			$form_pro = $formm->project_name;
                		}
                          $qm = $this->db->query("select * from project join ic_transfer on ic_transfer.to_project=project.project_id $where $proid and from_project=$pro ")->result();

                        // if ($qm) {
                        //   $rm = $qm->result();
                        // }else{
                        //   redirect('inventory/select_transfer');
                        // }

                        // $n=1;
                        // foreach ($rm as $e) {

                        echo
                        '<style>
					        .navbar-default{background:#1a1e58; color:#fff;}
					        body{background: #ddd;
					            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;;
					        }
					        .pdf-page {
					            margin: 0 auto;
					            box-sizing: border-box;
					            box-shadow: 0 5px 10px 0 rgba(0,0,0,.3);
					            background-color: #fff;
					            color: #333;
					            position: relative;
					        }
					        .pdf-header {
					            position: absolute;
					            top: .5in;
					            height: .6in;
					            left: .5in;
					            right: .5in;

					        }
					        .invoice-number {
					            padding-top: -3in;
					            float: right;
					           position:relative;
					        }

					        .size-a4 { width: 8.3in; height: 11.6929in; }
					        .size-letter { width: 8.5in; height: 11in; }
					        .size-executive { width: 7.25in; height: 10.5in; }

					        .company-logo {
					            font-size: 11px;
					            font-weight: normal;
					            color: #1a1e58;
					            padding-top: 50px
					        }


					        #example{margin-top: 30px;}
					        @media print {
					.navbar{display: none;}

					#example{margin-top:0px;}
					}
					.legend_custom {
					    display: block;
					    width: 100%;
					    padding: 0;
					    margin-bottom: 20px;
					    font-size: 19.5px;
					    line-height: inherit;
					    color: #333333;
					    border: 0;
					    border-bottom: 1px solid #e5e5e5;
					}

					.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
					    padding: 5px 15px;
					    line-height: 1.5384616;
					    vertical-align: top;
					    border-top: 0px solid; 
					    font-size: 14px;
					  }
					    </style>'.
					                        '<nav class="navbar navbar-default navbar-fixed-top">
					      <div class="container">
					        <div class="navbar-header">
					          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					            <span class="sr-only">Toggle navigation</span>
					            <span class="icon-bar"></span>
					            <span class="icon-bar"></span>
					            <span class="icon-bar"></span>
					          </button>
					            <img src="http://cloudmeka.com//comp/comp_2016-01-07_9779.png" class="img-responsive" style="height:40px;">
					        </div>
					         <div id="navbar" class="collapse navbar-collapse">
					         <button type="button" class="btn btn-primary navbar-btn" onclick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</button>
					 
					        </div><!--/.nav-collapse -->
					      </div>
					    </nav>'.
                        '<br><br>'.
                        '<h4 style="text-align: center;">Data Training</h4>'.
                        '<h4 style="text-align: center;">Document Transfer From  :'.$form_pro.'</h4>'.
                        // '<h4 style="text-align: center;"> To  :'.$e->project_name.'</h4>'.
                        '<table class="table table-bordered table-xxs">'.
                          '<thead>'.
                            '<tr class="alpha-slate">'.
                            '<th>To project</th>'.
                              '<th>Doc No.</th>'.
                              '<th>Date</th>'.
                              '<th>item</th>'.
                              '<th>Qty(TR)</th>'.
                              '<th>Qty(Issue)Unit</th>'.
                              '<th>Cost/Unit</th>'.
                              '<th>Amount</th>'.
                            '</tr>'.
                          '</thead>'.

                          '<tbody >';

                            // $qmm = $this->db->query("select * from ic_transfer join project on project.project_id=ic_transfer.to_project where project_id='$e->project_id'");

                          // $rmm = $qmm->result();
                          $tot=0;  foreach ($qm as $ee) {
                            $de = $this->db->query("select * from ic_transferitem where ref_codetransfer='$ee->transfer_code'")->result();
                            $name = $this->db->query("select * from project where project_id=$ee->to_project")->result();
                            foreach ($name as $key => $valuee) {
                            foreach ($de as $v) {
                        echo  '<tr >'.
                        '<td>'.$valuee->project_name.'</td>'.
                               '<td>'.$ee->transfer_code.'</td>'.
                               '<td>'.$ee->date_transfer.'</td>'.
                               '<td>'.$v->mat_name.'</td>'.
                               '<td>'.$v->qty.'</td>'.
                               '<td>'.$v->qty.' '.$v->unit.'</td>'.
                               '<td>'.$v->unitprice.'</td>'.
                               '<td>'.$v->total.'</td>';
                        echo  '</tr>';
                       }
                       }$tot=$tot+$v->total;
                  }
                        echo  
                        	'<tr>'.
                                '<td colspan="7" class="text-center">รวม</td>'.
                                '<td>'.number_format($tot,2).'</td>'.
                              '<tr>'.
                             '</tbody>'.
                          '</table>';
                        // }
                    // $xx = $this->db->query("select * from ic_transferitem join ic_transfer on ic_transfer.transfer_code=ic_transferitem.ref_codetransfer ")->result();
                    //     	foreach ($xx as $zz) {
                    //     		echo $zz->to_project.'-';
                    //     		echo $ee->transfer_code.'-';
                    //     	} 
                        
                        $this->load->view('base/footer_v');
              } catch (Exception $e) {
                echo $e;
                // redirect('management/pettycash_report');
              }


        }
        public function ci_transfer_reportto()
        {
        	$pro = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
               
            
          if ($username=="") {
            redirect('/');
          }
          try {
                $this->load->view('navtail/base_master/header_v');
                $add = $this->input->post();
                $proid =  $add['pro'];
                $memid = $add['mm'];
                $chk = $add['eq'];
                $and = $add['and'];
                $where = $add['chk'];
                $empty = $add['empty'];
                $t1 = $add['daton'];
                $t2 = $add['dattwo'];
                $an = $add['da'];
                		$pro_to = $this->db->query("select * from project where project_id = $pro")->result();
                		foreach ($pro_to as $key => $too) {
                			$to_pro = $too->project_name;
                		}
                	// 

                          $qm = $this->db->query("select * from project join ic_transfer on ic_transfer.to_project=project.project_id $where $proid and to_project=$pro ")->result();
                        

                        // if ($qm) {
                        //   $rm = $qm->result();
                        // }else{
                        //   redirect('inventory/select_transfer');
                        // }

                        $n=1;
                        // foreach ($rm as $e) {

                        echo
                        '<style>
					        .navbar-default{background:#1a1e58; color:#fff;}
					        body{background: #ddd;
					            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;;
					        }
					        .pdf-page {
					            margin: 0 auto;
					            box-sizing: border-box;
					            box-shadow: 0 5px 10px 0 rgba(0,0,0,.3);
					            background-color: #fff;
					            color: #333;
					            position: relative;
					        }
					        .pdf-header {
					            position: absolute;
					            top: .5in;
					            height: .6in;
					            left: .5in;
					            right: .5in;

					        }
					        .invoice-number {
					            padding-top: -3in;
					            float: right;
					           position:relative;
					        }

					        .size-a4 { width: 8.3in; height: 11.6929in; }
					        .size-letter { width: 8.5in; height: 11in; }
					        .size-executive { width: 7.25in; height: 10.5in; }

					        .company-logo {
					            font-size: 11px;
					            font-weight: normal;
					            color: #1a1e58;
					            padding-top: 50px
					        }


					        #example{margin-top: 30px;}
					        @media print {
					.navbar{display: none;}

					#example{margin-top:0px;}
					}
					.legend_custom {
					    display: block;
					    width: 100%;
					    padding: 0;
					    margin-bottom: 20px;
					    font-size: 19.5px;
					    line-height: inherit;
					    color: #333333;
					    border: 0;
					    border-bottom: 1px solid #e5e5e5;
					}

					.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
					    padding: 5px 15px;
					    line-height: 1.5384616;
					    vertical-align: top;
					    border-top: 0px solid; 
					    font-size: 14px;
					  }
					    </style>'.
					                        '<nav class="navbar navbar-default navbar-fixed-top">
					      <div class="container">
					        <div class="navbar-header">
					          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					            <span class="sr-only">Toggle navigation</span>
					            <span class="icon-bar"></span>
					            <span class="icon-bar"></span>
					            <span class="icon-bar"></span>
					          </button>
					            <img src="http://cloudmeka.com//comp/comp_2016-01-07_9779.png" class="img-responsive" style="height:40px;">
					        </div>
					         <div id="navbar" class="collapse navbar-collapse">
					         <button type="button" class="btn btn-primary navbar-btn" onclick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</button>
					 
					        </div><!--/.nav-collapse -->
					      </div>
					    </nav>'.
                        '<br><br>'.
                        '<h4 style="text-align: center;">Data Training</h4>'.
                        '<h4 style="text-align: center;">Document Transfer To  :'.$to_pro.'</h4>'.
                        // '<h4 style="text-align: center;"> To  :'.$e->project_name.'</h4>'.
                        '<table class="table table-bordered table-xxs">'.
                          '<thead>'.
                            '<tr class="alpha-slate">'.
                            	'<th>From project</th>'.
                              '<th>Doc No.</th>'.
                              '<th>Date</th>'.
                              '<th>item</th>'.
                              '<th>Qty(TR)</th>'.
                              '<th>Qty(Issue)Unit</th>'.
                              '<th>Cost/Unit</th>'.
                              '<th>Amount</th>'.
                            '</tr>'.
                          '</thead>'.

                          '<tbody >';

                          //   $qmm = $this->db->query("select * from ic_transfer join project on project.project_id=ic_transfer.to_project where project_id='$e->project_id'");

                          // $rmm = $qmm->result();
                          // $tot=0;  foreach ($qm as $ee) {
                          //   $de = $this->db->query("select * from ic_transferitem where ref_codetransfer='$ee->transfer_code'")->result();
                           
                          //   foreach ($name as $key => $valuee) {
                            $tot=0; foreach ($qm as $key => $hh) {
                             $name = $this->db->query("select * from project where project_id=$hh->from_project")->result();
                            
                        	$dds = $this->db->query("select * from ic_transferitem join ic_transfer on ic_transfer.transfer_code=ic_transferitem.ref_codetransfer where transfer_code= '$hh->transfer_code' ")->result();
                        	foreach ($name as $vv) {
                        		$namee= $vv->project_name;
                        	} 
                        		foreach ($dds as $key => $v) {

                        echo  
                        		'<tr>'.
                        		'<td>'.$namee.'</td>'.
                               '<td>'.$v->ref_codetransfer.'</td>'.
                               '<td>'.$hh->date_transfer.'</td>'.
                               '<td>'.$v->mat_name.'</td>'.
                               '<td>'.$v->qty.'</td>'.
                               '<td>'.$v->qty.' '.$v->unit.'</td>'.
                               '<td>'.$v->unitprice.'</td>'.
                               '<td>'.$v->total.'</td>';
                        echo  '</tr>';
                       // }
                   }$tot=$tot+$v->total;
                  }
                        echo  
                        	'<tr>'.
                                '<td colspan="7" class="text-center">รวม</td>'.
                                '<td>'.number_format($tot,2).'</td>'.
                              '<tr>'.
                             '</tbody>'.
                          '</table>';
                        $this->load->view('base/footer_v');
              } catch (Exception $e) {
                echo $e;
                // redirect('management/pettycash_report');
              }
        }
        public function stock_card_v(){

           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $select['search'] = $this->datastore_m->load_stock_card();
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          $this->load->view('navtail/base_master/header_v',$data);
           $this->load->view('navtail/base_master/tail_v');
           $this->load->view('navtail/navtail_ic_menu_v');
          $this->load->view('office/pr/report_summary/stock_card',$select);
          $this->load->view('base/footer_v');
        }
        public function stock_card_r(){
          //input
          $datestr =  $this->input->get('datestr');
          $dateend =  $this->input->get('dateend');
          $pr_projectid =  $this->input->get('pr_projectid');
          $po =  $this->input->get('PO');
          $Materials =  $this->input->get('Materials');
          $wh =  $this->input->get('wh');

          if( $this->input->get('amount')){
          	$amount = $this->input->get('amount');
          }else{
          	$amount= "N";
          }

          
          echo  print_r($this->input->get());
          // die();
          //query
          // $where_po = "and stock_matcode = '$po'";
          // $where_mat= "and stock_matname = '$Materials'";
          // $where_project="and project.project_id = '$pr_projectid'";
          // $where_wh= "and warehouse = '$wh'"; 
          // $where_date = "and stockcard.createdate BETWEEN '$datestr 00:00:00' AND '$dateend 23:59:00'";       
          
           //session name
          $data = $this->session->userdata('sessed_in');
          $sess_name = $data['m_name'];          
          $compcode = $data['compcode'];          
          //if
          // if($pr_projectid == ""){$where_project ="";}
          // if($po == ""){$where_po ="";}
          // if($Materials == ""){$where_mat ="";}     
          // if($wh == ""){$where_wh ="";}  
          // if($datestr == "")$where_date ="and stockcard.createdate BETWEEN '' AND '$dateend 23:59:00'"; 
          // if($datestr == "") $datestr="0000-00-00";
          //url
          // $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
          $stockcard_file= "stock_card.mrt";
          $stockcard_file_noamt = "stock_card_noamount.mrt";
          $urls = "report/viewerloadreport?module=ic&typ=report&reportname={$stockcard_file}";
          
          //getdata get_wh_data
          // $get_wh_data ="&get_wh_data={$wh}";
          // $get_datestr ="&get_datestr={$datestr}";
          // $get_dateend ="&get_dateend={$dateend}"; 
          // $get_po ="&get_po={$where_po}";
          // $get_date = "&get_date={$where_date}";
          // $get_mat ="&get_mat={$where_mat}";    
          // $get_pro_id ="&get_pro_id={$where_project}";     
          // $get_session ="&get_session={$sess_name}";
          // $get_wh ="&get_wh={$where_wh}";  
          // $compcode ="&compcode={$compcode}";  
          //send data
          $send= "{$urls}&var1={$pr_projectid}&var2={$wh}&var3={$po}&var4={$datestr}&var5={$dateend}&var6={$amount}&var7={$compcode}";        
          // if($amount == 'N') $send= "{$urls}{$stockcard_file_noamt}{$get_po}{$get_mat}{$get_pro_id}{$get_wh}{$get_session}{$get_date}{$get_datestr}{$get_wh_data}{$get_dateend}{$compcode}";
          // if($amount == 'Y') $send= "{$urls}{$stockcard_file}{$get_po}{$get_mat}{$get_pro_id}{$get_wh}{$get_session}{$get_date}{$get_datestr}{$get_wh_data}{$get_dateend}{$compcode}";        
          // if($amount == 'N') $send= "{$urls}{$stockcard_file_noamt}{$get_po}{$get_mat}{$get_pro_id}{$get_wh}{$get_session}{$get_date}{$get_datestr}{$get_wh_data}{$get_dateend}{$compcode}";
          // echo $send; 
          // $base_url = $this->config->item("url_report");
          redirect($send);         
        }
        public function stock_cost_view()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $this->load->model('datastore_m');
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          $ser['search'] = $this->datastore_m->project_search($data);

          $this->load->view('navtail/base_master/header_v',$data);
           $this->load->view('navtail/base_master/tail_v');
           $this->load->view('navtail/navtail_ic_menu_v');
          $this->load->view('office/pr/report_summary/stock_cost_view',$ser);
          $this->load->view('base/footer_v');
        }
        public function stock_cost_r()
        {
            //input
            $project =  $this->input->get('project');
            $datestr =  $this->input->get('datestr');
            $dateend =  $this->input->get('dateend');
            //gen query
            $where = "AND stock_date BETWEEN '$datestr' AND '$dateend'";
            $wproject = "and project.project_name ='$project'";
            
            //session name
            $date = $this->session->userdata('sessed_in');
            $sess_name = $date['m_name'];
            $compcode = $date['compcode'];

            if($datestr==""){
              $where="";
            }
            if($project==""){
              $wproject="";
            }
            //gen url
            // $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx";
            $file_report ="stock_cost.mrt";
            $urls = "report/viewerloadreport?module=ic&typ=report&reportname={$file_report}";
 
            // $send= "{$urls}&stimulsoft_report_key={$file_report}&project={$project}&where={$where}&session={$sess_name}&datestr={$datestr}&dateend={$dateend}&wproject={$wproject}&compcode={$compcode}";
            $send= "{$urls}&var1=&var2=&var3=&var4={$dateend}&var5=&var6=&var7=&var8=&var9=&var10="; 
               $base_url = $this->config->item("url_report");
               redirect($send);
        } 
        public function stock_balance_view()
        {
          
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
              redirect('/');
            }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $this->load->model('datastore_m');
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          $ser['search'] = $this->datastore_m->mat_search($data);

          $this->load->view('navtail/base_master/header_v',$data);
           $this->load->view('navtail/base_master/tail_v');
           $this->load->view('navtail/navtail_ic_menu_v');
          $this->load->view('office/pr/report_summary/stock_balance_view',$ser);
          $this->load->view('base/footer_v');
        }
        public function stock_balance_r(){

         //input
          $datestr =  $this->input->get('datestr');
          $dateend =  $this->input->get('dateend');
          $pr_projectid =  $this->input->get('pr_projectid');          
          $Materials =  $this->input->get('Materials');
          $wh =  $this->input->get('wh');
          $date_gen = $datestr;

          if( $this->input->get('amount')){
          	$amount = $this->input->get('amount');
          }else{
          	$amount= "N";
          }          
          if($datestr==""){
          	$datestop = date_create($dateend);
          	$date_gen = date_format($datestop,"Y-m-01");
          	echo $date_gen;
          }
                    	
          echo  print_r($this->input->get());

          //query        
          $where_mat= "and stock_matcode = '$Materials'";
          $where_project="and project.project_id = '$pr_projectid'";
          $where_wh= "and warehouse = '$wh'"; 
          $where_date_bf = "and stockcard.createdate < '$date_gen 00:00:00'";  
          $where_date_af = "and stockcard.createdate BETWEEN '{$date_gen} 00:00:00' and '{$dateend} 23:59:59'" ;
          $where_date_all = "and stockcard.createdate BETWEEN '' and '{$dateend} 23:59:59'" ;
           //session name
          $data = $this->session->userdata('sessed_in');
          $sess_name = $data['m_name'];          
          $compcode = $data['compcode'];          
          //if
          if($pr_projectid == ""){$where_project ="";}         
          if($Materials == ""){$where_mat ="";}     
          if($wh == ""){$where_wh ="";}  
          
          //url
          // $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
          $stockcard_file= "stock_balance.mrt";
          $stockcard_file_noamt = "stock_balance_noamt.mrt";
          $urls = "report/viewerloadreport?module=ic&typ=report&reportname={$stockcard_file}";
          
          //getdata get_wh_data
          $get_wh_data ="&get_wh_data={$wh}";
          $get_datestr ="&get_datestr={$date_gen}";
          $get_dateend ="&get_dateend={$dateend}";           
          $get_date_bf = "&get_date_bf={$where_date_bf}";
          $get_date_af = "&get_date_af={$where_date_af}";
          $get_date_all = "&get_date_all={$where_date_all}";
          $get_mat ="&get_mat={$where_mat}";    
          $get_pro_id ="&get_pro_id={$where_project}";     
          $get_session ="&get_session={$sess_name}";
          $get_wh ="&get_wh={$where_wh}";  
          $compcode ="&compcode={$compcode}";  
          //send data
          $send= "{$urls}&var1=&var2=&var3=&var4={$dateend}&var5=&var6=&var7=&var8=&var9=&var10="; 
          // if($amount == 'Y') $send= "{$urls}{$stockcard_file}{$get_mat}{$get_pro_id}{$get_wh}{$get_session}{$get_datestr}{$get_wh_data}{$get_dateend}{$get_date_bf}{$get_date_af}{$get_date_all}{$compcode}";        
          // if($amount == 'N') $send= "{$urls}{$stockcard_file_noamt}{$get_mat}{$get_pro_id}{$get_wh}{$get_session}{$get_datestr}{$get_wh_data}{$get_dateend}{$get_date_bf}{$get_date_af}{$get_date_all}{$compcode}";
          // echo $send; 

          $base_url = $this->config->item("url_report");
          redirect($send);         
       
        }
              public function stock_in_v(){
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $select['search'] = $this->datastore_m->load_stock_card();
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          $this->load->view('navtail/base_master/header_v',$data);
           $this->load->view('navtail/base_master/tail_v');
           $this->load->view('navtail/navtail_ic_menu_v');
          $this->load->view('office/inventory/report/stock_in',$select);
          $this->load->view('base/footer_v');
        }
        public function stock_in_r(){
          
          //input
          $datestr =  $this->input->get('datestr');
          $dateend =  $this->input->get('dateend');
          $pr_projectid =  $this->input->get('pr_projectid');
          $po =  $this->input->get('PO');
          $Materials =  $this->input->get('Materials');
          $wh =  $this->input->get('wh');

          if( $this->input->get('amount')){
          	$amount = $this->input->get('amount');
          }else{
          	$amount= "N";
          }

          
          echo  print_r($this->input->get());
          //query
          $where_po = "and stock_matcode = '$po'";
          $where_mat= "and stock_matname = '$Materials'";
          $where_project="and project.project_id = '$pr_projectid'";
          $where_wh= "and warehouse = '$wh'"; 
          $where_date = "and stockcard.createdate BETWEEN '$datestr' AND '$dateend'";       
          
           //session name
          $data = $this->session->userdata('sessed_in');
          $sess_name = $data['m_name'];          
          $sess_compcode = $data['compcode'];          
          //if
          if($pr_projectid == ""){$where_project ="";}
          if($po == ""){$where_po ="";}
          if($Materials == ""){$where_mat ="";}     
          if($wh == ""){$where_wh ="";}  
           if($datestr == "")$where_date ="and stockcard.createdate BETWEEN '' AND '$dateend'";  
          //url
          $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
          $stockcard_file= "stock_in.mrt";
          $stockcard_file_noamt = "stock_in_noamount.mrt";
          
          //getdata get_wh_data
          $get_wh_data ="&get_wh_data={$wh}";
          $get_datestr ="&get_datestr={$datestr}";
          $get_dateend ="&get_dateend={$dateend}"; 
          $get_po ="&get_po={$where_po}";
          $get_date = "&get_date={$where_date}";
          $get_mat ="&get_mat={$where_mat}";    
          $get_pro_id ="&get_pro_id={$where_project}";     
          $get_session ="&get_session={$sess_name}";
          $get_wh ="&get_wh={$where_wh}";  
          $compcode = "&compcode={$sess_compcode}";
          //send data
          if($amount == 'Y') $send= "{$urls}{$stockcard_file}{$get_po}{$get_mat}{$get_pro_id}{$get_wh}{$get_session}{$get_date}{$get_datestr}{$get_wh_data}{$get_dateend}{$compcode}";        
          if($amount == 'N') $send= "{$urls}{$stockcard_file_noamt}{$get_po}{$get_mat}{$get_pro_id}{$get_wh}{$get_session}{$get_date}{$get_datestr}{$get_wh_data}{$get_dateend}{$compcode}";
          // echo $send; 
          $base_url = $this->config->item("url_report");
          redirect($base_url.$send);               
        }
        public function stock_out_v(){
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $select['search'] = $this->datastore_m->load_stock_card();
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          $this->load->view('navtail/base_master/header_v',$data);
           $this->load->view('navtail/base_master/tail_v');
           $this->load->view('navtail/navtail_ic_menu_v');
          $this->load->view('office/inventory/report/stock_out',$select);
          $this->load->view('base/footer_v');
        }
        public function stock_out_r(){
          
           //input
          $datestr =  $this->input->get('datestr');
          $dateend =  $this->input->get('dateend');
          $pr_projectid =  $this->input->get('pr_projectid');
          $po =  $this->input->get('PO');
          $Materials =  $this->input->get('Materials');
          $wh =  $this->input->get('wh');

          if( $this->input->get('amount')){
          	$amount = $this->input->get('amount');
          }else{
          	$amount= "N";
          }

          
          echo  print_r($this->input->get());
          //query
          $where_po = "and stock_matcode = '$po'";
          $where_mat= "and stock_matname = '$Materials'";
          $where_project="and project.project_id = '$pr_projectid'";
          $where_wh= "and warehouse = '$wh'"; 
          $where_date = "and stockcard.createdate BETWEEN '$datestr' AND '$dateend'";       
          
           //session name
          $data = $this->session->userdata('sessed_in');
          $sess_name = $data['m_name'];          
          $compcode = $data['compcode'];          
          //if
          if($pr_projectid == ""){$where_project ="";}
          if($po == ""){$where_po ="";}
          if($Materials == ""){$where_mat ="";}     
          if($wh == ""){$where_wh ="";}  
           if($datestr == "")$where_date ="and stockcard.createdate BETWEEN '' AND '$dateend'";  
          //url
          $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
          $stockcard_file= "stock_out.mrt";
          $stockcard_file_noamt = "stock_out_noamount.mrt";
          
          //getdata get_wh_data
          $get_wh_data ="&get_wh_data={$wh}";
          $get_datestr ="&get_datestr={$datestr}";
          $get_dateend ="&get_dateend={$dateend}"; 
          $get_po ="&get_po={$where_po}";
          $get_date = "&get_date={$where_date}";
          $get_mat ="&get_mat={$where_mat}";    
          $get_pro_id ="&get_pro_id={$where_project}";     
          $get_session ="&get_session={$sess_name}";
          $get_wh ="&get_wh={$where_wh}";  
          $compcode ="&compcode={$compcode}";  
          //send data
          if($amount == 'Y') $send= "{$urls}{$stockcard_file}{$get_po}{$get_mat}{$get_pro_id}{$get_wh}{$get_session}{$get_date}{$get_datestr}{$get_wh_data}{$get_dateend}{$compcode}";        
          if($amount == 'N') $send= "{$urls}{$stockcard_file_noamt}{$get_po}{$get_mat}{$get_pro_id}{$get_wh}{$get_session}{$get_date}{$get_datestr}{$get_wh_data}{$get_dateend}{$compcode}";
          // echo $send; 
          $base_url = $this->config->item("url_report");
          redirect($base_url.$send);                  
        }
        public function store_report_view(){
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $this->load->model('datastore_m');
          $select['search'] = $this->datastore_m->load_stock_card();
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          $this->load->view('navtail/base_master/header_v',$data);
           $this->load->view('navtail/base_master/tail_v');
           $this->load->view('navtail/navtail_ic_menu_v');
          $this->load->view('office/inventory/report/store_report_v',$select);
          $this->load->view('base/footer_v');
        }
        public function report_store(){
          //input
          $datestr =  $this->input->get('datestr');
          $dateend =  $this->input->get('dateend');
          $pr_projectid =  $this->input->get('pr_projectid');          
          $Materials =  $this->input->get('Materials');
          $wh =  $this->input->get('wh');
          $date_gen = $datestr;

          if( $this->input->get('amount')){
          	$amount = $this->input->get('amount');
          }else{
          	$amount= "N";
          }          
          if($datestr==""){
          	$datestop = date_create($dateend);
          	$date_gen = date_format($datestop,"Y-m-01");
          	echo $date_gen;
          }
                    	
          echo  print_r($this->input->get());

          //query        
          $where_mat= "and stock_matcode = '$Materials'";
          $where_project="and project.project_id = '$pr_projectid'";
          $where_wh= "and warehouse = '$wh'"; 
          $where_date_bf = "and stockcard.createdate < '$date_gen 00:00:00'";  
          $where_date_af = "and stockcard.createdate BETWEEN '{$date_gen} 00:00:00' and '{$dateend} 23:59:59'" ;
          $where_date_all = "and stockcard.createdate BETWEEN '' and '{$dateend} 23:59:59'" ;
           //session name
          $data = $this->session->userdata('sessed_in');
          $sess_name = $data['m_name'];          
          $compcode = $data['compcode'];          
          //if
          if($pr_projectid == ""){$where_project ="";}         
          if($Materials == ""){$where_mat ="";}     
          if($wh == ""){$where_wh ="";}  
          
          //url
          // $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
          $stockcard_file= "report_store.mrt";
          $urls = "report/viewerloadreport?module=ic&typ=report&reportname={$stockcard_file}";
          
          //getdata get_wh_data
          $get_wh_data ="&get_wh_data={$wh}";
          $get_datestr ="&get_datestr={$date_gen}";
          $get_dateend ="&get_dateend={$dateend}";           
          $get_date_bf = "&get_date_bf={$where_date_bf}";
          $get_date_af = "&get_date_af={$where_date_af}";
          $get_date_all = "&get_date_all={$where_date_all}";
          $get_mat ="&get_mat={$where_mat}";    
          $get_pro_id ="&get_pro_id={$where_project}";     
          $get_session ="&get_session={$sess_name}";
          $get_wh ="&get_wh={$where_wh}";  
          $compcode ="&compcode={$compcode}";  
          //send data
          // $send= "{$urls}{$stockcard_file}{$get_mat}{$get_pro_id}{$get_wh}{$get_session}{$get_datestr}{$get_wh_data}{$get_dateend}{$get_date_bf}{$get_date_af}{$get_date_all}{$compcode}";        
          $send= "{$urls}&var1=&var2=&var3=&var4={$dateend}&var5=&var6=&var7=&var8=&var9=&var10=";         
          // echo $send; 

          $base_url = $this->config->item("url_report");
          redirect($send);  
        }
}