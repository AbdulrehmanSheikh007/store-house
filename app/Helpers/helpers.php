<?php

function checkImage($path = '') {
    $check = storage_path('/app/' . $path);
    if (\File::exists($check) && !File::isDirectory($check)) {
        return url('/storage/app/' . $path);
    }

    return asset('public/images/avatars/1.jpg');
}

?>