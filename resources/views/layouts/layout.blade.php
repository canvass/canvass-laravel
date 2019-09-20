<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('content-page-title') - {{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
      rel="stylesheet"
    >

    <!-- App css -->
    @include('canvass::layouts.styles')

    <!-- App js -->
    @include('canvass::layouts.scripts-head')
</head>


<body>
@yield('page-styles')

<!-- Begin page -->
<div id="wrapper">

<div class="content-page">
    <main class="content">
        <div class="container-fluid">
            @if (! empty($errors))
            <div id="notifications" tabindex="0">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>
            @endif

            @if(session('success') || session('error'))
                <div class="alert alert-{{ session('error') ? 'danger' : 'success' }}">
                    {!! session('error') ? session('error') : session('success') !!}
                </div>
            @endif

            <div id="app">
            @yield('content')
            </div>

        </div> <!-- container -->

    </main> <!-- content -->

    <footer class="footer text-center">
        {{ date('Y') }} © {{ env('APP_NAME') }}
    </footer>
</div>

</div>

@yield('page-scripts')

@include('canvass::layouts.scripts-body')

{{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--    {{ csrf_field() }}--}}
{{--</form>--}}
</body>
</html>
