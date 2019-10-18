<?php

namespace CanvassLaravel\Action\Form;

class Preview
{
    public function __invoke($form_id)
    {
        $render = new \CanvassPaint\Blade\RenderFunction();

        $form = new \CanvassPaint\Action\RenderForm($render);

        $html = $form->render($form_id, \Canvass\Forge::getOwnerId());

        return view('canvass::preview.form', [
            'form_html' => $html,
            'form' => $form->getForm(),
        ]);
    }
}
