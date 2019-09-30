@include('canvass::form_field.partials.types.input')

@include('canvass::form_field.partials.attributes.required')

@include('canvass::form_field.partials.attributes.placeholder', [
    'placeholder_value' => date('Y-m-d')
])

<div class="row">
    <div class="col-md">
        @include('canvass::form_field.partials.attributes.min', [
            'placeholder_value' => date('Y-m-d'),
            'hint' => 'yyyy-mm-dd'
        ])
    </div>
    <div class="col-md">
        @include('canvass::form_field.partials.attributes.max', [
            'placeholder_value' => (new \DateTime())->modify('+1 year')->format('Y-m-d'),
            'hint' => 'yyyy-mm-dd'
        ])
    </div>
    <div class="col-md">
        @include('canvass::form_field.partials.attributes.step', [
            'hint' => 'Increments by day'
        ])
    </div>
</div>
