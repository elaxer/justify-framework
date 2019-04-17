<?php

namespace Core\Components\Pagination;

/**
 * Class Pagination
 *
 * Class for widget Pagination
 *
 * @since 1.6
 * @package Justify\Components
 */
class Pagination extends AbstractPagination
{
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
        parent::__construct($defaultPageSize, $totalCount);

        $this->countOfPaginationPages = $this->getCountOfPaginationPages($countOfPaginationPages);
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
        $middle = floor($this->countOfPaginationPages / 2);

        if ($this->currentPage > $middle && $this->countOfPages > $this->countOfPaginationPages) {
            return $this->currentPage - $middle;
        }

        return 1;
    }

    /**
     * Returns pagination's end
     *
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
}
