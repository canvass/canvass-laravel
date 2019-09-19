<?php

namespace CanvassLaravel\Http\Controllers\Form;

use CanvassLaravel\Model\Form;
use Canvass\Action\GetForm;

class Edit
{
    public function __invoke(\Illuminate\Http\Request $request, int $id)
    {
        // TODO pass owner_id
        $get = new GetForm();

        return view('canvass::form.edit', $get->run(new Form(), $id));
    }
}
