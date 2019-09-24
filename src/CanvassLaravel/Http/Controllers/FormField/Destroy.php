<?php

namespace CanvassLaravel\Http\Controllers\FormField;

use Canvass\Action\FormField\DeleteField;
use CanvassLaravel\Model\Form;
use CanvassLaravel\Model\FormField;
use CanvassLaravel\Support\LogsThrowables;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Destroy
{
    use LogsThrowables;

    public function __invoke(int $form_id, int $field)
    {
        try {
            $form = Form::findOrFail($form_id);
            $field = FormField::findOrFail($field);
        } catch (ModelNotFoundException $e) {

        }

        $destroyer = new DeleteField($form, $field, null);

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
                    'Could not delete field for unknown reasons.'
                );
        }

        return redirect()->route('form_field.index', $form->id)
            ->with(
                'success',
                sprintf(
                    'Field, %s, has been deleted.',
                    $field->label ?? $field->identifier
                )
            );
    }
}
