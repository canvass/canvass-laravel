<?php

namespace CanvassLaravel\Http\Controllers\FormField;

use CanvassLaravel\Model\Form;
use CanvassLaravel\Model\FormField;
use Canvass\Support\FieldTypes;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SelectInputType
{
    public function __invoke(int $form_id, int $sort = null)
    {
        try {
            $form = Form::findOrFail($form_id);
        } catch (ModelNotFoundException $e) {

        }

        return view('canvass::form_field.select-input-type', [
            'form' => $form,
            'sort' => $sort,
            'types' => FieldTypes::getInputTypes(),
        ]);
    }
}
