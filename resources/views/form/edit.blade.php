@extends(config('canvass.layout_file_path', 'canvass::layouts.layout'))

@section('content-page-title')
    Update Form, "{{ $form->name }}"
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h1 class="m-t-0 header-title">
                    Update Form, "{{ $form->name }}"
                </h1>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('form.index') }}">
                            Forms
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Update Form</li>
                </ol>

                <form method="POST" action="{{ route('form.update', $form->id) }}"
                      enctype="multipart/form-data"
                      accept-charset="UTF-8"
                >
                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    @include('canvass::form.partials.form')

                </form>
            </div>
        </div>
    </div>
@endsection
