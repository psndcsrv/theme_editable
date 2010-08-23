<?php
  global $CONFIG;

  function create_css_file($container_id) {
    $css_file = new ElggFile();
    $css_file->setFilename("css_source.php");
    $css_file->container_id = $container_id;
    $css_file->save();

    $css_file->open('write');
    $css_file->write(file_get_contents($CONFIG->path . 'views/default/css.php'));
    $css_file->close();
    return $css_file->guid;
  }

  function create_css_entity() {
    $css_entity = new ElggObject();
    $css_entity->subtype = "css";
    $css_entity->access_id = 2; // private
    $css_entity->save();
    $css_file_guid = create_css_file($css_entity->guid);
    $css_entity->file_guid = $css_file_guid;
    $css_entity->save();
    return $css_entity;
  }

  function get_css_entity() {
    $css_entity = elgg_get_entities(array('type'=>'object','subtype'=>'css'));
    if ($css_entity == false) {
      $css_entity = create_css_entity();
    } else {
      $css_entity = current($css_entity);
    }
    return $css_entity;
  }

  function get_css_file() {
    $css_entity = get_css_entity();
    $css_file = get_entity($css_entity->file_guid);
    return $css_file;
  }

  function write_css_file($content) {
    $css_file = get_css_file();
    $css_file->open('write'); 
    $css_file->write($content);
    $css_file->close();
  }

  function read_css_file() {
    $css_file = get_css_file();
    return $css_file->grabFile();
  }

?>
