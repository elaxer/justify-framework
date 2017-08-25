<?php
function render($view, $vars = array())
{
    extract($vars);
    require_once BASE_DIR . '/templates/layouts/main.php'; 
}

function render_url($view, $vars = array())
{
    return array(
      'view' => $view,
      'vars' => $vars
    );
}

