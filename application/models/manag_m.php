<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class manag_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    public function companyimg()
    {
        $this->db->select('*');
        $query = $this->db->get('company');
        $res = $query->result();
        foreach ($res as $value) {
            $img = $value->comp_img;

        }
        return $img;
    }
    public function get_data($pjid)
    {
      $this->db->select('*');
      $this->db->where('site_no',$pjid);
      $this->db->from('progress_submit');
      $query = $this->db->get();

      if($query){
        $result = $query->result_array();
      }else{
        return false;
      }
      return $result;
    }
    public function getprojectprogress($code)
    {
      $this->db->select('*');
      $this->db->where('submit_no',$code);
      $this->db->from('progress_submit');
      $query = $this->db->get();

      if($query){
        $result = $query->result_array();
      }else{
        return false;
      }
      return $result;
    }
    public function companyname($compcode)
    {
      $this->db->select('*');
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('company');
      $res = $query->result();
      return $res;
    }
    public function getpr_wait($id)  //// pr ยังไม่ได้อนุมัติ
    {
    	$this->db->select('*');
        $this->db->from('pr');
        $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
        $this->db->join('department','department.department_id = pr.pr_department','left outer');
        $this->db->where('pr_project',$id);
    	$this->db->where('pr_approve','wait');
    	$query = $this->db->get();
    	$res = $query->result();
    	return $res;
    }
    public function department()
    {
      $this->db->select('*');
      $query = $this->db->get('department');
      $res = $query->result();
      return $res;
    }
    public function getunit()
    {
      $this->db->select('*');
      $query = $this->db->get('unit');
      $res = $query->result();
      return $res;
    }
    public function getprojectdatastore()
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
        $this->db->select('*');
        $this->db->where('project_status','normal');
        $this->db->where('compcode',$compcode);
        $this->db->order_by('project_id','desc');
        $query = $this->db->get('project');
        $res = $query->result();
        return $res;
    }
    public function getproject_user($username,$id,$compcode) {
      $this->db->select('*');
      $this->db->from('project');
      $this->db->join('project_ic', 'project_ic.project_id = project.project_id');
      $this->db->join('member', 'member.m_id = project_ic.proj_user');
      $this->db->where('project.project_department', "1");
      $this->db->where('proj_user', $username);
      $this->db->where('project.project_sub','no');
      $this->db->where('project_ic.project_status', "Y");
      $this->db->where('project.project_status !=', "close");
      $this->db->where('project.compcode', $compcode);
      // $this->db->where('project.project_department', "1");
      $this->db->order_by('project.project_id', 'desc');
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function getdepartment() {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $this->db->select('*');
      // $this->db->where('compcode',$compcode);
      $this->db->where('project.project_department', "2");
      $this->db->where('project.project_sub','no');
      $this->db->where('project.project_status !=', "close");
      $this->db->order_by('project_code', 'desc');
      $query = $this->db->get('project');
      $res = $query->result();
      return $res;
    }
    public function getdepart_user($username,$compcode) {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $this->db->select('*');
      $this->db->from('project');
      $this->db->join('project_ic', 'project_ic.project_id = project.project_id');
      $this->db->join('member', 'member.m_id = project_ic.proj_user');
      $this->db->where('project.project_department', "2");
      $this->db->where('proj_user', $username);
      $this->db->where('project.project_sub','no');
      $this->db->where('project_ic.project_status', "Y");
      $this->db->where('project.project_status !=', "close");
      $this->db->where('project.compcode', $compcode);
      $this->db->order_by('project.project_id', 'desc');
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function project_name()
    {
      $query = $this->db->query("select * from project");
      $res = $query->result();
     return $res;
    }
    public function getproject_name($compcode,$id){
      $query = $this->db->query('select * from project where compcode = "'.$compcode.'" and project_id="'.$id.'"');
      $res = $query->result_array();
     return $res;
    }
    public function cost_po()
    {
      $query = $this->db->query("SELECT
                                        po.po_pono,
                                        po_item.poi_ref,
                                        po.po_project,
                                        Sum(po_item.poi_priceunit) as sumprice,
                                        project.project_id,
                                        project.project_code,
                                        project.project_name
                                        FROM
                                        po
                                         JOIN po_item ON po_item.poi_ref = po.po_pono
                                         JOIN project ON po.po_project = project.project_id
                                        where
                                          po.po_approve = 'approve'
                                        GROUP BY
                                          po.po_project
                                  ");
     $res = $query->result();
     return $res;
    }
    public function cost_po_ee()
    {
      $query = $this->db->query("SELECT
                                        po.po_pono,
                                        po_item.poi_ref,
                                        po.po_project,
                                        Sum(po_item.poi_priceunit) as sumprice,
                                        project.project_id,
                                        project.project_code,
                                        project.project_name
                                        FROM
                                        po
                                         JOIN po_item ON po_item.poi_ref = po.po_pono
                                         JOIN project ON po.po_project = project.project_id
                                        where
                                          po.po_system = '3'
                                        GROUP BY
                                          po.po_project
                                  ");
     $res = $query->result();
     return $res;
    }

    // public function actual_cost()
    // {
    //   $query = $this->db->query("SELECT
    //                                   project.project_id,
    //                                   project.project_name,
    //                                   apv_header.apv_project,
    //                                   (SELECT Sum(apv_detail.apvi_netamt) from apv_detail   JOIN apv_header on apv_header.apv_code=apv_detail.apvi_ref where apv_system = '3' ) as ee,
    //                                   (SELECT Sum(apv_detail.apvi_netamt) from apv_detail   JOIN apv_header on apv_header.apv_code=apv_detail.apvi_ref where apv_system = '2' ) as ac,
    //                                   (SELECT Sum(apv_detail.apvi_netamt) from apv_detail   JOIN apv_header on apv_header.apv_code=apv_detail.apvi_ref where apv_system = '4' ) as sn,
    //                                   (SELECT Sum(apv_detail.apvi_netamt) from apv_detail   JOIN apv_header on apv_header.apv_code=apv_detail.apvi_ref where apv_system = '5' ) as civil,
    //                                   (SELECT Sum(po_item.poi_netamt) FROM po JOIN po_item ON po_item.poi_ref = po.po_pono where po_approve='approve') as of
    //                                   FROM
    //                                   project
    //                                   LEFT OUTER JOIN apv_header ON apv_header.apv_project = project.project_id
    //                                   LEFT OUTER JOIN apv_detail ON apv_detail.apvi_ref = apv_header.apv_code
    //                                   GROUP BY
    //                                   project.project_name,
    //                                   apv_header.apv_project
    //                          ");
    //   $res = $query->result();
    //   return $res;
    // }

    public function actual_cost()
    {
      $query = $this->db->query("SELECT
                                      project.project_id,
                                      project.project_name,
                                      apv_header.apv_project,
                                      (
																			SELECT sum(net+net1) as net
																			FROM
																			 ( select SUM(apvi_netamt) as net   FROM  apv_detail where apvi_system = '3' ) A
																			CROSS JOIN
																			 ( select SUM(apo_netamt)  as net1  FROM  apo_item where apo_system = '3') B
																			) as ee,
                                      (
																			SELECT sum(net+net1) as net
																			FROM
																			 ( select SUM(apvi_netamt) as net   FROM  apv_detail where apvi_system = '2' ) A
																			CROSS JOIN
																			 ( select SUM(apo_netamt)  as net1  FROM  apo_item where apo_system = '2') B
																			)  as ac,
                                      (
																			SELECT sum(net+net1) as net
																			FROM
																			 ( select SUM(apvi_netamt) as net   FROM  apv_detail where apvi_system = '4' ) A
																			CROSS JOIN
																			 ( select SUM(apo_netamt)  as net1  FROM  apo_item where apo_system = '4') B
																			)  as sn,
                                      (
																			SELECT sum(net+net1) as net
																			FROM
																			 ( select SUM(apvi_netamt) as net   FROM  apv_detail where apvi_system = '5' ) A
																			CROSS JOIN
																			 ( select SUM(apo_netamt)  as net1  FROM  apo_item where apo_system = '5') B
																			)  as civil,
                                      (SELECT Sum(po_item.poi_netamt) FROM po JOIN po_item ON po_item.poi_ref = po.po_pono where po_approve='approve') as of
                                      FROM
                                      project
                                      LEFT OUTER JOIN  apv_header ON apv_header.apv_project = project.project_id
                                      LEFT OUTER JOIN  apv_detail ON apv_detail.apvi_ref = apv_header.apv_code
                                      GROUP BY
                                      project.project_name,
                                      apv_header.apv_project
                             ");
      $res = $query->result();
      return $res;
    }
    public function payment()
    {
      $query = $this->db->query("select sum(poi_netamt) as netamt from po_item");
      $res = $query->result();
      return $res;
    }

    public function getproj($projcode,$compcode)
    {
      $this->db->select('*');
      $this->db->where('project_code',$projcode);
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('project');
      $res = $query->result();
      return $res;
    }
    public function getproj_select($projcode,$compcode,$projid)
    {
      $this->db->select('project_id,project_code,project_name,project_value,project_sub');
      $this->db->where('project_code',$projcode);
      $this->db->or_where('project_sub',$projid);
      $this->db->where('project_status','normal');
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('project');
      $res = $query->result();
      return $res;
    }
    public function getproj_selectsub($projcode,$compcode,$projid)
    {
      $where_p = "(`project_code` = '$projcode' or `project`.`project_sub` = '$projid' )";
      $this->db->select('project_id,project_code,project_name,project_value,project_sub');
      $this->db->where($where_p);
      $this->db->where('project_status','normal');
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('project');
      $res = $query->result();
      return $res;
    }
    public function getproj_select_contact($projcode,$compcode,$projecid)
    {
      $this->db->select('project_id,project_code,project_name,project_value');
      $this->db->where('project_code',$projcode);
      $this->db->where('project_status','normal');
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('project');
      $res = $query->result();
      return $res;
    }
    public function getcostcode($compcode)
    {
      $this->db->select('*');
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('cost_type');
      $res = $query->result();
      return $res;
    }
    public function testdata()
    {
      $po = $this->db->query("select doci_date as start , sum(doci_netamt) as title from pv_apo_detail group by doci_date");
      $res = $po->result();
      return $res;
    }
    public function getproject($compcode)
    {
      $this->db->select('*');
      $this->db->where('compcode',$compcode);
      $this->db->where('project_value !=',0);
      $this->db->order_by('project_id','desc');
      // $this->db->limit("5");
      $query = $this->db->get('project');
      $res = $query->result();
      return $res;
    }
    public function getmatcode()
    {
      $query = $this->db->query("SELECT
                          mat_type.mattype_code,
                          mat_type.mattype_name,
                          mat_group.matgroup_name,
                          mat_group.matgroup_code,
                          mat_subgroup.matsubgroup_code,
                          mat_subgroup.matsubgroup_name,
                          mat_product.matcode,
                          mat_product.matname,
                          mat_spec.matspec_code,
                          mat_spec.matspec_name,
                          CONCAT(mat_group.matgroup_name,' ',mat_subgroup.matsubgroup_name) as matname1,
                          CONCAT(mat_type.mattype_code,mat_group.matgroup_code,mat_subgroup.matsubgroup_code) as matcode1
                          FROM
                          mat_type
                          LEFT OUTER  JOIN mat_group ON mat_type.mattype_code = mat_group.mattype_code
                          LEFT OUTER  JOIN mat_subgroup ON mat_subgroup.mattype_code = mat_group.mattype_code AND mat_subgroup.mattype_code = mat_type.mattype_code AND mat_subgroup.matgroup_code = mat_group.matgroup_code
                          LEFT OUTER JOIN mat_product ON mat_product.mattype_code = mat_subgroup.mattype_code AND mat_product.matgroup_code = mat_subgroup.matgroup_code AND mat_product.mattype_code = mat_group.mattype_code AND mat_product.mattype_code = mat_type.mattype_code AND mat_product.matsubgroup_code = mat_subgroup.matsubgroup_code AND mat_product.matgroup_code = mat_subgroup.matgroup_code AND mat_product.matgroup_code = mat_group.matgroup_code AND mat_product.mattype_code = mat_type.mattype_code
                          LEFT OUTER JOIN mat_spec ON mat_spec.mattype_code = mat_product.mattype_code AND mat_spec.matgroup_code = mat_product.matgroup_code AND mat_spec.matsubgroup_code = mat_product.matsubgroup_code AND mat_spec.matcode = mat_product.matcode AND mat_spec.mattype_code = mat_subgroup.mattype_code AND mat_spec.matgroup_code = mat_subgroup.matgroup_code AND mat_spec.matsubgroup_code = mat_subgroup.matsubgroup_code AND mat_spec.mattype_code = mat_group.mattype_code AND mat_spec.matgroup_code = mat_group.matgroup_code AND mat_spec.mattype_code = mat_type.mattype_code
                          GROUP BY matcode1
                          -- where CONCAT(mat_type.mattype_code,mat_group.matgroup_code,mat_subgroup.matsubgroup_code,mat_product.matcode,mat_spec.matspec_code)='M469010101'
                          ");
                          $res = $query->result();
                          return $res;
    }
    public function getprojectpett()
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
        $this->db->select('*');
        $this->db->where('project_status','normal');
        $this->db->where('compcode',$compcode);
        $this->db->order_by('project_id','desc');
        $query = $this->db->get('project');
        $res = $query->result();
        return $res;
    }
    public function getmember()
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
        $this->db->select('*');
        $this->db->where('compcode',$compcode);
        $query = $this->db->get('member');
        $res = $query->result();
        return $res;
    }

    public function getproject_all($id)
    {
      $this->db->select('*');
      $this->db->where('project_id',$id);
      $query = $this->db->get('project');
      $res = $query->result();
      return $res;
    }



    //////
    public function datesumproject($project_id = null){
        // test 20170000006
      
        $project_id_local = $project_id;
        $this->db->select('*');
        $this->db->from('project');
        $this->db->where('project_code',$project_id_local);
        $query = $this->db->get();     
        $res = $query->result();
        $json = [];
        
        $json_sum_Accumulate["name"] ="Billing";
        $json_sum_Monthly["name"] ="Billing";

        $json_pr_amt_Accumulate["name"] = "Actual cost";
        $json_pr_amt_Monthly["name"] = "Actual cost";

        $json_submit_Accumulate["name"] = "Submit";
        $json_submit_Monthly["name"] = "Submit";

        $forecast_Accumulate["name"] = "Forecast Income";
        $forecast_Monthly["name"] = "Forecast Income";
        
        
        $box = array();
        // loop date start to date end ------------------
        foreach ($res as $e) {
           
            $project_start = $e->project_start;
            $project_stop = $e->project_stop;
             
            // echo date($project_start);
            $project_start =  date("Y-m-d", strtotime("-1 month",strtotime($project_start)));
            $begin = new DateTime($project_start);
            $end = new DateTime($project_stop);

            $interval = DateInterval::createFromDateString('next month');
            $period = new DatePeriod($begin, $interval, $end, DatePeriod::EXCLUDE_START_DATE);
            
            // set color -----------------------------------------------
            // Billing color
            $json_sum_Accumulate["color"] = "#78a5ed";
            $json_sum_Monthly["color"] = "#78a5ed";

            // Forecast color
            $forecast_Accumulate["color"] = "#68f442";
            $forecast_Monthly["color"] = "#68f442"; 

            // Submit color
            $json_submit_Accumulate["color"] = "#56046d";
            $json_submit_Monthly["color"] = "#56046d";
            // set color -----------------------------------------------

            // init array ---------------------------------------
            // Billing
            $json_sum_Monthly["data"] = array();
            $json_sum_Accumulate["data"] = array();

            // Actual cost
            $json_pr_amt_Accumulate["data"] = array();
            $json_pr_amt_Monthly["data"] = array();

            // Submit
            $json_submit_Accumulate["data"] = array();
            $json_submit_Monthly["data"] = array();
            
            // Forecast
            $forecast_Accumulate["data"] =array();
            $forecast_Monthly["data"] = array();
            // init array ---------------------------------------

            // set default value --------------------------------
            // Actual cost
            $sum_apv_am = 0;

            // Billing
            $sum_pamt = 0;

            // submit 
            $sum_submit =0;

            //Forecast
            $sum_forecast_Accumulate=0;
            // set default value --------------------------------


            // Actual cost
            $json_pr_amt_Accumulate["data"][] = 0;
            $json_pr_amt_Monthly["data"][] = 0;

            // Billing
            $json_sum_Accumulate["data"][] = 0;
            $json_sum_Monthly["data"][] = 0;

            //submit
            $json_submit_Accumulate["data"][] = 0;
            $json_submit_Monthly["data"][] = 0;

            //Forecast
            $forecast_Accumulate["data"][] = 0;
            $forecast_Monthly["data"][] = 0;
            

            $json["categories"][] = "start";


            
            foreach ( $period as $dt ){
    

                  $dt->format( "Y-m-d" );
                  $dt_array = (array) $dt;

                  $date_and_time = explode("-", explode(" ", $dt_array["date"])[0]);
                  $date_and_time_str = $date_and_time[0]."-".$date_and_time[1];
                  $date_time_array = explode("-", $date_and_time_str);
                  $year_sub = $date_time_array[0];
                  $month_sub = (int) $date_time_array[1];
                  
                  // chart X

                  // Actual cost
                  $sql_pr_amt="
                  SELECT (sum(apv_detail.apvi_amount)/1000 )
                      as apv_am ,project.project_code 
                      FROM apv_header 
                      INNER JOIN apv_detail 
                      ON (apv_header.apv_code = apv_detail.apvi_ref) 
                      INNER JOIN project 
                      on ( apv_header.apv_project = project.project_id ) 
                      WHERE apv_header.apv_date 
                      LIKE  '{$date_and_time_str}%' AND project.project_code = '{$project_id}'";

                    // Billing
                  $sql_sum = "
                  SELECT (sum(ar_invprogress_detail.inv_progressamt)/1000) 
                      as pamt 
                      FROM ar_invprogress_header 
                      INNER JOIN ar_invprogress_detail 
                      ON (ar_invprogress_header.inv_no = ar_invprogress_detail.inv_ref) 
                      WHERE ar_invprogress_header.inv_project = '{$project_id}' 
                      AND inv_date LIKE '{$date_and_time_str}%'";

                    // submit
                  $sql_sum_submit = "
                    SELECT
                        (sum(progress_submit.amount_submit)/1000) 
                        as sum_submit
                      FROM
                        progress_submit
                      INNER JOIN progress_submit_detail ON (
                        progress_submit.submit_no = progress_submit_detail.submit_ref
                      )
                      WHERE 
                        progress_submit.date LIKE '{$date_and_time_str}%'";

                    // forecast 
                  $sql_forecast = "
                  SELECT (sum(lessother.amount)/1000)
                    as sum_finance 
                    FROM lessother 
                    WHERE lessother.pj = '{$project_id}' 
                    AND lessother.`year` = '{$year_sub}' 
                    AND lessother.`month` = '{$month_sub}'
                    AND lessother.payment = 1";
                 

                  //echo $sql_forecast."<br><br>";
                   $json["categories"][] = substr($date_and_time_str, 2);
                   // auery  Actual cost
                   $query_pr_amt =  $this->db->query($sql_pr_amt);
                   // query  Billing
                   $query_sum =  $this->db->query($sql_sum);
                   //query submit
                   $query_submit = $this->db->query($sql_sum_submit);
                   // query forecast
                   $query_forecast = $this->db->query($sql_forecast);

                      foreach ($query_pr_amt->result_array() as $row)
                      {   // chart Y

                          $json_pr_amt_Accumulate["data"][] = $sum_apv_am+= (($row["apv_am"] == null) ? 0 : $row["apv_am"] *1) ;
                          $json_pr_amt_Monthly["data"][] = (($row["apv_am"] == null) ? 0 : ($row["apv_am"] * 1)) ;

                      }// loop foreach $query_pr_amt

                      foreach ($query_sum->result_array() as $row)
                      {   // chart Y

                          $json_sum_Accumulate["data"][] = $sum_pamt+=(($row["pamt"] == null) ? 0 : $row["pamt"] *1) ;
                          $json_sum_Monthly["data"][] = ( ($row["pamt"] == null) ? 0 : $row["pamt"] * 1 );

                      }// loop foreach $query_sum


                      foreach ($query_submit->result_array() as $row_submit) {
                          
                          $json_submit_Accumulate["data"][] = $sum_submit+= (($row_submit['sum_submit'] == null) ? 0 : $row_submit['sum_submit']*1 );
                          $json_submit_Monthly["data"][] = (($row_submit['sum_submit'] == null) ? 0 : $row_submit['sum_submit']*1 );

                      }


                      foreach ($query_forecast->result_array() as $row)
                      {   // chart Y

                         $forecast_Accumulate["data"][] = $sum_forecast_Accumulate+=(($row["sum_finance"] == null) ? 0 : $row["sum_finance"] *1) ;
                          $forecast_Monthly["data"][] = (($row["sum_finance"] == null) ? 0 :  $row["sum_finance"] * 1) ;

                      }// loop foreach $query_sum





            }// loop foreach $period   

          //Actual cost
          $json['Accumulate'][] = $json_pr_amt_Accumulate;
          // Billing
          $json['Accumulate'][] = $json_sum_Accumulate;
          // submit
          $json['Accumulate'][] = $json_submit_Accumulate;
          // forecast
          $json['Accumulate'][] = $forecast_Accumulate;

           //Actual cost
          $json['Monthly'][] = $json_pr_amt_Monthly;
          // Billing
          $json['Monthly'][] = $json_sum_Monthly;
          // submit
          $json['Monthly'][] = $json_submit_Monthly;
          // forecast
          $json['Monthly'][] = $forecast_Monthly;

          // push project code
          $json['project_id'] = $project_id;

         }// loop foreach $res
         // loop date start to date end ------------------

         return $json;
    } // method datesumproject

    public function get_finance_m($project_id = null){
            $project_id_local = $project_id;
            $this->db->select('*');
            $this->db->from('project');
            $this->db->where('project_code',$project_id_local);
            $query = $this->db->get();     
            $res = $query->result();
            
            $box = array();
            $box["categories"][] = "start"; 
            $box["Accumulate"] = array();

            $Accumulate_income["name"] = "Forecast_Income";
            $Monthly_income["name"] = "Forecast_Income";
            $Accumulate_income["color"] = "#68f442";
            $Monthly_income['color'] = "#68f442";

            $Accumulate_actual_cost["name"] = "Actual_Cost";
            $Monthly_actual_cost["name"] = "Actual_Cost";

            $Accumulate_billing["name"] = "Billing";
            $Monthly_billing["name"] = "Billing";
            
            // $box["Accumulate"]["name"] = "Forecast_Income";
            // $box["Accumulate"]["data"] = array();
            // $box["Accumulate"]["data"][] = 0;
        
        foreach ($res as $e) {
           
            $project_start = $e->project_start;
            $project_stop = $e->project_stop;
             
            // echo date($project_start);
            $project_start =  date("Y-m-d", strtotime("-1 month",strtotime($project_start)));
            $begin = new DateTime($project_start);
            $end = new DateTime($project_stop);

            $interval = DateInterval::createFromDateString('next month');
            $period = new DatePeriod($begin, $interval, $end, DatePeriod::EXCLUDE_START_DATE);
            
            $Accumulate_income["data"][] = 0;
            $Monthly_income['data'][]=0;

            $Accumulate_actual_cost["data"][] = 0;
            $Monthly_actual_cost["data"][] =0;

            $Accumulate_billing["data"][] = 0;
            $Accumulate_billing["color"]= "#938bf9";
            $Monthly_billing["data"][] = 0 ;
            $Monthly_billing["color"] = "#938bf9";

            $Ac_sum_forecast_ic = 0;
            $Ac_sum_actual = 0;
            $Ac_sum_billing = 0;
             foreach ( $period as $dt ){
                  $dt->format( "Y-m-d" );
                  $dt_array = (array) $dt;

                  $date_and_time = explode("-", explode(" ", $dt_array["date"])[0]);
                  $date_and_time_str = $date_and_time[0]."-".$date_and_time[1];
                  // echo $date_and_time_str."<br>";
                  // add chart y 
                  $box["categories"][] = substr($date_and_time_str, 2) ;
                  $date_time_array = explode("-", $date_and_time_str);
                  $year_sub = $date_time_array[0];
                  $month_sub = (int) $date_time_array[1];

                  //query sum_finance
                  $sql_sum_finance = "
                  SELECT (sum(lessother.amount)/1000 )
                  as sum_finance 
                  FROM lessother 
                  WHERE lessother.pj = '{$project_id}' 
                  AND lessother.`year` = '{$year_sub}' 
                  AND lessother.`month` = {$month_sub}";

                  $query_forecast_ic = $this->db->query($sql_sum_finance);
                  $res_forecast_ic = $query_forecast_ic->result_array();
                  $sum_forecast_ic = ($res_forecast_ic[0]["sum_finance"] == null ? 0 :  $res_forecast_ic[0]["sum_finance"] *1);
                  // echo  $sum_forecast_ic."<br>";
                  $Accumulate_income["data"][] = $Ac_sum_forecast_ic+=$sum_forecast_ic;
                   $Monthly_income['data'][] = $sum_forecast_ic;

                  //echo $sum_forecast_ic ;
                  //var_dump($res_forecast_ic[0]["sum_finance"]);
                  $sql_sum_natamp = "
                  SELECT (sum(apv_detail.apvi_netamt)/1000 )
                  as apv_netamp ,project.project_code 
                  FROM apv_header 
                  INNER JOIN apv_detail 
                  ON (apv_header.apv_code = apv_detail.apvi_ref) 
                  INNER JOIN project 
                  ON ( apv_header.apv_project = project.project_id ) 
                  WHERE apv_header.apv_date 
                  LIKE  '{$date_and_time_str}%' 
                  AND project.project_code = '{$project_id}' 
                  AND apv_header.apv_status ='complete'"; 

                  $query_natamp = $this->db->query($sql_sum_natamp);
                  $res_natamp =  $query_natamp->result_array();
                  $sum_natamp = ($res_natamp[0]["apv_netamp"] == null ? 0 : $res_natamp[0]["apv_netamp"] *1);

                  $Accumulate_actual_cost["data"][] = $Ac_sum_actual+=$sum_natamp;
                  $Monthly_actual_cost["data"][] = $sum_natamp;

                  // sql Billing
                  $sql_sum_billing ="
                  SELECT (sum(ar_receipt_detail.vou_downamt)/1000) 
                  as sum_billing 
                  FROM ar_receipt_header 
                  INNER JOIN ar_receipt_detail 
                  ON(ar_receipt_header.vou_no = ar_receipt_detail.vou_ref ) 
                  WHERE ar_receipt_header.vou_project = '{$project_id}' 
                  AND ar_receipt_header.vou_date 
                  LIKE '{$date_and_time_str}%' 
                  AND ar_receipt_header.vou_type = 'progress'";

                  $query_billing = $this->db->query($sql_sum_billing);
                  $res_billing = $query_billing->result_array();
                  $sum_billing = ($res_billing[0]["sum_billing"] == null ? 0 : $res_billing[0]["sum_billing"]*1 );

                  $Accumulate_billing["data"][] = $Ac_sum_billing+=$sum_billing;
                  $Monthly_billing["data"][] = $sum_billing;




            }// loop foreach $res

            $box["Accumulate"][] = $Accumulate_actual_cost;
            $box["Accumulate"][] = $Accumulate_billing;
            $box["Accumulate"][] = $Accumulate_income;

            $box["Monthly"][] = $Monthly_actual_cost;
            $box["Monthly"][] = $Monthly_billing;
            $box["Monthly"][] = $Monthly_income;
            $box['project_id'] = $project_id;

      }

      return $box;
  }// end method get_finance_m


  // model get รายได้
  public function income_to_calendar(){
       $json_date = array();

      // am is amount 
      //cl is calendar

    //sql command income
      $sql_ic_cl = "
        SELECT sum(ar_invprogress_detail.inv_progressamt) 
        as am , ar_invprogress_header.inv_duedate 
        as duedate 
        FROM ar_invprogress_header 
        INNER JOIN ar_invprogress_detail 
        ON (ar_invprogress_header.inv_no = ar_invprogress_detail.inv_ref)
        WHERE ar_invprogress_header.inv_status = 'Y'
        AND ar_invprogress_header.inv_type = 'progress'
        GROUP BY ar_invprogress_header.inv_duedate 
        ";


    
        $query_ic_cl = $this->db->query($sql_ic_cl);

        foreach ($query_ic_cl->result_array() as $row_ic_duedate){
            $json_date[] = array(
              "title" => number_format($row_ic_duedate["am"],2) ,
              "start" => $row_ic_duedate["duedate"],
              "color" =>'#33ccff'
            );
        }


        // sql command expen
        $sql_expen_cl = "
        SELECT sum(apv_detail.apvi_amount) 
          as amount, apv_header.apv_duedate 
          as duedate 
          FROM apv_header 
          INNER JOIN apv_detail 
          ON(apv_header.apv_code = apv_detail.apvi_ref)
        GROUP BY apv_header.apv_duedate ";


      $query_expen_cl = $this->db->query($sql_expen_cl);

      foreach ($query_expen_cl->result_array() as $row_expen_duedate) {
            $json_date[] = array(
            "title" => number_format($row_expen_duedate["amount"],2) ,
            "start" => $row_expen_duedate["duedate"],
            "color" =>'#f93131'
          ); 
      }

             
          return $json_date;

  } // end method income_to_calendar




  public function getGraph_Income_Expen(){
    
    $json = [];
    $array_project_code = array();
    $sql_all_project = "SELECT `project`.`project_code` , `project`.`project_name` FROM project ";
    $query_all_project = $this->db->query($sql_all_project);

    $data_income = array();

    $data_income["name"] = "รายรับ";
    $data_income["color"] = "#33ccff";
    $data_expen["name"] = "รายจ่าย";
    $data_expen["color"] = "#f93131";

    foreach ($query_all_project->result_array() as  $projects) {
        $json['categories'][] = $projects['project_name'];
        $json['project_code'][] = $projects['project_code'];
        
        // command select sum income by project 
        $sql_select_income_by_project_id = "
              SELECT sum(ar_invprogress_detail.inv_progressamt) 
              as am , ar_invprogress_header.inv_duedate 
              as duedate 
              FROM ar_invprogress_header 
              INNER JOIN ar_invprogress_detail 
              ON (ar_invprogress_header.inv_no = ar_invprogress_detail.inv_ref)
              WHERE ar_invprogress_header.inv_status = 'Y'
              AND
              ar_invprogress_header.inv_project = '{$projects['project_code']}'
              LIMIT 1
             ";



        // command select sum expan
        $sql_select_expan_by_project_id = "
              SELECT SUM(apv_detail.apvi_amount) as am  
              FROM apv_header 
              INNER JOIN apv_detail 
              ON(apv_header.apv_code = apv_detail.apvi_ref) 
              INNER JOIN project 
              ON (apv_header.apv_project = project.project_id) 
              WHERE project.project_code = '{$projects['project_code']}'
        ";


        //echo $sql_select_income_by_project_id.";<br><br>";

            $query_sum_income = $this->db->query($sql_select_income_by_project_id);
            $query_sum_expen = $this->db->query($sql_select_expan_by_project_id);

            foreach ( $query_sum_income->result_array() as $row_sum_income_by_project) {
                $data_income["data"][] = (($row_sum_income_by_project['am'] != null) ? $row_sum_income_by_project['am']*1 : 0 );
                 //var_dump($row_sum_by_project) ;
            }

            foreach ($query_sum_expen->result_array() as $row_sum_expan_by_project_id) {
                $data_expen["data"][] = (($row_sum_expan_by_project_id["am"] != null) ?  $row_sum_expan_by_project_id["am"]*1 : 0);
            }
          
    }// loop all project
            $data = array();
            $data[] = $data_income;
            $data[] = $data_expen;
            $json["data"] = $data;
            

            return $json;

  }

  public function getCalender_fn_Cut_off_receipt(){

      $json = array();
      $json_data = array();

      $sql_date_receipt = "
      SELECT sum(ar_receipt_detail.vou_downamt) as downamt ,ar_receipt_header.vou_date as date_calender 
        FROM ar_receipt_header 
        INNER JOIN ar_receipt_detail 
        on(ar_receipt_header.vou_no = ar_receipt_detail.vou_ref) 
        GROUP BY ar_receipt_header.vou_date 
      ";

      
      $query_receipt = $this->db->query($sql_date_receipt);
      // "title" => number_format($row_expen_duedate["amount"],2) ,
      //       "start" => $row_expen_duedate["duedate"],
      //       "color" =>'#f93131'
      foreach ($query_receipt->result_array() as $data_receipt) {
        $json_date[] = array(
            "title" => number_format($data_receipt["downamt"],2),
            "start" => $data_receipt["date_calender"],
            "color" =>'#33ccff'
          );
      }


      $sql_data_cut_off = "
      SELECT sum(apv_detail.apvi_netamt) 
      as netamt , apv_header.apv_date 
      as data_apv  
      FROM apv_header  
      INNER JOIN apv_detail 
      on(apv_header.apv_code = apv_detail.apvi_ref) 
      WHERE apv_header.apv_status = 'complete' GROUP BY apv_header.apv_date";

      $query_cut_off = $this->db->query($sql_data_cut_off);

      foreach ($query_cut_off->result_array()  as $data_cut_off) {
          $json_date[] = array(
              "title" => number_format($data_cut_off["netamt"],2),
              "start" => $data_cut_off["data_apv"],
              "color" =>'#f93131'
          );
      }



      return $json_date;
          //echo json_encode($json_date);
          // var_dump($json_date);
  }

  public function getJson_tochart_cashflow_cash(){
      $json = array();
      $sql_all_project = "SELECT `project`.`project_code` , `project`.`project_name` FROM project ";
      $query_all_project = $this->db->query($sql_all_project);
  
      $data_cut_off_arr = array();
      $data_cut_off_arr["name"] = "ตัดจ่าย";

      $data_receipt_arr = array();
      $data_receipt_arr["name"] = "ออกใบเสร็จ";

      foreach ( $query_all_project->result_array() as $projects ) {

        $json['categories'][] = $projects['project_name'];
        $json['project_code'][] = $projects['project_code'];

        $sql_cut_off = "
        SELECT
            sum(apv_detail.apvi_netamt) AS sum_net_amt,
            project.project_name
          FROM
            apv_header
          INNER JOIN apv_detail ON (
            apv_header.apv_code = apv_detail.apvi_ref
          )
          INNER JOIN project ON (
            apv_header.apv_project = project.project_id
          )
          WHERE
            project.project_code = '{$projects['project_code']}'
          LIMIT 1
            ";

            $query_cut_off_chart = $this->db->query($sql_cut_off);

            foreach ($query_cut_off_chart->result_array() as $data_cut_off) {
              $data_cut_off_arr["data"][] = ($data_cut_off["sum_net_amt"] == null ? 0 : $data_cut_off["sum_net_amt"]*1 );
            }


        $sql_receipt = "
          SELECT
            sum(ar_receipt_detail.vou_downamt) as downamt
          FROM
            ar_receipt_header
          INNER JOIN ar_receipt_detail ON (
            ar_receipt_header.vou_no = ar_receipt_detail.vou_ref
          )

          WHERE ar_receipt_header.vou_project = '{$projects['project_code']}'

        ";
            
            $query_receipt = $this->db->query($sql_receipt);

            foreach ($query_receipt->result_array() as $data_receipt) {
              
              $data_receipt_arr["data"][] = (($data_receipt["downamt"] == null) ? 0 : $data_receipt["downamt"]*1);
              # code...
            }




      }// loop all project
      $data = [];
      $data[] = $data_cut_off_arr;
      $data[] =  $data_receipt_arr;
      $json["data"] =  $data;
     
      return $json;
  }


      public function loadprdetail_v($id,$bd)
    {
      $this->db->select('*');
      $this->db->where('pri_ref',$id);
      $this->db->where('pri_status =','no');
      $this->db->where('pri_project =',$bd);
      $this->db->where('pr_project =',$bd);
      $this->db->join('pr','pr.pr_prno = pr_item.pri_ref');
      $query = $this->db->get('pr_item');
      $res = $query->result();
      return $res;

    }

    public function sel_pro($id)
    {

      $this->db->select('*');
      $this->db->from('project');
      $this->db->where('project_code',$id);
      $query = $this->db->get();
      $res = $query->result_array();
      return $res;
    }

    public function total_budget($id)
    {
      $this->db->select_sum('job_amount');
      $this->db->from('project_item');
      $this->db->where('project_code',$id);
      $query = $this->db->get();
      $res = $query->result_array();
      return $res;
    }

    public function boq($bd_tenid)
    {
      $this->db->select_sum('totalamtboq');
      $this->db->from('boq_item');
      $this->db->where('boq_bd',$bd_tenid);
      $query = $this->db->get();
      $res = $query->result_array();
      return $res;
    }

     public function project_mm($compcode)
    {
      $this->db->select('*');
      $this->db->from('project');
      $this->db->where('project_status',"normal");
      $this->db->where('compcode',$compcode);
      $this->db->where('project_sub',"no");
      $this->db->where('project_department','1');
      // $this->db->group_by('boq_project');
      // $this->db->join('boq_item','boq_item.boq_project = project.bd_tenid','left');
      $this->db->order_by('project_id');
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }

    public function get_costname()
    {
      $this->db->select('*');
      $this->db->from('cost_type');
      $query = $this->db->get();

      if($query){
        $res = $query->result_array();
      }else{
        $res = null;
      }

      return $res;
    }

    public function get_bd_tender($project_code)
    {
      $this->db->select('bd_tenid');
      $this->db->from('project');
      $this->db->where('project_code', $project_code);
      $query = $this->db->get();

      if($query){
        $res = $query->result_array();
      }else{
        $res = null;
      }

      return $res;
    }

    public function get_boqitem($tender_id)
    {
      $this->db->select('boq_costmatname,boq_costsubname,boq_project,boq_costsub,boq_costmat,code_type1,code_type2,code_group1,code_group2,code_subgroup1,code_subgroup2,boq_budget_amt,boq_lab_amt,boq_budget_total');
      $this->db->from('boq_item');
      $this->db->where('boq_item.boq_project', $tender_id);
      // $this->db->limit(1);
      $query = $this->db->get();

      if($query){
        $res = $query->result_array();
      }else{
        $res = null;
      }

      return $res;
    }

 public function get_detail_boq($tender_id)
    {
      // $this->db->select('*, SUM(cost_no) as total_cost, SUM(boq) as total_boq');
      // $this->db->from('detail_boq');
      // $this->db->where('sub_boq', $tender_id);
      // $this->db->group_by('sub_code');
      // $query_1 = $this->db->get();

      // $res_group_mat = $query_1->result_array();
        $this->db->distinct();
        // $this->db->select("REGEXP_SUBSTR(sub_code,'[A-Z]+') as group_mat" ,FALSE);
        $this->db->select("cost");
        $this->db->where("sub_boq",$tender_id);
        $query_1 = $this->db->get("detail_boq");
        $res_group_mat= $query_1->result_array();

      foreach ($res_group_mat as $key => $group_mat) {
          $this->db->select("*,sum(cost_no) as summ , sum(boq) as total_boq");
          $this->db->where("sub_boq",$tender_id);
          // $this->db->where("group_word", $group_mat["group_mat"]);
          $this->db->where("cost", $group_mat["cost"]);
          
          $this->db->group_by("sub_code");
          $this->db->order_by('sub_code', 'ASC');
          $query_2 = $this->db->get("detail_boq");
          $res_group_mat_list = $query_2->result_array();
          $array_mat_list[] = $res_group_mat_list;
          // echo "<pre>";
          // print_r($array_mat_list);
          //  echo "</pre>";
          //  die();
      // }
      } 
      if (isset($array_mat_list)) {
        foreach ($array_mat_list as $key => $mat_list) {
              $sum_total_cost = 0;
              $sum_total_boq = 0;
                for($index_rev = (count($mat_list)-1) ; $index_rev >= 0 ; $index_rev-- ){
                  $sum_total_cost += $array_mat_list[$key][$index_rev]["summ"]*1;
                  $sum_total_boq += $array_mat_list[$key][$index_rev]["total_boq"]*1;
                  $array_mat_list[$key][$index_rev]["total_cost"] = $sum_total_cost;
                  $array_mat_list[$key][$index_rev]["total_boq"] = $sum_total_boq;
                }
        }


        // echo "<pre>";
        // for1
        $array_lv4 = array();
        $array_lv4[] = 0;
        $path_lv3_last = [];
        $path_lv3_last[] = -1;      


        // for2
        $array_lv42 = array();
        $array_lv42[] = 0;
        $path_lv3_last2 = [];
        $path_lv3_last2[] = -1;


        foreach ($array_mat_list as $key1 => $mat_list_item) {
            
            foreach ($mat_list_item as $key2 => $item) {

                  if($item["typecost"]==4){
                    $array_lv4[] = $item["summ"];
                    $array_lv4_boq[] = $item['boq'];
                  }

                  if ($item["typecost"]==3) {
                    
                      if(end($path_lv3_last) != -1){
                        // echo "<pre>";
                        // print_r($path_lv3_last);

                          $array_mat_list[$key1][end($path_lv3_last)]["summ"] = array_sum($array_lv4);
                          $array_mat_list[$key1][end($path_lv3_last)]["boq"] = array_sum($array_lv4_boq);
                          //echo end($path_lv3_last);
                          //echo "<br>";
                      }

                      $keylast = end($path_lv3_last);

                      $array_lv4 = array();
                      $array_lv4_boq = array();
                      $path_lv3_last[] = $key2;
                  }
                  
            }
            if ($keylast < end($path_lv3_last)) {
              # code...

              $array_mat_list[$key1][end($path_lv3_last)]["summ"] = array_sum($array_lv4);
              $array_mat_list[$key1][end($path_lv3_last)]["boq"] = array_sum($array_lv4_boq);
            }
            $path_lv3_last =array();

        // die();
        }

        foreach ($array_mat_list as $k1 => $mat_list_item1) {
          foreach ($mat_list_item1 as $k2 => $item2) {
            // echo "<pre>";
            // print_r($item2);
            // echo "</pre>";
            if($item2["typecost"]==3){
              $array_lv42[] = $item2["summ"];
              $array_lv42_boq[] = $item2["boq"];
            }
            if ($item2["typecost"]==2) {
              
                if(end($path_lv3_last2) != -1){

                    $array_mat_list[$k1][end($path_lv3_last2)]["summ"] = array_sum($array_lv42);
                    $array_mat_list[$k1][end($path_lv3_last2)]["boq"] = array_sum($array_lv42_boq);

                }

                $keylast2 = end($path_lv3_last2);

                $array_lv42 = array();
                $array_lv42_boq = array();
                $path_lv3_last2[] = $k2;
            }
          }
          if ($keylast2 < end($path_lv3_last2)) {

            $array_mat_list[$k1][end($path_lv3_last2)]["summ"] = array_sum($array_lv42);
            $array_mat_list[$k1][end($path_lv3_last2)]["boq"] = array_sum($array_lv42_boq);

          }
          $path_lv3_last2 = array();
        }
      }else{
        $array_mat_list = array();
      }
      
     
      return $array_mat_list;

    }


    public function get_cost_type()
    {
      $this->db->select('*');
      $this->db->from('cost_type');
      $query = $this->db->get();

      if($query){
        $res = $query->result_array();
      }else{
        $res = null;
      }

      return $res;
    }


     public function get_po_unti($mat,$limit)
    {
        $this->db->select('*');
        $this->db->from('po_item');
        $this->db->where('poi_matcode',$mat);
        $this->db->limit($limit);
        $this->db->order_by('poi_id','desc');
        $res = $this->db->get()->result();
        return $res;
    }

    public function get_wo_unti($mat,$limit)
    {
        $this->db->select('*');
        $this->db->from('lo_detail');
        $this->db->where('lo_matcode',$mat);
        $this->db->limit($limit);
        $this->db->order_by('lo_idd','desc');
        $res = $this->db->get()->result();
        return $res;
    }

    public function getdatamaster()
    {
        $this->db->select('*');
        $this->db->from('master_cf_head');
        $res = $this->db->get()->result();
        return $res;
    }

    public function getdata_project()
    {
        $this->db->select('project_id,project_code,project_name');
        $this->db->from('project');
        $res = $this->db->get()->result();
        return $res;
    }

    public function get_projectboq($tender_id)
    {
      $this->db->select('SUM(boq_budget_total) as budget'); 
      $this->db->select('SUM(boq_total_amt) as boq_amt'); 
      $this->db->from('boq_item'); 
      $this->db->where('boq_project', $tender_id); 
      $query = $this->db->get()->result(); 
      return $query; 
    }

    public function get_desc($tender_id) 
    { 
 
      $this->db->select('*');  
      $this->db->from('boq_item');  
      $this->db->where('boq_project', $tender_id);  
      $query = $this->db->get()->result();  
      return $query; 
 
    }

    public function forecastmonth($input) 
    { 
 
      foreach ($input['cost_code'] as $ikey => $code) {
          foreach ($input['price'.$input['cost_code'][$ikey]] as $key => $value) {
   
          
            $data = array(
              "project_id" => $input['pj_id'],
              "costcode" => $input['cost_code'][$ikey],
              "start" => $input['start'][$ikey],
              "end" => $input['end'][$ikey],
              "month_year" => $input['month'.$input['cost_code'][$ikey]][$key],
              "price" => $input['price'.$input['cost_code'][$ikey]][$key],
      
              );

           $this->db->insert('forecast_month', $data);
        }
      }
      

      return $input['pj_id'];


 
    }

    public function forecastmonth_edit($input) 
    { 

      $this->db->select('project_id');
      $this->db->from('forecast_payment'); 
      $this->db->where('project_id', $input['pj_id']); 
      $query = $this->db->get()->result(); 
     


      if (!empty($query)) {

        foreach ($input['payment_price'] as $pay_key => $data_pay) {

            $pay_update = array(
                              "start" => $input['start_payment'],
                              "end" => $input['stop_payment'],
                              "price" => $input['payment_price'][$pay_key]
                              );

            // echo "<pre>";
            // var_dump($pay_update);

            $this->db->where('project_id',$input['pj_id']);
            $this->db->where('month_year',$input['paymonth'][$pay_key]);
            // $this->db->where('end',$input['stop_payment']);
            $this->db->update('forecast_payment', $pay_update);
        }


      }else{
        foreach ($input['payment_price'] as $pay_key => $data_pay) {
          $pay_insert = array(
                            "project_id" => $input['pj_id'],
                            "start" => $input['start_payment'],
                            "end" => $input['stop_payment'],
                            "month_year" => $input['paymonth'][$pay_key],
                            "price" => $input['payment_price'][$pay_key]
                            );
          $this->db->insert('forecast_payment', $pay_insert);
        }

      }


        foreach ($input['cost_code'] as $ikey => $code) {
          foreach ($input['price'.$input['cost_code'][$ikey]] as $key => $value) {
   
          
            
            $data = array(
              "start" => $input['start'][$ikey],
              "end" => $input['end'][$ikey],
              "price" => $input['price'.$input['cost_code'][$ikey]][$key]
      
              );

            
            $this->db->where('project_id',$input['pj_id']);
            $this->db->where('costcode',$input['cost_code'][$ikey]);
            $this->db->where('month_year',$input['month'.$input['cost_code'][$ikey]][$key]);
            $this->db->update('forecast_month', $data);
        }
          
      }
           
      return $input['pj_id'];

 
    }


    public function get_pading($pj_id=null,$pj_code=null){

        $arrayData = array();
        
          if ($pj_code != null) {
            $this->db->select("project_id");
            $this->db->from("project");
            $this->db->where("project_code",$pj_code);
            $query = $this->db->get()->result(); 
            $project_id = $query[0]->project_id;

              if ($project_id != null) {

                // pr wait for approve 
                $this->db->select("COUNT(pr_prno) as count_pr");
                $this->db->from("pr");
                $this->db->where("pr_project",$project_id);
                $this->db->where("pr_approve","wait");
                $query_pr = $this->db->get()->result();
                $pr_all = $query_pr[0]->count_pr;
                $arrayData['pr'] = $pr_all;
                // pr wait for approve

                // pr approve wait open PO 
                $this->db->select("COUNT(pr_prno) as count_pr");
                $this->db->from("pr");
                $this->db->where("pr_project",$project_id);
                $this->db->where("pr_approve","approve");
                $this->db->where("po_open","no");
                $query_pr = $this->db->get()->result();
                $pr_all_approve = $query_pr[0]->count_pr;
                $arrayData['pr_approve'] = $pr_all_approve;
                // pr approve wait open PO

                // po wait approve
                $this->db->select("COUNT(po_pono) as count_po");
                $this->db->from("po");
                $this->db->where("po_project",$project_id);
                $this->db->where("po_approve","wait");
                $query_po = $this->db->get()->result();
                $po_all = $query_po[0]->count_po;
                $arrayData['po'] = $po_all;
                // po wait approve

                // po wait approve
                $this->db->select("COUNT(po_pono) as count_po");
                $this->db->from("po");
                $this->db->where("po_project",$project_id);
                $this->db->where("po_approve","approve");
                $this->db->where("ic_status","wait");
                $query_po = $this->db->get()->result();
                $po_all = $query_po[0]->count_po;
                $arrayData['po_approve'] = $po_all;
                // po wait approve



                $this->db->select("COUNT(po_reccode) as count_ic");
                $this->db->from("receive_po");
                $this->db->where("project",$project_id);
                $this->db->where("ic_status","open");
                $query_ic = $this->db->get()->result();
                $ic_all = $query_ic[0]->count_ic;
                $arrayData['ic'] = $ic_all;

              }

              return $arrayData;

          }elseif ($pj_id != null) {
            
              // pr wait for approve
              $this->db->select("COUNT(pr_prno) as count_pr");
              $this->db->from("pr");
              $this->db->where("pr_project",$pj_id);
              $this->db->where("pr_approve","wait");
              $query_pr = $this->db->get()->result();
              $pr_all = $query_pr[0]->count_pr;
              $arrayData['pr'] = $pr_all;
              // pr wait for approve

             // pr approve wait open PO 
              $this->db->select("COUNT(pr_prno) as count_pr");
              $this->db->from("pr");
              $this->db->where("pr_project",$pj_id);
              $this->db->where("pr_approve","approve");
              $this->db->where("po_open","no");
              $query_pr = $this->db->get()->result();
              $pr_all_approve = $query_pr[0]->count_pr;
              $arrayData['pr_approve'] = $pr_all_approve;
              // pr approve wait open PO

              $this->db->select("COUNT(po_pono) as count_po");
              $this->db->from("po");
              $this->db->where("po_project",$pj_id);
              $this->db->where("po_approve","wait");
              $query_po = $this->db->get()->result();
              $po_all = $query_po[0]->count_po;
              $arrayData['po'] = $po_all;

              $this->db->select("COUNT(po_reccode) as count_ic");
              $this->db->from("receive_po");
              $this->db->where("project",$pj_id);
              $query_ic = $this->db->get()->result();
              $ic_all = $query_ic[0]->count_ic;
              $arrayData['ic'] = $ic_all;

              return $arrayData;
                
          }

      }


      

  public function get_pj($id){

    $this->db->select('bd_tenid,project_start,project_stop');  
    $this->db->from('project');  
    $this->db->where('project_id', $id);  
    $query = $this->db->get()->result();  
    return $query; 

  }  

  public function get_po_h($id){

    $this->db->select('po_pono, po_podate');  
    $this->db->from('po');  
    $this->db->where('po_project', $id);  
    $query = $this->db->get()->result();  
    return $query; 

  }

    public function get_cost_mat($pono,$costcode,$date){

    $this->db->select('SUM(poi_amount) as price');  
    $this->db->from('po_item');  
    $this->db->where('poi_ref', $pono);  
    $this->db->where('poi_costcode', $costcode);
    $this->db->group_by('poi_costcode'); 
    $query_ = $this->db->get()->result_array();
    $data = array();
    $poi=0;

    
    $arrdate = explode("-",$date );
    if(count($query_)>0){
        if(isset($query_[0]["poi_amount"])){
            $data[] = array(  "costcode"=>$costcode,
                              "value"=>$query_[0]["poi_amount"],
                              "date"=> $arrdate[1]."-".$arrdate[0]
                            );  
        }else{
             $data[] = array("costcode"=>$costcode,
                            "value"=>0,
                            "date"=> $arrdate[1]."-".$arrdate[0]
                            );
        }
      
    }else{
       $data[] = array("costcode"=>$costcode,
                            "value"=>0,
                            "date"=> $arrdate[1]."-".$arrdate[0]
                            );
    }
   
    return $data; 

  }

  public function get_cost_sub($pono,$costcode,$date){

    $this->db->select('SUM(poi_amount) as price');  
    $this->db->from('po_item');  
    $this->db->where('poi_ref', $pono);  
    $this->db->where('poi_costcode', $costcode);  
    $this->db->group_by('poi_costcode'); 
    $query = $this->db->get()->result();
    $data = array();
    $poi=0;
    
    $arrdate = explode("-",$date );
    if(count($query)>0){
        if(isset($query[0]["price"])){ 
            $data[] = array(  "costcode"=>$costcode,
                              "value"=>$query[0]["price"],
                              "date"=> $arrdate[1]."-".$arrdate[0]
                            ); 
        }else{
            $data[] = array("costcode"=>$costcode,
                            "value"=>0,
                            "date"=> $arrdate[1]."-".$arrdate[0]
                            );

        }
      
    }else{
       $data[] = array( "costcode"=>$costcode,
                        "value"=>0,
                        "date"=> $arrdate[1]."-".$arrdate[0]
                      );

    }

    return $data; 

  }

  public function get_costcode($tender_id){ 
 
    $this->db->select('boq_costmat, boq_costsub');  
    $this->db->from('boq_item');  
    $this->db->where('boq_project', $tender_id);  
    $query = $this->db->get()->result();  
    return $query; 
 
  }

  public function get_lo_h($project){ 
 
    $this->db->select('lo_lono,lodate');  
    $this->db->from('lo');  
    $this->db->where('projectcode', $project);  
    $query = $this->db->get()->result();  
    return $query; 
 
  }

  public function get_petty_h($project){ 
 
    $this->db->select('docno,docdate');  
    $this->db->from('pettycash');  
    $this->db->where('project', $project);  
    $query = $this->db->get()->result();  
    return $query; 
 
  }

  public function get_gl_h($project){ 
 
    $this->db->select('vchno,refdocdate');  
    $this->db->from('gl_batch_details');  
    $this->db->where('project_id', $project);  
    $query = $this->db->get()->result();  
    return $query; 
 
  }

  public function get_wo_data_mat($lono,$mat,$date){ 
 
    $this->db->select('SUM(lo_priceunit) as price');  
    $this->db->from('lo_detail');  
    $this->db->where('lo_ref', $lono);  
    $this->db->where('lo_costcode', $mat); 
    $this->db->group_by('lo_costcode');
    $query = $this->db->get()->result();
    $data = array();

    $arrdate = explode("-",$date);

    if(count($query)>0){
        if(isset($query[0]->price)){ 
            $data[] = array(  "costcode"=>$mat,
                              "value"=>$query[0]->price,
                              "date"=> $arrdate[1]."-".$arrdate[0]
                            ); 
        }else{
            $data[] = array("costcode"=>$mat,
                            "value"=>0,
                            "date"=> $arrdate[1]."-".$arrdate[0]
                            );

        }
      
    }else{
       $data[] = array( "costcode"=>$mat,
                        "value"=>0,
                        "date"=> $arrdate[1]."-".$arrdate[0]
                      );

    }

    return $data; 
 
  }

  public function get_wo_data_sub($lono,$mat,$date){ 
 
    $this->db->select('SUM(lo_priceunit) as price');  
    $this->db->from('lo_detail');  
    $this->db->where('lo_ref', $lono);  
    $this->db->where('lo_costcode', $mat);
    $this->db->group_by('lo_costcode');  
    $query = $this->db->get()->result();
    $data = array();

    $arrdate = explode("-",$date);

    if(count($query)>0){
        if(isset($query[0]->price)){ 
            $data[] = array(  "costcode"=>$mat,
                              "value"=>$query[0]->price,
                              "date"=> $arrdate[1]."-".$arrdate[0]
                            ); 
        }else{
            $data[] = array("costcode"=>$mat,
                            "value"=>0,
                            "date"=> $arrdate[1]."-".$arrdate[0]
                            );

        }
      
    }else{
       $data[] = array( "costcode"=>$mat,
                        "value"=>0,
                        "date"=> $arrdate[1]."-".$arrdate[0]
                      );

    }

    return $data; 
 
  }

  public function get_petty_data_mat($ptno,$mat,$date){ 
 
    $this->db->select('SUM(pettycashi_amounttot) as price');  
    $this->db->from('pettycash_item');  
    $this->db->where('pettycashi_ref', $ptno);  
    $this->db->where('pettycashi_costcode', $mat);
    $this->db->group_by('pettycashi_costcode');  
    $query = $this->db->get()->result();
    $data = array();

    $arrdate = explode("-",$date);

    if(count($query)>0){
        if(isset($query[0]->price)){ 
            $data[] = array(  "costcode"=>$mat,
                              "value"=>$query[0]->price,
                              "date"=> $arrdate[1]."-".$arrdate[0]
                            ); 
        }else{
            $data[] = array("costcode"=>$mat,
                            "value"=>0,
                            "date"=> $arrdate[1]."-".$arrdate[0]
                            );

        }
      
    }else{
       $data[] = array( "costcode"=>$mat,
                        "value"=>0,
                        "date"=> $arrdate[1]."-".$arrdate[0]
                      );

    }


    return $data; 
 
  }

  public function get_petty_data_sub($ptno,$mat,$date){ 
 
    $this->db->select('SUM(pettycashi_amounttot) as price');  
    $this->db->from('pettycash_item');  
    $this->db->where('pettycashi_ref', $ptno);  
    $this->db->where('pettycashi_costcode', $mat);
    $this->db->group_by('pettycashi_costcode');  
    $query = $this->db->get()->result();
    $data = array();

    $arrdate = explode("-",$date);

    if(count($query)>0){
        if(isset($query[0]->pettycashi_amonttot)){ 
            $data[] = array(  "costcode"=>$mat,
                              "value"=>$query[0]->pettycashi_amonttot,
                              "date"=> $arrdate[1]."-".$arrdate[0]
                            ); 
        }else{
            $data[] = array("costcode"=>$mat,
                            "value"=>0,
                            "date"=> $arrdate[1]."-".$arrdate[0]
                            );

        }
      
    }else{
       $data[] = array( "costcode"=>$mat,
                        "value"=>0,
                        "date"=> $arrdate[1]."-".$arrdate[0]
                      );

    }


    return $data; 
 
  }  

  public function get_gl_data_mat($glno,$mat,$date){ 
 
    $this->db->select('SUM(amount) as price');  
    $this->db->from('gl_batch_details');  
    $this->db->where('vchno', $glno);  
    $this->db->where('costcode', $mat);
    $this->db->group_by('costcode'); 
    $query = $this->db->get()->result();
    $data = array();



    $arrdate = explode("-",$date);

    if(count($query)>0){
        if(isset($query[0]->price)){ 
            $data[] = array(  "costcode"=>$mat,
                              "value"=>$query[0]->price,
                              "date"=> $arrdate[1]."-".$arrdate[0]
                            ); 
        }else{
            $data[] = array("costcode"=>$mat,
                            "value"=>0,
                            "date"=> $arrdate[1]."-".$arrdate[0]
                            );

        }
      
    }else{
       $data[] = array( "costcode"=>$mat,
                        "value"=>0,
                        "date"=> $arrdate[1]."-".$arrdate[0]
                      );

    }


    return $data; 
 
  }

  public function get_gl_data_sub($glno,$mat,$date){ 
 
    $this->db->select('SUM(amount) as price');  
    $this->db->from('gl_batch_details');  
    $this->db->where('vchno', $glno);  
    $this->db->where('costcode', $mat);
    $this->db->group_by('costcode');  
    $query = $this->db->get()->result();
    $data = array();



    $arrdate = explode("-",$date);

    if(count($query)>0){
        if(isset($query[0]->price)){ 
            $data[] = array(  "costcode"=>$mat,
                              "value"=>$query[0]->price,
                              "date"=> $arrdate[1]."-".$arrdate[0]
                            ); 
        }else{
            $data[] = array("costcode"=>$mat,
                            "value"=>0,
                            "date"=> $arrdate[1]."-".$arrdate[0]
                            );

        }
      
    }else{
       $data[] = array( "costcode"=>$mat,
                        "value"=>0,
                        "date"=> $arrdate[1]."-".$arrdate[0]
                      );

    }


    return $data; 
 
  }

  public function get_apv_h($project){

    $this->db->select('apv_code, apv_date');  
    $this->db->from('apv_header');  
    $this->db->where('apv_project', $project);
    $this->db->where('apv_type', 'apv');    
    $query = $this->db->get()->result();  
    return $query; 

  }

  public function get_apo_h($project){

    $this->db->select('ap_no, doc_date');  
    $this->db->from('ap_pettycash_header');  
    $this->db->where('ap_project', $project);  
    $query = $this->db->get()->result();  
    return $query; 

  }

  public function get_aps_h($project){

    $this->db->select('aps_code, ap_date');  
    $this->db->from('aps_header');  
    $this->db->where('aps_project', $project);  
    $this->db->where('aps_billtype', '1');  
    $query = $this->db->get()->result();  
    return $query; 

  }

  public function get_ap_cheque_h($project){


    $this->db->select("ap_cheque_header.ap_code,ap_cheque_header.createdate,ap_cheque_detail.api_no,ap_cheque_detail.api_type");
    $this->db->from("ap_cheque_header");
    $this->db->join("ap_cheque_detail","ap_cheque_header.ap_code = ap_cheque_detail.api_code");
    $this->db->where("ap_cheque_detail.api_project",$project);
    $this->db->where("ap_cheque_header.ap_status","complete");
    $query = $this->db->get()->result();    

    foreach ($query as $key => $value) {
      $date = $value->createdate;
      $timestamp = strtotime($date);
      $subdate = date('Y-m-d',  $timestamp);
      $data = array();
      $data['api_code'] = $value->ap_code;
      $data['date'] = $subdate;
      $data['api_no'] = $value->api_no;
      $data['type'] = $value->api_type;
    }
    

    return $data;
     

  }

  public function get_apv_mat($apv_code,$mat,$date){
   
    $this->db->select('SUM(apvi_amount) as price');  
    $this->db->from('apv_detail');  
    $this->db->where('apvi_ref', $apv_code);  
    $this->db->where('apvi_costcode', $mat);
    $this->db->group_by('apvi_costcode');  
    $query = $this->db->get()->result();
    $data = array();

    $arrdate = explode("-",$date);

    if(count($query)>0){
        if(isset($query[0]->price)){ 
            $data[] = array(  "costcode"=>$mat,
                              "value"=>$query[0]->price,
                              "date"=> $arrdate[1]."-".$arrdate[0]
                            ); 
        }else{
            $data[] = array("costcode"=>$mat,
                            "value"=>0,
                            "date"=> $arrdate[1]."-".$arrdate[0]
                            );

        }
      
    }else{
       $data[] = array( "costcode"=>$mat,
                        "value"=>0,
                        "date"=> $arrdate[1]."-".$arrdate[0]
                      );

    }


    return $data;

  }

  public function get_apv_sub($apv_code,$mat,$date){
   
    $this->db->select('SUM(apvi_amount) as price');  
    $this->db->from('apv_detail');  
    $this->db->where('apvi_ref', $apv_code);  
    $this->db->where('apvi_costcode', $mat);
    $this->db->group_by('apvi_costcode');  
    $query = $this->db->get()->result();
    $data = array();

    $arrdate = explode("-",$date);

    if(count($query)>0){
        if(isset($query[0]->price)){ 
            $data[] = array(  "costcode"=>$mat,
                              "value"=>$query[0]->price,
                              "date"=> $arrdate[1]."-".$arrdate[0]
                            ); 
        }else{
            $data[] = array("costcode"=>$mat,
                            "value"=>0,
                            "date"=> $arrdate[1]."-".$arrdate[0]
                            );

        }
      
    }else{
       $data[] = array( "costcode"=>$mat,
                        "value"=>0,
                        "date"=> $arrdate[1]."-".$arrdate[0]
                      );

    }


    return $data;

  }

  public function get_aps_mat($aps_code,$mat,$date){
   
    $this->db->select('SUM(apsi_amount) as price');  
    $this->db->from('aps_detail');  
    $this->db->where('apsi_ref', $aps_code);  
    $this->db->where('apsi_costcode', $mat);
    $this->db->group_by('apsi_costcode');  
    $query = $this->db->get()->result();
    $data = array();

    $arrdate = explode("-",$date);

    if(count($query)>0){
        if(isset($query[0]->price)){ 
            $data[] = array(  "costcode"=>$mat,
                              "value"=>$query[0]->price,
                              "date"=> $arrdate[1]."-".$arrdate[0]
                            ); 
        }else{
            $data[] = array("costcode"=>$mat,
                            "value"=>0,
                            "date"=> $arrdate[1]."-".$arrdate[0]
                            );

        }
      
    }else{
       $data[] = array( "costcode"=>$mat,
                        "value"=>0,
                        "date"=> $arrdate[1]."-".$arrdate[0]
                      );

    }


    return $data;

  }

  public function get_aps_sub($aps_code,$mat,$date){
   
    $this->db->select('SUM(apsi_amount) as price');  
    $this->db->from('aps_detail');  
    $this->db->where('apsi_ref', $aps_code);  
    $this->db->where('apsi_costcode', $mat);
    $this->db->group_by('apsi_costcode');  
    $query = $this->db->get()->result();
    $data = array();

    $arrdate = explode("-",$date);

    if(count($query)>0){
        if(isset($query[0]->price)){ 
            $data[] = array(  "costcode"=>$mat,
                              "value"=>$query[0]->price,
                              "date"=> $arrdate[1]."-".$arrdate[0]
                            ); 
        }else{
            $data[] = array("costcode"=>$mat,
                            "value"=>0,
                            "date"=> $arrdate[1]."-".$arrdate[0]
                            );

        }
      
    }else{
       $data[] = array( "costcode"=>$mat,
                        "value"=>0,
                        "date"=> $arrdate[1]."-".$arrdate[0]
                      );

    }


    return $data;

  }

  public function get_apo_mat($apo_code,$mat,$date){
   
    $this->db->select('SUM(ex_amt) as price');  
    $this->db->from('ap_pettycash_expense');  
    $this->db->where('ex_ref', $apo_code);  
    $this->db->where('ex_costcode', $mat);
    $this->db->group_by('ex_costcode');  
    $query = $this->db->get()->result();
    $data = array();

    $arrdate = explode("-",$date);

    if(count($query)>0){
        if(isset($query[0]->price)){ 
            $data[] = array(  "costcode"=>$mat,
                              "value"=>$query[0]->price,
                              "date"=> $arrdate[1]."-".$arrdate[0]
                            ); 
        }else{
            $data[] = array("costcode"=>$mat,
                            "value"=>0,
                            "date"=> $arrdate[1]."-".$arrdate[0]
                            );

        }
      
    }else{
       $data[] = array( "costcode"=>$mat,
                        "value"=>0,
                        "date"=> $arrdate[1]."-".$arrdate[0]
                      );

    }


    return $data;

  }


  public function get_apo_sub($apo_code,$mat,$date){
   
    $this->db->select('SUM(ex_amt) as price');  
    $this->db->from('ap_pettycash_expense');  
    $this->db->where('ex_ref', $apo_code);  
    $this->db->where('ex_costcode', $mat);
    $this->db->group_by('ex_costcode');  
    $query = $this->db->get()->result();
    $data = array();

    $arrdate = explode("-",$date);

    if(count($query)>0){
        if(isset($query[0]->price)){ 
            $data[] = array(  "costcode"=>$mat,
                              "value"=>$query[0]->price,
                              "date"=> $arrdate[1]."-".$arrdate[0]
                            ); 
        }else{
            $data[] = array("costcode"=>$mat,
                            "value"=>0,
                            "date"=> $arrdate[1]."-".$arrdate[0]
                            );

        }
      
    }else{
       $data[] = array( "costcode"=>$mat,
                        "value"=>0,
                        "date"=> $arrdate[1]."-".$arrdate[0]
                      );

    }


    return $data;

  } 

  public function get_ap_c_mat($api_code,$mat,$date,$api_no,$type){

    if ($type == "apv") {

        $this->db->select('SUM(apvi_amount) as price');  
        $this->db->from('apv_detail');  
        $this->db->where('apvi_ref', $api_no);  
        $this->db->where('apvi_costcode', $mat);
        $this->db->group_by('apvi_costcode');  
        $query = $this->db->get()->result();
        $data = array();

        $arrdate = explode("-",$date);

        if(count($query)>0){
            if(isset($query[0]->price)){ 
                $data[] = array(  "costcode"=>$mat,
                                  "value"=>$query[0]->price,
                                  "date"=> $arrdate[1]."-".$arrdate[0]
                                ); 
            }else{
                $data[] = array("costcode"=>$mat,
                                "value"=>0,
                                "date"=> $arrdate[1]."-".$arrdate[0]
                                );

            }
          
        }else{
           $data[] = array( "costcode"=>$mat,
                            "value"=>0,
                            "date"=> $arrdate[1]."-".$arrdate[0]
                          );

        }

    }elseif ($type == "aps") {

          $this->db->select('SUM(apsi_amount) as price');  
          $this->db->from('aps_detail');  
          $this->db->where('apsi_ref', $api_no);  
          $this->db->where('apsi_costcode', $mat);
          $this->db->group_by('apsi_costcode');  
          $query = $this->db->get()->result();
          $data = array();

          $arrdate = explode("-",$date);

          if(count($query)>0){
              if(isset($query[0]->price)){ 
                  $data[] = array(  "costcode"=>$mat,
                                    "value"=>$query[0]->price,
                                    "date"=> $arrdate[1]."-".$arrdate[0]
                                  ); 
              }else{
                  $data[] = array("costcode"=>$mat,
                                  "value"=>0,
                                  "date"=> $arrdate[1]."-".$arrdate[0]
                                  );

              }
            
          }else{
             $data[] = array( "costcode"=>$mat,
                              "value"=>0,
                              "date"=> $arrdate[1]."-".$arrdate[0]
                            );

          }

    }else{
        
        $this->db->select('SUM(ex_amt) as price');  
        $this->db->from('ap_pettycash_expense');  
        $this->db->where('ex_ref', $api_no);  
        $this->db->where('ex_costcode', $mat);
        $this->db->group_by('ex_costcode');  
        $query = $this->db->get()->result();
        $data = array();

        $arrdate = explode("-",$date);

        if(count($query)>0){
            if(isset($query[0]->price)){ 
                $data[] = array(  "costcode"=>$mat,
                                  "value"=>$query[0]->price,
                                  "date"=> $arrdate[1]."-".$arrdate[0]
                                ); 
            }else{
                $data[] = array("costcode"=>$mat,
                                "value"=>0,
                                "date"=> $arrdate[1]."-".$arrdate[0]
                                );

            }
          
        }else{
           $data[] = array( "costcode"=>$mat,
                            "value"=>0,
                            "date"=> $arrdate[1]."-".$arrdate[0]
                          );

        }


    }

    return $data;

  }

  public function get_ap_c_sub($api_code,$mat,$date,$api_no,$type){

    if ($type == "apv") {

        $this->db->select('SUM(apvi_amount) as price');  
        $this->db->from('apv_detail');  
        $this->db->where('apvi_ref', $api_no);  
        $this->db->where('apvi_costcode', $mat);
        $this->db->group_by('apvi_costcode');  
        $query = $this->db->get()->result();
        $data = array();

        $arrdate = explode("-",$date);

        if(count($query)>0){
            if(isset($query[0]->price)){ 
                $data[] = array(  "costcode"=>$mat,
                                  "value"=>$query[0]->price,
                                  "date"=> $arrdate[1]."-".$arrdate[0]
                                ); 
            }else{
                $data[] = array("costcode"=>$mat,
                                "value"=>0,
                                "date"=> $arrdate[1]."-".$arrdate[0]
                                );

            }
          
        }else{
           $data[] = array( "costcode"=>$mat,
                            "value"=>0,
                            "date"=> $arrdate[1]."-".$arrdate[0]
                          );

        }

    }elseif ($type == "aps") {

          $this->db->select('SUM(apsi_amount) as price');  
          $this->db->from('aps_detail');  
          $this->db->where('apsi_ref', $api_no);  
          $this->db->where('apsi_costcode', $mat);
          $this->db->group_by('apsi_costcode');  
          $query = $this->db->get()->result();
          $data = array();

          $arrdate = explode("-",$date);

          if(count($query)>0){
              if(isset($query[0]->price)){ 
                  $data[] = array(  "costcode"=>$mat,
                                    "value"=>$query[0]->price,
                                    "date"=> $arrdate[1]."-".$arrdate[0]
                                  ); 
              }else{
                  $data[] = array("costcode"=>$mat,
                                  "value"=>0,
                                  "date"=> $arrdate[1]."-".$arrdate[0]
                                  );

              }
            
          }else{
             $data[] = array( "costcode"=>$mat,
                              "value"=>0,
                              "date"=> $arrdate[1]."-".$arrdate[0]
                            );

          }

    }else{
        
        $this->db->select('SUM(ex_amt) as price');  
        $this->db->from('ap_pettycash_expense');  
        $this->db->where('ex_ref', $api_no);  
        $this->db->where('ex_costcode', $mat);
        $this->db->group_by('ex_costcode');  
        $query = $this->db->get()->result();
        $data = array();

        $arrdate = explode("-",$date);

        if(count($query)>0){
            if(isset($query[0]->price)){ 
                $data[] = array(  "costcode"=>$mat,
                                  "value"=>$query[0]->price,
                                  "date"=> $arrdate[1]."-".$arrdate[0]
                                ); 
            }else{
                $data[] = array("costcode"=>$mat,
                                "value"=>0,
                                "date"=> $arrdate[1]."-".$arrdate[0]
                                );

            }
          
        }else{
           $data[] = array( "costcode"=>$mat,
                            "value"=>0,
                            "date"=> $arrdate[1]."-".$arrdate[0]
                          );

        }


    }

    return $data;

  }



  public function boq_cost_type1($bd){

    $this->db->select('sum(cost) as total_cost, sum(boq) as total_boq');
    $this->db->from('boq_cost');  
    $this->db->where('boq_code', $bd);
    $this->db->group_by('costcode'); 
    $query = $this->db->get()->result();
    return $query;

  }
  public function boq_cost_type2($bd){

    $this->db->select('sum(cost) as total_cost, sum(boq) as total_boq'); 
    $this->db->from('boq_cost');  
    $this->db->where('boq_code', $bd);
    $this->db->where('type', '2');
    $this->db->group_by('costcode');
    $query = $this->db->get();

    if ($query) {
      $res = $query->result();
    }else{
      $res = null;
    }
    return $res;

  } 

  public function get_boq($boq_code){
    $this->db->select('sum(cost) as total_cost');
    $this->db->from('boq_control');
    $this->db->where('boq_code', $boq_code);
    $this->db->group_by('costcode');
    $this->db->group_by('type');
    $query = $this->db->get();

    if ($query) {
      $res = $query->result();
    }else{
      $res = null;
    }

    return $res;
  }


  public function get_pu_cost_po($project_id,$cost_bytae,$compcode){

    $this->db->select('*');
    $this->db->where('po_project',$project_id);
    $this->db->where('poi_costcode',$cost_bytae);
    $this->db->where('po_item.compcode',$compcode);
    $this->db->join('po','po.po_pono = po_item.poi_ref');
    $po = $this->db->get('po_item')->result();
    return $po;

  }

  public function get_pu_cost_wo($project_id,$cost_bytae,$compcode){

      $this->db->select('*');
      $this->db->where('projectcode',$project_id);
      $this->db->where('lo_costcode',$cost_bytae);
      $this->db->where('lo_detail.compcode',$compcode);
      $this->db->join('lo','lo.lo_lono = lo_detail.lo_ref');
      $wo = $this->db->get('lo_detail')->result();
      return $wo;

  }

  public function get_pu_cost_pc($project_id,$cost_bytae,$compcode){

      $this->db->select('*');
      $this->db->where('project',$project_id);
      $this->db->where('pettycashi_costcode',$cost_bytae);
      $this->db->where('pettycash_item.compcode',$compcode);
      $this->db->join('pettycash','pettycash.docno = pettycash_item.pettycashi_ref');
      $pc = $this->db->get('pettycash_item')->result();
      return $pc;

  }

  public function get_material_cost_po($project_id,$cost_bytae,$compcode){

    $this->db->select('*');
    $this->db->where('po_project',$project_id);
    $this->db->where('poi_costcode',$cost_bytae);
    $this->db->where('po_item.compcode',$compcode);
    $this->db->where('po_item.type_cost',1);
    $this->db->join('po','po.po_pono = po_item.poi_ref');
    $po = $this->db->get('po_item')->result();
    return $po;

  }

  public function get_material_cost_wo($project_id,$cost_bytae,$compcode){

      $this->db->select('*');
      $this->db->where('projectcode',$project_id);
      $this->db->where('lo_costcode',$cost_bytae);
      $this->db->where('lo_detail.compcode',$compcode);
      $this->db->where('lo_detail.type_cost',1);
      $this->db->join('lo','lo.lo_lono = lo_detail.lo_ref');
      $wo = $this->db->get('lo_detail')->result();
      return $wo;

  }

  public function get_material_cost_pc($project_id,$cost_bytae,$compcode){

      $this->db->select('*');
      $this->db->where('project',$project_id);
      $this->db->where('pettycashi_costcode',$cost_bytae);
      $this->db->where('pettycash_item.compcode',$compcode);
      $this->db->where('pettycash_item.type_cost',1);
      $this->db->join('pettycash','pettycash.docno = pettycash_item.pettycashi_ref');
      $pc = $this->db->get('pettycash_item')->result();
      return $pc;

  }

  public function get_labor_cost_po($project_id,$cost_bytae,$compcode){

    $this->db->select('*');
    $this->db->where('po_project',$project_id);
    $this->db->where('poi_costcode',$cost_bytae);
    $this->db->where('po_item.compcode',$compcode);
    $this->db->where('po_item.type_cost',2);
    $this->db->join('po','po.po_pono = po_item.poi_ref');
    $po = $this->db->get('po_item')->result();
    return $po;

  }

  public function get_labor_cost_wo($project_id,$cost_bytae,$compcode){

      $this->db->select('*');
      $this->db->where('projectcode',$project_id);
      $this->db->where('lo_costcode',$cost_bytae);
      $this->db->where('lo_detail.compcode',$compcode);
      $this->db->where('lo_detail.type_cost',2);
      $this->db->join('lo','lo.lo_lono = lo_detail.lo_ref');
      $wo = $this->db->get('lo_detail')->result();
      return $wo;

  }

  public function get_labor_cost_pc($project_id,$cost_bytae,$compcode){

      $this->db->select('*');
      $this->db->where('project',$project_id);
      $this->db->where('pettycashi_costcode',$cost_bytae);
      $this->db->where('pettycash_item.compcode',$compcode);
      $this->db->where('pettycash_item.type_cost',2);
      $this->db->join('pettycash','pettycash.docno = pettycash_item.pettycashi_ref');
      $pc = $this->db->get('pettycash_item')->result();
      return $pc;

  }

  public function get_subcon_cost_po($project_id,$cost_bytae,$compcode){

    $this->db->select('*');
    $this->db->where('po_project',$project_id);
    $this->db->where('poi_costcode',$cost_bytae);
    $this->db->where('po_item.compcode',$compcode);
    $this->db->where('po_item.type_cost',3);
    $this->db->join('po','po.po_pono = po_item.poi_ref');
    $po = $this->db->get('po_item')->result();
    return $po;

  }

  public function get_subcon_cost_wo($project_id,$cost_bytae,$compcode){

      $this->db->select('*');
      $this->db->where('projectcode',$project_id);
      $this->db->where('lo_costcode',$cost_bytae);
      $this->db->where('lo_detail.compcode',$compcode);
      $this->db->where('lo_detail.type_cost',3);
      $this->db->join('lo','lo.lo_lono = lo_detail.lo_ref');
      $wo = $this->db->get('lo_detail')->result();
      return $wo;

  }

  public function get_subcon_cost_pc($project_id,$cost_bytae,$compcode){

      $this->db->select('*');
      $this->db->where('project',$project_id);
      $this->db->where('pettycashi_costcode',$cost_bytae);
      $this->db->where('pettycash_item.compcode',$compcode);
      $this->db->where('pettycash_item.type_cost',3);
      $this->db->join('pettycash','pettycash.docno = pettycash_item.pettycashi_ref');
      $pc = $this->db->get('pettycash_item')->result();
      return $pc;

  }

 public function sumpo_by_project($project_id,$compcode)
        {
          $this->db->select_sum('poi_amount');
          $this->db->join('po','po.po_pono = po_item.poi_ref');
          $this->db->where('po_project',$project_id);
          $this->db->where('po_item.compcode',$compcode);
          $po = $this->db->get('po_item')->result();
          foreach ($po as $key => $value) {
            $poi_amount = $value->poi_amount;
          }
          return $poi_amount;
        }
  public function sumpo_by_project_all($project_id,$compcode)
        {
          $this->db->select_sum('poi_amount');
          $this->db->join('po','po.po_pono = po_item.poi_ref');
          $this->db->join('project','project.project_id = po.po_project');
          $this->db->where('po_project',$project_id);
          $this->db->or_where('project.project_sub',$project_id);
          $this->db->where('po_item.compcode',$compcode);
          $po = $this->db->get('po_item')->result();
          foreach ($po as $key => $value) {
            $poi_amount = $value->poi_amount;
          }
          return $poi_amount;
        }
  public function sumpo_by_project_sub($projid,$compcode)
        {
          $where_p = "(`po_project` = '$projid' or `project`.`project_sub` = '$projid' ) and `project`.`project_sub`!='no'";
          $this->db->select_sum('poi_amount');
          $this->db->join('po','po.po_pono = po_item.poi_ref');
          $this->db->join('project','project.project_id = po.po_project');
          $this->db->where($where_p);
          $this->db->where('po_item.compcode',$compcode);
          $po = $this->db->get('po_item')->result();
          foreach ($po as $key => $value) {
            $poi_amount = $value->poi_amount;
          }
          return $poi_amount;
        }
   public function sumpo_po_receipt_by_project($project_id,$compcode)
        {
          $this->db->select_sum('poi_amount');
          $this->db->from('receive_po');
          $this->db->join('receive_poitem','receive_poitem.poi_ref = receive_po.po_reccode');
          $this->db->where('project',$project_id);
          $this->db->where('receive_po.compcode',$compcode);
          $res = $this->db->get()->result();
          foreach ($res as $key => $value) {
            $poi_amount = $value->poi_amount;
          }
          return  $poi_amount;
        }
   public function sumpo_po_receipt_by_project_sub($projid,$compcode)
        {
          $where_p = "(`receive_po`.`project` = '$projid' or `project`.`project_sub` = '$projid' ) and `project`.`project_sub`!='no'";
          $this->db->select_sum('poi_amount');
          $this->db->from('receive_po');
          $this->db->join('receive_poitem','receive_poitem.poi_ref = receive_po.po_reccode');
          $this->db->join('project','project.project_id = receive_po.project');
          $this->db->where($where_p);
          $this->db->where('receive_po.compcode',$compcode);
          $res = $this->db->get()->result();
          foreach ($res as $key => $value) {
            $poi_amount = $value->poi_amount;
          }
          return  $poi_amount;
        }
    public function sumpo_po_receipt_by_project_all($project_id,$compcode)
        {
          $this->db->select_sum('poi_amount');
          $this->db->from('receive_po');
          $this->db->join('receive_poitem','receive_poitem.poi_ref = receive_po.po_reccode');
          $this->db->join('project','project.project_id = receive_po.project');
          $this->db->where('project',$project_id);
          $this->db->or_where('project.project_sub',$project_id);
          $this->db->where('receive_po.compcode',$compcode);
          $res = $this->db->get()->result();
          foreach ($res as $key => $value) {
            $poi_amount = $value->poi_amount;
          }
          return  $poi_amount;
        }
  public function sumpo_actual_by_project($project_id,$compcode)
  {
    $this->db->select_sum('apv_netamt');
    $this->db->from('apv_header');
    $this->db->where('apv_project',$project_id);
    $this->db->where('apv_header.compcode',$compcode);
    $res = $this->db->get()->result();
    foreach ($res as $key => $value) {
      $apv_netamt = $value->apv_netamt;
    }
    return  $apv_netamt;
  }
  public function sumpo_actual_by_project_sub($projid,$compcode)
  {
    $where_p = "(`apv_header`.`apv_project` = '$projid' or `project`.`project_sub` = '$projid' ) and `project`.`project_sub`!='no'";
    $this->db->select_sum('apv_netamt');
    $this->db->from('apv_header');
    $this->db->join('project','project.project_id = apv_header.apv_project');
    $this->db->where($where_p);
    $this->db->where('apv_header.compcode',$compcode);
    $res = $this->db->get()->result();
    foreach ($res as $key => $value) {
      $apv_netamt = $value->apv_netamt;
    }
    return  $apv_netamt;
  }
  public function sumpo_actual_by_project_all($project_id,$compcode)
  {
    $this->db->select_sum('apv_netamt');
    $this->db->from('apv_header');
    $this->db->join('project','project.project_id = apv_header.apv_project');
    $this->db->where('apv_project',$project_id);
    $this->db->or_where('project.project_sub',$project_id);
    $this->db->where('apv_header.compcode',$compcode);
    $res = $this->db->get()->result();
    foreach ($res as $key => $value) {
      $apv_netamt = $value->apv_netamt;
    }
    return  $apv_netamt;
  }
  public function countprbyproj($projid,$compcode)
        {
          $this->db->select('*');
          $this->db->where('pr_project',$projid);
          $this->db->where('compcode',$compcode);
          $query = $this->db->get('pr');
          $res = $query->num_rows();
          return $res;
        }
  public function countprbyproj_sub($projid,$compcode)
        {
          $where_p = "(`pr`.`pr_project` = '$projid' or `project`.`project_sub` = '$projid' ) and `project`.`project_sub`!='no'";
          $this->db->select('*');
          $this->db->join('project','project.project_id = pr.pr_project');
          $this->db->where($where_p);
          $this->db->where('pr.compcode',$compcode);
          $query = $this->db->get('pr');
          $res = $query->num_rows();
          return $res;
        }
  public function countprbyproj_all($projid,$compcode)
        {
          $this->db->select('*');
          $this->db->join('project','project.project_id = pr.pr_project');
          $this->db->where('pr_project',$projid);
          $this->db->or_where('project.project_sub',$projid);
          $this->db->where('pr.compcode',$compcode);
          $query = $this->db->get('pr');
          $res = $query->num_rows();
          return $res;
        }
public function countprpendingbyproj($projid,$compcode)
        {
          $this->db->select('*');
          $this->db->where('pr_project',$projid);
          $this->db->where('pr_approve','wait');
          $this->db->where('compcode',$compcode);
          $query = $this->db->get('pr');
          $res = $query->num_rows();
          return $res;
        }
public function countprpendingbyproj_sub($projid,$compcode)
        {
          $where_p = "(`pr`.`pr_project` = '$projid' or `project`.`project_sub` = '$projid' ) and `project`.`project_sub`!='no'";
          $this->db->select('*');
          $this->db->join('project','project.project_id = pr.pr_project');
          $this->db->where($where_p);
          $this->db->where('pr_approve','wait');
          $this->db->where('pr.compcode',$compcode);
          $query = $this->db->get('pr');
          $res = $query->num_rows();
          return $res;
        }
        public function countprpendingbyproj_all($projid,$compcode)
        {
          $where_p = "(`pr_project` = '$projid' or `project`.`project_sub` = '$projid' )";
          $this->db->select('*');
          $this->db->join('project','project.project_id = pr.pr_project');
          $this->db->where($where_p);
          $this->db->where('pr_approve','wait');
          $this->db->where('pr.compcode',$compcode);
          $query = $this->db->get('pr');
          $res = $query->num_rows();
          return $res;
        }
        public function countprapprovebyproj($projid,$compcode)
        {
          $this->db->select('*');
          $this->db->where('pr_project',$projid);
          $this->db->where('pr_approve','approve');
          $this->db->where('compcode',$compcode);
          $query = $this->db->get('pr');
          $res = $query->num_rows();
          return $res;
        }
        public function countprapprovebyproj_sub($projid,$compcode)
        {
          $where_p = "(`pr`.`pr_project` = '$projid' or `project`.`project_sub` = '$projid' ) and `project`.`project_sub`!='no'";
          $this->db->select('*');
          $this->db->join('project','project.project_id = pr.pr_project');
          $this->db->where($where_p);
          $this->db->where('pr_approve','approve');
          $this->db->where('pr.compcode',$compcode);
          $query = $this->db->get('pr');
          $res = $query->num_rows();
          return $res;
        }
        public function countprapprovebyproj_all($projid,$compcode)
        {
          $where_p = "(`pr_project` = '$projid' or `project`.`project_sub` = '$projid' )";
          $this->db->select('*');
          $this->db->join('project','project.project_id = pr.pr_project');
          $this->db->where($where_p);
          $this->db->where('pr_approve','approve');
          $this->db->where('pr.compcode',$compcode);
          $query = $this->db->get('pr');
          $res = $query->num_rows();
          return $res;
        }
        public function countpobyproj($projid,$compcode)
        {
          $this->db->select('*');
          $this->db->where('po_project',$projid);
          $this->db->where('compcode',$compcode);
          $query = $this->db->get('po');
          $res = $query->num_rows();
          return $res;
        }
        public function countpobyproj_sub($projid,$compcode)
        {
          $where_p = "(`po`.`po_project` = '$projid' or `project`.`project_sub` = '$projid' ) and `project`.`project_sub`!='no'";
          $this->db->select('*');
          $this->db->join('project','project.project_id = po.po_project');
          $this->db->where($where_p);
          $this->db->where('po.compcode',$compcode);
          $query = $this->db->get('po');
          $res = $query->num_rows();
          return $res;
        }
        public function countpobyproj_all($projid,$compcode)
        {
          $where_p = "(`po_project` = '$projid' or `project`.`project_sub` = '$projid' )";
          $this->db->select('*');
          $this->db->join('project','project.project_id = po.po_project');
          $this->db->where($where_p);
          $this->db->where('po.compcode',$compcode);
          $query = $this->db->get('po');
          $res = $query->num_rows();
          return $res;
        }
         public function countporeceiptbyproj($projid,$compcode)
        {
          $this->db->select('*');
          $this->db->where('po_project',$projid);
          $this->db->where('apv_open','open');
          $this->db->where('compcode',$compcode);
          $query = $this->db->get('po');
          $res = $query->num_rows();
          return $res;
        }
         public function countporeceiptbyproj_sub($projid,$compcode)
        {
          $where_p = "(`po`.`po_project` = '$projid' or `project`.`project_sub` = '$projid' ) and `project`.`project_sub`!='no'";
          $this->db->select('po_id');
          $this->db->join('project','project.project_id = po.po_project');
          $this->db->where($where_p);
          $this->db->where('apv_open','open');
          $this->db->where('po.compcode',$compcode);
          $query = $this->db->get('po');
          $res = $query->num_rows();
          return $res;
        }
         public function countporeceiptbyproj_all($projid,$compcode)
        {
          $where_p = "(`po_project` = '$projid' or `project`.`project_sub` = '$projid' )";
          $this->db->select('po_id');
          $this->db->join('project','project.project_id = po.po_project');
          $this->db->where($where_p);
          $this->db->where('apv_open','open');
          $this->db->where('po.compcode',$compcode);
          $query = $this->db->get('po');
          $res = $query->num_rows();
          return $res;
        }
         public function countexpensebyproj($projid,$compcode)
        {
          $this->db->select_sum('pettycashi_unitprice');
          $this->db->from('pettycash');
          $this->db->join('pettycash_item','pettycash_item.pettycashi_ref = pettycash.docno');
          $this->db->where('project',$projid);
          $this->db->where('pettycash.compcode',$compcode);
          $res = $this->db->get()->result();
          foreach ($res as $key => $value) {
            $pettycashi_amounttot = $value->pettycashi_unitprice;
          }
          return  $pettycashi_amounttot;
        }
         public function countexpensebyproj_sub($projid,$compcode)
        {
          $where_p = "(`pettycash`.`project` = '$projid' or `project`.`project_sub` = '$projid' ) and `project`.`project_sub`!='no'";
          $this->db->select_sum('pettycashi_unitprice');
          $this->db->from('pettycash');
          $this->db->join('pettycash_item','pettycash_item.pettycashi_ref = pettycash.docno');
          $this->db->join('project','project.project_id = pettycash.project');
          $this->db->where($where_p);
          $this->db->where('pettycash.compcode',$compcode);
          $res = $this->db->get()->result();
          foreach ($res as $key => $value) {
            $pettycashi_amounttot = $value->pettycashi_unitprice;
          }
          return  $pettycashi_amounttot;
        }
         public function countexpensebyproj_all($projid,$compcode)
        {
          $where_p = "(`project` = '$projid' or `project`.`project_sub` = '$projid' ) and pettycash_item.pettycashi_project = '$projid' AND `pettycash`.`compcode` = '$compcode' and pettycash_item.compcode = '$compcode' ";
          $this->db->select_sum('pettycashi_unitprice');
          $this->db->from('pettycash');
          $this->db->join('pettycash_item','pettycash_item.pettycashi_ref = pettycash.docno');
          $this->db->join('project','project.project_id = pettycash.project');
          $this->db->where($where_p);
          $this->db->where('pettycash.compcode',$compcode);
          $res = $this->db->get()->result();
          foreach ($res as $key => $value) {
            $pettycashi_amounttot = $value->pettycashi_unitprice;
          }
          return  $pettycashi_amounttot;
        }
         public function lll($projid,$compcode)
        {
          $this->db->select('pettycash_item.pettycashi_unitprice,ap_expensother.expens_name,ap_expensother.expens_code');
          $this->db->from('pettycash');
          $this->db->join('pettycash_item','pettycash_item.pettycashi_ref = pettycash.docno');
          $this->db->join('ap_expensother',' pettycash_item.pettycashi_expenscode = ap_expensother.expens_code');
          $this->db->where('project',$projid);
          $this->db->where('pettycash.compcode',$compcode);
          $this->db->order_by('pettycash_item.pettycashi_unitprice','desc');
          $res = $this->db->get()->result();
          return  $res;
        }
         public function lll_sub($projid,$compcode)
        {
          $where_p = "(`pettycash`.`project` = '$projid' or `project`.`project_sub` = '$projid' ) and `project`.`project_sub`!='no'";
          $this->db->select('pettycash_item.pettycashi_unitprice,ap_expensother.expens_name,ap_expensother.expens_code');
          $this->db->from('pettycash');
          $this->db->join('pettycash_item','pettycash_item.pettycashi_ref = pettycash.docno');
          $this->db->join('ap_expensother',' pettycash_item.pettycashi_expenscode = ap_expensother.expens_code');
          $this->db->join('project','project.project_id = pettycash.project');
          $this->db->where($where_p);
          $this->db->where('pettycash.compcode',$compcode);
          $this->db->order_by('pettycash_item.pettycashi_unitprice','desc');
          $res = $this->db->get()->result();
          return  $res;
        }
         public function lll_all($projid,$compcode)
        {
          $a = 2;
          $where_p = "(`project` = '$projid' and pettycashi_project = '$projid' ) ";
          $this->db->select('sum(`pettycash_item`.`pettycashi_unitprice`) as pettycashi_unitprice,ap_expensother.expens_name,ap_expensother.expens_code,ap_expensother.ac_code as ac_code,');
          $this->db->from('pettycash');
          $this->db->join('pettycash_item','pettycash_item.pettycashi_ref = pettycash.docno');
          $this->db->join('ap_expensother',' pettycash_item.pettycashi_expenscode = ap_expensother.expens_code');
          $this->db->join('project','project.project_id = pettycash.project');
          $this->db->where($where_p);
          $this->db->where('pettycash.compcode',$compcode);
          $this->db->where('project.compcode',$compcode);
          $this->db->order_by('pettycash_item.pettycashi_unitprice','desc');
          $res = $this->db->get()->result();
          return  $res;
        }
        public function count_lo_open($projid,$compcode)
        {
          $this->db->select_sum('contactamount');
          $this->db->where('projectcode',$projid);
          $this->db->where('compcode',$compcode);
          $res = $this->db->get('lo')->result();
          foreach ($res as $key => $value) {
            $contactamount = $value->contactamount;
          }
          return  $contactamount;
        }
        public function count_lo_open_sub($projid,$compcode)
        {
          $where_p = "(`lo`.`projectcode` = '$projid' or `project`.`project_sub` = '$projid' ) and `project`.`project_sub`!='no'";
          $this->db->select_sum('contactamount');
          $this->db->join('project','project.project_id = lo.projectcode');
          $this->db->where($where_p);
          $this->db->where('lo.compcode',$compcode);
          $res = $this->db->get('lo')->result();
          foreach ($res as $key => $value) {
            $contactamount = $value->contactamount;
          }
          return  $contactamount;
        }
        public function count_lo_open_all($projid,$compcode)
        {
          $where_p = "(`projectcode` = '$projid' or `project`.`project_sub` = '$projid' )";
          $this->db->select_sum('contactamount');
          $this->db->join('project','project.project_id = lo.projectcode');
          $this->db->where($where_p);
          $this->db->where('lo.compcode',$compcode);
          $res = $this->db->get('lo')->result();
          foreach ($res as $key => $value) {
            $contactamount = $value->contactamount;
          }
          return  $contactamount;
        }
        public function count_lo_open_chart($projid,$compcode)
        {
          $res = $this->db->query("select sum(lo.contactamount) as contactamount,system.systemname,lo.system from lo left outer join system on lo.system = system.systemcode where lo.projectcode = '$projid' and lo.compcode= '$compcode' group by lo.system")->result();
          // $this->db->select('sum(lo.contactamount) as contactamount');
          // $this->db->select('system.systemname,lo.system');
          // $this->db->join('sysyem','lo.system = system.systemcode');
          // $this->db->where('lo.projectcode',$projid);
          // $this->db->where('lo.compcode',$compcode);
          // $this->db->group_by('lo.system');
          // $res = $this->db->get('lo')->result();
          
          
          $result = $this->db->query("select sum(aps_header.aps_amount) as aps_amount,system.systemname,aps_header.aps_system from aps_header left outer join system on aps_header.aps_system = system.systemcode where aps_header.aps_project = '$projid' and aps_header.compcode= '$compcode' group by aps_header.aps_system")->result();

              foreach ($res as $key => $value) {
                $data[] = array(
                 'contactamount' => $value->contactamount,
                  'systemname' => $value->systemname,
                  'system' => $value->system
                );
              }
              foreach ($result as $key => $val) {
                $data[] = array(
                  'aps_amount' => $val->aps_amount,
                  'systemnameap' => $val->systemname,
                   'systemap' => $val->aps_system
                );
              }

          

           return $data;
        }
        public function count_lo_open_chart_sub($projid,$compcode)
        {
          // $res = $this->db->query("select sum(lo.contactamount) as contactamount,system.systemname,lo.system from lo left outer join system on lo.system = system.systemcode where lo.projectcode = '$projid' and lo.compcode= '$compcode' group by lo.system")->result();
          $where_p = "(`lo`.`projectcode` = '$projid' or `project`.`project_sub` = '$projid' ) and `project`.`project_sub`!='no'";
          $this->db->select('sum(lo.contactamount) as contactamount');
          $this->db->select('system.systemname,lo.system');
          $this->db->join('system','system.systemcode = lo.system','Left OUTER');
          $this->db->join('project','project.project_id = lo.projectcode','Left OUTER');
          $this->db->where($where_p);
          $this->db->where('lo.compcode',$compcode);
          $this->db->group_by('lo.system');
          $res = $this->db->get('lo')->result();
          
          
          // $result = $this->db->query("select sum(aps_header.aps_amount) as aps_amount,system.systemname,aps_header.aps_system from aps_header left outer join system on aps_header.aps_system = system.systemcode where aps_header.aps_project = '$projid' and aps_header.compcode= '$compcode' group by aps_header.aps_system")->result();
          $where_apsp = "(`aps_header`.`aps_project` = '$projid' or `project`.`project_sub` = '$projid' ) and `project`.`project_sub`!='no'";
          $this->db->select('sum(aps_header.aps_amount) as aps_amount');
          $this->db->select('system.systemname,aps_header.aps_system');
          $this->db->join('system','system.systemcode = aps_header.aps_system','Left OUTER');
          $this->db->join('project','project.project_id = aps_header.aps_project','Left OUTER');
          $this->db->where($where_apsp);
          $this->db->where('aps_header.compcode',$compcode);
          $this->db->group_by('aps_header.aps_system');
          $result = $this->db->get('aps_header')->result();

              foreach ($res as $key => $value) {
                $data[] = array(
                 'contactamount' => $value->contactamount,
                  'systemname' => $value->systemname,
                  'system' => $value->system
                );
              }
              foreach ($result as $key => $val) {
                $data[] = array(
                  'aps_amount' => $val->aps_amount,
                  'systemnameap' => $val->systemname,
                   'systemap' => $val->aps_system
                );
              }

          

           return $data;
        }
        public function count_lo_open_chart_all($projid,$compcode)
        {
          // $res = $this->db->query("select sum(lo.contactamount) as contactamount,system.systemname,lo.system from lo left outer join system on lo.system = system.systemcode where lo.projectcode = '$projid' and lo.compcode= '$compcode' group by lo.system")->result();
          $where_p = "(`projectcode` = '$projid' )";
          $this->db->select('sum(lo.contactamount) as contactamount');
          $this->db->select('system.systemname,lo.system');
          $this->db->join('system','system.systemcode = lo.system','Left OUTER');
          $this->db->join('project','project.project_id = lo.projectcode','Left OUTER');
          $this->db->where($where_p);
          $this->db->where('lo.compcode',$compcode);
          $this->db->where('system.compcode',$compcode);
          $this->db->where('project.compcode',$compcode);
          $this->db->group_by('lo.system');
          $res = $this->db->get('lo')->result();
          
          
          // $result = $this->db->query("select sum(aps_header.aps_amount) as aps_amount,system.systemname,aps_header.aps_system from aps_header left outer join system on aps_header.aps_system = system.systemcode where aps_header.aps_project = '$projid' and aps_header.compcode= '$compcode' group by aps_header.aps_system")->result();
          $where_aps = "(`aps_project` = '$projid' or `project`.`project_sub` = '$projid' )";
          $this->db->select('sum(aps_header.aps_amount) as aps_amount');
          $this->db->select('system.systemname,aps_header.aps_system');
          $this->db->join('system','system.systemcode = aps_header.aps_system','Left OUTER');
          $this->db->join('project','project.project_id = aps_header.aps_project','Left OUTER');
          $this->db->where($where_aps);
          $this->db->where('aps_header.compcode',$compcode);
          $this->db->group_by('aps_header.aps_system');
          $result = $this->db->get('aps_header')->result();

              foreach ($res as $key => $value) {
                $data[] = array(
                 'contactamount' => $value->contactamount,
                  'systemname' => $value->systemname,
                  'system' => $value->system
                );
              }
              foreach ($result as $key => $val) {
                $data[] = array(
                  'aps_amount' => $val->aps_amount,
                  'systemnameap' => $val->systemname,
                   'systemap' => $val->aps_system
                );
              }

          

           return $data;
        }
        public function chart_sclovecontact($projid,$compcode)
        {
          $this->db->select("id,project_id,month_year,price,budget,compcode,forctype,status");
          $this->db->where('forctype','main');
          $this->db->where('status','active');
          $this->db->where('project_id',$projid);
          $this->db->where('compcode',$compcode);
          $this->db->order_by('month_year','asc');
          $forccont = $this->db->get('pm_forcash')->result();

          
          return $forccont;
        }
        public function chart_sclovecontact_sub($projid,$compcode)
        {
          $where_p = "(`pm_forcash`.`project_id` = '$projid' or `project`.`project_sub` = '$projid' ) and `pm_forcash`.`forctype`='sub'";
          $this->db->select("id,pm_forcash.project_id,month_year,price,budget,pm_forcash.compcode,forctype,status");
          $this->db->join('project','project.project_id = pm_forcash.project_id');
          $this->db->where($where_p);
          $this->db->where('pm_forcash.status','active');
          $this->db->where('pm_forcash.compcode',$compcode);
          $this->db->order_by('month_year','asc');
          $forccont = $this->db->get('pm_forcash')->result();

          
          return $forccont;
        }
        public function chart_sclovecontact_all($projid,$compcode)
        {
          $where_aps = "(`pm_forcash`.`project_id` = '$projid' or `project`.`project_sub` = '$projid' )";
          $this->db->select("id,pm_forcash.project_id,month_year,price,budget,pm_forcash.compcode,forctype,status");
          $this->db->join('project','project.project_id = pm_forcash.project_id','Left OUTER');
          $this->db->where($where_aps);
          $this->db->where('pm_forcash.status','active');
          $this->db->where('pm_forcash.compcode',$compcode);
          $this->db->order_by('month_year','asc');
          $forccont = $this->db->get('pm_forcash')->result();

          
          return $forccont;
        }
        public function chart_sclovebudget($projid,$compcode)
        {
          $this->db->select("id,project_id,month_year,price,compcode,forctype,status");
          $this->db->where('status','active');
          $this->db->where('forctype','budget');
          $this->db->where('project_id',$projid);
          $this->db->where('compcode',$compcode);
          $forccont = $this->db->get('pm_forcash')->result();

          
          return $forccont;
        }
        public function count_aps_payment($projid,$compcode)
        {
          $this->db->select_sum('aps_amount');
          $this->db->from('aps_header');
          $this->db->join('aps_detail','aps_header.aps_code = aps_detail.apsi_ref','left outer');
          $this->db->where('aps_project',$projid);
          $this->db->where('aps_header.compcode',$compcode);
          $res = $this->db->get()->result();
          foreach ($res as $key => $value) {
            $aps_amount = $value->aps_amount;
          }
          return  $aps_amount;
        }
        public function count_aps_payment_sub($projid,$compcode)
        {
          $where_p = "(`aps_header`.`aps_project` = '$projid' or `project`.`project_sub` = '$projid' ) and `project`.`project_sub`!='no'";
          $this->db->select_sum('aps_amount');
          $this->db->from('aps_header');
          $this->db->join('aps_detail','aps_header.aps_code = aps_detail.apsi_ref','left outer');
          $this->db->join('project','project.project_id = aps_header.aps_project');
          $this->db->where($where_p);
          $this->db->where('aps_header.compcode',$compcode);
          $res = $this->db->get()->result();
          foreach ($res as $key => $value) {
            $aps_amount = $value->aps_amount;
          }
          return  $aps_amount;
        }
        public function count_aps_payment_all($projid,$compcode)
        {
          $where_p = "(`aps_project` = '$projid' or `project`.`project_sub` = '$projid' )";
          $this->db->select_sum('aps_amount');
          $this->db->from('aps_header');
          $this->db->join('aps_detail','aps_header.aps_code = aps_detail.apsi_ref','left outer');
          $this->db->join('project','project.project_id = aps_header.aps_project');
          $this->db->where($where_p);
          $this->db->where('aps_header.compcode',$compcode);
          $res = $this->db->get()->result();
          foreach ($res as $key => $value) {
            $aps_amount = $value->aps_amount;
          }
          return  $aps_amount;
        }

        public function contactforcash($projid,$compcode)
        {
          $this->db->select('id,project_id,month_year,price,budget,compcode,forctype,status');
          $this->db->where('forctype','main');
          $this->db->where('status','active');
          $this->db->where('project_id',$projid);
          $this->db->where('compcode',$compcode);
          $this->db->order_by('month_year','asc');
          $res = $this->db->get('pm_forcash')->result();
          return $res;
        }
        public function contactforcashsub($projid,$compcode)
        {
          $where_p = "(`pm_forcash`.`project_id` = '$projid' or `project`.`project_sub` = '$projid' ) and `pm_forcash`.`forctype`='sub'";
          $this->db->select('id,pm_forcash.project_id,month_year,price,budget,pm_forcash.compcode,forctype,status');
          $this->db->where('status','active');
          $this->db->join('project','project.project_id = pm_forcash.project_id');
          $this->db->where($where_p);
          $this->db->where('pm_forcash.compcode',$compcode);
          $this->db->order_by('month_year','asc');
          $res = $this->db->get('pm_forcash')->result();
          return $res;
        }
         public function budgetforcash($projid,$compcode)
        {
          $this->db->select('id,project_id,month_year,price,compcode,forctype,status');
          $this->db->where('status','active');
          $this->db->where('forctype','budget');
          $this->db->where('project_id',$projid);
          $this->db->where('compcode',$compcode);
          $this->db->order_by('month_year','asc');
          $res = $this->db->get('pm_forcash')->result();
          return $res;
        }

        public function sclove_purchase_cost($projid,$compcode)
        {

          $this->db->select('po.po_podate,po_item.poi_amount');
          $this->db->from('po_item');
          $this->db->join('po','po.po_pono = po_item.poi_ref');
          $this->db->where('po_project',$projid);
          $this->db->where('po_item.compcode',$compcode);
          $this->db->order_by('po.po_podate','asc');
          $po = $this->db->get()->result();
          return $po;
        }
        public function sclove_purchase_cost_sub($projid,$compcode)
        {
          $where_p = "(`po`.`po_project` = '$projid' or `project`.`project_sub` = '$projid' ) and `project`.`project_sub`!='no'";
          $this->db->select('po.po_podate,po_item.poi_amount');
          $this->db->from('po_item');
          $this->db->join('po','po.po_pono = po_item.poi_ref');
          $this->db->join('project','project.project_id = po.po_project');
          $this->db->where($where_p);
          $this->db->where('po_item.compcode',$compcode);
          $this->db->order_by('po.po_podate','asc');
          $po = $this->db->get()->result();
          return $po;
        }
        public function sclove_purchase_cost_all($projid,$compcode)
        {
          $where_p = "(`po_project` = '$projid')";
          $this->db->select('po.po_podate,po_item.poi_amount');
          $this->db->from('po_item');
          $this->db->join('po','po.po_pono = po_item.poi_ref');
          $this->db->join('project','project.project_id = po.po_project');
          $this->db->where($where_p);
          $this->db->where('po_item.compcode',$compcode);
          $this->db->order_by('po.po_podate','asc');
          $po = $this->db->get()->result();
          return $po;
        }
        public function sclove_work_order_cost_all($projid,$compcode)
        {
          $where_p = "(`projectcode` = '$projid')";
          $this->db->select('lodate,contactamount');
          $this->db->from('lo');
          $this->db->join('project','project.project_id = lo.projectcode');
          $this->db->where($where_p);
          $this->db->where('lo.compcode',$compcode);
          $this->db->order_by('lodate','asc');
          $po = $this->db->get()->result();
          return $po;
        }

        // public function sclove_invoice($projid,$compcode)
        // {

        //   $this->db->select('ar_invprogress_header.inv_date,ar_invprogress_detail.inv_progressamt as amount');
        //   $this->db->from('ar_invprogress_detail');
        //   $this->db->join('ar_invprogress_header','ar_invprogress_detail.inv_ref = ar_invprogress_header.inv_no');
        //   $this->db->where('ar_invprogress_header.inv_project',$projid);
        //   $this->db->where('ar_invprogress_header.compcode',$compcode);
        //   $this->db->order_by('ar_invprogress_header.inv_date','asc');
        //   $po = $this->db->get()->result();
        //   return $po;
        // }

        public function sclove_invoice($projid,$compcode)
        {

          $this->db->select('ar_account_header.acc_invdate as date,ar_account_header.acc_cusamt as amount');
          $this->db->from('ar_account_header');
          $this->db->where('ar_account_header.acc_invtype','progress');
          $this->db->where('ar_account_header.acc_project',$projid);
          $this->db->where('ar_account_header.compcode',$compcode);
          $this->db->order_by('ar_account_header.acc_invdate','asc');
          $po = $this->db->get()->result();
          return $po;
        }
        public function sclove_invoice_all($projid,$compcode)
        {
          $where_p = "(`ar_account_header`.`acc_project` = '$projid')";
          $this->db->select('ar_account_header.acc_invdate as date,ar_account_header.acc_cusamt as amount');
          $this->db->from('ar_account_header');
          $this->db->join('project','project.project_id = ar_account_header.acc_project');
          $this->db->where($where_p);
          $this->db->where('ar_account_header.acc_invtype','progress');
          $this->db->where('ar_account_header.compcode',$compcode);
          $this->db->order_by('ar_account_header.acc_invdate','asc');
          $po = $this->db->get()->result();
          return $po;
        }
        public function sclove_invoice_sub($projid,$compcode)
        {
          $where_p = "(`ar_account_header`.`acc_project` = '$projid' or `project`.`project_sub` = '$projid' ) and `project`.`project_sub`!='no'";
          $this->db->select('ar_account_header.acc_invdate as date,ar_account_header.acc_cusamt as amount');
          $this->db->from('ar_account_header');
          $this->db->join('project','project.project_id = ar_account_header.acc_project');
          $this->db->where($where_p);
          $this->db->where('ar_account_header.acc_invtype','progress');
          $this->db->where('ar_account_header.compcode',$compcode);
          $this->db->order_by('ar_account_header.acc_invdate','asc');
          $po = $this->db->get()->result();
          return $po;
        }
        public function sclove_actualapv($projid,$compcode)
        {
          $this->db->select('apv_header.apv_date,apv_detail.apvi_amount');
          $this->db->from('apv_header');
          $this->db->join('apv_detail','apv_header.apv_code = apv_detail.apvi_ref');
          $this->db->where('apv_header.apv_project',$projid);
          $this->db->where('apv_header.compcode',$compcode);
          $this->db->order_by('apv_header.apv_date','asc');
          $ap = $this->db->get()->result();
          return $ap;
        }
        public function sclove_actualapv_sub($projid,$compcode)
        {
          $where_p = "(`apv_header`.`apv_project` = '$projid' or `project`.`project_sub` = '$projid' ) and `project`.`project_sub`!='no'";
          $this->db->select('apv_header.apv_date,apv_detail.apvi_amount');
          $this->db->from('apv_header');
          $this->db->join('apv_detail','apv_header.apv_code = apv_detail.apvi_ref');
          $this->db->join('project','project.project_id = apv_header.apv_project');
          $this->db->where($where_p);
          $this->db->where('apv_header.compcode',$compcode);
          $this->db->order_by('apv_header.apv_date','asc');
          $ap = $this->db->get()->result();
          return $ap;
        }
        public function sclove_actualapv_all($projid,$compcode)
        {
          $where_p = "(`apv_header`.`apv_project` = '$projid' or `project`.`project_sub` = '$projid' )";
          $this->db->select('apv_header.apv_date,apv_detail.apvi_amount');
          $this->db->from('apv_header');
          $this->db->join('apv_detail','apv_header.apv_code = apv_detail.apvi_ref');
          $this->db->join('project','project.project_id = apv_header.apv_project');
          $this->db->where($where_p);
          $this->db->where('apv_header.compcode',$compcode);
          $this->db->order_by('apv_header.apv_date','asc');
          $ap = $this->db->get()->result();
          return $ap;
        }
        public function sclove_actualaps($projid,$compcode)
        {
          $this->db->select('aps_header.ap_date,aps_detail.apsi_amount');
          $this->db->from('aps_header');
          $this->db->join('aps_detail','aps_header.aps_code = aps_detail.apsi_ref');
          $this->db->where('aps_header.aps_project',$projid);
          $this->db->where('aps_header.compcode',$compcode);
          $this->db->order_by('aps_header.ap_date','asc');
          $ap = $this->db->get()->result();
          return $ap;
        }
        public function sclove_actualaps_sub($projid,$compcode)
        {
          $where_p = "(`aps_header`.`aps_project` = '$projid' or `project`.`project_sub` = '$projid' ) and `project`.`project_sub`!='no'";
          $this->db->select('aps_header.ap_date,aps_detail.apsi_amount');
          $this->db->from('aps_header');
          $this->db->join('aps_detail','aps_header.aps_code = aps_detail.apsi_ref');
          $this->db->join('project','project.project_id = aps_header.aps_project');
          $this->db->where($where_p);
          $this->db->where('aps_header.compcode',$compcode);
          $this->db->order_by('aps_header.ap_date','asc');
          $ap = $this->db->get()->result();
          return $ap;
        }
        public function sclove_actualaps_all($projid,$compcode)
        {
          $where_p = "(`aps_header`.`aps_project` = '$projid' or `project`.`project_sub` = '$projid' )";
          $this->db->select('aps_header.ap_date,aps_detail.apsi_amount');
          $this->db->from('aps_header');
          $this->db->join('aps_detail','aps_header.aps_code = aps_detail.apsi_ref');
          $this->db->join('project','project.project_id = aps_header.aps_project');
          $this->db->where($where_p);
          $this->db->where('aps_header.compcode',$compcode);
          $this->db->order_by('aps_header.ap_date','asc');
          $ap = $this->db->get()->result();
          return $ap;
        }

        public function sclove_actualapo($projid,$compcode)
        {
          $this->db->select('ap_pettycash_header.doc_date,ap_pettycash_expense.ex_amt');
          $this->db->from('ap_pettycash_header');
          $this->db->join('ap_pettycash_expense','ap_pettycash_header.ap_no = ap_pettycash_expense.ex_ref');
          $this->db->where('ap_pettycash_header.ap_project',$projid);
          $this->db->where('ap_pettycash_header.compcode',$compcode);
          $this->db->order_by('ap_pettycash_header.doc_date','asc');
          $ap = $this->db->get()->result();
          return $ap;
        }
        public function sclove_actualapo_sub($projid,$compcode)
        {
          $where_p = "(`ap_pettycash_header`.`ap_project` = '$projid' or `project`.`project_sub` = '$projid' ) and `project`.`project_sub`!='no'";
          $this->db->select('ap_pettycash_header.doc_date,ap_pettycash_expense.ex_amt');
          $this->db->from('ap_pettycash_header');
          $this->db->join('ap_pettycash_expense','ap_pettycash_header.ap_no = ap_pettycash_expense.ex_ref');
          $this->db->join('project','project.project_id = ap_pettycash_header.ap_project');
          $this->db->where($where_p);
          $this->db->where('ap_pettycash_header.compcode',$compcode);
          $this->db->order_by('ap_pettycash_header.doc_date','asc');
          $ap = $this->db->get()->result();
          return $ap;
        }
        public function sclove_actualapo_all($projid,$compcode)
        {
          $where_p = "(`ap_pettycash_header`.`ap_project` = '$projid' or `project`.`project_sub` = '$projid' )";
          $this->db->select('ap_pettycash_header.doc_date,ap_pettycash_expense.ex_amt');
          $this->db->from('ap_pettycash_header');
          $this->db->join('ap_pettycash_expense','ap_pettycash_header.ap_no = ap_pettycash_expense.ex_ref');
          $this->db->join('project','project.project_id = ap_pettycash_header.ap_project');
          $this->db->where($where_p);
          $this->db->where('ap_pettycash_header.compcode',$compcode);
          $this->db->order_by('ap_pettycash_header.doc_date','asc');
          $ap = $this->db->get()->result();
          return $ap;
        }
        public function sclove_income($projid,$compcode)
        {
          $this->db->select('cl_billdate,cl_invamt');
          $this->db->where('cl_project',$projid);
          $this->db->where('compcode',$compcode);
          $this->db->order_by('cl_billdate','asc');
         return $this->db->get('ar_clear_header')->result();
        }
        public function sclove_income_all($projid,$compcode)
        {
          $where_p = "(`cl_project` = '$projid')";
          $this->db->select('cl_billdate,cl_invamt');
          $this->db->join('project','project.project_id = ar_clear_header.cl_project');
          $this->db->where($where_p);
          $this->db->where('ar_clear_header.compcode',$compcode);
          $this->db->order_by('cl_billdate','asc');
         return $this->db->get('ar_clear_header')->result();
        }
        public function sclove_income_sub($projid,$compcode)
        {
          $where_p = "(`ar_clear_header`.`cl_project` = '$projid' or `project`.`project_sub` = '$projid' ) and `project`.`project_sub`!='no'";
          $this->db->select('cl_billdate,cl_invamt');
          $this->db->join('project','project.project_id = ar_clear_header.cl_project');
          $this->db->where($where_p);
          $this->db->where('ar_clear_header.compcode',$compcode);
          $this->db->order_by('cl_billdate','asc');
         return $this->db->get('ar_clear_header')->result();
        }

        public function sclove_progress($projcode,$compcode)
        {
          $this->db->select('date,amount_submit,amount_certificate');
          $this->db->where('site_no',$projcode);
          // $this->db->where('compcode',$compcode);
          $this->db->order_by('date','asc');
         return $this->db->get('progress_submit')->result();

        }
        public function sclove_progress_sub($projcode,$compcode,$projid)
        {
          $where_p = "(`progress_submit`.`site_no` = '$projid' or `project`.`project_sub` = '$projid' ) and `project`.`project_sub`!='no'";
          $this->db->select('date,amount_submit,amount_certificate');
          $this->db->join('project','project.project_code = progress_submit.site_no');
          $this->db->where($where_p);
          // $this->db->where('compcode',$compcode);
          $this->db->order_by('date','asc');
         return $this->db->get('progress_submit')->result();

        }
        public function sclove_progress_all($projcode,$compcode,$projectid)
        {
          $where_p = "(`site_no` = '$projcode' )";
          $this->db->select('date,amount_submit,amount_certificate');
          $this->db->join('project','project.project_code = progress_submit.site_no');
          $this->db->where($where_p);
          // $this->db->where('compcode',$compcode);
          $this->db->order_by('date','asc');
         return $this->db->get('progress_submit')->result();

        }


        public function currency(){
          $this->db->select('*');
          $this->db->from('currency');  
          $query = $this->db->get()->result();
          return $query;
        }
        public function receive_loi($username,$code,$type,$compcode)
        {
          if($type=="p"){
          $this->db->select('*');
          $this->db->from('lo');
          $this->db->join('project', 'project.project_id = lo.projectcode','left outer');
          // $this->db->join('department','department.department_id = lo.department','left outer');
          $this->db->join('vender','vender.vender_id = lo.contact','left outer');
          $this->db->join('member','member.m_name = lo.user','left outer');
          $this->db->where('projectcode',$code);
          $this->db->where('lo.compcode',$compcode);
          $this->db->where('lo.status !=',"delete");
          $query = $this->db->get();
          $res = $query->result();
          }else{
          $this->db->select('*');
          $this->db->from('lo');
          // $this->db->join('project', 'project.project_id = lo.projectcode','left outer');
          $this->db->join('department','department.department_id = lo.dpid','left outer');
          $this->db->join('vender','vender.vender_id = lo.contact','left outer');
          $this->db->join('member','member.m_name = lo.user','left outer');
          $this->db->where('dpid',$code);
          $this->db->where('lo.compcode',$compcode);
          $query = $this->db->get();
          $res = $query->result();
          }
          
          return $res;
        }
        public function table_apstablelodetail($ref) {
          $this->db->select('*');
          $this->db->from('lo_detail');
          $this->db->join('lo', 'lo.lo_lono = lo_detail.lo_ref');
          $this->db->where('lo_ref', $ref);
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }
        public function costlevel($compcode){
          $this->db->select('costlevel');
          $this->db->where('sys_code',$compcode);
          $q = $this->db->get('syscode')->result_array();
          // foreach ($q as $key => $value) {
          //  $res = $value->multicomp;
          // }
          return $q;
        }
        public function load_boq($tdcode,$ref_revise,$compcode){
          $res = $this->db->query("select * from boq_item LEFT OUTER JOIN system ON system.systemcode = boq_item.boq_job  where boq_bd = '".$tdcode."' and revise = '".$ref_revise."' and boq_item.compcode = '".$compcode."' and system.compcode = '".$compcode."'")->result();
          return $res;
        }
        public function countboq($tdcode){
          $res = $this->db->query("select * from boq_item where boq_bd = '".$tdcode."'")->num_rows();
          return $res;
        }
        public function get_revise_heading($tdcode){
          $res = $this->db->query("select ref_bd from heading_bd where boq_bd = '".$tdcode."' ORDER BY `id` desc limit 1")->result_array();
          if($res){
            $ref = $res[0]['ref_bd'];
          }else{
            $ref = 0;
          }
          return $ref;
        }
        public function get_heading_bdreivse($ref_bd){
          $res = $this->db->query("select ref_bd from heading_bdrevise where ref_heading = '".$ref_bd."' order by `id` desc limit 1")->result_array();
            if ($res) {
              $ref = $res[0]['ref_bd'];
            }else{
              $ref = 0;
            }
          return $ref;
          }

          public function archive_budget($bdcode){
            $res = $this->db->query("select boq_id,newmatcode,newmatnamee,format(qty_bg,2) as qty_bg,format(matpricebg,2) as matpricebg,format(matamtbg,2) as matamtbg from boq_item_revise where boq_bd = '".$bdcode."'")->result_array();
            for ($i=0; $i < count($res); $i++) { 
              $data = array('data' => $res, );
            }
            return $data;
          }
          public function archive_budget_rev($bdcode){
            $code = trim($bdcode);
            $res = $this->db->query("select boq_id,newmatcode,newmatnamee,qty_bg,matpricebg,matamtbg,subcostcode from boq_item where boq_bd = '".$code."' group by newmatcode order by boq_id asc")->result();
            
            return $res;
          }
          public function count_revise($bdcode){
            $count = $this->db->query("select revise_boq from boq_item where boq_bd = '".$bdcode."' group by revise_boq")->result();
            return $count;
          }
          
} // class