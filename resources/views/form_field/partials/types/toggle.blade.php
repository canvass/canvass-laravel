@include('canvass::form_field.partials.fields.label')

@if($show_name_field ?? false)
    @include('canvass::form_field.partials.fields.name')
@endif

@include('canvass::form_field.partials.fields.value', ['required' => true])

@include('canvass::form_field.partials.fields.id')

@include('canvass::form_field.partials.fields.classes')

@include('canvass::form_field.partials.fields.help-text')
