@include('canvass::form_field.partials.fields.label', [
    'required' => true,
    'label_text' => 'Option Text',
    'hint_text' => 'The text that will show between the <code>&lt;option&gt;</code> tags',
    'placeholder' => 'Location Name',
])

<div class="form-group">
    <label for="name">
        Email Address
        <span aria-hidden="true">*</span>
        <span class="sr-only">(required)</span>
    </label>
    <input id="name" name="name" type="text" class="form-control"
        value="{{ old('name', $field->name ?? '') }}"
        placeholder="email@example.com" required
    >
    <p class="text-hint">
        The email address that the form result would be sent to if selected.
    </p>
</div>

<div class="form-group">
    <label for="value">
        Value
        <span aria-hidden="true">*</span>
        <span class="sr-only">(required)</span>
    </label>
    <input id="value" name="value" type="text" class="form-control"
        value="{{ old('value', $field->value ?? '') }}"
        placeholder="location123" required
    >
    <p class="text-hint">
        The <code>&lt;option&gt;</code> value. It should be unique amongst the
        email options and will be used to retrieve the email address for sending.
    </p>
</div>
