<div class="row">
    <div class="col-md">
        @include('canvass::form_field.partials.fields.label')

        @include('canvass::form_field.partials.fields.name')

        @include('canvass::form_field.partials.fields.id')

        @include('canvass::form_field.partials.fields.value')
    </div>
    <div class="col-md">
        @if($show_type_field ?? false)
            @include('canvass::form_field.partials.fields.type')
        @endif

        @include('canvass::form_field.partials.fields.help-text')

        @include('canvass::form_field.partials.fields.classes')

        @include('canvass::form_field.partials.fields.wrap-classes')
    </div>
</div>

<hr>
