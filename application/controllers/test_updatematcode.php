<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class test_updatematcode extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('datastore_m');
            $this->load->library('multipledb');
        }
		public function index()
		{
			  $q = $this->db->query("select * from store where store_project='41' and store_type='import' and (store_matcode) in (select store_matcode from store group by store_matcode having count(store_matcode) >'1') group by store_matcode ORDER BY store_matcode  ")->result();
		        foreach ($q as $key => $value) {
		        	
		          $qq = $this->db->query("select sum(store_total) as su from store where store_matcode='$value->store_matcode' and store_project='41' and store_type='import'")->result();
		        	foreach ($qq as $key => $va) {
		        		echo "<p>".$value->store_matcode."---".$value->store_matname."---".$value->store_total."--------".$va->su."</p>";
		        	}

		        	$data = array(
		        		'store_total' => $va->su,
		        		'store_qty' => $va->su,
		        		);
		        	$this->db->where('store_matcode',$value->store_matcode);
		        	$this->db->where('store_project','41');
		        	$this->db->where('store_type','import');
		        	$this->db->update('store',$data);
		        	// ;
		        }
		}
		public function test2db()
        {
          $query2 = $this->multipledb->db->query('select * from license')->num_rows(); // running query using library.
          // echo $this->multipledb->save();// calling library function.
          echo $query2;

        }
    }