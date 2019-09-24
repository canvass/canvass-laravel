<div class="form-group">
    <label for="type">
        Type
        <span aria-hidden="true">*</span>
        <span class="sr-only">(required)</span>
    </label>
    <select id="type" name="type" class="form-control">
        @foreach([
            'text', 'email', 'tel', 'checkbox',
            'date', 'number', 'time', 'url', 'search'
        ] as $type_option)
        <option value="{{ $type_option }}"
            {{ $field->type === $type_option ? 'selected' : '' }}
        >
            {{ ucfirst($type_option) }}
        </option>
        @endforeach
    </select>
</div>
