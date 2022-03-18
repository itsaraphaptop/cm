<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class billing_m extends CI_Model {

	function __construct() {
		parent::__construct();
    }

    public function ReportByYear($year)
    {
        $sql_like = "SELECT *,count(*) as co, SUM(ar_account_detail.acc_cr) as inv_dr FROM ar_account_header INNER JOIN ar_account_detail on ar_account_header.acc_no = ar_account_detail.acc_ref INNER JOIN project on project.project_id = ar_account_header.acc_project WHERE ar_account_header.year = '{$year}' GROUP BY project.project_code";
        
        $query = $this->db->query($sql_like);

        if($query){
            $res = $query->result_array();
        }else{
            $res = null;
        }

        return $res;
    }

    public function mounts($year)
    {
        $sql_search_mounts = "SELECT DISTINCT SUBSTR(ar_account_header.acc_billdate,6,2) as mount FROM  ar_account_header INNER JOIN ar_account_detail on ar_account_header.acc_no = ar_account_detail.acc_ref WHERE ar_account_header.acc_billdate LIKE '{$year}%' GROUP BY ar_account_header.acc_billdate";
        $query = $this->db->query($sql_search_mounts);

        if($query){
            $res = $query->result_array();
        }else{
            $res = null;
        }

        return $res;
    }
}