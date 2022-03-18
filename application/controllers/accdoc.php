<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class accdoc extends CI_Controller {
      public function __construct() {
        parent::__construct();
        $this->load->Model('auth_m');
        $this->load->Model('accdoc_m');

   
    }

    public function show_accdoc()
    {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        if ($username=="") {
        redirect('/');
        }
        $userid = $session_data['m_id'];
        $data['name'] = $session_data['m_name'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $projectid = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['imgu'] = $session_data['img'];
        // echo "<pre>";
        // print_r($aaa);die();
        // $da['apv'] = $this->accdoc_m->colOne();
        // var_dump($da['apv']);die();
        $this->load->view('navtail/base_master/header_v',$data);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_pm_v');
        $this->load->view('management/accdoc/index');
        $this->load->view('base/footer_v');
    }

    public function content_accdoc()
    {
        $year = $this->input->post('year');
        
        $data['mounths'] = array(
            '01' => "january",
            '02' => "february",
            '03' => "march",
            '04' => "april",
            '05' => "may",
            '06' => "june",
            '07' => "july",
            '08' => "august",
            '09' => "september",
            '10' => "october",
            '11' => "november",
            '12' => "december",
        );

        foreach ($data['mounths'] as $key => $value) {
            // echo $key.'<br/>';
            $rows[] = array(
                array(
                    'mounth'    => $value,
                    'colone'    => $this->accdoc_m->sumdetailFourTB($key, 'apv_id', 'apv_header', 'apv_date', 'cnv_id', 'cnv_header', 'cnv_date', 'id', 'ap_down_header', 'createdate', 'id', 'ap_ret_header', 'createdate', $year),
                    'coltwo'    => $this->accdoc_m->sumdetailTwoTB($key, 'aps_id', 'aps_header', 'createdate', 'cns_id', 'cns_header', 'createdate', $year),
                    'colthree'  => $this->accdoc_m->sumdetailTwoTB($key, 'ap_id', 'ap_pettycash_header', 'createdate', 'cno_id', 'cno_header', 'createdate', $year),
                    'colfour'   => $this->accdoc_m->sumdetailOneTB($key, 'ap_id', 'ap_cheque_header', 'ap_chnodate', $year),
                    'colfive'   => $this->accdoc_m->sumdetailOneTB($key, 'ap_pl', 'ap_cheque_header', 'cl_date', $year),
                    'colsix'    => $this->accdoc_m->sumdetailOneTB($key, 'acc_id', 'ar_account_header', 'createdate', $year),
                    'colseven'  => $this->accdoc_m->sumdetailOneTB($key, 'cl_id', 'ar_clear_header', 'createdate', $year),
                    'coleight'  => $this->accdoc_m->sumdetailOneTB($key, 'id_vocher', 'gl_batch_header', 'vchno', $year)
                )
            );
        }
        // echo "<pre>";
        // print_r($rows);die();
        $data['rows'] = $rows;
        $data['year'] = $year;
        $this->load->view('management/accdoc/content_accdoc',$data);
    }

    public function content_in_modal()
    {
        $mounth = $this->input->post('mounth');
        $type   = $this->input->post('type');
        $year   = $this->input->post('year');

        if ($type == 'col1') {

            $data['data1'] = $this->accdoc_m->modal_detail($mounth, $year, 'apv_header', 'apv_date');
            $data['data2'] = $this->accdoc_m->modal_detail($mounth, $year, 'cnv_header', 'cnv_date');
            $data['data3'] = $this->accdoc_m->modal_detail($mounth, $year, 'ap_down_header', 'createdate');
            $data['data4'] = $this->accdoc_m->modal_detail($mounth, $year, 'ap_ret_header', 'createdate');
            $data['type'] = $type;
    
        }else if ($type == 'col2') {

            $data['data1'] = $this->accdoc_m->modal_detail($mounth, $year, 'aps_header', 'createdate');
            $data['data2'] = $this->accdoc_m->modal_detail($mounth, $year, 'cns_header', 'createdate');
            $data['type'] = $type;

        }else if ($type == 'col3') {

            $data['data1'] = $this->accdoc_m->modal_detail($mounth, $year, 'ap_pettycash_header', 'createdate');
            $data['data2'] = $this->accdoc_m->modal_detail($mounth, $year, 'cno_header', 'createdate');
            $data['type'] = $type;

        }else if ($type =='col4') {

            $data['data'] = $this->accdoc_m->modal_detail($mounth, $year, 'ap_cheque_header', 'ap_chnodate');
            $data['type'] = $type;

        }else if ($type == 'col5') {

            $data['data'] = $this->accdoc_m->modal_detail($mounth, $year, 'ap_cheque_header', 'cl_date');
            $data['type'] = $type;

        }else if ($type == 'col6') {

            $data['data'] = $this->accdoc_m->modal_detail($mounth, $year, 'ar_account_header', 'createdate');
            $data['type'] = $type;

        }else if ($type == 'col7') {

            $data['data'] = $this->accdoc_m->modal_detail($mounth, $year, 'ar_account_header', 'cl_date');
            $data['type'] = $type;

        }else if ($type == 'col8') {

            $data['data'] = $this->accdoc_m->modal_detail($mounth, $year, 'gl_batch_header', 'vchno');
            $data['type'] = $type;

        }else{

            $data['data'] = null;
            $data['type'] = $type;
        }
        $this->load->view('management/accdoc/content_in_modal', $data);
    }

}