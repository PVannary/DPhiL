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
                'icon' => 'fa fa-info',
                'children' => array(
                    array('title' => 'Chapter History',  'url' => 'about/chapter_history',  'icon' => 'glyphicon glyphicon-asterisk', 'children' => array()),
                    array('title' => 'National History', 'url' => 'about/national_history', 'icon' => 'glyphicon glyphicon-asterisk', 'children' => array()),
                    array('title' => 'Preamble',         'url' => 'about/preamble',         'icon' => 'glyphicon glyphicon-asterisk', 'children' => array())
                    )
                ),
            'Sisters' => array(
                'title' => 'Sisters',
                'url' => '',
                'icon' => 'fa fa-users',
                'children' => array(
                    array('title' => 'Chapter Roster',  'url' => 'sisters/roster', 'icon' => 'glyphicon glyphicon-asterisk', 'children' => array()),
                    array('title' => 'Chapter Leaders', 'url' => 'sister/leaders', 'icon' => 'glyphicon glyphicon-asterisk', 'children' => array()),
                    )
                ),
            'Recruitment' => array(
                'title' => 'Recruitment',
                'url' => '',
                'icon' => 'fa fa-file-text',
                'children' => array(
                    array('title' => 'Anti-Hazing', 'url' => 'recruitment/antihazing', 'icon' => 'glyphicon glyphicon-asterisk','children' => array())
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
define('IMG_DFL_CREST', '/site-dphil/public/images/dfl_crest.png');