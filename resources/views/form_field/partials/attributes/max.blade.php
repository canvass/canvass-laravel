<div class="form-group">
    <label for="max">
        Maximum (Optional)
    </label>
    <input id="max" name="attributes[max]" type="text" class="form-control"
        value="{{ old('max', $field->getAttribute('max') ?? '') }}"
        placeholder="100"
    >
    <p class="text-hint">
        The maximum value that can be submitted by the user
    </p>
</div>
