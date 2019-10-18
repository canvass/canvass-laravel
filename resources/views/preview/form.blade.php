@extends(config('canvass.layout_file_path', 'canvass::layouts.layout'))

@section('content-page-title')
    Forms
@endsection

@section('content')
<div class="row">
    <div class="col-sm mb-3">
        {!! $form_html ?? 'No form preview' !!}
    </div>
</div>
@endsection
