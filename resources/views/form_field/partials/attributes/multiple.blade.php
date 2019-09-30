<div class="form-group">
    <input id="multiple" name="attributes[multiple]" type="checkbox" value="true"
        {{ $field->getAttribute('multiple') ?? false ? 'checked="checked"' : '' }}
    >
    <label for="multiple">
        Allow multiple values?
    </label>
    <p class="text-hint">
        Can the user enter more than one value into this field?
    </p>
</div>
