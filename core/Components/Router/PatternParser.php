<?php

namespace Core\Components\Router;

/**
 * Class URIParser
 *
 * Class for parsing pattern of router
 *
 * @package Justify\Router
 */
class PatternParser
{
    /**
     * Template of variable
     */
    const REGEXP_VAR_PATTERN = '#(?<full>\{\s*(?<identifier>[a-zA-Z_][a-zA-Z0-9_-]*)\s*:\s*(?<regexp>([^{}]*(?:\{(?-1)\}[^{}]*)*))\s*\})#u';

    /**
     * @var string router pattern
     */
    private $pattern;

    /**
     * @var array parsed information about pattern
     */
    private $parsed = [];

    /**
     * URIParser constructor.
     *
     * Constructs and parses information
     *
     * @param string $pattern router pattern
     */
    public function __construct($pattern)
    {
        $this->pattern = $pattern;

        $this->parse();
    }

    /**
     * Returns parsed information about pattern
     *
     * @return array returns parsed information about pattern
     */
    public function getParsed()
    {
        return $this->parsed;
    }

    /**
     * Returns formatting regular expression from parsed information
     *
     * @return string
     */
    public function getRegexp()
    {
        $regexp = $this->pattern;

        foreach ($this->parsed as $item) {
            $regexp = str_replace($item['full'], "(?<{$item['identifier']}>{$item['regexp']})", $regexp);
        }

        return "#^/?($regexp)?/?$#u";
    }

    /**
     * Parses pattern information
     *
     * From pattern kind of /{var1:\d+}/{var2:\w+} gets identifier, regular expression and full pattern.
     * Will get arrays: ['identifier' => 'var1', 'regexp' => '\d+', 'full' => '{var1:\d+}'],
     * ['identifier' => 'var2', 'regexp' => 'wd+', 'full' => '{var2:\w+}']
     */
    public function parse()
    {
        $matchesLen = preg_match_all(self::REGEXP_VAR_PATTERN, $this->pattern, $matches);

        if ($matchesLen === 0) {
            return;
        }

        $parsed = [];

        for ($i = 0; $i < $matchesLen; $i++) {
            $parsed[] = [
                'identifier' => $matches['identifier'][$i],
                'regexp' => $matches['regexp'][$i],
                'full' => $matches['full'][$i],
            ];
        }

        $this->parsed = $parsed;
    }
}
