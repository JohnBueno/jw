<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Config;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Config\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

function format_module($module){

  $title = $module['title']; 
  $format = $module['module_type'];
  $body = $module['body'];
  $img = $module['image']['url'];


  $template_name = urlencode($format);
  $path = 'modules/'.$template_name.'.html';
  $html = file_get_contents($path, true);

  $html = str_replace("%title%", $title, $html);
  $html = str_replace("%body%", $body, $html);
  $html = str_replace("%img%", $img, $html);
  return $html;
}

function format_jump_link($link)
{
  $link = preg_replace('/[[:space:]]+/', '-', $link);
  $link = strtolower($link);
  return $link;
}

function bg_image($img){
  $bg_img = "";
  if(isset($img)){
    $bg_img = $img['url'];
  }

  return $bg_img;
}








