<?php

namespace justify\framework\modules;

class Render
{
	/**
	 * Use this method for url rendering. 
	 * Choose this function instead controller action in apps/<App Name>/urls.php
	 * @static
	 * @access public
	 * @return array
	 */
	public static function urlRender($view, $vars = array())
	{
	    return array(
	        'view' => $view,
	        'vars' => $vars
	    );
	}
}
