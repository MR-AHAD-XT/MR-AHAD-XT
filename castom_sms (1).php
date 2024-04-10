<?php
$number = $_GET["number"];
$msg = $_GET["msg"];

$curl = curl_init();

$data = [
  "receiver" => $number,
  "text" => $msg,
  "title" => "Register Account"
];

curl_setopt_array($curl, [
  CURLOPT_URL => 'http://202.51.182.198:8081/nbp/sms/code',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => json_encode($data),
  CURLOPT_HTTPHEADER => [
    'User-Agent: okhttp/3.11.0',
    'Connection: Keep-Alive',
    'Accept-Encoding: gzip',
    'Content-Type: application/json',
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo 'cURL Error #:' . $err;
} else {
  echo $response;
}
?>
