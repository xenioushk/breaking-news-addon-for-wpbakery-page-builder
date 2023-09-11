<?php

/**
 * Plugin Name: Breaking News Addon For WP Bakery Page Builder
 * Plugin URI:  https://github.com/xenioushk/breaking-news-addon-for-wpbakery-page-builder
 * Version: 1.0.4
 * Description: Simplify the Process. Use WP Bakery Page Builder to Easily Create and Showcase Breaking News Anywhere on Your Site.
 * Author: Mahbub Alam Khan
 * Author URI:  https://codecanyon.net/user/xenioushk
 * Text Domain: bnm_vc
 * WP Requires at least: 6.0+
 * Domain Path: /languages/
 * 
 * 
 * @package Breaking News Addon For WP Bakery Page Builder
 * @author Mahbub Alam Khan
 * @license GPL-2.0+
 * @link https://codecanyon.net/user/xenioushk
 * @copyright 2023 BlueWindLab
 */

if (!defined('ABSPATH')) {
  die('-1');
}

if (!class_exists('BNM_VC_Addon')) {

  class BNM_VC_Addon
  {

    public function __construct()
    {

      define("BNM_VC_PLUGIN_TITLE", 'Breaking News Addon For WP Bakery Page Builder');
      define("BNM_VC_PLUGIN_DIR", plugins_url() . '/breaking-news-addon-for-visual-composer/');
      define("BNM_VC_PLUGIN_VERSION", '1.0.4');
      define('BNM_PLUGIN_INSTALLED_VERSION', get_option('bnm_plugin_version'));

      define("BNM_VC_PLUGIN_ROOT_FILE", 'bwl-breaking-news-manager.php');
      define("BNM_VC_PLUGIN_UPDATER_SLUG", plugin_basename(__FILE__)); // Required for plugin autoupdate.

      define("BNM_VC_PLUGIN_PATH", __DIR__);
      define('BNM_VC_INSTALLATION_TAG', 'bnm_vc_installation_' . str_replace('.', '_', BNM_VC_PLUGIN_VERSION));

      define("BNM_VC_CC_ID", "15317185"); // Plugin codecanyon Id.

      // Check the WPBakery Page Builder  && BWL Breaking New Manager Install & Activation Status.
      if (!defined('WPB_VC_VERSION') || !class_exists('BWL_Breaking_News_Manager')) {
        add_action('admin_notices', [$this, 'noticeBnmVcDependencies']);
      } else {

        $this->includeFiles();

        add_action('admin_enqueue_scripts', [$this, 'enqueueAdminScripts']);

      add_action("wp_enqueue_scripts", [$this, "enqueueFrontendScripts"]);
      add_action('admin_enqueue_scripts', [$this, 'enqueueAdminScripts']);

      // Load Translation File
      add_action('plugins_loaded', [$this, 'bnmVcLoadTranslationFile']);
    }


    function noticeBnmVcDependencies()
    {
      echo '
      <div class="notice notice-error">
        <p><strong>' . BNM_VC_PLUGIN_TITLE . '</strong> requires both <strong><a href="https://1.envato.market/VKEo3" target="_blank">WPBakery Page Builder</a></strong> & <strong><a href="https://1.envato.market/bnm-wp" target="_blank">BWL Breaking News Manager</a></strong> plugins to be installed and activated on your site.</p>
      </div>';
    }

    function includeFiles()
    {

      require_once BNM_VC_PLUGIN_PATH . '/includes/bnm-vc-helpers.php';

      if (is_admin()) {
        require_once BNM_VC_PLUGIN_PATH . '/includes/bnm-vc-element.php';

        // Auto Updater Scripts.
        require_once BNM_VC_PLUGIN_PATH .  '/includes/autoupdater/WpAutoUpdater.php';
        require_once BNM_VC_PLUGIN_PATH .  '/includes/autoupdater/installer.php';
        require_once BNM_VC_PLUGIN_PATH .  '/includes/autoupdater/updater.php';
      }
    }

    function enqueueAdminScripts()
    {
      wp_enqueue_style('bnm-vc-admin', plugins_url('assets/styles/admin.css', __FILE__), false, BNM_VC_PLUGIN_VERSION, false);
      wp_enqueue_script('bnm-vc-admin', plugins_url('assets/scripts/admin.js', __FILE__), ['jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'jquery-ui-sortable'], BNM_VC_PLUGIN_VERSION, TRUE);
      wp_localize_script(
        'bnm-vc-admin',
        'BnmVcAdminData',
        [
          'product_id' => BNM_VC_CC_ID,
          'installation' => get_option(BNM_VC_INSTALLATION_TAG)
        ]
      );
    }

    function bnmVcLoadTranslationFile()
    {
      load_plugin_textdomain('bnm_vc', false, plugin_basename(dirname(__FILE__)) . '/languages/');
    }
  }

  /*--- Initialization---*/

  function bnmVcPluginInit()
  {
    new BNM_VC_Addon();
  }

  add_action('plugins_loaded', 'bnmVcPluginInit');
}