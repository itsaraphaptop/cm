<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cheque_m extends CI_Model {
        public function __construct() {
            parent::__construct();
        }

        function option()
		    {
		      	$session_data = $this->session->userdata('sessed_in');
		      	$compcode = $session_data['compcode'];
		      	$this->db->select('*');
		      	$this->db->join('vender','vender.vender_code = pv_apo_header.apo_vender');
		      	$this->db->join('bank','bank.bank_code = pv_apo_header.apo_bankcode');
		      	$this->db->join('bank_branch','bank_branch.branch_code = pv_apo_header.apo_branchcode');
		      	$this->db->where('apo_doctype',"apv");
		      	$this->db->where('chq_status',null);
		        $query = $this->db->get('pv_apo_header');
		        $res = $query->result();
		        return $res;
		    }

			function table_option($vender)
		    {
		      	$this->db->select('*');
		      	$this->db->join('pv_apo_detail','pv_apo_detail.doci_ref = pv_apo_header.apo_code');
		      	$this->db->where('apo_doctype',"apv");
		      	$this->db->where('apo_vender',$vender);
		      	$this->db->where('chq_status',null);
		        $query = $this->db->get('pv_apo_header');
		        $res = $query->result();
		        return $res;
		    }

		    function archive_m()
		    {
		      	$session_data = $this->session->userdata('sessed_in');
		      	$compcode = $session_data['compcode'];
		      	$this->db->select('*');
		      	$this->db->join('vender','vender.vender_code = ap_pay_header.acct_no');
		      	$this->db->join('bank','bank.bank_id = ap_pay_header.bank_id');
		      	$this->db->join('bank_branch','bank_branch.branch_id = ap_pay_header.branch_id');
		      	$this->db->join('ap_pay_detail','ap_pay_detail.runno = ap_pay_header.runno');
		        $query = $this->db->get('ap_pay_header');
		        $res = $query->result();
		        return $res;
		    }

			function table_arvhive($vender)
		    {
		    	$session_data = $this->session->userdata('sessed_in');
		      	$compcode = $session_data['compcode'];
		      	$this->db->select('*');
		      	$this->db->join('vender','vender.vender_code = ap_pay_header.acct_no');
		      	$this->db->join('ap_pay_detail','ap_pay_detail.runno = ap_pay_header.runno');
		      	$this->db->where('vender_code',$vender);
		        $query = $this->db->get('ap_pay_header');
		        $res = $query->result();
		        return $res;
		    }


			function printcheck($ref)
		    {
					$this->db->select('*');
         $this->db->from('ap_pay_header');
         $this->db->join('vender','vender.vender_code = ap_pay_header.acct_no');
         $this->db->join('ap_pay_detail','ap_pay_detail.runno = ap_pay_header.runno');
         $this->db->where('ap_pay_header.runno',$ref);
         $query = $this->db->get();
         $res = $query->result();
         return $res;
		    }

		 function arc_che()
		    {
		     $this->db->select('*');
	         $this->db->from('ap_pay_header');
	         $this->db->join('vender','vender.vender_code = ap_pay_header.acct_no');
	         $this->db->join('ap_pay_detail','ap_pay_detail.runno = ap_pay_header.runno');
	         $this->db->join('bank','bank.bank_id = ap_pay_header.bank_id');
		     $this->db->join('bank_branch','bank_branch.branch_id = ap_pay_header.branch_id');
	         $query = $this->db->get();
	         $res = $query->result();
	         return $res;
		    }


		    public function report_chequee($id)
	    {
	    	$this->db->select('*');
	        $this->db->from('ap_pay_header');
	        $this->db->join('vender','vender.vender_code = ap_pay_header.acct_no','left outer');
	        $this->db->join('ap_pay_detail','ap_pay_detail.runno = ap_pay_header.runno');
	        $this->db->join('bank','bank.bank_id = ap_pay_header.bank_id');
		    $this->db->join('bank_branch','bank_branch.branch_id = ap_pay_header.branch_id');
		    $this->db->where('payno',$id);
	        $query = $this->db->get();
	        $res = $query->result();
	        return $res;
	    }


        public function get_cheque()
        {
         $this->db->select('*');
         $this->db->select_sum('api_amt');
         $this->db->select_sum('api_adv');
         $this->db->select_sum('api_vatamt');
         $this->db->select_sum('api_wtamt');
         $this->db->select_sum('api_netamt');
         $this->db->from('ap_cheque_header');
         $this->db->join('vender','vender.vender_code = ap_cheque_header.ap_vender','left outer');
         $this->db->join('ap_cheque_detail','ap_cheque_detail.api_code = ap_cheque_header.ap_code');
         $this->db->join('bank','bank.bank_code = ap_cheque_header.ap_bank_id','left outer');
         $this->db->where('ap_cheque_header.ap_status',"wait");
         $this->db->group_by('ap_code');
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

        public function chequemodal($no)
        {
         $this->db->select('*');
         $this->db->from('ap_cheque_detail');
         $this->db->join('ap_cheque_header','ap_cheque_header.ap_code = ap_cheque_detail.api_code');
         $this->db->join('bank_account','bank_account.acc_no = ap_cheque_header.ap_bank_id','left outer');
         $this->db->where('api_code',$no);
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

        public function chequemodal2($no)
        {
         $this->db->select('*');
         $this->db->from('ap_cheque_detail');
         $this->db->join('ap_cheque_header','ap_cheque_header.ap_code = ap_cheque_detail.api_code');
         $this->db->where('api_code',$no);
         $this->db->group_by('api_code');
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }
           
        public function cheqmodal($no)
        {
         $this->db->select('*');
         $this->db->from('ap_cheque_header');
         $this->db->join('vender','vender.vender_code = ap_cheque_header.ap_vender','left outer');
         $this->db->join('bank','bank.bank_id = ap_cheque_header.ap_bank_id');
         // $this->db->join('ap_cheque_header','ap_cheque_header.ap_code = ap_cheque_detail.api_code');
         $this->db->where('ap_status',"wait");
         $this->db->where('ap_code',$no);
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

       

        public function clear_ap()
        {
         $this->db->select('*');    
         $this->db->select_sum('api_amt');
         $this->db->select_sum('api_adv');
         $this->db->select_sum('api_vatamt');
         $this->db->select_sum('api_wtamt');
         $this->db->select_sum('api_netamt');    
         $this->db->from('ap_cheque_detail');
         $this->db->join('ap_cheque_header','ap_cheque_header.ap_code = ap_cheque_detail.api_code','left outer');
         $this->db->where('ap_cheque_header.ap_status',"confirm");
        $this->db->group_by('api_code');
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

        public function clear_ap2($no)
        {
            $this->db->select('*');
            $this->db->from('ap_cheque_detail');
            $this->db->where('api_code',$no);
           $this->db->group_by('api_code');
            $query = $this->db->get();
            $res = $query->result();
            return $res;        
        }


        public function clear_tax()
        {
          $this->db->select('*');
          $this->db->select_sum('api_amt');
          $this->db->select_sum('api_adv');
          $this->db->select_sum('api_vatamt');
          $this->db->select_sum('api_wtamt');
          $this->db->select_sum('api_netamt');    
         	$this->db->from('ap_cheque_detail');
         	$this->db->join('ap_cheque_header','ap_cheque_header.ap_code = ap_cheque_detail.api_code');
         	$this->db->where('ap_cheque_header.aphold_vat', 'hv');
          $this->db->where('ap_cheque_header.ap_status',"complete");
          $this->db->where('api_inv',"");
          $this->db->where('api_vatamt >',0);
          $this->db->group_by('api_code');
         	$query = $this->db->get();
         	$res = $query->result();
         	return $res;
        }


        public function clear_tax2($no)
        {
          $this->db->select('*');
          $this->db->select_sum('api_amt');
          $this->db->select_sum('api_adv');
          $this->db->select_sum('api_vatamt');
          $this->db->select_sum('api_wtamt');
          $this->db->select_sum('api_netamt');    
         	$this->db->from('ap_cheque_detail');
         	$this->db->join('ap_cheque_header','ap_cheque_header.ap_code = ap_cheque_detail.api_code');
         	$this->db->where('api_code',$no);
          $this->db->where('api_inv',"");
          $this->db->where('api_vatamt >',0);
          $this->db->group_by('api_code');
         	$query = $this->db->get();
         	$res = $query->result();
         	return $res;
        }


        public function taxgldoc($no)
        {
          $this->db->select('*');
         	$this->db->from('ap_cheque_detail');
         	$this->db->join('ap_cheque_header','ap_cheque_header.ap_code = ap_cheque_detail.api_code');
         	$this->db->where('api_code',$no);
         	$query = $this->db->get();
         	$res = $query->result();
         	return $res;
        }

        public function get_chequedetail()
        {
         $this->db->select('*');
         $this->db->from('ap_cheque_detail');
         // $this->db->join('vender','vender.vender_code = ap_cheque_header.ap_vender','left outer');
         $this->db->join('ap_cheque_header','ap_cheque_header.ap_code = ap_cheque_detail.api_code');
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }       

        public function get_project()
        {
        $this->db->select('*');
        $this->db->from('ap_cheque_detail');
        $this->db->join('project','project.project_id = ap_cheque_detail.api_project');
        $this->db->group_by('api_project');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
        }

        public function get_status($pono)
        {
        $this->db->select('*');
        $this->db->from('ap_cheque_detail');
        $this->db->join('project','project.project_id = ap_cheque_detail.api_project');
        $this->db->where('api_project',$pono);
         $this->db->join('ap_cheque_header','ap_cheque_header.ap_code = ap_cheque_detail.api_code');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
        }

        public function chq_head($no)
        {
        $this->db->select('*');
        $this->db->from('ap_cheque_header');       
        $this->db->where('ap_code',$no);       
        $query = $this->db->get();
        $res = $query->result();
        return $res;
        }

        public function vender_data($data)
        {
        $this->db->select('*');
        $this->db->from('vender');       
        $this->db->where('compcode',$data);       
        $query = $this->db->get();
        $res = $query->result();
        return $res;
        }
        public function project_data($data)
        {
        $this->db->select('*');
        $this->db->from('project');       
        $this->db->where('compcode',$data);
        $this->db->where('project_sub','no');  
        $this->db->where('project_status !=','close');       
        $query = $this->db->get();
        $res = $query->result();
        return $res;
        }
        public function system_data($data)
        {
        $this->db->select('*');
        $this->db->from('system');       
        $this->db->where('compcode',$data);
        $this->db->where('sys_active','Y');        
        $query = $this->db->get();
        $res = $query->result();
        return $res;
        }
        public function ap_data()
        {
        $this->db->select('*');
        $this->db->from('ap_cheque_header');               
        $query = $this->db->get();
        $res = $query->result();
        return $res;
        }
        public function pl_data()
        {
        $this->db->select('ap_pl');
        $this->db->from('ap_cheque_header');
        $this->db->where('ap_pl IS NOT NULL', null, false);             
        $query = $this->db->get();
        $res = $query->result();
        return $res;
        }
        public function bank_data($data)
        {
        $this->db->select('*');
        $this->db->from('bank');
        $this->db->where('compcode',$data);            
        $query = $this->db->get();
        $res = $query->result();
        return $res;
        }
        public function apv_data($data)
        {
        $this->db->select( 'apv_header.apv_id,
                            apv_header.apv_date,
                            apv_detail.apvi_taxdate,
                            apv_detail.apvi_taxno,
                            vender.vender_name,
                            apv_detail.apvi_taxid,
                            apv_header.apv_code,
                            project.project_name,
                            apv_header.apv_totamt,
                            apv_header.apv_vatper,
                            apv_header.apv_vat,
                            apv_header.apv_netamt,
                            apv_header.apv_glyear,
                            apv_header.apv_glperiod');
        $this->db->from('apv_header');
        $this->db->JOIN('apv_detail','apv_header.apv_code = apv_detail.apvi_ref');
        $this->db->JOIN('vender','apv_header.apv_vender = vender.vender_code');
        $this->db->JOIN('project','apv_header.apv_project = project.project_id');
        $this->db->where('apv_header.compcode',$data);
        $this->db->where('apv_header.existing',null); 
        $this->db->group_by('apv_header.apv_id');           
        $query = $this->db->get();
        $res = $query->result_array();
        return $res;
        }
        public function apv_data_where($comp , $year , $month)
        {
            // echo $comp.$year.$month;
        $this->db->select( 'apv_header.apv_id,
                            apv_header.apv_date,
                            apv_detail.apvi_taxdate,
                            apv_detail.apvi_taxno,
                            vender.vender_name,
                            apv_detail.apvi_taxid,
                            apv_header.apv_code,
                            project.project_name,
                            apv_header.apv_totamt,
                            apv_header.apv_vatper,
                            apv_header.apv_vat,
                            apv_header.apv_netamt,
                            apv_header.apv_glyear,
                            apv_header.apv_glperiod');
        $this->db->from('apv_header');
        $this->db->JOIN('apv_detail','apv_header.apv_code = apv_detail.apvi_ref');
        $this->db->JOIN('vender','apv_header.apv_vender = vender.vender_code');
        $this->db->JOIN('project','apv_header.apv_project = project.project_id');
        $this->db->where('apv_header.compcode',$comp);
        $this->db->where("apv_header.apv_date BETWEEN '$year-$month-01' AND '$year-$month-31'");
        $this->db->where('apv_header.existing',null); 
        $this->db->group_by('apv_header.apv_id');           
        $query = $this->db->get();
        $res = $query->result_array();
        return $res;
        }
        public function apv_exis($data)
        {
        $this->db->select( 'apv_header.apv_id,
                            apv_header.apv_date,
                            apv_detail.apvi_taxdate,
                            apv_detail.apvi_taxno,
                            vender.vender_name,
                            apv_detail.apvi_taxid,
                            apv_header.apv_code,
                            project.project_name,
                            apv_header.apv_totamt,
                            apv_header.apv_vatper,
                            apv_header.apv_vat,
                            apv_header.apv_netamt,
                            apv_header.apv_glyear,
                            apv_header.apv_glperiod');
        $this->db->from('apv_header');
        $this->db->JOIN('apv_detail','apv_header.apv_code = apv_detail.apvi_ref');
        $this->db->JOIN('vender','apv_header.apv_vender = vender.vender_code');
        $this->db->JOIN('project','apv_header.apv_project = project.project_id');
        $this->db->where('apv_header.compcode',$data);
        $this->db->where('apv_header.existing !=','');
        $this->db->group_by('apv_header.apv_id');            
        $query = $this->db->get();
        $res = $query->result_array();
        return $res;
        }
        public function apv_exis_where($comp , $year , $month)
        {
            $ym = $year."-".sprintf("%02d",$month);
            // $comp.$year.$month;die();
        $this->db->select( 'apv_header.apv_id,
                            apv_header.apv_date,
                            apv_detail.apvi_taxdate,
                            apv_detail.apvi_taxno,
                            vender.vender_name,
                            apv_detail.apvi_taxid,
                            apv_header.apv_code,
                            project.project_name,
                            apv_header.apv_totamt,
                            apv_header.apv_vatper,
                            apv_header.apv_vat,
                            apv_header.apv_netamt,
                            apv_header.apv_glyear,
                            apv_header.apv_glperiod');
        $this->db->from('apv_header');
        $this->db->JOIN('apv_detail','apv_header.apv_code = apv_detail.apvi_ref');
        $this->db->JOIN('vender','apv_header.apv_vender = vender.vender_code');
        $this->db->JOIN('project','apv_header.apv_project = project.project_id');
        $this->db->where('apv_header.compcode',$comp);
        // $this->db->where("apv_header.apv_date BETWEEN '$year-$month-01' AND '$year-$month-31'");
        $this->db->where('apv_header.existing',$ym);
        $this->db->group_by('apv_header.apv_id');            
        $query = $this->db->get();
        $res = $query->result_array();
        return $res;
        }
        public function voucherno_ap($comp)
        {
            $this->db->select('ap_gl.vchno');
            $this->db->JOIN('apv_header','ap_gl.vchno = apv_header.apv_code');
            $this->db->where('ap_gl.compcode',$comp);
            $this->db->group_by('ap_gl.vchno');
            $query = $this->db->get('ap_gl');
            $res = $query->result_array();
            return $res;
        }
    }