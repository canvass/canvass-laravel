<div class="form-group">
    <label for="label">
        Label
        @if($required ?? true)
        <span aria-hidden="true">*</span>
        <span class="sr-only">(required)</span>
        @else
        (Optional)
        @endif
    </label>
    <input id="label" name="label" type="text" class="form-control"
        value="{{ old('label', $field->label ?? '') }}"
        placeholder="First Name"
    >
</div>
