<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class get_qty extends CI_Controller {
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
            $this->db->order_by('dodate','asc');
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
            $this->db->order_by('dodate','asc');
            $this->db->where('stock_matcode >=',$matcode);
            $this->db->where('stock_matcode <=',$matcodeend);
            $this->db->order_by('stock_matcode','asc');
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_fifo = $query->result();
            echo "BETWEEN";
          }elseif ($matcode!="" && $matcodeend=="0" && $projid!=""){
            $this->db->select('*');
            $this->db->order_by('dodate','asc');
            $this->db->where('stock_matcode',$matcode);
            $this->db->where('stock_project',$projid);
            $this->db->order_by('stock_matcode','asc');
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_fifo = $query->result();
            echo "By Matcode && Project ID";
          }elseif($matcode!=""){
            $this->db->select('*');
            $this->db->order_by('dodate','asc');
            $this->db->where('stock_matcode',$matcode);
            $this->db->order_by('stock_matcode','asc');
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_fifo = $query->result();
            echo "By Matcode";
          }else{
            $this->db->select('*');
            $this->db->order_by('dodate','asc');
            $this->db->order_by('stock_matcode','asc');
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_fifo = $query->result();
            echo "Like";
          }

          foreach ($get_fifo as $k=> $ke) {
            echo "<h2>".$ke->stock_matcode."-".$ke->stock_matname."</h2>";
            echo "<table class='table table-hover table-bordered table-xxs'>";
            echo "<thead><tr><td class='text-center'>No</td><td class='text-center'>Ref. No</td><td class='text-center'>Stock Name</td><td class='text-center'>stock Date</td><td class='text-center'>QTY</td><td class='text-center'>Unit Price</td><td class='text-center'>Price</td><td class='text-center'>Total Qty</td><td class='text-center'>Total Price</td></tr></thead>";
          $tot = 0;
          $qty = 0;




          $qq = $this->db->query("select * from stockcard where stock_matcode='$ke->stock_matcode'");
          $fifo = $qq->result();
          foreach ($fifo as $value) {

            if ($value->stock_type=="issue") {
              $qty = $qty-$value->stock_receive;
              $tot = $tot-$value->stock_netamt;
                echo "<tbody><tr><td><span class='label label-danger'>".$value->stock_type."</span></td><td>".$value->ref_no."</td><td>".$value->stock_matcode."--".$value->stock_matname."</td><td>".$value->dodate."</td><td class='text-center'><span class='label label-danger'>-".$value->stock_receive."</span></td><td class='text-right'>".number_format($value->stock_priceunit,2)."</td><td class='text-right'>-".number_format($value->stock_netamt,2)."</td><td class='text-right'>".number_format($qty,2)."</td><td class='text-right'>".number_format($tot,2)."</td></tr></tbody>";

            }elseif($value->stock_type=="receive"){
            $qty = $qty+$value->stock_receive;
            $tot = $tot+$value->stock_netamt;
              echo "<tr><td><span class='label label-primary'>".$value->stock_type."</span></td><td>".$value->ref_no."</td><td>".$value->stock_matcode."--".$value->stock_matname."</td><td>".$value->dodate."</td><td class='text-center'><span class='label label-primary'>".$value->stock_receive."</span></td><td class='text-right'>".number_format($value->stock_priceunit,2)."</td><td class='text-right'>".number_format($value->stock_netamt,2)."</td><td class='text-right'>".number_format($qty,2)."</td><td class='text-right'>".number_format($tot,2)."</td></tr>";

            }elseif($value->stock_type=="transfer"){
              $qty = $qty-$value->stock_receive;
              $tot = $tot-$value->stock_netamt;
                echo "<tbody><tr><td><span class='label label-success'>".$value->stock_type."</span></td><td>".$value->ref_no."</td><td>".$value->stock_matcode."--".$value->stock_matname."</td><td>".$value->dodate."</td><td class='text-center'><span class='label label-success'>-".$value->stock_receive."</span></td><td class='text-right'>".number_format($value->stock_priceunit,2)."</td><td class='text-right'>-".number_format($value->stock_netamt,2)."</td><td class='text-right'>".number_format($qty,2)."</td><td class='text-right'>".number_format($tot,2)."</td></tr></tbody>";
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

            $this->db->select('*');
            $this->db->order_by('dodate','asc');
            $this->db->where('stock_matcode >=',$matcode);
            $this->db->where('stock_matcode <=',$matcodeend);
            $this->db->where('stock_project',$projid);
             $this->db->where('dodate >=',$startdate);
            $this->db->where('dodate <=',$enddate);
            $this->db->order_by('stock_matcode','asc');
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_avg = $query->result();
            echo "BY MATCODE";
           
        }elseif ($matcode!="0" && $matcodeend=="0") {
            $this->db->select('*');
            $this->db->order_by('dodate','asc');
            $this->db->where('stock_matcode =',$matcode);
             $this->db->where('dodate >=',$startdate);
            $this->db->where('dodate <=',$enddate);
            $this->db->order_by('stock_matcode','asc');
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_avg = $query->result();
            echo "ENTER MATCODE";
           
          }elseif ($matcode!="0" && $matcodeend=="0"){
            $this->db->select('*');
            $this->db->order_by('dodate','asc');
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
             $this->db->where('dodate >=',$startdate);
            $this->db->where('dodate <=',$enddate);
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_avg = $query->result();
            echo "Quality";
           
          }else{
            $this->db->select('*');
            $this->db->where('dodate >=',$startdate);
            $this->db->where('dodate <=',$enddate);
            $this->db->order_by('dodate','asc');
            $this->db->order_by('stock_matcode','asc');
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_avg = $query->result();
            echo "By LIKE";
              echo $matcode;
            echo $matcodeend;
            echo $projid;
          }
            echo "<table class='table table-hover table-bordered table-xxs'>";
            echo "<thead><tr><td class='text-center'>No.</td><td class='text-center'>Code</td><td class='text-center'>Material Name</td><td class='text-center'>Unit</td><td class='text-center'>BF Qty</td><td class='text-center'>Receive Qty</td><td class='text-center'>total Receive Qty</td><td class='text-center'>issue qty</td><td class='text-center'>Qty Balance</td></tr></thead>";


           // echo "<table class='table table-hover table-bordered table-xxs'>";
           // echo "<thead><tr><td class='text-center'>No.</td><td class='text-center'>Code</td><td class='text-center'>Material Name</td><td class='text-center'>Unit</td><td class='text-center'>BF Qty</td><td class='text-center'>Receive Qty</td><td class='text-center'>total Receive Qty</td><td class='text-center'>issue qty</td><td class='text-center'>Qty Balance</td><td class='text-center'>Amount Balance</td></tr></thead>";


       $line = 1 ;
          foreach ($get_avg as $k=> $ke) {  


          $tot = 0;
          $qty = 0;

          $avg = 0;


                   

          $a = $this->db->query("select *,SUM(stock_qty)as qty from stockcard where stock_matcode ='$ke->stock_matcode' and stock_type !='tranfer' and stock_type !='issue' and stock_type !='booking' and stock_project ='$ke->stock_project' and dodate < '$startdate' GROUP BY stock_matcode");
          $aa = $a->result();

          $get_receive = $this->db->query("select *,SUM(stock_receive)as receive from stockcard where stock_matcode ='$ke->stock_matcode' and stock_type !='tranfer' and stock_type !='issue' and stock_type !='booking'  and stock_project ='$ke->stock_project' and dodate >= '$startdate' and dodate <= '$enddate' GROUP BY stock_matcode");
$get_receive_tb = $get_receive->result();
   
$get_issue = $this->db->query("select *,SUM(stock_qty)as qtyis from stockcard where stock_matcode ='$ke->stock_matcode' and stock_type ='issue' and stock_project ='$ke->stock_project' and dodate >= '$startdate' and dodate <= '$enddate' GROUP BY stock_matcode");
$get_issue_tb = $get_issue->result();

$qtyzero = 0 ;

              echo "<tbody>
                          <tr>
                            <td>".$line."</td>
                            <td>".$ke->stock_matcode."</td>
                            <td>".$ke->stock_matname."</td>
                            <td class='text-center'>".$ke->stock_unit."</td>";
echo " <td class='text-right'>";
$a1=0 ;
foreach ($aa as $b => $bb) {
  $a1 = $bb->qty ;
echo $bb->qty;
echo "<input type='hidden' name='' value='".$a1."' class='a1' id='trq".$ke->stock_matcode."[".$line."]'>";
echo "<script>
   calculateSum();
function calculateSum() { 
   var sum = 0; 
    $('.a1').each(function() { 
        if (!isNaN(this.value) && this.value.length != 0) { 
            sum += parseFloat(this.value); 
            $(this).css('background-color', '#FEFFB0'); 
        } 
        else if (this.value.length != 0){ 
            $(this).css('background-color', 'red'); 
        } 
    }); 
 $('input#sum5').val(sum.toFixed(2)); 
}

 </script>";


 }
echo " -" ;                      
echo "</td>";

echo " <td class='text-right'>";
$b1 = 0 ;
foreach ($get_receive_tb as $z => $zz) {
  $b1 = $zz->receive ;

echo $zz->receive;

echo "<input type='hidden' name='' value='".$b1."' class='b1' id='b1".$ke->stock_matcode."[".$line."]'>";
echo "<script>
   calculateSum();
function calculateSum() { 
   var sum = 0; 
    $('.b1').each(function() { 
        if (!isNaN(this.value) && this.value.length != 0) { 
            sum += parseFloat(this.value); 
            $(this).css('background-color', '#FEFFB0'); 
        } 
        else if (this.value.length != 0){ 
            $(this).css('background-color', 'red'); 
        } 
    }); 
 $('input#sum4').val(sum.toFixed(2)); 
}

 </script>";
}
echo " -" ;                       
echo "</td>";

echo "<td class='text-right'>";
$trq=$a1+$b1;
echo $a1+$b1 ;
echo "</td>";
echo "<input type='hidden' name='' value='".$trq."' class='trq' id='b1".$ke->stock_matcode."[".$line."]'>";
echo "<script>
   calculateSum();
function calculateSum() { 
   var sum = 0; 
    $('.trq').each(function() { 
        if (!isNaN(this.value) && this.value.length != 0) { 
            sum += parseFloat(this.value); 
            $(this).css('background-color', '#FEFFB0'); 
        } 
        else if (this.value.length != 0){ 
            $(this).css('background-color', 'red'); 
        } 
    }); 
 $('input#sum3').val(sum.toFixed(2)); 
}

 </script>";
echo " <td class='text-right'>";
$qtyb = 0 ;
foreach ($get_issue_tb as $c => $cc) {
  $qtyb = $cc->stock_qty ;
echo $cc->stock_qty ;
echo "<input type='hidden' name='' value='".$qtyb."' class='qtyb' id='qtyb".$ke->stock_matcode."[".$line."]'>";
echo "<script>
   calculateSum();
function calculateSum() { 
   var sum = 0; 
    $('.qtyb').each(function() { 
        if (!isNaN(this.value) && this.value.length != 0) { 
            sum += parseFloat(this.value); 
            $(this).css('background-color', '#FEFFB0'); 
        } 
        else if (this.value.length != 0){ 
            $(this).css('background-color', 'red'); 
        } 
    }); 
 $('input#sum2').val(sum.toFixed(2)); 
}

 </script>";
}
echo " -";
echo "</td>";
echo "<td class='text-right'>";
$qttt = $trq-$qtyb ;
echo $trq-$qtyb ;
echo "<input type='hidden' name='' value='".$qttt."' class='qttt' id='qttt".$ke->stock_matcode."[".$line."]'>";
echo "<script>
   calculateSum();
function calculateSum() { 
   var sum = 0; 
    $('.qttt').each(function() { 
        if (!isNaN(this.value) && this.value.length != 0) { 
            sum += parseFloat(this.value); 
            $(this).css('background-color', '#FEFFB0'); 
        } 
        else if (this.value.length != 0){ 
            $(this).css('background-color', 'red'); 
        } 
    }); 
 $('input#sum1').val(sum.toFixed(2)); 
}

 </script>";
echo "</td>";
 $line = $line+1 ; }

 echo "</tr>
<tr>  
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  ";
 
  

  
  echo "
  <td class='text-right'><input style='color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;   text-align: right;' readonly type='text' name='' value='' id='sum5'></td>
  <td class='text-right'><input style='color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;   text-align: right;' readonly type='text' name='' value='' id='sum4'></td>
  <td class='text-right'><input style='color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;   text-align: right;' readonly type='text' name='' value='' id='sum3'></td>
  <td class='text-right'><input style='color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;   text-align: right;' readonly type='text' name='' value='' id='sum2'></td>
  <td class='text-right' ><input style='color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;   text-align: right;' readonly type='text' name='' value='' id='sum1'></td>";

                            echo "</tr></tbody></table>";
                           
  
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



public function qtyamount()
        {
      

          $matcode = $this->uri->segment(3);
          $matcodeend = $this->uri->segment(4);
          $projid = $this->uri->segment(5);
          $startdate = $this->uri->segment(6);
          $enddate = $this->uri->segment(7);

        if ($matcode!="0" && $matcodeend!="0") {

            $this->db->select('*');
            $this->db->order_by('dodate','asc');
            $this->db->where('stock_matcode >=',$matcode);
            $this->db->where('stock_matcode <=',$matcodeend);
            $this->db->where('stock_project',$projid);
             $this->db->where('dodate >=',$startdate);
            $this->db->where('dodate <=',$enddate);
            $this->db->order_by('stock_matcode','asc');
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_avg = $query->result();
            echo "BY MATCODE";
           
        }elseif ($matcode!="0" && $matcodeend=="0") {
            $this->db->select('*');
            $this->db->order_by('dodate','asc');
            $this->db->where('stock_matcode =',$matcode);
             $this->db->where('dodate >=',$startdate);
            $this->db->where('dodate <=',$enddate);
            $this->db->order_by('stock_matcode','asc');
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_avg = $query->result();
            echo "ENTER MATCODE";
           
          }elseif ($matcode!="0" && $matcodeend=="0"){
            $this->db->select('*');
            $this->db->order_by('dodate','asc');
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
             $this->db->where('dodate >=',$startdate);
            $this->db->where('dodate <=',$enddate);
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_avg = $query->result();
            echo "Quality";
           
          }else{
            $this->db->select('*');
            $this->db->where('dodate >=',$startdate);
            $this->db->where('dodate <=',$enddate);
            $this->db->order_by('dodate','asc');
            $this->db->order_by('stock_matcode','asc');
            $this->db->group_by('stock_matcode');
            $query = $this->db->get('stockcard');
            $get_avg = $query->result();
            echo "By LIKE";
              echo $matcode;
            echo $matcodeend;
            echo $projid;
          }
echo "<table class='table table-hover table-bordered table-xxs'>";
            echo "<thead><tr><td class='text-center'>No.</td><td class='text-center'>Code</td><td class='text-center'>Material Name</td><td class='text-center'>Unit</td><td class='text-center'>BF Qty</td><td class='text-center'>Receive Qty</td><td class='text-center'>Total Receive Qty</td><td class='text-center'>Issue Qty</td><td class='text-center'>Qty Balance</td><td class='text-center'>Amount Balance</td></tr></thead>";
       $line = 1 ;
          foreach ($get_avg as $k=> $ke) {  


          $tot = 0;
          $qty = 0;

          $avg = 0;


                   

          $a = $this->db->query("select *,SUM(stock_qty)as qty from stockcard where stock_matcode ='$ke->stock_matcode' and stock_type !='tranfer' and stock_type !='issue' and stock_type !='booking' and stock_project ='$ke->stock_project' and dodate < '$startdate' GROUP BY stock_matcode");
          $aa = $a->result();


 $totala = $this->db->query("select *,SUM(stock_qty)as qty from stockcard where stock_type !='tranfer' and stock_type !='issue' and stock_type !='booking' and stock_project ='$projid' and dodate < '$startdate' GROUP BY stock_project");
          $totalaa = $totala->result();

          $get_receive = $this->db->query("select *,SUM(stock_receive)as receive from stockcard where stock_matcode ='$ke->stock_matcode' and stock_type !='tranfer' and stock_type !='issue' and stock_type !='booking' and stock_project ='$ke->stock_project' and dodate >= '$startdate' and dodate <= '$enddate' GROUP BY stock_matcode");
$get_receive_tb = $get_receive->result();
   
$get_issue = $this->db->query("select *,SUM(stock_qty)as qtyis from stockcard where stock_matcode ='$ke->stock_matcode' and stock_type ='issue' and stock_project ='$ke->stock_project' and dodate >= '$startdate' and dodate <= '$enddate' GROUP BY stock_matcode");
$get_issue_tb = $get_issue->result();

$qtyzero = 0 ;

 echo "<tbody>
                          <tr>
                            <td>".$line."</td>
                            <td>".$ke->stock_matcode."</td>
                            <td>".$ke->stock_matname."</td>
                            <td class='text-center'>".$ke->stock_unit."</td>";
echo " <td class='text-right'>";
$a1=0 ;
$totalqty = 0;
foreach ($aa as $b => $bb) {
  $a1 = $bb->qty ;
echo number_format($bb->qty,2);
 $totalqty = $totalqty+$bb->qty;
echo "<input type='hidden' name='' value='".$a1."' class='a1' id='a1".$ke->stock_matcode."[".$line."]'>";
echo "<script>
   calculateSum();
function calculateSum() { 
   var sum = 0; 
    $('.a1').each(function() { 
        if (!isNaN(this.value) && this.value.length != 0) { 
            sum += parseFloat(this.value); 
            $(this).css('background-color', '#FEFFB0'); 
        } 
        else if (this.value.length != 0){ 
            $(this).css('background-color', 'red'); 
        } 
    }); 
 $('input#sum6').val(sum.toFixed(2)); 
}

 </script>";

}
echo " -" ;                      
echo "</td>";
echo " <td class='text-right'>";
$b1 = 0 ;
foreach ($get_receive_tb as $z => $zz) {
  $b1 = $zz->receive ;
  $b2 = $b1 ;

echo number_format($zz->receive,2);
$b2=$b2+$b2;
echo "<input type='hidden' name='' value='".$b1."' class='b1' id='qbyb".$ke->stock_matcode."[".$line."]'>";
echo "<script>
   calculateSum();
function calculateSum() { 
   var sum = 0; 
    $('.b1').each(function() { 
        if (!isNaN(this.value) && this.value.length != 0) { 
            sum += parseFloat(this.value); 
            $(this).css('background-color', '#FEFFB0'); 
        } 
        else if (this.value.length != 0){ 
            $(this).css('background-color', 'red'); 
        } 
    }); 
 $('input#sum5').val(sum.toFixed(2)); 
}

 </script>";

}
echo " -" ;                       
echo "</td>";

echo "<td class='text-right'>";
$trq=$a1+$b1;
echo number_format($a1+$b1,2) ;

echo "<input type='hidden' name='' value='".$trq."' class='trq' id='trq".$ke->stock_matcode."[".$line."]'>";
echo "<script>
   calculateSum();
function calculateSum() { 
   var sum = 0; 
    $('.trq').each(function() { 
        if (!isNaN(this.value) && this.value.length != 0) { 
            sum += parseFloat(this.value); 
            $(this).css('background-color', '#FEFFB0'); 
        } 
        else if (this.value.length != 0){ 
            $(this).css('background-color', 'red'); 
        } 
    }); 
 $('input#sum4').val(sum.toFixed(2)); 
}

 </script>";
echo "</td>";




echo " <td class='text-right'>";

$qtyb = 0 ;
foreach ($get_issue_tb as $c => $cc) {
  $qtyb = $cc->qtyis ;
echo number_format($cc->qtyis,2) ;
echo "<input type='hidden' name='' value='".$qtyb."' class='qbyb' id='qbyb".$ke->stock_matcode."[".$line."]'>";
echo "<script>
   calculateSum();
function calculateSum() { 
   var sum = 0; 
    $('.qbyb').each(function() { 
        if (!isNaN(this.value) && this.value.length != 0) { 
            sum += parseFloat(this.value); 
            $(this).css('background-color', '#FEFFB0'); 
        } 
        else if (this.value.length != 0){ 
            $(this).css('background-color', 'red'); 
        } 
    }); 
 $('input#sum3').val(sum.toFixed(2)); 
}

 </script>";



}
echo " -";
echo "</td>";
echo "<td class='text-right'>";
$qb=$trq-$qtyb ;
echo number_format($trq-$qtyb,2) ;

echo "<input type='hidden' name='' value='".$qb."' class='qty' id='qtytotal".$ke->stock_matcode."[".$line."]'>";
echo "<script>
 

   calculateSum();


function calculateSum() { 
   var sum = 0; 
    $('.qty').each(function() { 
 
        if (!isNaN(this.value) && this.value.length != 0) { 
            sum += parseFloat(this.value); 
            $(this).css('background-color', '#FEFFB0'); 
        } 
        else if (this.value.length != 0){ 
            $(this).css('background-color', 'red'); 
        } 
    }); 
 
 $('input#sum2').val(sum.toFixed(2)); 
}

 </script>";



echo "</td>";
echo "<td class='text-right'>";
$amttt = 0 ;
foreach ($get_receive_tb as $g => $gg) {
 $amttt = $gg->stock_priceunit * $qb ;
echo number_format($amttt,2) ;

}
echo " -";
echo "<input type='hidden' name='' value='".$amttt."' class='txt' id='total".$ke->stock_matcode."[".$line."]'>";
echo "</td>";

 $line = $line+1 ;
  
  echo "<script>
 

   calculateSum();


function calculateSum() { 
   var sum = 0; 
    $('.txt').each(function() { 
 
        if (!isNaN(this.value) && this.value.length != 0) { 
            sum += parseFloat(this.value); 
            $(this).css('background-color', '#FEFFB0'); 
        } 
        else if (this.value.length != 0){ 
            $(this).css('background-color', 'red'); 
        } 
    }); 
 
 $('input#sum1').val(sum.toFixed(2)); 
}

 </script>";

}
echo "</tr>
<tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td class='text-right'><input style='color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;   text-align: right;' readonly type='text' name='' value='' id='sum6'>";
 
  

  
  echo "</td>
  <td class='text-right'><input style='color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;   text-align: right;' readonly type='text' name='' value='' id='sum5'></td>
  <td class='text-right'><input style='color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;   text-align: right;' readonly type='text' name='' value='' id='sum4'></td>
  <td class='text-right'><input style='color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;   text-align: right;' readonly type='text' name='' value='' id='sum3'></td>
  <td class='text-right'><input style='color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;   text-align: right;' readonly type='text' name='' value='' id='sum2'></td>
  <td class='text-right' ><input style='color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;   text-align: right;' readonly type='text' name='' value='' id='sum1'></td>";
  echo "</tr></tbody></table>";         
;            
  }
public function qtywaerhouse()
        {
      

          // $matcode = $this->uri->segment(3);
          // $matcodeend = $this->uri->segment(4);
          $projid = $this->uri->segment(3);
          $startdate = $this->uri->segment(4);
          $enddate = $this->uri->segment(5);

          $this->db->select('*');
            
            $this->db->where('project_id =',$projid);
            $query = $this->db->get('ic_proj_warehouse');
            $get_avg = $query->result();
            echo "BY WAREHOUSE";
           
        
         
echo "<table class='table table-hover table-bordered table-xxs'>";
            echo "<thead><tr><td class='text-center'>No.</td><td class='text-center'>Code</td><td class='text-center'>Material Name</td><td class='text-center'>Unit</td><td class='text-center'>BF Qty</td><td class='text-center'>Receive Qty</td><td class='text-center'>total Receive Qty</td><td class='text-center'>issue qty</td><td class='text-center'>Qty Balance</td><td class='text-center'>Amount Balance</td></tr></thead>";
     
          foreach ($get_avg as $k=> $ke) {  

$awh = $this->db->query("select * from store where wh ='$ke->whcode' and store_project='$projid'");
          $aawh = $awh->result();
          

echo "<tr><td colspan='10' class='text-center' style='
    background-color: antiquewhite;
'><b>";
echo $ke->whcode ;
echo "</td></tr></b>";
  $line = 1 ;
  $ttamt = 0 ;
$tto = 0 ;
foreach ($aawh as $kwh => $kewh) {

$bstockcard = $this->db->query("select *,SUM(stock_qty)as qty from stockcard where stock_matcode ='$kewh->store_matcode' and stock_type !='tranfer' and stock_type !='issue' and stock_type !='booking'' and stock_project ='$projid' and dodate < '$startdate' GROUP BY stock_matcode");
          $bbstockcard = $bstockcard->result();
          $get_receivea = $this->db->query("select *,SUM(stock_receive)as receive from stockcard where stock_matcode ='$kewh->store_matcode' and stock_type !='tranfer' and stock_type !='issue' and stock_type !='booking' and stock_project ='$projid' and dodate >= '$startdate' GROUP BY stock_matcode");
$get_receive_tbb = $get_receivea->result();

$get_issue = $this->db->query("select *,SUM(stock_qty)as qtyis from stockcard where stock_matcode ='$kewh->store_matcode' and stock_type ='issue' and stock_project ='$projid' and dodate >= '$startdate' and dodate <= '$enddate' GROUP BY stock_matcode");
$get_issue_tb = $get_issue->result();

$get_whamout = $this->db->query("select * from stockcard where stock_matcode ='$kewh->store_matcode'  and stock_project ='$projid'   GROUP BY stock_matcode");
$get_whamout_qt = $get_whamout->result();

echo "<tr>";
echo "<td>".$line."</td>";
echo "<td>";
  echo $kewh->store_matcode ;
  echo "</td>";
  echo "<td>";
  echo $kewh->store_matname ;
  echo "</td>";
  echo "<td>";
  echo $kewh->store_unit ;
  echo "</td>";
  echo "<td  class='text-right'>";
  $sqty = 0 ;
foreach ($bbstockcard as $kstockcard => $vstockcard) {
  $sqty = $vstockcard->qty;
 echo number_format($vstockcard->qty,2) ;
}
echo "." ;
echo "</td>";
echo "<td  class='text-right'>" ;
$sreceive = 0;
foreach ($get_receive_tbb as $kget_receive_tbb => $vget_receive_tbb) {
  $sreceive = $vget_receive_tbb->stock_qty ;
 echo number_format($vget_receive_tbb->stock_qty,2) ;
}
echo " -";

echo "</td>";
$ans = $sqty+$sreceive ;
echo "</td>";
  echo "<td class='text-right'>";
  echo  $ans;
  echo " -" ;
  echo "</td>";  

echo " <td class='text-right'>";
$qtyb = 0 ;
foreach ($get_issue_tb as $c => $cc) {
  $qtyb = $cc->qtyis ;
echo number_format($cc->qtyis,2) ;
}
$ansbl = $ans-$qtyb;
echo " -";
echo "</td>";
echo "<td class='text-right'>";
echo $ansbl;
echo " -";
echo "</td>";
echo "<td class='text-right' id=''>";

foreach ($get_whamout_qt as $g => $gg) {
  $ttamt =$gg->stock_priceunit * $ansbl ;
echo number_format($ttamt,2);

}

echo " -";
echo "<input type='hidden' name='' value='".$ttamt."' class='sum".$ke->whcode."' id='total".$ke->whcode."[".$line."]'>";
echo "</td>";
  echo "</tr>";

$line = $line + 1 ;}

echo "<tr><td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class='text-right' ><input style='color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;   text-align: right;' readonly type='text' name='' value='' id='sumtt".$ke->whcode."'></td></tr>";
echo "<script>var totalSum = 0;
$('.sum".$ke->whcode."').each(function () {
    totalSum += parseInt(this.value);

});
$('#sumtt".$ke->whcode."').val(totalSum) ;</script>";
     }    
     
  echo "</tbody></table>";                     

}


public function ssbap()
        {
      

          // $matcode = $this->uri->segment(3);
          // $matcodeend = $this->uri->segment(4);
          
          $startdate = $this->uri->segment(3);
          $enddate = $this->uri->segment(4);
          $this->db->select('*'); 
            // $this->db->where('project_id =',$projid);
            $query = $this->db->get('project');
            $get_avg = $query->result();
           
           
        
         
echo "<table class='table table-hover table-bordered table-xxs'>";
            echo "<thead><tr><td class='text-center'>No.</td><td class='text-center'>Project Code</td><td class='text-center'>Project Name</td><td class='text-center'>Amount Balance</td></tr></thead>";
       $line = 1 ;
          foreach ($get_avg as $k=> $ke) {  


$get_whamout = $this->db->query("select *,SUM(stock_priceunit) as spu,SUM(stock_receive) as sr from stockcard where dodate >='".$startdate."' and dodate <='".$enddate."' and stock_project='".$ke->project_id."' and stock_type !='issue' and stock_type !='transfer' GROUP BY stock_project ");
$ss = $get_whamout->result();

$get_whissue = $this->db->query("select *,SUM(stock_priceunit) as spu,SUM(stock_receive) as sr from stockcard where dodate >='".$startdate."' and dodate <='".$enddate."' and stock_project='".$ke->project_id."' and stock_type ='issue' GROUP BY stock_project ");
$iss = $get_whissue->result();
$issuess = 0 ;
$receivess = 0 ;
$anss = 0 ;
foreach ($iss as $valiss) {
 $issuess = $valiss->spu * $valiss->sr ;
}

foreach ($ss as $valss) {
// $anss = ($valss->spu * $valss->sr)-$issuess ;
$receivess = $valss->spu * $valss->sr ;
}
$anss = $receivess - $issuess ;
echo "<tr>";
echo "<td class='text-center'>".$line."</td>";
echo "<td class='text-center'>".$ke->project_code."</td>";
echo "<td class='text-left'>".$ke->project_name."</td>";
echo "<td class='text-right'>";
echo  number_format($anss,2);
echo " -" ;
echo "</td>";
echo "</tr>";

     $line++; }
     
  echo "</tbody></table>";                     




}

public function wh()
        {
      
          $matcode = $this->uri->segment(3);
          $whcode = $this->uri->segment(4);
          $projid = $this->uri->segment(5);
          $startdate = $this->uri->segment(6);
          $enddate = $this->uri->segment(7);

        if ($matcode!="0" and $whcode!="0") {
       echo "BY MAT BY WAREHOUSE ";
        echo $matcode;
        echo $whcode;
        }elseif ($matcode=="0" and $whcode!="0") {
           
         $this->db->select('*');
            $this->db->where('project_id =',$projid);
            $this->db->where('whcode =',$whcode);
            $query = $this->db->get('ic_proj_warehouse');
            $get_avg = $query->result();
           echo "All MAT && By WH ";
           echo $matcode;
           echo "----";
        echo $whcode;
          
           echo "<table class='table table-hover table-bordered table-xxs'>";
           echo "<thead><tr><td class='text-center'>No.</td><td class='text-center'>Code</td><td class='text-center'>Material Name</td><td class='text-center'>Unit</td><td class='text-center'>BF Qty</td><td class='text-center'>Receive Qty</td><td class='text-center'>total Receive Qty</td><td class='text-center'>issue qty</td><td class='text-center'>Qty Balance</td><td class='text-center'>Amount Balance</td></tr></thead>";
     
          foreach ($get_avg as $k=> $ke) {  

          $awh = $this->db->query("select * from store where wh ='$whcode'  and store_project='$projid'");
          $aawh = $awh->result();
          

echo "<tr><td colspan='10' class='text-center' style='
    background-color: antiquewhite;
'><b>";
echo $ke->whcode ;
echo "</td></tr></b>";
  $line = 1 ;
  $ttamt = 0 ;
$tto = 0 ;
foreach ($aawh as $kwh => $kewh) {

$bstockcard = $this->db->query("select *,SUM(stock_qty)as qty from stockcard where stock_matcode ='$kewh->store_matcode' and stock_type !='tranfer' and stock_type !='issue' and stock_type !='booking' and stock_project ='$projid' and dodate < '$startdate' GROUP BY stock_matcode");
          $bbstockcard = $bstockcard->result();
          $get_receivea = $this->db->query("select *,SUM(stock_receive)as receive from stockcard where stock_matcode ='$kewh->store_matcode' and stock_type !='tranfer' and stock_type !='issue' and stock_type !='booking' and stock_project ='$projid' and dodate >= '$startdate' GROUP BY stock_matcode");
$get_receive_tbb = $get_receivea->result();

$get_issue = $this->db->query("select *,SUM(stock_qty)as qtyis from stockcard where stock_matcode ='$kewh->store_matcode' and stock_type ='issue' and stock_project ='$projid' and dodate >= '$startdate' and dodate <= '$enddate' GROUP BY stock_matcode");
$get_issue_tb = $get_issue->result();

$get_whamout = $this->db->query("select * from stockcard where stock_matcode ='$kewh->store_matcode'  and stock_project ='$projid'   GROUP BY stock_matcode");
$get_whamout_qt = $get_whamout->result();

echo "<tr>";
echo "<td>".$line."</td>";
echo "<td>";
  echo $kewh->store_matcode ;
  echo "</td>";
  echo "<td>";
  echo $kewh->store_matname ;
  echo "</td>";
  echo "<td>";
  echo $kewh->store_unit ;
  echo "</td>";
  echo "<td  class='text-right'>";
  $sqty = 0 ;
foreach ($bbstockcard as $kstockcard => $vstockcard) {
  $sqty = $vstockcard->qty;
 echo number_format($vstockcard->qty,2) ;
}
echo "." ;
echo "</td>";
echo "<td  class='text-right'>" ;
$sreceive = 0;
foreach ($get_receive_tbb as $kget_receive_tbb => $vget_receive_tbb) {
  $sreceive = $vget_receive_tbb->stock_qty ;
 echo number_format($vget_receive_tbb->stock_qty,2) ;
}
echo " -";

echo "</td>";
$ans = $sqty+$sreceive ;
echo "</td>";
  echo "<td class='text-right'>";
  echo  $ans;
  echo " -" ;
  echo "</td>";  

echo " <td class='text-right'>";
$qtyb = 0 ;
foreach ($get_issue_tb as $c => $cc) {
  $qtyb = $cc->qtyis ;
echo number_format($cc->qtyis,2) ;
}
$ansbl = $ans-$qtyb;
echo " -";
echo "</td>";
echo "<td class='text-right'>";
echo $ansbl;
echo " -";
echo "</td>";
echo "<td class='text-right' id=''>";

foreach ($get_whamout_qt as $g => $gg) {
  $ttamt =$gg->stock_priceunit * $ansbl ;
echo number_format($ttamt,2);

}

echo " -";
echo "<input type='hidden' name='' value='".$ttamt."' class='sum".$ke->whcode."' id='total".$ke->whcode."[".$line."]'>";
echo "</td>";
  echo "</tr>";

$line = $line + 1 ;}

echo "<tr><td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class='text-right' ><input style='color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;   text-align: right;' readonly type='text' name='' value='' id='sumtt".$ke->whcode."'></td></tr>";
echo "<script>var totalSum = 0;
$('.sum".$ke->whcode."').each(function () {
    totalSum += parseInt(this.value);

});
$('#sumtt".$ke->whcode."').val(totalSum) ;</script>";
     }    
     
  echo "</tbody></table>"; 

         
        
         

// --------------------------------------------------------------------------------------------elseif4-------------------------
          }elseif($matcode!="0" and $whcode=="0"){

            $this->db->select('*');
            $this->db->where('project_id =',$projid);
            $query = $this->db->get('ic_proj_warehouse');
            $get_avg = $query->result();
           echo "By MAT - ALL WH ";
                echo $matcode;
           echo "----";
        echo $whcode;
          
           echo "<table class='table table-hover table-bordered table-xxs'>";
           echo "<thead><tr><td class='text-center'>No.</td><td class='text-center'>Code</td><td class='text-center'>Material Name</td><td class='text-center'>Unit</td><td class='text-center'>BF Qty</td><td class='text-center'>Receive Qty</td><td class='text-center'>total Receive Qty</td><td class='text-center'>issue qty</td><td class='text-center'>Qty Balance</td><td class='text-center'>Amount Balance</td></tr></thead>";
     
          foreach ($get_avg as $k=> $ke) {  

          $awh = $this->db->query("select * from store where wh ='$ke->whcode' and store_matcode='$matcode' and store_project='$projid'");
          $aawh = $awh->result();
          

echo "<tr><td colspan='10' class='text-center' style='
    background-color: antiquewhite;
'><b>";
echo $ke->whcode ;
echo "</td></tr></b>";
  $line = 1 ;
  $ttamt = 0 ;
$tto = 0 ;
foreach ($aawh as $kwh => $kewh) {

$bstockcard = $this->db->query("select *,SUM(stock_qty)as qty from stockcard where stock_matcode ='$kewh->store_matcode' and and stock_type !='tranfer' and stock_type !='issue' and stock_type !='booking' and stock_project ='$projid' and dodate < '$startdate' GROUP BY stock_matcode");
          $bbstockcard = $bstockcard->result();
          $get_receivea = $this->db->query("select *,SUM(stock_receive)as receive from stockcard where stock_matcode ='$kewh->store_matcode' and stock_type !='tranfer' and stock_type !='issue' and stock_type !='booking' and stock_project ='$projid' and dodate >= '$startdate' GROUP BY stock_matcode");
$get_receive_tbb = $get_receivea->result();

$get_issue = $this->db->query("select *,SUM(stock_qty)as qtyis from stockcard where stock_matcode ='$kewh->store_matcode' and stock_type ='issue' and stock_project ='$projid' and dodate >= '$startdate' and dodate <= '$enddate' GROUP BY stock_matcode");
$get_issue_tb = $get_issue->result();

$get_whamout = $this->db->query("select * from stockcard where stock_matcode ='$kewh->store_matcode'  and stock_project ='$projid'   GROUP BY stock_matcode");
$get_whamout_qt = $get_whamout->result();

echo "<tr>";
echo "<td>".$line."</td>";
echo "<td>";
  echo $kewh->store_matcode ;
  echo "</td>";
  echo "<td>";
  echo $kewh->store_matname ;
  echo "</td>";
  echo "<td>";
  echo $kewh->store_unit ;
  echo "</td>";
  echo "<td  class='text-right'>";
  $sqty = 0 ;
foreach ($bbstockcard as $kstockcard => $vstockcard) {
  $sqty = $vstockcard->qty;
 echo number_format($vstockcard->qty,2) ;
}
echo "." ;
echo "</td>";
echo "<td  class='text-right'>" ;
$sreceive = 0;
foreach ($get_receive_tbb as $kget_receive_tbb => $vget_receive_tbb) {
  $sreceive = $vget_receive_tbb->stock_qty ;
 echo number_format($vget_receive_tbb->stock_qty,2) ;
}
echo " -";

echo "</td>";
$ans = $sqty+$sreceive ;
echo "</td>";
  echo "<td class='text-right'>";
  echo  $ans;
  echo " -" ;
  echo "</td>";  

echo " <td class='text-right'>";
$qtyb = 0 ;
foreach ($get_issue_tb as $c => $cc) {
  $qtyb = $cc->qtyis ;
echo number_format($cc->qtyis,2) ;
}
$ansbl = $ans-$qtyb;
echo " -";
echo "</td>";
echo "<td class='text-right'>";
echo $ansbl;
echo " -";
echo "</td>";
echo "<td class='text-right' id=''>";

foreach ($get_whamout_qt as $g => $gg) {
  $ttamt =$gg->stock_priceunit * $ansbl ;
echo number_format($ttamt,2);

}

echo " -";
echo "<input type='hidden' name='' value='".$ttamt."' class='sum".$ke->whcode."' id='total".$ke->whcode."[".$line."]'>";
echo "</td>";
  echo "</tr>";

$line = $line + 1 ;}

echo "<tr><td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class='text-right' ><input style='color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;   text-align: right;' readonly type='text' name='' value='' id='sumtt".$ke->whcode."'></td></tr>";
echo "<script>var totalSum = 0;
$('.sum".$ke->whcode."').each(function () {
    totalSum += parseInt(this.value);

});
$('#sumtt".$ke->whcode."').val(totalSum) ;</script>";
     }    
     
  echo "</tbody></table>"; 

          }



          // --------------------------------------------------------------------------------
        else{
            $this->db->select('*');
            $this->db->where('project_id =',$projid);
            $query = $this->db->get('ic_proj_warehouse');
            $get_avg = $query->result();
            echo "ALL MAT && WH "; 
            echo $matcode;
            echo "-----";
        echo $whcode;     
            echo "<table class='table table-hover table-bordered table-xxs'>";
            echo "<thead><tr><td class='text-center'>No.</td><td class='text-center'>Code</td><td class='text-center'>Material Name</td><td class='text-center'>Unit</td><td class='text-center'>BF Qty</td><td class='text-center'>Receive Qty</td><td class='text-center'>total Receive Qty</td><td class='text-center'>issue qty</td><td class='text-center'>Qty Balance</td><td class='text-center'>Amount Balance</td></tr></thead>";
     
          foreach ($get_avg as $k=> $ke) {  

          $awh = $this->db->query("select * from store where wh ='$ke->whcode' and store_project='$projid'");
          $aawh = $awh->result();
          

echo "<tr><td colspan='10' class='text-center' style='
    background-color: antiquewhite;
'><b>";
echo $ke->whcode ;
echo "</td></tr></b>";
  $line = 1 ;
  $ttamt = 0 ;
$tto = 0 ;
foreach ($aawh as $kwh => $kewh) {

$bstockcard = $this->db->query("select *,SUM(stock_qty)as qty from stockcard where stock_matcode ='$kewh->store_matcode' and stock_type !='tranfer' and stock_type !='issue' and stock_type !='booking' and stock_project ='$projid' and dodate < '$startdate' GROUP BY stock_matcode");
          $bbstockcard = $bstockcard->result();
          $get_receivea = $this->db->query("select *,SUM(stock_receive)as receive from stockcard where stock_matcode ='$kewh->store_matcode' and stock_type !='tranfer' and stock_type !='issue' and stock_type !='booking' and stock_project ='$projid' and dodate >= '$startdate' GROUP BY stock_matcode");
$get_receive_tbb = $get_receivea->result();

$get_issue = $this->db->query("select *,SUM(stock_qty)as qtyis from stockcard where stock_matcode ='$kewh->store_matcode' and stock_type ='issue' and stock_project ='$projid' and dodate >= '$startdate' and dodate <= '$enddate' GROUP BY stock_matcode");
$get_issue_tb = $get_issue->result();

$get_whamout = $this->db->query("select * from stockcard where stock_matcode ='$kewh->store_matcode'  and stock_project ='$projid'   GROUP BY stock_matcode");
$get_whamout_qt = $get_whamout->result();

echo "<tr>";
echo "<td>".$line."</td>";
echo "<td>";
  echo $kewh->store_matcode ;
  echo "</td>";
  echo "<td>";
  echo $kewh->store_matname ;
  echo "</td>";
  echo "<td>";
  echo $kewh->store_unit ;
  echo "</td>";
  echo "<td  class='text-right'>";
  $sqty = 0 ;
foreach ($bbstockcard as $kstockcard => $vstockcard) {
  $sqty = $vstockcard->qty;
 echo number_format($vstockcard->qty,2) ;
}
echo "." ;
echo "</td>";
echo "<td  class='text-right'>" ;
$sreceive = 0;
foreach ($get_receive_tbb as $kget_receive_tbb => $vget_receive_tbb) {
  $sreceive = $vget_receive_tbb->stock_qty ;
 echo number_format($vget_receive_tbb->stock_qty,2) ;
}
echo " -";

echo "</td>";
$ans = $sqty+$sreceive ;
echo "</td>";
  echo "<td class='text-right'>";
  echo  $ans;
  echo " -" ;
  echo "</td>";  

echo " <td class='text-right'>";
$qtyb = 0 ;
foreach ($get_issue_tb as $c => $cc) {
  $qtyb = $cc->qtyis ;
echo number_format($cc->qtyis,2) ;
}
$ansbl = $ans-$qtyb;
echo " -";
echo "</td>";
echo "<td class='text-right'>";
echo $ansbl;
echo " -";
echo "</td>";
echo "<td class='text-right' id=''>";

foreach ($get_whamout_qt as $g => $gg) {
  $ttamt =$gg->stock_priceunit * $ansbl ;
echo number_format($ttamt,2);

}

echo " -";
echo "<input type='hidden' name='' value='".$ttamt."' class='sum".$ke->whcode."' id='total".$ke->whcode."[".$line."]'>";
echo "</td>";
  echo "</tr>";

$line = $line + 1 ;}

echo "<tr><td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class='text-right' ><input style='color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;   text-align: right;' readonly type='text' name='' value='' id='sumtt".$ke->whcode."'></td></tr>";
echo "<script>var totalSum = 0;
$('.sum".$ke->whcode."').each(function () {
    totalSum += parseInt(this.value);

});
$('#sumtt".$ke->whcode."').val(totalSum) ;</script>";
     }    
     
  echo "</tbody></table>"; 
        }   




}
}