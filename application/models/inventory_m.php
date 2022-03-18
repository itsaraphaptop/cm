<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class inventory_m extends CI_Controller {
          public function __construct() {
            parent::__construct();
        }
        public function store_center($project)
        {
          $this->db->select('*');
          $this->db->where('store_project',$project);
          $this->db->where('store_total !=',0);
          $q = $this->db->get('store');
          $res = $q->result();
          return $res;
        }
        public function countpoiqty($pono)
        {
        	$this->db->select_sum('poi_qty');
        	$this->db->where('poi_ref',$pono);
        	$query = $this->db->get('po_item');
        	$res = $query->result();
        	return $res;
        }
        public function countrecpoiqty($rccode)
        {
          $this->db->select_sum('poi_qty');
          $this->db->where('poi_ref',$rccode);
          $query = $this->db->get('po_recitem');
          $res = $query->result();
          return $res;
        }
        public function countpoireceive($pono)
        {
        	$this->db->select_sum('poi_receive');
        	$this->db->where('poi_ref',$pono);
        	$query = $this->db->get('po_item');
        	$res = $query->result();
        	return $res;
        }
         public function counticpoireceive($rccode)
        {
          $this->db->select_sum('poi_receive');
          $this->db->where('poi_ref',$rccode);
          $query = $this->db->get('po_recitem');
          $res = $query->result();
          return $res;
        }
        public function updateporeceive($updateporeceive)
        {
        	$query = $this->db->update('po',$updateporeceive);
        	if ($query) {
        		return true;
        	}else
        	{
        		return false;
        	}
        }
        public function getstore($matcode)
        {
          $this->db->select('*');
          $this->db->where('store_matcode',$matcode);
          $qur = $this->db->get('store');
          $res = $qur->result();
          return $res;
        }
        public function getstoreproj($projid)
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
            $this->db->select('*');
            $this->db->from('store');
            $this->db->join('project', 'project.project_id = store.store_project','left outer');
            
            $this->db->where('store_project',$projid);
            $this->db->where('store_qty !=',"0");
            $this->db->where('store.compcode',$compcode);
            $this->db->group_by("store.store_matcode");
            $query = $this->db->get();
    
            $res = $query->result();
            return $res;
        }
        public function getstoreprojsum($projid)
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
            $this->db->select('store.store_matname,
store.store_matcode,
store.store_project,
store.store_costcode,
store.store_costname,
store.store_id,
store.store_type,
store_qty,
store.store_unit,
store.store_recqty,
store.store_total,
store.unitprice,
store.discountprice,
store.totalprice,
store.wh,
store.unbooking,
store.booking,
store.store_totalqty,
ic_proj_warehouse.whname,
store.compcode'); 
            $this->db->from('store');
            $this->db->join('ic_proj_warehouse','ic_proj_warehouse.whcode = store.wh','left outer');
            $this->db->where('store_project',$projid);
            $this->db->where('project_id',$projid);
            $this->db->where('store_total !=',"0");
            $this->db->where('store.compcode',$compcode);
            // $this->db->group_by("store.store_matcode");
            $query = $this->db->get();


                // $query = $this->db->query("select
                //   store.store_matname,
                //   store.store_matcode,
                //   store.store_project,
                //   store.store_costcode,
                //   store.store_costname,
                //   store.store_id,
                //   store.store_type,
                  
                //   store.store_unit,
                //   store.store_recqty,
                //   store.store_total,
                //   store.unitprice,
                //   store.discountprice,
                //   store.totalprice,
                //   store.compcode,
                //   ic_proj_warehouse.whname
                //   FROM
                //   po_recitem
                //    JOIN store ON po_recitem.poi_matcode = store.store_matcode
                //    JOIN po_receive ON po_receive.po_reccode = po_recitem.poi_ref
                //    JOIN ic_proj_warehouse ON po_recitem.ic_warehouse = ic_proj_warehouse.whcode
                //   WHERE
                //   store.store_project = '".$projid."'
                //   and store.store_qty != 0
                //   and store.compcode = '".$compcode."'
                //  ");
            $res = $query->result();
            return $res;
        }
        public function getstoreprojtranfer_wh($projid,$whcode)
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $this->db->select('store.store_matname,
              store.store_matcode,
              store.store_project,
              store.store_costcode,
              store.store_costname,
              store.store_id,
              store.store_type,
              Sum(store.store_qty) AS store_qty,
              store.store_unit,
              store.store_recqty,
              Sum(store.store_total) AS store_total,
              store.unitprice,
              store.discountprice,
              store.totalprice,
              store.wh,   
              ic_proj_warehouse.whname,           
              store.compcode,store.jobcode,store.jobname');
              $this->db->from('store');
              $this->db->join('ic_proj_warehouse', 'ic_proj_warehouse.whcode = store.wh', 'left outer');
              $this->db->where('store_project', $projid);
              $this->db->where('project_id', $projid);
              $this->db->where('store_total !=', '0');
              $this->db->where('status', null);
              $this->db->where('store.compcode', $compcode);
              
              $this->db->group_by('store.wh');
              $this->db->group_by('store.store_matcode');
              $query = $this->db->get();
              $mat = $query->result();
              return $mat;
        }
        public function getstoreprojtranfer($projid,$matcode)
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
            $this->db->select('
sum(store.store_qty) AS store_qty,unbooking
');
            $this->db->where('store_project',$projid);
            $this->db->where('store_matcode',$matcode);
            $this->db->where('store.compcode',$compcode);
            $this->db->group_by("store.store_matcode");
            $query = $this->db->get('store');
            $res = $query->result();
            return $res;
        }
        public function getstoreprojcode($projcode)
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
            $this->db->select('*');
            $this->db->from('store');
            $this->db->join('project', 'project.project_id = store.store_project','left outer');
            $this->db->where('store_project',$projcode);
            $this->db->where('store_qty !=',"0");
            $this->db->where('store.compcode',$compcode);
            $query = $this->db->get();
            $res = $query->result();
            return $res;
        }
        public function getdocissue($projid)
        {
           $this->db->select('*');
           $this->db->from('ic_issue_h');
           $this->db->join('member','member.m_id = ic_issue_h.is_reqname','left outer');
           $this->db->join('project','project.project_id = ic_issue_h.is_project','left outer');
           $this->db->join('system','system.systemid = ic_issue_h.is_system','left outer');
           $this->db->where('is_project',$projid);
           $query = $this->db->get();
           $res = $query->result();
           return $res;
        }
        public function issue_detail($projid,$syscode,$code,$compcode){
          $this->db->select('*');
          $this->db->from('ic_issue_d');
          $this->db->join('ic_proj_warehouse','ic_proj_warehouse.whcode = ic_issue_d.isi_wherehouse','left outer');
          $this->db->where('ic_proj_warehouse.project_id',$projid);
          $this->db->where('ic_proj_warehouse.jobcode',$syscode);
          $this->db->where('isi_doccode',$code);
          $this->db->where('ic_issue_d.compcode',$compcode);
          $res = $this->db->get()->result();
          return $res;
        }
        public function getdoctrading($projid)
        {
           $this->db->select('*');
           $this->db->from('ic_trading_h');
           $this->db->join('member','member.m_id = ic_trading_h.trading_reqname','left outer');
           $this->db->join('project','project.project_id = ic_trading_h.trading_project','left outer');
           $this->db->join('system','system.systemid = ic_trading_h.trading_system','left outer');
           $this->db->where('trading_project',$projid);
           $query = $this->db->get();
           $res = $query->result();
           return $res;
        }

        public function check_fifo($matcode)
        {
          $this->db->select('*');
          $this->db->where('poi_matcode',$matcode);
          $this->db->order_by('poi_receivedate','desc');
          $query = $this->db->get('po_recitem');
          $res = $query->result();
          return $res;
        }
        public function stockcard()
        {
          $this->db->select('*');
          // $this->db->where('stock_matcode',$matcode);
          $query = $this->db->get('stockcard');
          $res = $query->result();
          return $res;
        }

        public function stockcardwhere($startdate,$enddate,$material)
        {
          $this->db->select('*');
          $this->db->where('stock_matcode',$material);
          $this->db->where('stock_date BETWEEN "'.$startdate. '" and "'. $enddate.'"');
          $query = $this->db->get('stockcard');
          $res = $query->result();
          return $res;
        }
        public function gettransfer_code($transfercode,$compcode)
        {
          $this->db->select('*');
          $this->db->where('transfer_code',$transfercode);
          $this->db->where('compcode',$compcode);
          $q = $this->db->get('ic_transfer');
          $res = $q->result();
          return $res;
        }
        public function gettransfer_item($transfercode,$compcode,$pro)
        {
          $this->db->select('*,sum(qty) as sumqty');
          $this->db->join('ic_proj_warehouse','ic_proj_warehouse.whcode = ic_transferitem.fromwh');
          // $this->db->where('project_id',$pro);
          $this->db->where('ref_codetransfer',$transfercode);
          $this->db->where('ic_transferitem.compcode',$compcode);
          $this->db->group_by('mat_code');
          $q = $this->db->get('ic_transferitem');
          $res = $q->result();
          return $res;
        }

        // transfer_stor
        public function gettransfer_header_add($compcode)
        {
          $this->db->select('*');
          $this->db->where('compcode',$compcode);
          $q = $this->db->get('ic_transfer');
          $res = $q->result();
          return $res;
        }
        public function gettransfer_header_by_projid($projid,$compcode)
        {
          $this->db->select('*');
          $this->db->where('from_project',$projid);
          // $this->db->where('to_project',$projid);
          $this->db->where('compcode',$compcode);
          // $this->db->where('approve','wait');
          $q = $this->db->get('ic_transfer')->result();
            return $q;

        }
        public function gettransfer_header_receive_by_projid($projid,$compcode)
        {
          $this->db->select('*');
          // $this->db->where('from_project',$projid);
          $this->db->where('to_project',$projid);
          $this->db->where('compcode',$compcode);
          // $this->db->where('approve','wait');
          $q = $this->db->get('ic_transfer');
          $res = $q->result();
          return $res;
        }
        public function gettransfer_approve($projid,$compcode)
        {
          $this->db->select('*');
          $this->db->where('from_project',$projid);
          $this->db->where('compcode',$compcode);
          $this->db->where('approve','wait');
          $q = $this->db->get('ic_transfer');
          $res = $q->result();
          return $res;
        }
        public function getproject_user($username,$id,$compcode)
        {
            $this->db->select('*');
            $this->db->from('project');
            $this->db->join('project_ic','project_ic.project_id = project.project_id');
            $this->db->join('member','member.m_id = project_ic.proj_user');
            $this->db->where('proj_user',$username);
            $this->db->where('project.compcode',$compcode);
            $this->db->where('project.project_sub','no');
            $this->db->where('project_ic.project_status',"Y");
            $this->db->where('project.project_status',"normal");
            $this->db->order_by('project.project_id','desc');
            $query = $this->db->get();
            $res = $query->result();
            return $res;
        }
        public function count_trnfer($projid)
        {
          $this->db->select('*');
          $this->db->where('to_project',$projid);
          $query = $this->db->get('ic_transfer');
          $res = $query->num_rows();
          return $res;
        }
        public function gettranfer_detail($transferno,$compcode)
        {
          $this->db->select('*');
          $this->db->where('ref_codetransfer',$transferno);
          $this->db->where('compcode',$compcode);
          $q = $this->db->get('ic_transferitem');
          
          $res = $q->result();
          return $res;
        }
        public function getbooking_issue($compcode,$proid)
        {
          $this->db->select('*');
          $this->db->where('from_project',$proid);
          $this->db->where('approve',"approve");
          $this->db->where('type_ic',"issue");
          $this->db->where('status',"wait");
          $q = $this->db->get('ic_booking');
          $res = $q->result();
          return $res;

        }
        public function getarcissue($docno,$compcode){
          $this->db->select('*');
          $this->db->where('is_doccode',$docno);
          $this->db->where('compcode',$compcode);
          $res = $this->db->get('ic_issue_h')->result();
          return  $res;        }
        public function getbooking_trading($compcode,$proid)
        {
          $this->db->select('*');
          $this->db->where('from_project',$proid);
          // $this->db->where('approve',"approve");
          $this->db->where('type_ic',"trading");
          $this->db->where('status',"wait");
          $q = $this->db->get('ic_booking');
          $res = $q->result();
          return $res;

        }
        public function getbooking_code($bookingcode,$compcode)
        {
          $this->db->select('*');
          $this->db->where('book_code',$bookingcode);
          $this->db->where('status',"wait");
          // $this->db->where('type_ic',"issue");
          $q = $this->db->get('ic_booking');
          $res = $q->result();
          return $res;
        }
        public function getbooking_detaill($id,$compcode)
        {
          $this->db->select('*');
          $this->db->select_sum('qty');
          // $this->db->join('ic_proj_warehouse','ic_proj_warehouse.whcode = ic_bookingitem.wh');
          $this->db->where('ref_codetransfer',$id);
          $this->db->where('ic_bookingitem.compcode',$compcode);
          $this->db->group_by('mat_code');
          $q = $this->db->get('ic_bookingitem');
          $res =$q->result();
          return $res;
        }
        public function getbooking_detail($id,$compcode,$projid)
        {
          $this->db->select('*');
          $this->db->select_sum("qty");
          $this->db->join('ic_proj_warehouse','ic_proj_warehouse.whcode = ic_bookingitem.wh');
          $this->db->where('ref_codetransfer',$id);
          $this->db->where('ic_proj_warehouse.project_id',$projid);
          $this->db->where('ic_bookingitem.compcode',$compcode);
          $this->db->group_by("mat_code");
          $q = $this->db->get('ic_bookingitem');
          $res =$q->result();
          return $res;
        }

        public function getbooking_detail2($id,$compcode,$projid)
        {
          $this->db->select('*');
          $this->db->join('ic_proj_warehouse','ic_proj_warehouse.whcode = ic_bookingitem.wh');
          $this->db->where('ref_codetransfer',$id);
          $this->db->where('ic_proj_warehouse.project_id',$projid);
          $this->db->where('ic_bookingitem.compcode',$compcode);
          $q = $this->db->get('ic_bookingitem');
          $res =$q->result();
          return $res;
        }

        public function getbooking_project($id,$compcode)
        {
          $this->db->select('*');
          $this->db->where('status', 'wait');
          $this->db->where('from_project',$id);
          $this->db->where('compcode',$compcode);
          $q = $this->db->get('ic_booking');
          $res = $q->result();
          return $res;
        }
         public function getbooking_projectrow($id,$compcode)
        {
          $this->db->select('*');
          $this->db->where('from_project',$id);
          $this->db->where('compcode',$compcode);
          $q = $this->db->get('ic_booking');
          $res = $q->num_rows();
          return $res;
        }
        public function getbooking_item($ref)
        {
          $this->db->select('*');
          $this->db->where('ref_codetransfer',$ref);
          $q = $this->db->get('ic_bookingitem');
          $res = $q->result();
          return $res;
        }
      public function getbkseq($pr,$compcode,$sequence){
          $seq = $sequence+1;
          $this->db->select('app_midid,COUNT(app_midid) as count','app_sequence');
          $this->db->where('app_pr',$pr);
          $this->db->where('status','no');
          $this->db->where('compcode',$compcode);
          $this->db->where('app_sequence',$seq);
          $query = $this->db->get('approve_bk');
          $res = $query->result();
          foreach ($res as $key => $value) {
            $id =  $value->app_midid;
            $count =  $value->count;
          }
          if ($count==0) {
              // return $pr;
              // $this->db->select('pr_memid');
              // $this->db->where('book_code',$pr);
              // $this->db->where('compcode',$compcode);
              // $res = $this->db->get('ic_booking')->result();
              // foreach ($res as $key => $value) {
              //     $id = $value->pr_memid; 
              // }
              // $this->db->select('lineid');
              // $this->db->where('m_id',$id);
              // $this->db->where('compcode',$compcode);
              // $query = $this->db->get('member');
              // $res = $query->result();
              // foreach ($res as $key => $value) {
              //     return $value->lineid;
              // }
          }else{
              $this->db->select('lineid');
              $this->db->where('m_id',$id);
              $this->db->where('compcode',$compcode);
              $query = $this->db->get('member');
              $res = $query->result();
              foreach ($res as $key => $value) {
                  return $value->lineid;
              }
  
          }
  
      }
      public function getapproveid($appid,$compcode)
      {
      $this->db->select('app_midid');
      $this->db->where('app_id',$appid);
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('approve_pr');
      $res = $query->result();
      foreach ($res as $key => $value) {
        $id= $value->app_midid;
	  }
	  $this->db->select('lineid');
			$this->db->where('m_id',$id);
			$this->db->where('compcode',$compcode);
			$query = $this->db->get('member');
			$res = $query->result();
			foreach ($res as $key => $value) {
				return $value->lineid;
			}
	}
        public function retrive_stockcard()
        {
          $this->db->select('*');
          $this->db->order_by('stock_date','asc');
          $query = $this->db->get('stockcard');
          $res = $query->result();
          return $res;
        }
        public function retrive_po_recive_like($startdate,$enddate,$material,$materialend,$project)
        {
          $this->db->select('*');
          $this->db->like('stock_matcode',$material);
          $this->db->like('stock_matcode',$materialend);
          $this->db->like('stock_project',$project);
          $this->db->where('stock_date BETWEEN "'.$startdate. '" and "'. $enddate.'"');
          $query = $this->db->get('stockcard');
          $res = $query->result();
          return $res;
        }
        public function retrive_po_recive($startdate,$enddate,$material,$materialend,$project)
        {
          $this->db->select('*');
          $this->db->where('stock_matcode >=',$material);
          $this->db->where('stock_matcode <=',$materialend);
          $this->db->like('stock_project',$project);
          $this->db->where('stock_date BETWEEN "'.$startdate. '" and "'. $enddate.'"');
          $query = $this->db->get('stockcard');
          $res = $query->result();
          return $res;
        }
        public function retrive_po_recive_like_array($startdate,$enddate,$material,$materialend,$project)
        {
          $this->db->select('*');
          $this->db->like('stock_matcode',$material);
          $this->db->like('stock_matcode',$materialend);
          $this->db->like('stock_project',$project);
          $this->db->where('stock_date BETWEEN "'.$startdate. '" and "'. $enddate.'"');
          $query = $this->db->get('stockcard');
          $res = $query->result_array();
          return $res;
        }
        public function retrive_po_recive_array($startdate,$enddate,$material,$materialend,$project)
        {
          $this->db->select('*');
          $this->db->where('stock_matcode >=',$material);
          $this->db->where('stock_matcode <=',$materialend);
          $this->db->like('stock_project',$project);
          $this->db->where('stock_date BETWEEN "'.$startdate. '" and "'. $enddate.'"');
          $query = $this->db->get('stockcard');
          $res = $query->result_array();
          return $res;
        }
        public function retrive_po_recive_array_project($startdate,$enddate,$material,$materialend,$project)
        {
            $this->db->select('*');
            $this->db->like('stock_matcode',$material);
            $this->db->like('stock_matcode',$materialend);
            $this->db->where('stock_project',$project);
            $this->db->where('stock_date BETWEEN "'.$startdate. '" and "'. $enddate.'"');
            $query = $this->db->get('stockcard');
            $res = $query->result_array();
            return $res;
        }
        function retrive_ic_retrive($compcode)
        {
          $this->db->select('*');
          $this->db->where('compcode',$compcode);
          $q = $this->db->get('po_receive');
          $res = $q->result();
          return $res;
        }
        function retrive_by_po($pono,$compcode)
        {
          $this->db->select('*');
          $this->db->where('po_pono',$pono);
          $this->db->where('compcode',$compcode);
          $q = $this->db->get('receive_po');
          $res = $q->result();
          return $res;
        }
        public function receive_po_detail($reccode,$compcode)
        {
	        $this->db->select('*');
          $this->db->where('poi_status',null);
	        $this->db->where('poi_ref',$reccode);
	        $this->db->where('compcode',$compcode);
	        $q = $this->db->get('receive_poitem');
	        $res = $q->result();
	        return $res;
        }
        function retrive_ic_retrive_by_po($pono,$compcode)
        {
          $this->db->select('*');
          $this->db->where('po_pono',$pono);
          $this->db->where('compcode',$compcode);
          $q = $this->db->get('po_receive');
          $res = $q->result();
          return $res;
        }
        function retrive_ic_retrive_by_project($projectid,$compcode)
        {
          $this->db->select('*');
          $this->db->where('project',$projectid);
          $this->db->where('compcode',$compcode);
          $q = $this->db->get('po_receive');
          $res = $q->result();
          return $res;
        }
        function retrive_popo_retrive_by_project($projectid,$compcode)
        {
          $this->db->select('*');
          $this->db->where('project',$projectid);
          $this->db->where('compcode',$compcode);
          $q = $this->db->get('receive_po');
          $res = $q->result();
          return $res;
        }
        function po_receive_detail($id,$compcode)
        {
          $this->db->select('*');
          $this->db->where('poi_ref',$id);
          $this->db->where('compcode',$compcode);
          $q = $this->db->get('po_recitem');
          $res = $q->result;
          return $res;
        }

        function getwh(){
          $this->db->select('*');
          // $this->db_>where('id',$pjid);
          $q= $this->db->get('ic_proj_warehouse');
          $res=$q->result();
          return $res;
        }

        function getarea(){
          $this->db->select('*');
          // $this->db_>where('id',$pjid);
          $q= $this->db->get('ic_proj_area');
          $res=$q->result();
          return $res;
        }

        public  function getmatavg($material,$projectid)
        {
          $this->db->select('*');
          $this->db->where('stock_matcode',$material);
          $this->db->where('stock_project',$projectid);
          $this->db->order_by('stock_id','desc');
          $this->db->limit(1);
          $q = $this->db->get('stockcard');
          $res = $q->result();
          foreach ($res as $key => $value) {
            return $value->stock_netamt;
          }
        }

        public  function getmatavgavg($material,$projectid)
        {
          $this->db->select('*');
          $this->db->where('stock_matcode',$material);
          $this->db->where('stock_project',$projectid);
          // $this->db->where('stock_type !=','booking');
          $this->db->order_by('stock_id','desc');
          $this->db->limit(1);
          $q = $this->db->get('stockcard');
          $res = $q->result();
          // foreach ($res as $key => $value) {
          //   return $value->stock_avg;
          // }
          return $res;
        }
         public  function getmatavgavg_return($material,$projectid,$is_doccode)
        {
          $this->db->select('*');
          $this->db->where('stock_matcode',$material);
          $this->db->where('stock_project',$projectid);
          $this->db->where('ref_no',$is_doccode);
          // $this->db->where('stock_type !=','booking');
          $this->db->order_by('stock_id','desc');
          $this->db->limit(1);
          $q = $this->db->get('stockcard');
          $res = $q->result();
          // foreach ($res as $key => $value) {
          //   return $value->stock_avg;
          // }
          return $res;
        }
        public function geticcost($compcode)
        {
          $this->db->select('ic_type');
          $this->db->where('compcode',$compcode);
          $q = $this->db->get('company');
          $res = $q->result();
          foreach ($res as $key => $value) {
            return $value->ic_type;
           }
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
      public function countbooking($project_code)
       {
         $this->db->select('*');
         $this->db->where('status','wait');
         $this->db->where('from_project',$project_code);
         $query = $this->db->get('ic_booking');
         $result = $query->num_rows();
         return $result;
       }

       public function getreceive_all($pro)
       {
          $this->db->select('*');
          $this->db->join('department','department.department_id = po.po_department',"left outer");
          $this->db->join('project','project.project_id = po.po_project',"left outer");
          $this->db->where('po_project',$pro);
          $this->db->where('po_approve',"approve");
          $query = $this->db->get('po');
          $res = $query->result();
          return $res;
       }

       public function dash_poreceive($compcode)
       {
          $this->db->select('count(po_poid) as count_po');
          // $this->db->join( 'project', 'project.project_id = po.po_project', "left outer" );
          $this->db->where( 'po_approve', "approve" );
          $this->db->where('ic_status !=','full');
          $this->db->where("po.compcode",$compcode);
          $query_po = $this->db->get( 'po' )->result();
          $data['count_po'] = $query_po[0]->count_po;

          $this->db->select('count(po_recid) as count_receive');
          $this->db->where('ic_status !=','full');
          $this->db->where("compcode",$compcode);
          $query_porec = $this->db->get( 'receive_po' )->result();
          $data['count_receive'] = $query_porec[0]->count_receive;

          $this->db->select('count(id) as count_issue');
          $this->db->where('type_ic',"issue");
          $this->db->where('status','wait');
          $this->db->where('approve','approve');
          $this->db->where("compcode",$compcode);
          $query_issue = $this->db->get( 'ic_booking' )->result();
          $data['count_issue'] = $query_issue[0]->count_issue;

          $this->db->select('count(id) as count_transfer');
          $this->db->where('type_ic',"transfer");
          $this->db->where('status','wait');
          $this->db->where('approve','approve');
          $this->db->where("compcode",$compcode);
          $query_transfer = $this->db->get( 'ic_booking' )->result();
          $data['count_transfer'] = $query_transfer[0]->count_transfer;

          $this->db->select('count(id_trans) as count_receive_transfer');
          $this->db->where('compcode',$compcode);
          $this->db->where('approve','approve');
          $query_receive_trans = $this->db->get('ic_transfer')->result();
          $data['count_receive_transfer'] = $query_receive_trans[0]->count_receive_transfer;

          return $data;
       }

       public function dash_panel_show($compcode)
       {
          $this->db->select('count(po_recid) as count_po');
          $this->db->where('po_recdate',date('Y-m-d',now()));
          $this->db->where("compcode",$compcode);
          $query_porec = $this->db->get( 'receive_po' )->result();
          $data['count_po'] = $query_porec[0]->count_po;

          $this->db->select('count(id) as count_booking');
          $this->db->where('date_book',date('Y-m-d',now()));
          $this->db->where("compcode",$compcode);
          $query = $this->db->get( 'ic_booking' );
          $res_booking  = $query->result();
          $data['count_booking'] = $res_booking[0]->count_booking;

          $this->db->select('count(is_id) as count_issue');
          $this->db->where("compcode",$compcode);
          $this->db->where('is_docdate',date('Y-m-d',now()));
          $query_issue = $this->db->get( 'ic_issue_h' )->result();
          $data['count_issue'] = $query_issue[0]->count_issue;

          $this->db->select('count(id_trans) as count_transfer');
          $this->db->where("compcode",$compcode);
          $this->db->where('date_transfer',date('Y-m-d',now()));
          $query_trans = $this->db->get( 'ic_transfer' )->result();
          $data['count_transfer'] = $query_trans[0]->count_transfer;

          $this->db->select('min_ic_per');
          $this->db->where('sys_code',$compcode);
          $query_min_ic = $this->db->get('syscode')->result();
          $data['min_per'] = $query_min_ic[0]->min_ic_per;

          return $data;
       }
    

       public function getreceive_dep($dep_id)
       {
        $this->db->select('*');
        $this->db->join('department','department.department_id = po.po_department',"left outer");
        $this->db->where('po_department',$dep_id);
        $query = $this->db->get('po');
        $res = $query->result();
        return $res;
       }

       public function getreceive_reall($pro)
       {
         $this->db->select('*');
        $this->db->join('department','department.department_id = po.po_department',"left outer");
        $this->db->join('project','project.project_id = po.po_project',"left outer");
        $this->db->where('ic_status','full');
        $this->db->where('po_approve',"approve");
        $this->db->where('po_project',$pro);
        $query = $this->db->get('po');
        $res = $query->result();
        return $res;
       }
       public function getreceive_some($pro)
       {  
        $this->db->select('*');
        $this->db->join('department','department.department_id = po.po_department',"left outer");
        $this->db->join('project','project.project_id = po.po_project',"left outer");
        $this->db->where('ic_status','wait');
        // $this->db->where('ic_status','open');
        $this->db->where('po_approve',"approve");
        $this->db->where('po_project',$pro);
        $query = $this->db->get('po');
        $res = $query->result();
        return $res;

       }

       public function getreceive_wait($pro)
       {
        $this->db->select('*');
        $this->db->join('department','department.department_id = po.po_department',"left outer");
        $this->db->join('project','project.project_id = po.po_project',"left outer");
        $this->db->where('ic_status','wait');
        $this->db->where('po_approve',"approve");
        $this->db->where('po_project',$pro);
        $query = $this->db->get('po');
        $res = $query->result();
        return $res;
       }

       public function getic_tranfer_m($m_name,$compcode)
       {
        $this->db->select('*');
        $this->db->join('project','project.project_id = ic_transfer.from_project',"left outer");
        // $this->db->where('ic_status','wait');
        $this->db->where('name_transfer',$m_name);
        $this->db->where('ic_transfer.compcode',$compcode);
        $query = $this->db->get('ic_transfer');
        $res = $query->result();
        return $res;
       }

      public function getview_po_m($pro,$compcode){
        $this->db->select('*');
        $this->db->join('department','department.department_id = po.po_department',"left outer");
        $this->db->join('project','project.project_id = po.po_project',"left outer");
        $this->db->where('po.compcode', $compcode);
        $this->db->where('po_project',$pro);
        $this->db->where('ic_status !=',"full");
        $query = $this->db->get('po');
        $res = $query->result();
        return $res;
      }

      public function getview_ic_m($pro,$compcode){
        $this->db->select('*');
      $this->db->from('receive_po');
      $this->db->join('project', 'project.project_id = receive_po.project','left outer');
      $this->db->join('department', 'department.department_id = receive_po.department','left outer');
      $this->db->join('system', 'system.systemcode = receive_po.system','left outer');
      $this->db->where('project.project_id',$pro);
       $this->db->where('receive_po.compcode', $compcode);
      $this->db->where('receive_po.return',null);
      $this->db->where('receive_po.ic_status',"open");
      $query = $this->db->get();
      $res = $query->result();
      return $res;
      }

      function getarchive_po_m($pro,$compcode){
          $this->db->select('*');
          $this->db->where('project',$pro);
          $this->db->where('compcode',$compcode);
          $q = $this->db->get('po_receive');
          $res = $q->result();
          return $res;
        }

        function getarchive_m($pro,$compcode){
          $this->db->select('*');
          $this->db->where('project',$pro);
          $this->db->where('compcode',$compcode);
          $q = $this->db->get('receive_po');
          $res = $q->result();
          return $res;
        }

        function getbooking_m($pro,$compcode){
          $this->db->select('*');
          $this->db->where('project',$pro);
          $this->db->where('compcode',$compcode);
          $q = $this->db->get('receive_po');
          $res = $q->result();
          return $res;
        }

        public function gettbooking_m($id,$compcode)
        {
          $this->db->select('*');
          $this->db->join('project', 'project.project_id = ic_booking.from_project','left outer');
          $this->db->where('from_project',$id);
          $this->db->where('ic_booking.compcode',$compcode);
          $q = $this->db->get('ic_booking');
          $res = $q->result();
          return $res;
        }

        public function mat_booking_m($mat,$wh,$compcode,$pro)
        {
          $this->db->select('*');
          $this->db->where('stock_project',$pro);
          $this->db->where('warehouse',$wh);
          $this->db->where('stock_type','issue');
          $this->db->where('stock_matcode',$mat);
          $q = $this->db->get('stockcard');
          $res = $q->result();
          return $res;
        }

        public function sumbooking_m($mat,$wh,$pro)
        {
          $this->db->select('sum(stock_qty) as toqty,sum(stock_priceunit) as toprice');
          $this->db->where('stock_project',$pro);
          $this->db->where('warehouse',$wh);
          $this->db->where('stock_type','issue');
          $this->db->where('stock_matcode',$mat);
          $q = $this->db->get('stockcard');
          $res = $q->result();
          return $res;
        }

        public function mat_qtyin_m($mat,$wh,$pro)
        {
          $this->db->select('*');
          $this->db->where('stock_project',$pro);
          $this->db->where('warehouse',$wh);
          $this->db->where('stock_type','receive');
          $this->db->where('stock_matcode',$mat);
          $q = $this->db->get('stockcard');
          $res = $q->result();
          return $res;
        }
        public function summat_qtyin_m($mat,$wh,$pro)
        {
          $this->db->select('sum(stock_qty) as toqty,sum(stock_priceunit) as toprice');
          $this->db->where('stock_project',$pro);
          $this->db->where('warehouse',$wh);
          $this->db->where('stock_type','receive');
          $this->db->where('stock_matcode',$mat);
          $q = $this->db->get('stockcard');
          $res = $q->result();
          return $res;
        }
        public function mat_upbook_m($mat,$wh,$pro)
        {
          $this->db->select('*');
          $this->db->join('ic_booking', 'ic_booking.book_code = ic_bookingitem.ref_codetransfer','left outer');
          $this->db->where('from_project',$pro);
          $this->db->where('wh',$wh);
          $this->db->where('status','wait');
          $this->db->where('mat_code',$mat);
          $q = $this->db->get('ic_bookingitem');
          $res = $q->result();
          return $res;
        }

        public function summat_upbook_m($mat,$wh,$pro)
        {
          $this->db->select('sum(qty) as toqty,sum(priceunit) as toprice');
          $this->db->join('ic_booking', 'ic_booking.book_code = ic_bookingitem.ref_codetransfer','left outer');
          $this->db->where('from_project',$pro);
          $this->db->where('wh',$wh);
          $this->db->where('status','wait');
          $this->db->where('mat_code',$mat);
          $q = $this->db->get('ic_bookingitem');
          $res = $q->result();
          return $res;
        }

        public function get_systemname($id)
        {
          $this->db->select('*');
          $this->db->where('systemcode',$id);
          $q = $this->db->get('system');
          $res = $q->result();
          return $res;
        }

        public function approve_booking_m($pro)
        {
          $this->db->select('*');
          $this->db->where('approve',"wait");
          $this->db->where('from_project',$pro);
          $q = $this->db->get('ic_booking');
          $res = $q->result();
          return $res;
        }
        public function detail_booking_m($code,$pro)
        {
          $this->db->select('*');
          $this->db->join('ic_proj_warehouse','ic_proj_warehouse.whcode = ic_bookingitem.wh','left outer');
          $this->db->where('project_id',$pro);
          $this->db->where('ref_codetransfer',$code);
          $this->db->group_by('mat_code');
          $q = $this->db->get('ic_bookingitem');
          $res = $q->result();
          return $res;
        }  


      public function getstoreprojtranfer_m($projid,$matcode,$whi)
      {
        $session_data = $this->session->userdata('sessed_in');
        $compcode = $session_data['compcode'];
        $this->db->select('sum(store.store_qty) AS store_qty,unbooking');
        $this->db->join('ic_proj_warehouse', 'ic_proj_warehouse.whcode = store.wh', 'left outer');
        $this->db->where('store_project', $projid);
        $this->db->where('project_id',$projid);
        $this->db->where('store_matcode',$matcode);
        $this->db->where('store.compcode',$compcode);
        $this->db->group_by("store.store_matcode");
        $query = $this->db->get('store');
        $res = $query->result();
        return $res;
      }

      public function list_booking_m($project_id){
        
        $session_data = $this->session->userdata('sessed_in');
        $compcode = $session_data['compcode'];
        $where = "(ic_booking.type_ic='transfer_pr' or ic_booking.type_ic='transfer')";
        $where_status = "(ic_booking.status='wait' or ic_booking.status='wait')";
        $this->db->select('*');
        $this->db->join('project', 'project.project_id = ic_booking.to_project');
        $this->db->where('from_project', $project_id);
        $this->db->where($where);
        $this->db->where($where_status);
        $this->db->where('approve', 'approve');
        $this->db->where('ic_booking.compcode',$compcode);
        $query = $this->db->get('ic_booking');
        $res = $query->result();
        return $res;


      }


      public function list_booking_itme_m($booking_no){
        
        $session_data = $this->session->userdata('sessed_in');
        $compcode = $session_data['compcode'];
        $this->db->select('*');
        $this->db->where('ref_codetransfer', $booking_no);
        $this->db->where('compcode',$compcode);
        $query = $this->db->get('ic_bookingitem');
        $res = $query->result();
        return $res;


      }

      public function getdata_project($compcode)
      {
          $this->db->select('project_id,project_code,project_name');
          $this->db->from('project');
          $this->db->where('project_department',"1");
          $res = $this->db->get()->result();
          return $res;
      }

      function materialdash($compcode)
      {
        $this->db->select('*');
        $this->db->select('SUM(store_qty) as store_sum');
        $this->db->from('store');
        $this->db->join('project','project.project_id = store.store_project','left outer');
        $this->db->where('store.compcode',$compcode);
        $this->db->group_by('store_matcode');
        $data_store = $this->db->get()->result();
        return $data_store;
      }
      function materialdashlow($compcode)
      {
        $this->db->select('*');
        $this->db->select('SUM(store_qty) as store_sum');
        $this->db->from('store');
        $this->db->join('project','project.project_id = store.store_project','left outer');
        $this->db->where('store.compcode',$compcode);
        $this->db->group_by('store_matcode,store_project');
        $data_store = $this->db->get()->result();
        return $data_store;
      }

      public function upd_setup_min_per($minper,$compcode)
      {
        $data = array('min_ic_per'=>$minper);
        $this->db->where('sys_code',$compcode);
        $q = $this->db->update('syscode',$data);
        return $q;
      }

      public function mat_min_per($compcode)
      {
         $this->db->select('min_ic_per');
          $this->db->where('sys_code',$compcode);
          $query_min_ic = $this->db->get('syscode')->result();
          $data['min_per'] = $query_min_ic[0]->min_ic_per;
          return $data;
      }

      public function getallpraprrove5($projidc){
        $this->db->select('*');
        $this->db->from('ic_booking');
        $this->db->join('project', 'project.project_id = ic_booking.from_project','left outer');
        // $this->db->join('department','department.department_id = ic_booking.pr_department','left outer');
        $this->db->where('from_project',$projidc);
        $this->db->where('approve','approve');
        $this->db->order_by('approveedate','desc');
        $this->db->limit('100');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
      }
    public function getallprwait5($projid){
      $this->db->select('*');
      $this->db->from('ic_booking');
      $this->db->join('project', 'project.project_id = ic_booking.from_project','left outer');
      // $this->db->join('department','department.department_id = ic_booking.pr_department','left outer');
      $this->db->where('from_project',$projid);
      $this->db->where('approve','wait');
      $this->db->order_by('id','desc');
      $this->db->limit('10');
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function getallprdirectorwait5w($projid)
     {
       $this->db->select('*');
       $this->db->from('ic_booking');
       $this->db->join('project', 'project.project_id = ic_booking.from_project','left outer');
      //  $this->db->join('department','department.department_id = ic_booking.pr_department','left outer');
       $this->db->where('from_project',$projid);
       $this->db->where('approve !=','approve');
       $this->db->where('approve !=','disapprove');
       $this->db->order_by('id','desc');
       $this->db->limit('10');
       $query = $this->db->get();
       $res = $query->result();
       return $res;
     }

     public function getallprpmaprrove5($projid)
     {
       $this->db->select('*');
       $this->db->from('pr');
       $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
       $this->db->join('department','department.department_id = pr.pr_department','left outer');
       $this->db->where('pr_project',$projid);
       $this->db->where('pr_approve !=','wait');
       $this->db->order_by('approve_date','desc');
       $this->db->where('po_open','no');
       $this->db->limit('10');
       $query = $this->db->get();
       $res = $query->result();
       return $res;
     }
     public function getallprwaitproj($projid)
     {
       $this->db->select('*');
       $this->db->from('pr');
       $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
       $this->db->join('department','department.department_id = pr.pr_department','left outer');
       $this->db->where('pr_project',$projid);
       $this->db->where('pr_approve','wait');
       $this->db->where('po_open','no');
       $query = $this->db->get();
       $res = $query->result();
       return $res;
     }
     public function getprojeactid($id){
       $this->db->select('project_code');
       $this->db->where('project_id',$id);
       $res = $this->db->get('project')->result_array();
       return $res[0]['project_code'];
     }
     public function saveapprovebk($code){
      $this->db->select('*');
      $this->db->from('approve');
      $this->db->where('approve_project',$code);
      $this->db->where('type', "BK");
      $this->db->order_by("approve_sequence", "asc");
      $app_pj = $this->db->get()->result();
      return $app_pj;
     }
     
}