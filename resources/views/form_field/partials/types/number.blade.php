@include('canvass::form_field.partials.types.input')

<div class="row">
    <div class="col-md">
        @include('canvass::form_field.partials.attributes.required')

        @include('canvass::form_field.partials.attributes.placeholder', [
            'placeholder_value' => 42
        ])

        @include('canvass::form_field.partials.attributes.step')
    </div>
    <div class="col-md">
        @include('canvass::form_field.partials.attributes.min', [
            'placeholder_value' => -25,
        ])

        @include('canvass::form_field.partials.attributes.max', [
            'placeholder_value' => 3141592,
        ])
    </div>
</div>
