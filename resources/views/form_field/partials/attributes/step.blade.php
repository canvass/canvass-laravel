<div class="form-group">
    <label for="step">
        Step (Optional)
    </label>
    <input id="step" name="attributes[step]" type="text" class="form-control"
        value="{{ old('step', $field->getAttribute('step') ?? '') }}"
        placeholder="1"
    >
    <p class="text-hint">
        The amount by which the field's value can be increased
    </p>
</div>
