<?php

namespace CanvassLaravel\Http\Controllers\Form;

use CanvassLaravel\Model\Form;
use CanvassLaravel\Support\View;
use Canvass\Action\ListForms;

class Index
{
    public function __invoke()
    {
        // TODO pass owner_id
        $get = new ListForms();

        return view('canvass::form.listing', $get->run(new Form()));
    }
}
