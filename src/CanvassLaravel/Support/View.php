<?php

namespace CanvassLaravel\Support;

class View
{
    public static function getFieldCreateRoute(
        $form_id,
        $type,
        $sort = 0,
        $field_id = null
    ): string
    {
        if (null !== $field_id) {
            return route(
                'nested_field.create',
                [$form_id, $field_id, $sort, $type]
            );
        }

        return route('form_field.create', [$form_id, $type, $sort]);
    }

    public static function getFieldInputSelectRoute(
        $form_id,
        $type,
        $sort = 0,
        $field_id = null
    ): string
    {
        if (null !== $field_id) {
            return route(
                'nested_field.select_input_type',
                [$form_id, $field_id, $sort, $type]
            );
        }

        return route('form_field.select_input_type', [$form_id, $type, $sort]);
    }
}
