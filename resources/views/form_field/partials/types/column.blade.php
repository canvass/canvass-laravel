<div class="row">
    <div class="col-md">
        @include('canvass::form_field.partials.fields.id')

        <div class="form-group">
            <label for="classes">
                Classes (Optional)
            </label>
            <input id="classes" name="classes" type="text" class="form-control"
                placeholder="form-control" value="{{ old(
                    'classes',
                    $field->classes ?? config('canvass.defaults.column.classes', '')
                ) }}"
            >
            <p class="text-hint">
                What will be used as the classes on the div:
                <code>&lt;div class=""&gt;[Content]&lt;/div&gt;</code>
            </p>
        </div>
    </div>

    <div class="col-md">
        @include('canvass::form_field.partials.fields.help-text', [
            'html_editor' => true
        ])
    </div>
</div>
