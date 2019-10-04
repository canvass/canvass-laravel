<?php

namespace CanvassLaravel\Http\Controllers\FieldOption;

use CanvassLaravel\Model\Form;
use CanvassLaravel\Model\FormField;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Edit
{
    public function __invoke(int $form_id, int $field_id, int $option_id)
    {
        try {
            $form = Form::findOrFail($form_id);
            /** @var FormField $parent */
            $parent = FormField::findOrFail($field_id);
            /** @var FormField $field */
            $field = FormField::findOrFail($option_id);
        } catch (ModelNotFoundException $e) {

        }

        return view('canvass::nested_field.edit', [
            'form' => $form,
            'parent' => $parent,
            'field' => $field,
            'type' => $field->canvass_type
        ]);
    }
}
