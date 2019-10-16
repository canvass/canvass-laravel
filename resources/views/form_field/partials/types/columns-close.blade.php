@include('canvass::form_field.partials.types.nested-close')

<hr>
<strong>
    Add a Column:
</strong>

<a class="btn btn-outline-primary"
   href="{{ \CanvassLaravel\Support\View::getFieldCreateRoute(
       $form->id,
       'column',
       $sort ?? 0,
       $field->id ?? null
   ) }}"
>
    <span class="sr-only">Add</span>
    Column
</a>
