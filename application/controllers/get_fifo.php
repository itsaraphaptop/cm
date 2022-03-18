<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class get_fifo extends CI_Controller {
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
          // $this->load->view('navtail/base_master/header_v');
          // function DateThai($strDate)
          // {
          //   $strYear = date("Y",strtotime($strDate))+543;
          //   $strMonth= date("n",strtotime($strDate));
          //   $strDay= date("j",strtotime($strDate));
          //   $strHour= date("H",strtotime($strDate));
          //   $strMinute= date("i",strtotime($strDate));
          //   $strSeconds= date("s",strtotime($strDate));
          //   $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
          //   $strMonthThai=$strMonthCut[$strMonth];
          //   return "$strDay $strMonthThai $strYear";
          // }

          $matcode = $this->uri->segment(3);
          $matcodeend = $this->uri->segment(4);
          $projid = $this->uri->segment(5);
          $startdate = $this->uri->segment(6);
          $enddate = $this->uri->segment(7);

        if ($matcode!="0" && $matcodeend!="0") {

            $this->db->select('*');
            $this->db->order_by('stock_date','asc');
            $this->db->where('stock_matcode >=',$matcode);
            $this->db->where('stock_matcode <=',$matcodeend);
            $this->db->where('stock_project',$projid);
             $this->db->where('stock_date >=',$startdate);
            $this->db->where('stock_date <=',$enddate);
            $this->db->order_by('stock_matcode','asc');
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_avg = $query->result();
            echo "BY MATCODE";
           
        }elseif ($matcode!="0" && $matcodeend=="0") {
            $this->db->select('*');
            $this->db->order_by('stock_date','asc');
            $this->db->where('stock_matcode =',$matcode);
             $this->db->where('stock_date >=',$startdate);
            $this->db->where('stock_date <=',$enddate);
            $this->db->order_by('stock_matcode','asc');
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_avg = $query->result();
            echo "ENTER MATCODE";
           
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
            $this->db->select('*');
             $this->db->where('stock_project',$projid);
             $this->db->where('stock_date >=',$startdate);
            $this->db->where('stock_date <=',$enddate);
            $this->db->order_by('stock_matcode','asc');
            $this->db->order_by('stock_date','asc');
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_avg = $query->result();
            echo "ALL IN STOCK BY DATE";
           
          }else{
            $this->db->select('*');
            $this->db->where('stock_date >=',$startdate);
            $this->db->where('stock_date <=',$enddate);
            $this->db->order_by('stock_date','asc');
            $this->db->order_by('stock_matcode','asc');
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_avg = $query->result();
            echo "By LIKE";
              echo $matcode;
            echo $matcodeend;
            echo $projid;
          }

          foreach ($get_avg as $k=> $ke) {
            echo "<h2>".$ke->stock_matcode."-".$ke->stock_matname."</h2>";
            echo "<table class='table table-hover table-bordered table-xxs'>";
            echo "<thead><tr><td class='text-center'>Stock Type</td><td class='text-center'>เลขที่</td><td class='text-center'>Stock Name</td><td class='text-center'>stock Date</td><td class='text-center'>QTY</td><td class='text-center'>Unit Price</td><td class='text-center'>Price</td><td class='text-center'>Total Qty</td><td class='text-center'>Total Price</td><td class='text-center'>AVG</td></tr></thead>";
          $tot = 0;
          $qty = 0;

          $avg = 0;
$priceu=0;

          $qq = $this->db->query("select * from stockcard where stock_matcode='$ke->stock_matcode' and stock_project='".$projid."'");
          $fifo = $qq->result();
          foreach ($fifo as $value) {

            if ($value->stock_type=="issue") {
              // $qid = $this->db->query("select * from stockcard where stock_matcode='$value->stock_matcode' and stock_project='".$projid."'  limit 1")->result();
              // foreach ($qid as $key => $ve) {
              //   $vv = $ve->avg;


                 $price = $value->stock_receive*$value->avg;
              $qty = $qty-$value->stock_receive;
              $tot = $tot-$price;
              $xtot = @($tot/$qty);
                echo "<tbody>
                          <tr>
                            <td><span class='label label-danger'>".$value->stock_type."</span></td>
                            <td>".$value->ref_no."</td>
                            <td>".$value->stock_matname."</td>
                            <td>".$value->stock_date."</td>
                            <td class='text-center'><span class='label label-danger'>-".number_format($value->stock_receive,2)."</span></td>
                            <td class='text-right'>".number_format($value->stock_priceunit,2)."</td>
                            <td class='text-right'>".number_format($value->stock_amount,2)."</td>
                            <td class='text-center'>".number_format($qty,2)."</td>
                            <td class='text-right'>".number_format($value->af_disamt,2)."</td>
                            <td class='text-right'>".number_format($value->avg,2)."</td>
                          </tr>
                      </tbody>";
              // }
             

            }elseif($value->stock_type=="receive"){
               // $price = $value->stock_receive/$value->avg;
               $price = $value->stock_receive*$value->stock_priceunit;
            $qty = $qty+$value->stock_receive;
            $tot = $tot+$price;
             $priceu =  $priceu+$value->stock_priceunit;
            if ($tot==0) {
              $xtot = 0;
            }else{
               $xtot = @($value->stock_disamt/$qty);
              //$xtot = @($priceu/$qty);

            }

              echo "<tr>
                      <td><span class='label label-primary'>".$value->stock_type."</span></td>
                      <td>".$value->ref_no."</td>
                      <td>".$value->stock_matname."</td>
                      <td>".$value->stock_date."</td>
                      <td class='text-center'><span class='label label-primary'>".number_format($value->stock_receive,2)."</span></td>
                      <td class='text-right'>".number_format($value->stock_disamt,2)."</td>
                      <td class='text-right'>".number_format($price,2)."</td>
                      <td class='text-center'>".number_format($qty,2)."</td>
                      <td class='text-right'>".number_format($value->af_disamt,2)."</td>
                      <td class='text-right'>".number_format($value->avg,2)."</td>
                    </tr>";

            //////
            }elseif($value->stock_type=="returnic"){
               // $price = $value->stock_receive/$value->avg;
               $price = $value->stock_receive*$value->stock_priceunit;
            $qty = $qty+$value->stock_receive;
            $tot = $tot+$price;
             $priceu =  $priceu+$value->stock_priceunit;
            if ($tot==0) {
              $xtot = 0;
            }else{
               $xtot = @($value->stock_disamt/$qty);
              //$xtot = @($priceu/$qty);

            }

              echo "<tr>
                      <td><span class='label label-primary'>Return IC Issue</span></td>
                      <td>".$value->ref_no."</td>
                      <td>".$value->stock_matname."</td>
                      <td>".$value->stock_date."</td>
                      <td class='text-center'><span class='label label-primary'>".number_format($value->stock_receive,2)."</span></td>
                      <td class='text-right'>".number_format($value->avg,2)."</td>
                      <td class='text-right'>".number_format($value->stock_amount,2)."</td>
                      <td class='text-center'>".number_format($qty,2)."</td>
                      <td class='text-right'>".number_format($value->af_disamt,2)."</td>
                      <td class='text-right'>".number_format($value->avg,2)."</td>
                    </tr>";

            //////

            }elseif($value->stock_type=="import"){
               // $price = $value->stock_receive/$value->avg;
               $price = $value->stock_receive*$value->stock_priceunit;
            $qty = $qty+$value->stock_receive;
            $tot = $tot+$price;
          // $priceu = $value->stock_priceunit;
            if ($tot==0) {
              $xtot = 0;
            }else{
              $xtot = @($tot/$qty);
              // $xtot = @($priceu/$qty);
            }

              echo "<tr>
                      <td><span class='label label-primary'>".$value->stock_type."</span></td>
                      <td>".$value->ref_no."</td>
                      <td>".$value->stock_matcode."--".$value->stock_matname."</td>
                      <td>".$value->stock_date."</td>
                      <td class='text-center'><span class='label label-primary'>".number_format($value->stock_receive,2)."</span></td>
                      <td class='text-right'>".number_format($value->stock_priceunit,2)."</td>
                      <td class='text-right'>".number_format($price,2)."</td>
                      <td class='text-center'>".number_format($qty,2)."</td>
                      <td class='text-right'>".number_format($tot,2)."</td>
                      <td class='text-right'>".number_format($xtot,2)."</td>
                    </tr>";

            }elseif($value->stock_type=="transfer"){
              $qty = $qty+$value->stock_receive;
              $tot = $tot+$value->stock_amount;
               $xtot = $tot/$qty;
                echo "<tr>
                      <td><span class='label label-primary'>".$value->stock_type."</span></td>
                      <td>".$value->ref_no."</td>
                      <td>".$value->stock_matcode."--".$value->stock_matname."</td>
                      <td>".$value->stock_date."</td>
                      <td class='text-center'><span class='label label-primary'>".number_format($value->stock_receive,2)."</span></td>
                      <td class='text-right'>".number_format($value->stock_priceunit,2)."</td>
                      <td class='text-right'>".number_format($value->stock_amount,2)."</td>
                      <td class='text-center'>".number_format($qty,2)."</td>
                      <td class='text-right'>".number_format($tot,2)."</td>
                      <td class='text-right'>".number_format($xtot,2)."</td>
                    </tr>";
            }elseif($value->stock_type=="keyin"){
              // $price = $value->stock_receive/$value->avg;
                 $price = $value->stock_receive*$value->stock_priceunit;
            $qty = $qty+$value->stock_receive;
            $tot = $tot+$price;
             $priceu =  $priceu+$value->stock_priceunit;
            if ($tot==0) {
              $xtot = 0;
            }else{
               $xtot = @($value->stock_disamt/$qty);
              //$xtot = @($priceu/$qty);

            }

              echo "<tr>
                      <td><span class='label label-primary'>".$value->stock_type."</span></td>
                      <td>".$value->ref_no."</td>
                      <td>".$value->stock_matname."</td>
                      <td>".$value->dodate."</td>
                      <td class='text-center'><span class='label label-primary'>".number_format($value->stock_receive,2)."</span></td>
                      <td class='text-right'>".number_format($value->stock_disamt,2)."</td>
                      <td class='text-right'>".number_format($price,2)."</td>
                      <td class='text-center'>".number_format($qty,2)."</td>
                      <td class='text-right'>".number_format($value->af_disamt,2)."</td>
                      <td class='text-right'>".number_format($value->avg,2)."</td>
                    </tr>";
            }
          }
          echo "</table>";

        }
        // $this->load->view('base/footer_v');
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
}
