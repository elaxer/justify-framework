<?php

namespace Justify\Bootstrap;

use Justify;
use Justify\System\BaseObject;
use Justify\Components\Lang;
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
        $helpers = glob(BASE_DIR . '/core/helpers/*');

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

    public function loadLang()
    {
        Lang::getLanguages();
    }

    /**
     * Loads JS, CSS components
     * @deprecated
     */
    public function loadWebComponents()
    {
        Justify::$settings['web']['css'] = array_map(function ($css) {
            return Justify::$settings['webPath'] . $css;
        }, Justify::$settings['web']['css']);

        Justify::$settings['web']['js'] = array_map(function ($js) {
            return Justify::$settings['webPath'] . $js;
        }, Justify::$settings['web']['js']);
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
            $this->isOldVersion(Justify::$minimalPHPVersion);
            $this->causedFromConsole();
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

    /**
     * Checks is old version
     *
     * @since 2.2.0
     * @param $version
     * @param string $error
     * @throws OldPHPVersionException
     */
    private function isOldVersion($version, $error = 'PHP version must be bigger than ')
    {
        if (! version_compare(PHP_VERSION, $version, '>=')) {
            throw new OldPHPVersionException($error . $version);
        }
    }

    /**
     * Checks app caused from console
     *
     * @since 2.2.0
     * @param string $error
     * @throws CauseFromConsoleException
     */
    private function causedFromConsole($error = 'Web application caused from console')
    {
        if (php_sapi_name() == 'cli') {
            throw new CauseFromConsoleException($error);
        }
    }
}
