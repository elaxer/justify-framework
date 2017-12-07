<?php

namespace Justify\Components;

/**
 * Class Pagination
 *
 * Class to display pagination widget
 *
 * @package Justify\Components
 */
class Pagination
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
     * Stores length of pagination
     *
     * @var int
     */
    public $countOfPaginationPages;

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
     * SQL limit
     *
     * Use this property in SQL query
     *
     * @var int
     */
    public $limit;

    /**
     * Pagination first page
     *
     * @var int
     */
    public $start;

    /**
     * Pagination final page
     *
     * @var int
     */
    public $end;

    /**
     * Pagination constructor.
     *
     * Setups necessary properties
     *
     * @param int $defaultPageSize articles in one page
     * @param int $totalCount count of all articles
     * @param int $countOfPaginationPages length of pagination
     */
    public function __construct($defaultPageSize, $totalCount, $countOfPaginationPages = 10)
    {
        $this->url = $this->createUrl();
        $this->defaultPageSize = $defaultPageSize;
        $this->totalCount = $totalCount;
        $this->limit = $defaultPageSize;
        $this->countOfPages = ceil($this->totalCount / $this->defaultPageSize);
        $this->countOfPaginationPages = $this->getCountOfPaginationPages($countOfPaginationPages);

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
        $this->start = $this->getStart();
        $this->end = $this->getEnd();

        if ($this->end > $this->countOfPages) {
            $this->end = $this->countOfPages;
            $this->start = $this->countOfPages - ($this->countOfPaginationPages - 1);
        }
    }

    /**
     * Returns pagination's start
     *
     * @return float|int
     */
    public function getStart()
    {
        if ($this->currentPage > floor($this->countOfPaginationPages / 2) && $this->countOfPages > $this->countOfPaginationPages) {
            return $this->currentPage - floor($this->countOfPaginationPages / 2);
        }

        return 1;
    }

    /**
     * Returns pagination's end
     *
     * @param count
     * @return float|int
     */
    public function getEnd()
    {
        if ($this->totalCount > $this->countOfPaginationPages) {
            return $this->start + $this->countOfPaginationPages - 1;
        }

        return $this->totalCount;
    }

    /**
     * Returns length of pagination
     *
     * @param int $countOfPaginationPages
     * @return float
     */
    public function getCountOfPaginationPages($countOfPaginationPages)
    {
        if ($countOfPaginationPages > $this->countOfPages) {
            return $this->countOfPages;
        }

        return $countOfPaginationPages;
    }

    /**
     * Creates next page's url
     *
     * @return string
     */
    public function createUrl()
    {
        if (
            !isset(parse_url($_SERVER['REQUEST_URI'])['query'])
            || (count($_GET) === 1 && isset($_GET[$this->getName]))
        ) {
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
