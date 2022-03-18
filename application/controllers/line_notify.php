 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class line_notify extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('notify_message');
    }

    function test_line(){
        $token = "Fl2zcvq93jag1UwxlGX0OH0RWH3tltxqtjMpGkJsQI3"; //ใส่Token ที่copy เอาไว้
        $str = "Sourcework Test Line Notify API "; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
        
        $res = notify_message($str,$token);
        print_r($res);
    }
    function test_line_me(){
        $token = "y4mi55HjniGRuQIHSKMSLg6CSvkEpvE3ls5yWIUkBFR"; //ใส่Token ที่copy เอาไว้
        $str = "Sourcework Test Line Notify API Itsaraphap"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
        
        $res = notify_message($str,$token);
        print_r($res);
    }
        
}
