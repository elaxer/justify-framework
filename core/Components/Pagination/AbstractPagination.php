<?php

namespace Core\Components\Pagination;

/**
 * Class AbstractPagination
 *
 * @since 2.4.3-dev
 * @package Core\Components\Pagination
 */
abstract class AbstractPagination
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
     * Stores total count of pages
     *
     * @var int
     */
    public $countOfPages;

    public function __construct($defaultPageSize, $totalCount)
    {
        $this->url = $this->createUrl();
        $this->defaultPageSize = $defaultPageSize;
        $this->totalCount = $totalCount;
        $this->limit = $defaultPageSize;
        $this->countOfPages = ceil($this->totalCount / $this->defaultPageSize);
        $this->currentPage = $this->getCurrentPage();
        $this->offset = ($this->currentPage - 1) * $this->limit;
    }

    /**
     * Creates next page's url
     *
     * @return string
     */
    public function createUrl()
    {
        if (!isset(parse_url($_SERVER['REQUEST_URI'])['query'])
            || (count($_GET) === 1
            && isset($_GET[$this->getName]))
        ) {
            return '?' . $this->getName . '=';
        }
        $url = '?';

        foreach ($_GET as $param => $value) {
            if ($param != $this->getName) {
                $url .= "$param=$value&";
            }
        }

        return $url . $this->getName . '=';
    }

    private function getCurrentPage()
    {
        if (isset($_GET[$this->getName])) {
            return intval($_GET[$this->getName]);
        }

        if ($this->currentPage > $this->countOfPages) {
            return $this->countOfPages;
        }

        if ($this->currentPage < 1) {
            return 1;
        }

        return null;
    }
}