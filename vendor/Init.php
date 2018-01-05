<?php

namespace Justify\Core;

use Justify;
use Justify\System\BaseObject;
use Justify\Exceptions\OldPHPVersionException;
use Justify\Exceptions\CauseFromConsoleException;

/**
 * Class Init
 *
 * Class initials and loads necessary things
 *
 * @since 2.0
 * @package Justify\Core
 */
class Init extends BaseObject
{
    /**
     * Loads helpers from directory vendor/helpers
     */
    public function loadHelpers()
    {
        $helpers = glob(BASE_DIR . '/vendor/helpers/*');
        foreach ($helpers as $helper) {
            require_once $helper;
        }
    }

    /**
     * Initials necessary settings
     */
    public function initSettings()
    {
        if (Justify::$debug) {
            ini_set('display_errors', 'On');
            error_reporting(E_ALL);
        } else {
            ini_set('display_errors', 'Off');
            error_reporting(0);
        }

        date_default_timezone_set(Justify::$settings['timezone']);
        setlocale(LC_ALL, Justify::$settings['locale']);
    }

    /**
     * Loads JS, CSS components
     */
    public function loadWebComponents()
    {
        foreach (Justify::$settings['web']['css'] as &$css) {
            $css = Justify::$settings['webPath'] . $css;
        }
        foreach (Justify::$settings['web']['js'] as &$js) {
            $js = Justify::$settings['webPath'] . $js;
        }
    }

    /**
     * Returns array of routes
     *
     * @return string
     */
    public function getRoutes()
    {
        return Justify::$settings['routes'];
    }

    /**
     * Application constructor.
     *
     * Loads array of settings to next application work
     *
     * @param array $settings stores array with settings
     */
    public function __construct(array $settings)
    {
        Justify::$startTime = microtime(true);
        Justify::$settings = $settings;
        Justify::$debug = Justify::$settings['debug'];

        session_start();

        try {
            if (! version_compare(PHP_VERSION, Justify::$minimalPHPVersion, '>=')) {
                throw new OldPHPVersionException("PHP version must be bigger than " . Justify::$minimalPHPVersion);
            }
            if (php_sapi_name() == 'cli') {
                throw new CauseFromConsoleException('Web application caused from console');
            }
        } catch (OldPHPVersionException $e) {
            $e->printError();
            exit();
        } catch (CauseFromConsoleException $e) {
            echo PHP_EOL . $e->getName() . ': ' . $e->getMessage() . PHP_EOL;
            exit();
        }

        Justify::$home = Justify::$settings['homeURL'];
        Justify::$lang = Justify::$settings['html']['lang'];
        Justify::$web = Justify::$settings['webPath'];
    }
}
