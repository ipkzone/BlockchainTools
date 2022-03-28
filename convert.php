<?php
date_default_timezone_set('Asia/Jakarta');
error_reporting(0);
set_time_limit(0);
ini_set('memory_limit', '-1');
ini_set('output_buffering', 0);
ini_set('request_order', 'GP');
ini_set('variables_order', 'EGPCS');
ini_set('max_execution_time', '-1');

//collor
$g = "\e[92m";
$w = "\e[0m";
$y = "\e[33m";

echo " AmountConvert: ";
$amount = rtrim(fgets(STDIN), "\n");

$header = array(
    'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
    'accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7,ru;q=0.6,mt;q=0.5',
    'referer: referer: https://www.google.com/',
    'user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4858.93 Safari/537.36',
    'cookie: optimizelyEndUserId=oeu1648486811020r0.46293288657542253; _uetsid=8b172b80aeb811ecbb9bf5f3851dbc21; _uetvid=8b171030aeb811ec911e8dc4019b4a16; IR_gbd=xe.com; IR_12610=1648486817385%7C0%7C1648486817385%7C%7C; _fbp=fb.1.1648486817677.102773605; __gads=ID=d161f0cbf89d8cce-22ac5abd5fd10075:T=1648486829:RT=1648486829:S=ALNI_MZtKfCIniiJKRfq6WAt-gE9BAhDeA; dmxRegion=false; amp_470887=E8i1Lk0ZdPiRLCxLM9R1Bz...1fv8nh6pl.1fv8nhvtu.4.2.6; lastConversion={%22amount%22:2%2C%22fromCurrency%22:%22USD%22%2C%22toCurrency%22:%22IDR%22}'
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.xe.com/currencyconverter/convert/?Amount=" . $amount . "&From=USD&To=IDR");
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$result = curl_exec($ch);
curl_close($result);
$json = json_decode($result, true);
$a = explode('<p class="result__BigRate-sc-1bsijpp-1 iGrAod">', $result);
$b = explode('<span class="faded-digits"></span> Indonesian Rupiahs</p>', $a[1]);
$Resultconvert = "{$b[0]}";
echo " Convert: {$g}" . $Resultconvert . "{$w} IDR\n";
