@extends('backend.layout.admin')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.email-template')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Email Templates</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    @include('backend.layout.partials.flash_messages')
                    <span class="pull-right float-right ml-auto">
                        <a href="{{ route('admin.email-template.create') }}" class="btn btn-primary btn-sm"
                           title="Add New">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    </span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th class="wd-40p">Title</th>
                                <th class="wd-40p">Email Event</th>
                                <th class="wd-10p">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($email_templates as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ \App\Models\EmailTemplate::EMAIL_EVENTS[$item->identifier] }}</td>
                                    <td>

                                        <a href="{{ route('admin.email-template.edit', $item->id) }}" title="Edit">
                                            <i data-feather="edit"></i>
                                        </a>
                                            <a href="javascript:;" onclick="confirmDelete('{{ route("admin.email-template.delete",$item->id) }}')" title="Delete">
                                                <i data-feather="trash"></i>
                                            </a>






                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script>
        $(function() {
            $('#dataTableExample').DataTable({
                "aLengthMenu": [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"]
                ],
                "iDisplayLength": 10,
                "language": {
                    search: ""
                }
            });
            $('#dataTableExample').each(function() {
                var datatable = $(this);
                // SEARCH - Add the placeholder for Search and Turn this into in-line form control
                var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
                search_input.attr('placeholder', 'Search');
                search_input.removeClass('form-control-sm');
                // LENGTH - Inline-Form control
                var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                length_sel.removeClass('form-control-sm');
            });
        });
    </script>
@endpush
