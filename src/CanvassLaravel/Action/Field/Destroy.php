<?php

namespace CanvassLaravel\Action\Field;

use Canvass\Contract\Action;
use Canvass\Forge;

class Destroy implements Action
{
    public function __invoke($form_id, $field_id)
    {
        try {
            return \DB::transaction(static function () use ($form_id, $field_id) {
                $destroyer = new \Canvass\Action\FormField\Destroy();

                return $destroyer->__invoke($form_id, $field_id);
            });
        } catch (\Throwable $e) {
            return Forge::error($e->getMessage(), $this);
        }
    }
}
