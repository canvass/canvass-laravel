<?php

namespace CanvassLaravel\Http\Controllers\FormField;

use Canvass\Action\FormField\CreateField;
use CanvassLaravel\Model\Form;
use CanvassLaravel\Model\FormField;
use CanvassLaravel\Support\CanvassValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class Store
{
    use \CanvassLaravel\Support\LogsThrowables;

    public function __invoke(
        Request $request, int $form_id, string $type, int $sort = null
    )
    {
        \Canvass\Support\FieldTypes::isValid($type);

        try {
            $form = Form::findOrFail($form_id);
        } catch (ModelNotFoundException $e) {

        }

        $field = new FormField();

        $validator_support = new CanvassValidator();

        $create = new CreateField(
            $form, $field, $validator_support, null, $validator_support
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
                ->with('error', 'Could not save field.');
        }

        return redirect()->route('form_field.index', $form->id)
            ->with(
                'success',
                sprintf(
                    '%s has been saved.',
                    $field->label ?? $field->identifier
                )
            );
    }
}
