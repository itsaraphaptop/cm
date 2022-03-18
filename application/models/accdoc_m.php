<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class accdoc_m extends CI_Model {
	public function __construct() {
	    parent::__construct();
	}

	public function sumdetailTwoTB($mounth, $id1, $table1, $column1, $id2, $table2, $column2, $year)
	{
		
		$this->db->select("COUNT($id1)");
		$this->db->from($table1);
		$this->db->where("{$column1} REGEXP '{$year}-{$mounth}-'");
		$query_table1 = $this->db->get();


		$this->db->select("COUNT('$id2')");
		$this->db->from($table2);
		$this->db->where("{$column2} REGEXP '{$year}-{$mounth}-'");
		$query_table2 = $this->db->get();

		if($query_table1 && $query_table2){
			$res[] = $query_table1->result_array();
			$res[] = $query_table2->result_array();
			
			
			$return = 0;
			foreach ($res as $key => $value) {
			
				foreach ($value as $ke => $va) {
				
					foreach ($va as $k => $v) {
					
						$return += $v;
					}
					
				}
			}

		}else{
			$return = null;
		}
		
		return $return;

	}

	public function sumdetailOneTB($mounth, $id, $table, $column, $year)
	{
		$this->db->select("COUNT($id)");
		$this->db->from($table);
		$this->db->where("{$column} REGEXP '{$year}-{$mounth}-'");
		$query = $this->db->get();

		if($query){
			$res = $query->result_array();
						
			$return = 0;
			foreach ($res as $key => $value) {
			
				// foreach ($value as $ke => $va) {
				
					foreach ($value as $k => $v) {
					
						$return += $v;
					}
					
				// }
			}

		}else{
			$return = null;
		}
		
		return $return;
	}


	public function modal_detail($mounth, $year, $table, $column)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where("{$column} REGEXP '{$year}-{$mounth}-'");
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		}else{
			$res = null;
		}

		return $res;

	}

	public function sumdetailFourTB($mounth, $id1, $table1, $column1, $id2, $table2, $column2, $id3, $table3, $column3, $id4, $table4, $column4, $year)
	{
		$this->db->select("COUNT($id1)");
		$this->db->from($table1);
		$this->db->where("{$column1} REGEXP '{$year}-{$mounth}-'");
		$query_table1 = $this->db->get();


		$this->db->select("COUNT('$id2')");
		$this->db->from($table2);
		$this->db->where("{$column2} REGEXP '{$year}-{$mounth}-'");
		$query_table2 = $this->db->get();

		$this->db->select("COUNT('$id3')");
		$this->db->from($table3);
		$this->db->where("{$column3} REGEXP '{$year}-{$mounth}-'");
		$query_table3 = $this->db->get();

		$this->db->select("COUNT('$id4')");
		$this->db->from($table4);
		$this->db->where("{$column4} REGEXP '{$year}-{$mounth}-'");
		$query_table4 = $this->db->get();

		if($query_table1 && $query_table2 && $query_table3 && $query_table4){
			$res[] = $query_table1->result_array();
			$res[] = $query_table2->result_array();
			$res[] = $query_table3->result_array();
			$res[] = $query_table4->result_array();
			
			
			$return = 0;
			foreach ($res as $key => $value) {
			
				foreach ($value as $ke => $va) {
				
					foreach ($va as $k => $v) {
					
						$return += $v;
					}
					
				}
			}

		}else{
			$return = null;
		}
		
		return $return;
	}

}

/* End of file accdoc.php */
/* Location: ./application/models/accdoc.php */ ?>