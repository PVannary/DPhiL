<?php

define('ABSOLUTE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/site-dphil/');

// include library
foreach ( glob(ABSOLUTE_PATH . '/application/lib/*.php') as $fileName ) { include $fileName; }

// header
define('SITE_HEADER',    'Delta Phi Lambda Sorority, Inc.');
define('SITE_SUBHEADER', serialize(array('Georgia State University', 'Gamma Chapter')));

// links
define('HOST_NAME', 'http://' . getHostByName(getHostName()) . '/site-dphil');

define('SITE_NAV', serialize(
        array(
            'About' => array(
                'title' => 'About',
                'url' => '',
                'children' => array(
                    array('title' => 'Chapter History',  'url' => 'about/chapter_history',  'children' => array()),
                    array('title' => 'National History', 'url' => 'about/national_history', 'children' => array()),
                    array('title' => 'Preamble',         'url' => 'about/preamble',         'children' => array())
                    )
                ),
            'Meet the Sisters' => array(
                'title' => 'Meet the Sisters',
                'url' => '',
                'children' => array(
                    array('title' => 'Chapter Roster',  'url' => 'sisters/roster', 'children' => array()),
                    array('title' => 'Chapter Leaders', 'url' => 'sister/leaders', 'children' => array()),
                    )
                ),
            'Recruitment' => array(
                'title' => 'Recruitment',
                'url' => '',
                'children' => array(
                    array('title' => 'Anti-Hazing', 'url' => 'recruitment/antihazing', 'children' => array())
                    )
                ),
            'Philanthropy' => array(
                'title'    => 'Philanthropy',
                'url'      => 'philanthropy',
                'children' => array()
                ),
            'Gallery' => array(
                'title'    => 'Gallery',
                'url'      => 'gallery',
                'children' => array()
                ),
            'Contact' => array(
                'title'    => 'Contact',
                'url'      => 'contact',
                'children' => array()
                )
        )
    )
);

// images
define('IMG_DFL_CREST', '/site-dphil/public/images/dfl_crest.png');