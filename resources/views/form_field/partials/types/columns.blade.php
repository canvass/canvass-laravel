<div class="row">
    <div class="col-md">
        @include('canvass::form_field.partials.fields.id')
    </div>

    <div class="col-md">
        <div class="form-group">
            <label for="wrap_classes">
                Wrap Classes (Optional)
            </label>
            <input id="wrap_classes" name="wrap_classes" type="text" class="form-control"
                placeholder="form-control" value="{{ old(
                    'wrap_classes',
                    $field->wrap_classes ?? config(
                        'canvass.defaults.columns.wrap_classes', ''
                    )
                ) }}"
            >
            <p class="text-hint">
                What will be used as the classes on the div:
                <code>&lt;div class=""&gt;[Columns]&lt;/div&gt;</code>
            </p>
        </div>
    </div>
</div>
