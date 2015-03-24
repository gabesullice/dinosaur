<?php

define('DINOSAUR_DEBUG', TRUE);

//require_once "includes/context.inc";
//require_once "includes/js.inc";

/**
 * Implements hook_page_alter().
 */
function dinosaur_page_alter($vars) {
  dinosaur_add_js();
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
function dinosaur_add_js() {
  $actions = array(
    'bxslider' => array('plugin' => TRUE),
    'samify' => array('plugin' => TRUE),
  );

  foreach ($actions as $action => $options) {
    _dinosaur_add_js($action, $options['plugin']);
  }

  drupal_add_js(drupal_get_path('theme', 'dinosaur') .'/js/main.js', array(
      'scope' => 'footer'
  ));
}

/**
 * Helper function to add actions and plugins.
 */
function _dinosaur_add_js($action, $plugin = FALSE) {
  // Load minified js when debugging is off.
  $suffix = (DINOSAUR_DEBUG) ? '.js' : '.min.js';

  if ($plugin) drupal_add_js(_dinosaur_get_root() . '/js/plugins/jquery.' . $action . $suffix);
  drupal_add_js(_dinosaur_get_root() . '/js/actions/' . $action . $suffix);
}

/**
 * ----------- COMMON -----------
 */

/**
 * Helper function to get the theme root.
 */
function _dinosaur_get_root() {
  $dinosaur_root = &drupal_static(__FUNCTION__ . 'root', drupal_get_path('theme', 'dinosaur'));
  return $dinosaur_root;
}
