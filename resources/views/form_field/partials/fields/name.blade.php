<div class="form-group">
    <label for="name">
        Name
        <span aria-hidden="true">*</span>
        <span class="sr-only">(required)</span>
    </label>
    <input id="name" name="name" type="text" class="form-control"
        value="{{ old('name', $field->name ?? '') }}"
        placeholder="first_name"
    >
    <p class="text-hint">
        The html name attribute for the field. It must be unique in the form.
    </p>
</div>
