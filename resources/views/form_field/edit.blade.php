@extends('layouts.layout')

@section('content-page-title')
    Update {{ $field->type }}, "{{ $field->label }}" in {{ $form->name }}
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h1 class="m-t-0 header-title">
                Update Field, "{{ $field->label }}"
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

            <div class="form-wrap">
                <form method="POST" action="{{ route(
                    'form_field.update', [$form->id, $field->id]
                ) }}"
                      enctype="multipart/form-data"
                      accept-charset="UTF-8"
                >
                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    @include('canvass::form_field.partials.form')

                </form>

                @includeIf("canvass::form_field.partials.types.{$field->type}-close")
            </div>
        </div>
    </div>
</div>
@endsection
