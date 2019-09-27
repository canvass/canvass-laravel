<?php

namespace CanvassLaravel\Http\Controllers\FormField;

use CanvassLaravel\Model\Form;
use CanvassLaravel\Model\FormField;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Create
{
    public function __invoke(int $form_id, string $type, int $sort = null)
    {
        \Canvass\Support\FieldTypes::isValid($type);

        try {
            $form = Form::findOrFail($form_id);
        } catch (ModelNotFoundException $e) {

        }

        return view('canvass::form_field.create', [
            'form' => $form,
            'field' => new FormField(),
            'type' => $type,
            'sort' => $sort,
        ]);
    }
}
