<?php

namespace Justify\Components;

/**
 * Class SimplePagination
 *
 * Class to display pagination widget
 *
 * @since 1.6
 * @package Justify\Components
 */
class SimplePagination
{
    /**
     * Next url page
     *
     * @var string
     */
    public $url;

    /**
     * Count of articles in one page
     *
     * @var string
     */
    public $defaultPageSize;

    /**
     * Count of all articles
     *
     * @var int
     */
    public $totalCount;

    /**
     * Stores current page
     *
     * @var int
     */
    public $currentPage = 1;

    /**
     * Stores total count of pages
     *
     * @var int
     */
    public $countOfPages;

    /**
     * GET param name
     *
     * @var string
     */
    public $getName = 'page';

    /**
     * SQL offset
     *
     * Use this property in SQL query
     *
     * @var int
     */
    public $offset;

    /**
     * Last page number
     *
     * @var int
     */
    public $lastPage;

    /**
     * SQL limit
     *
     * Use this property in SQL query
     *
     * @var int
     */
    public $limit;

    /**
     * Previous button label
     *
     * @var string
     */
    public $previous;

    /**
     * Next button label
     *
     * @var string
     */
    public $next;

    /**
     * Pagination constructor.
     *
     * Setups necessary properties
     *
     * @param int $defaultPageSize
     * @param int $totalCount
     */
    public function __construct($defaultPageSize, $totalCount)
    {
        $this->url = $this->createUrl();
        $this->defaultPageSize = $defaultPageSize;
        $this->totalCount = $totalCount;
        $this->limit = $defaultPageSize;
        $this->countOfPages = ceil($this->totalCount / $this->defaultPageSize);
        $this->lastPage = $this->countOfPages;

        if (isset($_GET[$this->getName])) {
            $this->currentPage = intval($_GET[$this->getName]);
        }
        if ($this->currentPage > $this->countOfPages) {
            $this->currentPage = $this->countOfPages;
        }
        if ($this->currentPage < 1) {
            $this->currentPage = 1;
        }

        $this->offset = ($this->currentPage - 1) * $this->limit;
    }

    /**
     * Creates next page's url
     *
     * @return string
     */
    public function createUrl()
    {
        if (! isset(parse_url($_SERVER['REQUEST_URI'])['query']) || (count($_GET) === 1 && isset($_GET[$this->getName]))) {
            return '?' . $this->getName . '=';
        }
        $url = '?';

        foreach ($_GET as $param => $value) {
            if ($param == $this->getName) {
                continue;
            }

            $url .= "$param=$value&";
        }

        return $url . $this->getName . '=';
    }
}
