<div class="form-group">
    <label for="maxlength">
        Maximum Length (Optional)
    </label>
    <input id="maxlength" name="attributes[maxlength]" type="text" class="form-control"
        value="{{ old('maxlength', $field->getAttribute('maxlength') ?? '') }}"
        placeholder="100"
    >
    <p class="text-hint">
        The maximum number of characters that can be submitted by the user
    </p>
</div>
