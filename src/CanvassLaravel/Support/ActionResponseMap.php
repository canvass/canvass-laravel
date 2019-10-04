<?php

namespace CanvassLaravel\Support;

use Canvass\Contract\FieldAction;
use Canvass\Contract\NestedFieldAction;

class ActionResponseMap
{
    public static function routeRedirect(
        $action,
        string $message
    ): string
    {
        if ($action instanceof NestedFieldAction) {
            return redirect()
                ->route(
                    'form_field.edit',
                    [$action->getFormId(), $action->getParentFieldId()]
                )
                ->with('success', $message);
        }

        if ($action instanceof FieldAction) {
            return redirect()
                ->route('form_field.index', $action->getFormId())
                ->with('success', $message);
        }

        return redirect()->route('form.index')->with('success', $message);
    }
}
