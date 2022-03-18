<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class get_stocktranmove extends CI_Controller {
          public function __construct() {
            parent::__construct();
            $this->load->model('inventory_m');
            $this->load->model('datastore_m');
        }

        public function fifo()
        {
          // $this->load->view('navtail/base_master/header_v');
          $matcode = $this->uri->segment(3);
          $matcodeend = $this->uri->segment(4);
          $projid = $this->uri->segment(5);
          $startdate = $this->uri->segment(6);
          $enddate = $this->uri->segment(7);
        if ($matcode!="" && $matcodeend!="" && $projid!="") {
            $this->db->select('*');
            $this->db->order_by('stock_date','asc');
            $this->db->where('stock_matcode >=',$matcode);
            $this->db->where('stock_matcode <=',$matcodeend);
            $this->db->where('stock_project',$projid);
            $this->db->order_by('stock_matcode','asc');
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_fifo = $query->result();
            echo "PROJECT";
        }elseif ($matcode!="" && $matcodeend!="0" && $projid=="") {
            $this->db->select('*');
            $this->db->order_by('stock_date','asc');
            $this->db->where('stock_matcode >=',$matcode);
            $this->db->where('stock_matcode <=',$matcodeend);
            $this->db->order_by('stock_matcode','asc');
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_fifo = $query->result();
            echo "BETWEEN";
          }elseif ($matcode!="" && $matcodeend=="0" && $projid!=""){
            $this->db->select('*');
            $this->db->order_by('stock_date','asc');
            $this->db->where('stock_matcode',$matcode);
            $this->db->where('stock_project',$projid);
            $this->db->order_by('stock_matcode','asc');
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_fifo = $query->result();
            echo "By Matcode && Project ID";
          }elseif($matcode!=""){
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
            echo "<thead><tr><td class='text-center'>Stock Type</td><td class='text-center'>Ref. No</td><td class='text-center'>Stock Name</td><td class='text-center'>stock Date</td><td class='text-center'>QTY</td><td class='text-center'>Unit Price</td><td class='text-center'>Price</td><td class='text-center'>Total Qty</td><td class='text-center'>Total Price</td></tr></thead>";
          $tot = 0;
          $qty = 0;




          $qq = $this->db->query("select * from stockcard where stock_matcode='$ke->stock_matcode'");
          $fifo = $qq->result();
          foreach ($fifo as $value) {

            if ($value->stock_type=="issue") {
              $qty = $qty-$value->stock_receive;
              $tot = $tot-$value->stock_netamt;
                echo "<tbody><tr><td><span class='label label-danger'>".$value->stock_type."</span></td><td>".$value->ref_no."</td><td>".$value->stock_matcode."--".$value->stock_matname."</td><td>".$value->stock_date."</td><td class='text-center'><span class='label label-danger'>-".$value->stock_receive."</span></td><td class='text-right'>".number_format($value->stock_priceunit,2)."</td><td class='text-right'>-".number_format($value->stock_netamt,2)."</td><td class='text-right'>".number_format($qty,2)."</td><td class='text-right'>".number_format($tot,2)."</td></tr></tbody>";

            }elseif($value->stock_type=="receive"){
            $qty = $qty+$value->stock_receive;
            $tot = $tot+$value->stock_netamt;
              echo "<tr><td><span class='label label-primary'>".$value->stock_type."</span></td><td>".$value->ref_no."</td><td>".$value->stock_matcode."--".$value->stock_matname."</td><td>".$value->stock_date."</td><td class='text-center'><span class='label label-primary'>".$value->stock_receive."</span></td><td class='text-right'>".number_format($value->stock_priceunit,2)."</td><td class='text-right'>".number_format($value->stock_netamt,2)."</td><td class='text-right'>".number_format($qty,2)."</td><td class='text-right'>".number_format($tot,2)."</td></tr>";

            }elseif($value->stock_type=="transfer"){
              $qty = $qty-$value->stock_receive;
              $tot = $tot-$value->stock_netamt;
                echo "<tbody><tr><td><span class='label label-success'>".$value->stock_type."</span></td><td>".$value->ref_no."</td><td>".$value->stock_matcode."--".$value->stock_matname."</td><td>".$value->stock_date."</td><td class='text-center'><span class='label label-success'>-".$value->stock_receive."</span></td><td class='text-right'>".number_format($value->stock_priceunit,2)."</td><td class='text-right'>-".number_format($value->stock_netamt,2)."</td><td class='text-right'>".number_format($qty,2)."</td><td class='text-right'>".number_format($tot,2)."</td></tr></tbody>";
            }

          }
          echo "</table>";

        }
        // $this->load->view('base/footer_v');
          // print_r($sumArray);
        }
        public function averrage()
        {
       

          $matcode = $this->uri->segment(3);
          $matcodeend = $this->uri->segment(4);
          $projid = $this->uri->segment(5);
          $startdate = $this->uri->segment(6);
          $enddate = $this->uri->segment(7);

        if ($matcode!="0" && $matcodeend!="0") {

            $qq = $this->db->query("SELECT * FROM stockcard WHERE stock_project='$projid' and stock_matcode between '$matcode' and '$matcodeend'  order by stock_matcode asc ");  
            $get_avg = $qq->result();
            echo "ENTER MATCODE";
            echo $matcode;
            echo "BY MATCODE";
           
        }elseif ($matcode!="0" && $matcodeend=="0") {
           
            $qq = $this->db->query("SELECT * FROM stockcard WHERE stock_matcode='$matcode' and stock_project='$projid'    group by stock_matcode ");  
            $get_avg = $qq->result();
            echo "ENTER MATCODE";
            echo $matcode;
           
          }elseif ($matcode!="0" && $matcodeend=="0"){
            $this->db->select('*');
            $this->db->order_by('stock_date','asc');
            $this->db->where('stock_matcode',$matcode);
            $this->db->where('stock_project',$projid);
            $this->db->order_by('stock_matcode','asc');
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_avg = $query->result();
            echo "By Matcode && Project ID";
             echo $matcode; 
            echo $matcodeend; 
            echo $projid; 
          }elseif($matcode=="0" && $matcodeend=="0"){        
            $qq = $this->db->query("SELECT * FROM stockcard WHERE stock_project='$projid' and stock_type='issue'or stock_type='receive'and stock_project='$projid' group by stock_matcode ");
            $get_avg = $qq->result();
            echo "ALL IN STOCK BY DATE";
           
          }else{
            $this->db->select('*');
            $this->db->where('stock_date >=',$startdate);
            $this->db->where('stock_date <=',$enddate);
            $this->db->order_by('stock_date','asc');
            
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_avg = $query->result();
            echo "By LIKE";
              echo $matcode;
            echo $matcodeend;
            echo $projid;
          }

          $this->db->select('project_name');
          $this->db->from('project');
          $this->db->where('project_id',$projid);
          $q=$this->db->get();
          $res=$q->result();

          foreach ($res as $val) {


           echo "<h2>Report Stock Transaction Movement</h2><h2>Project : ".$val->project_name."-( ".$startdate."  to  ".$enddate." )</h2>";         
           echo "<table class='table table-hover table-bordered table-xxs'><tr><td class='text-center'>Material Code</td><td class='text-center'>Material Name</td><td class='text-center'>Cost Code</td><td class='text-center'>Unit</td><td class='text-center'>BF</td><td class='text-center'>Receipt</td><td class='text-center'>Total</td><td class='text-center'>issue</td><td class='text-center'>Balance</td><td class='text-center'>BF</td><td class='text-center'>Receipt</td><td class='text-center'>Total</td><td class='text-center'>Issue</td><td class='text-center'>Balance</td></tr>";          
          }
     $a=0; $b=0;     foreach ($get_avg as $k) {
 
 // $qx = $this->db->query("select * from stockcard where stock_project='".$projid."' stock_date BETWEEN '".$startdate."' and '".$enddate."' group by stock_matcode")->result();


            // $rcam = $k->stock_qty*$k->stock_priceunite;
echo "<tr><td>".$k->stock_matcode."</td><td>".$k->stock_matname."</td><td>".$k->stock_costcode."</td><td>".$k->stock_unit."</td>";
                
                $qq = $this->db->query("select * from stockcard where stock_type='receive' and stock_matcode='$k->stock_matcode' and stock_project='".$projid."' group by stock_matcode")->result();
                $totalu=0; $recam=0; $rec=0;  $punitrec=0; $receipt=0;  foreach ($qq as $re) {
               $receipt=$re->stock_qty;
               $punitrec=$re->stock_priceunit;
               $totalu=$receipt;
              $recam = $punitrec*$receipt;
                }
                $qa = $this->db->query("select * from stockcard where stock_type='issue' and stock_matcode='$k->stock_matcode' and stock_project='".$projid."' group by stock_matcode")->result();
               $issueu=0; $punitiss=0;   $issam=0; $Balanceam=0;  foreach  ($qa as $v) { 
             $issueu=$v->stock_qty;
             $punitiss=$v->stock_priceunit;
             $issam=$issueu*$punitiss;                             
                  }
                $a=$receipt-$issueu;
                $b=$recam-$issam;
 echo "<td class='text-center'>bf</td><td class='text-right' >".number_format($receipt,2)."</td><td class='text-right'>".number_format($totalu,2)."</td>";
echo "<td>".number_format($issueu,2)."</td><td class='text-center'>".number_format($a,2)."</td><td class='text-center'>bf</td>";
            echo "<td class='text-right'>".number_format($recam,2)."</td><td class='text-right'>".number_format($recam,2)."</td>";
         
            echo "<td class='text-right'>".number_format($issam,2)."</td>";
            
           echo "<td class='text-right'>".number_format($b,2)."</td>";
   }
echo "</tr>";
           echo "</tbody></table>";
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
}
