<div class="form-group">
    <label for="minlength">
        Minimum Length (Optional)
    </label>
    <input id="minlength" name="attributes[minlength]" type="text" class="form-control"
        value="{{ old('minlength', $field->getAttribute('minlength') ?? '') }}"
        placeholder="1"
    >
    <p class="text-hint">
        The minimum number of characters that can be submitted by the user
    </p>
</div>
