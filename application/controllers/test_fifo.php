<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class test_fifo extends CI_Controller {
          public function __construct() {
            parent::__construct();
            $this->load->model('inventory_m');
            $this->load->model('datastore_m');
        }

        public function test()
        {
          $this->load->view('navtail/base_master/header_v');
          function DateThai($strDate)
          {
            $strYear = date("Y",strtotime($strDate))+543;
            $strMonth= date("n",strtotime($strDate));
            $strDay= date("j",strtotime($strDate));
            $strHour= date("H",strtotime($strDate));
            $strMinute= date("i",strtotime($strDate));
            $strSeconds= date("s",strtotime($strDate));
            $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
            $strMonthThai=$strMonthCut[$strMonth];
            return "$strDay $strMonthThai $strYear";
          }

          $matcode = $this->uri->segment(3);
          $matcodeend = $this->uri->segment(4);
          if ($matcode!="" && $matcodeend!="") {
            $this->db->select('*');
            $this->db->order_by('stock_date','asc');
            $this->db->where('stock_matcode >=',$matcode);
            $this->db->where('stock_matcode <=',$matcodeend);
            $this->db->order_by('stock_matcode','asc');
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_fifo = $query->result();
            echo "BETWEEN";
          }elseif ($matcode!=""){
            $this->db->select('*');
            $this->db->order_by('stock_date','asc');
            $this->db->where('stock_matcode',$matcode);
            $this->db->order_by('stock_matcode','asc');
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_fifo = $query->result();
            echo "By Matcode";
          }else{
            $this->db->select('*');
            $this->db->order_by('stock_date','asc');
            $this->db->order_by('stock_matcode','asc');
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_fifo = $query->result();
            echo "Like";
          }

          foreach ($get_fifo as $k=> $ke) {
            echo "<h2>".$ke->stock_matcode."-".$ke->stock_matname."</h2>";
            echo "<table class='table table-hover table-bordered table-xxs'>";
            echo "<thead><tr><td>Stock Type</td><td>Stock Name</td><td>stock Date</td><td>QTY</td><td>Unit Price</td><td>Price</td><td>Total Qty</td><td>Total Price</td></tr></thead>";
          $tot = 0;
          $qty = 0;




          $qq = $this->db->query("select * from stockcard where stock_matcode='$ke->stock_matcode'");
          $fifo = $qq->result();
          foreach ($fifo as $value) {

            if ($value->stock_type=="issue") {
              $qty = $qty-$value->stock_qty;
              $tot = $tot-$value->stock_netamt;
                echo "<tbody><tr><td><span class='label label-danger'>".$value->stock_type."</span></td><td>".$value->stock_matcode."--".$value->stock_matname."</td><td>".DateThai($value->stock_date)."</td><td><span class='label label-danger'>-".$value->stock_qty."</span></td><td>".$value->stock_priceunit."</td><td>-".$value->stock_netamt."</td><td>".$qty."</td><td>".$tot."</td></tr></tbody>";

            }elseif($value->stock_type=="receive"){
            $qty = $qty+$value->stock_qty;
            $tot = $tot+$value->stock_netamt;
              echo "<tr><td><span class='label label-primary'>".$value->stock_type."</span></td><td>".$value->stock_matcode."--".$value->stock_matname."</td><td>".DateThai($value->stock_date)."</td><td><span class='label label-primary'>".$value->stock_qty."</span></td><td>".$value->stock_priceunit."</td><td>".$value->stock_netamt."</td><td>".$qty."</td><td>".$tot."</td></tr>";

            }elseif($value->stock_type=="transfer"){
              $qty = $qty-$value->stock_qty;
              $tot = $tot-$value->stock_netamt;
                echo "<tbody><tr><td><span class='label label-success'>".$value->stock_type."</span></td><td>".$value->stock_matcode."--".$value->stock_matname."</td><td>".DateThai($value->stock_date)."</td><td><span class='label label-success'>-".$value->stock_qty."</span></td><td>".$value->stock_priceunit."</td><td>-".$value->stock_netamt."</td><td>".$qty."</td><td>".$tot."</td></tr></tbody>";
            }

          }
          echo "</table>";

        }
        $this->load->view('base/footer_v');
          // print_r($sumArray);
        }
        function tot()
        {
            $q = $this->db->query("select poi_id,
            poi_qty,
            poi_receivedate,
            sum(poi_qty) over (partition by poi_id order by poi_receivedate) as sum_to_date,
            FROM po_recitem
            order by poi_id, poi_receivedate");
            $res = $q->result();
            foreach ($res as $key => $value) {
              echo $value->sum_to_date;
            }
        }
        public function getpr_json()
        {
          $result = $this->db->get('pr')->result();
          $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($result));
        }
}
