<?php

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
    _e3_zen_add_js($action, $options['plugin']);
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
 * Implements hook_context_plugins().
 */
function pumpjack_context_plugins() {
  $plugins = array();

  /**
  * Reactions
  */
  $plugins['pumpjack_addjs'] = array(
    'handler' => array(
      'path' => _pumpjack_get_root() . '/plugins',
      'file' => 'pumpjack_addjs.inc',
      'class' => 'pumpjack_addjs',
      'parent' => 'pumpjack',
    ),
  );

  return $plugins;
}
