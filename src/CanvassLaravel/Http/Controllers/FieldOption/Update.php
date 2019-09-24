<?php

namespace CanvassLaravel\Http\Controllers\FieldOption;

use Canvass\Action\FormField\UpdateField;
use CanvassLaravel\Model\Form;
use CanvassLaravel\Model\FormField;
use CanvassLaravel\Support\CanvassValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class Update
{
    use \CanvassLaravel\Support\LogsThrowables;

    public function __invoke(
        Request $request,
        int $form_id,
        int $field_id,
        int $option_id
    )
    {
        try {
            $form = Form::findOrFail($form_id);
            $parent = FormField::findOrFail($field_id);
            $field = FormField::findOrFail($option_id);
        } catch (ModelNotFoundException $e) {

        }

        $validator_support = new CanvassValidator();

        $update = new UpdateField(
            $form, $field, $validator_support, null, $validator_support
        );

        $data = $request->all();

        try {
            $updated = $update->run($data, $field->getAttribute('type'));
        } catch (\Throwable $e) {
            $this->logThrowable($e);

            $updated = false;
        }

        if (! $updated) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Could not update field option.');
        }

        return redirect()->route('form_field.edit', [$form->id, $parent->id])
            ->with(
                'success',
                sprintf(
                    '%s has been updated.',
                    $field->label ?? $field->identifier
                )
            );
    }
}
