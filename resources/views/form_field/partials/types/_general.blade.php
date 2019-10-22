<div class="row">
    <div class="col-md">
        @include('canvass::form_field.partials.fields.label')

        @if($show_name_field ?? true)
            @include('canvass::form_field.partials.fields.name')
        @endif

        @include('canvass::form_field.partials.fields.id')

        @if($show_value_field ?? false)
            @include('canvass::form_field.partials.fields.value', [
                'required' => $value_field_required ?? true
            ])
        @endif
    </div>
    <div class="col-md">
        @include('canvass::form_field.partials.fields.help-text')

        @include('canvass::form_field.partials.fields.classes')

        @include('canvass::form_field.partials.fields.wrap-classes')
    </div>
</div>

<hr>
