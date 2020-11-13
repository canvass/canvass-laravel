<div class="form-group">
    <label for="label">
        {{ $label_text ?? 'Label' }}
        @if($required ?? true)
        <span aria-hidden="true">*</span>
        <span class="sr-only">(required)</span>
        @else
        (Optional)
        @endif
    </label>
    <input id="label" name="label" type="text" class="form-control"
        value="{{ old('label', $field->label ?? '') }}"
        placeholder="{{ $placeholder ?? 'First Name' }}"
    >
    @if($hint_text ?? false)
    <p class="text-hint">
        {!! $hint_text !!}
    </p>
    @endif
</div>
