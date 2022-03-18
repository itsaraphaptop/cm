<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('app_modal');


	}

	public function login_app() {

		$user_name = $this->input->post("m_user");
		$pass = $this->input->post("m_pass");

		$res_user = $this->app_modal->login_app_m($user_name, $pass);

		echo json_encode($res_user);
	}

	public function get_notify() {
		$m_id = $this->input->post("m_id");
		$m_code = $this->input->post("m_code");
		$return = array();

		$get_noitfy_res = $this->app_modal->get_notify_m($m_id, $m_code);
		
		echo json_encode($get_noitfy_res);
	}

	public function get_list_approve(){
		
		//init val
		$return = array();
		$return["status"] = true;
		$m_id = $this->input->post("m_id");
		$m_code = $this->input->post("m_code");
		$type = $this->input->post("type");
		$project_id = $this->input->post("project_id");

		//load modal get_list_approve_m
		$array_list = $this->app_modal->get_list_approve_m($m_id,$m_code,$type,$project_id);

		//check status get data
		if($array_list !== false){
			$return["data"] = $array_list;
		}else{
			$return["status"] = false;
			$return["message"] = "get data anot found";
			
		}


    //output json 
    echo json_encode($return);
  }

  public function get_list_project(){
      
        $m_id = $this->input->post("m_id");      
        $type = $this->input->post("type");
        $project_list = $this->app_modal->get_list_project_m($m_id,$type);
        
        if($project_list!=false){
          echo json_encode($project_list);
        }else{
          echo json_encode(array());
        }
        
  }

	public function detail_approve_sequence(){

		  $pj_code = $this->input->post("pj_code");
		  $pr_no = $this->input->post("doc_no");
		  $m_id =  $this->input->post("m_id");
		  $type = $this->input->post("type");
		  $username = $this->input->post("username");

          $this->db->select('*');

          if($type == "pr"){
          	 $this->db->from('approve_pr');
          }elseif($type == "po"){
          	 $this->db->from('approve_po');
          }else{
          	die();
          }
         
          $this->db->where('app_project',$pj_code);
          $this->db->where('app_pr',$pr_no);
          $this->db->order_by('app_sequence', 'ASC');
          $sc=$this->db->get()->result();
                  //var_dump($sc);
                  //echo "<pr>";

          $return = array();
          //$return["data"] = array();
                  $a=1; 
                  	foreach ($sc as $cc) {

	                        if($cc->app_sequence=="1"){
	                          $s1=$cc->status;
	                          $l1 = $cc->lock;
	                        }else if($cc->app_sequence=="2"){
	                          $s2=$cc->status;
	                          $l2 = $cc->lock;
	                        }else if($cc->app_sequence=="3"){
	                          $s3=$cc->status;
	                          $l3 = $cc->lock;
	                        }else if($cc->app_sequence=="4"){
	                          $s4=$cc->status;
	                          $l4 = $cc->lock;
	                        }else if($cc->app_sequence=="5"){
	                          $s5=$cc->status;
	                          $l5 = $cc->lock;
	                        }else if($cc->app_sequence=="6"){
	                          $s6=$cc->status;
	                          $l6 = $cc->lock;
	                        }else if($cc->app_sequence=="7"){
	                          $s7=$cc->status;
	                          $l7 = $cc->lock;
	                        }else if($cc->app_sequence=="8"){
	                          $s8=$cc->status;
	                          $l8 = $cc->lock;
	                        }else if($cc->app_sequence=="9"){
	                          $s9=$cc->status;
	                          $l9 = $cc->lock;
	                        }else if($cc->app_sequence=="10"){
	                          $s10=$cc->status;
	                          $l10 = $cc->lock;
	                        }

	                       $lock = $cc->lock;
	           

	                       	
	                       	$approve = false;
	                       	$disapprove =false;
	                       	$reject = false;
	                       	$message = "";
	                       	$color = "red";
	                       	// sequence 1 --------------------------------------------------------------

	                       	if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="no" ){ 
                          		// sequence 1  me wait approve
                          		$approve = true;
		                       	$disapprove =true;
		                       	$reject = true;

                            }else if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="yes"){ 
                            	// sequence 1  me approve
                            	$approve = false;
		                       	$disapprove =true;
		                       	$reject = true;

                            }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="no"){ 
                            	// sequence 1  not me approve
                            	$message = "Not verified yet.";

                            }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="yes"){ 
                            	// sequence 1  not me me approve
                            	$message = "Approved successfully.";
                            	$color = "green";
                            	
                            
                            }else if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="approve"){ 
                            	// sequence 1 me approve
                            	$message = "Approved successfully.";
                            	$color = "green";
                            
                            }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="approve"){ 
                            	// sequence 1  me approve
                            	$message = "Approved successfully.";
                            	$color = "green";

                            } 

                            // sequence 1 --------------------------------------------------------------


                            // sequence 2 --------------------------------------------------------------
                           if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes" ){ 

                           	$approve = true;
		                       	$disapprove =true;
		                       	$reject = true;

                           }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="yes"){ 

                           	$approve = false;
		                       	$disapprove =true;
		                       	$reject = true;

                           }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="no"){

                           		$message = "Not verified yet.";

                           }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="yes"){

                           		$message = "Approved successfully.";
                           		$color = "green";

                           }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="no"  && $cc->status!="yes" && $l1!="Y"){

                           		$approve = true;
		                       	$disapprove =true;
		                       	$reject = true;

                           }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="approve"){
                           		$message = "Approved successfully.";
                           		$color = "green";

                           }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="approve"){
                           		$message = "Approved successfully.";
                           		$color = "green";

                           }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes"){
                           		$message = "Not verified yet.";

                           }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="no" ){
                           		$message = "Not verified yet.";

                           }elseif($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes"){
                           		$message = "Not verified yet.";
                           }
                           // sequence 2 --------------------------------------------------------------


                           // sequence 3 --------------------------------------------------------------
                           if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes" ){
                           		$approve = true;
		                       	$disapprove =true;
		                       	$reject = true;

                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="yes"){
                           		$approve = false;
		                       	$disapprove =true;
		                       	$reject = true;

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="no"){
                           		$message = "Not verified yet.";

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="yes"){
                           		$message = "Approved successfully.";
                           		$color = "green";
                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="no"  && $cc->status!="yes" && $l2!="Y"){
                           		$approve = true;
		                       	$disapprove =true;
		                       	$reject = true;
                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="approve"){
                           		$message = "Approved successfully.";
                           		$color = "green";

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="approve"){
                           		$message = "Approved successfully.";
                           		$color = "green";
                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="no" ){
                           		$message = "Not verified yet.";
                           	}elseif($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes"){
                           		$message = "Not verified yet.";
                           	}
                           // sequence 3 --------------------------------------------------------------

                           	 // sequence 4 --------------------------------------------------------------
                           	if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes" ){
                           		$approve = true;
		                       	$disapprove =true;
		                       	$reject = true;

                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="yes"){
                           		$approve = false;
		                       	$disapprove =true;
		                       	$reject = true;

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="no"){
                           		$message = "Not verified yet.";

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="yes"){
                           		$message = "Approved successfully.";
                           		$color = "green";
                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="no"  && $cc->status!="yes" && $l3!="Y"){
                           		$approve = true;
		                       	$disapprove =true;
		                       	$reject = true;

                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="approve"){
                           		$message = "Approved successfully.";
                           		$color = "green";

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="approve"){
                           		$message = "Approved successfully.";
                           		$color = "green";
                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="no" ){ 
                           		$message = "Not verified yet.";
                           	}elseif($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes" ){
                           		$message = "Not verified yet.";
                           	}
                           // sequence 4 --------------------------------------------------------------


                           	 // sequence 5 --------------------------------------------------------------
                           	if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes" ){
                           		$approve = true;
		                       	$disapprove =true;
		                       	$reject = true;

                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="yes"){
                           		$approve = false;
		                       	$disapprove =true;
		                       	$reject = true;

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="no"){
                           		$message = "Not verified yet.";

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="yes"){
                           		$message = "Approved successfully.";
                           		$color = "green";
                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="no"  && $cc->status!="yes" && $l3!="Y"){
                           		$approve = true;
		                       	$disapprove =true;
		                       	$reject = true;

                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="approve"){
                           		$message = "Approved successfully.";
                           		$color = "green";

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="approve"){
                           		$message = "Approved successfully.";
                           		$color = "green";
                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="no" ){ 
                           		$message = "Not verified yet.";
                           	}elseif($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes" ){
                           		$message = "Not verified yet.";
                           	}
                           // sequence 5 --------------------------------------------------------------

                           	// sequence 6 --------------------------------------------------------------
                           	if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes" ){
                           		$approve = true;
		                       	$disapprove =true;
		                       	$reject = true;

                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="yes"){
                           		$approve = false;
		                       	$disapprove =true;
		                       	$reject = true;

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="no"){
                           		$message = "Not verified yet.";

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="yes"){
                           		$message = "Approved successfully.";
                           		$color = "green";
                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="no"  && $cc->status!="yes" && $l3!="Y"){
                           		$approve = true;
		                       	$disapprove =true;
		                       	$reject = true;

                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="approve"){
                           		$message = "Approved successfully.";
                           		$color = "green";

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="approve"){
                           		$message = "Approved successfully.";
                           		$color = "green";
                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="no" ){ 
                           		$message = "Not verified yet.";
                           	}elseif($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes" ){
                           		$message = "Not verified yet.";
                           	}
                           // sequence 6 --------------------------------------------------------------

                           	// sequence 7 --------------------------------------------------------------
                           	if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes" ){
                           		$approve = true;
		                       	$disapprove =true;
		                       	$reject = true;

                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="yes"){
                           		$approve = false;
		                       	$disapprove =true;
		                       	$reject = true;

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="no"){
                           		$message = "Not verified yet.";

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="yes"){
                           		$message = "Approved successfully.";
                           		$color = "green";
                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="no"  && $cc->status!="yes" && $l3!="Y"){
                           		$approve = true;
		                       	$disapprove =true;
		                       	$reject = true;

                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="approve"){
                           		$message = "Approved successfully.";
                           		$color = "green";

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="approve"){
                           		$message = "Approved successfully.";
                           		$color = "green";
                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="no" ){ 
                           		$message = "Not verified yet.";
                           	}elseif($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes"){
                           		$message = "Not verified yet.";
                           	}
                           // sequence 7 --------------------------------------------------------------

                           // sequence 8 --------------------------------------------------------------
                           	if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes" ){
                           		$approve = true;
		                       	$disapprove =true;
		                       	$reject = true;

                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="yes"){
                           		$approve = false;
		                       	$disapprove =true;
		                       	$reject = true;

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="no"){
                           		$message = "Not verified yet.";

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="yes"){
                           		$message = "Approved successfully.";
                           		$color = "green";
                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="no"  && $cc->status!="yes" && $l3!="Y"){
                           		$approve = true;
		                       	$disapprove =true;
		                       	$reject = true;

                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="approve"){
                           		$message = "Approved successfully.";
                           		$color = "green";

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="approve"){
                           		$message = "Approved successfully.";
                           		$color = "green";
                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="no" ){ 
                           		$message = "Not verified yet.";
                           	}elseif($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes"){
                           		$message = "Not verified yet.";
                           	}
                           // sequence 8 --------------------------------------------------------------

                           	// sequence 9 --------------------------------------------------------------
                           	if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes" ){
                           		$approve = true;
		                       	$disapprove =true;
		                       	$reject = true;

                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="yes"){
                           		$approve = false;
		                       	$disapprove =true;
		                       	$reject = true;

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="no"){
                           		$message = "Not verified yet.";

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="yes"){
                           		$message = "Approved successfully.";
                           		$color = "green";
                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="no"  && $cc->status!="yes" && $l3!="Y"){
                           		$approve = true;
		                       	$disapprove =true;
		                       	$reject = true;

                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="approve"){
                           		$message = "Approved successfully.";
                           		$color = "green";

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="approve"){
                           		$message = "Approved successfully.";
                           		$color = "green";
                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="no" ){ 
                           		$message = "Not verified yet.";
                           	}elseif($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes"){
                           		$message = "Not verified yet.";
                           	}
                           // sequence 9 --------------------------------------------------------------

                           	// sequence 10 --------------------------------------------------------------
                           	if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes" ){
                           		$approve = true;
		                       	$disapprove =true;
		                       	$reject = true;

                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="yes"){
                           		$approve = false;
		                       	$disapprove =true;
		                       	$reject = true;

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="no"){
                           		$message = "Not verified yet.";

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="yes"){
                           		$message = "Approved successfully.";
                           		$color = "green";
                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="no"  && $cc->status!="yes" && $l3!="Y"){
                           		$approve = true;
		                       	$disapprove =true;
		                       	$reject = true;

                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="approve"){
                           		$message = "Approved successfully.";
                           		$color = "green";

                           	}else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="approve"){
                           		$message = "Approved successfully.";
                           		$color = "green";
                           	}else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="no" ){ 
                           		$message = "Not verified yet.";
                           	}elseif($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes" ){
                           		$message = "Not verified yet.";
                           	}
                           // sequence 10 --------------------------------------------------------------

	                        $box["lock"] = $lock;
	                        $box["user"] = $cc->app_midname;
	                        $box["approve_sequence"] = $cc->app_sequence;
	                        $box["approve"] = $approve;
	                        $box["disapprove"] = $disapprove;
	                        $box["reject"]= $reject;
	                        $box["message"] = $message; 
	                        $box["id_item"] = $cc->app_id;
	                        $box["type"] = $type;
	                        $box["color"] = $color;
	                       
	                        $return[] = $box;
					}

					echo json_encode($return);
             
           // }

	}

	public function approve_action(){
		error_reporting(0);

		$return = array();
		$id = $this->uri->segment(3);
        $doc_no = $this->uri->segment(4);
        $pj_code = $this->uri->segment(5);
        $sequence = $this->uri->segment(6);
        $type = $this->uri->segment(7);

        if($type == "pr"){
        	$table = "approve_pr";
        	$table_head = "pr";
        	$column_head = "pr_prno";
        	$column_approve = "pr_approve";
        }elseif($type == "po"){
        	$table = "approve_po";
        	$table_head = "po";
        	$column_head = "po_pono";
        	$column_approve = "po_approve";
        }else{
        	echo "false";
        	die();
        }

        $data = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );

          $this->db->where('app_id',$id);
          $this->db->update($table,$data);

          if($numz<"1"){
            $dataz = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );

            $this->db->where('app_pr',$doc_no);
            $this->db->where('app_sequence',$sequence);
            $this->db->update($table,$dataz);
          }

          $datap = array(
              'status' => "approve",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );

          $this->db->where('app_pr',$doc_no);
          $this->db->where('app_sequence <',$sequence);
          $this->db->update($table,$datap);

          $this->db->select('*');
          $this->db->from($table);
          $this->db->where('app_project',$pj_code);
          $this->db->where('app_pr',$doc_no);
          $this->db->where('app_sequence',$sequence);
          $numz=$this->db->get()->num_rows(); 

          $this->db->select('*');
          $this->db->from($table);
          $this->db->where('app_project',$pj_code);
          $this->db->where('app_pr',$doc_no);
          $this->db->where('status =','no'); 
          $numx=$this->db->get()->num_rows(); 
                      
          if($numx=="0"){
            $datax = array(
              $column_approve => "approve",
            );

            $this->db->where($column_head,$doc_no);
            $this->db->update($table_head,$datax);

          }
        echo "true";
	}

	public function disapprove_action(){

          $id = $this->uri->segment(3);
          $doc_no = $this->uri->segment(4);
          $pj_code = $this->uri->segment(5);
          $user_name = $this->uri->segment(6);
          $type = $this->uri->segment(7);
          $data = array(
              'status' => "no",
              'del_time' => date('Y-m-d : H:i:s'),
              'del_user' => $user_name,
            );
          if($type == "pr"){
        	$table = "approve_pr";
        }elseif($type == "po"){
        	$table = "approve_po";
        }else{
        	echo "false";
        	die();
        }
          
          $this->db->where('app_pr',$doc_no);
          $q = $this->db->update($table,$data);

          if ($q==true) {
          	echo "true";
          }else{
          	echo "false";
          }
        }

    public function reject_action(){

          $id = $this->uri->segment(3);
          $doc_no = $this->uri->segment(4);
          $pj_code = $this->uri->segment(5);
          $user_name = $this->uri->segment(6);
          $data = array(
              'status' => "no",
              'del_time' => date('Y-m-d : H:i:s'),
              'del_user' => $user_name,
            );
          $this->db->where('app_pr',$doc_no);
          $q = $this->db->update('approve_pr',$data);

          if ($q==true) {
          	echo "true";
          }else{
          	echo "false";
          }
    }

    public function get_item_document(){

      $type =$this->input->post("type");
      $doc_no = $this->input->post("doc_no");
      // $doc_no  = "PR201709301207";

      
  
        if($type == "pr"){
           $data_col = array(
              "pr_item.pri_id as id",
              "pr.pr_prno as doc_no",
              "pr.pr_prdate as doc_date",
              "pr_item.pri_qty as qty",
              "pr_item.pri_unit as unit",
              "pr_item.pri_matname as mat_name",
              "pr_item.pri_matcode as mat_code",
             
            );

              $this->db->select($data_col);
              $this->db->from("pr");
              $this->db->join("pr_item","pr.pr_prno = pr_item.pri_ref");
              $this->db->where("pr.pr_prno",$doc_no);
              $res =  $this->db->get()->result_array();

              foreach ($res as $key => $value) {
                  $res[$key]["qty"] = $res[$key]["qty"]*1;
                  $res[$key]["amount"] = "";
                  $res[$key]["priceunit"] = "";
              }

        }elseif($type == "po"){

           $data_col = array(
              "po_item.poi_id as id",
              "po_item.poi_ref as doc_no",
              "po.po_podate as doc_date",
              "po_item.poi_qty as qty",
              "po_item.poi_unit as unit",
              "po_item.poi_matname as mat_name",
              "po_item.poi_matcode as mat_code",
              "po_item.poi_amount as amount",
              "po_item.poi_priceunit as priceunit"
            );

            $this->db->select($data_col);
            $this->db->from("po");
            $this->db->join("po_item","po.po_pono = po_item.poi_ref");
            $this->db->where("po.po_pono",$doc_no);
            $res =  $this->db->get()->result_array();

             foreach ($res as $key => $value) {
                  $res[$key]["qty"] = $res[$key]["qty"]*1;
                  $res[$key]["amount"] = $res[$key]["amount"]*1;
              }
        }else{
            echo "false";
            die();
        }
        
       echo json_encode($res);
    }

    public function project_list_permission($m_id = null){
       $res = $this->app_modal->project_list_permission_m($m_id);
        echo json_encode($res);
    }

	// po receive
    public function get_project_po_receive($m_id = null){
        $project_list = $this->app_modal->project_list_permission_m($m_id);
        
        foreach ($project_list as $key => $project_item) {
         
          $receive_po = $this->app_modal->po_wait_po_receive($project_item["pid"]);
          $project_list[$key]["receive_po"] = count($receive_po);
          $project_list[$key]["data"] = $receive_po;
          
        }

        echo json_encode($project_list);


    }

	// ic receive
    public function get_project_ic_receive($m_id = null){
        $project_list = $this->app_modal->project_list_permission_m($m_id);

        foreach ($project_list as $key => $project_item) {
         
          $receive_po = $this->app_modal->po_wait_ic_receive($project_item["pid"]);
          $project_list[$key]["receive_ic"] = count($receive_po);
		      $project_list[$key]["data"] = $receive_po;

		    }
		    echo json_encode($project_list);
    }

    public function export_csv(){
        $this->load->dbutil();
        $this->load->helper('download');
        $this->load->helper("file");

        $query = $this->db->query("SELECT * FROM project");

        $data = $this->dbutil->csv_from_result($query);
        $name = 'mytext2.csv';
        force_download($name, "\xEF\xBB\xBF" . $data);
    }

}

/* End of file app_controller.php */
/* Location: ./application/controllers/app_controller.php */
