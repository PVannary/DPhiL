<?php

define('SITE_STATUS', 1);
define('TIMESTAMP', rand(0,100000000));
define('SITE_TEMPLATE', 'default');

define('FOLDER_VIEWS',       ABS_BASE_PATH . 'application/views/');
define('FOLDER_CONTROLLERS', ABS_BASE_PATH . 'application/controllers/');
define('FOLDER_MODELS',      ABS_BASE_PATH . 'application/models/');
define('FOLDER_TEMPLATES',   ABS_BASE_PATH . 'public/templates/');
define('FOLDER_JS',          ABS_BASE_PATH . 'public/js/');
define('FOLDER_CSS',         ABS_BASE_PATH . 'public/css/');
define('FOLDER_IMAGES',      ABS_BASE_PATH . 'public/images/');
define('FOLDER_FONTS',       ABS_BASE_PATH . 'public/fonts/');
define('FOLDER_SCRIPTS',     ABS_BASE_PATH . 'scripts/');
define('FOLDER_LIBRARY',     ABS_BASE_PATH . 'library/');
define('FOLDER_DATA',        ABS_BASE_PATH . 'data/');
define('FOLDER_LOGS',        ABS_BASE_PATH . 'data/logs/');
define('FOLDER_BACKUPS',     ABS_BASE_PATH . 'data/backups/');

define('SITE_JS',  SITE_URL . 'public/js/');
define('SITE_CSS', SITE_URL . 'public/css/');
define('SITE_HEADER',    'Delta Phi Lambda Sorority, Inc.');

// images
define('IMG_DFL_LOGO',    SITE_URL . '/public/images/dphil-logo.png');
define('IMG_DFL_CREST',   SITE_URL . '/public/images/dphil-crest.png');
define('IMG_DFL_HEADER',  SITE_URL . '/public/images/dphil-header.png');
define('IMG_DFL_LETTERS', SITE_URL . '/public/images/dphil-header-letters.png');

// modules
define('MODULE_HOME_STATUS', 1);
define('MODULE_EXAMPLE_SET', 1);

Database::init(DB_USER, DB_PASS, DB_NAME, DB_HOST);

SessionData::start();