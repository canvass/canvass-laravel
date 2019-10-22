<?php
    $confirm_message = 'Going to this link will clear any unsaved progress. ' .
        'Click, Cancel, to return to the form to Save first. ' .
        'Or click, OK, to visit the link.';
?>
<hr>
<h2>Nested Fields</h2>
<hr>
<div class="form-group">
    <p>
        <a class="btn btn-sm btn-outline-success js-confirm"
           data-confirm="{{ $confirm_message }}"
           href="{{ route(
             'nested_field.create',
             [$form->id, $field->id, count($children ?? []), $child_type]
           ) }}"
        >
            Add Nested Field
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
                     'nested_field.edit',
                     [$form->id, $field->id, $child->id]
                   ) }}"
                >
                    Edit
                </a>

                <form method="post" style="display:inline;"
                  action="{{ route(
                    'nested_field.destroy',
                    [$form->id, $field->id, $child->id]
                  ) }}"
                  class="js-confirm"
                  data-confirm="Are you sure you want to delete this field option?"
                >
                    {!! csrf_field() !!}
                    {!! method_field('delete') !!}

                    <button class="btn btn-sm btn-outline-danger" type="submit">
                        Delete
                    </button>
                </form>

                <hr>
            </li>
            @endforeach
        @else
            <li>
                No nested fields yet.
            </li>
        @endif
    </ul>
</div>
