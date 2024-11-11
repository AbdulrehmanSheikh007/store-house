<?php

function checkImage($path = '', $isDP = true) {
    $check = storage_path('/app/public/' . $path);
    if (\File::exists($check) && !File::isDirectory($check)) {
        return url('/storage/app/public/' . $path);
    }

    if (!$isDP) {
        //return placeholder for square image
        return asset('public/images/placeholder-1-1.webp');
    }

    return asset('public/images/avatars/1.jpg');
}

?>