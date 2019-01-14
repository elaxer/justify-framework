<?php

namespace Core\Bootstrap;

use Core\Justify;
use Core\Container;
use Core\Components\Lang;
use Core\Components\Http\Request;
use Core\Components\Http\Response;
use Core\Components\Http\Session;
use Core\Components\Router\Router;
use Core\Components\Caching\Cache;
use Core\Components\Caching\CachingFactory;
use Core\Exceptions\OldPHPVersionException;
use Core\Exceptions\CauseFromConsoleException;
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
            ini_set('display_errors', true);
            error_reporting(E_ALL);

            $whoops = new Run();
            $whoops->pushHandler(new PrettyPageHandler());
            $whoops->register();
        } else {
            ini_set('display_errors', false);
            error_reporting(0);
        }

        date_default_timezone_set(Justify::$settings['timezone']);
        setlocale(LC_ALL, Justify::$settings['locale']);
    }

    public function loadComponents()
    {
        $config = Justify::$settings;

        Justify::$container = new Container();

        Justify::$container->set('cache_psr6',
            CachingFactory::create(
                $config['caching']['driver'],
                $config['caching'][$config['caching']['driver']]
            )
        );
        Justify::$container->set('cache', new Cache());
        Justify::$container->set('request', new Request());
        Justify::$container->set('response', new Response());
        Justify::$container->set('session', new Session());
        Justify::$container->set('router', new Router());
    }

    public function loadRoutes()
    {
        require_once BASE_DIR . '/routes.php';
    }

    /**
     * Loads languages
     */
    public function loadLang()
    {
        Lang::getLanguages();
    }

    /**
     * Application constructor.
     *
     * Loads array of settings to next application work
     *
     * @throws \Core\Exceptions\OldPHPVersionException
     * @throws \Core\Exceptions\CauseFromConsoleException
     * @param array $settings stores array with settings
     */
    public function __construct(array $settings)
    {
        Justify::$startTime = microtime(true);
        Justify::$settings = $settings;
        Justify::$debug = Justify::$settings['debug'];

        $this->causedFromConsole();
        $this->isOldVersion(Justify::$minimalPHPVersion);
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
