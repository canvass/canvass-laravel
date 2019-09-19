<?php

if (! function_exists('canvass_path')) {
    function canvass_path($path) {
        return dirname(__DIR__, 1) . '/' . $path;
    }
}
