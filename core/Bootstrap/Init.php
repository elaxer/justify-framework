<?php

namespace Core\Bootstrap;

use Core\Justify;
use Core\Container;
use Core\Components\Config;
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
     * @var array config
     */
    private $config = [];

    /**
     * Application constructor.
     *
     * Loads array of settings to next application work
     *
     * @throws \Core\Exceptions\OldPHPVersionException
     * @throws \Core\Exceptions\CauseFromConsoleException
     * @param array $config stores array with settings
     */
    public function __construct(array $config)
    {
        $this->config = $config;

        $this->isCausedFromConsole();
        $this->isOldVersion(Justify::$minimalPHPVersion);
    }

    /**
     * Initials necessary settings
     */
    public function initSettings()
    {
        if (config('debug')) {
            ini_set('display_errors', true);
            error_reporting(E_ALL);

            $whoops = new Run();
            $whoops->pushHandler(new PrettyPageHandler());
            $whoops->register();
        } else {
            ini_set('display_errors', false);
            error_reporting(0);
        }

        date_default_timezone_set(config('timezone'));
        setlocale(LC_ALL, config('locale'));
    }

    public function loadComponents()
    {
        Justify::$app->container = new Container();

        $config = new Config($this->config);

        Justify::$app->container->multiSet([
            'config' => $config,
            'cache_psr6' => CachingFactory::create(
                $config->get('caching')['driver'],
                $config->get('caching')[$config->get('caching')['driver']]
            ),
            'request' => Request::createFromGlobals(),
            'response' => new Response(),
            'cache' => new Cache(),
            'session' => new Session(),
            'router' => new Router()
        ]);
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
     * Checks is old version
     *
     * @since 2.2.0
     * @param $version
     * @throws OldPHPVersionException
     */
    private function isOldVersion($version)
    {
        if (!version_compare(PHP_VERSION, $version, '>=')) {
            throw new OldPHPVersionException("PHP version must be bigger than $version");
        }
    }

    /**
     * Checks app caused from console
     *
     * @since 2.2.0
     * @throws CauseFromConsoleException
     */
    private function isCausedFromConsole()
    {
        if (php_sapi_name() == 'cli') {
            throw new CauseFromConsoleException('Web application caused from console');
        }
    }
}
