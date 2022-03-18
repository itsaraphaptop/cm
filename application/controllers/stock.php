<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class stock extends CI_Controller {
	  public function __construct() {
            parent::__construct();
            $this->load->Model('stock_m');
            $this->load->Model('datastore_m');
            $this->load->Model('office_m');
        }
        /////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////// PO Receive
        public function po_receive()
        {
            $session_data = $this->session->userdata('logged_in');
          // $data['res'] = $this->datastore_m->getmember();
           $id = $this->uri->segment(3);
           $data['res'] = $this->office_m->getporece($id);
           $data['resi'] = $this->office_m->retrive_poi($id);
           $this->load->view('office/stock/po_receive/po_receive_header_v',$data);
        }


        ////////////////////////////////////////////////////////////////////////////////////////
        //// สำหรับ Load View
        ///////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////
        ////////////////  IC Receive
        ////////////////////////////////////////
          public function service_ic_receive_h()
        {
           $session_data = $this->session->userdata('logged_in');
           $data['res'] = $this->stock_m->getporec();
           $this->load->view('office/stock/ic_receive/ic_receive_v',$data);
        }
        public function loadporec_d()
        {
          $session_data = $this->session->userdata('logged_in');
          $data['uname'] = $session_data['m_name'];
        	$id = $this->uri->segment(3);
        	$data['getdetail'] = $this->stock_m->getporec_d($id);
        	$data['getproject'] = $this->datastore_m->getproject_enable();
        	$this->load->view('office/stock/ic_receive/ic_rec_d_v',$data);
        }
        public function loadinventory()
        {
            $session_data = $this->session->userdata('logged_in');
            $data['uname'] = $session_data['m_name'];
            $data['res'] = $this->stock_m->getstore();
            $this->load->view('office/stock/ic_receive/inventory_v',$data);
        }
        
        //////////////// doc issue
        ///////////////////////////////////////////////////////////////////////////////////////
        public function docissue()
        {
            $session_data = $this->session->userdata('logged_in');
            $data['uname'] = $session_data['m_name'];
            $data['getproj'] = $this->datastore_m->getproject_enable();
            $data['resmem'] = $this->datastore_m->getmember();
            $this->load->view('office/stock/ic_receive/document_issue_v',$data);
        }
        public function detail_docissue()
        {
            $doccode = $this->uri->segment(3);
            $data['res'] = $this->stock_m->getdocissue_d($doccode);
            $data['getunit'] = $this->datastore_m->getunit();
            $data['mat'] = $this->stock_m->getstorenot();
            $this->load->view('office/stock/ic_receive/sevice_docissue_detaiil_v',$data);
        }
        public function add_docissue()
        {
          $session_data = $this->session->userdata('logged_in');
          $data['uname'] = $session_data['m_name'];
          $data['getunit'] = $this->datastore_m->getunit();
          $data['mat'] = $this->stock_m->getstorenot();
          $this->load->view('office/stock/ic_receive/add_docissue_v',$data);
        }
        public function show_all_docissue()
        {
          $data['getissue'] = $this->stock_m->getdocissue();
          $this->load->view('office/stock/ic_receive/service_alldocissue_v',$data);
        }
        public function report_issueall()
        {
          $data['getissue'] = $this->stock_m->getdocissue();
          $this->load->view('office/stock/report_alldocissue_v',$data);
        }

        //// สำหรับ get data
        ///////////////////////////////////////////////////////////////////////////////////////
        public function add_ic_receive_h()
        {
        	$datestring = "Y";
          $mm = "m";
          $dd = "d";
                              // $this->db->select('*');
                              // $qu = $this->db->get('ic_recive');
                              // $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

                              //   if ($res==0) {
                              //     $apvcode = "IN".date($datestring).date($mm).date($dd)."1";
                              //   }else{
                              //       $this->db->select('*');
                              //       $this->db->order_by('ic_recid','desc');
                              //       $this->db->limit('1');
                              //       $q = $this->db->get('ic_recive');
                              //       $run = $q->result();
                              //       foreach ($run as $valx)
                              //       {
                              //           $x1 = $valx->apv_id+1;
                              //       }
                              //     $apvcode = "IN".date($datestring).date($mm).date($dd).$x1;
                              //   }



                            $this->db->select('*');
                            $this->db->order_by('ic_recid','desc');
                            $this->db->limit('1');
                            $q = $this->db->get('ic_recive');
                            $run = $q->result();
                            foreach ($run as $valx)
                            {
                                $x1 = $valx->ic_recid+1;
                            }
                            if ($x1=="") {
                            	$icreccode = "IN".date($datestring).date($mm).date($dd)."1";
                            }else{
                            	$icreccode = "IN".date($datestring).date($mm).date($dd).$x1;
                            }
                            
        	$data = array(
        		'ic_recdate' => $this->input->post('icdate'),
        		'ic_recproject' => $this->input->post('project'),
        		'ic_reccode' => $icreccode,
                'ic_system' => $this->input->post('systeml'),
                'ic_vender' => $this->input->post('vender'),
                'ic_pono' => $this->input->post('pono'),
                'ic_type' => $this->input->post('ictype'),
                'ic_invno' => $this->input->post('invno'),
                'ic_invdate' => $this->input->post('invdate'),
                'ic_podate' => $this->input->post('podate'),
                'ic_remark' => $this->input->post('remark')
        		);
        	if($this->stock_m->insicrec_h($data))
        	{
        		echo $icreccode;
        		return true;
        	}else{
        		return false;
        	}
        }

        public function add_ic_receive_d()
        {
            try {
                /////////////////////////////// normal row
                    $id = $this->input->post('icno');
                    $poi_id = $this->input->post('poi_id');
                    $po = $this->input->post('po');
                    $qty = $this->input->post('qty');
                    $data = array(
                        'icd_reccode' => $this->input->post('icno'),
                        'icd_warehouse' => $this->input->post('sproj'),
                        'icd_receivtot' => $this->input->post('qty'),
                        'icd_matcode' => $this->input->post('matcode'),
                        'icd_matname' => $this->input->post('matname')
                        );
                    $uptpor = array(
                        'ic_receive' => $this->input->post('qty'),
                        );
                    $this->stock_m->uptpoitem_d($uptpor,$po,$poi_id);
                    $this->stock_m->uptporecitem_d($uptpor,$po,$poi_id);
                    $this->stock_m->uptic_h($uptpor,$id);
                  
                    if ($this->stock_m->insicrec_d($data,$id)) {
                          //////////////////////////////////////////////////////////////////////////
                        $this->db->select_sum('icd_receivtot');
                        $this->db->where('icd_reccode',$id);
                        $query = $this->db->get('icd_receive');
                        $resl = $query->result();
                        foreach ($resl as $vale) {
                          $r = $vale->icd_receivtot;
                        }

                          $this->db->select('*');
                          $this->db->where('ic_reccode',$id);
                          $qo = $this->db->get('ic_recive');
                          $res = $qo->result();
                          foreach ($res as $value) {
                            $totqty = $value->ic_receive;
                          }
                          if ($r==$totqty) { // เช็ควค่า รับของครบหรือไม่ 
                            $recfull = array(
                              'ic_status' => "receive"
                              );
                            $this->db->where('ic_reccode',$id);
                            $this->db->update('ic_recive',$recfull);
                            //////ลอง////////////////////////////////////////////////////////

                            $recicfull = array(                                  ///////////
                                      'ic_status' => "receive"                  ///////////
                                      );                                        ///////////
                                    $this->db->where('podate',$po);            ////////////
                                    $this->db->update('po_receive',$recicfull);////////////
                            //////////////////////////////////////////////////////////////
                                    /////////////////////////////           $session_data = $this->session->userdata('logged_in');
          // $data['res'] = $this->datastore_m->getmember();
           $data['getproj'] = $this->datastore_m->getproject();
           $data['getdep'] = $this->datastore_m->department();
           $this->load->view('office/stock/receive_po/main_po_receive_v',$data);/////////////////////////
                                      $matcode = $this->input->post('matcode');
                          $this->db->select('*');
                          $this->db->where('store_matcode',$matcode);
                          $qur = $this->db->get('store');
                          $ree = $qur->result();
                          foreach ($ree as $mat) {
                              $totstqty =  $mat->store_qty;
                              $getmatcode = $mat->store_matcode;
                          }

                          if ($getmatcode=="") {
                           
                              $datastore = array(
                                'store_project' => $this->input->post('sproj'),
                                'store_matcode' => $this->input->post('matcode'),
                                'store_matname' => $this->input->post('matname'),
                                'store_qty' => $qty, 
                                'store_total' =>$qty
                                );
                              $this->db->insert('store',$datastore);
                          }
                          else
                          {
                          
                             $datastore = array(
                                'store_project' => $this->input->post('sproj'),
                                'store_matcode' => $this->input->post('matcode'),
                                'store_matname' => $this->input->post('matname'),
                                'store_qty' => $totstqty+$qty, 
                                'store_total' => $totstqty+$qty
                            );
                             $this->db->where('store_matcode',$getmatcode);
                            $this->db->update('store',$datastore);
                          }


                                    /////////////////////////////////////////////////////
                                    /////////////////////////////////////////////////////
                             
                          }else{
                            ////////////////////// ยัง update สถานะเป็น receive ไม่ได้
                          $uptpo_h = array(
                              'ic_receive' => $qty+$totqty
                            );
                           $this->db->select('*');
                          $this->db->where('ic_reccode',$id);
                          $qo = $this->db->get('ic_recive');
                          $res = $qo->result();
                          foreach ($res as $value) {
                            $totqty = $value->ic_receive;
                          }
                                if ($r==$totqty) /// เช็ควค่า รับของครบหรือไม่ 
                                {
                                    $recfull = array(
                                      'ic_status' => "receive"
                                      );
                                    $this->db->where('ic_reccode',$id);
                                    $this->db->update('ic_recive',$recfull);
                                    $recicfull = array(
                                      'ic_status' => "receive"
                                      );
                                    $this->db->where('podate',$po);
                                    $this->db->update('po_receive',$recicfull);

            $session_data = $this->session->userdata('logged_in');
          // $data['res'] = $this->datastore_m->getmember();
           $data['getproj'] = $this->datastore_m->getproject();
           $data['getdep'] = $this->datastore_m->department();
           $this->load->view('office/stock/receive_po/main_po_receive_v',$data);
                                    ////////////////////
                                    $matcode = $this->input->post('matcode');
                          $this->db->select('*');
                          $this->db->where('store_matcode',$matcode);
                          $qur = $this->db->get('store');
                          $ree = $qur->result();
                          foreach ($ree as $mat) {
                              $totstqty =  $mat->store_qty;
                              $getmatcode = $mat->store_matcode;
                          }

                          if ($getmatcode=="") {
                           
                              $datastore = array(
                                'store_project' => $this->input->post('sproj'),
                                'store_matcode' => $this->input->post('matcode'),
                                'store_matname' => $this->input->post('matname'),
                                'store_qty' => $qty, 
                                'store_total' => $qty
                                );
                              $this->db->insert('store',$datastore);
                          }
                          else
                          {
                           
                             $datastore = array(
                                'store_project' => $this->input->post('sproj'),
                                'store_matcode' => $this->input->post('matcode'),
                                'store_matname' => $this->input->post('matname'),
                                'store_qty' => $totstqty+$qty, 
                                'store_total' => $totstqty+$qty
                            );
                             $this->db->where('store_matcode',$getmatcode);
                            $this->db->update('store',$datastore);
                          }
                          
                                }
                          }
                          
                    /////////////////////////////////////////////////////////////////////////
                        echo $id;
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                ///////////////////////////////
            } catch (Exception $e) {
                log_message('error',$e->getMessage());
                return;
            }
           
        }

        //////////////////// สำหรับ post data
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        public function add_docissue_h()
        {
          try {
            $datestring = "Y";
            $mm = "m";
            $dd = "d";
                              $this->db->select('*');
                              $qu = $this->db->get('ic_issue_h');
                              $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

                                if ($res==0) {
                                  $icdoccode = "O".date($datestring).date($mm).date($dd)."1";
                                }else{
                                    $this->db->select('*');
                                    $this->db->order_by('is_id','desc');
                                    $this->db->limit('1');
                                    $q = $this->db->get('ic_issue_h');
                                    $run = $q->result();
                                    foreach ($run as $valx)
                                    {
                                        $x1 = $valx->is_id+1;
                                    }
                                  $icdoccode = "O".date($datestring).date($mm).date($dd).$x1;
                                }
              $data = array(
                'is_doccode' => $icdoccode,
                'is_project' => $this->input->post('proj'),
                'is_docdate' => $this->input->post('docdate'),
                'is_system' => $this->input->post('syst'),
                'is_type' => $this->input->post('type'),
                'is_reqname' => $this->input->post('name'),
                'is_remark' => $this->input->post('remark'),
                'is_user' => $this->input->post('user')

                );
              if($this->db->insert('ic_issue_h',$data))
              {
                echo $icdoccode;
                return true;
              }
              else{
                return false;
              }
          } catch (Exception $e) {
            echo $e;
          }
        }

        public function add_docissue_d()
        {
          $doccode = $this->input->post('doccode');
          $matcode = $this->input->post('matcode');
          $xqty = $this->input->post('qty');
          
          $data = array(
              'isi_doccode' => $doccode,
              'isi_matcode' => $matcode,
              'isi_matname' => $this->input->post('matname'),
              'isi_xqty' => $xqty,
              'isi_unit' => $this->input->post('unit'),
              'isi_remark' => $this->input->post('desc'),
              'isi_user' => $this->input->post('user'),
            );
            if($this->db->insert('ic_issue_d',$data))
              {

                $this->db->select('*');
                $this->db->where('store_matcode',$matcode);
                $qu = $this->db->get('store');
                $res = $qu->result();
                foreach ($res as $va) {
                  $st_qty = $va->store_qty;
                }
                $issue = $st_qty-$xqty;
               try {
                     $uptst = array(
                        'store_qty' => $issue,
                        'store_recqty' => $xqty,
                        'store_total'=> $issue
                      );
                     $this->db->where('store_matcode',$matcode);
                     $this->db->update('store',$uptst);
                } catch (Exception $e) {
                  echo $e;
                }
                
                echo $doccode;
                 return true;
              }
            else
              {
                return false;
              }
        }

        public function del_docissue_d()
        {
         $id =  $this->input->post('id');
         $ref = $this->input->post('ref');
         $matcode = $this->input->post('matcode');
         $xqty = $this->input->post('xqty');
         try {
               $this->db->delete('ic_issue_d', array('isi_id' => $id)); 

                $this->db->select('*');
                $this->db->where('store_matcode',$matcode);
                $qu = $this->db->get('store');
                $res = $qu->result();
                foreach ($res as $va) {
                  $st_qty = $va->store_qty;
                }
                $issue = $st_qty+$xqty;
               
                     $uptst = array(
                        'store_qty' => $issue,
                        'store_total'=> $issue
                      );
                     $this->db->where('store_matcode',$matcode);
                     $this->db->update('store',$uptst);
                } catch (Exception $e) {
                  echo $e;
                }

         echo $ref;
         return true;
        }

        public function edit_docissue_d()
        {
          $id = $this->input->post('id');
          $ref = $this->input->post('ref');
          $xqty = $this->input->post('xqty');
          $matcode = $this->input->post('matcode');
          $putqty = $this->input->post('putqty');
          $matname = $this->input->post('matname');
          $unit = $this->input->post('unit');
          $remark = $this->input->post('remark');

          $this->db->select('*');
          $this->db->where('store_matcode',$matcode);
          $que = $this->db->get('store');
          $res = $que->result();
          foreach ($res as $st) {
            $sqty = $st->store_qty;
          }
          
            $tot =  $sqty+$xqty-$putqty;
            try {
                $udtisi = array(
                  'isi_xqty'=> $putqty,
                  'isi_matcode'=> $matcode,
                  'isi_matname' => $matname,
                  'isi_unit' => $unit,
                  'isi_remark' => $remark
                  );
                $this->db->where('isi_id',$id);
                $this->db->update('ic_issue_d',$udtisi);
                $udtst = array(
                  'store_qty' => $tot,
                  'store_recqty' => $putqty,
                  'store_total' => $tot
                  );
                $this->db->where('store_matcode',$matcode);
                $this->db->update('store',$udtst);
                echo $ref;
                return true;

            } catch (Exception $e) {
              echo $e;
            }
        }
        public function getporecdetail()
        {
          $pono = $this->input->post('pono');
          $this->db->select('*');
          $this->db->where('poi_ref',$pono);
          $query = $this->db->get('po_item');
          $res = $query->result();
          $i=1;
          foreach ($res as $vale) {
            if ($vale->poi_receive == "0") {
             $n = "0";
            }else{
               $num = $vale->poi_qty-$vale->poi_receive;
                $numrec = $vale->poi_qty-$num;
            }
           if($vale->poi_receive == "0"){ $o = "0";}else{$num = $vale->poi_qty-$vale->poi_receive; $o = $num;} 

                       $qty = $vale->poi_qty;
                       $rece = $vale->poi_receive;
                       $total = $qty-$rece;
                       if ($total=="0") {
                          $m = "<span class='label label-success'>รับสินค้าครบแล้ว</span>";
                       }else{
                          $m = '<button id="refee'.$i.'" class="bnt btn btn-xs btn-block btn-info" data-toggle="modal" data-target="#modaleditdetail'.$i.'">รับสินค้า</button>';
                       }
               echo '<tr >' .
                    '<td><p>'.$i.'</p></td>' .
                    '<td><p>'.$vale->poi_matname.'</p></td>' .
                    '<td><p>'.$vale->poi_costname.'</p></td>' .
                    '<td><p>'.$vale->poi_qty.'</p></td>' .
                    '<td><p id="recfu'.$i.'">'.$numrec.'</p><input type="hidden" id="recfun'.$i.'" readonly="true" class="form-control input-sm" name="recfu[]" value="'.$o.'"></td>' .
                    '<td><p id="receive'.$i.'">'.$o.'</p><input type="hidden" id="receivein'.$i.'" readonly="true" class="form-control input-sm" name="receivein[]" value="'.$o.'"></td>' .
                    '<td><p id="btna'.$i.'">'.$m.'</p></td>' .
                  '</tr>'
                  
                  ;

                 
                 $i++; }
          return true;
      }
      public function modalporeceive()
      {
        $pono = $this->input->post('pono');
          $this->db->select('*');
          $this->db->where('poi_ref',$pono);
          $query = $this->db->get('po_item');
          $rese = $query->result();
          $i=1;
           foreach ($rese as $valee) {
              if($valee->poi_receive == "0"){ $q = $valee->poi_qty;}else{$num = $valee->poi_qty-$valee->poi_receive; $q = $num;} 
          if($valee->poi_receive == "0"){ $w = "0";}else{$num = $valee->poi_qty-$valee->poi_receive; $numrec = $valee->poi_qty-$num; $w = $numrec;}
                     
            echo  '<div>'.
                  '<div class="modal fade" id="modaleditdetail'.$valee->poi_id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'.
                    '<div class="modal-dialog">'.
                      '<div class="modal-content">'.
                        '<div class="modal-header" style="background:#00008b; color:#fff;">'.
                          '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.
                          '<h4 class="modal-title" id="myModalLabel">รับสินค้ารายการ '.$valee->poi_matname.' '.$valee->poi_ref.'</h4>'.
                        '</div>'.
                          '<div class="modal-body">'.
                            '<div class="row">'.
                              '<div class="col-md-6">'.
                                '<div class="form-group">'.
                                  '<p>Material Name: '.$valee->poi_matname.'</p>'.
                                  '<br>'.
                                  '<p>จำนวนที่สั่งซื้อ: '.$valee->poi_qty.'</p>'.
                                  '<input type="hidden" class="on form-control input-sm" id="poi_qty'.$i.'" value="'.$valee->poi_qty.'">'.
                                  '<strong>จำนวนคงค้าง: <p id="stq'.$i.'">'.$q.'</p></strong>'.
                                  '<strong>จำนวนที่รับแล้ว: <p id="sqr'.$i.'">'.$w.'</p></strong>'.
                                  '<input type="hidden" class="on form-control input-sm" id="tot'.$i.'" value="'.$w.'">'.
                                '</div>'.
                              '</div>'.
                               '<div class="col-md-6">'.
                                    '<strong><p>จำนวนที่รับสินค้า</p></strong>'.
                                    '<input type="text" class="on form-control input-sm" id="remark2'.$i.'" value="'.$q.'">'.
                                    '<input type="hidden" id="id'.$i.'" value="'.$valee->poi_id.'">'.
                                    '<input type="hidden" id="ref'.$i.'" value="'.$valee->poi_ref.'">'.
                                    '<button id="sitem'.$i.'"  data-dismiss="modal" class="btnsend btn btn-primary btn-xs" style="margin-top:10px;">รับสินค้า</button>'.
                                '</div>'.
                            '</div>'.
                          '</div>'.
                           '<div class="modal-footer">'.
                              '<button type="button" class="btnclose btn btn-default" data-dismiss="modal">ปิด</button>'.
                            '</div>'.
                          '</div>'.
                      '</div>'.
                    '</div>'.
                  '</div>'.
                  '</div>'.
                  '<script>'.
                  '$("#sitem'.$i.'").click(function(){'.
                  'var receive'.$i.' = $("#remark2'.$i.'").val();'.
                  'var poi_qty'.$i.' = $("#poi_qty'.$i.'").val();'.
                  'var tot'.$i.' = $("#tot'.$i.'").val();'.
                  'var aa'.$i.' = (parseInt(receive'.$i.')+parseInt(tot'.$i.'));'.
                  'var vm'.$i.' =  (parseInt(aa'.$i.')-parseInt(poi_qty'.$i.'));'.
                  '$("#receive'.$i.'").html(vm'.$i.');'.
                  '$("#receivein'.$i.'").val(vm'.$i.');'.
                  '$("#recfu'.$i.'").html(aa'.$i.');'.
                  '$("#recfun'.$i.'").val(aa'.$i.');'.
                  '$("#stq'.$i.'").html(vm'.$i.');'.
                  '$("#sqr'.$i.'").html(aa'.$i.');'.
                   '$("#refee'.$i.'").attr("class", "label label-success");'.
                   '$("#refee'.$i.'").prop("disabled",true);'.
                   '$("#refee'.$i.'").text("รับสินค้าครบแล้ว");'.
                  '});'.
                  '</script>'
                  ;
          $i++; }
          return true;
      }

}