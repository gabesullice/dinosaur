<?php

/**
 * @file
 * The Context reaction plugin to add asset files
 *
 * Contextually add asset files to any page on your site.
 */

/**
 * Expose themes as context reactions.
 */
class dinosaur_helper_addjs extends context_reaction {

  function __construct($plugin, $info) {
    parent::__construct($plugin, $info);

    $this->title = t('Dinosaur JS');
  }

  /**
   * Editor form.
   */
  function editor_form($context) {
    $form = $this->options_form($context);
    return $form;
  }

  /**
   * Submit handler for editor form.
   */
  function editor_form_submit($context, $values) {
    return $values;
  }

  /**
   * Prepare formatted form array showing grouped assets
   *  grouped by location and show as checkboxes
   */
  function options_form($context) {
    $values = $this->fetch_from_context($context);

    $options = $this->asset_search();
    $options = !$options ? array() : $options;
    $options_array = array();

    foreach ($options as $key => $value) {
      $path = $key;
      $key = explode(' -- ', $value);
      $value = $key[1];
      $key = trim($key[0]);
      $options_array[$key][$path] = $value;
    }

    $form['#tree'] = TRUE;

    foreach ($options_array as $key => $items) {

      $form[$key] = array(
        '#type' => 'item',
        '#title' => $key,
      );

      foreach ($items as $path => $file_name) {
        $form[$key][$path] = array(
          '#title' => $file_name,
          '#type' => 'checkbox',
          '#return_value' => $path,
          '#default_value' => isset($values[$key][$path]) ? $values[$key][$path] : array(),
        );
      }
    }

    return $form;
  }

  /**
   * Implementation of the built-in context plugin class execution
   */
  function execute() {
    $contexts = context_active_contexts();
    $classes = array();

    foreach ($contexts as $key => $value) {
      if (!empty($value->reactions[$this->plugin])) {
        foreach ($value->reactions[$this->plugin] as $path_array) {
          if (is_array($path_array)) {
            foreach ($path_array as $path) {
              if ($path) {
                $ext = explode('.', $path);
                $ext = drupal_strtolower($ext[count($ext)-1]);

                switch ($ext) {
                  case 'js':
                    drupal_add_js($path, array('group' => JS_DEFAULT));
                    break;
                  case 'css':
                    drupal_add_css($path, array('group' => CSS_THEME));
                    break;
                }
              }
            }
          }
        }
      }
    }
  }

  /**
	 *  Scan active themes for js files.
	 *
	 *	@return Array
	 *		An array indexed by file paths containing strings describing each path "Theme Key - File Name"
	 */
  private function asset_search() {
    $dinosaur_root = drupal_get_path('theme', 'dinosaur');

    $actions = array_diff(scandir("{$dinosaur_root}/js/actions"), array('..', '.'));
    $plugins = array_diff(scandir("{$dinosaur_root}/js/plugins"), array('..', '.'));
    $assets = array();

    if ($actions) {
      foreach ($actions as $action) {
        $assets["{$dinosaur_root}/js/actions" . $action] = "Action -- {$action}";
      }
    }

    if ($plugins) {
      foreach ($plugins as $plugin) {
        $assets["{$dinosaur_root}/js/actions" . $plugin] = "Plugin -- {$plugin}";
      }
    }

    return $assets;
  }
}
