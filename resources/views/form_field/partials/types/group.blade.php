@include('canvass::form_field.partials.fields.label')

@include('canvass::form_field.partials.fields.name')

<div class="form-group">
    <label for="type">
        Type
        <span aria-hidden="true">*</span>
        <span class="sr-only">(required)</span>
    </label>
    <select id="type" name="type" class="form-control">
        <option value="checkbox-group"
            {{ 'checkbox-group' === $field->type ? 'selected' : '' }}
        >
            Select Many From Group (checkboxes)
        </option>
        <option value="radio-group"
            {{ 'radio-group' === $field->type ? 'selected' : '' }}
        >
            Select One From Group (radios)
        </option>
    </select>
</div>

@include('canvass::form_field.partials.fields.id')

@include('canvass::form_field.partials.fields.classes')

@include('canvass::form_field.partials.fields.help-text')

@include('canvass::form_field.partials.fields.value')

@include('canvass::form_field.partials.fields.options', [
    'child_type' => str_replace('-group', '', $field->getAttribute('type'))
])
