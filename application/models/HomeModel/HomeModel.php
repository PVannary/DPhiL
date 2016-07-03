<?php

/* home page displaying main content */
class HomeModel extends Model{
    protected $carouselContent = array();

    const PAGE_TITLE = 'Home - GSU Delta Phi Lambda';
    const QUOTE      = '"Let our light shine forth"';

    public function __construct() {
        $this->title = self::PAGE_TITLE;

        $this->carouselContent = $this->_setCarouselContent();
    }

    protected function _setCarouselContent() {
        $carouselContent = array();

        /* temp code for template building */
        $carouselItem = array('title' => '', 'description' => '', 'image' => 'dfl_rho_class.JPG');
        $carouselContent[] = new CarouselItem($carouselItem);

        $carouselItem = array('title' => '', 'description' => '', 'image' => 'dfl_rho_class_theta.JPG');
        $carouselContent[] = new CarouselItem($carouselItem);

        $carouselItem = array('title' => '', 'description' => '', 'image' => 'dfl_rho_class_ca.JPG');
        $carouselContent[] = new CarouselItem($carouselItem);

        $carouselContent[0]->active = 'active';

        return $carouselContent;
    }

    protected function _getCarouselItems() {
        /* database query here*/
    }
}