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

            <ul>
            @foreach($fields as $field)
                <li>
{{--                    <a href="{{ route('form.edit', $form->id) }}">--}}
                        {{ $field->label }}
{{--                    </a>--}}

{{--                    <a class="btn btn-sm btn-outline-success"--}}
{{--                       href="{{ route('form_field.index', $form->id) }}">--}}
{{--                        Move Up--}}
{{--                    </a>--}}

{{--                    <a class="btn btn-sm btn-outline-success"--}}
{{--                       href="{{ route('form_field.index', $form->id) }}">--}}
{{--                        Move Down--}}
{{--                    </a>--}}

{{--                    <a class="btn btn-sm btn-outline-primary"--}}
{{--                       href="{{ route('form.edit', $form->id) }}">--}}
{{--                        Edit field--}}
{{--                    </a>--}}

{{--                    <form method="post" style="display:inline;"--}}
{{--                      action="{{ route('form.destroy', $form->id) }}"--}}
{{--                      class="js-confirm"--}}
{{--                      data-confirm="Are you sure you want to delete the form?"--}}
{{--                    >--}}
{{--                        {!! csrf_field() !!}--}}
{{--                        {!! method_field('delete') !!}--}}

{{--                        <button class="btn btn-sm btn-outline-danger" type="submit">--}}
{{--                            Delete field--}}
{{--                        </button>--}}
{{--                    </form>--}}
                </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
