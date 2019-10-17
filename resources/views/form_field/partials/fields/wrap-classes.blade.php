<div class="form-group">
    <label for="wrap_classes">
        Wrap Classes (Optional)
    </label>
    <input id="wrap_classes" name="wrap_classes" type="text" class="form-control"
        placeholder="form-control" value="{{ old(
            'wrap_classes',
            $field->wrap_classes ??
                config('canvass.defaults.field.wrap_classes', '')
        ) }}"
    >
    <p class="text-hint">
        What will be used as the classes of the field's parent div:
        <code>&lt;div class=""&gt;...&lt;input&gt;&lt;/div&gt;</code>
    </p>
</div>
