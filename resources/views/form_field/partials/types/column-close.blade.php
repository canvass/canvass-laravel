@include('canvass::form_field.partials.types.nested-close')

@include(
    'canvass::form_field.partials.add-field-buttons',
    [
        'show_fieldset_button' => true,
        'show_group_button' => true,
        'show_columns_button' => false,
        'sort' => count($children ?? []),
    ]
)
