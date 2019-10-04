@extends('canvass::layouts.layout')

@section('content-page-title')
    Forms
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h1 class="m-t-0 header-title">
                Form
            </h1>

            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Forms List</li>
            </ol>

            <a class="btn btn-success" href="{{ route('form.create') }}">
                Add a Form
            </a>

            <ul>
            @foreach($forms as $form)
                <li>
                    <a href="{{ route('form.edit', $form->id) }}">
                        {{ $form->name }}
                    </a>

                    <a class="btn btn-sm btn-outline-success"
                       href="{{ route('form_field.index', $form->id) }}">
                        Form controls
                    </a>

                    <a class="btn btn-sm btn-outline-primary"
                       href="{{ route('form.edit', $form->id) }}">
                        Edit form
                    </a>

                    <form method="post" style="display:inline;"
                      action="{{ route('form.destroy', $form->id) }}"
                      class="js-confirm"
                      data-confirm="Are you sure you want to delete the form?"
                    >
                        {!! csrf_field() !!}
                        {!! method_field('delete') !!}

                        <button class="btn btn-sm btn-outline-danger" type="submit">
                            Delete form
                        </button>
                    </form>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
