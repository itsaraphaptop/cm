<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class syscode_active extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('datastore_m');
        }

        public function insert_syscode()
        {
          	$session_data = $this->session->userdata('sessed_in');
          	$username = $session_data['username'];
         	$compcode = $session_data['compcode'];
        	$ins = array(
        	'sys_code'=>$compcode,
			'pac_cost_mat'=>$this->input->post('pac_cost_mat'),
			'pac_cost_cont'=>$this->input->post('pac_cost_cont'),
			'pac_cost_cont_mat'=>$this->input->post('pac_cost_cont_mat'),
			'pac_costexpens_ex'=>$this->input->post('pac_costexpens_ex'),
			'pac_expens'=>$this->input->post('pac_expens'),
			'pac_taxvat_due'=>$this->input->post('pac_taxvat_due'),
			'pac_taxvat_nodoc'=>$this->input->post('pac_taxvat_nodoc'),
			'pac_taxvat_nodue'=>$this->input->post('pac_taxvat_nodue'),
			'pac_vender_inmat'=>$this->input->post('pac_vender_inmat'),
			'pac_vender_inoth'=>$this->input->post('pac_vender_inoth'),
			'pac_vender_dow'=>$this->input->post('pac_vender_dow'),
			'pac_vender_incont'=>$this->input->post('pac_vender_incont'),
			'pac_vender_retcont'=>$this->input->post('pac_vender_retcont'),
			'pac_down_apv'=>$this->input->post('pac_down_apv'),
			'pac_ret_apv'=>$this->input->post('pac_ret_apv'),
			'pac_whtax_3'=>$this->input->post('pac_whtax_3'),
			'pac_whtax_53'=>$this->input->post('pac_whtax_53'),
			'pac_whtax_1'=>$this->input->post('pac_whtax_1'),
			'pac_whtax_2'=>$this->input->post('pac_whtax_2'),
			'pac_whtax_54'=>$this->input->post('pac_whtax_54'),
			'pac_item_bal'=>$this->input->post('pac_item_bal'),
			'pac_chqpost'=>$this->input->post('pac_chqpost'),
			
			'ar_arlt'=>$this->input->post('ar_arlt'),
			'ar_arolt'=>$this->input->post('ar_arolt'),
			'ar_arr'=>$this->input->post('ar_arr'),
			'ar_wtdss'=>$this->input->post('ar_wtdss'),
			'ar_wtdsc'=>$this->input->post('ar_wtdsc'),
			'ar_arcs'=>$this->input->post('ar_arcs'),
			'ar_sov'=>$this->input->post('ar_sov'),
			'ar_ov'=>$this->input->post('ar_ov'),
			'ar_ppr'=>$this->input->post('ar_ppr'),
			'ar_prechq'=>$this->input->post('ar_prechq'),
			'ar_aroin'=>$this->input->post('ar_aroin'),
			'ar_ret_sale'=>$this->input->post('ar_ret_sale'),
			'ar_down_sale'=>$this->input->post('ar_down_sale'),
			'ar_cost_sale'=>$this->input->post('ar_cost_sale'),
			'ar_rev_sale'=>$this->input->post('ar_rev_sale'),
			'ar_stock'=>$this->input->post('ar_stock'),
			'plexc_ac_code'=>$this->input->post('plexc_ac_code'),
			'fa_cust'=>$this->input->post('fa_cust'),
			'fa_loss'=>$this->input->post('fa_loss'),
			'fa_profit'=>$this->input->post('fa_profit'),
			'fa_cut'=>$this->input->post('fa_cut'),
			'ma_cost_ic'=>$this->input->post('ma_cost_ic'),
			'ma_cost_lab'=>$this->input->post('ma_cost_lab')
			);
		$this->db->insert('syscode',$ins);
		redirect('syscode/index');	
        }

        public function update_syscode()
	{
		$sys_code = $this->uri->segment(3);
		$ins_edit=array(
			'pac_cost_mat'=>$this->input->post('pac_cost_mat'),
			'pac_cost_cont'=>$this->input->post('pac_cost_cont'),
			'pac_cost_cont_mat'=>$this->input->post('pac_cost_cont_mat'),
			'pac_costexpens_ex'=>$this->input->post('pac_costexpens_ex'),
			'pac_expens'=>$this->input->post('pac_expens'),
			'pac_taxvat_due'=>$this->input->post('pac_taxvat_due'),
			'pac_taxvat_nodoc'=>$this->input->post('pac_taxvat_nodoc'),
			'pac_taxvat_nodue'=>$this->input->post('pac_taxvat_nodue'),
			'pac_vender_inmat'=>$this->input->post('pac_vender_inmat'),
			'pac_vender_inoth'=>$this->input->post('pac_vender_inoth'),
			'pac_vender_dow'=>$this->input->post('pac_vender_dow'),
			'pac_vender_incont'=>$this->input->post('pac_vender_incont'),
			'pac_vender_retcont'=>$this->input->post('pac_vender_retcont'),
			'pac_down_apv'=>$this->input->post('pac_down_apv'),
			'pac_ret_apv'=>$this->input->post('pac_ret_apv'),
			'pac_whtax_3'=>$this->input->post('pac_whtax_3'),
			'pac_whtax_53'=>$this->input->post('pac_whtax_53'),
			'pac_whtax_1'=>$this->input->post('pac_whtax_1'),
			'pac_whtax_2'=>$this->input->post('pac_whtax_2'),
			'pac_whtax_54'=>$this->input->post('pac_whtax_54'),
			'pac_item_bal'=>$this->input->post('pac_item_bal'),
			'pac_chqpost'=>$this->input->post('pac_chqpost'),
			
			'ar_arlt'=>$this->input->post('ar_arlt'),
			'ar_arolt'=>$this->input->post('ar_arolt'),
			'ar_arr'=>$this->input->post('ar_arr'),
			'ar_wtdss'=>$this->input->post('ar_wtdss'),
			'ar_wtdsc'=>$this->input->post('ar_wtdsc'),
			'ar_arcs'=>$this->input->post('ar_arcs'),
			'ar_sov'=>$this->input->post('ar_sov'),
			'ar_ov'=>$this->input->post('ar_ov'),
			'ar_ppr'=>$this->input->post('ar_ppr'),
			'ar_prechq'=>$this->input->post('ar_prechq'),
			'ar_aroin'=>$this->input->post('ar_aroin'),
			'ar_ret_sale'=>$this->input->post('ar_ret_sale'),
			'ar_down_sale'=>$this->input->post('ar_down_sale'),
			'ar_cost_sale'=>$this->input->post('ar_cost_sale'),
			'ar_rev_sale'=>$this->input->post('ar_rev_sale'),
			'ar_stock'=>$this->input->post('ar_stock'),
			'plexc_ac_code'=>$this->input->post('plexc_ac_code'),
			'fa_cust'=>$this->input->post('fa_cust'),
			'fa_loss'=>$this->input->post('fa_loss'),
			'fa_profit'=>$this->input->post('fa_profit'),
			'fa_cut'=>$this->input->post('fa_cut'),
			'ma_cost_ic'=>$this->input->post('ma_cost_ic'),
			'ma_cost_lab'=>$this->input->post('ma_cost_lab')
		);
		$this->load->model('datastore_m');
		$this->datastore_m->syscode_m($sys_code,$ins_edit);
		redirect('syscode/index'); 
	}
	public function acc_defualt()
	{
		$session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
		$this->load->model('datastore_m');
		$date = $this->input->post('acdate');
		$data = array(
	      'ic_type' => $this->input->post('iccost'),
	      'start_accost' => $this->input->post('startcost'),
	      'end_accost' => $this->input->post('endcost'),
	      'startrev' => $this->input->post('startrev'),
	      'endrev' => $this->input->post('endrev'),
	      'glrap' => $this->input->post('glrap'),
	      'startexp' => $this->input->post('startexp'),
	      'endexp' => $this->input->post('endexp'),
	      'acdate' => $date,
	      'chkvat' => $this->input->post('chkvat'),
	      'glrar' => $this->input->post('glrar'),
		  'dptandproj' => $this->input->post('flagdpprj'),
		  'auto_post_gl' => $this->input->post('chkglautopost')
	      );
		$this->db->where('compcode',$compcode);
		if($this->db->update('company',$data))
		{
			return true;
		}

	}
}