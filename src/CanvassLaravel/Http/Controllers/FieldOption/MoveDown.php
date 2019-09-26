<?php

namespace CanvassLaravel\Http\Controllers\FieldOption;

use Canvass\Action\FormField\MoveField;
use Canvass\Exception\InvalidSortException;
use CanvassLaravel\Model\Form;
use CanvassLaravel\Model\FormField;
use CanvassLaravel\Support\LogsThrowables;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MoveDown
{
    use LogsThrowables;

    public function __invoke(int $form_id, int $field_id, int $option_id)
    {
        try {
            $form = Form::findOrFail($form_id);

            $parent = FormField::findOrFail($field_id);

            $field = FormField::findOrFail($option_id);
        } catch (ModelNotFoundException $e) {

        }

        $move = new MoveField($form, $field, null);

        $moved = false;

        try {
            $moved = $move->run(MoveField::DOWN, $parent->id);
        } catch (InvalidSortException $e) {
            $message = 'Moving the field would result in an invalid sort.';
        } catch (\Throwable $e) {
            $this->logThrowable($e);

            $message = 'Could not move field for unknown reasons.';
        }

        if (! $moved) {
            return redirect()->back()->with('error', $message);
        }

        return redirect()->route('form_field.edit', [$form->id, $parent->id])
            ->with(
                'success',
                sprintf(
                    'Field, %s, has been moved down.',
                    $field->label ?? $field->identifier
                )
            );
    }
}
