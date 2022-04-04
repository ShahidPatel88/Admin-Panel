@extends('backend.layout.admin')
@section('content')
    <h2>Output</h2>
    
    @if(!empty($data))
        <p style="text-align: left;">{{$data}}</p>
    @else
        <p style="text-align: left; color: grey;">NO TEXT FOUND</p>
    @endif
    <a href="{{route('admin.get_ocr')}}">Parse another image</a>
@endsection