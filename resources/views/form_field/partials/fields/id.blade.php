<div class="form-group">
    <label for="identifier">
        ID
        <span aria-hidden="true">*</span>
        <span class="sr-only">(required)</span>
    </label>
    <input id="identifier" name="identifier" type="text" class="form-control"
        value="{{ old('identifier', $field->identifier ?? '') }}"
        placeholder="first_name"
    >
    <p class="text-hint">
        The html id attribute for the field. It must be a unique reference.
    </p>
</div>
