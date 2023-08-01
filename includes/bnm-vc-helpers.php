<?php

if (!function_exists('bwllog')) {
  function bwllog($message, $clean = false)
  {
    if (is_array($message)) {
      $message = json_encode($message);
    }

    $existing_logs = "";

    $log_file = plugin_dir_path(__FILE__) . "custom_logs.log";

    if ($clean == false) {
      $existing_logs = file_get_contents($log_file);
    }
    $new_log = date('Y-m-d h:i:s') . " :: " . $message . "\n" . $existing_logs;

    file_put_contents($log_file, $new_log);
  }
}


if (!function_exists('bnmVcApiUrl')) {

  function bnmVcApiUrl()
  {
    $baseUrl = get_home_url();
    if (strpos($baseUrl, "localhost") != false) {
      return "http://localhost/bwl_api/";
    } elseif (strpos($baseUrl, "staging.bluewindlab.com") != false) {
      return "https://staging.bluewindlab.com/bwl_api/";
    } else {
      return "https://api.bluewindlab.net/";
    }
  }
}
