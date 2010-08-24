<?php
  function get_css_file_path() {
    global $CONFIG;
    return ($CONFIG->pluginspath . "theme_editable/css.php");
  }
  
  function write_css_file($content) {
    file_put_contents(get_css_file_path(), $content);
  }

  function read_css_file() {
    return file_get_contents(get_css_file_path());
  }
  
  function reset_css_file() {
    global $CONFIG;
    $contents = file_get_contents($CONFIG->path . 'views/default/css.php');
    write_css_file($contents);
  }
  
  function init_css_file() {
    if (! file_exists(get_css_file_path())) {
      reset_css_file();
    }
  }

?>
