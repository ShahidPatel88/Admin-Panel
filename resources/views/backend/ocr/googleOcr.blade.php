@extends('backend.layout.admin')
@section('content')
<form method="post" action="{{ route('admin.submit') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">Select image:</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn btn-primary">Submit</button>
                </form>
@endsection                