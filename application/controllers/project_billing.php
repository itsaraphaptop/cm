<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class project_billing extends CI_Controller {
    public function __construct() 
    {
		parent::__construct();
		$this->load->model('billing_m');
		$this->load->helper('date');
    }

    public function showreport()
    {
        $input = trim($this->input->post('year'));

        $months = array(
            '01'=> 'January',
            '02'=> 'February',
            '03'=> 'March',
            '04'=> 'April',
            '05'=> 'May',
            '06'=> 'June',
            '07'=> 'July ',
            '08'=> 'August',
            '09'=> 'September',
            '10'=> 'October',
            '11'=> 'November',
            '12'=> 'December',
        );

        if($input != '' && $input != null){
            $search_mounts = $this->billing_m->mounts($input);

            foreach($search_mounts as $key => $val){
                $mounts_chang[ array_search($months[$val['mount']], $months) ] = $months[$val['mount']];
            }
            // var_dump($mounts_chang);die();
            $data['rows'] = $this->billing_m->ReportByYear($input);
            $data['year'] = $input;

            if(count($data['rows']) > 0){

                $data['mounts'] = $mounts_chang;
                // var_dump($data['mounts']);die();
                $this->load->view('management/data/content_project_billing.php', $data);
            }else{
                echo "<h1 style='color:red'>ไม่พบข้อมูลที่ต้องการค้นหา</h1>";
            }
        }else{
            echo "<h1>กรุณากรอก</h1>";
        }
    }

}