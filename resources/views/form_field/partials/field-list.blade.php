<div class="form-wrap">
    <ul class="list-unstyled">
    @foreach($fields as $index => $field)
        <li class="field-wrap">
            <h2>
                {{ ucwords(
                    $field->type, '-'
                ) }}{{ ! empty($field->label) ? ': ' . $field->label : '' }}
            </h2>

            <p>
                <code>
                id="{{ $field->identifier }}"
            @if(! empty($field->classes))
                class="{{ $field->classes ?? '' }}"
            @endif
            @if(! empty($field->wrap_classes))
                wrap_class="{{ $field->wrap_classes }}"
            @endif

            @foreach(['type', 'name', 'value'] as $key)
                {{ $key }}="{{ $field->getAttribute($key) }}"
            @endforeach
                </code>
            </p>

            @if(! empty($field->help_text))
            <p>
                <strong>Help Text:</strong>
                {{ $field->help_text }}
            </p>
            @endif

            @if(! $loop->first)
            <form method="post" style="display:inline;"
              action="{{ route(
                'form_field.move_up',
                [$form->id, $field->id]
              ) }}"
              class="js-confirm"
              data-confirm="Are you sure you want to move this field up?"
            >
                {!! csrf_field() !!}

                <button class="btn btn-outline-success mb-1" type="submit">
                    Move Up
                </button>
            </form>
            @endif

            @if(! $loop->last)
            <form method="post" style="display:inline;"
              action="{{ route(
                'form_field.move_down',
                [$form->id, $field->id]
              ) }}"
              class="js-confirm"
              data-confirm="Are you sure you want to move this field down?"
            >
                {!! csrf_field() !!}

                <button class="btn btn-outline-success mb-1" type="submit">
                    Move Down
                </button>
            </form>
            @endif

            <a class="btn btn-outline-primary mb-1"
               href="{{ route(
                'form_field.edit',
                [$form->id, $field->id]
            ) }}">
                Edit field
            </a>

            <form method="post" style="display:inline;"
              action="{{ route(
                'form_field.destroy',
                [$form->id, $field->id]
              ) }}"
              class="js-confirm"
              data-confirm="Are you sure you want to delete this field?"
            >
                {!! csrf_field() !!}
                {!! method_field('delete') !!}

                <button class="btn btn-outline-danger mb-1" type="submit">
                    Delete field
                </button>
            </form>

            <hr>
        </li>
    @endforeach

        <li class="field-wrap">
            @include(
                'canvass::form_field.partials.add-field-buttons',
                ['sort' => $field->sort ?? 0, 'field' => null,]
            )
        </li>
    </ul>
</div>
