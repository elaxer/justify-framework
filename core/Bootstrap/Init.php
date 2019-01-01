<?php

namespace Core\Bootstrap;

use Core\Justify;
use Core\Exceptions\OldPHPVersionException;
use Core\Exceptions\CauseFromConsoleException;
use Core\Components\Lang;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;

/**
 * Class Init
 *
 * Class initials and loads necessary things
 *
 * @since 2.0
 * @package Justify\Core
 */
class Init
{
    /**
     * Initials necessary settings
     */
    public function initSettings()
    {
        if (Justify::$debug) {
            $whoops = new Run();
            $whoops->pushHandler(new PrettyPageHandler());
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
     * @return \Core\System\Router\Router
     */
    public function getRouter()
    {
        return Justify::$settings['router'];
    }

    /**
     * Application constructor.
     *
     * Loads array of settings to next application work
     *
     * @throws \Core\System\Exceptions\OldPHPVersionException
     * @throws \Core\System\Exceptions\CauseFromConsoleException
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
