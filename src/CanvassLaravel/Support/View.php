<?php

namespace CanvassLaravel\Support;

class View implements \Canvass\Contract\View
{
    /** @var string */
    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function render($data = null)
    {
        return view($this->path, $data);
    }
}
