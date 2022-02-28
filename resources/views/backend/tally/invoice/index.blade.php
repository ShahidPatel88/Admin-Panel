@extends('backend.layout.admin')
@section('content')
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.email-template')}}">Tally</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Invoice</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @include('backend.layout.partials.flash_messages')

                        <form method="POST" action="{{ route('admin.importInvoice') }}" accept-charset="UTF-8"
                              class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row mg-b-25">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Company Name: <span class="tx-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter Company Name" name="company_name" data-validation="required" value="Aaaa" readonly>
                                    </div>
                                </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Bill To: <span class="tx-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter Bill To " name="bill_to" data-validation="required" value="Cash" readonly>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Ledger Name: <span class="tx-danger">*</span></label>
                                        <select class="form-control" name="ledger_name">
                                            <option value="">Select Ledger</option>
                                            <option value="INNOVIUS">INNOVIUS</option>
                                            <option value="INNOVIUS SOFTWARE">INNOVIUS SOFTWARE</option>
                                            <option value="LOREM IPSUM">LOREM IPSUM</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Amount: <span class="tx-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter Amount" name="amount" data-validation="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Total: <span class="tx-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter Total" name="total" data-validation="required">
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
