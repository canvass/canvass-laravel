<?php

namespace CanvassLaravel\Http\Controllers\FormField;

use CanvassLaravel\Model\Form;
use CanvassLaravel\Model\FormField;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Edit
{
    public function __invoke(int $form_id, int $field)
    {
        try {
            $form = Form::findOrFail($form_id);
            /** @var FormField $field */
            $field = FormField::findOrFail($field);
            /** @var FormField[]|\Illuminate\Support\Collection $children */
            $children = $field->retrieveChildren();
        } catch (ModelNotFoundException $e) {

        }

        return view('canvass::form_field.edit', [
            'form' => $form,
            'field' => $field,
            'children' => $children,
            'type' => $field->getHtmlType(),
            'sort' => $field->sort,
            'show_type_field' => false,
        ]);
    }
}
