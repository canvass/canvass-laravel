@extends('canvass::layouts.layout')

@section('content-page-title')
    Edit {{ $form->name }} Fields
@endsection

@section('content-page-breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Forms List</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h1 class="m-t-0 header-title">
                Edit {{ $form->name }} Fields
            </h1>

            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('form.index') }}">
                        Forms List
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    {{ $form->name }} Field List
                </li>
            </ol>

            <div class="form-wrap">
            <ul class="list-unstyled">
                <li class="field-wrap">
                    @include('canvass::form_field.partials.add-field-buttons')
                </li>

            @foreach($fields as $field)
                <li class="field-wrap">
                    <h2>
                        {{ $field->label }}

                        <small><code>
                            id="{{ $field->identifier }}"
                            class="{{ $field->classes ?? '<em>None</em>' }}"
                        </code></small>
                    </h2>
                    <p><code>
                    @foreach(['type', 'name', 'value'] as $key)
                        {{ $key }}="{{ $field->getAttribute($key) }}"
                    @endforeach
                    </code></p>
                    @if(! empty($field->help_text))
                    <p>
                        <strong>Help Text:</strong>
                        {{ $field->help_text }}
                    </p>
                    @endif

                    <a class="btn btn-outline-primary"
                       href="{{ route(
                        'form_field.edit',
                        [$form->id, $field->id]
                    ) }}">
                        Edit field
                    </a>

                    <a class="btn btn-outline-success"
                       href="{{ route(
                        'form_field.index',
                        [$form->id, $field->id]
                    ) }}">
                        Move Up
                    </a>

                    <a class="btn btn-outline-success"
                       href="{{ route(
                        'form_field.index',
                        [$form->id, $field->id]
                    ) }}">
                        Move Down
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

                        <button class="btn btn-outline-danger" type="submit">
                            Delete field
                        </button>
                    </form>
                </li>

                <li class="field-wrap">
                    @include(
                        'canvass::form_field.partials.add-field-buttons',
                        ['sort' => $field->sort]
                    )
                </li>
            @endforeach
            </ul>
            </div>
        </div>
    </div>
</div>
@endsection
