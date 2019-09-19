<?php

namespace CanvassLaravel\Http\Controllers\Form;

use CanvassLaravel\Support\CanvassValidator;
use Canvass\Action\UpdateForm;
use Canvass\Action\ValidateFormData;
use CanvassLaravel\Model\Form;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Update
{
    use \CanvassLaravel\Support\LogsThrowables;

    public function __invoke(\Illuminate\Http\Request $request, int $id)
    {
        try {
            $form = Form::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()
                ->with(
                    'error',
                    'The form was not found, please try again.'
                );
        }

        $data = $request->only(
            'name', 'introduction', 'redirect_url',
            'identifier', 'classes', 'button_text', 'button_classes'
        );

        $validator_support = new CanvassValidator();

        $validator = new ValidateFormData(
            $validator_support,
            $validator_support
        );

        $validator->validate($data);

        $updater = new UpdateForm();

        try {
            $updated = $updater->run($form, $data);
        } catch (\Throwable $e) {
            $this->logThrowable($e);

            $updated = false;
        }

        if (! $updated) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Could not update form for unknown reasons.'
                );
        }

        return redirect()->route('canvass::form.index')
            ->with(
                'success',
                sprintf('%s has been updated.', $form->name)
            );
    }
}
