@extends('backend.layout.admin')
@section('content')
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.email-template')}}">Tally</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ledger Account</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th class="wd-40p">Company Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($company_data as $key => $item).
                                    @foreach ($item as  $value)
                                    <tr>
                                        <td>{{ $value }}</td>
                                        <td></td>
                                    </tr>

                                    @endforeach

                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
