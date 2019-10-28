@extends(config('canvass.layout_file_path', 'canvass::layouts.layout'))

@section('content-page-title')
    Edit {{ $form->name }} Fields
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

            <div class="row">
                <div class="col-md-7">
                    @include('canvass::form_field.partials.field-list')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
