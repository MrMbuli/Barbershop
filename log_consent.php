<?php
date_default_timezone_set('Africa/Johannesburg');
$data = [
  "timestamp" => date("Y-m-d H:i:s"),
  "ip" => $_SERVER['REMOTE_ADDR'],
  "user_agent" => $_SERVER['HTTP_USER_AGENT'],
  "page" => $_POST['page'] ?? "unknown",
];
$file = 'consent_log.json';
$logs = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
$logs[] = $data;
file_put_contents($file, json_encode($logs, JSON_PRETTY_PRINT));
echo "OK";
?>