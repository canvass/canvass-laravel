@include('canvass::form_field.partials.types.input')

<div class="row">
    <div class="col-md">
        @include('canvass::form_field.partials.attributes.placeholder', [
            'placeholder_value' => date('H:i:s')
        ])

        @include('canvass::form_field.partials.attributes.step', [
            'hint' => 'In minute increments'
        ])
    </div>
    <div class="col-md">
        @include('canvass::form_field.partials.attributes.min', [
            'placeholder_value' => '08:30:00',
            'hint' => 'In 24 hour format: hh:mm:ss'
        ])

        @include('canvass::form_field.partials.attributes.max', [
            'placeholder_value' => '18:44:59',
            'hint' => 'In 24 hour format: hh:mm:ss'
        ])
    </div>
</div>
