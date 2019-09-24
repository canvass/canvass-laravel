<?php

if (! function_exists('canvass_laravel_path')) {
    function canvass_laravel_path($path) {
        return dirname(__DIR__, 1) . '/' . $path;
    }
}
