<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class materialcode extends CI_Controller {

        function __construct() {

            parent::__construct();
            $this->load->model('mat_m');
        }
        public function getname()
        {
          $type = $this->uri->segment(3);
          $group = $this->uri->segment(4);
          $sub = $this->uri->segment(5);
          $mat = $this->uri->segment(6);
          $spec = $this->uri->segment(7);
          $brand = $this->uri->segment(8);
          $tname = $this->mat_m->get_group($type,$group);
          foreach ($tname as $vtname) {
            $matname = $vtname->matgroup_name;
          }
          $subname = $this->mat_m->get_subgroup($type,$group,$sub);
          foreach ($subname as $key => $value) {
            $subname = $value->matsubgroup_name;
          }
          $product = $this->mat_m->get_product($type,$group,$sub,$mat);
          foreach ($product as $key => $value) {
            $product = $value->matname;
          }
          $spec = $this->mat_m->get_spec($type,$group,$sub,$mat,$spec);
          foreach ($spec as $key => $value) {
            $spec = $value->matspec_name;
            $speccode = $value->matspec_code;
          }
          $brandd = $this->mat_m->get_brand($type,$group,$sub,$mat,$speccode,$brand);
          foreach ($brandd as $key => $value) {
            $unitcode = $value->matunit;
            $brand = $value->matbrand_name;
          }
          echo " ".$product." ".$spec."  ";
          return true;
        }
        public function getunitname()
        {
          $type = $this->uri->segment(3);
          $group = $this->uri->segment(4);
          $sub = $this->uri->segment(5);
          $mat = $this->uri->segment(6);
          $spec = $this->uri->segment(7);
           $brand = $this->uri->segment(8);
          $uname = $this->mat_m->get_matunit($type,$group,$sub,$mat,$spec,$brand);
          foreach ($uname as $key => $value) {
            $u= $value->matunit_code;
      $qqq = $this->db->query("SELECT unit_name FROM unit WHERE unit_code='$u'")->result();
             // foreach ($qqq as $key => $v) {
             //   $a = $v->unit_name;
             // }
            foreach ($qqq as $key => $ue) {
              $ans = $ue->unit_name ;
          }
          echo $ans;
          return true;
        }
      }
        public function getunitcode()
        {
          $type = $this->uri->segment(3);
          $group = $this->uri->segment(4);
          $sub = $this->uri->segment(5);
          $mat = $this->uri->segment(6);
          $spec = $this->uri->segment(7);
          $brand = $this->uri->segment(8);
          $uname = $this->mat_m->get_brand($type,$group,$sub,$mat,$spec,$brand);
          foreach ($uname as $key => $value) {
          echo $value->matunit;
          }
          return true;
        }
        function service_mattype()
        {
            $this->load->model('datastore_m');
            $q = $this->datastore_m->getmat_type();


            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($q));

        }
        function getmattype_where()
        {
          $id = $this->uri->segment(3);
          $res = $this->mat_m->get_type($id);
          foreach ($res as $val){
                echo "<option value='".$val->mattype_code."'> [ ".$val->mattype_code." ] -".$val->mattype_name."</option>";
            }

        }
        function getmatgroup_where()
        {
          $input = $this->input->post('name');
          $res = $this->mat_m->get_group_where_name($input);
          foreach ($res as $val){
                echo "<option value='".$val->matgroup_code."'> [ ".$val->matgroup_code." ] -".$val->matgroup_name."</option>";
            }
            return true;
        }
        function getmatsubgroup_where()
        {
          $input = $this->input->post('name');
          $b1 = $this->uri->segment(3);
          $b2 = $this->uri->segment(4);
          $res = $this->mat_m->get_subgroup_where_name($input,$b1,$b2);
          foreach ($res as $val){
                echo "<option value='".$val->matsubgroup_code."'> [ ".$val->matsubgroup_code." ] -".$val->matsubgroup_name."</option>";
            }
            return true;
        }
        function getproductgroup_where()
        {
          $input = $this->input->post('name');
          $type = $this->uri->segment(3);
          $group = $this->uri->segment(4);
          $subgroup = $this->uri->segment(5);

          $res = $this->mat_m->get_product_where_name($input,$type,$group,$subgroup);
          foreach ($res as $val){
                echo "<option value='".$val->matcode."'> [ ".$val->matcode." ] -".$val->matname."</option>";
            }
            return true;
        }
        function get_type() // ดิบ
        {
            $this->db->select('*');
            $result = $this->db->get('mat_type');
            $res = $result->result();
            foreach ($res as $val){
              if($val->mattype_code=="C"){
                echo "<option value='".$val->mattype_code."' style='color :red'; > [ ".$val->mattype_code." ] -".$val->mattype_name." </option>";
              }else{
                echo "<option value='".$val->mattype_code."'> [ ".$val->mattype_code." ] -".$val->mattype_name." </option>";
              }
            }
        }
        function get_group() // ดิบ
        {
            $id = $this->uri->segment(3);
            $this->db->select('*');
            $this->db->where('mattype_code',$id);
            $result = $this->db->get('mat_group');
            $res = $result->result();
            foreach ($res as $val){
              if($val->mattype_code=="C"){
                echo "<option value='".$val->matgroup_code."' style='color :red';> [ ".$val->matgroup_code." ] -".$val->matgroup_name."</option>";
              }else{
                echo "<option value='".$val->matgroup_code."'> [ ".$val->matgroup_code." ] -".$val->matgroup_name."</option>";
              }
            }
        }
        function get_subgroup() // ดิบ
        {
             $id = $this->uri->segment(3);
             $group = $this->uri->segment(4);
            $this->db->select('*');
            $this->db->where('mattype_code',$id);
            $this->db->where('matgroup_code',$group);
            $result = $this->db->get('mat_subgroup');
            $res = $result->result();
            foreach ($res as $val){
              if($val->mattype_code=="C"){
                echo "<option value='".$val->matsubgroup_code."' style='color :red';> [ ".$val->matsubgroup_code." ] -".$val->matsubgroup_name."</option>";
              }else{
                echo "<option value='".$val->matsubgroup_code."'> [ ".$val->matsubgroup_code." ] -".$val->matsubgroup_name."</option>";
              }
            }
        }
        function get_product() // ดิบ
        {
            $id = $this->uri->segment(3);
            $group = $this->uri->segment(4);
            $subgroup = $this->uri->segment(5);
            $this->db->select('*');
            $this->db->where('mattype_code',$id);
            $this->db->where('matgroup_code',$group);
            $this->db->where('matsubgroup_code',$subgroup);
            $result = $this->db->get('mat_product');
            $res = $result->result();
            foreach ($res as $val){
              if($val->mattype_code=="C"){
                echo "<option value='".$val->matcode."' style='color :red';> [ ".$val->matcode." ] -".$val->matname."</option>";
            }else{
               echo "<option value='".$val->matcode."'> [ ".$val->matcode." ] -".$val->matname."</option>";
            }
          }
        }
        function get_productname() // ดิบ
        {
            $id = $this->uri->segment(3);
            $group = $this->uri->segment(4);
            $subgroup = $this->uri->segment(5);
            $this->db->select('*');
            $this->db->where('mattype_code',$id);
            $this->db->where('matgroup_code',$group);
            $this->db->where('matsubgroup_code',$subgroup);
            $result = $this->db->get('mat_product');
            $res = $result->result();
            foreach ($res as $val){
                echo "<option value='".$val->matname."'> [ ".$val->matcode." ] -".$val->matname."</option>";
            }
        }
        function get_productname_new() // ดิบ
        {
            $id = $this->uri->segment(3);
            $group = $this->uri->segment(4);
            $subgroup = $this->uri->segment(5);
            $this->db->select('*');
            $this->db->where('mattype_code',$id);
            $this->db->where('matgroup_code',$group);
            $this->db->where('matsubgroup_code',$subgroup);
            $result = $this->db->get('mat_product');
            $res = $result->result();
            foreach ($res as $val){
                $name =  $val->matname;
            }
            echo $name;
        }

        function get_spec() // ดิบ
        {
          $type = $this->uri->segment(3);
          $group= $this->uri->segment(4);
          $sub = $this->uri->segment(5);
          $mat = $this->uri->segment(6);
          $this->db->select('*');
          $this->db->where('mattype_code',$type);
          $this->db->where('matgroup_code',$group);
          $this->db->where('matsubgroup_code',$sub);
          $this->db->where('matcode',$mat);
          $query = $this->db->get('mat_spec');
            $res = $query->result();
            foreach ($res as $val){
              if($val->mattype_code=="C"){
                echo "<option value='".$val->matspec_code."' style='color :red';> [ ".$val->matspec_code." ] -".$val->matspec_name."</option>";
              }else{
                echo "<option value='".$val->matspec_code."'> [ ".$val->matspec_code." ] -".$val->matspec_name."</option>";
              }
            }
        }

        function get_brand() // ดิบ
        {
          $type = $this->uri->segment(3);
          $group= $this->uri->segment(4);
          $sub = $this->uri->segment(5);
          $mat = $this->uri->segment(6);
          $spec = $this->uri->segment(7);
          $this->db->select('*');
          $this->db->where('mattype_code',$type);
          $this->db->where('matgroup_code',$group);
          $this->db->where('matsubgroup_code',$sub);
          $this->db->where('matcode',$mat);
          $this->db->where('matspec_code',$spec);
          $query = $this->db->get('mat_brand');
            $res = $query->result();
            foreach ($res as $val){
               if($val->mattype_code=="C"){
                echo "<option value='".$val->matbrand_code."' style='color :red';> [ ".$val->matbrand_code." ] -".$val->matbrand_name."</option>";
                }else{
                  echo "<option value='".$val->matbrand_code."'> [ ".$val->matbrand_code." ] -".$val->matbrand_name."</option>";
                }
            }
        }

         function get_unite() // ดิบ
        {
          $type = $this->uri->segment(3);
          $group= $this->uri->segment(4);
          $sub = $this->uri->segment(5);
          $mat = $this->uri->segment(6);
          $spec = $this->uri->segment(7);
          $mbrand = $this->uri->segment(8);

          $this->db->select('*');
          $this->db->where('mattype_code',$type);
          $this->db->where('matgroup_code',$group);
          $this->db->where('matsubgroup_code',$sub);
          $this->db->where('matcode',$mat);
          $this->db->where('matspec_code',$spec);
          $this->db->where('matbrand_code',$mbrand);
          $query = $this->db->get('mat_unit');
            $res = $query->result();
            foreach ($res as $val){
               if($val->mattype_code=="C"){
                echo "<option value='".$val->matunit_code."'  style='color :red';> [ ".$val->matunit_code." ] -".$val->matunit_name."</option>";
              }else{
                echo "<option value='".$val->matunit_code."'> [ ".$val->matunit_code." ] -".$val->matunit_name."</option>";
              }

            }
        }

        function get_unitename() // ดิบ
        {
          $type = $this->uri->segment(3);
          $group= $this->uri->segment(4);
          $sub = $this->uri->segment(5);
          $mat = $this->uri->segment(6);
          $spec = $this->uri->segment(7);
          $mbrand = $this->uri->segment(8);
          $munit = $this->uri->segment(9);
          $this->db->select('*');
          $this->db->where('mattype_code',$type);
          $this->db->where('matgroup_code',$group);
          $this->db->where('matsubgroup_code',$sub);
          $this->db->where('matcode',$mat);
          $this->db->where('matspec_code',$spec);
          $this->db->where('matbrand_code',$mbrand);
          $this->db->where('matunit_code',$munit);
          $query = $this->db->get('mat_unit');
            $res = $query->result();
            foreach ($res as $val){
               if($val->mattype_code=="C"){
                echo "<input id='tunitname' value='".$val->matunit_name."' ";
              }else{
                echo "<input id='tunitname' value='".$val->matunit_name."' >";
              }

            }
        }

           function get_specname2() // ดิบดิบ   ทอปมาดิบอีก
        {
            $type = $this->uri->segment(3);
            $group= $this->uri->segment(4);
            $sub = $this->uri->segment(5);
            $mat = $this->uri->segment(6);
            $this->db->select('*');
            $this->db->where('mattype_code',$type);
            $this->db->where('matgroup_code',$group);
            $this->db->where('matsubgroup_code',$sub);
            $this->db->where('matcode',$mat);
            $result = $this->db->get('mat_spec');
            $res = $result->result();
            foreach ($res as $val){
                echo "<option value='".$val->matspec_name."'> [ ".$val->matspec_code." ] -".$val->matspec_name."</option>";
            }
        }

        /////////////////////////
        function get_specname() // ดิบดิบ
        {
            $id = $this->uri->segment(3);
            $this->db->select('*');
            $this->db->from('mat_spec');
            $this->db->join('mat_group','mat_group.matgroup_code = mat_spac.matgroup_code','left outer');
            $this->db->join('mat_subgroup','mat_subgroup.matsubgroup_code = mat_spec.matsubgroup_code','left outer');
            $this->db->join('mat_product','mat_product.matcode = mat_spec.matcode','left outer');
             $this->db->where('matcode',$id);
            $result = $this->db->get();
            $res = $result->result();
            foreach ($res as $val){
                echo "<option value='".$val->matname."'> [ ".$val->matspec_code." ] -".$val->matspec_name."</option>";
            }
        }
        /////////////////////////

        function get_cost_type_boq()
        {
            $id = $this->uri->segment(3);
            $this->db->select('*');
            $this->db->group_by('ctype_code');
            // $this->db->where('ctype_code',$id);
            $result = $this->db->get('cost_subgroup');
            $res = $result->result();
            echo "<option value=''></option>";
            foreach ($res as $val){
                
                echo "<option class='em' value='".$val->ctype_code."'>  [ ".$val->ctype_code." ] -".$val->ctype_name."</option>";
                

            }
        }

        function get_cost_system_boq()
        {
            $id = $this->uri->segment(3);
            $this->db->select('*');
            $this->db->group_by('systemcode');
            $this->db->where('systemcode',$id);
            $result = $this->db->get('system');
            $res = $result->result();

            foreach ($res as $val){
                
                echo "<b>[".$val->systemcode."] - ".$val->systemname."</b><input type='hidden' id='jobname' value='".$val->systemname."'>";
                

            }
        }

         function get_cost_group_boq()
        {
            $id = $this->uri->segment(3);

            $this->db->select('*');
            $this->db->where('ctype_code',$id);
            $this->db->group_by('cgroup_code');
            $result = $this->db->get('cost_subgroup');
            $res = $result->result();
            echo "<option value=''></option>";
            foreach ($res as $val){

                echo "<option class='em' value='".$val->cgroup_code."'> [ ".$val->cgroup_code." ] -".$val->cgroup_name."</option>";

            }
        }

        function get_cost_group_boq_show()
        {
            $id = $this->uri->segment(3);

            $this->db->select('*');
            $this->db->where('ctype_code',$id);
            $this->db->group_by('ctype_code');
            $result = $this->db->get('cost_subgroup');
            $res = $result->result();

            foreach ($res as $val){

                echo "<b>[".$val->ctype_code."] - ".$val->ctype_name."</b> ";

            }
        }

        function get_cost_subgroup_boq()
        {
            $id = $this->uri->segment(3);
            $group = $this->uri->segment(4);
            $this->db->select('*');
            $this->db->where('ctype_code',$id);
             $this->db->where('cgroup_code',$group);
             $this->db->where('cost_status',"N");
             $this->db->group_by('csubgroup_code');
             $this->db->order_by('csubgroup_code','asc');
            $result = $this->db->get('cost_subgroup');
            $res = $result->result();
            echo "<option value=''></option>";
            foreach ($res as $val){
                // echo "<option value='".$val->csubgroup_code."'> [ ".$val->csubgroup_code." ] -".$val->csubgroup_name."</option>";
                  $coss = "<option class='em' value='".$val->csubgroup_code."'>[".$val->costhead."] &nbsp;[".$val->csubgroup_code." ]-".$val->csubgroup_name."</option>";
                
                echo $coss;
            }
        }

        function get_cost_subgroup_boq_show()
        {
            $id = $this->uri->segment(3);
            $group = $this->uri->segment(4);
            $this->db->select('*');
            $this->db->where('ctype_code',$id);
             $this->db->where('cgroup_code',$group);
             $this->db->where('cost_status',"N");
             $this->db->group_by('cgroup_code');
             $this->db->order_by('cgroup_name','asc');
            $result = $this->db->get('cost_subgroup');
            $res = $result->result();
            
            foreach ($res as $val){
                // echo "<option value='".$val->csubgroup_code."'> [ ".$val->csubgroup_code." ] -".$val->csubgroup_name."</option>";
                  $coss = "<b>[".$val->cgroup_code."] - ".$val->cgroup_name."</b>";
                
                echo $coss;
            }
        }


         function get_cost_subgroup_cost4_boq()
        {
            $id = $this->uri->segment(3);
            $group = $this->uri->segment(4); 
            $subgroup = $this->uri->segment(5); 
             $this->db->select('*');
             $this->db->where('ctype_code',$id);
             $this->db->where('cgroup_code',$group);
             $this->db->where('csubgroup_code',$subgroup);
             $this->db->where('cost_status',"N");
             $this->db->group_by('cgroup_code4');
             $this->db->order_by('cgroup_code4','asc');
            $result = $this->db->get('cost_subgroup');
            $res = $result->result();
            echo "<option value=''></option>";
            foreach ($res as $val){

                  $coss = "<option class='em' value='".$val->cgroup_code4."'>[".$val->cgroup_code4."]-".$val->cgroup_name4."</option>";
 
                echo $coss;
            }
        }

        function get_cost_subgroup_cost4_boq_show()
        {
            $id = $this->uri->segment(3);
            $group = $this->uri->segment(4); 
            $subgroup = $this->uri->segment(5); 
             $this->db->select('*');
             $this->db->where('ctype_code',$id);
             $this->db->where('cgroup_code',$group);
             $this->db->where('csubgroup_code',$subgroup);
             $this->db->where('cost_status',"N");
             $this->db->group_by('csubgroup_code');
             $this->db->order_by('csubgroup_code','asc');
            $result = $this->db->get('cost_subgroup');
            $res = $result->result();
            
            foreach ($res as $val){

                  $coss = "<b>[".$val->csubgroup_code."] - ".$val->csubgroup_name."</b>";
 
                echo $coss;
            }
        }

         function get_cost_subgroup_cost5_boq()
        {
            $id = $this->uri->segment(3);
            $group = $this->uri->segment(4);
            $subgroup = $this->uri->segment(5); 
            $cost4 = $this->uri->segment(6); 
            $this->db->select('*');
            $this->db->where('ctype_code',$id);
            $this->db->where('cgroup_code',$group);
            $this->db->where('csubgroup_code',$subgroup);
            $this->db->where('cgroup_code4',$cost4);
            $this->db->where('cost_status',"N");
            $this->db->group_by('cgroup_code5');
            $this->db->order_by('cgroup_code5','asc');
            $result = $this->db->get('cost_subgroup');
            $res = $result->result();
             echo "<option value=''></option>";
            foreach ($res as $val){
              if ($val->costhead == "H") {
                  $coss = "<option class='em' style='background: #00BCD4;' value='".$val->cgroup_code5."'>[".$val->costhead."] &nbsp;[ ".$val->cgroup_code5." ]-".$val->cgroup_name5."</option>";
                }else{
                  $coss = "<option class='em' value='".$val->cgroup_code5."'>[".$val->costhead."] &nbsp;[".$val->cgroup_code5." ]-".$val->cgroup_name5."</option>";
                }
                echo $coss;
            }
        }


        function get_cost_subgroup_cost5_boq_show()
        {
            $id = $this->uri->segment(3);
            $group = $this->uri->segment(4);
            $subgroup = $this->uri->segment(5); 
            $cost4 = $this->uri->segment(6); 
            $this->db->select('*');
            $this->db->where('ctype_code',$id);
            $this->db->where('cgroup_code',$group);
            $this->db->where('csubgroup_code',$subgroup);
            $this->db->where('cgroup_code4',$cost4);
            $this->db->where('cost_status',"N");
            $this->db->group_by('cgroup_code4');
            $this->db->order_by('cgroup_code4','asc');
            $result = $this->db->get('cost_subgroup');
            $res = $result->result();
            
            foreach ($res as $val){
              if ($val->costhead == "H") {
                  $coss = "<b>[".$val->cgroup_code4."] - ".$val->cgroup_name4."</b>";
                }else{
                  $coss = "<b>[".$val->cgroup_code4."] - ".$val->cgroup_name4."</b>";
                }
                echo $coss;
            }
        }

        function get_cost_subgroup_cost6_boq_show()
        {
            $id = $this->uri->segment(3);
            $group = $this->uri->segment(4);
            $subgroup = $this->uri->segment(5); 
            $cost4 = $this->uri->segment(6); 
            $cost5 = $this->uri->segment(7); 
            $this->db->select('*');
            $this->db->where('ctype_code',$id);
            $this->db->where('cgroup_code',$group);
            $this->db->where('csubgroup_code',$subgroup);
            $this->db->where('cgroup_code4',$cost4);
            $this->db->where('cgroup_code5',$cost5);
            $this->db->where('cost_status',"N");
            $this->db->group_by('cgroup_code5');
            $this->db->order_by('cgroup_code5','asc');
            $result = $this->db->get('cost_subgroup');
            $res = $result->result();
            
            foreach ($res as $val){
              if ($val->costhead == "H") {
                  $coss = "<b>[".$val->cgroup_code5."] - ".$val->cgroup_name5."</b>";
                }else{
                  $coss = "<b>[".$val->cgroup_code5."] - ".$val->cgroup_name5."</b>";
                }
                echo $coss;
            }
        }


        function get_cost_subgroup_cost6_boq_input()
        {
            $id = $this->uri->segment(3);
            $group = $this->uri->segment(4);
            $subgroup = $this->uri->segment(5); 
            $cost4 = $this->uri->segment(6); 
            $cost5 = $this->uri->segment(7); 
            $this->db->select('*');
            $this->db->where('ctype_code',$id);
            $this->db->where('cgroup_code',$group);
            $this->db->where('csubgroup_code',$subgroup);
            $this->db->where('cgroup_code4',$cost4);
            $this->db->where('cgroup_code5',$cost5);
            $this->db->where('cost_status',"N");
            $this->db->group_by('cgroup_code5');
            $this->db->order_by('cgroup_code5','asc');
            $result = $this->db->get('cost_subgroup');
            $res = $result->result();
            
            foreach ($res as $val){
              
                  $coss = "<input type='text' value='".$val->cgroup_name5."' id='cnamecost'  class='form-control input-sm'>";
             
                echo $coss;
            }
        }


        function get_cost_type()
        {
            //$id = $this->uri->segment();
            $this->db->select('*');
            $this->db->group_by('ctype_code');
            $result = $this->db->get('cost_subgroup');
            $res = $result->result();
            foreach ($res as $val){
                echo "<option class='nametype' value='".$val->ctype_code."' attr-name='".$val->ctype_name."'>  [ ".$val->ctype_code." ] -".$val->ctype_name."</option>";

            }
        }
        function get_cost_group()
        {
            $id = $this->uri->segment(3);
            $this->db->select('*');
            $this->db->where('ctype_code',$id);
            $this->db->group_by('cgroup_code');
            $result = $this->db->get('cost_subgroup');
            $res = $result->result();
            foreach ($res as $val){
                echo "<option attr-name='".$val->cgroup_name."' value='".$val->cgroup_code."'> [ ".$val->cgroup_code." ] -".$val->cgroup_name."</option>";

            }
        }
          function get_cost_subgroup()
        {
            $id = $this->uri->segment(3);
            $group = $this->uri->segment(4);
            $this->db->select('*');
            $this->db->where('ctype_code',$id);
             $this->db->where('cgroup_code',$group);
             $this->db->where('cost_status',"N");
             $this->db->group_by('csubgroup_code');
             $this->db->order_by('csubgroup_code','asc');
            $result = $this->db->get('cost_subgroup');
            $res = $result->result();
            foreach ($res as $val){
                // echo "<option value='".$val->csubgroup_code."'> [ ".$val->csubgroup_code." ] -".$val->csubgroup_name."</option>";
                  $coss = "<option attr-name='".$val->csubgroup_name."' value='".$val->csubgroup_code."'>[".$val->costhead."] &nbsp;[".$val->csubgroup_code." ]-".$val->csubgroup_name."</option>";
                
                echo $coss;
            }



        }

        function get_cost_subgroup_cost4()
        {
            $id = $this->uri->segment(3);
            $group = $this->uri->segment(4); 
            $subgroup = $this->uri->segment(5); 
             $this->db->select('*');
             $this->db->where('ctype_code',$id);
             $this->db->where('cgroup_code',$group);
             $this->db->where('csubgroup_code',$subgroup);
             $this->db->where('cost_status',"N");
             $this->db->group_by('cgroup_code4');
             $this->db->order_by('cgroup_code4','asc');
            $result = $this->db->get('cost_subgroup');
            $res = $result->result();
            foreach ($res as $val){

                  $coss = "<option attr-name='".$val->cgroup_name4."' value='".$val->cgroup_code4."'>[".$val->cgroup_code4."]-".$val->cgroup_name4."</option>";
 
                echo $coss;
            }



        }


         function get_cost_subgroup_cost5()
        {
            $id = $this->uri->segment(3);
            $group = $this->uri->segment(4);
            $subgroup = $this->uri->segment(5); 
            $cost4 = $this->uri->segment(6); 
            $this->db->select('*');
            $this->db->where('ctype_code',$id);
            $this->db->where('cgroup_code',$group);
            $this->db->where('csubgroup_code',$subgroup);
            $this->db->where('cgroup_code4',$cost4);
            $this->db->where('cost_status',"N");
            $this->db->group_by('cgroup_code5');
            $this->db->order_by('cgroup_code5','asc');
            $result = $this->db->get('cost_subgroup');
            $res = $result->result();
            foreach ($res as $val){
              if ($val->costhead == "H") {
                  $coss = "<option attr-name='".$val->cgroup_name5."' style='background: #00BCD4;' value='".$val->cgroup_code5."'>[".$val->costhead."] &nbsp;[ ".$val->cgroup_code5." ]-".$val->cgroup_name5."</option>";
                }else{
                  $coss = "<option attr-name='".$val->cgroup_name5."' value='".$val->cgroup_code5."'>[".$val->costhead."] &nbsp;[".$val->cgroup_code5." ]-".$val->cgroup_name5."</option>";
                }
                echo $coss;
            }
        }

               function get_cost_subgroupp()
        {
            $id = $this->uri->segment(3);
            $group = $this->uri->segment(4);
            $this->db->select('*');
            $this->db->where('ctype_code',$id);
             $this->db->where('cgroup_code',$group);
             $this->db->order_by('csubgroup_code','asc');
            $result = $this->db->get('cost_subgroup');
            $res = $result->result();
            foreach ($res as $val){
                // echo "<option value='".$val->csubgroup_code."'> [ ".$val->csubgroup_code." ] -".$val->csubgroup_name."</option>";
              if ($val->costhead == "H") {
                  // $coss = "<option value='".$val->csubgroup_code."' style='background: green;'>".$val->costhead."[ ".$val->csubgroup_code." ]"."</option>";
                  $coss = "<option style='background: #00BCD4;' value='".$val->csubgroup_code."'>[".$val->costhead."] &nbsp;[ ".$val->csubgroup_code." ]-".$val->csubgroup_name."</option>";
                }
                else {
                  $coss = "<option value='".$val->csubgroup_code."'>[".$val->costhead."] &nbsp;[".$val->csubgroup_code." ]-".$val->csubgroup_name."</option>";
                }
                echo $coss;
            }



        }
        function get_cost_subgroupname()
        {
            $id = $this->uri->segment(3);
            $this->db->select('*');
             $this->db->where('cgroup_code',$id);
            $result = $this->db->get('cost_subgroup');
            $res = $result->result();
            foreach ($res as $val){
                echo "<option value='".$val->csubgroup_name."'> [ ".$val->csubgroup_code." ] -".$val->csubgroup_name."</option>";
            }
        }

        function getall()
        {
            $ar = $this->input->post('b1');
            $ma = strlen($ar);
            if ($ma=="7") { //เช็คหน่วยของ matgroup หลักสิบ 00 เช่น M 00 00 00
                $id = substr($ar, 0,-6);
                $group = substr($ar, 1,-4);
                $subgroup = substr($ar, 3,-2);
                $unit = substr($ar, 5);
            }elseif($ma=="8"){ //เช็คหน่วยของ group หลักร้อย 000 เช่น M 000 00 00
                $id = substr($ar, 0,-7);
                $group = substr($ar, 1,-4);
                $subgroup = substr($ar, 4,-2);
                $unit = substr($ar, 6);
            }else{                 //เช็คหน่วยของ Subgroup หลักร้อย 000 เช่น M 000 000 00
                $id = substr($ar, 0,-8);
                $group = substr($ar, 1,-5);
                $subgroup = substr($ar, 4,-2);
                $unit = substr($ar, 7);
            }

            $this->db->select('matgroup_name,matsubgroup_name,matname');
            $this->db->from('mat_product');
            $this->db->join('mat_subgroup','mat_subgroup.matsubgroup_code = mat_product.matsubgroup_code');
            $this->db->join('mat_group','mat_group.matgroup_code = mat_product.matgroup_code AND mat_group.matgroup_code = mat_subgroup.matgroup_code AND mat_product.matgroup_code = mat_subgroup.matgroup_code');
            $this->db->join('mat_type','mat_type.mattype_code = mat_group.mattype_code AND mat_type.mattype_code = mat_subgroup.mattype_code AND mat_type.mattype_code = mat_product.mattype_code AND mat_group.mattype_code = mat_product.mattype_code AND mat_group.mattype_code = mat_subgroup.mattype_code AND mat_subgroup.mattype_code = mat_product.mattype_code');
            $this->db->where('mat_product.matcode',$unit);
            $this->db->where('mat_product.matsubgroup_code',$subgroup);
            $this->db->where('mat_product.matgroup_code',$group);
            $this->db->where('mat_product.mattype_code',$id);
            $query = $this->db->get();
            $res = $query->result();
                foreach ($res as $e) {
                   $name = $e->matgroup_name;
                   $subname = $e->matsubgroup_name;
                   $unitname = $e->matname;
                }
               echo $name." ".$subname;
                return true;
        }

        public function getall_costcode()
        {
            $costcode = $this->input->post('c1');
           // SE000 SE500 SE520
            $c1 = substr($costcode, 0,-10);
            $c2 = substr($costcode, 5,-5);
            $c3 = substr($costcode, 10, 5);

            $this->db->select('ctype_name,cgroup_name,csubgroup_name');
            $this->db->from('cost_type');
            $this->db->join('cost_group','cost_group.ctype_code = cost_type.ctype_code');
            $this->db->join('cost_subgroup','cost_subgroup.cgroup_code = cost_group.cgroup_code AND cost_subgroup.ctype_code = cost_type.ctype_code');
            $this->db->where('cost_subgroup.ctype_code',$c1);
            $this->db->where('cost_subgroup.cgroup_code',$c2);
            $this->db->where('cost_subgroup.csubgroup_code',$c3);
            $query = $this->db->get();
            $res = $query->result();
                foreach ($res as $e) {
                   $ctname = $e->ctype_name;
                   $cgname = $e->cgroup_name;
                   $csname = $e->csubgroup_name;
                }
            echo $csname;
           return true;
        }

        public function allmaterial()
        {
            $this->db->select('matgroup_name,matsubgroup_name,matname');
            $this->db->from('mat_product');
            $this->db->join('mat_subgroup','mat_subgroup.matsubgroup_code = mat_product.matsubgroup_code');
            $this->db->join('mat_group','mat_group.matgroup_code = mat_product.matgroup_code AND mat_group.matgroup_code = mat_subgroup.matgroup_code AND mat_product.matgroup_code = mat_subgroup.matgroup_code');
            $this->db->join('mat_type','mat_type.mattype_code = mat_group.mattype_code AND mat_type.mattype_code = mat_subgroup.mattype_code AND mat_type.mattype_code = mat_product.mattype_code AND mat_group.mattype_code = mat_product.mattype_code AND mat_group.mattype_code = mat_subgroup.mattype_code AND mat_subgroup.mattype_code = mat_product.mattype_code');
            $this->db->where('mat_product.matcode',$unit);
            $this->db->where('mat_product.matsubgroup_code',$subgroup);
            $this->db->where('mat_product.matgroup_code',$group);
            $this->db->where('mat_product.mattype_code',$id);
            $query = $this->db->get();
            $res = $query->result();
               //  foreach ($res as $e) {
               //     $name = $e->matgroup_name;
               //     $subname = $e->matsubgroup_name;
               //     $unitname = $e->matname;
               //  }
               // echo $name." ".$subname;
                return true;
        }
        public function gettypename()
        {
          $type = $this->uri->segment(3);
          $tname = $this->mat_m->get_type($type);
          foreach ($tname as $vtname) {
            $matname = $vtname->mattype_name;
          }
          echo $matname;
          return true;
        }
        public function getctypename()
        {
          $type = $this->uri->segment(3);
          $tname = $this->db->query("select ctype_name from cost_type where ctype_code='$type'")->result();
          foreach ($tname as $vtname) {
            $ctype_name = $vtname->ctype_name;
          }
          echo $ctype_name;
          return true;
        }
        public function getctypename_u()
        {
          $type = $this->uri->segment(3);
          $tname = $this->db->query("select ctype_name from cost_subgroup where ctype_code='$type'")->result();
          foreach ($tname as $vtname) {
            $ctype_name = $vtname->ctype_name;
          }
          echo $ctype_name;
          return true;
        }
        public function getcgroupname()
        {
          $type = $this->uri->segment(3);
          $group = $this->uri->segment(4);
          $tname = $this->db->query("select cgroup_name from cost_group where ctype_code='$type' and cgroup_code='$group'")->result();
          foreach ($tname as $vtname) {
            $cgroup_name = $vtname->cgroup_name;
          }
          echo $cgroup_name;
          return true;
        }
        public function getcgroupname_u()
        {
          $type = $this->uri->segment(3);
          $group = $this->uri->segment(4);
          $tname = $this->db->query("select cgroup_name from cost_subgroup where ctype_code='$type' and cgroup_code='$group'")->result();
          foreach ($tname as $vtname) {
            $cgroup_name = $vtname->cgroup_name;
          }
          echo $cgroup_name;
          return true;
        }
        public function getcsubgroupname()
        {
          $type = $this->uri->segment(3);
          $group = $this->uri->segment(4);
          $sub = $this->uri->segment(5);
          $tname = $this->db->query("select csubgroup_name from cost_subgroup where ctype_code='$type' and cgroup_code='$group' and csubgroup_code='$sub'")->result();
          foreach ($tname as $vtname) {
            $csubgroup_name = $vtname->csubgroup_name;
          }
          echo $csubgroup_name;
          return true;
        }
        public function getcbrandname()
        {
          $type = $this->uri->segment(3);
          $group = $this->uri->segment(4);
          $sub = $this->uri->segment(5);
          $spec = $this->uri->segment(6);
          $brand = $this->uri->segment(7);
          $tname = $this->db->query("select cgroup_name5 from cost_subgroup where ctype_code='$type' and cgroup_code='$group' and csubgroup_code='$sub' and cgroup_code4='$spec' and cgroup_code5='$brand'")->result();
          foreach ($tname as $vtname) {
            $cgroup_name5 = $vtname->cgroup_name5;
          }
          echo $cgroup_name5;
          return true;
        }
        public function getcspecname()
        {
          $type = $this->uri->segment(3);
          $group = $this->uri->segment(4);
          $sub = $this->uri->segment(5);
          $spec = $this->uri->segment(6);
          $tname = $this->db->query("select cgroup_name4 from cost_subgroup where ctype_code='$type' and cgroup_code='$group' and csubgroup_code='$sub' and cgroup_code4='$spec'")->result();
          foreach ($tname as $vtname) {
            $cgroup_name4 = $vtname->cgroup_name4;
          }
          echo $cgroup_name4;
          return true;
        }
        public function getgroupname()
        {
          $type = $this->uri->segment(3);
          $group = $this->uri->segment(4);
          $tname = $this->mat_m->get_group($type,$group);
          foreach ($tname as $vtname) {
            $matname = $vtname->matgroup_name;
          }
          echo $matname;
          return true;
        }
        public function getproductname()
        {
          $type = $this->uri->segment(3);
          $group = $this->uri->segment(4);
          $product= $this->uri->segment(5);
          $tname = $this->mat_m->get_subgroup($type,$group,$product);
          foreach ($tname as $vtname) {
            $matname = $vtname->matsubgroup_name;
          }
          echo $matname;
          return true;
        }
        public function getunitnamen()
        {
          $type = $this->uri->segment(3);
          $group = $this->uri->segment(4);
          $product= $this->uri->segment(5);
          $unit = $this->uri->segment(6);
          $tname = $this->mat_m->get_product($type,$group,$product,$unit);
          foreach ($tname as $vtname) {
            $matname = $vtname->matname;
          }
          echo $matname;
          return true;
        }
        public function getbranname()
        {
          $type = $this->uri->segment(3);
          $group = $this->uri->segment(4);
          $product= $this->uri->segment(5);
          $unit = $this->uri->segment(6);
          $bran = $this->uri->segment(7);
          $tname = $this->mat_m->get_spec($type,$group,$product,$unit,$bran);
          foreach ($tname as $vtname) {
            $matname = $vtname->matspec_name;
          }
          echo $matname;
          return true;
        }
        public function getbrannamesix()
        {
          $type = $this->uri->segment(3);
          $group = $this->uri->segment(4);
          $product= $this->uri->segment(5);
          $unit = $this->uri->segment(6);
          $bran = $this->uri->segment(7);
          $sixbrand  = $this->uri->segment(8);
          $tname = $this->mat_m->get_brand($type,$group,$product,$unit,$bran,$sixbrand);
          foreach ($tname as $vtname) {
            $matname = $vtname->matbrand_name;
          }
          echo $matname;
          return true;
        }
        public function getbranunitsix()
        {
          $type = $this->uri->segment(3);
          $group = $this->uri->segment(4);
          $product= $this->uri->segment(5);
          $unit = $this->uri->segment(6);
          $bran = $this->uri->segment(7);
          $sixbrand  = $this->uri->segment(8);
          $tname = $this->mat_m->get_brandunit($type,$group,$product,$unit,$bran,$sixbrand);
          foreach ($tname as $vtname) {
            $matname = $vtname->matunit;
          }
          echo $matname;
          return true;
        }
        public function getunit_name()
        {
          $this->load->model('datastore_m');
          $unitid = $this->uri->segment(3);
          $tname = $this->datastore_m->getunit_name($unitid);
          foreach ($tname as $vtname) {
            $unit_name = $vtname->unit_name;
          }
          echo $unit_name;
          return true;
        }

        //  public function getunitnameseven()
        // {
        //   $type = $this->uri->segment(3);
        //   $group = $this->uri->segment(4);
        //   $product= $this->uri->segment(5);
        //   $unit = $this->uri->segment(6);
        //   $bran = $this->uri->segment(7);
        //   $sixbrand  = $this->uri->segment(8);
        //   $tname = $this->mat_m->get_unitty($type,$group,$product,$unit,$bran,$sixbrand);
        //   foreach ($tname as $vtname) {
        //     $matname = $vtname->matunit_name;
           
        //   }
        //   echo $matname;
        //   return true;
        // }


          public function getunitcodeseven()
        {
          $type = $this->uri->segment(3);
          $group = $this->uri->segment(4);
          $product= $this->uri->segment(5);
          $unit = $this->uri->segment(6);
          $bran = $this->uri->segment(7);
          $sixbrand  = $this->uri->segment(8);
           $b9 = $this->uri->segment(9);
          $tname = $this->mat_m->get_unitty($type,$group,$product,$unit,$bran,$sixbrand,$b9);
          foreach ($tname as $vtname) {
            
            $matucode = $vtname->matunit_name;
          }
          echo $matucode;
          return true;
        }

        public function getunitcodesevenid()
        {
          $type = $this->uri->segment(3);
          $group = $this->uri->segment(4);
          $product= $this->uri->segment(5);
          $unit = $this->uri->segment(6);
          $bran = $this->uri->segment(7);
          $sixbrand  = $this->uri->segment(8);
           $b9 = $this->uri->segment(9);
          $tname = $this->mat_m->get_unitty($type,$group,$product,$unit,$bran,$sixbrand,$b9);
          foreach ($tname as $vtname) {
            
            $matucode = $vtname->matunit_id;
          }
          echo $matucode;
          return true;
        }

        public function getctype_where()
        {
          $c1 = $this->uri->segment(3);

          $res = $this->mat_m->get_costtypecode($c1);

          foreach ($res as $key => $val) {
             echo "<option value='".$val->ctype_code."'> [ ".$val->ctype_code." ] -".$val->ctype_name."</option>";
          }
        }
        public function getcsubgroup_where()
        {
          $c1 = $this->uri->segment(3);
          $c2 = $this->uri->segment(4);

          $res = $this->mat_m->get_costgroupcode($c1,$c2);

          foreach ($res as $key => $val) {
             echo "<option value='".$val->cgroup_code."'> [ ".$val->cgroup_code." ] -".$val->cgroup_name."</option>";
          }
        }

         function getcostcode3_where()
        {
          $c1 = $this->uri->segment(3);
          $c2 = $this->uri->segment(4);
          $b1 = $this->uri->segment(5);

          $res = $this->mat_m->get_costcode($c1,$c2,$b1);

          foreach ($res as $val){
                 echo "<option value='".$val->csubgroup_code."'>[".$val->costhead."] &nbsp;[".$val->csubgroup_code." ]-".$val->csubgroup_name."</option>";          
            }
        }

      function getcostcode4_where()
        {
          $c1 = $this->uri->segment(3);
          $c2 = $this->uri->segment(4);
          $c3 = $this->uri->segment(5);
          $b1 = $this->uri->segment(6);

          $res = $this->mat_m->get_costcode4($c1,$c2,$c3,$b1);

          foreach ($res as $val){
                $coss = "<option value='".$val->cgroup_code4."'>[".$val->cgroup_code4."]-".$val->cgroup_name4."</option>";
 
                echo $coss;  
            }
        }


      function getcostcode5_where()
        {
          $c1 = $this->uri->segment(3);
          $c2 = $this->uri->segment(4);
          $c3 = $this->uri->segment(5);
          $c4 = $this->uri->segment(6);
          $b1 = $this->uri->segment(7);

          $res = $this->mat_m->get_costcode5($c1,$c2,$c3,$c4,$b1);

          foreach ($res as $val){
                 if ($val->costhead == "H") {
                  $coss = "<option style='background: #00BCD4;' value='".$val->cgroup_code5."'>[".$val->costhead."] &nbsp;[ ".$val->cgroup_code5." ]-".$val->cgroup_name5."</option>";
                }else{
                  $coss = "<option value='".$val->cgroup_code5."'>[".$val->costhead."] &nbsp;[".$val->cgroup_code5." ]-".$val->cgroup_name5."</option>";
                }
                echo $coss;      
            }
        }

}
