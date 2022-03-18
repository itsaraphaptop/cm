<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class revise extends CI_Controller {
  public function __construct() {
    parent::__construct();
    error_reporting(0);
    
  }

  public function show_revise($bd_tenid = null){
              
          $input = $this->input->post('data');
          
          $revise = array();
          foreach ($input as $key => $value) {
            if($value["name"] == "revise[]"){
              $revise[] = $value["value"];
              
            }
          }
          $this->db->select("boq_id,boq_costmat,boq_costmatname,boq_costsub,boq_costsubname,boq_total_amt as contract , boq_balance , boq_balance as purchase_cost , forecastbg");
          $this->db->where("boq_project",$bd_tenid);
          $result = $this->db->get('boq_item')->result_array();
        
         
          foreach ($result as $keyLoop1 => $value) {
          
              $array_total_revise = array();
              foreach ($revise as $keyLoop2 => $revise_list) {
             
                $this->db->select("boq_budget_total");
                $this->db->where(
                  [
                    "boq_id"=>$value["boq_id"],
                    "revise"=>$revise_list
                  ]
                );

                $this->db->limit(1);
                $res_revise = $this->db->get("boq_item_revise")->result_array();
                $total_revise = 0;
              
                  if(isset($res_revise[0])){
                      $total_revise = $res_revise[0]["boq_budget_total"];
                     
                  }
                  
                $array_total_revise[$revise_list] = $total_revise;

              } // loop $revise
                
                $result[$keyLoop1]["revise_list"] = $array_total_revise;
                $end_col = end($revise);
                $prev_col = prev($revise);
            
                if($end_col == 0){
                  // last revise - contract
                  $result[$keyLoop1]["dif"] = ($result[$keyLoop1]["revise_list"][$end_col]*1) - ($result[$keyLoop1]["contract"]*1);
                }else{
                  // n revise - (n revise - 1) 4 - 3 , 5 -4 , 6 - 5

                  $result[$keyLoop1]["dif"] = ($result[$keyLoop1]["revise_list"][$end_col]*1) - ($result[$keyLoop1]["revise_list"][$prev_col]*1) ;
                }
                
                $result[$keyLoop1]["gross_margin"] = ($result[$keyLoop1]["contract"]*1) - ($result[$keyLoop1]["revise_list"][$end_col]*1);
              
                $result[$keyLoop1]["Budget_bal"] = ($result[$keyLoop1]["revise_list"][$end_col]*1) - ($result[$keyLoop1]["purchase_cost"]);

                $result[$keyLoop1]["to_be_order"] =( $result[$keyLoop1]["forecastbg"]*1) - ($result[$keyLoop1]["purchase_cost"]);

                $result[$keyLoop1]["variance_bg"] = ($result[$keyLoop1]["revise_list"][$end_col]*1) - ( $result[$keyLoop1]["forecastbg"]*1);          
          }// loop $result    
          $this->load->view('management/revise_v',["data" => $result,"col_revise" => $revise]);
        }


        public function show_revise_summary($bd_tenid = null,$tap = null){
            $input = $this->input->post('data');

            $revise = array();
            foreach ($input as $key => $value) {
              if($value["name"] == "revise[]"){
                $revise[] = $value["value"];
                
              }
            }
            
            $this->db->distinct();
            $this->db->select("cost");
            $this->db->where("sub_boq",$bd_tenid);
            $query_1 = $this->db->get("detail_boq");
            $res_group_mat= $query_1->result_array();

           
            foreach ($res_group_mat as $key => $group_mat) {
                
                $this->db->select("*,sum(cost_no) as summ");
                $this->db->where("sub_boq",$bd_tenid);
                $this->db->where("cost",$group_mat["cost"]);
                
                $this->db->group_by("sub_code");
                $this->db->order_by('sub_code', 'ASC');
                $query_2 = $this->db->get("detail_boq");
                $res_group_mat_list = $query_2->result_array();
                $array_mat_list[] = $res_group_mat_list;
                
            }

             $num_sum = 0;
            // loop summary reverse
             
             

            foreach ($array_mat_list as $key => $mat_list) {
              $num_sum = 0;
                for($index_rev = (count($mat_list)-1) ; $index_rev >= 0 ; $index_rev-- ){
                  $num_sum+=$array_mat_list[$key][$index_rev]["summ"];
                  $array_mat_list[$key][$index_rev]["summary"] = $num_sum;
                }
            }
             
             //print_r($array_mat_list);
            if($tap == "sm"){
                $this->load->view('management/revise_sum_v',["data" => $array_mat_list]);
            }elseif($tap == "smg"){
                $this->load->view('management/revise_sum_group_v',["data" => $array_mat_list]);
            }


        }



}