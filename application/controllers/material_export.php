<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class material_export extends CI_Controller {
	  public function __construct() {
            parent::__construct();
            $this->load->Model('inventory_m');
        }

        public function excel()
        {
          if($this->input->post("btn_export")){
            // โหลด excel library
          $this->load->library('excel');

            // เรียนกใช้ PHPExcel
            $objPHPExcel = new PHPExcel();
            // เราสามารถเรียกใช้เป็น  $this->excel แทนก็ได้

            // กำหนดค่าต่างๆ ของเอกสาร excel
            $objPHPExcel->getProperties()->setCreator("makeprosoft.com")
                                         ->setLastModifiedBy("makeprosoft.com")
                                         ->setTitle("Export IC Stockcard")
                                         ->setSubject("Export IC Stockcard")
                                         ->setDescription("Export IC Stockcard.")
                                         ->setKeywords("office stockcard")
                                         ->setCategory("Export IC Stockcard");

            // กำหนดชื่อให้กับ worksheet ที่ใช้งาน
            $objPHPExcel->getActiveSheet()->setTitle('Product Report');

            // กำหนด worksheet ที่ต้องการให้เปิดมาแล้วแสดง ค่าจะเริ่มจาก 0 , 1 , 2 , ......
            $objPHPExcel->setActiveSheetIndex(0);

            // การจัดรูปแบบของ cell
            $objPHPExcel->getDefaultStyle()
                                    ->getAlignment()
                                    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
                                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                                    //HORIZONTAL_CENTER //VERTICAL_CENTER

            // จัดความกว้างของคอลัมน์
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);

            // กำหนดหัวข้อให้กับแถวแรก
            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A2', 'No')
                        ->setCellValue('B2', 'Material Code')
                        ->setCellValue('C2', 'Material Name');

            // ดึงข้อมูลเริ่มเพิ่มแถวที่ 2 ของ excel
            $start_row=2;

						$this->db->select('*');
						$this->db->from('at_product');
						$this->db->join('mat_subgroup','mat_subgroup.matsubgroup_code = mat_product.matsubgroup_code');
						$this->db->join('mat_group','mat_group.matgroup_code = mat_product.matgroup_code AND mat_group.matgroup_code = mat_subgroup.matgroup_code AND mat_product.matgroup_code = mat_subgroup.matgroup_code');
						$this->db->join('mat_type','mat_type.mattype_code = mat_group.mattype_code AND mat_type.mattype_code = mat_subgroup.mattype_code AND mat_type.mattype_code = mat_product.mattype_code AND mat_group.mattype_code = mat_product.mattype_code AND mat_group.mattype_code = mat_subgroup.mattype_code AND mat_subgroup.mattype_code = mat_product.mattype_code');
						$this->db->join('mat_spec','mat_spec.mattype_code = mat_product.mattype_code AND mat_spec.matgroup_code = mat_product.matgroup_code AND mat_spec.matsubgroup_code = mat_product.matsubgroup_code AND mat_spec.matcode = mat_product.matcode AND mat_spec.mattype_code = mat_subgroup.mattype_code AND mat_spec.matgroup_code = mat_subgroup.matgroup_code AND mat_spec.matsubgroup_code = mat_subgroup.matsubgroup_code AND mat_spec.mattype_code = mat_group.mattype_code AND mat_spec.matgroup_code = mat_group.matgroup_code AND mat_spec.mattype_code = mat_type.mattype_code');

						$query = $this->db->get();
						$result = $query->result();


            $i_num=0;
            if(count($result)>0){
                foreach($result as $row){
                    $i_num++;

                    // หากอยากจัดข้อมูลราคาให้ชิดขวา
                    $objPHPExcel->getActiveSheet()
                        ->getStyle('C'.$start_row)
                        ->getAlignment()
                        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

                    // หากอยากจัดให้รหัสสินค้ามีเลย 0 ด้านหน้า และแสดง 3     หลักเช่น 001 002
                    $objPHPExcel->getActiveSheet()
                        ->getStyle('B'.$start_row)
                        ->getNumberFormat()
                        ->setFormatCode('000');

                    // เพิ่มข้อมูลลงแต่ละเซลล์
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('A'.$start_row, $i_num)
                                ->setCellValue('B'.$start_row, $row['matgroup_code'])
                                ->setCellValue('C'.$start_row, $row['matgroup_name']);

                    // เพิ่มแถวข้อมูล
                    $start_row++;
                }

                // กำหนดรูปแบบของไฟล์ที่ต้องการเขียนว่าเป็นไฟล์ excel แบบไหน ในที่นี้เป้นนามสกุล xlsx  ใช้คำว่า Excel2007
                // แต่หากต้องการกำหนดเป็นไฟล์ xls ใช้กับโปรแกรม excel รุ่นเก่าๆ ได้ ให้กำหนดเป็น  Excel5
                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  // Excel2007 (xlsx) หรือ Excel5 (xls)

                $filename='Stockcard-'.date("dmYHi").'.xlsx'; //  กำหนดชือ่ไฟล์ นามสกุล xls หรือ xlsx
                // บังคับให้ทำการดาวน์ดหลดไฟล์
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
                ob_end_clean();
                $objWriter->save('php://output'); // ดาวน์โหลดไฟล์รายงาน
                // หากต้องการบันทึกเป็นไฟล์ไว้ใน server  ใช้คำสั่งนี้ $this->excel->save("/path/".$filename);
                // แล้วตัด header ดัานบนทั้ง 3 อันออก
                exit;
            }

        }
        }
}
