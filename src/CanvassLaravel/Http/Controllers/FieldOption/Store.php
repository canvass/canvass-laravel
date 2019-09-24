<?php

namespace CanvassLaravel\Http\Controllers\FieldOption;

use Canvass\Action\FormField\CreateChildField;
use CanvassLaravel\Model\Form;
use CanvassLaravel\Model\FormField;
use CanvassLaravel\Support\CanvassValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class Store
{
    use \CanvassLaravel\Support\LogsThrowables;

    public function __invoke(
        Request $request,
        int $form_id,
        int $field_id,
        int $sort,
        string $type
    )
    {
        try {
            /** @var Form $form */
            $form = Form::findOrFail($form_id);
            /** @var FormField $parent */
            $parent = FormField::findOrFail($field_id);
        } catch (ModelNotFoundException $e) {

        }

        $field = new FormField();

        $validator_support = new CanvassValidator();

        $field->setAttribute('name', $parent->getAttribute('name'));

        $field->setAttribute('parent_id', $parent->getId());

        $create = new CreateChildField(
            $form,
            $field,
            $parent,
            $validator_support,
            null,
            $validator_support
        );

        $data = $request->all();

        try {
            $created = $create->run($data, $type, $sort);
        } catch (\Throwable $e) {
            $this->logThrowable($e);

            $created = false;
        }

        if (! $created) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Could not save field option.');
        }

        return redirect()->route('form_field.edit', [$form->id, $parent->id])
            ->with(
                'success',
                sprintf(
                    '%s has been saved.',
                    $field->label ?? $field->identifier
                )
            );
    }
}
