<strong>
    Add a Field<?php if(! empty($field->label)): ?> to {{ $field->label }}<?php endif; ?>:
</strong>

<br>

<a class="btn btn-outline-primary mb-1"
   href="{{ \CanvassLaravel\Support\View::getFieldCreateRoute(
       $form->id,
       'input',
       $sort ?? 0,
       $field->id ?? null
   ) }}"
>
    <span class="sr-only">Add</span>
    Input
</a>

<a class="btn btn-outline-primary mb-1"
   href="{{ \CanvassLaravel\Support\View::getFieldCreateRoute(
       $form->id,
       'textarea',
       $sort ?? 0,
       $field->id ?? null
   ) }}"
>
    <span class="sr-only">Add</span>
    Textarea
</a>

<a class="btn btn-outline-primary mb-1"
   href="{{ \CanvassLaravel\Support\View::getFieldCreateRoute(
       $form->id,
       'select',
       $sort ?? 0,
       $field->id ?? null
   ) }}"
>
    <span class="sr-only">Add</span>
    Select
</a>

<a class="btn btn-outline-primary mb-1"
   href="{{ \CanvassLaravel\Support\View::getFieldCreateRoute(
       $form->id,
       'checkbox',
       $sort ?? 0,
       $field->id ?? null
   ) }}"
>
    <span class="sr-only">Add</span>
    Checkbox
</a>

@if($show_group_button ?? true)
<a class="btn btn-outline-primary mb-1"
   href="{{ \CanvassLaravel\Support\View::getFieldCreateRoute(
       $form->id,
       'group',
       $sort ?? 0,
       $field->id ?? null
   ) }}"
>
    <span class="sr-only">Add</span>
    Group
</a>
@endif

@if($show_fieldset_button ?? true)
<a class="btn btn-outline-primary mb-1"
   href="{{ \CanvassLaravel\Support\View::getFieldCreateRoute(
       $form->id,
       'fieldset',
       $sort ?? 0,
       $field->id ?? null
   ) }}"
>
    <span class="sr-only">Add</span>
    Fieldset
</a>
@endif

<a class="btn btn-outline-primary mb-1"
   href="{{ \CanvassLaravel\Support\View::getFieldCreateRoute(
       $form->id,
       'divider',
       $sort ?? 0,
       $field->id ?? null
   ) }}"
>
    <span class="sr-only">Add</span>
    Divider
</a>

@if($show_columns_button ?? true)
<a class="btn btn-outline-primary mb-1"
   href="{{ \CanvassLaravel\Support\View::getFieldCreateRoute(
       $form->id,
       'columns',
       $sort ?? 0,
       $field->id ?? null
   ) }}"
>
    <span class="sr-only">Add</span>
    Columns
</a>
@endif
