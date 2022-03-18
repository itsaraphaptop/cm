<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class pr_db extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_pr_detail_all($compcode)
    {
    	$this->db->select('*');
        $this->db->from('pr');
        $this->db->join('project','pr.pr_project = project.project_id');
        $this->db->join('system', 'pr.pr_system = system.systemcode');
        $this->db->where('pr.pr_approve','approve');
        $this->db->where('pr.po_open','no');
        $this->db->where('system.compcode',$compcode);
        $this->db->group_by('pr.pr_prno');
        $query = $this->db->get();

        if ($query) {
            $res = $query->result_array();
        }else{
            $res = null;
        }

        return $res;

    }

    public function get_pr_detail_where($arr_data)
    {
    	$this->db->select('*');
        $this->db->from('pr');
        $this->db->join('project','pr.pr_project = project.project_id');
        // $this->db->join('pr_item','pr.pr_prno = pr_item.pri_ref');
        $this->db->where('pr.po_open','no');
        $this->db->where('pr.pr_approve','approve');
        $this->db->where('pr.pr_prno', $arr_data['pr_no']);
        $this->db->or_where('project.project_name', $arr_data['job']);
        // $this->db->like('project.project_name', $arr_data['job'], 'before');
        $query = $this->db->get();

        if ($query) {
            $res = $query->result_array();
            // $res = $this->db->get();
        }else{
            $res = null;
        }

        return $res;
    }

    public function get_detail_pr($pr_no, $dec_no)
    {
        $this->db->select('*');
        $this->db->from('decrement');
        $this->db->join('pr_item', 'pr_item.pri_id = decrement.pr_item_id');
        $this->db->where('decrement.ref_pr', $pr_no);
        $this->db->where('decrement.decrement_no', $dec_no);
        $query = $this->db->get();


        if ($query) {
            $res = $query->result_array();
            // var_dump($res);
        }else{
            $res = null;
        }

        return $res;
    }

    public function check_decrement_no($pr_no)
    {
        $this->db->select('decrement_no');
        $this->db->from('decrement');
        $this->db->order_by('decrement_no', 'desc');
        $this->db->where('ref_pr', $pr_no);
        $this->db->limit(1);
        $query = $this->db->get();
        ///ทำcheck

        if ($query) {

            $res = $query->result_array();

        }else{
            $res = false;
        }

        return $res;
    }

    public function add_decrement($arr_data)
    {
        $query = $this->db->insert_batch('decrement', $arr_data);
        if ($query) {
            $res = true;
        }else{
            $res = false;
        }

        return $res;
    }

    public function history_decrement($pr_id)
    {
        $this->db->select('*');
        $this->db->from('pr_item');
        $this->db->join('decrement','decrement.pr_item_id = pr_item.pri_id');
        // $this->db->order_by('decrement.pr_item_id', 'asc');
        // $this->db->where('decrement.decrement_status', 'show');
        $this->db->where('decrement.ref_pr', $pr_id);
        $query = $this->db->get();

        if ($query) {
            $res = $query->result_array();
        }else{
            $res = null;
        }

        return $res;
    }

    public function update_qty_pr_items($arr_data)
    {
            // echo "<pre>";
            // print_r($arr_data);die();
        $this->db->trans_begin();
        $status = true;
        foreach ($arr_data['qty'] as $key => $value) {
            if ($arr_data['type'] == 'reduce') {
                $data = array(
                    "pri_qty" => $arr_data['return'][$key]
                );
                $this->db->where('pri_id', $arr_data['pr_item_id'][$key]);
                $query = $this->db->update('pr_item', $data);
            }else if ($arr_data['type'] == 'return') {
                
                $data = array(
                    "pri_qty" => $arr_data['return'][$key]
                );
                $this->db->where('pri_id', $arr_data['pr_item_id'][$key]);
                $query = $this->db->update('pr_item', $data);
            }


            if ($query) {
                $status = true;
            }else{
                $status = false;
                break;
            }
        }

        if ($status === true) {
            $this->db->trans_commit();
        }else{
            $this->db->trans_rollback();
        }

        return $status;
    }

    public function get_detail_pr_nohis($pr_no)
    {
        $this->db->select('*');
        $this->db->from('pr_item');
        $this->db->where('pri_ref', $pr_no);
        $query = $this->db->get();

        if ($query) {
            $res = $query->result_array();
        }else{
            $res = null;
        }

        return $res;
    }

    public function check_status_open($pr_id)
    {
        $this->db->select('pri_status');
        $this->db->from('pr_item');
        $this->db->where('pri_ref', $pr_id);
        $query = $this->db->get();

        $res = true;
        if ($query) {

            $data = $query->result_array();
            foreach ($data as $key => $value) {
                if ($value['pri_status'] == 'no') {
                    $res = false;
                    break;
                }
            }
            
        }else{
            $res = false;
        }

        return $res;
    }

    public function update_status_open($pr_id)
    {
        $status = true;
        $data = array(
            'po_open' => 'open',
        );

        $this->db->where('pr_prno', $pr_id);
        $query = $this->db->update('pr', $data);

        if ($query) {
            $res = true;
        }else{
            $res = false;

        }

        return $res;
    }

    public function update_st_item_reduce($arr_data)
    {
        foreach ($arr_data['pri_qty'] as $key => $value) {
            if ($value == 0) {
                $this->db->set('pri_status', 'open');
                $this->db->where('pri_id', $arr_data['pr_item_id'][$key]);
                $query = $this->db->update('pr_item');
                if ($query) {
                    $res = true;
                }else{
                    $res = false;
                }
            }
        }

        return $res;
    }

    public function update_st_item_return($arr_data)
    {
        foreach ($arr_data['decrement'] as $key => $value) {
            if ($value > 0) {
                $this->db->set('pri_status', 'no');
                $this->db->where('pri_id', $arr_data['pr_item_id'][$key]);
                $query = $this->db->update('pr_item');
                if ($query) {
                    $res = true;
                }else{
                    $res = false;
                }
            }
        }
        // die();
        return $res;
    }
}