<?php

namespace CanvassLaravel\Http\Controllers\FieldOption;

use Canvass\Action\FormField\CreateChildField;
use CanvassLaravel\Model\Form;
use CanvassLaravel\Model\FormField;
use CanvassLaravel\Support\CanvassValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class Store
{
    public function __invoke(
        Request $request,
        int $form_id,
        int $field_id,
        int $sort,
        string $type
    )
    {
        $store = new \Canvass\Action\NestedField\Store();

        return $store->__invoke(
            $request->all(),
            $form_id,
            $field_id,
            $sort,
            $type
        );
    }
}
