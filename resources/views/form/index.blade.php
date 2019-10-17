@extends(config('canvass.layout_file_path', 'canvass::layouts.layout'))

@section('content-page-title')
    Forms
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h1 class="m-t-0 header-title">
                Form Listing
            </h1>

            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Forms List</li>
            </ol>

            <a class="btn btn-success pull-right mb-2"
               href="{{ route('form.create') }}"
            >
                Add a Form
            </a>

            <table class="table table-striped" role="presentation">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Redirect URL</th>
                        <th>Introduction</th>
                        <th class="text-right">Manage</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($forms as $form)
                    <tr>
                        <td>
                            <a href="{{ route('form.edit', $form->id) }}">
                                {{ $form->name }}
                            </a>
                        </td>
                        <td>
                            {{ $form->redirect_url }}
                        </td>
                        <td>
                            {{ \Illuminate\Support\Str::limit(
                                $form->introduction, 60
                            ) }}
                        </td>
                        <td class="text-right">
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

                                <button class="btn btn-sm btn-outline-danger"
                                  type="submit"
                                >
                                    Delete form
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
