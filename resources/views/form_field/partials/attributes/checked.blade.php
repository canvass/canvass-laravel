<div class="form-group">
    <input id="checked" name="attributes[checked]" type="checkbox" value="checked"
        {{ $field->getAttribute('checked') ?? false ? 'checked="checked"' : '' }}
    >
    <label for="checked">
        Required
        <span aria-hidden="true">*</span>
        <span class="sr-only">(required)</span>
    </label>
    <p class="text-hint">
        Should this field be filled in by default?
    </p>
</div>
