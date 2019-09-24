<div class="form-group">
    <label for="value">
        Value
        @if($required ?? false)
        <span aria-hidden="true">*</span>
        <span class="sr-only">(required)</span>
        @else
        (Optional)
        @endif
    </label>
    <input id="value" name="value" type="text" class="form-control"
        value="{{ old('value', $field->value ?? '') }}"
        placeholder="Michael"
    >
    <p class="text-hint">
        The default value of the field.
    </p>
</div>
