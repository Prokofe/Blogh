<?php

/**
 * Class Pagination
 * Component which generates pagination
 */

class Pagination
{

    /**
     * @var int links on the page
     */
    private $max = 10;

    /**
     * @var string key for GET, in which writes page number
     */
    private $index = 'page';

    /**
     * @var current apge
     */
    private $current_page;

    /**
     * @var total amount of records
     */
    private $total;

    /**
     * @var amount of records on page
     */
    private $limit;

    /**
     * Pagination constructor.
     * @param $total
     * @param $currentPage
     * @param $limit
     * @param $index
     */
    public function __construct($total, $currentPage, $limit, $index)
    {
        $this->total = $total;
        $this->limit = $limit;
        $this->index = $index;
        $this->amount = $this->amount();
        $this->setCurrentPage($currentPage);
    }

    /**
     * @return HTML code, with pagination links
     */
    public function get()
    {
        //for links record
        $links = null;

        //get limits for cycle
        $limits = $this->limits();

        $html = '<ul class="pagination pagination-sm">';

        //links generation
        for ($page = $limits[0]; $page <= $limits[1]; $page++) {
            //if current link is active, no link and add class="active"
            if ($page == $this->current_page) {
                $links .= '<li class="page-item disabled"><a class="page-link" href="#">' . $page . '</a></li>';
            } else {
                //else generate link
                $links .= $this->generateHtml($page);
            }
        }

        /**
         * if links created, there we can add First and Last page
         */
//        if (!is_null($links)) {
//
//            if ($this->current_page > 1)
//
//                $links = $this->generateHtml(1, 'First') . $links;
//
//            if ($this->current_page < $this->amount)
//
//                $links .= $this->generateHtml($this->amount, 'Last');
//        }

        $html .= $links . '</ul>';

        return $html;
    }

    /**
     * For HTML generation
     * @param $page - page number
     * @param null $text
     * @return string HTML code
     */
    private function generateHtml($page, $text = null)
    {

        if (!$text)
            $text = $page;

        $currentURI = rtrim($_SERVER['REQUEST_URI'], '/') . '/';
        $currentURI = preg_replace('~/page-[0-9]+~', '', $currentURI);

        return
            '<li class="page-item"><a class="page-link" href="' . $currentURI . $this->index . $page . '">' . $text . '</a></li>';
    }

    /**
     * Calculate where begin sorting
     * @return array with start and end of sorting
     */
    private function limits()
    {

        $left = $this->current_page - round($this->max / 2);

        $start = $left > 0 ? $left : 1;

        if ($start + $this->max <= $this->amount) {
            $end = $start > 1 ? $start + $this->max : $this->max;
        } else {
            $end = $this->amount;

            $start = $this->amount - $this->max > 0 ? $this->amount - $this->max : 1;
        }
        return
            array($start, $end);
    }

    /**
     * Set current page
     * @param $currentPage
     */
    private function setCurrentPage($currentPage)
    {
        $this->current_page = $currentPage;

        if ($this->current_page > 0) {
            if ($this->current_page > $this->amount)
                $this->current_page = $this->amount;
        } else
            $this->current_page = 1;
    }

    /**
     * Get total pages amount
     * @return float
     */
    private function amount()
    {
        return ceil($this->total / $this->limit);
    }

}
