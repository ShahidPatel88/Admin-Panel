@push('plugin-styles')
{{--    <link href="{{ asset('public/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />--}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
@endpush
<div class="form-layout">
    <div class="row mg-b-25">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label">Title: <span class="tx-danger">*</span></label>
                {!! Form::text('title', $template->title ?? old('title'), ['class' => 'form-control', 'placeholder' => 'Enter title', 'data-validation' => 'required']) !!}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label">Email Event: <span class="tx-danger">*</span></label>
                <select class="js-example-basic-single form-select" data-width="100%" name="identifier" data-validation="required" id="identifier">
                    @foreach($email_events as $email_event => $value)
                        <option value="{{$email_event}}" @if(isset($template) && $template->identifier == $email_event) selected @endif>{{$value}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group" id="emailVariables">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Variables</th>
                        <th>Details</th>
                    </tr>
                    </thead>
                    @if(!empty(config('emailvariables')))
                        @foreach(config('emailvariables') as $action => $details)
                            <tbody id="{{ $action }}" class="actionDiv">
                            @foreach($details as $key => $value)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $value }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label class="form-control-label">Subject: <span class="tx-danger">*</span></label>
                {!! Form::text('subject', $template->subject ?? old('subject'), ['class' => 'form-control', 'placeholder' => 'Enter subject', 'data-validation' => 'required']) !!}
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label class="form-control-label">Content: <span class="tx-danger">*</span></label>
                {!! Form::textarea('content', $template->content ?? old('content'), ['class' => 'form-control wysiwyg_editor','data-validation'=>'required']) !!}
            </div>
        </div>
    </div>
    <div class="form-layout-footer">
        <button type="submit" class="btn btn-primary bd-0">@if(isset($template)) Update @else Submit @endif</button>
        <a href="{{ route('admin.email-template') }}" class="btn btn-secondary bd-0">Cancel</a>
    </div>
</div>
@push('plugin-scripts')
{{--    <script src="{{ asset('public/assets/plugins/select2/select2.min.js') }}"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('public/assets/plugins/summernote/summernote-bs4.js') }}"></script>
@endpush
@push('custom-scripts')
    <script>
        $(function () {
            'use strict';
            getAction($('#identifier').val());

            $("#identifier").on('change', function () {
                getAction($('#identifier').val());
            });
        });
        function getAction(selected_action) {
            $("#emailVariables").toggle(selected_action != "");
            $(".actionDiv").hide();
            if (selected_action != ""){
                $('#'+selected_action).show();
                $('#emailVariables').show();
            }else{
                $("#emailVariables").hide();
            }
        }



    </script>
@endpush
