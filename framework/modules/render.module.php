<?php

namespace justify\framework\modules;

class Render
{
	/**
	 * Use this method for url rendering.
     *
	 * Choose this function instead controller action in apps/<App Name>/urls.php
     *
     * @access public
	 * @static
     * @param string $view connects template with file $view. Default current action name
     * @param array $vars passed arguments
	 * @return array
	 */
	public static function urlRender($view = ACTION, $vars = [])
	{
	    return array(
	        'view' => $view,
	        'vars' => $vars
	    );
	}
}
