<?php

namespace CanvassLaravel\Support;

use Canvass\Contract\Action\Action;
use Illuminate\Support\Str;

class Response implements \Canvass\Contract\Response
{
    public function respond(Action $action, $data = null)
    {
        $view = self::determineResponse($action);

        return view("canvass::{$view}", $data);
    }

    public static function determineResponse(Action $action): string
    {
        $parts = explode('\\', get_class($action));

        $last = count($parts) - 1;

        $next_to_last = $last - 1;

        $section = Str::snake($parts[$next_to_last]);

        $view = Str::kebab($parts[$last]);
        
        return "{$section}.{$view}";
    }
}
