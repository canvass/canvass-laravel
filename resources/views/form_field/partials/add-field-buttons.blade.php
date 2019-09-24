<strong>Add a Field:</strong>

<a class="btn btn-outline-primary"
   href="{{ route('form_field.create', [$form->id, 'input', $sort ?? 0]) }}"
>
    <span class="sr-only">Add</span>
    Input
</a>

<a class="btn btn-outline-primary"
   href="{{ route('form_field.create', [$form->id, 'textarea', $sort ?? 0]) }}"
>
    <span class="sr-only">Add</span>
    Textarea
</a>

<a class="btn btn-outline-primary"
   href="{{ route('form_field.create', [$form->id, 'select', $sort ?? 0]) }}"
>
    <span class="sr-only">Add</span>
    Select
</a>

{{--<a class="btn btn-outline-primary"--}}
{{--   href="{{ route('form_field.create', [$form->id, 'checkbox', $sort ?? 0]) }}"--}}
{{-->--}}
{{--    <span class="sr-only">Add</span>--}}
{{--    Checkbox--}}
{{--</a>--}}

<a class="btn btn-outline-primary"
   href="{{ route('form_field.create', [$form->id, 'group', $sort ?? 0]) }}"
>
    <span class="sr-only">Add</span>
    Group
</a>

<a class="btn btn-outline-primary"
   href="{{ route('form_field.create', [$form->id, 'fieldset', $sort ?? 0]) }}"
>
    <span class="sr-only">Add</span>
    Fieldset
</a>

<a class="btn btn-outline-primary"
   href="{{ route('form_field.create', [$form->id, 'divider', $sort ?? 0]) }}"
>
    <span class="sr-only">Add</span>
    Divider
</a>
