<div class="form-group">
    <label for="min">
        Minimum (Optional)
    </label>
    <input id="min" name="attributes[min]" type="text" class="form-control"
        value="{{ old('min', $field->getAttribute('min') ?? '') }}"
        placeholder="1"
    >
    <p class="text-hint">
        The minimum value that can be submitted by the user
    </p>
</div>
