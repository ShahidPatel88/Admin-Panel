@extends('backend.layout.admin')
@section('content')
   <div class="card">
       <div class="card-body">
           @if(count($site_configurations) > 0)
               @include('backend.layout.partials.flash_messages')
               <h6 class="card-title">Site Configuration</h6>
               <form method="POST" action="{{ route('admin.site-configuration.update') }}" accept-charset="UTF-8"
                     class="forms-sample" enctype="multipart/form-data">
                   @csrf
                       @foreach($site_configurations as $item)
                           @if($item->control_type=='checkbox')
                           <div class="row mb-3">
                               <div class="col-sm-3">
                                   <label for="exampleInputText1" class="form-label">{{ $item->title }}:</label>
                               </div>
                               <div class="col-sm-9">
                                   <div class="custom-control custom-switch">
                                       <input type="checkbox" name ="configurations[{{$item->identifier}}]" class="custom-control-input" id="{{$item->identifier}}" @if($item->value=='true') checked @endif>
                                       <label class="custom-control-label" for="{{$item->identifier}}">Toggle this switch element</label>
                                   </div>
                                   <input type="hidden" name="configurations[{{$item->identifier}}]" value="{{$item->value}}" id="hiddenvalueswitch">
                               </div>
                           </div>
                           @else
                           <div class="row mb-3 {{$item->identifier}}">
                               <label for="exampleInputText1" class="col-sm-3 form-label">{{ $item->title }}:</label>
                               <div class="col-sm-9">
                                   {!! Form::text('configurations['.$item->identifier.']', $item->value, ['class' => 'form-control', 'placeholder' => 'Enter value']) !!}
                               </div>
                           </div>
                           @endif
                       @endforeach


                   <button type="submit" class="btn btn-primary me-2">Update</button>
               </form>
           @else
               <label class="section-title">No Record Found.</label>
               <p class="mg-b-20 mg-sm-b-40">Run "php artisan db:seed" command.</p>
           @endif
       </div>
   </div>
@endsection
@push('custom-scripts')
    <script>
        $(function() {
            var value= $("#hiddenvalueswitch").val();
            if(value == 'false'){
                $('.razor_pay_site_key').addClass('d-none');
                $('.razor_pay_secret_key').addClass('d-none');
                $('#hiddenvalueswitch').val(false);
            }
           $('#razor_pay').on('click',function () {
               var val = $(this).is(":checked");
               if(val == false){
                   $('.razor_pay_site_key').addClass('d-none');
                   $('.razor_pay_secret_key').addClass('d-none');
                   $('#hiddenvalueswitch').val(false);
               }else{
                   $('.razor_pay_site_key').removeClass('d-none');
                   $('.razor_pay_secret_key').removeClass('d-none');
                   $('#hiddenvalueswitch').val(true);
               }
           });
        });
    </script>
@endpush
