<?php

namespace CanvassLaravel\Http\Controllers\Form;

use Canvass\Action\Validation\ValidateFormData;
use CanvassLaravel\Support\CanvassValidator;
use Canvass\Action\UpdateForm;
use CanvassLaravel\Model\Form;

class Store
{
    use \CanvassLaravel\Support\LogsThrowables;

    public function __invoke(\Illuminate\Http\Request $request)
    {
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

        $form = new Form();

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
                ->with('error', 'Could not save form.');
        }

        return redirect()->route('form.index')
            ->with(
                'success',
                sprintf('%s has been saved.', $form->name)
            );
    }
}
