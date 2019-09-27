<div class="form-group">
    <input id="required" name="attributes[required]" type="checkbox" value="required"
        {{ $field->getAttribute('required') ?? false ? 'checked="checked"' : '' }}
    >
    <label for="required">
        Required
        <span aria-hidden="true">*</span>
        <span class="sr-only">(required)</span>
    </label>
    <p class="text-hint">
        Is the user required to fill out this field?
    </p>
</div>
