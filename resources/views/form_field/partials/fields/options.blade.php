<?php
    $confirm_message = 'Going to this link will clear any unsaved progress. ' .
        'Click, Cancel, to return to the form to Save first. ' .
        'Or click, OK, to visit the link.';
?>
<div class="form-group">
    <p>
        Options

        <a class="btn btn-sm btn-outline-success js-confirm"
           data-confirm="{{ $confirm_message }}"
           href="{{ route(
             'form_field_option.create',
             [$form->id, $field->id, count($children ?? []), $child_type]
           ) }}"
        >
            Add Option
        </a>
    </p>

    <ul>
        @if(! empty($children))
            @foreach($children as $child)
            <li>
                {{ $child->label ?? $child->identifier }}

                <a class="btn btn-sm btn-outline-primary js-confirm"
                   data-confirm="{{ $confirm_message }}"
                   href="{{ route(
                     'form_field_option.edit',
                     [$form->id, $field->id, $child->id]
                   ) }}"
                >
                    Edit
                </a>

                <a class="btn btn-sm btn-outline-danger" href="delete">
                    Delete
                </a>

                <hr>
            </li>
            @endforeach
        @else
            <li>
                No options yet. <a href="">Add one</a> now.
            </li>
        @endif
    </ul>
</div>
