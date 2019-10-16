@extends('layouts.layout')

@section('content-page-title')
    Select Input Type
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h1 class="m-t-0 header-title">Select Input Type</h1>

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
                <li class="breadcrumb-item active">Select Input Type</li>
            </ol>

            <ul class="list-unstyled">
                <li style="display: inline-block">
                    <strong>
                        What type of input?
                    </strong>
                </li>
            @foreach($types as $type => $name)
                <?php
                    if (empty($field)) {
                        $route = route(
                            'form_field.create',
                            [$form->id, $type, $sort]
                        );
                    } else {
                        $route = route(
                            'nested_field.create',
                            [$form->id, $field->id, $sort, $type]
                        );
                    }
                ?>
                <li style="display: inline-block">
                    <a href="{{ $route }}" class="btn btn-outline-primary">
                        {{ $name }}
                    </a>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
