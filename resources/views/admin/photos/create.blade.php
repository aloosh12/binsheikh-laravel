@extends('admin.template.layout')
@section('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />

@stop
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><strong>
                                    Add Photos
                            </strong></div>
                        <form method="post" id="admin-form" action="{{ url('admin/save_photos') }}"
                            enctype="multipart/form-data" data-parsley-validate="true">
                            <div class="card-body">
                                <input type="hidden" name="id" id="cid" value="">
                                @csrf()

                                <div class="row">

                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label>Photos (gif,jpg,png,jpeg) </label>
                                            <input type="file" name="gallery[]" class="form-control"
                                                data-role="file-image" data-preview="image-preview"
                                                data-parsley-trigger="change"
                                                data-parsley-fileextension="jpg,png,gif,jpeg"
                                                data-parsley-fileextension-message="Only files with type jpg,png,gif,jpeg are supported"
                                                data-parsley-max-file-size="5120"
                                                data-parsley-max-file-size-message="Max file size should be 5MB"
                                                data-parsley-imagedimensionss="300x300" accept="image/*" multiple>
                                                <span class="text-danger">Upload images with dimensions 800 x 467 Or it's proportions</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label>Folder<b class="text-danger">&nbsp;</b></label>
                                            <select name="folder_id" class="form-control select2" required
                                                    data-parsley-required-message="Select Folder">
                                                <option  value="">Select</option>
                                                @foreach($folders as $val)
                                                    <option value="{{$val->id}}">{{$val->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-md-12 mt-2">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a href="{{url('admin/photos')}}" class="btn btn-secondary"  data-bs-dismiss="modal">{{__('Back')}}  </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- /.row-->
        </div>
    </div>

@stop
@section('script')



    <script>
        $('body').off('submit', '#admin-form');
        $('body').on('submit', '#admin-form', function(e) {
            e.preventDefault();
            var $form = $(this);
            var formData = new FormData(this);
            $(".invalid-feedback").remove();

            $form.find('button[type="submit"]')
                .text('Saving')
                .attr('disabled', true);


            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: $form.attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                dataType: 'json',
                success: function(res) {

                    if (res['status'] == 0) {
                        if (typeof res['errors'] !== 'undefined' && res['errors']) {
                            var error_def = $.Deferred();
                            var error_index = 0;
                            jQuery.each(res['errors'], function(e_field, e_message) {
                                if (e_message != '') {
                                    $('[name="' + e_field + '"]').eq(0).addClass('is-invalid');
                                    $('<div class="invalid-feedback">' + e_message + '</div>')
                                        .insertAfter($('[name="' + e_field + '"]').eq(0));
                                    if (error_index == 0) {
                                        error_def.resolve();
                                    }
                                    error_index++;
                                }
                            });
                            error_def.done(function() {
                                var error = $form.find('.is-invalid').eq(0);
                                $('html, body').animate({
                                    scrollTop: (error.offset().top - 100),
                                }, 500);
                            });
                        } else {
                            var m = res['message'] ||
                                'Unable to save photos. Please try again later.';
                            show_msg(0, m)
                        }
                    } else {
                        var m = res['message'];
                        show_msg(1, m)
                        setTimeout(function() {
                            window.location.href = "{{ url('/admin/photos') }}";
                        }, 1500);

                    }

                    $form.find('button[type="submit"]')
                        .text('Save')
                        .attr('disabled', false);
                },
                error: function(e) {

                    $form.find('button[type="submit"]')
                        .text('Save')
                        .attr('disabled', false);
                    show_msg(0, e.responseText)
                }
            });
        });


    </script>

@stop
