<?php

namespace Justify\Widgets;

use Justify\Exceptions\InvalidConfigException;

/**
 * Class Session
 *
 * Class for work with sessions
 *
 * @package Justify\Components
 */
class Session
{
    /**
     * Stores message of flash
     *
     * @var string
     */
    public static $message;

    /**
     * Type of flash
     *
     * @var string
     */
    public static $type;

    /**
     * Can close flash
     *
     * @var bool
     */
    public static $close;

    /**
     * Checks flash for exist
     *
     * @var bool
     */
    public static $hasFlash = false;

    /**
     * Available types of flash
     *
     * @var array
     */
    public static $types = ['success', 'info', 'warning', 'danger'];

    /**
     * Sets flash
     *
     * @param string $message message of flash
     * @param string $type type of flash
     * @param bool $close can close flash
     */
    public static function setFlash($message, $type = 'info', $close = true)
    {
        self::$message = $message;
        self::$type = $type;
        self::$close = $close;

        try {
            if (!in_array($type, self::$types)) {
                throw new InvalidConfigException('Undefined type ' . $type);
            }
        } catch (InvalidConfigException $e) {
            $e->printError();
            exit();
        }
    }

    /**
     * Checks flash for exists
     *
     * @return bool
     */
    public static function hasFlash()
    {
        return !is_null(self::$message);
    }

    /**
     * Renders flash widget
     *
     * @return string
     */
    public static function render()
    {
        ob_start();

        require_once BASE_DIR . '/vendor/widgets/templates/session.php';

        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}
