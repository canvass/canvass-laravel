<div class="form-group">
    <label for="classes">
        Classes (Optional)
    </label>
    <input id="classes" name="classes" type="text" class="form-control"
        value="{{ old('classes', $field->classes ?? '') }}"
        placeholder="form-control"
    >
    <p class="text-hint">
        What will be used as the classes on the field:
        <code>&lt;input class=""&gt;</code>
    </p>
</div>
