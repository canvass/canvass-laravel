<?php

namespace CanvassLaravel\Http\Controllers\Form;

use CanvassLaravel\Model\Form;
use Illuminate\Http\Request;

class Create
{
    public function __invoke(Request $request)
    {
        return view('canvass::form.create', ['form' => new Form()]);
    }
}
