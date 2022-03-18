
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class po_active extends CI_Controller {
          public function __construct() {
            parent::__construct();
            $this->load->model('datastore_m');
            $this->load->Model('office_m');
            $this->load->helper('date');
        }
public function addpo()
{
  try {
    $session_data = $this->session->userdata('logged_in');
            $data['res'] = $this->datastore_m->getvender();
            $data['getpr'] = $this->office_m->getprapprove();
            $data['resmem'] = $this->datastore_m->getmember();
            $data['getproj'] = $this->datastore_m->getproject();
            $data['getdep'] = $this->datastore_m->department();
            $data['getunit'] = $this->datastore_m->getunit();
             $data['allmaterial'] = $this->datastore_m->allmaterial();
            $data['allcostcode'] = $this->datastore_m->allcostcode();
           ////////////////////////////// run no///////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////////////////
  $this->load->library('form_validation');
          $add = $this->input->post();
          $this->form_validation->set_rules('team','team','required');
          if ($this->form_validation->run() == FALSE) {
          //////////////////////////////////////////////////////////////////////////
             $session_data = $this->session->userdata('logged_in');
          $username = $session_data['username'];
         $data['username'] = $session_data['username'];
        $data['name'] = $session_data['m_name'];
        $data['dep'] = $session_data['m_dep'];
        $data['email'] = $session_data['m_email'];
        $data['project'] = $session_data['m_project'];
        $data['mpm'] = $session_data['mpm'];
        $data['moffce'] = $session_data['moffce'];
        $data['mpo'] = $session_data['mpo'];
        $data['mic'] = $session_data['mic'];
        $data['map'] = $session_data['map'];
        $data['mar'] = $session_data['mar'];
        $data['approve'] = $session_data['approve'];
        $data['pc_approve'] = $session_data['pc_approve'];
        $data['master'] = $session_data['master'];
        $data['user_right'] = $session_data['user_right'];
        $this->load->model('datastore_m');
         $data['imgu'] = $this->datastore_m->changeprofile($username);
         $data['compimg'] = $this->datastore_m->companyimg();

            $data['res'] = $this->datastore_m->getvender();
            $data['getpr'] = $this->office_m->getprapprove();
            $data['resmem'] = $this->datastore_m->getmember();
            $data['getproj'] = $this->datastore_m->getproject();
            $data['getdep'] = $this->datastore_m->department();
            $data['getunit'] = $this->datastore_m->getunit();
             $data['allmaterial'] = $this->datastore_m->allmaterial();
            $data['allcostcode'] = $this->datastore_m->allcostcode();
            $this->load->view('navtail/base_master/header_v');
          $this->load->view('base/office_menu_v',$data);
           $this->load->view('office/purchase/newpo_v',$data);
          $this->load->view('base/footer_v');
          ///////////////////////////////////////////////////////////////////////////
          }else{
////////////////////////////////////////////////////runno
 $session_data = $this->session->userdata('logged_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
$id = $this->input->post('putproject');
          $dptcode = $this->input->post('putdpt');
           $prno = $this->input->post('prno');
          $datestring = "Y";

                            $this->db->select('*');
                            $this->db->where('project_id',$id);
                            $this->db->order_by('project_id','desc');
                            $this->db->limit('1');
                            $qp = $this->db->get('project');
                            $runp= $qp->result();
                            foreach ($runp as $valc)
                            {
                                $p1 =  $valc->project_id;

                            }
                            $this->db->select('*');
                            $this->db->where('department_id',$dptcode);
                            $this->db->order_by('department_id','desc');
                            $this->db->limit('1');
                            $qp = $this->db->get('department');
                            $runa= $qp->result();
                            foreach ($runa as $vald)
                            {
                                $d1 =  $vald->department_id;
                            }


                              $this->db->select('*');
                              $qu = $this->db->get('po');
                              $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
                                if ($res==0) {
                                         if($id == "0")
                                          {
                                            $pono = date($datestring)."-".$d1."-"."1";
                                            $popoid = "1";
                                          }
                                          elseif ($dptcode == "")
                                          {
                                            $pono = date($datestring)."-".$p1."-"."1";
                                            $popoid = "1";
                                          }
                                }
                                else
                                {
                                            $this->db->select('*');
                                            $this->db->order_by('po_poid','desc');
                                            $this->db->limit('1');
                                            $q = $this->db->get('po');
                                            $run = $q->result();
                                            foreach ($run as $valx)
                                            {
                                                $x1 = $valx->po_poid+1;

                                            }
                                            if($id == "0")
                                            {

                                              $pono = date($datestring)."-".$d1."-".$x1;
                                              $popoid = $x1;
                                            }
                                            elseif ($dptcode == "")
                                            {
                                              $pono = date($datestring)."-".$p1."-".$x1;
                                              $popoid = $x1;
                                            }
                                }

/////////////////////////////////////////////////////end runno


          $data = array(
            'po_pono' => $pono,
            'po_podate' => $add['podate'],
            'po_poid' => $popoid,
            'po_project' => $add['putproject'],
            'po_system' => $add['system'],
            'compcode' => 'meka',
            'po_department' => $add['putdpt'],
            'po_prname' => $add['memname'],
            'po_vender' => $add['vender'],
            'po_trem' => $add['team'],
            'po_contact' => $add['contact'],
            'po_prno' => $add['prno'],
            'po_contactno' => $add['contactno'],
            'po_quono' => $add['quono'],
            'po_deliverydate' => $add['deliverydate'],
            'po_place' => $add['place'],
            'po_remark' => $add['remarkh'],
            'useradd' => $username,
            'compcode' => $compcode,
            'usercreate' =>  date('Y-m-d H:i:s',now())
            );
          $this->db->insert('po',$data);
          $id  = $this->db->insert_id();
          for ($i=0; $i < count($add['qty']); $i++) {
            $data_d = array(
              'poi_matname' => $add['matname'][$i],
              'poi_matcode' => $add['matcode'][$i],
              'poi_ref' => $pono,
              'poi_costcode' => $add['costcode'][$i],
              'poi_costname' => $add['costname'][$i],
              'poi_qty' => $add['qty'][$i],
              'poi_unit' => $add['unit'][$i],
              'poi_priceunit' => $add['priceunit'][$i],
              'poi_amount' => $add['amount'][$i],
              'poi_discountper1' => $add['discountper1'][$i],
              'poi_discountper2' => $add['discountper2'][$i],
              'poi_disamt' => $add['disamt'][$i],
              'poi_vat' => $add['vat'][$i],
              'poi_remark' => $add['remark'][$i],
              'poi_netamt' => $add['netamt'][$i],
              'compcode' => $compcode
              );
            $this->db->insert('po_item',$data_d);
               $data_prd = array(
              'pri_status' => "open"
              );
            $this->db->where('pri_id',$add['id'][$i]);
             $qq = $this->db->update('pr_item',$data_prd);
               if ($qq) {

            $this->db->select('*');
            $this->db->where('ri_ref',$add['ref'][$i]);
            $this->db->where('pri_status','open');
            $tt = $this->db->get('pr_item');
            $rr = $tt->num_rows();

            $this->db->select('*');
            $this->db->where('pr_prno',$add['ref'][$i]);
            $tr = $this->db->get('pr');
            $rt = $tr->result();
            foreach ($rt as $ue) {
              $cc = $ue->po_count;
            }
            if ($rr==$cc) {
              $uptppr = array(
                'po_open' => "open"
                );
              $this->db->where('pr_prno',$prno);
              $this->db->update('pr',$uptppr);
          }

    }
          }
           redirect('index.php/report/report_po/'.$pono.'');


          }
  } catch (Exception $e) {
    return;
  }

}
  		public function inspodetail()
        {
          $id = $this->input->post('ponoi');
          $prno = $this->input->post('prno');
          $data = array(
              'poi_ref' => $this->input->post('ponoi'),
              'poi_qty' => $this->input->post('pqty'),
              'poi_unit' => $this->input->post('punit'),
              'poi_priceunit' =>$this->input->post('pprice_unit'),
              'poi_amount' => $this->input->post('pamount'),
              'poi_discountper1' => $this->input->post('pdiscper1'),
              'poi_discountper2' => $this->input->post('pdiscper2'),
              'po_disex' => $this->input->post('pdiscex'),
              'poi_disamt' => $this->input->post('pdisamt'),
              'poi_vat' => $this->input->post('pvat'),
              'poi_netamt' => $this->input->post('pnetamt'),
              'poi_remark' => $this->input->post('premark'),
              'poi_costcode' => $this->input->post('codecostcode'),
              'poi_costname' => $this->input->post('costname'),
              'poi_matcode' => $this->input->post('matcodeb6'),
              'poi_matname' => $this->input->post('matname')
            );
           $this->db->insert('po_item',$data);
          $datapr = array(
          	'pri_ref'  => $this->input->post('prno'),
              'pri_unit' => $this->input->post('punit'),
              'pri_remark' => $this->input->post('premark'),
              'pri_costcode' => $this->input->post('codecostcode'),
              'pri_costname' => $this->input->post('costname'),
              'pri_matcode' => $this->input->post('matcodeb6'),
              'pri_matname' => $this->input->post('matname'),
              'pri_qty' => $this->input->post('pqty'),
              'pri_amount' => $this->input->post('pamount'),
              'pri_priceunit' =>$this->input->post('pprice_unit'),
              'pri_discountper1' => $this->input->post('pdiscper1'),
              'pri_discountper2' => $this->input->post('pdiscper2'),
              'pri_disamt' => $this->input->post('pdisamt'),
              'pri_vat' => $this->input->post('pvat'),
              'pri_netamt' => $this->input->post('pnetamt'),
              'pri_status' => "open",
              'pri_pono' => $this->input->post('ponoi')
            );
         $this->db->insert('pr_item',$datapr);
          echo $prno;
           return true;
        }
          public function editinspodetail()
        {
          $id = $this->input->post('ponoi');
          $prno = $this->input->post('prno');
          $data = array(
              'poi_ref' => $this->input->post('ponoi'),
              'poi_qty' => $this->input->post('pqty'),
              'poi_unit' => $this->input->post('punit'),
              'poi_priceunit' =>$this->input->post('pprice_unit'),
              'poi_amount' => $this->input->post('pamount'),
              'poi_discountper1' => $this->input->post('pdiscper1'),
              'poi_discountper2' => $this->input->post('pdiscper2'),
              'po_disex' => $this->input->post('pdiscex'),
              'poi_disamt' => $this->input->post('pdisamt'),
              'poi_vat' => $this->input->post('pvat'),
              'poi_netamt' => $this->input->post('pnetamt'),
              'poi_remark' => $this->input->post('premark'),
              'poi_costcode' => $this->input->post('codecostcode'),
              'poi_costname' => $this->input->post('costname'),
              'poi_matcode' => $this->input->post('matcodeb6'),
              'poi_matname' => $this->input->post('matname')
            );
           $this->db->insert('po_item',$data);
          $datapr = array(
            'pri_ref'  => $this->input->post('prno'),
              'pri_unit' => $this->input->post('punit'),
              'pri_remark' => $this->input->post('premark'),
              'pri_costcode' => $this->input->post('codecostcode'),
              'pri_costname' => $this->input->post('costname'),
              'pri_matcode' => $this->input->post('matcodeb6'),
              'pri_matname' => $this->input->post('matname'),
              'pri_qty' => $this->input->post('pqty'),
              'pri_amount' => $this->input->post('pamount'),
              'pri_priceunit' =>$this->input->post('pprice_unit'),
              'pri_discountper1' => $this->input->post('pdiscper1'),
              'pri_discountper2' => $this->input->post('pdiscper2'),
              'pri_disamt' => $this->input->post('pdisamt'),
              'pri_vat' => $this->input->post('pvat'),
              'pri_netamt' => $this->input->post('pnetamt'),
              'pri_status' => "open",
              'pri_pono' => $this->input->post('ponoi')
            );
         $this->db->insert('pr_item',$datapr);
          echo $prno;
           return true;
        }

        public function editpo()
        {
          $pono = $this->input->post('pono');
           $data = array(
            'po_project' => $this->input->post('project'),
            'po_system' => $this->input->post('system'),
            'po_podate' => $this->input->post('podate'),
            'po_department' => $this->input->post('department'),
            'po_prname' => $this->input->post('memname'),
            'po_vender' => $this->input->post('vender'),
            'po_trem' => $this->input->post('team'),
            'po_contact' => $this->input->post('contact'),
            'po_prno' => $this->input->post('prno'),
            'po_contactno' => $this->input->post('contactno'),
            'po_quono' => $this->input->post('quono'),
            'po_deliverydate' => $this->input->post('deliverydate'),
            'po_place' => $this->input->post('place'),
            'po_remark' => $this->input->post('remark')
          );
           $this->db->where('po_pono',$pono);
          $q = $this->db->update('po',$data);

          if($q)
          {
            echo $pono;
            return true;
          }
          else
          {
            return false;
          }
        }
        public function getpr()
        {
          $id = $this->input->post('prno');
          $this->db->select('*');
          $this->db->where('pri_ref',$id);
          $this->db->where('pri_status', null);
          $this->db->where('pri_pono', null);
          $q = $this->db->get('pr_item');
          $res = $q->result();
          $i=1;
          foreach ($res as $vale) {
            if ($vale->pri_matcode=="") {
              ////////////////////  สีแดง
               echo '<tr >' .
          '<th><p>'.$i.'</p></th>' .
          '<td><p id="a'.$i.'">'.$vale->pri_costname.'<p><input type="hidden" id="costname'.$i.'" readonly="true" class="form-control input-sm" name="costname[]" value="'.$vale->pri_costname.'"></td>' .
          '<td><small class="text-danger" id="b'.$i.'">'.$vale->pri_matname.'</small><input type="hidden" id="matname'.$i.'" readonly="true" class="form-control input-sm" name="matname[]" value="'.$vale->pri_matname.'"></td>' .
          '<td><p id="c'.$i.'">'.$vale->pri_qty.'</p><input type="hidden" readonly="true" id="qty'.$i.'" class="form-control input-sm" name="qty[]" value="'.$vale->pri_qty.'"></td>' .
          '<td><p id="d'.$i.'">'.$vale->pri_unit.'</p><input type="hidden" readonly="true" id="unit'.$i.'" class="form-control input-sm" name="unit[]" value="'.$vale->pri_unit.'"></td>' .
          '<td><p id="e'.$i.'">'.$vale->pri_priceunit.'</p><input type="hidden" id="priceunit'.$i.'" readonly="true" class="form-control input-sm" name="priceunit[]" value="'.$vale->pri_priceunit.'"></td>' .
          '<td><p id="f'.$i.'">'.$vale->pri_amount.'</p><input type="hidden" id="amount'.$i.'" readonly="true" class="form-control input-sm" name="amount[]" value="'.$vale->pri_amount.'"></td>' .
          '<td><a class="btn btn-info btn-xs btn-block" data-toggle="modal" data-target="#edit'.$i.'"> แก้ไข</a></td>'.
          '<td><a class="delete  btn btn-danger btn-xs btn-block"> ลบ</a>'.
          '<input type="hidden" id="costcode'.$i.'" name="costcode[]" value="'.$vale->pri_costcode.'" />'.
          '<input type="hidden" id="matcode'.$i.'" name="matcode[]" value="'.$vale->pri_matcode.'" />'.
          '<input type="hidden" id="discountper1'.$i.'" name="discountper1[]" value="'.$vale->pri_discountper1.'" />'.
          '<input type="hidden" id="discountper2'.$i.'" name="discountper2[]" value="'.$vale->pri_discountper2.'" />'.
          '<input type="hidden" id="disamt'.$i.'" name="disamt[]" value="'.$vale->pri_disamt.'" />'.
          '<input type="hidden" id="vat'.$i.'" name="vat[]" value="'.$vale->pri_vat.'" />'.
          '<input type="hidden" id="remark'.$i.'" name="remark[]" value="'.$vale->pri_remark.'" />'.
          '<input type="hidden" id="netamt'.$i.'" name="netamt[]" value="'.$vale->pri_netamt.'" />'.
          '<input type="hidden" id="ref'.$i.'" name="ref[]" value="'.$vale->pri_ref.'" />'.
          '<input type="hidden" id="id'.$i.'" name="id[]" value="'.$vale->pri_id.'" /></td>'.

        '</tr>';
            }else{
              /////////////////// สีปกติ
          echo '<tr >' .
          '<th><p>'.$i.'</p></th>' .
          '<td><p id="a'.$i.'">'.$vale->pri_costname.'<p><input type="hidden" id="costname'.$i.'" readonly="true" class="form-control input-sm" name="costname[]" value="'.$vale->pri_costname.'"></td>' .
          '<td><p id="b'.$i.'">'.$vale->pri_matname.'</p><input type="hidden" id="matname'.$i.'" readonly="true" class="form-control input-sm" name="matname[]" value="'.$vale->pri_matname.'"></td>' .
          '<td><p id="c'.$i.'">'.$vale->pri_qty.'</p><input type="hidden" readonly="true" id="qty'.$i.'" class="form-control input-sm" name="qty[]" value="'.$vale->pri_qty.'"></td>' .
          '<td><p id="d'.$i.'">'.$vale->pri_unit.'</p><input type="hidden" readonly="true" id="unit'.$i.'" class="form-control input-sm" name="unit[]" value="'.$vale->pri_unit.'"></td>' .
          '<td><p id="e'.$i.'">'.$vale->pri_priceunit.'</p><input type="hidden" id="priceunit'.$i.'" readonly="true" class="form-control input-sm" name="priceunit[]" value="'.$vale->pri_priceunit.'"></td>' .
          '<td><p id="f'.$i.'">'.$vale->pri_amount.'</p><input type="hidden" id="amount'.$i.'" readonly="true" class="form-control input-sm" name="amount[]" value="'.$vale->pri_amount.'"></td>' .
          '<td><a class="btn btn-info btn-xs btn-block" data-toggle="modal" data-target="#edit'.$i.'"> แก้ไข</a></td>'.
          '<td><a class="delete  btn btn-danger btn-xs btn-block"> ลบ</a>'.
          '<input type="hidden" id="costcode'.$i.'" name="costcode[]" value="'.$vale->pri_costcode.'" />'.
          '<input type="hidden" id="matcode'.$i.'" name="matcode[]" value="'.$vale->pri_matcode.'" />'.
          '<input type="hidden" id="discountper1'.$i.'" name="discountper1[]" value="'.$vale->pri_discountper1.'" />'.
          '<input type="hidden" id="discountper2'.$i.'" name="discountper2[]" value="'.$vale->pri_discountper2.'" />'.
          '<input type="hidden" id="disamt'.$i.'" name="disamt[]" value="'.$vale->pri_disamt.'" />'.
          '<input type="hidden" id="vat'.$i.'" name="vat[]" value="'.$vale->pri_vat.'" />'.
          '<input type="hidden" id="remark'.$i.'" name="remark[]" value="'.$vale->pri_remark.'" />'.
          '<input type="hidden" id="netamt'.$i.'" name="netamt[]" value="'.$vale->pri_netamt.'" />'.
          '<input type="hidden" id="ref'.$i.'" name="ref[]" value="'.$vale->pri_ref.'" />'.
          '<input type="hidden" id="id'.$i.'" name="id[]" value="'.$vale->pri_id.'" /></td>'.

        '</tr>';
       }
        $i++; }

          return true;
      }
      public function modal()
      {
        $id = $this->input->post('prno');
          $this->db->select('*');
          $this->db->where('pri_ref',$id);
          $q = $this->db->get('pr_item');
          $res = $q->result();

          $i=1;
          foreach ($res as $vale) {
             if ($vale->pri_matcode=="") {
                  echo   '<div>'.
  '<div class="modal fade" id="edit'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'.
  '<div class="modal-dialog">'.
    '<div class="modal-content">'.
      '<div class="modal-header" style="background:#00008b; color:#fff;">'.
      '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.
      '<h4 class="modal-title" id="myModalLabel">แก้ไขรายการ '.$i.'</h4>'.
      '</div>'.
        '<div class="modal-body">'.
          '<div class="row">'.
              '<div class="col-xs-12">'.
                           '<label for="">รายการซื้อ</label>'.
                            '<div class="input-group has-error" id="error'.$i.'">'.

                            '<span class="input-group-addon">'.
                              '<input type="checkbox" id="chk'.$i.'" aria-label="กำหนดเอง">'.
                            '</span>'.

                                '<input type="text" id="newmatname'.$i.'"  placeholder="เลือกรายการซื้อ" value="'.$vale->pri_matname.'" class="form-control input-sm">'.

                              '<input type="hidden" id="newmatcode'.$i.'"  placeholder="เลือกรายการซื้อ" value="'.$vale->pri_matcode.'" class="form-control input-sm">'.
                                '<span class="input-group-btn" >'.
                                '<a href="http://localhost:8888/demomeka/index.php/datastore/matcode" target="_blank" class="chnew'.$i.' btn btn-danger btn-sm"><span class="glyphicon glyphicon-plus"></span> เพิ่ม</a>'.
                                  '<button id="openunc'.$i.'" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#opnewmated'.$i.'"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>'.
                                '</span>'.
                            '</div>'.

              '</div>'.
              '</div>'.
              '<div class="row">'.
              '<div class="col-xs-12">'.
                            '<label for="">รายการต้นทุน</label>'.
                              '<div class="input-group">'.
                                '<input type="text" id="costnameint'.$i.'" value="'.$vale->pri_costname.'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm">'.
                                '<input type="hidden" id="codecostcodeint'.$i.'" value="'.$vale->pri_costcode.'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm">'.
                                  '<span class="input-group-btn" >'.
                                    '<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#costcodeed'.$i.'"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>'.
                                  '</span>'.
                              '</div>'.
                            '</div>'.
          '</div>'.
          '<div class="row">'.
              '<div class="col-md-6">'.
                '<div class="form-group">'.
                          '<label for="qty">ปริมาณ</label>'.
                          '<input type="text" id="pqty'.$i.'" value="'.$vale->pri_qty.'" name="qtyeditedit"  placeholder="กรอกปริมาณ" class="form-control">'.
                '</div>'.
              '</div>'.
              '<div class="col-xs-6">'.
                                '<div class="input-group">'.
                                  '<label for="unit">หน่วย</label>'.
                                  '<input type="text" id="punit'.$i.'" value="'.$vale->pri_unit.'" readonly="true" placeholder="กรอกหน่วย" class="form-control input-sm">'.
                                '<span class="input-group-btn" >'.
                                  '<button class="openun btn btn-primary btn-sm" data-toggle="modal" data-target="#openunited" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>'.
                                '</span>'.
                              '</div>'.
                            '</div>'.
          '</div>'.
           '<div class="row">'.
              '<div class="col-md-6">'.
                '<div class="form-group">'.
                          '<label for="price_unit">ราคา/หน่วย</label>'.
                          '<input type="text" id="pprice_unit'.$i.'" value="'.$vale->pri_priceunit.'" name="price_unit" placeholder="กรอกราคา/หน่วย" class="form-control">'.
                '</div>'.
              '</div>'.
              '<div class="col-md-6">'.
                '<div class="form-group">'.
                          '<label for="amount">จำนวนเงิน</label>'.
                          '<input type="text" id="pamount'.$i.'" value="'.$vale->pri_amount.'" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="form-control">'.
                '</div>'.
              '</div>'.
          '</div>'.
           '<div class="row">'.
                '<div class="col-md-6">'.
                  '<div class="form-group">'.

                     '<label for="endtproject">ส่วนลด 1 (%)</label>'.
                     '<input type="text" id="pdiscper1'.$i.'" name="discountper1" placeholder="กรอกส่วนลด" class="form-control"  />'.
                  '</div>'.
                '</div>'.
                    '<div class="col-md-6">'.
                      '<div class="form-group">'.
                         '<label for="endtproject">ส่วนลด 2 (%)</label>'.
                         '<input type="text" id="pdiscper2'.$i.'"  name="discountper2" placeholder="กรอกส่วนลด" class="form-control" />'.
                      '</div>'.
                    '</div>'.
          '</div>'.
            '<div class="row">'.
              '<div class="col-md-6">'.
                  '<div class="form-group">'.
                   '<label for="endtproject">ส่วนลดพิเศษ</label>'.
                   '<input type="text" id="pdiscex'.$i.'"  name="discountper2" class="form-control" />'.
                  '</div>'.
              '</div>'.
              '<div class="col-md-4">'.
                    '<div class="form-group">'.
                     '<label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>'.
                     '<input type="text" id="pdisamt'.$i.'" name="disamt" class="form-control" />'.
                    '</div>'.
              '</div>'.
              '<div class="col-md-2">'.
          '<div class="form-group">'.
              '<button id="chkpricecre'.$i.'" class="btn btn-primary"style="margin-top:25px;">ดูราคา</button>'.
          '</div>'.
        '</div>'.
            '</div>'.
            '<div class="row">'.
                 '<div class="col-md-4">'.
                  '<div class="form-group">'.
                     '<label for="endtproject">จำนวนเงินสุทธิ</label>'.

                     '<input type="text"id="pnetamt'.$i.'" name="netamt" class="form-control" />'.
                   '</div>'.
                  '</div>'.
            '</div>'.
          '<div class="row">'.
            '<div class="col-md-12">'.
                  '<div class="form-group">'.
                     '<label for="endtproject">หมายเหตุ</label>'.

                     '<input type="text" id="premark'.$i.'" value="'.$vale->pri_remark.'" name="remark" class="form-control" />'.
                  '</div>'.
            '</div>'.
          '</div>'.
           '<div class="row">'.
              '<div class="col-md-6">'.
                '<div class="form-group">'.
                    '<input type="hidden" name="poid" value="">'.
                    '<button type="submit" id="changepodetail'.$i.'" data-dismiss="modal" class="btn btn-primary">ยืนยันการเพิ่มข้อมูล</button>'.
                    '<button class="btn btn-default" data-dismiss="modal">ยกเลิก</button>'.
                '</div>'.
              '</div>'.
          '</div>'.
      '</div>'.
    '</div>'.
  '</div>'.
 '</div>'.
 '</div>'.
 ////////////////////
// '<script>'.
//     '$("#openunc'.$i.'").click(function() {'.
//     '$("#getmaterial'.$i.'").html("<img  src='.'http://localhost:8888/demomeka/dist/img/loading.gif'.'>");'.
//     '$("#getmaterial'.$i.'").load("http://localhost:8888/demomeka/index.php/purchase/getmaterial");'.
// '});'.
//  '</script>'.
 ///////////////////
 '<script>'.
//  ' $(document).ready(function() {'.
  '$("#pdiscex'.$i.'").val("0");'.
  '$("#newmatname'.$i.'").prop("disabled", true);'.
  '});'.
  '$("#chk'.$i.'").click(function(event) {'.
  'if($("#chk'.$i.'").prop("checked")) {'.
   '$("#newmatname'.$i.'").prop("disabled", false);'.
'} else {'.
    '$("#newmatname'.$i.'").prop("disabled", true);'.
'}'.
// '});'.
'$("#changepodetail'.$i.'").click(function(){'.

  'var matname'.$i.' = $("#newmatname'.$i.'").val();'.
  '$("#matname'.$i.'").val(matname'.$i.');'.
  '$("#b'.$i.'").html(matname'.$i.');'.
  '$("#b'.$i.'").attr("class", "text-success");'.

  'var costname'.$i.' = $("#costnameint'.$i.'").val();'.
  '$("#costname'.$i.'").val(costname'.$i.');'.
  '$("#a'.$i.'").html(costname'.$i.');'.

  'var qty'.$i.' = $("#pqty'.$i.'").val();'.
  '$("#qty'.$i.'").val(qty'.$i.');'.
  '$("#c'.$i.'").html(qty'.$i.');'.

  'var unit'.$i.' = $("#punit'.$i.'").val();'.
  '$("#unit'.$i.'").val(unit'.$i.');'.
  '$("#d'.$i.'").html(unit'.$i.');'.

  'var priceunit'.$i.' = $("#pprice_unit'.$i.'").val();'.
  '$("#priceunit'.$i.'").val(priceunit'.$i.');'.
  '$("#e'.$i.'").html(priceunit'.$i.');'.

  'var amount'.$i.' = $("#pamount'.$i.'").val();'.
  '$("#amount'.$i.'").val(amount'.$i.');'.
  '$("#f'.$i.'").html(amount'.$i.');'.

  'var costcode'.$i.' = $("#codecostcodeint'.$i.'").val();'.
  '$("#costcode'.$i.'").val(costcode'.$i.');'.

  'var matcode'.$i.' = $("#newmatcode'.$i.'").val();'.
  '$("#matcode'.$i.'").val(matcode'.$i.');'.

  'var discountper1'.$i.' = $("#pdiscper1'.$i.'").val();'.
  '$("#discountper1'.$i.'").val(discountper1'.$i.');'.

  'var discountper2'.$i.' = $("#pdiscper2'.$i.'").val();'.
  '$("#discountper2'.$i.'").val(discountper2'.$i.');'.

  'var disamt'.$i.' = $("#pdiscex'.$i.'").val();'.
  '$("#disamt'.$i.'").val(disamt'.$i.');'.

  'var remark'.$i.' = $("#premark'.$i.'").val();'.
  '$("#remark'.$i.'").val(remark'.$i.');'.

  'var netamt'.$i.' = $("#pnetamt'.$i.'").val();'.
  '$("#netamt'.$i.'").val(netamt'.$i.');'.

'});'.
'</script>'.
'<script>'.
   '$("#chkpricecre'.$i.'").click(function(){'.
    'var xqty'.$i.' = $("#qty'.$i.'").val();'.
    'var xprice'.$i.' = $("#pprice_unit'.$i.'").val();'.
    'var xamount'.$i.' = xqty'.$i.'*xprice'.$i.';'.
    'var xdiscper1'.$i.' = $("#pdiscper1'.$i.'").val();'.
    'var xdiscper2'.$i.' = $("#pdiscper2'.$i.'").val();'.
    'var xdiscper3'.$i.' = $("#pdiscex'.$i.'").val();'.
    'var xpd1'.$i.' = xamount'.$i.' - (xamount'.$i.'*xdiscper1'.$i.')/100;'.
    'var xpd2'.$i.' = xpd1'.$i.' - (xpd1'.$i.'*xdiscper2'.$i.')/100;'.
    'var xpd3'.$i.' = xpd2'.$i.' - (xpd1'.$i.'*xdiscper3'.$i.')/100;'.
    'var xvat'.$i.' = $("#pvatcre'.$i.'").val();'.

    '$("#pamount'.$i.'").val(xamount'.$i.');'.
    'if(xdiscper3'.$i.' != ""){'.
        'exdiss'.$i.' = xpd2'.$i.' - xdiscper3'.$i.';'.
        '$("#pnetamt'.$i.'").val(exdiss'.$i.');'.
        '$("#pdisamt'.$i.'").val(exdiss'.$i.');'.
      '}'.
    'else if(xdiscper2'.$i.' != ""){'.

             '$("#pdisamt'.$i.'").val(xpd2'.$i.');'.
             'vxpd2'.$i.' = xpd2'.$i.' - (xpd2'.$i.'*xvat'.$i.')/100;'.
            ' $("#pnetamt'.$i.'").val(vxpd2'.$i.')'.
    '}'.
    'else'.
    '{'.
    '$("#pdisamt'.$i.'").val(xpd1'.$i.');'.
        'vxpd1'.$i.' = xpd1'.$i.' - (xpd1'.$i.'*xvat'.$i.')/100;'.
        '$("#pnetamt'.$i.'").val(vxpd1'.$i.')'.
    '}'.


  '});'.
'</script>'
 ;

            }else{
          echo   '<div>'.
  '<div class="modal fade" id="edit'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'.
  '<div class="modal-dialog">'.
    '<div class="modal-content">'.
      '<div class="modal-header" style="background:#00008b; color:#fff;">'.
      '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.
      '<h4 class="modal-title" id="myModalLabel">แก้ไขรายการ '.$i.'</h4>'.
      '</div>'.
        '<div class="modal-body">'.
          '<div class="row">'.
              '<div class="col-xs-12">'.
                '<label for="">รายการซื้อ</label>'.


                            '<div class="input-group">'.
                            '<span class="input-group-addon">'.
                              '<input type="checkbox" id="chk'.$i.'" aria-label="กำหนดเอง">'.
                            '</span>'.

                                '<input type="text" id="newmatname'.$i.'"  placeholder="เลือกรายการซื้อ" value="'.$vale->pri_matname.'" class="form-control input-sm">'.

                              '<input type="hidden" id="newmatcode'.$i.'"  placeholder="เลือกรายการซื้อ" value="'.$vale->pri_matcode.'" class="form-control input-sm">'.
                                '<span class="input-group-btn" >'.
                                  '<button class="openun btn btn-primary btn-sm" data-toggle="modal" data-target="#opnewmated'.$i.'"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>'.
                                '</span>'.
                            '</div>'.

              '</div>'.
              '</div>'.
              '<div class="row">'.
              '<div class="col-xs-12">'.
                            '<label for="">รายการต้นทุน</label>'.
                              '<div class="input-group">'.
                                '<input type="text" id="costnameint'.$i.'" value="'.$vale->pri_costname.'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm">'.
                                '<input type="hidden" id="codecostcodeint'.$i.'" value="'.$vale->pri_costcode.'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm">'.
                                  '<span class="input-group-btn" >'.
                                    '<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#costcodeed'.$i.'"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>'.
                                  '</span>'.
                              '</div>'.
                            '</div>'.
          '</div>'.
          '<div class="row">'.
              '<div class="col-md-6">'.
                '<div class="form-group">'.
                          '<label for="qty">ปริมาณ</label>'.
                          '<input type="text" id="pqty'.$i.'" value="'.$vale->pri_qty.'" name="qtyeditedit"  placeholder="กรอกปริมาณ" class="form-control">'.
                '</div>'.
              '</div>'.
              '<div class="col-xs-6">'.
                                '<div class="input-group">'.
                                  '<label for="unit">หน่วย</label>'.
                                  '<input type="text" id="punit'.$i.'" value="'.$vale->pri_unit.'" readonly="true" placeholder="กรอกหน่วย" class="form-control input-sm">'.
                                '<span class="input-group-btn" >'.
                                  '<button class="openun btn btn-primary btn-sm" data-toggle="modal" data-target="#openunited" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>'.
                                '</span>'.
                              '</div>'.
                            '</div>'.
          '</div>'.
           '<div class="row">'.
              '<div class="col-md-6">'.
                '<div class="form-group">'.
                          '<label for="price_unit">ราคา/หน่วย</label>'.
                          '<input type="text" id="pprice_unit'.$i.'" value="'.$vale->pri_priceunit.'" name="price_unit" placeholder="กรอกราคา/หน่วย" class="form-control">'.
                '</div>'.
              '</div>'.
              '<div class="col-md-6">'.
                '<div class="form-group">'.
                          '<label for="amount">จำนวนเงิน</label>'.
                          '<input type="text" id="pamount'.$i.'" value="'.$vale->pri_amount.'" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="form-control">'.
                '</div>'.
              '</div>'.
          '</div>'.
           '<div class="row">'.
                '<div class="col-md-6">'.
                  '<div class="form-group">'.

                     '<label for="endtproject">ส่วนลด 1 (%)</label>'.
                     '<input type="text" id="pdiscper1'.$i.'" name="discountper1" placeholder="กรอกส่วนลด" class="form-control"  />'.
                  '</div>'.
                '</div>'.
                    '<div class="col-md-6">'.
                      '<div class="form-group">'.
                         '<label for="endtproject">ส่วนลด 2 (%)</label>'.
                         '<input type="text" id="pdiscper2'.$i.'"  name="discountper2" placeholder="กรอกส่วนลด" class="form-control" />'.
                      '</div>'.
                    '</div>'.
          '</div>'.
            '<div class="row">'.
              '<div class="col-md-6">'.
                  '<div class="form-group">'.
                   '<label for="endtproject">ส่วนลดพิเศษ</label>'.
                   '<input type="text" id="pdiscex'.$i.'"  name="discountper2" class="form-control" />'.
                  '</div>'.
              '</div>'.
              '<div class="col-md-4">'.
                    '<div class="form-group">'.
                     '<label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>'.
                     '<input type="text" id="pdisamt'.$i.'" name="disamt" class="form-control" />'.
                    '</div>'.
              '</div>'.
              '<div class="col-md-2">'.
          '<div class="form-group">'.
              '<button id="chkpricecre'.$i.'" class="btn btn-primary"style="margin-top:25px;">ดูราคา</button>'.
          '</div>'.
        '</div>'.
            '</div>'.
            '<div class="row">'.
                 '<div class="col-md-4">'.
                  '<div class="form-group">'.
                     '<label for="endtproject">จำนวนเงินสุทธิ</label>'.

                     '<input type="text"id="pnetamt'.$i.'" name="netamt" class="form-control" />'.
                   '</div>'.
                  '</div>'.
            '</div>'.
          '<div class="row">'.
            '<div class="col-md-12">'.
                  '<div class="form-group">'.
                     '<label for="endtproject">หมายเหตุ</label>'.

                     '<input type="text" id="premark'.$i.'" value="'.$vale->pri_remark.'" name="remark" class="form-control" />'.
                  '</div>'.
            '</div>'.
          '</div>'.
           '<div class="row">'.
              '<div class="col-md-6">'.
                '<div class="form-group">'.
                    '<input type="hidden" name="poid" value="">'.
                    '<button type="submit" id="changepodetail'.$i.'" data-dismiss="modal" class="btn btn-primary">ยืนยันการเพิ่มข้อมูล</button>'.
                    '<button class="btn btn-default" data-dismiss="modal">ยกเลิก</button>'.
                '</div>'.
              '</div>'.
          '</div>'.
      '</div>'.
    '</div>'.
  '</div>'.
 '</div>'.
 '</div>'.
////////////////////

 ///////////////////
 '<script>'.
//  ' $(document).ready(function() {'.
  '$("#pdiscex'.$i.'").val("0");'.
  '$("#newmatname'.$i.'").prop("disabled", true);'.
  '});'.
  '$("#chk'.$i.'").click(function(event) {'.
  'if($("#chk'.$i.'").prop("checked")) {'.
   '$("#newmatname'.$i.'").prop("disabled", false);'.
'} else {'.
    '$("#newmatname'.$i.'").prop("disabled", true);'.
'}'.
// '});'.
'$("#changepodetail'.$i.'").click(function(){'.

  'var matname'.$i.' = $("#newmatname'.$i.'").val();'.
  '$("#matname'.$i.'").val(matname'.$i.');'.
  '$("#b'.$i.'").html(matname'.$i.');'.

  'var costname'.$i.' = $("#costnameint'.$i.'").val();'.
  '$("#costname'.$i.'").val(costname'.$i.');'.
  '$("#a'.$i.'").html(costname'.$i.');'.

  'var qty'.$i.' = $("#pqty'.$i.'").val();'.
  '$("#qty'.$i.'").val(qty'.$i.');'.
  '$("#c'.$i.'").html(qty'.$i.');'.

  'var unit'.$i.' = $("#punit'.$i.'").val();'.
  '$("#unit'.$i.'").val(unit'.$i.');'.
  '$("#d'.$i.'").html(unit'.$i.');'.

  'var priceunit'.$i.' = $("#pprice_unit'.$i.'").val();'.
  '$("#priceunit'.$i.'").val(priceunit'.$i.');'.
  '$("#e'.$i.'").html(priceunit'.$i.');'.

  'var amount'.$i.' = $("#pamount'.$i.'").val();'.
  '$("#amount'.$i.'").val(amount'.$i.');'.
  '$("#f'.$i.'").html(amount'.$i.');'.

  'var costcode'.$i.' = $("#codecostcodeint'.$i.'").val();'.
  '$("#costcode'.$i.'").val(costcode'.$i.');'.

  'var matcode'.$i.' = $("#newmatcode'.$i.'").val();'.
  '$("#matcode'.$i.'").val(matcode'.$i.');'.

  'var discountper1'.$i.' = $("#pdiscper1'.$i.'").val();'.
  '$("#discountper1'.$i.'").val(discountper1'.$i.');'.

  'var discountper2'.$i.' = $("#pdiscper2'.$i.'").val();'.
  '$("#discountper2'.$i.'").val(discountper2'.$i.');'.

  'var disamt'.$i.' = $("#pdiscex'.$i.'").val();'.
  '$("#disamt'.$i.'").val(disamt'.$i.');'.

  'var remark'.$i.' = $("#premark'.$i.'").val();'.
  '$("#remark'.$i.'").val(remark'.$i.');'.

  'var netamt'.$i.' = $("#pnetamt'.$i.'").val();'.
  '$("#netamt'.$i.'").val(netamt'.$i.');'.

'});'.
'</script>'.
'<script>'.
   '$("#chkpricecre'.$i.'").click(function(){'.
    'var xqty'.$i.' = $("#qty'.$i.'").val();'.
    'var xprice'.$i.' = $("#pprice_unit'.$i.'").val();'.
    'var xamount'.$i.' = xqty'.$i.'*xprice'.$i.';'.
    'var xdiscper1'.$i.' = $("#pdiscper1'.$i.'").val();'.
    'var xdiscper2'.$i.' = $("#pdiscper2'.$i.'").val();'.
    'var xdiscper3'.$i.' = $("#pdiscex'.$i.'").val();'.
    'var xpd1'.$i.' = xamount'.$i.' - (xamount'.$i.'*xdiscper1'.$i.')/100;'.
    'var xpd2'.$i.' = xpd1'.$i.' - (xpd1'.$i.'*xdiscper2'.$i.')/100;'.
    'var xpd3'.$i.' = xpd2'.$i.' - (xpd1'.$i.'*xdiscper3'.$i.')/100;'.
    'var xvat'.$i.' = $("#pvatcre'.$i.'").val();'.

    '$("#pamount'.$i.'").val(xamount'.$i.');'.
    'if(xdiscper3'.$i.' != ""){'.
        'exdiss'.$i.' = xpd2'.$i.' - xdiscper3'.$i.';'.
        '$("#pnetamt'.$i.'").val(exdiss'.$i.');'.
        '$("#pdisamt'.$i.'").val(exdiss'.$i.');'.
      '}'.
    'else if(xdiscper2'.$i.' != ""){'.

             '$("#pdisamt'.$i.'").val(xpd2'.$i.');'.
             'vxpd2'.$i.' = xpd2'.$i.' - (xpd2'.$i.'*xvat'.$i.')/100;'.
            ' $("#pnetamt'.$i.'").val(vxpd2'.$i.')'.
    '}'.
    'else'.
    '{'.
    '$("#pdisamt'.$i.'").val(xpd1'.$i.');'.
        'vxpd1'.$i.' = xpd1'.$i.' - (xpd1'.$i.'*xvat'.$i.')/100;'.
        '$("#pnetamt'.$i.'").val(vxpd1'.$i.')'.
    '}'.


  '});'.
'</script>'
 ;
}
            $i++; }
            return true;
      }


}
