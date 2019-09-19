<?php

namespace CanvassLaravel\Http\Controllers\Form;

use Canvass\Action\DeleteForm;
use CanvassLaravel\Model\Form;
use CanvassLaravel\Support\LogsThrowables;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Destroy
{
    use LogsThrowables;

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

        $destroyer = new DeleteForm();

        try {
            $destroyed = $destroyer->run($form);
        } catch (\Throwable $e) {
            $this->logThrowable($e);

            $destroyed = false;
        }

        if (! $destroyed) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Could not delete form for unknown reasons.'
                );
        }

        return redirect()->route('canvass::form.index')
            ->with(
                'success',
                sprintf('%s has been deleted.', $form->name)
            );
    }
}
