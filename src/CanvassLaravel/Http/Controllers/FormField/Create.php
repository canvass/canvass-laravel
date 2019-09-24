<?php

namespace CanvassLaravel\Http\Controllers\FormField;

use CanvassLaravel\Model\Form;
use CanvassLaravel\Model\FormField;
use Canvass\Support\FieldTypes;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class Create
{
    public function __invoke(int $form_id, string $type, int $sort = null)
    {
        if (! in_array($type, FieldTypes::get(true), true)) {
            throw new ValidationException("{$type} is not valid.");
        }

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
