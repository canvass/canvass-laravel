<?php

namespace CanvassLaravel\Http\Controllers\FieldOption;

use Canvass\Action\FormField\DeleteField;
use CanvassLaravel\Model\Form;
use CanvassLaravel\Model\FormField;
use CanvassLaravel\Support\LogsThrowables;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Destroy
{
    use LogsThrowables;

    public function __invoke(int $form_id, int $field_id, int $option_id)
    {
        try {
            $form = Form::findOrFail($form_id);
            $field = FormField::findOrFail($field_id);
            $option = FormField::findOrFail($option_id);
        } catch (ModelNotFoundException $e) {

        }

        $destroyer = new DeleteField($form, $option, null);

        try {
            $destroyed = $destroyer->run();
        } catch (\Throwable $e) {
            $this->logThrowable($e);

            $destroyed = false;
        }

        if (! $destroyed) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Could not delete field option for unknown reasons.'
                );
        }

        return redirect()->route('form_field.edit', [$form->id, $field->id])
            ->with(
                'success',
                sprintf(
                    'Field option, %s, has been deleted.',
                    $foption->label ?? $option->identifier
                )
            );
    }
}
