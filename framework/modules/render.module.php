<?php
function render($view, $vars = array())
{
    extract($vars);
    $settings = require BASE_DIR . '/settings.php';

    $charset = $settings['html']['charset'];
    $lang = $settings['html']['lang'];

    if ($settings['html']['replace_by_default']) {
        if (!isset($title)) $title = $settings['html']['title'];
        if (!isset($description)) $description = $settings['html']['description'];
        if (!isset($author)) $author = $settings['html']['author'];
        if (!isset($keywords)) $keywords = $settings['html']['keywords'];
    }

    
    require_once BASE_DIR . '/templates/layouts/main.php'; 
}

function render_url($view, $vars = array())
{
    return array(
      'view' => $view,
      'vars' => $vars
    );
}

