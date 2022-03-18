<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class stock_issue extends CI_Controller {
          public function __construct() {
            parent::__construct();
            $this->load->model('inventory_m');
            $this->load->model('datastore_m');
        }

       
       


public function Stock_issue31()
        {
      

          $matcode = $this->uri->segment(3);
          $startdate = $this->uri->segment(4);
          $enddate = $this->uri->segment(5);
          $context = $this->uri->segment(6);
          $projectid = $this->uri->segment(7);

        if ($matcode=="1") {
          if ($context =="0") {
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
             // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('stock_project =',$projectid);
             $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_doccode');

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
           $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
            // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('isi_doccode =',$context);
            $this->db->where('stock_project =',$projectid);
            $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_doccode');
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
            echo "Document No. ";
            echo $context ;
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
            <td class='text-center'>IC Date</td>
            <td class='text-center'>Doc. No</td>
            <td class='text-center'>Entry No.</td>
            <td class='text-center'>Date</td>
            <td class='text-center'>Reference By</td>
            <td class='text-center'>Item</td>
            <td class='text-center'>Issue Qty</td>
            <td class='text-center'>Return Qty</td>
            <td class='text-center'>Balance</td>
            <td class='text-center'>Unit</td> 
            <td class='text-center'>Area</td>
            <td class='text-center'>Code/Name</td>
            <td class='text-center'>WH</td>
            <td class='text-center'>Remark</td>
            <td class='text-center'>Entry By</td>
            </tr>
            </thead></div>";
             
            foreach ($get_issue as $vissue) {
            $get_whamout = $this->db->query("select * from stockcard join po_recitem on stockcard.stock_matcode = po_recitem.poi_matcode  where ref_no ='$vissue->isi_doccode' GROUP BY poi_matcode"  );
            $get_whamout_qt = $get_whamout->result();
            foreach ($get_whamout_qt as $kref_rep) {
              
            $getrt_all_rep = $this->db->query("select * from stockcard where stock_matcode ='$kref_rep->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");

            $getrt_alls_rep = $getrt_all_rep->result();
          }

            echo "<tr>";
            echo "<td>".$vissue->isi_credate."</td>";
            echo "<td>".$vissue->isi_doccode."</td>";
            echo "<td colspan='3'></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td colspan='3'></td>";
            echo "<td></td>";
            echo "<td></td>";
            
            echo "</tr>";


 // echo "<input type='hidden' id='wh' value='".$vissue->isi_wherehouse."'>";
             // 
            $valqty = 0 ;
             foreach ($get_whamout_qt as $kref) {
              $valqty = $kref->stock_qty;
            $getrt_all = $this->db->query("select * from stockcard where stock_matcode ='$kref->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");

            $getrt_alls = $getrt_all->result();

            echo "<tr>";
            echo "<td colspan='2'></td>";  
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->ref_no ;
             }
             echo " ";
            echo "</td>";
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->stock_date ;
             }
             echo " ";
            echo "</td>";
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->useradd ;
             }
             echo " ";
            echo "</td>";
            echo "<td>[".$kref->stock_matcode."]   ".$kref->stock_matname."</td>";
            echo "<td class='text-right'>".number_format($kref->stock_qty,2)."</td>";
            echo "<td class='text-right'>";
            $valrt = 0 ;
            foreach ($getrt_alls as $va_rt) {
            $valrt = $va_rt->stock_qty ;
            echo number_format($va_rt->stock_qty,2) ;
            }
            $valans = $valqty - $valrt ;
            echo "  -";
            echo "</td>";
            echo "<td class='text-right'>".number_format($valans,2)."</td>";
            echo "<td>".$kref->stock_unit."</td>";
            echo "<td colspan='3' >".$kref->ic_warehouse."--".$vissue->isi_wherehouse."</td>";
            echo "<td>".$vissue->isi_remark."</td>";
            echo "<td>".$vissue->isi_user."</td>";
             echo "</tr>";
             }
             }
            
              
            
             
      
            echo "</table>";
          }elseif($matcode=="2"){

             echo $matcode;
              if ($context =="0") {
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
             // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('stock_project =',$projectid);
             $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_doccode','desc');
            $this->db->order_by('isi_user');

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
           $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
            // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('isi_user =',$context);
            $this->db->where('stock_project =',$projectid);
            $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_doccode');
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
            echo "Document No. ";
            echo $context ;
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
            <td class='text-center'>IC Date</td>
            <td class='text-center'>Doc. No</td>
            <td class='text-center'>Entry No.</td>
            <td class='text-center'>Date</td>
            <td class='text-center'>Reference By</td>
            <td class='text-center'>Item</td>
            <td class='text-center'>Issue Qty</td>
            <td class='text-center'>Return Qty</td>
            <td class='text-center'>Balance</td>
            <td class='text-center'>Unit</td> 
            <td class='text-center'>Area</td>
            <td class='text-center'>Code/Name</td>
            <td class='text-center'>WH</td>
            <td class='text-center'>Remark</td>
            <td class='text-center'>Entry By</td>
            </tr>
            </thead></div>";
             
            foreach ($get_issue as $vissue) {
            $get_whamout = $this->db->query("select * from stockcard join po_recitem on stockcard.stock_matcode = po_recitem.poi_matcode  where ref_no ='$vissue->isi_doccode' GROUP BY poi_matcode"  );
            $get_whamout_qt = $get_whamout->result();
            foreach ($get_whamout_qt as $kref_rep) {
              
            $getrt_all_rep = $this->db->query("select * from stockcard where stock_matcode ='$kref_rep->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");

            $getrt_alls_rep = $getrt_all_rep->result();
          }

            echo "<tr>";
            echo "<td>".$vissue->isi_credate."</td>";
            echo "<td>".$vissue->isi_doccode."</td>";
            echo "<td colspan='3'></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td colspan='3'></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "</tr>";


 // echo "<input type='hidden' id='wh' value='".$vissue->isi_wherehouse."'>";
             // 
            $valqty = 0 ;
             foreach ($get_whamout_qt as $kref) {
              $valqty = $kref->stock_qty;
            $getrt_all = $this->db->query("select * from stockcard where stock_matcode ='$kref->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");

            $getrt_alls = $getrt_all->result();

            echo "<tr>";
            echo "<td colspan='2'></td>";  
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->ref_no ;
             }
             echo " ";
            echo "</td>";
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->stock_date ;
             }
             echo " ";
            echo "</td>";
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->useradd ;
             }
             echo " ";
            echo "</td>";
            echo "<td>[".$kref->stock_matcode."]   ".$kref->stock_matname."</td>";
            echo "<td class='text-right'>".number_format($kref->stock_qty,2)."</td>";
            echo "<td class='text-right'>";
            $valrt = 0 ;
            foreach ($getrt_alls as $va_rt) {
            $valrt = $va_rt->stock_qty ;
            echo number_format($va_rt->stock_qty,2) ;
            }
            $valans = $valqty - $valrt ;
            echo "  -";
            echo "</td>";
            echo "<td class='text-right'>".number_format($valans,2)."</td>";
            echo "<td>".$kref->stock_unit."</td>";
            echo "<td colspan='3' >".$kref->ic_warehouse."--".$vissue->isi_wherehouse."</td>";
            echo "<td>".$vissue->isi_remark."</td>";
            echo "<td>".$vissue->isi_user."</td>";
             echo "</tr>";
             }
             }
            
              
            
             
      
            echo "</table>";


           }elseif($matcode=="3"){
             echo $matcode;
         }elseif($matcode=="4"){
             echo $matcode;
         }elseif($matcode=="5"){
             echo $matcode;
      
          if ($context =="0") {
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
             // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('stock_project =',$projectid);
             $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_doccode');
            $this->db->order_by('isi_matcode','asc');
           

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
           $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
            // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('isi_matcode =',$context);
            $this->db->where('stock_project =',$projectid);
            $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_doccode');
           
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
            echo "Document No. ";
            echo $context ;
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
            <td class='text-center'>IC Date</td>
            <td class='text-center'>Doc. No</td>
            <td class='text-center'>Entry No.</td>
            <td class='text-center'>Date</td>
            <td class='text-center'>Reference By</td>
            <td class='text-center'>Item</td>
            <td class='text-center'>Issue Qty</td>
            <td class='text-center'>Return Qty</td>
            <td class='text-center'>Balance</td>
            <td class='text-center'>Unit</td> 
            <td class='text-center'>Area</td>
            <td class='text-center'>Code/Name</td>
            <td class='text-center'>WH</td>
            <td class='text-center'>Remark</td>
            <td class='text-center'>Entry By</td>
            </tr>
            </thead></div>";
             
            foreach ($get_issue as $vissue) {
            $get_whamout = $this->db->query("select * from stockcard join po_recitem on stockcard.stock_matcode = po_recitem.poi_matcode  where ref_no ='$vissue->isi_doccode' GROUP BY poi_matcode"  );
            $get_whamout_qt = $get_whamout->result();
            foreach ($get_whamout_qt as $kref_rep) {
              
            $getrt_all_rep = $this->db->query("select * from stockcard where stock_matcode ='$kref_rep->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");

            $getrt_alls_rep = $getrt_all_rep->result();
          }

            echo "<tr>";
            echo "<td>".$vissue->isi_credate."</td>";
            echo "<td>".$vissue->isi_doccode."</td>";
            echo "<td colspan='3'></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td colspan='3'></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "</tr>";


 // echo "<input type='hidden' id='wh' value='".$vissue->isi_wherehouse."'>";
             // 
            $valqty = 0 ;
             foreach ($get_whamout_qt as $kref) {
              $valqty = $kref->stock_qty;
            $getrt_all = $this->db->query("select * from stockcard where stock_matcode ='$kref->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");

            $getrt_alls = $getrt_all->result();

            echo "<tr>";
            echo "<td colspan='2'></td>";  
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->ref_no ;
             }
             echo " ";
            echo "</td>";
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->stock_date ;
             }
             echo " ";
            echo "</td>";
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->useradd ;
             }
             echo " ";
            echo "</td>";
            echo "<td>[".$kref->stock_matcode."]   ".$kref->stock_matname."</td>";
            echo "<td class='text-right'>".number_format($kref->stock_qty,2)."</td>";
            echo "<td class='text-right'>";
            $valrt = 0 ;
            foreach ($getrt_alls as $va_rt) {
            $valrt = $va_rt->stock_qty ;
            echo number_format($va_rt->stock_qty,2) ;
            }
            $valans = $valqty - $valrt ;
            echo "  -";
            echo "</td>";
            echo "<td class='text-right'>".number_format($valans,2)."</td>";
            echo "<td>".$kref->stock_unit."</td>";
            echo "<td colspan='3' >".$kref->ic_warehouse."--".$vissue->isi_wherehouse."</td>";
            echo "<td>".$vissue->isi_remark."</td>";
            echo "<td>".$vissue->isi_user."</td>";
             echo "</tr>";
             }
             }
            
              
            
             
      
            echo "</table>";

         }elseif($matcode=="6"){
             echo $matcode;
              if ($context =="0") {
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
             // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('stock_project =',$projectid);
             $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_doccode');
            $this->db->order_by('isi_wherehouse','asc');
           

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
           $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
            // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('isi_wherehouse =',$context);
            $this->db->where('stock_project =',$projectid);
            $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_doccode');
           
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
            echo "Document No. ";
            echo $context ;
           echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
            <td class='text-center'>IC Date</td>
            <td class='text-center'>Doc. No</td>
            <td class='text-center'>Entry No.</td>
            <td class='text-center'>Date</td>
            <td class='text-center'>Reference By</td>
            <td class='text-center'>Item</td>
            <td class='text-center'>Issue Qty</td>
            <td class='text-center'>Return Qty</td>
            <td class='text-center'>Balance</td>
            <td class='text-center'>Unit</td> 
            <td class='text-center'>Area</td>
            <td class='text-center'>Code/Name</td>
            <td class='text-center'>WH</td>
            <td class='text-center'>Remark</td>
            <td class='text-center'>Entry By</td>
            </tr>
            </thead></div>";
             
            foreach ($get_issue as $vissue) {
            $get_whamout = $this->db->query("select * from stockcard join po_recitem on stockcard.stock_matcode = po_recitem.poi_matcode  where ref_no ='$vissue->isi_doccode' GROUP BY poi_matcode"  );
            $get_whamout_qt = $get_whamout->result();
            foreach ($get_whamout_qt as $kref_rep) {
              
            $getrt_all_rep = $this->db->query("select * from stockcard where stock_matcode ='$kref_rep->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");

            $getrt_alls_rep = $getrt_all_rep->result();
          }

            echo "<tr>";
            echo "<td>".$vissue->isi_credate."</td>";
            echo "<td>".$vissue->isi_doccode."</td>";
            echo "<td colspan='3'></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td colspan='3'></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "</tr>";


 // echo "<input type='hidden' id='wh' value='".$vissue->isi_wherehouse."'>";
             // 
            $valqty = 0 ;
             foreach ($get_whamout_qt as $kref) {
              $valqty = $kref->stock_qty;
            $getrt_all = $this->db->query("select * from stockcard where stock_matcode ='$kref->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");

            $getrt_alls = $getrt_all->result();

            echo "<tr>";
            echo "<td colspan='2'></td>";  
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->ref_no ;
             }
             echo " ";
            echo "</td>";
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->stock_date ;
             }
             echo " ";
            echo "</td>";
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->useradd ;
             }
             echo " ";
            echo "</td>";
            echo "<td>[".$kref->stock_matcode."]   ".$kref->stock_matname."</td>";
            echo "<td class='text-right'>".number_format($kref->stock_qty,2)."</td>";
            echo "<td class='text-right'>";
            $valrt = 0 ;
            foreach ($getrt_alls as $va_rt) {
            $valrt = $va_rt->stock_qty ;
            echo number_format($va_rt->stock_qty,2) ;
            }
            $valans = $valqty - $valrt ;
            echo "  -";
            echo "</td>";
            echo "<td class='text-right'>".number_format($valans,2)."</td>";
            echo "<td>".$kref->stock_unit."</td>";
            echo "<td colspan='3' >".$kref->ic_warehouse."--".$vissue->isi_wherehouse."</td>";
            echo "<td>".$vissue->isi_remark."</td>";
            echo "<td>".$vissue->isi_user."</td>";
             echo "</tr>";
             }
             }
            
              
            
             
      
            echo "</table>";
         }elseif($matcode=="7"){
             echo $matcode;
         }elseif($matcode=="0"){
             echo $matcode;
         }








}

public function Stock_issueamount31()
        {
      

          $matcode = $this->uri->segment(3);
          $startdate = $this->uri->segment(4);
          $enddate = $this->uri->segment(5);
          $context = $this->uri->segment(6);
          $projectid = $this->uri->segment(7);

        if ($matcode=="1") {
          if ($context =="0") {
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
             // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('stock_project =',$projectid);
             $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_doccode');

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
           $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
            // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('isi_doccode =',$context);
            $this->db->where('stock_project =',$projectid);
            $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_doccode');
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
            echo "Document No. ";
            echo $context ;
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
            <td class='text-center'>IC Date</td>
            <td class='text-center'>Doc. No</td>
            <td class='text-center'>Entry No.</td>
            <td class='text-center'>Date</td>
            <td class='text-center'>Reference By</td>
            <td class='text-center'>Item</td>
            <td class='text-center'>Issue Qty</td>
            <td class='text-center'>Return Qty</td>
            <td class='text-center'>Balance</td>
            <td class='text-center'>Unit</td> 
            <td class='text-center'>Area</td>
            <td class='text-center'>Code/Name</td>
            <td class='text-center'>WH</td>
            <td class='text-center'>Qty</td>
            <td class='text-center'>Cost/Unit</td>
            <td class='text-center'>Amount</td>
            <td class='text-center'>Remark</td>

            </tr>
            </thead>
            </div>";
             
            foreach ($get_issue as $vissue) {
            $get_whamout = $this->db->query("select * from stockcard join po_recitem on stockcard.stock_matcode = po_recitem.poi_matcode  where ref_no ='$vissue->isi_doccode' GROUP BY poi_matcode"  );
            $get_whamout_qt = $get_whamout->result();
            foreach ($get_whamout_qt as $kref_rep) {
              
            $getrt_all_rep = $this->db->query("select * from stockcard where stock_matcode ='$kref_rep->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");

            $getrt_alls_rep = $getrt_all_rep->result();
          }

            echo "<tr>";
            echo "<td>".$vissue->isi_credate."</td>";
            echo "<td>".$vissue->isi_doccode."</td>";
            echo "<td colspan='3'></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td colspan='3'></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "</tr>";


 // echo "<input type='hidden' id='wh' value='".$vissue->isi_wherehouse."'>";
             // 
            $valqty = 0 ;
             foreach ($get_whamout_qt as $kref) {
              $valqty = $kref->stock_qty;
            $getrt_all = $this->db->query("select * from stockcard where stock_matcode ='$kref->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");

            $getrt_alls = $getrt_all->result();

            echo "<tr>";
            echo "<td colspan='2'></td>";  
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->ref_no ;
             }
             echo " ";
            echo "</td>";
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->stock_date ;
             }
             echo " ";
            echo "</td>";
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->useradd ;
             }
             echo " ";
            echo "</td>";
            echo "<td>[".$kref->stock_matcode."]   ".$kref->stock_matname."</td>";
            echo "<td class='text-right'>".number_format($kref->stock_qty,2)."</td>";
            echo "<td class='text-right'>";
            $valrt = 0 ;
            foreach ($getrt_alls as $va_rt) {
            $valrt = $va_rt->stock_qty ;
            echo number_format($va_rt->stock_qty,2) ;
            }
            $valans = $valqty - $valrt ;
            $vpriceunite = $kref->stock_priceunit ;
            echo "  -";
            echo "</td>";
            echo "<td class='text-right'>".number_format($valans,2)."</td>";
            echo "<td>".$kref->stock_unit."</td>";
            echo "<td colspan='3' >".$kref->ic_warehouse."--".$vissue->isi_wherehouse."</td>";
            echo "<td class='text-right'>".number_format($valans,2)."</td>";
            echo "<td class='text-right'>".number_format($vpriceunite,2)."</td>";
            $ansamt = $vpriceunite*$valans;
            echo "<td class='text-right'>".number_format($ansamt,2)."</td>";
            echo "<td>".$vissue->isi_remark."</td>";
            
             echo "</tr>";
             }
             }
            
              
            
             
      
            echo "</table>";
          }elseif($matcode=="2"){

             echo $matcode;
              if ($context =="0") {
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
             // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('stock_project =',$projectid);
             $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_doccode','desc');
            $this->db->order_by('isi_user');

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
           $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
            // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('isi_user =',$context);
            $this->db->where('stock_project =',$projectid);
            $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_doccode');
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
            echo "Document No. ";
            echo $context ;
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
            <td class='text-center'>IC Date</td>
            <td class='text-center'>Doc. No</td>
            <td class='text-center'>Entry No.</td>
            <td class='text-center'>Date</td>
            <td class='text-center'>Reference By</td>
            <td class='text-center'>Item</td>
            <td class='text-center'>Issue Qty</td>
            <td class='text-center'>Return Qty</td>
            <td class='text-center'>Balance</td>
            <td class='text-center'>Unit</td> 
            <td class='text-center'>Area</td>
            <td class='text-center'>Code/Name</td>
            <td class='text-center'>WH</td>
            <td class='text-center'>Qty</td>
            <td class='text-center'>Cost/Unit</td>
            <td class='text-center'>Amount</td>
            <td class='text-center'>Remark</td>

            </tr>
            </thead>
            </div>";
             
            foreach ($get_issue as $vissue) {
            $get_whamout = $this->db->query("select * from stockcard join po_recitem on stockcard.stock_matcode = po_recitem.poi_matcode  where ref_no ='$vissue->isi_doccode' GROUP BY poi_matcode"  );
            $get_whamout_qt = $get_whamout->result();
            foreach ($get_whamout_qt as $kref_rep) {
              
            $getrt_all_rep = $this->db->query("select * from stockcard where stock_matcode ='$kref_rep->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");

            $getrt_alls_rep = $getrt_all_rep->result();
          }

            echo "<tr>";
            echo "<td>".$vissue->isi_credate."</td>";
            echo "<td>".$vissue->isi_doccode."</td>";
            echo "<td colspan='3'></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td colspan='3'></td>";
            echo "<td></td>";
            echo "<td></td>";
             echo "<td></td>";
            echo "<td></td>";
            echo "</tr>";


 // echo "<input type='hidden' id='wh' value='".$vissue->isi_wherehouse."'>";
             // 
            $valqty = 0 ;
             foreach ($get_whamout_qt as $kref) {
              $valqty = $kref->stock_qty;
            $getrt_all = $this->db->query("select * from stockcard where stock_matcode ='$kref->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");

            $getrt_alls = $getrt_all->result();

            echo "<tr>";
            echo "<td colspan='2'></td>";  
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->ref_no ;
             }
             echo " ";
            echo "</td>";
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->stock_date ;
             }
             echo " ";
            echo "</td>";
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->useradd ;
             }
             echo " ";
            echo "</td>";
            echo "<td>[".$kref->stock_matcode."]   ".$kref->stock_matname."</td>";
            echo "<td class='text-right'>".number_format($kref->stock_qty,2)."</td>";
            echo "<td class='text-right'>";
            $valrt = 0 ;
            foreach ($getrt_alls as $va_rt) {
            $valrt = $va_rt->stock_qty ;
            echo number_format($va_rt->stock_qty,2) ;
            }
            $valans = $valqty - $valrt ;
            $vpriceunite = $kref->stock_priceunit ;
            echo "  -";
            echo "</td>";
            echo "<td class='text-right'>".number_format($valans,2)."</td>";
            echo "<td>".$kref->stock_unit."</td>";
            echo "<td colspan='3' >".$kref->ic_warehouse."--".$vissue->isi_wherehouse."</td>";
            echo "<td class='text-right'>".number_format($valans,2)."</td>";
            echo "<td class='text-right'>".number_format($vpriceunite,2)."</td>";
            $ansamt = $vpriceunite*$valans;
            echo "<td class='text-right'>".number_format($ansamt,2)."</td>";
            echo "<td>".$vissue->isi_remark."</td>";
            
             echo "</tr>";
             }
             }
            
              
           
      
            echo "</table>";


           }elseif($matcode=="3"){
             echo $matcode;
         }elseif($matcode=="4"){
             echo $matcode;
         }elseif($matcode=="5"){
             echo $matcode;
      
          if ($context =="0") {
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
             // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('stock_project =',$projectid);
             $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_doccode');
            $this->db->order_by('isi_matcode','asc');
           

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
           $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
            // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('isi_matcode =',$context);
            $this->db->where('stock_project =',$projectid);
            $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_doccode');
           
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
            echo "Document No. ";
            echo $context ;
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
            <td class='text-center'>IC Date</td>
            <td class='text-center'>Doc. No</td>
            <td class='text-center'>Entry No.</td>
            <td class='text-center'>Date</td>
            <td class='text-center'>Reference By</td>
            <td class='text-center'>Item</td>
            <td class='text-center'>Issue Qty</td>
            <td class='text-center'>Return Qty</td>
            <td class='text-center'>Balance</td>
            <td class='text-center'>Unit</td> 
            <td class='text-center'>Area</td>
            <td class='text-center'>Code/Name</td>
            <td class='text-center'>WH</td>
            <td class='text-center'>Qty</td>
            <td class='text-center'>Cost/Unit</td>
            <td class='text-center'>Amount</td>
            <td class='text-center'>Remark</td>

            </tr>
            </thead></div>";
             
            foreach ($get_issue as $vissue) {
            $get_whamout = $this->db->query("select * from stockcard join po_recitem on stockcard.stock_matcode = po_recitem.poi_matcode  where ref_no ='$vissue->isi_doccode' GROUP BY poi_matcode"  );
            $get_whamout_qt = $get_whamout->result();
            foreach ($get_whamout_qt as $kref_rep) {
              
            $getrt_all_rep = $this->db->query("select * from stockcard where stock_matcode ='$kref_rep->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");

            $getrt_alls_rep = $getrt_all_rep->result();
          }

            echo "<tr>";
            echo "<td>".$vissue->isi_credate."</td>";
            echo "<td>".$vissue->isi_doccode."</td>";
            echo "<td colspan='3'></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td colspan='3'></td>";
            echo "<td></td>";
            echo "<td></td>";
             echo "<td></td>";
            echo "<td></td>";
            echo "</tr>";


 // echo "<input type='hidden' id='wh' value='".$vissue->isi_wherehouse."'>";
             // 
            $valqty = 0 ;
             foreach ($get_whamout_qt as $kref) {
              $valqty = $kref->stock_qty;
            $getrt_all = $this->db->query("select * from stockcard where stock_matcode ='$kref->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");

            $getrt_alls = $getrt_all->result();

            echo "<tr>";
            echo "<td colspan='2'></td>";  
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->ref_no ;
             }
             echo " ";
            echo "</td>";
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->stock_date ;
             }
             echo " ";
            echo "</td>";
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->useradd ;
             }
             echo " ";
            echo "</td>";
            echo "<td>[".$kref->stock_matcode."]   ".$kref->stock_matname."</td>";
            echo "<td class='text-right'>".number_format($kref->stock_qty,2)."</td>";
            echo "<td class='text-right'>";
            $valrt = 0 ;
            foreach ($getrt_alls as $va_rt) {
            $valrt = $va_rt->stock_qty ;
            echo number_format($va_rt->stock_qty,2) ;
            }
            $valans = $valqty - $valrt ;
            $vpriceunite = $kref->stock_priceunit ;
            echo "  -";
            echo "</td>";
            echo "<td class='text-right'>".number_format($valans,2)."</td>";
            echo "<td>".$kref->stock_unit."</td>";
            echo "<td colspan='3' >".$kref->ic_warehouse."--".$vissue->isi_wherehouse."</td>";
            echo "<td class='text-right'>".number_format($valans,2)."</td>";
            echo "<td class='text-right'>".number_format($vpriceunite,2)."</td>";
            $ansamt = $vpriceunite*$valans;
            echo "<td class='text-right'>".number_format($ansamt,2)."</td>";
            echo "<td>".$vissue->isi_remark."</td>";
            
             echo "</tr>";
             }
             }
            
              
            
             
      
            echo "</table>";

         }elseif($matcode=="6"){
             echo $matcode;
              if ($context =="0") {
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
             // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('stock_project =',$projectid);
             $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_doccode');
            $this->db->order_by('isi_wherehouse','asc');
           

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
           $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
            // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('isi_wherehouse =',$context);
            $this->db->where('stock_project =',$projectid);
            $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_doccode');
           
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
            echo "Document No. ";
            echo $context ;
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
      

            <td class='text-center'>IC Date</td>
            <td class='text-center'>Doc. No</td>
            <td class='text-center'>Entry No.</td>
            <td class='text-center'>Date</td>
            <td class='text-center'>Reference By</td>
            <td class='text-center'>Item</td>
            <td class='text-center'>Issue Qty</td>
            <td class='text-center'>Return Qty</td>
            <td class='text-center'>Balance</td>
            <td class='text-center'>Unit</td> 
            <td class='text-center'>Area</td>
            <td class='text-center'>Code/Name</td>
            <td class='text-center'>WH</td>
            <td class='text-center'>Qty</td>
            <td class='text-center'>Cost/Unit</td>
            <td class='text-center'>Amount</td>
            <td class='text-center'>Remark</td>
            </tr>
            </thead></div>";
             
            foreach ($get_issue as $vissue) {
            $get_whamout = $this->db->query("select * from stockcard join po_recitem on stockcard.stock_matcode = po_recitem.poi_matcode  where ref_no ='$vissue->isi_doccode' GROUP BY poi_matcode"  );
            $get_whamout_qt = $get_whamout->result();
            foreach ($get_whamout_qt as $kref_rep) {
              
            $getrt_all_rep = $this->db->query("select * from stockcard where stock_matcode ='$kref_rep->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");

            $getrt_alls_rep = $getrt_all_rep->result();
          }

            echo "<tr>";
            echo "<td>".$vissue->isi_credate."</td>";
            echo "<td>".$vissue->isi_doccode."</td>";
            echo "<td colspan='3'></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td colspan='3'></td>";
            echo "<td></td>";
            echo "<td></td>";
             echo "<td></td>";
            echo "<td></td>";
            echo "</tr>";


 // echo "<input type='hidden' id='wh' value='".$vissue->isi_wherehouse."'>";
             // 
            $valqty = 0 ;
             foreach ($get_whamout_qt as $kref) {
              $valqty = $kref->stock_qty;
            $getrt_all = $this->db->query("select * from stockcard where stock_matcode ='$kref->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");

            $getrt_alls = $getrt_all->result();

            echo "<tr>";
            echo "<td colspan='2'></td>";  
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->ref_no ;
             }
             echo " ";
            echo "</td>";
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->stock_date ;
             }
             echo " ";
            echo "</td>";
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->useradd ;
             }
             echo " ";
            echo "</td>";
            echo "<td>[".$kref->stock_matcode."]   ".$kref->stock_matname."</td>";
            echo "<td class='text-right'>".number_format($kref->stock_qty,2)."</td>";
            echo "<td class='text-right'>";
            $valrt = 0 ;
            foreach ($getrt_alls as $va_rt) {
            $valrt = $va_rt->stock_qty ;
            echo number_format($va_rt->stock_qty,2) ;
            }
            $valans = $valqty - $valrt ;
            $vpriceunite = $kref->stock_priceunit ;
            echo "  -";
            echo "</td>";
            echo "<td class='text-right'>".number_format($valans,2)."</td>";
            echo "<td>".$kref->stock_unit."</td>";
            echo "<td colspan='3' >".$kref->ic_warehouse."--".$vissue->isi_wherehouse."</td>";
            echo "<td class='text-right'>".number_format($valans,2)."</td>";
            echo "<td class='text-right'>".number_format($vpriceunite,2)."</td>";
            $ansamt = $vpriceunite*$valans;
            echo "<td class='text-right'>".number_format($ansamt,2)."</td>";
            echo "<td>".$vissue->isi_remark."</td>";
            
             echo "</tr>";
             }
             }
            
              
            
             
      
            echo "</table>";
         }elseif($matcode=="7"){
             echo $matcode;
         }elseif($matcode=="0"){
             echo $matcode;
         }
}
//-------------------------------------------------------------------------------issue area qty--------------------------------------------------------
public function stock_areaqty()
        {
      

          $matcode = $this->uri->segment(3);
          $startdate = $this->uri->segment(4);
          $enddate = $this->uri->segment(5);
          $context = $this->uri->segment(6);
          $projectid = $this->uri->segment(7);

        if ($matcode=="1") {
          if ($context =="0") {
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
             // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('stock_project =',$projectid);
             $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_doccode');

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
           $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
            // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('isi_doccode =',$context);
            $this->db->where('stock_project =',$projectid);
            $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_doccode');
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
            echo "Document No. ";
            echo $context ;
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
                <th class='text-center'>IC Date</th>
                <th class='text-center'>Doc. No</th>
                <th  class='text-center'>Entry No.</th>
                <th  class='text-center'>Date</th>
                <th  class='text-center'>Reference by</th>
                <th  class='text-center'>Material </th>
                <th  class='text-center'>Qty Issue</th>
                <th  class='text-center'>Qty Return</th>
                <th  class='text-center'>Qty Balance</th>
                <th  class='text-center'>Unit</th>
                <th  class='text-center'>WH</th>
                                        
            </tr>
            </thead>
            </div>";
             
            foreach ($get_issue as $vissue) {
            $get_whamout = $this->db->query("select * from stockcard join po_recitem on stockcard.stock_matcode = po_recitem.poi_matcode  where ref_no ='$vissue->isi_doccode' GROUP BY poi_matcode"  );
            $get_whamout_qt = $get_whamout->result();
            foreach ($get_whamout_qt as $kref_rep) {
              
            $getrt_all_rep = $this->db->query("select * from stockcard where stock_matcode ='$kref_rep->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");

            $getrt_alls_rep = $getrt_all_rep->result();
          }

            echo "<tr>";
            echo "<td>".$vissue->isi_credate."</td>";
            echo "<td>".$vissue->isi_doccode."</td>";
            echo "<td colspan='3'></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td colspan='3'></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "</tr>";


 // echo "<input type='hidden' id='wh' value='".$vissue->isi_wherehouse."'>";
             // 
            $valqty = 0 ;
             foreach ($get_whamout_qt as $kref) {
              $valqty = $kref->stock_qty;
            $getrt_all = $this->db->query("select * from stockcard where stock_matcode ='$kref->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");

            $getrt_alls = $getrt_all->result();

            echo "<tr>";
            echo "<td colspan='2'></td>";  
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->ref_no ;
             }
             echo " ";
            echo "</td>";
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->stock_date ;
             }
             echo " ";
            echo "</td>";
            echo "<td class='text-center'>";
            foreach ($getrt_alls as $va_rt) {
            echo $va_rt->useradd ;
             }
             echo " ";
            echo "</td>";
            echo "<td>[".$kref->stock_matcode."]   ".$kref->stock_matname."</td>";
            echo "<td class='text-right'>".number_format($kref->stock_qty,2)."</td>";
            echo "<td class='text-right'>";
            $valrt = 0 ;
            foreach ($getrt_alls as $va_rt) {
            $valrt = $va_rt->stock_qty ;
            echo number_format($va_rt->stock_qty,2) ;
            }
            $valans = $valqty - $valrt ;
            $vpriceunite = $kref->stock_priceunit ;
            echo "  -";
            echo "</td>";
            echo "<td class='text-right'>".number_format($valans,2)."</td>";
            echo "<td>".$kref->stock_unit."</td>";
            echo "<td colspan='3' >".$kref->ic_warehouse."--".$vissue->isi_wherehouse."</td>";
            echo "<td class='text-right'>".number_format($valans,2)."</td>";
            echo "<td class='text-right'>".number_format($vpriceunite,2)."</td>";
            $ansamt = $vpriceunite*$valans;
            echo "<td class='text-right'>".number_format($ansamt,2)."</td>";
            echo "<td>".$vissue->isi_remark."</td>";
            
             echo "</tr>";
             }
             }
            
              
            
             
      
            echo "</table>";
          }elseif($matcode=="2"){

             echo $matcode;
            


           }elseif($matcode=="3"){
             echo $matcode;
         }elseif($matcode=="4"){
             echo $matcode;
         }elseif($matcode=="5"){
             echo $matcode;
      
    
          
         }elseif($matcode=="6"){
             
          
         
          
         }elseif($matcode=="7"){
             echo $matcode;
         }elseif($matcode=="0"){
             echo $matcode;
         }
}


public function IssueREFQTY()
        {
      

          $matcode = $this->uri->segment(3);
          $startdate = $this->uri->segment(4);
          $enddate = $this->uri->segment(5);
          $context = $this->uri->segment(6);
          $projectid = $this->uri->segment(7);

        if ($matcode=="1") {
          if ($context =="0") {
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
             // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('stock_project =',$projectid);
             $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_user');

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
            $this->db->join('member','ic_issue_d.isi_user = member.m_user');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('isi_doccode =',$context);
            $this->db->where('stock_project =',$projectid);
            $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_user');
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
          
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
                <th class='text-center'>IC Date</th>
                <th class='text-center'>Doc. No</th>
                <th  class='text-center'>Entry No.</th>
                <th  class='text-center'>Date</th> 
                <th  class='text-center'>Material </th>
                <th  class='text-center'>Qty Issue</th>
                <th  class='text-center'>Qty Return</th>
                <th  class='text-center'>Qty Balance</th>
                <th  class='text-center'>Area</th>
                <th  class='text-center'>Code/Name</th>
                <th  class='text-center'>WH</th>
                <th  class='text-center'>Remark</th>
                                        
            </tr>
            </thead>
            </div>";
             
            foreach ($get_issue as $vissue) {

            $get_issue_qty_ref = $this->db->query("select * from ic_issue_d where isi_user='$vissue->isi_user' group by isi_doccode");
            $get_issue_qty_ref_s = $get_issue_qty_ref->result();
            // foreach ($get_whamout_qt as $kref_rep) {
           
        

            echo "<tr>";
            echo "<td colspan='12' class='text-left'><b><h1>Reference By : ".$vissue->isi_user."</h1></b></td>";
        
            echo "</tr>";


            
            foreach ($get_issue_qty_ref_s as $vrefqty) {
            $getrt_all_rep = $this->db->query("select * from stockcard where ref_no ='$vrefqty->isi_doccode' and stock_type ='issue'");
            $getrt_alls_rep = $getrt_all_rep->result();


            echo "<tr>";
            echo "<td colspan='2' ><b>".$vrefqty->isi_credate."</b></td>";
            echo "<td class='text-center'><b>".$vrefqty->isi_doccode."</b></td>";

            echo "</tr>";
            $qtyref = 0;
     foreach ($getrt_alls_rep as $vdocno) {
        $qtyref = $vdocno->stock_qty;
            $getrt_all = $this->db->query("select * from stockcard where stock_matcode ='$vdocno->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");
              $getrt_allss = $getrt_all->result();
            echo "<tr>";
            echo "<td colspan='2'></td>";


            echo "<td class='text-center'>";
            
            foreach ($getrt_allss as $kre) {
            echo $kre->ref_no;
                
                
            }
             
                echo "-";
                echo "</td>";


            echo "<td>".$vdocno->stock_date."</td>";
            echo "<td>[".$vdocno->stock_matcode."]-[".$vdocno->stock_matname."</td>";
             echo "<td class='text-right'>".number_format($vdocno->stock_qty,2)."</td>";
            echo "<td class='text-right'>";
            $ansref = 0;
            $ansreftt=0;
            foreach ($getrt_allss as $kre) {
                $ansref = $kre->stock_qty;
                
                echo number_format($ansref,2) ;
            }
            $ansreftt = $qtyref-$ansref; 
                echo "  -";
                echo "</td>";
                echo "<td>".number_format($ansreftt,2)."</td>";
            
            echo "<td colspan='3' >".$vrefqty->isi_wherehouse."-".$vrefqty->isi_whcode."</td>";
            echo "<td>".$vrefqty->isi_remark."</td>";
            echo "</tr>";
            }
        }


         
           
             
             }
            
              
            
             
      
            echo "</table>";
          }elseif($matcode=="2"){

             
            if ($context =="0") {
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
             // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('stock_project =',$projectid);
             $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_user');

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
            $this->db->join('member','ic_issue_d.isi_user = member.m_user');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('isi_user =',$context);
            $this->db->where('stock_project =',$projectid);
            $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_user');
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
  
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
                <th class='text-center'>IC Date</th>
                <th class='text-center'>Doc. No</th>
                <th  class='text-center'>Entry No.</th>
                <th  class='text-center'>Date</th> 
                <th  class='text-center'>Material </th>
                <th  class='text-center'>Qty Issue</th>
                <th  class='text-center'>Qty Return</th>
                <th  class='text-center'>Qty Balance</th>
                <th  class='text-center'>Area</th>
                <th  class='text-center'>Code/Name</th>
                <th  class='text-center'>WH</th>
                <th  class='text-center'>Remark</th>
                                        
            </tr>
            </thead>
            </div>";
             
            foreach ($get_issue as $vissue) {

            $get_issue_qty_ref = $this->db->query("select * from ic_issue_d where isi_user='$vissue->isi_user' group by isi_doccode");
            $get_issue_qty_ref_s = $get_issue_qty_ref->result();
            // foreach ($get_whamout_qt as $kref_rep) {
           
        

            echo "<tr>";
            echo "<td colspan='12' class='text-left'><b><h1>Reference By : ".$vissue->isi_user."</h1></b></td>";
        
            echo "</tr>";


            
            foreach ($get_issue_qty_ref_s as $vrefqty) {
            $getrt_all_rep = $this->db->query("select * from stockcard where ref_no ='$vrefqty->isi_doccode' and stock_type ='issue'");
            $getrt_alls_rep = $getrt_all_rep->result();


            echo "<tr>";
            echo "<td colspan='2' ><b>".$vrefqty->isi_credate."</b></td>";
            echo "<td class='text-center'><b>".$vrefqty->isi_doccode."</b></td>";

            echo "</tr>";
            $qtyref = 0;
     foreach ($getrt_alls_rep as $vdocno) {
        $qtyref = $vdocno->stock_qty;
            $getrt_all = $this->db->query("select * from stockcard where stock_matcode ='$vdocno->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");
              $getrt_allss = $getrt_all->result();
            echo "<tr>";
            echo "<td colspan='2'></td>";
             echo "<td class='text-center'>";
            
            foreach ($getrt_allss as $kre) {
            echo $kre->ref_no;
                
                
            }
             
                echo "-";
                echo "</td>";
            echo "<td>".$vdocno->stock_date."</td>";
            echo "<td>[".$vdocno->stock_matcode."]-[".$vdocno->stock_matname."</td>";
             echo "<td class='text-right'>".number_format($vdocno->stock_qty,2)."</td>";
            echo "<td class='text-right'>";
            $ansref = 0;
            $ansreftt=0;
            foreach ($getrt_allss as $kre) {
                $ansref = $kre->stock_qty;
                
                echo number_format($ansref,2) ;
            }
            $ansreftt = $qtyref-$ansref; 
                echo "  -";
                echo "</td>";
                echo "<td>".number_format($ansreftt,2)."</td>";
            
            echo "<td colspan='3' >".$vrefqty->isi_wherehouse."-".$vrefqty->isi_whcode."</td>";
            echo "<td>".$vrefqty->isi_remark."</td>";
            echo "</tr>";
            }
        }


         
           
             
             }
            
              
            
             
      
            echo "</table>";






           }elseif($matcode=="3"){
             echo $matcode;
         }elseif($matcode=="4"){
             echo $matcode;
         }elseif($matcode=="5"){
             echo $matcode;
            if ($context =="0") {
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
             // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('stock_project =',$projectid);
             $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_user');

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
            $this->db->join('member','ic_issue_d.isi_user = member.m_user');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('isi_matcode =',$context);
            $this->db->where('stock_project =',$projectid);
            $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_user');
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
           
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
                <th class='text-center'>IC Date</th>
                <th class='text-center'>Doc. No</th>
                <th  class='text-center'>Entry No.</th>
                <th  class='text-center'>Date</th> 
                <th  class='text-center'>Material </th>
                <th  class='text-center'>Qty Issue</th>
                <th  class='text-center'>Qty Return</th>
                <th  class='text-center'>Qty Balance</th>
                <th  class='text-center'>Area</th>
                <th  class='text-center'>Code/Name</th>
                <th  class='text-center'>WH</th>
                <th  class='text-center'>Remark</th>
                                        
            </tr>
            </thead>
            </div>";
             
            foreach ($get_issue as $vissue) {

            $get_issue_qty_ref = $this->db->query("select * from ic_issue_d where isi_user='$vissue->isi_user' group by isi_doccode");
            $get_issue_qty_ref_s = $get_issue_qty_ref->result();
            // foreach ($get_whamout_qt as $kref_rep) {
           
        

            echo "<tr>";
            echo "<td colspan='12' class='text-left'><b><h1>Reference By : ".$vissue->isi_user."</h1></b></td>";
        
            echo "</tr>";


            
            foreach ($get_issue_qty_ref_s as $vrefqty) {
            $getrt_all_rep = $this->db->query("select * from stockcard where ref_no ='$vrefqty->isi_doccode' and stock_type ='issue'");
            $getrt_alls_rep = $getrt_all_rep->result();


            echo "<tr>";
            echo "<td colspan='2' ><b>".$vrefqty->isi_credate."</b></td>";
            echo "<td class='text-center'><b>".$vrefqty->isi_doccode."</b></td>";

            echo "</tr>";
            $qtyref = 0;
     foreach ($getrt_alls_rep as $vdocno) {
        $qtyref = $vdocno->stock_qty;
            $getrt_all = $this->db->query("select * from stockcard where stock_matcode ='$vdocno->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");
              $getrt_allss = $getrt_all->result();
            echo "<tr>";
            echo "<td colspan='2'></td>";
            echo "<td class='text-center'>";
            
            foreach ($getrt_allss as $kre) {
            echo $kre->ref_no;
                
                
            }
             
                echo "-";
                echo "</td>";
            echo "<td>".$vdocno->stock_date."</td>";
            echo "<td>[".$vdocno->stock_matcode."]-[".$vdocno->stock_matname."</td>";
             echo "<td class='text-right'>".number_format($vdocno->stock_qty,2)."</td>";
            echo "<td class='text-right'>";
            $ansref = 0;
            $ansreftt=0;
            foreach ($getrt_allss as $kre) {
                $ansref = $kre->stock_qty;
                
                echo number_format($ansref,2) ;
            }
            $ansreftt = $qtyref-$ansref; 
                echo "  -";
                echo "</td>";
                echo "<td>".number_format($ansreftt,2)."</td>";
            
            echo "<td colspan='3' >".$vrefqty->isi_wherehouse."-".$vrefqty->isi_whcode."</td>";
            echo "<td>".$vrefqty->isi_remark."</td>";
            echo "</tr>";
            }
        }


         
           
             
             }
            
              
            
             
      
            echo "</table>";
    
          
         }elseif($matcode=="6"){
             if ($context =="0") {
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
             // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('stock_project =',$projectid);
             $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_user');

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
            $this->db->join('member','ic_issue_d.isi_user = member.m_user');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('isi_wherehouse =',$context);
            $this->db->where('stock_project =',$projectid);
            $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_user');
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
  
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
                <th class='text-center'>IC Date</th>
                <th class='text-center'>Doc. No</th>
                <th  class='text-center'>Entry No.</th>
                <th  class='text-center'>Date</th> 
                <th  class='text-center'>Material </th>
                <th  class='text-center'>Qty Issue</th>
                <th  class='text-center'>Qty Return</th>
                <th  class='text-center'>Qty Balance</th>
                <th  class='text-center'>Area</th>
                <th  class='text-center'>Code/Name</th>
                <th  class='text-center'>WH</th>
                <th  class='text-center'>Remark</th>
                                        
            </tr>
            </thead>
            </div>";
             
            foreach ($get_issue as $vissue) {

            $get_issue_qty_ref = $this->db->query("select * from ic_issue_d where isi_user='$vissue->isi_user' group by isi_doccode");
            $get_issue_qty_ref_s = $get_issue_qty_ref->result();
            // foreach ($get_whamout_qt as $kref_rep) {
           
        

            echo "<tr>";
            echo "<td colspan='12' class='text-left'><b><h1>Reference By : ".$vissue->isi_user."</h1></b></td>";
        
            echo "</tr>";


            
            foreach ($get_issue_qty_ref_s as $vrefqty) {
            $getrt_all_rep = $this->db->query("select * from stockcard where ref_no ='$vrefqty->isi_doccode' and stock_type ='issue'");
            $getrt_alls_rep = $getrt_all_rep->result();


            echo "<tr>";
            echo "<td colspan='2' ><b>".$vrefqty->isi_credate."</b></td>";
            echo "<td class='text-center'><b>".$vrefqty->isi_doccode."</b></td>";

            echo "</tr>";
            $qtyref = 0;
     foreach ($getrt_alls_rep as $vdocno) {
        $qtyref = $vdocno->stock_qty;
            $getrt_all = $this->db->query("select * from stockcard where stock_matcode ='$vdocno->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");
              $getrt_allss = $getrt_all->result();
            echo "<tr>";
            echo "<td colspan='2'></td>";
            echo "<td class='text-center'>";
            
            foreach ($getrt_allss as $kre) {
            echo $kre->ref_no;
                
                
            }
             
                echo "-";
                echo "</td>";
            echo "<td>".$vdocno->stock_date."</td>";
            echo "<td>[".$vdocno->stock_matcode."]-[".$vdocno->stock_matname."</td>";
             echo "<td class='text-right'>".number_format($vdocno->stock_qty,2)."</td>";
            echo "<td class='text-right'>";
            $ansref = 0;
            $ansreftt=0;
            foreach ($getrt_allss as $kre) {
                $ansref = $kre->stock_qty;
                
                echo number_format($ansref,2) ;
            }
            $ansreftt = $qtyref-$ansref; 
                echo "  -";
                echo "</td>";
                echo "<td>".number_format($ansreftt,2)."</td>";
            
            echo "<td colspan='3' >".$vrefqty->isi_wherehouse."-".$vrefqty->isi_whcode."</td>";
            echo "<td>".$vrefqty->isi_remark."</td>";
            echo "</tr>";
            }
        }


         
           
             
             }
            
              
            
             
      
            echo "</table>";

          
         
          
         }elseif($matcode=="7"){
             echo $matcode;
         }elseif($matcode=="0"){
             echo $matcode;
         }

}

public function IssueREFAmt()
        {
      

          $matcode = $this->uri->segment(3);
          $startdate = $this->uri->segment(4);
          $enddate = $this->uri->segment(5);
          $context = $this->uri->segment(6);
          $projectid = $this->uri->segment(7);

        if ($matcode=="1") {
          if ($context =="0") {
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
             // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('stock_project =',$projectid);
             $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_user');

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
            $this->db->join('member','ic_issue_d.isi_user = member.m_user');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('isi_doccode =',$context);
            $this->db->where('stock_project =',$projectid);
            $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_user');
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
          
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
                                            <th class='text-center'>IC Date</th>
                                            <th class='text-center'>Doc. No</th>
                                        <th  class='text-center'>Entry No.</th>
                                        <th  class='text-center'>Date</th>
                                        <th  class='text-center'>Cost Code</th>
                                        <th  class='text-center'>Material</th>
                                        <th  class='text-center'>Qty Issue</th>
                                        <th  class='text-center'>Qty Return</th>
                                        <th  class='text-center'>Qty Balance</th>
                                        <th  class='text-center'>Unit</th>
                                        <th  class='text-center'>Area</th>
                                        <th  class='text-center'>Code/Name</th>
                                        <th  class='text-center'>Qty(Cost)</th>
                                        <th  class='text-center'>Cost/Unit</th>
                                        <th  class='text-center'>Amount</th>
                                        <th  class='text-center'>Remark</th>
                                        </tr>
            </thead>
            </div>";
             
            foreach ($get_issue as $vissue) {

            $get_issue_qty_ref = $this->db->query("select * from ic_issue_d where isi_user='$vissue->isi_user' group by isi_doccode");
            $get_issue_qty_ref_s = $get_issue_qty_ref->result();
            // foreach ($get_whamout_qt as $kref_rep) {
           
        

            echo "<tr>";
            echo "<td colspan='16' class='text-left'><b><h1>Reference By : ".$vissue->isi_user."</h1></b></td>";
        
            echo "</tr>";


            
            foreach ($get_issue_qty_ref_s as $vrefqty) {
            $getrt_all_rep = $this->db->query("select * from stockcard where ref_no ='$vrefqty->isi_doccode' and stock_type ='issue'");
            $getrt_alls_rep = $getrt_all_rep->result();


            echo "<tr>";
            echo "<td colspan='2' ><b>".$vrefqty->isi_credate."</b></td>";

            echo "<td class='text-center'><b>".$vrefqty->isi_doccode."</b></td>";

            echo "</tr>";
            $qtyref = 0;
     foreach ($getrt_alls_rep as $vdocno) {
        $qtyref = $vdocno->stock_qty;
            $getrt_all = $this->db->query("select * from stockcard where stock_matcode ='$vdocno->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");
              $getrt_allss = $getrt_all->result();
            echo "<tr>";
            echo "<td colspan='2'></td>";


            echo "<td class='text-center'>";
            
            foreach ($getrt_allss as $kre) {
            echo $kre->ref_no;
                
                
            }
             
                echo "-";
                echo "</td>";


            echo "<td>".$vdocno->stock_date."</td>";
            echo "<td>".$vdocno->stock_costcode."</td>";
            echo "<td>[".$vdocno->stock_matcode."]-[".$vdocno->stock_matname."</td>";
             echo "<td class='text-right'>".number_format($vdocno->stock_qty,2)."</td>";
            echo "<td class='text-right'>";
            $ansref = 0;
            $ansreftt=0;
            foreach ($getrt_allss as $kre) {
                $ansref = $kre->stock_qty;
                
                echo number_format($ansref,2) ;
            }
            $ansreftt = $qtyref-$ansref; 
                echo "  -";
                echo "</td>";
                echo "<td class='text-right'>".number_format($ansreftt,2)."</td>";
            echo "<td>".$vrefqty->isi_unit."</td>";
            echo "<td colspan='2' class='text-center' >".$vrefqty->isi_wherehouse."-".$vrefqty->isi_whcode."</td>";
            echo "<td>".number_format($ansreftt,2)."</td>";

            
              $amt = $vdocno->stock_priceunit * $ansreftt; 
            echo "<td class='text-right'>".number_format($vdocno->stock_priceunit,2)."</td>";
            echo "<td class='text-right'>".number_format($amt,2)."</td>";
         
            


            echo "<td>".$vrefqty->isi_remark."</td>";
            echo "</tr>";
            }
        }


         
           
             
             }
            
              
            
             
      
            echo "</table>";
          }elseif($matcode=="2"){
            if ($context =="0") {
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
             // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('stock_project =',$projectid);
             $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_user');

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
            $this->db->join('member','ic_issue_d.isi_user = member.m_user');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('isi_user =',$context);
            $this->db->where('stock_project =',$projectid);
            $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_user');
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
          
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
                                            <th class='text-center'>IC Date</th>
                                            <th class='text-center'>Doc. No</th>
                                        <th  class='text-center'>Entry No.</th>
                                        <th  class='text-center'>Date</th>
                                        <th  class='text-center'>Cost Code</th>
                                        <th  class='text-center'>Material</th>
                                        <th  class='text-center'>Qty Issue</th>
                                        <th  class='text-center'>Qty Return</th>
                                        <th  class='text-center'>Qty Balance</th>
                                        <th  class='text-center'>Unit</th>
                                        <th  class='text-center'>Area</th>
                                        <th  class='text-center'>Code/Name</th>
                                        <th  class='text-center'>Qty(Cost)</th>
                                        <th  class='text-center'>Cost/Unit</th>
                                        <th  class='text-center'>Amount</th>
                                        <th  class='text-center'>Remark</th>
                                        </tr>
            </thead>
            </div>";
             
            foreach ($get_issue as $vissue) {

            $get_issue_qty_ref = $this->db->query("select * from ic_issue_d where isi_user='$vissue->isi_user' group by isi_doccode");
            $get_issue_qty_ref_s = $get_issue_qty_ref->result();
            // foreach ($get_whamout_qt as $kref_rep) {
           
        

            echo "<tr>";
            echo "<td colspan='16' class='text-left'><b><h1>Reference By : ".$vissue->isi_user."</h1></b></td>";
        
            echo "</tr>";


            
            foreach ($get_issue_qty_ref_s as $vrefqty) {
            $getrt_all_rep = $this->db->query("select * from stockcard where ref_no ='$vrefqty->isi_doccode' and stock_type ='issue'");
            $getrt_alls_rep = $getrt_all_rep->result();


            echo "<tr>";
            echo "<td colspan='2' ><b>".$vrefqty->isi_credate."</b></td>";

            echo "<td class='text-center'><b>".$vrefqty->isi_doccode."</b></td>";

            echo "</tr>";
            $qtyref = 0;
     foreach ($getrt_alls_rep as $vdocno) {
        $qtyref = $vdocno->stock_qty;
            $getrt_all = $this->db->query("select * from stockcard where stock_matcode ='$vdocno->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");
              $getrt_allss = $getrt_all->result();
            echo "<tr>";
            echo "<td colspan='2'></td>";


            echo "<td class='text-center'>";
            
            foreach ($getrt_allss as $kre) {
            echo $kre->ref_no;
                
                
            }
             
                echo "-";
                echo "</td>";


            echo "<td>".$vdocno->stock_date."</td>";
            echo "<td>".$vdocno->stock_costcode."</td>";
            echo "<td>[".$vdocno->stock_matcode."]-[".$vdocno->stock_matname."</td>";
             echo "<td class='text-right'>".number_format($vdocno->stock_qty,2)."</td>";
            echo "<td class='text-right'>";
            $ansref = 0;
            $ansreftt=0;
            foreach ($getrt_allss as $kre) {
                $ansref = $kre->stock_qty;
                
                echo number_format($ansref,2) ;
            }
            $ansreftt = $qtyref-$ansref; 
                echo "  -";
                echo "</td>";
                echo "<td class='text-right'>".number_format($ansreftt,2)."</td>";
            echo "<td>".$vrefqty->isi_unit."</td>";
            echo "<td colspan='2' class='text-center' >".$vrefqty->isi_wherehouse."-".$vrefqty->isi_whcode."</td>";
            echo "<td>".number_format($ansreftt,2)."</td>";

            
              $amt = $vdocno->stock_priceunit * $ansreftt; 
            echo "<td class='text-right'>".number_format($vdocno->stock_priceunit,2)."</td>";
            echo "<td class='text-right'>".number_format($amt,2)."</td>";
         
            


            echo "<td>".$vrefqty->isi_remark."</td>";
            echo "</tr>";
            }
        }


         
           
             
             }
            
              
            
             
      
            echo "</table>";
           }elseif($matcode=="3"){
             echo $matcode;
         }elseif($matcode=="4"){
             echo $matcode;
         }elseif($matcode=="5"){
             echo $matcode;
            if ($context =="0") {
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
             // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('stock_project =',$projectid);
             $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_user');

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
            $this->db->join('member','ic_issue_d.isi_user = member.m_user');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('isi_matcode =',$context);
            $this->db->where('stock_project =',$projectid);
            $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_user');
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
          
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
                                            <th class='text-center'>IC Date</th>
                                            <th class='text-center'>Doc. No</th>
                                        <th  class='text-center'>Entry No.</th>
                                        <th  class='text-center'>Date</th>
                                        <th  class='text-center'>Cost Code</th>
                                        <th  class='text-center'>Material</th>
                                        <th  class='text-center'>Qty Issue</th>
                                        <th  class='text-center'>Qty Return</th>
                                        <th  class='text-center'>Qty Balance</th>
                                        <th  class='text-center'>Unit</th>
                                        <th  class='text-center'>Area</th>
                                        <th  class='text-center'>Code/Name</th>
                                        <th  class='text-center'>Qty(Cost)</th>
                                        <th  class='text-center'>Cost/Unit</th>
                                        <th  class='text-center'>Amount</th>
                                        <th  class='text-center'>Remark</th>
                                        </tr>
            </thead>
            </div>";
             
            foreach ($get_issue as $vissue) {

            $get_issue_qty_ref = $this->db->query("select * from ic_issue_d where isi_user='$vissue->isi_user' group by isi_doccode");
            $get_issue_qty_ref_s = $get_issue_qty_ref->result();
            // foreach ($get_whamout_qt as $kref_rep) {
           
        

            echo "<tr>";
            echo "<td colspan='16' class='text-left'><b><h1>Reference By : ".$vissue->isi_user."</h1></b></td>";
        
            echo "</tr>";


            
            foreach ($get_issue_qty_ref_s as $vrefqty) {
            $getrt_all_rep = $this->db->query("select * from stockcard where ref_no ='$vrefqty->isi_doccode' and stock_type ='issue'");
            $getrt_alls_rep = $getrt_all_rep->result();


            echo "<tr>";
            echo "<td colspan='2' ><b>".$vrefqty->isi_credate."</b></td>";

            echo "<td class='text-center'><b>".$vrefqty->isi_doccode."</b></td>";

            echo "</tr>";
            $qtyref = 0;
     foreach ($getrt_alls_rep as $vdocno) {
        $qtyref = $vdocno->stock_qty;
            $getrt_all = $this->db->query("select * from stockcard where stock_matcode ='$vdocno->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");
              $getrt_allss = $getrt_all->result();
            echo "<tr>";
            echo "<td colspan='2'></td>";


            echo "<td class='text-center'>";
            
            foreach ($getrt_allss as $kre) {
            echo $kre->ref_no;
                
                
            }
             
                echo "-";
                echo "</td>";


            echo "<td>".$vdocno->stock_date."</td>";
            echo "<td>".$vdocno->stock_costcode."</td>";
            echo "<td>[".$vdocno->stock_matcode."]-[".$vdocno->stock_matname."</td>";
             echo "<td class='text-right'>".number_format($vdocno->stock_qty,2)."</td>";
            echo "<td class='text-right'>";
            $ansref = 0;
            $ansreftt=0;
            foreach ($getrt_allss as $kre) {
                $ansref = $kre->stock_qty;
                
                echo number_format($ansref,2) ;
            }
            $ansreftt = $qtyref-$ansref; 
                echo "  -";
                echo "</td>";
                echo "<td class='text-right'>".number_format($ansreftt,2)."</td>";
            echo "<td>".$vrefqty->isi_unit."</td>";
            echo "<td colspan='2' class='text-center' >".$vrefqty->isi_wherehouse."-".$vrefqty->isi_whcode."</td>";
            echo "<td>".number_format($ansreftt,2)."</td>";

            
              $amt = $vdocno->stock_priceunit * $ansreftt; 
            echo "<td class='text-right'>".number_format($vdocno->stock_priceunit,2)."</td>";
            echo "<td class='text-right'>".number_format($amt,2)."</td>";
         
            


            echo "<td>".$vrefqty->isi_remark."</td>";
            echo "</tr>";
            }
        }


         
           
             
             }
            
              
            
             
      
            echo "</table>";
    
          
         }elseif($matcode=="6"){
             if ($context =="0") {
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
             // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('stock_project =',$projectid);
             $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_user');

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
            $this->db->join('member','ic_issue_d.isi_user = member.m_user');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('isi_wherehouse =',$context);
            $this->db->where('stock_project =',$projectid);
            $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_user');
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
          
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
                                            <th class='text-center'>IC Date</th>
                                            <th class='text-center'>Doc. No</th>
                                        <th  class='text-center'>Entry No.</th>
                                        <th  class='text-center'>Date</th>
                                        <th  class='text-center'>Cost Code</th>
                                        <th  class='text-center'>Material</th>
                                        <th  class='text-center'>Qty Issue</th>
                                        <th  class='text-center'>Qty Return</th>
                                        <th  class='text-center'>Qty Balance</th>
                                        <th  class='text-center'>Unit</th>
                                        <th  class='text-center'>Area</th>
                                        <th  class='text-center'>Code/Name</th>
                                        <th  class='text-center'>Qty(Cost)</th>
                                        <th  class='text-center'>Cost/Unit</th>
                                        <th  class='text-center'>Amount</th>
                                        <th  class='text-center'>Remark</th>
                                        </tr>
            </thead>
            </div>";
             
            foreach ($get_issue as $vissue) {

            $get_issue_qty_ref = $this->db->query("select * from ic_issue_d where isi_user='$vissue->isi_user' group by isi_doccode");
            $get_issue_qty_ref_s = $get_issue_qty_ref->result();
            // foreach ($get_whamout_qt as $kref_rep) {
           
        

            echo "<tr>";
            echo "<td colspan='16' class='text-left'><b><h1>Reference By : ".$vissue->isi_user."</h1></b></td>";
        
            echo "</tr>";


            
            foreach ($get_issue_qty_ref_s as $vrefqty) {
            $getrt_all_rep = $this->db->query("select * from stockcard where ref_no ='$vrefqty->isi_doccode' and stock_type ='issue'");
            $getrt_alls_rep = $getrt_all_rep->result();


            echo "<tr>";
            echo "<td colspan='2' ><b>".$vrefqty->isi_credate."</b></td>";

            echo "<td class='text-center'><b>".$vrefqty->isi_doccode."</b></td>";

            echo "</tr>";
            $qtyref = 0;
     foreach ($getrt_alls_rep as $vdocno) {
        $qtyref = $vdocno->stock_qty;
            $getrt_all = $this->db->query("select * from stockcard where stock_matcode ='$vdocno->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");
              $getrt_allss = $getrt_all->result();
            echo "<tr>";
            echo "<td colspan='2'></td>";


            echo "<td class='text-center'>";
            
            foreach ($getrt_allss as $kre) {
            echo $kre->ref_no;
                
                
            }
             
                echo "-";
                echo "</td>";


            echo "<td>".$vdocno->stock_date."</td>";
            echo "<td>".$vdocno->stock_costcode."</td>";
            echo "<td>[".$vdocno->stock_matcode."]-[".$vdocno->stock_matname."</td>";
             echo "<td class='text-right'>".number_format($vdocno->stock_qty,2)."</td>";
            echo "<td class='text-right'>";
            $ansref = 0;
            $ansreftt=0;
            foreach ($getrt_allss as $kre) {
                $ansref = $kre->stock_qty;
                
                echo number_format($ansref,2) ;
            }
            $ansreftt = $qtyref-$ansref; 
                echo "  -";
                echo "</td>";
                echo "<td class='text-right'>".number_format($ansreftt,2)."</td>";
            echo "<td>".$vrefqty->isi_unit."</td>";
            echo "<td colspan='2' class='text-center' >".$vrefqty->isi_wherehouse."-".$vrefqty->isi_whcode."</td>";
            echo "<td>".number_format($ansreftt,2)."</td>";

            
              $amt = $vdocno->stock_priceunit * $ansreftt; 
            echo "<td class='text-right'>".number_format($vdocno->stock_priceunit,2)."</td>";
            echo "<td class='text-right'>".number_format($amt,2)."</td>";
         
            


            echo "<td>".$vrefqty->isi_remark."</td>";
            echo "</tr>";
            }
        }


         
           
             
             }
            
              
            
             
      
            echo "</table>";
         }elseif($matcode=="7"){
             echo $matcode;
         }elseif($matcode=="0"){
             echo $matcode;
         }

}
public function IssueWHAmt()
        {
      

          $matcode = $this->uri->segment(3);
          $startdate = $this->uri->segment(4);
          $enddate = $this->uri->segment(5);
          $context = $this->uri->segment(6);
          $projectid = $this->uri->segment(7);

        if ($matcode=="1") {
          if ($context =="0") {
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
             // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('stock_project =',$projectid);
             $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_whcode');

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
            // $this->db->join('member','ic_issue_d.isi_user = member.m_user');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('isi_doccode =',$context);
            $this->db->where('stock_project =',$projectid);
            $this->db->where('stock_type =','issue');
            // $this->db->group_by('isi_whcode');
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
          
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
                                        <tr>
                                        <th class='text-center'>IC Date</th>
                                        <th class='text-center'>Doc. No</th>
                                        <th  class='text-center'>Entry No.</th>
                                        <th  class='text-center'>Date</th>
                                        <th  class='text-center'>Referemce By</th>
                                        <th  class='text-center'>Material</th>
                                        <th  class='text-center'>Qty Issue</th>
                                        <th  class='text-center'>Qty Return</th>
                                        <th  class='text-center'>Qty Balance</th>
                                        <th  class='text-center'>Unit</th>
                                       
                                        </tr>
             </tr>
            </thead>
            </div>";
             
            foreach ($get_issue as $vissue) {

            $get_issue_qty_ref = $this->db->query("select * from ic_issue_d where isi_whcode='$vissue->isi_whcode' group by isi_doccode");
            $get_issue_qty_ref_s = $get_issue_qty_ref->result();
            // foreach ($get_whamout_qt as $kref_rep) {
           
        

            echo "<tr>";
            echo "<td colspan='16' class='text-left'><b><h1>Warehouse : ".$vissue->isi_whcode."</h1></b></td>";
        
            echo "</tr>";


            
            foreach ($get_issue_qty_ref_s as $vrefqty) {
            $getrt_all_rep = $this->db->query("select * from stockcard where ref_no ='$vrefqty->isi_doccode' and stock_type ='issue'");
            $getrt_alls_rep = $getrt_all_rep->result();


            echo "<tr>";
            echo "<td colspan='2' ><b>".$vrefqty->isi_credate."</b></td>";

            echo "<td class='text-center'><b>".$vrefqty->isi_doccode."</b></td>";

            echo "</tr>";
            $qtyref = 0;
     foreach ($getrt_alls_rep as $vdocno) {
        $qtyref = $vdocno->stock_qty;
            $getrt_all = $this->db->query("select * from stockcard where stock_matcode ='$vdocno->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");
              $getrt_allss = $getrt_all->result();
            echo "<tr>";
            echo "<td colspan='2'></td>";


            echo "<td class='text-center'>";
            
            foreach ($getrt_allss as $kre) {
            echo $kre->ref_no;
                
                
            }
             
                echo "-";
                echo "</td>";


            echo "<td>".$vdocno->stock_date."</td>";
            echo "<td>".$vdocno->useradd."</td>";
            echo "<td>[".$vdocno->stock_matcode."]-[".$vdocno->stock_matname."</td>";
             echo "<td class='text-right'>".number_format($vdocno->stock_qty,2)."</td>";
            echo "<td class='text-right'>";
            $ansref = 0;
            $ansreftt=0;
            foreach ($getrt_allss as $kre) {
                $ansref = $kre->stock_qty;
                
                echo number_format($ansref,2) ;
            }
            $ansreftt = $qtyref-$ansref; 
                echo " -";
                echo "</td>";
                echo "<td class='text-right'>".number_format($ansreftt,2)."</td>";
            echo "<td>".$vrefqty->isi_unit."</td>";
            echo "</tr>";
            }
        }
             }
            echo "</table>";
          }elseif($matcode=="2"){
            if ($context =="0") {
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
             // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('stock_project =',$projectid);
             $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_whcode');

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
            $this->db->join('member','ic_issue_d.isi_user = member.m_user');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('isi_doccode =',$context);
            $this->db->where('stock_project =',$projectid);
            $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_whcode');
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
          
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
                                        <tr>
                                        <th class='text-center'>IC Date</th>
                                        <th class='text-center'>Doc. No</th>
                                        <th  class='text-center'>Entry No.</th>
                                        <th  class='text-center'>Date</th>
                                        <th  class='text-center'>Referemce By</th>
                                        <th  class='text-center'>Material</th>
                                        <th  class='text-center'>Qty Issue</th>
                                        <th  class='text-center'>Qty Return</th>
                                        <th  class='text-center'>Qty Balance</th>
                                        <th  class='text-center'>Unit</th>
                                        <th  class='text-center'>Area</th>
                                        <th  class='text-center'>Code/Name</th>
                                        <th  class='text-center'>Qty(Cost)</th>
                                        <th  class='text-center'>Cost/Unit</th>
                                        <th  class='text-center'>Amount</th>
                                        </tr>
             </tr>
            </thead>
            </div>";
             
            foreach ($get_issue as $vissue) {

            $get_issue_qty_ref = $this->db->query("select * from ic_issue_d where isi_whcode='$vissue->isi_whcode' group by isi_doccode");
            $get_issue_qty_ref_s = $get_issue_qty_ref->result();
            // foreach ($get_whamout_qt as $kref_rep) {
           
        

            echo "<tr>";
            echo "<td colspan='16' class='text-left'><b><h1>Warehouse : ".$vissue->isi_whcode."</h1></b></td>";
        
            echo "</tr>";


            
            foreach ($get_issue_qty_ref_s as $vrefqty) {
            $getrt_all_rep = $this->db->query("select * from stockcard where ref_no ='$vrefqty->isi_doccode' and stock_type ='issue'");
            $getrt_alls_rep = $getrt_all_rep->result();


            echo "<tr>";
            echo "<td colspan='2' ><b>".$vrefqty->isi_credate."</b></td>";

            echo "<td class='text-center'><b>".$vrefqty->isi_doccode."</b></td>";

            echo "</tr>";
            $qtyref = 0;
     foreach ($getrt_alls_rep as $vdocno) {
        $qtyref = $vdocno->stock_qty;
            $getrt_all = $this->db->query("select * from stockcard where stock_matcode ='$vdocno->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");
              $getrt_allss = $getrt_all->result();
            echo "<tr>";
            echo "<td colspan='2'></td>";


            echo "<td class='text-center'>";
            
            foreach ($getrt_allss as $kre) {
            echo $kre->ref_no;
                
                
            }
             
                echo "-";
                echo "</td>";


            echo "<td>".$vdocno->stock_date."</td>";
            echo "<td>".$vdocno->useradd."</td>";
            echo "<td>[".$vdocno->stock_matcode."]-[".$vdocno->stock_matname."</td>";
             echo "<td class='text-right'>".number_format($vdocno->stock_qty,2)."</td>";
            echo "<td class='text-right'>";
            $ansref = 0;
            $ansreftt=0;
            foreach ($getrt_allss as $kre) {
                $ansref = $kre->stock_qty;
                
                echo number_format($ansref,2) ;
            }
            $ansreftt = $qtyref-$ansref; 
                echo " -";
                echo "</td>";
                echo "<td class='text-right'>".number_format($ansreftt,2)."</td>";
            echo "<td>".$vrefqty->isi_unit."</td>";
            echo "</tr>";
            }
        }
             }
              echo "</table>";
           }elseif($matcode=="3"){
             echo $matcode;
         }elseif($matcode=="4"){
             echo $matcode;
         }elseif($matcode=="5"){
            if ($context =="0") {
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
             // $this->db->join('store','stockcard.stock_matcode = store.store_matname');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('stock_project =',$projectid);
             $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_whcode');

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
            $this->db->select('*');
            $this->db->from('ic_issue_d');
            $this->db->join('stockcard','ic_issue_d.isi_doccode = stockcard.ref_no');
            $this->db->join('member','ic_issue_d.isi_user = member.m_user');
            $this->db->where('isi_credate >=',$startdate);
            $this->db->where('isi_credate <=',$enddate);
            $this->db->where('isi_matcode =',$context);
            $this->db->where('stock_project =',$projectid);
            $this->db->where('stock_type =','issue');
            $this->db->group_by('isi_whcode');
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
          
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
                                        <tr>
                                        <th class='text-center'>IC Date</th>
                                        <th class='text-center'>Doc. No</th>
                                        <th  class='text-center'>Entry No.</th>
                                        <th  class='text-center'>Date</th>
                                        <th  class='text-center'>Referemce By</th>
                                        <th  class='text-center'>Material</th>
                                        <th  class='text-center'>Qty Issue</th>
                                        <th  class='text-center'>Qty Return</th>
                                        <th  class='text-center'>Qty Balance</th>
                                        <th  class='text-center'>Unit</th>
                                        <th  class='text-center'>Area</th>
                                        <th  class='text-center'>Code/Name</th>
                                        <th  class='text-center'>Qty(Cost)</th>
                                        <th  class='text-center'>Cost/Unit</th>
                                        <th  class='text-center'>Amount</th>
                                        </tr>
             </tr>
            </thead>
            </div>";
             
            foreach ($get_issue as $vissue) {

            $get_issue_qty_ref = $this->db->query("select * from ic_issue_d where isi_whcode='$vissue->isi_whcode' group by isi_doccode");
            $get_issue_qty_ref_s = $get_issue_qty_ref->result();
            // foreach ($get_whamout_qt as $kref_rep) {
           
        

            echo "<tr>";
            echo "<td colspan='16' class='text-left'><b><h1>Warehouse : ".$vissue->isi_whcode."</h1></b></td>";
        
            echo "</tr>";


            
            foreach ($get_issue_qty_ref_s as $vrefqty) {
            $getrt_all_rep = $this->db->query("select * from stockcard where ref_no ='$vrefqty->isi_doccode' and stock_type ='issue'");
            $getrt_alls_rep = $getrt_all_rep->result();


            echo "<tr>";
            echo "<td colspan='2' ><b>".$vrefqty->isi_credate."</b></td>";

            echo "<td class='text-center'><b>".$vrefqty->isi_doccode."</b></td>";

            echo "</tr>";
            $qtyref = 0;
     foreach ($getrt_alls_rep as $vdocno) {
        $qtyref = $vdocno->stock_qty;
            $getrt_all = $this->db->query("select * from stockcard where stock_matcode ='$vdocno->stock_matcode' and stock_type ='keyin' GROUP BY stock_matcode");
              $getrt_allss = $getrt_all->result();
            echo "<tr>";
            echo "<td colspan='2'></td>";


            echo "<td class='text-center'>";
            
            foreach ($getrt_allss as $kre) {
            echo $kre->ref_no;
                
                
            }
             
                echo "-";
                echo "</td>";


            echo "<td>".$vdocno->stock_date."</td>";
            echo "<td>".$vdocno->useradd."</td>";
            echo "<td>[".$vdocno->stock_matcode."]-[".$vdocno->stock_matname."</td>";
             echo "<td class='text-right'>".number_format($vdocno->stock_qty,2)."</td>";
            echo "<td class='text-right'>";
            $ansref = 0;
            $ansreftt=0;
            foreach ($getrt_allss as $kre) {
                $ansref = $kre->stock_qty;
                
                echo number_format($ansref,2) ;
            }
            $ansreftt = $qtyref-$ansref; 
                echo " -";
                echo "</td>";
                echo "<td class='text-right'>".number_format($ansreftt,2)."</td>";
            echo "<td>".$vrefqty->isi_unit."</td>";
            echo "</tr>";
            }
            }
            }
              echo "</table>";
         }elseif($matcode=="6"){
           
         }elseif($matcode=="7"){
             echo $matcode;
         }elseif($matcode=="0"){
             echo $matcode;
         }

}

public function Rcqty()
        {
      

          $matcode = $this->uri->segment(3);
          $startdate = $this->uri->segment(4);
          $enddate = $this->uri->segment(5);
          $context = $this->uri->segment(6);
          $projectid = $this->uri->segment(7);

        if ($matcode=="1") {
          if ($context =="0") {
            $this->db->select('*');
            $this->db->from('po_receive');
            $this->db->join('stockcard','po_receive.po_reccode = stockcard.ref_no');
             $this->db->join('po_recitem','po_receive.po_reccode = po_recitem.poi_ref');
            $this->db->where('po_recdate >=',$startdate);
            $this->db->where('po_recdate <=',$enddate);
            $this->db->where('project =',$projectid);
             $this->db->where('stock_type !=','issue');
              $this->db->where('stock_type !=','tranfer');
            // $this->db->group_by('isi_whcode');

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
                   $this->db->select('*');
            $this->db->from('po_receive');
            $this->db->join('stockcard','po_receive.po_reccode = stockcard.ref_no');
             $this->db->join('po_recitem','po_receive.po_reccode = po_recitem.poi_ref');
            $this->db->where('po_recdate >=',$startdate);
            $this->db->where('po_recdate <=',$enddate);
            $this->db->where('project =',$projectid);
             $this->db->where('stock_type !=','issue');
              $this->db->where('stock_type !=','tranfer');
               $this->db->where('po_reccode =',$context);
            // $this->db->group_by('isi_whcode');
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
          
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
                                      <tr>
                                        <th class='text-center'>Doc. No</th>
                                        <th class='text-center'>Date</th>
                                        <th  class='text-center'>Po. No</th>
                                        <th  class='text-center'>R/C NO.</th>
                                        <th  class='text-center'>Inv. No</th>
                                        <th  class='text-center'>Vendor</th>
                                        <th  class='text-center'>Item</th>
                                        <th  class='text-center'>Warehouse</th>
                                        <th  class='text-center'>Qty Unit</th>
                                        <th  class='text-center'>Description</th>
                                      
                                        </tr>
             </tr>
            </thead>
            </div>";
            
            foreach ($get_issue as $vissue) {
            echo "<tr>";
            echo "<td>".$vissue->ref_no."</td>";
            
            
            echo "<td>".$vissue->po_recdate."</td>";
            
            
            echo "<td>".$vissue->po_pono."</td>";
            
            
            echo "<td>--</td>";
            
            
            echo "<td>".$vissue->docode."</td>";

            echo "<td>".$vissue->venderid."</td>";

            echo "<td>".$vissue->poi_matname."</td>";

            echo "<td class='text-center'>".$vissue->system."</td>";

            echo "<td class='text-right'>".number_format($vissue->poi_qty,2)."  ".$vissue->poi_unit."</td>";
            echo "<td>--</td>";
            echo "</tr>";
            }
            
            
            echo "</table>";
          }elseif($matcode=="2"){
             if ($context =="0") {
            $this->db->select('*');
            $this->db->from('po_receive');
            $this->db->join('stockcard','po_receive.po_reccode = stockcard.ref_no');
             $this->db->join('po_recitem','po_receive.po_reccode = po_recitem.poi_ref');
            $this->db->where('po_recdate >=',$startdate);
            $this->db->where('po_recdate <=',$enddate);
            $this->db->where('project =',$projectid);
             $this->db->where('stock_type !=','issue');
              $this->db->where('stock_type !=','tranfer');
            // $this->db->group_by('isi_whcode');

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
                   $this->db->select('*');
            $this->db->from('po_receive');
            $this->db->join('stockcard','po_receive.po_reccode = stockcard.ref_no');
             $this->db->join('po_recitem','po_receive.po_reccode = po_recitem.poi_ref');
            $this->db->where('po_recdate >=',$startdate);
            $this->db->where('po_recdate <=',$enddate);
            $this->db->where('project =',$projectid);
             $this->db->where('stock_type !=','issue');
              $this->db->where('stock_type !=','tranfer');
               $this->db->where('poi_matcode =',$context);
            // $this->db->group_by('isi_whcode');
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
          
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
                                      <tr>
                                        <th class='text-center'>Doc. No</th>
                                        <th class='text-center'>Date</th>
                                        <th  class='text-center'>Po. No</th>
                                        <th  class='text-center'>R/C NO.</th>
                                        <th  class='text-center'>Inv. No</th>
                                        <th  class='text-center'>Vendor</th>
                                        <th  class='text-center'>Item</th>
                                        <th  class='text-center'>Warehouse</th>
                                        <th  class='text-center'>Qty Unit</th>
                                        <th  class='text-center'>Description</th>
                                      
                                        </tr>
             </tr>
            </thead>
            </div>";
            
            foreach ($get_issue as $vissue) {
            echo "<tr>";
            echo "<td>".$vissue->ref_no."</td>";
            
            
            echo "<td>".$vissue->po_recdate."</td>";
            
            
            echo "<td>".$vissue->po_pono."</td>";
            
            
            echo "<td>--</td>";
            
            
            echo "<td>".$vissue->docode."</td>";

            echo "<td>".$vissue->venderid."</td>";

            echo "<td>".$vissue->poi_matname."</td>";

            echo "<td>".$vissue->system."</td>";

            echo "<td class='text-right'>".number_format($vissue->poi_qty,2)." / ".$vissue->poi_unit."</td>";
            echo "<td>--</td>";
            echo "</tr>";
            }
            
            
            echo "</table>";
           }elseif($matcode=="3"){
             if ($context =="0") {
            $this->db->select('*');
            $this->db->from('po_receive');
            $this->db->join('stockcard','po_receive.po_reccode = stockcard.ref_no');
             $this->db->join('po_recitem','po_receive.po_reccode = po_recitem.poi_ref');
            $this->db->where('po_recdate >=',$startdate);
            $this->db->where('po_recdate <=',$enddate);
            $this->db->where('project =',$projectid);
             $this->db->where('stock_type !=','issue');
              $this->db->where('stock_type !=','tranfer');
            // $this->db->group_by('isi_whcode');

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
                   $this->db->select('*');
            $this->db->from('po_receive');
            $this->db->join('stockcard','po_receive.po_reccode = stockcard.ref_no');
             $this->db->join('po_recitem','po_receive.po_reccode = po_recitem.poi_ref');
            $this->db->where('po_recdate >=',$startdate);
            $this->db->where('po_recdate <=',$enddate);
            $this->db->where('project =',$projectid);
             $this->db->where('stock_type !=','issue');
              $this->db->where('stock_type !=','tranfer');
               $this->db->where('po_pono =',$context);
            // $this->db->group_by('isi_whcode');
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
          
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
                                      <tr>
                                        <th class='text-center'>Doc. No</th>
                                        <th class='text-center'>Date</th>
                                        <th  class='text-center'>Po. No</th>
                                        <th  class='text-center'>R/C NO.</th>
                                        <th  class='text-center'>Inv. No</th>
                                        <th  class='text-center'>Vendor</th>
                                        <th  class='text-center'>Item</th>
                                        <th  class='text-center'>Warehouse</th>
                                        <th  class='text-center'>Qty Unit</th>
                                        <th  class='text-center'>Description</th>
                                      
                                        </tr>
             </tr>
            </thead>
            </div>";
            
            foreach ($get_issue as $vissue) {
            echo "<tr>";
            echo "<td>".$vissue->ref_no."</td>";
            
            
            echo "<td>".$vissue->po_recdate."</td>";
            
            
            echo "<td>".$vissue->po_pono."</td>";
            
            
            echo "<td>--</td>";
            
            
            echo "<td>".$vissue->docode."</td>";

            echo "<td>".$vissue->venderid."</td>";

            echo "<td>".$vissue->poi_matname."</td>";

            echo "<td>".$vissue->system."</td>";

            echo "<td class='text-right'>".number_format($vissue->poi_qty,2)." / ".$vissue->poi_unit."</td>";
            echo "<td>--</td>";
            echo "</tr>";
            }
            
            
            echo "</table>";
         }elseif($matcode=="4"){
             echo $matcode;
         }elseif($matcode=="5"){
             if ($context =="0") {
            $this->db->select('*');
            $this->db->from('po_receive');
            $this->db->join('stockcard','po_receive.po_reccode = stockcard.ref_no');
             $this->db->join('po_recitem','po_receive.po_reccode = po_recitem.poi_ref');
            $this->db->where('po_recdate >=',$startdate);
            $this->db->where('po_recdate <=',$enddate);
            $this->db->where('project =',$projectid);
             $this->db->where('stock_type !=','issue');
              $this->db->where('stock_type !=','tranfer');
            // $this->db->group_by('isi_whcode');

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
                   $this->db->select('*');
            $this->db->from('po_receive');
            $this->db->join('stockcard','po_receive.po_reccode = stockcard.ref_no');
             $this->db->join('po_recitem','po_receive.po_reccode = po_recitem.poi_ref');
            $this->db->where('po_recdate >=',$startdate);
            $this->db->where('po_recdate <=',$enddate);
            $this->db->where('project =',$projectid);
             $this->db->where('stock_type !=','issue');
              $this->db->where('stock_type !=','tranfer');
               $this->db->where('system',$context);
            // $this->db->group_by('isi_whcode');
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
          
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
                                      <tr>
                                        <th class='text-center'>Doc. No</th>
                                        <th class='text-center'>Date</th>
                                        <th  class='text-center'>Po. No</th>
                                        <th  class='text-center'>R/C NO.</th>
                                        <th  class='text-center'>Inv. No</th>
                                        <th  class='text-center'>Vendor</th>
                                        <th  class='text-center'>Item</th>
                                        <th  class='text-center'>Warehouse</th>
                                        <th  class='text-center'>Qty Unit</th>
                                        <th  class='text-center'>Description</th>
                                      
                                        </tr>
             </tr>
            </thead>
            </div>";
            
            foreach ($get_issue as $vissue) {
            echo "<tr>";
            echo "<td>".$vissue->ref_no."</td>";
            
            
            echo "<td>".$vissue->po_recdate."</td>";
            
            
            echo "<td>".$vissue->po_pono."</td>";
            
            
            echo "<td>--</td>";
            
            
            echo "<td>".$vissue->docode."</td>";

            echo "<td>".$vissue->venderid."</td>";

            echo "<td>".$vissue->poi_matname."</td>";

            echo "<td class='text-center'>".$vissue->system."</td>";

            echo "<td class='text-right'>".number_format($vissue->poi_qty,2)." / ".$vissue->poi_unit."</td>";
            echo "<td>--</td>";
            echo "</tr>";
            }
            
            
            echo "</table>";
         }elseif($matcode=="6"){
           
         }elseif($matcode=="7"){
             echo $matcode;
         }elseif($matcode=="0"){
             echo $matcode;
         }

}


public function ttwh()
        {
      

          $matcode = $this->uri->segment(3);
          $startdate = $this->uri->segment(4);
          $enddate = $this->uri->segment(5);
          $context = $this->uri->segment(6);
          $projectid = $this->uri->segment(7);

        if ($matcode=="1") {
          if ($context =="0") {
            $this->db->select('*');
            $this->db->from('stockcard');
            // $this->db->join('stockcard','po_receive.po_reccode = stockcard.ref_no');
             // $this->db->join('po_recitem','po_receive.po_reccode = po_recitem.poi_ref');
            $this->db->where('stock_date >=',$startdate);
            $this->db->where('stock_date <=',$enddate);
            $this->db->where('stock_bookfrom =',$projectid);
             // $this->db->where('stock_type !=','issue');
              $this->db->where('stock_type =','transfer');
            // $this->db->group_by('isi_whcode');

            $query = $this->db->get();
            $get_issue = $query->result();
          }else{
                   $this->db->select('*');
            $this->db->from('stockcard');
            // $this->db->join('stockcard','po_receive.po_reccode = stockcard.ref_no');
             // $this->db->join('po_recitem','po_receive.po_reccode = po_recitem.poi_ref');
            $this->db->where('stock_date >=',$startdate);
            $this->db->where('stock_date <=',$enddate);
            $this->db->where('stock_bookfrom =',$projectid);
             // $this->db->where('stock_type !=','issue');
              $this->db->where('stock_type =','transfer');
               $this->db->where('ref_no =',$context);
            // $this->db->group_by('isi_whcode');
            $query = $this->db->get();
            $get_issue = $query->result();
          }
         
          
            echo "<div class='table-responsive' > "; 
            echo "<table class='table table-hover table-bordered table-striped table-xxs'>";
            echo "<thead>
            <tr>
                                      <tr>
                                        <th class='text-center'>Doc. No</th>
                                        <th  class='text-center'>Date</th>
                                        <th  class='text-center'>Item</th>
                                        <th  class='text-center'>Qty(TR)</th>
                                        <th  class='text-center'>Qty(Issue)</th>
                                        <th  class='text-center'>Unit</th>
                                        <th  class='text-center'>Cost/Unit</th>
                                        <th  class='text-center'>Amount</th>
                                        <th  class='text-center'>Price/Unit Ref.</th>
                                        <th  class='text-center'>Description</th>
                                     </tr>
             </tr>
            </thead>
            </div>";

        foreach ($get_issue as $vissue) {
            $getpjtt = $this->db->query("select * from project where project_id='$vissue->stock_project'");
            $getpjtts = $getpjtt->result();
            foreach ($getpjtts as $vtt) {  
               echo "<tr>";
               echo "<td colspan='10'><h1><b>TO :     ".$vtt->project_name."</b></h1></td>";
               echo "</tr>";
        }
            // echo "<tr>";
            // echo "<td>".$vissue->ref_no."</td>";
            
            
            // echo "<td>".$vissue->po_recdate."</td>";
            
            
            // echo "<td>".$vissue->po_pono."</td>";
            
            
            // echo "<td>--</td>";
            
            
            // echo "<td>".$vissue->docode."</td>";

            // echo "<td>".$vissue->venderid."</td>";

            // echo "<td>".$vissue->poi_matname."</td>";

            // echo "<td class='text-center'>".$vissue->system."</td>";

            // echo "<td class='text-right'>".number_format($vissue->poi_qty,2)."  ".$vissue->poi_unit."</td>";
            // echo "<td>--</td>";
            // echo "</tr>";
            }
            
            
            echo "</table>";
          }elseif($matcode=="2"){
            
           }elseif($matcode=="3"){
           
         }elseif($matcode=="4"){
            
         }elseif($matcode=="5"){
            
         }elseif($matcode=="6"){
           
         }elseif($matcode=="7"){
       
         }elseif($matcode=="0"){
          
         }

}




}