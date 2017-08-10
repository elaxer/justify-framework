<?php
function render($view, $vars = array())
{
    $loader = new Twig_Loader_Filesystem(BASE_DIR . '/templates/' . ACTIVE_APP);
    $twig = new Twig_Environment($loader, array(
        #'cache' => TWIG_CACHE_DIR,
    ));
    $template = $twig->load($view . '.html');
    $template->display($vars);

}

function render_url($view, $vars = array())
{
    return array(
      'view' => $view,
      'vars' => $vars
    );
}

