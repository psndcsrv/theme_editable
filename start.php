<?php
  include_once($CONFIG->pluginspath . 'theme_editable/helpers.php');

  function theme_editable_init() {
    global $CONFIG;
    // make sure we have a css_file and if not, create a default one based on the system's css.php
    $css_file = get_css_file();
    register_action("theme_editable/save", false, $CONFIG->pluginspath . "theme_editable/actions/save.php", true);
  }
  
  /**
   * Set up menu items
   */
  function theme_editable_pagesetup() {
    if (get_context() == 'admin' && isadminloggedin()) {
      global $CONFIG;
      add_submenu_item(elgg_echo('theme_editable:settings'), $CONFIG->wwwroot . 'mod/theme_editable/settings.php');
    }
  }

  register_elgg_event_handler('init','system','theme_editable_init');
  register_elgg_event_handler('pagesetup','system','theme_editable_pagesetup');

?>
