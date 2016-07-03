<?php

// include library
define('ABSOLUTE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/site-dphil/');

foreach ( glob(ABSOLUTE_PATH . '/application/lib/*.php') as $fileName ) { include $fileName; }