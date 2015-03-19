<?php

define('PUMPJACK_DEBUG', TRUE);

//require_once "includes/context.inc";
//require_once "includes/js.inc";

/**
 * Implements hook_page_alter().
 */
function pumpjack_page_alter($vars) {
  pumpjack_add_js();
}

/**
 * ----------- JS -----------
 */

/**
 * Central function for adding javascript assets.
 *
 * Here, we have no conditions, but this is where we would conditionally
 * add our files.
 */
function pumpjack_add_js() {
  $actions = array(
    'bxslider' => array('plugin' => TRUE),
    'samify' => array('plugin' => TRUE),
  );

  foreach ($actions as $action => $options) {
    _pumpjack_add_js($action, $options['plugin']);
  }

  drupal_add_js(drupal_get_path('theme', 'e3_zen') .'/js/main.js', array(
      'scope' => 'footer'
  ));
}

/**
 * Helper function to add actions and plugins.
 */
function _pumpjack_add_js($action, $plugin = FALSE) {
  // Load minified js when debugging is off.
  $suffix = (PUMPJACK_DEBUG) ? '.js' : '.min.js';

  if ($plugin) drupal_add_js(_pumpjack_get_root() . '/js/plugins/jquery.' . $action . $suffix);
  drupal_add_js(_pumpjack_get_root() . '/js/actions/' . $action . $suffix);
}

/**
 * ----------- COMMON -----------
 */

/**
 * Helper function to get the theme root.
 */
function _pumpjack_get_root() {
  $pumpjack_root = &drupal_static(__FUNCTION__ . 'root', drupal_get_path('theme', 'pumpjack'));
  return $pumpjack_root;
}
