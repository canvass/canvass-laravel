<hr>

<h2>
    {{ ucfirst($field->type) }}
    {{ $field->label ?: $field->identifier }} Fields
</h2>

<hr>

<?php
    $base_message = 'will clear any unsaved progress. ' .
        'Click, Cancel, to return to the form to Save first. ' .
        'Or click, OK, to';

    $confirm_message = "Going to this link {$base_message} visit the link.";

    $move_confirm_message = "Moving this field  {$base_message} move this field ";
?>
<div class="form-group">
    <ul>
        @if(! empty($children) && ! empty($children->toArray()))
            <?php $last = count($children->toArray()); ?>
            @foreach($children as $index => $child)
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

                @if(0 !== $index)
                <form method="post" style="display:inline;"
                  action="{{ route(
                    'nested_field.move_up',
                    [$form->id, $field->id, $child->id]
                  ) }}"
                  class="js-confirm"
                  data-confirm="{{ "{$move_confirm_message} up." }}"
                >
                    {!! csrf_field() !!}

                    <button class="btn btn-sm btn-outline-success" type="submit">
                        Move Up
                    </button>
                </form>
                @endif

                @if($last !== $index)
                <form method="post" style="display:inline;"
                  action="{{ route(
                    'nested_field.move_down',
                    [$form->id, $field->id, $child->id]
                  ) }}"
                  class="js-confirm"
                  data-confirm="{{ "{$move_confirm_message} down." }}"
                >
                    {!! csrf_field() !!}

                    <button class="btn btn-sm btn-outline-success" type="submit">
                        Move Down
                    </button>
                </form>
                @endif

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
                No fields yet.
            </li>
        @endif
    </ul>
</div>
