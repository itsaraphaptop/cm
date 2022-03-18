<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class management_forecast extends CI_Controller {

  public function __construct() {

    parent::__construct();
    $this->load->model('manag_m');
    $this->load->Model('auth_m');
    $this->load->model('count_m');
    $this->load->model('datastore_m');  

  }

  public function get_purchase_mat(){

    function get_month($date){

    $array_start = explode("-", $date);
    $array_month = array();
    $months = array(  "01"  => 'JAN', 
                      "02"  => 'FEB', 
                      "03"  => 'MAR', 
                      "04"  => 'APR', 
                      "05"  => 'MAY', 
                      "06"  => 'JUN', 
                      "07"  => 'JUL', 
                      "08"  => 'AUG', 
                      "09"  => 'SEP', 
                      "10"  => 'OCT', 
                      "11"  => 'NOV', 
                      "12"  => 'DEC'
                    );
    $month = $array_start[0];
    $year = $array_start[1];
    $m = array_search($month,$months);
    $data = $m."-".$year;
    return $data;

    }

    $project =  $this->input->post('id_project');
    $code =  $this->input->post('code');
    $pj = $this->manag_m->get_pj($project);
    $bd_ten = $pj[0]->bd_tenid;
    $month =  $this->input->post('month');
    $tender = $this->manag_m->get_costcode($bd_ten); 
    $po = $this->manag_m->get_po_h($project);
    $wo = $this->manag_m->get_lo_h($project);
    $pt = $this->manag_m->get_petty_h($project);
    $gl = $this->manag_m->get_gl_h($project);


    $months = array();
    foreach ($month as $key => $value) {
      $m = get_month($value);
      $months[] = $m;
    }

    $data['all_month'] = $months;
    $data['code'] = $code;

    foreach ($tender as $td => $data_td) {

      foreach ($po as $poi => $po_data) {
        $costmat = $this->manag_m->get_cost_mat($po_data->po_pono,$data_td->boq_costmat,$po_data->po_podate);
        $dataPO[] = $costmat;

        $costsub = $this->manag_m->get_cost_sub($po_data->po_pono,$data_td->boq_costsub,$po_data->po_podate);
        $dataPO[] = $costsub;
      }

      foreach ($wo as $woi => $wo_data) {
        $costwomat = $this->manag_m->get_wo_data_mat($wo_data->lo_lono,$data_td->boq_costmat,$wo_data->lodate);
        $dataWO[] = $costwomat;

        $costwosub = $this->manag_m->get_wo_data_sub($wo_data->lo_lono,$data_td->boq_costsub,$wo_data->lodate);
        $dataWO[] = $costwosub;
      }

      foreach ($pt as $pettyi => $petty_data) {
        $costpettymat = $this->manag_m->get_petty_data_mat($petty_data->docno,$data_td->boq_costmat,$petty_data->docdate);
        $dataPETTY[] = $costpettymat;

        $costpettymat = $this->manag_m->get_petty_data_sub($petty_data->docno,$data_td->boq_costsub,$petty_data->docdate);
        $dataPETTY[] = $costpettymat;
      }

      foreach ($gl as $gli => $gl_data) {
        $costglmat = $this->manag_m->get_gl_data_mat($gl_data->vchno,$data_td->boq_costmat,$gl_data->refdocdate);
        $dataGL[] = $costglmat;

        $costglsub = $this->manag_m->get_gl_data_sub($gl_data->vchno,$data_td->boq_costsub,$gl_data->refdocdate);
        $dataGL[] = $costglsub;

      }

    }

    $data['gl'] = $dataGL;
    $data['petty'] = $dataPETTY;
    $data['wo'] = $dataWO;
    $data['po'] = $dataPO;
    echo json_encode($data);

  }

  public function get_booking_mat(){

    function get_month($date){

      $array_start = explode("-", $date);
      $array_month = array();
      $months = array(  "01"  => 'JAN', 
                        "02"  => 'FEB', 
                        "03"  => 'MAR', 
                        "04"  => 'APR', 
                        "05"  => 'MAY', 
                        "06"  => 'JUN', 
                        "07"  => 'JUL', 
                        "08"  => 'AUG', 
                        "09"  => 'SEP', 
                        "10"  => 'OCT', 
                        "11"  => 'NOV', 
                        "12"  => 'DEC'
                      );
      $month = $array_start[0];
      $year = $array_start[1];
      $m = array_search($month,$months);
      $data = $m."-".$year;
      return $data;

    }

    $project =  $this->input->post('id_project');
    $code =  $this->input->post('code');
    $pj = $this->manag_m->get_pj($project);
    $pj = $this->manag_m->get_pj($project);
    $bd_ten = $pj[0]->bd_tenid;
    $month =  $this->input->post('month');
    $tender = $this->manag_m->get_costcode($bd_ten); 
    $apv = $this->manag_m->get_apv_h($project);
    $aps = $this->manag_m->get_aps_h($project);
    $apo = $this->manag_m->get_apo_h($project);
    $gl = $this->manag_m->get_gl_h($project);


    foreach ($month as $key => $value) {
      $m = get_month($value);
      $months[] = $m;
    }

    $data['all_month'] = $months;
    $data['code'] = $code;

    foreach ($tender as $td => $data_td) {

      foreach ($apv as $apv_i => $apv_data) {
        $costmat_apv = $this->manag_m->get_apv_mat($apv_data->apv_code,$data_td->boq_costmat,$apv_data->apv_date);
        $dataAPV[] = $costmat_apv;

        $costsub_apv = $this->manag_m->get_apv_sub($apv_data->apv_code,$data_td->boq_costsub,$apv_data->apv_date);
        $dataAPV[] = $costsub_apv;
      }

      foreach ($aps as $aps_i => $aps_data) {
        $costmat_aps = $this->manag_m->get_aps_mat($aps_data->aps_code,$data_td->boq_costmat,$aps_data->ap_date);
        $dataAPS[] = $costmat_aps;

        $costsub_aps = $this->manag_m->get_aps_sub($aps_data->aps_code,$data_td->boq_costsub,$aps_data->ap_date);
        $dataAPS[] = $costsub_aps;
      }

      foreach ($apo as $apo_i => $apo_data) {
        $costmat_apo = $this->manag_m->get_apo_mat($apo_data->ap_no,$data_td->boq_costmat,$apo_data->doc_date);
        $dataAPO[] = $costmat_apo;

        $costsub_apo = $this->manag_m->get_apo_sub($apo_data->ap_no,$data_td->boq_costsub,$apo_data->doc_date);
        $dataAPO[] = $costsub_apo;
      }

      foreach ($gl as $gli => $gl_data) {
        $costglmat = $this->manag_m->get_gl_data_mat($gl_data->vchno,$data_td->boq_costmat,$gl_data->refdocdate);
        $dataGL[] = $costglmat;

        $costglsub = $this->manag_m->get_gl_data_sub($gl_data->vchno,$data_td->boq_costsub,$gl_data->refdocdate);
        $dataGL[] = $costglsub;

      }


    }

    $data['apv'] = $dataAPV;
    $data['aps'] = $dataAPS;
    $data['apo'] = $dataAPO;
    echo json_encode($data);
   
  }

  public function get_achase_mat(){

    function get_month($date){

    $array_start = explode("-", $date);
    $array_month = array();
    $months = array(  "01"  => 'JAN', 
                      "02"  => 'FEB', 
                      "03"  => 'MAR', 
                      "04"  => 'APR', 
                      "05"  => 'MAY', 
                      "06"  => 'JUN', 
                      "07"  => 'JUL', 
                      "08"  => 'AUG', 
                      "09"  => 'SEP', 
                      "10"  => 'OCT', 
                      "11"  => 'NOV', 
                      "12"  => 'DEC'
                    );
    $month = $array_start[0];
    $year = $array_start[1];
    $m = array_search($month,$months);
    $data = $m."-".$year;
    return $data;

    }

    $project =  $this->input->post('id_project');
    $code =  $this->input->post('code');
    $pj = $this->manag_m->get_pj($project);
    $bd_ten = $pj[0]->bd_tenid;
    $month =  $this->input->post('month');
    $tender = $this->manag_m->get_costcode($bd_ten); 
    $ap_chegue[] = $this->manag_m->get_ap_cheque_h($project); 

    

    foreach ($month as $key => $value) {
      $m = get_month($value);
      $months[] = $m;
    }

    

    foreach ($tender as $td => $data_td) {

      foreach ($ap_chegue as $ap_chegue_i => $data) {

        $costmat_ap_c = $this->manag_m->get_ap_c_mat($data['api_code'],$data_td->boq_costmat,$data['date'],$data['api_no'],$data['type']);
        $dataAP[] = $costmat_ap_c;

        $costsub_ap_c = $this->manag_m->get_ap_c_sub($data['api_code'],$data_td->boq_costsub,$data['date'],$data['api_no'],$data['type']);
        $dataAP[] = $costsub_ap_c;

      }

    }

    $data['all_month'] = $months;
    $data['code'] = $code;
    $data['ap'] = $dataAP;
    echo json_encode($data);

  }

 

}
