@include('canvass::form_field.partials.types.input')

@include('canvass::form_field.partials.attributes.required')

@include('canvass::form_field.partials.attributes.placeholder', [
    'placeholder_value' => 42
])

<div class="row">
    <div class="col-md">
        @include('canvass::form_field.partials.attributes.min', [
            'placeholder_value' => -25,
        ])
    </div>
    <div class="col-md">
        @include('canvass::form_field.partials.attributes.max', [
            'placeholder_value' => 3141592,
        ])
    </div>
    <div class="col-md">
        @include('canvass::form_field.partials.attributes.step')
    </div>
</div>
