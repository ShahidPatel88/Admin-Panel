@extends('lara_ocr.layout')
@section('content')
    <h2>Upload Image</h2>
    <!-- <form class="" enctype="multipart/form-data" method="post" action="{{route('admin.post_ocr')}}">
        {{csrf_field()}}
        <input type="file" name="image" placeholder="select image">
        <button type="submit">Parse Text</button>
    </form> -->

    <form class="" method="post" action="{{route('admin.import_voucher')}}"> 
         {{csrf_field()}}
         <input type="text" class="form-control" placeholder="Enter Group Name" name="group_name">
         <input type="text" class="form-control" placeholder="Enter Item Name" name="item_name">
         <button type="submit">Submit Data</button>
    </form>
@endsection