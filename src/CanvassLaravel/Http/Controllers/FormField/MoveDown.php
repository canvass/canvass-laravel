<?php

namespace CanvassLaravel\Http\Controllers\FormField;

use Canvass\Action\FormField\MoveField;
use CanvassLaravel\Model\Form;
use CanvassLaravel\Model\FormField;
use CanvassLaravel\Support\LogsThrowables;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MoveDown
{
    use LogsThrowables;

    public function __invoke(int $form_id, int $field)
    {
        try {
            $form = Form::findOrFail($form_id);
            $field = FormField::findOrFail($field);
        } catch (ModelNotFoundException $e) {

        }

        $move = new MoveField($form, $field, null);

        try {
            $moved = $move->run(MoveField::DOWN);
        } catch (\Throwable $e) {
            $this->logThrowable($e);

            $moved = false;
        }

        if (! $moved) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Could not move field for unknown reasons.'
                );
        }

        return redirect()->route('form_field.index', $form->id)
            ->with(
                'success',
                sprintf(
                    'Field, %s, has been moved down.',
                    $field->label ?? $field->identifier
                )
            );
    }
}
