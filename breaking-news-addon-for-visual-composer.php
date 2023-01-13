<?php

/**
 * Plugin Name: Breaking News Addon For WP Bakery Page Builder
 * Plugin URI:  http://codecanyon.net/user/xenioushk
 * Version: 1.0.2
 * Description: Easy way to create & display breaking news any where of your site from WP Bakery Page Builder.
 * Author: xenioushk
 * Author URI:  http://codecanyon.net/user/xenioushk
 * Text Domain: bnm_vc
 * Domain Path: /languages/
 */

if (!defined('ABSPATH')) {
  die('-1');
}
include_once(ABSPATH . 'wp-admin/includes/plugin.php');
define("BNM_VC_PLUGIN_TITLE", 'Breaking News Addon For WP Bakery Page Builder');
define("BNM_VC_PLUGIN_DIR", plugins_url() . '/breaking-news-addon-for-visual-composer/');
define("BNM_VC_PLUGIN_VERSION", '1.0.2');
define("BNM_VC_PLUGIN_PRODUCTION_STATUS", 1); // Change this value in to 0 in Devloper mode :)
define('BNM_PLUGIN_INSTALLED_VERSION', get_option('bnm_plugin_version'));


function notice_bnm_dependencies()
{

  if (!function_exists('vc_map')) {
    echo '
        <div class="updated">
          <p>' . sprintf(__('<strong>%s</strong> requires <strong><a href="https://1.envato.market/VKEo3" target="_blank">WP Bakery Page Builder</a></strong> plugin to be installed and activated on your site.', 'vc_extend'), BNM_VC_PLUGIN_TITLE) . '</p>
        </div>';
  }

  if (!class_exists('BWL_Breaking_News_Manager')) {

    echo '
        <div class="updated">
          <p>' . sprintf(__('<strong>%s</strong> requires <strong><a href="https://1.envato.market/bnm-wp" target="_blank">BWL Breaking News Manager</a></strong> plugin to be installed and activated on your site. Minimum version <b>1.1.0</b> required ! ', 'vc_extend'), BNM_VC_PLUGIN_TITLE) . '</p>
        </div>';
  }
}


add_action('admin_notices', 'notice_bnm_dependencies');

include_once dirname(__FILE__) . '/includes/bnm-vc-element.php';
load_plugin_textdomain('bnm_vc', false, plugin_basename(dirname(__FILE__)) . '/languages/');