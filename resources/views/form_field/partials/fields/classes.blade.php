<div class="form-group">
    <label for="classes">
        Classes (Optional)
    </label>
    <input id="classes" name="classes" type="text" class="form-control"
        placeholder="form-control" value="{{ old(
            'classes',
            $field->classes ?? config('canvass.defaults.field.classes', '')
        ) }}"
    >
    <p class="text-hint">
        What will be used as the classes on the field:
        <code>&lt;input class=""&gt;</code>
    </p>
</div>
