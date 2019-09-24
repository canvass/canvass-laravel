<?php

namespace CanvassLaravel\Http\Controllers\FieldOption;

use CanvassLaravel\Model\Form;
use CanvassLaravel\Model\FormField;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Create
{
    public function __invoke(
        int $form_id,
        int $field_id,
        int $sort,
        string $type
    )
    {
        try {
            $form = Form::findOrFail($form_id);
            /** @var FormField $field */
            $field = FormField::findOrFail($field_id);
        } catch (ModelNotFoundException $e) {

        }

        return view('canvass::field_option.create', [
            'form' => $form,
            'parent' => $field,
            'field' => new FormField(),
            'type' => $type,
            'sort' => $sort,
        ]);
    }
}
