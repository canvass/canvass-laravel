<div class="form-group">
    <label for="placeholder">
        Placeholder
        @if($required ?? false)
        <span aria-hidden="true">*</span>
        <span class="sr-only">(required)</span>
        @else
        (Optional)
        @endif
    </label>
    <input id="placeholder" name="attributes[placeholder]" type="text" class="form-control"
        value="{{ old('placeholder', $field->getAttribute('placeholder') ?? '') }}"
        placeholder="{{ $placeholder_value ?? 'Michael' }}"
    >
    <p class="text-hint">
        An example input that helps the user know what to enter.
    </p>
</div>
