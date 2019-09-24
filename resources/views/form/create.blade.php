@extends('canvass::layouts.layout')

@section('content-page-title')
    Add a Form
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h1 class="m-t-0 header-title">Add a Form</h1>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('form.index') }}">
                            Forms
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Add a Form</li>
                </ol>

                <form method="POST" action="{{ route('form.store') }}"
                      enctype="multipart/form-data"
                      accept-charset="UTF-8"
                >
                    {{ csrf_field() }}

                    @include('canvass::form.partials.form')

                </form>
            </div>
        </div>
    </div>
@endsection
