<?php

/**
 * header class
 */
class HeaderModel extends AbstractModel {
    public $headerItems = array();
    public $siteLogo;
    public $siteName;
    public $siteLink;
    public $activeModel;

    const MODEL_NAME = 'Header';

    /**
     * constructor
     *
     * @param  obj $dbh         [ database handler ]
     * @param  obj $activeModel [ current active page model ]
     *
     * @return void
     */
    public function __construct($dbh, $activeModel) {
        parent::__construct($dbh);

        $this->siteName    = SITE_NAME;
        $this->siteLink    = SITE_URL;
        $this->siteLogo    = '';
        $this->activeModel = $activeModel;

        $this->_loadSiteNavigation();

        foreach( unserialize(NAV) as $navItem ) {
            array_push($this->headerItems, $this->_createNavItem($navItem));
        }
    }

    /**
     * add attributes to navigation array item
     *
     * @param  array $navItem [ navigation item ]
     *
     * @return array [ navigation item ]
     */
    private function _createNavItem($navItem) {
        if ( empty($navItem['link']) ) {
            $navItem['link'] = SITE_URL . strtolower($navItem['model']);
            $navItem['target'] = '_self';
        } else {
            $navItem['target'] = '_blank';
        }

        if ( $this->activeModel == $navItem['model'] ) {
            $navItem['class'] = 'active';
        } else {
            $navItem['class'] = '';
        }

        return $navItem;
    }

    /**
     * sets site header navigation items
     *
     * @return void
     */
    private function _loadSiteNavigation() {
        $navigationArray = array();

        // About
        $navItem = array('id' => 'about-nav','title' => 'About', 'model' => 'About', 'link' => '', 'icon' => 'fa fa-info-circle fa-fw', 'dropdown' => array(
            array('title' => 'Chapter History',  'link' => SITE_URL . 'about/view/chapter_history',  'icon' => ''),
            array('title' => 'National History', 'link' => SITE_URL . 'about/view/national_history', 'icon' => ''),
            array('title' => 'Preamble',         'link' => SITE_URL . 'about/view/preamble',         'icon' => ''),
            array('title' => 'Policies',         'link' => SITE_URL . 'about/view/policies',         'icon' => ''))
            );
        array_push($navigationArray, $navItem);

        // Executive Board
        $navItem = array('id' => 'leaders-nav','title' => 'Executive Board', 'model' => 'Leaders', 'link' => '', 'icon' => 'fa fa-briefcase fa-fw', 'dropdown' => array());
        array_push($navigationArray, $navItem);

        // Roster
        $navItem = array('id' => 'sisters-nav','title' => 'Sisters', 'model' => 'Sisters', 'link' => '', 'icon' => 'fa fa-users fa-fw', 'dropdown' => array());
        array_push($navigationArray, $navItem);

        // Recruitment
        $navItem = array('id' => 'recruitment-nav','title' => 'Recruitment', 'model' => 'Recruitment', 'link' => '', 'icon' => 'fa fa-file-text fa-fw', 'dropdown' => array(
            array('title' => 'Recruitment FAQs',      'link' => 'recruitment/faqs',               'icon' => ''),
            array('title' => 'Anti-Hazing Statement', 'link' => 'recruitment/antihaze_statement', 'icon' => ''))
            );
        array_push($navigationArray, $navItem);

        // Philanthropy
        $navItem = array('id' => 'philanthropy-nav','title' => 'Philanthropy', 'model' => 'Philanthropy', 'link' => '', 'icon' => 'fa fa-recycle fa-fw', 'dropdown' => array());
        array_push($navigationArray, $navItem);

        // Gallery
        $navItem = array('id' => 'gallery-nav','title' => 'Gallery', 'model' => 'Gallery', 'link' => '', 'icon' => 'fa fa-picture-o fa-fw', 'dropdown' => array());
        array_push($navigationArray, $navItem);

        // Contact
        $navItem = array('id' => 'contact-nav','title' => 'Contact', 'model' => 'Contact', 'link' => '', 'icon' => 'fa fa-envelope fa-fw', 'dropdown' => array());
        array_push($navigationArray, $navItem);

        // navigation
        define('NAV', serialize($navigationArray));
    }
}