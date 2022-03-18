<style>
body {
      font-size: 16px;
}
.pdf-page {
            margin: 0 auto;
            box-sizing: border-box;
            box-shadow: 0 5px 10px 0 rgba(0,0,0,.3);
            background-color: #fff;
            color: #333;
            position: relative;
        }
        .pdf-header {
            position: absolute;
            top: .2in;
            height: .6in;
            left: .5in;
            right: .5in;

        }
        .invoice-number {
            padding-top: -3in;
            float: right;
           position:relative;
        }

        .size-a4 { width: 9.9in; height: 11.6929in; }
        .size-letter { width: 8.5in; height: 11in; }
        .size-executive { width: 7.25in; height: 10.5in; }

        .company-logo {
            font-size: 11px;
            font-weight: normal;
            color: #1a1e58;
            padding-top: 50px
        }


        #example{margin-top: 30px;}
        @media print {
.navbar{display: none;}

#example{margin-top:0px;}
}
.legend_custom {
    display: block;
    width: 100%;
    padding: 0;
    margin-bottom: 20px;
    font-size: 19.5px;
    line-height: inherit;
    color: #333333;
    border: 0;
    border-bottom: 1px solid #e5e5e5;
}
    </style>


    </style>
    <div class="container">
        <div id="navbar" class="collapse navbar-collapse">
            <button type="button" class="btn btn-primary navbar-btn" onclick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;พิมพ์</button>
        </div>
    </div>
<?php foreach ($chee as $k) {
	$runno = $k->runno;
    $chqno = $k->chqno;
    $paynet = $k->paynet;
    $chqdate = $k->chqdate;
    $vender_name = $k->vender_name;
    $payactive = $k->payactive;
}
$strDate = $chqdate; $chr_date=DateThai($strDate); 
  $str1= substr($chr_date,0,2);
  $str2= substr($chr_date,2,1);
  $str3= substr($chr_date,3,1);
  $str4= substr($chr_date,4,1);
  $str5= substr($chr_date,5,1);
  $str6= substr($chr_date,6,1);
  $str7= substr($chr_date,7,1);
  $str8= substr($chr_date,8,1);
?>
<div id="example" >
    <div class="page-container">
        <div class="pdf-page size-a4">
            <div class="pdf-header">
                <span class="company-logo"></span>
                <div class="row">
                  <div>
                     <p>
                      <span style="padding-left: 180px;">บริษัท เมฆา-เอส จำกัด</span> 
                        <span style="padding-left: 190px;">
                          <span style="padding-right: 26px;">
                            <?php echo $str1; ?>
                          </span>
                          <span style="padding-right: 26px;">
                            <?php echo $str2; ?>
                          </span>
                          <span style="padding-right: 26px;">
                            <?php echo $str3; ?>
                          </span>
                          <span style="padding-right: 26px;">
                            <?php echo $str4; ?>
                          </span>
                          <span style="padding-right: 26px;">
                            <?php echo $str5; ?>
                          </span>
                          <span style="padding-right: 26px;">
                            <?php echo $str6; ?>
                          </span>
                          <span style="padding-right: 26px;">
                            <?php echo $str7; ?>
                          </span>
                          <span style="padding-right: 26px;">
                            <?php echo $str8; ?>
                          </span>
                        </span>
                      </p>
                      <?php 
                        if ($payactive=="Y") 
                        {
                          ?>
                          <p style="text-align: center;">
                          <img style="-webkit-user-select: none; width: 200px;
                          height: 60px;" src="http://imshopping.rediff.com/imgshop/800-1280/shopping/pixs/23408/a/acpayee_57198652f1974._sss--1304-rktl-pkt-stamp---a-c-payee-only-.jpg"></p>
                          <?php
                        }else{
                          ?><br><br><br><?php
                        }
                       ?>
                      
                      <p>
                        <span style="padding-left: 100px;">
                          <?php echo $vender_name; ?>
                            
                        </span>
                      </p>
                      <p style="margin-top: 30px;">
                        <span style="padding-left: 100px;">
                          <?php 
                            echo "***".convert($paynet)."***" ; 
                          ?>
                        </span>
                      </p>
                      <p>
                        <span style="padding-left: 600px;">
                          <?php echo number_format($paynet,2) ; ?>
                        </span>
                      </p>
                      
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
function convert($number){
      $txtnum1 = array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ');
      $txtnum2 = array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน');
      $number = str_replace(",","",$number);
      $number = str_replace(" ","",$number);
      $number = str_replace("บาท","",$number);
      $number = explode(".",$number);
      if(sizeof($number)>2){
        return '';
        exit;
      }
      $strlen = strlen($number[0]);
      $convert = '';
      for($i=0;$i<$strlen;$i++){
        $n = substr($number[0], $i,1);
        if($n!=0){
          if($i==($strlen-1) AND $n==1){ $convert .= 'เอ็ด'; }
          elseif($i==($strlen-2) AND $n==2){  $convert .= 'ยี่'; }
          elseif($i==($strlen-2) AND $n==1){ $convert .= ''; }
          else{ $convert .= $txtnum1[$n]; }
          $convert .= $txtnum2[$strlen-$i-1];
        }
      }

      $convert .= 'บาท';
      if(@$number[1]=='0' OR @$number[1]=='00' OR
        @$number[1]==''){
        $convert .= 'ถ้วน';
    }else{
      $strlen = strlen($number[1]);
      for($i=0;$i<$strlen;$i++){
        $n = substr($number[1], $i,1);
        if($n!=0){
          if($i==($strlen-1) AND $n==1){$convert
            .= 'เอ็ด';}
            elseif($i==($strlen-2) AND
              $n==2){$convert .= 'ยี่';}
              elseif($i==($strlen-2) AND
                $n==1){$convert .= '';}
                else{ $convert .= $txtnum1[$n];}
              $convert .= $txtnum2[$strlen-$i-1];
            }
          }
          $convert .= 'สตางค์';
        }
        return $convert;
      }

      function DateThai($strDate)
    {
      $strYear = date("Y",strtotime($strDate))+543;
      $strMonth= date("n",strtotime($strDate));
      $strDay= date("j",strtotime($strDate));
      return " $strDay$strMonth$strYear";
    } ?>
