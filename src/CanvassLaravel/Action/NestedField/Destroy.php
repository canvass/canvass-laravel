<?php

namespace CanvassLaravel\Action\NestedField;

use Canvass\Contract\Action\Action;
use Canvass\Forge;

class Destroy implements Action
{
    public function __invoke($form_id, $parent_id, $nested_id)
    {
        try {
            return \DB::transaction(
                static function () use ($form_id, $parent_id, $nested_id) {
                    $destroyer = new \Canvass\Action\NestedField\Destroy();

                    return $destroyer->__invoke($form_id, $parent_id, $nested_id);
                }
            );
        } catch (\Throwable $e) {
            return Forge::error($e->getMessage(), $this);
        }
    }
}
