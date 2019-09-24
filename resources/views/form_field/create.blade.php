@extends('canvass::layouts.layout')

@section('content-page-title')
    Add a Field to {{ $form->name }}
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h1 class="m-t-0 header-title">Add a Field</h1>

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
                <li class="breadcrumb-item active">Add a Field</li>
            </ol>

            <form method="POST" action="{{ route(
                'form_field.store',
                [$form->id, $type, $sort]
            ) }}"
                  enctype="multipart/form-data"
                  accept-charset="UTF-8"
            >
                {{ csrf_field() }}

                @include('canvass::form_field.partials.form')

            </form>
        </div>
    </div>
</div>
@endsection
