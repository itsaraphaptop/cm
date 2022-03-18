<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class udp_digitmatcode extends CI_Controller {
          public function __construct() {
            parent::__construct();
            $this->load->Model('datastore_m');
        }
        public function index()
        {
          $result = $this->db->get('mat_group')->result();
          foreach ($result as $key => $value) {
            switch (strlen($value->matgroup_code)) {
              case '2':
              $data = array(
                'matgroup_code' => "00".$value->matgroup_code,
              );
              $this->db->where('matgroup_id',$value->matgroup_id);
              $this->db->update('mat_group',$data);

                echo "<p>"."00".$value->matgroup_code."</p>";
                break;
              case '3':
              $data = array(
                'matgroup_code' => "0".$value->matgroup_code,
              );
              $this->db->where('matgroup_id',$value->matgroup_id);
              $this->db->update('mat_group',$data);

                echo "<p>"."0".$value->matgroup_code."</p>";
                break;
                default :
                  echo "<p>"."0".$value->matgroup_code."</p>";
                break;


            }

          }


        }
        public function sub()
        {
          $result = $this->db->get('mat_subgroup')->result();
          foreach ($result as $key => $value) {
            switch (strlen($value->matgroup_code)) {
              case '2':
              $data = array(
                'matgroup_code' => "00".$value->matgroup_code,
              );
              $this->db->where('matsubgroup_id',$value->matsubgroup_id);
              $this->db->update('mat_subgroup',$data);

                echo "<p>"."00".$value->matgroup_code."</p>";
                break;
              case '3':
              $data = array(
                'matgroup_code' => "0".$value->matgroup_code,
              );
              $this->db->where('matsubgroup_id',$value->matsubgroup_id);
              $this->db->update('mat_subgroup',$data);

                echo "<p>"."0".$value->matgroup_code."</p>";
                break;


            }

          }


        }
        public function product()
        {
          $result = $this->db->get('mat_product')->result();
          foreach ($result as $key => $value) {
            switch (strlen($value->matgroup_code)) {
              case '2':
              $data = array(
                'matgroup_code' => "00".$value->matgroup_code,
              );
              $this->db->where('matid',$value->matid);
              $this->db->update('mat_product',$data);

                echo "<p>"."00".$value->matgroup_code."</p>";
                break;
              case '3':
              $data = array(
                'matgroup_code' => "0".$value->matgroup_code,
              );
              $this->db->where('matid',$value->matid);
              $this->db->update('mat_product',$data);

                echo "<p>"."0".$value->matgroup_code."</p>";
                break;


            }

          }


        }
        public function spec()
        {
          $result = $this->db->get('mat_spec')->result();
          foreach ($result as $key => $value) {
            switch (strlen($value->matgroup_code)) {
              case '2':
              $data = array(
                'matgroup_code' => "00".$value->matgroup_code,
              );
              $this->db->where('matspec_id',$value->matspec_id);
              $this->db->update('mat_spec',$data);

                echo "<p>"."00".$value->matgroup_code."</p>";
                break;
              case '3':
              $data = array(
                'matgroup_code' => "0".$value->matgroup_code,
              );
              $this->db->where('matspec_id',$value->matspec_id);
              $this->db->update('mat_spec',$data);

                echo "<p>"."0".$value->matgroup_code."</p>";
                break;


            }

          }


        }
        public function updateitem_matcode()
        {
          // pr_item
          $this->db->select('pri_matcode');
          $q = $this->db->get('pr_item');
          $r = $q->result();
          foreach ($r as $key => $value) {
            // echo "<p>".substr($value->pri_matcode,0,1)."</p>";
            // $aa = substr($value->pri_matcode,0,1);
            // if ($aa=="M") {
            //   echo "<p>mmmmm</p>";
            // }else{
            //   echo "<p>ddddd</p>";
            // }

          switch (strlen($value->pri_matcode)) {
            case '3':
                echo "<p>".$value->pri_matcode."</p>";
              break;
            case '10':
            $aa = substr($value->pri_matcode,0,1);
            if ($aa=="M") {
                    $data = array(
                      'pri_matcode'=> "M"."0".substr($value->pri_matcode,1,10),
                    );
                    $this->db->where('pri_matcode',$value->pri_matcode);
                    $this->db->update('pr_item',$data);

                    echo "<p>"."M"."0".substr($value->pri_matcode,1,10)."</p>";
            }else{
                    $data = array(
                      'pri_matcode'=> "G"."0".substr($value->pri_matcode,1,10),
                    );
                    $this->db->where('pri_matcode',$value->pri_matcode);
                    $this->db->update('pr_item',$data);

                    echo "<p>"."G"."0".substr($value->pri_matcode,1,10)."</p>";
            }

              break;
              case '9':
              $aa = substr($value->pri_matcode,0,1);
              if ($aa=="M") {
                  $data = array(
                    'pri_matcode'=> "M"."00".substr($value->pri_matcode,1,9),
                  );
                  $this->db->where('pri_matcode',$value->pri_matcode);
                  $this->db->update('pr_item',$data);
                      echo "<p>"."M"."00".substr($value->pri_matcode,1,9)."</p>";
                }else{
                  $data = array(
                    'pri_matcode'=> "G"."00".substr($value->pri_matcode,1,9),
                  );
                  $this->db->where('pri_matcode',$value->pri_matcode);
                  $this->db->update('pr_item',$data);
                      echo "<p>"."G"."00".substr($value->pri_matcode,1,9)."</p>";
                }
                break;
                case '8':
                $aa = substr($value->pri_matcode,0,1);
                if ($aa=="M") {
                    $data = array(
                      'pri_matcode'=> "M"."000".substr($value->pri_matcode,1,10),
                    );
                    $this->db->where('pri_matcode',$value->pri_matcode);
                    $this->db->update('pr_item',$data);
                        echo "<p>"."M"."000".substr($value->pri_matcode,1,10)."</p>";
                }else{
                  $data = array(
                    'pri_matcode'=> "G"."000".substr($value->pri_matcode,1,10),
                  );
                  $this->db->where('pri_matcode',$value->pri_matcode);
                  $this->db->update('pr_item',$data);
                      echo "<p>"."G"."000".substr($value->pri_matcode,1,10)."</p>";
                }
                  break;
            default:

              break;
          }


          }
          // end pr_item

          // store
          $this->db->select('store_matcode');
          $q = $this->db->get('store');
          $r = $q->result();
          foreach ($r as $key => $value) {
            // echo "<p>".substr($value->pri_matcode,0,1)."</p>";
            // $aa = substr($value->pri_matcode,0,1);
            // if ($aa=="M") {
            //   echo "<p>mmmmm</p>";
            // }else{
            //   echo "<p>ddddd</p>";
            // }

          switch (strlen($value->store_matcode)) {
            case '3':
                echo "<p>".$value->store_matcode."</p>";
              break;
            case '10':
            $aa = substr($value->store_matcode,0,1);
            if ($aa=="M") {
                    $data = array(
                      'store_matcode'=> "M"."0".substr($value->store_matcode,1,10),
                    );
                    $this->db->where('store_matcode',$value->store_matcode);
                    $this->db->update('store',$data);

                    echo "<p>"."M"."0".substr($value->store_matcode,1,10)."</p>";
            }else{
                    $data = array(
                      'store_matcode'=> "G"."0".substr($value->store_matcode,1,10),
                    );
                    $this->db->where('store_matcode',$value->store_matcode);
                    $this->db->update('store',$data);

                    echo "<p>"."G"."0".substr($value->store_matcode,1,10)."</p>";
            }

              break;
              case '9':
              $aa = substr($value->store_matcode,0,1);
              if ($aa=="M") {
                  $data = array(
                    'store_matcode'=> "M"."00".substr($value->store_matcode,1,9),
                  );
                  $this->db->where('store_matcode',$value->store_matcode);
                  $this->db->update('store',$data);
                      echo "<p>"."M"."00".substr($value->store_matcode,1,9)."</p>";
                }else{
                  $data = array(
                    'store_matcode'=> "G"."00".substr($value->store_matcode,1,9),
                  );
                  $this->db->where('store_matcode',$value->store_matcode);
                  $this->db->update('store',$data);
                      echo "<p>"."G"."00".substr($value->store_matcode,1,9)."</p>";
                }
                break;
                case '8':
                $aa = substr($value->store_matcode,0,1);
                if ($aa=="M") {
                    $data = array(
                      'store_matcode'=> "M"."000".substr($value->store_matcode,1,10),
                    );
                    $this->db->where('store_matcode',$value->store_matcode);
                    $this->db->update('store',$data);
                        echo "<p>"."M"."000".substr($value->store_matcode,1,10)."</p>";
                }else{
                  $data = array(
                    'store_matcode'=> "G"."000".substr($value->store_matcode,1,10),
                  );
                  $this->db->where('store_matcode',$value->store_matcode);
                  $this->db->update('store',$data);
                      echo "<p>"."G"."000".substr($value->store_matcode,1,10)."</p>";
                }
                  break;
            default:

              break;
          }


          }
          // end store

          // stock_card
          $this->db->select('stock_matcode');
          $q = $this->db->get('stockcard');
          $r = $q->result();
          foreach ($r as $key => $value) {
            // echo "<p>".substr($value->pri_matcode,0,1)."</p>";
            // $aa = substr($value->pri_matcode,0,1);
            // if ($aa=="M") {
            //   echo "<p>mmmmm</p>";
            // }else{
            //   echo "<p>ddddd</p>";
            // }

          switch (strlen($value->stock_matcode)) {
            case '3':
                echo "<p>".$value->stock_matcode."</p>";
              break;
            case '10':
            $aa = substr($value->stock_matcode,0,1);
            if ($aa=="M") {
                    $data = array(
                      'stock_matcode'=> "M"."0".substr($value->stock_matcode,1,10),
                    );
                    $this->db->where('stock_matcode',$value->stock_matcode);
                    $this->db->update('stockcard',$data);

                    echo "<p>"."M"."0".substr($value->stock_matcode,1,10)."</p>";
            }else{
                    $data = array(
                      'stock_matcode'=> "G"."0".substr($value->stock_matcode,1,10),
                    );
                    $this->db->where('stock_matcode',$value->stock_matcode);
                    $this->db->update('stockcard',$data);

                    echo "<p>"."G"."0".substr($value->stock_matcode,1,10)."</p>";
            }

              break;
              case '9':
              $aa = substr($value->stock_matcode,0,1);
              if ($aa=="M") {
                  $data = array(
                    'stock_matcode'=> "M"."00".substr($value->stock_matcode,1,9),
                  );
                  $this->db->where('stock_matcode',$value->stock_matcode);
                  $this->db->update('stockcard',$data);
                      echo "<p>"."M"."00".substr($value->stock_matcode,1,9)."</p>";
                }else{
                  $data = array(
                    'stock_matcode'=> "G"."00".substr($value->stock_matcode,1,9),
                  );
                  $this->db->where('stock_matcode',$value->stock_matcode);
                  $this->db->update('stockcard',$data);
                      echo "<p>"."G"."00".substr($value->stock_matcode,1,9)."</p>";
                }
                break;
                case '8':
                $aa = substr($value->stock_matcode,0,1);
                if ($aa=="M") {
                    $data = array(
                      'stock_matcode'=> "M"."000".substr($value->stock_matcode,1,10),
                    );
                    $this->db->where('stock_matcode',$value->stock_matcode);
                    $this->db->update('stockcard',$data);
                        echo "<p>"."M"."000".substr($value->stock_matcode,1,10)."</p>";
                }else{
                  $data = array(
                    'stock_matcode'=> "G"."000".substr($value->stock_matcode,1,10),
                  );
                  $this->db->where('stock_matcode',$value->stock_matcode);
                  $this->db->update('stockcard',$data);
                      echo "<p>"."G"."000".substr($value->stock_matcode,1,10)."</p>";
                }
                  break;
            default:

              break;
          }


          }
          // end stock_card
        }
}
