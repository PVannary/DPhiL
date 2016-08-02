<?php

/* loading specific class and roster image */

class ImageLoader {
    public function loadImage($class, $imageFileName) {
        $imagePath    = HOST_NAME . '/public/images/roster/';
        $absImagePath = ABSOLUTE_PATH . '/public/images/roster/';
        $class        = strtolower(str_replace(' ', '_', $class));
        $image        = '';

        foreach ( glob($absImagePath . $class . '/' . $imageFileName . '.*') as $fileName ) { 
            $image = $imagePath . $class . '/' . basename($fileName);
            break;
        }

        if (empty($image)) {
            $imagePath = IMG_DFL_PLACEHOLDER;
        } else {
            $imagePath = $image;
        }

        return $imagePath;
    }
}