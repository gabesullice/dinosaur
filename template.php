<?php

define('PUMPJACK_DEBUG', TRUE);

include_once "./includes/js.inc";

/**
 * Implements hook_page_alter().
 */
function pumpjack_page_alter($vars) {
  pumpjack_add_js();
}

/**
 * Helper function to get the theme root.
 */
function _pumpjack_get_root() {
  $pumpjack_root = &drupal_static(__FUNCTION__ . 'root', drupal_get_path('theme', 'pumpjack'));
  return $pumpjack_root;
}
