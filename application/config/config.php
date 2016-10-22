<?php

// setting absolute path for creating/deleting/including/moving files
if ( $_SERVER['SERVER_NAME'] == 'localhost' || strpos($_SERVER['SERVER_NAME'], '192.168') !== FALSE ) { // local machine
    define('ABSOLUTE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/site-dphil');
    define('WEBSERVER', 0);

    // Live Site or Testing
    define('LIVE', 0);
} else { // on webserver
    define('ABSOLUTE_PATH' , '/home4/xeonsoldier/public_html/site-dphil');
    define('WEBSERVER', 1);

    // Live Site or Testing
    define('LIVE', 1);
}

// creating HOST_NAME for address purposes
if ( WEBSERVER == 0 ) {
    define('HOST_NAME', 'http://' . getHostByName(getHostName()) . '/site-dphil');
} else {
    define('HOST_NAME', 'http://www.gsudeltaphilambda.trinityguild.org');
}

// include library
foreach ( glob(ABSOLUTE_PATH . '/application/lib/*.php') as $fileName ) { include $fileName; }

// header
define('SITE_HEADER',    'Delta Phi Lambda Sorority, Inc.');
define('SITE_SUBHEADER', serialize(array('Gamma Chapter | Georgia State University')));

define('SITE_NAV', serialize(
        array(
            'About' => array(
                'title' => 'About',
                'url' => '',
                'icon' => 'fa fa-info-circle',
                'children' => array(
                    array('title' => 'Chapter History',  'url' => 'about/chapter_history',  'icon' => '', 'children' => array()),
                    array('title' => 'National History', 'url' => 'about/national_history', 'icon' => '', 'children' => array()),
                    array('title' => 'Preamble',         'url' => 'about/preamble',         'icon' => '', 'children' => array()),
                    array('title' => 'Policies',         'url' => 'about/policies',         'icon' => '', 'children' => array())
                    )
                ),
            'Sisters' => array(
                'title' => 'The Sisters',
                'url' => '',
                'icon' => 'fa fa-users',
                'children' => array(
                    array('title' => 'Chapter Roster',  'url' => 'sisters/roster', 'icon' => '', 'children' => array()),
                    array('title' => 'Chapter Leaders', 'url' => 'sisters/leaders', 'icon' => '', 'children' => array()),
                    )
                ),
            'Recruitment' => array(
                'title' => 'Recruitment',
                'url' => '',
                'icon' => 'fa fa-file-text',
                'children' => array(
                    array('title' => 'Recruitment FAQs', 'url' => 'recruitment/faqs', 'icon' => '','children' => array())
                    )
                ),
            'Philanthropy' => array(
                'title'    => 'Philanthropy',
                'url'      => 'philanthropy',
                'icon'     => 'glyphicon glyphicon-tree-deciduous',
                'children' => array()
                ),
            'Gallery' => array(
                'title'    => 'Gallery',
                'url'      => 'gallery',
                'icon'     => 'glyphicon glyphicon-picture',
                'children' => array()
                ),
            'Contact' => array(
                'title'    => 'Contact',
                'url'      => 'contact',
                'icon'     => 'fa fa-envelope',
                'children' => array()
                )
        )
    )
);

// images
define('IMG_DFL_CREST', HOST_NAME . '/public/images/dfl_crest.png');
define('IMG_DFL_LOGO', HOST_NAME . '/public/images/dphil-logo.png');

// DB Settings
define('DB_HOST', 'localhost');
define('DB_NAME', 'xeonsold_dphil');
define('DB_USER', 'xeonsold_dphil');
define('DB_PASS', 'GSUdphil');

/**
 * database handling class
 */
class Db {
    protected static $_dbh;

    /**
     * constructor
     */
    private function __construct() {
        try {
            self::$_dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=UTF8", DB_USER, DB_PASS);
            self::$_dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch ( PDOException $e ) {
            die('Connection error: ' . $e->getMessage());
        }
    }

    /**
     * initialize a database object if one doesn't already exist
     *
     * @return void
     */
    public static function init() {
        if ( !self::$_dbh ) {
            new Db();
        }
    }

    /**
     * get a database handler, create a new one if one doesn't exist
     *
     * @return self
     */
    public static function getDbh() {
        if ( !self::$_dbh ) {
            new Db();
        }

        return self::$_dbh;
    }

    /**
     * magic clone
     */
    public function __clone() {}
}

Db::init();