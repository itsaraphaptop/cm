
<style>

        body{background: #ddd;}
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
            top: .5in;
            height: .6in;
            left: .5in;
            right: .5in;

        }
        .invoice-number {
            padding-top: -3in;
            float: right;
           position:relative;
        }

        .size-a4 { width: 8.3in; height: 11.5in; }
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

<?php $n=0;  foreach ($compimg as $k) {
  $project_name=$k->project_name;
  $inv_desc=$k->inv_desc;
  $inv_period=$k->inv_period;
  $inv_no=$k->inv_no;
  $inv_netamt=$k->inv_netamt;
  $inv_vatper=$k->inv_vatper;
  $inv_vatamt=$k->inv_vatamt;
  $inv_downamt=$k->inv_downamt;
  $inv_lesswt=$k->inv_lesswt;
  $inv_date=$k->inv_date;
  $debtor_name=$k->debtor_name;
  $debtor_tax=$k->debtor_tax;
  $debtor_address=$k->debtor_address;
  $compcode=$k->company_taxnum;
  $project=$k->project_engineer;
  $inv_credit=$k->inv_credit;
$n++; } ?>

<div id="example" >
  <div class="page-container">
    <div class="pdf-page size-a4">
      <div class="pdf-header">
        <span class="company-logo"></span>
        <div class="row">
          <div class="col-xs-12">
            <div class="row">
              <div class="col-xs-2">
                <div class="form-group">
                  <p style="margin-top:-10px;"> <img src="<?php echo base_url();?>/comp/comp_2016-01-07_9779.png" class="img-responsive" style="height:45px;"></p>                
                </div>
              </div>
              <div class="col-xs-10" style="text-align: center;">
                <div class="form-group">
                   <p style="font-size:16px;  margin-left:-100px;">บริษัท เมฆา-เอส จำกัด</p>
                  <p style="font-size:11px; margin-left:-100px;">166 หมู่ 10 ต.สำโรงเหนือ อ.เมืองสมุทรปราการ</p>
                  <p style="font-size:11px; margin-left:-100px;"> จ.สมุทรปราการ 10270</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-4" style="text-align: center;">
            <p>(ต้นฉบับ)</p> 
            <p>(ORIGINAL)</p>          
          </div>
          <div class="col-xs-4" style="text-align: center;">
            <p>ใบแจ้งหนี้</p> 
            INVOICE         
          </div>
          <div class="col-xs-4" style="text-align: center;">
            <p>เลขประจำตัวผู้เสียภาษีอากร</p> 
            <p><?php echo $compcode; ?></p>          
          </div>
        </div>
        <div class="row">
          <div class="col-xs-7">
             <div class="panel panel-default">
                <div class="form-group" style="margin-left: 15px; margin-top:10px; font-size:11px; margin-bottom:0px;">
                  <div class="row">
                    <div class="col-xs-2">
                      <p>ลูกค้า:</p>
                    </div>
                    <div class="col-xs-5">
                    <p><?php echo $debtor_name; ?></p>
                    </div>
                    <div class="col-xs-5">
                    <p>เลขประจำตัวผู้เสียภาษีอากร</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-2"></div>
                    <div class="col-xs-5">
                    <p>สำนักงานใหญ่</p>
                    </div>
                    <div class="col-xs-5">
                    <p><?php echo $debtor_tax; ?></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-2"></div>
                    <div class="col-xs-10">
                    <p><?php echo $debtor_address; ?></p> 
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div class="col-xs-5">
            <div class="panel panel-default" >
              <div class="form-group" style="margin-left: 15px; margin-top:10px; font-size:11px; margin-bottom:0px;">
                <div class="row">
                  <div class="col-xs-6" style="text-align: right;">
                    <p>เลขที่  :</p>
                  </div>
                  <div class="col-xs-6" style="text-align: left;">
                  <?php echo $inv_no; ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-6" style="text-align: right;">
                    <p>วันที่  :</p>
                  </div>
                  <div class="col-xs-6" style="text-align: left;">
                    <?php echo $inv_date; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <table class="table table-bordered table-xxs">
            <tr>
              <th width="20%">Project / โครงการ</th>
              <th width="20%">Term of payment</th>
              <th width="20%">Ref :</th>
              <th width="20%">PD :</th>
            </tr>
            <tr align="center" >
              <td><?php echo $project_name; ?></td>
              <td><?php echo $inv_credit; ?></td>
              <td></td>
              <td><?php echo $project; ?></td>
            </tr>
          </table>  
        </div>
        <br>
        <table class="table table-bordered table-xxs">
          <thead>
            <tr align="center" >
              <td>No.<br>ลำดับ</td>
              <td>Description<br>รายการ</td>
              <!-- <td>Quantity<br>ปริมาณ</td>
              <td>Unit<br>หน่วย</td>
              <td>Unit price<br>ราคาต่อหน่วย</td> -->
              <td>Amount<br>จำนวนเงิน</td>
            </tr>
          </thead>
          <tbody>
          
            <tr>
              <td align="center"><?php echo $n; ?></td>
              <td>
                  <?php 
                    echo $inv_desc."<br>"."โครงการ  : ".$project_name."<br>"."งวดที่ ".$inv_period; 
                    ?>
              </td>
              <!-- <td></td>
              <td></td>
              <td></td> -->
              <td align="right"><?php echo $inv_downamt; ?></td>
            </tr>
            <tr align="right"> 
              <td colspan="2">ยอดรวม</td>
              <td><?php echo $inv_downamt; ?></td>
            </tr>
            <tr align="right"> 
              <td colspan="2">ภาษีมูลค่าเพิ่ม <?php echo number_format($inv_vatper,0); ?>%</td>
              <td><?php echo $inv_vatamt; ?></td>
            </tr>
            <tr align="right"> 
              <td colspan="2">หัก ณ ที่จ่าย</td>
              <td><?php echo $inv_lesswt; ?></td>
            </tr>
            <tr align="right"> 
              <td colspan="2">ยอดรวมสุทธิ</td>
              <td><?php echo $inv_netamt; ?></td>
            </tr>
            <tr align="right"> 
              <td colspan="5">รวมเป็นเงิน (<?php echo convert($inv_netamt); ?>)</td>
            </tr>
          </tbody>
        </table>
        <br>
        <div class="container-fluid">
          <div class="col-xs-12">
            <p>
               หมายเหตุ :
            </p>
            <p style="margin-left: 40px;"> กรุณาสั่งจ่ายเช็คขีดคร่อมในนามบริษัท เมฆา-เอส จำกัด เท่านั้น </p>
          </div>
          <div class="col-xs-4">
            Chq. No.____________________
          </div>
          <div class="col-xs-4">
            Bank / Branch ________________
          </div>
          <div class="col-xs-4">
            Date :____________________
          </div>

          <div class="pdf-footer">
            <table class="table table-bordered table-xxs" >
              <tbody>
                <tr>
                  <td align="center">
                    <p style="line-height: 9pt;  font-weight:normal">ได้รับบริการเรียบร้อยแล้ว</p><br>
                    <p align="left">ลงชื่อ</p>
                    <p>ผู้รับบริการ /Received By</p>
                    <p>วันที่ :____/____/_____</p>
                  </td>
                  <td rowspan="2">
                    <p style="line-height: 9pt;  font-weight:normal">ในนามบริษัท เมฆา-เอส จำกัด</p><br>
                    <p align="left">ลงชื่อ</p>
                    <p>ผู้ส่งมอบงาน / Cashier</p>
                    <p>วันที่ :____/____/_____</p>
                  </td>
                  <td>
                    <p style="line-height: 9pt;  font-weight:normal">ในนามบริษัท เมฆา-เอส จำกัด</p><br>
                    <p align="left">ลงชื่อ</p>
                    <p>ผู้มีอำนาจอนุมัติ / Manager</p>
                    <p>วันที่ :____/____/_____</p>
                  </td>
                </tr>
              </tbody>
            </table>
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
 ?>