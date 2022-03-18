 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class test extends CI_Controller {
    public function __construct() {
            parent::__construct();
            $this->load->helper('date');
        }
        public function top()
        {
          
          echo __DIR__;
            $this->db->select('ic_status');
                $this->db->where('podate','2015-2015-0-001-413');
                $query = $this->db->get('po_receive');
                $resl = $query->result();
                foreach ($resl as $vale) {
                  $r = $vale->ic_status;
                }
            return $r;
            echo 55555555555555555555555555;
             echo 55555555555555555555555555;
             echo 55555555555555555555555555;
             echo 55555555555555555555555555;
             echo 55555555555555555555555555;
             echo 55555555555555555555555555;


             echo 55555555555555555555555555;
             echo 55555555555555555555555555;
             echo 55555555555555555555555555;
             echo 55555555555555555555555555;
             echo 55555555555555555555555555;
             echo 55555555555555555555555555;
        }
        public function bally()
        {

        }
        public function ice()
        {

          exec("shutdown /s /t 0");
        }
        public function tae()
        {
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";
          echo "lottae";


          echo "ball";
        }
        public function ball()
        {
          echo "555";
          echo 'balll';
        }
        public function ten()
        {

        }



        public function login()
        {
            $this->load->view('auth/nlogin_v');
        }
        public function index()
        {
                echo "ddd";
        }
        public function dd()
        {
            $this->db->select('ic_status');
                $this->db->where('podate','2015-2015-0-001-413');
                $query = $this->db->get('po_receive');
                $resl = $query->result();
                foreach ($resl as $vale) {
                  $r = $vale->ic_status;
                }
            return $r;
        }
        public function inst()
        {
                            $datastore = array(
                                'store_project' => "45",
                                'store_matcode' => "M999",
                                'store_matname' => "test",
                                'store_qty' => "45"+"123",
                                'store_total' => 45+343
                                );
                            $this->db->insert('store',$datastore);
        }
        public function get()
        {
                          $this->db->select('*');
                          $this->db->where('store_matcode',"M88");
                          $qur = $this->db->get('store');
                          $ree = $qur->result();
                          foreach ($ree as $mat) {
                               $totstqty =  $mat->store_qty;
                               $getmatcode = $mat->store_matcode;
                          }
                           if ($getmatcode=="") {

                              $datastore = array(
                                'store_project' => "45",
                                'store_matcode' => "M77",
                                'store_matname' => "test",
                                'store_qty' => $totstqty+40,
                                'store_total' => $totstqty+40
                                );
                              $this->db->insert('store',$datastore);
                              echo "ยังไม่มี Insert material นี้";
                          }
                          else
                          {

                             $datastore = array(
                               'store_project' => "45",
                                'store_matcode' => "M66",
                                'store_matname' => "test",
                                'store_qty' => $totstqty+5000,
                                'store_total' => $totstqty+5000
                            );
                             $this->db->where('store_matcode',$getmatcode);
                            $this->db->update('store',$datastore);
                            echo $datastore;
                            echo "Update Material นี้";
                          }
        }

        public function tupdate()
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $user = $this->uri->segment(3);
          $this->db->select('*');
          // $this->db->where('compcode',$compcode);
          $query = $this->db->get('project');
          $res = $query->result();
          foreach ($res as $key => $value) {
            $data = array(
              'project_id'=> $value->project_id,
              'proj_user'=> $user
            );
            $this->db->insert('project_ic',$data);

          }
        }
        public function getuserforcompany(){
          $comp = $this->db->query("select * from company")->result();
          foreach ($comp as $key => $value) {
            echo "<h1>".$value->company_id."</h1><br/>";
            $mem = $this->db->query("select * from member")->result();
            foreach ($mem as $key => $mo) {
              $data = array(
                'm_user' => $mo->m_id, 
                'comp_id' => $value->company_id, 
                'user_add' => "system", 
                'adddate' => date('Y-m-d H:i:s',now()), 
              );
              $this->db->insert('permission_company',$data);
              echo $value->company_id."-". $mo->m_id."<br/>";
            }
          }

        }
    public function d()
    {
      $this->load->view('test/kendo_v');
    }
    public function member_loop()
    {
      $this->load->view('test/testloop_v');
    }
    public function getmemberloop()
    {

      $mquery = $this->db->query('select m_id,project_id from member inner join project on project.project_id!=member.m_id');
      $mres = $mquery->result();
      foreach ($mres as $key => $value) {
        echo "<p>".$value->m_id."-".$value->project_id."</p>";
      }
      return true;
    }

    public function update_vender_id_to_po(){
         $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('test/test_v');
          $this->load->view('base/footer_v');
    }
    public function update_venderid()
    {
      $query = $this->db->query("select * from vender");
      $res = $query->result();
      foreach ($res as $key => $value) {
        $data = array(
          'apv_venderid' => $value->vender_id
          );
        $this->db->where('apv_vender',$value->vender_name);
        $this->db->update('apv_header',$data);
      }

    }
    public function testpoimat() //Update Material code
    {
      $this->db->select('*');
      $this->db->where('mattype_code',"M");
      $q1 = $this->db->get('mat_type');
      $r1 = $q1->result();
      foreach ($r1 as $key => $vae) {
        $this->db->select("*");
        $this->db->where('mattype_code',$vae->mattype_code);
        $q = $this->db->get('mat_group');
        $r = $q->result();
        foreach ($r as $key => $value) {
          $this->db->select("*");

          $this->db->where('matgroup_code',$value->matgroup_code);
          $qq = $this->db->get('mat_subgroup');
          $rr = $qq->result();
          foreach ($rr as $key => $v) {
            $this->db->select('*');
            $this->db->where('matgroup_code',$value->matgroup_code);
            $this->db->where('matsubgroup_code',$v->matsubgroup_code);
            $qqq = $this->db->get('mat_product');
            $rrr = $qqq->result();
            foreach ($rrr as $key => $va) {
              $this->db->select('*');
              $this->db->where('matcode',$va->matcode);
              $this->db->where('matsubgroup_code',$v->matsubgroup_code);
              $this->db->where('matgroup_code',$value->matgroup_code);
              $qqqq = $this->db->get('mat_spec');
              $rrrr = $qqqq->result();
              foreach ($rrrr as $key => $e) {
                    // $arrayName = array(
                    //   'pri_matcode' => $vae->mattype_code.$value->matgroup_code.$v->matsubgroup_code.$va->matcode.$e->matspec_code,
                    // );
                    // $this->db->where('pri_matname',$value->matgroup_name.$v->matsubgroup_name);
                    // $this->db->update('pr_item',$arrayName);


                    echo "<p>".$vae->mattype_code.$value->matgroup_code.$v->matsubgroup_code.$va->matcode.$e->matspec_code."</p>";
                    echo "<p>".$value->matgroup_name.$v->matsubgroup_name."</p>";


              }

            }

          }

        }
      }

    }
    public function testmat() //Update Material code
    {
      $this->db->select('*');
      $this->db->where('mattype_code',"M");
      $q1 = $this->db->get('mat_type');
      $r1 = $q1->result();
      foreach ($r1 as $key => $vae) {
        $this->db->select("*");
        $this->db->where('mattype_code',$vae->mattype_code);
        $q = $this->db->get('mat_group');
        $r = $q->result();
        foreach ($r as $key => $value) {
          $this->db->select("*");

          $this->db->where('matgroup_code',$value->matgroup_code);
          $qq = $this->db->get('mat_subgroup');
          $rr = $qq->result();
          foreach ($rr as $key => $v) {
            $this->db->select('*');
            $this->db->where('matgroup_code',$value->matgroup_code);
            $this->db->where('matsubgroup_code',$v->matsubgroup_code);
            $qqq = $this->db->get('mat_product');
            $rrr = $qqq->result();
            foreach ($rrr as $key => $va) {
              $this->db->select('*');
              $this->db->where('matcode',$va->matcode);
              $this->db->where('matsubgroup_code',$v->matsubgroup_code);
              $this->db->where('matgroup_code',$value->matgroup_code);
              $qqqq = $this->db->get('mat_spec');
              $rrrr = $qqqq->result();
              foreach ($rrrr as $key => $e) {
                    // $arrayName = array(
                    //   'poi_matname' => $value->matgroup_name." ".$v->matsubgroup_name." ".$va->matname." ".$e->matspec_name,
                    // );
                    // $this->db->where('poi_matcode',$vae->mattype_code.$value->matgroup_code.$v->matsubgroup_code.$va->matcode.$e->matspec_code);
                    // $this->db->update('po_item',$arrayName);


                    echo "<p>".$vae->mattype_code.$value->matgroup_code.$v->matsubgroup_code.$va->matcode.$e->matspec_code."</p>";
                    echo "<p>".$vae->mattype_name."-".$value->matgroup_name."-".$v->matsubgroup_name."-"."$va->matname"."-"."$e->matspec_name"."</p>";


              }

            }

          }

        }
      }

    }
    public function updatepr_item_matcode()
    {
      $this->db->select('pri_matcode');
      $q = $this->db->get('pr_item');
      $r = $q->result();
      foreach ($r as $key => $value) {
      switch (strlen($value->pri_matcode)) {
        case '3':
            echo "<p>".$value->pri_matcode."</p>";
          break;
        case '6':
        $data = array(
          'pri_matcode'=> $value->pri_matcode."0000",
        );
        $this->db->where('pri_matcode',$value->pri_matcode);
        $this->db->update('pr_item',$data);
            echo "<p>".$value->pri_matcode."0000"."</p>";
          break;
          case '9':
              echo "<p>".$value->pri_matcode."</p>";
            break;
            case '8':
            $data = array(
              'pri_matcode'=> $value->pri_matcode."00",
            );
            $this->db->where('pri_matcode',$value->pri_matcode);
            $this->db->update('pr_item',$data);
                echo "<p>".$value->pri_matcode."00"."</p>";
              break;
              case '5':
              $data = array(
                'pri_matcode'=> $value->pri_matcode."00000",
              );
              $this->db->where('pri_matcode',$value->pri_matcode);
              $this->db->update('pr_item',$data);
                  echo "<p>".$value->pri_matcode."00000"."</p>";
                break;
                case '7':
                $data = array(
                  'pri_matcode'=> $value->pri_matcode."000",
                );
                $this->db->where('pri_matcode',$value->pri_matcode);
                $this->db->update('pr_item',$data);
                    echo "<p>".$value->pri_matcode."000"."</p>";
                  break;
        default:

          break;
      }



      }
    }
    public function updatepo_to_poitem_project_id(){
      $po = $this->db->query("select po_pono,po_project from po")->result();
      foreach ($po as $key => $value) {
        $data = array(
          'poi_project' => $value->po_project, 
        );
        $this->db->where('poi_ref',$value->po_pono);
        $this->db->update('po_item');
      }
    }
    public function updatepo_item_matcode()
    {
      $this->db->select('poi_matcode');
      $q = $this->db->get('po_item');
      $r = $q->result();
      foreach ($r as $key => $value) {
        // echo "<p>".substr($value->poi_matcode,0,1)."</p>";
        // $aa = substr($value->poi_matcode,0,1);
        // if ($aa=="M") {
        //   echo "<p>mmmmm</p>";
        // }else{
        //   echo "<p>ddddd</p>";
        // }

      switch (strlen($value->poi_matcode)) {
        case '3':
            echo "<p>".$value->poi_matcode."</p>";
          break;
        case '10':
        $aa = substr($value->poi_matcode,0,1);
        if ($aa=="M") {
                $data = array(
                  'poi_matcode'=> "M"."0".substr($value->poi_matcode,1,10),
                );
                $this->db->where('poi_matcode',$value->poi_matcode);
                $this->db->update('po_item',$data);

                echo "<p>"."M"."0".substr($value->poi_matcode,1,10)."</p>";
        }else{
                $data = array(
                  'poi_matcode'=> "G"."0".substr($value->poi_matcode,1,10),
                );
                $this->db->where('poi_matcode',$value->poi_matcode);
                $this->db->update('po_item',$data);

                echo "<p>"."G"."0".substr($value->poi_matcode,1,10)."</p>";
        }

          break;
          case '9':
          $aa = substr($value->poi_matcode,0,1);
          if ($aa=="M") {
              $data = array(
                'poi_matcode'=> "M"."00".substr($value->poi_matcode,1,10),
              );
              $this->db->where('poi_matcode',$value->poi_matcode);
              $this->db->update('po_item',$data);
                  echo "<p>"."M"."00".substr($value->poi_matcode,1,10)."</p>";
            }else{
              $data = array(
                'poi_matcode'=> "G"."00".substr($value->poi_matcode,1,10),
              );
              $this->db->where('poi_matcode',$value->poi_matcode);
              $this->db->update('po_item',$data);
                  echo "<p>"."G"."00".substr($value->poi_matcode,1,10)."</p>";
            }
            break;
            case '8':
            $aa = substr($value->poi_matcode,0,1);
            if ($aa=="M") {
                $data = array(
                  'poi_matcode'=> "M"."000".substr($value->poi_matcode,1,10),
                );
                $this->db->where('poi_matcode',$value->poi_matcode);
                $this->db->update('po_item',$data);
                    echo "<p>"."M"."000".substr($value->poi_matcode,1,10)."</p>";
            }else{
              $data = array(
                'poi_matcode'=> "G"."000".substr($value->poi_matcode,1,10),
              );
              $this->db->where('poi_matcode',$value->poi_matcode);
              $this->db->update('po_item',$data);
                  echo "<p>"."G"."000".substr($value->poi_matcode,1,10)."</p>";
            }
              break;
        default:

          break;
      }



      }
    }
    public function updatematstore() //Update Material code
    {
      $this->db->select('*');
      $this->db->where('mattype_code',"M");
      $q1 = $this->db->get('mat_type');
      $r1 = $q1->result();
      foreach ($r1 as $key => $vae) {
        $this->db->select("*");
        $this->db->where('mattype_code',$vae->mattype_code);
        $q = $this->db->get('mat_group');
        $r = $q->result();
        foreach ($r as $key => $value) {
          $this->db->select("*");

          $this->db->where('matgroup_code',$value->matgroup_code);
          $qq = $this->db->get('mat_subgroup');
          $rr = $qq->result();
          foreach ($rr as $key => $v) {
            $this->db->select('*');
            $this->db->where('matgroup_code',$value->matgroup_code);
            $this->db->where('matsubgroup_code',$v->matsubgroup_code);
            $qqq = $this->db->get('mat_product');
            $rrr = $qqq->result();
            foreach ($rrr as $key => $va) {
              $this->db->select('*');
              $this->db->where('matcode',$va->matcode);
              $this->db->where('matsubgroup_code',$v->matsubgroup_code);
              $this->db->where('matgroup_code',$value->matgroup_code);
              $qqqq = $this->db->get('mat_spec');
              $rrrr = $qqqq->result();
              foreach ($rrrr as $key => $e) {
                    // $arrayName = array(
                    //   'store_matname' => $value->matgroup_name." ".$v->matsubgroup_name." ".$va->matname." ".$e->matspec_name,
                    //   'store_unit' => $va->matname,
                    // );
                    // $this->db->where('store_matcode',$vae->mattype_code.$value->matgroup_code.$v->matsubgroup_code.$va->matcode.$e->matspec_code);
                    // $this->db->update('store',$arrayName);


                    echo "<p>".$vae->mattype_code.$value->matgroup_code.$v->matsubgroup_code.$va->matcode.$e->matspec_code."</p>";
                    echo "<p>".$vae->mattype_name."-".$value->matgroup_name."-".$v->matsubgroup_name."-"."$va->matname"."-"."$e->matspec_name"."</p>";


              }

            }

          }

        }
      }
    }

    public function cancel_transfer()
    {
      $q = $this->db->query("select mat_code,sum(qty) as qty1 from ic_transferitem group by mat_code");
      $res = $q->result();
      foreach ($res as $key => $value) {

        $this->db->select('*');
        $this->db->where('store_matcode',$value->mat_code);
        $this->db->where('store_project',"23");
        $qq = $this->db->get('store');
        $ress = $qq->result();
        foreach ($ress as $key => $ve) {
          if ($ve->store_matcode=="") {
            # code...
          }
          // $data = array(
          //   'store_qty' => ($ve->store_qty+$value->qty1),
          //   'store_total' => ($ve->store_qty+$value->qty1),
          // );
          // $this->db->where('store_matcode',$value->mat_code);
          // $this->db->where('store_project',"23");
          // $this->db->update('store',$data);
          echo "<p>"."---".$value->mat_code."------------".$ve->store_qty."---------------".$value->qty1."--------".($ve->store_qty+$value->qty1)."</p>";
        }




      }
    }
    public function update_stkcard()
    {
      $q = $this->db->query("select mat_code,ref_codetransfer,sum(qty) as qty1 from ic_transferitem group by mat_code");
      $res = $q->result();
      foreach ($res as $key => $value) {

        $this->db->select('*');
        $this->db->where('stock_matcode',$value->mat_code);
        $this->db->where('stock_project',"23");
        $qqq = $this->db->get('stockcard');
        $resss = $qqq->result();
        foreach ($resss as $key => $vae) {
          $dataa = array(
            'stock_type' => "transfer",
            'stock_date' =>"2016-09-13",
            'stock_project' => "23",
            'stock_bookfrom' => "19",
            'stock_matname' => $vae->stock_matname,
            'stock_unit' => $vae->stock_unit,
            'stock_ref' => $value->ref_codetransfer,
            'stock_qty' => ($vae->stock_qty+$value->qty1),
          );
          $this->db->insert('stockcard',$dataa);
          echo "<p>"."---".$value->mat_code."------------".$vae->stock_qty."---------------".$value->qty1."--------".($vae->stock_qty+$value->qty1)."</p>";
        }
      }
    }
    public function tcancel_transfer()
    {
      $q = $this->db->query("select mat_code,sum(qty) as qty1 from ic_transferitem group by mat_code");
      $res = $q->result();
      foreach ($res as $key => $value) {

        $this->db->select('*');
        $this->db->where('store_matcode',$value->mat_code);
        $this->db->where('store_project',"19");
        $qq = $this->db->get('store');
        $ress = $qq->result();
        foreach ($ress as $key => $ve) {
          echo "<p>"."---".$value->mat_code."------------".$ve->store_qty."---------------".$value->qty1."--------".($ve->store_qty+$value->qty1)."</p>";
        }
        $this->db->select('*');
        $this->db->where('stock_matcode',$value->mat_code);
        $this->db->where('stock_project',"19");
        $qqq = $this->db->get('stockcard');
        $resss = $qqq->result();
        foreach ($resss as $key => $vae) {
            echo "<p>"."---".$value->mat_code."------------".$vae->stock_qty."---------------".$value->qty1."--------".($vae->stock_qty+$value->qty1)."</p>";
        }
      }
    }
    public function readmatname() //Update Material code
    {

      $this->db->select('*');
      $q1 = $this->db->get('mat_type');
      $r1 = $q1->result();
      foreach ($r1 as $key => $vae) {
        $this->db->select("*");
        $this->db->where('mattype_code',$vae->mattype_code);
        $q = $this->db->get('mat_group');
        $r = $q->result();
        foreach ($r as $key => $value) {
          $this->db->select("*");
           $this->db->where('mattype_code',$vae->mattype_code);
          $this->db->where('matgroup_code',$value->matgroup_code);
          $qq = $this->db->get('mat_subgroup');
          $rr = $qq->result();
          foreach ($rr as $key => $v) {
            $this->db->select('*');
            $this->db->where('mattype_code',$vae->mattype_code);
            $this->db->where('matgroup_code',$value->matgroup_code);
            $this->db->where('matsubgroup_code',$v->matsubgroup_code);
            $qqq = $this->db->get('mat_product');
            $rrr = $qqq->result();
            foreach ($rrr as $key => $va) {
              $this->db->select('*');
              $this->db->where('mattype_code',$vae->mattype_code);
              $this->db->where('matgroup_code',$value->matgroup_code);
              $this->db->where('matsubgroup_code',$v->matsubgroup_code);
              $this->db->where('matcode',$va->matcode);
              $qqqq = $this->db->get('mat_spec');
              $rrrrr = $qqqq->result();
              foreach ($rrrrr as $key => $e) {
                  $this->db->select('*');
                  $this->db->where('mattype_code',$vae->mattype_code);
                  $this->db->where('matgroup_code',$value->matgroup_code);
                  $this->db->where('matsubgroup_code',$v->matsubgroup_code);
                  $this->db->where('matcode',$va->matcode);
                  $this->db->where('matspec_code',$e->matspec_code);
                  $qqqq = $this->db->get('mat_brand');
                  $rrrrrr = $qqqq->result();
                  foreach ($rrrrrr as $key => $val) {
                      $this->db->select('*');
                      $this->db->where('mattype_code',$vae->mattype_code);
                      $this->db->where('matgroup_code',$value->matgroup_code);
                      $this->db->where('matsubgroup_code',$v->matsubgroup_code);
                      $this->db->where('matcode',$va->matcode);
                      $this->db->where('matspec_code',$e->matspec_code);
                      $this->db->where('matbrand_code',$val->matbrand_code);
                      $qqqq = $this->db->get('mat_unit');
                      $rrrrrrr = $qqqq->result();
                      foreach ($rrrrrrr as $key => $valu) {
                        $data = array(
                          'materialname' => $va->matname,
                          'materialspacname' => $e->matspec_name, 
                          'materialbrandname' => $val->matbrand_name,
                          );
                        $this->db->where('materialcode',$vae->mattype_code.$value->matgroup_code.$v->matsubgroup_code.$va->matcode.$e->matspec_code.$val->matbrand_code.$valu->matunit_code);
                        $this->db->update('mat_unit_top_update',$data);




                        echo "<p>".$vae->mattype_code.$value->matgroup_code.$v->matsubgroup_code.$va->matcode.$e->matspec_code.$val->matbrand_code.$valu->matunit_code."</p>";
                        echo "<p>".$vae->mattype_name."-".$value->matgroup_name."-".$v->matsubgroup_name."-".$va->matname."-".$e->matspec_name."-".$val->matbrand_name."-".$val->matbrand_name."-".$valu->matunit_name."</p>";

                        
                      }

                    
                  }
              }

            }

          }

        }
      }

    }
    public function config()
    {
      $session_data = $this->session->userdata('sessed_in');
             $compcode = $session_data['compcode'];
      $this->load->model('config_m');
      $ic_type = $this->config_m->geticcost($compcode);
      echo $ic_type;
    }
    public function avg()
    {
      $add = $this->input->post();
      $this->load->model('inventory_m');
      for ($i=0; $i < count($add['qty']); $i++) {
        echo $this->inventory_m->getmatavg($add['matcode'][$i]);

        // echo $add['matcode'][$i];
      }
    }
    public function test_tax()
    {
      $this->load->view('test/tax_test_v');
    }
    public function tlogin(){
      $username =  $this->input->post('email');

      $password =   $this->input->post('password');
      // $username = "admin@admin.com";
      // $password = "g,njv;jhjhkjh";
        $this->load->model('auth_m');
        if ($this->auth_m->testlogin($username,$password)) {
          $arr = array(
            'code' => "1",
            'return' => $username,
          );
        }else{
          $arr = array(
            'code' => "0",
            'return' => "Please Try Again!",
          );
        }
        $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode($arr));

    }

    public function testupdateunit()
  {
    $this->db->select('*');
    $q = $this->db->get('mat_unit_copy1')->result();
    foreach ($q as $key => $value) {
      $rre = $this->db->query("select * from unit where unit_name='ชิ้น'")->result();
      foreach ($rre as $key => $va) {
       $data = array(
        'matunit_code' => $va->unit_code,
        );
      $this->db->where('matunit_id',$value->matunit_id);
      $this->db->update('mat_unit_copy1',$data);
      }
      redirect('test/getupdate');
    }
    
  }
    public function testupdatmaterialcode()
  {
    $this->db->select('*');
    $q = $this->db->get('mat_unit_copy1')->result();
    foreach ($q as $key => $value) {
      
      $data = array(
        'materialcode' => $value->mattype_code.$value->matgroup_code.$value->matsubgroup_code.$value->matcode.$value->matspec_code.$value->matbrand_code.$value->matunit_code,
        );
      $this->db->where('matunit_id',$value->matunit_id);
      $this->db->update('mat_unit_copy1',$data);
    }
    redirect('test/getupdate');
  }
  public function getupdate()
  {
     $this->db->select('*');
     $rr = $this->db->get('mat_unit_copy1')->result();
     foreach ($rr as $key => $value) {
      $rre = $this->db->query("select * from unit where unit_name='$value->matunit_name'")->result();
      foreach ($rre as $key => $va) {
        echo "<p>".$value->matunit_code."--".$value->matunit_name."----------".$va->unit_code."---".$va->unit_name."---".$value->materialcode."</p>";
      }
     }
  }

  public function updatestock()
  {
    $q = $this->db->query("select stock_id,stock_date from stockcard")->result();
    foreach ($q as $key => $value) {
      $yy = date_create($value->stock_date);
      echo "<p>".$value->stock_date."</p>";
      echo "<p>".date_format($yy,"Y")."</p>";
      echo "<p>".date_format($yy,"m")."</p>";
      echo "<p>".date_format($yy,"d")."</p>";

      $data = array(
        'stock_year' => date_format($yy,"Y"),
        'stock_month' => date_format($yy,"m"),
        'stock_day' => date_format($yy,"d"),
        );
      $this->db->where('stock_id',$value->stock_id);
      $this->db->update('stockcard',$data);

    }
  }
  public function loadview()
  {
    $this->load->view('test/inputtest_v');
  }

  public function testtainning(){
 
     $a = $this->input->post('input');
    // if ($a==1) {
    //   echo "เท่ากับ 1";
    // }else if($a==2){
    //   echo "เท่ากับ 2";
    // }else{
    //   echo "อะไรก็ได้";
    // }
// 1== manager
// 2=sup


    if ($a==1) {
      echo "manager";
    }else if($a==2){
      echo "sup";
    }


  }

  public function updateic()
  {
    

    $q = $this->db->query("select * from po_receive LEFT OUTER JOIN po_recitem on po_receive.po_reccode=po_recitem.poi_ref where poi_unitic ='' ORDER BY po_reccode asc")->result();
    foreach ($q as $key => $v) {
      if ($v->poi_unitic=="") {
        echo "emtry";
      }else{
         echo "<p>".$v->poi_unitic."</p>";
      }
     
     $e = $this->db->query("select * from receive_poitem where poi_ref='$v->rccode'")->result();
        foreach ($e as $key => $value) {
          echo "<p>".$value->poi_ref."</p>";
          echo "<p>".$value->poi_unitic."</p>";
          $data = array(
            'poi_qty' => $value->poi_unitic,
            'poi_unitic' => $value->poi_unitic,
            );
          $this->db->where('poi_ref',$v->poi_ref);
          $this->db->update('po_recitem',$data);
        }
    }
  }

  public function updatestore()
  {
     $q = $this->db->query('select store_matcode,store_unit from store')->result();
    foreach ($q as $key => $value) {
      // echo "<p>".$value->store_unit."</p>";
      $w = $this->db->query('select * from stockcard where stock_matcode="$value->store_matcode"')->result();
      foreach ($w as $key => $v) {
        echo $key;
        echo "<p>".$value->stock_matcode."</p>";
      }
    }
    

   
  }
  public function update_store_equal_to_stockcard()
  {
    $q = $this->db->query('select * from store where store_project="54"')->result();
    foreach ($q as $key => $value) {
      if ($value->store_total!=$value->store_totalqty) {
        
        try {
           $data = array(
              'store_totalqty' => $value->store_total,
            );
          $this->db->where('store_project','54');
          $this->db->where('store_matcode',$value->store_matcode);
          $this->db->update('store',$data);
         // echo "<p>".$value->store_matcode."----".$value->store_total."----".$value->store_totalqty."</p>";
        } catch (Exception $e) {
          echo $e;
        }
       
      }
      
    }
  }
  public function updatedodate()
  {
    $q = $this->db->query('select * from po_receive where dodate="0000-00-00" or dodate is null')->result();
    foreach ($q as $key => $value) {
      
      $data = array(
        'dodate' => $value->duedate,
        );
      $this->db->where('po_reccode',$value->po_reccode);
      $this->db->update('po_receive',$data);
        echo "<P>".$value->po_reccode."---".$value->dodate."---".$value->duedate."</p>";
     

    }

  }
   public function updatedodatestockcard()
  {
    $q = $this->db->query('select stockcard.ref_no,receive_po.duedate from stockcard left outer join po_receive on po_receive.po_reccode=stockcard.ref_no left outer join receive_po on po_receive.rccode=receive_po.po_reccode where stockcard.stock_type="receive" and stockcard.dodate is null')->result();
    foreach ($q as $key => $value) {
      echo "<p>".$value->duedate."</p>";
      $data = array(
        'dodate' => $value->duedate,
        );
      $this->db->where('ref_no',$value->ref_no);
      $this->db->update('stockcard',$data);
    }

    $q = $this->db->query('select stockcard.ref_no,ic_booking.date_book from stockcard left outer join ic_booking on ic_booking.issuecode=stockcard.ref_no where stockcard.stock_type="issue" and stockcard.dodate is null;')->result();
    foreach ($q as $key => $value) {
      echo "<p>".$value->date_book."</p>";
      $dataa = array(
        'dodate' => $value->date_book,
        );
      $this->db->where('ref_no',$value->ref_no);
      $this->db->update('stockcard',$dataa);
    }

  }


  public function readFile(){
    $content = file_get_contents("https://github.com/KnpLabs/KnpSnappyBundle");
    file_put_contents("github.html",  $content);


  }
  public function gettenderjob(){
    $this->db->select('bdd_no,bdd_jobno,bdd_jobname,bdd_amount');
    $res = $this->db->get('bdtender_d')->result_array();

  }

  public function test_kendod(){
    $this->load->view('base/test_kendo_v');
  }

  public function getsystem(){
    $this->db->select('bdd_tenid,bdd_jobno,bdd_jobname,bdd_amount');
    $res = $this->db->get('bdtender_d')->result();
    $aa = array();
    $college_temp = array();
    $i = 0;
    foreach ($res as $key => $value) {
      
      $college_temp[$i]['ProductID'] = $value->bdd_tenid;
      $college_temp[$i]['ProductName'] = $value->bdd_tenid;

      $college_temp[$i]['UnitPrice'] = $value->bdd_amount;
      $college_temp[$i]['CategoryID'] = $value->bdd_jobno;
      $college_temp[$i]['Category'] = array(
        'CategoryID' => $value->bdd_jobno,
        'CategoryName' => $value->bdd_jobname,
      );
      $i++;
    }
    $aa['product'] = $college_temp;
    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($college_temp));
  }
  public function updateICcode(){
   $res =  $this->db->query('select pri_id,pri_unit,pri_punitic from pr_item')->result();
   foreach ($res as $key => $value) {
     $resic = $this->db->query("select unit_code from unit where unit_name ='$value->pri_unit'")->result();
     foreach ($resic as $key => $val) {
       $data = array('pri_unitcode' => $val->unit_code, );
      }
      $this->db->where('pri_id',$value->pri_id);
      $this->db->update('pr_item',$data);
     $resiv = $this->db->query("select unit_code from unit where unit_name ='$value->pri_punitic'")->result();
     foreach ($resiv as $key => $val) {
       $dataa = array('pri_uniticcode' => $val->unit_code, );
      }
      $this->db->where('pri_id',$value->pri_id);
      $this->db->update('pr_item',$dataa);
   }
  }
}
