<div class="row">
    <div class="col-md">
        @include('canvass::form_field.partials.fields.id')

        @include('canvass::form_field.partials.fields.classes')
    </div>

    <div class="col-md">
        @include('canvass::form_field.partials.fields.help-text', [
            'html_editor' => true
        ])
    </div>
</div>
