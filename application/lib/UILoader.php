<?php

/**
 *  loading specific fragments class
 */
class UILoader {
    public static function loadFragment($fragment, $data = '') {
        include ABS_FOLD_FRAGMENTS . $fragment . '.html';
    }

    public static function loadView($view, $data = '') {
        include ABS_FOLD_VIEWS . $view . '.html';
    }
}