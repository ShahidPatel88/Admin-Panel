@extends('backend.layout.admin')
@section('content')
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.email-template')}}">Tally</a></li>
                <li class="breadcrumb-item active" aria-current="page">Groups & Items</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @include('backend.layout.partials.flash_messages')

                        <form method="POST" action="{{ route('admin.storeGroupStocks') }}" accept-charset="UTF-8"
                              class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row mg-b-25">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Group Name: <span class="tx-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter Group Name" name="group_name" data-validation="required" >
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Item Name: <span class="tx-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter Item Name" name="item_name" data-validation="required">
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
