<?php

namespace CanvassLaravel\Http\Controllers\Form;

use CanvassLaravel\Model\Form;
use Canvass\Action\GetForm;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Edit
{
    public function __invoke(\Illuminate\Http\Request $request, int $id)
    {
        try {
            $form = Form::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()
                ->with(
                    'error',
                    'The form was not found, please try again.'
                );
        }

        // TODO pass owner_id
        $get = new GetForm();

        return view('canvass::form.edit', $get->run($form, $id));
    }
}
