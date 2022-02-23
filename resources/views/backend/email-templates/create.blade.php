@extends('backend.layout.admin')
@section('content')
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.email-template')}}">Email Template</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Email Template</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
{{--                        <h4 class="card-title">Create Email Template</h4>--}}
                        @include('backend.layout.partials.flash_messages')
                        <form method="POST" action="{{ route('admin.email-template.store') }}" accept-charset="UTF-8"
                              class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @include('backend.email-templates.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
