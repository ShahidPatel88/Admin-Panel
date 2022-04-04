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
                        @include('backend.layout.partials.flash_messages')

                        <form method="POST" action="{{ route('admin.storeLedgerAccount') }}" accept-charset="UTF-8"
                              class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row mg-b-25">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter Name" name="name" data-validation="required" >
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter Address" name="address" data-validation="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Country: <span class="tx-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter Country" name="country" data-validation="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label">State: <span class="tx-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter State" name="state" data-validation="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label">PAN/IT No:</label>
                                        <input type="text" class="form-control" placeholder="Enter PAN/IT No" name="pan_no" >
                                    </div>
                                </div>
                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-primary bd-0">Submit</button>
                                    <a href="{{ route('admin.email-template') }}" class="btn btn-secondary bd-0">Cancel</a>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
