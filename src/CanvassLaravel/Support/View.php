<?php

namespace CanvassLaravel\Support;

class View
{
    public static function getFieldCreateRoute(
        $form_id,
        $type,
        $sort = 0,
        $field_id = null
    )
    {
        if (null !== $field_id) {
            return route(
                'form_field_option.create',
                [$form_id, $field_id, $sort, $type]
            );
        }

        return route('form_field.create', [$form_id, $type, $sort]);
    }
}
