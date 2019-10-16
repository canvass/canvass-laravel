<div class="form-group">
    <label for="help_text">
        Help Text (Optional)
    </label>
    <textarea id="help_text" name="help_text"
      class="form-control {{ ($html_editor ?? false) ? 'js-html-editor' : '' }}"
    >{{ old('help_text', $field->help_text ?? '') }}</textarea>
</div>
