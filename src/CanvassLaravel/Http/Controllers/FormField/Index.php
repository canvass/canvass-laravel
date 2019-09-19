<?php

namespace CanvassLaravel\Http\Controllers\FormField;

use Canvass\Action\FormField\ListFields;
use CanvassLaravel\Model\Form;
use CanvassLaravel\Model\FormField;
use Canvass\Action\FormField\ListControls;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Index
{
    public function __invoke(int $id, int $version = 1)
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
        $get = new ListFields();

        return view(
            'canvass::form_field.listing',
            $get->run($form, new FormField(), $version)
        );
    }
}
