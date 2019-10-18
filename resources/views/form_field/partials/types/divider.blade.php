<div class="row">
    <div class="col-md">
        @include('canvass::form_field.partials.fields.id')

        @include('canvass::form_field.partials.fields.wrap-classes')

        @include('canvass::form_field.partials.fields.label', [
            'required' => false
        ])
    </div>

    <div class="col-md">
        @include('canvass::form_field.partials.fields.help-text', [
            'html_editor' => true
        ])
    </div>
</div>
