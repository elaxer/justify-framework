<?php

namespace Core\Bootstrap;

use Core\Justify;
use Core\System\BaseObject;
use Core\Components\Lang;
use Core\System\Exceptions\OldPHPVersionException;
use Core\System\Exceptions\CauseFromConsoleException;

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
     * Initials necessary settings
     */
    public function initSettings()
    {
        if (Justify::$debug) {
            $whoops = new \Whoops\Run();
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
            $whoops->register();
        }

        date_default_timezone_set(Justify::$settings['timezone']);
        setlocale(LC_ALL, Justify::$settings['locale']);
    }

    /**
     * Loads languages
     */
    public function loadLang()
    {
        Lang::getLanguages();
    }

    /**
     * Returns array of routes
     *
     * @return array
     */
    public function getRoutes(): array
    {
        return Justify::$settings['routes'];
    }

    /**
     * Application constructor.
     *
     * Loads array of settings to next application work
     *
     * @throws
     * @param array $settings stores array with settings
     */
    public function __construct(array $settings)
    {
        Justify::$startTime = microtime(true);
        Justify::$settings = $settings;
        Justify::$debug = Justify::$settings['debug'];

        session_start();

        $this->isOldVersion(Justify::$minimalPHPVersion);
        $this->causedFromConsole();
    }

    /**
     * Checks is old version
     *
     * @since 2.2.0
     * @param $version
     * @param string $error
     * @throws OldPHPVersionException
     */
    private function isOldVersion(string $version, string $error = 'PHP version must be bigger than ')
    {
        if (!version_compare(PHP_VERSION, $version, '>=')) {
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
