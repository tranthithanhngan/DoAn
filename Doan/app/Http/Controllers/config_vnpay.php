<?php
namespace App\Http\Controllers;
date_default_timezone_set('Asia/Ho_Chi_Minh');


$vnp_TmnCode="TZIKCEOY";
$vnp_HashSecret="ZFVVHVKWMZZTRFNYZXHWQLQAMOWMMLZC";
$vnp_Url="https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl="http://127.0.0.1:8000/dathang";
$vnp_apiUrl="https://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
$startTime= date("YmdHis");
$expire= date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));