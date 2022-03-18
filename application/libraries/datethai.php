<?php

if (!defined(‘BASEPATH’)) exit(‘No direct script access allowed’);

class Mydate {

public function __construct() {
date_default_timezone_set(‘Asia/Bangkok’);
}

function ThaiLong($strDate, $style = 0) {
$strYear = date(“Y”, strtotime($strDate)) + 543;
$strMonth = date(“n”, strtotime($strDate));
$strDay = date(“d”, strtotime($strDate));
$strMonthCut = Array(“”, “ม.ค.”, “ก.พ.”, “มี.ค.”, “เม.ย.”, “พ.ค.”, “มิ.ย.”, “ก.ค.”, “ส.ค.”, “ก.ย.”, “ต.ค.”, “พ.ย.”, “ธ.ค.”);
$strMonthThai = $strMonthCut[$strMonth];

if ($style == 0) {
return “$strDay $strMonthThai $strYear”;
} else {
return “$strMonthThai พ.ศ.$strYear”;
}
}

function ThaiFull($strDate, $style = 0) {
$strYear = date(“Y”, strtotime($strDate)) + 543;
$strMonth = date(“n”, strtotime($strDate));
$strDay = date(“d”, strtotime($strDate));
$strMonthCut = Array(“”, “มกราคม”, “กุมภาพันธ์”, “มีนาคม”, “เมษายน”, “พฤษภาคม”, “มิถุนายน”, “กรกฏาคม”, “สิงหาคม”, “กันยายน”, “ตุลาคม”, “พฤศจิกายน”, “ธันวาคม”);
$strMonthThai = $strMonthCut[$strMonth];

if ($style == 0) {
return “$strDay $strMonthThai $strYear”;
} else {
return “$strMonthThai พ.ศ.$strYear”;
}
}

}