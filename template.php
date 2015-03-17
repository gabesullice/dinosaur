<?php

define('PUMPJACK_DEBUG', TRUE);

/**
 * Implements hook_page_alter().
 */
function pumpjack_page_alter($vars) {
  pumpjack_add_js();
}

/**
 * Central function for adding javascript assets.
 *
 * Here, we have no conditions, but this is where we would conditionally
 * add our files.
 */
function pumpjack_add_js() {
  $actions = array(
    'bxslider',
    'samify',
  );

  foreach ($actions as $action) {
    _e3_zen_add_js_files($action, TRUE);
  }

  drupal_add_js(drupal_get_path('theme', 'e3_zen') .'/js/main.js', array(
      'scope' => 'footer'
  ));
}

/**
 * Helper function to add actions and plugins.
 */
function _pumpjack_add_js($action, $plugin = FALSE) {
  $pumpjack_root = &drupal_static(__FUNCTION__ . 'root', drupal_get_path('theme', 'pumpjack'));
  // Load minified js when debugging is off.
  $suffix = (PUMPJACK_DEBUG) ? '.js' : '.min.js';

  if ($plugin) drupal_add_js($pumpjack_root . '/js/plugins/jquery.' . $action . $suffix);
  drupal_add_js($pumpjack_root . '/js/actions/' . $action . $suffix);
}
