@include('canvass::form_field.partials.types.input')

<div class="row">
    <div class="col-md">
        @include('canvass::form_field.partials.attributes.required')

        @include('canvass::form_field.partials.attributes.placeholder')
    </div>
    <div class="col-md">
        @include('canvass::form_field.partials.attributes.multiple')
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md">
        @include('canvass::form_field.partials.attributes.minlength')
    </div>
    <div class="col-md">
        @include('canvass::form_field.partials.attributes.maxlength')
    </div>
</div>

