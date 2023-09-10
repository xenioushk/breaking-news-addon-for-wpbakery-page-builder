<?php

add_action("wp_ajax_bnm_vc_installation_counter", "bnmVcAddInstallationData");

function bnmVcAddInstallationData()
{
  $apiURL = bnmVcApiUrl();
  $site_url = get_site_url();
  $product_id = BNM_VC_CC_ID; // change the id
  $ip = $_SERVER['REMOTE_ADDR'];
  $ver = BNM_VC_PLUGIN_VERSION;
  $requestUrl = $apiURL . "wp-json/bwlapi/v1/installation/count?product_id=$product_id&site=$site_url&referer=$ip&ver=$ver";

  bwllog($requestUrl);

  $output = wp_remote_get($requestUrl);

  // bwllog($output);

  // New Code.

  // Default.
  $data = [
    'status' => 0
  ];

  if (is_array($output) && !is_wp_error($output) && wp_remote_retrieve_response_code($output) === 200) {

    $data = wp_remote_retrieve_body($output); // Get the response body.

    $output_decode = json_decode($data, true);

    if (isset($output_decode['status']) && $output_decode['status'] != 0) {

      update_option(BNM_VC_INSTALLATION_TAG, '1'); // change the tag

      $data = [
        'status' => $output_decode['status'],
        'msg' => $output_decode['msg']
      ];
    }
  } else {
    // Request failed or returned an error status code.
    if (is_wp_error($output)) {
      // Handle WP_Error case.
      $error_message = $output->get_error_message();
      $data = [
        'msg' => $error_message
      ];
      bwllog($error_message);
    } else {
      // Handle non-200 status codes.
      $status_code = wp_remote_retrieve_response_code($output);

      $data = [
        'msg' =>  "Request failed with status code: $status_code"
      ];

      bwllog($data);
    }
  }

  // End new code.


  echo json_encode($data);

  die();
}
