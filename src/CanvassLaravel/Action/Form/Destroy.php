<?php

namespace CanvassLaravel\Action\Form;

use Canvass\Contract\Action\Action;
use Canvass\Forge;

class Destroy implements Action
{
    public function __invoke($form_id)
    {
        try {
            return \DB::transaction(static function () use ($form_id) {
                $destroyer = new \Canvass\Action\Form\Destroy();

                return $destroyer->__invoke($form_id);
            });
        } catch (\Throwable $e) {
            return Forge::error($e->getMessage(), $this);
        }
    }
}
