<?php

$updaterBase = 'https://projects.bluewindlab.net/wpplugin/zipped/plugins/';
$pluginRemoteUpdater = $updaterBase . 'bnm/notifier_bnm_vc.php';
new WpAutoUpdater(BNM_VC_PLUGIN_VERSION, $pluginRemoteUpdater, BNM_VC_PLUGIN_UPDATER_SLUG);
