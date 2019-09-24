@extends('canvass::layouts.layout')

@section('content-page-title')
    Update Field, "{{ $parent->label }}" in {{ $form->name }}
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h1 class="m-t-0 header-title">
                Update Field, "{{ $parent->label }}"
            </h1>

            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('form.index') }}">
                        Forms
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('form_field.index', $form->id) }}">
                        {{ $form->name }} Fields
                    </a>
                </li>
                <li class="breadcrumb-item active">Update Field</li>
            </ol>

            <form method="POST" action="{{ route(
                'form_field_option.update',
                [$form->id, $parent->id, $field->id]
            ) }}"
                  enctype="multipart/form-data"
                  accept-charset="UTF-8"
            >
                {{ csrf_field() }}
                {{ method_field('put') }}

                @include('canvass::form_field.partials.form')

            </form>
        </div>
    </div>
</div>
@endsection
