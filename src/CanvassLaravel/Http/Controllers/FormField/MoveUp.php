<?php

namespace CanvassLaravel\Http\Controllers\FormField;

use Canvass\Action\FormField\MoveField;
use Canvass\Exception\InvalidSortException;
use CanvassLaravel\Model\Form;
use CanvassLaravel\Model\FormField;
use CanvassLaravel\Support\LogsThrowables;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MoveUp
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

        $moved = false;

        try {
            $moved = $move->run(MoveField::UP);
        } catch (InvalidSortException $e) {
            $message = 'Moving the field would result in an invalid sort.';
        } catch (\Throwable $e) {
            $this->logThrowable($e);

            $message = 'Could not move field for unknown reasons.';
        }

        if (! $moved) {
            return redirect()->back()->with('error', $message);
        }

        return redirect()->route('form_field.index', $form->id)
            ->with(
                'success',
                sprintf(
                    'Field, %s, has been moved up.',
                    $field->label ?? $field->identifier
                )
            );
    }
}
