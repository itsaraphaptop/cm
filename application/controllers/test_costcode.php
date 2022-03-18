 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class test_costcode extends CI_Controller {
    public function __construct() {
            parent::__construct();
        }
      public function test()
      {
        $costcode = "ME10621";
        // echo substr($costcode,0,-6);

        // echo substr($costcode,1,-3)."<br/>";
        // echo substr($costcode,4,-2)."00<br/>";
        // echo substr($costcode,4,-1)."0<br/>";
        // echo substr($costcode,4)."<br/>";

        $q=$this->db->query("select substr(poi_costcode,-7,1)as sa, sum(poi_netamt) as ss from po left outer join po_item on po_item.poi_ref=po.po_pono group by substr(po_item.poi_costcode,-7,1)")->result();
        foreach ($q as $key => $valuew) {
          // echo $valuew->sa."------------".number_format($valuew->ss,2)."<br/>";
          
        }
        $qq=$this->db->query("select substr(poi_costcode,-7,3)as sa, sum(poi_netamt) as ss from po left outer join po_item on po_item.poi_ref=po.po_pono group by substr(poi_costcode,-7,3)")->result();
          foreach ($qq as $key => $value) {
            echo $value->sa."------------".number_format($value->ss,2)."<br/>";
          }
      }

}
